<?php
defined('BASEPATH') or exit('No direct script access allowed');

/* ---------- Parser yang sama dengan view form ---------- */
function _canon_map(){
  return [
    'leaflet'=>'Leaflet','brosur'=>'Leaflet',
    'booklet'=>'Booklet','buklet'=>'Booklet',
    'lembar balik'=>'Lembar Balik',
    'audiovisual'=>'Audiovisual CD/VCD','audio visual'=>'Audiovisual CD/VCD',
    'audiovisual cd vcd'=>'Audiovisual CD/VCD','audiovisual cd/vcd'=>'Audiovisual CD/VCD',
    'cd vcd'=>'Audiovisual CD/VCD','cd/vcd'=>'Audiovisual CD/VCD',
    'lisan'=>'Lisan',
    'etika batuk'=>'Etika Batuk','kebersihan tangan'=>'Kebersihan Tangan','perawatan luka'=>'Perawatan Luka',
    'memandikan bayi'=>'Memandikan Bayi','teknik menyusui'=>'Teknik Menyusui',
    'merawat tali pusat'=>'Merawat Tali Pusat','jadwal imunisasi'=>'Jadwal Imunisasi',
    'lain lain'=>'Lain-lain','lain-lain'=>'Lain-lain',
    'perawatan perineum'=>'Perawatan Perineum','perawatan payudara'=>'Perawatan Payudara',
    'syringe pump'=>'Syring Pump','syring pump'=>'Syring Pump',
    'infus pump'=>'Infus Pump','monitor ekg'=>'Monitor EKG','ekg monitor'=>'Monitor EKG',
  ];
}
function _norm_token($t){
  $t = trim((string)$t);
  if ($t==='') return '';
  $key = strtolower(preg_replace('/\s+/', ' ', str_replace(['_', '-'], ' ', $t)));
  $map = _canon_map();
  return $map[$key] ?? $t;
}
function _to_list($mixed){
  if ($mixed === null || $mixed === '') return [];
  if (is_object($mixed)) $mixed = (array)$mixed;
  if (is_array($mixed)) {
    $out = array_map('_norm_token', $mixed);
    return array_values(array_filter($out, fn($x)=>$x!==''));
  }
  if (!is_string($mixed)) return [];
  $s = trim($mixed);
  $j = json_decode($s, true);
  if (is_array($j)) {
    if (array_values($j) === $j) return _to_list($j);
    $m  = $j['materi'] ?? ($j['materi_json'] ?? null);
    $sb = $j['sub']    ?? ($j['subtopik_json'] ?? null);
    if ($m !== null || $sb !== null) return _to_list($m ?? $sb ?? []);
    foreach ($j as $v) if (is_array($v)) {
      $mm = $v['materi'] ?? ($v['materi_json'] ?? null);
      if ($mm !== null) return _to_list($mm);
    }
  }
  if (strlen($s)>=2 && $s[0]==='"' && substr($s,-1)==='"') {
    $j2 = json_decode(substr($s,1,-1), true);
    if (is_array($j2)) return _to_list($j2);
  }
  if (preg_match('/[,;|]/', $s)) {
    $parts = preg_split('/\s*[,;|]\s*/', $s);
    return _to_list($parts);
  }
  return _to_list([$s]);
}
function _known_sub($idx){
  switch((int)$idx){
    case 3: return ['Etika Batuk','Kebersihan Tangan','Perawatan Luka'];
    case 4: return ['Memandikan Bayi','Teknik Menyusui','Merawat Tali Pusat','Jadwal Imunisasi','Lain-lain'];
    case 5: return ['Perawatan Perineum','Perawatan Payudara'];
    case 6: return ['Syring Pump','Infus Pump','Monitor EKG'];
    default: return [];
  }
}
function _parse_topik_field($raw, $idx){
  if (is_object($raw)) $raw = (array)$raw;
  if (is_array($raw) && (isset($raw['materi']) || isset($raw['materi_json']) || isset($raw['sub']) || isset($raw['subtopik_json']))) {
    return [
      'materi'=> _to_list($raw['materi'] ?? $raw['materi_json'] ?? []),
      'sub'   => _to_list($raw['sub']    ?? $raw['subtopik_json'] ?? []),
    ];
  }
  $list = _to_list($raw);
  $subs = _known_sub($idx);
  if ($subs) {
    $subSel = array_values(array_intersect($list, $subs));
    $matSel = array_values(array_diff($list, $subs));
    return ['materi'=>$matSel, 'sub'=>$subSel];
  }
  return ['materi'=>$list, 'sub'=>[]];
}
function _section_safe($s){
  return [
    'materi'   => isset($s['materi']) && is_array($s['materi']) ? $s['materi'] : [],
    'sub'      => isset($s['sub']) && is_array($s['sub']) ? $s['sub'] : [],
    'penerima' => $s['penerima'] ?? '',
    'edukator' => $s['edukator'] ?? '',
    'durasi'   => $s['durasi'] ?? '',
    'evaluasi' => $s['evaluasi'] ?? '',
  ];
}
function _materi_master(){ return ['Leaflet','Booklet','Lembar Balik','Audiovisual CD/VCD','Lisan']; }
function _first_row($edukasi){
  if (empty($edukasi)) return [];
  if (is_array($edukasi)) return isset($edukasi[0]) ? (array)$edukasi[0] : $edukasi;
  if (is_object($edukasi)) return (array)$edukasi;
  return [];
}

/* --------- Build S1..S6 dari $edukasi --------- */
$row = _first_row(isset($edukasi) ? $edukasi : []);
$map = [
  'Manajemen Nyeri'                               => 1,
  'Resiko Jatuh'                                  => 2,
  'Pencegahan dan Pengendalian Infeksi'           => 3,
  'Cara Perawatan Bayi'                           => 4,
  'Edukasi Kesehatan Masa Nifas'                  => 5,
  'Penggunaan Alat Medis yang Aman dan Efektif'   => 6,
];
$E = [];
foreach ($map as $topicName => $idx) {
  $parsed = _parse_topik_field($row["topik{$idx}"] ?? null, $idx);
  $E[$topicName] = [
    'materi'   => $parsed['materi'],
    'sub'      => $parsed['sub'],
    'penerima' => $row["penerima{$idx}"] ?? '',
    'edukator' => $row["edukator{$idx}"] ?? '',
    'durasi'   => $row["durasi{$idx}"]   ?? '',
    'evaluasi' => $row["evaluasi{$idx}"] ?? '',
  ];
}
$MMASTER = _materi_master();
foreach ([3=>'Pencegahan dan Pengendalian Infeksi',4=>'Cara Perawatan Bayi',5=>'Edukasi Kesehatan Masa Nifas',6=>'Penggunaan Alat Medis yang Aman dan Efektif'] as $i=>$nm){
  $list = _to_list($row["topik{$i}"] ?? null);
  $materiInRaw = array_values(array_intersect($list, $MMASTER));
  if (!empty($materiInRaw)) {
    $E[$nm]['materi'] = array_values(array_unique(array_merge($E[$nm]['materi'], $materiInRaw)));
  }
  if (empty($E[$nm]['materi']) && !empty($E[$nm]['sub'])) {
    $defaultMateri = !empty($E['Manajemen Nyeri']['materi']) ? $E['Manajemen Nyeri']['materi'] : ['Leaflet'];
    $E[$nm]['materi'] = $defaultMateri;
  }
}
$S1 = _section_safe($E['Manajemen Nyeri'] ?? []);
$S2 = _section_safe($E['Resiko Jatuh'] ?? []);
$S3 = _section_safe($E['Pencegahan dan Pengendalian Infeksi'] ?? []);
$S4 = _section_safe($E['Cara Perawatan Bayi'] ?? []);
$S5 = _section_safe($E['Edukasi Kesehatan Masa Nifas'] ?? []);
$S6 = _section_safe($E['Penggunaan Alat Medis yang Aman dan Efektif'] ?? []);

$TOPICS = [
  1 => ['Judul'=>'Manajemen Nyeri',                               'S'=>$S1],
  2 => ['Judul'=>'Resiko Jatuh',                                  'S'=>$S2],
  3 => ['Judul'=>'Pencegahan dan Pengendalian Infeksi',           'S'=>$S3],
  4 => ['Judul'=>'Cara Perawatan Bayi',                           'S'=>$S4],
  5 => ['Judul'=>'Edukasi Kesehatan Masa Nifas',                  'S'=>$S5],
  6 => ['Judul'=>'Penggunaan Alat Medis yang Aman dan Efektif',   'S'=>$S6],
];

/* --------- Helper tampil --------- */
function _fmt_cell_materi($S){
  $sub    = is_array($S['sub'])    ? implode(', ', $S['sub'])    : '';
  $materi = is_array($S['materi']) ? implode(', ', $S['materi']) : '';
  if ($sub === '' && $materi === '') return '-';
  $buf = '';
  if ($sub !== '')    $buf .= '<div><strong>Subtopik:</strong> '.$sub.'</div>';
  if ($materi !== '') $buf .= '<div><strong>Materi/Cara:</strong> '.$materi.'</div>';
  return $buf;
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Cetak Form Edukasi UGD</title>
  <style>
    body { font-family: "Arial", sans-serif; font-size:11px; margin:0; padding:20px; color:#000; background:#fff; }
    .header { border-bottom:3px solid #1a4d8f; padding-bottom:8px; margin-bottom:20px; display:flex; align-items:center; justify-content:center; }
    .header img { width:80px; margin-right:15px; }
    .header-text { text-align:center; }
    .header-text h1 { margin:0; font-size:18px; font-weight:bold; color:#1a4d8f; }
    .header-text p { margin:2px 0; font-size:11px; }
    h2 { text-align:center; margin:12px 0 15px; font-size:15px; text-transform:uppercase; color:#1a4d8f; border-bottom:1px solid #1a4d8f; padding-bottom:5px; }
    .section-title { margin-top:15px; font-size:12px; font-weight:bold; text-decoration:underline; color:#1a4d8f; }
    table { width:100%; border-collapse:collapse; margin-top:6px; font-size:11px; }
    table, th, td { border:1px solid #555; }
    th { background:#e6f0ff; font-weight:bold; text-align:left; }
    th, td { padding:6px; vertical-align:top; }
    @page { size:A4 portrait; margin:10mm; }
    @media print { body{font-size:11px;} .no-break{page-break-inside: avoid;} }
  </style>
</head>
<body onload="window.print()">

  <div class="header">
    <img src="<?= base_url('assets/dist/img/rsbt_ihc.png') ?>" alt="Logo RS">
    <div class="header-text">
      <h1>RUMAH SAKIT BAKTI TIMAH</h1>
      <p>Jl. Bukit Baru No.1, Taman Bunga, Kec. Gerunggang, Kabupaten Bangka, Kepulauan Bangka Belitung 33131</p>
      <p>Telp: (0717) 433026</p>
    </div>
  </div>

  <h2>Formulir Edukasi UGD</h2>

  <div class="section-title">Identitas Pasien</div>
  <div class="no-break">
    <table>
      <tr>
        <th>No. RM</th>
        <td><?= isset($pasien['no_rm']) ? htmlspecialchars($pasien['no_rm']) : '-' ?></td>
        <th>Nama</th>
        <td><?= isset($pasien['nama']) ? htmlspecialchars($pasien['nama']) : '-' ?></td>
      </tr>
      <tr>
        <th>Tanggal Lahir</th>
        <td><?= isset($pasien['tgl_lahir']) ? htmlspecialchars($pasien['tgl_lahir']) : '-' ?></td>
        <th>Alamat</th>
        <td><?= isset($pasien['alamat']) ? htmlspecialchars($pasien['alamat']) : '-' ?></td>
      </tr>
    </table>
  </div>

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
        <?php foreach ($TOPICS as $i => $rowT): $S = $rowT['S']; ?>
          <tr>
            <td><?= $i ?></td>
            <td><?= htmlspecialchars($rowT['Judul']) ?></td>
            <td><?= _fmt_cell_materi($S) ?></td>
            <td><?= $S['durasi'] !== '' ? htmlspecialchars($S['durasi']) : '-' ?></td>
            <td><?= $S['penerima'] !== '' ? htmlspecialchars($S['penerima']) : '-' ?></td>
            <td><?= $S['edukator'] !== '' ? htmlspecialchars($S['edukator']) : '-' ?></td>
            <td><?= $S['evaluasi'] !== '' ? htmlspecialchars($S['evaluasi']) : '-' ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

</body>
</html>