<!DOCTYPE html>
<html>

<head>
	<title>Print out <?=$page_title?></title>
	<link href="<?= base_url() ?>resources/css/styles_print.css?p=<?=date('his')?>" rel="stylesheet" type="text/css">
	<style type="text/css">
		span,
		ul {
			border: 1px solid black;
			padding: .1em;
			width: 50px;

		}

	</style>
</head>

<body>
	<table style="width: 60%">
		<tbody>
			<tr>
				<td>&nbsp;</td>
				<td width="80px"><img src="<?=base_url()?>resources/img/rsbt_logo.jpg" style="width: 150px;">
				</td>
				<td>
					<div style="border: 1px #000000 solid; height: 80px; width: 0px;"></div>
				</td>
				<td width="750px">
					<p>Jalan Bukit Baru No. 1, Pangkalpinang, Taman Bunga, Kec. Gerunggang</p>
                    <p>Kabupaten Bangka, Kepulauan Bangka Belitung, Indonesia</p>
                    <p>Telp. 0717 9100844, Fax. 0715 32165</p>
				</td>
				<td>
					<p>
						NRM&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
					</p>
					<p>
						Nama&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
					</p>
					<p>Jenis Kelamin&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</p>
					<p>Tanggal Lahir&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</p>
				</td>
			</tr>

		</tbody>
	</table>
	<table style="width: 60%">
		<tr>
			<td colspan="10">
				<center><br>
					<h2><b>ASESMEN RAWAT JALAN</b></h2>
				</center>
			</td>
		</tr>
	</table>
	<table style="width: 60%" border="1">
		<tbody>

			<tr>
				<td colspan="5">Tanggal Kunjungan: </td>
				<td colspan="5">Jam:</td>
			</tr>
			<tr>
				<td colspan="10">
					<center><b>PENGKAJIAN PERAWATAN</b></center>
				</td>
			</tr>
			<tr>
				<td colspan="10">
					<center><b>Pemeriksaan Fisik</b></center>
				</td>
			</tr>
			<tr>
				<td colspan="3">Tekanan Darah : ................ mmHg</td>
				<td colspan="3">Suhu : ................. ºC </td>
				<td colspan="4">Berat Lahir : .......................... gram</td>
			</tr>
			<tr>
				<td colspan="3">Nadi : .............. x/mnt</td>
				<td colspan="3">Tinggi Badan : ................. cm </td>
				<td colspan="4">Lingkar Kepala : .......................... cm</td>
			</tr>
			<tr>
				<td colspan="3">Pernafaan : .............. x/mnt</td>
				<td colspan="7">Berat Badan : ................. kg</td>
			</tr>
			<tr>
				<td colspan="10">
					<center><b>Riwayat Psikososial, Spiritual dan Ekonomi</b></center>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					Bicara&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
				</td>
				<td><span>&nbsp;&nbsp;&nbsp;</span> Jelas</td>
				<td colspan="7"><span>&nbsp;&nbsp;&nbsp;</span> Tidak</td>
			</tr>
			<tr>
				<td colspan="2"> Komunikasi&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</td>
				<td><span>&nbsp;&nbsp;&nbsp;</span> Verbal</td>
				<td><span>&nbsp;&nbsp;&nbsp;</span> Non Verbal</td>
				<td colspan="6"><span>&nbsp;&nbsp;&nbsp;</span> Apatis</td>
			</tr>
			<tr>
				<td colspan="2"> Status Psikologis&nbsp;&nbsp;&nbsp;:</td>
				<td><span>&nbsp;&nbsp;&nbsp;</span> Tenang</td>
				<td><span>&nbsp;&nbsp;&nbsp;</span> Marah</td>
				<td><span>&nbsp;&nbsp;&nbsp;</span> Takut</td>
				<td><span>&nbsp;&nbsp;&nbsp;</span> Cemas</td>
				<td><span>&nbsp;&nbsp;&nbsp;</span> Sedih</td>

			</tr>
			<tr>
				<td colspan="2"> Sosiologi&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</td>
				<td><span>&nbsp;&nbsp;&nbsp;</span> Komunikatif</td>
				<td><span>&nbsp;&nbsp;&nbsp;</span> Komunikan</td>
				<td colspan="2"><span>&nbsp;&nbsp;&nbsp;</span> Tidak Efektif</td>
				<td><span>&nbsp;&nbsp;&nbsp;</span> Menarik Diri</td>
			</tr>
			<tr>
				<td colspan="2">
					Pendidikan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
				</td>
				<td><span>&nbsp;&nbsp;&nbsp;</span> Belum Sekolah</td>
				<td><span>&nbsp;&nbsp;&nbsp;</span> SD</td>
				<td><span>&nbsp;&nbsp;&nbsp;</span> SMP</td>
				<td><span>&nbsp;&nbsp;&nbsp;</span> SMA</td>
				<td><span>&nbsp;&nbsp;&nbsp;</span> Akademi/Sarjana/Magister</td>
			</tr>
			<tr>
				<td colspan="2">
					Agama&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
				</td>
				<td><span>&nbsp;&nbsp;&nbsp;</span> Islam</td>
				<td><span>&nbsp;&nbsp;&nbsp;</span> Protestan</td>
				<td><span>&nbsp;&nbsp;&nbsp;</span> Katolik</td>
				<td><span>&nbsp;&nbsp;&nbsp;</span> Hindu</td>
				<td><span>&nbsp;&nbsp;&nbsp;</span> Buddha</td>
			</tr>
			<tr>
				<td colspan="2">
					Pekerjaan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
				</td>
				<td><span>&nbsp;&nbsp;&nbsp;</span> Swasta</td>
				<td><span>&nbsp;&nbsp;&nbsp;</span> PNS/TNI/POLRI</td>
				<td><span>&nbsp;&nbsp;&nbsp;</span> Wiraswasta</td>
				<td><span>&nbsp;&nbsp;&nbsp;</span> Pelaut/petani</td>
				<td><span>&nbsp;&nbsp;&nbsp;</span> Lainnya</td>
			</tr>
			<tr>
				<td colspan="2">
					Ekonomi&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
				</td>
				<td><span>&nbsp;&nbsp;&nbsp;</span> Baik</td>
				<td><span>&nbsp;&nbsp;&nbsp;</span> Cukup</td>
				<td colspan="6"><span>&nbsp;&nbsp;&nbsp;</span> Kurang</td>
			</tr>
			<tr>
				<td colspan="10">
					<center><b>Riwayat Kesehatan Pasien</b></center>
				</td>
			</tr>
			<tr>
				<td colspan="10">Keluhan Utama :</td>
			</tr>
			<tr>
				<td colspan="10">&nbsp;</td>
			</tr>
			<tr>
				<td colspan="10">Riwayat Penyakit Dahulu :</td>
			</tr>
			<tr>
				<td colspan="10">&nbsp;</td>
			</tr>
			<tr>
				<td colspan="10">Riwayat Kesehatan Keluarga :</td>
			</tr>
			<tr>
				<td colspan="10">&nbsp;</td>
			</tr>
			<tr>
				<td colspan="10">Riwayat Penggunaan Obat :</td>
			</tr>
			<tr>
				<td colspan="10">&nbsp;</td>
			</tr>
			<tr>
				<td colspan="10"><b>Allonamnesa : </b></td>
			</tr>
			<tr>
				<td colspan="10">&nbsp;</td>
			</tr>
			<tr>
				<td colspan="2"><b>Alergi : </b></td>
				<td><span>&nbsp;&nbsp;&nbsp;</span> Tidak</td>
				<td colspan="7"><span>&nbsp;&nbsp;&nbsp;</span> Ya, sebutkan :</td>
			</tr>
			<tr>
				<td colspan="2"><b>Asesmen Nyeri :</b></td>
				<td colspan="8" width="80px"><img src="<?=base_url()?>resources/img/assesman_awal.png" style="width: 550px;">
				</td>
			</tr>
			<tr>
				<td colspan="10">
					<center><b>Pengkajian Risiko Pasien Jatuh</b></center>
				</td>
			</tr>


		</tbody>
	</table>
	<table style="width: 60%" border="1">
		<tr>
			<td width="20px">No.</td>
			<td colspan="6">
				<center>Faktor Risiko</center>
			</td>
			<td width="100px">
				<center>Ya</center>
			</td>
			<td width="100px">
				<center>Tidak</center>
			</td>
			<td width="100px">
				<center>Skor</center>
			</td>
		</tr>
		<tr>
			<td>1</td>
			<td colspan="6">Riwayat jatuh akhir-akhir ini</td>
			<td width="100px">
				<center>&nbsp;</center>
			</td>
			<td width="100px">
				<center>&nbsp;</center>
			</td>
			<td width="100px">
				<center>&nbsp;</center>
			</td>
		</tr>
		<tr>
			<td>2</td>
			<td colspan="6">Gangguan BAB/BAK (inkrontinesa, sering ke kamar mandi</td>
			<td width="100px">
				<center>&nbsp;</center>
			</td>
			<td width="100px">
				<center>&nbsp;</center>
			</td>
			<td width="100px">
				<center>&nbsp;</center>
			</td>
		</tr>
		<tr>
			<td>3</td>
			<td colspan="6">Disorientasi / bingung</td>
			<td width="100px">
				<center>&nbsp;</center>
			</td>
			<td width="100px">
				<center>&nbsp;</center>
			</td>
			<td width="100px">
				<center>&nbsp;</center>
			</td>
		</tr>
		<tr>
			<td>4</td>
			<td colspan="6">Depresi</td>
			<td width="100px">
				<center>&nbsp;</center>
			</td>
			<td width="100px">
				<center>&nbsp;</center>
			</td>
			<td width="100px">
				<center>&nbsp;</center>
			</td>
		</tr>
		<tr>
			<td>5</td>
			<td colspan="6">Vertigo / pusing</td>
			<td width="100px">
				<center>&nbsp;</center>
			</td>
			<td width="100px">
				<center>&nbsp;</center>
			</td>
			<td width="100px">
				<center>&nbsp;</center>
			</td>
		</tr>
		<tr>
			<td>6</td>
			<td colspan="6">Kelemahan umum, kesulitan berjalan</td>
			<td width="100px">
				<center>&nbsp;</center>
			</td>
			<td width="100px">
				<center>&nbsp;</center>
			</td>
			<td width="100px">
				<center>&nbsp;</center>
			</td>
		</tr>
		<tr>
			<td>7</td>
			<td colspan="6">Pikun / demensia</td>
			<td width="100px">
				<center>&nbsp;</center>
			</td>
			<td width="100px">
				<center>&nbsp;</center>
			</td>
			<td width="100px">
				<center>&nbsp;</center>
			</td>
		</tr>
		<tr>
			<td>8</td>
			<td colspan="6">Mendapat obat : antihistamin, antihipertensi, henzodiazepines, diuretik, diabetik, narkotik, </td>
			<td width="100px">
				<center>&nbsp;</center>
			</td>
			<td width="100px">
				<center>&nbsp;</center>
			</td>
			<td width="100px">
				<center>&nbsp;</center>
			</td>
		</tr>

		<tr>
			<td>&nbsp;</td>
			<td colspan="6">psikotropik, sedative / hipnotic, vasadilator cerebral dan perifer antara lain : brainact,
				stugeron</td>
			<td width="100px">
				<center>&nbsp;</center>
			</td>
			<td width="100px">
				<center>&nbsp;</center>
			</td>
			<td width="100px">
				<center>&nbsp;</center>
			</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td colspan="6">neulin ps, degrium dan sebelium.</td>
			<td width="100px">
				<center>&nbsp;</center>
			</td>
			<td width="100px">
				<center>&nbsp;</center>
			</td>
			<td width="100px">
				<center>&nbsp;</center>
			</td>
		</tr>
		<tr>
			<td>9</td>
			<td colspan="6">Perawatan di ruang ICU, recovery room, prepartum</td>
			<td width="100px">
				<center>&nbsp;</center>
			</td>
			<td width="100px">
				<center>&nbsp;</center>
			</td>
			<td width="100px">
				<center>&nbsp;</center>
			</td>
		</tr>
		<tr>
			<td colspan="10">
				<center><b>Keterangan : bila total skor ≥ 1 dikategorikan rendah dan ≥ 5 dikategorikan tinggi.</b></center>
			</td>
		</tr>
		<tr>
			<td colspan="10">
				<center><b>Skrining Gizi Awal dengan MST (Malnutrition Screening Tool) </b></center>
			</td>
		</tr>
		<tr>
			<td colspan="10">1. Apakah ada penurunan berat badan yang tidak diingikan </td>
		</tr>
		<tr>
			<td colspan="10">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;a.
				Tidak&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;=
				0</td>
		</tr>
		<tr>
			<td colspan="10">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;b. Tidak
				Yakin&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;= 2</td>
		</tr>
		<tr>
			<td colspan="10">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;c. Ya, 1-5
				kg&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;=
				1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;11-15
				kg&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;=3</td>
		</tr>
		<tr>
			<td colspan="10">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;6-10kg&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;=
				2&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;≥ 15
				kg&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;=4</td>
		</tr>
		<tr>
			<td colspan="10">2. Apakah asupan makan menurun yang dikarenakan adanya penurunan nafsu makan atau kesulitan
				menerima makanan? </td>
		</tr>
		<tr>
			<td colspan="10">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;a.
				Tidak&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;=0&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;b.
				Ya&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;=1 </td>
		</tr>
		<tr>
			<td colspan="10">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Total
					skor</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Bila
				Skor ≥ 2, pasien berisiko malnutrisi tinggi, konsul ke Ahli Gizi.</td>
		</tr>


	</table>

  <script src="<?= base_url() ?>resources/vendors/bower_components/jquery/dist/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			window.print();
		});
	</script>
</body>
</html>
