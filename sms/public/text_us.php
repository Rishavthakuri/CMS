<?php require '../includes/header.php'?>


<?php

if(isset($_POST['submit'])) {
    if(isset($_POST['number']) && isset($_POST['message'])){


        $client = new Services_Twilio('ACbd7babf22b946fe90a69cfdd6b816b03','a081b45a72c3a959c8ef3195b34baef1');

        $client->account->messages->sendMessage('6468322264','+9779842553420',$_POST['name'].' '.$_POST['number'].' '.$_POST['message']);

//        echo "<h3 class='text-center bg-success'>Message has been sent</h3>";
        ?>

        <script>

        $.simplyToast('Message Successfully Sent');
        </script>
        <?php


    }



}

?>


    <!-- Page Content -->
    <div class="container">

        <section id="login">
            <div class="container">
                <div class="row">
                    <div class="col-xs-6 col-xs-offset-3">
                        <div class="form-wrap">
                            <div class="well">
                                <div class="w3-center" >
                                    <img src="images/contact.gif" id="contact-image" alt="Avatar" style="width:100px;height: 100px;" class="w3-circle w3-margin-top">
                                </div>
                                <h2 style="text-align: center">Send Free SMS</h2>
                                <br>
                                <form role="form" method="post">

                                    <div class="form-group">
                                        <label for="email">Enter Your Name</label>
                                        <input name="name" type="tel" class="form-control" id="name" required placeholder="Enter Your Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Enter Your Mobile Number</label>
                                        <input name="number" type="tel" class="form-control" id="number" required placeholder="Enter Your number">
                                    </div>
                                    <div class="form-group">
                                        <label for="message">Enter Your Message</label>
                                        <textarea name="message" id="message" cols="30" rows="10" class="form-control"></textarea>
                                    </div>

                                    <input name="submit" type="submit" class="btn btn-primary btn-block" value="Send Message">
                                </form>
                            </div>

                        </div>
                    </div> <!-- /.col-xs-12 -->
                </div> <!-- /.row -->
            </div> <!-- /.container -->
        </section>


        <hr>





<?php require '../includes/footer.php'?>