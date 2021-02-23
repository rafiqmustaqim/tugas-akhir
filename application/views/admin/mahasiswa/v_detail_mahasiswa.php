<div class="main-panel">
	<div class="content">
		<div class="page-inner">
			<div class="page-header">
				<h4 class="page-title">Detail Mahasiswa</h4>
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
						<a href="#">Detail</a>
					</li>
				</ul>
			</div>

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
									<div class="job"><?= $d->nim ?></div>

								</div>
								<div class="separator-solid"></div>
							</div>
						</div>
					</div>

					<div class="col-md-8">
						<div class="card">
							<div class="card-header">
								<div class="d-flex align-items-center">
									<h4 class="card-title">Biodata Detail</h4>
									<a href="<?php echo base_url('Mahasiswa/formEdit/') ?><?= $d->nim ?>" class="btn btn-info btn-border btn-round btn-sm ml-auto">
										<span class="btn-label">
											<i class="fa fa-edit"></i>
										</span>
										Edit Biodata
									</a>	
								</div>
							</div>
							<div class="card-body">
								<div class="row">
									<!-- <div class="col-4 col-md-4">
										<img src="<?php echo base_url('assets/img/3.jpg') ?>" style="width:100%; height: auto;">	
									</div> -->
									<div class="col-12 col-md-12">
										<div class="tab-content" id="v-pills-with-icon-tabContent">
											<div class="tab-pane fade show active">
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
													</table>
												</div>

											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-md-12">
						<div class="card">
							<div class="card-header">
								<h4 class="card-title"> Penempatan Kerja</h4>
							</div>
							<div class="card-body">
								<div class="row">
									<div class="col-12 col-md-3">
										<div class="nav flex-column nav-pills nav-secondary nav-pills-no-bd nav-pills-icons" id="v-pills-tab-with-icon" role="tablist" aria-orientation="vertical">
											<a class="nav-link active" id="proses-penempatan" data-toggle="pill" href="#v-pills-home-icons" role="tab" aria-controls="v-pills-home-icons" aria-selected="true">
												<i class="fa fa-briefcase"></i>
												Proses Penempatan
											</a>
											<a class="nav-link" id="v-pills-profile-tab-icons" data-toggle="pill" href="#v-pills-profile-icons" role="tab" aria-controls="v-pills-profile-icons" aria-selected="false">
												<i class="fas fa-exclamation-triangle"></i>
												Masalah
											</a>
										</div>
									</div>
									<div class="col-12 col-md-9">
										<div class="tab-content" id="v-pills-with-icon-tabContent">
											<div class="tab-pane fade show active" id="v-pills-home-icons" role="tabpanel" aria-labelledby="proses-penempatan">

												<div class="table table-responsive">
													<table class="table table-bordered">
														<thead>	
															<tr align="center">
																<td>No</td>
																<td>Nama Perusahaan</td>
																<td>Tanggal Proses CV</td>
																<td>Posisi</td>
																<td>Status</td>
																<td>Keterangan</td>	
															</tr>

														</thead>
														<tbody>	
															<?php $no = 1;	foreach($proses_penempatan as $proses) : ?>
															<tr align="center">	
																<td><?php echo $no++; ?></td>
																<td><?= $proses->nama_perusahaan ?></td>
																<td><?php echo date('d-m-Y' ,strtotime($proses->tgl_proses)); ?></td>
																<td><?= $proses->posisi_dilamar ?></td>
																<td><?= $proses->status ?></td>
																<td>
																	<?php if($proses->keterangan === 'Diterima') { ?>
																		<span class="badge badge-success badge-pill">
																			<i class="fa fa-check"></i>&nbsp;
																			<?= $proses->keterangan ?>
																		</span>
																	<?php }elseif ($proses->keterangan === 'Dalam Proses') { ?>
																		<span class="badge badge-warning badge-pill">
																			<i class="fa fa-times"></i>&nbsp;
																			<?= $proses->keterangan ?>
																		</span>
																	<?php }else{ ?>
																		<span class="badge badge-danger badge-pill">
																			<i class="fa fa-times"></i>&nbsp;
																			<?= $proses->keterangan ?>
																		</span>
																	<?php } ?>
																</td>
															</tr>
														<?php endforeach; ?>
													</tbody>	
												</table>	
											</div>		

										</div>


										<div class="tab-pane fade" id="v-pills-profile-icons" role="tabpanel" aria-labelledby="v-pills-profile-tab-icons">



										</div>


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
