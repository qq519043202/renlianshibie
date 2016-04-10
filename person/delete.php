
<meta charset="utf-8">
<?php
require_once '../lib_base.php';

$pid = '7de0c377d43c4bb89fd581cf3c48903c';
 $testurl = 'https://v1-api.visioncloudapi.com/person/delete?api_id='.api_id.'&api_secret='.api_secret.'&person_id='.$pid;
 var_dump($testurl);
 $ch = curl($testurl); 

 $output = curl_exec( $ch); 
 var_dump( $output); 
 $output_array = json_decode( $output, true);
 curl_close( $ch);
?>