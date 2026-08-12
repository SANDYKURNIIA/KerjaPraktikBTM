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
					<td style="font-size:11px; width:34%; border: 0px solid black; padding-bottom:0px;">:  <?= $print_labor2['pasien']; ?></td>
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

			<table style="padding:10px; margin-top:5px; border-collapse: collapse;">
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
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['protein']; ?> <?php } ?><center></td>
					<td>&nbsp;6.4 - 8.3 mg/dl</td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; <i>- PT</i></td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['pt']; ?> <?php } ?><center></td>
					<td>&nbsp;11 - 16 Sec</td>
					<td>&nbsp;ALBUMIN</td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; <i>- INR</i></td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['inr']; ?> <?php } ?><center></td>
					<td>&nbsp;0.7 - 1.3</td>
					<td>&nbsp;&nbsp;  18 - 60 Thn</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['albumin1860']; ?> <?php } ?><center></td>
					<td>&nbsp;3.4 - 4.8 mg/dl</td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; <i>- APTT</i></td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['aptt']; ?> <?php } ?><center></td>
					<td>&nbsp;25  - 40 Sec</td>
					<td>&nbsp;&nbsp;  60 - 90 Thn</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['albumin6090']; ?> <?php } ?><center></td>
					<td>&nbsp;3.2 - 4.6 mg/dl</td>
				</tr>

				<tr>
					<td>&nbsp;HB</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['hb']; ?> <?php } ?><center></td>
					<td>&nbsp;L 11,3 - 15,7 g/dL</td>
					<td>&nbsp;GLOBULIN</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['globulin']; ?> <?php } ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td></td>
					<td></td>
					<td>&nbsp;P 9,9 - 13,6 g/dL</td>
					<td>&nbsp;CHOLESTEROL</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['cho']; ?> <?php } ?><center></td>
					<td>&nbsp;120 - 200 mg/dl</td>
				</tr>

				<tr>
					<td>&nbsp;LEUKOSIT</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['leukosit']; ?> <?php } ?><center></td>
					<td>&nbsp;4000 - 10000 / mm³</td>
					<td>&nbsp;LDL</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['ldl']; ?> <?php } ?><center></td>
					<td>&nbsp;<150 mg/dl</td>
				</tr>

				<tr>
					<td>&nbsp;TROMBOSIT</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['trombosit']; ?> <?php } ?><center></td>
					<td>&nbsp;150 - 400 RIBU/mm³</td>
					<td>&nbsp;HDL</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['hdl']; ?> <?php } ?><center></td>
					<td>&nbsp;35 -60 mg/dl</td>
				</tr>

				<tr>
					<td>&nbsp;HEMATOKRIT</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['hematokrit']; ?> <?php } ?><center></td>
					<td>&nbsp;L 40 - 52 %</td>
					<td>&nbsp;URID ACID</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['uric_acid']; ?> <?php } ?><center></td>
					<td>&nbsp;L 3,4 - 7,2 mg/dl</td>
				</tr>
				
				<tr>
					<td></td>
					<td></td>
					<td>&nbsp;P 35 - 47%</td>
					<td>&nbsp;</td>
					<td></td>
					<td>&nbsp;P 2,6 - 6.0 mg/dl</td>
				</tr>

				<tr>
					<td>&nbsp;ERITROSIT</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['eritrosit']; ?> <?php } ?><center></td>
					<td>&nbsp;L 4.5 - 5.9 Juta/mm³</td>
					<td>&nbsp;TRIGLISERIDA</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['trigiserida']; ?> <?php } ?><center></td>
					<td>&nbsp;60 - 150 mg/dl</td>
				</tr>

				<tr>
					<td></td>
					<td></td>
					<td>&nbsp;P 4.1 - 5.1Juta/mm³</td>
					<td></td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;HITUNG JENIS</td>
					<td></td>
					<td></td>
					<td>&nbsp;ELEKTROLIT</td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp;- BAS</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['bas']; ?> <?php } ?><center></td>
					<td>&nbsp;0 - 1 %</td>
					<td>&nbsp;- NA</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['na']; ?> <?php } ?><center></td>
					<td>&nbsp;128 - 138 mmol/l</td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp;- EOS</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['eos']; ?> <?php } ?><center></td>
					<td>&nbsp;2 - 4 %</td>
					<td>&nbsp;- K</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['k']; ?> <?php } ?><center></td>
					<td>&nbsp;3,9 - 4,9 mmol/l</td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp;- MONO</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['mono']; ?> <?php } ?><center></td>
					<td>&nbsp;2 - 8 %</td>
					<td>&nbsp;- CL</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['cl']; ?> <?php } ?><center></td>
					<td>&nbsp;88 - 100 mmol/l</td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp;- SEGMEN</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['segmen']; ?> <?php } ?><center></td>
					<td>&nbsp;50 - 70 %</td>
					<td>&nbsp;- Ca</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['ca']; ?> <?php } ?><center></td>
					<td>&nbsp;0,99 - 1,29 mmol/l</td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp;- LYMPO</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['lympo']; ?> <?php } ?><center></td>
					<td>&nbsp;25 - 40 %</td>
					<td></td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;MCV</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['mcv']; ?> <?php } ?><center></td>
					<td>&nbsp;80 - 96 fL</td>
					<td>&nbsp;<i>IMUNOSEROLOGI</i></td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;MCH</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['mch']; ?> <?php } ?><center></td>
					<td>&nbsp;28 - 33 pg</td>
					<td>&nbsp;MALARIA</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['malaria']; ?> <?php } ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;MCHC</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['mchc']; ?> <?php } ?><center></td>
					<td>&nbsp;33 - 36 g/dL</td>
					<td>&nbsp;WIDAL</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['widal']; ?> <?php } ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;RDW-CV</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['rdw_cv']; ?> <?php } ?><center></td>
					<td>&nbsp;11,0 - 16,0 %</td>
					<td>&nbsp;TROPONIN </td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['troponin']; ?> <?php } ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;RDW-SD</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['rdw_sd']; ?> <?php } ?><center></td>
					<td>&nbsp;35,0 - 56,0 fL</td>
					<td>&nbsp;NS 1 </td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['ns1']; ?> <?php } ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;LED</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['led']; ?> <?php } ?><center></td>
					<td>&nbsp;L s/d 10 mm / jam</td>
					<td>&nbsp;IgG/IgM DENGUE </td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['dengue']; ?> <?php } ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td></td>
					<td></td>
					<td>&nbsp;P s/d 15 mm / jam</td>
					<td>&nbsp;IgG/IgM SALMONELLA </td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['salmonella']; ?> <?php } ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;WAKTU PENDARAHAN (BLT)</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['blt']; ?> <?php } ?><center></td>
					<td>&nbsp;1' - 6'</td>
					<td>&nbsp;HBSAG </td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['hbsag']; ?> <?php } ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;WAKTU PEMBEKUAN(CLT)</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['clt']; ?> <?php } ?><center></td>
					<td>&nbsp;2' - 6'</td>
					<td>&nbsp;HBSAB</td>
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
					<td><center> <?php foreach($print_labor as $print) { ?>  <?php echo $print['vdrl']; ?>	<?php  } ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;GULA DARAH</td>
                   
					<td> <center> <?php foreach($print_labor as $print) { ?>  <?php echo $print['gul_darah']; ?>	<?php  } ?><center></td>
					<td></td>
					<td>&nbsp;GOLONGAN DARAH</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['gol_darah']; ?> <?php } ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp;- PUASA</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['puasa']; ?> <?php } ?><center></td>
					<td>&nbsp;76 - 110 mg/dl</td>
					<td>&nbsp;RHESUS</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['rhesus']; ?> <?php } ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp;- 2 JAM PP</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['2jampp']; ?> <?php } ?><center></td>
					<td>&nbsp;< 150 mg/dl</td>
					<td>&nbsp;PLANO TEST</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['planotes']; ?> <?php } ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp;- SEWAKTU</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['sewaktu']; ?> <?php } ?><center></td>
					<td>&nbsp;110 - 150 mg/dl</td>
					<td>&nbsp;DARAH SAMAR</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['darah_samar']; ?> <?php } ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;HBA1C</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['hba1c']; ?> <?php } ?><center></td>
					<td>&nbsp;4 - 5.6 %</td>
					<td></td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td>&nbsp;T3</td>
					<td></td>
					<td>&nbsp;0,92 - 2,33</td>
				</tr>

				<tr>
					<td>&nbsp;UREUM </td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['ureum']; ?> <?php } ?><center></td>
					<td>&nbsp;10 - 50 mg/dl</td>
					<td>&nbsp;T4</td>
					<td></td>
					<td>&nbsp;60 - 120</td>
				</tr>

				<tr>
					<td>&nbsp;CREATININ </td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['creatinin']; ?> <?php } ?><center></td>
					<td>&nbsp;L 0,6 - 1,1 mg/dl</td>
					<td>&nbsp;TSH</td>
					<td></td>
					<td>&nbsp;0,25 - 5</td>
				</tr>

				<tr>
					<td></td>
					<td></td>
					<td>&nbsp;P 0,5 - 1,5 mg/dl</td>
					<td>&nbsp;FT4</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['ft4']; ?> <?php } ?><center></td>
					<td>&nbsp;9 - 20</td>
				</tr>

				<tr>
					<td>&nbsp;BILIRUBIN TOTAL </td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp;  > 5 hr - 60 Thn</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['bilirubin560']; ?> <?php } ?><center></td>
					<td>&nbsp;0.3 -1.2 mg/dl</td>
					<td>&nbsp;<i>MIKROBIOLOGI</i></td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp;  60 - 90 Thn</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['bilirubin6090']; ?> <?php } ?><center></td>
					<td>&nbsp;0.2 - 1.1 mg/dl</td>
					<td>&nbsp;SPUTUM BTA I</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['sputum_bta_i']; ?> <?php } ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;BILIRUBIN: DIREK</td>
					<td></td>
					<td>&nbsp;0 - 0.2 mg/dl</td>
					<td>&nbsp;SPUTUM BTA II</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['sputum_bta_ii']; ?> <?php } ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;BILIRUBIN: INDIREK</td>
					<td></td>
					<td>&nbsp;0 - 1.1 mg/dl</td>
					<td>&nbsp;SPUTUM BTA III</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['sputum_bta_iii']; ?> <?php } ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;ALT/SGPT</td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp;  12 - 60 Thn</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['sgpt1260']; ?> <?php } ?><center></td>
					<td>&nbsp;L 10 - 40 U/L</td>
					<td></td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td></td>
					<td></td>
					<td>&nbsp;P 7 - 35 U/L</td>
					<td></td>
					<td></td>
					<td></td>
				</tr>


				<tr>
					<td>&nbsp;&nbsp; 60 - 90 Thn</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['sgpt6090']; ?> <?php } ?><center></td>
					<td>&nbsp;L 13 - 40 U/L</td>
					<td></td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td></td>
					<td></td>
					<td>&nbsp;P 10 - 28 U/L</td>
					<td></td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;AST/SGOT</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['sgot']; ?> <?php } ?><center></td>
					<td>&nbsp;L  15 - 40 U/L</td>
					<td></td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td></td>
					<td></td>
					<td>&nbsp;P 13 - 35 U/L</td>
					<td></td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;GGT</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['ggt']; ?> <?php } ?><center></td>
					<td>&nbsp;L <55 U/L </td>
					<td></td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td></td>
					<td></td>
					<td>&nbsp;P <38 U/L</td>
					<td></td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;ALP</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['alp']; ?> <?php } ?><center></td>
					<td>&nbsp;L <115 </td>
					<td></td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td></td>
					<td></td>
					<td>&nbsp;P <105 U/L </td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
			</table>
		
			<!-- Perempuan FEACES -->
		<?php elseif ($print_labor2['jenis_kelamin'] == 'PEREMPUAN' && $print_labor2['jenis_form'] == 'FEACES'): ?>

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

			<table style="padding:10px; margin-top:5px; border-collapse: collapse;">
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
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['protein']; ?> <?php } ?><center></td>
					<td>&nbsp;6.4 - 8.3 mg/dl</td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; <i>- PT</i></td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['pt']; ?> <?php } ?><center></td>
					<td>&nbsp;11 - 16 Sec</td>
					<td>&nbsp;ALBUMIN</td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; <i>- INR</i></td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['inr']; ?> <?php } ?><center></td>
					<td>&nbsp;0.7 - 1.3</td>
					<td>&nbsp;&nbsp;  18 - 60 Thn</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['albumin1860']; ?> <?php } ?><center></td>
					<td>&nbsp;3.4 - 4.8 mg/dl</td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; <i>- APTT</i></td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['aptt']; ?> <?php } ?><center></td>
					<td>&nbsp;25  - 40 Sec</td>
					<td>&nbsp;&nbsp;  60 - 90 Thn</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['albumin6090']; ?> <?php } ?><center></td>
					<td>&nbsp;3.2 - 4.6 mg/dl</td>
				</tr>

				<tr>
					<td>&nbsp;HB</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['hb']; ?> <?php } ?><center></td>
					<td>&nbsp;L 11,3 - 15,7 g/dL</td>
					<td>&nbsp;GLOBULIN</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['globulin']; ?> <?php } ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td></td>
					<td></td>
					<td>&nbsp;P 9,9 - 13,6 g/dL</td>
					<td>&nbsp;CHOLESTEROL</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['cho']; ?> <?php } ?><center></td>
					<td>&nbsp;120 - 200 mg/dl</td>
				</tr>

				<tr>
					<td>&nbsp;LEUKOSIT</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['leukosit']; ?> <?php } ?><center></td>
					<td>&nbsp;4000 - 10000 / mm³</td>
					<td>&nbsp;LDL</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['ldl']; ?> <?php } ?><center></td>
					<td>&nbsp;<150 mg/dl</td>
				</tr>

				<tr>
					<td>&nbsp;TROMBOSIT</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['trombosit']; ?> <?php } ?><center></td>
					<td>&nbsp;150 - 400 RIBU/mm³</td>
					<td>&nbsp;HDL</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['hdl']; ?> <?php } ?><center></td>
					<td>&nbsp;35 -60 mg/dl</td>
				</tr>

				<tr>
					<td>&nbsp;HEMATOKRIT</td>
					<td></td>
					<td>&nbsp;L 40 - 52 %</td>
					<td>&nbsp;URID ACID</td>
					<td></td>
					<td>&nbsp;L 3,4 - 7,2 mg/dl</td>
				</tr>
				
				<tr>
					<td></td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['hematokrit']; ?> <?php } ?><center></td>
					<td>&nbsp;P 35 - 47%</td>
					<td>&nbsp;</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['uric_acid']; ?> <?php } ?><center></td>
					<td>&nbsp;P 2,6 - 6.0 mg/dl</td>
				</tr>

				<tr>
					<td>&nbsp;ERITROSIT</td>
					<td></td>
					<td>&nbsp;L 4.5 - 5.9 Juta/mm³</td>
					<td>&nbsp;TRIGLISERIDA</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['trigiserida']; ?> <?php } ?><center></td>
					<td>&nbsp;60 - 150 mg/dl</td>
				</tr>

				<tr>
					<td></td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['eritrosit']; ?> <?php } ?><center></td>
					<td>&nbsp;P 4.1 - 5.1Juta/mm³</td>
					<td></td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;HITUNG JENIS</td>
					<td></td>
					<td></td>
					<td>&nbsp;ELEKTROLIT</td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp;- BAS</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['bas']; ?> <?php } ?><center></td>
					<td>&nbsp;0 - 1 %</td>
					<td>&nbsp;- NA</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['na']; ?> <?php } ?><center></td>
					<td>&nbsp;128 - 138 mmol/l</td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp;- EOS</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['eos']; ?> <?php } ?><center></td>
					<td>&nbsp;2 - 4 %</td>
					<td>&nbsp;- K</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['k']; ?> <?php } ?><center></td>
					<td>&nbsp;3,9 - 4,9 mmol/l</td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp;- MONO</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['mono']; ?> <?php } ?><center></td>
					<td>&nbsp;2 - 8 %</td>
					<td>&nbsp;- CL</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['cl']; ?> <?php } ?><center></td>
					<td>&nbsp;88 - 100 mmol/l</td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp;- SEGMEN</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['segmen']; ?> <?php } ?><center></td>
					<td>&nbsp;50 - 70 %</td>
					<td>&nbsp;- Ca</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['ca']; ?> <?php } ?><center></td>
					<td>&nbsp;0,99 - 1,29 mmol/l</td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp;- LYMPO</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['lympo']; ?> <?php } ?><center></td>
					<td>&nbsp;25 - 40 %</td>
					<td></td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;MCV</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['mcv']; ?> <?php } ?><center></td>
					<td>&nbsp;80 - 96 fL</td>
					<td>&nbsp;<i>IMUNOSEROLOGI</i></td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;MCH</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['mch']; ?> <?php } ?><center></td>
					<td>&nbsp;28 - 33 pg</td>
					<td>&nbsp;MALARIA</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['malaria']; ?> <?php } ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;MCHC</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['mchc']; ?> <?php } ?><center></td>
					<td>&nbsp;33 - 36 g/dL</td>
					<td>&nbsp;WIDAL</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['widal']; ?> <?php } ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;RDW-CV</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['rdw_cv']; ?> <?php } ?><center></td>
					<td>&nbsp;11,0 - 16,0 %</td>
					<td>&nbsp;TROPONIN </td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['troponin']; ?> <?php } ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;RDW-SD</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['rdw_sd']; ?> <?php } ?><center></td>
					<td>&nbsp;35,0 - 56,0 fL</td>
					<td>&nbsp;NS 1 </td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['ns1']; ?> <?php } ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;LED</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['led']; ?> <?php } ?><center></td>
					<td>&nbsp;L s/d 10 mm / jam</td>
					<td>&nbsp;IgG/IgM DENGUE </td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['dengue']; ?> <?php } ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td></td>
					<td></td>
					<td>&nbsp;P s/d 15 mm / jam</td>
					<td>&nbsp;IgG/IgM SALMONELLA </td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['salmonella']; ?> <?php } ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;WAKTU PENDARAHAN (BLT)</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['blt']; ?> <?php } ?><center></td>
					<td>&nbsp;1' - 6'</td>
					<td>&nbsp;HBSAG </td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['hbsag']; ?> <?php } ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;WAKTU PEMBEKUAN(CLT)</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['clt']; ?> <?php } ?><center></td>
					<td>&nbsp;2' - 6'</td>
					<td>&nbsp;HBSAB</td>
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
					<td>&nbsp;&nbsp;- PUASA</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['puasa']; ?> <?php } ?><center></td>
					<td>&nbsp;76 - 110 mg/dl</td>
					<td>&nbsp;RHESUS</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['rhesus']; ?> <?php } ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp;- 2 JAM PP</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['2jampp']; ?> <?php } ?><center></td>
					<td>&nbsp;< 150 mg/dl</td>
					<td>&nbsp;PLANO TEST</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['planotes']; ?> <?php } ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp;- SEWAKTU</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['sewaktu']; ?> <?php } ?><center></td>
					<td>&nbsp;110 - 150 mg/dl</td>
					<td>&nbsp;DARAH SAMAR</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['darah_samar']; ?> <?php } ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;HBA1C</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['hba1c']; ?> <?php } ?><center></td>
					<td>&nbsp;4 - 5.6 %</td>
					<td></td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td>&nbsp;T3</td>
					<td></td>
					<td>&nbsp;0,92 - 2,33</td>
				</tr>

				<tr>
					<td>&nbsp;UREUM </td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['ureum']; ?> <?php } ?><center></td>
					<td>&nbsp;10 - 50 mg/dl</td>
					<td>&nbsp;T4</td>
					<td></td>
					<td>&nbsp;60 - 120</td>
				</tr>

				<tr>
					<td>&nbsp;CREATININ </td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['creatinin']; ?> <?php } ?><center></td>
					<td>&nbsp;L 0,6 - 1,1 mg/dl</td>
					<td>&nbsp;TSH</td>
					<td></td>
					<td>&nbsp;0,25 - 5</td>
				</tr>

				<tr>
					<td></td>
					<td></td>
					<td>&nbsp;P 0,5 - 1,5 mg/dl</td>
					<td>&nbsp;FT4</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['ft4']; ?> <?php } ?><center></td>
					<td>&nbsp;9 - 20</td>
				</tr>

				<tr>
					<td>&nbsp;BILIRUBIN TOTAL </td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp;  > 5 hr - 60 Thn</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['bilirubin560']; ?> <?php } ?><center></td>
					<td>&nbsp;0.3 -1.2 mg/dl</td>
					<td>&nbsp;<i>MIKROBIOLOGI</i></td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp;  60 - 90 Thn</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['bilirubin6090']; ?> <?php } ?><center></td>
					<td>&nbsp;0.2 - 1.1 mg/dl</td>
					<td>&nbsp;SPUTUM BTA I</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['sputum_bta_i']; ?> <?php } ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;BILIRUBIN: DIREK</td>
					<td></td>
					<td>&nbsp;0 - 0.2 mg/dl</td>
					<td>&nbsp;SPUTUM BTA II</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['sputum_bta_ii']; ?> <?php } ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;BILIRUBIN: INDIREK</td>
					<td></td>
					<td>&nbsp;0 - 1.1 mg/dl</td>
					<td>&nbsp;SPUTUM BTA III</td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['sputum_bta_iii']; ?> <?php } ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;ALT/SGPT</td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp;  12 - 60 Thn</td>
					<td></td>
					<td>&nbsp;L 10 - 40 U/L</td>
					<td></td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td></td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['sgpt1260']; ?> <?php } ?><center></td>
					<td>&nbsp;P 7 - 35 U/L</td>
					<td></td>
					<td></td>
					<td></td>
				</tr>


				<tr>
					<td>&nbsp;&nbsp; 60 - 90 Thn</td>
					<td></td>
					<td>&nbsp;L 13 - 40 U/L</td>
					<td></td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td></td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['sgpt6090']; ?> <?php } ?><center></td>
					<td>&nbsp;P 10 - 28 U/L</td>
					<td></td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;AST/SGOT</td>
					<td></td>
					<td>&nbsp;L  15 - 40 U/L</td>
					<td></td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td></td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['sgot']; ?> <?php } ?><center></td>
					<td>&nbsp;P 13 - 35 U/L</td>
					<td></td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;GGT</td>
					<td></td>
					<td>&nbsp;L <55 U/L </td>
					<td></td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td></td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['ggt']; ?> <?php } ?><center></td>
					<td>&nbsp;P <38 U/L</td>
					<td></td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;ALP</td>
					<td></td>
					<td>&nbsp;L <115 </td>
					<td></td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td></td>
					<td><center><?php foreach($print_labor as $print) { ?>  <?php echo $print['alp']; ?> <?php } ?><center></td>
					<td>&nbsp;P <105 U/L </td>
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