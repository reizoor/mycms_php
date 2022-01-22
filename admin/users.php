<?php include "includes/header.php"?> 
<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include  "includes/navegation.php"?>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to admin
                            <small>Author</small>
                        </h1>
                        <?php 
                        
                        // Delete a user
                        if(isset($_GET['delete'])){
                            $the_user_id     =$_GET['delete'];
                            $query="DELETE FROM users where user_id = '$the_user_id'";
                            $delete_user_query   = mysqli_query($connection, $query);
                            confirmQuery($delete_user_query);
                            header("Location: users.php");
                           
                        }

                        if(isset($_GET['source'])){
                            $source = $_GET['source'];
                        }else{
                            $source = "";
                        }
                        
                        switch($source){
                            case 'add_user':
                                include "includes/users/add_user.php";
                            break;

                            case 'edit_user':
                                include "includes/users/edit_user.php";
                            break;
                            
                            default:
                                include "includes/users/view_all_users.php";
                            break;
                        }
                        
                        ?>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<?php include "includes/footer.php"?> 


