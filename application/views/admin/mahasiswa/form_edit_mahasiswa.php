<div class="main-panel">
	<div class="content">
		<div class="page-inner">
			<div class="page-header">
				<h4 class="page-title">Edit Data Mahasiswa</h4>
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
						<a href="#">Edit Data Mahasiswa</a>
					</li>
				</ul>
			</div>
			<?php 	foreach($data as $mhs) : ?>
				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="card-header">
								<div class="card-title">Form Mahasiswa</div>
							</div>

							<div class="card-body">
								<?php echo form_open_multipart('Mahasiswa/editMahasiswa') ?>
								<div class="row">
									<div class="col-md-6 col-lg-6">
										<div class="form-group">
											<label>NIM</label>
											<input type="hidden" value="<?= $mhs->nim ?>" name="nim" class="form-control"  placeholder="Masukan NIM">
											<input type="text" value="<?= $mhs->nim ?>" name="nim_update" class="form-control"  placeholder="Masukan NIM">

										</div>
										<div class="form-group">
											<label>Program Studi</label>
											<select class="form-control" name="id_prodi">
												<?php 
												$data = $this->db->get('prodi')->result();
												foreach($data as $d) : ?>
													?>
													<option value="<?= $d->id_prodi ?>" <?php if($mhs->id_prodi == $d->id_prodi){ echo "selected";}  ?> >
														<?= $d->nama_prodi ?>

													</option>
												<?php endforeach; ?>
											</select>
										</div>

									</div>
									<div class="col-md-6 col-lg-6">

										<div class="form-group">
											<label>Nama Mahasiswa</label>
											<input type="text" value="<?= $mhs->nama_mahasiswa ?>" name="nama_mahasiswa" class="form-control" placeholder="Nama Mahasiswa">
										</div>
										<div class="form-group">
											<label>Email</label>
											<input type="email" value="<?= $mhs->email ?>" name="email" class="form-control" placeholder="Email">
										</div>

									</div>
									<div class="col-md-4 col-lg-4">
										<div class="form-group">
											<label>IPK</label>
											<input type="text" name="ipk" value="<?= $mhs->ipk ?>"  class="form-control" placeholder="Contoh : 3.80 ">
										</div>
									</div>
									<div class="col-md-4 col-lg-4">
										<div class="form-group">
											<label>Skor TOEIC</label>
											<input type="text" name="toeic" value="<?= $mhs->toeic ?>" class="form-control" placeholder="Contoh : 800 ">
										</div>
									</div>
									<div class="col-md-4 col-lg-4">
										<div class="form-group">
											<label>Tahun Akademik</label>
											<input type="text" value="<?= $mhs->tahun_akademik ?>" name="tahun_akademik" class="form-control" placeholder="Contoh : 2018/2019">
										</div>
									</div>
									<div class="col-lg-6 col-md-6">
										<div class="form-group">
											<label>ALamat</label>
											<textarea class="form-control" name="alamat"><?= $mhs->alamat ?></textarea>
										</div>
									</div>
									<div class="col-lg-6 col-md-6">
										<div class="form-group">
											<label>Minat</label>
											<textarea class="form-control" name="minat"><?= $mhs->minat ?></textarea>
										</div>
									</div>
									<div class="col-lg-6 col-md-6">
										<div class="form-group">
											<label>No. Telpon</label>
											<input type="text" name="telepon" value="<?= $mhs->telepon ?>" class="form-control">
										</div>
									</div>
									<div class="col-lg-6 col-md-6">
										<div class="form-group">
											<label>No. Telpon Orang Tua</label>
											<input class="form-control" value="<?= $mhs->telepon_orangtua ?>" name="telepon_orangtua">
										</div>
									</div>

									<div class="col-lg-3 col-md-3" style="padding-top: 20px;padding-left:25px;">
										<?php if($mhs->foto != null) { ?>
											<img style="height: auto;width: 100%;" class="card-img-top" src="<?php echo base_url('assets/upload/mahasiswa/') ?><?= $mhs->foto ?>"  alt="Card image cap">
											<small align="center"><?= $mhs->foto ?></small>
										<?php }else{ ?>
											<img style="height: auto;width: 100%;" class="card-img-top" src="<?php echo base_url('assets/img/default.jpg') ?>"  alt="Card image cap">
											<small>defaul.jpg</small>
										<?php } ?>
									</div>
									<div class="col-lg-9 col-md-9">
										<div class="form-group">
											<label>Foto</label>
											<input type="hidden" class="form-control" value="<?= $mhs->foto ?>" name="old_image">
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
	<?php endforeach; ?>
</div>
</div>

