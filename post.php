<?php include "includes/db.php"; ?>
<?php include "includes/header.php"?>
<?php //  include "admin/functions.php";?>
<?php session_start();?>
    <!-- Navigation -->
<?php include "includes/navigation.php"?>


<!-- Login Form -->


<div id="id01" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">

        <div class="w3-center"><br>
            <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-xlarge w3-transparent w3-display-topright" title="Close Modal">×</span>
            <img src="images/avatar3.png" alt="Avatar" style="width:30%" class="w3-circle w3-margin-top">
        </div>

        <form class="w3-container" id="login-form"  method="post">
            <div class="w3-section">
                <h2 class="text-center">Login</h2>
                <label><b>Username</b></label>
                <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Username" name="username" required>
                <label><b>Password</b></label>
                <input class="w3-input w3-border" type="password" placeholder="Enter Password" name="password" required>
                <button class="w3-button w3-block w3-green w3-section w3-padding" type="submit" value="Login" name="login">Login</button>
                <!--                    <input class="w3-check w3-margin-top" type="checkbox" checked="checked"> Remember me-->

            </div>
        </form>

        <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
            <button onclick="document.getElementById('id01').style.display='none'" type="button" class="w3-button w3-red">Cancel</button>
            <span class="w3-right w3-padding w3-hide-small"><a href="forget.php?forgot=<?php echo uniqid(true);?>">Forget password?</a></span>
        </div>
    </div>
</div>
<!-- Login Form Ends -->



<section class="section bg-gray">
    <!-- Container Start -->
    <div class="container">
        <div class="row">

            <?php
            if(isset($_GET['p_id'])) {
                $the_post_id = $_GET['p_id'];


                if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'admin') {
                    $query = "SELECT * FROM posts WHERE post_id = $the_post_id ";

                }
                else {
                    $query = "SELECT * FROM posts WHERE post_id = $the_post_id  AND post_status ='published' ";

                }

                $select_all_posts_query = mysqli_query($connection, $query);
                if (mysqli_num_rows($select_all_posts_query) < 1) {
                    echo " <h1 class='text-center'>No post Available.</h1>";
                }
                else {


                    while ($row = mysqli_fetch_assoc($select_all_posts_query)) {

                        $post_title = $row['post_title'];
                        $post_user = $row['post_user'];
                        $post_date = $row['post_date'];
                        $post_image = $row['post_image'];
                        $post_content = $row['post_content'];
                        $post_category_id = $row['post_category_id'];
                        $post_location_id = $row['post_location_id'];
                        $post_price = $row['post_price'];
                        $post_address = $row['post_address'];


                        ?>


                        <div class="col-md-8">
                            <div class="product-details">
                                <h1 class="product-title"><?php echo $post_title ?></h1>
                                <div class="product-meta">
                                    <ul class="list-inline">
                                        <li class="list-inline-item"><i class="fa fa-user-o"></i> By <a href=""><?php echo $post_user ?></a></li>
                                        <li class="list-inline-item"><i class="fa fa-folder-open-o"></i> Category<a href="category.php?category=$cat_id">
                                                <?php
                                                global $connection;
                                                $query = "SELECT * FROM categories WHERE cat_id={$post_category_id}";
                                                $select_categories_id = mysqli_query($connection,$query);

                                                while($row = mysqli_fetch_assoc($select_categories_id)) {
                                                    $cat_id = $row['cat_id'];
                                                    $cat_title = $row['cat_title'];
                                                    echo "<td>{$cat_title}</td>";
                                                }
                                                ?>
                                            </a></li>
                                        <li class="list-inline-item"><i class="fa fa-location-arrow"></i> Location
                                                <?php
                                                global  $connection;
                                                $query = "SELECT * FROM location WHERE location_id={$post_location_id}";
                                                $select_location_id = mysqli_query($connection,$query);

                                                while($row = mysqli_fetch_assoc($select_location_id)) {
                                                    $location_id = $row['location_id'];
                                                    $location_title = $row['location_title'];
                                                    echo "<td>{$location_title}</td>";
                                                }
                                                ?>
                                            </li>
                                    </ul>
                                </div>
                                <div id="carouselExampleIndicators" class="product-slider carousel slide" data-ride="carousel">

                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img class="d-block w-100" style="width:500px;height:350px;" src="images/<?php echo $post_image; ?>" alt="Card image cap">
                                        </div>

                                </div>
                                    <div class="content">
                                        <div class="tab-content">
                                            <h3 class="tab-title">Product Description</h3>
                                            <p><?php echo $post_content ?></p>
                                        </div>


                                        <div class="comment">
                                            <h4>Leave a Comment:</h4>
                                            <form action="" method="post" role="form">
                                                <div class="form-group">
                                                    <label for="comment_author">Author</label>
                                                    <input type="text" class="form-control" name="comment_author">
                                                </div>
                                                <div class="form-group">
                                                    <label for="comment_email">Email</label>
                                                    <input type="email" class="form-control" name="comment_email">
                                                </div>
                                                <div class="form-group">
                                                    <label for="comment_content">Your Text Here</label>
                                                    <textarea class="form-control" name="comment_content" rows="3"></textarea>
                                                </div>
                                                <button type="submit" class="btn btn-primary" name="create_comment">Submit</button>
                                            </form>
                                            <hr >

                                            <h4 id="post-comment">Post Comments :</h4>


                                                <?php

                    $query = "SELECT * FROM comments WHERE comment_post_id = {$the_post_id} ";
                    $query .= "AND comment_status = 'approved' ";
                    $query .= "ORDER BY comment_id DESC";
                    $select_comment_query = mysqli_query($connection, $query);
                    if (!$select_comment_query) {
                        die("Query Failed" . mysqli_error($connection));
                    }


                    while ($row = mysqli_fetch_assoc($select_comment_query)) {
                        $comment_date = $row['comment_date'];
                        $comment_content = $row['comment_content'];
                        $comment_author = $row['comment_author'];
                        $comment_email = $row['comment_email'];
                        ?>

                        <div class="media">
                            <a class="pull-left" href="http://placehold.it/64x64">
                                <img class="media-object" style="height: 50px;width: 50px;" src="images/avatar3.png" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading"><?php echo $comment_author ?>
                                    <small><?php echo $comment_date ?></small>
                                </h4>
<!--                                <small>--><?php //echo $comment_email ?><!--</small>-->

                                <p><?php echo $comment_content ?></p>

                            </div>
                        </div>

                        <?php

                    }

                    ?>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="sidebar">
                                <div class="widget price text-center">
                                    <h4>Price</h4>
                                    <p>Rs.<?php echo  $post_price ?></p>
                                </div>
                                <!-- User Profile widget -->
                                <div class="widget user">
                                    <h3 style="margin-left:80px;margin-bottom:50px;">Contact  Seller</h3>
                                    <div class="user-image">
                                        <img class="rounded-circle" style="height: 200px;width: 200px;" src="images/avatar2.png" alt="">
                                    </div>


                                    <h3 style=" margin-left:110px;"><?php echo $post_user ?></h3>
                                    <!--                    <h4 style=" margin-left:100px;">--><?php //echo $location_title ?><!--</h4>-->

                                    <a style="margin-left:110px;color: #00cc00;"  href="author_posts.php?author=<?php echo $post_user ?>&p_id=<?php echo $the_post_id ?>">See all ads</a>
                                </div>
                                <!-- Map Widget -->
                                <div class="widget user">
                                    <div class="map">
                                        <ul class="list-inline mt-20">
                                            <li class="list-inline-item"> <a href="" class="btn btn-contact">Interested in this Ad? Contact the Seller!</a></li>

                                        <p>Phone Number : </p>
                                            <p> Address :  <?php echo $location_title ?>  </p>

                                        </ul>
                                    </div>
                                </div>
                                <!-- Rate Widget -->
                                <div class="widget rate">
                                    <!-- Heading -->
                                    <h5 class="widget-header text-center">What would you rate
                                        <br>
                                        this product</h5>
                                    <!-- Rate -->
                                    <div class="starrr"></div>
                                </div>
                                <!-- Safety tips widget -->
                                <div class="widget disclaimer">
                                    <h5 class="widget-header">Safety Tips</h5>
                                    <ul>
                                        <li>Meet seller at a public place</li>
                                        <li>Check the item before you buy</li>
                                        <li>Pay only after collecting the item</li>
                                        <li>Pay only after collecting the item</li>
                                    </ul>
                                </div>
                                <!-- Coupon Widget -->

                            </div>
                        </div>


                        <?php
                    }
            ?>
        </div>
    </div>
</section>







<!-- Blog Comments -->

<?php
if (isset($_POST['create_comment']))
{
    $the_post_id = $_GET['p_id'];
    $comment_author = $_POST['comment_author'];
    $comment_email = $_POST['comment_email'];
    $comment_content = $_POST['comment_content'];

            if (!empty($comment_author) && !empty($comment_email) && !empty($comment_content))
            {
                $query = "INSERT INTO comments(comment_post_id,comment_author,comment_email,
                 comment_content,comment_status,comment_date)";
                            $query .= "VALUES($the_post_id,'{$comment_author}','{$comment_email}',
                 '{$comment_content}','unapproved',now())";
                            $create_comment_query = mysqli_query($connection, $query);
                            if (!$create_comment_query)
                            {
                                die("Query Failed" . mysqli_error($connection));
                            }
            }

            else {
                echo "<script>alert('Fields cannot be Empty')</script>";
                }
        }
        ?>
<?php
                }
            }
            else{
                header("Location: index.php");
            }



            ?>





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
<?php include "includes/footer.php"?>




