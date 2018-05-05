<?php include "includes/db.php"; ?>
<?php include "includes/header.php"?>
<?php //include "admin/functions.php";?>
<?php    ob_start(); ?>
    <!-- Navigation -->
<?php session_start();?>

<?php include "includes/navigation.php"?>

<div class="work-section">
    <div class="container">
        <h2 class="head">How It Works</h2>
        <div class="work-section-head text-center">
            <p>Fast, easy and free to post an ad and you will find, what you are looking for.</p>
        </div>
        <div class="work-section-grids text-center">
            <div class="col-md-3 work-section-grid">
                <i class="fa fa-edit "></i>
                <h4>Post an Ad</h4>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been</p>
                <span class="arrow1"><img src="images/arrow1.png" alt="" /></span>
            </div>
            <div class="col-md-3 work-section-grid">
                <i class="fa fa-eye "></i>
                <h4>Find an item</h4>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been</p>
                <span class="arrow2"><img src="images/arrow2.png" alt="" /></span>
            </div>
            <div class="col-md-3 work-section-grid">
                <i class="fa fa-phone-square"></i>
                <h4>contact the seller</h4>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been</p>
                <span class="arrow1"><img src="images/arrow1.png" alt="" /></span>
            </div>
            <div class="col-md-3 work-section-grid">
                <i class="fa fa-money-bill-alt"></i>
                <h4>make transactions</h4>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been</p>
            </div>
            <div class="clearfix"></div>
            <a class="work" href="http://localhost:81/cms/registration.php">Get start Now</a>
        </div>
    </div>
</div>
    <div class="happy-clients">
        <div class="container">
            <div class="happy-clients-head text-center wow fadeInRight" data-wow-delay="0.4s">
                <h3>Happy Clients</h3>
                <p>We are explain who is using our business solutions</p>
            </div>
            <div class="happy-clients-grids">
                <div class="col-md-6 happy-clients-grid wow bounceIn" data-wow-delay="0.4s">
                    <div class="client">
                        <img src="images/rishav.jpg" alt="" />
                    </div>
                    <div class="client-info">
                        <p><img src="images/open-quatation.jpg" class="open" alt="" />Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make.<img src="images/close-quatation.jpg" class="closeq" alt="" /></p>
                        <h4><a href="#">Rishav thakuri </a>Project manager</h4>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="col-md-6 happy-clients-grid span_66 wow bounceIn" data-wow-delay="0.4s">
                    <div class="client">
                        <img src="images/love.jpg" alt="" />
                    </div>
                    <div class="client-info">
                        <p><img src="images/open-quatation.jpg" class="open" alt="" />Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.<img src="images/close-quatation.jpg" class="closeq" alt="" /></p>
                        <h4><a href="#">Chatta shah </a>Creative Director</h4>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="col-md-6 happy-clients-grid wow bounceIn" data-wow-delay="0.4s">
                    <div class="client">
                        <img src="images/bicky.jpg" alt="" />
                    </div>
                    <div class="client-info">
                        <p><img src="images/open-quatation.jpg" class="open" alt="" />Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make.<img src="images/close-quatation.jpg" class="closeq" alt="" /></p>
                        <h4><a href="#">Bicky Tamang </a>Lipsum director</h4>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="col-md-6 happy-clients-grid span_66 wow bounceIn" data-wow-delay="0.4s">
                    <div class="client">
                        <img src="images/nick.jpg" alt="" />
                    </div>
                    <div class="client-info">
                        <p><img src="images/open-quatation.jpg" class="open" alt="" />Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.<img src="images/close-quatation.jpg" class="closeq" alt="" /></p>
                        <h4><a href="#">Nickson shiwakoti </a>manager</h4>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

<?php include "includes/footer.php"?>