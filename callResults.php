<?php
	session_start();
    require_once('connect.php');
    $conn = mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME);
	$error = mysqli_connect_errno();
    $city = $_POST['search'];
	//echo $city;
	if($error != null)
	{
		$output = "<p>Unable to connect to database</p><br/>".$error;
		exit($output);
	}
	$sql = "SELECT * `house` WHERE `city` = '$city'";
	$result = $conn->query($sql);
	//$result = mysqli_query($conn, $sql);
		$_SESSION['city'] = $city;
		header("Location: result.php");
		/*if($result->num_rows > 0){
			//$_POST['city'] = $city;
			//header("Location: result.php");
		}*/
	
	
	
    
?>
