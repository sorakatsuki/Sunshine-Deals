<?php
	include '../template/header.php';
?>

<div id="content">
<div class="no-margin-input" id="contact">
<?php
include("connection.php");

$email = $_REQUEST['email'];
$query = "SELECT ACCT_SQUEST, ACCT_ID FROM ACCOUNTS WHERE ACCT_EMAIL='$email'";
$result = mysql_query($query) or die(mysql_error());
if(mysql_num_rows($result)){
	$row = mysql_fetch_array($result);
?>
<form action = "passwordUpdate.php">
<ul>
	<li>New Password: <input type="password" name="pwdA" /></li>
	<li>Confirm New Password: <input type="password" name="pwdB"  /></li>
	<li>Question: <?php print $row["ACCT_SQUEST"] ?></li>
	<li>Answer: <input type="password" name="answer" /></li>
</ul>
<input type="hidden" name="acctId" value="<?php echo $row['ACCT_ID'] ?>" />
<input type="submit" />
</form>
<?php	
}else{
	echo "User does not exist.";
}

?>





<?php
include("close.php");
?>
</div>
</div>
<?php
	include '../template/footer.php';
?>
