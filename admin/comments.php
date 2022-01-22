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
                        
                        //  Approve a comment
                        if(isset($_GET['unapprove'])){
                            $the_comment_id     =$_GET['unapprove'];

                            $query="
                            UPDATE comments 
                            SET 
                            comment_status  ='Unapproved'
                            WHERE comment_id = {$the_comment_id}";
                            
                            $unnaprove_comment_query   = mysqli_query($connection, $query);
                            confirmQuery($unnaprove_comment_query);
                            header("Location: comments.php");
                           
                        }
                        //  Unapprove a comment
                        if(isset($_GET['approve'])){
                            $the_comment_id     =$_GET['approve'];
                            $query="
                            UPDATE comments 
                            SET 
                            comment_status  ='Approved'
                            WHERE comment_id = {$the_comment_id}";
                            $aprove_comment_query   = mysqli_query($connection, $query);
                            confirmQuery($aprove_comment_query);
                            header("Location: comments.php");
                           
                        }
                        
                        //  Delete a comment
                        if(isset($_GET['delete'])){
                            $the_comment_id     =$_GET['delete'];
                            $query="DELETE FROM comments where comment_id = '$the_comment_id'";
                            $delete_comment_query   = mysqli_query($connection, $query);
                            confirmQuery($delete_comment_query);
                            header("Location: comments.php");
                           
                        }

                        if(isset($_GET['source'])){
                            $source = $_GET['source'];
                        }else{
                            $source = "";
                        }
                        include "includes/comments/view_all_comments.php";
                        ?>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<?php include "includes/footer.php"?> 


