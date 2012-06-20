<?php
	include '../template/header.php';
?>

<div id="content">
<div id="contact">
	<form name="searchcoupons" action="/pages/searchresult.php" method="get">
		<label for="search">Search:</label><input id="search" type="text" name="keyword" />
		<input type="submit" value="Submit" />
	</form> 
</div>
</div>
<?php
	include '../template/footer.php';
?>
