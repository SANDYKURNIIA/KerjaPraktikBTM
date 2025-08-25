<div class="row">
  <div class="col-sm-12">
    <div class="panel panel-default card-view">
      <div class="panel-heading">
        <div class="pull-left">
          <h6 class="panel-title txt-dark"><strong>CATATAN PEMAKAIAN CAIRAN INFUS</strong></h6>
        </div>
        <div class="clearfix"></div>
      </div>
      <div class="panel-wrapper collapse in" id="myDiv">
        <div class="panel-body">
          <div class="form-wrap">
            <div class="form-group">
              <input type="hidden" class="form-control" value="<?= $id_pelayanan ?>" name="inPel" id="inPel">
              <input type="hidden" class="form-control" value="<?= $id_history ?>" name="inHis" id="inHis">
              <input type="hidden" class="form-control" value="" id="id" name="id">

              <div class="col-md-6">
                <label class="control-label mb-10 text-left">Nama Pasien<span class="help"></span></label>
                <div class="has-success">
                  <input type="text" class="form-control" id="inNama" value="<?= $nama ?>" disabled>
                  <span class="help-block"></span>
                </div>
              </div>

              <div class="col-md-6">
                <label class="control-label mb-10 text-left">No RM</label>
                <div class="has-success">
                  <input type="text" class="form-control" name="inNoRM" id="inNoRM" value="<?= $no_rm ?>" disabled>
                  <span class="help-block"></span>
                </div>
              </div>

              <div class="col-md-6">
                <label class="control-label mb-10 text-left">Umur / Jenis Kelamin<span class="help"></span></label>
                <div class="has-success">
                  <input type="text" class="form-control" id="diagnosis" value="<?php
                                                                                $tanggal = new DateTime($tgl_lahir);
                                                                                $today = new DateTime();
                                                                                $y = $today->diff($tanggal)->y;
                                                                                echo  $y . " tahun, " . $jenis_kelamin; ?>" disabled>
                  <span class="help-block"></span>
                </div>
              </div>

              <div class="col-md-12">
                <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
              </div>

              <div class="form-group">
                <div class="col-md-8">
                  <br>
                  <label class="control-label mb-10 text-left">Jenis Infus</label>
                  <span id="mata_pf_error_1" class="text-danger"></span>

                  <div class="radio-button-group" style="display: flex; gap: 10px; align-items: center;">
                    <div>
                      <input id="jenis1" type="radio" name="jenis" value="RL" onclick="toggleOtherInput()">
                      <label class="control-label" for="jenis1">RL</label>
                    </div>
                    <div>
                      <input id="jenis2" type="radio" name="jenis" value="D5" onclick="toggleOtherInput()">
                      <label class="control-label" for="jenis2">D5</label>
                    </div>
                    <div>
                      <input id="jenis3" type="radio" name="jenis" value="NaCL" onclick="toggleOtherInput()">
                      <label class="control-label" for="jenis3">NaCL</label>
                    </div>
                    <div>
                      <input id="jenis4" type="radio" name="jenis" value="D10" onclick="toggleOtherInput()">
                      <label class="control-label" for="jenis4">D10</label>
                    </div>
                    <div style="display: flex; align-items: center;">
                      <div>
                        <input id="jenis5" type="radio" name="jenis" value="Lainnya" onclick="toggleOtherInput()">
                        <label class="control-label" for="jenis5">Lainnya</label>
                      </div>
                      <div class="has-success" id="lainnyaInput" style="display: none; margin-left: 10px;">
                        <input type="text" class="form-control" id="jenis_lain" placeholder="Masukkan jenis lainnya">
                        <span class="help-block"></span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- <script>
    function toggleOtherInput() {
        const lainnyaInput = document.getElementById('lainnyaInput');
        const jenisLain = document.querySelector('input[name="jenis"]:checked');

        if (jenisLain && jenisLain.value === 'Lainnya') {
            lainnyaInput.style.display = 'block'; // Tampilkan kotak teks
        } else {
            lainnyaInput.style.display = 'none'; // Sembunyikan kotak teks
        }
    }
</script> -->
              <script>
                function toggleOtherInput() {
                  const lainnyaInput = document.getElementById('lainnyaInput');
                  const jenisLain = document.querySelector('input[name="jenis"]:checked');

                  if (jenisLain && jenisLain.value === 'Lainnya') {
                    lainnyaInput.style.display = 'block'; // Tampilkan kotak teks
                  } else {
                    lainnyaInput.style.display = 'none'; // Sembunyikan kotak teks
                  }
                }

                function submitForm() {
                  const jenisLain = document.getElementById('jenis_lain').value;
                  const jenisSelected = document.querySelector('input[name="jenis"]:checked');

                  // Mengirim data ke server
                  const formData = new FormData();
                  formData.append('jenis', jenisSelected ? jenisSelected.value : '');
                  if (jenisSelected && jenisSelected.value === 'Lainnya') {
                    formData.append('jenis_lain', jenisLain);
                  }

                  fetch('/submit-url', { // Ganti dengan URL endpoint yang sesuai
                      method: 'POST',
                      body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                      console.log('Success:', data);
                      // Lakukan sesuatu setelah sukses
                    })
                    .catch((error) => {
                      console.error('Error:', error);
                    });

                  return false; // Mencegah pengiriman form default
                }
              </script>
              </body>

              </html>

              <div class="form-group">
                <div class="col-md-6">
                  <label class="control-label mb-10 text-left">Tanggal: <span class="help"></span></label>
                  <span id="tanggal_error" class="text-danger"></span>
                  <div class="has-success">
                    <input type="date" class="form-control" id="inTgl" name="inTgl">
                    <span class="help-block"></span>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-6">
                  <label class="control-label mb-10 text-left">Jam : <span class="help"></span></label>
                  <span id="jam_error" class="text-danger"></span>
                  <div class="has-success">
                    <input type="time" class="form-control" id="inPukul" name="inPukul">
                    <span class="help-block"></span>
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
              </div>

              <div class="form-group">
                <div class="col-md-6">
                  <!-- Full width column -->
                  <label class="control-label mb-10 text-left">Keterangan</label>
                  <span class="help"></span>
                  <span id="nama_error" class="text-danger"></span>
                  <div class="has-success">
                    <textarea class="form-control" name="inKtr" id="inKtr" style="width: 100%; height: 70px; padding: 20px;"></textarea>
                    <span class="help-block"></span>
                  </div>
                </div>
              </div>

              <div class="col-md-12">
                <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
              </div>





              <div class="row">
                <div class="col-md-4">
                  <label class="control-label">Paraf Perawat</label>
                  <br />
                  <div class="row mb-2">
                    <button data-toggle="modal" data-target="#modal_ttd" id="modal_ttd0" class="btn btn-primary btn-anim btn-sm">
                      <i class="icon-rocket"></i><span class="btn-text">TANDA TANGAN</span>
                    </button>
                    <button class="btn btn-default" id="sig-clearBtn">Clear Signature</button>
                    <canvas id="can" width="300" height="300" style="display: none;"></canvas>
                  </div>

                  <div class="modal fade" id="modal_ttd" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="modalLabel">TANDA TANGAN</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body text-center">
                          <p>Silakan tanda tangani di bawah ini:</p>
                          <div class="form-group">
                            <canvas id="ttd" width="300" height="300" style="border: 1px solid #ccc;"></canvas>
                          </div>
                          <div>
                            <button class="btn btn-primary" id="sig-submitBtn">Submit Signature</button>
                            <button class="btn btn-default" id="sig-clearBtn3">Clear Signature</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-4">
                  <label class="control-label"></label>
                  <br />
                  <div class="row mb-2">
                    <button data-toggle="modal" disabled data-target="#modal_ttd1" class="btn"></button>
                    <button class="btn" disabled id="sig-clearBtn1"></button>
                    <canvas id="can1" width="300" height="300" style="display: none;"></canvas>
                  </div>

                  <div class="modal fade" id="modal_ttd1" role="dialog" aria-labelledby="modalLabel1" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="modalLabel1">TANDA TANGAN</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body text-center">
                          <p>Silakan tanda tangani di bawah ini:</p>
                          <div class="form-group">
                            <canvas id="ttd1" width="300" height="300" style="border: 1px solid #ccc;"></canvas>
                          </div>
                          <div>
                            <button class="btn btn-primary" id="sig-submitBtn1">Submit Signature</button>
                            <button class="btn btn-default" id="sig-clearBtn4">Clear Signature</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-4">
                  <label class="control-label"></label>
                  <br />
                  <div class="row mb-2">
                    <button data-toggle="modal" disabled data-target="#modal_ttd2" class="btn"></button>
                    <button class="btn" disabled id="sig-clearBtn2"></button>
                    <canvas id="can2" width="300" height="300" style="display: none;"></canvas>
                  </div>

                  <div class="modal fade" id="modal_ttd2" role="dialog" aria-labelledby="modalLabel2" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="modalLabel2">TANDA TANGAN</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body text-center">
                          <p>Silakan tanda tangani di bawah ini:</p>
                          <div class="form-group">
                            <canvas id="ttd2" width="300" height="300" style="border: 1px solid #ccc;"></canvas>
                          </div>
                          <div>
                            <button class="btn btn-primary" id="sig-submitBtn2">Submit Signature</button>
                            <button class="btn btn-default" id="sig-clearBtn5">Clear Signature</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="form-group text-center" style="margin-top: 30px;">
                <div class="col-md-12">
                  <a class="btn btn-default btn-anim btn-sm" onclick="javascript:history.go(-1)" style="margin-right: 20px;">
                    <i class="fa fa-arrow-left"></i><span class="btn-text">KEMBALI</span>
                  </a>
                  <button id="simpan" onclick="simpan()" type="submit" class="btn btn-success mb-4">Simpan</button>
                  <button style="display: none;" id="edit" type="submit" class="btn btn-warning mb-4" onclick="edit()">Edit</button>
                  <button style="display: none;" id="cetak" type="submit" class="btn btn-primary mb-4" onclick="cetak()">Cetak</button>
                </div>
              </div>
            </div>
          </div>
          <div class="panel panel-default card-view">
            <div class="panel-heading">
              <div class="pull-left">
                <h6 class="panel-title txt-dark"><strong>CATATAN PEMAKAIAN CAIRAN INFUS</strong></h6>
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
                              <th>HAPUS</th>
                              <th>TANGGAL</th>
                              <th>JAM</th>
                              <th>JENIS INFUS</th>
                              <th>KETERANGAN</th>
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
                              <th>JENIS INFUS</th>
                              <th>KETERANGAN</th>
                              <th>STAFF</th>
                            </tr>
                          </tfoot>
                          <tbody style="color: black">
                            <!-- Data will be loaded here -->
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <?php $this->load->view('assets/signature1'); ?>

          <style>
            canvas {
              cursor: crosshair;
              border: 1px solid #000000;
            }
          </style>

          <script type="text/javascript">
            $(document).ready(function() {
              id_pelayanan = $('#inPel').val();
              reload_data_id_pel(id_pelayanan);
            });

            function reload_data_id_pel(id_pelayanan) {
              // $('#tabel_terapi').DataTable().fnClearTable();
              // $('#tabel_terapi').DataTable().fnDestroy();
              $('#tabel_terapi').DataTable({
                "language": {
                  "sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
                  "sProcessing": "Sedang memproses...",
                  "sLengthMenu": "Tampilkan _MENU_ entri",
                  "sZeroRecords": "Tidak ditemukan data yang sesuai",
                  "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                  "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                  "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                  "sSearch": "Cari:",
                  "oPaginate": {
                    "sFirst": "Pertama",
                    "sPrevious": "Sebelumnya",
                    "sNext": "Selanjutnya",
                    "sLast": "Terakhir",
                  }
                },
                "ajax": {
                  "url": '<?php echo base_url('Catatan_pemakaian_cairan_infus/tampil_list_per_id'); ?>',
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
                }],
              });
            }

            function simpan() {
              id_pelayanan = $("#inPel").val();
              id_history = $("#inHis").val();
              jenis_infus = $('input[name="jenis"]:checked').val();
              keterangan = $("#inKtr").val();
              tanggal = $("#inTgl").val();
              jam = $("#inPukul").val();
              console.log("Jam yang dipilih: ", $("#inPukul").val());
              no_rm = $('#inNoRM').val();
              canvas = document.getElementById('can');
              ttd = canvas.toDataURL("image/png");

              dataString = 'tanggal=' + tanggal + '&jenis_infus=' + jenis_infus + '&keterangan=' + keterangan + '&no_rm=' + no_rm + '&id_pelayanan=' + id_pelayanan + '&id_history=' + id_history +
                '&ttd=' + ttd + '&jam=' + jam;

              $.ajax({
                url: "<?php echo base_url() ?>Catatan_pemakaian_cairan_infus/insert_catatan_pemakaian_cairan_infus",
                method: "POST",
                dataType: 'json',
                data: dataString,
                success: function(data) {
                  if (data.status == "success") {
                    window.location.href = "<?php echo base_url('Catatan_pemakaian_cairan_infus/formCpci/') ?>" + id_pelayanan + '/' + id_history;
                  } else if (data.error) {
                    if (jenis_infus == '' | jenis_infus == null) {
                      $('#jenis_error').html('*wajib diisi');
                    } else {
                      $('#jenis_error').html('');
                    }
                    if (keterangan == '' | keterangan == null) {
                      $('#keterangan_error').html('*wajib diisi');
                    } else {
                      $('#keterangan_error').html('');
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
              // Mengatur ID yang dipilih ke elemen input
              $('#id').val(id);

              // Melakukan permintaan AJAX untuk mendapatkan data
              $.ajax({
                url: "<?php echo base_url() ?>Catatan_pemakaian_cairan_infus/getPerRencana",
                method: "POST",
                dataType: 'json',
                data: {
                  id: id
                },
                success: function(data) {
                  console.log(data); // Debug: Periksa respons dari server

                  // Memeriksa apakah status data ditemukan
                  if (data.status_dt === "found") {
                    // Mengisi field dengan data dari server
                    $('#id').val(data.id_pengobatan);
                    $('input[name="jenis"][value="' + data.jenis_infus + '"]').prop("checked", true);
                    $('#inKtr').val(data.keterangan);
                    $('#inPukul').val(data.jam);
                    $('#inTgl').val(data.tanggal);
                    $('#edit').show();
                    $('#simpan').hide();

                    // Menonaktifkan tombol tanda tangan
                    ['#sig-clearBtn', '#sig-clearBtn1', '#sig-clearBtn2', '#modal_ttd0', '#modal_ttd1', '#modal_ttd2']
                    .forEach(selector => $(selector).prop('disabled', true));

                    // Menggambar gambar ke dalam canvas
                    let canvases = [document.getElementById('can'), document.getElementById('can1'), document.getElementById('can2')];
                    let contexts = canvases.map(canvas => canvas.getContext("2d"));
                    let imageUrls = [data.ttd, data.ttd1, data.ttd2];

                    // Memuat dan menggambar gambar
                    imageUrls.forEach((url, index) => {
                      if (url) { // Pastikan URL tidak kosong
                        let img = new Image();
                        img.onload = function() {
                          contexts[index].drawImage(img, 0, 0, 300, 300);
                        };
                        img.onerror = function() {
                          console.error("Error loading image:", url); // Log kesalahan jika gagal memuat gambar
                        };
                        img.src = "<?php echo base_url(); ?>" + url;
                      } else {
                        console.warn("Image URL is empty for index:", index); // Log peringatan jika URL kosong
                      }
                    });

                    $('#can').show();

                    // Smooth scroll ke atas
                    window.scrollTo({
                      top: 0,
                      behavior: 'smooth'
                    });
                  } else {
                    swal({
                      title: "Gagal!",
                      icon: "warning",
                      text: "Data tidak ditemukan atau kosong.",
                      buttons: {
                        confirm: {
                          text: "OK",
                          value: true,
                          visible: true,
                          className: "btn btn-success",
                        }
                      }
                    });
                  }
                },
                error: function(xhr, status, error) {
                  console.error("AJAX Error: ", status, error);
                  swal({
                    title: "Error!",
                    icon: "error",
                    text: "Terjadi kesalahan saat mengakses data.",
                  });
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
                    url: "<?php echo base_url() ?>catatan_pemakaian_cairan_infus/hapus_catatan_pemakaian_cairan_infus",
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
              // Ambil data dari input form
              id = $("#id").val();
              id_pelayanan = $("#inPel").val();
              id_history = $("#inHis").val();
              jenis_infus = $('input[name="jenis"]:checked').val();
              keterangan = $("#inKtr").val();
              tanggal = $("#inTgl").val();
              jam = $("#inPukul").val();
              no_rm = $('#inNoRM').val();

              // Mengambil tanda tangan dari canvas
              canvas = document.getElementById('can');
              ttd = canvas.toDataURL("image/png");

              // Buat object untuk data yang akan dikirim
              dataString = 'tanggal=' + tanggal + '&jenis_infus=' + jenis_infus + '&keterangan=' + keterangan + '&no_rm=' + no_rm + '&id_pelayanan=' + id_pelayanan + '&id_history=' + id_history +
                '&ttd=' + ttd + '&jam=' + jam + '&id=' + id;
              // Mengirim request Ajax

              $.ajax({
                url: "<?php echo base_url() ?>Catatan_pemakaian_cairan_infus/edit_catatan_pemakaian_cairan_infus",
                method: "POST",
                dataType: 'json',
                data: dataString,
                success: function(data) {
                  if (data.status == "success") {
                    window.location.href = "<?php echo base_url('Catatan_pemakaian_cairan_infus/formCpci/') ?>" + id_pelayanan + '/' + id_history;
                  } else if (data.error) {
                    if (jenis_infus == '' | jenis_infus == null) {
                      $('#jenis_error').html('*wajib diisi');
                    } else {
                      $('#jenis_error').html('');
                    }
                    if (keterangan == '' | keterangan == null) {
                      $('#Ktr_error').html('*wajib diisi');
                    } else {
                      $('#Ktr_error').html('');
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
                    // Jika ada kesalahan umum
                    swal({
                      title: "Gagal!",
                      type: "warning",
                      text: data.message || "Terjadi kesalahan saat menyimpan data.",
                      confirmButtonColor: "#3cb878",
                    });
                  }
                }

              });

              return false;
            }
          </script>