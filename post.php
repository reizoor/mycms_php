<?php include "includes/header.php"?>
<?php include "includes/navegation.php"?>

    

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
            <?php 
            
            if(isset($_GET['p_id'])){
            $the_post_id    = $_GET['p_id'];
            

            $query = "SELECT * FROM posts WHERE post_id = $the_post_id";
            $select_all_posts = mysqli_query($connection, $query);
            confirmQuery($select_all_posts);
            while($row = mysqli_fetch_assoc($select_all_posts)){
                
                $post_title     = $row['post_title'];
                $post_author    = $row['post_author'];
                $post_date      = $row['post_date'];
                $post_image     = $row['post_image'];
                $post_content   = $row['post_content'];
            ?>
                <h1 class="page-header">
                Page Heading
                <small>Secondary Text</small>
            </h1>

            <!-- First Blog Post -->
            <h2>
                <a href="post.php?p_id=<?php echo $the_post_id?>"><?php echo $post_title?></a>
            </h2>
            <p class="lead">
                by <a href="index.php"><?php echo $post_author?></a>
            </p>
            <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date?></p>
            <hr>
            <img class="img-responsive" src="http://placehold.it/900x300" alt="">
            <hr>
            <p><?php echo $post_content?></p>

            <hr>   
            <?php } }
            
                
            ?>
            
                <!-- Blog Comments -->
            <?php
            if(isset($_POST['add_comment'])){
                $the_post_id        =$_GET['p_id'];
                $comment_author     =$_POST['comment_author'];
                $comment_email      =$_POST['comment_email'];
                $comment_content    =$_POST['comment_content'];

                $query=
                "INSERT INTO comments(
                comment_post_id,
                comment_author,
                comment_email,
                comment_content,
                comment_status,
                comment_date)
                VALUES (
                {$the_post_id},
                '{$comment_author}',
                '{$comment_email}',
                '{$comment_content}',
                'Unapproved',
                now())";
                
                $add_comment_query  =mysqli_query($connection, $query);
                confirmQuery($add_comment_query);

                $query = 
                "UPDATE posts SET
                 post_comment_count = post_comment_count + 1
                 WHERE post_id = $the_post_id";
                
                $update_post_comment_count_query = mysqli_query($connection, $query);
                confirmQuery($update_post_comment_count_query);
                
                

            }

            ?>
                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form" action="" method="post">
                        <div class="form-group">
                            <label for="Author"class="form-group">Author</label>
                            <input type="text" name="comment_author" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="Email" class="form-group">Email</label>
                            <input type="email" name="comment_email" id=""class="form-control">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="comment_content" rows="3" class="form-control"></textarea>
                        </div>
                        <button type="submit" name="add_comment"class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->
                <?php
                $query = 
                "SELECT * FROM comments 
                 WHERE comment_post_id = {$the_post_id}
                 AND comment_status='Approved'
                 ORDER BY comment_id DESC";

                $approved_comments_query = mysqli_query($connection, $query);
                confirmQuery($approved_comments_query);
                while($comments = mysqli_fetch_assoc($approved_comments_query)){
                    
                    $comment_content   =$comments['comment_content']; 
                    $comment_author    =$comments['comment_author'];
                    $comment_date      =$comments['comment_date'];
                ?>
                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comment_author;?>
                            <small><?php echo $comment_date;?></small>
                        </h4>
                        <?php echo $comment_content;?>
                    </div>
                </div>
                <?php } ?>
                <!--
                <-- Comment ->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Start Bootstrap
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                        <-- Nested Comment ->
                        <div class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object" src="http://placehold.it/64x64" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">Nested Start Bootstrap
                                    <small>August 25, 2014 at 9:30 PM</small>
                                </h4>
                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                            </div>
                        </div>
                        <-- End Nested Comment ->
                    </div>
                </div>
                --->
    
            </div>
<?php include "includes/sidebar.php"?>
            

        </div>
        <!-- /.row -->

        <hr>
<?php include "includes/footer.php"?>