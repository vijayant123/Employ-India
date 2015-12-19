<?php

include "includes/php/connection.php";

$bidUser = $_REQUEST['adhaar'];
$bidFlag = TRUE;
$bids = mysqli_query($dbhandle, "SELECT * FROM `jobs`.`bids` WHERE `adhaar` =  $bidUser");
$details = mysqli_query($dbhandle, "SELECT * FROM `data` WHERE `Aadhaar Number` = $bidUser");
$bids = $bids -> fetch_all();
$details = $details -> fetch_all();
if (count($details) > 0)
	$detail = $details[0];
else
	exit("User not Found");
if (count($bids) == 0)
	$bidFlag = FALSE;
//print_r($detail);
$gend = ($detail[1] == 'M') ? 'Male' : 'Female';
$adhaar = $detail[11];
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<title>Place Bids | Employ India</title>

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
	<center><h1>Employee Profile</h1></center>
		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >

			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title"><?php echo $detail[0] ?></h3>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-3 col-lg-3 " align="center">
							<img alt="User Pic" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=100" class="img-circle">
						</div>
						<div class=" col-md-9 col-lg-9 ">
							<table class="table table-user-information">
								<tbody>
									<tr>
										<td>Sector of Training:</td>
										<td><?php echo $detail[17] ?></td>
									</tr>
									<tr>
										<td>Course of Training:</td>
										<td><?php echo $detail[18] ?></td>
									</tr>
									<tr>
										<td>Gender:</td>
										<td><?php echo $gend ?></td>
									</tr>
									<tr>
										<td>Date of Birth</td>
										<td><?php echo $detail[2] ?></td>
									</tr>

									<tr>
									<tr>
										<td>Category:</td>
										<td><?php echo $detail[3] ?></td>
									</tr>
									<tr>
										<td>Education:</td>
										<td><?php echo $detail[14] ?></td>
									</tr>
									<tr>
										<td>Marital Status:</td>
										<td><?php echo $detail[5] ?></td>
									</tr>
									<tr>
										<td>Home Address:</td>
										<td><?php echo $detail[8] . ', ' . $detail[7] ?></td>
									</tr>
									<tr>
										<td>Police Verified:</td>
										<td><?php echo $detail[10] ?></td>
									</tr>
									<tr>
										<td>Email:</td>
										<td><a href="mailto:<?php echo $detail[12] ?>"><?php echo $detail[12] ?></a></td>
									</tr>
									<td>Phone Number:</td>
									<td><?php echo $detail[13] ?> </td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				</div>
				<br />
				<br />				
	<center><h1>Employee Bids</h1>
<?php
if ($bidFlag) {
	foreach ($bids as $key => $value) {
		echo <<<TTT
		<button class="btn btn-primary" type="button">
  $value[3] <span class="badge">$value[1]</span>
</button><br />
TTT;

	}

} else {
	echo "<center><h3>Employee has no bids. Be the first one to bid!</h3></center>";
}
	?>
	
	<h2>Place your bid!</h2>
	<form action="./savebid.php" method="post">
		<br />
		<input type="text" name="employer" placeholder="Enter your Organisation's Name..." />
		<br />
		<input type="text" name="bid" placeholder="Enter your Bid in rupees..." />
		<br />
		<input type="hidden" name="adhaar" value="<?php echo $adhaar ?>" />
		<input type="submit" name="Place Bid" />
	</form>
	
	</center>
				</div>
				<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
				<script src="js/jquery.min.js"></script>
				<!-- Include all compiled plugins (below), or include individual files as needed -->
				<script src="js/bootstrap.min.js"></script>
	</body>
</html>