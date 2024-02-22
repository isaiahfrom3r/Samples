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
$backgroundbox = get_field('backgroundBox');

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
$fcolor = "";
if($backgroundbox == "bg-dk-teal"){
	$fcolor = "white";
}elseif($backgroundbox == "bg-offwhite"){
	$fcolor = "";
}elseif($backgroundbox == "bg-med-teal"){
	$fcolor = "white"; 
}elseif($backgroundbox == "none"){
	$fcolor = "med-teal"; 
}

// Block Specific Items 
$content = get_field('content');
$image = get_field('image');
$imagefirst = get_field('image_first');
$radius = get_field('image_radius');

$backgroundimg = get_field('background');
$radius = json_encode($radius);
ini_set('display_errors', 1); // set to 0 for production version 
error_reporting(E_ALL);
$tl = $tr = $bl = $br = '0px ';

if (strpos($radius,'Top Left') !== false) {
   	$tl = '40px ';
}
if (strpos($radius,'Top Right') !== false) {
   	$tr = '40px ';
}
if (strpos($radius,'Bottom Left') !== false) {
   	$bl = '40px ';
}
if (strpos($radius,'Bottom Right') !== false) {
   	$br = '40px ';
}

$radstype = "border-radius: ".$tl.$tr.$br.$bl." ;";


if($imagefirst == "Yes"){
	$order1 = 1;
	$order2 = 2;
}else{
	$order1 = 2;
	$order2 = 1;
}

$position = get_field('hero_position_vertical');
$lrposition =   get_field('hero_position_horizontal');

if(!isset($position)){
	$position = "center";
}
if(!isset($lrposition)){
	$lrposition = "center";
}
?>

<div class="wrapBanner <?=$cColor?>" style="padding: 0px; margin: 0px; ">
<div   style="<?=$roundStyle?>  background-size: cover !important; <?php if ($position != "None") { ?> background-position:  <?= $position ?> <?= $lrposition ?> !important <?php } ?>; background: url(<?=$backgroundimg['url']?>); "  class="container-fluid <?=$background?>  paddtop80 paddbott80 <?php echo esc_attr($className); ?>" id="<?php echo esc_attr($id); ?>">
	<div class="container paddtop0 paddbott0 eightywidth">
		<div class="row align-midle">
			<div class="col-md-6 col-sm-12 col-lg-6   " style="order:<?=$order1?>;">
				<?php if(isset($image['url'])){ ?>
					<img class="5050Image "  style="<?=$radstype?>" src="<?=$image['url']?>" alt="<?=$image['alt']?>"></img>
				<?php } ?>
												
			</div>
			<div class="col-md-6 col-sm-12 herobubble <?=$backgroundbox?> col-lg-6 mobileOrderImage forceColor align-middle flex" style="order:<?=$order2?>;  padding: 40px; display: inline !important;">
				<h3><?=get_field( 'content_title' )?></h3>
				<?=$content?>
				<?php if( have_rows('ctas') ): ?>

				
				    <?php while( have_rows('ctas') ) : the_row(); ?>
						<?php $link = get_sub_field('cta_link'); ?>
						
						
				        <a class="button glowbutton" href="<?=$link['url']?>"><?=$link['title']?></a>
				
				    <?php endwhile; ?>
				
				
				<?php endif; ?>
				
												
			</div>
							
			
		</div>
	</div>
</div>
</div>