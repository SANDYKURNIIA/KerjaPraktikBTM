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
                                                                                          $date = strftime(" %d %B %Y ", $time);
                                                                                          echo $date ?>">
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-4">
                  <label class="control-label mb-10 text-left">Cara Bayar<span class="help"></span></label>
                  <input type="text" disabled class="form-control" id="inCaraBayar" value="<?= $cara_bayar ?>">
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-4">
                  <label class="control-label mb-10 text-left">Keluhan Utama<span class="help"></span></label>
                  <span id="td_error" class="text-danger">*</span>
                  <div class="has-success">
                    <input type="text" disabled class="form-control" name="keluhan_utama">
                  </div>
                </div>
              </div>



              <!-- <div class="form-group ">
                <div class="col-md-12">
                  <label class="control-label mb-10 text-left">Pasien Rujukan</label>
                  <span id="pRujuk_error" class="text-danger">*</span>
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
                </div> -->

              <!-- <div class="form-group inAsalRujuk" style="display: none;">
                  <div class="col-md-4">
                    <label class="control-label mb-10 text-left">Rujukan Dari<span class="help"></span></label>
                    <div class="has-success">
                      <input type="text" class="form-control" id="inAsalRujuk">
                    </div>

                  </div>
                </div> -->


              <br>
              <br>
              <div class="form-group">
                <div class="col-md-12">
                  <h5 style="margin-top: 30px;"><strong>
                      <label class="control-label mb-10 text-left"><b>KEADAAN UMUM</b><span class="help"></span></label></strong>
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
                      <input type="number" class="form-control" name="suhu" placeholder="Celsius">
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
                      <input type="number" class="form-control" name="spo2" placeholder="">
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-4">
                    <label class="control-label mb-10 text-left">Berat Badan<span class="help"></span></label>
                    <span id="berat_badan_error" class="text-danger">*</span>
                    <div class="has-success">
                      <input type="number" class="form-control" name="berat_badan" placeholder="Kg">
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-4">
                    <label class="control-label mb-10 text-left">Frequensi Nafas<span class="help"></span></label>
                    <span id="nafas_error" class="text-danger">*</span>
                    <div class="has-success">
                      <input type="text" class="form-control" name="frequensi_nafas" placeholder="x/menit">
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-4">
                    <label class="control-label mb-10 text-left">Tinggi Badan<span class="help"></span></label>
                    <span id="tinggi_badan_error" class="text-danger">*</span>
                    <div class="has-success">
                      <input type="number" class="form-control" name="tinggi_badan" placeholder="Cm">
                    </div>
                  </div>
                </div>

                <div class="form-group ">
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
                </div>

                <div class="form-group">
                  <div class="col-md-12">
                    <label class="control-label mb-10 text-left">Kesadaran :<span class="help"></span></label>
                  </div>
                  <div class="col-md-4">
                    <label class="control-label mb-10 text-left">GCS :<span class="help"></span></label>
                    <span id="gcs_error" class="text-danger">*</span>
                    <div class="has-success">
                      <input type="number" class="form-control" name="GCS" id="gcs" placeholder="">
                    </div>
                  </div>
                </div>

                <div class="form-group ">
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
                  </div>

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
                  <div id="pemeriksaan">
                    <label>PEMERIKSAAN</label><br>
                    <input type="radio" name="pemeriksaan" value="segera" id="segera" onclick="tampilkanResutasi()">
                    <label for="segera">Segera</label><br>
                    <input type="radio" name="pemeriksaan" value="10menit" id="menit10" onclick="tampilkanEmergency()">
                    <label for="menit10">10 Menit</label><br>
                    <input type="radio" name="pemeriksaan" value="30menit" id="menit30" onclick="tampilkanUrgent()">
                    <label for="menit30">30 Menit</label><br>
                    <input type="radio" name="pemeriksaan" value="60menit" id="menit60" onclick="tampilkanTidakDarurat()">
                    <label for="menit60">60 Menit</label>
                  </div>

                  <!-- Bagian resutasi -->
                  <div id="resutasi" style="display: none; margin-top: 20px;">
                    <label>AIR WAY</label><br>
                    <input type="radio" name="resutasi" value="sumbatan_total" id="total">
                    <label for="total">Sumbatan total</label><br>
                    <input type="radio" name="resutasi" value="sumbatan_sebagian" id="sebagian">
                    <label for="sebagian">Sumbatan sebagian</label>

                    <!-- Bagian BREATHING-->
                    <div style="margin-top: 10px;">
                      <label>BREATHING</label><br>
                      <input type="radio" name="breathing" value="hentinafas" id="hentinafas">
                      <label for="hentinafas">Henti Nafas</label><br>
                      <input type="radio" name="breathing" value="RR < 10" id="rr">
                      <label for="rr">RR < 10</label>
                    </div>

                    <!-- Bagian CYRCULATION -->
                    <div style="margin-top: 10px;">
                      <label>CYRCULATION</label><br>
                      <input type="radio" name="cyrculation" value="hentijantung" id="hentijantung">
                      <label for="hentijantung">Henti Jantung</label><br>
                      <input type="radio" name="cyrculation" value="naditidaktersedia" id="naditidaktersedia">
                      <label for="naditidaktersedia">Nadi tidak tersedia</label><br>
                      <input type="radio" name="cyrculation" value="TD < 80" id="td">
                      <label for="td">TD < 80</label><br>
                          <input type="radio" name="cyrculation" value="pendarahanaktif" id="pendarahanaktif">
                          <label for="pendarahanaktif">Pendarahan aktif</label>
                    </div>

                    <!-- Bagian DISABILITY -->
                    <div style="margin-top: 10px;">
                      <label>DISABILITY</label><br>
                      <input type="radio" name="disability" value="GCS < 9" id="gcs">
                      <label for="gcs">GCS < 9</label>
                    </div>

                    <!-- Bagian EXPOSURE -->
                    <div style="margin-top: 10px;">
                      <label>EXPOSURE</label><br>
                      <input type="radio" name="exposure" value="kejangberkelanjutan" id="kejangberkelanjutan">
                      <label for="kejangberkelanjutan">Kejang berkelanjutan</label><br>
                      <input type="radio" name="exposure" value="Overdosis obat dengan hipoventilasi" id="oodehi">
                      <label for="oodehi">Overdosis obat dengan hipoventilasi</label><br>
                      <input type="radio" name="exposure" value="Cidera kepala dengan pupil anisokor" id="cidera">
                      <label for="cidera">Cidera kepala dengan pupil anisokor</label>
                    </div>
                  </div>
                </div>

                <!-- Bagian Emergency -->
                <div id="emergency" style="display: none; margin-top: 20px;">
                  <label>AIR WAY</label><br>
                  <input type="radio" name="emergency" value="risiko_gangguan" id="risiko">
                  <label for="risiko">Risiko gangguan Airway</label><br>
                  <input type="radio" name="emergency" value="distress_nafas" id="distress">
                  <label for="distress">Distress nafas berat</label>

                  <!-- Bagian BREATHING-->
                  <div style="margin-top: 10px;">
                    <label>BREATHING</label><br>
                    <input type="radio" name="breathing" value="takipneu" id="takipneu">
                    <label for="takipneu">Takipneu</label><br>
                    <input type="radio" name="breathing" value="Penggunaan otot bantu nafas" id="otot">
                    <label for="otot">Penggunaan otot bantu nafas</label>
                  </div>

                  <!-- Bagian CYRCULATION -->
                  <div style="margin-top: 10px;">
                    <label>CYRCULATION</label><br>
                    <input type="radio" name="cyrculation" value="Nadi tidak teraba" id="naditidakteraba">
                    <label for="naditidakteraba">Nadi tidak teraba / sangat halus(50)</label><br>
                    <input type="radio" name="cyrculation" value="hipotensi" id="hipo">
                    <label for="hipo">Hipotensi</label><br>
                    <input type="radio" name="cyrculation" value="Banyak kehilangan darah" id="darah">
                    <label for="darah">Banyak kehilangan darah</label>
                  </div>

                  <!-- Bagian DISABILITY -->
                  <div style="margin-top: 10px;">
                    <label>DISABILITY</label><br>
                    <input type="radio" name="disability" value="GCS < 13" id="gcs13">
                    <label for="gcs13">GCS < 13</label><br>
                        <input type="radio" name="disability" value="Nyeri berat" id="nyeri">
                        <label for="nyeri">Nyeri berat</label>
                  </div>

                  <!-- Bagian EXPOSURE -->
                  <div style="margin-top: 10px;">
                    <label>EXPOSURE</label><br>
                    <input type="radio" name="exposure" value="Nyeri dada tipikal" id="nyeridada">
                    <label for="nyeridada">Nyeri dada tipikal</label><br>
                    <input type="radio" name="exposure" value="Demam dengan letargi" id="demam">
                    <label for="demam">Demam dengan letargi</label><br>
                    <input type="radio" name="exposure" value="sepsis" id="sepsis">
                    <label for="sepsis">Sepsis</label><br>
                    <input type="radio" name="exposure" value="Defisit Neurologi" id="defisit">
                    <label for="defisit">Defisit Neurologi (Stroke Akut)</label><br>
                    <input type="radio" name="exposure" value="Mata terpecik" id="mataterpecik">
                    <label for="mataterpecik">Mata terpecik zat asam/basa</label><br>
                    <input type="radio" name="exposure" value="multiple trauma" id="multiple">
                    <label for="multiple">Multiple Trauma</label><br>
                    <input type="radio" name="exposure" value="Fraktur" id="fraktur">
                    <label for="fraktur">Fraktur mayor</label><br>
                    <input type="radio" name="exposure" value="tarsiotestis" id="tarsio">
                    <label for="tarsio">Tarsio testis</label><br>
                    <input type="radio" name="exposure" value="Psikiatri" id="pagg">
                    <label for="pagg">Psikiatri : agresif, gaduh, gelisah</label>
                  </div>
                </div>
              </div>

              <!-- Bagian Urgent -->
              <div id="urgent" style="display: none; margin-top: 20px;">
                <label>AIR WAY</label><br>
                <input type="radio" name="urgent" value="paten" id="urgent_paten">
                <label for="urgent_paten">Paten</label>

                <!-- Bagian BREATHING-->
                <div style="margin-top: 10px;">
                  <label>BREATHING</label><br>
                  <input type="radio" name="breathing" value="dysneu" id="dysneu">
                  <label for="dysneu">Dysneu</label>
                </div>

                <!-- Bagian CYRCULATION -->
                <div style="margin-top: 10px;">
                  <label>CYRCULATION</label><br>
                  <input type="radio" name="cyrculation" value="Hipertensi Berat" id="hipertensi">
                  <label for="hipertensi">Hipertensi berat</label><br>
                  <input type="radio" name="cyrculation" value="Soo2" id="Soo">
                  <label for="Soo">Soo2: 90-95%</label><br>
                  <input type="radio" name="cyrculation" value="tandadehidrasi" id="tandadehidrasi">
                  <label for="tandadehidrasi">Tanda dehidrasi</label><br>
                  <input type="radio" name="cyrculation" value="muntah menetap" id="muntah">
                  <label for="muntah">Muntah menetap</label>
                </div>

                <!-- Bagian DISABILITY -->
                <div style="margin-top: 10px;">
                  <label>DISABILITY</label><br>
                  <input type="radio" name="disability" value="GCS 14" id="gcs14">
                  <label for="gcs14">GCS 14-15</label><br>
                  <input type="radio" name="disability" value="Nyeri sedang" id="nyerisedang">
                  <label for="nyerisedang">Nyeri sedang</label>
                </div>

                <!-- Bagian EXPOSURE -->
                <div style="margin-top: 10px;">
                  <label>EXPOSURE</label><br>
                  <input type="radio" name="exposure" value="Post kejang" id="postke">
                  <label for="postke">Post kejang</label><br>
                  <input type="radio" name="exposure" value="krisis hipertensi" id="krisishiper">
                  <label for="krisishiper">Krisis Hipertensi</label><br>
                  <input type="radio" name="exposure" value="kehilangan darah sedang" id="kedase">
                  <label for="kedase">Kehilangan darah sedang</label><br>
                  <input type="radio" name="exposure" value="cedera kepala ringan" id="cederakepala">
                  <label for="cederakepala">Cedera kepala ringan</label><br>
                  <input type="radio" name="exposure" value="suspek sepsis" id="suspek">
                  <label for="suspek">Suspek Sepsis</label><br>
                  <input type="radio" name="exposure" value="nyeri dada non kardiak" id="nyeridada">
                  <label for="nyeridada">Nyeri dada non kardiak</label><br>
                  <input type="radio" name="exposure" value="Cedera ekstremitas" id="ekstremitas">
                  <label for="ekstremitas">Cedera ekstremitas</label><br>
                  <input type="radio" name="exposure" value="Psikiatri" id="psi">
                  <label for="psi">Psikiatri : risiko melukai diri sendiri, psikotik akut, cemas, berpotensial agresif</label>
                </div>
              </div>
            </div>

            <!-- Bagian Tidak Darurat -->
            <div id="tidak_darurat" style="display: none; margin-top: 20px;">
              <label>AIR WAY</label><br>
              <input type="radio" name="tidak_darurat" value="paten" id="td_paten">
              <label for="td_paten">Paten</label><br>
              <input type="radio" name="tidak_darurat" value="aspirasi" id="aspirasi">
              <label for="aspirasi">Aspirasi benda asing tanpa distres nafas</label><br>
              <input type="radio" name="tidak_darurat" value="kesulitan" id="kesulitan">
              <label for="kesulitan">Kesulitan menelan tanpa distres nafas</label>

              <!-- Bagian BREATHING-->
              <div style="margin-top: 10px;">
                <label>BREATHING</label><br>
                <input type="radio" name="breathing" value="Frekuensi nafas normal" id="frekuensi">
                <label for="frekuensi">Frekuensi nafas normal</label>
              </div>

              <!-- Bagian CYRCULATION -->
              <div style="margin-top: 10px;">
                <label>CYRCULATION</label><br>
                <input type="radio" name="cyrculation" value="Nadi normal" id="nadinormal">
                <label for="nadinormal">Nadi normal</label><br>
                <input type="radio" name="cyrculation" value="Muntah atau diare" id="muataudi">
                <label for="muataudi">Muntah atau diare tanpa dehiderasi</label>
              </div>

              <!-- Bagian DISABILITY -->
              <div style="margin-top: 10px;">
                <label>DISABILITY</label><br>
                <input type="radio" name="disability" value="GCS normal" id="gcsnormal">
                <label for="gcsnormal">GCS Normal</label><br>
                <input type="radio" name="disability" value="Nyeri ringan" id="nyeriringan">
                <label for="nyeriringan">Nyeri Ringan</label>
              </div>

              <!-- Bagian EXPOSURE -->
              <div style="margin-top: 10px;">
                <label>EXPOSURE</label><br>
                <input type="radio" name="exposure" value="luka abrasi" id="lukaabrasi">
                <label for="lukaabrasi">Luka abrasi tidak memerlukan jahitan</label><br>
                <input type="radio" name="exposure" value="kontrol ulang rawat luka" id="kontrolulang">
                <label for="kontrolulang">Kontrol ulang rawat luka</label><br>
                <input type="radio" name="exposure" value="imunisasi" id="imunisasi">
                <label for="imunisasi">Imunisasi</label><br>
                <input type="radio" name="exposure" value="Psikiatri" id="padega">
                <label for="padega">Psikiatri : Pasien dengan gangguan kronis dan klinis baik</label>
              </div>
            </div>
          </div>

          <div class="col-md-7">
            <h5 style="margin-top: 30px;"><strong>
                <label class="control-label mb-10 text-left"><b>Skala Nyeri <b /><span class="help"></span></label>
              </strong>
            </h5>
            <div class="slidecontainer">
              <span id="val"></span>
              <input id="slide" type="range" min="0" max="10" value="0" oninput="displayValue(event)" onchange="tampilStatus(this.value)" />
              <span class="help-block"></span>
              <div id="state"><img src='<?= base_url() . 'assets/dist/img/tidak_nyeri.png'; ?>' width=7%></img>
                <br>
                <span style='color:black;'>Tidak Nyeri</span>
              </div>
            </div>
          </div>

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

          <div class="col-md-6">
            <a class="btn btn-default btn-anim  btn-sm" onclick="javascript:history.go(-1)" style="margin-right: 20px; margin-left: 30px;"><i class="fa fa-arrow-left"></i><span class="btn-text">KEMBALI</span></a>
            <button type="submit" class="btn btn-success mb-4" onclick="simpan()">Simpan</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="<?= base_url(); ?>assets/dist/js/slider.js"></script>
<link rel="stylesheet" href="<?= base_url(); ?>assets/dist/css/range-slide.css">
<script type="text/javascript">
  function tampilStatus(val) {
    if (val >= 0 && val < 1) {
      $('#state').html("<img src='<?= base_url() . 'assets/dist/img/tidak_nyeri.png'; ?>'width=7%></img><br><span style='color:black;'>Tidak Nyeri</span>");
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
        $('input[name="keluhan_utama"]').val(data.keluhan);

      }

    });
  });
</script>

<script type="text/javascript">
  function tampilStatus(val) {
    if (val >= 0 && val < 1) {
      $('#state').html("<img src='<?= base_url() . 'assets/dist/img/tidak_nyeri.png'; ?>'width=7%></img><br><span style='color:black;'>Tidak Nyeri</span>");
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
    if (years > 18) {
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

  function tampilkanPertanyaan2() {
    var sutalRadio = document.getElementById('sutal1');
    var sebanRadio = document.getElementById('seban1');
    var pertanyaan6 = document.getElementById('pertanyaan6');

    if (sebanRadio.checked) {
      pertanyaan6.classList.remove('hidden');
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
    keluhan_utama = $('input[name="keluhan_utama"]').val();

    if (pRujuk == "Ya") {
      asal_rujuk = $('#inAsalRujuk').val();
    } else {
      asal_rujuk = '-';
    }

    gcs = $('#gcs').val();
    tekanan_darah = $('input[name="tekanan_darah"]').val();
    suhu = $('input[name="suhu"]').val();
    frequensi_nadi = $('input[name="frequensi_nadi"]').val();
    spo2 = $('input[name="spo2"]').val();
    berat_badan = $('input[name="berat_badan"]').val();
    frequensi_nafas = $('input[name="frequensi_nafas"]').val();
    tinggi_badan = $('input[name="tinggi_badan"]').val();

    var kebutuhan_khusus = [];
    $('input[name="kebutuhan_khusus"]').each(function() {
      if ($(this).is(":checked")) {
        kebutuhan_khusus.push($(this).val());
      }
    });
    kebutuhan_khusus = kebutuhan_khusus.toString();

    mata = $('input[name="mata"]:checked').val();
    verbal = $('input[name="verbal"]:checked').val();
    motorik = $('input[name="motorik"]:checked').val();
    pemeriksaan = $('input[name="pemeriksaan"]:checked').val();
    resutasi = $('input[name="resutasi"]:checked').val();
    breathing = $('input[name="breathing"]:checked').val();
    cyrculation = $('input[name="cyrculation"]:checked').val();
    disability = $('input[name="disability"]:checked').val();
    exposure = $('input[name="exposure"]:checked').val();
    emergency = $('input[name="emergency"]:checked').val();
    urgent = $('input[name="urgent"]:checked').val();
    tidak_darurat = $('input[name="tidak_darurat"]:checked').val();
    skor_nyeri = $('#slide').val();
    if (skor_nyeri >= 0 && skor_nyeri < 1) {
      skala_nyeri = 'Tidak Nyeri';
    } else if (skor_nyeri >= 1 && skor_nyeri < 3) {
      skala_nyeri = 'Ringan';
    } else if (skor_nyeri >= 3 && skor_nyeri < 5) {
      skala_nyeri = ' Sedang';
    } else if (skor_nyeri >= 5 && skor_nyeri < 7) {
      skala_nyeri = 'Sedang';
    } else if (skor_nyeri >= 7 && skor_nyeri < 9) {
      skala_nyeri = 'Berat';
    } else if (skor_nyeri >= 9 && skor_nyeri <= 10) {
      skala_nyeri = 'Sangat Berat';
    }


    id_pel = "<?php echo urlencode(base64_encode($id_pelayanan)); ?>";
    id_his = "<?php echo urlencode(base64_encode($id_history)); ?>";

    dataString = 'no_rm=' + no_rm +
      '&nama=' + nama +
      '&tgl_lahir=' + tgl_lahir +
      '&id_pelayanan=' + id_pelayanan +
      '&id_history=' + id_history +
      '&jk=' + jk +
      '&tgl_masuk=' + tgl_masuk +
      '&gcs=' + gcs +
      '&cara_bayar=' + cara_bayar +
      '&pRujuk=' + pRujuk +
      '&asal_rujuk=' + asal_rujuk +
      '&keluhan_utama=' + keluhan_utama +
      '&tekanan_darah=' + tekanan_darah +
      '&suhu=' + suhu +
      '&frequensi_nadi=' + frequensi_nadi +
      '&berat_badan=' + berat_badan +
      '&spo2=' + spo2 +
      '&frequensi_nafas=' + frequensi_nafas +
      '&tinggi_badan=' + tinggi_badan +
      '&kebutuhan_khusus=' + kebutuhan_khusus +
      '&mata=' + mata +
      '&verbal=' + verbal +
      '&motorik=' + motorik +
      '&pemeriksaan=' + pemeriksaan +
      '&resutasi=' + resutasi +
      '&breathing=' + breathing +
      '&cyrculation=' + cyrculation +
      '&disability=' + disability +
      '&exposure=' + exposure +
      '&emergency=' + emergency +
      '&urgent=' + urgent +
      '&tidak_darurat=' + tidak_darurat +
      '&skala_nyeri=' + skala_nyeri +
      '&skor_nyeri=' + skor_nyeri;

    $.ajax({
      url: "<?php echo base_url() ?>Erm_ases_triase_ugd/insert_asses_triase_ugd",
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
          if (data.gcs != '') {
            $('#gcs_error').html(data.gcs);
          } else {
            $('#gcs_error').html('');
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
          if (data.berat_badan != '') {
            $('#berat_badan_error').html(data.berat_badan);
          } else {
            $('#berat_badan_error').html('');
          }
          if (data.frequensi_nafas != '') {
            $('#nafas_error').html(data.frequensi_nafas);
          } else {
            $('#nafas_error').html('');
          }
          if (data.tinggi_badan != '') {
            $('#tinggi_badan_error').html(data.tinggi_badan);
          } else {
            $('#tinggi_badan_error').html('');
          }
          if (data.kebutuhan_khusus != '') {
            $('#kebutuhan_khusus_error').html(data.kebutuhan_khusus);
          } else {
            $('#kebutuhan_khusus_error').html('');
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
</script>