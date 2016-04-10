<?php
require("./lib_base.php");
require("./Response.php");
// require './test.php';
$R = new Response();

$faces = detection();
$face_id = $faces[0]["face_id"];
$number = count($faces);
if ($number!=1)
{
	$body = array("username" => "","result" => "Wrong people numbers","msg" => "");
	$body = json_encode($body);
	$R->sendResponse(403,$body,"application/json");
}
else
{
	$username = $_POST["username"];

	$person_id = create_person($username,$face_id);

	add_group($person_id);

	$body = array("username" => $username,"result" => "OK","msg" => "OK");
	$body = json_encode($body);
	$R->sendResponse(200,$body,"application/json");
}

echo $face_id;
echo "<br/>";




?>