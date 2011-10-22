<div class="reg-content">
	<div class="reg-header">
	</div>
	<?php 
	?>
	<div class="reg-content-details">
		<div class="content-info">
			Enter a chance to win a night out for you and four of your fabulous friends!
			The lucky winner will receive $1,000 and five $300 gift cards from Rent the Runway,
			the online designer dress and accessory rental site.
			Each rental includes a phone consultation  with one of the Rent the Runway's 
			stylists to help you pick the perfect look.
		</div>
		<div class="content-picture">
		</div>
	</div>

	<div class="fb-welcome-text hide">Welcome <span></span>. You have already registered with us.! </div>
	<div class="fb-not-logged hide">Please click login and allow permissions to continue <div class="fb-login hide"></div></div>
	<div class="fb-not-authorized hide">You need to authorize the application to continue by clicking <a>here</a></div>
	<div class="fb-not-liked hide"	>Please like the page to continue with registration</div>
	<div class="reg-text header-font">
		Enter for your chance to win now!
	</div>
	<div class="reg-form">
		<div class="step1">
			<div class="header header-font">
				<span></span>
					<div class="text">Like <a>Bachelorette Party: Las Vegas</a> on facebook </div>
					<div class="fblike">
							<div class="fb-like" data-href="http://www.facebook.com/bachelorettes" data-layout="button_count"></div>
					</div>
			</div>
			
		</div>
		<div class="step2">
			<div class="header header-font">
				<span></span><div class="text">Enter Your Information</div>
			</div>
			<div class="step2-content">
				<?php print $firstname; ?>
				<?php print $lastname; ?>
				<?php print $address; ?>
				<?php print $city; ?>
				<?php print $state; ?>
				<?php print $zipcode; ?>
				<?php print $email; ?>
				<?php print $phone; ?>
				<?php print $age; ?>
				
			</div>
		</div>
		<div class="step3">
			<div class="header header-font">
				<span></span><div class="text"> Submit Your Entry</div>
			</div>
			<div class="step3-content">
				<?php print $newsletter; ?>
				<?php print $rules; ?>
			</div>
			<div class="step3-buttons">
				<div class="submit-button"><?php print $submit; ?></div>
				<?php print $form_rest; ?>
					<div class="twitter-button">
						<a data-url="http://bit.ly/BPLVswps" data-text="Want%20a%20chance%20to%20win%20%241%2C000%20%26%20luxury%20dress%20rentals%3F%20Enter%20the%20%23BacheloretteParty%20Girls%20Night%20Out%20%23Sweepstakes%20here%3A" href="https://twitter.com/share"  class="popup">
							</a>
					</div>
				<div class="fb-share-button-friends">
					
				</div>
			</div>
		</div>
	</div>
	<div class="reg-rules">
		<div class="rules-tabs">
			<ul>
				<a class="popup" href="/bplv-rules.html"><li class="upper"><span>Official Rules</span></li></a>
				<a class="popup" href="/bplv-prizerules.html"><li><span>Prize Details</span></li></a>
			</ul>
		</div>
		<div class="rules-details">
			<ul>
				<li>No Purchase Necessary. Void where prohibited.</li>
				<li>Sweepstakes beings October 10, 2011 at 12:00 PM ET and ends November 28, 2011 at 11:59 PM ET.</li>
				<li>Subject to official rules located at oxygen.com</li>
				<li>Must be 18 years of age or older and a legal resident of the U.S. </li>
			</ul>
		</div>
	</div>
</div>
<div class="hide current-page-url" ><?php print 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?></div>
<div id="fb-friends"></div>
<div id="fb-root"></div>
<script src="//platform.twitter.com/widgets.js" type="text/javascript"></script>
