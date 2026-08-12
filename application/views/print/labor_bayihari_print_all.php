<!DOCTYPE html>
<html>
<head>
	<title>PRINT OUT LABORATORIUM - SIBATIK</title>
	<link href="<?= base_url() ?>resources/css/styles_print.css?p=<?=date('his')?>" rel="stylesheet" type="text/css"/>

<style>
    @media print {
    @page { 
    size: F4;
    margin: 0; }

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
		<?php if  ($print_labor2['jenis_kelamin'] == 'LAKI-LAKI' && $print_labor2['jenis_form'] == 'FEACES') :?>
			
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
					<td>&nbsp;TOTAL PROTEIN</td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td>&nbsp;&nbsp; Prematur</td>
					<td></td>
					<td>&nbsp;3.6 - 6.0 g/dl</td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; <i>- PT</i></td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['pt']; ?> <?php } ?><center></td>
					<td>&nbsp;11 - 16 Sec</td>
					<td>&nbsp;&nbsp; 0 - 6 Hr</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['protein06']; ?> <?php } ?><center></td>
					<td>&nbsp;4.6 - 7.0 g/dl</td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; <i>- INR</i></td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['inr']; ?> <?php } ?><center></td>
					<td>&nbsp;0.7 - 1.3</td>
					<td>&nbsp;&nbsp; 1 Minggu </td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['protein1']; ?> <?php } ?><center></td>
					<td>&nbsp;4.4 - 7.6 gr/dl</td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; <i>- APTT</i></td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['aptt']; ?> <?php } ?><center></td>
					<td>&nbsp;25  - 40 Sec</td>
					<td>&nbsp;&nbsp; 7 Bln - 1 thn</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['protein71']; ?> <?php } ?><center></td>
					<td>&nbsp;5.1 - 7.3 gr/dl</td>
				</tr>

				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td>&nbsp;ALBUMIN</td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;HB</td>
					<td></td>
					<td></td>
					<td>&nbsp;&nbsp; 0 - 4 Hr</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['albumin04']; ?> <?php } ?><center></td>
					<td>&nbsp;2.8 - 4.4 gr/dl</td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; 1 Hr</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['hb1_hari']; ?> <?php } ?><center></td>
					<td>&nbsp;15,2 - 23,6 g/dl</td>
					<td>&nbsp;&nbsp; 4 Hr - 14 Thn</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['albumin414']; ?> <?php } ?><center></td>
					<td>&nbsp;3.8 - 5.4 gr/dl</td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; 1 - 6 Hr</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['hb16_hari']; ?> <?php } ?><center></td>
					<td>&nbsp;15.0 - 24.6 gr/dl</td>
					<td>&nbsp;BILIRUBIN TOTAL</td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; 7 - 23 Hr</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['hb723_hari']; ?> <?php } ?><center></td>
					<td>&nbsp;12.7 - 18.7 g/dl</td>
					<td>&nbsp;&nbsp; (Prematur)  0 - 1Hr</td>
					<td></td>
					<td>&nbsp;< 12.0mg/dl</td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; 37 hR - 1 Thn</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['hb371_hari']; ?> <?php } ?><center></td>
					<td>&nbsp;9.0 - 16.6 g/dl</td>
					<td>&nbsp;&nbsp; 3 - 5 Hr</td>
					<td></td>
					<td>&nbsp;< 16.0 mg/dl</td>
				</tr>

				<tr>
					<td>&nbsp; LEKOSIT</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['leukosit']; ?> <?php } ?><center></td>
					<td>&nbsp;5000 - 10.000 / mm³</td>
					<td>&nbsp;&nbsp; (Matur) 0 - 1 Hr</td>
					<td></td>
					<td>&nbsp;1.4 - 8.7 mg/dl</td>
				</tr>

				<tr>
					<td>&nbsp; TROMBOSIT</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['trombosit']; ?> <?php } ?><center></td>
					<td>&nbsp;150 - 400 RIBU/mm³</td>
					<td>&nbsp;&nbsp; 1 - 2 Hr</td>
					<td></td>
					<td>&nbsp;3.4 - 11.5 mg/dl</td>
				</tr>

				<tr>
					<td>&nbsp;HEMATOKRIT</td>
					<td></td>
					<td></td>
					<td>&nbsp;&nbsp; 3 - 5 Hr</td>
					<td></td>
					<td>&nbsp;1.5 - 12.0 mg/dl</td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp;  1 Hr</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['hematokrit1_hari']; ?> <?php } ?><center></td>
					<td>&nbsp;44 - 72 %</td>
					<td>&nbsp;&nbsp; > 5 Hr - 60 Thn</td>
					<td></td>
					<td>&nbsp;0.3 - 1.2 mg/dl</td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp;  1 - 6 Hr</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['hematokrit16_hari']; ?> <?php } ?><center></td>
					<td>&nbsp;50 - 82 %</td>
					<td>&nbsp;BILIRUBIN : DIREK</td>
					<td></td>
					<td>&nbsp;0 - 0.2 mg/dl</td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp;  7 - 23 Hr</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['hematokrit723_hari']; ?> <?php } ?><center></td>
					<td>&nbsp;42 - 63 %</td>
					<td>&nbsp;BILIRUBIN : INDIREK</td>
					<td></td>
					<td>&nbsp;0 - 1.1 mg/dl</td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp;  24 - 37 Hr</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['hematokrit2437_hari']; ?> <?php } ?><center></td>
					<td>&nbsp;31 - 59 %</td>
					<td></td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td>&nbsp;ALT / SGPT</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['sgpt']; ?> <?php } ?><center></td>
					<td>&nbsp;13 - 45 U/L</td>
				</tr>
				
				<tr>
					<td>&nbsp;HITUNG JENIS</td>
					<td></td>
					<td></td>
					<td>&nbsp;AST/SGOT</td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp;- BAS</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['bas']; ?> <?php } ?><center></td>
					<td>&nbsp;0 - 1 %</td>
					<td>&nbsp;0- 10 Hr</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['sgot010']; ?> <?php } ?><center></td>
					<td>&nbsp;47 - 150 U/L</td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp;- EOS</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['eos']; ?> <?php } ?><center></td>
					<td>&nbsp;1 - 5 %</td>
					<td>&nbsp;10 Hr - 24 Bln</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['sgot1024']; ?> <?php } ?><center></td>
					<td>&nbsp;9 - 80 U/L</td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp;- MONO</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['mono']; ?> <?php } ?><center></td>
					<td>&nbsp;1 - 11 %</td>
					<td>&nbsp;&nbsp; 24 Bln - 60 Thn</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['sgot2460']; ?> <?php } ?><center></td>
					<td>&nbsp;L  15 - 40 U/L</td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp;- SEGMEN</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['segmen']; ?> <?php } ?><center></td>
					<td>&nbsp;17 - 60 %</td>
					<td></td>
					<td></td>
					<td>&nbsp;P 13 - 35 U/L</td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp;- LYMPO</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['lympo']; ?> <?php } ?><center></td>
					<td>&nbsp;20 - 40 %</td>
					<td>&nbsp;ALP</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['alp']; ?> <?php } ?><center></td>
					<td>&nbsp;L  < 115 U/L</td>
				</tr>

				<tr>
					<td>&nbsp;MCV</td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td>&nbsp;P  < 105 U/L</td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; 1 Hr</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['mcv1_hari']; ?> <?php } ?><center></td>
					<td>&nbsp;98 - 122 fl</td>
					<td>&nbsp;GGT</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['ggt']; ?> <?php } ?><center></td>
					<td>&nbsp;L  <55 U/L</td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; 2 - 6 Hr</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['mcv26_hari']; ?> <?php } ?><center></td>
					<td>&nbsp;94 - 150 fl</td>
					<td></td>
					<td></td>
					<td>&nbsp;P  <38 U/L</td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; 7 - 23 Hr</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['mcv723_hari']; ?> <?php } ?><center></td>
					<td>&nbsp;84 - 128 fl</td>
					<td>&nbsp;CRP</td>
					<td></td>
					<td>&nbsp;< 10 Mg/L</td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; 24 - 37 Hr</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['mcv2437_hari']; ?> <?php } ?><center></td>
					<td>&nbsp;82 - 126 fl</td>
					<td></td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;MCH</td>
					<td></td>
					<td></td>
					<td>&nbsp;ELEKTROLIT</td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; 1 Hr</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['mch1_hari']; ?> <?php } ?><center></td>
					<td>&nbsp;33 - 41 pg/cell</td>
					<td>&nbsp;NA</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['na']; ?> <?php } ?><center></td>
					<td>&nbsp;128 - 138 mmol/l</td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; 2 - 6 Hr</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['mch26_hari']; ?> <?php } ?><center></td>
					<td>&nbsp;29 - 45 pg/cell</td>
					<td>&nbsp;K </td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['k']; ?> <?php } ?><center></td>
					<td>&nbsp;3,9 - 4,9 mmol/l</td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; 7 - 23 Hr</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['mch723_hari']; ?> <?php } ?><center></td>
					<td>&nbsp;26 - 38 pg/cell</td>
					<td>&nbsp;CL</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['cl']; ?> <?php } ?><center></td>
					<td>&nbsp;88 - 100 mmol/l</td>
				</tr>

				<tr>
					<td>&nbsp;MCHC</td>
					<td></td>
					<td></td>
					<td>&nbsp;Ca</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['ca']; ?> <?php } ?><center></td>
					<td>&nbsp;0,99 - 1,29 mmol/l</td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; 1 Hr</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['mchc1_hari']; ?> <?php } ?><center></td>
					<td>&nbsp;31 - 35  g/dl</td>
					<td></td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; 2 - 6 Hr</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['mchc26_hari']; ?> <?php } ?><center></td>
					<td>&nbsp;24 - 36 g/dl</td>
					<td>&nbsp;<i>IMUNOSEROLOGI</i></td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; 7 - 23 Hr</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['mchc723_hari']; ?> <?php } ?><center></td>
					<td>&nbsp;25 - 37 g/dl</td>
					<td>&nbsp;NS 1</td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;RDW-CV</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['rdw_cv']; ?> <?php } ?><center></td>
					<td>&nbsp;11,0 - 16,0 %</td>
					<td>&nbsp;IgG/IgM DENGUE </td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['dengue']; ?> <?php } ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;RDW-SD</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['rdw_sd']; ?> <?php } ?><center></td>
					<td>&nbsp;35,0 - 56,0 fL</td>
					<td>&nbsp;IgM SALMONELLA</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['salmonella']; ?> <?php } ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;LED</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['led']; ?> <?php } ?><center></td>
					<td>&nbsp;L s/d 10 mm / jam</td>
					<td>&nbsp;HBSAG </td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['hbsag']; ?> <?php } ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td></td>
					<td></td>
					<td>&nbsp;P s/d 15 mm / jam</td>
					<td>&nbsp;HBSAB </td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['hbsab']; ?> <?php } ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td>&nbsp;B20</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['b20']; ?> <?php } ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;<i>KIMIA DARAH</i></td>
					<td></td>
					<td></td>
					<td>&nbsp;VDRL</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['vdrl']; ?> <?php } ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;GULA DARAH</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['gul_darah']; ?> <?php } ?><center></td>
					<td></td>
					<td>&nbsp;GOLONGAN DARAH</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['gol_darah']; ?> <?php } ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; Premature</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['prematur']; ?> <?php } ?><center></td>
					<td>&nbsp;20 - 60 mg/dl</td>
					<td>&nbsp;RHESUS</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['rhesus']; ?> <?php } ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; Bayi</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['bayi']; ?> <?php } ?><center></td>
					<td>&nbsp;54 - 103 mg/dl</td>
					<td></td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp; UREUM </td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['ureum']; ?> <?php } ?><center></td>
					<td>&nbsp;10 - 50 mg/dl</td>
					<td></td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp; CREATININ </td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['creatinin']; ?> <?php } ?><center></td>
					<td>&nbsp;0.2 - 0.4 mg/dl</td>
					<td>&nbsp;Rapid Cov-2</td>
					<td></td>
					<td></td>
				</tr>
    	    </table>

		<!-- Perempuan FEACES -->
		<?php elseif ($print_labor2['jenis_kelamin'] == 'PEREMPUAN' && $print_labor2['jenis_form'] == 'FEACES') :?>
			
			<?php echo ' <script type="text/javascript"> alert("Maaf, Cetak Form Tersebut Tidak Tersedia.");  window.location.href = "javascript:history.go(-1)"; </script>' ?>

		<!-- Perempuan URIN -->
		<?php elseif ($print_labor2['jenis_kelamin'] == 'PEREMPUAN' && $print_labor2['jenis_form'] == 'URIN'): ?>
			
			<?php echo ' <script type="text/javascript"> alert("Maaf, Cetak Form Tersebut Tidak Tersedia.");  window.location.href = "javascript:history.go(-1)"; </script>' ?>

		<!-- Perempuan -->
		<?php elseif ($print_labor2['jenis_kelamin'] == 'PEREMPUAN' && $print_labor2['jenis_form'] == ''): ?>
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
					<td>&nbsp;TOTAL PROTEIN</td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td>&nbsp;&nbsp; Prematur</td>
					<td></td>
					<td>&nbsp;3.6 - 6.0 g/dl</td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; <i>- PT</i></td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['pt']; ?> <?php } ?><center></td>
					<td>&nbsp;11 - 16 Sec</td>
					<td>&nbsp;&nbsp; 0 - 6 Hr</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['protein06']; ?> <?php } ?><center></td>
					<td>&nbsp;4.6 - 7.0 g/dl</td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; <i>- INR</i></td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['inr']; ?> <?php } ?><center></td>
					<td>&nbsp;0.7 - 1.3</td>
					<td>&nbsp;&nbsp; 1 Minggu </td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['protein1']; ?> <?php } ?><center></td>
					<td>&nbsp;4.4 - 7.6 gr/dl</td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; <i>- APTT</i></td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['aptt']; ?> <?php } ?><center></td>
					<td>&nbsp;25  - 40 Sec</td>
					<td>&nbsp;&nbsp; 7 Bln - 1 thn</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['protein71']; ?> <?php } ?><center></td>
					<td>&nbsp;5.1 - 7.3 gr/dl</td>
				</tr>

				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td>&nbsp;ALBUMIN</td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;HB</td>
					<td></td>
					<td></td>
					<td>&nbsp;&nbsp; 0 - 4 Hr</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['albumin04']; ?> <?php } ?><center></td>
					<td>&nbsp;2.8 - 4.4 gr/dl</td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; 1 Hr</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['hb1_hari']; ?> <?php } ?><center></td>
					<td>&nbsp;15,2 - 23,6 g/dl</td>
					<td>&nbsp;&nbsp; 4 Hr - 14 Thn</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['albumin414']; ?> <?php } ?><center></td>
					<td>&nbsp;3.8 - 5.4 gr/dl</td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; 1 - 6 Hr</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['hb16_hari']; ?> <?php } ?><center></td>
					<td>&nbsp;15.0 - 24.6 gr/dl</td>
					<td>&nbsp;BILIRUBIN TOTAL</td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; 7 - 23 Hr</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['hb723_hari']; ?> <?php } ?><center></td>
					<td>&nbsp;12.7 - 18.7 g/dl</td>
					<td>&nbsp;&nbsp; (Prematur)  0 - 1Hr</td>
					<td></td>
					<td>&nbsp;< 12.0mg/dl</td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; 37 Hr - 1 Thn</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['hb371_hari']; ?> <?php } ?><center></td>
					<td>&nbsp;9.0 - 16.6 g/dl</td>
					<td>&nbsp;&nbsp; 3 - 5 Hr</td>
					<td></td>
					<td>&nbsp;< 16.0 mg/dl</td>
				</tr>

				<tr>
					<td>&nbsp; LEKOSIT</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['leukosit']; ?> <?php } ?><center></td>
					<td>&nbsp;5000 - 10.000 / mm³</td>
					<td>&nbsp;&nbsp; (Matur) 0 - 1 Hr</td>
					<td></td>
					<td>&nbsp;1.4 - 8.7 mg/dl</td>
				</tr>

				<tr>
					<td>&nbsp; TROMBOSIT</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['trombosit']; ?> <?php } ?><center></td>
					<td>&nbsp;150 - 400 RIBU/mm³</td>
					<td>&nbsp;&nbsp; 1 - 2 Hr</td>
					<td></td>
					<td>&nbsp;3.4 - 11.5 mg/dl</td>
				</tr>

				<tr>
					<td>&nbsp;HEMATOKRIT</td>
					<td></td>
					<td></td>
					<td>&nbsp;&nbsp; 3 - 5 Hr</td>
					<td></td>
					<td>&nbsp;1.5 - 12.0 mg/dl</td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp;  1 Hr</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['hematokrit1_hari']; ?> <?php } ?><center></td>
					<td>&nbsp;44 - 72 %</td>
					<td>&nbsp;&nbsp; > 5 Hr - 60 Thn</td>
					<td></td>
					<td>&nbsp;0.3 - 1.2 mg/dl</td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp;  1 - 6 Hr</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['hematokrit16_hari']; ?> <?php } ?><center></td>
					<td>&nbsp;50 - 82 %</td>
					<td>&nbsp;BILIRUBIN : DIREK</td>
					<td></td>
					<td>&nbsp;0 - 0.2 mg/dl</td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp;  7 - 23 Hr</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['hematokrit723_hari']; ?> <?php } ?><center></td>
					<td>&nbsp;42 - 63 %</td>
					<td>&nbsp;BILIRUBIN : INDIREK</td>
					<td></td>
					<td>&nbsp;0 - 1.1 mg/dl</td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp;  24 - 37 Hr</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['hematokrit_2437_hari']; ?> <?php } ?><center></td>
					<td>&nbsp;31 - 59 %</td>
					<td></td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td>&nbsp;ALT / SGPT</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['sgpt']; ?> <?php } ?><center></td>
					<td>&nbsp;13 - 45 U/L</td>
				</tr>
				
				<tr>
					<td>&nbsp;HITUNG JENIS</td>
					<td></td>
					<td></td>
					<td>&nbsp;AST/SGOT</td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp;- BAS</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['bas']; ?> <?php } ?><center></td>
					<td>&nbsp;0 - 1 %</td>
					<td>&nbsp;0- 10 Hr</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['sgot010']; ?> <?php } ?><center></td>
					<td>&nbsp;47 - 150 U/L</td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp;- EOS</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['eos']; ?> <?php } ?><center></td>
					<td>&nbsp;1 - 5 %</td>
					<td>&nbsp;10 Hr - 24 Bln</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['sgot1024']; ?> <?php } ?><center></td>
					<td>&nbsp;9 - 80 U/L</td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp;- MONO</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['mono']; ?> <?php } ?><center></td>
					<td>&nbsp;1 - 11 %</td>
					<td>&nbsp;&nbsp; 24 Bln - 60 Thn</td>
					<td></td>
					<td>&nbsp;L  15 - 40 U/L</td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp;- SEGMEN</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['segmen']; ?> <?php } ?><center></td>
					<td>&nbsp;17 - 60 %</td>
					<td></td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['sgot2460']; ?> <?php } ?><center></td>
					<td>&nbsp;P 13 - 35 U/L</td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp;- LYMPO</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['lympo']; ?> <?php } ?><center></td>
					<td>&nbsp;20 - 40 %</td>
					<td>&nbsp;ALP</td>
					<td></td>
					<td>&nbsp;L  < 115 U/L</td>
				</tr>

				<tr>
					<td>&nbsp;MCV</td>
					<td></td>
					<td></td>
					<td></td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['alp']; ?> <?php } ?><center></td>
					<td>&nbsp;P  < 105 U/L</td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; 1 Hr</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['mcv1_hari']; ?> <?php } ?><center></td>
					<td>&nbsp;98 - 122 fl</td>
					<td>&nbsp;GGT</td>
					<td></td>
					<td>&nbsp;L  <55 U/L</td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; 2 - 6 Hr</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['mcv26_hari']; ?> <?php } ?><center></td>
					<td>&nbsp;94 - 150 fl</td>
					<td></td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['ggt']; ?> <?php } ?><center></td>
					<td>&nbsp;P  <38 U/L</td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; 7 - 23 Hr</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['mcv723_hari']; ?> <?php } ?><center></td>
					<td>&nbsp;84 - 128 fl</td>
					<td>&nbsp;CRP</td>
					<td></td>
					<td>&nbsp;< 10 Mg/L</td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; 24 - 37 Hr</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['mcv2437_hari']; ?> <?php } ?><center></td>
					<td>&nbsp;82 - 126 fl</td>
					<td></td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;MCH</td>
					<td></td>
					<td></td>
					<td>&nbsp;ELEKTROLIT</td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; 1 Hr</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['mch1_hari']; ?> <?php } ?><center></td>
					<td>&nbsp;33 - 41 pg/cell</td>
					<td>&nbsp;NA</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['na']; ?> <?php } ?><center></td>
					<td>&nbsp;128 - 138 mmol/l</td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; 2 - 6 Hr</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['mch26_hari']; ?> <?php } ?><center></td>
					<td>&nbsp;29 - 45 pg/cell</td>
					<td>&nbsp;K </td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['k']; ?> <?php } ?><center></td>
					<td>&nbsp;3,9 - 4,9 mmol/l</td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; 7 - 23 Hr</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['mch723_hari']; ?> <?php } ?><center></td>
					<td>&nbsp;26 - 38 pg/cell</td>
					<td>&nbsp;CL</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['cl']; ?> <?php } ?><center></td>
					<td>&nbsp;88 - 100 mmol/l</td>
				</tr>

				<tr>
					<td>&nbsp;MCHC</td>
					<td></td>
					<td></td>
					<td>&nbsp;Ca</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['ca']; ?> <?php } ?><center></td>
					<td>&nbsp;0,99 - 1,29 mmol/l</td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; 1 Hr</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['mchc1_hari']; ?> <?php } ?><center></td>
					<td>&nbsp;31 - 35  g/dl</td>
					<td></td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; 2 - 6 Hr</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['mchc26_hari']; ?> <?php } ?><center></td>
					<td>&nbsp;24 - 36 g/dl</td>
					<td>&nbsp;<i>IMUNOSEROLOGI</i></td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; 7 - 23 Hr</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['mchc723_hari']; ?> <?php } ?><center></td>
					<td>&nbsp;25 - 37 g/dl</td>
					<td>&nbsp;NS 1</td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;RDW-CV</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['rdw_cv']; ?> <?php } ?><center></td>
					<td>&nbsp;11,0 - 16,0 %</td>
					<td>&nbsp;IgG/IgM DENGUE </td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['dengue']; ?> <?php } ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;RDW-SD</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['rdw_sd']; ?> <?php } ?><center></td>
					<td>&nbsp;35,0 - 56,0 fL</td>
					<td>&nbsp;IgM SALMONELLA</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['salmonella']; ?> <?php } ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;LED</td>
					<td></td>
					<td>&nbsp;L s/d 10 mm / jam</td>
					<td>&nbsp;HBSAG </td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['hbsag']; ?> <?php } ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td></td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['led']; ?> <?php } ?><center></td>
					<td>&nbsp;P s/d 15 mm / jam</td>
					<td>&nbsp;HBSAB </td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['hbsab']; ?> <?php } ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td>&nbsp;B20</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['b20']; ?> <?php } ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;<i>KIMIA DARAH</i></td>
					<td></td>
					<td></td>
					<td>&nbsp;VDRL</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['vdrl']; ?> <?php } ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;GULA DARAH</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['gul_darah']; ?> <?php } ?><center></td>
					<td></td>
					<td>&nbsp;GOLONGAN DARAH</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['gol_darah']; ?> <?php } ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; Premature</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['prematur']; ?> <?php } ?><center></td>
					<td>&nbsp;20 - 60 mg/dl</td>
					<td>&nbsp;RHESUS</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['rhesus']; ?> <?php } ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; Bayi</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['bayi']; ?> <?php } ?><center></td>
					<td>&nbsp;54 - 103 mg/dl</td>
					<td></td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp; UREUM </td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['ureum']; ?> <?php } ?><center></td>
					<td>&nbsp;10 - 50 mg/dl</td>
					<td></td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp; CREATININ </td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['creatinin']; ?> <?php } ?><center></td>
					<td>&nbsp;0.2 - 0.4 mg/dl</td>
					<td>&nbsp;Rapid Cov-2</td>
					<td></td>
					<td></td>
				</tr>
        	</table>

		<?php else : ?>
			<?php echo ' <script type="text/javascript"> alert("Terjadi kesalahan, Mohon refresh halaman.");  window.location.href = "javascript:history.go(-1)"; </script>' ?>
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