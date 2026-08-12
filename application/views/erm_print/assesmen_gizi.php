<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8">
<title>Cetak Formulir Asuhan Gizi</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
  body{ font-family: Arial, Helvetica, sans-serif; font-size:11px; margin:0; padding:12mm; color:#000; background:#fff; }
  h2{ text-align:center; margin:10px 0 12px; font-size:15px; text-transform:uppercase; color:#1a4d8f; border-bottom:1px solid #1a4d8f; padding-bottom:5px; }
  .section-title{ margin-top:12px; font-size:12px; font-weight:bold; color:#1a4d8f; text-decoration:underline; }
  .header{ border-bottom:3px solid #1a4d8f; padding-bottom:6px; margin-bottom:12px; display:flex; align-items:center; justify-content:center; }
  .header img{ width:100px; margin-right:50px; }
  .header-text{ text-align:center; }
  .header-text h1{ margin:0; font-size:18px; font-weight:bold; color:#1a4d8f; }
  .header-text p{ margin:2px 0; font-size:11px; }
  table{ width:100%; border-collapse:collapse; margin-top:6px; }
  table, th, td{ border:1px solid #555; }
  th{ background:#e6f0ff; font-weight:bold; text-align:left; }
  th, td{ padding:6px; vertical-align:top; }
  .half td{ width:50%; }
  .label{ width:28%; background:#f6f9ff; font-weight:bold; }
  .pre{ white-space:pre-wrap; word-break:break-word; }
  .sign-wrap{ margin-top:24px; display:flex; justify-content:space-between; }
  .sign{ width:45%; text-align:center; }
  .sign .space{ height:60px; }
  @page{ size:A4 portrait; margin:10mm; }
</style>
</head>
<body onload="window.print()">

<?php
  // helper
  $esc = function($x){ return html_escape($x ?? '-'); };
  $pre = function($x){ return nl2br(html_escape($x ?? '')); };
  $ya  = function($v){ return ($v==='ya'?'Ya':($v==='tidak'?'Tidak':'-')); };

  // Normalisasi IMT bila kosong & bb/tb ada
  if (empty($imt) && !empty($bb) && !empty($tb)) {
    $bbn = floatval(str_replace(',', '.', $bb));
    $tbn = floatval(str_replace(',', '.', $tb));
    if ($bbn>0 && $tbn>0) {
      $m = ($tbn>10)? $tbn/100 : $tbn;
      $imt = number_format($bbn/($m*$m), 2, '.', '');
    }
  }
?>

<!-- HEADER -->
<div class="header">
  <img src="<?= base_url('resources/img/logo_ihc.png') ?>" alt="Logo RS">
  <div class="header-text">
    <h1>RUMAH SAKIT BAKTI TIMAH</h1>
    <p>Jl. Bukit Baru No.1, Taman Bunga, Kec. Gerunggang, Kabupaten Bangka, Kep. Bangka Belitung 33131</p>
    <p>Telp: (0717) 433026</p>
  </div>
</div>

<h2>Formulir Asuhan Gizi</h2>

<!-- IDENTITAS -->
<div class="section-title">Identitas Pasien</div>
<table>
  <tr><th class="label">No. RM</th><td><?= $esc($no_rm) ?></td></tr>
  <tr><th class="label">Nama</th><td><?= $esc($nama) ?></td></tr>
  <tr><th class="label">Jenis Kelamin</th><td><?= $esc($jenis_kelamin) ?></td></tr>
  <tr><th class="label">Tanggal Lahir</th><td><?= $esc($tgl_lahir) ?></td></tr>
  <tr><th class="label">Tanggal Pengkajian</th><td><?= $esc($tgl_pengkajian ?? '') ?></td></tr>
  <tr><th class="label">Tanggal Masuk Dirawat</th><td><?= $esc($tgl_masuk_dirawat) ?></td></tr>
  <tr><th class="label">Ruang / Kelas</th><td><?= $esc(($ruang ?? '')).' / '.$esc(($kelas ?? '')) ?></td></tr>
  <tr><th class="label">Dokter Yang Merawat</th><td><?= $esc($dokter_merawat) ?></td></tr>
  <tr><th class="label">Diagnosa Medis</th><td class="pre"><?= $pre($diagnosa_medis ?? '') ?></td></tr>
</table>

<!-- ASESSMEN GIZI -->
<div class="section-title">Asesmen Gizi</div>

<table class="half">
  <tr><th>BB (kg)</th><td><?= $esc($bb ?? '') ?></td></tr>
  <tr><th>TB (cm)</th><td><?= $esc($tb ?? '') ?></td></tr>
  <tr><th>IMT (kg/m²)</th><td><?= $esc($imt ?? '') ?></td></tr>
  <tr><th>Status Gizi</th><td class="pre"><?= $pre($status_gizi ?? '') ?></td></tr>
</table>

<table class="half" style="margin-top:6px;">
  <tr><th>Perubahan BB</th><td><?= isset($perubahan_bb)?($perubahan_bb==='ada'?'Ada':'Tidak ada'):'-' ?></td></tr>
  <tr><th>Keterangan Perubahan BB</th><td class="pre"><?= $pre($ket_perubahan_bb ?? '') ?></td></tr>
  <tr><th>LLA</th><td><?= $esc($lla ?? '') ?></td></tr>
  <tr><th>Tinggi Lutut</th><td><?= $esc($tinggi_lutut ?? '') ?></td></tr>
</table>

<table style="margin-top:6px;">
  <tr><th>Biokimia</th></tr>
  <tr><td class="pre"><?= $pre($biokimia ?? '') ?></td></tr>
</table>

<table class="half" style="margin-top:6px;">
  <tr><th>Tensi</th><td><?= $esc($tensi ?? '') ?> mmHg</td></tr>
  <tr><th>Nadi</th><td><?= $esc($nadi ?? '') ?> x/menit</td></tr>
  <tr><th>Respirasi</th><td><?= $esc($respirasi ?? '') ?> x/menit</td></tr>
  <tr><th>Suhu</th><td><?= $esc($suhu ?? '') ?> °C</td></tr>
</table>

<table class="half" style="margin-top:6px;">
  <tr><th>Adiposa</th><td class="pre"><?= $pre($adiposa ?? '') ?></td></tr>
  <tr><th>Edema</th><td><?= $ya($edema ?? null) ?></td></tr>
  <tr><th>Gangguan Menelan</th><td><?= $ya($gangguan_menelan ?? null) ?></td></tr>
  <tr><th>Gangguan Mengunyah</th><td><?= $ya($gangguan_mengunyah ?? null) ?></td></tr>
</table>

<!-- RIWAYAT GIZI -->
<div class="section-title">Riwayat Gizi</div>
<table class="half">
  <tr><th>Pola Makan</th><td><?= $esc($pola_makan ?? '') ?></td></tr>
  <tr><th>Makan Utama</th><td><?= $esc($makan_utama ?? '') ?> x/hari</td></tr>
  <tr><th>Makan Selingan</th><td><?= $esc($makan_selingan ?? '') ?> x/hari</td></tr>
</table>

<table style="margin-top:6px;">
  <thead>
    <tr>
      <th>Makanan Pokok</th>
      <th>Lauk Hewani</th>
      <th>Lauk Nabati</th>
      <th>Sayur</th>
      <th>Buah</th>
      <th>Snack</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><?= $esc($makanan_pokok ?? '') ?></td>
      <td><?= $esc($lauk_hewani ?? '') ?></td>
      <td><?= $esc($lauk_nabati ?? '') ?></td>
      <td><?= $esc($sayur ?? '') ?></td>
      <td><?= $esc($buah ?? '') ?></td>
      <td><?= $esc($snack ?? '') ?></td>
    </tr>
  </tbody>
</table>

<table style="margin-top:6px;">
  <thead>
    <tr>
      <th>Energi</th>
      <th>Karbohidrat</th>
      <th>Protein</th>
      <th>Lemak</th>
      <th>Lainnya</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><?= $esc($azg_energi ?? '') ?></td>
      <td><?= $esc($azg_karbo ?? '') ?></td>
      <td><?= $esc($azg_protein ?? '') ?></td>
      <td><?= $esc($azg_lemak ?? '') ?></td>
      <td><?= $esc($azg_lainnya ?? '') ?></td>
    </tr>
  </tbody>
</table>

<table class="half" style="margin-top:6px;">
  <tr><th>Pengetahuan Gizi</th><td><?= $esc($pengetahuan_gizi ?? '') ?></td></tr>
  <tr><th>Kepatuhan Diet</th><td><?= $esc($kepatuhan_diet ?? '') ?></td></tr>
  <tr><th>Akses &amp; Suplai Makanan</th><td><?= $esc($akses_suplai_makanan ?? '') ?></td></tr>
  <tr><th>Fungsi Fisik</th><td><?= $esc($fungsi_fisik ?? '') ?></td></tr>
</table>

<table style="margin-top:6px;">
  <tr><th>Aktifitas Fisik</th></tr>
  <tr><td><?= $esc($aktifitas_fisik ?? '') ?></td></tr>
</table>

<table style="margin-top:6px;">
  <tr><th>Olahraga</th></tr>
  <tr><td class="pre"><?= $pre($olahraga ?? '') ?></td></tr>
</table>

<!-- RIWAYAT KLIEN -->
<div class="section-title">Riwayat Klien</div>
<table class="half">
  <tr><th>Pendidikan</th><td class="pre"><?= $pre($rk_pendidikan ?? '') ?></td></tr>
  <tr><th>Pekerjaan</th><td class="pre"><?= $pre($rk_pekerjaan ?? '') ?></td></tr>
  <tr><th>Riwayat Penyakit Dahulu</th><td class="pre"><?= $pre($rk_riwayat_dahulu ?? '') ?></td></tr>
</table>

<table class="half" style="margin-top:6px;">
  <tr><th>Riwayat Penyakit Keluarga</th><td class="pre"><?= $pre($rk_riwayat_keluarga ?? '') ?></td></tr>
  <tr><th>Penggunaan Rokok</th><td class="pre"><?= $pre($rk_rokok ?? '') ?></td></tr>
  <tr><th>Tingkat Stres Sehari-hari</th><td class="pre"><?= $pre($rk_stres ?? '') ?></td></tr>
</table>

<!-- DIAGNOSIS GIZI -->
<div class="section-title">Diagnosis Gizi</div>
<table>
  <tr><th>Diagnosis Utama</th></tr>
  <tr><td class="pre"><?= $pre($dg_utama ?? '') ?></td></tr>
</table>
<table style="margin-top:6px;">
  <tr><th>Etiologi / Penyebab</th></tr>
  <tr><td class="pre"><?= $pre($dg_etiologi ?? '') ?></td></tr>
</table>
<table style="margin-top:6px;">
  <tr><th>Tanda &amp; Gejala</th></tr>
  <tr><td class="pre"><?= $pre($dg_tanda ?? '') ?></td></tr>
</table>

<!-- INTERVENSI GIZI -->
<div class="section-title">Intervensi Gizi</div>
<table class="half">
  <tr><th>Tujuan Intervensi</th><td class="pre"><?= $pre($iv_tujuan ?? '') ?></td></tr>
  <tr><th>Jenis Diet</th><td class="pre"><?= $pre($iv_jenis_diet ?? '') ?></td></tr>
  <tr><th>Edukasi - Jenis</th><td class="pre"><?= $pre($iv_edukasi_jenis ?? '') ?></td></tr>
  <tr><th>Edukasi - Jumlah</th><td class="pre"><?= $pre($iv_edukasi_jumlah ?? '') ?></td></tr>
  <tr><th>Edukasi - Jadwal</th><td class="pre"><?= $pre($iv_edukasi_jadwal ?? '') ?></td></tr>
  <tr><th>Edukasi - Motivasi</th><td class="pre"><?= $pre($iv_edukasi_motivasi ?? '') ?></td></tr>
</table>

<table class="half" style="margin-top:6px;">
  <tr><th>Bentuk Makanan</th><td><?= $esc($iv_bentuk_makanan ?? '') ?></td></tr>
  <tr><th>Cara Pemberian</th><td><?= $esc($iv_cara_pemberian ?? '') ?></td></tr>
</table>

<!-- MONEV -->
<div class="section-title">Monitoring & Evaluasi</div>
<table class="half">
  <tr><th>Rencana Monev</th><td class="pre"><?= $pre($iv_monev_rencana ?? '') ?></td></tr>
  <tr><th>Hasil Monev</th><td class="pre"><?= $pre($iv_monev_hasil ?? '') ?></td></tr>
</table>

<div class="sign-wrap">
  <div class="sign">
    <div>Tanggal: <?= date('d/m/Y') ?></div>
    <div class="space"></div>
    <div>( __________________________ )</div>
    <div>Petugas Gizi</div>
  </div>
  <div class="sign">
    <div>&nbsp;</div>
    <div class="space"></div>
    <div>( __________________________ )</div>
    <div>Pasien/Keluarga</div>
  </div>
</div>

<script>window.addEventListener('afterprint', function(){ window.close(); });</script>
</body>
</html>