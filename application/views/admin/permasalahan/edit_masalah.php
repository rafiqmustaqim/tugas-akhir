<div class="main-panel">
  <div class="content">
    <div class="page-inner">
      <div class="page-header">
        <h4 class="page-title">Edit Mahasiswa Bermasalah</h4>
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
            <a href="#">Mahasiswa Bermasalah</a>
          </li>
          <li class="separator">
            <i class="flaticon-right-arrow"></i>
          </li>
          <li class="nav-item">
            <a href="#">Edit Mahasiswa Bermasalah</a>
          </li>
        </ul>
      </div>


      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">

              <div class="d-flex align-items-center">
                <h4 class="card-title">Edit Mahasiswa Bermasalah</h4>
                
              </div>
            </div>


            <div class="card-body">
             <?php foreach($data as $d) : ?>
              <form action="<?php   echo base_url('Mahasiswa/editMasalah') ?>" method="post">
                <div class="row">
                  <div class="col-md-6 col-lg-6">
                    <div class="form-group">
                       <input name="id_masalah" value="<?= $d->id_masalah ?>" type="hidden" class="form-control" required="true" placeholder="nama lengkap">
                      <label>Nama Mahasiswa</label>
                      <input type="text" required="true" value="<?= $d->nama_mahasiswa ?>" name="nama_mahasiswa" class="form-control"  id="maha"  placeholder="Masukan NIM atau nama mahasiswa">
                      <input name="fk_nim" value="<?= $d->fk_nim ?>" id="nim" type="hidden" class="form-control" required="true" placeholder="nama lengkap">
                    </div>
                  </div>
                  <div class="col-md-6 col-lg-6">
                    <div class="form-group">
                      <label>Jenis Masalah</label>
                      <input type="text" required="true" value="<?= $d->jenis_masalah ?>" name="jenis_masalah" class="form-control"  placeholder="Jenis Masalah">
                    </div>
                  </div>

                  <div class="col-md-12 col-lg-12">
                    <div class="form-group">
                      <label>Keterangan</label>
                      <textarea name="keterangan"  type="text" class="form-control" ><?= $d->keterangan ?></textarea>
                    </div>
                  </div>

                </div>
              </div>
              <div class="card-action">
                <button type="submit"  class="btn btn-primary">Simpan</button>
                <a href="<?php echo base_url('Mahasiswa/getMasalah') ?>" class="btn btn-danger" >Batal</a>
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


