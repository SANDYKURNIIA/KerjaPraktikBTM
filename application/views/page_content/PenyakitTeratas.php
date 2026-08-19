<div class="col-lg-12 col-md-12">
    <div class="panel panel-primary card-view">
        <div class="panel-heading mb-20">
            <div class="pull-left">
                <h4 class="panel-title txt-light">10 PENYAKIT TERATAS (ICD-10) BULAN <?php
                                                                                        setlocale(LC_ALL, 'id_ID');
                                                                                        date_default_timezone_set('Asia/Jakarta');
                                                                                        $b = date("F");
                                                                                        echo $b; ?></h4>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="panel-wrapper collapse in">
            <div class="panel-body">
                <div class="table-wrap">
                    <div class="table-responsive">
                        <table class="table  top-countries">
                            <tbody>
                                <tr>
                                    <?php
                                    $now = date("Y-m");
                                    $dashboardpen = $this->db->query(" SELECT d.kode, l.nama_diagnosa, COUNT(d.nama_diagnosa) total
                                    FROM diagnosa_utama d, list_diagnosa l
                                    WHERE l.id_diagnosa = d.kode AND d.tanggal LIKE '$now%'
                                    GROUP BY d.kode
                                    ORDER BY total
                                    DESC LIMIT 10");
                                    $count = $dashboardpen->num_rows();

                                    $dashboardpen = $dashboardpen->result_array();
                                    $no = 1;

                                    foreach ($dashboardpen as $row) {

                                    ?>
                                <tr class="txt-dark">
                                    <td><?php echo $no;
                                        $no++;   ?></td>
                                    <td><?php echo $row['kode'];   ?></td>
                                    <td><?php echo $row['nama_diagnosa'];   ?></td>
                                    <td><?php echo $row['total'];   ?></td>

                                </tr>
                            <?php }  ?>


                            </tbody>
                        </table>
                    </div>
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
            <div class="col-md-4">
		</div>
		</div>