<?php include "includes/header.php"?>
<?php include "includes/navegation.php"?>

    

    <!-- Page Content -->
    <div class="container">
        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
            <?php 
            
            $query = "SELECT * FROM posts WHERE post_status='published';";
            $select_all_posts = mysqli_query($connection, $query);
            confirmQuery($select_all_posts);
            if(mysqli_num_rows($select_all_posts)==0){

                echo "<h2 class='text-center'>No posts found</h2>";
                
            }
            else{
                while($row = mysqli_fetch_assoc($select_all_posts)){
                    $post_id = $row['post_id'];
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_date = $row['post_date'];
                    $post_image = $row['post_image'];
                    $post_content = substr($row['post_content'],0,150);
                ?>
            
                <h1 class="page-header">
                Page Heading
                <small>Secondary Text</small>
            </h1>

            <!-- First Blog Post -->
            <h2>
                <a href="post.php?p_id=<?php echo $post_id;?>"><?php echo $post_title;?></a>
            </h2>
            <p class="lead">
                by <a href="index.php"><?php echo $post_author?></a>
            </p>
            <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date?></p>
            <hr>
            <img class="img-responsive" src="http://placehold.it/900x300" alt="">
            <hr>
            <p><?php echo $post_content?></p>
            <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id;?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

            <hr>   
           
            <?php } }  ?>           
                
                

                
            </div>
<?php include "includes/sidebar.php"?>
            

        </div>
        <!-- /.row -->

        <hr>
<?php include "includes/footer.php"?>