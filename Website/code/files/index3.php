<?php
	include 'template/header.php';
?>
	<div id="content">
    	<article>
            <div id="coupon-image" class="crop">
                <img src="images/spa.jpg" alt="Spa Coupon" />
            </div>
            <div id="coupon-description">
                <h1>Flourishing Florist</h1>
                <p>We are committed to offering only the finest floral arrangements and gifts, backed by service that is friendly and prompt. Because all of our customers are important, our professional staff is dedicated to making your experience a pleasant one. That is why we always go the extra mile to make your floral gift perfect.</p>
            </div>
            <div id="coupon-pricing">
                <h1>$150</h1>
                <a class="button" href="#">Buy</a>
                <ul>
                    <li><h3>$400</h3>Value</li>
                    <li><h3>62%</h3>Discount</li>
                    <li><h3>$250</h3>You Save</li>
                </ul>
                <h2 id="time">3 days <span>4:15:32</span></h2>
                <h3>Time Left to Buy</h3>
                <script>
                    $('#time').countdown({date: new Date(2012, 4-1, 29)});
                </script>
            </div>
    	</article>
    	<aside>
    	    <div id="sponsored-deal">
    	        <h3>Go on a great trip to a beach</h3>
    	    </div>
    	    <div id="sponsored-deal-link">
    	        <a href="#">See the deal now →</a>
    	    </div>
    	    <h2>More Deals</h2>
    	    <ul id="more-deals">
    	        <li>
    	           <div class="crop">
    	               <img src="images/rockClimbing.jpg" alt="Rock Climbing" />
    	            </div>
    	            Rock Climbing - $20
    	        </li>
    	        <li>
    	            <div class="crop">
     	               <img src="images/sailing.jpg" alt="Sailing" />
     	            </div>
     	            Sailing - $30
    	        </li>
    	        <li>
    	           <div class="crop">
    	               <img src="images/rockClimbing.jpg" alt="Rock Climbing" />
    	            </div>
    	            Rock Climbing - $20
    	        </li>
    	    </ul>
    	</aside>
    </div>
<?php
	include 'template/footer.php';
?>
