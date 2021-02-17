<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from brandio.io/envato/iofrm/html/login14.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 06 Feb 2021 18:25:04 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login | AppleSecondStuff</title>
  <link rel="icon" type="image/png" href="<?php echo base_url() ?>assets/Favicon/favicon.ico"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/loginv/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/loginv/css/fontawesome-all.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/loginv/css/iofrm-style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/loginv/css/iofrm-theme14.css">
</head>
<body>
    <div class="form-body">
        <div class="row">
            <div class="form-holder">

    <div class="box-body">
                    <?= $this->session->flashdata('message'); ?>
    </div>
                <div class="form-content">
                    <div class="form-items">
                        <div class="website-logo-inside">
                            <a href="index.html">
                                <div class="logo">
                                    <!-- <img class="logo-size" src="images/logo-light.svg" alt=""> -->
                                </div>
                            </a>
                        </div>
                        <h3>SISTEM POS ( Point Of Sales )</h3>
                        <p>AppleSecondStuff</p>
                        <div class="page-links">
                            <a href="login14.html" class="active">Login Disini</a>
                        </div>
                        <form class="form-horizontal" action="<?php echo site_url('C_Login/cek_login'); ?>" method="post">
                            <input class="form-control" type="text" name="username" placeholder="Username" required>
                            <input class="form-control" type="password" name="password" placeholder="Password" required>
                            <div class="form-button">
                                <button id="submit" type="submit" class="ibtn">Login</button> 
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="<?php echo base_url() ?>assets/loginv/js/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets/loginv/js/popper.min.js"></script>
<script src="<?php echo base_url() ?>assets/loginv/js/bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>assets/loginv/js/main.js"></script>
</body>

<!-- Mirrored from brandio.io/envato/iofrm/html/login14.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 06 Feb 2021 18:25:06 GMT -->
</html>