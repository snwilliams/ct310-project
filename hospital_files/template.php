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
<!--    --><?php
//    echo Asset::js('jquery.tablesorter.js');
//    echo Asset::js('jquery.tablesorter.widgets.js');
//    echo Asset::js('widget-alignChar.js');
//    echo Asset::js('widget-build-table.js');
//    echo Asset::js('widget-columnSelector.js');
//    echo Asset::js('widget-cssStickyHeaders.js');
//    echo Asset::js('widget-editable.js');
//    echo Asset::js('widget-grouping.js');
//    echo Asset::js('widget-headerTitles.js');
//    echo Asset::js('widget-math.js');
//    echo Asset::js('widget-output.js');
//    echo Asset::js('widget-pager.js');
//    echo Asset::js('widget-print.js');
//    echo Asset::js('widget-reflow.js');
//    echo Asset::js('widget-repeatheaders.js');
//    echo Asset::js('widget-scroller.js');
//    echo Asset::js('widget-staticRow.js');
//    ?>
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
