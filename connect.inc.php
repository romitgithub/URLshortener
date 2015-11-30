<?php

$mysql_host = "mysql.hostinger.in";
$mysql_user = "u936162527_short";
$mysql_pass = "keepitshort";

$mysql_db = "u936162527_short";

mysql_connect($mysql_host,$mysql_user,$mysql_pass) or die("Could not connect to MySQL : ".mysql_error());
mysql_select_db($mysql_db) or die("Could not connect to Database : ".mysql_error());


function validateUrlFormat($url){

	return filter_var($url, FILTER_VALIDATE_URL);
}

function checkUrlExists($url){

	$ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_NOBODY, true);
    curl_setopt($ch,  CURLOPT_RETURNTRANSFER, true);
    curl_exec($ch);
    $response = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
 
    return (!empty($response) && $response != 404);
}

function urlExistsinDB($url){

	$query = "SELECT * FROM main WHERE long_url = '$url'";
	$result = mysql_query($query);
	$num = mysql_num_rows($result);

	if ($num == 0) {
		return false;
	}
	else{
		$row = mysql_fetch_row($result);
		return 'http://foo.bl.ee/'.$row[2];
	}
}

function createShortCode($url){

	$characters = "LZXCVBNMqwert12789QWERTYUIOPASDFGHJKyuiop3456lkjhgfdsazxcvbnm";

	$shortcode = "";

	$time = time();

	$queryINS = "INSERT INTO main VALUES('','$url','','$time','0')";
	mysql_query($queryINS);
	$id = mysql_insert_id();
	
	$iid = $id;

	$digits = array();

	while ($iid > 0) {
		
		$remainder = ($iid % 61);
		array_push($digits, $remainder);
		$iid = intval($iid/61);
	}


	for ($i=0; $i < count($digits); $i++) { 
		
		$index = $digits[$i];
		$shortcode.=$characters[$index];
	}

	$short_url = $shortcode;

	$finalQuery = "UPDATE main SET short_code='$short_url' WHERE id='$id'";
	mysql_query($finalQuery);

	$finalurl = "http://foo.bl.ee/$short_url";

	return $finalurl;

}
function getTimediff($timethen){

	$timenow = time();
	$timediff = $timenow - $timethen;
	
	
	$epoch = $timethen; 
	$date = date('d/m/y',$timethen);
	
	
	if($timediff < 60){
		if($timediff==1){
			
			$result = $timediff." second ago";
			return $result;
		}
		else{
			return $timediff." seconds ago";
		}
		}
		elseif($timediff < 3600){
			if((int)($timediff/60)==1){
				
				return (int)($timediff/60)." minute ago";
			}
			else{
			
				return (int)($timediff/60)." minutes ago";
			}
		}
		elseif($timediff < 86400){
			if((int)($timediff/3600)==1){
			
				return (int)($timediff/3600)." hour ago";
			}
			else{
				return (int)($timediff/3600)." hours ago";
			}
		}
		elseif($timediff < 259200){
			if((int)($timediff/86400)==1){
			
				return (int)($timediff/86400)." day ago";
			}
			else{
				return (int)($timediff/86400)." days ago";
			}
		}
		else{
			return "on $date";
		}
		
}

?>