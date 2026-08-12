<<<<<<< HEAD
<!-- Row -->
<div class="row">
  <div class="col-sm-12">
    <div class="panel panel-default card-view">
      <div class="panel-heading">
        <div class="pull-left">
          <h6 class="panel-title txt-dark">Assesment Triase UGD</h6>
        </div>
        <div class="clearfix"></div>
      </div>
      <div class="panel-wrapper collapse in">

        <div class="panel-body">
          <div class="form-wrap">
            <div class="form-group">
              <div class="col-md-3">
                <label class="control-label mb-10 text-left">No.RM<span class="help"></span></label>
                <input type="text" disabled class="form-control" value="<?= $no_rm ?>" id="inNoRM">
                <input type="hidden" class="form-control" value="<?= $id_pelayanan ?>" id="inPel">
                <input type="hidden" class="form-control" value="<?= $id_history ?>" id="inHis">
                <div class="has-success">
                  <?php if ($data) : ?>
                    <input type="hidden" id="inId" name="inId" value="<?php echo $data['id_triase_ugd']; ?>">
                  <?php else : ?>
                    <div class="alert alert-danger">ID Asesmen tidak ditemukan.</div>
                  <?php endif; ?>
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-3">
                <label class="control-label mb-10 text-left">Nama<span class="help"></span></label>
                <input type="text" disabled class="form-control" value="<?= $nama ?>" id="inNama">
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-3">
                <label class="control-label mb-10 text-left">Tgl Lahir / Umur<span class="help"></span></label>
                <input type="text" disabled class="form-control" value="<?= $tgl_lahir ?>" id="inTglLahir">
              </div>
            </div>

            <div class="form-group ">
              <div class="col-md-3">
                <label class="control-label mb-10 text-left">Jenis Kelamin</label>
                <input type="text" disabled class="form-control" value="<?= $jenis_kelamin ?>" id="inJk">
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-12">
                <h5 style="margin-top: 30px;"><strong>
                    <label class="control-label mb-10 text-left">
                      ASESMEN AWAL PASIEN IGD
                      <span class="help"></span>
                    </label></strong>
                </h5>
              </div>

              <div class="form-group">
                <div class="col-md-4">
                  <label class="control-label mb-10 text-left">Jam/ Tanggal Masuk <span class="help"></span></label>
                  <input type="text" id="inTglMasuk" disabled class="form-control" value="<?php
                                                                                          setlocale(LC_ALL, 'id_ID');

                                                                                          date_default_timezone_set('Asia/Jakarta');
                                                                                          $time = strtotime($tgl_masuk);
                                                                                          $date = strftime("%H:%M/ %d %B %Y ", $time);
                                                                                          echo $date ?>">
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-4">
                  <label class="control-label mb-10 text-left">Cara Bayar<span class="help"></span></label>
                  <input type="text" disabled class="form-control" id="inCaraBayar" value="<?= $cara_bayar ?>">
                </div>
              </div>


              <!-- <div class="form-group ">
                <div class="col-md-12">
                  <label class="control-label mb-10 text-left">Pasien Rujukan</label>
                  <span id="pRujuk_error" class="text-danger"></span>
                  <div class=" radio-button radio-button-primary">
                    <input id="pRujuk1" name="pRujuk" type="radio" value="Tidak">
                    <label class="control-label" for="pRujuk1">
                      Tidak
                    </label>
                  </div>
                  <div class="radio-button radio-button-primary">
                    <input id="pRujuk2" name="pRujuk" type="radio" value="Ya">
                    <label class="control-label" for="pRujuk2">
                      Ya
                    </label>
                  </div>
                </div>
              </div>

              <div class="form-group inAsalRujuk" style="display: none;">
                <div class="col-md-4">
                  <label class="control-label mb-10 text-left">Rujukan Dari<span class="help"></span></label>
                  <div class="has-success">
                    <input type="text" class="form-control" id="inAsalRujuk">
                  </div>

                </div>
              </div> -->

              <div class="form-group">
                <div class="col-md-4">
                  <label class="control-label mb-10 text-left">Cara Datang :</label>
                  <span id="caraDatang_error" class="text-danger">*</span>

                  <div class="radio-button radio-button-primary">
                    <input id="caraDatang_sendiri" type="radio" name="cara_datang" value="Sendiri">
                    <label class="control-label" for="caraDatang_sendiri">Sendiri</label>
                  </div>

                  <div class="radio-button radio-button-primary">
                    <input id="caraDatang_ambulan" type="radio" name="cara_datang" value="Ambulan">
                    <label class="control-label" for="caraDatang_ambulan">Ambulan</label>
                  </div>

                  <div class="radio-button radio-button-primary">
                    <input id="caraDatang_keluarga" type="radio" name="cara_datang" value="Diantar keluarga">
                    <label class="control-label" for="caraDatang_keluarga">Diantar Keluarga</label>
                  </div>

                  <div class="radio-button radio-button-primary">
                    <input id="caraDatang_polisi" type="radio" name="cara_datang" value="Diantar Polisi">
                    <label class="control-label" for="caraDatang_polisi">Diantar Polisi</label>
                  </div>

                  <div class="radio-button radio-button-primary">
                    <input id="caraDatang_rujukan" type="radio" name="cara_datang" value="Rujukan">
                    <label class="control-label" for="caraDatang_rujukan">Rujukan</label>

                    <div class="has-success">
                      <input type="text" class="form-control" id="asal_rujuk" name="asal_rujukan" style="display: none">
                      <span class="help-block"></span>
                    </div>
                  </div>
                  <script>
                    $('input[name="cara_datang"]').on('change', function() {
                      $('input[name="cara_datang"]').not(this).prop("checked", false);
                      if ($('#cd_rujukan').is(":checked")) {
                        $('#asal_rujuk').show();
                      } else {
                        $('#asal_rujuk').hide().val("");
                      }
                    });
                  </script>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-4">
                  <label class="control-label mb-10 text-left">Alat Bantu :</label>
                  <span id="alatBantu_error" class="text-danger">*</span>

                  <div class="radio-button radio-button-primary">
                    <input id="alatBantu_jalan" type="radio" name="alat_bantu" value="Jalan Kaki">
                    <label class="control-label" for="alatBantu_jalan">Jalan Kaki</label>
                  </div>

                  <div class="radio-button radio-button-primary">
                    <input id="alatBantu_brankard" type="radio" name="alat_bantu" value="Brankard">
                    <label class="control-label" for="alatBantu_brankard">Brankard</label>
                  </div>

                  <div class="radio-button radio-button-primary">
                    <input id="alatBantu_kursiRoda" type="radio" name="alat_bantu" value="Kursi Roda">
                    <label class="control-label" for="alatBantu_kursiRoda">Kursi Roda</label>
                  </div>

                  <div class="radio-button radio-button-primary">
                    <input id="alatBantu_tongkat" type="radio" name="alat_bantu" value="Tongkat/Walker">
                    <label class="control-label" for="alatBantu_tongkat">Tongkat/Walker</label>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-4">
                  <label class="control-label mb-10 text-left">Kasus :</label>
                  <span id="kasus_error" class="text-danger">*</span>

                  <!-- Non Trauma -->
                  <div class="check-item">
                    <input id="kasus_nonTrauma" type="checkbox" name="kasus" value="non_trauma">
                    <label class="control-label" for="kasus_nonTrauma">Non Trauma</label>
                  </div>

                  <!-- Trauma -->
                  <div class="check-item">
                    <input id="kasus_trauma" type="checkbox" name="kasus" value="Trauma">
                    <label class="control-label" for="kasus_trauma">Trauma</label>
                  </div>

                  <!-- Textbox Trauma -->
                  <div class="has-success">
                    <input type="text" class="form-control" id="keterangan_trauma" name="keterangan_trauma" style="display: none;">
                  </div>
                  <script>
                    $('input[name="kasus"]').on('change', function() {
                      // Uncheck semua checkbox lain
                      $('input[name="kasus"]').not(this).prop('checked', false);

                      // Tampilkan textbox jika Trauma
                      if ($('#kasus_trauma').is(':checked')) {
                        $('#keterangan_trauma').show();
                      } else {
                        $('#keterangan_trauma').hide().val('');
                      }
                    });
                  </script>

                  <!-- Kebidanan -->
                  <div class="check-item">
                    <input id="kasus_kebidanan" type="checkbox" name="kasus" value="Kebidanan">
                    <label class="control-label" for="kasus_kebidanan">Kebidanan :</label>
                  </div>

                  <!-- Pilihan Kebidanan -->
                  <div id="kebidanan_options_wrapper"
                    style="padding-left: 25px; margin-top: 10px; border-left: 2px solid #f0f0f0; display: none;">

                    <div class="radio-button radio-button-primary">
                      <input id="hamil_tidak" type="radio" name="status_hamil" value="Tidak Hamil">
                      <label class="control-label" for="hamil_tidak">Tidak Hamil</label>
                    </div>

                    <div class="radio-button radio-button-primary">
                      <input id="hamil_ya" type="radio" name="status_hamil" value="Hamil">
                      <label class="control-label" for="hamil_ya">Hamil</label>
                    </div>

                    <!-- Detail Hamil -->
                    <div id="hamil_detail_wrapper" style="margin-top: 10px;">
                      <div class="row">
                        <div class="col-md-3 col-xs-2" style="padding-right: 2px;">
                          <label class="control-label" for="hamil_g">G:</label>
                          <input type="number" class="form-control" name="hamil_g" id="hamil_g" placeholder="G">
                        </div>
                        <div class="col-md-3 col-xs-2" style="padding-left: 2px; padding-right: 5px;">
                          <label class="control-label" for="hamil_p">P:</label>
                          <input type="number" class="form-control" name="hamil_p" id="hamil_p" placeholder="P">
                        </div>
                        <div class="col-md-3 col-xs-2" style="padding-left: 2px; padding-right: 5px;">
                          <label class="control-label" for="hamil_a">A:</label>
                          <input type="number" class="form-control" name="hamil_a" id="hamil_a" placeholder="A">
                        </div>
                        <div class="col-md-3 col-xs-2" style="padding-left: 5px; padding-right: 5px;">
                          <label class="control-label" for="hamil_minggu">Hamil:</label>
                          <div class="input-group">
                            <input type="number" class="form-control" name="hamil_minggu" id="hamil_minggu">
                            <span class="input">Minggu</span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <script>
                      $(document).ready(function() {
                        // Jika kasus kebidanan dicentang
                        $('#kasus_kebidanan').change(function() {
                          if ($(this).is(':checked')) {
                            $('#kebidanan_options_wrapper').show();
                          } else {
                            $('#kebidanan_options_wrapper').hide();
                            $('input[name="status_hamil"]').prop('checked', false);
                            $('#hamil_detail_wrapper').hide();
                            $('#hamil_g, #hamil_p, #hamil_a, #hamil_minggu').val('');
                          }
                        });

                        // Jika memilih status hamil
                        $('input[name="status_hamil"]').change(function() {
                          if ($(this).val() === 'Hamil') {
                            $('#hamil_detail_wrapper').show();
                          } else {
                            $('#hamil_detail_wrapper').hide();
                            $('#hamil_g, #hamil_p, #hamil_a, #hamil_minggu').val('');
                          }
                        });
                      });
                    </script>
                  </div>
                </div>
              </div>



              <div class="form-group">
                <div class="col-md-12">
                  <h5 style="margin-top: 30px;"><strong>
                      <label class="control-label mb-10 text-left"><b>TANDA-TANDA VITAL</b><span class="help"></span></label></strong>
                  </h5>
                </div>

                <div class="form-group">
                  <div class="col-md-4">
                    <label class="control-label mb-10 text-left">Tekanan Darah<span class="help"></span></label>
                    <span id="td_error" class="text-danger">*</span>
                    <div class="has-success">
                      <input type="text" class="form-control" name="tekanan_darah" placeholder="mmHg">
                    </div>
                  </div>
                </div>


                <div class="form-group">
                  <div class="col-md-4">
                    <label class="control-label mb-10 text-left">Suhu<span class="help"></span></label>
                    <span id="suhu_error" class="text-danger">*</span>
                    <div class="has-success">
                      <input type="number" class="form-control" name="suhu" id="suhu" placeholder="Celsius" inputmode="decimal">
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-4">
                    <label class="control-label mb-10 text-left">Frequensi Nadi<span class="help"></span></label>
                    <span id="nadi_error" class="text-danger">*</span>
                    <div class="has-success">
                      <input type="text" class="form-control" name="frequensi_nadi" placeholder="x/menit">
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-4">
                    <label class="control-label mb-10 text-left">SPO2<span class="help"></span></label>
                    <span id="spo2_error" class="text-danger">*</span>
                    <div class="has-success">
                      <input type="number" class="form-control" name="spo2" placeholder="spo2">
                    </div>
                  </div>
                </div>

                <!-- <div class="form-group">
                  <div class="col-md-4">
                    <label class="control-label mb-10 text-left">Berat Badan<span class="help"></span></label>
                    <span id="berat_badan_error" class="text-danger">*</span>
                    <div class="has-success">
                      <input type="number" class="form-control" name="berat_badan" placeholder="Kg" disabled>
                    </div>
                  </div>
                </div> -->

                <div class="form-group">
                  <div class="col-md-4">
                    <label class="control-label mb-10 text-left">Frequensi Nafas<span class="help"></span></label>
                    <span id="nafas_error" class="text-danger">*</span>
                    <div class="has-success">
                      <input type="text" class="form-control" name="frequensi_nafas" placeholder="x/menit">
                    </div>
                  </div>
                </div>

                <!-- <div class="form-group">
                  <div class="col-md-4">
                    <label class="control-label mb-10 text-left">Tinggi Badan<span class="help"></span></label>
                    <span id="tinggi_badan_error" class="text-danger">*</span>
                    <div class="has-success">
                      <input type="number" class="form-control" name="tinggi_badan" placeholder="Cm" disabled>
                    </div>
                  </div>
                </div> -->

                <!-- <div class="form-group ">
                  <div class="col-md-6">
                    <label class="control-label mb-10 text-left">Kebutuhan Khusus</label>
                    <span id="kebutuhan_khusus_error" class="text-danger">*</span>
                    <div class="checkbox checkbox-success">
                      <input id="kebutuhan_khusus1" type="checkbox" name="kebutuhan_khusus" value="Tidak Ada">
                      <label class="control-label" for="kebutuhan_khusus1">
                        Tidak Ada
                      </label>
                    </div>
                    <div class="checkbox checkbox-success">
                      <input id="kebutuhan_khusus2" type="checkbox" name="kebutuhan_khusus" value="Alat Bantu Dengar">
                      <label class="control-label" for="kebutuhan_khusus2">
                        Alat Bantu Dengar
                      </label>
                    </div>
                    <div class="checkbox checkbox-success">
                      <input id="kebutuhan_khusus3" type="checkbox" name="kebutuhan_khusus" value="Kacamata">
                      <label class="control-label" for="kebutuhan_khusus3">
                        Kacamata
                      </label>
                    </div>

                    <div class="checkbox checkbox-success">
                      <input id="kebutuhan_khusus4" type="checkbox" name="kebutuhan_khusus" value="Tongkat">
                      <label class="control-label" for="kebutuhan_khusus4">
                        Tongkat
                      </label>
                    </div>

                    <div class="checkbox checkbox-success">
                      <input id="kebutuhan_khusus5" type="checkbox" name="kebutuhan_khusus" value="Gigi Palsu">
                      <label class="control-label" for="kebutuhan_khusus5">
                        Gigi Palsu
                      </label>
                    </div>
                  </div>
                </div> -->

                <div class="form-group">
                  <div class="col-md-8">
                    <label class="control-label mb-10 text-left">Keluhan Utama<span class="help"></span></label>
                    <span id="td_error" class="text-danger">*</span>
                    <div class="has-success">
                      <div class="has-success">
                        <textarea class="form-control" name="keluhan_utama" cols="30" rows="5"></textarea>
                      </div>
                      <!-- <input type="text" class="form-control" name="keluhan_utama"> -->
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-8">
                    <label class="control-label mb-10 text-left">Risiko Jatuh</label>
                    <span id="risiko_jatuh_error" class="text-danger">*</span>

                    <div class="radio-button radio-button-primary">
                      <input id="risikoJatuh_tidak" type="radio" name="risiko_jatuh" value="Tidak">
                      <label class="control-label" for="risikoJatuh_tidak">Tidak</label>
                    </div>

                    <div class="radio-button radio-button-primary">
                      <input id="risikoJatuh_ya" type="radio" name="risiko_jatuh" value="Ya">
                      <label class="control-label" for="risikoJatuh_ya">Ya</label>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-12">
                    <label class="control-label mb-10 text-left">Kesadaran :<span class="help"></span></label>
                  </div>
                  <!-- <div class="col-md-4">
                    <label class="control-label mb-10 text-left">GCS :<span class="help"></span></label>
                    <span id="gcs_error" class="text-danger">*</span>
                    <div class="has-success">
                      <input type="number" class="form-control" name="gcs" placeholder="">
                    </div>
                  </div>
                </div> -->
                  <div class="form-group">
                    <div class="col-md-4">
                      <label class="control-label mb-10 text-left">GCS :<span class="help"></span></label>
                      <span id="gcs_error" class="text-danger">*</span>
                      <div class="">
                        <input type="number" disabled class="form-control" name="gcs" id="gcs" placeholder="">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-4">
                        <label class="control-label mb-10 text-left">E :<span class="help"></span></label>
                        <span id="e_error" class="text-danger">*</span>
                        <div class="">
                          <input type="number" class="form-control" name="e" id="e" value="0">
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-4">
                        <label class="control-label mb-10 text-left">M :<span class="help"></span></label>
                        <span id="m_error" class="text-danger">*</span>
                        <div class=" ">
                          <input type="number" class="form-control" name="m" id="m" value="0">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                    </div>
                    <div class="form-group">
                      <div class="col-md-4">
                        <label class="control-label mb-10 text-left">V :<span class="help"></span></label>
                        <span id="v_error" class="text-danger">*</span>
                        <div class=" ">
                          <input type="number" class="form-control" name="v" id="v" value="0">
                        </div>
                      </div>
                    </div>

                    <!-- <div class="form-group ">
                  <div class="col-md-12">
                    <label class="control-label mb-10 text-left">MATA</label>
                    <span id="mata_error" class="text-danger"></span>
                    <div class="radio-button radio-button-primary">
                      <input id="mata1" type="radio" name="mata" value="Spontan">
                      <label class="control-label" for="mata1">
                        Spontan
                      </label>
                    </div>
                    <div class="radio-button radio-button-primary">
                      <input id="mata2" type="radio" name="mata" value="Perintah">
                      <label class="control-label" for="mata2">
                        Perintah
                      </label>
                    </div>
                    <div class="radio-button radio-button-primary">
                      <input id="mata3" type="radio" name="mata" value="Rangsang Nyeri">
                      <label class="control-label" for="mata3">
                        Rangsang Nyeri
                      </label>
                    </div>
                    <div class="radio-button radio-button-primary">
                      <input id="mata4" type="radio" name="mata" value="tidak ada respon">
                      <label class="control-label" for="mata4">
                        Tidak ada respon
                      </label>
                    </div>
                  </div>
                </div>


                <div class="form-group ">
                  <div class="col-md-3">
                    <label class="control-label mb-10 text-left">VERBAL</label>
                    <span id="verbal_error" class="text-danger"></span>
                    <div class="radio-button radio-button-primary">
                      <input id="verbal1" type="radio" name="verbal" value="Baik">
                      <label class="control-label" for="verbal1">
                        Baik
                      </label>
                    </div>
                    <div class="radio-button radio-button-primary">
                      <input id="verbal2" type="radio" name="verbal" value="Bingung">
                      <label class="control-label" for="verbal2">
                        Bingung
                      </label>
                    </div>
                    <div class="radio-button radio-button-primary">
                      <input id="verbal3" type="radio" name="verbal" value="Bicara tidak jelas">
                      <label class="control-label" for="verbal3">
                        Bicara tidak Jelas
                      </label>
                    </div>
                    <div class="radio-button radio-button-primary">
                      <input id="verbal4" type="radio" name="verbal" value="Menggerang">
                      <label class="control-label" for="verbal4">
                        Menggerang
                      </label>
                    </div>
                    <div class="radio-button radio-button-primary">
                      <input id="verbal5" type="radio" name="verbal" value="tidak ada respon">
                      <label class="control-label" for="verbal5">
                        Tidak ada respon
                      </label>
                    </div>
                  </div>
                </div>


                <div class="form-group ">
                  <div class="col-md-3">
                    <label class="control-label mb-10 text-left">MOTORIK</label>
                    <span id="motorik_error" class="text-danger"></span>
                    <div class="radio-button radio-button-primary">
                      <input id="motorik1" type="radio" name="motorik" value="Mengikuti perintah">
                      <label class="control-label" for="motorik1">
                        Mengikuti Perintah
                      </label>
                    </div>
                    <div class="radio-button radio-button-primary">
                      <input id="motorik2" type="radio" name="motorik" value="melokalisir nyeri">
                      <label class="control-label" for="motorik2">
                        Melokalisir Nyeri
                      </label>
                    </div>
                    <div class="radio-button radio-button-primary">
                      <input id="motorik3" type="radio" name="motorik" value="menjauhi rangsangan">
                      <label class="control-label" for="motorik3">
                        Menjauhi Rangsangan
                      </label>
                    </div>
                    <div class="radio-button radio-button-primary">
                      <input id="motorik4" type="radio" name="motorik" value="fleksi abnormal">
                      <label class="control-label" for="motorik4">
                        Fleksi abnormal
                      </label>
                    </div>
                    <div class="radio-button radio-button-primary">
                      <input id="motorik5" type="radio" name="motorik" value="Eksistensi abnormal">
                      <label class="control-label" for="motorik5">
                        Eksistensi abnormal
                      </label>
                    </div>
                    <div class="radio-button radio-button-primary">
                      <input id="motorik6" type="radio" name="motorik" value="tidak ada respon">
                      <label class="control-label" for="motorik6">
                        Tidak ada respon
                      </label>
                    </div>
                  </div> -->

                    <style>
                      label {
                        color: black !important;
                      }
                    </style>
                    <div class="form-group text-center" style="margin-top: 30px;">
                      <div class="col-md-12">
                        <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                      </div>
                    </div>
                    <div class="clearfix"></div>

                    <!-- Bagian Pemeriksaan-->
                    <!-- <div id="pemeriksaan">
                  <label>PEMERIKSAAN</label><br>
                  <input type="radio" name="pemeriksaan" value="segera" id="segera" onclick="tampilkanResutasi()">
                  <label for="segera">Segera</label><br>
                  <input type="radio" name="pemeriksaan" value="10menit" id="menit10" onclick="tampilkanEmergency()">
                  <label for="menit10">10 Menit</label><br>
                  <input type="radio" name="pemeriksaan" value="30menit" id="menit30" onclick="tampilkanUrgent()">
                  <label for="menit30">30 Menit</label><br>
                  <input type="radio" name="pemeriksaan" value="60menit" id="menit60" onclick="tampilkanTidakDarurat()">
                  <label for="menit60">60 Menit</label>
                </div> -->
                  <div class="form-group row">
                      <div class="col-md-7">
                        <h5 style="margin-top: 50px;">
                          <label class="control-label mb-10 text-left">
                            <b>Skala Nyeri</b> <span class="help"></span>
                          </label>
                        </h5>
                        <div class="slidecontainer">
                          <span id="val"><?= isset($data['skala_nyeri']) ? $data['skala_nyeri'] : 0; ?></span>
                          <input id="slide" name="skala_nyeri" type="range" min="0" max="10" 
                            value="<?= isset($data['skala_nyeri']) ? $data['skala_nyeri'] : 0; ?>" 
                            oninput="updateNyeri(event)" onchange="updateNyeri(event)" />
                          <span class="help-block"></span>
                          <div id="state">
                            <img src='<?= base_url() . 'assets/dist/img/tidak_nyeri.png'; ?>' width=7%>
                            <br>
                            <span style='color:black;'>Tidak Nyeri</span>
                          </div>
                        </div>
                      </div>
                    </div>

                    <table class="triase-table">
                      <tbody>
                        <tr>
                          <td class="category-cell">AIR WAY</td>
                          <td>
                            <div class="check-item">
                              <input type="checkbox" name="airway[]" value="sumbatan" id="aw_p1_total">
                              <label for="aw_p1_total">Sumbatan</label>
                            </div>
                            <div class="check-item">
                              <input type="checkbox" name="airway[]" value="ancaman sumbatan" id="aw_p1_sebagian">
                              <label for="aw_p1_sebagian">Ancaman Sumbatan</label>
                            </div>
                          </td>
                          <td>
                            <div class="check-item">
                              <input type="checkbox" name="airway[]" value="bebas1" id="aw_p2_bebas">
                              <label for="aw_p2_bebas">Bebas</label>
                            </div>
                          </td>
                          <td>
                            <div class="check-item">
                              <input type="checkbox" name="airway[]" value="bebas2" id="aw_p3_bebas">
                              <label for="aw_p3_bebas">Bebas</label>
                            </div>
                          </td>
                          <td>
                          </td>
                        </tr>

                        <tr>
                          <td class="category-cell">Pernapasan</td>
                          <td>
                            <div class="check-item">
                              <input type="checkbox" name="breathing[]" value="henti_nafas" id="br_p1_henti">
                              <label for="br_p1_henti">Henti Nafas</label>
                            </div>
                            <div class="check-item">
                              <input type="checkbox" name="breathing[]" value="rr_kurang_10" id="br_p1_rr_lt10">
                              <label for="br_p1_rr_lt10">Napas (&lt; 10x/mnt)</label>
                            </div>
                            <div class="check-item">
                              <input type="checkbox" name="breathing[]" value="rr_lebih_32" id="br_p1_rr_gt32">
                              <label for="br_p1_rr_gt32">Napas (&gt; 32x/mnt)</label>
                            </div>
                          </td>
                          <td>
                            <div class="check-item">
                              <input type="checkbox" name="breathing[]" value="rr_25_32" id="br_p2_takipneu">
                              <label for="br_p2_takipneu">Napas (25-32x/mnt)</label>
                            </div>
                            <div class="check-item">
                              <input type="checkbox" name="breathing[]" value="whezing" id="br_p2_whezing">
                              <label for="br_p2_whezing">Whezing / Meng'i</label>
                            </div>
                          </td>
                          <td>
                            <div class="check-item">
                              <input type="checkbox" name="breathing[]" value="normal" id="br_p3_normal">
                              <label for="br_p3_normal">Normal</label>
                            </div>
                            <div class="check-item">
                              <input type="checkbox" name="breathing[]" value="rr_10_24" id="br_p3_rr_10-24">
                              <label for="br_p3_rr_10-24">Napas (10-24x/mnt)</label>
                            </div>
                          </td>
                          <td>
                            <div class="check-item">
                              <input type="checkbox" name="breathing[]" value="henti_napas" id="br_p4_henti">
                              <label for="br_p4_henti">Henti Napas</label>
                            </div>
                          </td>
                        </tr>

                        <tr>
                          <td class="category-cell">Sirkulasi</td>
                          <td>
                            <div class="check-item">
                              <input type="checkbox" name="cyrculation[]" value="henti_jantung" id="cy_p1_henti">
                              <label for="cy_p1_henti">Henti Jantung</label>
                            </div>
                            <div class="check-item">
                              <input type="checkbox" name="cyrculation[]" value="nadi_lemah" id="cy_p1_lemah">
                              <label for="cy_p1_lemah">Nadi Lemah</label>
                            </div>
                            <div class="check-item">
                              <input type="checkbox" name="cyrculation[]" value="nadi_kurang_50" id="nadi_50m">
                              <label for="nadi_50m">Nadi (&lt; 50x/menit)</label>
                            </div>
                            <div class="check-item">
                              <input type="checkbox" name="cyrculation[]" value="nadi_lebih_120" id="nadi_120m">
                              <label for="nadi_120m">Nadi (&gt; 120x/menit)</label>
                            </div>
                            <div class="check-item">
                              <input type="checkbox" name="cyrculation[]" value="akral_dingin" id="akral_dingin">
                              <label for="akral_dingin">Akral Dingin</label>
                            </div>
                            <div class="check-item">
                              <input type="checkbox" name="cyrculation[]" value="crt_2" id="crt_2">
                              <label for="crt_2">CRT &gt; 2 Detik</label>
                            </div>
                            <div class="check-item">
                              <input type="checkbox" name="cyrculation[]" value="nyeri_dada" id="nyeri_dada">
                              <label for="nyeri_dada">Nyeri Dada (Iskemik)</label>
                            </div>
                          </td>
                          <td>
                            <div class="check-item">
                              <input type="checkbox" name="cyrculation[]" value="nadi_kuat1" id="nadi_kuat1">
                              <label for="nadi_kuat2">Nadi Kuat</label>
                            </div>
                            <div class="check-item">
                              <input type="checkbox" name="cyrculation[]" value="nadi_101_120" id="nadi_101">
                              <label for="nadi_101">Nadi (101-120x/mnt)</label>
                            </div>
                            <div class="check-item">
                              <input type="checkbox" name="cyrculation[]" value="nadi_51_59" id="nadi_51">
                              <label for="nadi_51">Nadi (51-59x/mnt)</label>
                            </div>
                            <div class="check-item">
                              <input type="checkbox" name="cyrculation[]" value="akral_hangat" id="akral_hangat">
                              <label for="akral_hangat">Akral Hangat</label>
                            </div>
                            <div class="check-item">
                              <input type="checkbox" name="cyrculation[]" value="crt_2d" id="crt_2d">
                              <label for="crt_2d">CRT &lt; 2 Detik</label>
                            </div>
                            <div class="check-item">
                              <input type="checkbox" name="cyrculation[]" value="sistol_lebih_160" id="sistol_160">
                              <label for="cy_p2_kuat">Sistol &gt; 160 mmHg</label>
                            </div>
                            <div class="check-item">
                              <input type="checkbox" name="cyrculation[]" value="diastol_lebih_100" id="diastol_100">
                              <label for="diastol_100">Diastol &gt; 100 mmHg</label>
                            </div>
                          </td>
                          <td>
                            <div class="check-item">
                              <input type="checkbox" name="cyrculation[]" value="nadi_kuat2" id="nadi_kuat2">
                              <label for="nadi_kuat3">Nadi Kuat</label>
                            </div>
                            <div class="check-item">
                              <input type="checkbox" name="cyrculation[]" value="nadi_60_100" id="nadi_60">
                              <label for="nadi_60">Nadi (60-100x/mnt)</label>
                            </div>
                            <div class="check-item">
                              <input type="checkbox" name="cyrculation[]" value="akral_hangat2" id="akral_hangat2">
                              <label for="akral_hangat2">Akral Hangat</label>
                            </div>
                            <div class="check-item">
                              <input type="checkbox" name="cyrculation[]" value="crt_2dd" id="crt_2dd">
                              <label for="crt_2dd">CRT &lt; 2 Detik</label>
                            </div>
                          </td>
                          <td>
                            <div class="check-item">
                              <input type="checkbox" name="cyrculation[]" value="hentijantung" id="cy_p4_henti">
                              <label for="cy_p4_henti">Henti Jantung</label>
                            </div>
                            <div class="check-item">
                              <input type="checkbox" name="cyrculation[]" value="ekg_asistol" id="ekg_asistol">
                              <label for="ekg_asistol">EKG Asistol</label>
                            </div>
                          </td>
                        </tr>

                        <tr>
                          <td class="category-cell">Kesadaran</td>
                          <td>
                            <div class="check-item">
                              <input type="checkbox" name="disability[]" value="gcs_kurang_12" id="di_p1_gcs_lt12">
                              <label for="di_p1_gcs_lt12">GCS &lt;12</label>
                            </div>
                            <div class="check-item">
                              <input type="checkbox" name="disability[]" value="kejang" id="di_p1_kejang">
                              <label for="di_p1_kejang">Kejang</label>
                            </div>
                            <div class="check-item">
                              <input type="checkbox" name="disability[]" value="gelisah" id="di_p1_gelisah">
                              <label for="di_p1_gelisah">Gelisah</label>
                            </div>
                          </td>
                          <td>
                            <div class="check-item">
                              <input type="checkbox" name="disability[]" value="gcs_lebih_12" id="di_p2_gcs_ge12">
                              <label for="di_p2_gcs_ge12">GCS &gt; 12</label>
                            </div>
                          </td>
                          <td>
                            <div class="check-item">
                              <input type="checkbox" name="disability[]" value="gcs_15" id="di_p3_gcs15">
                              <label for="di_p3_gcs15">GCS 15</label>
                            </div>
                          </td>
                          <td>
                            <div class="check-item">
                              <input type="checkbox" name="disability[]" value="gcs_3" id="di_p4_gcs3">
                              <label for="di_p4_gcs3">GCS 3</label>
                            </div>
                            <div class="check-item">
                              <input type="checkbox" name="disability[]" value="rc" id="di_p4_rc">
                              <label for="di_p4_rc">RC (-/-)</label>
                            </div>
                          </td>
                        </tr>
                      </tbody>

                      <tfoot>
                        <tr>
                          <td class="category-cell">KATEGORI</td>
                          <td>
                            <div class="check-item">
                              <input type="checkbox" name="kategori_triase" value="resusitasi" id="kat_merah">
                              <label for="kat_merah" class="kategori-box cat-merah">MERAH<br>RESUSITASI</label>
                            </div>
                          </td>
                          <td>
                            <div class="check-item">
                              <input type="checkbox" name="kategori_triase" value="urgent" id="kat_kuning">
                              <label for="kat_kuning" class="kategori-box cat-kuning">KUNING<br>URGENT</label>
                            </div>
                          </td>
                          <td>
                            <div class="check-item">
                              <input type="checkbox" name="kategori_triase" value="non_urgent" id="kat_hijau">
                              <label for="kat_hijau" class="kategori-box cat-hijau">HIJAU<br>NON URGENT</label>
                            </div>
                          </td>
                          <td>
                            <div class="check-item">
                              <input type="checkbox" name="kategori_triase" value="doa" id="kat_hitam">
                              <label for="kat_hitam" class="kategori-box cat-hitam">HITAM<br>DOA</label>
                            </div>
                          </td>
                        </tr>N
                      </tfoot>
                    </table>
                    <script>
                      $('input[name="kategori_triase[]"]').on('change', function() {
                        if ($(this).is(':checked')) {
                          $('input[name="kategori_triase[]"]').not(this).prop('checked', false);
                        }
                      });
                    </script>

                    <div class="form-group row">
                      <div class="col-md-3">
                        <label class="control-label mb-10 text-left">
                          Staff Pengisi Assesmen : <span class="help"></span>
                        </label>
                        <div class="has-success">
                          <select class="form-control select2" id="nama_staff" name="nama_staff" required>
                            <option>-</option>
                            <?php foreach ($staff as $s) : ?>
                              <option value="<?= $s->nama; ?>"><?= $s->nama; ?></option>
                            <?php endforeach; ?>
                          </select>
                          <span class="staff_error"></span>
                        </div>
                      </div>
                    </div>

                  
                    <div class="form-group row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label col-md-4 pt-5">Verifikasi Dokter :</label>
                          <div class="col-md-8">
                            <div class="radio-list">
                              <div class="radio-inline pl-0">
                                <span class="radio radio-info">
                                  <input type="radio" value="Tidak" name="verifikasi_dokter" id="verifikasi_dokter_tidak" checked>
                                  <label class="control-label" for="verifikasi_dokter_tidak">Tidak</label>
                                </span>
                              </div>
                              <div class="radio-inline pl-0">
                                <span class="radio radio-info">
                                  <input type="radio" value="Ya" name="verifikasi_dokter" id="verifikasi_dokter_ya">
                                  <label class="control-label" for="verifikasi_dokter_ya">Ya</label>
                                </span>
                              </div>
                              <span class="help-block"></span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="form-group row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="col-md-4 control-label pt-5">Status Verifikasi :</label>
                          <div class="col-md-8">
                            <div class="radio-list">
                              <div id="status">
                              </div>
                              <span class="help-block"></span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div id="detail_verifikasi" class="form-group row" style="display: none;">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label col-md-4 pt-5">Nama Dokter:</label>
                          <div class="col-md-8 has-success">
                            <select class="form-control filled-input select2" style="border: 1px solid lightgreen;" id="nama_dokter">
                              <option value="">-- Pilih Dokter --</option>
                              <?php foreach ($dokter as $row) : ?>
                                <option value="<?php echo $row['nama']; ?>">
                                  <?php echo $row['nama']; ?>
                                </option>
                              <?php endforeach; ?>
                            </select>
                            <span class="help-block"></span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <script>
                      $('input[name="verifikasi_dokter"]').change(function() {
                        if ($(this).val() === 'Ya' && $(this).prop('checked')) {
                          $("#detail_verifikasi").show();
                        } else {
                          $("#detail_verifikasi").hide(); // Jika radio button lain dipilih, sembunyikan kembali (opsional)
                        }
                      });
                    </script>


                    <script>
                      // Fungsi untuk menampilkan bagian Resutasi
                      function tampilkanResutasi() {
                        sembunyikanSemua();
                        document.getElementById("resutasi").style.display = "block";
                      }

                      // Fungsi untuk menampilkan bagian Emergency
                      function tampilkanEmergency() {
                        sembunyikanSemua();
                        document.getElementById("emergency").style.display = "block";
                      }

                      // Fungsi untuk menampilkan bagian Urgent
                      function tampilkanUrgent() {
                        sembunyikanSemua();
                        document.getElementById("urgent").style.display = "block";
                      }

                      // Fungsi untuk menampilkan bagian Tidak Darurat
                      function tampilkanTidakDarurat() {
                        sembunyikanSemua();
                        document.getElementById("tidak_darurat").style.display = "block";
                      }

                      // Fungsi untuk menyembunyikan semua bagian
                      function sembunyikanSemua() {
                        document.getElementById("resutasi").style.display = "none";
                        document.getElementById("emergency").style.display = "none";
                        document.getElementById("urgent").style.display = "none";
                        document.getElementById("tidak_darurat").style.display = "none";
                      }
                    </script>


                    <div class="form-group">
                      <div class="form-group text-center" style="margin-top: 30px;">
                        <div class="col-md-12">
                          <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                        </div>

                        <div class="col-md-6">
                          <a class="btn btn-default btn-anim  btn-sm" onclick="javascript:history.go(-1)" style="margin-right: 20px; margin-left: 30px;"><i class="fa fa-arrow-left"></i><span class="btn-text">KEMBALI</span></a>
                          <button class="btn btn-success mb-4" onclick="simpan()">Simpan</button>
                          <button class="btn btn-success mb-4" onclick="cetak()">Cetak</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <link rel="stylesheet" href="<?php echo base_url('assets/css/range-slide.css'); ?>">
            <script type="text/javascript">
              function displayValue(e) {
                var inp = e.target || this;
                if (!inp) return;
                var value = inp.value;
                var min = inp.min;
                var max = inp.max;
                var width = inp.offsetWidth || 100;
                var offset = -20;
                var percent = (value - min) / (max - min);
                var pos = percent * (width + offset) - 40;
                var span = document.getElementById('val');
                if (span) {
                  span.style.left = pos + 'px';
                  span.innerHTML = value;
                }
              }

              function updateNyeri(e) {
                if (!e || !e.target) return;
                displayValue(e);
                tampilStatus(e.target.value);
              }

              $(document).ready(function() {
                id_history = $('#inHis').val();
                $.ajax({
                  url: "<?php echo base_url() ?>Erm_ases_triase_ugd/get_ass_per",
                  method: "POST",
                  dataType: 'json',
                  data: {
                    id: id_history
                  },
                  success: function(data) {
                    $('#gcs').val(data.gcs);
                    $('#e').val(data.e);
                    $('#m').val(data.m);
                    $('#v').val(data.v);
                    $('textarea[name="keluhan_utama"]').val(data.keluhan_utama);
                    $(`input[name='cara_datang'][value='${data.cara_datang}']`).prop("checked", true);
                    $(`input[name='alat_bantu'][value='${data.alat_bantu}']`).prop("checked", true);
                    $(`input[name='risiko_jatuh'][value='${data.risiko_jatuh}']`).prop("checked", true);
                    $('input[name="tekanan_darah"]').val(data.tekanan_darah);
                    $('input[name="frequensi_nadi"]').val(data.frequensi_nadi);
                    $('input[name="suhu"]').val(data.suhu);
                    $('input[name="frequensi_nafas"]').val(data.frequensi_nafas);
                    $('input[name="spo2"]').val(data.spo2);
                    var usernameLogin = "<?= $username_login ?>"; 
                    var dokterVerifikator = data.dokter_verif;
                    if (data.verif === 'Belum') {
                      if (usernameLogin === dokterVerifikator) {
                        $('#status').html(`
            <button class='btn btn-primary' onclick='verif(${data.id_triase_ugd})'>
                <i class='icon-check'></i>
            </button>
        `);
                      } else {
                        $('#status').html("<span class='badge badge-warning'>Menunggu verifikasi</span>");
                      }
                    } else if (data.verif === 'Ya') {
                      $('#status').html("<span class='badge badge-success'>Terverifikasi</span>");
                    } else {
                      $('#status').html("<span class='badge badge-default'>Tidak memerlukan verifikasi</span>");
                    }
                    $('#slide').val(data.skor_nyeri);
                    $('#val').html(data.skor_nyeri);
                    updateNyeri({ target: $('#slide')[0] });

           
                    $('input[name="verifikasi_dokter"]').prop('disabled', true);
                    $('#nama_dokter').prop('disabled', true);
                    $('#nama_dokter').val(data.dokter_verif).change();
                    $('#nama_staff').val(data.nama_staff).change();
                    var airwayVals = data.airway.split(',');
                    airwayVals.forEach(val => {
                      $('input[name="airway[]"][value="' + val + '"]').prop('checked', true);
                    });
                    var breathingVals = data.breathing.split(',');
                    breathingVals.forEach(val => {
                      $('input[name="breathing[]"][value="' + val + '"]').prop('checked', true);
                    });
                    var cyrculationVals = data.cyrculation.split(',');
                    cyrculationVals.forEach(val => {
                      $('input[name="cyrculation[]"][value="' + val + '"]').prop('checked', true);
                    });
                    var disabilityVals = data.disability.split(',');
                    disabilityVals.forEach(val => {
                      $('input[name="disability[]"][value="' + val + '"]').prop('checked', true);
                    });
                    var kategoriVals = data.kategori.split(',');
                    kategoriVals.forEach(function(val) {
                      $(`input[name='kategori_triase'][value='${val.trim()}']`).prop('checked', true);
                    });
                    if (data.verif === 'Belum') {
                      $('input[name="verifikasi_dokter"][value="Ya"]').prop("checked", true).change();
                    } else {
                      $('input[name="verifikasi_dokter"][value="' + data.verif + '"]').prop("checked", true).change();
                    }
                    var rawKasus = data.kasus;
                    var mainKasus = rawKasus.split(":")[0].trim();
                    var tambahan = rawKasus.includes(":") ? rawKasus.split(":")[1].trim() : "";
                    $(`input[name='kasus'][value='${mainKasus}']`).prop("checked", true);
                    if (mainKasus === "Trauma") {
                      $('#keterangan_trauma').val(tambahan).show();
                    }
                    var rawDatang = data.cara_datang;
                    var mainDatang = rawDatang.split(":")[0].trim();
                    var tambah = rawDatang.includes(":") ? rawDatang.split(":")[1].trim() : "";
                    $(`input[name='cara_datang'][value='${mainDatang}']`).prop("checked", true);
                    if (mainDatang === "Rujukan") {
                      $('#asal_rujuk').val(tambah).show();
                    }
                    if (data.kasus.includes("Kebidanan")) {
                      $("#kasus_kebidanan").prop("checked", true);
                      $("#kebidanan_options_wrapper").show();
                      if (data.status_hamil === "Hamil") {
                        $("#hamil_ya").prop("checked", true);
                        $("#hamil_detail_wrapper").show();
                        $("#hamil_g").val(data.hamil_g);
                        $("#hamil_p").val(data.hamil_p);
                        $("#hamil_a").val(data.hamil_a);
                        $("#hamil_minggu").val(data.hamil_minggu);
                      } else {
                        $("#hamil_tidak").prop("checked", true);
                        $("#hamil_detail_wrapper").hide();
                      }
                    }
                  }
                });
              });
            </script>
            <script type="text/javascript">
              function tampilStatus(val) {
                if (val >= 0 && val < 1) {
                  $('#state').html("<img src='<?= base_url() . 'assets/dist/img/tidak_nyeri.png'; ?>' width=7%></img><br><span style='color:black;'>Tidak Nyeri</span>");
                } else if (val >= 1 && val < 3) {
                  $('#state').html("<img src='<?= base_url() . 'assets/dist/img/nyeri_ringan.png'; ?>' width=7%></img><br><span style='color:black;'>Nyeri Ringan</span>");
                } else if (val >= 3 && val < 5) {
                  $('#state').html("<img src='<?= base_url() . 'assets/dist/img/nyeri_sedang.png'; ?>' width=7%></img><br><span style='color:black;'>Nyeri Sedang</span>");
                } else if (val >= 5 && val < 7) {
                  $('#state').html("<img src='<?= base_url() . 'assets/dist/img/nyeri_sedang1.png'; ?>' width=7%></img><br><span style='color:black;'>Nyeri Sedang</span>");
                } else if (val >= 7 && val < 9) {
                  $('#state').html("<img src='<?= base_url() . 'assets/dist/img/nyeri_berat.png'; ?>' width=7%></img><br><span style='color:black;'>Nyeri Berat</span>");
                } else if (val >= 9 && val <= 10) {
                  $('#state').html("<img src='<?= base_url() . 'assets/dist/img/nyeri_sangat_berat.png'; ?>' width=7%></img><br><span style='color:black;'>Nyeri Sangat Berat</span>");
                }
              }

              $(function() {
                $("#frek_bab1").click(function() {
                  if ($(this).is(":checked")) {
                    $("#frek_bab").hide();
                  } else {
                    $("#frek_bab").show();
                  }
                });
                $("#kondisi_umum6").click(function() {
                  if ($(this).is(":checked")) {
                    $("#kondisi_umum").show();
                  } else {
                    $("#kondisi_umum").hide();
                  }
                });
                $("#info_dpjp1").click(function() {
                  if ($(this).is(":checked")) {
                    $("#info_dpjp").hide();
                  }
                });
                $("#info_dpjp2").click(function() {
                  if ($(this).is(":checked")) {
                    $("#info_dpjp").show();
                  }
                });
                $("#wajib_ibadah3").click(function() {
                  if ($(this).is(":checked")) {
                    $("#wajib_ibadah").show();
                  }
                });
                $("#wajib_ibadah2").click(function() {
                  if ($(this).is(":checked")) {
                    $("#wajib_ibadah").hide();
                  }
                });
                $("#wajib_ibadah1").click(function() {
                  if ($(this).is(":checked")) {
                    $("#wajib_ibadah").hide();
                  }
                });
                $("#faktor_nyeri5").click(function() {
                  if ($(this).is(":checked")) {
                    $("#faktor_nyeri").show();
                  } else {
                    $("#faktor_nyeri").hide();
                  }
                });
                $("#durasi3").click(function() {
                  if ($(this).is(":checked")) {
                    $("#durasi").show();
                  } else {
                    $("#durasi").hide();
                  }
                });
                $("#durasi2").click(function() {
                  if ($(this).is(":checked")) {
                    $("#durasi").hide();
                  }
                });
                $("#durasi1").click(function() {
                  if ($(this).is(":checked")) {
                    $("#durasi").hide();
                  }
                });
                $("#faktor_peringan4").click(function() {
                  if ($(this).is(":checked")) {
                    $("#faktor_peringan").show();
                  } else {
                    $("#faktor_peringan").hide();
                  }
                });
                $("#efek_nyeri6").click(function() {
                  if ($(this).is(":checked")) {
                    $("#efek_nyeri").show();
                  } else {
                    $("#efek_nyeri").hide();
                  }
                });
                $("#pRujuk2").click(function() {
                  if ($(this).is(":checked")) {
                    $(".inAsalRujuk").show();
                  } else {
                    $(".inAsalRujuk").hide();
                  }
                });
                $("#pRujuk1").click(function() {
                  if ($(this).is(":checked")) {
                    $(".inAsalRujuk").hide();
                  } else {
                    $(".inAsalRujuk").hide();
                  }
                });
              });
              $(document).ready(function() {
                var birth = new Date('<?= $tgl_lahir ?>');
                var check = new Date();
                var milliDay = 1000 * 60 * 60 * 24; // a day in milliseconds;
                var ageInDays = (check - birth) / milliDay;
                var years = Math.floor(ageInDays / 365);
                if (years > 15) {
                  $("#gizi_dewasa").show();
                  $("#gizi_anak").hide();
                } else {
                  $("#gizi_anak").show();
                  $("#gizi_dewasa").hide();
                  $('input[name="tekanan_darah"]').val(0);
                }
                // alert(years);

                var agama = '<?= $agama; ?>';
                if (agama == 'ISLAM') {
                  $("#spirit").show();
                } else {
                  $("#spirit").hide();
                }
              });

              function sumScore() {
                if ($('#penurunan_bb1').is(":checked")) {
                  score = 0;
                } else if ($('#penurunan_bb2').is(":checked")) {
                  score = 2;
                } else if ($('#penurunan_bb3').is(":checked")) {
                  score = 1;
                } else if ($('#penurunan_bb4').is(":checked")) {
                  score = 2;
                } else if ($('#penurunan_bb5').is(":checked")) {
                  score = 3;
                } else if ($('#penurunan_bb6').is(":checked")) {
                  score = 4;
                } else if ($('#penurunan_bb7').is(":checked")) {
                  score = 2;
                }
                if ($('#kurang_makan1').is(":checked")) {
                  score1 = 0;
                } else if ($('#kurang_makan2').is(":checked")) {
                  score1 = 1;
                }
                sum = Number(score) + Number(score1);
                // $('#score').val(sum);
                if (sum >= 2) {
                  $('#score').html('<span class="text-danger"><strong>Pasien berisiko malnutrisi, konsul ke Ahli Gizi</strong></span>');
                }

              }

              function sumScore1() {
                if ($('#kurus1').is(":checked")) {
                  score = 0;
                } else if ($('#kurus2').is(":checked")) {
                  score = 1;
                }
                if ($('#turun_bb1').is(":checked")) {
                  score1 = 0;
                } else if ($('#turun_bb2').is(":checked")) {
                  score1 = 1;
                }
                if ($('#diare1').is(":checked")) {
                  score2 = 0;
                } else if ($('#diare2').is(":checked")) {
                  score2 = 1;
                }
                if ($('#makan_kurang1').is(":checked")) {
                  score3 = 0;
                } else if ($('#makan_kurang2').is(":checked")) {
                  score3 = 1;
                }
                if ($('#malnutrisi1').is(":checked")) {
                  score4 = 0;
                } else if ($('#malnutrisi2').is(":checked")) {
                  score4 = 2;
                }
                sum = Number(score) + Number(score1) + Number(score2) + Number(score3) + Number(score4);
                // $('#score').val(sum);
                if (sum >= 2) {
                  $('#score1').html('<span class="text-danger"><strong>Pasien berisiko malnutrisi, konsul ke Ahli Gizi</strong></span>');
                }
              }

              function simpan() {
                id_pelayanan = $('#inPel').val();
                id_history = $('#inHis').val();
                no_rm = $('#inNoRM').val();
                nama = $('#inNama').val();
                tgl_lahir = $('#inTglLahir').val();
                jk = $('input[name="inJk"]:checked').val();
                tgl_masuk = $('#inTglMasuk').val();
                cara_bayar = $('#inCaraBayar').val();
                pRujuk = $('input[name="pRujuk"]:checked').val();
                nama_staff = $('#nama_staff').val();
                keluhan_utama = $('textarea[name="keluhan_utama"]').val() ?? "";
                alat_bantu = $('input[name="alat_bantu"]:checked').val() ?? "";
                risiko_jatuh = $('input[name="risiko_jatuh"]:checked').val() ?? "";
                var selected = $('input[name="cara_datang"]:checked').val() ?? "";
                var cara_datang = "";

                if (selected === "Rujukan") {
                  var asal = $('#asal_rujuk').val().trim();
                  cara_datang = asal !== "" ? "Rujukan : " + asal : "Rujukan";
                } else {
                  cara_datang = selected;
                }

                var kasus = [];
                $('input[name="kasus"]').each(function() {
                  if ($(this).is(":checked")) {
                    kasus.push($(this).val());
                  }
                });

                var kasus = "";
                var selected = $('input[name="kasus"]:checked').val() ?? "";

                // Jika Trauma
                if (selected === "Trauma") {
                  var ket = $('#keterangan_trauma').val().trim();
                  kasus = ket !== "" ? "Trauma: " + ket : "Trauma";
                } else {
                  kasus = selected;
                }

                // Default
                var status_hamil = "";
                var hamil_g = "";
                var hamil_p = "";
                var hamil_a = "";
                var hamil_minggu = "";

                // Jika kasus kebidanan dicentang
                if ($('#kasus_kebidanan').is(':checked')) {

                  status_hamil = $('input[name="status_hamil"]:checked').val();

                  if (status_hamil === "Hamil") {
                    hamil_g = $('#hamil_g').val();
                    hamil_p = $('#hamil_p').val();
                    hamil_a = $('#hamil_a').val();
                    hamil_minggu = $('#hamil_minggu').val();
                  }
                }

                gcs = $('#gcs').val();
                e = $('#e').val();
                m = $('#m').val();
                v = $('#v').val();

                if (pRujuk == "Ya") {
                  asal_rujuk = $('#inAsalRujuk').val();
                } else {
                  asal_rujuk = '-';
                }

                // gcs = $('#gcs').val();
                tekanan_darah = $('input[name="tekanan_darah"]').val();
                id = $('input[name="inId"]').val();
                suhu = $('input[name="suhu"]').val();
                frequensi_nadi = $('input[name="frequensi_nadi"]').val();
                spo2 = $('input[name="spo2"]').val();
                frequensi_nafas = $('input[name="frequensi_nafas"]').val();

                var kebutuhan_khusus = [];
                $('input[name="kebutuhan_khusus"]').each(function() {
                  if ($(this).is(":checked")) {
                    kebutuhan_khusus.push($(this).val());
                  }
                });
                kebutuhan_khusus = kebutuhan_khusus.toString();

                // airway = $('input[name="airway[]"]:checked').val();
                var airway = $('input[name="airway[]"]:checked')
                  .map(function() {
                    return this.value;
                  })
                  .get();
                var breathing = $('input[name="breathing[]"]:checked')
                  .map(function() {
                    return this.value;
                  })
                  .get();
                var cyrculation = $('input[name="cyrculation[]"]:checked')
                  .map(function() {
                    return this.value;
                  })
                  .get();
                var disability = $('input[name="disability[]"]:checked')
                  .map(function() {
                    return this.value;
                  })
                  .get();
                // breathing = $('input[name="breathing[]"]:checked').val();
                // cyrculation = $('input[name="cyrculation[]"]:checked').val();
                // disability = $('input[name="disability[]"]:checked').val();
                // kategori = $('input[name="kategori_triase"]:checked').val();
                var kategori = [];
                $('input[name="kategori_triase"]').each(function() {
                  if ($(this).is(":checked")) {
                    kategori.push($(this).val());
                  }
                });
                kategori = kategori.toString();

                skor_nyeri = $('#slide').val();
                skala_nyeri = skor_nyeri;

                verif = $("input[name='verifikasi_dokter']:checked").val();
                tgl_verif = $('#tgl_verif').val();
                nama_dokter = $('#nama_dokter').val();

                id_pel = "<?php echo urlencode(base64_encode($id_pelayanan)); ?>";
                id_his = "<?php echo urlencode(base64_encode($id_history)); ?>";

                dataString =
                  'id=' + id +
                  '&no_rm=' + no_rm +
                  '&nama=' + nama +
                  '&tgl_lahir=' + tgl_lahir +
                  '&id_pelayanan=' + id_pelayanan +
                  '&id_history=' + id_history +
                  '&jk=' + jk +
                  '&tgl_masuk=' + tgl_masuk +
                  '&gcs=' + gcs +
                  '&e=' + e +
                  '&m=' + m +
                  '&v=' + v +
                  '&cara_bayar=' + cara_bayar +
                  '&pRujuk=' + pRujuk +
                  '&asal_rujuk=' + asal_rujuk +
                  '&keluhan_utama=' + keluhan_utama +
                  '&tekanan_darah=' + tekanan_darah +
                  '&suhu=' + suhu +
                  '&frequensi_nadi=' + frequensi_nadi +
                  '&spo2=' + spo2 +
                  '&frequensi_nafas=' + frequensi_nafas +
                  '&airway=' + airway +
                  '&breathing=' + breathing +
                  '&cyrculation=' + cyrculation +
                  '&disability=' + disability +
                  '&cara_datang=' + cara_datang +
                  '&alat_bantu=' + alat_bantu +
                  '&kasus=' + kasus +
                  '&status_hamil=' + status_hamil +
                  '&hamil_g=' + hamil_g +
                  '&hamil_p=' + hamil_p +
                  '&hamil_a=' + hamil_a +
                  '&hamil_minggu=' + hamil_minggu +
                  '&kategori=' + kategori +
                  '&nama_staff=' + nama_staff +
                  '&skala_nyeri=' + skala_nyeri +
                  '&skor_nyeri=' + skor_nyeri +
                  '&verif=' + verif +
                  '&nama_dokter=' + nama_dokter +
                  '&tgl_verif=' + tgl_verif +
                  '&risiko_jatuh=' + risiko_jatuh;


                $.ajax({
                  url: "<?php echo base_url() ?>Erm_ases_triase_ugd/update_asses_triase_ugd",
                  method: "POST",
                  dataType: 'json',
                  data: dataString,
                  success: function(data) {
                    if (data.status == "success") {
                      window.location.href = "<?php echo base_url('Erm_igd/form/') ?>" + id_pel + '/' + id_his;
                    } else if (data.error) {
                      if (pRujuk == "" || pRujuk == null) {
                        $('#pRujuk_error').html("*wajib diisi");
                      }
                      if (data.tekanan_darah != '') {
                        $('#td_error').html(data.tekanan_darah);
                      } else {
                        $('#td_error').html('');
                      }
                      if (data.suhu != '') {
                        $('#suhu_error').html(data.suhu);
                      } else {
                        $('#suhu_error').html('');
                      }
                      if (data.spo2 != '') {
                        $('#nadi_error').html(data.spo2);
                      } else {
                        $('#nadi_error').html('');
                      }
                      if (data.frequensi_nadi != '') {
                        $('#spo2_error').html(data.frequensi_nadi);
                      } else {
                        $('#spo2_error').html('');
                      }
                      if (data.frequensi_nafas != '') {
                        $('#nafas_error').html(data.frequensi_nafas);
                      } else {
                        $('#nafas_error').html('');
                      }
                      if (data.cara_datang != '') {
                        $('#caraDatang_error').html(data.cara_datang);
                      } else {
                        $('#caraDatang_error').html('');
                      }
                      if (data.alat_bantu != '') {
                        $('#alatBantu_error').html(data.alat_bantu);
                      } else {
                        $('#alatBantu_error').html('');
                      }
                      if (data.kasus != '') {
                        $('#kasus_error').html(data.kasus);
                      } else {
                        $('#kasus_error').html('');
                      }
                      if (data.keluhan_utama != '') {
                        $('#td_error').html(data.keluhan_utama);
                      } else {
                        $('#td_error').html('');
                      }
                      if (data.risiko_jatuh != '') {
                        $('#risiko_jatuh_error').html(data.risiko_jatuh);
                      } else {
                        $('#risiko_jatuh_error').html('');
                      }
                      if (data.e != '') {
                        $('#e_error').html(data.e);
                      } else {
                        $('#e_error').html('');
                      }
                      if (data.m != '') {
                        $('#m_error').html(data.m);
                      } else {
                        $('#m_error').html('');
                      }
                      if (data.v != '') {
                        $('#v_error').html(data.v);
                      } else {
                        $('#v_error').html('');
                      }
                      if (data.nama_staff != '') {
                        $('#staff_error').html(data.nama_staff);
                      } else {
                        $('#staff_error').html('');
                      }
                      if (data.skala_nyeri != '') {
                        $('#skala_nyeri_error').html(data.skala_nyeri);
                      } else {
                        $('#skala_nyeri_error').html('');
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
                id = $('#inPel').val();
                window.open("<?php echo base_url('Erm_ases_triase_ugd/print_triase/') ?>" + id);
              }
            </script>
            <script>
              function verif(id) {
                swal({
                  title: "Warning?",
                  text: "Apakah kamu yakin memverifikasi data ini?",
                  type: "warning",
                  showCancelButton: true,
                  confirmButtonColor: "#3cb878",
                  confirmButtonText: "Yakin",
                  cancelButtonText: "Batal",
                  closeOnConfirm: false
                }, function() {
                  $().ready(function() {
                    $.ajax({
                      url: "<?php echo base_url() ?>Erm_ases_triase_ugd/verif_catatan",
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
                            text: "Data Berhasil diverifikasi",
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
              }
            </script>
            <script>
              // Ambil elemen input
              var inputE = document.getElementById('e');
              var inputM = document.getElementById('m');
              var inputV = document.getElementById('v');
              var inputGCS = document.getElementById('gcs');

              // Tambahkan event listener untuk menghitung nilai GCS
              inputE.addEventListener('input', calculateGCS);
              inputM.addEventListener('input', calculateGCS);
              inputV.addEventListener('input', calculateGCS);

              // Fungsi untuk menghitung nilai GCS
              function calculateGCS() {
                // Ambil nilai dari input E, M, dan V
                var eValue = parseInt(inputE.value) || 0;
                var mValue = parseInt(inputM.value) || 0;
                var vValue = parseInt(inputV.value) || 0;

                // Hitung nilai GCS
                var gcsValue = eValue + mValue + vValue;

                // Tampilkan nilai GCS pada input GCS
                inputGCS.value = gcsValue;
              }
            </script>

            <style>
              .triase-table {
                width: 100%;
                border-collapse: collapse;
                table-layout: fixed;
              }

              .triase-table th,
              .triase-table td {
                border: 1px solid #ddd;
                padding: 10px;
                vertical-align: top;
                text-align: left;
              }

              .triase-table th {
                background-color: #f5f5f5;
                font-weight: bold;
                text-align: center;
              }

              /* Ini untuk sel kategori di paling kiri (AIR WAY, BREATHING, dll.) */
              .triase-table .category-cell {
                background-color: #f9f9f9;
                font-weight: bold;
                width: 15%;
                color: #333;
                /* <-- 1. TAMBAHKAN INI (Warna teks hitam) */
              }

              /* Perbaikan nama class: 
       Ubah .radio-item menjadi .check-item agar sesuai dengan HTML Anda 
    */
              .check-item {
                display: block;
                margin-bottom: 8px;
              }

              /* Perbaikan selector: 
       Ubah input[type="radio"] menjadi input[type="checkbox"] 
    */
              .check-item input[type="checkbox"] {
                vertical-align: middle;
                margin-right: 5px;
              }

              .check-item label {
                vertical-align: middle;
              }

              /* CSS BARU UNTUK FOOTER KATEGORI */
              .triase-table tfoot td {
                font-weight: bold;
                vertical-align: middle;
                padding: 8px;
              }

              /* Sel "KATEGORI" di paling kiri */
              .triase-table tfoot .category-cell {
                text-align: left;
                background-color: #f9f9f9;
                font-weight: bold;
                color: #333;
                /* <-- 2. TAMBAHKAN INI (Warna teks hitam) */
              }

              /* Kotak label berwarna */
              .kategori-box {
                display: inline-block;
                padding: 10px 15px;
                color: white;
                border-radius: 4px;
                font-size: 12px;
                text-align: center;
                line-height: 1.4;
                font-weight: bold;
              }

              /* Warna-warna dari gambar */
              .cat-merah {
                background-color: #d9534f;
                color: white;
              }

              .cat-kuning {
                background-color: #f0ad4e;
                color: #333;
              }

              .cat-hijau {
                background-color: #5cb85c;
                color: white;
              }

              .cat-hitam {
                background-color: #333;
                color: white;
              }

              /* Mengatur posisi checkbox kategori */
              .triase-table tfoot .check-item {
                display: flex;
                align-items: center;
                justify-content: center;
              }

              .triase-table tfoot .check-item input[type="checkbox"] {
                margin-right: 10px;
                width: 20px;
                height: 20px;
              }
=======
<!-- Row -->
<div class="row">
  <div class="col-sm-12">
    <div class="panel panel-default card-view">
      <div class="panel-heading">
        <div class="pull-left">
          <h6 class="panel-title txt-dark">Assesment Triase UGD</h6>
        </div>
        <div class="clearfix"></div>
      </div>
      <div class="panel-wrapper collapse in">

        <div class="panel-body">
          <div class="form-wrap">
            <div class="form-group">
              <div class="col-md-3">
                <label class="control-label mb-10 text-left">No.RM<span class="help"></span></label>
                <input type="text" disabled class="form-control" value="<?= $no_rm ?>" id="inNoRM">
                <input type="hidden" class="form-control" value="<?= $id_pelayanan ?>" id="inPel">
                <input type="hidden" class="form-control" value="<?= $id_history ?>" id="inHis">
                <div class="has-success">
                  <?php if ($data) : ?>
                    <input type="hidden" id="inId" name="inId" value="<?php echo $data['id_triase_ugd']; ?>">
                  <?php else : ?>
                    <div class="alert alert-danger">ID Asesmen tidak ditemukan.</div>
                  <?php endif; ?>
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-3">
                <label class="control-label mb-10 text-left">Nama<span class="help"></span></label>
                <input type="text" disabled class="form-control" value="<?= $nama ?>" id="inNama">
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-3">
                <label class="control-label mb-10 text-left">Tgl Lahir / Umur<span class="help"></span></label>
                <input type="text" disabled class="form-control" value="<?= $tgl_lahir ?>" id="inTglLahir">
              </div>
            </div>

            <div class="form-group ">
              <div class="col-md-3">
                <label class="control-label mb-10 text-left">Jenis Kelamin</label>
                <input type="text" disabled class="form-control" value="<?= $jenis_kelamin ?>" id="inJk">
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-12">
                <h5 style="margin-top: 30px;"><strong>
                    <label class="control-label mb-10 text-left">
                      ASESMEN AWAL PASIEN IGD
                      <span class="help"></span>
                    </label></strong>
                </h5>
              </div>

              <div class="form-group">
                <div class="col-md-4">
                  <label class="control-label mb-10 text-left">Jam/ Tanggal Masuk <span class="help"></span></label>
                  <input type="text" id="inTglMasuk" disabled class="form-control" value="<?php
                                                                                          setlocale(LC_ALL, 'id_ID');

                                                                                          date_default_timezone_set('Asia/Jakarta');
                                                                                          $time = strtotime($tgl_masuk);
                                                                                          $date = strftime("%H:%M/ %d %B %Y ", $time);
                                                                                          echo $date ?>">
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-4">
                  <label class="control-label mb-10 text-left">Cara Bayar<span class="help"></span></label>
                  <input type="text" disabled class="form-control" id="inCaraBayar" value="<?= $cara_bayar ?>">
                </div>
              </div>


              <!-- <div class="form-group ">
                <div class="col-md-12">
                  <label class="control-label mb-10 text-left">Pasien Rujukan</label>
                  <span id="pRujuk_error" class="text-danger"></span>
                  <div class=" radio-button radio-button-primary">
                    <input id="pRujuk1" name="pRujuk" type="radio" value="Tidak">
                    <label class="control-label" for="pRujuk1">
                      Tidak
                    </label>
                  </div>
                  <div class="radio-button radio-button-primary">
                    <input id="pRujuk2" name="pRujuk" type="radio" value="Ya">
                    <label class="control-label" for="pRujuk2">
                      Ya
                    </label>
                  </div>
                </div>
              </div>

              <div class="form-group inAsalRujuk" style="display: none;">
                <div class="col-md-4">
                  <label class="control-label mb-10 text-left">Rujukan Dari<span class="help"></span></label>
                  <div class="has-success">
                    <input type="text" class="form-control" id="inAsalRujuk">
                  </div>

                </div>
              </div> -->

              <div class="form-group">
                <div class="col-md-4">
                  <label class="control-label mb-10 text-left">Cara Datang :</label>
                  <span id="caraDatang_error" class="text-danger">*</span>

                  <div class="radio-button radio-button-primary">
                    <input id="caraDatang_sendiri" type="radio" name="cara_datang" value="Sendiri">
                    <label class="control-label" for="caraDatang_sendiri">Sendiri</label>
                  </div>

                  <div class="radio-button radio-button-primary">
                    <input id="caraDatang_ambulan" type="radio" name="cara_datang" value="Ambulan">
                    <label class="control-label" for="caraDatang_ambulan">Ambulan</label>
                  </div>

                  <div class="radio-button radio-button-primary">
                    <input id="caraDatang_keluarga" type="radio" name="cara_datang" value="Diantar keluarga">
                    <label class="control-label" for="caraDatang_keluarga">Diantar Keluarga</label>
                  </div>

                  <div class="radio-button radio-button-primary">
                    <input id="caraDatang_polisi" type="radio" name="cara_datang" value="Diantar Polisi">
                    <label class="control-label" for="caraDatang_polisi">Diantar Polisi</label>
                  </div>

                  <div class="radio-button radio-button-primary">
                    <input id="caraDatang_rujukan" type="radio" name="cara_datang" value="Rujukan">
                    <label class="control-label" for="caraDatang_rujukan">Rujukan</label>

                    <div class="has-success">
                      <input type="text" class="form-control" id="asal_rujuk" name="asal_rujukan" style="display: none">
                      <span class="help-block"></span>
                    </div>
                  </div>
                  <script>
                    $('input[name="cara_datang"]').on('change', function() {
                      $('input[name="cara_datang"]').not(this).prop("checked", false);
                      if ($('#cd_rujukan').is(":checked")) {
                        $('#asal_rujuk').show();
                      } else {
                        $('#asal_rujuk').hide().val("");
                      }
                    });
                  </script>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-4">
                  <label class="control-label mb-10 text-left">Alat Bantu :</label>
                  <span id="alatBantu_error" class="text-danger">*</span>

                  <div class="radio-button radio-button-primary">
                    <input id="alatBantu_jalan" type="radio" name="alat_bantu" value="Jalan Kaki">
                    <label class="control-label" for="alatBantu_jalan">Jalan Kaki</label>
                  </div>

                  <div class="radio-button radio-button-primary">
                    <input id="alatBantu_brankard" type="radio" name="alat_bantu" value="Brankard">
                    <label class="control-label" for="alatBantu_brankard">Brankard</label>
                  </div>

                  <div class="radio-button radio-button-primary">
                    <input id="alatBantu_kursiRoda" type="radio" name="alat_bantu" value="Kursi Roda">
                    <label class="control-label" for="alatBantu_kursiRoda">Kursi Roda</label>
                  </div>

                  <div class="radio-button radio-button-primary">
                    <input id="alatBantu_tongkat" type="radio" name="alat_bantu" value="Tongkat/Walker">
                    <label class="control-label" for="alatBantu_tongkat">Tongkat/Walker</label>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-4">
                  <label class="control-label mb-10 text-left">Kasus :</label>
                  <span id="kasus_error" class="text-danger">*</span>

                  <!-- Non Trauma -->
                  <div class="check-item">
                    <input id="kasus_nonTrauma" type="checkbox" name="kasus" value="non_trauma">
                    <label class="control-label" for="kasus_nonTrauma">Non Trauma</label>
                  </div>

                  <!-- Trauma -->
                  <div class="check-item">
                    <input id="kasus_trauma" type="checkbox" name="kasus" value="Trauma">
                    <label class="control-label" for="kasus_trauma">Trauma</label>
                  </div>

                  <!-- Textbox Trauma -->
                  <div class="has-success">
                    <input type="text" class="form-control" id="keterangan_trauma" name="keterangan_trauma" style="display: none;">
                  </div>
                  <script>
                    $('input[name="kasus"]').on('change', function() {
                      // Uncheck semua checkbox lain
                      $('input[name="kasus"]').not(this).prop('checked', false);

                      // Tampilkan textbox jika Trauma
                      if ($('#kasus_trauma').is(':checked')) {
                        $('#keterangan_trauma').show();
                      } else {
                        $('#keterangan_trauma').hide().val('');
                      }
                    });
                  </script>

                  <!-- Kebidanan -->
                  <div class="check-item">
                    <input id="kasus_kebidanan" type="checkbox" name="kasus" value="Kebidanan">
                    <label class="control-label" for="kasus_kebidanan">Kebidanan :</label>
                  </div>

                  <!-- Pilihan Kebidanan -->
                  <div id="kebidanan_options_wrapper"
                    style="padding-left: 25px; margin-top: 10px; border-left: 2px solid #f0f0f0; display: none;">

                    <div class="radio-button radio-button-primary">
                      <input id="hamil_tidak" type="radio" name="status_hamil" value="Tidak Hamil">
                      <label class="control-label" for="hamil_tidak">Tidak Hamil</label>
                    </div>

                    <div class="radio-button radio-button-primary">
                      <input id="hamil_ya" type="radio" name="status_hamil" value="Hamil">
                      <label class="control-label" for="hamil_ya">Hamil</label>
                    </div>

                    <!-- Detail Hamil -->
                    <div id="hamil_detail_wrapper" style="margin-top: 10px;">
                      <div class="row">
                        <div class="col-md-3 col-xs-2" style="padding-right: 2px;">
                          <label class="control-label" for="hamil_g">G:</label>
                          <input type="number" class="form-control" name="hamil_g" id="hamil_g" placeholder="G">
                        </div>
                        <div class="col-md-3 col-xs-2" style="padding-left: 2px; padding-right: 5px;">
                          <label class="control-label" for="hamil_p">P:</label>
                          <input type="number" class="form-control" name="hamil_p" id="hamil_p" placeholder="P">
                        </div>
                        <div class="col-md-3 col-xs-2" style="padding-left: 2px; padding-right: 5px;">
                          <label class="control-label" for="hamil_a">A:</label>
                          <input type="number" class="form-control" name="hamil_a" id="hamil_a" placeholder="A">
                        </div>
                        <div class="col-md-3 col-xs-2" style="padding-left: 5px; padding-right: 5px;">
                          <label class="control-label" for="hamil_minggu">Hamil:</label>
                          <div class="input-group">
                            <input type="number" class="form-control" name="hamil_minggu" id="hamil_minggu">
                            <span class="input">Minggu</span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <script>
                      $(document).ready(function() {
                        // Jika kasus kebidanan dicentang
                        $('#kasus_kebidanan').change(function() {
                          if ($(this).is(':checked')) {
                            $('#kebidanan_options_wrapper').show();
                          } else {
                            $('#kebidanan_options_wrapper').hide();
                            $('input[name="status_hamil"]').prop('checked', false);
                            $('#hamil_detail_wrapper').hide();
                            $('#hamil_g, #hamil_p, #hamil_a, #hamil_minggu').val('');
                          }
                        });

                        // Jika memilih status hamil
                        $('input[name="status_hamil"]').change(function() {
                          if ($(this).val() === 'Hamil') {
                            $('#hamil_detail_wrapper').show();
                          } else {
                            $('#hamil_detail_wrapper').hide();
                            $('#hamil_g, #hamil_p, #hamil_a, #hamil_minggu').val('');
                          }
                        });
                      });
                    </script>
                  </div>
                </div>
              </div>



              <div class="form-group">
                <div class="col-md-12">
                  <h5 style="margin-top: 30px;"><strong>
                      <label class="control-label mb-10 text-left"><b>TANDA-TANDA VITAL</b><span class="help"></span></label></strong>
                  </h5>
                </div>

                <div class="form-group">
                  <div class="col-md-4">
                    <label class="control-label mb-10 text-left">Tekanan Darah<span class="help"></span></label>
                    <span id="td_error" class="text-danger">*</span>
                    <div class="has-success">
                      <input type="text" class="form-control" name="tekanan_darah" placeholder="mmHg">
                    </div>
                  </div>
                </div>


                <div class="form-group">
                  <div class="col-md-4">
                    <label class="control-label mb-10 text-left">Suhu<span class="help"></span></label>
                    <span id="suhu_error" class="text-danger">*</span>
                    <div class="has-success">
                      <input type="number" class="form-control" name="suhu" id="suhu" placeholder="Celsius" inputmode="decimal">
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-4">
                    <label class="control-label mb-10 text-left">Frequensi Nadi<span class="help"></span></label>
                    <span id="nadi_error" class="text-danger">*</span>
                    <div class="has-success">
                      <input type="text" class="form-control" name="frequensi_nadi" placeholder="x/menit">
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-4">
                    <label class="control-label mb-10 text-left">SPO2<span class="help"></span></label>
                    <span id="spo2_error" class="text-danger">*</span>
                    <div class="has-success">
                      <input type="number" class="form-control" name="spo2" placeholder="spo2">
                    </div>
                  </div>
                </div>

                <!-- <div class="form-group">
                  <div class="col-md-4">
                    <label class="control-label mb-10 text-left">Berat Badan<span class="help"></span></label>
                    <span id="berat_badan_error" class="text-danger">*</span>
                    <div class="has-success">
                      <input type="number" class="form-control" name="berat_badan" placeholder="Kg" disabled>
                    </div>
                  </div>
                </div> -->

                <div class="form-group">
                  <div class="col-md-4">
                    <label class="control-label mb-10 text-left">Frequensi Nafas<span class="help"></span></label>
                    <span id="nafas_error" class="text-danger">*</span>
                    <div class="has-success">
                      <input type="text" class="form-control" name="frequensi_nafas" placeholder="x/menit">
                    </div>
                  </div>
                </div>

                <!-- <div class="form-group">
                  <div class="col-md-4">
                    <label class="control-label mb-10 text-left">Tinggi Badan<span class="help"></span></label>
                    <span id="tinggi_badan_error" class="text-danger">*</span>
                    <div class="has-success">
                      <input type="number" class="form-control" name="tinggi_badan" placeholder="Cm" disabled>
                    </div>
                  </div>
                </div> -->

                <!-- <div class="form-group ">
                  <div class="col-md-6">
                    <label class="control-label mb-10 text-left">Kebutuhan Khusus</label>
                    <span id="kebutuhan_khusus_error" class="text-danger">*</span>
                    <div class="checkbox checkbox-success">
                      <input id="kebutuhan_khusus1" type="checkbox" name="kebutuhan_khusus" value="Tidak Ada">
                      <label class="control-label" for="kebutuhan_khusus1">
                        Tidak Ada
                      </label>
                    </div>
                    <div class="checkbox checkbox-success">
                      <input id="kebutuhan_khusus2" type="checkbox" name="kebutuhan_khusus" value="Alat Bantu Dengar">
                      <label class="control-label" for="kebutuhan_khusus2">
                        Alat Bantu Dengar
                      </label>
                    </div>
                    <div class="checkbox checkbox-success">
                      <input id="kebutuhan_khusus3" type="checkbox" name="kebutuhan_khusus" value="Kacamata">
                      <label class="control-label" for="kebutuhan_khusus3">
                        Kacamata
                      </label>
                    </div>

                    <div class="checkbox checkbox-success">
                      <input id="kebutuhan_khusus4" type="checkbox" name="kebutuhan_khusus" value="Tongkat">
                      <label class="control-label" for="kebutuhan_khusus4">
                        Tongkat
                      </label>
                    </div>

                    <div class="checkbox checkbox-success">
                      <input id="kebutuhan_khusus5" type="checkbox" name="kebutuhan_khusus" value="Gigi Palsu">
                      <label class="control-label" for="kebutuhan_khusus5">
                        Gigi Palsu
                      </label>
                    </div>
                  </div>
                </div> -->

                <div class="form-group">
                  <div class="col-md-8">
                    <label class="control-label mb-10 text-left">Keluhan Utama<span class="help"></span></label>
                    <span id="td_error" class="text-danger">*</span>
                    <div class="has-success">
                      <div class="has-success">
                        <textarea class="form-control" name="keluhan_utama" cols="30" rows="5"></textarea>
                      </div>
                      <!-- <input type="text" class="form-control" name="keluhan_utama"> -->
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-8">
                    <label class="control-label mb-10 text-left">Risiko Jatuh</label>
                    <span id="risiko_jatuh_error" class="text-danger">*</span>

                    <div class="radio-button radio-button-primary">
                      <input id="risikoJatuh_tidak" type="radio" name="risiko_jatuh" value="Tidak">
                      <label class="control-label" for="risikoJatuh_tidak">Tidak</label>
                    </div>

                    <div class="radio-button radio-button-primary">
                      <input id="risikoJatuh_ya" type="radio" name="risiko_jatuh" value="Ya">
                      <label class="control-label" for="risikoJatuh_ya">Ya</label>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-12">
                    <label class="control-label mb-10 text-left">Kesadaran :<span class="help"></span></label>
                  </div>
                  <!-- <div class="col-md-4">
                    <label class="control-label mb-10 text-left">GCS :<span class="help"></span></label>
                    <span id="gcs_error" class="text-danger">*</span>
                    <div class="has-success">
                      <input type="number" class="form-control" name="gcs" placeholder="">
                    </div>
                  </div>
                </div> -->
                  <div class="form-group">
                    <div class="col-md-4">
                      <label class="control-label mb-10 text-left">GCS :<span class="help"></span></label>
                      <span id="gcs_error" class="text-danger">*</span>
                      <div class="">
                        <input type="number" disabled class="form-control" name="gcs" id="gcs" placeholder="">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-4">
                        <label class="control-label mb-10 text-left">E :<span class="help"></span></label>
                        <span id="e_error" class="text-danger">*</span>
                        <div class="">
                          <input type="number" class="form-control" name="e" id="e" value="0">
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-4">
                        <label class="control-label mb-10 text-left">M :<span class="help"></span></label>
                        <span id="m_error" class="text-danger">*</span>
                        <div class=" ">
                          <input type="number" class="form-control" name="m" id="m" value="0">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                    </div>
                    <div class="form-group">
                      <div class="col-md-4">
                        <label class="control-label mb-10 text-left">V :<span class="help"></span></label>
                        <span id="v_error" class="text-danger">*</span>
                        <div class=" ">
                          <input type="number" class="form-control" name="v" id="v" value="0">
                        </div>
                      </div>
                    </div>

                    <!-- <div class="form-group ">
                  <div class="col-md-12">
                    <label class="control-label mb-10 text-left">MATA</label>
                    <span id="mata_error" class="text-danger"></span>
                    <div class="radio-button radio-button-primary">
                      <input id="mata1" type="radio" name="mata" value="Spontan">
                      <label class="control-label" for="mata1">
                        Spontan
                      </label>
                    </div>
                    <div class="radio-button radio-button-primary">
                      <input id="mata2" type="radio" name="mata" value="Perintah">
                      <label class="control-label" for="mata2">
                        Perintah
                      </label>
                    </div>
                    <div class="radio-button radio-button-primary">
                      <input id="mata3" type="radio" name="mata" value="Rangsang Nyeri">
                      <label class="control-label" for="mata3">
                        Rangsang Nyeri
                      </label>
                    </div>
                    <div class="radio-button radio-button-primary">
                      <input id="mata4" type="radio" name="mata" value="tidak ada respon">
                      <label class="control-label" for="mata4">
                        Tidak ada respon
                      </label>
                    </div>
                  </div>
                </div>


                <div class="form-group ">
                  <div class="col-md-3">
                    <label class="control-label mb-10 text-left">VERBAL</label>
                    <span id="verbal_error" class="text-danger"></span>
                    <div class="radio-button radio-button-primary">
                      <input id="verbal1" type="radio" name="verbal" value="Baik">
                      <label class="control-label" for="verbal1">
                        Baik
                      </label>
                    </div>
                    <div class="radio-button radio-button-primary">
                      <input id="verbal2" type="radio" name="verbal" value="Bingung">
                      <label class="control-label" for="verbal2">
                        Bingung
                      </label>
                    </div>
                    <div class="radio-button radio-button-primary">
                      <input id="verbal3" type="radio" name="verbal" value="Bicara tidak jelas">
                      <label class="control-label" for="verbal3">
                        Bicara tidak Jelas
                      </label>
                    </div>
                    <div class="radio-button radio-button-primary">
                      <input id="verbal4" type="radio" name="verbal" value="Menggerang">
                      <label class="control-label" for="verbal4">
                        Menggerang
                      </label>
                    </div>
                    <div class="radio-button radio-button-primary">
                      <input id="verbal5" type="radio" name="verbal" value="tidak ada respon">
                      <label class="control-label" for="verbal5">
                        Tidak ada respon
                      </label>
                    </div>
                  </div>
                </div>


                <div class="form-group ">
                  <div class="col-md-3">
                    <label class="control-label mb-10 text-left">MOTORIK</label>
                    <span id="motorik_error" class="text-danger"></span>
                    <div class="radio-button radio-button-primary">
                      <input id="motorik1" type="radio" name="motorik" value="Mengikuti perintah">
                      <label class="control-label" for="motorik1">
                        Mengikuti Perintah
                      </label>
                    </div>
                    <div class="radio-button radio-button-primary">
                      <input id="motorik2" type="radio" name="motorik" value="melokalisir nyeri">
                      <label class="control-label" for="motorik2">
                        Melokalisir Nyeri
                      </label>
                    </div>
                    <div class="radio-button radio-button-primary">
                      <input id="motorik3" type="radio" name="motorik" value="menjauhi rangsangan">
                      <label class="control-label" for="motorik3">
                        Menjauhi Rangsangan
                      </label>
                    </div>
                    <div class="radio-button radio-button-primary">
                      <input id="motorik4" type="radio" name="motorik" value="fleksi abnormal">
                      <label class="control-label" for="motorik4">
                        Fleksi abnormal
                      </label>
                    </div>
                    <div class="radio-button radio-button-primary">
                      <input id="motorik5" type="radio" name="motorik" value="Eksistensi abnormal">
                      <label class="control-label" for="motorik5">
                        Eksistensi abnormal
                      </label>
                    </div>
                    <div class="radio-button radio-button-primary">
                      <input id="motorik6" type="radio" name="motorik" value="tidak ada respon">
                      <label class="control-label" for="motorik6">
                        Tidak ada respon
                      </label>
                    </div>
                  </div> -->

                    <style>
                      label {
                        color: black !important;
                      }
                    </style>
                    <div class="form-group text-center" style="margin-top: 30px;">
                      <div class="col-md-12">
                        <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                      </div>
                    </div>
                    <div class="clearfix"></div>

                    <!-- Bagian Pemeriksaan-->
                    <!-- <div id="pemeriksaan">
                  <label>PEMERIKSAAN</label><br>
                  <input type="radio" name="pemeriksaan" value="segera" id="segera" onclick="tampilkanResutasi()">
                  <label for="segera">Segera</label><br>
                  <input type="radio" name="pemeriksaan" value="10menit" id="menit10" onclick="tampilkanEmergency()">
                  <label for="menit10">10 Menit</label><br>
                  <input type="radio" name="pemeriksaan" value="30menit" id="menit30" onclick="tampilkanUrgent()">
                  <label for="menit30">30 Menit</label><br>
                  <input type="radio" name="pemeriksaan" value="60menit" id="menit60" onclick="tampilkanTidakDarurat()">
                  <label for="menit60">60 Menit</label>
                </div> -->
                  <div class="form-group row">
                      <div class="col-md-7">
                        <h5 style="margin-top: 50px;">
                          <label class="control-label mb-10 text-left">
                            <b>Skala Nyeri</b> <span class="help"></span>
                          </label>
                        </h5>
                        <div class="slidecontainer">
                          <span id="val"><?= isset($data['skala_nyeri']) ? $data['skala_nyeri'] : 0; ?></span>
                          <input id="slide" name="skala_nyeri" type="range" min="0" max="10" 
                            value="<?= isset($data['skala_nyeri']) ? $data['skala_nyeri'] : 0; ?>" 
                            oninput="updateNyeri(event)" onchange="updateNyeri(event)" />
                          <span class="help-block"></span>
                          <div id="state">
                            <img src='<?= base_url() . 'assets/dist/img/tidak_nyeri.png'; ?>' width=7%>
                            <br>
                            <span style='color:black;'>Tidak Nyeri</span>
                          </div>
                        </div>
                      </div>
                    </div>

                    <table class="triase-table">
                      <tbody>
                        <tr>
                          <td class="category-cell">AIR WAY</td>
                          <td>
                            <div class="check-item">
                              <input type="checkbox" name="airway[]" value="sumbatan" id="aw_p1_total">
                              <label for="aw_p1_total">Sumbatan</label>
                            </div>
                            <div class="check-item">
                              <input type="checkbox" name="airway[]" value="ancaman sumbatan" id="aw_p1_sebagian">
                              <label for="aw_p1_sebagian">Ancaman Sumbatan</label>
                            </div>
                          </td>
                          <td>
                            <div class="check-item">
                              <input type="checkbox" name="airway[]" value="bebas1" id="aw_p2_bebas">
                              <label for="aw_p2_bebas">Bebas</label>
                            </div>
                          </td>
                          <td>
                            <div class="check-item">
                              <input type="checkbox" name="airway[]" value="bebas2" id="aw_p3_bebas">
                              <label for="aw_p3_bebas">Bebas</label>
                            </div>
                          </td>
                          <td>
                          </td>
                        </tr>

                        <tr>
                          <td class="category-cell">Pernapasan</td>
                          <td>
                            <div class="check-item">
                              <input type="checkbox" name="breathing[]" value="henti_nafas" id="br_p1_henti">
                              <label for="br_p1_henti">Henti Nafas</label>
                            </div>
                            <div class="check-item">
                              <input type="checkbox" name="breathing[]" value="rr_kurang_10" id="br_p1_rr_lt10">
                              <label for="br_p1_rr_lt10">Napas (&lt; 10x/mnt)</label>
                            </div>
                            <div class="check-item">
                              <input type="checkbox" name="breathing[]" value="rr_lebih_32" id="br_p1_rr_gt32">
                              <label for="br_p1_rr_gt32">Napas (&gt; 32x/mnt)</label>
                            </div>
                          </td>
                          <td>
                            <div class="check-item">
                              <input type="checkbox" name="breathing[]" value="rr_25_32" id="br_p2_takipneu">
                              <label for="br_p2_takipneu">Napas (25-32x/mnt)</label>
                            </div>
                            <div class="check-item">
                              <input type="checkbox" name="breathing[]" value="whezing" id="br_p2_whezing">
                              <label for="br_p2_whezing">Whezing / Meng'i</label>
                            </div>
                          </td>
                          <td>
                            <div class="check-item">
                              <input type="checkbox" name="breathing[]" value="normal" id="br_p3_normal">
                              <label for="br_p3_normal">Normal</label>
                            </div>
                            <div class="check-item">
                              <input type="checkbox" name="breathing[]" value="rr_10_24" id="br_p3_rr_10-24">
                              <label for="br_p3_rr_10-24">Napas (10-24x/mnt)</label>
                            </div>
                          </td>
                          <td>
                            <div class="check-item">
                              <input type="checkbox" name="breathing[]" value="henti_napas" id="br_p4_henti">
                              <label for="br_p4_henti">Henti Napas</label>
                            </div>
                          </td>
                        </tr>

                        <tr>
                          <td class="category-cell">Sirkulasi</td>
                          <td>
                            <div class="check-item">
                              <input type="checkbox" name="cyrculation[]" value="henti_jantung" id="cy_p1_henti">
                              <label for="cy_p1_henti">Henti Jantung</label>
                            </div>
                            <div class="check-item">
                              <input type="checkbox" name="cyrculation[]" value="nadi_lemah" id="cy_p1_lemah">
                              <label for="cy_p1_lemah">Nadi Lemah</label>
                            </div>
                            <div class="check-item">
                              <input type="checkbox" name="cyrculation[]" value="nadi_kurang_50" id="nadi_50m">
                              <label for="nadi_50m">Nadi (&lt; 50x/menit)</label>
                            </div>
                            <div class="check-item">
                              <input type="checkbox" name="cyrculation[]" value="nadi_lebih_120" id="nadi_120m">
                              <label for="nadi_120m">Nadi (&gt; 120x/menit)</label>
                            </div>
                            <div class="check-item">
                              <input type="checkbox" name="cyrculation[]" value="akral_dingin" id="akral_dingin">
                              <label for="akral_dingin">Akral Dingin</label>
                            </div>
                            <div class="check-item">
                              <input type="checkbox" name="cyrculation[]" value="crt_2" id="crt_2">
                              <label for="crt_2">CRT &gt; 2 Detik</label>
                            </div>
                            <div class="check-item">
                              <input type="checkbox" name="cyrculation[]" value="nyeri_dada" id="nyeri_dada">
                              <label for="nyeri_dada">Nyeri Dada (Iskemik)</label>
                            </div>
                          </td>
                          <td>
                            <div class="check-item">
                              <input type="checkbox" name="cyrculation[]" value="nadi_kuat1" id="nadi_kuat1">
                              <label for="nadi_kuat2">Nadi Kuat</label>
                            </div>
                            <div class="check-item">
                              <input type="checkbox" name="cyrculation[]" value="nadi_101_120" id="nadi_101">
                              <label for="nadi_101">Nadi (101-120x/mnt)</label>
                            </div>
                            <div class="check-item">
                              <input type="checkbox" name="cyrculation[]" value="nadi_51_59" id="nadi_51">
                              <label for="nadi_51">Nadi (51-59x/mnt)</label>
                            </div>
                            <div class="check-item">
                              <input type="checkbox" name="cyrculation[]" value="akral_hangat" id="akral_hangat">
                              <label for="akral_hangat">Akral Hangat</label>
                            </div>
                            <div class="check-item">
                              <input type="checkbox" name="cyrculation[]" value="crt_2d" id="crt_2d">
                              <label for="crt_2d">CRT &lt; 2 Detik</label>
                            </div>
                            <div class="check-item">
                              <input type="checkbox" name="cyrculation[]" value="sistol_lebih_160" id="sistol_160">
                              <label for="cy_p2_kuat">Sistol &gt; 160 mmHg</label>
                            </div>
                            <div class="check-item">
                              <input type="checkbox" name="cyrculation[]" value="diastol_lebih_100" id="diastol_100">
                              <label for="diastol_100">Diastol &gt; 100 mmHg</label>
                            </div>
                          </td>
                          <td>
                            <div class="check-item">
                              <input type="checkbox" name="cyrculation[]" value="nadi_kuat2" id="nadi_kuat2">
                              <label for="nadi_kuat3">Nadi Kuat</label>
                            </div>
                            <div class="check-item">
                              <input type="checkbox" name="cyrculation[]" value="nadi_60_100" id="nadi_60">
                              <label for="nadi_60">Nadi (60-100x/mnt)</label>
                            </div>
                            <div class="check-item">
                              <input type="checkbox" name="cyrculation[]" value="akral_hangat2" id="akral_hangat2">
                              <label for="akral_hangat2">Akral Hangat</label>
                            </div>
                            <div class="check-item">
                              <input type="checkbox" name="cyrculation[]" value="crt_2dd" id="crt_2dd">
                              <label for="crt_2dd">CRT &lt; 2 Detik</label>
                            </div>
                          </td>
                          <td>
                            <div class="check-item">
                              <input type="checkbox" name="cyrculation[]" value="hentijantung" id="cy_p4_henti">
                              <label for="cy_p4_henti">Henti Jantung</label>
                            </div>
                            <div class="check-item">
                              <input type="checkbox" name="cyrculation[]" value="ekg_asistol" id="ekg_asistol">
                              <label for="ekg_asistol">EKG Asistol</label>
                            </div>
                          </td>
                        </tr>

                        <tr>
                          <td class="category-cell">Kesadaran</td>
                          <td>
                            <div class="check-item">
                              <input type="checkbox" name="disability[]" value="gcs_kurang_12" id="di_p1_gcs_lt12">
                              <label for="di_p1_gcs_lt12">GCS &lt;12</label>
                            </div>
                            <div class="check-item">
                              <input type="checkbox" name="disability[]" value="kejang" id="di_p1_kejang">
                              <label for="di_p1_kejang">Kejang</label>
                            </div>
                            <div class="check-item">
                              <input type="checkbox" name="disability[]" value="gelisah" id="di_p1_gelisah">
                              <label for="di_p1_gelisah">Gelisah</label>
                            </div>
                          </td>
                          <td>
                            <div class="check-item">
                              <input type="checkbox" name="disability[]" value="gcs_lebih_12" id="di_p2_gcs_ge12">
                              <label for="di_p2_gcs_ge12">GCS &gt; 12</label>
                            </div>
                          </td>
                          <td>
                            <div class="check-item">
                              <input type="checkbox" name="disability[]" value="gcs_15" id="di_p3_gcs15">
                              <label for="di_p3_gcs15">GCS 15</label>
                            </div>
                          </td>
                          <td>
                            <div class="check-item">
                              <input type="checkbox" name="disability[]" value="gcs_3" id="di_p4_gcs3">
                              <label for="di_p4_gcs3">GCS 3</label>
                            </div>
                            <div class="check-item">
                              <input type="checkbox" name="disability[]" value="rc" id="di_p4_rc">
                              <label for="di_p4_rc">RC (-/-)</label>
                            </div>
                          </td>
                        </tr>
                      </tbody>

                      <tfoot>
                        <tr>
                          <td class="category-cell">KATEGORI</td>
                          <td>
                            <div class="check-item">
                              <input type="checkbox" name="kategori_triase" value="resusitasi" id="kat_merah">
                              <label for="kat_merah" class="kategori-box cat-merah">MERAH<br>RESUSITASI</label>
                            </div>
                          </td>
                          <td>
                            <div class="check-item">
                              <input type="checkbox" name="kategori_triase" value="urgent" id="kat_kuning">
                              <label for="kat_kuning" class="kategori-box cat-kuning">KUNING<br>URGENT</label>
                            </div>
                          </td>
                          <td>
                            <div class="check-item">
                              <input type="checkbox" name="kategori_triase" value="non_urgent" id="kat_hijau">
                              <label for="kat_hijau" class="kategori-box cat-hijau">HIJAU<br>NON URGENT</label>
                            </div>
                          </td>
                          <td>
                            <div class="check-item">
                              <input type="checkbox" name="kategori_triase" value="doa" id="kat_hitam">
                              <label for="kat_hitam" class="kategori-box cat-hitam">HITAM<br>DOA</label>
                            </div>
                          </td>
                        </tr>N
                      </tfoot>
                    </table>
                    <script>
                      $('input[name="kategori_triase[]"]').on('change', function() {
                        if ($(this).is(':checked')) {
                          $('input[name="kategori_triase[]"]').not(this).prop('checked', false);
                        }
                      });
                    </script>

                    <div class="form-group row">
                      <div class="col-md-3">
                        <label class="control-label mb-10 text-left">
                          Staff Pengisi Assesmen : <span class="help"></span>
                        </label>
                        <div class="has-success">
                          <select class="form-control select2" id="nama_staff" name="nama_staff" required>
                            <option>-</option>
                            <?php foreach ($staff as $s) : ?>
                              <option value="<?= $s->nama; ?>"><?= $s->nama; ?></option>
                            <?php endforeach; ?>
                          </select>
                          <span class="staff_error"></span>
                        </div>
                      </div>
                    </div>

                  
                    <div class="form-group row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label col-md-4 pt-5">Verifikasi Dokter :</label>
                          <div class="col-md-8">
                            <div class="radio-list">
                              <div class="radio-inline pl-0">
                                <span class="radio radio-info">
                                  <input type="radio" value="Tidak" name="verifikasi_dokter" id="verifikasi_dokter_tidak" checked>
                                  <label class="control-label" for="verifikasi_dokter_tidak">Tidak</label>
                                </span>
                              </div>
                              <div class="radio-inline pl-0">
                                <span class="radio radio-info">
                                  <input type="radio" value="Ya" name="verifikasi_dokter" id="verifikasi_dokter_ya">
                                  <label class="control-label" for="verifikasi_dokter_ya">Ya</label>
                                </span>
                              </div>
                              <span class="help-block"></span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="form-group row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="col-md-4 control-label pt-5">Status Verifikasi :</label>
                          <div class="col-md-8">
                            <div class="radio-list">
                              <div id="status">
                              </div>
                              <span class="help-block"></span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div id="detail_verifikasi" class="form-group row" style="display: none;">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label col-md-4 pt-5">Nama Dokter:</label>
                          <div class="col-md-8 has-success">
                            <select class="form-control filled-input select2" style="border: 1px solid lightgreen;" id="nama_dokter">
                              <option value="">-- Pilih Dokter --</option>
                              <?php foreach ($dokter as $row) : ?>
                                <option value="<?php echo $row['nama']; ?>">
                                  <?php echo $row['nama']; ?>
                                </option>
                              <?php endforeach; ?>
                            </select>
                            <span class="help-block"></span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <script>
                      $('input[name="verifikasi_dokter"]').change(function() {
                        if ($(this).val() === 'Ya' && $(this).prop('checked')) {
                          $("#detail_verifikasi").show();
                        } else {
                          $("#detail_verifikasi").hide(); // Jika radio button lain dipilih, sembunyikan kembali (opsional)
                        }
                      });
                    </script>


                    <script>
                      // Fungsi untuk menampilkan bagian Resutasi
                      function tampilkanResutasi() {
                        sembunyikanSemua();
                        document.getElementById("resutasi").style.display = "block";
                      }

                      // Fungsi untuk menampilkan bagian Emergency
                      function tampilkanEmergency() {
                        sembunyikanSemua();
                        document.getElementById("emergency").style.display = "block";
                      }

                      // Fungsi untuk menampilkan bagian Urgent
                      function tampilkanUrgent() {
                        sembunyikanSemua();
                        document.getElementById("urgent").style.display = "block";
                      }

                      // Fungsi untuk menampilkan bagian Tidak Darurat
                      function tampilkanTidakDarurat() {
                        sembunyikanSemua();
                        document.getElementById("tidak_darurat").style.display = "block";
                      }

                      // Fungsi untuk menyembunyikan semua bagian
                      function sembunyikanSemua() {
                        document.getElementById("resutasi").style.display = "none";
                        document.getElementById("emergency").style.display = "none";
                        document.getElementById("urgent").style.display = "none";
                        document.getElementById("tidak_darurat").style.display = "none";
                      }
                    </script>


                    <div class="form-group">
                      <div class="form-group text-center" style="margin-top: 30px;">
                        <div class="col-md-12">
                          <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                        </div>

                        <div class="col-md-6">
                          <a class="btn btn-default btn-anim  btn-sm" onclick="javascript:history.go(-1)" style="margin-right: 20px; margin-left: 30px;"><i class="fa fa-arrow-left"></i><span class="btn-text">KEMBALI</span></a>
                          <button class="btn btn-success mb-4" onclick="simpan()">Simpan</button>
                          <button class="btn btn-success mb-4" onclick="cetak()">Cetak</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <link rel="stylesheet" href="<?php echo base_url('assets/css/range-slide.css'); ?>">
            <script type="text/javascript">
              function displayValue(e) {
                var inp = e.target || this;
                if (!inp) return;
                var value = inp.value;
                var min = inp.min;
                var max = inp.max;
                var width = inp.offsetWidth || 100;
                var offset = -20;
                var percent = (value - min) / (max - min);
                var pos = percent * (width + offset) - 40;
                var span = document.getElementById('val');
                if (span) {
                  span.style.left = pos + 'px';
                  span.innerHTML = value;
                }
              }

              function updateNyeri(e) {
                if (!e || !e.target) return;
                displayValue(e);
                tampilStatus(e.target.value);
              }

              $(document).ready(function() {
                id_history = $('#inHis').val();
                $.ajax({
                  url: "<?php echo base_url() ?>Erm_ases_triase_ugd/get_ass_per",
                  method: "POST",
                  dataType: 'json',
                  data: {
                    id: id_history
                  },
                  success: function(data) {
                    $('#gcs').val(data.gcs);
                    $('#e').val(data.e);
                    $('#m').val(data.m);
                    $('#v').val(data.v);
                    $('textarea[name="keluhan_utama"]').val(data.keluhan_utama);
                    $(`input[name='cara_datang'][value='${data.cara_datang}']`).prop("checked", true);
                    $(`input[name='alat_bantu'][value='${data.alat_bantu}']`).prop("checked", true);
                    $(`input[name='risiko_jatuh'][value='${data.risiko_jatuh}']`).prop("checked", true);
                    $('input[name="tekanan_darah"]').val(data.tekanan_darah);
                    $('input[name="frequensi_nadi"]').val(data.frequensi_nadi);
                    $('input[name="suhu"]').val(data.suhu);
                    $('input[name="frequensi_nafas"]').val(data.frequensi_nafas);
                    $('input[name="spo2"]').val(data.spo2);
                    var usernameLogin = "<?= $username_login ?>"; 
                    var dokterVerifikator = data.dokter_verif;
                    if (data.verif === 'Belum') {
                      if (usernameLogin === dokterVerifikator) {
                        $('#status').html(`
            <button class='btn btn-primary' onclick='verif(${data.id_triase_ugd})'>
                <i class='icon-check'></i>
            </button>
        `);
                      } else {
                        $('#status').html("<span class='badge badge-warning'>Menunggu verifikasi</span>");
                      }
                    } else if (data.verif === 'Ya') {
                      $('#status').html("<span class='badge badge-success'>Terverifikasi</span>");
                    } else {
                      $('#status').html("<span class='badge badge-default'>Tidak memerlukan verifikasi</span>");
                    }
                    $('#slide').val(data.skor_nyeri);
                    $('#val').html(data.skor_nyeri);
                    updateNyeri({ target: $('#slide')[0] });

           
                    $('input[name="verifikasi_dokter"]').prop('disabled', true);
                    $('#nama_dokter').prop('disabled', true);
                    $('#nama_dokter').val(data.dokter_verif).change();
                    $('#nama_staff').val(data.nama_staff).change();
                    var airwayVals = data.airway.split(',');
                    airwayVals.forEach(val => {
                      $('input[name="airway[]"][value="' + val + '"]').prop('checked', true);
                    });
                    var breathingVals = data.breathing.split(',');
                    breathingVals.forEach(val => {
                      $('input[name="breathing[]"][value="' + val + '"]').prop('checked', true);
                    });
                    var cyrculationVals = data.cyrculation.split(',');
                    cyrculationVals.forEach(val => {
                      $('input[name="cyrculation[]"][value="' + val + '"]').prop('checked', true);
                    });
                    var disabilityVals = data.disability.split(',');
                    disabilityVals.forEach(val => {
                      $('input[name="disability[]"][value="' + val + '"]').prop('checked', true);
                    });
                    var kategoriVals = data.kategori.split(',');
                    kategoriVals.forEach(function(val) {
                      $(`input[name='kategori_triase'][value='${val.trim()}']`).prop('checked', true);
                    });
                    if (data.verif === 'Belum') {
                      $('input[name="verifikasi_dokter"][value="Ya"]').prop("checked", true).change();
                    } else {
                      $('input[name="verifikasi_dokter"][value="' + data.verif + '"]').prop("checked", true).change();
                    }
                    var rawKasus = data.kasus;
                    var mainKasus = rawKasus.split(":")[0].trim();
                    var tambahan = rawKasus.includes(":") ? rawKasus.split(":")[1].trim() : "";
                    $(`input[name='kasus'][value='${mainKasus}']`).prop("checked", true);
                    if (mainKasus === "Trauma") {
                      $('#keterangan_trauma').val(tambahan).show();
                    }
                    var rawDatang = data.cara_datang;
                    var mainDatang = rawDatang.split(":")[0].trim();
                    var tambah = rawDatang.includes(":") ? rawDatang.split(":")[1].trim() : "";
                    $(`input[name='cara_datang'][value='${mainDatang}']`).prop("checked", true);
                    if (mainDatang === "Rujukan") {
                      $('#asal_rujuk').val(tambah).show();
                    }
                    if (data.kasus.includes("Kebidanan")) {
                      $("#kasus_kebidanan").prop("checked", true);
                      $("#kebidanan_options_wrapper").show();
                      if (data.status_hamil === "Hamil") {
                        $("#hamil_ya").prop("checked", true);
                        $("#hamil_detail_wrapper").show();
                        $("#hamil_g").val(data.hamil_g);
                        $("#hamil_p").val(data.hamil_p);
                        $("#hamil_a").val(data.hamil_a);
                        $("#hamil_minggu").val(data.hamil_minggu);
                      } else {
                        $("#hamil_tidak").prop("checked", true);
                        $("#hamil_detail_wrapper").hide();
                      }
                    }
                  }
                });
              });
            </script>
            <script type="text/javascript">
              function tampilStatus(val) {
                if (val >= 0 && val < 1) {
                  $('#state').html("<img src='<?= base_url() . 'assets/dist/img/tidak_nyeri.png'; ?>' width=7%></img><br><span style='color:black;'>Tidak Nyeri</span>");
                } else if (val >= 1 && val < 3) {
                  $('#state').html("<img src='<?= base_url() . 'assets/dist/img/nyeri_ringan.png'; ?>' width=7%></img><br><span style='color:black;'>Nyeri Ringan</span>");
                } else if (val >= 3 && val < 5) {
                  $('#state').html("<img src='<?= base_url() . 'assets/dist/img/nyeri_sedang.png'; ?>' width=7%></img><br><span style='color:black;'>Nyeri Sedang</span>");
                } else if (val >= 5 && val < 7) {
                  $('#state').html("<img src='<?= base_url() . 'assets/dist/img/nyeri_sedang1.png'; ?>' width=7%></img><br><span style='color:black;'>Nyeri Sedang</span>");
                } else if (val >= 7 && val < 9) {
                  $('#state').html("<img src='<?= base_url() . 'assets/dist/img/nyeri_berat.png'; ?>' width=7%></img><br><span style='color:black;'>Nyeri Berat</span>");
                } else if (val >= 9 && val <= 10) {
                  $('#state').html("<img src='<?= base_url() . 'assets/dist/img/nyeri_sangat_berat.png'; ?>' width=7%></img><br><span style='color:black;'>Nyeri Sangat Berat</span>");
                }
              }

              $(function() {
                $("#frek_bab1").click(function() {
                  if ($(this).is(":checked")) {
                    $("#frek_bab").hide();
                  } else {
                    $("#frek_bab").show();
                  }
                });
                $("#kondisi_umum6").click(function() {
                  if ($(this).is(":checked")) {
                    $("#kondisi_umum").show();
                  } else {
                    $("#kondisi_umum").hide();
                  }
                });
                $("#info_dpjp1").click(function() {
                  if ($(this).is(":checked")) {
                    $("#info_dpjp").hide();
                  }
                });
                $("#info_dpjp2").click(function() {
                  if ($(this).is(":checked")) {
                    $("#info_dpjp").show();
                  }
                });
                $("#wajib_ibadah3").click(function() {
                  if ($(this).is(":checked")) {
                    $("#wajib_ibadah").show();
                  }
                });
                $("#wajib_ibadah2").click(function() {
                  if ($(this).is(":checked")) {
                    $("#wajib_ibadah").hide();
                  }
                });
                $("#wajib_ibadah1").click(function() {
                  if ($(this).is(":checked")) {
                    $("#wajib_ibadah").hide();
                  }
                });
                $("#faktor_nyeri5").click(function() {
                  if ($(this).is(":checked")) {
                    $("#faktor_nyeri").show();
                  } else {
                    $("#faktor_nyeri").hide();
                  }
                });
                $("#durasi3").click(function() {
                  if ($(this).is(":checked")) {
                    $("#durasi").show();
                  } else {
                    $("#durasi").hide();
                  }
                });
                $("#durasi2").click(function() {
                  if ($(this).is(":checked")) {
                    $("#durasi").hide();
                  }
                });
                $("#durasi1").click(function() {
                  if ($(this).is(":checked")) {
                    $("#durasi").hide();
                  }
                });
                $("#faktor_peringan4").click(function() {
                  if ($(this).is(":checked")) {
                    $("#faktor_peringan").show();
                  } else {
                    $("#faktor_peringan").hide();
                  }
                });
                $("#efek_nyeri6").click(function() {
                  if ($(this).is(":checked")) {
                    $("#efek_nyeri").show();
                  } else {
                    $("#efek_nyeri").hide();
                  }
                });
                $("#pRujuk2").click(function() {
                  if ($(this).is(":checked")) {
                    $(".inAsalRujuk").show();
                  } else {
                    $(".inAsalRujuk").hide();
                  }
                });
                $("#pRujuk1").click(function() {
                  if ($(this).is(":checked")) {
                    $(".inAsalRujuk").hide();
                  } else {
                    $(".inAsalRujuk").hide();
                  }
                });
              });
              $(document).ready(function() {
                var birth = new Date('<?= $tgl_lahir ?>');
                var check = new Date();
                var milliDay = 1000 * 60 * 60 * 24; // a day in milliseconds;
                var ageInDays = (check - birth) / milliDay;
                var years = Math.floor(ageInDays / 365);
                if (years > 15) {
                  $("#gizi_dewasa").show();
                  $("#gizi_anak").hide();
                } else {
                  $("#gizi_anak").show();
                  $("#gizi_dewasa").hide();
                  $('input[name="tekanan_darah"]').val(0);
                }
                // alert(years);

                var agama = '<?= $agama; ?>';
                if (agama == 'ISLAM') {
                  $("#spirit").show();
                } else {
                  $("#spirit").hide();
                }
              });

              function sumScore() {
                if ($('#penurunan_bb1').is(":checked")) {
                  score = 0;
                } else if ($('#penurunan_bb2').is(":checked")) {
                  score = 2;
                } else if ($('#penurunan_bb3').is(":checked")) {
                  score = 1;
                } else if ($('#penurunan_bb4').is(":checked")) {
                  score = 2;
                } else if ($('#penurunan_bb5').is(":checked")) {
                  score = 3;
                } else if ($('#penurunan_bb6').is(":checked")) {
                  score = 4;
                } else if ($('#penurunan_bb7').is(":checked")) {
                  score = 2;
                }
                if ($('#kurang_makan1').is(":checked")) {
                  score1 = 0;
                } else if ($('#kurang_makan2').is(":checked")) {
                  score1 = 1;
                }
                sum = Number(score) + Number(score1);
                // $('#score').val(sum);
                if (sum >= 2) {
                  $('#score').html('<span class="text-danger"><strong>Pasien berisiko malnutrisi, konsul ke Ahli Gizi</strong></span>');
                }

              }

              function sumScore1() {
                if ($('#kurus1').is(":checked")) {
                  score = 0;
                } else if ($('#kurus2').is(":checked")) {
                  score = 1;
                }
                if ($('#turun_bb1').is(":checked")) {
                  score1 = 0;
                } else if ($('#turun_bb2').is(":checked")) {
                  score1 = 1;
                }
                if ($('#diare1').is(":checked")) {
                  score2 = 0;
                } else if ($('#diare2').is(":checked")) {
                  score2 = 1;
                }
                if ($('#makan_kurang1').is(":checked")) {
                  score3 = 0;
                } else if ($('#makan_kurang2').is(":checked")) {
                  score3 = 1;
                }
                if ($('#malnutrisi1').is(":checked")) {
                  score4 = 0;
                } else if ($('#malnutrisi2').is(":checked")) {
                  score4 = 2;
                }
                sum = Number(score) + Number(score1) + Number(score2) + Number(score3) + Number(score4);
                // $('#score').val(sum);
                if (sum >= 2) {
                  $('#score1').html('<span class="text-danger"><strong>Pasien berisiko malnutrisi, konsul ke Ahli Gizi</strong></span>');
                }
              }

              function simpan() {
                id_pelayanan = $('#inPel').val();
                id_history = $('#inHis').val();
                no_rm = $('#inNoRM').val();
                nama = $('#inNama').val();
                tgl_lahir = $('#inTglLahir').val();
                jk = $('input[name="inJk"]:checked').val();
                tgl_masuk = $('#inTglMasuk').val();
                cara_bayar = $('#inCaraBayar').val();
                pRujuk = $('input[name="pRujuk"]:checked').val();
                nama_staff = $('#nama_staff').val();
                keluhan_utama = $('textarea[name="keluhan_utama"]').val() ?? "";
                alat_bantu = $('input[name="alat_bantu"]:checked').val() ?? "";
                risiko_jatuh = $('input[name="risiko_jatuh"]:checked').val() ?? "";
                var selected = $('input[name="cara_datang"]:checked').val() ?? "";
                var cara_datang = "";

                if (selected === "Rujukan") {
                  var asal = $('#asal_rujuk').val().trim();
                  cara_datang = asal !== "" ? "Rujukan : " + asal : "Rujukan";
                } else {
                  cara_datang = selected;
                }

                var kasus = [];
                $('input[name="kasus"]').each(function() {
                  if ($(this).is(":checked")) {
                    kasus.push($(this).val());
                  }
                });

                var kasus = "";
                var selected = $('input[name="kasus"]:checked').val() ?? "";

                // Jika Trauma
                if (selected === "Trauma") {
                  var ket = $('#keterangan_trauma').val().trim();
                  kasus = ket !== "" ? "Trauma: " + ket : "Trauma";
                } else {
                  kasus = selected;
                }

                // Default
                var status_hamil = "";
                var hamil_g = "";
                var hamil_p = "";
                var hamil_a = "";
                var hamil_minggu = "";

                // Jika kasus kebidanan dicentang
                if ($('#kasus_kebidanan').is(':checked')) {

                  status_hamil = $('input[name="status_hamil"]:checked').val();

                  if (status_hamil === "Hamil") {
                    hamil_g = $('#hamil_g').val();
                    hamil_p = $('#hamil_p').val();
                    hamil_a = $('#hamil_a').val();
                    hamil_minggu = $('#hamil_minggu').val();
                  }
                }

                gcs = $('#gcs').val();
                e = $('#e').val();
                m = $('#m').val();
                v = $('#v').val();

                if (pRujuk == "Ya") {
                  asal_rujuk = $('#inAsalRujuk').val();
                } else {
                  asal_rujuk = '-';
                }

                // gcs = $('#gcs').val();
                tekanan_darah = $('input[name="tekanan_darah"]').val();
                id = $('input[name="inId"]').val();
                suhu = $('input[name="suhu"]').val();
                frequensi_nadi = $('input[name="frequensi_nadi"]').val();
                spo2 = $('input[name="spo2"]').val();
                frequensi_nafas = $('input[name="frequensi_nafas"]').val();

                var kebutuhan_khusus = [];
                $('input[name="kebutuhan_khusus"]').each(function() {
                  if ($(this).is(":checked")) {
                    kebutuhan_khusus.push($(this).val());
                  }
                });
                kebutuhan_khusus = kebutuhan_khusus.toString();

                // airway = $('input[name="airway[]"]:checked').val();
                var airway = $('input[name="airway[]"]:checked')
                  .map(function() {
                    return this.value;
                  })
                  .get();
                var breathing = $('input[name="breathing[]"]:checked')
                  .map(function() {
                    return this.value;
                  })
                  .get();
                var cyrculation = $('input[name="cyrculation[]"]:checked')
                  .map(function() {
                    return this.value;
                  })
                  .get();
                var disability = $('input[name="disability[]"]:checked')
                  .map(function() {
                    return this.value;
                  })
                  .get();
                // breathing = $('input[name="breathing[]"]:checked').val();
                // cyrculation = $('input[name="cyrculation[]"]:checked').val();
                // disability = $('input[name="disability[]"]:checked').val();
                // kategori = $('input[name="kategori_triase"]:checked').val();
                var kategori = [];
                $('input[name="kategori_triase"]').each(function() {
                  if ($(this).is(":checked")) {
                    kategori.push($(this).val());
                  }
                });
                kategori = kategori.toString();

                skor_nyeri = $('#slide').val();
                skala_nyeri = skor_nyeri;

                verif = $("input[name='verifikasi_dokter']:checked").val();
                tgl_verif = $('#tgl_verif').val();
                nama_dokter = $('#nama_dokter').val();

                id_pel = "<?php echo urlencode(base64_encode($id_pelayanan)); ?>";
                id_his = "<?php echo urlencode(base64_encode($id_history)); ?>";

                dataString =
                  'id=' + id +
                  '&no_rm=' + no_rm +
                  '&nama=' + nama +
                  '&tgl_lahir=' + tgl_lahir +
                  '&id_pelayanan=' + id_pelayanan +
                  '&id_history=' + id_history +
                  '&jk=' + jk +
                  '&tgl_masuk=' + tgl_masuk +
                  '&gcs=' + gcs +
                  '&e=' + e +
                  '&m=' + m +
                  '&v=' + v +
                  '&cara_bayar=' + cara_bayar +
                  '&pRujuk=' + pRujuk +
                  '&asal_rujuk=' + asal_rujuk +
                  '&keluhan_utama=' + keluhan_utama +
                  '&tekanan_darah=' + tekanan_darah +
                  '&suhu=' + suhu +
                  '&frequensi_nadi=' + frequensi_nadi +
                  '&spo2=' + spo2 +
                  '&frequensi_nafas=' + frequensi_nafas +
                  '&airway=' + airway +
                  '&breathing=' + breathing +
                  '&cyrculation=' + cyrculation +
                  '&disability=' + disability +
                  '&cara_datang=' + cara_datang +
                  '&alat_bantu=' + alat_bantu +
                  '&kasus=' + kasus +
                  '&status_hamil=' + status_hamil +
                  '&hamil_g=' + hamil_g +
                  '&hamil_p=' + hamil_p +
                  '&hamil_a=' + hamil_a +
                  '&hamil_minggu=' + hamil_minggu +
                  '&kategori=' + kategori +
                  '&nama_staff=' + nama_staff +
                  '&skala_nyeri=' + skala_nyeri +
                  '&skor_nyeri=' + skor_nyeri +
                  '&verif=' + verif +
                  '&nama_dokter=' + nama_dokter +
                  '&tgl_verif=' + tgl_verif +
                  '&risiko_jatuh=' + risiko_jatuh;


                $.ajax({
                  url: "<?php echo base_url() ?>Erm_ases_triase_ugd/update_asses_triase_ugd",
                  method: "POST",
                  dataType: 'json',
                  data: dataString,
                  success: function(data) {
                    if (data.status == "success") {
                      window.location.href = "<?php echo base_url('Erm_igd/form/') ?>" + id_pel + '/' + id_his;
                    } else if (data.error) {
                      if (pRujuk == "" || pRujuk == null) {
                        $('#pRujuk_error').html("*wajib diisi");
                      }
                      if (data.tekanan_darah != '') {
                        $('#td_error').html(data.tekanan_darah);
                      } else {
                        $('#td_error').html('');
                      }
                      if (data.suhu != '') {
                        $('#suhu_error').html(data.suhu);
                      } else {
                        $('#suhu_error').html('');
                      }
                      if (data.spo2 != '') {
                        $('#nadi_error').html(data.spo2);
                      } else {
                        $('#nadi_error').html('');
                      }
                      if (data.frequensi_nadi != '') {
                        $('#spo2_error').html(data.frequensi_nadi);
                      } else {
                        $('#spo2_error').html('');
                      }
                      if (data.frequensi_nafas != '') {
                        $('#nafas_error').html(data.frequensi_nafas);
                      } else {
                        $('#nafas_error').html('');
                      }
                      if (data.cara_datang != '') {
                        $('#caraDatang_error').html(data.cara_datang);
                      } else {
                        $('#caraDatang_error').html('');
                      }
                      if (data.alat_bantu != '') {
                        $('#alatBantu_error').html(data.alat_bantu);
                      } else {
                        $('#alatBantu_error').html('');
                      }
                      if (data.kasus != '') {
                        $('#kasus_error').html(data.kasus);
                      } else {
                        $('#kasus_error').html('');
                      }
                      if (data.keluhan_utama != '') {
                        $('#td_error').html(data.keluhan_utama);
                      } else {
                        $('#td_error').html('');
                      }
                      if (data.risiko_jatuh != '') {
                        $('#risiko_jatuh_error').html(data.risiko_jatuh);
                      } else {
                        $('#risiko_jatuh_error').html('');
                      }
                      if (data.e != '') {
                        $('#e_error').html(data.e);
                      } else {
                        $('#e_error').html('');
                      }
                      if (data.m != '') {
                        $('#m_error').html(data.m);
                      } else {
                        $('#m_error').html('');
                      }
                      if (data.v != '') {
                        $('#v_error').html(data.v);
                      } else {
                        $('#v_error').html('');
                      }
                      if (data.nama_staff != '') {
                        $('#staff_error').html(data.nama_staff);
                      } else {
                        $('#staff_error').html('');
                      }
                      if (data.skala_nyeri != '') {
                        $('#skala_nyeri_error').html(data.skala_nyeri);
                      } else {
                        $('#skala_nyeri_error').html('');
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
                id = $('#inPel').val();
                window.open("<?php echo base_url('Erm_ases_triase_ugd/print_triase/') ?>" + id);
              }
            </script>
            <script>
              function verif(id) {
                swal({
                  title: "Warning?",
                  text: "Apakah kamu yakin memverifikasi data ini?",
                  type: "warning",
                  showCancelButton: true,
                  confirmButtonColor: "#3cb878",
                  confirmButtonText: "Yakin",
                  cancelButtonText: "Batal",
                  closeOnConfirm: false
                }, function() {
                  $().ready(function() {
                    $.ajax({
                      url: "<?php echo base_url() ?>Erm_ases_triase_ugd/verif_catatan",
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
                            text: "Data Berhasil diverifikasi",
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
              }
            </script>
            <script>
              // Ambil elemen input
              var inputE = document.getElementById('e');
              var inputM = document.getElementById('m');
              var inputV = document.getElementById('v');
              var inputGCS = document.getElementById('gcs');

              // Tambahkan event listener untuk menghitung nilai GCS
              inputE.addEventListener('input', calculateGCS);
              inputM.addEventListener('input', calculateGCS);
              inputV.addEventListener('input', calculateGCS);

              // Fungsi untuk menghitung nilai GCS
              function calculateGCS() {
                // Ambil nilai dari input E, M, dan V
                var eValue = parseInt(inputE.value) || 0;
                var mValue = parseInt(inputM.value) || 0;
                var vValue = parseInt(inputV.value) || 0;

                // Hitung nilai GCS
                var gcsValue = eValue + mValue + vValue;

                // Tampilkan nilai GCS pada input GCS
                inputGCS.value = gcsValue;
              }
            </script>

            <style>
              .triase-table {
                width: 100%;
                border-collapse: collapse;
                table-layout: fixed;
              }

              .triase-table th,
              .triase-table td {
                border: 1px solid #ddd;
                padding: 10px;
                vertical-align: top;
                text-align: left;
              }

              .triase-table th {
                background-color: #f5f5f5;
                font-weight: bold;
                text-align: center;
              }

              /* Ini untuk sel kategori di paling kiri (AIR WAY, BREATHING, dll.) */
              .triase-table .category-cell {
                background-color: #f9f9f9;
                font-weight: bold;
                width: 15%;
                color: #333;
                /* <-- 1. TAMBAHKAN INI (Warna teks hitam) */
              }

              /* Perbaikan nama class: 
       Ubah .radio-item menjadi .check-item agar sesuai dengan HTML Anda 
    */
              .check-item {
                display: block;
                margin-bottom: 8px;
              }

              /* Perbaikan selector: 
       Ubah input[type="radio"] menjadi input[type="checkbox"] 
    */
              .check-item input[type="checkbox"] {
                vertical-align: middle;
                margin-right: 5px;
              }

              .check-item label {
                vertical-align: middle;
              }

              /* CSS BARU UNTUK FOOTER KATEGORI */
              .triase-table tfoot td {
                font-weight: bold;
                vertical-align: middle;
                padding: 8px;
              }

              /* Sel "KATEGORI" di paling kiri */
              .triase-table tfoot .category-cell {
                text-align: left;
                background-color: #f9f9f9;
                font-weight: bold;
                color: #333;
                /* <-- 2. TAMBAHKAN INI (Warna teks hitam) */
              }

              /* Kotak label berwarna */
              .kategori-box {
                display: inline-block;
                padding: 10px 15px;
                color: white;
                border-radius: 4px;
                font-size: 12px;
                text-align: center;
                line-height: 1.4;
                font-weight: bold;
              }

              /* Warna-warna dari gambar */
              .cat-merah {
                background-color: #d9534f;
                color: white;
              }

              .cat-kuning {
                background-color: #f0ad4e;
                color: #333;
              }

              .cat-hijau {
                background-color: #5cb85c;
                color: white;
              }

              .cat-hitam {
                background-color: #333;
                color: white;
              }

              /* Mengatur posisi checkbox kategori */
              .triase-table tfoot .check-item {
                display: flex;
                align-items: center;
                justify-content: center;
              }

              .triase-table tfoot .check-item input[type="checkbox"] {
                margin-right: 10px;
                width: 20px;
                height: 20px;
              }
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
            </style>