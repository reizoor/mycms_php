<form action="" method="post">
    <div class="form-group">
        <label for="cat_title">Update Category</label><br>
        <?php 
        if(isset($_GET['update'])){
            $cat_id         = $_GET['update'];
            $category_query = "SELECT * FROM categories WHERE cat_id = {$cat_id}";
            $all_categorys  = mysqli_query($connection, $category_query);
            
            while($row = mysqli_fetch_assoc($all_categorys)){
                $cat_id        = $row['cat_id'];
                $cat_title     = $row['cat_title'];
        ?>
            <input value="<?php if(isset($cat_title)){echo $cat_title;}?>"class="form-control" type="text" name="update_cat_title">
        <?php } 
        } 
        if(isset($_POST['update_submit'])){
            
            if($_POST['update_cat_title'] == "" || empty($_POST['update_cat_title'])){
                echo "<br>" . "This field should not to be empty";
            }
            elseif($_POST['update_cat_title'] != $cat_title){
                $update_cat_title    = $_POST['update_cat_title'];
                $query_update        
                = 
                "UPDATE categories 
                SET cat_title = '{$update_cat_title}'
                WHERE cat_id = {$cat_id}";
                
                $update_category_title = mysqli_query($connection, $query_update);
                if(!$update_category_title) die ("QUERY ERROR". mysqli_error($connection));
                header("Location: categories.php");
            }
        }
        ?>
    </div>
        <input class="btn btn-primary" type="submit" name="update_submit" value="Update Category">
</form>
