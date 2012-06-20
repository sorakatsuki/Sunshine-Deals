<?php  
        include '../templates/headerPages.php';
?>
<div id="content">
<script type="text/javascript">
        setTimeout(function() {
                window.location.href = '../';
        }, 7000);
</script>

<?php
	mysql_connect('localhost', 'shinetheweb', 'urmysunshine') or die ("There's a problem with the connection");
	mysql_select_db('sunshinedeals');

	$errors = "";
	
	if(!strchr($_POST['luser'],'@'))
        	$errors .= "Please provide a valid email address.</br>";
	if(!isset($_POST['lpwd']))
                $errors .= "Please provide a password.</br>";   	
	if($errors == ""){
		$email = trim($_POST['luser']);
		$pass = trim($_POST['lpwd']);
	        $encrypted = sha1(md5($pass));

		$sql = "SELECT * FROM ACCOUNTS WHERE ACCT_EMAIL = '$email'";

		$check = mysql_query($sql) or die (mysql_error());	
		$check2 = mysql_num_rows($check);

		if ($check2 == 0) 
 			die('That user does not exist in our database. <a href=register.php>Click Here to Register</a>');
		
		while($info = mysql_fetch_array($check)) {
			$encrypted = stripslashes($encrypted);
 			$info['ACCT_PASS'] = stripslashes($info['ACCT_PASS']);

 			if ($encrypted != $info['ACCT_PASS']) {
				echo "<div id='contact'>";
				echo "<h1>Login Failed</h1>";
				echo "<p>";
				echo "Incorrect email or password, please try again.";
 				echo "</p>";
				echo "</div>";
			}
			else{
				session_start();
				$_SESSION['current_user'] = "1";
				$test = $_SESSION['current_user'];
				if(isset($_SESSION['views']))
					$_SESSION['views']=$_SESSION['views']+1;
				else
					$_SESSION['views']=1;
                                echo "<div id='contact'>";
                                echo "<h1>Login Successful!</h1>";
                                echo "<p>";
                                echo "Login succesful!</br></br> Redirecting to member page in 7 seconds.";
                                echo "</p>";
                                echo "</div>";
			}
		}
	}
	else{
                echo "<div id='contact'>";
                echo "<h1>Login Failed</h1>";
                echo "<p>";
                echo $errors;
                echo "</br><b>Please go back and try again.</b>";
                echo "</p>";
                echo "</div>";
	}	
?>
</div>
</body>
</html>
