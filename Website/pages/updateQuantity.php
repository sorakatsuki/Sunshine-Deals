<?php
	include '../template/header.php';
?>

<div id="content">
<div id="contact">

<h1>Quantity Updated</h1>
<p>
<?php
include("connection.php");

$coupId = $_REQUEST['coupId'];
$acctId = $_REQUEST['acctId'];
$quantity = $_REQUEST['quantity'];

$query = "SELECT * FROM CART WHERE CART_COUP_ID = $coupId AND CART_ACCT_ID = $acctId";
$result = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_array($result) or die (mysql_error());
$currentQuantity = $row['CART_QUAN'];

if($quantity==0){
	echo "Removing Coupon from Shopping Cart.";
	mysql_query("DELETE FROM CART WHERE CART_ACCT_ID = $acctId AND CART_COUP_ID = $coupId") or die(mysql_error());
	mysql_query("UPDATE COUPONS SET COUP_LEFT=COUP_LEFT+$currentQuantity WHERE COUP_ID=$coupId") or die(mysql_error());	
}elseif($currentQuantity < $quantity){
	$sum = $quantity - $currentQuantity;
	echo "Increasing Quantity by $sum.";
	mysql_query("UPDATE CART SET CART_QUAN=CART_QUAN+$sum WHERE CART_ACCT_ID=$acctId AND CART_COUP_ID = $coupId") or die(mysql_error());
	mysql_query("UPDATE COUPONS SET COUP_LEFT=COUP_LEFT-$sum WHERE COUP_ID=$coupId") or die(mysql_error());
}elseif($currentQuantity > $quantity){
	$sum = $currentQuantity - $quantity;
	echo "Decreasing Quantity by $sum.";
	mysql_query("UPDATE CART SET CART_QUAN=CART_QUAN-$sum WHERE CART_ACCT_ID=$acctId AND CART_COUP_ID = $coupId") or die(mysql_error());
	mysql_query("UPDATE COUPONS SET COUP_LEFT=COUP_LEFT+$sum WHERE COUP_ID=$coupId") or die(mysql_error());	
}else{
	echo "No changes have been made.";
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
