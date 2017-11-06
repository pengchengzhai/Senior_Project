<?php
    require_once('connect.php');
    
    $connect = mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME);
    $error = mysqli_connect_error();
    if($error != null)
	{
		$output = "<p>Unable to connect to database</p><br/>".$error;
		exit($output);
	}
    
    //pulls the address from onboard api and coverts it to zid
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_URL, 'https://search.onboard-apis.com/propertyapi/v1.0.0/property/address?postalcode=02673&page=1&pagesize=10');
    $header = [
      "Accept: application/json",
      "apikey: 9610c4bb3eb43fde2a8cfe1bf02923a5"
    ];
    curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
    $result = curl_exec($curl);
    curl_close($curl);
    $json = json_decode($result, true);

    $zillow_id = 'X1-ZWz1fta8v2fbbf_4zss3';
    
    
    foreach($json['property'] as $info){
        $address = urlencode($info['address']['line1']);
        $city = urlencode($info['address']['line2']);
    //$address = urlencode("80-82 FENWOOD RD 612");   
    //$city = urlencode("BOSTON, MA 02115");
        
		$zid_url = "http://www.zillow.com/webservice/GetSearchResults.htm?zws-id=$zillow_id&address=$address&citystatezip=$city";
			
		$result = file_get_contents($zid_url);
		$data = simplexml_load_string($result);
		if($data->message->code == 0){
			$address = urldecode($address);
			$zpid = $data->response->results->result[0]->zpid;
			$url = "http://www.zillow.com/webservice/GetUpdatedPropertyDetails.htm?zws-id=$zillow_id&zpid=$zpid";
			$homeInfo = file_get_contents($url);
			$homeData = simplexml_load_string($homeInfo);
			$lat = "na";
			$lng = "na";
			$price = "na";
			$beds = "na";
			$baths = "na";
			$des = "na";
			//var_dump($homeData);
			//echo $homeData->response->editedFacts->bedrooms;
			if($homeData->response->address->latitude != Null){
				$lat = $homeData->response->address->latitude;
				$lng = $homeData->response->address->longitude;
			}
			if($homeData->response->editedFacts->price != Null){
				$price = $homeData->response->editedFacts->price;
			}
			if($homeData->response->editedFacts->bedrooms != Null){
				$beds = $homeData->response->editedFacts->bedrooms;
			}
			if($homeData->response->editedFacts->bathrooms != Null){
				$baths = $homeData->response->editedFacts->bathrooms;
			}
			if($homeData->response->homeDescription != Null){
				$des = mysqli_real_escape_string($connect, $homeData->response->homeDescription);
			}
			$city = $homeData->response->address->city;
			$homeQuery = "INSERT INTO house (address, zid, lat, lng, price, bed, bath, description, number, city) VALUES ('$address', '$zpid', '$lat', '$lng', '$price', '$beds', '$baths', '$des', Null, '$city')";
			
			if($connect->query($homeQuery)== TRUE){
				echo "house success";
			}else{
				echo $connect->error;
			}
		
			$homelink = $homeData->response->links->homeDetails;
			
			//gets images
			$i1 = $homeData->response->images->image->url[0];
			$i2 = $homeData->response->images->image->url[1];
			$i3 = $homeData->response->images->image->url[2];
			$i4 = $homeData->response->images->image->url[3];
			
			$linkQuery = "INSERT INTO links (zid, homelink, image1, image2, image3, image4) VALUES ('$zpid', '$homelink', '$i1', '$i2', '$i3', '$i4')";
			if($connect->query($linkQuery)==TRUE){
				echo "succcess";
			}else{
				echo $connect->error;
			}
		}else{
			echo $data->message->code;
		}
    }
?>