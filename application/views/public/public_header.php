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
    <script src="<?= base_url('assets/icons/font_awesome.js'); ?>"></script>

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">

        <div class="container-fluid">
            <ul class="nav navbar-nav navbar-right">
                <!-- <li><i class=" fas fa-home fa-2x
                        text-white"></i></li> -->
                <?php
                foreach ($data as $title) :
                    // echo "<pre>";
                    // print_r($data);
                    // echo "</pre>";
                    // exit; 

                ?>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <!--&nbsp; Non brackable spaces between each menu -->
                <?php                              // For Menu
                    echo '<li>              
                    <div class="dropdown"> <a class="navbar-brand" href="' . base_url("user/loadTitle?id=" . $title->id) . '">' . $title->menu_name . '</a><br>
                        <div class="dropdown-content">';

                    if (sizeOf($title->submenu) > 0) {         //This is for submenu //submenu is a array getting from data result print
                        foreach ($title->submenu as $submenu_name) :
                            echo '<a href="' . base_url("user/loadsubTitle?id=" . $submenu_name->id) . '">' . $submenu_name->menu_sname . '</a>';
                        endforeach;
                    }
                    echo '</div>
                      </div>
                        </li>';

                endforeach;
                ?>

            </ul>


            <ul class=" nav navbar-nav navbar-left">
                <li>
                    <a class="navbar-brand" href="<?= base_url('user/login') ?>"><i class="far fa-user-circle fa-lg
                        text-white"></i>Login</a>
                </li>
            </ul>

        </div>
    </nav>
    <style>
    .dropbtn {
        background-color: #04AA6D;
        color: white;
        padding: 2px;
        font-size: 6px;
        border: none;
    }

    /* The container <div> - needed to position the dropdown content */
    /* .dropdown {
        position: relative;
        display: inline-block;
    } */

    /* Dropdown Content (Hidden by Default) */
    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #252b30;
        min-width: 280px;
        /* box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2); */
        z-index: 1;
    }

    /* Links inside the dropdown */
    .dropdown-content a {
        color: white;
        padding: 12px 16px;
        font-size: 18px;
        text-decoration: none;
        display: block;
    }

    /* Change color of dropdown links on hover */
    .dropdown-content a:hover {
        background-color: #ddd;
    }

    /* Show the dropdown menu on hover */
    .dropdown:hover .dropdown-content {
        display: block;
    }

    /* Change the background color of the dropdown button when the dropdown content is shown */
    .dropdown:hover .dropbtn {
        background-color: #3e8e41;
    }
    </style>
    <!-- <script>
    $(document).ready(function() {
        $('li').click(function() {
            $('li').css("font", "red");
        });
    });
    </script> -->