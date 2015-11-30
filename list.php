<?php


	include 'connect.inc.php';


	$query = "SELECT * FROM main ORDER BY counter DESC";
	$result = mysql_query($query);
	$num = mysql_num_rows($result);

	echo "<head>
			<style>

				a:active{
					color:#15c;
				}
				a:visited{
					color:#15c;
				}
				a:hover{
					color:#15c;
				}
				a:unvisited{
					color:#15c;
				}
				td{
					background:white;
					box-shadow:0px 0px 1px grey;
				}
				#logo{
					width:960px;
					margin:20px auto;
					background:#eeeeee;
					box-shadow:0px 0px 2px black;
				}
				#one{
					font: italic 75px chiller;
					font-weight: bold;
					color: #a64b00;
				}
				#two{
					font:bold 30px jokerman;
					color: black;
					position: relative;
					top: -10px;
					left:5px;
				}
				#goback{
					margin-left:460px;
					position:relative;
					top:-10px;
					padding:6px;
					background:#07B3D3;
				}
				#goback a:active{
					color:white;
				}
				#goback a:visited{
					color:white;
				}
				#goback a:hover{
					color:white;
				}
				#goback a:unvisited{
					color:white;
				}
				#footer{
					text-align: center;
					width: 940px;
					min-width: 400px;
					margin: 80px auto;
					margin-bottom:30px;
					border-top: 1px solid grey;
					padding:10px;
				}
				#social{
					margin-left: 460px;
				}

			</style>
		  </head>";

	echo "<div id='logo'>
				<p>
					<span id='one'>URL</span>
					<span id='two'>short.en.er</span>
					<span id='goback'><a href='index.php'>Click here to go back to home</a></span>
				</p>
			</div>";


	echo "<table cellpadding='10' style='width:960px;margin:40px auto;text-align:left;font-family:arial,sans-serif;font-size:13px;''>";
	echo "<tr>
			<th>LONG URL</th>
			<th>CREATED</th>
			<th>SHORT URL</th>
			<th>CLICKS</th>
		  </tr>";

	for ($i=0; $i < $num; $i++) { 
		
		$row = mysql_fetch_row($result);

		$timediff = getTimediff($row[3]);


		echo "<tr>
				<td><a href='$row[1]'>$row[1]</a></td>
				<td>$timediff</td>
				<td><a href='http://foo.bl.ee/$row[2]'>http://foo.bl.ee/$row[2]</a></td>
				<td>$row[4]</td>
			  </tr>";
	}





?>


