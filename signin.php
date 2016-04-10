<?php

require("./lib_base.php");
require("./Response.php");
// require './test.php';

$faces = detection();
$face_id = $faces[0]["face_id"];
$info = identy($face_id);
$R = new Response();
if (!isset($info["candidates"][0]["name"]))
{
	$body = array("username" => "","result" => "No_Match","msg" => "");
	$body = json_encode($body);
	$R->sendResponse(403,$body,"application/json");
}
else
{
	$username = $info["candidates"][0]["name"];
	$body = array("username" => $username,"result" => "OK");
	$body = json_encode($body);
	$R->sendResponse(200,$body,"application/json");	
}

?>