<html>
<header><h1>Menu</h1></header>
<body>
<?php
include("connection.php");

	$acctId = $_REQUEST['acctId'];
	
$query = "SELECT * FROM ACCOUNTS WHERE ACCT_ID = $acctId";
$results = mysql_query($query) or die(mysql_error());

$row = mysql_fetch_array($results);

echo "Hello " .$row['ACCT_NAME'];

if($row['ACCT_TYPE']=='1'){
?>
<form action = "createCoupon.php"><input type="hidden" name="acctId" value="<?php echo $acctId ?>"  /><button type="submit">Create Coupon</button></form>
<form action = "inventory.php"><input type="hidden" name="acctId" value="<?php echo $acctId ?>"  /><button type="submit">Inventory</button></form>
<form action = "shoppingCart.php"><input type="hidden" name="acctId" value="<?php echo $acctId ?>"  /><button type="submit">Transactions</button></form>
<form action = "editAccount.php"><input type="hidden" name="acctId" value="<?php echo $acctId ?>"  /><button type="submit">Edit Account</button></form>
<?php
}else{
?>
<form action = "couponTable.php"><input type="hidden" name="acctId" value="<?php echo $acctId ?>"  /><button type="submit">Browse</button></form>
<form action = "search.php"><input type="hidden" name="acctId" value="<?php echo $acctId ?>"  /><button type="submit">Search</button></form>
<form action = "shoppingCart.php"><input type="hidden" name="acctId" value="<?php echo $acctId ?>"  /><button type="submit">Shopping Cart</button></form>
<form action = "purchaseHistory.php"><input type="hidden" name="acctId" value="<?php echo $acctId ?>"  /><button type="submit">Purchase History</button></form>
<form action = "editAccount.php"><input type="hidden" name="acctId" value="<?php echo $acctId ?>"  /><button type="submit">Edit Account</button></form>
<?php
}
include("close.php");
?>
</body>
</html>