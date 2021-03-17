<div class="main-panel">
  <div class="content">
    <div class="panel-header bg-primary-gradient">
      <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
          <div>
            <h2 class="text-white pb-2 fw-bold">Selamat Datang, <?php echo $this->session->userdata('nama_lengkap'); ?></h2>
            <h5 class="text-white op-7 mb-2">Sistem Informasi Penempatan Kerja Mahasiswa </h5>
          </div>
          <div class="ml-md-auto py-2 py-md-0">
           <!--  <a href="#" class="btn btn-white btn-border btn-round mr-2">Manage</a>
            <a href="#" class="btn btn-secondary btn-round">Add Customer</a> -->
          </div>
        </div>
      </div>
    </div>
    <div class="page-inner mt-0">


      <?php foreach($data as $d) : ?>
        <div class="row">

          <div class="col-md-4">
            <div class="card card-post card-round" >

              <div class="card-body ">
                <div class="d-flex">
                  <!-- <div class="avatar">
                    <img src="<?php echo base_url('assets/img/3.jpg') ?>" alt="..." class="avatar-img rounded-circle">
                  </div> -->
                  <?php if($d->foto != null) { ?>
                    <img style="padding-bottom: 10px;height: auto;width: 100%;" class="card-img-top" src="<?php echo base_url('assets/upload/mahasiswa/') ?><?= $d->foto ?>"  alt="Card image cap">
                  <?php }else{ ?>
                    <img style="padding-bottom: 10px;height: auto;width: 100%;" class="card-img-top" src="<?php echo base_url('assets/img/default.jpg') ?>"  alt="Card image cap">
                  <?php } ?>
                </div>
                
                <div class="user-profile text-center">
                  <div class="name">
                    <h2><?= $d->nama_mahasiswa ?></h2>

                  </div>
                  <div class="separator-solid"></div>
                  <h6><?= $d->nama_prodi ?></h6>
                  <div class="job"><?= $d->nim ?></div>
                </div>
              </div>
            </div>


          <!--   <div class="card">
              <div class="card-header">Curriculum Vitae</div>
              <div class="card-body">
                    <div class="row">
                      <div class="col-md-12" style="padding-left: 35px;padding-right: 35px;">
                        <?php if($d->cv !=null) { ?>
                          <a href="#" class="badge badge-pill badge-primary">
                            <i class="fa fa-file">  </i>
                            <?= $d->cv ?>
                          </a>  &nbsp;&nbsp;&nbsp;
                          <a href="<?php  echo base_url('user/download/') ?><?= $d->nim ?>" class="badge badge-pill badge-primary">
                            <i class="fa fa-download">  </i>
                            Download
                          </a>
                        <?php }else{ echo "<div class='badge badge-pill badge-danger'><i class='fa fa-times'></i> &nbsp; Tidak ada file </div>"; }  ?>

                      </div>
                      
                    </div>
              </div> 
              <div class="card-footer">
                    <div class="row">
                      <div class="col-md-8">
                        <?php echo form_open_multipart('user/uploadCv/')?>
                        <input type="hidden" name="nim" value="<?= $d->nim ?>" class="form-control">
                        <input type="file" name="cv" class="form-control form-control-sm">

                      </div>
                      <div class="col-md-4">
                        <button type="submit" class="btn btn-primary btn-sm">
                          <i class="fa fa-upload"></i>  Upload
                        </button>
                        <?php form_close() ?>
                      </div>
                      
                    </div>
              </div> 
            </div>
          -->
<!--             <div class="card">
              <div class="card-header">Upload CV</div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="row">
                      <div class="col-md-8">
                        <?php echo form_open_multipart('user/uploadCv/')?>
                        <input type="hidden" name="nim" value="<?= $d->nim ?>" class="form-control">
                        <input type="file" name="cv" class="form-control form-control-sm">

                      </div>
                      <div class="col-md-4">
                        <button type="submit" class="btn btn-primary btn-sm">
                          <i class="fa fa-upload"></i>  Upload
                        </button>
                        <?php form_close() ?>
                      </div>
                      

                    </div>
                  </div>
                </div>
              </div>  
            </div> -->

          </div>

          <div class="col-md-8">

            <div class="card">
              <div class="card-header card-primary">
                <h4 class="card-title"><i class="fas fa-calendar-alt"></i> Jadwal Interview</h4>
              </div>
              <div class="card-body ">
                <div class="table-responsive">
                  <table  class=" table table-hover " >
                    <thead>
                      <tr align="center">
                        <th>No</th>                    
                        <th>Nama Perushaan</th>
                        <th>Tanggal Interview</th>
                        <th>Keterangan</th>
                      </tr>
                    </thead>

                    <tbody>
                      <?php  $no =1; foreach($jadwal as $jdw ):  ?>
                      <tr align="center">
                        <td><?php echo $no++; ?></td>
                        <td><?= $jdw->nama_perusahaan ?></td>
                        <td><?php echo  date('d M Y', strtotime($jdw->tgl_interview)); ?></td>
                        <td><?= $jdw->keterangan ?></td>
                      </tr>
                    <?php   endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>



        </div>



    </div> <!-- end row -->
  <?php endforeach; ?>

</div>
</div>
