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


$buttonColor = "";
$fcolor = "";
if($background == "bg-dk-teal"){
	$fcolor = "yellow";
	$buttonColor = "glowbutton";
}elseif($background == "bg-offwhite"){
	$fcolor = "";
	$buttonColor = "glowGreen";
}elseif($background == "bg-med-teal"){
	$fcolor = "white"; 
	$buttonColor = "";
}elseif($background == "none"){
	$fcolor = "dk-teal"; 
	$buttonColor = "";
	$background = "bg-white";
}elseif($background == "bg-lt-green"){
	$fcolor = "dk-teal"; 
	$buttonColor = "regbutton";
}

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
$sectionTitle = get_field('section_title');
$sectionContent = get_field('section_content');

?>

<div class="wrapBanner <?=$cColor?>" style="padding: 0px; margin: 0px; ">
<div  style="<?=$roundStyle?>" class="container-fluid <?=$background?>  <?=$fcolor?> paddtop100 paddbott100 <?php echo esc_attr($className); ?>" id="<?php echo esc_attr($id); ?>">
	<div class="container paddtop0 paddbott0 s">
		<div class="row align-midle">
			<div class="col-md-12 col-sm-12 col-lg-12 flexCenter align-middle flex ">
				<?php if($sectionTitle != "" || $sectionContent!= "" ){ ?>
					
					<?php if($sectionTitle){ ?><h2 ><?=$sectionTitle?></h2><?php } ?>
					<?php if($sectionContent){ ?><div ><?=$sectionContent?></div> <?php } ?>
				
				<?php } ?>		
			</div>
			<div class="col-md-12 col-sm-12 col-lg-12  ">
				
								
					<?php if( have_rows('slides') ): ?>
                        <div class="owl-carousel owlContent owl-theme">
                        <?php 
                        $count = 0;
						
                        // loop through rows (sub repeater)
                        while( have_rows('slides') ): the_row();  $count++;
                        	$link = get_sub_field( 'link' );
                        	$icon = get_sub_field( 'icon' );
                        
                        	
                        	?>
                        	
                        	
                        	<?php if($count == "1"){ ?>
                        	<div class="col-md-12 row item">
                        	<?php } ?>
                        	
                        		<?php if(isset($link['url'])){ ?>
                        			<div class="col-md-4 white row paddtop10"> 
	                        			<div class="col-sm-1 nopadd"><img class="inline  inlineIcon" style="width: 100%;" src="<?=$icon['url']?>" alt="<?=$icon['alt']?>"></img> </div>
	                        			
	                        			<a target="<?=$link['target']?>" class="inline  col-sm-11" <?php if($link['url']){ ?>href="<?=$link['url']?>"> <?php } ?> <?php if(isset($link['title'])){ echo $link['title'];} ?></a></div>
								<?php } ?>
                            
                            <?php if($count == "6"){ $count = 0; ?>
                        	</div>
                        	<?php } ?>
                            
                            
                        <?php endwhile; ?>
                        </div>
                    <?php endif; ?>
				
				</div>
												
			</div>
			
			<style type="text/css" media="screen">
				.owl-dots{
					margin-top: 40px !important;
				}
			</style>
			
			
			<script>
	jQuery(document).ready(function($) {
					
						  $('.owlContent').owlCarousel({
						    loop:true,
						    margin:10,
						    dots:true,
						    autoplay:false,
							autoplayTimeout:12000,
						    nav:false,
						    responsive:{
						        0:{
						            items:1
						        },
						        600:{
						            items:1
						        },
						        1000:{
						            items:1
						        }
						    }
						})
					 
				  
					 	 
					});

	
	
	
	
</script>
							
			
		</div>
	</div>
</div>
</div>