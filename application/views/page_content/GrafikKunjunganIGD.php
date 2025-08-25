<div class="row">

    <div class="col-lg-12 col-md-12">
        <div class="panel panel-default card-view">
            <div class="panel-heading">
                <div class="pull-left">
                    <h6 class="panel-title txt-dark"><i class="icon-clock mr-10"></i>KUNJUNGAN IGD BULAN <?php
                                                                                                            setlocale(LC_ALL, 'id_ID');
                                                                                                            date_default_timezone_set('Asia/Jakarta');
                                                                                                            $b = date("F");
                                                                                                            echo $b; ?></h6>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    <div id="morris_extra_line_chart1" class="morris-chart" style="height:600px;"></div>
                </div>
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
    if ($('#morris_extra_line_chart1').length > 0)
        Morris.Area({
            element: 'morris_extra_line_chart1',
            data: [
                <?php
                $bulan = date("Y-m");
                // $bulan = date("2023-02");
                $hasilChartIGD = $this->db->query("SELECT distinct day(p.tgl_masuk) bulan 
                                            FROM pelayanan p
                                            WHERE p.tgl_masuk like '%$bulan%'
                                            ORDER by bulan asc
                                            ");
                $count = $hasilChartIGD->num_rows();
                $hasilChartIGD = $hasilChartIGD->result_array();

                // $result = $query->fetchAll(PDO::FETCH_NAMED);
                foreach ($hasilChartIGD as $row) {
                    echo "{ bulan: '" . $row['bulan'] . "' ,\n ";
                    $bln = $row['bulan'];
                    $thn = date("Y");

                    $hasilChartIGD1 = $this->db->query("SELECT COUNT(*) jml 
                                                FROM pelayanan p 
                                                LEFT JOIN  history_pelayanan_ugd h 
                                                on h.id_pelayanan=p.id_pelayanan
                                                WHERE day(h.tgl_masuk) like '$bln' and h.tgl_masuk like '%$bulan%' 
                                                ORDER by day(h.tgl_masuk) asc
                                            ");
                    $count1 = $hasilChartIGD1->num_rows();

                    $hasilChartIGD1 = $hasilChartIGD1->result_array();
                    foreach ($hasilChartIGD1 as $row1) {
                        echo  "IGD : " . $row1['jml'] . ",\n ";
                    }
                    echo "},";
                }



                ?>
            ],
            xkey: 'bulan',
            ykeys: ['IGD'],
            labels: ['IGD'],
            pointSize: 8,
            fillOpacity: 0,
            lineWidth: 4,
            parseTime: false,
            pointStrokeColors: ['#fcb03b', '#ea65a2', '#566FC9', '#a0c2a1', '#4675e7', '#bb6ce1', '#25826c', '#cd0e0e', '#a4880f', '#e0821c', '#7d7a71'],
            behaveLikeLine: false,
            gridLineColor: '#000',
            lineColors: ['#fcb03b', '#ea65a2', '#566FC9', '#a0c2a1', '#4675e7', '#bb6ce1', '#25826c', '#cd0e0e', '#a4880f', '#e0821c', '#7d7a71'],
            resize: true,
            gridTextColor: '#010101',
            gridTextFamily: "Varela Round"


        });
</script>