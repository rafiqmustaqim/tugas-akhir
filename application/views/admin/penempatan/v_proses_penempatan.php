<div class="main-panel">
	<div class="content">
		<div class="page-inner">
			<div class="page-header">
				<h4 class="page-title">Proses Penempatan Kerja</h4>
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
						<a href="#">Proses Penempatan Kerja</a>
					</li>
				</ul>
			</div>

			<?php if( $this->session->flashdata('sukses') ) : ?>
				<div class="row mt-3">
					<div class="col-md-12 col-lg-12">
						<div class="alert alert-success alert-dismissible fade show" role="alert">
							Proses penempatan kerja <strong>berhasil</strong>  <?php echo $this->session->flashdata('sukses'); ?> 
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true" style="vertical-align: center;">&times;</span>
							</button>
						</div>
					</div>
				</div>
			<?php endif; ?>
			<!-- 			<?php if( $this->session->flashdata('gagal') ) : ?>
				<div class="row mt-3">
					<div class="col-md-12 col-lg-12">
						<div class="alert alert-danger alert-dismissible fade show" role="alert">
							Proses penempatan kerja <strong>gagal</strong>  <?php echo $this->session->flashdata('gagal'); ?> 
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true" style="vertical-align: center;">&times;</span>
							</button>
						</div>
					</div>
				</div>
				<?php endif; ?> -->

				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="card-header">

								<div class="d-flex align-items-center">
									<h4 class="card-title">Data Proses Penempatan Kerja</h4>
									<a class="btn btn-primary btn-round ml-auto" href="<?php echo base_url('Penempatan/formProsesPenempatan') ?>">
										<i class="fa fa-plus"></i>
										Tambah
									</a>
								</div>
							</div>
							<div class="card-body">


								<div class="table-responsive">
									<table id="add-row" class="display table table-hover table-head-bg-primary" >
										<thead>
											<tr align="center">	
												<th>No</th>
												<th>Perusahaan</th>
												<th width="200">Mahasiswa Yang Dikirim</th>
												<th>Tanggal Proses</th>
												<th>Posisi</th>
												<th>Keterangan</th>
<!-- 												<th>Keterangan</th>
 -->												<th style="width: 10%">Action</th>
											</tr>
										</thead>

										<tbody>
											<?php  $no =1; foreach($data as $p ):  ?>
											<tr>
												<td><?php echo $no++; ?></td>
												<td><?= $p['nama_perusahaan']; ?></td>
												<td><?= $p['nama_mahasiswa']; ?></td>
												<td><?php echo date('d-m-Y', strtotime($p['tgl_proses'])); ?></td>
												<td><?= $p['posisi_dilamar']; ?></td>
												<td><?= $p['keterangan']; ?></td>
												<td>
													<div class="form-button-action">
														<a title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit" href="<?php echo base_url('penempatan/formEditProsesPenempatan/') ?><?= $p['id_proses']; ?>">
															<i class="fa fa-edit"></i>
														</a>
														<a  data-toggle="tooltip" href="<?php echo base_url('Penempatan/deleteProsesPenempatan') ?>/<?= $p['id_proses']; ?>" class="btn btn-link btn-danger" data-original-title="Hapus" onClick="return confirm('Menghapus data akan berpengaruh ke data lain, yakin hapus?')" >
															<i class="fa fa-times"></i>
														</a>
													</div>
												</td>
											</tr>
										<?php   endforeach; ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- end row -->



		</div>
	</div>

