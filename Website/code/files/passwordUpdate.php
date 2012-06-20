<?php
	include '../template/header.php';
?>

<div id="content">
<div id="contact">

<h1>Account Update</h1>

<?php
include("connection.php");

$acctId = $_REQUEST['acctId'];
$pwdA = $_REQUEST['pwdA'];
$pwdB = $_REQUEST['pwdB'];
$answer = $_REQUEST['answer'];

$query = "SELECT * FROM ACCOUNTS WHERE ACCT_ID = $acctId";
$result = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_array($result);

	if($row['ACCT_SANSER']==sha1(md5($answer))){
		if($pwdA==$pwdB){
			echo "Password has been updated.";
			$pwdA = sha1(md5($pwdA));
			$answer = sha1(md5($answer));
			mysql_query("UPDATE ACCOUNTS SET ACCT_PASS='$pwdA' WHERE ACCT_ID = $acctId") or die(mysql_error());
		}else{
			echo "New Password and Confirm Password needs to match.";
		}
	}else{
		echo "Wrong Answer";
	}

include("close.php");
?>
</div>
</div>
<?php
	include '../template/footer.php';
?>
