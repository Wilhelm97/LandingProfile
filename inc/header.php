<?php  // Might not need it but its still good have
require_once('./config/_conn.php');
session_start();
// if (!isset($_SESSION['username'])) {
//     header("location: signin.php");
// }
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="./style/main.css" type="text/css">
        <title>Landing Profile</title>

    </head>

    <body onload=timeDate();>
        <nav class="navbar navbar-expand-sm bg-light">
            <!-- Toggler/collapsibe Button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navBar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- add users name when logged in on the far left corner -->
            <div class="collapse navbar-collapse" id="navBar">
                <a class="navbar-brand" href="profile">Users Name</a>

                <ul class="navbar-nav">
                    <li class="nav-item">
                        <!-- https://www.youtube.com/favicon.ico -->
                        <a class="nav-link" href="https://www.youtube.com/">Youtube</a>
                    </li>
                    <li class="nav-item">
                        <!-- https://www.google.com/favicon.ico -->
                        <a class="nav-link" href="https://www.google.ca/">Google</a>
                    </li>
                    <li class="nav-item">
                        <!-- https://github.com/favicon.ico -->
                        <a class="nav-link" href="https://github.com/">Github/a>
                    </li>
                </ul>
            </div>
            <?php
        require_once('./config/_conn.php');
        if (!isset($_SESSION['username'])) {
            echo '

        <div class="navbar-nav" id="Navbar">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="signup">Signup</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="signin">Login</a>
            </li>
        </ul>
    </div>
</nav>

        ';
        } elseif (isset($_SESSION['username'])) {

            echo '
            <div class="navbar-nav" id="Navbar" >
            <ul class="navbar-nav">
            <li class="nav-item">
            <a class="nav-link" href="blog">Blog</a>
        </li>
                <li class="nav-item">
                    <a class="nav-link" href="profile">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="signout">Signout</a>
                </li>
            </ul>
        </div>
    </nav>';
        }
        ?>
            <br>
