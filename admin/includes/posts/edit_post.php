<?php
    if(isset($_GET['p_id'])){

        $post_id    = $_GET['p_id'];
        $query = "SELECT * FROM posts WHERE post_id = {$post_id}";
        $find_post_query = mysqli_query($connection, $query);
        while($row = mysqli_fetch_assoc($find_post_query)){
        
            $post_category_id   =$row['post_category_id']; 
            $post_title         =$row['post_title'];
            $post_status        =$row['post_status'];
            $post_author        =$row['post_author'];
            $post_image         =$row['post_image'];
            $post_tags          =$row['post_tags'];
            $post_content       =$row['post_content'];
        
    }
    if(isset($_POST['edit_post'])){
        $post_title         =$_POST['post_title'];
        $post_category_id   =$_POST['post_category_id']; 
        $post_author        =$_POST['post_author'];
        $post_status        =$_POST['post_status'];
        $post_image         =$_FILES['post_image']['name'];
        $post_image_temp    =$_FILES['post_image']['tmp_name'];
        $post_tags          =$_POST['post_tags'];
        $post_content       =$_POST['post_content'];
        if(empty($post_image)){
            $query = "SELECT * FROM posts WHERE post_id = {$post_id}";
            $select_image = mysqli_query($connection, $query);

            while($row = mysqli_fetch_array($select_image)){
                $post_image = $row['post_image'];
            }
        }
        move_uploaded_file($post_image_temp, "../images/$post_image");
        $query =
                "UPDATE posts SET 
                post_title          = '{$post_title}',
                post_category_id    =  {$post_category_id},
                post_author         = '{$post_author}',
                post_status         = '{$post_status}',
                post_image          = '{$post_image}',
                post_tags           = '{$post_tags}',
                post_content        = '{$post_content}'
                WHERE
                post_id = {$post_id}";
        $update_query = mysqli_query($connection, $query);
        confirmQuery($update_query);
    }   


}
    

?>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="post_title">Post Title</label>
        <input value="<?php echo $post_title?>" type="text" class="form-control" name="post_title">
    </div>
    <div class="form-group">
        <label for="post_category">Post Category Id</label>
        <br>
        <select class="form-control" name="post_category_id" id="post_category">
        <?php
        
        $query = "SELECT * FROM categories";
        $select_categories = mysqli_query($connection, $query);
        confirmQuery($select_categories);
        while($row = mysqli_fetch_assoc($select_categories)){
            $cat_id     =$row['cat_id'];
            $cat_title  =$row['cat_title'];
            echo "<option value='{$cat_id}'>{$cat_title}</option>";
        }
        
        ?>

        </select>
        
        <!-- <input value="" type="text" class="form-control" name="post_category_id"> -->
    </div>
    <div class="form-group">
        <label for="post_author">Post Author</label>
        <input value="<?php echo $post_author?>" type="text" class="form-control" name="post_author">
    </div>
    <div class="form-group">
        <label for="post_status">Post Status</label>
        <input value="<?php echo $post_status?>" type="text"class="form-control" name="post_status">
    </div>
    <div class="form-group">
        <label for="post_image">Post Image</label><br>
        <img name="post_image" width="100" src="../images/<?php echo $post_image?>">
        <input value="<?php echo $post_image?>" type="file" class="" name="post_image">
    </div>
    <div class="form-group">
        <label for="post_tags">Post tags</label>
        <input value="<?php echo $post_tags?>" type="text" class="form-control" name="post_tags">
    </div>
    <div class="form-group">
        <label for="post_content">Post content</label>
        <textarea type="text" class="form-control" name="post_content">

        <?php echo $post_content?>
        </textarea>
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update_post" value="Submit">
    </div>
</form>
