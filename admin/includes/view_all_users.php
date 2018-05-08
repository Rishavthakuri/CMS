
<?php
include("delete_modal.php");
echo"<a  href='users.php?source=add_user'><h4  style='text-align: center'> Add User</h4></a>";
?>
<table class="table table-bordered table-hover">
    <thead>
    <tr>
        <th>Id</th>
        <th>Username</th>
        <th>Phone</th>
        <th>UserImage</th>
        <th>Email</th>
        <th>Role</th>
        <th>Change Role to</th>
        <th>Change Role to</th>
        <th>Action</th>
        <th>Action</th>

    </tr>
    </thead>
    <tbody>

    <?php
    $query = "SELECT * FROM users ";
    $select_users = mysqli_query($connection,$query);
    while($row = mysqli_fetch_assoc($select_users )) {
        $user_id = $row['user_id'];
        $username= $row['username'];
        $user_password= $row['user_password'];
        $user_firstname= $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $phone = $row['phone'];
        $user_email = $row['user_email'];
        $user_image = $row['user_image'];
        $user_role = $row['user_role'];

        echo "<tr>";
        echo "<td> $user_id </td>";
        echo "<td> $username </td>";
        echo "<td> $phone </td>";

        echo "<td> <img  style='height: 80px;height: 80px;' src='../images/$user_image' alt='image'> </td>";
        echo "<td> $user_email </td>";
        echo "<td> $user_role </td>";
        echo "<td> <a  class='btn btn-success' href='users.php?change_to_admin={$user_id}'>Admin</a> </td>";
        echo "<td> <a class='btn btn-warning' href='users.php?change_to_sub={$user_id}'> Subscriber </a></td>";
        echo "<td> <a class='btn btn-info' href='users.php?source=edit_user&edit_user={$user_id}'>Edit</a> </td>";
//        echo "<td> <a class='btn btn-danger' rel='$user_id' href='javascript:void(0)' class='delete_link'>Delete</a> </td>";
        echo "<td> <a class='btn btn-danger' onclick=\"javascript: return confirm('Are you Sure you Want to Delete?');\" href='users.php?delete={$user_id}'>Delete</a> </td>";
        echo "<tr>";
    }

    ?>
    </tbody>
</table>

<?php
if(isset($_GET['change_to_admin'])){
    $the_user_id=  $_GET['change_to_admin'];
    $query ="UPDATE users SET user_role = 'admin' WHERE user_id = $the_user_id";
    $change_to_admin_query=mysqli_query($connection,$query);
    header("Location:users.php");
}




if(isset($_GET['change_to_sub'])){
    $the_user_id=  $_GET['change_to_sub'];
    $query ="UPDATE users SET user_role = 'subscriber' WHERE user_id = $the_user_id";
    $change_to_query=mysqli_query($connection,$query);
    header("Location:users.php");
}




if(isset($_GET['delete'])) {
    if (isset($_SESSION['user_role'])) {
        if ($_SESSION['user_role'] == 'admin') {
            $the_user_id = mysqli_real_escape_string($connection,$_GET['delete']) ;
            $query = "DELETE FROM users WHERE user_id= {$the_user_id} ";
            $delete_user_query = mysqli_query($connection, $query);
            header("Location:users.php");
        }
    }
}
?>

<!---->
<!--<script>-->
<!--    $(document).ready(function(){-->
<!--        $(".delete_link").on('click',function(){-->
<!---->
<!--            var id =$(this).attr("rel");-->
<!--            var delete_url = "users.php?delete="+ id +" ";-->
<!---->
<!--            $(".modal_delete_link").attr("href",delete_url );-->
<!--            $("#myModal").modal('show');-->
<!--        });-->
<!--    });-->
<!--</script>-->
<!---->
