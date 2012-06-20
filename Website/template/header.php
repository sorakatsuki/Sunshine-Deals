<?php
session_start();
include("connection.php");
echo '<!DOCTYPE html>';
echo '<html lang="en">';
echo '<head>';
echo '<meta charset="utf-8" />';
echo '<title>Sunshine Deals</title>';
echo '<link href="/styles/style.css" rel="stylesheet" type="text/css">';
echo '<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>';
echo '<script src="jquery.countdown1.2.js" type="text/javascript"></script>';
echo '<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->';
echo '</head>';
echo '<body>';
echo '<header>';
echo '<a href="/"><img src="/images/logo.png" alt="Sunshine Deals"></a>';
echo '<nav>';
echo '<ul>';
echo "<a href='/pages/searchform.php'><li>Search</li></a>";
if(!isset($_SESSION['current_user'])){
	echo '<a href="/pages/couponTable.php"><li>Browse</li></a>';
	echo '<a href="/pages/register.php"><li>Register</li></a>';
	echo '<a href="/pages/login.php"><li>Login</li></a>';
}
elseif($_SESSION['current_user'] >= 0){
	if($_SESSION['acctType'] == 1){
		echo "<a href='/pages/couponTable.php?acctId=".$_SESSION['current_user']."'><li>Browse</li></a>";
		echo"<a href='/pages/createCoupon.php?acctId=".$_SESSION['current_user']."'><li>Create Coupon</li></a>";
		echo "<a href='/pages/inventory.php?acctId=".$_SESSION['current_user']."'><li>Inventory</li></a>";
		echo "<a href='/pages/purchaseHistory.php?acctId=".$_SESSION['current_user']."'><li>Transactions</li></a>";
		echo "<a href='/pages/editAccount.php'><li>Settings</li></a>";
	}
	else{
		echo"<a href='/pages/couponTable.php?acctId=".$_SESSION['current_user']."'><li>Browse</li></a>";
		echo "<a href='/pages/shoppingCart.php?acctId=".$_SESSION['current_user']."'><li>Cart</li></a>";
		echo "<a href='/pages/purchaseHistory.php?acctId=".$_SESSION['current_user']."'><li>Purchase History</li></a>";
		echo "<a href='/pages/editAccount.php'><li>Settings</li></a>";
	}
	echo "<a href='/pages/logout.php'><li>Logout</li></a>";
}
echo '</ul>';
echo '</nav>';
echo '</header>';
?>
