<?php
if(isset($_POST['create_user'])){
    
    $username           =$_POST['username']; 
    $user_password      =$_POST['user_password'];
    $user_firstname     =$_POST['user_firstname'];
    $user_lastname      =$_POST['user_lastname'];
    $user_email         =$_POST['user_email'];
    $user_image         =$_FILES['user_image']['name'];
    $user_image_temp    =$_FILES['user_image']['tmp_name'];
    
    move_uploaded_file($user_image_temp, "../images/$user_image");
    $query =   "INSERT INTO users(
                username,
                user_password,
                user_firstname,
                user_lastname,
                user_email,
                user_image,
                user_role,
                token
                )
                VALUES (
                '{$username}', 
                '{$user_password}',
                '{$user_firstname}',
                '{$user_lastname}',
                '{$user_email}',
                '{$user_image}',
                'suscriber',
                'a token'
                )";
                
    $create_user_query = mysqli_query($connection, $query);
    confirmQuery($create_user_query);
}



?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="post_title">Username</label>
        <input type="text" class="form-control" name="username">
    </div>
    <div class="form-group">
        <label for="post_title">Password</label>
        <input type="password" class="form-control" name="user_password">
    </div>
    <div class="form-group">
        <label for="post_category">First name</label>
        <input type="text" class="form-control" name="user_firstname">

    </div>
    <div class="form-group">
        <label for="post_author">Last name</label>
        <input type="text" class="form-control" name="user_lastname">
    </div>
    <div class="form-group">
        <label for="post_status">Email</label>
        <input type="text"class="form-control" name="user_email">
    </div>
    <div class="form-group">
        <label for="post_image">Profile pic</label>
        <input type="file" class="" name="user_image">
    </div>
    <!-- <div class="form-group">
        <label for="post_tags">Post tags</label>
        <input type="text" class="form-control" name="post_tags">
    </div>
    <div class="form-group">
        <label for="post_content">Post content</label>
        <textarea type="text" class="form-control" name="post_content"></textarea>
    </div> -->
    
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_user" value="Submit">
    </div>
</form>
