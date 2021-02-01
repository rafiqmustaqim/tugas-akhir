
<!doctype html>

<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login | SIPKM </title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="<?php echo base_url('assets/login/') ?>img/lp3i/logo3.png" type="image/x-icon" />

    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo base_url('assets/login/') ?>plugins/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/login/') ?>plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/login/') ?>plugins/ionicons/dist/css/ionicons.min.css">

    <link rel="stylesheet" href="<?php echo base_url('assets/login/') ?>dist/css/theme.min.css">
    <script src="<?php echo base_url('assets/login/') ?>src/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <div class="auth-wrapper">
            <div class="container-fluid h-100">
                <div class="row flex-row h-100 bg-white">
                    <div class="col-xl-8 col-lg-6 col-md-5 p-0 d-md-block d-lg-block d-sm-none d-none">
                        <div class="lavalite-bg" style="background-image: url('<?php echo base_url('assets/login/') ?>img/auth/bg-lp3i.jpg')">
                            <div class="lavalite-overlay"></div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-7 my-auto p-0">
                        <div class="authentication-form mx-auto">
                            <div style="padding-left: 80px; padding-right: 70px;">
                                <a href="<?php echo base_url() ?>"><img src="<?php echo base_url('assets/login/') ?>img/lp3i/logo4.png" alt="Logo LP3I" width="150px"  ></a>
                            </div>
                            <br>
                            <h3 align="center">Selamat datang di <br> Sistem Informasi Penempatan Kerja <br>
                            Mahasiswa LP3I Kampus Depok</h3>
                            <?php if( $this->session->flashdata('msg') ) : ?>
                            <div class="row mt-3">
                                <div class="col-md-12 col-lg-12">
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <!-- Data Administrator <strong>berhasil</strong> -->  <?php echo $this->session->flashdata('msg'); ?> 
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <?php endif; ?>
                            <form method="post" action="<?php echo base_url('Login/auth') ?>">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="username" placeholder="username" required>
                                    <i class="ik ik-user"></i>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control" placeholder="Password" required="">
                                    <i class="ik ik-lock"></i>
                                </div>
                               <!--  <div class="row">
                                    <div class="col text-left">
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="item_checkbox" name="item_checkbox" value="option1">
                                            <span class="custom-control-label">&nbsp;Remember Me</span>
                                        </label>
                                    </div>
                                    <div class="col text-right">
                                        <a href="forgot-password.html">Forgot Password ?</a>
                                    </div>
                                </div> -->
                                <div class="sign-btn text-center">
                                    <button type="submit" class="btn btn-primary">Sign In</button>
                                </div>
                            </form>
                            <!-- <div class="register">
                                <p>Don't have an account? <a href="register.html">Create an account</a></p>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script>window.jQuery || document.write('<script src="<?php echo base_url('assets/login/') ?>src/js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
        <script src="<?php echo base_url('assets/login/') ?>plugins/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url('assets/login/') ?>plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
        <script src="<?php echo base_url('assets/login/') ?>plugins/screenfull/dist/screenfull.js"></script>
        <script src="<?php echo base_url('assets/login/') ?>dist/js/theme.js"></script>
        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
       
    </body>
    </html>
