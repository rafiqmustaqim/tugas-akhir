    <div class="main-panel">
      <div class="content">
        <div class="panel-header bg-primary-gradient">
          <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
              <div>
                <h2 class="text-white pb-2 fw-bold">Selamat Datang, <?php echo $this->session->userdata('nama_lengkap') ?></h2>
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

            <div class="row">
              <?php foreach($jumlah_mahasiswa as $jml_mhs ) : ?>
                <div class="col-md-4">
                  <div class="card card-info">
                    <div class="card-body skew-shadow">
                     <h4 class="mt-0 pb-0 mb-0 fw-bold" >Jumlah Mahasiswa</h4>
                     <center>
                       <h1><?php echo $jml_mhs->total_mahasiswa ?></h1>
                     </center>
                     <div class="dropdown-divider"> </div>
                     <center>
                      <a class="mt-0 pb-0 mb-0 fw-bold" align="right" style="color: white" href="<?php echo base_url('Mahasiswa/getMahasiswa') ?>">Lihat Selengkapnya</a>
                      <span><i class="fa fa-arrow-right"></i></span>
                    </center>              
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
            <?php foreach($mahasiswa_bekerja as $mhs_bekerja ) : ?>
              <div class="col-md-4">
                <div class="card card-warning">
                  <div class="card-body skew-shadow">
                   <h4 class="mt-0 pb-0 mb-0 fw-bold">Jumlah Mahasiswa Bekerja</h4>
                   <center>
                     <h1><?php echo $mhs_bekerja->total_mahasiswa_bekerja ?></h1>
                   </center>
                   <div class="dropdown-divider"> </div>
                   <center>
                    <a class="mt-0 pb-0 mb-0 fw-bold" align="right" style="color: white" href="<?php echo base_url('penempatan/progresPenempatan') ?>">Lihat Selengkapnya</a>
                    <span><i class="fa fa-arrow-right"></i></span>
                  </center>              
                </div>
              </div>
            </div>
          <?php endforeach; ?>
          <?php foreach($jumlah_perusahaan as $jp ) : ?>
            <div class="col-md-4">
              <div class="card card-success">
                <div class="card-body skew-shadow">
                 <h4  class="mt-0 pb-0 mb-0 fw-bold">Data Perusahaan</h4>
                 <center>
                   <h1><?php echo $jp->total_perusahaan ?></h1>
                 </center>
                 <div class="dropdown-divider"> </div>
                 <center>
                  <a class="mt-0 pb-0 mb-0 fw-bold" align="right" style="color: white" href="<?php echo base_url('Perusahaan/getPerusahaan') ?>">Lihat Selengkapnya</a>
                  <span><i class="fa fa-arrow-right"></i></span>
                </center>              
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>


          <div class="row">
            <div class="col-md-8">
              <div class="card card">
                <div class="card-header card-default">
                  <div class="card-head-row">
                    <div class="card-title">  <i class="fas fa-chart-bar"></i> Grafik Penempatan Kerja</div>
                    <div class="card-tools">
                     <!--  <a href="#" class="btn btn-info btn-border btn-round btn-sm mr-2">
                        <span class="btn-label">
                         
                        </span>
                        Export
                      </a> -->
                        <span class="btn-label">
                        
                        </span>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                    <div class="chart-container">
                      <canvas id="multipleBarChart"></canvas>
                    </div>


                </div>
              </div>
            </div>
            <?php 
            foreach($kumpul_cv as $kumpul ) :
              foreach($ga_kumpul_cv as $gakumpul ) :

               ?>
               <div class="col-md-4">
                <div class="card card-primary bg-secondary-gradient">
                  <div class="card-body">
                    <h4 class="mt-0 pb-0 mb-0 fw-bold">Kelengkapan Dokumen</h4>
                    <hr>
                    <ul class="list-unstyled">
                      <li class="d-flex justify-content-between pb-1 pt-1"><small>Sudah Mengumpulkan CV</small> <span><?php echo $kumpul->ada_cv ?></span></li>
                      <li class="d-flex justify-content-between pb-1 pt-1"><small>Belum Mengumpulkan CV</small> <span><?php echo $gakumpul->gaada_cv ?></span></li>
                    </ul>
                  </div>
                </div>
              <?php endforeach; endforeach; ?>
              <?php 
              foreach($user_admin as $admin ) :
                foreach($user_mahasiswa as $mahasiswa ) :
                  foreach($belum_verifikasi as $belum ) :
                   ?>
                   <div class="card card-default bg-danger-gradient">
                    <div class="card-body">
                      <h4 class="mt-0 pb-0 mb-0 fw-bold">Jumlah User</h4>
                      <hr>
                      <ul class="list-unstyled">
                        <li class="d-flex justify-content-between pb-1 pt-1"><small>Administrator</small> <span><?php echo $admin->user_admin ?></span></li>
                        <li class="d-flex justify-content-between pb-1 pt-1"><small>Mahasiswa</small> <span><?php echo $mahasiswa->user_mahasiswa ?></span></li>
                        <li class="d-flex justify-content-between pb-1 pt-1"><small>Menunggu Verifikasi</small> <span><?php echo $belum->belum_verifikasi ?></span></li>
                      </ul>
                    </div>
                  </div>
                <?php endforeach; endforeach; endforeach; ?>

              </div>
            </div> <!-- end row -->



    </div>
  </div>

<?php   
foreach ($jumlah_mahasiswa_mi as $mhs_mi ) : 
foreach ($jumlah_mahasiswa_ka as $mhs_ka ) :
foreach ($jumlah_mahasiswa_ab as $mhs_ab ) :
foreach ($jumlah_mahasiswa_abi as $mhs_abi ) :
foreach ($jumlah_mahasiswa_humas as $mhs_humas ) :
foreach ($mahasiswa_bekerja_mi as $kerja_mi ) :
foreach ($mahasiswa_bekerja_ka as $kerja_ka ) :
foreach ($mahasiswa_bekerja_ab as $kerja_ab ) :
foreach ($mahasiswa_bekerja_abi as $kerja_abi ) :
foreach ($mahasiswa_bekerja_humas as $kerja_humas ) :

?>


  <script src="<?php echo base_url() ?>/assets/js/plugin/chart.js/chart.min.js"></script>

  <script>

    multipleBarChart = document.getElementById('multipleBarChart').getContext('2d');


    var myMultipleBarChart = new Chart(multipleBarChart, {
      type: 'bar',
      data: {
        labels: ["Mnj. Informatika","Kmp. Akuntansi", "Adm. Bisnis",  "Hub. Masyarakat","Adm. Bisnis Int"],
          datasets : [/*{
            label: "Bekerja",
            backgroundColor: '#b',
            borderColor: '#59d05d',
            data: [95, 100, 112, 101, 144, 159, 178, 156, 188, 190, 210, 245],
          },*/{
            label: "Diterima Kerja",
            backgroundColor: '#59d05d',
            borderColor: '#59d05d',
            data: [<?php echo $kerja_mi->mahasiswa_bekerja_mi ?>, <?php echo $kerja_ka->mahasiswa_bekerja_ka ?>,<?php echo $kerja_ab->mahasiswa_bekerja_ab ?>, <?php echo $kerja_humas->mahasiswa_bekerja_humas ?>, <?php echo $kerja_abi->mahasiswa_bekerja_abi ?>],
          }, {
            label: "Jumlah Mahasiswa",
            backgroundColor: '#177dff',
            borderColor: '#177dff',
            data: [<?php echo $mhs_mi->total_mahasiswa_mi ?>, <?php echo $mhs_ka->total_mahasiswa_ka ?>, <?php echo $mhs_ab->total_mahasiswa_ab ?>, <?php echo $mhs_humas->total_mahasiswa_humas ?>, <?php echo $mhs_abi->total_mahasiswa_abi ?>],
          }],
        },
        options: {
          responsive: true, 
          maintainAspectRatio: true,
          legend: {
            position : 'bottom'
          },
          title: {
            display: false,
            text: 'Penempatan Kerja'
          },
          tooltips: {
            mode: 'index',
            intersect: false
          },
          responsive: true,
          scales: {
            xAxes: [{
              stacked: false,
            }],
            yAxes:  [{
            ticks: {
              beginAtZero:true
            }
          }]
          }
        }
      });


    </script>

    

<?php   endforeach;endforeach;endforeach;endforeach;endforeach;endforeach;endforeach;endforeach;endforeach;endforeach;?>