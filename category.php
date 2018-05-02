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





    <!-- Page Content -->
    <div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">
            <?php

            if(isset($_GET['category'])) {
                $post_category_id = $_GET['category'];
                if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'admin') {
                    $query = "SELECT * FROM posts WHERE  post_category_id=$post_category_id ";


                } else {
                    $query = "SELECT * FROM posts WHERE  post_category_id=$post_category_id AND post_status='published'";



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
                        $post_date = $row['post_date'];
                        $post_image = $row['post_image'];
                        $post_content = substr($row['post_content'], 0, 100);
                        ?>
                        <h1 class="page-header">
                            posts
<!--                            <small>Secondary Text</small>-->
                        </h1>

                        <!-- First Blog Post -->
                        <h2>
                            <a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title ?></a>
                        </h2>
                        <p class="lead">
                            by <a href="index.php"><?php echo $post_author ?></a>
                        </p>
                        <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date ?></p>
                        <hr>
                        <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
                        <hr>
                        <p> <?php echo $post_content ?></p>
                        <a class="btn btn-primary" href="#">Read More <span
                                    class="glyphicon glyphicon-chevron-right"></span></a>

                        <hr>
                        <?php
                    }
                }
            }
            else{
              header("Locations:index.php");
            }

            ?>


        </div>

        <!-- Blog Sidebar Widgets Column -->
        <?php include "includes/sidebar.php"?>

    </div>
    <!-- /.row -->

    <hr>

<?php include "includes/footer.php"?>