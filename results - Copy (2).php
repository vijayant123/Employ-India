<?php

include "includes/php/connection.php";


//$_REQUEST



$results = mysqli_query($dbhandle, "SELECT * FROM `data` WHERE `Sector of Training` = \"Hospitality\"");

print_r($results->fetch_all());
?>