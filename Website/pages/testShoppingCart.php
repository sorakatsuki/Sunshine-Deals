<?php
include '../template/headerPages.php';
?>
<header><script src="sorttable.js"></script></header>
<div id="content">
<div id="cart">
<table border='1'>
<tr align = left>
<th><a href="testShoppingCart.php?sort=title">Title</a></th>
<th><a href="testShoppingCart.php?sort=desc">Description</a></th>
<th><a href="testShoppingCart.php?sort=price">Price</a></th>
</tr>

<?php
include("connection.php");

$result = "SELECT * FROM COUPONS";



switch ($_REQUEST['sort'])
{
case 'id':
  $result .= " ORDER BY COUP_ID";
  break;
case 'title':
  $result .= " ORDER BY COUP_NAME";
  break;
case 'total':
  $result .= " ORDER BY COUP_TOTAL";
  break;
case 'left':
  $result .= " ORDER BY COUP_LEFT";
  break;
 case 'price':
  $result .= " ORDER BY COUP_PRICE";
  break;
case 'category':
  $result .= " ORDER BY COUP_CATNAME";
  break;  
case 'vendor':
  $result .= " ORDER BY COUP_VENDOR";
  break;
case 'desc':
  $result .= " ORDER BY COUP_DESC";
  break;
case 'start':
  $result .= " ORDER BY COUP_START";
  break;  
case 'end':
  $result .= " ORDER BY COUP_EXPR";
  break;  
default:

}

//echo $result;
	
$table = "COUPONS";
$result = mysql_query($result) or die(mysql_error());
$sum = 0;

//echo mysql_field_name($result, 0);//name of columns
//echo mysql_num_fields($result);//num of columns

while($row = mysql_fetch_array($result))
  {
  $test = $row['COUP_ID'];
  $sum += $row['COUP_PRICE'];
  echo "<tr>";
  echo "<td>" . $row['COUP_NAME'] . "</td>";
  echo "<td>" . $row['COUP_DESC'] . "</td>";
  echo "<td>" . $row['COUP_PRICE'] . "</td>";
  echo "</tr>";
  }
	echo "                <tr class='total'>
                    <td></td>
                    <td></td>
                    <td>$" . (double)$sum . "</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td>Total</td>
                </tr>";
	echo "</table>";
	echo"<a href='#' class='button'>Check-out</a>";
include("connection.php");
?>
</div>
</div>

<?php
        include '../template/footerPages.php';
?>
