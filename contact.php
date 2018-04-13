<?php  include "includes/db.php"; ?>
<?php  include "includes/header.php"; ?>

<?php


if(isset($_POST['submit']))
{
    require_once "Mail.php";
    $from = $_POST['email'];
    $to = "info@rishavthakuri.com.np";
    $subject = wordwrap($_POST['subject'],70);
    $body = $_POST['body'];
    $host = "cpanel.freehosting.com";
    $username = "info@rishavthakuri.com.np";
    $password = "samsung54606";
    $headers = array ('From' => $from,
        'To' => $to,
        'Subject' => $subject);
    $smtp = Mail::factory('smtp',
        array ('host' => $host,
            'auth' => true,
            'username' => $username,
            'password' => $password));
    $mail = $smtp->send($to, $headers, $body);
    if (PEAR::isError($mail)) {
        echo("<p>" . $mail->getMessage() . "</p>");
    } else {
        echo(" <center><p>Message successfully sent!</p></center>");
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
                            <h1 style="text-align: center">Contact</h1>
                            <form role="form" action="" method="post" id="login-form" autocomplete="off">

                                <div class="form-group">
                                    <label for="email" class="sr-only">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email">
                                </div>
                                <div class="form-group">
                                    <label for="subject" class="sr-only">Subject</label>
                                    <input type="text" name="subject" id="subject" class="form-control" placeholder="Enter your Subject">
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" name="body" id="body" cols="30" rows="10"></textarea>
                                </div>

                                <input type="submit" name="submit" id="btn-login" class="btn btn-primary btn-lg btn-block" name="submit" value="Submit">
                            </form>
                        </div>

                    </div>
                </div> <!-- /.col-xs-12 -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </section>


    <hr>



    <?php include "includes/footer.php";?>
