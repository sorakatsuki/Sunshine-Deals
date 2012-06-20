<?php
	include('../template/header.php');
?>
<div id="content">
<div style="margin: 0 auto 30px; width: 500px;">
<form action = "updateCoupon.php">
<?php
include("connection.php");
$coupId = $_REQUEST['coupId'];
$acctId = $_REQUEST['acctId'];



$query = "SELECT * FROM COUPONS WHERE COUP_ID = $coupId";
$result = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_array($result) or die(mysql_error());
$start = date("F", strtotime($row['COUP_START']));
$vendor = $row['COUP_VENDOR'];
?>
<h1>Edit Coupon</h1>
Create New Coupon</br>
Title: <input type="text" name="title" value="<?php print $row["COUP_NAME"] ?>" /></br>
Quantity: <input type="text" name="quantity" size="3"/ value=<?php print $row['COUP_TOTAL']?> ></br>
Price: <input type="text" name="price" size="5" value=<?php print $row['COUP_PRICE']?> /></br>
Category:
<select name="category" value=<?php print $row['COUP_CATNAME']?> >
<option value="Food">Food</option>
<option value="Health">Health</option>
<option value="Clothes">Clothes</option>
<option value="Entertainment">Entertainment</option>
</select></br>
Start:</br>
<?php

//echo $start;
?>
Month: <select name="sMonth">
	<option value="1">January</option>
	<option value="2" >February</option>
	<option value="3">March</option>
	<option value="4">April</option>
	<option value="5">May</option>
	<option value="6">June</option>
	<option value="7">July</option>
	<option value="8">August</option>
	<option value="9">September</option>
	<option value="10">October</option>
	<option value="11">November</option>
	<option value="12">December</option>
</select>
Day: <select name="sDay">
<?php
for($i=1;$i<32;$i++)
{
print "<option value='$i'>$i</option>";
}
?>
</select> 
Year: <select name="sYear">
<option value="2012">2012</option>
<option value="2013">2013</option>
<option value="2014">2014</option>
<option value="2015">2015</option>
</select> 
Time: <input type="text" name="sHour" size="1"/>:<input type="text" name="sMinute" size="3"/></br>
Expiration:</br>
Month: <select name="month">
<option value="1">January</option>
<option value="2">February</option>
<option value="3">March</option>
<option value="4">April</option>
<option value="5">May</option>
<option value="6">June</option>
<option value="7">July</option>
<option value="8">August</option>
<option value="9">September</option>
<option value="10">October</option>
<option value="11">November</option>
<option value="12">December</option>
</select>
Day: <select name="day">
<?php
for($i=1;$i<32;$i++)
{
print "<option value='$i'>$i</option>";
}
?>
</select> 
Year: <select name="year">
<option value="2012">2012</option>
<option value="2013">2013</option>
<option value="2014">2014</option>
<option value="2015">2015</option>
</select> 
Time: <input type="text" name="hour" size="1"/>:<input type="text" name="minute" size="3"/></br> 
Description: </br><textarea name="description" cols="40" rows="5" ><?php print $row['COUP_DESC']?>
</textarea></br>
Image URL: <input type="text" name="url" value="<?php print $row['COUP_IMGLOC']?>"/></br>

<input type="hidden" name="vName" value="<?php echo $vendor ?>"  /> 
<input type="hidden" name="coupId" value="<?php echo $coupId ?>"  /> 
<input type="hidden" name="acctId" value="<?php echo $acctId ?>" />
<input type="hidden" name="left" value="<?php echo $row['COUP_LEFT'] ?>" />

<input type="submit" />
<?php
include("close.php");
?>
</form>
</div>
</div>
<?php
	include('../template/header.php');
?>

