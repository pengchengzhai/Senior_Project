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
    $sql = "SELECT * FROM `crimestats` WHERE city = '$city'";
    
    $result = $conn->query($sql);

    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            echo "<h2>".$row["city"]."</h2>";
            echo "<h4>Crime Stats</h4>";
            echo "<p>Murders: ".$row["muders"];
            echo "<p>Assault: ".$row["assault"];
            echo "<p>Rape: ".$row["rape"];
            echo "<p>Robberies: ".$row["robberies"];
            echo "<p>Burglaries: ".$row["burglaries"];
            echo "<p>Thefts: ".$row["thefts"];
            echo "<p>Autothefts: ".$row["autothefts"];
        }
    }
    //mysqli_close($connect);
?>