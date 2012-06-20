<?php
	include '../template/header.php';
?>

<div id="content">
<div id="contact">

<h1>Account Update</h1>

<?php
include("connection.php");

$acctId = $_REQUEST['acctId'];
$email = $_REQUEST['email'];
$currentPwd = $_REQUEST['currentPwd'];
$pwdA = $_REQUEST['pwdA'];
$pwdB = $_REQUEST['pwdB'];
$question = $_REQUEST['question'];
$answer = $_REQUEST['answer'];

$query = "SELECT * FROM ACCOUNTS WHERE ACCT_ID = $acctId";
$result = mysql_query($query);
$row = mysql_fetch_array($result);

	if($row['ACCT_PASS']==sha1(md5($currentPwd))){
		if($pwdA==$pwdB){
			echo "Account has been updated.";
			$pwdA = sha1(md5($pwdA));
			if($answer != $row['ACCT_SANSER']){
				$answer = sha1(md5($answer));
			}
			mysql_query("UPDATE ACCOUNTS SET ACCT_PASS='$pwdA', ACCT_EMAIL='$email' , ACCT_SQUEST='$question', ACCT_SANSER='$answer' WHERE ACCT_ID = $acctId") or die(mysql_error());
		}else{
			echo "New Password and Confirm Password needs to match.";
		}
	}else{
		echo "Wrong Password";
	}

include("close.php");
?>
</div>
</div>
<?php
	include '../template/footer.php';
?>
