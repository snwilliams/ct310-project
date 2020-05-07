
<?php echo Asset::css("about.css"); ?>

<h2 style="text-align:center">The RJS Solutions Team</h2>
<div class="row">
  <div class="column">
    <div class="card">
      <div class="image"><?php echo Asset::img("Justin.jpg", array("alt" => "Justin Daniels", "class" => "center")); ?></div>
      <div class="container">
        <h2>Justin</h2>
        <p class="title">Colorado State University, </p>
        <p>Some text that describes me lorem ipsum ipsum lorem.</p>
        <p></p>
        <p><button class="button" onclick="location.href='sara.williams.n@gmail.com';">Contact</button></p>
      </div>
    </div>
  </div>

  <div class="column">
    <div class="card">
    <div class="image"><?php echo Asset::img("sara.jpg", array("alt" => "Sara Williams", "class" => "center")); ?></div>
      <div class="container">
        <h2>Sara Williams</h2>
        <p class="title">Colorado State University, 2021</p>
        <p>
          Sara is a junior at CSU, pursuing a degree in Applied Computing Technology. 
          In her spare time, she likes to knit, play video games, and read.
          She hopes to work as a web developer after graduation. 
        </p>
        <p>sara.williams.n@gmail.com</p>
        <p><button class="button">Contact</button></p>
      </div>
    </div>
  </div>

  <div class="column">
    <div class="card">
    <div class="image"><?php echo Asset::img("raghd.jpg", array("alt" => "Raghd Alowairdhi", "class" => "center")); ?></div>
      <div class="container">
        <h2>Raghd</h2>
        <p class="title">Colorado State University, </p>
        <p>Some text that describes me lorem ipsum ipsum lorem.</p>
        <p>raghd@example.com</p>
        <p><button class="button">Contact</button></p>
      </div>
    </div>
  </div>
</div>


