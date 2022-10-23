<div class="card lightEffect text-light" id="printarea" style="
margin:2vmin; box-shadow: 0px 0px 100px rgba(0,0,0,0.7);background-color:rgba(30,10,20,0.8)">
    <div style="
    position:absolute;height:100%;width:100%;
background-image:url(<?php echo get_template_directory_uri() . '/assets/images/water_mark.svg'; ?>);
background-size:30vmin;
mix-blend-mode: color-dodge;">
    </div>
    <div style="font-size:2vmin;width:82vmin;height:114vmin;padding:5vmin;margin:2vmin;border:1vmin solid #480222;">
        <?php
        if (has_post_thumbnail()) {
        ?>
            <center>
                <div style="position: relative; width:25vmin;height:30vmin;margin:4vmin">
                    <i class="fa-solid fa-award" style="position: absolute;right:7.5vmin;left:7.5vmin;bottom:-5vmin;font-size:10vmin"></i>
                    <img src="<?php echo images()['m']; ?>" style="width:100%;height:100%;object-fit:cover;border-radius:2vmin">
                </div>
            </center>
        <?php
        }
        ?>
        <center style="margin-top:8vmin">
            <div><?php the_title('<h2 style="font-size:5vmin;margin:0;">', '</h2>'); ?></div>
            <div>award jan 2021</div>
            <small class="low"><i>123456789</i></small>
        </center>
    </div>
</div>