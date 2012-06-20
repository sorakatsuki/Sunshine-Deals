<?php
	include('../template/header.php');
?>
<div id="content">
<form action = "testProcess.php">
<div>
	<input type="radio" name="ccard" value="visa" checked="checked" />
	Visa
	<input type="radio" name="ccard" value="mastarcard" /> MasterCard
	<input type="radio" name="ccard" value="discover" /> Discover <br />
	
	Credit Card number:
	<input type="text" name="ccnumber" size="20" /> <br />
	
	<label>
		<input type="checkbox" name="express" />
		Express shipping? ($10 extra)
	</label> <br />
	<input type="submit" />
</div>
</form>


<form action="welcome.php" method="post">
Name: <input type="text" name="fname" />
Age: <input type="text" name="age" />
<input type="submit" />
</form>
</div>
<?php
	include('../template/footer.php');
?>
