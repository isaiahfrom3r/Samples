<?php

/**
 * Simple Content Block Template.
 *
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'simpleContent-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'SimpleContent-block';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}


// Default Block Items 
$cRound = get_field('corner_to_round');
$background = get_field('background_color');
$cColor = get_field('corner_color');


$fcolor = "";
if($background == "bg-dk-teal"){
	$fcolor = "yellow";
}elseif($background == "bg-offwhite"){
	$fcolor = "";
}elseif($background == "bg-med-teal"){
	$fcolor = "white"; 
}elseif($background == "none"){
	$fcolor = "med-teal"; 
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
$textAlign = get_field('text_align');
$content = get_field('content');
?>
<div class=" wrapBanner <?=$cColor?>" style="padding: 0px; margin: 0px; ">
<div id="final-band" style="<?=$roundStyle?>" class="container-fluid <?=$background?> <?=$fcolor?>  paddtop60 paddbott60 <?php echo esc_attr($className); ?>" id="<?php echo esc_attr($id); ?>">
	<div class="container paddtop0 paddbott0 eightywidth">
		<div class="row align-midle">
			<div class="col-md-12 col-sm-12 col-lg-12 <?=$textAlign?> ">
				
				<?=$content?>
				
												
			</div>
							
			
		</div>
	</div>
</div>
</div>