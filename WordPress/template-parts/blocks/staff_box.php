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
$CTA = get_field('call_to_actions_yes_or_no');

$actual_link = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";


if (strpos($actual_link,'/team') !== false) {
	$staffType = "members";
}else{
	$staffType = "providers";
}



$size = 2; 
if($CTA == true){
	$size = 3;
}

?>
<div class="wrapBanner <?=$cColor?>" style="padding: 0px; margin: 0px; ">
<div style="<?=$roundStyle?>" class="container-fluid <?=$background?>  paddtop60 paddbott60 <?php echo esc_attr($className); ?>" id="<?php echo esc_attr($id); ?>">
	<div class="container paddtop0 paddbott0 ">
		<div class="row align-midle">
			<?php if($sectionTitle != "" || $sectionContent!= "" ){ ?>
			<div class="col-md-12 col-sm-12 col-lg-12 text-center ">
				
				<?php if($sectionTitle){ ?><h2 class="dk-teal"><?=$sectionTitle?></h2><?php } ?>
				<?php if($sectionContent){ ?><p ><?=$sectionContent?></p> <?php } ?>
			</div>	
			
			<?php } ?>
			<div class="col-md-12 col-sm-12 col-lg-12 text-left">
				<h4 class="dk-teal ">South Bend / Granger</h4>
			</div>
			<div class="col-md-12 col-sm-12 col-lg-12 text-center row teal">
				
				
				<?php 
				$staff_query_args = [
				  'post_type'       => $staffType,
				  'post_status'     => 'publish',
				  'posts_per_page'  => 100,
				  'meta_key'        => 'location',
				  'meta_value'      => 'South Bend',
				  'orderby' 		=> 'order',
				  'order' 			=> 'ASC',
				];
				
				$staff_query = new WP_Query($staff_query_args);
				
				if ($staff_query->have_posts()) {
				  while ($staff_query->have_posts()) {
				      $staff_query->the_post();
					  $id = get_the_ID();
					  
					  if($staffType == "providers"){
						  $image = get_field('staff_image', $id);
						  $animated_image = get_field('staff_image_animated', $id);			      
					      $type = get_field('doctor_type', $id);
					      $blurb = get_field('blurb', $id);
					  }else{
						  $image = get_field('member_image', $id);	
						  $animated_image = get_field('member_image_animated', $id);			      
					  	  $type = get_field('doctor_type', $id);
				      	  $content = get_field('team_text', $id);
					  }
					  
				      

				      ?>
				      
				      	<div class="col-lg-<?=$size?> col-md-4 col-sm-6 text-left margtop20">
						<div class="headshot-container">
					  <!--static headshot-->
					      	<img  <?php if($size == 2){ ?>style="min-height: 250px;" <?php }else{ ?> style="min-height: 400px;"  <?php } ?>class="fullwidth object-cover headshot" src="<?=$image['url']?>" alt="<?=$image['alt']?>"></img>
					  <!--Animated headshot --->
							<img  <?php if($size == 2){ ?>style="min-height: 250px;" <?php }else{ ?> style="min-height: 400px;"  <?php } ?>class="fullwidth object-cover headshot" id="<?=$id?>" src="<?=$animated_image['url']?>" onmouseover="document.getElementById(<?=$id?>).src='<?=$animated_image['url']?>'" alt="<?=$animated_image['alt']?>"></img>
						</div>
					      	<strong class="dk-teal staffTitle" ><?= the_title()?></strong>
					      	<p class="staffUnder uppercase"><?=$type?></p>
					      	
					      	<?php if($CTA == true){ ?>
					      	
					      		<a class="button glowGreen bubble white" href="<?=get_permalink( $id )?>"> Learn More</a>
					      	
					      	<?php } ?>
				      	</div>
				      
				      <?php 				      
				  }
				}

				?>
				
												
			</div>
			
			<?php if($CTA == true){ ?>
			<div class="col-md-12 col-sm-12 col-lg-12 text-left  margtop40 teal">	
				<?php if($staffType == "providers"){ ?>	      	
<!-- 	      			<a class="button glowbutton bubble  " href="/our-practice/providers/south-bend/"> Learn more about our South Bend / Granger providers</a> -->
	      		<?php }else{ ?>
	      			<a class="button glowbutton bubble  " href="/our-practice/team/south-bend/"> Learn more about our South Bend / Granger team</a>
	      		<?php } ?>
			</div>
	      	<?php } ?>
			
			
			<div class="col-md-12 col-sm-12 col-lg-12 text-left">
				<h4 class="dk-teal margtop40">Fort Wayne</h4>
			</div>
			<div class="col-md-12 col-sm-12 col-lg-12 text-center row teal">
				
				
				<?php 
				$staff_query_args = [
				  'post_type'       => $staffType,
				  'post_status'     => 'publish',
				  'posts_per_page'  => 100,
				  'order'           => 'DESC',
				  'meta_key'        => 'location',
				  'meta_value'      => 'Fort Wayne',
				  'orderby' 		=> 'order',
				  'order' 			=> 'ASC',
				];
				
				$staff_query = new WP_Query($staff_query_args);
				
				if ($staff_query->have_posts()) {
				  while ($staff_query->have_posts()) {
				      $staff_query->the_post();
					  $id = get_the_ID();
				      if($staffType == "providers"){
						  $image = get_field('staff_image', $id);	
						  $animated_image = get_field('staff_image_animated', $id);	      
					      $type = get_field('doctor_type', $id);
					      $blurb = get_field('blurb', $id);
					  }else{
						  $image = get_field('member_image', $id);	
						  $animated_image = get_field('member_image_animated', $id);		      
					  	  $type = get_field('doctor_type', $id);
				      	  $content = get_field('team_text', $id);
					  }

				      ?>
				      
				      	<div class="col-lg-<?=$size?> col-md-4 col-sm-6 text-left margtop20  text-left margtop20">
						  <div class="headshot-container">
					      	<img <?php if($size == 2){ ?>style="min-height: 250px;" <?php }else{ ?> style="min-height: 400px;"  <?php } ?>class="fullwidth object-cover headshot" src="<?=$image['url']?>" alt="<?=$image['alt']?>"></img>
							<!--Animated headshot --->
							<img  <?php if($size == 2){ ?>style="min-height: 250px;" <?php }else{ ?> style="min-height: 400px;"  <?php } ?>class="fullwidth object-cover headshot" id="<?=$id?>" src="<?=$animated_image['url']?>" onmouseover="document.getElementById(<?=$id?>).src='<?=$animated_image['url']?>'" alt="<?=$animated_image['alt']?>"></img>
						</div>
					      	<strong class="staffTitle dk-teal"><?= the_title()?></strong>
					      	<p class="staffUnder uppercase"><?=$type?></p>
					      	
					      	<?php if($CTA == true){ ?>
					      	
					      		<a class="button glowGreen bubble white" href="<?=get_permalink( $id )?>"> Learn More</a>
					      	
					      	<?php } ?>
				      	</div>
				      
				      <?php 				      
				  }
				  
				}

				?>
				
												
			</div>
			
			<?php if($CTA == true){ ?>
			<div class="col-md-12 col-sm-12 col-lg-12 text-left margtop40 teal">	
				<?php if($staffType == "providers"){ ?>	 	      	
<!-- 	      			<a class="button glowbutton bubble  " href="/our-practice/providers/fort-wayne/"> Learn more about our Fort Wayne providers</a> -->
	      		<?php }else{ ?>
	      			<a class="button glowbutton bubble  " href="/our-practice/team/fort-wayne/"> Learn more about our Fort Wayne team</a>
	      		<?php } ?>
			</div>
	      	<?php } ?>
	      	
	      	
	      		      			<a class="button glowbutton bubble automargin " href="/our-practice/team/south-bend/">See our Clinical Collaborators</a>

							
			
		</div>
	</div>
</div>
</div>