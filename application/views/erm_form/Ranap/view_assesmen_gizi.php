<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<?php
  // Controller mengirim $data; kita extract agar variabel siap dipakai di value/checked
  if (isset($data) && is_array($data)) extract($data);

  // Fallback header pasien (biar nggak notice)
  $id_pelayanan      = $id_pelayanan      ?? '';
  $id_histori        = $id_histori        ?? '';
  $no_rm             = $no_rm             ?? '-';
  $nama              = $nama              ?? '-';
  $jenis_kelamin     = $jenis_kelamin     ?? '-';
  $tgl_lahir         = $tgl_lahir         ?? '-';
  $tgl_masuk_dirawat = $tgl_masuk_dirawat ?? '-';
  $dokter_merawat    = $dokter_merawat    ?? '-';
  $dokter_merawat_id = $dokter_merawat_id ?? '';

  // Fallback isian form (semua kolom yang ada di tabel gizi)
  $tgl_pengkajian        = $tgl_pengkajian        ?? '';
  $diagnosa_medis        = $diagnosa_medis        ?? '';

  $bb                    = isset($bb) ? $bb : '';
  $tb                    = isset($tb) ? $tb : '';
  $imt                   = isset($imt) ? $imt : '';
  $status_gizi           = $status_gizi           ?? '';
  $perubahan_bb          = $perubahan_bb          ?? '';
  $ket_perubahan_bb      = $ket_perubahan_bb      ?? '';
  $lla                   = isset($lla) ? $lla : '';
  $tinggi_lutut          = isset($tinggi_lutut) ? $tinggi_lutut : '';

  $biokimia              = $biokimia              ?? '';
  $tensi                 = $tensi                 ?? '';
  $nadi                  = $nadi                  ?? '';
  $respirasi             = $respirasi             ?? '';
  $suhu                  = $suhu                  ?? '';

  $adiposa               = $adiposa               ?? '';
  $edema                 = $edema                 ?? '';
  $gangguan_menelan      = $gangguan_menelan      ?? '';
  $gangguan_mengunyah    = $gangguan_mengunyah    ?? '';

  $pola_makan            = $pola_makan            ?? '';
  $makan_utama           = $makan_utama           ?? '';
  $makan_selingan        = $makan_selingan        ?? '';
  $makanan_pokok         = $makanan_pokok         ?? '';
  $lauk_hewani           = $lauk_hewani           ?? '';
  $lauk_nabati           = $lauk_nabati           ?? '';
  $sayur                 = $sayur                 ?? '';
  $buah                  = $buah                  ?? '';
  $snack                 = $snack                 ?? '';

  $azg_energi            = $azg_energi            ?? '';
  $azg_karbo             = $azg_karbo             ?? '';
  $azg_protein           = $azg_protein           ?? '';
  $azg_lemak             = $azg_lemak             ?? '';
  $azg_lainnya           = $azg_lainnya           ?? '';

  $pengetahuan_gizi      = $pengetahuan_gizi      ?? '';
  $kepatuhan_diet        = $kepatuhan_diet        ?? '';
  $akses_suplai_makanan  = $akses_suplai_makanan  ?? '';
  $fungsi_fisik          = $fungsi_fisik          ?? '';
  $aktifitas_fisik       = $aktifitas_fisik       ?? '';
  $olahraga              = $olahraga              ?? '';

  $rk_pendidikan         = $rk_pendidikan         ?? '';
  $rk_pekerjaan          = $rk_pekerjaan          ?? '';
  $rk_riwayat_dahulu     = $rk_riwayat_dahulu     ?? '';
  $rk_riwayat_keluarga   = $rk_riwayat_keluarga   ?? '';
  $rk_rokok              = $rk_rokok              ?? '';
  $rk_stres              = $rk_stres              ?? '';

  $dg_utama              = $dg_utama              ?? '';
  $dg_etiologi           = $dg_etiologi           ?? '';
  $dg_tanda              = $dg_tanda              ?? '';

  $iv_tujuan             = $iv_tujuan             ?? '';
  $iv_jenis_diet         = $iv_jenis_diet         ?? '';
  $iv_bentuk_makanan     = $iv_bentuk_makanan     ?? '';
  $iv_cara_pemberian     = $iv_cara_pemberian     ?? '';
  $iv_edukasi_jenis      = $iv_edukasi_jenis      ?? '';
  $iv_edukasi_jumlah     = $iv_edukasi_jumlah     ?? '';
  $iv_edukasi_jadwal     = $iv_edukasi_jadwal     ?? '';
  $iv_edukasi_motivasi   = $iv_edukasi_motivasi   ?? '';
  $iv_monev_rencana      = $iv_monev_rencana      ?? '';
  $iv_monev_hasil        = $iv_monev_hasil        ?? '';

  // header tampil saja (tidak disimpan ke tabel gizi):
  $ruang = $ruang ?? '';
  $kelas = $kelas ?? '';

  $print_action = base_url('Erm_assesmen_gizi/print_view'
    .(($id_pelayanan && $id_histori) ? "/{$id_pelayanan}/{$id_histori}" : ''));
?>

<style>
  :root{ --green:#28a745; --green-soft:rgba(40,167,69,.15); --diag-h:110px; }
  html,body{height:100%}
  .page-shell{background:#eff2f1;min-height:100vh;padding-bottom:30px}
  .page-container{padding:20px}
  .card-view{background:#fff;border:1px solid #e6ecef;border-radius:4px;box-shadow:0 2px 6px rgba(0,0,0,.04)}
  .form-row{margin-bottom:16px}
  .form-row-tight{margin-bottom:6px}
  .form-group>label{display:block;font-weight:400;color:#000;margin-bottom:4px}
  .form-wrap label{color:#000!important}
  .keterangan-block .form-group{margin-bottom:8px}
  .keterangan-block .form-group>label{margin-bottom:2px}
  .form-control,textarea.form-control,select.form-control{border:1.5px solid var(--green)!important;box-shadow:none!important;background:#fff;color:#2c3e50}
  .form-control:focus,textarea.form-control:focus,select.form-control:focus{outline:0;border-color:var(--green)!important;box-shadow:0 0 0 2px var(--green-soft)!important}
  .form-control[disabled],.form-control[readonly]{background:#f5fff8;color:#2c3e50;cursor:not-allowed;border-color:var(--green)!important;-webkit-text-fill-color:#2c3e50}
  .input-group{width:100%}
  .input-group .form-control{border-right:0!important}
  .input-group-addon{background:#fff;border:1.5px solid var(--green)!important;border-left:0!important;min-width:56px;text-align:center}
  input[type=radio],input[type=checkbox]{accent-color:var(--green)}
  .section-title{font-weight:600;color:#000;font-size:14px;margin:6px 0 12px;text-transform:uppercase;letter-spacing:.2px}
  .subsection-title{font-weight:700;color:#000;font-size:14px;margin:6px 0 4px;text-transform:uppercase;letter-spacing:.2px}
  .asupan-title{font-size:13px;font-weight:600;color:#000;margin:0 0 6px}
  #dg_utama,#iv_tujuan,#iv_jenis_diet,#iv_monev_rencana,#iv_monev_hasil{height:var(--diag-h);min-height:var(--diag-h);width:100%;resize:vertical}
  .iv-left>label,.iv-left .asupan-title{display:block;color:#000!important;margin:6px 0 4px}
  .radio-grid-4 .rg-head{color:#000;font-weight:400;line-height:1.25;margin-bottom:6px;min-height:38px;display:flex;align-items:flex-end}
  .radio-grid-4 .radio-list{display:flex;flex-direction:column;gap:6px}
  .radio-grid-4 .radio-list label{display:flex;align-items:center;gap:8px;margin:0;font-weight:400}
  .radio-stack{display:flex;flex-direction:column;gap:6px}
  .radio-stack label{display:flex;align-items:center;gap:8px;margin:0}
  .penampilan-radios label.radio-inline,.pencernaan-radios label.radio-inline,.azg-col .azg-options label{color:#000!important}
  @page{size:A4;margin:12mm}
  @media print{
    .no-print,.panel-heading,.btn{display:none!important}
    .page-container{padding:0!important}
    .card-view{border:none!important;box-shadow:none!important}
    .form-control,.form-control[disabled],.form-control[readonly],.input-group-addon{
      -webkit-print-color-adjust:exact;print-color-adjust:exact;background:#fff!important;color:#000!important;border:1px solid #000!important;box-shadow:none!important
    }
  }
</style>

<div class="page-shell">
  <div class="page-container">
    <div class="panel panel-default card-view">
      <div class="panel-heading">
        <h6 class="section-title">FORMULIR ASUHAN GIZI</h6>
      </div>

      <div class="panel-body">
        <div class="form-wrap">
          <form id="form-asesmen-gizi" method="post" action="<?= base_url('Erm_assesmen_gizi/save'); ?>">

            <!-- Hidden wajib -->
            <input type="hidden" name="id_pelayanan" value="<?= html_escape($id_pelayanan) ?>">
            <input type="hidden" name="id_histori"   value="<?= html_escape($id_histori) ?>">
            <input type="hidden" name="no_rm"        value="<?= html_escape($no_rm) ?>">
            <input type="hidden" name="dokter_merawat_id" value="<?= html_escape($dokter_merawat_id) ?>">

            <!-- ROW 1 Header Pasien -->
            <div class="row form-row">
              <div class="form-group col-md-4">
                <label>No. RM :</label>
                <input type="text" id="no_rm_show" class="form-control" value="<?= html_escape($no_rm) ?>" disabled>
              </div>
              <div class="form-group col-md-4">
                <label>Nama Pasien :</label>
                <input type="text" id="nama" class="form-control" value="<?= html_escape($nama) ?>" disabled>
              </div>
              <div class="form-group col-md-4">
                <label>Tanggal Lahir :</label>
                <input type="text" id="tgl_lahir" class="form-control" value="<?= html_escape($tgl_lahir) ?>" disabled>
              </div>
            </div>

            <!-- ROW 2 Header Pasien -->
            <div class="row form-row">
              <div class="form-group col-md-4">
                <label>Jenis Kelamin :</label>
                <input type="text" id="jenis_kelamin" class="form-control" value="<?= html_escape($jenis_kelamin) ?>" disabled>
              </div>
              <div class="form-group col-md-4">
                <label>Tanggal Pengkajian :</label>
                <input type="date" id="tgl_pengkajian" name="tgl_pengkajian" class="form-control" value="<?= html_escape($tgl_pengkajian) ?>">
              </div>
              <div class="form-group col-md-4">
                <label>Tanggal Masuk Dirawat :</label>
                <input type="text" id="tgl_masuk_dirawat" class="form-control" value="<?= html_escape($tgl_masuk_dirawat) ?>" disabled>
              </div>
            </div>

            <!-- ROW 3 Header Pasien -->
            <div class="row form-row">
              <div class="form-group col-md-4">
                <label>Ruang :</label>
                <input type="text" id="ruang" name="ruang" class="form-control" value="<?= html_escape($ruang) ?>" disabled>

                <label style="margin-top:10px;">Diagnosa Medis :</label>
                <textarea id="diagnosa_medis" name="diagnosa_medis" class="form-control" rows="3"><?= html_escape($diagnosa_medis) ?></textarea>
              </div>

              <div class="form-group col-md-4">
                <label>Kelas :</label>
                <input type="text" id="kelas" name="kelas" class="form-control" value="<?= html_escape($kelas) ?>" disabled>
              </div>

              <div class="form-group col-md-4">
                <label>Dokter Yang Merawat :</label>
                <input type="text" id="dokter_merawat" name="dokter_merawat" class="form-control" value="<?= html_escape($dokter_merawat) ?>" disabled>
              </div>
            </div>

            <!-- ASESSMEN GIZI -->
            <div class="section-title">ASESSMEN GIZI</div>

            <!-- ANTROPOMETRI -->
            <div class="subsection-title">ANTROPOMETRI</div>
            <div class="row form-row">
              <div class="form-group col-md-3">
                <label>BB :</label>
                <div class="input-group">
                  <input type="text" id="bb" name="bb" class="form-control" inputmode="decimal" value="<?= html_escape($bb) ?>" placeholder="Berat badan (Contoh: 58.5)">
                  <span class="input-group-addon">kg</span>
                </div>
              </div>
              <div class="form-group col-md-3">
                <label>TB :</label>
                <div class="input-group">
                  <input type="text" id="tb" name="tb" class="form-control" inputmode="decimal" value="<?= html_escape($tb) ?>" placeholder="Tinggi badan (Contoh: 165)">
                  <span class="input-group-addon">cm</span>
                </div>
              </div>
              <div class="form-group col-md-3">
                <label>IMT :</label>
                <div class="input-group">
                  <input type="text" id="imt" name="imt" class="form-control" value="<?= html_escape($imt) ?>" placeholder="Otomatis" readonly>
                  <span class="input-group-addon">kg/m²</span>
                </div>
              </div>
              <div class="form-group col-md-4">
                <label>Status Gizi :</label>
                <textarea class="form-control" id="status_gizi" name="status_gizi" rows="3"><?= html_escape($status_gizi) ?></textarea>
              </div>
            </div>

            <!-- PERUBAHAN BB -->
            <div class="subsection-title">PERUBAHAN BB</div>
            <div class="row form-row">
              <div class="form-group col-md-6">
                <label>Perubahan BB :</label>
                <div class="radio-stack">
                  <label><input type="radio" name="perubahan_bb" value="tidak" <?= ($perubahan_bb==='tidak'?'checked':'') ?>> Tidak ada</label>
                  <label><input type="radio" name="perubahan_bb" value="ada"   <?= ($perubahan_bb==='ada'  ?'checked':'') ?>> Ada</label>
                </div>

                <div id="wrap_ket_bb" style="display:none; margin-top:8px;">
                  <input type="text" id="ket_perubahan_bb" name="ket_perubahan_bb" class="form-control" value="<?= html_escape($ket_perubahan_bb) ?>" placeholder="Contoh: turun 3 kg/1 bulan">
                </div>
              </div>
            </div>

            <!-- LLA & Tinggi Lutut -->
            <div class="row form-row">
              <div class="form-group col-md-3">
                <label>Lingkar Lengan Atas (LLA) :</label>
                <input type="text" id="lla" name="lla" class="form-control" value="<?= html_escape($lla) ?>" placeholder="Contoh: 27.5">
              </div>
              <div class="form-group col-md-3">
                <label>Tinggi Lutut :</label>
                <input type="text" id="tinggi_lutut" name="tinggi_lutut" class="form-control" value="<?= html_escape($tinggi_lutut) ?>" placeholder="Contoh: 48">
              </div>
            </div>

            <!-- BIOKIMIA -->
            <div class="subsection-title">BIOKIMIA</div>
            <div class="row form-row">
              <div class="form-group col-md-4">
                <label>Biokimia :</label>
                <textarea id="biokimia" name="biokimia" class="form-control" rows="3"><?= html_escape($biokimia) ?></textarea>
              </div>
            </div>

            <!-- FISIK / KLINIK -->
            <div class="subsection-title">FISIK / KLINIK</div>
            <div class="row form-row">
              <div class="form-group col-md-3">
                <label>Tensi :</label>
                <div class="input-group">
                  <input type="text" id="tensi" name="tensi" class="form-control" value="<?= html_escape($tensi) ?>" placeholder="Contoh: 120/80">
                  <span class="input-group-addon">mmHg</span>
                </div>
              </div>
              <div class="form-group col-md-3">
                <label>Nadi :</label>
                <div class="input-group">
                  <input type="text" id="nadi" name="nadi" class="form-control" value="<?= html_escape($nadi) ?>" placeholder="Contoh: 78">
                  <span class="input-group-addon">x/menit</span>
                </div>
              </div>
              <div class="form-group col-md-3">
                <label>Respirasi :</label>
                <div class="input-group">
                  <input type="text" id="respirasi" name="respirasi" class="form-control" value="<?= html_escape($respirasi) ?>" placeholder="Contoh: 18">
                  <span class="input-group-addon">x/menit</span>
                </div>
              </div>
              <div class="form-group col-md-3">
                <label>Suhu :</label>
                <div class="input-group">
                  <input type="text" id="suhu" name="suhu" class="form-control" value="<?= html_escape($suhu) ?>" placeholder="Contoh: 36.7">
                  <span class="input-group-addon">&deg;C</span>
                </div>
              </div>
            </div>

            <!-- PENAMPILAN -->
            <div class="subsection-title">PENAMPILAN</div>
            <div class="row form-row">
              <div class="form-group col-md-4">
                <label>Adiposa :</label>
                <textarea id="adiposa" name="adiposa" class="form-control" rows="3"><?= html_escape($adiposa) ?></textarea>
              </div>
              <div class="form-group col-md-8 penampilan-radios">
                <div class="row">
                  <div class="col-md-4">
                    <label class="asupan-title">Edema</label><br>
                    <label class="radio-inline"><input type="radio" name="edema" value="tidak" <?= ($edema==='tidak'?'checked':'') ?>> Tidak</label>
                    <label class="radio-inline"><input type="radio" name="edema" value="ya"    <?= ($edema==='ya'   ?'checked':'') ?>> Ya</label>
                  </div>
                  <div class="col-md-4">
                    <label class="asupan-title">Gangguan Menelan</label><br>
                    <label class="radio-inline"><input type="radio" name="gangguan_menelan" value="tidak" <?= ($gangguan_menelan==='tidak'?'checked':'') ?>> Tidak</label>
                    <label class="radio-inline"><input type="radio" name="gangguan_menelan" value="ya"    <?= ($gangguan_menelan==='ya'   ?'checked':'') ?>> Ya</label>
                  </div>
                  <div class="col-md-4">
                    <label class="asupan-title">Gangguan Mengunyah</label><br>
                    <label class="radio-inline"><input type="radio" name="gangguan_mengunyah" value="tidak" <?= ($gangguan_mengunyah==='tidak'?'checked':'') ?>> Tidak</label>
                    <label class="radio-inline"><input type="radio" name="gangguan_mengunyah" value="ya"    <?= ($gangguan_mengunyah==='ya'   ?'checked':'') ?>> Ya</label>
                  </div>
                </div>
              </div>
            </div>

            <!-- RIWAYAT GIZI -->
            <div class="subsection-title">RIWAYAT GIZI</div>
            <div class="row form-row-tight">
              <div class="form-group col-md-12" style="margin-bottom:2px;">
                <label class="asupan-title">Asupan Makanan</label>
              </div>
              <div class="form-group col-md-4">
                <label>Pola Makan :</label>
                <input type="text" id="pola_makan" name="pola_makan" class="form-control" value="<?= html_escape($pola_makan) ?>" placeholder="Contoh: 3x makan utama + 2x selingan">
              </div>
              <div class="form-group col-md-4">
                <label>Makan Utama :</label>
                <div class="input-group">
                  <input type="text" id="makan_utama" name="makan_utama" class="form-control" value="<?= html_escape($makan_utama) ?>" placeholder="Contoh: 3">
                  <span class="input-group-addon">x/hari</span>
                </div>
              </div>
              <div class="form-group col-md-4">
                <label>Makan Selingan :</label>
                <div class="input-group">
                  <input type="text" id="makan_selingan" name="makan_selingan" class="form-control" value="<?= html_escape($makan_selingan) ?>" placeholder="Contoh: 2">
                  <span class="input-group-addon">x/hari</span>
                </div>
              </div>
            </div>

            <div class="row form-row-tight keterangan-block">
              <div class="form-group col-md-2">
                <label>Makanan Pokok :</label>
                <input type="text" id="makanan_pokok" name="makanan_pokok" class="form-control" value="<?= html_escape($makanan_pokok) ?>" placeholder="Contoh: nasi, roti">
              </div>
              <div class="form-group col-md-2">
                <label>Lauk Hewani :</label>
                <input type="text" id="lauk_hewani" name="lauk_hewani" class="form-control" value="<?= html_escape($lauk_hewani) ?>" placeholder="Contoh: ayam, ikan">
              </div>
              <div class="form-group col-md-2">
                <label>Lauk Nabati :</label>
                <input type="text" id="lauk_nabati" name="lauk_nabati" class="form-control" value="<?= html_escape($lauk_nabati) ?>" placeholder="Contoh: tempe, tahu">
              </div>
              <div class="form-group col-md-2">
                <label>Sayur :</label>
                <input type="text" id="sayur" name="sayur" class="form-control" value="<?= html_escape($sayur) ?>" placeholder="Contoh: bayam, wortel">
              </div>
              <div class="form-group col-md-2">
                <label>Buah :</label>
                <input type="text" id="buah" name="buah" class="form-control" value="<?= html_escape($buah) ?>" placeholder="Contoh: apel, pisang">
              </div>
              <div class="form-group col-md-2">
                <label>Snack :</label>
                <input type="text" id="snack" name="snack" class="form-control" value="<?= html_escape($snack) ?>" placeholder="Contoh: biskuit, puding">
              </div>
            </div>

            <div class="row form-row" style="margin-top:4px;">
              <div class="form-group col-md-12" style="margin-bottom:6px;">
                <label class="asupan-title">Asupan Zat Gizi</label>
              </div>
              <div class="form-group col-md-12">
                <div class="row">
                  <div class="col-md-2 azg-col">
                    <div class="asupan-title">Energi</div>
                    <div class="azg-options">
                      <label><input type="radio" name="azg_energi" value="tinggi" <?= ($azg_energi==='tinggi'?'checked':'') ?>> Tinggi</label>
                      <label><input type="radio" name="azg_energi" value="cukup" <?= ($azg_energi==='cukup'?'checked':'') ?>> Cukup</label>
                      <label><input type="radio" name="azg_energi" value="rendah" <?= ($azg_energi==='rendah'?'checked':'') ?>> Rendah</label>
                    </div>
                  </div>
                  <div class="col-md-2 azg-col">
                    <div class="asupan-title">Karbohidrat</div>
                    <div class="azg-options">
                      <label><input type="radio" name="azg_karbo" value="tinggi" <?= ($azg_karbo==='tinggi'?'checked':'') ?>> Tinggi</label>
                      <label><input type="radio" name="azg_karbo" value="cukup" <?= ($azg_karbo==='cukup'?'checked':'') ?>> Cukup</label>
                      <label><input type="radio" name="azg_karbo" value="rendah" <?= ($azg_karbo==='rendah'?'checked':'') ?>> Rendah</label>
                    </div>
                  </div>
                  <div class="col-md-2 azg-col">
                    <div class="asupan-title">Protein</div>
                    <div class="azg-options">
                      <label><input type="radio" name="azg_protein" value="tinggi" <?= ($azg_protein==='tinggi'?'checked':'') ?>> Tinggi</label>
                      <label><input type="radio" name="azg_protein" value="cukup" <?= ($azg_protein==='cukup'?'checked':'') ?>> Cukup</label>
                      <label><input type="radio" name="azg_protein" value="rendah" <?= ($azg_protein==='rendah'?'checked':'') ?>> Rendah</label>
                    </div>
                  </div>
                  <div class="col-md-2 azg-col">
                    <div class="asupan-title">Lemak</div>
                    <div class="azg-options">
                      <label><input type="radio" name="azg_lemak" value="tinggi" <?= ($azg_lemak==='tinggi'?'checked':'') ?>> Tinggi</label>
                      <label><input type="radio" name="azg_lemak" value="cukup" <?= ($azg_lemak==='cukup'?'checked':'') ?>> Cukup</label>
                      <label><input type="radio" name="azg_lemak" value="rendah" <?= ($azg_lemak==='rendah'?'checked':'') ?>> Rendah</label>
                    </div>
                  </div>
                  <div class="col-md-4 azg-col">
                    <div class="asupan-title">Lainnya</div>
                    <div class="azg-options">
                      <label><input type="radio" name="azg_lainnya" value="tinggi" <?= ($azg_lainnya==='tinggi'?'checked':'') ?>> Tinggi</label>
                      <label><input type="radio" name="azg_lainnya" value="cukup" <?= ($azg_lainnya==='cukup'?'checked':'') ?>> Cukup</label>
                      <label><input type="radio" name="azg_lainnya" value="rendah" <?= ($azg_lainnya==='rendah'?'checked':'') ?>> Rendah</label>
                    </div>
                  </div>
                </div>

                <div class="row form-row-tight radio-grid-4" style="margin-top:10px;">
                  <div class="form-group col-md-3">
                    <div class="rg-head">Pengetahuan Terkait Gizi :</div>
                    <div class="radio-list">
                      <label><input type="radio" name="pengetahuan_gizi" value="baik"   <?= ($pengetahuan_gizi==='baik'  ?'checked':'') ?>> Baik</label>
                      <label><input type="radio" name="pengetahuan_gizi" value="kurang" <?= ($pengetahuan_gizi==='kurang'?'checked':'') ?>> Kurang</label>
                    </div>
                  </div>
                  <div class="form-group col-md-3">
                    <div class="rg-head">Kepatuhan Diet :</div>
                    <div class="radio-list">
                      <label><input type="radio" name="kepatuhan_diet" value="baik"   <?= ($kepatuhan_diet==='baik'  ?'checked':'') ?>> Baik</label>
                      <label><input type="radio" name="kepatuhan_diet" value="kurang" <?= ($kepatuhan_diet==='kurang'?'checked':'') ?>> Kurang</label>
                    </div>
                  </div>
                  <div class="form-group col-md-3">
                    <div class="rg-head">Akses &amp; Suplai Makanan :</div>
                    <div class="radio-list">
                      <label><input type="radio" name="akses_suplai_makanan" value="baik"   <?= ($akses_suplai_makanan==='baik'  ?'checked':'') ?>> Baik</label>
                      <label><input type="radio" name="akses_suplai_makanan" value="kurang" <?= ($akses_suplai_makanan==='kurang'?'checked':'') ?>> Kurang</label>
                    </div>
                  </div>
                  <div class="form-group col-md-3">
                    <div class="rg-head">Fungsi Fisik :</div>
                    <div class="radio-list">
                      <label><input type="radio" name="fungsi_fisik" value="baik"   <?= ($fungsi_fisik==='baik'  ?'checked':'') ?>> Baik</label>
                      <label><input type="radio" name="fungsi_fisik" value="kurang" <?= ($fungsi_fisik==='kurang'?'checked':'') ?>> Kurang</label>
                    </div>
                  </div>
                </div>

                <div class="row form-row-tight" style="margin-top:10px;">
                  <div class="form-group col-md-12" style="margin-bottom:6px;">
                    <label class="asupan-title">Aktifitas Fisik</label>
                  </div>
                  <div class="form-group col-md-12">
                    <div class="radio-stack">
                      <label><input type="radio" name="aktifitas_fisik" value="ringan"        <?= ($aktifitas_fisik==='ringan'       ?'checked':'') ?>> Ringan</label>
                      <label><input type="radio" name="aktifitas_fisik" value="rendah"        <?= ($aktifitas_fisik==='rendah'       ?'checked':'') ?>> Rendah</label>
                      <label><input type="radio" name="aktifitas_fisik" value="aktif"         <?= ($aktifitas_fisik==='aktif'        ?'checked':'') ?>> Aktif</label>
                      <label><input type="radio" name="aktifitas_fisik" value="sangat_aktif"  <?= ($aktifitas_fisik==='sangat_aktif' ?'checked':'') ?>> Sangat Aktif</label>
                    </div>
                  </div>
                  <div class="form-group col-md-4">
                    <label>Olahraga :</label>
                    <textarea id="olahraga" name="olahraga" class="form-control" rows="3"><?= html_escape($olahraga) ?></textarea>
                  </div>
                </div>
              </div>
            </div>

            <!-- RIWAYAT KLIEN -->
            <div class="subsection-title">RIWAYAT KLIEN</div>
            <div class="row form-row">
              <div class="form-group col-md-4">
                <label>Pendidikan :</label>
                <textarea id="rk_pendidikan" name="rk_pendidikan" class="form-control" rows="3"><?= html_escape($rk_pendidikan) ?></textarea>
              </div>
              <div class="form-group col-md-4">
                <label>Pekerjaan :</label>
                <textarea id="rk_pekerjaan" name="rk_pekerjaan" class="form-control" rows="3"><?= html_escape($rk_pekerjaan) ?></textarea>
              </div>
              <div class="form-group col-md-4">
                <label>Riwayat Penyakit Dahulu :</label>
                <textarea id="rk_riwayat_dahulu" name="rk_riwayat_dahulu" class="form-control" rows="3"><?= html_escape($rk_riwayat_dahulu) ?></textarea>
              </div>
            </div>
            <div class="row form-row">
              <div class="form-group col-md-4">
                <label>Riwayat Penyakit Keluarga :</label>
                <textarea id="rk_riwayat_keluarga" name="rk_riwayat_keluarga" class="form-control" rows="3"><?= html_escape($rk_riwayat_keluarga) ?></textarea>
              </div>
              <div class="form-group col-md-4">
                <label>Penggunaan Rokok :</label>
                <textarea id="rk_rokok" name="rk_rokok" class="form-control" rows="3"><?= html_escape($rk_rokok) ?></textarea>
              </div>
              <div class="form-group col-md-4">
                <label>Tingkat Stres Sehari-hari :</label>
                <textarea id="rk_stres" name="rk_stres" class="form-control" rows="3"><?= html_escape($rk_stres) ?></textarea>
              </div>
            </div>

            <!-- DIAGNOSIS GIZI -->
            <div class="section-title">DIAGNOSIS GIZI</div>
            <div class="row form-row">
              <div class="form-group col-md-4">
                <label>Diagnosis Utama :</label>
                <textarea id="dg_utama" name="dg_utama" class="form-control" rows="4"><?= html_escape($dg_utama) ?></textarea>
              </div>
              <div class="form-group col-md-4">
                <label>Etiologi / Penyebab :</label>
                <textarea id="dg_etiologi" name="dg_etiologi" class="form-control" rows="4"><?= html_escape($dg_etiologi) ?></textarea>
              </div>
              <div class="form-group col-md-4">
                <label>Tanda &amp; Gejala :</label>
                <textarea id="dg_tanda" name="dg_tanda" class="form-control" rows="4"><?= html_escape($dg_tanda) ?></textarea>
              </div>
            </div>

            <!-- INTERVENSI GIZI -->
            <div class="section-title">INTERVENSI GIZI</div>
            <div class="row form-row">
              <div class="col-md-4 iv-left">
                <label>Tujuan Intervensi :</label>
                <textarea id="iv_tujuan" name="iv_tujuan" class="form-control" rows="4"><?= html_escape($iv_tujuan) ?></textarea>

                <label class="asupan-title" style="margin-top:6px;">Preskripsi Diet</label>
                <label>Jenis Diet :</label>
                <textarea id="iv_jenis_diet" name="iv_jenis_diet" class="form-control" rows="4"><?= html_escape($iv_jenis_diet) ?></textarea>

                <label class="asupan-title" style="margin-top:6px;">Edukasi &amp; Konseling Gizi</label>
                <label>Jenis :</label>
                <textarea id="iv_edukasi_jenis" name="iv_edukasi_jenis" class="form-control" rows="3"><?= html_escape($iv_edukasi_jenis) ?></textarea>
                <label>Jumlah :</label>
                <textarea id="iv_edukasi_jumlah" name="iv_edukasi_jumlah" class="form-control" rows="3"><?= html_escape($iv_edukasi_jumlah) ?></textarea>
                <label>Jadwal Makan yang Dianjurkan :</label>
                <textarea id="iv_edukasi_jadwal" name="iv_edukasi_jadwal" class="form-control" rows="3"><?= html_escape($iv_edukasi_jadwal) ?></textarea>
                <label>Motivasi :</label>
                <textarea id="iv_edukasi_motivasi" name="iv_edukasi_motivasi" class="form-control" rows="3"><?= html_escape($iv_edukasi_motivasi) ?></textarea>
              </div>
              <div class="col-md-8">
                <label class="asupan-title">Bentuk Makanan :</label><br>
                <label class="radio-inline"><input type="radio" name="iv_bentuk_makanan" value="MB" <?= ($iv_bentuk_makanan==='MB'?'checked':'') ?>> MB</label>
                <label class="radio-inline"><input type="radio" name="iv_bentuk_makanan" value="ML" <?= ($iv_bentuk_makanan==='ML'?'checked':'') ?>> ML</label>
                <label class="radio-inline"><input type="radio" name="iv_bentuk_makanan" value="MS" <?= ($iv_bentuk_makanan==='MS'?'checked':'') ?>> MS</label>
                <label class="radio-inline"><input type="radio" name="iv_bentuk_makanan" value="MC" <?= ($iv_bentuk_makanan==='MC'?'checked':'') ?>> MC</label>

                <div style="margin-top:10px;"></div>
                <label class="asupan-title">Cara Pemberian :</label><br>
                <label class="radio-inline"><input type="radio" name="iv_cara_pemberian" value="oral" <?= ($iv_cara_pemberian==='oral'?'checked':'') ?>> via oral</label>
                <label class="radio-inline"><input type="radio" name="iv_cara_pemberian" value="ngt"  <?= ($iv_cara_pemberian==='ngt' ?'checked':'') ?>> via NGT/Sonde</label>
              </div>
            </div>

            <!-- MONITORING & EVALUASI -->
            <div class="section-title">MONITORING DAN EVALUASI GIZI</div>
            <div class="row form-row">
              <div class="form-group col-md-4">
                <label>Rencana Monev :</label>
                <textarea id="iv_monev_rencana" name="iv_monev_rencana" class="form-control" rows="4"><?= html_escape($iv_monev_rencana) ?></textarea>
              </div>
              <div class="form-group col-md-4">
                <label>Hasil Monev :</label>
                <textarea id="iv_monev_hasil" name="iv_monev_hasil" class="form-control" rows="4"><?= html_escape($iv_monev_hasil) ?></textarea>
              </div>
            </div>

            <!-- ACTIONS -->
            <div class="text-center no-print" style="margin-top:12px;">
              <a href="javascript:history.back()" class="btn btn-default">KEMBALI</a>
              <button type="submit" class="btn btn-success">SIMPAN</button>
              <button type="button" id="btn-print" class="btn btn-primary">PRINT</button>
            </div>
          </form>

          <!-- form POST untuk print (target tab baru) -->
          <form id="print-form" class="no-print" method="POST" target="_blank" action="<?= $print_action ?>"></form>

        </div>
      </div>
    </div>
  </div>
</div>

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
  // Toggle keterangan perubahan BB (muncul kalau 'ada')
  (function(){
    function toggle(){
      var s=document.querySelector('input[name="perubahan_bb"]:checked');
      var w=document.getElementById('wrap_ket_bb');
      if(!w) return;
      w.style.display=(s && s.value==='ada')?'':'none';
    }
    document.addEventListener('change', e=>{ if(e.target && e.target.name==='perubahan_bb') toggle(); });
    // panggil saat load pertama
    toggle();
  })();

  // IMT otomatis (client)
  (function(){
    const bb=document.getElementById('bb'), tb=document.getElementById('tb'), imt=document.getElementById('imt');
    function num(v){
      if(v==null) return NaN;
      v=String(v).trim().replace(',','.').replace(/[^\d.]/g,'');
      if((v.match(/\./g)||[]).length>1){ const i=v.indexOf('.'); v=v.slice(0,i+1)+v.slice(i+1).replace(/\./g,''); }
      return parseFloat(v);
    }
    function calc(){
      const b=num(bb?.value), t=num(tb?.value);
      if(!(b>0&&t>0)){ if(imt) imt.value=''; return; }
      const m=(t>10)?t/100:t; const x=b/(m*m);
      if(imt) imt.value=(x>0&&x<200)?x.toFixed(2):'';
    }
    ['input','change','blur'].forEach(ev=>{ bb?.addEventListener(ev,calc); tb?.addEventListener(ev,calc); });
    // hitung awal (kalau sudah ada nilai)
    calc();
  })();

  // Submit AJAX: ikutkan field disabled (header tampilan)
  document.getElementById('form-asesmen-gizi').addEventListener('submit', async function(e){
    e.preventDefault();
    const form = e.currentTarget;

    const fd = new FormData(form);
    form.querySelectorAll('input[disabled], textarea[disabled], select[disabled]').forEach(el=>{
      const key = el.name || el.id;
      if(!key) return;
      fd.set(key, el.value);
    });

    try{
      const res = await fetch(form.action, { method: 'POST', body: fd });
      const js = await res.json();
      if(js && js.success){
        Swal.fire({icon:'success',title:'Berhasil',text:js.message||'Data berhasil disimpan.',timer:1800,showConfirmButton:false});
      }else{
        Swal.fire({icon:'error',title:'Gagal',text:(js&&js.message)?js.message:'Gagal menyimpan data.'});
      }
    }catch(err){
      Swal.fire({icon:'error',title:'Oops',text:'Tidak dapat terhubung ke server.'});
    }
  });

  // PRINT: kirim semua nilai form (termasuk disabled) ke print_view (POST)
  document.getElementById('btn-print').addEventListener('click', function(){
    const src = document.getElementById('form-asesmen-gizi');
    const dst = document.getElementById('print-form');
    dst.innerHTML = '';

    const fd = new FormData(src);
    src.querySelectorAll('input[disabled], textarea[disabled], select[disabled]').forEach(el=>{
      const key = el.name || el.id || '';
      if(!key) return;
      fd.set(key, el.value);
    });

    for (const [k,v] of fd.entries()){
      const h = document.createElement('input');
      h.type='hidden'; h.name=k; h.value=v;
      dst.appendChild(h);
    }
    dst.submit();
  });
</script>