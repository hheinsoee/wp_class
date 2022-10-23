<?php
if(isset($_GET['json'])){

    include(get_template_directory().'/functions/api.php');
}
else{
    ?>
    archive.php
    <?php 
}
?>
