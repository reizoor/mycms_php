<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <!-- <th>Post_id</th> -->
            <th>Comment</th>
            <th>Author</th>
            <th>Email</th>
            <th>Status</th>
            <th>Date</th>
            <th>In Response to</th>
            <th>Approve</th>
            <th>Unapprove</th>
            <th>Delete</th>
            
            
        </tr>
    </thead>
    <tbody>
        
            <?php 
            
            $query = "SELECT * FROM comments";
            $all_comment_query = mysqli_query($connection, $query);
            
            while($row = mysqli_fetch_assoc($all_comment_query)){
                
                $comment_id        =$row['comment_id'];
                $comment_post_id   =$row['comment_post_id']; 
                $comment_content   =$row['comment_content']; 
                $comment_author    =$row['comment_author'];
                $comment_email     =$row['comment_email'];
                $comment_status    =$row['comment_status'];
                $comment_date      =$row['comment_date'];

                // $query = "SELECT * FROM categories WHERE cat_id = $post_category_id";
                // $select_categories_id   = mysqli_query($connection, $query);
                // while($categories = mysqli_fetch_assoc($select_categories_id)){
                //     $cat_id     =$categories['cat_id'];
                //     $cat_title  =$categories['cat_title'];
                // } 
                echo "<tr>";
                echo "<td>$comment_id</td>";
                // echo "<td>$comment_post_id</td>";
                echo "<td>$comment_content</td>";
                echo "<td>$comment_author</td>";
                echo "<td>$comment_email r</td>";
                echo "<td>$comment_status</td>";
                echo "<td>$comment_date</td>";

                $response_query = "Select * FROM posts WHERE post_id = '{$comment_post_id}'";
                $post_title_query = mysqli_query($connection, $response_query);
                confirmQuery($post_title_query);
                while ($row_post = mysqli_fetch_assoc($post_title_query)){
                    $comment_post_id    =$row_post['post_id'];
                    $comment_post_title =$row_post['post_title'];
                    echo "<td><a href='../post.php?p_id=$comment_post_id'>$comment_post_title</a></td>";
                }
                
                
                echo "<td><a href='comments.php?approve=$comment_id'>Approve</a></td>";
                echo "<td><a href='comments.php?unapprove=$comment_id'>Unapprove</a></td>";
                echo "<td><a href='comments.php?delete=$comment_id'>Delete</td>";
                // echo "<td><img class='img-thumbnail' width='100' src='$post_image'></td>";
                // echo "<td>$post_tags</td>";
                // echo "<td>$post_comment_count</td>";
                // echo "<td>$post_status</td>";
                // echo "<td>$post_views_count</td>";
                // echo "<td><a href='posts.php?source=update_post&p_id={$post_id}'>Update</a></td>";
                // echo "<td><a href='comment.php?delete={$post_id}'>Delete</a></td>";
                // echo "</tr>";

            }
            
            ?>
           
        </tr>
    </tbody>
</table> 