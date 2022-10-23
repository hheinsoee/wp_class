<?php //json header
header('Content-Type: application/json; charset=utf-8');
// header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
header("Access-Control-Allow-Origin: * ");
header('Access-Control-Allow-Credentials: false');
header('Access-Control-Allow-Method: GET');
header('Access-Control-Max-Age: 86400');


  add_filter( 'get_the_archive_title', function ($title) {    
    if ( is_category() ) {    
            $title = single_cat_title( '', false );    
        } elseif ( is_tag() ) {    
            $title = single_tag_title( '', false );    
        } elseif ( is_author() ) {    
            $title = '<span class="vcard">' . get_the_author() . '</span>' ;    
        } elseif ( is_tax() ) { //for custom post types
            $title = sprintf( __( '%1$s' ), single_term_title( '', false ) );
        } elseif (is_post_type_archive()) {
            $title = post_type_archive_title( '', false );
        }
    return $title;    
  });

if (have_posts()) :
    $data = [];

    while (have_posts()) :
        the_post();
        // $data[] = get_template_part('content', 'thumbnail');
        $data[] = array(
            "id" => get_the_ID(),
            "slug" => $post->post_name,
            "title" => get_the_title(),
            "time" => date("Y-m-d H:i:s", get_post_time('U', true)),
            "excerpt" => html_entity_decode(get_the_excerpt(), ENT_QUOTES, 'UTF-8'),
            // "content" => html_entity_decode(the_content(), ENT_QUOTES, 'UTF-8'),
            "content"=>apply_filters('the_content',get_the_content()),
            "images" => images(),
            "url" => esc_url(get_permalink()),
            "author" => array(
                "name"=>get_the_author_meta('display_name' ),
                "user_nicename"=>get_the_author_meta('user_nicename' ),
                "img"=>esc_url( get_avatar_url( $user->ID ))
            )
        );
    endwhile;

    echo json_encode(array(
        "title" => get_the_archive_title(),
        "description" => get_the_archive_description(),
        "data" => $data));
else :
endif;
