<?php
// =========================
// Normalisasi skema baru (topik1..6 TEXT) -> ['materi'=>[], 'sub'=>[]]
// =========================
$E = [];

/* Baris pertama dari $edukasi */
function _first_row($edukasi){
  if (empty($edukasi)) return [];
  if (is_array($edukasi)) return isset($edukasi[0]) ? (array)$edukasi[0] : $edukasi;
  if (is_object($edukasi)) return (array)$edukasi;
  return [];
}

/* Pemetaan sinonim -> label resmi di view */
function _canon_map(){
  return [
    // materi
    'leaflet'=>'Leaflet','brosur'=>'Leaflet',
    'booklet'=>'Booklet','buklet'=>'Booklet',
    'lembar balik'=>'Lembar Balik',
    'audiovisual'=>'Audiovisual CD/VCD','audio visual'=>'Audiovisual CD/VCD',
    'audiovisual cd vcd'=>'Audiovisual CD/VCD','audiovisual cd/vcd'=>'Audiovisual CD/VCD',
    'cd vcd'=>'Audiovisual CD/VCD','cd/vcd'=>'Audiovisual CD/VCD',
    'lisan'=>'Lisan',
    // sub S3
    'etika batuk'=>'Etika Batuk','kebersihan tangan'=>'Kebersihan Tangan','perawatan luka'=>'Perawatan Luka',
    // sub S4
    'memandikan bayi'=>'Memandikan Bayi','teknik menyusui'=>'Teknik Menyusui',
    'merawat tali pusat'=>'Merawat Tali Pusat','jadwal imunisasi'=>'Jadwal Imunisasi',
    'lain lain'=>'Lain-lain','lain-lain'=>'Lain-lain',
    // sub S5
    'perawatan perineum'=>'Perawatan Perineum','perawatan payudara'=>'Perawatan Payudara',
    // sub S6
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

/* Daftar SUB per topik (untuk auto-split) */
function _known_sub($idx){
  switch((int)$idx){
    case 3: return ['Etika Batuk','Kebersihan Tangan','Perawatan Luka'];
    case 4: return ['Memandikan Bayi','Teknik Menyusui','Merawat Tali Pusat','Jadwal Imunisasi','Lain-lain'];
    case 5: return ['Perawatan Perineum','Perawatan Payudara'];
    case 6: return ['Syring Pump','Infus Pump','Monitor EKG'];
    default: return [];
  }
}

/* Tokenizer aman: array -> langsung; string -> JSON/CSV/single */
function _to_list($mixed){
  if ($mixed === null || $mixed === '') return [];
  if (is_object($mixed)) $mixed = (array)$mixed;
  if (is_array($mixed)) {
    $out = array_map('_norm_token', $mixed);
    return array_values(array_filter($out, fn($x)=>$x!==''));
  }
  if (!is_string($mixed)) return [];
  $s = trim($mixed);

  // JSON object/array
  $j = json_decode($s, true);
  if (is_array($j)) {
    if (array_values($j) === $j) return _to_list($j); // list
    $m  = $j['materi'] ?? ($j['materi_json'] ?? null);
    $sb = $j['sub']    ?? ($j['subtopik_json'] ?? null);
    if ($m !== null || $sb !== null) return _to_list($m ?? $sb ?? []);
    foreach ($j as $v) if (is_array($v)) { // nested
      $mm = $v['materi'] ?? ($v['materi_json'] ?? null);
      if ($mm !== null) return _to_list($mm);
    }
  }

  // double-encoded
  if (strlen($s)>=2 && $s[0]==='"' && substr($s,-1)==='"') {
    $j2 = json_decode(substr($s,1,-1), true);
    if (is_array($j2)) return _to_list($j2);
  }

  // CSV ; |
  if (preg_match('/[,;|]/', $s)) {
    $parts = preg_split('/\s*[,;|]\s*/', $s);
    return _to_list($parts);
  }

  // single token
  return _to_list([$s]);
}

/* Parser -> ['materi'=>[], 'sub'=>[]], auto-split utk S3..S6 */
function _parse_topik_field($raw, $idx){
  if (is_object($raw)) $raw = (array)$raw;

  // Bentuk object/array dengan kunci materi/sub
  if (is_array($raw) && (isset($raw['materi']) || isset($raw['materi_json']) || isset($raw['sub']) || isset($raw['subtopik_json']))) {
    return [
      'materi'=> _to_list($raw['materi'] ?? $raw['materi_json'] ?? []),
      'sub'   => _to_list($raw['sub']    ?? $raw['subtopik_json'] ?? []),
    ];
  }

  // List umum -> pecah jadi materi vs sub
  $list = _to_list($raw);
  $subs = _known_sub($idx);
  if ($subs) {
    $subSel = array_values(array_intersect($list, $subs));
    $matSel = array_values(array_diff($list, $subs));
    return ['materi'=>$matSel, 'sub'=>$subSel];
  }
  // S1-S2 (tanpa sub)
  return ['materi'=>$list, 'sub'=>[]];
}

/* Seksi aman (pastikan semua key ada) */
function _section_safe($s){
  return [
    'materi'   => isset($s['materi'])   && is_array($s['materi'])   ? $s['materi']   : [],
    'sub'      => isset($s['sub'])      && is_array($s['sub'])      ? $s['sub']      : [],
    'penerima' => isset($s['penerima']) ? (string)$s['penerima']    : '',
    'edukator' => isset($s['edukator']) ? (string)$s['edukator']    : '',
    'durasi'   => isset($s['durasi'])   ? (string)$s['durasi']      : '',
    'evaluasi' => isset($s['evaluasi']) ? (string)$s['evaluasi']    : '',
  ];
}
function _materi_master(){ return ['Leaflet','Booklet','Lembar Balik','Audiovisual CD/VCD','Lisan']; }

$row = _first_row(isset($edukasi) ? $edukasi : []);

// Peta nama topik -> index kolom
$map = [
  'Manajemen Nyeri'                               => 1,
  'Resiko Jatuh'                                  => 2,
  'Pencegahan dan Pengendalian Infeksi'           => 3,
  'Cara Perawatan Bayi'                           => 4,
  'Edukasi Kesehatan Masa Nifas'                  => 5,
  'Penggunaan Alat Medis yang Aman dan Efektif'   => 6,
];

// Parse awal
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

/* ===== Fallback materi untuk S3..S6 =====
   - Ambil materi yang terselip di topikN (jika ada)
   - Jika materi kosong tapi ada sub -> copy materi S1; kalau S1 kosong -> ['Leaflet'] */
$topicIdxMap = [
  3 => 'Pencegahan dan Pengendalian Infeksi',
  4 => 'Cara Perawatan Bayi',
  5 => 'Edukasi Kesehatan Masa Nifas',
  6 => 'Penggunaan Alat Medis yang Aman dan Efektif',
];
$MMASTER = _materi_master();

foreach ($topicIdxMap as $i => $nm) {
  $raw  = isset($row["topik{$i}"]) ? $row["topik{$i}"] : null;
  $list = _to_list($raw);

  // materi terselip di kolom yang sama
  $materiInRaw = array_values(array_intersect($list, $MMASTER));
  if (!empty($materiInRaw)) {
    $E[$nm]['materi'] = array_values(array_unique(array_merge($E[$nm]['materi'], $materiInRaw)));
  }

  // jika masih kosong tapi ada sub -> autofill
  if (empty($E[$nm]['materi']) && !empty($E[$nm]['sub'])) {
    $defaultMateri = isset($E['Manajemen Nyeri']['materi']) && is_array($E['Manajemen Nyeri']['materi']) && !empty($E['Manajemen Nyeri']['materi'])
      ? $E['Manajemen Nyeri']['materi']
      : ['Leaflet'];
    $E[$nm]['materi'] = $defaultMateri;
  }
}

/* ===== helpers yang dipakai checkbox/radio ===== */
if (!function_exists('isChecked')) {
  function isChecked($arr,$v){ return (is_array($arr) && in_array($v,$arr)) ? 'checked' : ''; }
}
if (!function_exists('isRadio')) {
  function isRadio($v,$n){ return ($v!==null && $v!=='' && $v===$n) ? 'checked' : ''; }
}
if (!function_exists('valOr')) {
  function valOr($arr,$k,$d=''){ return isset($arr[$k])?$arr[$k]:$d; }
}

/* Binding ke S1..S6 (aman) */
$S1 = _section_safe($E['Manajemen Nyeri'] ?? []);
$S2 = _section_safe($E['Resiko Jatuh'] ?? []);
$S3 = _section_safe($E['Pencegahan dan Pengendalian Infeksi'] ?? []);
$S4 = _section_safe($E['Cara Perawatan Bayi'] ?? []);
$S5 = _section_safe($E['Edukasi Kesehatan Masa Nifas'] ?? []);
$S6 = _section_safe($E['Penggunaan Alat Medis yang Aman dan Efektif'] ?? []);

/* Prefill “Lain-lain” (S4) */
$S4_known = ['Memandikan Bayi','Teknik Menyusui','Merawat Tali Pusat','Jadwal Imunisasi','Lain-lain'];
$s4_other_prefill = '';
if (!empty($S4['sub'])) {
  $diff = array_diff($S4['sub'], $S4_known);
  $s4_other_prefill = implode(', ', $diff);
}
?>

<style>
  .control-label { color:#111827; font-weight:700; }
  .topic-title{ color:#111827 !important; font-weight:700; margin-bottom:6px; }
  .subtle{ color:#111827 !important; font-size:90%; margin-bottom:6px; }
  .form-check-label, .checkbox label, .radio label{ color:#111827 !important; font-weight:500; }
  .form-check-input[type="checkbox"], .form-check-input[type="radio"]{ margin-right:6px; accent-color:#16a34a; }
  .panel.card-view{border-radius:12px}
  .section{border:1px solid #e5e7eb;border-radius:10px;padding:14px;margin:14px 0;background:#fff}
  .readonly{background:#f3f4f6!important;color:#374151!important}
  .btn-ghost{background:#eef2f7;border:1px solid #e5e7eb}
  .btn-success{background:#22c55e;border-color:#22c55e}
  .btn-success:hover{background:#16a34a;border-color:#16a34a}
  .btn-back{background:#3b82f6;border-color:#3b82f6;color:#fff!important}
  .btn-back:hover{background:#2563eb;border-color:#2563eb}
  .form-check{margin-bottom:6px}
  .btn-orange{background:#f97316;border-color:#f97316;color:#fff!important}
  .btn-orange:hover{background:#ea580c;border-color:#ea580c}
</style>

<div class="row">
  <div class="col-sm-12">
    <div class="panel panel-default card-view">
      <div class="panel-heading">
        <div class="pull-left">
          <h6 class="panel-title txt-dark">FORM EDUKASI</h6>
        </div>
        <div class="clearfix"></div>
      </div>

      <div class="panel-wrapper collapse in">
        <div class="panel-body">
          <form id="formEdukasiPend" autocomplete="off">
            <!-- HEADER -->
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="control-label" for="no_rm">NO RM:</label>
                  <input class="form-control readonly" id="no_rm" name="no_rm" type="text" value="<?php echo isset($no_rm) ? $no_rm : ''?>" readonly>

                  <!-- Wajib untuk simpan (hidden) -->
                  <input type="hidden" name="id_pelayanan" id="id_pelayanan" value="<?php echo isset($id_pelayanan) ? $id_pelayanan : ''?>">
                  <input type="hidden" name="id_staff" id="id_staff" value="<?php echo isset($id_staff) ? $id_staff : (isset($sso_user_data['id_staff']) ? $sso_user_data['id_staff'] : (isset($sso_user_data->id_staff) ? $sso_user_data->id_staff : ''))?>">
                </div>
                <div class="form-group">
                  <label class="control-label" for="nama">NAMA PASIEN:</label>
                  <input class="form-control readonly" id="nama" name="nama" type="text" value="<?php echo isset($nama) ? $nama : ''?>" readonly>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="control-label" for="tgl_lahir">TANGGAL LAHIR:</label>
                  <input class="form-control readonly" id="tgl_lahir" name="tgl_lahir" type="text" value="<?php echo isset($tgl_lahir) && $tgl_lahir ? date('d F Y', strtotime($tgl_lahir)) : ''?>" readonly>
                </div>
                <div class="form-group">
                  <label class="control-label" for="alamat">ALAMAT:</label>
                  <input class="form-control readonly" id="alamat" name="alamat" type="text" value="<?php echo isset($alamat) ? $alamat : ''?>" readonly>
                </div>
              </div>
            </div>

            <div class="row"><div class="col-md-12"><label class="control-label">TOPIK EDUKASI</label></div></div>

            <?php
              function cb($name, $value, $checked, $id){
                echo '<div class="form-check">
                  <input class="form-check-input" type="checkbox" name="'. $name .'[]" value="'. htmlspecialchars($value, ENT_QUOTES) .'" id="'. $id .'" '. $checked .'>
                  <label class="form-check-label" for="'. $id .'">'. $value .'</label>
                </div>';
              }
              function rb($name, $value, $checked, $id, $label){
                echo '<div class="form-check">
                  <input class="form-check-input" type="radio" name="'. $name .'" value="'. htmlspecialchars($value, ENT_QUOTES) .'" id="'. $id .'" '. $checked .'>
                  <label class="form-check-label" for="'. $id .'">'. $label .'</label>
                </div>';
              }
            ?>

            <!-- 1. Manajemen Nyeri -->
            <div class="section">
              <div class="row">
                <div class="col-md-8">
                  <div class="topic-title">1. Manajemen Nyeri</div>
                  <div class="subtle">Materi Edukasi dan Cara Penyampaian</div>
                  <div class="row">
                    <div class="col-sm-6">
                      <?php cb('s1_materi', 'Leaflet', isChecked($S1['materi'], 'Leaflet'), 's1_leaflet'); ?>
                      <?php cb('s1_materi', 'Booklet', isChecked($S1['materi'], 'Booklet'), 's1_booklet'); ?>
                      <?php cb('s1_materi', 'Lembar Balik', isChecked($S1['materi'], 'Lembar Balik'), 's1_lembar'); ?>
                    </div>
                    <div class="col-sm-6">
                      <?php cb('s1_materi', 'Audiovisual CD/VCD', isChecked($S1['materi'], 'Audiovisual CD/VCD'), 's1_av'); ?>
                      <?php cb('s1_materi', 'Lisan', isChecked($S1['materi'], 'Lisan'), 's1_lisan'); ?>
                    </div>
                  </div>
                  <div class="row" style="margin-top:8px">
                    <div class="col-sm-6">
                      <label class="control-label" for="s1_penerima">Pasien/Keluarga</label>
                      <input type="text" class="form-control" id="s1_penerima" name="s1_penerima" value="<?php echo htmlspecialchars($S1['penerima'], ENT_QUOTES); ?>">
                    </div>
                    <div class="col-sm-6">
                      <label class="control-label" for="s1_edukator">Edukator</label>
                      <input type="text" class="form-control" id="s1_edukator" name="s1_edukator" value="<?php echo htmlspecialchars($S1['edukator'], ENT_QUOTES); ?>">
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="control-label" for="s1_durasi">Durasi</label>
                    <input type="number" class="form-control" id="s1_durasi" name="s1_durasi" value="<?php echo htmlspecialchars($S1['durasi'], ENT_QUOTES); ?>">
                  </div>
                  <div class="form-group">
                    <label class="control-label">Evaluasi</label>
                    <?php rb('s1_evaluasi', 'Sudah Mengerti', isRadio($S1['evaluasi'], 'Sudah Mengerti'), 's1_eval1', 'Sudah Mengerti'); ?>
                    <?php rb('s1_evaluasi', 'Re-edukasi', isRadio($S1['evaluasi'], 'Re-edukasi'), 's1_eval2', 'Re-edukasi'); ?>
                  </div>
                </div>
              </div>
            </div>

            <!-- 2. Resiko Jatuh -->
            <div class="section">
              <div class="row">
                <div class="col-md-8">
                  <div class="topic-title">2. Resiko Jatuh</div>
                  <div class="subtle">Materi Edukasi dan Cara Penyampaian</div>
                  <div class="row">
                    <div class="col-sm-6">
                      <?php cb('s2_materi', 'Leaflet', isChecked($S2['materi'], 'Leaflet'), 's2_leaflet'); ?>
                      <?php cb('s2_materi', 'Booklet', isChecked($S2['materi'], 'Booklet'), 's2_booklet'); ?>
                      <?php cb('s2_materi', 'Lembar Balik', isChecked($S2['materi'], 'Lembar Balik'), 's2_lembar'); ?>
                    </div>
                    <div class="col-sm-6">
                      <?php cb('s2_materi', 'Audiovisual CD/VCD', isChecked($S2['materi'], 'Audiovisual CD/VCD'), 's2_av'); ?>
                      <?php cb('s2_materi', 'Lisan', isChecked($S2['materi'], 'Lisan'), 's2_lisan'); ?>
                    </div>
                  </div>
                  <div class="row" style="margin-top:8px">
                    <div class="col-sm-6">
                      <label class="control-label" for="s2_penerima">Pasien/Keluarga</label>
                      <input type="text" class="form-control" id="s2_penerima" name="s2_penerima" value="<?php echo htmlspecialchars($S2['penerima'], ENT_QUOTES); ?>">
                    </div>
                    <div class="col-sm-6">
                      <label class="control-label" for="s2_edukator">Edukator</label>
                      <input type="text" class="form-control" id="s2_edukator" name="s2_edukator" value="<?php echo htmlspecialchars($S2['edukator'], ENT_QUOTES); ?>">
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="control-label" for="s2_durasi">Durasi</label>
                    <input type="number" class="form-control" id="s2_durasi" name="s2_durasi" value="<?php echo htmlspecialchars($S2['durasi'], ENT_QUOTES); ?>">
                  </div>
                  <div class="form-group">
                    <label class="control-label">Evaluasi</label>
                    <?php rb('s2_evaluasi', 'Sudah Mengerti', isRadio($S2['evaluasi'], 'Sudah Mengerti'), 's2_eval1', 'Sudah Mengerti'); ?>
                    <?php rb('s2_evaluasi', 'Re-edukasi', isRadio($S2['evaluasi'], 'Re-edukasi'), 's2_eval2', 'Re-edukasi'); ?>
                  </div>
                </div>
              </div>
            </div>

            <!-- 3. PPI -->
            <div class="section">
              <div class="row">
                <div class="col-md-8">
                  <div class="topic-title">3. Pencegahan dan Pengendalian Infeksi</div>
                  <div class="subtle">Subtopik</div>
                  <div class="row" style="margin-bottom:8px">
                    <div class="col-sm-12">
                      <?php cb('s3_sub', 'Etika Batuk', isChecked($S3['sub'], 'Etika Batuk'), 's3_sub1'); ?>
                      <?php cb('s3_sub', 'Kebersihan Tangan', isChecked($S3['sub'], 'Kebersihan Tangan'), 's3_sub2'); ?>
                      <?php cb('s3_sub', 'Perawatan Luka', isChecked($S3['sub'], 'Perawatan Luka'), 's3_sub3'); ?>
                    </div>
                  </div>
                  <div class="subtle">Materi Edukasi dan Cara Penyampaian</div>
                  <div class="row">
                    <div class="col-sm-6">
                      <?php cb('s3_materi', 'Leaflet', isChecked($S3['materi'], 'Leaflet'), 's3_leaflet'); ?>
                      <?php cb('s3_materi', 'Booklet', isChecked($S3['materi'], 'Booklet'), 's3_booklet'); ?>
                      <?php cb('s3_materi', 'Lembar Balik', isChecked($S3['materi'], 'Lembar Balik'), 's3_lembar'); ?>
                    </div>
                    <div class="col-sm-6">
                      <?php cb('s3_materi', 'Audiovisual CD/VCD', isChecked($S3['materi'], 'Audiovisual CD/VCD'), 's3_av'); ?>
                      <?php cb('s3_materi', 'Lisan', isChecked($S3['materi'], 'Lisan'), 's3_lisan'); ?>
                    </div>
                  </div>
                  <div class="row" style="margin-top:8px">
                    <div class="col-sm-6">
                      <label class="control-label" for="s3_penerima">Pasien/Keluarga</label>
                      <input type="text" class="form-control" id="s3_penerima" name="s3_penerima" value="<?php echo htmlspecialchars($S3['penerima'], ENT_QUOTES); ?>">
                    </div>
                    <div class="col-sm-6">
                      <label class="control-label" for="s3_edukator">Edukator</label>
                      <input type="text" class="form-control" id="s3_edukator" name="s3_edukator" value="<?php echo htmlspecialchars($S3['edukator'], ENT_QUOTES); ?>">
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="control-label" for="s3_durasi">Durasi</label>
                    <input type="number" class="form-control" id="s3_durasi" name="s3_durasi" value="<?php echo htmlspecialchars($S3['durasi'], ENT_QUOTES); ?>">
                  </div>
                  <div class="form-group">
                    <label class="control-label">Evaluasi</label>
                    <?php rb('s3_evaluasi', 'Sudah Mengerti', isRadio($S3['evaluasi'], 'Sudah Mengerti'), 's3_eval1', 'Sudah Mengerti'); ?>
                    <?php rb('s3_evaluasi', 'Re-edukasi', isRadio($S3['evaluasi'], 'Re-edukasi'), 's3_eval2', 'Re-edukasi'); ?>
                  </div>
                </div>
              </div>
            </div>

            <!-- 4. Cara Perawatan Bayi -->
            <div class="section">
              <div class="row">
                <div class="col-md-8">
                  <div class="topic-title">4. Cara Perawatan Bayi</div>
                  <div class="subtle">Subtopik</div>
                  <div class="row" style="margin-bottom:8px">
                    <div class="col-sm-12">
                      <?php cb('s4_sub', 'Memandikan Bayi', isChecked($S4['sub'], 'Memandikan Bayi'), 's4_sub1'); ?>
                      <?php cb('s4_sub', 'Teknik Menyusui', isChecked($S4['sub'], 'Teknik Menyusui'), 's4_sub2'); ?>
                      <?php cb('s4_sub', 'Merawat Tali Pusat', isChecked($S4['sub'], 'Merawat Tali Pusat'), 's4_sub3'); ?>
                      <?php cb('s4_sub', 'Jadwal Imunisasi', isChecked($S4['sub'], 'Jadwal Imunisasi'), 's4_sub4'); ?>
                      <?php cb('s4_sub', 'Lain-lain', isChecked($S4['sub'], 'Lain-lain'), 's4_sub5'); ?>
                      <input type="text" class="form-control" name="s4_sub_lain" placeholder="Isi jika memilih Lain-lain" style="margin-top:6px" value="<?php echo htmlspecialchars($s4_other_prefill, ENT_QUOTES, 'UTF-8');?>">
                    </div>
                  </div>
                  <div class="subtle">Materi Edukasi dan Cara Penyampaian</div>
                  <div class="row">
                    <div class="col-sm-6">
                      <?php cb('s4_materi', 'Leaflet', isChecked($S4['materi'], 'Leaflet'), 's4_leaflet'); ?>
                      <?php cb('s4_materi', 'Booklet', isChecked($S4['materi'], 'Booklet'), 's4_booklet'); ?>
                      <?php cb('s4_materi', 'Lembar Balik', isChecked($S4['materi'], 'Lembar Balik'), 's4_lembar'); ?>
                    </div>
                    <div class="col-sm-6">
                      <?php cb('s4_materi', 'Audiovisual CD/VCD', isChecked($S4['materi'], 'Audiovisual CD/VCD'), 's4_av'); ?>
                      <?php cb('s4_materi', 'Lisan', isChecked($S4['materi'], 'Lisan'), 's4_lisan'); ?>
                    </div>
                  </div>
                  <div class="row" style="margin-top:8px">
                    <div class="col-sm-6">
                      <label class="control-label" for="s4_penerima">Pasien/Keluarga</label>
                      <input type="text" class="form-control" id="s4_penerima" name="s4_penerima" value="<?php echo htmlspecialchars($S4['penerima'], ENT_QUOTES); ?>">
                    </div>
                    <div class="col-sm-6">
                      <label class="control-label" for="s4_edukator">Edukator</label>
                      <input type="text" class="form-control" id="s4_edukator" name="s4_edukator" value="<?php echo htmlspecialchars($S4['edukator'], ENT_QUOTES); ?>">
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="control-label" for="s4_durasi">Durasi</label>
                    <input type="number" class="form-control" id="s4_durasi" name="s4_durasi" value="<?php echo htmlspecialchars($S4['durasi'], ENT_QUOTES); ?>">
                  </div>
                  <div class="form-group">
                    <label class="control-label">Evaluasi</label>
                    <?php rb('s4_evaluasi', 'Sudah Mengerti', isRadio($S4['evaluasi'], 'Sudah Mengerti'), 's4_eval1', 'Sudah Mengerti'); ?>
                    <?php rb('s4_evaluasi', 'Re-edukasi', isRadio($S4['evaluasi'], 'Re-edukasi'), 's4_eval2', 'Re-edukasi'); ?>
                  </div>
                </div>
              </div>
            </div>

            <!-- 5. Nifas -->
            <div class="section">
              <div class="row">
                <div class="col-md-8">
                  <div class="topic-title">5. Edukasi Kesehatan Masa Nifas</div>
                  <div class="subtle">Subtopik</div>
                  <div class="row" style="margin-bottom:8px">
                    <div class="col-sm-12">
                      <?php cb('s5_sub', 'Perawatan Perineum', isChecked($S5['sub'], 'Perawatan Perineum'), 's5_sub1'); ?>
                      <?php cb('s5_sub', 'Perawatan Payudara', isChecked($S5['sub'], 'Perawatan Payudara'), 's5_sub2'); ?>
                    </div>
                  </div>
                  <div class="subtle">Materi Edukasi dan Cara Penyampaian</div>
                  <div class="row">
                    <div class="col-sm-6">
                      <?php cb('s5_materi', 'Leaflet', isChecked($S5['materi'], 'Leaflet'), 's5_leaflet'); ?>
                      <?php cb('s5_materi', 'Booklet', isChecked($S5['materi'], 'Booklet'), 's5_booklet'); ?>
                      <?php cb('s5_materi', 'Lembar Balik', isChecked($S5['materi'], 'Lembar Balik'), 's5_lembar'); ?>
                    </div>
                    <div class="col-sm-6">
                      <?php cb('s5_materi', 'Audiovisual CD/VCD', isChecked($S5['materi'], 'Audiovisual CD/VCD'), 's5_av'); ?>
                      <?php cb('s5_materi', 'Lisan', isChecked($S5['materi'], 'Lisan'), 's5_lisan'); ?>
                    </div>
                  </div>
                  <div class="row" style="margin-top:8px">
                    <div class="col-sm-6">
                      <label class="control-label" for="s5_penerima">Pasien/Keluarga</label>
                      <input type="text" class="form-control" id="s5_penerima" name="s5_penerima" value="<?php echo htmlspecialchars($S5['penerima'], ENT_QUOTES); ?>">
                    </div>
                    <div class="col-sm-6">
                      <label class="control-label" for="s5_edukator">Edukator</label>
                      <input type="text" class="form-control" id="s5_edukator" name="s5_edukator" value="<?php echo htmlspecialchars($S5['edukator'], ENT_QUOTES); ?>">
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="control-label" for="s5_durasi">Durasi</label>
                    <input type="number" class="form-control" id="s5_durasi" name="s5_durasi" value="<?php echo htmlspecialchars($S5['durasi'], ENT_QUOTES); ?>">
                  </div>
                  <div class="form-group">
                    <label class="control-label">Evaluasi</label>
                    <?php rb('s5_evaluasi', 'Sudah Mengerti', isRadio($S5['evaluasi'], 'Sudah Mengerti'), 's5_eval1', 'Sudah Mengerti'); ?>
                    <?php rb('s5_evaluasi', 'Re-edukasi', isRadio($S5['evaluasi'], 'Re-edukasi'), 's5_eval2', 'Re-edukasi'); ?>
                  </div>
                </div>
              </div>
            </div>

            <!-- 6. Alat Medis -->
            <div class="section">
              <div class="row">
                <div class="col-md-8">
                  <div class="topic-title">6. Penggunaan Alat Medis yang Aman dan Efektif</div>
                  <div class="subtle">Subtopik</div>
                  <div class="row" style="margin-bottom:8px">
                    <div class="col-sm-12">
                      <?php cb('s6_sub', 'Syring Pump', isChecked($S6['sub'], 'Syring Pump'), 's6_sub1'); ?>
                      <?php cb('s6_sub', 'Infus Pump', isChecked($S6['sub'], 'Infus Pump'), 's6_sub2'); ?>
                      <?php cb('s6_sub', 'Monitor EKG', isChecked($S6['sub'], 'Monitor EKG'), 's6_sub3'); ?>
                    </div>
                  </div>
                  <div class="subtle">Materi Edukasi dan Cara Penyampaian</div>
                  <div class="row">
                    <div class="col-sm-6">
                      <?php cb('s6_materi', 'Leaflet', isChecked($S6['materi'], 'Leaflet'), 's6_leaflet'); ?>
                      <?php cb('s6_materi', 'Booklet', isChecked($S6['materi'], 'Booklet'), 's6_booklet'); ?>
                      <?php cb('s6_materi', 'Lembar Balik', isChecked($S6['materi'], 'Lembar Balik'), 's6_lembar'); ?>
                    </div>
                    <div class="col-sm-6">
                      <?php cb('s6_materi', 'Audiovisual CD/VCD', isChecked($S6['materi'], 'Audiovisual CD/VCD'), 's6_av'); ?>
                      <?php cb('s6_materi', 'Lisan', isChecked($S6['materi'], 'Lisan'), 's6_lisan'); ?>
                    </div>
                  </div>
                  <div class="row" style="margin-top:8px">
                    <div class="col-sm-6">
                      <label class="control-label" for="s6_penerima">Pasien/Keluarga</label>
                      <input type="text" class="form-control" id="s6_penerima" name="s6_penerima" value="<?php echo htmlspecialchars($S6['penerima'], ENT_QUOTES); ?>">
                    </div>
                    <div class="col-sm-6">
                      <label class="control-label" for="s6_edukator">Edukator</label>
                      <input type="text" class="form-control" id="s6_edukator" name="s6_edukator" value="<?php echo htmlspecialchars($S6['edukator'], ENT_QUOTES); ?>">
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="control-label" for="s6_durasi">Durasi</label>
                    <input type="number" class="form-control" id="s6_durasi" name="s6_durasi" value="<?php echo htmlspecialchars($S6['durasi'], ENT_QUOTES); ?>">
                  </div>
                  <div class="form-group">
                    <label class="control-label">Evaluasi</label>
                    <?php rb('s6_evaluasi', 'Sudah Mengerti', isRadio($S6['evaluasi'], 'Sudah Mengerti'), 's6_eval1', 'Sudah Mengerti'); ?>
                    <?php rb('s6_evaluasi', 'Re-edukasi', isRadio($S6['evaluasi'], 'Re-edukasi'), 's6_eval2', 'Re-edukasi'); ?>
                  </div>
                </div>
              </div>
            </div>

           <!-- ACTIONS -->
            <div class="row" style="margin-top:12px">
              <div class="col-md-12 text-center">
                <a class="btn btn-back btn-sm" onclick="history.back();" style="margin-right:12px">
                  <span class="btn-text">KEMBALI</span>
                </a>

                <!-- TOMBOL CETAK -->
                <a href="<?= isset($print_url) ? $print_url : '#' ?>"
                  target="_blank"
                  class="btn btn-orange btn-sm"
                  style="margin-right:12px">
                  <i class="fa fa-print"></i> CETAK
                </a>


                <button type="submit" class="btn btn-success btn-sm" id="btnSimpan">
                  <span class="btn-text">SIMPAN</span>
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>

    </div>
  </div>
</div>

<script>
$(function(){
  $('#formEdukasiPend').on('submit', function(e){
    e.preventDefault();
    var $form = $(this);

    // Validasi minimal sebelum kirim
    var no_rm = $.trim($form.find('[name=no_rm]').val());
    var id_pel = $.trim($form.find('[name=id_pelayanan]').val());
    var id_staff = $.trim($form.find('[name=id_staff]').val());
    console.log('DEBUG form payload:', {no_rm:no_rm, id_pelayanan:id_pel, id_staff:id_staff});
    if(!no_rm || !id_pel || !id_staff){
      alert('no_rm, id_pelayanan, dan id_staff wajib ada.');
      return;
    }

    var url = '<?php echo base_url('Erm_edukasi_igd/simpan_edukasi_igd')?>';
    $.ajax({
      url:url,
      method:'POST',
      data:$form.serialize(),
      dataType:'json'
    })
    .done(function(res){
      if(res && res.status==='success'){
        if (typeof swal !== 'undefined') swal('Berhasil', res.message || 'Data tersimpan', 'success');
        else alert('Data tersimpan');
      }else{
        if (typeof swal !== 'undefined') swal('Info', (res && res.message) || 'Tidak ada data yang disimpan', 'info');
        else alert('Tidak ada data yang disimpan');
        console.warn('Server response:', res);
      }
    })
    .fail(function(xhr){
      if (typeof swal !== 'undefined') swal('Gagal','Simpan gagal','warning');
      else alert('Gagal menyimpan');
      console.error('Save error:', xhr && xhr.responseText);
    });
  });
});
</script>