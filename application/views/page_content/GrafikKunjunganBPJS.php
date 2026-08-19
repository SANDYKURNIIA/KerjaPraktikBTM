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
                <h6 class="panel-title txt-dark"><i class="icon-pie-chart mr-10"></i>KUNJUNGAN BPJS BULAN <?php
                                                                                                            setlocale(LC_ALL, 'id_ID');
                                                                                                            date_default_timezone_set('Asia/Jakarta');
                                                                                                            $b = date("F");
                                                                                                            echo $b; ?></h6>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="panel-wrapper collapse in">
            <div class="panel-body">
                <canvas id="chart_7" height="400"></canvas>
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
            <div class="col-md-4 col-xs-12">
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
    if ($('#chart_7').length > 0) {
        var ctx6 = document.getElementById("chart_7").getContext("2d");
        var data6 = {
            labels: [
                "RAJAL",
                "RANAP"
            ],
            datasets: [{
                data: [<?php
                        // $now = date("Y-m");
                        $now = date("Y-m");
                        $chartKunjunganBPJS = $this->db->query("SELECT COUNT(*) jml, h.jenis_pelayanan
                                                                    FROM pelayanan p , cara_bayar c, history_pelayanan h
                                                                    WHERE p.cara_bayar=c.id_cara_bayar and h.id_pelayanan=p.id_pelayanan and p.tgl_masuk LIKE '$now%' and c.nama='bpjs'   AND
                                                                    p.id_pelayanan not in (SELECT id_pelayanan FROM history_pelayanan_ranap WHERE status =1) 
                                                                    ORDER by jml desc  ");
                        $count = $chartKunjunganBPJS->num_rows();
                        $rows = $chartKunjunganBPJS->row_array();
                       
                        $chartKunjunganBPJS2 = $this->db->query("SELECT COUNT(*) jml, h.jenis_pelayanan
                            FROM pelayanan p , cara_bayar c, history_pelayanan_ugd h
                            WHERE p.cara_bayar=c.id_cara_bayar and h.id_pelayanan=p.id_pelayanan and p.tgl_masuk LIKE '$now%' and c.nama='bpjs'   AND
                            p.id_pelayanan not in (SELECT id_pelayanan FROM history_pelayanan_ranap WHERE status =1) 
                            ORDER by jml desc  ");
                        $count2 = $chartKunjunganBPJS2->num_rows();
                        $rows2 = $chartKunjunganBPJS2->row_array();
                        echo  $rows['jml'] + $rows2['jml'] . ",";

                        $chartKunjunganBPJS1 = $this->db->query("SELECT COUNT(*) jml, h.jenis_pelayanan
                                                                    FROM pelayanan p , cara_bayar c, history_pelayanan_ranap h
                                                                    WHERE p.cara_bayar=c.id_cara_bayar and h.id_pelayanan=p.id_pelayanan and p.tgl_masuk LIKE '$now%' and c.nama='bpjs'
                                                                    ORDER by jml desc ");
                        $count1 = $chartKunjunganBPJS1->num_rows();
                        $rows1 = $chartKunjunganBPJS1->row_array();
                        echo  $rows1['jml'];

                        ?>],
                backgroundColor: [
                    "rgba(234,101,162,.8)",
                    "rgba(241,91,38,.8)",
                    "rgba(252,176,59,.8)"
                ],
                hoverBackgroundColor: [
                    "rgba(234,101,162,.8)",
                    "rgba(241,91,38,.8)",
                    "rgba(252,176,59,.8)"
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
</script>