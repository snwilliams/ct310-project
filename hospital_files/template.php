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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.3/js/jquery.tablesorter.min.js"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <?php
        echo Asset::css("theme.ice.css");
        echo Asset::css("hospitalstyle.css");
    ?>


</head>

<body>
<div>

<?php include "navbar.php"; ?>
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
