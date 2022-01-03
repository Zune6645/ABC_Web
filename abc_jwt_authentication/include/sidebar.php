<?php include_once "db.php"; ?>
   <!-- Blog Search Well -->
    <div class="well">
        <h4>Blog Search</h4>
        <form action="search.php" method="post">
            <div class="input-group">
                <input type="text" class="form-control" name="search">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="submit" name="submit">
                        <span class="glyphicon glyphicon-search"></span>
                </button>
                </span>
            </div>
        </form>

        <!-- /.input-group -->
    </div>
                
    <!-- Login Well -->
    <div class="well">
        <h4>Login</h4>
        <form action="include/login.php" method="post">
            <div class="form-group">
                <input type="text" class="form-control" name="username" placeholder="Enter User Name">
            </div>
            <div class="input-group">
                <input type="password" class="form-control" name="password" placeholder="Enter Password">
                <span class="input-group-btn">
                    <button class="btn btn-primary" type="submit" name="login">
                        Log In
                </button>
                </span>
            </div>
        </form>

        <!-- /.input-group -->
    </div>

                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="list-unstyled">
                    <?php
                        $query = "SELECT * FROM categories ";
                        $result = dbQuery($query);
                        if(!$result){
                            die('Query Failed'.mysqli_error($result));
                        }
                                
                        while($row = mysqli_fetch_assoc($result)){
                            $cat_id = $row['cat_id'];
                            $cat_title = $row['cat_title'];
                        ?>
                            <li><a href="category.php?category=<?php echo $cat_id ?>"><?php echo $cat_title ?></a>
                                </li>
                <?php
                        }
                                
                    ?>
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <div class="well">
                    <h4>Side Widget Well</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                </div>