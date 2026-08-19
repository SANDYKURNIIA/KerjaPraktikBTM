<?php
$id_mcu   = isset($id_mcu) ? $id_mcu : '';
$data_mcu = isset($data_mcu) && is_array($data_mcu) ? $data_mcu : [];
$quiz     = isset($quiz) && is_array($quiz) ? $quiz : [];

/* helper kecil untuk umur kalau getAge tidak ada */
if (!function_exists('___age_from_ymd')) {
  function ___age_from_ymd($ymd){
    try{
      $b = new DateTime($ymd);
      $n = new DateTime('today');
      return $b->diff($n)->y.' th';
    }catch(Exception $e){ return ''; }
  }
}

/* Ambil nilai prefill dari $quiz */
function __val($field, $quiz){
  if (!is_array($quiz) || empty($quiz)) return '';
  $v = $quiz[$field] ?? '';
  $v = strtolower(trim((string)$v));
  return in_array($v, ['ya','tidak','tidak_tahu'], true) ? $v : '';
}

/* Generator baris radio dengan prefill */
function rg($name, $label, $quiz){
  $v = __val($name, $quiz);
  $id = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
  $ya   = ($v === 'ya') ? 'checked' : '';
  $tdk  = ($v === 'tidak') ? 'checked' : '';
  $tt   = ($v === 'tidak_tahu') ? 'checked' : '';
  echo '<tr>
    <td class="text-left">'.$label.' <span class="text-danger">*</span></td>
    <td class="text-center"><input type="radio" name="'.$id.'" value="ya" '.$ya.' required></td>
    <td class="text-center"><input type="radio" name="'.$id.'" value="tidak" '.$tdk.'></td>
    <td class="text-center"><input type="radio" name="'.$id.'" value="tidak_tahu" '.$tt.'></td>
  </tr>';
}

/* URL tombol cetak */
$__id_mcu_print = $id_mcu ?: ($data_mcu['id_mcu'] ?? '');
$__url_cetak    = base_url('ResikoLingkungan/cetak/'.rawurlencode($__id_mcu_print));
$__has_quiz     = !empty($quiz);
?>

<style>
  .title { font-weight:700; color:#111827; margin:10px 0 8px; }
  h6.txt-dark, .title { color:#111827 !important; }
  .table-risk th, .table-risk td { vertical-align:middle !important; padding:15px; text-align:center; color:#111827; }
  .table-risk input[type="radio"]{ width:20px; height:20px; }
  .table-risk th{ font-weight:600; color:#111827; }
  .table-risk td{ font-weight:500; color:#111827; }
  .btn-success{ background-color:#38A169; border-color:#38A169; padding:10px 15px; font-size:16px; border-radius:5px; transition:background-color .3s ease; }
  .btn-success:hover{ background-color:#2F855A; border-color:#2F855A; }
  .box{ border:1px solid #e5e7eb; border-radius:10px; padding:20px; margin:20px 0; background:#fff; box-shadow:0 4px 12px rgba(0,0,0,.1); }
  .form-control{ border-radius:8px; padding:10px; font-size:16px; }
  .form-group label{ font-weight:600; color:#111827; }
  .help-block{ color:red; font-size:12px; }
  .control-label{ color:#111827; font-weight:600; }
</style>

<!-- ========== BIODATA PASIEN ========== -->
<div class="box">
  <h6 class="txt-dark capitalize-font pl-20">
    <i class="icon-notebook mr-10"></i>BIODATA PASIEN
  </h6>
  <hr width="95%">

  <div class="row">
    <input type="hidden" id="id_mcu_form" name="id_mcu" value="<?= htmlspecialchars($id_mcu ?: ($data_mcu['id_mcu'] ?? ''), ENT_QUOTES) ?>" />

    <div class="col-md-12">
      <div class="form-group">
        <label class="control-label col-md-3">NAMA</label>
        <label class="control-label col-md-1">:</label>
        <div class="col-md-6 has-success">
          <input type="text" class="form-control" id="innama" name="innama" disabled
                 value="<?= htmlspecialchars($data_mcu['nama_pasien'] ?? '', ENT_QUOTES) ?>">
          <span class="help-block"></span>
        </div>
      </div>
    </div>

    <div class="col-md-12">
      <div class="form-group">
        <label class="control-label col-md-3">UMUR</label>
        <label class="control-label col-md-1">:</label>
        <div class="col-md-6 has-success">
          <input type="text" class="form-control" id="inumur" name="inumur" disabled
                 value="<?php
                   if (function_exists('getAge')) {
                     $time = strtotime($data_mcu['tgl_lahir'] ?? '');
                     echo getAge(strftime(' %d %B %Y ', $time ?: time()));
                   } else {
                     echo ___age_from_ymd($data_mcu['tgl_lahir'] ?? '');
                   }
                 ?>">
          <span class="help-block"></span>
        </div>
      </div>
    </div>

    <div class="col-md-12">
      <div class="form-group">
        <label class="control-label col-md-3">PEKERJAAN</label>
        <label class="control-label col-md-1">:</label>
        <div class="col-md-6 has-success">
          <input type="text" class="form-control" id="inpekerjaan" name="inpekerjaan" disabled
                 value="<?= htmlspecialchars($data_mcu['occupation'] ?? '', ENT_QUOTES) ?>">
          <span class="help-block"></span>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- ========== FORM RISIKO LINGKUNGAN ========== -->
<div class="box">
  <div class="title">Risiko Lingkungan Pekerjaan</div>

  <form id="formResikoLingkungan" autocomplete="off">
    <input type="hidden" name="id_mcu" value="<?= htmlspecialchars($id_mcu ?: ($data_mcu['id_mcu'] ?? ''), ENT_QUOTES) ?>">

    <!-- FAKTOR FISIK -->
    <div class="title">Faktor Fisik</div>
    <div class="table-responsive">
      <table class="table table-bordered table-risk">
        <thead>
          <tr>
            <th style="width:70%">Item</th>
            <th class="text-center" style="width:10%">Ya</th>
            <th class="text-center" style="width:10%">Tidak</th>
            <th class="text-center" style="width:10%">Tidak Tahu</th>
          </tr>
        </thead>
        <tbody>
          <?php
            rg('r_kebisingan', 'Kebisingan (tidak nyaman / > 85 dB)', $quiz);
            rg('r_suhu_panas', 'Suhu Panas (tidak nyaman / > 30° C)', $quiz);
            rg('r_suhu_dingin', 'Suhu Dingin (tidak nyaman / < 20° C)', $quiz);
            rg('r_radiasi_non_pengion', 'Radiasi Non-Pengion', $quiz);
            rg('r_radiasi_pengion', 'Radiasi Pengion', $quiz);
            rg('r_getaran_lokal', 'Getaran Lokal', $quiz);
            rg('r_getaran_seluruh_tubuh', 'Getaran Seluruh Tubuh', $quiz);
            rg('r_tekanan_udara_tinggi', 'Tekanan Udara Tinggi', $quiz);
            rg('r_tekanan_udara_rendah', 'Tekanan Udara Rendah', $quiz);
          ?>
        </tbody>
      </table>
    </div>

    <!-- FAKTOR KIMIA -->
    <div class="title">Faktor Kimia</div>
    <div class="table-responsive">
      <table class="table table-bordered table-risk">
        <thead>
          <tr>
            <th>Item</th><th class="text-center">Ya</th><th class="text-center">Tidak</th><th class="text-center">Tidak Tahu</th>
          </tr>
        </thead>
        <tbody>
          <?php
            rg('r_debu_anorganik', 'Debu Anorganik (Silika, Batubara, dll)', $quiz);
            rg('r_debu_organik', 'Debu Organik (Kapas, Tepung, Tekstil, dll)', $quiz);
            rg('r_pelarut_organik', 'Pelarut Organik (Benzene, Toluene, Xylene, dll)', $quiz);
            rg('r_logam_berat', 'Logam Berat (Timbal, Merkuri, dll)', $quiz);
            rg('r_bahan_iritan', 'Bahan Iritan (Amonia, Asam Sulfat, dll)', $quiz);
            rg('r_pestisida', 'Pestisida', $quiz);
            rg('r_uap_logam', 'Uap Logam', $quiz);
          ?>
        </tbody>
      </table>
    </div>

    <!-- FAKTOR BIOLOGI -->
    <div class="title">Faktor Biologi</div>
    <div class="table-responsive">
      <table class="table table-bordered table-risk">
        <thead>
          <tr>
            <th>Item</th><th class="text-center">Ya</th><th class="text-center">Tidak</th><th class="text-center">Tidak Tahu</th>
          </tr>
        </thead>
        <tbody>
          <?php
            rg('r_bakteri_virus_jamur_parasit', 'Bakteri / Virus / Jamur / Parasit', $quiz);
            rg('r_darah_cairan_tubuh', 'Darah / Cairan Tubuh', $quiz);
            rg('r_kotoran_hewan_manusia', 'Kotoran Hewan / Manusia', $quiz);
            rg('r_serangga', 'Serangga', $quiz);
          ?>
        </tbody>
      </table>
    </div>

    <!-- FAKTOR ERGONOMI -->
    <div class="title">Faktor Ergonomi</div>
    <div class="table-responsive">
      <table class="table table-bordered table-risk">
        <thead>
          <tr>
            <th>Item</th><th class="text-center">Ya</th><th class="text-center">Tidak</th><th class="text-center">Tidak Tahu</th>
          </tr>
        </thead>
        <tbody>
          <?php
            rg('r_angkat_angkut_berat', 'Angkat Angkut Berat', $quiz);
            rg('r_gerakan_berulang_tangan', 'Gerakan Berulang Pada Tangan', $quiz);
            rg('r_duduk_lama', 'Duduk Lama > 4 jam terus-menerus', $quiz);
            rg('r_berdiri_lama', 'Berdiri Lama > 4 jam terus-menerus', $quiz);
            rg('r_posisi_tidak_ergonomis', 'Posisi Tubuh Tidak Ergonomis', $quiz);
            rg('r_pencahayaan_tidak_sesuai', 'Pencahayaan Tidak Sesuai', $quiz);
            rg('r_monitor_4jam', 'Bekerja Dengan Monitor ≥ 4 Jam Dalam Sehari', $quiz);
            rg('r_bekerja_ketinggian', 'Bekerja di Ketinggian', $quiz);
          ?>
        </tbody>
      </table>
    </div>

    <!-- FAKTOR PSIKOSOSIAL -->
    <div class="title">Faktor Psikososial</div>
    <div class="table-responsive">
      <table class="table table-bordered table-risk">
        <thead>
          <tr>
            <th>Item</th><th class="text-center">Ya</th><th class="text-center">Tidak</th><th class="text-center">Tidak Tahu</th>
          </tr>
        </thead>
        <tbody>
          <?php
            rg('r_kerja_gilir', 'Kerja Gilir', $quiz);
            rg('r_beban_kerja_berlebihan', 'Beban Kerja Berlebihan', $quiz);
            rg('r_waktu_kerja_panjang', 'Waktu Kerja Panjang', $quiz);
            rg('r_konflik_rekan_kerja', 'Konflik Dengan Rekan Kerja', $quiz);
            rg('r_hambatan_jenjang_karir', 'Hambatan Jenjang Karir', $quiz);
            rg('r_ketidakjelasan_tugas', 'Ketidakjelasan Tugas', $quiz);
          ?>
        </tbody>
      </table>
    </div>

    <!-- Tombol aksi -->
    <div class="text-center" style="margin-top:12px">
      <div style="display:inline-flex; gap:10px; align-items:center;">
        <button type="submit" class="btn btn-success btn-sm">SIMPAN</button>
        <a id="btnCetakBottom"
           href="<?= $__url_cetak ?>"
           target="_blank" rel="noopener"
           class="btn btn-success btn-sm"
           style="<?= $__has_quiz ? '' : 'display:none;' ?>">
          <i class="fa fa-print"></i> CETAK
        </a>
      </div>
    </div>
  </form>
</div>

<script>
$(function(){
  $('#formResikoLingkungan').on('submit', function(e){
    e.preventDefault();
    var $f = $(this);
    $.ajax({
      url: '<?= base_url('ResikoLingkungan/simpan') ?>',
      method: 'POST',
      data: $f.serialize(),
      dataType: 'json'
    })
    .done(function(res){
      if(res && res.status === 'success'){
        if (typeof swal !== 'undefined') swal('Berhasil', 'Data tersimpan', 'success');
        else alert('Data tersimpan');

        // tampilkan tombol CETAK di samping SIMPAN setelah simpan sukses
        $('#btnCetakBottom').show();
      } else {
        var msg = (res && res.message) ? res.message : 'Gagal menyimpan';
        if (typeof swal !== 'undefined') swal('Info', msg, 'warning');
        else alert(msg);
        console.warn('Server response:', res);
      }
    })
    .fail(function(xhr){
      if (typeof swal !== 'undefined') swal('Gagal','Terjadi kesalahan server','error');
      else alert('Terjadi kesalahan server');
      console.error('XHR:', xhr && xhr.responseText);
    });
  });
});
</script>