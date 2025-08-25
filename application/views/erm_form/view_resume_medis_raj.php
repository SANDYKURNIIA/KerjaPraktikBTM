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
                  <textarea class="form-control" id="anamnesa" disabled><?php echo $dok['keluhan'] ?></textarea>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-4">
                  <label class="control-label mb-10 text-left">Riwayat Singkat Dan Pemeriksaan Fisik<span class="help"></span></label>
                  <textarea type="text" class="form-control" id="riwayat" disabled><?= $dok['riwayat'] ?></textarea>
                </div>
              </div>

              <div class="form-group ">
                <div class="col-md-12">
                  <label class="control-label mb-10 text-left">Pemeriksaan Penunjang/Diagnostik :</label>

                </div>

                <div class="form-group">
                  <div class="col-md-6">
                    <label class="control-label mb-10 text-left">Diagnosa Saat Masuk<span class="help"></span></label>
                    <input type="text" class="form-control" id="diagnosa_awal" value="<?= $pasien->diagnosa ?>" disabled>
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
                    <textarea class="form-control" name="" id="terapi" cols="30" rows="5" disabled><?= $dok['terapi'] ?></textarea>
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
                          <input type="text" class="form-control" id="tgl_kontrol" value="<?php $date = strtotime($pasien->tgl_masuk);
                                                                                          echo date('d-m-Y', $date) ?>" disabled>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="col-md-6">
                          <label class="control-label mb-10 text-left">Jam<span class="help"></span></label>
                          <input type="text" class="form-control" id="jam_kontrol" value="<?php date_default_timezone_set('Asia/Jakarta');
                                                                                          $date = strtotime($pasien->tgl_masuk);
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
<script type="text/javascript">
  $(document).ready(function(e) {
    id_pelayanan = $('#inPel').val();
    reload_data_diagnosa_id_pel(id_pelayanan);
    reload_data_terapi_id_pel(id_pelayanan);
  });

  function simpan() {
    id_pelayanan = $('#inPel').val();
    id_history = $('#inHis').val();
    no_rm = $('#inNoRM').val();
    
    anamnesa = $('#anamnesa').val();
    riwayat = $('#riwayat').val();
    diagnostik = $('input[name="diagnostik"]:checked').val();
    if (diagnostik == "Lainnya") {
      diagnostik = $('#diagnostik').val();
    }
    diagnosa_awal = $('#diagnosa_awal').val();
    diagnosa_utama = $('#diagnosa_utama').val();
    diagnosa_sekunder = $('#diagnosa_sekunder').val();
    proses_bedah = $('#proses_bedah').val();
    kondisi_pulang = $('input[name="kondisi_pulang"]:checked').val();
    alasan_pulang = $('input[name="alasan_pulang"]:checked').val();
    if (alasan_pulang == "1") {
      alasan_pulang = 'Dirujuk ke: ' + $('#alasan_pulang').val();
    }
    tgl_kontrol = $('#tgl_kontrol').val();
    jam_kontrol = $('#jam_kontrol').val();
    poliklinik = $('#poliklinik').val();
    edukasi = $('#edukasi').val();

    dataString = 'no_rm=' + no_rm + '&id_pelayanan=' + id_pelayanan +
      '&riwayat_alergi=' + riwayat_alergi + '&anamnesa=' + anamnesa +
      '&riwayat=' + riwayat + '&diagnostik=' + diagnostik + '&diagnosa_awal=' + diagnosa_awal + '&diagnosa_utama=' + diagnosa_utama + '&diagnosa_sekunder=' + diagnosa_sekunder +
      '&proses_bedah=' + proses_bedah + '&kondisi_pulang=' + kondisi_pulang + '&alasan_pulang=' + alasan_pulang + '&tgl_kontrol=' + tgl_kontrol +
      '&jam_kontrol=' + jam_kontrol + '&poliklinik=' + poliklinik + '&edukasi=' + edukasi;


    $.ajax({
      url: "<?php echo base_url() ?>Erm_ases_per_igd/insert_asses_perawat_igd",
      method: "POST",
      dataType: 'json',
      data: dataString,
      success: function(data) {
        if (data.status == "success") {
          window.location.href = "<?php echo base_url('Erm_igd/form/') ?>" + id_pelayanan + '/' + id_history;
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
  function cetak() {
    id = $('#inPel').val();
    id_history = $('#inHis').val();
    window.location.href = "<?php echo base_url('Erm_igd_edit/print_resume_medis/') ?>" + id +'/'+id_history;
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
        "url": '<?php echo base_url('Erm_igd/tampil_list_diagnosa'); ?>',
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