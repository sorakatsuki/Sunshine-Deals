<?php
	include '../templates/header.php';
?>

<div id="register">
    	    <h1>Register Below:</h1>
    	    <form name="register" action="db_regUser.php" method="post">
    	        <ul>
    	            <li><input type="text" name="email" id="email" value="Email" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;"/></li>
    	            <li><input type="text" name="ruser" id="ruser" value="Username" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;"/></li>
    	            <li><input type="password" width="500px" name="rpwd" id="rpwd" value="Password" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;"/></li>
    	            <li><input type="text" name="squest" id="squest" value="Secret Question" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;"/></li>
		    <li><input type="password" name="sanser" id="sanser" value="Secret Answer" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;"/></li>
		    <li><select id="role" name="role">
				<option id="suser" name="suser" value="0">User</option>
				<option id="svendor" name="svendor" value="1">Vendor</option>
			</select></li>
		    <li><input class="button" type="submit" value="Submit" /></li>
    	        </ul>
                
    	    </form>
    	</div>
    </div>
</body>
</html>
