<meta charset="utf-8">
<?php
require_once '../lib_base.php';
define('group_id2', 'da0b3bc8e62445be81750ef109e49b73');

 $testurl = 'https://v1-api.visioncloudapi.com/info/group?api_id='.api_id.'&api_secret='.api_secret.'&group_id='.group_id;
 // var_dump($testurl);
 $ch = curl($testurl); 

 $output = curl_exec( $ch); 
 var_dump( $output); 
 $output_array = json_decode( $output, true);
 curl_close( $ch);
?>