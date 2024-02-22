<?php

/**
 * Simple Content Block Template.
 *
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'simpleContent-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'SimpleContent-block';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}


// Default Block Items 
$cRound = get_field('corner_to_round');
$background = get_field('background_color');
$cColor = get_field('corner_color');


$fcolor = "";
if($background == "bg-dk-teal"){
	$fcolor = "white";
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
$sectionTitle = get_field('title');
?>

<div class=" wrapBanner <?=$cColor?>" style="padding: 0px; margin: 0px; ">
<div id="final-band" style="<?=$roundStyle?>" class="container-fluid <?=$background?> <?=$fcolor?>  paddtop60 paddbott60 <?php echo esc_attr($className); ?>" id="<?php echo esc_attr($id); ?>">
	<div class="container paddtop0 paddbott0 eightywidth">
		<div class="row align-midle accordion">
			
			<?php if($sectionTitle != "" ){ ?>
			<div class="col-md-12 col-sm-12 col-lg-12 text-center ">
				
				<?php if($sectionTitle){ ?><h2 class=""><?=$sectionTitle?></h2><?php } ?>
			</div>	
			
			<?php } ?>
			
			<div class="col-md-12 col-sm-12 col-lg-12  ">
				
				<?php if( have_rows('facts') ){ ?>
	
					
			    <?php $c=0; while( have_rows('facts') ){ the_row(); $c++; ?>
			    	 <div class=" margbott10" >
                        <div class="faqcard" id="faqhead<?=$c?><?=$background?>">
                            <div href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#faq<?=$c?><?=$background?>"
                            aria-expanded="true" aria-controls="faq<?=$c?>"><strong style="display: block;"><?=get_sub_field( 'question' )?><p style="display: inline-block; float: left;"> <i class="fas fa-arrow-down"></i> <i class="fas fa-arrow-up"></i></p></strong>  </div>
                        </div>

                        <div id="faq<?=$c?><?=$background?>" class="answerBox collapse" style="" aria-labelledby="faqhead<?=$c?><?=$background?>" >
                            <div class="">
                               <?=get_sub_field( 'answer' )?>
                            </div>
                        </div>
                    </div>
					 

			    
			    

				<?php } }?>
				
												
			</div>
							
			
		</div>
	</div>
</div>
</div>

			    
<!--
					<div class="col-md-12 col-sm-12 col-lg-12 item symptomsPage " >
						<div class="question"><?=get_sub_field( 'question' )?></div>
		
					</div>
					<div class="col-md-12 col-sm-12 col-lg-12 item symptomsPage margbott30" >
						<div class="answer"><?=get_sub_field( 'answer' )?></div>
		
					</div>
-->
					