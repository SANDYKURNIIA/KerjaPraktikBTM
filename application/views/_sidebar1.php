<?php
$data = $this->session->userdata('data_auth');
$datatipe = $data->tipe;
$status = $data->status;
$izinAkses = $data->izin_akses;
?>

<!-- Left Sidebar Menu -->

<div class="fixed-sidebar-left">

	<ul class="nav navbar-nav side-nav nicescroll-bar">

		<?php if ($datatipe == 'rekam medis' && $status == 'aktif') { ?>

			<li>
				<a href="<?= base_url('Pencarian_pasien') ?>"><i class="icon-magnifier mr-10"></i>PENCARIAN PASIEN</a>
			</li>
			<li>
				<a href="<?= base_url('Pelayanan_masuk') ?>"><i class="icon-docs mr-10"></i>PELAYANAN MASUK</a>
			</li>

			<li>
				<a style="cursor:pointer;" data-toggle="collapse" data-target="#dashboard_dr"><i class="icon-people mr-10"></i>PASIEN <span class="pull-right"><span class="label label-success mr-10">2</span><i class="fa fa-fw fa-angle-down"></i></span></a>
				<ul id="dashboard_dr" class="collapse collapse-level-1">
					<li>
						<a href="<?= base_url('Pasien/Pasien_Igd') ?>">IGD</a>
					</li>
					<li>
						<a href="<?= base_url('Pasien/Pasien_rajal') ?>">POLI</a>
					</li>
					<li>
						<a href="<?= base_url('Pasien/Pasien_ranap') ?>">RAWAT INAP</a>
					</li>
					<li>
						<a href="<?= base_url('Pasien/Pasien_apm') ?>">ANJUNGAN PENDAFTARAN MANDIRI(APM)</a>
					</li>
				</ul>
			</li>
			<li>
				<a data-toggle="collapse" style="cursor:pointer;" data-target="#ui_dr"><i class="icon-user-following mr-10"></i>PASIEN ONLINE<span class="pull-right"><span class="label label-success mr-10">3</span><i class="fa fa-fw fa-angle-down"></i></span></a>
				<ul id="ui_dr" class="collapse collapse-level-1">
					<li>
						<a href="<?= base_url('Pasien_online/Pendaftaran_akun'); ?>">PENDAFTARAN AKUN</a>
					</li>
					<li>
						<a href="<?= base_url('Pasien_online/Konfirmasi_kehadiran'); ?>">KONFIRMASI KEHADIRAN</a>
					</li>
					<li>
						<a href="<?= base_url('Pasien_online/Poli_online'); ?>">POLI ONLINE</a>
					</li>

				</ul>
			</li>

			<li>
				<a href="<?= base_url('Assembling'); ?>"><i class="icon-docs mr-10"></i>ASSEMBLING</a>
			</li>

			<li>
				<a class="klik_menu" id="tambahan" href="<?= base_url('Casemix/Erm') ?>"><i class="icon-note mr-10 "></i>LAPORAN ERM</a>
			</li>


			<li>
				<a style="cursor:pointer;" data-toggle="collapse" data-target="#chart_dr"><i class="icon-graph mr-10"></i>LAPORAN<span class="pull-right"><span class="label label-success mr-10">4</span><i class="fa fa-fw fa-angle-down"></i></span></a>
				<ul id="chart_dr" class="collapse collapse-level-1">
					<li>
						<a href="<?= base_url('Laporan') ?>">LAPORAN PELAYANAN RAJAL</a>
					</li>
					<li>
						<a href="<?= base_url('Laporan/kunjungan'); ?>">LAPORAN KUNJUNGAN</a>
					</li>
					<li>
						<a href="<?= base_url('Laporan/pt'); ?>">LAPORAN PENYAKIT TERTINGGI</a>
					</li>
					<li>
						<a href="<?= base_url('Laporan/bor'); ?>">LAPORAN BOR</a>
					</li>


				</ul>
			</li>

			<li>
				<a href="<?= base_url('Antrian_poli') ?>"><i class="icon-hourglass mr-10"></i>ANTRIAN POLI</a>
			</li>
			<li>
				<a href="<?= base_url('Admin_kamar') ?>"><i class="fa fa-bed mr-10"></i>ADMIN KAMAR</a>
			</li>
		<?php } elseif (($datatipe == 'poliinternis' || $datatipe == 'poliobgyne' || $datatipe == 'politht' || $datatipe === 'polimata' || $datatipe == 'polikulit' || $datatipe == 'poliumum' || $datatipe == 'polianak' || $datatipe == 'poligigi' || $datatipe == 'polijantung' || $datatipe == 'polibedah' || $datatipe == 'polifisio' || $datatipe == 'polipsikolog') && $status = 'aktif') {
			if ($datatipe == 'poliinternis') {
				$nama = "INTERNIS";
			} elseif ($datatipe == 'poliobgyne') {
				$nama = "OBGYN";
			} elseif ($datatipe == 'politht') {
				$nama = "THT";
			} elseif ($datatipe == 'polimata') {
				$nama = "MATA";
			} elseif ($datatipe == 'polikulit') {
				$nama = "KULIT";
			} elseif ($datatipe == 'poliumum') {
				$nama = "UMUM";
			} elseif ($datatipe == 'polianak') {
				$nama = "ANAK";
			} elseif ($datatipe == 'poligigi') {
				$nama = "GIGI";
			} elseif ($datatipe == 'polijantung') {
				$nama = "JANTUNG";
			} elseif ($datatipe == 'polibedah') {
				$nama = "BEDAH";
			} elseif ($datatipe == 'polifisio') {
				$nama = "FISIO";
			} elseif ($datatipe == 'polipsikolog') {
				$nama = "PSIKOLOG";
			}
		?>
			<li>
				<a href="<?= base_url('Poli') ?>"><i class="icon-hourglass mr-10"></i>PASIEN POLI <?= $nama; ?></a>
			</li>
			<li>
				<a href="<?= base_url('Apelkes/Labor_poli_pulang') ?>"><i class="icon-hourglass mr-10"></i>PASIEN LABOR POLI</a>
			</li>
			<li>
				<a class="klik_menu" id="tambahan" href="<?= base_url('Rawatinap/Erm') ?>"><i class="icon-note mr-10 "></i>ERM</a>
			</li>
			<li>
				<a class="klik_menu" id="tambahan" href="<?= base_url('poli/Erm_igd') ?>"><i class="icon-note mr-10 "></i>RIWAYAT ERM</a>
			</li>

			<li>
				<a data-toggle="collapse" data-target="#dashboard_dr"><i class="icon-drawar mr-10"></i>ANTRIAN PASIEN <span class="pull-right"><span class="label label-success mr-10"></span><i class="fa fa-fw fa-angle-down"></i></span></a>
				<ul id="dashboard_dr" class="collapse collapse-level-1">
					<li>
						<a href="<?= base_url('Poli/antrian_poli'); ?>"><i class="icon-drawar mr-10 "></i>ANTRIAN</a>
					</li>
				</ul>
			</li>


		<?php } elseif ($datatipe == 'igd' && $status == 'aktif') { ?>
			<!-- IGD -->
			<li>
				<a href="<?= base_url('IGD') ?>"><i class="fa fa-ambulance mr-10"></i>PASIEN IGD &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
			</li>
			<li>
				<a href="<?= base_url('IGD/Laporan_igd') ?>"><i class="fa fa-ambulance mr-10"></i>LAPORAN KUNJUNG UGD &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
			</li>

		<?php } elseif ($datatipe == 'gizi') { ?>
			<!-- IGD -->
			<li>
				<a href="<?= base_url('gizi/data_gizi') ?>"><i class="ti-pulse mr-10"></i>PASIEN RAWAT INAP</a>
			</li>
			<li>
				<a class="klik_menu" id="ranap" href="<?= base_url('Kasir/Pasien_ranap') ?>"><i class="icon-drawar mr-10 "></i>PASIEN RANAP</a>
			</li>
			<li>
				<a href="<?= base_url('gizi/data_gizi_sarapan') ?>"><i class="fa fa-coffee mr-10"></i>PASIEN RAWAT INAP
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SARAPAN</a>
			</li>
			<li>
				<a href="<?= base_url('Permintaan_obat') ?>"><i class="icon-hourglass mr-10"></i>PERMINTAAN OBAT</a>
			</li>

		<?php } elseif ($datatipe == 'apelkes' && $status == 'aktif') { ?>
			<!--  -->

			<!-- POLI INTERNIS -->
			<li>
				<a href="<?= base_url('Apelkes') ?>"><i class="icon-hourglass mr-10"></i>PASIEN</a>
			</li>
			<li>
				<a href="<?= base_url('Apelkes/Labor') ?>"><i class="icon-hourglass mr-10"></i>PASIEN LABOR</a>
			</li>
			<li>
				<a data-toggle="collapse" data-target="#aplekse"><i class="icon-drawar mr-10"></i>LABOR PULANG<span class="pull-right"><span class="label label-success mr-10"></span><i class="fa fa-fw fa-angle-down"></i></span></a>
				<ul id="aplekse" class="collapse collapse-level-1">
					<li>
						<a href="<?= base_url('Apelkes/Labor_pulang') ?>"><i class="icon-hourglass mr-10"></i>PASIEN LABOR RANAP</a>
					</li>
					<li>
						<a href="<?= base_url('Apelkes/Labor_ugd_pulang') ?>"><i class="icon-hourglass mr-10"></i>PASIEN LABOR IGD</a>
					</li>
					<li>
						<a href="<?= base_url('Apelkes/Labor_poli_pulang') ?>"><i class="icon-hourglass mr-10"></i>PASIEN LABOR POLI</a>
					</li>
				</ul>
			</li>

			<!--<li>
				<a href="<?= base_url('Apelkes/Riwayat_pasien') ?>"><i class="icon-hourglass mr-10"></i>RIWAYAT PASIEN</a>
			</li>-->
			<li>
				<a href="<?= base_url('Apelkes/Riwayat_pasien') ?>"><i class="icon-hourglass mr-10"></i>LAPORAN RIWAYAT PASIEN</a>
			</li>

		<?php } elseif ($datatipe == 'rawatinap' && $status == 'aktif') { ?>
			<!-- IGD -->
			<li>
				<a href="<?= base_url('Rawatinap/pasien_ranap') ?>"><i class="icon-hourglass mr-10"></i>PASIEN RAWAT
					INAP</a>
			</li>
			<li>
				<a class="klik_menu" id="tambahan" href="<?= base_url('Laporan_kunjungan_ranap') ?>"><i class="icon-note mr-10 "></i>LAPORAN KUNJUNGAN RAWAT INAP</a>
			</li>
			<li>
				<a class="klik_menu" id="tambahan" href="<?= base_url('Rawatinap/Erm') ?>"><i class="icon-note mr-10 "></i>ERM</a>
			</li>
			<li>
				<a href="<?= base_url('Permintaan_obat') ?>"><i class="icon-hourglass mr-10"></i>PERMINTAAN OBAT</a>
			</li>
		<?php } elseif ($datatipe == 'kebidanan' && $status == 'aktif') { ?>
			<!-- IGD -->
			<li>
				<a href="<?= base_url('Rawatinap/pasien_ranap') ?>"><i class="icon-hourglass mr-10"></i>PASIEN RAWAT
					INAP</a>
			</li>
			<li>
				<a class="klik_menu" id="tambahan" href="<?= base_url('Laporan_kunjungan_ranap') ?>"><i class="icon-note mr-10 "></i>LAPORAN KUNJUNGAN RAWAT INAP</a>
			</li>

			<li>
				<a class="klik_menu" id="tambahan" href="<?= base_url('Casemix/Erm') ?>"><i class="icon-note mr-10 "></i>ERM</a>
			</li>
			<li>
				<a href="<?= base_url('Permintaan_obat') ?>"><i class="icon-hourglass mr-10"></i>PERMINTAAN OBAT</a>
			</li>
		<?php } elseif ($datatipe == 'rawatinapltumum' && $status == 'aktif') { ?>
			<!-- IGD -->
			<li>
				<a href="<?= base_url('Rawatinap/pasien_ranap') ?>"><i class="icon-hourglass mr-10"></i>PASIEN RAWAT
					INAP</a>
			</li>
			<li>
				<a class="klik_menu" id="tambahan" href="<?= base_url('Laporan_kunjungan_ranap') ?>"><i class="icon-note mr-10 "></i>LAPORAN KUNJUNGAN RAWAT INAP</a>
			</li>
			<li>
				<a class="klik_menu" id="tambahan" href="<?= base_url('Casemix/Erm') ?>"><i class="icon-note mr-10 "></i>ERM</a>
			</li>
			<li>
				<a href="<?= base_url('Permintaan_obat') ?>"><i class="icon-hourglass mr-10"></i>PERMINTAAN OBAT</a>
			</li>
		<?php } elseif ($datatipe == 'retur obat' && $status == 'aktif') { ?>

			<li>
				<a href="<?= base_url('Permintaan_obat') ?>"><i class="icon-hourglass mr-10"></i>PERMINTAAN OBAT</a>
			</li>
		<?php } elseif ($datatipe == 'icu' && $status == 'aktif') { ?>
			<!-- IGD -->
			<li>
				<a href="<?= base_url('Rawatinap/pasien_ranap') ?>"><i class="icon-hourglass mr-10"></i>PASIEN RAWAT
					INAP</a>
			</li>
			<li>
				<a class="klik_menu" id="tambahan" href="<?= base_url('Casemix/Erm') ?>"><i class="icon-note mr-10 "></i>ERM</a>
			</li>
			<li>
				<a href="<?= base_url('Permintaan_obat') ?>"><i class="icon-hourglass mr-10"></i>PERMINTAAN OBAT</a>
			</li>

		<?php } elseif ($datatipe == 'vip' && $status == 'aktif') { ?>
			<!-- IGD -->
			<li>
				<a href="<?= base_url('Rawatinap/pasien_ranap') ?>"><i class="icon-hourglass mr-10"></i>PASIEN RAWAT
					INAP</a>
			</li>
			<li>
				<a class="klik_menu" id="tambahan" href="<?= base_url('Laporan_kunjungan_ranap') ?>"><i class="icon-note mr-10 "></i>LAPORAN KUNJUNGAN RAWAT INAP</a>
			</li>
			<li>
				<a class="klik_menu" id="tambahan" href="<?= base_url('Casemix/Erm') ?>"><i class="icon-note mr-10 "></i>ERM</a>
			</li>
			<li>
				<a href="<?= base_url('Permintaan_obat') ?>"><i class="icon-hourglass mr-10"></i>PERMINTAAN OBAT</a>
			</li>


		<?php } elseif ($datatipe == 'nicu' && $status == 'aktif') { ?>
			<!-- IGD -->
			<li>
				<a href="<?= base_url('Rawatinap/pasien_ranap') ?>"><i class="icon-hourglass mr-10"></i>PASIEN RAWAT
					INAP</a>
			</li>
			<li>
				<a class="klik_menu" id="tambahan" href="<?= base_url('Laporan_kunjungan_ranap') ?>"><i class="icon-note mr-10 "></i>LAPORAN KUNJUNGAN RAWAT INAP</a>
			</li>
			<li>
				<a class="klik_menu" id="tambahan" href="<?= base_url('Casemix/Erm') ?>"><i class="icon-note mr-10 "></i>ERM</a>
			</li>
			<li>
				<a href="<?= base_url('Permintaan_obat') ?>"><i class="icon-hourglass mr-10"></i>PERMINTAAN OBAT</a>
			</li>
		<?php } elseif ($datatipe == 'isolasi' && $status == 'aktif') { ?>
			<!-- IGD -->

			<li>
				<a href="<?= base_url('Permintaan_obat') ?>"><i class="icon-hourglass mr-10"></i>PERMINTAAN OBAT</a>
			</li>
		<?php } elseif ($datatipe == 'sungairaya' && $status == 'aktif') { ?>
			<!-- IGD -->

			<li>
				<a href="<?= base_url('Permintaan_obat') ?>"><i class="icon-hourglass mr-10"></i>PERMINTAAN OBAT</a>
			</li>



		<?php } elseif ($datatipe == 'radiologi' && $status == 'aktif') { ?>

			<!-- RADIOLOGI-->
			<li>
				<a data-toggle="collapse" style="cursor:pointer;" data-target="#ui_rad"><i class="icon-user-following mr-10"></i>PASIEN<span class="pull-right"><span class="label label-success mr-10">2</span><i class="fa fa-fw fa-angle-down"></i></span></a>
				<ul id="ui_rad" class="collapse collapse-level-1">
					<li>
						<a href="<?= base_url('Radiologi/Rajal') ?>"><i class="icon-user-follow mr-10 "></i>RAWAT
							JALAN/UGD</a>
					</li>
					<li>
						<a href="<?= base_url('Radiologi/Ranap') ?>"><i class="icon-user-follow mr-10 "></i>RAWAT INAP</a>
					</li>
				</ul>
			</li>

			<li>
				<a data-toggle="collapse" style="cursor:pointer;" data-target="#ui_rad-riw"><i class="icon-equalizer mr-10"></i>RIWAYAT<span class="pull-right"><span class="label label-success mr-10">1</span><i class="fa fa-fw fa-angle-down"></i></span></a>
				<ul id="ui_rad-riw" class="collapse collapse-level-1">
					<li>
						<a href=""><i class="icon-calculator mr-10 "></i>JUMLAH STOK OBAT
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;& BMHP</a>
					</li>
				</ul>
			</li>

			<li>
				<a data-toggle="collapse" style="cursor:pointer;" data-target="#ui_admin"><i class="icon-grid mr-10"></i>ADMIN<span class="pull-right"><span class="label label-success mr-10">4</span><i class="fa fa-fw fa-angle-down"></i></span></a>
				<ul id="ui_admin" class="collapse collapse-level-1">
					<li>
						<a href=""><i class="icon-social-dropbox mr-10 "></i>PERMINTAAN OBAT
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;& BMHP</a>
					</li>
					<li>
						<a href="<?= base_url('Radiologi/Laporan_radiologi') ?>"><i class="icon-chart mr-10 "></i>LAPORAN
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;RADIOLOGI</a>
					</li>
					<li>
						<a href="<?= base_url('Radiologi/Laporan_tindakan_radiologi') ?>"><i class="icon-chart mr-10 "></i>LAPORAN
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;RADIOLOGI
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TINDAKAN</a>
					</li>
					<li>
						<a href="<?= base_url('Radiologi/Riwayat_pasien') ?>"><i class="icon-drawar mr-10 "></i>RIWAYAT PASIEN</a>
					</li>

				</ul>
			</li>
			<li>
				<a href="<?= base_url('Permintaan_obat') ?>"><i class="icon-drawar mr-10"></i>PERMINTAAN OBAT</a>
			</li>


			<!--  -->

		<?php } elseif ($datatipe == 'ok' && $status == 'aktif') { ?>
			<!-- OK -->
			<li>
				<a href="<?= base_url('OK_pasien') ?>"><i class="icon-people mr-10"></i>PASIEN </a>
			</li>
			<li>
				<a class="klik_menu" id="pasienOK" href="<?= base_url('OK_laporan_dokter') ?>"><i class="icon-people mr-10 "></i>LAPORAN DOKTER</a>
			</li>
			<li>
				<a class="klik_menu" id="pasienOK" href="<?= base_url('OK_laporan_dokter/kunjungan') ?>"><i class="icon-people mr-10 "></i>LAPORAN KUNJUNGAN</a>
			</li>
			<li>
				<a href="<?= base_url('OK_pasien/riwayat') ?>"><i class="ti-bookmark-alt mr-10"></i>RIWAYAT PASIEN </a>
			</li>
			<li>
				<a href="<?= base_url('Permintaan_obat') ?>"><i class="ti-clipboard mr-10 "></i>PERMINTAAN OBAT </a>
			</li>
			<li>
				<a href="<?= base_url('stok_obat_ok') ?>"><i class="ti-package mr-10 "></i>STOCK OBAT </a>
			</li>
			<li>
				<a href=""><i class="ti-printer mr-10"></i>CETAK SO OK</a>
			</li>
		<?php } elseif ($datatipe == 'obat expire' && $status == 'aktif') { ?>

			<li>
				<a href="<?= base_url('Permintaan_obat') ?>"><i class="icon-drawar mr-10"></i>PERMINTAAN OBAT</a>
			</li>

			<!--  -->

		<?php } elseif ($datatipe == 'labor' && $status == 'aktif') { ?>

			<!-- LABOR -->
			<li>
				<a data-toggle="collapse" style="cursor:pointer;" data-target="#ui_rad"><i class="icon-user-following mr-10"></i>PASIEN<span class="pull-right"><span class="label label-success mr-10">2</span><i class="fa fa-fw fa-angle-down"></i></span></a>
				<ul id="ui_rad" class="collapse collapse-level-1">
					<li>
						<a href="<?= base_url('Labor/rajal') ?>"><i class="icon-user-follow mr-10 "></i>RAWAT
							JALAN/UGD</a>
					</li>
					<li>
						<a href="<?= base_url('Labor/ranap') ?>"><i class="icon-user-follow mr-10 "></i>RAWAT INAP</a>
					</li>
					<li>
						<a href="<?= base_url('Labor/pasienlabor') ?>"><i class="icon-size-actual mr-10 "></i>TINDAKAN LABOR &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SENDIRI</a>
					</li>
				</ul>
			</li>


			<li>
				<a href=""><i class="icon-calculator mr-10 "></i>PERMINTAAN STOK &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;OBAT &
					BMHP</a>
			</li>

			<li>
				<a data-toggle="collapse" style="cursor:pointer;" data-target="#ui_admin"><i class="icon-grid mr-10"></i>ADMIN<span class="pull-right"><span class="label label-success mr-10">3</span><i class="fa fa-fw fa-angle-down"></i></span></a>
				<ul id="ui_admin" class="collapse collapse-level-1">
					<li>
						<a href=""><i class="icon-drawar mr-10 "></i>RIWAYAT PASIEN</a>
					</li>
					<li>
						<a href=""><i class="icon-doc mr-10 "></i>LAPORAN LABOR</a>
					</li>
					<li>
						<a href=""><i class="icon-doc mr-10 "></i>LAPORAN LABOR
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TINDAKAN</a>
					</li>
				</ul>
			</li>
			<li>
				<a href="<?= base_url('Permintaan_obat') ?>"><i class="icon-drawar mr-10"></i>PERMINTAAN OBAT</a>
			</li>

			<!--  -->

			<!--logistik farmasi-->

		<?php } elseif ($datatipe == 'logistik farmasi' && $status == 'aktif') { ?>
			<li>
				<a style="cursor:pointer;" data-toggle="collapse" data-target="#dasboard_keuangan"><i class="fa fa-heartbeat mr-10"></i>OBAT<span class="pull-right"><span class="label label-success mr-10">3</span><i class="fa fa-fw fa-angle-down"></i></span></a>
				<ul id="dasboard_keuangan" class="collapse collapse-level-1">
					<li>
						<a href="<?= base_url('Pembelian_obat') ?>"></i>PEMBELIAN OBAT</a>
					</li>
					<li>
						<a href="<?= base_url('Pembelian_obat/total_faktur') ?>">TOTAL PEMBELIAN OBAT</a>
					</li>
					<li>
						<a href="<?= base_url('Po_obat') ?> ">PO OBAT</a>
					</li>
				</ul>
			</li>

			<li>
				<a style="cursor:pointer;" data-toggle="collapse" data-target="#dashboard_dr"><i class="icon-people mr-10"></i>OBAT TERSEDIA <span class="pull-right"><span class="label label-success mr-10">3</span><i class="fa fa-fw fa-angle-down"></i></span></a>
				<ul id="dashboard_dr" class="collapse collapse-level-1">
					<li>
						<a href="<?= base_url('Stok_obat') ?>">STOK OBAT</a>
					</li>
					<li>
						<a href="<?= base_url('Stok_per_ed') ?>">STOK PER ED</a>
					</li>
					<li>
						<a href="<?= base_url('PembelianObat/Riwayat') ?>">RIWAYAT PEMBELIAN</a>
					</li>
				</ul>
			</li>

			<li>
				<a href="<?= base_url('Logistik_farmasi/Riwayat_permintaan') ?>"><i class="icon-magnifier mr-10"></i>RIWAYAT PERMINTAAN OBAT</a>
			</li>
			<li>
				<a href="<?= base_url('Logistik_farmasi/Riwayat_penarikan') ?>"><i class="icon-magnifier mr-10"></i>RIWAYAT PENARIKAN OBAT</a>
			</li>



			<li>
				<a data-toggle="collapse" style="cursor:pointer;" data-target="#ui_dr"><i class="icon-drawar mr-10"></i>LAPORAN<span class="pull-right"><span class="label label-success mr-10">7</span><i class="fa fa-fw fa-angle-down"></i></span></a>
				<ul id="ui_dr" class="collapse collapse-level-1">
					<li>
						<a href="<?= base_url('Logistik_farmasi/Laporan_cetak_dp'); ?>">LAPORAN DP</a>
					</li>
					<li>
						<a href="<?= base_url('Logistik_farmasi/Laporan_mutasi'); ?>">LAPORAN MUTASI</a>
					</li>
					<li>
						<a href="<?= base_url('Logistik_farmasi/Pengeluaran_Obat'); ?>">PENGELUARAN OBAT</a>
					</li>
					<li>
						<a href="<?= base_url('Logistik_farmasi/Laporan_pembelian'); ?>">LAPORAN PEMBELIAN</a>
					</li>
					<li>
						<a href="<?= base_url('Logistik_farmasi/Laporan_aktif'); ?>">LAPORAN AKTIF</a>
					</li>
					<li>
						<a href="<?= base_url('Logistik_farmasi/Laporan_Cetak_so'); ?>">CETAK SO</a>
					</li>

					<li>
						<a href="<?= base_url('Logistik_farmasi/Laporan_po_kundur'); ?>">CETAK PEMBELIAN OBAT KUNDUR</a>
					</li>

				</ul>
			</li>

			<li>
				<a style="cursor:pointer;" data-toggle="collapse" data-target="#erm_dr"><i class="icon-drawar mr-10"></i>ADMIN<span class="pull-right"><span class="label label-success mr-10">3</span><i class="fa fa-fw fa-angle-down"></i></span></a>
				<ul id="erm_dr" class="collapse collapse-level-1">
					<li>
						<a href="<?= base_url('Po_obat/dis_obat') ?> ">DISTRIBUTOR OBAT</a>
					</li>

					<li>
						<a href="<?= base_url('Po_obat/obat') ?> ">OBAT</a>
					</li>

					<li>
						<a href="<?= base_url('Po_obat/pro_obat') ?> ">PRODUSEN OBAT</a>
					</li>



				</ul>
			</li>

			<li>
				<a data-toggle="collapse" style="cursor:pointer;" data-target="#stok"><i class="icon-drawar mr-10"></i>STOK<span class="pull-right"><span class="label label-success mr-10">2</span><i class="fa fa-fw fa-angle-down"></i></span></a>
				<ul id="stok" class="collapse collapse-level-1">
					<li>
						<a href="<?= base_url('Tambah_stok_logistik') ?> ">TAMBAH STOK LOGISTIK</a>
					</li>

					<li>
						<a href="<?= base_url('Admin_buka_permintaan') ?> ">ADMIN BUKA PERMINTAAN</a>
					</li>
				</ul>
			</li>

			<li>
				<a href="<?= base_url('Permintaan_obat') ?>"><i class="icon-drawar mr-10"></i>PERMINTAAN OBAT</a>
			</li>



			<!--end logistik farmasi-->

		<?php } elseif ($datatipe == 'mcu' && $status == 'aktif') { ?>

			<li>
				<a href="<?= base_url('mcu') ?>"><i class="fa fa-ambulance mr-10"></i>MCU</a>
			</li>
			<li>
				<a href="<?= base_url('mcu/DataMCU') ?>"><i class="icon-notebook mr-10"></i>Data MCU</a>
			</li>
			<li>
				<a href="<?= base_url('mcu/laporan_kunjungan_mcu') ?>"><i class="icon-docs mr-10"></i>Laporan Kunjungan MCU</a>
			</li>
		<?php } elseif ($datatipe == 'igdfarmasi' && $status == 'aktif') { ?>

			<li>
				<a href="<?= base_url('Permintaan_obat') ?>"><i class="icon-drawar mr-10"></i>PERMINTAAN OBAT</a>
			</li>
		<?php } elseif ($datatipe == 'igdapotik' && $status == 'aktif') { ?>

			<li>
				<a href="<?= base_url('Permintaan_obat') ?>"><i class="icon-drawar mr-10"></i>PERMINTAAN OBAT</a>
			</li>
		<?php } elseif ($datatipe == 'monev' && $status == 'aktif') { ?>

			<li>
				<a href="<?= base_url('Permintaan_obat') ?>"><i class="icon-drawar mr-10"></i>PERMINTAAN OBAT</a>
			</li>
		<?php } elseif ($datatipe == 'baksos' && $status == 'aktif') { ?>

			<li>
				<a href="<?= base_url('Permintaan_obat') ?>"><i class="icon-drawar mr-10"></i>PERMINTAAN OBAT</a>
			</li>
		<?php } elseif ($datatipe == 'Klinik Pratama Kundur' && $status == 'aktif') { ?>

			<li>
				<a href="<?= base_url('Permintaan_obat') ?>"><i class="icon-drawar mr-10"></i>PERMINTAAN OBAT</a>
			</li>
		<?php } elseif ($datatipe == 'bpjs' && $status == 'aktif') { ?>

			<li>
				<a href="<?= base_url('Permintaan_obat') ?>"><i class="icon-drawar mr-10"></i>PERMINTAAN OBAT</a>
			</li>
		<?php } elseif ($datatipe == 'logistikumum' && $status == 'aktif') { ?>

			<li>
				<a href="javascript:void(0);"><i class="icon-layers mr-10 "></i>INPUT FAKTUR</a>
			</li>

			<li>
				<a href="javascript:void(0);"><i class="ti-dropbox mr-10 "></i> STOK BARANG</a>
			</li>
			<li>
				<a href="javascript:void(0);"><i class="icon-notebook mr-10 "></i>RIWAYAT PERMINTAAN &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BARANG</a>
			</li>
			<li>
				<a data-toggle="collapse" data-target="#dashboard_drr" href="javascript:void(0);"><i class="icon-note mr-10"></i>LAPORAN <span class="pull-right"><span class="label label-success mr-10">6</span><i class="fa fa-fw fa-angle-down"></i></span></a>
				<ul id="dashboard_drr" class="collapse collapse-level-1">
					<li>
						<a href="<?= base_url('Logistik_umum/Laporan_mutasi') ?>">LAPORAN MUTASI</a>
					</li>
					<li>
						<a href="javascript:void(0);">LAPORAN PEMBELIAN</a>
					</li>
					<li>
						<a href="javascript:void(0);">DAFTAR PERMINTAAN</a>
					</li>
					<li>
						<a href="javascript:void(0);">BEBAN PERMINTAAN</a>
					</li>
					<li>
						<a href="javascript:void(0);">REKAP PEMBELIAN</a>
					</li>
					<li>
						<a href="javascript:void(0);">CETAK SO</a>
					</li>

				</ul>
			</li>
			<li>
				<a data-toggle="collapse" data-target="#dashboard_dr" href="javascript:void(0);"><i class="icon-drawar mr-10"></i>ADMIN <span class="pull-right"><span class="label label-success mr-10">4</span><i class="fa fa-fw fa-angle-down"></i></span></a>
				<ul id="dashboard_dr" class="collapse collapse-level-1">
					<li>
						<a href="<?= base_url('Logistik_umum/Daftar_vendor') ?>">DAFTAR VENDOR</a>
					</li>
					<li>
						<a href="<?= base_url('Logistik_umum/Daftar_barang') ?>">DAFTAR BARANG</a>
					</li>

					<li>
						<a href="<?= base_url('Logistik_umum/Admin_buka_permintaan') ?>">ADMIN BUKA PERMINTAAN</a>
					</li>
				</ul>
			</li>

			<!-- EDP -->

		<?php } elseif ($datatipe == 'edp' && $status == 'aktif') { ?>

			<li>
				<a href="<?= base_url('PermintaanHelpDesk_EDP') ?>"><i class="icon-drawar mr-10 "></i>PERMINTAAN HELP-DESK </a>
			</li>

			<li>
				<a href=""><i class="icon-drawar mr-10 "></i>PENJUALAN OBAT BPJS </a>
			</li>
			<li>
				<a href=""><i class="icon-drawar mr-10 "></i>PENJUALAN OBAT ASURANSI </a>
			</li>
			<li>
				<a href=""><i class="icon-drawar mr-10 "></i>PENJUALAN OBAT PRIBADI</a>
			</li>
			<li>
				<a href=""><i class="icon-drawar mr-10 "></i>ERM PASIEN RAJAL</a>
			</li>
			<li>
				<a href=""><i class="icon-drawar mr-10 "></i>REKAP HARIAN</a>
			</li>
			<li>
				<a href=""><i class="icon-drawar mr-10 "></i>HISTORY HARIAN</a>
			</li>

			<!--  -->

		<?php } elseif ($datatipe == 'rawatjalan' && $status == 'aktif') { ?>
			<!-- OK -->
			<li>
				<a href="<?= base_url('Permintaan_obat') ?>"><i class="icon-drawar mr-10 "></i>PERMINTAAN OBAT </a>
			</li>
			<li>
				<a class="klik_menu" id="tambahan" href="<?= base_url('LaporanKunjunganPoli') ?>"><i class="icon-note mr-10 "></i>LAPORAN KUNJUNGAN POLI</a>
			</li>
			<li>
				<a class="klik_menu" id="tambahan" href="<?= base_url('Laporan/Laporan_poli_ranap') ?>"><i class="icon-note mr-10 "></i>LAPORAN JUMLAH PASIEN POLI</a>
			</li>

			<li>
				<a href="<?= base_url('Antrianpoli') ?>"><i class="icon-drawar mr-10 "></i>ANTRIAN POLI </a>
			</li>
			<!--  -->
		<?php } elseif ($datatipe == 'apotik' && $status == 'aktif') { ?>
			<li>
			<li>
				<a data-toggle="collapse" data-target="#dashboard_dr" href="javascript:void(0);"><i class="icon-people mr-10"></i>PASIEN <span class="pull-right"><span class="label label-success mr-10">3</span><i class="fa fa-fw fa-angle-double-down"></i></span></a>
				<ul id="dashboard_dr" class="collapse collapse-level-1">
					<li>
						<a class="klik_menu" id="pasienjalan" href="<?= base_url('Apotik/pasien_Igd') ?>"><i class="icon-drawar mr-10 "></i>UGD </a>
					</li>
					<li>
						<a class="klik_menu" id="pasienjalan" href="<?= base_url('Apotik/pasien_rajal') ?>"><i class="icon-drawar mr-10 "></i>POLI</a>
					</li>
					<li>
						<a class="klik_menu" id="pasieninap" href="<?= base_url('Apotik/pasien_ranap') ?>"><i class="icon-drawar mr-10 "></i>RAWAT INAP </a>
					</li>
					<li>
						<a class="klik_menu" id="pasienOK" href="<?= base_url('Apotik/Riwayat_pasien') ?>"><i class="icon-drawar mr-10 "></i>RIWAYAT PASIEN </a>
					</li>
					<li>
						<a class="klik_menu" id="pasienOK" href="<?= base_url('Apotik/Obat_bebas') ?>"><i class="icon-drawar mr-10 "></i>OBAT BEBAS </a>
					</li>

				</ul>
			</li>

			<li>
				<a data-toggle="collapse" data-target="#dashboard_dr1" href="javascript:void(0);"><i class="icon-people mr-10"></i>OBAT <span class="pull-right"><span class="label label-success mr-10">3</span><i class="fa fa-fw fa-angle-double-down"></i></span></a>
				<ul id="dashboard_dr1" class="collapse collapse-level-1">
					<li>
						<a class="klik_menu" id="permintaanobat" href="<?= base_url('Permintaan_obat') ?>"><i class="icon-drawar mr-10 "></i>PERMINTAAN OBAT </a>
					</li>
					<li>
						<a class="klik_menu" id="obatOK" href="<?= base_url('Apotik/Stok_apotik') ?>"><i class="icon-drawar mr-10 "></i>STOK OBAT APOTIK </a>
					</li>
					<li>
						<a class="klik_menu" id="obatIGD" href="<?= base_url('Apotik/Stok_Igd') ?>"><i class="icon-drawar mr-10 "></i>STOK OBAT IGD </a>
					</li>
				</ul>
			</li>


			<?php
			if ($izinAkses == "admin") {
			?>
				<li>
					<a data-toggle="collapse" data-target="#dashboard_drr" href="javascript:void(0);"><i class="icon-note mr-10"></i>ADMIN <span class="pull-right"><span class="label label-success mr-10">3</span><i class="fa fa-fw fa-angle-down"></i></span></a>
					<ul id="dashboard_drr" class="collapse collapse-level-1">
						<li>
							<a class="klik_menu" id="cobaApotik" href=<?= base_url('Apotik/Tambah_stok_admin') ?>> </i>TAMBAH STOK APOTIK</a>
						</li>
					</ul>
				</li>


				<li>
					<a data-toggle="collapse" data-target="#dashboard_dr2r" href="javascript:void(0);"><i class="icon-note mr-10"></i>LAPORAN <span class="pull-right"><span class="label label-success mr-10">5</span><i class="fa fa-fw fa-angle-down"></i></span></a>
					<ul id="dashboard_dr2r" class="collapse collapse-level-1">
						<li>
							<a class="klik_menu" id="laporanObatRajal" href="<?= base_url('Apotik/Laporan_pasien_Igd') ?>"> </i>LAPORAN OBAT PASIEN IGD</a>
						</li>
						<li>
							<a class="klik_menu" id="laporanObatRajal" href="<?= base_url('Apotik/Laporan_pasien_rajal') ?>"> </i>LAPORAN OBAT PASIEN POLI</a>
						</li>
						<li>
							<a class="klik_menu" id="laporanObatRanap" href="<?= base_url('Apotik/Laporan_pasien_ranap') ?>"> </i>LAPORAN OBAT PASIEN RANAP</a>
						</li>
						<li>
							<a class="klik_menu" id="laporanPenjualanObatRajal" href="<?= base_url('Apotik/Laporan_obat_igd') ?>"> </i>LAPORAN PENJUALAN OBAT IGD</a>
						</li>
						<li>
							<a class="klik_menu" id="laporanPenjualanObatRajal" href="<?= base_url('Apotik/Laporan_obat_rajal') ?>"> </i>LAPORAN PENJUALAN OBAT POLI</a>
						</li>
						<li>
							<a class="klik_menu" id="laporanPenjualanObatRanap" href="<?= base_url('Apotik/Laporan_obat_ranap') ?>"> </i>LAPORAN PENJUALAN OBAT RANAP</a>
						</li>
						<li>
							<a class="klik_menu" id="laporanObatEd" href="<?= base_url('Apotik/Laporan_obat_ed') ?>"> </i>LAPORAN OBAT ED</a>
						</li>
						<li>
							<a class="klik_menu" id="laporanSo" href="<?= base_url('Apotik/Cetak_so_apotik') ?>"> </i>CETAK SO APOTIK</a>
						</li>
						<li>
							<a class="klik_menu" id="laporanSoI" href="<?= base_url('Apotik/Cetak_so_igd_apotik') ?>"> </i>CETAK SO IGD</a>
						</li>
						<li>
							<a class="klik_menu" id="laporanObatRajalSanbe" href="<?= base_url('Apotik/Laporan_pasien_rajal_sanbe') ?>"> </i>LAPORAN OBAT PASIEN RAJAL SANBE</a>
						</li>
						<li>
							<a class="klik_menu" id="laporanObatRanapSanbe" href="<?= base_url('Apotik/Laporan_pasien_ranap_sanbe') ?>"> </i>LAPORAN OBAT PASIEN RANAP SANBE</a>
						</li>
					</ul>
				</li>
				<li>
					<a data-toggle="collapse" data-target="#dashboard_drr33"><i class="icon-note mr-10"></i>LAPORAN OBAT KEUANGAN <span class="pull-right"><span class="label label-success mr-10">3</span><i class="fa fa-fw fa-angle-down"></i></span></a>
					<ul id="dashboard_drr33" class="collapse collapse-level-1">
						<li>
							<a class="klik_menu" id="laporanBPJS" href="<?= base_url('Apotik/Laporan_obat_bpjs') ?>"> </i>LAPORAN OBAT BPJS</a>
						</li>
						<li>
							<a class="klik_menu" id="laporanAS" href="<?= base_url('Apotik/Laporan_obat_asuransi') ?>"> </i>LAPORAN OBAT ASURANSI</a>
						</li>
						<li>
							<a class="klik_menu" id="laporanPR" href="<?= base_url('Apotik/Laporan_obat_pribadi') ?>"> </i>LAPORAN OBAT PRIBADI</a>
						</li>
					</ul>
				</li>
				<li>
					<a class="klik_menu" id="permintaanobata" href="<?= base_url('') ?>"><i class="icon-drawar mr-10 "></i>PERMINTAAN LOGISTIK UMUM </a>
				</li>
				<li>
					<a href="<?= base_url('Apotik/Antrian') ?>"><i class="icon-hourglass mr-10"></i>ANTRIAN APOTIK</a>
				</li>
			<?php } ?>
		<?php } elseif ($datatipe == 'kasir' && $status == 'aktif') { ?>
			<li>
				<a data-toggle="collapse" data-target="#dashboard_pasien"><i class="icon-user mr-10"></i>PASIEN<span class="pull-right"><span class="label label-success mr-12">3</span><i class="fa fa-fw fa-angle-down"></i></span></a>
				<ul id="dashboard_pasien" class="collapse collapse-level-1">

					<li>
						<a class="klik_menu" id="rajal" href="<?= base_url('Kasir/Pasien_rajal_ugd') ?>"><i class="icon-drawar mr-10 "></i>PASIEN UGD</a>
					</li>
					<li>
						<a class="klik_menu" id="ranap" href="<?= base_url('Kasir/Pasien_ranap') ?>"><i class="icon-drawar mr-10 "></i>PASIEN RANAP</a>
					</li>

				</ul>
			</li>
			<li>
				<a data-toggle="collapse" data-target="#dashboard_poli"><i class="icon-user mr-10"></i>PASIEN POLI<span class="pull-right"><span class="label label-success mr-12">3</span><i class="fa fa-fw fa-angle-down"></i></span></a>
				<ul id="dashboard_poli" class="collapse collapse-level-1">
					<li>
						<a class="klik_menu" id="rajal" href="<?= base_url('Kasir_poli/internis') ?>"><i class="icon-drawar mr-10 "></i>POLI INTERNIS</a>
					</li>
					<li>
						<a class="klik_menu" id="rajal" href="<?= base_url('Kasir_poli/obgyne') ?>"><i class="icon-drawar mr-10 "></i>POLI OBGYNE</a>
					</li>
					<li>
						<a class="klik_menu" id="ranap" href="<?= base_url('Kasir_poli/tht') ?>"><i class="icon-drawar mr-10 "></i>POLI THT</a>
					</li>
					<li>
						<a class="klik_menu" id="ranap" href="<?= base_url('Kasir_poli/mata') ?>"><i class="icon-drawar mr-10 "></i>POLI MATA</a>
					</li>
					<li>
						<a class="klik_menu" id="ranap" href="<?= base_url('Kasir_poli/kulit') ?>"><i class="icon-drawar mr-10 "></i>POLI KULIT / KELAMIN</a>
					</li>
					<li>
						<a class="klik_menu" id="ranap" href="<?= base_url('Kasir_poli/umum') ?>"><i class="icon-drawar mr-10 "></i>POLI UMUM</a>
					</li>
					<li>
						<a class="klik_menu" id="ranap" href="<?= base_url('Kasir_poli/anak') ?>"><i class="icon-drawar mr-10 "></i>POLI ANAK</a>
					</li>
					<li>
						<a class="klik_menu" id="ranap" href="<?= base_url('Kasir_poli/gigi') ?>"><i class="icon-drawar mr-10 "></i>POLI GIGI</a>
					</li>
					<li>
						<a class="klik_menu" id="ranap" href="<?= base_url('Kasir_poli/jantung') ?>"><i class="icon-drawar mr-10 "></i>POLI JANTUNG</a>
					</li>
					<li>
						<a class="klik_menu" id="ranap" href="<?= base_url('Kasir_poli/bedah') ?>"><i class="icon-drawar mr-10 "></i>POLI BEDAH</a>
					</li>
					<li>
						<a class="klik_menu" id="ranap" href="<?= base_url('Kasir_poli/fiso') ?>"><i class="icon-drawar mr-10 "></i>POLI FISO</a>
					</li>
					<li>
						<a class="klik_menu" id="ranap" href="<?= base_url('Kasir_poli/rehab') ?>"><i class="icon-drawar mr-10 "></i>POLI CONTROL REHABILITAS MEDIC</a>
					</li>
				</ul>
			</li>
			<li>
				<a data-toggle="collapse" data-target="#dashboard_pulang"><i class="icon-grid mr-10"></i>PASIEN PULANG<span class="pull-right"><span class="label label-success mr-12">3</span><i class="fa fa-fw fa-angle-down"></i></span></a>
				<ul id="dashboard_pulang" class="collapse collapse-level-1">
					<li>
						<a href="<?= base_url('Kasir/Pasien_pulang'); ?>"><i class="fa fa-share mr-10 "></i>PASIEN PULANG RANAP</a>
					</li>
					<li>
						<a href="<?= base_url('Kasir/Pasien_pulang_ugd'); ?>"><i class="fa fa-share mr-10 "></i>PASIEN PULANG UGD</a>
					</li>
					<li>
						<a href="<?= base_url('Kasir/Pasien_pulang_poli'); ?>"><i class="fa fa-share mr-10 "></i>PASIEN PULANG POLI</a>
					</li>
				</ul>
			</li>
			<li>
				<a data-toggle="collapse" data-target="#dashboard_pend"><i class="icon-docs mr-10"></i> PENDAPATAN TUNAI <span class="pull-right"><span class="label label-success mr-12">2</span><i class="fa fa-fw fa-angle-down"></i></span></a>
				<ul id="dashboard_pend" class="collapse collapse-level-1">
					<li>
						<a href="<?= base_url('Kasir/Pendapatan_tunai'); ?>"><i class="icon-doc mr-10 "></i>PENDAPATAN</a>
					</li>
					<li>
						<a href="<?= base_url('Kasir/Laporan_pendapatan'); ?>"><i class="icon-doc mr-10 "></i>LAPORAN PENDAPATAN</a>
					</li>
				</ul>
			</li>
			<li>
				<a class="klik_menu" id="tambahan" href="<?= base_url('Kasir/pelayanan_tambahan') ?>"><i class="icon-drawar mr-10 "></i>PELAYANAN TAMBAHAN</a>
			</li>
			<li>
				<a data-toggle="collapse" data-target="#dashboard_drrr"><i class="icon-note mr-10"></i> PENDAPATAN <span class="pull-right"><span class="label label-success mr-10">3</span><i class="fa fa-fw fa-angle-down"></i></span></a>
				<ul id="dashboard_drrr" class="collapse collapse-level-1">
					<li>
						<a href="<?= base_url('Kasir/pendapatan_tunai_kasir'); ?>"><i class="icon-layers mr-10 "></i>PENDAPATAN TUNAI KASIR</a>
					</li>
					<li>
						<a href="<?= base_url('Kasir/pendapatan_nontunai_kasir'); ?>"><i class="icon-layers mr-10 "></i>PENDAPATAN NON-TUNAI KASIR</a>
					</li>
					<li>
						<a href="<?= base_url('Kasir/pendapatan_hutang_kasir'); ?>"><i class="icon-layers mr-10 "></i>PENDAPATAN HUTANG KASIR</a>
					</li>
				</ul>
			</li>
			<?php if ($izinAkses == "admin") {
			?>
				<li>
					<a class="klik_menu" id="permintaanobat" href="<?= base_url('Kasir/pendapatan_tunai_kasir'); ?>"><i class="icon-drawar mr-10 "></i>CETAK KEMBALI</a>
				</li>
				<li>
					<a class="klik_menu" id="permintaanobat" href="javascript:void(0);"><i class="icon-drawar mr-10 "></i>PERMINTAAN LOGISTIK UMUM </a>
				</li>
			<?php } ?>
		<?php } elseif ($datatipe == 'casemix') { ?>
			<li>
				<a class="klik_menu" id="rajal" href="<?= base_url('Casemix/Pasien_rajal') ?>"><i class="icon-drawar mr-10 "></i>PASIEN RAJAL / UGD</a>
			</li>
			<li>
				<a class="klik_menu" id="ranap" href="<?= base_url('Casemix/Pasien_ranap') ?>"><i class="icon-drawar mr-10 "></i>PASIEN RANAP</a>
			</li>
			<li>
				<a class="klik_menu" id="ranap" href="<?= base_url('Casemix/control_biaya') ?>"><i class="icon-drawar mr-10 "></i>CONTROL BIAYA</a>
			</li>
			<li>
				<a class="klik_menu" id="pasien" href="<?= base_url('Casemix/assembling') ?>"><i class="icon-docs mr-10 "></i>ASSEMBLING</a>
			</li>
			<li>
				<a class="klik_menu" id="tambahan" href="<?= base_url('Casemix/monev_harian') ?>"><i class="icon-docs mr-10 "></i>MONEV HARIAN</a>
			</li>
			<li>
				<a class="klik_menu" id="tambahan" href="<?= base_url('Casemix/monev_ranap') ?>"><i class="icon-notebook mr-10 "></i>MONEV RAWAT INAP</a>
			</li>
			<li>
				<a class="klik_menu" id="tambahan" href="<?= base_url('Casemix/monev_rajal') ?>"><i class="icon-notebook mr-10 "></i>MONEV RAWAT JALAN</a>
			</li>
			<li>
				<a class="klik_menu" id="tambahan" href="<?= base_url('Casemix/klaim') ?>"><i class="icon-note mr-10 "></i>KLAIM</a>
			</li>
			<li>
				<a data-toggle="collapse" data-target="#dashboard_drr333"><i class="icon-drawar mr-10"></i>LABOR RAJAL / RANAP<span class="pull-right"><span class="label label-success mr-10"></span><i class="fa fa-fw fa-angle-down"></i></span></a>
				<ul id="dashboard_drr333" class="collapse collapse-level-1">
					<li>
						<a href="<?= base_url('Apelkes/Labor_pulang') ?>"><i class="icon-hourglass mr-10"></i>PASIEN LABOR RANAP</a>
					</li>

					<li>
						<a href="<?= base_url('Apelkes/Labor_poli_pulang') ?>"><i class="icon-hourglass mr-10"></i>PASIEN LABOR POLI</a>
					</li>
				</ul>
			</li>
			<li>
				<a class="klik_menu" id="tambahan" href="<?= base_url('Casemix/Erm') ?>"><i class="icon-note mr-10 "></i>ERM</a>
			</li>
			<li>
				<a class="klik_menu" id="tambahan" href="<?= base_url('Casemix/Laporan_keuangan') ?>"><i class="icon-note mr-10 "></i>LAPORAN</a>
			</li>
			<!-- <li>
			<a class="klik_menu" id="coba"><i class="icon-drawar mr-10 "></i>COBA</a>
		</li> -->

			<?php if ($izinAkses == "admin") {
			?>
				<li>
					<a class="klik_menu" id="permintaanobat" href="javascript:void(0);"><i class="icon-drawar mr-10 "></i>PERMINTAAN LOGISTIK UMUM </a>
				</li>
			<?php } ?>
		<?php } elseif ($datatipe == 'keuangan') { ?>

			<li>
				<a data-toggle="collapse" data-target="#dashboard_drr333"><i class="icon-drawar mr-10"></i>LABOR PULANG<span class="pull-right"><span class="label label-success mr-10"></span><i class="fa fa-fw fa-angle-down"></i></span></a>
				<ul id="dashboard_drr333" class="collapse collapse-level-1">
					<li>
						<a href="<?= base_url('Apelkes/Labor_pulang') ?>"><i class="icon-hourglass mr-10"></i>PASIEN LABOR RANAP</a>
					</li>
					<li>
						<a href="<?= base_url('Apelkes/Labor_ugd_pulang') ?>"><i class="icon-hourglass mr-10"></i>PASIEN LABOR IGD</a>
					</li>
					<li>
						<a href="<?= base_url('Apelkes/Labor_poli_pulang') ?>"><i class="icon-hourglass mr-10"></i>PASIEN LABOR POLI</a>
					</li>
				</ul>
			</li>
			<li>
				<a data-toggle="collapse" data-target="#dashboard_drr33"><i class="icon-note mr-10"></i>LAPORAN<span class="pull-right"><span class="label label-success mr-10">3</span><i class="fa fa-fw fa-angle-down"></i></span></a>
				<ul id="dashboard_drr33" class="collapse collapse-level-1">
					<li>
					<li>
						<a class="klik_menu" id="tambahan" href="<?= base_url('Casemix/Laporan_keuangan') ?>"><i class="fa fa-file mr-10 "></i>LAPORAN OBAT PASIEN RANAP</a>
					</li>
					<li>
						<a class="klik_menu" id="tambahan" href="<?= base_url('Casemix/Laporan_pasien_poli') ?>"><i class="fa fa-file mr-10 "></i>LAPORAN OBAT PASIEN POLI</a>
					</li>
					<li>
						<a class="klik_menu" id="tambahan" href="<?= base_url('Casemix/Laporan_pasien_igd') ?>"><i class="fa fa-file mr-10 "></i>LAPORAN OBAT PASIEN IGD</a>
					</li>
					<li>
						<a class="klik_menu" id="tambahan" href="<?= base_url('Casemix/Erm') ?>"><i class="icon-note mr-10 "></i>ERM</a>
					</li>

					<!-- <li>
			<a class="klik_menu" id="coba"><i class="icon-drawar mr-10 "></i>COBA</a>
		</li> -->

				<?php } else { ?>

					<?php redirect('../accounts'); ?>

				<?php } ?>

				</ul>
</div>
<!-- /Left Sidebar Menu -->