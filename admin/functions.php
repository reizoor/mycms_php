<?php
    function confirmQuery($query_result){
        global $connection;
        if(!$query_result){
            die ("QUERY FAILED" . "<br>". mysqli_error($connection));
        }
    }
    function insert_categories (){
    
    // Add new category 
    if(isset($_POST['add_submit'])){
        global $connection;

        $cat_title = $_POST['cat_title'];

        if($cat_title == "" || empty($cat_title)){
            
            echo "This field should not be empty";

        }else{

            $query = "INSERT INTO categories(cat_title) ";
            $query.= "VALUE('{$cat_title}')";
            $create_category_query = mysqli_query($connection, $query);
            confirmQuery($create_category_query);
            // if(!$create_category_query){
            //     die ('Query failed' . "<br>" . mysqli_error($connection));
            // }

        }
    }
    }

    function showAllCategories(){
        global $connection;
        $category_query = "SELECT * FROM categories";
        $all_categorys = mysqli_query($connection, $category_query);;
        if(!$all_categorys){
            die("No category table found");
        }
        $count = mysqli_num_rows($all_categorys);
        if($count == 0){
            echo "<li><h3>No categorys found</h3></li>";
        }
        while($row = mysqli_fetch_assoc($all_categorys)){
            $category_id       = $row['cat_id'];
            $category_title     = $row['cat_title'];
            echo "<tr>";
            echo "<td>{$category_id}</td>";
            echo "<td>{$category_title}</td>";
            echo "<td><a href='categories.php?delete={$category_id}'>Delete</a></td>";
            echo "<td><a href='categories.php?update={$category_id}'>Update</a></td>";
            echo "</tr>";
        }
    }

    function deleteCategories(){
        
        if(isset($_GET['delete'])){
            global $connection;
            $the_category_id     = $_GET['delete'];
            $query      = "DELETE FROM categories WHERE cat_id = {$the_category_id}";
            $delete_query   = mysqli_query($connection, $query);
            confirmQuery($delete_query);
            header("Location: categories.php");
        }
    }

    
    
?>
