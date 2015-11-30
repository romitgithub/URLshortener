<?php

	include 'connect.inc.php';

	if (isset($_GET['shortcode'])) {
		$shortcode = $_GET['shortcode'];

		$query = "SELECT long_url FROM main WHERE short_code='$shortcode'";
		$result = mysql_query($query);
		$num = mysql_num_rows($result);

		if($num==1){

			$row = mysql_fetch_row($result);
			$longurl = $row[0];

			$update = "UPDATE main SET counter = counter+1 WHERE short_code='$shortcode'";
			mysql_query($update);

			header( "Location: $longurl" ) ;

		}
	}


?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-43364785-3', 'bl.ee');
  ga('send', 'pageview');

</script>