<?php

    if (isset($_POST['create_user'])) {
        $user_firstname = $_POST['user_firstname'];
        $user_lastname = $_POST['user_lastname'];
        $user_role = $_POST['user_role'];

     //    $user_image = $_FILES['image']['name'];
     //    $user_image_temp = $_FILES['image']['tmp_name'];
        
        $username = $_POST['username'];
        $user_role = $_POST['user_role'];
        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];
     //    $user_date = date('d-m-y');

     //    move_uploaded_file($user_image_temp, "../images/$user_image");
        $query = "INSERT INTO users (user_firstname, user_lastname, user_role, username, user_email,  user_password) ";
        $query .= "VALUE('{$user_firstname}', '{$user_lastname}', '{$user_role}', '{$username}', '{$user_email}', '{$user_password}') ";

        $create_user_query = mysqli_query($connection, $query);
        
        confirmQuery($create_user_query);
    }
?>

<form action="" method="post" enctype="multipart/form-data">

<div class="form-group">
        <label for="user_firstname">Firstname</label>
        <input type="text" name="user_firstname" class="form-control">
   </div>

   <div class="form-group">
        <label for="user_lastname">Lastname</label>
        <input type="text" name="user_lastname" class="form-control">
   </div>

    <div class="form-group">
          <select name="user_role" id="">
               <option value="subscriber">Select option</option>
               <option value="admin">Admin</option>
               <option value="subscriber">Subscriber</option>
          </select>
    </div>
   <!-- <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" name="image">
   </div> -->

   <div class="form-group">
        <label for="username">Username</label>
        <input type="text" name="username" class="form-control">
   </div>
   <div class="form-group">
        <label for="user_email">Email</label>
        <input type="email" name="user_email" class="form-control">
   </div>

   <div class="form-group">
        <label for="user_password">Password</label>
        <input type="password" name="user_password" class="form-control">
   </div>

   <div class="form-group">
    <input type="submit" value="Add user" class="btn btn-primary" name="create_user">
   </div>
</form>
