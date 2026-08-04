<!-- Row -->
<div class="row">
  <div class="col-sm-12">
    <div class="panel panel-default card-view">
      <div class="panel-heading">
        <div class="pull-left">
          <h6 class="panel-title txt-dark">Assesment Perawat IGD</h6>
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

              <div class="form-group ">
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
                </div>

                <div class="form-group inAsalRujuk" style="display: none;">
                  <div class="col-md-4">
                    <label class="control-label mb-10 text-left">Rujukan Dari<span class="help"></span></label>
                    <div class="has-success">
                      <input type="text" class="form-control" id="inAsalRujuk">
                    </div>

                  </div>
                </div>


                <br>
                <br>
                <div class="form-group">
                  <div class="col-md-12">
                    <h5 style="margin-top: 30px;"><strong>
                        <label class="control-label mb-10 text-left"><b>KEADAAN UMUM</b><span class="help"></span></label></strong>
                    </h5>
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

                    <div class="form-group ">
                      <div class="col-md-12">
                        <label class="control-label mb-10 text-left">Kondisi Umum</label>
                        <span id="kondisi_umum_error" class="text-danger">*</span>
                        <div class="checkbox checkbox-success">
                          <input id="kondisi_umum1" type="checkbox" name="kondisi_umum" value="Baik">
                          <label class="control-label" for="kondisi_umum1">
                            Baik
                          </label>
                        </div>
                        <div class="checkbox checkbox-success">
                          <input id="kondisi_umum2" type="checkbox" name="kondisi_umum" value="Tampak Sakit">
                          <label class="control-label" for="kondisi_umum2">
                            Tampak Sakit
                          </label>
                        </div>
                        <div class="checkbox checkbox-success">
                          <input id="kondisi_umum3" type="checkbox" name="kondisi_umum" value="Sesak">
                          <label class="control-label" for="kondisi_umum3">
                            Sesak
                          </label>
                        </div>

                        <div class="checkbox checkbox-success">
                          <input id="kondisi_umum4" type="checkbox" name="kondisi_umum" value="Pucat">
                          <label class="control-label" for="kondisi_umum4">
                            Pucat
                          </label>
                        </div>

                        <div class="checkbox checkbox-success">
                          <input id="kondisi_umum5" type="checkbox" name="kondisi_umum" value="Lemah">
                          <label class="control-label" for="kondisi_umum5">
                            Lemah
                          </label>
                        </div>

                        <div class="checkbox checkbox-success">
                          <input id="kondisi_umum6" type="checkbox" value="Lainnya">
                          <label class="control-label col-md-1" for="kondisi_umum6">
                            Lainnya:
                          </label>
                          <div class="col-md-5 has-success">
                            <input type="text" class="form-control" id="kondisi_umum" style="display: none">
                            <span class="help-block"></span>
                          </div>
                        </div>
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
                      <div class="form-group ">
                        <div class="col-md-6">
                          <label class="control-label mb-10 text-left">Assesment Triase</label>
                          <span id="asesment_triase_error" class="text-danger">*</span>
                          <div class="checkbox checkbox-success">
                            <input id="asesment_triase1" type="checkbox" name="asesment_triase" value="Merah">
                            <label class="control-label" for="asesment_triase1">
                              Merah
                            </label>
                          </div>
                          <div class="checkbox checkbox-success">
                            <input id="asesment_triase2" type="checkbox" name="asesment_triase" value="Kuning">
                            <label class="control-label" for="asesment_triase2">
                              Kuning
                            </label>
                          </div>
                          <div class="checkbox checkbox-success">
                            <input id="asesment_triase3" type="checkbox" name="asesment_triase" value="Hijau">
                            <label class="control-label" for="asesment_triase3">
                              Hijau
                            </label>
                          </div>

                          <div class="checkbox checkbox-success">
                            <input id="asesment_triase4" type="checkbox" name="asesment_triase" value="Hitam">
                            <label class="control-label" for="asesment_triase4">
                              Hitam
                            </label>
                          </div>
                        </div>
                      </div>


                      <!-- 
                              --bagian ASESMEN AWAL KEPERAWATAN/KEBIDANAN
                            -->
                      <div class="form-group" id="spirit" style="display: none;">
                        <div class="col-md-12">
                          <h5 style="margin-top: 30px;"><strong>
                              <label class="control-label mb-10 text-left"><b>ASESMEN AWAL KEPERAWATAN/KEBIDANAN<b /><span class="help"></span></label>
                            </strong>
                          </h5>
                        </div>

                        <div class="form-group">
                          <div class="col-md-12">
                            <label class="control-label mb-10 text-left">Pengkajian Spiritual :<span class="help"></span></label>
                          </div>

                          <div class="form-group">
                            <div class="col-md-12">
                              <label class="control-label mb-10 text-left">Kemampuan Beribadah<span class="help"></span></label>
                            </div>

                            <div class="form-group ">
                              <div class="col-md-3">
                                <label class="control-label mb-10 text-left">Wajib Ibadah</label>
                                <span id="ibadah_error" class="text-danger"></span>
                                <div class="radio-button radio-button-primary">
                                  <input id="wajib_ibadah1" type="radio" name="wajib_ibadah" value="Baligh">
                                  <label class="control-label" for="wajib_ibadah1">
                                    Baligh
                                  </label>
                                </div>
                                <div class="radio-button radio-button-primary">
                                  <input id="wajib_ibadah2" type="radio" name="wajib_ibadah" value="Belum Baligh">
                                  <label class="control-label" for="wajib_ibadah2">
                                    Belum Baligh
                                  </label>
                                </div>
                                <div class="radio-button radio-button-primary">
                                  <input id="wajib_ibadah3" type="radio" name="wajib_ibadah" value="Halangan Lainnya">
                                  <label class="control-label" for="wajib_ibadah3">
                                    Halangan Lainnya
                                  </label>
                                  <div class="has-success">
                                    <input type="text" class="form-control" id="wajib_ibadah" style="display: none">
                                    <span class="help-block"></span>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-3">
                              <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                            </div>
                            <div class="form-group ">
                              <div class="col-md-6">
                                <label class="control-label mb-10 text-left">Thaharoh</label>
                                <span id="thaharoh_error" class="text-danger"></span>
                                <div class="radio-button radio-button-primary">
                                  <input id="thaharah1" type="radio" name="thaharah" value="Berwudhu">
                                  <label class="control-label" for="thaharah1">
                                    Berwudhu
                                  </label>
                                </div>
                                <div class="radio-button radio-button-primary">
                                  <input id="thaharah2" type="radio" name="thaharah" value="Tayamum">
                                  <label class="control-label" for="thaharah2">
                                    Tayamum
                                  </label>
                                </div>
                              </div>
                            </div>
                            <div class="form-group ">
                              <div class="col-md-12">
                                <label class="control-label mb-10 text-left">Sholat</label>
                                <span id="sholat_error" class="text-danger"></span>
                                <div class="radio-button radio-button-primary">
                                  <input id="sholat1" type="radio" name="sholat" value="Berdiri">
                                  <label class="control-label" for="sholat1">
                                    Berdiri
                                  </label>
                                </div>
                                <div class="radio-button radio-button-primary">
                                  <input id="sholat2" type="radio" name="sholat" value="Duduk">
                                  <label class="control-label" for="sholat2">
                                    Duduk
                                  </label>
                                </div>
                                <div class="radio-button radio-button-primary">
                                  <input id="sholat3" type="radio" name="sholat" value="Berbaring">
                                  <label class="control-label" for="sholat3">
                                    Berbaring
                                  </label>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>


                      <!-- 
                              --bagian ASESMEN NYERI
                            -->
                      <div class="form-group">
                        <div class="col-md-12">
                          <h5 style="margin-top: 30px;"><strong>
                              <label class="control-label mb-10 text-left"><b>ASESMEN NYERI<b /><span class="help"></span></label>
                            </strong>
                          </h5>
                        </div>

                        <div class="form-group ">
                          <div class="col-md-6">
                            <label class="control-label mb-10 text-left">Faktor Pemberat Rasa Nyeri :</label>
                            <span id="faktor_nyeri_error" class="text-danger"></span>
                            <div class="checkbox checkbox-success">
                              <input id="faktor_nyerii" type="checkbox" name="faktor_nyeri" value="Tidak Ada">
                              <label class="control-label" for="faktor_nyerii">
                                Tidak Ada
                              </label>
                            </div>
                            <div class="checkbox checkbox-success">
                              <input id="faktor_nyeri1" type="checkbox" name="faktor_nyeri" value="Cahaya">
                              <label class="control-label" for="faktor_nyeri1">
                                Cahaya
                              </label>
                            </div>
                            <div class="checkbox checkbox-success">
                              <input id="faktor_nyeri2" type="checkbox" name="faktor_nyeri" value="Gelap">
                              <label class="control-label" for="faktor_nyeri2">
                                Gelap
                              </label>
                            </div>
                            <div class="checkbox checkbox-success">
                              <input id="faktor_nyeri3" type="checkbox" name="faktor_nyeri" value="Gerakan">
                              <label class="control-label" for="faktor_nyeri3">
                                Gerakan
                              </label>
                            </div>
                            <div class="checkbox checkbox-success">
                              <input id="faktor_nyeri4" type="checkbox" name="faktor_nyeri" value="Berbaring">
                              <label class="control-label" for="faktor_nyeri4">
                                Berbaring
                              </label>
                            </div>
                            <div class="checkbox checkbox-success">
                              <input id="faktor_nyeri5" type="checkbox" value="Lainnya">
                              <label class="control-label col-md-1" for="faktor_nyeri5">
                                Lainnya
                              </label>
                              <div class="col-md-5 has-success">
                                <input type="text" class="form-control" id="faktor_nyeri" style="display: none;">
                                <span class="help-block"></span>
                              </div>
                            </div>
                          </div>
                        </div>


                        <div class="form-group ">
                          <div class="col-md-6">
                            <label class="control-label mb-10 text-left">Kualitas Nyeri</label>
                            <span id="kualitas_nyeri_error" class="text-danger"></span>
                            <div class="checkbox checkbox-success">
                              <input id="kualitas_nyerii" type="checkbox" name="kualitas_nyeri" value="Tidak Ada">
                              <label class="control-label" for="kualitas_nyerii">
                                Tidak Ada
                              </label>
                            </div>
                            <div class="checkbox checkbox-success">
                              <input id="kualitas_nyeri1" type="checkbox" name="kualitas_nyeri" value="Tumpul">
                              <label class="control-label" for="kualitas_nyeri1">
                                Tumpul
                              </label>
                            </div>
                            <div class="checkbox checkbox-success">
                              <input id="kualitas_nyeri2" type="checkbox" name="kualitas_nyeri" value="Tajam">
                              <label class="control-label" for="kualitas_nyeri2">
                                Tajam
                              </label>
                            </div>
                            <div class="checkbox checkbox-success">
                              <input id="kualitas_nyeri3" type="checkbox" name="kualitas_nyeri" value="Ditusuk">
                              <label class="control-label" for="kualitas_nyeri3">
                                Ditusuk
                              </label>
                            </div>
                            <div class="checkbox checkbox-success">
                              <input id="kualitas_nyeri4" type="checkbox" name="kualitas_nyeri" value="Kram">
                              <label class="control-label" for="kualitas_nyeri4">
                                Kram
                              </label>
                            </div>
                            <div class="checkbox checkbox-success">
                              <input id="kualitas_nyeri5" type="checkbox" name="kualitas_nyeri" value="Terbakar">
                              <label class="control-label" for="kualitas_nyeri5">
                                Terbakar
                              </label>
                            </div>
                            <div class="checkbox checkbox-success">
                              <input id="kualitas_nyeri6" type="checkbox" name="kualitas_nyeri" value="Berdenyut">
                              <label class="control-label" for="kualitas_nyeri6">
                                Berdenyut
                              </label>
                            </div>
                          </div>
                        </div>

                        <div class="form-group ">
                          <div class="col-md-3">
                            <label class="control-label mb-10 text-left">Lokasi Nyeri :<span class="help"></span></label>
                            <span id="lokasi_nyeri_error" class="text-danger"></span>
                            <div class="has-success">
                              <input type="text" class="form-control" name="lokasi_nyeri">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                        </div>

                        <div class="col-md-12">
                          <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                        </div>
                        <div class="form-group ">
                          <div class="col-md-6">
                            <label class="control-label mb-10 text-left">Durasi :</label>
                            <span id="durasi_error" class="text-danger"></span>
                            <div class="radio-button radio-button-success">
                              <input id="durasi1" type="radio" name="durasi" value="Konsisten">
                              <label class="control-label" for="durasi1">
                                Konsisten
                              </label>
                            </div>
                            <div class="radio-button radio-button-success">
                              <input id="durasi2" type="radio" name="durasi" value="Intermiten">
                              <label class="control-label" for="durasi2">
                                Intermiten
                              </label>
                            </div>
                            <div class="radio-button radio-button-success">
                              <input id="durasi3" type="radio" name="durasi" value="Lainnya">
                              <label class="control-label col-mb-1 " for="durasi3">
                                Lain-lain:
                              </label>
                              <div class="col-mb-1 has-success">
                                <input type="text" class="form-control" id="durasi" style="display: none;">
                                <span class="help-block"></span>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="form-group ">
                          <div class="col-md-6">
                            <label class="control-label mb-10 text-left">Faktor Peringan :</label>
                            <span id="peringan_error" class="text-danger"></span>
                            <div class="checkbox checkbox-success">
                              <input id="faktor_peringann" type="checkbox" name="faktor_peringan" value="Tidak Ada">
                              <label class="control-label" for="faktor_peringann">
                                Tidak Ada
                              </label>
                            </div>
                            <div class="checkbox checkbox-success">
                              <input id="faktor_peringan1" type="checkbox" name="faktor_peringan" value="Kompress">
                              <label class="control-label" for="faktor_peringan1">
                                Kompress
                              </label>
                            </div>
                            <div class="checkbox checkbox-success">
                              <input id="faktor_peringan2" type="checkbox" name="faktor_peringan" value="Nafas Dalam">
                              <label class="control-label" for="faktor_peringan2">
                                Nafas Dalam
                              </label>
                            </div>
                            <div class="checkbox checkbox-success">
                              <input id="faktor_peringan3" type="checkbox" name="faktor_peringan" value="Istirahat">
                              <label class="control-label" for="faktor_peringan3">
                                Istirahat
                              </label>
                            </div>
                            <div class="checkbox checkbox-success">
                              <input id="faktor_peringan4" type="checkbox" value="Lainnya">
                              <label class="control-label col-md-1" for="faktor_peringan4">
                                Lainnya
                              </label>
                              <div class="col-md-5 has-success">
                                <input type="text" class="form-control" id="faktor_peringan" style="display: none;">
                                <span class="help-block"></span>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                        </div>
                        <div class="form-group ">
                          <div class="col-md-6">
                            <label class="control-label mb-10 text-left">Efek Nyeri :</label>
                            <span id="efek_nyeri_error" class="text-danger"></span>
                            <div class="checkbox checkbox-success">
                              <input id="efek_nyerii" type="checkbox" name="efek_nyeri" value="Tidak Ada">
                              <label class="control-label" for="efek_nyerii">
                                Tidak Ada
                              </label>
                            </div>
                            <div class="checkbox checkbox-success">
                              <input id="efek_nyeri1" type="checkbox" name="efek_nyeri" value="Mual / Muntah">
                              <label class="control-label" for="efek_nyeri1">
                                Mual / Muntah
                              </label>
                            </div>
                            <div class="checkbox checkbox-success">
                              <input id="efek_nyeri2" type="checkbox" name="efek_nyeri" value="Aktifitas Terganggu">
                              <label class="control-label" for="efek_nyeri2">
                                Aktifitas Terganggu
                              </label>
                            </div>
                            <div class="checkbox checkbox-success">
                              <input id="efek_nyeri3" type="checkbox" name="efek_nyeri" value="Nafsu Makan Berkurang">
                              <label class="control-label" for="efek_nyeri3">
                                Nafsu Makan Berkurang
                              </label>
                            </div>
                            <div class="checkbox checkbox-success">
                              <input id="efek_nyeri4" type="checkbox" name="efek_nyeri" value="Emosi">
                              <label class="control-label" for="efek_nyeri4">
                                Emosi
                              </label>
                            </div>
                            <div class="checkbox checkbox-success">
                              <input id="efek_nyeri5" type="checkbox" name="efek_nyeri" value="Gangguan Tidur">
                              <label class="control-label" for="efek_nyeri5">
                                Gangguan Tidur
                              </label>
                            </div>
                            <div class="checkbox checkbox-success">
                              <input id="efek_nyeri6" type="checkbox" name="efek_nyeri" value="Lainnya">
                              <label class="control-label col-md-1" for="efek_nyeri6">
                                Lainnya
                              </label>
                              <div class="col-md-5 has-success">
                                <input type="text" class="form-control" id="efek_nyeri" style="display: none;">
                                <span class="help-block"></span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>


                      <!-- 
                              --bagian SKRINING GIZI AWAL DEWASA  (Malnutrition Screening Tools)
                            -->
                      <div class="form-group" id="gizi_dewasa" style="display: none;">
                        <div class="col-md-12">
                          <h5 style="margin-top: 30px;"><strong>
                              <label class="control-label mb-10 text-left"><b>SKRINING GIZI AWAL DEWASA (Malnutrition Screening Tools)<b /><span class="help"></span></label>
                            </strong>
                          </h5>
                        </div>

                        <div class="form-group ">
                          <div class="col-md-8">
                            <label class="control-label mb-10 text-left">
                              1. Apakah pasien mengalami penurunan berat badan yang tidak direncanakan/tidak
                              diinginkan dalam 6 bulan terakhir?
                            </label>
                            <span id="penurunan_bb_error" class="text-danger"></span>
                            <div class="radio-button radio-button-primary">
                              <input id="penurunan_bb1" type="radio" name="penurunan_bb" value="Tidak" onchange="sumScore()">
                              <label class="control-label" for="penurunan_bb1">
                                Tidak
                              </label>
                            </div>
                            <div class="radio-button radio-button-primary">
                              <input id="penurunan_bb2" type="radio" name="penurunan_bb" value="Tidak yakin (ada tanda: baju menjadi longgar)" onchange="sumScore()">
                              <label class="control-label" for="penurunan_bb2">
                                Tidak yakin (ada tanda: baju menjadi longgar)
                              </label>
                            </div>

                            <div class="radio-button radio-button-primary">
                              <input id="penurunan_bb3" type="radio" name="penurunan_bb" value="Ya, ada penurunan BB sebanyak 1-5 kg" onchange="sumScore()">
                              <label class="control-label" for="penurunan_bb3">
                                Ada penurunan BB sebanyak 1 – 5 kg
                              </label>
                            </div>
                            <div class="radio-button radio-button-primary">
                              <input id="penurunan_bb4" type="radio" name="penurunan_bb" value="Ya, ada penurunan BB sebanyak 6-10 kg" onchange="sumScore()">
                              <label class="control-label" for="penurunan_bb4">
                                Ada penurunan BB sebanyak 6 – 10 kg
                              </label>
                            </div>
                            <div class="radio-button radio-button-primary">
                              <input id="penurunan_bb5" type="radio" name="penurunan_bb" value="Ya, ada penurunan BB sebanyak 11-15 kg" onchange="sumScore()">
                              <label class="control-label" for="penurunan_bb5">
                                Ada penurunan BB sebanyak 11 – 15 kg
                              </label>
                            </div>
                            <div class="radio-button radio-button-primary">
                              <input id="penurunan_bb6" type="radio" name="penurunan_bb" value="Ya, ada penurunan BB sebanyak >15 kg" onchange="sumScore()">
                              <label class="control-label" for="penurunan_bb6">
                                Ada penurunan BB sebanyak > 15 kg
                              </label>
                            </div>
                            <div class="radio-button radio-button-primary">
                              <input id="penurunan_bb7" type="radio" name="penurunan_bb" value="Tidak tahu berapa kg penurunannya" onchange="sumScore()">
                              <label class="control-label" for="penurunan_bb7">
                                Tidak tahu berapa kg penurunannya
                              </label>
                            </div>
                          </div>
                        </div>

                        <br>
                        <div class="form-group ">
                          <div class="col-md-8">
                            <label class="control-label mb-10 text-left">
                              2. Apakah asupan makan pasien berkurang karena penurunan nafsu makan/kesulitan
                              menerima makanan?
                            </label>
                            <span id="kurang_makan_error" class="text-danger"></span>
                            <div class="radio-button radio-button-primary">
                              <input id="kurang_makan1" type="radio" name="kurang_makan" value="Tidak" onchange="sumScore()">
                              <label class="control-label" for="kurang_makan1">
                                Tidak
                              </label>
                            </div>
                            <div class="radio-button radio-button-primary">
                              <input id="kurang_makan2" type="radio" name="kurang_makan" value="Ya" onchange="sumScore()">
                              <label class="control-label" for="kurang_makan2">
                                Ya
                              </label>
                            </div>
                          </div>
                          <div class="col-md-8" id="score">
                          </div>
                        </div>
                      </div>


                      <!-- 
                              --bagian ASESMEN GIZI AWAL ANAK
                            -->
                      <div class="form-group" id="gizi_anak" style="display: none;">
                        <div class="col-md-12">
                          <h5 style="margin-top: 30px;"><strong>
                              <label class="control-label mb-10 text-left"><b>ASESMEN GIZI AWAL ANAK<b /><span class="help"></span></label>
                            </strong>
                          </h5>
                        </div>


                        <div class="form-group ">
                          <div class="col-md-8">
                            <label class="control-label mb-10 text-left">
                              1. Apakah pasien tampak kurus:
                            </label>
                            <span id="kurus_error" class="text-danger"></span>
                            <div class="radio-button radio-button-primary">
                              <input id="kurus1" type="radio" name="kurus" value="Tidak" onchange="sumScore1()">
                              <label class="control-label" for="kurus1">
                                Tidak
                              </label>
                            </div>
                            <div class="radio-button radio-button-primary">
                              <input id="kurus2" type="radio" name="kurus" value="Ya" onchange="sumScore1()">
                              <label class="control-label" for="kurus2">
                                Ya
                              </label>
                            </div>
                          </div>
                        </div>

                        <div class="form-group ">
                          <div class="col-md-8">
                            <label class="control-label mb-10 text-left">
                              2. Apakah ada penurunan BB selama 1 bulan terakhir?
                              *untuk bayi Kurang dari 1 tahun BB tidak naik selama 3 bulan
                            </label>
                            <span id="turun_bb_error" class="text-danger"></span>
                            <div class="radio-button radio-button-primary">
                              <input id="turun_bb1" type="radio" name="turun_bb" value="Tidak" onchange="sumScore1()">
                              <label class="control-label" for="turun_bb1">
                                Tidak
                              </label>
                            </div>
                            <div class="radio-button radio-button-primary">
                              <input id="turun_bb2" type="radio" name="turun_bb" value="Ya" onchange="sumScore1()">
                              <label class="control-label" for="turun_bb2">
                                Ya
                              </label>
                            </div>
                          </div>
                        </div>

                        <div class="form-group ">
                          <div class="col-md-8">
                            <label class="control-label mb-10 text-left">
                              3. Apakah terdapat salah satu dari kondisi di bawah ini
                            </label>
                            <label class="control-label mb-10 text-left">
                              a. diare ≥ 5 kali/hari atau muntah >3 kali/hari dalam 1 minggu terakhir
                            </label>
                            <span id="diare_error" class="text-danger"></span>
                            <div class="radio-button radio-button-primary">
                              <input id="diare1" type="radio" name="diare" value="Tidak" onchange="sumScore1()">
                              <label class="control-label" for="diare1">
                                Tidak
                              </label>
                            </div>
                            <div class="radio-button radio-button-primary">
                              <input id="diare2" type="radio" name="diare" value="Ya" onchange="sumScore1()">
                              <label class="control-label" for="diare2">
                                Ya
                              </label>
                            </div>
                            <label class="control-label mb-10 text-left">
                              b. asupan makan berkurang selama 1 minggu terakhir
                            </label>
                            <span id="makan_kurang_error" class="text-danger"></span>
                            <div class="radio-button radio-button-primary">
                              <input id="makan_kurang1" type="radio" name="makan_kurang" value="Tidak" onchange="sumScore1()">
                              <label class="control-label" for="makan_kurang1">
                                Tidak
                              </label>
                            </div>
                            <div class="radio-button radio-button-primary">
                              <input id="makan_kurang2" type="radio" name="makan_kurang" value="Ya" onchange="sumScore1()">
                              <label class="control-label" for="makan_kurang2">
                                Ya
                              </label>
                            </div>
                          </div>
                        </div>

                        <div class="form-group ">
                          <div class="col-md-8">
                            <label class="control-label mb-10 text-left">
                              4. Apakah terdapat penyakit atau keadaan yang
                              mengakibatkan pasien beresiko malnutrisi?
                            </label>
                            <span id="malnutrisi_error" class="text-danger"></span>
                            <div class="radio-button radio-button-primary">
                              <input id="malnutrisi1" type="radio" name="malnutrisi" value="Tidak" onchange="sumScore1()">
                              <label class="control-label" for="malnutrisi1">
                                Tidak
                              </label>
                            </div>
                            <div class="radio-button radio-button-primary">
                              <input id="malnutrisi2" type="radio" name="malnutrisi" value="Ya" onchange="sumScore1()">
                              <label class="control-label" for="malnutrisi2">
                                Ya
                              </label>
                            </div>
                          </div>
                          <div class="col-md-8" id="score1">
                          </div>
                        </div>

                      </div>


                      <!-- 
                              --bagian Pengkajian Risiko Jatuh
                            -->
                      <div class="form-group">
                        <div class="col-md-12">
                          <h5 style="margin-top: 30px;"><strong>
                              <label class="control-label mb-10 text-left"><b>Pengkajian Risiko Jatuh<b /><span class="help"></span></label>
                            </strong>
                          </h5>
                        </div>



                        <div class="form-group ">
                          <div class="col-md-8">
                            <label class="control-label mb-10 text-left">
                              a. Apakah pernah jatuh dalam 3 bulan terakhir ?
                            </label>
                            <!-- <span id="penopang_error" class="text-danger"></span> -->
                            <div class="radio-button radio-button-primary">
                              <input id="jatuh3bln1" type="radio" name="jatuh3bln" value="Tidak" onchange="intervensi_risiko()">
                              <label class="control-label" for="jatuh3bln1">
                                Tidak
                              </label>
                            </div>
                            <div class="radio-button radio-button-primary">
                              <input id="jatuh3bln2" type="radio" name="jatuh3bln" value="Ya" onchange="intervensi_risiko()">
                              <label class="control-label" for="jatuh3bln2">
                                Ya
                              </label>
                            </div>
                          </div>
                        </div>
                        <div class="form-group ">
                          <div class="col-md-8">
                            <label class="control-label mb-10 text-left">
                              b. Apakah menggunakan alat bantu? (Alat bantu jalan, tongkat, dll)
                            </label>
                            <!-- <span id="penopang_error" class="text-danger"></span> -->
                            <div class="radio-button radio-button-primary">
                              <input id="alatbantu1" type="radio" name="alatbantu" value="Tidak" onchange="intervensi_risiko()">
                              <label class="control-label" for="alatbantu1">
                                Tidak
                              </label>
                            </div>
                            <div class="radio-button radio-button-primary">
                              <input id="alatbantu2" type="radio" name="alatbantu" value="Ya" onchange="intervensi_risiko()">
                              <label class="control-label" for="alatbantu2">
                                Ya
                              </label>
                            </div>
                          </div>
                        </div>
                        <div class="form-group ">
                          <div class="col-md-8">
                            <label class="control-label mb-10 text-left">
                              c. Apakah ada kesulitan berjalan ?
                            </label>
                            <!-- <span id="penopang_error" class="text-danger"></span> -->
                            <div class="radio-button radio-button-primary">
                              <input id="sulitjalan1" type="radio" name="sulitjalan" value="Tidak" onchange="intervensi_risiko()">
                              <label class="control-label" for="sulitjalan1">
                                Tidak
                              </label>
                            </div>
                            <div class="radio-button radio-button-primary">
                              <input id="sulitjalan2" type="radio" name="sulitjalan" value="Ya" onchange="intervensi_risiko()">
                              <label class="control-label" for="sulitjalan2">
                                Ya
                              </label>
                            </div>
                          </div>
                        </div>

                        <div class="form-group collapse" id="intervensi_form">
                          <div class="col-md-12">
                            <label class="control-label mb-10 text-left">
                              Intervensi Pasien Risiko Jatuh yang dilakukan:
                            </label>
                          </div>
                          <div class="col-md-8">
                            <div class="checkbox checkbox-primary">
                              <input id="intervensi_risiko1" type="checkbox" name="intervensi_risiko" value="Pasang pagar pengaman dan kunci roda tempat tidur">
                              <label class="control-label" for="intervensi_risiko1">
                                Pasang pagar pengaman dan kunci roda tempat tidur
                              </label>
                            </div>
                            <div class="checkbox checkbox-primary">
                              <input id="intervensi_risiko2" type="checkbox" name="intervensi_risiko" value="Edukasi Pencegahan Pasien Risiko Jatuh">
                              <label class="control-label" for="intervensi_risiko2">
                                Edukasi Pencegahan Pasien Risiko Jatuh
                              </label>
                            </div>
                            <div class="checkbox checkbox-primary">
                              <input id="intervensi_risiko3" type="checkbox" name="intervensi_risiko" value="Pasang Sign clip Fall Risk pada Gelang Identitas Pasien (Untuk Pasien Rawat Inap)">
                              <label class="control-label" for="intervensi_risiko3">
                                Pasang Sign clip Fall Risk pada Gelang Identitas Pasien (Untuk Pasien Rawat Inap)
                              </label>
                            </div>

                          </div>
                        </div>
                        <div class="col-md-12">
                          <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                        </div>

                      </div>
<!-- DEKUBITUS -->

                      <div class="form-group">
                        <div class="col-md-12">
                          <h5 style="margin-top: 30px;"><strong>
                              <label class="control-label mb-10 text-left"><b>Pengkajian Risiko Dekubitus<b /><span class="help"></span></label>
                            </strong>
                          </h5>
                        </div>



                        <div class="form-group ">
                          <div class="col-md-8">
                            <label class="control-label mb-10 text-left">
                              a. Apakah pasien menggunakan kursi roda atau membutuhkan bantuan ?
                            </label>
                            <!-- <span id="penopang_error" class="text-danger"></span> -->
                            <div class="radio-button radio-button-primary">
                              <input id="dekubitus_bantuan1" type="radio" name="dekubitus_bantuan" value="Tidak" onchange="risiko_dekubitus()">
                              <label class="control-label" for="dekubitus_bantuan1">
                                Tidak
                              </label>
                            </div>
                            <div class="radio-button radio-button-primary">
                              <input id="dekubitus_bantuan2" type="radio" name="dekubitus_bantuan" value="Ya" onchange="risiko_dekubitus()">
                              <label class="control-label" for="dekubitus_bantuan2">
                                Ya
                              </label>
                            </div>
                          </div>
                        </div>
                        <div class="form-group ">
                          <div class="col-md-8">
                            <label class="control-label mb-10 text-left">
                              b. Apakah ada Inkontinensia uri atau alvi ?
                            </label>
                            <!-- <span id="penopang_error" class="text-danger"></span> -->
                            <div class="radio-button radio-button-primary">
                              <input id="inkontinensia1" type="radio" name="inkontinensia" value="Tidak" onchange="risiko_dekubitus()">
                              <label class="control-label" for="inkontinensia1">
                                Tidak
                              </label>
                            </div>
                            <div class="radio-button radio-button-primary">
                              <input id="inkontinensia2" type="radio" name="inkontinensia" value="Ya" onchange="risiko_dekubitus()">
                              <label class="control-label" for="inkontinensia2">
                                Ya
                              </label>
                            </div>
                          </div>
                        </div>
                        <div class="form-group ">
                          <div class="col-md-8">
                            <label class="control-label mb-10 text-left">
                              c. Apakah ada riwayat dekubitus atau luka dekubitus ?
                            </label>
                            <!-- <span id="penopang_error" class="text-danger"></span> -->
                            <div class="radio-button radio-button-primary">
                              <input id="rwyt_dekubitus1" type="radio" name="rwyt_dekubitus" value="Tidak" onchange="risiko_dekubitus()">
                              <label class="control-label" for="rwyt_dekubitus1">
                                Tidak
                              </label>
                            </div>
                            <div class="radio-button radio-button-primary">
                              <input id="rwyt_dekubitus2" type="radio" name="rwyt_dekubitus" value="Ya" onchange="risiko_dekubitus()">
                              <label class="control-label" for="rwyt_dekubitus2">
                                Ya
                              </label>
                            </div>
                          </div>
                        </div>
                        <div class="form-group ">
                          <div class="col-md-8">
                            <label class="control-label mb-10 text-left">
                              d. Apakah pasien diatas 65 tahun ?
                            </label>
                            <!-- <span id="penopang_error" class="text-danger"></span> -->
                            <div class="radio-button radio-button-primary">
                              <input id="dekubitus_umur65_1" type="radio" name="dekubitus_umur65" value="Tidak" onchange="risiko_dekubitus()">
                              <label class="control-label" for="dekubitus_umur65_1">
                                Tidak
                              </label>
                            </div>
                            <div class="radio-button radio-button-primary">
                              <input id="dekubitus_umur65_2" type="radio" name="dekubitus_umur65" value="Ya" onchange="risiko_dekubitus()">
                              <label class="control-label" for="dekubitus_umur65_2">
                                Ya
                              </label>
                            </div>
                          </div>
                        </div>
                        <div class="form-group " id="dekubitus_anak" style="display: none;">
                          <div class="col-md-8">
                            <label class="control-label mb-10 text-left">
                              e. Apakah extremitas dan badan tidak sesuai dengan usia perkembangan ?
                            </label>
                            <!-- <span id="penopang_error" class="text-danger"></span> -->
                            <div class="radio-button radio-button-primary">
                              <input id="dekubitus_anak1" type="radio" name="dekubitus_anak" value="Tidak" onchange="risiko_dekubitus()">
                              <label class="control-label" for="dekubitus_anak1">
                                Tidak
                              </label>
                            </div>
                            <div class="radio-button radio-button-primary">
                              <input id="dekubitus_anak2" type="radio" name="dekubitus_anak" value="Ya" onchange="risiko_dekubitus()">
                              <label class="control-label" for="dekubitus_anak2">
                                Ya
                              </label>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-8" id="ket_dekubitus">
                        </div>
                        <div class="col-md-12">
                          <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                        </div>

                      </div>


                      <!-- 
                              --bagian Kebutuhan Eliminasi 
                            -->
                      <div class="form-group">
                        <div class="col-md-12">
                          <h5 style="margin-top: 30px;"><strong>
                              <label class="control-label mb-10 text-left"><b>Kebutuhan Eliminasi <b /><span class="help"></span></label>
                            </strong>
                          </h5>
                        </div>

                        <div class="form-group ">
                          <div class="col-md-3">
                            <label class="control-label mb-10 text-left">Frekuensi BAB </label>
                            <span id="frek_bab_error" class="text-danger">*</span>
                            <div class="has-success">
                              <input type="text" class="form-control" id="frek_bab" placeholder="x / hari">
                            </div>
                            <div class="checkbox checkbox-success">
                              <input id="frek_bab1" type="checkbox" name="frek_bab" value="Tidak dapat dikaji">
                              <label class="control-label" for="frek_bab1">
                                Tidak dapat dikaji
                              </label>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                        </div>
                        <div class="form-group ">
                          <div class="col-md-6">
                            <label class="control-label mb-10 text-left">Keluhan BAB </label>
                            <span id="keluhan_bab_error" class="text-danger">*</span>
                            <div class="checkbox checkbox-success">
                              <input id="keluhan_bab1" type="checkbox" name="keluhan_bab" value="Tidak Ada">
                              <label class="control-label" for="keluhan_bab1">
                                Tidak Ada
                              </label>
                            </div>
                            <div class="checkbox checkbox-success">
                              <input id="keluhan_bab2" type="checkbox" name="keluhan_bab" value="Pendarahan">
                              <label class="control-label" for="keluhan_bab2">
                                Pendarahan
                              </label>
                            </div>
                            <div class="checkbox checkbox-success">
                              <input id="keluhan_bab3" type="checkbox" name="keluhan_bab" value="Hemorroid">
                              <label class="control-label" for="keluhan_bab3">
                                Hemorroid
                              </label>
                            </div>
                            <div class="checkbox checkbox-success">
                              <input id="keluhan_bab4" type="checkbox" name="keluhan_bab" value="Konstipasi">
                              <label class="control-label" for="keluhan_bab4">
                                Konstipasi
                              </label>
                            </div>
                            <div class="checkbox checkbox-success">
                              <input id="keluhan_bab5" type="checkbox" name="keluhan_bab" value="Diare">
                              <label class="control-label" for="keluhan_bab5">
                                Diare
                              </label>
                            </div>
                          </div>
                        </div>
                        <div class="form-group ">
                          <div class="col-md-6">
                            <label class="control-label mb-10 text-left">Karakteristik Feces </label>
                            <span id="kara_feces_error" class="text-danger">*</span>
                            <div class="checkbox checkbox-success">
                              <input id="karakter_feces1" type="checkbox" name="karakter_feces" value="Padat">
                              <label class="control-label" for="karakter_feces1">
                                Padat
                              </label>
                            </div>
                            <div class="checkbox checkbox-success">
                              <input id="karakter_feces2" type="checkbox" name="karakter_feces" value="Lunak">
                              <label class="control-label" for="karakter_feces2">
                                Lunak
                              </label>
                            </div>
                            <div class="checkbox checkbox-success">
                              <input id="karakter_feces3" type="checkbox" name="karakter_feces" value="Cair">
                              <label class="control-label" for="karakter_feces3">
                                Cair
                              </label>
                            </div>
                          </div>
                          <div class="form-group ">
                            <div class="col-md-4">
                              <label class="control-label mb-10 text-left">Keluhan BAK </label>
                              <span id="keluhan_bak_error" class="text-danger">*</span>
                              <div class="radio-button radio-button-primary">
                                <input id="keluhan_bak1" type="radio" name="keluhan_bak" value="Tidak Ada Nyeri">
                                <label class="control-label" for="keluhan_bak1">
                                  Tidak Ada Nyeri
                                </label>
                              </div>
                              <div class="radio-button radio-button-primary">
                                <input id="keluhan_bak2" type="radio" name="keluhan_bak" value="Nyeri">
                                <label class="control-label" for="keluhan_bak2">
                                  Nyeri
                                </label>
                              </div>
                              <div class="radio-button radio-button-primary">
                                <input id="keluhan_bak1" type="radio" name="keluhan_bak" value="Pendarahan">
                                <label class="control-label" for="keluhan_bak1">
                                  Pendarahan
                                </label>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                          </div>
                          <div class="col-md-3">

                            <label class="control-label">
                              Feces
                            </label>
                            <span id="warna_feces_error" class="text-danger">*</span>
                            <div class="has-success">
                              <input type="text" class="form-control" id="warna_feces" value="Normal">
                              <span class="help-block"></span>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                        </div>
                        <div class="form-group ">
                          <div class="col-md-3">
                            <label class="control-label">
                              Frekuensi BAK
                            </label>
                            <span id="frek_bak_error" class="text-danger">*</span>
                            <div class="has-success">
                              <input type="text" class="form-control" id="frek_bak" placeholder="x / hari">
                            </div>
                          </div>
                          <div class="col-md-12">
                            <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                          </div>
                          <div class="col-md-6">
                            <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                          </div>
                          <div class="col-md-3">
                            <label class="control-label">
                              BAK
                            </label>
                            <span id="warna_bak_error" class="text-danger">*</span>
                            <div class=" has-success">
                              <input type="text" class="form-control" id="warna_bak" value="Normal">
                            </div>
                          </div>
                        </div>
                      </div>


                      <!-- 
                              --bagian Masalah Keperawatan / Kebidanan  
                            -->
                      <div class="form-group">
                        <div class="col-md-8">
                          <h5 style="margin-top: 30px;"><strong>
                              <label class="control-label mb-10 text-left"><b>Masalah Keperawatan / Kebidanan <b /><span class="help"></span></label>
                              <span id="masalah_error" class="text-danger">*</span>
                            </strong>
                          </h5>

                          <div class="row">
                            <div class="col-md-6">
                              <div class="checkbox checkbox-primary">
                                <input id="masalah_keperawatan1" type="checkbox" name="masalah_keperawatan" value="Penurunan kesadaran">
                                <label class="control-label" for="masalah_keperawatan1">
                                  Penurunan kesadaran
                                </label>
                              </div>
                              <div class="checkbox checkbox-primary">
                                <input id="masalah_keperawatan2" type="checkbox" name="masalah_keperawatan" value="Kejang">
                                <label class="control-label" for="masalah_keperawatan2">
                                  Kejang
                                </label>
                              </div>
                              <div class="checkbox checkbox-primary">
                                <input id="masalah_keperawatan3" type="checkbox" name="masalah_keperawatan" value="Ketidakefektifan/bersihan jalan nafas">
                                <label class="control-label" for="masalah_keperawatan3">
                                  Ketidakefektifan/bersihan jalan nafas
                                </label>
                              </div>
                              <div class="checkbox checkbox-primary">
                                <input id="masalah_keperawatan4" type="checkbox" name="masalah_keperawatan" value="Sesak">
                                <label class="control-label" for="masalah_keperawatan4">
                                  Sesak
                                </label>
                              </div>
                              <div class="checkbox checkbox-primary">
                                <input id="masalah_keperawatan5" type="checkbox" name="masalah_keperawatan" value="Nyeri">
                                <label class="control-label" for="masalah_keperawatan5">
                                  Nyeri
                                </label>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="checkbox checkbox-primary">
                                <input id="masalah_keperawatan6" type="checkbox" name="masalah_keperawatan" value="Gangguan hemodinamik">
                                <label class="control-label" for="masalah_keperawatan6">
                                  Gangguan Hemodinamik
                                </label>
                              </div>
                              <div class="checkbox checkbox-primary">
                                <input id="masalah_keperawatan8" type="checkbox" name="masalah_keperawatan" value="Gangguan Integritas Kulit">
                                <label class="control-label" for="masalah_keperawatan8">
                                  Gangguan Integritas Kulit
                                </label>
                              </div>
                              <div class="checkbox checkbox-primary">
                                <input id="masalah_keperawatan9" type="checkbox" name="masalah_keperawatan" value="Gangguan Keseimbangan cairan dan elektrolit">
                                <label class="control-label" for="masalah_keperawatan9">
                                  Gangguan Keseimbangan cairan dan elektrolit
                                </label>
                              </div>
                              <div class="checkbox checkbox-primary">
                                <input id="masalah_keperawatan10" type="checkbox" name="masalah_keperawatan" value="Peningkatan Suhu Tubuh">
                                <label class="control-label" for="masalah_keperawatan10">
                                  Peningkatan Suhu Tubuh
                                </label>
                              </div>
                              <div class="checkbox checkbox-primary">
                                <input id="masalah_keperawatan7" type="checkbox" name="masalah_keperawatan" value="Lainnya:">
                                <label class="control-label" for="masalah_keperawatan7">
                                  Lainnya
                                </label>
                                <div class="has-success">
                                  <input type="text" class="form-control" value="" id="masalah_keperawatan" style="display: none;">
                                </div>
                              </div>
                            </div>
                          </div>

                        </div>

                      </div>


                      <!-- 
                              --bagian Rencana Asuhan 
                            -->
                      <div class="form-group">
                        <div class="col-md-8">
                          <h5 style="margin-top: 30px;"><strong>
                              <label class="control-label mb-10 text-left"><b>Rencana Asuhan <b /><span class="help"></span></label>
                              <span id="rencana_error" class="text-danger">*</span>
                            </strong>
                          </h5>

                          <div class="has-success">
                            <textarea class="form-control" name="" id="rencana" cols="30" rows="5"></textarea>
                          </div>
                        </div>
                        <div class="col-md-7">
                          <h5 style="margin-top: 30px;"><strong>
                              <label class="control-label mb-10 text-left"><b>Skala Nyeri <b /><span class="help"></span></label>
                            </strong>
                          </h5>
                          <div class="slidecontainer">
                            <span id="val"></span>
                            <input id="slide" name="skala_nyeri" type="range" min="0" max="10" value="0" oninput="updateNyeri(event)" onchange="updateNyeri(event)" />
                            <span class="help-block"></span>
                            <div id="state"><img src='<?= base_url() . 'assets/dist/img/tidak_nyeri.png'; ?>' width=7%></img>
                              <br>
                              <span style='color:black;'>Tidak Nyeri</span>
                            </div>
                          </div>
                        </div>


                        <div class="form-group text-center" style="margin-top: 30px;">
                          <div class="col-md-12">
                            <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                          </div>

                          <div class="col-md-6">
                            <a class="btn btn-default btn-anim  btn-sm" onclick="javascript:history.go(-1)" style="margin-right: 20px; margin-left: 30px;"><i class="fa fa-arrow-left"></i><span class="btn-text">KEMBALI</span></a>
                            <button type="submit" class="btn btn-success mb-4" onclick="simpan()">Simpan</button>
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

  function displayValue(e) {
    if (e && e.target) {
      $('#val').html(e.target.value);
    }
  }

  function updateNyeri(e) {
    if (!e || !e.target) return;
    displayValue(e);
    tampilStatus(e.target.value);
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
    $("#masalah_keperawatan7").click(function() {
      if ($(this).is(":checked")) {
        $("#masalah_keperawatan").show();
      } else {
        $("#masalah_keperawatan").hide();
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
      $("#dekubitus_anak").hide();
    } else {
      $("#gizi_anak").show();
      $("#dekubitus_anak").show();
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
    if (pRujuk == "Ya") {
      asalRujuk = $('#inAsalRujuk').val();
    } else {
      asalRujuk = '-';
    }

    gcs = $('#gcs').val();


    var kondisi_umum = [];
    $('input[name="kondisi_umum"]').each(function() {
      if ($(this).is(":checked")) {
        kondisi_umum.push($(this).val());
      }
    });
    kondisi_umum = $('#kondisi_umum6').is(":checked") ? kondisi_umum.toString() + ', ' + $('#kondisi_umum').val() : kondisi_umum.toString();

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

    var asesment_triase = [];
    $('input[name="asesment_triase"]').each(function() {
      if ($(this).is(":checked")) {
        asesment_triase.push($(this).val());
      }
    });
    asesment_triase = asesment_triase.toString();

    var agama = '<?= $agama; ?>';
    if (agama == 'ISLAM') {
      wajib_ibadah = $('input[name="wajib_ibadah"]:checked').val();
      if (wajib_ibadah == "Halangan Lainnya") {
        wajib_ibadah = $('#wajib_ibadah').val();
      }
      thaharah = $('input[name="thaharah"]:checked').val();
      sholat = $('input[name="sholat"]:checked').val();
    } else {
      wajib_ibadah = 'non muslim';
      thaharah = 'non muslim';
      sholat = 'non muslim';
    }

    var faktor_nyeri = [];
    $('input[name="faktor_nyeri"]').each(function() {
      if ($(this).is(":checked")) {
        faktor_nyeri.push($(this).val());
      }
    });
    faktor_nyeri = $('#faktor_nyeri5').is(":checked") ? faktor_nyeri.toString() + ', ' + $('#faktor_nyeri').val() : faktor_nyeri.toString();


    var efek_nyeri = [];
    $('input[name="efek_nyeri"]').each(function() {
      if ($(this).is(":checked")) {
        efek_nyeri.push($(this).val());
      }
    });
    efek_nyeri = $('#efek_nyeri6').is(":checked") ? efek_nyeri.toString() + ', ' + $('#efek_nyeri').val() : efek_nyeri.toString();

    var kualitas_nyeri = [];
    $('input[name="kualitas_nyeri"]').each(function() {
      if ($(this).is(":checked")) {
        kualitas_nyeri.push($(this).val());
      }
    });
    kualitas_nyeri = kualitas_nyeri.toString();

    lokasi_nyeri = $('input[name="lokasi_nyeri"]').val();
    durasi = $('input[name="durasi"]:checked').val();
    if (durasi == "Lainnya") {
      durasi = $('#durasi').val();
    }


    var faktor_peringan = [];
    $('input[name="faktor_peringan"]').each(function() {
      if ($(this).is(":checked")) {
        faktor_peringan.push($(this).val());
      }
    });
    faktor_peringan = $('#faktor_peringan4').is(":checked") ? faktor_peringan.toString() + ', ' + $('#faktor_peringan').val() : faktor_peringan.toString();

    var birth = new Date('<?= $tgl_lahir ?>');
    var check = new Date();

    var milliDay = 1000 * 60 * 60 * 24; // a day in milliseconds;


    var ageInDays = (check - birth) / milliDay;

    var years = Math.floor(ageInDays / 365);
    if (years > 15) {
      kurus = '-';
      turun_bb = '-';
      diare = '-';
      makan_kurang = '-';
      malnutrisi = '-';
      penurunan_bb = $('input[name="penurunan_bb"]:checked').val();
      kurang_makan = $('input[name="kurang_makan"]:checked').val();
      dekubitus_anak = '';
    } else {
      penurunan_bb = '-';
      kurang_makan = '-';
      kurus = $('input[name="kurus"]:checked').val();
      turun_bb = $('input[name="turun_bb"]:checked').val();
      diare = $('input[name="diare"]:checked').val();
      makan_kurang = $('input[name="makan_kurang"]:checked').val();
      malnutrisi = $('input[name="malnutrisi"]:checked').val();
      dekubitus_anak = $('input[name="dekubitus_anak"]:checked').val();
    }

    // sempoyongan = $('input[name="sempoyongan"]:checked').val();
    // penopang = $('input[name="penopang"]:checked').val();
    // risiko = $('input[name="risiko"]:checked').val();

    if ($('#jatuh3bln2').is(":checked") || $('#alatbantu2').is(":checked") || $('#sulitjalan2').is(":checked")) {
      var intervensi_risiko = [];
      $('input[name="intervensi_risiko"]').each(function() {
        if ($(this).is(":checked")) {
          intervensi_risiko.push($(this).val());
        }
      });
      intervensi_risiko = intervensi_risiko.toString();
    } else {
      intervensi_risiko = "";
    }



    frek_bab = $('input[name="frek_bab"]:checked').val() ? 'Tidak dapat dikaji' : $('#frek_bab').val();

    var keluhan_bab = [];
    $('input[name="keluhan_bab"]').each(function() {
      if ($(this).is(":checked")) {
        keluhan_bab.push($(this).val());
      }
    });
    keluhan_bab = keluhan_bab.toString();

    var karakter_feces = [];
    $('input[name="karakter_feces"]').each(function() {
      if ($(this).is(":checked")) {
        karakter_feces.push($(this).val());
      }
    });
    karakter_feces = karakter_feces.toString();

    warna_feces = $('#warna_feces').val();
    frek_bak = $('#frek_bak').val();
    warna_bak = $('#warna_bak').val();
    keluhan_bak = $('input[name="keluhan_bak"]:checked').val();

    // masalah = $('#masalah').val();
    var masalah = [];
    $('input[name="masalah_keperawatan"]').each(function() {
      if ($(this).is(":checked")) {
        masalah.push($(this).val());
      }
    });
    masalah = $('#masalah_keperawatan7').is(":checked") ? masalah.toString() + '' + $('#masalah_keperawatan').val() : masalah.toString();

    rencana = $('#rencana').val();
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

    // dataString = 'no_rm=' + no_rm + '&nama=' + nama + '&tgl_lahir=' + tgl_lahir + '&id_pelayanan=' + id_pelayanan + '&id_history=' + id_history +
    //   '&jk=' + jk + '&tgl_masuk=' + tgl_masuk + '&gcs=' + gcs +
    //   '&cara_bayar=' + cara_bayar + '&pRujuk=' + pRujuk + '&asalRujuk=' + asalRujuk + '&kondisi_umum=' + kondisi_umum + '&tekanan_darah=' + tekanan_darah +
    //   '&suhu=' + suhu + '&frequensi_nadi=' + frequensi_nadi + '&berat_badan=' + berat_badan + '&spo2=' + spo2 + '&frequensi_nafas=' + frequensi_nafas +
    //   '&tinggi_badan=' + tinggi_badan + '&kebutuhan_khusus=' + kebutuhan_khusus + '&asesment_triase=' + asesment_triase + '&wajib_ibadah=' + wajib_ibadah +
    //   '&thaharah=' + thaharah + '&sholat=' + sholat + '&faktor_nyeri=' + faktor_nyeri + '&kualitas_nyeri=' + kualitas_nyeri +
    //   '&lokasi_nyeri=' + lokasi_nyeri + '&skala_nyeri=' + skala_nyeri + '&durasi=' + durasi + '&faktor_peringan=' + faktor_peringan + '&efek_nyeri=' + efek_nyeri +
    //   '&penurunan_bb=' + penurunan_bb + '&kurang_makan=' + kurang_makan + '&kurus=' + kurus + '&turun_bb=' + turun_bb + '&diare=' + diare + '&makan_kurang=' + makan_kurang +
    //   '&malnutrisi=' + malnutrisi + '&sempoyongan=' + sempoyongan + '&penopang=' + penopang + '&risiko=' + risiko + '&info_dpjp=' + info_dpjp + '&jam_info_dpjp=' + jam_info_dpjp +
    //   '&frek_bab=' + frek_bab + '&keluhan_bab=' + keluhan_bab + '&karakter_feces=' + karakter_feces +
    //   '&warna_feces=' + warna_feces + '&frek_bak=' + frek_bak + '&warna_bak=' + warna_bak + '&keluhan_bak=' + keluhan_bak + '&masalah=' + masalah + '&rencana=' + rencana + '&skor_nyeri=' + skor_nyeri;

    // alert(kurus);


    if (!pRujuk) {
        swal({
            title: "Peringatan!",
            text: "Harap isi apakah pasien rujukan atau tidak.",
            type: "warning",
            button: "OK",
        });
        return; 
    }

    if (!gcs || !kondisi_umum || !tekanan_darah || !suhu || !frequensi_nadi || !frequensi_nafas || !tinggi_badan || !asesment_triase || !kebutuhan_khusus || !spo2 || !berat_badan) {
        swal({
            title: "Peringatan!",
            text: "Harap lengkapi keadaan umum pasien.",
            type: "warning",
            button: "OK",
        });
        return; 
    }

     if (!faktor_nyeri || !efek_nyeri || !kualitas_nyeri || !lokasi_nyeri || !durasi || !faktor_peringan) {
        swal({
            title: "Peringatan!",
            text: "Harap lengkapi Assesmen Nyeri.",
            type: "warning",
            button: "OK",
        });
        return; 
    }


    if (!karakter_feces || !warna_feces || !frek_bak || !keluhan_bak || !warna_bak || !keluhan_bab || !frek_bab) {
        swal({
            title: "Peringatan!",
            text: "Harap lengkapi Kebutuhan Eliminasi",
            type: "warning",
            button: "OK",
        });
        return; 
    }

    if (!masalah) {
        swal({
            title: "Peringatan!",
            text: "Harap pilih masalah keperawatan / kebidanan pasien.",
            type: "warning",
            button: "OK",
        });
        return;
    }

     if (!rencana) {
        swal({
            title: "Peringatan!",
            text: "Harap isi rencana tindakan keperawatan.",
            type: "warning",
            button: "OK",
        });
        return; 
    }

    $.ajax({
      url: "<?php echo base_url() ?>Erm_ases_per_igd/insert_asses_perawat_igd",
      method: "POST",
      dataType: 'json',
      data: {
        no_rm: no_rm,
        nama: nama,
        tgl_lahir: tgl_lahir,
        id_pelayanan: id_pelayanan,
        id_history: id_history,
        jk: jk,
        tgl_masuk: tgl_masuk,
        gcs: gcs,
        cara_bayar: cara_bayar,
        pRujuk: pRujuk,
        asalRujuk: asalRujuk,
        kondisi_umum: kondisi_umum,
        tekanan_darah: tekanan_darah,
        suhu: suhu,
        frequensi_nadi: frequensi_nadi,
        berat_badan: berat_badan,
        spo2: spo2,
        frequensi_nafas: frequensi_nafas,
        tinggi_badan: tinggi_badan,
        kebutuhan_khusus: kebutuhan_khusus,
        asesment_triase: asesment_triase,
        wajib_ibadah: wajib_ibadah,
        thaharah: thaharah,
        sholat: sholat,
        faktor_nyeri: faktor_nyeri,
        kualitas_nyeri: kualitas_nyeri,
        lokasi_nyeri: lokasi_nyeri,
        skala_nyeri: skala_nyeri,
        durasi: durasi,
        faktor_peringan: faktor_peringan,
        efek_nyeri: efek_nyeri,
        penurunan_bb: penurunan_bb,
        kurang_makan: kurang_makan,
        kurus: kurus,
        turun_bb: turun_bb,
        diare: diare,
        makan_kurang: makan_kurang,
        malnutrisi: malnutrisi,

        frek_bab: frek_bab,
        keluhan_bab: keluhan_bab,
        karakter_feces: karakter_feces,
        warna_feces: warna_feces,
        frek_bak: frek_bak,
        warna_bak: warna_bak,
        keluhan_bak: keluhan_bak,
        masalah: masalah,
        rencana: rencana,
        skor_nyeri: skor_nyeri,
        jatuh3bln: $('input[name="jatuh3bln"]:checked').val(),
        alatbantu: $('input[name="alatbantu"]:checked').val(),
        sulitjalan: $('input[name="sulitjalan"]:checked').val(),
        intervensi_risiko: intervensi_risiko,
        dekubitus_bantuan: $('input[name="dekubitus_bantuan"]:checked').val(),
        inkontinensia: $('input[name="inkontinensia"]:checked').val(),
        rwyt_dekubitus: $('input[name="rwyt_dekubitus"]:checked').val(),
        dekubitus_umur65: $('input[name="dekubitus_umur65"]:checked').val(),
        dekubitus_anak: dekubitus_anak,
      },
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
          if (data.kondisi_umum != '') {
            $('#kondisi_umum_error').html(data.kondisi_umum);
          } else {
            $('#kondisi_umum_error').html('');
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
          if (data.asesment_triase != '') {
            $('#asesment_triase_error').html(data.asesment_triase);
          } else {
            $('#asesment_triase_error').html('');
          }
          if (wajib_ibadah == "" || wajib_ibadah == null) {
            $('#ibadah_error').html('*wajib diisi');
          } else {
            $('#ibadah_error').html('');
          }
          if (thaharah == '' || thaharah == null) {
            $('#thaharoh_error').html('*wajib diisi');
          } else {
            $('#thaharoh_error').html('');
          }
          if (sholat == '' || sholat == null) {
            $('#sholat_error').html('*wajib diisi');
          } else {
            $('#sholat_error').html('');
          }
          if (data.faktor_nyeri != '') {
            $('#faktor_nyeri_error').html(data.faktor_nyeri);
          } else {
            $('#faktor_nyeri_error').html('');
          }
          if (data.kualitas_nyeri != '') {
            $('#kualitas_nyeri_error').html(data.kualitas_nyeri);
          } else {
            $('#kualitas_nyeri_error').html('');
          }
          if (data.lokasi_nyeri != '') {
            $('#lokasi_nyeri_error').html(data.lokasi_nyeri);
          } else {
            $('#lokasi_nyeri_error').html('');
          }
          if (data.skala_nyeri != '') {
            $('#skala_nyeri_error').html(data.skala_nyeri);
          } else {
            $('#skala_nyeri_error').html('');
          }
          if (durasi == '' || durasi == null) {
            $('#durasi_error').html('*wajib diisi');
          } else {
            $('#durasi_error').html('');
          }
          if (data.faktor_peringan != '') {
            $('#peringan_error').html(data.faktor_peringan);
          } else {
            $('#peringan_error').html('');
          }
          if (data.efek_nyeri != '') {
            $('#efek_nyeri_error').html(data.efek_nyeri);
          } else {
            $('#efek_nyeri_error').html('');
          }
          if (penurunan_bb == '' || penurunan_bb == null) {
            $('#penurunan_bb_error').html('*wajib diisi');
          } else {
            $('#penurunan_bb_error').html('');
          }
          if (kurang_makan == '' || kurang_makan == null) {
            $('#kurang_makan_error').html('*wajib diisi');
          } else {
            $('#kurang_makan_error').html('');
          }
          if (kurus == '' || kurus == null) {
            $('#kurus_error').html('*wajib diisi');
          } else {
            $('#kurus_error').html('');
          }
          if (turun_bb == '' || turun_bb == null) {
            $('#turun_bb_error').html('*wajib diisi');
          } else {
            $('#turun_bb_error').html('');
          }
          if (diare == '' || diare == null) {
            $('#diare_error').html('*wajib diisi');
          } else {
            $('#diare_error').html('');
          }
          if (makan_kurang == '' || makan_kurang == null) {
            $('#makan_kurang_error').html('*wajib diisi');
          } else {
            $('#makan_kurang_error').html('');
          }
          if (malnutrisi == '' || malnutrisi == null) {
            $('#malnutrisi_error').html('*wajib diisi');
          } else {
            $('#malnutrisi_error').html('');
          }


          if (data.frek_bab != '') {
            $('#frek_bab_error').html(data.frek_bab);
          } else {
            $('#frek_bab_error').html('');
          }
          if (data.keluhan_bab != '') {
            $('#keluhan_bab_error').html(data.keluhan_bab);
          } else {
            $('#keluhan_bab_error').html('');
          }
          if (data.karakter_feces != '') {
            $('#kara_feces_error').html(data.karakter_feces);
          } else {
            $('#kara_feces_error').html('');
          }
          if (keluhan_bak == '' || keluhan_bak == null) {
            $('#keluhan_bak_error').html("*wajib diisi");
          } else {
            $('#keluhan_bak_error').html('');
          }
          if (data.warna_feces != '') {
            $('#warna_feces_error').html(data.warna_feces);
          } else {
            $('#warna_feces_error').html('');
          }
          if (data.frek_bak != '') {
            $('#frek_bak_error').html(data.frek_bak);
          } else {
            $('#frek_bak_error').html('');
          }
          if (data.warna_bak != '') {
            $('#warna_bak_error').html(data.warna_bak);
          } else {
            $('#warna_bak_error').html('');
          }
          if (data.masalah != '') {
            $('#masalah_error').html(data.masalah);
          } else {
            $('#masalah_error').html('');
          }
          if (data.rencana != '') {
            $('#rencana_error').html(data.rencana);
          } else {
            $('#rencana_error').html('');
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
<script>
  $(document).ready(function() {
    id_pelayanan = $('#inHis').val();
    $.ajax({
      url: "<?php echo base_url() ?>Erm_ases_per_igd/get_triase",
      method: "POST",
      dataType: 'json',
      data: {
        id: id_pelayanan
      },
      success: function(data) {
        if (data.status_dt == 'found') {
          $('input[name="tekanan_darah"]').val(data.tekanan_darah);
          $('input[name="frequensi_nadi"]').val(data.frequensi_nadi);
          $('input[name="frequensi_nafas"]').val(data.frequensi_nafas);
          $('input[name="suhu"]').val(data.suhu);
          $('input[name="skala_nyeri"]').val(data.skala_nyeri);
          $('#gcs').val(data.gcs);
          $('input[name="berat_badan"]').val(data.berat_badan);
          $('input[name="tinggi_badan"]').val(data.tinggi_badan);
          $('input[name="spo2"]').val(data.spo2);
          $('input[name="kebutuhan_khusus"][value="' + data.kebutuhan_khusus + '"]').prop("checked", true);
        }
      }

    });
  });
</script>
<script>
  function intervensi_risiko() {
    if ($('#jatuh3bln2').is(":checked") || $('#alatbantu2').is(":checked") || $('#sulitjalan2').is(":checked")) {
      $('#intervensi_form').collapse('show');
    } else {
      $('#intervensi_form').collapse('hide')
    }
  }

  function risiko_dekubitus() {
    if ($('#dekubitus_bantuan2').is(":checked") || $('#inkontinensia2').is(":checked") || $('#rwyt_dekubitus2').is(":checked") || $('#dekubitus_umur65_2').is(":checked") || $('#dekubitus_anak2').is(":checked")) {
      $('#ket_dekubitus').html('<span class="text-danger"><strong>Pasien berisiko Dekubitus, lakukan edukasi pencegahan dekubitus</strong></span>');
    } else {
      $('#ket_dekubitus').html('');
    }
  }
</script>