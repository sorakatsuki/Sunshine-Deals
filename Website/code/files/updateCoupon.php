<?php
	include("connection.php");

	$coupId = $_REQUEST['coupId'];
	$acctId = $_REQUEST['acctId'];

	$title = $_REQUEST["title"];
	$quantity = $_REQUEST["quantity"];
	$left = $_REQUEST["left"];
	$price = $_REQUEST["price"];
	$category = $_REQUEST["category"];
	$vName = $_REQUEST["vName"];
	$description = $_REQUEST["description"];
	$month = $_REQUEST["month"];
	$day = $_REQUEST["day"];
	$year = $_REQUEST["year"];
	$hour = $_REQUEST["hour"];
	$minute = $_REQUEST["minute"];
	$sMonth = $_REQUEST["sMonth"];
	$sDay = $_REQUEST["sDay"];
	$sYear = $_REQUEST["sYear"];
	$sHour = $_REQUEST["sHour"];
	$sMinute = $_REQUEST["sMinute"];
	$url = $_REQUEST["url"];
	
	echo "'$title', $quantity, $quantity, $price, '$category', '$vName', '$description', '2012-04-14 21:28:49', '2012-04-14 21:28:49'";

	
	mysql_query("UPDATE COUPONS SET COUP_NAME='$title', COUP_TOTAL='$quantity', COUP_LEFT='$left', COUP_PRICE='$price', COUP_CATNAME='$category', COUP_VENDOR='$vName', COUP_DESC='$description', COUP_IMGLOC='$url', COUP_START='$sYear-$sMonth-$sDay $sHour:$sDay:00', COUP_EXPR='$year-$month-$day $hour:$day:00' WHERE COUP_ID = $coupId");

	include("close.php");

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
	"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Refresh" content="5;url=inventory.php?acctId=<?php echo $acctId?>" />
		<title>Coupon Information</title>
	</head>
	
	<body>
		<h1>Thank You</h1>
		<p>
			Your request has been processed.
		</p>
	</body>
</html>