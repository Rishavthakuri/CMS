<?php include 'includes/admin_header.php' ?>
<?php
if(isset($_SESSION['username'])) {

    $username = $_SESSION['username'];
    $query = "SELECT * FROM users WHERE username ='{$username}' ";
    $select_user_profile_query = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_array($select_user_profile_query)) {
        $user_id = $row['user_id'];
        $user_password= $row['user_password'];
        $user_firstname= $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_email = $row['user_email'];
        $user_image = $row['user_image'];
        $user_role = $row['user_role'];
        $phone=$row['phone'];
        $post_location_id=$row['post_location_id'];


    }
}



if(isset($_POST['edit_user'])) {
    // $user_id= $_POST['user_id'];
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_role = $_POST['user_role'];
//    $post_image = $_FILES['image']['name'];
//    $post_image_temp = $_FILES['image']['tmp_name'];


    $user_image = $_FILES['image']['name'];
    $user_image_temp = $_FILES['image']['tmp_name'];
    $user_email = $_POST['user_email'];

    $user_password = $_POST['user_password'];
    $phone = $_POST['phone'];
    $post_location_id = $_POST['post_location'];

//    $post_date = date('d-m-y');
    //$post_comment_count = 4;

    move_uploaded_file($user_image_temp,"../images/$user_image");
    if(empty($user_image)){
        $query= "SELECT * FROM users WHERE username ='{$username}' ";
        $select_image=mysqli_query($connection,$query);
        while($row = mysqli_fetch_array($select_image)) {
            $user_image = $row['user_image'];

        }
    }

    $query= "SELECT randSalt FROM users";
    $select_randSalt_query=mysqli_query($connection,$query);
    if(!$select_randSalt_query){
        die("Query Failed".mysqli_error($connection));
    }


    $row=mysqli_fetch_array($select_randSalt_query);
    $salt=$row['randSalt'];
    $hashed_password=crypt($user_password,$salt);

//    move_uploaded_file($post_image_temp, "../images /$post_image");
    $query= "UPDATE users SET ";
    $query.= "user_firstname ='{$user_firstname}',";
    $query.= "user_lastname ='{$user_lastname}',";
    $query.= "user_role ='{$user_role}',";

    $query.= "user_email ='{$user_email}',";
    $query.= "user_password ='{$hashed_password}',";
    $query.= "phone ='{$phone}',";
    $query.= "post_location_id ='{$post_location_id}',";
    $query.= "user_image='{$user_image}'";
    $query.= "WHERE username ='{$username}' ";

    $edit_user_query=mysqli_query($connection,$query);
    ConfirmQuery($edit_user_query);
}
?>



    <div id="wrapper">



    <!-- Navigation -->
    <?php include "includes/admin_navigation.php" ?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome to Account Profile
                        <small></small>
                    </h1>


                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="user_firstname">First Name</label>
                            <input type="text" value="<?php echo $user_firstname ?>" class="form-control" name="user_firstname">
                        </div>
                        <div class="form-group">
                            <label for="user_firstname">Last Name</label>
                            <input type="text" value="<?php echo $user_lastname ?>" class="form-control" name="user_lastname">
                        </div>
                        <div class="form-group" >
                            <label for="user_role">User Role</label>

                            <select class="form-control" style="width:200px;" name="user_role" id="">
                                <option value="subscriber"><?php echo $user_role;?></option>
                                <?php
                                if($user_role=='admin'){
                                    echo "<option value='subscriber'>subscriber</option>";

                                }
                                else{
                                    echo "<option value='admin'>admin</option>";
                                }
                                ?>



                            </select>
                        </div>
<!--                        <div class="form-group">-->
<!--                            <label for="post_category">Username</label>-->
<!--                            <input type="text" value="--><?php //echo $username ?><!--" class="form-control" name="username">-->
<!--                        </div>-->

                        <div class="form-group">
                            <label for="post_category">Phone Number</label>
                            <input type="text" value="<?php echo $phone ?>" class="form-control" name="phone">
                        </div>
                        <div class="form-group" >
                            <label for="category">Location</label>
                            <select class="form-control" style="width:200px;" name="post_location" id="">
                                <?php
                                $location_id = $_GET['edit'];
                                $query = "SELECT * FROM location ";
                                $select_location = mysqli_query($connection,$query);
                                ConfirmQuery($select_location);
                                while($row = mysqli_fetch_assoc($select_location)) {
                                    $location_id = $row['location_id'];
                                    $location_title = $row['location_title'];
                                    echo "<option  value='$location_id'>{$location_title}</option>";
                                }

                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="post_category">Email</label>
                            <input type="text" value="<?php echo $user_email ?>" class="form-control" name="user_email">
                        </div>
                        <div class="form-group">
                            <label for="post_category">Password</label>
                            <input type="password" value="<?php echo $user_password ?>" class="form-control" name="user_password">
                        </div>

                        <div class="form-group">
                            <img style="width: 100px;" src="../images/<?php echo $user_image;?>" alt="images">
                            <input type="file"  name="image">
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" name="edit_user" value="Update Profile">
                        </div>
                    </form>


                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

<?php include 'includes/admin_footer.php' ?>