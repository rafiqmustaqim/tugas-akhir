<div class="main-panel">
  <div class="content">
    <div class="page-inner">
      <div class="page-header">
        <h4 class="page-title">Minat Mahasiswa</h4>
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
            <a href="#">Minat Mahasiswa</a>
          </li>
        </ul>
      </div>

      <?php if( $this->session->flashdata('msg') ) : ?>
        <div class="row mt-3">
          <div class="col-md-12 col-lg-12">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              Minat Mahasiswa <strong>berhasil</strong>  <?php echo $this->session->flashdata('msg'); ?> 
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
                <h4 class="card-title">Minat Mahasiswa</h4>
                <a href="<?php echo base_url('Mahasiswa/formtambah') ?>" class="btn btn-primary btn-round ml-auto" >
                  <i class="fa fa-plus"></i>
                  Tambah
                </a>
              </div>
            </div>
            <div class="card-body">

              <div class="table-responsive">
                <table id="add-row" class="display table table-striped table-hover table-head-bg-primary" >
                  <thead>
                    <tr align="center">
                      <th>No</th>
                      <th>NIM</th>
                      <th>Nama Mahasiswa</th>
                      <th>Program Studi</th>
                      <th>Peminatan</th>
                    </tr>
                  </thead>

                  <tbody>
                   <?php  $no =1; foreach($data as $d ):  ?>
                   <tr align="center">
                    <td><?php echo $no++; ?></td>
                    <td><?= $d['nim']; ?></td>
                    <td><?= $d['nama_mahasiswa']; ?></td>
                    <td><?= $d['id_prodi']; ?></td>
                    <td>  <?= $d['minat']; ?></td>

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


