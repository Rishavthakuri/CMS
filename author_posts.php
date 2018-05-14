<?php include "includes/db.php"; ?>
<?php include "includes/header.php"?>

    <!-- Navigation -->
<?php session_start();?>
<?php include "includes/navigation.php"?>




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


<?php
            if(isset($_GET['p_id'])) {
                $the_post_id = $_GET['p_id'];


                if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'admin') {
                    $query = "SELECT * FROM posts WHERE post_id = $the_post_id ";

                } else {
                    $query = "SELECT * FROM posts WHERE post_id = $the_post_id  AND post_status ='published' ";

                }

                $select_all_posts_query = mysqli_query($connection, $query);
                if (mysqli_num_rows($select_all_posts_query) < 1) {
                    echo " <h1 class='text-center'>No post Available.</h1>";
                } else {


                    while ($row = mysqli_fetch_assoc($select_all_posts_query)) {

                        $post_title = $row['post_title'];
                        $post_user = $row['post_user'];
                        $post_user_phone = $row['post_user_phone'];
                        $post_user_image = $row['post_user_image'];
                        $post_date = $row['post_date'];
                        $post_image = $row['post_image'];
                        $post_content = $row['post_content'];
                        $post_category_id = $row['post_category_id'];
                        $post_location_id = $row['post_location_id'];
                        $post_price = $row['post_price'];
                        $post_address = $row['post_address'];

                    }
                }
            }
                        ?>

    <section class="dashboard section">
    <!-- Container Start -->
    <div class="container">
    <!-- Row Start -->
    <div class="row">
    <div class="col-md-10 offset-md-1 col-lg-4 offset-lg-0">
        <div class="sidebar">
            <!-- User Widget -->
            <div class="widget user-dashboard-profile">
                <!-- User Image -->
                <div class="profile-thumb">
                    <img src="images/<?php echo $post_user_image?>" alt="" class="rounded-circle">
                </div>
                <!-- User Name -->
                <h5 class="text-center"><?php echo $post_user ?></h5>
            </div>

        </div>
    </div>
    <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-0">
        <!-- Recently Favorited -->
        <div class="widget dashboard-container my-adslist">
            <h3 class="widget-header"> <?php  echo $post_user?> Ads</h3>
            <table class="table table-responsive product-dashboard-table">
                <thead>
                <tr>
                    <th>Image</th>
                    <th>Product Title</th>
                    <th class="text-center">Category</th>
                    <th class="text-center">Action</th>
                </tr>
                </thead>
                <tbody>


                <tr>
            <?php
            if(isset($_GET['p_id'])){
                $the_post_id=$_GET['p_id'];

                $the_post_author=$_GET['author'];
            }

            $query = "SELECT * FROM posts WHERE post_user = '{$the_post_author}'  ORDER BY post_id DESC ";
            $select_all_posts_query = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_assoc($select_all_posts_query))
            {
                $post_id=$row['post_id'];
            $post_title = $row['post_title'];
            $post_author = $row['post_user'];
            $post_date = $row['post_date'];
            $post_image = $row['post_image'];
            $post_content = $row['post_content'];
            $post_category_id = $row['post_category_id'];
            $post_location_id = $row['post_location_id'];
            $post_price = $row['post_price'];
            $post_address = $row['post_address'];

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
                    <td class="action" data-title="Action">
                        <div class="">
                            <ul class="list-inline justify-content-center">
                                <li class="list-inline-item">
                                    <a data-toggle="tooltip" data-placement="top" title="Tooltip on top" class="view" href="post.php?p_id=<?php echo $post_id; ?>">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
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


<?php include "includes/footer.php"?>