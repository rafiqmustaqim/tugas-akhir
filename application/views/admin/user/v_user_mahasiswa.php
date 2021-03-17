<div class="main-panel">
  <div class="content">
    <div class="page-inner">
      <div class="page-header">
        <h4 class="page-title">Data User Mahasiswa</h4>
        <ul class="breadcrumbs">
          <li class="nav-home">
            <a href="#">
              <i class="flaticon-home"></i>
            </a>
          </li>
          <li class="separator">
            <i class="flaticon-right-arrow"></i>
          </li>
          <li class="nav-item">
            <a href="#">Manajemen User</a>
          </li>
          <li class="separator">
            <i class="flaticon-right-arrow"></i>
          </li>
          <li class="nav-item">
            <a href="#">Data User Mahasiswa</a>
          </li>
        </ul>
      </div>

      <?php if( $this->session->flashdata('msg') ) : ?>
        <div class="row mt-3">
          <div class="col-md-12 col-lg-12">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              Data User <strong>berhasil</strong>  <?php echo $this->session->flashdata('msg'); ?> 
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true" style="vertical-align: center;">&times;</span>
              </button>
            </div>
          </div>
        </div>
      <?php endif; ?>

      <div class="row">



        <div class="col-md-12">
          <div class="card">
            <div class="card-header">

              <div class="d-flex align-items-center">
                <h4 class="card-title">Data User Belum Diverifikasi</h4>

              </div>
            </div>
            <div class="card-body">


              <div class="table-responsive">
                <table id="add-row" class="display table  table-hover table-head-bg-primary" >
                  <thead align="center">
                    <tr>
                      <th>No</th>
                      <th>Username</th>
                      <th>Nama Lengkap</th>
                      <th>Status</th>
                      <th style="width: 10%">Action</th>
                    </tr>
                  </thead>

                  <tbody align="center">
                   <?php  $no =1; foreach($nonaktif as $u ):  ?>
                   <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?= $u['username']; ?></td>
                    <td><?= $u['nama_lengkap']; ?></td>

                    <td>
                      <?php  if ($u['status'] === "1"){
                        echo "<div class='badge badge-pill badge-success'><i class='fa fa-check'></i> &nbsp;Aktif</div>";
                      }else{
                       echo "<div class='badge badge-pill badge-danger'><i class='fa fa-clock'></i> &nbsp; Menunggu Verifikasi</div>";
                     }

                     ?>    
                   </td>
                   <td>
                    <div class="form-button-action">
                      <button data-toggle="modal" title="Verifikasi" class="btn btn-link btn-primary btn-lg" data-original-title="Edit" data-target="#modaledit<?= $u['user_id']; ?>">
                        <i class="fa fa-check"></i>
                      </button>
                      <a  data-toggle="tooltip" href="<?php echo base_url('admin/deleteUserMahasiswa') ?>/<?= $u['user_id']; ?>" class="btn btn-link btn-danger" title="Hapus" onClick="return confirm('Data akan dihapus?')" >
                        <i class="fa fa-times"></i>
                      </a>
                    </div>
                  </td>
                </tr>
              <?php   endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-12">
    <div class="card">
      <div class="card-header">

        <div class="d-flex align-items-center">
          <h4 class="card-title">Data User Terverifikasi</h4>
        </div>
      </div>
      <div class="card-body">


        <div class="table-responsive">
          <table id="basic-datatables" class="display table  table-hover table-head-bg-primary" >
            <thead align="center">
              <tr>
                <th>No</th>
                <th>Username</th>
                <th>Nama Lengkap</th>
                <th>Status</th>
                <th style="width: 10%">Action</th>
              </tr>
            </thead>

            <tbody align="center">
             <?php  $no =1; foreach($aktif as $akt ):  ?>
             <tr>
              <td><?php echo $no++; ?></td>
              <td><?= $akt['username']; ?></td>
              <td><?= $akt['nama_lengkap']; ?></td>

              <td>
                <?php  if ($akt['status'] === "1"){
                  echo "<div class='badge badge-pill badge-success'><i class='fa fa-check'></i> &nbsp;Aktif</div>";
                }else{
                 echo "<div class='badge badge-pill badge-danger'><i class='fa fa-clock'></i> &nbsp;Menunggu Verifikasi</div>";
               }

               ?>    
             </td>
             <td>
              <div class="form-button-action">
                <a  data-toggle="tooltip" title="Edit" href="<?php echo base_url('admin/formEditUser') ?>/<?= $akt['user_id']; ?>" class="btn btn-link btn-primary" data-original-title="Edit"  >
                <i class="fa fa-edit"></i>
              </a>
              <a  data-toggle="tooltip" href="<?php echo base_url('admin/deleteUserMahasiswa') ?>/<?= $akt['user_id']; ?>" class="btn btn-link btn-danger" data-original-title="Hapus" onClick="return confirm('Data akan dihapus?')" >
                <i class="fa fa-times"></i>
              </a>
            </div>
          </td>
        </tr>
      <?php   endforeach; ?>
    </tbody>
  </table>
</div>
</div>
</div>
</div>

</div>
<!-- end row -->


<!-- Modal Tambah -->
<?php foreach($nonaktif as $non) : ?>
  <div class="modal fade" id="modaledit<?= $non['user_id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header no-bd">
          <h5 class="modal-title">
            <span class="fw-mediumbold">
            Verifikasi User</span> 
          </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="<?php   echo base_url('Admin/verifikasiUser') ?>" method="post">
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                 <input name="user_id" value="<?= $non['user_id']; ?>" type="hidden" >
                 <input name="nama_lengkap" value="<?= $non['nama_lengkap']; ?>" type="text" class="form-control" required="true" placeholder="nama lengkap" readonly>
               </div>
             </div>
             <div class="col-sm-12">
              <div class="form-group">
                <input name="username" value="<?= $non['username']; ?>" type="text" class="form-control" required="true" placeholder="username" readonly>
              </div>
            </div>
            <input name="level" type="hidden" class="form-control" value="MHS">
            <input name="status" type="hidden" class="form-control" value="1">
          </div>
        </div>
        <div class="modal-footer no-bd">
          <button type="submit"  class="btn btn-primary">Verifikasi</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php endforeach; ?>

</div>
</div>


