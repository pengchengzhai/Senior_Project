<?php
    require_once('connect.php');
    
    $conn = mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME);
    $error = mysqli_connect_errno();
    
    if($error != null)
	{
		$output = "<p>Unable to connect to database</p><br/>".$error;
		exit($output);
	}
    
    $address = $_GET['address'];
    $sql = "SELECT price,description, bed, bath, number, image1, image2, image3, image4 FROM `house`, `links` WHERE house.zid = links.zid and address = '$address'";
    
    $result = $conn->query($sql);

    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $image1 = $row["image1"];
            $image2 = $row["image2"];
            $image3 = $row["image3"];
            $price = $row["price"];
            $bed = $row["bed"];
            $bath = $row["bath"];
            $number = $row["number"];
            $description = $row["description"];
            
            echo "<img src=\"$image1\" alt=\"\">
            </div>
								<div class=\"feature-desc\">
									<h2>Details</h2>
									<p>".$bed." Bed     ".$bath." Bath</p>
                                    <p>Price: $".$price."/mo </p>
									<p>contact info: ".$number."</p>
								</div>
							</div>
                            <div class=\"feature\">
								<div class=\"feature-image\">
									<img src=\"$image2\" alt=\"\">
								</div>
								<div class=\"feature-desc\">
									<h2>Description</h2>
									<p>".$description."</p>
								</div>
							</div>
							<div class=\"feature\">
								<div class=\"feature-image\">
									<img src=\"$image3\" alt=\"\">
								</div>
							</div>
                            </div> <!-- .house-feature -->

						<div class=\"price-area\">
							<div class=\"row\">
								<div class=\"col-md-4 col-md-offset-1\">
									<h2 class=\"price\">Contact Us</h2>
								</div>";
        }
    }
?>