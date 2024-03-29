 <?php
require_once '../include/db.php';
require_once 'jwt_utils.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	// get posted data
	$data = json_decode(file_get_contents("php://input", true));
	$password = mysqli_real_escape_string($dbConn,$data->password);
	$sql = "SELECT * FROM user WHERE username = '" . mysqli_real_escape_string($dbConn, $data->username) . "'  LIMIT 1";
	
	$result = dbQuery($sql);
	
	if(dbNumRows($result) < 1) {
		echo json_encode(array('error' => 'Invalid User'));
	} 

	else{
		$row = dbFetchAssoc($result);
		$username = $row['username'];
		$db_password = $row['password'];

		if($password = password_verify($password,$db_password)){
			$headers = array('alg'=>'HS256','typ'=>'JWT');
			$payload = array('username'=>$username, 'exp'=>(time() + 60));
	
			$jwt = generate_jwt($headers, $payload);
			
			echo json_encode(array('token' => $jwt));
		}

	
	}
	
	}
//End of file 