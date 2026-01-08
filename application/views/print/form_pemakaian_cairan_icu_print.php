<!DOCTYPE html>
<html>
<head>
<title>Cetak Pemakaian Cairan ICU</title>

<style>
  /* ================= PAGE ================= */
  @page { size: A3 landscape; margin:12mm }

  body {
    font-family: Arial, Helvetica, sans-serif;
    font-size: 10px;
    color:#000;
  }

  h3 {
    text-align:center;
    margin:0 0 6px 0;
    font-size:14px;
  }

  /* ================= TABLE ================= */
  table {
    width:100%;
    border-collapse:collapse;
    table-layout:fixed;
  }

  th, td {
    border:1px solid #333;
    padding:2px;
    text-align:center;
    vertical-align:middle;
    height:18px;
    line-height:1.15;
    font-size:9px;              /* ⬅️ lebih kecil khusus data */
    word-break: break-word;     /* ⬅️ PENTING: angka tidak tembus */
    white-space: normal;        /* ⬅️ IZINKAN TURUN BARIS */
  }

  th {
    background:#eee;
    font-weight:bold;
    font-size:10px;
  }

  /* ================= COLUMN ================= */
  .col-jenis {
    width:130px;
    text-align:left;
    font-size:10px;
    font-weight:normal;
  }

  /* ================= SECTION ================= */
  .section-title {
    margin:10px 0 4px 0;
    font-weight:bold;
    font-size:11px;
  }

  /* ================= INFO ================= */
  .info td {
    text-align:left;
    height:16px;
    font-size:10px;
  }
</style>
</head>

<body onload="window.print()">

<h3>FORM PEMAKAIAN CAIRAN PASIEN ICU</h3>

<!-- INFO PASIEN -->
<table class="info">
<tr>
  <td width="12%">No RM</td><td width="38%"><?= $pasien['no_rm'] ?></td>
  <td width="12%">Nama</td><td width="38%"><?= $pasien['nama'] ?></td>
</tr>
<tr>
  <td>Tgl Lahir</td><td><?= $pasien['tgl_lahir'] ?? '-' ?></td>
  <td>Tgl Masuk</td><td><?= $history['tgl_masuk'] ?? '-' ?></td>
</tr>
</table>

<!-- ENTERAL -->
<div class="section-title">ENTERAL</div>
<table>
<tr>
  <th class="col-jenis">Jenis</th>
  <?php for($i=1;$i<=25;$i++): ?><th><?= $i ?></th><?php endfor; ?>
</tr>
<?php for($r=0;$r<5;$r++): ?>
<tr>
  <td class="col-jenis"><?= $enteral_jenis[$r] ?? '' ?></td>
  <?php for($c=0;$c<25;$c++): ?>
    <td><?= $enteral[$r][$c] ?? '' ?></td>
  <?php endfor; ?>
</tr>
<?php endfor; ?>
</table>

<!-- PARENTERAL -->
<div class="section-title">MASUK PARENTERAL</div>
<table>
<tr>
  <th class="col-jenis">Jenis</th>
  <?php for($i=1;$i<=25;$i++): ?><th><?= $i ?></th><?php endfor; ?>
</tr>
<?php for($r=0;$r<7;$r++): ?>
<tr>
  <td class="col-jenis"><?= $parenteral_jenis[$r] ?? '' ?></td>
  <?php for($c=0;$c<25;$c++): ?>
    <td><?= $parenteral[$r][$c] ?? '' ?></td>
  <?php endfor; ?>
</tr>
<?php endfor; ?>
<tr>
  <td class="col-jenis"><b>Total Input</b></td>
  <?php for($c=0;$c<25;$c++): ?>
    <td><?= $total_input[$c] ?? '' ?></td>
  <?php endfor; ?>
</tr>
</table>

<!-- KELUAR -->
<div class="section-title">KELUAR</div>
<table>
<tr>
  <th class="col-jenis">Jenis</th>
  <?php for($i=1;$i<=25;$i++): ?><th><?= $i ?></th><?php endfor; ?>
</tr>
<?php
$label = ['Urine','NGT','Drain','Colostomi','WSD','BAB','Total Output'];
for($r=0;$r<7;$r++):
?>
<tr>
  <td class="col-jenis"><?= $label[$r] ?></td>
  <?php for($c=0;$c<25;$c++): ?>
    <td><?= $keluar[$r][$c] ?? '' ?></td>
  <?php endfor; ?>
</tr>
<?php endfor; ?>
<tr>
  <td class="col-jenis"><b>Garing / Balance</b></td>
  <?php for($c=0;$c<25;$c++): ?>
    <td><?= $total[$c] ?? '' ?></td>
  <?php endfor; ?>
</tr>
</table>

</body>
</html>
