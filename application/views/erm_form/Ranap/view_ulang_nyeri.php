<?php
// view_ulang_nyeri.php
// Pastikan $no_rm, $nama, $tgl_lahir, $jenis_kelamin, $id_pelayanan, $id_history,
// $ruang_rawat, $list_perawat dan (opsional) $selected_perawat dikirim dari controller.
?>
<style>
/* ================================
   FIX WARNA RADIO BUTTON (HITAM)
   ================================ */
.radio-button label,
.radio-button-primary label {
  color: #000 !important;
  font-weight: 400;
}

input[type="radio"] + label {
  color: #000 !important;
}

.radio-button input[type="radio"]:checked + label {
  color: #000 !important;
  font-weight: 500;
}

/* Jarak antar field tanda vital */
.form-group {
  margin-bottom: 18px;
}

.select2-container--default .select2-search--dropdown .select2-search__field {
  color: #000 !important;          /* hitam */
  font-size: 14px;
  font-family: inherit;
}
  /* Jarak atas untuk judul section */
.section-title {
  margin-top: 25px;
  display: block;
}

.select2-container--default .select2-selection--single {
  height: 38px;
  padding: 4px 8px;
  font-family: inherit;      /* ikut font form */
  font-size: 14px;
  color: #000;               /* hitam jelas */
}

/* teks di dalam select */
.select2-container--default .select2-selection--single .select2-selection__rendered {
  line-height: 28px;
  color: #000;
}

/* dropdown option */
.select2-container--default .select2-results__option {
  font-size: 14px;
  color: #000;
}

/* option hover / aktif */
.select2-container--default .select2-results__option--highlighted[aria-selected] {
  background-color: #3cb878; /* hijau sesuai tombol kamu */
  color: #fff;
}

/* placeholder */
.select2-container--default .select2-selection__placeholder {
  color: #999;
}

</style>
<!-- Row -->
<div class="row">
  <div class="col-sm-12">
    <div class="panel panel-default card-view">
      <div class="panel-heading">
        <div class="pull-left">
          <h6 class="panel-title txt-dark">ASSESMENT ULANG NYERI</h6>
        </div>
        <div class="clearfix"></div>
      </div>

      <div class="panel-wrapper collapse in">
        <div class="panel-body">
          <div class="form-wrap">

            <!-- IDENTITAS PASIEN -->
            <div class="form-group clearfix">
              <div class="col-md-3">
                <label class="control-label mb-10 text-left">No.RM</label>
                <input type="text" disabled class="form-control" value="<?= htmlspecialchars($no_rm ?? '') ?>" id="inNoRM">
                <input type="hidden" class="form-control" value="<?= htmlspecialchars($id_pelayanan ?? '') ?>" id="inPel">
                <input type="hidden" class="form-control" value="<?= htmlspecialchars($id_history ?? '') ?>" id="inHis">
                <input type="hidden" class="form-control" id="id_asses">
              </div>

              <div class="col-md-3">
                <label class="control-label mb-10 text-left">Nama</label>
                <input type="text" disabled class="form-control" value="<?= htmlspecialchars($nama ?? '') ?>" id="inNama">
              </div>

              <div class="col-md-3">
                <label class="control-label mb-10 text-left">Tgl Lahir / Umur</label>
                <input type="text" disabled class="form-control" value="<?php
                setlocale(LC_ALL, 'id_ID');
                date_default_timezone_set('Asia/Jakarta');
                $time = isset($tgl_lahir) ? strtotime($tgl_lahir) : time();
                $date = strftime(' %d %B %Y ', $time);
                echo $date . '(' . (function_exists('getAge') ? getAge($tgl_lahir) : '') . ')';
                ?>">
              </div>

              <div class="col-md-3">
                <label class="control-label mb-10 text-left">Jenis Kelamin</label>
                <input type="text" disabled class="form-control" value="<?= htmlspecialchars($jenis_kelamin ?? '') ?>" id="inJk">
              </div>
            </div>

            <!-- ENTRI ASESMEN ULANG NYERI -->
            <div class="form-group clearfix" style="margin-top:20px;">
              <div class="col-md-12">
                <h5><strong>
                    <label class="control-label mb-10 text-left">
                      ENTRI ASESMEN ULANG NYERI
                    </label>
                  </strong></h5>
              </div>
            </div>

            <!-- ROW: TGL / SKOR NYERI / POSS -->
            <div class="form-group clearfix">
              <!-- TGL/JAM -->
              <div class="col-md-3">
                <label class="control-label mb-10 text-left">Tgl / Pukul</label>
                <input type="datetime-local" class="form-control" id="inTglJam">
                <span id="tgljam_error" class="text-danger"></span>
              </div>

              <!-- SKOR NYERI -->
              <div class="col-md-4">
                <label class="control-label mb-10 text-left">Skor Nyeri (NRS 0–10)</label>
                <span id="skor_error" class="text-danger"></span>

                <div class="radio-button radio-button-primary">
                  <input id="nyeri0" type="radio" name="skor_nyeri" value="0">
                  <label for="nyeri0">0 - Tidak ada nyeri</label>
                </div>
                <div class="radio-button radio-button-primary">
                  <input id="nyeri1" type="radio" name="skor_nyeri" value="1-3">
                  <label for="nyeri1">1–3 - Nyeri ringan</label>
                </div>
                <div class="radio-button radio-button-primary">
                  <input id="nyeri2" type="radio" name="skor_nyeri" value="4-6">
                  <label for="nyeri2">4–6 - Nyeri sedang</label>
                </div>
                <div class="radio-button radio-button-primary">
                  <input id="nyeri3" type="radio" name="skor_nyeri" value="7-10">
                  <label for="nyeri3">7–10 - Nyeri berat</label>
                </div>
              </div>

              <!-- SEDASI (POSS) -->
              <div class="col-md-5">
                <label class="control-label mb-10 text-left">Sedasi (POSS)</label>
                <span id="poss_error" class="text-danger"></span>

                <div class="radio-button radio-button-primary">
                  <input id="possS" type="radio" name="poss" value="S">
                  <label for="possS">S - Tidur, mudah dibangunkan</label>
                </div>
                <div class="radio-button radio-button-primary">
                  <input id="poss1" type="radio" name="poss" value="1">
                  <label for="poss1">1 - Bangun dan sadar</label>
                </div>
                <div class="radio-button radio-button-primary">
                  <input id="poss2" type="radio" name="poss" value="2">
                  <label for="poss2">2 - Agak mengantuk, mudah dibangunkan</label>
                </div>
                <div class="radio-button radio-button-primary">
                  <input id="poss3" type="radio" name="poss" value="3">
                  <label for="poss3">3 - Sering mengantuk, mudah tertidur saat bicara</label>
                </div>
                <div class="radio-button radio-button-primary">
                  <input id="poss4" type="radio" name="poss" value="4">
                  <label for="poss4">4 - Somnolent, minimal/tidak respon</label>
                </div>
              </div>
            </div>

            <!-- ROW: TANDA VITAL & PETUGAS (MENDATAR DI KIRI) -->
        <div class="form-group">
            <div class="col-md-4">
              <label class="control-label mb-10">Tekanan Darah</label>
              <input type="text" class="form-control" id="inTD">
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-4">
              <label class="control-label mb-10">Nadi</label>
              <input type="number" class="form-control"  id="inNadi">
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-4">
              <label class="control-label mb-10">Pernafasan</label>
              <input type="number" class="form-control"  id="inRR">
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-4">
              <label class="control-label mb-10">Suhu</label>
              <input type="number" class="form-control"  id="inSuhu">
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-4">
              <label class="control-label mb-10">Berat Badan</label>
              <input type="text" class="form-control"  id="berat_badan">
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-4">
              <label class="control-label mb-10">Tinggi Badan</label>
              <input type="text" class="form-control" id="tinggi_badan">
            </div>
        </div>


            <!-- ROW: INTERVENSI FARMAKOLOGI & NON FARMAKOLOGI -->
            <div class="form-group clearfix" style="margin-top:20px;">
              <!-- FARMAKOLOGI -->
              <div class="col-md-6">
                <label class="control-label mb-10 text-left section-title"><strong>Intervensi Farmakologi</strong></label>

<div class="form-group">
  <label class="control-label mb-5">Nama Obat</label>

  <select class="form-control" id="inNamaObat" name="nama_obat" style="width:100%">
    <option value="">-- Pilih Obat --</option>

    <?php if (!empty($list_obat)): ?>
      <?php foreach ($list_obat as $o): ?>
        <option value="<?= $o->id_logistik ?>">
          <?= htmlspecialchars($o->nama_obat) ?>
        </option>
      <?php endforeach; ?>
    <?php endif; ?>
  </select>
</div>









                <div class="form-group">
                  <label class="control-label mb-5">Dosis & Frekuensi</label>
                  <input type="text" class="form-control" id="inDosis" placeholder="mis: 3x1, tiap 8 jam">
                </div>

                <div class="form-group">
                  <label class="control-label mb-5">Rute</label>
                  <input type="text" class="form-control" id="inRute" placeholder="IV / IM / PO / SC">
                </div>
              </div>

              <!-- NON FARMAKOLOGI -->
              <div class="col-md-6">
                <label class="control-label mb-10 text-left section-title"><strong>Intervensi Non-Farmakologi</strong></label>
                <span id="nonfarmak_error" class="text-danger"></span>

                <div class="radio-button radio-button-primary">
                  <input id="non1" type="radio" name="nonfarmak" value="Kompres dingin">
                  <label for="non1">Kompres dingin</label>
                </div>
                <div class="radio-button radio-button-primary">
                  <input id="non2" type="radio" name="nonfarmak" value="Kompres panas">
                  <label for="non2">Kompres panas</label>
                </div>
                <div class="radio-button radio-button-primary">
                  <input id="non3" type="radio" name="nonfarmak" value="Atur posisi">
                  <label for="non3">Atur posisi</label>
                </div>
                <div class="radio-button radio-button-primary">
                  <input id="non4" type="radio" name="nonfarmak" value="Distraksi">
                  <label for="non4">Distraksi (musik/TV/baca)</label>
                </div>
                <div class="radio-button radio-button-primary">
                  <input id="non5" type="radio" name="nonfarmak" value="Pijat">
                  <label for="non5">Pijat / massage</label>
                </div>
                <div class="radio-button radio-button-primary">
                  <input id="non6" type="radio" name="nonfarmak" value="TENS">
                  <label for="non6">TENS</label>
                </div>
                <div class="radio-button radio-button-primary">
                  <input id="non7" type="radio" name="nonfarmak" value="Relaksasi">
                  <label for="non7">Teknik relaksasi & pernapasan</label>
                </div>
              </div>
            </div>

            <!-- WAKTU KAJIAN ULANG -->
            <div class="form-group clearfix" style="margin-top:15px;">
              <div class="col-md-3">
                <label class="control-label mb-10 text-left">Waktu Kajian Ulang</label>
                <input type="datetime-local" class="form-control" id="inWaktuUlang" readonly
                       placeholder="Otomatis dari skor nyeri">
                <small id="ket_waktu_ulang" class="text-muted"></small>
              </div>
            </div>

            <!-- BUTTONS -->
            <div class="form-group clearfix" style="margin-top:25px;">
              <div class="col-md-12">
                <a class="btn btn-default btn-anim btn-sm"
                   onclick="javascript:history.go(-1)"
                   style="margin-right:20px; margin-left:30px;">
                  <i class="fa fa-arrow-left"></i>
                  <span class="btn-text">KEMBALI</span>
                </a>

                <button id="btnSimpan" onclick="simpanNyeri()" type="button"
                        class="btn btn-success mb-4">Simpan</button>

                <button id="btnEdit" style="display:none;" type="button"
                        onclick="editNyeri()" class="btn btn-warning mb-4">Update</button>

                <button style="display:none;" type="button" class="btn btn-success mb-4"
                        onclick="cetakNyeri()">Cetak</button>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>

    <!-- TABEL CATATAN ASESMEN ULANG NYERI -->
    <div class="panel panel-default card-view">
      <div class="panel-heading">
        <div class="pull-left">
          <h6 class="panel-title txt-dark">CATATAN ASESMEN ULANG NYERI</h6>
        </div>
        <div class="clearfix"></div>
      </div>
      <div class="panel-wrapper collapse in">
        <div class="panel-body">
          <div class="form-group">
            <div class="col-md-12">
              <div class="table-wrap">
                <div class="table-responsive">
                  <table class="table table-hover display pb-60" id="tabel_ulang_nyeri">
                    <thead>
                    <tr class="bg-success">
                      <th>NO</th>
                      <th>PILIH</th>
                      <th>HAPUS</th>
                      <th>TGL / PUKUL</th>
                      <th>SKOR NYERI</th>
                      <th>POSS</th>
                      <th>TD</th>
                      <th>NADI</th>
                      <th>SUHU</th>
                      <th>RR</th>
                      <th>BB</th>
                      <th>TB</th>
                      <th>INTERVENSI FARMAKOLOGI</th>
                      <th>INTERVENSI NON FARMAKOLOGI</th>
                      <th>WKT KAJIAN ULANG</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr class="bg-success">
                      <th>NO</th>
                      <th>PILIH</th>
                      <th>HAPUS</th>
                      <th>TGL / PUKUL</th>
                      <th>SKOR NYERI</th>
                      <th>POSS</th>
                      <th>TD</th>
                      <th>NADI</th>
                      <th>SUHU</th>
                      <th>RR</th>
                      <th>BB</th>
                      <th>TB</th>
                      <th>INTERVENSI FARMAKOLOGI</th>
                      <th>INTERVENSI NON FARMAKOLOGI</th>
                      <th>WKT KAJIAN ULANG</th>
                    </tr>
                    </tfoot>
                    <tbody style="color:black"></tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <style>
      canvas {
        cursor: crosshair;
        border: 1px solid #000000;
      }
    </style>

    <script type="text/javascript">
      function formatDateTimeLocal(dateObj) {
        var yyyy = dateObj.getFullYear();
        var mm   = String(dateObj.getMonth() + 1).padStart(2, '0');
        var dd   = String(dateObj.getDate()).padStart(2, '0');
        var hh   = String(dateObj.getHours()).padStart(2, '0');
        var min  = String(dateObj.getMinutes()).padStart(2, '0');
        return yyyy + '-' + mm + '-' + dd + 'T' + hh + ':' + min;
      }

      function getKeteranganWaktuUlang(skor) {
        if (skor === "0") {
          return "Dihentikan bila skor nyeri 0";
        } else if (skor === "1-3") {
          return "1×/shift (±8 jam) bila skor nyeri 1–3";
        } else if (skor === "4-6") {
          return "Setiap 3 jam bila skor nyeri 4–6";
        } else if (skor === "7-10") {
          return "Setiap 1 jam bila skor nyeri 7–10";
        }
        return "";
      }

      function hitungWaktuKajianUlang() {
        var skor = $('input[name="skor_nyeri"]:checked').val();
        var baseStr = $('#inTglJam').val();
        var baseDate = baseStr ? new Date(baseStr) : new Date();
        var nextTime = null;

        var ket = getKeteranganWaktuUlang(skor || "");
        $('#ket_waktu_ulang').text(ket);

        if (!skor) {
          $('#inWaktuUlang').val('');
          return;
        }

        if (skor === "0") {
          $('#inWaktuUlang').val('');
          $('#inWaktuUlang').attr('placeholder', 'Dihentikan bila skor nyeri 0');
          return;
        }

        if (skor === "1-3") {
          nextTime = new Date(baseDate.getTime() + 8 * 60 * 60 * 1000);
        } else if (skor === "4-6") {
          nextTime = new Date(baseDate.getTime() + 3 * 60 * 60 * 1000);
        } else if (skor === "7-10") {
          nextTime = new Date(baseDate.getTime() + 1 * 60 * 60 * 1000);
        }

        if (nextTime) {
          $('#inWaktuUlang').val(formatDateTimeLocal(nextTime));
        }
      }

      function setKeteranganOnlyFromSkor(skor) {
        $('#ket_waktu_ulang').text(getKeteranganWaktuUlang(skor || ""));
      }

      $(document).ready(function () {
        var id_pelayanan = $('#inPel').val();
        reload_data_nyeri(id_pelayanan);

        // set default tanggal sekarang, tapi masih bisa ubah manual
        var now = new Date();
        $('#inTglJam').val(formatDateTimeLocal(now));

        $('input[name="skor_nyeri"]').on('change', function () {
          hitungWaktuKajianUlang();
        });

        $('#inTglJam').on('change', function () {
          hitungWaktuKajianUlang();
        });
      });

     function simpanNyeri() {
      var id_pelayanan = $('#inPel').val();
      var id_history   = $('#inHis').val();
      var no_rm        = $('#inNoRM').val();
      var tgl_jam     = $('#inTglJam').val();
      var skor_nyeri  = $('input[name="skor_nyeri"]:checked').val();
      var poss        = $('input[name="poss"]:checked').val();
      var td          = $('#inTD').val();
      var nadi        = $('#inNadi').val();
      var suhu        = $('#inSuhu').val();
      var rr          = $('#inRR').val();
      var berat_badan  = $('#berat_badan').val();
      var tinggi_badan = $('#tinggi_badan').val();
      var nama_obat   = $('#inNamaObat').val();
      var dosis       = $('#inDosis').val();
      var rute        = $('#inRute').val();
      var nonfarmak   = $('input[name="nonfarmak"]:checked').val();
      var waktu_ulang = $('#inWaktuUlang').val();

      if (!tgl_jam || !skor_nyeri || !poss || !nonfarmak) {
        alert('Lengkapi data wajib');
        return;
      }

      $.ajax({
        url: "<?= base_url() ?>Erm_ranap_ulang_nyeri/insert_asesmen",
        type: "POST",
        dataType: "json",
        data: {
          id_pelayanan: id_pelayanan,
          id_history: id_history,
          no_rm: no_rm,
          tgl_jam: tgl_jam,
          skor_nyeri: skor_nyeri,
          poss: poss,
          td: td,
          nadi: nadi,
          suhu: suhu,
          rr: rr,
          berat_badan: berat_badan,
          tinggi_badan: tinggi_badan,
          nama_obat: nama_obat,
          dosis: dosis,
          rute: rute,
          nonfarmak: nonfarmak,
          waktu_ulang: waktu_ulang
        },

        success: function (res) {
          if (res.status === 'success') {
            swal('Berhasil', 'Data tersimpan', 'success');
            reload_data_nyeri(id_pelayanan);
          } else {
            swal('Gagal', 'Data tidak tersimpan', 'warning');
          }
        }
      });
    }


    function reload_data_nyeri() {

  // ⬅️ AMBIL NO_RM, BUKAN ID_PELAYANAN
  var no_rm = $('#inNoRM').val();

  // ⬅️ HANCURKAN DATATABLE DENGAN API BARU
  if ($.fn.DataTable.isDataTable('#tabel_ulang_nyeri')) {
    $('#tabel_ulang_nyeri').DataTable().clear().destroy();
  }

  $('#tabel_ulang_nyeri').DataTable({
    language: {
      sEmptyTable: "Tidak ada data yang tersedia pada tabel ini",
      sProcessing: "Sedang memproses...",
      sLengthMenu: "Tampilkan _MENU_ entri",
      sZeroRecords: "Tidak ditemukan data yang sesuai",
      sInfo: "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
      sInfoEmpty: "Menampilkan 0 sampai 0 dari 0 entri",
      sInfoFiltered: "(disaring dari _MAX_ entri keseluruhan)",
      sSearch: "Cari:",
      oPaginate: {
        sFirst: "Pertama",
        sPrevious: "Sebelumnya",
        sNext: "Selanjutnya",
        sLast: "Terakhir"
      }
    },
    processing: true,
    deferRender: true,
    order: [],
    columnDefs: [{
      targets: [0],
      orderable: false
    }],
    ajax: {
      url: "<?= base_url('Erm_ranap_ulang_nyeri/tampil_list_asesmen'); ?>",
      type: "POST",
      data: {
        no_rm: no_rm   // ⬅️ INI KUNCI UTAMA
      },
      dataSrc: "data"
    }
  });
}


      function pilihNyeri(id) {
        $.ajax({
          url: "<?= base_url() ?>Erm_ranap_ulang_nyeri/get_asesmen",
          method: "POST",
          dataType: 'json',
          data: { id: id },
          success: function (data) {
            if (data.status_dt === "found") {
              $('#id_asses').val(data.id);
              $('#inTglJam').val(data.tgl_jam);

              $('input[name="skor_nyeri"]').prop('checked', false);
              $('input[name="poss"]').prop('checked', false);
              $('input[name="nonfarmak"]').prop('checked', false);

              $('input[name="skor_nyeri"][value="' + data.skor_nyeri + '"]').prop('checked', true);
              $('input[name="poss"][value="' + data.poss + '"]').prop('checked', true);
              $('input[name="nonfarmak"][value="' + data.nonfarmak + '"]').prop('checked', true);

              $('#inTD').val(data.td);
              $('#inNadi').val(data.nadi);
              $('#inSuhu').val(data.suhu);
              $('#inRR').val(data.rr);
              // controller harus mengirimkan perawat sebagai id_staff agar ini bekerja
              $('#inPerawat').val(data.perawat);
              $('#inParaf').val(data.paraf);
              $('#inNamaObat').val(data.nama_obat);
              $('#inDosis').val(data.dosis);
              $('#inRute').val(data.rute);
              $('#inWaktuUlang').val(data.waktu_ulang);

              setKeteranganOnlyFromSkor(data.skor_nyeri);

              $('#btnEdit').show();
              $('#btnSimpan').hide();

              window.scrollTo({ top: 0, behavior: 'smooth' });
            } else {
              swal({
                title: "Gagal!",
                type: "warning",
                text: "Data tidak ditemukan",
                confirmButtonColor: "#3cb878",
              });
            }
          }
        });
        return false;
      }

      function editNyeri() {
        var id = $('#id_asses').val();
        var id_pelayanan = $('#inPel').val();
        var tgl_jam     = $('#inTglJam').val();
        var skor_nyeri  = $('input[name="skor_nyeri"]:checked').val();
        var poss        = $('input[name="poss"]:checked').val();
        var td          = $('#inTD').val();
        var nadi        = $('#inNadi').val();
        var suhu        = $('#inSuhu').val();
        var rr          = $('#inRR').val();
        var berat_badan  = $('#berat_badan').val();
        var tinggi_badan = $('#tinggi_badan').val();
        var nama_obat   = $('#inNamaObat').val();
        var dosis       = $('#inDosis').val();
        var rute        = $('#inRute').val();
        var nonfarmak   = $('input[name="nonfarmak"]:checked').val();
        var waktu_ulang = $('#inWaktuUlang').val();

        $.ajax({
          url: "<?= base_url() ?>Erm_ranap_ulang_nyeri/update_asesmen",
          method: "POST",
          dataType: "json",
          data: {
            id: id,
            tgl_jam: tgl_jam,
            skor_nyeri: skor_nyeri,
            poss: poss,
            td: td,
            nadi: nadi,
            suhu: suhu,
            rr: rr,
            berat_badan: berat_badan,
            tinggi_badan: tinggi_badan,
            nama_obat: nama_obat,
            dosis: dosis,
            rute: rute,
            nonfarmak: nonfarmak,
            waktu_ulang: waktu_ulang
          },
          success: function (res) {
            if (res.status === "success") {
              swal({
                title: "Berhasil Update!",
                type: "success",
                text: "Data berhasil diubah",
                confirmButtonColor: "#3cb878"
              });
              reload_data_nyeri(id_pelayanan);
              $('#btnEdit').hide();
              $('#btnSimpan').show();
            } else {
              swal({
                title: "Gagal!",
                type: "warning",
                text: res.msg || "Update gagal",
                confirmButtonColor: "#3cb878"
              });
            }
          }
        });

        return false;
      }


      function hapusNyeri(id) {
        swal({
          title: "Warning?",
          text: "Apakah kamu yakin menghapus data ini?",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3cb878",
          confirmButtonText: "Yakin",
          cancelButtonText: "Batal",
          closeOnConfirm: false
        }, function () {
          $.ajax({
            url: "<?= base_url() ?>Erm_ranap_ulang_nyeri/hapus_asesmen",
            method: "POST",
            dataType: 'json',
            data: { id: id },
            success: function (data) {
              if (data.status === "success") {
                swal({
                  title: "Good job!",
                  type: "success",
                  text: "Data berhasil dihapus",
                  confirmButtonColor: "#3cb878",
                });
                var id_pelayanan = $('#inPel').val();
                reload_data_nyeri(id_pelayanan);
              } else {
                swal({
                  title: "Gagal!",
                  type: "warning",
                  confirmButtonColor: "#3cb878",
                });
              }
            }
          });
        });
        return false;
      }

      function cetakNyeri() {
        var id_pelayanan = $('#inPel').val();
        var id_history  = $('#inHis').val();
        window.open("<?= base_url('Erm_ranap_ulang_nyeri/cetak_asesmen/') ?>" + id_pelayanan + "/" + id_history,
          "_blank");
      }
    </script>

<script>
$(document).ready(function () {
  var id_pelayanan = $('#inPel').val();

  $.ajax({
    url: "<?= base_url() ?>Erm_ranap_asesmen_perawat/get_ass_rajal",
    method: "POST",
    dataType: "json",
    data: { id: id_pelayanan },
    success: function (data) {

      // fungsi helper: jika ada data → disable, jika kosong → enable
      function setInput(id, value) {
        if (value !== null && value !== "" && value !== undefined) {
          $(id).val(value).prop('disabled', true);
        } else {
          $(id).val("").prop('disabled', false);
        }
      }

      setInput('#inTD', data.tekanan_darah);
      setInput('#inNadi', data.frequensi_nadi);
      setInput('#inRR', data.frequensi_nafas);
      setInput('#inSuhu', data.suhu);
      setInput('#berat_badan', data.berat_badan);
      setInput('#tinggi_badan', data.tinggi_badan);

    },
    error: function () {
      // jika AJAX gagal → semua boleh diisi manual
      $('#inTD, #inNadi, #inRR, #inSuhu, #berat_badan, #tinggi_badan')
        .prop('disabled', false);
    }
  });

  // default tanggal sekarang
  let now = new Date();
  $('#inTglJam').val(now.toISOString().slice(0,16));
});
</script>

<script>
window.onload = function () {
  if ($('#inNamaObat option').length > 1) {
    $('#inNamaObat').select2({
      placeholder: 'Ketik Nama Obat',
      allowClear: true,
      width: '100%'
    });
  } else {
    console.warn('Option obat kosong, select2 tidak di-init');
  }
};
</script>
