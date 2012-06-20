<?php
	include '../template/header.php';
?>

<div id="content">
<div style="margin: 0 auto;width:500px;">
<h1>Create Coupon</h1>
<?php
include("connection.php");

	$acctId = $_REQUEST['acctId'];
	
$query = "SELECT * FROM ACCOUNTS WHERE ACCT_ID = $acctId";
$results = mysql_query($query) or die(mysql_error());

$row = mysql_fetch_array($results);
$name = $row['ACCT_NAME'];
?>

<form action = "processCoupon.php">
Create New Coupon</br>
Title: <input type="text" name="title" /></br>
Vendor's Name: <?php echo $name; ?></br>
<input type="hidden" name="vName" value="<?php echo $name ?>"  /> 
Quantity: <input type="text" name="quantity" size="3"/></br>
Price: <input type="text" name="price" size="5"/></br>
Category:
<select name="category">
<option value="Food">Food</option>
<option value="Health">Health</option>
<option value="Clothes">Clothes</option>
<option value="Entertainment">Entertainment</option>
</select></br>
Start:</br>
Month: <select name="sMonth">
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
Description: </br><textarea name="description" cols="40" rows="5">
</textarea></br>
Image URL: <input type="text" name="url" /></br>

<input type="hidden" name="acctId" value="<?php echo $acctId ?>"  /> 
	
<input class="button" type="submit" />
</form>
</div>
</div>
<?php
	include '../template/footer.php';
?>
