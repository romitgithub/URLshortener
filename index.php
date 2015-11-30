<?php


	include_once 'connect.inc.php';



?>
<!DOCTYPE html>
<html lan='en'>
	<head>
		<title>URL Shortener</title>
		<meta name='author' content='Romit Choudhary'>
		<meta http-equiv='cache-control' content='public'>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<meta http-equiv='content-language' content='en-US'>
		<meta name='copyright' content='&copy; 2014 Romit Choudhary'>
		<meta name='description' content='URL shortener converts long url to short url.'>
		<meta name='keywords' content='url shortener, short url, tiny url, small url , long url, big url, convert long url to short url, romits url shortener'>
		<meta name='robots' content='index,follow'>
		<meta property='og:title' content='URL Shortener'>
		<meta property='og:type' content='website'>
		<meta property='og:site_name' content='URL Shortener'>
		<meta property='fb:admins' content='100002095998425'>
		<link rel="stylesheet" type="text/css" href="main.css">
	</head>
	<body>
		<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=460517324050343";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
		<div id='content' align='center'>
			<div id='logo'>
				<p>
					<span id='one'>URL</span>
					<span id='two'>short.en.er</span>
				</p>
			</div>
			<div id='form'>
				<form action='index.php' method='post'>
					<input type='text' name='url' placeholder='Paste Your long URL here'>
					<button name='submitbutton'>
						Shorten URL
					</button>
					<br>
				</form>
			</div>
		</div>

			<span id='encodedurl' align='center'>
		<?php
				

				if (isset($_POST['url'])) {
		
					$url = $_POST['url'];

					if (empty($url)) {
						echo $message = '<p>No url was supplied</p>';
					}
					elseif (validateUrlFormat($url) == false) {
						echo $message = '<p>URL does not have a valid format.</p>';
					}
					elseif (checkUrlExists($url) == false) {
						echo $message = '<p>URL does not appear to exist.</p>';
					}
					elseif (urlExistsinDB($url) == true) {
						$shortcode = urlExistsinDB($url);
						echo $message = "<div id='error' title='Copy this code'>Copy this url to share  -  <b style='font:bold 18px arial;margin-left:5px;color:green;'>$shortcode</b></div>";
					}
					else{
						$shortcode = createShortCode($url);
						echo "<div id='error' title='Copy this code'>Copy this url to share  -  <b style='font:bold 18px arial;margin-left:5px;color:green;'>$shortcode</b></div>";
					}
				}





				?>
			</span>
			<div id='facebook'><div class="fb-facepile" data-href="http://facebook.com/longurl2shorturl" data-width="560" data-max-rows="1" data-colorscheme="light" data-size="medium" data-show-count="true"></div></div>
			<div id='footer'>
				<span id='copy'>Copyright &copy Romit Choudhary 2014</span>
				<span id='social'>
					<a href="https://www.facebook.com/choudharyromit" target='_blank'>Facebook</a>  |  <a href="https://github.com/romitgithub/URL-Shortener" target='_blank'>Github</a>
				</span>
			</div>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-43364785-3', 'bl.ee');
  ga('send', 'pageview');

</script>
	</body>
</html>	
