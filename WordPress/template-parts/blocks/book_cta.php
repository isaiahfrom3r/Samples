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

$bImage = get_field('book_image' , 'option');
$bTitle = get_field('book_area_title' , 'option');
$bText = get_field('book_area_text', 'option');


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
<div id="final-band" style="<?=$roundStyle?>" class="container-fluid <?=$background?>  yellow paddtop100 paddbott100 <?php echo esc_attr($className); ?>" id="<?php echo esc_attr($id); ?>">
	<div class="container paddtop0 paddbott0">
		<div class="row align-midle goldline  ">
			
			
			<div class="col-md-6 col-sm-12 col-lg-3 ">
				
				<img class="revbubble" src="<?=$bImage['url']?>" alt="<?=$bImage['alt']?>"></img>
												
			</div>
							
							
			<div class="col-md-6 col-sm-12 col-lg-9 text-left paddtop20">
				
				
				<h4> <?=$bTitle?> </h4>
				<span class="white"><?=$bText?>	</span>			
				<div class="margtop40 paddtop40" style="border-top: 2px solid white;">
					<img class="" src="/wp-content/uploads/calendar.png" style="padding-right: 10px;" alt="Calendar Icon"></img>
					<div class="button  glowbutton bubble"><a href="/request-an-appointment/" target="_self">request an appointment</a></div>
				</div>
			</div>
			
			
		</div>
	</div>
</div>
</div>