<!DOCTYPE html>
<html>

<head>
  <title>Cetak One Day Care & One Day Surgery</title>
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
      width: 120px; /* 🔥 Logo diperbesar */
      margin-right: 20px; /* 🔥 Jarak lebih besar ke teks */
    }

    .header-text {
      text-align: center;
    }

    .header-text h1 {
      margin: 0;
      font-size: 20px; /* 🔥 Judul lebih besar */
      font-weight: bold;
      color: #1a4d8f;
    }

    .header-text p {
      margin: 2px 0;
      font-size: 11px;
    }

    h2 {
      text-align: center;
      margin: 12px 0 15px;
      font-size: 15px;
      text-transform: uppercase;
      color: #1a4d8f;
      border-bottom: 1px solid #1a4d8f;
      padding-bottom: 5px;
    }

    .section-title {
      margin-top: 15px;
      font-size: 12px;
      font-weight: bold;
      text-decoration: underline;
      color: #1a4d8f;
    }

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

    /* SIGNATURE AREA */
    .signature {
      margin-top: 50px;
      width: 100%;
      border: none;
    }

    .signature td {
      border: none;
      font-size: 12px;
      vertical-align: top;
    }

    .signature .right {
      text-align: right;
    }

    .signature-space {
      height: 60px;
    }
  </style>
</head>

<body onload="window.print()">

  <!-- HEADER -->
  <div class="header">
    <img src="<?= base_url('assets/dist/img/logo_IHC.png') ?>" alt="Logo RS">
    <div class="header-text">
      <h1>RUMAH SAKIT BAKTI TIMAH</h1>
      <p>Jl. Bukit Baru No.1, Taman Bunga, Kec. Gerunggang, Kabupaten Bangka, Kepulauan Bangka Belitung 33131</p>
      <p>Telp: (0717) 433026</p>
    </div>
  </div>

  <h2>Formulir One Day Care & One Day Surgery</h2>

  <!-- IDENTITAS PASIEN -->
  <div class="section-title">Identitas Pasien</div>
  <div class="no-break">
    <table>
      <tr>
        <th>No. RM</th><td><?= $data->no_rm ?? '-' ?></td>
        <th>Nama</th><td><?= $data->nama ?? '-' ?></td>
      </tr>
      <tr>
        <th>Tanggal Lahir</th><td><?= $data->tgl_lahir ?? '-' ?></td>
        <th>Jenis Kelamin</th><td><?= $data->jenis_kelamin ?? '-' ?></td>
      </tr>
      <tr>
        <th>Pekerjaan</th><td><?= $data->pekerjaan ?? '-' ?></td>
        <th>Pendidikan</th><td><?= $data->pendidikan ?? '-' ?></td>
      </tr>
      <tr>
        <th>Status Perkawinan</th><td><?= $data->status ?? '-' ?></td>
        <th>Agama</th><td><?= $data->agama ?? '-' ?></td>
      </tr>
      <tr>
        <th>Alamat</th><td colspan="3"><?= $data->alamat ?? '-' ?></td>
      </tr>
      <tr>
        <th>Ruang Rawat</th><td><?= $data->jenis_pelayanan ?? '-' ?></td>
        <th>Kelas</th><td><?= $data->kelas ?? '-' ?></td>
      </tr>
      <tr>
        <th>Tanggal Masuk</th>
        <td><?= isset($data->tgl_masuk) ? date('d-m-Y', strtotime($data->tgl_masuk)) : '-' ?></td>
        <th>Jam</th>
        <td><?= isset($data->tgl_masuk) ? date('H:i', strtotime($data->tgl_masuk)) : '-' ?></td>
      </tr>
    </table>
  </div>

  <!-- PEMERIKSAAN VITALS -->
  <div class="section-title">Pemeriksaan Vitals</div>
  <div class="no-break">
    <table>
      <tr>
        <th>Tekanan Darah</th><td><?= $pemeriksaan_fisik->tekanan_darah ?? '-' ?></td>
        <th>Suhu (°C)</th><td><?= $pemeriksaan_fisik->suhu ?? '-' ?></td>
      </tr>
      <tr>
        <th>Frekuensi Nadi (x/menit)</th><td><?= $pemeriksaan_fisik->nadi ?? '-' ?></td>
        <th>Frekuensi Nafas (x/menit)</th><td><?= $pemeriksaan_fisik->pernapasan ?? '-' ?></td>
      </tr>
      <tr>
        <th>Berat Badan (Kg)</th><td><?= $pemeriksaan_fisik->berat_badan ?? '-' ?></td>
        <th>Tinggi Badan (cm)</th><td><?= $pemeriksaan_fisik->tinggi_badan ?? '-' ?></td>
      </tr>
    </table>
  </div>

  <!-- DATA ONE DAY CARE -->
  <div class="section-title">Data One Day Care</div>
  <div class="no-break">
    <table>
      <tr><th>Anamnesa</th><td><?= $data_oneday->anamnesa ?? '-' ?></td></tr>
      <tr><th>Riwayat Penyakit</th><td><?= $data_oneday->riwayat_penyakit_sebelumnya ?? '-' ?></td></tr>
      <tr><th>Pengobatan Sebelumnya</th><td><?= $data_oneday->pengobatan_sebelumnya ?? '-' ?></td></tr>
      <tr><th>Pemeriksaan Fisik</th><td><?= $data_oneday->pemeriksaan_fisik ?? '-' ?></td></tr>
      <tr><th>Hasil Laboratorium</th><td><?= $data_oneday->hasil_labor ?? '-' ?></td></tr>
      <tr><th>Therapi</th><td><?= $data_oneday->therapi ?? '-' ?></td></tr>
      <tr><th>Pemantauan</th><td><?= $data_oneday->pemantauan ?? '-' ?></td></tr>
      <tr><th>Anjuran</th><td><?= $data_oneday->anjuran ?? '-' ?></td></tr>
    </table>
  </div>

  <!-- TANDA TANGAN -->
  <table class="signature" style="width:100%; margin-top:40px;">
  <tr>
    <td style="width:50%;"></td>
    <td style="width:50%; text-align:center;">
      <p><?= date('d-m-Y') ?></p>
      <p><strong>Dokter Pemeriksa</strong></p>
      <div class="signature-space" style="height:60px;"></div>
      <p><strong><?= $nama_dokter ?? '___________' ?></strong></p>
    </td>
  </tr>
</table>


</body>
</html>
