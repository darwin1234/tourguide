<html>
<head>
	<title>Tourguide</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-">
	<meta name="viewport" content="viewport-fit=cover, width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="<?php echo base_url();?>resources/map/leaflet.css" rel="stylesheet">
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.3/dist/leaflet.css" />
	<script src="https://unpkg.com/leaflet@1.0.3/dist/leaflet.js"></script>

	<script src="https://cdn.bootcss.com/proj4js/2.4.3/proj4.js"></script>
	<script src="https://cdn.bootcss.com/proj4leaflet/1.0.1/proj4leaflet.min.js"></script>
	<script src="<?php echo base_url();?>resources/map/leaflet-text-icon.js"></script>
	<link href="<?php echo base_url();?>resources/map/map.css" rel="stylesheet">
	<link href="<?php echo base_url();?>resources/css/frontpage.css" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
	<link rel="stylesheet" href="<?php echo base_url();?>resources/tinyslider/css/prism.css">
  <link rel="stylesheet" href="<?php echo base_url();?>resources/tinyslider/css/tiny-slider.css">
  <link rel="stylesheet" href="<?php echo base_url();?>resources/tinyslider/css/styles.css"><!--[if (IE 8)&!(IEMobile)]><script src="../dist/tiny-slider.helper.ie8.js"></script><![endif]-->
	<link rel="stylesheet" href="<?php echo base_url();?>resources/map/leaflet-text-icon.css" />
	<link rel="stylesheet" href="<?php echo base_url();?>resources/map/style.css" />


	<script src="<?php echo base_url();?>resources/map/tileLayer.baidu.js"></script>

</head>
<body>
	<div id="menu">
		<div class="cs logo">
		</div>
		<div class="cs search">
			<form>
				<input id="searchText" type="text" name="search" placeholder="Search">
				<a href="#" id="opensearch"><i class="fas fa-search" style="float:right; color: #fff; font-size: 29px; text-align: center; display: block; line-height: 30px;"></i></a>
			</form>
		</div>
		<div class="menuwrap cs ">

			<a href="#" id="mainmenu">
				<span class="dd"></span>
				<span class="dd"></span>
				<span class="dd"></span>
				<span class="dd"></span>
			</a>

		</div>
			<div id="menulists" style="display:none; background:#fff; margin-top:45px; width:100%; overflow:auto;">
					<ul class="mymenu">
						<li><a href="<?php echo base_url(); ?>front/myaccount">My Account</a></li>
						<li><a href="<?php echo base_url(); ?>login">Login</a></li>
						<li><a href="#">My Lists</a></li>
					</ul>

			</div>
			<div id="hint"></div>
	</div>
	<div id="details" class="notification-container dismiss" style="z-index:111111111111;"></div>
	<div id="directions"></div>
	<div id="map"></div>
	<div id="listings"><div id="lists"></div></div>
	<div id="categories">
	<div class="slider-container">
		<div id="base_wrapper">
			<div class="base" id="base">
			  <div class="item">
				<div class="img img-1">
				  <a href="#" class="nearby" onclick="nearby()"><i class="fas fa-hiking"></i></a>
				</div>

			  </div>
			  <div class="item">
				<div class="img img-2">
				  <a href="#" class="nearby"  onclick="nearby()"><i class="fas fa-parking"></i></a>
				</div>

			  </div>
			  <div class="item">
				<div class="img img-3">
				  <a href="#" class="nearby"  onclick="nearby()"><i class="fas fa-shopping-basket"></i></a>
				</div>

			  </div>
			  <div class="item">
				<div class="img img-4">
				  <a href="#" class="nearby"   onclick="nearby()"><i class="fas fa-hotel"></i></a>
				</div>

			  </div>
			  <div class="item">
				<div class="img img-5">
				  <a href="#" class="nearby"  onclick="nearby()"><i class="fas fa-glass-cheers"></i></a>
				</div>

			  </div>
			  <div class="item">
				<div class="img img-6">
				  <a href="#" class="nearby"  onclick="nearby()"><i class="fas fa-car"></i></a>
				</div>

			  </div>
			  <div class="item">
				<div class="img img-7">
				  <a href="#" class="nearby"  onclick="nearby()"><i class="fas fa-utensils"></i></a>
				</div>

			  </div>
			</div>
		  </div>
	  </div>

	</div>


	<script type="text/javascript">
		var BASEURL = "<?php echo base_url();?>";
	</script>
	<script src="<?php echo base_url();?>resources/map/ajax.js"></script>
	<script src="<?php echo base_url();?>resources/map/map.js"></script>
	<script src="<?php echo base_url();?>resources/tinyslider/js/prism.js"></script>
	<script src="<?php echo base_url();?>resources/tinyslider/js/tiny-slider.js"></script>
	<script src="<?php echo base_url();?>resources/map/category.js"></script>
	<script src="<?php echo base_url();?>resources/map/slideroption.js"></script>
	<script src="<?php echo base_url();?>resources/map/search.js"></script>
	<script src="<?php echo base_url();?>resources/map/loader.js"></script>


</body>
</html>
