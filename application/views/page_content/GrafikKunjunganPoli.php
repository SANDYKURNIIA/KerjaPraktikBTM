<style>
	h6 {
		color: black;
	}

	.footer {
		display: none;
	}

	button {
		background-color: #22a8bf;
		border: none;
		color: white;
		padding: 15px 32px;
		text-align: center;
		text-decoration: none;
		display: inline-block;
		font-size: 16px;
		width: 350px;
		height: 60px;
	}
</style>

<div class="row">
	<div class="col-md-4 col-xs-12">
		<a href="<?php echo base_url('Laporan/kunjunganBPJS') ?>"><button>
				<h6 style="color:white">KUNJUNGAN BPJS BULAN <?php date_default_timezone_set('Asia/Jakarta');
																$b = date("F");
																echo $b; ?>
			</button></h6>
	</div>
	<div class="col-md-4">
		<a href="<?php echo base_url('Laporan/kunjunganCByr') ?>"><button>
				<h6 style="color:white">CARA BAYAR BULAN <?php date_default_timezone_set('Asia/Jakarta');
															$b = date("F");
															echo $b; ?>
			</button></h6>
	</div>
	<div class="col-md-4">
		<a href="<?php echo base_url('Laporan/kunjunganIGD') ?>"><button>
				<h6 style="color:white">KUNJUNGAN IGD BULAN <?php date_default_timezone_set('Asia/Jakarta');
															$b = date("F");
															echo $b; ?>
			</button></h6>
	</div>

	<div class="row">
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
			<br><br>
		</div>
	</div>
	<div class="col-md-4">

		<a href="<?php echo base_url('Laporan/penTer') ?>"><button>
				<h6 style="color:white">10 PENYAKIT TERATAS (ICD-10) BULAN <?php date_default_timezone_set('Asia/Jakarta');
																			$b = date("F");
																			echo $b; ?>
			</button></h6>
	</div>


	<div class="col-md-4">
		<a href="<?php echo base_url('Laporan/kunjunganRSBT') ?>"><button>
				<h6 style="color:white">KUNJUNGAN RUMAH SAKIT TAHUN <?php date_default_timezone_set('Asia/Jakarta');
																	$year = date("Y");
																	echo $year; ?>
			</button></h6>
	</div>
	<div class="col-md-4">

	</div>
</div>

<div class="row">
	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
		<br><br>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12">
		<div class="panel panel-default card-view">
			<div class="panel-heading">
				<div class="pull-left">
					<h6 class="panel-title txt-dark"><i class="icon-clock mr-10"></i>GRAFIK KUNJUNGAN POLI TAHUN <?php
																													setlocale(LC_ALL, 'id_ID');
																													date_default_timezone_set('Asia/Jakarta');
																													$year = date("Y");
																													echo $year; ?></h6>
				</div>
			</div>
			<div class="panel-wrapper collapse in">
				<div class="panel-body">
					<div id="morris_extra_line_chart" class="morris-chart" style="height:600px;"></div>
				</div>
			</div>
		</div>
	</div>
</div>











<script src="<?= base_url("assets/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js") ?>"></script>
<script src="<?= base_url("assets/vendors/bower_components/datatables/media/js/jquery.dataTables.min.js") ?>"></script>
<script src="<?= base_url("assets/dist/js/jquery.slimscroll.js") ?>"></script>
<script src="<?= base_url("assets/vendors/bower_components/waypoints/lib/jquery.waypoints.min.js") ?>"></script>
<script src="<?= base_url("assets/vendors/bower_components/Counter-Up/jquery.counterup.min.js") ?>"></script>
<script src="<?= base_url("assets/dist/js/dropdown-bootstrap-extended.js") ?>"></script>
<script src="<?= base_url("assets/vendors/jquery.sparkline/dist/jquery.sparkline.min.js") ?>"></script>
<script src="<?= base_url("assets/vendors/chart.js/Chart.min.js") ?>"></script>
<script src="<?= base_url("assets/vendors/bower_components/raphael/raphael.min.js") ?>"></script>
<script src="<?= base_url("assets/vendors/bower_components/morris.js/morris.min.js") ?>"></script>

<script type="text/javascript">
	"use strict";
	if ($('#morris_extra_line_chart').length > 0) Morris.Area({
		element: 'morris_extra_line_chart',
		data: [<?php
				$bulan = date("Y-m");
				$thn = date("Y");
				// $thn = "2022";
				$hasilChartKunjungan = $this->db->query("SELECT distinct month(p.tgl_masuk) bulan , monthname(p.tgl_masuk) bulan1
											FROM pelayanan p WHERE p.tgl_masuk ORDER by bulan asc ");

				$count3 = $hasilChartKunjungan->num_rows();

				$hasilChartKunjungan = $hasilChartKunjungan->result_array();

				foreach ($hasilChartKunjungan as $row) {
					$time = strtotime($row['bulan1']);

					$printbulan = strftime("%B ", $time);
					echo "{ bulan: '" . $printbulan . "' ,\n ";
					$bln = $row['bulan'];


					$hasilChartKunjungan1 = $this->db->query(
						"SELECT COUNT(*) jml, month(h.tgl_masuk) bulan, l.kdpoli_bpjs poli
														FROM history_pelayanan h, list_poli l WHERE h.nama_poli = l.id_list_poli and l.status_dokter like 'ADA'
														and month(h.tgl_masuk) = '$bln'
														and h.tgl_masuk like '$thn%'
														GROUP by l.id_list_poli "
					)->result_array();
					foreach ($hasilChartKunjungan1 as $row1) {
						echo $row1['poli'] . ": " . $row1['jml'] . ",\n ";
					}
					echo "},";
				}

				?>],
		xkey: 'bulan',
		ykeys: [<?php
				$hasilChartKunjungan2 = $this->db->query(" SELECT l.kdpoli_bpjs nama
													FROM list_poli l WHERE l.status_dokter like 'ADA'
													");
				$count = $hasilChartKunjungan2->num_rows();
				$hasilChartKunjungan2 = $hasilChartKunjungan2->result_array();

				foreach ($hasilChartKunjungan2 as $row2) {
					echo "'" . $row2['nama'] . "',";
				} ?>],
		labels: [<?php
					$hasilChartKunjungan3 = $this->db->query(" SELECT l.kdpoli_bpjs nama
															FROM list_poli l WHERE l.status_dokter like 'ADA'
														");
					$count1 = $hasilChartKunjungan3->num_rows();
					$hasilChartKunjungan3 = $hasilChartKunjungan3->result_array();

					foreach ($hasilChartKunjungan3 as $row3) {
						echo "'" . $row3['nama'] . "',";
					} ?>],
		pointSize: 2,
		fillOpacity: 0,
		lineWidth: 1.5,
		parseTime: false,
		pointStrokeColors: ['#fcb03b', '#ea65a2', '#566FC9', '#a0c2a1', '#4675e7', '#bb6ce1', '#25826c', '#cd0e0e', '#a4880f', '#e0821c', '#7d7a71'],
		gridLineColor: '#000',
		lineColors: ['#fcb03b', '#ea65a2', '#566FC9', '#a0c2a1', '#4675e7', '#bb6ce1', '#25826c', '#cd0e0e', '#a4880f', '#e0821c', '#7d7a71'],
		resize: true,
		gridTextColor: '#000',
		gridTextFamily: "Varela Round",
		hideHover: 'whenclicked'

	});
</script>