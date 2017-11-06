<?php
    
    $message = "name: ".$_POST['name']."\nemail: ".$_POST['email']."\nphone: ".$_POST['phone']."\n".$_POST['message'];
    $message = wordwrap($message, 70, "\r\n");
    //echo $message;
    mail('parkerk2@wit.edu', 'info request', $message);
    header("Location: index.html");
?>