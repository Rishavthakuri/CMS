<?php  include "includes/db.php"; ?>
<?php  include "includes/header.php"; ?>
<?php //  include "admin/functions.php";?>
<?php  include "includes/navigation.php"; ?>
<br>
<br>

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

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './vendor/autoload.php';
require './classes/config.php';
?>

<?php



if(ifItIsMethod('post')) {
    if (isset($_POST['email'])) {

        $email = $_POST['email'];
        $length = 50;
        $token = bin2hex(openssl_random_pseudo_bytes($length));


        if (email_exists($email)) {


            if ($stmt = mysqli_prepare($connection, "UPDATE users SET token='{$token}'  WHERE user_email= ?")) {
                mysqli_stmt_bind_param($stmt, "s", $email);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);


                /*****
                 * Configure Php Mailer
                 */



              $mail =new \PHPMailer\PHPMailer\PHPMailer();

              $mail->isSMTP();                                      // Set mailer to use SMTP
              $mail->SMTPAuth = true;                               // Enable SMTP authentication
              $mail->Host = Config::SMTP_HOST;                         // Specify main and backup SMTP servers

              $mail->Username = Config::SMTP_USER;                 // SMTP username
              $mail->Password = Config::SMTP_PASSWORD;                           // SMTP password
              $mail->Port = 2525;
              $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted

              $mail->isHTML(true);
              $mail->CharSet ='UTF-8';

              $mail->setFrom('rishavthakuri69@gmail.com','Rishav Thakuri');
              $mail->addAddress($email);
              $mail->Subject = "This is test email";
              $mail->Body ='<p> Please Click to Resest you Password.
              <a href="http://localhost:81/cms/reset.php?email='.$email.'&token='.$token.'">http://localhost:81/cms/reset.php?email= '.$email.'&token='.$token.' </a>
              </p>'
             ;

              if($mail->send()){
                 $emailsent =true;
              }
              else{
                  echo "Mailer Error: " . $mail->ErrorInfo;
              }

          }
          else{
              echo mysqli_error($connection);
          }

            }


        }


    }
    ?>





<!-- Page Content -->
<div class="container">

    <div class="form-gap"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="text-center">


                            <?php if(!isset($emailsent)) :  ?>


                            <h3><i class="fa fa-lock fa-4x"></i></h3>
                            <h2 class="text-center">Forgot Password?</h2>
                            <p>You can reset your password here.</p>
                            <div class="panel-body">
                                <form id="register-form" role="form" autocomplete="off" class="form" method="post">

                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                                            <input id="email" name="email" placeholder="email address" class="form-control"  type="email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input name="recover-submit" class="btn btn-lg btn-primary btn-block" value="Reset Password" type="submit">
                                    </div>

                                    <input type="hidden" class="hide" name="token" id="token" value="">
                                </form>

                            </div><!-- Body-->
                            <?php else : ?>
                            <h2>Please check your Email.</h2>
                          <?php  endif; ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <hr>

    <?php include "includes/footer.php";?>

</div> <!-- /.container -->
