
    </div><!--/content-->


<?php if(get_field('disclaimer_content')) { ?>
<div class="container-fluid bg-gray black paddtop30 paddbott20">
	<div class="container tinytext">
		<?php echo get_field('disclaimer_content'); ?>
	</div>
</div>
<?php } ?>

		<footer id="footer" class="container-fluid bg-offwhite ">

			<div class="container paddtop60 paddbott60">
				<div class="row">


					<?php 
						
						$fbimage = get_field('facebook_image', 'option');
						$youtubeimage = get_field('youtube_image', 'option');	
						$twitterimage = get_field('twitter_image', 'option');	
						$linkedinimage = get_field('linkedin_image', 'option');	
						$instagramimage = get_field('instagram_image', 'option');	
						$pinterestimage = get_field('pintrest_image', 'option');		

					?>
					<div class="col-12 col-sm-12 col-md-12 col-lg-7 footer-logo-wrapper margbott40">
						<h2>Contact Us</h2>
						<a class='footerSocial' href="<?=get_field('fb_link', 'option')?>"><img src="<?=$fbimage['url']?>" alt="<?=$fbimage['alt']?>"></img></a>
						<a class='footerSocial' href="<?=get_field('youtube_link', 'option')?>"><img src="<?=$youtubeimage['url']?>" alt="<?=$youtubeimage['alt']?>"></img></a>
						<a class='footerSocial' href="<?=get_field('twitter_link', 'option')?>"><img src="<?=$twitterimage['url']?>" alt="<?=$twitterimage['alt']?>"></img></a>
						<a class='footerSocial' href="<?=get_field('linkedin_link', 'option')?>"><img src="<?=$linkedinimage['url']?>" alt="<?=$linkedinimage['alt']?>"></img></a>
						<a class='footerSocial' href="<?=get_field('instagram_link', 'option')?>"><img src="<?=$instagramimage['url']?>" alt="<?=$instagramimage['alt']?>"></img></a>
<!-- 						<a class='footerSocial' href="<?=get_field('pintrest_link', 'option')?>"><img src="<?=$pinterestimage['url']?>" alt="<?=$pinterestimage['alt']?>"></img></a> -->
					</div>

					



					<div class="col-12 col-sm-12 col-md-12 col-lg-5  row">

						<div class=" col-lg-8 col-md-8 col-sm-12 ">
							
							<?php 
							// Check rows existexists.
							if( have_rows('locations', 'option') ):
							
							    // Loop through rows.
							    while( have_rows('locations', 'option') ) : the_row();
							
							        // Load sub field value.
							        $text = get_sub_field('text');
							        
							        ?>
							        <div class="location text-left ">
								        <div class="inline"><img src="/wp-content/uploads/🦆-icon-_location_.png"></img></div>
								        <div class="inline"><?=$text?></div>
							        </div>
							        <?php
							        // Do something...
							
							    // End loop.
							    endwhile;
							
							// No value.
							else :
							    // Do something...
							endif;
							?>
							
						</div>

						<div class=" col-lg-4 col-md-4 col-sm-12">
							
							<?php
								$location = 'footer1';
								if (has_nav_menu($location)) :
									$menu_obj = get_menu_by_location($location);
									wp_nav_menu( array('theme_location' => $location, 'items_wrap'=> '<ul id="%1$s" class="%2$s">%3$s</ul>', 'menu_id' => 'main-footer', 'menu_class' => 'main-footer') );
								endif;
							?>

						</div>					


					</div>
				</div>
				
				
			</div>
			<!--<div class="btt"><i class="fa fa-arrow-up" aria-hidden="true"></i></div>-->
		</footer>


</div><!--/page-->




<!--wordpress footer-->
<?php wp_footer(); ?>

<?php
    if(get_field('tracking_script')):
		echo get_field('tracking_script');
	endif;

	if(get_field('additional_footer_scripts_block', 'option')):
		echo get_field('additional_footer_scripts_block', 'option');
	endif;
?>
	</body>
</html>
