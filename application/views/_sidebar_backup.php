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
				<a href="<?= base_url('Pelayanan_masuk') ?>"><i class="icon-docs mr-10"></i>RUJUKAN INTERNAL / MASUK RAWAT INAP</a>
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
						<a href="<?= base_url('Pasien/polifisio') ?>">NON POLI</a>
					</li>
					<li>
						<a href="<?= base_url('Penunjang_RM/PasienRadiologi') ?>">RADIOLOGI</a>
					</li>
					<li>
						<a href="<?= base_url('Penunjang_RM/Pasien_labor') ?>">LABOR</a>
					</li>
					<li>
						<a href="<?= base_url('Pasien/Pasien_ranap') ?>">RAWAT INAP</a>
					</li>
					<li>
						<a href="<?= base_url('Pasien/Pasien_apm') ?>">ANJUNGAN PENDAFTARAN MANDIRI(APM)</a>
					</li>
					<li>
						<a href="<?= base_url('Pasien/Pasien_Jkn') ?>">ANTRIAN ONLINE JKN</a>
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
				<a href="<?= base_url('Jadwal_dokter/jadwal_dokter') ?>"><i class="fa fa-wpforms mr-10"></i>JADWAL DOKTER</a>
			</li>
			<li>
				<a href="<?= base_url('Assembling'); ?>"><i class="icon-docs mr-10"></i>ASSEMBLING</a>
			</li>
			<li>
				<a class="klik_menu" id="tambahan" href="<?= base_url('Casemix/Erm') ?>"><i class="icon-note mr-10 "></i>LAPORAN ERM</a>
			</li>
			<li>
				<a style="cursor:pointer;" data-toggle="collapse" data-target="#chart_dr"><i class="icon-graph mr-10"></i>ADMIN LAPORAN<span class="pull-right"><span class="label label-success mr-10"></span><i class="fa fa-fw fa-angle-down"></i></span></a>
				<ul id="chart_dr" class="collapse collapse-level-1">
					<li>
						<a class="klik_menu" id="tambahan" href="<?= base_url('Laporan/Laporan_cara_bayar') ?>">LAPORAN KUNJUNGAN POLI DAN CARA BAYAR</a>
					</li>
					<li>
						<a href="<?= base_url('Laporan/Laporan_kunjungan_igd'); ?>"><i class="fa fa-bar-chart mr-10 "></i>LAPORAN KUNJUNGAN IGD PER KLAIM</a>
					</li>
					<li>
						<a href="<?= base_url('Laporan') ?>">LAPORAN PELAYANAN </a>
					</li>
					<li>
						<a href="<?= base_url('Laporan/Laporan_pasien_batal'); ?>"><i class="icon-doc mr-10 "></i>LAPORAN PASIEN BATAL BEROBAT</a>
					</li>
					<li>
						<a class="klik_menu" id="tambahan" href="<?= base_url('Laporan/Laporan_poli_ranap') ?>"><i class="icon-note mr-10 "></i>LAPORAN JUMLAH PASIEN POLI RANAP</a>
					</li>
					<li>
						<a class="klik_menu" id="tambahan" href="<?= base_url('Laporan_kunjungan_ranap') ?>"><i class="icon-note mr-10 "></i>LAPORAN KUNJUNGAN RAWAT INAP</a>
					</li>
					<li>
						<a href="<?= base_url('Laporan/kunjungan'); ?>">LAPORAN KUNJUNGAN</a>
					</li>
				</ul>
			</li>
			<li>
				<a href="<?= base_url('Laporan/Laporan_pengadaan_obat'); ?>">OBAT FORNAS</a>
			</li>
			<li>
				<a style="cursor:pointer;" data-toggle="collapse" data-target="#rl1"><i class="icon-graph mr-10"></i>LAPORAN RL 1<span class="pull-right"><span class="label label-success mr-10"></span><i class="fa fa-fw fa-angle-down"></i></span></a>
				<ul id="rl1" class="collapse collapse-level-1">
					<li>
						<a href="<?= base_url('Laporan/Laporan_data_rs'); ?>">Data Dasar Rumah Sakit</a>
					</li>
					<li>
						<a href="<?= base_url('Laporan/bor'); ?>">INDIKATOR PELAYANAN RUMAH SAKIT</a>
					</li>
					<li>
						<a href="<?= base_url('Admin_kamar/informasi') ?>"><i class="fa fa-bed mr-10"></i>FASILITAS TEMPAT TIDUR RANAP</a>
					</li>
				</ul>
			</li>
			<li>
				<a href="<?= base_url('Laporan/Laporan_ketenagaan'); ?>"><i class="icon-docs mr-10"></i>LAPORAN RL 2 KETENAGAAN</a>
			</li>
			<li>
				<a style="cursor:pointer;" data-toggle="collapse" data-target="#rl3"><i class="icon-graph mr-10"></i>LAPORAN RL 3<span class="pull-right"><span class="label label-success mr-10"></span><i class="fa fa-fw fa-angle-down"></i></span></a>
				<ul id="rl3" class="collapse collapse-level-1">
					<li>
						<a href="<?= base_url('Laporan/laporan_kesehatan_gigi_mulut'); ?>">LAPORAN KESEHATAN GIGI MULUT</a>
					</li>
					<li>
						<a href="<?= base_url('Laporan/laporan_kesehatan_rehab_medik'); ?>">LAPORAN REHAB MEDIK DAN KES. JIWA</a>
					</li>
					<li>
						<a href="<?= base_url('Laporan/Laporan_kunjungan_rawat_darurat'); ?>">KUNJUNGAN RAWAT DARURAT</a>
					</li>
					<li>
						<a href="<?= base_url('Laporan/kebidanan'); ?>">KEGIATAN KEBIDANAN</a>
					</li>
					<li>
						<a href="<?= base_url('Laporan/perinatologi'); ?>">KEGIATAN PERINATOLOGI</a>
					</li>
					<li>
						<a href="<?= base_url('Laporan/pembedahan'); ?>">KEGIATAN PEMBEDAHAN</a>
					</li>
					<li>
						<a href="<?= base_url('Laporan/kb'); ?>">KEGIATAN KB</a>
					</li>
					<li>
						<a href="<?= base_url('Laporan/rujukan_rl'); ?>">KEGIATAN RUJUKAN</a>
					</li>
					<li>
						<a href="<?= base_url('Labor/laporan_tindakan') ?>"><i class="icon-doc mr-10 "></i>LAPORAN LABOR
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TINDAKAN</a>
					</li>
					<li>
						<a href="<?= base_url('Radiologi/Laporan_tindakan_radiologi') ?>"><i class="icon-chart mr-10 "></i>TINDAKAN RADIOLOGI </a>
					</li>
					<li>
						<a class="klik_menu" id="tambahan" href="<?= base_url('Laporan/Laporan_kunjunganbyCB') ?>">CARA BAYAR</a>
					</li>
				</ul>
			</li>
			<li>
				<a style="cursor:pointer;" data-toggle="collapse" data-target="#rl4"><i class="icon-graph mr-10"></i>LAPORAN RL 4<span class="pull-right"><span class="label label-success mr-10"></span><i class="fa fa-fw fa-angle-down"></i></span></a>
				<ul id="rl4" class="collapse collapse-level-1">
					<li>
						<a href="<?= base_url('Laporan/Laporan_morbiditas_ranap'); ?>">Data Keadaan Morbiditas Pasien Rawat Inap</a>
					</li>
					<li>
						<a href="<?= base_url('Laporan/Laporan_morbiditas_ranap'); ?>">Data Keadaan Morbiditas Pasien Rawat Inap Penyebab Kecelakaan</a>
					</li>
					<li>
						<a href="<?= base_url('Laporan/Laporan_morbiditas_ranap'); ?>">Data Keadaan Morbiditas Pasien Rawat Jalan</a>
					</li>
					<li>
						<a href="<?= base_url('Laporan/Laporan_morbiditas_ranap'); ?>">Data Keadaan Morbiditas Pasien Rawat Jalan Penyebab Kecelakaan</a>
					</li>
				</ul>
			</li>
			<li>
				<a style="cursor:pointer;" data-toggle="collapse" data-target="#rl5"><i class="icon-graph mr-10"></i>LAPORAN RL 5<span class="pull-right"><span class="label label-success mr-10"></span><i class="fa fa-fw fa-angle-down"></i></span></a>
				<ul id="rl5" class="collapse collapse-level-1">
					<li>
						<a href="<?= base_url('Laporan/Laporan_kunjungan_rajal'); ?>">KUNJUNGAN RAWAT JALAN</a>
					</li>
					<li>
						<a href="<?= base_url('Laporan/Laporan_kunjungan_rs'); ?>">KUNJUNGAN RUMAH SAKIT</a>
					</li>
					<li>
						<a href="<?= base_url('Laporan/Laporan_penyakit_tertinggi_rajal'); ?>"><i class="icon-doc mr-10 "></i>10 PENYAKIT TERTINGGI RAJAL</a>
					</li>
				</ul>
			</li>

			<!-- <li>
				<a data-toggle="collapse" style="cursor:pointer;" data-target="#pt"><i class="icon-graph mr-10"></i>LAPORAN PENYAKIT TERTINGGI<span class="pull-right"><span class="label label-success mr-10"></span><i class="fa fa-fw fa-angle-down"></i></span></a>
				<ul id="pt" class="collapse collapse-level-1">

					<li>
						<a href="<?= base_url('Laporan/pt'); ?>">LAPORAN PENYAKIT TERTINGGI RANAP</a>
					</li>
					<li>
						<a href="<?= base_url('Laporan/pt_poli'); ?>">LAPORAN PENYAKIT TERTINGGI POLI</a>
					</li>
					<li>
						<a href="<?= base_url('Laporan/pt_igd'); ?>">LAPORAN PENYAKIT TERTINGGI IGD</a>
					</li>
				</ul>
			</li> -->
			<!-- <li>
				<a href="<?= base_url('Laporan/pt_igd'); ?>">LAPORAN PENYAKIT TERTINGGI IGD</a>
			</li> -->
			<li>
				<a data-toggle="collapse" style="cursor:pointer;" data-target="#tindakanpm"><i class="icon-graph mr-10"></i>RIWAYAT ERM<span class="pull-right"><span class="label label-success mr-10"></span><i class="fa fa-fw fa-angle-down"></i></span></a>
				<ul id="tindakanpm" class="collapse collapse-level-1">
					<li>
						<a class="klik_menu" id="tambahan" href="<?= base_url('Poli/erm_igd') ?>"><i class="icon-note mr-10 "></i>RIWAYAT ERM POLI</a>
					</li>
					<li>
						<a class="klik_menu" id="tambahan" href="<?= base_url('IGD/Erm_igd') ?>"><i class="icon-note mr-10 "></i>RIWAYAT ERM IGD</a>
					</li>
					<?php if ($izinAkses == 'admin') { ?>
						<li>
							<a class="klik_menu" id="tambahan" href="<?= base_url('Casemix/Erm') ?>"><i class="icon-note mr-10 "></i>ERM</a>
						</li>
					<?php } ?>

				</ul>
			</li>
			<li>
				<a href="<?= base_url('Antrian_poli') ?>"><i class="icon-hourglass mr-10"></i>ANTRIAN POLI</a>
			</li>
			<li>
				<a href="<?= base_url('Admin_kamar') ?>"><i class="fa fa-bed mr-10"></i>ADMIN KAMAR</a>
			</li>
			<li>
				<a href="<?= base_url('Admin_kamar/informasi') ?>"><i class="fa fa-bed mr-10"></i>INFORMASI KAMAR</a>
			</li>

			<li>
				<a href="<?= base_url('Permintaan_obat_unit') ?>"><i class="icon-hourglass mr-10"></i>PERMINTAAN OBAT</a>
			</li>
			<li>
				<a href="<?= base_url('stok_obat_ok') ?>"><i class="ti-package mr-10 "></i>STOCK OBAT </a>
			</li>


		<?php } elseif (($datatipe == 'poliinternis' || $datatipe == 'poliobgyne' || $datatipe == 'politht' || $datatipe === 'polimata' || $datatipe == 'polikulit' || $datatipe == 'poliumum' || $datatipe == 'polianak' || $datatipe == 'poligigi' || $datatipe == 'polijantung' || $datatipe == 'polibedah' || $datatipe == 'rehab' || $datatipe == 'polihemodialisa' || $datatipe == 'poliakupuntur' || $datatipe == 'polibedahmulut' || $datatipe == 'polikesjiwa' || $datatipe == 'poliorthopedi' || $datatipe == 'poliparu' || $datatipe == 'polisaraf' || $datatipe == 'poliurologi' || $datatipe == 'polipenyakitmulut' || $datatipe == 'poliginjal' || $datatipe == 'polipsikolog' || $datatipe == 'poligizi'
			|| $datatipe == 'terapiwicara' || $datatipe == 'kemoterapi' || $datatipe == 'polistifin') && $status = 'aktif') {
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
			} elseif ($datatipe == 'polihemodialisa') {
				$nama = "HEMODIALISA";
			} elseif ($datatipe == 'rehab') {
				$nama = "REHAB";
			} elseif ($datatipe == 'poliakupuntur') {
				$nama = "AKUPUNTUR";
			} elseif ($datatipe == 'polibedahmulut') {
				$nama = "BEDAH MULUT";
			} elseif ($datatipe == 'polikesjiwa') {
				$nama = "KESEHATAN JIWA";
			} elseif ($datatipe == 'poliorthopedi') {
				$nama = "ORTHOPEDI";
			} elseif ($datatipe == 'poliparu') {
				$nama = "PARU";
			} elseif ($datatipe == 'polisaraf') {
				$nama = "SARAF";
			} elseif ($datatipe == 'poliurologi') {
				$nama = "UROLOGI";
			} elseif ($datatipe == 'polipenyakitmulut') {
				$nama = "PENYAKIT MULUT";
			} elseif ($datatipe == 'poliginjal') {
				$nama = "GINJAL";
			} elseif ($datatipe == 'polipsikolog') {
				$nama = "PSIKOLOG";
			} elseif ($datatipe == 'poligizi') {
				$nama = "GIZI";
			} elseif ($datatipe == 'terapiwicara') {
				$nama = "TERAPI WICARA";
			} elseif ($datatipe == 'kemoterapi') {
				$nama = "POLI KEMOTERAPI";
			} elseif ($datatipe == 'polistifin') {
				$nama = "POLI STIFIN";
			}
		?>
			<li>
				<a href="<?= base_url('Poli') ?>"><i class="icon-hourglass mr-10"></i>PASIEN POLI <?= $nama; ?></a>
			</li>
			<?php
			$dokter = $this->db->get_where('dokter', ['username' => $data->username])->result();
			if (count($dokter) > 0) { ?>
				<li>
					<a href="<?= base_url('Rawatinap/pasien_ranap_dokter') ?>"><i class="icon-hourglass mr-10"></i>PASIEN RAWAT
						INAP DPJP</a>
				</li>
			<?php } ?>
			<li>
				<a href="<?= base_url('Rawatinap/pasien_ranap') ?>"><i class="icon-hourglass mr-10"></i>PASIEN RAWAT
					INAP</a>
			</li>
			<!-- <li>
				<a href="<?= base_url('Apelkes/Labor_poli_pulang') ?>"><i class="icon-hourglass mr-10"></i>PASIEN LABOR POLI</a>
			</li> -->
			<!-- <li>
				<a class="klik_menu" id="tambahan" href="<?= base_url('Rawatinap/Erm') ?>"><i class="icon-note mr-10 "></i>ERM</a>
			</li> -->
			<li>
				<a class="klik_menu" id="tambahan" href="<?= base_url('Poli/erm_igd') ?>"><i class="icon-note mr-10 "></i>RIWAYAT ERM</a>
			</li>
			<li>
				<a class="klik_menu" id="tambahan" href="<?= base_url('IGD/Erm_igd') ?>"><i class="icon-note mr-10 "></i>RIWAYAT ERM IGD</a>
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
			<li>
				<a href="<?= base_url('Radiologi/Riwayat_pasien') ?>"><i class="icon-drawar mr-10 "></i>RIWAYAT RADIOLOGI</a>
			</li>
			<li>
				<a data-toggle="collapse" data-target="#dashboard_dr"><i class="icon-drawar mr-10"></i>ANTRIAN PASIEN <span class="pull-right"><span class="label label-success mr-10"></span><i class="fa fa-fw fa-angle-down"></i></span></a>
				<ul id="dashboard_dr" class="collapse collapse-level-1">
					<li>
						<a href="<?= base_url('Poli/antrian_poli'); ?>"><i class="icon-drawar mr-10 "></i>ANTRIAN</a>
					</li>
				</ul>
			</li>
			<?php if ($datatipe == 'polihemodialisa' || $datatipe == 'kemoterapi') { ?>
				<li>
					<a href="<?= base_url('Permintaan_obat') ?>"><i class="icon-hourglass mr-10"></i>PERMINTAAN OBAT</a>
				</li>
			<?php } ?>


		<?php } elseif ($datatipe == 'igd' || $datatipe == 'ppm' && $status == 'aktif') { ?>
			<!-- IGD -->
			<li>
				<a href="<?= base_url('IGD') ?>"><i class="fa fa-ambulance mr-10"></i>PASIEN IGD &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
			</li>
			<li>
				<a class="klik_menu" id="tambahan" href="<?= base_url('IGD/Erm_igd') ?>"><i class="icon-note mr-10 "></i>RIWAYAT ERM</a>
			</li>
			<li>
				<a href="<?= base_url('IGD/Laporan_igd') ?>"><i class="fa fa-ambulance mr-10"></i>LAPORAN KUNJUNG UGD &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
			</li>
			<li>
				<a href="<?= base_url('Laporan/Laporan_igd_ponek') ?>"><i class="fa fa-ambulance mr-10"></i>LAPORAN KUNJUNG UGD PONEK &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
			</li>
			<li>
				<a href="<?= base_url('Laporan/Laporan_triase') ?>"><i class="fa fa-ambulance mr-10"></i>LAPORAN TRIASE IGD</a>
			</li>
			<li>
				<a class="klik_menu" id="tambahan" href="<?= base_url('Laporan_kunjungan_ranap') ?>"><i class="icon-note mr-10 "></i>LAPORAN KUNJUNGAN RAWAT INAP</a>
			</li>
			<li>
				<a href="<?= base_url('Laporan/Laporan_pt_igd'); ?>"><i class="fa fa-bar-chart mr-10 "></i>LAPORAN PENYAKIT TERTINGGI IGD</a>
			</li>
			<li>
				<a href="<?= base_url('Laporan/Laporan_kunjungan_igd'); ?>"><i class="fa fa-bar-chart mr-10 "></i>LAPORAN KUNJUNGAN PER KLAIM</a>
			</li>
			<li>
				<a href="<?= base_url('IGD/Laporan_tindakan_igd'); ?>"><i class="fa fa-bar-chart mr-10 "></i>LAPORAN TINDAKAN IGD</a>
			</li>
			<li>
				<a class="klik_menu" id="obatIGD" href="<?= base_url('Apotik/Stok_Igd') ?>"><i class="icon-drawar mr-10 "></i>STOK OBAT IGD </a>
			</li>
			<?php if ($izinAkses == 'admin') { ?>
				<li>
					<a href="<?= base_url('Permintaan_obat_unit') ?>"><i class="icon-hourglass mr-10"></i>PERMINTAAN OBAT</a>
				</li>
			<?php } ?>

		<?php } elseif ($datatipe == 'gizi') { ?>
			<!-- IGD -->
			<li>
				<a href="<?= base_url('Rawatinap/pasien_ranap') ?>"><i class="icon-hourglass mr-10"></i>PASIEN RAWAT
					INAP</a>
			</li>
			<!-- <li>
				<a href="<?= base_url('gizi/data_gizi') ?>"><i class="ti-pulse mr-10"></i>PASIEN RAWAT INAP</a>
			</li>
			<li>
				<a class="klik_menu" id="ranap" href="<?= base_url('Kasir/Pasien_ranap') ?>"><i class="icon-drawar mr-10 "></i>PASIEN RANAP</a>
			</li>
			<li>
				<a href="<?= base_url('gizi/data_gizi_sarapan') ?>"><i class="fa fa-coffee mr-10"></i>PASIEN RAWAT INAP
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SARAPAN</a>
			</li> -->
			<!-- <li>
				<a href="<?= base_url('Obat_bebas') ?>"><i class="ti-package mr-10 "></i>OBAT BEBAS</a>
			</li> -->
			<li>
				<a href="<?= base_url('Permintaan_obat_unit') ?>"><i class="icon-hourglass mr-10"></i>PERMINTAAN OBAT</a>
			</li>
			<li>
				<a href="<?= base_url('stok_obat_ok') ?>"><i class="ti-package mr-10 "></i>STOCK OBAT </a>
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
				<a class="klik_menu" id="tambahan" href="<?= base_url('Rawatinap/erm_igd') ?>"><i class="icon-note mr-10 "></i>RIWAYAT ERM</a>
			</li>
			<!-- <li>
				<a href="<?= base_url('Obat_bebas') ?>"><i class="ti-package mr-10 "></i>OBAT BEBAS</a>
			</li> -->
			<li>
				<a href="<?= base_url('Permintaan_obat') ?>"><i class="icon-hourglass mr-10"></i>PERMINTAAN OBAT</a>
			</li>
			<li>
				<a href="<?= base_url('stok_obat_ok') ?>"><i class="ti-package mr-10 "></i>STOCK OBAT </a>
			</li>
			<li>
				<a href="<?= base_url('Admin_kamar') ?>"><i class="fa fa-bed mr-10"></i>ADMIN KAMAR</a>
			</li>
			<li>
				<a href="<?= base_url('Admin_kamar/informasi') ?>"><i class="fa fa-bed mr-10"></i>INFORMASI KAMAR</a>
			</li>
			<li>
				<a href="<?= base_url('OK_Pasien/antrian_operasi') ?>"><i class="icon-hourglass mr-10"></i>JADWAL ANTRIAN</a>
			</li>
			<li>
				<a href="<?= base_url('Paket_Cendrawasih') ?>"><i class="ti-package mr-10 "></i>PAKET </a>
			</li>
			<?php if ($izinAkses == 'admin') { ?>
				<li>
					<a href="<?= base_url('Apelkes') ?>"><i class="icon-hourglass mr-10"></i>BILLING PASIEN</a>
				</li>
			<?php } ?>
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
				<a class="klik_menu" id="tambahan" href="<?= base_url('Rawatinap/Erm') ?>"><i class="icon-note mr-10 "></i>ERM</a>
			</li>
			<li>
				<a class="klik_menu" id="tambahan" href="<?= base_url('Rawatinap/erm_igd') ?>"><i class="icon-note mr-10 "></i>RIWAYAT ERM</a>
			</li>
			<!-- <li>
				<a href="<?= base_url('Obat_bebas') ?>"><i class="ti-package mr-10 "></i>OBAT BEBAS</a>
			</li> -->
			<li>
				<a href="<?= base_url('Permintaan_obat_unit') ?>"><i class="icon-hourglass mr-10"></i>PERMINTAAN OBAT</a>
			</li>
			<li>
				<a href="<?= base_url('stok_obat_ok') ?>"><i class="ti-package mr-10 "></i>STOCK OBAT </a>
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
				<a class="klik_menu" id="tambahan" href="<?= base_url('Rawatinap/Erm') ?>"><i class="icon-note mr-10 "></i>ERM</a>
			</li>
			<li>
				<a class="klik_menu" id="tambahan" href="<?= base_url('Rawatinap/erm_igd') ?>"><i class="icon-note mr-10 "></i>RIWAYAT ERM</a>
			</li>
			<li>
				<a href="<?= base_url('Permintaan_obat_unit') ?>"><i class="icon-hourglass mr-10"></i>PERMINTAAN OBAT</a>
			</li>
			<li>
				<a href="<?= base_url('Admin_kamar/informasi') ?>"><i class="fa fa-bed mr-10"></i>INFORMASI KAMAR</a>
			</li>
		<?php } elseif ($datatipe == 'retur obat' && $status == 'aktif') { ?>
			<!-- <li>
				<a href="<?= base_url('Obat_bebas') ?>"><i class="ti-package mr-10 "></i>OBAT BEBAS</a>
			</li> -->
			<li>
				<a href="<?= base_url('Permintaan_obat_unit') ?>"><i class="icon-hourglass mr-10"></i>PERMINTAAN OBAT</a>
			</li>
			<li>
				<a href="<?= base_url('stok_obat_ok') ?>"><i class="ti-package mr-10 "></i>STOCK OBAT </a>
			</li>
		<?php } elseif ($datatipe == 'icu' && $status == 'aktif') { ?>
			<!-- IGD -->
			<li>
				<a href="<?= base_url('Rawatinap/pasien_ranap') ?>"><i class="icon-hourglass mr-10"></i>PASIEN RAWAT
					INAP</a>
			</li>
			<li>
				<a class="klik_menu" id="tambahan" href="<?= base_url('Rawatinap/Erm') ?>"><i class="icon-note mr-10 "></i>ERM</a>
			</li>
			<li>
				<a class="klik_menu" id="tambahan" href="<?= base_url('Rawatinap/erm_igd') ?>"><i class="icon-note mr-10 "></i>RIWAYAT ERM</a>
			</li>
			<!-- <li>
				<a href="<?= base_url('Obat_bebas') ?>"><i class="ti-package mr-10 "></i>OBAT BEBAS</a>
			</li> -->
			<li>
				<a href="<?= base_url('Permintaan_obat_unit') ?>"><i class="icon-hourglass mr-10"></i>PERMINTAAN OBAT</a>
			</li>
			<li>
				<a href="<?= base_url('stok_obat_ok') ?>"><i class="ti-package mr-10 "></i>STOCK OBAT </a>
			</li>
			<li>
				<a href="<?= base_url('Admin_kamar/informasi') ?>"><i class="fa fa-bed mr-10"></i>INFORMASI KAMAR</a>
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
				<a class="klik_menu" id="tambahan" href="<?= base_url('Rawatinap/Erm') ?>"><i class="icon-note mr-10 "></i>ERM</a>
			</li>
			<li>
				<a class="klik_menu" id="tambahan" href="<?= base_url('Rawatinap/erm_igd') ?>"><i class="icon-note mr-10 "></i>RIWAYAT ERM</a>
			</li>
			<!-- <li>
				<a href="<?= base_url('Obat_bebas') ?>"><i class="ti-package mr-10 "></i>OBAT BEBAS</a>
			</li> -->
			<li>
				<a href="<?= base_url('Permintaan_obat_unit') ?>"><i class="icon-hourglass mr-10"></i>PERMINTAAN OBAT</a>
			</li>
			<li>
				<a href="<?= base_url('stok_obat_ok') ?>"><i class="ti-package mr-10 "></i>STOCK OBAT </a>
			</li>
			<li>
				<a href="<?= base_url('Admin_kamar/informasi') ?>"><i class="fa fa-bed mr-10"></i>INFORMASI KAMAR</a>
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
				<a class="klik_menu" id="tambahan" href="<?= base_url('Rawatinap/Erm') ?>"><i class="icon-note mr-10 "></i>ERM</a>
			</li>
			<li>
				<a class="klik_menu" id="tambahan" href="<?= base_url('Rawatinap/erm_igd') ?>"><i class="icon-note mr-10 "></i>RIWAYAT ERM</a>
			</li>
			<!-- <li>
				<a href="<?= base_url('Obat_bebas') ?>"><i class="ti-package mr-10 "></i>OBAT BEBAS</a>
			</li> -->
			<li>
				<a href="<?= base_url('Permintaan_obat_unit') ?>"><i class="icon-hourglass mr-10"></i>PERMINTAAN OBAT</a>
			</li>
			<li>
				<a href="<?= base_url('stok_obat_ok') ?>"><i class="ti-package mr-10 "></i>STOCK OBAT </a>
			</li>
			<li>
				<a href="<?= base_url('Admin_kamar/informasi') ?>"><i class="fa fa-bed mr-10"></i>INFORMASI KAMAR</a>
			</li>
		<?php } elseif ($datatipe == 'isolasi' && $status == 'aktif') { ?>
			<!-- IGD -->
			<!-- <li>
				<a href="<?= base_url('Obat_bebas') ?>"><i class="ti-package mr-10 "></i>OBAT BEBAS</a>
			</li> -->
			<li>
				<a href="<?= base_url('Permintaan_obat_unit') ?>"><i class="icon-hourglass mr-10"></i>PERMINTAAN OBAT</a>
			</li>
			<li>
				<a href="<?= base_url('stok_obat_ok') ?>"><i class="ti-package mr-10 "></i>STOCK OBAT </a>
			</li>
			<li>
				<a href="<?= base_url('Admin_kamar/informasi') ?>"><i class="fa fa-bed mr-10"></i>INFORMASI KAMAR</a>
			</li>
		<?php } elseif ($datatipe == 'sungairaya' && $status == 'aktif') { ?>
			<!-- IGD -->
			<!-- <li>
				<a href="<?= base_url('Obat_bebas') ?>"><i class="ti-package mr-10 "></i>OBAT BEBAS</a>
			</li> -->
			<li>
				<a href="<?= base_url('Permintaan_obat_unit') ?>"><i class="icon-hourglass mr-10"></i>PERMINTAAN OBAT</a>
			</li>
			<li>
				<a href="<?= base_url('stok_obat_ok') ?>"><i class="ti-package mr-10 "></i>STOCK OBAT </a>
			</li>


		<?php } elseif ($datatipe == 'radiologi' && $status == 'aktif') { ?>

			<!-- RADIOLOGI-->
			<li>
				<a data-toggle="collapse" style="cursor:pointer;" data-target="#ui_rad"><i class="icon-user-following mr-10"></i>PASIEN<span class="pull-right"><span class="label label-success mr-10"></span><i class="fa fa-fw fa-angle-down"></i></span></a>
				<ul id="ui_rad" class="collapse collapse-level-1">
					<!-- <li>
						<a href="<?= base_url('Radiologi/Rajal') ?>"><i class="icon-user-follow mr-10 "></i>RAWAT
							JALAN/UGD</a>
					</li>
					<li>
						<a href="<?= base_url('Radiologi/Ranap') ?>"><i class="icon-user-follow mr-10 "></i>RAWAT INAP</a>
					</li> -->
					<li>
						<a href="<?= base_url('Radiologi/PasienMcu') ?>"><i class="icon-user-follow mr-10 "></i>PASIEN MCU</a>
					</li>
					<!-- <li>
						<a href="<?= base_url('Radiologi/PasienRadiologi') ?>"><i class="icon-user-follow mr-10 "></i>PASIEN RADIOLOGI</a>
					</li> -->
					<li>
						<a href="<?= base_url('Radiologi/Poli_prioritas') ?>"><i class="icon-user-follow mr-10 "></i>POLI PRIORITAS</a>
					</li>
					<li>
						<a href="<?= base_url('Radiologi/PasienUSG') ?>"><i class="icon-user-follow mr-10 "></i>PASIEN USG</a>
					</li>
					<li>
						<a href="<?= base_url('Radiologi/PasienCT') ?>"><i class="icon-user-follow mr-10 "></i>PASIEN CT</a>
					</li>
					<li>
						<a href="<?= base_url('Radiologi/PasienRontgen') ?>"><i class="icon-user-follow mr-10 "></i>PASIEN RONTGEN</a>
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
					<!-- <li>
						<a href="<?= base_url('Radiologi/Rajal_rw') ?>"><i class="icon-user-follow mr-10 "></i>RAWAT
							JALAN/UGD</a>
					</li>
					<li>
						<a href="<?= base_url('Radiologi/Ranap') ?>"><i class="icon-user-follow mr-10 "></i>RAWAT INAP</a>
					</li> -->
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
					<li>
						<a href="<?= base_url('Radiologi/Laporan_biaya_radiologi') ?>"><i class="icon-drawar mr-10 "></i>KEUANGAN RADIOLOGI</a>
					</li>

				</ul>
			</li>
			<!-- <li>
				<a href="<?= base_url('Obat_bebas') ?>"><i class="ti-package mr-10 "></i>OBAT BEBAS</a>
			</li> -->
			<li>
				<a href="<?= base_url('Permintaan_obat_unit') ?>"><i class="icon-drawar mr-10"></i>PERMINTAAN OBAT</a>
			</li>
			<li>
				<a href="<?= base_url('stok_obat_ok') ?>"><i class="ti-package mr-10 "></i>STOCK OBAT </a>
			</li>

			<!--  -->

		<?php } elseif ($datatipe == 'ok' && $status == 'aktif') { ?>
			<!-- OK -->
			<li>
				<a href="<?= base_url('OK_Pasien') ?>"><i class="icon-people mr-10"></i>PASIEN OK</a>
			</li>
			<li>
				<a href="<?= base_url('OK_Pasien/Poli') ?>"><i class="icon-people mr-10"></i>PASIEN POLI</a>
			</li>
			<li>
				<a href="<?= base_url('Rawatinap/pasien_ranap') ?>"><i class="icon-hourglass mr-10"></i>PASIEN RAWAT
					INAP</a>
			</li>
			<li>
				<a class="klik_menu" id="pasienOK" href="<?= base_url('OK_laporan_dokter') ?>"><i class="icon-people mr-10 "></i>LAPORAN DOKTER</a>
			</li>
			<li>
				<a class="klik_menu" id="pasienOK" href="<?= base_url('OK_laporan_dokter/kunjungan') ?>"><i class="icon-people mr-10 "></i>LAPORAN KUNJUNGAN</a>
			</li>
			<li>
				<a href="<?= base_url('OK_Pasien/antrian_operasi') ?>"><i class="icon-hourglass mr-10"></i>JADWAL ANTRIAN</a>
			</li>
			<!-- <li>
				<a href="<?= base_url('OK_Pasien/Riwayat') ?>"><i class="ti-bookmark-alt mr-10"></i>RIWAYAT PASIEN </a>
			</li> -->
			<!-- <li>
				<a href="<?= base_url('Obat_bebas') ?>"><i class="ti-package mr-10 "></i>OBAT BEBAS</a>
			</li> -->
			<li>
				<a href="<?= base_url('Permintaan_obat') ?>"><i class="ti-clipboard mr-10 "></i>PERMINTAAN OBAT </a>
			</li>
			<li>
				<a href="<?= base_url('stok_obat_ok') ?>"><i class="ti-package mr-10 "></i>STOCK OBAT </a>
			</li>
			<li>
				<a href=""><i class="ti-printer mr-10"></i>CETAK SO OK</a>
			</li>
		<?php } elseif ($datatipe == 'kamarkartu' && $status == 'aktif') { ?>
			<li>
				<a href="<?= base_url('Pasien/Pasien_rajal1') ?>"><i class="icon-user-follow mr-10 "></i>PASIEN POLI</a>
			</li>
			<li>
				<a href="<?= base_url('Pasien/Pasien_IGD1') ?>"><i class="icon-user-follow mr-10 "></i>PASIEN IGD</a>
			</li>
			<!-- kamarkartu -->



			<!-- PASIEN ALL POLI -->
		<?php } elseif ($datatipe == 'poli' && $status == 'aktif') { ?>

			<li>
				<a class="klik_menu" id="rajal" href="<?= base_url('All_Poli/internis') ?>"><i class="icon-drawar mr-10 "></i>POLI INTERNIS</a>
			</li>
			<li>
				<a class="klik_menu" id="rajal" href="<?= base_url('All_Poli/obgyne') ?>"><i class="icon-drawar mr-10 "></i>POLI OBGYNE</a>
			</li>
			<li>
				<a class="klik_menu" id="ranap" href="<?= base_url('All_Poli/tht') ?>"><i class="icon-drawar mr-10 "></i>POLI THT</a>
			</li>
			<li>
				<a class="klik_menu" id="ranap" href="<?= base_url('All_Poli/mata') ?>"><i class="icon-drawar mr-10 "></i>POLI MATA</a>
			</li>
			<li>
				<a class="klik_menu" id="ranap" href="<?= base_url('All_Poli/kulit') ?>"><i class="icon-drawar mr-10 "></i>POLI KULIT / KELAMIN</a>
			</li>
			<li>
				<a class="klik_menu" id="ranap" href="<?= base_url('All_Poli/umum') ?>"><i class="icon-drawar mr-10 "></i>POLI UMUM</a>
			</li>
			<li>
				<a class="klik_menu" id="ranap" href="<?= base_url('All_Poli/anak') ?>"><i class="icon-drawar mr-10 "></i>POLI ANAK</a>
			</li>
			<li>
				<a class="klik_menu" id="ranap" href="<?= base_url('All_Poli/gigi') ?>"><i class="icon-drawar mr-10 "></i>POLI GIGI</a>
			</li>
			<li>
				<a class="klik_menu" id="ranap" href="<?= base_url('All_Poli/jantung') ?>"><i class="icon-drawar mr-10 "></i>POLI JANTUNG</a>
			</li>
			<li>
				<a class="klik_menu" id="ranap" href="<?= base_url('All_Poli/bedah') ?>"><i class="icon-drawar mr-10 "></i>POLI BEDAH</a>
			</li>
			<li>
				<a class="klik_menu" id="ranap" href="<?= base_url('All_Poli/fisio') ?>"><i class="icon-drawar mr-10 "></i>POLI FISIO</a>
			</li>
			<li>
				<a class="klik_menu" id="ranap" href="<?= base_url('All_Poli/akupuntur') ?>"><i class="icon-drawar mr-10 "></i>POLI AKUPUNTUR</a>
			</li>
			<li>
				<a class="klik_menu" id="ranap" href="<?= base_url('All_Poli/bedahmulut') ?>"><i class="icon-drawar mr-10 "></i>POLI BEDAH MULUT</a>
			</li>
			<li>
				<a class="klik_menu" id="ranap" href="<?= base_url('All_Poli/kesjiwa') ?>"><i class="icon-drawar mr-10 "></i>POLI KESEHATAN JIWA</a>
			</li>
			<li>
				<a class="klik_menu" id="ranap" href="<?= base_url('All_Poli/orthopedi') ?>"><i class="icon-drawar mr-10 "></i>POLI ORTHOPEDI</a>
			</li>
			<li>
				<a class="klik_menu" id="ranap" href="<?= base_url('All_Poli/paru') ?>"><i class="icon-drawar mr-10 "></i>POLI PARU</a>
			</li>
			<li>
				<a class="klik_menu" id="ranap" href="<?= base_url('All_Poli/saraf') ?>"><i class="icon-drawar mr-10 "></i>POLI SARAF</a>
			</li>
			<li>
				<a class="klik_menu" id="ranap" href="<?= base_url('All_Poli/urologi') ?>"><i class="icon-drawar mr-10 "></i>POLI UROLOGI</a>
			</li>
			<li>
				<a class="klik_menu" id="ranap" href="<?= base_url('All_Poli/rehab') ?>"><i class="icon-drawar mr-10 "></i>POLI CONTROL REHABILITAS MEDIC</a>
			</li>
			<li>
				<a class="klik_menu" id="ranap" href="<?= base_url('All_Poli/labor') ?>"><i class="icon-drawar mr-10 "></i>POLI LABORATORIUM</a>
			</li>
			<li>
				<a class="klik_menu" id="ranap" href="<?= base_url('All_Poli/radiologi') ?>"><i class="icon-drawar mr-10 "></i>POLI RADIOLOGI</a>
			</li>
			<li>
				<a class="klik_menu" id="ranap" href="<?= base_url('All_Poli/anastesi') ?>"><i class="icon-drawar mr-10 "></i>POLI ANASTESI</a>
			</li>
	</ul>
	</li>
<?php } elseif ($datatipe == 'polifisio' && $status == 'aktif') { ?>

	<li>
		<a href="<?= base_url('Pasien/Pasien_Polifisio') ?>"><i class="icon-user-follow mr-10 "></i>PASIEN POLI FISIO</a>
	</li>
	<li>
		<a href="<?= base_url('Pasien/Pasien_FisioRanap') ?>"><i class="icon-user-follow mr-10 "></i>PASIEN FISIO RAWAT INAP</a>
	</li>
	<li>
		<a href="<?= base_url('Permintaan_obat_unit') ?>"><i class="icon-drawar mr-10"></i>PERMINTAAN OBAT</a>
	</li>
	<li>
		<a href="<?= base_url('Laporan/Laporan_kunjungan_fisio'); ?>"><i class="fa fa-bar-chart mr-10 "></i>LAPORAN KUNJUNGAN FISIO PER KLAIM</a>
	</li>
	<li>
		<a href="<?= base_url('Laporan/Laporan_tindakan_fisio'); ?>"><i class="fa fa-bar-chart mr-10 "></i>LAPORAN TINDAKAN FISIO</a>
	</li>
	<li>
		<a href="<?= base_url('stok_obat_ok') ?>"><i class="ti-package mr-10 "></i>STOCK OBAT </a>
	</li>
	<!-- <li>
				<a href="<?= base_url('Pasien/polirehab') ?>"><i class="icon-user-follow mr-10 "></i>Pasien Rehab</a>
			</li> -->
	<!--  Polifisio-->
<?php } elseif ($datatipe == 'obat expire' && $status == 'aktif') { ?>
	<li>
		<a href="<?= base_url('Pasien/polifisio') ?>"><i class="ti-package mr-10 "></i>OBAT BEBAS</a>
	</li>
	<li>
		<a href="<?= base_url('Permintaan_obat_unit') ?>"><i class="icon-drawar mr-10"></i>PERMINTAAN OBAT</a>
	</li>
	<li>
		<a href="<?= base_url('stok_obat_ok') ?>"><i class="ti-package mr-10 "></i>STOCK OBAT </a>
	</li>
 <?php } elseif (($datatipe == 'labor' || $datatipe == 'laboratorium') && $status == 'aktif') { ?>

	<!-- LABOR -->
	<?php if ($datatipe == 'laboratorium' || $datatipe == 'labor') { ?>
		<li>
			<a href="<?= base_url('Pencarian_pasien') ?>"><i class="icon-magnifier mr-10"></i>PASIEN BARU</a>
		</li>
		<li>
			<a href="<?= base_url('Penunjang_RM/Pasien_labor') ?>"><i class="icon-user-following mr-10"></i>PASIEN LABOR</a>
		</li>
	<?php } ?>

	<?php if ($datatipe == 'laboratorium' ) { ?>
		<li>
			<a href="<?= base_url('Penunjang_RM/PasienRadiologi') ?>">PASIEN RADIOLOGI</a>
		</li>
		<li>
			<a class="klik_menu" id="ranap" href="<?= base_url('Kasir_poli/radiologi') ?>"><i class="icon-drawar mr-10 "></i>KASIR RADIOLOGI</a>
		</li>
		<li>
			<a class="klik_menu" id="ranap" href="<?= base_url('Kasir_poli/labor') ?>"><i class="icon-drawar mr-10 "></i>KASIR LABORATORIUM</a>
		</li>
	<?php } ?>
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
				<a href="<?= base_url('Labor/mcu') ?>"><i class="icon-user-follow mr-10 "></i>MCU</a>
			</li>
			<li>
				<a href="<?= base_url('Labor/laborpasien') ?>"><i class="icon-size-actual mr-10 "></i>TINDAKAN LABOR &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SENDIRI</a>
			</li>
		</ul>
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

	<li>
		<a href=""><i class="icon-calculator mr-10 "></i>PERMINTAAN STOK &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;OBAT &
			BMHP</a>
	</li>

	<li>
		<a data-toggle="collapse" style="cursor:pointer;" data-target="#ui_admin"><i class="icon-grid mr-10"></i>ADMIN LAPORAN<span class="pull-right"><span class="label label-success mr-10">3</span><i class="fa fa-fw fa-angle-down"></i></span></a>
		<ul id="ui_admin" class="collapse collapse-level-1">
			<li>
				<a href=""><i class="icon-drawar mr-10 "></i>RIWAYAT PASIEN</a>
			</li>
			<li>
				<a href="<?= base_url('Labor/laporan_laboratorium') ?>"><i class="icon-doc mr-10 "></i>LAPORAN LABOR</a>
			</li>
			<li>
				<a href="<?= base_url('Labor/Laporan_kunjungan_labor_poli') ?>"><i class="icon-doc mr-10 "></i>LAPORAN KUNJUNGAN LABOR POLI</a>
			</li>
			<li>
				<a href="<?= base_url('Labor/Laporan_kunjungan_labor_igd') ?>"><i class="icon-doc mr-10 "></i>LAPORAN KUNJUNGAN LABOR IGD</a>
			</li>
			<li>
				<a href="<?= base_url('Labor/Laporan_kunjungan_labor_ranap') ?>"><i class="icon-doc mr-10 "></i>LAPORAN KUNJUNGAN LABOR RANAP</a>
			</li>
			<li>
				<a href="<?= base_url('Labor/laporan_tindakan') ?>"><i class="icon-doc mr-10 "></i>LAPORAN LABOR
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TINDAKAN</a>
			</li>
			<li>
				<a href="<?= base_url('Labor/laporan_pendapatan_labor') ?>"><i class="icon-doc mr-10 "></i>LAPORAN PENDAPATAN LABOR</a>
			</li>
			<li>
				<a href="<?= base_url('Labor/laporan_pasien_hiv') ?>"><i class="icon-doc mr-10 "></i>LAPORAN PASIEN HIV</a>
			</li>
			<li>
				<a href="<?= base_url('Labor/laporan_pasien_malaria') ?>"><i class="icon-doc mr-10 "></i>LAPORAN PASIEN MALARIA</a>
			</li>
			<li>
				<a href="<?= base_url('Labor/laporan_pasien_covid') ?>"><i class="icon-doc mr-10 "></i>LAPORAN PASIEN COVID</a>
			</li>
			<li>
				<a href="<?= base_url('Labor/laporan_pasien_bta') ?>"><i class="icon-doc mr-10 "></i>LAPORAN PASIEN BTA</a>
			</li>
			<li>
				<a href="<?= base_url('Labor/laporan_pasien_biopsi') ?>"><i class="icon-doc mr-10 "></i>LAPORAN PASIEN BIOPSI</a>
			</li>
		</ul>
	</li>
	<!-- <li>
		<a href="<?= base_url('Obat_bebas') ?>"><i class="ti-package mr-10 "></i>OBAT BEBAS</a>
	</li> -->
	<li>
		<a href="<?= base_url('Permintaan_obat') ?>"><i class="icon-drawar mr-10"></i>PERMINTAAN OBAT</a>
	</li>
	<li>
		<a href="<?= base_url('stok_obat_ok') ?>"><i class="ti-package mr-10 "></i>STOCK OBAT </a>
	</li>
	<!--  -->

	<!--logistik farmasi-->

<?php } elseif ($datatipe == 'logistik farmasi' && $status == 'aktif') { ?>
	<li>
		<a style="cursor:pointer;" data-toggle="collapse" data-target="#dasboard_keuangan"><i class="fa fa-heartbeat mr-10"></i>OBAT<span class="pull-right"><span class="label label-success mr-10">3</span><i class="fa fa-fw fa-angle-down"></i></span></a>
		<ul id="dasboard_keuangan" class="collapse collapse-level-1">
			<li>
				<a href="<?= base_url('Pembelian_obat') ?>"></i>PENERIMAAN OBAT</a>
			</li>
			<li>
				<a href="<?= base_url('Pembelian_obat/total_faktur') ?>">TOTAL PEMBELIAN OBAT</a>
			</li>
			<li>
				<a href="<?= base_url('Po_obat') ?> ">PO OBAT</a>
			</li>

			<!-- <li>
				<a href="<?= base_url('Permintaan_pembelian') ?>"></i>PERMINTAAN PEMBELIAN (PR)</a>
			</li> -->
			<?php if ($izinAkses == 'admin') { ?>
				<li>
					<a href="<?= base_url('Perencanaan_obat/approve') ?>"></i>APPROVE PERENCANAAN</a>
				</li>
			<?php } ?>
			<li>
				<a href="<?= base_url('Perencanaan_obat') ?>"></i>PERENCANAAN</a>
			</li>

			<li>
				<a href="<?= base_url('Usulan_perencanaan') ?>"></i>USULAN</a>
			</li>

		</ul>
	</li>
	<li>
		<a style="cursor:pointer;" data-toggle="collapse" data-target="#dasboard_"><i class="fa fa-heartbeat mr-10"></i>OBAT PEBAL<span class="pull-right"><span class="label label-success mr-10">3</span><i class="fa fa-fw fa-angle-down"></i></span></a>
		<ul id="dasboard_" class="collapse collapse-level-1">
			<li>
				<a href="<?= base_url('Pembelian_obat_bebas') ?>"></i>PENERIMAAN OBAT</a>
			</li>
			<li>
				<a href="<?= base_url('Pembelian_obat_bebas/total_faktur') ?>">TOTAL PEMBELIAN OBAT</a>
			</li>

		</ul>
	</li>
	<li>
		<a style="cursor:pointer;" data-toggle="collapse" data-target="#dasboard_oh"><i class="fa fa-heartbeat mr-10"></i>OBAT HIBAH<span class="pull-right"><span class="label label-success mr-10">3</span><i class="fa fa-fw fa-angle-down"></i></span></a>
		<ul id="dasboard_oh" class="collapse collapse-level-1">
			<li>
				<a href="<?= base_url('Obat_hibah') ?>"></i>PENERIMAAN OBAT</a>
			</li>
			<li>
				<a href="<?= base_url('Pembelian_obat_bebas/total_faktur') ?>">TOTAL PEMBELIAN OBAT</a>
			</li>

		</ul>
	</li>
	<li>
		<a style="cursor:pointer;" data-toggle="collapse" data-target="#dashboard_dr"><i class="icon-people mr-10"></i>OBAT TERSEDIA <span class="pull-right"><span class="label label-success mr-10">3</span><i class="fa fa-fw fa-angle-down"></i></span></a>
		<ul id="dashboard_dr" class="collapse collapse-level-1">
			<li>
				<a href="<?= base_url('Tambah_stok_logistik') ?> ">STOK LOGISTIK</a>
			</li>
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
		<a href="<?= base_url('Permintaan_obat') ?>"><i class="icon-hourglass mr-10"></i>PERMINTAAN OBAT</a>
	</li>
	<li>
		<a href="<?= base_url('Logistik_farmasi/Riwayat_permintaan') ?>"><i class="fa fa-upload mr-10"></i>RIWAYAT PERMINTAAN OBAT</a>
	</li>
	<li>
		<a href="<?= base_url('Usulan_perencanaan/Rekomendasi') ?>"><i class="icon-graph mr-10"></i>REKOMENDASI PERENCANAAN</a>
	</li>
	<li>
		<a href="<?= base_url('Pelacakan_obat') ?>"><i class="icon-magnifier mr-10"></i>PELACAKAN OBAT</a>
	</li>
	<li>
		<a href="<?= base_url('Retur_obat_logistik') ?>"><i class="fa fa-cube mr-10"></i>RETUR OBAT</a>
	</li>
	<li>
		<a href="<?= base_url('Logistik_farmasi/Riwayat_penarikan') ?>"><i class="fa fa-download mr-10"></i>RIWAYAT PENARIKAN OBAT</a>
	</li>
	<li>
		<a href="<?= base_url('Afkir_logfar') ?>"><i class="fa fa-cube mr-10"></i>PENGELUARAN AFKIR</a>
	</li>


	<li>
		<a data-toggle="collapse" style="cursor:pointer;" data-target="#ui_dr"><i class="icon-drawar mr-10"></i>LAPORAN<span class="pull-right"><span class="label label-success mr-10">7</span><i class="fa fa-fw fa-angle-down"></i></span></a>
		<ul id="ui_dr" class="collapse collapse-level-1">
			<!-- <li>
				<a href="<?= base_url('Logistik_farmasi/Laporan_cetak_dp'); ?>">LAPORAN DP</a>
			</li> -->
			<li>
				<a href="<?= base_url('Logistik_farmasi/Laporan_stok'); ?>">LAPORAN KARTU STOK</a>
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
				<a href="<?= base_url('Logistik_farmasi/Laporan_pembelian_pebal'); ?>">LAPORAN PEMBELIAN PEBAL</a>
			</li>
			<li>
				<a class="klik_menu" id="laporanObatEd" href="<?= base_url('Apotik/Laporan_obat_ed') ?>"> </i>LAPORAN OBAT ED</a>
			</li>
			<li>
				<a href="<?= base_url('Logistik_farmasi/Laporan_Cetak_so'); ?>">CETAK SO</a>
			</li>
			<li>
				<a href="<?= base_url('Logistik_farmasi/Laporan_persediaan'); ?>">LAPORAN PERSEDIAAN</a>
			</li>
			<li>
				<a href="<?= base_url('Retur_obat_logistik/Laporan'); ?>">LAPORAN RETUR</a>
			</li>
			<li>
				<a href="<?= base_url('Afkir_logfar/Laporan_afkir'); ?>">LAPORAN AFKIR</a>
			</li>
			<li>
				<a class="klik_menu" href="<?= base_url('Apotik/Laporan_fastmoving') ?>">FAST MOVING </a>
			</li>
			<li>
				<a class="klik_menu" href="<?= base_url('Apotik/Laporan_slowmoving') ?>">SLOW MOVING </a>
			</li>
			<li>
				<a class="klik_menu" href="<?= base_url('Apotik/Laporan_deadstok') ?>">DEAD STOCK </a>
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
		<a href="<?= base_url('Permintaan_obat_unit') ?>"><i class="icon-drawar mr-10"></i>PERMINTAAN OBAT</a>
	</li>
	<!--end logistik farmasi-->
<?php } elseif ($datatipe == 'mcu' && $status == 'aktif') { ?>
	<li>
		<a href="<?= base_url('Pencarian_pasien') ?>"><i class="icon-magnifier mr-10"></i>PASIEN BARU </a>
	</li>

	<li>
		<a href="<?= base_url('mcu') ?>"><i class="fa fa-ambulance mr-10"></i>MCU</a>
	</li>
	<li>
		<a href="<?= base_url('mcu/DataMCU') ?>"><i class="icon-notebook mr-10"></i>Data MCU</a>
	</li>
	<li>
		<a href="<?= base_url('mcu/laporan_kunjungan_mcu') ?>"><i class="icon-docs mr-10"></i>Laporan Kunjungan MCU</a>
	</li>
	<!-- <li>
				<a href="<?= base_url('mcu/Tindakan_mcu') ?>"><i class="icon-docs mr-10"></i>Tindakan MCU</a>
			</li> -->
	<!-- <li>
		<a style="cursor:pointer;" data-toggle="collapse" data-target="#erm_hc"><i class="fa fa-home mr-10"></i>HOME CARE<span class="pull-right"><span class="label label-success mr-10">3</span><i class="fa fa-fw fa-angle-down"></i></span></a>
		<ul id="erm_hc" class="collapse collapse-level-1">
			<li>
				<a href="<?= base_url('Homecare') ?> ">DATA HOME CARE</a>
			</li>

			<li>
				<a href="<?= base_url('Laporan_kunjungan_homecare') ?> ">LAPORAN HOME CARE</a>
			</li>

			<li>
				<a href="<?= base_url('Homecare/tindakan_homecare') ?> ">TINDAKAN HOME CARE</a>
			</li>
			<li>
				<a href="<?= base_url('Homecare/Perawat') ?> ">PERAWAT HOME CARE</a>
			</li>


		</ul>
	</li> -->

	<li>
		<a style="cursor:pointer;" data-toggle="collapse" data-target="#erm_dr"><i class="icon-drawar mr-10"></i>ADMIN<span class="pull-right"><span class="label label-success mr-10">3</span><i class="fa fa-fw fa-angle-down"></i></span></a>
		<ul id="erm_dr" class="collapse collapse-level-1">
			<li>
				<a href="<?= base_url('mcu/Tindakan_mcu') ?> ">TINDAKAN MCU</a>
			</li>
			<li>
				<a href="<?= base_url('mcu/Paket_mcu') ?> ">PAKET MCU</a>
			</li>
			<li>
				<a href="<?= base_url('mcu/Tindakan_labor_mcu') ?> ">LABOR MCU</a>
			</li>

			<li>
				<a href="<?= base_url('mcu/Tindakan_radio_mcu') ?> ">RADIOLOGI MCU</a>
			</li>



		</ul>
	</li>
	<!-- <li>
		<a style="cursor:pointer;" data-toggle="collapse" data-target="#kasir"><i class="icon-drawar mr-10"></i>POLI PRIORITAS<span class="pull-right"><span class="label label-success mr-10">3</span><i class="fa fa-fw fa-angle-down"></i></span></a>
		<ul id="kasir" class="collapse collapse-level-1">
			<li>
				<a href="<?= base_url('Poli_prio') ?> ">PASIEN</a>
			</li>
			<li>
				<a class="klik_menu" id="ranap" href="<?= base_url('Kasir_pp') ?>">KASIR</a>
			</li>
			<li>
				<a class="klik_menu" id="ranap" href="<?= base_url('Kasir/pasien_pulang_Hc') ?>">PASIEN PULANG HOME CARE</a>
			</li>
		</ul>
	</li> -->
	<!-- <li>
		<a href="<?= base_url('Obat_bebas') ?>"><i class="ti-package mr-10 "></i>OBAT BEBAS</a>
	</li> -->
	<li>
		<a href="<?= base_url('Permintaan_obat_unit') ?>"><i class="icon-drawar mr-10"></i>PERMINTAAN OBAT</a>
	</li>
	<li>
		<a href="<?= base_url('stok_obat_ok') ?>"><i class="ti-package mr-10 "></i>STOCK OBAT </a>
	</li>
<?php } elseif ($datatipe == 'igdfarmasi' && $status == 'aktif') { ?>
	<!-- <li>
		<a href="<?= base_url('Obat_bebas') ?>"><i class="ti-package mr-10 "></i>OBAT BEBAS</a>
	</li> -->
	<li>
		<a href="<?= base_url('Permintaan_obat_unit') ?>"><i class="icon-drawar mr-10"></i>PERMINTAAN OBAT</a>
	</li>
	<li>
		<a href="<?= base_url('stok_obat_ok') ?>"><i class="ti-package mr-10 "></i>STOCK OBAT </a>
	</li>
<?php } elseif ($datatipe == 'igdapotik' && $status == 'aktif') { ?>
	<!-- <li>
		<a href="<?= base_url('Obat_bebas') ?>"><i class="ti-package mr-10 "></i>OBAT BEBAS</a>
	</li> -->
	<li>
		<a href="<?= base_url('Permintaan_obat_unit') ?>"><i class="icon-drawar mr-10"></i>PERMINTAAN OBAT</a>
	</li>
	<li>
		<a href="<?= base_url('stok_obat_ok') ?>"><i class="ti-package mr-10 "></i>STOCK OBAT </a>
	</li>
<?php } elseif ($datatipe == 'monev' && $status == 'aktif') { ?>
	<!-- <li>
		<a href="<?= base_url('Obat_bebas') ?>"><i class="ti-package mr-10 "></i>OBAT BEBAS</a>
	</li> -->
	<li>
		<a href="<?= base_url('Permintaan_obat_unit') ?>"><i class="icon-drawar mr-10"></i>PERMINTAAN OBAT</a>
	</li>
	<li>
		<a href="<?= base_url('stok_obat_ok') ?>"><i class="ti-package mr-10 "></i>STOCK OBAT </a>
	</li>
<?php } elseif ($datatipe == 'baksos' && $status == 'aktif') { ?>
	<!-- <li>
		<a href="<?= base_url('Obat_bebas') ?>"><i class="ti-package mr-10 "></i>OBAT BEBAS</a>
	</li> -->
	<li>
		<a href="<?= base_url('Permintaan_obat_unit') ?>"><i class="icon-drawar mr-10"></i>PERMINTAAN OBAT</a>
	</li>
	<li>
		<a href="<?= base_url('stok_obat_ok') ?>"><i class="ti-package mr-10 "></i>STOCK OBAT </a>
	</li>
<?php } elseif ($datatipe == 'Klinik Pratama Kundur' && $status == 'aktif') { ?>
	<!-- <li>
		<a href="<?= base_url('Obat_bebas') ?>"><i class="ti-package mr-10 "></i>OBAT BEBAS</a>
	</li> -->
	<li>
		<a href="<?= base_url('Permintaan_obat_unit') ?>"><i class="icon-drawar mr-10"></i>PERMINTAAN OBAT</a>
	</li>
	<li>
		<a href="<?= base_url('stok_obat_ok') ?>"><i class="ti-package mr-10 "></i>STOCK OBAT </a>
	</li>
<?php } elseif ($datatipe == 'bpjs' && $status == 'aktif') { ?>
	<!-- <li>
		<a href="<?= base_url('Obat_bebas') ?>"><i class="ti-package mr-10 "></i>OBAT BEBAS</a>
	</li> -->
	<li>
		<a href="<?= base_url('Permintaan_obat_unit') ?>"><i class="icon-drawar mr-10"></i>PERMINTAAN OBAT</a>
	</li>
	<li>
		<a href="<?= base_url('stok_obat_ok') ?>"><i class="ti-package mr-10 "></i>STOCK OBAT </a>
	</li>
<?php } elseif ($datatipe == 'ipcn' && $status == 'aktif') { ?>
	<!-- <li>
		<a href="<?= base_url('Obat_bebas') ?>"><i class="ti-package mr-10 "></i>OBAT BEBAS</a>
	</li> -->
	<li>
		<a href="<?= base_url('Permintaan_obat_unit') ?>"><i class="icon-drawar mr-10"></i>PERMINTAAN OBAT</a>
	</li>
	<li>
		<a href="<?= base_url('stok_obat_ok') ?>"><i class="ti-package mr-10 "></i>STOCK OBAT </a>
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
	<li>
		<a href="<?= base_url('Permintaan_obat') ?>"><i class="icon-hourglass mr-10"></i>PERMINTAAN OBAT</a>
	</li>
	<li>
		<a href="<?= base_url('stok_obat_ok') ?>"><i class="ti-package mr-10 "></i>STOCK OBAT </a>
	</li>

	<!--  -->

<?php } elseif ($datatipe == 'rawatjalan' && $status == 'aktif') { ?>
	<!--  -->
	<!-- <li>
		<a href="<?= base_url('Obat_bebas') ?>"><i class="ti-package mr-10 "></i>OBAT BEBAS</a>
	</li> -->
	<li>
		<a href="<?= base_url('Permintaan_obat') ?>"><i class="icon-drawar mr-10 "></i>PERMINTAAN OBAT </a>
	</li>
	<li>
		<a href="<?= base_url('stok_obat_ok') ?>"><i class="ti-package mr-10 "></i>STOCK OBAT </a>
	</li>
	<li>
		<a class="klik_menu" id="tambahan" href="<?= base_url('LaporanKunjunganPoli') ?>"><i class="icon-note mr-10 "></i>LAPORAN KUNJUNGAN POLI</a>
	</li>
	<li>
		<a class="klik_menu" id="tambahan" href="<?= base_url('Laporan/Laporan_poli_ranap') ?>"><i class="icon-note mr-10 "></i>LAPORAN JUMLAH PASIEN POLI RANAP</a>
	</li>
	<li>
		<a class="klik_menu" id="tambahan" href="<?= base_url('Laporan/Laporan_cara_bayar') ?>"><i class="icon-note mr-10 "></i>LAPORAN KUNJUNGAN POLI DAN CARA BAYAR</a>
	</li>
	<li>
		<a class="klik_menu" id="tambahan" href="<?= base_url('Laporan/Laporan_mutu_poli') ?>"><i class="icon-note mr-10 "></i>LAPORAN LAMA KUNJUNGAN PASIEN POLI</a>
	</li>
	<li>
		<a href="<?= base_url('Laporan/Laporan_penyakit_tertinggi_rajal'); ?>"><i class="icon-doc mr-10 "></i>LAPORAN 10 PENYAKIT TERTINGGI</a>
	</li>
	<li>
		<a href="<?= base_url('Laporan/Laporan_pasien_batal'); ?>"><i class="icon-doc mr-10 "></i>LAPORAN PASIEN BATAL BEROBAT</a>
	</li>
	<li>
		<a href="<?= base_url('Laporan/Laporan_berobat_pasien_baru'); ?>"><i class="icon-doc mr-10 "></i>LAPORAN BEROBAT PASIEN BARU</a>
	</li>

	<li>
		<a href="<?= base_url('Antrianpoli') ?>"><i class="icon-drawar mr-10 "></i>ANTRIAN POLI </a>
	</li>
	<?php if ($izinAkses == "admin") { ?>
		<li>
			<a href="<?= base_url('Radiologi/Riwayat_pasien') ?>"><i class="icon-drawar mr-10 "></i>RIWAYAT RADIOLOGI</a>
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
	<?php } ?>
	<!--  -->
<?php } elseif (($datatipe == 'apotik' && $status == 'aktif') || ($datatipe == 'deporanap' && $status == 'aktif')) { ?>

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
				<a class="klik_menu" id="pasienOK" href="<?= base_url('Apotik/Riwayat_pasien_pulang') ?>"><i class="icon-drawar mr-10 "></i>RIWAYAT PASIEN PULANG </a>
			</li>
			<!-- <?php if ($datatipe == 'apotik') { ?>
						<li>
							<a class="klik_menu" id="pasienOK" href="<?= base_url('Apotik/Obat_bebas') ?>"><i class="icon-drawar mr-10 "></i>OBAT BEBAS </a>
						</li>
					<?php } ?> -->
			<li>
				<a href="<?= base_url('Obat_bebas') ?>"><i class="ti-package mr-10 "></i>OBAT BEBAS</a>
			</li>
			<li>
				<a class="klik_menu" id="pasieninap" href="<?= base_url('Apotik_poli/Homecare') ?>"><i class="icon-drawar mr-10 "></i>HOMECARE </a>
			</li>
		</ul>
	</li>
	<li>
		<a class="klik_menu" id="permintaanobata" href="<?= base_url('Apotik_poli/igd') ?>"><i class="icon-people mr-10 "></i>FARMASI IGD</a>
	</li>
	<li>
		<a class="klik_menu" id="permintaanobata" href="<?= base_url('Apotik_poli/poli') ?>"><i class="icon-people mr-10 "></i>FARMASI POLI</a>
	</li>
	<li>
		<a class="klik_menu" id="permintaanobata" href="<?= base_url('Apotik_poli/ranap') ?>"><i class="icon-people mr-10 "></i>FARMASI RAWATINAP</a>
	</li>
	<li>
		<a data-toggle="collapse" data-target="#dashboard_dr1" href="javascript:void(0);"><i class="icon-people mr-10"></i>OBAT <span class="pull-right"><span class="label label-success mr-10">3</span><i class="fa fa-fw fa-angle-double-down"></i></span></a>
		<ul id="dashboard_dr1" class="collapse collapse-level-1">
			<li>
				<a class="klik_menu" id="permintaanobat" href="<?= base_url('Permintaan_obat') ?>"><i class="icon-drawar mr-10 "></i>PERMINTAAN OBAT </a>
			</li>
			<li>
				<a href="<?= base_url('Afkir_logfar') ?>"><i class="fa fa-cube mr-10"></i>PENGELUARAN AFKIR</a>
			</li>
			<li>
				<a class="klik_menu" id="obatOK" href="<?= base_url('Obat_racikan') ?>"><i class="icon-drawar mr-10 "></i>OBAT RACIKAN</a>
			</li>
			<li>
				<a href="<?= base_url('stok_obat_ok') ?>"><i class="ti-package mr-10 "></i>STOCK OBAT</a>
			</li>
			<li>
				<a class="klik_menu" id="obatIGD" href="<?= base_url('Apotik/Stok_Igd') ?>"><i class="icon-drawar mr-10 "></i>STOK OBAT IGD </a>
			</li>
		</ul>
	</li>
	<li>
		<a href="<?= base_url('Apotik/tindakan_signaobat') ?>"><i class="icon-note mr-10 "></i>SIGNA OBAT</a>
	</li>


	<?php
			if ($izinAkses == "admin") {
	?>
		<!-- <li>
					<a data-toggle="collapse" data-target="#dashboard_drr" href="javascript:void(0);"><i class="icon-note mr-10"></i>ADMIN <span class="pull-right"><span class="label label-success mr-10">3</span><i class="fa fa-fw fa-angle-down"></i></span></a>
					<ul id="dashboard_drr" class="collapse collapse-level-1">
						<li>
							<a class="klik_menu" id="cobaApotik" href=<?= base_url('Apotik/Tambah_stok_admin') ?>> </i>TAMBAH STOK APOTIK</a>
						</li>
					</ul>
				</li> -->

		<li>
			<a class="klik_menu" id="permintaanobata" href="<?= base_url('Apotik/Laporan_kunjungan_apotik') ?>"><i class="icon-people mr-10 "></i>LAPORAN KUNJUNGAN FRJ</a>
		</li>
		<li>
			<a data-toggle="collapse" data-target="#dashboard_dr2r" href="javascript:void(0);"><i class="icon-note mr-10"></i>LAPORAN PENJUALAN OBAT<span class="pull-right"><span class="label label-success mr-10">5</span><i class="fa fa-fw fa-angle-down"></i></span></a>
			<ul id="dashboard_dr2r" class="collapse collapse-level-1">
				<!-- <li>
					<a href="<?= base_url('Logistik_farmasi/Laporan_stok'); ?>">LAPORAN KARTU STOK</a>
				</li>
				<li>
					<a href="<?= base_url('Logistik_farmasi/Laporan_mutasi'); ?>">LAPORAN MUTASI</a>
				</li> -->
				<li>
					<a class="klik_menu" id="laporanObatRajal" href="<?= base_url('Apotik/Laporan_pasien_Igd') ?>"> </i>LAPORAN OBAT PASIEN DEPO RANAP</a>
				</li>
				<li>
					<a class="klik_menu" id="laporanObatRajal" href="<?= base_url('Apotik/Laporan_pasien_rajal') ?>"> </i>LAPORAN OBAT PASIEN DEPO RAJAL</a>
				</li>
				<!-- <li>
					<a class="klik_menu" id="laporanObatRanap" href="<?= base_url('Apotik/Laporan_pasien_ranap') ?>"> </i>LAPORAN OBAT PASIEN RANAP</a>
				</li> -->
				<li>
					<a class="klik_menu" id="laporanPenjualanObatRajal" href="<?= base_url('Apotik/Laporan_obat_ranap') ?>"> </i>LAPORAN PENJUALAN OBAT DEPO RANAP</a>
				</li>
				<li>
					<a class="klik_menu" id="laporanPenjualanObatRajal" href="<?= base_url('Apotik/Laporan_obat_rajal') ?>"> </i>LAPORAN PENJUALAN OBAT DEPO RAJAL</a>
				</li>
				<!-- <li>
					<a class="klik_menu" id="laporanPenjualanObatRanap" href="<?= base_url('Apotik/Laporan_obat_ranap') ?>"> </i>LAPORAN PENJUALAN OBAT RANAP</a>
				</li> -->
				<li>
					<a class="klik_menu" id="laporanPenjualanItemObat" href="<?= base_url('Apotik/Laporan_item_obat') ?>"> </i>LAPORAN PENJUALAN ITEM OBAT</a>
				</li>
				<li>
					<a class="klik_menu" id="laporanObatEd" href="<?= base_url('Apotik/Laporan_obat_ed') ?>"> </i>LAPORAN OBAT ED</a>
				</li>
				<li>
					<a class="klik_menu" id="laporanObatRanapSanbe" href="<?= base_url('Apotik/Laporan_pasien_obat_bebas') ?>"> </i>LAPORAN OBAT BEBAS PASIEN TIMAH</a>
				</li>
			</ul>
		</li>
		<li>
			<a data-toggle="collapse" data-target="#dashboard_dr2l" href="javascript:void(0);"><i class="icon-note mr-10"></i>LAPORAN ALUR OBAT<span class="pull-right"><span class="label label-success mr-10"></span><i class="fa fa-fw fa-angle-down"></i></span></a>
			<ul id="dashboard_dr2l" class="collapse collapse-level-1">
				<li>
					<a href="<?= base_url('Logistik_farmasi/Laporan_stok'); ?>">LAPORAN KARTU STOK</a>
				</li>
				<li>
					<a href="<?= base_url('Logistik_farmasi/Laporan_mutasi'); ?>">LAPORAN MUTASI</a>
				</li>
				<li>
					<a href="<?= base_url('Afkir_logfar/Laporan_afkir'); ?>">LAPORAN AFKIR</a>
				</li>
				<li>
					<a class="klik_menu" id="fastmoving" href="<?= base_url('Apotik/Laporan_fastmoving') ?>"><i class="icon-drawar mr-10 "></i>FAST MOVING </a>
				</li>
				<li>
					<a class="klik_menu" id="slowmoving" href="<?= base_url('Apotik/Laporan_slowmoving') ?>"><i class="icon-drawar mr-10 "></i>SLOW MOVING </a>
				</li>
				<li>
					<a class="klik_menu" id="fastmoving" href="<?= base_url('Apotik/Laporan_deadstok') ?>"><i class="icon-drawar mr-10 "></i>DEAD STOCK </a>
				</li>
			</ul>
		</li>
		<li>
			<a data-toggle="collapse" data-target="#dashboard_dr2s" href="javascript:void(0);"><i class="icon-note mr-10"></i>LAPORAN SO<span class="pull-right"><span class="label label-success mr-10"></span><i class="fa fa-fw fa-angle-down"></i></span></a>
			<ul id="dashboard_dr2s" class="collapse collapse-level-1">
				<li>
					<a class="klik_menu" id="laporanSo" href="<?= base_url('Apotik/Cetak_so_apotik') ?>"> </i>CETAK SO RAJAL</a>
				</li>
				<li>
					<a class="klik_menu" id="laporanSoI" href="<?= base_url('Apotik/Cetak_so_depo') ?>"> </i>CETAK SO RANAP</a>
				</li>
			</ul>
		</li>
		<li>
			<a data-toggle="collapse" data-target="#dashboard_dr2m" href="javascript:void(0);"><i class="icon-note mr-10"></i>LAPORAN OBAT MCS<span class="pull-right"><span class="label label-success mr-10"></span><i class="fa fa-fw fa-angle-down"></i></span></a>
			<ul id="dashboard_dr2m" class="collapse collapse-level-1">
				<li>
					<a class="klik_menu" id="laporanObatRajalSanbe" href="<?= base_url('Apotik/Laporan_pasien_rajal_sanbe') ?>"> </i>LAPORAN RAJAL PASIEN TIMAH</a>
				</li>
				<li>
					<a class="klik_menu" id="laporanObatRanapSanbe" href="<?= base_url('Apotik/Laporan_pasien_ranap_sanbe') ?>"> </i>LAPORAN RANAP PASIEN TIMAH</a>
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
				<li>
					<a href="<?= base_url('Apotik/Laporan_permintaan_obat_unit'); ?>"><i class="icon-doc mr-10 "></i>LAPORAN PERMINTAAN OBAT UNIT</a>
				</li>
			</ul>
		</li>
		<li>
			<a class="klik_menu" id="permintaanobata" href="<?= base_url('Logistik_farmasi/Riwayat_permintaanFarmasi') ?>"><i class="icon-drawar mr-10 "></i>RIWAYAT PERMINTAAN OBAT </a>
		</li>
		<li>
			<a class="klik_menu" id="permintaanobata" href="<?= base_url('') ?>"><i class="icon-drawar mr-10 "></i>PERMINTAAN LOGISTIK UMUM </a>
		</li>
		<li>
			<a href="<?= base_url('Stok_obat') ?>"><i class="icon-drawar mr-10 "></i>STOK OBAT GUDANG</a>
		</li>

		<li>
			<a href="<?= base_url('Apotik/Antrian') ?>"><i class="icon-hourglass mr-10"></i>ANTRIAN APOTIK</a>
		</li>
	<?php } ?>
<?php } elseif ($datatipe == 'kasir' && $status == 'aktif') { ?>
	<li>
		<a class="klik_menu" id="tambahan" href="<?= base_url('Pasien/Pasien_apm') ?>"><i class="icon-drawar mr-10 "></i>PASIEN ANJUNGAN PENDAFTARAN MANDIRI(APM)</a>
	</li>

	<li>
		<a data-toggle="collapse" data-target="#dashboard_pasien"><i class="icon-user mr-10"></i>PASIEN<span class="pull-right"><span class="label label-success mr-12">2</span><i class="fa fa-fw fa-angle-down"></i></span></a>
		<ul id="dashboard_pasien" class="collapse collapse-level-1">

			<li>
				<a class="klik_menu" id="rajal" href="<?= base_url('Kasir/Pasien_rajal_ugd') ?>"><i class="icon-drawar mr-10 "></i>PASIEN UGD</a>
			</li>
			<li>
				<a class="klik_menu" id="ranap" href="<?= base_url('Kasir/Pasien_ranap') ?>"><i class="icon-drawar mr-10 "></i>PASIEN RANAP</a>
			</li>
			<li>
				<a class="klik_menu" id="ranap" href="<?= base_url('Kasir/Pasien_mcu') ?>"><i class="icon-drawar mr-10 "></i>PASIEN MCU</a>
			</li>
			<li>
				<a class="klik_menu" id="ranap" href="<?= base_url('Kasir/Pasien_homecare') ?>"><i class="icon-drawar mr-10 "></i>PASIEN HOME CARE</a>
			</li>
			<li>
				<a class="klik_menu" id="rajal" href="<?= base_url('Kasir_poli/obat_bebas') ?>"><i class="icon-drawar mr-10 "></i>OBAT BEBAS</a>
			</li>
			<!-- <li>
				<a class="klik_menu" id="rajal" href="<?= base_url('Kasir/Pasien_rajal') ?>"><i class="icon-drawar mr-10 "></i>PASIEN POLI</a>
			</li> -->
		</ul>
	</li>
	<li>
		<a data-toggle="collapse" data-target="#dashboard_poli"><i class="icon-user mr-10"></i>PASIEN POLI<span class="pull-right"><span class="label label-success mr-12">15</span><i class="fa fa-fw fa-angle-down"></i></span></a>
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
				<a class="klik_menu" id="ranap" href="<?= base_url('Kasir_poli/fisio') ?>"><i class="icon-drawar mr-10 "></i>POLI FISIO</a>
			</li>
			<li>
				<a class="klik_menu" id="ranap" href="<?= base_url('Kasir_poli/akupuntur') ?>"><i class="icon-drawar mr-10 "></i>POLI AKUPUNTUR</a>
			</li>
			<li>
				<a class="klik_menu" id="ranap" href="<?= base_url('Kasir_poli/bedahmulut') ?>"><i class="icon-drawar mr-10 "></i>POLI BEDAH MULUT</a>
			</li>
			<li>
				<a class="klik_menu" id="ranap" href="<?= base_url('Kasir_poli/kesjiwa') ?>"><i class="icon-drawar mr-10 "></i>POLI KESEHATAN JIWA</a>
			</li>
			<li>
				<a class="klik_menu" id="ranap" href="<?= base_url('Kasir_poli/psikolog') ?>"><i class="icon-drawar mr-10 "></i>POLI PSIKOLOG</a>
			</li>
			<li>
				<a class="klik_menu" id="ranap" href="<?= base_url('Kasir_poli/orthopedi') ?>"><i class="icon-drawar mr-10 "></i>POLI ORTHOPEDI</a>
			</li>
			<li>
				<a class="klik_menu" id="ranap" href="<?= base_url('Kasir_poli/paru') ?>"><i class="icon-drawar mr-10 "></i>POLI PARU</a>
			</li>
			<li>
				<a class="klik_menu" id="ranap" href="<?= base_url('Kasir_poli/hd') ?>"><i class="icon-drawar mr-10 "></i>POLI HEMODIALISA</a>
			</li>
			<li>
				<a class="klik_menu" id="ranap" href="<?= base_url('Kasir_poli/saraf') ?>"><i class="icon-drawar mr-10 "></i>POLI SARAF</a>
			</li>
			<li>
				<a class="klik_menu" id="ranap" href="<?= base_url('Kasir_poli/urologi') ?>"><i class="icon-drawar mr-10 "></i>POLI UROLOGI</a>
			</li>
			<li>
				<a class="klik_menu" id="ranap" href="<?= base_url('Kasir_poli/ginjal') ?>"><i class="icon-drawar mr-10 "></i>POLI GINJAL</a>
			</li>
			<li>
				<a class="klik_menu" id="ranap" href="<?= base_url('Kasir_poli/penyakitmulut') ?>"><i class="icon-drawar mr-10 "></i>POLI PENYAKIT MULUT</a>
			</li>
			<li>
				<a class="klik_menu" id="ranap" href="<?= base_url('Kasir_poli/rehab') ?>"><i class="icon-drawar mr-10 "></i>POLI CONTROL REHABILITAS MEDIC</a>
			</li>
			<li>
				<a class="klik_menu" id="ranap" href="<?= base_url('Kasir_poli/labor') ?>"><i class="icon-drawar mr-10 "></i>POLI LABORATORIUM</a>
			</li>
			<li>
				<a class="klik_menu" id="ranap" href="<?= base_url('Kasir_poli/radiologi') ?>"><i class="icon-drawar mr-10 "></i>POLI RADIOLOGI</a>
			</li>
			<li>
				<a class="klik_menu" id="ranap" href="<?= base_url('Kasir_poli/anastesi') ?>"><i class="icon-drawar mr-10 "></i>POLI ANASTESI</a>
			</li>
			<li>
				<a class="klik_menu" id="ranap" href="<?= base_url('Kasir_poli/kemoterapi') ?>"><i class="icon-drawar mr-10 "></i>POLI KEMOTERAPI</a>
			</li>
			<li>
				<a class="klik_menu" id="ranap" href="<?= base_url('Kasir_poli/stifin') ?>"><i class="icon-drawar mr-10 "></i>POLI STIFIN</a>
			</li>
			<li>
				<a class="klik_menu" id="ranap" href="<?= base_url('Kasir_poli/gizi') ?>"><i class="icon-drawar mr-10 "></i>POLI GIZI</a>
			</li>
			<li>
				<a class="klik_menu" id="ranap" href="<?= base_url('Kasir_poli/terapi_wicara') ?>"><i class="icon-drawar mr-10 "></i>POLI TERAPI WICARA</a>
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
			<li>
				<a href="<?= base_url('Kasir/Pasien_pulang_mcu'); ?>"><i class="fa fa-share mr-10 "></i>PASIEN PULANG MCU</a>
			</li>
		</ul>
	</li>
	<li>
		<a data-toggle="collapse" data-target="#total11"><i class="icon-drawar mr-10"></i>LAPORAN TOTAL DAN MONITORING<span class="pull-right"><span class="label label-success mr-10"></span><i class="fa fa-fw fa-angle-down"></i></span></a>
		<ul id="total11" class="collapse collapse-level-1">
			<li>
				<a class="klik_menu" id="tambahan" href="<?= base_url('Laporan/Laporan_pendapatan_rajal') ?>"><i class="fa fa-file mr-10 "></i>LAPORAN TOTAL POLI</a>
			</li>
			<li>
				<a class="klik_menu" id="tambahan" href="<?= base_url('Laporan/Laporan_pendapatan_igd') ?>"><i class="fa fa-file mr-10 "></i>LAPORAN TOTAL IGD</a>
			</li>
			<li>
				<a class="klik_menu" id="tambahan" href="<?= base_url('Laporan/Laporan_total_pasien') ?>"><i class="fa fa-file mr-10 "></i>LAPORAN TOTAL PASIEN</a>
			</li>
			<li>
				<a class="klik_menu" id="tambahan" href="<?= base_url('Laporan_kunjungan_ranap/Laporan_pengisian_ranap') ?>">LAPORAN PENGISIAN RANAP</a>
			</li>
			<li>
				<a href="<?= base_url('Laporan/Laporan_staff_kasir') ?>"><i class="icon-hourglass mr-10"></i>LAPORAN PENDAPATAN KASIR</a>
			</li>
			<li>
				<a class="klik_menu" id="tambahan" href="<?= base_url('Laporan/Laporan_total_kasir') ?>">LAPORAN TOTAL KASIR</a>
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
	<li>
		<a href="<?= base_url('Laporan_pendapatan/Laporan_pendapatan'); ?>"><i class="icon-doc mr-10 "></i>LAPORAN PENDAPATAN</a>
	</li>
	<li>
		<a href="<?= base_url('Laporan_pendapatan/Laporan_jasa_dokter'); ?>"><i class="icon-doc mr-10 "></i>LAPORAN JASA DOKTER</a>
	</li>
	<li>
		<a href="<?= base_url('Laporan_pendapatan/laporan_jenis_klaim'); ?>"><i class="icon-layers mr-10 "></i>LAPORAN PENDAPATAN JENIS KLAIM</a>
	</li>
	<li>
		<a href="<?= base_url('Laporan_pendapatan/laporan_biaya_ranap'); ?>"><i class="icon-layers mr-10 "></i>LAPORAN BIAYA TINDAKAN RANAP</a>
	</li>
	<li>
		<a href="<?= base_url('Laporan_pendapatan/laporan_visite_dokter'); ?>"><i class="icon-layers mr-10 "></i>LAPORAN BIAYA VISITE DOKTER</a>
	</li>
	<li>
		<a href="<?= base_url('Laporan_pendapatan/laporan_pendapatan_fisio'); ?>"><i class="icon-layers mr-10 "></i>LAPORAN PENDAPATAN FISIO</a>
	</li>

	<?php if ($izinAkses == "admin") {
	?>
		<li>
			<a class="klik_menu" id="permintaanobat" href="javascript:void(0);"><i class="icon-drawar mr-10 "></i>PERMINTAAN LOGISTIK UMUM </a>
		</li>
	<?php } ?>
<?php } elseif ($datatipe == 'bendahara' && $status == 'aktif') { ?>

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
			<li>
				<a href="<?= base_url('Kasir/Pasien_pulang_mcu'); ?>"><i class="fa fa-share mr-10 "></i>PASIEN PULANG MCU</a>
			</li>
		</ul>
	</li>


	<?php if ($izinAkses == "admin") {
	?>
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
		<a class="klik_menu" id="ranap" href="<?= base_url('Casemix/Pasien_batal') ?>"><i class="icon-drawar mr-10 "></i>PASIEN BATAL</a>
	</li>
	<li>
		<a class="klik_menu" id="tambahan" href="<?= base_url('Casemix/Erm') ?>"><i class="icon-note mr-10 "></i>ERM</a>
	</li>
	<li>
		<a class="klik_menu" id="tambahan" href="<?= base_url('Laporan/Laporan_pasien_ritl') ?>"><i class="icon-note mr-10 "></i>LAPORAN RITL</a>
	</li>
	<li>
		<a class="klik_menu" id="tambahan" href="<?= base_url('Laporan/Laporan_pasien_rjtl') ?>"><i class="icon-note mr-10 "></i>LAPORAN RJTL</a>
	</li>
	<li>
		<a class="klik_menu" id="ranap" href="<?= base_url('Casemix/control_biaya') ?>"><i class="icon-drawar mr-10 "></i>CONTROL BIAYA</a>
	</li>
	<li>
		<a class="klik_menu" id="pasien" href="<?= base_url('Casemix/assembling') ?>"><i class="icon-docs mr-10 "></i>ASSEMBLING</a>
	</li>
	<li>
		<a class="klik_menu" id="tambahan" href="<?= base_url('Casemix/monev_control_biaya') ?>"><i class="icon-docs mr-10 "></i>MONEV CONTROL BIAYA</a>
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
		<a href="<?= base_url('Apelkes') ?>"><i class="icon-hourglass mr-10"></i>BILLING PASIEN RANAP</a>
	</li>
	<!-- <li>
		<a class="klik_menu" id="ranap" href="<?= base_url('Kasir/Pasien_ranap') ?>"><i class="icon-drawar mr-10 "></i>PASIEN RANAP</a>
	</li> -->
	<li>
		<a class="klik_menu" id="rajal" href="<?= base_url('Kasir/Pasien_rajal_ugd') ?>"><i class="icon-drawar mr-10 "></i>BILLING PASIEN UGD</a>
	</li>
	<li>
		<a data-toggle="collapse" data-target="#dashboard_poli"><i class="icon-user mr-10"></i>BILLING PASIEN POLI<span class="pull-right"><span class="label label-success mr-12">15</span><i class="fa fa-fw fa-angle-down"></i></span></a>
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
				<a class="klik_menu" id="ranap" href="<?= base_url('Kasir_poli/fisio') ?>"><i class="icon-drawar mr-10 "></i>POLI FISIO</a>
			</li>
			<li>
				<a class="klik_menu" id="ranap" href="<?= base_url('Kasir_poli/akupuntur') ?>"><i class="icon-drawar mr-10 "></i>POLI AKUPUNTUR</a>
			</li>
			<li>
				<a class="klik_menu" id="ranap" href="<?= base_url('Kasir_poli/bedahmulut') ?>"><i class="icon-drawar mr-10 "></i>POLI BEDAH MULUT</a>
			</li>
			<li>
				<a class="klik_menu" id="ranap" href="<?= base_url('Kasir_poli/kesjiwa') ?>"><i class="icon-drawar mr-10 "></i>POLI KESEHATAN JIWA</a>
			</li>
			<li>
				<a class="klik_menu" id="ranap" href="<?= base_url('Kasir_poli/orthopedi') ?>"><i class="icon-drawar mr-10 "></i>POLI ORTHOPEDI</a>
			</li>
			<li>
				<a class="klik_menu" id="ranap" href="<?= base_url('Kasir_poli/paru') ?>"><i class="icon-drawar mr-10 "></i>POLI PARU</a>
			</li>
			<li>
				<a class="klik_menu" id="ranap" href="<?= base_url('Kasir_poli/hd') ?>"><i class="icon-drawar mr-10 "></i>POLI HEMODIALISA</a>
			</li>
			<li>
				<a class="klik_menu" id="ranap" href="<?= base_url('Kasir_poli/saraf') ?>"><i class="icon-drawar mr-10 "></i>POLI SARAF</a>
			</li>
			<li>
				<a class="klik_menu" id="ranap" href="<?= base_url('Kasir_poli/urologi') ?>"><i class="icon-drawar mr-10 "></i>POLI UROLOGI</a>
			</li>
			<li>
				<a class="klik_menu" id="ranap" href="<?= base_url('Kasir_poli/ginjal') ?>"><i class="icon-drawar mr-10 "></i>POLI GINJAL</a>
			</li>
			<li>
				<a class="klik_menu" id="ranap" href="<?= base_url('Kasir_poli/penyakitmulut') ?>"><i class="icon-drawar mr-10 "></i>POLI PENYAKIT MULUT</a>
			</li>
			<li>
				<a class="klik_menu" id="ranap" href="<?= base_url('Kasir_poli/rehab') ?>"><i class="icon-drawar mr-10 "></i>POLI CONTROL REHABILITAS MEDIC</a>
			</li>
			<li>
				<a class="klik_menu" id="ranap" href="<?= base_url('Kasir_poli/labor') ?>"><i class="icon-drawar mr-10 "></i>POLI LABORATORIUM</a>
			</li>
			<li>
				<a class="klik_menu" id="ranap" href="<?= base_url('Kasir_poli/radiologi') ?>"><i class="icon-drawar mr-10 "></i>POLI RADIOLOGI</a>
			</li>
			<li>
				<a class="klik_menu" id="ranap" href="<?= base_url('Kasir_poli/anastesi') ?>"><i class="icon-drawar mr-10 "></i>POLI ANASTESI</a>
			</li>
			<li>
				<a class="klik_menu" id="ranap" href="<?= base_url('Kasir_poli/anastesi') ?>"><i class="icon-drawar mr-10 "></i>POLI ANASTESI</a>
			</li>
			<li>
				<a class="klik_menu" id="ranap" href="<?= base_url('Kasir_poli/gizi') ?>"><i class="icon-drawar mr-10 "></i>POLI GIZI</a>
			</li>
			<li>
				<a class="klik_menu" id="ranap" href="<?= base_url('Kasir_poli/terapi_wicara') ?>"><i class="icon-drawar mr-10 "></i>POLI TERAPI WICARA</a>
			</li>
		</ul>
	</li>
	<li>
		<a style="cursor:pointer;" data-toggle="collapse" data-target="#dasboard_keuangan"><i class="fa fa-heartbeat mr-10"></i>OBAT<span class="pull-right"><span class="label label-success mr-10">3</span><i class="fa fa-fw fa-angle-down"></i></span></a>
		<ul id="dasboard_keuangan" class="collapse collapse-level-1">
			<li>
				<a href="<?= base_url('Pembelian_obat') ?>"></i>PENERIMAAN OBAT</a>
			</li>
			<li>
				<a href="<?= base_url('Pembelian_obat/total_faktur') ?>">TOTAL PEMBELIAN OBAT</a>
			</li>
			<li>
				<a href="<?= base_url('Po_obat') ?> ">PO OBAT</a>
			</li>

			<!-- <li>
				<a href="<?= base_url('Permintaan_pembelian') ?>"></i>PERMINTAAN PEMBELIAN (PR)</a>
			</li> -->
			<!-- <?php if ($izinAkses == 'admin') { ?>
				<li>
					<a href="<?= base_url('Perencanaan_obat/approve') ?>"></i>APPROVE PERENCANAAN</a>
				</li>
			<?php } ?>
			<li>
				<a href="<?= base_url('Perencanaan_obat') ?>"></i>PERENCANAAN</a>
			</li>

			<li>
				<a href="<?= base_url('Usulan_perencanaan') ?>"></i>USULAN</a>
			</li> -->

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
			<li>
				<a href="<?= base_url('Kasir/Pasien_pulang_mcu'); ?>"><i class="fa fa-share mr-10 "></i>PASIEN PULANG MCU</a>
			</li>
		</ul>
	</li>
	<li>
		<a data-toggle="collapse" data-target="#dashboard_keu_logfar"><i class="icon-drawar mr-10"></i>LOGISTIK FARMASI<span class="pull-right"><span class="label label-success mr-10"></span><i class="fa fa-fw fa-angle-down"></i></span></a>
		<ul id="dashboard_keu_logfar" class="collapse collapse-level-1">
			<li>
				<a href="<?= base_url('Logistik_farmasi/Laporan_pembelian'); ?>">LAPORAN PEMBELIAN</a>
			</li>
			<li>
				<a href="<?= base_url('Logistik_farmasi/Laporan_pembelian_pebal'); ?>">LAPORAN PEMBELIAN PEBAL</a>
			</li>
			<li>
				<a href="<?= base_url('Po_obat') ?> ">PO OBAT</a>
			</li>
			<li>
				<a href="<?= base_url('Logistik_farmasi/Laporan_pembelian'); ?>">LAPORAN PENERIMAAN</a>
			</li>
		</ul>
	</li>
	<!-- <li>
		<a class="klik_menu" id="tambahan" href="<?= base_url('Pasien/Pasien_apm') ?>"><i class="icon-drawar mr-10 "></i>PASIEN ANJUNGAN PENDAFTARAN MANDIRI(APM)</a>
	</li> -->
	<!-- <li>
		<a class="klik_menu" id="ranap" href="<?= base_url('Kasir/Pasien_ranap') ?>"><i class="icon-drawar mr-10 "></i>BILLING PASIEN RANAP</a>
	</li> -->
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
		<a data-toggle="collapse" data-target="#total11"><i class="icon-drawar mr-10"></i>LAPORAN TOTAL DAN MONITORING<span class="pull-right"><span class="label label-success mr-10"></span><i class="fa fa-fw fa-angle-down"></i></span></a>
		<ul id="total11" class="collapse collapse-level-1">
			<li>
				<a class="klik_menu" id="tambahan" href="<?= base_url('Laporan/Laporan_pendapatan_rajal') ?>"><i class="fa fa-file mr-10 "></i>LAPORAN TOTAL POLI</a>
			</li>
			<li>
				<a class="klik_menu" id="tambahan" href="<?= base_url('Laporan/Laporan_pendapatan_igd') ?>"><i class="fa fa-file mr-10 "></i>LAPORAN TOTAL IGD</a>
			</li>
			<li>
				<a class="klik_menu" id="tambahan" href="<?= base_url('Laporan/Laporan_total_pasien') ?>"><i class="fa fa-file mr-10 "></i>LAPORAN TOTAL PASIEN</a>
			</li>
			<li>
				<a class="klik_menu" id="tambahan" href="<?= base_url('Laporan_kunjungan_ranap/Laporan_pengisian_ranap') ?>">LAPORAN PENGISIAN RANAP</a>
			</li>
			<li>
				<a href="<?= base_url('Laporan/Laporan_staff_kasir') ?>"><i class="icon-hourglass mr-10"></i>LAPORAN PENDAPATAN KASIR</a>
			</li>
			<li>
				<a class="klik_menu" id="tambahan" href="<?= base_url('Laporan/Laporan_total_kasir') ?>">LAPORAN TOTAL KASIR</a>
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
				<a class="klik_menu" id="tambahan" href="<?= base_url('Laporan/Laporan_jasa_poli') ?>"><i class="fa fa-file mr-10 "></i>LAPORAN TOTAL JASA DOKTER POLI</a>
			</li>
			<li>
				<a class="klik_menu" id="tambahan" href="<?= base_url('Laporan/Laporan_jasa_ugd') ?>"><i class="fa fa-file mr-10 "></i>LAPORAN TOTAL JASA DOKTER UGD</a>
			</li>
			<li>
				<a class="klik_menu" id="tambahan" href="<?= base_url('Laporan_pendapatan/Laporan_pendapatan_keuangan') ?>"><i class="fa fa-file mr-10 "></i>LAPORAN PENDAPATAN KEUANGAN</a>
			</li>
			<li>
				<a class="klik_menu" id="tambahan" href="<?= base_url('Laporan/Laporan_jasmed') ?>"><i class="fa fa-file mr-10 "></i>LAPORAN DETAIL JASA DOKTER</a>
			</li>
			<li>
				<a class="klik_menu" id="tambahan" href="<?= base_url('Casemix/Erm') ?>"><i class="icon-note mr-10 "></i>ERM</a>
			</li>
		</ul>
	</li>
	<li>
		<a href="<?= base_url('Po_obat/obat') ?> "><i class="ti-book mr-10 "></i>OBAT</a>
	</li>
	<li>
		<a class="klik_menu" id="tambahan" href="<?= base_url('Laporan/Laporan_cara_bayar') ?>">LAPORAN KUNJUNGAN POLI DAN CARA BAYAR</a>
	</li>
	<li>
		<a href="<?= base_url('Laporan_pendapatan/Laporan_pendapatan') ?>"><i class="icon-doc mr-10 "></i>LAPORAN PENDAPATAN</a>
	</li>
	<li>
		<a class="klik_menu" id="tambahan" href="<?= base_url('Laporan_kunjungan_ranap/Laporan_pengisian_ranap') ?>">LAPORAN PENGISIAN RANAP</a>
	</li>
	<li>
		<a data-toggle="collapse" data-target="#dashboard_keu_lab"><i class="icon-drawar mr-10"></i>LABOR<span class="pull-right"><span class="label label-success mr-10"></span><i class="fa fa-fw fa-angle-down"></i></span></a>
		<ul id="dashboard_keu_lab" class="collapse collapse-level-1">
			<li>
				<a href="<?= base_url('Labor/laporan_laboratorium') ?>"><i class="icon-doc mr-10 "></i>LAPORAN LABOR</a>
			</li>
			<li>
				<a href="<?= base_url('Labor/laporan_tindakan') ?>"><i class="icon-doc mr-10 "></i>LAPORAN LABOR
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TINDAKAN</a>
			</li>
		</ul>
	</li>
	<li>
		<a data-toggle="collapse" data-target="#dashboard_keu_rad"><i class="icon-drawar mr-10"></i>RADIOLOGI<span class="pull-right"><span class="label label-success mr-10"></span><i class="fa fa-fw fa-angle-down"></i></span></a>
		<ul id="dashboard_keu_rad" class="collapse collapse-level-1">
			<li>
				<a href="<?= base_url('Radiologi/Laporan_radiologi') ?>"><i class="icon-chart mr-10 "></i>LAPORAN
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;RADIOLOGI</a>
			</li>
			<li>
				<a href="<?= base_url('Radiologi/Laporan_tindakan_radiologi') ?>"><i class="icon-chart mr-10 "></i>LAPORAN
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;RADIOLOGI
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TINDAKAN</a>
			</li>
		</ul>
	</li>
	<li>
		<a data-toggle="collapse" data-target="#dashboard_dr2m" href="javascript:void(0);"><i class="icon-note mr-10"></i>LAPORAN OBAT MCS<span class="pull-right"><span class="label label-success mr-10"></span><i class="fa fa-fw fa-angle-down"></i></span></a>
		<ul id="dashboard_dr2m" class="collapse collapse-level-1">
			<li>
				<a class="klik_menu" id="laporanObatRajalSanbe" href="<?= base_url('Apotik/Laporan_pasien_rajal_sanbe') ?>"> </i>LAPORAN RAJAL PASIEN TIMAH</a>
			</li>
			<li>
				<a class="klik_menu" id="laporanObatRanapSanbe" href="<?= base_url('Apotik/Laporan_pasien_ranap_sanbe') ?>"> </i>LAPORAN RANAP PASIEN TIMAH</a>
			</li>
		</ul>
	</li>

	<li>
		<a href="<?= base_url('Permintaan_obat') ?>"><i class="icon-hourglass mr-10"></i>PERMINTAAN OBAT</a>
	</li>
	<li>
		<a href="<?= base_url('stok_obat_ok') ?>"><i class="ti-package mr-10 "></i>STOCK OBAT </a>
	</li>
	<li>
		<a class="klik_menu" id="tambahan" href="<?= base_url('Jurnal_onuse/Rekap_penyusutan') ?>">REKAP PENYUSUTAN</a>
	</li>
	<li>
		<a data-toggle="collapse" data-target="#jurnal"><i class="fa fa-folder mr-10"></i>INSENTIF JASA DOKTER<span class="pull-right"><span class="label label-success mr-10"></span><i class="fa fa-fw fa-angle-down"></i></span></a>
		<ul id="jurnal" class="collapse collapse-level-1">
			<li>
				<a class="klik_menu" id="tambahan" href="<?= base_url('Keuangan_IJD/Verifikasi_ijd') ?>">VERIFIKASI IJD</a>
			</li>
			<li>
				<a class="klik_menu" id="tambahan" href="<?= base_url('Keuangan_IJD/Laporan_jurnal_ijd') ?>">JURNAL IJD</a>
			</li>
			<li>
				<a class="klik_menu" id="tambahan" href="<?= base_url('Keuangan_IJD/Summary_ijd') ?>">LAPORAN JURNAL IJD</a>
			</li>
		</ul>
	</li>
	<li>
		<a style="cursor:pointer;" data-toggle="collapse" data-target="#jurnalkas"><i class="fa fa-folder mr-10"></i>JURNAL KAS/BANK<span class="pull-right"><span class="label label-success mr-10"></span><i class="fa fa-fw fa-angle-down"></i></span></a>
		<ul id="jurnalkas" class="collapse collapse-level-1">
			<li>
				<a class="klik_menu" id="tambahan" href="<?= base_url('Jurnal_kasbank/Jurnal/kas') ?>">JURNAL KAS MANUAL</a>
			</li>
			<li>
				<a class="klik_menu" id="tambahan" href="<?= base_url('Jurnal_kasbank/Jurnal/bank') ?>">JURNAL BANK MANUAL</a>
			</li>
			<li>
				<a class="klik_menu" id="tambahan" href="<?= base_url('Jurnal_keuangan/Laporan_jurnal_bank') ?>">JURNAL MONEY IN TRANSIT</a>
			</li>
		</ul>
	</li>
	<li>
		<a style="cursor:pointer;" data-toggle="collapse" data-target="#jurnal1"><i class="fa fa-folder mr-10"></i>JURNAL<span class="pull-right"><span class="label label-success mr-10"></span><i class="fa fa-fw fa-angle-down"></i></span></a>
		<ul id="jurnal1" class="collapse collapse-level-1">
			<li>
				<a class="klik_menu" id="tambahan" href="<?= base_url('Jurnal_keuangan/Laporan_jurnal_rajal') ?>">JURNAL RAJAL TUNAI</a>
			</li>
			<li>
				<a class="klik_menu" id="tambahan" href="<?= base_url('Jurnal_keuangan/Laporan_jurnal_rajal_nontunai') ?>">JURNAL RAJAL NON TUNAI</a>
			</li>
			<li>
				<a class="klik_menu" id="tambahan" href="<?= base_url('Jurnal_keuangan/Laporan_jurnal_ranap') ?>">JURNAL RANAP TUNAI</a>
			</li>
			<li>
				<a class="klik_menu" id="tambahan" href="<?= base_url('Jurnal_keuangan/Laporan_jurnal_ranap_nontunai') ?>">JURNAL RANAP NON TUNAI</a>
			</li>
			
			<li>
				<a class="klik_menu" id="tambahan" href="<?= base_url('Jurnal_keuangan/Laporan_jurnal_pau') ?>">JURNAL PAU</a>
			</li>
			<li>
				<a class="klik_menu" id="tambahan" href="<?= base_url('Jurnal_onuse/Jurnal_penyusutan') ?>">JURNAL PENYUSUTAN</a>
			</li>
			<li>
				<a class="klik_menu" id="tambahan" href="<?= base_url('Jurnal_onuse/Jurnal_material') ?>">JURNAL MATERIAL</a>
			</li>
			<li>
				<a class="klik_menu" id="tambahan" href="<?= base_url('Jurnal_manual/Jurnal_rupa') ?>">JURNAL RUPA-RUPA</a>
			</li>
		</ul>
	</li>
	<li>
		<a style="cursor:pointer;" data-toggle="collapse" data-target="#jurnal3"><i class="icon-note mr-10"></i>VERIFIKASI JURNAL<span class="pull-right"><span class="label label-success mr-10"></span><i class="fa fa-fw fa-angle-down"></i></span></a>
		<ul id="jurnal3" class="collapse collapse-level-1">
			<li>
				<a class="klik_menu" id="tambahan" href="<?= base_url('Jurnal_keuangan/Verifikasi_jurnal_pendapatan') ?>">VERIFIKASI JURNAL PENDAPATAN</a>
			</li>
			<li>
				<a class="klik_menu" id="tambahan" href="<?= base_url('Jurnal_manual/Jurnal_rupa_verifikasi') ?>">VERIFIKASI JURNAL RUPA-RUPA</a>
			</li>
			<li>
				<a class="klik_menu" id="tambahan" href="<?= base_url('Jurnal_kasbank/Verifikasi/kas') ?>">VERIFIKASI JURNAL KAS</a>
			</li>
			<li>
				<a class="klik_menu" id="tambahan" href="<?= base_url('Jurnal_kasbank/Verifikasi/bank') ?>">VERIFIKASI JURNAL BANK</a>
			</li>
		</ul>
	</li>
	<li>
		<a style="cursor:pointer;" data-toggle="collapse" data-target="#jurnal2"><i class="icon-note mr-10"></i>LAPORAN JURNAL<span class="pull-right"><span class="label label-success mr-10"></span><i class="fa fa-fw fa-angle-down"></i></span></a>
		<ul id="jurnal2" class="collapse collapse-level-1">
			<li>
				<a class="klik_menu" id="tambahan" href="<?= base_url('Jurnal_keuangan/Laporan_summary_jurnal') ?>">LAPORAN SUMMARY JURNAL</a>
			</li>
			<li>
				<a class="klik_menu" id="tambahan" href="<?= base_url('Jurnal_keuangan/Laporan_summary_pau') ?>">LAPORAN JURNAL PAU</a>
			</li>
			<li>
				<a class="klik_menu" id="tambahan" href="<?= base_url('Jurnal_keuangan/Laporan_summary_bank') ?>">LAPORAN JURNAL BANK</a>
			</li>

			<li>
				<a class="klik_menu" id="tambahan" href="<?= base_url('Jurnal_keuangan/Laporan_rekap_jurnal') ?>">REKAP JURNAL</a>
			</li>
			<li>
				<a class="klik_menu" id="tambahan" href="<?= base_url('Jurnal_onuse/Laporan_jurnal_material') ?>">LAPORAN JURNAL MATERIAL</a>
			</li>
		</ul>
	</li>

<?php } elseif ($datatipe == 'penata') { ?>
	<li>
		<a href="<?= base_url('Apelkes') ?>"><i class="icon-hourglass mr-10"></i>BILLING PASIEN RANAP</a>
	</li>
	<!-- <li>
		<a class="klik_menu" id="ranap" href="<?= base_url('Kasir/Pasien_ranap') ?>"><i class="icon-drawar mr-10 "></i>PASIEN RANAP</a>
	</li> -->
	<li>
		<a class="klik_menu" id="rajal" href="<?= base_url('Kasir/Pasien_rajal_ugd') ?>"><i class="icon-drawar mr-10 "></i>BILLING PASIEN UGD</a>
	</li>
	<li>
		<a data-toggle="collapse" data-target="#dashboard_poli"><i class="icon-user mr-10"></i>BILLING PASIEN POLI<span class="pull-right"><span class="label label-success mr-12">15</span><i class="fa fa-fw fa-angle-down"></i></span></a>
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
				<a class="klik_menu" id="ranap" href="<?= base_url('Kasir_poli/fisio') ?>"><i class="icon-drawar mr-10 "></i>POLI FISIO</a>
			</li>
			<li>
				<a class="klik_menu" id="ranap" href="<?= base_url('Kasir_poli/akupuntur') ?>"><i class="icon-drawar mr-10 "></i>POLI AKUPUNTUR</a>
			</li>
			<li>
				<a class="klik_menu" id="ranap" href="<?= base_url('Kasir_poli/bedahmulut') ?>"><i class="icon-drawar mr-10 "></i>POLI BEDAH MULUT</a>
			</li>
			<li>
				<a class="klik_menu" id="ranap" href="<?= base_url('Kasir_poli/kesjiwa') ?>"><i class="icon-drawar mr-10 "></i>POLI KESEHATAN JIWA</a>
			</li>
			<li>
				<a class="klik_menu" id="ranap" href="<?= base_url('Kasir_poli/orthopedi') ?>"><i class="icon-drawar mr-10 "></i>POLI ORTHOPEDI</a>
			</li>
			<li>
				<a class="klik_menu" id="ranap" href="<?= base_url('Kasir_poli/paru') ?>"><i class="icon-drawar mr-10 "></i>POLI PARU</a>
			</li>
			<li>
				<a class="klik_menu" id="ranap" href="<?= base_url('Kasir_poli/hd') ?>"><i class="icon-drawar mr-10 "></i>POLI HEMODIALISA</a>
			</li>
			<li>
				<a class="klik_menu" id="ranap" href="<?= base_url('Kasir_poli/saraf') ?>"><i class="icon-drawar mr-10 "></i>POLI SARAF</a>
			</li>
			<li>
				<a class="klik_menu" id="ranap" href="<?= base_url('Kasir_poli/urologi') ?>"><i class="icon-drawar mr-10 "></i>POLI UROLOGI</a>
			</li>
			<li>
				<a class="klik_menu" id="ranap" href="<?= base_url('Kasir_poli/ginjal') ?>"><i class="icon-drawar mr-10 "></i>POLI GINJAL</a>
			</li>
			<li>
				<a class="klik_menu" id="ranap" href="<?= base_url('Kasir_poli/penyakitmulut') ?>"><i class="icon-drawar mr-10 "></i>POLI PENYAKIT MULUT</a>
			</li>
			<li>
				<a class="klik_menu" id="ranap" href="<?= base_url('Kasir_poli/rehab') ?>"><i class="icon-drawar mr-10 "></i>POLI CONTROL REHABILITAS MEDIC</a>
			</li>
			<li>
				<a class="klik_menu" id="ranap" href="<?= base_url('Kasir_poli/labor') ?>"><i class="icon-drawar mr-10 "></i>POLI LABORATORIUM</a>
			</li>
			<li>
				<a class="klik_menu" id="ranap" href="<?= base_url('Kasir_poli/radiologi') ?>"><i class="icon-drawar mr-10 "></i>POLI RADIOLOGI</a>
			</li>
			<li>
				<a class="klik_menu" id="ranap" href="<?= base_url('Kasir_poli/anastesi') ?>"><i class="icon-drawar mr-10 "></i>POLI ANASTESI</a>
			</li>
			<li>
				<a class="klik_menu" id="ranap" href="<?= base_url('Kasir_poli/anastesi') ?>"><i class="icon-drawar mr-10 "></i>POLI ANASTESI</a>
			</li>
			<li>
				<a class="klik_menu" id="ranap" href="<?= base_url('Kasir_poli/gizi') ?>"><i class="icon-drawar mr-10 "></i>POLI GIZI</a>
			</li>
			<li>
				<a class="klik_menu" id="ranap" href="<?= base_url('Kasir_poli/terapi_wicara') ?>"><i class="icon-drawar mr-10 "></i>POLI TERAPI WICARA</a>
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
			<li>
				<a href="<?= base_url('Kasir/Pasien_pulang_mcu'); ?>"><i class="fa fa-share mr-10 "></i>PASIEN PULANG MCU</a>
			</li>
		</ul>
	</li>
	<!-- <li>
		<a class="klik_menu" id="tambahan" href="<?= base_url('Pasien/Pasien_apm') ?>"><i class="icon-drawar mr-10 "></i>PASIEN ANJUNGAN PENDAFTARAN MANDIRI(APM)</a>
	</li> -->
	<!-- <li>
		<a class="klik_menu" id="ranap" href="<?= base_url('Kasir/Pasien_ranap') ?>"><i class="icon-drawar mr-10 "></i>BILLING PASIEN RANAP</a>
	</li> -->
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
		<a href="<?= base_url('Po_obat/obat') ?> "><i class="ti-book mr-10 "></i>OBAT</a>
	</li>
	<li>
		<a class="klik_menu" id="tambahan" href="<?= base_url('Laporan/Laporan_cara_bayar') ?>">LAPORAN KUNJUNGAN POLI DAN CARA BAYAR</a>
	</li>
	<li>
		<a href="<?= base_url('Laporan_pendapatan/Laporan_pendapatan') ?>"><i class="icon-doc mr-10 "></i>LAPORAN PENDAPATAN</a>
	</li>
	<li>
		<a class="klik_menu" id="tambahan" href="<?= base_url('Laporan_kunjungan_ranap/Laporan_pengisian_ranap') ?>">LAPORAN PENGISIAN RANAP</a>
	</li>


<?php } elseif ($datatipe == 'bpi') { ?>
	<!-- <li>
		<a href="<?= base_url('Obat_bebas') ?>"><i class="ti-package mr-10 "></i>OBAT BEBAS</a>
	</li> -->
	<li>
		<a href="<?= base_url('Permintaan_obat_unit') ?>"><i class="icon-hourglass mr-10"></i>PERMINTAAN OBAT</a>
	</li>
	<li>
		<a href="<?= base_url('stok_obat_ok') ?>"><i class="ti-package mr-10 "></i>STOCK OBAT </a>
	</li>

<?php } elseif ($datatipe == 'pnmobat') { ?>
	<!-- <li>
		<a href="<?= base_url('Obat_bebas') ?>"><i class="ti-package mr-10 "></i>OBAT BEBAS</a>
	</li> -->
	<li>
		<a href="<?= base_url('Permintaan_obat_unit') ?>"><i class="icon-hourglass mr-10"></i>PERMINTAAN OBAT</a>
	</li>
	<li>
		<a href="<?= base_url('stok_obat_ok') ?>"><i class="ti-package mr-10 "></i>STOCK OBAT </a>
	</li>
<?php } elseif ($datatipe == 'cssd') { ?>
	<!-- <li>
		<a href="<?= base_url('Obat_bebas') ?>"><i class="ti-package mr-10 "></i>OBAT BEBAS</a>
	</li> -->


	<li>
		<a href="<?= base_url('Permintaan_obat_unit') ?>"><i class="icon-hourglass mr-10"></i>PERMINTAAN OBAT</a>
	</li>
	<li>
		<a href="<?= base_url('stok_obat_ok') ?>"><i class="ti-package mr-10 "></i>STOCK OBAT </a>
	</li>
<?php } elseif ($datatipe == 'casemanager') { ?>
	<li>
		<a href="<?= base_url('Apelkes') ?>"><i class="icon-hourglass mr-10"></i>BILLING PASIEN</a>
	</li>
	<li>
		<a href="<?= base_url('Admin_kamar/informasi') ?>"><i class="fa fa-bed mr-10"></i>FASILITAS TEMPAT TIDUR RANAP</a>
	</li>
	<li>
		<a href="<?= base_url('mcu/laporan_kunjungan_mcu') ?>"><i class="icon-docs mr-10"></i>Laporan Kunjungan MCU</a>
	</li>
	<li>
		<a class="klik_menu" id="tambahan" href="<?= base_url('Laporan/Laporan_cara_bayar') ?>">LAPORAN KUNJUNGAN POLI PER DOKTER</a>
	</li>
	<li>
		<a class="klik_menu" id="tambahan" href="<?= base_url('Laporan/Laporan_kunjunganbyCB') ?>">LAPORAN POLI PER CARA BAYAR</a>
	</li>
	<li>
		<a class="klik_menu" id="tambahan" href="<?= base_url('Laporan_kunjungan_ranap') ?>"><i class="icon-note mr-10 "></i>LAPORAN KUNJUNGAN RAWAT INAP</a>
	</li>
	<li>
		<a href="<?= base_url('Permintaan_obat_unit') ?>"><i class="icon-hourglass mr-10"></i>PERMINTAAN OBAT</a>
	</li>
	<li>
		<a href="<?= base_url('stok_obat_ok') ?>"><i class="ti-package mr-10 "></i>STOCK OBAT </a>
	</li>
<?php } elseif ($datatipe == 'psdmp') { ?>
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
				<a href="<?= base_url('Laporan/bor'); ?>">LAPORAN BOR</a>
			</li>
		</ul>
	</li>
<?php } elseif ($datatipe == 'pemasaran') { ?>
	<li>
	<li>
		<a href="<?= base_url('Laporan/kunjungan'); ?>">LAPORAN KUNJUNGAN</a>
	</li>
	<li>
		<a href="<?= base_url('Pasien_poli/Pasien_rajal') ?>">PASIEN POLI</a>
	</li>

<?php } elseif ($datatipe == 'direktur') { ?>
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
				<a href="<?= base_url('Laporan/bor'); ?>">LAPORAN BOR</a>
			</li>
		</ul>
	</li>
	<li>
		<a style="cursor:pointer;" data-toggle="collapse" data-target="#log_dr"><i class="icon-graph mr-10"></i>LOGISTIK FARMASI<span class="pull-right"><i class="fa fa-fw fa-angle-down"></i></span></a>
		<ul id="log_dr" class="collapse collapse-level-1">

			<li>
				<a href="<?= base_url('Perencanaan_obat/approve') ?>"></i>PERENCANAAN OBAT</a>
			</li>
		</ul>
	</li>
<?php } elseif ($datatipe == 'igdponek') { ?>
	<li>
	<li>
		<a href="<?= base_url('Rawatinap/pasien_ranap') ?>"><i class="icon-hourglass mr-10"></i>PASIEN RAWAT
			INAP</a>
	</li>
	<li>
		<a href="<?= base_url('IGD') ?>"><i class="fa fa-ambulance mr-10"></i>PASIEN IGD &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
	</li>
	<li>
		<a class="klik_menu" id="tambahan" href="<?= base_url('IGD/Erm_igd') ?>"><i class="icon-note mr-10 "></i>RIWAYAT ERM</a>
	</li>
	<li>
		<a href="<?= base_url('Permintaan_obat_unit') ?>"><i class="icon-hourglass mr-10"></i>PERMINTAAN OBAT</a>
	</li>
	<li>
		<a href="<?= base_url('stok_obat_ok') ?>"><i class="ti-package mr-10 "></i>STOCK OBAT </a>
	</li>
<?php } elseif ($datatipe == 'homecare') { ?>
	<li>
	<li>
		<a href="<?= base_url('Homecare') ?> "><i class="fa fa-laptop mr-10"></i>DATA HOME CARE</a>
	</li>

	<li>
		<a href="<?= base_url('Laporan_kunjungan_homecare') ?> "><i class="fa fa-bar-chart-o mr-10"></i>LAPORAN HOME CARE</a>
	</li>

	<li>
		<a href="<?= base_url('Homecare/tindakan_homecare') ?> "><i class="ti-bookmark mr-10"></i>TINDAKAN HOME CARE</a>
	</li>
	<li>
		<a href="<?= base_url('Homecare/Perawat') ?> "><i class="ti-user mr-10"></i>PERAWAT HOME CARE</a>
	</li>
	<li>
		<a href="<?= base_url('Permintaan_obat_unit') ?>"><i class="icon-hourglass mr-10"></i>PERMINTAAN OBAT</a>
	</li>
<?php } elseif ($datatipe == 'kemoterapi') { ?>
	<li>
		<a href="<?= base_url('Permintaan_obat_unit') ?>"><i class="icon-hourglass mr-10"></i>PERMINTAAN OBAT</a>
	</li>
	<li>
		<a href="<?= base_url('stok_obat_ok') ?>"><i class="ti-package mr-10 "></i>STOCK OBAT </a>
	</li>
<?php } elseif ($datatipe == 'keamanan') { ?>
	<li>
		<a href="<?= base_url('Permintaan_obat_unit') ?>"><i class="icon-hourglass mr-10"></i>PERMINTAAN OBAT</a>
	</li>
	<li>
		<a href="<?= base_url('stok_obat_ok') ?>"><i class="ti-package mr-10 "></i>STOCK OBAT </a>
	</li>
<?php } elseif ($datatipe == 'kamarjenazah') { ?>
	<li>
		<a href="<?= base_url('Permintaan_obat') ?>"><i class="icon-hourglass mr-10"></i>PERMINTAAN OBAT</a>
	</li>
	<li>
		<a href="<?= base_url('stok_obat_ok') ?>"><i class="ti-package mr-10 "></i>STOCK OBAT </a>
	</li>
<?php } elseif ($datatipe == 'korsek') { ?>
	<li>
		<a href="<?= base_url('Permintaan_obat_unit') ?>"><i class="icon-hourglass mr-10"></i>PERMINTAAN OBAT</a>
	</li>
	<li>
		<a href="<?= base_url('stok_obat_ok') ?>"><i class="ti-package mr-10 "></i>STOCK OBAT </a>
	</li>
<?php } elseif ($datatipe == 'gateknik') { ?>
	<li>
		<a href="<?= base_url('Permintaan_obat') ?>"><i class="icon-hourglass mr-10"></i>PERMINTAAN OBAT</a>
	</li>
	<li>
		<a href="<?= base_url('stok_obat_ok') ?>"><i class="ti-package mr-10 "></i>STOCK OBAT </a>
	</li>
<?php } elseif ($datatipe == 'sdm') { ?>
	<li>
		<a href="<?= base_url('Permintaan_obat') ?>"><i class="icon-hourglass mr-10"></i>PERMINTAAN OBAT</a>
	</li>
	<li>
		<a href="<?= base_url('stok_obat_ok') ?>"><i class="ti-package mr-10 "></i>STOCK OBAT </a>
	</li>
<?php } elseif ($datatipe == 'farmasiklinis') { ?>
	<li>
		<a href="<?= base_url('Permintaan_obat') ?>"><i class="icon-hourglass mr-10"></i>PERMINTAAN OBAT</a>
	</li>
	<li>
		<a href="<?= base_url('stok_obat_ok') ?>"><i class="ti-package mr-10 "></i>STOCK OBAT </a>
	</li>
	<!-- </?php } elseif ($datatipe == 'laboratorium') { ?>
	<li>
		<a href="<?= base_url('Pencarian_pasien') ?>"><i class="icon-magnifier mr-10"></i>PASIEN BARU</a>
	</li>
	<li>
		<a href="<?= base_url('Penunjang_RM/Pasien_labor') ?>"><i class="icon-user-following mr-10"></i>PASIEN LABOR</a>
	</li>
	<li>
		<a class="klik_menu" id="ranap" href="<?= base_url('Kasir_poli/labor') ?>"><i class="icon-drawar mr-10 "></i>KASIR LABORATORIUM</a>
	</li>
	<li>
		<a href="<?= base_url('Permintaan_obat') ?>"><i class="icon-hourglass mr-10"></i>PERMINTAAN OBAT</a>
	</li>
	<li>
		<a href="<?= base_url('stok_obat_ok') ?>"><i class="ti-package mr-10 "></i>STOCK OBAT </a>
	</li> -->
<?php } elseif ($datatipe == 'laporan') { ?>
	<li>
		<a style="cursor:pointer;" data-toggle="collapse" data-target="#rl1"><i class="icon-graph mr-10"></i>LAPORAN RL 1<span class="pull-right"><span class="label label-success mr-10"></span><i class="fa fa-fw fa-angle-down"></i></span></a>
		<ul id="rl1" class="collapse collapse-level-1">
			<li>
				<a href="<?= base_url('Laporan/Laporan_data_rs'); ?>">Data Dasar Rumah Sakit</a>
			</li>
			<li>
				<a href="<?= base_url('Laporan/bor'); ?>">INDIKATOR PELAYANAN RUMAH SAKIT</a>
			</li>
			<li>
				<a href="<?= base_url('Admin_kamar/informasi') ?>"><i class="fa fa-bed mr-10"></i>FASILITAS TEMPAT TIDUR RANAP</a>
			</li>
		</ul>
	</li>
	<li>
		<a href="<?= base_url('Laporan/Laporan_ketenagaan'); ?>"><i class="icon-docs mr-10"></i>LAPORAN RL 2 KETENAGAAN</a>
	</li>
	<li>
		<a style="cursor:pointer;" data-toggle="collapse" data-target="#rl3"><i class="icon-graph mr-10"></i>LAPORAN RL 3<span class="pull-right"><span class="label label-success mr-10"></span><i class="fa fa-fw fa-angle-down"></i></span></a>
		<ul id="rl3" class="collapse collapse-level-1">
			<li>
				<a href="<?= base_url('Laporan/laporan_kesehatan_gigi_mulut'); ?>">LAPORAN KESEHATAN GIGI MULUT</a>
			</li>
			<li>
				<a href="<?= base_url('Laporan/laporan_kesehatan_rehab_medik'); ?>">LAPORAN REHAB MEDIK DAN KES. JIWA</a>
			</li>
			<li>
				<a href="<?= base_url('Laporan/Laporan_kunjungan_rawat_darurat'); ?>">KUNJUNGAN RAWAT DARURAT</a>
			</li>
			<li>
				<a href="<?= base_url('Laporan/kebidanan'); ?>">KEGIATAN KEBIDANAN</a>
			</li>
			<li>
				<a href="<?= base_url('Laporan/perinatologi'); ?>">KEGIATAN PERINATOLOGI</a>
			</li>
			<li>
				<a href="<?= base_url('Laporan/pembedahan'); ?>">KEGIATAN PEMBEDAHAN</a>
			</li>
			<li>
				<a href="<?= base_url('Laporan/kb'); ?>">KEGIATAN KB</a>
			</li>
			<li>
				<a href="<?= base_url('Laporan/rujukan_rl'); ?>">KEGIATAN RUJUKAN</a>
			</li>
			<li>
				<a href="<?= base_url('Labor/laporan_tindakan') ?>"><i class="icon-doc mr-10 "></i>LAPORAN LABOR
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TINDAKAN</a>
			</li>
			<li>
				<a href="<?= base_url('Radiologi/Laporan_tindakan_radiologi') ?>"><i class="icon-chart mr-10 "></i>TINDAKAN RADIOLOGI </a>
			</li>
			<li>
				<a class="klik_menu" id="tambahan" href="<?= base_url('Laporan/Laporan_kunjunganbyCB') ?>">CARA BAYAR</a>
			</li>
		</ul>
	</li>
	<li>
		<a style="cursor:pointer;" data-toggle="collapse" data-target="#rl4"><i class="icon-graph mr-10"></i>LAPORAN RL 4<span class="pull-right"><span class="label label-success mr-10"></span><i class="fa fa-fw fa-angle-down"></i></span></a>
		<ul id="rl4" class="collapse collapse-level-1">
			<li>
				<a href="<?= base_url('Laporan/Laporan_morbiditas_ranap'); ?>">Data Keadaan Morbiditas Pasien Rawat Inap</a>
			</li>
			<li>
				<a href="<?= base_url('Laporan/Laporan_morbiditas_ranap'); ?>">Data Keadaan Morbiditas Pasien Rawat Inap Penyebab Kecelakaan</a>
			</li>
			<li>
				<a href="<?= base_url('Laporan/Laporan_morbiditas_ranap'); ?>">Data Keadaan Morbiditas Pasien Rawat Jalan</a>
			</li>
			<li>
				<a href="<?= base_url('Laporan/Laporan_morbiditas_ranap'); ?>">Data Keadaan Morbiditas Pasien Rawat Jalan Penyebab Kecelakaan</a>
			</li>
		</ul>
	</li>
	<li>
		<a style="cursor:pointer;" data-toggle="collapse" data-target="#rl5"><i class="icon-graph mr-10"></i>LAPORAN RL 5<span class="pull-right"><span class="label label-success mr-10"></span><i class="fa fa-fw fa-angle-down"></i></span></a>
		<ul id="rl5" class="collapse collapse-level-1">
			<li>
				<a href="<?= base_url('Laporan/Laporan_kunjungan_rajal'); ?>">KUNJUNGAN RAWAT JALAN</a>
			</li>
			<li>
				<a href="<?= base_url('Laporan/Laporan_kunjungan_rs'); ?>">KUNJUNGAN RUMAH SAKIT</a>
			</li>
			<li>
				<a href="<?= base_url('Laporan/Laporan_penyakit_tertinggi_rajal'); ?>"><i class="icon-doc mr-10 "></i>10 PENYAKIT TERTINGGI RAJAL</a>
			</li>
		</ul>
	</li>
	<li>
		<a data-toggle="collapse" style="cursor:pointer;" data-target="#tindakanpm"><i class="icon-graph mr-10"></i>RIWAYAT ERM<span class="pull-right"><span class="label label-success mr-10"></span><i class="fa fa-fw fa-angle-down"></i></span></a>
		<ul id="tindakanpm" class="collapse collapse-level-1">
			<li>
				<a class="klik_menu" id="tambahan" href="<?= base_url('Poli/erm_igd') ?>"><i class="icon-note mr-10 "></i>RIWAYAT ERM POLI</a>
			</li>
			<li>
				<a class="klik_menu" id="tambahan" href="<?= base_url('IGD/Erm_igd') ?>"><i class="icon-note mr-10 "></i>RIWAYAT ERM IGD</a>
			</li>
		</ul>
	</li>
<?php } elseif ($datatipe == 'keperawatan') { ?>
	<li>
		<a href="<?= base_url('mcu/laporan_kunjungan_mcu') ?>"><i class="icon-docs mr-10"></i>Laporan Kunjungan MCU</a>
	</li>
	<li>
		<a class="klik_menu" id="tambahan" href="<?= base_url('Laporan/Laporan_cara_bayar') ?>">LAPORAN KUNJUNGAN POLI PER DOKTER</a>
	</li>
	<li>
		<a class="klik_menu" id="tambahan" href="<?= base_url('Laporan_kunjungan_ranap') ?>"><i class="icon-note mr-10 "></i>LAPORAN KUNJUNGAN RAWAT INAP</a>
	</li>
	<li>
		<a class="klik_menu" id="tambahan" href="<?= base_url('Laporan/Laporan_kunjunganbyCB') ?>">LAPORAN POLI PER CARA BAYAR</a>
	</li>
	<li>
		<a href="<?= base_url('Permintaan_obat_unit') ?>"><i class="icon-hourglass mr-10"></i>PERMINTAAN OBAT</a>
	</li>
	<li>
		<a href="<?= base_url('stok_obat_ok') ?>"><i class="ti-package mr-10 "></i>STOCK OBAT </a>
	</li>
<?php } elseif ($datatipe == 'sekretariat') { ?>
	<li>
		<a href="<?= base_url('IGD/Laporan_igd') ?>"><i class="fa fa-ambulance mr-10"></i>LAPORAN KUNJUNG UGD &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
	</li>
	<li>
		<a class="klik_menu" id="tambahan" href="<?= base_url('Laporan/Laporan_cara_bayar') ?>">LAPORAN KUNJUNGAN POLI DAN CARA BAYAR</a>
	</li>
	<li>
		<a href="<?= base_url('Laporan/Laporan_kunjungan_igd'); ?>"><i class="fa fa-bar-chart mr-10 "></i>LAPORAN KUNJUNGAN IGD PER KLAIM</a>
	</li>
	<li>
		<a href="<?= base_url('Laporan/bor'); ?>">LAPORAN BOR </a>
	</li>
	<li>
		<a class="klik_menu" id="tambahan" href="<?= base_url('Laporan_kunjungan_ranap') ?>"><i class="icon-note mr-10 "></i>LAPORAN KUNJUNGAN RAWAT INAP</a>
	</li>
	<li>
		<a class="klik_menu" id="tambahan" href="<?= base_url('Laporan/Laporan_kunjunganbyCB') ?>">CARA BAYAR</a>
	</li>
<?php } elseif ($datatipe == 'direktur utama') { ?>
	<li>
		<a href="<?= base_url('Laporan/Laporan_pasien_batal'); ?>"><i class="icon-doc mr-10 "></i>LAPORAN PASIEN BATAL BEROBAT</a>
	</li>
	<li>
		<a class="klik_menu" id="tambahan" href="<?= base_url('Laporan/Laporan_poli_ranap') ?>"><i class="icon-note mr-10 "></i>LAPORAN JUMLAH PASIEN POLI RANAP</a>
	</li>
	<li>
		<a class="klik_menu" id="tambahan" href="<?= base_url('Laporan/Laporan_cara_bayar') ?>"><i class="icon-note mr-10 "></i>LAPORAN KUNJUNGAN POLI DAN CARA BAYAR</a>
	</li>

	<li>
		<a style="cursor:pointer;" data-toggle="collapse" data-target="#rl3"><i class="icon-graph mr-10"></i>LAPORAN RL 3<span class="pull-right"><span class="label label-success mr-10"></span><i class="fa fa-fw fa-angle-down"></i></span></a>
		<ul id="rl3" class="collapse collapse-level-1">
			<li>
				<a href="<?= base_url('Labor/laporan_tindakan') ?>"><i class="icon-doc mr-10 "></i>LAPORAN LABOR
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TINDAKAN</a>
			</li>
			<li>
				<a href="<?= base_url('Radiologi/Laporan_tindakan_radiologi') ?>"><i class="icon-chart mr-10 "></i>LAPORAN TINDAKAN RADIOLOGI </a>
			</li>
			<li>
				<a class="klik_menu" id="tambahan" href="<?= base_url('Laporan/Laporan_kunjunganbyCB') ?>">CARA BAYAR</a>
			</li>
		</ul>
	</li>
	<li>
		<a style="cursor:pointer;" data-toggle="collapse" data-target="#rl5"><i class="icon-graph mr-10"></i>LAPORAN RL 5<span class="pull-right"><span class="label label-success mr-10"></span><i class="fa fa-fw fa-angle-down"></i></span></a>
		<ul id="rl5" class="collapse collapse-level-1">
			<li>
				<a href="<?= base_url('Laporan/Laporan_kunjungan_rajal'); ?>">KUNJUNGAN RAWAT JALAN</a>
			</li>
			<li>
				<a href="<?= base_url('Laporan/Laporan_kunjungan_rs'); ?>">KUNJUNGAN RUMAH SAKIT</a>
			</li>

		</ul>
	</li>
	<li>
		<a style="cursor:pointer;" data-toggle="collapse" data-target="#total11"><i class="icon-graph mr-10"></i>LAPORAN TOTAL DAN MONITORING<span class="pull-right"><span class="label label-success mr-10"></span><i class="fa fa-fw fa-angle-down"></i></span></a>
		<ul id="total11" class="collapse collapse-level-1">
			<li>
				<a class="klik_menu" id="tambahan" href="<?= base_url('Laporan_kunjungan_ranap/Laporan_pengisian_ranap') ?>">LAPORAN PENGISIAN RANAP</a>
			</li>
			<li>
				<a class="klik_menu" id="tambahan" href="<?= base_url('Laporan/Laporan_total_kasir') ?>">LAPORAN TOTAL KASIR</a>
			</li>
		</ul>
	</li>
<?php } elseif ($datatipe == 'anastesi' && $status == 'aktif') { ?>
	<li>
		<a href="<?= base_url('Rawatinap/pasien_ranap') ?>"><i class="icon-hourglass mr-10"></i>PASIEN RAWAT
			INAP</a>
	</li>
	<li>
		<a href="<?= base_url('OK_Pasien') ?>"><i class="icon-people mr-10"></i>PASIEN KAMAR OPERASI</a>
	</li>
<?php } else { ?>

	<?php redirect('../accounts'); ?>

<?php } ?>


</ul>
</div>
<!-- /Left Sidebar Menu -->