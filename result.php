<?php session_start(); ?>
<html>
    <head>
        <style>
            #map {
            height: 100%;
            width: 75%;
            float: right;
            margin-top: 0px;
            }

            ul{
                list-style-type: none;
                margin: 0;
                padding: 0;
                overflow: hidden;
                background-color: #333;
            }
            li{
                float: left;
            }
            li a{
                display: block;
                color: white;
                text-align: center;
                padding: 14px 16px;
                text-decoration: none;
            }
            li a:hover{
                background-color: white;
            }
            .crime{
                align-items: flex-end;
				background-color: white;
            }
        </style>
        <meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">

		<title>Apartment Finder</title>
		<!-- Loading third party fonts -->
		<link href="http://fonts.googleapis.com/css?family=Titillium+Web:200,300,400,700|" rel="stylesheet" type="text/css">
		<link href="fonts/font-awesome.min.css" rel="stylesheet" type="text/css">
		<!-- Loading main css file -->
		<link rel="stylesheet" href="style.css">

		<!--[if lt IE 9]>
		<script src="js/ie-support/html5.js"></script>
		<script src="js/ie-support/respond.js"></script>
		<![endif]-->

    </head>
    <body class="homepage">
        <ul>
            <li><a class="active" href="index.html">Home</a></li>
            <li><a class="active" href="#about">About Us</a></li>
            <li><a class="active" href="#contact">Contact</a></li>

        </ul>
        <container>
        <section>
            <div id="map"></div>
            <script>
                var map;
				var inforwindow
				
                function initMap() {
                    var location = {lat: 42.3072, lng: -71.112};
                    map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 9,
                    center: location,
					scrollwheel: false
                    });
		
                    set();
                }
				<?php include 'map.php';?>
				
                /*function set(){
                    addMarker(cord[0][0], cord[0][1]);
                    addMarker(cord[1][0], cord[1][1]);
                    addMarker(cord[2][0], cord[2][1]);
                    addMarker(cord[3][0], cord[3][1]);
                    addMarker(cord[4][0], cord[4][1]);
                    addMarker(cord[5][0], cord[5][1]);
                    addMarker(cord[6][0], cord[6][1]);
                }
                function addMarker(la, ln){
                    var location = {lat: la, lng: ln};
                    var marker = new google.maps.Marker({
                    position: location,
                    map: map
                    });
                }*/

            </script>

            <script async defer
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBmG039XBrK_WbJ4W-Jx90MBXzHni0uu4M&callback=initMap">
            </script>
          </div>
        </section>
      </container>

        <section>
            <div class="crime">
                <div class="container">
                    <?php include 'crimeStats.php'; ?>
                </div>
            </div>
        </section>
        <section>
            <div class="fullwidth-block" data-bg-color="#2f2e3c" >
					<div class="container">
						<header bg-dark>
							<h2 class="section-title">Apartments Found</h2>
							<p class="section-desc">  <br> </p>
						</header>
                <div class="posts-list">
                    <?php include 'houseList.php'; ?>
                </div>
                <p class="text-center">
					<a href="house.html" class="button">See more houses</a>
				</p>
            </div>
        </div>
    </section>
    </body>
</html>
