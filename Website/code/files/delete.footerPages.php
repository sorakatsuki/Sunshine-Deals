<?php
echo '<footer>';
echo '<div><nav><ul>';
echo '<a href="/pages/about.php"><li>About Us</li></a>';
echo '<a href="couponTable.php"><li>Browse</li></a>';
if(!isset($_SESSION['current_user'])){
echo '<a href="login.php"><li>Login</li></a>';
echo '<a href="register.php"><li>Register</li></a>';
}
elseif($_SESSION['current_user'] == nil){
echo '<a href="login.php"><li>Login</li></a>';
echo '<a href="register.php"><li>Register</li></a>';
}
elseif($_SESSION['current_user'] >= 0){
        if($_SESSION['acctType'] == 1){
		echo '<a href="couponTable.php"><li>Browse</li></a>';
                echo "<a href='createCoupon.php?acctId=".$_SESSION['current_user']."'><li>Create Coupon</li></a>
                <a href='inventory.php?acctId=".$_SESSION['current_user']."'><li>Inventory</li></a>
                <a href='transaction.php?acctId=".$_SESSION['current_user']."'><li>Transactions</li></a>
                <a href='/pages/editAccount.php'><li>Settings</li></a>
                <!--<a href='editAccount.php?acctId=".$_SESSION['current_user']."'><li>Edit Account</li></a>-->";
        }
        else{
                echo"<a href='couponTable.php?acctId=".$_SESSION['current_user']."'><li>Search</li></a>
                <a href='shoppingCart.php?acctId=".$_SESSION['current_user']."'><li>Shopping Cart</li></a>
                <a href='purchaseHistory.php?acctId=".$_SESSION['current_user']."'><li>Purchase History</li></a>
                <a href='/pages/editAccount.php'><li>Settings</li></a>
                <!--<a href='editAccount.php?acctId=".$_SESSION['current_user']."'><li>Edit Account</li></a>-->";
        }
	echo "<a href='logout.php'><li>Logout</li></a>";
}

echo '</ul></nav></div>';
echo '<a href="http://play.google.com/store/apps/details?id=com.sunshinewonderkids.sunshinedeals">
  <img alt="Get it on Google Play"
       src="http://www.android.com/images/brand/get_it_on_play_logo_small.png" />
</a>';
echo '<img src="../images/app-store_coming-soon.png"/>';
echo '<span> </span><img src="../images/wp7_marketplace.png"/>';
echo '<span> </span><img src="../images/palm-app-store.png"/>';
echo '<span> </span><img src="../images/bb-appworld.png"/>';
echo '</footer></body></html>';
?>
