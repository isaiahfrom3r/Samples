<?php

/**
 * Logo Template
 *
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'logoband-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'logoband-block';
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



?>
<div class="wrapBanner <?=$cColor?>" style="padding: 0px; margin: 0px; ">
<div style="<?=$roundStyle?>" class="container-fluid <?=$background?>  paddtop60 paddbott60 <?php echo esc_attr($className); ?>" id="<?php echo esc_attr($id); ?>">
	<div class="container paddtop0 paddbott0 eightywidth">
		<div class="row align-midle">
			
			
			<div class="col-md-12 col-sm-12 col-lg-12 text-center row teal">
				
				
                           <?php if( have_rows('logos') ): ?>
                                <div class="row align-middle automargin">
                                <?php 
                                
								
                                // loop through rows (sub repeater)
                                while( have_rows('logos') ): the_row();
                                	$logo = get_sub_field( 'logo' );
                                	$link = get_sub_field( 'link' );
                                	?>
                                    
                                    <a href="<?=$link['url']?>" target="<?=$link['target']?>"><img class="flexCenter" style="padding: 25px; " src="<?=$logo['url']?>" alt="<?=$logo['alt']?>"></img></a>
                                    
                                <?php endwhile; ?>
                                </div>
                            <?php endif; ?>
				
												
			</div>
			
			
									
			
		</div>
	</div>
</div>
</div>