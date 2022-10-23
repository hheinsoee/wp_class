<?php
if (isset($_GET['json'])) {
    include(get_template_directory() . '/functions/api.php');
} else {
    get_header(); ?>
    <div class="mytransparent-nav" id="navContainer">
        <?php get_myNav(); ?>
    </div>
    <script>
        document.querySelector('.navbar').classList.remove('glass');
        document.addEventListener("DOMContentLoaded", function() {

                navContainer = document.querySelector('#navContainer');
                document.querySelector('.navbar').classList.remove('bg-primary');

                var last_scroll_top = 0;
                window.addEventListener('scroll', function() {
                    let scroll_top = window.scrollY;
                    let isOver = scroll_top * 2 - window.innerHeight > 0
                    if (isOver) {
                        document.querySelector('#navContainer').classList.remove('mytransparent-nav');
                        document.querySelector('.navbar').classList.add('bg-primary');
                        document.querySelector('.navbar').classList.add('glass');
                    } else {
                        document.querySelector('#navContainer').classList.add('mytransparent-nav')
                        document.querySelector('.navbar').classList.remove('bg-primary');
                        document.querySelector('.navbar').classList.remove('glass');
                    }
                });
                // window.addEventListener
            }
            // if

        );
        // DOMContentLoaded  end
    </script>

    <header>
        <div style="
    background: url(<?php echo get_template_directory_uri() . "/assets/images/renaissance_yg.jpg"; ?>);
    background-size: cover;
    background-position: center;
    ">
            <div style="background:linear-gradient(rgba(0%,0%,0%,10%) , rgba(0%,0%,0%,30%))">
                <div style="
            height: 90vh;
            max-height:800px;
            min-height:600px;
            display: flex;
            flex-wrap:wrap;
            justify-content: center;
            color: white;">


                    <div style="flex:1;
                    min-width:300px;
                    display: flex;
                    align-items: flex-end;">
                        <div class="bg-dark glass" style="flex:1; width: 100%;">
                            <section style="flex:1;width:100%" class="container py-4">
                                <?php
                                $args = array(
                                    'post_type' => 'feedback',
                                    'posts_per_page'   => 5
                                );
                                $the_query = new WP_Query($args);

                                // The Loop
                                if ($the_query->have_posts()) {
                                ?>
                                    <div>
                                        <div class="swiper feedbackswiper">
                                            <div class="swiper-wrapper">
                                                <?php
                                                while ($the_query->have_posts()) {
                                                    $the_query->the_post();
                                                ?>
                                                    <div class="swiper-slide">
                                                        <?php
                                                        get_template_part('content', 'feedback-card');
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
                                } else {
                                    // no posts found
                                }
                                ?>
                            </section>
                        </div>
                        <script>
                            const feedbackswiper = new Swiper('.feedbackswiper', {
                                // Optional parameters
                                // direction: 'vertical',
                                slidesPerView: "auto",
                                spaceBetween: 0,
                                // effect: "fade",
                                loop: true,
                                autoplay: {
                                    delay: 5000,
                                    disableOnInteraction: false,
                                },
                                // effect: "coverflow",
                                grabCursor: true,
                                centeredSlides: true,
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </header>


    <section class="text-light p-3 py-5 bg-primary">
        <div class="container">
            <div class="row g-5">

                <div class="p-3 col-md-4 ">
                    <h2 class="h4">
                        <i class="fa-solid fa-bullseye"></i> Turn Your Vision Into Reality!
                    </h2>
                    <p class="low">RENAISSANCE Multilingual Institute is a well-established Language Academy founded in 1996 with a reputation for having boosted a new generation of high flying professionals with commendable English skills.</p>
                </div>
                <div class="p-3 col-md-4 ">
                    <h2 class="h4">
                        <i class="fa-solid fa-bullseye"></i> Established in 1996
                    </h2>
                    <p class="low">paragraph is the paragraph paragraph is the paragraph paragraph is the paragraph</p>
                </div>
                <div class="p-3 col-md-4 ">
                    <h2 class="h4">
                        <i class="fa-solid fa-bullseye"></i> Vision
                    </h2>
                    <p class="low">
                        The emergence of Renaissance Multilingual Institute was particularly an inspiration to equip learners with linguistic prowess
                    </p>
                </div>
            </div>
        </div>
    </section>



    <?php
    $curriculum = array(
        'post_type' => 'curriculum',
        'posts_per_page'   => 5
    );
    $the_query = new WP_Query($curriculum);

    // The Loop
    if ($the_query->have_posts()) {
    ?>
        <section class="py-5 bg-primary glass text-light">
            <div class="container">
                <h2 class="h1">
                    <center>
                        curriculum book
                    </center>
                </h2>
            </div>
            <div class="curriculumSwiper swiper">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper align-items-end">
                    <?php
                    while ($the_query->have_posts()) {
                        $the_query->the_post();

                    ?>
                        <div class="swiper-slide">
                            <?= get_template_part('book', 'thumbnail'); ?>
                        </div>
                    <?php
                    }
                    /* Restore original Post Data */
                    wp_reset_postdata();
                    ?>
                </div>
            </div>

            <script>
                const curriculumSwiper = new Swiper('.curriculumSwiper', {
                    effect: "coverflow",
                    grabCursor: true,
                    centeredSlides: true,
                    slidesPerView: "auto",
                    coverflowEffect: {
                        rotate: 30,
                        stretch: 0,
                        depth: 100,
                        modifier: 1,
                        slideShadows: true,
                    }
                });
            </script>

        </section>
    <?php
    } else {
        // no posts found
    }
    ?>


    <section>
        <center class="my-5 py-5">
            <h2 class="h1 py-5">Comming & Running Classes</h2>
            <?php
            $args = array(
                'post_type' => 'class',
                'posts_per_page'   => 5
            );
            $the_query = new WP_Query($args);

            // The Loop
            if ($the_query->have_posts()) {
            ?>
                <div class="container-xs">
                    <?php
                    while ($the_query->have_posts()) {
                        $the_query->the_post();

                        get_template_part('class', 'timeline');
                        /* Restore original Post Data */
                        wp_reset_postdata();
                    }
                    ?>
                </div>
            <?php
            } else {
                // no posts found
            }
            ?>
            <a href="/class" class="btn btn-outline-primary" role="button">More Classes</a>
        </center>
    </section>


    <div class="text-light py-5 bg-secondary">
        <h2 class="h4 container p-4" id="article">Article</h2>
        <?php
        add_filter('get_the_archive_title', function ($title) {
            if (is_category()) {
                $title = single_cat_title('', false);
            } elseif (is_tag()) {
                $title = single_tag_title('', false);
            } elseif (is_author()) {
                $title = '<span class="vcard">' . get_the_author() . '</span>';
            } elseif (is_tax()) { //for custom post types
                $title = sprintf(__('%1$s'), single_term_title('', false));
            } elseif (is_post_type_archive()) {
                $title = post_type_archive_title('', false);
            }
            return $title;
        });

        if (have_posts()) :
            $x = 0;
            while (have_posts()) :
                the_post();
                if ($x == 0) {
        ?>
                    <a href="<?php echo esc_url(get_permalink()); ?>" title="<?php echo html_entity_decode(mb_strimwidth(get_the_excerpt(), 0, 150, ' ...'), ENT_QUOTES, 'UTF-8') ?>" class="container d-flex p-5 flex-wrap">
                        <?php
                        if (has_post_thumbnail()) {
                        ?>
                            <img style="flex:1" class="card-img-top" src="<?php echo images()['m']; ?>" alt="">
                        <?php
                            // if (get_post_format()) {
                            // 	wn_post_format(get_post_format());  
                            // }
                        }
                        ?>
                        <div style="flex:1" class="card-body">
                            <h5 class="card-title"><?php the_title('<b>', '</b>'); ?></h5>
                            <div class="low small">
                                <i class="fa-sharp fa-solid fa-calendar-days"></i>
                                <?= date("d-m-Y", get_post_time('U', true)); ?>
                            </div>
                            <p class="card-text">
                                <?php
                                echo html_entity_decode(mb_strimwidth(get_the_excerpt(), 0, 70, ' ...'), ENT_QUOTES, 'UTF-8')
                                ?>
                            </p>
                        </div>
                    </a>
            <?php
                }
                $x += 1;
            endwhile;
            $x = 0;
            ?>
            <div class="articleSwiper swiper">
                <div class="swiper-wrapper">
                    <?php
                    while (have_posts()) :
                        the_post();
                        if ($x !== 0) {
                    ?>
                            <div class="swiper-slide" style="max-width: 300px;">
                                <?php get_template_part('content', 'featureCard'); ?>
                            </div>
                    <?php
                        }
                        $x += 1;
                    endwhile;
                    ?>
                </div>
            </div>
            <script>
                const articleSwiper = new Swiper('.articleSwiper', {
                    // Optional parameters
                    // direction: 'vertical',
                    slidesPerView: "auto",
                    spaceBetween: 0,
                    loop: false,
                    autoplay: {
                        delay: 2500,
                        disableOnInteraction: true,
                    },
                    // effect: "coverflow",
                    grabCursor: true,
                    centeredSlides: false,
                });
            </script>
        <?php
        else :
        endif;

        ?>
    </div>
    <?php
    get_footer();
    wp_footer();
    ?>
    </body>

    </html>
<?php
}
?>