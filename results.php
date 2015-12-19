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

$exp = (strlen($exp) == 0) ? '%' : $exp;
$lang = (strlen($lang) == 0) ? '%' : $lang;
$salFrom = (strlen($salFrom) == 0) ? '%' : $salFrom;
$salTo = (strlen($salTo) == 0) ? '%' : $salTo;
$marks = (strlen($marks) == 0) ? '%' : $marks;

function check($val) {
	return ($val == '%') ? FALSE : TRUE;
}

$sql = "SELECT * FROM `data` WHERE 1";
if (check($gender))
	$sql .= " AND `Gender` = \"$gender\" ";
if (check($sector))
	$sql .= " AND `Sector of Training` = \"$sector\" ";
if (check($police))
	$sql .= " AND `Police Verification done in the last year?` = \"$police\" ";
if (check($marr))
	$sql .= " AND `Marital Status` = \"$marr\" ";
if (check($edu))
	$sql .= " AND `Highest Education` = \"$edu\" ";
if (check($cert))
	$sql .= " AND `Certificate Available?` = \"$cert\" ";
if (check($ca))
	$sql .= " AND `Certifying Agency` = \"$ca\" ";
if (check($marks))
	$sql .= " AND `Marks Received` >= $marks ";
if (check($exp))
	$sql .= " AND `Previous Work Experience (years)` >= $exp ";
if (check($salFrom))
	$sql .= " AND  `Previous monthly salary drawn (Rs.)` >= $salFrom ";
if (check($salTo))
	$sql .= " AND `Previous monthly salary drawn (Rs.)` <= $salTo ";
if (check($lang))
	$sql .= " AND `Mother Tongue` LIKE \"$lang\"";
//echo $sql;
$results = mysqli_query($dbhandle, $sql);
$results = $results -> fetch_all();
//print_r($results);
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<title>Results | Employ India</title>

		<!-- Bootstrap -->
		<link href="css/bootstrap.min.css" rel="stylesheet">

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body style="width: 1000px;margin: auto">
		<h1>Search Results</h1>
		<?php foreach ($results as $key => $value):

		$name = $value[0];
		$gend = ($value[1] == 'M')?'Male' : 'Female';

		?>

		<div class="jumbotron">
			<div class="container">
				<h1><?php echo $name ?></h1>
				<p>
					<?php echo $gend . "  " . $value[17] . " : " . $value[18] ?>
				</p>
				<p>
					<a class="btn btn-primary btn-lg" href="./viewEmployer.php?adhaar=<?php echo $value[11] ?>" role="button">HIRE THIS PERSON</a>
				</p>
			</div>
		</div>

		<?php endforeach ?>
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="js/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>