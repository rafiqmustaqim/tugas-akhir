<div class="main-panel">
  <div class="content">
    <div class="page-inner">
      <div class="page-header">
        <h4 class="page-title">Data Perusahaan</h4>
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
            <a href="#"> Perusahaan</a>
          </li>
          <li class="separator">
            <i class="flaticon-right-arrow"></i>
          </li>
          <li class="nav-item">
            <a href="#">Data Perusahaan</a>
          </li>
        </ul>
      </div>

      <?php if( $this->session->flashdata('msg') ) : ?>
        <div class="row mt-3">
          <div class="col-md-12 col-lg-12">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              Data Perusahaan <strong>berhasil</strong>  <?php echo $this->session->flashdata('msg'); ?> 
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
                <h4 class="card-title">Data Perusahaan</h4>

                <a href="<?php echo base_url('Perusahaan/export_permintaan_perusahaan') ?>" class="btn btn-info btn-border btn-round btn-sm ml-auto">
                  <span class="btn-label">
                    <i class="fa fa-file-excel"></i>
                  </span>
                  Export Data Permintaan
                </a>
                &nbsp;
                <a href="<?php echo base_url('Perusahaan/export_penawaran_perusahaan') ?>" class="btn btn-info btn-border btn-round btn-sm">
                  <span class="btn-label">
                    <i class="fa fa-file-excel"></i>
                  </span>
                  Export Data Penawaran
                </a>
              </div>
            </div>
            <div class="card-body">
              <ul class="nav nav-pills nav-secondary" id="pills-tab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#permintaan" role="tab" aria-controls="pills-home" aria-selected="true">Permintaan</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Penawaran</a>
                </li>
              </ul>

              <div class="tab-content mt-2 mb-3" id="pills-tabContent">

                <div class="tab-pane fade show active" id="permintaan" role="tabpanel" aria-labelledby="pills-home-tab">
                  <table id="add-row" class="display table  table-hover table-head-bg-primary" >
                    <thead>
                      <tr align="center">
                        <th>No</th>
                        <th>Nama Perusahaan</th>
                        <th>Alamat</th>
                        <th>Posisi</th>
                        <th>Kriteria</th>
                        <th>Status Kerja</th>
                        <th style="width: 100px">Action</th>
                      </tr>
                    </thead>

                    <tbody>
                      <?php  $no =1; foreach($permintaan as $minta ):  ?>
                      <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?= $minta['nama_perusahaan']; ?></td>
                        <td><?= $minta['alamat']; ?></td>
                        <td><?= $minta['posisi']; ?></td>
                        <td><?= $minta['kriteria'] ?></td>
                        <td><?= $minta['status_kerja'] ?></td>
                        <td>
                          <div class="form-button-action">
                            <a href="<?php  echo base_url('Perusahaan/detailPermintaan/') ?><?= $minta['id_perusahaan']; ?>" data-toggle="tooltip" title="Detail Permintaan" class="btn btn-link btn-primary btn-lg" data-original-title="Detail Permintaan" >
                              <i class="fa fa-info-circle"></i>
                            </a>
                            <a href="<?php  echo base_url('Perusahaan/formEdit/') ?><?= $minta['id_perusahaan']; ?>" data-toggle="tooltip" title="Edit" class="btn btn-link btn-primary btn-lg" data-original-title="Edit" >
                              <i class="fa fa-edit"></i>
                            </a>
                            <a  data-toggle="tooltip" title="Hapus Data" href="<?php echo base_url('Perusahaan/deletePerusahaan') ?>/<?= $minta['id_perusahaan']; ?>" class="btn btn-link btn-danger" data-original-title="Hapus" onClick="return confirm('Data akan dihapus?')" >
                              <i class="fa fa-times"></i>
                            </a>
                          </div>
                        </td>
                      </tr>
                    <?php   endforeach; ?>
                  </tbody>
                </table>
              </div>

              <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <table id="basic-datatables" class="display table  table-hover table-head-bg-primary" >
                  <thead>
                    <tr align="center">
                      <th>No</th>
                      <th>Nama Perusahaan</th>
                      <th>Alamat</th>
                      <th>Posisi</th>
                      <th>Kriteria</th>
                      <th>Status Kerja</th>
                      <th style="width: 100px">Aksi</th>
                    </tr>
                  </thead>

                  <tbody>
                   <?php  $no =1; foreach($penawaran as $nawar ):  ?>
                   <tr align="center">
                    <td><?php echo $no++; ?></td>
                    <td><?= $nawar['nama_perusahaan']; ?></td>
                    <td><?= $nawar['alamat']; ?></td>
                    <td><?= $nawar['posisi']; ?></td>
                    <td><?= $nawar['kriteria'] ?></td>
                    <td><?= $nawar['status_kerja'] ?></td>
                    <td>
                      <div class="form-button-action">
                        <a href="<?php  echo base_url('Perusahaan/detailPenawaran/') ?><?= $nawar['id_perusahaan']; ?>" data-toggle="tooltip" title="Detail Penawaran" class="btn btn-link btn-primary btn-lg" data-original-title="Detail Penawaran" >
                          <i class="fa fa-info-circle"></i>
                        </a>
                        <a href="<?php  echo base_url('Perusahaan/formEdit/') ?><?= $nawar['id_perusahaan']; ?>" data-toggle="tooltip" title="Edit" class="btn btn-link btn-primary btn-lg" data-original-title="Edit" data-target="#modaledit<?= $nawar['id_perusahaan']; ?>">
                          <i class="fa fa-edit"></i>
                        </a>
                        <a   data-toggle="tooltip" title="Hapus Data" href="<?php echo base_url('Perusahaan/deletePerusahaan') ?>/<?= $nawar['id_perusahaan']; ?>" class="btn btn-link btn-danger" data-original-title="Hapus" onClick="return confirm('Data akan dihapus?')" >
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

</div>
<!-- end row -->


</div>
</div>

