	</div>
	</div>
	<!-- /.main.row -->

	<?php if( is_active_sidebar('footer_top') ) : ?>
	<div class="footer-fullwidth-widgets container">

		<ul class="small-block-grid-1 large-block-grid-4">
			<?php dynamic_sidebar('footer_top'); ?>
		</ul>

	</div>
	<!-- /.footer-fullwidth-widgets container -->
	<?php endif; ?>

	<?php if( is_active_sidebar('footer_bottom') ) : ?>
	<div class="footer-widgets container">

		<ul class="small-block-grid-1 large-block-grid-4">
			<?php dynamic_sidebar('footer_bottom'); ?>
		</ul>


	</div>
	<!-- /.footer-widgets container -->
	<?php endif; ?>

	<div id="footer-public">
		
			<div id="footer-join" class="clearfix">
				 <div class="container">
					<div class="benefits">
						<h3>
							Sounds good right?<br>
							<strong>Join the team today</strong>
						</h3>

						<ul>
							<li>Join Michelle’s team, you’re in good hands</li>
							<li>Less than the price of a cup of coffee per day</li>
							<li>Support from a team of nutritionists and trainers</li>
						</ul>
					</div>

					<div class="signup">
				<?php if (get_option('twelvewbt_public_signups') == 'closed') { ?>
							<?php $twbt_sub_code = get_option('twelvewbt_subscribe_code'); ?>
							<div class="highlight-box">
								<div class="reserve-spot">

									<p class="messages normal">Enter your email address to <strong>reserve your spot</strong> for the next <span class="glossary">12WBT</span>.</p>
									<p class="messages success" style="display: none;">You have successfully reserved your spot for the next round of 12WBT.</p>
									<p class="messages error" style="display: none;">There was an error reserving your spot, please check your details below and try again.</p>

									<form id="cm-subscribe-form" class="subscribe" method="post">
										<div class="text">
											<label for="first_name">First Name</label>
											<input type="text" class="required" id="first_name" name="first_name" />
										</div>

										<div class="text">
											<label for="last_name">Last Name</label>
											<input type="text" class="required" id="last_name" name="last_name" />
										</div>

										<div class="text">
											<label for="<?php echo($twbt_sub_code); ?>-<?php echo($twbt_sub_code); ?>">Email</label>
											<input type="text" class="required email" name="email" id="<?php echo($twbt_sub_code); ?>-<?php echo($twbt_sub_code); ?>" />
										</div>

										<input type="hidden" name="source_data" value="blog" />
										<input type="hidden" name="category" value="Register Interest" />

										<div class="button-register">
											<input type="submit" name="subscribe" id="cm-subscribe" value="Register your interest" class="mb-btn mb-btn-green" data-role="none" />
										</div>
									</form>
								</div>
							</div>
						<?php } else { ?>
							<div>
								<div class="highlight-box signup-options">
									<span class="up-arrow"></span>
									<ul class="clearfix">
										<li>
											<strong>1 payment of</strong><br /><em>$199</em><br /><span>BEST VALUE</span><br />
											<a href="https://go.12wbt.com/sign-up/single-payment" class="mb-btn" data-ajax="false" data-role="none">Join now</a>
										</li>
										<li>
											<strong>12 payments of</strong><br /><em>$19.99 a week</em><br />
											<span>($239.88 TOTAL)</span><br />
											<a href="https://go.12wbt.com/sign-up/recurring-payment" class="mb-btn" data-ajax="false" data-role="none">Join now</a>
										</li>
									</ul>
									<p class="instruction"><span>Choose your easy and affordable payment option.</span></p>
									<p class="instruction" id="weight-lost"><span>Members have been achieving outstanding results!</span></p>
								</div>
							</div>
						<?php } ?>
				</div>
			</div>
			</div>

			<div id="footer-information" class="clearfix">
				<div class="container">

				<div class="features">
					<h3>Your membership includes</h3>

					<ul>
						<li>Easy to follow workout plans</li>
						<li>Simple nutrition program with shopping lists</li>
						<li>Weekly mindset video lessons</li>
						<li>Support from our experts &amp; forum</li>
					</ul>
				</div>

				<div class="faqs">
					<h3>Questions we get</h3>
					<ul>
						<li><a href="https://www.12wbt.com/faqs/747170-how-much-exercise-will-i-be-doing-on-the-12wbt">How much exercise will I be expected to do on the 12WBT?</a></li>
						<li><a href="https://www.12wbt.com/faqs/747228-when-does-the-next-round-of-the-12wbt-start">When does the 12WBT start?</a></li>
						<li><a href="https://www.12wbt.com/faqs/743994-what-is-the-12wbt-and-how-does-it-work">How does the 12WBT program work?</a></li>
						<li><a href="https://www.12wbt.com/faqs/747178-are-the-12wbt-plans-the-same-as-the-ones-in-michelle-s-books">Are the Nutrition Plans and Exercise Plan in the 12WBT the same as the ones in Michelle’s books?</a></li>
					</ul>
				</div>
				</div>
			</div><!--/ footer-information -->

			<div id="sample-footer" class="clearfix">
				<div class="container">

				<div class="wrapper">
					<div class="social-icons">
						<div class="country"><h3><span class="logo">12WBT</span><span class="location">Australia</span></h3></div>
						<ul class="social">
							<li><p>share. connect. follow.</p></li>
							<li class="first-icon"><a href="http://www.facebook.com/12WBT/"><img alt="facebook" src="https://www.12wbt.com/blog/wordpress-content/themes/twentyeleven/../12wbt/images/fb.png"></a></li>
							<li><a href="https://twitter.com/12wbt/"><img alt="twitter" src="https://www.12wbt.com/blog/wordpress-content/themes/twentyeleven/../12wbt/images/tw.png"></a></li>
							<li><a href="http://www.youtube.com/12wbt/"><img alt="youtube" src="https://www.12wbt.com/blog/wordpress-content/themes/twentyeleven/../12wbt/images/yt.png"></a></li>
							<li><a href="http://www.pinterest.com/12wbt/"><img alt="pinterest" src="https://www.12wbt.com/blog/wordpress-content/themes/twentyeleven/../12wbt/images/pin.png"></a></li>
						</ul>
					</div>

					<div id="quick-link" class="row-fluid">
						<div class="span3">
							<h4>Get To Know Us</h4>
							<ul>
								<li><a href="https://www.12wbt.com/blog/">12WBT Blog</a></li>
								<li><a href="https://www.12wbt.com/tour/our-team/">Our Team</a></li>
								<li><a href="https://www.12wbt.com/sitemap/">Sitemap</a></li>
							</ul>
						</div>
						<div class="span3">
							<h4>Weight Loss Topics</h4>
							<ul>
								<li><a href="https://www.12wbt.com/get-healthy/">Get Healthy</a></li>
								<li><a href="https://www.12wbt.com/weight-loss/ ">Losing Weight</a></li>
								<li><a href="https://www.12wbt.com/pregnancy-weight-loss/">Pregnancy Weight Loss</a></li>
								<li><a href="https://www.12wbt.com/post-pregnancy-weight-loss/">Post Pregnancy Weight Loss</a></li>
							</ul>
						</div>
						<div class="span3">
							<h4>Our Programs</h4>
							<ul>
								<li><a href="https://www.12wbt.com/tour/">How it Works</a></li>
								<li><a href="https://www.12wbt.com/programs/beginners-weight-loss/">Beginner Weight Loss</a></li>
								<li><a href="https://www.12wbt.com/programs/intermediate-weight-loss/">Intermediate Weight Loss</a></li>
								<li><a href="https://www.12wbt.com/programs/advanced-lean-fit/">Advanced Weight Loss</a></li>
								<li><a href="https://www.12wbt.com/programs/advanced-lean-strong/">Lean &amp; Strong (Advanced)</a></li>
								<li><a href="https://www.12wbt.com/programs/learn-to-run/">Learn to Run (L2R)</a></li>
								<li><a href="https://www.12wbt.com/programs/10k-running-program/">10k Running</a></li>
								<li><a href="https://www.12wbt.com/programs/half-marathon-training-program/">Half Marathon</a></li>
								<li><a href="https://www.12wbt.com/programs/pregnancy/">Pregnancy Program</a></li>
							</ul>
						</div>
						<div class="span3">
							<h4>Legal Stuff</h4>
							<ul>
								<li><a href="https://www.12wbt.com/terms/" rel="nofollow">Terms &amp; Conditions</a></li>
								<li><a href="https://www.12wbt.com/privacy/" rel="nofollow">Privacy</a></li>
							</ul>
						</div>
					</div>

					<div class="bottom-copy">
							<div class="copy-holder">
								<p>Consult your healthcare professional before beginning any diet or fitness regime. Copyright © 2014 12WBT Pty Ltd.</p>
							</div>
							<div id="6c1e0e20-ba23-419e-86bd-23ee5b02f013" class="pull-right">
								<script type="text/javascript" src="//privacy-policy.truste.com/privacy-seal/12WBT-Pty-/asc?rid=6c1e0e20-ba23-419e-86bd-23ee5b02f013"></script>
								<a href="//privacy.truste.com/privacy-seal/12WBT-Pty-/validation?rid=e6725e0d-e30a-4f70-a7ca-5442dcacbf16" title="TRUSTe online privacy certification" target="_blank">
									<img style="border: none; width:110px; height:35px;" src="//privacy-policy.truste.com/privacy-seal/12WBT-Pty-/seal?rid=e6725e0d-e30a-4f70-a7ca-5442dcacbf16" alt="TRUSTe online privacy certification">
								</a>
							</div>
					</div>
					<div id="sister-site" class="bottom-copy">
						<a href="/us/blog/" id="view_us_site_btn">Visit Our US Site</a>
					</div>
				</div>
				<div>
			</div><!--/ sample-footer -->

	</div><!--/ footer-public-->


<?php wp_footer(); ?>


</body>
</html>