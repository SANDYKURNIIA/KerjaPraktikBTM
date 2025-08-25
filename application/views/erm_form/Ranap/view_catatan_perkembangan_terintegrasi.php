<div class="row">
  <div class="col-sm-12">
    <div class="panel panel-default card-view">
      <div class="panel-heading">
        <div class="pull-left">
          <h6 class="panel-title txt-dark">CATATAN PERKEMBANGAN PASIEN TERINTEGRASI</h6>
        </div>
        <div class="clearfix"></div>
      </div>
      <div class="panel-wrapper collapse in" id="myDiv">
        <div class="panel-body">
          <div class="form-wrap">
            <input type="hidden" class="form-control" value="<?= $id_pelayanan ?>" name="inPel" id="inPel">
            <input type="hidden" class="form-control" value="<?= $id_history ?>" name="inHis" id="inHis">
            <input type="hidden" class="form-control" value="" id="id" name="id">
            <input type="hidden" class="form-control" name="inNoRM" id="inNoRM" value="<?= $no_rm ?>">

            <div class="form-group row">
              <div class="col-md-10">
                <label class="control-label mb-10 text-left">Nama Pasien<span class="help"></span></label>
                <div class="has-success">
                  <input type="text" class="form-control" id="inNama" value="<?= $nama ?>" disabled>
                  <span class="help-block"></span>
                </div>
              </div>
            </div>

            <div class="form-group row">
              <div class="col-md-10">
                <label class="control-label mb-10 text-left">No RM<span class="help"></span></label>
                <div class="has-success">
                  <input type="text" class="form-control" name="inNoRM" id="inNoRM" value="<?= $no_rm ?>" disabled>
                  <span class="help-block"></span>
                </div>
              </div>
            </div>

            <div class="form-group row">
              <div class="col-md-10">
                <label class="control-label mb-10 text-left">Umur / Jenis Kelamin<span class="help"></span></label>
                <div class="has-success">
                  <input type="text" class="form-control" id="inUmur" value="<?php
                                                                              $tanggal = new DateTime($tgl_lahir);
                                                                              $today = new DateTime();
                                                                              $y = $today->diff($tanggal)->y;
                                                                              echo $y . " tahun, " . $jenis_kelamin; ?>" disabled>
                  <span class="help-block"></span>
                </div>
              </div>
            </div>


            <div class="form-group row">
              <div class="col-md-10">
                <label class="control-label mb-10 text-left">Nama DPJP<span class="help"></span></label>
                <span id="diagnosis_error" class="text-danger"></span>
                <div class="has-success">
                  <input type="text" class="form-control" name="inNamaDokter" id="inNamaDokter" value="<?= $nama_dokter ?>" disabled>
                  <span class="help-block"></span>
                </div>
              </div>
            </div>

            <div class="form-group row">
              <div class="col-md-6">
                <label class="control-label mb-10 text-left">Tanggal<span class="help"></span></label>
                <span id="tanggal_error" class="text-danger"></span>
                <div class="has-success">
                  <input type="date" class="form-control" id="inTgl" name="inTgl">
                  <span class="help-block"></span>
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-6">
                <label class="control-label mb-10 text-left">Mulai Pukul: <span class="help"></span></label>
                <span id="pukul_error" class="text-danger"></span>
                <div class="has-success">
                  <input type="time" class="form-control" id="inPukul" name="inPukul">
                  <span class="help-block"></span>
                </div>
              </div>
            </div>

            <script>
              // Set current time to the input field on page load
              window.onload = function() {
                const now = new Date();
                const hours = String(now.getHours()).padStart(2, '0');
                const minutes = String(now.getMinutes()).padStart(2, '0');
                document.getElementById("inPukul").value = `${hours}:${minutes}`;
              };
            </script>

            <div class="col-md-12">
              <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
            </div>


            <div class="form-group row">
              <div class="col-md-4">
                <label class="control-label mb-10 text-left">S: <span class="text-danger"></span></label>
                <span id="s_error" class="text-danger"></span>
                <div class="has-success">
                  <textarea class="form-control" cols="10" rows="10" id="s" name="s" required></textarea>
                  <span class="help-block text-danger"></span>
                </div>
              </div>
              <div class="col-md-4">
                <label class="control-label mb-10 text-left">O: <span class="text-danger"></span></label>
                <span id="o_error" class="text-danger"></span>
                <div class="has-success">
                  <textarea class="form-control" cols="10" rows="10" id="o" name="o" required></textarea>
                  <span class="help-block text-danger"></span>
                </div>
              </div>
              <div class="col-md-4">
                <label class="control-label mb-10 text-left">A: <span class="text-danger"></span></label>
                <span id="a_error" class="text-danger"></span>
                <div class="has-success">
                  <textarea class="form-control" cols="10" rows="10" id="a" name="a" required></textarea>
                  <span class="help-block text-danger"></span>
                </div>
              </div>
              <div class="col-md-4">
                <label class="control-label mb-10 text-left">P: <span class="text-danger"></span></label>
                <span id="p_error" class="text-danger"></span>
                <div class="has-success">
                  <textarea class="form-control" cols="10" rows="10" id="p" name="p" required></textarea>
                  <span class="help-block text-danger"></span>
                </div>
              </div>
            </div>

            <div class="form-group row">
              <!-- <div class="col-md-6">
                <label class="control-label mb-10 text-left">Hasil Pemeriksaan, Analisis, Rencana Penatalaksanaan
                  Pasien<span class="help"></span></label>
                <span id="hasil_error" class="text-danger"></span>
                <div class="has-success">
                  <textarea class="form-control" cols="10" rows="10" id="inHasil" name="inHasil" required></textarea>
                  <span class="help-block text-danger"></span>
                </div>
              </div> -->
              <div class="col-md-6">
                <label class="control-label mb-10 text-left">Instruksi Tenaga Kesehatan Termasuk Pasca
                  Bedah/Prosedur<span class="help"></span></label>
                <span id="instruksi_error" class="text-danger"></span>
                <div class="has-success">
                  <textarea class="form-control" cols="10" rows="10" id="inInstruksi" name="inInstruksi" required></textarea>
                  <span class="help-block text-danger"></span>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="control-label col-md-4 pt-5">Verifikasi Dokter:</label>
                  <div class="col-md-8 ">
                    <div class="radio-list">
                      <div class="radio-inline pl-0">
                        <span class="radio radio-info">
                          <input type="radio" value="Tidak" name="verifikasi_dokter" id="verifikasi_dokter_tidak" checked>
                          <label class="control-label" for="verifikasi_dokter_tidak">Tidak</label>
                        </span>
                      </div>
                      <div class="radio-inline pl-0">
                        <span class="radio radio-info">
                          <input type="radio" value="Ya" name="verifikasi_dokter" id="verifikasi_dokter_ya">
                          <label class="control-label" for="verifikasi_dokter_ya">Ya</label>
                        </span>
                      </div>
                      <span class="help-block"></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div id="detail_verifikasi" style="display: none;">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="control-label col-md-4 pt-5">Tanggal dan Jam:</label>
                  <div class="col-md-8 has-success">
                    <input type="datetime-local" class="form-control" id="tgl_verifikasi">
                    <span class="help-block"></span>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="control-label col-md-4 pt-5">Nama Dokter:</label>
                  <div class="col-md-8 has-success">
                    <select class="form-control filled-input select2" style="border: 1px solid lightgreen;" id="nama_dokter">
                      <option value="">-- Pilih Dokter --</option>
                      <?php
                      foreach ($dokter as $row) : ?>
                        <option value="<?php echo $row['nama']; ?>">
                          <?php echo $row['nama']; ?></option>
                      <?php endforeach; ?>

                    </select>
                    <span class="help-block"></span>
                  </div>
                </div>
              </div>
            </div>



            <div class="form-group text-center" style="margin-top: 30px;">
              <div class="col-md-12">
                <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
              </div>
              <div class="col-md-6">
                <a class="btn btn-default btn-anim btn-sm" onclick="javascript:history.go(-1)" style="margin-right: 20px; margin-left: 30px;"><i class="fa fa-arrow-left"></i><span class="btn-text">KEMBALI</span></a>
                <button id="simpan" onclick="simpan()" type="submit" class="btn btn-success mb-4">Simpan</button>
                <button style="display: none;" id="edit" type="submit" class="btn btn-warning mb-4" onclick="edit()">Edit</button>
                <button style="display: none;" id="cetak" type="submit" class="btn btn-primary mb-4" onclick="cetak()">Cetak</button>
              </div>
            </div>
            <canvas id="can" style="display:none;"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="panel panel-default card-view">
  <div class="panel-heading">
    <div class="pull-left">
      <h6 class="panel-title txt-dark">CATATAN PERKEMBANGAN</h6>
    </div>
    <div class="clearfix"></div>
  </div>
  <div class="panel-wrapper collapse in">
    <div class="panel-body">
      <div class="form-group">
        <div class="col-md-12">
          <div class="table-wrap">
            <div class="table-responsive">
              <table class="table table-hover display pb-60" id="tabel_terapi">
                <thead>
                  <tr class="bg-success">
                    <th>NO</th>
                    <th>PILIH</th>
                    <th>LANJUTKAN</th>
                    <th>HAPUS</th>
                    <th>S</th>
                    <th>O</th>
                    <th>A</th>
                    <th>P</th>
                    <!-- <th>HASIL</th> -->
                    <th>INSTRUKSI</th>
                    <th>TANGGAL</th>
                    <th>MULAI PUKUL</th>
                    <th>TANGGAL VERIFIKASI</th>
                    <th>DOKTER VERIFIKASI</th>
                    <th>TTD DOKTER</th>
                    <th>STAFF</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr class="bg-success">
                    <th>NO</th>
                    <th>PILIH</th>
                    <th>LANJUTKAN</th>
                    <th>HAPUS</th>
                    <th>S</th>
                    <th>O</th>
                    <th>A</th>
                    <th>P</th>
                    <!-- <th>HASIL</th> -->
                    <th>INSTRUKSI</th>
                    <th>TANGGAL</th>
                    <th>MULAI PUKUL</th>
                    <th>TANGGAL VERIFIKASI</th>
                    <th>DOKTER</th>
                    <th>TTD DOKTER</th>
                    <th>STAFF</th>
                  </tr>
                </tfoot>
                <tbody style="color: black">

                </tbody>
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
  $(document).ready(function(e) {
    id_pelayanan = $('#inPel').val();
    reload_data_id_pel(id_pelayanan);
  });
</script>
<script>
  document.addEventListener('DOMContentLoaded', (event) => {
    let today = new Date();
    let day = String(today.getDate()).padStart(2, '0');
    let month = String(today.getMonth() + 1).padStart(2, '0'); // January is 0
    let year = today.getFullYear();

    let todayFormatted = `${year}-${month}-${day}`;
    document.getElementById('inTgl').value = todayFormatted;
  });
</script>
<script type="text/javascript">
  function simpan() {
    console.log("Fungsi simpan dipanggil");

    id_pelayanan = $("#inPel").val();
    id_history = $("#inHis").val();
    tanggal_rencana = $("#inTgl").val();
    mulai_pukul = $("#inPukul").val();
    hasil_analisis = $("#inHasil").val();
    instruksi = $("#inInstruksi").val();
    no_rm = $('#inNoRM').val();
    // canvas = document.getElementById('can');
    // ttd = canvas.toDataURL("image/png");
    s = $('#s').val();
    o = $('#o').val();
    a = $('#a').val();
    p = $('#p').val();
    verif = $("input[name='verifikasi_dokter']:checked").val();
    tgl_verifikasi = $('#tgl_verifikasi').val();
    nama_dokter = $('#nama_dokter').val();

    // dataString = 'tanggal_rencana=' + tanggal_rencana + '&mulai_pukul=' + mulai_pukul + '&hasil_analisis=' + hasil_analisis + '&no_rm=' + no_rm + '&instruksi=' + instruksi + '&id_pelayanan=' + id_pelayanan + '&id_history=' + id_history +
    //   '&ttd=' + ttd + '&s=' + s + '&o=' + o + '&a=' + a + '&p=' + p;

    let isValid = true;

    if (!s) {
      $('#s_error').html('*Wajib diisi');
      $('#s').focus(); // Fokus pada kolom "S"
      isValid = false;
    } else {
      $('#s_error').html('');
    }

    if (!o && isValid) {
      $('#o_error').html('*Wajib diisi');
      $('#o').focus();
      isValid = false;
    } else {
      $('#o_error').html('');
    }

    if (!a && isValid) {
      $('#a_error').html('*Wajib diisi');
      $('#a').focus();
      isValid = false;
    } else {
      $('#a_error').html('');
    }

    if (!p && isValid) {
      $('#p_error').html('*Wajib diisi');
      $('#p').focus();
      isValid = false;
    } else {
      $('#p_error').html('');
    }

    if (!instruksi && isValid) {
      $('#instruksi_error').html('*Wajib diisi');
      $('#inInstruksi').focus();
      isValid = false;
    } else {
      $('#instruksi_error').html('');
    }

    if (!isValid) {
      return false;
    }

    $.ajax({
      url: "<?php echo base_url() ?>Erm_ranap_catatan_perkembangan/insert_perkembangan",
      method: "POST",
      dataType: 'json',
      data: {
        tanggal_rencana: tanggal_rencana,
        mulai_pukul: mulai_pukul,
        hasil_analisis: hasil_analisis,
        no_rm: no_rm,
        instruksi: instruksi,
        id_pelayanan: id_pelayanan,
        id_history: id_history,
        // ttd: ttd,
        s: s,
        o: o,
        a: a,
        p: p,
        verif: verif,
        tgl_verifikasi: tgl_verifikasi,
        nama_dokter: nama_dokter
      },
      success: function(data) {
        if (data.status == "success") {
          window.location.href = "<?php echo base_url('Erm_ranap_catatan_perkembangan/formcppt/') ?>" + id_pelayanan + '/' + id_history;
        } else if (data.error) {
          swal({
            title: "Gagal!",
            type: "warning",
            text: data.status,
            confirmButtonColor: "#3cb878",
          });
        }
      }
    });

    return false;
  }

  function hapus(id) { //utk hapus diagnosa pasien
    swal({
      title: "Warning?",
      text: "Apakah kamu yakin menghapus data ini?",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3cb878",
      confirmButtonText: "Yakin",
      cancelButtonText: "Batal",
      closeOnConfirm: false
    }, function() {
      $().ready(function() {
        $.ajax({
          url: "<?php echo base_url() ?>Erm_ranap_catatan_perkembangan/hapus_catatan",
          method: "POST",
          dataType: 'json',
          data: {
            id: id,
          },
          success: function(data) {
            if (data.status == "success") {
              swal({
                title: "good job!",
                type: "success",
                text: "Data Berhasil dihapus",
                confirmButtonColor: "#3cb878",
              });
              $('#tabel_terapi').DataTable().ajax.reload();
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
    });
    return false;
  }

  function reload_data_id_pel(id_pelayanan) { //utk reload data diagnosa pasien jika berhasil
    $('#tabel_terapi').dataTable().fnClearTable();
    $('#tabel_terapi').dataTable().fnDestroy();
    $('#tabel_terapi').DataTable({
      "language": {
        "sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
        "sProcessing": "Sedang memproses...",
        "sLengthMenu": "Tampilkan _MENU_ entri",
        "sZeroRecords": "Tidak ditemukan data yang sesuai",
        "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
        "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
        "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
        "sInfoPostFix": "",
        "sSearch": "Cari:",
        "sUrl": "",
        "oPaginate": {
          "sFirst": "Pertama",
          "sPrevious": "Sebelumnya",
          "sNext": "Selanjutnya",
          "sLast": "Terakhir",
        }
      },
      "ajax": {
        "url": '<?php echo base_url('Erm_ranap_catatan_perkembangan/tampil_list_per_pen_rujukan'); ?>',
        "type": 'POST',
        "data": {
          id_pelayanan: id_pelayanan
        },
      },

      "deferRender": true,
      "processing": true,
      "order": [],
      "columnDefs": [{
        "targets": [0],
        "orderable": false,
      }, ],
    });
  }

  function pilih(id) {
    $('#id').val(id);
    $.ajax({
      url: "<?php echo base_url() ?>Erm_ranap_catatan_perkembangan/getPerPenRujukan",
      method: "POST",
      dataType: 'json',
      data: {
        id: id
      },
      success: function(data) {
        if (data.status_dt == "found") {
          $('#edit').show();
          // $('#cetak').show();
          $('#simpan').hide();
          $("#inInstruksi").val(data.instruksi);
          $("#inHasil").val(data.hasil_analisis);
          $("#inTgl").val(data.tanggal_rencana);
          $("#inPukul").val(data.mulai_pukul);
          $('#s').val(data.S);
          $('#o').val(data.O);
          $('#a').val(data.A);
          $('#p').val(data.P);
          $('input[name="verifikasi_dokter"][value="' + data.verif + '"]').prop("checked", true).change();
          $('#tgl_verifikasi').val(data.tgl_verif).change();
          $('#nama_dokter').val(data.dokter_verif).change();

          // $('#can1').show();
          //           $('#can2').show();
          window.scrollTo({
            top: 0,
            behavior: 'smooth'
          });
        } else {
          swal({
            title: "Gagal!",
            type: "warning",
            text: "Data Kosong",
            confirmButtonColor: "#3cb878",
          });
        }
      }

    });
    return false;

  }

  function next(id) {
    // $('#id').val(id);
    $.ajax({
      url: "<?php echo base_url() ?>Erm_ranap_catatan_perkembangan/getPerPenRujukan",
      method: "POST",
      dataType: 'json',
      data: {
        id: id
      },
      success: function(data) {
        if (data.status_dt == "found") {
          $('#simpan').show();
          // $('#cetak').show();
          $('#edit').hide();
          $("#inInstruksi").val(data.instruksi);
          // $("#inHasil").val(data.hasil_analisis);
          $("#inTgl").val(data.tanggal_rencana);
          $("#inPukul").val(data.mulai_pukul);
          $('#s').val(data.S);
          $('#o').val(data.O);
          $('#a').val(data.A);
          $('#p').val(data.P);
          // $("#inProfesi").val(data.profesi);

          // $('#can1').show();
          //           $('#can2').show();
          window.scrollTo({
            top: 0,
            behavior: 'smooth'
          });
        } else {
          swal({
            title: "Gagal!",
            type: "warning",
            text: "Data Kosong",
            confirmButtonColor: "#3cb878",
          });
        }
      }

    });
    return false;

  }

  function edit() {
    id = $("#id").val();
    id_pelayanan = $("#inPel").val();
    id_history = $("#inHis").val();
    tanggal_rencana = $("#inTgl").val();
    mulai_pukul = $("#inPukul").val();
    hasil_analisis = $("#inHasil").val();
    // profesi = $("#inProfesi").val();
    instruksi = $("#inInstruksi").val();
    no_rm = $('#inNoRM').val();
    s = $('#s').val();
    o = $('#o').val();
    a = $('#a').val();
    p = $('#p').val();
    verif = $("input[name='verifikasi_dokter']:checked").val();
    tgl_verifikasi = $('#tgl_verifikasi').val();
    nama_dokter = $('#nama_dokter').val();
    // canvas = document.getElementById('can');
    // ttd = canvas.toDataURL("image/png");


    $.ajax({
      url: "<?php echo base_url() ?>Erm_ranap_catatan_perkembangan/edit_catatan",
      method: "POST",
      dataType: 'json',
      data: {
        id: id,
        tanggal_rencana: tanggal_rencana,
        mulai_pukul: mulai_pukul,
        hasil_analisis: hasil_analisis,
        no_rm: no_rm,
        instruksi: instruksi,
        id_pelayanan: id_pelayanan,
        id_history: id_history,
        // ttd: ttd,
        s: s,
        o: o,
        a: a,
        p: p,
        verif: verif,
        tgl_verifikasi: tgl_verifikasi,
        nama_dokter: nama_dokter
      },
      success: function(data) {
        if (data.status == "success") {
          window.location.href = "<?php echo base_url('Erm_ranap_catatan_perkembangan/formcppt/') ?>" + id_pelayanan + '/' + id_history;
          // } else if (data.error) {
          //   // if (data.diagnosis != '') {
          //   //   $('#diagnosis_error').html(data.diagnosis);
          //   // } else {
          //   //   $('#diagnosis_error').html('');
          //   // }
          //   // if (data.dokter_merawat != '') {
          //   //   $('#dokter_merawat_error').html(data.dokter_merawat);
          //   // } else {
          //   //   $('#dokter_merawat_error').html('');
          //   // }
          //   // if (data.dokter_pengirim != '') {
          //   //   $('#dokter_pengirim_error').html(data.dokter_pengirim);
          //   // } else {
          //   //   $('#dokter_pengirim_error').html('');
          //   // }
          //   if (skor_total == "" || skor_total == null) {
          //     $('#inTotal').html("*Klik Untuk Memproses Skor");
          //   }

        } else {
          swal({
            title: "Gagal!",
            type: "warning",
            text: data.status,
            confirmButtonColor: "#3cb878",
          });
        }
      }

    });
    return false;
  }

  // function cetak() {
  //   id = $('#id').val();
  //   window.location.href = "<?php echo base_url('Erm_igd_edit/print_penunjang/') ?>" + id;
  // }
</script>
<script>
  $('input[name="verifikasi_dokter"]').change(function() {
    if ($(this).val() === 'Ya' && $(this).prop('checked')) {
      $("#detail_verifikasi").show();
    } else {
      $("#detail_verifikasi").hide(); // Jika radio button lain dipilih, sembunyikan kembali (opsional)
    }
  });
</script>