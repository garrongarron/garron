<!DOCTYPE html>
<html lang="en-US">
<head>
	<base href="<?php echo env('APP_URL', 'http://localhost') ?>">
	<!-- Meta tag -->
		<meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
		<meta name="description" content="">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Meta tag google site verification-->    
        <meta name="google-site-verification" content="_j9Odvd7R5lCOb7_w48wcP3yy-2z2vQIQ8FOnrxOZ50" />
        <link rel="shortcut icon" type="image/png" href="/favicon.png"/>
        <meta name="csrf-token" content="{{ csrf_token() }}">	
	<title>Garron Consulting Group</title>
	<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-121976976-1"></script>
		<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());
		  gtag('config', 'UA-121976976-1');
		</script>
	
		<style type="text/css">
img.wp-smiley,
img.emoji {
	display: inline !important;
	border: none !important;
	box-shadow: none !important;
	height: 1em !important;
	width: 1em !important;
	margin: 0 .07em !important;
	vertical-align: -0.1em !important;
	background: none !important;
	padding: 0 !important;
}
</style>
<link rel='stylesheet' id='google-fonts-css'  href='css/font.css' type='text/css' media='all' />
<link rel='stylesheet' id='hover-css'  href='css/hover.css?ver=4.9.5' type='text/css' media='all' />
<link rel='stylesheet' id='font-awesome-css'  href='css/font-awesome.css?ver=4.9.5' type='text/css' media='all' />
<link rel='stylesheet' id='slicknav-css'  href='css/slicknav.css?ver=4.9.5' type='text/css' media='all' />
<link rel='stylesheet' id='owl-theme-default-css'  href='css/owl.theme.default.css?ver=4.9.5' type='text/css' media='all' />
<link rel='stylesheet' id='owl-css'  href='css/owl.carousel.css?ver=4.9.5' type='text/css' media='all' />
<link rel='stylesheet' id='magnific-popup-css'  href='css/magnific-popup.css?ver=4.9.5' type='text/css' media='all' />
<link rel='stylesheet' id='animate-css'  href='css/animate.css?ver=4.9.5' type='text/css' media='all' />
<link rel='stylesheet' id='bootstrap-css'  href='css/bootstrap.css?ver=4.9.5' type='text/css' media='all' />
<link rel='stylesheet' id='agency-x-style-css'  href='css/style.css?ver=4.9.5' type='text/css' media='all' />
<link rel='stylesheet' id='default-css'  href='css/default.css?ver=4.9.5' type='text/css' media='all' />
<link rel='stylesheet' id='responsive-css'  href='css/responsive.css?ver=4.9.5' type='text/css' media='all' />
<link rel='stylesheet' id='orange-css'  href='css/skin/orange.css?ver=4.9.5' type='text/css' media='all' />
<script type='text/javascript' src='js/jquery/jquery.js?ver=1.12.4'></script>
<script type='text/javascript' src='js/jquery/jquery-migrate.min.js?ver=1.4.1'></script>
<script type='text/javascript' src='js/jquery/jquery-ui.js'></script>
<!--<link rel="canonical" href="https://demo.samuraithemes.com/agency-x/" />
<link rel='shortlink' href='https://demo.samuraithemes.com/agency-x/' />
<link rel="icon" href="https://demo.samuraithemes.com/agency-x/wp-content/uploads/2018/03/cropped-cropped-cropped-logo-black-1-2-1-32x32.png" sizes="32x32" />
<link rel="icon" href="https://demo.samuraithemes.com/agency-x/wp-content/uploads/2018/03/cropped-cropped-cropped-logo-black-1-2-1-192x192.png" sizes="192x192" />
<link rel="apple-touch-icon-precomposed" href="https://demo.samuraithemes.com/agency-x/wp-content/uploads/2018/03/cropped-cropped-cropped-logo-black-1-2-1-180x180.png" />
<meta name="msapplication-TileImage" content="https://demo.samuraithemes.com/agency-x/wp-content/uploads/2018/03/cropped-cropped-cropped-logo-black-1-2-1-270x270.png" />-->
		<style type="text/css" id="wp-custom-css">
			#header .nav li {
			    position:relative;
			    margin-right:2px !important;
			}
			#header .nav li a {
			    padding: 18px 15px;
			}
			.section{
				ddisplay:none;
			}	
		</style>
	</head>

<body class="home">
        @yield('content')
</body>
</html>
