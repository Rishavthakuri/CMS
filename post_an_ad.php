<?php  include "includes/db.php"; ?>
<?php  include "includes/header.php"; ?>
<?php //include "admin/functions.php";?>
<?php session_start();?>
<?php  include "includes/navigation.php"; ?>



<?php
if(isset($_POST['create_post'])) {
    $post_title = $_POST['title'];
    $post_user = $_SESSION['username'];
    $post_category_id = $_POST['post_category'];
//    $post_status = $_POST['post_status'];
    $post_image = $_FILES['image']['name'];
    $post_image_temp = $_FILES['image']['tmp_name'];
    $post_tags = $_POST['post_tags'];
    $post_content = $_POST['post_content'];
    $post_location_id = $_POST['post_location'];

    $post_price = $_POST['post_price'];
    $post_address = $_POST['post_address'];

    $post_date = date('d-m-y');
    //$post_comment_count = 4;

    move_uploaded_file($post_image_temp, "images/$post_image");
    $query = "INSERT INTO posts(post_category_id,post_user,post_title,post_date,post_image,post_content,post_tags
    ,post_location_id,post_price,post_address) ";
    $query .= "VALUES({$post_category_id},'{$post_user}','{$post_title}',now(),'{$post_image}',
              '{$post_content}','{$post_tags}','{$post_location_id}','{$post_price}','{$post_address}') ";
    $create_post_query=mysqli_query($connection,$query);
    ConfirmQuery($create_post_query);
    $the_post_id= mysqli_insert_id($connection);
//    echo" <h4 style='color: red;' class='bg-success'>Post Created (<a href='../post.php?p_id={$the_post_id}' >View post</a>)</h4> ";
}
?>
<div class=" banner text-center">
    <div class="container">
        <h1>Sell or Advertise   <span class="segment-heading">    anything online </span> with adsnagar</h1>
        <p>Advertisement For All</p>

    </div>
</div>

<h2 class="col-md-offset-1">Post an Ad</h2>
<br>
<div class="well col-md-offset-1 col-md-7">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="title">Post Title *</label>
            <input type="text" style="width:700px;" class="form-control" name="title" required>
        </div>

        <div class="form-group">
            <label for="title">Price(Rs.) *</label>
            <input type="text" style="width:700px;" class="form-control" name="post_price" required>
        </div>
        <div class="form-group" >
            <label for="category">Category *</label>
            <select class="form-control" style="width:700px;" name="post_category" required>
                <?php
                $cat_id = $_GET['edit'];
                $query = "SELECT * FROM categories ";
                $select_categories = mysqli_query($connection,$query);
                ConfirmQuery($select_categories);
                while($row = mysqli_fetch_assoc($select_categories)) {
                    $cat_id = $row['cat_id'];
                    $cat_title = $row['cat_title'];
                    echo "<option  value='$cat_id'>{$cat_title}</option>";
                }

                ?>
            </select>
        </div>

        <div class="form-group" >
            <label for="category">Location *</label>
            <select class="form-control" style="width:700px;" name="post_location" id="" required>
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
            <label for="post_address">Address/City *</label>
            <input type="text" style="width:700px;" class="form-control" name="post_address" required>
        </div>

<!--        <div class="form-group" >-->
<!--            <label for="category">Users</label>-->
<!--            <select class="form-control" style="width:200px;" name="post_user" id="">-->
<!--                --><?php
//                $cat_id = $_GET['edit'];
//                $users_query = "SELECT * FROM users ";
//                $select_users = mysqli_query($connection,$users_query);
//                ConfirmQuery($select_users);
//                while($row = mysqli_fetch_assoc($select_users)) {
//                    $user_id = $row['user_id'];
//                    $username = $row['username'];
//                    echo "<option  value='{$username}'>{$username}</option>";
//                }
//
//                ?>
<!--            </select>-->
<!--        </div>-->
<!--        <div class="form-group">-->
<!--            <label for="post_category">Post Status</label>-->
<!---->
<!--            <select class="form-control" style="width:200px;" name="post_status" id="">-->
<!--                <option value="draft">Select option</option>-->
<!--                <option value="published">Publish</option>-->
<!--                <option value="draft">Draft</option>-->
<!--            </select>-->
<!---->
<!--        </div>-->
        <div class="form-group">
            <label for="post_category">Post Image *</label required>
            <input type="file"  name="image">
        </div>
        <div class="form-group">
            <label for="post_category">Post Tags</label>
            <input type="text" style="width:700px;"  class="form-control" name="post_tags">
        </div>
        <div class="form-group">
            <label for="post_category">Post Content *</label>
            <textarea type="text"  style="width:700px;" class="form-control" name="post_content" id=""  cols="30" rows="10" required>
        </textarea>
        </div>

        <div class="form-group">
            <input type="submit" class="btn btn-primary  btn-lg" name="create_post" value="Post Ad">
        </div>
    </form>
</div>

