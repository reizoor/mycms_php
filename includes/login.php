<?php include "db.php"?>
<?php include "../admin/functions.php"?>
<?php session_start();?>


<?php 

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $username   =mysqli_real_escape_string($connection, $username);
    $password   =mysqli_real_escape_string($connection, $password);

    $query  ="SELECT * FROM users WHERE username = '{$username}'";
    
    $select_user_query = mysqli_query($connection,$query);
    confirmQuery($select_user_query);
    while($row = mysqli_fetch_assoc($select_user_query)){

        $user_db_id         = $row['user_id'];
        $user_db_username   = $row['username'];
        $user_db_password   = $row['user_password'];
        $user_db_role       = $row['user_role'];

    }

    if($username === $user_db_username && $password === $user_db_password){
        
        $_SESSION['username']   = $user_db_username;
        $_SESSION['user_role']  = $user_db_role;
        
        header("Location: ../admin");
        
    }
    else{
        header("Location: ../index.php");
    }
    

}


?>