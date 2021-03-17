<div class="main-panel">
	<div class="content">
		<div class="page-inner">
			<div class="page-header">
				<h4 class="page-title">Edit Profil Akun</h4>
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
						<a href="#">Edit Profil Akun</a>
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
								<div class="d-flex align-items-center">
									<h4 class="card-title">Edit Profil Akun</h4>
									<button class="btn btn-danger btn-round ml-auto" data-toggle="modal" data-target="#modaledit">
										<i class="fa fa-lock"></i> &nbsp;
										Reset Password
									</button>
								</div>

							</div>



							<div class="card-body">
								<?php echo form_open_multipart('admin/editUser') ?>
								<div class="row">
									<div class="col-lg-4 col-md-4" style="padding-top: 20px;padding-left:25px;">
										<?php if($user->foto != null) { ?>
											<img style="height: auto;width: 100%;" class="card-img-top" src="<?php echo base_url('assets/upload/foto-profil/') ?><?= $user->foto ?>"  alt="Card image cap">
											<center><small align="center"><?= $user->foto ?></small></center>
										<?php }else{ ?>
											<img style="height: auto;width: 100%;" class="card-img-top" src="<?php echo base_url('assets/img/default.jpg') ?>"  alt="Card image cap">
											<center><small>defaul.jpg</small></center>
										<?php } ?>
										<div class="form-group">
											<input type="hidden" class="form-control" value="<?= $user->foto ?>" name="old_image">
											<input type="file" class="form-control" name="foto">
										</div>
									</div>
									<div class="col-md-8 col-lg-8">
										<div class="row">
											<div class="form-group col-md-12">
												<!-- value default -->
												<input type="hidden" value="<?= $user->user_id ?>" name="user_id" class="form-control" >
												<input type="hidden" value="MHS" name="level" class="form-control" >
												<input type="hidden" value="1" name="status" class="form-control" >
												<label>Username</label>
												<input type="text" value="<?= $user->username ?>" name="username" class="form-control"  placeholder="username harus sama dengan NIM">
											</div>
											<div class="form-group col-md-12">
												<label>Nama Lengkap</label>
												<input type="text" value="<?= $user->nama_lengkap ?>" name="nama_lengkap" class="form-control" placeholder="Nama Lengkap">
											</div>

											<div class="form-group col-md-12">
												<label>Email</label>
												<input type="email" value="<?= $user->email ?>" name="email" class="form-control" placeholder="Email">
											</div>
											<div class="form-group col-md-12">
												<label>Level</label>
												<select class="form-control" name="level">
													<option value="ADM" <?php if($user->level === "ADM") { echo "selected"; } ?> > Admin Super</option>
													<option value="KABID" <?php if($user->level === "KABID") { echo "selected"; } ?> > Kepala Bidang </option>
													<option value="STAF" <?php if($user->level === "STAF") { echo "selected"; } ?> > Staf </option>
													<option value="MHS" <?php if($user->level === "MHS") { echo "selected"; } ?> > Mahasiswa </option>
												</select>
											</div>
											<div class="form-group col-md-12">
												<label>Status</label>
												<select class="form-control" name="status">
													<option value="1" <?php if($user->status === "1") { echo "selected"; } ?> > Aktif</option>
													<option value="0" <?php if($user->status === "0") { echo "selected"; } ?> > Nonaktif </option>
													
												</select>
											</div>
											<?php form_close() ?>


										</div>

									</div>



								</div>
							</div>
							<div class="card-action">
								<button type="Submit" class="btn btn-primary">Simpan</button>
								<a href="<?php echo base_url('admin/getUser') ?>" class="btn btn-danger">Kembali</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>



		<!-- Modal Ganti Password -->
		<div class="modal fade" id="modaledit" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header ">
						<h5 class="modal-title">
							<span class="fw-mediumbold">
							Reset Password</span> 
						</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form action="<?php echo base_url('admin/gantiPasswordUser') ?>"  method="post">
							<div class="row">
								<input name="user_id" type="hidden" value="<?= $user->user_id ?>" class="form-control" required="true" placeholder="username">
								<!-- <input name="user_id" type="hidden" class="form-control" required="true" placeholder="username"> -->
								<div class="col-md-6 pr-0">
									<div class="form-group ">
										<input  type="password" id="pw1" class="form-control" required="true" placeholder="password">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group ">
										<input name="password" id="pw2" type="password" class="form-control" required="true" placeholder="confirm password">
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="submit"  class="btn btn-primary">Simpan</button>
							<button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
						</div>
					</form>
				</div>
				<script type="text/javascript">
					window.onload = function () {
						document.getElementById("pw1").onchange = validatePassword;
						document.getElementById("pw2").onchange = validatePassword;
					}

					function validatePassword(){
						var pass2=document.getElementById("pw2").value;
						var pass1=document.getElementById("pw1").value;
						if(pass1!=pass2)
							document.getElementById("pw2").setCustomValidity("Password Tidak Sama, Coba Lagi");
						else
							document.getElementById("pw2").setCustomValidity('');
					}
				</script>
			</div>
		<?php endforeach; ?>


	</div>

