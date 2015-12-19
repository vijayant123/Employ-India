<?php

include "includes/php/connection.php";


$bidUser = $_REQUEST['adhaar'];



$results = mysqli_query($dbhandle, "SELECT * FROM `jobs`.`bids` WHERE `adhaar` =  $bidUser");

print_r($results->fetch_all());
?>