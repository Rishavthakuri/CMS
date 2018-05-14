<?php include "includes/db.php"; ?>
<?php include "includes/header.php"?>
<?php //include "admin/functions.php";?>
<?php    ob_start(); ?>
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
                <span class="w3-right w3-padding w3-hide-small"><a href="http://localhost:81/cms/registration.php">Create new account</a></span>

                <span class="w3-right w3-padding w3-hide-small"><a href="forget.php?forgot=<?php echo uniqid(true);?>">Forget password?</a></span>
            </div>
        </div>
    </div>
<!-- Login Form Ends -->



<!-- Categories table -->

    <div class="main-banner banner text-center img-responsive col-sm-12">
        <div class="container">
            <h1>Sell or Advertise   <span class="segment-heading">    anything online </span> with adsnagar</h1>
            <p>Advertisement For All</p>
            <?php
              if(isLoggedIn()):
           ?>
              <a href="post_an_ad.php">Post Free Ad</a>
            <?php endif; ?>
        </div>
    </div>



    <div class="content">
    <div class="categories">
        <div class="container">

            <div class="col-md-2 focus-grid">
                <a href="http://localhost:81/cms/category.php?category=1">
                    <div class="focus-border">
                        <div class="focus-layout">
                            <div class="focus-image"><i class="fa fa-mobile"></i></div>
                            <h4 class="clrchg">Mobiles</h4>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-2 focus-grid">
                <a href="http://localhost:81/cms/category.php?category=3">
                    <div class="focus-border">
                        <div class="focus-layout">
                            <div class="focus-image"><i class="fa fa-laptop"></i></div>
                            <h4 class="clrchg"> Electronics & Appliances</h4>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-2 focus-grid">
                <a href="http://localhost:81/cms/category.php?category=12">
                    <div class="focus-border">
                        <div class="focus-layout">
                            <div class="focus-image"><i class="fa fa-car"></i></div>
                            <h4 class="clrchg">Cars</h4>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-2 focus-grid">
                <a href="http://localhost:81/cms/category.php?category=11">
                    <div class="focus-border">
                        <div class="focus-layout">
                            <div class="focus-image"><i class="fa fa-motorcycle"></i></div>
                            <h4 class="clrchg">Bikes</h4>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-2 focus-grid">
                <a href="http://localhost:81/cms/category.php?category=2">
                    <div class="focus-border">
                        <div class="focus-layout">
                            <div class="focus-image"><i class="fa fa-wheelchair"></i></div>
                            <h4 class="clrchg">Furnitures</h4>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-2 focus-grid">
                <a href="http://localhost:81/cms/category.php?category=10">
                    <div class="focus-border">
                        <div class="focus-layout">
                            <div class="focus-image"><i class="fa fa-paw"></i></div>
                            <h4 class="clrchg">Pets</h4>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-2 focus-grid">
                <a href="http://localhost:81/cms/category.php?category=9">
                    <div class="focus-border">
                        <div class="focus-layout">
                            <div class="focus-image"><i class="fa fa-book"></i></div>
                            <h4 class="clrchg">Books, Sports & Hobbies</h4>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-2 focus-grid">
                <a href="http://localhost:81/cms/category.php?category=8">
                    <div class="focus-border">
                        <div class="focus-layout">
                            <div class="focus-image"><i class="fa fa-asterisk"></i></div>
                            <h4 class="clrchg">Fashion</h4>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-2 focus-grid">
                <a href="http://localhost:81/cms/category.php?category=7">
                    <div class="focus-border">
                        <div class="focus-layout">
                            <div class="focus-image"><i class="fa fa-gamepad"></i></div>
                            <h4 class="clrchg">Kids</h4>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-2 focus-grid">
                <a href="http://localhost:81/cms/category.php?category=4">
                    <div class="focus-border">
                        <div class="focus-layout">
                            <div class="focus-image"><i class="fa fa-shield-alt"></i></div>
                            <h4 class="clrchg">Services</h4>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-2 focus-grid">
                <a href="http://localhost:81/cms/category.php?category=5">
                    <div class="focus-border">
                        <div class="focus-layout">
                            <div class="focus-image"><i class="fa fa-at"></i></div>
                            <h4 class="clrchg">Jobs</h4>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-2 focus-grid">
                <a href="http://localhost:81/cms/category.php?category=6">
                    <div class="focus-border">
                        <div class="focus-layout">
                            <div class="focus-image"><i class="fa fa-home"></i></div>
                            <h4 class="clrchg">Real Estate</h4>
                        </div>
                    </div>
                </a>
            </div>

            <div class="clearfix"></div>
        </div>
    </div>



<!-- categories table ends -->

<?php

if(isset($_GET['page']))
{
    $page=$_GET['page'];

}
else{
    $page="";
}

if($page == "" || $page==1)
{
    $page_1=0;
}
else{
    $page_1=($page*5)-5;
}
?>

<!--  Posts Designs -->


    <section class="popular-deals section bg-gray">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h2>Latest Ads</h2>
                        <!--                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas, magnam.</p>-->
                    </div>
                </div>
            </div>

            <div class="row">
                <?php

                    if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'admin')
                    {
                        $post_query_count="SELECT * FROM posts ";

                    }
                    else
                    {
                        $post_query_count="SELECT * FROM posts where post_status='published' ";
                    }

                    $find_count= mysqli_query($connection,$post_query_count);
                    $count=mysqli_num_rows($find_count);
                    if($count < 1) {
                        echo " <h1 class='text-center'>No post Available.</h1>";
                    }
                    else {

                        $count = ceil($count / 6);
                        $query = "SELECT * FROM posts WHERE  post_status='published' ORDER BY post_id DESC  LIMIT $page_1,6  ";
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
                            ?>

                <div class="col-sm-12 col-lg-3">
                            <div class="product-item bg-light">
                                <div class="card">
                                    <div class="thumb-content">
                                        <div class="price">Rs.<?php echo  $post_price ?></div>
                                        <a href="post.php?p_id=<?php echo $post_id; ?>">
                                            <img class="card-img-top img-fluid image-ad img-responsive" style="width: 200px;height: 240px;" src="images/<?php echo $post_image; ?>" alt="Card image cap">
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title"><a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title ?></a></h4>
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
                                                <a href=""><i class="fa fa-calendar-alt"></i><?php echo $post_date ?></a>
                                            </li>
                                        </ul>
                                        <div class="product-ratings">
<!--                                            <ul class="list-inline">-->
<!--                                                <li class="list-inline-item selected"><i class="fa fa-star"></i></li>-->
<!--                                                <li class="list-inline-item selected"><i class="fa fa-star"></i></li>-->
<!--                                                <li class="list-inline-item selected"><i class="fa fa-star"></i></li>-->
<!--                                                <li class="list-inline-item selected"><i class="fa fa-star"></i></li>-->
<!--                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>-->
<!--                                            </ul>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                </div>
                            <?php
                        }
                    }
                    ?>
                </div>



            <ul class="pager">
                <?php
                for($i=1;$i<=$count;$i++)
                {
                    if ($i==$page)
                    {
                        echo "<li><a class='active_link' href='text_us.php?page={$i}'>{$i}</a></li>";

                    }
                    else{
                        echo "<li><a href='text_us.php?page={$i}'>{$i}</a></li>";
                    }

                }
                ?>
            </ul>
        </div>
    </section>


    <div class="trending-ads">
            <div class="container">
                <!-- slider -->
                <div class="trend-ads">
                    <h2>Trending Ads</h2>
                    <ul id="flexiselDemo3">
                        <li>
                            <?php

                            $query = "SELECT * FROM posts LIMIT 4 ";


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
                                ?>
                                <div class="col-md-3 biseller-column">
                                    <a href="post.php?p_id=<?php echo $post_id; ?>">
                                        <img style="width:250px;height: 330px; " src="images/<?php echo $post_image; ?>">
                                        <span class="price">&#36; <?php echo  $post_price ?></span>
                                    </a>
                                    <div class="ad-info">
                                        <h5><?php echo $post_title ?></h5>
                                    </div>
                                </div>
                            <?php
                            }

                            ?>
                        </li>
                        <li>
                            <?php
                            $query = "SELECT * FROM posts where post_id IN (86,87,90,84)";
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
                                ?>
                                <div class="col-md-3 biseller-column">
                                    <a href="post.php?p_id=<?php echo $post_id; ?>">
                                        <img src="images/<?php echo $post_image; ?>">
                                        <span class="price">&#36; <?php echo  $post_price ?></span>
                                    </a>
                                    <div class="ad-info">
                                        <h5><?php echo $post_title ?></h5>
                                    </div>
                                </div>
                                <?php
                            }

                            ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <script type="text/javascript">
            $(window).load(function() {
                $("#flexiselDemo3").flexisel({
                    visibleItems:1,
                    animationSpeed: 1000,
                    autoPlay: true,
                    autoPlaySpeed: 5000,
                    pauseOnHover: true,
                    enableResponsiveBreakpoints: true,
                    responsiveBreakpoints: {
                        portrait: {
                            changePoint:480,
                            visibleItems:1
                        },
                        landscape: {
                            changePoint:640,
                            visibleItems:1
                        },
                        tablet: {
                            changePoint:768,
                            visibleItems:1
                        }
                    }
                });

            });
        </script>
        <script type="text/javascript" src="js/jquery.flexisel.js"></script>




<?php //include "includes/sidebar.php"?>

<?php


if(ifItIsMethod('post')){
    if(isset($_POST['username']) && isset($_POST['password']))
    {
        login_user($_POST['username'],$_POST['password']);

    }
    else{

        redirect('..cms/text_us.php');

    }
}
?>


<?php include "includes/footer.php"?>