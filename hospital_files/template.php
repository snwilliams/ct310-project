<!DOCTYPE html>
<html>
<head>
    <meta name="author" content="Raghd Alowairdhi, Justin Daniels, Sara Williams">
    <meta name="description" content="CT310 Hospital IPPS Charge Analysis Software">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php
        if(!isset($_SESSION)){
            session_start();
        }
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
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

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
