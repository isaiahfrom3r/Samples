<?php

/**
 * Simple Content Block Template.
 *
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'subnav-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'subnav-block';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
$req_uri = $_SERVER['REQUEST_URI'];
$path = substr($req_uri,0,strrpos($req_uri,'/'));

?>
<div class="wrapBanner bg-dk-teal" style="margin-top: 15px;">
	<div class="row text-center">
		<?php $count = 0; if( have_rows('nav_items') ): ?>
            <?php 
            
			
            // loop through rows (sub repeater)
            while( have_rows('nav_items') ): the_row(); $count++;
            	?>
                
                
            <?php endwhile; ?>
        <?php endif; ?>
		
		
		<?php 
		if($count == 1){
			$col = 12;
		}elseif($count == 2){
			$col = 6;
		}elseif($count == 3){
			$col = 4;
		}elseif($count == 4){
			$col = 3;
		}elseif($count == 6){
			$col = 2;
		}
		?>
		
		
		<?php if( have_rows('nav_items') ): ?>
            <?php 
            
			
            // loop through rows (sub repeater)
            while( have_rows('nav_items') ): the_row();
            	$link = get_sub_field( 'link' );
            	$active = "";
            	if (strpos($link['url'], $path) !== false) {
            	    $active = "active";
            	}
            	?>
                
                <a href="<?=$link['url']?>" class="gold <?=$active?> col-md-<?=$col?> ribbonLink paddbott10 paddtop10"><?=$link['title']?></a>
                
            <?php endwhile; ?>
        <?php endif; ?>

	</div>
</div>