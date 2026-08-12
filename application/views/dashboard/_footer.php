			<!-- modal  -->
			
			<!-- Footer -->
			<footer class="footer container-fluid pl-30 pr-30">
				<div class="row">
					<div class="col-sm-5">
						<a href="" class="brand mr-30"><img src="<?php echo base_url(); ?>assets/dist/img/logo-sm11.png" alt="logo" /></a>
						<ul class="footer-link nav navbar-nav">
							<li class="logo-footer"><a href="#" data-toggle="modal" data-target="#mo_Bantuan">bantuan</a></li>
						</ul>
					</div>
					<div class="col-sm-7 text-right">
						<p><?php echo date('Y'); ?> &copy; Development from EDP</p>
					</div>
				</div>
			</footer>
			<!-- /Footer -->

			<script type="text/javascript">
				function generatePassword(len) {
					var length = (len) ? (len) : (10);
					var string = "abcdefghijklmNOPQRSTUVWXYZ"; //to upper 
					var numeric = '0123456789';
					var punctuation = '!@#$%&*_><-=';
					var password = "";
					var character = "";
					var crunch = true;
					while (password.length < length) {
						entity1 = Math.ceil(string.length * Math.random() * Math.random());
						entity2 = Math.ceil(numeric.length * Math.random() * Math.random());
						entity3 = Math.ceil(punctuation.length * Math.random() * Math.random());
						hold = string.charAt(entity1);
						hold = (password.length % 2 == 0) ? (hold.toUpperCase()) : (hold);
						character += hold;
						character += numeric.charAt(entity2);
						character += punctuation.charAt(entity3);
						password = character;
					}
					password = password.split('').sort(function() {
						return 0.5 - Math.random()
					}).join('');

					document.form_saja.password.value = password;
				}
			</script>


			</div>
			<!-- /Main Content -->

			</div>
			<!-- /#wrapper -->

			<!-- JavaScript -->

			<!-- jQuery -->
			<script src="<?php echo base_url(); ?>assets/vendors/bower_components/jquery/dist/jquery.min.js" async></script>

			<!-- Bootstrap Core JavaScript -->
			<script src="<?php echo base_url(); ?>assets/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js" async>
			</script>

			<!-- Counter Animation JavaScript -->
			<script src="<?php echo base_url(); ?>assets/vendors/bower_components/waypoints/lib/jquery.waypoints.min.js" async>
			</script>
			<script src="<?php echo base_url(); ?>assets/vendors/bower_components/Counter-Up/jquery.counterup.min.js" async>
			</script>

			<!-- Data table JavaScript -->
			<script src="<?php echo base_url(); ?>assets/vendors/bower_components/datatables/media/js/jquery.dataTables.min.js" async>
			</script>
			<script src="<?php echo base_url(); ?>assets/dist/js/productorders-data.js" async></script>

			<!-- Slimscroll JavaScript -->
			<script src="<?php echo base_url(); ?>assets/dist/js/jquery.slimscroll.js" async></script>

			<!-- Fancy Dropdown JS -->
			<script src="<?php echo base_url(); ?>assets/dist/js/dropdown-bootstrap-extended.js" async></script>

			<script src="<?php echo base_url(); ?>assets/vendors/bower_components/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js" async>
			</script>
			<script src="<?php echo base_url(); ?>assets/dist/js/skills-counter-data.js" async></script>

			<!-- ChartJS JavaScript -->
			<script src="<?php echo base_url(); ?>assets/vendors/chart.js/Chart.min.js" async></script>

			<script src="<?php echo base_url(); ?>assets/vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.js" async>
			</script>

			<!-- Init JavaScript -->
			<script src="<?php echo base_url(); ?>assets/dist/js/init.js" async></script>

	
			<!-- Sweet-Alert  -->
			<script src="<?php echo base_url() ?>assets/vendors/bower_components/sweetalert/dist/sweetalert.min.js" async></script>

			</body>

			</html>