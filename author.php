<?php
if (isset($_GET['json'])) {

    include(get_template_directory() . '/functions/api.php');
} else {
    get_header();
    get_myNav();
    // admin_color
    // aim
    // comment_shortcuts
    // description
    // display_name
    // first_name
    // ID
    // jabber
    // last_name
    // nickname
    // plugins_last_view
    // plugins_per_page
    // rich_editing
    // syntax_highlighting
    // user_activation_key
    // user_description
    // user_email
    // user_firstname
    // user_lastname
    // user_level
    // user_login
    // user_nicename
    // user_pass
    // user_registered
    // user_status
    // user_url
    // yim

?>
    <div class="d-md-flex justify-content-between">
        <div class=" bg-primary glass text-light" 
        style="flex:1;"
        ">
            <div class="container-s stickyTop myThumb offsetNav"  style="max-width: 300px;">
                <?php myUser(get_the_author_meta('ID'), 'full'); ?>
            </div>
        </div>
        <div style="
        flex:2;
        ">
            <div class="container-s">
                <?php include __DIR__ . "/components/blog/timeline.php"; ?>
                <?php show_timeline(home_url($wp->request)); ?>
            </div>
        </div>
        <div style="flex:1;" class="d-none d-lg-block">
            <div class="container-s stickyTop myThumb offsetNav" hein="fullHeight1">
                <?php myUser('all'); ?>
            </div>
        </div>
    </div>

    <?php
    wp_footer(); ?>

    </body>

<?php
}
?>