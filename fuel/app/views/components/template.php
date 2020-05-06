<!DOCTYPE html>
<html>
<head>
    <meta name="author" content="Raghd Alowairdhi, Justin Daniels, Sara Williams">
    <meta name="description" content="CT310 Hospital IPPS Charge Analysis Software">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php
        if (isset($titlepage)){
            echo $titlepage;
            }
        else {
            echo "Page is under construction";
        }
        ?>
    </title>

    <?php echo Asset::css("main.css"); ?>
</head>

<body>
    <div id="header">
        <img src="<?php echo Asset::img('icon.png'); ?>">
        <!--header image source: https://www.pexels.com/photo/blue-and-silver-stetoscope-40568/ -->
    </div>
    
    <nav>
    <ul>
        <li>
            <?php
            $link = Uri::base() . "index.php/ourhospital/home.php";
            echo "<a href='$link'>Home</a>";
            ?>
        </li>
        <li>
            <?php
            $link = Uri::base() . "index.php/ourhospital/about.php";
            echo "<a href='$link'>About us</a>";
            ?>
        </li>
        <li>
            <?php
            $link = Uri::base() . "index.php/ourhospital/hospital_list.php";
            echo "<a href='$link'>List of Hospitals</a>";
            ?>
        </li>
        <li>
            <?php
            $link = Uri::base() . "index.php/ourhospital/drg_list.php";
            echo "<a href='$link'>List of DRGs</a>";
            ?>
        </li>
    </ul>
    </nav>

        <?php
            if (isset($main_body)){
                echo $main_body;
            }
            else {
                echo "<h1>This page is under construction</h1>";
            }
        ?>
    
    <p>This is a test!</p>
</body>
</html>
