<?php
function certificate_post()
{
    // Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x('certificate', 'Post Type General Name', 'twentytwenty'),
        'singular_name'       => _x('certificate', 'Post Type Singular Name', 'twentytwenty'),
        'menu_name'           => __('certificate', 'twentytwenty'),
        'parent_item_colon'   => __('Parent certificate', 'twentytwenty'),
        'all_items'           => __('all certificate', 'twentytwenty'),
        'view_item'           => __('view certificate', 'twentytwenty'),
        'add_new_item'        => __('new certificate', 'twentytwenty'),
        'add_new'             => __('create new', 'twentytwenty'),
        'edit_item'           => __('certificate အချက်အလက်ပြင်ရန်', 'twentytwenty'),
        'update_item'         => __('ပြင်ဆင်ပြီး', 'twentytwenty'),
        'search_items'        => __('ရှိသော certificateများ ရှာရန်', 'twentytwenty'),
        'not_found'           => __('မတွေ့ရှိပါ', 'twentytwenty'),
        'not_found_in_trash'  => __('ဘာမှမရှိ', 'twentytwenty'),
    );

    // Set other options for Custom Post Type

    $args = array(
        'label'               => __('certificateများ', 'twentytwenty'),
        'description'         => __('', 'twentytwenty'),
        'labels'              => $labels,
        'public'              => true,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'query_var'           => true,
        'rewrite'             => array('slug' => 'certificate', 'with_front' => false),
        'capability_type'     => 'post',
        'has_archive'         => true,
        'hierarchical'        => true,
        'menu_os'       => 10,

        // Features this CPT supports in Post Editor
        'supports'           =>  array(
            'title',
            // 'editor',
            // 'author',
            // 'post-formats',
            'thumbnail',
            // 'excerpt',
            // 'comments',
            // 'revisions',
            // 'custom-fields',
        ),

        // 'taxonomies'          => array( 'post_tag' ),
        'menu_icon'            => 'dashicons-awards',

        // You can associate this CPT with a taxonomy or custom taxonomy.
        // 'taxonomies'          => array( 'post_tag', 'category' ),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'can_export'          => true,
        'exclude_from_search' => true,

        // important
        'show_in_rest'        => true,

        'menu_position' => 2

    );

    // Registering your Custom Post Type
    register_post_type('certificate', $args);
    flush_rewrite_rules();
}

/* Hook into the 'init' action so that the function
* Containing our post type registration is not
* unnecessarily executed.
*/

add_action('init', 'certificate_post');



/////////////////////////////////////////////////////////////////////////




function cer_info()
{
    add_meta_box(
        'cer_info',
        'cer_info Option',
        'cer_infoInput', //callback function
        'certificate', //audios, post, page
        'side',
        'high'
    );
}
add_action('admin_menu', 'cer_info');


function cer_infoInput()
{
    global $post;
    wp_nonce_field('cer_info', 'cer_info_nonce');
    $meta = get_post_meta($post->ID, 'cer_info', true);
    $id = @isset($meta['id']) ? @$meta['id'] : '';
?>
    Certificate ID
    <input class="widefat" name="cer_info[id]" type="text" value="<?php echo esc_html($id); ?>" />
<?php
}

add_action('save_post', 'cer_info_save');
function cer_info_save($post_id)
{
    global $custom_meta_fields;
    if (!isset($_POST['cer_info_nonce']) || !wp_verify_nonce($_POST['cer_info_nonce'], 'cer_info'))
        return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return;
    if (!current_user_can('edit_post', $post_id))
        return;
    update_post_meta($post_id, 'cer_info', $_POST['cer_info']);
}
?>