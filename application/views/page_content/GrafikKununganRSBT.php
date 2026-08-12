<<<<<<< HEAD
<!-- <style>
	h6 {
		color: black;
	}

	.footer{
		display: none;
	}
</style> -->





<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="panel panel-default card-view">
            <div class="panel-heading">
                <div class="pull-left">
                    <h6 class="panel-title txt-dark"><i class="icon-share mr-10"></i>KUNJUNGAN RUMAH SAKIT TAHUN <?php
                                                                                                                    $tahun = date("Y");
                                                                                                                    echo $tahun; ?></h6>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    <canvas id="chart_1" height="600"></canvas>
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
		<a href="<?php echo base_url('Laporan/kunjunganCByr')?>"><button>
				<h6 style="color:white">CARA BAYAR BULAN <?php date_default_timezone_set('Asia/Jakarta');
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
    if ($('#chart_1').length > 0) {
        var ctx1 = document.getElementById("chart_1").getContext("2d");
        var data1 = {
            labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
            datasets: [{
                    label: "POLI",
                    backgroundColor: "rgba(60,184,120,0.5)",
                    borderColor: "rgba(60,184,120,0.4)",
                    pointBorderColor: "rgb(60,184,120)",
                    pointHighlightStroke: "rgba(60,184,120,1)",
                    data: [
                        <?php

                        $tahun = date("Y");
                        $hasilChartRsbt = $this->db->query(" SELECT COUNT(*) jml, h.jenis_pelayanan, YEAR(p.tgl_masuk) a, MONTH(p.tgl_masuk) b
                                                FROM pelayanan p , history_pelayanan h, list_poli l
                                                WHERE   h.id_pelayanan=p.id_pelayanan  and h.nama_poli=l.id_list_poli  and p.tgl_masuk like '%$tahun%'
                                                GROUP BY a,b
                                                ORDER by b asc");
                        $count = $hasilChartRsbt->num_rows();

                        $hasilChartRsbt = $hasilChartRsbt->result_array();

                        foreach ($hasilChartRsbt as $row) {
                            echo $row['jml'] . ",";
                        }
                        ?>
                    ],
                },
                {
                    label: "IGD",
                    backgroundColor: "rgba(252,176,59,0.4)",
                    borderColor: "rgba(252,176,59,0.4)",
                    pointBorderColor: "rgb(252,176,59)",
                    pointHighlightStroke: "rgba(60,184,120,1)",
                    data: [
                        <?php


                        $hasilChartRsbt1 = $this->db->query("   SELECT COUNT(*) jml, h.jenis_pelayanan, YEAR(p.tgl_masuk) a, MONTH(p.tgl_masuk) b
                                        FROM pelayanan p , history_pelayanan_ugd h
                                        WHERE   h.id_pelayanan=p.id_pelayanan  and p.tgl_masuk like '%$tahun%'
                                        GROUP BY  a,b
                                        ORDER by b asc");
                        $count1 = $hasilChartRsbt1->num_rows();

                        $hasilChartRsbt1 = $hasilChartRsbt1->result_array();
                        foreach ($hasilChartRsbt1 as $row) {
                            echo $row['jml'] . ",";
                        }
                        ?>
                    ],
                },
                {
                    label: "RANAP",
                    backgroundColor: "rgba(234,101,162,.4)",
                    borderColor: "rgba(234,101,162,.4)",
                    pointBorderColor: "rgb(234,101,162)",
                    pointHighlightStroke: "rgba(60,184,120,1)",
                    data: [
                        <?php


                        $hasilChartRsbt2 = $this->db->query("   SELECT COUNT(*) jml, h.jenis_pelayanan, YEAR(p.tgl_masuk) a, MONTH(p.tgl_masuk) b
                                                                FROM pelayanan p , history_pelayanan_ranap h
                                                                WHERE   h.id_pelayanan=p.id_pelayanan and p.tgl_masuk like '%$tahun%'
                                                                GROUP BY  a,b
                                                                ORDER by b asc");
                        $count2 = $hasilChartRsbt2->num_rows();

                        $hasilChartRsbt2 = $hasilChartRsbt2->result_array();

                        foreach ($hasilChartRsbt2 as $row) {
                            echo $row['jml'] . ",";
                        }
                        ?>
                    ],
                }

            ]
        };

        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        var areaChart = new Chart(ctx1, {
            type: "line",
            data: data1,

            options: {
                tooltips: {
                    mode: "label"
                },
                elements: {
                    point: {
                        hitRadius: 90
                    }
                },

                scales: {
                    yAxes: [{
                        stacked: true,
                        gridLines: {
                            color: "#eee",
                        },
                        ticks: {
                            fontFamily: "Varela Round",
                            fontColor: "#2f2c2c"
                        }
                    }],
                    xAxes: [{
                        stacked: true,
                        gridLines: {
                            color: "#eee",
                        },
                        ticks: {
                            fontFamily: "Varela Round",
                            fontColor: "#2f2c2c"
                        }
                    }]
                },
                animation: {
                    duration: 3000
                },
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    display: true,
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

	.footer{
		display: none;
	}
</style> -->





<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="panel panel-default card-view">
            <div class="panel-heading">
                <div class="pull-left">
                    <h6 class="panel-title txt-dark"><i class="icon-share mr-10"></i>KUNJUNGAN RUMAH SAKIT TAHUN <?php
                                                                                                                    $tahun = date("Y");
                                                                                                                    echo $tahun; ?></h6>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    <canvas id="chart_1" height="600"></canvas>
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
		<a href="<?php echo base_url('Laporan/kunjunganCByr')?>"><button>
				<h6 style="color:white">CARA BAYAR BULAN <?php date_default_timezone_set('Asia/Jakarta');
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
    if ($('#chart_1').length > 0) {
        var ctx1 = document.getElementById("chart_1").getContext("2d");
        var data1 = {
            labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
            datasets: [{
                    label: "POLI",
                    backgroundColor: "rgba(60,184,120,0.5)",
                    borderColor: "rgba(60,184,120,0.4)",
                    pointBorderColor: "rgb(60,184,120)",
                    pointHighlightStroke: "rgba(60,184,120,1)",
                    data: [
                        <?php

                        $tahun = date("Y");
                        $hasilChartRsbt = $this->db->query(" SELECT COUNT(*) jml, h.jenis_pelayanan, YEAR(p.tgl_masuk) a, MONTH(p.tgl_masuk) b
                                                FROM pelayanan p , history_pelayanan h, list_poli l
                                                WHERE   h.id_pelayanan=p.id_pelayanan  and h.nama_poli=l.id_list_poli  and p.tgl_masuk like '%$tahun%'
                                                GROUP BY a,b
                                                ORDER by b asc");
                        $count = $hasilChartRsbt->num_rows();

                        $hasilChartRsbt = $hasilChartRsbt->result_array();

                        foreach ($hasilChartRsbt as $row) {
                            echo $row['jml'] . ",";
                        }
                        ?>
                    ],
                },
                {
                    label: "IGD",
                    backgroundColor: "rgba(252,176,59,0.4)",
                    borderColor: "rgba(252,176,59,0.4)",
                    pointBorderColor: "rgb(252,176,59)",
                    pointHighlightStroke: "rgba(60,184,120,1)",
                    data: [
                        <?php


                        $hasilChartRsbt1 = $this->db->query("   SELECT COUNT(*) jml, h.jenis_pelayanan, YEAR(p.tgl_masuk) a, MONTH(p.tgl_masuk) b
                                        FROM pelayanan p , history_pelayanan_ugd h
                                        WHERE   h.id_pelayanan=p.id_pelayanan  and p.tgl_masuk like '%$tahun%'
                                        GROUP BY  a,b
                                        ORDER by b asc");
                        $count1 = $hasilChartRsbt1->num_rows();

                        $hasilChartRsbt1 = $hasilChartRsbt1->result_array();
                        foreach ($hasilChartRsbt1 as $row) {
                            echo $row['jml'] . ",";
                        }
                        ?>
                    ],
                },
                {
                    label: "RANAP",
                    backgroundColor: "rgba(234,101,162,.4)",
                    borderColor: "rgba(234,101,162,.4)",
                    pointBorderColor: "rgb(234,101,162)",
                    pointHighlightStroke: "rgba(60,184,120,1)",
                    data: [
                        <?php


                        $hasilChartRsbt2 = $this->db->query("   SELECT COUNT(*) jml, h.jenis_pelayanan, YEAR(p.tgl_masuk) a, MONTH(p.tgl_masuk) b
                                                                FROM pelayanan p , history_pelayanan_ranap h
                                                                WHERE   h.id_pelayanan=p.id_pelayanan and p.tgl_masuk like '%$tahun%'
                                                                GROUP BY  a,b
                                                                ORDER by b asc");
                        $count2 = $hasilChartRsbt2->num_rows();

                        $hasilChartRsbt2 = $hasilChartRsbt2->result_array();

                        foreach ($hasilChartRsbt2 as $row) {
                            echo $row['jml'] . ",";
                        }
                        ?>
                    ],
                }

            ]
        };

        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        var areaChart = new Chart(ctx1, {
            type: "line",
            data: data1,

            options: {
                tooltips: {
                    mode: "label"
                },
                elements: {
                    point: {
                        hitRadius: 90
                    }
                },

                scales: {
                    yAxes: [{
                        stacked: true,
                        gridLines: {
                            color: "#eee",
                        },
                        ticks: {
                            fontFamily: "Varela Round",
                            fontColor: "#2f2c2c"
                        }
                    }],
                    xAxes: [{
                        stacked: true,
                        gridLines: {
                            color: "#eee",
                        },
                        ticks: {
                            fontFamily: "Varela Round",
                            fontColor: "#2f2c2c"
                        }
                    }]
                },
                animation: {
                    duration: 3000
                },
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    display: true,
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