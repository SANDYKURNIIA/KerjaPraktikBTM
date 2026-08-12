<<<<<<< HEAD
<!DOCTYPE html>
<html>

<head>
<title>Print out <?=$page_title?></title>
<link href="<?= base_url() ?>resources/css/styles_print.css?p=<?=date('his')?>" rel="stylesheet" type="text/css"/>
<style type="text/css">
span,
ul {
  border: 1px solid black;
  padding: .1em;
  width:50px;

}
</style>
</head>
<body>
<div class="content">
<table style="width: 100%">
<tr>
<td>
<img src="<?=base_url()?>resources/img/rsbt_logo.jpg" style="width: 150px;">

<hr align="left" width="23%"><p><b>RS. Bakti Timah</b></p>
</td>
</tr>
</table>
<h3 class="center"><u>SURAT PERINTAH RAWAT INAP</u>
</h3>
<p>Kepada Yth,</p>
<p>di-</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tempat</p><br>
<p>Mohon didaftarkan sebagai pasien rawat inap terhadap : </p><br>
<table>
<tbody>
<tr>
<td width="200px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nama Pasien</td>
<td>:</td>
<td>.................................................................................................................</td>
</tr>
<tr>
<td width="200px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nomor Rekam Medis</td>
<td>:</td>
<td>...........................................</td>
</tr>
<tr>
<td width="200px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Umur / Jenis Kelamin</td>
<td>:</td>
<td>.......................... Tahun   Laki-laki / Perempuan *</td>
</tr>
<tr>
<td width="200px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Diagnosa Masuk</td>
<td>:</td>
<td>.................................................................................................................</td>
</tr>
<tr>
<td width="200px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dokter yang merawat</td>
<td>:</td>
<td>.................................................................................................................</td>
</tr>
<tr>
<td width="200px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dokter Pengirim</td>
<td>:</td>
<td>.................................................................................................................</td>
</tr>

</tr>
</tbody></table>
<br><p>Pasien memerlukan kamar perawatan :</p>
<table>
<tr>
<td><br>
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> Kelas I
</td>
<td><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> Kelas II
</td>
<td><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> Kelas III
</td>
</tr>
<tr>
<td><br>
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> VIP
</td>
<td><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> VVIP
</td>
</tr>
<tr>
<td><br>
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> Isolasi
</td>
</tr>
<tr>
<td><br>
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> ICU
</td>
<td><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> NICU
</td>
</tr>
<tr>
<td><br>
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> Ruang Bayi
</td>
</tr>
</table><br>
<p>Atas perhatiannya saya ucapkan terima kasih.</p><br>
<table>
<tr>
<td width="500px"></td>
<td>Pangkal Pinang, ...................................</td>
</tr>
</table>
<table>
<tbody>
<tr>
<td width="500px"></td>
<td><br><br><br><br>(Tandatangan dan Nama Dokter)</td>
</tr>
</tbody>
</table>
<table>
<tr>
<td width="540px"><br><font size="2">*Coret yang tidak sesuai</font></td>
<td><br><font size="2">RSBT_RM/047/I/B/2020</font></td>
</tr>
</table>



</div>
<script src="<?= base_url() ?>resources/vendors/bower_components/jquery/dist/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
window.print();
});
</script>
</body>
=======
<!DOCTYPE html>
<html>

<head>
<title>Print out <?=$page_title?></title>
<link href="<?= base_url() ?>resources/css/styles_print.css?p=<?=date('his')?>" rel="stylesheet" type="text/css"/>
<style type="text/css">
span,
ul {
  border: 1px solid black;
  padding: .1em;
  width:50px;

}
</style>
</head>
<body>
<div class="content">
<table style="width: 100%">
<tr>
<td>
<img src="<?=base_url()?>resources/img/rsbt_logo.jpg" style="width: 150px;">

<hr align="left" width="23%"><p><b>RS. Bakti Timah</b></p>
</td>
</tr>
</table>
<h3 class="center"><u>SURAT PERINTAH RAWAT INAP</u>
</h3>
<p>Kepada Yth,</p>
<p>di-</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tempat</p><br>
<p>Mohon didaftarkan sebagai pasien rawat inap terhadap : </p><br>
<table>
<tbody>
<tr>
<td width="200px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nama Pasien</td>
<td>:</td>
<td>.................................................................................................................</td>
</tr>
<tr>
<td width="200px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nomor Rekam Medis</td>
<td>:</td>
<td>...........................................</td>
</tr>
<tr>
<td width="200px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Umur / Jenis Kelamin</td>
<td>:</td>
<td>.......................... Tahun   Laki-laki / Perempuan *</td>
</tr>
<tr>
<td width="200px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Diagnosa Masuk</td>
<td>:</td>
<td>.................................................................................................................</td>
</tr>
<tr>
<td width="200px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dokter yang merawat</td>
<td>:</td>
<td>.................................................................................................................</td>
</tr>
<tr>
<td width="200px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dokter Pengirim</td>
<td>:</td>
<td>.................................................................................................................</td>
</tr>

</tr>
</tbody></table>
<br><p>Pasien memerlukan kamar perawatan :</p>
<table>
<tr>
<td><br>
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> Kelas I
</td>
<td><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> Kelas II
</td>
<td><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> Kelas III
</td>
</tr>
<tr>
<td><br>
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> VIP
</td>
<td><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> VVIP
</td>
</tr>
<tr>
<td><br>
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> Isolasi
</td>
</tr>
<tr>
<td><br>
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> ICU
</td>
<td><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> NICU
</td>
</tr>
<tr>
<td><br>
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> Ruang Bayi
</td>
</tr>
</table><br>
<p>Atas perhatiannya saya ucapkan terima kasih.</p><br>
<table>
<tr>
<td width="500px"></td>
<td>Pangkal Pinang, ...................................</td>
</tr>
</table>
<table>
<tbody>
<tr>
<td width="500px"></td>
<td><br><br><br><br>(Tandatangan dan Nama Dokter)</td>
</tr>
</tbody>
</table>
<table>
<tr>
<td width="540px"><br><font size="2">*Coret yang tidak sesuai</font></td>
<td><br><font size="2">RSBT_RM/047/I/B/2020</font></td>
</tr>
</table>



</div>
<script src="<?= base_url() ?>resources/vendors/bower_components/jquery/dist/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
window.print();
});
</script>
</body>
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
</html>