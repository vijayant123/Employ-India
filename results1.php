<?php

include "includes/php/connection.php";

$gender = $_REQUEST['catID'];
$sector = $_REQUEST['sector'];
$police = $_REQUEST['pv'];
$marr = $_REQUEST['ms'];
$edu = $_REQUEST['he'];
$exp = $_REQUEST['exp'];
$salFrom = $_REQUEST['sal1'];
$salTo = $_REQUEST['sal2'];
$lang = $_REQUEST['lang'];
$cert = $_REQUEST['cert'];
$ca = $_REQUEST['ca'];
$marks = $_REQUEST['marks'];

$gender = ($gender == '*') ? '%' : $gender;
$sector = ($sector == '*') ? '%' : $sector;
$police = ($police == '*') ? '%' : $police;
$marr = ($marr == '*') ? '%' : $marr;
$edu = ($edu == '*') ? '%' : $edu;
$cert = ($cert == '*') ? '%' : $cert;
$ca = ($ca == '*') ? '%' : $ca;

$sql = "SELECT * FROM `data` WHERE `Gender` = $gender AND `Sector of Training` = $sector AND `Police Verification done in the last year?` = $police AND `Marital Status` = $marr AND `Highest Education` = $edu AND `Certificate Available?` = $cert AND `Certifying Agency` = $ca AND `Marks Received` >= $marks AND `Previous Work Experience (years)` >= $exp AND  `Previous monthly salary drawn (Rs.)` >= $salFrom AND `Previous monthly salary drawn (Rs.)` <= $salTo AND `Mother Tongue` LIKE $lang";

$results = mysqli_query($dbhandle, $sql);

print_r($results -> fetch_all());
?>