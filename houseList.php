<?php
	//session_start();
    require_once('connect.php');
    
    $conn = mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME);
    $error = mysqli_connect_errno();
    
    if($error != null)
	{
		$output = "<p>Unable to connect to database</p><br/>".$error;
		exit($output);
	}

    $city = $_SESSION['city'];
    $sql = "SELECT price, address,description, bed, bath, image1 FROM `house`, `links` WHERE house.zid = links.zid and city = '$city'";

   $result = $conn->query($sql);
   if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $address = $row["address"];
            $description = $row["description"];
            $image = $row["image1"];
            $price = $row["price"];
            $bed = $row["bed"];
            $bath = $row["bath"];
			$url = urlencode($address);
            
            
            echo "<div class=\"post\">";
            echo "<div class=\"post-content\">";
            echo "<h2 class=\"entry-title\"><a href=\"house.php?address=".$url."\">$address</a></h2>";
            echo "<figure class=\"featured-image\"><img src=\"$image\" alt=\"\"></figure>";
            echo "<p>$address</p>";
            echo "<p>$bed bed | $bath bath</p>";
            echo "<strong class=\"price\">$$price/mo</strong></div></div>";
        }
    }
    //mysqli_close($connect);
?>