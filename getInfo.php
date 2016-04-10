<?php

require("./lib_base.php");
require("./Response.php");

error_reporting(E_ALL ^ E_DEPRECATED);

$username = $_GET["username"];
$db=mysql_connect("localhost", "root","","publicopinion");
$sqlname="publicopinion";
mysql_select_db($sqlname,$db);
mysql_query("SET NAMES 'utf8'",$db);

$sql = "SELECT * FROM user WHRER username = \'".$username."\'";
$result = mysql_query($sql); 
$rs= mysql_fetch_array($result);

$R = new Response();

if ($rs == FALSE)
{
	$body = array("marks" => "","result" => "Wrong","msg" => "No_This_Person");
	$body = json_encode($body);
	$R->sendResponse(403,$body,"application/json");
}
else
{
	$body = array("marks" => $rs["marks"],"result" => "OK","msg" => "GET_MARKS");
	$body = json_encode($body);
	$R->sendResponse(200,$body,"application/json");			
}
var_dump($rs);

?>