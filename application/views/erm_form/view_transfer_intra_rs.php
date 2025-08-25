<div class="row">
  <div class="col-sm-12">
    <div class="panel panel-default card-view">
      <div class="panel-heading">
        <div class="pull-left">
          <h6 class="panel-title txt-dark">Transfer Internal Rumah Sakit</h6>
        </div>
        <div class="clearfix"></div>
      </div>
      <div class="panel-wrapper collapse in">
        <div class="panel-body">
          <div class="form-wrap">

            <div class="form-group">
              <div class="col-md-3">
                <label class="control-label mb-10 text-left">No.RM<span class="help"></span></label>
                <input type="text" class="form-control" value="<?= $no_rm ?>" disabled id="inNoRM">
              </div>
            </div>
            <input type="hidden" class="form-control" value="<?= $id_pelayanan ?>" id="inPel">
            <input type="hidden" class="form-control" value="<?= $id_history ?>" id="inHis">
            <div class="form-group">
              <div class="col-md-3">
                <label class="control-label mb-10 text-left">Nama<span class="help"></span></label>
                <input type="text" class="form-control" value="<?= $nama ?>" disabled>
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-3">
                <label class="control-label mb-10 text-left">Tgl Lahir<span class="help"></span></label>
                <input type="text" class="form-control" value="<?= $tgl_lahir ?>" disabled>
              </div>
            </div>

            <div class="form-group ">
              <div class="col-md-3">
                <label class="control-label mb-10 text-left">Jenis Kelamin</label>
                <input type="text" class="form-control" value="<?= $jenis_kelamin ?>" disabled>
              </div>
            </div>
            <div class="clearfix"></div>
            <hr>
            <div class="form-group">
              <div class="row">
                <div class="form-group">
                  <div class="col-md-6">
                    <label class="control-label md-3 text-left">Tanggal Masuk : <span class="help"></span></label>
                    <input type="text" class="form-control" value="<?= $tgl_masuk ?>" disabled>
                    <span class="help-block"></span>
                  </div>
                  <div class="col-md-6">
                    <label class="control-label  md-3 text-left">Tanggal/Jam Pindah : <span class="help"></span></label>
                    <span id="tgl_pindah_error" class="text-danger"></span>
                    <div class="has-success">
                      <input type="datetime-local" class="form-control" id="tglPindah" value="<?php date_default_timezone_set('Asia/Jakarta');
                                                                                              echo date("Y-m-d H:i:s"); ?>">
                      <span class="help-block"></span>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-6">
                    <label class="control-label  md-3 text-left">Pindah ke Ruang / Kelas : <span class="help"></span></label>
                    <span id="tuj_pindah_error" class="text-danger"></span>
                    <div class="has-success">
                      <select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" id="inRuangan" name="inRuangan">
                      </select>
                      <span class="help-block"></span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-6">
                    <label class="control-label  md-3 text-left">Tempat Tidur : <span class="help"></span></label>
                    <span id="tuj_pindah_error" class="text-danger"></span>
                    <div class="has-success">
                      <select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" id="tuj_pindah" name="tuj_pindah">
                      </select>
                      <span class="help-block"></span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-6">
                    <label class="control-label  md-3 text-left">DPJP :<span class="help"></span></label>
                    <input type="text" class="form-control" value="<?= $data->nama_dokter; ?>" disabled>
                    <span class="help-block"></span>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-6">
                    <label class="control-label  md-3 text-left">Diagnosis :<span class="help"></span></label>
                    <input type="text" class="form-control" value="<?= isset($diagnosa->kode) ? $diagnosa->kode . ' - ' . $diagnosa->nama_diagnosa : '-'; ?>" disabled>
                    <span class="help-block"></span>
                  </div>
                </div>

              </div>

              <div class="form-group ">

                <label class="control-label mb-10 text-left">
                  <p>Cara Transfer : </p>
                </label>
                <div class="row">
                  <div class="col-md-2">
                    <span id="cara_tf_error" class="text-danger"></span>
                    <div class="checkbox checkbox-success">
                      <input id="cara_transfer1" type="checkbox" name="cara_tf" value="Jalan Sendiri">
                      <label class="control-label" for="cara_transfer1">
                        Jalan Sendiri
                      </label>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="checkbox checkbox-success">
                      <input id="cara_transfer2" type="checkbox" name="cara_tf" value="Kursi Roda">
                      <label class="control-label" for="cara_transfer2">
                        Kursi Roda
                      </label>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="checkbox checkbox-success">
                      <input id="cara_transfer3" type="checkbox" name="cara_tf" value="Brankard">
                      <label class="control-label" for="cara_transfer3">
                        Brankard
                      </label>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="checkbox checkbox-success">
                      <input id="cara_transfer4" type="checkbox" name="cara_tf" value="Lainnya">
                      <label class="control-label" for="cara_transfer4">
                        Lainnya :
                      </label>
                      <div class="has-success">
                        <input type="text" class="form-control" value="" id="cara_tf" style="display: none">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <label class="control-label">
                <p><br>Respiratori : </p>
              </label>
            </div>
            <div class="col-md-4">
              <label class="control-label">Dada<span class="help"></span></label>
              <span id="dada_error" class="text-danger"></span>
              <div class="radio-button radio-button-primary">
                <input id="dada1" name="dada" type="radio" value="Simetris">
                <label class="control-label" for="dada1">
                  Simetris
                </label>
              </div>
              <div class="radio-button radio-button-primary">
                <input id="dada2" name="dada" type="radio" value="Asimetris">
                <label class="control-label" for="dada2">
                  Asimetris
                </label>
              </div>
              <div class="radio-button radio-button-primary">
                <input id="dada3" name="dada" type="radio" value="Bernafas">
                <label class="control-label" for="dada3">
                  Bernafas
                </label>
              </div>
              <div class="radio-button radio-button-primary">
                <input id="dada4" name="dada" type="radio" value="Nyeri">
                <label class="control-label" for="dada4">
                  Nyeri
                </label>
              </div>
              <div class="radio-button radio-button-primary">
                <input id="dada5" name="dada" type="radio" value="Tidak Nyeri">
                <label class="control-label" for="dada5">
                  Tidak Nyeri
                </label>
              </div>
            </div>
            <div class="col-md-4">
              <label class="control-label">Bunyi Paru<span class="help"></span></label>
              <span id="paru_error" class="text-danger"></span>
              <div class="radio-button radio-button-primary">
                <input id="paru1" name="paru" type="radio" value="Ronkhi">
                <label class="control-label" for="paru1">
                  Ronkhi
                </label>
              </div>
              <div class="radio-button radio-button-primary">
                <input id="paru2" name="paru" type="radio" value="Wheezing">
                <label class="control-label" for="paru2">
                  Wheezing
                </label>
              </div>
              <div class="radio-button radio-button-primary">
                <input id="paru3" name="paru" type="radio" value="Vesikular">
                <label class="control-label" for="paru3">
                  Vesikular
                </label>
              </div>
              <div class="radio-button radio-button-primary">
                <input id="paru4" name="paru" type="radio" value="Crackles">
                <label class="control-label" for="paru4">
                  Crackles
                </label>
              </div>
            </div>
            <div class="col-md-4">
              <label class="control-label">Sirkulasi <span class="help"></span></label>
              <span id="sirkulasi_error" class="text-danger"></span>
              <div class="radio-button radio-button-primary">
                <input id="sirkulasi1" name="sirkulasi" type="radio" value="Nyeri Dada">
                <label class="control-label" for="sirkulasi1">
                  Nyeri Dada
                </label>
              </div>
              <div class="radio-button radio-button-primary">
                <input id="sirkulasi2" name="sirkulasi" type="radio" value="Sakit Kepala/Pusing">
                <label class="control-label" for="sirkulasi2">
                  Sakit Kepala/Pusing
                </label>
              </div>
              <div class="radio-button radio-button-primary">
                <input id="sirkulasi3" name="sirkulasi" type="radio" value="Cyanosis">
                <label class="control-label" for="sirkulasi3">
                  Cyanosis
                </label>
              </div>
              <div class="radio-button radio-button-primary">
                <input id="sirkulasi4" name="sirkulasi" type="radio" value="Berdebar">
                <label class="control-label" for="sirkulasi4">
                  Berdebar
                </label>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-12">

              <strong>
                <label class="control-label mb-10 text-left">
                  <p><br>KONDISI PASIEN</p>
                </label>
              </strong>

            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label class="control-label col-md-3">Saat Transfer<span class="help"></span></label>
                <span id="kondisi_tf_error" class="text-danger"></span>
                <div class="col-md-9 has-success">
                  <input type="text" class="form-control" id="kondisi_tf">
                  <span class="help-block"></span>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label class="control-label col-md-3">Saat Serah Terima<span class="help"></span></label>
                <span id="kondisi_terima_error" class="text-danger"></span>
                <div class="col-md-9 has-success">
                  <input type="text" class="form-control" id="kondisi_terima">
                  <span class="help-block"></span>
                </div>
              </div>
            </div>
            <br>
            <div class="col-md-12">
              <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
            </div>
            <div class="form-group">
              <div class="col-md-4">
                <label class="control-label mb-10 text-left">Observasi:</label>
                <div class="has-success">
                  <textarea class="form-control" name="" id="observasi" cols="30" rows="5"></textarea>
                </div>
              </div>
            </div>
          </div>
        </div>



        <div class="row">
          <div class="col-md-8" style="margin-top: 30px;">
            <div class="form-group pull-left">
              <input type="hidden" id="id_form">

              <a class="btn btn-default btn-anim  btn-sm" onclick="javascript:history.go(-1)" style="margin-right: 20px; margin-left: 30px;"><i class="fa fa-arrow-left"></i><span class="btn-text">KEMBALI</span></a>
              <button onclick="simpan()" class="btn btn-success btn-anim  btn-sm ml-20 mt-5" id="simpanKunjungan"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span></button>
              <button class="btn btn-info btn-anim" onclick="update()" type="button" style="display:none;" id="editKunjungan"><i class="icon-print"></i><span class="btn-text">EDIT</span></button>

            </div>
          </div>
        </div>
        <div class="panel-wrapper collapse in">
          <div class="panel-body">
            <div class="table-wrap">
              <div class="table-responsive">
                <table class="table table-hover display  pb-30" id="tabel_terapi">
                  <thead>
                    <tr class="bg-success">
                      <th>NO</th>
                      <th>TANGGAL & JAM PINDAH</th>
                      <th>TUJUAN</th>
                      <th>CARA TRANSFER</th>
                      <th>KONDISI SAAT TRANSFER</th>
                      <th>KONDISI SAAT SERAH TERIMA</th>
                      <th>EDIT</th>
                      <th>HAPUS</th>
                    </tr>
                  </thead>

                  <tbody style="color: black">
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--batas-->

  </div>
</div>

<script>
  $("#cara_transfer4").click(function() {
    if ($(this).is(":checked")) {
      $("#cara_tf").show();
    } else {
      $("#cara_tf").hide();
    }
  });
  $(document).ready(function() {

    id_history = $('#inPel').val();
    reload_data_id_pel(id_history);
    $.ajax({
      url: "<?php echo base_url(); ?>Pelayanan_masuk/getRuangan",
      method: "GET",

      dataType: 'json',
      success: function(data) {
        var html = '';
        var i;
        html = '<option>-</option>';
        for (i = 0; i < data.length; i++) {
          html += '<option value="' + data[i].kelas_ruangan + '">' + data[i].kelas_ruangan + '</option>';
        }
        $('#inRuangan').html(html);


      }
    });
    $('#inRuangan').change(function() {
      var kelas = $('#inRuangan').val();
      if (kelas != '') {
        $.ajax({
          url: "<?php echo base_url(); ?>Pelayanan_masuk/getKamar",
          method: "POST",
          data: {
            kelas: kelas
          },
          dataType: 'json',
          success: function(data) {
            var html = '';
            var i;
            html = '<option value="-">-</option>';
            for (i = 0; i < data.length; i++) {
              html += '<option value="' + data[i].id_ruangan + '">' + data[i].tipe + '</option>';
            }
            $('#tuj_pindah').html(html);
          }
        });
      } else {
        $('#tuj_pindah').html('<option value="-">-</option>');
      }
    });
  });
</script>
<script type="text/javascript">
  function simpan() {
    id_pelayanan = $('#inPel').val();
    id_history = $('#inHis').val();
    no_rm = $('#inNoRM').val();

    tglPindah = $('#tglPindah').val();
    tuj_pindah = $.trim($("#tuj_pindah").children("option:selected").text())
    id_kamar = $('#tuj_pindah').val();
    cara_tf = $('input[name="cara_tf"]:checked').val();
    if (cara_tf == "Lainnya") {
      cara_tf = $('#cara_tf').val();
    }

    kondisi_tf = $('#kondisi_tf').val();
    kondisi_terima = $('#kondisi_terima').val();
    dada = $('input[name="dada"]:checked').val();
    paru = $('input[name="paru"]:checked').val();
    sirkulasi = $('input[name="sirkulasi"]:checked').val();

    id_pel = "<?php echo urlencode(base64_encode($id_pelayanan)); ?>";
    id_his = "<?php echo urlencode(base64_encode($id_history)); ?>";
    $.ajax({
      url: "<?php echo base_url() ?>Erm_transfer_intra_rs/insert_tf_intra_rs",
      method: "POST",
      dataType: 'json',
      data: {
        no_rm: no_rm,
        id_pelayanan: id_pelayanan,
        id_history: id_history,
        tglPindah: tglPindah,
        tuj_pindah: tuj_pindah,
        id_kamar: id_kamar,
        cara_tf: cara_tf,
        kondisi_tf: kondisi_tf,
        kondisi_terima: kondisi_terima,
        dada: dada,
        paru: paru,
        sirkulasi: sirkulasi,
        observasi: $('#observasi').val(),
      },
      success: function(data) {
        if (data.status == "success") {
          window.location.href = "<?php echo base_url('Erm_igd/form/') ?>" + id_pel + '/' + id_his;
        } else if (data.error) {
          if (data.tglPindah != '') {
            $('#tgl_pindah_error').html(data.tglPindah);
          } else {
            $('#tgl_pindah_error').html('');
          }
          if (data.tuj_pindah != '') {
            $('#tuj_pindah_error').html(data.tuj_pindah);
          } else {
            $('#tuj_pindah_error').html('');
          }
          if (cara_tf == '' || cara_tf == null) {
            $('#cara_tf_error').html('*wajib diisi');
          } else {
            $('#cara_tf_error').html('');
          }
          if (data.kondisi_tf != '') {
            $('#kondisi_tf_error').html(data.kondisi_tf);
          } else {
            $('#kondisi_tf_error').html('');
          }
          if (data.kondisi_terima != '') {
            $('#kondisi_terima_error').html(data.kondisi_terima);
          } else {
            $('#kondisi_terima_error').html('');
          }
          if (dada == '' || dada == null) {
            $('#dada_error').html('*wajib diisi');
          } else {
            $('#dada_error').html('');
          }
          if (paru == '' || paru == null) {
            $('#paru_error').html('*wajib diisi');
          } else {
            $('#paru_error').html('');
          }
          if (sirkulasi == '' || sirkulasi == null) {
            $('#sirkulasi_error').html('*wajib diisi');
          } else {
            $('#sirkulasi_error').html('');
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

  function update() {
    id_pelayanan = $('#inPel').val();
    id_history = $('#inHis').val();
    no_rm = $('#inNoRM').val();
    id = $('#id_form').val();

    tglPindah = $('#tglPindah').val();
    tuj_pindah = $.trim($("#tuj_pindah").children("option:selected").text())
    id_kamar = $('#tuj_pindah').val();
    cara_tf = $('input[name="cara_tf"]:checked').val();
    if (cara_tf == "Lainnya") {
      cara_tf = $('#cara_tf').val();
    }

    kondisi_tf = $('#kondisi_tf').val();
    kondisi_terima = $('#kondisi_terima').val();
    dada = $('input[name="dada"]:checked').val();
    paru = $('input[name="paru"]:checked').val();
    sirkulasi = $('input[name="sirkulasi"]:checked').val();

    id_pel = "<?php echo urlencode(base64_encode($id_pelayanan)); ?>";
    id_his = "<?php echo urlencode(base64_encode($id_history)); ?>";
    $.ajax({
      url: "<?php echo base_url() ?>Erm_transfer_intra_rs/edit_tf_intra_rs",
      method: "POST",
      dataType: 'json',
      data: {
        no_rm: no_rm,
        id_pelayanan: id_pelayanan,
        id_history: id_history,
        tglPindah: tglPindah,
        tuj_pindah: tuj_pindah,
        id_kamar: id_kamar,
        cara_tf: cara_tf,
        kondisi_tf: kondisi_tf,
        kondisi_terima: kondisi_terima,
        dada: dada,
        paru: paru,
        sirkulasi: sirkulasi,
        id: id,
        observasi: $('#observasi').val(),
      },
      success: function(data) {
        if (data.status == "success") {
          window.location.href = "<?php echo base_url('Erm_igd/form/') ?>" + id_pel + '/' + id_his;
        } else if (data.error) {
          if (data.tglPindah != '') {
            $('#tgl_pindah_error').html(data.tglPindah);
          } else {
            $('#tgl_pindah_error').html('');
          }
          if (data.tuj_pindah != '') {
            $('#tuj_pindah_error').html(data.tuj_pindah);
          } else {
            $('#tuj_pindah_error').html('');
          }
          if (cara_tf == '' || cara_tf == null) {
            $('#cara_tf_error').html('*wajib diisi');
          } else {
            $('#cara_tf_error').html('');
          }
          if (data.kondisi_tf != '') {
            $('#kondisi_tf_error').html(data.kondisi_tf);
          } else {
            $('#kondisi_tf_error').html('');
          }
          if (data.kondisi_terima != '') {
            $('#kondisi_terima_error').html(data.kondisi_terima);
          } else {
            $('#kondisi_terima_error').html('');
          }
          if (dada == '' || dada == null) {
            $('#dada_error').html('*wajib diisi');
          } else {
            $('#dada_error').html('');
          }
          if (paru == '' || paru == null) {
            $('#paru_error').html('*wajib diisi');
          } else {
            $('#paru_error').html('');
          }
          if (sirkulasi == '' || sirkulasi == null) {
            $('#sirkulasi_error').html('*wajib diisi');
          } else {
            $('#sirkulasi_error').html('');
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
        "url": '<?php echo base_url('Erm_transfer_intra_rs/tampil_list'); ?>',
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
    document.getElementById('simpanKunjungan').style.display = 'none';
    $('#editKunjungan').show();
    $('#id_form').val(id);

    $.ajax({
      url: "<?php echo base_url(); ?>Erm_transfer_intra_rs/getDataForm",
      method: "post",
      dataType: 'json',
      data: {
        id: id,
      },
      success: function(data) {
        if (data.status === 'found') {
          $('#tglPindah').val(data.data.tglPindah);
          getKamar(data.data.kelas_ruangan, data.data.id_kamar);
          $('#inRuangan option[value="' + data.data.kelas_ruangan + '"]').prop('checked', true);
          $('#inRuangan').val(data.data.kelas_ruangan);

          $('input[name="cara_tf"][value="' + data.data.cara_tf + '"]').prop("checked", true);
          $('#kondisi_tf').val(data.data.kondisi_tf);
          $('#kondisi_terima').val(data.data.kondisi_terima);
          $('#observasi').html(data.data.observasi);
          $('input[name="dada"][value="' + data.data.dada + '"]').prop("checked", true);
          $('input[name="paru"][value="' + data.data.paru + '"]').prop("checked", true);
          $('input[name="sirkulasi"][value="' + data.data.sirkulasi + '"]').prop("checked", true);

          // $('#tuj_pindah').val("921").change();
          $('#tuj_pindah option[value="921"]').prop('selected', true);

        } else {
          alert('Tidak Ada');

        }

      }
    });
    window.scrollTo({
      top: 0,
      behavior: 'smooth'
    });
  }

  function getKamar(kelas, id_kamar) {

    $.ajax({
      url: "<?php echo base_url(); ?>Pelayanan_masuk/getKamar",
      method: "POST",
      data: {
        kelas: kelas
      },
      dataType: 'json',
      success: function(data) {
        var html = '';
        var i;
        html = '<option value="-">-</option>';
        for (i = 0; i < data.length; i++) {
          html += '<option value="' + data[i].id_ruangan + '">' + data[i].tipe + '</option>';
        }
        $('#tuj_pindah').html(html);
      }
    });

  }
</script>