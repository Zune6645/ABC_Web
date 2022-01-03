<?php include_once "db.php";?>

<?php session_start(); ?>
<?php
	
    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $username = mysqli_real_escape_string($dbConn,$username);
		$password = mysqli_real_escape_string($dbConn,$password);
        
        $query = "SELECT * FROM user WHERE username='$username'";
        $result = dbQuery($query);
        if(!$result){
            die('Query Failed'.mysqli_error($dbConn));
        }
        while($row = mysqli_fetch_array($result)){
            $db_id=$row['user_id'];
            $db_username=$row['username'];
            $db_password=$row['password'];
            $db_firstname=$row['user_firstname'];
            $db_lastname=$row['user_lastname'];
            $db_role=$row['user_role'];
        }
        
        if($password = password_verify($password,$db_password)){
            $_SESSION['username'] = $db_username;
            $_SESSION['password'] = $db_password;
            $_SESSION['user_firstname'] = $db_firstname;
            $_SESSION['user_lastname'] = $db_lastname;
            $_SESSION['user_role'] = $db_role;
            header('Location: ../admin/index.php');
        }else{
            header('Location: ../index.php');
        }
    }


?>
