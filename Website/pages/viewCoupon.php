<?php
        include('../template/header.php');
?>
<div id="content">
<article>
<?php
include("connection.php");

$coupId = $_REQUEST['coupId'];


$query = "SELECT * FROM COUPONS WHERE COUP_ID = $coupId";
$result = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_array($result) or die(mysql_error());

if(0 < $row['COUP_LEFT']){
	"<p>Title: ".$row['COUP_NAME']."</p>
	  <p>Total: ".$row['COUP_TOTAL']."</p>
	  <p>Left: ".$row['COUP_LEFT']."</p>
	  <p>Price: ".$row['COUP_PRICE']."</p> 
	  <p>Category: ".$row['COUP_CATNAME']."</p> 
	  <p>Vendor: ".$row['COUP_VENDOR']."</p> 
	  <p>Description: ".$row['COUP_DESC']."</p>
	  <p>Start Date: ".$row['COUP_START']."</p> 
	  <p>End Date: ".$row['COUP_EXPR']."</p>";
	'<p><img name="myimage" src="'.$row['COUP_IMGLOC'].'" width="60" height="60" alt="image" /></p>';  

	if(isset($_REQUEST['acctId'])){
		$acctId = $_REQUEST['acctId'];
		"<a href='addCart.php?coupId=$coupId&acctId=$acctId'>Add Coupon</a>";
	}
}else{
		"Coupon ".$row['COUP_ID']." is sold out.";
}
?>
<div id="coupon-image" class="crop">
                <img src="<?php echo $row['COUP_IMGLOC']; ?>" alt="Spa Coupon" />
            </div>
            <div id="coupon-description">
                <h1><?php echo $row['COUP_NAME']; ?></h1>
                <p><?php echo $row['COUP_DESC']; ?></p>
	    </div>
            <div id="coupon-pricing">
                <h1>$<?php echo $row['COUP_PRICE']; ?></h1>
		<?php if(isset($_SESSION['current_user']) && $_SESSION['acctType'] != 1){ echo "<a class='button' href='/pages/addCart.php?coupId=$coupId&acctId=".$_SESSION['current_user']."'>Buy</a>"; }else{?>
                <a class="button" href="/pages/login.php">Buy</a>
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
<script type="text/javascript">
    /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
    var disqus_shortname = 'sunshineDeals'; // required: replace example with your forum shortname
    /* * * DON'T EDIT BELOW THIS LINE * * */
    (function() {
        var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
        dsq.src = 'http://' + disqus_shortname + '.disqus.com/embed.js';
        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
    })();
</script>
<noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>


</article>
<?php include("../template/sponsoredDeals.php");	  

include("close.php");
?>
</div>
<?php
	include('../template/footer.php');
?>
