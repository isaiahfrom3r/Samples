<?php

/**
 * Staff Template
 *
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'staff-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'staff-block';
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
$sectionTitle = get_field('title');
$sectionContent = get_field('content');
$location = get_field('location');
$staffType =  get_field('staff_type');
if($staffType != 'providers'){
	$segment =  get_field('team_segment');
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
	$fcolor = "med-teal"; 
	$buttonColor = "";
}elseif($background == "bg-lt-green"){
	$fcolor = "dk-teal"; 
	$buttonColor = "regbutton";
}

?>
<div class="wrapBanner <?=$cColor?>" style="padding: 0px; margin: 0px; ">
<div style="<?=$roundStyle?>" class="container-fluid <?=$background?>  paddtop60 paddbott60 <?php echo esc_attr($className); ?>" id="<?php echo esc_attr($id); ?>">
	<div class="container paddtop0 paddbott0 ">
		<div class="row align-midle">
			<?php if($sectionTitle != "" || $sectionContent!= "" ){ ?>
			<div class="col-md-12 col-sm-12 col-lg-12 text-center ">
				
				<?php if($sectionTitle){ ?><h2 class="<?=$fcolor?>"><?=$sectionTitle?></h2><?php } ?>
				<?php if($sectionContent){ ?><div class="<?=$fcolor?>"><?=$sectionContent?></div> <?php } ?>
			</div>	
			
			<?php } ?>
		
			<div class="col-md-12 col-sm-12 col-lg-12 text-center row <?=$fcolor?>">
				
				
				<?php 
				$staff_query_args = [
				  'post_type'       =>  $staffType,
				  'post_status'     => 'publish',
				  'posts_per_page'  => 100,
				  'meta_key'        => 'location',
				  'meta_value'      => $location,
				  'orderby' 		=> 'order',
				  'order' 			=> 'ASC',
				];
				
				$staff_query = new WP_Query($staff_query_args);
				
				if ($staff_query->have_posts()) {
				  while ($staff_query->have_posts()) {
				      $staff_query->the_post();
					  $id = get_the_ID();
				      
				      
				      
				      if($staffType != 'providers'){
					      $thisSeg = get_field('team_segment', $id);
					  	 if( $thisSeg != $segment){
						  	 continue;
					  	 }
					  }

				      ?>
				      
				      	<!-- / with diff custom post type fields lets put in a if statement for ease.  -->
				      	<?php   if($staffType == 'providers'){ 
					      	$image = get_field('staff_image', $id);			      
						  	$type = get_field('doctor_type', $id);
						  	$blurb = get_field('blurb', $id);
				      	?>
				      	<div class="col-lg-12 col-md-12 col-sm-12 text-left margtop20  row">
					      	<div class="col-md-3 col-sm-12">
					      		<img class="fullwidth bubble" src="<?=$image['url']?>" alt="<?=$image['alt']?>"></img>
					      	</div>
					      	<div class="col-md-9 col-sm-12">
					      		<?php 
					      		$content = get_the_content();
					      		$pieces = explode(" ", $content);
						  		$first_part = implode(" ", array_splice($pieces, 0, 80));
						  		$tail = "";
						  		
						  		if(str_word_count($first_part) > 79){
							  		$tail = "...";
						  		}
					      		?>
					      		
						      	<h3 class="<?=$fcolor?> " ><?= the_title()?></h3>
						      	<strong><?=$type?></strong>
						      	<p class="<?=$fcolor?>"><?=$first_part?><?=$tail?></p> <div class="clearfix"></div>
						      	<a class="button <?=$buttonColor?> bubble <?=$fcolor?>" href="<?=get_permalink( $id )?>"> Learn More</a>

					      	
					      	
					      	</div>
				      	</div>
				      	<?php } else{?>
				      	<?php 
			      			$image = get_field('member_image', $id);		
							$animated_image = get_field('member_image_animated', $id);		      
						  	$type = get_field('doctor_type', $id);
					      	$content = get_field('team_text', $id);
				      		$pieces = explode(" ", $content);
					  		$first_part = implode(" ", array_splice($pieces, 0, 80));
					  		$tail = "";
					  		
					  		if(str_word_count($first_part) > 79){
							  		$tail = "...";
						  		}
				      	?>
				      	<div class="col-lg-12 col-md-12 col-sm-12 text-left margtop20 row">
					      	<div class="col-md-3 col-sm-12">
								<div class="headshot-container">
					      		<img class="fullwidth bubble headshot" src="<?=$image['url']?>" alt="<?=$image['alt']?>"></img>
								<img class="fullwidth bubble headshot" id="<?=$id?>"src="<?=$animated_image['url']?>" onmouseover="document.getElementById(<?=$id?>).src='<?=$animated_image['url']?>'" <?=$animated_image['alt']?>></img>
								</div>
					      	</div>
					      	<div class="col-md-9 col-sm-12">
					      		<?php 
						      	
					      		?>
					      		
						      	<h3 class="<?=$fcolor?> " ><?= the_title()?></h3>
						      	<strong><?=$type?></strong>
						      	<p class="<?=$fcolor?>"><?=$first_part?><?=$tail?></p> <div class="clearfix"></div>
						      	<a class="button <?=$buttonColor?> bubble <?=$fcolor?>" href="<?=get_permalink( $id )?>"> Learn More</a>

					      	
					      	
					      	</div>
				      	</div>
				      	
				      	<?php } ?>
				      
				      <?php 				      
				  }
				}

				?>
				
												
			</div>
			
						
		</div>
	</div>
</div>
</div>