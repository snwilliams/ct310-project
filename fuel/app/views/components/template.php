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
    <link rel="stylesheet" 
    href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" 
    crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" 
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" 
    crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" 
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" 
    crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" 
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" 
    crossorigin="anonymous"></script>

    <?php echo Asset::css("main.css"); ?>
    <?php echo Asset::js('table-sorter/jquery.tablesorter.js')?>

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
