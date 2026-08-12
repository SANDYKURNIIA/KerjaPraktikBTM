<<<<<<< HEAD
<div class="row">
  <div class="col-sm-12">
    <div class="panel panel-default card-view">
      <div class="panel-heading">
        <div class="pull-left">
          <h1 class="panel-title txt-dark"><strong>Gejala Dialami</strong></h1>
        </div>
        <div class="clearfix"></div>
      </div>

      <div class="panel-wrapper collapse in">
        <div class="panel-body">
          <div class="table-wrap">
            <div class="form-wrap">
              <div class="form-body">

                <!-- Hidden: id_mcu (id_staff tidak perlu di view) -->
                <input type="hidden" id="id_mcu"
                  value="<?= isset($id_mcu) && $id_mcu ? htmlspecialchars($id_mcu, ENT_QUOTES, 'UTF-8') : (isset($data_mcu['id_mcu']) ? htmlspecialchars($data_mcu['id_mcu'], ENT_QUOTES, 'UTF-8') : '') ?>">

                <table class="table table-bordered">
                  <thead class="btn-success text-white">
                    <tr>
                      <th colspan="2" class="text-center bg-success">Gejala Yang Dialami Sekarang</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr><td><input type="checkbox" name="gejala" value="Pusing / Pingsan Tanpa Sebab"></td><td>Pusing / Pingsan Tanpa Sebab</td></tr>
                    <tr><td><input type="checkbox" name="gejala" value="Nafas Pendek"></td><td>Nafas Pendek</td></tr>
                    <tr><td><input type="checkbox" name="gejala" value="Batuk Lebih dari Dua Minggu"></td><td>Batuk Lebih dari Dua Minggu</td></tr>
                    <tr><td><input type="checkbox" name="gejala" value="Pembengkakan di Mata Kaki"></td><td>Pembengkakan di Mata Kaki</td></tr>
                    <tr><td><input type="checkbox" name="gejala" value="Kesemutan/Baal"></td><td>Kesemutan/Baal</td></tr>
                    <tr><td><input type="checkbox" name="gejala" value="Turun Berat Badan Lebih dari Lima Kg"></td><td>Turun Berat Badan Lebih dari Lima Kg</td></tr>
                    <tr><td><input type="checkbox" name="gejala" value="Sering Kencing dan Haus Berlebihan"></td><td>Sering Kencing dan Haus Berlebihan</td></tr>
                    <tr><td><input type="checkbox" name="gejala" value="Sering Nyeri Sendi"></td><td>Sering Nyeri Sendi</td></tr>
                    <tr><td><input type="checkbox" name="gejala" value="Kebiasaan B.A.B Berubah"></td><td>Kebiasaan B.A.B Berubah</td></tr>
                    <tr><td><input type="checkbox" name="gejala" value="Sering Sesak Nafas, Batuk dan Menangis"></td><td>Sering Sesak Nafas, Batuk dan Menangis</td></tr>
                    <tr><td><input type="checkbox" name="gejala" value="Sering Sakit Pinggang"></td><td>Sering Sakit Pinggang</td></tr>
                    <tr><td><input type="checkbox" name="gejala" value="Sakit Kulit/Luka Lama Sembuh"></td><td>Sakit Kulit/Luka Lama Sembuh</td></tr>
                    <tr><td><input type="checkbox" name="gejala" value="Ada Tahi Lalat > 6 Buah dan 1/2 cm"></td><td>Ada Tahi Lalat > 6 Buah dan 1/2 cm</td></tr>
                    <tr><td><input type="checkbox" name="gejala" value="Kesulitan Membaca Jarak Dekat"></td><td>Kesulitan Membaca Jarak Dekat</td></tr>
                    <tr><td><input type="checkbox" name="gejala" value="Sulit Tidur"></td><td>Sulit Tidur</td></tr>
                    <tr><td><input type="checkbox" name="gejala" value="Terlintas Ingin Bunuh Diri"></td><td>Terlintas Ingin Bunuh Diri</td></tr>
                    <tr><td><input type="checkbox" name="gejala" value="Cepat Lelah"></td><td>Cepat Lelah</td></tr>
                    <tr><td><input type="checkbox" name="gejala" value="Gangguan Pendengaran"></td><td>Gangguan Pendengaran</td></tr>
                    <tr><td><input type="checkbox" name="gejala" value="Adanya Darah dalam Tinja"></td><td>Adanya Darah dalam Tinja</td></tr>
                    <tr>
                      <td><input type="checkbox" id="gejala_lainnya_chk" name="gejala" value="Lainnya"></td>
                      <td><input type="text" id="gejala_lainnya_text" class="form-control" placeholder="Tuliskan gejala lainnya..." disabled></td>
                    </tr>
                  </tbody>
                </table>

                <button id="btnSimpanGejala" class="btn btn-success" onclick="simpanGejala()">
                  <i class="fa fa-file"></i> Simpan
                </button>

              </div><!-- /.form-body -->
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

<!-- CSS kecil untuk behaviour -->
<style>
  /* tampilan disabled input */
  #gejala_lainnya_text.disabled {
    background-color: #efefef;
    cursor: not-allowed;
  }
  /* td clickable */
  .td-clickable { cursor: pointer; }
</style>

<script>
(function () {
  // helper toggler: enable/disable, fokus, sinkron class
  function toggleLainnya(checked) {
    var txt = document.getElementById('gejala_lainnya_text');
    if (!txt) return;
    if (checked) {
      txt.removeAttribute('disabled');
      txt.classList.remove('disabled');
      txt.style.pointerEvents = 'auto';
      try { txt.focus(); txt.select(); } catch(e) {}
    } else {
      txt.setAttribute('disabled', 'disabled');
      txt.classList.add('disabled');
      txt.style.pointerEvents = 'none';
      txt.value = '';
    }
  }

  // init after DOM ready
  function init() {
    var chk = document.getElementById('gejala_lainnya_chk');
    var txt = document.getElementById('gejala_lainnya_text');
    if (!chk || !txt) return;

    // initial sync state (in case checkbox pre-checked by server)
    toggleLainnya(chk.checked);

    // prefer jQuery if available
    if (window.jQuery) {
      var $chk = $('#gejala_lainnya_chk');
      var $td  = $chk.closest('td');

      $chk.on('change', function () {
        toggleLainnya(this.checked);
      });

      if ($td && $td.length) {
        $td.addClass('td-clickable').on('click', function (e) {
          if (e.target === $chk[0] || e.target.id === 'gejala_lainnya_text') return;
          $chk.prop('checked', !$chk.prop('checked')).trigger('change');
        });
      }

      $('#gejala_lainnya_text').on('click', function (e) { e.stopPropagation(); });

    } else {
      // vanilla fallback
      chk.addEventListener('change', function () { toggleLainnya(this.checked); });

      var td = chk.closest ? chk.closest('td') : chk.parentNode;
      if (td) {
        td.classList.add('td-clickable');
        td.addEventListener('click', function (e) {
          if (e.target === chk || e.target.id === 'gejala_lainnya_text') return;
          chk.checked = !chk.checked;
          var evt = document.createEvent('HTMLEvents'); evt.initEvent('change', true, false);
          chk.dispatchEvent(evt);
        });
      }

      txt.addEventListener('click', function (e) { e.stopPropagation(); });
    }

    // safety pointer-events
    txt.style.pointerEvents = chk.checked ? 'auto' : 'none';
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
  } else {
    init();
  }
})();

// Simpan GEJALA DIALAMI (SweetAlert konfirmasi)
function simpanGejala(){
  var id_mcu = (document.getElementById('id_mcu') || {}).value || '';
  if(!id_mcu){
    swal({ title: "Oops", text: "id_mcu wajib ada.", type: "warning", confirmButtonColor: "#3cb878" });
    return;
  }

  // Ambil semua checked (name="gejala") -> array nilai
  var gejalaArr = Array.from(document.querySelectorAll('input[name="gejala"]:checked'))
                  .map(function(el){ return el.value; });

  var lainTxtEl = document.getElementById('gejala_lainnya_text');
  var lainTxt   = (lainTxtEl && !lainTxtEl.disabled) ? lainTxtEl.value.trim() : '';

  var gejalaString = gejalaArr.join(', ');

  var btn = document.getElementById('btnSimpanGejala');

  swal({
    title: "Apakah kamu yakin?",
    text: "Menyimpan data gejala ini?",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3cb878",
    confirmButtonText: "Yakin",
    cancelButtonText: "Batal",
    closeOnConfirm: false
  }, function () {
    if (btn) btn.disabled = true;

    $.ajax({
      url: "<?= base_url('Quitioners/simpan_gejala_dialami'); ?>",
      method: "POST",
      dataType: "json",
      data: {
        id_mcu: id_mcu,
        gejala: gejalaString,
        gejala_lainnya_text: lainTxt
      },
      success: function(res){
        if(res && res.status === "success"){
          swal({
            title: "Berhasil!",
            type: "success",
            text: "Data gejala telah disimpan.",
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
=======
<div class="row">
  <div class="col-sm-12">
    <div class="panel panel-default card-view">
      <div class="panel-heading">
        <div class="pull-left">
          <h1 class="panel-title txt-dark"><strong>Gejala Dialami</strong></h1>
        </div>
        <div class="clearfix"></div>
      </div>

      <div class="panel-wrapper collapse in">
        <div class="panel-body">
          <div class="table-wrap">
            <div class="form-wrap">
              <div class="form-body">

                <!-- Hidden: id_mcu (id_staff tidak perlu di view) -->
                <input type="hidden" id="id_mcu"
                  value="<?= isset($id_mcu) && $id_mcu ? htmlspecialchars($id_mcu, ENT_QUOTES, 'UTF-8') : (isset($data_mcu['id_mcu']) ? htmlspecialchars($data_mcu['id_mcu'], ENT_QUOTES, 'UTF-8') : '') ?>">

                <table class="table table-bordered">
                  <thead class="btn-success text-white">
                    <tr>
                      <th colspan="2" class="text-center bg-success">Gejala Yang Dialami Sekarang</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr><td><input type="checkbox" name="gejala" value="Pusing / Pingsan Tanpa Sebab"></td><td>Pusing / Pingsan Tanpa Sebab</td></tr>
                    <tr><td><input type="checkbox" name="gejala" value="Nafas Pendek"></td><td>Nafas Pendek</td></tr>
                    <tr><td><input type="checkbox" name="gejala" value="Batuk Lebih dari Dua Minggu"></td><td>Batuk Lebih dari Dua Minggu</td></tr>
                    <tr><td><input type="checkbox" name="gejala" value="Pembengkakan di Mata Kaki"></td><td>Pembengkakan di Mata Kaki</td></tr>
                    <tr><td><input type="checkbox" name="gejala" value="Kesemutan/Baal"></td><td>Kesemutan/Baal</td></tr>
                    <tr><td><input type="checkbox" name="gejala" value="Turun Berat Badan Lebih dari Lima Kg"></td><td>Turun Berat Badan Lebih dari Lima Kg</td></tr>
                    <tr><td><input type="checkbox" name="gejala" value="Sering Kencing dan Haus Berlebihan"></td><td>Sering Kencing dan Haus Berlebihan</td></tr>
                    <tr><td><input type="checkbox" name="gejala" value="Sering Nyeri Sendi"></td><td>Sering Nyeri Sendi</td></tr>
                    <tr><td><input type="checkbox" name="gejala" value="Kebiasaan B.A.B Berubah"></td><td>Kebiasaan B.A.B Berubah</td></tr>
                    <tr><td><input type="checkbox" name="gejala" value="Sering Sesak Nafas, Batuk dan Menangis"></td><td>Sering Sesak Nafas, Batuk dan Menangis</td></tr>
                    <tr><td><input type="checkbox" name="gejala" value="Sering Sakit Pinggang"></td><td>Sering Sakit Pinggang</td></tr>
                    <tr><td><input type="checkbox" name="gejala" value="Sakit Kulit/Luka Lama Sembuh"></td><td>Sakit Kulit/Luka Lama Sembuh</td></tr>
                    <tr><td><input type="checkbox" name="gejala" value="Ada Tahi Lalat > 6 Buah dan 1/2 cm"></td><td>Ada Tahi Lalat > 6 Buah dan 1/2 cm</td></tr>
                    <tr><td><input type="checkbox" name="gejala" value="Kesulitan Membaca Jarak Dekat"></td><td>Kesulitan Membaca Jarak Dekat</td></tr>
                    <tr><td><input type="checkbox" name="gejala" value="Sulit Tidur"></td><td>Sulit Tidur</td></tr>
                    <tr><td><input type="checkbox" name="gejala" value="Terlintas Ingin Bunuh Diri"></td><td>Terlintas Ingin Bunuh Diri</td></tr>
                    <tr><td><input type="checkbox" name="gejala" value="Cepat Lelah"></td><td>Cepat Lelah</td></tr>
                    <tr><td><input type="checkbox" name="gejala" value="Gangguan Pendengaran"></td><td>Gangguan Pendengaran</td></tr>
                    <tr><td><input type="checkbox" name="gejala" value="Adanya Darah dalam Tinja"></td><td>Adanya Darah dalam Tinja</td></tr>
                    <tr>
                      <td><input type="checkbox" id="gejala_lainnya_chk" name="gejala" value="Lainnya"></td>
                      <td><input type="text" id="gejala_lainnya_text" class="form-control" placeholder="Tuliskan gejala lainnya..." disabled></td>
                    </tr>
                  </tbody>
                </table>

                <button id="btnSimpanGejala" class="btn btn-success" onclick="simpanGejala()">
                  <i class="fa fa-file"></i> Simpan
                </button>

              </div><!-- /.form-body -->
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

<!-- CSS kecil untuk behaviour -->
<style>
  /* tampilan disabled input */
  #gejala_lainnya_text.disabled {
    background-color: #efefef;
    cursor: not-allowed;
  }
  /* td clickable */
  .td-clickable { cursor: pointer; }
</style>

<script>
(function () {
  // helper toggler: enable/disable, fokus, sinkron class
  function toggleLainnya(checked) {
    var txt = document.getElementById('gejala_lainnya_text');
    if (!txt) return;
    if (checked) {
      txt.removeAttribute('disabled');
      txt.classList.remove('disabled');
      txt.style.pointerEvents = 'auto';
      try { txt.focus(); txt.select(); } catch(e) {}
    } else {
      txt.setAttribute('disabled', 'disabled');
      txt.classList.add('disabled');
      txt.style.pointerEvents = 'none';
      txt.value = '';
    }
  }

  // init after DOM ready
  function init() {
    var chk = document.getElementById('gejala_lainnya_chk');
    var txt = document.getElementById('gejala_lainnya_text');
    if (!chk || !txt) return;

    // initial sync state (in case checkbox pre-checked by server)
    toggleLainnya(chk.checked);

    // prefer jQuery if available
    if (window.jQuery) {
      var $chk = $('#gejala_lainnya_chk');
      var $td  = $chk.closest('td');

      $chk.on('change', function () {
        toggleLainnya(this.checked);
      });

      if ($td && $td.length) {
        $td.addClass('td-clickable').on('click', function (e) {
          if (e.target === $chk[0] || e.target.id === 'gejala_lainnya_text') return;
          $chk.prop('checked', !$chk.prop('checked')).trigger('change');
        });
      }

      $('#gejala_lainnya_text').on('click', function (e) { e.stopPropagation(); });

    } else {
      // vanilla fallback
      chk.addEventListener('change', function () { toggleLainnya(this.checked); });

      var td = chk.closest ? chk.closest('td') : chk.parentNode;
      if (td) {
        td.classList.add('td-clickable');
        td.addEventListener('click', function (e) {
          if (e.target === chk || e.target.id === 'gejala_lainnya_text') return;
          chk.checked = !chk.checked;
          var evt = document.createEvent('HTMLEvents'); evt.initEvent('change', true, false);
          chk.dispatchEvent(evt);
        });
      }

      txt.addEventListener('click', function (e) { e.stopPropagation(); });
    }

    // safety pointer-events
    txt.style.pointerEvents = chk.checked ? 'auto' : 'none';
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
  } else {
    init();
  }
})();

// Simpan GEJALA DIALAMI (SweetAlert konfirmasi)
function simpanGejala(){
  var id_mcu = (document.getElementById('id_mcu') || {}).value || '';
  if(!id_mcu){
    swal({ title: "Oops", text: "id_mcu wajib ada.", type: "warning", confirmButtonColor: "#3cb878" });
    return;
  }

  // Ambil semua checked (name="gejala") -> array nilai
  var gejalaArr = Array.from(document.querySelectorAll('input[name="gejala"]:checked'))
                  .map(function(el){ return el.value; });

  var lainTxtEl = document.getElementById('gejala_lainnya_text');
  var lainTxt   = (lainTxtEl && !lainTxtEl.disabled) ? lainTxtEl.value.trim() : '';

  var gejalaString = gejalaArr.join(', ');

  var btn = document.getElementById('btnSimpanGejala');

  swal({
    title: "Apakah kamu yakin?",
    text: "Menyimpan data gejala ini?",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3cb878",
    confirmButtonText: "Yakin",
    cancelButtonText: "Batal",
    closeOnConfirm: false
  }, function () {
    if (btn) btn.disabled = true;

    $.ajax({
      url: "<?= base_url('Quitioners/simpan_gejala_dialami'); ?>",
      method: "POST",
      dataType: "json",
      data: {
        id_mcu: id_mcu,
        gejala: gejalaString,
        gejala_lainnya_text: lainTxt
      },
      success: function(res){
        if(res && res.status === "success"){
          swal({
            title: "Berhasil!",
            type: "success",
            text: "Data gejala telah disimpan.",
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
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
</script>