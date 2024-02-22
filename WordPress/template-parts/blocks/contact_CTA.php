<?php

/**
 * Appointment Block Template.
 *
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'appointmentCTA-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'appointmentCTA-block';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

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
?>
<div class="wrapBanner <?=$cColor?>" style="padding: 0px; margin: 0px; ">
<div id="final-band" style="<?=$roundStyle?>" class="container-fluid <?=$background?> yellow paddtop100 paddbott100 <?php echo esc_attr($className); ?>" id="<?php echo esc_attr($id); ?>">
	<div class="container paddtop0 paddbott0">
		<div class="row align-midle  ">
					
							
			<div class="col-md-12 col-sm-12 col-lg-12 text-center paddtop20 text-center greenline">
				<h4 class="dk-teal paddtop40"> <?=get_field('title')?> </h4>
				<p><?=get_field('content')?></p>
<!-- 				<img src="/wp-content/uploads/calendar.png" style="padding-right: 10px;" alt="Calendar Icon"></img> -->
				<div class=""><a class="button  bg-dk-teal bubble" href="/contact-us//" target="_self">Get in touch</a></div>
			</div>
		</div>
	</div>
</div>
</div>