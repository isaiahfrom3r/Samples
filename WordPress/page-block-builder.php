<?php
	/**
	 * Template Name: Block Builder
	 */
	get_header('');
	?>

<div id="content-inner" class="bg-white">

<?php
	echo apply_filters( 'the_content', get_post_field( 'post_content') );
?>

</div><!-- end content-inner -->
<?php
get_footer();
