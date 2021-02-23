<div class="main-panel">
	<div class="content">
		<div class="page-inner">
			<div class="page-header">
				<h4 class="page-title">Form Permintaan Perusahaan</h4>
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
						<a href="#">Perusahaan</a>
					</li>
					<li class="separator">
						<i class="flaticon-right-arrow"></i>
					</li>
					<li class="nav-item">
						<a href="#">Form Permintaan Perusahaan</a>
					</li>
				</ul>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<div class="card-title">Form Permintaan Perusahaan</div>
						</div>
						<div class="card-body">
							<?php echo form_open_multipart('Perusahaan/addPerusahaan') ?>
							<div class="row">
								<div class="col-md-12 col-lg-12">
									<div class="form-group">
										<label>Nama Perusahaan</label>
										<input type="text" name="nama_perusahaan" class="form-control"  placeholder="Nama Perusahaan">
									</div>
								</div>
								<div class="col-md-6 col-lg-6">
									<div class="form-group">
										<label>Tanggal</label>
										<input type="date" name="tanggal" class="form-control" >
									</div>
								</div>
								<div class="col-md-6 col-lg-6">
									<div class="form-group">
										<label>Permintaan Via</label>
										<input type="text" name="permintaan_via" class="form-control"  placeholder="ex : whatsapp / email / instagram dll">
									</div>
								</div>
								<div class="col-md-6 col-lg-12">
									<div class="form-group">
										<label>Alamat Perusahaan</label>
										<textarea name="alamat" class="form-control"></textarea>
									</div>
								</div>
								<div class="col-md-6 col-lg-6">
									<div class="form-group">
										<label>Contact Person</label>
										<input type="text" name="contact_person" class="form-control"  placeholder="Nama Contact Person">
									</div>
								</div>
								<div class="col-md-6 col-lg-6">
									<div class="form-group">
										<label>Jabatan</label>
										<input type="text" name="jabatan" class="form-control"  placeholder="Jabatan">
									</div>
								</div>
								<div class="col-md-6 col-lg-6">
									<div class="form-group">
										<label>Telepon</label>
										<input type="text" name="telepon" class="form-control"  placeholder="Nomor Telepon">
									</div>
								</div>
								<div class="col-md-6 col-lg-6">
									<div class="form-group">
										<label>Email</label>
										<input type="email" name="email" class="form-control"  placeholder="Email">
									</div>
								</div>
								<div class="col-md-6 col-lg-6">
									<div class="form-group">
										<label>Posisi yang dibutuhkan</label>
										<textarea name="posisi" class="form-control"></textarea>
									</div>
								</div>
								<div class="col-md-6 col-lg-6">
									<div class="form-group">
										<label>Kriteria</label>
										<textarea name="kriteria" class="form-control"></textarea>
									</div>
								</div>
								<div class="col-md-6 col-lg-6">
									<div class="form-group">
										<label>Status</label>
										<select class="form-control" name="status_kerja">
											<option value="Kerja">Kerja</option>
											<option value="Magang">Magang</option>
										</select>
									</div>
								</div>
								<div class="col-md-6 col-lg-6">
									<div class="form-group">
										<label>Kategori</label>
										<select class="form-control" name="kategori">
											<option value="permintaan">Permintaan</option>
											<option value="penawaran">Penawaran</option>
										</select>
									</div>
								</div>
							</div>
						</div>
						<div class="card-action">
							<button type="Submit" class="btn btn-primary">Simpan</button>
							<a href="<?php echo base_url('Perusahaan/getPerusahaan') ?>" class="btn btn-danger">Batal</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
