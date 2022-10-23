<?php
function feedback_post() {
    // Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x('feedback', 'Post Type General Name', 'twentytwenty'),
        'singular_name'       => _x('feedback', 'Post Type Singular Name', 'twentytwenty'),
        'menu_name'           => __('feedback', 'twentytwenty'),
        'parent_item_colon'   => __('Parent feedback', 'twentytwenty'),
        'all_items'           => __('feedback အားလုံး', 'twentytwenty'),
        'view_item'           => __('feedback ကိုကြည့်ရန်', 'twentytwenty'),
        'add_new_item'        => __('feedbackသစ်ထည့်ရန်', 'twentytwenty'),
        'add_new'             => __('အသစ်ထပ်ထည့်ရန်', 'twentytwenty'),
        'edit_item'           => __('feedback အချက်အလက်ပြင်ရန်', 'twentytwenty'),
        'update_item'         => __('ပြင်ဆင်ပြီး', 'twentytwenty'),
        'search_items'        => __('ရှိသော feedbackများ ရှာရန်', 'twentytwenty'),
        'not_found'           => __('မတွေ့ရှိပါ', 'twentytwenty'),
        'not_found_in_trash'  => __('ဘာမှမရှိ', 'twentytwenty'),
    );

    // Set other options for Custom Post Type

    $args = array(
        'label'               => __('feedbackများ', 'twentytwenty'),
        'description'         => __('', 'twentytwenty'),
        'labels'              => $labels,
        'public'              => true,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'query_var'           => true,
        'rewrite'             => array('slug' => 'feedback', 'with_front' => false),
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
        'menu_icon'            => 'dashicons-buddicons-pm',

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
        'menu_position'=>5

    );

    // Registering your Custom Post Type
    register_post_type( 'feedback', $args );
    flush_rewrite_rules();

}

/* Hook into the 'init' action so that the function
* Containing our post type registration is not
* unnecessarily executed.
*/

add_action( 'init', 'feedback_post' );



/////////////////////////////////////////////////////////////////////////

function add_feedback() {
    add_meta_box(
         'wpa-feedback',
         'feedback Imformation',
         'feedbackInput',
         'feedback',//feedback, post, page
         'advanced',
         'default',
         null
      );

       //   add_meta_box(
       //       string $id,
       //       string $title,
       //       callable $callback,
       //       string|array|WP_Screen $screen = null,
       //       string $context = 'advanced',
       //       string $priority = 'default',
       //       array $callback_args = null
       //       )

} add_action('admin_menu', 'add_feedback');

function fb_title_to_name( $title, $post ) {
    if ( 'feedback' == $post->post_type ) {
        $title = 'Name';
    }
    return $title;
}
add_filter( 'enter_title_here', 'fb_title_to_name', 10, 2 );

function feedbackInput() {
   global $post;
   wp_nonce_field( 'feedback', 'feedback_nonce' );
       $meta = get_post_meta($post->ID, 'feedback', true);
       $profession = @isset($meta['profession']) ? @$meta['profession'] : '';
       $organization = @isset($meta['organization']) ? @$meta['organization'] : '';

       ?>
       profession
       <input placeholder="profession" type="text" feedback="widefat" name="feedback[profession]" value="<?php echo $profession; ?>"/>
       organization
       <input placeholder="organization" type="text" feedback="widefat" name="feedback[organization]" value="<?php echo $organization; ?>"/>
   <?php

}

add_action('save_post', 'feedback_save');
function feedback_save($post_id) {
   global $custom_meta_fields;
   if ( ! isset( $_POST['feedback_nonce'] ) ||
       ! wp_verify_nonce( $_POST['feedback_nonce'], 'feedback' ) )
       return;

   if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
       return;

   if (!current_user_can('edit_post', $post_id))
       return;

   update_post_meta(
     $post_id,
     'feedback',
     $_POST['feedback']
   );

}

// function my_enter_title_here( $title, $post ) {
//     if ( 'feedback' == $post->post_type ) {
//         $title = 'Name';
//     }
//     return $title;
// }
// add_filter( 'enter_title_here', 'my_enter_title_here', 10, 2 );

  function feedback_columns( $columns ) {
      $columns = array(
          'cb' => '<input type="checkbox" />',
          'featured_image' => 'Image',
          'title' => 'အမည်'
       );
      return $columns;
  }

  add_filter('manage_feedback_posts_columns' , 'feedback_columns');

  function feedback_columns_data( $column, $post_id ) {
      switch ( $column ) {
        case 'featured_image':
            the_post_thumbnail( 'xs' );
            break;
      }
  }
  add_action( 'manage_feedback_posts_custom_column' , 'feedback_columns_data', 10, 2 );
?>