<div id="aktifitas_fisik">
  <div class="row">
    <div class="col-sm-12">
      <div class="panel panel-default card-view">
        <div class="panel-heading">
          <div class="pull-left">
            <h1 class="panel-title txt-dark"><strong>Aktifitas Fisik</strong></h1>
          </div>
          <div class="clearfix"></div>
        </div>

        <div class="panel-wrapper collapse in">
          <div class="panel-body">
            <div class="table-wrap">
              <div class="form-wrap">
                <span class="help-block"></span>
                <div class="form-body">

                  <!-- Hidden: id_mcu -->
                  <input type="hidden" id="id_mcu"
                    value="<?= isset($id_mcu) && $id_mcu ? htmlspecialchars($id_mcu, ENT_QUOTES, 'UTF-8') : (isset($data_mcu['id_mcu']) ? htmlspecialchars($data_mcu['id_mcu'], ENT_QUOTES, 'UTF-8') : '') ?>">

                  <table class="table table-bordered">
                    <thead class="btn-success text-white">
                      <tr>
                        <th colspan="2" class="text-center bg-success">Aktifitas Fisik</th>
                      </tr>
                    </thead>
                    <tbody>

                      <!-- Frekuensi aerobik -->
                      <tr>
                        <td style="vertical-align: middle; width: 40%;">Latihan aerobik 20–30 menit per minggu</td>
                        <td class="text-center">
                          <div>hari</div>
                          <div class="radio-group-compact" style="display:flex; gap:.5rem; flex-wrap:wrap; justify-content:center; margin-top:.25rem;">
                            <?php for ($i=0;$i<=7;$i++): ?>
                              <div class="radio">
                                <input type="radio" id="minggu_<?= $i ?>" name="minggu" value="<?= $i ?>">
                                <label for="minggu_<?= $i ?>" style="margin:0 .25rem; cursor:pointer;"><?= $i ?></label>
                              </div>
                            <?php endfor; ?>
                          </div>
                        </td>
                      </tr>

                      <!-- Daftar aktivitas (grid 2 kolom) -->
                      <tr>
                        <td style="vertical-align: middle;">Pilih aktivitas yang dilakukan</td>
                        <td>
                          <div class="checkbox-grid">
                            <label><input type="checkbox" name="aktivitas[]" value="golf"> golf</label>
                            <label><input type="checkbox" name="aktivitas[]" value="joging"> joging</label>
                            <label><input type="checkbox" name="aktivitas[]" value="berkebun"> berkebun</label>
                            <label><input type="checkbox" name="aktivitas[]" value="jual cepat"> jual cepat</label>
                            <label><input type="checkbox" name="aktivitas[]" value="senam aerobik"> senam aerobik</label>
                            <label><input type="checkbox" name="aktivitas[]" value="bulu tangkis"> bulu tangkis</label>
                            <label><input type="checkbox" name="aktivitas[]" value="berenang"> berenang</label>

                            <label><input type="checkbox" name="aktivitas[]" value="bersepeda"> bersepeda</label>
                            <label><input type="checkbox" name="aktivitas[]" value="skating"> skating</label>
                            <label><input type="checkbox" name="aktivitas[]" value="sepak bola"> sepak bola</label>
                            <label><input type="checkbox" name="aktivitas[]" value="bersepeda stationer"> bersepeda stationer</label>
                            <label><input type="checkbox" name="aktivitas[]" value="lompat tali"> lompat tali</label>
                            <label><input type="checkbox" name="aktivitas[]" value="basket"> basket</label>
                            <label><input type="checkbox" name="aktivitas[]" value="latihan beban"> latihan beban</label>
                          </div>
                        </td>
                      </tr>

                    </tbody>
                  </table>

                  <button id="btnSimpanAktivitas" class="btn btn-success" onclick="simpan_riwayat()">
                    <i class="fa fa-file"></i> Simpan
                  </button>

                </div><!-- /.form-body -->
              </div><!-- /.form-wrap -->
            </div><!-- /.table-wrap -->
          </div><!-- /.panel-body -->
        </div><!-- /.panel-wrapper -->
      </div><!-- /.panel -->
    </div>
  </div>
</div>

<style>
  /* Grid dua kolom yang aman di dalam <td> */
  .checkbox-grid{
    display: grid;
    grid-template-columns: repeat(2, minmax(180px, 1fr));
    gap: 6px 24px;
    align-items: start;
  }
  .checkbox-grid label{
    display: flex;
    align-items: center;
    gap: 6px;
    cursor: pointer;
    margin: 0;
    user-select: none;
  }
  .checkbox-grid input[type="checkbox"]{
    margin: 0;
  }

  /* Rapikan radio/checkbox di bootstrap lama */
  .radio input[type="radio"] { margin-top: 2px; }
</style>

<script>
function simpan_riwayat(){
  var id_mcu = (document.getElementById('id_mcu') || {}).value || '';
  if(!id_mcu){
    swal({ title: "Oops", text: "id_mcu wajib ada.", type: "warning", confirmButtonColor: "#3cb878" });
    return;
  }

  var mingguEl = document.querySelector('input[name="minggu"]:checked');
  if(!mingguEl){
    swal({ title: "Oops", text: "Pilih jumlah hari aerobik per minggu.", type: "warning", confirmButtonColor: "#3cb878" });
    return;
  }
  var minggu = mingguEl.value;

  var aktivitasEls = document.querySelectorAll('input[name="aktivitas[]"]:checked');
  if(!aktivitasEls || aktivitasEls.length === 0){
    swal({ title: "Oops", text: "Pilih minimal satu aktivitas.", type: "warning", confirmButtonColor: "#3cb878" });
    return;
  }
  var aktivitas_text = Array.from(aktivitasEls).map(function(el){ return el.value; }).join(', ');

  swal({
    title: "Apakah kamu yakin?",
    text: "Menyimpan data aktifitas fisik ini?",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3cb878",
    confirmButtonText: "Yakin",
    cancelButtonText: "Batal",
    closeOnConfirm: false
  }, function () {
    var btn = document.getElementById('btnSimpanAktivitas');
    if (btn) btn.disabled = true;

    $.ajax({
      url: "<?= base_url('Quitioners/simpan_aktifitas_fisik'); ?>",
      method: "POST",
      dataType: "json",
      data: {
        id_mcu: id_mcu,
        minggu: minggu,
        aktivitas_text: aktivitas_text
      },
      success: function(res){
        if(res && res.status === "success"){
          swal({
            title: "Berhasil!",
            type: "success",
            text: "Data aktifitas fisik telah disimpan.",
            confirmButtonColor: "#3cb878"
          }, function(){ location.reload(); });
        } else {
          swal({
            title: "Gagal",
            type: "warning",
            text: (res && res.message) ? res.message : "Gagal menyimpan.",
            confirmButtonColor: "#3cb878"
          });
          if (btn) btn.disabled = false;
        }
      },
      error: function(){
        swal({ title: "Error", type: "error", text: "Terjadi kesalahan koneksi.", confirmButtonColor: "#3cb878" });
        if (btn) btn.disabled = false;
      }
    });
  });
}
</script>