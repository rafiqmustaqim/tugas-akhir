
<!doctype html>

<html class="no-js" lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>SIPKM | Register </title>
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="icon" href="<?php echo base_url('assets/login/') ?>img/lp3i/logo3.png" type="image/x-icon" />

  <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">

  <link rel="stylesheet" href="<?php echo base_url('assets/login/') ?>plugins/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/login/') ?>plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/login/') ?>plugins/ionicons/dist/css/ionicons.min.css">
  <link href='<?php echo base_url();?>assets/js/jquery.autocomplete.css' rel='stylesheet' />
  <link rel="stylesheet" href="<?php echo base_url('assets/login/') ?>dist/css/theme.min.css">
  <script src="<?php echo base_url('assets/login/') ?>src/js/vendor/modernizr-2.8.3.min.js"></script>
  <!-- Memanggil file .js untuk proses autocomplete -->
  <script type='text/javascript' src='<?php echo base_url();?>assets/js/jquery-1.8.2.min.js'></script>
  <script type='text/javascript' src='<?php echo base_url();?>assets/js/jquery.autocomplete.js'></script>



</head>

<body>


  <div class="auth-wrapper">
    <div class="container-fluid h-100">
      <div class="row flex-row h-100 bg-white">
        <div class="col-xl-6 col-lg-6 col-md-5 p-0 d-md-block d-lg-block d-sm-none d-none">
          <div class="lavalite-bg" style="background-image: url('<?php echo base_url('assets/login/') ?>img/auth/bg-lp3i.jpg')">
            <div class="lavalite-overlay"></div>
          </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-7 my-auto p-0">
          <div class="authentication-form mx-auto">
            <div  style="padding-left: 160px; padding-right: 160px;position: relative;">
              <a href="<?php echo base_url() ?>"><img src="<?php echo base_url('assets/login/') ?>img/lp3i/logo4.png" alt="Logo LP3I" width="150px"  ></a>
            </div>
            <br>
            <h3 align="center">Registrasi Akun</h3>

            <form method="post" action="<?php echo base_url('Admin/saveRegister') ?>">

              <div class="form-group">
                <input type="text" required="true" name="username" class="form-control"  id="maha"  placeholder="Masukan NIM" required="true">
                <i class="fa fa-user"></i>
              </div>
              <div class="form-group">
                <input type="hidden"  class="form-control" id="nim"  placeholder="NIM  mahasiswa" readonly="true">
              </div>
              <div class="form-group">
                <input type="hidden" name="status" value="0" class="form-control" id="nim"  placeholder="NIM  mahasiswa" readonly="true">
              </div>
              <div class="form-group">
                <input type="hidden" name="level" value="MHS" class="form-control" id="nim"  placeholder="NIM  mahasiswa" readonly="true">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="nama_lengkap" placeholder="Nama Lengkap" required required="true">
                <i class="fa fa-user"></i>
              </div>
              <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Email" required required="true">
                <i class="fa fa-envelope"></i>
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <input type="password" id="pw1" class="form-control" placeholder="password" required>
                    <i class="fa fa-lock"></i>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <input type="password" id="pw2" name="password" class="form-control" placeholder="Konfirmasi password" required>
                    <i class="fa fa-lock"></i>
                  </div>
                </div>
              </div>
              <div class="sign-btn text-center">
                <button type="submit" class="btn btn-primary">Daftar</button>
                <a href="<?php echo base_url('admin') ?>" class="btn btn-danger">Batal</a>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
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
  <script type="text/javascript">
    window.onload = function () {
      document.getElementById("pw1").onchange = validatePassword;
      document.getElementById("pw2").onchange = validatePassword;
    }

    function validatePassword(){
      var pass2=document.getElementById("pw2").value;
      var pass1=document.getElementById("pw1").value;
      if(pass1!=pass2)
        document.getElementById("pw2").setCustomValidity("Passwords Tidak Sama, Coba Lagi");
      else
        document.getElementById("pw2").setCustomValidity('');
    }
  </script>
  <!-- <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script> -->
  <!--   <script>window.jQuery || document.write('<script src="<?php echo base_url('assets/login/') ?>src/js/vendor/jquery-3.3.1.min.js"><\/script>')</script> -->
  <script src="<?php echo base_url() ?>assets/js/core/bootstrap.min.js"></script>
  <script src="<?php echo base_url() ?>assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
  <script src="<?php echo base_url('assets/login/') ?>plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
  <script src="<?php echo base_url('assets/login/') ?>plugins/screenfull/dist/screenfull.js"></script>
  <script src="<?php echo base_url('assets/login/') ?>dist/js/theme.js"></script>
  <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
  <script src="<?php echo base_url() ?>assets/js/core/popper.min.js"></script>
  <script src="<?php echo base_url() ?>assets/js/jquery-3.3.1.js" type="text/javascript"></script>
  >


</body>
</html>
