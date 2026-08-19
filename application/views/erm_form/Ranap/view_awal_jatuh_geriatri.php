<!-- Row -->
<div class="row">
  <div class="col-sm-12">
    <div class="panel panel-default card-view">
      <div class="panel-heading">
        <div class="pull-left">
          <h6 class="panel-title txt-dark">ASESMEN AWAL JATUH GERIATRI</h6>
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

            <div class="form-group">
              <div class="col-md-3">
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
                              - 0-5 : Risiko Rendah
                            </label>
                        </div>
                        <div class="col-md-12">
                          <label class="control-label mb-10 text-left">
                              - 6-16 : Risiko Sedang
                            </label>
                        </div>
                        <div class="col-md-12">
                          <label class="control-label mb-10 text-left">
                              - 17-30 : Risiko Tinggi
                            </label>
                        </div>
                    </div>    
                        <div class="form-group" id="spirit">
                            <div class="col-md-12">
                                <h5 style="margin-top: 30px;"><strong>
                                        <label class="control-label mb-10 text-left"><b>RESIKO JATUH<b /><span class="help"></span></label>
                                        </strong>
                                    </h5>
                            </div>
                            <div class="form-group ">
                                <div class="col-md-4">
                                    <label class="control-label mb-10 text-left">
                                    a. Apakah pasien datang ke rumah sakit karena jatuh?
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
                                            Ya(6)
                                        </label>
                                    </div>
                            </div>
                            <div class="form-group ">
                                <div class="col-md-4">
                                    <label class="control-label mb-10 text-left">
                                    b. Jika tidak, apakah pasien mengalami jatuh dalam 2 bulan terakhir ini?
                                    </label>
                                    <span id="jatuhh_error" class="text-danger"></span>
                                    <div class="radio-button radio-button-primary">
                                    <input id="jatuhh1" type="radio" name="jatuhh" value="Tidak">
                                    <label class="control-label" for="jatuhh1">
                                        Tidak(0)
                                    </label>
                                    </div>
                                    <div class="radio-button radio-button-primary">
                                    <input id="jatuhh2" type="radio" name="jatuhh" value="Ya">
                                    <label class="control-label" for="jatuhh2">
                                        Ya(6)
                                    </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group" id="spirit">
                            <div class="col-md-12">
                                <h5 style="margin-top: 30px;"><strong>
                                        <label class="control-label mb-10 text-left"><b>STATUS MENTAL<b /><span class="help"></span></label>
                                        </strong>
                                    </h5>
                            </div>
                            <div class="form-group ">
                                <div class="col-md-4">
                                    <label class="control-label mb-10 text-left">
                                    a. Apakah pasien delirium? (tidak dapat membuat keputusan, pola pikir tidak terorganisir, gangguan daya ingat)
                                    </label>
                                    <span id="delirium_error" class="text-danger"></span>
                                    <div class="radio-button radio-button-primary">
                                        <input id="delirium1" type="radio" name="delirium" value="Tidak">
                                        <label class="control-label" for="delirium1">
                                            Tidak(0)
                                        </label>
                                    </div>
                                    <div class="radio-button radio-button-primary">
                                        <input id="delirium2" type="radio" name="delirium" value="Ya">
                                        <label class="control-label" for="delirium2">
                                            Ya(14)
                                        </label>
                                    </div>
                            </div>
                            <div class="form-group ">
                                <div class="col-md-4">
                                    <label class="control-label mb-10 text-left">
                                    b. Apakah pasien disorientasi? (salah menyebutkan waktu, tempat, atau orang)
                                    </label>
                                    <span id="disorientasi_error" class="text-danger"></span>
                                    <div class="radio-button radio-button-primary">
                                    <input id="disorientasi1" type="radio" name="disorientasi" value="Tidak">
                                    <label class="control-label" for="disorientasi1">
                                        Tidak(0)
                                    </label>
                                    </div>
                                    <div class="radio-button radio-button-primary">
                                    <input id="disorientasi2" type="radio" name="disorientasi" value="Ya">
                                    <label class="control-label" for="disorientasi2">
                                        Ya(14)
                                    </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="col-md-4">
                                    <label class="control-label mb-10 text-left">
                                    c. Apakah pasien mengalami agitasi? (ketakutan, gelisah, dan cemas)
                                    </label>
                                    <span id="agitasi_error" class="text-danger"></span>
                                    <div class="radio-button radio-button-primary">
                                    <input id="agitasi1" type="radio" name="agitasi" value="Tidak">
                                    <label class="control-label" for="agitasi1">
                                        Tidak(0)
                                    </label>
                                    </div>
                                    <div class="radio-button radio-button-primary">
                                    <input id="agitasi2" type="radio" name="agitasi" value="Ya">
                                    <label class="control-label" for="agitasi2">
                                        Ya(14)
                                    </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group" id="spirit">
                            <div class="col-md-12">
                                <h5 style="margin-top: 30px;"><strong>
                                        <label class="control-label mb-10 text-left"><b>PENGLIHATAN<b /><span class="help"></span></label>
                                        </strong>
                                    </h5>
                            </div>
                            <div class="form-group ">
                                <div class="col-md-4">
                                    <label class="control-label mb-10 text-left">
                                    a. Apakah pasien memakai kacamata?
                                    </label>
                                    <span id="kacamata_error" class="text-danger"></span>
                                    <div class="radio-button radio-button-primary">
                                        <input id="kacamata1" type="radio" name="kacamata" value="Tidak">
                                        <label class="control-label" for="kacamata1">
                                            Tidak(0)
                                        </label>
                                    </div>
                                    <div class="radio-button radio-button-primary">
                                        <input id="kacamata2" type="radio" name="kacamata" value="Ya">
                                        <label class="control-label" for="kacamata2">
                                            Ya(1)
                                        </label>
                                    </div>
                            </div>
                            <div class="form-group ">
                                <div class="col-md-4">
                                    <label class="control-label mb-10 text-left">
                                    b. Apakah pasien mengeluh adanya penglihatan buram?
                                    </label>
                                    <span id="buram_error" class="text-danger"></span>
                                    <div class="radio-button radio-button-primary">
                                    <input id="buram1" type="radio" name="buram" value="Tidak">
                                    <label class="control-label" for="buram1">
                                        Tidak(0)
                                    </label>
                                    </div>
                                    <div class="radio-button radio-button-primary">
                                    <input id="buram2" type="radio" name="buram" value="Ya">
                                    <label class="control-label" for="buram2">
                                        Ya(1)
                                    </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group" id="spirit">
                            <div class="col-md-12">
                                <h5 style="margin-top: 30px;"><strong>
                                        <label class="control-label mb-10 text-left"><b>KEBIASAAN BERKEMIH<b /><span class="help"></span></label>
                                        </strong>
                                    </h5>
                            </div>
                            <div class="form-group ">
                                <div class="col-md-4">
                                    <label class="control-label mb-10 text-left">
                                    a. Apakah terdapat perubahan perilaku berkemih? (frekuensi, urgensi, inkontinensia, nokturia)
                                    </label>
                                    <span id="berkemih_error" class="text-danger"></span>
                                    <div class="radio-button radio-button-primary">
                                        <input id="berkemih1" type="radio" name="berkemih" value="Tidak">
                                        <label class="control-label" for="berkemih1">
                                            Tidak(0)
                                        </label>
                                    </div>
                                    <div class="radio-button radio-button-primary">
                                        <input id="berkemih2" type="radio" name="berkemih" value="Ya">
                                        <label class="control-label" for="berkemih2">
                                            Ya(2)
                                        </label>
                                    </div>
                            </div>
                        </div>
                        <div class="form-group" id="spirit">
                            <div class="col-md-12">
                                <h5 style="margin-top: 30px;"><strong>
                                        <label class="control-label mb-10 text-left"><b>TRANSFER(dari tempat tidur ke kursi dan kembali ke tempat tidur)<b><span class="help"></span></label>
                                        </strong>
                                    </h5>
                            </div>
                            <div class="form-group ">
                                <div class="col-md-8">
                                    <!-- <label class="control-label mb-10 text-left">
                                    a. Apakah terdapat perubahan perilaku berkemih? (frekuensi, urgensi, inkontinensia, nokturia)
                                    </label> -->
                                    <span id="transfer_error" class="text-danger"></span>
                                    <div class="radio-button radio-button-primary">
                                        <input id="transfer1" type="radio" name="transfer" value="Mandiri">
                                        <label class="control-label" for="transfer1">
                                            Mandiri (boleh menggunakan alat bantu jalan) - [0]
                                        </label>
                                    </div>
                                    <div class="radio-button radio-button-primary">
                                        <input id="transfer2" type="radio" name="transfer" value="Bantuan1">
                                        <label class="control-label" for="transfer2">
                                            Memerlukan sedikit bantuan (1 orang) / dalam pengawasan - [1]
                                        </label>
                                    </div>
                                    <div class="radio-button radio-button-primary">
                                        <input id="transfer3" type="radio" name="transfer" value="Bantuan2">
                                        <label class="control-label" for="transfer3">
                                            Memerlukan bantuan yang nyata (2 orang) - [2]
                                        </label>
                                    </div>
                                    <div class="radio-button radio-button-primary">
                                        <input id="transfer4" type="radio" name="transfer" value="Seimbang">
                                        <label class="control-label" for="transfer4">
                                            Tidak dapat duduk dengan seimbang, perlu bantuan total - [3]
                                        </label>
                                    </div>
                            </div>
                        </div>
                        <div class="form-group" id="spirit">
                            <div class="col-md-12">
                                <h5 style="margin-top: 30px;"><strong>
                                        <label class="control-label mb-10 text-left"><b>MOBILITAS<b><span class="help"></span></label>
                                        </strong>
                                    </h5>
                            </div>
                            <div class="form-group ">
                                <div class="col-md-8">
                                    <!-- <label class="control-label mb-10 text-left">
                                    a. Apakah terdapat perubahan perilaku berkemih? (frekuensi, urgensi, inkontinensia, nokturia)
                                    </label> -->
                                    <span id="mobilitas_error" class="text-danger"></span>
                                    <div class="radio-button radio-button-primary">
                                        <input id="mobilitas1" type="radio" name="mobilitas" value="Mandiri">
                                        <label class="control-label" for="mobilitas1">
                                            Mandiri (boleh menggunakan alat bantu jalan) - [0]
                                        </label>
                                    </div>
                                    <div class="radio-button radio-button-primary">
                                        <input id="mobilitas2" type="radio" name="mobilitas" value="Bantuan">
                                        <label class="control-label" for="mobilitas2">
                                            Berjalan dengan bantuan 1 orang (verbal / fisik) - [1]
                                        </label>
                                    </div>
                                    <div class="radio-button radio-button-primary">
                                        <input id="mobilitas3" type="radio" name="mobilitas" value="Kursi Roda">
                                        <label class="control-label" for="mobilitas3">
                                            Menggunakan kursi Roda - [2]
                                        </label>
                                    </div>
                                    <div class="radio-button radio-button-primary">
                                        <input id="mobilitas4" type="radio" name="mobilitas" value="Imobilisasi">
                                        <label class="control-label" for="mobilitas4">
                                            Imobilisasi - [3]
                                        </label>
                                    </div>
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
                        <div class="col-md-3">
                          <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                        </div>
                        <div class="col-md-3">
                          <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                        </div>
                        <div class="col-md-6">
                          <span id="skor_error" class="text-danger"></span>
                            <button type="submit" class="btn btn-success mb-4" onclick="sumScore()">Skor Risiko</button>
                            <div class="col-md-3">
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
                        

                          </div></div></div></div></div></div></div>  
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
    jatuh1 = $('input[name="jatuh"]:checked').val();
    delirium = $('input[name="delirium"]:checked').val();
    disorientasi = $('input[name="disorientasi"]:checked').val();
    agitasi = $('input[name="agitasi"]:checked').val();
    kacamata = $('input[name="kacamata"]:checked').val();
    buram = $('input[name="buram"]:checked').val();
    berkemih = $('input[name="berkemih"]:checked').val();
    transfer = $('input[name="transfer"]:checked').val();
    mobilitas = $('input[name="mobilitas"]:checked').val();
    jatuh2 = $('input[name="jatuhh"]:checked').val();
    // if ($('#jatuhh1').is(":checked")) {
    //   jatuh2 = 'Tidak';
    // } else if ($('#jatuhh2').is(":checked")) {
    //   jatuh2 = 'Ya';
    // }
    skor_total = $('#inTotal').val();
    diagnosa = $('#inDiagnosa').val();

    dataString = 'jatuh1=' + jatuh1 + '&no_rm=' + no_rm + '&jatuh2=' + jatuh2 + '&delirium=' + delirium + '&disorientasi=' + disorientasi + '&id_pelayanan=' + id_pelayanan + '&id_history=' + id_history +
      '&agitasi=' + agitasi + '&kacamata=' + kacamata + '&buram=' + buram + '&berkemih=' + berkemih + '&transfer=' + transfer + '&mobilitas=' + mobilitas + '&skor_total=' + skor_total + '&diagnosa=' + diagnosa;


    $.ajax({
      url: "<?php echo base_url() ?>Erm_ranap_awal_jatuh_geriatri/insert_asesmen",
      method: "POST",
      dataType: 'json',
      data: dataString,
      success: function(data) {
        if (data.status == "success") {
          window.location.href = "<?php echo base_url('erm_ranap/form/') ?>" + '<?= urlencode(base64_encode($id_pelayanan)) ?>' + '/' + '<?= urlencode(base64_encode($id_history)) ?>';
        } else if (data.error) {
          if (jatuh1 == "" || jatuh1 == null) {
            $('#jatuh_error').html("*wajib diisi");
          }
          if (jatuh2 == "" || jatuh2 == null) {
            $('#jatuhh_error').html("*wajib diisi");
          }
          if (delirium == "" || delirium == null) {
            $('#delirium_error').html("*wajib diisi");
          }
          if (disorientasi == "" || disorientasi == null) {
            $('#disorientasi_error').html("*wajib diisi");
          }
          if (agitasi == "" || agitasi == null) {
            $('#agitasi_error').html("*wajib diisi");
          }
          if (kacamata == "" || kacamata == null) {
            $('#kacamata_error').html("*wajib diisi");
          }
          if (buram == "" || buram == null) {
            $('#buram_error').html("*wajib diisi");
          }
          if (berkemih == "" || berkemih == null) {
            $('#berkemih_error').html("*wajib diisi");
          }
          if (transfer == "" || transfer == null) {
            $('#transfer_error').html("*wajib diisi");
          }
          if (mobilitas == "" || mobilitas == null) {
            $('#mobilitas_error').html("*wajib diisi");
          }
          if (skor_total == "" || skor_total == null) {
            $('#skor_error').html("*Klik Untuk Memproses Skor");
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
  function sumScore() {
    if ($('#jatuh1').is(":checked")) {
      score = 0;
    } else if ($('#jatuh2').is(":checked")) {
      score = 6;
    }
    if ($('#jatuhh1').is(":checked")) {
      score1 = 0;
    } else if ($('#jatuhh2').is(":checked")) {
      score1 = 6;
    }
    if ($('#delirium1').is(":checked")) {
      score2 = 0;
    } else if ($('#delirium2').is(":checked")) {
      score2 = 14;
    }
    if ($('#disorientasi1').is(":checked")) {
      score3 = 0;
    } else if ($('#disorientasi2').is(":checked")) {
      score3 = 14;
    }
    if ($('#agitasi1').is(":checked")) {
      score4 = 0;
    } else if ($('#agitasi2').is(":checked")) {
      score4 = 14;
    } 
    if ($('#kacamata1').is(":checked")) {
      score5 = 0;
    } else if ($('#kacamata2').is(":checked")) {
      score5 = 1;
    }
    if ($('#buram1').is(":checked")) {
      score6 = 0;
    } else if ($('#buram2').is(":checked")) {
      score6 = 1;
    }
    if ($('#berkemih1').is(":checked")) {
      score7 = 0;
    } else if ($('#berkemih2').is(":checked")) {
      score7 = 2;
    }
    if ($('#transfer1').is(":checked")) {
      score8 = 0;
    } else if ($('#transfer2').is(":checked")) {
      score8 = 1;
    }else if ($('#transfer3').is(":checked")) {
      score8 = 2;
    }else if ($('#transfer4').is(":checked")) {
      score8 = 3;
    }
    if ($('#mobilitas1').is(":checked")) {
      score9 = 0;
    } else if ($('#mobilitas2').is(":checked")) {
      score9 = 1;
    }else if ($('#mobilitas3').is(":checked")) {
      score9 = 2;
    }else if ($('#mobilitas4').is(":checked")) {
      score9 = 3;
    }

    sum_pre = Number(score9) + Number(score8);
    if(sum_pre <= 3){
      score10 = 0;
    }else if(sum_pre >= 4 || sum_pre <=6){
      score10 = 7;
    }
    sum = Number(score) + Number(score1) + Number(score2) + Number(score3) + Number(score4)+ Number(score5)+ Number(score6)+ Number(score7)+ Number(score10);
    $('#inTotal').val(sum);
    // if (sum >= 2) {
    //   $('#score1').html('<span class="text-danger"><strong>Pasien berisiko malnutrisi, konsul ke Ahli Gizi</strong></span>');
    // }

  }
</script>