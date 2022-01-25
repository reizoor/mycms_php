<?php
if(isset($_POST['create_post'])){
    
    $post_title         =$_POST['post_title'];
    $post_category_id   =$_POST['post_category_id']; 
    $post_author        =$_POST['post_author'];
    $post_status        =$_POST['post_status'];
    $post_date          =date('d-m-y');
    $post_image         =$_FILES['post_image']['name'];
    $post_image_temp    =$_FILES['post_image']['tmp_name'];
    $post_tags          =$_POST['post_tags'];
    $post_content       =$_POST['post_content'];
    
    move_uploaded_file($post_image_temp, "../images/$post_image");
    $query =   "INSERT INTO posts (
                post_category_id,
                post_title, 
                post_author,
                post_user,
                post_date,
                post_image, 
                post_content, 
                post_tags,
                post_comment_count,
                post_status,
                post_views_count
                )
                VALUES (
                {$post_category_id},
                '{$post_title}', 
                '{$post_author}',
                '{$post_author}',
                now(),
                '{$post_image}', 
                '{$post_content}', 
                '{$post_tags}',
                0,
                '{$post_status}',
                0)";
    $add_post_query = mysqli_query($connection, $query);
    confirmQuery($add_post_query);
}



?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="post_title">Post Title</label>
        <input type="text" class="form-control" name="post_title">
    </div>
    <div class="form-group">
        <label for="post_category">Post Category Id</label>
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
    </div>
    <div class="form-group">
        <label for="post_author">Post Author</label>
        <input type="text" class="form-control" name="post_author">
    </div>
    <div class="form-group">
        <label for="post_status">Post Status</label>
        <input type="text"class="form-control" name="post_status">
    </div>
    <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" class="" name="post_image">
    </div>
    <div class="form-group">
        <label for="post_tags">Post tags</label>
        <input type="text" class="form-control" name="post_tags">
    </div>
    <div class="form-group">
        <label for="post_content">Post content</label>
        <textarea id="summernote" name="post_content"></textarea>
        <script>
           
                $('#summernote').summernote({
                    placeholder: 'Hello stand alone ui',
                    tabsize: 2,
                    height: 120,
                    toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                    ]
                });
   
        </script>
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_post" value="Submit">
    </div>
</form>
