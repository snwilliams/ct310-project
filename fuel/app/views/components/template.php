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
    <?php echo Asset::js('table-sorter/jquery.tablesorter.js')?>
    <?php //echo Asset::css('table-sorter/theme.default.css') ?>
    <?php //echo Asset::css('table-sorter/theme.dark.css') ?>

    <?php echo Asset::js('template.js'); ?>
</head>

<body>
    <div id="header">
        <?php
            echo Asset::img("logo.png", array("alt" => "RJS Solutions logo", "class" => "center"));
        ?>
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
    <div class="main">

        <?php
            if (isset($main_body)){
                echo $main_body;
            }
            else {
                echo "<h1>This page is under construction</h1>";
            }
        ?>
    </div>
    
</body>
</html>
