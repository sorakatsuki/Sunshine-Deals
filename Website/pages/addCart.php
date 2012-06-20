<?php

	include("connection.php");
	include '../template/header.php';
?>
<div id="content">
<div id="contact">
<p>
<?php
	$coupId = $_REQUEST['coupId'];	
	$acctId = $_REQUEST['acctId'];
	$today = date('Y-m-d H:i:s'); 	

	$query = "SELECT * FROM CART WHERE CART_COUP_ID = $coupId AND CART_ACCT_ID = $acctId";
	$result = mysql_query($query) or die(mysql_error());
	if(mysql_num_rows($result) != 0){
		echo "Your coupon already exist and has been incremented.";
		mysql_query("UPDATE CART SET CART_QUAN=CART_QUAN+1 WHERE CART_ACCT_ID=$acctId AND CART_COUP_ID=$coupId") or die(mysql_error());
		mysql_query("UPDATE COUPONS SET COUP_LEFT=COUP_LEFT-1 WHERE COUP_ID=$coupId") or die(mysql_error());	
	}else{
		echo "Your item has been added to your shopping cart.";
		mysql_query("INSERT INTO CART (CART_ACCT_ID, CART_COUP_ID, CART_QUAN, CART_DATE) VALUES ('$acctId', '$coupId', '1', '$today')") or die(mysql_error());
		mysql_query("UPDATE COUPONS SET COUP_LEFT=COUP_LEFT-1 WHERE COUP_ID=$coupId") or die(mysql_error());	
	}

	
	
	include("close.php");

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


