<?php
get_header();
get_myNav();
?>
<div  class="container-s">
    <?php
    if (has_post_thumbnail()) {
    ?>
        <img src="<?php echo images()['l']; ?>" style="width:100%">
    <?php
    }
    ?>
    <div class="p-2">
        <h5><?php the_title('<b>', '</b>'); ?></h5>
        <?php social(); ?>
    </div>
    <div class="p-2">
        <p><?php echo the_content(); ?></p>
    </div>
</div>

<?php get_footer(); ?>
<?php wp_footer(); ?>

</body>

</html>