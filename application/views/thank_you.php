<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Thank You</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="hairmd test domain" />
        <meta name="keywords" content="hairmd test domain" />
        <meta name="author" content="" />
        <meta property="robots" content="noindex, follow"/>
        <?php $this->load->view('includes/asset'); ?>
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-68204069-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());

            gtag('config', 'UA-68204069-1');
        </script>
    </head>
    <body>
        <div class="container thankyou">
            <input type="hidden" value="<?php
            echo(!empty($redirect_url)) ? base_url() . $redirect_url : base_url() . LINK_1;
            ?>" class="base_url">
            <div class="row ">
                <div class="col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3 col-xs-12">
                    <div class="card">
                        <div class="circle center-block">
                            <img src="<?php echo base_url().COMMON_IMAGES ?>thumbs-up-48.ico">
                        </div>
                        <h6 class="text-center">You're All set</h6>
                    </div>
                </div>
            </div>
            <div class="row ">
                <div class="col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3 col-xs-12">
                    <div class="content">
                        <img src="<?php echo base_url().CLEAR_SKIN_ASSETS ?>logoblack.gif" class="center-block footer-logo img img-responsive">
                        <h2 class="text-center">Thank You !</h2>
                        <p class="text-center">Your submission was processed successfully.</p>
                        <p class="text-center">We will contact you soon with your quote.</p>
                        <hr style="border:1px solid #DB1519">
                        <p class="text-center findus">
                            You can also find us Here.
                        </p>
                        <ul class="gtco-social-icons text-center">
                            <li><a  href="https://www.youtube.com/channel/UCfnvXQfkfke42sXFrdctsjQ" target="_blank"><img src="<?php echo base_url().COMMON_IMAGES ?>youtube.png"></a></li>
                            <li><a  href="https://www.facebook.com/HairMDIndia/" target="_blank"><img src="<?php echo base_url().COMMON_IMAGES; ?>fb.png"></i></a></li>
                            <li><a  href="https://in.pinterest.com/hairmdindia/" target="_blank"><img src="<?php echo base_url().COMMON_IMAGES; ?>pin.png"></i></a></li>
                            <li><a  href="https://plus.google.com/105086694510930962070" target="_blank"><img src="<?php echo base_url().COMMON_IMAGES ?>google.png"></i></a></li>
                            <li><a  href="https://www.instagram.com/hairmd_india/" target="_blank"><img src="<?php echo base_url().COMMON_IMAGES ?>insta.png"></i></a></li>
                            <li><a  href="https://twitter.com/hairmdindia" target="_blank"><img src="<?php echo base_url().COMMON_IMAGES ?>twit.png"></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
    <script>
            gtag('event', 'conversion', {'send_to': 'AW-844910494/ljmKCKblm3MQnp_xkgM'});
            window.setTimeout(function () {
                // Move to a new location or you can do something else
                window.location.href = $(".base_url").val();

            }, 10000);
    </script>

</body>
</html>

