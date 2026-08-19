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
		<?php if ($print_labor['jenis_kelamin'] == 'LAKI-LAKI' && $print_labor['jenis_form'] == 'FEACES') :?>
			<table style="border: 0px solid black; ">
				<tr>
					<td style="font-size:11px; width:12%; font-weight:bold; border: 0px solid black; padding-bottom:0px;">Nama Pasien</td>
					<td style="font-size:11px; width:34%; border: 0px solid black; padding-bottom:0px;">: <?= $print_labor['pasien']; ?></td>
					<td style="font-size:11px; width:12%; font-weight:bold; border: 0px solid black; padding-bottom:0px;">Jenis Kelamin</td>
					<td style="font-size:11px; width:13%; border: 0px solid black; padding-bottom:0px;">: <?= $print_labor['jenis_kelamin']; ?></td>
					<td style="font-size:11px; width:13%; font-weight:bold; border: 0px solid black; padding-bottom:0px;">&nbsp;&nbsp;&nbsp;&nbsp;Jam Sampling</td>
					<td style="font-size:11px; width:13%; border: 0px solid black; padding-bottom:0px;">:  <?php date_default_timezone_get('Asia/Jakarta');
													setlocale(LC_TIME, 'IND');
												
													$time = $print_labor['tanggal_req'];
													echo date("H:i",strtotime($time))?> WIB</td>
				</tr>

				<tr>
					<td style="font-size:11px; width:12%; font-weight:bold; border: 0px solid black; padding-bottom:0px;">NO RM</td>
					<td style="font-size:11px; width:34%; border: 0px solid black; padding-bottom:0px;">: <?= $print_labor['id_pasien']; ?></td>
					<td style="font-size:11px; width:12%; font-weight:bold; border: 0px solid black; padding-bottom:0px;">Cara Bayar</td>
					<td style="font-size:11px; width:13%; border: 0px solid black; padding-bottom:0px;">: <?= strtoupper($print_labor['cara_bayar']); ?></td>
					<td style="font-size:11px; width:12%; font-weight:bold; border: 0px solid black; padding-bottom:0px;">&nbsp;&nbsp;&nbsp;&nbsp;Jam Selesai</td>
					<td style="font-size:11px; width:13%; border: 0px solid black; padding-bottom:0px;">: <?php date_default_timezone_get('Asia/Jakarta');
													setlocale(LC_TIME, 'IND');
												
													$time = $print_labor['tanggal'];
													echo date("H:i",strtotime($time))?> WIB</td>
				</tr>

				<tr>
					<td style="font-size:11px; width:12%; font-weight:bold; border: 0px solid black;">Tanggal</td>
					<td style="font-size:11px; width:34%; border: 0px solid black;">: <?php date_default_timezone_get('Asia/Jakarta');
																							setlocale(LC_TIME, 'IND');
																							echo strftime("%A, %e %B %Y"); ?></td>
					<td style="font-size:11px; width:12%; font-weight:bold; border: 0px solid black;">Poli / Kelas</td>
					<td style="font-size:11px; width:20%; border: 0px solid black;">: <?= $print_labor['cara_masuk']; ?></td>
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
					<td>&nbsp;BILIRUBIN TOTAL </td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; <i>HB</i></td>
					<td><center><?= $print_labor['hb'] ?></center></td>
					<td>&nbsp;L 11,3 - 15,7 g/dL</td>
					<td>&nbsp;&nbsp;&nbsp;> 5 hr - 60 Thn</td>
					<td><center><?= $print_labor['bilirubin560'] ?></center></td>
					<td>&nbsp;0.3 -1.2 mg/dl</td>
				</tr>

				<tr>
					<td></td>
					<td></td>
					<td>&nbsp;P 9,9 - 13,6 g/dL</td>
					<td>&nbsp;&nbsp;&nbsp;60 - 90 Thn</td>
					<td><center><?= $print_labor['bilirubin6090'] ?></center></td>
					<td>&nbsp;0.2 - 1.1 mg/dl</td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp;LEUKOSIT</td>
					<td><center><?= $print_labor['leukosit'] ?></center></td>
					<td>&nbsp;4000 - 10000 / mm³</td>
					<td>&nbsp;&nbsp;BILIRUBIN: DIREK</td>
					<td></td>
					<td>&nbsp;0 - 0.2 mg/dl</td>
				</tr>

				<tr>
					<td>&nbsp;TROMBOSIT</td>
					<td><center><?= $print_labor['trombosit'] ?><center></td>
					<td>&nbsp;150 - 400 RIBU/mm³</td>
					<td>&nbsp;BILIRUBIN: INDIREK</td>
					<td></td>
					<td>&nbsp;0 - 1.1 mg/dl</td>
				</tr>

				<tr>
					<td>&nbsp;HEMATOKRIT</td>
					<td><center><?= $print_labor['trombosit'] ?><center></td>
					<td>&nbsp;L 40 - 52 %</td>
					<td>&nbsp;ALT/SGPT</td>
					<td></td>
					<td>&nbsp;</td>
				</tr>

				<tr>
					<td></td>
					<td></td>
					<td>&nbsp;P 35 - 47%</td>
					<td>&nbsp;&nbsp;&nbsp;12 - 60 Thn</td>
					<td><center><?= $print_labor['sgpt1260'] ?><center></td>
					<td>&nbsp;L 10 - 40 U/L</td>
				</tr>

				<tr>
					<td>&nbsp;ERITROSIT</td>
					<td><center><?= $print_labor['eritrosit'] ?><center></td>
					<td>&nbsp;L 4.5 - 5.9 Juta/mm³</td>
					<td></td>
					<td></td>
					<td>&nbsp;P 7 - 35 U/L</td>
				</tr>

				<tr>
					<td></td>
					<td></td>
					<td>&nbsp;P 4.1 - 5.1Juta/mm³</td>
					<td>&nbsp;&nbsp;&nbsp;60 - 90 Thn</td>
					<td><center><?= $print_labor['sgpt6090'] ?><center></td>
					<td>&nbsp;L 13 - 40 U/L</td>
				</tr>
				
				<tr>
					<td>&nbsp;HITUNG JENIS</td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td>&nbsp;P 10 - 28 U/L</td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp;&nbsp;- BAS</td>
					<td><center><?= $print_labor['bas'] ?><center></td>
					<td>&nbsp;0 - 1 %</td>
					<td>&nbsp;AST/SGOT</td>
					<td><center><?= $print_labor['sgot'] ?><center></td>
					<td>&nbsp;L  15 - 40 U/L</td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp;- EOS</td>
					<td><center><?= $print_labor['eos'] ?><center></td>
					<td>&nbsp;2 - 4 %</td>
					<td></td>
					<td></td>
					<td>&nbsp;P 13 - 35 U/L</td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp;- MONO</td>
					<td><center><?= $print_labor['mono'] ?><center></td>
					<td>&nbsp;2 - 8 %</td>
					<td>&nbsp;URID ACID</td>
					<td><center><?= $print_labor['uric_acid'] ?><center></td>
					<td>&nbsp;L 3,4 - 7,2 mg/dl</td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp;- SEGMEN</td>
					<td><center><?= $print_labor['segmen'] ?><center></td>
					<td>&nbsp;50 - 70 %</td>
					<td></td>
					<td></td>
					<td>&nbsp;P 2,6 - 6.0 mg/dl</td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp;- LYMPO</td>
					<td><center><?= $print_labor['lympo'] ?><center></td>
					<td>&nbsp;25 - 40 %</td>
					<td>&nbsp;TRIGLISERIDA</td>
					<td><center><?= $print_labor['trigiserida'] ?><center></td>
					<td>&nbsp;60 - 150 mg/dl</td>
				</tr>

				<tr>
					<td>&nbsp;MCV</td>
					<td><center><?= $print_labor['mcv'] ?><center></td>
					<td>&nbsp;80 - 96 fL</td>
					<td>&nbsp;CHOLESTEROL</td>
					<td><center><?= $print_labor['cho'] ?><center></td>
					<td>&nbsp;L 120 - 200 mg/dl</td>
				</tr>

				<tr>
					<td>&nbsp;MCH</td>
					<td><center><?= $print_labor['mch'] ?><center></td>
					<td>&nbsp;28 - 33 pg</td>
					<td></td>
					<td></td>
					<td>&nbsp;P 120 - 200 mg/dl</td>
				</tr>

				<tr>
					<td>&nbsp;MCHC</td>
					<td><center><?= $print_labor['mchc'] ?><center></td>
					<td>&nbsp;33 - 36 g/dL</td>
					<td>&nbsp;LDL</td>
					<td><center><?= $print_labor['ldl'] ?><center></td>
					<td>&nbsp;<150 mg/dl</td>
				</tr>

				<tr>
					<td>&nbsp;RDW-CV</td>
					<td><center><?= $print_labor['rdw_cv'] ?><center></td>
					<td>&nbsp;11,0 - 16,0 %</td>
					<td>&nbsp;HDL</td>
					<td><center><?= $print_labor['hdl'] ?><center></td>
					<td>&nbsp;35 -60 mg/dl</td>
				</tr>

				<tr>
					<td>&nbsp;RDW-SD</td>
					<td><center><?= $print_labor['rdw_sd'] ?><center></td>
					<td>&nbsp;35,0 - 56,0 fL</td>
					<td>&nbsp;<i>FEACES</i></td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;WAKTU PENDARAHAN</td>
					<td><center><?= $print_labor['blt'] ?><center></td>
					<td>&nbsp;1' - 6'</td>
					<td>&nbsp;<b>• MAKROSKOPIS</b></td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;WAKTU PEMBEKUAN</td>
					<td><center><?= $print_labor['clt'] ?><center></td>
					<td>&nbsp;2' - 6'</td>
					<td>&nbsp;&nbsp; - Darah </td>
					<td><center><?= $print_labor['makro_darah'] ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;<i>URINALISA</i></td>
					<td></td>
					<td></td>
					<td>&nbsp;>&nbsp; - Lendir </td>
					<td><center><?= $print_labor['makro_lendir'] ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;<b>MAKROSKOPIS:</b></td>
					<td></td>
					<td></td>
					<td>&nbsp;&nbsp; - Bau</td>
					<td><center><?= $print_labor['makro_bau'] ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; - Warna</td>
					<td></td>
					<td></td>
					<td>&nbsp;&nbsp; - Konsistensi </td>
					<td><center><?= $print_labor['makro_konsistensi'] ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; - Kejernihan</td>
					<td></td>
					<td></td>
					<td>&nbsp;&nbsp; - Warna </td>
					<td><center><?= $print_labor['makro_warna'] ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;<b>MIKROSKOPIS</b></td>
					<td></td>
					<td></td>
					<td>&nbsp;&nbsp; - Parasit</td>
					<td><center><?= $print_labor['makro_parasit'] ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; - ERITROSIT</td>
					<td></td>
					<td>&nbsp;<1/Lpb</td>
					<td>&nbsp;<b>• MIKROSKOPIS</b></td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; - LEUKOSIT</td>
					<td></td>
					<td>&nbsp;<6/Lpb</td>
					<td>&nbsp;&nbsp; - Leukosit</td>
					<td><center><?= $print_labor['mikro_leukosit'] ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; - SEL EPITEL</td>
					<td></td>
					<td>&nbsp;<6/Lpb</td>
					<td>&nbsp;&nbsp; - Eritrosit</td>
					<td><center><?= $print_labor['mikro_eritrosit'] ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; - SILINDER</td>
					<td></td>
					<td>&nbsp;Negatif/Lpk</td>
					<td>&nbsp;&nbsp; - Sel Epitel</td>
					<td><center><?= $print_labor['mikro_sel_epitel'] ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; - KRISTAL</td>
					<td></td>
					<td>&nbsp;Negatif/Lpk</td>
					<td>&nbsp;&nbsp; - Silider</td>
					<td><center><?= $print_labor['mikro_silinder'] ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; - BAKTERI</td>
					<td></td>
					<td>&nbsp;Negatif/Lpk</td>
					<td>&nbsp;&nbsp; - Telur cacing</td>
					<td><center><?= $print_labor['mikro_telur_cacing'] ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; - JAMUR</td>
					<td></td>
					<td>&nbsp;Negatif/Lpk</td>
					<td>&nbsp;&nbsp; - Amoeba</td>
					<td><center><?= $print_labor['mikro_amoeba'] ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;KIMIA URIN</td>
					<td></td>
					<td>&nbsp;Negatif/Lpk</td>
					<td>&nbsp;&nbsp; - Bakteri</td>
					<td><center><?= $print_labor['mikro_bakteri'] ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; - ERITROSIT </td>
					<td><center><?= $print_labor['kimia_eritrosit'] ?><center></td>
					<td>&nbsp;Negatif/Lpk</td>
					<td>&nbsp;DARAH SAMAR</td>
					<td><center><?= $print_labor['darah_samar'] ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; - GLUKOSA </td>
					<td><center><?= $print_labor['kimia_glukosa'] ?><center></td>
					<td>&nbsp;Negatif/Lpk</td>
					<td>&nbsp;WIDAL</td>
					<td><center><?= $print_labor['widal'] ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; - PROTEIN </td>
					<td><center><?= $print_labor['kimia_protein'] ?><center></td>
					<td>&nbsp;Negatif/Lpk</td>
					<td>&nbsp;TROPONIN </td>
					<td><center><?= $print_labor['troponin'] ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; - BILIRUBIN </td>
					<td><center><?= $print_labor['kimia_bilirubin'] ?><center></td>
					<td>&nbsp;Negatif/Lpk</td>
					<td>&nbsp;IgG/IgM DENGUE </td>
					<td><center><?= $print_labor['dengue'] ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; - UROBILINOGEN </td>
					<td><center><?= $print_labor['kimia_urobilinogen'] ?><center></td>
					<td>&nbsp;Negatif/Lpk</td>
					<td>&nbsp;IgG/IgM SALMONELLA </td>
					<td><center><?= $print_labor['salmonella'] ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; - PH</td>
					<td><center><?= $print_labor['kimia_ph'] ?><center></td>
					<td>&nbsp;5-8</td>
					<td>&nbsp;PLANO TEST</td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; - BERAT JENIS</td>
					<td><center><?= $print_labor['kimia_berat_jenis'] ?><center></td>
					<td>&nbsp;1.003-1.029</td>
					<td>&nbsp;HBSAG</td>
					<td><center><?= $print_labor['hbsag'] ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; - KETON</td>
					<td><center><?= $print_labor['kimia_keton'] ?><center></td>
					<td>&nbsp;Negatif/Lpk</td>
					<td>&nbsp;HBSAG</td>
					<td><center><?= $print_labor['hbsag'] ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; - NITRIT</td>
					<td><center><?= $print_labor['kimia_nitrit'] ?><center></td>
					<td>&nbsp;Negatif/Lpk</td>
					<td>&nbsp;B20</td>
					<td><center><?= $print_labor['b20'] ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; - LEUKOSIT</td>
					<td><center><?= $print_labor['kimia_leukosit'] ?><center></td>
					<td>&nbsp;Negatif/Lpk</td>
					<td>&nbsp;GOLONGAN DARAH</td>
					<td><center><?= $print_labor['gol_darah'] ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;GULA DARAH</td>
					<td></td>
					<td></td>
					<td>&nbsp;MALARIA</td>
					<td><center><?= $print_labor['malaria'] ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; - PUASA</td>
					<td><center><?= $print_labor['puasa'] ?><center></td>
					<td>&nbsp;76 - 110 mg/dl</td>
					<td>&nbsp;<i>ELEKTROLIT</i></td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; - 2 JAM PP</td>
					<td><center><?= $print_labor['2jampp'] ?><center></td>
					<td>&nbsp;< 150 mg/dl</td>
					<td>&nbsp;NA</td>
					<td><center><?= $print_labor['na'] ?><center></td>
					<td>&nbsp;128 - 138 mmol/l</td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; - SEWAKTU</td>
					<td><center><?= $print_labor['sewaktu'] ?><center></td>
					<td>&nbsp;110 - 150 mg/dl</td>
					<td>&nbsp;K</td>
					<td><center><?= $print_labor['k'] ?><center></td>
					<td>&nbsp;3,9 - 4,9 mmol/l</td>
				</tr>

				<tr>
					<td>&nbsp;UREUM </td>
					<td><center><?= $print_labor['ureum'] ?><center></td>
					<td>&nbsp;10 - 50 mg/dl</td>
					<td>&nbsp;CL</td>
					<td><center><?= $print_labor['cl'] ?><center></td>
					<td>&nbsp;88 - 100 mmol/l</td>
				</tr>

				<tr>
					<td>&nbsp;CREATININ</td>
					<td><center><?= $print_labor['creatinin'] ?><center></td>
					<td>&nbsp;L 0,6 - 1,1 mg/dl</td>
					<td>&nbsp;Ca</td>
					<td><center><?= $print_labor['ca'] ?><center></td>
					<td>&nbsp;0,99 - 1,29 mmol/l</td>
				</tr>

				<tr>
					<td></td>
					<td></td>
					<td>&nbsp;P 0,5 - 1,5 mg/dl</td>
					<td></td>
					<td></td>
					<td></td>
				</tr>


			</table>

			<!-- Laki-laki URIN -->
			<?php elseif ($print_labor['jenis_kelamin'] == 'LAKI-LAKI' && $print_labor['jenis_form'] == 'URIN'): ?>
			<table style="border: 0px solid black; ">
				<tr>
					<td style="font-size:11px; width:12%; font-weight:bold; border: 0px solid black; padding-bottom:0px;">Nama Pasien</td>
					<td style="font-size:11px; width:34%; border: 0px solid black; padding-bottom:0px;">: <?= $print_labor['pasien']; ?></td>
					<td style="font-size:11px; width:12%; font-weight:bold; border: 0px solid black; padding-bottom:0px;">Jenis Kelamin</td>
					<td style="font-size:11px; width:13%; border: 0px solid black; padding-bottom:0px;">: <?= $print_labor['jenis_kelamin']; ?></td>
					<td style="font-size:11px; width:13%; font-weight:bold; border: 0px solid black; padding-bottom:0px;">&nbsp;&nbsp;&nbsp;&nbsp;Jam Sampling</td>
					<td style="font-size:11px; width:13%; border: 0px solid black; padding-bottom:0px;">:  <?php date_default_timezone_get('Asia/Jakarta');
													setlocale(LC_TIME, 'IND');
												
													$time = $print_labor['tanggal_req'];
													echo date("H:i",strtotime($time))?> WIB</td>
				</tr>

				<tr>
					<td style="font-size:11px; width:12%; font-weight:bold; border: 0px solid black; padding-bottom:0px;">NO RM</td>
					<td style="font-size:11px; width:34%; border: 0px solid black; padding-bottom:0px;">: <?= $print_labor['id_pasien']; ?></td>
					<td style="font-size:11px; width:12%; font-weight:bold; border: 0px solid black; padding-bottom:0px;">Cara Bayar</td>
					<td style="font-size:11px; width:13%; border: 0px solid black; padding-bottom:0px;">: <?= strtoupper($print_labor['cara_bayar']); ?></td>
					<td style="font-size:11px; width:12%; font-weight:bold; border: 0px solid black; padding-bottom:0px;">&nbsp;&nbsp;&nbsp;&nbsp;Jam Selesai</td>
					<td style="font-size:11px; width:13%; border: 0px solid black; padding-bottom:0px;">: <?php date_default_timezone_get('Asia/Jakarta');
													setlocale(LC_TIME, 'IND');
												
													$time = $print_labor['tanggal'];
													echo date("H:i",strtotime($time))?> WIB</td>
				</tr>

				<tr>
					<td style="font-size:11px; width:12%; font-weight:bold; border: 0px solid black;">Tanggal</td>
					<td style="font-size:11px; width:34%; border: 0px solid black;">: <?php date_default_timezone_get('Asia/Jakarta');
																							setlocale(LC_TIME, 'IND');
																							echo strftime("%A, %e %B %Y"); ?></td>
					<td style="font-size:11px; width:12%; font-weight:bold; border: 0px solid black;">Poli / Kelas</td>
					<td style="font-size:11px; width:20%; border: 0px solid black;">: <?= $print_labor['cara_masuk']; ?></td>
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
					<td>&nbsp;BILIRUBIN TOTAL </td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; <i>HB</i></td>
					<td><center><?= $print_labor['hb'] ?></center></td>
					<td>&nbsp;L 11,3 - 15,7 g/dL</td>
					<td>&nbsp;&nbsp;&nbsp;> 5 hr - 60 Thn</td>
					<td><center><?= $print_labor['bilirubin560'] ?></center></td>
					<td>&nbsp;0.3 -1.2 mg/dl</td>
				</tr>

				<tr>
					<td></td>
					<td></td>
					<td>&nbsp;P 9,9 - 13,6 g/dL</td>
					<td>&nbsp;&nbsp;&nbsp;60 - 90 Thn</td>
					<td><center><?= $print_labor['bilirubin6090'] ?></center></td>
					<td>&nbsp;0.2 - 1.1 mg/dl</td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp;LEUKOSIT</td>
					<td><center><?= $print_labor['leukosit'] ?></center></td>
					<td>&nbsp;4000 - 10000 / mm³</td>
					<td>&nbsp;&nbsp;BILIRUBIN: DIREK</td>
					<td></td>
					<td>&nbsp;0 - 0.2 mg/dl</td>
				</tr>

				<tr>
					<td>&nbsp;TROMBOSIT</td>
					<td><center><?= $print_labor['trombosit'] ?><center></td>
					<td>&nbsp;150 - 400 RIBU/mm³</td>
					<td>&nbsp;BILIRUBIN: INDIREK</td>
					<td></td>
					<td>&nbsp;0 - 1.1 mg/dl</td>
				</tr>

				<tr>
					<td>&nbsp;HEMATOKRIT</td>
					<td><center><?= $print_labor['trombosit'] ?><center></td>
					<td>&nbsp;L 40 - 52 %</td>
					<td>&nbsp;ALT/SGPT</td>
					<td></td>
					<td>&nbsp;</td>
				</tr>

				<tr>
					<td></td>
					<td></td>
					<td>&nbsp;P 35 - 47%</td>
					<td>&nbsp;&nbsp;&nbsp;12 - 60 Thn</td>
					<td><center><?= $print_labor['sgpt1260'] ?><center></td>
					<td>&nbsp;L 10 - 40 U/L</td>
				</tr>

				<tr>
					<td>&nbsp;ERITROSIT</td>
					<td><center><?= $print_labor['eritrosit'] ?><center></td>
					<td>&nbsp;L 4.5 - 5.9 Juta/mm³</td>
					<td></td>
					<td></td>
					<td>&nbsp;P 7 - 35 U/L</td>
				</tr>

				<tr>
					<td></td>
					<td></td>
					<td>&nbsp;P 4.1 - 5.1Juta/mm³</td>
					<td>&nbsp;&nbsp;&nbsp;60 - 90 Thn</td>
					<td><center><?= $print_labor['sgpt6090'] ?><center></td>
					<td>&nbsp;L 13 - 40 U/L</td>
				</tr>
				
				<tr>
					<td>&nbsp;HITUNG JENIS</td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td>&nbsp;P 10 - 28 U/L</td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp;&nbsp;- BAS</td>
					<td><center><?= $print_labor['bas'] ?><center></td>
					<td>&nbsp;0 - 1 %</td>
					<td>&nbsp;AST/SGOT</td>
					<td><center><?= $print_labor['sgot'] ?><center></td>
					<td>&nbsp;L  15 - 40 U/L</td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp;- EOS</td>
					<td><center><?= $print_labor['eos'] ?><center></td>
					<td>&nbsp;2 - 4 %</td>
					<td></td>
					<td></td>
					<td>&nbsp;P 13 - 35 U/L</td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp;- MONO</td>
					<td><center><?= $print_labor['mono'] ?><center></td>
					<td>&nbsp;2 - 8 %</td>
					<td>&nbsp;URID ACID</td>
					<td><center><?= $print_labor['uric_acid'] ?><center></td>
					<td>&nbsp;L 3,4 - 7,2 mg/dl</td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp;- SEGMEN</td>
					<td><center><?= $print_labor['segmen'] ?><center></td>
					<td>&nbsp;50 - 70 %</td>
					<td></td>
					<td></td>
					<td>&nbsp;P 2,6 - 6.0 mg/dl</td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp;- LYMPO</td>
					<td><center><?= $print_labor['lympo'] ?><center></td>
					<td>&nbsp;25 - 40 %</td>
					<td>&nbsp;TRIGLISERIDA</td>
					<td><center><?= $print_labor['trigiserida'] ?><center></td>
					<td>&nbsp;60 - 150 mg/dl</td>
				</tr>

				<tr>
					<td>&nbsp;MCV</td>
					<td><center><?= $print_labor['mcv'] ?><center></td>
					<td>&nbsp;80 - 96 fL</td>
					<td>&nbsp;CHOLESTEROL</td>
					<td><center><?= $print_labor['cho'] ?><center></td>
					<td>&nbsp;L 120 - 200 mg/dl</td>
				</tr>

				<tr>
					<td>&nbsp;MCH</td>
					<td><center><?= $print_labor['mch'] ?><center></td>
					<td>&nbsp;28 - 33 pg</td>
					<td></td>
					<td></td>
					<td>&nbsp;P 120 - 200 mg/dl</td>
				</tr>

				<tr>
					<td>&nbsp;MCHC</td>
					<td><center><?= $print_labor['mchc'] ?><center></td>
					<td>&nbsp;33 - 36 g/dL</td>
					<td>&nbsp;LDL</td>
					<td><center><?= $print_labor['ldl'] ?><center></td>
					<td>&nbsp;<150 mg/dl</td>
				</tr>

				<tr>
					<td>&nbsp;RDW-CV</td>
					<td><center><?= $print_labor['rdw_cv'] ?><center></td>
					<td>&nbsp;11,0 - 16,0 %</td>
					<td>&nbsp;HDL</td>
					<td><center><?= $print_labor['hdl'] ?><center></td>
					<td>&nbsp;35 -60 mg/dl</td>
				</tr>

				<tr>
					<td>&nbsp;RDW-SD</td>
					<td><center><?= $print_labor['rdw_sd'] ?><center></td>
					<td>&nbsp;35,0 - 56,0 fL</td>
					<td>&nbsp;<i>FEACES</i></td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;WAKTU PENDARAHAN</td>
					<td><center><?= $print_labor['blt'] ?><center></td>
					<td>&nbsp;1' - 6'</td>
					<td>&nbsp;<b>• MAKROSKOPIS</b></td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;WAKTU PEMBEKUAN</td>
					<td><center><?= $print_labor['clt'] ?><center></td>
					<td>&nbsp;2' - 6'</td>
					<td>&nbsp;&nbsp; - Darah </td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;<i>URINALISA</i></td>
					<td></td>
					<td></td>
					<td>&nbsp;>&nbsp; - Lendir </td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;<b>MAKROSKOPIS:</b></td>
					<td></td>
					<td></td>
					<td>&nbsp;&nbsp; - Bau</td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; - Warna</td>
					<td><center><?= $print_labor['makro_warna'] ?><center></td>
					<td></td>
					<td>&nbsp;&nbsp; - Konsistensi </td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; - Kejernihan</td>
					<td><center><?= $print_labor['makro_jernih'] ?><center></td>
					<td></td>
					<td>&nbsp;&nbsp; - Warna </td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;<b>MIKROSKOPIS</b></td>
					<td></td>
					<td></td>
					<td>&nbsp;&nbsp; - Parasit</td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; - ERITROSIT</td>
					<td><center><?= $print_labor['mikro_eritrosit'] ?><center></td>
					<td>&nbsp;<1/Lpb</td>
					<td>&nbsp;<b>• MIKROSKOPIS</b></td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; - LEUKOSIT</td>
					<td><center><?= $print_labor['mikro_leukosit'] ?><center></td>
					<td>&nbsp;<6/Lpb</td>
					<td>&nbsp;&nbsp; - Leukosit</td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; - SEL EPITEL</td>
					<td><center><?= $print_labor['mikro_sel_epitel'] ?><center></td>
					<td>&nbsp;<6/Lpb</td>
					<td>&nbsp;&nbsp; - Eritrosit</td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; - SILINDER</td>
					<td><center><?= $print_labor['mikro_silinder'] ?><center></td>
					<td>&nbsp;Negatif/Lpk</td>
					<td>&nbsp;&nbsp; - Sel Epitel</td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; - KRISTAL</td>
					<td><center><?= $print_labor['mikro_kristal'] ?><center></td>
					<td>&nbsp;Negatif/Lpk</td>
					<td>&nbsp;&nbsp; - Silider</td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; - BAKTERI</td>
					<td><center><?= $print_labor['mikro_bakteri'] ?><center></td>
					<td>&nbsp;Negatif/Lpk</td>
					<td>&nbsp;&nbsp; - Telur cacing</td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; - JAMUR</td>
					<td><center><?= $print_labor['mikro_jamur'] ?><center></td>
					<td>&nbsp;Negatif/Lpk</td>
					<td>&nbsp;&nbsp; - Amoeba</td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;KIMIA URIN</td>
					<td></td>
					<td>&nbsp;Negatif/Lpk</td>
					<td>&nbsp;&nbsp; - Bakteri</td>
					<td></td>
					<td></td>
				</tr>


				<tr>
					<td>&nbsp;&nbsp; - ERITROSIT </td>
					<td><center><?= $print_labor['kimia_eritrosit'] ?><center></td>
					<td>&nbsp;Negatif/Lpk</td>
					<td>&nbsp;DARAH SAMAR</td>
					<td><center><?= $print_labor['darah_samar'] ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; - GLUKOSA </td>
					<td><center><?= $print_labor['kimia_glukosa'] ?><center></td>
					<td>&nbsp;Negatif/Lpk</td>
					<td>&nbsp;WIDAL</td>
					<td><center><?= $print_labor['widal'] ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; - PROTEIN </td>
					<td><center><?= $print_labor['kimia_protein'] ?><center></td>
					<td>&nbsp;Negatif/Lpk</td>
					<td>&nbsp;TROPONIN </td>
					<td><center><?= $print_labor['troponin'] ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; - BILIRUBIN </td>
					<td><center><?= $print_labor['kimia_bilirubin'] ?><center></td>
					<td>&nbsp;Negatif/Lpk</td>
					<td>&nbsp;IgG/IgM DENGUE </td>
					<td><center><?= $print_labor['dengue'] ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; - UROBILINOGEN </td>
					<td><center><?= $print_labor['kimia_urobilinogen'] ?><center></td>
					<td>&nbsp;Negatif/Lpk</td>
					<td>&nbsp;IgG/IgM SALMONELLA </td>
					<td><center><?= $print_labor['salmonella'] ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; - PH</td>
					<td><center><?= $print_labor['kimia_ph'] ?><center></td>
					<td>&nbsp;5-8</td>
					<td>&nbsp;PLANO TEST</td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; - BERAT JENIS</td>
					<td><center><?= $print_labor['kimia_berat_jenis'] ?><center></td>
					<td>&nbsp;1.003-1.029</td>
					<td>&nbsp;HBSAG</td>
					<td><center><?= $print_labor['hbsag'] ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; - KETON</td>
					<td><center><?= $print_labor['kimia_keton'] ?><center></td>
					<td>&nbsp;Negatif/Lpk</td>
					<td>&nbsp;HBSAG</td>
					<td><center><?= $print_labor['hbsag'] ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; - NITRIT</td>
					<td><center><?= $print_labor['kimia_nitrit'] ?><center></td>
					<td>&nbsp;Negatif/Lpk</td>
					<td>&nbsp;B20</td>
					<td><center><?= $print_labor['b20'] ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; - LEUKOSIT</td>
					<td><center><?= $print_labor['kimia_leukosit'] ?><center></td>
					<td>&nbsp;Negatif/Lpk</td>
					<td>&nbsp;GOLONGAN DARAH</td>
					<td><center><?= $print_labor['gol_darah'] ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;GULA DARAH</td>
					<td></td>
					<td></td>
					<td>&nbsp;MALARIA</td>
					<td><center><?= $print_labor['malaria'] ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; - PUASA</td>
					<td><center><?= $print_labor['puasa'] ?><center></td>
					<td>&nbsp;76 - 110 mg/dl</td>
					<td>&nbsp;<i>ELEKTROLIT</i></td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; - 2 JAM PP</td>
					<td><center><?= $print_labor['2jampp'] ?><center></td>
					<td>&nbsp;< 150 mg/dl</td>
					<td>&nbsp;NA</td>
					<td><center><?= $print_labor['na'] ?><center></td>
					<td>&nbsp;128 - 138 mmol/l</td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; - SEWAKTU</td>
					<td><center><?= $print_labor['sewaktu'] ?><center></td>
					<td>&nbsp;110 - 150 mg/dl</td>
					<td>&nbsp;K</td>
					<td><center><?= $print_labor['k'] ?><center></td>
					<td>&nbsp;3,9 - 4,9 mmol/l</td>
				</tr>

				<tr>
					<td>&nbsp;UREUM </td>
					<td><center><?= $print_labor['ureum'] ?><center></td>
					<td>&nbsp;10 - 50 mg/dl</td>
					<td>&nbsp;CL</td>
					<td><center><?= $print_labor['cl'] ?><center></td>
					<td>&nbsp;88 - 100 mmol/l</td>
				</tr>

				<tr>
					<td>&nbsp;CREATININ</td>
					<td><center><?= $print_labor['creatinin'] ?><center></td>
					<td>&nbsp;L 0,6 - 1,1 mg/dl</td>
					<td>&nbsp;Ca</td>
					<td><center><?= $print_labor['ca'] ?><center></td>
					<td>&nbsp;0,99 - 1,29 mmol/l</td>
				</tr>

				<tr>
					<td></td>
					<td></td>
					<td>&nbsp;P 0,5 - 1,5 mg/dl</td>
					<td></td>
					<td></td>
					<td></td>
				</tr>


			</table>

			<!-- Laki-laki -->
			<?php elseif ($print_labor['jenis_kelamin'] == 'LAKI-LAKI' && $print_labor['jenis_form'] == ''): ?>

			<table style="border: 0px solid black; ">
				<tr>
					<td style="font-size:11px; width:12%; font-weight:bold; border: 0px solid black; padding-bottom:0px;">Nama Pasien</td>
					<td style="font-size:11px; width:34%; border: 0px solid black; padding-bottom:0px;">: <?= $print_labor['pasien']; ?></td>
					<td style="font-size:11px; width:12%; font-weight:bold; border: 0px solid black; padding-bottom:0px;">Jenis Kelamin</td>
					<td style="font-size:11px; width:13%; border: 0px solid black; padding-bottom:0px;">: <?= $print_labor['jenis_kelamin']; ?></td>
					<td style="font-size:11px; width:13%; font-weight:bold; border: 0px solid black; padding-bottom:0px;">&nbsp;&nbsp;&nbsp;&nbsp;Jam Sampling</td>
					<td style="font-size:11px; width:13%; border: 0px solid black; padding-bottom:0px;">:  <?php date_default_timezone_get('Asia/Jakarta');
													setlocale(LC_TIME, 'IND');
												
													$time = $print_labor['tanggal_req'];
													echo date("H:i",strtotime($time))?> WIB</td>
				</tr>

				<tr>
					<td style="font-size:11px; width:12%; font-weight:bold; border: 0px solid black; padding-bottom:0px;">NO RM</td>
					<td style="font-size:11px; width:34%; border: 0px solid black; padding-bottom:0px;">: <?= $print_labor['id_pasien']; ?></td>
					<td style="font-size:11px; width:12%; font-weight:bold; border: 0px solid black; padding-bottom:0px;">Cara Bayar</td>
					<td style="font-size:11px; width:13%; border: 0px solid black; padding-bottom:0px;">: <?= strtoupper($print_labor['cara_bayar']); ?></td>
					<td style="font-size:11px; width:12%; font-weight:bold; border: 0px solid black; padding-bottom:0px;">&nbsp;&nbsp;&nbsp;&nbsp;Jam Selesai</td>
					<td style="font-size:11px; width:13%; border: 0px solid black; padding-bottom:0px;">: <?php date_default_timezone_get('Asia/Jakarta');
													setlocale(LC_TIME, 'IND');
												
													$time = $print_labor['tanggal'];
													echo date("H:i",strtotime($time))?> WIB</td>
				</tr>

				<tr>
					<td style="font-size:11px; width:12%; font-weight:bold; border: 0px solid black;">Tanggal</td>
					<td style="font-size:11px; width:34%; border: 0px solid black;">: <?php date_default_timezone_get('Asia/Jakarta');
																							setlocale(LC_TIME, 'IND');
																							echo strftime("%A, %e %B %Y"); ?></td>
					<td style="font-size:11px; width:12%; font-weight:bold; border: 0px solid black;">Poli / Kelas</td>
					<td style="font-size:11px; width:20%; border: 0px solid black;">: <?= $print_labor['cara_masuk']; ?></td>
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
					<td><center><?= $print_labor['protein'] ?><center></td>
					<td>&nbsp;6.4 - 8.3 mg/dl</td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; <i>- PT</i></td>
					<td><center><?= $print_labor['pt'] ?><center></td>
					<td>&nbsp;11 - 16 Sec</td>
					<td>&nbsp;ALBUMIN</td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; <i>- INR</i></td>
					<td><?= $print_labor['inr'] ?></td>
					<td>&nbsp;0.7 - 1.3</td>
					<td>&nbsp;&nbsp;  18 - 60 Thn</td>
					<td><center><?= $print_labor['albumin1860'] ?><center></td>
					<td>&nbsp;3.4 - 4.8 mg/dl</td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; <i>- APTT</i></td>
					<td><?= $print_labor['aptt'] ?></td>
					<td>&nbsp;25  - 40 Sec</td>
					<td>&nbsp;&nbsp;  60 - 90 Thn</td>
					<td><center><?= $print_labor['albumin6090'] ?><center></td>
					<td>&nbsp;3.2 - 4.6 mg/dl</td>
				</tr>

				<tr>
					<td>&nbsp;HB</td>
					<td><center><?= $print_labor['hb'] ?><center></td>
					<td>&nbsp;L 11,3 - 15,7 g/dL</td>
					<td>&nbsp;GLOBULIN</td>
					<td><center><?= $print_labor['globulin'] ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td></td>
					<td></td>
					<td>&nbsp;P 9,9 - 13,6 g/dL</td>
					<td>&nbsp;CHOLESTEROL</td>
					<td><center><?= $print_labor['cho'] ?><center></td>
					<td>&nbsp;120 - 200 mg/dl</td>
				</tr>

				<tr>
					<td>&nbsp;LEUKOSIT</td>
					<td><center><?= $print_labor['leukosit'] ?><center></td>
					<td>&nbsp;4000 - 10000 / mm³</td>
					<td>&nbsp;LDL</td>
					<td><center><?= $print_labor['ldl'] ?><center></td>
					<td>&nbsp;<150 mg/dl</td>
				</tr>

				<tr>
					<td>&nbsp;TROMBOSIT</td>
					<td><center><?= $print_labor['trombosit'] ?><center></td>
					<td>&nbsp;150 - 400 RIBU/mm³</td>
					<td>&nbsp;HDL</td>
					<td><center><?= $print_labor['hdl'] ?><center></td>
					<td>&nbsp;35 -60 mg/dl</td>
				</tr>

				<tr>
					<td>&nbsp;HEMATOKRIT</td>
					<td><center><?= $print_labor['hematokrit'] ?><center></td>
					<td>&nbsp;L 40 - 52 %</td>
					<td>&nbsp;URID ACID</td>
					<td><center><?= $print_labor['uric_acid'] ?><center></td>
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
					<td><center><?= $print_labor['eritrosit'] ?><center></td>
					<td>&nbsp;L 4.5 - 5.9 Juta/mm³</td>
					<td>&nbsp;TRIGLISERIDA</td>
					<td><center><?= $print_labor['trigiserida'] ?><center></td>
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
					<td><center><?= $print_labor['bas'] ?><center></td>
					<td>&nbsp;0 - 1 %</td>
					<td>&nbsp;- NA</td>
					<td><center><?= $print_labor['na'] ?><center></td>
					<td>&nbsp;128 - 138 mmol/l</td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp;- EOS</td>
					<td><center><?= $print_labor['eos'] ?><center></td>
					<td>&nbsp;2 - 4 %</td>
					<td>&nbsp;- K</td>
					<td><center><?= $print_labor['k'] ?><center></td>
					<td>&nbsp;3,9 - 4,9 mmol/l</td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp;- MONO</td>
					<td><center><?= $print_labor['mono'] ?><center></td>
					<td>&nbsp;2 - 8 %</td>
					<td>&nbsp;- CL</td>
					<td><center><?= $print_labor['cl'] ?><center></td>
					<td>&nbsp;88 - 100 mmol/l</td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp;- SEGMEN</td>
					<td><center><?= $print_labor['segmen'] ?><center></td>
					<td>&nbsp;50 - 70 %</td>
					<td>&nbsp;- Ca</td>
					<td><center><?= $print_labor['ca'] ?><center></td>
					<td>&nbsp;0,99 - 1,29 mmol/l</td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp;- LYMPO</td>
					<td><center><?= $print_labor['lympo'] ?><center></td>
					<td>&nbsp;25 - 40 %</td>
					<td></td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;MCV</td>
					<td><center><?= $print_labor['mcv'] ?><center></td>
					<td>&nbsp;80 - 96 fL</td>
					<td>&nbsp;<i>IMUNOSEROLOGI</i></td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;MCH</td>
					<td><center><?= $print_labor['mch'] ?><center></td>
					<td>&nbsp;28 - 33 pg</td>
					<td>&nbsp;MALARIA</td>
					<td><center><?= $print_labor['malaria'] ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;MCHC</td>
					<td><center><?= $print_labor['mchc'] ?><center></td>
					<td>&nbsp;33 - 36 g/dL</td>
					<td>&nbsp;WIDAL</td>
					<td><center><?= $print_labor['widal'] ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;RDW-CV</td>
					<td><center><?= $print_labor['rdw_cv'] ?><center></td>
					<td>&nbsp;11,0 - 16,0 %</td>
					<td>&nbsp;TROPONIN </td>
					<td><center><?= $print_labor['troponin'] ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;RDW-SD</td>
					<td><center><?= $print_labor['rdw_sd'] ?><center></td>
					<td>&nbsp;35,0 - 56,0 fL</td>
					<td>&nbsp;NS 1 </td>
					<td><center><?= $print_labor['ns1'] ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;LED</td>
					<td><center><?= $print_labor['led'] ?><center></td>
					<td>&nbsp;L s/d 10 mm / jam</td>
					<td>&nbsp;IgG/IgM DENGUE </td>
					<td><center><?= $print_labor['dengue'] ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td></td>
					<td></td>
					<td>&nbsp;P s/d 15 mm / jam</td>
					<td>&nbsp;IgG/IgM SALMONELLA </td>
					<td><center><?= $print_labor['salmonella'] ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;WAKTU PENDARAHAN (BLT)</td>
					<td><center><?= $print_labor['blt'] ?><center></td>
					<td>&nbsp;1' - 6'</td>
					<td>&nbsp;HBSAG </td>
					<td><center><?= $print_labor['hbsag'] ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;WAKTU PEMBEKUAN(CLT)</td>
					<td><center><?= $print_labor['clt'] ?><center></td>
					<td>&nbsp;2' - 6'</td>
					<td>&nbsp;HBSAB</td>
					<td><center><?= $print_labor['hbsab'] ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td>&nbsp;B20</td>
					<td><center><?= $print_labor['b20'] ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;<i>KIMIA DARAH</i></td>
					<td></td>
					<td></td>
					<td>&nbsp;VDRL</td>
					<td><center><?= $print_labor['vdrl'] ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;GULA DARAH</td>
					<td><center><?= $print_labor['gul_darah'] ?><center></td>
					<td></td>
					<td>&nbsp;GOLONGAN DARAH</td>
					<td><center><?= $print_labor['gol_darah'] ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp;- PUASA</td>
					<td><center><?= $print_labor['puasa'] ?><center></td>
					<td>&nbsp;76 - 110 mg/dl</td>
					<td>&nbsp;RHESUS</td>
					<td><center><?= $print_labor['rhesus'] ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp;- 2 JAM PP</td>
					<td><center><?= $print_labor['2jampp'] ?><center></td>
					<td>&nbsp;< 150 mg/dl</td>
					<td>&nbsp;PLANO TEST</td>
					<td><center><?= $print_labor['planotes'] ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp;- SEWAKTU</td>
					<td><center><?= $print_labor['sewaktu'] ?><center></td>
					<td>&nbsp;110 - 150 mg/dl</td>
					<td>&nbsp;DARAH SAMAR</td>
					<td><center><?= $print_labor['darah_samar'] ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;HBA1C</td>
					<td><center><?= $print_labor['hba1c'] ?><center></td>
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
					<td><center><?= $print_labor['ureum'] ?><center></td>
					<td>&nbsp;10 - 50 mg/dl</td>
					<td>&nbsp;T4</td>
					<td></td>
					<td>&nbsp;60 - 120</td>
				</tr>

				<tr>
					<td>&nbsp;CREATININ </td>
					<td><center><?= $print_labor['creatinin'] ?><center></td>
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
					<td><center><?= $print_labor['ft4'] ?><center></td>
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
					<td><center><?= $print_labor['bilirubin560'] ?><center></td>
					<td>&nbsp;0.3 -1.2 mg/dl</td>
					<td>&nbsp;<i>MIKROBIOLOGI</i></td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp;  60 - 90 Thn</td>
					<td><center><?= $print_labor['bilirubin6090'] ?><center></td>
					<td>&nbsp;0.2 - 1.1 mg/dl</td>
					<td>&nbsp;SPUTUM BTA I</td>
					<td><center><?= $print_labor['sputum_bta_i'] ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;BILIRUBIN: DIREK</td>
					<td></td>
					<td>&nbsp;0 - 0.2 mg/dl</td>
					<td>&nbsp;SPUTUM BTA II</td>
					<td><center><?= $print_labor['sputum_bta_ii'] ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;BILIRUBIN: INDIREK</td>
					<td></td>
					<td>&nbsp;0 - 1.1 mg/dl</td>
					<td>&nbsp;SPUTUM BTA III</td>
					<td><center><?= $print_labor['sputum_bta_iii'] ?><center></td>
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
					<td><center><?= $print_labor['sgpt1260'] ?><center></td>
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
					<td><center><?= $print_labor['sgpt6090'] ?><center></td>
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
					<td><center><?= $print_labor['sgot'] ?><center></td>
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
					<td><center><?= $print_labor['ggt'] ?><center></td>
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
					<td><center><?= $print_labor['alp'] ?><center></td>
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
			<?php elseif ($print_labor['jenis_kelamin'] == 'PEREMPUAN' && $print_labor['jenis_form'] == 'FEACES'): ?>
			<table style="border: 0px solid black; ">
				<tr>
					<td style="font-size:11px; width:12%; font-weight:bold; border: 0px solid black; padding-bottom:0px;">Nama Pasien</td>
					<td style="font-size:11px; width:34%; border: 0px solid black; padding-bottom:0px;">: <?= $print_labor['pasien']; ?></td>
					<td style="font-size:11px; width:12%; font-weight:bold; border: 0px solid black; padding-bottom:0px;">Jenis Kelamin</td>
					<td style="font-size:11px; width:13%; border: 0px solid black; padding-bottom:0px;">: <?= $print_labor['jenis_kelamin']; ?></td>
					<td style="font-size:11px; width:13%; font-weight:bold; border: 0px solid black; padding-bottom:0px;">&nbsp;&nbsp;&nbsp;&nbsp;Jam Sampling</td>
					<td style="font-size:11px; width:13%; border: 0px solid black; padding-bottom:0px;">:  <?php date_default_timezone_get('Asia/Jakarta');
													setlocale(LC_TIME, 'IND');
												
													$time = $print_labor['tanggal_req'];
													echo date("H:i",strtotime($time))?> WIB</td>
				</tr>

				<tr>
					<td style="font-size:11px; width:12%; font-weight:bold; border: 0px solid black; padding-bottom:0px;">NO RM</td>
					<td style="font-size:11px; width:34%; border: 0px solid black; padding-bottom:0px;">: <?= $print_labor['id_pasien']; ?></td>
					<td style="font-size:11px; width:12%; font-weight:bold; border: 0px solid black; padding-bottom:0px;">Cara Bayar</td>
					<td style="font-size:11px; width:13%; border: 0px solid black; padding-bottom:0px;">: <?= strtoupper($print_labor['cara_bayar']); ?></td>
					<td style="font-size:11px; width:12%; font-weight:bold; border: 0px solid black; padding-bottom:0px;">&nbsp;&nbsp;&nbsp;&nbsp;Jam Selesai</td>
					<td style="font-size:11px; width:13%; border: 0px solid black; padding-bottom:0px;">: <?php date_default_timezone_get('Asia/Jakarta');
													setlocale(LC_TIME, 'IND');
												
													$time = $print_labor['tanggal'];
													echo date("H:i",strtotime($time))?> WIB</td>
				</tr>

				<tr>
					<td style="font-size:11px; width:12%; font-weight:bold; border: 0px solid black;">Tanggal</td>
					<td style="font-size:11px; width:34%; border: 0px solid black;">: <?php date_default_timezone_get('Asia/Jakarta');
																							setlocale(LC_TIME, 'IND');
																							echo strftime("%A, %e %B %Y"); ?></td>
					<td style="font-size:11px; width:12%; font-weight:bold; border: 0px solid black;">Poli / Kelas</td>
					<td style="font-size:11px; width:20%; border: 0px solid black;">: <?= $print_labor['cara_masuk']; ?></td>
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
						<td>&nbsp;BILIRUBIN TOTAL </td>
						<td></td>
						<td></td>
					</tr>

					<tr>
						<td>&nbsp;&nbsp; <i>HB</i></td>
						<td></td>
						<td>&nbsp;L 11,3 - 15,7 g/dL</td>
						<td>&nbsp;&nbsp;&nbsp;> 5 hr - 60 Thn</td>
						<td><center><?= $print_labor['bilirubin560'] ?></center></td>
						<td>&nbsp;0.3 -1.2 mg/dl</td>
					</tr>

					<tr>
						<td></td>
						<td><center><?= $print_labor['hb'] ?></center></td>
						<td>&nbsp;P 9,9 - 13,6 g/dL</td>
						<td>&nbsp;&nbsp;&nbsp;60 - 90 Thn</td>
						<td><center><?= $print_labor['bilirubin6090'] ?></center></td>
						<td>&nbsp;0.2 - 1.1 mg/dl</td>
					</tr>

					<tr>
						<td>&nbsp;&nbsp;LEUKOSIT</td>
						<td><center><?= $print_labor['leukosit'] ?></center></td>
						<td>&nbsp;4000 - 10000 / mm³</td>
						<td>&nbsp;&nbsp;BILIRUBIN: DIREK</td>
						<td></td>
						<td>&nbsp;0 - 0.2 mg/dl</td>
					</tr>

					<tr>
						<td>&nbsp;TROMBOSIT</td>
						<td><center><?= $print_labor['trombosit'] ?><center></td>
						<td>&nbsp;150 - 400 RIBU/mm³</td>
						<td>&nbsp;BILIRUBIN: INDIREK</td>
						<td></td>
						<td>&nbsp;0 - 1.1 mg/dl</td>
					</tr>

					<tr>
						<td>&nbsp;HEMATOKRIT</td>
						<td></td>
						<td>&nbsp;L 40 - 52 %</td>
						<td>&nbsp;ALT/SGPT</td>
						<td></td>
						<td>&nbsp;</td>
					</tr>

					<tr>
						<td></td>
						<td><center><?= $print_labor['trombosit'] ?><center></td>
						<td>&nbsp;P 35 - 47%</td>
						<td>&nbsp;&nbsp;&nbsp;12 - 60 Thn</td>
						<td></td>
						<td>&nbsp;L 10 - 40 U/L</td>
					</tr>

					<tr>
						<td>&nbsp;ERITROSIT</td>
						<td></td>
						<td>&nbsp;L 4.5 - 5.9 Juta/mm³</td>
						<td></td>
						<td><center><?= $print_labor['sgpt1260'] ?><center></td>
						<td>&nbsp;P 7 - 35 U/L</td>
					</tr>

					<tr>
						<td></td>
						<td><center><?= $print_labor['eritrosit'] ?><center></td>
						<td>&nbsp;P 4.1 - 5.1Juta/mm³</td>
						<td>&nbsp;&nbsp;&nbsp;60 - 90 Thn</td>
						<td></td>
						<td>&nbsp;L 13 - 40 U/L</td>
					</tr>
					
					<tr>
						<td>&nbsp;HITUNG JENIS</td>
						<td></td>
						<td></td>
						<td></td>
						<td><center><?= $print_labor['sgpt6090'] ?><center></td>
						<td>&nbsp;P 10 - 28 U/L</td>
					</tr>

					<tr>
						<td>&nbsp;&nbsp;&nbsp;- BAS</td>
						<td><center><?= $print_labor['bas'] ?><center></td>
						<td>&nbsp;0 - 1 %</td>
						<td>&nbsp;AST/SGOT</td>
						<td><center><?= $print_labor['sgot'] ?><center></td>
						<td>&nbsp;L  15 - 40 U/L</td>
					</tr>

					<tr>
						<td>&nbsp;&nbsp;- EOS</td>
						<td><center><?= $print_labor['eos'] ?><center></td>
						<td>&nbsp;2 - 4 %</td>
						<td></td>
						<td></td>
						<td>&nbsp;P 13 - 35 U/L</td>
					</tr>

					<tr>
						<td>&nbsp;&nbsp;- MONO</td>
						<td><center><?= $print_labor['mono'] ?><center></td>
						<td>&nbsp;2 - 8 %</td>
						<td>&nbsp;URID ACID</td>
						<td></td>
						<td>&nbsp;L 3,4 - 7,2 mg/dl</td>
					</tr>

					<tr>
						<td>&nbsp;&nbsp;- SEGMEN</td>
						<td><center><?= $print_labor['segmen'] ?><center></td>
						<td>&nbsp;50 - 70 %</td>
						<td></td>
						<td><center><?= $print_labor['uric_acid'] ?><center></td>
						<td>&nbsp;P 2,6 - 6.0 mg/dl</td>
					</tr>

					<tr>
						<td>&nbsp;&nbsp;- LYMPO</td>
						<td><center><?= $print_labor['lympo'] ?><center></td>
						<td>&nbsp;25 - 40 %</td>
						<td>&nbsp;TRIGLISERIDA</td>
						<td><center><?= $print_labor['trigiserida'] ?><center></td>
						<td>&nbsp;60 - 150 mg/dl</td>
					</tr>

					<tr>
						<td>&nbsp;MCV</td>
						<td><center><?= $print_labor['mcv'] ?><center></td>
						<td>&nbsp;80 - 96 fL</td>
						<td>&nbsp;CHOLESTEROL</td>
						<td></td>
						<td>&nbsp;L 120 - 200 mg/dl</td>
					</tr>

					<tr>
						<td>&nbsp;MCH</td>
						<td><center><?= $print_labor['mch'] ?><center></td>
						<td>&nbsp;28 - 33 pg</td>
						<td></td>
						<td><center><?= $print_labor['cho'] ?><center></td>
						<td>&nbsp;P 120 - 200 mg/dl</td>
					</tr>

					<tr>
						<td>&nbsp;MCHC</td>
						<td><center><?= $print_labor['mchc'] ?><center></td>
						<td>&nbsp;33 - 36 g/dL</td>
						<td>&nbsp;LDL</td>
						<td><center><?= $print_labor['ldl'] ?><center></td>
						<td>&nbsp;<150 mg/dl</td>
					</tr>

					<tr>
						<td>&nbsp;RDW-CV</td>
						<td><center><?= $print_labor['rdw_cv'] ?><center></td>
						<td>&nbsp;11,0 - 16,0 %</td>
						<td>&nbsp;HDL</td>
						<td><center><?= $print_labor['hdl'] ?><center></td>
						<td>&nbsp;35 -60 mg/dl</td>
					</tr>

					<tr>
						<td>&nbsp;RDW-SD</td>
						<td><center><?= $print_labor['rdw_sd'] ?><center></td>
						<td>&nbsp;35,0 - 56,0 fL</td>
						<td>&nbsp;<i>FEACES</i></td>
						<td></td>
						<td></td>
					</tr>

					<tr>
						<td>&nbsp;WAKTU PENDARAHAN</td>
						<td><center><?= $print_labor['blt'] ?><center></td>
						<td>&nbsp;1' - 6'</td>
						<td>&nbsp;<b>• MAKROSKOPIS</b></td>
						<td></td>
						<td></td>
					</tr>

					<tr>
						<td>&nbsp;WAKTU PEMBEKUAN</td>
						<td><center><?= $print_labor['clt'] ?><center></td>
						<td>&nbsp;2' - 6'</td>
						<td>&nbsp;&nbsp; - Darah </td>
						<td><center><?= $print_labor['makro_darah'] ?><center></td>
						<td></td>
					</tr>

					<tr>
						<td>&nbsp;<i>URINALISA</i></td>
						<td></td>
						<td></td>
						<td>&nbsp;>&nbsp; - Lendir </td>
						<td><center><?= $print_labor['makro_lendir'] ?><center></td>
						<td></td>
					</tr>

					<tr>
						<td>&nbsp;<b>MAKROSKOPIS:</b></td>
						<td></td>
						<td></td>
						<td>&nbsp;&nbsp; - Bau</td>
						<td><center><?= $print_labor['makro_bau'] ?><center></td>
						<td></td>
					</tr>

					<tr>
						<td>&nbsp;&nbsp; - Warna</td>
						<td></td>
						<td></td>
						<td>&nbsp;&nbsp; - Konsistensi </td>
						<td><center><?= $print_labor['makro_konsistensi'] ?><center></td>
						<td></td>
					</tr>

					<tr>
						<td>&nbsp;&nbsp; - Kejernihan</td>
						<td></td>
						<td></td>
						<td>&nbsp;&nbsp; - Warna </td>
						<td><center><?= $print_labor['makro_warna'] ?><center></td>
						<td></td>
					</tr>

					<tr>
						<td>&nbsp;<b>MIKROSKOPIS</b></td>
						<td></td>
						<td></td>
						<td>&nbsp;&nbsp; - Parasit</td>
						<td><center><?= $print_labor['makro_parasit'] ?><center></td>
						<td></td>
					</tr>

					<tr>
						<td>&nbsp;&nbsp; - ERITROSIT</td>
						<td></td>
						<td>&nbsp;<1/Lpb</td>
						<td>&nbsp;<b>• MIKROSKOPIS</b></td>
						<td></td>
						<td></td>
					</tr>

					<tr>
						<td>&nbsp;&nbsp; - LEUKOSIT</td>
						<td></td>
						<td>&nbsp;<6/Lpb</td>
						<td>&nbsp;&nbsp; - Leukosit</td>
						<td><center><?= $print_labor['mikro_leukosit'] ?><center></td>
						<td></td>
					</tr>

					<tr>
						<td>&nbsp;&nbsp; - SEL EPITEL</td>
						<td></td>
						<td>&nbsp;<6/Lpb</td>
						<td>&nbsp;&nbsp; - Eritrosit</td>
						<td><center><?= $print_labor['mikro_eritrosit'] ?><center></td>
						<td></td>
					</tr>

					<tr>
						<td>&nbsp;&nbsp; - SILINDER</td>
						<td></td>
						<td>&nbsp;Negatif/Lpk</td>
						<td>&nbsp;&nbsp; - Sel Epitel</td>
						<td><center><?= $print_labor['mikro_sel_epitel'] ?><center></td>
						<td></td>
					</tr>

					<tr>
						<td>&nbsp;&nbsp; - KRISTAL</td>
						<td></td>
						<td>&nbsp;Negatif/Lpk</td>
						<td>&nbsp;&nbsp; - Silider</td>
						<td><center><?= $print_labor['mikro_silinder'] ?><center></td>
						<td></td>
					</tr>

					<tr>
						<td>&nbsp;&nbsp; - BAKTERI</td>
						<td></td>
						<td>&nbsp;Negatif/Lpk</td>
						<td>&nbsp;&nbsp; - Telur cacing</td>
						<td><center><?= $print_labor['mikro_telur_cacing'] ?><center></td>
						<td></td>
					</tr>

					<tr>
						<td>&nbsp;&nbsp; - JAMUR</td>
						<td></td>
						<td>&nbsp;Negatif/Lpk</td>
						<td>&nbsp;&nbsp; - Amoeba</td>
						<td><center><?= $print_labor['mikro_amoeba'] ?><center></td>
						<td></td>
					</tr>

					<tr>
						<td>&nbsp;KIMIA URIN</td>
						<td></td>
						<td>&nbsp;Negatif/Lpk</td>
						<td>&nbsp;&nbsp; - Bakteri</td>
						<td><center><?= $print_labor['mikro_bakteri'] ?><center></td>
						<td></td>
					</tr>

					<tr>
						<td>&nbsp;&nbsp; - ERITROSIT </td>
						<td><center><?= $print_labor['kimia_eritrosit'] ?><center></td>
						<td>&nbsp;Negatif/Lpk</td>
						<td>&nbsp;DARAH SAMAR</td>
						<td><center><?= $print_labor['darah_samar'] ?><center></td>
						<td></td>
					</tr>

					<tr>
						<td>&nbsp;&nbsp; - GLUKOSA </td>
						<td><center><?= $print_labor['kimia_glukosa'] ?><center></td>
						<td>&nbsp;Negatif/Lpk</td>
						<td>&nbsp;WIDAL</td>
						<td><center><?= $print_labor['widal'] ?><center></td>
						<td></td>
					</tr>

					<tr>
						<td>&nbsp;&nbsp; - PROTEIN </td>
						<td><center><?= $print_labor['kimia_protein'] ?><center></td>
						<td>&nbsp;Negatif/Lpk</td>
						<td>&nbsp;TROPONIN </td>
						<td><center><?= $print_labor['troponin'] ?><center></td>
						<td></td>
					</tr>

					<tr>
						<td>&nbsp;&nbsp; - BILIRUBIN </td>
						<td><center><?= $print_labor['kimia_bilirubin'] ?><center></td>
						<td>&nbsp;Negatif/Lpk</td>
						<td>&nbsp;IgG/IgM DENGUE </td>
						<td><center><?= $print_labor['dengue'] ?><center></td>
						<td></td>
					</tr>

					<tr>
						<td>&nbsp;&nbsp; - UROBILINOGEN </td>
						<td><center><?= $print_labor['kimia_urobilinogen'] ?><center></td>
						<td>&nbsp;Negatif/Lpk</td>
						<td>&nbsp;IgG/IgM SALMONELLA </td>
						<td><center><?= $print_labor['salmonella'] ?><center></td>
						<td></td>
					</tr>

					<tr>
						<td>&nbsp;&nbsp; - PH</td>
						<td><center><?= $print_labor['kimia_ph'] ?><center></td>
						<td>&nbsp;5-8</td>
						<td>&nbsp;PLANO TEST</td>
						<td></td>
						<td></td>
					</tr>

					<tr>
						<td>&nbsp;&nbsp; - BERAT JENIS</td>
						<td><center><?= $print_labor['kimia_berat_jenis'] ?><center></td>
						<td>&nbsp;1.003-1.029</td>
						<td>&nbsp;HBSAG</td>
						<td><center><?= $print_labor['hbsag'] ?><center></td>
						<td></td>
					</tr>

					<tr>
						<td>&nbsp;&nbsp; - KETON</td>
						<td><center><?= $print_labor['kimia_keton'] ?><center></td>
						<td>&nbsp;Negatif/Lpk</td>
						<td>&nbsp;HBSAG</td>
						<td><center><?= $print_labor['hbsag'] ?><center></td>
						<td></td>
					</tr>

					<tr>
						<td>&nbsp;&nbsp; - NITRIT</td>
						<td><center><?= $print_labor['kimia_nitrit'] ?><center></td>
						<td>&nbsp;Negatif/Lpk</td>
						<td>&nbsp;B20</td>
						<td><center><?= $print_labor['b20'] ?><center></td>
						<td></td>
					</tr>

					<tr>
						<td>&nbsp;&nbsp; - LEUKOSIT</td>
						<td><center><?= $print_labor['kimia_leukosit'] ?><center></td>
						<td>&nbsp;Negatif/Lpk</td>
						<td>&nbsp;GOLONGAN DARAH</td>
						<td><center><?= $print_labor['gol_darah'] ?><center></td>
						<td></td>
					</tr>

					<tr>
						<td>&nbsp;GULA DARAH</td>
						<td></td>
						<td></td>
						<td>&nbsp;MALARIA</td>
						<td><center><?= $print_labor['malaria'] ?><center></td>
						<td></td>
					</tr>

					<tr>
						<td>&nbsp;&nbsp; - PUASA</td>
						<td><center><?= $print_labor['puasa'] ?><center></td>
						<td>&nbsp;76 - 110 mg/dl</td>
						<td>&nbsp;<i>ELEKTROLIT</i></td>
						<td></td>
						<td></td>
					</tr>

					<tr>
						<td>&nbsp;&nbsp; - 2 JAM PP</td>
						<td><center><?= $print_labor['2jampp'] ?><center></td>
						<td>&nbsp;< 150 mg/dl</td>
						<td>&nbsp;NA</td>
						<td><center><?= $print_labor['na'] ?><center></td>
						<td>&nbsp;128 - 138 mmol/l</td>
					</tr>

					<tr>
						<td>&nbsp;&nbsp; - SEWAKTU</td>
						<td><center><?= $print_labor['sewaktu'] ?><center></td>
						<td>&nbsp;110 - 150 mg/dl</td>
						<td>&nbsp;K</td>
						<td><center><?= $print_labor['k'] ?><center></td>
						<td>&nbsp;3,9 - 4,9 mmol/l</td>
					</tr>

					<tr>
						<td>&nbsp;UREUM </td>
						<td><center><?= $print_labor['ureum'] ?><center></td>
						<td>&nbsp;10 - 50 mg/dl</td>
						<td>&nbsp;CL</td>
						<td><center><?= $print_labor['cl'] ?><center></td>
						<td>&nbsp;88 - 100 mmol/l</td>
					</tr>

					<tr>
						<td>&nbsp;CREATININ</td>
						<td></td>
						<td>&nbsp;L 0,6 - 1,1 mg/dl</td>
						<td>&nbsp;Ca</td>
						<td><center><?= $print_labor['ca'] ?><center></td>
						<td>&nbsp;0,99 - 1,29 mmol/l</td>
					</tr>

					<tr>
						<td></td>
						<td><center><?= $print_labor['creatinin'] ?><center></td>
						<td>&nbsp;P 0,5 - 1,5 mg/dl</td>
						<td></td>
						<td></td>
						<td></td>
					</tr>

			</table>

			
			<!-- Perempuan URIN -->
			<?php elseif ($print_labor['jenis_kelamin'] == 'PEREMPUAN' && $print_labor['jenis_form'] == 'URIN'): ?>
			<table style="border: 0px solid black; ">
				<tr>
					<td style="font-size:11px; width:12%; font-weight:bold; border: 0px solid black; padding-bottom:0px;">Nama Pasien</td>
					<td style="font-size:11px; width:34%; border: 0px solid black; padding-bottom:0px;">: <?= $print_labor['pasien']; ?></td>
					<td style="font-size:11px; width:12%; font-weight:bold; border: 0px solid black; padding-bottom:0px;">Jenis Kelamin</td>
					<td style="font-size:11px; width:13%; border: 0px solid black; padding-bottom:0px;">: <?= $print_labor['jenis_kelamin']; ?></td>
					<td style="font-size:11px; width:13%; font-weight:bold; border: 0px solid black; padding-bottom:0px;">&nbsp;&nbsp;&nbsp;&nbsp;Jam Sampling</td>
					<td style="font-size:11px; width:13%; border: 0px solid black; padding-bottom:0px;">:  <?php date_default_timezone_get('Asia/Jakarta');
													setlocale(LC_TIME, 'IND');
												
													$time = $print_labor['tanggal_req'];
													echo date("H:i",strtotime($time))?> WIB</td>
				</tr>

				<tr>
					<td style="font-size:11px; width:12%; font-weight:bold; border: 0px solid black; padding-bottom:0px;">NO RM</td>
					<td style="font-size:11px; width:34%; border: 0px solid black; padding-bottom:0px;">: <?= $print_labor['id_pasien']; ?></td>
					<td style="font-size:11px; width:12%; font-weight:bold; border: 0px solid black; padding-bottom:0px;">Cara Bayar</td>
					<td style="font-size:11px; width:13%; border: 0px solid black; padding-bottom:0px;">: <?= strtoupper($print_labor['cara_bayar']); ?></td>
					<td style="font-size:11px; width:12%; font-weight:bold; border: 0px solid black; padding-bottom:0px;">&nbsp;&nbsp;&nbsp;&nbsp;Jam Selesai</td>
					<td style="font-size:11px; width:13%; border: 0px solid black; padding-bottom:0px;">: <?php date_default_timezone_get('Asia/Jakarta');
													setlocale(LC_TIME, 'IND');
												
													$time = $print_labor['tanggal'];
													echo date("H:i",strtotime($time))?> WIB</td>
				</tr>

				<tr>
					<td style="font-size:11px; width:12%; font-weight:bold; border: 0px solid black;">Tanggal</td>
					<td style="font-size:11px; width:34%; border: 0px solid black;">: <?php date_default_timezone_get('Asia/Jakarta');
																							setlocale(LC_TIME, 'IND');
																							echo strftime("%A, %e %B %Y"); ?></td>
					<td style="font-size:11px; width:12%; font-weight:bold; border: 0px solid black;">Poli / Kelas</td>
					<td style="font-size:11px; width:20%; border: 0px solid black;">: <?= $print_labor['cara_masuk']; ?></td>
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
					<td>&nbsp;BILIRUBIN TOTAL </td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; <i>HB</i></td>
					<td></td>
					<td>&nbsp;L 11,3 - 15,7 g/dL</td>
					<td>&nbsp;&nbsp;&nbsp;> 5 hr - 60 Thn</td>
					<td><center><?= $print_labor['bilirubin560'] ?></center></td>
					<td>&nbsp;0.3 -1.2 mg/dl</td>
				</tr>

				<tr>
					<td></td>
					<td><center><?= $print_labor['hb'] ?></center></td>
					<td>&nbsp;P 9,9 - 13,6 g/dL</td>
					<td>&nbsp;&nbsp;&nbsp;60 - 90 Thn</td>
					<td><center><?= $print_labor['bilirubin6090'] ?></center></td>
					<td>&nbsp;0.2 - 1.1 mg/dl</td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp;LEUKOSIT</td>
					<td><center><?= $print_labor['leukosit'] ?></center></td>
					<td>&nbsp;4000 - 10000 / mm³</td>
					<td>&nbsp;&nbsp;BILIRUBIN: DIREK</td>
					<td></td>
					<td>&nbsp;0 - 0.2 mg/dl</td>
				</tr>

				<tr>
					<td>&nbsp;TROMBOSIT</td>
					<td><center><?= $print_labor['trombosit'] ?><center></td>
					<td>&nbsp;150 - 400 RIBU/mm³</td>
					<td>&nbsp;BILIRUBIN: INDIREK</td>
					<td></td>
					<td>&nbsp;0 - 1.1 mg/dl</td>
				</tr>

				<tr>
					<td>&nbsp;HEMATOKRIT</td>
					<td></td>
					<td>&nbsp;L 40 - 52 %</td>
					<td>&nbsp;ALT/SGPT</td>
					<td></td>
					<td>&nbsp;</td>
				</tr>

				<tr>
					<td></td>
					<td><center><?= $print_labor['trombosit'] ?><center></td>
					<td>&nbsp;P 35 - 47%</td>
					<td>&nbsp;&nbsp;&nbsp;12 - 60 Thn</td>
					<td><center><?= $print_labor['sgpt1260'] ?><center></td>
					<td>&nbsp;L 10 - 40 U/L</td>
				</tr>

				<tr>
					<td>&nbsp;ERITROSIT</td>
					<td></td>
					<td>&nbsp;L 4.5 - 5.9 Juta/mm³</td>
					<td></td>
					<td></td>
					<td>&nbsp;P 7 - 35 U/L</td>
				</tr>

				<tr>
					<td></td>
					<td><center><?= $print_labor['eritrosit'] ?><center></td>
					<td>&nbsp;P 4.1 - 5.1Juta/mm³</td>
					<td>&nbsp;&nbsp;&nbsp;60 - 90 Thn</td>
					<td><center><?= $print_labor['sgpt6090'] ?><center></td>
					<td>&nbsp;L 13 - 40 U/L</td>
				</tr>
				
				<tr>
					<td>&nbsp;HITUNG JENIS</td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td>&nbsp;P 10 - 28 U/L</td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp;&nbsp;- BAS</td>
					<td><center><?= $print_labor['bas'] ?><center></td>
					<td>&nbsp;0 - 1 %</td>
					<td>&nbsp;AST/SGOT</td>
					<td></td>
					<td>&nbsp;L  15 - 40 U/L</td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp;- EOS</td>
					<td><center><?= $print_labor['eos'] ?><center></td>
					<td>&nbsp;2 - 4 %</td>
					<td></td>
					<td><center><?= $print_labor['sgot'] ?><center></td>
					<td>&nbsp;P 13 - 35 U/L</td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp;- MONO</td>
					<td><center><?= $print_labor['mono'] ?><center></td>
					<td>&nbsp;2 - 8 %</td>
					<td>&nbsp;URID ACID</td>
					<td></td>
					<td>&nbsp;L 3,4 - 7,2 mg/dl</td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp;- SEGMEN</td>
					<td><center><?= $print_labor['segmen'] ?><center></td>
					<td>&nbsp;50 - 70 %</td>
					<td></td>
					<td><center><?= $print_labor['uric_acid'] ?><center></td>
					<td>&nbsp;P 2,6 - 6.0 mg/dl</td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp;- LYMPO</td>
					<td><center><?= $print_labor['lympo'] ?><center></td>
					<td>&nbsp;25 - 40 %</td>
					<td>&nbsp;TRIGLISERIDA</td>
					<td><center><?= $print_labor['trigiserida'] ?><center></td>
					<td>&nbsp;60 - 150 mg/dl</td>
				</tr>

				<tr>
					<td>&nbsp;MCV</td>
					<td><center><?= $print_labor['mcv'] ?><center></td>
					<td>&nbsp;80 - 96 fL</td>
					<td>&nbsp;CHOLESTEROL</td>
					<td><center><?= $print_labor['cho'] ?><center></td>
					<td>&nbsp;L 120 - 200 mg/dl</td>
				</tr>

				<tr>
					<td>&nbsp;MCH</td>
					<td><center><?= $print_labor['mch'] ?><center></td>
					<td>&nbsp;28 - 33 pg</td>
					<td></td>
					<td></td>
					<td>&nbsp;P 120 - 200 mg/dl</td>
				</tr>

				<tr>
					<td>&nbsp;MCHC</td>
					<td><center><?= $print_labor['mchc'] ?><center></td>
					<td>&nbsp;33 - 36 g/dL</td>
					<td>&nbsp;LDL</td>
					<td><center><?= $print_labor['ldl'] ?><center></td>
					<td>&nbsp;<150 mg/dl</td>
				</tr>

				<tr>
					<td>&nbsp;RDW-CV</td>
					<td><center><?= $print_labor['rdw_cv'] ?><center></td>
					<td>&nbsp;11,0 - 16,0 %</td>
					<td>&nbsp;HDL</td>
					<td><center><?= $print_labor['hdl'] ?><center></td>
					<td>&nbsp;35 -60 mg/dl</td>
				</tr>

				<tr>
					<td>&nbsp;RDW-SD</td>
					<td><center><?= $print_labor['rdw_sd'] ?><center></td>
					<td>&nbsp;35,0 - 56,0 fL</td>
					<td>&nbsp;<i>FEACES</i></td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;WAKTU PENDARAHAN</td>
					<td><center><?= $print_labor['blt'] ?><center></td>
					<td>&nbsp;1' - 6'</td>
					<td>&nbsp;<b>• MAKROSKOPIS</b></td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;WAKTU PEMBEKUAN</td>
					<td><center><?= $print_labor['clt'] ?><center></td>
					<td>&nbsp;2' - 6'</td>
					<td>&nbsp;&nbsp; - Darah </td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;<i>URINALISA</i></td>
					<td></td>
					<td></td>
					<td>&nbsp;>&nbsp; - Lendir </td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;<b>MAKROSKOPIS:</b></td>
					<td></td>
					<td></td>
					<td>&nbsp;&nbsp; - Bau</td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; - Warna</td>
					<td><center><?= $print_labor['makro_warna'] ?><center></td>
					<td></td>
					<td>&nbsp;&nbsp; - Konsistensi </td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; - Kejernihan</td>
					<td><center><?= $print_labor['makro_jernih'] ?><center></td>
					<td></td>
					<td>&nbsp;&nbsp; - Warna </td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;<b>MIKROSKOPIS</b></td>
					<td></td>
					<td></td>
					<td>&nbsp;&nbsp; - Parasit</td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; - ERITROSIT</td>
					<td><center><?= $print_labor['mikro_eritrosit'] ?><center></td>
					<td>&nbsp;<1/Lpb</td>
					<td>&nbsp;<b>• MIKROSKOPIS</b></td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; - LEUKOSIT</td>
					<td><center><?= $print_labor['mikro_leukosit'] ?><center></td>
					<td>&nbsp;<6/Lpb</td>
					<td>&nbsp;&nbsp; - Leukosit</td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; - SEL EPITEL</td>
					<td><center><?= $print_labor['mikro_sel_epitel'] ?><center></td>
					<td>&nbsp;<6/Lpb</td>
					<td>&nbsp;&nbsp; - Eritrosit</td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; - SILINDER</td>
					<td><center><?= $print_labor['mikro_silinder'] ?><center></td>
					<td>&nbsp;Negatif/Lpk</td>
					<td>&nbsp;&nbsp; - Sel Epitel</td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; - KRISTAL</td>
					<td><center><?= $print_labor['mikro_kristal'] ?><center></td>
					<td>&nbsp;Negatif/Lpk</td>
					<td>&nbsp;&nbsp; - Silider</td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; - BAKTERI</td>
					<td><center><?= $print_labor['mikro_bakteri'] ?><center></td>
					<td>&nbsp;Negatif/Lpk</td>
					<td>&nbsp;&nbsp; - Telur cacing</td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; - JAMUR</td>
					<td><center><?= $print_labor['mikro_jamur'] ?><center></td>
					<td>&nbsp;Negatif/Lpk</td>
					<td>&nbsp;&nbsp; - Amoeba</td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;KIMIA URIN</td>
					<td></td>
					<td>&nbsp;Negatif/Lpk</td>
					<td>&nbsp;&nbsp; - Bakteri</td>
					<td></td>
					<td></td>
				</tr>


				<tr>
					<td>&nbsp;&nbsp; - ERITROSIT </td>
					<td><center><?= $print_labor['kimia_eritrosit'] ?><center></td>
					<td>&nbsp;Negatif/Lpk</td>
					<td>&nbsp;DARAH SAMAR</td>
					<td><center><?= $print_labor['darah_samar'] ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; - GLUKOSA </td>
					<td><center><?= $print_labor['kimia_glukosa'] ?><center></td>
					<td>&nbsp;Negatif/Lpk</td>
					<td>&nbsp;WIDAL</td>
					<td><center><?= $print_labor['widal'] ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; - PROTEIN </td>
					<td><center><?= $print_labor['kimia_protein'] ?><center></td>
					<td>&nbsp;Negatif/Lpk</td>
					<td>&nbsp;TROPONIN </td>
					<td><center><?= $print_labor['troponin'] ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; - BILIRUBIN </td>
					<td><center><?= $print_labor['kimia_bilirubin'] ?><center></td>
					<td>&nbsp;Negatif/Lpk</td>
					<td>&nbsp;IgG/IgM DENGUE </td>
					<td><center><?= $print_labor['dengue'] ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; - UROBILINOGEN </td>
					<td><center><?= $print_labor['kimia_urobilinogen'] ?><center></td>
					<td>&nbsp;Negatif/Lpk</td>
					<td>&nbsp;IgG/IgM SALMONELLA </td>
					<td><center><?= $print_labor['salmonella'] ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; - PH</td>
					<td><center><?= $print_labor['kimia_ph'] ?><center></td>
					<td>&nbsp;5-8</td>
					<td>&nbsp;PLANO TEST</td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; - BERAT JENIS</td>
					<td><center><?= $print_labor['kimia_berat_jenis'] ?><center></td>
					<td>&nbsp;1.003-1.029</td>
					<td>&nbsp;HBSAG</td>
					<td><center><?= $print_labor['hbsag'] ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; - KETON</td>
					<td><center><?= $print_labor['kimia_keton'] ?><center></td>
					<td>&nbsp;Negatif/Lpk</td>
					<td>&nbsp;HBSAG</td>
					<td><center><?= $print_labor['hbsag'] ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; - NITRIT</td>
					<td><center><?= $print_labor['kimia_nitrit'] ?><center></td>
					<td>&nbsp;Negatif/Lpk</td>
					<td>&nbsp;B20</td>
					<td><center><?= $print_labor['b20'] ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; - LEUKOSIT</td>
					<td><center><?= $print_labor['kimia_leukosit'] ?><center></td>
					<td>&nbsp;Negatif/Lpk</td>
					<td>&nbsp;GOLONGAN DARAH</td>
					<td><center><?= $print_labor['gol_darah'] ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;GULA DARAH</td>
					<td></td>
					<td></td>
					<td>&nbsp;MALARIA</td>
					<td><center><?= $print_labor['malaria'] ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; - PUASA</td>
					<td><center><?= $print_labor['puasa'] ?><center></td>
					<td>&nbsp;76 - 110 mg/dl</td>
					<td>&nbsp;<i>ELEKTROLIT</i></td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; - 2 JAM PP</td>
					<td><center><?= $print_labor['2jampp'] ?><center></td>
					<td>&nbsp;< 150 mg/dl</td>
					<td>&nbsp;NA</td>
					<td><center><?= $print_labor['na'] ?><center></td>
					<td>&nbsp;128 - 138 mmol/l</td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; - SEWAKTU</td>
					<td><center><?= $print_labor['sewaktu'] ?><center></td>
					<td>&nbsp;110 - 150 mg/dl</td>
					<td>&nbsp;K</td>
					<td><center><?= $print_labor['k'] ?><center></td>
					<td>&nbsp;3,9 - 4,9 mmol/l</td>
				</tr>

				<tr>
					<td>&nbsp;UREUM </td>
					<td><center><?= $print_labor['ureum'] ?><center></td>
					<td>&nbsp;10 - 50 mg/dl</td>
					<td>&nbsp;CL</td>
					<td><center><?= $print_labor['cl'] ?><center></td>
					<td>&nbsp;88 - 100 mmol/l</td>
				</tr>

				<tr>
					<td>&nbsp;CREATININ</td>
					<td></td>
					<td>&nbsp;L 0,6 - 1,1 mg/dl</td>
					<td>&nbsp;Ca</td>
					<td><center><?= $print_labor['ca'] ?><center></td>
					<td>&nbsp;0,99 - 1,29 mmol/l</td>
				</tr>

				<tr>
					<td></td>
					<td><center><?= $print_labor['creatinin'] ?><center></td>
					<td>&nbsp;P 0,5 - 1,5 mg/dl</td>
					<td>&nbsp;Rapid Cov-2</td>
					<td></td>
					<td></td>
				</tr>

			</table>

			<!-- Perempuan -->
			<?php elseif ($print_labor['jenis_kelamin'] == 'PEREMPUAN' && $print_labor['jenis_form'] == ''): ?>

			<table style="border: 0px solid black; ">
				<tr>
					<td style="font-size:11px; width:12%; font-weight:bold; border: 0px solid black; padding-bottom:0px;">Nama Pasien</td>
					<td style="font-size:11px; width:34%; border: 0px solid black; padding-bottom:0px;">: <?= $print_labor['pasien']; ?></td>
					<td style="font-size:11px; width:12%; font-weight:bold; border: 0px solid black; padding-bottom:0px;">Jenis Kelamin</td>
					<td style="font-size:11px; width:13%; border: 0px solid black; padding-bottom:0px;">: <?= $print_labor['jenis_kelamin']; ?></td>
					<td style="font-size:11px; width:13%; font-weight:bold; border: 0px solid black; padding-bottom:0px;">&nbsp;&nbsp;&nbsp;&nbsp;Jam Sampling</td>
					<td style="font-size:11px; width:13%; border: 0px solid black; padding-bottom:0px;">:  <?php date_default_timezone_get('Asia/Jakarta');
													setlocale(LC_TIME, 'IND');
												
													$time = $print_labor['tanggal_req'];
													echo date("H:i",strtotime($time))?> WIB</td>
				</tr>

				<tr>
					<td style="font-size:11px; width:12%; font-weight:bold; border: 0px solid black; padding-bottom:0px;">NO RM</td>
					<td style="font-size:11px; width:34%; border: 0px solid black; padding-bottom:0px;">: <?= $print_labor['id_pasien']; ?></td>
					<td style="font-size:11px; width:12%; font-weight:bold; border: 0px solid black; padding-bottom:0px;">Cara Bayar</td>
					<td style="font-size:11px; width:13%; border: 0px solid black; padding-bottom:0px;">: <?= strtoupper($print_labor['cara_bayar']); ?></td>
					<td style="font-size:11px; width:12%; font-weight:bold; border: 0px solid black; padding-bottom:0px;">&nbsp;&nbsp;&nbsp;&nbsp;Jam Selesai</td>
					<td style="font-size:11px; width:13%; border: 0px solid black; padding-bottom:0px;">: <?php date_default_timezone_get('Asia/Jakarta');
													setlocale(LC_TIME, 'IND');
												
													$time = $print_labor['tanggal'];
													echo date("H:i",strtotime($time))?> WIB</td>
				</tr>

				<tr>
					<td style="font-size:11px; width:12%; font-weight:bold; border: 0px solid black;">Tanggal</td>
					<td style="font-size:11px; width:34%; border: 0px solid black;">: <?php date_default_timezone_get('Asia/Jakarta');
																							setlocale(LC_TIME, 'IND');
																							echo strftime("%A, %e %B %Y"); ?></td>
					<td style="font-size:11px; width:12%; font-weight:bold; border: 0px solid black;">Poli / Kelas</td>
					<td style="font-size:11px; width:20%; border: 0px solid black;">: <?= $print_labor['cara_masuk']; ?></td>
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
					<td><center><?= $print_labor['protein'] ?><center></td>
					<td>&nbsp;6.4 - 8.3 mg/dl</td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; <i>- PT</i></td>
					<td><center><?= $print_labor['pt'] ?><center></td>
					<td>&nbsp;11 - 16 Sec</td>
					<td>&nbsp;ALBUMIN</td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; <i>- INR</i></td>
					<td><?= $print_labor['inr'] ?></td>
					<td>&nbsp;0.7 - 1.3</td>
					<td>&nbsp;&nbsp;  18 - 60 Thn</td>
					<td><center><?= $print_labor['albumin1860'] ?><center></td>
					<td>&nbsp;3.4 - 4.8 mg/dl</td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp; <i>- APTT</i></td>
					<td><?= $print_labor['aptt'] ?></td>
					<td>&nbsp;25  - 40 Sec</td>
					<td>&nbsp;&nbsp;  60 - 90 Thn</td>
					<td><center><?= $print_labor['albumin6090'] ?><center></td>
					<td>&nbsp;3.2 - 4.6 mg/dl</td>
				</tr>

				<tr>
					<td>&nbsp;HB</td>
					<td><center><?= $print_labor['hb'] ?><center></td>
					<td>&nbsp;L 11,3 - 15,7 g/dL</td>
					<td>&nbsp;GLOBULIN</td>
					<td><center><?= $print_labor['globulin'] ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td></td>
					<td></td>
					<td>&nbsp;P 9,9 - 13,6 g/dL</td>
					<td>&nbsp;CHOLESTEROL</td>
					<td><center><?= $print_labor['cho'] ?><center></td>
					<td>&nbsp;120 - 200 mg/dl</td>
				</tr>

				<tr>
					<td>&nbsp;LEUKOSIT</td>
					<td><center><?= $print_labor['leukosit'] ?><center></td>
					<td>&nbsp;4000 - 10000 / mm³</td>
					<td>&nbsp;LDL</td>
					<td><center><?= $print_labor['ldl'] ?><center></td>
					<td>&nbsp;<150 mg/dl</td>
				</tr>

				<tr>
					<td>&nbsp;TROMBOSIT</td>
					<td><center><?= $print_labor['trombosit'] ?><center></td>
					<td>&nbsp;150 - 400 RIBU/mm³</td>
					<td>&nbsp;HDL</td>
					<td><center><?= $print_labor['hdl'] ?><center></td>
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
					<td><center><?= $print_labor['hematokrit'] ?><center></td>
					<td>&nbsp;P 35 - 47%</td>
					<td>&nbsp;</td>
					<td><center><?= $print_labor['uric_acid'] ?><center></td>
					<td>&nbsp;P 2,6 - 6.0 mg/dl</td>
				</tr>

				<tr>
					<td>&nbsp;ERITROSIT</td>
					<td></td>
					<td>&nbsp;L 4.5 - 5.9 Juta/mm³</td>
					<td>&nbsp;TRIGLISERIDA</td>
					<td><center><?= $print_labor['trigiserida'] ?><center></td>
					<td>&nbsp;60 - 150 mg/dl</td>
				</tr>

				<tr>
					<td></td>
					<td><center><?= $print_labor['eritrosit'] ?><center></td>
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
					<td><center><?= $print_labor['bas'] ?><center></td>
					<td>&nbsp;0 - 1 %</td>
					<td>&nbsp;- NA</td>
					<td><center><?= $print_labor['na'] ?><center></td>
					<td>&nbsp;128 - 138 mmol/l</td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp;- EOS</td>
					<td><center><?= $print_labor['eos'] ?><center></td>
					<td>&nbsp;2 - 4 %</td>
					<td>&nbsp;- K</td>
					<td><center><?= $print_labor['k'] ?><center></td>
					<td>&nbsp;3,9 - 4,9 mmol/l</td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp;- MONO</td>
					<td><center><?= $print_labor['mono'] ?><center></td>
					<td>&nbsp;2 - 8 %</td>
					<td>&nbsp;- CL</td>
					<td><center><?= $print_labor['cl'] ?><center></td>
					<td>&nbsp;88 - 100 mmol/l</td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp;- SEGMEN</td>
					<td><center><?= $print_labor['segmen'] ?><center></td>
					<td>&nbsp;50 - 70 %</td>
					<td>&nbsp;- Ca</td>
					<td><center><?= $print_labor['ca'] ?><center></td>
					<td>&nbsp;0,99 - 1,29 mmol/l</td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp;- LYMPO</td>
					<td><center><?= $print_labor['lympo'] ?><center></td>
					<td>&nbsp;25 - 40 %</td>
					<td></td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;MCV</td>
					<td><center><?= $print_labor['mcv'] ?><center></td>
					<td>&nbsp;80 - 96 fL</td>
					<td>&nbsp;<i>IMUNOSEROLOGI</i></td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;MCH</td>
					<td><center><?= $print_labor['mch'] ?><center></td>
					<td>&nbsp;28 - 33 pg</td>
					<td>&nbsp;MALARIA</td>
					<td><center><?= $print_labor['malaria'] ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;MCHC</td>
					<td><center><?= $print_labor['mchc'] ?><center></td>
					<td>&nbsp;33 - 36 g/dL</td>
					<td>&nbsp;WIDAL</td>
					<td><center><?= $print_labor['widal'] ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;RDW-CV</td>
					<td><center><?= $print_labor['rdw_cv'] ?><center></td>
					<td>&nbsp;11,0 - 16,0 %</td>
					<td>&nbsp;TROPONIN </td>
					<td><center><?= $print_labor['troponin'] ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;RDW-SD</td>
					<td><center><?= $print_labor['rdw_sd'] ?><center></td>
					<td>&nbsp;35,0 - 56,0 fL</td>
					<td>&nbsp;NS 1 </td>
					<td><center><?= $print_labor['ns1'] ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;LED</td>
					<td><center><?= $print_labor['led'] ?><center></td>
					<td>&nbsp;L s/d 10 mm / jam</td>
					<td>&nbsp;IgG/IgM DENGUE </td>
					<td><center><?= $print_labor['dengue'] ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td></td>
					<td></td>
					<td>&nbsp;P s/d 15 mm / jam</td>
					<td>&nbsp;IgG/IgM SALMONELLA </td>
					<td><center><?= $print_labor['salmonella'] ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;WAKTU PENDARAHAN (BLT)</td>
					<td><center><?= $print_labor['blt'] ?><center></td>
					<td>&nbsp;1' - 6'</td>
					<td>&nbsp;HBSAG </td>
					<td><center><?= $print_labor['hbsag'] ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;WAKTU PEMBEKUAN(CLT)</td>
					<td><center><?= $print_labor['clt'] ?><center></td>
					<td>&nbsp;2' - 6'</td>
					<td>&nbsp;HBSAB</td>
					<td><center><?= $print_labor['hbsab'] ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td>&nbsp;B20</td>
					<td><center><?= $print_labor['b20'] ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;<i>KIMIA DARAH</i></td>
					<td></td>
					<td></td>
					<td>&nbsp;VDRL</td>
					<td><center><?= $print_labor['vdrl'] ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;GULA DARAH</td>
					<td><center><?= $print_labor['gul_darah'] ?><center></td>
					<td></td>
					<td>&nbsp;GOLONGAN DARAH</td>
					<td><center><?= $print_labor['gol_darah'] ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp;- PUASA</td>
					<td><center><?= $print_labor['puasa'] ?><center></td>
					<td>&nbsp;76 - 110 mg/dl</td>
					<td>&nbsp;RHESUS</td>
					<td><center><?= $print_labor['rhesus'] ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp;- 2 JAM PP</td>
					<td><center><?= $print_labor['2jampp'] ?><center></td>
					<td>&nbsp;< 150 mg/dl</td>
					<td>&nbsp;PLANO TEST</td>
					<td><center><?= $print_labor['planotes'] ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp;- SEWAKTU</td>
					<td><center><?= $print_labor['sewaktu'] ?><center></td>
					<td>&nbsp;110 - 150 mg/dl</td>
					<td>&nbsp;DARAH SAMAR</td>
					<td><center><?= $print_labor['darah_samar'] ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;HBA1C</td>
					<td><center><?= $print_labor['hba1c'] ?><center></td>
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
					<td><center><?= $print_labor['ureum'] ?><center></td>
					<td>&nbsp;10 - 50 mg/dl</td>
					<td>&nbsp;T4</td>
					<td></td>
					<td>&nbsp;60 - 120</td>
				</tr>

				<tr>
					<td>&nbsp;CREATININ </td>
					<td><center><?= $print_labor['creatinin'] ?><center></td>
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
					<td><center><?= $print_labor['ft4'] ?><center></td>
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
					<td><center><?= $print_labor['bilirubin560'] ?><center></td>
					<td>&nbsp;0.3 -1.2 mg/dl</td>
					<td>&nbsp;<i>MIKROBIOLOGI</i></td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;&nbsp;  60 - 90 Thn</td>
					<td><center><?= $print_labor['bilirubin6090'] ?><center></td>
					<td>&nbsp;0.2 - 1.1 mg/dl</td>
					<td>&nbsp;SPUTUM BTA I</td>
					<td><center><?= $print_labor['sputum_bta_i'] ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;BILIRUBIN: DIREK</td>
					<td></td>
					<td>&nbsp;0 - 0.2 mg/dl</td>
					<td>&nbsp;SPUTUM BTA II</td>
					<td><center><?= $print_labor['sputum_bta_ii'] ?><center></td>
					<td></td>
				</tr>

				<tr>
					<td>&nbsp;BILIRUBIN: INDIREK</td>
					<td></td>
					<td>&nbsp;0 - 1.1 mg/dl</td>
					<td>&nbsp;SPUTUM BTA III</td>
					<td><center><?= $print_labor['sputum_bta_iii'] ?><center></td>
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
					<td><center><?= $print_labor['sgpt1260'] ?><center></td>
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
					<td><center><?= $print_labor['sgpt6090'] ?><center></td>
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
					<td><center><?= $print_labor['sgot'] ?><center></td>
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
					<td><center><?= $print_labor['ggt'] ?><center></td>
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
					<td><center><?= $print_labor['alp'] ?><center></td>
					<td>&nbsp;P <105 U/L </td>
					<td>&nbsp;Rapid Cov-2</td>
					<td></td>
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