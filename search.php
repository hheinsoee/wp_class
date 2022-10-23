<?php
get_header();
get_myNav(); ?>

<div class="d-lg-flex justify-content-between">
    
    <?php include __DIR__ . "/components/category/leftPanel.php"; ?>
    <div style="flex:1">
        <div class="container-s p-2">

            <h2 class="h5">search result for <span class="h2"><?php the_search_query(); ?></span></h2>
            <?php

            if (have_posts()) :

                while (have_posts()) :
                    the_post();
                    get_template_part('content', 'list');

                endwhile;
            endif;
            ?>
        </div>
    </div>
    <div style="flex:1;" class="d-none d-lg-block ">
        <div class="container-s stickyTop offsetNav myThumb d-flex justify-content-end" hein="fullHeight1">
            <div>
                <?php myUser('all'); ?>
            </div>
        </div>
    </div>
</div>


<?php get_footer(); ?>
<?php wp_footer(); ?>

</body>

</html>