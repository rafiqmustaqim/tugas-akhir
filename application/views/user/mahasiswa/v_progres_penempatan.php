<div class="main-panel">
  <div class="content">
    <div class="page-inner">
      <div class="page-header">
        <h4 class="page-title">Progres Penempatan Kerja</h4>
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
            <a href="#"><?php echo $this->session->userdata('nama_lengkap') ?></a>
          </li>
          <li class="separator">
            <i class="flaticon-right-arrow"></i>
          </li>
          <li class="nav-item">
            <a href="#">Progres Penempatan Kerja</a>
          </li>
        </ul>
      </div>

        <div class="row">

        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title"> Penempatan Kerja</h4>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-12 col-md-3">
                  <div class="nav flex-column nav-pills nav-secondary nav-pills-no-bd nav-pills-icons" id="v-pills-tab-with-icon" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="proses-penempatan" data-toggle="pill" href="#v-pills-home-icons" role="tab" aria-controls="v-pills-home-icons" aria-selected="true">
                      <i class="fa fa-briefcase"></i>
                      Proses Penempatan
                    </a>
                    <a class="nav-link" id="v-pills-profile-tab-icons" data-toggle="pill" href="#v-pills-profile-icons" role="tab" aria-controls="v-pills-profile-icons" aria-selected="false">
                      <i class="fas fa-exclamation-triangle"></i>
                      Masalah
                    </a>
                  </div>
                </div>
                <div class="col-12 col-md-9">
                  <div class="tab-content" id="v-pills-with-icon-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-home-icons" role="tabpanel" aria-labelledby="proses-penempatan">

                      <div class="table table-responsive">
                        <table id="basic-datatables" class="display table table-hover table-head-bg-primary">
                          <thead> 
                            <tr align="center">
                              <th>No</th>
                              <th>Nama Perusahaan</th>
                              <th>Tanggal Proses CV</th>
                              <th>Posisi</th>
                              <th>Status</th>
                              <th>Keterangan</th>
                            </tr>

                          </thead>
                          <tbody> 
                            <?php $no = 1;  foreach($proses_penempatan as $proses) : ?>
                            <tr align="center"> 
                              <td><?php echo $no++; ?></td>
                              <td><?= $proses->nama_perusahaan ?></td>
                              <td><?php echo date('d-m-Y' ,strtotime($proses->tgl_proses)); ?></td>
                              <td><?= $proses->posisi_dilamar ?></td>
                              <td><?= $proses->status ?></td>
                              <td>
                                <?php if($proses->keterangan === 'Diterima') { ?>
                                  <span class="badge badge-success badge-pill">
                                    <i class="fa fa-check"></i>&nbsp;
                                    <?= $proses->keterangan ?>
                                  </span>
                                <?php }elseif ($proses->keterangan === 'Dalam Proses') { ?>
                                  <span class="badge badge-warning badge-pill">
                                    <i class="fa fa-clock"></i>&nbsp;
                                    <?= $proses->keterangan ?>
                                  </span>
                                <?php }else{ ?>
                                  <span class="badge badge-danger badge-pill">
                                    <i class="fa fa-times"></i>&nbsp;
                                    <?= $proses->keterangan ?>
                                  </span>
                                <?php } ?>
                              </td>

                            </tr>
                          <?php endforeach; ?>
                        </tbody>  
                      </table>  
                    </div>    

                  </div>


                  <div class="tab-pane fade" id="v-pills-profile-icons" role="tabpanel" aria-labelledby="v-pills-profile-tab-icons">

                    <div class="table-responsive">
                      <table id="tableku" class=" table  table-hover table-head-bg-primary" >
                        <thead>
                          <tr align="center">
                            <th>No</th>
                            <th>Jenis Masalah</th>
                            <th>Keterangan</th>
                          </tr>
                        </thead>

                        <tbody align="center">
                          <?php  $no =1; foreach($masalah as $m ):  ?>
                          <tr>
                            <?php if($m->id_masalah != null) { ?>
                              <td><?php echo $no++; ?></td>
                              <td><?= $m->jenis_masalah ?></td>
                              <td><?= $m->keterangan ?></td>
                            <?php }else{ ?>
                              <tr>
                                <td colspan='3'>Tidak ada data</td>
                              </tr>

                            <?php } ?>

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
      </div>
    </div>
  </div>

<script src="<?php echo base_url() ?>assets/js/plugin/datatables/datatables.min.js"></script>

<script type="text/javascript">
  $(document).ready(function() {
    $('#tableku').DataTable({
    });
      
    });
</script>

</div>
</div>
