
<?php echo Asset::css("about.css"); ?>


  <!--<p>This is our team: Raghad Alowairdhi, Justin Daniels, and Sara Williams.</p>
  <div class="card">
  <?php //echo Asset::img("Justin.jpg", array("alt" => "Justin Daniels", "class" => "center")); ?>
    <div class="container">
      <h4><b>Justin Daniels</b></h4>
      <p>About Justin</p>
    </div>
  </div>

  <div class="card">
    <?php //echo Asset::img("sara.jpg", array("alt" => "Sara Williams", "class" => "center")); ?>
    <div class="container">
      <h4><b>Sara Williams</b></h4>
      <p>Sara is a junior at CSU getting her 2nd bachelor's degree in Applied Computing Technology.
      In her free time, she likes to knit, play video games, and read. She hopes to work as a web developer
      after graduation.</p>
    </div>
  </div>

  <div class="card">
    <?php //echo Asset::img("raghd.jpg", array("alt" => "Raghd Alowairdhi", "class" => "center")); ?>
    <div class="container">
      <h4><b>Raghd Alowairdhi</b></h4>
      <p>About Raghd</p>
    </div>
  </div>
  <p> Test</p>-->

  <div class="about-section">
  <h1>About Us Page</h1>
  <p>Some text about who we are and what we do.</p>
  <p>Resize the browser window to see that this page is responsive by the way.</p>
</div>

<h2 style="text-align:center">Our Team</h2>
<div class="row">
  <div class="column">
    <div class="card">
      <?php echo Asset::img("Justin.jpg", array("alt" => "Justin Daniels", "class" => "center")); ?>
      <div class="container">
        <h2>Justin</h2>
        <p class="title">CEO & Founder</p>
        <p>Some text that describes me lorem ipsum ipsum lorem.</p>
        <p>jane@example.com</p>
        <p><button class="button">Contact</button></p>
      </div>
    </div>
  </div>

  <div class="column">
    <div class="card">
    <?php echo Asset::img("sara.jpg", array("alt" => "Sara Williams", "class" => "center")); ?>
      <div class="container">
        <h2>Sara</h2>
        <p class="title">Art Director</p>
        <p>Some text that describes me lorem ipsum ipsum lorem.</p>
        <p>mike@example.com</p>
        <p><button class="button">Contact</button></p>
      </div>
    </div>
  </div>

  <div class="column">
    <div class="card">
    <?php echo Asset::img("raghd.jpg", array("alt" => "Raghd Alowairdhi", "class" => "center")); ?>
      <div class="container">
        <h2>Raghd</h2>
        <p class="title">Designer</p>
        <p>Some text that describes me lorem ipsum ipsum lorem.</p>
        <p>john@example.com</p>
        <p><button class="button">Contact</button></p>
      </div>
    </div>
  </div>
</div>


