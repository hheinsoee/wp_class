<?php
get_header();
get_myNav();

// get all taxonomy  4 course
$terms = get_terms(array(
    'taxonomy' => 'course',
    'hide_empty' => true, //post မရှိကေ မပါ 
));
?>


<div class="d-lg-flex justify-content-between">

    <div class="sticky-top offsetNav d-lg-none text-center bg-primary text-light sticky-top glass" style="z-index: 1;">
        <div class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#categoriesList" aria-controls="categoriesList" aria-expanded="false" aria-label="Toggle navigation">
            Courses
        </div>
        <div class="navbar-collapsecontainer-s collapse" id="categoriesList">
            <ul class="list-group list-group-flush">
                <?php
                foreach ($terms as $t) {
                ?>
                    <li class="list-group-item text-light" style="background-color: transparent;">
                        <a href="<?= "./?course=" . $t->slug; ?>">
                            <i class="fa-solid fa-graduation-cap"></i>
                            <?php
                            echo $t->name;
                            ?>
                        </a>
                    </li>
                <?php
                }
                ?>
            </ul>
        </div>
    </div>
    <div style="flex:1;">
        <div class="d-none d-lg-block stickyTop offsetNav myThumb card" hein="fullHeight1" style="max-width: 300px;">
            <div class="h3 p-3">Courses</div>
            <ul class="list-group list-group-flush">
                <?php
                foreach ($terms as $t) {
                ?>
                    <li class="list-group-item">
                        <a href="<?= "./?course=" . $t->slug; ?>">
                            <i class="fa-solid fa-graduation-cap"></i>
                            <?php
                            echo $t->name;
                            ?>
                        </a>
                    </li>
                <?php
                }
                ?>
            </ul>
        </div>
    </div>




    <div class="container-s" style="flex:3">
        <?php
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

            while (have_posts()) :
                the_post();
                get_template_part('class', 'timeline');
            endwhile;
        endif;
        ?>
    </div>
    <div style="flex:1" class="d-none d-lg-block">

    </div>
</div>
<?php



get_footer();
wp_footer();
