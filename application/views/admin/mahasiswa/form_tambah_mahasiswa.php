<div class="main-panel">
	<div class="content">
		<div class="page-inner">
			<div class="page-header">
				<h4 class="page-title">Tambah Data Mahasiswa</h4>
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
						<a href="#">Tambah Data Mahasiswa</a>
					</li>
				</ul>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<div class="card-title">Form Mahasiswa</div>
						</div>
						<div class="card-body">
							<?php echo form_open_multipart('Mahasiswa/addMahasiswa') ?>
							<div class="row">
								<div class="col-md-6 col-lg-6">
									<div class="form-group">
										<label>NIM</label>
										<input type="text" name="nim" class="form-control"  placeholder="Masukan NIM">

									</div>
									<div class="form-group">
										<label>Program Studi</label>
										<select class="form-control" name="id_prodi">
											<?php 
											$data = $this->db->get('prodi')->result();
											foreach($data as $d) : ?>
												?>
												<option value="<?= $d->id_prodi ?>"><?= $d->nama_prodi ?></option>
											<?php endforeach; ?>
										</select>
									</div>

								</div>
								<div class="col-md-6 col-lg-6">
									
									<div class="form-group">
										<label>Nama Mahasiswa</label>
										<input type="text" name="nama_mahasiswa" class="form-control" placeholder="Nama Mahasiswa">
									</div>
									<div class="form-group">
										<label>Email</label>
										<input type="email" name="email" class="form-control" placeholder="Email">
									</div>

								</div>
								<div class="col-md-4 col-lg-4">
									<div class="form-group">
										<label>IPK</label>
										<input type="text" name="ipk" class="form-control" placeholder="Contoh : 3.80 ">
									</div>
								</div>
								<div class="col-md-4 col-lg-4">
									<div class="form-group">
										<label>Skor TOEIC</label>
										<input type="text" name="toeic" class="form-control" placeholder="Contoh : 800 ">
									</div>
								</div>
								<div class="col-md-4 col-lg-4">
									<div class="form-group">
										<label>Tahun Akademik</label>
										<input type="text" name="tahun_akademik" class="form-control" placeholder="Contoh : 2018/2019">
									</div>
								</div>
								<div class="col-lg-6 col-md-6">
									<div class="form-group">
										<label>ALamat</label>
										<textarea class="form-control" name="alamat"></textarea>
									</div>
								</div>
								<div class="col-lg-6 col-md-6">
									<div class="form-group">
										<label>Minat</label>
										<textarea class="form-control" name="minat"></textarea>
									</div>
								</div>
								<div class="col-lg-4 col-md-4">
									<div class="form-group">
										<label>No. Telpon</label>
										<input type="text" name="telepon" class="form-control">
									</div>
								</div>
								<div class="col-lg-4 col-md-4">
									<div class="form-group">
										<label>No. Telpon Orang Tua</label>
										<input type="text" class="form-control" name="telepon_orangtua">
									</div>
								</div>
								<div class="col-lg-4 col-md-4">
									<div class="form-group">
										<label>Foto</label>
										<input type="file" class="form-control" name="foto">
									</div>
								</div>
							</div>
						</div>
						<div class="card-action">
							<button type="Submit" class="btn btn-primary">Simpan</button>
							<a href="<?php echo base_url('Mahasiswa/getMahasiswa') ?>" class="btn btn-danger">Batal</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
