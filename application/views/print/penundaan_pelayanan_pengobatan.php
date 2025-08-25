<!DOCTYPE html>
<html>
<head>
	<title>Print out <?=$page_title?></title>
	<link href="<?= base_url() ?>resources/css/styles_print.css?p=<?=date('his')?>" rel="stylesheet" type="text/css"/>
</head>
<body>
	<div class="content">
		<table style="width: 100%">
			<tr>
				<td>
					<img src="<?=base_url()?>resources/img/rsbt_logo.jpg" style="width: 150px;">
				</td>
				<td>
					<p><b>RS. Bakti Timah</b></p>
					<p>Jalan Bukit Baru No. 1, Pangkalpinang, Taman Bunga, Kec. Gerunggang</p>
                    <p>Kabupaten Bangka, Kepulauan Bangka Belitung, Indonesia</p>
                    <p>Telp. 0717 9100844, Fax. 0715 32165</p>
				</td>
			</tr>
		</table>
		<hr>
		<h2 class="center">
        PENUNDAAN PELAYANAN ATAU PENGOBATAN
		</h2>
		<p>Saya yang bertanda tangan di bawah ini :</p>
        <table style="margin-left:40px" class="table1" cellspacing=0 >
        <tr height=30px>
            <td width=200px >
                Nama
            </td>
            <td>:</td>
        </tr>
        <tr height=30px>
            <td>
                Tanggal Lahir
            </td>
            <td>:</td>
        </tr>
        <tr height=30px>
            <td>
            Alamat
            </td>
            <td>:</td>
        </tr>
        <tr height=30px>
            <td>
            Hubungan dengan Pasien
            </td>
            <td>:</td>
        </tr>
        </table>
		
        <p>Dengan ini menyatakan bahwa saya telah mendapatkan informasi mengenai penundaan pelayanan/pengobatan terhadap :</p>
        
        <table style="margin-left:40px" class="table1" cellspacing=0 >
        <tr height=30px>
            <td width=200px >
                Nama
            </td>
            <td>:</td>
        </tr>
        <tr height=30px>
            <td>
                Tanggal Lahir
            </td>
            <td>:</td>
        </tr>
        <tr height=30px>
            <td>
            No. RM
            </td>
            <td>:</td>
        </tr>
        
        </table>

        <p>Penjelasan informasi mengenai penundaan pelayanan/pengobatan telah diberikan dari :</p>
        <table style="margin-left:40px" class="table1" cellspacing=0 >
        <tr height=30px>
            <td width=250px >
            Nama Dokter/Penanggung Jawab Unit
            </td>
            <td>:</td>
            <td width=80px></td>
            <td></td>
        </tr>
        <tr height=30px>
            <td>
            Penundaan terhadap tindakan
            </td>
            <td>:</td>
            <td></td>
            <td></td>
        </tr>
        <tr height=30px>
            <td>
            Alasan Penundaan
            </td>
            <td>:</td>
            <td></td>
            <td></td>
        </tr>
        <tr height=30px>
            <td>
            Alternatif yang diberikan
            </td>
            <td>:</td>
            <td></td>
            <td></td>
        </tr>
        <tr height=30px>
            <td>
            Tanggal Penundaan
            </td>
            <td>:</td>
            <td></td>
            <td>Jam :</td>
        </tr>
        <tr height=30px>
            <td>
            Perkiraan Penundaan Sampai Tanggal
            </td>
            <td>:</td>
            <td></td>
            <td>Jam :</td>
        </tr>
        </table>
    <p>Saya memahami penjelasan yang diberikan mengenai penundaan pelayanan/pengobatan terhadap (saya/keluarga saya).</p>
    <br>
    <p class="center">Pangkal Pinang,</p>
    <br>
    <table width=100% class="table1" cellspacing=0 >
        <tr >
            <td align="center" width=15%>Dokter</td>
            <td align="center">Yang Memberikan Informasi</td>
            <td align="center">Yang Membuat Pernyataan</td>
            <td align="center">Saksi</td>
        </tr>
        <tr height="180px">
            <td align="center">(&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp)</td>
            <td align="center">(&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp)</td>
            <td align="center">(&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp)</td>
            <td align="center">(&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp)</td>
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
</html>