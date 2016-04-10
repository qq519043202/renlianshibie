<meta charset="utf-8">
<?php     
require_once '../lib_base.php'; 
$testurl = 'https://v1-api.visioncloudapi.com/info/api?api_id=8e29131378c048988ba50d8d3cdb2ff0&api_secret=c03040f7abcb494ea5d4c60a28bbabe5';      
$ch = curl($testurl);
$output = curl_exec($ch);     
var_dump($output);       
$output_array = json_decode($output,true);

if(curl_errno($ch))
{
	echo curl_error($ch);
}


curl_close($ch);  ?>