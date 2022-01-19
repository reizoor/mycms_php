<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Category</th>
            <th>Title</th>
            <th>Author</th>
            <th>User</th>
            <th>Date</th>
            <th>Image</th>
            <th>Tags</th>
            <th>Coments</th>
            <th>Status</th>
            <th>Views</th>
        </tr>
    </thead>
    <tbody>
        
            <?php 
            
            $query = "SELECT * FROM posts";
            $all_posts_query = mysqli_query($connection, $query);
            
            while($row = mysqli_fetch_assoc($all_posts_query)){
                
                $post_id            =$row['post_id'];
                $post_category_id   =$row['post_category_id']; 
                $post_title         =$row['post_title'];
                $post_author        =$row['post_author'];
                $post_user          =$row['post_user'];
                $post_date          =$row['post_date'];
                $post_image         =$row['post_image'];
                // $post_content       =$row['post_content']
                $post_tags          =$row['post_tags'];
                $post_comment_count =$row['post_comment_count'];
                $post_status        =$row['post_status'];
                $post_views_count   =$row['post_views_count'];
                echo "<tr>";
                echo "<td>$post_id</td>";
                echo "<td>$post_category_id</td>";
                echo "<td>$post_title</td>";
                echo "<td>$post_author</td>";
                echo "<td>$post_user</td>";
                echo "<td>$post_date</td>";
                echo "<td>$post_image</td>";
                echo "<td>$post_tags</td>";
                echo "<td>$post_comment_count</td>";
                echo "<td>$post_status</td>";
                echo "<td>$post_views_count</td>";
                echo "</tr>";

            }
            
            ?>
           
        </tr>
    </tbody>
</table> 