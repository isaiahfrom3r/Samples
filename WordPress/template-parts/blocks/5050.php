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

// Block Specific Items 
$content = get_field('content');
$content2 = get_field('content_right');
$sectionTitle = get_field('content_title');
$image = get_field('image');
$imagefirst = get_field('image_first');
$radius = get_field('image_radius');
$imageof = get_field('use_an_image');
$ignorePAdd = get_field('ignore_padding');
$gapping = get_field('75text');

$ignorePAdd = json_encode($ignorePAdd);
$noabove = $nobelow = false;
if (strpos($ignorePAdd,'Below') !== false) {
    $nobelow = true;
}
if (strpos($ignorePAdd,'Above') !== false) {
    $noabove = true;
}

$radius = json_encode($radius);

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
$first = $second = 'col-lg-6 col-md-6';
if($gapping == true){
	$first  = 'col-lg-8 col-md-8';
	$second = 'col-lg-4 col-md-4';
}


?>


<div class="wrapBanner <?=$cColor?>" style="padding: 0px; margin: 0px; ">
<div   style="<?=$roundStyle?>" class="container-fluid <?=$background?> <?=$fcolor?> <?php if($noabove == false){ ?> paddtop80 <?php } ?> <?php if($nobelow == false){ ?> paddbott80 <?php } ?>  <?php echo esc_attr($className); ?>" id="<?php echo esc_attr($id); ?>">
	<div class="container paddtop0 paddbott0 ">
		<?php if(isset($sectionTitle)){ ?><div class="col-12 row "><h2 class="<?=$fcolor?>"><?=$sectionTitle?></h2></div><?php } ?>
		<div class="row align-midle">
			
			<?php if($imageof == true  ){ ?>
			
				<div class="<?=$second?> col-sm-12   align-middle flex  " style="order:<?=$order1?>;">
					<img class="5050Image "  style="<?=$radstype?>" src="<?=$image['url']?>" alt="<?=$image['alt']?>"></img>
				</div>
			
			<?php } ?>
			<div class="col-sm-12 <?=$first?> mobileOrderImage   flex <?php  if($imageof == false ){ echo "paddbott0 align-top"; }else{ echo "align-middle";}?>" style="order:<?=$order2?>; display: inline !important;">
				
				<?=$content?>
				<?php if( have_rows('ctas') ): ?>

				
				    <?php while( have_rows('ctas') ) : the_row(); ?>
						<?php $link = get_sub_field('cta_link'); ?>
						
						
				        <a class="button glowbutton" href="<?=$link['url']?>"><?=$link['title']?></a>
				
				    <?php endwhile; ?>
				
				
				<?php endif; ?>
				
												
			</div>
			
			<?php  if($imageof == false ){  ?>
			
				<div class="<?=$first?> col-sm-12  mobileOrderImage align-top flex <?php  if($imageof == false ){ echo "paddtop0"; }?>" style="order:<?=$order2?>; display: inline !important;">
				
					<?=$content2?>
					
				</div>
			
			<?php } ?>
							
			
		</div>
	</div>
</div>
</div>