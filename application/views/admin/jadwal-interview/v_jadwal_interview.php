<div class="main-panel">
  <div class="content">
    <div class="page-inner">
      <div class="page-header">
        <h4 class="page-title">Jadwal Interview</h4>
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
            <a href="#">Jadwal Interview</a>
          </li>
        </ul>
      </div>

      <?php if( $this->session->flashdata('msg') ) : ?>
        <div class="row mt-3">
          <div class="col-md-12 col-lg-12">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              Jadwal <strong>berhasil</strong>  <?php echo $this->session->flashdata('msg'); ?> 
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
          <h4 class="card-title">Jadwal Interview</h4>
          <a class="btn btn-primary btn-round ml-auto" href="<?php echo base_url('admin/formTambahJadwal') ?>">
            <i class="fa fa-plus"></i>
            Tambah
          </a>
        </div>
      </div>

      <div class="card-body">
        <div class="table-responsive">
          <table id="add-row" class="display table  table-hover table-head-bg-primary" >
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Mahasiswa</th>
                <th>Nama Perushaan</th>
                <th>Tanggal Interview</th>
                <th>Keterangan</th>
                <th style="width: 10%">Action</th>
              </tr>
            </thead>

            <tbody>
             <?php  $no =1; foreach($jadwal as $jdw ):  ?>
             <tr>
              <td><?php echo $no++; ?></td>
              <td><?= $jdw['nama_mahasiswa']; ?></td>
              <td><?= $jdw['nama_perusahaan']; ?></td>
              <td><?php echo  date('d M Y', strtotime($jdw['tgl_interview'])); ?></td>
              <td><?= $jdw['keterangan']; ?></td>
              <td>
                <div class="form-button-action">
                  <a data-toggle="tooltip" title="Edit Jadwal Interview" class="btn btn-link btn-primary btn-lg" data-original-title="Edit" href="<?php echo base_url('Admin/formEditJadwal/') ?><?= $jdw['id_jadwal']; ?>">
                    <i class="fa fa-edit"></i>
                  </a>
                  <a  data-toggle="tooltip" title="Hapus" href="<?php echo base_url('admin/deleteJadwal') ?>/<?= $jdw['id_jadwal']; ?>" class="btn btn-link btn-danger" data-original-title="Hapus" onClick="return confirm('Data akan dihapus?')" >
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



</div>
</div>


