<body>
	<!--Preloader-->
	<div class="preloader-it">
		<div class="la-anim-1"></div>
	</div>
	<!--/Preloader-->

	<div class="wrapper pa-0">

		<!-- Main Content -->
		<div class="page-wrapper pa-0 ma-0">
			<div class="container-fluid">
				<!-- Row -->
				<div class="table-struct full-width full-height">
					<div class="table-cell vertical-align-middle">
						<div class="auth-form  ml-auto mr-auto no-float">
							<div class="panel panel-default card-view mb-0">
								<div class="panel-heading">
									<div class="pull-left">
										<h6 class="panel-title txt-dark">WELCOME BAKTI TIMAH ONE SYSTEM </h6>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="row">
											<div class="col-sm-12 col-xs-12">
												<div class="form-wrap">
													<form action="<?php echo base_url('Home'); ?>" method="post">
													<div class="form-group">
															<?= $this->session->flashdata('alert'); ?>
															<label class="control-label mb-10" for="exampleInputEmail_2">Username</label>
															<div class="input-group">
																<input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?= set_value('username'); ?>">
																<?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
																<div class="input-group-addon"><i class="icon-envelope-open"></i></div>
															</div>
														</div>
														<div class="form-group">
															<label class="control-label mb-10" for="exampleInputpwd_2">Password</label>
															<div class="input-group">
																<input type="password" class="form-control" id="password" name="password" placeholder="Password">
																<?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
																<div class="input-group-addon"><i class="icon-lock"></i>
																</div>
															</div>

															<div class="form-group">
							
																<a class="capitalize-font txt-info block pt-5 pull-right" data-toggle="modal" href="#" data-target="#mo_Forgot">Lupa password?</a>
																<div class="clearfix"></div>
															</div>
															<div class="form-group">
																<button type="submit" class="btn btn-success btn-block">Login</button>
															</div>

													</form>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /Row -->
			</div>

		</div>
		<!-- /Main Content -->

	</div>
	<!-- /#wrapper -->


	<!-- modal  -->
	<div id="mo_Forgot" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h5 class="modal-title" id="myModalLabel">Anda Lupa Password?</h5>
				</div>
				<div class="modal-body">
					<!-- Row -->

					<div class="auth-form  ml-auto mr-auto no-float">
						<div class="panel panel-default card-view mb-0">
							<div class="panel-heading">
								<!-- <div class="pull-left">
									<h6 class="panel-title txt-dark">Kirim</h6>
								</div> -->
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div class="row">
										<div class="col-sm-12 col-xs-12" style="margin-bottom:-0.5em;">
											<div class="form-wrap">
												<form method="post">
													<div class="form-group">
														<label style="padding-bottom:10px;" class="control-label mb-10" for="exampleInputEmail_2">Hubungi kami via email, atau whatsApp yang berikut ini :</label>
														<div class="input-group">
															<input type="text" class="form-control" style="border:1px solid lightgreen" value="akilnmuharram@gmail.com" disabled>
															<div class="input-group-addon"><i class="icon-envelope-open"></i></div>
														</div>

														<div class="input-group mt-15">
															<input type="text" class="form-control" value="082390588461" disabled>
															<div class="input-group-addon"><i class="fa fa-phone"></i></div>
														</div>
													</div>

													<!-- <div class="form-group">
														<button type="submit" class="btn btn-success btn-block">Submit</button>
													</div> -->

												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>


					<!-- /Row -->
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



	<!-- JavaScript -->

	<!-- jQuery -->
	<script src="<?php echo base_url(); ?>assets/vendors/bower_components/jquery/dist/jquery.min.js"></script>

	<!-- Bootstrap Core JavaScript -->
	<script src="<?php echo base_url(); ?>assets/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/vendors/bower_components/jasny-bootstrap/dist/js/jasny-bootstrap.min.js">
	</script>

	<!-- Slimscroll JavaScript -->
	<script src="<?php echo base_url(); ?>assets/dist/js/jquery.slimscroll.js"></script>

	<!-- Fancy Dropdown JS -->
	<script src="<?php echo base_url(); ?>assets/dist/js/dropdown-bootstrap-extended.js"></script>

	<!-- Init JavaScript -->
	<script src="<?php echo base_url(); ?>assets/dist/js/init.js"></script>
</body>

</html>