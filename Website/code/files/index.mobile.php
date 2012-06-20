<html>
	<head>
		<meta name="viewport" content="width=320; user-scalable=no" />
    		<meta http-equiv="Content-type" content="text/html; charset=utf-8">
    		<title>Sunshine Deals</title>
    		<link href="style/style.css" rel="stylesheet" type="text/css">
    		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
    		<script src="../jquery.countdown1.2.js" type="text/javascript"></script>
	</head>
    	<body>
		<center><a href="#"><img src="../images/logo.png" alt="Sunshine Deals"></a></center>
		</br>
		<?php
			session_start();
			if($_SESSION['views'] == 0)
				echo "<center><a href='pages/login.php' class='btn large'>Login</a></center>";
			else
				echo "<center><a href='pages/logout.php' class='btn large'>Logout</a></center>";
		?>
		<center><a href="pages/register.php" class="btn large"w>Register</a></center>
	</body>	
</html>
