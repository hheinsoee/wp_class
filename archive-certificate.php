<?php
get_header();
get_myNav();
?>
<div>
    <div class="container">
        <div class="d-flex justify-content-center align-items-center" style="min-height: 500px;height:70vh">
            <div>
                <form class="d-flex" action="?" method="get">
                    <input class="mx-1 form-control form-control-lg" placeholder="certificate id" type="search" name="certificate_id" value="<?php echo @$_GET['certificate_id']; ?>" required>
                    <button class="mx-1 btn bg-primary text-light d-flex justify-content-center align-items-center" type="submit">
                        <i class="fa-solid fa-magnifying-glass"></i>&nbsp;find
                    </button>
                </form>
                <?php
                if (isset($_GET['certificate_id'])) {
                    findCertificate($_GET['certificate_id']);
                }
                ?>
            </div>
        </div>
    </div>
</div>
<?php
function findCertificate($c_id)
{
    $args = array(
        'post_type' => 'certificate',
        'posts_per_page' => -1,
        'post_status' => 'publish',
        'meta_query' => [
            array(
                'key' => 'cer_info',
                'value' => stripslashes(sanitize_text_field($c_id)),
                'compare' => 'LIKE',
                'type'    => 'char',
            ),
        ]
    );
    $the_query = new WP_Query($args);
    // The Loop
    if ($the_query->have_posts()) {
?>
        <div>
            <div class="">
                <div class="">

                    <?php
                    while ($the_query->have_posts()) {
                        $the_query->the_post();
                    ?>
                        <div class="swiper-slide">
                            <?php
                            get_template_part('certificate', 'list');
                            /* Restore original Post Data */
                            ?>
                        </div>
                    <?php
                    }
                    wp_reset_postdata();
                    ?>
                </div>
            </div>
        </div>
<?php
    }
}
get_footer();
wp_footer();
