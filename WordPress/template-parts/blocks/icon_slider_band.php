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
$disable = get_field('disable_slider');

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

<style type="text/css" media="screen">
	.owl-theme .owl-dots .owl-dot span{
		background-color: white !important;
	    border-radius: 50% !important;
	    height: 16px !important;
	    width: 16px !important;
	    position: absolute !important;
	    top: 0px !important;
	    left: 0px !important;
	    margin: 0px;
	    border: 2px solid;
	}
</style>

<div class="wrapBanner <?=$cColor?>" style="padding: 0px; margin: 0px; ">
<div  style="<?=$roundStyle?>" class="container-fluid <?=$background?>  <?=$fcolor?> paddtop40 paddbott40 <?php echo esc_attr($className); ?>" id="<?php echo esc_attr($id); ?>">
	<div class="container paddtop0 paddbott0 s">
		<div class="row align-midle">
			<div class="col-md-12 col-sm-12 col-lg-12 flexCenter align-middle flex ">
				<?php if($sectionTitle != "" || $sectionContent!= "" ){ ?>
					
					<?php if($sectionTitle){ ?><h2 ><?=$sectionTitle?></h2><?php } ?>
					<?php if($sectionContent){ ?><div ><?=$sectionContent?></div> <?php } ?>
				
				<?php } ?>		
			</div>
			<div class="col-md-12 col-sm-12 col-lg-12 row ">
				
								
					<?php if( have_rows('slides') ): ?>
                        <?php if($disable != "Yes"){ ?> <div class=">owl-carousel owlContent owl-theme "> <?php } ?>
                        <?php 
                        $count = 0;
						
                        // loop through rows (sub repeater)
                        while( have_rows('slides') ): the_row();  $count++;
                        	$link = get_sub_field( 'link' );
                        	$icon = get_sub_field( 'icon' );
                        
                        	
                        	?>
                        	
       
                        		<?php if(isset($link['url'])){ ?>
                        			<div class="<?php if($disable != "Yes"){ ?> col-md-12 <?php }else{?> col-md-4 col-sm-12 col-lg-4 margbott20 <?php } ?> item white paddtop10 automargin text-center flex"> <a target="<?=$link['target']?>" class="automargin" <?php if($link['url']){ ?>href="<?=$link['url']?>"> 
	                        		
	                        			<img style="max-width: 200px;" class="<?php if($disable != "Yes"){ ?>  inline inlineIcon <?php } ?>" src="<?=$icon['url']?>" alt="<?=$icon['alt']?>"></img> 
	                        			
	                        			
	                        			 <?php } ?> <?php if(isset($link['title'])){ echo $link['title'];} ?></a></div>
								<?php } ?>
                            
                        
                            
                            
                        <?php endwhile; ?>
                         <?php if($disable != "Yes"){ ?> </div><?php } ?>
                        
                    <?php endif; ?>
				
				</div>
												
			</div>
			
			<?php if($disable != "Yes"){ ?>
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
						            items:4
						        },
						        600:{
						            items:4
						        },
						        1000:{
						            items:4
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