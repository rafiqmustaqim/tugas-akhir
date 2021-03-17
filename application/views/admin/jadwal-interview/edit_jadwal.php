<div class="main-panel">
  <div class="content">
    <div class="page-inner">
      <div class="page-header">
        <h4 class="page-title">Edit Jadwal Interview</h4>
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
          <li class="separator">
            <i class="flaticon-right-arrow"></i>
          </li>
          <li class="nav-item">
            <a href="#">Edit Jadwal Interview</a>
          </li>
        </ul>
      </div>


      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">

              <div class="d-flex align-items-center">
                <h4 class="card-title">Edit Jadwal Interview</h4>
                
              </div>
            </div>
            <div class="card-body">
              <?php foreach($jadwal as $j) : ?>
              <form action="<?php   echo base_url('Admin/editJadwal') ?>" method="post">
                <div class="row">
                  <div class="col-md-6 col-lg-6">
                    <input name="id_jadwal" value="<?= $j->id_jadwal ?>" type="hidden" class="form-control" required="true" placeholder="nama lengkap">
                    <div class="form-group">
                      <label>Nama Mahasiswa</label>
                      <input type="text" required="true" value="<?= $j->nama_mahasiswa ?>" name="nama_mahasiswa" class="form-control"  id="maha"  placeholder="Masukan NIM atau nama mahasiswa">
                      <input name="fk_nim" value="<?= $j->fk_nim ?>" id="nim" type="hidden" class="form-control" required="true" placeholder="nama lengkap">
                    </div>
                  </div>
                  <div class="col-md-6 col-lg-6">
                    <div class="form-group">
                      <label>Nama Perusahaan</label>
                      <input type="text" required="true" value="<?= $j->nama_perusahaan ?>" name="nama_perusahaan" class="form-control"  id="nama"  placeholder="Masukan Nama Perusahaan">
                      <input name="fk_perusahaan" value="<?= $j->fk_perusahaan ?>" id="id_perusahaan" type="hidden" class="form-control" required="true">
                    </div>
                  </div>

                  <div class="col-md-6 col-lg-6">
                    <div class="form-group">
                      <label>Tanggal Interview</label>
                      <input name="tgl_interview" value="<?= $j->tgl_interview ?>" type="date" class="form-control" required="true">
                    </div>
                  </div>

                   <div class="col-md-6 col-lg-6">
                    <div class="form-group">
                      <label>Keterangan</label>
                      <textarea name="keterangan" type="text" class="form-control" ><?= $j->keterangan ?></textarea>
                    </div>
                  </div>

                </div>
              </div>
              <div class="card-action">
                <button type="submit"  class="btn btn-primary">Simpan</button>
                <a href="<?php echo base_url('Admin/getJadwal') ?>" class="btn btn-danger" >Batal</a>
              </div>
            </form>
          <?php endforeach; ?>
          </div>
        </div>
      </div>



    </div>
  </div>


  <script src="<?php echo base_url() ?>/assets/js/jquery-3.3.1.js" type="text/javascript"></script>
<!-- <script src="<?php echo base_url() ?>/assets/js/jquery-ui.js" type="text/javascript"></script>
--><script type="text/javascript">
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



<script type="text/javascript">
  $(document).ready(function(){
    $('#nama').autocomplete({
      source: "<?php echo site_url('penempatan/get_perusahaan');?>",
      select: function (event, ui) {
        $('[name="nama_perusahaan"]').val(ui.item.nama_perusahaan); 
        $('[name="fk_perusahaan"]').val(ui.item.id_perusahaan); 
      }
    });

  });
</script>