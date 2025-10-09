<div class="row">
  <div class="col-sm-12">
    <div class="panel panel-default card-view">
      <div class="panel-heading">
        <div class="pull-left">
          <h6 class="panel-title txt-dark">Form SOAP</h6>
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
              <div class="col-md-10">
                <label class="control-label mb-10 text-left">Tanggal<span class="help"></span></label>
                <span id="tanggal_error" class="text-danger"></span>
                <div class="has-success">
                  <input type="date" class="form-control" id="inTgl" name="inTgl" value="<?= date('Y-m-d') ?>">
                  <span class="help-block"></span>
                </div>
              </div>
            </div>

            <div class="form-group row">
              <div class="col-md-12">
                <label class="control-label mb-10 text-left">S<span class="help"></span></label>
                <span id="hasil_error" class="text-danger"></span>
                <div class="has-success">
                  <textarea class="form-control" id="inS" name="inS"></textarea>
                  <span class="help-block text-danger"></span>
                </div>
              </div>
              <div class="col-md-12">
                <label class="control-label mb-10 text-left">O<span class="help"></span></label>
                <span id="hasil_error" class="text-danger"></span>
                <div class="has-success">
                  <!-- Input Field untuk Diagnosa -->
                  <textarea class="form-control" id="inO" name="inO"></textarea>

                  <!-- Tambahkan jQuery dan jQuery UI di view -->


                </div>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-12">
                <label class="control-label mb-10 text-left">A :<span class="help"></span></label>
                <span id="hasil_error" class="text-danger"></span>
                <div class="has-success">
                  <input type="text" class="form-control" name="inA" id="inA">
                </div>
              </div>
              <div class="col-md-12">
                <label class="control-label mb-10 text-left">P<span class="help"></span></label>
                <span id="hasil_error" class="text-danger"></span>
                <div class="has-success">
                  <textarea class="form-control" id="inP" name="inP"></textarea>
                  <span class="help-block text-danger"></span>
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
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="panel panel-default card-view">
  <div class="panel-heading">
    <div class="pull-left">
      <h6 class="panel-title txt-dark">FORM SOAP REHAB</h6>
    </div>
    <div class="clearfix"></div>
  </div>
  <div class="panel-wrapper collapse in">
    <div class="panel-body">
      <div class="form-group">
        <div class="col-md-12">
          <div class="table-wrap">
            <div class="table-responsive">
              <table class="table table-hover display  pb-60" id="tabel_terapi">
                <thead>
                  <tr class="bg-success">
                    <th>NO</th>
                    <?php if ($total_bayar != 1) { ?>
                      <th>PILIH</th>
                    <?php } ?>
                    <th>S</th>
                    <th>O</th>
                    <th>A</th>
                    <th>P</th>
                    <th>TANGGAL</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr class="bg-success">
                    <th>NO</th>
                    <?php if ($total_bayar != 1) { ?>
                      <th>PILIH</th>
                    <?php } ?>
                    <th>S</th>
                    <th>O</th>
                    <th>A</th>
                    <th>P</th>
                    <th>TANGGAL</th>
                  </tr>
                </tfoot>
                <tbody style="color: black">
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>



      <link rel="stylesheet" href="<?php echo base_url('assets/dist/jquery-ui.css'); ?>">
      <script src="<?php echo base_url('assets/dist/jquery-ui.min.js'); ?>"></script>
      <script src="<?php echo base_url('assets/dist/jquery-ui.js'); ?>"></script>
      <script type="text/javascript">
        $(document).ready(function() {
          var status = '<?= $total_bayar ?>';
          if (status == 1) {
            $('#myDiv').collapse('hide');
          } else {
            $('#myDiv').collapse('show');
          }

          $('#inA').autocomplete({
            source: function(request, response) {
              $.ajax({
                url: "<?= base_url('Form_soap_rehab/get_autocomplete') ?>",
                dataType: "json",
                data: {
                  term: request.term
                },
                success: function(data) {
                  response(data);
                }
              });
            },
            minLength: 1
          });
        });
      </script>
      <script type="text/javascript">
        $(document).ready(function(e) {
          id_pelayanan = $('#inPel').val();
          reload_data_id_pel(id_pelayanan);
        });
      </script>
      <script type="text/javascript">
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
              "url": '<?php echo base_url('Form_soap_rehab/tampil_list_per_pen_rujukan'); ?>',
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

        function simpan() {
          id_pelayanan = $("#inPel").val();
          id_history = $("#inHis").val();
          tanggal = $("#inTgl").val();
          no_rm = $('#inNoRM').val();
          s = $('#inS').val();
          o = $('#inO').val();
          a = $('#inA').val();
          p = $('#inP').val();

          dataString = 'tanggal=' + tanggal + '&s=' + s + '&o=' + o + '&a=' + a + '&p=' + p + '&no_rm=' + no_rm + '&id_pelayanan=' + id_pelayanan + '&id_history=' + id_history;

          $.ajax({
            url: "<?php echo base_url() ?>Form_soap_rehab/insert_soap",
            method: "POST",
            dataType: 'json',
            data: dataString,
            success: function(data) {
              if (data.status == "success") {
                window.location.href = "<?php echo base_url('Form_soap_rehab/formsoap/') ?>" + id_pelayanan + '/' + id_history;
              } else if (data.error) {
                if (s == '' | s == null) {
                  $('#s_error').html('*wajib diisi');
                } else {
                  $('#s_error').html('');
                }
                if (o == '' | o == null) {
                  $('#o_error').html('*wajib diisi');
                } else {
                  $('#o_error').html('');
                }
                if (a == '' | a == null) {
                  $('#a_error').html('*wajib diisi');
                } else {
                  $('#a_error').html('');
                }
                if (p == '' | p == null) {
                  $('#p_error').html('*wajib diisi');
                } else {
                  $('#p_error').html('');
                }
                if (tanggal == '' | tanggal == null) {
                  $('#tanggal_error').html('*wajib diisi');
                } else {
                  $('#tanggal_error').html('');
                }
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

        function pilih(id) {
          $('#id').val(id);
          $.ajax({
            url: "<?php echo base_url() ?>Form_soap_rehab/getPerPenRujukan",
            method: "POST",
            dataType: 'json',
            data: {
              id: id
            },
            success: function(data) {
              if (data.status_dt == "found") {
                $('#edit').show();
                $('#cetak').show();
                $('#simpan').hide();
                $("#inTgl").val(data.tanggal);
                $("#inS").val(data.S);
                $("#inO").val(data.O);
                $("#inA").val(data.A);
                $("#inP").val(data.P);
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
          no_rm = $('#inNoRM').val();
          tanggal = $("#inTgl").val();
          s = $('#inS').val();
          o = $('#diagnosa').val();
          a = $('#inA').val();
          p = $('#inP').val();

          dataString = 'tanggal=' + tanggal + '&s=' + s + '&o=' + o + '&a=' + a + '&p=' + p + '&no_rm=' + no_rm + '&id_pelayanan=' + id_pelayanan + '&id_history=' + id_history + '&id=' + id;
          $.ajax({
            url: "<?php echo base_url() ?>Form_soap_rehab/edit_soap",
            method: "POST",
            dataType: 'json',
            data: dataString,
            success: function(data) {
              if (data.status == "success") {
                window.location.href = "<?php echo base_url('Form_soap_rehab/formsoap/') ?>" + id_pelayanan + '/' + id_history;
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
</script>
<script>
  // ✅ INI YA BANG)
  function cetak() {
    let id = $("#id").val();

    if (!id) {
      swal({
        title: "Peringatan!",
        text: "Silakan pilih data terlebih dahulu sebelum mencetak.",
        type: "warning",
        confirmButtonColor: "#3cb878",
      });
      return;
    }

    window.open("<?= base_url('Form_soap_rehab/print_soap/') ?>" + id, "_blank");
  }
</script>

