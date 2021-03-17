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
      <div class="user " >
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
            <span class="user-level"><?php if($level === 'ADM') { echo "Super Admin";}elseif($level === 'STAF'){ echo "Staf"; } elseif($level === 'KABID') { echo "Kepala Bidang"; } ?></span>
            <span class="caret"></span>
          </span>
        </a>
        <div class="clearfix"></div>

        <div class="collapse in" id="collapseExample">
          <ul class="nav">
            <li>
              <a href="#profile">
                <span class="link-collapse">Profil Saya</span>
              </a>
            </li>
            <li>
              <a href="#edit">
                <span class="link-collapse">Edit Profil</span>
              </a>
            </li>

          </ul>
        </div>
      </div>
    </div>
    <ul class="nav nav-primary">
      <li class="nav-item <?php if($segment2 === 'Beranda'){ echo 'active' ; } ?>" >
        <a  href="<?php echo base_url('admin/Beranda') ?>" class="collapsed">
          <i class="fas fa-home"></i>
          <p>Beranda</p>
        </a>             
      </li>
      <div class="dropdown-divider"></div>

      <!--  menu penempatan kerja -->
      <li class="nav-item <?php if($segment1 === 'Penempatan'){ echo 'active submenu' ; } ?>">
        <a data-toggle="collapse" href="#penempatan">
          <i class="fas fa-briefcase"></i>
          <p>Penempatan Kerja</p>
          <span class="caret"></span>
        </a>
        <div class="collapse <?php if($segment1 === 'Penempatan'){ echo 'show' ; } ?>" id="penempatan">
          <ul class="nav nav-collapse">
            <li class=" <?php if($segment2 === 'prosesPenempatan'){ echo 'active' ; } ?>">
              <a href="<?php echo base_url('Penempatan/prosesPenempatan') ?>">
                <span class="sub-item">Proses Penempatan</span>
              </a>
            </li>
            <li class=" <?php if($segment2 === 'progresPenempatan'){ echo 'active' ; } ?>">
              <a href="<?php echo base_url('Penempatan/progresPenempatan') ?>">
                <span class="sub-item">Progres Penempatan</span>
              </a>
            </li>
          </ul>
        </div>
      </li>

      <!-- menu mahasiswa -->
      <li class="nav-item <?php if($segment1 === 'Mahasiswa'){ echo 'active submenu' ; } ?>">
        <a data-toggle="collapse" href="#mahasiswa">
          <i class="fas fa-user-graduate"></i>
          <p>Mahasiswa</p>
          <span class="caret"></span>
        </a>
        <div class="collapse <?php if($segment1 === 'Mahasiswa'){ echo 'show' ; } ?>" id="mahasiswa">
          <ul class="nav nav-collapse">
            <li class="<?php if($segment2 === 'formTambah'){ echo 'active' ; } ?>">
              <a href="<?php echo base_url('Mahasiswa/formTambah') ?>">
                <span class="sub-item">Form Mahasiswa</span>
              </a>
            </li>
            <li class="<?php if($segment2 === 'getMahasiswa'){ echo 'active' ; } ?>">
              <a href="<?php echo base_url('Mahasiswa/getMahasiswa') ?>">
                <span class="sub-item">Data Mahasiswa</span>
              </a>
            </li>
            <li class="<?php if($segment2 === 'minatMahasiswa'){ echo 'active' ; } ?>">
              <a href="<?php echo base_url('Mahasiswa/minatMahasiswa') ?>">
                <span class="sub-item">Minat Mahasiswa</span>
              </a>
            </li>
            <li class="<?php if($segment2 === 'getMasalah'){ echo 'active' ; } ?>">
              <a href="<?php echo base_url('Mahasiswa/getMasalah') ?>">
                <span class="sub-item">Mahasiswa Bermasalah</span>
              </a>
            </li>
          </ul>
        </div>
      </li>

      <!-- Data perusahaan -->
      <li class="nav-item <?php if($segment1 === 'Perusahaan'){ echo 'active submenu' ; } ?>">
        <a data-toggle="collapse" href="#perusahaan">
          <i class="fas fa-building"></i>
          <p>Perusahaan</p>
          <span class="caret"></span>
        </a>
        <div class="collapse <?php if($segment1 === 'Perusahaan'){ echo 'show' ; } ?>" id="perusahaan">
          <ul class="nav nav-collapse">
            <li class="<?php if($segment2 === 'formTambah'){ echo 'active' ; } ?>">
              <a href="<?php echo base_url('Perusahaan/formTambah ') ?>">
                <span class="sub-item">Form Perusahaan</span>
              </a>
            </li>
            <li class="<?php if($segment2 === 'getPerusahaan'){ echo 'active' ; } ?>">
              <a href="<?php echo base_url('Perusahaan/getPerusahaan') ?>">
                <span class="sub-item">Data Perusahaan</span>
              </a>
            
            </ul>
          </div>
        </li>

        <li class="nav-item <?php if($segment2 === 'getJadwal'){ echo 'active' ; } ?>" >
          <a  href="<?php echo base_url('admin/getJadwal') ?>" class="collapsed">
            <i class="fas fa-calendar-alt"></i>
            <p>Jadwal Interview</p>
          </a>             
        </li>

        <li class="nav-section">
          <span class="sidebar-mini-icon">
            <i class="fa fa-ellipsis-h"></i>
          </span>
          <h4 class="text-section">Pengaturan</h4>
        </li>

       <!--  <li class="nav-item <?php if($segment2 === 'getUser'){ echo 'active' ; } ?>">
          <a href="<?php echo base_url('admin/getUser') ?>">
            <i class="fas fa-user-cog"></i>
            <p>User Management</p>
          </a>
        </li> -->


        <!--  menu user manajemen -->
        <li class="nav-item <?php if($segment2 == 'getUser' || $segment2 == 'getUserMahasiswa' ){ echo 'active submenu' ; } ?>">
          <a data-toggle="collapse" href="#user">
            <i class="fas fa-user-cog"></i>
            <p>Manajemen User</p>
            <span class="caret"></span>
          </a>
          <div class="collapse <?php if($segment2 === 'getUser' || $segment2 == 'getUserMahasiswa'){ echo 'show' ; } ?>" id="user">
            <ul class="nav nav-collapse">

                <?php if($this->session->userdata('level') === "ADM" || $this->session->userdata('level') === "KABID"  ) { ?>

              <li class=" <?php if($segment2 === 'getUser'){ echo 'active' ; } ?>">
                <a href="<?php echo base_url('admin/getUser') ?>">
                  <span class="sub-item">Data User Admin</span>
                </a>
              </li>

            <?php } ?>


              <li class=" <?php if($segment2 === 'getUserMahasiswa'){ echo 'active' ; } ?>">
                <a href="<?php echo base_url('admin/getUserMahasiswa') ?>">
                  <span class="sub-item">Data User Mahasiswa</span>
                </a>
              </li>
            </ul>
          </div>
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