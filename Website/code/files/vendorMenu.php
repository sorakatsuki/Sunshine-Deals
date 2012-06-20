<?php
include '../template/headerPages.php';
?>
<div id="content">
<h1>Vendor Menu</h1>
<body>
<form action = "createCoupon.php"><button type="submit">Create Coupon</button></form>
<form action = "inventory.php"><button type="submit">Coupon Inventory</button></form>
<form action = "testShoppingCart.php"><button type="submit">Transactions</button></form>
<form action = "editAccount.php"><button type="submit">Edit Account</button></form>
</div>
<?php
        include '../template/footerPages.php';
?>
