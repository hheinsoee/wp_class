<div class="d-lg-none text-center bg-primary text-light glass" style="z-index: 1;position:sticky;bottom:0;">
    <div class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#categoriesList" aria-controls="categoriesList" aria-expanded="false" aria-label="Toggle navigation">
        Select Categories
    </div>
    <div class="navbar-collapsecontainer-s collapse" id="categoriesList">
        <ul class="list-group list-group-flush">
            <?php
            foreach (get_categories() as $cat) {
            ?>
                <li class="list-group-item text-light" style="background-color: transparent;">
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
    <div class="p-3"><?php get_search_form(); ?></div>
</div>