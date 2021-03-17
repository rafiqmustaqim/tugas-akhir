<div class="main-panel">
  <div class="content">
    <div class="page-inner">
      <div class="page-header">
        <h4 class="page-title">Data Mahasiswa</h4>
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
            <a href="#">Data Mahasiswa</a>
          </li>
        </ul>
      </div>

      <?php if( $this->session->flashdata('msg') ) : ?>
        <div class="row mt-3">
          <div class="col-md-12 col-lg-12">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              Data Mahasiswa <strong>berhasil</strong>  <?php echo $this->session->flashdata('msg'); ?> 
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
                <h4 class="card-title">Data Mahasiswa</h4>
                <a href="<?php echo base_url('Mahasiswa/formtambah') ?>" class="btn btn-primary btn-round ml-auto" >
                  <i class="fa fa-plus"></i>
                  Tambah
                </a>
              </div>
            </div>
            <div class="card-body">



              <div class="table-responsive">
                <table id="multi-filter-select" class="display table  table-hover table-head-bg-primary" >

                  <thead>
                    <tr align="center">
                      <th style="width: 10px;">No</th>
                      <th style="width: 60px;">NIM</th>
                      <th>Nama Mahasiswa</th>
                      <th>Program Studi</th>
                      <th>Tahun Akademik</th>
                      <th>Status</th>
                      <th style="width: 80px">Aksi</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                   <?php  $no =1; foreach($data as $d ):  ?>
                   <tr align="center">
                    <td><?php echo $no++; ?></td>
                    <td><?= $d['nim']; ?></td>
                    <td><?= $d['nama_mahasiswa']; ?></td>
                    <td><?= $d['nama_prodi']; ?></td>
                    <td><?= $d['tahun_akademik']; ?></td>
                    <td>
                      <?php if($d['ipk'] >= 3 && $d['toeic'] >= 400) { ?>
                        <span class="badge badge-success badge-pill">Wajib Kerja</span>
                      <?php }elseif($d['ipk'] <= 3 && $d['toeic'] >= 350 ){ ?>
                        <span class="badge badge-warning badge-pill">Dibantu M/K</span>
                      <?php }elseif($d['ipk'] >= 3 && $d['toeic'] <= 400 ){ ?>
                        <span class="badge badge-warning badge-pill">Dibantu M/K</span>
                      <?php }elseif($d['ipk'] <= 3 && $d['toeic'] <= 350 ){ ?>
                        <span class="badge badge-warning badge-pill">Dibantu M/K</span>
                      <?php } ?>
                    </td>
                    <td>
                      <div class="form-button-action">
                        <a href="<?php  echo base_url('Mahasiswa/detail/') ?><?= $d['nim']; ?>" data-toggle="tooltip" title="Detail Mahasiswa" class="btn btn-link btn-primary btn-sm" data-original-title="Detail Mahasiswa" >
                          <i class="fa fa-info-circle"></i>
                        </a>
                        <a href="<?php  echo base_url('Mahasiswa/formEdit/') ?><?= $d['nim']; ?>" data-toggle="tooltip" title="Edit" class="btn btn-link btn-primary btn-sm" data-original-title="Edit" data-target="#modaledit<?= $d['nim']; ?>">
                          <i class="fa fa-edit"></i>
                        </a>
                        <a  data-toggle="tooltip" href="<?php echo base_url('Mahasiswa/deleteMahasiswa') ?>/<?= $d['nim']; ?>" class="btn btn-link btn-danger btn-sm" data-original-title="Hapus" onClick="return confirm('Data akan dihapus?')" >
                          <i class="fa fa-times"></i>
                        </a>
                      </div>
                    </td>
                  </tr>
                <?php   endforeach; ?>
              </tbody>
              <tfoot>
                    <tr>
                      <th>No</th>
                      <th>NIM</th>
                      <th>Nama Mahasiswa</th>
                      <th>Program Studi</th>
                      <th>Tahun Akademik</th>
                      <!-- <th>Status</th> -->
                    </tr>
                  </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- end row -->

  <script src="<?php echo base_url() ?>assets/js/plugin/datatables/datatables.min.js"></script>

  <script type="text/javascript">
    $('#multi-filter-select').DataTable( {
      "pageLength": 5,
      initComplete: function () {
        this.api().columns().every( function () {
          var column = this;
          var select = $('<select class="form-control"><option value=""></option></select>')
          .appendTo( $(column.footer()).empty() )
          .on( 'change', function () {
            var val = $.fn.dataTable.util.escapeRegex(
              $(this).val()
              );

            column
            .search( val ? '^'+val+'$' : '', true, false )
            .draw();
          } );

          column.data().unique().sort().each( function ( d, j ) {
            select.append( '<option value="'+d+'">'+d+'</option>' )
          } );
        } );
      }
    });
  </script>

</div>
</div>


