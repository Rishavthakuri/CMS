<?php
include("delete_modal.php");

if(isset($_POST['checkBoxArray']))
{
   foreach($_POST['checkBoxArray'] as $postValueId)
   {
       $bulk_options =$_POST['bulk_options'];
       switch ($bulk_options){
           case 'published':
               $query ="UPDATE posts SET post_status ='{$bulk_options}' WHERE post_id='{$postValueId}' ";
               $update_to_published_status=mysqli_query($connection,$query);
               ConfirmQuery($update_to_published_status);
               break;
           case 'draft':
               $query ="UPDATE posts SET post_status ='{$bulk_options}' WHERE post_id='{$postValueId}' ";
               $update_to_draft_status=mysqli_query($connection,$query);
               ConfirmQuery($update_to_draft_status);
               break;
           case 'delete':
               $query ="DELETE  FROM posts WHERE post_id ='{$postValueId}' ";
               $update_to_delete_status=mysqli_query($connection,$query);
               ConfirmQuery($update_to_delete_status);
               break;
           case 'clone':
               $query = "SELECT * FROM posts WHERE post_id= '{$postValueId}' ";
               $select_post_query = mysqli_query($connection,$query);
               while($row = mysqli_fetch_assoc($select_post_query)) {
                   $post_title = $row['post_title'];
                   $post_category_id = $row['post_category_id'];
                   $post_date= $row['post_date'];
                   $post_author= $row['post_author'];
                   $post_user= $row['post_user'];
                   $post_status = $row['post_status'];
                   $post_image = $row['post_image'];
                   $post_tags = $row['post_tags'];
                   $post_content = $row['post_content'];
                   $post_location_id = $row['post_location'];
                   $post_price = $row['post_price'];
                   $post_address = $row['post_adddress'];
                   if(empty($post_tags))
                   {
                       $post_tags= "No tags";
                   }


                   }
               $query = "INSERT INTO posts(post_category_id,post_title,post_author,post_user,post_date,post_image,post_content,post_tags
               ,post_status,post_location_id,post_price,post_address) ";
               $query .= "VALUES({$post_category_id},'{$post_title}','{$post_author}','{$post_user}',now(),'{$post_image}',
              '{$post_content}','{$post_tags}','{$post_status}','{$post_location_id}','$post_price','$post_address')";
               $copy_query=mysqli_query($connection,$query);
               if(!$copy_query){
                   die("Query Failed".mysqli_error($connection));
               }
               break;
       }



   }
}

?>


<form action="" method="post">


<table class="table table-bordered table-hover">
    <div id="bulkOptionsContainer" class="col-xs-4">
        <select class="form-control" name="bulk_options" id="">
            <option value="">Select option</option>
            <option value="published">Publish</option>
            <option value="draft">Draft</option>
            <option value="delete">Delete</option>
            <option value="clone">Clone</option>
        </select>
    </div>
    <div class="col-xs-4">
        <input type="submit" name="submit" class="btn btn-success" value="Apply" >
        <a class="btn btn-primary" href="posts.php?source=add_post">Add New</a>
    </div>


    <thead>
    <tr>
        <th><input  id="selectAllBoxes" type="checkbox"></th>
        <th>Id</th>
        <th>User</th>
        <th>Title</th>
        <th>Price</th>
        <th>Categories</th>
        <th>Location</th>
        <th>Address</th>
        <th>Status</th>
        <th>Image</th>
        <th>Tags</th>
        <th>Comments</th>
        <th>Date</th>
        <th>View</th>
        <th>Action</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>

    <?php
    $query = "SELECT * FROM posts  ORDER BY post_id DESC ";
    $select_posts = mysqli_query($connection,$query);
    while($row = mysqli_fetch_assoc($select_posts )) {
        $post_id = $row['post_id'];
        $post_price = $row['post_price'];
        $post_author = $row['post_author'];
        $post_user = $row['post_user'];
        $post_title = $row['post_title'];
        $post_category_id = $row['post_category_id'];
        $post_location_id = $row['post_location_id'];
        $post_address= $row['post_address'];
        $post_status = $row['post_status'];
        $post_image = $row['post_image'];
        $post_tags = $row['post_tags'];
        $post_comment_count = $row['post_comment_count'];
        $post_date = $row['post_date'];
        echo "<tr>";
        ?>
        <td><input  class='checkBoxes' type='checkbox' name='checkBoxArray[]' value='<?php echo $post_id ?>'></td>
        <?php
        echo "<td> $post_id</td>";



        if(!empty($post_author))
        {
            echo"<td>$post_author</td>";
        }
        elseif(!empty($post_user))
        {
            echo"<td>$post_user</td>";
        }


        echo "<td>$post_title </td>";
        echo "<td>$post_price </td>";


        global $connection;
        $query = "SELECT * FROM categories WHERE cat_id={$post_category_id}";
        $select_categories_id = mysqli_query($connection,$query);

        while($row = mysqli_fetch_assoc($select_categories_id)) {
            $cat_id = $row['cat_id'];
            $cat_title = $row['cat_title'];
            echo "<td>{$cat_title}</td>";
        }


        global  $connection;
        $query = "SELECT * FROM location WHERE location_id={$post_location_id}";
        $select_location_id = mysqli_query($connection,$query);

        while($row = mysqli_fetch_assoc($select_location_id)) {
            $location_id = $row['location_id'];
            $location_title = $row['location_title'];
            echo "<td>{$location_title}</td>";
        }

        echo "<td>$post_address </td>";



        echo "<td>$post_status  </td>";
        echo "<td> <img  style='height: 100px;height: 100px;' src='../images/$post_image' alt='image'></td>";
        echo "<td>$post_tags </td>";


        $query = "SELECT * FROM comments WHERE comment_post_id = $post_id ";
        $send_comment_query=mysqli_query($connection,$query);
        $row=mysqli_fetch_array($send_comment_query);
        $comment_id= $row['comment_id'];
        $count_comments=mysqli_num_rows($send_comment_query);


        echo "<td>$count_comments </td>";
        echo "<td> $post_date</td>";
        echo "<td> <a class='btn btn-primary' href='../post.php?p_id={$post_id}'>View Post</a> </td>";
        echo "<td> <a class='btn btn-info' href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a> </td>";

        ?>

    <form  method='post' action="">
        <input type="hidden" name="post_id" value="<?php echo $post_id ?>">
        <?php
        echo '<td><input class="btn btn-danger" type="submit" name="delete" value="Delete"></td>';
        ?>
    </form>

        <?php



        ?>



<!--        echo "<td> <a rel='$post_id' href='javascript:void(0)' class='delete_link'>Delete</a> </td>";-->
         <?php






        //        echo "<td> <a onclick=\"javascript: return confirm0('Are you Sure you Want to Delete?');\" href='posts.php?delete={$post_id}'>Delete</a> </td>";
        echo "<tr>";
    }

    ?>
    </tbody>
</table>
</form>

<?php
if(isset($_POST['delete'])){
 $the_post_id=  $_POST['post_id'];
 $query ="DELETE FROM posts WHERE post_id= {$the_post_id} ";
 $delete_query=mysqli_query($connection,$query);
    header("Location:posts.php");
}
?>


<script>
    $(document).ready(function(){
        $(".delete_link").on('click',function(){

            var id =$(this).attr("rel");
            var delete_url = "posts.php?delete="+ id +" ";

             $(".modal_delete_link").attr("href",delete_url );
            $("#myModal").modal('show');
        });
    });
</script>
