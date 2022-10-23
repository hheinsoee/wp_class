<?php
function class_post() {
    // Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x('class', 'Post Type General Name', 'twentytwenty'),
        'singular_name'       => _x('class', 'Post Type Singular Name', 'twentytwenty'),
        'menu_name'           => __('class', 'twentytwenty'),
        'parent_item_colon'   => __('Parent class', 'twentytwenty'),
        'all_items'           => __('class အားလုံး', 'twentytwenty'),
        'view_item'           => __('class ကိုကြည့်ရန်', 'twentytwenty'),
        'add_new_item'        => __('classသစ်ထည့်ရန်', 'twentytwenty'),
        'add_new'             => __('အသစ်ထပ်ထည့်ရန်', 'twentytwenty'),
        'edit_item'           => __('class အချက်အလက်ပြင်ရန်', 'twentytwenty'),
        'update_item'         => __('ပြင်ဆင်ပြီး', 'twentytwenty'),
        'search_items'        => __('ရှိသော classများ ရှာရန်', 'twentytwenty'),
        'not_found'           => __('မတွေ့ရှိပါ', 'twentytwenty'),
        'not_found_in_trash'  => __('ဘာမှမရှိ', 'twentytwenty'),
    );

    // Set other options for Custom Post Type

    $args = array(
        'label'               => __('classများ', 'twentytwenty'),
        'description'         => __('', 'twentytwenty'),
        'labels'              => $labels,
        'public'              => true,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'query_var'           => true,
        'rewrite'             => array('slug' => 'class', 'with_front' => false),
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
        'menu_icon'            => 'dashicons-welcome-learn-more',

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
        
        'menu_position'=>3

    );

    // Registering your Custom Post Type
    register_post_type( 'class', $args );
    flush_rewrite_rules();

}

/* Hook into the 'init' action so that the function
* Containing our post type registration is not
* unnecessarily executed.
*/

add_action( 'init', 'class_post' );



/////////////////////////////////////////////////////////////////////////

function add_class() {
    add_meta_box(
         'wpa-class',
         'class Imformation',
         'classInput',
         'class',//class, post, page
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

} add_action('admin_menu', 'add_class');


function classInput() {
   global $post;
   wp_nonce_field( 'class', 'class_nonce' );
       $meta = get_post_meta($post->ID, 'class', true);
       $startDate = @isset($meta['startDate']) ? @$meta['startDate'] : '';
       $endDate = @isset($meta['endDate']) ? @$meta['endDate'] : '';

       ?>
       startDate
       <input placeholder="start date" type="date" class="widefat" name="class[startDate]" value="<?php echo $startDate; ?>"/>
       End Date
       <input placeholder="end date" type="date" class="widefat" name="class[endDate]" value="<?php echo $endDate; ?>"/>
   <?php

}

add_action('save_post', 'class_save');
function class_save($post_id) {
   global $custom_meta_fields;
   if ( ! isset( $_POST['class_nonce'] ) ||
       ! wp_verify_nonce( $_POST['class_nonce'], 'class' ) )
       return;

   if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
       return;

   if (!current_user_can('edit_post', $post_id))
       return;

   update_post_meta(
     $post_id,
     'class',
     $_POST['class']
   );

}

function my_enter_title_here( $title, $post ) {
    if ( 'class' == $post->post_type ) {
        $title = 'Name';
    }
    return $title;
}
add_filter( 'enter_title_here', 'my_enter_title_here', 10, 2 );

  function custom_columns( $columns ) {
      $columns = array(
          'cb' => '<input type="checkbox" />',
          // 'featured_image' => 'Image',
          'title' => 'အမည်',
          'link' => 'link',
          'os' => 'OS',
          'description' => 'အကြောင်းအရာ',
       );
      return $columns;
  }

  add_filter('manage_class_posts_columns' , 'custom_columns');

  function custom_columns_data( $column, $post_id ) {
      switch ( $column ) {
        case 'featured_image':
            the_post_thumbnail( 'tiny' );
            break;
        case 'link':
            echo get_post_meta($post_id, 'class', true)['link'];
            break;
        case 'os':
            echo get_post_meta($post_id, 'class', true)['os'];
            break;
        case 'description':
            echo get_post_meta($post_id, 'class', true)['description'];
            break;
      }
  }
  add_action( 'manage_class_posts_custom_column' , 'custom_columns_data', 10, 2 );
?>