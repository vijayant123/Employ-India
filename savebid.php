<?php

include "includes/php/connection.php";

$bidAmt = $_REQUEST['bid'];
$bidUser = $_REQUEST['adhaar'];
$emp = $_REQUEST['employer'];

$results = mysqli_query($dbhandle, "INSERT INTO `jobs`.`bids` (`sno`, `bid`, `adhaar`, `employer`) VALUES (NULL, $bidAmt, $bidUser, \"$emp\")");
echo "Bid Placed";
print_r($results);
?>

<script>
	window.setTimeout(function() {
		history.go(-1);
	}, 1000);

</script>