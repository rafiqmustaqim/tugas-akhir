
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title><?php echo $title; ?></title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="<?php echo base_url() ?>assets/login/img/lp3i/logo3.png" type="image/x-icon"/>
    
    <!-- Fonts and icons -->
    <script src="<?php echo base_url() ?>assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
        WebFont.load({
            google: {"families":["Lato:300,400,700,900"]},
            custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['<?php echo base_url() ?>assets/css/fonts.min.css']},
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>
    

    <!-- Memanggil file .js untuk proses autocomplete -->
    <script type='text/javascript' src='<?php echo base_url();?>assets/js/jquery-1.8.2.min.js'></script>
    <script type='text/javascript' src='<?php echo base_url();?>assets/js/jquery.autocomplete.js'></script>

    <!-- Memanggil file .css untuk style saat data dicari dalam filed -->
    <link href='<?php echo base_url();?>assets/js/jquery.autocomplete.css' rel='stylesheet' />


    <!-- CSS Files -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/atlantis.min.css">

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/demo.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/jquery-ui.css">

    <!-- show selected -->

    <script type='text/javascript'>
        $(window).load(function(){
            $("#ket").change(function() {
                console.log($("#ket option:selected").val());
                if ($("#ket option:selected").val() !== 'Diterima') {
                    $('#tgl').prop('hidden', true);
                    $('#label').prop('hidden', true);
                    $('#gaji').prop('hidden', true);
                    $('#label2').prop('hidden', true);
                }else if( $('#ket option:selected').val() != null){
                   $('#tgl').prop('hidden', false);
                   $('#label').prop('hidden', false);
                   $('#gaji').prop('hidden', false);
                   $('#label2').prop('hidden', false);
               } else {
                $('#tgl').prop('hidden', false);
                $('#label').prop('hidden', false);
                $('#gaji').prop('hidden', false);
                $('#label2').prop('hidden', false);

            }
        });
        });
    </script>

    <script type="text/javascript">
      $(document).ready(function(){

        $('#maha').autocomplete({
          source: "<?php echo site_url('penempatan/get_mahasiswa');?>",

          select: function (event, ui) {
            $('[name="nama_mahasiswa"]').val(ui.item.nama_mahasiswa); 
            $('[name="nim"]').val(ui.item.nim); 
        }
    });

    });
</script>


</head>
<body>
    <div class="wrapper">
        <div class="main-header">
            <!-- Logo Header -->
            <div class="logo-header" data-background-color="blue">

                <a href="<?php  echo base_url() ?>index.html" class="logo">
                    <img src="<?php echo base_url() ?>assets/login/img/lp3i/logo3.png" width="70px" alt="navbar brand" class="navbar-brand">
                    <span  class="title text-white" style="font-family: arial;"><b>SIPKM</b></span>
                </a>
                <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">
                        <i class="icon-menu"></i>
                    </span>
                </button>
                <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
                <div class="nav-toggle">
                    <button class="btn btn-toggle toggle-sidebar">
                        <i class="icon-menu"></i>
                    </button>
                </div>
            </div>
            <!-- End Logo Header -->

            <!-- Navbar Header -->
            <nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">

                <div class="container-fluid">
                    <div class="collapse" id="search-nav">
                        <!-- <form class="navbar-left navbar-form nav-search mr-md-3">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <button type="submit" class="btn btn-search pr-1">
                                        <i class="fa fa-search search-icon"></i>
                                    </button>
                                </div>
                                <input type="text" placeholder="Search ..." class="form-control">
                            </div>
                        </form> -->

                        <!--  <h4 style="color:white;"> <i class="fa fa-briefcase"></i> Sistem Informasi Penempatan Kerja Mahasiswa</h4> -->
                    </div>
                    <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                        <li class="nav-item toggle-nav-search hidden-caret">
                            <a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
                                <i class="fa fa-search"></i>
                            </a>
                        </li>


                      <!--   <li class="nav-item dropdown hidden-caret">
                            <a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-bell"></i>
                                <span class="notification">4</span>
                            </a>
                            <ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
                                <li>
                                    <div class="dropdown-title">You have 4 new notification</div>
                                </li>
                                <li>
                                    <div class="notif-center">
                                        <a href="#">
                                            <div class="notif-icon notif-primary"> <i class="fa fa-user-plus"></i> </div>
                                            <div class="notif-content">
                                                <span class="block">
                                                    New user registered
                                                </span>
                                                <span class="time">5 minutes ago</span> 
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="notif-icon notif-success"> <i class="fa fa-comment"></i> </div>
                                            <div class="notif-content">
                                                <span class="block">
                                                    Rahmad commented on Admin
                                                </span>
                                                <span class="time">12 minutes ago</span> 
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="notif-img"> 
                                                <img src="<?php echo base_url('assets/upload/mahasiswa/').$this->session->userdata('username')?>.jpg" alt="Img Profile">
                                            </div>
                                            <div class="notif-content">
                                                <span class="block">
                                                    Reza send messages to you
                                                </span>
                                                <span class="time">12 minutes ago</span> 
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="notif-icon notif-danger"> <i class="fa fa-heart"></i> </div>
                                            <div class="notif-content">
                                                <span class="block">
                                                    Farrah liked Admin
                                                </span>
                                                <span class="time">17 minutes ago</span> 
                                            </div>
                                        </a>
                                    </div>
                                </li>
                                <li>
                                    <a class="see-all" href="javascript:void(0);">See all notifications<i class="fa fa-angle-right"></i> </a>
                                </li>
                            </ul>
                        </li> -->

                        <li class="nav-item dropdown hidden-caret">
                            <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                                <div class="avatar-sm">
                                    <?php  $data = $this->User_model->get_profil_akun();
                                    foreach($data as $user) :
                                       ?>

                                       <?php if($user->foto != null) { ?>
                                         <img src="<?php echo base_url('assets/upload/foto-profil/').$this->session->userdata('username')?>.jpg" alt="..." class="avatar-img rounded-circle">
                                     <?php }else{ ?>
                                       <img src="<?php echo base_url('assets/img/')?>default.jpg" alt="..." class="avatar-img rounded-circle">
                                   <?php } ?>
                               <?php endforeach; ?>
                           </div>
                       </a>
                       <ul class="dropdown-menu dropdown-user animated fadeIn">
                        <div class="dropdown-user-scroll scrollbar-outer">
                            <li>
                                <div class="user-box">
                                    <div class="avatar-lg">
                                       <?php  $data = $this->User_model->get_profil_akun();
                                        foreach($data as $user) : ?>
                                         <?php if($user->foto != null) { ?>
                                            <img src="<?php echo base_url('assets/upload/foto-profil/').$this->session->userdata('username')?>.jpg" alt="image profile" class="avatar-img rounded"></div>
                                       <?php }else{ ?>
                                          <img src="<?php echo base_url('assets/img/')?>default.jpg" alt="image profile" class="avatar-img rounded">
                                      </div>
                                     <?php } ?>
                                 <?php endforeach; ?>

                                 <div class="u-text">
                                    <h4><?php echo $this->session->userdata('nama_lengkap'); ?></h4>
                                    <!-- <p class="text-muted"><?php echo $this->session->userdata('email'); ?></p> -->
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?php echo base_url('user/biodata/'.$this->session->userdata('username')) ?>">Profil Saya</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?php echo base_url('user/settingAkun') ?>">Pengaturan Akun</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?php  echo base_url('login/logout')   ?>">Logout</a>
                        </li>
                    </div>
                </ul>
            </li>
        </ul>
    </div>
</nav>
<!-- End Navbar -->
</div>