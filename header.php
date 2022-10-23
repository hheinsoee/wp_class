<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="theme-color" content="#262626">


    <?php
    wp_head();
    ?>
</head>

<body>
    <?php // wp_body_open();
    ?>
    <script>
        window.fbAsyncInit = function() {
            FB.init({
                appId: 'your-app-id',
                autoLogAppEvents: true,
                xfbml: true,
                version: 'v13.0'
            });
        };
    </script>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js"></script>
    <script>
        console.log("%cDesign and Developed by ", "font-size:20px;color: #09f");
        console.log("%cwww.heinsoe.com", "font-size:30px");
    </script>
