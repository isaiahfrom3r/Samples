<?php

/**
 * Hover Image Block Template.
 *
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'hoverImage-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'hoverImage-block';
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
<style >
	
.imageMap__container {
  width: 100%;
  display: grid;
  grid-template-columns: repeat(11, 1fr);
	grid-template-rows: repeat(11, 1fr);
  position: relative;
}
.imageMap__container img {
  width: 100%;
  height: auto;
  grid-column: 1/-1;
  grid-row: 1/-1;
  pointer-events: none;
  overflow: hidden;
}

.markers {
    background: rgba(255,255,255,.7);
    border-width: 4px;
    border-style: solid;
    border-radius: 50%;
    border-color: rgba(255,255,255,.5);
    width: 20px;
    height: 20px;
    box-sizing: border-box;
    align-self: center;
    justify-self: center;
    cursor: pointer;
    animation: ownpulse 3s cubic-bezier(.19,1,.22,1) infinite both;
  position: relative;
}
.markers:focus-within .marker__card, .markers:focus .marker__card {
	display: block;
}

.marker__card {
	background-color: #fefefe;
	padding: 1.5rem;
	display: none;
	margin-top: -5%;
	min-height: 100px;
	position: absolute;
  bottom: 32px;
  right: 100px;
	width: 30%;
	z-index: 100;
	-webkit-box-shadow: 0 0 5px 0 rgba(0,0,0,.3);
	box-shadow: 0 0 5px 0 rgba(0,0,0,.3);
	min-width: 220px;
	max-width: 300px;
	animation: fadeInUp;
	animation-duration: .5s;
	animation-fill-mode: both;
}

.marker__card__title {
  font: 31px/1.2 'Georgia', serif;
  margin-top: 0;
  margin-bottom: 1rem;
}
/* animations */
@keyframes ownpulse {
	0% {
	    -webkit-box-shadow: 0 0 0 0 #fff;
	    box-shadow: 0 0 0 0 #fff;
	}
	50% {
	    -webkit-box-shadow: 0 0 0 40px rgba(92,112,214,0);
	    box-shadow: 0 0 0 40px rgba(92,112,214,0);
	}
	0% {
	    -webkit-box-shadow: 0 0 0 0 #fff;
	    box-shadow: 0 0 0 0 #fff;
	}
	50% {
	    -webkit-box-shadow: 0 0 0 40px rgba(92,112,214,0);
	    box-shadow: 0 0 0 40px rgba(92,112,214,0);
	}
}
@keyframes zoomIn {
	0% {
		opacity: 0;
		transform: scale3d(.3,.3,.3);
		-webkit-transform: scale3d(.3,.3,.3);
	}
	50% {
		opacity: 1;
	}
}
@keyframes fadeInUp {
	0% {
    opacity: 0;
	transform: scale3d(.3,.3,.3) translate3d(0,100%,0);
	-webkit-transform: scale3d(.3,.3,.3);
    -webkit-transform: translate3d(0,100%,0);
}
100% {
    opacity: 1;
    -webkit-transform: none;
    transform: none;
}
0% {
    opacity: 0;
    -webkit-transform: translate3d(0,100%,0);
    transform: scale3d(.3,.3,.3) translate3d(0,100%,0);
}
100% {
    opacity: 1;
    -webkit-transform: none;
    transform: none;
}
}
</style>
<div class=" wrapBanner <?=$cColor?>" style="padding: 0px; margin: 0px; ">
<div id="final-band" style="<?=$roundStyle?>" class="container-fluid <?=$background?> <?=$fcolor?>  paddtop60 paddbott60 <?php echo esc_attr($className); ?>" id="<?php echo esc_attr($id); ?>">
	<div class="container paddtop0 paddbott0 eightywidth">
		<div class="row align-midle">
			<div class="col-md-12 col-sm-12 col-lg-12 <?=$textAlign?> ">
				
				
				<div class="imageMap__container">
  <img src="/wp-content/uploads/MicrosoftTeams-image-43-scaled.jpg" alt="work by sweetie on dribbble">
  <div class="markers" tabindex="0" style="grid-column: 1/6; grid-row: 3/16;">
    <div class="marker__card">
				<p class="marker__card__title">
					Ear
				</p>
				<p>Text about the Ear</p>
			</div>
  </div>
  <div class="markers" tabindex="0" style="grid-column: 5/5; grid-row: 7/10;">
        <div class="marker__card">
				<p class="marker__card__title">
					Jaw
				</p>
				<p>
				Text about the Jaw. 
          </p>
			</div>
  </div>
</div>


					
			

				
				
												
			</div>
							
			
		</div>
	</div>
</div>
</div>