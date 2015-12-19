<?php
$username = "root";
$password = "usbw";
$hostname = "localhost:3307"; 

//connection to the database
$dbhandle = mysqli_connect($hostname, $username, $password, "jobs") 
  or die("Unable to connect to MySQL");
//echo "Connected to MySQL<br>";
?>