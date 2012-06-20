<?php
$query = "SELECT * FROM COUPONS WHERE COUP_ID = 1";
$result = mysql_query($query) or die(mysql_error());
$Coupon1 = mysql_fetch_array($result) or die(mysql_error());
$query = "SELECT * FROM COUPONS WHERE COUP_ID = 2";
$result = mysql_query($query) or die(mysql_error());
$Coupon2 = mysql_fetch_array($result) or die(mysql_error());
$query = "SELECT * FROM COUPONS WHERE COUP_ID = 3";
$result = mysql_query($query) or die(mysql_error());
$Coupon3 = mysql_fetch_array($result) or die(mysql_error());
$query = "SELECT * FROM COUPONS WHERE COUP_ID = 4";
$result = mysql_query($query) or die(mysql_error());
$Coupon4 = mysql_fetch_array($result) or die(mysql_error());
?>  




  	<aside>
    	    <ul class="more-deals">
		<li>
		<a href="/pages/viewCoupon.php?coupId=<?php echo $Coupon4['COUP_ID']; ?>">
                   <div class="crop">
                       <img src="<?php echo $Coupon4['COUP_IMGLOC']; ?>" alt="Rock Climbing" />
                    </div>
                    <?php echo $Coupon4['COUP_NAME']; ?> - $<?php echo $Coupon4['COUP_PRICE']; ?>
                </a>
		</li>
	    </ul>
	    <h2>More Deals</h2>
    	    <ul class="more-deals">
    	        <li>
		<a href="/pages/viewCoupon.php?coupId=<?php echo $Coupon1['COUP_ID']; ?>">
    	           <div class="crop">
    	               <img src="<?php echo $Coupon1['COUP_IMGLOC']; ?>" alt="Rock Climbing" />
    	            </div>
    	            <?php echo $Coupon1['COUP_NAME']; ?> - $<?php echo $Coupon1['COUP_PRICE']; ?>
		</a>
    	        </li>
                <li>
                <a href="/pages/viewCoupon.php?coupId=<?php echo $Coupon2['COUP_ID']; ?>">
		   <div class="crop">
                       <img src="<?php echo $Coupon2['COUP_IMGLOC']; ?>" alt="Rock Climbing" />
                    </div>
                    <?php echo $Coupon2['COUP_NAME']; ?> - $<?php echo $Coupon2['COUP_PRICE']; ?>
		</a>
                </li>
                <li>
		<a href="/pages/viewCoupon.php?coupId=<?php echo $Coupon3['COUP_ID']; ?>">
                   <div class="crop">
                       <img src="<?php echo $Coupon3['COUP_IMGLOC']; ?>" alt="Rock Climbing" />
                    </div>
                    <?php echo $Coupon3['COUP_NAME']; ?> - $<?php echo $Coupon3['COUP_PRICE']; ?>
                </a>
		</li>
    	    </ul>
    	</aside>





