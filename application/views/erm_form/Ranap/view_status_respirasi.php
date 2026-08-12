<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<?php
function is_checked_csv($saved_csv, $val) {
  if (!$saved_csv) return '';
  $parts = array_map('trim', explode(',', $saved_csv));
  return in_array((string)$val, $parts, true) ? 'checked' : '';
}
function is_selected($saved_val, $opt) {
  return ((string)$saved_val === (string)$opt) ? 'selected' : '';
}
$csrf_name = $this->security->get_csrf_token_name();
$csrf_hash = $this->security->get_csrf_hash();
$colspanRanges = count($ranges);
?>

<div class="panel panel-default card-view">
  <div class="panel-heading">
    <div class="pull-left">
      <h1 class="panel-title txt-dark"><strong>Status Respirasi</strong></h1>
      <div style="font-weight:bold;color:black;">Centang tabel pola nafas per jam, lalu tabel parameter per rentang jam.</div>
    </div>
    <div class="clearfix"></div>
  </div>

  <div class="panel-wrapper collapse in">
    <div class="panel-body">
      <form id="formRespirasi">
        <input type="hidden" name="id_pelayanan" value="<?= htmlspecialchars($id_pelayanan, ENT_QUOTES); ?>">
        <input type="hidden" name="id_history" value="<?= htmlspecialchars($id_history, ENT_QUOTES); ?>">
        <?php if ($csrf_name): ?>
          <input type="hidden" name="<?= $csrf_name; ?>" value="<?= $csrf_hash; ?>">
        <?php endif; ?>

        <!-- ===== POLA NAFAS PER JAM ===== -->
        <div class="table-responsive">
          <table class="table table-bordered table-striped table-sm mb-4">
            <thead>
              <tr>
                <th class="fixed-col">Pola Nafas / Jam</th>
                <?php foreach ($hours as $h): ?>
                  <th class="text-center"><?= $h ?></th>
                <?php endforeach; ?>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($patterns_hourly as $col => $label): ?>
                <tr>
                  <td class="label-col"><?= htmlspecialchars($label) ?></td>
                  <?php foreach ($hours as $h): ?>
                    <td><input type="checkbox" name="<?= $col ?>[]" value="<?= $h ?>" <?= is_checked_csv($saved[$col] ?? null, $h); ?>></td>
                  <?php endforeach; ?>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>

       <!-- ===== INPUT ANGKA (PS–IPL) PER JAM ===== -->
<!-- ===== INPUT ANGKA (PS–IPL) PER JAM ===== -->
<div class="table-responsive">
  <table class="table table-bordered table-striped table-sm mb-4">
    <thead>
      <tr>
        <th>Pola (Angka) / Jam</th>
        <?php foreach ($hours as $h): ?>
          <th class="text-center"><?= $h ?></th>
        <?php endforeach; ?>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($patterns_numeric as $col => $label): ?>
        <tr>
          <td class="font-weight-bold text-dark">
            <?= htmlspecialchars($label) ?>
          </td>
          <?php foreach ($hours as $h): ?>
            <td class="text-center">
            <input
  type="text"
  name="pola_angka[<?= $col ?>][<?= $h ?>]"
  class="pola-angka-input font-pola"
  value="<?= htmlspecialchars($saved['pola_angka'][$col][$h] ?? '', ENT_QUOTES); ?>"
>



            </td>
          <?php endforeach; ?>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>


<script>
$(document).on('input', '.pola-angka-input', function(){
  this.value = this.value.replace(/[^0-9]/g,'');
});
</script>




        <!-- ===== PARAMETER RENTANG + SEKR ===== -->
        <div class="table-responsive">
          <table class="table table-bordered table-striped table-sm mb-4">
            <thead>
              <tr>
                <th class="fixed-col">Parameter / Range Jam</th>
                <?php foreach ($ranges as $r): ?> 
                  <th><?= $r ?></th>
                <?php endforeach; ?>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($params_range as $col => $label): ?>
                <tr>
                  <td class="label-col"><?= htmlspecialchars($label) ?></td>
                  <?php foreach ($ranges as $r): ?>
                    <td><input type="checkbox" name="<?= $col ?>[]" value="<?= $r ?>" <?= is_checked_csv($saved[$col] ?? null, $r); ?>></td>
                  <?php endforeach; ?>
                </tr>
              <?php endforeach; ?>

              <tr>
                <td class="label-col">Sekresi</td>
                <td colspan="<?= $colspanRanges ?>" style="text-align:left;">
                  <select name="sekr" class="form-control form-control-sm" style="max-width:200px;display:inline-block;">
                    <option value="">— pilih —</option>
                    <?php foreach ($sekr_options as $kode => $label): ?>
                      <option value="<?= $kode ?>" <?= is_selected($saved['sekr'] ?? '', $kode) ?>>
                        <?= $label ?> (<?= $kode ?>)
                      </option>
                    <?php endforeach; ?>
                  </select>
                </td>
              </tr>
            </tbody>
          </table>
        </div>

        <div class="d-flex justify-content-end gap-2 mt-3 mb-3">
          <button type="button" id="btnKembali" class="btn btn-secondary btn-sm" onclick="kembaliKeSebelumnya()">
            <i class="fa fa-arrow-left"></i> Kembali
          </button>
          <button type="button" id="btnSimpanResp" class="btn btn-success btn-sm" onclick="simpanStatusRespirasiAjax()">
            <i class="fa fa-check"></i> Simpan
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

<style>
/* Umum */
th, td { text-align:center; vertical-align:middle; }
th { background:#f8f9fa; color:black; font-weight:bold; white-space:nowrap; }
td.label-col, th.fixed-col { text-align:left; font-weight:bold; color:black; }
.table { margin-bottom:25px; }

/* Responsif */
.table-responsive { overflow-x:auto; -webkit-overflow-scrolling:touch; }
@media (max-width:768px){
  .panel-heading h1 { font-size:1.1rem; }
  .table-sm th, .table-sm td { padding:0.3rem; }
  .label-col { font-size:0.9rem; white-space:nowrap; }
  .form-control-sm { font-size:0.85rem; padding:2px 5px; }
  .btn-sm { font-size:0.85rem; padding:4px 8px; }
  th, td { font-size:0.8rem; }
}
@media (max-width:480px){
  th, td { font-size:0.75rem; }
  .label-col { font-size:0.8rem; }
  .panel-heading div[style] { font-size:0.9rem; }
}
.btn-secondary { background:#6c757d; border-color:#6c757d; color:#fff; }
/* samakan gaya dengan tabel pola nafas */
.table th,
.table td{
  color:#000;
  font-weight:600;
}

/* input angka */
.pola-angka-input{
  width:60px;
  height:28px;
  text-align:center;
  border:1px solid #999;
  border-radius:3px;
  background:#fff;
  color:#000;
  font-weight:600;
  font-size:13px;
  outline:none;
  position:relative;
  z-index:10;
}

/* saat fokus */
.pola-angka-input:focus{
  border-color:#333;
}

.table-responsive td{
  position:relative;
}
/* khusus tabel pola nafas */
.table-responsive table thead th.fixed-col,
.table-responsive table tbody td.label-col{
  text-align:center !important;
}




</style>

<script>
function kembaliKeSebelumnya(){
  if(document.referrer){window.location.href=document.referrer}else{history.back()}
}
function alertSuccessThenRedirect(msg,cb){
  if(window.Swal&&Swal.fire)Swal.fire({icon:'success',title:'Tersimpan!',text:msg,showConfirmButton:false,timer:1500}).then(cb);
  else if(window.swal)swal({title:'Berhasil!',text:msg,type:'success',confirmButtonColor:'#3cb878'},cb);
  else{alert(msg);cb();}
}
function alertError(title,msg){
  if(window.Swal&&Swal.fire)Swal.fire({icon:'error',title:title,text:msg});
  else if(window.swal)swal({title:title,text:msg,type:'error',confirmButtonColor:'#3cb878'});
  else alert(title+': '+msg);
}
function simpanStatusRespirasiAjax(){
  var btn=document.getElementById('btnSimpanResp');
  if(btn)btn.disabled=true;
  var payload=$('#formRespirasi').serialize();
  $.ajax({
    url:"<?= base_url('StatusRespirasi/simpan_ajax'); ?>",
    method:"POST",
    dataType:"json",
    data:payload,
    success:function(res){
      if(!(res&&res.status==='success')){
        alertError('Gagal',(res&&res.message)?res.message:'Penyimpanan gagal.');
        if(btn)btn.disabled=false;return;
      }
      alertSuccessThenRedirect('Data berhasil tersimpan.',function(){
        if(document.referrer)window.location.href=document.referrer;else history.back();
      });
    },
    error:function(){
      alertError('Error','Terjadi kesalahan koneksi.');
      if(btn)btn.disabled=false;
    }
  });
}
</script>
