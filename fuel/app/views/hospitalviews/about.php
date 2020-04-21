<?php
echo Asset::img("logo.png", array("alt" => "RJS Solutions logo", "class" => "center"));
echo Asset::img("Justin.jpg", array("alt" => "Justin Daniels", "class" => "center"));
?>

<p>This is our team: Raghad Alowairdhi, Justin Daniels, and Sara Williams.</p>

<div class="card">
 <?php echo Asset::img("Justin.jpg", array("alt" => "Justin Daniels", "class" => "center")); ?>
  <div class="container">
    <h4><b>Justin Daniels</b></h4>
    <p>About Justin</p>
  </div>
</div>

<div class="card">
  <img src="Justin.jpg" alt="Justin Daniels" style="width:100%">
  <div class="container">
    <h4><b>Justin Daniels</b></h4>
    <p>About Justin</p>
  </div>
</div>
