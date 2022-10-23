<?php
get_header();
get_myNav();

?>
<div class="d-lg-flex justify-content-between" style="min-height: 100vh;">


    <?php include __DIR__ . "/components/category/leftPanel.php"; ?>
    <div style="
        flex:2;
        ">
        <div class="container-s">
            <article>
                <?php
                if (has_post_thumbnail()) {
                ?>
                    <img class="thumbnail" src="<?php echo images()['l']; ?>" alt="">
                <?php
                }
                ?>
                <div>
                    <h5 class="p-1"><?php the_title('<b>', '</b>'); ?></h5>
                    <?php social(); ?>
                </div>
                <div class="p-1">
                    <p><?php echo the_content(); ?></p>
                </div>
            </article>
            <?php include __DIR__ . "/components/blog/timeline.php"; ?>
            <?php show_timeline(); ?>
        </div>
    </div>
    <div style="flex:1;" class="d-none d-lg-block ">
        <div class="container-s stickyTop offsetNav myThumb d-flex justify-content-end" hein="fullHeight1">
            <div class="p-2">
                <?php myUser('all'); ?>
            </div>
        </div>
    </div>
</div>
<?php include __DIR__ . "/components/category/stickyB.php"; ?>
<?php wp_footer(); ?>