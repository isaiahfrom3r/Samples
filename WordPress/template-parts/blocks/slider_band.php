<?php

/**
 * Slider Band Content Block Template.
 *
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'sliderBand-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'SliderBand-block';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}


// Default Block Items 
$cRound = get_field('corner_to_round');
$background = get_field('background_color');
$cColor = get_field('corner_color');


$roundStyle = "";

if($cRound == "Top Left"){
	$roundStyle = "border-radius:40px 0px 0px 0px;";
}elseif($cRound == "Top Right"){
	$roundStyle = "border-radius:0px 40px 0px 0px;";
}elseif($cRound == "Bottom Left"){
	$roundStyle = "border-radius:0px 0px 0px 40px;";
}elseif($cRound == "Bottom Right"){
	$roundStyle = "border-radius:0px 0px 40px 0px;";
}


// Block Specific Items 
$title = get_field('left_title');
$content = get_field('left_text');
$actual_link = $_SERVER['REQUEST_URI'];

?>


<?php if($actual_link == "/"){ ?>
<div class="wrapBanner <?=$cColor?>" style="padding: 0px; margin: 0px; ">
<div  style="<?=$roundStyle?>" class="container-fluid <?=$background?>  paddtop100 paddbott100 <?php echo esc_attr($className); ?>" id="<?php echo esc_attr($id); ?>">
	<div class="container paddtop0 paddbott0 slider-container">
		<div class="row align-midle">
			<div class="col-md-12 col-sm-12 col-lg-3 flexCenter align-middle flex ">
				<h2 class="white"><?=$title?></h2>
				<?=$content?>
												
			</div>
			<div class="col-md-12 col-sm-12 col-lg-9  ">
				
				
					<div class="owl-carousel owl-theme white " >
						
						<?php 
						$args = array(
						        'post_type' => 'testimonials',
						        'posts_per_page' => -1,
						        
						    );
						$query = new WP_Query($args);
						if ($query->have_posts()):  
						    while ($query->have_posts()): $query->the_post(); ?>
							<?php 
								$id = get_the_id(  ) ;
								$home = get_field( 'home_page' , $id  ); if($home != "Yes" ){continue;} ?>
							
								
							<div class="col-12 testSlider bubble">
							
								<?=the_content( )?> - <?=the_title(  )?> 
							</div>

						<?php 
						    endwhile;
						    wp_reset_postdata();
						endif;
						?>
						
						
											
					</div>
								
				
				
				</div>
												
			</div>
			
			
			
			<script>
	jQuery(document).ready(function($) {
	
	  $('.owl-carousel').owlCarousel({
	    loop:true,
	    margin:10,
	    dots:true,
	    autoplay:false,
		autoplayTimeout:6000,
	    nav:false,
	    responsive:{
	        0:{
	            items:1
	        },
	        600:{
	            items:1.5
	        },
	        1000:{
	            items:1.5
	        }
	    }
	})
	 
  
	 	 
	});
	
	
	
	
	
</script>


<?php }else{ ?>



<?php 
$id = get_the_id(  );
$child_args = array(
    'post_type' => 'testimonials',
	'posts_per_page' => -1,
);

$children = get_children( $child_args );


?>


<div    class="container-fluid  margbott80 margtop80 " id="<?php echo esc_attr($id); ?>">
	<div class="container paddtop0 paddbott0 eightywidth">
		<div class="row align-midle">
			<div class="col-md-12 col-sm-12 col-lg-12  symptomsPage " style="order:<?=$order1?>;">
				<h5>Explore More Testimonials</h5>
						
				<div class="owl-carousel owl-theme">	
				
				<?php foreach($children as $child){ ?>
				
				<?php 
					$id = $child->ID;
					$yt = get_field( 'youtube_embed' , $id  );	
					$home = get_field( 'home_page' , $id  ); if($home == "Yes" ){continue;} ?>
				<?php 
				
				$thumb = get_the_post_thumbnail_url($child->ID);
				
				
				?>
				<div class=" item" style="padding: 20px;">
					<a  href="<?=get_permalink($child->ID)?>">
<!-- 					<img class="full-width text-center" style="max-height: 250px;" src="<?=$thumb?>"></img> -->
										<h6 class="dk-teal paddtop10"><strong><?=$child->post_title?></strong></h6>

					<iframe style="width: 100%;"  height="240" src="<?=$yt?>" title="<?=$child->post_title?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
					
					
<!-- 					<p><?=get_the_excerpt( $child->ID )?></p> -->
</a>					
<!--  -->

				</div>
				
				<?php } ?>
				
						
				</div>			
				
				<a  style="    margin: auto; display: block; max-width: 200px; " class="button glowGreen bubble text-center" href="/testimonials">All Testimonials</a>
			</div>
			
		</div>
	</div>
</div>

<script>
		jQuery(document).ready(function($) {
	
		  $('.owl-carousel').owlCarousel({
		    loop:true,
		    margin:10,
		    dots:false,
		    autoplay:true,
			autoplayTimeout:20000,
		    nav:false,
		    responsive:{
		        0:{
		            items:1
		        },
		        600:{
		            items:3
		        },
		        1000:{
		            items:3
		        }
		    }
		})
	 
  
	 	 
	});
</script>

						
						
						
<?php } ?>	
			
		</div>
	</div>
</div>
</div>