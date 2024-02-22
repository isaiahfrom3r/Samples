<?php

add_action('acf/init', 'my_acf_init_block_types');
function my_acf_init_block_types() {

    // Check function exists.
    if( function_exists('acf_register_block_type') ) {

        acf_register_block_type(array(
            'name'              => 'appointment_cta',
            'title'             => __('Appointment CTA'),
            'description'       => __('Dark Teal Appointment CTA Banner'),
            'render_template'   => 'template-parts/blocks/appt_cta.php',
            'category'          => 'layout',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'CTA' ),
			'supports'          => array( 'anchor' => true )
        ));
        
        acf_register_block_type(array(
            'name'              => 'book_cta',
            'title'             => __('Book CTA'),
            'description'       => __('Dark Teal Boot CTA Banner'),
            'render_template'   => 'template-parts/blocks/book_cta.php',
            'category'          => 'layout',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'CTA' ),
			'supports'          => array( 'anchor' => true )
        ));
        
        acf_register_block_type(array(
            'name'              => 'contact_CTA',
            'title'             => __('Contact CTA'),
            'description'       => __('Contact CTA Banner'),
            'render_template'   => 'template-parts/blocks/contact_CTA.php',
            'category'          => 'layout',
            'icon'              => 'phone',
            'keywords'          => array( 'CTA' ),
			'supports'          => array( 'anchor' => true )
        ));
        
        acf_register_block_type(array(
            'name'              => 'simple_content',
            'title'             => __('Simple Content Band'),
            'description'       => __('Simple Content Band'),
            'render_template'   => 'template-parts/blocks/simple_content.php',
            'category'          => 'layout',
            'icon'              => 'format-aside',
            'keywords'          => array( 'content' ),
			'supports'          => array( 'anchor' => true )
        ));
        
        acf_register_block_type(array(
            'name'              => 'cta_cubes',
            'title'             => __('CTA Cubes'),
            'description'       => __('A section that provides cubes with copy and call to action.'),
            'render_template'   => 'template-parts/blocks/cta_cubes.php',
            'category'          => 'layout',
            'icon'              => 'grid-view',
            'keywords'          => array( 'content' ),
			'supports'          => array( 'anchor' => true )
        ));
        
         acf_register_block_type(array(
            'name'              => 'content5050',
            'title'             => __('50/50 Content Block'),
            'description'       => __('A content block that is split in half with an image on a specific side. '),
            'render_template'   => 'template-parts/blocks/5050.php',
            'category'          => 'layout',
            'icon'              => 'star-half',
            'keywords'          => array( 'content' ),
			'supports'          => array( 'anchor' => true )
        ));
        
        acf_register_block_type(array(
            'name'              => 'content5050Background',
            'title'             => __('50/50 Content Block With Background'),
            'description'       => __('A content block that is split in half with an image on a specific side with a background image.'),
            'render_template'   => 'template-parts/blocks/5050wb.php',
            'category'          => 'layout',
            'icon'              => 'star-half',
            'keywords'          => array( 'content' ),
			'supports'          => array( 'anchor' => true )
        ));
        
        acf_register_block_type(array(
            'name'              => 'location_box',
            'title'             => __('Location Box'),
            'description'       => __('A full width banner box that shows Locations.'),
            'render_template'   => 'template-parts/blocks/location_box.php',
            'category'          => 'layout',
            'icon'              => 'star-half',
            'keywords'          => array( 'content' ),
			'supports'          => array( 'anchor' => true )
        ));
        acf_register_block_type(array(
            'name'              => 'staff_box',
            'title'             => __('Our Staff'),
            'description'       => __('A band that will display your staff.'),
            'render_template'   => 'template-parts/blocks/staff_box.php',
            'category'          => 'layout',
            'icon'              => 'admin-users',
            'keywords'          => array( 'content' ),
			'supports'          => array( 'anchor' => true )
        ));
        acf_register_block_type(array(
            'name'              => 'full_staff_box',
            'title'             => __('Full Bio Staff '),
            'description'       => __('A band that will display your staff.'),
            'render_template'   => 'template-parts/blocks/full_staff_box.php',
            'category'          => 'layout',
            'icon'              => 'admin-users',
            'keywords'          => array( 'content' ),
			'supports'          => array( 'anchor' => true )
        ));
        acf_register_block_type(array(
            'name'              => 'logo_band',
            'title'             => __('Logo Band'),
            'description'       => __('A thin logo band that lets us put accreditations in a line.'),
            'render_template'   => 'template-parts/blocks/logo_band.php',
            'category'          => 'layout',
            'icon'              => 'format-gallery',
            'keywords'          => array( 'content' ),
			'supports'          => array( 'anchor' => true )
        ));
        
        acf_register_block_type(array(
            'name'              => 'slider_band',
            'title'             => __('Testimonials Band'),
            'description'       => __('A website band that includes a section for testimonials.'),
            'render_template'   => 'template-parts/blocks/slider_band.php',
            'category'          => 'layout',
            'icon'              => 'slides',
            'keywords'          => array( 'content' ),
			'supports'          => array( 'anchor' => true )
        ));
        
         acf_register_block_type(array(
            'name'              => 'asset_slider_band',
            'title'             => __('Asset Slider Band'),
            'description'       => __('A website band that includes a section for copy and a slider for assets.'),
            'render_template'   => 'template-parts/blocks/asset_slider_band.php',
            'category'          => 'layout',
            'icon'              => 'slides',
            'keywords'          => array( 'content' ),
			'supports'          => array( 'anchor' => true )
        ));
        
         acf_register_block_type(array(
            'name'              => 'formBand',
            'title'             => __('Form Band'),
            'description'       => __('A block that contains a form and other options'),
            'render_template'   => 'template-parts/blocks/form_band.php',
            'category'          => 'layout',
            'icon'              => 'media-document',
            'keywords'          => array( 'content' ),
			'supports'          => array( 'anchor' => true )
        ));
         acf_register_block_type(array(
            'name'              => 'contentSlider',
            'title'             => __('Content Slider'),
            'description'       => __('A block that contains a slider for full width content'),
            'render_template'   => 'template-parts/blocks/content_slider.php',
            'category'          => 'layout',
            'icon'              => 'slides',
            'keywords'          => array( 'content' ),
			'supports'          => array( 'anchor' => true )
        ));
         acf_register_block_type(array(
            'name'              => 'factBlock',
            'title'             => __('Fact FAQ Block'),
            'description'       => __('A block that allows for question and answers to be added.'),
            'render_template'   => 'template-parts/blocks/faq.php',
            'category'          => 'layout',
            'icon'              => 'format-quote',
            'keywords'          => array( 'content' ),
			'supports'          => array( 'anchor' => true )
        ));
        acf_register_block_type(array(
            'name'              => 'icon_slider_band',
            'title'             => __('Icon Slider Band'),
            'description'       => __('A website band that includes a section for and a slider for icon.'),
            'render_template'   => 'template-parts/blocks/icon_slider_band.php',
            'category'          => 'layout',
            'icon'              => 'slides',
            'keywords'          => array( 'content' ),
			'supports'          => array( 'anchor' => true )
        ));
         acf_register_block_type(array(
            'name'              => 'hover_image',
            'title'             => __('Hover Image'),
            'description'       => __('An image that will have hover content on it.'),
            'render_template'   => 'template-parts/blocks/hover_image.php',
            'category'          => 'layout',
            'icon'              => 'slides',
            'keywords'          => array( 'content' ),
			'supports'          => array( 'anchor' => true )
        ));
         acf_register_block_type(array(
            'name'              => 'ribbon_nav',
            'title'             => __('Ribbon Nav'),
            'description'       => __('A full width navigation designed as a sub nav.'),
            'render_template'   => 'template-parts/blocks/subnav.php',
            'category'          => 'layout',
            'icon'              => 'slides',
            'keywords'          => array( 'content' ),
			'supports'          => array( 'anchor' => true )
        ));
        





    }
}
