<a href="<?php echo esc_url(get_permalink()); ?>" title="<?php echo html_entity_decode(mb_strimwidth(get_the_excerpt(), 0, 150, ' ...'), ENT_QUOTES, 'UTF-8') ?>">
    <div class="d-flex p-2 m-2">
        <?php
        if (has_post_thumbnail()) {
        ?>
            <div class="pe-2">
                <img class="image" src="<?php echo images()['xs']; ?>" alt="">
            </div>
        <?php
            // if (get_post_format()) {
            // 	wn_post_format(get_post_format());  
            // }
        }
        ?>
        <div>
            <div><?php the_title('<b>', '</b>'); ?></div>
            <div>award jan 2021</div>
            <small class="low"><i>123456789</i></small>
        </div>
    </div>
</a>