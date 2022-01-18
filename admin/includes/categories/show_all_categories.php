<?php
// Find all categoriues query
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
    if(isset($_GET['delete'])){
        $get_cat_id     = $_GET['delete'];
        $get_query      = "DELETE FROM categories WHERE cat_id = {$get_cat_id}";
        $delete_query   = mysqli_query($connection, $get_query);
        header("Location: categories.php");
    }
?>