<?php
function myDate($date, $style)
{
    switch ($style) {
        case 'calenda':
?>
            <date class="miniCalenda">
                <span class="date"><?= date_format(date_create($date), "d"); ?></span>
                <span class="month"><?= date_format(date_create($date), "M"); ?></span>
                <span class="year"><?= date_format(date_create($date), "Y"); ?></span>
            </date>
<?php
            break;

        default:
            # code...
            break;
    }
}

function allCategory(){
    
}