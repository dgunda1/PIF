<?php
/*
 A domain Class to demonstrate RESTful web services
 */
Class Parking {

	
	private $Parkings = array(
			1 => 'Apple iPhone 6S',
			2 => 'Samsung Galaxy S6',
			3 => 'Apple iPhone 6S Plus',
			4 => 'LG G4',
			5 => 'Samsung Galaxy S6 edge',
			6 => 'OnePlus 2');

	/*
		you should hookup the DAO here
		*/
	public function getAllMobile(){
		return $this->mobiles;
	}

	public function getParking($id){

// 		$mobile = array($id => ($this->mobiles[$id]) ? $this->mobiles[$id] : $this->mobiles[1]);
// 		return $mobile;
	include 'Parking.dbconfig.inc';
	/* check connection */
	$mysqli = new mysqli($hostname,$username, $password,$dbname);
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$sql = "SELECT ParkingLotID,Status FROM MyParkingInfo where ParkingLotID='".$id."'";

$result = $mysqli->query($sql);
// echo $sql;
// echo $result;
//$row_cnt = $result->num_rows;

if ($result->num_rows > 0) {
	// output data of each row
	$parking = array(
						
	);
	
	while($row = $result->fetch_assoc()) {
		//echo "ParkingLotID: " . $row["ParkingLotID"]. " -Status: " . $row["Status"]. "<br>";
		$parking["".$row["ParkingLotID"].""] = $row["Status"];
	}
return $parking;
} else {
	$parking = array(
			"0" => "defaultLot",
	);
	return $parking;
}


$mysqli->close();
		
	}
	
	public function updateParking($id){
	
		// 		$mobile = array($id => ($this->mobiles[$id]) ? $this->mobiles[$id] : $this->mobiles[1]);
		// 		return $mobile;
		include 'Parking.dbconfig.inc';
		/* check connection */
		$mysqli = new mysqli($hostname,$username, $password,$dbname);
		if (mysqli_connect_errno()) {
			printf("Connect failed: %s\n", mysqli_connect_error());
			exit();
		}
	
		$sql = "SELECT Status FROM MyParkingInfo where ParkingLotID='".$id."'";
	
		$result = $mysqli->query($sql);
		// echo $sql;
		// echo $result;
		//$row_cnt = $result->num_rows;
	
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				//echo "ParkingLotID: " . $row["ParkingLotID"]. " -Status: " . $row["Status"]. "<br>";
				  $status = 1-$row["Status"];
				  $sql = "UPDATE MyParkingInfo SET Status =".$status."  where ParkingLotID='".$id."'";
				  $mysqli->query($sql);
			}
			return "updated";
		} else {
			$parking = array(
					"0" => "defaultLot",
			);
			return "not updated";
		}
	
	
		$mysqli->close();
	
	}
}
?>