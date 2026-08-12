<!-- Row -->
<div class="row">
  <div class="col-sm-12">
    <div class="panel panel-default card-view">
      <div class="panel-heading">
        <div class="pull-left">
          <h6 class="panel-title txt-dark">ANAMNESIS DAN PEMERIKSAAN FISIK</h6>
        </div>
        <div class="clearfix"></div>
      </div>
      <div class="panel-wrapper collapse in">

        <div class="panel-body">
          <div class="form-wrap">


            <input type="hidden" disabled class="form-control" value="<?= $data['no_rm'] ?>" id="inNoRM">

            <input type="hidden" class="form-control" value="<?= $data['id_pelayanan'] ?>" id="inPel">
            <input type="hidden" class="form-control" value="<?= $data['id_history'] ?>" id="inHis">
            <input type="hidden" class="form-control" id="id">
            <div class="form-group">
              <div class="col-md-3">
                <label class="control-label mb-10 text-left">Nama<span class="help"></span></label>
                <input type="text" disabled class="form-control" value="<?= $data['nama'] ?>">
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-3">
                <label class="control-label mb-10 text-left">Tgl Lahir<span class="help"></span></label>
                <input type="text" disabled class="form-control" value="<?= $data['tgl_lahir'] ?>">
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-3">
                <label class="control-label mb-10 text-left">Umur<span class="help"></span></label>
                <input type="text" disabled class="form-control" value="<?php
                                                                        $tanggal = new DateTime($data['tgl_lahir']);
                                                                        $today = new DateTime();
                                                                        $y = $today->diff($tanggal)->y;
                                                                        echo  $y . " tahun";  ?>">
              </div>
            </div>

            <div class="form-group ">
              <div class="col-md-3">
                <label class="control-label mb-10 text-left">Jenis Kelamin</label>
                <input type="text" class="form-control" value="<?= $data['jenis_kelamin'] ?>" disabled>
              </div>
            </div>


            <div class="form-group">
              <div class="col-md-12">
                <h5 style="margin-top: 30px;"><strong>
                    <label class="control-label mb-10 text-left">
                      PEMERIKSAAN FISIK
                      <span class="help"></span>
                    </label></strong>
                </h5>
              </div>

              <div class="col-md-12">
                <strong>
                  <label class="control-label mb-10 text-left">
                    <p><br>Tanda Vital</p>
                  </label>
                </strong>
              </div>
              <div class="form-group">
                <div class="col-md-4">
                  <label class="control-label mb-10 text-left">Tinggi Badan<span class="help"></span></label>
                  <input type="text" class="form-control" id="tinggi_badan" value="" disabled>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-4">
                  <label class="control-label mb-10 text-left">Berat Badan<span class="help"></span></label>
                  <input type="text" class="form-control" id="berat_badan" value="" disabled>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-4">
                  <label class="control-label mb-10 text-left">Nadi<span class="help"></span></label>
                  <input type="number" class="form-control" id="frequensi_nadi" placeholder="x/menit" value="" disabled>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-4">
                  <label class="control-label mb-10 text-left">Suhu<span class="help"></span></label>
                  <input type="number" class="form-control" id="suhu" placeholder="&deg;C" value="" disabled>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-4">
                  <label class="control-label mb-10 text-left">Pernafasan<span class="help"></span></label>
                  <input type="number" class="form-control" id="frequensi_nafas" placeholder="x/menit" value="" disabled>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-4">
                  <label class="control-label mb-10 text-left">Tekanan Darah<span class="help"></span></label>
                  <input type="number" class="form-control" id="tekanan_darah" placeholder="mmHg" value="" disabled>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-4">
                  <label class="control-label mb-10 text-left"><b>Keluhan Utama:<b /><span class="help"></span></label>
                  <span id="keluhan_error" class="text-danger"></span>
                  <div class="has-success">
                    <textarea class="form-control" name="" id="keluhan" cols="30" rows="3" disabled></textarea>
                  </div>
                </div>
                <div class="col-md-4">
                  <label class="control-label mb-10 text-left"><b>Riwayat Penyakit Sekarang: <b /><span class="help"></span></label>
                  <span id="riwayat_error" class="text-danger"></span>
                  <div class="has-success">
                    <textarea class="form-control" name="" id="riwayat_sakit_skrg" cols="30" rows="3" disabled></textarea>
                  </div>
                </div>
                <div class="col-md-4">
                  <label class="control-label mb-10 text-left"><b>Riwayat Penyakit Dahulu: <b /><span class="help"></span></label>
                  <div class="has-success">
                    <textarea class="form-control" name="" id="riwayat_sakit_dulu" cols="30" rows="3" disabled></textarea>
                  </div>
                </div>
                <div class="col-md-4">
                  <label class="control-label mb-10 text-left"><b>Riwayat Alergi: <b /><span class="help"></span></label>
                  <div class="has-success">
                    <textarea class="form-control" name="" id="riwayat_alergi" cols="30" rows="3" disabled></textarea>
                  </div>
                </div>
                <div class="col-md-4">
                  <label class="control-label mb-10 text-left"><b>Keadaan Sosial: <b /><span class="help"></span></label>
                  <div class="has-success">
                    <textarea class="form-control" name="" id="ham_sos" cols="30" rows="3" disabled></textarea>
                  </div>
                </div>

              </div>

              <div class="col-md-12">
                <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
              </div>
              <div class="col-md-7">
                <div class="form-group">
                  <div class="col-md-12">
                    <label class="control-label mb-10 text-left"><b>Kepala: <b /><span class="help"></span></label>
                    <div class="has-success">
                      <textarea class="form-control" name="" id="kepala" cols="30" rows="2" disabled>Dalam Batas Normal</textarea>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-12">
                    <label class="control-label mb-10 text-left"><b>Hidung: <b /><span class="help"></span></label>
                    <div class="has-success">
                      <textarea class="form-control" name="" id="hidung" cols="30" rows="2" disabled>Dalam Batas Normal</textarea>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-12">
                    <label class="control-label mb-10 text-left"><b>Mulut: <b /><span class="help"></span></label>
                    <div class="has-success">
                      <textarea class="form-control" name="" id="mulut" cols="30" rows="2" disabled>Dalam Batas Normal</textarea>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-12">
                    <label class="control-label mb-10 text-left"><b>Leher: <b /><span class="help"></span></label>
                    <div class="has-success">
                      <textarea class="form-control" name="" id="leher" cols="30" rows="2" disabled>Dalam Batas Normal</textarea>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-12">
                    <label class="control-label mb-10 text-left"><b>THORAX : <b /><span class="help"></span></label>
                    <div class="has-success">
                      <textarea class="form-control" name="" id="thorax" cols="30" rows="2" disabled>Dalam Batas Normal</textarea>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-12">
                    <label class="control-label mb-10 text-left"><b>Jantung : <b /><span class="help"></span></label>
                    <div class="has-success">
                      <textarea class="form-control" name="" id="jantung" cols="30" rows="2" disabled>Dalam Batas Normal</textarea>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-12">
                    <label class="control-label mb-10 text-left"><b>Paru : <b /><span class="help"></span></label>
                    <div class="has-success">
                      <textarea class="form-control" name="" id="paru" cols="30" rows="2" disabled>Dalam Batas Normal</textarea>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-12">
                    <label class="control-label mb-10 text-left"><b>Andomen dan Pelvis : <b /><span class="help"></span></label>
                    <div class="has-success">
                      <textarea class="form-control" name="" id="andomen" cols="30" rows="2" disabled>Dalam Batas Normal</textarea>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-12">
                    <label class="control-label mb-10 text-left"><b>Punggung dan Pinggang : <b /><span class="help"></span></label>
                    <div class="has-success">
                      <textarea class="form-control" name="" id="punggung" cols="30" rows="2" disabled>Dalam Batas Normal</textarea>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-12">
                    <label class="control-label mb-10 text-left"><b>Ekstremitas : <b /><span class="help"></span></label>
                    <div class="has-success">
                      <textarea class="form-control" name="" id="ekstremitas" cols="30" rows="2" disabled>Dalam Batas Normal</textarea>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-5">
                <canvas id="can" width="500" height="400"></canvas>

                <div class="form-group">
                  <div class="col-md-12">
                    <label class="control-label mb-10 text-left"><b>Keterangan : <b /><span class="help"></span></label>
                    <div class="has-success">
                      <textarea class="form-control" name="" id="keterangan" cols="30" rows="2" disabled></textarea>
                    </div>
                  </div>
                </div>

              </div>
            </div>

            <div class="col-md-12">
              <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
            </div>
            <div class="form-group">
              <div class="form-group">
                <div class="col-md-8">
                  <strong>
                    <label class="control-label mb-10 text-left">
                      <b>Diagnosa Utama: </b><span class="help"></span>
                    </label>
                  </strong>
                  <div class="table-wrap" style="width: 70%; margin: auto ">
                    <div class="table-responsive">
                      <table class="table table-hover display  pb-60" id="tablediagnosa1">
                        <thead>
                          <tr class="bg-success">
                            <th>ID DIAGNOSA</th>
                            <th>KODE</th>
                            <th>NAMA</th>
                            <!-- <th>HAPUS</th> -->
                          </tr>
                        </thead>
                        <tfoot>
                          <tr class="bg-success">
                            <th>ID DIAGNOSA</th>
                            <th>KODE</th>
                            <th>NAMA</th>
                            <!-- <th>HAPUS</th> -->
                          </tr>
                        </tfoot>
                        <tbody style="color: black">
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <strong>
                    <label class="control-label mb-10 text-left">
                      <b>Diagnosa Sekunder: </b><span class="help"></span>
                    </label>
                  </strong>
                  <div class="table-wrap" style="width: 70%; margin: auto ">
                    <div class="table-responsive">
                      <table class="table table-hover display  pb-60" id="tablediagnosa">
                        <thead>
                          <tr class="bg-success">
                            <th>ID DIAGNOSA</th>
                            <th>KODE</th>
                            <th>NAMA</th>
                            <!-- <th>HAPUS</th> -->
                          </tr>
                        </thead>
                        <tfoot>
                          <tr class="bg-success">
                            <th>ID DIAGNOSA</th>
                            <th>KODE</th>
                            <th>NAMA</th>
                            <!-- <th>HAPUS</th> -->
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
                <div class="col-md-12">
                  <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                </div>
                <div class="form-group">
                  <div class="col-md-4">
                    <span id="terapi_error" class="text-danger"></span>
                    <label class="control-label mb-10 text-left">Terapi/Instruksi:</label>
                    <div class="has-success">
                      <textarea class="form-control" name="" id="terapi" cols="30" rows="5" disabled></textarea>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-4">
                    <label class="control-label mb-10 text-left">Konsul:</label>
                    <span id="konsul_error" class="text-danger"></span>
                    <div class="has-success">
                      <textarea class="form-control" name="" id="konsul" cols="30" rows="5" disabled></textarea>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
              </div>
              <div class="form-group">
                <div class="col-md-4">
                  <label class="control-label mb-10 text-left">Dokter Periksa<span class="help"></span></label>
                  <span id="nama_error" class="text-danger"></span>
                  <div class="has-success">
                    <input type="text" class="form-control" id="nama_lengkap" value="<?=$data['dpjp'] ?>" disabled>
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
              </div>
             

              <div class="form-group text-center" style="margin-top: 30px;">
                <div class="col-md-12">
                  <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                </div>
                <!-- Button -->
                <div class="col-md-6">
                  <a class="btn btn-default btn-anim  btn-sm" onclick="javascript:history.go(-1)" style="margin-right: 20px; margin-left: 30px;"><i class="fa fa-arrow-left"></i><span class="btn-text">KEMBALI</span></a>
                  <button type="submit" class="btn btn-success mb-4" onclick="cetak()">Cetak</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!--batas-->

<style>
  canvas {
    cursor: crosshair;
    border: 1px solid #000000;
  }
</style>

<script type="text/javascript">
  $(document).ready(function() {
    id_pelayanan = $('#inPel').val();
    $.ajax({
      url: "<?php echo base_url() ?>Erm_ases_dok_igd/get_ass_per",
      method: "POST",
      dataType: 'json',
      data: {
        id: id_pelayanan
      },
      success: function(data) {
        if (data.status_dt == 'found') {
          $('#tekanan_darah').val(data.tekanan_darah);
          $('#frequensi_nadi').val(data.frequensi_nadi);
          $('#frequensi_nafas').val(data.frequensi_nafas);
          $('#suhu').val(data.suhu);
          $('#skala_nyeri').val(data.skala_nyeri);
          $('#gcs').val(data.gcs);
          $('#kondisi_umum').val(data.kondisi_umum);
          $('#berat_badan').val(data.berat_badan);
          $('#tinggi_badan').val(data.tinggi_badan);
          $('#kebutuhan_khusus').val(data.kebutuhan_khusus);
          $('#asesment_triase').val(data.asesment_triase);
        }
      }

    });
  });
</script>
<script type="text/javascript">
  $(document).ready(function() {
    id_history = $('#inHis').val();
    $.ajax({
      url: "<?php echo base_url() ?>Rawatinap/get_ass_dok",
      method: "POST",
      dataType: 'json',
      data: {
        id: id_history
      },
      success: function(data) {
        $('#riwayat_alergi').val(data.riwayat_alergi);
        $('#ham_sos').val(data.ham_sos);



        $('#keluhan').val(data.keluhan);
        $('#riwayat_sakit_skrg').val(data.riwayat);
        $('#riwayat_sakit_dulu').val(data.riwayat_dulu).attr('disabled', true);
        $('#kepala').val(data.kepala);
        $('#hidung').val(data.hidung);
        $('#mulut').val(data.mulut);
        $('#leher').val(data.leher);
        $('#thorax').val(data.thorax);
        $('#jantung').val(data.jantung);
        $('#paru').val(data.paru);
        $('#andomen').val(data.andomen);
        $('#punggung').val(data.punggung);
        $('#ekstremitas').val(data.ekstremitas);
        $('#terapi').val(data.terapi);
        $('#konsul').val(data.konsul);
        // $('#nama_lengkap').val(data.dpjp);
        $('#id').val(data.id_form_ass_dokter_igd);

        no = 0;
        steps = new Array();
        canvas = document.getElementById('can');
        ctx = canvas.getContext("2d");
       

        var img = new Image();
        img.onload = function() {
          ctx.drawImage(img, 0, 0, 500, 400);
          steps.length = 0;
          steps[no] = ctx.getImageData(0, 0, canvas.width, canvas.height);
          // 			steps.push(  ctx.getImageData(0,0,canvas.width,canvas.height)); 
        }
        img.src = "<?php echo base_url(); ?>" + data.gambar;


      }



    });
  });
</script>
<script type="text/javascript">
  
  $(document).ready(function(e) {

    id_pelayanan = $('#inPel').val();
    reload_data_diagnosa(id_pelayanan);
    reload_data_diagnosa_id_pel(id_pelayanan);
    reload_data_diagnosa1_id_pel1(id_pelayanan);
    reload_data_penunjang(id_pelayanan);
  });
</script>

<script type="text/javascript">
  function reload_data_diagnosa(id_pelayanan) { //nampilinn diagnosa seluruhnya utk nambah ke diagnosa pasien
    $('#tabledgns').dataTable().fnClearTable();
    $('#tabledgns').dataTable().fnDestroy();
    $('#tabledgns').DataTable({
      "scrollX": false,
      "scrollY": false,
      "pageLength": 3,
      "language": {
        "sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
        "sProcessing": "Sedang memproses...",
        "sLengthMenu": "Tampilkan _MENU_ entri",
        "sZeroRecords": "Tidak ditemukan data yang sesuai",
        "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
        "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
        "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
        "sInfoPostFix": "",
        "sSearch": "Cari Diagnosa:",
        "sUrl": "",
        "oPaginate": {
          "sFirst": "Pertama",
          "sPrevious": "Sebelumnya",
          "sNext": "Selanjutnya",
          "sLast": "Terakhir",
        }
      },
      "ajax": {
        "url": '<?php echo base_url('Assembling/tampil_listdata_diagnosa'); ?>',
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

  function reload_data_diagnosa1_id_pel1(id_pelayanan) { // modal utk nampilin diagnosa pasien
    $('#tablediagnosa1').dataTable().fnClearTable();
    $('#tablediagnosa1').dataTable().fnDestroy();
    $('#tablediagnosa1').DataTable({
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
        "url": '<?php echo base_url('erm_igd/tampil_list_diagnosa1'); ?>',
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

  function tambah_data_diagnosa(id_pelayanan, id_diagnosa, nama_diagnosa) { //utk nambah diagnosa pasien
    id_pelayanan = $('#inPel').val();
    // no_diagnosa = $('#no_diagnosa').val();
    swal({
      title: "Apakah kamu yakin?",
      text: "Menambah Diagnosa " + nama_diagnosa + "?",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3cb878",
      confirmButtonText: "Yakin",
      cancelButtonText: "Batal",
      closeOnConfirm: false
    }, function() {
      $().ready(function() {
        $.ajax({
          url: "<?php echo base_url() ?>erm_igd/tambah_data_diagnosa",
          method: "POST",
          dataType: 'json',
          data: {
            id_pelayanan: id_pelayanan,
            id_diagnosa: id_diagnosa,
            nama_diagnosa: nama_diagnosa,

          },
          success: function(data) {
            if (data.status == "success") {
              swal({
                title: "good job!",
                type: "success",
                text: "Id diagnosa" + id_diagnosa + " Berhasil ditambah",
                confirmButtonColor: "#3cb878",
              });
              reload_data_diagnosa_id_pel(id_pelayanan);
              reload_data_diagnosa1_id_pel1(id_pelayanan);
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
      });

    });
    return false;
  }

  function hapus_data_diagnosa(id) { //utk hapus diagnosa pasien
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
          url: "<?php echo base_url() ?>Erm_igd/hapus_data_diagnosa",
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
              reload_data_diagnosa_id_pel(id_pelayanan);
              reload_data_diagnosa1_id_pel1(id_pelayanan);
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

  function cetak() {
    id = $('#inPel').val();
    window.location.href = "<?php echo base_url('Rawatinap/print_anamnesis/') ?>" + id;
  }

  function reload_data_penunjang(id_pelayanan) { //nampilinn diagnosa seluruhnya utk nambah ke diagnosa pasien
    $('#tabel_penunjang').dataTable().fnClearTable();
    $('#tabel_penunjang').dataTable().fnDestroy();
    $('#tabel_penunjang').DataTable({
      "scrollX": false,
      "scrollY": false,
      "pageLength": 3,
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
        "url": '<?php echo base_url('Erm_ases_dok_igd/tampil_listdata_penunjang'); ?>',
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

  function hapus_data_penunjang(nama, id) { //utk hapus diagnosa pasien
    swal({
      title: "Warning?",
      text: "Apakah kamu yakin menghapus file " + nama + " ini?",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3cb878",
      confirmButtonText: "Yakin",
      cancelButtonText: "Batal",
      closeOnConfirm: false
    }, function() {
      $().ready(function() {
        $.ajax({
          url: "<?php echo base_url() ?>Erm_ases_dok_igd/hapus_data_penunjang",
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
              $('#tabel_penunjang').DataTable().ajax.reload();
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

  function upload_file_modal() {
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#formUploadModal').modal('show'); // show bootstrap modal
    $('.modal-title').text('Form Upload File'); // Set Title to Bootstrap modal title
  }

  function upload_file() {
    $('#btnUpload').text('uploading...'); //change button text
    $('#btnUpload').attr('disabled', true); //set button disable 


    // ajax adding data to database
    var formData = new FormData($('#formUpload')[0]);
    $.ajax({
      url: "<?php echo base_url() ?>Erm_ases_dok_igd/upload_file",
      type: "POST",
      data: formData,
      contentType: false,
      processData: false,
      dataType: "JSON",
      success: function(data) {

        if (data.status) //if success close modal and reload ajax table
        {

          $('#formUpload')[0].reset(); // reset form on modals
          $('#tabel_penunjang').DataTable().ajax.reload();

          swal({
            title: "good job!",
            type: "success",
            text: "Data Berhasil diupload",
            confirmButtonColor: "#3cb878",
          });
          $('#formUploadModal').modal('hide');
        } else {
          for (var i = 0; i < data.inputerror.length; i++) {
            $('[name="' + data.inputerror[i] + '"]').parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
            $('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]); //select span help-block class set text error string
          }
          $('#formUploadModal').modal('hide');
        }
        $('#btnUpload').text('upload'); //change button text
        $('#btnUpload').attr('disabled', false); //set button enable 




      }
    });
  }
</script>