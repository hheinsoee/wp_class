<div class="text-light p-3 pt-5 bg-primary">
    <div class="container">
        <footer class="row row-cols-1 row-cols-sm-3 row-cols-md-4 py-5 my-5 border-top">
            <div class="col mb-3">
                <a href="/" class="d-flex align-items-center mb-3 text-decoration-none">

                    <?php
                    if (has_custom_logo()) {
                        $custom_logo_id = get_theme_mod('custom_logo');
                        $logo = wp_get_attachment_image_src($custom_logo_id, 'full');
                    ?>
                        <img style="
                    height: 10vmin;
                    /* filter: drop-shadow(3px 0 0 white) drop-shadow(0 3px 0 white) drop-shadow(-3px 0 0 white) drop-shadow(0 -3px 0 white); */
                    max-height: 100px;
                    min-height: 50px;
                    " src="<?php echo esc_url($logo[0]); ?>" alt="<?php echo get_bloginfo('name'); ?>" class="bi me-2">
                        &nbsp;
                    <?php
                    }
                    ?>
                    <div>
                        <div class="h1"><?= get_bloginfo('name'); ?></div>

                        <div>
                            <?= get_bloginfo('description'); ?>
                        </div>
                    </div>
                </a>
                <p class="low"><?= get_bloginfo('name'); ?> © 1996 - <?=date("Y");?></p>
            </div>

            <div class="col mb-3">
                <h5 class="h4">Important Link</h5>
                <?php
                foreach (hein_menu_array('important_link') as $manu) {
                ?>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="<?= $manu->url; ?>" class="nav-link p-0 low"><?= $manu->title; ?></a></li>
                    </ul>

                <?php
                }
                ?>
            </div>

            <div class="col mb-3">
                <h5><a class="h4" href="/curriculum">curriculum</a></h5>
                <ul class="nav flex-column">

                    <?php
                    $curriculum = array(
                        'post_type' => 'curriculum',
                        'posts_per_page'   => 5
                    );
                    $the_query = new WP_Query($curriculum);

                    while ($the_query->have_posts()) {
                        $the_query->the_post();
                        ?>
                        <li class="nav-item mb-2">
                            <a href="<?=esc_url(get_permalink()); ?>" class="nav-link p-0 low">
                            <?php the_title(); ?></h5>
                            </a>
                        </li>
                        <?php
                    };

                    ?>
                </ul>
            </div>

            <div class="col mb-3">
                <h5><a href="/class" class="h4">Classes</a></h5>
                <ul class="nav flex-column">
                    <?php
                    foreach (allCourse() as $course) {
                    ?>
                        <li class="nav-item mb-2"><a href="/class/?course=<?= $course->slug; ?>" class="nav-link p-0 low"><?= $course->name; ?></a></li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
        </footer>
    </div>
    <hr>
    <div class="d-flex flex-column flex-sm-row justify-content-between px-4 m-0">
        <p>© 2022 <?= bloginfo('name'); ?>. All rights reserved.</p>
        <!-- <ul class="list-unstyled d-flex">
        <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#twitter"></use></svg></a></li>
        <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#instagram"></use></svg></a></li>
        <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#facebook"></use></svg></a></li>
      </ul> -->
        <a href="https://www.heinsoe.com">
            developed by www.heinsoe.com
        </a>
    </div>
</div>