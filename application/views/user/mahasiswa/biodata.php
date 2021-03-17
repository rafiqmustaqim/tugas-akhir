<div class="main-panel">
	<div class="content">
		<div class="page-inner">
			<div class="page-header">
				<h4 class="page-title">Profil Biodata</h4>
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
						<a href="#">Biodata</a>
					</li>
					<li class="separator">
						<i class="flaticon-right-arrow"></i>
					</li>
					<li class="nav-item">
						<a href="#"><?php echo $this->session->userdata('nama_lengkap') ?></a>
					</li>
				</ul>
			</div>

			<?php if( $this->session->flashdata('msg') ) : ?>
				<div class="row mt-3">
					<div class="col-md-12 col-lg-12">
						<div class="alert alert-success alert-dismissible fade show" role="alert">
							Data <strong>berhasil</strong>  <?php echo $this->session->flashdata('msg'); ?> 
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true" style="vertical-align: center;">&times;</span>
							</button>
						</div>
					</div>
				</div>
			<?php endif; ?>

			<?php foreach($data as $d) : ?>
				<div class="row">

					<div class="col-md-4">
						<div class="card card-post card-round" >
							
							<div class="card-body">
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
									<div class="name"><h2><?= $d->nama_mahasiswa ?></h2></div>
									<div class="separator-solid"></div>
									<div class="job"><?= $d->nim ?></div>
								</div>
							</div>
						</div>
						<div class="card">
							<div class="card-header">Upload Curriculum Vitae</div>
							
							<div class="card-body">
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

					<div class="col-md-8">
						<div class="card">
							<div class="card-header">
								<div class="d-flex align-items-center">
									<h4 class="card-title">Biodata <?= $d->nama_mahasiswa ?></h4>
									<a href="<?php echo base_url('user/formEdit/') ?><?= $d->nim ?>" class="btn btn-info btn-border btn-round btn-sm ml-auto">
										<span class="btn-label">
											<i class="fa fa-edit"></i>
										</span>
										Edit Biodata
									</a>	
								</div>
							</div>
							<div class="card-body">
								<ul class="nav nav-pills nav-secondary" id="pills-tab" role="tablist">
									<li class="nav-item">
										<a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Umum</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Detail</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Kontak</a>
									</li>
								</ul>
								<div class="tab-content mt-2 mb-3" id="pills-tabContent">
									<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
										<div class="table table-responsive">	
											<table class="table table-striped">
												<tr style="height: 20px;">
													<td>Program Studi</td><td>:</td><td><?= $d->nama_prodi ?></td>
												</tr>
												<tr>
													<td>Tahun Akademik</td><td>:</td><td><?= $d->tahun_akademik ?></td>
												</tr>
												<tr>
													<td>IPK</td><td>:</td><td><?= $d->ipk ?></td>
												</tr>
												<tr>
													<td>TOEIC</td><td>:</td><td><?= $d->toeic ?></td>
												</tr>

												<tr>
													<td>Status Penempatan</td><td>:</td>
													<td>
														<?php if($d->ipk >= 3 && $d->toeic >= 400) { ?>
															<span class="badge badge-success badge-pill">Wajib Kerja</span>
														<?php }elseif($d->ipk <= 3 && $d->toeic >= 350 ){ ?>
															<span class="badge badge-warning badge-pill">Dibantu M/K</span>
														<?php }elseif($d->ipk >= 3 && $d->toeic <= 400 ){ ?>
															<span class="badge badge-warning badge-pill">Dibantu M/K</span>
														<?php }elseif($d->ipk <= 3 && $d->toeic <= 350 ){ ?>
															<span class="badge badge-warning badge-pill">Dibantu M/K</span>
														<?php } ?>
													</td>
												</tr>
												<tr>
													<td>Curriculum Vitae</td><td>:</td>
													<td>
														<?php if($d->cv !=null) { ?>
															<a href="#" class="badge badge-pill badge-primary">
																<i class="fa fa-file">	</i>
																<?= $d->cv ?>
															</a>	
															<a href="<?php 	echo base_url('user/download/') ?><?= $d->nim ?>" class="badge badge-pill badge-primary">
																<i class="fa fa-download">	</i>
																Download
															</a>
														<?php }else{ echo "<div class='badge badge-pill badge-danger'><i class='fa fa-times'></i> &nbsp; Tidak ada file </div>"; }  ?>
													</td>
												</tr>

											</table>
										</div>
									</div>
									<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
										<div class="table table-responsive">	
											<table class="table table-striped">
												<tr style="height: 20px;">
													<td>Tanggal Lahir</td><td>:</td><td><?= $d->tgl_lahir ?></td>
												</tr>
												<tr>
													<td>Jenis Kelamin </td><td>:</td><td><?= $d->jenis_kelamin ?></td>
												</tr>
												<tr>
													<td>Alamat</td><td>:</td><td><?= $d->alamat ?></td>
												</tr>
												<tr>
													<td>Minat</td><td>:</td><td><?= $d->minat ?></td>
												</tr>

											</table>
										</div>
									</div>
									<div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
										<div class="table table-responsive">	
											<table class="table table-striped">
												<tr style="height: 20px;">
													<td>No. Telepon </td><td>:</td><td><?= $d->telepon ?></td>
												</tr>
												<tr>
													<td>No. Telepon Orang Tua</td><td>:</td><td><?= $d->telepon_orangtua ?></td>
												</tr>
												<tr>
													<td>Email</td><td>:</td><td><?= $d->email ?></td>
												</tr>
												
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>


					</div>



				</div>
			<?php endforeach; ?>

		</div>
	</div>
