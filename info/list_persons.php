<meta charset="utf-8">
<?php
require_once '../lib_base.php';
 $testurl = 'https://v1-api.visioncloudapi.com/info/list_persons?api_id='.api_id.'&api_secret='.api_secret;
 // var_dump($testurl);
 $ch = curl($testurl); 
 $output = curl_exec( $ch); 
 var_dump( $output); 
 $output_array = json_decode( $output, true);
 curl_close( $ch);
?>