

<?php
if(isset($_GET['p_id'])){
    $the_post_id= $_GET['p_id'];

}
    $query = "SELECT * FROM posts WHERE post_id= $the_post_id";
    $select_posts_by_id = mysqli_query($connection,$query);
    while($row = mysqli_fetch_assoc($select_posts_by_id)) {
        $post_id = $row['post_id'];
        $post_price = $row['post_price'];
        $post_user = $row['post_user'];
        $post_title = $row['post_title'];
        $post_category_id = $row['post_category_id'];
        $post_status = $row['post_status'];
        $post_image = $row['post_image'];
        $post_content = $row['post_content'];
        $post_location_id = $row['post_location_id'];
        $post_address = $row['post_address'];
        $post_tags = $row['post_tags'];
        $post_comment_count = $row['post_comment_count'];
        $post_date = $row['post_date'];
    }
    if(isset($_POST['update_post'])){

        $post_user = $_POST['post_user'];
        $post_price = $_POST['post_price'];
        $post_title = $_POST['title'];
        $post_category_id = $_POST['post_category'];
        $post_status = $_POST['post_status'];
        $post_image = $_FILES['image']['name'];
        $post_image_temp = $_FILES['image']['tmp_name'];
        $post_content = $_POST['post_content'];
        $post_location_id = $_POST['post_location'];
        $post_address = $_POST['post_address'];
        $post_tags = $_POST['post_tags'];

        move_uploaded_file($post_image_temp,"../images/$post_image");
        if(empty($post_image)){
            $query= "SELECT * FROM posts WHERE post_id= $the_post_id";
            $select_image=mysqli_query($connection,$query);
            while($row = mysqli_fetch_array($select_image)) {
            $post_image = $row['post_image'];

             }
        }

        $query= "UPDATE posts SET ";
        $query.= "post_title ='{$post_title}',";
        $query.= "post_price ='{$post_price}',";
        $query.= "post_category_id ='{$post_category_id}',";
        $query.= "post_date =now(),";
        $query.= "post_user ='{$post_user}',";
        $query.= "post_status ='{$post_status}',";
        $query.= "post_tags ='{$post_tags}',";
        $query.= "post_content ='{$post_content}',";
        $query.= "post_location_id ='{$post_location_id}',";
        $query.= "post_address ='{$post_address}',";
        $query.= "post_image ='{$post_image}'";
        $query.= "WHERE post_id = {$the_post_id} ";


        $update_post=mysqli_query($connection,$query);
        ConfirmQuery($update_post);
?>
        <script>
        $.simplyToast('Post has been Updated.');
        </script>
<?php

    }
?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Post Title</label>
        <input value="<?php echo $post_title; ?>" type="text" class="form-control" name="title">
    </div>
    <div class="form-group">
        <label for="title">Price</label>
        <input value="<?php echo $post_price; ?>" type="text" class="form-control" name="post_price">
    </div>
    <div class="form-group" >
        <label for="category">Category</label>
        <select class="form-control" style="width:200px;" name="post_category" id="">
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
        <label for="post_address">Address</label>
        <input value="<?php echo $post_address; ?>" type="text" class="form-control" name="post_address">
    </div>
<!--    <div class="form-group">-->
<!--        <label for="post_category">Post Author</label>-->
<!--        <input  value="--><?php //echo $post_user; ?><!--" type="text" class="form-control"  name="post_user">-->
<!--    </div>-->


    <div class="form-group" >
        <label for="category">Users</label>
        <select class="form-control" style="width:200px;" name="post_user" id="">
            <?php echo "<option  value='{$username}'>{$post_user}</option>";  ?>
            <?php
            $cat_id = $_GET['edit'];
            $users_query = "SELECT * FROM users ";
            $select_users = mysqli_query($connection,$users_query);
            ConfirmQuery($select_users);
            while($row = mysqli_fetch_assoc($select_users)) {
                $user_id = $row['user_id'];
                $username = $row['username'];
                echo "<option  value='{$username}'>{$username}</option>";
            }

            ?>
        </select>
    </div>


    <div class="form-group">
        <label for="">Post Status</label>
        <select class="form-control" style="width:200px;" name="post_status" id="">
            <option value='<?php echo $post_status ?>'><?php echo $post_status; ?></option>
            <?php
            if($post_status == 'published')
            {
                echo "<option  value='draft'>Draft</option>";
            }
            else{
                echo "<option  value='published'>Publish</option>";
            }
            ?>

        </select>

    </div>





    <div class="form-group">
       <img style="width: 100px;" src="../images/<?php echo $post_image;?>" alt="images">
        <input type="file"  name="image">
    </div>
    <div class="form-group">
        <label for="post_category">Post Tags</label>
        <input value="<?php echo $post_tags; ?>" type="text" class="form-control" name="post_tags">
    </div>
    <div class="form-group">
        <label for="post_category">Post Content</label>
        <textarea type="text" class="form-control" name="post_content" id="" cols="30" rows="10"><?php echo $post_content; ?>
        </textarea>
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="update_post" value="Update Post">
    </div>
</form>