<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <title>Hasil USG Kebidanan</title>
  <style>
    :root { --blue:#1a4d8f; --border:#4b5563; }
    *{box-sizing:border-box}
    body{font-family:Arial,Helvetica,sans-serif;font-size:11px;margin:0;padding:16px;color:#000;background:#fff}
    .topbar{border-top:4px solid var(--blue);border-bottom:4px solid var(--blue);padding:8px 0 10px;margin:0 0 16px}
    .brand{display:flex;align-items:center;gap:12px;justify-content:center}
    .brand img{width:120px;display:block;} /* Ukuran logo diperbesar di sini */
    .brand h1{margin:0;font-size:18px;color:var(--blue)}
    .brand p{margin:2px 0;font-size:11px}
    h2{margin:8px 0 12px;text-align:center;color:var(--blue)}
    table{width:100%;border-collapse:collapse;font-size:11px;table-layout:fixed}
    table,th,td{border:1px solid var(--border)}
    th{background:#e6f0ff;text-align:left}
    th,td{padding:6px;vertical-align:top}
    .section-title{font-weight:bold;margin:12px 0 6px;color:var(--blue);text-decoration:underline}
    .box{border:1px solid var(--border);min-height:54px;padding:8px}
    .muted{color:#6b7280}
    .right{text-align:right}
    @page{size:A4 portrait;margin:10mm}
    @media print{ body{font-size:11px} .no-print{display:none!important} }
  </style>
</head>
<body onload="window.print()">
<?php
  // ---------- Helper kecil ----------
  $e = function($v){ return htmlentities((string)$v, ENT_QUOTES, 'UTF-8'); };

  // ---------- Ambil data dari controller ----------
  // $row diteruskan sebagai object
  $no_rm   = isset($row->no_rm) ? $row->no_rm : '-';
  $nama    = isset($row->nama_pasien) ? $row->nama_pasien : '-';
  $bpjs    = isset($row->no_bpjs) ? $row->no_bpjs : '-';
  $usia    = isset($row->usia) ? $row->usia : '-';
  $tgl     = isset($row->tanggal_pemeriksaan) ? substr($row->tanggal_pemeriksaan, 0, 10) : '-';
  $dokter  = isset($row->dokter_pemeriksa) ? $row->dokter_pemeriksa : '-';
  $jenis   = strtolower((string)($row->jenis_pemeriksaan ?? ''));
  $isTA    = (stripos($jenis, 'transabdominal') !== false);
  $isTV    = (stripos($jenis, 'transvaginal')   !== false);
  $indikasi= $row->indikasi_pemeriksaan ?? '';
  $hasil   = $row->hasil_pemeriksaan    ?? '';
  $kes     = $row->kesimpulan           ?? '';

  // ---------- Sumber logo ----------
  // 1) jika controller mengirim $logo_url, pakai itu
  // 2) kalau tidak, coba cari di beberapa lokasi (prioritas resources/img/logo_ihc.png)
  if (!empty($logo_url)) {
      $logo_src = $logo_url;
  } else {
      $candidates = [
          'resources/img/logo_ihc.png',     // lokasi yang kamu pakai sekarang
          'assets/dist/img/ihc.png',
          'assets/img/ihc.png',
          'public/assets/dist/img/ihc.png',
      ];
      $logo_src = '';
      foreach ($candidates as $rel) {
          if (defined('FCPATH') && is_file(FCPATH.$rel)) { $logo_src = base_url($rel); break; }
      }
      // Jika dicek dari CLI/unit test tanpa FCPATH, tetap tampilkan path utama
      if ($logo_src === '') $logo_src = base_url('resources/img/logo_ihc.png');
  }
?>
  <!-- HEADER -->
  <div class="topbar">
    <div class="brand">
      <img src="<?= $e($logo_src) ?>" alt="Logo IHC"> <!-- Ukuran logo diperbesar di sini -->
      <div style="text-align:center">
        <h1>RUMAH SAKIT BAKTI TIMAH</h1>
        <p>Jl. Bukit Baru No.1, Taman Bunga, Kec. Gerunggang, Kabupaten Bangka, Kep. Bangka Belitung 33131</p>
        <p>Telp: (0717) 433026</p>
      </div>
    </div>
  </div>

  <h2>HASIL USG KEBIDANAN</h2>

  <!-- IDENTITAS -->
  <div class="section-title">Identitas Pasien</div>
  <table>
    <tr>
      <th style="width:18%">No. RM</th><td style="width:32%"><?= $e($no_rm) ?></td>
      <th style="width:18%">Nama</th><td style="width:32%"><?= $e($nama) ?></td>
    </tr>
    <tr>
      <th>No. BPJS</th><td><?= $e($bpjs) ?></td>
      <th>Usia</th><td><?= $e($usia) ?></td>
    </tr>
    <tr>
      <th>Tanggal Pemeriksaan</th><td><?= $e($tgl) ?></td>
      <th>Dokter Pemeriksa</th><td><?= $e($dokter) ?></td>
    </tr>
  </table>

  <!-- JENIS PEMERIKSAAN -->
  <div class="section-title">Jenis Pemeriksaan</div>
  <div class="box">
    <div><?= $isTA ? '✓' : '—' ?> Transabdominal</div>
    <div><?= $isTV ? '✓' : '—' ?> Transvaginal</div>
    <?php if (!$isTA && !$isTV): ?>
      <div class="muted">-</div>
    <?php endif; ?>
  </div>

  <!-- INDIKASI -->
  <div class="section-title">Indikasi Pemeriksaan</div>
  <div class="box">
    <?= $indikasi !== '' ? nl2br($e($indikasi)) : '<span class="muted">-</span>' ?>
  </div>

  <!-- HASIL -->
  <div class="section-title">Hasil Pemeriksaan</div>
  <div class="box">
    <?= $hasil !== '' ? nl2br($e($hasil)) : '<span class="muted">-</span>' ?>
  </div>

  <!-- KESIMPULAN -->
  <div class="section-title">Kesimpulan</div>
  <div class="box">
    <?= $kes !== '' ? nl2br($e($kes)) : '<span class="muted">-</span>' ?>
  </div>

  <!-- TTD -->
  <div style="margin-top:28px" class="right">
    Pangkalpinang, <?= date('d/m/Y') ?><br><br><br>
    <strong><?= $e($dokter) ?></strong><br>
    <span class="muted">Dokter Pemeriksa</span>
  </div>

</body>
</html>