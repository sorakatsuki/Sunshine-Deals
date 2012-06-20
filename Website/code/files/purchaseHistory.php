<?php
	include '../template/header.php';
?>

<div id="content">
<div id="cart">

<h1>Purchase History</h1>


<?php
include("connection.php");

$acctId = $_REQUEST['acctId'];
$result = mysql_query("SELECT * FROM ACCOUNTS WHERE ACCT_ID = $acctId");
$type = mysql_fetch_array($result);

if($type['ACCT_TYPE'] == 0){
$query1 = "SELECT *
FROM PURCHASES
LEFT JOIN COUPONS ON COUPONS.COUP_ID = PURCHASES.PUR_COUP_ID
WHERE PURCHASES.PUR_ACCT_ID =$acctId";

if(isset($_REQUEST['sort'])){
	switch ($_REQUEST['sort'])
	{
		case 'title':
		$query1 .= " ORDER BY COUPONS.COUP_NAME";
		break;
		case 'vendor':
		$query1 .= " ORDER BY COUPONS.COUP_VENDOR";
		break;
		case 'card':
		$query1 .= " ORDER BY PURCHASES.PUR_CCLFN";
		break;
		case 'price':
		$query1 .= " ORDER BY COUPONS.COUP_PRICE";
		break;
		case 'quantity':
		$query1 .= " ORDER BY PURCHASES.PUR_QUAN";
		break;
		case 'paid':
		$query1 .= " ORDER BY PURCHASES.PUR_PAID";
		break;
		case 'date':
		$query1 .= " ORDER BY PURCHASES.PUR_DATE";
		break;
		default:
	}
}else{
	$query1 .= " ORDER BY COUPONS.COUP_ID";
}



$result1 = mysql_query($query1) or die(mysql_error());
	

echo "<table border=1>
<tr align = left>
<th><a href='purchaseHistory.php?sort=title&acctId=$acctId'>Title</a></th>
<th><a href='purchaseHistory.php?sort=vendor&acctId=$acctId'>Vendor</a></th>
<th><a href='purchaseHistory.php?sort=card&acctId=$acctId'>Credit Card</a></th>
<th><a href='purchaseHistory.php?sort=price&acctId=$acctId'>Price</a></th>
<th><a href='purchaseHistory.php?sort=quantity&acctId=$acctId'>Quantity</a></th>
<th><a href='purchaseHistory.php?sort=paid&acctId=$acctId'>Paid</a></th>
<th><a href='purchaseHistory.php?sort=date&acctId=$acctId'>Date</a></th>
</tr>";

while($row = mysql_fetch_array($result1))
  {
  $coupId = $row['COUP_ID'];
  echo "<tr>";
  echo "<td>" . $row['COUP_NAME'] . "</td>";
  echo "<td>" . $row['COUP_VENDOR'] . "</td>";
  echo "<td>********" . $row['PUR_CCLFN'] . "</td>";
  echo "<td>" . $row['COUP_PRICE'] . "</td>";
  echo "<td>" . $row['PUR_QUAN'] . "</td>";
  echo "<td>" . $row['PUR_PAID'] . "</td>";
  echo "<td>" . $row['PUR_DATE'] . "</td>";

  echo "</tr>";
  }
	
	echo "</table>";
}else{





$result = mysql_query("SELECT * FROM ACCOUNTS WHERE ACCT_ID = $acctId") or die (mysql_error()); 
$row = mysql_fetch_array($result) or die (mysql_error()); 
$vendorName = $row['ACCT_NAME'];
$query1 = "SELECT * FROM PURCHASES WHERE PUR_VENDNAME='$vendorName'";

if(isset($_REQUEST['sort'])){
	switch ($_REQUEST['sort'])
	{
		case 'name':
		$query1 .= " ORDER BY PURCHASES.PUR_BNAME";
		break;
		case 'price':
		$query1 .= " ORDER BY PURCHASES.PUR_PRICE";
		break;
		case 'quantity':
		$query1 .= " ORDER BY PURCHASES.PUR_QUAN";
		break;		
		case 'paid':
		$query1 .= " ORDER BY PURCHASES.PUR_PAID";
		break;	
		case 'date':
		$query1 .= " ORDER BY PURCHASES.PUR_DATE";
		break;			
		case 'address':
		$query1 .= " ORDER BY PURCHASES.PUR_BADD";
		break;
		case 'city':
		$query1 .= " ORDER BY PURCHASES.PUR_BCTY";
		break;		
		case 'state':
		$query1 .= " ORDER BY PURCHASES.PUR_BSTA";
		break;			
		case 'zip':
		$query1 .= " ORDER BY PURCHASES.PUR_BZIP";
		break;		
		case 'leftFour':
		$query1 .= " ORDER BY PURCHASES.PUR_CCLFN";
		break;			
		case 'expr':
		$query1 .= " ORDER BY PURCHASES.PUR_CCEX";
		break;			
		default:
	}
	
}else{
	$query1 .= " ORDER BY PURCHASES.PUR_DATE";
}

$result1 = mysql_query($query1) or die(mysql_error());
	

echo "<table border=1>
<tr align = left>
<th><a href='purchaseHistory.php?sort=name&acctId=$acctId'>Name</a></th>
<th><a href='purchaseHistory.php?sort=price&acctId=$acctId'>Price</a></th>
<th><a href='purchaseHistory.php?sort=quantity&acctId=$acctId'>Quantity</a></th>
<th><a href='purchaseHistory.php?sort=paid&acctId=$acctId'>Paid</a></th>
<th><a href='purchaseHistory.php?sort=date&acctId=$acctId'>Date</a></th>
<th><a href='purchaseHistory.php?sort=address&acctId=$acctId'>Address</a></th>
<th><a href='purchaseHistory.php?sort=city&acctId=$acctId'>City</a></th>
<th><a href='purchaseHistory.php?sort=state&acctId=$acctId'>State</a></th>
<th><a href='purchaseHistory.php?sort=zip&acctId=$acctId'>Zip</a></th>
<th><a href='purchaseHistory.php?sort=leftFour&acctId=$acctId'>Left Four</a></th>
<th><a href='purchaseHistory.php?sort=expr&acctId=$acctId'>Expiration</a></th>
</tr>";

while($row = mysql_fetch_array($result1))
  {
  echo "<tr>";
  echo "<td>" . $row['PUR_BNAME'] . "</td>";
  echo "<td>" . $row['PUR_PRICE'] . "</td>";
  echo "<td>" . $row['PUR_QUAN'] . "</td>";
  echo "<td>" . $row['PUR_PAID'] . "</td>";
  echo "<td>" . $row['PUR_DATE'] . "</td>";
  echo "<td>" . $row['PUR_BADD'] . "</td>";
  echo "<td>" . $row['PUR_BCTY'] . "</td>";
  echo "<td>" . $row['PUR_BSTA'] . "</td>";
  echo "<td>" . $row['PUR_BZIP'] . "</td>";
  echo "<td>" . $row['PUR_CCLFN'] . "</td>";
  echo "<td>" . $row['PUR_CCEX'] . "</td>";
  echo "</tr>";
  }
	
	echo "</table>";
}
	include("close.php");
?>

</div>
</div>
<?php
	include '../template/footer.php';
?>


