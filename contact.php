<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>

	<!-- Basic Page Needs
  ================================================== -->
	<meta charset="utf-8">
	<title>DragonFlySoft - Mobile Design and Development</title>
	<meta name="description" content="DragonFlySoft is a mobile design and development firm">
	<meta name="author" content="Paul Edler" >
	
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- Mobile Specific Metas
  ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- CSS
  ================================================== -->
	<link rel="stylesheet" href="css/base.css">
	<link rel="stylesheet" href="css/skeleton.css">
	<link rel="stylesheet" href="css/layout.css">
	<link rel="stylesheet" href="css/style.css">

	<!-- Favicons
	================================================== -->
	<link rel="shortcut icon" href="images/favicon.ico">
	<link rel="apple-touch-icon" href="images/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
	
	<!-- reCaptcha
	================================================== -->
	<script type= "text/javascript">
		var RecaptchaOptions = {
		theme: 'clean'
		};
	</script>

</head>
<body>



	<!-- Primary Page Layout
	================================================== -->

	<!-- container -->

	<div class="container">
		
		<!-- Top header start -->		
		
		<header>
			<div class="five columns">
				<img id="logo" src="images/mLogo.png" alt="DragonFlySoft">
			</div>
			<nav class="eleven columns">
				<ul>
					<li><a href="index.html">Home</a></li>
					<li><a href="webDesign.html">Web Design</a></li>
<!--					<li><a href="Apps.html">Apps</a></li>
					<li><a href="portfolio.html">Portfolio</a></li>
					<li><a href="blog.html">Blog</a></li>
					<li><a href="bookReviews.html">Book Reviews</a></li>		-->
					<li><a href="contact.php">Contact</a></li>			
				</ul>
			</nav>
		</header>
		
		<!-- Top header end -->
		
		<!-- Main body begin -->
		
		<hr class="large">
		
		<h1>Contact Us</h1>
		
		<form method="post" action="contact.php">
			<label>Name:</label>
			<input name ="name" type="name" placeholder="Hello my name is...">
			
			<label>Email:</label>
			<input name ="email" type="email" placeholder="yourname@host.com">
			
			<label>Website:</label>
			<input name ="website" type="text" placeholder="www.your.site.com">
			
			<label>Additional Information:</label>
			<textarea name="message" placeholder="Please feel free to elaborate."></textarea>
			
			<?php

			require_once('recaptchalib.php');

			// Get a key from https://www.google.com/recaptcha/admin/create
			$publickey = "6LeqWfMSAAAAABxDtseVpyzmwJPNlYjktTn6VFu6";
			$privatekey = "6LeqWfMSAAAAAD1OJRV44xz13ZarsRZ4DBxFnz6j";

			# the response from reCAPTCHA
			$resp = null;
			# the error code from reCAPTCHA, if any
			$error = null;

			# was there a reCAPTCHA response?
			if ($_POST["recaptcha_response_field"]) {
   	     $resp = recaptcha_check_answer ($privatekey,
   	                                     $_SERVER["REMOTE_ADDR"],
   	                                     $_POST["recaptcha_challenge_field"],
   	                                     $_POST["recaptcha_response_field"]);

				if ($resp->is_valid) {
    	    		$to = "kagerou@dragonflysoft.biz";
					$subject = "Contact Us submission";
 
					// data the visitor provided
					$name_field = filter_var($_POST["name"], FILTER_SANITIZE_STRING);
					$email_field = filter_var($_POST["email"], FILTER_VALIDATE_EMAIL);
					$website_field = filter_var($_POST["website"], FILTER_SANITIZE_STRING);
					$message = filter_var($_POST["message"], FILTER_SANITIZE_STRING);
 
					//constructing the message
					$body = " From: $name_field\n\n E-Mail: $email_field\n\n Website: $website_field\n\n Message:\n\n $message";
 
  					// ...and away we go!
					mail($to, $subject, $body);
			
					header("location: confirmation.html");
				} else {
         	       # set the error code so that we can display it
        	        $error = $resp->error;
        	        header("location: resubmit.html");
				}
			}
		echo recaptcha_get_html($publickey, $error);
	?>
			<input id="submit" type="submit" name="submit" value="submit">
			<input id="reset" type="reset" name="reset" value="reset">
		</form>
		
		<!-- Main body end -->
		
		<!-- Footer begin -->
		
		<footer class="sixteen columns">
			<a href="https://plus.google.com/u/0/107285432581608261105/"><img src="images/google_plus.png" alt="g+"></a>
			<a href="https://www.facebook.com/pages/Dragonflysoft/768209179891085"><img src="images/facebook.png" alt="Facebook"></a>
			<a href="https://twitter.com/DragonFlySoft1"><img src="images/twitter.png" alt=""></a>
			<p>&copy DragonFlySoft, 2014</p>
		</footer>
		
		<!-- Footer ends -->
		
	</div>
	
	<!-- container -->
	
<!-- End Document
================================================== -->
</body>
</html>