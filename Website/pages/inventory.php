<?php
	include '../template/header.php';
?>
<div id="content">
<div id="cart">
<h1>Inventory</h1>


<?php
include("connection.php");

$acctId = $_REQUEST['acctId'];

$query = "SELECT *
FROM COUPONS
LEFT JOIN ACCOUNTS ON ACCOUNTS.ACCT_NAME = COUPONS.COUP_VENDOR
WHERE ACCOUNTS.ACCT_ID = $acctId";

if(isset($_REQUEST['sort'])){
switch ($_REQUEST['sort'])
{
case 'id':
$query .= " ORDER BY COUPONS.COUP_ID";
break;
case 'title':
$query .= " ORDER BY COUPONS.COUP_NAME";
break;
case 'total':
$query .= " ORDER BY COUPONS.COUP_TOTAL";
break;
case 'left':
$query .= " ORDER BY COUPONS.COUP_LEFT";
break;
case 'price':
$query .= " ORDER BY COUPONS.COUP_PRICE";
break;
case 'category':
$query .= " ORDER BY COUPONS.COUP_CATNAME";
break;  
case 'vendor':
$query .= " ORDER BY COUPONS.COUP_VENDOR";
break;
case 'desc':
$query .= " ORDER BY COUPONS.COUP_DESC";
break;
case 'start':
$query .= " ORDER BY COUPONS.COUP_START";
break;  
case 'end':
$query .= " ORDER BY COUPONS.COUP_EXPR";
break;  
default:

}
}else{
$query .= " ORDER BY COUPONS.COUP_ID";
}
//echo $result;

$result = mysql_query($query) or die(mysql_error());

echo"
<table border='1'>
<tr align = left>
<th>IMG</a></th>
<th><a href='inventory.php?sort=id&acctId=$acctId'>ID</a></th>
<th><a href='inventory.php?sort=title&acctId=$acctId'>Title</a></th>
<th><a href='inventory.php?sort=total&acctId=$acctId'>Quantity</a></th>
<th><a href='inventory.php?sort=left&acctId=$acctId'>Left</a></th>
<th><a href='inventory.php?sort=price&acctId=$acctId'>Price</a></th>
<th><a href='inventory.php?sort=category&acctId=$acctId'>Category</a></th>
<th><a href='inventory.php?sort=vendor&acctId=$acctId'>Vendor</a></th>
<th><a href='inventory.php?sort=desc&acctId=$acctId'>Description</a></th>
<th><a href='inventory.php?sort=start&acctId=$acctId'>Start Date</a></th>
<th><a href='inventory.php?sort=end&acctId=$acctId'>End Date</a></th>
</tr>";

while($row = mysql_fetch_array($result))
{
$coupId = $row['COUP_ID'];
echo "<tr>";
echo '<td><img name="myimage" src="'.$row['COUP_IMGLOC'].'" width="60" height="60" alt="image" /></td>';
echo "<td><a href='editCoupon.php?coupId=$coupId&acctId=$acctId'>" . $row['COUP_ID'] . "</a></td>";
echo "<td>" . $row['COUP_NAME'] . "</td>";
echo "<td>" . $row['COUP_TOTAL'] . "</td>";
echo "<td>" . $row['COUP_LEFT'] . "</td>";
echo "<td>" . $row['COUP_PRICE'] . "</td>";
echo "<td>" . $row['COUP_CATNAME'] . "</td>";
echo "<td>" . $row['COUP_VENDOR'] . "</td>";
echo "<td>" . $row['COUP_DESC'] . "</td>";
echo "<td>" . $row['COUP_START'] . "</td>";
echo "<td>" . $row['COUP_EXPR'] . "</td>";
echo "</tr>";
}

echo "</table>";
include("connection.php");
?>



</div>
</div>
<?php
	include '../template/footer.php';
?>
