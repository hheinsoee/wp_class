<?php
function allCourse(){
    return get_terms(array(
        'taxonomy' => 'course',
        'hide_empty' => false,
    ));
}

function classbranch()
{
    // Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
        'name' => _x('branch', 'taxonomy general name'),
        'singular_name' => _x('branch', 'taxonomy singular name'),
        'search_items' =>  __('Search branch'),
        'popular_items' => __('Popular branch'),
        'all_items' => __('All branch'),
        'parent_item' => __('Parent branch'),
        'parent_item_colon' => __('Parent branch:'),
        'edit_item' => __('Edit branch'),
        'update_item' => __('Update branch'),
        'add_new_item' => __('Add New branch'),
        'new_item_name' => __('New branch Name'),
    );

    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'branch'),
        'public' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
        'show_tagcloud' => true,
        'show_in_rest' => true
    );

    /* register_taxonomy() to register taxonomy
*/
    register_taxonomy('branch', ['class','post'], $args);
}
add_action('init', 'classbranch', 0);

function classcourse()
{
    // Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
        'name' => _x('course', 'taxonomy general name'),
        'singular_name' => _x('course', 'taxonomy singular name'),
        'search_items' =>  __('Search course'),
        'popular_items' => __('Popular course'),
        'all_items' => __('All course'),
        'parent_item' => __('Parent course'),
        'parent_item_colon' => __('Parent course:'),
        'edit_item' => __('Edit course'),
        'update_item' => __('Update course'),
        'add_new_item' => __('Add New course'),
        'new_item_name' => __('New course Name'),
    );

    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'course'),
        'public' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
        'show_tagcloud' => true,
        'show_in_rest' => true
    );

    /* register_taxonomy() to register taxonomy
*/
    register_taxonomy('course', ['class','curriculum'], $args);
}
add_action('init', 'classcourse', 0);



?>