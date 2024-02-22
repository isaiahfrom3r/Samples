<?php
/**
 * Template functions
 */
@ini_set( 'upload_max_size' , '128M' );
@ini_set( 'post_max_size', '128M');
@ini_set( 'max_execution_time', '600' );


require 'inc/register-post-types.php';
require 'inc/acf-blocks.php';

/* CMS only css */
add_action('admin_head', 'cmscss');

function cmscss() {
  echo '<style>

	.acf-repeater>table {border-collapse: collapse;}
	.acf-table>tbody>tr {border-top: 4px solid #000000;border-bottom: 4px solid #000000;}

  </style>';
}

/* Remove WP Admin menu items */
function remove_menus(){
  //remove_menu_page( 'index.php' );                  //Dashboard
  //remove_menu_page( 'edit.php' );                   //Posts
  //remove_menu_page( 'upload.php' );                 //Media
  //remove_menu_page( 'edit.php?post_type=page' );    //Pages
  remove_menu_page( 'edit-comments.php' );          //Comments
  //remove_menu_page( 'themes.php' );                 //Appearance
  //remove_menu_page( 'plugins.php' );                //Plugins
  //remove_menu_page( 'users.php' );                  //Users
  //remove_menu_page( 'tools.php' );                  //Tools
  //remove_menu_page( 'options-general.php' );        //Settings
}
add_action( 'admin_menu', 'remove_menus' );


/* Change default excerpt length */
function custom_excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

add_post_type_support('page', 'excerpt');
add_theme_support( 'post-thumbnails' );
add_theme_support( 'title-tag' );

// add menus
register_nav_menus(array(
    'primary' => __('Main Menu', 'recognation'),
    'mobile-primary' => __('Mobile Main Menu', 'recognation'),
	'footer1' => __('Footer 1', 'recognation'),
	'footer2' => __('Footer 2', 'recognation'),
));

//  Get Menus as objects, to be able to grab attributes like $menu_obj->name
function get_menu_by_location( $location ) {
    if( empty($location) ) return false;
    $locations = get_nav_menu_locations();
    if( ! isset( $locations[$location] ) ) return false;
    $menu_obj = get_term( $locations[$location], 'nav_menu' );
    return $menu_obj;
}

// Custom scripts
function custom_scripts() {

	wp_enqueue_script( 'jquery', 'https://code.jquery.com/jquery-3.5.1.min.js');
    wp_enqueue_script( 'bootstrapjs', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js');

    wp_enqueue_style( 'bootstrapcss', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css' );
	wp_enqueue_style( 'fontawesomecss', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css' );
	wp_enqueue_script( 'slickscripts', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js');
	wp_enqueue_style( 'slickcss', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css');
	wp_enqueue_style( 'slickcsstheme', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css');
	wp_enqueue_style( 'cssstyles', get_stylesheet_directory_uri() . '/style.css', array(), time());
	wp_enqueue_script( 'javascripts', get_stylesheet_directory_uri() . '/js/scripts.js', array(), time());

	wp_enqueue_script( 'gsapscripts', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.0/gsap.min.js');
	wp_enqueue_script( 'scrollscripts', 'https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/ScrollMagic.min.js');
	wp_enqueue_script( 'debugscrollscripts', 'https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/plugins/debug.addIndicators.min.js');
	wp_enqueue_script( 'tweenscrollscripts', get_stylesheet_directory_uri() . '/js/animation.gsap.js');

	wp_enqueue_style( 'fancyboxcss', 'https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css');
	wp_enqueue_script( 'fancybox', 'https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js');

	wp_enqueue_style( 'hamburger', get_stylesheet_directory_uri() . '/css/hamburgers.css', array(), time());
     
    wp_enqueue_style( 'custom', get_stylesheet_directory_uri() . '/css/custom.css', array(), time());


    /* Use WP variables in javascript */
    wp_localize_script('javascripts', 'WPURLS', array(
        'siteurl' => esc_url(home_url()) ,
        'themeurl' => get_stylesheet_directory_uri(),
    ));
    wp_enqueue_script('customscripts');

}

add_action( 'wp_enqueue_scripts', 'custom_scripts', '1' );


/*Disable Gravity Forms ajax submit page jump */
add_filter( 'gform_confirmation_anchor_1', '__return_true' );

/*Check for empty content*/
function empty_content($str) {
    return trim(str_replace('&nbsp;','',strip_tags($str,'<img>'))) == '';
}



//===================SHORTCODES=======================//
//====================================================//

//allow shortcodes in widgets
add_filter('widget_text', 'do_shortcode');

// Current Year
function year_func( $atts ){
	return date("Y");
}
add_shortcode( 'year', 'year_func' );

// Search form shortcodes
function search_form() {
    $url = get_site_url();
    $form = '<form role="search" method="get" class="searchform" action="'.$url.'">
			<label class="screen-reader-text" for="s">Search for: </label>
			<input type="text" value="" name="s" id="s" class="search-input" placeholder="Search for..." />
			<input type="submit" id="searchsubmit" value="Search" />
			</form>';
    return $form;
}
add_shortcode('search_form', 'search_form');

function nav_search_form() {
    $url = get_site_url();
    $form = '<form role="search" method="get" class="searchform margtop30" action="'.$url.'">
			<label class="screen-reader-text" for="s-dsktp">Search for: </label>
			<input type="text" value="" name="s" id="s-dsktp" class="search-input" placeholder="Search for..." />
			<input type="submit" id="searchsubmit-dsktp" value="Search" />
			</form>';
    return $form;
}
add_shortcode('nav_search_form', 'nav_search_form');

// button shortcode
function buttonShortcode($atts) {
	extract( shortcode_atts( array(
			'text' => 'read more',
			'link' => '#',
			'target' => ''
		), $atts, 'buttonSC' ) );

  $buttoncode = '<a href="'.$link.'" class="button" target="'.$target.'">'.$text.'</a>';

  return $buttoncode;
}
add_shortcode('button', 'buttonShortcode');


// social icons shortcode
function social_icons() {
	$socialcode = '';
	$socialcode .= '<div class="social_icons">';

	if(get_field('facebook', 'option')) {
		$socialcode .= '<span><a href="';
		$socialcode .= get_field('facebook', 'option');
		$socialcode .= '" name="Facebook" target="_blank" rel="noopener noreferrer" aria-label="Facebook" class="social-icon"><i class="fab fa-facebook-square"></i></a></span>';
	}
	if(get_field('twitter', 'option')) {
		$socialcode .= '<span><a href="';
		$socialcode .= get_field('twitter', 'option');
		$socialcode .= '" name="Twitter" target="_blank" rel="noopener noreferrer" aria-label="Twitter" class="social-icon"><i class="fab fa-twitter-square"></i></a></span>';
	}
	if(get_field('linkedin', 'option')) {
		$socialcode .= '<span><a href="';
		$socialcode .= get_field('linkedin', 'option');
		$socialcode .= '" name="LinkedIn" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn" class="social-icon"><i class="fab fa-linkedin"></i></a></span>';
	}
	if(get_field('instagram', 'option')) {
		$socialcode .= '<span><a href="';
		$socialcode .= get_field('instagram', 'option');
		$socialcode .= '" name="Instagram" target="_blank" rel="noopener noreferrer" aria-label="Instagram" class="social-icon"><i class="fab fa-instagram-square"></i></a></span>';
	}
	if(get_field('pinterest', 'option')) {
		$socialcode .= '<span><a href="';
		$socialcode .= get_field('pinterest', 'option');
		$socialcode .= '" name="Pinterest" target="_blank" rel="noopener noreferrer" aria-label="Pinterest" class="social-icon"><i class="fab fa-pinterest-square"></i></a></span>';
	}
	if(get_field('youtube', 'option')) {
		$socialcode .= '<span><a href="';
		$socialcode .= get_field('youtube', 'option');
		$socialcode .= '" name="YouTube" target="_blank" rel="noopener noreferrer" aria-label="YouTube" class="social-icon"><i class="fab fa-youtube-square"></i></a></span>';
	}
     $socialcode .=  '</div>';

  return $socialcode;
}

add_shortcode('social-icons', 'social_icons');


// social sharing shortcode
	function socialSharing() {
		$sharingcode = '<div class="social-sharing"><span class="share-title">Share:</span>
        	<a class="share" href="https://www.facebook.com/sharer/sharer.php?u='.get_the_permalink().'" target="_blank"><i class="fab fa-facebook-square"></i></a>
            <a class="share" href="
https://twitter.com/share?url='.get_the_permalink().'&text='.get_the_title().'" target="_blank"><i class="fab fa-twitter-square"></i></a>
            <a class="share" href="https://www.linkedin.com/sharing/share-offsite/?url='.get_the_permalink().'" target="_blank"><i class="fab fa-linkedin"></i></a>
        </div><!-- /social-sharing-->';

		return $sharingcode;
	}
add_shortcode('social-sharing', 'socialSharing');

//====================================================//



//==================ADD OPTIONS PAGE===================//
//=====================================================//
if(function_exists('acf_add_options_page')) {
	//acf_add_options_page();
    acf_add_options_page('Global Options');
}


add_filter( 'gform_display_add_form_button', 'display_form_button_on_custom_page' );
function display_form_button_on_custom_page( $is_post_edit_page ) {
    if ( isset( $_GET['page'] ) && $_GET['page'] == 'acf-options-global-options' ) {
        return true;
    }

    return $is_post_edit_page;
}

//=====================================================//


//Connect to DB
function connect_db(){
    $server_name = $_SERVER['SERVER_NAME'];
	$database = DB_NAME;
	$hostname = DB_HOST;
	$username = DB_USER;
	$password = DB_PASSWORD;

    $connection = mysqli_connect($hostname, $username, $password);
    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error(). "<br><br>");
    }
    mysqli_select_db($connection,$database);
    return $connection;
}

add_action( 'gform_after_submission', 'add_confirmation_class', 10, 2 );
function add_confirmation_class() {
    add_filter('body_class', 'add_gravity_classes');
    function add_gravity_classes($classes){
        $classes[] = 'gravity-form-submitted';
        return $classes;
    }
}




// Move Yoast to bottom
function wpcover_move_yoast() {
    return 'low';
}
add_filter( 'wpseo_metabox_prio', 'wpcover_move_yoast');


/// POPULATE GUIDES DOWNLOAD FIELDS WITH CUSTOM VALUES
add_filter( 'gform_field_value', 'populate_guides_fields', 10, 3 );
function populate_guides_fields( $value, $field, $name ) {

	$pdf_file = get_field('pdf');
	$pdf_url = $pdf_file['url'];
	$guide_title = get_the_title();
	$thumb_url = get_the_post_thumbnail_url(get_the_ID(), 'medium');

    $values = array(
        'pdf_file' => $pdf_url,
		'guide_title' => $guide_title,
		'image' => $thumb_url,
    );

    return isset( $values[ $name ] ) ? $values[ $name ] : $value;
}


//Boostrap Pagination
function vb_pagination( $query=null ) {

  global $wp_query;
  $query = $query ? $query : $wp_query;
  $big = 999999999;


  
  $paginate = paginate_links( array(
    'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
    'type' => 'array',
    'total' => $query->max_num_pages,
    'format' => '?paged=%#%',
    'current' => max( 1, get_query_var('paged') ),
    'prev_text' => __('&laquo;'),
    'next_text' => __('&raquo;'),
    )
  );

  if ($query->max_num_pages > 1) :
?>
<nav>
	<ul class="pagination justify-content-center">
	<?php
	foreach ( $paginate as $page ) {
		echo '<li class="page-item' . (strpos($page, 'current') !== false ? ' active' : '') . '"> ' . str_replace('page-numbers', 'page-link text-dark', $page) . '</li>';
	}
	?>
	</ul>
</nav>
<?php
  endif;
}

$admin = is_admin();

if($admin == false){
	
// Function to show Customers from Quickbooks in Gravity Form select input
add_filter( 'gform_pre_render_9', 'pfa_customers_qb_to_gf' );
add_filter( 'gform_pre_validation_9', 'pfa_customers_qb_to_gf' );
add_filter( 'gform_pre_submission_filter_9', 'pfa_customers_qb_to_gf' );
add_filter( 'gform_admin_pre_render_9', 'pfa_customers_qb_to_gf' );

}
function cmp($a, $b){
    return strcmp($a['text'], $b['text']);
}
function pfa_customers_qb_to_gf($form) {		
	
	$post = get_the_ID();
	$pt = get_post_type();
	$dates = get_field( 'dates', $post );
	$admin = is_admin();
	
	if(empty($dates) || $pt != "workshop" || $admin == true){
		return;
	}
	

	
	$obj = array();
	foreach($dates as $key=>$d){
		
		;
		$obj[$key] = array(
			'text' => $d['date']." ".$d['type'],
			'value' => $d['date'],
		);
	}
	

    foreach($form['fields'] as &$field){
        if($field->type == 'radio' ) {
            
	        $choices = array();
	        foreach($obj as $key => $customer){
		       
	            $choices[] = array('text' => $customer['text'] , 'value' => $customer['text']);
	        }
	        //usort($choices, 'cmp');
			usort($choices, function($a, $b) {
				return strnatcasecmp($a['text'], $b['text']);
			});
			
			
	
	        $field->choices = $choices;
        
        
        }
    }
    
   
    return $form;
}