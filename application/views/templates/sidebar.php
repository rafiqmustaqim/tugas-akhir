<?php 

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
          <img src="<?php echo base_url() ?>assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
        </div>
        <div class="info">
          <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
            <span>
              <?php  echo $this->session->userdata('nama_lengkap'); ?>
              <span class="user-level"><?php if($level === 'ADM') { echo "Super Admin";}elseif($level === 'STAF'){ echo "Staf"; } elseif($level === 'KABIRO') { echo "Kepala Biro"; } ?></span>
              <span class="caret"></span>
            </span>
          </a>
          <div class="clearfix"></div>

          <div class="collapse in" id="collapseExample">
            <ul class="nav">
              <li>
                <a href="#profile">
                  <span class="link-collapse">My Profile</span>
                </a>
              </li>
              <li>
                <a href="#edit">
                  <span class="link-collapse">Edit Profile</span>
                </a>
              </li>

            </ul>
          </div>
        </div>
      </div>
      <ul class="nav nav-primary">
        <li class="nav-item <?php if($segment2 === 'dashboard'){ echo 'active' ; } ?>" >
          <a  href="<?php echo base_url('admin/dashboard') ?>" class="collapsed">
            <i class="fas fa-home"></i>
            <p>Dashboard</p>
          </a>             
        </li>
        <div class="dropdown-divider"></div>
        <!--  menu penempatan kerja -->
        <li class="nav-item">
          <a data-toggle="collapse" href="#sidebarLayouts">
            <i class="fas fa-briefcase"></i>
            <p>Penempatan Kerja</p>
            <span class="caret"></span>
          </a>
          <div class="collapse" id="sidebarLayouts">
            <ul class="nav nav-collapse">
              <li>
                <a href="../sidebar-style-1.html">
                  <span class="sub-item">Proses Penempatan</span>
                </a>
              </li>
              <li>
                <a href="../overlay-sidebar.html">
                  <span class="sub-item">Progres Penempatan</span>
                </a>
              </li>
              
            </ul>
          </div>
        </li>

        <li class="nav-item <?php if($segment1 === 'Mahasiswa'){ echo 'active submenu' ; } ?>">
          <a data-toggle="collapse" href="#forms">
            <i class="fas fa-user-graduate"></i>
            <p>Mahasiswa</p>
            <span class="caret"></span>
          </a>
          <div class="collapse <?php if($segment1 === 'Mahasiswa'){ echo 'show' ; } ?>" id="forms">
            <ul class="nav nav-collapse">
              <li class="<?php if($segment1 === 'Mahasiswa'){ echo 'active' ; } ?>">
                <a href="<?php echo base_url('Mahasiswa ') ?>">
                  <span class="sub-item">Data Mahasiswa</span>
                </a>
              </li>
              <li>
                <a href="../forms/forms.html">
                  <span class="sub-item">Minat</span>
                </a>
              </li>
            </ul>
          </div>
        </li>

        <li class="nav-item">
          <a href="<?php echo base_url('Perusahaan') ?>">
            <i class="fa fa-building"></i>
            <p>Perusahaan </p>
            <span class="badge badge-success">4</span>
          </a>
        </li>

        <li class="nav-section">
          <span class="sidebar-mini-icon">
            <i class="fa fa-ellipsis-h"></i>
          </span>
          <h4 class="text-section">Setting</h4>
        </li>
        <li class="nav-item <?php if($segment2 === 'getUser'){ echo 'active' ; } ?>">
          <a href="<?php echo base_url('admin/getUser') ?>">
            <i class="fas fa-user-cog"></i>
            <p>User Management</p>
          </a>
        </li>
         <li class="nav-item <?php if($this->uri->segment('2') === 'getProdi'){ echo 'active' ; } ?>">
          <a href="<?php echo base_url('admin/getProdi') ?>">
            <i class="fas fa-book-open"></i>
            <p>Program Studi</p>
          </a>
        </li>

      </ul>
    </div>
  </div>
</div>