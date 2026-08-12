<<<<<<< HEAD
<?php $sso_user_data = $this->session->userdata('sso_user_data');
$data_staff = $this->session->userdata('data_auth');
$datatipe = $data_staff->tipe;
?>

<body>
	<!--Preloader-->
	<?php $this->load->view("preloader"); ?>
	<!--/Preloader-->
	<div class="wrapper">

		<!-- Top Menu Items -->
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<a id="toggle_nav_btn" class="toggle-left-nav-btn inline-block mr-20 pull-left" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
			<a href="<?php echo base_url("Main") ?>"><img class="brand-img pull-left" src="<?php echo base_url() ?>assets/logo.png" alt="brand" /></a>

			<ul class="nav navbar-right top-nav pull-right">

				<li class="dropdown">
					<a href="#" class="dropdown-toggle pr-0" data-toggle="dropdown">Hai. <?= ucwords($sso_user_data->nama) ?></h2></a>
				</li>

				<li class="dropdown">
					<!-- <a href="#" class="dropdown-toggle pr-0" data-toggle="dropdown"><img src="<?= $sso_user_data->image ?>" alt="user_auth" class="user-auth-img img-circle"><span class="user-online-status"></span></a> -->
					<a href="#" class="dropdown-toggle pr-0" data-toggle="dropdown"><img src="<?php echo base_url() ?>assets/avatar-2.png" alt="User_Imgaes" class="user-auth-img img-circle"><span class="user-online-status"></span></a>

					<ul class="dropdown-menu user-auth-dropdown" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
						<!-- <li class="pb-10">
							<a href="#" data-toggle="modal" data-target="#mo_back"><i class="fa fa-step-backward"></i> &nbsp;&nbsp;Kembali ke Accounts</a>
						<li> -->
						<?php if ($data_staff->tipe == 'rekam medis') { ?>
							<li>
								<a href="http://192.168.125.7/antrian/AdminLangsungRM1" target="_blank"><i class="fa fa-list"></i> Antrian Timah</a>
							</li>
							<li>
								<a href="http://192.168.125.7/antrian/AdminLangsungRM2" target="_blank"><i class="fa fa-list"></i> Antrian Bpjs Lantai 1</a>
							</li>
							<li>
								<a href="http://192.168.125.7/antrian/AdminBpjs1" target="_blank"><i class="fa fa-list"></i> Antrian Bpjs Loket 1</a>
							</li>
							<li>
								<a href="http://192.168.125.7/antrian/AdminBpjs2" target="_blank"><i class="fa fa-list"></i> Antrian Bpjs Loket 2</a>
							</li>
							<li>
								<a href="http://192.168.125.7/antrian/AdminBpjs3" target="_blank"><i class="fa fa-list"></i> Antrian Bpjs Loket 3</a>
							</li>
							<li>
								<a href="http://192.168.125.7/antrian/AdminBpjs4" target="_blank"><i class="fa fa-list"></i> Antrian Bpjs Loket 4</a>
							</li>
							<!-- <li>
								<a href="https://36.92.141.3/SITB_monitoring/adminController" target="_blank"><i class="fa fa-list"></i> TBC Monitoring</a>
							</li> -->
							<li>
								<a href="http://192.168.125.7/antrian/AdminLangsungRM3" target="_blank"><i class="fa fa-list"></i> Antrian Umum/Lainnya</a>
							</li>
							<li>
								<a href="#" data-toggle="modal" data-target="#mo_editpassword"><i class="fa fa-key"></i> &nbsp;Edit Password</a>
							</li>
							<li>
								<a href="#" data-toggle="modal" data-target="#mo_logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
							<li>
							<?php
						} else { ?>
							<li>
								<a href="#" data-toggle="modal" data-target="#mo_editpro"><i class="fa fa-fw fa-user"></i> Edit Profil</a>
							</li>
							<li>
								<a href="#" data-toggle="modal" data-target="#mo_editpassword"><i class="fa fa-key"></i> &nbsp;Edit Password</a>
							</li>
							<li>
								<a href="#" data-toggle="modal" data-target="#mo_logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
							<li>
							<?php } ?>
							
					</ul>
				</li>
			</ul>
			<div class="collapse navbar-search-overlap" id="site_navbar_search">
				<form role="search">
					<div class="form-group mb-0">
						<div class="input-search">
							<div class="input-group">
								<input type="text" id="overlay_search" name="overlay-search" class="form-control pl-30" placeholder="Search">
								<span class="input-group-addon pr-30">
									<a href="javascript:void(0)" class="close-input-overlay" data-target="#site_navbar_search" data-toggle="collapse" aria-label="Close" aria-expanded="true"><i class="fa fa-times"></i></a>
								</span>
							</div>
						</div>
					</div>
				</form>
			</div>
		</nav>
		<!-- /Top Menu Items -->

		<?php $this->load->view('_sidebar'); ?>

		<!-- Main Content -->
		<div class="page-wrapper pt-0">
			<div class="container-fluid">

				<!-- Title -->
				<div class="row heading-bg bg-green">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">

					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">

					</div>
					<!-- /Breadcrumb -->
				</div>
				<!-- /Title -->

				<!-- Row -->
				<div class="row">
					<div class="col-sm-12 konten">
						<?php $this->load->view($page_content); ?>
					</div>
				</div>
				<!-- /Row -->
			</div>

			<!-- modal  -->
			<div id="mo_Bantuan" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							<h5 class="modal-title" id="myModalLabel">BANTUAN</h5>
						</div>
						<div class="modal-body">
							<!-- <h5 class="mb-15">Overflowing text to show scroll behavior</h5> -->
							<!-- <p>SSO RS Bakti Timah merupakan pintu gerbang pertama ketika ingin masuk ke salah satu sistem RS Bakti Timah</p> -->

						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-info" data-dismiss="modal">Tutup</button>
						</div>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>
			<!-- /.modal -->
			<div id="mo_editpro" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							<h5 class="modal-title" id="myModalLabel">Edit Data Profil</h5>
						</div>
						<div class="modal-body">
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div class="row">
										<div class="col-sm-12 col-xs-12">
											<div class="form-wrap">
												<form action="<?php echo base_url() . 'dashboard/edit_profil'; ?>" method="post" enctype="multipart/form-data">

													<div class="form-group mb-30" style="text-align:center;">
														<img class="img-fluid mt-3" width="50%" height="50%" src="<?= base_url('assets/images/') . $data_staff->image; ?> ">
													</div>

													<div class="form-group">
														<label class="control-label mb-10" for="exampleInputEmail_2">Nama Lengkap</label>
														<div class="input-group">
															<input type="hidden" value="<?= $data_staff->id_staff; ?>" class="form-control" name="id_staff" required="">

															<input type="text" value="<?= $data_staff->nama; ?>" class="form-control" name="nama" required="">
															<div class="input-group-addon"><i class="icon-user"></i>
															</div>
														</div>
													</div>

													<div class="form-group">
														<label class="control-label mb-10" for="exampleInputEmail_2">Username</label>
														<div class="input-group">
															<input type="text" class="form-control" name="username" value="<?= $data_staff->username; ?>">
															<div class="input-group-addon"><i class="icon-lock"></i>
															</div>
														</div>
													</div>


													<?php if ($data_staff->tipe == 'admin') : ?>

														<div class="form-group">
															<label class="control-label mb-10" for="exampleInputEmail_2">Jabatan</label>
															<div class="input-group">
																<input type="text" class="form-control" name="tipe" required="" value="<?= $data_staff->tipe; ?>">
																<div class="input-group-addon"><i class="icon-envelope-open"></i></div>
															</div>
														</div>

													<?php elseif ($data_staff->tipe != 'admin') : ?>
													<?php endif; ?>

													<div class="form-group">
														<label class="control-label mb-10" for="exampleInputEmail_2">Foto</label>
														<div class="input-group">
															<input type="hidden" value="<?= $data_staff->id_staff; ?>" class="form-control" name="id_staff">
															<input type="hidden" name="old_image" value="<?= $data_staff->image; ?>" />
															<input type="file" name="filefoto">
															<div class="input-group-addon"><i class="icon-envelope-open"></i></div>
														</div>
													</div>

													<div class="form-group">

														<div class="clearfix"></div>
													</div>
													<div class="form-group">
														<button type="submit" class="btn btn-success btn-block">Simpan Perubahan</button>
													</div>


												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
						</div>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>
			<!-- /.modal -->


			<!-- modal update pwd  -->
			<div id="mo_editpassword" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							<h5 class="modal-title" id="myModalLabel">Ubah Password</h5>
						</div>
						<div class="modal-body">
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div class="row">
										<div class="col-sm-12 col-xs-12">
											<div class="form-wrap">
												<form action="<?php echo base_url() . 'Dashboard/update_password'; ?>" method="post">
													<div class="form-group">
														<label class="control-label mb-10" for="exampleInputpwd_2">Password</label>
														<div class="input-group">
															<input type="hidden" value="<?= $data_staff->id_staff; ?>" class="form-control" name="id_staff" required="">
															<input type="password" name="password" class="form-control" value="" placeholder="Password" id="myPassword">
															<input class="mt-10" type="checkbox" onclick="myFunction()">Show Password
															<div class="input-group-addon">
																<i class="icon-lock"></i>
															</div>
														</div>
													</div>
													<div class="form-group">
														<button type="submit" class="btn btn-success btn-block">Ubah
															Password</button>
													</div>

												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
						</div>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>
			<!-- Footer -->
			<footer class="footer container-fluid pl-30 pr-30">
				<div class="row">
					<div class="col-sm-5">
						<a href="index.html" class="brand mr-30"><img src="<?php echo base_url() ?>assets/logo.png" alt="logo" /></a>
						<ul class="footer-link nav navbar-nav">
							<li class="logo-footer"><a href="#" data-toggle="modal" data-target="#mo_Bantuan">bantuan</a></li>
						</ul>
					</div>
					<div class="col-sm-7 text-right">
						<p>2020 &copy; Development by EDP</p>
					</div>
				</div>


				<!-- Logout modal -->
				<div id="mo_logout" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
								<h5 class="modal-title" id="myModalLabel">Anda yakin ingin keluar?</h5>
							</div>
							<div class="modal-body">Pilih "Logout" untuk keluar dari akun anda.</div>
							<div class="modal-footer">
								<button class="btn btn-default" type="button" data-dismiss="modal">Batal</button>
								<a class="btn btn-primary" href="<?= base_url('Main/logout'); ?>">Logout</a>
							</div>
						</div>
					</div>
				</div>
				<!--  -->

				<!-- Back modal -->
				<div id="mo_back" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
								<h5 class="modal-title" id="myModalLabel">Anda yakin ingin kembali ke Dashboard?</h5>
							</div>
							<div class="modal-body">Pilih "Yakin" untuk kembali ke dashboard.</div>
							<div class="modal-footer">
								<button class="btn btn-default" type="button" data-dismiss="modal">Batal</button>
								<a class="btn btn-primary" href="<?= base_url('Main/back'); ?>">Yakin</a>
							</div>
						</div>
					</div>
				</div>
				<script type="text/javascript">
					function myFunction() {
						var x = document.getElementById("myPassword");
						if (x.type === "password") {
							x.type = "text";
						} else {
							x.type = "password";
						}
					}

					function dashboard() {
						$.ajax({
							url: "<?= base_url("Laporan/dashboard"); ?>",
							method: "get",
							beforeSend: function() {
								$(".preloader").removeClass("prelo");
							},
							success: function(data) {
								$(".konten").html(data);
								$(".preloader").addClass("prelo");
							},
						});
					}
				</script>
=======
<?php $sso_user_data = $this->session->userdata('sso_user_data');
$data_staff = $this->session->userdata('data_auth');
$datatipe = $data_staff->tipe;
?>

<body>
	<!--Preloader-->
	<?php $this->load->view("preloader"); ?>
	<!--/Preloader-->
	<div class="wrapper">

		<!-- Top Menu Items -->
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<a id="toggle_nav_btn" class="toggle-left-nav-btn inline-block mr-20 pull-left" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
			<a href="<?php echo base_url("Main") ?>"><img class="brand-img pull-left" src="<?php echo base_url() ?>assets/logo.png" alt="brand" /></a>

			<ul class="nav navbar-right top-nav pull-right">

				<li class="dropdown">
					<a href="#" class="dropdown-toggle pr-0" data-toggle="dropdown">Hai. <?= ucwords($sso_user_data->nama) ?></h2></a>
				</li>

				<li class="dropdown">
					<!-- <a href="#" class="dropdown-toggle pr-0" data-toggle="dropdown"><img src="<?= $sso_user_data->image ?>" alt="user_auth" class="user-auth-img img-circle"><span class="user-online-status"></span></a> -->
					<a href="#" class="dropdown-toggle pr-0" data-toggle="dropdown"><img src="<?php echo base_url() ?>assets/avatar-2.png" alt="User_Imgaes" class="user-auth-img img-circle"><span class="user-online-status"></span></a>

					<ul class="dropdown-menu user-auth-dropdown" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
						<!-- <li class="pb-10">
							<a href="#" data-toggle="modal" data-target="#mo_back"><i class="fa fa-step-backward"></i> &nbsp;&nbsp;Kembali ke Accounts</a>
						<li> -->
						<?php if ($data_staff->tipe == 'rekam medis') { ?>
							<li>
								<a href="http://192.168.125.7/antrian/AdminLangsungRM1" target="_blank"><i class="fa fa-list"></i> Antrian Timah</a>
							</li>
							<li>
								<a href="http://192.168.125.7/antrian/AdminLangsungRM2" target="_blank"><i class="fa fa-list"></i> Antrian Bpjs Lantai 1</a>
							</li>
							<li>
								<a href="http://192.168.125.7/antrian/AdminBpjs1" target="_blank"><i class="fa fa-list"></i> Antrian Bpjs Loket 1</a>
							</li>
							<li>
								<a href="http://192.168.125.7/antrian/AdminBpjs2" target="_blank"><i class="fa fa-list"></i> Antrian Bpjs Loket 2</a>
							</li>
							<li>
								<a href="http://192.168.125.7/antrian/AdminBpjs3" target="_blank"><i class="fa fa-list"></i> Antrian Bpjs Loket 3</a>
							</li>
							<li>
								<a href="http://192.168.125.7/antrian/AdminBpjs4" target="_blank"><i class="fa fa-list"></i> Antrian Bpjs Loket 4</a>
							</li>
							<!-- <li>
								<a href="https://36.92.141.3/SITB_monitoring/adminController" target="_blank"><i class="fa fa-list"></i> TBC Monitoring</a>
							</li> -->
							<li>
								<a href="http://192.168.125.7/antrian/AdminLangsungRM3" target="_blank"><i class="fa fa-list"></i> Antrian Umum/Lainnya</a>
							</li>
							<li>
								<a href="#" data-toggle="modal" data-target="#mo_editpassword"><i class="fa fa-key"></i> &nbsp;Edit Password</a>
							</li>
							<li>
								<a href="#" data-toggle="modal" data-target="#mo_logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
							<li>
							<?php
						} else { ?>
							<li>
								<a href="#" data-toggle="modal" data-target="#mo_editpro"><i class="fa fa-fw fa-user"></i> Edit Profil</a>
							</li>
							<li>
								<a href="#" data-toggle="modal" data-target="#mo_editpassword"><i class="fa fa-key"></i> &nbsp;Edit Password</a>
							</li>
							<li>
								<a href="#" data-toggle="modal" data-target="#mo_logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
							<li>
							<?php } ?>
							
					</ul>
				</li>
			</ul>
			<div class="collapse navbar-search-overlap" id="site_navbar_search">
				<form role="search">
					<div class="form-group mb-0">
						<div class="input-search">
							<div class="input-group">
								<input type="text" id="overlay_search" name="overlay-search" class="form-control pl-30" placeholder="Search">
								<span class="input-group-addon pr-30">
									<a href="javascript:void(0)" class="close-input-overlay" data-target="#site_navbar_search" data-toggle="collapse" aria-label="Close" aria-expanded="true"><i class="fa fa-times"></i></a>
								</span>
							</div>
						</div>
					</div>
				</form>
			</div>
		</nav>
		<!-- /Top Menu Items -->

		<?php $this->load->view('_sidebar'); ?>

		<!-- Main Content -->
		<div class="page-wrapper pt-0">
			<div class="container-fluid">

				<!-- Title -->
				<div class="row heading-bg bg-green">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">

					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">

					</div>
					<!-- /Breadcrumb -->
				</div>
				<!-- /Title -->

				<!-- Row -->
				<div class="row">
					<div class="col-sm-12 konten">
						<?php $this->load->view($page_content); ?>
					</div>
				</div>
				<!-- /Row -->
			</div>

			<!-- modal  -->
			<div id="mo_Bantuan" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							<h5 class="modal-title" id="myModalLabel">BANTUAN</h5>
						</div>
						<div class="modal-body">
							<!-- <h5 class="mb-15">Overflowing text to show scroll behavior</h5> -->
							<!-- <p>SSO RS Bakti Timah merupakan pintu gerbang pertama ketika ingin masuk ke salah satu sistem RS Bakti Timah</p> -->

						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-info" data-dismiss="modal">Tutup</button>
						</div>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>
			<!-- /.modal -->
			<div id="mo_editpro" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							<h5 class="modal-title" id="myModalLabel">Edit Data Profil</h5>
						</div>
						<div class="modal-body">
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div class="row">
										<div class="col-sm-12 col-xs-12">
											<div class="form-wrap">
												<form action="<?php echo base_url() . 'dashboard/edit_profil'; ?>" method="post" enctype="multipart/form-data">

													<div class="form-group mb-30" style="text-align:center;">
														<img class="img-fluid mt-3" width="50%" height="50%" src="<?= base_url('assets/images/') . $data_staff->image; ?> ">
													</div>

													<div class="form-group">
														<label class="control-label mb-10" for="exampleInputEmail_2">Nama Lengkap</label>
														<div class="input-group">
															<input type="hidden" value="<?= $data_staff->id_staff; ?>" class="form-control" name="id_staff" required="">

															<input type="text" value="<?= $data_staff->nama; ?>" class="form-control" name="nama" required="">
															<div class="input-group-addon"><i class="icon-user"></i>
															</div>
														</div>
													</div>

													<div class="form-group">
														<label class="control-label mb-10" for="exampleInputEmail_2">Username</label>
														<div class="input-group">
															<input type="text" class="form-control" name="username" value="<?= $data_staff->username; ?>">
															<div class="input-group-addon"><i class="icon-lock"></i>
															</div>
														</div>
													</div>


													<?php if ($data_staff->tipe == 'admin') : ?>

														<div class="form-group">
															<label class="control-label mb-10" for="exampleInputEmail_2">Jabatan</label>
															<div class="input-group">
																<input type="text" class="form-control" name="tipe" required="" value="<?= $data_staff->tipe; ?>">
																<div class="input-group-addon"><i class="icon-envelope-open"></i></div>
															</div>
														</div>

													<?php elseif ($data_staff->tipe != 'admin') : ?>
													<?php endif; ?>

													<div class="form-group">
														<label class="control-label mb-10" for="exampleInputEmail_2">Foto</label>
														<div class="input-group">
															<input type="hidden" value="<?= $data_staff->id_staff; ?>" class="form-control" name="id_staff">
															<input type="hidden" name="old_image" value="<?= $data_staff->image; ?>" />
															<input type="file" name="filefoto">
															<div class="input-group-addon"><i class="icon-envelope-open"></i></div>
														</div>
													</div>

													<div class="form-group">

														<div class="clearfix"></div>
													</div>
													<div class="form-group">
														<button type="submit" class="btn btn-success btn-block">Simpan Perubahan</button>
													</div>


												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
						</div>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>
			<!-- /.modal -->


			<!-- modal update pwd  -->
			<div id="mo_editpassword" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							<h5 class="modal-title" id="myModalLabel">Ubah Password</h5>
						</div>
						<div class="modal-body">
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div class="row">
										<div class="col-sm-12 col-xs-12">
											<div class="form-wrap">
												<form action="<?php echo base_url() . 'Dashboard/update_password'; ?>" method="post">
													<div class="form-group">
														<label class="control-label mb-10" for="exampleInputpwd_2">Password</label>
														<div class="input-group">
															<input type="hidden" value="<?= $data_staff->id_staff; ?>" class="form-control" name="id_staff" required="">
															<input type="password" name="password" class="form-control" value="" placeholder="Password" id="myPassword">
															<input class="mt-10" type="checkbox" onclick="myFunction()">Show Password
															<div class="input-group-addon">
																<i class="icon-lock"></i>
															</div>
														</div>
													</div>
													<div class="form-group">
														<button type="submit" class="btn btn-success btn-block">Ubah
															Password</button>
													</div>

												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
						</div>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>
			<!-- Footer -->
			<footer class="footer container-fluid pl-30 pr-30">
				<div class="row">
					<div class="col-sm-5">
						<a href="index.html" class="brand mr-30"><img src="<?php echo base_url() ?>assets/logo.png" alt="logo" /></a>
						<ul class="footer-link nav navbar-nav">
							<li class="logo-footer"><a href="#" data-toggle="modal" data-target="#mo_Bantuan">bantuan</a></li>
						</ul>
					</div>
					<div class="col-sm-7 text-right">
						<p>2020 &copy; Development by EDP</p>
					</div>
				</div>


				<!-- Logout modal -->
				<div id="mo_logout" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
								<h5 class="modal-title" id="myModalLabel">Anda yakin ingin keluar?</h5>
							</div>
							<div class="modal-body">Pilih "Logout" untuk keluar dari akun anda.</div>
							<div class="modal-footer">
								<button class="btn btn-default" type="button" data-dismiss="modal">Batal</button>
								<a class="btn btn-primary" href="<?= base_url('Main/logout'); ?>">Logout</a>
							</div>
						</div>
					</div>
				</div>
				<!--  -->

				<!-- Back modal -->
				<div id="mo_back" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
								<h5 class="modal-title" id="myModalLabel">Anda yakin ingin kembali ke Dashboard?</h5>
							</div>
							<div class="modal-body">Pilih "Yakin" untuk kembali ke dashboard.</div>
							<div class="modal-footer">
								<button class="btn btn-default" type="button" data-dismiss="modal">Batal</button>
								<a class="btn btn-primary" href="<?= base_url('Main/back'); ?>">Yakin</a>
							</div>
						</div>
					</div>
				</div>
				<script type="text/javascript">
					function myFunction() {
						var x = document.getElementById("myPassword");
						if (x.type === "password") {
							x.type = "text";
						} else {
							x.type = "password";
						}
					}

					function dashboard() {
						$.ajax({
							url: "<?= base_url("Laporan/dashboard"); ?>",
							method: "get",
							beforeSend: function() {
								$(".preloader").removeClass("prelo");
							},
							success: function(data) {
								$(".konten").html(data);
								$(".preloader").addClass("prelo");
							},
						});
					}
				</script>
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
				<!--  -->