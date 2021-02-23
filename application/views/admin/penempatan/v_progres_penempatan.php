<div class="main-panel">
	<div class="content">
		<div class="page-inner">
			<div class="page-header">
				<h4 class="page-title">Progres Penempatan Kerja</h4>
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
						<a href="#">Progres Penempatan Kerja</a>
					</li>
				</ul>
			</div>



			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">

							<div class="d-flex align-items-center">
								<h4 class="card-title">Progres Penempatan Kerja</h4>
								<a href="<?php echo base_url('Penempatan/export_progres_penempatan') ?>" class="btn btn-info btn-border btn-round btn-sm ml-auto">
									<span class="btn-label">
										<i class="fa fa-file-excel"></i>
									</span>
									Export Data Progres
								</a> 
							</div>
						</div>
						<div class="card-body">


							<div class="table-responsive">
								<table id="add-row" class="display table table-striped table-hover table-head-bg-primary" >
									<thead>
										<tr align="center">	
											<th>No</th>
											<th>Perusahaan</th>
											<th width="200">Nama Mahasiswa</th>
											<th>Posisi</th>
											<th>Status</th>
											<th>Keterangan</th>
										</tr>
									</thead>

									<tbody>
										<?php  $no =1; foreach($data as $p ):  ?>
										<tr align="center">
											<td><?php echo $no++; ?></td>
											<td><?= $p['nama_perusahaan']; ?></td>
											<td><?= $p['nama_mahasiswa']; ?></td>
											<td><?= $p['posisi_dilamar']; ?></td>
											<td><?= $p['status']; ?></td>
											<td>
												<div class="badge badge-success">
													<i class="fa fa-check"></i>
													Diterima
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

