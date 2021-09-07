<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap.min.css'); ?>">
    <script src="<?= base_url('assets/js/bootstrap.min.js'); ?>"></script>
    <script src="<?= base_url('assets/jq/jquery.js'); ?>"></script>

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">

        <div class="container-fluid">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a class="navbar-brand" href="<?= base_url('user') ?>">Home</a>
                </li>
                <?php

                foreach ($data as $title) : ?>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <!--&nbsp; Non brackable spaces between each menu -->
                <?php
                    echo '<li>
                        <a class="navbar-brand" href="' . base_url("user/loadTitle?id=$title[id]") . '">' . $title["menu_name"] . '</a>
                    </li>';

                endforeach;
                ?>

            </ul>


            <ul class="nav navbar-nav navbar-left">
                <li>
                    <a class="navbar-brand" href="<?= base_url('user/login') ?>">Login</a>
                </li>
            </ul>

        </div>
    </nav>

    <!-- <script>
    $(document).ready(function() {
        $('li').click(function() {
            $('li').css("font", "red");
        });
    });
    </script> -->