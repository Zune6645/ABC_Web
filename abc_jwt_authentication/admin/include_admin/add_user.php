<?php
    if(isset($_POST['create_user'])){
        $user_firstname = $_POST['user_firstname'];
        $user_lastname = $_POST['user_lastname'];
        $username = $_POST['username'];
        $user_role = $_POST['user_role'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        $user_password=password_hash($user_password,PASSWORD_BCRYPT, array('cost'=>10));
        
        $query ="INSERT INTO user(username, password, user_firstname, user_lastname, email, user_role) ";
		$query .="VALUES ('$username','$password','$user_firstname', '$user_lastname','$email','$user_role')";

        
        $result = dbQuery($query);
        
        if(!$result){
            die('Query Failed'.mysqli_error($result));
        }
        echo "Complete Successfully Created Your Account" . "<a href='users.php'>View Post</a>";
    }


?>

   <form action="" method="post" enctype="multipart/form-data">
    
    <div class="form-group">
        <lable class="control-label">First Name</lable>
        <input type="text" class="form-control" name="user_firstname">
    </div>

    <div class="form-group">
        <lable class="control-label">Last Name</lable>
        <input type="text" class="form-control" name="user_lastname">
    </div>
    
    <div class="form-group">
        <lable class="control-label">Full Name</lable>
        <input type="text" class="form-control" name="username">
    </div>
    
    <div class="form-group">
        <lable class="control-label">User Role</lable>
        <select name="user_role" id="" class="form-control">
            <option value="subscriber">--- Select User Role ---</option>
            <option value="admin">Admin</option>
            <option value="subscriber">Subscriber</option>
        </select>
    </div>
<!--
    <div class="form-group">
        <lable class="control-label">Post Image</lable>
        <input type="file" name="image">
    </div>
-->
    
    <div class="form-group">
        <lable class="control-label">Email Address</lable>
        <input type="email" class="form-control" name="email">
    </div>
    
    <div class="form-group">
        <lable class="control-label">Password</lable>
        <input type="password" class="form-control" name="password">
    </div>
    

    <div class="form-group">
       <input type="submit" name="create_user" value="Add User" class="btn btn-primary">
   </div>
</form>


