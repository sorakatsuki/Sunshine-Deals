<?php 
	include '../templates/headerPages.php';
?>

<script type="text/javascript">
	setTimeout(function() {
    		window.location.href = '../';
	}, 7000);
</script>

<?php

mysql_connect('localhost', 'shinetheweb', 'urmysunshine') or die ("There's a problem with the connection");
mysql_select_db('sunshinedeals');

$errors = "";

if(!isset($_POST['ruser']))
	$errors .= "Please provide a username.</br>";
if(!isset($_POST['rpwd']))
	$errors .= "Please provide a password.</br>";
if(!isset($_POST['email']))
	$errors .= "Please provide a email address.</br>";
if(!isset($_POST['squest']))
	$errors .= "Please provide a secret question.</br>";
if(!isset($_POST['sanser']))
	$errors .= "Please provide a secret answer.</br>";
if(!strchr($_POST['email'],'@'))
	$errors .= "Please provide a valid email address.</br>";
if($errors == ""){
	$username = trim($_POST['ruser']);
	$password = trim($_POST['rpwd']);
	$email = trim($_POST['email']);
	$squest = trim($_POST['squest']);
	$sanser = trim($_POST['sanser']);
	$userRole = $_POST['role'];

	$sql = "INSERT INTO ACCOUNTS (ACCT_NAME, ACCT_PASS, ACCT_EMAIL, ACCT_SQUEST, ACCT_SANSER, ACCT_TYPE) VALUES ('$username', SHA1(MD5('$password')), '$email', '$squest', SHA1(MD5('$sanser')), '$userRole')";

	mysql_query($sql) or die (mysql_error());
	echo "<div id='content'>";
	echo "<div id='register'>";
        echo "<h1>Registration Success</h1>";
        echo "<p>Please login and enjoy~!</br></br> You will automatically be redirected to the main page in 7 seconds.</p>";
	echo "</div>";
	echo "</div>";
	}
	else{
		echo "<div id='content'>";
		echo "<div id='contact'>";
		echo "<h1>Registration Failed</h1>";
		echo "<p>";
		echo $errors;
		echo "</br><b>Please go back and try again.</b>";
		echo "</p>";
		echo "</div>";
		echo "</div>";
	}
	
?>
</body>
</html>


