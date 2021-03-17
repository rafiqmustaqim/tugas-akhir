<?php 
$nim = $this->session->userdata('username');
$level = $this->session->userdata('level'); 
$segment1 = $this->uri->segment('1');
$segment2 = $this->uri->segment('2');
$segment3 = $this->uri->segment('3');


?>
<!-- Sidebar -->
<div class="sidebar sidebar-style-2">

  <div class="sidebar-wrapper scrollbar scrollbar-inner">
    <div class="sidebar-content">
      <div class="user">
        <div class="avatar-sm float-left mr-2">
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

        <div class="info">
          <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
            <span>
              <?php  echo $this->session->userdata('nama_lengkap'); ?>
              <span class="user-level"><?php if($level === 'MHS') { echo "Mahasiswa";} ?></span>
              <span class="caret"></span>
            </span>
          </a>
          <div class="clearfix"></div>

          <div class="collapse in" id="collapseExample">
            <ul class="nav">
              <li>
                <a href="<?php echo base_url('user/biodata/'.$this->session->userdata('username')) ?>">
                  <span class="link-collapse">Profil Saya</span>
                </a>
              </li>
              <li>
                <a href="<?php echo base_url('user/formEdit/').$this->session->userdata('username') ?>">
                  <span class="link-collapse">Edit Biodata</span>
                </a>
              </li>

            </ul>
          </div>
        </div>
      </div>
      <ul class="nav nav-primary">



        <li class="nav-item <?php if($segment2 === 'dashboard'){ echo 'active' ; } ?>" >
          <a  href="<?php echo base_url('user/dashboard') ?>" class="collapsed">
            <i class="fas fa-home"></i>
            <p>Beranda</p>
          </a>             
        </li>
        <div class="dropdown-divider"></div>

        <li class="nav-item <?php if($segment2 === 'biodata'){ echo 'active' ; } ?>" >
          <a  href="<?php echo base_url('user/biodata') ?>" class="collapsed">
            <i class="fas fa-user-graduate"></i>
            <p>Profil Biodata</p>
          </a>             
        </li>


        <li class="nav-item <?php if($segment2 === 'progresPenempatan'){ echo 'active' ; } ?>" >
          <a  href="<?php echo base_url('user/progresPenempatan') ?>" class="collapsed">
            <i class="fas fa-briefcase"></i>
            <p>Progres Penempatan</p>
          </a>             
        </li>
        
        <li class="nav-section">
          <span class="sidebar-mini-icon">
            <i class="fa fa-ellipsis-h"></i>
          </span>
          <h4 class="text-section">Pengaturan</h4>
        </li>


        <li class="nav-item <?php if($segment2 === 'settingAkun'){ echo 'active' ; } ?>" >
          <a  href="<?php echo base_url('user/settingAkun') ?>" class="collapsed">
            <i class="fas fa-user-cog"></i>
            <p>Pengaturan Akun</p>
          </a>             
        </li>





      </ul>
    </div>
  </div>
</div>