<div class="main-panel">
	<div class="content">
		<div class="page-inner">
			<div class="page-header">
				<h4 class="page-title">Edit Proses Penempatan</h4>
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
						<a href="#">Edit Proses Penempatan</a>
					</li>
				</ul>
			</div>
			<div class="row">
				<?php foreach($data as $d) : ?>
					<div class="col-md-12">
						<div class="card">
							<div class="card-header">
								<div class="card-title">Edit Proses Penempatan</div>
							</div>
							<div class="card-body">
								<?php echo form_open_multipart('Penempatan/editProsesPenempatan') ?>
								<div class="row">
									<div class="col-md-6 col-lg-6">
										<div class="form-group">
											<!-- id proses -->
											<input type="hidden" name="id_proses" value="<?= $d->id_proses ?>" class="form-control">

											<label>Nama Mahasiswa</label>
											<input type="text" value="<?= $d->nama_mahasiswa ?>" required="true" name="nama_mahasiswa" class="form-control"  id="mahasiswa"  placeholder="Masukan NIM atau nama mahasiswa">	
										</div>
									</div>
									<div class="col-md-6 col-lg-6">
										<div class="form-group">
											<label>NIM</label>
											<input type="text" name="nim" value="<?= $d->nim ?>" class="form-control" id="nim"  placeholder="NIM  mahasiswa" readonly="true">
										</div>
									</div>
									<div class="col-md-6 col-lg-6">
										<div class="form-group">
											<label>Perusahaan</label>
											<input type="text" value="<?= $d->nama_perusahaan ?>" required="true" name="nama_perusahaan" class="form-control"  placeholder="Masukan nama perusahaan" id="nama">
										</div>
									</div>
									<div class="col-md-6 col-lg-6">
										<div class="form-group">
											<label>ID Perusahaan</label>
											<input type="text" value="<?= $d->id_perusahaan ?>" name="id_perusahaan" class="form-control" id="nim"  placeholder="ID Perusahaan" readonly="true">
										</div>
									</div>
									<div class="col-md-6 col-lg-3">
										<div class="form-group">
											<label>Posisi</label>
											<input type="text" value="<?= $d->posisi_dilamar ?>" required="true" name="posisi_dilamar" class="form-control"  placeholder="Posisi yang dilamar">
										</div>
									</div>
									<div class="col-md-6 col-lg-3">
										<div class="form-group">
											<label>Tanggal Proses</label>
											<input type="date" value="<?= $d->tgl_proses ?>" required="true" name="tgl_proses" class="form-control">
										</div>
									</div>
									<div class="col-md-6 col-lg-3">
										<div class="form-group">
											<label>Status</label>
											<select class="form-control form-control-lg" name="status" required="true">
												<option value="Kerja" <?php if($d->status == 'Kerja') {echo 'selected';} ?>>Kerja</option>
												<option value="Magang" <?php if($d->status == 'Magang') {echo 'selected';} ?> >Magang</option>
											</select>
										</div>
									</div>
									<div class="col-md-6 col-lg-3">
										<div class="form-group">
											<label>Keterangan</label>
											<select class="form-control form-control-lg" name="keterangan">
												<option value="Dalam Proses" <?php if($d->keterangan === 'Dalam Proses'){echo 'selected';} ?>>Dalam Proses</option>
												<option value="Tidak Lolos CV" <?php if($d->keterangan === 'Tidak Lolos CV'){echo 'selected';} ?>>Tidak Lolos CV</option>
												<option value="Tidak Lolos Interview" <?php if($d->keterangan === 'Tidak Lolos Interview'){echo 'selected';} ?>>Tidak Lolos Interview</option>
												<option value="Tidak Lolos Tes" <?php if($d->keterangan === 'Kerja'){echo 'selected';} ?>>Tidak Lolos Tes</option>
												<option value="Diterima" <?php if($d->keterangan === 'Diterima'){echo 'selected';} ?>>Diterima</option>
												<option value="Mangkir" <?php if($d->keterangan === 'Mangkir'){echo 'selected';} ?>>Mangkir</option>
												<option value="Cancel Perusahaan" <?php if($d->keterangan === 'Cancel Perusahaan'){echo 'selected';} ?>>Cancel Perusahaan</option>
											</select>	
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

		$('#mahasiswa').autocomplete({
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