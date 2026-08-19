<div class="row">
  <div class="col-sm-12">
    <div class="panel panel-default card-view">
      <div class="panel-heading">
        <div class="pull-left">
          <h6 class="panel-title txt-dark">PENGOBATAN ORANG SAKIT</h6>
        </div>
        <div class="clearfix"></div>
      </div>
      <div class="panel-wrapper collapse in" id="myDiv">
        <div class="panel-body">
          <div class="form-wrap">

            <div class="form-group">
              <!-- <form id="formUpload"> -->
              <input type="hidden" class="form-control" value="<?= $id_pelayanan ?>" name="inPel" id="inPel">
              <input type="hidden" class="form-control" value="<?= $id_history ?>" name="inHis" id="inHis">
              <input type="hidden" class="form-control" value="" id="id" name="id">
              <!-- <input type="hidden" class="form-control" name="inNoRM" id="inNoRM" value="<?= $no_rm ?>"> -->
              <div class="form-group">
                <div class="col-md-6">
                  <label class="control-label mb-10 text-left">Nama Pasien<span class="help"></span></label>
                  <div class="has-success">
                    <!-- <input type="text" class="form-control" id="inNama" disabled> -->
                    <input type="text" class="form-control" id="inNama" value="<?= $nama ?>" disabled>
                    <span class="help-block"></span>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-6">
                  <label class="control-label mb-10 text-left">No RM</label><span class="help"></span></label>
                  <div class="has-success">
                    <!-- <input type="text" class="form-control" name="inNoRM" id="inNoRM" disabled> -->
                    <input type="text" class="form-control" name="inNoRM" id="inNoRM" value="<?= $no_rm ?>" disabled>
                    <span class="help-block"></span>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-6">
                  <label class="control-label mb-10 text-left">Umur / Jenis Kelamin<span class="help"></span></label>
                  <div class="has-success">
                    <!-- <input type="text" class="form-control" id="umur" disabled>  -->
                    <input type="text" class="form-control" id="diagnosis" value="<?php
                                                                                  $tanggal = new DateTime($tgl_lahir);
                                                                                  $today = new DateTime();
                                                                                  $y = $today->diff($tanggal)->y;
                                                                                  echo  $y . " tahun, " . $jenis_kelamin;  ?>" disabled>
                    <span class="help-block"></span>
                  </div>
                </div>
              </div>

              <!-- <div class="form-group">
                                    <div class="col-md-6">      
                                        <label class="control-label mb-10 text-left">Jenis Obat</label>
                                        <div class="has-success">
                                             <select class="form-control filled-input select2" id="inJO" name="inJO">
                                                <option value="">Golongan Obat</option>
                                                <option value="Oral">ORAL</option>
                                                <option value="Injeksi">INJEKSI</option>    
                                              </select>
                                        </div>
                                    </div>
                                  </div> -->
              <div class="col-md-12">
                <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
              </div>
              <div class="form-group ">
                <div class="col-md-3">
                  <label class="control-label mb-10 text-left">Jenis Obat :</label>
                  <span id="jenis_error" class="text-danger"></span>
                  <div class="radio-button radio-button-primary">
                    <input id="jenis1" type="radio" name="jenis" value="ORAL">
                    <label class="control-label" for="jenis1">
                      ORAL
                    </label>
                  </div>
                  <div class="radio-button radio-button-primary">
                    <input id="jenis2" type="radio" name="jenis" value="INJEKSI">
                    <label class="control-label" for="jenis2">
                      INJEKSI
                    </label>
                  </div>
                </div>
              </div>
              <!-- <div class="form-group">
                <div class="col-md-3">
                  <label class="control-label mb-10 text-left">Nama Obat</label><span class="help"></span></label>
                  <span id="nama_error" class="text-danger"></span>
                  <div class="has-success">
                    <input type="text" class="form-control" name="inNamaObat" id="inNamaObat">
                    <span class="help-block"></span>
                  </div>
                </div>
              </div> -->

              

              <div class="form-group">
                <div class="col-md-3">
                  <label class="control-label mb-10 text-left">Nama Obat</label><span class="help"></span>
                  <span id="nama_error" class="text-danger"></span>
                  <div class="has-success">
                    <select class="form-control" name="inNamaObat" id="inNamaObat">
                      <option value="">-- Pilih Nama Obat --</option>
                      <?php if (!empty($nama_obat)) : ?>
                        <?php foreach ($nama_obat as $obat) : ?>
                          <option value="<?= $obat['nama']; ?>"><?= $obat['nama']; ?></option>
                        <?php endforeach; ?>
                      <?php else : ?>
                        <option value="">Tidak ada obat tersedia</option>
                      <?php endif; ?>
                    </select>
                    <span class="help-block"></span>
                  </div>
                </div>
              </div>


              <div class="form-group">
                <div class="col-md-3">
                  <label class="control-label mb-10 text-left">Signa Obat</label>
                  <span id="dosis_error" class="text-danger"></span>
                  <div class="has-success">
                    <input type="text" class="form-control" id="inDosis" name="inDosis" readonly />
                    <span class="help-block"></span>
                  </div>
                </div>
              </div>




              <div class="form-group">
                <div class="col-md-6">
                  <label class="control-label mb-10 text-left">Tanggal : <span class="help"></span></label>
                  <span id="tanggal_error" class="text-danger"></span>
                  <div class="has-success">
                    <input type="date" class="form-control" id="inTgl" name="inTgl"
                      value="<?php echo date('Y-m-d'); ?>">
                    <span class="help-block"></span>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-6">
                  <label class="control-label mb-10 text-left">Jam : <span class="help"></span></label>
                  <span id="jam_error" class="text-danger"></span>
                  <div class="has-success">
                    <input type="time" class="form-control" id="inPukul" name="inPukul"
                      value="<?php echo date('H:i'); ?>">
                    <span class="help-block"></span>
                  </div>
                </div>
              </div>


              <div class="col-md-12">
                <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
              </div>



              <div class="col-md-4">
                <label class="control-label">Paraf Perawat</label>
                <br />
                <div class="row">
                  <button data-toggle="modal" data-target="#modal_ttd" id="modal_ttd0" aria-expanded="false" aria-controls="poli_sore" class="btn btn-primary btn-anim btn-sm"><i class="icon-rocket"></i><span class="btn-text">TANDA TANGAN</span></button>
                  <button class="btn btn-default" id="sig-clearBtn">Clear Signature</button>
                  <canvas id="can" width="300" height="300" style="display: none;"></canvas>
                  <div class="form-group">
                    <div class="modal fade" id="modal_ttd" role="dialog" aria-labelledby="newPeternakModallabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="newPeternakModallabel">TANDA TANGAN</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>

                          <div class="modal-body">
                            <div class="form-group row" style="margin-left: 30px;">

                              <div class="row">
                                <div class="col-md-12">
                                  <canvas id="ttd" width="300" height="300">
                                  </canvas>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-12">
                                  <button class="btn btn-primary" id="sig-submitBtn">Submit Signature</button>
                                  <button class="btn btn-default" id="sig-clearBtn3">Clear Signature</button>
                                </div>
                              </div>

                            </div>
                          </div>


                        </div>
                      </div>
                    </div>
                  </div>
                </div>


              </div>
            </div>
            <div class="col-md-1">
              <label class="control-label"></label>
              <br />
              <div class="row">
                <button data-toggle="modal" disabled data-target="#modal_ttd1" aria-expanded="false" aria-controls="poli_sore" class="btn"></span></button>
                <button class="btn" disabled id="sig-clearBtn1"></button>
                <canvas id="can1" width="300" height="300" style="display: none;"></canvas>
                <div class="form-group">
                  <div class="modal fade" id="modal_ttd1" role="dialog" aria-labelledby="newPeternakModallabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="newPeternakModallabel">TANDA TANGAN</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="false">&times;</span>
                          </button>
                        </div>

                        <div class="modal-body">
                          <div class="form-group row" style="margin-left: 30px;">

                            <div class="row">
                              <div class="col-md-12">
                                <canvas id="ttd1" width="300" height="300">
                                </canvas>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-12">
                                <button class="btn btn-primary" id="sig-submitBtn1">Submit Signature</button>
                                <button class="btn btn-default" id="sig-clearBtn4">Clear Signature</button>
                              </div>
                            </div>

                          </div>
                        </div>


                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <label class="control-label"></label>
              <br />
              <div class="row">
                <button data-toggle="modal" disabled data-target="#modal_ttd2" aria-expanded="false" aria-controls="poli_sore" class="btn"></span></button>
                <button class="btn" disabled id="sig-clearBtn2"></button>
                <canvas id="can2" width="300" height="300" style="display: none;"></canvas>
                <div class="form-group">
                  <div class="modal fade" id="modal_ttd2" role="dialog" aria-labelledby="newPeternakModallabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="newPeternakModallabel">TANDA TANGAN</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>

                        <div class="modal-body">
                          <div class="form-group row" style="margin-left: 30px;">

                            <div class="row">
                              <div class="col-md-12">
                                <canvas id="ttd2" width="300" height="300">
                                </canvas>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-12">
                                <button class="btn btn-primary" id="sig-submitBtn2">Submit Signature</button>
                                <button class="btn btn-default" id="sig-clearBtn5">Clear Signature</button>
                              </div>
                            </div>

                          </div>
                        </div>


                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group text-center" style="margin-top: 30px;">
              <div class="col-md-12">
                <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
              </div>
              <div class="col-md-6">
                <a class="btn btn-default btn-anim  btn-sm" onclick="javascript:history.go(-1)" style="margin-right: 20px; margin-left: 30px;"><i class="fa fa-arrow-left"></i><span class="btn-text">KEMBALI</span></a>
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
</div>
</div>
<div class="panel panel-default card-view">
  <div class="panel-heading">
    <div class="pull-left">
      <h6 class="panel-title txt-dark">DAFTAR PENGOBATAN ORANG SAKIT</h6>
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
                    <th>PILIH</th>
                    <th>HAPUS</th>
                    <th>TANGGAL</th>
                    <th>JAM</th>
                    <th>JENIS OBAT</th>
                    <th>NAMA OBAT</th>
                    <th>STAFF</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr class="bg-success">
                    <th>NO</th>
                    <th>PILIH</th>
                    <th>HAPUS</th>
                    <th>TANGGAL</th>
                    <th>JAM</th>
                    <th>JENIS OBAT</th>
                    <th>NAMA OBAT</th>
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




      <?php $this->load->view('assets/signature1') ?>
      <style>
        canvas {
          cursor: crosshair;
          border: 1px solid #000000;
        }
      </style>

      <script type="text/javascript">
        $(document).ready(function() {
          $('#inNamaObat').change(function() {
            var namaObat = $(this).val();
            var idPelayanan = $('#inPel').val(); 

            if (namaObat && idPelayanan) {
              $.ajax({
                url: '<?= site_url("Erm_ranap_pengobatan_orang_sakit/getSignaObat"); ?>',
                method: 'GET',
                data: {
                  nama_obat: namaObat,
                  id_pelayanan: idPelayanan
                },
                dataType: 'json',
                success: function(response) {
                  if (response.signa_obat) {
                    $('#inDosis').val(response.signa_obat);
                  } else {
                    $('#inDosis').val(''); 
                  }
                },
                error: function() {
                  alert('Error retrieving signa obat.');
                }
              });
            } else {
              $('#inDosis').val(''); // Jika tidak ada nama obat atau id pelayanan, kosongkan dosis
            }
          });
        });



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
              "url": '<?php echo base_url('Erm_ranap_pengobatan_orang_sakit/tampil_list_per_id'); ?>',
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
          jenis_obat = $('input[name="jenis"]:checked').val();
          nama_obat = $("#inNamaObat").val();
          dosis = $("#inDosis").val();
          tanggal = $("#inTgl").val();
          jam = $("#inPukul").val();
          no_rm = $('#inNoRM').val();
          canvas = document.getElementById('can');
          ttd = canvas.toDataURL("image/png");

          dataString = 'tanggal=' + tanggal + '&jenis_obat=' + jenis_obat + '&nama_obat=' + nama_obat + '&no_rm=' + no_rm + '&dosis=' + dosis + '&id_pelayanan=' + id_pelayanan + '&id_history=' + id_history +
            '&ttd=' + ttd + '&jam=' + jam;

          $.ajax({
            url: "<?php echo base_url() ?>Erm_ranap_pengobatan_orang_sakit/insert_pengobatan",
            method: "POST",
            dataType: 'json',
            data: dataString,
            success: function(data) {
              if (data.status == "success") {
                window.location.href = "<?php echo base_url('Erm_ranap_pengobatan_orang_sakit/formpengobatan/') ?>" + id_pelayanan + '/' + id_history;
              } else if (data.error) {
                if (jenis_obat == '' | jenis_obat == null) {
                  $('#jenis_error').html('*wajib diisi');
                } else {
                  $('#jenis_error').html('');
                }
                if (nama_obat == '' | nama_obat == null) {
                  $('#nama_error').html('*wajib diisi');
                } else {
                  $('#nama_error').html('');
                }
                if (dosis == '' | dosis == null) {
                  $('#dosis_error').html('*wajib diisi');
                } else {
                  $('#dosis_error').html('');
                }
                if (tanggal == '' | tanggal == null) {
                  $('#tanggal_error').html('*wajib diisi');
                } else {
                  $('#tanggal_error').html('');
                }
                if (jam == '' | jam == null) {
                  $('#jam_error').html('*wajib diisi');
                } else {
                  $('#jam_error').html('');
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
            url: "<?php echo base_url() ?>Erm_ranap_pengobatan_orang_sakit/getPerRencana",
            method: "POST",
            dataType: 'json',
            data: {
              id: id
            },
            success: function(data) {
              if (data.status_dt == "found") {
                $('#id').val(data.id_pengobatan);
                $('input[name="jenis"][value="' + data.jenis_obat + '"]').prop("checked", true);
                $('#inNamaObat').val(data.nama_obat);
                $('#inDosis').val(data.dosis);
                $('#inPukul').val(data.jam);
                $('#inTgl').val(data.tanggal_pengobatan);
                $('#edit').show();
                // $('#cetak').show();
                $('#simpan').hide();

                document.querySelector('#sig-clearBtn').disabled = true;
                document.querySelector('#sig-clearBtn1').disabled = true;
                document.querySelector('#sig-clearBtn2').disabled = true;
                document.querySelector('#modal_ttd0').disabled = true;
                document.querySelector('#modal_ttd1').disabled = true;
                document.querySelector('#modal_ttd2').disabled = true;

                canvas = document.getElementById('can');
                canvas1 = document.getElementById('can1');
                canvas2 = document.getElementById('can2');
                ctx = canvas.getContext("2d");
                ctx1 = canvas1.getContext("2d");
                ctx2 = canvas2.getContext("2d");

                var img = new Image();
                var img1 = new Image();
                var img2 = new Image();
                img.onload = function() {
                  ctx.drawImage(img, 0, 0, 300, 300);
                  steps.length = 0;
                  steps[no] = ctx.getImageData(0, 0, canvas.width, canvas.height);
                  // 			steps.push(  ctx.getImageData(0,0,canvas.width,canvas.height)); 
                }
                img.src = "<?php echo base_url(); ?>" + data.ttd;
                img1.onload = function() {
                  ctx1.drawImage(img1, 0, 0, 300, 300);
                  steps.length = 0;
                  steps[no] = ctx1.getImageData(0, 0, canvas1.width, canvas1.height);
                  // 			steps.push(  ctx.getImageData(0,0,canvas.width,canvas.height)); 
                }
                img1.src = "<?php echo base_url(); ?>" + data.ttd1;
                img2.onload = function() {
                  ctx2.drawImage(img2, 0, 0, 300, 300);
                  steps.length = 0;
                  steps[no] = ctx2.getImageData(0, 0, canvas2.width, canvas2.height);
                  steps.push(ctx.getImageData(0, 0, canvas.width, canvas.height));
                }
                img2.src = "<?php echo base_url(); ?>" + data.ttd2;
                $('#can').show();
                // smooth scroll
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

        function hapus(id) {
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
                url: "<?php echo base_url() ?>Erm_ranap_pengobatan_orang_sakit/hapus_pengobatan",
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

        function edit() {
          id = $("#id").val();
          id_pelayanan = $("#inPel").val();
          id_history = $("#inHis").val();
          jenis_obat = $('input[name="jenis"]:checked').val();
          nama_obat = $("#inNamaObat").val();
          dosis = $("#inDosis").val();
          tanggal = $("#inTgl").val();
          jam = $("#inPukul").val();
          no_rm = $('#inNoRM').val();
          canvas = document.getElementById('can');
          ttd = canvas.toDataURL("image/png");

          dataString = 'tanggal=' + tanggal + '&jenis_obat=' + jenis_obat + '&nama_obat=' + nama_obat + '&no_rm=' + no_rm + '&dosis=' + dosis + '&id_pelayanan=' + id_pelayanan + '&id_history=' + id_history +
            '&ttd=' + ttd + '&jam=' + jam + '&id=' + id;

          $.ajax({
            url: "<?php echo base_url() ?>Erm_ranap_pengobatan_orang_sakit/edit_pengobatan",
            method: "POST",
            dataType: 'json',
            data: dataString,
            success: function(data) {
              if (data.status == "success") {
                window.location.href = "<?php echo base_url('Erm_ranap_pengobatan_orang_sakit/formpengobatan/') ?>" + id_pelayanan + '/' + id_history;
              } else if (data.error) {
                if (jenis_obat == '' | jenis_obat == null) {
                  $('#jenis_error').html('*wajib diisi');
                } else {
                  $('#jenis_error').html('');
                }
                if (nama_obat == '' | nama_obat == null) {
                  $('#nama_error').html('*wajib diisi');
                } else {
                  $('#nama_error').html('');
                }
                if (dosis == '' | dosis == null) {
                  $('#dosis_error').html('*wajib diisi');
                } else {
                  $('#dosis_error').html('');
                }
                if (tanggal == '' | tanggal == null) {
                  $('#tanggal_error').html('*wajib diisi');
                } else {
                  $('#tanggal_error').html('');
                }
                if (jam == '' | jam == null) {
                  $('#jam_error').html('*wajib diisi');
                } else {
                  $('#jam_error').html('');
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
      </script>