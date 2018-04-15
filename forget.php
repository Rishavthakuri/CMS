<?php  include "includes/db.php"; ?>
<?php  include "includes/header.php"; ?>
<?php   include "admin/functions.php";?>
<?php  include "includes/navigation.php"; ?>
<br>
<br>



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
