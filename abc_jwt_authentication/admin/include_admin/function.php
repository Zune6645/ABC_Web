<?php


//    insert category function
    function insert_category(){
        global $dbConn;
        if(isset($_POST['submit'])){
            $cat_title = $_POST['cat_title'];
            $query ="INSERT INTO categories(cat_title) VALUES ('$cat_title')";
            $result = mysqli_query($dbConn,$query);
            if(!$result){
                die('Query Failed'.mysqli_error($result));
            }
        }
    }

//    delete category function
    function delete_category(){
        global $dbConn;
        if(isset($_GET['delete'])){
              $cat_id = $_GET['delete'];
              $query ="DELETE FROM categories WHERE cat_id=$cat_id";
              $result = mysqli_query($dbConn,$query);
              if(!$result){
                  die('Query Failed'.mysqli_error($result));
              }
              header('Location: admin_categories.php');
          }
    }


?>