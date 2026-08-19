<!DOCTYPE html>
<html>
<head>
	<title>Print out <?=$page_title?></title>
	<link href="<?= base_url() ?>resources/css/styles_print.css?p=<?=date('his')?>" rel="stylesheet" type="text/css"/>
    <style type="text/css">
            
            
            .table1 {
    color: #232323;
    border-collapse: collapse;
    border: 1px solid ;
    font-size: 12px ;
    vertical-align: text-top;
}

.table1 {
    color: #232323;
    border-collapse: collapse;
    border: 1px solid ;
    font-size: 12px ;
    vertical-align: text-top;
}


.garisbawah {
    border-bottom: 1px solid;
}

span,
ul {
  border: 1px solid black;
  padding: .1em;
  width:50px;

}
.gariskanan {
    border-right: 1px solid;
}
        </style>
</head>
<body>
	<div class="content">
    <table style="margin-top:-10px" style="width: 70%">
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
        <h3  class="center">
            <b ><p style="margin-top:-20px">FORM OBSERVASI PASIEN SELAMA PROSES TRANSFER PASIEN EKSTERNAL</b></p>
        </h3>
        <table style="margin-top:-10px" width=100%>
        <tr>
        <td colspan=2><b>STATUS KEGAWAT DARURATAN:</td>
        <td><b>PETUGAS AMBULAN</td>
        <td><b>TANGGAL</td>
        </tr>
        <tr>
        <td width=30%><span>&nbsp&nbsp&nbsp&nbsp&nbsp</span> Merah &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp  <span>&nbsp&nbsp&nbsp&nbsp&nbsp</span> Kuning</td>
        <td width=20%><p align="center"><span>&nbsp&nbsp&nbsp&nbsp&nbsp</span> Hijau</p></td>
        <td>Nama Supir &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:</td>
        <td></td>
        </tr>
        <tr style="vertical-align: text-top
        " height=30px>
        <td></td>
        <td></td>
        <td>Nama Tim Medis :</td>
        <td></td>
        </tr>
        <tr>
        <td><b>JENIS KASUS</td>
        <td></td>
        <td>Berangkat dari :</td>
        <td>Jam Berangkat :</td>
        </tr>
        <tr style="vertical-align: text-top" height=30px>
        <td><span>&nbsp&nbsp&nbsp&nbsp&nbsp</span> Trauma &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp  <span>&nbsp&nbsp&nbsp&nbsp&nbsp</span> Non trauma
        <td></td>
        <td>Tujuan ke&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp :</td>
        <td>Jam Tiba :</td>
        </tr>
        <tr>
        <td><b>DATA PASIEN</td>
        <td></td>
        <td></td>
        <td></td>
        </tr>
        
        <tr height="30px">
        <td>Nama :</td>
        <td>Umur :</td>
        <td>Alergi Obat :&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span>&nbsp&nbsp&nbsp&nbsp&nbsp</span> Tidak</td>
        <td></td>
        </tr>
        
        <tr style="vertical-align:text-top" height=60px>
        <td>TTL :</td>
        <td>Jenis Kelamin : L/P</td>
        <td >&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span>&nbsp&nbsp&nbsp&nbsp&nbsp</span> Ya</td>
        <td></td>
        </tr>
        </table>
        <p style="margin-top:-30px"><b>OBAT-OBATAN HIGH ALERT YANG SUDAH DIBERIKAN :</b></p>
    <table style="text-align:center" width=100% class="table1" cellspacing=0 >
    <tr class="garisbawah">
    <td rowspan=2  class="gariskanan">JAM</td>
    <td rowspan=2  class="gariskanan">GCS</td>
    <td colspan=4  class="gariskanan"> TANDA-TANDA VITAL</td>
    <td rowspan=2 class="gariskanan">SpO2</td>
    <td rowspan=2 class="gariskanan">KEJADIAN DI PROSES TRANSFER</td>
    <td rowspan=2 class="gariskanan">TINDAKAN / PEMBERIAN OBAT-OBATAN</td>
    </tr>
    <tr class="garisbawah">
    <td class="gariskanan">TD (mmHg)</td>
    <td class="gariskanan">Nadi (x/i) </td>
    <td class="gariskanan">Temp (c)</td>
    <td class="gariskanan">RR (x/i)</td>
    </tr>
    <tr class="garisbawah">
    <td height=20px class="gariskanan"></td>
    <td height=20px class="gariskanan"></td>
    <td height=20px class="gariskanan"></td>
    <td height=20px class="gariskanan"></td>
    <td height=20px class="gariskanan"></td>
    <td height=20px class="gariskanan"></td>
    <td height=20px class="gariskanan"></td>
    <td height=20px class="gariskanan"></td>
    <td height=20px class="gariskanan"></td>
    </tr>

    <tr class="garisbawah">
    <td height=20px class="gariskanan"></td>
    <td height=20px class="gariskanan"></td>
    <td height=20px class="gariskanan"></td>
    <td height=20px class="gariskanan"></td>
    <td height=20px class="gariskanan"></td>
    <td height=20px class="gariskanan"></td>
    <td height=20px class="gariskanan"></td>
    <td height=20px class="gariskanan"></td>
    <td height=20px class="gariskanan"></td>
    </tr>

    <tr class="garisbawah">
    <td height=20px class="gariskanan"></td>
    <td height=20px class="gariskanan"></td>
    <td height=20px class="gariskanan"></td>
    <td height=20px class="gariskanan"></td>
    <td height=20px class="gariskanan"></td>
    <td height=20px class="gariskanan"></td>
    <td height=20px class="gariskanan"></td>
    <td height=20px class="gariskanan"></td>
    <td height=20px class="gariskanan"></td>
    </tr>

    <tr class="garisbawah">
    <td height=20px class="gariskanan"></td>
    <td height=20px class="gariskanan"></td>
    <td height=20px class="gariskanan"></td>
    <td height=20px class="gariskanan"></td>
    <td height=20px class="gariskanan"></td>
    <td height=20px class="gariskanan"></td>
    <td height=20px class="gariskanan"></td>
    <td height=20px class="gariskanan"></td>
    <td height=20px class="gariskanan"></td>
    </tr>

    <tr class="garisbawah">
    <td height=20px class="gariskanan"></td>
    <td height=20px class="gariskanan"></td>
    <td height=20px class="gariskanan"></td>
    <td height=20px class="gariskanan"></td>
    <td height=20px class="gariskanan"></td>
    <td height=20px class="gariskanan"></td>
    <td height=20px class="gariskanan"></td>
    <td height=20px class="gariskanan"></td>
    <td height=20px class="gariskanan"></td>
    </tr>

    <tr class="garisbawah">
    <td height=20px class="gariskanan"></td>
    <td height=20px class="gariskanan"></td>
    <td height=20px class="gariskanan"></td>
    <td height=20px class="gariskanan"></td>
    <td height=20px class="gariskanan"></td>
    <td height=20px class="gariskanan"></td>
    <td height=20px class="gariskanan"></td>
    <td height=20px class="gariskanan"></td>
    <td height=20px class="gariskanan"></td>
    </tr>

    <tr class="garisbawah">
    <td height=20px class="gariskanan"></td>
    <td height=20px class="gariskanan"></td>
    <td height=20px class="gariskanan"></td>
    <td height=20px class="gariskanan"></td>
    <td height=20px class="gariskanan"></td>
    <td height=20px class="gariskanan"></td>
    <td height=20px class="gariskanan"></td>
    <td height=20px class="gariskanan"></td>
    <td height=20px class="gariskanan"></td>
    </tr>

    <tr class="garisbawah">
    <td height=20px class="gariskanan"></td>
    <td height=20px class="gariskanan"></td>
    <td height=20px class="gariskanan"></td>
    <td height=20px class="gariskanan"></td>
    <td height=20px class="gariskanan"></td>
    <td height=20px class="gariskanan"></td>
    <td height=20px class="gariskanan"></td>
    <td height=20px class="gariskanan"></td>
    <td height=20px class="gariskanan"></td>
    </tr>

    <tr class="garisbawah">
    <td height=20px class="gariskanan"></td>
    <td height=20px class="gariskanan"></td>
    <td height=20px class="gariskanan"></td>
    <td height=20px class="gariskanan"></td>
    <td height=20px class="gariskanan"></td>
    <td height=20px class="gariskanan"></td>
    <td height=20px class="gariskanan"></td>
    <td height=20px class="gariskanan"></td>
    <td height=20px class="gariskanan"></td>
    </tr>
    </table>
    <p align="right" style="margin-right:100px">PETUGAS YANG MENTRANSFER</p>
                <br><br>
                <p align="right" style="margin-right:82px">(&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp)</p>
	</div>
	<script src="<?= base_url() ?>resources/vendors/bower_components/jquery/dist/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			window.print();
		});
	</script>
</body>
</html>