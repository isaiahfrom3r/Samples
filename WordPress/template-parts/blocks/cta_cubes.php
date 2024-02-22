<?php

/**
 * CTA Cube Template
 *
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'cta_cubes-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'cta_cubes-block';
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
$sectionTitle = get_field('section_title');

?>
<div class="wrapBanner <?=$cColor?>" style="padding: 0px; margin: 0px; ">
<div style="<?=$roundStyle?>" class="container-fluid <?=$background?>  paddtop100 paddbott100 <?php echo esc_attr($className); ?>" id="<?php echo esc_attr($id); ?>">
	<div class="container paddtop0 paddbott0 eightywidth">
		<div class="row align-midle">
			<div class="col-md-12 col-sm-12 col-lg-12 text-center">
				
				<h2 class="dk-teal"><?=$sectionTitle?></h2>
				
				<?php  
				// Check rows existexists.
				if( have_rows('icon_rows') ): ini_set('display_errors', 1); // set to 0 for production version 
				error_reporting(E_ALL);
					$row = 0;
					$i= 0;
				    // Loop through rows.
				    while( have_rows('icon_rows') ) : the_row();
						$row++;
						
						$cubes[$row] = 0;
						if( have_rows('cubes') ): 
							while( have_rows('cubes') ):  the_row(); $cubes[$row]++; 
							?> 
                              

                                    
                            <?php endwhile; ?>
                        <?php endif; 

						
							
				       	// check for rows (sub repeater)
                            if( have_rows('cubes') ): ?>
                                <div class="row">
                                <?php 
								
                                // loop through rows (sub repeater)
                                while( have_rows('cubes') ): the_row();
                                	$count = $cubes[$row]; 
                                	$divsize = '4';
                                	if($count == 1){
	                                	$divsize = '12';
                                	}elseif($count == 2){
	                                	$divsize = '6';
                                	}elseif($count == 3){
	                                	$divsize = '4';
                                	}elseif($count == 4){
	                                	$divsize = '3';
                                	}elseif($count == 6){
	                                	$divsize = '2';
                                	}
									$title = get_sub_field('title');
									$cta = get_sub_field('call_to_action');
									$background = get_sub_field('background');
                                    // display each item as a list - with a class of completed ( if completed )
                                    
                                    $i++;
                                    ?>
                                    
                                    <div class="col-md-<?=$divsize?> col-md-4 col-sm-12 cubeCTA align-middle">
	                                    <?php if(isset($background['url'])){ $color = "white"; $button = "whiteButton";  ?>
	                                    	<div class="col-sm-12 paddtop120 paddbott120 backgroundID<?=$i?>" style=" background-size: cover; height: 100%;">
		                                <?php }else{  $color = "dk-teal"; $button = "glowgreen"; ?>
	                                    	<div class="col-sm-12 paddtop120 paddbott120 bg-offwhite <?=$color?>" style="height: 100%;" >
		                                <?php } ?>
		                                    
		                                    <h5 class="<?=$color?>"><?=$title?></h5>
		                                    <a target="<?=$cta['target']?>" class="button <?=$button?> cubeButton bubble <?=$color?>" href="<?=$cta['url']?>" > <?=$cta['title']?></a>
	                                    </div>
                                    </div>
                                    
                                    
                                    <style>
	                                    .backgroundID<?=$i?> {
		                                    background-image:
    linear-gradient(0deg, rgba(0,0,0,0.4), rgba(0,0,0,0.2)),
    url(<?=$background['url']?>);
	                                    }
	                                    
	                                    .backgroundID<?=$i?>:hover{
		                                    background-image:  url(<?=$background['url']?>);
		                                    -webkit-transition: all 0.3s ease-in-out;
	-moz-transition: all 0.3s ease-in-out;
	-ms-transition: all 0.3s ease-in-out;
	-o-transition: all 0.3s ease-in-out;
	transition: all 0.3s ease-in-out;
	                                    }
                                    </style>
                                    
                                    
                                    
                                <?php endwhile; ?>
                                </div>
                            <?php endif; ?>
				        
				   
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
							
			
		</div>
	</div>
</div>
</div>