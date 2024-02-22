<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

get_header();
?>
    <section id="page-header" class="banner-top bg-med-teal content-area container-fluid" style="background-image:url(/wp-content/uploads/heroBackground.png);background-size:cover;background-position:center;background-repeat:no-repeat;">
		<main id="main" class="site-main">
			<div class="container-fluid">
				<div class="container paddtop40 paddbott40">

				<div class="entry-header text-center center">
						<h1 class="dk-teal">
							Blog!
						</h1>
					</div><!-- .entry-header -->

				</div>
			</div>
		</main><!-- .site-main -->
	</section><!-- .content-area -->


	<section id="primary" class="content-area">
		<main id="main" class="site-main paddtop60">
			<?php if ( !is_paged() ) { ?>
			<div class="container paddbott60 med-teal">
				<?php

				$page_for_posts = get_option( 'page_for_posts' );
				$post = get_post($page_for_posts); 
				$content = $post->post_content;
				echo $content;
				?>
			</div>
			<?php } ?>

			<div class="container paddbott60">
				<div class="row">
		<?php
		if ( have_posts() ) {
			// Load posts loop.
			while ( have_posts() ) {
				the_post();
				get_template_part( 'content', 'blogblock' );
			} ?>

			<div class="col-12 margtop30 margbott10">
				<?php
				if ( function_exists('vb_pagination') ) {
				  vb_pagination();
				}
				?>
			</div>

		<?php

		} else {
			// If no content, include the "No posts found" template.
			get_template_part( 'content', 'none' );

		}
		?>
				</div>
			</div>
		</main><!-- .site-main -->
	</section><!-- .content-area -->

<?php
get_footer();
