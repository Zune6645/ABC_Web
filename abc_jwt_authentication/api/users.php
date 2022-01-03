<?php

/**
* Author : https://www.roytuts.com
*/

require_once '../include/db.php';
require_once 'jwt_utils.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");

$bearer_token = get_bearer_token();

#echo $bearer_token;

$is_jwt_valid = is_jwt_valid($bearer_token);

if($is_jwt_valid) {
	$sql = "SELECT * FROM user";
	$results = dbQuery($sql);

	$rows = array();

	while($row = dbFetchAssoc($results)) {
		$rows[] = $row;
	}

	echo json_encode($rows);
	header('Location: http://localhost/jwt-abc/admin/index.php');
} else {
	echo json_encode(array('error' => 'Access denied'));
}

//End of file