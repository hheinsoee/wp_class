
<div style="height: 100px;">

</div>
<nav class="navbar fixed-bottom navbar-expand-sm navbar-dark bg-dark">
    <a class="navbar-brand" href="<?php echo get_home_url(); ?>">Home</a>
    <a class="navbar-brand" href="<?php echo get_home_url(); ?>/package">Packages</a>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#helpModel">
        <i class="fa fa-question"></i>လမ်းညွန်
    </button>
</nav>


<!-- Modal -->
<div class="modal fade" id="helpModel" tabindex="-1" role="dialog" aria-labelledby="helpModelLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="helpModelLabel">လမ်းညွန်များ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php
            foreach (hein_menu_array('help') as $menu_item) {
                $link = $menu_item->url;
                $title = $menu_item->title;

                if (!$menu_item->menu_item_parent) {
            ?>
                    <a class="dropdown-item" href="<?php echo $link; ?>" class="title"><?php echo $title; ?> </a>
            <?php
                }
            };
            ?>
        </div>
    </div>
</div>
<?php wp_footer(); ?>

</body>

</html>