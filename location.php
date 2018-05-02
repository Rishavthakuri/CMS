<?php include "includes/db.php"; ?>
<?php include "includes/header.php"?>
<?php session_start();?>
<!-- Navigation -->
<?php include "includes/navigation.php"?>

    <div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">
            <h1 class="page-header">
                posts
                <!--                            <small>Secondary Text</small>-->
            </h1>
            <?php

            if(isset($_GET['location'])) {
                $post_location_id = $_GET['location'];
                if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'admin') {
                    $query = "SELECT * FROM posts WHERE  post_location_id=$post_location_id ";


                }
                else {

                    $query = "SELECT * FROM posts WHERE  post_location_id=$post_location_id AND post_status='published'";

                }

                $select_all_posts_query = mysqli_query($connection, $query);
                if (mysqli_num_rows($select_all_posts_query) < 1) {
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


                        <!-- First Blog Post -->
                        <div class="well">
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

        <!-- Blog Sidebar Widgets Column -->
        <?php include "includes/sidebar.php"?>

    </div>
    <!-- /.row -->

    <hr>

<?php include "includes/footer.php"?>