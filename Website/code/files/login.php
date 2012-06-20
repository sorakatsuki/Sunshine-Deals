<?php
	include '../template/header.php';
?>
	<div id="content">
    	<div id="register">
    	    <h1>Login:</h1>
    	    <form name="login" action="db_logUser.php" method="post">
    	        <ul>
    	            <li><input type="text" name="luser" id="luser" value="Email Address" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;"/></li>
    	            <li><input type="password" name="lpwd" id="lpwd" value="Password" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;"/></li>
    	            <li><input class="button" type="submit" value="Submit" /></li>
    	        </ul>
                
    	    </form>
	<a href="/pages/passwordRecovery.php"><li>Forgot Password</li></a>
	</div>
    </div>
<?php
	include '../template/footer.php';
?>
