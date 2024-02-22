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
		<div class="row align-midle goldline ">
			<div class="col-md-6 col-sm-12 col-lg-6 ">
				<h4> Request an Appointment </h4>
				<p>If jaw pain, facial pain, or sleep disorders plague you, let us help! The TMJ & Sleep Therapy Centre has a treatment plan that is right for you.</p>
												
			</div>
							
							
			<div class="col-md-6 col-sm-12 col-lg-6 text-center paddtop20">
				<img src="/wp-content/uploads/calendar.png" style="padding-right: 10px;" alt="Calendar Icon"></img>
				<div class="button glowbutton bubble"><a href="/request-an-appointment/" target="_self">request an appointment</a></div>
			</div>
		</div>
	</div>
</div>
</div>