<!DOCTYPE html>
<html>

<head>
  <title>Cetak Form Edukasi UGD</title>
  <style>
    body {
      font-family: "Arial", sans-serif;
      font-size: 11px;
      margin: 0;
      padding: 20px;
      color: #000;
      background: #fff;
    }

    /* HEADER */
    .header {
      border-bottom: 3px solid #1a4d8f;
      padding-bottom: 8px;
      margin-bottom: 20px;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .header img {
      width: 80px;
      margin-right: 15px;
    }

    .header-text {
      text-align: center;
    }

    .header-text h1 {
      margin: 0;
      font-size: 18px;
      font-weight: bold;
      color: #1a4d8f;
    }

    .header-text p {
      margin: 2px 0;
      font-size: 11px;
    }

    /* JUDUL FORM */
    h2 {
      text-align: center;
      margin: 12px 0 15px;
      font-size: 15px;
      text-transform: uppercase;
      color: #1a4d8f;
      border-bottom: 1px solid #1a4d8f;
      padding-bottom: 5px;
    }

    /* SECTION TITLE */
    .section-title {
      margin-top: 15px;
      font-size: 12px;
      font-weight: bold;
      text-decoration: underline;
      color: #1a4d8f;
    }

    /* TABEL DATA */
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 6px;
      font-size: 11px;
    }

    table, th, td {
      border: 1px solid #555;
    }

    th {
      background: #e6f0ff;
      font-weight: bold;
      text-align: left;
    }

    th, td {
      padding: 6px;
      vertical-align: top;
    }

    @page {
      size: A4 portrait;
      margin: 10mm;
    }

    @media print {
      body {
        font-size: 11px;
      }
      .no-break {
        page-break-inside: avoid;
      }
    }

    .signature-container {
      margin-top: 50px;
      width: 100%;
      text-align: right;
    }

    .signature-block {
      display: inline-block;
      text-align: center;
    }

    .signature-space {
      height: 60px;
    }
  </style>
</head>

<body onload="window.print()">

  <!-- HEADER -->
  <div class="header">
    <img src="<?= base_url('assets/dist/img/rsbt_ihc.png') ?>" alt="Logo RS">
    <div class="header-text">
      <h1>RUMAH SAKIT BAKTI TIMAH</h1>
      <p>Jl. Bukit Baru No.1, Taman Bunga, Kec. Gerunggang, Kabupaten Bangka, Kepulauan Bangka Belitung 33131</p>
      <p>Telp: (0717) 433026</p>
    </div>
  </div>

  <h2>Formulir Edukasi UGD</h2>

  <!-- IDENTITAS PASIEN -->
  <div class="section-title">Identitas Pasien</div>
  <div class="no-break">
    <table>
      <tr>
        <th>No. RM</th>
        <td><?= $pasien['no_rm'] ?? '-' ?></td>
        <th>Nama</th>
        <td><?= $pasien['nama'] ?? '-' ?></td>
      </tr>
      <tr>
        <th>Tanggal Lahir</th>
        <td><?= $pasien['tgl_lahir'] ?? '-' ?></td>
        <th>Alamat</th>
        <td><?= $pasien['alamat'] ?? '-' ?></td>
      </tr>
    </table>
  </div>

  <!-- DATA EDUKASI -->
  <div class="section-title">Data Edukasi</div>
  <div class="no-break">
    <table>
      <thead>
        <tr>
          <th width="5%">No</th>
          <th>Topik</th>
          <th>Materi & Cara Penyampaian</th>
          <th>Durasi (menit)</th>
          <th>Pasien/Keluarga</th>
          <th>Edukator</th>
          <th>Evaluasi</th>
        </tr>
      </thead>
      <tbody>
        <?php 
        $topik_list = [
          1 => 'Manfaat obat-obat yang diberikan',
          2 => 'Efek samping obat-obat yang diberikan',
          3 => 'Interaksi obat dan makan',
          4 => 'Program diet dan nutrisi'
        ];
        foreach ($topik_list as $i => $topik): ?>
        <tr>
          <td><?= $i ?></td>
          <td><?= $topik ?></td>
          <td><?= $edukasi["materi_penyampaian$i"] ?? '-' ?></td>
          <td><?= $edukasi["durasi$i"] ?? '-' ?></td>
          <td><?= $edukasi["pasien_keluarga$i"] ?? '-' ?></td>
          <td><?= $edukasi["edukator$i"] ?? '-' ?></td>
          <td><?= $edukasi["evaluasi$i"] ?? '-' ?></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>


</body>
</html>