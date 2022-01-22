<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <!-- <th>Post_id</th> -->
            <th>Username</th>
            <th>Email</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Profile pic</th>
            <th>Role</th>
            
            
            
        </tr>
    </thead>
    <tbody>
        
            <?php 
            
            $query = "SELECT * FROM users";
            $all_users_query = mysqli_query($connection, $query);
            
            while($row = mysqli_fetch_assoc($all_users_query)){
                
                $user_id            =$row['user_id'];
                $username           =$row['username']; 
                $user_email         =$row['user_email']; 
                $user_firstname     =$row['user_firstname'];
                $user_lastname      =$row['user_lastname'];
                $user_image         =$row['user_image'];
                $user_role          =$row['user_role'];

                // $query = "SELECT * FROM categories WHERE cat_id = $post_category_id";
                // $select_categories_id   = mysqli_query($connection, $query);
                // while($categories = mysqli_fetch_assoc($select_categories_id)){
                //     $cat_id     =$categories['cat_id'];
                //     $cat_title  =$categories['cat_title'];
                // } 
                echo "<tr>";
                echo "<td>$user_id</td>";
                // echo "<td>$user_post_id</td>";
                echo "<td>$username</td>";
                echo "<td>$user_email</td>";
                echo "<td>$user_firstname r</td>";
                echo "<td>$user_lastname </td>";
                echo "<td>$user_image</td>";
                echo "<td>$user_role</td>";

                // $response_query = "Select * FROM user WHERE post_id = '{$user_id}'";
                // $post_title_query = mysqli_query($connection, $response_query);
                // confirmQuery($post_title_query);
                // while ($row_post = mysqli_fetch_assoc($post_title_query)){
                //     $comment_post_id    =$row_post['post_id'];
                //     $comment_post_title =$row_post['post_title'];
                //     echo "<td><a href='../post.php?p_id=$comment_post_id'>$comment_post_title</a></td>";
                // }
                
                
                // echo "<td><a href='comments.php?approve=$comment_id'>Approve</a></td>";
                echo "<td><a href='users.php?edit=$user_id'>Edit</a></td>";
                echo "<td><a href='users.php?delete=$user_id'>Delete</td>";
                echo "<tr>";

            }
            
            ?>
           
        </tr>
    </tbody>
</table> 