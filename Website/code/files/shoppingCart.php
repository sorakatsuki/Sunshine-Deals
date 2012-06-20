<?php
        include('../template/header.php');
?>
<div id="content">
<div id="cart">
<h1>Shopping Cart</h1>


<?php
include("connection.php");

$acctId = $_REQUEST['acctId'];

$query1 = "SELECT COUPONS.COUP_NAME, COUPONS.COUP_PRICE, CART.CART_QUAN, COUPONS.COUP_IMGLOC, COUPONS.COUP_ID
FROM CART
LEFT JOIN COUPONS ON COUPONS.COUP_ID = CART.CART_COUP_ID
WHERE CART.CART_ACCT_ID =$acctId";

if(isset($_REQUEST['sort'])){
	switch ($_REQUEST['sort'])
	{
		case 'title':
		$query1 .= " ORDER BY COUPONS.COUP_NAME";
		break;
		case 'price':
		$query1 .= " ORDER BY COUPONS.COUP_PRICE";
		break;
		case 'quantity':
		$query1 .= " ORDER BY CART.CART_QUAN";
		break;
		default:
	}
}else{
	$query1 .= " ORDER BY COUPONS.COUP_ID";
}



$result1 = mysql_query($query1) or die(mysql_error());
	
$table = "CART";
$sum = 0;

echo "<table border=1>
<tr align = left>
<th><a href='shoppingCart.php?sort=title&acctId=$acctId'>Title</a></th>
<th class='quantity'><a href='shoppingCart.php?sort=quantity&acctId=$acctId'>Quantity</a></th>
<th><a href='shoppingCart.php?sort=price&acctId=$acctId'>Price</a></th>
</tr>";

while($row = mysql_fetch_array($result1))
  {
  $coupId = $row['COUP_ID'];
  $sum += $row['COUP_PRICE'] * $row['CART_QUAN'];
  echo "<tr>";
  echo "<td class='deal'>" . '<a href="viewCoupon.php?coupId='.$coupId.'&acctId='.$acctId.'"><div class="crop"><img name="myimage" src="'.$row['COUP_IMGLOC'].'" width="60" height="60" alt="image" /></div>' . $row['COUP_NAME'] . "</a></td>";
  echo "<td class='quantity'><a href='editQuantity.php?coupId=$coupId&acctId=$acctId'>" . $row['CART_QUAN'] . "</a></td>";
  echo "<td>$" . $row['COUP_PRICE'] . "</td>";
  echo "</tr>";
  }
	echo '<tr class="total">
		<td></td>
		<td></td>
		<td>$'.$sum.'</td>';
	echo '<tr>
                <td></td>
                <td></td>
                <td>Total</td>';
			
	echo "</table>";
	include("close.php");
?>
<a href="checkOut.php?acctId=<?php echo $acctId ?>" class="button">Check out</a>
</div>
</div>
<?php
	include('../template/footer.php');
?>
