<html>
<head>
	<title>Welcome <?php echo $myprofile['username']; ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-">
	<meta name="viewport" content="viewport-fit=cover, width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="<?php echo base_url();?>resources/css/frontpage.css" rel="stylesheet">
	<style>
	body{margin:0; padding:0;}
	.mymenu{width:100%;}
	.mymenu li{width:100%!important; padding-left:20px; border-bottom:1px solid #ccc; text-align:left!important;}
	.mymenu li a{color:#000!important; text-align:left!important;}
	#menu{position:fixed; top:0; height:45px; width:100%; background:#000;}
	.menuwrap{width:50px!important;  float:right!important; margin-top:15px; overflow:auto; }
	.menuwrap .dd{margin:0 auto; font-size:12px; clear:both; margin-top:4px; background: #fff; padding: 2px; width: 30px; display: block;}
	.cs{float:left; width:33.3%; width: 33.3%; margin-top:5px; height:40px;}
	.logo{width: 75%!important;}
	.search{width: 40px!important;}
	.myaccountbody{width:100%; clear:both; margin-top:100px; padding:10px;}
	</style>
<body>
	<div id="menu">
		<div class="cs logo">
		</div>
		<div class="cs search">
			<i class="fas fa-search" style="color: #fff; font-size: 20px; text-align: center; display: block; line-height: 34px"></i>
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
						<li><a href="#">My Account</a></li>
						<li><a href="#">Login</a></li>
						<li><a href="#">My Lists</a></li>
					</ul>

			</div>
	</div>
	<header style="background:url('http://www.bates.edu/wordpress/files/2016/07/pattern1.jpg') top center; background-size:cover; height:200px; margin-top:45px; width:100%; padding:0;" >
				<a href="<?php echo base_url();?>" style="width:100px; float:left; padding:10px; background:#008AEE; color:#fff; text-align:center; text-decoration:none; ">Home</a>

			<a href="<?php echo base_url();?>administrator/logout" style="width:100px; float:right; padding:10px; background:#008AEE; color:#fff; text-align:center; text-decoration:none; ">Logout</a>

			<img src="<?php echo base_url(); ?>administrator/userimage2/<?php echo $myprofile['id'];?>" style="clear:both; border-radius: 30px; margin: -4px auto; width: 125px; height: 125px; display: block; padding-top: 120px; ">
			<h4 style="text-align:center;"><?php echo $myprofile['firstname']; ?>&nbsp;<?php echo $myprofile['lastname']; ?></h4>
	</header>
	<div class="myaccountbody">
		<h4><strong>Gender: &nbsp;</strong><?php echo $myprofile['gender']; ?></h4>
	</div>
<script>
var myaccount = {
	mainmenu: function(){
		var count = 0;
		mainmenu.addEventListener("touchstart", function(e){
			count++;
			if(count ==1 ){
				menulists.style.display="block";
				count = -1;
			}else{
				menulists.style.display="none";
				count = 0;
			}

			e.preventDefault();
		});

	}

};
window.load = function(){
	myaccount.mainmenu();
}

</script>
</body>
</html>
