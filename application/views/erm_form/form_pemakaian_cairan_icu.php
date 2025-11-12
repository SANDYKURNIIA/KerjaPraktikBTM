<?php /* View: Pemakaian Cairan Pasien ICU (validasi angka & per, SweetAlert, "per" auto-slash, cegah simpan "/") */ ?>

<style>
  html, body { color:#000; font-family:'Segoe UI', sans-serif; }
  .panel-title, .txt-dark, label, strong { color:#000 !important; }
  .panel.card-view { border-radius:12px }
  .section { border:1px solid #e5e7eb; border-radius:10px; padding:12px 14px; margin:10px 0; background:#fff; box-shadow:0 2px 6px rgba(0,0,0,0.08); }
  .readonly { background:#f3f4f6 !important; color:#000 !important; border:1px solid #ccc !important; }
  .form-control { border:1px solid #ccc; transition:all 0.3s ease; border-radius:6px; color:#000; }
  .form-control:focus { border-color:#81c784; box-shadow:0 0 4px rgba(129,199,132,0.6); }
  .btn-success { background:#3cb878; border-color:#3cb878; color:#fff; }
  .btn-success:hover { background:#34a46a; border-color:#34a46a; }
  .scroll-sync { overflow-x:auto; margin-top:6px; }
  .table-balance { border-collapse:collapse; width:100%; min-width:1200px; text-align:center; font-size:13px; }
  .table-balance th, .table-balance td { border:1px solid #999; padding:4px; vertical-align:middle; background-color:#fff; }
  .table-balance th { background-color:#f0f0f0; font-weight:600; }
  .sticky-col { position:sticky; left:0; background:#fff; z-index:5; width:160px; min-width:160px; text-align:left; }
  .small-input { width:48px; text-align:center; border:1px solid #ccc; border-radius:4px; padding:2px; font-size:12px; }
  .jenis-cairan-input { width:150px; border:1px solid #ccc; border-radius:4px; padding:3px; font-size:12px; }
  .mt-3{margin-top:14px}
</style>

<div class="row">
  <div class="col-sm-12">
    <div class="panel panel-default card-view">
      <div class="panel-heading">
        <h6 class="panel-title txt-dark">PEMAKAIAN CAIRAN PASIEN ICU</h6>
      </div>

      <div class="panel-wrapper collapse in">
        <div class="panel-body">

          <form id="form-cairan-icu" autocomplete="off" novalidate>
            <input type="hidden" name="id_pelayanan" value="<?= $id_pelayanan ?>">
            <input type="hidden" name="id_history"   value="<?= $id_history ?>">

            <!-- HEADER -->
            <div class="row">
              <div class="col-md-6">
                <label>No. RM:</label>
                <input class="form-control readonly" value="<?= $pasien['no_rm'] ?? '-' ?>" readonly>
                <label>Nama Pasien:</label>
                <input class="form-control readonly" value="<?= $pasien['nama'] ?? '-' ?>" readonly>
                <label>No. Telepon:</label>
                <input class="form-control readonly" value="<?= $pasien['no_hp'] ?? '-' ?>" readonly>
              </div>

              <div class="col-md-6">
                <label>Tanggal Masuk:</label>
                <input class="form-control readonly"
                       value="<?php $tm = $history['tgl_masuk'] ?? null; echo $tm ? date('d-m-Y H:i', strtotime($tm)) : '-'; ?>"
                       readonly>
                <label>Tgl Lahir / Umur:</label>
                <?php 
                  $tgl = $pasien['tgl_lahir'] ?? null; $umur = '';
                  if ($tgl) { $lahir = new DateTime($tgl); $umur = (new DateTime('today'))->diff($lahir)->y . ' tahun'; }
                ?>
                <input class="form-control readonly" value="<?= ($tgl ? date('d-m-Y', strtotime($tgl)) : '-') . ' / ' . $umur ?>" readonly>
              </div>
            </div>

            <hr>

            <!-- ENTERAL -->
            <div class="section">
              <h6 class="txt-dark">ENTERAL</h6>
              <div class="scroll-sync">
                <table class="table-balance">
                  <thead>
                    <tr>
                      <th class="sticky-col">Jenis Cairan</th>
                      <?php for ($i=1;$i<=25;$i++): ?><th><?= $i ?></th><?php endfor; ?>
                    </tr>
                  </thead>
                  <tbody>
                    <?php for ($r=1;$r<=5;$r++): ?>
                      <tr>
                        <td class="sticky-col">
                          <input type="text" class="jenis-cairan-input" name="enteral_jenis_<?= $r ?>"
                                 value="<?= htmlspecialchars($enteral_jenis[$r-1] ?? '', ENT_QUOTES) ?>">
                        </td>
                        <?php for ($c=1;$c<=25;$c++): ?>
                          <td>
                            <input type="text" class="small-input num"
                                   inputmode="decimal" pattern="^\d+(?:[.,]\d+)?$"
                                   name="enteral_<?= $r ?>_<?= $c ?>"
                                   value="<?= htmlspecialchars($enteral[$r-1][$c-1] ?? '', ENT_QUOTES) ?>">
                          </td>
                        <?php endfor; ?>
                      </tr>
                    <?php endfor; ?>
                  </tbody>
                </table>
              </div>
            </div>

            <!-- MASUK PARENTERAL -->
            <div class="section">
              <h6 class="txt-dark">MASUK PARENTERAL</h6>
              <div class="scroll-sync">
                <table class="table-balance">
                  <thead>
                    <tr>
                      <th class="sticky-col">Jenis Cairan</th>
                      <?php for ($i=1;$i<=25;$i++): ?><th><?= $i ?></th><?php endfor; ?>
                    </tr>
                  </thead>
                  <tbody>
                    <?php for ($r=1;$r<=7;$r++): ?>
                      <tr>
                        <td class="sticky-col">
                          <input type="text" class="jenis-cairan-input" name="parenteral_jenis_<?= $r ?>"
                                 value="<?= htmlspecialchars($parenteral_jenis[$r-1] ?? '', ENT_QUOTES) ?>">
                        </td>
                        <?php for ($c=1;$c<=25;$c++): ?>
                          <td>
                            <input type="text" class="small-input per js-per"
                                   placeholder="0/0" inputmode="text"
                                   pattern="^\s*\d+(?:[.,]\d+)?\s*\/\s*\d+(?:[.,]\d+)?\s*$"
                                   name="parenteral_<?= $r ?>_<?= $c ?>"
                                   value="<?= htmlspecialchars($parenteral[$r-1][$c-1] ?? '', ENT_QUOTES) ?>">
                          </td>
                        <?php endfor; ?>
                      </tr>
                    <?php endfor; ?>

                    <!-- Total Input -->
                    <tr>
                      <td class="sticky-col"><b>Total Input</b></td>
                      <?php for ($c=1;$c<=25;$c++): ?>
                        <td>
                          <input type="text" class="small-input num"
                                 inputmode="decimal" pattern="^\d+(?:[.,]\d+)?$"
                                 name="total_input_<?= $c ?>"
                                 value="<?= htmlspecialchars($total_input[$c-1] ?? '', ENT_QUOTES) ?>">
                        </td>
                      <?php endfor; ?>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>

            <!-- KELUAR -->
            <div class="section">
              <h6 class="txt-dark">KELUAR</h6>
              <div class="scroll-sync">
                <table class="table-balance">
                  <thead>
                    <tr>
                      <th class="sticky-col">Jenis</th>
                      <?php for ($i=1;$i<=25;$i++): ?><th><?= $i ?></th><?php endfor; ?>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      $keluarRows = ['Urine', 'NGT', 'Drain', 'Colostomi', 'W.S.D', 'B.A.B', 'Total Output'];
                      foreach ($keluarRows as $r => $row): ?>
                        <tr>
                          <td class="sticky-col"><?= $row ?></td>
                          <?php for ($c=1;$c<=25;$c++): ?>
                            <td>
                              <input type="text" class="small-input num"
                                     inputmode="decimal" pattern="^\d+(?:[.,]\d+)?$"
                                     name="keluar_<?= $r ?>_<?= $c ?>"
                                     value="<?= htmlspecialchars($keluar[$r][$c-1] ?? '', ENT_QUOTES) ?>">
                            </td>
                          <?php endfor; ?>
                        </tr>
                    <?php endforeach; ?>

                    <!-- Baris Total -->
                    <tr>
                      <td class="sticky-col"><b>Total</b></td>
                      <?php for ($c=1;$c<=25;$c++): ?>
                        <td>
                          <input type="text" class="small-input per js-per"
                                 placeholder="0/0" inputmode="text"
                                 pattern="^\s*\d+(?:[.,]\d+)?\s*\/\s*\d+(?:[.,]\d+)?\s*$"
                                 name="total_<?= $c ?>"
                                 value="<?= htmlspecialchars($total[$c-1] ?? '', ENT_QUOTES) ?>">
                        </td>
                      <?php endfor; ?>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>

            <div class="text-right mt-3">
              <button type="submit" class="btn btn-success">Simpan</button>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- CDN jika perlu:
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
-->

<script>
  // === Scroll sync ===
  document.addEventListener("DOMContentLoaded", function() {
    const scrolls = document.querySelectorAll('.scroll-sync');
    scrolls.forEach(el => el.addEventListener('scroll', function() {
      const x = this.scrollLeft;
      scrolls.forEach(other => { if (other !== this) other.scrollLeft = x; });
    }));
  });

  // === Caret utils ===
  function setCaret(el, pos){ if (el.setSelectionRange){ el.focus(); el.setSelectionRange(pos,pos); } }
  function getCaret(el){ return ('selectionStart' in el) ? el.selectionStart : 0; }

  // === Normalisasi ===
  function normNum(v){ return (v||'').toString().trim().replace(',', '.'); }
  function normPer(v){
    v = (v||'').toString().trim().replace(/,/g,'.').replace(/\s+/g,'');
    if (v === '' || v === '/') return '';            // <-- JANGAN kirim "/" kosong
    const parts = v.split('/');
    // kalau belum lengkap (hanya a/ atau /b) anggap kosong
    if (parts.length !== 2 || parts[0] === '' || parts[1] === '') return '';
    return parts[0] + '/' + parts[1];
  }

  // === Per input behavior: auto "/" + tak bisa dihapus, tapi kosongkan saat blur jika tetap "/" ===
  function initPerInput(inp){
    inp.addEventListener('focus', function(){
      if (!this.value.trim()) { this.value = '/'; setCaret(this, 0); }
      else {
        // rapikan jadi satu slash
        let v = this.value.replace(/,/g,'.').replace(/\s+/g,'');
        const first = v.indexOf('/');
        if (first === -1) v += '/';
        else v = v.slice(0, first+1) + v.slice(first+1).replace(/\//g,'');
        this.value = v;
      }
    });

    // saat blur: jika masih "/" atau tidak lengkap -> kosongkan
    inp.addEventListener('blur', function(){
      const v = this.value.replace(/\s+/g,'');
      const parts = v.split('/');
      if (v === '/' || parts.length !== 2 || parts[0] === '' || parts[1] === '') {
        this.value = ''; // biar tidak tersimpan
      }
    });

    inp.addEventListener('keydown', function(e){
      const v = this.value;
      const pos = getCaret(this);
      const slashIdx = v.indexOf('/');

      if (e.key === 'Backspace' && pos === slashIdx + 1) { e.preventDefault(); setCaret(this, slashIdx); return; }
      if (e.key === 'Delete' && pos === slashIdx)       { e.preventDefault(); setCaret(this, slashIdx + 1); return; }

      const allowed = ['ArrowLeft','ArrowRight','ArrowUp','ArrowDown','Tab','Home','End','Backspace','Delete','Enter'];
      if (!allowed.includes(e.key) && !/[\d.\/]/.test(e.key)) { e.preventDefault(); return; }

      if (e.key === '/') {
        e.preventDefault();
        if (pos <= slashIdx) setCaret(this, slashIdx + 1);
        else setCaret(this, slashIdx);
      }
    });

    inp.addEventListener('input', function(){
      let v = this.value.replace(/\s+/g,'').replace(/,/g,'.').replace(/[^\d./]/g,'');
      const first = v.indexOf('/');
      if (first === -1) v = v + '/';
      else v = v.slice(0, first + 1) + v.slice(first + 1).replace(/\//g, '');
      this.value = v;
    });
  }

  document.querySelectorAll('input.js-per').forEach(initPerInput);

  // === Submit ===
  $(document).on('submit', '#form-cairan-icu', function(e){
    e.preventDefault();

    const $form = $(this);
    $form.find('input.num').each(function(){ this.value = normNum(this.value); });
    $form.find('input.per').each(function(){ this.value = normPer(this.value); }); // "/" -> '' di sini

    const invalid = $form[0].querySelector(':invalid');
    if (invalid) { invalid.reportValidity(); return; }

    $.ajax({
      url: "<?= site_url('Form_pemakaian_cairan_icu/save'); ?>",
      type: "POST",
      data: $form.serialize(),
      dataType: "json",
      success: function(res){
        if (res && res.ok) {
          swal({ title: "Good Job!", text: "Data berhasil disimpan.", icon: "success", confirmButtonColor: "#3cb878" });
        } else {
          swal({ title: "Gagal!", text: (res && res.msg) ? res.msg : "Gagal menyimpan data.", icon: "warning", confirmButtonColor: "#e74c3c" });
        }
      },
      error: function(){
        swal({ title: "Error!", text: "Terjadi error jaringan / server.", icon: "error", confirmButtonColor: "#e74c3c" });
      }
    });
  });
</script>