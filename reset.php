<?php  include "includes/db.php"; ?>
<?php  include "includes/header.php"; ?>

<?php  include "includes/navigation.php"; ?>

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


if (!isset($_GET['email']) && !isset($_GET['token']))
{
    redirect('index.php');

}

//$email= 'rishavthakuri69@gmail.com';
//$token ='7153b1b65e4239fb9cf73a6a6dd1438e6fbe12df8b7c428ea7434c93bc9314451ca11c8ba7543cbbd5c46670f40276678321';

if($stmt =mysqli_prepare($connection,'SELECT username, user_email, token FROM users WHERE token=?'))
{
    mysqli_stmt_bind_param($stmt,"s",$_GET['token']);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt,$username,$user_email,$token);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);


    if(isset($_POST['password']) && isset($_POST['confirmPassword']))
    {
        if($_POST['password'] == $_POST['confirmPassword']){
            $password=$_POST['password'];
            $hashedPassord=password_hash($password,PASSWORD_BCRYPT,array('cost'=>12));
            if($stmt=mysqli_prepare($connection,"UPDATE users SET token='',user_password='{$hashedPassord}' WHERE user_email=?"))
            {


                mysqli_stmt_bind_param($stmt,"s",$_GET['email']);
                mysqli_stmt_execute($stmt);

                if(mysqli_stmt_affected_rows($stmt) >=1){
                    redirect('login.php');
                }

                mysqli_stmt_close($stmt);



            }

        }
    }


}
?>


<!-- Page Content -->
<div class="container">


    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="text-center">

                            <h3><i class="fa fa-lock fa-4x"></i></h3>
                            <h2 class="text-center">Reset Password</h2>
                            <p>You can reset your password here.</p>
                            <div class="panel-body">

                                <form id="register-form" role="form" autocomplete="off" class="form" method="post">

                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-user color-blue"></i></span>
                                            <input id="password" name="password" placeholder="Enter Password" class="form-control"  type="password">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-ok color-blue"></i></span>
                                            <input id="confirmPassword" name="confirmPassword" placeholder="Confirm Password" class="form-control"  type="password">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <input name="resetPassword" class="btn btn-lg btn-primary btn-block" value="Reset Password" type="submit">
                                    </div>

                                    <input type="hidden" class="hide" name="token" id="token" value="">
                                </form>

                            </div><!-- Body-->


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <hr>

    <?php include "includes/footer.php";?>

</div> <!-- /.container -->
