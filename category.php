<?php include "includes/db.php"; ?>
<?php include "includes/header.php"?>

<?php session_start();?>
    <!-- Navigation -->
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







<section class="section-sm">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="search-result bg-gray">

                    <h2>Results For </h2>
                    <p>123 Results on 12 December, 2017</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="category-sidebar">
                    <div class="widget category-list">
                        <?php
                        $query = "SELECT * FROM categories";
                        $select_categories_sidebar = mysqli_query($connection,$query);

                        ?>
                        <h4 class="widget-header">All Category</h4>
                        <ul class="category-list">
                            <?php
                            while($row = mysqli_fetch_assoc($select_categories_sidebar ))
                            {
                                $cat_title = $row['cat_title'];
                                $cat_id = $row['cat_id'];
                                echo"<li><a href='category.php?category=$cat_id'>{$cat_title}</a></li>";

                            }
                            ?>

                        <h4 class="widget-header">Nearby</h4>
                        <ul class="category-list">
                            <?php
                            $query = "SELECT * FROM location";
                            $select_location_sidebar = mysqli_query($connection,$query);

                            ?>
                            <?php
                            while($row = mysqli_fetch_assoc($select_location_sidebar ))
                            {
                                $location_title = $row['location_title'];
                                $location_id = $row['location_id'];
                                echo"<li><a href='location.php?location=$location_id'>{$location_title}</a></li>";

                            }
                            ?>

                        </ul>
                    </div>


                </div>
            </div>
            <div class="col-md-9">
                <div class="category-search-filter">
                    <div class="row">
                        <div class="col-md-6">
                            <strong>Posts</strong>

                        </div>

                    </div>
                </div>
                <div class="product-grid-list">
                    <div class="row mt-30">

                        <?php

                        if(isset($_GET['category'])) {
                        $post_category_id = $_GET['category'];
                        if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'admin') {
                            $query = "SELECT * FROM posts WHERE  post_category_id=$post_category_id  ORDER BY post_id DESC ";


                        } else {
                            $query = "SELECT * FROM posts WHERE  post_category_id=$post_category_id AND post_status='published'  ORDER BY post_id DESC ";



                        }

                        $select_all_posts_query = mysqli_query($connection, $query);
                        if(mysqli_num_rows($select_all_posts_query) < 1)
                        {
                            echo " <h1 class='text-center'>No post Publised</h1>";
                        }
                        else {

                        while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
                        $post_id = $row['post_id'];
                        $post_title = $row['post_title'];
                        $post_author = $row['post_author'];
                        $post_category_id = $row['post_category_id'];
                        $post_date = $row['post_date'];
                        $post_image = $row['post_image'];
                        $post_content = substr($row['post_content'], 0, 100);
                        ?>
                            <div class="col-sm-12 col-lg-4 col-md-6">
                            <div class="product-item bg-light">
                                <div class="card">
                                    <div class="thumb-content">
                                        <!-- <div class="price">$200</div> -->
                                        <a href="">
                                            <img class="card-img-top img-fluid" src="images/<?php echo $post_image; ?>" alt="Card image cap">
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title"><a href=""><?php echo $post_title ?></a></h4>
                                        <ul class="list-inline product-meta">
                                            <li class="list-inline-item">
                                                <a href=""><i class="fa fa-folder-open"></i>
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
                                                </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href=""><i class="fa fa-calendar"></i><?php echo $post_date ?></a>
                                            </li>
                                        </ul>
                                        <p class="card-text"><?php echo $post_content ?></p>
                                        <div class="product-ratings">
                                            <ul class="list-inline">
                                                <li class="list-inline-item selected"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item selected"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item selected"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item selected"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                            <?php
                        }
                        }
                        }
                        else{
                            header("Locations:index.php");
                        }

                        ?>


                        </div>
                    </div>



</section>


<?php include "includes/footer.php"?>


