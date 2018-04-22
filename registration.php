<?php  include "includes/db.php"; ?>
 <?php  include "includes/header.php"; ?>
<?php include "admin/functions.php";?>

<?php



if($_SERVER['REQUEST_METHOD'] == "POST") {

    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);


    $error = [

        'username' => '',
        'email' => '',
        'password' => ''

    ];


//Username Validation
    if (strlen($username) < 4) {
        $error['username'] = 'Username needs to be Longer';
    }

    if ($username == '') {
        $error['username'] = 'Username Cannot be Empty';
    }


    if (username_exists($username)) {
        $error['username'] = 'Username already exits';
    }


    //email Validation

    if ($email == '') {
        $error['email'] = 'Email Cannot be Empty';
    }


    if (email_exists($email)) {
        $error['email'] = 'Email already exits, <a href="index.php"> Please Login</a>';
    }


//password Validation

    if ($password == '') {
        $error['password'] = 'Password Cannot be Empty';
    }


    foreach ($error as $key => $value) {
        if (empty($value)) {
        unset($error[$key]);
        }
    } //for each

    if(empty($error)){
        register_user($username,$email,$password);
        echo "<h4 style='text-align: center;color: #ff6378;'>Your Registration has been submitted.</h4>";
        }

}



?>



    <!-- Navigation -->
    
    <?php  include "includes/navigation.php"; ?>
    
 
    <!-- Page Content -->
    <div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                    <div class="well">
                        <h1 style="text-align: center">Register</h1>
<!--                        <h6 class="text-center">--><?php //echo $message ?><!--</h6>-->
                    <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username" autocomplete="off"
                            value="<?php echo isset($username) ? $username : '' ?>">
                            <p><?php echo isset($error['username']) ? $error['username'] : '' ?></p>
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com"
                                   autocomplete="off"
                                   value="<?php echo isset($email) ? $email : '' ?>">
                             <p><?php echo isset($error['email']) ? $error['email'] : '' ?></p>
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                             <p><?php echo isset($error['password']) ? $error['password'] : '' ?></p>
                        </div>
                
                        <input type="submit" name="register" id="btn-login" class="btn btn-primary btn-lg btn-block" value="Register">
                    </form>
                    </div>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "includes/footer.php";?>
