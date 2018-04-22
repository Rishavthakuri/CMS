<?php include "admin/functions.php";?>

<?php


if(ifItIsMethod('post')){
    if(isset($_POST['username']) && isset($_POST['password']))
    {
        login_user($_POST['username'],$_POST['password']);
    }
    else{

        redirect('..cms/index.php');
    }
}
?>



<div class="col-md-4">
    <?php
    if (isset($_POST['submit']))
    {
       $search= $_POST ['search'];
       $query= "SELECT  * FROM posts WHERE post_tags LIKE '%$search%' ";
        $search_query = mysqli_query($connection,$query);

        if(!$search_query){
            die('Query failed'.mysqli_error($connection));
        }
        $count= mysqli_num_rows($search_query);
        if($count==0)
        {
            echo "<h1>No result.</h1>";
       }
       else{
            echo "something";
       }
    }


    ?>



    <!-- Blog Search Well -->
<!--    <div class="well">-->
<!--        <h4>Blog Search</h4>-->
<!--        <form action="search.php" method="post">-->
<!--        <div class="input-group">-->
<!--            <input name="search" type="text" class="form-control">-->
<!--            <span class="input-group-btn">-->
<!--                <button name="submit" class="btn btn-default" type="submit">-->
<!--                    <span class="glyphicon glyphicon-search"></span>-->
<!--                </button>-->
<!--            </span>-->
<!--        </div>-->
<!--        </form> <!-- form search -->
<!--        <!-- /.input-group -->
<!--    </div>-->

    <!-- Login -->
    <div class="well">

        <?php
        if(isset($_SESSION['user_role'])): ?>
                <h4> Logged in as <?php echo $_SESSION['username']?> </h4>
            <a href="includes/logout.php" class="btn btn-primary">Logout</a>
        <?php else: ?>
        <h4 class="text-center">User Login</h4>
        <form  method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input name="username" type="text" placeholder="Enter your Username" class="form-control">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input name="password" type="password" placeholder="Enter your Password" class="form-control">
            </div>
            <div class="form-group">
                <input class="btn btn-primary" type="submit" name="login" value="Login">
            </div>

            <div class="form-group">
                <a href="forget.php?forgot=<?php echo uniqid(true);?>">Forget Password</a>
            </div>
        </form>


        <?php  endif; ?>



            </div>
        <!-- form search -->
        <!-- /.input-group -->




    <!-- Blog Categories Well -->
    <div class="well">
        <?php
        $query = "SELECT * FROM categories";
        $select_categories_sidebar = mysqli_query($connection,$query);

        ?>
        <h4>Blog Categories</h4>
        <div class="row">
            <div class="col-lg-12">
                <ul class="list-unstyled">
                    <?php
                    while($row = mysqli_fetch_assoc($select_categories_sidebar ))
                    {
                        $cat_title = $row['cat_title'];
                        $cat_id = $row['cat_id'];
                        echo"<li><a href='category.php?category=$cat_id'>{$cat_title}</a></li>";

                    }
                    ?>

                </ul>
            </div>
        </div>
    </div>




        <!-- Side Widget Well -->
        <?php include "widget.php";?>

    </div>