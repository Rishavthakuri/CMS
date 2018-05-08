<?php  include "includes/db.php"; ?>
<?php  include "includes/header.php"; ?>
<?php //include "admin/functions.php";?>
<?php session_start();?>
<?php  include "includes/navigation.php"; ?>





<section class="dashboard section">
    <!-- Container Start -->
    <div class="container">
        <!-- Row Start -->
        <div class="row">



            <div class="col-md-10 offset-md-1 col-lg-4 offset-lg-0">
                <div class="sidebar">
                    <!-- User Widget -->
                    <div class="widget user-dashboard-profile">
                        <?php
                        if(isset($_SESSION['username'])) {

                            $username = $_SESSION['username'];
                            $query = "SELECT * FROM users WHERE username ='{$username}' ";
                            $select_user_profile_query = mysqli_query($connection, $query);
                            while ($row = mysqli_fetch_array($select_user_profile_query)) {
                                $user_id = $row['user_id'];
                                $user_email = $row['user_email'];
                                $user_image = $row['user_image'];


                            }
                        }
                        ?>

                        <!-- User Image -->
                        <div class="profile-thumb">
                            <img src="images/<?php echo $user_image; ?>" alt="Image not Found"  o class="rounded-circle">
                        </div>
                        <!-- User Name -->
                        <h5 class="text-center"><?php echo $username ?></h5>
                        <p class="text-center"><?php echo $user_email ?></p>
                        <a href="http://localhost:81/cms/account-profile.php" class="btn btn-main-sm">Edit Profile</a>
                    </div>
                    <!-- Dashboard Links -->
                    <div class="widget user-dashboard-menu">
                        <ul>
                            <li class="active">
                                <a href=""><i class="fa fa-user"></i> My Ads</a></li>
                            <li>

                                <a href="includes/logout.php"><i class="fa fa-cog"></i> Logout</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>



            <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-0">
                <!-- Recently Favorited -->
                <div class="widget dashboard-container my-adslist">
                    <h3 class="widget-header">My Ads</h3>
                    <table class="table table-responsive product-dashboard-table">
                        <thead>
                        <tr>
                            <th>Image</th>
                            <th>Product Title</th>
                            <th class="text-center">Category</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php

                        if(isset($_GET['user'])){

                            $the_post_user=$_GET['user'];

                            }

                        $query = "SELECT * FROM posts WHERE post_user= '{$the_post_user}'";
                        $select_all_posts_query = mysqli_query($connection, $query);
                        while ($row = mysqli_fetch_assoc($select_all_posts_query))
                        {
                            $post_title = $row['post_title'];
                            $post_author = $row['post_user'];
                            $post_date = $row['post_date'];
                            $post_image = $row['post_image'];
                            $post_category_id = $row['post_category_id'];
                            $post_price = $row['post_price'];


                            ?>
                            <td class="product-thumb">
                                <img width="80px" height="auto" src="images/<?php echo $post_image; ?>" alt="image description"></td>
                            <td class="product-details">
                                <h3 class="title"><?php echo $post_title ?></h3>
                                <span><strong>Posted on: </strong><time><?php echo $post_date ?></time> </span>
                                <span><strong>Price: </strong><time><?php echo $post_price ?></time> </span>
                            </td>
                            <td class="product-category">
                        <span class="categories">
                            <?php
                            global $connection;
                            $query = "SELECT * FROM categories WHERE cat_id={$post_category_id}";
                            $select_categories_id = mysqli_query($connection,$query);

                            while($row = mysqli_fetch_assoc($select_categories_id)) {
                                $cat_id = $row['cat_id'];
                                $cat_title = $row['cat_title'];
                                echo "{$cat_title}";
                            }
                            ?>
                        </span>
                            </td>
                            </tr>


                            <?php
                        }
                        ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <!-- Row End -->
    </div>
    <!-- Container End -->
</section>