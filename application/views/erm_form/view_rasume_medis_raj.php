<<<<<<< HEAD
<!-- Row -->
<div class="row">
  <div class="col-sm-12">
    <div class="panel panel-default card-view">
      <div class="panel-heading">
        <div class="pull-left">
          <h6 class="panel-title txt-dark">Resume Medis Rajal</h6>
        </div>
        <div class="clearfix"></div>
      </div>
      <div class="panel-wrapper collapse in">
        <div class="panel-body">
          <div class="form-wrap">


            <div class="form-group">
              <div class="col-md-4">
                <label class="control-label mb-10 text-left">Tanggal Masuk<span class="help"></span></label>
                <input type="text" class="form-control" value="<?= $tgl_masuk ?>" disabled>
              </div>
            </div>
            <input type="hidden" class="form-control" value="<?= $id_pelayanan ?>" id="inPel">
            <input type="hidden" class="form-control" value="<?= $id_history ?>" id="inHis">
            <div class="form-group">
              <div class="col-md-4">
                <label class="control-label mb-10 text-left">Tanggal Keluar<span class="help"></span></label>
                <input type="text" class="form-control" value="<?= $tgl_keluar ?>" disabled>
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-4">
                <label class="control-label mb-10 text-left">No RM<span class="help"></span></label>
                <input type="text" class="form-control" value="<?= $no_rm ?>" id="inNoRM" disabled>
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-4">
                <label class="control-label mb-10 text-left">Tanggal Lahir<span class="help"></span></label>
                <input type="date" class="form-control" value="<?= $tgl_lahir ?>" disabled>
                <span class="help-block"></span>
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-4">
                <label class="control-label mb-10 text-left">Nama Pasein<span class="help"></span></label>
                <input type="text" class="form-control" value="<?= $nama ?>" disabled>
                <span class="help-block"></span>
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-4">
                <label class="control-label mb-10 text-left">Jenis Kelamin<span class="help"></span></label>
                <input type="text" class="form-control" value="<?= $jenis_kelamin ?>" disabled>
                <span class="help-block"></span>
              </div>
            </div>
            <br>
            <div class="form-group ">


              <div class="form-group">
                <div class="col-md-4">
                  <label class="control-label mb-10 text-left">Anamnesa<span class="help"></span></label>
                  <textarea class="form-control" id="anamnesa" disabled><?php echo $per['keluhan_utama'] ?></textarea>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-4">
                  <label class="control-label mb-10 text-left">Riwayat Singkat Dan Pemeriksaan Fisik<span class="help"></span></label>
                  <!-- <textarea type="text" class="form-control" id="riwayat" disabled></?= $per['alloanamnesa'] ?></textarea> -->
                  <div class="has-success" id="p_fisik">
                    <!-- <textarea class="form-control" disabled cols="3" rows="2" id="p_fisik" name="p_fisik"></textarea> -->
                    <span class="help-block text-danger"></span>
                  </div>
                  <br>
                  <div class="has-success" id="p_fisik_2">
                    <!-- <textarea class="form-control" disabled cols="3" rows="2" id="p_fisik" name="p_fisik"></textarea> -->
                    <span class="help-block text-danger"></span>
                  </div>
                </div>
              </div>

              <div class="form-group ">
                <div class="col-md-12">
                  <label class="control-label mb-10 text-left">Pemeriksaan Penunjang/Diagnostik :</label>

                  <div class="data-pemeriksaan">
                    <p class="">
                      A. Tindakan Poli :
                    </p>
                    <ul id="list_tindakan_poli">

                    </ul>
                  </div>
                  <div class="data-pemeriksaan">
                    <p class="">
                      B. Radiologi :
                    </p>
                    <ul id="list_radiologi">

                    </ul>
                  </div>
                  <div class="data-pemeriksaan">
                    <p class="">
                      C. Labor :
                    </p>
                    <ul id="list_labor">

                    </ul>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-6">
                    <label class="control-label mb-10 text-left">Diagnosa Saat Masuk<span class="help"></span></label>
                    <input type="text" class="form-control" id="diagnosa_awal" value="<?= isset($pasien) ? $pasien->diagnosa : '' ?>" disabled>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-6">
                    <label class="control-label mb-10 text-left">Diagnosa Utama<span class="help"></span></label>
                    <input type="text" class="form-control" id="diagnosa_utama" value="<?= $diagnosa_utama['nama_diagnosa'] ?>" disabled>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-6">
                    <label class="control-label mb-10 text-left">Diagnosa Sekunder<span class="help"></span></label>
                    <div class="table-wrap" style="width: 80%; margin: auto ">
                      <div class="table-responsive">
                        <table class="table table-hover display  pb-60" id="tablediagnosa">
                          <thead>
                            <tr class="bg-success">
                              <th>ID DIAGNOSA</th>
                              <th>KODE</th>
                              <th>NAMA</th>

                            </tr>
                          </thead>
                          <tfoot>
                            <tr class="bg-success">
                              <th>ID DIAGNOSA</th>
                              <th>KODE</th>
                              <th>NAMA</th>

                            </tr>
                          </tfoot>
                          <tbody style="color: black">

                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-6">
                    <label class="control-label mb-10 text-left">Proses Pembedahaan/Tindakan<span class="help"></span></label>
                    <textarea class="form-control" name="" id="terapi" cols="30" rows="5" disabled><?= str_replace("<br>", "\n",$dok['prosedur_tindakan']) ?></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-12">
                    <h5 style="margin-top: 30px;"><strong>
                        <label class="control-label mb-10 text-left">Ringkasan Keluar<span class="help"></span></label>
                      </strong></h5>
                  </div>

                  <div class="form-group ">
                    <div class="col-md-6">
                      <label class="control-label mb-10 text-left">Keadaan Waktu Pulang</label>
                      <input disabled type="text" class="form-control" id="keadaan_pulang" value="<?= $dok['keadaan_pulang'] ?>">
                    </div>

                    <div class="form-group ">
                      <div class="col-md-6">
                        <label class="control-label mb-10 text-left">Alasan Pulang</label>
                        <input disabled type="text" class="form-control" id="alasan_pulang" value="<?= $dok['tindak_lanjut'] ?>">
                      </div>

                      <div class="form-group">
                        <div class="col-md-6">
                          <label class="control-label mb-10 text-left">Hari / Tanggal Kontrol Ke RS :<span class="help"></span></label>
                          <input type="text" class="form-control" id="tgl_kontrol" value="<?php $date = isset($pasien) ? strtotime($pasien->tgl_masuk) : strtotime($tgl_masuk);
                                                                                          echo date('d-m-Y', $date) ?>" disabled>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="col-md-6">
                          <label class="control-label mb-10 text-left">Jam<span class="help"></span></label>
                          <input type="text" class="form-control" id="jam_kontrol" value="<?php date_default_timezone_set('Asia/Jakarta');
                                                                                          echo date('h:i:s', $date) ?>" disabled>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="col-md-6">
                          <label class="control-label mb-10 text-left">Poliklinik :<span class="help"></span></label>
                          <textarea class="form-control" name="" id="konsul" cols="30" rows="5" disabled><?= $dok['konsul'] ?></textarea>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="col-md-6">
                          <label class="control-label mb-10 text-left">Edukasi Yang Diberikan<span class="help"></span></label>
                          <input type="text" class="form-control" id="edukasi" disabled>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="col-md-12">
                          <h5>
                            <strong>
                              <label class="control-label mb-10 text-left">Terapi<span class="help"></span></label>
                            </strong>
                          </h5>

                          <div class="table-wrap" style="width: 80%; margin: auto ">
                            <div class="table-responsive">
                              <table class="table table-hover display  pb-60" id="tabel_terapi">
                                <thead>
                                  <tr class="bg-success">
                                    <th>NAMA OBAT</th>
                                    <th>DOSIS</th>
                                    <th>FREKUENSI</th>
                                    <th>CARA PEMBERIAN</th>
                                  </tr>
                                </thead>
                                <tfoot>
                                  <tr class="bg-success">
                                    <th>NAMA OBAT</th>
                                    <th>DOSIS</th>
                                    <th>FREKUENSI</th>
                                    <th>CARA PEMBERIAN</th>
                                  </tr>
                                </tfoot>
                                <tbody style="color: black">

                                </tbody>
                              </table>
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
                          <button type="submit" class="btn btn-success mb-4" onclick="cetak()">CETAK</button>
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
  </div>
</div>
<div id="loading" style="display:none;">
  <div class="spinner"></div>
  <p>Sedang memuat...</p>
</div>
<style>
  #t_fisik td {
    padding-right: 15px;
  }

  #loading {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    /* Latar belakang semi-transparan */
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 1000;
    /* Pastikan di atas konten lain */
    flex-direction: column;
  }

  .spinner {
    border: 4px solid rgba(0, 0, 0, 0.3);
    border-top: 4px solid #3498db;
    border-radius: 50%;
    width: 50px;
    height: 50px;
    animation: spin 2s linear infinite;
    margin-bottom: 10px;
  }

  @keyframes spin {
    0% {
      transform: rotate(0deg);
    }

    100% {
      transform: rotate(360deg);
    }
  }

   .table_pemeriksaan {
    color: black;
    width: 65%;
    border-collapse: collapse;
    margin-bottom: 20px;
  }


  .data-pemeriksaan {
    display: flex;
    align-items: start;
    color: black;
    line-height: 25px;
    margin-bottom: 3px;
  }

  .data-pemeriksaan p {
    margin: 0;
  }

  .data-pemeriksaan ul {
    display: flex;
    flex-direction: column;
    margin: 0;
    padding-left: 5px;
  }
</style>
<script type="text/javascript">
  $(document).ready(function(e) {
    id_pelayanan = $('#inPel').val();
    reload_data_diagnosa_id_pel(id_pelayanan);
    reload_data_terapi_id_pel(id_pelayanan);
  });



  function cetak() {
    id = $('#inPel').val();
    id_history = $('#inHis').val();
    window.location.href = "<?php echo $url ?>";
  }

  function reload_data_diagnosa_id_pel(id_pelayanan) { // modal utk nampilin diagnosa pasien
    $('#tablediagnosa').dataTable().fnClearTable();
    $('#tablediagnosa').dataTable().fnDestroy();
    $('#tablediagnosa').DataTable({
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
        "url": '<?php echo base_url('Assembling/tampil_list_diagnosa'); ?>',
        "type": 'POST',
        "data": {
          id_pelayanan: id_pelayanan
        },
      },

      "deferRender": true,
      "processing": true,
      "order": [],
      "columnDefs": [{
        "width": "20%",
        "targets": [0],
        "orderable": false,
      }, ],
    });
  }

  function reload_data_terapi_id_pel(id_pelayanan) { //utk reload data diagnosa pasien jika berhasil
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
        "url": '<?php echo base_url('erm_igd/tampil_list_terapi'); ?>',
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
</script>
<script>
  $(document).ready(function() {
    id_pelayanan = $('#inPel').val();
    id_history = $('#inHis').val();
    $('#loading').show();
    $.ajax({
      url: "<?php echo base_url() ?>Erm_resume_medis_raj/get_data_resume",
      method: "POST",
      dataType: 'json',
      data: {
        id: id_pelayanan,
        id_history: id_history
      },
      success: function(data) {


        var html = "<table id='t_fisik'>" +
          "<tr><td>a. Tanda Vital: </td></tr>" +
        
          "<tr>" +
          "<td>Tekanan darah : " + data['tekanan_darah'] + " MmHg</td>" +
          "<td>Suhu : " + data['suhu'] + " &deg;C</td>" +
          "<td>Nadi : " + data['frequensi_nadi'] + " x/menit</td>" +
          "<td>Pernafasan : " + data['frequensi_nafas'] + " x/menit</td>" +
          "</tr>" +
          "<tr>" +
          "<td>Skala Nyeri : " + data['skala_nyeri'] + "</td>" +
          "<td></td>" +
          "<td></td>" +
          "<td></td>" +
          "</tr>" +
          "</table>";
        $('#p_fisik').html(html).attr("style", "color:black");
        const tabelHTML = generatePemeriksaanFisikTable(data);
        $('#p_fisik_2').html(tabelHTML).attr("style", "color:black");

        $('#loading').hide();

      }

    });
  });

  function generatePemeriksaanFisikTable(data) {
    let html = `
                <table>
                <tr>
                    <td>b. Pemeriksaan Fisik:</td>
            `;

    const allNormal = (
      data['kepala'] === "Dalam Batas Normal" &&
      data['hidung'] === "Dalam Batas Normal" &&
      data['mulut'] === "Dalam Batas Normal" &&
      data['leher'] === "Dalam Batas Normal" &&
      data['thorax'] === "Dalam Batas Normal" &&
      data['jantung'] === "Dalam Batas Normal" &&
      data['paru'] === "Dalam Batas Normal" &&
      data['andomen'] === "Dalam Batas Normal" &&
      data['punggung'] === "Dalam Batas Normal" &&
      data['ekstremitas'] === "Dalam Batas Normal"
    );

    if (allNormal) {
      html += `
          <td>Dalam Batas Normal</td>
        </tr>
    `;
    } else {
      html += `
        <td></td>
      </tr>
    `;

      if (data['kepala'] !== "Dalam Batas Normal") {
        html += `
    <tr>
      <td>Kepala :</td>
      <td>${data['kepala']}</td>
    </tr>
  `;
      }
      if (data['hidung'] !== "Dalam Batas Normal") {
        html += `
    <tr>
      <td>Hidung :</td>
      <td>${data['hidung']}</td>
    </tr>
  `;
      }
      if (data['mulut'] !== "Dalam Batas Normal") {
        html += `
    <tr>
      <td>Mulut :</td>
      <td>${data['mulut']}</td>
    </tr>
  `;
      }
      if (data['leher'] !== "Dalam Batas Normal") {
        html += `
    <tr>
      <td>Leher :</td>
      <td>${data['leher']}</td>
    </tr>
  `;
      }
      if (data['thorax'] !== "Dalam Batas Normal") {
        html += `
    <tr>
      <td>Thorax :</td>
      <td>${data['thorax']}</td>
    </tr>
  `;
      }
      if (data['jantung'] !== "Dalam Batas Normal") {
        html += `
    <tr>
      <td>Jantung :</td>
      <td>${data['jantung']}</td>
    </tr>
  `;
      }
      if (data['paru'] !== "Dalam Batas Normal") {
        html += `
    <tr>
      <td>Paru :</td>
      <td>${data['paru']}</td>
    </tr>
  `;
      }
      if (data['andomen'] !== "Dalam Batas Normal") {
        html += `
    <tr>
      <td>Andomen :</td>
      <td>${data['andomen']}</td>
    </tr>
  `;
      }
      if (data['punggung'] !== "Dalam Batas Normal") {
        html += `
    <tr>
      <td>Punggung :</td>
      <td>${data['punggung']}</td>
    </tr>
  `;
      }
      if (data['ekstremitas'] !== "Dalam Batas Normal") {
        html += `
    <tr>
      <td>Ekstremitas :</td>
      <td>${data['ekstremitas']}</td>
    </tr>
  `;
      }
    }

    html += `
    </table>
  `;
    return html;
  }
</script>

<script>
  $(document).ready(function() {
    $.ajax({
      url: "<?php echo base_url() ?>Erm_resume_medis_raj/tampil_list_tindakan",
      method: "POST",
      dataType: 'json',
      data: {
        id_pelayanan: id_pelayanan,
      },
      success: function(response) {
        let html = ''
        if (response.data && response.data.length > 0) {
          response.data.forEach((item, index) => {
            html += `
            <li>
              ${item.nama_tindakan}
            </li>
          `;
          });
        }else{
          html += `<li>Tidak ada data</li>`;
        }
        $("#list_tindakan_poli").html(html);
      }
    });


    $.ajax({
      url: "<?php echo base_url('Erm_resume_medis_raj/tampil_list_radiologi'); ?>",
      method: "POST",
      dataType: 'json',
      data: {
        id_pelayanan: id_pelayanan,
      },
      success: function(response) {
        let html = ''
        if (response.data && response.data.length > 0) {
          console
          response.data.forEach((item, index) => {
            html += `
            <li>
              ${item.nama}
            </li>
          `;
          });
        }else{
          html += `<li>Tidak ada data</li>`;
        }
        $("#list_radiologi").html(html);
      }

    });


    $.ajax({
      url: "<?php echo base_url('Erm_resume_medis_raj/tampil_list_labor'); ?>",
      method: "POST",
      dataType: 'json',
      data: {
        id_pelayanan: id_pelayanan,
      },
      success: function(response) {
        let html = ''
        if (response.data && response.data.length > 0) {
          console
          response.data.forEach((item, index) => {
            html += `
            <li>
              ${item.nama_tindakan}
            </li>
          `;
          });
        }else{
          html += `<li>Tidak ada data</li>`;
        }
        $("#list_labor").html(html);
      }

    });

  });
=======
<!-- Row -->
<div class="row">
  <div class="col-sm-12">
    <div class="panel panel-default card-view">
      <div class="panel-heading">
        <div class="pull-left">
          <h6 class="panel-title txt-dark">Resume Medis Rajal</h6>
        </div>
        <div class="clearfix"></div>
      </div>
      <div class="panel-wrapper collapse in">
        <div class="panel-body">
          <div class="form-wrap">


            <div class="form-group">
              <div class="col-md-4">
                <label class="control-label mb-10 text-left">Tanggal Masuk<span class="help"></span></label>
                <input type="text" class="form-control" value="<?= $tgl_masuk ?>" disabled>
              </div>
            </div>
            <input type="hidden" class="form-control" value="<?= $id_pelayanan ?>" id="inPel">
            <input type="hidden" class="form-control" value="<?= $id_history ?>" id="inHis">
            <div class="form-group">
              <div class="col-md-4">
                <label class="control-label mb-10 text-left">Tanggal Keluar<span class="help"></span></label>
                <input type="text" class="form-control" value="<?= $tgl_keluar ?>" disabled>
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-4">
                <label class="control-label mb-10 text-left">No RM<span class="help"></span></label>
                <input type="text" class="form-control" value="<?= $no_rm ?>" id="inNoRM" disabled>
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-4">
                <label class="control-label mb-10 text-left">Tanggal Lahir<span class="help"></span></label>
                <input type="date" class="form-control" value="<?= $tgl_lahir ?>" disabled>
                <span class="help-block"></span>
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-4">
                <label class="control-label mb-10 text-left">Nama Pasein<span class="help"></span></label>
                <input type="text" class="form-control" value="<?= $nama ?>" disabled>
                <span class="help-block"></span>
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-4">
                <label class="control-label mb-10 text-left">Jenis Kelamin<span class="help"></span></label>
                <input type="text" class="form-control" value="<?= $jenis_kelamin ?>" disabled>
                <span class="help-block"></span>
              </div>
            </div>
            <br>
            <div class="form-group ">


              <div class="form-group">
                <div class="col-md-4">
                  <label class="control-label mb-10 text-left">Anamnesa<span class="help"></span></label>
                  <textarea class="form-control" id="anamnesa" disabled><?php echo $per['keluhan_utama'] ?></textarea>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-4">
                  <label class="control-label mb-10 text-left">Riwayat Singkat Dan Pemeriksaan Fisik<span class="help"></span></label>
                  <!-- <textarea type="text" class="form-control" id="riwayat" disabled></?= $per['alloanamnesa'] ?></textarea> -->
                  <div class="has-success" id="p_fisik">
                    <!-- <textarea class="form-control" disabled cols="3" rows="2" id="p_fisik" name="p_fisik"></textarea> -->
                    <span class="help-block text-danger"></span>
                  </div>
                  <br>
                  <div class="has-success" id="p_fisik_2">
                    <!-- <textarea class="form-control" disabled cols="3" rows="2" id="p_fisik" name="p_fisik"></textarea> -->
                    <span class="help-block text-danger"></span>
                  </div>
                </div>
              </div>

              <div class="form-group ">
                <div class="col-md-12">
                  <label class="control-label mb-10 text-left">Pemeriksaan Penunjang/Diagnostik :</label>

                  <div class="data-pemeriksaan">
                    <p class="">
                      A. Tindakan Poli :
                    </p>
                    <ul id="list_tindakan_poli">

                    </ul>
                  </div>
                  <div class="data-pemeriksaan">
                    <p class="">
                      B. Radiologi :
                    </p>
                    <ul id="list_radiologi">

                    </ul>
                  </div>
                  <div class="data-pemeriksaan">
                    <p class="">
                      C. Labor :
                    </p>
                    <ul id="list_labor">

                    </ul>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-6">
                    <label class="control-label mb-10 text-left">Diagnosa Saat Masuk<span class="help"></span></label>
                    <input type="text" class="form-control" id="diagnosa_awal" value="<?= isset($pasien) ? $pasien->diagnosa : '' ?>" disabled>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-6">
                    <label class="control-label mb-10 text-left">Diagnosa Utama<span class="help"></span></label>
                    <input type="text" class="form-control" id="diagnosa_utama" value="<?= $diagnosa_utama['nama_diagnosa'] ?>" disabled>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-6">
                    <label class="control-label mb-10 text-left">Diagnosa Sekunder<span class="help"></span></label>
                    <div class="table-wrap" style="width: 80%; margin: auto ">
                      <div class="table-responsive">
                        <table class="table table-hover display  pb-60" id="tablediagnosa">
                          <thead>
                            <tr class="bg-success">
                              <th>ID DIAGNOSA</th>
                              <th>KODE</th>
                              <th>NAMA</th>

                            </tr>
                          </thead>
                          <tfoot>
                            <tr class="bg-success">
                              <th>ID DIAGNOSA</th>
                              <th>KODE</th>
                              <th>NAMA</th>

                            </tr>
                          </tfoot>
                          <tbody style="color: black">

                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-6">
                    <label class="control-label mb-10 text-left">Proses Pembedahaan/Tindakan<span class="help"></span></label>
                    <textarea class="form-control" name="" id="terapi" cols="30" rows="5" disabled><?= str_replace("<br>", "\n",$dok['prosedur_tindakan']) ?></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-12">
                    <h5 style="margin-top: 30px;"><strong>
                        <label class="control-label mb-10 text-left">Ringkasan Keluar<span class="help"></span></label>
                      </strong></h5>
                  </div>

                  <div class="form-group ">
                    <div class="col-md-6">
                      <label class="control-label mb-10 text-left">Keadaan Waktu Pulang</label>
                      <input disabled type="text" class="form-control" id="keadaan_pulang" value="<?= $dok['keadaan_pulang'] ?>">
                    </div>

                    <div class="form-group ">
                      <div class="col-md-6">
                        <label class="control-label mb-10 text-left">Alasan Pulang</label>
                        <input disabled type="text" class="form-control" id="alasan_pulang" value="<?= $dok['tindak_lanjut'] ?>">
                      </div>

                      <div class="form-group">
                        <div class="col-md-6">
                          <label class="control-label mb-10 text-left">Hari / Tanggal Kontrol Ke RS :<span class="help"></span></label>
                          <input type="text" class="form-control" id="tgl_kontrol" value="<?php $date = isset($pasien) ? strtotime($pasien->tgl_masuk) : strtotime($tgl_masuk);
                                                                                          echo date('d-m-Y', $date) ?>" disabled>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="col-md-6">
                          <label class="control-label mb-10 text-left">Jam<span class="help"></span></label>
                          <input type="text" class="form-control" id="jam_kontrol" value="<?php date_default_timezone_set('Asia/Jakarta');
                                                                                          echo date('h:i:s', $date) ?>" disabled>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="col-md-6">
                          <label class="control-label mb-10 text-left">Poliklinik :<span class="help"></span></label>
                          <textarea class="form-control" name="" id="konsul" cols="30" rows="5" disabled><?= $dok['konsul'] ?></textarea>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="col-md-6">
                          <label class="control-label mb-10 text-left">Edukasi Yang Diberikan<span class="help"></span></label>
                          <input type="text" class="form-control" id="edukasi" disabled>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="col-md-12">
                          <h5>
                            <strong>
                              <label class="control-label mb-10 text-left">Terapi<span class="help"></span></label>
                            </strong>
                          </h5>

                          <div class="table-wrap" style="width: 80%; margin: auto ">
                            <div class="table-responsive">
                              <table class="table table-hover display  pb-60" id="tabel_terapi">
                                <thead>
                                  <tr class="bg-success">
                                    <th>NAMA OBAT</th>
                                    <th>DOSIS</th>
                                    <th>FREKUENSI</th>
                                    <th>CARA PEMBERIAN</th>
                                  </tr>
                                </thead>
                                <tfoot>
                                  <tr class="bg-success">
                                    <th>NAMA OBAT</th>
                                    <th>DOSIS</th>
                                    <th>FREKUENSI</th>
                                    <th>CARA PEMBERIAN</th>
                                  </tr>
                                </tfoot>
                                <tbody style="color: black">

                                </tbody>
                              </table>
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
                          <button type="submit" class="btn btn-success mb-4" onclick="cetak()">CETAK</button>
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
  </div>
</div>
<div id="loading" style="display:none;">
  <div class="spinner"></div>
  <p>Sedang memuat...</p>
</div>
<style>
  #t_fisik td {
    padding-right: 15px;
  }

  #loading {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    /* Latar belakang semi-transparan */
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 1000;
    /* Pastikan di atas konten lain */
    flex-direction: column;
  }

  .spinner {
    border: 4px solid rgba(0, 0, 0, 0.3);
    border-top: 4px solid #3498db;
    border-radius: 50%;
    width: 50px;
    height: 50px;
    animation: spin 2s linear infinite;
    margin-bottom: 10px;
  }

  @keyframes spin {
    0% {
      transform: rotate(0deg);
    }

    100% {
      transform: rotate(360deg);
    }
  }

   .table_pemeriksaan {
    color: black;
    width: 65%;
    border-collapse: collapse;
    margin-bottom: 20px;
  }


  .data-pemeriksaan {
    display: flex;
    align-items: start;
    color: black;
    line-height: 25px;
    margin-bottom: 3px;
  }

  .data-pemeriksaan p {
    margin: 0;
  }

  .data-pemeriksaan ul {
    display: flex;
    flex-direction: column;
    margin: 0;
    padding-left: 5px;
  }
</style>
<script type="text/javascript">
  $(document).ready(function(e) {
    id_pelayanan = $('#inPel').val();
    reload_data_diagnosa_id_pel(id_pelayanan);
    reload_data_terapi_id_pel(id_pelayanan);
  });



  function cetak() {
    id = $('#inPel').val();
    id_history = $('#inHis').val();
    window.location.href = "<?php echo $url ?>";
  }

  function reload_data_diagnosa_id_pel(id_pelayanan) { // modal utk nampilin diagnosa pasien
    $('#tablediagnosa').dataTable().fnClearTable();
    $('#tablediagnosa').dataTable().fnDestroy();
    $('#tablediagnosa').DataTable({
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
        "url": '<?php echo base_url('Assembling/tampil_list_diagnosa'); ?>',
        "type": 'POST',
        "data": {
          id_pelayanan: id_pelayanan
        },
      },

      "deferRender": true,
      "processing": true,
      "order": [],
      "columnDefs": [{
        "width": "20%",
        "targets": [0],
        "orderable": false,
      }, ],
    });
  }

  function reload_data_terapi_id_pel(id_pelayanan) { //utk reload data diagnosa pasien jika berhasil
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
        "url": '<?php echo base_url('erm_igd/tampil_list_terapi'); ?>',
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
</script>
<script>
  $(document).ready(function() {
    id_pelayanan = $('#inPel').val();
    id_history = $('#inHis').val();
    $('#loading').show();
    $.ajax({
      url: "<?php echo base_url() ?>Erm_resume_medis_raj/get_data_resume",
      method: "POST",
      dataType: 'json',
      data: {
        id: id_pelayanan,
        id_history: id_history
      },
      success: function(data) {


        var html = "<table id='t_fisik'>" +
          "<tr><td>a. Tanda Vital: </td></tr>" +
        
          "<tr>" +
          "<td>Tekanan darah : " + data['tekanan_darah'] + " MmHg</td>" +
          "<td>Suhu : " + data['suhu'] + " &deg;C</td>" +
          "<td>Nadi : " + data['frequensi_nadi'] + " x/menit</td>" +
          "<td>Pernafasan : " + data['frequensi_nafas'] + " x/menit</td>" +
          "</tr>" +
          "<tr>" +
          "<td>Skala Nyeri : " + data['skala_nyeri'] + "</td>" +
          "<td></td>" +
          "<td></td>" +
          "<td></td>" +
          "</tr>" +
          "</table>";
        $('#p_fisik').html(html).attr("style", "color:black");
        const tabelHTML = generatePemeriksaanFisikTable(data);
        $('#p_fisik_2').html(tabelHTML).attr("style", "color:black");

        $('#loading').hide();

      }

    });
  });

  function generatePemeriksaanFisikTable(data) {
    let html = `
                <table>
                <tr>
                    <td>b. Pemeriksaan Fisik:</td>
            `;

    const allNormal = (
      data['kepala'] === "Dalam Batas Normal" &&
      data['hidung'] === "Dalam Batas Normal" &&
      data['mulut'] === "Dalam Batas Normal" &&
      data['leher'] === "Dalam Batas Normal" &&
      data['thorax'] === "Dalam Batas Normal" &&
      data['jantung'] === "Dalam Batas Normal" &&
      data['paru'] === "Dalam Batas Normal" &&
      data['andomen'] === "Dalam Batas Normal" &&
      data['punggung'] === "Dalam Batas Normal" &&
      data['ekstremitas'] === "Dalam Batas Normal"
    );

    if (allNormal) {
      html += `
          <td>Dalam Batas Normal</td>
        </tr>
    `;
    } else {
      html += `
        <td></td>
      </tr>
    `;

      if (data['kepala'] !== "Dalam Batas Normal") {
        html += `
    <tr>
      <td>Kepala :</td>
      <td>${data['kepala']}</td>
    </tr>
  `;
      }
      if (data['hidung'] !== "Dalam Batas Normal") {
        html += `
    <tr>
      <td>Hidung :</td>
      <td>${data['hidung']}</td>
    </tr>
  `;
      }
      if (data['mulut'] !== "Dalam Batas Normal") {
        html += `
    <tr>
      <td>Mulut :</td>
      <td>${data['mulut']}</td>
    </tr>
  `;
      }
      if (data['leher'] !== "Dalam Batas Normal") {
        html += `
    <tr>
      <td>Leher :</td>
      <td>${data['leher']}</td>
    </tr>
  `;
      }
      if (data['thorax'] !== "Dalam Batas Normal") {
        html += `
    <tr>
      <td>Thorax :</td>
      <td>${data['thorax']}</td>
    </tr>
  `;
      }
      if (data['jantung'] !== "Dalam Batas Normal") {
        html += `
    <tr>
      <td>Jantung :</td>
      <td>${data['jantung']}</td>
    </tr>
  `;
      }
      if (data['paru'] !== "Dalam Batas Normal") {
        html += `
    <tr>
      <td>Paru :</td>
      <td>${data['paru']}</td>
    </tr>
  `;
      }
      if (data['andomen'] !== "Dalam Batas Normal") {
        html += `
    <tr>
      <td>Andomen :</td>
      <td>${data['andomen']}</td>
    </tr>
  `;
      }
      if (data['punggung'] !== "Dalam Batas Normal") {
        html += `
    <tr>
      <td>Punggung :</td>
      <td>${data['punggung']}</td>
    </tr>
  `;
      }
      if (data['ekstremitas'] !== "Dalam Batas Normal") {
        html += `
    <tr>
      <td>Ekstremitas :</td>
      <td>${data['ekstremitas']}</td>
    </tr>
  `;
      }
    }

    html += `
    </table>
  `;
    return html;
  }
</script>

<script>
  $(document).ready(function() {
    $.ajax({
      url: "<?php echo base_url() ?>Erm_resume_medis_raj/tampil_list_tindakan",
      method: "POST",
      dataType: 'json',
      data: {
        id_pelayanan: id_pelayanan,
      },
      success: function(response) {
        let html = ''
        if (response.data && response.data.length > 0) {
          response.data.forEach((item, index) => {
            html += `
            <li>
              ${item.nama_tindakan}
            </li>
          `;
          });
        }else{
          html += `<li>Tidak ada data</li>`;
        }
        $("#list_tindakan_poli").html(html);
      }
    });


    $.ajax({
      url: "<?php echo base_url('Erm_resume_medis_raj/tampil_list_radiologi'); ?>",
      method: "POST",
      dataType: 'json',
      data: {
        id_pelayanan: id_pelayanan,
      },
      success: function(response) {
        let html = ''
        if (response.data && response.data.length > 0) {
          console
          response.data.forEach((item, index) => {
            html += `
            <li>
              ${item.nama}
            </li>
          `;
          });
        }else{
          html += `<li>Tidak ada data</li>`;
        }
        $("#list_radiologi").html(html);
      }

    });


    $.ajax({
      url: "<?php echo base_url('Erm_resume_medis_raj/tampil_list_labor'); ?>",
      method: "POST",
      dataType: 'json',
      data: {
        id_pelayanan: id_pelayanan,
      },
      success: function(response) {
        let html = ''
        if (response.data && response.data.length > 0) {
          console
          response.data.forEach((item, index) => {
            html += `
            <li>
              ${item.nama_tindakan}
            </li>
          `;
          });
        }else{
          html += `<li>Tidak ada data</li>`;
        }
        $("#list_labor").html(html);
      }

    });

  });
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
</script>