<div class="main-panel">
  <div class="content">
    <div class="page-inner">
      <div class="page-header">
        <h4 class="page-title">Data Mahasiswa Bermasalah</h4>
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
            <a href="#">Mahasiswa</a>
          </li>
          <li class="separator">
            <i class="flaticon-right-arrow"></i>
          </li>
          <li class="nav-item">
            <a href="#">Data Mahasiswa Bermasalah</a>
          </li>
        </ul>
      </div>

      <?php if( $this->session->flashdata('msg') ) : ?>
        <div class="row mt-3">
          <div class="col-md-12 col-lg-12">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              Data Mahasiswa Bermasalah <strong>berhasil</strong>  <?php echo $this->session->flashdata('msg'); ?> 
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
                <h4 class="card-title">Data Mahasiswa Bermasalah</h4>
                <a class="btn btn-primary btn-round ml-auto" href="<?php echo base_url('Mahasiswa/formMasalah') ?>">
                  <i class="fa fa-plus"></i>
                  Tambah
                </a>
              </div>
            </div>
            <div class="card-body">


              <div class="table-responsive">
                <table id="add-row" class="display table  table-hover table-head-bg-primary" >
                  <thead>
                    <tr align="center">
                      <th>No</th>
                      <th>Nama Mahasiswa</th>
                      <th>Jenis Masalah</th>
                      <th>Keterangan</th>

                      <th style="width: 10%">Action</th>
                    </tr>
                  </thead>

                  <tbody align="center">
                   <?php  $no =1; foreach($data as $d ):  ?>
                   <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?= $d['nama_mahasiswa']; ?></td>
                    <td><?= $d['jenis_masalah']; ?></td>
                    <td><?= $d['keterangan']; ?></td>
                   
                   <td>
                    <div class="form-button-action">
                    <!--   <button data-toggle="modal" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit" data-target="#modaledit<?= $d['id_masalah']; ?>">
                        <i class="fa fa-edit"></i>
                      </button> -->
                      <a  data-toggle="tooltip" title="Edit" href="<?php echo base_url('Mahasiswa/formEditMasalah') ?>/<?= $d['id_masalah']; ?>" class="btn btn-link btn-primary" data-original-title="Edit"  >
                        <i class="fa fa-edit"></i>
                      </a>
                      <a  data-toggle="tooltip" title="Hapus" href="<?php echo base_url('Mahasiswa/deleteMasalah') ?>/<?= $d['id_masalah']; ?>" class="btn btn-link btn-danger" data-original-title="Hapus" onClick="return confirm('Data akan dihapus?')" >
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
                <input type="text" required="true" name="nama_mahasiswa" class="form-control"  id="maha"  placeholder="Masukan NIM atau nama mahasiswa" >
             </div>
           </div>
           <div class="col-sm-12">
            <div class="form-group">
              <input name="fk_nim" id="nim" type="hidden" class="form-control" required="true" >
            </div>
          </div>
         
          <div class="col-sm-12">
            <div class="form-group">
              <input name="email" type="email" class="form-control" required="true" placeholder="email">
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
 <script src="<?php echo base_url() ?>/assets/js/jquery-3.3.1.js" type="text/javascript"></script>
<script type="text/javascript">
  $(document).ready(function(){

    $('#maha').autocomplete({
      source: "<?php echo site_url('penempatan/get_mahasiswa');?>",

      select: function (event, ui) {
        $('[name="nama_mahasiswa"]').val(ui.item.nama_mahasiswa); 
        $('[name="fk_nim"]').val(ui.item.nim); 
      }
    });

  });
</script>
</div>
</div>

</div>
</div>


