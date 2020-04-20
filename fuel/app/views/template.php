<head> 
	<title><?php echo $title ?></title>
	<link rel="stylesheet" href="east.css" content="text/css">
	<meta charset="UTF-8">
	<meta name="keywords" content="HTML, CSS, PHP">
	<meta name="description" content="Fuel Template assignment">
	<meta name="author" content=" Sara Williams" >
	
	<?php 
		if (isset($east_or_west_css)) {
			echo Asset::css($east_or_west_css);
		}
	?>
</head>
<body>
		<header><p class="headfoot">EAST OR WEST</p></header>
		<div class="nav">
			<a href="https://cs.colostate.edu:4444/~soraiku/ct310/fuelviews/index/eastwest/index">HOME</a>
			<a href="https://cs.colostate.edu:4444/~soraiku/ct310/fuelviews/index/eastwest/east">EAST</a>
			<a href="https://cs.colostate.edu:4444/~soraiku/ct310/fuelviews/index/eastwest/west">WEST</a>
		</div>
		<div class="content">
			<?php echo $content ?>
		</div>
		<footer class="right"><p class="headfoot">&copy; Sara Williams 2020</p></footer>
	</body>