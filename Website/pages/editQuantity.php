<?php
	include '../template/header.php';
?>
<div id="content">
<div id="quantity">
<h1>Edit Quantity</h1>
<?php
include("connection.php");

$coupId = $_REQUEST['coupId'];
$acctId = $_REQUEST['acctId'];

$query = "SELECT * FROM COUPONS WHERE COUP_ID = $coupId";
$result = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_array($result) or die (mysql_error());
$couponTableTotal = $row['COUP_TOTAL'];
$couponTableLeft = $row['COUP_LEFT'];
$couponImage = $row['COUP_IMGLOC'];
$couponName = $row['COUP_NAME'];
$query = "SELECT * FROM CART WHERE CART_ACCT_ID = $acctId AND CART_COUP_ID = $coupId";
$result = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_array($result) or die (mysql_error());
$customerQuantity = $row['CART_QUAN'];

echo "<p><div class='crop'><img src='$couponImage'/></div>$couponName</p>";
echo "<form action = 'updateQuantity.php'>";
echo "Quantity:<select name = 'quantity'>";
for($i=0;$i<=$couponTableLeft+$customerQuantity;$i++)
{
	if($i==$customerQuantity){
		echo "<option selected='selected' value='$i'>$i</option>";
	}else{
		echo "<option value='$i'>$i</option>";
	}
}
echo "</select>"; 

//$nestQuery = "SELECT * FROM COUPONS WHERE COUP.id IN(SELECT CART_COUP_ID FROM CART WHERE CART_ACCT_ID = $id))";
//$query = "SELECT * FROM COUPONS WHERE COUP_ID = $coupId";
//$result = mysql_query($query) or die(mysql_error());
//$row = mysql_fetch_array($result) or die(mysql_error());


//$vendor = $row['COUP_VENDOR'];
//echo $row['COUP_LEFT'];
?>
<p>Set quantity to 0 to delete from Shopping Cart.</p>

<input type="hidden" name="coupId" value="<?php echo $coupId ?>"  /> 
<input type="hidden" name="acctId" value="<?php echo $acctId ?>" />

<input class="button" type="submit" />
</form>
<?php
include("close.php");
?>
</div>
</div>
<?php
	include '../template/footer.php';
?>
