<?php
	include '../template/header.php';
?>

<div id="content">
<div class="no-margin-input" id="contact">

<?php
include("connection.php");

$acctId = $_SESSION['current_user'];

$query = "SELECT * FROM ACCOUNTS WHERE ACCT_ID = $acctId";
$result = mysql_query($query);
$row = mysql_fetch_array($result);
?>

<form action = "updateAccount.php">
E-mail: <input type="text" name="email" value="<?php print $row["ACCT_EMAIL"] ?>" /></br>
Current Password: <input type="password" name="currentPwd" /></br>
New Password: <input type="password" name="pwdA" /></br>
Confirm New Password: <input type="password" name="pwdB"  /></br>

New Security Question: <input type="text" name="question" value="<?php print $row["ACCT_SQUEST"] ?>" /></br>
New Security Answer: <input type="password" name="answer" value="<?php print $row["ACCT_SANSER"] ?>" /></br>

<input type="hidden" name="acctId" value="<?php echo $acctId ?>" />
<input type="submit" value="Submit" />
</form>




<?php
include("close.php");
?>

</div>
</div>
<?php
	include '../template/footer.php';
?>
