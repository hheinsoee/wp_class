<?php
get_header();
get_myNav();
$start_date = false;
$end_date = false;
if (get_post_meta(get_the_id(), 'class', true)) {
    $classMeta = get_post_meta(get_the_id(), 'class', true);
    $start_date = $classMeta['startDate'];
    $end_date = $classMeta['endDate'];
}
$branchLi = get_the_terms($post->ID, 'branch');
$courseLi = get_the_terms($post->ID, 'course');
?>
<div class="d-md-flex justify-content-between">
    <div style="flex:1;">
        <div class="
        stickyTop 
        offsetNav
        d-flex
        justify-content-center
        align-items-center
        " hein="fullHeight1" style="
        <?php
        if (has_post_thumbnail()) {
        ?>
            background-image:url(<?php echo images()['m']; ?>);
            background-size:cover;
            background-position: center;
        <?php
        }
        ?>
        ">
            <div class="p-3 bg-primary glass text-light m-3" style="width: 300px;">
                <div class="p-5 border">
                    <center>
                        <?php the_title('<div class="h2">', '</div>'); ?>
                        <?php
                        $term_obj_list = get_the_terms($post->ID, 'course');
                        echo join(', ', wp_list_pluck($term_obj_list, 'name'));
                        myDate($start_date, "calenda");
                        ?>
                        <?php social(); ?>
                    </center>
                </div>
            </div>
        </div>
    </div>
    <div style="flex:2;">
        <div class="container">
            <div class="p-2 py-5 m-2 card">
                <center>
                    <h2><?php the_title('<b>', '</b>'); ?></h2>
                    <?php
                    if (get_post_meta(get_the_id(), 'class', true)) {
                        $classMeta = get_post_meta(get_the_id(), 'class', true);
                    ?>
                        <div> Starts on <?= date_format(date_create($start_date), "d/m/Y"); ?></div>
                        <?php
                    }
                    if ($branchLi) {
                        foreach ($branchLi as $b) {
                        ?>
                            <div class="chip">
                                <i class="fa-solid fa-location-dot"></i> <?= $b->name; ?>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </center>
                <div class="p-4">
                    <p><?php echo the_content(); ?></p>
                </div>

            </div>

            <?php
            if ($courseLi) {
            ?>
                <div class="p-4 m-2 card">
                    <h3>Course</h3>
                    <?php
                    foreach ($courseLi as $c) {
                    ?>
                        <div class="p-1 m-2">
                            <h4 class="h6" data-bs-toggle="collapse" data-bs-target="#collapse<?= $c->term_id; ?>" aria-expanded="false" aria-controls="collapse<?= $c->term_id; ?>">
                                <?= $c->name; ?>
                            </h4>
                            <div class="collapse show" id="collapse<?= $c->term_id; ?>">
                                <p><?= $c->description; ?></p>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            <?php
            }
            ?>

            <?php
            if ($branchLi) {
            ?>
                <div class="p-4 m-2 card bg-primary text-light">
                    <div class="h5">သင်ကြားမည့်သင်တန်းကျောင်းခွဲ</div>
                    <ul>
                        <?php
                        foreach ($branchLi as $b) {
                        ?>
                            <li>
                                <span><?= $b->name; ?></span>
                                &nbsp;<i class="low"><?= $b->description; ?></i>
                            </li>
                        <?php
                        }
                        ?>

                    </ul>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>
<?php wp_footer(); ?>

</body>

</html>