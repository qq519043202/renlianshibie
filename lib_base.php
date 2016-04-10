<?php
define('api_id', "8e29131378c048988ba50d8d3cdb2ff0");
define('api_secret', "c03040f7abcb494ea5d4c60a28bbabe5");
define('group_id', "6734137071004298a558084eccc79624");

function curl($url,$post_data=NULL)
{
	$ch = curl_init();    
    curl_setopt($ch, CURLOPT_URL, $url);    
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    
    if (isset($post_data)) {
    	curl_setopt($ch, CURLOPT_POST,1);
    	curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);  
    }
      
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    return $ch;
}
//判重就不做了
function detection()
{
    $testurl = 'https://v1-api.visioncloudapi.com/face/detection';    

    $filePath = $_FILES['image']['tmp_name'] ; //照片路径
	//$fileContent = new \CURLFile( $filePath);
	$fileContent = '@' . realpath($filePath);

	$post_data = array ( 'api_id' => api_id , 'api_secret' => api_secret ,
		'file' => $fileContent);

	$ch = curl($testurl,$post_data);

	$output = curl_exec( $ch);
	// echo $num;
	//var_dump( $output);
	$output_array = json_decode( $output, true);
	// var_dump($output_array);
	if(curl_errno($ch))
	{
		echo curl_error($ch);
	}
	curl_close($ch);
	$num = count($output_array["faces"]);
	if($num!=1)
	{
		die('many faces or no face');
	}
	else
	{
		return $output_array["faces"];
	}
	
}

function create_person($name,$face_id)
{
	 $testurl = 'https://v1-api.visioncloudapi.com/person/create' ;
	 $post_data = array ( 'api_id' => api_id , 'api_secret' => api_secret , 'name' =>$name ,'face_id' => $face_id);
	 $ch = curl($testurl,$post_data);
	 $output = curl_exec( $ch);
	 // var_dump($output);
	 $output_array = json_decode( $output, true);
	 // var_dump( $output_array); 

	 if(curl_errno($ch))
	{
		echo curl_error($ch);
	}
	curl_close( $ch);
	return $output_array['person_id'];
}

function add_group($person_id)
{
	$testurl = 'https://v1-api.visioncloudapi.com/group/add_person' ;
	 $post_data = array ( 'api_id' => api_id , 'api_secret' => api_secret ,
	 'group_id' =>group_id ,
	 'person_id' =>$person_id );
	$ch = curl($testurl,$post_data);
	 $output = curl_exec( $ch);
	 $output_array = json_decode( $output, true);
	 // var_dump( $output_array); 
	 curl_close( $ch);
}
function identy($face_id)
{
	//identy
	$identyUrl = 'https://v1-api.visioncloudapi.com/face/identification' ;
	$post_data = array ( 'api_id' => api_id , 'api_secret' => api_secret ,
		'face_id' => $face_id ,
	'group_id' =>group_id );
	// echo $_GET["groupId"];
	$ch = curl($identyUrl,$post_data);
	$output = curl_exec( $ch);
	$output_array = json_decode( $output, true);
	return $output_array;
	curl_close( $ch);
}

?>
