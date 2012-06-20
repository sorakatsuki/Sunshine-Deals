<?php
	include '../template/header.php';
?>

<div id="content">
<div id="contact">

<h1>Process Check Out.</h1>
<?php
	include("connection.php");
	
	$month = $_REQUEST['month'];
	$year = $_REQUEST['year'];
	$bZip = $_REQUEST['bZip'];
	$bCity = $_REQUEST['bCity'];
	$bState = $_REQUEST['bState'];
	$bNumber = $_REQUEST['bNumber'];
	$bCode = $_REQUEST['bCode'];
	$bAddress = $_REQUEST['bAddress'];
	$bName = $_REQUEST['bName'];
	$bSubTotal = $_REQUEST['subTotal'];
	$acctId = $_REQUEST['acctId'];
	$lastFour = substr($bNumber, -4);
	$bNumber = sha1(md5($bNumber));
	$bCode = sha1(md5($bCode));
	
	$today = date('Y-m-d H:i:s');
	
	$query = "SELECT COUPONS.COUP_VENDOR, COUPONS.COUP_PRICE, CART.CART_QUAN, COUPONS.COUP_IMGLOC, COUPONS.COUP_ID FROM CART LEFT JOIN COUPONS ON COUPONS.COUP_ID = CART.CART_COUP_ID
	WHERE CART.CART_ACCT_ID = $acctId";
	$result = mysql_query($query) or die(mysql_error());
	
	while($row = mysql_fetch_array($result)){
		mysql_query("INSERT INTO PURCHASES (PUR_ACCT_ID, PUR_VENDNAME, PUR_COUP_ID, PUR_QUAN, PUR_PRICE, PUR_PAID, PUR_DATE, PUR_BADD, PUR_BCTY, PUR_BSTA, PUR_BZIP, PUR_BNAME, PUR_CCN, PUR_CCLFN, PUR_CCEX, PUR_CCSN) VALUES ('$acctId', '$row[COUP_VENDOR]', '$row[COUP_ID]', '$row[CART_QUAN]', '$row[COUP_PRICE]', '$bSubTotal', '$today', '$bAddress', '$bCity', '$bState', '$bZip', '$bName', '$bNumber', '$lastFour', '$year-$month-00 00:00:00','$bCode')") or die(mysql_error());

	}
	
	$query2 = "SELECT * FROM CART WHERE CART_ACCT_ID = $acctId";
	$result2 = mysql_query($query2);
	while($row = mysql_fetch_array($result2)){
		mysql_query("DELETE FROM CART WHERE CART_ACCT_ID = $acctId") or die(mysql_error());
	}	

	
	
	
	include("close.php");
?>


</div>
</div>
<?php
	include '../template/footer.php';
?>
