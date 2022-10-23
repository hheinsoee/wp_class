<div style="flex:1;">
    <div class="d-none d-lg-block stickyTop offsetNav myThumb card" hein="fullHeight1" style="max-width: 300px;">

        <div class="p-3"><?php get_search_form(); ?></div>
        <ul class="list-group list-group-flush">
            <?php
            foreach (get_categories() as $cat) {
            ?>
                <li class="list-group-item">
                    <a href="<?= "/blog/?c=" . $cat->slug; ?>">
                        <?php
                        echo $cat->name;
                        ?>
                    </a>
                </li>
            <?php
            }
            ?>
        </ul>
    </div>
</div>