<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Formulir Assesmen Rehabilitasi Medik - <?= htmlspecialchars($nama ?? 'Pasien', ENT_QUOTES, 'UTF-8') ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="robots" content="noindex, nofollow">

    <style>
        @page {
            size: A4;
            margin: 20mm;
        }

        body {
            font-family: "Times New Roman", serif;
            font-size: 13px;
            color: #000;
            background-color: #fff;
        }

        /* === KOP SURAT === */
        .kop-rs td {
            vertical-align: top;
            line-height: 1.3;
        }

        .kop-rs img {
            width: 110px;
        }

        .line-double {
            border-top: 3px double #000;
            margin-top: 3px;
            margin-bottom: 8px;
        }

        h3 {
            text-align: center;
            text-transform: uppercase;
            font-size: 14px;
            margin-bottom: 10px;
            margin-top: 10px;
        }

        /* === TABEL DASAR === */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 5px;
        }

        td {
            vertical-align: top;
        }

        .identitas td {
            padding: 2px 0;
        }

        /* === KOTAK UNTUK S, O, A, DAN RENCANA === */
        .box-line {
            border: 1px solid #000;
            display: block;
            margin: 5px 0 8px 0;
            min-height: 40px;
            padding: 6px 8px;
            line-height: 1.4;
            border-radius: 4px;
        }

        /* === BAGIAN JUDUL === */
        .section-title {
            font-style: italic;
            font-weight: bold;
            margin-top: 10px;
            margin-bottom: 4px;
        }

        /* === PLANNING === */
        .planning-table {
            width: 100%;
            margin-top: 5px;
            border-collapse: collapse;
        }

        .planning-table td {
            padding: 2px 0;
            vertical-align: top;
            line-height: 1.3;
        }

        .planning-table td:first-child {
            width: 3%;
        }

        .planning-table td:nth-child(2) {
            width: 32%;
        }

        .planning-table td:nth-child(3) {
            width: 65%;
        }

        .planning-table i {
            font-style: italic;
        }

        /* === TANDA TANGAN === */
        .ttd {
            margin-top: 45px;
            text-align: right;
            font-size: 13px;
            line-height: 1.4;
        }

        .ttd img {
            width: 160px;
            height: auto;
            margin-top: 5px;
            margin-bottom: 5px;
        }

        .ttd strong {
            text-decoration: underline;
        }

        @media print {
            .actions { display: none; }
            body { margin: 10mm; }
        }

        /* === TOMBOL AKSI === */
        .actions {
            text-align: center;
            margin-bottom: 15px;
        }

        .btn {
            padding: 6px 14px;
            border-radius: 4px;
            border: none;
            cursor: pointer;
            color: white;
            font-weight: 600;
            margin: 3px;
        }

        .btn-edit { background-color: #6c757d; }
        .btn-print { background-color: #1b8f55; }
        .btn-download { background-color: #007bff; }
    </style>
</head>
<body>

    <!-- Tombol aksi -->
    <div class="actions">
        <button class="btn btn-edit"
            onclick="window.location.href='<?= site_url('Assesmen_Rehab/form_edit/' 
                . urlencode($assesmen->id_pelayanan ?? '') . '/' 
                . urlencode($assesmen->id_histori ?? '') . '/POLI') ?>'">
            ✏️ Edit
        </button>
        <button class="btn btn-print" onclick="window.print()">
            🖨️ Print
        </button>
        <button class="btn btn-download"
            onclick="window.location.href='<?= site_url('Assesmen_Rehab/print_word/' . urlencode($id_histori ?? '')) ?>'">
            💾 Unduh Word
        </button>
    </div>

    <!-- === KOP SURAT === -->
    <table class="kop-rs">
        <tr>
            <td width="120px">
                <img src="<?= base_url('assets/dist/img/rsbt_ihc.png') ?>" alt="Logo RSBT">
            </td>
            <td>
                <strong style="font-size:16px;">RS. BAKTI TIMAH</strong><br>
                <span style="font-size:13px;">
                    Jalan Bukit Baru No.1, Pangkalpinang, Taman Bunga, Kec. Gerunggang<br>
                    Kabupaten Bangka, Kepulauan Bangka Belitung, Indonesia<br>
                    Telp. 0717 9100844, Fax. 0715 32165
                </span>
            </td>
        </tr>
    </table>
    <div class="line-double"></div>

    <h3>FORMULIR RAWAT JALAN KFR / ASESMEN / RE-ASESMEN / PROTOKOL TERAPI</h3>

    <!-- === IDENTITAS PASIEN === -->
    <table class="identitas">
        <tr>
            <td width="25%">Nomor Rekam Medis</td>
            <td>: <?= htmlspecialchars($no_rm ?? '................................................', ENT_QUOTES, 'UTF-8') ?></td>
        </tr>
        <tr>
            <td>Nama</td>
            <td>: <?= htmlspecialchars($nama ?? '................................................', ENT_QUOTES, 'UTF-8') ?></td>
        </tr>
        <tr>
            <td>Tanggal Lahir</td>
            <td>: <?= !empty($tgl_lahir) ? date('d-m-Y', strtotime($tgl_lahir)) : '................................................' ?></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>: <?= htmlspecialchars($alamat ?? '................................................', ENT_QUOTES, 'UTF-8') ?></td>
        </tr>
    </table>

    <!-- === S O A P === -->
    <div class="section-title"><i>Subjective</i></div>
    <div class="box-line"><?= nl2br(htmlspecialchars($assesmen->subjective ?? '', ENT_QUOTES, 'UTF-8')) ?></div>

    <div class="section-title"><i>Objective</i></div>
    <div class="box-line"><?= nl2br(htmlspecialchars($assesmen->objective ?? '', ENT_QUOTES, 'UTF-8')) ?></div>

    <div class="section-title"><i>Assessment</i></div>
    <div class="box-line"><?= nl2br(htmlspecialchars($assesmen->assessment ?? '', ENT_QUOTES, 'UTF-8')) ?></div>

    <div class="section-title"><i>Planning</i></div>
    <table class="planning-table">
        <tr>
            <td>a.</td>
            <td><i>Goal of Treatment</i></td>
            <td>: <?= htmlspecialchars($assesmen->goal_treatment ?? '...................................................................', ENT_QUOTES, 'UTF-8') ?></td>
        </tr>
        <tr>
            <td>b.</td>
            <td>Tindakan/Program Rehabilitasi Medik</td>
            <td>: <?= htmlspecialchars($assesmen->tindakan_rehab ?? '...................................................................', ENT_QUOTES, 'UTF-8') ?></td>
        </tr>
        <tr>
            <td>c.</td>
            <td>Edukasi</td>
            <td>: <?= htmlspecialchars($assesmen->edukasi ?? '...................................................................', ENT_QUOTES, 'UTF-8') ?></td>
        </tr>
        <tr>
            <td>d.</td>
            <td>Frekuensi Kunjungan</td>
            <td>: <?= htmlspecialchars($assesmen->frekuensi_kunjungan ?? '...................................................................', ENT_QUOTES, 'UTF-8') ?></td>
        </tr>
    </table>

    <!-- === RENCANA TINDAK LANJUT === -->
    <div class="section-title">Rencana Tindak Lanjut (<i>Evaluasi / Rujuk / Selesai</i>)*</div>
    <div class="box-line"><?= nl2br(htmlspecialchars($assesmen->rencana_tindak_lanjut ?? '', ENT_QUOTES, 'UTF-8')) ?></div>

    <!-- === TANDA TANGAN === -->
    <div class="ttd">
        <p>Pangkalpinang, <?= date('d-m-Y') ?></p>
        <p>Dokter Penanggung Jawab Pelayanan</p>

        <?php if (!empty($assesmen->ttd)): ?>
        <img src="<?= base_url('assets/ttd/' . htmlspecialchars($assesmen->ttd, ENT_QUOTES, 'UTF-8')) ?>" 
             alt="Tanda tangan Dokter" 
             style="width:120px;">
        <?php else: ?>
            <br><br><br><br>
        <?php endif; ?>

        <p><strong>(<?= htmlspecialchars($nama_dokter ?? '........................................', ENT_QUOTES, 'UTF-8') ?>)</strong></p>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const url = window.location.href;
            if (url.includes('/print_assesmen/')) window.print();
        });
    </script>
</body>
</html>

