<?php  include "includes/db.php"; ?>
<?php  include "includes/header.php"; ?>
<?php session_start();?>
<?php

if(ifItIsMethod('post')){
    if(isset($_POST['username']) && isset($_POST['password']))
    {
        login_user($_POST['username'],$_POST['password']);
    }
    else{

        redirect('..cms/index.php');
    }
}
?>




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


<?php ?>
<!-- avigation -->

<?php  include "includes/navigation.php"; ?>


<!-- Page Content -->
<div class="container">

    <section id="login">
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-xs-offset-3">
                    <div class="form-wrap">
                        <div class="well">
                            <div class="w3-center" >
                            <img src="images/contact.gif" id="contact-image" alt="Avatar" style="width:30%" class="w3-circle w3-margin-top">
                            </div>
                            <h1 style="text-align: center">Contact</h1>
                            <form role="form" action="" method="post" id="login-form" autocomplete="off">

                                <div class="form-group">
                                    <label for="email" >Email</label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email">
                                </div>
                                <div class="form-group">
                                    <label for="subject" >Subject</label>
                                    <input type="text" name="subject" id="subject" class="form-control" placeholder="Enter your Subject">
                                </div>
                                <div class="form-group">
                                    <label for="message" >Message</label>
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
