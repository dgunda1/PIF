<?php
//require_once("MobileRestHandler.php");
require_once("ParkingRestHandler.php");

$view = "";
if(isset($_GET["view"]))
	$view = $_GET["view"];
/*
controls the RESTful services
URL mapping
*/
switch($view){

	case "all":
		// to handle REST Url /mobile/list/
		echo "Hello All";
// 		$parkingRestHandler = new ParkingRestHandler();
// 		$parkingRestHandler->getAllMobiles();
		break;
		
	case "single":
		// to handle REST Url /mobile/show/<id>/
		//echo "Hello";
		//echo $_GET["id"];
 		$parkingRestHandler = new ParkingRestHandler();
 		$parkingRestHandler->getParking($_GET["id"]);
		break;
		
	case "update": 
		$parkingRestHandler = new ParkingRestHandler();
		$parkingRestHandler->updateParking($_GET["id"]);
		break;

	case "" :
		//404 - not found;
		break;
}
?>
