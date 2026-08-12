<<<<<<< HEAD
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title><?php echo $title ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->

    <style>
        @page {
            size: A4
        }

        h1 {
            font-weight: bold;
            font-size: 20pt;
            text-align: center;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        .A4 {
            font-size: 12pt;
            font-family: 'times new roman';
            font-family: verdana;
        }

        .table th {
            padding: 2px 2px;
            border: 1px solid #000000;
            text-align: left;
        }

        .table td {
            padding: 3px 3px;
            border: 1px solid #000000;
        }

        .notable th {
            padding: 5px 5px;
            border: 0px solid #000000;
            text-align: right;
            padding-right: 40px;
            font-weight: normal;
        }

        .notable td {
            padding: 3px 3px;
            border: 0px solid #000000;
        }

        .text-center {
            text-align: center;
        }
    </style>
    <style>
        .line-title {
            border: 0;
            border-style: inset;
            border-top: 1px solid #000;
        }
    </style>
</head>

<body class="A5">
    <section class="sheet padding-15mm">
        <pre>
        <!-- </?php echo var_dump($cara_bayar);
        ?> -->
        </pre>
        <table class="table" style=" padding-top: 15px;">
            <tr>
                <td colspan="2" align="center"><b>PENDAPATAN USAHA PER KELOMPOK PELANGGAN (NET)</b></td>

                <!-- <td>-</td> -->
            </tr>
            <thead>
                <tr>
                    <th width="80%">BPJS</th>
                    <?php if ($bpjs==0): ?>
                    <th width="20%">-</th>											  	
                    <?php else: ?>  
                    <th width="20%"><?= 'Rp. '.number_format($bpjs,0,',','.')?></th>
                    <?php endif ?>  

                </tr>
                <tr>
                    <th width="80%">YAYASAN PERTAMINA</th>
                    <?php if ($yayasan_pertamina==0): ?>
                        <th width="20%">-</th>											  	
                    <?php else: ?>  
                        <th width="20%"><?= 'Rp. '.number_format($yayasan_pertamina,0,',','.')?></th>
                    <?php endif ?>

                </tr>
                <tr>
                    <th width="80%">BAYAR SENDIRI/UMUM</th>
                    <?php if ($bayar_sendiri==0): ?>
                        <th width="20%">-</th>											  	
                    <?php else: ?>  
                        <th width="20%"><?= 'Rp. '.number_format($bayar_sendiri,0,',','.')?></th>
                    <?php endif ?>

                </tr>
                <tr>
                    <th width="80%">TIMAH</th>
                    <?php if ($timah==0): ?>
                        <th width="20%">-</th>											  	
                    <?php else: ?>  
                        <th width="20%"><?= 'Rp. '.number_format($timah,0,',','.')?></th>
                    <?php endif ?>

                </tr>
                <tr>
                    <th width="80%">INTERNAL RSBT</th>
                    <?php if ($internal_rsbt==0): ?>
                        <th width="20%">-</th>											  	
                    <?php else: ?>  
                        <th width="20%"><?= 'Rp. '.number_format($internal_rsbt,0,',','.')?></th>
                    <?php endif ?>

                </tr>
                <tr>
                    <th width="80%">ASURANSI JIWA INHEALTH INDONESIA</th>
                    <?php if ($asuransi_jiwa==0): ?>
                        <th width="20%">-</th>											  	
                    <?php else: ?>  
                        <th width="20%"><?= 'Rp. '.number_format($asuransi_jiwa,0,',','.')?></th>
                    <?php endif ?>

                </tr>
                <tr>
                    <th width="80%">PLN (PERSERO) WILAYAH BANGKA BELITUNG</th>
                    <?php if ($pln==0): ?>
                        <th width="20%">-</th>												  	
                    <?php else: ?>  
                        <th width="20%"><?= 'Rp. '.number_format($pln,0,',','.')?></th>
                    <?php endif ?>  
                    

                </tr>
                <tr>
                    <th width="80%">YAYASAN KESEHATAN PEGAWAI TELKOM</th>
                    <?php if ($yayasan_kesehatan==0): ?>
                        <th width="20%">-</th>												  	
                    <?php else: ?>  
                        <th width="20%"><?= 'Rp. '.number_format($yayasan_kesehatan,0,',','.')?></th>
                    <?php endif ?>

                </tr>
                <tr>
                    <th width="80%">ASURANSI BRI LIFE</th>
                    <?php if ($asuransi==0): ?>
                        <th width="20%">-</th>												  	
                    <?php else: ?>  
                        <th width="20%"><?= 'Rp. '.number_format($asuransi,0,',','.')?></th>
                    <?php endif ?>

                </tr>
                <tr>
                    <th width="80%">NAYAKA ERA HUSADA</th>
                    <?php if ($nayaka==0): ?>
                        <th width="20%">-</th>												  	
                    <?php else: ?>  
                        <th width="20%"><?= 'Rp. '.number_format($nayaka,0,',','.')?></th>
                    <?php endif ?>

                </tr>

                <tr>
                    <th width="80%">ADMINISTRASI MEDIKA</th>
                    <?php if ($administrasi_medika==0): ?>
                        <th width="20%">-</th>												  	
                    <?php else: ?>  
                        <th width="20%"><?= 'Rp. '.number_format($administrasi_medika,0,',','.')?></th>
                    <?php endif ?>

                </tr>
                <tr>
                    <th width="80%">ASURANSI UMUM BUMIPUTERA MUDA 1967</th>
                    <?php if ($asuransi_umum==0): ?>
                        <th width="20%">-</th>												  	
                    <?php else: ?>  
                        <th width="20%"><?= 'Rp. '.number_format($asuransi_umum,0,',','.')?></th>
                    <?php endif ?>

                </tr>
                <tr>
                    <th width="80%">BANK RAKYAT INDONESIA </th>
                    <?php if ($bri==0): ?>
                        <th width="20%">-</th>												  	
                    <?php else: ?>  
                        <th width="20%"><?= 'Rp. '.number_format($bri,0,',','.')?></th>
                    <?php endif ?>

                </tr>
                <tr>
                    <th width="80%">LIPPO GENERAL ASURANCE</th>
                    <?php if ($lippo==0): ?>
                        <th width="20%">-</th>												  	
                    <?php else: ?>  
                        <th width="20%"><?= 'Rp. '.number_format($lippo,0,',','.')?></th>
                    <?php endif ?>
                    
                </tr>
                <tr>
                    <th width="80%">BUKIT ASAM</th>
                    <?php if ($bukit_asam==0): ?>
                        <th width="20%">-</th>												  	
                    <?php else: ?>  
                        <th width="20%"><?= 'Rp. '.number_format($bukit_asam,0,',','.')?></th>
                    <?php endif ?>

                </tr>
                <tr>
                    <th width="80%">PRUDENTIAL LIFE ASSURANCE</th>
                    <?php if ($prudential==0): ?>
                        <th width="20%">-</th>												  	
                    <?php else: ?>  
                        <th width="20%"><?= 'Rp. '.number_format($prudential,0,',','.')?></th>
                    <?php endif ?>

                </tr>
                <tr>
                    <th width="80%">ANGKASA PURA II BANDARA DEPATI AMIR BANGKA</th>
                    <?php if ($angkasa_pura==0): ?>
                        <th width="20%">-</th>												  	
                    <?php else: ?>  
                        <th width="20%"><?= 'Rp. '.number_format($angkasa_pura,0,',','.')?></th>
                    <?php endif ?>

                </tr>
                <tr>
                    <th width="80%">ASURANSI BCA</th>
                    <?php if ($asuransi_bca==0): ?>
                        <th width="20%">-</th>												  	
                    <?php else: ?>  
                        <th width="20%"><?= 'Rp. '.number_format($asuransi_bca,0,',','.')?></th>
                    <?php endif ?>

                </tr>
                <tr>
                    <th width="80%">ASURANSI RAMAYANA Tbk</th>
                    <?php if ($asuransi_ramayana==0): ?>
                        <th width="20%">-</th>												  	
                    <?php else: ?>  
                        <th width="20%"><?= 'Rp. '.number_format($asuransi_ramayana,0,',','.')?></th>
                    <?php endif ?>

                </tr>
            </thead>

            <tr>
                <td colspan="2" align="center"><b>PENDAPATAN USAHA PER KELOMPOK LAYANAN</b></td>

                <!-- <td>-</td> -->
            </tr>
            <thead>
                <tr>
                    <th width="80%">Layanan Rawat Jalan</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Reduksi (Discount) Layanan Rawat Jalan</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Layanan Rawat Inap</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Reduksi (Discount) Layanan Rawat Inap</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Layanan Penunjang Medis</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Reduksi (Discount) Layanan Penunjang Medis</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Layanan Farmasi</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Reduksi (Discount) Layanan Farmasi</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Pendapatan Umum Lainnya</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Reduksi (Discount) Pendapatan Umum Lainnya</th>
                    <th width="20%">-</th>

                </tr>

                <tr>
                    <th width="80%">Pendapatan Kapitasi</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Selisih Kapitasi</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Selisih BPJS</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Selisih BPJS (Covid-19)</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Diluar Rumah Sakit</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Reduksi (Discount) Diluar Rumah Sakit</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Pendapatan Managed Care</th>
                    <th width="20%">-</th>

                </tr>


            </thead>
            <tr>
                <td colspan="2" align="center"><b>PENDAPATAN USAHA PER JENIS PENDAPATAN</b></td>

                <!-- <td>-</td> -->
            </tr>
            <thead>
                <tr>
                    <th width="80%">Kapitasi</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Selisih kapitasi</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">ASO</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Selisih BPJS</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Selisih BPJS (Covid-19)</th>
                    <th width="20%">-</th>

                </tr>


            </thead>
            <tr>
                <td colspan="2" align="center"><b>KONSULTASI, VISITE & TINDAKAN</b></td>

                <!-- <td>-</td> -->
            </tr>
            <thead>
                <tr>
                    <th width="80%">Konsul Rawat Jalan - Jasa Dokter</th>
                    <?php if ($konsulRajal_jasaDokter==0): ?>
                        <th width="20%">-</th>												  	
                    <?php else: ?>  
                        <th width="20%"><?= 'Rp. '.number_format($konsulRajal_jasaDokter,0,',','.')?></th>
                    <?php endif ?>

                </tr>
                <tr>
                    <th width="80%">Konsul Rawat Inap - Jasa Dokter</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Visite Rawat Jalan - Jasa Dokter</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Visite Rawat Inap - Jasa Dokter</th>
                    <?php if ($visiteRajal_jasaDokter==0): ?>
                        <th width="20%">-</th>												  	
                    <?php else: ?>  
                        <th width="20%"><?= 'Rp. '.number_format($visiteRajal_jasaDokter,0,',','.')?></th>
                    <?php endif ?>

                </tr>
                <tr>
                    <th width="80%">Tindakan Rawat Jalan - Jasa Dokter</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Tindakan Rawat Inap - Jasa Dokter</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Pemeriksaan Rawat Jalan</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Pemeriksaan Rawat Inap</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Konsul Luar Rawat Jalan</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Konsul Luar Rawat Inap</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Tindakan Penunjang Rawat Jalan</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Tindakan Penunjang Rawat Inap</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Konsul Rawat Jalan - Jasa Sarana</th>
                    <?php if ($KonsulRajal_jasaSarana==0): ?>
                        <th width="20%">-</th>												  	
                    <?php else: ?>  
                        <th width="20%"><?= 'Rp. '.number_format($KonsulRajal_jasaSarana,0,',','.')?></th>
                    <?php endif ?>

                </tr>
                <tr>
                    <th width="80%">Konsul Rawat Inap - Jasa Sarana</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Visite Rawat Jalan - Jasa Sarana</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Visite Rawat Inap - Jasa Sarana</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Tindakan Rawat Jalan - Jasa Sarana</th>
                    <?php if ($tindakanRajal_jasaSarana==0): ?>
                        <th width="20%">-</th>												  	
                    <?php else: ?>  
                        <th width="20%"><?= 'Rp. '.number_format($tindakanRajal_jasaSarana,0,',','.')?></th>
                    <?php endif ?>

                </tr>
                <tr>
                    <th width="80%">Tindakan Rawat Inap - Jasa Sarana</th>
                    <?php if ($tindakanRanap_jasaSarana==0): ?>
                        <th width="20%">-</th>												  	
                    <?php else: ?>  
                        <th width="20%"><?= 'Rp. '.number_format($tindakanRanap_jasaSarana,0,',','.')?></th>
                    <?php endif ?>

                </tr>
                <tr>
                    <th width="80%">Pemeriksaan Rawat Jalan - Jasa Sarana</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Pemeriksaan Rawat Inap - Jasa Sarana</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Tindakan Penunjang Rawat Jalan - Jasa Sarana</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Tindakan Penunjang Rawat Inap - Jasa Sarana</th>
                    <th width="20%">-</th>

                </tr>




            </thead>
            <tr>
                <td colspan="2" align="center"><b>SEWA KAMAR</b></td>

                <!-- <td>-</td> -->
            </tr>
            <thead>
                <tr>
                    <th width="80%">Sewa Kamar Perawatan</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Sewa Kamar Bedah Rawat Jalan</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Sewa Kamar Bedah Rawat Inap</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Sewa Kamar Bersalin</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">One Day Care</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">ICU/ICCU/NICU/PICU</th>
                    <th width="20%">-</th>

                </tr>


            </thead>
            <tr>
                <td colspan="2" align="center"><b>SEWA ALAT</b></td>

                <!-- <td>-</td> -->
            </tr>
            <thead>
                <tr>
                    <th width="80%">Sewa Alat Rawat Jalan </th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Sewa Alat Rawat Inap</th>
                    <th width="20%">-</th>

                </tr>

            </thead>
            <tr>
                <td colspan="2" align="center"><b>OBAT-OBATAN</b></td>

                <!-- <td>-</td> -->
            </tr>
            <thead>
                <tr>
                    <th width="80%">Obat Farmasi Rawat Jalan</th>
                    <?php if ($obatFarmasi_rajal==0): ?>
                        <th width="20%">-</th>												  	
                    <?php else: ?>  
                        <th width="20%"><?= 'Rp. '.number_format($obatFarmasi_rajal,0,',','.')?></th>
                    <?php endif ?>

                </tr>
                <tr>
                    <th width="80%">Obat Farmasi Rawat Inap</th>
                    <?php if ($obatFarmasi_ranap==0): ?>
                        <th width="20%">-</th>												  	
                    <?php else: ?>  
                        <th width="20%"><?= 'Rp. '.number_format($obatFarmasi_ranap,0,',','.')?></th>
                    <?php endif ?>

                </tr>
                <tr>
                    <th width="80%">Obat produksi Rawat Jalan</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Obat produksi Rawat Inap</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Apotik Luar</th>
                    <?php if ($apotikLuar==0): ?>
                        <th width="20%">-</th>												  	
                    <?php else: ?>  
                        <th width="20%"><?= 'Rp. '.number_format($apotikLuar,0,',','.')?></th>
                    <?php endif ?>

                </tr>
                <tr>
                    <th width="80%">Obat Non Resep Rawat Jalan</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Obat Non Resep Rawat Inap</th>
                    <th width="20%">-</th>

                </tr>


            </thead>
            <tr>
                <td colspan="2" align="center"><b>MEDICAL SUPPLY</b></td>

                <!-- <td>-</td> -->
            </tr>
            <thead>
                <tr>
                    <th width="80%">Medical supplies Rawat Jalan</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Medical supplies Rawat Inap</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Medical supplies Non Resep Rawat Jalan</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Medical supplies Non Resep Rawat Inap</th>
                    <th width="20%">-</th>

                </tr>

            </thead>
            <tr>
                <td colspan="2" align="center"><b>PENUNJANG MEDIS</b></td>

                <!-- <td>-</td> -->
            </tr>
            <thead>
                <tr>
                    <th width="80%">Fisioterapi Rawat Jalan</th>
                    <?php if ($fisioRanap==0): ?>
                        <th width="20%">-</th>												  	
                    <?php else: ?>  
                        <th width="20%"><?= 'Rp. '.number_format($fisioRanap,0,',','.')?></th>
                    <?php endif ?>

                </tr>
                <tr>
                    <th width="80%">Fisioterapi Rawat Inap</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Patologi/Sitologi Rawat Jalan</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Kedokteran Nuklir Rawat Jalan</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Kedokteran Nuklir Rawat Inap</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Kedokteran Nuklir Luar</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">MCU (insite)</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Haemodialisa</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Anaesthesi Rawat Jalan</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Anaesthesi Rawat Inap</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Radioterapi Rawat Jalan</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Radioterapi Rawat Inap</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Radioterapi Luar</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Radiodiagnostik Rawat Jalan</th>
                    <?php if ($radiologiRajal==0): ?>
                        <th width="20%">-</th>												  	
                    <?php else: ?>  
                        <th width="20%"><?= 'Rp. '.number_format($radiologiRajal,0,',','.')?></th>
                    <?php endif ?>

                </tr>
                
                <tr>
                    <th width="80%">Radiodiagnostik Rawat Inap</th>
                    <?php if ($radiologiRanap==0): ?>
                        <th width="20%">-</th>												  	
                    <?php else: ?>  
                        <th width="20%"><?= 'Rp. '.number_format($radiologiRanap,0,',','.')?></th>
                    <?php endif ?>

                </tr>
                <tr>
                    <th width="80%">Radiodiagnostik Luar</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">MRI RJ</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">MRI RI</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">CT SCANNING RJ</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">CT SCANNING RI</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">USG RJ</th>
                    <th width="20%">-</th>

                </tr>

                <tr>
                    <th width="80%">USG RI</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">BONE MATERIAL DENSITOMETRI RJ</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">BONE MATERIAL DENSITOMETRI RI</th>
                    <th width="20%">-</th>

                </tr>

                <tr>
                    <th width="80%">Laboratorium klinik Rawat Jalan</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Laboratorium klinik Rawat Inap</th>
                    <?php if ($LaborRanap==0): ?>
                        <th width="20%">-</th>												  	
                    <?php else: ?>  
                        <th width="20%"><?= 'Rp. '.number_format($LaborRanap,0,',','.')?></th>
                    <?php endif ?>

                </tr>
                <tr>
                    <th width="80%">Bank Darah RJ</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Bank Darah RI</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Lab Rujukan/ Luar Rawat Jalan</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Lab Rujukan/ Luar Rawat Inap</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Laboratorium Patologi Anatomi R. Jalan</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Laboratorium Patologi Anatomi R. Inap</th>
                    <th width="20%">-</th>

                </tr>


            </thead>
            <tr>
                <td colspan="2" align="center"><b>PENDAPATAN USAHA LAINNYA</b></td>

                <!-- <td>-</td> -->
            </tr>
            <thead>
                <tr>
                    <th width="80%">Kamar Jenazah Rawat Jalan</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Kamar Jenazah Rawat Inap</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Ambulance Rawat Jalan</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Ambulance Rawat Inap</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Administrasi Medis Rawat Jalan</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Administrasi Medis Rawat Inap</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Extra fooding</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Oksigen Rawat Jalan</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Oksigen Rawat Inap</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Oksigen UGD</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Bakti Sosial (PKBL)</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Incenerator</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Laundry </th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">CSR (Corporate Social Responsibility)</th>
                    <th width="20%">-</th>

                </tr>


            </thead>
            <tr>
                <td colspan="2" align="center"><b>PENDAPATAN USAHA DILUAR RUMAH SAKIT</b></td>

                <!-- <td>-</td> -->
            </tr>
            <thead>
                <tr>
                    <th width="80%">MCU Onsite</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">MCU Turn Around</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Daily Check Up</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Sewa Alat Onsite</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Obat Farmasi Onsite</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Ambulance Onsite</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Fogging</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Spraying</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Termite Kontrol</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Pest Kontrol</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Evakuasi Medis</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">On Site Klinik</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Medical Onsite</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">First Aid Trainning</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Health Risk Assessment (HRA)</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Promotif Program (Corporate Wellness Program)</th>
                    <th width="20%">-</th>

                </tr>


            </thead>
  </table>
        
    </section>


</body>

=======
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title><?php echo $title ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->

    <style>
        @page {
            size: A4
        }

        h1 {
            font-weight: bold;
            font-size: 20pt;
            text-align: center;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        .A4 {
            font-size: 12pt;
            font-family: 'times new roman';
            font-family: verdana;
        }

        .table th {
            padding: 2px 2px;
            border: 1px solid #000000;
            text-align: left;
        }

        .table td {
            padding: 3px 3px;
            border: 1px solid #000000;
        }

        .notable th {
            padding: 5px 5px;
            border: 0px solid #000000;
            text-align: right;
            padding-right: 40px;
            font-weight: normal;
        }

        .notable td {
            padding: 3px 3px;
            border: 0px solid #000000;
        }

        .text-center {
            text-align: center;
        }
    </style>
    <style>
        .line-title {
            border: 0;
            border-style: inset;
            border-top: 1px solid #000;
        }
    </style>
</head>

<body class="A5">
    <section class="sheet padding-15mm">
        <pre>
        <!-- </?php echo var_dump($cara_bayar);
        ?> -->
        </pre>
        <table class="table" style=" padding-top: 15px;">
            <tr>
                <td colspan="2" align="center"><b>PENDAPATAN USAHA PER KELOMPOK PELANGGAN (NET)</b></td>

                <!-- <td>-</td> -->
            </tr>
            <thead>
                <tr>
                    <th width="80%">BPJS</th>
                    <?php if ($bpjs==0): ?>
                    <th width="20%">-</th>											  	
                    <?php else: ?>  
                    <th width="20%"><?= 'Rp. '.number_format($bpjs,0,',','.')?></th>
                    <?php endif ?>  

                </tr>
                <tr>
                    <th width="80%">YAYASAN PERTAMINA</th>
                    <?php if ($yayasan_pertamina==0): ?>
                        <th width="20%">-</th>											  	
                    <?php else: ?>  
                        <th width="20%"><?= 'Rp. '.number_format($yayasan_pertamina,0,',','.')?></th>
                    <?php endif ?>

                </tr>
                <tr>
                    <th width="80%">BAYAR SENDIRI/UMUM</th>
                    <?php if ($bayar_sendiri==0): ?>
                        <th width="20%">-</th>											  	
                    <?php else: ?>  
                        <th width="20%"><?= 'Rp. '.number_format($bayar_sendiri,0,',','.')?></th>
                    <?php endif ?>

                </tr>
                <tr>
                    <th width="80%">TIMAH</th>
                    <?php if ($timah==0): ?>
                        <th width="20%">-</th>											  	
                    <?php else: ?>  
                        <th width="20%"><?= 'Rp. '.number_format($timah,0,',','.')?></th>
                    <?php endif ?>

                </tr>
                <tr>
                    <th width="80%">INTERNAL RSBT</th>
                    <?php if ($internal_rsbt==0): ?>
                        <th width="20%">-</th>											  	
                    <?php else: ?>  
                        <th width="20%"><?= 'Rp. '.number_format($internal_rsbt,0,',','.')?></th>
                    <?php endif ?>

                </tr>
                <tr>
                    <th width="80%">ASURANSI JIWA INHEALTH INDONESIA</th>
                    <?php if ($asuransi_jiwa==0): ?>
                        <th width="20%">-</th>											  	
                    <?php else: ?>  
                        <th width="20%"><?= 'Rp. '.number_format($asuransi_jiwa,0,',','.')?></th>
                    <?php endif ?>

                </tr>
                <tr>
                    <th width="80%">PLN (PERSERO) WILAYAH BANGKA BELITUNG</th>
                    <?php if ($pln==0): ?>
                        <th width="20%">-</th>												  	
                    <?php else: ?>  
                        <th width="20%"><?= 'Rp. '.number_format($pln,0,',','.')?></th>
                    <?php endif ?>  
                    

                </tr>
                <tr>
                    <th width="80%">YAYASAN KESEHATAN PEGAWAI TELKOM</th>
                    <?php if ($yayasan_kesehatan==0): ?>
                        <th width="20%">-</th>												  	
                    <?php else: ?>  
                        <th width="20%"><?= 'Rp. '.number_format($yayasan_kesehatan,0,',','.')?></th>
                    <?php endif ?>

                </tr>
                <tr>
                    <th width="80%">ASURANSI BRI LIFE</th>
                    <?php if ($asuransi==0): ?>
                        <th width="20%">-</th>												  	
                    <?php else: ?>  
                        <th width="20%"><?= 'Rp. '.number_format($asuransi,0,',','.')?></th>
                    <?php endif ?>

                </tr>
                <tr>
                    <th width="80%">NAYAKA ERA HUSADA</th>
                    <?php if ($nayaka==0): ?>
                        <th width="20%">-</th>												  	
                    <?php else: ?>  
                        <th width="20%"><?= 'Rp. '.number_format($nayaka,0,',','.')?></th>
                    <?php endif ?>

                </tr>

                <tr>
                    <th width="80%">ADMINISTRASI MEDIKA</th>
                    <?php if ($administrasi_medika==0): ?>
                        <th width="20%">-</th>												  	
                    <?php else: ?>  
                        <th width="20%"><?= 'Rp. '.number_format($administrasi_medika,0,',','.')?></th>
                    <?php endif ?>

                </tr>
                <tr>
                    <th width="80%">ASURANSI UMUM BUMIPUTERA MUDA 1967</th>
                    <?php if ($asuransi_umum==0): ?>
                        <th width="20%">-</th>												  	
                    <?php else: ?>  
                        <th width="20%"><?= 'Rp. '.number_format($asuransi_umum,0,',','.')?></th>
                    <?php endif ?>

                </tr>
                <tr>
                    <th width="80%">BANK RAKYAT INDONESIA </th>
                    <?php if ($bri==0): ?>
                        <th width="20%">-</th>												  	
                    <?php else: ?>  
                        <th width="20%"><?= 'Rp. '.number_format($bri,0,',','.')?></th>
                    <?php endif ?>

                </tr>
                <tr>
                    <th width="80%">LIPPO GENERAL ASURANCE</th>
                    <?php if ($lippo==0): ?>
                        <th width="20%">-</th>												  	
                    <?php else: ?>  
                        <th width="20%"><?= 'Rp. '.number_format($lippo,0,',','.')?></th>
                    <?php endif ?>
                    
                </tr>
                <tr>
                    <th width="80%">BUKIT ASAM</th>
                    <?php if ($bukit_asam==0): ?>
                        <th width="20%">-</th>												  	
                    <?php else: ?>  
                        <th width="20%"><?= 'Rp. '.number_format($bukit_asam,0,',','.')?></th>
                    <?php endif ?>

                </tr>
                <tr>
                    <th width="80%">PRUDENTIAL LIFE ASSURANCE</th>
                    <?php if ($prudential==0): ?>
                        <th width="20%">-</th>												  	
                    <?php else: ?>  
                        <th width="20%"><?= 'Rp. '.number_format($prudential,0,',','.')?></th>
                    <?php endif ?>

                </tr>
                <tr>
                    <th width="80%">ANGKASA PURA II BANDARA DEPATI AMIR BANGKA</th>
                    <?php if ($angkasa_pura==0): ?>
                        <th width="20%">-</th>												  	
                    <?php else: ?>  
                        <th width="20%"><?= 'Rp. '.number_format($angkasa_pura,0,',','.')?></th>
                    <?php endif ?>

                </tr>
                <tr>
                    <th width="80%">ASURANSI BCA</th>
                    <?php if ($asuransi_bca==0): ?>
                        <th width="20%">-</th>												  	
                    <?php else: ?>  
                        <th width="20%"><?= 'Rp. '.number_format($asuransi_bca,0,',','.')?></th>
                    <?php endif ?>

                </tr>
                <tr>
                    <th width="80%">ASURANSI RAMAYANA Tbk</th>
                    <?php if ($asuransi_ramayana==0): ?>
                        <th width="20%">-</th>												  	
                    <?php else: ?>  
                        <th width="20%"><?= 'Rp. '.number_format($asuransi_ramayana,0,',','.')?></th>
                    <?php endif ?>

                </tr>
            </thead>

            <tr>
                <td colspan="2" align="center"><b>PENDAPATAN USAHA PER KELOMPOK LAYANAN</b></td>

                <!-- <td>-</td> -->
            </tr>
            <thead>
                <tr>
                    <th width="80%">Layanan Rawat Jalan</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Reduksi (Discount) Layanan Rawat Jalan</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Layanan Rawat Inap</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Reduksi (Discount) Layanan Rawat Inap</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Layanan Penunjang Medis</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Reduksi (Discount) Layanan Penunjang Medis</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Layanan Farmasi</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Reduksi (Discount) Layanan Farmasi</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Pendapatan Umum Lainnya</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Reduksi (Discount) Pendapatan Umum Lainnya</th>
                    <th width="20%">-</th>

                </tr>

                <tr>
                    <th width="80%">Pendapatan Kapitasi</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Selisih Kapitasi</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Selisih BPJS</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Selisih BPJS (Covid-19)</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Diluar Rumah Sakit</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Reduksi (Discount) Diluar Rumah Sakit</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Pendapatan Managed Care</th>
                    <th width="20%">-</th>

                </tr>


            </thead>
            <tr>
                <td colspan="2" align="center"><b>PENDAPATAN USAHA PER JENIS PENDAPATAN</b></td>

                <!-- <td>-</td> -->
            </tr>
            <thead>
                <tr>
                    <th width="80%">Kapitasi</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Selisih kapitasi</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">ASO</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Selisih BPJS</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Selisih BPJS (Covid-19)</th>
                    <th width="20%">-</th>

                </tr>


            </thead>
            <tr>
                <td colspan="2" align="center"><b>KONSULTASI, VISITE & TINDAKAN</b></td>

                <!-- <td>-</td> -->
            </tr>
            <thead>
                <tr>
                    <th width="80%">Konsul Rawat Jalan - Jasa Dokter</th>
                    <?php if ($konsulRajal_jasaDokter==0): ?>
                        <th width="20%">-</th>												  	
                    <?php else: ?>  
                        <th width="20%"><?= 'Rp. '.number_format($konsulRajal_jasaDokter,0,',','.')?></th>
                    <?php endif ?>

                </tr>
                <tr>
                    <th width="80%">Konsul Rawat Inap - Jasa Dokter</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Visite Rawat Jalan - Jasa Dokter</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Visite Rawat Inap - Jasa Dokter</th>
                    <?php if ($visiteRajal_jasaDokter==0): ?>
                        <th width="20%">-</th>												  	
                    <?php else: ?>  
                        <th width="20%"><?= 'Rp. '.number_format($visiteRajal_jasaDokter,0,',','.')?></th>
                    <?php endif ?>

                </tr>
                <tr>
                    <th width="80%">Tindakan Rawat Jalan - Jasa Dokter</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Tindakan Rawat Inap - Jasa Dokter</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Pemeriksaan Rawat Jalan</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Pemeriksaan Rawat Inap</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Konsul Luar Rawat Jalan</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Konsul Luar Rawat Inap</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Tindakan Penunjang Rawat Jalan</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Tindakan Penunjang Rawat Inap</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Konsul Rawat Jalan - Jasa Sarana</th>
                    <?php if ($KonsulRajal_jasaSarana==0): ?>
                        <th width="20%">-</th>												  	
                    <?php else: ?>  
                        <th width="20%"><?= 'Rp. '.number_format($KonsulRajal_jasaSarana,0,',','.')?></th>
                    <?php endif ?>

                </tr>
                <tr>
                    <th width="80%">Konsul Rawat Inap - Jasa Sarana</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Visite Rawat Jalan - Jasa Sarana</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Visite Rawat Inap - Jasa Sarana</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Tindakan Rawat Jalan - Jasa Sarana</th>
                    <?php if ($tindakanRajal_jasaSarana==0): ?>
                        <th width="20%">-</th>												  	
                    <?php else: ?>  
                        <th width="20%"><?= 'Rp. '.number_format($tindakanRajal_jasaSarana,0,',','.')?></th>
                    <?php endif ?>

                </tr>
                <tr>
                    <th width="80%">Tindakan Rawat Inap - Jasa Sarana</th>
                    <?php if ($tindakanRanap_jasaSarana==0): ?>
                        <th width="20%">-</th>												  	
                    <?php else: ?>  
                        <th width="20%"><?= 'Rp. '.number_format($tindakanRanap_jasaSarana,0,',','.')?></th>
                    <?php endif ?>

                </tr>
                <tr>
                    <th width="80%">Pemeriksaan Rawat Jalan - Jasa Sarana</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Pemeriksaan Rawat Inap - Jasa Sarana</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Tindakan Penunjang Rawat Jalan - Jasa Sarana</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Tindakan Penunjang Rawat Inap - Jasa Sarana</th>
                    <th width="20%">-</th>

                </tr>




            </thead>
            <tr>
                <td colspan="2" align="center"><b>SEWA KAMAR</b></td>

                <!-- <td>-</td> -->
            </tr>
            <thead>
                <tr>
                    <th width="80%">Sewa Kamar Perawatan</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Sewa Kamar Bedah Rawat Jalan</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Sewa Kamar Bedah Rawat Inap</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Sewa Kamar Bersalin</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">One Day Care</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">ICU/ICCU/NICU/PICU</th>
                    <th width="20%">-</th>

                </tr>


            </thead>
            <tr>
                <td colspan="2" align="center"><b>SEWA ALAT</b></td>

                <!-- <td>-</td> -->
            </tr>
            <thead>
                <tr>
                    <th width="80%">Sewa Alat Rawat Jalan </th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Sewa Alat Rawat Inap</th>
                    <th width="20%">-</th>

                </tr>

            </thead>
            <tr>
                <td colspan="2" align="center"><b>OBAT-OBATAN</b></td>

                <!-- <td>-</td> -->
            </tr>
            <thead>
                <tr>
                    <th width="80%">Obat Farmasi Rawat Jalan</th>
                    <?php if ($obatFarmasi_rajal==0): ?>
                        <th width="20%">-</th>												  	
                    <?php else: ?>  
                        <th width="20%"><?= 'Rp. '.number_format($obatFarmasi_rajal,0,',','.')?></th>
                    <?php endif ?>

                </tr>
                <tr>
                    <th width="80%">Obat Farmasi Rawat Inap</th>
                    <?php if ($obatFarmasi_ranap==0): ?>
                        <th width="20%">-</th>												  	
                    <?php else: ?>  
                        <th width="20%"><?= 'Rp. '.number_format($obatFarmasi_ranap,0,',','.')?></th>
                    <?php endif ?>

                </tr>
                <tr>
                    <th width="80%">Obat produksi Rawat Jalan</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Obat produksi Rawat Inap</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Apotik Luar</th>
                    <?php if ($apotikLuar==0): ?>
                        <th width="20%">-</th>												  	
                    <?php else: ?>  
                        <th width="20%"><?= 'Rp. '.number_format($apotikLuar,0,',','.')?></th>
                    <?php endif ?>

                </tr>
                <tr>
                    <th width="80%">Obat Non Resep Rawat Jalan</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Obat Non Resep Rawat Inap</th>
                    <th width="20%">-</th>

                </tr>


            </thead>
            <tr>
                <td colspan="2" align="center"><b>MEDICAL SUPPLY</b></td>

                <!-- <td>-</td> -->
            </tr>
            <thead>
                <tr>
                    <th width="80%">Medical supplies Rawat Jalan</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Medical supplies Rawat Inap</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Medical supplies Non Resep Rawat Jalan</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Medical supplies Non Resep Rawat Inap</th>
                    <th width="20%">-</th>

                </tr>

            </thead>
            <tr>
                <td colspan="2" align="center"><b>PENUNJANG MEDIS</b></td>

                <!-- <td>-</td> -->
            </tr>
            <thead>
                <tr>
                    <th width="80%">Fisioterapi Rawat Jalan</th>
                    <?php if ($fisioRanap==0): ?>
                        <th width="20%">-</th>												  	
                    <?php else: ?>  
                        <th width="20%"><?= 'Rp. '.number_format($fisioRanap,0,',','.')?></th>
                    <?php endif ?>

                </tr>
                <tr>
                    <th width="80%">Fisioterapi Rawat Inap</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Patologi/Sitologi Rawat Jalan</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Kedokteran Nuklir Rawat Jalan</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Kedokteran Nuklir Rawat Inap</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Kedokteran Nuklir Luar</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">MCU (insite)</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Haemodialisa</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Anaesthesi Rawat Jalan</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Anaesthesi Rawat Inap</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Radioterapi Rawat Jalan</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Radioterapi Rawat Inap</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Radioterapi Luar</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Radiodiagnostik Rawat Jalan</th>
                    <?php if ($radiologiRajal==0): ?>
                        <th width="20%">-</th>												  	
                    <?php else: ?>  
                        <th width="20%"><?= 'Rp. '.number_format($radiologiRajal,0,',','.')?></th>
                    <?php endif ?>

                </tr>
                
                <tr>
                    <th width="80%">Radiodiagnostik Rawat Inap</th>
                    <?php if ($radiologiRanap==0): ?>
                        <th width="20%">-</th>												  	
                    <?php else: ?>  
                        <th width="20%"><?= 'Rp. '.number_format($radiologiRanap,0,',','.')?></th>
                    <?php endif ?>

                </tr>
                <tr>
                    <th width="80%">Radiodiagnostik Luar</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">MRI RJ</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">MRI RI</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">CT SCANNING RJ</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">CT SCANNING RI</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">USG RJ</th>
                    <th width="20%">-</th>

                </tr>

                <tr>
                    <th width="80%">USG RI</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">BONE MATERIAL DENSITOMETRI RJ</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">BONE MATERIAL DENSITOMETRI RI</th>
                    <th width="20%">-</th>

                </tr>

                <tr>
                    <th width="80%">Laboratorium klinik Rawat Jalan</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Laboratorium klinik Rawat Inap</th>
                    <?php if ($LaborRanap==0): ?>
                        <th width="20%">-</th>												  	
                    <?php else: ?>  
                        <th width="20%"><?= 'Rp. '.number_format($LaborRanap,0,',','.')?></th>
                    <?php endif ?>

                </tr>
                <tr>
                    <th width="80%">Bank Darah RJ</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Bank Darah RI</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Lab Rujukan/ Luar Rawat Jalan</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Lab Rujukan/ Luar Rawat Inap</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Laboratorium Patologi Anatomi R. Jalan</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Laboratorium Patologi Anatomi R. Inap</th>
                    <th width="20%">-</th>

                </tr>


            </thead>
            <tr>
                <td colspan="2" align="center"><b>PENDAPATAN USAHA LAINNYA</b></td>

                <!-- <td>-</td> -->
            </tr>
            <thead>
                <tr>
                    <th width="80%">Kamar Jenazah Rawat Jalan</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Kamar Jenazah Rawat Inap</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Ambulance Rawat Jalan</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Ambulance Rawat Inap</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Administrasi Medis Rawat Jalan</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Administrasi Medis Rawat Inap</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Extra fooding</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Oksigen Rawat Jalan</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Oksigen Rawat Inap</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Oksigen UGD</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Bakti Sosial (PKBL)</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Incenerator</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Laundry </th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">CSR (Corporate Social Responsibility)</th>
                    <th width="20%">-</th>

                </tr>


            </thead>
            <tr>
                <td colspan="2" align="center"><b>PENDAPATAN USAHA DILUAR RUMAH SAKIT</b></td>

                <!-- <td>-</td> -->
            </tr>
            <thead>
                <tr>
                    <th width="80%">MCU Onsite</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">MCU Turn Around</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Daily Check Up</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Sewa Alat Onsite</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Obat Farmasi Onsite</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Ambulance Onsite</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Fogging</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Spraying</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Termite Kontrol</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Pest Kontrol</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Evakuasi Medis</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">On Site Klinik</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Medical Onsite</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">First Aid Trainning</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Health Risk Assessment (HRA)</th>
                    <th width="20%">-</th>

                </tr>
                <tr>
                    <th width="80%">Promotif Program (Corporate Wellness Program)</th>
                    <th width="20%">-</th>

                </tr>


            </thead>
  </table>
        
    </section>


</body>

>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
</html>