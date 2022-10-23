<?php
function curriculum_post() {
    // Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x('curriculum', 'Post Type General Name', 'twentytwenty'),
        'singular_name'       => _x('curriculum', 'Post Type Singular Name', 'twentytwenty'),
        'menu_name'           => __('curriculum', 'twentytwenty'),
        'parent_item_colon'   => __('Parent curriculum', 'twentytwenty'),
        'all_items'           => __('curriculum အားလုံး', 'twentytwenty'),
        'view_item'           => __('curriculum ကိုကြည့်ရန်', 'twentytwenty'),
        'add_new_item'        => __('curriculumသစ်ထည့်ရန်', 'twentytwenty'),
        'add_new'             => __('အသစ်ထပ်ထည့်ရန်', 'twentytwenty'),
        'edit_item'           => __('curriculum အချက်အလက်ပြင်ရန်', 'twentytwenty'),
        'update_item'         => __('ပြင်ဆင်ပြီး', 'twentytwenty'),
        'search_items'        => __('ရှိသော curriculumများ ရှာရန်', 'twentytwenty'),
        'not_found'           => __('မတွေ့ရှိပါ', 'twentytwenty'),
        'not_found_in_trash'  => __('ဘာမှမရှိ', 'twentytwenty'),
    );

    // Set other options for Custom Post Type

    $args = array(
        'label'               => __('curriculumများ', 'twentytwenty'),
        'description'         => __('', 'twentytwenty'),
        'labels'              => $labels,
        'public'              => true,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'query_var'           => true,
        'rewrite'             => array('slug' => 'curriculum', 'with_front' => false),
        'capability_type'     => 'post',
        'has_archive'         => true,
        'hierarchical'        => true,
        'menu_os'       => 10,

        // Features this CPT supports in Post Editor
        'supports'           =>  array(
            'title',
            'editor',
            // 'author',
            // 'post-formats',
            'thumbnail',
            'excerpt',
            // 'comments',
            // 'revisions',
            // 'custom-fields',
        ),

        // 'taxonomies'          => array( 'post_tag' ),
        'menu_icon'            => 'dashicons-book-alt',

        // You can associate this CPT with a taxonomy or custom taxonomy.
        // 'taxonomies'          => array( 'post_tag', 'category' ),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'can_export'          => true,
        'exclude_from_search' => false,

        // important
        'show_in_rest'        => true,
        
        'menu_position'=>2

    );

    // Registering your Custom Post Type
    register_post_type( 'curriculum', $args );
    flush_rewrite_rules();

}

/* Hook into the 'init' action so that the function
* Containing our post type registration is not
* unnecessarily executed.
*/

add_action( 'init', 'curriculum_post' );



/////////////////////////////////////////////////////////////////////////

?>