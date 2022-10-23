<div class="author card">
    <div class="card-body d-flex ">
        <img class="photo" src="<?= get_template_directory_uri() . '/assets/images/author.svg'; ?>" alt="authorphoto">
        <img class="photo" src="<?=esc_url( get_avatar_url( $user->ID )) ;?>" alt="authorphoto">
        
        <div class="mx-2">
            <div class="author-name"><?=$user->display_name;?></div>
            <div>title</div>
        </div>
    </div>
</div>