<<<<<<< HEAD
<!DOCTYPE html>

<style>

@media print {
  @page { margin: 0; }
  body { margin: 1.6cm; }
}
</style>
<body onload="myFunction()">

<!DOCTYPE html>
<html>
<head>
<style type="text/css">
        .table1 {
            color: #232323;
            border-collapse: collapse;
            border: 1px solid black;

        }

    </style>
<title>Print out <?=$page_title?></title>
<link href="<?= base_url() ?>resources/css/styles_print.css?p=<?=date('his')?>" rel="stylesheet" type="text/css">
</head>
<body style="font-size: 10pt;">

 <center><b>REKENING DAFTAR PENERIMAAN BARANG FARMASI</b></center><br>

 <?php foreach ($nonduplikat as $row) { ?>  
 
<table align="right" style="width: 30%; font-size: 10pt;" >
<tbody>
<tr >
<td width="30%">TANGGAL </td>
<td>: <?php echo date("d-m-y")?> </td>
</tr>
<tr height=20>
<td</td>
<td></td>
</tr>
<tr >
<td colspan=2> </td>
</tr>
<tr >
<td width="30%">TANGGAL </td>
<td>: <?php $time = strtotime($row["tgl"]);
            $tgl = date("d-m-y", $time);
            echo $tgl;
?> </td>
</tr>
<tr >
<td width="30%">TANGGAL</td>
<td>: <?php $time = strtotime($row["tgl_faktur"]);
            $tgl = date("d-m-y", $time);
            echo $tgl;
?> </td>
</tr>
</tbody>
</table>

<table style="width: 50%; font-size: 10pt;" >
<tbody>
<tr >
<td width="30%">NO </td>
<td>: <?php echo $row["no_dp"];?></td>
</tr>
<tr >
<td width="30%">DEBET KEPADA </td>
<td>: <?php echo $row["id_vendor"]; ?></td>
</tr>
<tr >
<td colspan=2>UNTUK PEMBAYARAN PEMBELIAN BARANG FARMASI RS. BAKTI TIMAH, DENGAN RINCIAN : </td>
</tr>
<tr >
<td width="30%">NO </td>
<td>: <?php echo $row["no_dokumen"]; ?></td>
</tr>
<tr >
<td width="30%">FAKTUR NOMOR </td>
<td>: <?php echo $row["no_faktur"]; ?></td>
</tr>
</tbody>
</table>

 <?php } ?>



<table align="center" style="width: 100%; font-size: 10pt;" border="1 px"  class="table1" >
<tbody>

<tr align="center">
<td rowspan="2">NO</td>
<td rowspan="2" >NAMA BARANG</td>
<td rowspan="2" >PABRIK</td>
<td colspan="4" >BANYAKNYA</td>
<td rowspan="2" > HNA </td>
<td > DISCOUNT </td>
<td rowspan="2"> JUMLAH </td>
<td > TANGGAL TERIMA </td>
<td rowspan="2"> KET </td>

</tr>

<tr align="center">
<td >SATUAN </td>
<td > PP </td>
<td > TERIMA </td>
<td > SISA </td>
<td > % </td>
<td > BARANG </td>
</tr>

<?php $nilaippn=0; $total = 0; $totaldisc = 0; $totalongkir = 0;  $no=1; foreach ($laporan_dp as $row) { ?>  
<tr align="center">    

<td><?php echo $no++ ?></td>
<td><?php echo $row["nama"]; ?></td>
<td><?php echo $row["id_prod_obat"]; ?></td>
<td><?php echo $row["tipe"]; ?></td>                                       
<td><?php echo number_format($row["frek"], 0, ',', '.'); ?></td>                                       
<td><?php echo number_format($row["jumlah"], 0, ',', '.'); ?></td>  
                                     
<td><?php $sisa = $row["frek"] - $row["jumlah"];
            if ($sisa < 0)
            echo $sisa = 0;
            else 
            echo $sisa ?></td>       

<td><?php echo number_format($row["harga"], 0, ',', '.'); ?></td>   
<td><?php $disc = $row["harga"] * $row["jumlah"] * ($row["diskon"]/100);
        echo number_format($disc, 0, ',', '.');?></td>   
<td><?php echo number_format($row["total"], 0, ',', '.'); ?></td>  
<td><?php $time = strtotime($row["tgl_input"]);
            $tgl = date("d-m-y", $time);
            echo $tgl;
?></td>  
                                                 
                                                 
                                                 
<td></td>                                       

</tr>
<?php $total += $row['total'];
    $totalongkir += $row['ongkir'];
        $totaldisc += $disc;
            $nilaippn += $row["ppn"];
            } ?>


<tr height="25px">
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
</tr>

<tr align="right" height="25px">
<td></td>
<td colspan="7">JUMLAH</td>
<td></td>
<td><?php echo number_format($total, 0, ',', '.') ?>
<td></td>
<td></td>
</tr>

<tr align="right" height="25px">
<td></td>
<td colspan="7">POT</td>

<td><?php echo number_format($totaldisc, 0, ',', '.') ?></td>
<td></td>
<td></td>
<td></td>
</tr>

<tr align="right" height="25px">
<td></td>
<td colspan="7">NILAI FAKTUR</td>
<td></td>
<td><?php $nilai= $total-$totaldisc; echo number_format($nilai, 0, ',', '.') ?></td>
<td></td>
<td></td>
</tr>

<tr align="right" height="25px">
<td></td>
<td colspan="7">PPN</td>
<td></td>
<td><?php if ($nilaippn>0){
            $nilaippn=0.1; $ppn= $nilai*$nilaippn; echo number_format($ppn, 0, ',', '.') ;}
            else {
                $ppn= $nilai*$nilaippn; echo number_format($ppn, 0, ',', '.') ;
            }?></td>
<td></td>
<td></td>
</tr>

<tr align="right" height="25px">
<td></td>
<td colspan="7">BEA MATERAI + ONGKOS KIRIM</td>
<td></td>
<td><?php echo number_format($totalongkir, 0, ',', '.') ?></td></td>
<td></td>
<td></td>
</tr>

<tr align="right" height="25px">
<td></td>
<td colspan="7">TOTAL NILAI FAKTUR</td>
<td></td>
<td><?php $totnilai=$nilai+$ppn+$totalongkir; echo number_format($totnilai, 0, ',', '.') ;?></td>
<td></td>
<td></td>
</tr>

<tr align="right" height="25px">
<td></td>
<td colspan="7">SELISIH</td>
<td></td>
<td>0</td>
<td></td>
<td></td>
</tr>

<tr height="25px">
<td colspan="12">Terbilang:<br><?php $terbilang=terbilang($totnilai, $style=3); echo "<b>".$terbilang."</b>";?> </td>
</tr>

</tbody></table>

<table style="width: 40%" align="right" >
<tr>
<td >
Ka.Instalasi Farmasi<br><br><br><br><br><br>
KARTIKA SARI, S.Farm,A
</tr>
</table>
<table style="width: 40%" >
<tr>
<td>
Mengetahui;<br><br><br><br><br><br>
RUMAH SAKIT BAKTI TIMAH<br>
Direktur</td>
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
</body>

<script src="<?= base_url() ?>resources/vendors/bower_components/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript">
    window.onafterprint = function(e){
        closePrintView();
    };

    function myFunction(){
        window.print();
    }

    function closePrintView() {
        window.location.href = 'javascript:history.go(-1)';   
    }
    </script>

<?php
function kekata($x) {
    $x = abs($x);
    $angka = array("", "satu", "dua", "tiga", "empat", "lima",
    "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
    $temp = "";
    if ($x <12) {
        $temp = " ". $angka[$x];
    } else if ($x <20) {
        $temp = kekata($x - 10). " belas";
    } else if ($x <100) {
        $temp = kekata($x/10)." puluh". kekata($x % 10);
    } else if ($x <200) {
        $temp = " seratus" . kekata($x - 100);
    } else if ($x <1000) {
        $temp = kekata($x/100) . " ratus" . kekata($x % 100);
    } else if ($x <2000) {
        $temp = " seribu" . kekata($x - 1000);
    } else if ($x <1000000) {
        $temp = kekata($x/1000) . " ribu" . kekata($x % 1000);
    } else if ($x <1000000000) {
        $temp = kekata($x/1000000) . " juta" . kekata($x % 1000000);
    } else if ($x <1000000000000) {
        $temp = kekata($x/1000000000) . " milyar" . kekata(fmod($x,1000000000));
    } else if ($x <1000000000000000) {
        $temp = kekata($x/1000000000000) . " trilyun" . kekata(fmod($x,1000000000000));
    }     
        return $temp;
}


function terbilang($x, $style=4) {
    if($x<0) {
        $hasil = "minus ". trim(kekata($x));
    } else {
        $hasil = trim(kekata($x));
    }     
    switch ($style) {
        case 1:
            $hasil = strtoupper($hasil);
            break;
        case 2:
            $hasil = strtolower($hasil);
            break;
        case 3:
            $hasil = ucwords($hasil);
            break;
        default:
            $hasil = ucfirst($hasil);
            break;
    }     
    return $hasil;
}
function tanggal_indo($tanggal, $cetak_hari = false)
{
	$hari = array ( 1 =>    'Senin',
				'Selasa',
				'Rabu',
				'Kamis',
				'Jumat',
				'Sabtu',
				'Minggu'
			);
			
	$bulan = array (1 =>   'Januari',
				'Februari',
				'Maret',
				'April',
				'Mei',
				'Juni',
				'Juli',
				'Agustus',
				'September',
				'Oktober',
				'November',
				'Desember'
			);
			
	$split 	  = explode('-', $tanggal);
	$tgl_indo = $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
	
	if ($cetak_hari) {
		$num = date('N', strtotime($tanggal));
		return $hari[$num] . ', ' . $tgl_indo;
	}
	return $tgl_indo;
}
?>
</html>
=======
<!DOCTYPE html>

<style>

@media print {
  @page { margin: 0; }
  body { margin: 1.6cm; }
}
</style>
<body onload="myFunction()">

<!DOCTYPE html>
<html>
<head>
<style type="text/css">
        .table1 {
            color: #232323;
            border-collapse: collapse;
            border: 1px solid black;

        }

    </style>
<title>Print out <?=$page_title?></title>
<link href="<?= base_url() ?>resources/css/styles_print.css?p=<?=date('his')?>" rel="stylesheet" type="text/css">
</head>
<body style="font-size: 10pt;">

 <center><b>REKENING DAFTAR PENERIMAAN BARANG FARMASI</b></center><br>

 <?php foreach ($nonduplikat as $row) { ?>  
 
<table align="right" style="width: 30%; font-size: 10pt;" >
<tbody>
<tr >
<td width="30%">TANGGAL </td>
<td>: <?php echo date("d-m-y")?> </td>
</tr>
<tr height=20>
<td</td>
<td></td>
</tr>
<tr >
<td colspan=2> </td>
</tr>
<tr >
<td width="30%">TANGGAL </td>
<td>: <?php $time = strtotime($row["tgl"]);
            $tgl = date("d-m-y", $time);
            echo $tgl;
?> </td>
</tr>
<tr >
<td width="30%">TANGGAL</td>
<td>: <?php $time = strtotime($row["tgl_faktur"]);
            $tgl = date("d-m-y", $time);
            echo $tgl;
?> </td>
</tr>
</tbody>
</table>

<table style="width: 50%; font-size: 10pt;" >
<tbody>
<tr >
<td width="30%">NO </td>
<td>: <?php echo $row["no_dp"];?></td>
</tr>
<tr >
<td width="30%">DEBET KEPADA </td>
<td>: <?php echo $row["id_vendor"]; ?></td>
</tr>
<tr >
<td colspan=2>UNTUK PEMBAYARAN PEMBELIAN BARANG FARMASI RS. BAKTI TIMAH, DENGAN RINCIAN : </td>
</tr>
<tr >
<td width="30%">NO </td>
<td>: <?php echo $row["no_dokumen"]; ?></td>
</tr>
<tr >
<td width="30%">FAKTUR NOMOR </td>
<td>: <?php echo $row["no_faktur"]; ?></td>
</tr>
</tbody>
</table>

 <?php } ?>



<table align="center" style="width: 100%; font-size: 10pt;" border="1 px"  class="table1" >
<tbody>

<tr align="center">
<td rowspan="2">NO</td>
<td rowspan="2" >NAMA BARANG</td>
<td rowspan="2" >PABRIK</td>
<td colspan="4" >BANYAKNYA</td>
<td rowspan="2" > HNA </td>
<td > DISCOUNT </td>
<td rowspan="2"> JUMLAH </td>
<td > TANGGAL TERIMA </td>
<td rowspan="2"> KET </td>

</tr>

<tr align="center">
<td >SATUAN </td>
<td > PP </td>
<td > TERIMA </td>
<td > SISA </td>
<td > % </td>
<td > BARANG </td>
</tr>

<?php $nilaippn=0; $total = 0; $totaldisc = 0; $totalongkir = 0;  $no=1; foreach ($laporan_dp as $row) { ?>  
<tr align="center">    

<td><?php echo $no++ ?></td>
<td><?php echo $row["nama"]; ?></td>
<td><?php echo $row["id_prod_obat"]; ?></td>
<td><?php echo $row["tipe"]; ?></td>                                       
<td><?php echo number_format($row["frek"], 0, ',', '.'); ?></td>                                       
<td><?php echo number_format($row["jumlah"], 0, ',', '.'); ?></td>  
                                     
<td><?php $sisa = $row["frek"] - $row["jumlah"];
            if ($sisa < 0)
            echo $sisa = 0;
            else 
            echo $sisa ?></td>       

<td><?php echo number_format($row["harga"], 0, ',', '.'); ?></td>   
<td><?php $disc = $row["harga"] * $row["jumlah"] * ($row["diskon"]/100);
        echo number_format($disc, 0, ',', '.');?></td>   
<td><?php echo number_format($row["total"], 0, ',', '.'); ?></td>  
<td><?php $time = strtotime($row["tgl_input"]);
            $tgl = date("d-m-y", $time);
            echo $tgl;
?></td>  
                                                 
                                                 
                                                 
<td></td>                                       

</tr>
<?php $total += $row['total'];
    $totalongkir += $row['ongkir'];
        $totaldisc += $disc;
            $nilaippn += $row["ppn"];
            } ?>


<tr height="25px">
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
</tr>

<tr align="right" height="25px">
<td></td>
<td colspan="7">JUMLAH</td>
<td></td>
<td><?php echo number_format($total, 0, ',', '.') ?>
<td></td>
<td></td>
</tr>

<tr align="right" height="25px">
<td></td>
<td colspan="7">POT</td>

<td><?php echo number_format($totaldisc, 0, ',', '.') ?></td>
<td></td>
<td></td>
<td></td>
</tr>

<tr align="right" height="25px">
<td></td>
<td colspan="7">NILAI FAKTUR</td>
<td></td>
<td><?php $nilai= $total-$totaldisc; echo number_format($nilai, 0, ',', '.') ?></td>
<td></td>
<td></td>
</tr>

<tr align="right" height="25px">
<td></td>
<td colspan="7">PPN</td>
<td></td>
<td><?php if ($nilaippn>0){
            $nilaippn=0.1; $ppn= $nilai*$nilaippn; echo number_format($ppn, 0, ',', '.') ;}
            else {
                $ppn= $nilai*$nilaippn; echo number_format($ppn, 0, ',', '.') ;
            }?></td>
<td></td>
<td></td>
</tr>

<tr align="right" height="25px">
<td></td>
<td colspan="7">BEA MATERAI + ONGKOS KIRIM</td>
<td></td>
<td><?php echo number_format($totalongkir, 0, ',', '.') ?></td></td>
<td></td>
<td></td>
</tr>

<tr align="right" height="25px">
<td></td>
<td colspan="7">TOTAL NILAI FAKTUR</td>
<td></td>
<td><?php $totnilai=$nilai+$ppn+$totalongkir; echo number_format($totnilai, 0, ',', '.') ;?></td>
<td></td>
<td></td>
</tr>

<tr align="right" height="25px">
<td></td>
<td colspan="7">SELISIH</td>
<td></td>
<td>0</td>
<td></td>
<td></td>
</tr>

<tr height="25px">
<td colspan="12">Terbilang:<br><?php $terbilang=terbilang($totnilai, $style=3); echo "<b>".$terbilang."</b>";?> </td>
</tr>

</tbody></table>

<table style="width: 40%" align="right" >
<tr>
<td >
Ka.Instalasi Farmasi<br><br><br><br><br><br>
KARTIKA SARI, S.Farm,A
</tr>
</table>
<table style="width: 40%" >
<tr>
<td>
Mengetahui;<br><br><br><br><br><br>
RUMAH SAKIT BAKTI TIMAH<br>
Direktur</td>
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
</body>

<script src="<?= base_url() ?>resources/vendors/bower_components/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript">
    window.onafterprint = function(e){
        closePrintView();
    };

    function myFunction(){
        window.print();
    }

    function closePrintView() {
        window.location.href = 'javascript:history.go(-1)';   
    }
    </script>

<?php
function kekata($x) {
    $x = abs($x);
    $angka = array("", "satu", "dua", "tiga", "empat", "lima",
    "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
    $temp = "";
    if ($x <12) {
        $temp = " ". $angka[$x];
    } else if ($x <20) {
        $temp = kekata($x - 10). " belas";
    } else if ($x <100) {
        $temp = kekata($x/10)." puluh". kekata($x % 10);
    } else if ($x <200) {
        $temp = " seratus" . kekata($x - 100);
    } else if ($x <1000) {
        $temp = kekata($x/100) . " ratus" . kekata($x % 100);
    } else if ($x <2000) {
        $temp = " seribu" . kekata($x - 1000);
    } else if ($x <1000000) {
        $temp = kekata($x/1000) . " ribu" . kekata($x % 1000);
    } else if ($x <1000000000) {
        $temp = kekata($x/1000000) . " juta" . kekata($x % 1000000);
    } else if ($x <1000000000000) {
        $temp = kekata($x/1000000000) . " milyar" . kekata(fmod($x,1000000000));
    } else if ($x <1000000000000000) {
        $temp = kekata($x/1000000000000) . " trilyun" . kekata(fmod($x,1000000000000));
    }     
        return $temp;
}


function terbilang($x, $style=4) {
    if($x<0) {
        $hasil = "minus ". trim(kekata($x));
    } else {
        $hasil = trim(kekata($x));
    }     
    switch ($style) {
        case 1:
            $hasil = strtoupper($hasil);
            break;
        case 2:
            $hasil = strtolower($hasil);
            break;
        case 3:
            $hasil = ucwords($hasil);
            break;
        default:
            $hasil = ucfirst($hasil);
            break;
    }     
    return $hasil;
}
function tanggal_indo($tanggal, $cetak_hari = false)
{
	$hari = array ( 1 =>    'Senin',
				'Selasa',
				'Rabu',
				'Kamis',
				'Jumat',
				'Sabtu',
				'Minggu'
			);
			
	$bulan = array (1 =>   'Januari',
				'Februari',
				'Maret',
				'April',
				'Mei',
				'Juni',
				'Juli',
				'Agustus',
				'September',
				'Oktober',
				'November',
				'Desember'
			);
			
	$split 	  = explode('-', $tanggal);
	$tgl_indo = $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
	
	if ($cetak_hari) {
		$num = date('N', strtotime($tanggal));
		return $hari[$num] . ', ' . $tgl_indo;
	}
	return $tgl_indo;
}
?>
</html>
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
