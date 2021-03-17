<div class="main-panel">
	<div class="content">
		<div class="page-inner">
			<div class="page-header">
				<h4 class="page-title">Profil Akun</h4>
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
						<a href="#">Pengaturan Akun</a>
					</li>
					<li class="separator">
						<i class="flaticon-right-arrow"></i>
					</li>
					<li class="nav-item">
						<a href="#">Profil Akun</a>
					</li>
				</ul>
			</div>

			<?php if( $this->session->flashdata('msg') ) : ?>
				<div class="row mt-3">
					<div class="col-md-12 col-lg-12">
						
						<div class="alert alert-success alert-dismissible fade show" role="alert">
							Profil Akun <strong>berhasil</strong>  <?php echo $this->session->flashdata('msg'); ?> 
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true" style="vertical-align: center;">&times;</span>
							</button>
						</div>
					</div>
				</div>
			<?php endif; ?>

			<?php 	foreach($data as $user) : ?>
				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="card-header">
								<div class="card-title">Profil Akun</div>
							</div>

							<div class="card-body">
								<?php echo form_open_multipart('admin/editProfilAkun') ?>
								<div class="row">
									<div class="col-lg-4 col-md-4" style="padding-top: 20px;padding-left:25px;">
										<?php if($user->foto != null) { ?>
											<img style="height: auto;width: 100%;" class="card-img-top" src="<?php echo base_url('assets/upload/foto-profil/') ?><?= $user->foto ?>"  alt="Card image cap">
											<center><small align="center"><?= $user->foto ?></small></center>
										<?php }else{ ?>
											<img style="height: auto;width: 100%;" class="card-img-top" src="<?php echo base_url('assets/img/default.jpg') ?>"  alt="Card image cap">
<!-- 											<center><small>defaul.jpg</small></center>
 -->										<?php } ?>
										<!-- <div class="form-group">
											<input type="hidden" class="form-control" value="<?= $user->foto ?>" name="old_image">
											<input type="file" class="form-control" name="foto">
										</div> -->
									</div>
									<div class="col-md-8 col-lg-8">
										<div class="row">
											<div class="form-group col-md-12">
												<!-- value default -->
												<input type="hidden" value="<?= $user->user_id ?>" name="user_id" class="form-control" >
												<input type="hidden" value="MHS" name="level" class="form-control" >
												<input type="hidden" value="1" name="status" class="form-control" >
												<label>Username</label>
												<input type="text" value="<?= $user->username ?>" name="username" class="form-control"  placeholder="username harus sama dengan NIM" readonly>
											</div>
											<div class="form-group col-md-12">
												<label>Nama Lengkap</label>
												<input type="text" value="<?= $user->nama_lengkap ?>" name="nama_lengkap" class="form-control" placeholder="Nama Lengkap" readonly>
											</div>

											<div class="form-group col-md-12">
												<label>Email</label>
												<input type="email" value="<?= $user->email ?>" name="email" class="form-control" placeholder="Email" readonly>
											</div>
											<div class="form-group col-md-12">
												<label>Level</label>
												<input type="email" value="<?php if($user->level == 'ADM') { echo "Administrator" ;} elseif($user->level == 'KABID') { echo "Kepala Bidang" ;} elseif($user->level == 'STAF') { echo "Staf" ;} if($user->level == 'MHS') { echo "Mahasiswa" ;} ?>" name="email" class="form-control" placeholder="Email" readonly>
											</div>
											<!-- 
											<div class="form-group col-md-6">
												<label>Password</label>
												<input type="password"   class="form-control" placeholder="Password">
											</div>
											<div class="form-group col-md-6">
												<label>Konfirmasi Password</label>
												<input type="password"   class="form-control" placeholder="Konfirmasi Password">
											</div> 
										-->
									</div>

								</div>
								

								
							</div>
						</div>
						<div class="card-action">
<!--   -->							<a href="<?php echo base_url('admin/beranda') ?>" class="btn btn-danger">Kembali</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
<?php endforeach; ?>
</div>
</div>

