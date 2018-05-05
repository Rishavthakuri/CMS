<?php  include "includes/db.php"; ?>
<?php  include "includes/header.php"; ?>
<?php //include "admin/functions.php";?>
<?php session_start();?>
<?php  include "includes/navigation.php"; ?>



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
//        $user_role = $row['user_role'];
        $phone=$row['phone'];
        $post_location_id=$row['post_location_id'];


    }
}
?>


<?php
if(isset($_POST['edit_user'])) {
    // $user_id= $_POST['user_id'];
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
//    $user_role = $_POST['user_role'];
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

    move_uploaded_file($user_image_temp,"images/$user_image");
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
//    $query.= "user_role ='{$user_role}',";
    $query.= "user_email ='{$user_email}',";
    $query.= "user_password ='{$hashed_password}',";
    $query.= "phone ='{$phone}',";
    $query.= "post_location_id ='{$post_location_id}',";
    $query.= "user_image='{$user_image}'";
    $query.= "WHERE username = '{$username}' ";

    $edit_user_query=mysqli_query($connection,$query);
    ConfirmQuery($edit_user_query);
}
?>


<section class="user-profile section">
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1 col-lg-4 offset-lg-0">
                <div class="sidebar">
                    <!-- User Widget -->
                    <div class="widget user-dashboard-profile">
                        <!-- User Image -->
                        <div class="profile-thumb">
                            <img src="images/<?php echo $user_image; ?>" alt="" class="rounded-circle">
                        </div>
                        <!-- User Name -->
                        <h5 class="text-center"><?php echo $username ?></h5>
                        <p class="text-center"><?php echo $user_email ?></p>
<!--                        <p>Joined February 06, 2017</p>-->
                    </div>
                    <!-- Dashboard Links -->
                    <div class="widget user-dashboard-menu">
                        <?php
                        $query = "SELECT * FROM posts";
                        $select_all_posts_query = mysqli_query($connection, $query);
                        while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
                            $post_id = $row['post_id'];
                            $post_title = $row['post_title'];
                            $post_price = $row['post_price'];
                            $post_author = $row['post_user'];
                            $post_date = $row['post_date'];
                            $post_image = $row['post_image'];
                            $post_content = substr($row['post_content'], 0, 100);
                            $post_status = $row['post_status'];
                            $post_category_id = $row['post_category_id'];
                        }
                        ?>
                        <ul>
                            <li>

                                <a href='user-dashboard.php?user=<? echo $_SESSION['username']?>'><i class="fa fa-user"></i> My Ads</a></li>
                            <li>
                                <a href="includes/logout.php"><i class="fa fa-cog"></i> Logout</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-0">
                <!-- Edit Personal Info -->
                <div class="widget personal-info">
                    <h3 class="widget-header user">Edit Personal Information</h3>

                    <form action="" method="post" enctype="multipart/form-data">
                                            <!-- First Name -->
                        <div class="form-group">
                            <label for="first-name">First Name</label>
                            <input type="text" class="form-control"  value="<?php echo $user_firstname ?>" id="first-name" name="user_firstname" >
                        </div>
                        <!-- Last Name -->
                        <div class="form-group">
                            <label for="last-name">Last Name</label>
                            <input type="text" class="form-control"  value="<?php echo $user_lastname ?>" id="last-name" name="user_lastname">
                        </div>

<!--                        <div class="form-group">-->
<!--                            <label for="comunity-name">User Name</label>-->
<!--                            <input type="text" class="form-control" value="--><?php //echo $username ?><!--" id="user-name" name="username">-->
<!--                        </div>-->
                        <!-- File chooser -->
                        <div class="form-group choose-file">
<!--                            <i class="fa fa-user text-center"></i>-->
                            <img style="width: 100px;" src="images/<?php echo $user_image;?>" alt="images">
                            <input type="file"  name="image">
<!--                            <input type="file" class="form-control-file d-inline" id="input-file">-->
                        </div>

                        <!-- Zip Code -->
                        <div class="form-group">
                            <label for="phone-number">Location</label>
                            <select type="text"  class="form-control" id="location" name="post_location">
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

                        <!-- Zip Code -->
                        <div class="form-group">
                            <label for="phone-number">Phone Number</label>
                            <input type="text"  value="<?php echo $phone ?>"  class="form-control" id="phone"  name="phone">
                        </div>

                        <div class="form-group">
                            <h3 class="widget-header user">Edit Password</h3>
                            <label for="current-password">Password</label>
                            <input type="password" value="<?php echo $user_password ?>" class="form-control" name="user_password" id="user_password">
                        </div>

                        <div class="form-group">
                            <h3 class="widget-header user">Edit Email Address</h3>
                            <label for="current-email">Current Email</label>
                            <input type="email" class="form-control" id="current-email" value="<?php echo $user_email ?>" name="user_email" >
                        </div>
                        <!-- Submit button -->
                        <button class="btn btn-transparent" type="submit" name="edit_user">Update Profile</button>
                    </form>
                </div>


            </div>
        </div>
    </div>
</section>



