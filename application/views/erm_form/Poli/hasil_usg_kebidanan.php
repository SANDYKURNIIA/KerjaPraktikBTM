<?php
// Prefill yang dikirim controller
$prefill = isset($prefill) && is_array($prefill) ? $prefill : [];

// Nilai header pasien (dari data pelayanan)
$nama_pasien  = $nama_pasien ?? ($prefill['nama_pasien'] ?? '');
$no_bpjs      = $no_bpjs     ?? ($prefill['no_bpjs']     ?? '');
$no_rm        = $no_rm       ?? ($prefill['no_rm']       ?? '');
$usia         = $usia        ?? ($prefill['usia']        ?? '');

$id_pelayanan = $id_pelayanan ?? '';
$id_history   = $id_history   ?? '';

// Nilai form utama (prefill dari record terakhir)
$tanggal_pemeriksaan = $prefill['tanggal_pemeriksaan'] ?? '';
$dokter_pemeriksa    = $prefill['dokter_pemeriksa']    ?? '';
$indikasi_pemeriksaan= $prefill['indikasi_pemeriksaan']?? '';
$hasil_pemeriksaan   = $prefill['hasil_pemeriksaan']   ?? '';
$kesimpulan          = $prefill['kesimpulan']          ?? '';
$jenis_arr           = $prefill['jenis_pemeriksaan_array'] ?? [];

// siapkan print href bila prefill punya id
$prefill_id = isset($prefill['id']) ? (string)$prefill['id'] : '';
$initial_print_href = $prefill_id
    ? site_url('Erm_usg_kebidanan/print_out?id='.rawurlencode($prefill_id))
    : '';
?>
<style>
  body, .form-control, label { color:#000 }
  .section{border:1px solid #e5e7eb;border-radius:10px;padding:14px;margin:14px 0;background:#fff}
  .btn { border-radius:8px }
  .btn-success{background:#22c55e;border-color:#22c55e}
  .btn-success:hover{background:#16a34a;border-color:#16a34a}
  .btn-back{background:#3b82f6;border-color:#3b82f6;color:#fff}
  .btn-back:hover{background:#2563eb;border-color:#2563eb}
  .btn-warning{background:#f59e0b;border-color:#f59e0b;color:#fff}
  .btn-warning:hover{background:#d97706;border-color:#d97706}
  .btn-bar{display:flex;gap:12px;flex-wrap:wrap;justify-content:center;margin-top:12px}
  .form-check-input{accent-color:#16a34a;margin-right:6px}
</style>

<div class="row">
  <div class="col-sm-12">
    <div class="panel panel-default card-view">
      <div class="panel-heading">
        <h6 class="panel-title txt-dark">FORM HASIL USG KEBIDANAN</h6>
      </div>

      <div class="panel-wrapper collapse in">
        <div class="panel-body">

          <form id="formUsg" autocomplete="off">
            <!-- Hidden relasi -->
            <input type="hidden" name="id_pelayanan" value="<?= htmlspecialchars($id_pelayanan, ENT_QUOTES) ?>">
            <input type="hidden" name="id_history"   value="<?= htmlspecialchars($id_history,   ENT_QUOTES) ?>">
            <input type="hidden" name="no_rm"   value="<?= htmlspecialchars($no_rm,   ENT_QUOTES) ?>">

            <!-- Header pasien -->
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="control-label" for="nama_pasien">Nama Pasien</label>
                  <input type="text" class="form-control" id="nama_pasien" name="nama_pasien"
                         value="<?= htmlspecialchars($nama_pasien, ENT_QUOTES) ?>" placeholder="Nama pasien" readonly>
                </div>
                <div class="form-group">
                  <label class="control-label" for="no_bpjs">No. BPJS</label>
                  <input type="text" class="form-control" id="no_bpjs" name="no_bpjs"
                         value="<?= htmlspecialchars($no_bpjs, ENT_QUOTES) ?>" placeholder="No. BPJS (opsional)" readonly>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="control-label" for="no_rm">No. Rekam Medis</label>
                  <input type="text" class="form-control" id="no_rm" name="no_rm"
                         value="<?= htmlspecialchars($no_rm, ENT_QUOTES) ?>" placeholder="No. RM" readonly>
                </div>
                <div class="form-group">
                  <label class="control-label" for="usia">Usia</label>
                  <input type="text" class="form-control" id="usia" name="usia"
                         value="<?= htmlspecialchars($usia, ENT_QUOTES) ?>" placeholder="cth: 28 th" readonly>
                </div>
              </div>
            </div>

            <!-- Bagian utama -->
            <div class="section">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label" for="tanggal_pemeriksaan">Tanggal Pemeriksaan</label>
                    <input type="date" class="form-control" id="tanggal_pemeriksaan" name="tanggal_pemeriksaan"
                           value="<?= htmlspecialchars(substr((string)$tanggal_pemeriksaan,0,10), ENT_QUOTES) ?>" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label" for="dokter_pemeriksa">Dokter Pemeriksa</label>
                    <input type="text" class="form-control" id="dokter_pemeriksa" name="dokter_pemeriksa"
                           value="<?= htmlspecialchars($dokter_pemeriksa, ENT_QUOTES) ?>" placeholder="Nama dokter" required>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label d-block">Jenis Pemeriksaan</label>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" id="jp1" name="jenis_pemeriksaan[]" value="Transabdominal"
                    <?= in_array('Transabdominal', $jenis_arr ?? []) ? 'checked' : '' ?>>
                  <label class="form-check-label" for="jp1">Transabdominal</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" id="jp2" name="jenis_pemeriksaan[]" value="Transvaginal"
                    <?= in_array('Transvaginal', $jenis_arr ?? []) ? 'checked' : '' ?>>
                  <label class="form-check-label" for="jp2">Transvaginal</label>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="control-label" for="indikasi_pemeriksaan">Indikasi Pemeriksaan</label>
                  <textarea class="form-control" id="indikasi_pemeriksaan" name="indikasi_pemeriksaan" rows="4"
                            placeholder="Keluhan/indikasi klinis"><?= htmlspecialchars($indikasi_pemeriksaan, ENT_QUOTES) ?></textarea>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="control-label" for="hasil_pemeriksaan">Hasil Pemeriksaan</label>
                  <textarea class="form-control" id="hasil_pemeriksaan" name="hasil_pemeriksaan" rows="4"
                            placeholder="Ringkasan temuan USG"><?= htmlspecialchars($hasil_pemeriksaan, ENT_QUOTES) ?></textarea>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label" for="kesimpulan">Kesimpulan</label>
              <textarea class="form-control" id="kesimpulan" name="kesimpulan" rows="4"
                        placeholder="Impresi/kesimpulan"><?= htmlspecialchars($kesimpulan, ENT_QUOTES) ?></textarea>
            </div>

            <div class="btn-bar">
              <button type="button" class="btn btn-back btn-sm" onclick="history.back()">KEMBALI</button>

              <button type="submit" class="btn btn-success btn-sm" id="btnSimpan">SIMPAN</button>

              <!-- PRINT: oranye, aktif jika sudah ada id -->
              <a
                class="btn btn-warning btn-sm btn-print-usg"
                href="<?= $initial_print_href ?>"
                <?php if(!$initial_print_href): ?>disabled="disabled"<?php endif; ?>
                title="<?= $initial_print_href ? 'Cetak hasil' : 'Simpan dulu untuk mengaktifkan cetak' ?>"
                >PRINT</a>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>

<!-- SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
(function(){
  var $form = $('#formUsg');
  var submitUrl = '<?= site_url('Erm_usg_kebidanan/insert_usg') ?>';

  function enablePrint(no_rm) {
    if (!no_rm) return;
    var printUrl = "<?= site_url('Erm_usg_kebno_rmanan/print_out?no_rm=') ?>" + encodeURIComponent(no_rm);
    var $btnPrint = $('.btn-print-usg');
    if ($btnPrint.length) {
      $btnPrint
        .attr('href', printUrl)
        .prop('disabled', false)
        .removeAttr('disabled')
        .attr('title', 'Cetak hasil');
    }
  }

  function showToastSuccess(msg) {
    Swal.fire({
      toast: true,
      position: 'top-end',
      icon: 'success',
      title: msg || 'Data berhasil disimpan',
      showConfirmButton: false,
      timer: 1800,
      timerProgressBar: true
    });
  }

  function showError(msg, html) {
    Swal.fire({
      icon: 'error',
      title: 'Gagal',
      text: msg || 'Terjadi kesalahan.',
      html: html || undefined,
      confirmButtonText: 'OK'
    });
  }

  function collectValidation(errorsObj) {
    if (!errorsObj) return '';
    var items = [];
    Object.keys(errorsObj).forEach(function(k){
      var v = (errorsObj[k]||'').toString().trim();
      if (v) items.push('<li>'+escapeHtml(v)+'</li>');
    });
    return items.length ? '<ul style="text-align:left;margin-left:18px">'+items.join('')+'</ul>' : '';
  }

  function escapeHtml(s){
    return String(s).replace(/&/g,'&amp;').replace(/</g,'&lt;')
      .replace(/>/g,'&gt;').replace(/"/g,'&quot;').replace(/'/g,'&#39;');
  }

  $form.on('submit', function(e){
    e.preventDefault();

    var $btn = $('#btnSimpan');
    var oldHtml = $btn.html();
    $btn.prop('disabled', true).html('<i class="fa fa-spinner fa-spin"></i> Menyimpan…');

    $.ajax({
      url: submitUrl,
      method: 'POST',
      data: $form.serialize(),
      dataType: 'json'
    })
    .done(function(res){
      if (res && res.status === 'success') {
        showToastSuccess(res.message || 'Data USG tersimpan.');
        if (res.id) enablePrint(res.id);
        return;
      }
      var htmlErr = collectValidation(res && res.errors);
      var msg = (res && res.message) ? res.message : 'Gagal menyimpan data.';
      if (res && res.error && res.error.message) {
        msg += '\n\nDetail: ' + res.error.message + (res.error.code ? ' (code '+res.error.code+')' : '');
      }
      showError(msg, htmlErr);
      console.warn('Server response:', res);
    })
    .fail(function(xhr){
      var msg = 'Proses gagal ('+xhr.status+'). Coba lagi.';
      try {
        var j = JSON.parse(xhr.responseText);
        if (j && j.message) msg = j.message;
      } catch(e){}
      showError(msg);
      console.error('XHR status:', xhr.status, 'Resp:', xhr.responseText);
    })
    .always(function(){
      $btn.prop('disabled', false).html(oldHtml);
    });
  });
})();
</script>