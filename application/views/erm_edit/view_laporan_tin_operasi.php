<!-- Row -->
<form>
  <div class="row">
    <div class="col-sm-12">
      <div class="panel panel-default card-view">
        <div class="panel-heading">
          <div class="pull-left">
            <h6 class="panel-title txt-dark">Laporan Operasi</h6>
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="panel-wrapper collapse in">
          <div class="panel-body">
            <div class="form-wrap">

              <div class="form-group">
                <div class="col-md-6">
                  <label class="control-label mb-10 text-left">Ruang<span class="help"></span></label>
                  <input type="text" disabled class="form-control" value="<?= $nama_ruangan ?>">
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-6">
                  <label class="control-label mb-10 text-left">No.RM<span class="help"></span></label>
                  <input type="text" disabled class="form-control" value="<?= $no_rm ?>" id="inNoRM">
                </div>
              </div>
              <input type="hidden" class="form-control" value="<?= $id_pelayanan ?>" id="inPel">
            <input type="hidden" class="form-control" value="<?= $id_history ?>" id="inHis">

              <div class="form-group">
                <div class="col-md-6">
                  <label class="control-label mb-10 text-left">Kelas<span class="help"></span></label>
                  <input type="text" disabled class="form-control" value="<?= $kelas ?>">
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-6">
                  <label class="control-label mb-10 text-left">Nama Pasien<span class="help"></span></label>
                  <input type="text" disabled class="form-control" value="<?= $nama ?>">
                </div>
              </div>

              <div class="form-group ">
                <div class="col-md-6">
                  <label class="control-label mb-10 text-left">Jenis Kelamin</label>
                  <input type="text" disabled class="form-control" value="<?= $jenis_kelamin ?>">
                </div>
              </div>

              <div class="form-group ">
                <div class="col-md-6">
                  <label class="control-label mb-10 text-left">Tanggal Lahir</label>
                  <div class="has-success">
                    <?php
                    $tanggal_indonesia = date("Y/m/d", strtotime($tgl_lahir));
                    echo '<input type="text" id="tanggal_lahir" readonly name="tanggal_lahir"   class="form-control" value="' . $tanggal_indonesia . '">'; ?>
                    <span class="help-block"></span>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-12">
                  <center> <label class="control-label mb-10 text-left">Surat Izin Operasi : Ada / Tidak Ada, Mohon Dilampirkan<span class="help"></span></label> </center>
                  <span id="rawat_error" class="text-danger"></span>
                  <div class="has-success">
                    <span class="help-block"></span>
                  </div>
                </div>
              </div>

              <!-- <div class="form-group ">
              <div class="col-md-12">
                <label class="control-label mb-10 text-left"><center>Surat Izin Operasi : Ada / Tidak Ada, Mohon Dilampirkan</center></label>
                <input type="text" class="form-control" value="surat_izin_operasi">
              </div>
            </div> -->

              <!-- <div class="form-group">
              <div class="col-md-6">
                <label class="control-label mb-10 text-left">Nama Ahli Bedah<span class="help"></span></label>
                <span id="nama_ahli_bedah_error" class="text-danger"></span>
                <div class="has-success">
                  <input type="text" class="form-control" name="nama_ahli_bedah" id="nama_ahli_bedah">
                  <span class="help-block"></span>
                </div>
              </div>
            </div> -->
              <div class="form-group">
                <div class="col-md-3">
                  <label class="control-label mb-10 text-left">Nama Ahli Bedah<span class="help"></span></label>
                  <div class="has-success">
                    <input type="text" class="form-control" name="inNamaAhli" id="inNamaAhli">
                    <span class="help-block"></span>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-3">
                  <label class="control-label mb-10 text-left">Nama Perawat Instrumen<span class="help"></span></label>
                  <div class="has-success">
                    <input type="text" class="form-control" name="inNamaPerawat" id="inNamaPerawat">
                    <span class="help-block"></span>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-3">
                  <label class="control-label mb-10 text-left">Nama Asisten I<span class="help"></span></label>
                  <div class="has-success">
                    <input type="text" class="form-control" name="inNamaAsisten1" id="inNamaAsisten1">
                    <span class="help-block"></span>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-3">
                  <label class="control-label mb-10 text-left">Nama Asisten II<span class="help"></span></label>
                  <div class="has-success">
                    <input type="text" class="form-control" name="inNamaAsisten2" id="inNamaAsisten2">
                    <span class="help-block"></span>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-6">
                  <label class="control-label mb-10 text-left">Diagnosa Pra Operasi<span class="help"></span></label>
                  <div class="has-success">
                    <textarea class="form-control" name="" id="inDiagPra" cols="30" rows="10"></textarea>
                    <span class="help-block"></span>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-6">
                  <label class="control-label mb-10 text-left">Tindakan Operasi<span class="help"></span></label>
                  <div class="has-success">
                    <textarea class="form-control" name="" id="inTinOperasi" cols="30" rows="10"></textarea>
                    <span class="help-block"></span>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-6">
                  <label class="control-label mb-10 text-left">Diagnosa Post Operasi<span class="help"></span></label>
                  <div class="has-success">
                  <textarea class="form-control" name="" id="inDiagPost" cols="30" rows="10"></textarea>
                    <span class="help-block"></span>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-6">
                  <label class="control-label mb-10 text-left">Indikasi Operasi<span class="help"></span></label>
                  <div class="has-success">
                    <textarea class="form-control" name="" id="inOperasi" cols="30" rows="10"></textarea>
                    <span class="help-block"></span>
                  </div>
                </div>
              </div>

              <div class="form-group ">
                <div class="col-md-6">
                  <label class="control-label mb-10 text-left">Jenis Operasi</label>
                  <div class="radio-button radio-button-primary">
                    <div class="col-md-2">
                      <input id="inJenOperasi1" type="radio" name="inJenOperasi" value="Ringan">
                      <label class="control-label" for="inJenOperasi1">
                        Ringan
                      </label>
                    </div>
                    <div class="col-md-2">
                      <div class="radio-button radio-button-primary">
                        <input id="inJenOperasi2" type="radio" name="inJenOperasi" value="Sedang">
                        <label class="control-label" for="operasi2">
                          Sedang
                        </label>
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="radio-button radio-button-primary">
                        <input id="inJenOperasi3" type="radio" name="inJenOperasi" value="Besar">
                        <label class="control-label" for="operasi3">
                          Besar
                        </label>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="radio-button radio-button-primary">
                        <input id="inJenOperasi4" type="radio" name="inJenOperasi" value="Khusus">
                        <label class="control-label" for="operasi4">
                          Khusus
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="form-group">
                <div class="col-md-6">
                  <label class="control-label mb-10 text-left">Waktu Operasi<span class="help"></span></label>
                  <div class="has-success">
                    <span class="help-block"></span>
                  </div>
                  <div class="col-md-6">
                  <label class="control-label mb-10 text-left">Operasi Dimulai<span class="help"></span></label>
                  <div class="has-success">
                    <input type="time" class="form-control" id="inOpeMulai" name="inOpeMulai">
                    <span class="help-block"></span>
                  </div>
                  </div>
                  <div class="col-md-6">
                  <label class="control-label mb-10 text-left">Operasi Selesai<span class="help"></span></label>
                  <div class="has-success">
                    <input type="time" class="form-control" id="inOpeSelesai" name="inOpeSelesai">
                    <span class="help-block"></span>
                  </div>
                  </div>
                </div>
              </div>
              
              <div class="col-md-12">
                          <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                        </div>
              <div class="form-group">
                <div class="col-md-3">
                  <label class="control-label mb-10 text-left">Jaringan yang di Eksisi/Insisi<span class="help"></span></label>
                  <div class="has-success">
                    <input type="text" class="form-control" name="inJarEksisi" id="inJarEksisi">
                    <span class="help-block"></span>
                  </div>
                </div>
              </div>
              
              <div class="form-group">
                <div class="col-md-3">
                  <label class="control-label mb-10 text-left">Jenis Bahan yang dikirim ke Laboratorium<span class="help"></span></label>
                  <div class="has-success">
                    <input type="text" class="form-control" name="inBahDikirim" id="inBahDikirim">
                    <span class="help-block"></span>
                  </div>
                </div>
              </div>

              <div class="form-group ">
                <div class="col-md-3">
                  <label class="control-label mb-10 text-left">Dikirim untuk pemeriksaan Pathologie</label>
                  <div class="radio-button radio-button-primary">
                    <div class="col-md-3">
                      <input id="inPemPath1" type="radio" name="inPemPath" value="Ya">
                      <label class="control-label" for="jenispathologie1">
                        Ya
                      </label>
                    </div>
                    <div class="col-md-0">
                      <div class="radio-button radio-button-primary">
                        <input id="inPemPath2" type="radio" name="inPemPath" value="Tidak">
                        <label class="control-label" for="jenispathologie2">
                          Tidak
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-3">
                  <label class="control-label mb-10 text-left">Untuk Pemeriksaan<span class="help"></span></label>
                  <div class="has-success">
                    <input type="text" class="form-control" name="inUntPem" id="inUntPem">
                    <span class="help-block"></span>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-6">
                  <label class="control-label mb-10 text-left">Singkatan kelainan yang ditemukan dengan Gambar (laporan lengkap lihat sebelah)<span class="help"></span></label>
                  <div class="has-success">
                    <input type="text" class="form-control" name="inSingKel" id="inSingKel">
                    <span class="help-block"></span>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-6">
                  <label class="control-label mb-10 text-left">Antiseptik dilakukan di daerah operasi dengan : Bethadine / Alkohol<span class="help"></span></label> 
                  <div class="has-success">
                    <input type="text" class="form-control" name="inAntiseptik" id="inAntiseptik">
                    <span class="help-block"></span>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-6">
                  <label class="control-label mb-10 text-left">Jumlah Pendarahan<span class="help"></span></label>
                  <div class="has-success">
                    <input type="number" class="form-control" name="inJumPenda" id="inJumPenda">
                    <span class="help-block"></span>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-6">
                  <label class="control-label mb-10 text-left">Jumlah Transfusi :<span class="help"></span></label>
                  <div class="has-success">
                    <input type="number" class="form-control" name="inJumTrans" id="inJumTrans">
                    <span class="help-block"></span>
                  </div>
                </div>
              </div>

              <!-- <div class="form-group">
              <div class="col-md-6">
                <label class="control-label mb-10 text-left">Penyulit Operasi<span class="help"></span></label>
                <div class="has-success">
                  <label class="text-left" style="color: black;">Ada</label>
                  <input type="text" class="form-control" name="inPenOperasi" id="inPenOperasi1">
                  <span class="help-block"></span>
                </div>
              </div>
              <div class="col-md-6">
                <label class="control-label mb-10 text-left">‎<span class="help"></span></label>
                <div class="has-success">
                  <label class="text-left" style="color: black;">Tidak Ada</label>
                  <input type="text" class="form-control" name="inPenOperasi" id="inPenOperasi2">
                  <span class="help-block"></span>
                </div>
              </div>
            </div> -->

              <div class="form-group ">
                <div class="col-md-6">
                  <label class="control-label mb-10 text-left">Penyulit Operasi :</label>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="radio-button radio-button-primary">
                        <input id="inPenOperasi1" type="radio" name="inPenOperasi" value="Tidak Ada">
                        <label class="control-label" for="inPenOperasi1">
                          Tidak Ada
                        </label>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="radio-button radio-button-primary">
                        <input id="inPenOperasi2" type="radio" name="inPenOperasi" value="Ada">
                        <label class="control-label" for="inPenOperasi2">
                          Ada
                        </label>
                        <div class="has-success">
                          <input type="text" class="form-control" id="inPenOperasi" style="display: none;">
                          <span class="help-block"></span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- <div class="form-group">
                <div class="col-md-6">
                  <label class="control-label mb-10 text-left">Komplikasi<span class="help"></span></label>
                  <span id="inkomplikasi" class="text-danger"></span>
                  <div class="has-success">
                    <label class="text-left" style="color: black;">Ada</label>
                    <input type="text" class="form-control" name="inKomplikasi" id="inKomplikasi1">
                    <span class="help-block"></span>
                  </div>
                </div>
                <div class="col-md-6">
                  <label class="control-label mb-10 text-left">‎<span class="help"></span></label>
                  <span id="inkomplikasi" class="text-danger"></span>
                  <div class="has-success">
                    <label class="text-left" style="color: black;">Tidak Ada</label>
                    <input type="text" class="form-control" name="inKomplikasi" id="inkomplikasi2">
                    <span class="help-block"></span>
                  </div>
                </div>
              </div> -->

              <div class="form-group ">
                <div class="col-md-6">
                  <label class="control-label mb-10 text-left">Komplikasi :</label>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="radio-button radio-button-primary">
                        <input id="inKomplikasi1" type="radio" name="inKomplikasi" value="Tidak Ada">
                        <label class="control-label" for="inKomplikasi1">
                          Tidak Ada
                        </label>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="radio-button radio-button-primary">
                        <input id="inKomplikasi2" type="radio" name="inKomplikasi" value="Ada">
                        <label class="control-label" for="inKomplikasi2">
                          Ada
                        </label>
                        <div class="has-success">
                          <input type="text" class="form-control" id="inKomplikasi" style="display: none;">
                          <span class="help-block"></span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-6">
                  <label class="control-label mb-10 text-left">Nomor Pendaftaran alat yang dipasang ( implan ) :<span class="help"></span></label>
                  <div class="has-success">
                    <input type="text" class="form-control" name="inNoPend" id="inNoPend">
                    <span class="help-block"></span>
                  </div>
                </div>
              </div>

              <div class="form-group text-center" style="margin-top: 30px;">
                <div class="col-md-6">
                  <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                </div>
              
                <div class="col-md-20">
                  <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                </div>
                <div class="col-md-6">
                  <a class="btn btn-default btn-anim  btn-sm" onclick="javascript:history.go(-1)" style="margin-right: 20px; margin-left: 30px;"><i class="fa fa-arrow-left"></i><span class="btn-text">KEMBALI</span></a>
                  <button type="button" value="Simpan" class="btn btn-success mb-4" onclick="simpan()">Simpan</button>
                </div>
              </div>
              
              <script type="text/javascript">
                $(document).ready(function() {
                  id_pelayanan = $('#inPel').val();
                  id_history = $('#inHis').val();
                  reload_data_diagnosa(id_pelayanan, id_history);
                  reload_data_diagnosa_id_pel(id_pelayanan);
                  reload_data_diagnosa1_id_pel1(id_pelayanan);

                  $("#inPenOperasi2").click(function() {
                    if ($(this).is(":checked")) {
                      $("#inPenOperasi").show();
                    }
                  });
                  $("#inPenOperasi1").click(function() {
                    if ($(this).is(":checked")) {
                      $("#inPenOperasi").hide();
                    }
                  });

                  $("#inKomplikasi2").click(function() {
                    if ($(this).is(":checked")) {
                      $("#inKomplikasi").show();
                    }
                  });
                  $("#inKomplikasi1").click(function() {
                    if ($(this).is(":checked")) {
                      $("#inKomplikasi").hide();
                    }
                  });
                  
                });
              </script>
              <script type="text/javascript">
                $("#persalinan1").click(function() {
                  if ($(this).is(":checked")) {
                    $("#title2").hide();
                    $("#label3").hide();
                    $("#label4").hide();
                    $("#caesaria2").hide();
                    $("#caesaria1").hide();
                    $("#title1").show();
                    $("#label1").show();
                    $("#label2").show();
                    $("#pervagina2").show();
                    $("#pervagina1").show();
                  }
                });
                $("#persalinan2").click(function() {
                  if ($(this).is(":checked")) {
                    $("#title1").hide();
                    $("#label1").hide();
                    $("#label2").hide();
                    $("#pervagina2").hide();
                    $("#pervagina1").hide();
                    $("#title2").show();
                    $("#label3").show();
                    $("#label4").show();
                    $("#caesaria2").show();
                    $("#caesaria1").show();
                  }
                });
              </script>
              <script type="text/javascript">
                function simpan() {
                  id_pelayanan = $('#inPel').val();
                  no_rm = $('#inNoRM').val();
                  nama_ahli_bedah = $('#inNamaAhli').val();
                  nama_perawat_instrumen = $('#inNamaPerawat').val();
                  nama_asisten1 = $('#inNamaAsisten1').val();
                  nama_asisten2 = $('#inNamaAsisten2').val();
                  diagnosa_pra_operasi = $('#inDiagPra').val();
                  tindakan_operasi = $('#inTinOperasi').val();
                  diagnosa_post_operasi = $('#inDiagPost').val();
                  indikasi_operasi = $('#inOperasi').val();
                  jenis_operasi = $('input[name="inJenOperasi"]:checked').val();
                  operasi_dimulai = $('#inOpeMulai').val();
                  operasi_selesai = $('#inOpeSelesai').val();
                  jaringan_eksisi = $('#inJarEksisi').val();
                  bahan_dikirim_laboratorium = $('#inBahDikirim').val();
                  pemeriksaan_pathologie = $('input[name="inPemPath"]:checked').val();
                  untuk_pemeriksaan = $('#inUntPem').val();
                  singkatan_kelainan = $('#inSingKel').val();
                  antiseptik = $('#inAntiseptik').val();
                  jumlah_pendarahan = $('#inJumPenda').val();
                  jumlah_transfusi = $('#inJumTrans').val();

                  penyulit_operasi = $('input[name="inPenOperasi"]:checked').val();
                  if (penyulit_operasi == "Ada") {
                    penyulit_operasi = $('#inPenOperasi').val();
                  }
                  penyulit = $('input[name="penyulit"]:checked').val();

                  komplikasi_operasi = $('input[name="inKomplikasi"]:checked').val();
                  if (komplikasi_operasi == "Ada") {
                    komplikasi_operasi = $('#inKomplikasi').val();
                  }
                  komplikasi = $('input[name="komplikasi"]:checked').val();
                  
                  nomor_pendaftaran = $('#inNoPend').val();

                  $.ajax({
                    url: "<?php echo base_url() ?>Erm_laporan_operasi/store",
                    method: "POST",
                    dataType: 'json',
                    data: {
                      id_pelayanan: id_pelayanan,
                      no_rm: no_rm,
                      nama_ahli_bedah: nama_ahli_bedah,
                      nama_perawat_instrumen: nama_perawat_instrumen,
                      nama_asisten1: nama_asisten1,
                      nama_asisten2: nama_asisten2,
                      diagnosa_pra_operasi: diagnosa_pra_operasi,
                      tindakan_operasi: tindakan_operasi,
                      diagnosa_post_operasi: diagnosa_post_operasi,
                      indikasi_operasi: indikasi_operasi,
                      jenis_operasi: jenis_operasi,
                      operasi_dimulai: operasi_dimulai,
                      operasi_selesai: operasi_selesai,
                      jaringan_eksisi: jaringan_eksisi,
                      bahan_dikirim_laboratorium: bahan_dikirim_laboratorium,
                      pemeriksaan_pathologie: pemeriksaan_pathologie,
                      untuk_pemeriksaan: untuk_pemeriksaan,
                      singkatan_kelainan: singkatan_kelainan,
                      antiseptik: antiseptik,
                      jumlah_pendarahan: jumlah_pendarahan,
                      jumlah_transfusi: jumlah_transfusi,
                      penyulit_operasi: penyulit_operasi,
                      komplikasi_operasi: komplikasi_operasi,
                      nomor_pendaftaran: nomor_pendaftaran,
                    },
                    success: function(data) {
                      if (data.status == "success") {
                        // alert('success');
                        window.location.href = "<?php echo base_url('erm_ranap/form/') ?>" + '<?= urlencode(base64_encode($id_pelayanan)) ?>' + '/' + '<?= urlencode(base64_encode($id_history)) ?>';
                      } else if (data.error) {
                        if (nama_ibu == '' | nama_ibu == null) {
                          $('#ibu_error').html('*wajib diisi');
                        } else {
                          $('#ibu_error').html('');
                        }
                        if (jenis_persalinan == '' | jenis_persalinan == null) {
                          $('#persalinan_error').html('*wajib diisi');
                        } else {
                          $('#persalinan_error').html('');
                        }
                        if (rawat_gabung == '' | rawat_gabung == null) {
                          $('#rawat_error').html('*wajib diisi');
                        } else {
                          $('#rawat_error').html('');
                        }
                        if (alasan == '' | alasan == null) {
                          $('#alasan_error').html('*wajb diisi');
                        } else {
                          $('#alasan_error').html('');
                        }
                        if (catatan == '' | catatan == null) {
                          $('#catatan_error').html('*wajib diisi');
                        } else {
                          $('#catatan_error').html('');
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

                function reload_data_diagnosa(id_pelayanan, id_history) { //nampilinn diagnosa seluruhnya utk nambah ke diagnosa pasien
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
                      "url": '<?php echo base_url('Erm_igd/tampil_listdata_diagnosa'); ?>',
                      "type": 'POST',
                      "data": {
                        id_pelayanan: id_pelayanan,
                        id_history: id_history
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
                      "url": '<?php echo base_url('Erm_ranap_asesmen_dokter/tampil_list_diagnosa_ranap'); ?>',
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
                      "url": '<?php echo base_url('Erm_ranap_asesmen_dokter/tampil_list_diagnosa1'); ?>',
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

                function tambah_data_diagnosa(id_pelayanan, id_diagnosa, nama_diagnosa, his) { //utk nambah diagnosa pasien
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
                        url: "<?php echo base_url() ?>Erm_igd/tambah_data_diagnosa",
                        method: "POST",
                        dataType: 'json',
                        data: {
                          id_pelayanan: id_pelayanan,
                          id_diagnosa: id_diagnosa,
                          nama_diagnosa: nama_diagnosa,
                          id_history: his
                        },
                        success: function(data) {
                          if (data.status == "success") {
                            swal({
                              title: "good job!",
                              type: "success",
                              text: "Id diagnosa" + id_diagnosa + " Berhasil ditambah",
                              confirmButtonColor: "#3cb878",
                            });
                            reload_data_diagnosa_id_pel(his);
                            reload_data_diagnosa1_id_pel1(his);
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
                        url: "<?php echo base_url() ?>Erm_ranap_asesmen_dokter/hapus_data_diagnosa",
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
                            $('#tablediagnosa').DataTable().ajax.reload();
                            $('#tablediagnosa1').DataTable().ajax.reload();
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

                function hapus_data_diagnosa1(id) { //utk hapus diagnosa pasien
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
                        url: "<?php echo base_url() ?>Erm_ranap_asesmen_dokter/hapus_data_diagnosa1",
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
                            $('#tablediagnosa').DataTable().ajax.reload();
                            $('#tablediagnosa1').DataTable().ajax.reload();
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
              </script>