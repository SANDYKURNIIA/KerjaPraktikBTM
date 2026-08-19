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
                            <input type="number" class="form-control" name="tekanan_darah" placeholder="mmHg">
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
                            <input type="text" class="form-control" name="berat_badan" placeholder="Kg">
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
                            <input type="text" class="form-control" name="tinggi_badan" placeholder="Cm">
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
                      <div class="form-group">
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
                              b. asupan makan berkurang selama 1 mingu terakhir
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
                              a. Perhatikan cara berjalan saat ini akan duduk di kursi , Apakah pasien tampak tidak seimbang (sempoyongan/ limbung)
                            </label>
                            <span id="sempoyongan_error" class="text-danger"></span>
                            <div class="radio-button radio-button-primary">
                              <input id="sempoyongan1" type="radio" name="sempoyongan" value="Tidak">
                              <label class="control-label" for="sempoyongan1">
                                Tidak
                              </label>
                            </div>
                            <div class="radio-button radio-button-primary">
                              <input id="sempoyongan2" type="radio" name="sempoyongan" value="Ya">
                              <label class="control-label" for="sempoyongan2">
                                Ya
                              </label>
                            </div>
                          </div>
                        </div>

                        <div class="form-group ">
                          <div class="col-md-8">
                            <label class="control-label mb-10 text-left">
                              b. Apakah pasien memegang pinggiran kursi atau meja atau benda lain sebagai penopang saat akan duduk ?
                            </label>
                            <span id="penopang_error" class="text-danger"></span>
                            <div class="radio-button radio-button-primary">
                              <input id="penopang1" type="radio" name="penopang" value="Tidak">
                              <label class="control-label" for="penopang1">
                                Tidak
                              </label>
                            </div>
                            <div class="radio-button radio-button-primary">
                              <input id="penopang2" type="radio" name="penopang" value="Ya">
                              <label class="control-label" for="penopang2">
                                Ya
                              </label>
                            </div>
                          </div>
                        </div>

                        <div class="form-group ">
                          <div class="col-md-12">
                            <label class="control-label mb-10 text-left">
                              Tingkat Resiko
                            </label>
                            <span id="risiko_error" class="text-danger"></span>
                            <div class="radio-button radio-button-primary">
                              <input id="risiko1" type="radio" name="risiko" value="Tidak Berisiko">
                              <label class="control-label" for="risiko1">
                                Tidak Berisiko (tidak ditemukan a dan b)
                              </label>
                            </div>
                            <div class="radio-button radio-button-primary">
                              <input id="risiko2" type="radio" name="risiko" value="Risiko Tiinggi">
                              <label class="control-label" for="risiko2">
                                Risiko Tiinggi (a dan b ditemukan)
                              </label>
                            </div>
                            <div class="radio-button radio-button-primary">
                              <input id="risiko3" type="radio" name="risiko" value="Risiko Rendah">
                              <label class="control-label" for="risiko3">
                                Risiko Rendah (ditemukan a atau b)
                              </label>
                            </div>

                          </div>

                        </div>

                        <div class="form-group ">
                          <div class="col-md-2">
                            <label class="control-label mb-10 text-left">
                              Diberitahukan ke DPJP
                            </label>
                            <span id="info_dpjp_error" class="text-danger"></span>
                            <div class="radio-button radio-button-primary">
                              <input id="info_dpjp1" type="radio" name="info_dpjp" value="Tidak">
                              <label class="control-label" for="info_dpjp1">
                                Tidak
                              </label>
                            </div>
                            <div class="radio-button radio-button-primary">
                              <input id="info_dpjp2" type="radio" name="info_dpjp" value="Ya">
                              <label class="control-label" for="info_dpjp2">
                                Ya, Jam:
                              </label>
                              <div class="has-success">
                                <input type="time" class="form-control" id="info_dpjp" style="display: none;">
                              </div>

                            </div>
                          </div>
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
                                <input id="keluhan_bak2" type="radio" name="keluhan_bak" value="Pendarahan">
                                <label class="control-label" for="keluhan_bak2">
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
                         
                          <div class="has-success">
                            <textarea class="form-control" name="" id="masalah" cols="30" rows="5"></textarea>
                          </div>

                        </div>

                      </div>


                      <!-- 
                              --bagian Rencana Asuhan 
                            -->
                      <div class="form-group">
                        
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
