<?php  
        include('../../template/header.php');
?>
<div id="content">
<div id="cart">
<h2>Coupon Table</h2>


<?php
include("connection.php");

$result = "SELECT * FROM COUPONS";


if(isset($_REQUEST['sort'])){
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
case 'start':
  $result .= " ORDER BY COUP_START";
  break;
case 'end':
  $result .= " ORDER BY COUP_EXPR";
  break;
default:

}
}else{ 
        $result .= " ORDER BY COUP_ID";
}


//echo $result;

$result = mysql_query($result) or die(mysql_error());


$acctId = 0;
if(isset($_REQUEST['acctId'])){
 $acctId = $_REQUEST['acctId'];
}

echo"
<table border='1'>
<tr align = left>
<th><a href='couponTable.php?sort=title&acctId=$acctId'>Title</a></th>";
echo "
<th><a href='couponTable.php?sort=left&acctId=$acctId'>Left</a></th>
<th><a href='couponTable.php?sort=price&acctId=$acctId'>Price</a></th>
<th></th>
</tr>";

while($row = mysql_fetch_array($result))
  {
  if($row['COUP_LEFT']==0){

  }else{
  $coupId = $row['COUP_ID'];
  echo "<tr>";
  if(isset($_SESSION['current_user'])){
    $coupUrl = "viewCoupon.php?coupId=$coupId";
  }
  else{
    $coupUrl = "viewCoupon.php?coupId=$coupId";
  }
  echo '<td><a href="'.$coupUrl.'"><div class="crop"><img name="myimage" src="'.$row['COUP_IMGLOC'].'" width="60" height="60" alt="image" /></div>'.$row['COUP_NAME'].'</a></td>';
  echo "<td>" . $row['COUP_LEFT'] . "</td>";
  echo "<td>$" . $row['COUP_PRICE'] . "</td>";
  if(isset($_SESSION['current_user']) && $_SESSION['acctType'] != 1){
    $url = "addCart.php?coupId=$coupId&acctId=$acctId";
  }
  else{
    $url = "login.php";
  }
  echo "<td><a href='". $url ."'>Add</a></td>";
  echo "</tr>";
  }
  }

        echo "</table>";
include("connection.php");
?>
</div>
</div>
<?php
        include('../template/footer.php');
?>

