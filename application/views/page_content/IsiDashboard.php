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

<div class="container-fluid">
	<?php
	$idPoliBedah = 'MWK205D30K';
	$idPoliDalam = '24QRNLX29R';
	$idPoliKulit = '2JZ09X4K22';
	$idPoliFisio = '6E975PL694';
	$idPoliAnak = 'E00RX703';
	$idPoliGizi = 'CV3RN1X29R';
	$idPoliObgyne = 'HLGI4176K8';
	$idPoliJantung = 'I9NXY5VNQG';
	$idPoliTht = 'O782EGU4PR';
	$idPoliGigi = 'ODI8643C27';
	$idPoliUmum = 'RZE28J1098';
	$idPoliMata = 'UQ81K76373';
	$idPoliAkupuntur = 'SC3120P87';
	$idPoliGinjal = 'UG4424O51';
	$idPoliHd = 'NM3075J78';
	$idPoliKemo = 'EM4488C53';
	$idPoliKesJiwa = 'WT5092N25';
	$idPoliKia = 'KASE14';
	$idPoliOrt = 'YR6435H21';
	$idPoliPar = 'ZX2016T39';
	$idPoliPenMul = 'FE1400Y26';
	$idPoliBedMul = 'JG6142E66';
	$idPoliPsi = 'HK81U92373';
	$idPoliRehab = '111111';
	$idPoliSaraf = 'XN5395D61';
	$idPoliStif = 'STF56NI';
	$idPoliTerWic = '6E9TWC694';
	$idPoliUro = 'EV7719I53';

	?>
</div>



<div class="row">
	<div class="panel panel-default card-view">Kunjungan Poli Bulan <?php date_default_timezone_set('Asia/Jakarta');
																	$b = date("F");
																	echo $b; ?> </div>

	<div class="row">
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
			<div class="panel panel-default card-view">
				<div class="panel-heading">
					<div class="pull-left">
						<h6 class="panel-title txt-dark">poli akupuntur
							<!-- <?php
							$now = date("Y-m-d");
							// $now = date("2023-02-03");
							$second_date = strtotime('-1 day', strtotime($now));
							$dateminus = date('Y-m-d', $second_date);
							// $dateminus = date('2023-02-01', $second_date);

							$hasilaku1 = $this->db->query("SELECT sum(total) total from (
													SELECT COUNT(*) total
													FROM history_pelayanan h , pelayanan p
													WHERE p.id_pelayanan=h.id_pelayanan and p.status=1 
													AND  h.nama_poli='$idPoliAkupuntur' and h.tgl_masuk like '$now%'
													union ALL
													SELECT COUNT(*) * -1 total
													FROM history_pelayanan h , pelayanan p
													where p.id_pelayanan=h.id_pelayanan and p.status=1 
													and  h.nama_poli='$idPoliAkupuntur' and h.tgl_masuk like '$dateminus%') as a ");
							$count = $hasilaku1->num_rows();
							$hasilaku1 = $hasilaku1->row_array();

							if ($hasilaku1['total'] >= 0) {
							?>
								<i class=" txt-success"> (<span class="counter"><?php echo $hasilaku1['total'] ?></span>) </i>
							<?php

							} else {
							?>
								<i class=" txt-danger">(<span class="counter"><?php echo $hasilaku1['total'] ?></span>)</i>
							<?php
							}
							?> -->
						</h6>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="panel-wrapper collapse in">
					<div class="panel-body">
						<div class="sm-graph-box">
							<div class="row">
								<div class="col-xs-6">
									<div id="dPoliAkupuntur"></div>
								</div>
								<h1 style="text-align: right">
									<!-- <?php
									$thn = date("Y-m");
									// $thn = date("2023-02");
									$hasilaku = $this->db->query(" SELECT round(avg(total)) avg from (               
									SELECT COUNT(*) total, DAY(h.tgl_masuk) b
									FROM history_pelayanan h , pelayanan p
									WHERE p.id_pelayanan=h.id_pelayanan AND p.status=1 AND h.status = 1
									AND h.nama_poli='$idPoliAkupuntur' AND h.tgl_masuk LIKE '$thn%'
									GROUP BY b) AS a ")->row_array();
									echo $hasilaku['avg']
									?> -->
								</h1>
								<?php
									$hasilakuHariIni = $this->db->query("
													SELECT COUNT(*) AS total
													FROM history_pelayanan h
													JOIN pelayanan p ON p.id_pelayanan = h.id_pelayanan
													WHERE p.status = 1 
													AND h.status = 1
													AND h.nama_poli = '$idPoliAkupuntur'
													AND DATE(h.tgl_masuk) = CURDATE()
													")->row_array();
									// echo $hasilanakHariIni['total'];
								?>
							</div>
							<div class="panel-footer txt-dark font-12">
								<!-- <h6> RATA-RATA KUNJUNGAN
									<?php echo "<span class=\"txt-danger\">  " . $hasilaku['avg'] . "</span>" ?> PASIEN
									PERHARI
								</h6> -->
								<h6>JUMLAH KUNJUNGAN HARI INI<?php echo "<span class=\"txt-danger\">  " . $hasilakuHariIni['total'] . "</span>" ?> PASIEN</h6>
								<?php
								$hasilaku1 = $this->db->query("SELECT poli_akupuntur AS total FROM target_poli_bulanan ORDER BY tanggal DESC LIMIT 1");
								$totalharian = $hasilaku1->row()->total;
								$rumus = $totalharian / 30;
								$target_kunjungan_harian = round($rumus);
								?>
								<h6>TARGET HARIAN POLI :<?php echo "<span class=\"txt-danger\">  " . $target_kunjungan_harian . "</span>" ?> </h6>
								<?php
								$rumus = $target_kunjungan_harian * 30;
								$target_kunjungan_bulanan = round($rumus);
								?>
								<h6>TARGET BULANAN POLI :<?php echo "<span class=\"txt-danger\">  " . $target_kunjungan_bulanan . "</span>" ?> </h6>
								<?php
								$rumus = $target_kunjungan_bulanan * 12;
								$target_kunjungan_tahunan = round($rumus);
								?>
								<h6>TARGET TAHUNAN POLI :<?php echo "<span class=\"txt-danger\">  " . $target_kunjungan_tahunan . "</span>" ?> </h6>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>



		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
			<div class="panel panel-default card-view">
				<div class="panel-heading">
					<div class="pull-left">
						<h6 class="panel-title txt-dark">poli anak
							<!-- <?php
							// $now = date("Y-m-d");
							// $second_date = strtotime('-1 day', strtotime($now));
							// $dateminus = date('Y-m-d', $second_date);
							$hasilanak1 = $this->db->query("SELECT sum(total) total from (
													SELECT COUNT(*) total
													FROM history_pelayanan h , pelayanan p
													WHERE p.id_pelayanan=h.id_pelayanan and p.status=1 
													AND  h.nama_poli='$idPoliAnak' and h.tgl_masuk like '$now%'
													union ALL
													SELECT COUNT(*) * -1 total
													FROM history_pelayanan h , pelayanan p
													where p.id_pelayanan=h.id_pelayanan and p.status=1 
													and  h.nama_poli='$idPoliAnak' and h.tgl_masuk like '$dateminus%') as a ");
							$count = $hasilanak1->num_rows();
							$hasilanak1 = $hasilanak1->row_array();

							if ($hasilanak1['total'] >= 0) {
							?>
								<i class=" txt-success"> (<span class="counter"><?php echo $hasilanak1['total'] ?></span>) </i>
							<?php

							} else {
							?>
								<i class=" txt-danger">(<span class="counter"><?php echo $hasilanak1['total'] ?></span>)</i>
							<?php
							}
							?> -->
						</h6>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="panel-wrapper collapse in">
					<div class="panel-body">
						<div class="sm-graph-box">
							<div class="row">
								<div class="col-xs-6">
									<div id="dPoliAnak"></div>
								</div>
								<!-- <h1 style="text-align: right">
									<?php
									$hasilanak = $this->db->query(" SELECT round(avg(total)) avg from (               
									SELECT COUNT(*) total, DAY(h.tgl_masuk) b
									FROM history_pelayanan h , pelayanan p
									WHERE p.id_pelayanan=h.id_pelayanan AND p.status=1 AND h.status = 1
									AND h.nama_poli='$idPoliAnak' AND h.tgl_masuk LIKE '$thn%'
									GROUP BY b) AS a ")->row_array();
									echo $hasilanak['avg'];
									?>
								</h1> -->
								<?php
									$hasilanakHariIni = $this->db->query("
													SELECT COUNT(*) AS total
													FROM history_pelayanan h
													JOIN pelayanan p ON p.id_pelayanan = h.id_pelayanan
													WHERE p.status = 1 
													AND h.status = 1
													AND h.nama_poli = '$idPoliAnak'
													AND DATE(h.tgl_masuk) = CURDATE()
													")->row_array();
									// echo $hasilanakHariIni['total'];
								?>
							</div>
							<div class="panel-footer txt-dark font-12">
								<!-- <h6> RATA-RATA KUNJUNGAN
									<?php echo "<span class=\"txt-danger\">  " . $hasilanak['avg'] . "</span>" ?> PASIEN
									PERHARI
								</h6> -->
								<h6>JUMLAH KUNJUNGAN HARI INI<?php echo "<span class=\"txt-danger\">  " . $hasilanakHariIni['total'] . "</span>" ?> PASIEN</h6>
								<?php
								$hasilaku1 = $this->db->query("SELECT poli_anak AS total FROM target_poli_bulanan ORDER BY tanggal DESC LIMIT 1");
								$totalharian = $hasilaku1->row()->total;
								$rumus = $totalharian / 30;
								$target_kunjungan_harian = round($rumus);
								?>
								<h6>TARGET HARIAN POLI :<?php echo "<span class=\"txt-danger\">  " . $target_kunjungan_harian . "</span>" ?> </h6>
								<?php
								$rumus = $target_kunjungan_harian * 30;
								$target_kunjungan_bulanan = round($rumus);
								?>
								<h6>TARGET BULANAN POLI :<?php echo "<span class=\"txt-danger\">  " . $target_kunjungan_bulanan . "</span>" ?> </h6>
								<?php
								$rumus = $target_kunjungan_bulanan * 12;
								$target_kunjungan_tahunan = round($rumus);
								?>
								<h6>TARGET TAHUNAN POLI :<?php echo "<span class=\"txt-danger\">  " . $target_kunjungan_tahunan . "</span>" ?> </h6>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
			<div class="panel panel-default card-view">
				<div class="panel-heading">
					<div class="pull-left">
						<h6 class="panel-title txt-dark">poli bedah mulut
							<!-- <?php
							// $now = date("Y-m-d");
							// $second_date = strtotime('-1 day', strtotime($now));
							// $dateminus = date('Y-m-d', $second_date);
							$hasilbedmul1 = $this->db->query("SELECT sum(total) total from (
													SELECT COUNT(*) total
													FROM history_pelayanan h , pelayanan p
													WHERE p.id_pelayanan=h.id_pelayanan and p.status=1 
													AND  h.nama_poli='$idPoliBedMul' and h.tgl_masuk like '$now%'
													union ALL
													SELECT COUNT(*) * -1 total
													FROM history_pelayanan h , pelayanan p
													where p.id_pelayanan=h.id_pelayanan and p.status=1 
													and  h.nama_poli='$idPoliBedMul' and h.tgl_masuk like '$dateminus%') as a ");
							$count = $hasilbedmul1->num_rows();
							$hasilbedmul1 = $hasilbedmul1->row_array();

							if ($hasilbedmul1['total'] >= 0) {
							?>
								<i class=" txt-success"> (<span class="counter"><?php echo $hasilbedmul1['total'] ?></span>) </i>
							<?php

							} else {
							?>
								<i class=" txt-danger">(<span class="counter"><?php echo $hasilbedmul1['total'] ?></span>)</i>
							<?php
							}
							?> -->
						</h6>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="panel-body">
					<div class="sm-graph-box">
						<div class="row">
							<div class="col-xs-6">
								<div id="dPoliBedmul"></div>
							</div>
							<!-- <h1 style="text-align: right">
								<?php
								$hasilbedmul = $this->db->query(" SELECT round(avg(total)) avg from (               
									SELECT COUNT(*) total, DAY(h.tgl_masuk) b
									FROM history_pelayanan h , pelayanan p
									WHERE p.id_pelayanan=h.id_pelayanan AND p.status=1 AND h.status = 1
									AND h.nama_poli='$idPoliBedMul' AND h.tgl_masuk LIKE '$thn%'
									GROUP BY b) AS a ")->row_array();
								echo $hasilbedmul['avg']
								?>
							</h1> -->
							<?php
									$hasilbedmulHariIni = $this->db->query("
													SELECT COUNT(*) AS total
													FROM history_pelayanan h
													JOIN pelayanan p ON p.id_pelayanan = h.id_pelayanan
													WHERE p.status = 1 
													AND h.status = 1
													AND h.nama_poli = '$idPoliBedMul'
													AND DATE(h.tgl_masuk) = CURDATE()
													")->row_array();
									// echo $hasilanakHariIni['total'];
							?>
						</div>
						<div class="panel-footer txt-dark font-12">
							<!-- <h6> RATA-RATA KUNJUNGAN
								<?php echo "<span class=\"txt-danger\">  " . $hasilbedmul['avg'] . "</span>" ?> PASIEN PERHARI
							</h6> -->
							<h6>JUMLAH KUNJUNGAN HARI INI<?php echo "<span class=\"txt-danger\">  " . $hasilbedmulHariIni['total'] . "</span>" ?> PASIEN</h6>
							<?php
							$hasilaku1 = $this->db->query("SELECT poli_bedah_mulut AS total FROM target_poli_bulanan ORDER BY tanggal DESC LIMIT 1");
							$totalharian = $hasilaku1->row()->total;
							$rumus = $totalharian / 30;
							$target_kunjungan_harian = round($rumus);
							?>
							<h6>TARGET HARIAN POLI :<?php echo "<span class=\"txt-danger\">  " . $target_kunjungan_harian . "</span>" ?> </h6>
							<?php
							$rumus = $target_kunjungan_harian * 30;
							$target_kunjungan_bulanan = round($rumus);
							?>
							<h6>TARGET BULANAN POLI :<?php echo "<span class=\"txt-danger\">  " . $target_kunjungan_bulanan . "</span>" ?> </h6>
							<?php
							$rumus = $target_kunjungan_bulanan * 12;
							$target_kunjungan_tahunan = round($rumus);
							?>
							<h6>TARGET TAHUNAN POLI :<?php echo "<span class=\"txt-danger\">  " . $target_kunjungan_tahunan . "</span>" ?> </h6>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<div class="row">
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
			<div class="panel panel-default card-view">
				<div class="panel-heading">
					<div class="pull-left">
						<h6 class="panel-title txt-dark">poli bedah umum
							<!-- <?php
							// $now = date("Y-m-d");
							// $second_date = strtotime('-1 day', strtotime($now));
							// $dateminus = date('Y-m-d', $second_date);
							$hasilbedumum1 = $this->db->query("SELECT sum(total) total from (
													SELECT COUNT(*) total
													FROM history_pelayanan h , pelayanan p
													WHERE p.id_pelayanan=h.id_pelayanan and p.status=1 
													AND  h.nama_poli='$idPoliBedah' and h.tgl_masuk like '$now%'
													union ALL
													SELECT COUNT(*) * -1 total
													FROM history_pelayanan h , pelayanan p
													where p.id_pelayanan=h.id_pelayanan and p.status=1 
													and  h.nama_poli='$idPoliBedah' and h.tgl_masuk like '$dateminus%') as a ");
							$count = $hasilbedumum1->num_rows();
							$hasilbedumum1 = $hasilbedumum1->row_array();

							if ($hasilbedumum1['total'] >= 0) {
							?>
								<i class=" txt-success"> (<span class="counter"><?php echo $hasilbedumum1['total'] ?></span>) </i>
							<?php

							} else {
							?>
								<i class=" txt-danger">(<span class="counter"><?php echo $hasilbedumum1['total'] ?></span>)</i>
							<?php
							}
							?> -->
						</h6>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="panel-wrapper collapse in">
					<div class="panel-body">
						<div class="sm-graph-box">
							<div class="row">
								<div class="col-xs-6">
									<div id="dPoliBedah"></div>
								</div>
								<!-- <h1 style="text-align: right">
									<?php

									$hasilbedumum = $this->db->query(" SELECT round(avg(total)) avg from (               
									SELECT COUNT(*) total, DAY(h.tgl_masuk) b
									FROM history_pelayanan h , pelayanan p
									WHERE p.id_pelayanan=h.id_pelayanan AND p.status=1 AND h.status = 1
									AND h.nama_poli='$idPoliBedah' AND h.tgl_masuk LIKE '$thn%'
									GROUP BY b) AS a ")->row_array();
									echo $hasilbedumum['avg']
									?>
								</h1> -->
								<?php
									$hasilbedumumHariIni = $this->db->query("
													SELECT COUNT(*) AS total
													FROM history_pelayanan h
													JOIN pelayanan p ON p.id_pelayanan = h.id_pelayanan
													WHERE p.status = 1 
													AND h.status = 1
													AND h.nama_poli = '$idPoliBedah'
													AND DATE(h.tgl_masuk) = CURDATE()
													")->row_array();
									// echo $hasilanakHariIni['total'];
								?>
							</div>
							<div class="panel-footer txt-dark font-12">
								<!-- <h6> RATA-RATA KUNJUNGAN
									<?php echo "<span class=\"txt-danger\">  " . $hasilbedumum['avg'] . "</span>" ?> PASIEN
									PERHARI
								</h6> -->
								<h6>JUMLAH KUNJUNGAN HARI INI<?php echo "<span class=\"txt-danger\">  " . $hasilbedumumHariIni['total'] . "</span>" ?> PASIEN</h6>
								<?php
								$hasilaku1 = $this->db->query("SELECT poli_bedah_umum AS total FROM target_poli_bulanan ORDER BY tanggal DESC LIMIT 1");
								$totalharian = $hasilaku1->row()->total;
								$rumus = $totalharian / 30;
								$target_kunjungan_harian = round($rumus);
								?>
								<h6>TARGET HARIAN POLI :<?php echo "<span class=\"txt-danger\">  " . $target_kunjungan_harian . "</span>" ?> </h6>
								<?php
								$rumus = $target_kunjungan_harian * 30;
								$target_kunjungan_bulanan = round($rumus); 
								?>
								<h6>TARGET BULANAN POLI :<?php echo "<span class=\"txt-danger\">  " . $target_kunjungan_bulanan . "</span>" ?> </h6>
								<?php
								$rumus = $target_kunjungan_bulanan * 12;
								$target_kunjungan_tahunan = round($rumus);
								?>
								<h6>TARGET TAHUNAN POLI :<?php echo "<span class=\"txt-danger\">  " . $target_kunjungan_tahunan . "</span>" ?> </h6>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
			<div class="panel panel-default card-view">
				<div class="panel-heading">
					<div class="pull-left">
						<h6 class="panel-title txt-dark">poli fisio
							<!-- <?php
							// $now = date("Y-m-d");
							// $second_date = strtotime('-1 day', strtotime($now));
							// $dateminus = date('Y-m-d', $second_date);
							$hasilfisio1 = $this->db->query("SELECT sum(total) total from (
													SELECT COUNT(*) total
													FROM history_pelayanan h , pelayanan p
													WHERE p.id_pelayanan=h.id_pelayanan and p.status=1 
													AND  h.nama_poli='$idPoliFisio' and h.tgl_masuk like '$now%'
													union ALL
													SELECT COUNT(*) * -1 total
													FROM history_pelayanan h , pelayanan p
													where p.id_pelayanan=h.id_pelayanan and p.status=1 
													and  h.nama_poli='$idPoliFisio' and h.tgl_masuk like '$dateminus%') as a ");
							$count = $hasilfisio1->num_rows();
							$hasilfisio1 = $hasilfisio1->row_array();

							if ($hasilfisio1['total'] >= 0) {
							?>
								<i class=" txt-success"> (<span class="counter"><?php echo $hasilfisio1['total'] ?></span>) </i>
							<?php

							} else {
							?>
								<i class=" txt-danger">(<span class="counter"><?php echo $hasilfisio1['total'] ?></span>)</i>
							<?php
							}
							?> -->
						</h6>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="panel-wrapper collapse in">
					<div class="panel-body">
						<div class="sm-graph-box">
							<div class="row">
								<div class="col-xs-6">
									<div id="dPoliFisio"></div>
								</div>
								<!-- <h1 style="text-align: right">
									<?php

									$hasilfisio = $this->db->query(" SELECT round(avg(total)) avg from (               
									SELECT COUNT(*) total, DAY(h.tgl_masuk) b
									FROM history_pelayanan h , pelayanan p
									WHERE p.id_pelayanan=h.id_pelayanan AND p.status=1 AND h.status = 1
									AND h.nama_poli='$idPoliFisio' AND h.tgl_masuk LIKE '$thn%'
									GROUP BY b) AS a ")->row_array();
									echo $hasilfisio['avg']
									?>
								</h1> -->
								<?php
									$hasilfisioHariIni = $this->db->query("
													SELECT COUNT(*) AS total
													FROM history_pelayanan h
													JOIN pelayanan p ON p.id_pelayanan = h.id_pelayanan
													WHERE p.status = 1 
													AND h.status = 1
													AND h.nama_poli = '$idPoliFisio'
													AND DATE(h.tgl_masuk) = CURDATE()
													")->row_array();
									// echo $hasilanakHariIni['total'];
							    ?>
							</div>
							<div class="panel-footer txt-dark font-12">
								<!-- <h6> RATA-RATA KUNJUNGAN
									<?php echo "<span class=\"txt-danger\">  " . $hasilfisio['avg'] . "</span>" ?> PASIEN
									PERHARI
								</h6> -->
								<h6>JUMLAH KUNJUNGAN HARI INI<?php echo "<span class=\"txt-danger\">  " . $hasilfisioHariIni['total'] . "</span>" ?> PASIEN</h6>
								<?php
								$hasilaku1 = $this->db->query("SELECT poli_fisio AS total FROM target_poli_bulanan ORDER BY tanggal DESC LIMIT 1");
								$totalharian = $hasilaku1->row()->total;
								$rumus = $totalharian / 30;
								$target_kunjungan_harian = round($rumus);
								?>
								<h6>TARGET HARIAN POLI :<?php echo "<span class=\"txt-danger\">  " . $target_kunjungan_harian . "</span>" ?> </h6>
								<?php
								$rumus = $target_kunjungan_harian * 30;
								$target_kunjungan_bulanan = round($rumus); 
								?>
								<h6>TARGET BULANAN POLI :<?php echo "<span class=\"txt-danger\">  " . $target_kunjungan_bulanan . "</span>" ?> </h6>
								<?php
								$rumus = $target_kunjungan_bulanan * 12;
								$target_kunjungan_tahunan = round($rumus);
								?>
								<h6>TARGET TAHUNAN POLI :<?php echo "<span class=\"txt-danger\">  " . $target_kunjungan_tahunan . "</span>" ?> </h6>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
			<div class="panel panel-default card-view">
				<div class="panel-heading">
					<div class="pull-left">
						<h6 class="panel-title txt-dark">poli gigi
							<!-- <?php
							// $now = date("Y-m-d");
							// $second_date = strtotime('-1 day', strtotime($now));
							// $dateminus = date('Y-m-d', $second_date);
							$hasilGigi1 = $this->db->query("SELECT sum(total) total from (
													SELECT COUNT(*) total
													FROM history_pelayanan h , pelayanan p
													WHERE p.id_pelayanan=h.id_pelayanan and p.status=1 
													AND  h.nama_poli='$idPoliGigi' and h.tgl_masuk like '$now%'
													union ALL
													SELECT COUNT(*) * -1 total
													FROM history_pelayanan h , pelayanan p
													where p.id_pelayanan=h.id_pelayanan and p.status=1 
													and  h.nama_poli='$idPoliGigi' and h.tgl_masuk like '$dateminus%') as a ");
							$count = $hasilGigi1->num_rows();
							$hasilGigi1 = $hasilGigi1->row_array();

							if ($hasilGigi1['total'] >= 0) {
							?>
								<i class=" txt-success"> (<span class="counter"><?php echo $hasilGigi1['total'] ?></span>) </i>
							<?php

							} else {
							?>
								<i class=" txt-danger">(<span class="counter"><?php echo $hasilGigi1['total'] ?></span>)</i>
							<?php
							}
							?> -->
						</h6>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="panel-wrapper collapse in">
					<div class="panel-body">
						<div class="sm-graph-box">
							<div class="row">
								<div class="col-xs-6">
									<div id="dPoliGigi"></div>
								</div>
								<!-- <h1 style="text-align: right">
									<?php
									$hasilGigi = $this->db->query(" SELECT round(avg(total)) avg from (               
									SELECT COUNT(*) total, DAY(h.tgl_masuk) b
									FROM history_pelayanan h , pelayanan p
									WHERE p.id_pelayanan=h.id_pelayanan AND p.status=1 AND h.status = 1
									AND h.nama_poli='$idPoliGigi' AND h.tgl_masuk LIKE '$thn%'
									GROUP BY b) AS a ")->row_array();
									echo $hasilGigi['avg']
									?>
								</h1> -->
								<?php
									$hasilgigiHariIni = $this->db->query("
													SELECT COUNT(*) AS total
													FROM history_pelayanan h
													JOIN pelayanan p ON p.id_pelayanan = h.id_pelayanan
													WHERE p.status = 1 
													AND h.status = 1
													AND h.nama_poli = '$idPoliGigi'
													AND DATE(h.tgl_masuk) = CURDATE()
													")->row_array();
									// echo $hasilanakHariIni['total'];
								?>
							</div>
							<div class="panel-footer txt-dark font-12">
								<!-- <h6> RATA-RATA KUNJUNGAN
									<?php echo "<span class=\"txt-danger\">  " . $hasilGigi['avg'] . "</span>" ?> PASIEN
									PERHARI
								</h6> -->
								<h6>JUMLAH KUNJUNGAN HARI INI<?php echo "<span class=\"txt-danger\">  " . $hasilgigiHariIni['total'] . "</span>" ?> PASIEN</h6>
								<?php
								$hasilaku1 = $this->db->query("SELECT poli_gigi AS total FROM target_poli_bulanan ORDER BY tanggal DESC LIMIT 1");
								$totalharian = $hasilaku1->row()->total;
								$rumus = $totalharian / 30;
								$target_kunjungan_harian = round($rumus);
								?>
								<h6>TARGET HARIAN POLI :<?php echo "<span class=\"txt-danger\">  " . $target_kunjungan_harian . "</span>" ?> </h6>
								<?php
								$rumus = $target_kunjungan_harian * 30;
								$target_kunjungan_bulanan = round($rumus); 
								?>
								<h6>TARGET BULANAN POLI :<?php echo "<span class=\"txt-danger\">  " . $target_kunjungan_bulanan . "</span>" ?> </h6>
								<?php
								$rumus = $target_kunjungan_bulanan * 12;
								$target_kunjungan_tahunan = round($rumus);
								?>
								<h6>TARGET TAHUNAN POLI :<?php echo "<span class=\"txt-danger\">  " . $target_kunjungan_tahunan . "</span>" ?> </h6>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
			<div class="panel panel-default card-view">
				<div class="panel-heading">
					<div class="pull-left">
						<h6 class="panel-title txt-dark">poli ginjal
							<!-- <?php
							// $now = date("Y-m-d");
							// $second_date = strtotime('-1 day', strtotime($now));
							// $dateminus = date('Y-m-d', $second_date);
							$hasilGinjal1 = $this->db->query("SELECT sum(total) total from (
													SELECT COUNT(*) total
													FROM history_pelayanan h , pelayanan p
													WHERE p.id_pelayanan=h.id_pelayanan and p.status=1 
													AND  h.nama_poli='$idPoliGinjal' and h.tgl_masuk like '$now%'
													union ALL
													SELECT COUNT(*) * -1 total
													FROM history_pelayanan h , pelayanan p
													where p.id_pelayanan=h.id_pelayanan and p.status=1 
													and  h.nama_poli='$idPoliGinjal' and h.tgl_masuk like '$dateminus%') as a ");
							$count = $hasilGinjal1->num_rows();
							$hasilGinjal1 = $hasilGinjal1->row_array();

							if ($hasilGinjal1['total'] >= 0) {
							?>
								<i class=" txt-success"> (<span class="counter"><?php echo $hasilGinjal1['total'] ?></span>) </i>
							<?php

							} else {
							?>
								<i class=" txt-danger">(<span class="counter"><?php echo $hasilGinjal1['total'] ?></span>)</i>
							<?php
							}
							?> -->
						</h6>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="panel-wrapper collapse in">
					<div class="panel-body">
						<div class="sm-graph-box">
							<div class="row">
								<div class="col-xs-6">
									<div id="dPoliGinjal"></div>
								</div>
								<!-- <h1 style="text-align: right">
									<?php
									$hasilGinjal = $this->db->query(" SELECT round(avg(total)) avg from (               
									SELECT COUNT(*) total, DAY(h.tgl_masuk) b
									FROM history_pelayanan h , pelayanan p
									WHERE p.id_pelayanan=h.id_pelayanan AND p.status=1 AND h.status = 1
									AND h.nama_poli='$idPoliGinjal' AND h.tgl_masuk LIKE '$thn%'
									GROUP BY b) AS a ")->row_array();
									echo $hasilGinjal['avg']
									?>
								</h1> -->
								<?php
									$hasilginjalHariIni = $this->db->query("
													SELECT COUNT(*) AS total
													FROM history_pelayanan h
													JOIN pelayanan p ON p.id_pelayanan = h.id_pelayanan
													WHERE p.status = 1 
													AND h.status = 1
													AND h.nama_poli = '$idPoliGinjal'
													AND DATE(h.tgl_masuk) = CURDATE()
													")->row_array();
									// echo $hasilanakHariIni['total'];
								?>
							</div>
							<div class="panel-footer txt-dark font-12">
								<!-- <h6> RATA-RATA KUNJUNGAN
									<?php echo "<span class=\"txt-danger\">  " . $hasilGinjal['avg'] . "</span>" ?> PASIEN
									PERHARI
								</h6> -->
								<h6>JUMLAH KUNJUNGAN HARI INI<?php echo "<span class=\"txt-danger\">  " . $hasilginjalHariIni['total'] . "</span>" ?> PASIEN</h6>
								<?php
								$hasilaku1 = $this->db->query("SELECT poli_ginjal AS total FROM target_poli_bulanan ORDER BY tanggal DESC LIMIT 1");
								$totalharian = $hasilaku1->row()->total;
								$rumus = $totalharian / 30;
								$target_kunjungan_harian = round($rumus);
								?>
								<h6>TARGET HARIAN POLI :<?php echo "<span class=\"txt-danger\">  " . $target_kunjungan_harian . "</span>" ?> </h6>
								<?php
								$rumus = $target_kunjungan_harian * 30;
								$target_kunjungan_bulanan = round($rumus); 
								?>
								<h6>TARGET BULANAN POLI :<?php echo "<span class=\"txt-danger\">  " . $target_kunjungan_bulanan . "</span>" ?> </h6>
								<?php
								$rumus = $target_kunjungan_bulanan * 12;
								$target_kunjungan_tahunan = round($rumus);
								?>
								<h6>TARGET TAHUNAN POLI :<?php echo "<span class=\"txt-danger\">  " . $target_kunjungan_tahunan . "</span>" ?> </h6>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
			<div class="panel panel-default card-view">
				<div class="panel-heading">
					<div class="pull-left">
						<h6 class="panel-title txt-dark">poli gizi
							<!-- <?php
							// $now = date("Y-m-d");
							// $second_date = strtotime('-1 day', strtotime($now));
							// $dateminus = date('Y-m-d', $second_date);
							$hasilGizi1 = $this->db->query("SELECT sum(total) total from (
													SELECT COUNT(*) total
													FROM history_pelayanan h , pelayanan p
													WHERE p.id_pelayanan=h.id_pelayanan and p.status=1 
													AND  h.nama_poli='$idPoliGizi' and h.tgl_masuk like '$now%'
													union ALL
													SELECT COUNT(*) * -1 total
													FROM history_pelayanan h , pelayanan p
													where p.id_pelayanan=h.id_pelayanan and p.status=1 
													and  h.nama_poli='$idPoliGizi' and h.tgl_masuk like '$dateminus%') as a ");
							$count = $hasilGizi1->num_rows();
							$hasilGizi1 = $hasilGizi1->row_array();

							if ($hasilGizi1['total'] >= 0) {
							?>
								<i class=" txt-success"> (<span class="counter"><?php echo $hasilGizi1['total'] ?></span>) </i>
							<?php

							} else {
							?>
								<i class=" txt-danger">(<span class="counter"><?php echo $hasilGizi1['total'] ?></span>)</i>
							<?php
							}
							?> -->
						</h6>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="panel-wrapper collapse in">
					<div class="panel-body">
						<div class="sm-graph-box">
							<div class="row">
								<div class="col-xs-6">
									<div id="dPoliGizi"></div>
								</div>
								<!-- <h1 style="text-align: right">
									<?php
									$hasilGizi = $this->db->query(" SELECT round(avg(total)) avg from (               
									SELECT COUNT(*) total, DAY(h.tgl_masuk) b
									FROM history_pelayanan h , pelayanan p
									WHERE p.id_pelayanan=h.id_pelayanan AND p.status=1 AND h.status = 1
									AND h.nama_poli='$idPoliGizi' AND h.tgl_masuk LIKE '$thn%'
									GROUP BY b) AS a ")->row_array();
									echo $hasilGizi['avg']
									?>
								</h1> -->
								<?php
									$hasilgiziHariIni = $this->db->query("
													SELECT COUNT(*) AS total
													FROM history_pelayanan h
													JOIN pelayanan p ON p.id_pelayanan = h.id_pelayanan
													WHERE p.status = 1 
													AND h.status = 1
													AND h.nama_poli = '$idPoliGizi'
													AND DATE(h.tgl_masuk) = CURDATE()
													")->row_array();
									// echo $hasilanakHariIni['total'];
								?>
							</div>
							<div class="panel-footer txt-dark font-12">
								<!-- <h6> RATA-RATA KUNJUNGAN
									<?php echo "<span class=\"txt-danger\">  " . $hasilGizi['avg'] . "</span>" ?> PASIEN
									PERHARI
								</h6> -->
								<h6>JUMLAH KUNJUNGAN HARI INI<?php echo "<span class=\"txt-danger\">  " . $hasilgiziHariIni['total'] . "</span>" ?> PASIEN</h6>
								<?php
								$hasilaku1 = $this->db->query("SELECT poli_gizi AS total FROM target_poli_bulanan ORDER BY tanggal DESC LIMIT 1");
								$totalharian = $hasilaku1->row()->total;
								$rumus = $totalharian / 30;
								$target_kunjungan_harian = round($rumus);
								?>
								<h6>TARGET HARIAN POLI :<?php echo "<span class=\"txt-danger\">  " . $target_kunjungan_harian . "</span>" ?> </h6>
								<?php
								$rumus = $target_kunjungan_harian * 30;
								$target_kunjungan_bulanan = round($rumus); 
								?>
								<h6>TARGET BULANAN POLI :<?php echo "<span class=\"txt-danger\">  " . $target_kunjungan_bulanan . "</span>" ?> </h6>
								<?php
								$rumus = $target_kunjungan_bulanan * 12;
								$target_kunjungan_tahunan = round($rumus);
								?>
								<h6>TARGET TAHUNAN POLI :<?php echo "<span class=\"txt-danger\">  " . $target_kunjungan_tahunan . "</span>" ?> </h6>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
			<div class="panel panel-default card-view">
				<div class="panel-heading">
					<div class="pull-left">
						<h6 class="panel-title txt-dark">poli hemodialisa
							<!-- <?php
							// $now = date("Y-m-d");
							// $second_date = strtotime('-1 day', strtotime($now));
							// $dateminus = date('Y-m-d', $second_date);
							$hasilHemo1 = $this->db->query("SELECT sum(total) total from (
													SELECT COUNT(*) total
													FROM history_pelayanan h , pelayanan p
													WHERE p.id_pelayanan=h.id_pelayanan and p.status=1 
													AND  h.nama_poli='$idPoliHd' and h.tgl_masuk like '$now%'
													union ALL
													SELECT COUNT(*) * -1 total
													FROM history_pelayanan h , pelayanan p
													where p.id_pelayanan=h.id_pelayanan and p.status=1 
													and  h.nama_poli='$idPoliHd' and h.tgl_masuk like '$dateminus%') as a ");
							$count = $hasilHemo1->num_rows();
							$hasilHemo1 = $hasilHemo1->row_array();

							if ($hasilHemo1['total'] >= 0) {
							?>
								<i class=" txt-success"> (<span class="counter"><?php echo $hasilHemo1['total'] ?></span>) </i>
							<?php

							} else {
							?>
								<i class=" txt-danger">(<span class="counter"><?php echo $hasilHemo1['total'] ?></span>)</i>
							<?php
							}
							?> -->
						</h6>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="panel-wrapper collapse in">
					<div class="panel-body">
						<div class="sm-graph-box">
							<div class="row">
								<div class="col-xs-6">
									<div id="dPoliHd"></div>
								</div>
								<!-- <h1 style="text-align: right">
									<?php

									$hasilHemo = $this->db->query(" SELECT round(avg(total)) avg from (               
									SELECT COUNT(*) total, DAY(h.tgl_masuk) b
									FROM history_pelayanan h , pelayanan p
									WHERE p.id_pelayanan=h.id_pelayanan AND p.status=1 AND h.status = 1
									AND h.nama_poli='$idPoliHd' AND h.tgl_masuk LIKE '$thn%'
									GROUP BY b) AS a ")->row_array();
									echo $hasilHemo['avg']
									?>
								</h1> -->
								<?php
									$hasilhemodalisaHariIni = $this->db->query("
													SELECT COUNT(*) AS total
													FROM history_pelayanan h
													JOIN pelayanan p ON p.id_pelayanan = h.id_pelayanan
													WHERE p.status = 1 
													AND h.status = 1
													AND h.nama_poli = '$idPoliHd'
													AND DATE(h.tgl_masuk) = CURDATE()
													")->row_array();
									// echo $hasilanakHariIni['total'];
								?>
							</div>
							<div class="panel-footer txt-dark font-12">
								<!-- <h6> RATA-RATA KUNJUNGAN
									<?php echo "<span class=\"txt-danger\">  " . $hasilHemo['avg'] . "</span>" ?> PASIEN
									PERHARI
								</h6> -->
								<h6>JUMLAH KUNJUNGAN HARI INI<?php echo "<span class=\"txt-danger\">  " . $hasilhemodalisaHariIni['total'] . "</span>" ?> PASIEN</h6>
								<?php
								$hasilaku1 = $this->db->query("SELECT poli_hemodalisa AS total FROM target_poli_bulanan ORDER BY tanggal DESC LIMIT 1");
								$totalharian = $hasilaku1->row()->total;
								$rumus = $totalharian / 30;
								$target_kunjungan_harian = round($rumus);
								?>
								<h6>TARGET HARIAN POLI :<?php echo "<span class=\"txt-danger\">  " . $target_kunjungan_harian . "</span>" ?> </h6>
								<?php
								$rumus = $target_kunjungan_harian * 30;
								$target_kunjungan_bulanan = round($rumus); 
								?>
								<h6>TARGET BULANAN POLI :<?php echo "<span class=\"txt-danger\">  " . $target_kunjungan_bulanan . "</span>" ?> </h6>
								<?php
								$rumus = $target_kunjungan_bulanan * 12;
								$target_kunjungan_tahunan = round($rumus);
								?>
								<h6>TARGET TAHUNAN POLI :<?php echo "<span class=\"txt-danger\">  " . $target_kunjungan_tahunan . "</span>" ?> </h6>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
			<div class="panel panel-default card-view">
				<div class="panel-heading">
					<div class="pull-left">
						<h6 class="panel-title txt-dark">poli internis
							<!-- <?php
							// $now = date("Y-m-d");
							// $second_date = strtotime('-1 day', strtotime($now));
							// $dateminus = date('Y-m-d', $second_date);
							$hasilInter1 = $this->db->query("SELECT sum(total) total from (
													SELECT COUNT(*) total
													FROM history_pelayanan h , pelayanan p
													WHERE p.id_pelayanan=h.id_pelayanan and p.status=1 
													AND  h.nama_poli='$idPoliDalam' and h.tgl_masuk like '$now%'
													union ALL
													SELECT COUNT(*) * -1 total
													FROM history_pelayanan h , pelayanan p
													where p.id_pelayanan=h.id_pelayanan and p.status=1 
													and  h.nama_poli='$idPoliDalam' and h.tgl_masuk like '$dateminus%') as a ");
							$count = $hasilInter1->num_rows();
							$hasilInter1 = $hasilInter1->row_array();

							if ($hasilInter1['total'] >= 0) {
							?>
								<i class=" txt-success"> (<span class="counter"><?php echo $hasilInter1['total'] ?></span>) </i>
							<?php

							} else {
							?>
								<i class=" txt-danger">(<span class="counter"><?php echo $hasilInter1['total'] ?></span>)</i>
							<?php
							}
							?> -->
						</h6>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="panel-wrapper collapse in">
					<div class="panel-body">
						<div class="sm-graph-box">
							<div class="row">
								<div class="col-xs-6">
									<div id="dPoliDalam"></div>
								</div>
								<!-- <h1 style="text-align: right">
									<?php

									$hasilInter = $this->db->query(" SELECT round(avg(total)) avg from (               
									SELECT COUNT(*) total, DAY(h.tgl_masuk) b
									FROM history_pelayanan h , pelayanan p
									WHERE p.id_pelayanan=h.id_pelayanan AND p.status=1 AND h.status = 1
									AND h.nama_poli='$idPoliDalam' AND h.tgl_masuk LIKE '$thn%'
									GROUP BY b) AS a ")->row_array();
									echo $hasilInter['avg']
									?>
								</h1> -->
								<?php
									$hasilinternisaHariIni = $this->db->query("
													SELECT COUNT(*) AS total
													FROM history_pelayanan h
													JOIN pelayanan p ON p.id_pelayanan = h.id_pelayanan
													WHERE p.status = 1 
													AND h.status = 1
													AND h.nama_poli = '$idPoliDalam'
													AND DATE(h.tgl_masuk) = CURDATE()
													")->row_array();
									// echo $hasilanakHariIni['total'];
								?>
							</div>
							<div class="panel-footer txt-dark font-12">
								<!-- <h6> RATA-RATA KUNJUNGAN
									<?php echo "<span class=\"txt-danger\">  " . $hasilInter['avg'] . "</span>" ?> PASIEN
									PERHARI
								</h6> -->
								<h6>JUMLAH KUNJUNGAN HARI INI<?php echo "<span class=\"txt-danger\">  " . $hasilinternisaHariIni['total'] . "</span>" ?> PASIEN</h6>
								<?php
								$hasilaku1 = $this->db->query("SELECT poli_internis AS total FROM target_poli_bulanan ORDER BY tanggal DESC LIMIT 1");
								$totalharian = $hasilaku1->row()->total;
								$rumus = $totalharian / 30;
								$target_kunjungan_harian = round($rumus);
								?>
								<h6>TARGET HARIAN POLI :<?php echo "<span class=\"txt-danger\">  " . $target_kunjungan_harian . "</span>" ?> </h6>
								<?php
								$rumus = $target_kunjungan_harian * 30;
								$target_kunjungan_bulanan = round($rumus); 
								?>
								<h6>TARGET BULANAN POLI :<?php echo "<span class=\"txt-danger\">  " . $target_kunjungan_bulanan . "</span>" ?> </h6>
								<?php
								$rumus = $target_kunjungan_bulanan * 12;
								$target_kunjungan_tahunan = round($rumus);
								?>
								<h6>TARGET TAHUNAN POLI :<?php echo "<span class=\"txt-danger\">  " . $target_kunjungan_tahunan . "</span>" ?> </h6>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
			<div class="panel panel-default card-view">
				<div class="panel-heading">
					<div class="pull-left">
						<h6 class="panel-title txt-dark">poli jantung
							<!-- <?php
							// $now = date("Y-m-d");
							// $second_date = strtotime('-1 day', strtotime($now));
							// $dateminus = date('Y-m-d', $second_date);
							$hasilJan1 = $this->db->query("SELECT sum(total) total from (
													SELECT COUNT(*) total
													FROM history_pelayanan h , pelayanan p
													WHERE p.id_pelayanan=h.id_pelayanan and p.status=1 
													AND  h.nama_poli='$idPoliJantung' and h.tgl_masuk like '$now%'
													union ALL
													SELECT COUNT(*) * -1 total
													FROM history_pelayanan h , pelayanan p
													where p.id_pelayanan=h.id_pelayanan and p.status=1 
													and  h.nama_poli='$idPoliJantung' and h.tgl_masuk like '$dateminus%') as a ");
							$count = $hasilJan1->num_rows();
							$hasilJan1 = $hasilJan1->row_array();

							if ($hasilJan1['total'] >= 0) {
							?>
								<i class=" txt-success"> (<span class="counter"><?php echo $hasilJan1['total'] ?></span>) </i>
							<?php

							} else {
							?>
								<i class=" txt-danger">(<span class="counter"><?php echo $hasilJan1['total'] ?></span>)</i>
							<?php
							}
							?> -->
						</h6>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="panel-wrapper collapse in">
					<div class="panel-body">
						<div class="sm-graph-box">
							<div class="row">
								<div class="col-xs-6">
									<div id="dPoliJantung"></div>
								</div>
								<!-- <h1 style="text-align: right">
									<?php

									$hasilJan = $this->db->query(" SELECT round(avg(total)) avg from (               
									SELECT COUNT(*) total, DAY(h.tgl_masuk) b
									FROM history_pelayanan h , pelayanan p
									WHERE p.id_pelayanan=h.id_pelayanan AND p.status=1 AND h.status = 1
									AND h.nama_poli='$idPoliJantung' AND h.tgl_masuk LIKE '$thn%'
									GROUP BY b) AS a ")->row_array();
									echo $hasilJan['avg']
									?>
								</h1> -->
								<?php
									$hasiljantungHariIni = $this->db->query("
													SELECT COUNT(*) AS total
													FROM history_pelayanan h
													JOIN pelayanan p ON p.id_pelayanan = h.id_pelayanan
													WHERE p.status = 1 
													AND h.status = 1
													AND h.nama_poli = '$idPoliJantung'
													AND DATE(h.tgl_masuk) = CURDATE()
													")->row_array();
									// echo $hasilanakHariIni['total'];
								?>
							</div>
							<div class="panel-footer txt-dark font-12">
								<!-- <h6> RATA-RATA KUNJUNGAN
									<?php echo "<span class=\"txt-danger\">  " . $hasilJan['avg'] . "</span>" ?> PASIEN
									PERHARI
								</h6> -->
								<h6>JUMLAH KUNJUNGAN HARI INI<?php echo "<span class=\"txt-danger\">  " . $hasiljantungHariIni['total'] . "</span>" ?> PASIEN</h6>
								<?php
								$hasilaku1 = $this->db->query("SELECT poli_jantung AS total FROM target_poli_bulanan ORDER BY tanggal DESC LIMIT 1");
								$totalharian = $hasilaku1->row()->total;
								$rumus = $totalharian / 30;
								$target_kunjungan_harian = round($rumus);
								?>
								<h6>TARGET HARIAN POLI :<?php echo "<span class=\"txt-danger\">  " . $target_kunjungan_harian . "</span>" ?> </h6>
								<?php
								$rumus = $target_kunjungan_harian * 30;
								$target_kunjungan_bulanan = round($rumus); 
								?>
								<h6>TARGET BULANAN POLI :<?php echo "<span class=\"txt-danger\">  " . $target_kunjungan_bulanan . "</span>" ?> </h6>
								<?php
								$rumus = $target_kunjungan_bulanan * 12;
								$target_kunjungan_tahunan = round($rumus);
								?>
								<h6>TARGET TAHUNAN POLI :<?php echo "<span class=\"txt-danger\">  " . $target_kunjungan_tahunan . "</span>" ?> </h6>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
			<div class="panel panel-default card-view">
				<div class="panel-heading">
					<div class="pull-left">
						<h6 class="panel-title txt-dark">poli kemoterapi
							<!-- <?php
							// $now = date("Y-m-d");
							// $second_date = strtotime('-1 day', strtotime($now));
							// $dateminus = date('Y-m-d', $second_date);
							$hasilKemo1 = $this->db->query("SELECT sum(total) total from (
													SELECT COUNT(*) total
													FROM history_pelayanan h , pelayanan p
													WHERE p.id_pelayanan=h.id_pelayanan and p.status=1 
													AND  h.nama_poli='$idPoliKemo' and h.tgl_masuk like '$now%'
													union ALL
													SELECT COUNT(*) * -1 total
													FROM history_pelayanan h , pelayanan p
													where p.id_pelayanan=h.id_pelayanan and p.status=1 
													and  h.nama_poli='$idPoliKemo' and h.tgl_masuk like '$dateminus%') as a ");
							$count = $hasilKemo1->num_rows();
							$hasilKemo1 = $hasilKemo1->row_array();

							if ($hasilKemo1['total'] >= 0) {
							?>
								<i class=" txt-success"> (<span class="counter"><?php echo $hasilKemo1['total'] ?></span>) </i>
							<?php

							} else {
							?>
								<i class=" txt-danger">(<span class="counter"><?php echo $hasilKemo1['total'] ?></span>)</i>
							<?php
							}
							?> -->
						</h6>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="panel-wrapper collapse in">
					<div class="panel-body">
						<div class="sm-graph-box">
							<div class="row">
								<div class="col-xs-6">
									<div id="dPoliKemo"></div>
								</div>
								<!-- <h1 style="text-align: right">
									<?php

									$hasilKemo = $this->db->query(" SELECT round(avg(total)) avg from (               
									SELECT COUNT(*) total, DAY(h.tgl_masuk) b
									FROM history_pelayanan h , pelayanan p
									WHERE p.id_pelayanan=h.id_pelayanan AND p.status=1 AND h.status = 1
									AND h.nama_poli='$idPoliKemo' AND h.tgl_masuk LIKE '$thn%'
									GROUP BY b) AS a ")->row_array();
									echo $hasilKemo['avg']
									?>
								</h1> -->
								<?php
									$hasilkemoHariIni = $this->db->query("
													SELECT COUNT(*) AS total
													FROM history_pelayanan h
													JOIN pelayanan p ON p.id_pelayanan = h.id_pelayanan
													WHERE p.status = 1 
													AND h.status = 1
													AND h.nama_poli = '$idPoliKemo'
													AND DATE(h.tgl_masuk) = CURDATE()
													")->row_array();
									// echo $hasilanakHariIni['total'];
								?>
							</div>
							<div class="panel-footer txt-dark font-12">
								<!-- <h6> RATA-RATA KUNJUNGAN
									<?php echo "<span class=\"txt-danger\">  " . $hasilKemo['avg'] . "</span>" ?> PASIEN
									PERHARI
								</h6> -->
								<h6>JUMLAH KUNJUNGAN HARI INI<?php echo "<span class=\"txt-danger\">  " . $hasilkemoHariIni['total'] . "</span>" ?> PASIEN</h6>
								<?php
								$hasilaku1 = $this->db->query("SELECT poli_kemoterapi AS total FROM target_poli_bulanan ORDER BY tanggal DESC LIMIT 1");
								$totalharian = $hasilaku1->row()->total;
								$rumus = $totalharian / 30;
								$target_kunjungan_harian = round($rumus);
								?>
								<h6>TARGET HARIAN POLI :<?php echo "<span class=\"txt-danger\">  " . $target_kunjungan_harian . "</span>" ?> </h6>
								<?php
								$rumus = $target_kunjungan_harian * 30;
								$target_kunjungan_bulanan = round($rumus); 
								?>
								<h6>TARGET BULANAN POLI :<?php echo "<span class=\"txt-danger\">  " . $target_kunjungan_bulanan . "</span>" ?> </h6>
								<?php
								$rumus = $target_kunjungan_bulanan * 12;
								$target_kunjungan_tahunan = round($rumus);
								?>
								<h6>TARGET TAHUNAN POLI :<?php echo "<span class=\"txt-danger\">  " . $target_kunjungan_tahunan . "</span>" ?> </h6>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
			<div class="panel panel-default card-view">
				<div class="panel-heading">
					<div class="pull-left">
						<h6 class="panel-title txt-dark">poli kesehatan jiwa
							<!-- <?php
							// $now = date("Y-m-d");
							// $second_date = strtotime('-1 day', strtotime($now));
							// $dateminus = date('Y-m-d', $second_date);
							$hasilKSJ1 = $this->db->query("SELECT sum(total) total from (
													SELECT COUNT(*) total
													FROM history_pelayanan h , pelayanan p
													WHERE p.id_pelayanan=h.id_pelayanan and p.status=1 
													AND  h.nama_poli='$idPoliKesJiwa' and h.tgl_masuk like '$now%'
													union ALL
													SELECT COUNT(*) * -1 total
													FROM history_pelayanan h , pelayanan p
													where p.id_pelayanan=h.id_pelayanan and p.status=1 
													and  h.nama_poli='$idPoliKesJiwa' and h.tgl_masuk like '$dateminus%') as a ");
							$count = $hasilKSJ1->num_rows();
							$hasilKSJ1 = $hasilKSJ1->row_array();

							if ($hasilKSJ1['total'] >= 0) {
							?>
								<i class=" txt-success"> (<span class="counter"><?php echo $hasilKSJ1['total'] ?></span>) </i>
							<?php

							} else {
							?>
								<i class=" txt-danger">(<span class="counter"><?php echo $hasilKSJ1['total'] ?></span>)</i>
							<?php
							}
							?> -->
						</h6>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="panel-wrapper collapse in">
					<div class="panel-body">
						<div class="sm-graph-box">
							<div class="row">
								<div class="col-xs-6">
									<div id="dPoliKesJiwa"></div>
								</div>
								<!-- <h1 style="text-align: right">
									<?php

									$hasilKSJ = $this->db->query(" SELECT round(avg(total)) avg from (               
									SELECT COUNT(*) total, DAY(h.tgl_masuk) b
									FROM history_pelayanan h , pelayanan p
									WHERE p.id_pelayanan=h.id_pelayanan AND p.status=1 AND h.status = 1
									AND h.nama_poli='$idPoliKesJiwa' AND h.tgl_masuk LIKE '$thn%'
									GROUP BY b) AS a ")->row_array();
									echo $hasilKSJ['avg']
									?>
								</h1> -->
								<?php
									$hasilkesjiwaHariIni = $this->db->query("
													SELECT COUNT(*) AS total
													FROM history_pelayanan h
													JOIN pelayanan p ON p.id_pelayanan = h.id_pelayanan
													WHERE p.status = 1 
													AND h.status = 1
													AND h.nama_poli = '$idPoliKesJiwa'
													AND DATE(h.tgl_masuk) = CURDATE()
													")->row_array();
									// echo $hasilanakHariIni['total'];
								?>
							</div>
							<div class="panel-footer txt-dark font-12">
								<!-- <h6> RATA-RATA KUNJUNGAN
									<?php echo "<span class=\"txt-danger\">  " . $hasilKSJ['avg'] . "</span>" ?> PASIEN
									PERHARI
								</h6> -->
								<h6>JUMLAH KUNJUNGAN HARI INI<?php echo "<span class=\"txt-danger\">  " . $hasilkesjiwaHariIni['total'] . "</span>" ?> PASIEN</h6>
								<?php
								$hasilaku1 = $this->db->query("SELECT poli_kesehatan_jiwa AS total FROM target_poli_bulanan ORDER BY tanggal DESC LIMIT 1");
								$totalharian = $hasilaku1->row()->total;
								$rumus = $totalharian / 30;
								$target_kunjungan_harian = round($rumus);
								?>
								<h6>TARGET HARIAN POLI :<?php echo "<span class=\"txt-danger\">  " . $target_kunjungan_harian . "</span>" ?> </h6>
								<?php
								$rumus = $target_kunjungan_harian * 30;
								$target_kunjungan_bulanan = round($rumus); 
								?>
								<h6>TARGET BULANAN POLI :<?php echo "<span class=\"txt-danger\">  " . $target_kunjungan_bulanan . "</span>" ?> </h6>
								<?php
								$rumus = $target_kunjungan_bulanan * 12;
								$target_kunjungan_tahunan = round($rumus);
								?>
								<h6>TARGET TAHUNAN POLI :<?php echo "<span class=\"txt-danger\">  " . $target_kunjungan_tahunan . "</span>" ?> </h6>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
			<div class="panel panel-default card-view">
				<div class="panel-heading">
					<div class="pull-left">
						<h6 class="panel-title txt-dark">poli kia
							<!-- <?php
							// $now = date("Y-m-d");
							// $second_date = strtotime('-1 day', strtotime($now));
							// $dateminus = date('Y-m-d', $second_date);
							$hasilKia1 = $this->db->query("SELECT sum(total) total from (
													SELECT COUNT(*) total
													FROM history_pelayanan h , pelayanan p
													WHERE p.id_pelayanan=h.id_pelayanan and p.status=1 
													AND  h.nama_poli='$idPoliKia' and h.tgl_masuk like '$now%'
													union ALL
													SELECT COUNT(*) * -1 total
													FROM history_pelayanan h , pelayanan p
													where p.id_pelayanan=h.id_pelayanan and p.status=1 
													and  h.nama_poli='$idPoliKia' and h.tgl_masuk like '$dateminus%') as a ");
							$count = $hasilKia1->num_rows();
							$hasilKia1 = $hasilKia1->row_array();

							if ($hasilKia1['total'] >= 0) {
							?>
								<i class=" txt-success"> (<span class="counter"><?php echo $hasilKia1['total'] ?></span>) </i>
							<?php

							} else {
							?>
								<i class=" txt-danger">(<span class="counter"><?php echo $hasilKia1['total'] ?></span>)</i>
							<?php
							}
							?> -->
						</h6>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="panel-wrapper collapse in">
					<div class="panel-body">
						<div class="sm-graph-box">
							<div class="row">
								<div class="col-xs-6">
									<div id="dPoliKia"></div>
								</div>
								<!-- <h1 style="text-align: right">
									<?php

									$hasilKia = $this->db->query(" SELECT round(avg(total)) avg from (               
									SELECT COUNT(*) total, DAY(h.tgl_masuk) b
									FROM history_pelayanan h , pelayanan p
									WHERE p.id_pelayanan=h.id_pelayanan AND p.status=1 AND h.status = 1
									AND h.nama_poli='$idPoliKia' AND h.tgl_masuk LIKE '$thn%'
									GROUP BY b) AS a ")->row_array();
									echo $hasilKia['avg']
									?>
								</h1> -->
								<?php
									$hasilkiaHariIni = $this->db->query("
													SELECT COUNT(*) AS total
													FROM history_pelayanan h
													JOIN pelayanan p ON p.id_pelayanan = h.id_pelayanan
													WHERE p.status = 1 
													AND h.status = 1
													AND h.nama_poli = '$idPoliKia'
													AND DATE(h.tgl_masuk) = CURDATE()
													")->row_array();
									// echo $hasilanakHariIni['total'];
								?>
							</div>
							<div class="panel-footer txt-dark font-12">
								<!-- <h6> RATA-RATA KUNJUNGAN
									<?php echo "<span class=\"txt-danger\">  " . $hasilKia['avg'] . "</span>" ?> PASIEN
									PERHARI
								</h6> -->
								<h6>JUMLAH KUNJUNGAN HARI INI<?php echo "<span class=\"txt-danger\">  " . $hasilkiaHariIni['total'] . "</span>" ?> PASIEN</h6>
								<?php
								$hasilaku1 = $this->db->query("SELECT poli_kia AS total FROM target_poli_bulanan ORDER BY tanggal DESC LIMIT 1");
								$totalharian = $hasilaku1->row()->total;
								$rumus = $totalharian / 30;
								$target_kunjungan_harian = round($rumus);
								?>
								<h6>TARGET HARIAN POLI :<?php echo "<span class=\"txt-danger\">  " . $target_kunjungan_harian . "</span>" ?> </h6>
								<?php
								$rumus = $target_kunjungan_harian * 30;
								$target_kunjungan_bulanan = round($rumus); 
								?>
								<h6>TARGET BULANAN POLI :<?php echo "<span class=\"txt-danger\">  " . $target_kunjungan_bulanan . "</span>" ?> </h6>
								<?php
								$rumus = $target_kunjungan_bulanan * 12;
								$target_kunjungan_tahunan = round($rumus);
								?>
								<h6>TARGET TAHUNAN POLI :<?php echo "<span class=\"txt-danger\">  " . $target_kunjungan_tahunan . "</span>" ?> </h6>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
			<div class="panel panel-default card-view">
				<div class="panel-heading">
					<div class="pull-left">
						<h6 class="panel-title txt-dark">poli kulit
							<!-- <?php
							// $now = date("Y-m-d");
							// $second_date = strtotime('-1 day', strtotime($now));
							// $dateminus = date('Y-m-d', $second_date);
							$hasilKulit1 = $this->db->query("SELECT sum(total) total from (
													SELECT COUNT(*) total
													FROM history_pelayanan h , pelayanan p
													WHERE p.id_pelayanan=h.id_pelayanan and p.status=1 
													AND  h.nama_poli='$idPoliKulit' and h.tgl_masuk like '$now%'
													union ALL
													SELECT COUNT(*) * -1 total
													FROM history_pelayanan h , pelayanan p
													where p.id_pelayanan=h.id_pelayanan and p.status=1 
													and  h.nama_poli='$idPoliKulit' and h.tgl_masuk like '$dateminus%') as a ");
							$count = $hasilKulit1->num_rows();
							$hasilKulit1 = $hasilKulit1->row_array();

							if ($hasilKulit1['total'] >= 0) {
							?>
								<i class=" txt-success"> (<span class="counter"><?php echo $hasilKulit1['total'] ?></span>) </i>
							<?php

							} else {
							?>
								<i class=" txt-danger">(<span class="counter"><?php echo $hasilKulit1['total'] ?></span>)</i>
							<?php
							}
							?> -->
						</h6>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="panel-wrapper collapse in">
					<div class="panel-body">
						<div class="sm-graph-box">
							<div class="row">
								<div class="col-xs-6">
									<div id="dPoliKulit"></div>
								</div>
								<!-- <h1 style="text-align: right">
									<?php

									$hasilKulit = $this->db->query(" SELECT round(avg(total)) avg from (               
									SELECT COUNT(*) total, DAY(h.tgl_masuk) b
									FROM history_pelayanan h , pelayanan p
									WHERE p.id_pelayanan=h.id_pelayanan AND p.status=1 AND h.status = 1
									AND h.nama_poli='$idPoliKulit' AND h.tgl_masuk LIKE '$thn%'
									GROUP BY b) AS a ")->row_array();
									echo $hasilKulit['avg']
									?>
								</h1> -->
								<?php
									$hasilkulitHariIni = $this->db->query("
													SELECT COUNT(*) AS total
													FROM history_pelayanan h
													JOIN pelayanan p ON p.id_pelayanan = h.id_pelayanan
													WHERE p.status = 1 
													AND h.status = 1
													AND h.nama_poli = '$idPoliKulit'
													AND DATE(h.tgl_masuk) = CURDATE()
													")->row_array();
									// echo $hasilanakHariIni['total'];
								?>
							</div>
							<div class="panel-footer txt-dark font-12">
								<!-- <h6> RATA-RATA KUNJUNGAN
									<?php echo "<span class=\"txt-danger\">  " . $hasilKulit['avg'] . "</span>" ?> PASIEN
									PERHARI
								</h6> -->
								<h6>JUMLAH KUNJUNGAN HARI INI<?php echo "<span class=\"txt-danger\">  " . $hasilkulitHariIni['total'] . "</span>" ?> PASIEN</h6>
								<?php
								$hasilaku1 = $this->db->query("SELECT poli_kulit AS total FROM target_poli_bulanan ORDER BY tanggal DESC LIMIT 1");
								$totalharian = $hasilaku1->row()->total;
								$rumus = $totalharian / 30;
								$target_kunjungan_harian = round($rumus);
								?>
								<h6>TARGET HARIAN POLI :<?php echo "<span class=\"txt-danger\">  " . $target_kunjungan_harian . "</span>" ?> </h6>
								<?php
								$rumus = $target_kunjungan_harian * 30;
								$target_kunjungan_bulanan = round($rumus); 
								?>
								<h6>TARGET BULANAN POLI :<?php echo "<span class=\"txt-danger\">  " . $target_kunjungan_bulanan . "</span>" ?> </h6>
								<?php
								$rumus = $target_kunjungan_bulanan * 12;
								$target_kunjungan_tahunan = round($rumus);
								?>
								<h6>TARGET TAHUNAN POLI :<?php echo "<span class=\"txt-danger\">  " . $target_kunjungan_tahunan . "</span>" ?> </h6>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
			<div class="panel panel-default card-view">
				<div class="panel-heading">
					<div class="pull-left">
						<h6 class="panel-title txt-dark">poli mata
							<!-- <?php
							// $now = date("Y-m-d");
							// $second_date = strtotime('-1 day', strtotime($now));
							// $dateminus = date('Y-m-d', $second_date);
							$hasilMata1 = $this->db->query("SELECT sum(total) total from (
													SELECT COUNT(*) total
													FROM history_pelayanan h , pelayanan p
													WHERE p.id_pelayanan=h.id_pelayanan and p.status=1 
													AND  h.nama_poli='$idPoliMata' and h.tgl_masuk like '$now%'
													union ALL
													SELECT COUNT(*) * -1 total
													FROM history_pelayanan h , pelayanan p
													where p.id_pelayanan=h.id_pelayanan and p.status=1 
													and  h.nama_poli='$idPoliMata' and h.tgl_masuk like '$dateminus%') as a ");
							$count = $hasilMata1->num_rows();
							$hasilMata1 = $hasilMata1->row_array();

							if ($hasilMata1['total'] >= 0) {
							?>
								<i class=" txt-success"> (<span class="counter"><?php echo $hasilMata1['total'] ?></span>) </i>
							<?php

							} else {
							?>
								<i class=" txt-danger">(<span class="counter"><?php echo $hasilMata1['total'] ?></span>)</i>
							<?php
							}
							?> -->
						</h6>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="panel-wrapper collapse in">
					<div class="panel-body">
						<div class="sm-graph-box">
							<div class="row">
								<div class="col-xs-6">
									<div id="dPoliMata"></div>
								</div>
								<!-- <h1 style="text-align: right">
									<?php

									$hasilMata = $this->db->query(" SELECT round(avg(total)) avg from (               
									SELECT COUNT(*) total, DAY(h.tgl_masuk) b
									FROM history_pelayanan h , pelayanan p
									WHERE p.id_pelayanan=h.id_pelayanan AND p.status=1 AND h.status = 1
									AND h.nama_poli='$idPoliMata' AND h.tgl_masuk LIKE '$thn%'
									GROUP BY b) AS a ")->row_array();
									echo $hasilMata['avg']
									?>
								</h1> -->
								<?php
									$hasilmataHariIni = $this->db->query("
													SELECT COUNT(*) AS total
													FROM history_pelayanan h
													JOIN pelayanan p ON p.id_pelayanan = h.id_pelayanan
													WHERE p.status = 1 
													AND h.status = 1
													AND h.nama_poli = '$idPoliMata'
													AND DATE(h.tgl_masuk) = CURDATE()
													")->row_array();
									// echo $hasilanakHariIni['total'];
								?>
							</div>
							<div class="panel-footer txt-dark font-12">
								<!-- <h6> RATA-RATA KUNJUNGAN
									<?php echo "<span class=\"txt-danger\">  " . $hasilMata['avg'] . "</span>" ?> PASIEN
									PERHARI
								</h6> -->
								<h6>JUMLAH KUNJUNGAN HARI INI<?php echo "<span class=\"txt-danger\">  " . $hasilmataHariIni['total'] . "</span>" ?> PASIEN</h6>
								<?php
								$hasilaku1 = $this->db->query("SELECT poli_mata AS total FROM target_poli_bulanan ORDER BY tanggal DESC LIMIT 1");
								$totalharian = $hasilaku1->row()->total;
								$rumus = $totalharian / 30;
								$target_kunjungan_harian = round($rumus);
								?>
								<h6>TARGET HARIAN POLI :<?php echo "<span class=\"txt-danger\">  " . $target_kunjungan_harian . "</span>" ?> </h6>
								<?php
								$rumus = $target_kunjungan_harian * 30;
								$target_kunjungan_bulanan = round($rumus); 
								?>
								<h6>TARGET BULANAN POLI :<?php echo "<span class=\"txt-danger\">  " . $target_kunjungan_bulanan . "</span>" ?> </h6>
								<?php
								$rumus = $target_kunjungan_bulanan * 12;
								$target_kunjungan_tahunan = round($rumus);
								?>
								<h6>TARGET TAHUNAN POLI :<?php echo "<span class=\"txt-danger\">  " . $target_kunjungan_tahunan . "</span>" ?> </h6>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
			<div class="panel panel-default card-view">
				<div class="panel-heading">
					<div class="pull-left">
						<h6 class="panel-title txt-dark">poli obgyne
							<!-- <?php
							// $now = date("Y-m-d");
							// $second_date = strtotime('-1 day', strtotime($now));
							// $dateminus = date('Y-m-d', $second_date);
							$hasilObgyne1 = $this->db->query("SELECT sum(total) total from (
													SELECT COUNT(*) total
													FROM history_pelayanan h , pelayanan p
													WHERE p.id_pelayanan=h.id_pelayanan and p.status=1 
													AND  h.nama_poli='$idPoliObgyne' and h.tgl_masuk like '$now%'
													union ALL
													SELECT COUNT(*) * -1 total
													FROM history_pelayanan h , pelayanan p
													where p.id_pelayanan=h.id_pelayanan and p.status=1 
													and  h.nama_poli='$idPoliObgyne' and h.tgl_masuk like '$dateminus%') as a ");
							$count = $hasilObgyne1->num_rows();
							$hasilObgyne1 = $hasilObgyne1->row_array();

							if ($hasilObgyne1['total'] >= 0) {
							?>
								<i class=" txt-success"> (<span class="counter"><?php echo $hasilObgyne1['total'] ?></span>) </i>
							<?php

							} else {
							?>
								<i class=" txt-danger">(<span class="counter"><?php echo $hasilObgyne1['total'] ?></span>)</i>
							<?php
							}
							?> -->
						</h6>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="panel-wrapper collapse in">
					<div class="panel-body">
						<div class="sm-graph-box">
							<div class="row">
								<div class="col-xs-6">
									<div id="dPoliObgyne"></div>
								</div>
								<!-- <h1 style="text-align: right">
									<?php

									$hasilObygen = $this->db->query(" SELECT round(avg(total)) avg from (               
									SELECT COUNT(*) total, DAY(h.tgl_masuk) b
									FROM history_pelayanan h , pelayanan p
									WHERE p.id_pelayanan=h.id_pelayanan AND p.status=1 AND h.status = 1
									AND h.nama_poli='$idPoliObgyne' AND h.tgl_masuk LIKE '$thn%'
									GROUP BY b) AS a ")->row_array();
									echo $hasilObygen['avg']
									?>
								</h1> -->
								<?php
									$hasilobgyneHariIni = $this->db->query("
													SELECT COUNT(*) AS total
													FROM history_pelayanan h
													JOIN pelayanan p ON p.id_pelayanan = h.id_pelayanan
													WHERE p.status = 1 
													AND h.status = 1
													AND h.nama_poli = '$idPoliObgyne'
													AND DATE(h.tgl_masuk) = CURDATE()
													")->row_array();
									// echo $hasilanakHariIni['total'];
								?>
							</div>
							<div class="panel-footer txt-dark font-12">
								<!-- <h6> RATA-RATA KUNJUNGAN
									<?php echo "<span class=\"txt-danger\">  " . $hasilObygen['avg'] . "</span>" ?> PASIEN
									PERHARI
								</h6> -->
								<h6>JUMLAH KUNJUNGAN HARI INI<?php echo "<span class=\"txt-danger\">  " . $hasilobgyneHariIni['total'] . "</span>" ?> PASIEN</h6>
								<?php
								$hasilaku1 = $this->db->query("SELECT poli_obgyne AS total FROM target_poli_bulanan ORDER BY tanggal DESC LIMIT 1");
								$totalharian = $hasilaku1->row()->total;
								$rumus = $totalharian / 30;
								$target_kunjungan_harian = round($rumus);
								?>
								<h6>TARGET HARIAN POLI :<?php echo "<span class=\"txt-danger\">  " . $target_kunjungan_harian . "</span>" ?> </h6>
								<?php
								$rumus = $target_kunjungan_harian * 30;
								$target_kunjungan_bulanan = round($rumus); 
								?>
								<h6>TARGET BULANAN POLI :<?php echo "<span class=\"txt-danger\">  " . $target_kunjungan_bulanan . "</span>" ?> </h6>
								<?php
								$rumus = $target_kunjungan_bulanan * 12;
								$target_kunjungan_tahunan = round($rumus);
								?>
								<h6>TARGET TAHUNAN POLI :<?php echo "<span class=\"txt-danger\">  " . $target_kunjungan_tahunan . "</span>" ?> </h6>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
			<div class="panel panel-default card-view">
				<div class="panel-heading">
					<div class="pull-left">
						<h6 class="panel-title txt-dark">poli orthopedi
							<!-- <?php
							// $now = date("Y-m-d");
							// $second_date = strtotime('-1 day', strtotime($now));
							// $dateminus = date('Y-m-d', $second_date);
							$hasilOrt1 = $this->db->query("SELECT sum(total) total from (
													SELECT COUNT(*) total
													FROM history_pelayanan h , pelayanan p
													WHERE p.id_pelayanan=h.id_pelayanan and p.status=1 
													AND  h.nama_poli='$idPoliOrt' and h.tgl_masuk like '$now%'
													union ALL
													SELECT COUNT(*) * -1 total
													FROM history_pelayanan h , pelayanan p
													where p.id_pelayanan=h.id_pelayanan and p.status=1 
													and  h.nama_poli='$idPoliOrt' and h.tgl_masuk like '$dateminus%') as a ");
							$count = $hasilOrt1->num_rows();
							$hasilOrt1 = $hasilOrt1->row_array();

							if ($hasilOrt1['total'] >= 0) {
							?>
								<i class=" txt-success"> (<span class="counter"><?php echo $hasilOrt1['total'] ?></span>) </i>
							<?php

							} else {
							?>
								<i class=" txt-danger">(<span class="counter"><?php echo $hasilOrt1['total'] ?></span>)</i>
							<?php
							}
							?> -->
						</h6>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="panel-wrapper collapse in">
					<div class="panel-body">
						<div class="sm-graph-box">
							<div class="row">
								<div class="col-xs-6">
									<div id="dPoliOrt"></div>
								</div>
								<!-- <h1 style="text-align: right">
									<?php

									$hasilOrtho = $this->db->query(" SELECT round(avg(total)) avg from (               
									SELECT COUNT(*) total, DAY(h.tgl_masuk) b
									FROM history_pelayanan h , pelayanan p
									WHERE p.id_pelayanan=h.id_pelayanan AND p.status=1 AND h.status = 1
									AND h.nama_poli='$idPoliOrt' AND h.tgl_masuk LIKE '$thn%'
									GROUP BY b) AS a ")->row_array();
									echo $hasilOrtho['avg']
									?>
								</h1> -->
								<?php
									$hasilorthoHariIni = $this->db->query("
													SELECT COUNT(*) AS total
													FROM history_pelayanan h
													JOIN pelayanan p ON p.id_pelayanan = h.id_pelayanan
													WHERE p.status = 1 
													AND h.status = 1
													AND h.nama_poli = '$idPoliOrt'
													AND DATE(h.tgl_masuk) = CURDATE()
													")->row_array();
									// echo $hasilanakHariIni['total'];
								?>
							</div>
							<div class="panel-footer txt-dark font-12">
								<!-- <h6> RATA-RATA KUNJUNGAN
									<?php echo "<span class=\"txt-danger\">  " . $hasilOrtho['avg'] . "</span>" ?> PASIEN
									PERHARI
								</h6> -->
								<h6>JUMLAH KUNJUNGAN HARI INI<?php echo "<span class=\"txt-danger\">  " . $hasilorthoHariIni['total'] . "</span>" ?> PASIEN</h6>
								<?php
								$hasilaku1 = $this->db->query("SELECT poli_orthopedi AS total FROM target_poli_bulanan ORDER BY tanggal DESC LIMIT 1");
								$totalharian = $hasilaku1->row()->total;
								$rumus = $totalharian / 30;
								$target_kunjungan_harian = round($rumus);
								?>
								<h6>TARGET HARIAN POLI :<?php echo "<span class=\"txt-danger\">  " . $target_kunjungan_harian . "</span>" ?> </h6>
								<?php
								$rumus = $target_kunjungan_harian * 30;
								$target_kunjungan_bulanan = round($rumus); 
								?>
								<h6>TARGET BULANAN POLI :<?php echo "<span class=\"txt-danger\">  " . $target_kunjungan_bulanan . "</span>" ?> </h6>
								<?php
								$rumus = $target_kunjungan_bulanan * 12;
								$target_kunjungan_tahunan = round($rumus);
								?>
								<h6>TARGET TAHUNAN POLI :<?php echo "<span class=\"txt-danger\">  " . $target_kunjungan_tahunan . "</span>" ?> </h6>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
			<div class="panel panel-default card-view">
				<div class="panel-heading">
					<div class="pull-left">
						<h6 class="panel-title txt-dark">poli paru
							<!-- <?php
							// $now = date("Y-m-d");
							// $second_date = strtotime('-1 day', strtotime($now));
							// $dateminus = date('Y-m-d', $second_date);
							$hasilParu1 = $this->db->query("SELECT sum(total) total from (
													SELECT COUNT(*) total
													FROM history_pelayanan h , pelayanan p
													WHERE p.id_pelayanan=h.id_pelayanan and p.status=1 
													AND  h.nama_poli='$idPoliPar' and h.tgl_masuk like '$now%'
													union ALL
													SELECT COUNT(*) * -1 total
													FROM history_pelayanan h , pelayanan p
													where p.id_pelayanan=h.id_pelayanan and p.status=1 
													and  h.nama_poli='$idPoliPar' and h.tgl_masuk like '$dateminus%') as a ");
							$count = $hasilParu1->num_rows();
							$hasilParu1 = $hasilParu1->row_array();

							if ($hasilParu1['total'] >= 0) {
							?>
								<i class=" txt-success"> (<span class="counter"><?php echo $hasilParu1['total'] ?></span>) </i>
							<?php

							} else {
							?>
								<i class=" txt-danger">(<span class="counter"><?php echo $hasilParu1['total'] ?></span>)</i>
							<?php
							}
							?> -->
						</h6>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="panel-wrapper collapse in">
					<div class="panel-body">
						<div class="sm-graph-box">
							<div class="row">
								<div class="col-xs-6">
									<div id="dPoliPar"></div>
								</div>
								<!-- <h1 style="text-align: right">
									<?php

									$hasilParu = $this->db->query(" SELECT round(avg(total)) avg from (               
									SELECT COUNT(*) total, DAY(h.tgl_masuk) b
									FROM history_pelayanan h , pelayanan p
									WHERE p.id_pelayanan=h.id_pelayanan AND p.status=1 AND h.status = 1
									AND h.nama_poli='$idPoliPar' AND h.tgl_masuk LIKE '$thn%'
									GROUP BY b) AS a ")->row_array();
									echo $hasilParu['avg']
									?>
								</h1> -->
								<?php
									$hasilparuHariIni = $this->db->query("
													SELECT COUNT(*) AS total
													FROM history_pelayanan h
													JOIN pelayanan p ON p.id_pelayanan = h.id_pelayanan
													WHERE p.status = 1 
													AND h.status = 1
													AND h.nama_poli = '$idPoliPar'
													AND DATE(h.tgl_masuk) = CURDATE()
													")->row_array();
									// echo $hasilanakHariIni['total'];
								?>
							</div>
							<div class="panel-footer txt-dark font-12">
								<!-- <h6> RATA-RATA KUNJUNGAN
									<?php echo "<span class=\"txt-danger\">  " . $hasilParu['avg'] . "</span>" ?> PASIEN
									PERHARI
								</h6> -->
								<h6>JUMLAH KUNJUNGAN HARI INI<?php echo "<span class=\"txt-danger\">  " . $hasilparuHariIni['total'] . "</span>" ?> PASIEN</h6>
								<?php
								$hasilaku1 = $this->db->query("SELECT poli_paru AS total FROM target_poli_bulanan ORDER BY tanggal DESC LIMIT 1");
								$totalharian = $hasilaku1->row()->total;
								$rumus = $totalharian / 30;
								$target_kunjungan_harian = round($rumus);
								?>
								<h6>TARGET HARIAN POLI :<?php echo "<span class=\"txt-danger\">  " . $target_kunjungan_harian . "</span>" ?> </h6>
								<?php
								$rumus = $target_kunjungan_harian * 30;
								$target_kunjungan_bulanan = round($rumus); 
								?>
								<h6>TARGET BULANAN POLI :<?php echo "<span class=\"txt-danger\">  " . $target_kunjungan_bulanan . "</span>" ?> </h6>
								<?php
								$rumus = $target_kunjungan_bulanan * 12;
								$target_kunjungan_tahunan = round($rumus);
								?>
								<h6>TARGET TAHUNAN POLI :<?php echo "<span class=\"txt-danger\">  " . $target_kunjungan_tahunan . "</span>" ?> </h6>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
			<div class="panel panel-default card-view">
				<div class="panel-heading">
					<div class="pull-left">
						<h6 class="panel-title txt-dark">poli penyakit mulut
							<!-- <?php
							// $now = date("Y-m-d");
							// $second_date = strtotime('-1 day', strtotime($now));
							// $dateminus = date('Y-m-d', $second_date);
							$hasilPenMul1 = $this->db->query("SELECT sum(total) total from (
													SELECT COUNT(*) total
													FROM history_pelayanan h , pelayanan p
													WHERE p.id_pelayanan=h.id_pelayanan and p.status=1 
													AND  h.nama_poli='$idPoliPenMul' and h.tgl_masuk like '$now%'
													union ALL
													SELECT COUNT(*) * -1 total
													FROM history_pelayanan h , pelayanan p
													where p.id_pelayanan=h.id_pelayanan and p.status=1 
													and  h.nama_poli='$idPoliPenMul' and h.tgl_masuk like '$dateminus%') as a ");
							$count = $hasilPenMul1->num_rows();
							$hasilPenMul1 = $hasilPenMul1->row_array();

							if ($hasilPenMul1['total'] >= 0) {
							?>
								<i class=" txt-success"> (<span class="counter"><?php echo $hasilPenMul1['total'] ?></span>) </i>
							<?php

							} else {
							?>
								<i class=" txt-danger">(<span class="counter"><?php echo $hasilPenMul1['total'] ?></span>)</i>
							<?php
							}
							?> -->
						</h6>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="panel-wrapper collapse in">
					<div class="panel-body">
						<div class="sm-graph-box">
							<div class="row">
								<div class="col-xs-6">
									<div id="dPoliPenMul"></div>
								</div>
								<!-- <h1 style="text-align: right">
									<?php

									$hasilPenMlt = $this->db->query(" SELECT round(avg(total)) avg from (               
									SELECT COUNT(*) total, DAY(h.tgl_masuk) b
									FROM history_pelayanan h , pelayanan p
									WHERE p.id_pelayanan=h.id_pelayanan AND p.status=1 AND h.status = 1
									AND h.nama_poli='$idPoliPenMul' AND h.tgl_masuk LIKE '$thn%'
									GROUP BY b) AS a ")->row_array();
									echo $hasilPenMlt['avg']
									?>
								</h1> -->
								<?php
									$hasilpenmulHariIni = $this->db->query("
													SELECT COUNT(*) AS total
													FROM history_pelayanan h
													JOIN pelayanan p ON p.id_pelayanan = h.id_pelayanan
													WHERE p.status = 1 
													AND h.status = 1
													AND h.nama_poli = '$idPoliPenMul'
													AND DATE(h.tgl_masuk) = CURDATE()
													")->row_array();
									// echo $hasilanakHariIni['total'];
								?>
							</div>
							<div class="panel-footer txt-dark font-12">
								<!-- <h6> RATA-RATA KUNJUNGAN
									<?php echo "<span class=\"txt-danger\">  " . $hasilPenMlt['avg'] . "</span>" ?> PASIEN
									PERHARI
								</h6> -->
								<h6>JUMLAH KUNJUNGAN HARI INI<?php echo "<span class=\"txt-danger\">  " . $hasilpenmulHariIni['total'] . "</span>" ?> PASIEN</h6>
								<?php
								$hasilaku1 = $this->db->query("SELECT poli_penyakit_mulut AS total FROM target_poli_bulanan ORDER BY tanggal DESC LIMIT 1");
								$totalharian = $hasilaku1->row()->total;
								$rumus = $totalharian / 30;
								$target_kunjungan_harian = round($rumus);
								?>
								<h6>TARGET HARIAN POLI :<?php echo "<span class=\"txt-danger\">  " . $target_kunjungan_harian . "</span>" ?> </h6>
								<?php
								$rumus = $target_kunjungan_harian * 30;
								$target_kunjungan_bulanan = round($rumus); 
								?>
								<h6>TARGET BULANAN POLI :<?php echo "<span class=\"txt-danger\">  " . $target_kunjungan_bulanan . "</span>" ?> </h6>
								<?php
								$rumus = $target_kunjungan_bulanan * 12;
								$target_kunjungan_tahunan = round($rumus);
								?>
								<h6>TARGET TAHUNAN POLI :<?php echo "<span class=\"txt-danger\">  " . $target_kunjungan_tahunan . "</span>" ?> </h6>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
			<div class="panel panel-default card-view">
				<div class="panel-heading">
					<div class="pull-left">
						<h6 class="panel-title txt-dark">poli psikolog
							<!-- <?php
							// $now = date("Y-m-d");
							// $second_date = strtotime('-1 day', strtotime($now));
							// $dateminus = date('Y-m-d', $second_date);
							$hasilPsi1 = $this->db->query("SELECT sum(total) total from (
													SELECT COUNT(*) total
													FROM history_pelayanan h , pelayanan p
													WHERE p.id_pelayanan=h.id_pelayanan and p.status=1 
													AND  h.nama_poli='$idPoliPsi' and h.tgl_masuk like '$now%'
													union ALL
													SELECT COUNT(*) * -1 total
													FROM history_pelayanan h , pelayanan p
													where p.id_pelayanan=h.id_pelayanan and p.status=1 
													and  h.nama_poli='$idPoliPsi' and h.tgl_masuk like '$dateminus%') as a ");
							$count = $hasilPsi1->num_rows();
							$hasilPsi1 = $hasilPsi1->row_array();

							if ($hasilPsi1['total'] >= 0) {
							?>
								<i class=" txt-success"> (<span class="counter"><?php echo $hasilPsi1['total'] ?></span>) </i>
							<?php

							} else {
							?>
								<i class=" txt-danger">(<span class="counter"><?php echo $hasilPsi1['total'] ?></span>)</i>
							<?php
							}
							?> -->
						</h6>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="panel-wrapper collapse in">
					<div class="panel-body">
						<div class="sm-graph-box">
							<div class="row">
								<div class="col-xs-6">
									<div id="dPoliPsi"></div>
								</div>
								<!-- <h1 style="text-align: right">
									<?php

									$hasilPsiko = $this->db->query(" SELECT round(avg(total)) avg from (               
									SELECT COUNT(*) total, DAY(h.tgl_masuk) b
									FROM history_pelayanan h , pelayanan p
									WHERE p.id_pelayanan=h.id_pelayanan AND p.status=1 AND h.status = 1
									AND h.nama_poli='$idPoliPsi' AND h.tgl_masuk LIKE '$thn%'
									GROUP BY b) AS a ")->row_array();
									echo $hasilPsiko['avg']
									?>
								</h1> -->
								<?php
									$hasilpsiHariIni = $this->db->query("
													SELECT COUNT(*) AS total
													FROM history_pelayanan h
													JOIN pelayanan p ON p.id_pelayanan = h.id_pelayanan
													WHERE p.status = 1 
													AND h.status = 1
													AND h.nama_poli = '$idPoliPsi'
													AND DATE(h.tgl_masuk) = CURDATE()
													")->row_array();
									// echo $hasilanakHariIni['total'];
								?>
							</div>
							<div class="panel-footer txt-dark font-12">
								<!-- <h6> RATA-RATA KUNJUNGAN
									<?php echo "<span class=\"txt-danger\">  " . $hasilPsiko['avg'] . "</span>" ?> PASIEN
									PERHARI
								</h6> -->
								<h6>JUMLAH KUNJUNGAN HARI INI<?php echo "<span class=\"txt-danger\">  " . $hasilpsiHariIni['total'] . "</span>" ?> PASIEN</h6>
								<?php
								$hasilaku1 = $this->db->query("SELECT poli_psikolog AS total FROM target_poli_bulanan ORDER BY tanggal DESC LIMIT 1");
								$totalharian = $hasilaku1->row()->total;
								$rumus = $totalharian / 30;
								$target_kunjungan_harian = round($rumus);
								?>
								<h6>TARGET HARIAN POLI :<?php echo "<span class=\"txt-danger\">  " . $target_kunjungan_harian . "</span>" ?> </h6>
								<?php
								$rumus = $target_kunjungan_harian * 30;
								$target_kunjungan_bulanan = round($rumus); 
								?>
								<h6>TARGET BULANAN POLI :<?php echo "<span class=\"txt-danger\">  " . $target_kunjungan_bulanan . "</span>" ?> </h6>
								<?php
								$rumus = $target_kunjungan_bulanan * 12;
								$target_kunjungan_tahunan = round($rumus);
								?>
								<h6>TARGET TAHUNAN POLI :<?php echo "<span class=\"txt-danger\">  " . $target_kunjungan_tahunan . "</span>" ?> </h6>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
			<div class="panel panel-default card-view">
				<div class="panel-heading">
					<div class="pull-left">
						<h6 class="panel-title txt-dark">poli rehab
							<!-- <?php
							// $now = date("Y-m-d");
							// $second_date = strtotime('-1 day', strtotime($now));
							// $dateminus = date('Y-m-d', $second_date);
							$hasilReha1 = $this->db->query("SELECT sum(total) total from (
													SELECT COUNT(*) total
													FROM history_pelayanan h , pelayanan p
													WHERE p.id_pelayanan=h.id_pelayanan and p.status=1 
													AND  h.nama_poli='$idPoliRehab' and h.tgl_masuk like '$now%'
													union ALL
													SELECT COUNT(*) * -1 total
													FROM history_pelayanan h , pelayanan p
													where p.id_pelayanan=h.id_pelayanan and p.status=1 
													and  h.nama_poli='$idPoliRehab' and h.tgl_masuk like '$dateminus%') as a ");
							$count = $hasilReha1->num_rows();
							$hasilReha1 = $hasilReha1->row_array();

							if ($hasilReha1['total'] >= 0) {
							?>
								<i class=" txt-success"> (<span class="counter"><?php echo $hasilReha1['total'] ?></span>) </i>
							<?php

							} else {
							?>
								<i class=" txt-danger">(<span class="counter"><?php echo $hasilReha1['total'] ?></span>)</i>
							<?php
							}
							?> -->
						</h6>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="panel-wrapper collapse in">
					<div class="panel-body">
						<div class="sm-graph-box">
							<div class="row">
								<div class="col-xs-6">
									<div id="dPoliRehab"></div>
								</div>
								<!-- <h1 style="text-align: right">
									<?php

									$hasilReha = $this->db->query(" SELECT round(avg(total)) avg from (               
									SELECT COUNT(*) total, DAY(h.tgl_masuk) b
									FROM history_pelayanan h , pelayanan p
									WHERE p.id_pelayanan=h.id_pelayanan AND p.status=1 AND h.status = 1
									AND h.nama_poli='$idPoliRehab' AND h.tgl_masuk LIKE '$thn%'
									GROUP BY b) AS a ")->row_array();
									echo $hasilReha['avg']
									?>
								</h1> -->
								<?php
									$hasilrehabHariIni = $this->db->query("
													SELECT COUNT(*) AS total
													FROM history_pelayanan h
													JOIN pelayanan p ON p.id_pelayanan = h.id_pelayanan
													WHERE p.status = 1 
													AND h.status = 1
													AND h.nama_poli = '$idPoliRehab'
													AND DATE(h.tgl_masuk) = CURDATE()
													")->row_array();
									// echo $hasilanakHariIni['total'];
								?>
							</div>
							<div class="panel-footer txt-dark font-12">
								<!-- <h6> RATA-RATA KUNJUNGAN
									<?php echo "<span class=\"txt-danger\">  " . $hasilReha['avg'] . "</span>" ?> PASIEN
									PERHARI
								</h6> -->
								<h6>JUMLAH KUNJUNGAN HARI INI<?php echo "<span class=\"txt-danger\">  " . $hasilrehabHariIni['total'] . "</span>" ?> PASIEN</h6>
								<?php
								$hasilaku1 = $this->db->query("SELECT poli_rehab AS total FROM target_poli_bulanan ORDER BY tanggal DESC LIMIT 1");
								$totalharian = $hasilaku1->row()->total;
								$rumus = $totalharian / 30;
								$target_kunjungan_harian = round($rumus);
								?>
								<h6>TARGET HARIAN POLI :<?php echo "<span class=\"txt-danger\">  " . $target_kunjungan_harian . "</span>" ?> </h6>
								<?php
								$rumus = $target_kunjungan_harian * 30;
								$target_kunjungan_bulanan = round($rumus); 
								?>
								<h6>TARGET BULANAN POLI :<?php echo "<span class=\"txt-danger\">  " . $target_kunjungan_bulanan . "</span>" ?> </h6>
								<?php
								$rumus = $target_kunjungan_bulanan * 12;
								$target_kunjungan_tahunan = round($rumus);
								?>
								<h6>TARGET TAHUNAN POLI :<?php echo "<span class=\"txt-danger\">  " . $target_kunjungan_tahunan . "</span>" ?> </h6>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
			<div class="panel panel-default card-view">
				<div class="panel-heading">
					<div class="pull-left">
						<h6 class="panel-title txt-dark">poli saraf
							<!-- <?php
							// $now = date("Y-m-d");
							// $second_date = strtotime('-1 day', strtotime($now));
							// $dateminus = date('Y-m-d', $second_date);
							$hasilSaraf1 = $this->db->query("SELECT sum(total) total from (
													SELECT COUNT(*) total
													FROM history_pelayanan h , pelayanan p
													WHERE p.id_pelayanan=h.id_pelayanan and p.status=1 
													AND  h.nama_poli='$idPoliSaraf' and h.tgl_masuk like '$now%'
													union ALL
													SELECT COUNT(*) * -1 total
													FROM history_pelayanan h , pelayanan p
													where p.id_pelayanan=h.id_pelayanan and p.status=1 
													and  h.nama_poli='$idPoliSaraf' and h.tgl_masuk like '$dateminus%') as a ");
							$count = $hasilSaraf1->num_rows();
							$hasilSaraf1 = $hasilSaraf1->row_array();

							if ($hasilSaraf1['total'] >= 0) {
							?>
								<i class=" txt-success"> (<span class="counter"><?php echo $hasilSaraf1['total'] ?></span>) </i>
							<?php

							} else {
							?>
								<i class=" txt-danger">(<span class="counter"><?php echo $hasilSaraf1['total'] ?></span>)</i>
							<?php
							}
							?> -->
						</h6>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="panel-wrapper collapse in">
					<div class="panel-body">
						<div class="sm-graph-box">
							<div class="row">
								<div class="col-xs-6">
									<div id="dPoliSaraf"></div>
								</div>
								<!-- <h1 style="text-align: right">
									<?php

									$hasilSrf = $this->db->query(" SELECT round(avg(total)) avg from (               
									SELECT COUNT(*) total, DAY(h.tgl_masuk) b
									FROM history_pelayanan h , pelayanan p
									WHERE p.id_pelayanan=h.id_pelayanan AND p.status=1 AND h.status = 1
									AND h.nama_poli='$idPoliSaraf' AND h.tgl_masuk LIKE '$thn%'
									GROUP BY b) AS a ")->row_array();
									echo $hasilSrf['avg']
									?>
								</h1> -->
								<?php
									$hasilsarafHariIni = $this->db->query("
													SELECT COUNT(*) AS total
													FROM history_pelayanan h
													JOIN pelayanan p ON p.id_pelayanan = h.id_pelayanan
													WHERE p.status = 1 
													AND h.status = 1
													AND h.nama_poli = '$idPoliSaraf'
													AND DATE(h.tgl_masuk) = CURDATE()
													")->row_array();
									// echo $hasilanakHariIni['total'];
								?>
							</div>
							<div class="panel-footer txt-dark font-12">
								<!-- <h6> RATA-RATA KUNJUNGAN
									<?php echo "<span class=\"txt-danger\">  " . $hasilSrf['avg'] . "</span>" ?> PASIEN
									PERHARI
								</h6> -->
								<h6>JUMLAH KUNJUNGAN HARI INI<?php echo "<span class=\"txt-danger\">  " . $hasilsarafHariIni['total'] . "</span>" ?> PASIEN</h6>
								<?php
								$hasilaku1 = $this->db->query("SELECT poli_saraf AS total FROM target_poli_bulanan ORDER BY tanggal DESC LIMIT 1");
								$totalharian = $hasilaku1->row()->total;
								$rumus = $totalharian / 30;
								$target_kunjungan_harian = round($rumus);
								?>
								<h6>TARGET HARIAN POLI :<?php echo "<span class=\"txt-danger\">  " . $target_kunjungan_harian . "</span>" ?> </h6>
								<?php
								$rumus = $target_kunjungan_harian * 30;
								$target_kunjungan_bulanan = round($rumus); 
								?>
								<h6>TARGET BULANAN POLI :<?php echo "<span class=\"txt-danger\">  " . $target_kunjungan_bulanan . "</span>" ?> </h6>
								<?php
								$rumus = $target_kunjungan_bulanan * 12;
								$target_kunjungan_tahunan = round($rumus);
								?>
								<h6>TARGET TAHUNAN POLI :<?php echo "<span class=\"txt-danger\">  " . $target_kunjungan_tahunan . "</span>" ?> </h6>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
			<div class="panel panel-default card-view">
				<div class="panel-heading">
					<div class="pull-left">
						<h6 class="panel-title txt-dark">poli stifin
							<!-- <?php
							// $now = date("Y-m-d");
							// $second_date = strtotime('-1 day', strtotime($now));
							// $dateminus = date('Y-m-d', $second_date);
							$hasilStif1 = $this->db->query("SELECT sum(total) total from (
													SELECT COUNT(*) total
													FROM history_pelayanan h , pelayanan p
													WHERE p.id_pelayanan=h.id_pelayanan and p.status=1 
													AND  h.nama_poli='$idPoliStif' and h.tgl_masuk like '$now%'
													union ALL
													SELECT COUNT(*) * -1 total
													FROM history_pelayanan h , pelayanan p
													where p.id_pelayanan=h.id_pelayanan and p.status=1 
													and  h.nama_poli='$idPoliStif' and h.tgl_masuk like '$dateminus%') as a ");
							$count = $hasilStif1->num_rows();
							$hasilStif1 = $hasilStif1->row_array();

							if ($hasilStif1['total'] >= 0) {
							?>
								<i class=" txt-success"> (<span class="counter"><?php echo $hasilStif1['total'] ?></span>) </i>
							<?php

							} else {
							?>
								<i class=" txt-danger">(<span class="counter"><?php echo $hasilStif1['total'] ?></span>)</i>
							<?php
							}
							?> -->
						</h6>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="panel-wrapper collapse in">
					<div class="panel-body">
						<div class="sm-graph-box">
							<div class="row">
								<div class="col-xs-6">
									<div id="dPoliStif"></div>
								</div>
								<!-- <h1 style="text-align: right">
									<?php

									$hasilStif = $this->db->query(" SELECT round(avg(total)) avg from (               
									SELECT COUNT(*) total, DAY(h.tgl_masuk) b
									FROM history_pelayanan h , pelayanan p
									WHERE p.id_pelayanan=h.id_pelayanan AND p.status=1 AND h.status = 1
									AND h.nama_poli='$idPoliStif' AND h.tgl_masuk LIKE '$thn%'
									GROUP BY b) AS a ")->row_array();
									echo $hasilStif['avg']
									?>
								</h1> -->
								<?php
									$hasilstifinHariIni = $this->db->query("
													SELECT COUNT(*) AS total
													FROM history_pelayanan h
													JOIN pelayanan p ON p.id_pelayanan = h.id_pelayanan
													WHERE p.status = 1 
													AND h.status = 1
													AND h.nama_poli = '$idPoliStif'
													AND DATE(h.tgl_masuk) = CURDATE()
													")->row_array();
									// echo $hasilanakHariIni['total'];
								?>
							</div>
							<div class="panel-footer txt-dark font-12">
								<!-- <h6> RATA-RATA KUNJUNGAN
									<?php echo "<span class=\"txt-danger\">  " . $hasilStif['avg'] . "</span>" ?> PASIEN
									PERHARI
								</h6> -->
								<h6>JUMLAH KUNJUNGAN HARI INI<?php echo "<span class=\"txt-danger\">  " . $hasilstifinHariIni['total'] . "</span>" ?> PASIEN</h6>
								<?php
								$hasilaku1 = $this->db->query("SELECT poli_stifin AS total FROM target_poli_bulanan ORDER BY tanggal DESC LIMIT 1");
								$totalharian = $hasilaku1->row()->total;
								$rumus = $totalharian / 30;
								$target_kunjungan_harian = round($rumus);
								?>
								<h6>TARGET HARIAN POLI :<?php echo "<span class=\"txt-danger\">  " . $target_kunjungan_harian . "</span>" ?> </h6>
								<?php
								$rumus = $target_kunjungan_harian * 30;
								$target_kunjungan_bulanan = round($rumus); 
								?>
								<h6>TARGET BULANAN POLI :<?php echo "<span class=\"txt-danger\">  " . $target_kunjungan_bulanan . "</span>" ?> </h6>
								<?php
								$rumus = $target_kunjungan_bulanan * 12;
								$target_kunjungan_tahunan = round($rumus);
								?>
								<h6>TARGET TAHUNAN POLI :<?php echo "<span class=\"txt-danger\">  " . $target_kunjungan_tahunan . "</span>" ?> </h6>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
			<div class="panel panel-default card-view">
				<div class="panel-heading">
					<div class="pull-left">
						<h6 class="panel-title txt-dark">poli terapi bicara
							<!-- <?php
							// $now = date("Y-m-d");
							// $second_date = strtotime('-1 day', strtotime($now));
							// $dateminus = date('Y-m-d', $second_date);
							$hasilTerWic1 = $this->db->query("SELECT sum(total) total from (
													SELECT COUNT(*) total
													FROM history_pelayanan h , pelayanan p
													WHERE p.id_pelayanan=h.id_pelayanan and p.status=1 
													AND  h.nama_poli='$idPoliTerWic' and h.tgl_masuk like '$now%'
													union ALL
													SELECT COUNT(*) * -1 total
													FROM history_pelayanan h , pelayanan p
													where p.id_pelayanan=h.id_pelayanan and p.status=1 
													and  h.nama_poli='$idPoliTerWic' and h.tgl_masuk like '$dateminus%') as a ");
							$count = $hasilTerWic1->num_rows();
							$hasilTerWic1 = $hasilTerWic1->row_array();

							if ($hasilTerWic1['total'] >= 0) {
							?>
								<i class=" txt-success"> (<span class="counter"><?php echo $hasilTerWic1['total'] ?></span>) </i>
							<?php

							} else {
							?>
								<i class=" txt-danger">(<span class="counter"><?php echo $hasilTerWic1['total'] ?></span>)</i>
							<?php
							}
							?> -->
						</h6>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="panel-wrapper collapse in">
					<div class="panel-body">
						<div class="sm-graph-box">
							<div class="row">
								<div class="col-xs-6">
									<div id="dPoliTerWic"></div>
								</div>
								<!-- <h1 style="text-align: right">
									<?php

									$hasilTrw = $this->db->query(" SELECT round(avg(total)) avg from (               
									SELECT COUNT(*) total, DAY(h.tgl_masuk) b
									FROM history_pelayanan h , pelayanan p
									WHERE p.id_pelayanan=h.id_pelayanan AND p.status=1 AND h.status = 1
									AND h.nama_poli='$idPoliTerWic' AND h.tgl_masuk LIKE '$thn%'
									GROUP BY b) AS a ")->row_array();
									echo $hasilTrw['avg']
									?>
								</h1> -->
								<?php
									$hasiltrwHariIni = $this->db->query("
													SELECT COUNT(*) AS total
													FROM history_pelayanan h
													JOIN pelayanan p ON p.id_pelayanan = h.id_pelayanan
													WHERE p.status = 1 
													AND h.status = 1
													AND h.nama_poli = '$idPoliTerWic'
													AND DATE(h.tgl_masuk) = CURDATE()
													")->row_array();
									// echo $hasilanakHariIni['total'];
								?>
							</div>
							<div class="panel-footer txt-dark font-12">
								<!-- <h6> RATA-RATA KUNJUNGAN
									<?php echo "<span class=\"txt-danger\">  " . $hasilTrw['avg'] . "</span>" ?> PASIEN
									PERHARI
								</h6> -->
								<h6>JUMLAH KUNJUNGAN HARI INI<?php echo "<span class=\"txt-danger\">  " . $hasiltrwHariIni['total'] . "</span>" ?> PASIEN</h6>
								<?php
								$hasilaku1 = $this->db->query("SELECT poli_terapi_bicara AS total FROM target_poli_bulanan ORDER BY tanggal DESC LIMIT 1");
								$totalharian = $hasilaku1->row()->total;
								$rumus = $totalharian / 30;
								$target_kunjungan_harian = round($rumus);
								?>
								<h6>TARGET HARIAN POLI :<?php echo "<span class=\"txt-danger\">  " . $target_kunjungan_harian . "</span>" ?> </h6>
								<?php
								$rumus = $target_kunjungan_harian * 30;
								$target_kunjungan_bulanan = round($rumus); 
								?>
								<h6>TARGET BULANAN POLI :<?php echo "<span class=\"txt-danger\">  " . $target_kunjungan_bulanan . "</span>" ?> </h6>
								<?php
								$rumus = $target_kunjungan_bulanan * 12;
								$target_kunjungan_tahunan = round($rumus);
								?>
								<h6>TARGET TAHUNAN POLI :<?php echo "<span class=\"txt-danger\">  " . $target_kunjungan_tahunan . "</span>" ?> </h6>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
			<div class="panel panel-default card-view">
				<div class="panel-heading">
					<div class="pull-left">
						<h6 class="panel-title txt-dark">poli tht
							<!-- <?php
							// $now = date("Y-m-d");
							// $second_date = strtotime('-1 day', strtotime($now));
							// $dateminus = date('Y-m-d', $second_date);
							$hasilTht1 = $this->db->query("SELECT sum(total) total from (
													SELECT COUNT(*) total
													FROM history_pelayanan h , pelayanan p
													WHERE p.id_pelayanan=h.id_pelayanan and p.status=1 
													AND  h.nama_poli='$idPoliTht' and h.tgl_masuk like '$now%'
													union ALL
													SELECT COUNT(*) * -1 total
													FROM history_pelayanan h , pelayanan p
													where p.id_pelayanan=h.id_pelayanan and p.status=1 
													and  h.nama_poli='$idPoliTht' and h.tgl_masuk like '$dateminus%') as a ");
							$count = $hasilTht1->num_rows();
							$hasilTht1 = $hasilTht1->row_array();

							if ($hasilTht1['total'] >= 0) {
							?>
								<i class=" txt-success"> (<span class="counter"><?php echo $hasilTht1['total'] ?></span>) </i>
							<?php

							} else {
							?>
								<i class=" txt-danger">(<span class="counter"><?php echo $hasilTht1['total'] ?></span>)</i>
							<?php
							}
							?> -->
						</h6>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="panel-wrapper collapse in">
					<div class="panel-body">
						<div class="sm-graph-box">
							<div class="row">
								<div class="col-xs-6">
									<div id="dPoliTht"></div>
								</div>
								<!-- <h1 style="text-align: right">
									<?php

									$hasilTht = $this->db->query(" SELECT round(avg(total)) avg from (               
									SELECT COUNT(*) total, DAY(h.tgl_masuk) b
									FROM history_pelayanan h , pelayanan p
									WHERE p.id_pelayanan=h.id_pelayanan AND p.status=1 AND h.status = 1
									AND h.nama_poli='$idPoliTht' AND h.tgl_masuk LIKE '$thn%'
									GROUP BY b) AS a ")->row_array();
									echo $hasilTht['avg']
									?>
								</h1> -->
								<?php
									$hasilthtHariIni = $this->db->query("
													SELECT COUNT(*) AS total
													FROM history_pelayanan h
													JOIN pelayanan p ON p.id_pelayanan = h.id_pelayanan
													WHERE p.status = 1 
													AND h.status = 1
													AND h.nama_poli = '$idPoliTht'
													AND DATE(h.tgl_masuk) = CURDATE()
													")->row_array();
									// echo $hasilanakHariIni['total'];
								?>
							</div>
							<div class="panel-footer txt-dark font-12">
								<!-- <h6> RATA-RATA KUNJUNGAN
									<?php echo "<span class=\"txt-danger\">  " . $hasilTht['avg'] . "</span>" ?> PASIEN
									PERHARI
								</h6> -->
								<h6>JUMLAH KUNJUNGAN HARI INI<?php echo "<span class=\"txt-danger\">  " . $hasilthtHariIni['total'] . "</span>" ?> PASIEN</h6>
								<?php
								$hasilaku1 = $this->db->query("SELECT poli_tht AS total FROM target_poli_bulanan ORDER BY tanggal DESC LIMIT 1");
								$totalharian = $hasilaku1->row()->total;
								$rumus = $totalharian / 30;
								$target_kunjungan_harian = round($rumus);
								?>
								<h6>TARGET HARIAN POLI :<?php echo "<span class=\"txt-danger\">  " . $target_kunjungan_harian . "</span>" ?> </h6>
								<?php
								$rumus = $target_kunjungan_harian * 30;
								$target_kunjungan_bulanan = round($rumus); 
								?>
								<h6>TARGET BULANAN POLI :<?php echo "<span class=\"txt-danger\">  " . $target_kunjungan_bulanan . "</span>" ?> </h6>
								<?php
								$rumus = $target_kunjungan_bulanan * 12;
								$target_kunjungan_tahunan = round($rumus);
								?>
								<h6>TARGET TAHUNAN POLI :<?php echo "<span class=\"txt-danger\">  " . $target_kunjungan_tahunan . "</span>" ?> </h6>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
			<div class="panel panel-default card-view">
				<div class="panel-heading">
					<div class="pull-left">
						<h6 class="panel-title txt-dark">poli umum
							<!-- <?php
							// $now = date("Y-m-d");
							// $second_date = strtotime('-1 day', strtotime($now));
							// $dateminus = date('Y-m-d', $second_date);
							$hasilUmum = $this->db->query("SELECT sum(total) total from (
													SELECT COUNT(*) total
													FROM history_pelayanan h , pelayanan p
													WHERE p.id_pelayanan=h.id_pelayanan and p.status=1 
													AND  h.nama_poli='$idPoliUmum' and h.tgl_masuk like '$now%'
													union ALL
													SELECT COUNT(*) * -1 total
													FROM history_pelayanan h , pelayanan p
													where p.id_pelayanan=h.id_pelayanan and p.status=1 
													and  h.nama_poli='$idPoliUmum' and h.tgl_masuk like '$dateminus%') as a ");
							$count = $hasilUmum->num_rows();
							$hasilUmum = $hasilUmum->row_array();

							if ($hasilUmum['total'] >= 0) {
							?>
								<i class=" txt-success"> (<span class="counter"><?php echo $hasilUmum['total'] ?></span>) </i>
							<?php

							} else {
							?>
								<i class=" txt-danger">(<span class="counter"><?php echo $hasilUmum['total'] ?></span>)</i>
							<?php
							}
							?> -->
						</h6>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="panel-wrapper collapse in">
					<div class="panel-body">
						<div class="sm-graph-box">
							<div class="row">
								<div class="col-xs-6">
									<div id="dPoliUmum"></div>
								</div>
								<!-- <h1 style="text-align: right">
									<?php

									$hasilUmum = $this->db->query(" SELECT round(avg(total)) avg from (               
									SELECT COUNT(*) total, DAY(h.tgl_masuk) b
									FROM history_pelayanan h , pelayanan p
									WHERE p.id_pelayanan=h.id_pelayanan AND p.status=1 AND h.status = 1
									AND h.nama_poli='$idPoliUmum' AND h.tgl_masuk LIKE '$thn%'
									GROUP BY b) AS a ")->row_array();
									echo $hasilUmum['avg']
									?>
								</h1> -->
								<?php
									$hasilumumHariIni = $this->db->query("
													SELECT COUNT(*) AS total
													FROM history_pelayanan h
													JOIN pelayanan p ON p.id_pelayanan = h.id_pelayanan
													WHERE p.status = 1 
													AND h.status = 1
													AND h.nama_poli = '$idPoliUmum'
													AND DATE(h.tgl_masuk) = CURDATE()
													")->row_array();
									// echo $hasilanakHariIni['total'];
								?>
							</div>
							<div class="panel-footer txt-dark font-12">
								<!-- <h6> RATA-RATA KUNJUNGAN
									<?php echo "<span class=\"txt-danger\">  " . $hasilUmum['avg'] . "</span>" ?> PASIEN
									PERHARI
								</h6> -->
								<h6>JUMLAH KUNJUNGAN HARI INI<?php echo "<span class=\"txt-danger\">  " . $hasilumumHariIni['total'] . "</span>" ?> PASIEN</h6>
								<?php
								$hasilaku1 = $this->db->query("SELECT poli_umum AS total FROM target_poli_bulanan ORDER BY tanggal DESC LIMIT 1");
								$totalharian = $hasilaku1->row()->total;
								$rumus = $totalharian / 30;
								$target_kunjungan_harian = round($rumus);
								?>
								<h6>TARGET HARIAN POLI :<?php echo "<span class=\"txt-danger\">  " . $target_kunjungan_harian . "</span>" ?> </h6>
								<?php
								$rumus = $target_kunjungan_harian * 30;
								$target_kunjungan_bulanan = round($rumus); 
								?>
								<h6>TARGET BULANAN POLI :<?php echo "<span class=\"txt-danger\">  " . $target_kunjungan_bulanan . "</span>" ?> </h6>
								<?php
								$rumus = $target_kunjungan_bulanan * 12;
								$target_kunjungan_tahunan = round($rumus);
								?>
								<h6>TARGET TAHUNAN POLI :<?php echo "<span class=\"txt-danger\">  " . $target_kunjungan_tahunan . "</span>" ?> </h6>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
			<div class="panel panel-default card-view">
				<div class="panel-heading">
					<div class="pull-left">
						<h6 class="panel-title txt-dark">poli urologi
							<!-- <?php
							// $now = date("Y-m-d");
							// $second_date = strtotime('-1 day', strtotime($now));
							// $dateminus = date('Y-m-d', $second_date);
							$hasilUro1 = $this->db->query("SELECT sum(total) total from (
													SELECT COUNT(*) total
													FROM history_pelayanan h , pelayanan p
													WHERE p.id_pelayanan=h.id_pelayanan and p.status=1 
													AND  h.nama_poli='$idPoliUro' and h.tgl_masuk like '$now%'
													union ALL
													SELECT COUNT(*) * -1 total
													FROM history_pelayanan h , pelayanan p
													where p.id_pelayanan=h.id_pelayanan and p.status=1 
													and  h.nama_poli='$idPoliUro' and h.tgl_masuk like '$dateminus%') as a ");
							$count = $hasilUro1->num_rows();
							$hasilUro1 = $hasilUro1->row_array();

							if ($hasilUro1['total'] >= 0) {
							?>
								<i class=" txt-success"> (<span class="counter"><?php echo $hasilUro1['total'] ?></span>) </i>
							<?php

							} else {
							?>
								<i class=" txt-danger">(<span class="counter"><?php echo $hasilUro1['total'] ?></span>)</i>
							<?php
							}
							?> -->
						</h6>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="panel-wrapper collapse in">
					<div class="panel-body">
						<div class="sm-graph-box">
							<div class="row">
								<div class="col-xs-6">
									<div id="dPoliUro"></div>
								</div>
								<!-- <h1 style="text-align: right">
									<?php

									$hasilUro = $this->db->query(" SELECT round(avg(total)) avg from (               
									SELECT COUNT(*) total, DAY(h.tgl_masuk) b
									FROM history_pelayanan h , pelayanan p
									WHERE p.id_pelayanan=h.id_pelayanan AND p.status=1 AND h.status = 1
									AND h.nama_poli='$idPoliUro' AND h.tgl_masuk LIKE '$thn%'
									GROUP BY b) AS a ")->row_array();
									echo $hasilUro['avg']
									?>
								</h1> -->
								<?php
									$hasiluroHariIni = $this->db->query("
													SELECT COUNT(*) AS total
													FROM history_pelayanan h
													JOIN pelayanan p ON p.id_pelayanan = h.id_pelayanan
													WHERE p.status = 1 
													AND h.status = 1
													AND h.nama_poli = '$idPoliUro'
													AND DATE(h.tgl_masuk) = CURDATE()
													")->row_array();
									// echo $hasilanakHariIni['total'];
								?>
							</div>
							<div class="panel-footer txt-dark font-12">
								<!-- <h6> RATA-RATA KUNJUNGAN
									<?php echo "<span class=\"txt-danger\">  " . $hasilUro['avg'] . "</span>" ?> PASIEN
									PERHARI
								</h6> -->
								<h6>JUMLAH KUNJUNGAN HARI INI<?php echo "<span class=\"txt-danger\">  " . $hasiluroHariIni['total'] . "</span>" ?> PASIEN</h6>
								<?php
								$hasilaku1 = $this->db->query("SELECT poli_urologi AS total FROM target_poli_bulanan ORDER BY tanggal DESC LIMIT 1");
								$totalharian = $hasilaku1->row()->total;
								$rumus = $totalharian / 30;
								$target_kunjungan_harian = round($rumus);
								?>
								<h6>TARGET HARIAN POLI :<?php echo "<span class=\"txt-danger\">  " . $target_kunjungan_harian . "</span>" ?> </h6>
								<?php
								$rumus = $target_kunjungan_harian * 30;
								$target_kunjungan_bulanan = round($rumus); 
								?>
								<h6>TARGET BULANAN POLI :<?php echo "<span class=\"txt-danger\">  " . $target_kunjungan_bulanan . "</span>" ?> </h6>
								<?php
								$rumus = $target_kunjungan_bulanan * 12;
								$target_kunjungan_tahunan = round($rumus);
								?>
								<h6>TARGET TAHUNAN POLI :<?php echo "<span class=\"txt-danger\">  " . $target_kunjungan_tahunan . "</span>" ?> </h6>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>




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
			<a href="<?php echo base_url('Laporan/kunjunganPoli') ?>"><button>
					<h6 style="color:white">GRAFIK KUNJUNGAN POLI TAHUN <?php date_default_timezone_set('Asia/Jakarta');
																		$year = date("Y");
																		echo $year; ?>
				</button></h6>
		</div>
		<div class="col-md-4">
			<a href="<?php echo base_url('Laporan/kunjunganRSBT') ?>"><button>
					<h6 style="color:white">KUNJUNGAN RUMAH SAKIT TAHUN <?php date_default_timezone_set('Asia/Jakarta');
																		$year = date("Y");
																		echo $year; ?>
				</button></h6>
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
		var sparklineLogin = function() {
			if ($('#dPoliAkupuntur').length > 0) {
				$("#dPoliAkupuntur").sparkline([
					<?php

					$thn = date("Y-m");
					$slaku = $this->db->query("SELECT COUNT(h.id_pelayanan) total, h.id_pelayanan
											FROM (SELECT f.tgl_masuk, f.id_pelayanan from history_pelayanan f , pelayanan k
											where k.id_pelayanan=f.id_pelayanan and k.status='1'
											and f.nama_poli='$idPoliAkupuntur' and f.tgl_masuk LIKE '$thn%') h
											RIGHT join
											( SELECT distinct DAY(p.tgl_masuk) aa from pelayanan p WHERE  p.tgl_masuk LIKE '$thn%' and p.status='1' ORDER by aa asc)  b 
											on b.aa=day(h.tgl_masuk)
											GROUP by b.aa ");
					$count = $slaku->num_rows();

					$slaku = $slaku->result_array();

					foreach ($slaku as $row) {
						echo  $row['total'] . ",";
					}
					?>
				], {
					type: 'line',
					width: '100%',
					height: '45',
					lineColor: '#ea8bcd',
					fillColor: 'transparent',
					maxSpotColor: '#566FC9',
					highlightLineColor: 'rgba(0, 0, 0, 0.2)',
					highlightSpotColor: '#566FC9'
				});
			}
		}
		var sparkResize;
		$(window).resize(function(e) {
			clearTimeout(sparkResize);
			sparkResize = setTimeout(sparklineLogin, 200);
		});
		sparklineLogin();

		var sparklineLogin = function() {
			if ($('#dPoliAnak').length > 0) {
				$("#dPoliAnak").sparkline([
					<?php
					$slanak = $this->db->query("SELECT COUNT(h.id_pelayanan) total, h.id_pelayanan
											FROM (SELECT f.tgl_masuk, f.id_pelayanan from history_pelayanan f , pelayanan k
											where k.id_pelayanan=f.id_pelayanan and k.status='1'
											and f.nama_poli='$idPoliAnak' and f.tgl_masuk LIKE '$thn%') h
											RIGHT join
											( SELECT distinct DAY(p.tgl_masuk) aa from pelayanan p WHERE  p.tgl_masuk LIKE '$thn%' and p.status='1' ORDER by aa asc)  b 
											on b.aa=day(h.tgl_masuk)
											GROUP by b.aa ");
					$count = $slanak->num_rows();

					$slanak = $slanak->result_array();

					foreach ($slanak as $row) {
						echo  $row['total'] . ",";
					}
					?>
				], {
					type: 'line',
					width: '100%',
					height: '45',
					lineColor: '#ea8bcd',
					fillColor: 'transparent',
					maxSpotColor: '#566FC9',
					highlightLineColor: 'rgba(0, 0, 0, 0.2)',
					highlightSpotColor: '#566FC9'
				});
			}
		}
		var sparkResize;
		$(window).resize(function(e) {
			clearTimeout(sparkResize);
			sparkResize = setTimeout(sparklineLogin, 200);
		});
		sparklineLogin();

		var sparklineLogin = function() {
			if ($('#dPoliBedmul').length > 0) {
				$("#dPoliBedmul").sparkline([
					<?php
					$slbedmul = $this->db->query("SELECT COUNT(h.id_pelayanan) total, h.id_pelayanan
											FROM (SELECT f.tgl_masuk, f.id_pelayanan from history_pelayanan f , pelayanan k
											where k.id_pelayanan=f.id_pelayanan and k.status='1'
											and f.nama_poli='$idPoliBedMul' and f.tgl_masuk LIKE '$thn%') h
											RIGHT join
											( SELECT distinct DAY(p.tgl_masuk) aa from pelayanan p WHERE  p.tgl_masuk LIKE '$thn%' and p.status='1' ORDER by aa asc)  b 
											on b.aa=day(h.tgl_masuk)
											GROUP by b.aa ");
					$count = $slbedmul->num_rows();

					$slbedmul = $slbedmul->result_array();

					foreach ($slbedmul as $row) {
						echo  $row['total'] . ",";
					}
					?>
				], {
					type: 'line',
					width: '100%',
					height: '45',
					lineColor: '#ea8bcd',
					fillColor: 'transparent',
					maxSpotColor: '#566FC9',
					highlightLineColor: 'rgba(0, 0, 0, 0.2)',
					highlightSpotColor: '#566FC9'
				});
			}
		}
		var sparkResize;
		$(window).resize(function(e) {
			clearTimeout(sparkResize);
			sparkResize = setTimeout(sparklineLogin, 200);
		});
		sparklineLogin();

		var sparklineLogin = function() {
			if ($('#dPoliBedah').length > 0) {
				$("#dPoliBedah").sparkline([
					<?php
					$slBedah = $this->db->query("SELECT COUNT(h.id_pelayanan) total, h.id_pelayanan
											FROM (SELECT f.tgl_masuk, f.id_pelayanan from history_pelayanan f , pelayanan k
											where k.id_pelayanan=f.id_pelayanan and k.status='1'
											and f.nama_poli='$idPoliBedah' and f.tgl_masuk LIKE '$thn%') h
											RIGHT join
											( SELECT distinct DAY(p.tgl_masuk) aa from pelayanan p WHERE  p.tgl_masuk LIKE '$thn%' and p.status='1' ORDER by aa asc)  b 
											on b.aa=day(h.tgl_masuk)
											GROUP by b.aa ");
					$count = $slBedah->num_rows();

					$slBedah = $slBedah->result_array();

					foreach ($slBedah as $row) {
						echo  $row['total'] . ",";
					}
					?>
				], {
					type: 'line',
					width: '100%',
					height: '45',
					lineColor: '#ea8bcd',
					fillColor: 'transparent',
					maxSpotColor: '#566FC9',
					highlightLineColor: 'rgba(0, 0, 0, 0.2)',
					highlightSpotColor: '#566FC9'
				});
			}
		}
		var sparkResize;
		$(window).resize(function(e) {
			clearTimeout(sparkResize);
			sparkResize = setTimeout(sparklineLogin, 200);
		});
		sparklineLogin();

		var sparklineLogin = function() {
			if ($('#dPoliFisio').length > 0) {
				$("#dPoliFisio").sparkline([
					<?php
					$slFisio = $this->db->query("SELECT COUNT(h.id_pelayanan) total, h.id_pelayanan
											FROM (SELECT f.tgl_masuk, f.id_pelayanan from history_pelayanan f , pelayanan k
											where k.id_pelayanan=f.id_pelayanan and k.status='1'
											and f.nama_poli='$idPoliFisio' and f.tgl_masuk LIKE '$thn%') h
											RIGHT join
											( SELECT distinct DAY(p.tgl_masuk) aa from pelayanan p WHERE  p.tgl_masuk LIKE '$thn%' and p.status='1' ORDER by aa asc)  b 
											on b.aa=day(h.tgl_masuk)
											GROUP by b.aa ");
					$count = $slFisio->num_rows();

					$slFisio = $slFisio->result_array();

					foreach ($slFisio as $row) {
						echo  $row['total'] . ",";
					}
					?>
				], {
					type: 'line',
					width: '100%',
					height: '45',
					lineColor: '#ea8bcd',
					fillColor: 'transparent',
					maxSpotColor: '#566FC9',
					highlightLineColor: 'rgba(0, 0, 0, 0.2)',
					highlightSpotColor: '#566FC9'
				});
			}
		}
		var sparkResize;
		$(window).resize(function(e) {
			clearTimeout(sparkResize);
			sparkResize = setTimeout(sparklineLogin, 200);
		});
		sparklineLogin();

		var sparklineLogin = function() {
			if ($('#dPoliGigi').length > 0) {
				$("#dPoliGigi").sparkline([
					<?php
					$slGigi = $this->db->query("SELECT COUNT(h.id_pelayanan) total, h.id_pelayanan
											FROM (SELECT f.tgl_masuk, f.id_pelayanan from history_pelayanan f , pelayanan k
											where k.id_pelayanan=f.id_pelayanan and k.status='1'
											and f.nama_poli='$idPoliGigi' and f.tgl_masuk LIKE '$thn%') h
											RIGHT join
											( SELECT distinct DAY(p.tgl_masuk) aa from pelayanan p WHERE  p.tgl_masuk LIKE '$thn%' and p.status='1' ORDER by aa asc)  b 
											on b.aa=day(h.tgl_masuk)
											GROUP by b.aa ");
					$count = $slGigi->num_rows();

					$slGigi = $slGigi->result_array();

					foreach ($slGigi as $row) {
						echo  $row['total'] . ",";
					}
					?>
				], {
					type: 'line',
					width: '100%',
					height: '45',
					lineColor: '#ea8bcd',
					fillColor: 'transparent',
					maxSpotColor: '#566FC9',
					highlightLineColor: 'rgba(0, 0, 0, 0.2)',
					highlightSpotColor: '#566FC9'
				});
			}
		}
		var sparkResize;
		$(window).resize(function(e) {
			clearTimeout(sparkResize);
			sparkResize = setTimeout(sparklineLogin, 200);
		});
		sparklineLogin();

		var sparklineLogin = function() {
			if ($('#dPoliGinjal').length > 0) {
				$("#dPoliGinjal").sparkline([
					<?php
					$slGinjal = $this->db->query("SELECT COUNT(h.id_pelayanan) total, h.id_pelayanan
											FROM (SELECT f.tgl_masuk, f.id_pelayanan from history_pelayanan f , pelayanan k
											where k.id_pelayanan=f.id_pelayanan and k.status='1'
											and f.nama_poli='$idPoliGinjal' and f.tgl_masuk LIKE '$thn%') h
											RIGHT join
											( SELECT distinct DAY(p.tgl_masuk) aa from pelayanan p WHERE  p.tgl_masuk LIKE '$thn%' and p.status='1' ORDER by aa asc)  b 
											on b.aa=day(h.tgl_masuk)
											GROUP by b.aa ");
					$count = $slGinjal->num_rows();

					$slGinjal = $slGinjal->result_array();

					foreach ($slGinjal as $row) {
						echo  $row['total'] . ",";
					}
					?>
				], {
					type: 'line',
					width: '100%',
					height: '45',
					lineColor: '#ea8bcd',
					fillColor: 'transparent',
					maxSpotColor: '#566FC9',
					highlightLineColor: 'rgba(0, 0, 0, 0.2)',
					highlightSpotColor: '#566FC9'
				});
			}
		}
		var sparkResize;
		$(window).resize(function(e) {
			clearTimeout(sparkResize);
			sparkResize = setTimeout(sparklineLogin, 200);
		});
		sparklineLogin();

		var sparklineLogin = function() {
			if ($('#dPoliGizi').length > 0) {
				$("#dPoliGizi").sparkline([
					<?php
					$slGizi = $this->db->query("SELECT COUNT(h.id_pelayanan) total, h.id_pelayanan
											FROM (SELECT f.tgl_masuk, f.id_pelayanan from history_pelayanan f , pelayanan k
											where k.id_pelayanan=f.id_pelayanan and k.status='1'
											and f.nama_poli='$idPoliGizi' and f.tgl_masuk LIKE '$thn%') h
											RIGHT join
											( SELECT distinct DAY(p.tgl_masuk) aa from pelayanan p WHERE  p.tgl_masuk LIKE '$thn%' and p.status='1' ORDER by aa asc)  b 
											on b.aa=day(h.tgl_masuk)
											GROUP by b.aa ");
					$count = $slGizi->num_rows();

					$slGizi = $slGizi->result_array();

					foreach ($slGizi as $row) {
						echo  $row['total'] . ",";
					}
					?>
				], {
					type: 'line',
					width: '100%',
					height: '45',
					lineColor: '#ea8bcd',
					fillColor: 'transparent',
					maxSpotColor: '#566FC9',
					highlightLineColor: 'rgba(0, 0, 0, 0.2)',
					highlightSpotColor: '#566FC9'
				});
			}
		}
		var sparkResize;
		$(window).resize(function(e) {
			clearTimeout(sparkResize);
			sparkResize = setTimeout(sparklineLogin, 200);
		});
		sparklineLogin();

		var sparklineLogin = function() {
			if ($('#dPoliHd').length > 0) {
				$("#dPoliHd").sparkline([
					<?php
					$slHemo = $this->db->query("SELECT COUNT(h.id_pelayanan) total, h.id_pelayanan
											FROM (SELECT f.tgl_masuk, f.id_pelayanan from history_pelayanan f , pelayanan k
											where k.id_pelayanan=f.id_pelayanan and k.status='1'
											and f.nama_poli='$idPoliHd' and f.tgl_masuk LIKE '$thn%') h
											RIGHT join
											( SELECT distinct DAY(p.tgl_masuk) aa from pelayanan p WHERE  p.tgl_masuk LIKE '$thn%' and p.status='1' ORDER by aa asc)  b 
											on b.aa=day(h.tgl_masuk)
											GROUP by b.aa ");
					$count = $slHemo->num_rows();

					$slHemo = $slHemo->result_array();

					foreach ($slHemo as $row) {
						echo  $row['total'] . ",";
					}
					?>
				], {
					type: 'line',
					width: '100%',
					height: '45',
					lineColor: '#ea8bcd',
					fillColor: 'transparent',
					maxSpotColor: '#566FC9',
					highlightLineColor: 'rgba(0, 0, 0, 0.2)',
					highlightSpotColor: '#566FC9'
				});
			}
		}
		var sparkResize;
		$(window).resize(function(e) {
			clearTimeout(sparkResize);
			sparkResize = setTimeout(sparklineLogin, 200);
		});
		sparklineLogin();

		var sparklineLogin = function() {
			if ($('#dPoliDalam').length > 0) {
				$("#dPoliDalam").sparkline([
					<?php
					$slInternis = $this->db->query("SELECT COUNT(h.id_pelayanan) total, h.id_pelayanan
											FROM (SELECT f.tgl_masuk, f.id_pelayanan from history_pelayanan f , pelayanan k
											where k.id_pelayanan=f.id_pelayanan and k.status='1'
											and f.nama_poli='$idPoliDalam' and f.tgl_masuk LIKE '$thn%') h
											RIGHT join
											( SELECT distinct DAY(p.tgl_masuk) aa from pelayanan p WHERE  p.tgl_masuk LIKE '$thn%' and p.status='1' ORDER by aa asc)  b 
											on b.aa=day(h.tgl_masuk)
											GROUP by b.aa ");
					$count = $slInternis->num_rows();

					$slInternis = $slInternis->result_array();

					foreach ($slInternis as $row) {
						echo  $row['total'] . ",";
					}
					?>
				], {
					type: 'line',
					width: '100%',
					height: '45',
					lineColor: '#ea8bcd',
					fillColor: 'transparent',
					maxSpotColor: '#566FC9',
					highlightLineColor: 'rgba(0, 0, 0, 0.2)',
					highlightSpotColor: '#566FC9'
				});
			}
		}
		var sparkResize;
		$(window).resize(function(e) {
			clearTimeout(sparkResize);
			sparkResize = setTimeout(sparklineLogin, 200);
		});
		sparklineLogin();

		var sparklineLogin = function() {
			if ($('#dPoliJantung').length > 0) {
				$("#dPoliJantung").sparkline([
					<?php
					$slJan = $this->db->query("SELECT COUNT(h.id_pelayanan) total, h.id_pelayanan
											FROM (SELECT f.tgl_masuk, f.id_pelayanan from history_pelayanan f , pelayanan k
											where k.id_pelayanan=f.id_pelayanan and k.status='1'
											and f.nama_poli='$idPoliJantung' and f.tgl_masuk LIKE '$thn%') h
											RIGHT join
											( SELECT distinct DAY(p.tgl_masuk) aa from pelayanan p WHERE  p.tgl_masuk LIKE '$thn%' and p.status='1' ORDER by aa asc)  b 
											on b.aa=day(h.tgl_masuk)
											GROUP by b.aa ");
					$count = $slJan->num_rows();

					$slJan = $slJan->result_array();

					foreach ($slJan as $row) {
						echo  $row['total'] . ",";
					}
					?>
				], {
					type: 'line',
					width: '100%',
					height: '45',
					lineColor: '#ea8bcd',
					fillColor: 'transparent',
					maxSpotColor: '#566FC9',
					highlightLineColor: 'rgba(0, 0, 0, 0.2)',
					highlightSpotColor: '#566FC9'
				});
			}
		}
		var sparkResize;
		$(window).resize(function(e) {
			clearTimeout(sparkResize);
			sparkResize = setTimeout(sparklineLogin, 200);
		});
		sparklineLogin();

		var sparklineLogin = function() {
			if ($('#dPoliKemo').length > 0) {
				$("#dPoliKemo").sparkline([
					<?php
					$slKemo = $this->db->query("SELECT COUNT(h.id_pelayanan) total, h.id_pelayanan
											FROM (SELECT f.tgl_masuk, f.id_pelayanan from history_pelayanan f , pelayanan k
											where k.id_pelayanan=f.id_pelayanan and k.status='1'
											and f.nama_poli='$idPoliKemo' and f.tgl_masuk LIKE '$thn%') h
											RIGHT join
											( SELECT distinct DAY(p.tgl_masuk) aa from pelayanan p WHERE  p.tgl_masuk LIKE '$thn%' and p.status='1' ORDER by aa asc)  b 
											on b.aa=day(h.tgl_masuk)
											GROUP by b.aa ");
					$count = $slKemo->num_rows();

					$slKemo = $slKemo->result_array();

					foreach ($slKemo as $row) {
						echo  $row['total'] . ",";
					}
					?>
				], {
					type: 'line',
					width: '100%',
					height: '45',
					lineColor: '#ea8bcd',
					fillColor: 'transparent',
					maxSpotColor: '#566FC9',
					highlightLineColor: 'rgba(0, 0, 0, 0.2)',
					highlightSpotColor: '#566FC9'
				});
			}
		}
		var sparkResize;
		$(window).resize(function(e) {
			clearTimeout(sparkResize);
			sparkResize = setTimeout(sparklineLogin, 200);
		});
		sparklineLogin();

		var sparklineLogin = function() {
			if ($('#dPoliKesJiwa').length > 0) {
				$("#dPoliKesJiwa").sparkline([
					<?php
					$slKesJiwa = $this->db->query("SELECT COUNT(h.id_pelayanan) total, h.id_pelayanan
											FROM (SELECT f.tgl_masuk, f.id_pelayanan from history_pelayanan f , pelayanan k
											where k.id_pelayanan=f.id_pelayanan and k.status='1'
											and f.nama_poli='$idPoliKesJiwa' and f.tgl_masuk LIKE '$thn%') h
											RIGHT join
											( SELECT distinct DAY(p.tgl_masuk) aa from pelayanan p WHERE  p.tgl_masuk LIKE '$thn%' and p.status='1' ORDER by aa asc)  b 
											on b.aa=day(h.tgl_masuk)
											GROUP by b.aa ");
					$count = $slKesJiwa->num_rows();

					$slKesJiwa = $slKesJiwa->result_array();

					foreach ($slKesJiwa as $row) {
						echo  $row['total'] . ",";
					}
					?>
				], {
					type: 'line',
					width: '100%',
					height: '45',
					lineColor: '#ea8bcd',
					fillColor: 'transparent',
					maxSpotColor: '#566FC9',
					highlightLineColor: 'rgba(0, 0, 0, 0.2)',
					highlightSpotColor: '#566FC9'
				});
			}
		}
		var sparkResize;
		$(window).resize(function(e) {
			clearTimeout(sparkResize);
			sparkResize = setTimeout(sparklineLogin, 200);
		});
		sparklineLogin();

		var sparklineLogin = function() {
			if ($('#dPoliKia').length > 0) {
				$("#dPoliKia").sparkline([
					<?php
					$slKia = $this->db->query("SELECT COUNT(h.id_pelayanan) total, h.id_pelayanan
											FROM (SELECT f.tgl_masuk, f.id_pelayanan from history_pelayanan f , pelayanan k
											where k.id_pelayanan=f.id_pelayanan and k.status='1'
											and f.nama_poli='$idPoliKia' and f.tgl_masuk LIKE '$thn%') h
											RIGHT join
											( SELECT distinct DAY(p.tgl_masuk) aa from pelayanan p WHERE  p.tgl_masuk LIKE '$thn%' and p.status='1' ORDER by aa asc)  b 
											on b.aa=day(h.tgl_masuk)
											GROUP by b.aa ");
					$count = $slKia->num_rows();

					$slKia = $slKia->result_array();

					foreach ($slKia as $row) {
						echo  $row['total'] . ",";
					}
					?>
				], {
					type: 'line',
					width: '100%',
					height: '45',
					lineColor: '#ea8bcd',
					fillColor: 'transparent',
					maxSpotColor: '#566FC9',
					highlightLineColor: 'rgba(0, 0, 0, 0.2)',
					highlightSpotColor: '#566FC9'
				});
			}
		}
		var sparkResize;
		$(window).resize(function(e) {
			clearTimeout(sparkResize);
			sparkResize = setTimeout(sparklineLogin, 200);
		});
		sparklineLogin();

		var sparklineLogin = function() {
			if ($('#dPoliKulit').length > 0) {
				$("#dPoliKulit").sparkline([
					<?php
					$slKulit = $this->db->query("SELECT COUNT(h.id_pelayanan) total, h.id_pelayanan
											FROM (SELECT f.tgl_masuk, f.id_pelayanan from history_pelayanan f , pelayanan k
											where k.id_pelayanan=f.id_pelayanan and k.status='1'
											and f.nama_poli='$idPoliKulit' and f.tgl_masuk LIKE '$thn%') h
											RIGHT join
											( SELECT distinct DAY(p.tgl_masuk) aa from pelayanan p WHERE  p.tgl_masuk LIKE '$thn%' and p.status='1' ORDER by aa asc)  b 
											on b.aa=day(h.tgl_masuk)
											GROUP by b.aa ");
					$count = $slKulit->num_rows();

					$slKulit = $slKulit->result_array();

					foreach ($slKulit as $row) {
						echo  $row['total'] . ",";
					}
					?>
				], {
					type: 'line',
					width: '100%',
					height: '45',
					lineColor: '#ea8bcd',
					fillColor: 'transparent',
					maxSpotColor: '#566FC9',
					highlightLineColor: 'rgba(0, 0, 0, 0.2)',
					highlightSpotColor: '#566FC9'
				});
			}
		}
		var sparkResize;
		$(window).resize(function(e) {
			clearTimeout(sparkResize);
			sparkResize = setTimeout(sparklineLogin, 200);
		});
		sparklineLogin();

		var sparklineLogin = function() {
			if ($('#dPoliMata').length > 0) {
				$("#dPoliMata").sparkline([
					<?php
					$slMata = $this->db->query("SELECT COUNT(h.id_pelayanan) total, h.id_pelayanan
											FROM (SELECT f.tgl_masuk, f.id_pelayanan from history_pelayanan f , pelayanan k
											where k.id_pelayanan=f.id_pelayanan and k.status='1'
											and f.nama_poli='$idPoliMata' and f.tgl_masuk LIKE '$thn%') h
											RIGHT join
											( SELECT distinct DAY(p.tgl_masuk) aa from pelayanan p WHERE  p.tgl_masuk LIKE '$thn%' and p.status='1' ORDER by aa asc)  b 
											on b.aa=day(h.tgl_masuk)
											GROUP by b.aa ");
					$count = $slMata->num_rows();

					$slMata = $slMata->result_array();

					foreach ($slMata as $row) {
						echo  $row['total'] . ",";
					}
					?>
				], {
					type: 'line',
					width: '100%',
					height: '45',
					lineColor: '#ea8bcd',
					fillColor: 'transparent',
					maxSpotColor: '#566FC9',
					highlightLineColor: 'rgba(0, 0, 0, 0.2)',
					highlightSpotColor: '#566FC9'
				});
			}
		}
		var sparkResize;
		$(window).resize(function(e) {
			clearTimeout(sparkResize);
			sparkResize = setTimeout(sparklineLogin, 200);
		});
		sparklineLogin();

		var sparklineLogin = function() {
			if ($('#dPoliObgyne').length > 0) {
				$("#dPoliObgyne").sparkline([
					<?php
					$slOby = $this->db->query("SELECT COUNT(h.id_pelayanan) total, h.id_pelayanan
											FROM (SELECT f.tgl_masuk, f.id_pelayanan from history_pelayanan f , pelayanan k
											where k.id_pelayanan=f.id_pelayanan and k.status='1'
											and f.nama_poli='$idPoliObgyne' and f.tgl_masuk LIKE '$thn%') h
											RIGHT join
											( SELECT distinct DAY(p.tgl_masuk) aa from pelayanan p WHERE  p.tgl_masuk LIKE '$thn%' and p.status='1' ORDER by aa asc)  b 
											on b.aa=day(h.tgl_masuk)
											GROUP by b.aa ");
					$count = $slOby->num_rows();

					$slOby = $slOby->result_array();

					foreach ($slOby as $row) {
						echo  $row['total'] . ",";
					}
					?>
				], {
					type: 'line',
					width: '100%',
					height: '45',
					lineColor: '#ea8bcd',
					fillColor: 'transparent',
					maxSpotColor: '#566FC9',
					highlightLineColor: 'rgba(0, 0, 0, 0.2)',
					highlightSpotColor: '#566FC9'
				});
			}
		}
		var sparkResize;
		$(window).resize(function(e) {
			clearTimeout(sparkResize);
			sparkResize = setTimeout(sparklineLogin, 200);
		});
		sparklineLogin();

		var sparklineLogin = function() {
			if ($('#dPoliOrt').length > 0) {
				$("#dPoliOrt").sparkline([
					<?php
					$slOrtho = $this->db->query("SELECT COUNT(h.id_pelayanan) total, h.id_pelayanan
											FROM (SELECT f.tgl_masuk, f.id_pelayanan from history_pelayanan f , pelayanan k
											where k.id_pelayanan=f.id_pelayanan and k.status='1'
											and f.nama_poli='$idPoliOrt' and f.tgl_masuk LIKE '$thn%') h
											RIGHT join
											( SELECT distinct DAY(p.tgl_masuk) aa from pelayanan p WHERE  p.tgl_masuk LIKE '$thn%' and p.status='1' ORDER by aa asc)  b 
											on b.aa=day(h.tgl_masuk)
											GROUP by b.aa ");
					$count = $slOrtho->num_rows();

					$slOrtho = $slOrtho->result_array();

					foreach ($slOrtho as $row) {
						echo  $row['total'] . ",";
					}
					?>
				], {
					type: 'line',
					width: '100%',
					height: '45',
					lineColor: '#ea8bcd',
					fillColor: 'transparent',
					maxSpotColor: '#566FC9',
					highlightLineColor: 'rgba(0, 0, 0, 0.2)',
					highlightSpotColor: '#566FC9'
				});
			}
		}
		var sparkResize;
		$(window).resize(function(e) {
			clearTimeout(sparkResize);
			sparkResize = setTimeout(sparklineLogin, 200);
		});
		sparklineLogin();

		var sparklineLogin = function() {
			if ($('#dPoliPar').length > 0) {
				$("#dPoliPar").sparkline([
					<?php
					$slParu = $this->db->query("SELECT COUNT(h.id_pelayanan) total, h.id_pelayanan
											FROM (SELECT f.tgl_masuk, f.id_pelayanan from history_pelayanan f , pelayanan k
											where k.id_pelayanan=f.id_pelayanan and k.status='1'
											and f.nama_poli='$idPoliPar' and f.tgl_masuk LIKE '$thn%') h
											RIGHT join
											( SELECT distinct DAY(p.tgl_masuk) aa from pelayanan p WHERE  p.tgl_masuk LIKE '$thn%' and p.status='1' ORDER by aa asc)  b 
											on b.aa=day(h.tgl_masuk)
											GROUP by b.aa ");
					$count = $slParu->num_rows();

					$slParu = $slParu->result_array();

					foreach ($slParu as $row) {
						echo  $row['total'] . ",";
					}
					?>
				], {
					type: 'line',
					width: '100%',
					height: '45',
					lineColor: '#ea8bcd',
					fillColor: 'transparent',
					maxSpotColor: '#566FC9',
					highlightLineColor: 'rgba(0, 0, 0, 0.2)',
					highlightSpotColor: '#566FC9'
				});
			}
		}
		var sparkResize;
		$(window).resize(function(e) {
			clearTimeout(sparkResize);
			sparkResize = setTimeout(sparklineLogin, 200);
		});
		sparklineLogin();

		var sparklineLogin = function() {
			if ($('#dPoliPenMul').length > 0) {
				$("#dPoliPenMul").sparkline([
					<?php
					$slPenMt = $this->db->query("SELECT COUNT(h.id_pelayanan) total, h.id_pelayanan
											FROM (SELECT f.tgl_masuk, f.id_pelayanan from history_pelayanan f , pelayanan k
											where k.id_pelayanan=f.id_pelayanan and k.status='1'
											and f.nama_poli='$idPoliPenMul' and f.tgl_masuk LIKE '$thn%') h
											RIGHT join
											( SELECT distinct DAY(p.tgl_masuk) aa from pelayanan p WHERE  p.tgl_masuk LIKE '$thn%' and p.status='1' ORDER by aa asc)  b 
											on b.aa=day(h.tgl_masuk)
											GROUP by b.aa ");
					$count = $slPenMt->num_rows();

					$slPenMt = $slPenMt->result_array();

					foreach ($slPenMt as $row) {
						echo  $row['total'] . ",";
					}
					?>
				], {
					type: 'line',
					width: '100%',
					height: '45',
					lineColor: '#ea8bcd',
					fillColor: 'transparent',
					maxSpotColor: '#566FC9',
					highlightLineColor: 'rgba(0, 0, 0, 0.2)',
					highlightSpotColor: '#566FC9'
				});
			}
		}
		var sparkResize;
		$(window).resize(function(e) {
			clearTimeout(sparkResize);
			sparkResize = setTimeout(sparklineLogin, 200);
		});
		sparklineLogin();

		var sparklineLogin = function() {
			if ($('#dPoliPsi').length > 0) {
				$("#dPoliPsi").sparkline([
					<?php
					$slPsi = $this->db->query("SELECT COUNT(h.id_pelayanan) total, h.id_pelayanan
											FROM (SELECT f.tgl_masuk, f.id_pelayanan from history_pelayanan f , pelayanan k
											where k.id_pelayanan=f.id_pelayanan and k.status='1'
											and f.nama_poli='$idPoliPsi' and f.tgl_masuk LIKE '$thn%') h
											RIGHT join
											( SELECT distinct DAY(p.tgl_masuk) aa from pelayanan p WHERE  p.tgl_masuk LIKE '$thn%' and p.status='1' ORDER by aa asc)  b 
											on b.aa=day(h.tgl_masuk)
											GROUP by b.aa ");
					$count = $slPsi->num_rows();

					$slPsi = $slPsi->result_array();

					foreach ($slPsi as $row) {
						echo  $row['total'] . ",";
					}
					?>
				], {
					type: 'line',
					width: '100%',
					height: '45',
					lineColor: '#ea8bcd',
					fillColor: 'transparent',
					maxSpotColor: '#566FC9',
					highlightLineColor: 'rgba(0, 0, 0, 0.2)',
					highlightSpotColor: '#566FC9'
				});
			}
		}
		var sparkResize;
		$(window).resize(function(e) {
			clearTimeout(sparkResize);
			sparkResize = setTimeout(sparklineLogin, 200);
		});
		sparklineLogin();

		var sparklineLogin = function() {
			if ($('#dPoliRehab').length > 0) {
				$("#dPoliRehab").sparkline([
					<?php
					$slRehab = $this->db->query("SELECT COUNT(h.id_pelayanan) total, h.id_pelayanan
											FROM (SELECT f.tgl_masuk, f.id_pelayanan from history_pelayanan f , pelayanan k
											where k.id_pelayanan=f.id_pelayanan and k.status='1'
											and f.nama_poli='$idPoliRehab' and f.tgl_masuk LIKE '$thn%') h
											RIGHT join
											( SELECT distinct DAY(p.tgl_masuk) aa from pelayanan p WHERE  p.tgl_masuk LIKE '$thn%' and p.status='1' ORDER by aa asc)  b 
											on b.aa=day(h.tgl_masuk)
											GROUP by b.aa ");
					$count = $slRehab->num_rows();

					$slRehab = $slRehab->result_array();

					foreach ($slRehab as $row) {
						echo  $row['total'] . ",";
					}
					?>
				], {
					type: 'line',
					width: '100%',
					height: '45',
					lineColor: '#ea8bcd',
					fillColor: 'transparent',
					maxSpotColor: '#566FC9',
					highlightLineColor: 'rgba(0, 0, 0, 0.2)',
					highlightSpotColor: '#566FC9'
				});
			}
		}
		var sparkResize;
		$(window).resize(function(e) {
			clearTimeout(sparkResize);
			sparkResize = setTimeout(sparklineLogin, 200);
		});
		sparklineLogin();

		var sparklineLogin = function() {
			if ($('#dPoliSaraf').length > 0) {
				$("#dPoliSaraf").sparkline([
					<?php
					$slSaraf = $this->db->query("SELECT COUNT(h.id_pelayanan) total, h.id_pelayanan
											FROM (SELECT f.tgl_masuk, f.id_pelayanan from history_pelayanan f , pelayanan k
											where k.id_pelayanan=f.id_pelayanan and k.status='1'
											and f.nama_poli='$idPoliSaraf' and f.tgl_masuk LIKE '$thn%') h
											RIGHT join
											( SELECT distinct DAY(p.tgl_masuk) aa from pelayanan p WHERE  p.tgl_masuk LIKE '$thn%' and p.status='1' ORDER by aa asc)  b 
											on b.aa=day(h.tgl_masuk)
											GROUP by b.aa ");
					$count = $slSaraf->num_rows();

					$slSaraf = $slSaraf->result_array();

					foreach ($slSaraf as $row) {
						echo  $row['total'] . ",";
					}
					?>
				], {
					type: 'line',
					width: '100%',
					height: '45',
					lineColor: '#ea8bcd',
					fillColor: 'transparent',
					maxSpotColor: '#566FC9',
					highlightLineColor: 'rgba(0, 0, 0, 0.2)',
					highlightSpotColor: '#566FC9'
				});
			}
		}
		var sparkResize;
		$(window).resize(function(e) {
			clearTimeout(sparkResize);
			sparkResize = setTimeout(sparklineLogin, 200);
		});
		sparklineLogin();

		var sparklineLogin = function() {
			if ($('#dPoliStif').length > 0) {
				$("#dPoliStif").sparkline([
					<?php
					$slStifin = $this->db->query("SELECT COUNT(h.id_pelayanan) total, h.id_pelayanan
											FROM (SELECT f.tgl_masuk, f.id_pelayanan from history_pelayanan f , pelayanan k
											where k.id_pelayanan=f.id_pelayanan and k.status='1'
											and f.nama_poli='$idPoliStif' and f.tgl_masuk LIKE '$thn%') h
											RIGHT join
											( SELECT distinct DAY(p.tgl_masuk) aa from pelayanan p WHERE  p.tgl_masuk LIKE '$thn%' and p.status='1' ORDER by aa asc)  b 
											on b.aa=day(h.tgl_masuk)
											GROUP by b.aa ");
					$count = $slStifin->num_rows();

					$slStifin = $slStifin->result_array();

					foreach ($slStifin as $row) {
						echo  $row['total'] . ",";
					}
					?>
				], {
					type: 'line',
					width: '100%',
					height: '45',
					lineColor: '#ea8bcd',
					fillColor: 'transparent',
					maxSpotColor: '#566FC9',
					highlightLineColor: 'rgba(0, 0, 0, 0.2)',
					highlightSpotColor: '#566FC9'
				});
			}
		}
		var sparkResize;
		$(window).resize(function(e) {
			clearTimeout(sparkResize);
			sparkResize = setTimeout(sparklineLogin, 200);
		});
		sparklineLogin();

		var sparklineLogin = function() {
			if ($('#dPoliTerWic').length > 0) {
				$("#dPoliTerWic").sparkline([
					<?php
					$slTerwi = $this->db->query("SELECT COUNT(h.id_pelayanan) total, h.id_pelayanan
											FROM (SELECT f.tgl_masuk, f.id_pelayanan from history_pelayanan f , pelayanan k
											where k.id_pelayanan=f.id_pelayanan and k.status='1'
											and f.nama_poli='$idPoliTerWic' and f.tgl_masuk LIKE '$thn%') h
											RIGHT join
											( SELECT distinct DAY(p.tgl_masuk) aa from pelayanan p WHERE  p.tgl_masuk LIKE '$thn%' and p.status='1' ORDER by aa asc)  b 
											on b.aa=day(h.tgl_masuk)
											GROUP by b.aa ");
					$count = $slTerwi->num_rows();

					$slTerwi = $slTerwi->result_array();

					foreach ($slTerwi as $row) {
						echo  $row['total'] . ",";
					}
					?>
				], {
					type: 'line',
					width: '100%',
					height: '45',
					lineColor: '#ea8bcd',
					fillColor: 'transparent',
					maxSpotColor: '#566FC9',
					highlightLineColor: 'rgba(0, 0, 0, 0.2)',
					highlightSpotColor: '#566FC9'
				});
			}
		}
		var sparkResize;
		$(window).resize(function(e) {
			clearTimeout(sparkResize);
			sparkResize = setTimeout(sparklineLogin, 200);
		});
		sparklineLogin();

		var sparklineLogin = function() {
			if ($('#dPoliTht').length > 0) {
				$("#dPoliTht").sparkline([
					<?php
					$slTht = $this->db->query("SELECT COUNT(h.id_pelayanan) total, h.id_pelayanan
											FROM (SELECT f.tgl_masuk, f.id_pelayanan from history_pelayanan f , pelayanan k
											where k.id_pelayanan=f.id_pelayanan and k.status='1'
											and f.nama_poli='$idPoliTht' and f.tgl_masuk LIKE '$thn%') h
											RIGHT join
											( SELECT distinct DAY(p.tgl_masuk) aa from pelayanan p WHERE  p.tgl_masuk LIKE '$thn%' and p.status='1' ORDER by aa asc)  b 
											on b.aa=day(h.tgl_masuk)
											GROUP by b.aa ");
					$count = $slTht->num_rows();

					$slTht = $slTht->result_array();

					foreach ($slTht as $row) {
						echo  $row['total'] . ",";
					}
					?>
				], {
					type: 'line',
					width: '100%',
					height: '45',
					lineColor: '#ea8bcd',
					fillColor: 'transparent',
					maxSpotColor: '#566FC9',
					highlightLineColor: 'rgba(0, 0, 0, 0.2)',
					highlightSpotColor: '#566FC9'
				});
			}
		}
		var sparkResize;
		$(window).resize(function(e) {
			clearTimeout(sparkResize);
			sparkResize = setTimeout(sparklineLogin, 200);
		});
		sparklineLogin();

		var sparklineLogin = function() {
			if ($('#dPoliUmum').length > 0) {
				$("#dPoliUmum").sparkline([
					<?php
					$slUmum = $this->db->query("SELECT COUNT(h.id_pelayanan) total, h.id_pelayanan
											FROM (SELECT f.tgl_masuk, f.id_pelayanan from history_pelayanan f , pelayanan k
											where k.id_pelayanan=f.id_pelayanan and k.status='1'
											and f.nama_poli='$idPoliUmum' and f.tgl_masuk LIKE '$thn%') h
											RIGHT join
											( SELECT distinct DAY(p.tgl_masuk) aa from pelayanan p WHERE  p.tgl_masuk LIKE '$thn%' and p.status='1' ORDER by aa asc)  b 
											on b.aa=day(h.tgl_masuk)
											GROUP by b.aa ");
					$count = $slUmum->num_rows();

					$slUmum = $slUmum->result_array();

					foreach ($slUmum as $row) {
						echo  $row['total'] . ",";
					}
					?>
				], {
					type: 'line',
					width: '100%',
					height: '45',
					lineColor: '#ea8bcd',
					fillColor: 'transparent',
					maxSpotColor: '#566FC9',
					highlightLineColor: 'rgba(0, 0, 0, 0.2)',
					highlightSpotColor: '#566FC9'
				});
			}
		}
		var sparkResize;
		$(window).resize(function(e) {
			clearTimeout(sparkResize);
			sparkResize = setTimeout(sparklineLogin, 200);
		});
		sparklineLogin();

		var sparklineLogin = function() {
			if ($('#dPoliUro').length > 0) {
				$("#dPoliUro").sparkline([
					<?php
					$slUro = $this->db->query("SELECT COUNT(h.id_pelayanan) total, h.id_pelayanan
											FROM (SELECT f.tgl_masuk, f.id_pelayanan from history_pelayanan f , pelayanan k
											where k.id_pelayanan=f.id_pelayanan and k.status='1'
											and f.nama_poli='$idPoliUro' and f.tgl_masuk LIKE '$thn%') h
											RIGHT join
											( SELECT distinct DAY(p.tgl_masuk) aa from pelayanan p WHERE  p.tgl_masuk LIKE '$thn%' and p.status='1' ORDER by aa asc)  b 
											on b.aa=day(h.tgl_masuk)
											GROUP by b.aa ");
					$count = $slUro->num_rows();

					$slUro = $slUro->result_array();

					foreach ($slUro as $row) {
						echo  $row['total'] . ",";
					}
					?>
				], {
					type: 'line',
					width: '100%',
					height: '45',
					lineColor: '#ea8bcd',
					fillColor: 'transparent',
					maxSpotColor: '#566FC9',
					highlightLineColor: 'rgba(0, 0, 0, 0.2)',
					highlightSpotColor: '#566FC9'
				});
			}
		}
		var sparkResize;
		$(window).resize(function(e) {
			clearTimeout(sparkResize);
			sparkResize = setTimeout(sparklineLogin, 200);
		});
		sparklineLogin();
	</script>