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
                        
                        if(isset($_GET['delete'])){
                            $post_id = $_GET['delete'];
                            $query = "DELETE FROM posts WHERE post_id = {$post_id}";
                            $delete_post_query = mysqli_query($connection, $query);
                            confirmQuery($delete_post_query);
                        }

                        if(isset($_GET['source'])){
                            $source = $_GET['source'];
                        }else{
                            $source = "";
                        }
                        
                        switch($source){
                            case 'add_post':
                                include "includes/posts/add_post.php";
                            break;

                            case 'update_post':
                                include "includes/posts/update_post.php";
                                
                            break;

                            case '32':
                            echo "32";
                            break;
                            
                            default:

                            include "includes/posts/view_all_posts.php";

                            break;

                        }
                        
                        ?>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<?php include "includes/footer.php"?> 


