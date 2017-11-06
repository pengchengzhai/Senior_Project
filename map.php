
		<?php

			require_once('connect.php');
			$conn = mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME);
			$error = mysqli_connect_errno();
			
			if($error != null)
			{
				$output = "<p>Unable to connect to database</p><br/>".$error;
				exit($output);
			}
			$city = $_SESSION['city'];
			$sql = "SELECT lat, lng, address FROM `house` WHERE city = '$city'";
			
			$cordLat = array();
			$cordLng = array();
			$address = array();
			
			$result = $conn->query($sql);
			if($result->num_rows > 0){
				 while($row = $result->fetch_assoc()){
					 $lat = $row["lat"];
					 $lng = $row["lng"];
					 $cordLat[] = $lat;
					 $cordLng[] = $lng;
					 $address[] = urlencode($row["address"]);
				 }
			}
				echo 'var l ='. '["' . implode('","', $cordLat) . '"];' ;
				echo 'var l2 ='. '["' . implode('","', $cordLng) . '"];' ;
				echo 'var address ='. '["' . implode('","', $address) . '"];' ;
				
				echo 'function set(){
					for(i = 0; i < l.length; i++){
						addMarker(Number(l[i]),Number(l2[i]), address[i]);
						map.setCenter(l[i],l2[i]);
					}
				}';
				
				echo 'function addMarker(la, ln, ad){
                    var location = {lat: la, lng: ln};
                    var marker = new google.maps.Marker({
                    position: location,
					title: ad,
                    map: map
                    });
					marker.addListener(\'click\', function() {
					//alert(ad);
					document.location.href = "house.php?address=" + escape(ad);	
					});
                }';
		?>

    
