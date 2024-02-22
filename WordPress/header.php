<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
	<link rel="manifest" href="/manifest.json">
	
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">
	
	
	<?php wp_head(); ?>
    <?php
        if(get_field('google_analytics_script_block', 'option')):
            echo get_field('google_analytics_script_block', 'option');
        endif;
    ?>
    <?php
        if(get_field('additional_header_scripts_block', 'option')):
            echo get_field('additional_header_scripts_block', 'option');
        endif;
    ?>


	<link rel='stylesheet' id='owlTheme-css' href='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css' media='all' />
	<link rel='stylesheet' id='owl-css' href='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css' media='all' />
	<script src='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js' id='owlJs-js'></script>

	

	
	
</head>

<body <?php body_class(); ?>>
	<?php
        if(get_field('additional_body_scripts_block', 'option')):
            echo get_field('additional_body_scripts_block', 'option');
        endif;
    ?>


    <div id="page" class="site bg-white">
        <header id="masthead" class="site-header bg-lightBlue">

            <div class="container-fluid">
                <div class="container  no-rightpadding">
                    <div class=" align-middle paddtop20">

                      
                        <div class=" header-right text-right no-leftpadding">

							<div class="align-middle" style="height:100%;">
								
						<?php $logoimage = get_field('main_logo', 'option');  ?>
                        <?php if($logoimage) { ?><a class="logolink float-left inline" href="<?php echo esc_url( home_url() ); ?>" name="<?php echo get_bloginfo('name');?>" aria-label="<?php echo get_bloginfo('name');?>" ><img src="<?php echo $logoimage['sizes']['medium'];?>" alt="<?php echo $logoimage['alt'];?>" class="logo" /></a><?php } ?>


								<div id="site-navigation" class=" float-left no-rightpadding inline">
									<?php
									wp_nav_menu( array(
										'theme_location' => 'primary',
										'menu_id'        => 'primary',
										'menu_class' => 'inline',
										'link_before'    => '',
										'link_after'     => ''
									) );
									?>
									
									
									
								</div>
								
								<div class="align-middle inline float-right paddtop10" style="height:100%;">

										<a href="/for-providers/" class="button providerButton" target="_self">For Providers </a>
<!-- 										<div class="button patientsButton"><a href="/for-patients/" target="_self">For Patients </a></div> -->
										<a class="button appointmentButton glowbutton" href="/request-an-appointment/" target="_self">Request an Appointment </a>

										<div class="openmenu text-right no-leftpadding nodesktop float-right">
											<!--i class="fa fa-bars" aria-hidden="true"></i-->
											<button class="hamburger hamburger--slider" type="button">
												<span class="hamburger-box">
												<span class="hamburger-inner"></span>
												</span>
											</button>
										</div>
								
								</div>

								

							
								
								
								
								
							</div>
                        </div>
                       
                    </div>
                </div>
            </div>

        </header><!-- #masthead -->

		<div id="mobile-menu-container" class=" hide">
			<div class="mobile-menu-inner text-center">
				<!--<div class="container-fluid mobile-search-wrapper bg-md-gray2">
					<?php echo do_shortcode('[search_form]'); ?>
				</div>-->

				<?php
				wp_nav_menu( array(
					'theme_location' => 'mobile-primary',
					'menu_id'        => 'mobile-menu',
					'menu_class' => 'bg-lt-gray',
					'link_before'    => '',
					'link_after'     => ''
				) );
				?>

				<div class="mobile-social bg-dk-blue text-center paddtop20 paddbott20">
					<?php echo do_shortcode('[social-icons]'); ?>
				</div>

				<div class="container-fluid mobile-search-wrapper margtop30">
					<?php echo do_shortcode('[search_form]'); ?>
				</div>

			</div>
		</div>

        <div id="content" class="site-content site-container">

			<?php if(get_field('alert_banner', 'option')) { ?>
			<a href="<?php echo get_field('alert_banner_link', 'option'); ?>" class="nolines" style="display:block;"<?php if(get_field('alert_banner_link_target', 'option') == 'new') { ?> target="_blank"<?php } ?>>
			<span class="container-fluid alert-banner">
				<div class="container">
					<div class="row align-middle">
						<div class="col-12 col-md-3 alert-title paddtop5 paddbott5"><h3 class="margbott0 margtop0"><?php echo get_field('alert_banner_intro_text', 'option'); ?></h3></div>
						<div class="col-11 col-md-8 alert-message paddtop5 paddbott5 alertred"><?php echo get_field('alert_banner_message', 'option'); ?></div>
						<?php if(get_field('alert_banner_link', 'option')) { ?>
						<div class="col-1 col-md-1 alert-cta text-center">
							<i class="fas fa-chevron-right"></i>
						</div>
						<?php } ?>
					</div>
				</div>
			</span>
			</a>
			<?php } ?>
