<div class="main-panel">
	<div class="content">
		<div class="page-inner">
			<div class="page-header">
				<h4 class="page-title">Program Studi</h4>
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
						<a href="#">Setting</a>
					</li>
					<li class="separator">
						<i class="flaticon-right-arrow"></i>
					</li>
					<li class="nav-item">
						<a href="#">Program Studi</a>
					</li>
				</ul>
			</div>

			<?php if( $this->session->flashdata('msg') ) : ?>
				<div class="row mt-3">
					<div class="col-md-12 col-lg-12">
						<div class="alert alert-success alert-dismissible fade show" role="alert">
							Data Program Studi <strong>berhasil</strong>  <?php echo $this->session->flashdata('msg'); ?> 
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true" style="vertical-align: center;">&times;</span>
							</button>
						</div>
					</div>
				</div>
			<?php endif; ?>

			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">

							<div class="d-flex align-items-center">
								<h4 class="card-title">Data Program Studi</h4>
								<button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#modaltambah">
									<i class="fa fa-plus"></i>
									Tambah
								</button>
							</div>
						</div>
						<div class="card-body">


							<div class="table-responsive">
								<table id="add-row" class="display table  table-hover table-head-bg-primary" >
									<thead>
										<tr>	
											<th>No</th>
											<th>Kode Program Studi</th>
											<th>Program Studi</th>
											<th style="width: 10%">Action</th>
										</tr>
									</thead>

									<tbody>
										<?php  $no =1; foreach($prodi as $p ):  ?>
										<tr>
											<td><?php echo $no++; ?></td>
											<td><?= $p['id_prodi']; ?></td>
											<td><?= $p['nama_prodi']; ?></td>
											<td>
												<div class="form-button-action">
													<button data-toggle="modal" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit" data-target="#modaledit<?= $p['id_prodi']; ?>">
														<i class="fa fa-edit"></i>
													</button>
													<a  data-toggle="tooltip" href="<?php echo base_url('admin/deleteProdi') ?>/<?= $p['id_prodi']; ?>" class="btn btn-link btn-danger" data-original-title="Hapus" onClick="return confirm('Menghapus data akan berpengaruh ke data lain, yakin hapus?')" >
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

		<!-- Modal Tambah -->
		<div class="modal fade" id="modaltambah" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header no-bd">
						<h5 class="modal-title">
							<span class="fw-mediumbold">
							Tambah Program Studi</span> 
						</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form action="<?php   echo base_url('Admin/addProdi') ?>" method="post">
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group">
										<input name="id_prodi" type="text" class="form-control" required="true" placeholder="Kode Program Studi">
									</div>
								</div>
								<div class="col-sm-12">
									<div class="form-group">
										<input name="nama_prodi" type="text" class="form-control" required="true" placeholder="Nama Program Studi">
									</div>
								</div>

							</div>
						</div>
						<div class="modal-footer no-bd">
							<button type="submit"  class="btn btn-primary">Simpan</button>
							<button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
						</div>
					</form>
				</div>
			</div>
		</div>

		<!-- Modal Tambah -->
		<?php foreach($prodi as $d) : ?>
			<div class="modal fade" id="modaledit<?= $d['id_prodi']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header no-bd">
							<h5 class="modal-title">
								<span class="fw-mediumbold">
								Edit Program Studi</span> 
							</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form action="<?php   echo base_url('Admin/editProdi') ?>" method="post">
								<div class="row">
									<div class="col-sm-12">
										<div class="form-group">
											<input name="id_prodi" value="<?= $d['id_prodi']; ?>" type="text" class="form-control" required="true" placeholder="Kode Program Studi">
										</div>
									</div>
									<div class="col-sm-12">
										<div class="form-group">
											<input name="nama_prodi" value="<?= $d['nama_prodi']; ?>" type="text" class="form-control" required="true" placeholder="Program Studi">
										</div>
									</div>


								</div>
							</div>
							<div class="modal-footer no-bd">
								<button type="submit"  class="btn btn-primary">Simpan</button>
								<button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		<?php endforeach; ?>

	</div>
</div>


