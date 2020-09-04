<?php
     if (isset($_GET['edit_user'])) {
        $the_user_id = $_GET['edit_user'];

        $query = "SELECT * FROM users WHERE user_id= $the_user_id";
        $select_users_query = mysqli_query($connection,$query);
        while($row = mysqli_fetch_assoc($select_users_query)){
            $user_id = escape($row['user_id']);
            $username = escape($row['username']);
            $user_password = escape($row['user_password']);
            $user_firstname = escape($row['user_firstname']);
            $user_lastname = escape($row['user_lastname']); 
            $user_email = escape($row['user_email']);
            $user_image = escape($row['user_image']);
            $user_role = escape($row['user_role']);
        }
        ?>
        <?php
     
    if (isset($_POST['edit_user'])) {
        $user_firstname = escape($_POST['user_firstname']);
        $user_lastname = escape($_POST['user_lastname']);
        $user_role = escape($_POST['user_role']);
        
        $username = escape($_POST['username']);
        $user_role = escape($_POST['user_role']);
        $user_email = escape($_POST['user_email']);
        $user_password = escape($_POST['user_password']);


          if (!empty($user_password)) {
               $query_password = "SELECT user_password FROM users WHERE user_id = $the_user_id";
               $get_user_query = mysqli_query($connection,$query_password);

               confirmQuery($get_user_query);

               $row = mysqli_fetch_array($get_user_query);

               $db_user_password = $row['user_password'];

               if ($db_user_password != $user_password) {
                    $hashed_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 12));

               }

               $query = "UPDATE users SET ";
               $query .= "user_firstname = '{$user_firstname}', ";
               $query .= "user_lastname = '{$user_lastname}', ";
               $query .= "user_role = '{$user_role}', ";
               $query .= "user_email = '{$user_email}', ";
               $query .= "user_password = '{$hashed_password}' ";
               $query .= "WHERE user_id = '{$the_user_id}' ";
     
               $edit_user_query = mysqli_query($connection,$query);
     
               confirmQuery($edit_user_query);

               echo "User Updated" . "<a href='users.php'>View Users?</a>";
          }
    }
} else {
     header("Location: index.php"); 
}
?>

<form action="" method="post" enctype="multipart/form-data">

<div class="form-group">
        <label for="user_firstname">Firstname</label>
        <input type="text" name="user_firstname" class="form-control" value="<?php echo $user_firstname ?>">
   </div>

   <div class="form-group">
        <label for="user_lastname">Lastname</label>
        <input type="text" name="user_lastname" class="form-control" value="<?php echo $user_lastname ?>">
   </div>

    <div class="form-group">
          <select name="user_role" id="">
           <option value="<?php echo $user_role ?>"><?php echo $user_role ?></option>
          <?php 
               if ($user_role == 'admin') {
                    echo "<option value='subscriber'>Subscriber</option>";
               } else {
                    
                    echo "<option value='admin'>Admin</option>";
               }
          ?>
          </select>
    </div>
   <!-- <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" name="image">
   </div> -->

   <div class="form-group">
        <label for="username">Username</label>
        <input type="text" name="username" class="form-control" value="<?php echo $username ?>">
   </div>
   <div class="form-group">
        <label for="user_email">Email</label>
        <input type="email" name="user_email" class="form-control" value="<?php echo $user_email ?>">
   </div>

   <div class="form-group">
        <label for="user_password">Password</label>
        <input type="password" name="user_password" class="form-control" autocomplete="off">
   </div>

   <div class="form-group">
    <input type="submit" value="Update user" class="btn btn-primary" name="edit_user">
   </div>
</form>
