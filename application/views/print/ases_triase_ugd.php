<!DOCTYPE html>
<html>

<head>
    <title>Print out</title>
    <link href="<?= base_url() ?>resources/css/styles_print.css?p=<?= date('his') ?>" rel="stylesheet" type="text/css" />
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 15px;
            font-size: 10.5px;  
            color: #232323;
            line-height: 1.2;
        }

        .header-container {
            display: flex;
            justify-content: space-between;
            margin-bottom: 5px;
        }

        .identitas-container {
            border: 1px solid black;
            border-radius: 8px;
            padding: 5px;
            min-width: 250px;
        }

        .identitas-table td {
            padding: 1px 3px;
            vertical-align: top;
            border: none;
        }

        .form-title {
            font-size: 16px;
            font-weight: bold;
            text-align: center;
            margin: 20px 0 10px 0;
            letter-spacing: 2px;
        }

        .form-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: -1px;
            font-size: 11px;
        }

        .form-table td,
        .form-table th {
            border: 1px solid black;
            padding: 4px;
            vertical-align: top;
        }

        .info-table .col1 {
            width: 70px;
            vertical-align: top;
            border-right: 0;
        }

        .info-table .col-titik-dua {
            border-left: 0;
            width: 120px;
        }

        .info-table input[type="checkbox"] {
            vertical-align: middle;
            margin: 0 3px 0 10px;
            cursor: not-allowed;
        }


        .info-table label {
            vertical-align: middle;
        }

        .keluhan-utama-table .header-cell {
            text-align: center;
            font-weight: bold;
        }

        .keluhan-utama-table .content-cell {
            height: 40px;
        }

        .keluhan-utama-table .vital-cell {
            width: 20%;
            text-align: left;
        }

        .gcs-table .gcs-title-cell,
        .gcs-table .gcs-header-cell {
            text-align: center;
            font-weight: bold;
        }

        .gcs-table .gcs-content-cell p {
            margin: 0 0 3px 0;
        }

        .triage-table {
            table-layout: fixed;
            word-wrap: break-word;
            font-size: 9.5px;
        }

        .triage-table thead td {
            font-weight: bold;
            text-align: center;
            vertical-align: middle;
        }

        .triage-table .category-cell {
            font-weight: bold;
            font-style: italic;
            vertical-align: middle;
            text-align: center;
        }

        .bg-red {
            background-color: #e84a5f !important;
            color: white !important;
        }

        .bg-orange {
            background-color: #ffc93c !important;
            color: black !important;
        }

        .bg-green {
            background-color: #72b01d !important;
            color: white !important;
        }

        .triage-table .check-item {
            display: block;
            margin-bottom: 3px;
        }

        .triage-table .check-item input,
        .triage-table .check-item label {
            vertical-align: middle;
        }

        .skala-nyeri-table .header-cell {
            text-align: center;
            font-weight: bold;
        }

        .skala-nyeri-table .info-cell {
            /* Style tambahan agar konten terlihat lebih rapi */
            text-align: center;
            /* Ganti ke 'left' jika ingin rata kiri */
        }

        .skala-nyeri-table .nyeri-img {
            /* Membuat gambar sejajar dengan teks */
            vertical-align: middle;
            width: 150px;
            /* Atur ukuran gambar agar tidak terlalu besar */
            margin-left: 250px;
        }

        @media print {
            body {
                margin: 10px;
                font-size: 9.5pt;
            }

            .no-print {
                display: none;
            }

            .bg-red,
            .bg-orange,
            .bg-green,
            .color-bar {
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }
        }
    </style>
</head>

<body>
    <?php if ($data): ?>
        <div class="header-container">
            <div class="logo-container">
                <img src="<?= base_url('assets/dist/img/rsbt_ihc.png'); ?>" style="width: 200px;">
            </div>
            <div class="identitas-container">
                <table class="identitas-table">
                    <tr>
                        <td>No. RM</td>
                        <td>:</td>
                        <td><?= $data['no_rm'] ?></td>
                    </tr>
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td><?= $data['pasien'] ?></td>
                    </tr>
                    <tr>
                        <td>Tanggal Lahir</td>
                        <td>:</td>
                        <td><?= $data['tgl_lahir'] ?></td>
                    </tr>
                </table>
            </div>
        </div>

        <h1 class="form-title">TRIASE UGD</h1>

        <table class="form-table info-table">
            <tbody>
                <tr>
                    <td class="col1">Tanggal</td>
                    <td class="col-titik-dua">:</td>
                    <td class="col2">Ke RSBT Pangkalpinang diantar oleh *) :</td>
                </tr>
                <tr>
                    <td class="col1">Jam datang</td>
                    <td class="col-titik-dua">:</td>
                    <td class="col2">
                        Rujukan RS/Puskesmas.......................
                        <input type="checkbox" id="polisi" onclick="return false;"><label for="polisi">Polisi</label>
                        <input type="checkbox" id="keluarga" onclick="return false;"><label for="keluarga">Keluarga/Sendiri</label>
                    </td>
                </tr>
                <tr>
                    <td class="col1">Jam ditangani</td>
                    <td class="col-titik-dua">:</td>
                    <td class="col2">
                        Jenis Kasus *) :
                        <input type="checkbox" id="trauma" onclick="return false;"><label for="trauma">Trauma</label>
                        <input type="checkbox" id="non-trauma" onclick="return false;"><label for="non-trauma">Non Trauma</label>
                    </td>
                </tr>
            </tbody>
        </table>

        <table class="form-table keluhan-utama-table">
            <tbody>
                <tr>
                    <td colspan="5" class="header-cell">KELUHAN UTAMA</td>
                </tr>
                <tr>
                    <td colspan="5" class="content-cell"><?= $data['keluhan_utama']; ?></td>
                </tr>
                <tr>
                    <td class="vital-cell">Tekanan Darah : <?= $data['tekanan_darah']; ?> </td>
                    <td class="vital-cell">Nadi : <?= $data['frequensi_nadi']; ?> </td>
                    <td class="vital-cell">Laju Nafas : <?= $data['frequensi_nafas']; ?> </td>
                    <td class="vital-cell">Spo2. : <?= $data['spo2']; ?> </td>
                    <td class="vital-cell">suhu : <?= $data['suhu']; ?> </td>
                </tr>
            </tbody>
        </table>

        <table class="form-table gcs-table">
            <tbody>
                <tr>
                    <td colspan="3" class="gcs-title-cell">GLASGOW COMA SCALE / GCS : <?= $data['gcs']; ?></td>
                </tr>
                <tr>
                    <td class="gcs-header-cell" style="width: 25%;">MATA</td>
                    <td class="gcs-header-cell" style="width: 30%;">VERBAL</td>
                    <td class="gcs-header-cell" style="width: 45%;">MOTORIK</td>
                </tr>
                <tr>
                    <td class="gcs-content-cell"> <?= $data['mata']; ?> </td>
                    <td class="gcs-content-cell"> <?= $data['verbal']; ?> </td>
                    <td class="gcs-content-cell"> <?= $data['motorik']; ?></td>
                </tr>
            </tbody>
        </table>

        <table class="form-table triage-table info-table">
            <colgroup>
                <col style="width: 12%;">
                <col style="width: 18%;">
                <col style="width: 25%;">
                <col style="width: 25%;">
                <col style="width: 20%;">
            </colgroup>
            <thead>
                <tr>
                    <td rowspan="2">PEMERIKSAAN</td>
                    <td class="bg-red">SEGERA</td>
                    <td class="bg-red">10 MENIT</td>
                    <td class="bg-orange">30 MENIT</td>
                    <td class="bg-green">60 MENIT</td>
                </tr>
                <tr>
                    <td class="bg-red">RESUSITASI</td>
                    <td class="bg-red">EMERGENCY / Gawat Darurat</td>
                    <td class="bg-orange">Urgent / Darurat</td>
                    <td class="bg-green">Tidak Darurat</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="category-cell">AIR WAY</td>
                    <td>
                        <span class="check-item"><input type="checkbox" id="aw1" <?php echo ($data['airway'] == 'sumbatan_total') ? 'checked' : ''; ?>><label for="aw1">Sumbatan total</label></span>
                        <span class="check-item"><input type="checkbox" id="aw2" <?php echo ($data['airway'] == 'sumbatan_sebagian') ? 'checked' : ''; ?>><label for="aw2">Sumbatan sebagian</label></span>
                    </td>
                    <td>
                        <span class="check-item"><input type="checkbox" id="aw3" <?php echo ($data['airway'] == 'risiko_gangguan') ? 'checked' : ''; ?> onclick="return false;"><label for="aw3">Risiko gangguan Airway</label></span>
                        <span class="check-item"><input type="checkbox" id="aw4" <?php echo ($data['airway'] == 'distress_nafas') ? 'checked' : ''; ?> onclick="return false;"><label for="aw4">Distress nafas berat</label></span>
                    </td>
                    <td>
                        <span class="check-item"><input type="checkbox" id="aw5" <?php echo ($data['airway'] == 'paten_urgent') ? 'checked' : ''; ?> onclick="return false;"><label for="aw5">Paten</label></span>
                    </td>
                    <td>
                        <span class="check-item"><input type="checkbox" id="aw6" <?php echo ($data['airway'] == 'paten_td') ? 'checked' : ''; ?> onclick="return false;"><label for="aw6">Paten</label></span>
                        <span class="check-item"><input type="checkbox" id="aw7" <?php echo ($data['airway'] == 'aspirasi') ? 'checked' : ''; ?> onclick="return false;"><label for="aw7">Aspirasi benda asing tanpa distres nafas</label></span>
                        <span class="check-item"><input type="checkbox" id="aw8" <?php echo ($data['airway'] == 'kesulitan') ? 'checked' : ''; ?> onclick="return false;"><label for="aw8">Kesulitan menelan tanpa distres nafas</label></span>
                    </td>
                </tr>

                <tr>
                    <td class="category-cell">BREATHING</td>
                    <td>
                        <span class="check-item"><input type="checkbox" id="br1" <?php echo ($data['breathing'] == 'hentinafas') ? 'checked' : ''; ?> onclick="return false;"><label for="br1">Henti Nafas</label></span>
                        <span class="check-item"><input type="checkbox" id="br2" <?php echo ($data['breathing'] == 'RR < 10') ? 'checked' : ''; ?> onclick="return false;"><label for="br2">RR < 10</label></span>
                    </td>
                    <td>
                        <span class="check-item"><input type="checkbox" id="br3" <?php echo ($data['breathing'] == 'takipneu') ? 'checked' : ''; ?> onclick="return false;"><label for="br3">Takipneu</label></span>
                        <span class="check-item"><input type="checkbox" id="br4" <?php echo ($data['breathing'] == 'Penggunaan otot bantu nafas') ? 'checked' : ''; ?> onclick="return false;"><label for="br4">Penggunaan otot bantu nafas</label></span>
                    </td>
                    <td>
                        <span class="check-item"><input type="checkbox" id="br5" <?php echo ($data['breathing'] == 'dysneu') ? 'checked' : ''; ?> onclick="return false;"><label for="br5">Dysneu</label></span>
                    </td>
                    <td>
                        <span class="check-item"><input type="checkbox" id="br6" <?php echo ($data['breathing'] == 'Frekuensi nafas normal') ? 'checked' : ''; ?> onclick="return false;"><label for="br6">Frekuensi nafas normal</label></span>
                    </td>
                </tr>

                <tr>
                    <td class="category-cell">CYRCULATION</td>
                    <td>
                        <span class="check-item"><input type="checkbox" id="cy1" <?php echo ($data['cyrculation'] == 'hentijantung') ? 'checked' : ''; ?> onclick="return false;"><label for="cy1">Henti Jantung</label></span>
                        <span class="check-item"><input type="checkbox" id="cy2" <?php echo ($data['cyrculation'] == 'naditidaktersedia') ? 'checked' : ''; ?> onclick="return false;"><label for="cy2">Nadi tidak teraba</label></span>
                        <span class="check-item"><input type="checkbox" id="cy3" <?php echo ($data['cyrculation'] == 'TD < 80') ? 'checked' : ''; ?> onclick="return false;"><label for="cy3">TD < 80</label></span>
                        <span class="check-item"><input type="checkbox" id="cy4" <?php echo ($data['cyrculation'] == 'pendarahanaktif') ? 'checked' : ''; ?> onclick="return false;"><label for="cy4">Perdarahan aktif</label></span>
                    </td>
                    <td>
                        <span class="check-item"><input type="checkbox" id="cy5" <?php echo ($data['cyrculation'] == 'Nadi tidak teraba') ? 'checked' : ''; ?> onclick="return false;"><label for="cy5">Nadi tidak teraba / sangat halus (
                                < 50 /> 150)
                            </label></span>
                        <span class="check-item"><input type="checkbox" id="cy6" <?php echo ($data['cyrculation'] == 'hipotensi') ? 'checked' : ''; ?> onclick="return false;"><label for="cy6">Hipotensi</label></span>
                        <span class="check-item"><input type="checkbox" id="cy7" <?php echo ($data['cyrculation'] == 'Banyak kehilangan darah') ? 'checked' : ''; ?> onclick="return false;"><label for="cy7">Banyak kehilangan darah</label></span>
                    </td>
                    <td>
                        <span class="check-item"><input type="checkbox" id="cy8" <?php echo ($data['cyrculation'] == 'Hipertensi Berat') ? 'checked' : ''; ?> onclick="return false;"><label for="cy8">Hipertensi berat</label></span>
                        <span class="check-item"><input type="checkbox" id="cy9" <?php echo ($data['cyrculation'] == 'Soo2') ? 'checked' : ''; ?> onclick="return false;"><label for="cy9">Soo2: 90-95%</label></span>
                        <span class="check-item"><input type="checkbox" id="cy10" <?php echo ($data['cyrculation'] == 'tandadehidrasi') ? 'checked' : ''; ?> onclick="return false;"><label for="cy10">Tanda dehidrasi</label></span>
                        <span class="check-item"><input type="checkbox" id="cy11" <?php echo ($data['cyrculation'] == 'muntah menetap') ? 'checked' : ''; ?> onclick="return false;"><label for="cy11">Muntah menetap</label></span>
                    </td>
                    <td>
                        <span class="check-item"><input type="checkbox" id="cy12" <?php echo ($data['cyrculation'] == 'Nadi normal') ? 'checked' : ''; ?> onclick="return false;"><label for="cy12">Nadi normal</label></span>
                        <span class="check-item"><input type="checkbox" id="cy13" <?php echo ($data['cyrculation'] == 'Muntah atau diare') ? 'checked' : ''; ?> onclick="return false;"><label for="cy13">Muntah atau diare tanpa dehidrasi</label></span>
                    </td>
                </tr>

                <tr>
                    <td class="category-cell">DISABILITY</td>
                    <td>
                        <span class="check-item"><input type="checkbox" id="di1" <?php echo ($data['disability'] == 'GCS < 9') ? 'checked' : ''; ?> onclick="return false;"><label for="di1">GCS < 9</label></span>
                    </td>
                    <td>
                        <span class="check-item"><input type="checkbox" id="di2" <?php echo ($data['disability'] == 'GCS < 13') ? 'checked' : ''; ?> onclick="return false;"><label for="di2">GCS < 13</label></span>
                        <span class="check-item"><input type="checkbox" id="di3" <?php echo ($data['disability'] == 'Nyeri berat') ? 'checked' : ''; ?> onclick="return false;"><label for="di3">Nyeri Berat</label></span>
                    </td>
                    <td>
                        <span class="check-item"><input type="checkbox" id="di4" <?php echo ($data['disability'] == 'GCS 14') ? 'checked' : ''; ?> onclick="return false;"><label for="di4">GCS 14-15</label></span>
                        <span class="check-item"><input type="checkbox" id="di5" <?php echo ($data['disability'] == 'Nyeri sedang') ? 'checked' : ''; ?> onclick="return false;"><label for="di5">Nyeri sedang</label></span>
                    </td>
                    <td>
                        <span class="check-item"><input type="checkbox" id="di6" <?php echo ($data['disability'] == 'GCS normal') ? 'checked' : ''; ?> onclick="return false;"><label for="di6">GCS Normal</label></span>
                        <span class="check-item"><input type="checkbox" id="di7" <?php echo ($data['disability'] == 'Nyeri ringan') ? 'checked' : ''; ?> onclick="return false;"><label for="di7">Nyeri Ringan</label></span>
                    </td>
                </tr>

                <tr>
                    <td class="category-cell">EXPOSURE</td>
                    <td>
                        <span class="check-item"><input type="checkbox" id="ex1" <?php echo ($data['exposure'] == 'kejangberkelanjutan') ? 'checked' : ''; ?> onclick="return false;"><label for="ex1">Kejang berkelanjutan</label></span>
                        <span class="check-item"><input type="checkbox" id="ex2" <?php echo ($data['exposure'] == 'Overdosis obat dengan hipoventilasi') ? 'checked' : ''; ?> onclick="return false;"><label for="ex2">Overdosis obat dengan hipoventilasi</label></span>
                        <span class="check-item"><input type="checkbox" id="ex3" <?php echo ($data['exposure'] == 'Cidera kepala dengan pupil anisokor') ? 'checked' : ''; ?> onclick="return false;"><label for="ex3">Cidera kepala dengan pupil anisokor</label></span>
                    </td>
                    <td>
                        <span class="check-item"><input type="checkbox" id="ex4" <?php echo ($data['exposure'] == 'Nyeri dada tipikal') ? 'checked' : ''; ?> onclick="return false;"><label for="ex4">Nyeri dada tipikal</label></span>
                        <span class="check-item"><input type="checkbox" id="ex5" <?php echo ($data['exposure'] == 'Demam dengan letargi') ? 'checked' : ''; ?> onclick="return false;"><label for="ex5">Demam dengan letargi</label></span>
                        <span class="check-item"><input type="checkbox" id="ex6" <?php echo ($data['exposure'] == 'sepsis') ? 'checked' : ''; ?> onclick="return false;"><label for="ex6">Sepsis</label></span>
                        <span class="check-item"><input type="checkbox" id="ex7" <?php echo ($data['exposure'] == 'Defisit Neurologi') ? 'checked' : ''; ?> onclick="return false;"><label for="ex7">Defisit Neurologi (Stroke Akut)</label></span>
                        <span class="check-item"><input type="checkbox" id="ex8" <?php echo ($data['exposure'] == 'Mata terpecik') ? 'checked' : ''; ?> onclick="return false;"><label for="ex8">Mata terpecik zat asam / basa</label></span>
                        <span class="check-item"><input type="checkbox" id="ex9" <?php echo ($data['exposure'] == 'multiple trauma') ? 'checked' : ''; ?> onclick="return false;"><label for="ex9">Multiple Trauma</label></span>
                        <span class="check-item"><input type="checkbox" id="ex10" <?php echo ($data['exposure'] == 'Fraktur') ? 'checked' : ''; ?> onclick="return false;"><label for="ex10">Fraktur mayor</label></span>
                        <span class="check-item"><input type="checkbox" id="ex11" <?php echo ($data['exposure'] == 'tarsiotestis') ? 'checked' : ''; ?> onclick="return false;"><label for="ex11">Tarsio testis</label></span>
                        <span class="check-item"><input type="checkbox" id="ex12" <?php echo ($data['exposure'] == 'Psikiatri') ? 'checked' : ''; ?> onclick="return false;"><label for="ex12">Psikiatri : agresif, gaduh, gelisah</label></span>
                    </td>
                    <td>
                        <span class="check-item"><input type="checkbox" id="ex13" <?php echo ($data['exposure'] == 'Post kejang') ? 'checked' : ''; ?> onclick="return false;"><label for="ex13">Post Kejang</label></span>
                        <span class="check-item"><input type="checkbox" id="ex14" <?php echo ($data['exposure'] == 'krisis hipertensi') ? 'checked' : ''; ?> onclick="return false;"><label for="ex14">Krisis Hipertensi</label></span>
                        <span class="check-item"><input type="checkbox" id="ex15" <?php echo ($data['exposure'] == 'kehilangan darah sedang') ? 'checked' : ''; ?> onclick="return false;"><label for="ex15">Kehilangan darah sedang</label></span>
                        <span class="check-item"><input type="checkbox" id="ex16" <?php echo ($data['exposure'] == 'cedera kepala ringan') ? 'checked' : ''; ?> onclick="return false;"><label for="ex16">Cedera kepala ringan</label></span>
                        <span class="check-item"><input type="checkbox" id="ex17" <?php echo ($data['exposure'] == 'suspek sepsis') ? 'checked' : ''; ?> onclick="return false;"><label for="ex17">Suspek Sepsis</label></span>
                        <span class="check-item"><input type="checkbox" id="ex18" <?php echo ($data['exposure'] == 'nyeri dada non kardiak') ? 'checked' : ''; ?> onclick="return false;"><label for="ex18">Nyeri dada non kardiak</label></span>
                        <span class="check-item"><input type="checkbox" id="ex19" <?php echo ($data['exposure'] == 'Cedera ekstremitas') ? 'checked' : ''; ?> onclick="return false;"><label for="ex19">Cedera ekstremitas</label></span>
                        <span class="check-item"><input type="checkbox" id="ex20" <?php echo ($data['exposure'] == 'Psikiatri') ? 'checked' : ''; ?> onclick="return false;"><label for="ex20">Psikiatri : risiko melukai diri sendiri, psikotik akut, cemas, berpotensial agresif</label></span>
                    </td>
                    <td>
                        <span class="check-item"><input type="checkbox" id="ex21" <?php echo ($data['exposure'] == 'luka abrasi') ? 'checked' : ''; ?> onclick="return false;"><label for="ex21">Luka abrasi tidak memerlukan jahitan</label></span>
                        <span class="check-item"><input type="checkbox" id="ex22" <?php echo ($data['exposure'] == 'kontrol ulang rawat luka') ? 'checked' : ''; ?> onclick="return false;"><label for="ex22">Kontrol ulang rawat luka</label></span>
                        <span class="check-item"><input type="checkbox" id="ex23" <?php echo ($data['exposure'] == 'imunisasi') ? 'checked' : ''; ?> onclick="return false;"><label for="ex23">Imunisasi</label></span>
                        <span class="check-item"><input type="checkbox" id="ex24" <?php echo ($data['exposure'] == 'Psikiatri') ? 'checked' : ''; ?> onclick="return false;"><label for="ex24">Psikiatri : Pasien dengan gangguan kronis dan klinis baik</label></span>
                    </td>
                </tr>
            </tbody>
            <table class="form-table skala-nyeri-table">
                <tbody>
                    <tr>
                        <td colspan="5" class="header-cell">SKALA NYERI</td>
                    </tr>
                    <tr>
                        <td colspan="5" class="info-cell">
                            Skala Nyeri: <strong><?= $data['skala_nyeri'] ?></strong>
                            <img class="nyeri-img" src="<?= base_url('resources/img/happy.PNG') ?>" alt="Skala Nyeri">
                        </td>
                    </tr>
                </tbody>
            </table>

        <?php else: ?>
            <div style="text-align: center; padding: 50px; border: 1px dashed red;">
                <h2>Data Asesmen Tidak Ditemukan</h2>
                <p>Data untuk pasien ini tidak dapat ditemukan di database. Mohon periksa kembali.</p>
            </div>
        <?php endif; ?>

        <script src="<?= base_url() ?>resources/vendors/bower_components/jquery/dist/jquery.min.js"></script>
        <script>
            $(document).ready(function() {
                window.print();
            });
            window.onafterprint = function() {
                window.history.back();
            };
        </script>
</body>
</html>