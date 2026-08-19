<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Pemantauan Pelaksanaan Hemodialisis Harian</title>
<style>
    body {
        font-family: Arial, sans-serif;
        font-size: 10pt;
        line-height: 1.3;
        background: #fff;
        color: #000;
        margin: 10mm;
    }
    .container {
        width: 100%;
        max-width: 190mm;
        border: 2px solid #000;
        padding: 10px;
        margin: 0 auto;
        box-sizing: border-box;
    }
    .header {
        display: flex;
        justify-content: space-between;
        align-items: start;
        margin-bottom: 8px;
        border-bottom: 2px solid #000;
        padding-bottom: 5px;
    }
    .header img {
        width: 120px;
    }
    .header-info {
        flex: 1;
        text-align: start;
        font-size: 10pt;
    }
    .header-title {
        text-align: start;
        font-weight: bold;
        font-size: 12pt;
    }
    .section {
        border: 1px solid #000;
        padding: 5px;
        margin-bottom: 5px;
    }
    .section-title {
        font-weight: bold;
        margin-bottom: 3px;
        text-transform: uppercase;
        font-size: 9pt;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        font-size: 8.5pt;
    }
    td {
        padding: 1px 4px;
        vertical-align: top;
    }
    .two-cols {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 5px;
        margin-bottom: 3px;
    }
    .three-cols {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
        gap: 5px;
        margin-bottom: 3px;
    }
    .field-item {
        margin-bottom: 2px;
    }
    .input-line {
        border-bottom: 1px dotted #000;
        display: inline-block;
        min-width: 100px;
        padding: 0 3px;
    }
    @media print {
        @page {
            size: A4;
            margin: 10mm;
        }
        body {
            margin: 10mm;
        }
        .container {
            border: 2px solid #000;
        }
    }
</style>
</head>
<body onload="window.print()">
<div class="container">

    <!-- HEADER -->
    <div class="header">
        <img src="<?= base_url('assets/dist/img/rsbt_ihc.png') ?>" alt="Logo RS">
        <div class="header-info">
            <div><b>RS. Bakti Timah</b></div>
            <div>Jalan Bukit Baru No. 1, Pangkalpinang, Taman Bunga, Kec. Gerunggang</div>
            <div>Kabupaten Bangka, Kepulauan Bangka Belitung</div>
            <div>Telp. 0717 9100844, Fax. 0715 32165</div>
        </div>
        <div class="header-title">
            PEMANTAUAN PELAKSANAAN <br> HEMODIALISIS HARIAN
        </div>
    </div>

    <!-- DATA PASIEN -->
    <div class="section">
        <div class="section-title">Data Pasien</div>
        <table>
            <tr>
                <td>No. RM</td>
                <td>: <?= $pasien->no_rm ?? "-" ?></td>
                <td>Hari/Tanggal</td>
                <td>: <?= $tanggal ?? date('l, d-m-Y') ?></td>
            </tr>
            <tr>
                <td>Nama Pasien</td>
                <td>: <?= $pasien->nama ?? "-" ?></td>
                <td>Pukul</td>
                <td>: <?= $jam ?? date('H:i') ?> WIB</td>
            </tr>
            <tr>
                <td>Tanggal Lahir</td>
                <td>: <?= $tgl_lahir ?? "-" ?></td>
                <td>Jenis Kelamin</td>
                <td>: <?= $pasien->jenis_kelamin ?? "-" ?></td>
            </tr>
        </table>
    </div>

    <!-- GELANG IDENTITAS -->
    <div class="section">
        <div class="section-title">Gelang Identitas Pasien</div>
        <div class="field-item"><?= $pemantauan->gelang_identitas_status ?? "-" ?>
            <?= !empty($pemantauan->gelang_identitas_alasan) ? "(Alasan: ".$pemantauan->gelang_identitas_alasan.")" : "" ?>
        </div>
    </div>

    <!-- RIWAYAT ALERGI -->
    <div class="section">
        <div class="section-title">Riwayat Alergi</div>
        <div class="field-item"><?= $pemantauan->alergi_status ?? "-" ?>
            <?= !empty($pemantauan->alergi_keterangan) ? "(Keterangan: ".$pemantauan->alergi_keterangan.")" : "" ?>
        </div>
        <div class="field-item">Gelang Alergi: <?= $pemantauan->gelang_alergi_status ?? "-" ?>
            <?= !empty($pemantauan->gelang_alergi_alasan) ? "(Alasan: ".$pemantauan->gelang_alergi_alasan.")" : "" ?>
        </div>
    </div>

    <!-- AKSES VASKULER -->
    <div class="section">
        <div class="section-title">Akses Vaskuler</div>
        <div class="field-item">Jenis: <?= $pemantauan->akses_jenis ?? "-" ?></div>
        <div class="two-cols">
            <div class="field-item">Lokasi: <?= $pemantauan->akses_lokasi ?? "-" ?></div>
            <div class="field-item">Kondisi: <?= $pemantauan->akses_kondisi ?? "-" ?></div>
        </div>
        <div class="two-cols">
            <div class="field-item">Tanda Infeksi: <?= $pemantauan->akses_infeksi ?? "-" ?></div>
            <div class="field-item">Aneurisma: <?= $pemantauan->akses_aneurisma ?? "-" ?></div>
        </div>
        <div class="two-cols">
            <div class="field-item">Thrill (AV Fistula): <?= $pemantauan->akses_thrill ?? "-" ?></div>
            <div class="field-item">Bruit (AV Fistula): <?= $pemantauan->akses_bruit ?? "-" ?></div>
        </div>
        <div class="field-item">Lain-lain: <?= $pemantauan->akses_lain ?? "-" ?></div>
        <div class="three-cols">
            <div class="field-item">Ukuran Lumen Arteri: <?= $pemantauan->lumen_arteri_cm ?? "-" ?> cm</div>
            <div class="field-item">Ukuran Lumen Vena: <?= $pemantauan->lumen_vena_cm ?? "-" ?> cm</div>
            <div class="field-item">Panjang DL Arteri/Vena: <?= $pemantauan->panjang_dl_arteri_cc ?? "-" ?> / <?= $pemantauan->panjang_dl_vena_cc ?? "-" ?> cc</div>
        </div>
        <div class="three-cols">
            <div class="field-item">Antibiotic Lock Arteri: <?= $pemantauan->antibiotic_lock_arteri_cc ?? "-" ?> cc</div>
            <div class="field-item">Antibiotic Lock Vena: <?= $pemantauan->antibiotic_lock_vena_cc ?? "-" ?> cc</div>
        </div>
    </div>

    <!-- MESIN HD & DIALISAT -->
    <div class="section">
        <div class="section-title">Mesin HD & Dialisat</div>
        <div class="two-cols">
            <div class="field-item">Mesin HD: <?= $pemantauan->mesin_hd ?? "-" ?> (No: <?= $pemantauan->mesin_no ?? "-" ?>)</div>
            <div class="field-item">Dialisat: <?= $pemantauan->dialisat_ca ?? "-" ?> (Suhu: <?= $pemantauan->dialisat_suhu ?? "-" ?> °C)</div>
        </div>
    </div>

    <!-- DIALISER & BB KERING -->
    <div class="section">
        <div class="section-title">Dialiser & BB Kering</div>
        <div class="two-cols">
            <div class="field-item">Dialiser Model: <?= $pemantauan->dialiser_model ?? "-" ?> (<?= $pemantauan->dialiser_flux ?? "-" ?>, <?= $pemantauan->dialiser_kondisi ?? "-" ?>)</div>
            <div class="field-item">BB Kering: <?= $pemantauan->bb_kering_kg ?? "-" ?> kg</div>
        </div>
    </div>

    <!-- RESEP HD -->
    <div class="section">
        <div class="section-title">Resep HD</div>
        <div class="three-cols">
            <div class="field-item">Lama HD: <?= $pemantauan->lama_hd_jam ?? "-" ?> Jam</div>
            <div class="field-item">Blood Flow Rate: <?= $pemantauan->blood_flow_rate_ml_menit ?? "-" ?> mL/menit</div>
            <div class="field-item">Ultrafiltration Goal: <?= $pemantauan->ufg ?? "-" ?></div>
        </div>
        <div class="field-item">Heparin: <?= $pemantauan->heparin_jenis ?? "-" ?> (Total: <?= $pemantauan->heparin_total ?? "-" ?> IU, Bolus: <?= $pemantauan->heparin_bolus ?? "-" ?> IU, Kontinyu: <?= $pemantauan->heparin_kontinyu ?? "-" ?> IU)</div>
    </div>

    <!-- LAIN-LAIN -->
    <div class="section">
        <div class="section-title">Lain-lain</div>
        <div class="field-item"><?= $pemantauan->lain_lain_1 ?? "-" ?></div>
        <div class="field-item"><?= $pemantauan->lain_lain_2 ?? "-" ?></div>
    </div>

    <!-- PERUBAHAN OBAT RUTIN -->
    <div class="section">
        <div class="section-title">Perubahan Obat Rutin</div>
        <div class="field-item"><?= $pemantauan->perubahan_obat ?? "-" ?></div>
    </div>

    <!-- TANDA TANGAN -->
    <div style="margin-top: 10px; text-align: right;">
        <div style="display: inline-block; text-align: center; min-width: 200px;">
            <div>Pangkalpinang, <?= date('d-m-Y') ?></div>
            <div style="font-weight: bold; margin-top: 3px;">Dokter Penanggung Jawab</div>
            <div style="height: 50px;">
                <img src="<?= base_url('assets/ttd/' . $dokter->foto) ?>" alt="">
            </div>
            <div style="font-weight: bold; border-bottom: 1px solid #000; display: inline-block; min-width: 180px; padding-bottom: 2px;">
                <?= $dokter->nama ?? "(...........................)" ?>
            </div>
        </div>
    </div>

</div>

<script>
    window.print();
</script>
</body>
</html>