<?php
get_header();
get_myNav();
?>
<script>
    document.documentElement.style.setProperty('--bs-body-bg', '#333333');
</script>
<?php
$start_date = false;
$end_date = false;
if ($carMeta = get_post_meta(get_the_id(), 'cer_info', true)) {
    $cer_id = $carMeta['id'];
}
$branchLi = get_the_terms($post->ID, 'branch');
$courseLi = get_the_terms($post->ID, 'course');
?>
<div class="card lightEffect text-light" style="
box-shadow: 0px 0px 100px rgba(0,0,0,0.7);background-color:rgba(30,10,20,0.8)">
    <div style="
    position:absolute;height:100%;width:100%;
background-image:url(<?php echo get_template_directory_uri() . '/assets/images/water_mark.svg'; ?>);
background-size:30vmin;
mix-blend-mode: color-dodge;">
    </div>
    <div style="font-size:12pt;min-height:100vh;padding:10px;margin:10px;">
        <?php
        if (has_post_thumbnail()) {
        ?>
            <center>
                <div style="position: relative; max-width:200px;max-height:300px;margin:40px">
                    
                    <img src="<?php echo images()['m']; ?>" style="width:100%;height:100%;object-fit:cover;border-radius:2vmin">
                    <i class="fa-solid fa-award" style="right:auto;left:auto;margin-top:-20pt;font-size:40pt"></i>
                </div>
            </center>
        <?php
        }
        ?>
        <center style="margin-top:20px">
            <div><?php the_title('<h2 style="font-size:30pt;margin:0;">', '</h2>'); ?></div>
            <div>award jan 2021</div>
            <small class="low"><i>123456789</i></small>
        </center>
    </div>
</div>
<?php wp_footer(); ?>

</body>

</html>