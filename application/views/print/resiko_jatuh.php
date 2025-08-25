<!DOCTYPE html>
<html>
<head>
	<title>Print out <?=$page_title?></title>
	<link href="<?= base_url() ?>resources/css/styles_print.css?p=<?=date('his')?>" rel="stylesheet" type="text/css">
</head>
<body>
	<table style="width: 100%"border="1">
		<tbody>

		<tr>
			<td colspan="11" ><center><b>Penilaian Status Fungsional</b></center></td>
		</tr>
		<tr>
			<td colspan="11"><center><b>(Berdasarkan Penilaian Barthel Index)</b></center></td>
		</tr>
		<tr >
			<td width="30 " height="60"rowspan="2" >NO</td>
			<td width="200" rowspan="2">Fungsi</td>
			<td rowspan="2">Skor</td>
			<td width="200" rowspan="2">URAIAN</td>
			<td colspan="7" ><center>NILAI SKOR</center></td>
		</tr>
		<tr>
			<td>Sebelum sakit</td>
			<td>Saat masuk RS</td>
			<td>Minggu I di RS</td>
			<td>Minggu II di RS</td>
			<td>Minggu III di RS</td>
			<td>Minggu IV di RS</td>
			<td>Saat Pulang</td>
		
		</tr>

<!--satu-->
		<tr>
			<td rowspan="3">1</td>
			<td rowspan="3">Mengendalikan rangsang defeksi (BAB)</td>
			<td >0</td>
			<td >Tak Terkendali/tak teratur </td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
		</tr>

		<tr>
			<td >1</td>
			<td  >Kadang-kadang tak terkendali</td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
		</tr>

		<tr>
			<td >2</td>
			<td >Mandiri</td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
		</tr>
<!--end satu-->

<!--dua-->
		<tr>
			<td rowspan="3">2</td>
			<td rowspan="3">Mengendalikan rangsang berkemih (BAK)</td>
			<td >0</td>
			<td >Tak terkendali / pakai kateter </td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
		</tr>

		<tr>
			<td >1</td>
			<td  >Kadang-kadang tak terkendali (1x24jam)</td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
		</tr>

		<tr>
			<td >2</td>
			<td >Mandiri</td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
		</tr>
<!--end dua-->

<!--tiga-->
		<tr>
			<td rowspan="2">3</td>
			<td rowspan="2">Membersihkan diri (cuci muka, sisir rambut, sikat gigi) </td>
			<td >0</td>
			<td >Butuh pertolongan orang lain</td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
		</tr>

		<tr>
			<td >1</td>
			<td  >Mandiri</td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
		</tr>

		
<!--end tiga-->

<!--empat-->
		<tr>
			<td rowspan="3">4</td>
			<td rowspan="3">Penggunaan jamban, masuk dan keluar (melepaskan, memakai celana, membersihkan, menyiram)</td>
			<td >0</td>
			<td >Tergantung pertolongan orang lain</td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
		</tr>

		<tr>
			<td >1</td>
			<td  >Perlu pertolongan pada beberapa kegiatan, tetapi dapat mengerjakan sendiri kegiatan yang lain</td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
		</tr>

		<tr>
			<td >2</td>
			<td >Mandiri</td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
		</tr>
<!--end empat-->

<!--lima-->
		<tr>
			<td rowspan="3">5</td>
			<td rowspan="3">Makan</td>
			<td >0</td>
			<td >Tidak mampu</td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
		</tr>

		<tr>
			<td >1</td>
			<td  >Perlu ditolong memotong makanan</td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
		</tr>

		<tr>
			<td >2</td>
			<td >Mandiri</td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
		</tr>
<!--lima-->

<!--enam-->
		<tr>
			<td rowspan="4">6</td>
			<td rowspan="4">Berubah sikap dari berbaring ke duduk</td>
			<td >0</td>
			<td >Tidak mampu</td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
		</tr>

		<tr>
			<td >1</td>
			<td  >perlu banyak bantuan untuk bisa duduk (2 orang)</td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
		</tr>

		<tr>
			<td >2</td>
			<td >Bantuan (2 orang)</td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
		</tr>

		<tr>
			<td >3</td>
			<td >Mandiri</td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
		</tr>
<!--enam-->

<!--tujuh-->
		<tr>
			<td rowspan="4">7</td>
			<td rowspan="4">Berpindah / berjalan </td>
			<td >0</td>
			<td >Tidak mampu</td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
		</tr>

		<tr>
			<td >1</td>
			<td  >Bisa (pindah) dengan kursi roda</td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
		</tr>

		<tr>
			<td >2</td>
			<td >Berjalan dengan bantuan 1 orang</td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
		</tr>

		<tr>
			<td >3</td>
			<td >Mandiri</td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
		</tr>
<!--tujuh-->

<!--delapan-->
		<tr>
			<td rowspan="3">8</td>
			<td rowspan="3">Memakai baju</td>
			<td >0</td>
			<td >Tergantung orang lain</td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
		</tr>

		<tr>
			<td >1</td>
			<td  >Sebagian dibantu (misalnya : mengancing baju)</td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
		</tr>

		<tr>
			<td >2</td>
			<td >Mandiri</td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
		</tr>
<!--delapan-->

<!--sembilan-->
		<tr>
			<td rowspan="3">9</td>
			<td rowspan="3">Naik turun tangga</td>
			<td >0</td>
			<td >Tidak mampu</td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
		</tr>

		<tr>
			<td >1</td>
			<td  >Butuh pertolongan</td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
		</tr>

		<tr>
			<td >2</td>
			<td >Mandiri</td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
		</tr>
<!--delapan-->

<!--sepuluh-->
		<tr>
			<td rowspan="2">10</td>
			<td rowspan="2">Mandi</td>
			<td >0</td>
			<td >Tergantung orang lain</td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
		</tr>

		<tr>
			<td >1</td>
			<td  >Mandiri</td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
		</tr>

		
<!--sepuluh-->

		<tr>
			
			<td colspan="4"><center><b>TOTAL SKOR</b></center></td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
		</tr>

		<tr>
			
			<td colspan="4"><center><b>NAMA DAN TANDA TANGAN PERAWAT</b></center></td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
		</tr>

		<tr  style="border:none;">
			<td  colspan="3"><center><b>Keterangan :</b></center></td>
			<td  colspan="3">20 = Mandiri</td>
			<td  colspan="5">5-8     = Ketergantungan Berat</td>

		</tr>

		<tr  style="border:none;">
			<td  colspan="3"><center><b></b></center></td>
			<td  colspan="3">12-19 = Ketergantungan Ringan</td>
			<td  colspan="5">0-4     = Ketergantungan Total</td>

		</tr>

		<tr  style="border:none;">
			<td  colspan="3"><center><b></b></center></td>
			<td  colspan="3">9-11   = Ketergantungan Sedang</td>
			<td  colspan="5"></td>

		</tr>

		<!--baru bordernya -->

		<tr  >
			<td  colspan="11" ><b>Kebutuhan Informasi / Edukasi :</b></td>
		</tr>

		<tr  style="border:none;">

			<td  colspan="3"> <input  type="checkbox" name="hoby" value="Olahraga" disabled="disabled">Proses Penyakit</td>
			<td  colspan="3"><input  type="checkbox" name="hoby" value="Olahraga" disabled="disabled">9-11   = Ketergantungan Sedang</td>
			<td  colspan="5"><input  type="checkbox" name="hoby" value="Olahraga" disabled="disabled">Lain Lain........</td>

		</tr>

		<tr  style="border:none;">

			<td  colspan="3"> <input  type="checkbox" name="hoby" value="Olahraga" disabled="disabled">Tindakan Medis</td>
			<td  colspan="3"><input  type="checkbox" name="hoby" value="Olahraga" disabled="disabled">Tindaan Keperawatan</td>
			<td  colspan="5"></td>

		</tr>

		<tr  style="border:none;">
			<td  colspan="3"><b>Masalah :</b></td>
			<td  colspan="3"><p> </p></td>
			<td  colspan="5"><p> </p></td>

		</tr>

		<tr  style="border:none;">
			<td  colspan="3"><center><b><p> </p></b></center></td>
			<td  colspan="3"><p> </p></td>
			<td  colspan="5"><p> </p></td>

		</tr>

		<tr  style="border:none;">
			<td  colspan="3"><center><b><p>    </p></b></center></td>
			<td  colspan="3"><p> </p></td>
			<td  colspan="5"><p> </p></td>

		</tr>

		<tr  style="border:none;">
			<td  colspan="3"><b>Rencana dan Tindakan :</b></td>
			<td  colspan="3"><p> &nbsp;</p></td>
			<td  colspan="5"><p>&nbsp; </p></td>

		</tr>

		<tr  style="border:none;">
			<td  colspan="3"><center><b><p>&nbsp; </p></b></center></td>
			<td  colspan="3"><p>&nbsp; </p></td>
			<td  colspan="5"><p>&nbsp; </p></td>

		</tr>

		<tr  style="border:none;">
			<td  colspan="3"><center><b><p>&nbsp; </p></b></center></td>
			<td  colspan="3"><p>&nbsp; </p></td>
			<td  colspan="5"><p>&nbsp; </p></td>

		</tr>

<!--ini akhir border ttd-->

		<tr  style="border:none;">
			<td  colspan="3"><center><b> <p></p></b></center></td>
			<td  colspan="4"><p> </p></td>
			<td  colspan="1">Tanggal :</td>
			<td  colspan="1">Jam :</td>
			<td  colspan="2"><p> </p></td>
		</tr>

		<tr  style="border:none;">
			<td  colspan="3"><center><b><p> </p></b></center></td>
			<td  colspan="4"><p> </p></td>
			<td  colspan="4">Perawat yang melakukan pengkajian</td>
			
		</tr>

		<tr  style="border:none;">
			<td  colspan="3"><center><b><p> </p></b></center></td>
			<td  colspan="3"><p> </p></td>
			<td  colspan="5"><p> </p></td>

		</tr>

		<tr  style="border:none;">
			<td  colspan="3"><center><b><p> </p>&nbsp;</b></center></td>
			<td  colspan="3"><p>&nbsp; </p></td>
			<td  colspan="5"><p>&nbsp; </p></td>

		</tr>

		<tr  style="border:none;">
			<td  colspan="3"><center><b><p>&nbsp; </p></b></center></td>
			<td  colspan="3"><p>&nbsp; </p></td>
			<td  colspan="5"><p>&nbsp; </p></td>

		</tr>

		<tr  style="border:none;">
			<td  colspan="3"><center><b><p>&nbsp; </p></b></center></td>
			<td  colspan="4"><p>&nbsp; </p></td>
			<td  colspan="4">(..........................................)</td>
			
		</tr>

		<tr  style="border:none;">
			<td  colspan="3"><center><b><p> </p></b></center></td>
			<td  colspan="4"><p> </p></td>
			<td  colspan="4">Nama lengkap dan tanda tangan</td>
			
		</tr>

		<tr  style="border:none;">
			<td  colspan="3"><center><b><p></p></b></center></td>
			<td  colspan="3"><p> </p></td>
			<td  colspan="5"><p> </p></td>

		</tr>

		
		
		

		




</tbody></table>
				
	<script src="<?= base_url() ?>resources/vendors/bower_components/jquery/dist/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			window.print();
		});
	</script>
</body>
</html>