<?php include "./includes/header.php"?>
<?php include "./includes/db.php"?>
<?php 
echo crypt('12345','$2y$10$vvgfzfqrvawjadwqaqytneq');
if(isset($_POST['register_user'])){
  
  $query_validate = "SELECT * FROM users WHERE username = '{$_POST['username']}'";
  $search_exist_user = mysqli_query($connection, $query_validate);
  if(mysqli_num_rows($search_exist_user)== 0){

    $username       = $_POST['username'];
    $user_password  = $_POST['user_password'];
    $user_email     = $_POST['user_email'];

    $username       = mysqli_real_escape_string($connection, $username);
    $user_password  = mysqli_real_escape_string($connection, $user_password);
    $user_email     = mysqli_real_escape_string($connection, $user_email);
    
    for($n = 0; $n<=22; $n++){
      $salt = $salt . chr(rand(97,122)) ;
    }

    $hashFormat = "$2y$10$";
    $hashF_and_salt = $hashFormat . $salt;
    // $salt_query             ="SELECT randSalt FROM users";
    // $select_randsalt_query  = mysqli_query($connection, $select_randsalt_query);
    // confirmQuery($select_randsalt_query);
    // $row = mysqli_fetch_array($select_randsalt_query);
    // $salt = $row['randSalt'];

    $user_password = crypt($user_password, $hashF_and_salt);
    $query = 
      "INSERT INTO users(
        username,
        user_password,
        user_firstname,
        user_lastname,
        user_email,
        user_image,
        user_role,
        randSalt,
        token)
        VALUES(
        '{$username}',
        '{$user_password}',
        '',
        '',
        '{$user_email}',
        '',
        'suscriber',
        '{$hashF_and_salt}',
        '')";
      $insert_user_query  = mysqli_query($connection, $query);
      confirmQuery($insert_user_query);
      header("Location: index.php");
  }else{
    echo "<div class='container'><h2>Este nombre de usuario ya existe</h2></div>";
   }
  } 
?>
   
   

<div class="container">
  <div class="row">
    <div class="col-sm-6">
    <form action="" method="post">
      <h2>Registration</h2>
      <div class="form-group">
        <label for="username">Username</label>
        <input name="username" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <small id="emailHelp" class="form-text text-muted">Ex: thebeswebsite777</small>
      </div>
      <div class="form-group">
        <label for="user_email">Email</label>
        <input name="user_email" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <small id="emailHelp" class="form-text text-muted">Ex: thebeswebsite777</small>
      </div>
      <div class="form-group">
        <label for="user_password">Password</label>
        <input name="user_password" type="password" class="form-control" id="Password1">
      </div>
      <!-- <div class="form-group">
        <label for="user_password">Confirm password</label>
        <input for="user_password" type="password" class="form-control" id="Password2">
      </div> -->
      <button name="register_user" type="submit" class="btn btn-primary">Submit</button>
    </form>

    </div>
  </div>
</div>

<?php include "includes/footer.php"?> 
