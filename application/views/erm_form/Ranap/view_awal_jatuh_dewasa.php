<!-- Row -->
<div class="row">
  <div class="col-sm-12">
    <div class="panel panel-default card-view">
      <div class="panel-heading">
        <div class="pull-left">
          <h6 class="panel-title txt-dark">ASESMEN AWAL JATUH DEWASA</h6>
        </div>
        <div class="clearfix"></div>
      </div>
      <div class="panel-wrapper collapse in">

        <div class="panel-body">
          <div class="form-wrap">


            <div class="form-group">
              <div class="col-md-3">
                <label class="control-label mb-10 text-left">No.RM<span class="help"></span></label>
                <!-- <input type="text" disabled class="form-control"id="inNoRM"> -->
                <input type="text" disabled class="form-control" value="<?= $no_rm ?>" id="inNoRM">
                <input type="hidden" class="form-control" value="<?= $id_pelayanan ?>" id="inPel">
                <input type="hidden" class="form-control" value="<?= $id_history ?>" id="inHis">
                <input type="hidden" class="form-control" id="id">
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-3">
                <label class="control-label mb-10 text-left">Nama<span class="help"></span></label>
                <!-- <input type="text" disabled class="form-control" id="inNama"> -->
                <input type="text" disabled class="form-control" value="<?= $nama ?>" id="inNama">
              </div>
            </div>

            <div class="form-group">
							<div class="col-md-3">
								<label class="control-label mb-10 text-left">Tgl Lahir / Umur<span class="help"></span></label>
								<input type="text" disabled class="form-control" value="<?php
																						setlocale(LC_ALL, 'id_ID');

																						date_default_timezone_set('Asia/Jakarta');
																						$time = strtotime($tgl_lahir);
																						$date = strftime(" %d %B %Y ", $time);
																						echo $date  . '(' . getAge($tgl_lahir) . ')' ?>">
								<span class="help-block"></span>
							</div>
						</div>

            <div class="form-group ">
              <div class="col-md-3">
                <label class="control-label mb-10 text-left">Jenis Kelamin</label>
                <!-- <input type="text" disabled class="form-control" id="inJk"> -->
                <input type="text" disabled class="form-control" value="<?= $jenis_kelamin ?>" id="inJk">
              </div>
            </div>

            <div class="form-group" >
              <div class="col-md-3 text-left">
                <label class="control-label mb-10 text-left">Ruang Rawat<span class="help"></span></label>
                <input type="text" disabled class="form-control"  value="<?= $ruang_rawat->nama_ruangan ?>" id="inRawat" disabled>
              </div>
            </div>


                      <!-- 
                              --bagian ASESMEN AWAL KEPERAWATAN/KEBIDANAN
                            -->
                      <div class="form-group" id="spirit">
                        <div class="col-md-12">
                          <h5 style="margin-top: 30px;"><strong>
                              <label class="control-label mb-10 text-left"><b>FAKTOR RESIKO<b /><span class="help"></span></label>
                            </strong>
                          </h5>
                          <label class="control-label mb-10 text-left">
                              Ket : DESKRIPSI RESIKO(SKOR)
                            </label>
                        </div>
                        <div class="col-md-12">
                          <label class="control-label mb-10 text-left">
                              Total Skor :
                            </label>
                        </div>
                        <div class="col-md-12">
                          <label class="control-label mb-10 text-left">
                              - 0-24 : Risiko Rendah
                            </label>
                        </div>
                        <div class="col-md-12">
                          <label class="control-label mb-10 text-left">
                              - 25-44 : Risiko Sedang
                            </label>
                        </div>
                        <div class="col-md-12">
                          <label class="control-label mb-10 text-left">
                              - >44 : Risiko Tinggi
                            </label>
                        </div>
                        <div class="form-group ">
                          <div class="col-md-4">
                            <label class="control-label mb-10 text-left">
                              a. Riwayat Jatuh Pasien
                            </label>
                            <span id="jatuh_error" class="text-danger"></span>
                            <div class="radio-button radio-button-primary">
                              <input id="jatuh1" type="radio" name="jatuh" value="Tidak">
                              <label class="control-label" for="jatuh1">
                                Tidak(0)
                              </label>
                            </div>
                            <div class="radio-button radio-button-primary">
                              <input id="jatuh2" type="radio" name="jatuh" value="Ya">
                              <label class="control-label" for="jatuh2">
                                Ya(25)
                              </label>
                            </div>
                          </div>
                        </div>

                        <div class="form-group ">
                          <div class="col-md-4">
                            <label class="control-label mb-10 text-left">
                              b. Diagnosa Sekunder
                            </label>
                            <span id="sekunder_error" class="text-danger"></span>
                            <div class="radio-button radio-button-primary">
                              <input id="sekunder1" type="radio" name="sekunder" value="Tidak">
                              <label class="control-label" for="sekunder1">
                                Tidak(0)
                              </label>
                            </div>
                            <div class="radio-button radio-button-primary">
                              <input id="sekunder2" type="radio" name="sekunder" value="Ya">
                              <label class="control-label" for="sekunder2">
                                Ya(15)
                              </label>
                            </div>
                          </div>
                        </div>
                        <div class="form-group ">
                          <div class="col-md-4">
                            <label class="control-label mb-10 text-left">
                              c. Menggunakan Alat Bantu
                            </label>
                            <span id="bantu_error" class="text-danger"></span>
                            <div class="radio-button radio-button-primary">
                              <input id="bantu1" type="radio" name="bantu" value="Tidak Ada">
                              <label class="control-label" for="bantu1">
                                Tidak Ada/Bedrest/Dibantu Perawat(0)
                              </label>
                            </div>
                            <div class="radio-button radio-button-primary">
                              <input id="bantu2" type="radio" name="bantu" value="Tongkat">
                              <label class="control-label" for="bantu2">
                                Kruk/Tongkat(15)
                              </label>
                            </div>
                            <div class="radio-button radio-button-primary">
                              <input id="bantu3" type="radio" name="bantu" value="Kursi">
                              <label class="control-label" for="bantu3">
                                Kursi/Perabot(30)
                              </label>
                            </div>
                          </div>
                        </div>
                        <div class="form-group ">
                          <div class="col-md-4">
                            <label class="control-label mb-10 text-left">
                              d. Menggunakan Infus/Heparin/Pengencer Dara
                            </label>
                            <span id="infus_error" class="text-danger"></span>
                            <div class="radio-button radio-button-primary">
                              <input id="infus1" type="radio" name="infus" value="Tidak">
                              <label class="control-label" for="infus1">
                                Tidak(0)
                              </label>
                            </div>
                            <div class="radio-button radio-button-primary">
                              <input id="infus2" type="radio" name="infus" value="Ya">
                              <label class="control-label" for="infus2">
                                Ya(20)
                              </label>
                            </div>
                          </div>
                        </div>
                        <div class="form-group ">
                          <div class="col-md-4">
                            <label class="control-label mb-10 text-left">
                              e. Gaya Berjalan
                            </label>
                            <span id="berjalan_error" class="text-danger"></span>
                            <div class="radio-button radio-button-primary">
                              <input id="berjalan1" type="radio" name="berjalan" value="Normal">
                              <label class="control-label" for="berjalan1">
                                Normal/Bedrest/Kursi Roda(0)
                              </label>
                            </div>
                            <div class="radio-button radio-button-primary">
                              <input id="berjalan2" type="radio" name="berjalan" value="Lemah">
                              <label class="control-label" for="berjalan2">
                                Lemah(10)
                              </label>
                            </div>
                            <div class="radio-button radio-button-primary">
                              <input id="berjalan3" type="radio" name="berjalan" value="Terganggu">
                              <label class="control-label" for="berjalan3">
                                Terganggu(20)
                              </label>
                            </div>
                          </div>
                          </div>
                          
                        </div>
                        <div class="form-group ">
                          <div class="col-md-4">
                            <label class="control-label mb-10 text-left">
                              f. Status Mental
                            </label>
                            <span id="mental_error" class="text-danger"></span>
                            <div class="radio-button radio-button-primary">
                              <input id="mental1" type="radio" name="mental" value="Menyadari">
                              <label class="control-label" for="mental1">
                                Menyadari Kemampuan(0)
                              </label>
                            </div>
                            <div class="radio-button radio-button-primary">
                              <input id="mental2" type="radio" name="mental" value="Pelupa">
                              <label class="control-label" for="mental2">
                                Lupa akan keterbatasan/Pelupa(15)
                              </label>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-success mb-4" onclick="sumScore()">Skor Risiko</button>
                            <div class="col-md-3">
                            <span id="total_error" class="text-danger"></span>
                                <input type="text" class="form-control" disabled id="inTotal">
                            </div>
                        </div>
                        <div class="col-md-3">
                          <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                        </div>
                        <div class="col-md-3">
                          <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                        </div>
                        <div class="col-md-3">
                          <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                        </div>
                        <div class="col-md-3">
                          <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                        </div>
                        <div class="form-group">
                            <div class="col-md-8">
                                <label class="control-label mb-10 text-left">Diagnosa<span class="help"></span></label>
                                <div class="has-success">
                                <textarea class="form-control" cols="10" rows="10" id="inDiagnosa" name="inDiagnosa"></textarea>
                                <span class="help-block text-danger"></span>
                                </div>
                            </div>
                        </div>
                       
                        
                          
                          <div class="col-md-6">
                            <a class="btn btn-default btn-anim  btn-sm" onclick="javascript:history.go(-1)" style="margin-right: 20px; margin-left: 30px;"><i class="fa fa-arrow-left"></i><span class="btn-text">KEMBALI</span></a>
                            <button type="submit" class="btn btn-success mb-4" onclick="simpan()">Simpan</button>
                            <button style="display:none;" type="submit" class="btn btn-success mb-4" onclick="cetak()">Cetak</button>
                          </div>
                        

                      
            </div>
        </div>
    </div>
</div>
<script src="<?= base_url(); ?>assets/dist/js/slider.js"></script>
<link rel="stylesheet" href="<?= base_url(); ?>assets/dist/css/range-slide.css">
<script type="text/javascript">
  function simpan() {
    id_pelayanan = $('#inPel').val();
    id_history = $('#inHis').val();
    no_rm = $('#inNoRM').val();
    jatuh = $('input[name="jatuh"]:checked').val();
    sekunder = $('input[name="sekunder"]:checked').val();
    bantu = $('input[name="bantu"]:checked').val();
    infus = $('input[name="infus"]:checked').val();
    berjalan = $('input[name="berjalan"]:checked').val();
    mental = $('input[name="mental"]:checked').val();
    skor_total = $('#inTotal').val();
    diagnosa = $('#inDiagnosa').val();

    dataString = 'jatuh=' + jatuh + '&no_rm=' + no_rm + '&sekunder='+ sekunder + '&bantu=' + bantu + '&infus=' + infus + '&id_pelayanan=' + id_pelayanan + '&id_history=' + id_history +
      '&berjalan=' + berjalan + '&mental=' + mental + '&skor_total=' + skor_total + '&diagnosa=' + diagnosa;


    $.ajax({
      url: "<?php echo base_url() ?>Erm_ranap_awal_jatuh_dewasa/insert_asesmen",
      method: "POST",
      dataType: 'json',
      data: dataString,
      success: function(data) {
        if (data.status == "success") {
          window.location.href = "<?php echo base_url('erm_ranap/form/') ?>" + '<?= urlencode(base64_encode($id_pelayanan)) ?>' + '/' + '<?= urlencode(base64_encode($id_history)) ?>';
        } else if (data.error) {
          if (jatuh == "" || jatuh == null) {
            $('#jatuh_error').html("*wajib diisi");
          }
          if (sekunder == "" || sekunder == null) {
            $('#sekunder_error').html("*wajib diisi");
          }
          if (bantu == "" || bantu == null) {
            $('#bantu_error').html("*wajib diisi");
          }
          if (infus == "" || infus == null) {
            $('#infus_error').html("*wajib diisi");
          }
          if (berjalan == "" || berjalan == null) {
            $('#berjalan_error').html("*wajib diisi");
          }
          if (mental == "" || mental == null) {
            $('#mental_error').html("*wajib diisi");
          }
          if (skor_total == "" || skor_total == null) {
            $('#total_error').html("*Klik Untuk Memproses Skor");
          }
          
        }else{
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
<script type="text/javascript">
  function sumScore() {
    // var score = null;
    // var score1 = null;
    // var score2 = null;
    // var score3 = null;
    // var score4 = null;
    // var score5 = null;
    // var score6 = null;
    if ($('#jatuh1').is(":checked")) {
      score = 0;
    } else if ($('#jatuh2').is(":checked")) {
      score = 25;
    }
    if ($('#sekunder1').is(":checked")) {
      score1 = 0;
    } else if ($('#sekunder2').is(":checked")) {
      score1 = 15;
    }
    if ($('#bantu1').is(":checked")) {
      score2 = 0;
    } else if ($('#bantu2').is(":checked")) {
      score2 = 15;
    }
    else if ($('#bantu3').is(":checked")) {
      score2 = 30;
    }
    if ($('#infus1').is(":checked")) {
      score3 = 0;
    } else if ($('#infus2').is(":checked")) {
      score3 = 20;
    }
    if ($('#berjalan1').is(":checked")) {
      score4 = 0;
    } else if ($('#berjalan2').is(":checked")) {
      score4 = 10;
    } else if ($('#berjalan3').is(":checked")) {
      score4 = 20;
    }
    if ($('#mental1').is(":checked")) {
      score5 = 0;
    } else if ($('#mental2').is(":checked")) {
      score5 = 15;
    }
    sum = Number(score) + Number(score1) + Number(score2) + Number(score3) + Number(score4)+ Number(score5);
    $('#inTotal').val(sum);
    

  }
  

</script>