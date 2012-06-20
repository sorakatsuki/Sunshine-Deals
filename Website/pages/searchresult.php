<?php
        include('../template/header.php');
?>
<div id="content">
<div id="cart">
<?php
$link = mysql_connect('localhost', 'shinetheweb', 'urmysunshine') or die('Could not connect: ' . mysql_error());
mysql_select_db('sunshinedeals') or die('Could not select database');

if(!isset($_REQUEST['keyword']))
	die('<p>Invalid Keyword</p>');

$keyword = trim($_REQUEST['keyword']);

if(strlen($keyword) < 2 )
	die('<p>Invalid Keyword</p>');

$searchquery = "SELECT * FROM COUPONS WHERE COUP_NAME LIKE '%$keyword%' OR COUP_CATNAME LIKE '%$keyword%'
			OR COUP_VENDOR LIKE '%$keyword%' OR COUP_DESC LIKE '%$keyword%'";


if(isset($_REQUEST['sort']))
{
	switch($_REQUEST['sort'])
	{
		case 'id':
			$searchquery .= " ORDER BY COUP_ID";
			break;
		case 'title':
			$searchquery .= " ORDER BY COUP_NAME";
			break;
		case 'category':
			$searchquery .= " ORDER BY COUP_CATNAME";
			break;
		case 'desc':
			$searchquery .= " ORDER BY COUP_DESC";
			break;
		case 'price':
			$searchquery .= " ORDER BY COUP_PRICE";
			break;
		case 'left':
			$searchquery .= " ORDER BY COUP_LEFT";
			break;
		default:
			$searchquery .= " ORDER BY COUP_ID";
			break;
	}
}

$result = mysql_query($searchquery);

if(isset($_REQUEST['acctId']))
{
	$acctId=$_REQUEST['acctId'];
	$urlending = "&acctId=$acctId&keyword=$keyword";
}
else
{
	$urlending = "&keyword=$keyword";
}

echo"
<table border='1'>
<tr align = left>
<th><a href='searchresult.php?sort=title$urlending'>Title</a></th>";
echo "
<th><a href='searchresult.php?sort=category$urlending'>Category</a></th>
<th><a href='searchresult.php?sort=desc$urlending'>Description</a></th>
<th><a href='searchresult.php?sort=left$urlending'>Left</a></th>
<th><a href='searchresult.php?sort=price$urlending'>Price</a></th>
<th></th>
</tr>";

while($row = mysql_fetch_array($result))
{
echo '<!-- Row exec -->';
	if($row['COUP_LEFT']==0) {  } 
	else {
		$coupId = $row['COUP_ID'];
		echo "<tr>";

		if(isset($_SESSION['current_user']))
		{	$coupUrl = "viewCoupon.php?coupId=$coupId";	}
		else
		{	$coupUrl = "viewCoupon.php?coupId=$coupId"; 	}

		echo '<td><a href="'.$coupUrl.'"><div class="crop"><img name="myimage" src="'.$row['COUP_IMGLOC'].'" width="60" height="60" alt="image" /></div>'.$row['COUP_NAME'].'</a></td>';
		echo "<td>" . $row['COUP_CATNAME'] . "</td>";
		echo "<td>" . $row['COUP_DESC'] . "</td>";
		echo "<td>" . $row['COUP_LEFT'] . "</td>";
		echo "<td>" . $row['COUP_PRICE'] . "</td>";
			if(isset($_SESSION['current_user']) && $_SESSION['acctType'] != 1){
				$url = "addCart.php?coupId=$coupId&acctId=$acctId";
			}
			else {
				$url = "login.php";
			}
		echo "<td><a href='". $url ."'>Add</a></td>";
		echo "</tr>";
	}
}


echo "</table>";

mysql_free_result($result);
mysql_close($link);
?>

</div>
</div>
<?php
	include('../template/footer.php');
?>
