<?php
session_start();
echo '<html lang="en">';
echo '<head>';
echo '<meta charset="utf-8" />';
echo '<title>Sunshine Deals</title>';
echo '<link href="../styles/style.css" rel="stylesheet" type="text/css">';
echo '<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script><script src="../jquery.countdown1.2.js" type="text/javascript"></script>';
echo '<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->';
echo '</head>';
echo '<body>';
echo '<header>';
echo '<a href="../"><img src="../images/logo.png" alt="Sunshine Deals"></a>';
echo '<nav>';
echo '<ul>';
echo '<a href="/pages/searchform.php"><li>Search</li></a>';
if(!isset($_SESSION['current_user'])){
echo '<a href="login.php"><li>Login</li></a>';
echo '<a href="register.php"><li>Register</li></a>';
echo '<a href="couponTable.php"><li>Browse</li></a>';
}
elseif($_SESSION['current_user'] == nil){
echo '<a href="login.php"><li>Login</li></a>';
echo '<a href="register.php"><li>Register</li></a>';
echo '<a href="couponTable.php"><li>Browse</li></a>';
}
elseif($_SESSION['current_user'] >= 0){
        if($_SESSION['acctType'] == 1){
                echo "<a href='couponTable.php?acctId=".$_SESSION['current_user']."'><li>Browse</li></a><a href='createCoupon.php?acctId=".$_SESSION['current_user']."'><li>Create Coupon</li></a>
                <a href='inventory.php?acctId=".$_SESSION['current_user']."'><li>Inventory</li></a>
                <a href='purchaseHistory.php?acctId=".$_SESSION['current_user']."'><li>Transactions</li></a>
                <a href='/pages/editAccount.php'><li>Settings</li></a>
		<!--<a href='editAccount.php?acctId=".$_SESSION['current_user']."'><li>Edit Account</li></a>-->";
        }
        else{
                echo"<a href='couponTable.php?acctId=".$_SESSION['current_user']."'><li>Browse</li></a>
                <a href='shoppingCart.php?acctId=".$_SESSION['current_user']."'><li>Shopping Cart</li></a>
                <a href='purchaseHistory.php?acctId=".$_SESSION['current_user']."'><li>Purchase History</li></a>
		<a href='/pages/editAccount.php'><li>Settings</li></a>
                <!--<a href='editAccount.php?acctId=".$_SESSION['current_user']."'><li>Edit Account</li></a>-->";
        }
	echo "<a href='logout.php'><li>Logout</li></a>";
}
echo '</ul>';
echo '</nav>';
echo '</header>';
?>
