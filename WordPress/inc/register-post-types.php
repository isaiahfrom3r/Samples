<?php
//* Custom Post Types
function custom_post_type() {


	$labels = array(
        'name'                => 'Our Providers',
        'singular_name'       => 'providers',
        'menu_name'           => 'Our Providers',
        'name_admin_bar'      => 'Our Providers',
        'parent_item_colon'   => 'Parent Provider:',
        'all_items'           => 'All Providers',
        'add_new_item'        => 'Add Provider',
        'add_new'             => 'Add New',
        'new_item'            => 'New Provider',
        'edit_item'           => 'Edit Provider',
        'update_item'         => 'Update Provider',
        'view_item'           => 'View Provider',
        'search_items'        => 'Search Provider',
        'not_found'           => 'Not found',
        'not_found_in_trash'  => 'Not found in Trash',
    );
    $args = array(
        'label'               => 'Providers',
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'revisions', 'excerpt', 'thumbnail'),
		'taxonomies'          => array( 'post_tag' ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 4,
        'menu_icon'           => 'dashicons-admin-users',
        'show_in_admin_bar'   => true,
        'show_in_nav_menus'   => false,
        'can_export'          => true,
        'has_archive'         => false,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'rewrite'             => true,
        'capability_type'     => 'post',
    );
    register_post_type( 'providers', $args );
    
    
    $labels = array(
        'name'                => 'Team',
        'singular_name'       => 'Team Member',
        'menu_name'           => 'Team Memebers',
        'name_admin_bar'      => 'Team Members',
        'parent_item_colon'   => 'Parent Member:',
        'all_items'           => 'All Members',
        'add_new_item'        => 'Add Member',
        'add_new'             => 'Add New',
        'new_item'            => 'New Member',
        'edit_item'           => 'Edit Member',
        'update_item'         => 'Update Member',
        'view_item'           => 'View Member',
        'search_items'        => 'Search Memeber',
        'not_found'           => 'Not found',
        'not_found_in_trash'  => 'Not found in Trash',
    );
    $args = array(
        'label'               => 'Members',
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'revisions', 'excerpt', 'thumbnail'),
		'taxonomies'          => array( 'post_tag' ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 4,
        'menu_icon'           => 'dashicons-admin-users',
        'show_in_admin_bar'   => true,
        'show_in_nav_menus'   => false,
        'can_export'          => true,
        'has_archive'         => false,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'rewrite'             => true,
        'capability_type'     => 'post',
    );
    register_post_type( 'members', $args );
    
     $labels = array(
        'name'                => 'Location',
        'singular_name'       => 'Location',
        'menu_name'           => 'Location',
        'name_admin_bar'      => 'Location',
        'parent_item_colon'   => 'Parent Location:',
        'all_items'           => 'All Locations',
        'add_new_item'        => 'Add Location',
        'add_new'             => 'Add New',
        'new_item'            => 'New Location',
        'edit_item'           => 'Edit Location',
        'update_item'         => 'Update Location',
        'view_item'           => 'View Location',
        'search_items'        => 'Search Location',
        'not_found'           => 'Not found',
        'not_found_in_trash'  => 'Not found in Trash',
    );
    $args = array(
        'label'               => 'Location',
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'revisions', 'excerpt', 'thumbnail'),
		'taxonomies'          => array( 'post_tag' ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 4,
        'menu_icon'           => 'dashicons-admin-site',
        'show_in_admin_bar'   => true,
        'show_in_nav_menus'   => false,
        'can_export'          => true,
        'has_archive'         => false,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'rewrite'             => true,
        'capability_type'     => 'post',
    );
    register_post_type( 'locations', $args );
    
    
    $labels = array(
        'name'                => 'Workshop',
        'singular_name'       => 'Workshop',
        'menu_name'           => 'Workshop',
        'name_admin_bar'      => 'Workshop',
        'parent_item_colon'   => 'Parent Workshop:',
        'all_items'           => 'All Workshops',
        'add_new_item'        => 'Add Workshop',
        'add_new'             => 'Add New',
        'new_item'            => 'New Workshop',
        'edit_item'           => 'Edit Workshop',
        'update_item'         => 'Update Workshop',
        'view_item'           => 'View Workshop',
        'search_items'        => 'Search Location',
        'not_found'           => 'Not found',
        'not_found_in_trash'  => 'Not found in Trash',
    );
    $args = array(
        'label'               => 'Workshop',
        'labels'              => $labels,
        'show_in_rest' 		  => true,
        'supports'            => array( 'title', 'editor', 'revisions', 'excerpt', 'thumbnail'),
		'taxonomies'          => array( 'post_tag' ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 4,
        'menu_icon'           => 'dashicons-networking',
        'show_in_admin_bar'   => true,
        'show_in_nav_menus'   => false,
        'can_export'          => true,
        'has_archive'         => false,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'rewrite'             => true,
        'capability_type'     => 'post',
    );
    register_post_type( 'workshop', $args );
    
    $labels = array(
        'name'                => 'Organizer',
        'singular_name'       => 'Organizer',
        'menu_name'           => 'Organizer',
        'name_admin_bar'      => 'Organizer',
        'parent_item_colon'   => 'Parent Organizer:',
        'all_items'           => 'All Organizers',
        'add_new_item'        => 'Add Organizer',
        'add_new'             => 'Add New',
        'new_item'            => 'New Organizer',
        'edit_item'           => 'Edit Organizer',
        'update_item'         => 'Update Organizer',
        'view_item'           => 'View Organizer',
        'search_items'        => 'Search Organizers',
        'not_found'           => 'Not found',
        'not_found_in_trash'  => 'Not found in Trash',
    );
    $args = array(
        'label'               => 'Organizer',
        'labels'              => $labels,
		'supports' 			  => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt' ),
		'taxonomies'          => array( 'post_tag' ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 4,
        'menu_icon'           => 'dashicons-admin-users',
        'show_in_admin_bar'   => true,
        'show_in_nav_menus'   => false,
        'can_export'          => true,
        'has_archive'         => false,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'rewrite'             => true,
        'capability_type'     => 'post',
    );
    register_post_type( 'organizers', $args );
    
    $labels = array(
        'name'                => 'Testimonials',
        'singular_name'       => 'Testimonial',
        'menu_name'           => 'Testimonials',
        'name_admin_bar'      => 'Testimonials',
        'parent_item_colon'   => 'Parent Testimonial:',
        'all_items'           => 'All Testimonials',
        'add_new_item'        => 'Add Testimonial',
        'add_new'             => 'Add New',
        'new_item'            => 'New Testimonial',
        'edit_item'           => 'Edit Testimonial',
        'update_item'         => 'Update Testimonial',
        'view_item'           => 'View Testimonial',
        'search_items'        => 'Search Testimonials',
        'not_found'           => 'Not found',
        'not_found_in_trash'  => 'Not found in Trash',
    );
    $args = array(
        'label'               => 'Testimonials',
        'labels'              => $labels,
		'supports' 			  => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt' ),
		'taxonomies'          => array( 'post_tag' ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 4,
        'menu_icon'           => 'dashicons-admin-users',
        'show_in_admin_bar'   => true,
        'show_in_nav_menus'   => false,
        'can_export'          => true,
        'has_archive'         => false,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'rewrite'             => true,
        'capability_type'     => 'post',
    );
    register_post_type( 'testimonials', $args );
    
    
    $labels = array(
        'name'                => 'Recipes',
        'singular_name'       => 'Recipe',
        'menu_name'           => 'Recipes',
        'name_admin_bar'      => 'Recipes',
        'parent_item_colon'   => 'Parent Recipe:',
        'all_items'           => 'All Recipes',
        'add_new_item'        => 'Add Recipe',
        'add_new'             => 'Add New',
        'new_item'            => 'New Recipe',
        'edit_item'           => 'Edit Recipe',
        'update_item'         => 'Update Recipe',
        'view_item'           => 'View Recipe',
        'search_items'        => 'Search Recipe',
        'not_found'           => 'Not found',
        'not_found_in_trash'  => 'Not found in Trash',
    );
    $args = array(
        'label'               => 'Recipes',
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'revisions', 'excerpt', 'thumbnail'),
		'taxonomies'          => array( 'category', 'post_tag' ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 4,
        'menu_icon'           => 'dashicons-admin-users',
        'show_in_admin_bar'   => true,
        'show_in_nav_menus'   => false,
        'can_export'          => true,
        'has_archive'         => false,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'rewrite'             => true,
        'capability_type'     => 'post',

    );
    register_post_type( 'recipes', $args );
    
    



}
add_action( 'init', 'custom_post_type', 0 );
?>
