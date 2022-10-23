<?php
get_header();
get_myNav();
        // header('Content-Type: application/json; charset=utf-8');
        add_filter('get_the_archive_title', function ($title) {
            if (is_category()) {
                $title = single_cat_title('', false);
            } elseif (is_tag()) {
                $title = single_tag_title('', false);
            } elseif (is_author()) {
                $title = '<span class="vcard">' . get_the_author() . '</span>';
            } elseif (is_tax()) { //for custom post types
                $title = sprintf(__('%1$s'), single_term_title('', false));
            } elseif (is_post_type_archive()) {
                $title = post_type_archive_title('', false);
            }
            return $title;
        });

        if (have_posts()) :

            ?>
            <div class="container">
                <div class="row">
                    <?php
            while (have_posts()) :
                the_post();
                ?>
                <div class="col-6 col-sm-4 col-md-3 col-lg-2 my-2">
                    <?php
                    get_template_part('book', 'thumbnail');
                    ?>
                </div>
                <?php
            endwhile;
            ?>
                </div>
            </div>
            <?php
        // echo json_encode(array(
        //     "title" => get_the_archive_title(),
        //     "description" => get_the_archive_description(),
        //     "data" => $data));
        else :
        endif;


    get_footer(); ?>