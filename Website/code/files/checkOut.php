<?php
	include '../template/header.php';
?>

<div id="content">
<div id="contact" class="no-margin-input">

		<h1>Billing Information</h1>
		<?php include("connection.php"); 
			$acctId = $_REQUEST['acctId'];
			$subTotal = $_REQUEST['subTotal'];
		?>	
				
					<form action = "processCheckOut.php">
					Name: <input type="text" name="bName" /> (As is on card)</br>
					Address: <input type="text" name="bAddress" /></br>
					City: <input type="text" name="bCity" /></br>
					State: <input type="text" name="bState" /></br>
					Zip Code: <input type="text" name="bZip" /></br>
					Card Number: <input type="text" name="bNumber" /></br>
					Security Code: <input type="text" name="bCode" /></br>
					Expiration Date: 
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
					Year: <select name="year">
						<option value="2012">2012</option>
						<option value="2013">2013</option>
						<option value="2014">2014</option>
						<option value="2015">2015</option>
					</select>
					<input type="hidden" name="acctId" value="<?php echo $acctId ?>" />
					<input type="hidden" name="subTotal" value="<?php echo $subTotal ?>" />
					
					<input type="submit" />
					</form>



			<?php include("close.php"); ?>	
	</div>
</div>
<?php
	include '../template/footer.php';
?>	
