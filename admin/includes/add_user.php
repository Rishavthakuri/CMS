<?php
if(isset($_POST['create_user'])) {
  // $user_id= $_POST['user_id'];
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_role = $_POST['user_role'];
//    $post_image = $_FILES['image']['name'];
//    $post_image_temp = $_FILES['image']['tmp_name'];
    $username = $_POST['username'];
    $user_email = $_POST['user_email'];
//    $user_image = $_POST['user_image'];
    $user_image = $_FILES['image']['name'];
    $user_image_temp = $_FILES['image']['tmp_name'];
    $user_password = $_POST['user_password'];
//    $post_date = date('d-m-y');
    //$post_comment_count = 4;

//    move_uploaded_file($post_image_temp, "../images /$post_image");
    move_uploaded_file($user_image_temp, "../images /$user_image");
    $user_password= crypt($user_password,'$2a$07$usesomesillystringforsalt$');
    $query = "INSERT INTO users(user_firstname,user_lastname,user_role,username,user_email,user_password,user_image)";
    $query .= "VALUES('{$user_firstname}','{$user_lastname}','{$user_role}',
              '{$username}','{$user_email}','{$user_password}','{$user_image}') ";
    $create_user_query=mysqli_query($connection,$query);
    ConfirmQuery($create_user_query);


}
?>
<?php
echo"<a href='users.php'><h4 style='text-align: center'> View all Users</h4></a>";
?>


<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="user_firstname">First Name</label>
        <input type="text" class="form-control" name="user_firstname">
    </div>
    <div class="form-group">
        <label for="user_firstname">Last Name</label>
        <input type="text" class="form-control" name="user_lastname">
    </div>
    <div class="form-group" >
        <label for="user_role">User Role</label>
        <select class="form-control" style="width:200px;" name="user_role" id="">
            <option value="subscriber">Select Options</option>
            <option value="admin">Admin</option>
            <option value="subscriber">Suscriber</option>
        </select>
    </div>
    <div class="form-group">
        <label for="post_category">Username</label>
        <input type="text" class="form-control" name="username">
    </div>
    <div class="form-group">
        <label for="post_category">Email</label>
        <input type="text" class="form-control" name="user_email">
    </div>
    <div class="form-group">
        <label for="post_category">Password</label>
        <input type="password" class="form-control" name="user_password">
    </div>

    <div class="form-group">
        <label for="post_category">User Image</label>
        <input type="file"  name="image">
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="create_user" value="Add User">
    </div>
</form>
