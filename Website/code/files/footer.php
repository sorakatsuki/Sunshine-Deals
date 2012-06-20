<?php
echo '<footer>';
echo '<div><ul><nav>';
echo '<a href="/pages/about.php"><li>About Us</li></a>';
echo "<a href='/pages/searchform.php'><li>Search</li></a>";
if(!isset($_SESSION['current_user'])){
echo '<a href="/pages/login.php"><li>Login</li></a>';
echo '<a href="/pages/register.php"><li>Register</li></a>';
echo '<a href="/pages/couponTable.php"><li>Browse</li></a>';
}
elseif($_SESSION['current_user'] >= 0){
	echo '<a href="/pages/couponTable.php"><li>Browse</li></a>';
        if($_SESSION['acctType'] == 1){
                echo "<a href='/pages/createCoupon.php?acctId=".$_SESSION['current_user']."'><li>Create Coupon</li></a>";
                echo "<a href='/pages/inventory.php?acctId=".$_SESSION['current_user']."'><li>Inventory</li></a>";
                echo "<a href='/pages/purchaseHistory.php?acctId=".$_SESSION['current_user']."'><li>Transactions</li></a>";
		echo "<a href='/pages/editAccount.php'><li>Settings</li></a>";
        }
        else{
                echo"<a href='/pages/shoppingCart.php?acctId=".$_SESSION['current_user']."'><li>Shopping Cart</li></a>";
                echo "<a href='/pages/purchaseHistory.php?acctId=".$_SESSION['current_user']."'><li>Purchase History</li></a>";
		echo "<a href='/pages/editAccount.php'><li>Settings</li></a>";
        }
	echo "<a href='/pages/logout.php'><li>Logout</li></a>";
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
