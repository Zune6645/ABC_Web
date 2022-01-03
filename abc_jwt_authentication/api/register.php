<?php
require_once '../include/db.php';
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	// get posted data
	$data = json_decode(file_get_contents("php://input", true));
	$password = mysqli_real_escape_string($dbConn,$data->password);
	$password=password_hash($password,PASSWORD_BCRYPT,array('cost'=>10));
	
	$sql = "INSERT INTO user(username, email, password, user_role) VALUES('" . mysqli_real_escape_string($dbConn, $data->username) . "', '" . mysqli_real_escape_string($dbConn, $data->email) . "','" . mysqli_real_escape_string($dbConn, $password) . "', 'admin')";

	$result = dbQuery($sql);
	
	if($result) {
		echo json_encode(array('success' => 'You registered successfully'));
	} else {
		echo json_encode(array('error' => 'Something went wrong, please contact administrator'));
	}
}
//End of file