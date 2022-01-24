
<!-- Blog Sidebar Widgets Column -->
<!-- <div class="container d-flex justify-content-end"> -->
<div class="col-md-4 d-flex justify-content-end">

<!-- Blog Search Well -->
<div class="well">
    <h4>Blog Search</h4>
    <form action="search.php" method="post">
    <div class="input-group">
        <input type="text" class="form-control" name="search">
        <span class="input-group-btn">
            <button name ="submit" class="btn btn-default" type="submit" >
                <span class="glyphicon glyphicon-search"></span>
        </button>
        </span>
    </div>
    </form>
    <!-- /.input-group -->
<!-- Login --->
</div>
<div class="well">
    <h4>Login</h4>
    <form action="includes/login.php" method="post">
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" name="username" placeholder="Enter Username">
    </div> 
    <div class="form-group">
        <label  for="password">Password</label>
        <input type="password" class="form-control" name="password" placeholder="Enter Password">
        </span>
    </div>
    <div class="form-group">
        <input class="btn btn-primary"type="submit" value="Log in" name="login">
    </div>
    </form>
    <!-- /.input-group -->
</div>

<!-- Blog Categories Well -->
<div class="well">
    <h4>Blog Categories</h4>
    <div class="row">
        <div class="col-lg-6">
            <ul class="list-unstyled">
                <?php 
                
                $category_query = "SELECT * FROM categories";
                $all_categorys = mysqli_query($connection, $category_query);;
                if(!$all_categorys){
                    die("No category table found");
                }
                $count = mysqli_num_rows($all_categorys);
                if($count == 0){
                    echo "<li><h3>No categorys found</h3></li>";
                }
                while($row = mysqli_fetch_assoc($all_categorys)){
                    $category_id        =$row['cat_id'];
                    $category_title     = $row['cat_title'];
                    echo "<li><a href='category.php?cat_id=$category_id'>{$category_title}</a></li>";
                }
                

                
                ?>
            </ul>
        </div>
        <!-- /.col-lg-6 -->
        <!-- /.col-lg-6 -->
    </div>
    <!-- /.row -->
</div>
<!-- </div> -->

<!-- Side Widget Well -->
<div class="well">
    <h4>Side Widget Well</h4>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
</div>

</div>