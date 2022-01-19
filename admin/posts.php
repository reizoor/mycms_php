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
                        
                        if(isset($_GET['source'])){
                            $source = $_GET['source'];
                        }else{
                            $source = "";
                        }
                        
                        switch($source){
                            case 'add_post':
                                include "includes/posts/add_post.php";
                            break;

                            case '100':
                            echo "100";
                            break;

                            case '32':
                            echo "32";
                            break;
                            
                            default:

                            include "includes/posts/view_all_posts.php";

                            break;

                        }
                        
                        ?>
                        <?php //include "includes/posts/view_all_posts.php"?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<?php include "includes/footer.php"?> 


