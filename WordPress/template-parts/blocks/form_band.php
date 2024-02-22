<?php

/**
 * Simple Content Block Template.
 *
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'formContent-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'FormContent-block';
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
$form = get_field('form');
$side = get_field('side_content');
$size = '12';
$icon = get_field( 'icon' );
if($side == "Yes"){
	$size = '6';
}
?>
<div class=" wrapBanner <?=$cColor?>" style="padding: 0px; margin: 0px; ">
<div id="final-band" style="<?=$roundStyle?>" class="container-fluid <?=$background?> <?=$fcolor?>  paddtop60 paddbott60 <?php echo esc_attr($className); ?>" id="<?php echo esc_attr($id); ?>">
	<div class="container paddtop0 paddbott0 eightywidth formBox">
		<div class="row align-midle paddbott40 paddtop40">
			<div class="col-md-<?=$size?> col-sm-12 col-lg-<?=$size?> <?=$textAlign?> ">
				
				<?=$content?>
				<?=$form?>
												
			</div>
			
			
			<?php if($side == "Yes"){ ?>
			<div class="col-md-6 col-sm-12  col-lg-6 <?=$textAlign?> ">
				<div class="col-12 text-center margtop120 margbott60">
					<img  src="<?=$icon['url']?>" alt="<?=$icon['alt']?>" ></img>
				</div>
				<?php if( have_rows('side_points') ): ?>
				<?php 
					while( have_rows('side_points') ): the_row();
					$iconside = get_sub_field( 'icon' );
					$textSide	= get_sub_field( 'text' );
				?>
				
				<div class="col-12 align-middle  row " style="padding-left: 40px;">
					<?php if($iconside){ ?>
						<img class="inline" style="padding-right: 10px; height: 30px;" src="<?=$iconside['url']?>" alt="<?=$iconside['alt']?>"></img>
					<?php } ?>
					<div class="inline paddtop10"><?=$textSide?></div>
						
				</div>
				
				<?php endwhile; ?>
				<?php endif; ?>
												
			</div>
			<?php } ?>			
			
		</div>
	</div>
</div>
</div>