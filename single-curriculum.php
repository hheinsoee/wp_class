<?php
get_header();
get_myNav();
?>
<div>
    <div class="d-md-flex justify-content-between">
        <div style="flex:1;">
            <div class="container stickyTop myThumb d-md-flex justify-content-end offsetNav p-2">
                <div>
                    <?php
                    if (has_post_thumbnail()) {
                    ?>
                        <img src="<?php echo images()['m']; ?>" style="height:240px">
                    <?php
                    }
                    ?>
                    <div>
                        <h5 class="p-1"><?php the_title('<b>', '</b>'); ?></h5>
                        <?php social(); ?>
                    </div>
                </div>
            </div>
        </div>
        <div style="flex:2;">
            <div  class="container">
                <p><?php echo the_content(); ?></p>
            </div>
        </div>
        <div style="flex:1;">
            <div class="container-s stickyTop myThumb p-2">
                <h3 class="h4">Recent Classes</h3>
                <?php
                $args = array(
                    'post_type' => 'class',
                    'posts_per_page'   => 3
                );
                $the_query = new WP_Query($args);

                // The Loop
                if ($the_query->have_posts()) {
                ?>
                    <table class="timeline my-2">
                        <?php
                        while ($the_query->have_posts()) {
                            $the_query->the_post();

                            get_template_part('class', 'timeline');
                            /* Restore original Post Data */
                            wp_reset_postdata();
                        }
                        ?>
                    </table>
                <?php
                } else {
                    // no posts found
                }
                ?>
            </div>
        </div>
    </div>
</div>


<?php get_footer(); ?>
<?php wp_footer(); ?>

</body>

</html>