<<<<<<< HEAD
<!-- <style>
    h6 {
        color: black;
    }

    .footer {
        display: none;
    }
</style> -->

<div class="row">
    <div class="panel panel-default card-view">Kunjungan BPJS Bulan <?php date_default_timezone_set('Asia/Jakarta');
                                                                    $b = date("F");
                                                                    echo $b; ?>
    </div>
</div>

<div class=" col-md-12 col-sm-12  ">
    <div class="panel panel-default card-view">
        <div class="panel-heading">
            <div class="pull-left">
                <h6 class="panel-title txt-dark"><i class="icon-pie-chart mr-10"></i>CARA BAYAR BULAN <?php
                                                                                                            setlocale(LC_ALL, 'id_ID');
                                                                                                            date_default_timezone_set('Asia/Jakarta');
                                                                                                            $b = date("F");
                                                                                                            echo $b; ?></h6>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="panel-wrapper collapse in">
            <div class="panel-body">
                <canvas id="chart_6" height="400"></canvas>
            </div>
        </div>
    </div>
</div>

<style>
	h6 {
		color: black;
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
		<a href="<?php echo base_url('Laporan/kunjunganBPJS')?>"><button>
				<h6 style="color:white">KUNJUNGAN BPJS BULAN <?php date_default_timezone_set('Asia/Jakarta');
																$b = date("F");
																echo $b; ?>
			</button></h6>
		</div>

		<div class="col-md-4">
		<a href="<?php echo base_url('Laporan/kunjunganIGD')?>"><button>
				<h6 style="color:white">KUNJUNGAN IGD BULAN <?php date_default_timezone_set('Asia/Jakarta');
															$b = date("F");
															echo $b; ?>
			</button></h6>
            <div class="col-md-4">
		</div>
		</div>

		<div class="row">
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<br><br>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<br><br>
			</div>
		</div>
		<div class="col-md-4">

		<a href="<?php echo base_url('Laporan/penTer')?>"><button>
				<h6 style="color:white">10 PENYAKIT TERATAS (ICD-10) BULAN <?php date_default_timezone_set('Asia/Jakarta');
																			$b = date("F");
																			echo $b; ?>
			</button></h6>
		</div>

		<div class="col-md-4">
		<a href="<?php echo base_url('Laporan/kunjunganPoli')?>"><button>
				<h6 style="color:white">GRAFIK KUNJUNGAN POLI TAHUN <?php date_default_timezone_set('Asia/Jakarta');
																	$year = date("Y");
																	echo $year; ?>
			</button></h6>
		</div>
		<div class="col-md-4">
		<a href="<?php echo base_url('Laporan/kunjunganRSBT')?>"><button>
				<h6 style="color:white">KUNJUNGAN RUMAH SAKIT TAHUN <?php date_default_timezone_set('Asia/Jakarta');
																	$year = date("Y");
																	echo $year; ?>
			</button></h6>
		</div>

<script src="<?= base_url("assets/vendors/chart.js/Chart.min.js") ?>"></script>
<script src="<?= base_url("assets/vendors/bower_components/raphael/raphael.min.js") ?>"></script>


<script type="text/javascript">
    "use strict";
    if ($('#chart_6').length > 0) {
        var ctx6 = document.getElementById("chart_6").getContext("2d");
        var data6 = {
            labels: [<?php
                        // $now = ("2023-01");
                        $now = date("Y-m");
                        $chartCaraBayar = $this->db->query("SELECT COUNT(*) jml, c.jenis nama
                                                                FROM pelayanan p , cara_bayar c 
                                                                WHERE p.cara_bayar=c.id_cara_bayar and p.tgl_masuk LIKE '$now%'
                                                                GROUP BY c.jenis
                                                                ORDER by jml desc ");
                        $count = $chartCaraBayar->num_rows();
                        $rows = $chartCaraBayar->result_array();

                       
                        foreach ($rows as $row) { 
                            echo "'" . $row['nama']. "',";
                        }
                        ?> "-"],
            datasets: [{
                data: [
                    <?php
                    

                    foreach ($rows as $row) {
                        echo  $row['jml'] . ",";
                    }
                    ?>
                ],
                backgroundColor: [
                    '#fcb03b', '#ea65a2', '#566FC9', '#a0c2a1', '#4675e7', '#bb6ce1', '#25826c', '#cd0e0e', '#a4880f', '#e0821c', '#7d7a71'
                ],
                hoverBackgroundColor: [
                    '#fcb03b', '#ea65a2', '#566FC9', '#a0c2a1', '#4675e7', '#bb6ce1', '#25826c', '#cd0e0e', '#a4880f', '#e0821c', '#7d7a71', '#af5d34'
                ]
            }]
        };

        var pieChart = new Chart(ctx6, {
            type: 'doughnut',
            data: data6,
            options: {
                animation: {
                    duration: 3000
                },
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    labels: {
                        fontFamily: "Varela Round",
                        fontColor: "#2f2c2c"
                    }
                },
                tooltips: {
                    backgroundColor: 'rgba(47,44,44,.9)',
                    cornerRadius: 0,
                    footerFontFamily: "'Varela Round'"
                }
            }
        });
    }
=======
<!-- <style>
    h6 {
        color: black;
    }

    .footer {
        display: none;
    }
</style> -->

<div class="row">
    <div class="panel panel-default card-view">Kunjungan BPJS Bulan <?php date_default_timezone_set('Asia/Jakarta');
                                                                    $b = date("F");
                                                                    echo $b; ?>
    </div>
</div>

<div class=" col-md-12 col-sm-12  ">
    <div class="panel panel-default card-view">
        <div class="panel-heading">
            <div class="pull-left">
                <h6 class="panel-title txt-dark"><i class="icon-pie-chart mr-10"></i>CARA BAYAR BULAN <?php
                                                                                                            setlocale(LC_ALL, 'id_ID');
                                                                                                            date_default_timezone_set('Asia/Jakarta');
                                                                                                            $b = date("F");
                                                                                                            echo $b; ?></h6>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="panel-wrapper collapse in">
            <div class="panel-body">
                <canvas id="chart_6" height="400"></canvas>
            </div>
        </div>
    </div>
</div>

<style>
	h6 {
		color: black;
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
		<a href="<?php echo base_url('Laporan/kunjunganBPJS')?>"><button>
				<h6 style="color:white">KUNJUNGAN BPJS BULAN <?php date_default_timezone_set('Asia/Jakarta');
																$b = date("F");
																echo $b; ?>
			</button></h6>
		</div>

		<div class="col-md-4">
		<a href="<?php echo base_url('Laporan/kunjunganIGD')?>"><button>
				<h6 style="color:white">KUNJUNGAN IGD BULAN <?php date_default_timezone_set('Asia/Jakarta');
															$b = date("F");
															echo $b; ?>
			</button></h6>
            <div class="col-md-4">
		</div>
		</div>

		<div class="row">
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<br><br>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<br><br>
			</div>
		</div>
		<div class="col-md-4">

		<a href="<?php echo base_url('Laporan/penTer')?>"><button>
				<h6 style="color:white">10 PENYAKIT TERATAS (ICD-10) BULAN <?php date_default_timezone_set('Asia/Jakarta');
																			$b = date("F");
																			echo $b; ?>
			</button></h6>
		</div>

		<div class="col-md-4">
		<a href="<?php echo base_url('Laporan/kunjunganPoli')?>"><button>
				<h6 style="color:white">GRAFIK KUNJUNGAN POLI TAHUN <?php date_default_timezone_set('Asia/Jakarta');
																	$year = date("Y");
																	echo $year; ?>
			</button></h6>
		</div>
		<div class="col-md-4">
		<a href="<?php echo base_url('Laporan/kunjunganRSBT')?>"><button>
				<h6 style="color:white">KUNJUNGAN RUMAH SAKIT TAHUN <?php date_default_timezone_set('Asia/Jakarta');
																	$year = date("Y");
																	echo $year; ?>
			</button></h6>
		</div>

<script src="<?= base_url("assets/vendors/chart.js/Chart.min.js") ?>"></script>
<script src="<?= base_url("assets/vendors/bower_components/raphael/raphael.min.js") ?>"></script>


<script type="text/javascript">
    "use strict";
    if ($('#chart_6').length > 0) {
        var ctx6 = document.getElementById("chart_6").getContext("2d");
        var data6 = {
            labels: [<?php
                        // $now = ("2023-01");
                        $now = date("Y-m");
                        $chartCaraBayar = $this->db->query("SELECT COUNT(*) jml, c.jenis nama
                                                                FROM pelayanan p , cara_bayar c 
                                                                WHERE p.cara_bayar=c.id_cara_bayar and p.tgl_masuk LIKE '$now%'
                                                                GROUP BY c.jenis
                                                                ORDER by jml desc ");
                        $count = $chartCaraBayar->num_rows();
                        $rows = $chartCaraBayar->result_array();

                       
                        foreach ($rows as $row) { 
                            echo "'" . $row['nama']. "',";
                        }
                        ?> "-"],
            datasets: [{
                data: [
                    <?php
                    

                    foreach ($rows as $row) {
                        echo  $row['jml'] . ",";
                    }
                    ?>
                ],
                backgroundColor: [
                    '#fcb03b', '#ea65a2', '#566FC9', '#a0c2a1', '#4675e7', '#bb6ce1', '#25826c', '#cd0e0e', '#a4880f', '#e0821c', '#7d7a71'
                ],
                hoverBackgroundColor: [
                    '#fcb03b', '#ea65a2', '#566FC9', '#a0c2a1', '#4675e7', '#bb6ce1', '#25826c', '#cd0e0e', '#a4880f', '#e0821c', '#7d7a71', '#af5d34'
                ]
            }]
        };

        var pieChart = new Chart(ctx6, {
            type: 'doughnut',
            data: data6,
            options: {
                animation: {
                    duration: 3000
                },
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    labels: {
                        fontFamily: "Varela Round",
                        fontColor: "#2f2c2c"
                    }
                },
                tooltips: {
                    backgroundColor: 'rgba(47,44,44,.9)',
                    cornerRadius: 0,
                    footerFontFamily: "'Varela Round'"
                }
            }
        });
    }
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
</script>