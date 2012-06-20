<?php
	include '../template/header.php';
?>

<div id="content">
<div id="contact">
<h1>Coupon Added</h1>
<p>
<?php
	include("connection.php");
	
	$acctId = $_REQUEST['acctId'];
	
	$title = $_REQUEST["title"];
	$quantity = $_REQUEST["quantity"];
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

	
	mysql_query("INSERT INTO COUPONS (COUP_NAME, COUP_TOTAL, COUP_LEFT, COUP_PRICE, COUP_CATNAME, COUP_VENDOR, COUP_DESC, COUP_IMGLOC, COUP_START, COUP_EXPR) VALUES ('$title', '$quantity', '$quantity', '$price','$category','$vName','$description', '$url', '$sYear-$sMonth-$sDay $sHour:$sDay:00', '$year-$month-$day $hour:$day:00');");

	include("connection.php");

?>
</p>
</div>
</div>
<script>
window.setTimeout(function(){window.location = "http://sunshine.engr.sjsu.edu/pages/shoppingCart.php?acctId=<?php echo $acctId; ?>";}, 2000);
</script>
<?php
	include '../template/footer.php';
?>
