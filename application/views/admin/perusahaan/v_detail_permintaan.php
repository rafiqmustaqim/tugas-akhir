<div class="main-panel">
	<div class="content">
		<div class="page-inner">
			<div class="page-header">
				<h4 class="page-title">Detail Permintaan</h4>
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
						<a href="#">Permintaan</a>
					</li>
					<li class="separator">
						<i class="flaticon-right-arrow"></i>
					</li>
					<li class="nav-item">
						<a href="#">Detail Permintaan</a>
					</li>
				</ul>
			</div>

			<?php foreach($permintaan as $d) : ?>
				<div class="col-md-12">
					<div class="card">
						<div class="card-header card-primary">
							<h4 class="card-title">Detail Perusahaan <?= $d->nama_perusahaan ?></h4>
						</div>
						<div class="card-body">
							<div class="row">

								<div class="table table-responsive">
									<table class="table">
										<tr>
											<td style="width: 20%;">Nama Perusahaan</td>
											<td style="width: 1%;">:</td>
											<td><?= $d->nama_perusahaan ?></td>
										</tr>
										<tr>
											<td style="width: 30%;">Alamat</td>
											<td style="width: 1%;">:</td>
											<td><?= $d->alamat ?></td>
										</tr>
										<tr>
											<td style="width: 30%;">Permintaan Via</td>
											<td style="width: 1%;">:</td>
											<td><?= $d->permintaan_via ?></td>
										</tr>
										<tr>
											<td style="width: 30%;">Contact Person</td>
											<td style="width: 1%;">:</td>
											<td><?= $d->contact_person ?></td>
										</tr>
										<tr>
											<td style="width: 30%;">Jabatan</td>
											<td style="width: 1%;">:</td>
											<td><?= $d->jabatan ?></td>
										</tr>
										<tr>
											<td style="width: 30%;">Telepon</td>
											<td style="width: 1%;">:</td>
											<td><?= $d->telepon ?></td>
										</tr>
										<tr>
											<td style="width: 30%;">Posisi yang dibutuhkan</td>
											<td style="width: 1%;">:</td>
											<td><?= $d->posisi ?></td>
										</tr>
										<tr>
											<td style="width: 30%;">Kriteria</td>
											<td style="width: 1%;">:</td>
											<td><?= $d->kriteria ?></td>
										</tr>
										<tr>
											<td style="width: 30%;">Status</td>
											<td style="width: 1%;">:</td>
											<td><?= $d->status_kerja ?></td>
										</tr>
									</table>
								</div>


							</div>
						</div>
					</div>

				<?php endforeach; ?>

					<div class="card">
						<div class="card-header card-primary">
							<h4 class="card-title">Data Mahasiswa Yang Dikirim  </h4>
						</div>
						<div class="card-body">
							<div class="row">

								<div class="table table-responsive">
									<table class="table table-bordered">
										<thead>	
											<tr align="center">
												<td>No</td>
												<td>Nama Mahasiswa</td>
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
												<td><?= $proses->nama_mahasiswa ?></td>
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
															<i class="fa fa-clock"></i>&nbsp;
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
					</div>



			</div>
		</div>
	</div>