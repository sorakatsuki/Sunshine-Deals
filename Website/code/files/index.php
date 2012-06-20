<?php
	include 'template/header.php';
	include("pages/connection.php");

$coupId = $_REQUEST['coupId'];

$random = rand(1,5);
$query = "SELECT * FROM COUPONS WHERE COUP_ID = $random";
$result = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_array($result) or die(mysql_error());

?>
	<div id="content">
    	<article>
    	<div id="coupon-image" class="crop">
                <img src="<?php echo $row['COUP_IMGLOC']; ?>" alt="<?php echo $row['COUP_NAME']; ?> Coupon" />
            </div>
            <div id="coupon-description">
                <h1><?php echo $row['COUP_NAME']; ?></h1>
                <p><?php echo $row['COUP_DESC']; ?></p>
            </div>
            <div id="coupon-pricing">
                <h1>$<?php echo $row['COUP_PRICE']; ?></h1>
                <?php if(isset($_SESSION['current_user']) && $_SESSION['acctType'] != 1){ echo "<a class='button' href='/pages/addCart.php?coupId=$random&acctId=".$_SESSION['current_user']."'>Buy</a>"; }else{?>
                <a class="button" href="pages/login.php">Buy</a>
                <?php } ?>
                <ul>
                    <li><h3><?php echo $row['COUP_LEFT']; ?></h3>Remain</li>
                </ul>
                <h2 id="time">3 days <span>4:15:32</span></h2>
                <h3>Time Left to Buy</h3>
                <?php
                        $tempArray = explode("-",$row['COUP_EXPR']);
                        $dayArray = explode(" ", $tempArray[2]);
                        $timeArray = explode(":", $dayArray[1]);
                ?>
                <script>
                    $('#time').countdown({date: new Date(<?php echo $tempArray[0]; ?>, <?php echo $tempArray[1]; ?>-1, <?php echo $dayArray[0]; ?>,<?php echo $timeArray[0]; ?>, <?php echo $timeArray[1]; ?>, <?php echo $timeArray[2]; ?>)});
                </script>
            
	    </div>
	<div style="clear:both;"></div>
	<div id="disqus_thread"></div>
	    </article>
	<?php
		include 'template/sponsoredDeals.php';
	?>    
</div>
<?php
	include 'template/footer.php';
?>
