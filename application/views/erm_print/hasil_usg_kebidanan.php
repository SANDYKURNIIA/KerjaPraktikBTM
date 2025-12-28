<?php
$isTA = false;
$isTV = false;

if (!empty($usg_kebidanan->jenis_pemeriksaan)) {
  $jenis = strtolower($usg_kebidanan->jenis_pemeriksaan);
  $isTA = ($jenis == 'ta' || $jenis == 'transabdominal');
  $isTV = ($jenis == 'tv' || $jenis == 'transvaginal');
}

if (!empty($usg_kebidanan->tanggal_pemeriksaan)) {
  $tanggalPemeriksaan = date('d F Y', strtotime($usg_kebidanan->tanggal_pemeriksaan));
} else {
  $tanggalPemeriksaan = '-';
}

$tanggalCetak = date('d F Y');
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <title>Hasil USG Kebidanan - <?= htmlspecialchars($usg_kebidanan->nama_pasien ?? 'Pasien', ENT_QUOTES, 'UTF-8') ?>
  </title>
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
      background: #fff;
      margin: 0;
    }

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
      font-size: 15px;
      margin: 10px 0;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 8px;
    }

    th,
    td {
      vertical-align: top;
      padding: 5px;
      font-size: 13px;
    }

    .identitas th {
      text-align: left;
      width: 28%;
    }

    .identitas td {
      width: 72%;
    }

    .box-line {
      border: 1px solid #000;
      border-radius: 4px;
      padding: 6px 8px;
      min-height: 40px;
      margin-bottom: 10px;
      line-height: 1.4;
    }

    .section-title {
      font-style: italic;
      font-weight: bold;
      margin-top: 10px;
      margin-bottom: 4px;
    }

    .ttd {
      margin-top: 40px;
      text-align: right;
      line-height: 1.4;
    }

    .ttd strong {
      text-decoration: underline;
    }

    @media print {
      .no-print {
        display: none !important;
      }

      body {
        margin: 10mm;
      }
    }

    .actions {
      text-align: center;
      margin-bottom: 15px;
    }

    .btn {
      padding: 6px 14px;
      border-radius: 4px;
      border: none;
      cursor: pointer;
      color: #fff;
      font-weight: 600;
      margin: 3px;
    }

    .btn-print {
      background-color: #1b8f55;
    }
  </style>
</head>

<body>

  <div class="actions no-print">
    <button class="btn btn-print" onclick="window.print()">🖨️ Print</button>
  </div>

  <table class="kop-rs">
    <tr>
      <td width="120px">
        <img src="<?= base_url() ?>assets/dist/img/rsbt_ihc.png" alt="Logo RSBT">
      </td>
      <td>
        <strong style="font-size:16px;">RS. BAKTI TIMAH</strong><br>
        <span style="font-size:13px;">
          Jl. Jendral Sudirman No.3 Sungailiat<br>
          Kepulauan Bangka Belitung, Indonesia<br>
          Telp. 0717 95837, Fax. 0717 93335
        </span>
      </td>
    </tr>
  </table>

  <div class="line-double"></div>
  <h3>HASIL USG KEBIDANAN</h3>

  <!-- ==== IDENTITAS PASIEN ==== -->
  <table class="identitas">
    <tr>
      <th>Nomor Rekam Medis</th>
      <td>: <?= htmlspecialchars($usg_kebidanan->no_rm ?? '-', ENT_QUOTES, 'UTF-8') ?></td>
    </tr>
    <tr>
      <th>Nama</th>
      <td>: <?= htmlspecialchars($usg_kebidanan->nama_pasien ?? '-', ENT_QUOTES, 'UTF-8') ?></td>
    </tr>
    <tr>
      <th>No. BPJS</th>
      <td>: <?= htmlspecialchars($usg_kebidanan->no_bpjs ?? '-', ENT_QUOTES, 'UTF-8') ?></td>
    </tr>
    <tr>
      <th>Usia</th>
      <td>: <?= htmlspecialchars($usg_kebidanan->usia ?? '-', ENT_QUOTES, 'UTF-8') ?></td>
    </tr>
    <tr>
      <th>Tanggal Pemeriksaan</th>
      <td>: <?= $tanggalPemeriksaan ?></td>
    </tr>
    <tr>
      <th>Dokter Pemeriksa</th>
      <td>: <?= htmlspecialchars($usg_kebidanan->dokter_pemeriksa ?? '-', ENT_QUOTES, 'UTF-8') ?></td>
    </tr>
  </table>

  <!-- ==== JENIS ==== -->
  <div class="section-title">Jenis Pemeriksaan</div>
  <div class="box-line">
    <?= ($isTA ? '✓' : '—') ?> Transabdominal<br>
    <?= ($isTV ? '✓' : '—') ?> Transvaginal
    <?php if (!$isTA && !$isTV): ?>
      <br>-
    <?php endif; ?>
  </div>

  <div class="section-title">Indikasi Pemeriksaan</div>
  <div class="box-line">
    <?= htmlspecialchars($usg_kebidanan->indikasi_pemeriksaan ?? "-", ENT_QUOTES, 'UTF-8') ?>
  </div>

  <div class="section-title">Hasil Pemeriksaan</div>
  <div class="box-line">
    <?= htmlspecialchars($usg_kebidanan->hasil_pemeriksaan ?? "-", ENT_QUOTES, 'UTF-8') ?>
  </div>

  <div class="section-title">Kesimpulan</div>
  <div class="box-line">
    <?= htmlspecialchars($usg_kebidanan->kesimpulan ?? "-", ENT_QUOTES, 'UTF-8') ?>
  </div>

  <div class="ttd">
    <p>Sungailiat, <?= htmlspecialchars($tanggalCetak, ENT_QUOTES, 'UTF-8') ?></p>

    <?php if ($usg_kebidanan->foto): ?>
      <img src="<?= base_url() . 'assets/ttd/' . $usg_kebidanan->foto ?>" width="100px;" height="100px;">
    <?php else: ?>
      <div width="100px;" height="120px;">-</div>
    <?php endif ?>

    <p>
      <strong><?= htmlspecialchars($usg_kebidanan->dokter_dpjp ?? '....................................', ENT_QUOTES, 'UTF-8') ?></strong><br>
    </p>
  </div>

  <script>
    window.print();
  </script>

</body>

</html>