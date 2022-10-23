<?php
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
function myUser($id = 'all', $type = "smallCard")
{
    if (is_int($id)) {
        type(get_user_by('id', $id), $type);
    } else {
        $users = get_users();
        foreach ($users as $user) {
            type($user, $type);
        }
    }
}
function type($user, $type = "smallCard")
{
    switch ($type) {
        case 'smallCard': ?>
            <a href="/author/<?= $user->user_nicename; ?>" class="author card my-1" style="min-width:200px;">
                <div class="card-body b-1 d-flex ">
                    <img class="photo" src="<?= esc_url(get_avatar_url($user->ID)); ?>" alt="authorphoto">
                    <div class="mx-2">
                        <div class="author-name "><?= $user->display_name; ?></div>
                        <div><?= $user->nickname; ?></div>
                    </div>
                </div>
            </a>
        <?php break;
        case 'chip': ?>
            <a href="/blog/author/<?= $user->user_nicename; ?>" class="d-flex author chip">
                <img class="photo" src="<?= get_template_directory_uri() . '/assets/images/author.svg'; ?>" alt="authorphoto">
                <div class="mx-2">
                    <div class="author-name "><?= $user->display_name; ?></div>
                    <div><?= $user->nickname; ?></div>
                </div>
            </a>
        <?php break;
        case 'full': ?>
            <center class="p-4">
                <img class="photo" src="<?= esc_url(get_avatar_url($user->ID)); ?>" alt="authorphoto">
                <div class="py-2">
                    <h2 class="h5"><?= $user->display_name; ?></h2>
                    <div><?= $user->nickname; ?></div>
                    <div><?= $user->description; ?></div>
                </div>
            </center>
<?php break;
    }
}
