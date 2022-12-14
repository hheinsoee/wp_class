<!-- NAV -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary text-light sticky-top glass p-1 px-3" style="--bs-bg-opacity: .5;">
    <div class="container-fluid">
        <a class="navbar-brand d-flex" href="/ ">
            <?php
            if (has_custom_logo()) {
                $custom_logo_id = get_theme_mod('custom_logo');
                $logo = wp_get_attachment_image_src($custom_logo_id, 'full');
            ?>
                <img style="
					height: 7vmin;
					/* filter: drop-shadow(3px 0 0 white) drop-shadow(0 3px 0 white) drop-shadow(-3px 0 0 white) drop-shadow(0 -3px 0 white); */
					max-height: 60px;
					min-height: 40px;
					" src="<?php echo esc_url($logo[0]); ?>" alt="<?php echo get_bloginfo('name'); ?>">
                &nbsp;
            <?php
            }
            ?>
            <div style="line-height: 1vmin;" class="d-none d-sm-block">
                <h1 class="h4 my-1"><?= get_bloginfo('name'); ?></h1>
                <div style="position:absolute;font-size:9pt;"><?= get_bloginfo('description'); ?></div>
            </div>
        </a>



        <div class="d-flex d-lg-none align-items-center">
            <a class="mx-1 chip " href="tel:<?= myInfo()['phone']; ?>" title="<?= myInfo()['phone']; ?>"><i class="fa-solid fa-phone fa-sm"></i>Call</a>

            <a class="mx-1 px-2" href="mailto:<?= myInfo()['email']; ?>" title="<?= myInfo()['email']; ?>"><i class="fa-regular fa-envelope fa-lg"></i></a>

            <a class="mx-1 px-2" href="https://fb.com/<?= myInfo()['fb_page_id']; ?>" title="<?= myInfo()['fb_page_id']; ?>"><i class="fa-brands fa-facebook fa-lg"></i></a>


            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="class" href="/curriculum">Curriculum</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Classes
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php
                        foreach (allCourse() as $course) {
                        ?>
                            <li>
                                <div class="dropdown-item">
                                    <i class="fa-solid fa-graduation-cap"></i>
                                    <a href="/class/?course=<?= $course->slug; ?>"><?= $course->name; ?></a>
                                </div>
                            </li>
                        <?php
                        }
                        ?>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="/class">All Class</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="class" href="/blog">blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="class" href="/certificate">certificate</a>
                </li>
            </ul>
        </div>

        <div class="d-none d-lg-flex align-items-center">
            <a class="mx-1 chip" href="tel:<?= myInfo()['phone']; ?>" title="<?= myInfo()['phone']; ?>"><i class="fa-solid fa-phone fa-sm"></i>Call</a>

            <a class="mx-1 px-2" href="mailto:<?= myInfo()['email']; ?>" title="<?= myInfo()['email']; ?>"><i class="fa-regular fa-envelope fa-lg"></i></a>

            <a class="mx-1 px-2" href="https://fb.com/<?= myInfo()['fb_page_id']; ?>" title="<?= myInfo()['fb_page_id']; ?>"><i class="fa-brands fa-facebook fa-lg"></i></a>
        </div>

    </div>
</nav>
<!-- 
<span data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop" aria-controls="offcanvasTop">Search</span>
<div class="offcanvas offcanvas-top" tabindex="-1" id="offcanvasTop" aria-labelledby="offcanvasTopLabel">
    <div class="offcanvas-header">
        <div></div>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body container">
        <div class="h2" id="offcanvasTopLabel">Search</div>
        <?php //get_search_form(); 
        ?>
    </div>
</div> -->