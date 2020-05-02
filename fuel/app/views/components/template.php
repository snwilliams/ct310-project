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
    
    <?php echo Asset::css('hospitalstyles/main.css'); ?>
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
    <p>This is a test!</p>
</body>
</html>
