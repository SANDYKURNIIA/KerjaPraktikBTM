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
    
}

span{
  border: 1px solid black;
  padding: .1em;
  width:50px;

}

.table1, tr{
    vertical-align:text-top;
}

.garisbawah {
    border-bottom: 1px solid;
}

.gariskanan {
    border-right: 1px solid;
}
        </style>
    </head>
<body>
	<div class="content">
		<table class="a" style="width: 100%">
			<tr>
				<td>
					<img src="<?=base_url()?>resources/img/rsbt_logo.jpg" style="width: 150px;">
				</td>
				<td>
                    <p>Jalan Bukit Baru No. 1, Pangkalpinang, Taman Bunga, Kec. Gerunggang</p>
                    <p>Kabupaten Bangka, Kepulauan Bangka Belitung, Indonesia</p>
                    <p>Telp. 0717 9100844, Fax. 0715 32165</p>
				</td>
			</tr>
		</table>
		<hr>
        <table width=100% class="table1" cellspacing=0 >
        <tr class="garisbawah" >
            <td colspan=3 class="center" >
                PENGKAJIAN DOKTER
            </td>
        </tr>
        <tr style="vertical-align:text-top" height=60px>
            <td colspan=3>
                Keluhan Utama : 
            </td>
        </tr>
        <tr style="vertical-align:text-top" height=60px>
            <td colspan=3>
            Riwayat Penyakit Sekarang :
            </td>
        </tr>
        <tr style="vertical-align:text-top" height=60px>
            <td colspan=3>
            Riwayat Penyakit Dahulu :
            </td>
        </tr>
        <tr style="vertical-align:text-top"  height=60px>
            <td colspan=3>
            Riwayat Penyakit Keluarga :
            </td>
        </tr>
        <tr style="vertical-align:text-top"  height=60px>
            <td colspan=3>
                <b>Pemeriksaan fisik :</b>
            </td>
        </tr>
        <tr style="vertical-align:text-top"  height=60px>
            <td colspan=3>
                <b>Pemeriksaan penunjang :</b>
            </td>
        </tr>
        <tr style="vertical-align:text-top"  height=60px>
            <td colspan=3>
                <b>Diagnosa :</b>
            </td>
        </tr>
        <tr style="vertical-align:text-top" height=60px>
            <td colspan=3 class="garisbawah" >
                <b>Terapi :</b>
            </td>
        </tr>
        <tr>
            <td colspan=3>
                <b>Rencana Tindak Lanjut :</b>
            </td>
        </tr>
            <tr>
                <td><span>&nbsp&nbsp&nbsp&nbsp&nbsp</span> Pulang Atas Permintaan Sendiri (APS)
                </td>
                <td colspan="2"><span>&nbsp&nbsp&nbsp&nbsp&nbsp</span> Kontrol, tanggal :  …………..  ke : ………………………..    
                </td>
            </tr>
            <tr>
                <td><span>&nbsp&nbsp&nbsp&nbsp&nbsp</span> Pulang Atas Persetujuan
                </td>
                <td colspan="2" ><span>&nbsp&nbsp&nbsp&nbsp&nbsp</span> Dirujuk ke : ……………………………….
                </td>
            </tr>
            <tr class="garisbawah">
                <td><span>&nbsp&nbsp&nbsp&nbsp&nbsp</span> Konsul ke : …………………………
                </td>
                <td colspan="2"><span>&nbsp&nbsp&nbsp&nbsp&nbsp</span> Rawat Inap 
                </td>
            </tr>
        </tr>
        <tr>
        <td colspan=3>
            <b>Edukasi Pasien :</b>
        </td>
        </tr>
        <tr>
        <td colspan=3>Edukasi awal, disampaikan terkait diagnosis, rencana dan tujuan terapi kepada :
            </td>
        </tr>
        <tr>
            <td colspan=3><span>&nbsp&nbsp&nbsp&nbsp&nbsp</span> Pasien
            </td>
        </tr>
        <tr class="garisbawah">
            <td colspan=3><span>&nbsp&nbsp&nbsp&nbsp&nbsp</span> Keluarga pasien, Nama : ……………………...
            </td>
        </tr>
        <tr class="center garisbawah ">
                <td class="gariskanan">Tanggal / Jam :</td>
                <td class="gariskanan">Nama Dokter : </td>
                <td class="gariskanan">Tanda tangan : </td>
        </tr>
        <tr height=60px>
                    <td class="gariskanan">
                    </td>
                    <td class="gariskanan">
                    </td>
                    <td class="gariskanan">
                    </td>
        </tr>
        </td>
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