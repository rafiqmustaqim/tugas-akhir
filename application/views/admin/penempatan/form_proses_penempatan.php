<div class="main-panel">
	<div class="content">
		<div class="page-inner">
			<div class="page-header">
				<h4 class="page-title">Form Proses Penempatan</h4>
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
						<a href="#">Penempatan</a>
					</li>
					<li class="separator">
						<i class="flaticon-right-arrow"></i>
					</li>
					<li class="nav-item">
						<a href="#">Form Proses Penempatan</a>
					</li>
				</ul>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<div class="card-title">Form Proses Penempatan</div>
						</div>
						<div class="card-body">
							<?php echo form_open_multipart('Penempatan/addProsesPenempatan') ?>
							<div class="row">
								<div class="col-md-6 col-lg-6">
									<div class="form-group">
										<label>Nama Mahasiswa</label>
										<input type="text" required="true" name="nama_mahasiswa" class="form-control"  id="maha"  placeholder="Masukan NIM atau nama mahasiswa">
									</div>
								</div>
								<!-- <div class="col-md-6 col-lg-6">
									<div class="form-group">
										<label>NIM</label> -->
										<input type="hidden" name="nim" class="form-control" id="nim"  placeholder="NIM  mahasiswa" readonly="true">
								<!-- 	</div>
								</div> -->
								<div class="col-md-6 col-lg-6">
									<div class="form-group">
										<label>Perusahaan</label>
										<input type="text" required="true" name="id_perusahaan" class="form-control"  placeholder="Masukan nama perusahaan" id="nama">
									</div>
								</div>
								<!-- <div class="col-md-6 col-lg-6">
									<div class="form-group">
										<label>ID Perusahaan</label> -->
										<input type="hidden" name="id_perusahaan" class="form-control" id="perusahaan"  placeholder="ID Perusahaan" readonly="true">
								<!-- 	</div>
								</div> -->
								<div class="col-md-6 col-lg-6">
									<div class="form-group">
										<label>Posisi</label>
										<input type="text" required="true" name="posisi_dilamar" class="form-control"  placeholder="Posisi yang dilamar">
									</div>
								</div>
								<div class="col-md-6 col-lg-6">
									<div class="form-group">
										<label>Tanggal Proses</label>
										<input type="date" required="true" name="tgl_proses" class="form-control">
									</div>
								</div>
								<div class="col-md-6 col-lg-6">
									<div class="form-group">
										<label>Status</label>
										<select class="form-control form-control-lg" name="status" required="true">
											<option value="Kerja">Kerja</option>
											<option value="Magang">Magang</option>
										</select>
									</div>
								</div>
								<div class="col-md-6 col-lg-6">
									<div class="form-group">
										<label>Keterangan</label>
										<select class="form-control form-control-lg" name="keterangan" id="ket">
											<option value="Dalam Proses">Dalam Proses</option>
											<option value="Tidak Lolos CV">Tidak Lolos CV</option>
											<option value="Tidak Lolos Interview">Tidak Lolos Interview</option>
											<option value="Tidak Lolos Tes">Tidak Lolos Tes</option>
											<option value="Diterima">Diterima</option>
											<option value="Mangkir">Mangkir</option>
											<option value="Cancel Perusahaan">Cancel Perusahaan</option>
										</select>	
									</div>
								</div>
								<div class="col-md-6 col-lg-6">
									<div class="form-group">
										<label id="label" hidden>Tanggal Diterima</label>
										<input type="date" name="tgl_diterima" id="tgl" class="form-control" hidden />
									</div>
								</div>
								<div class="col-md-6 col-lg-6">
									<div class="form-group">
										<label id="label2" hidden>Besaran Gaji</label>
										<input type="text" placeholder="ex : Rp. 5000.000" name="gaji" id="gaji" class="form-control" hidden />
									</div>
								</div>
							</div>
						</div>
						<div class="card-action">
							<button type="Submit" class="btn btn-primary">Simpan</button>
							<a href="<?php echo base_url('Penempatan/prosesPenempatan') ?>" class="btn btn-danger">Batal</a>
						</div>
					</form>
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
				$('[name="nim"]').val(ui.item.nim); 
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
				$('[name="id_perusahaan"]').val(ui.item.id_perusahaan); 
			}
		});

	});
</script>