<!DOCTYPE html>

<head>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title><?php echo $name; ?></title>
	<meta name="description" content='<?php echo $description; ?>'>
    <meta name="Keywords" content='<?php echo $keywords; ?>'>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>extra/css/basic_html.css">
    
    <!-- code for google analytics -->
    <!-- start here -->
    
    <script type="text/javascript">

		var _gaq = _gaq || [];
		_gaq.push(['_setAccount', 'UA-38059226-1']);
		_gaq.push(['_setDomainName', 'takemytest.co.in']);
		_gaq.push(['_trackPageview']);

		(function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		})();

	</script>

	<!-- end here -->
    
</head>

<body>

	<header>
		<div id="black_header"></div>
		<div id="blue_header">
			<div class="container">
				<div id="blue_header_left">
					<a rel="nofollow" href="<?php echo base_url() ?>" style="text-decoration: none;">
						<img src="<?php echo base_url() ?>extra/image/logggooo.png" alt="TakeMytest: Online Aptitude Center" height="65px" width="180px" style="margin-left:25px">
					</a>
				</div>
				<div id="blue_header_right">
					<span style='float:right; color: white; margin-right: 25px; font-size: 15px; margin-top: 25px;'>
						<a href='<?php echo base_url() ?>index.php/takemytest/how_it_works' style='color:white; margin-right: 25px;'>HOW IT WORKS </a>
						<a href='<?php echo base_url() ?>index.php/takemytest/courses' style='color:white; margin-right: 25px;'>COURSES</a>
						<a href='<?php echo base_url() ?>' style='color:white; margin-right: 25px;'>HOME</a>
					</span>
				</div>
			</div>
		</div>
	</header>
	<div id="html_body">
		<div class="container" style="background-color:white">
			<div class="container_block">
				<!--[if IE]>
				<div class="div">
				<![endif]-->
				<article>
					<?php echo $article; ?>

				</article>
				<!--[if IE]>
				</div>
				<![endif]-->
				<!--[if IE]>
				<div class="div">
				<![endif]-->
				<footer>
					<br />
					<br />
					<hr/>
					<div id="footer_left" style="font-size:14px;">
						<a href="<?php echo base_url(); ?>index.php/takemytest/about_us" style="text-decoration:none;color:#4D4D4D;cursor:pointer;">ABOUT US </a> |
						<a href="<?php echo base_url(); ?>index.php/takemytest/faq" style="text-decoration:none;color:#4D4D4D;cursor:pointer;"> FAQ </a> |
						<a href="<?php echo base_url(); ?>index.php/takemytest/suggestion_box" style="text-decoration:none;color:#4D4D4D;cursor:pointer;"> SUGGESTION BOX </a>
						<br />
						Page rendered in <strong>{elapsed_time}</strong> seconds
					</div>
					<div id="footer_right" style="font-size:14px;">
						&copy;2013 TakeMyTest, except where noted, all rights reserved.
						<br />
						<span style="float:right">
							<a href="<?php echo base_url(); ?>index.php/takemytest/terms" style="text-decoration:none;color:#191919;cursor:pointer;"> Terms of Services </a> - 
							<a href="<?php echo base_url(); ?>index.php/takemytest/privacy_policy" style="text-decoration:none;color:#191919;cursor:pointer;"> Privacy Policy </a>
						</span>
					</div>
				</footer>
				<!--[if IE]>
				</div>
				<![endif]-->
			</div>
		</div>
	</div>
		

</body>