<?php

/**
 * Simple Content Block Template.
 *
 */

// Create id attribute allowing for custom "anchor" value.
$id = '5050-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = '5050-block';
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

if($background == "bg-dk-teal"){
	$fcolor = "white";
}elseif($background == "bg-offwhite"){
	$fcolor = "";
}elseif($background == "bg-med-teal"){
	$fcolor = "teal"; 
}


// Block Specific Items 
$content = get_field('content');
$image = get_field('image');
$imagefirst = get_field('image_first');

if($imagefirst == "Yes"){
	$order1 = 1;
	$order2 = 2;
}else{
	$order1 = 2;
	$order2 = 1;
}
?>
<div class="wrapBanner <?=$cColor?>" style="padding: 0px; margin: 0px; ">
<div   style="<?=$roundStyle?>" class="container-fluid <?=$background?> <?=$fcolor?> paddtop100 paddbott100 <?php echo esc_attr($className); ?>" id="<?php echo esc_attr($id); ?>">
	<div class="container paddtop0 paddbott0 eightywidth">
		<div class="row align-midle">
			<div class="col-md-6 col-sm-12 col-lg-6   " style="order:<?=$order1?>;">
				
				<img class="5050Image " src="<?=$image['url']?>" alt="<?=$image['alt']?>"></img>
				
												
			</div>
			<div class="col-md-6 col-sm-12 col-lg-6 mobileOrderImage align-middle flex" style="order:<?=$order2?>; display: inline !important;">
				
				<?=$content?>
				<?php if( have_rows('locations') ): ?>

				
				    <?php while( have_rows('locations') ) : the_row(); ?>
						<?php $location = get_sub_field('location'); ?>
						
						
				       <div class="col-sm-6 col-md-12 col-lg-6 float-left no-leftpadding">
					       
					       <?=$location?>
					       
				       </div>
				
				    <?php endwhile; ?>
				
				
				<?php endif; ?>
				
												
			</div>
							
			
		</div>
	</div>
</div>
</div>