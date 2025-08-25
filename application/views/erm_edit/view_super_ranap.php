<!-- Row -->
<div class="row">
  <div class="col-sm-12">
    <div class="panel panel-default card-view">
      <div class="panel-heading">
        <div class="pull-left">
          <h6 class="panel-title txt-dark">SURAT PERINTAH RAWAT INAP</h6>
        </div>
        <div class="clearfix"></div>
      </div>
      <div class="panel-wrapper collapse in">
        <div class="panel-body">
          <div class="form-wrap">

            <div class="form-group">
              <div class="col-md-12">
                <label class="control-label mb-10 text-left">Mohon didaftarkan sebagai pasien rawat inap terhadap :<span class="help"></span></label>
              </div>
              <div class="form-group">
                <div class="col-md-6">
                  <label class="control-label mb-10 text-left">Nama Pasien<span class="help"></span></label>
                  <input type="text" disabled class="form-control" value="<?= $nama ?>" id="inNama">
                </div>
              </div>

              <input type="hidden" class="form-control" value="<?= $id_pelayanan ?>" id="inPel">
              <input type="hidden" class="form-control" value="<?= $id_history ?>" id="inHis">
              <div class="form-group">
                <div class="col-md-6">
                  <label class="control-label mb-10 text-left">Nomor Rekam Medis<span class="help"></span></label>
                  <input type="text" disabled class="form-control" id="inNoRM" value="<?= $no_rm ?>">
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-6">
                  <label class="control-label mb-10 text-left">Umur<span class="help"></span></label>
                  <input type="text" disabled class="form-control" id="inUmur" value="<?php
                                                                                      $tanggal = new DateTime($tgl_lahir);
                                                                                      $today = new DateTime();
                                                                                      $y = $today->diff($tanggal)->y;
                                                                                      $m = $today->diff($tanggal)->m;
                                                                                      $d = $today->diff($tanggal)->d;
                                                                                      echo  $y . " tahun ";  ?>">
                </div>
              </div>

              <div class="form-group ">
                <div class="col-md-6">
                  <label class="control-label mb-10 text-left">Jenis Kelamin</label>
                  <input type="text" disabled class="form-control" id="inJk" value="<?= $jenis_kelamin ?>">
                </div>
                <div class="col-md-12">
                  <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                </div>
                <div class="form-group">
                  <div class="col-md-4">
                    <label class="control-label mb-10 text-left">Diagnosis Masuk<span class="help"></span></label>
                    <span id="diagnosis_error" class="text-danger"></span>
                    <div class="has-success">
                      <input type="text" class="form-control" id="inDiag">
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-4">
                    <label class="control-label mb-10 text-left">Dokter Yang Merawat<span class="help"></span></label>
                    <span id="dokter_merawat_error" class="text-danger"></span>
                    <div class="has-success">
                      <input type="text" class="form-control" id="inDokMer">
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-4">
                    <label class="control-label mb-10 text-left">Dokter Pengirim<span class="help"></span></label>
                    <span id="dokter_pengirim_error" class="text-danger"></span>
                    <div class="has-success">
                      <input type="text" class="form-control" id="inDokPeng">
                    </div>
                  </div>
                </div>

                <div class="form-group ">
                  <div class="col-md-12">
                    <label class="control-label mb-10 text-left">Pasien memerlukan kamar perawatan </label>
                    <span id="kamar_rawat_error" class="text-danger"></span>
                    <div class="radio-button radio-button-success">
                      <input id="checkbox1" type="radio" name="kamar_rawat" value="I">
                      <label class="control-label" for="checkbox1">
                        Kelas I
                      </label>
                    </div>
                    <div class="radio-button radio-button-success">
                      <input id="checkbox2" type="radio" name="kamar_rawat" value="II">
                      <label class="control-label" for="checkbox2">
                        Kelas II
                      </label>
                    </div>
                    <div class="radio-button radio-button-success">
                      <input id="checkbox3" type="radio" name="kamar_rawat" value="III">
                      <label class="control-label" for="checkbox3">
                        Kelas III
                      </label>
                    </div>
                    <div class="radio-button radio-button-success">
                      <input id="checkbox4" type="radio" name="kamar_rawat" value="VIP">
                      <label class="control-label" for="checkbox4">
                        VIP
                      </label>
                    </div>
                    <div class="radio-button radio-button-success">
                      <input id="checkbox5" type="radio" name="kamar_rawat" value="VVIP">
                      <label class="control-label" for="checkbox5">
                        VVIP
                      </label>
                    </div>
                    <div class="radio-button radio-button-success">
                      <input id="checkbox6" type="radio" name="kamar_rawat" value="Isolasi">
                      <label class="control-label" for="checkbox6">
                        Isolasi
                      </label>
                    </div>
                    <div class="radio-button radio-button-success">
                      <input id="checkbox7" type="radio" name="kamar_rawat" value="ICU">
                      <label class="control-label" for="checkbox7">
                        ICU
                      </label>
                    </div>
                    <div class="radio-button radio-button-success">
                      <input id="checkbox8" type="radio" name="kamar_rawat" value="NICU">
                      <label class="control-label" for="checkbox8">
                        NICU
                      </label>
                    </div>
                    <div class="radio-button radio-button-success">
                      <input id="checkbox9" type="radio" name="kamar_rawat" value="Ruang Bayi">
                      <label class="control-label" for="checkbox9">
                        Ruang Bayi
                      </label>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-12">
                      <label class="control-label mb-10 text-left">Atas perhatiannya saya ucapkan terima kasih<span class="help"></span></label>
                    </div>

                    <div align="left">

                      <!--/span-->
                      <span class="help-block"></span>
                      <a class="btn btn-default btn-anim  btn-sm" onclick="javascript:history.go(-1)" style="margin-right: 20px; margin-left: 30px;"><i class="fa fa-arrow-left"></i><span class="btn-text">KEMBALI</span></a>
                      <button class="btn btn-success btn-anim  btn-sm" onclick="simpan()" type="submit" style="margin-right: 40px;" id="simpanKunjungan"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
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
  </div>
</div>

<script type="text/javascript">
  function simpan() {
    id_pelayanan = $('#inPel').val();
    id_history = $('#inHis').val();
    no_rm = $('#inNoRM').val();
    nama = $('#inNama').val();
    umur = $('#inUmur').val();
    jk = $('input[name="inJk"]:checked').val();
    diagnosis = $('#inDiag').val();
    dokter_merawat = $('#inDokMer').val();
    dokter_pengirim = $('#inDokPeng').val();
    kamar_rawat = $('input[name="kamar_rawat"]:checked').val();
    dataString = 'no_rm=' + no_rm + '&nama=' + nama + '&umur=' + umur + '&id_pelayanan=' + id_pelayanan + '&id_history=' + id_history +
      '&jk=' + jk + '&diagnosis=' + diagnosis +
      '&dokter_merawat=' + dokter_merawat + '&dokter_pengirim=' + dokter_pengirim + '&kamar_rawat=' + kamar_rawat;


    $.ajax({
      url: "<?php echo base_url() ?>Erm_igd/insert_super_ranap_igd",
      method: "POST",
      dataType: 'json',
      data: dataString,
      success: function(data) {
        if (data.status == "success") {
          window.location.href = "<?php echo base_url('Erm_igd/cetak_super_ranap_igd/') ?>" + id_pelayanan;
        } else if (data.error) {
          if (data.diagnosis != '') {
            $('#diagnosis_error').html(data.diagnosis);
          } else {
            $('#diagnosis_error').html('');
          }
          if (data.dokter_merawat != '') {
            $('#dokter_merawat_error').html(data.dokter_merawat);
          } else {
            $('#dokter_merawat_error').html('');
          }
          if (data.dokter_pengirim != '') {
            $('#dokter_pengirim_error').html(data.dokter_pengirim);
          } else {
            $('#dokter_pengirim_error').html('');
          }
          if (kamar_rawat == "" || kamar_rawat == null) {
            $('#kamar_rawat_error').html("*wajib diisi");
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
  function cetak() {
    id = $('#inHis').val();
    window.location.href = "<?php echo base_url('Erm_igd_edit/print_super_ranap/') ?>" + id;
  }
</script>
<script type="text/javascript">
  $(document).ready(function() {
    id_history = $('#inHis').val();
    $.ajax({
      url: "<?php echo base_url() ?>Erm_igd_edit/get_super_ranap",
      method: "POST",
      dataType: 'json',
      data: {
        id: id_history
      },
      success: function(data) {
        $('#inDiag').val(data.diagnosis);
        $('#inDokMer').val(data.dokter_merawat);
        $('#inDokPeng').val(data.dokter_pengirim);
        $('input[name="kamar_rawat"][value="' + data.kamar_rawat + '"]').prop("checked", true);
      }

    });
  });
</script>