<?php include 'includes/admin_header.php' ?>
    <div id="wrapper">



    <!-- Navigation -->
    <?php include "includes/admin_navigation.php" ?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome to Classified admin
                        <small>Author</small>
                    </h1>
                    <div class="col-xs-6">
                        <?php
                        insert_location();
                        ?>


                        <form action="" method="post">
                            <div class="form-group">
                                <label for="location_title">Add Location</label>
                                <input class="form-control" type="text" name="location_title">
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="submit" value="Add Location">
                            </div>

                        </form>
                        <?php  //update and includes query
                        if(isset($_GET['edit'])){
                            $location_id = $_GET['edit'];
                            include "includes/update_location.php";
                        }
                        ?>

                    </div>
                    <div class="col-xs-6">

                        <table class="table table-bordered table-hover">
                            <thead>
                            <th>Id</th>
                            <th>Location Title</th>
                            <th>Action</th>
                            <th>Action</th>
                            </thead>
                            <tbody>
                            <?php //Find all Categories
                            FindAllLocation();
                            ?>

                            <?php // Delete  query : Categories
                            DeleteLocation();
                            ?>

                            </tbody>

                        </table>
                    </div>

                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

<?php include 'includes/admin_footer.php' ?>