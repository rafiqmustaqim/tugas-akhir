<div class="main-panel">
  <div class="content">
    <div class="page-inner">
      <div class="page-header">
        <h4 class="page-title">Data User</h4>
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
            <a href="#">Data User</a>
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
              <h4 class="card-title">Data User</h4>
              <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#modaltambah">
                <i class="fa fa-plus"></i>
                Tambah
              </button>
            </div>
          </div>
          <div class="card-body">


            <div class="table-responsive">
              <table id="add-row" class="display table table-striped table-hover" >
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Nama Lengkap</th>
                    <th>Email</th>
                    <th>Level</th>
                    <th>Status</th>
                    <th style="width: 10%">Action</th>
                  </tr>
                </thead>

                <tbody>
                 <?php  $no =1; foreach($user as $u ):  ?>
                 <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?= $u['username']; ?></td>
                  <td><?= $u['nama_lengkap']; ?></td>
                  <td><?= $u['email']; ?></td>
                  <td>
                    <?php  if($u['level'] === 'ADM'){
                      echo "Super Admin"; 
                    }elseif($u['level'] === 'STAF'){
                      echo "Staf";
                    }elseif($u['level'] === 'KABIRO'){
                      echo "Kepala Biro";
                    }
                    ?>

                  </td>
                  <td>
                    <?php  if ($u['status'] === "1"){
                      echo "<div class='badge badge-pill badge-success'>Aktif</div>";
                    }

                    ?>    
                  </td>
                  <td>
                    <div class="form-button-action">
                      <button data-toggle="modal" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit" data-target="#modaledit<?= $u['user_id']; ?>">
                        <i class="fa fa-edit"></i>
                      </button>
                      <a  data-toggle="tooltip" href="<?php echo base_url('admin/deleteUser') ?>/<?= $u['user_id']; ?>" class="btn btn-link btn-danger" data-original-title="Hapus" onClick="return confirm('Data akan dihapus?')" >
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
<div class="modal fade" id="modaltambah" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header no-bd">
        <h5 class="modal-title">
          <span class="fw-mediumbold">
          Tambah User</span> 
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php   echo base_url('Admin/addUser') ?>" method="post">
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
               <input name="nama_lengkap" type="text" class="form-control" required="true" placeholder="nama lengkap">
             </div>
           </div>
           <div class="col-sm-12">
            <div class="form-group">
              <input name="username" type="text" class="form-control" required="true" placeholder="username">
            </div>
          </div>
          <div class="col-md-6 pr-0">
            <div class="form-group ">
              <input  type="password" class="form-control" required="true" placeholder="password">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group ">
              <input name="password" type="password" class="form-control" required="true" placeholder="confirm password">
            </div>
          </div>
          <div class="col-sm-12">
            <div class="form-group">
              <input name="email" type="email" class="form-control" required="true" placeholder="email">
            </div>
          </div>
          <div class="col-sm-12">
            <div class="form-group">
             <select class="form-control" name="level">
               <option value="ADM"> Admin Super</option>
               <option value="KABIRO"> Kepala Biro </option>
               <option value="STAF"> Staf </option>
             </select>
           </div>
         </div>
         <input name="status" type="hidden" class="form-control" value="1">
       </div>
     </div>
     <div class="modal-footer no-bd">
      <button type="submit"  class="btn btn-primary">Simpan</button>
      <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
    </div>
  </form>
</div>
</div>
</div>

<!-- Modal Tambah -->
<?php foreach($user as $usr) : ?>
  <div class="modal fade" id="modaledit<?= $usr['user_id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header no-bd">
          <h5 class="modal-title">
            <span class="fw-mediumbold">
            Edit User</span> 
          </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="<?php   echo base_url('Admin/editUser') ?>" method="post">
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                 <input name="user_id" value="<?= $usr['user_id']; ?>" type="hidden" >
                 <input name="nama_lengkap" value="<?= $usr['nama_lengkap']; ?>" type="text" class="form-control" required="true" placeholder="nama lengkap">
               </div>
             </div>
             <div class="col-sm-12">
              <div class="form-group">
                <input name="username" value="<?= $usr['username']; ?>" type="text" class="form-control" required="true" placeholder="username">
              </div>
            </div>
            <div class="col-md-6 pr-0">
              <div class="form-group ">
                <input  type="password" value="<?= $usr['password']; ?>" class="form-control" required="true" placeholder="password">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group ">
                <input name="password" value="<?= $usr['password']; ?>" type="password" class="form-control" required="true" placeholder="confirm password">
              </div>
            </div>
            <div class="col-sm-12">
              <div class="form-group">
                <input name="email" value="<?= $usr['email']; ?>" type="email" class="form-control" required="true" placeholder="email">
              </div>
            </div>
            <div class="col-sm-12">
              <div class="form-group">
               <select class="form-control" name="level">
                 <option value="ADM" <?php if($usr['level'] === "ADM") { echo "selected"; } ?> > Admin Super</option>
                 <option value="KABIRO" <?php if($usr['level'] === "KABIRO") { echo "selected"; } ?> > Kepala Biro </option>
                 <option value="STAF" <?php if($usr['level'] === "STAF") { echo "selected"; } ?> > Staf </option>
               </select>
             </div>
           </div>
           <input name="status" type="hidden" class="form-control" value="1">
         </div>
       </div>
       <div class="modal-footer no-bd">
        <button type="submit"  class="btn btn-primary">Simpan</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
      </div>
    </form>
  </div>
</div>
</div>
<?php endforeach; ?>

</div>
</div>


