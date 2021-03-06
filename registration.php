<?php  include "includes/db.php"; ?>
 <?php  include "includes/header.php"; ?>
<?php //include "admin/functions.php";?>
<?php session_start();?>

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

<?php

if(isset($_POST['register']))
{
    $username =$_POST['username'];
    $secret= '6Lej9FcUAAAAAHxQFLqKYVus7ni_J6EQ6teiuXbg';
    $response= $_POST['g-recaptcha-response'];
    $remoteip= $_SERVER['REMOTE_ADDR'];

    $url ='https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$response.'&remoteip='.$remoteip;


    $options=array(
        'ssl'=>array(
            'cafile'            => '/opt/lampp/htdocs/cms/cacert.pem',
            'verify_peer'       => true,
            'verify_peer_name'  => true,
        ),
    );

    $context = stream_context_create( $options );
    $verify= file_get_contents($url,FILE_TEXT,$context);
    $json=json_decode($verify);
    if($json->success)
    {
        echo "";
    }
    else
    {
//        echo "<h3 style='text-align: center;color: red;'>Registration Failed<h3>";
        ?>
        <script>
            $.simplyToast('Registration Failed');
        </script>
        <?php
    }
}





?>




<?php



if($_SERVER['REQUEST_METHOD'] == "POST") {

    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $phone = trim($_POST['phone']);
//    $user_image = $_FILES['image']['name'];
//    $user_image_temp = $_FILES['image']['tmp_name'];

//    move_uploaded_file($user_image_temp, "images/$user_image");

    $error = [

        'username' => '',
        'email' => '',
        'password' => '',
        'phone' => '',
        'user_image' => ''

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
        $error['email'] = 'Email already exits, <a href="text_us.php"> Please Login</a>';
    }


//password Validation

    if ($password == '') {
        $error['password'] = 'Password Cannot be Empty';
    }


    //phone number validation

    if ($phone == '') {
        $error['phone'] = 'Phone no Cannot be Empty';
    }


    //user-image validation

//
//    if ($user_image == '') {
//        $error['user_image'] = 'Upload Your Image';
//    }

    foreach ($error as $key => $value) {
        if (empty($value)) {
        unset($error[$key]);
        }
    } //for each

    if(empty($error)){
        register_user($username,$email,$password,$phone);
        ?>

        <script>

        $.simplyToast('Registration has been submitted');
        </script>
<?php
        }

}



?>




    <!-- Navigation -->
    
    <?php  include "includes/navigation.php"; ?>
    
 
    <!-- Page Content -->
    <div class="container register">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                    <div class="well" class="w3-modal">
                        <div class="w3-center">
                        <img src="images/avatar2.png" alt="Avatar" style="width:20%" class="w3-circle w3-margin-top">

                        </div>
                        <h1 style="text-align: center">Register</h1>


<!--                        <h6 class="text-center">--><?php //echo $message ?><!--</h6>-->
                    <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username" autocomplete="off"
                            value="<?php echo isset($username) ? $username : '' ?>">
                            <p><?php echo isset($error['username']) ? $error['username'] : '' ?></p>
                        </div>
                         <div class="form-group">
                            <label for="email" >Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com"
                                   autocomplete="off"
                                   value="<?php echo isset($email) ? $email : '' ?>">
                             <p><?php echo isset($error['email']) ? $error['email'] : '' ?></p>
                        </div>
                         <div class="form-group">
                            <label for="password" >Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                             <p><?php echo isset($error['password']) ? $error['password'] : '' ?></p>
                        </div>

                        <div class="form-group">
                            <label for="phone" >Phone no.</label>
                            <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone no">
                            <value="<?php echo isset($phone) ? $phone : '' ?>">
                            <p><?php echo isset($error['phone']) ? $error['phone'] : '' ?></p>
                        </div>

                        <br>
                        <div class="form-group">
                            <div class="g-recaptcha" data-sitekey="6Lej9FcUAAAAAIkrnCni8wHscM4Nh_TU-np1Qwim"></div>
                        </div>
                        <br>
                
                        <input type="submit" name="register" id="btn-login" class="btn btn-primary btn-lg btn-block" value="Register">
                    </form>
                    </div>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>




