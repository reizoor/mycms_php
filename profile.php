<?php include "includes/header.php"?>
<?php include "includes/navegation.php"?>
<?php 

if(isset($_SESSION['username'])){
    $the_username = $_SESSION['username'];
    $query = "SELECT * FROM users WHERE username = '{$the_username}'";
    
    $select_user_profile_query  = mysqli_query($connection, $query);
    confirmQuery($select_user_profile_query);
    while($row = mysqli_fetch_assoc($select_user_profile_query)){
        $user_id            =$row['user_id'];
        $the_username       =$row['username']; 
        $user_email         =$row['user_email']; 
        $user_firstname     =$row['user_firstname'];
        $user_lastname      =$row['user_lastname'];
        $user_image         =$row['user_image'];
        
    
    }
}
if(isset($_POST['edit_profile'])){
    
        $username           =$_POST['username']; 
        $user_email         =$_POST['user_email']; 
        $user_firstname     =$_POST['user_firstname'];
        $user_lastname      =$_POST['user_lastname'];
       
        
        $query =
        "UPDATE users SET
        username = '{$username}',
        user_email = '{$user_email}',
        user_firstname = '{$user_firstname}',
        user_lastname = '{$user_lastname}',
        user_role   ='{$user_role}'
        WHERE username = '{$the_username}'";

        $update_profile_user_query = mysqli_query($connection, $query);
        confirmQuery($update_profile_user_query);
        $_SESSION['username'] = $username;
        header("Location: profile.php");
    }
?>
<body>
    <div class="container">
    <div id="wrapper">

        <!-- Navigation -->
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            My Profile
                            <small>Author</small>
                            
                        </h1>
                      
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input value="<?php echo $the_username?>" type="text" class="form-control" name="username">
                        </div>
                        <div class="form-group">
                            <label for="user_email">Email</label>
                            <input value="<?php echo $user_email?>" type="text"class="form-control" name="user_email">
                        </div>
                        <div class="form-group">
                            <label for="user_firstname">First name</label><br>
                            <input value="<?php echo $user_firstname?>" type="text"class="form-control" name="user_firstname">
                            <!-- <img name="post_image" width="100" src="../images/<?php echo $post_image?>"> -->
                            <!-- <input value="<?php echo $post_image?>" type="file" class="" name="post_image"> -->
                        </div>
                        <div class="form-group">
                            <label for="user_lastname">Last name</label>
                            <input value="<?php echo $user_lastname?>" type="text" class="form-control" name="user_lastname">
                        </div>
                        
                        <!-- <div class="form-group">
                            <label for="post_image">Profile Pic</label><br>
                            <img name="user_image" width="100" src="../images/<?php //echo $user_image?>">
                            <input value="<?php //echo $user_image?>" type="file" class="" name="post_image">
                        </div> -->
                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" name="edit_profile" value="Submit">
                        </div>
                    </form>

                    </div>
                </div>
            </div>
        </div>
    </div></div>
    
<?php include "includes/footer.php"?> 


