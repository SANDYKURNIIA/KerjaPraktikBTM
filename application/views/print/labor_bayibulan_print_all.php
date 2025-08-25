<!DOCTYPE html>
<html>
<head>
	<title>PRINT OUT LABORATORIUM - SIBATIK</title>
	<link href="<?= base_url() ?>resources/css/styles_print.css?p=<?=date('his')?>" rel="stylesheet" type="text/css"/>

<style>
    @media print {
    @page { margin: 0; }

    body { 
        margin: 0.8cm;
		margin-left:65px;
		}
    }

	td {
		font-size:10px; 
		padding-bottom:4px; 
		padding-top:4px; 
		border: 1px solid black;
	}

	@page {
        size: F4;
        margin: 0;
    }
</style>

</head>

<body onload="myFunction()">
	<div class="content">
		<table style="width: 100%">
			<tr>
				<td style="border: 0px solid black; width:25%;">
					<img style="width:180px;" src="<?=base_url()?>assets/logo-rsbt.png">
				</td>
				<td style="border: 0px solid black; font-size:12px; width:60%;">
					<p><b>RUMAH SAKIT BAKTI TIMAH</b></p>
					<p>Jalan Bukit Baru No. 1, Pangkalpinang, Taman Bunga, Kec. Gerunggang</p>
                    <p>Kabupaten Bangka, Kepulauan Bangka Belitung, Indonesia</p>
                    <p>Telp. 0717 9100844, Fax. 0715 32165</p>
				</td>
			</tr>
		</table>

	<!-- Laki-laki FEACES -->
		<?php if ($print_labor2['jenis_kelamin'] == 'LAKI-LAKI' && $print_labor2['jenis_form'] == 'FEACES') :?>
           
            <?php echo ' <script type="text/javascript"> alert("Maaf, Cetak Form Tersebut Tidak Tersedia.");  window.location.href = "javascript:history.go(-1)"; </script>' ?>

		<!-- Laki-laki URIN -->
		<?php elseif ($print_labor2['jenis_kelamin'] == 'LAKI-LAKI' && $print_labor2['jenis_form'] == 'URIN'): ?>
			
            <?php echo ' <script type="text/javascript"> alert("Maaf, Cetak Form Tersebut Tidak Tersedia.");  window.location.href = "javascript:history.go(-1)"; </script>' ?>

		<!-- Laki-laki -->
		<?php elseif ($print_labor2['jenis_kelamin'] == 'LAKI-LAKI' && $print_labor2['jenis_form'] == ''): ?>
			<table style="border: 0px solid black; ">
				<tr>
					<td style="font-size:11px; width:12%; font-weight:bold; border: 0px solid black; padding-bottom:0px;">Nama Pasien</td>
					<td style="font-size:11px; width:34%; border: 0px solid black; padding-bottom:0px;">: <?= $print_labor2['pasien']; ?></td>
					<td style="font-size:11px; width:12%; font-weight:bold; border: 0px solid black; padding-bottom:0px;">Jenis Kelamin</td>
					<td style="font-size:11px; width:13%; border: 0px solid black; padding-bottom:0px;">: <?= $print_labor2['jenis_kelamin']; ?></td>
					<td style="font-size:11px; width:13%; font-weight:bold; border: 0px solid black; padding-bottom:0px;">&nbsp;&nbsp;&nbsp;&nbsp;Jam Sampling</td>
					<td style="font-size:11px; width:13%; border: 0px solid black; padding-bottom:0px;">:  <?php date_default_timezone_get('Asia/Jakarta');
													setlocale(LC_TIME, 'IND');
												
													$time = $print_labor2['tanggal_req'];
													echo date("H:i",strtotime($time))?> WIB</td>
				</tr>

				<tr>
					<td style="font-size:11px; width:12%; font-weight:bold; border: 0px solid black; padding-bottom:0px;">NO RM</td>
					<td style="font-size:11px; width:34%; border: 0px solid black; padding-bottom:0px;">: <?= $print_labor2['id_pasien']; ?></td>
					<td style="font-size:11px; width:12%; font-weight:bold; border: 0px solid black; padding-bottom:0px;">Cara Bayar</td>
					<td style="font-size:11px; width:13%; border: 0px solid black; padding-bottom:0px;">: <?= strtoupper($print_labor2['cara_bayar']); ?></td>
					<td style="font-size:11px; width:12%; font-weight:bold; border: 0px solid black; padding-bottom:0px;">&nbsp;&nbsp;&nbsp;&nbsp;Jam Selesai</td>
					<td style="font-size:11px; width:13%; border: 0px solid black; padding-bottom:0px;">: <?php date_default_timezone_get('Asia/Jakarta');
													setlocale(LC_TIME, 'IND');
												
													$time = $print_labor2['tanggal'];
													echo date("H:i",strtotime($time))?> WIB</td>
				</tr>

				<tr>
					<td style="font-size:11px; width:12%; font-weight:bold; border: 0px solid black;">Tanggal</td>
					<td style="font-size:11px; width:34%; border: 0px solid black;">: <?php date_default_timezone_get('Asia/Jakarta');
																							setlocale(LC_TIME, 'IND');
																							echo strftime("%A, %e %B %Y"); ?></td>
					<td style="font-size:11px; width:12%; font-weight:bold; border: 0px solid black;">Poli / Kelas</td>
					<td style="font-size:11px; width:20%; border: 0px solid black;">: <?= $print_labor2['cara_masuk']; ?></td>
					<td style="font-size:11px; width:13%; border: 0px solid black;"></td>
				</tr>

			</table>

            <table style="padding:10px; margin-top:15px; border-collapse: collapse;">
                    <th style="font-size:11px; padding-right:34px; padding-bottom:4px; padding-top:4px; border: 1px solid black;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PEMERIKSAAN</th>
                    <th style="font-size:11px; padding-right:20px; padding-bottom:4px; padding-top:4px; border: 1px solid black;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;HASIL</th>
                    <th style="font-size:11px; padding-right:12px; padding-bottom:4px; padding-top:4px; border: 1px solid black;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NILAI NORMAL</th>
                    <th style="font-size:11px; padding-right:34px; padding-bottom:4px; padding-top:4px; border: 1px solid black;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PEMERIKSAAN</th>
                    <th style="font-size:11px; padding-right:20px; padding-bottom:4px; padding-top:4px; border: 1px solid black;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;HASIL</th>
                    <th style="font-size:11px; padding-right:12px; padding-bottom:4px; padding-top:4px; border: 1px solid black;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NILAI NORMAL</th>

                    <tr>
                        <td>&nbsp;HEMATOLOGI</td>
                        <td></td>
                        <td></td>
                        <td>&nbsp;KIMIA DARAH</td>
                        <td></td>
                        <td></td>
                    </tr>

                    <tr>
                        <td>&nbsp;&nbsp; <i>- PT</i></td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['pt']; ?> <?php } ?><center></td>
                        <td>&nbsp;11 - 16 Sec</td>
                        <td>&nbsp;GULA DARAH</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['gul_darah']; ?> <?php } ?><center></td>
                        <td>&nbsp;54 - 103 mg/dl</td>
                    </tr>

                    <tr>
                        <td>&nbsp;&nbsp; <i>- INR</i></td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['inr']; ?> <?php } ?><center>/td>
                        <td>&nbsp;0.7 - 1.3</td>
                        <td>&nbsp;UREUM </td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['ureum']; ?> <?php } ?><center></td>
                        <td>&nbsp;10 - 50 mg/dl</td>
                    </tr>

                    <tr>
                        <td>&nbsp;&nbsp; <i>- APTT</i></td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['aptt']; ?> <?php } ?><center></td>
                        <td>&nbsp;25  - 40 Sec</td>
                        <td>&nbsp;CREATININ</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['creatinin']; ?> <?php } ?><center></td>
                        <td>&nbsp;0.2 - 0.4 mg/dl</td>
                    </tr>

                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>&nbsp;TOTAL PROTEIN</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['protein']; ?> <?php } ?><center></td>
                        <td>&nbsp;5.1 - 7.3 gr/dl</td>
                    </tr>

                    <tr>
                        <td>&nbsp;HB</td>
                        <td></td>
                        <td></td>
                        <td>&nbsp;ALBUMIN</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['albumin']; ?> <?php } ?><center></td>
                        <td>&nbsp;3.8 - 5.4 gr/dl</td>
                    </tr>

                    <tr>
                        <td>&nbsp;&nbsp; 40 Hr - 50 Hr</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['hb4050']; ?> <?php } ?><center></td>
                        <td>&nbsp;9.0 - 16.6 g/dl</td>
                        <td>&nbsp;BILIRUBIN TOTAL</td>
                        <td></td>
                        <td>&nbsp;0.3 - 1.2 mg/dl</td>
                    </tr>

                    <tr>
                        <td>&nbsp;&nbsp; > 50 Hr - 2.5Bln</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['hb5025']; ?> <?php } ?><center></td>
                        <td>&nbsp;9.2 - 13.6 g/dl</td>
                        <td>&nbsp;BILIRUBIN : DIREK</td>
                        <td></td>
                        <td>&nbsp;0 - 0.2 mg/dl</td>
                    </tr>

                    <tr>
                        <td>&nbsp;&nbsp; 2.6 - 3.5 Bln</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['hb2635']; ?> <?php } ?><center></td>
                        <td>&nbsp;9.6 - 12.8 g/dl</td>
                        <td>&nbsp;BILIRUBIN : INDIREK</td>
                        <td></td>
                        <td>&nbsp;0 - 1.1 mg/dl</td>
                    </tr>

                    <tr>
                        <td>&nbsp;&nbsp; 4  - 7 Bln</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['hb47']; ?> <?php } ?><center></td>
                        <td>&nbsp;10.1 - 12.9 g/dl</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>

                    <tr>
                        <td>&nbsp;&nbsp; 8 Bln  - 12 Bln</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['hb812']; ?> <?php } ?><center></td>
                        <td>&nbsp;150 - 400 RIBU/mm³</td>
                        <td>&nbsp;ALT / SGPT</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['sgpt']; ?> <?php } ?><center></td>
                        <td>&nbsp;13 - 45 U/L</td>
                    </tr>

                    <tr>
                        <td>&nbsp;LEKOSIT</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['leukosit']; ?> <?php } ?><center></td>
                        <td>&nbsp;5000 - 10.000 / mm³</td>
                        <td>&nbsp;AST/SGOT</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['sgot']; ?> <?php } ?><center></td>
                        <td>&nbsp;9 - 80 U/L</td>
                    </tr>

                    <tr>
                        <td>&nbsp;TROMBOSIT</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['trombosit']; ?> <?php } ?><center></td>
                        <td>&nbsp;150 - 400 RIBU/mm³</td>
                        <td>&nbsp;ALP</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['alp']; ?> <?php } ?><center></td>
                        <td>&nbsp;L  < 115 U/L</td>
                    </tr>

                    <tr>
                        <td>&nbsp;HEMATOKRIT</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>&nbsp;P  < 105 U/L</td>
                    </tr>

                    <tr>
                        <td>&nbsp;&nbsp;  40 Hr - 50 Hr</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['hematokrit4050']; ?> <?php } ?><center></td>
                        <td>&nbsp;30 - 54 %</td>
                        <td>&nbsp;GGT</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['ggt']; ?> <?php } ?><center></td>
                        <td>&nbsp;L  <55 U/L</td>
                    </tr>

                    <tr>
                        <td>&nbsp;&nbsp;  > 50 Hr - 2.5Bln</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['hematokrit5025']; ?> <?php } ?><center></td>
                        <td>&nbsp;30 - 46 %</td>
                        <td></td>
                        <td></td>
                        <td>&nbsp;P  <38 U/L</td>
                    </tr>

                    <tr>
                        <td>&nbsp;&nbsp;  2.6 - 3.5 Bln</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['hematokrit2635']; ?> <?php } ?><center></td>
                        <td>&nbsp;31 - 43 %</td>
                        <td>&nbsp;URID ACID  < 12 Thn</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['uric_acid']; ?> <?php } ?><center></td>
                        <td>&nbsp;2.0 mg/dl</td>
                    </tr>

                    <tr>
                        <td>&nbsp;&nbsp;  4  - 7 Bln</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['hematokrit47']; ?> <?php } ?><center></td>
                        <td>&nbsp;32 - 44 %</td>
                        <td>&nbsp;TRIGLISERIDA</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['trigiserida']; ?> <?php } ?><center></td>
                        <td>&nbsp;60 - 150 mg/dl</td>
                    </tr>

                    <tr>
                        <td>&nbsp;&nbsp;  8 Bln  - 12 Bln</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['hematokrit812']; ?> <?php } ?><center></td>
                        <td>&nbsp;35 - 43 %</td>
                        <td>&nbsp;CHOLESTEROL</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['cho']; ?> <?php } ?><center></td>
                        <td>&nbsp;L 120 - 200 mg/dl</td>
                    </tr>
                    
                    <tr>
                        <td>&nbsp;HITUNG JENIS</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>&nbsp;P 120 - 200 mg/dl</td>
                    </tr>

                    <tr>
                        <td>&nbsp;&nbsp;- BAS</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['bas']; ?> <?php } ?><center></td>
                        <td>&nbsp;0 - 1 %</td>
                        <td>&nbsp;LDL</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['ldl']; ?> <?php } ?><center></td>
                        <td>&nbsp;<150 mg/dl</td>
                    </tr>

                    <tr>
                        <td>&nbsp;&nbsp;- EOS</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['eos']; ?> <?php } ?><center></td>
                        <td>&nbsp;1 - 5 %</td>
                        <td>&nbsp;HDL</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['hdl']; ?> <?php } ?><center></td>
                        <td>&nbsp;35 -60 mg/dl</td>
                    </tr>

                    <tr>
                        <td>&nbsp;&nbsp;- MONO</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['mono']; ?> <?php } ?><center></td>
                        <td>&nbsp;1 - 11 %</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>

                    <tr>
                        <td>&nbsp;&nbsp;- SEGMEN</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['segmen']; ?> <?php } ?><center></td>
                        <td>&nbsp;17 - 60 %</td>
                        <td>&nbsp;CRP</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['crp']; ?> <?php } ?><center></td>
                        <td>&nbsp;< 10 Mg/L</td>
                    </tr>

                    <tr>
                        <td>&nbsp;&nbsp;- LYMPO</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['lympo']; ?> <?php } ?><center></td>
                        <td>&nbsp;20 - 70 %</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>

                    <tr>
                        <td>&nbsp;MCV</td>
                        <td></td>
                        <td></td>
                        <td>&nbsp;ELEKTROLIT</td>
                        <td></td>
                        <td></td>
                    </tr>

                    <tr>
                        <td>&nbsp;&nbsp; 37 Hr</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['mcv37']; ?> <?php } ?><center></td>
                        <td>&nbsp;82 - 126 fl</td>
                        <td>&nbsp;&nbsp;NA</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['na']; ?> <?php } ?><center></td>
                        <td>&nbsp;128 - 138 mmol/l</td>
                    </tr>

                    <tr>
                        <td>&nbsp;&nbsp; 1.5 - 2.5 Bln</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['mcv1525']; ?> <?php } ?><center></td>
                        <td>&nbsp;81 - 121 fl</td>
                        <td>&nbsp;&nbsp;K</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['k']; ?> <?php } ?><center></td>
                        <td>&nbsp;3,9 - 4,9 mmol/l</td>
                    </tr>

                    <tr>
                        <td>&nbsp;&nbsp; 2.6 - 3.5 Bln</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['mcv2635']; ?> <?php } ?><center></td>
                        <td>&nbsp;77 - 113 fl</td>
                        <td>&nbsp;&nbsp;CL</td>
                        <td><center><?= $print_labor['cl'] ?></center></td>
                        <td>&nbsp;88 - 100 mmol/l</td>
                    </tr>

                    <tr>
                        <td>&nbsp;&nbsp; 3.5  - 7 Bln</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['mcv357']; ?> <?php } ?><center></td>
                        <td>&nbsp;73 - 109 fl</td>
                        <td>&nbsp;&nbsp; Ca</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['ca']; ?> <?php } ?><center></td>
                        <td>&nbsp;0,99 - 1,29 mmol/l</td>
                    </tr>

                    <tr>
                        <td>&nbsp;MCH</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['mch']; ?> <?php } ?><center></td>
                        <td></td>
                        <td>&nbsp;<i>IMUNOSEROLOGI</i></td>
                        <td></td>
                        <td></td>
                    </tr>

                    <tr>
                        <td>&nbsp;&nbsp; 37 Hr</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['mch37']; ?> <?php } ?><center></td>
                        <td>&nbsp;26 - 38 pg/cell</td>
                        <td>&nbsp;WIDAL</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['widal']; ?> <?php } ?><center></td>
                        <td></td>
                    </tr>

                    <tr>
                        <td>&nbsp;&nbsp; 1 - 1.5 Bln</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['mch115']; ?> <?php } ?><center></td>
                        <td>&nbsp;25- 387pg/cell</td>
                        <td>&nbsp;TROPONIN </td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['troponin']; ?> <?php } ?><center></td>
                        <td></td>
                    </tr>

                    <tr>
                        <td>&nbsp;&nbsp; 2 - 2.5 Bln</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['mch225']; ?> <?php } ?><center></td>
                        <td>&nbsp;24 - 36 pg/cell</td>
                        <td>&nbsp;NS 1</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['ns1']; ?> <?php } ?><center></td>
                        <td>&nbsp;24 - 36 pg/cell</td>
                    </tr>

                    <tr>
                        <td>&nbsp;&nbsp; 2.6 - 3.5 Bln</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['mch2635']; ?> <?php } ?><center></td>
                        <td>&nbsp;23 - 36 pg/cell</td>
                        <td>&nbsp;IgG/IgM DENGUE</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['dengue']; ?> <?php } ?><center></td>
                        <td></td>
                    </tr>

                    <tr>
                        <td>&nbsp;&nbsp; 3.6 - 10 Bln</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['mch3610']; ?> <?php } ?><center></td>
                        <td>&nbsp;21 - 33 pg/cell</td>
                        <td>&nbsp;IgG/IgM SALMONELLA</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['salmonella']; ?> <?php } ?><center></td>
                        <td></td>
                    </tr>

                    <tr>
                        <td>&nbsp;&nbsp; 11 -  5 Thn</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['mch115']; ?> <?php } ?><center></td>
                        <td>&nbsp;23 - 31 pg/cell</td>
                        <td>&nbsp;HBSAG</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['hbsag']; ?> <?php } ?><center></td>
                        <td></td>
                    </tr>


                    <tr>
                        <td>&nbsp;MCHC</td>
                        <td></td>
                        <td></td>
                        <td>&nbsp;HBSAB</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['hbsab']; ?> <?php } ?><center></td>
                        <td></td>
                    </tr>

                    <tr>
                        <td>&nbsp;&nbsp; 37 Hr</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['mchc37']; ?> <?php } ?><center></td>
                        <td>&nbsp;25 - 37 g/dl</td>
                        <td>&nbsp;B20 </td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['b20']; ?> <?php } ?><center></td>
                        <td></td>
                    </tr>

                    <tr>
                        <td>&nbsp;&nbsp; 40 Hr - 7 Bln</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['mchc407']; ?> <?php } ?><center></td>
                        <td>&nbsp;26 - 34 g/dl</td>
                        <td>&nbsp;VDRL</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['vdrl']; ?> <?php } ?><center></td>
                        <td></td>
                    </tr>

                    <tr>
                        <td>&nbsp;&nbsp; 8 - 12 Bln</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['mchc812']; ?> <?php } ?><center></td>
                        <td>&nbsp;28 - 32 g/dl</td>
                        <td>&nbsp;GOLONGAN DARAH</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['gol_darah']; ?> <?php } ?><center></td>
                        <td></td>
                    </tr>

                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>&nbsp;RHESUS</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['rhesus']; ?> <?php } ?><center></td>
                        <td></td>
                    </tr>

                    <tr>
                        <td>&nbsp;RDW-CV</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['rdw_cv']; ?> <?php } ?><center></td>
                        <td>&nbsp;11,0 - 16,0 %</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>

                    <tr>
                        <td>&nbsp;RDW-SD</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['rdw_sd']; ?> <?php } ?><center></td>
                        <td>&nbsp;35,0 - 56,0 fL</td>
                        <td>&nbsp;<i>MIKROBIOLOGI</i></td>
                        <td></td>
                        <td></td>
                    </tr>

                    <tr>
                        <td>&nbsp;LED</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['led']; ?> <?php } ?><center></td>
                        <td>&nbsp;L s/d 10 mm / jam</td>
                        <td>&nbsp;SPUTUM BTA I </td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['sputum_bta_i']; ?> <?php } ?><center></td>
                        <td></td>
                    </tr>

                    <tr>
                        <td></td>
                        <td></td>
                        <td>&nbsp;P s/d 15 mm / jam</td>
                        <td>&nbsp;SPUTUM BTA II </td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['sputum_bta_ii']; ?> <?php } ?><center></td>
                        <td></td>
                    </tr>

                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>&nbsp;SPUTUM BTA III </td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['sputum_bta_iii']; ?> <?php } ?><center></td>
                        <td></td>
                    </tr>
            </table>

		<!-- Perempuan FEACES -->
		<?php elseif ($print_labor2['jenis_kelamin'] == 'PEREMPUAN' && $print_labor2['jenis_form'] == 'FEACES') :?>
           
            <?php echo ' <script type="text/javascript"> alert("Maaf, Cetak Form Tersebut Tidak Tersedia.");  window.location.href = "javascript:history.go(-1)"; </script>' ?>

		<!-- Perempuan URIN -->
		<?php elseif ($print_labor2['jenis_kelamin'] == 'PEREMPUAN' && $print_labor2['jenis_form'] == 'URIN'): ?>
           
            <?php echo ' <script type="text/javascript"> alert("Maaf, Cetak Form Tersebut Tidak Tersedia.");  window.location.href = "javascript:history.go(-1)"; </script>' ?>

		<?php elseif ($print_labor2['jenis_kelamin'] == 'PEREMPUAN' && $print_labor2['jenis_form'] == ''): ?>
		<!-- Perempuan -->
			<table style="border: 0px solid black; ">
				<tr>
					<td style="font-size:11px; width:12%; font-weight:bold; border: 0px solid black; padding-bottom:0px;">Nama Pasien</td>
					<td style="font-size:11px; width:34%; border: 0px solid black; padding-bottom:0px;">: <?= $print_labor2['pasien']; ?></td>
					<td style="font-size:11px; width:12%; font-weight:bold; border: 0px solid black; padding-bottom:0px;">Jenis Kelamin</td>
					<td style="font-size:11px; width:13%; border: 0px solid black; padding-bottom:0px;">: <?= $print_labor2['jenis_kelamin']; ?></td>
					<td style="font-size:11px; width:13%; font-weight:bold; border: 0px solid black; padding-bottom:0px;">&nbsp;&nbsp;&nbsp;&nbsp;Jam Sampling</td>
					<td style="font-size:11px; width:13%; border: 0px solid black; padding-bottom:0px;">:  <?php date_default_timezone_get('Asia/Jakarta');
													setlocale(LC_TIME, 'IND');
												
													$time = $print_labor2['tanggal_req'];
													echo date("H:i",strtotime($time))?> WIB</td>
				</tr>

				<tr>
					<td style="font-size:11px; width:12%; font-weight:bold; border: 0px solid black; padding-bottom:0px;">NO RM</td>
					<td style="font-size:11px; width:34%; border: 0px solid black; padding-bottom:0px;">: <?= $print_labor2['id_pasien']; ?></td>
					<td style="font-size:11px; width:12%; font-weight:bold; border: 0px solid black; padding-bottom:0px;">Cara Bayar</td>
					<td style="font-size:11px; width:13%; border: 0px solid black; padding-bottom:0px;">: <?= strtoupper($print_labor2['cara_bayar']); ?></td>
					<td style="font-size:11px; width:12%; font-weight:bold; border: 0px solid black; padding-bottom:0px;">&nbsp;&nbsp;&nbsp;&nbsp;Jam Selesai</td>
					<td style="font-size:11px; width:13%; border: 0px solid black; padding-bottom:0px;">: <?php date_default_timezone_get('Asia/Jakarta');
													setlocale(LC_TIME, 'IND');
												
													$time = $print_labor2['tanggal'];
													echo date("H:i",strtotime($time))?> WIB</td>
				</tr>

				<tr>
					<td style="font-size:11px; width:12%; font-weight:bold; border: 0px solid black;">Tanggal</td>
					<td style="font-size:11px; width:34%; border: 0px solid black;">: <?php date_default_timezone_get('Asia/Jakarta');
																							setlocale(LC_TIME, 'IND');
																							echo strftime("%A, %e %B %Y"); ?></td>
					<td style="font-size:11px; width:12%; font-weight:bold; border: 0px solid black;">Poli / Kelas</td>
					<td style="font-size:11px; width:20%; border: 0px solid black;">: <?= $print_labor2['cara_masuk']; ?></td>
					<td style="font-size:11px; width:13%; border: 0px solid black;"></td>
				</tr>

			</table>

            <table style="padding:10px; margin-top:15px; border-collapse: collapse;">
                    <th style="font-size:11px; padding-right:34px; padding-bottom:4px; padding-top:4px; border: 1px solid black;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PEMERIKSAAN</th>
                    <th style="font-size:11px; padding-right:20px; padding-bottom:4px; padding-top:4px; border: 1px solid black;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;HASIL</th>
                    <th style="font-size:11px; padding-right:12px; padding-bottom:4px; padding-top:4px; border: 1px solid black;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NILAI NORMAL</th>
                    <th style="font-size:11px; padding-right:34px; padding-bottom:4px; padding-top:4px; border: 1px solid black;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PEMERIKSAAN</th>
                    <th style="font-size:11px; padding-right:20px; padding-bottom:4px; padding-top:4px; border: 1px solid black;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;HASIL</th>
                    <th style="font-size:11px; padding-right:12px; padding-bottom:4px; padding-top:4px; border: 1px solid black;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NILAI NORMAL</th>

                    <tr>
                        <td>&nbsp;HEMATOLOGI</td>
                        <td></td>
                        <td></td>
                        <td>&nbsp;KIMIA DARAH</td>
                        <td></td>
                        <td></td>
                    </tr>

                    <tr>
                        <td>&nbsp;&nbsp; <i>- PT</i></td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['pt']; ?> <?php } ?><center></td>
                        <td>&nbsp;11 - 16 Sec</td>
                        <td>&nbsp;GULA DARAH</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['gul_darah']; ?> <?php } ?><center></td>
                        <td>&nbsp;54 - 103 mg/dl</td>
                    </tr>

                    <tr>
                        <td>&nbsp;&nbsp; <i>- INR</i></td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['inr']; ?> <?php } ?><center></td>
                        <td>&nbsp;0.7 - 1.3</td>
                        <td>&nbsp;UREUM </td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['ureum']; ?> <?php } ?><center></td>
                        <td>&nbsp;10 - 50 mg/dl</td>
                    </tr>

                    <tr>
                        <td>&nbsp;&nbsp; <i>- APTT</i></td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['aptt']; ?> <?php } ?><center></td>
                        <td>&nbsp;25  - 40 Sec</td>
                        <td>&nbsp;CREATININ</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['creatinin']; ?> <?php } ?><center></td>
                        <td>&nbsp;0.2 - 0.4 mg/dl</td>
                    </tr>

                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>&nbsp;TOTAL PROTEIN</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['protein']; ?> <?php } ?><center></td>
                        <td>&nbsp;5.1 - 7.3 gr/dl</td>
                    </tr>

                    <tr>
                        <td>&nbsp;HB</td>
                        <td></td>
                        <td></td>
                        <td>&nbsp;ALBUMIN</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['albumin']; ?> <?php } ?><center></td>
                        <td>&nbsp;3.8 - 5.4 gr/dl</td>
                    </tr>

                    <tr>
                        <td>&nbsp;&nbsp; 40 Hr - 50 Hr</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['hb4050']; ?> <?php } ?><center></td>
                        <td>&nbsp;9.0 - 16.6 g/dl</td>
                        <td>&nbsp;BILIRUBIN TOTAL</td>
                        <td></td>
                        <td>&nbsp;0.3 - 1.2 mg/dl</td>
                    </tr>

                    <tr>
                        <td>&nbsp;&nbsp; > 50 Hr - 2.5Bln</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['hb5025']; ?> <?php } ?><center></td>
                        <td>&nbsp;9.2 - 13.6 g/dl</td>
                        <td>&nbsp;BILIRUBIN : DIREK</td>
                        <td></td>
                        <td>&nbsp;0 - 0.2 mg/dl</td>
                    </tr>

                    <tr>
                        <td>&nbsp;&nbsp; 2.6 - 3.5 Bln</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['hb2635']; ?> <?php } ?><center></td>
                        <td>&nbsp;9.6 - 12.8 g/dl</td>
                        <td>&nbsp;BILIRUBIN : INDIREK</td>
                        <td></td>
                        <td>&nbsp;0 - 1.1 mg/dl</td>
                    </tr>

                    <tr>
                        <td>&nbsp;&nbsp; 4  - 7 Bln</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['hb47']; ?> <?php } ?><center></td>
                        <td>&nbsp;10.1 - 12.9 g/dl</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>

                    <tr>
                        <td>&nbsp;&nbsp; 8 Bln  - 12 Bln</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['hb812']; ?> <?php } ?><center></td>
                        <td>&nbsp;150 - 400 RIBU/mm³</td>
                        <td>&nbsp;ALT / SGPT</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['sgpt']; ?> <?php } ?><center></td>
                        <td>&nbsp;13 - 45 U/L</td>
                    </tr>

                    <tr>
                        <td>&nbsp;LEKOSIT</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['leukosit']; ?> <?php } ?><center></td>
                        <td>&nbsp;5000 - 10.000 / mm³</td>
                        <td>&nbsp;AST/SGOT</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['sgot']; ?> <?php } ?><center></td>
                        <td>&nbsp;9 - 80 U/L</td>
                    </tr>

                    <tr>
                        <td>&nbsp;TROMBOSIT</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['trombosit']; ?> <?php } ?><center></td>
                        <td>&nbsp;150 - 400 RIBU/mm³</td>
                        <td>&nbsp;ALP</td>
                        <td></td>
                        <td>&nbsp;L  < 115 U/L</td>
                    </tr>

                    <tr>
                        <td>&nbsp;HEMATOKRIT</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['alp']; ?> <?php } ?><center></td>
                        <td>&nbsp;P  < 105 U/L</td>
                    </tr>

                    <tr>
                        <td>&nbsp;&nbsp;  40 Hr - 50 Hr</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['hematokrit4050']; ?> <?php } ?><center></td>
                        <td>&nbsp;30 - 54 %</td>
                        <td>&nbsp;GGT</td>
                        <td></td>
                        <td>&nbsp;L  <55 U/L</td>
                    </tr>

                    <tr>
                        <td>&nbsp;&nbsp;  > 50 Hr - 2.5Bln</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['hematokrit5025']; ?> <?php } ?><center></td>
                        <td>&nbsp;30 - 46 %</td>
                        <td></td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['ggt']; ?> <?php } ?><center></td>
                        <td>&nbsp;P  <38 U/L</td>
                    </tr>

                    <tr>
                        <td>&nbsp;&nbsp;  2.6 - 3.5 Bln</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['hematokrit2635']; ?> <?php } ?><center></td>
                        <td>&nbsp;31 - 43 %</td>
                        <td>&nbsp;URID ACID  < 12 Thn</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['uric_acid']; ?> <?php } ?><center></td>
                        <td>&nbsp;2.0 mg/dl</td>
                    </tr>

                    <tr>
                        <td>&nbsp;&nbsp;  4  - 7 Bln</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['hematokrit47']; ?> <?php } ?><center></td>
                        <td>&nbsp;32 - 44 %</td>
                        <td>&nbsp;TRIGLISERIDA</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['trigiserida']; ?> <?php } ?><center></td>
                        <td>&nbsp;60 - 150 mg/dl</td>
                    </tr>

                    <tr>
                        <td>&nbsp;&nbsp;  8 Bln  - 12 Bln</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['hematokrit812']; ?> <?php } ?><center></td>
                        <td>&nbsp;35 - 43 %</td>
                        <td>&nbsp;CHOLESTEROL</td>
                        <td></td>
                        <td>&nbsp;L 120 - 200 mg/dl</td>
                    </tr>
                    
                    <tr>
                        <td>&nbsp;HITUNG JENIS</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['cho']; ?> <?php } ?><center></td>
                        <td>&nbsp;P 120 - 200 mg/dl</td>
                    </tr>

                    <tr>
                        <td>&nbsp;&nbsp;- BAS</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['bas']; ?> <?php } ?><center></td>
                        <td>&nbsp;0 - 1 %</td>
                        <td>&nbsp;LDL</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['ldl']; ?> <?php } ?><center></td>
                        <td>&nbsp;<150 mg/dl</td>
                    </tr>

                    <tr>
                        <td>&nbsp;&nbsp;- EOS</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['eos']; ?> <?php } ?><center></td>
                        <td>&nbsp;1 - 5 %</td>
                        <td>&nbsp;HDL</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['hdl']; ?> <?php } ?><center></td>
                        <td>&nbsp;35 -60 mg/dl</td>
                    </tr>

                    <tr>
                        <td>&nbsp;&nbsp;- MONO</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['mono']; ?> <?php } ?><center></td>
                        <td>&nbsp;1 - 11 %</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>

                    <tr>
                        <td>&nbsp;&nbsp;- SEGMEN</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['segmen']; ?> <?php } ?><center></td>
                        <td>&nbsp;17 - 60 %</td>
                        <td>&nbsp;CRP</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['crp']; ?> <?php } ?><center></td>
                        <td>&nbsp;< 10 Mg/L</td>
                    </tr>

                    <tr>
                        <td>&nbsp;&nbsp;- LYMPO</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['lympo']; ?> <?php } ?><center></td>
                        <td>&nbsp;20 - 70 %</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>

                    <tr>
                        <td>&nbsp;MCV</td>
                        <td></td>
                        <td></td>
                        <td>&nbsp;ELEKTROLIT</td>
                        <td></td>
                        <td></td>
                    </tr>

                    <tr>
                        <td>&nbsp;&nbsp; 37 Hr</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['mcv37']; ?> <?php } ?><center></td>
                        <td>&nbsp;82 - 126 fl</td>
                        <td>&nbsp;&nbsp;NA</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['na']; ?> <?php } ?><center></td>
                        <td>&nbsp;128 - 138 mmol/l</td>
                    </tr>

                    <tr>
                        <td>&nbsp;&nbsp; 1.5 - 2.5 Bln</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['mcv1525']; ?> <?php } ?><center></td>
                        <td>&nbsp;81 - 121 fl</td>
                        <td>&nbsp;&nbsp;K</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['k']; ?> <?php } ?><center></td>
                        <td>&nbsp;3,9 - 4,9 mmol/l</td>
                    </tr>

                    <tr>
                        <td>&nbsp;&nbsp; 2.6 - 3.5 Bln</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['mcv2635']; ?> <?php } ?><center></td>
                        <td>&nbsp;77 - 113 fl</td>
                        <td>&nbsp;&nbsp;CL</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['cl']; ?> <?php } ?><center></td>
                        <td>&nbsp;88 - 100 mmol/l</td>
                    </tr>

                    <tr>
                        <td>&nbsp;&nbsp; 3.5  - 7 Bln</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['mcv357']; ?> <?php } ?><center></td>
                        <td>&nbsp;73 - 109 fl</td>
                        <td>&nbsp;&nbsp; Ca</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['ca']; ?> <?php } ?><center></td>
                        <td>&nbsp;0,99 - 1,29 mmol/l</td>
                    </tr>

                    <tr>
                        <td>&nbsp;MCH</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['mch']; ?> <?php } ?><center></td>
                        <td></td>
                        <td>&nbsp;<i>IMUNOSEROLOGI</i></td>
                        <td></td>
                        <td></td>
                    </tr>

                    <tr>
                        <td>&nbsp;&nbsp; 37 Hr</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['mch37']; ?> <?php } ?><center></td>
                        <td>&nbsp;26 - 38 pg/cell</td>
                        <td>&nbsp;WIDAL</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['widal']; ?> <?php } ?><center></td>
                        <td></td>
                    </tr>

                    <tr>
                        <td>&nbsp;&nbsp; 1 - 1.5 Bln</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['mch115']; ?> <?php } ?><center></td>
                        <td>&nbsp;25- 387pg/cell</td>
                        <td>&nbsp;TROPONIN </td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['troponin']; ?> <?php } ?><center></td>
                        <td></td>
                    </tr>

                    <tr>
                        <td>&nbsp;&nbsp; 2 - 2.5 Bln</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['mch225']; ?> <?php } ?><center></td>
                        <td>&nbsp;24 - 36 pg/cell</td>
                        <td>&nbsp;NS 1</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['ns1']; ?> <?php } ?><center></td>
                        <td>&nbsp;24 - 36 pg/cell</td>
                    </tr>

                    <tr>
                        <td>&nbsp;&nbsp; 3.6 - 3.5 Bln</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['mch3635']; ?> <?php } ?><center></td>
                        <td>&nbsp;23 - 36 pg/cell</td>
                        <td>&nbsp;IgG/IgM DENGUE</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['dengue']; ?> <?php } ?><center></td>
                        <td></td>
                    </tr>

                    <tr>
                        <td>&nbsp;&nbsp; 2.6 - 10 Bln</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['mch2610']; ?> <?php } ?><center></td>
                        <td>&nbsp;21 - 33 pg/cell</td>
                        <td>&nbsp;IgG/IgM SALMONELLA</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['salmonella']; ?> <?php } ?><center></td>
                        <td></td>
                    </tr>

                    <tr>
                        <td>&nbsp;&nbsp; 11 -  5 Thn</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['mch115']; ?> <?php } ?><center></td>
                        <td>&nbsp;23 - 31 pg/cell</td>
                        <td>&nbsp;HBSAG</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['hbsag']; ?> <?php } ?><center></td>
                        <td></td>
                    </tr>


                    <tr>
                        <td>&nbsp;MCHC</td>
                        <td></td>
                        <td></td>
                        <td>&nbsp;HBSAB</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['hbsab']; ?> <?php } ?><center></td>
                        <td></td>
                    </tr>

                    <tr>
                        <td>&nbsp;&nbsp; 37 Hr</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['mchc37']; ?> <?php } ?><center></td>
                        <td>&nbsp;25 - 37 g/dl</td>
                        <td>&nbsp;B20 </td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['b20']; ?> <?php } ?><center></td>
                        <td></td>
                    </tr>

                    <tr>
                        <td>&nbsp;&nbsp; 40 Hr - 7 Bln</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['mchc407']; ?> <?php } ?><center></td>
                        <td>&nbsp;26 - 34 g/dl</td>
                        <td>&nbsp;VDRL</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['vdrl']; ?> <?php } ?><center></td>
                        <td></td>
                    </tr>

                    <tr>
                        <td>&nbsp;&nbsp; 8 - 12 Bln</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['mchc812']; ?> <?php } ?><center></td>
                        <td>&nbsp;28 - 32 g/dl</td>
                        <td>&nbsp;GOLONGAN DARAH</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['gol_darah']; ?> <?php } ?><center></td>
                        <td></td>
                    </tr>

                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>&nbsp;RHESUS</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['rhesus']; ?> <?php } ?><center></td>
                        <td></td>
                    </tr>

                    <tr>
                        <td>&nbsp;RDW-CV</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['rdw_cv']; ?> <?php } ?><center></td>
                        <td>&nbsp;11,0 - 16,0 %</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>

                    <tr>
                        <td>&nbsp;RDW-SD</td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['rdw_sd']; ?> <?php } ?><center></td>
                        <td>&nbsp;35,0 - 56,0 fL</td>
                        <td>&nbsp;<i>MIKROBIOLOGI</i></td>
                        <td></td>
                        <td></td>
                    </tr>

                    <tr>
                        <td>&nbsp;LED</td>
                        <td></td>
                        <td>&nbsp;L s/d 10 mm / jam</td>
                        <td>&nbsp;SPUTUM BTA I </td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['sputum_bta_i']; ?> <?php } ?><center></td>
                        <td></td>
                    </tr>

                    <tr>
                        <td></td>
                        <td><center><?= $print_labor['led'] ?></center></td>
                        <td>&nbsp;P s/d 15 mm / jam</td>
                        <td>&nbsp;SPUTUM BTA II </td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['sputum_bta_ii']; ?> <?php } ?><center></td>
                        <td></td>
                    </tr>

                    <tr>
                        <td>&nbsp;Rapid Cov-2</td>
                        <td></td>
                        <td></td>
                        <td>&nbsp;SPUTUM BTA III </td>
                        <td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['sputum_bta_iii']; ?> <?php } ?><center></td>
                        <td></td>
                    </tr>
            </table>

		<?php else : ?>

		<?php echo ' <script type="text/javascript"> alert("Terjadi kesalahan, Mohon refresh halaman.");</script>' ?>

		<?php endif; ?>


	</div>
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
</html>