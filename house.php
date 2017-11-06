<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">

		<title>Housing info</title>
		<!-- Loading third party fonts -->
		<link href="http://fonts.googleapis.com/css?family=Titillium+Web:200,300,400,700|" rel="stylesheet" type="text/css">
		<link href="fonts/font-awesome.min.css" rel="stylesheet" type="text/css">
		<!-- Loading main css file -->
		<link rel="stylesheet" href="style.css">

		<!--[if lt IE 9]>
		<script src="js/ie-support/html5.js"></script>
		<script src="js/ie-support/respond.js"></script>
		<![endif]-->

		<style>
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
                background-color: #4CAF50;
            }
        </style>
	</head>


	<body class="single">
		<ul>
            <li><a class="active" href="index.html">Home</a></li>
						<li><a id="myBtn"  href="#about">About Us</a></li>
            <li><a href="#click_jump">Contact</a></li>


        </ul>
				<style>
				/* The Modal (background) */
				.modal {
						display: none; /* Hidden by default */
						position: fixed; /* Stay in place */
						z-index: 1; /* Sit on top */
						padding-top: 100px; /* Location of the box */
						left: 0;
						top: 0;
						width: 100%; /* Full width */
						height: 100%; /* Full height */
						overflow: auto; /* Enable scroll if needed */
						background-color: rgb(0,0,0); /* Fallback color */
						background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
				}

				/* Modal Content */
				.modal-content {
						background-color: #4baf50;
						margin: auto;
						padding: 20px;
						border: 1px solid #888;
						width: 80%;
						color:white;
				}

				/* The Close Button */
				.close {
						color: white;
						float: right;
						font-size: 28px;
						font-weight: bold;
				}

				.close:hover,
				.close:focus {
						color: white;
						text-decoration: none;
						cursor: pointer;
				}
				</style>

				<div id="myModal" class="modal">

					<!-- Modal content -->
					<div class="modal-content">
						<span class="close">&times;</span>
						<p>Apartments Finder:<p>
							<p>We are here to help find perfect apartments for you with safe neighbour.
							We supply crime stats for each city or town that is search</p>
					</div>

				</div>

				<script>
				// Get the modal
				var modal = document.getElementById('myModal');

				// Get the button that opens the modal
				var btn = document.getElementById("myBtn");

				// Get the <span> element that closes the modal
				var span = document.getElementsByClassName("close")[0];

				// When the user clicks the button, open the modal
				btn.onclick = function() {
						modal.style.display = "block";
				}

				// When the user clicks on <span> (x), close the modal
				span.onclick = function() {
						modal.style.display = "none";
				}

				// When the user clicks anywhere outside of the modal, close it
				window.onclick = function(event) {
						if (event.target == modal) {
								modal.style.display = "none";
						}
				}
				</script>
		<div id="site-content">



			<main class="main-content">

        <div>
				<div class="fullwidth-block content">
					<div class="container">
						<h2 class="leading"><?php echo $_GET['address'];?></h2>
						<div class="house-feature">
							<div class="feature">
								<div class="feature-image">
									<?php include 'houseDetail.php'; ?>




								<div id="click_jump" class="col-md-5 col-md-offset-1">
									<div class="request-form">
										<form action="email.php" method="post">
											<div class="field">
												<label for="#">Your name:</label>
												<input type="text" name="name">
											</div> <!-- .field -->
											<div class="field-column row">
												<div class="col-sm-6">
													<div class="field">
														<label for="">Email:</label>
														<input type="text" name="email">
													</div>
												</div>
												<div class="col-sm-6">
													<div class="field">
														<label for="">Phone:</label>
														<input type="text" name="phone">
													</div>
												</div>
											</div> <!-- .field-column -->
											<div class="field">
												<label for="#">Street:</label>
												<input type="text" name="street">
											</div> <!-- .field -->
											<div class="field">
												<label for="#">City:</label>
												<input type="text" name="city">
											</div> <!-- .field -->
											<div class="field>
												<label for="#">Message:</label>
												<input type="text" name="message">
											</div>
											<input type="submit" value="Send a request">
										</form>
									</div> <!-- .request-form -->
								</div>
							</div>
						</div>
					</div>
				</div>
				</div> <!-- .fullwidth-block -->

			</main> <!-- .main-content -->

			<!--<footer class="site-footer">
				<div class="container">
					<div class="row">
						<div class="col-md-4">
							<div class="widget">
								<h3 class="widget-title">Contact</h3>
								<strong>Company Name INC</strong>
								<address>325 Avenue Street, New York</address>
								<a href="tel:450325763542">(450) 325 763 542</a> <br>
								<a href="mailto:office@companyname.com">office@companyname.com</a>
							</div> <!-- .widget-title -->
						</div>
						<div class="col-md-4">
						<!--	<div class="widget">
								<h3 class="widget-title">Social Media</h3>-->
					<!--			<div class="social-links">
									<a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
									<a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
									<a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
									<a href="#" class="pinterest"><i class="fa fa-pinterest"></i></a>
								</div>-->
							</div> <!-- .widget-title -->
						</div>
						<div class="col-md-4">
					<!--		<div class="widget">
								<h3 class="widget-title">Join our newsletter</h3>
								<form action="#" class="subscribe">
									<input type="email" placeholder="Enter your email...">
									<input type="submit" value="sign up">
								</form>
							</div> <!-- .widget-title -->-->
						</div>

				</div> <!-- .container -->
			</footer> <!-- .site-footer -->-->

		</div> <!-- #site-content -->

		<script src="js/jquery-1.11.1.min.js"></script>
		<script src="js/plugins.js"></script>
		<script src="js/app.js"></script>

	</body>

</html>
