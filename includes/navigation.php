<!-- Navigation -->


<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">


        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Classified</a>
        </div>


        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
<!--                --><?php
//                $query = "SELECT * FROM categories";
//                $select_all_categories_query = mysqli_query($connection,$query);
//
//                while($row = mysqli_fetch_assoc($select_all_categories_query))
//                {
//                    $cat_title = $row['cat_title'];
//                    $cat_id = $row['cat_id'];
//
//                    $category_class='';
//                    $registration_class='';
//                    $pageName= basename($_SERVER['PHP_SELF']);
//                    $registration ='registration.php';
//
//                    if(isset($_GET['category']) &&  $_GET['category']==$cat_id)
//                    {
//                        $category_class='active';
//                    }
//                    elseif ($pageName ==$registration ){
//                        $registration_class = 'active';
//
//                    }
//                    echo"<li><a class='$category_class' href='category.php?category=$cat_id'>{$cat_title}</a></li>";
//
//                }
//                ?>
<!--                -->


                <li>
                    <a class="<?php echo $registration_class;?>" href="../cms/registration.php">Register</a>

                </li>

                <li>
                    <a href="contact.php">Contact us</a>
                </li>
                <?php

                
                if(isLoggedIn()):
                    ?>

                    <li>
                        <a href="../cms/admin">Admin</a>
                    </li>

                    <li>
                        <a href="includes/logout.php">Logout</a>
                    </li>
                    <li>
                        <a href="../cms/account-profile.php">My Account</a>
                    </li>
                    <li>
                        <a href="../cms/post_an_ad.php" class="w3-button w3-green w3-larger">Post ad</a>
                    </li>


                <?php else: ?>
                    <li>
<!--                        <a href="../cms/login.php">Login</a>-->
                        <button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-green w3-larger">Login</button>
                    </li>


                <?php endif; ?>



<!--                <li>-->
<!--                    <a href="#">Services</a>-->
<!--                </li>-->
<!--                <li>-->
<!--                    <a href="#">Contact</a>-->
<!--                </li>-->

            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>
