<!-- Row -->
  <div class="row">
  <div class="col-sm-12">
    <div class="panel panel-default card-view">
      <div class="panel-heading">
        <div class="pull-left">
          <h6 class="panel-title txt-dark">Assesment Awal Perawat</h6>
        </div>
        <div class="clearfix"></div>
      </div>
      <div class="panel-wrapper collapse in">
        <div class="panel-body">
          <div class="form-wrap">
            <input type="hidden" class="form-control" value="<?= $id_pelayanan ?>" id="inPel">
            <input type="hidden" class="form-control" value="<?= $id_history ?>" id="inHis">

            <div class="form-group">
              <div class="col-md-3">
                <label class="control-label mb-10 text-left">No.RM<span class="help"></span></label>
                <input type="text" disabled class="form-control" value="<?= $no_rm ?>" id="inNoRM">
                <input type="hidden" class="form-control" id="id">
              </div>
            </div>



            <div class="form-group">
              <div class="col-md-3">
                <label class="control-label mb-10 text-left">Nama<span class="help"></span></label>
                <!-- <input type="text" disabled class="form-control" id="inNama"> -->
                <input type="text" disabled class="form-control" value="<?= $nama ?>" id="inNama">
                <input type="hidden" id="tanggal" value="<?php echo date('Y-m-d H:i:s'); ?>">
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-3">
                <label class="control-label mb-10 text-left">Tgl Lahir/Umur<span class="help"></span></label>
                <!-- <input type="text" disabled class="form-control" id="inTglLahir"> -->

                <input type="text" disabled class="form-control" value="<?php
                                                                        setlocale(LC_ALL, 'id_ID');
                                                                        date_default_timezone_set('Asia/Jakarta');
                                                                        $time = strtotime($tgl_lahir);
                                                                        $date = strftime(" %d %B %Y ", $time);
                                                                        echo $date . '(' . getAge($tgl_lahir) . ')' ?>">
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
              <div class="col-md-12">
                <!-- <h5 style="margin-top: 30px;"><strong>
                    <label class="control-label mb-10 text-left">
                      PENGKAJIAN KEPERAWATAN AWAL PASIEN MASUK
                      <span class="help"></span>
                    </label></strong>
                </h5> -->
              </div>
              <div class="col-md-12">
                <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
              </div>

              <div class="form-group">
                <div class="col-md-4">
                  <label class="control-label mb-10 text-left">Jam/ Tanggal Masuk <span class="help"></span></label>
                  <!-- <input type="text" id="inTglMasuk" disabled class="form-control"> -->
                  <input type="text" id="inTglMasuk" disabled class="form-control" value="<?php
                                                                                          setlocale(LC_ALL, 'id_ID');

                                                                                          date_default_timezone_set('Asia/Jakarta');
                                                                                          $time = strtotime($tgl_masuk);
                                                                                          $date = strftime(" %d %B %Y ", $time);
                                                                                          // $jam = date(" H:i:s ", $time);
                                                                                          // echo $jam . '/' . $date 
                                                                                          echo $date ?>">

                </div>
              </div>

              <div class="form-group">
                <div class="col-md-4">
                  <label class="control-label mb-10 text-left">Cara Bayar<span class="help"></span></label>
                  <!-- <input type="text" disabled class="form-control" id="inCaraBayar"> -->
                  <input type="text" disabled class="form-control" id="inCaraBayar" value="<?= $cara_bayar ?>">
                </div>
              </div>
              <div class="form-group inAsalRujuk">
                <div class="col-md-4">
                  <label class="control-label mb-10 text-left">Asal Masuk<span class="help"></span></label>
                  <div class=" ">
                    <input type="text" class="form-control" readonly id="inAsalRujuk" value="<?php
                                                                                              $igd = $this->db->get_where('history_pelayanan_ugd', ['id_pelayanan' => $id_pelayanan])->result();
                                                                                              $poli = $this->db->get_where('history_pelayanan', ['id_pelayanan' => $id_pelayanan])->result();
                                                                                              if (count($igd) > 0 && count($poli) == 0) {
                                                                                                echo "UGD";
                                                                                              } else if (count($igd) == 0 && count($poli) > 0) {
                                                                                                echo "Rawat Jalan";
                                                                                              } else if (count($igd) == 0 && count($poli) == 0) {
                                                                                                echo "Front Office";
                                                                                              } ?>">
                  </div>

                </div>
              </div>
              <div class="col-md-12">
                <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
              </div>
              <div class="form-group ">
                <div class="col-md-4">
                  <label class="control-label mb-10 text-left">Cara Masuk</label>
                  <span id="cMasuk_error" class="text-danger"></span>
                  <div class=" radio-button radio-button-primary">
                    <input id="cMasuk1" name="cMasuk" type="radio" value="Jalan">
                    <label class="control-label" for="cMasuk1">
                      Jalan
                    </label>
                  </div>
                  <div class="radio-button radio-button-primary">
                    <input id="cMasuk2" name="cMasuk" type="radio" value="Kursi Roda">
                    <label class="control-label" for="cMasuk2">
                      Kursi Roda
                    </label>
                  </div>
                  <!-- <div class="radio-button radio-button-primary">
                    <input id="cMasuk2" name="cMasuk" type="radio" value="Troley">
                    <label class="control-label" for="cMasuk2">
                      Troley
                    </label>
                  </div> -->
                  <div class="radio-button radio-button-primary">
                    <input id="cMasuk3" name="cMasuk" type="radio" value="Berangkar">
                    <label class="control-label" for="cMasuk3">
                      Berangkar
                    </label>
                    <!-- <div class=" ">
                      <input type="text" class="form-control" id="cMasuk" style="display: none">
                      <span class="help-block"></span>
                    </div> -->
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-12">
                    <h5 style="margin-top: 30px;"><strong>
                        <label class="control-label mb-10 text-left"><b>BAGIAN 1 PEMERIKSAAN FISIK</b><span class="help"></span></label></strong>
                    </h5>
                  </div>

                  <div class="col-md-12">
                    <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                  </div>

                  <div class="form-group col-md-12">
                    <label class="control-label mb-6 text-left" style="opacity: 0.75;"><strong>GLASGOW COMA SCALE (GCS)</strong> </label>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group col-md-12">
                      <label class="control-label mb-6 text-left" style="opacity: 0.75;"><strong>MATA:</strong> </label>
                    </div>
                    <div class="col-md-9">
                      <div class="form-group ">
                        <label class="control-label mb-6 text-left" style="opacity: 0.75;">Membuka mata secara spontan tanpa rangsangan:
                          <strong>4</strong></label>
                      </div>
                      <div class="form-group">
                        <label class="control-label mb-6 text-left" style="opacity: 0.75;">Membuka mata setelah diperintahkan:
                          <strong>3</strong></label>
                      </div>
                      <div class="form-group">
                        <label class="control-label mb-6 text-left" style="opacity: 0.75;">Membuka mata setelah diberikan rangsangan nyeri:
                          <strong>2</strong></label>
                      </div>
                      <div class="form-group">
                        <label class="control-label mb-6 text-left" style="opacity: 0.75;">Tidak membuka mata dengan rangsangan nyeri:
                          <strong>1</strong></label>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group col-md-12">
                      <label class="control-label mb-10 text-left" style="opacity: 0.75;"><strong>VERBAL:</strong> </label>
                    </div>
                    <div class="col-md-9 ">
                      <div class="form-group ">
                        <label class="control-label mb-10 text-left" style="opacity: 0.75;">Orientasi baik:
                          <strong>5</strong></label>
                      </div>
                      <div class="form-group">
                        <label class="control-label mb-10 text-left" style="opacity: 0.75;">Orientasi terganggu / bingung:
                          <strong>4</strong></label>
                      </div>
                      <div class="form-group">
                        <label class="control-label mb-10 text-left" style="opacity: 0.75;">Kata-kata tidak jelas:
                          <strong>3</strong></label>
                      </div>
                      <div class="form-group">
                        <label class="control-label mb-10 text-left" style="opacity: 0.75;">Merespon dengan mengerang:
                          <strong>2</strong></label>
                      </div>
                      <div class="form-group">
                        <label class="control-label mb-10 text-left" style="opacity: 0.75;">Tidak ada respon verbal dengan rangsangan nyeri:
                          <strong>1</strong></label>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group col-md-12">
                      <label class="control-label mb-10 text-left" style="opacity: 0.75;"><strong>MOVEMENT (GERAKAN):</strong> </label>
                    </div>
                    <div class="col-md-11">
                      <div class="form-group ">
                        <label class="control-label mb-10 text-left" style="opacity: 0.75;">Dapat bergerak mengikuti perintah pemeriksa:
                          <strong>6</strong></label>
                      </div>
                      <div class="form-group ">
                        <label class="control-label mb-10 text-left" style="opacity: 0.75;">Dapat melokalisasikan nyeri:
                          <strong>5</strong></label>
                      </div>
                      <div class="form-group">
                        <label class="control-label mb-10 text-left" style="opacity: 0.75;">Melakukan gerakan menghindar saat diberi rangsangan nyeri:
                          <strong>4</strong></label>
                      </div>
                      <div class="form-group">
                        <label class="control-label mb-10 text-left" style="opacity: 0.75;">Fleksi abnormal lengan ata tungkai saat diberi rangsangan nyeri:
                          <strong>3</strong></label>
                      </div>
                      <div class="form-group">
                        <label class="control-label mb-10 text-left" style="opacity: 0.75;">Ekstensi abnormal lengan atau tungkai saat diberi rangsangan nyeri:
                          <strong>2</strong></label>
                      </div>
                      <div class="form-group">
                        <label class="control-label mb-10 text-left" style="opacity: 0.75;">Tidak ada respon dengan rangsangan nyeri:
                          <strong>1</strong></label>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group col-md-12">
                      <label class="control-label mb-10 text-left" style="opacity: 0.75;"><strong>Penilaian GCS:</strong> </label>
                    </div>
                    <div class="col-md-9">
                      <div class="form-group">
                        <label class="control-label mb-10 text-left" style="opacity: 0.75;">Compos Mentis:
                          <strong>15</strong></label>
                      </div>
                      <div class="form-group ">
                        <label class="control-label mb-10 text-left" style="opacity: 0.75;">Apatis:
                          <strong>14</strong></label>
                      </div>
                      <div class="form-group">
                        <label class="control-label mb-10 text-left" style="opacity: 0.75;">Somnolen:
                          <strong>12-13</strong></label>
                      </div>
                      <div class="form-group">
                        <label class="control-label mb-10 text-left" style="opacity: 0.75;">Sopor:
                          <strong>9-11</strong></label>
                      </div>
                      <div class="form-group">
                        <label class="control-label mb-10 text-left" style="opacity: 0.75;">Coma:
                          <strong>3-8</strong></label>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                  </div>

                  <div class="form-group">
                    <div class="col-md-4">
                      <label class="control-label mb-10 text-left">GCS :<span class="help"></span></label>
                      <span id="gcs_error" class="text-danger"></span>
                      <div class="">
                        <input type="number" disabled class="form-control" name="gcs" id="gcs" placeholder="">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-4">
                        <label class="control-label mb-10 text-left">E :<span class="help"></span></label>
                        <span id="e_error" class="text-danger"></span>
                        <div class="">
                          <input type="number" class="form-control" name="e" id="e" value="0">
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-4">
                        <label class="control-label mb-10 text-left">M :<span class="help"></span></label>
                        <span id="m_error" class="text-danger"></span>
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
                        <span id="v_error" class="text-danger"></span>
                        <div class=" ">
                          <input type="number" class="form-control" name="v" id="v" value="0">
                        </div>
                      </div>
                    </div>


                    <div class="form-group ">
                      <div class="form-group">
                        <div class="col-md-4">
                          <label class="control-label mb-10 text-left">Tekanan Darah<span class="help"></span></label>
                          <span id="td_error" class="text-danger"></span>
                          <div class=" ">
                            <input type="text" class="form-control" name="tekanan_darah" id="tekanan_darah" placeholder="mmHg">
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="col-md-4">
                          <label class="control-label mb-10 text-left">Suhu<span class="help"></span></label>
                          <span id="suhu_error" class="text-danger"></span>
                          <div class=" ">
                            <input type="number" class="form-control" name="suhu" id="suhu" placeholder="Celsius">
                          </div>
                        </div>
                      </div>

                      <div class="col-md-12">
                        <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                      </div>
                      <div class="form-group">
                        <div class="col-md-4">
                          <label class="control-label mb-10 text-left">Frequensi Nadi<span class="help"></span></label>
                          <span id="nadi_error" class="text-danger"></span>
                          <div class=" ">
                            <input type="text" class="form-control" name="frequensi_nadi" id="frequensi_nadi" placeholder="x/menit">
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="col-md-4">
                          <label class="control-label mb-10 text-left">SPO2<span class="help"></span></label>
                          <span id="spo2_error" class="text-danger"></span>
                          <div class=" ">
                            <input type="number" class="form-control" name="spo2" id="spo2" placeholder="">
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="col-md-4">
                          <label class="control-label mb-10 text-left">Berat Badan<span class="help"></span></label>
                          <span id="berat_badan_error" class="text-danger"></span>
                          <div class=" ">
                            <input type="text" class="form-control" name="berat_badan" id="berat_badan" placeholder="Kg">
                          </div>
                        </div>
                      </div>

                      <div class="col-md-12">
                        <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                      </div>
                      <div class="form-group">
                        <div class="col-md-4">
                          <label class="control-label mb-10 text-left">Frequensi Nafas<span class="help"></span></label>
                          <span id="nafas_error" class="text-danger"></span>
                          <div class=" ">
                            <input type="text" class="form-control" name="frequensi_nafas" id="frequensi_nafas" placeholder="x/menit">
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="col-md-4">
                          <label class="control-label mb-10 text-left">Tinggi Badan<span class="help"></span></label>
                          <span id="tinggi_badan_error" class="text-danger"></span>
                          <div class=" ">
                            <input type="text" class="form-control" name="tinggi_badan" id="tinggi_badan" placeholder="Cm">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                      </div>
                      <div class="col-md-7">
                        <div class="form-group">
                          <div class="col-md-12">
                            <label class="control-label mb-10 text-left"><b>Kepala: </b><span class="help"></span></label>
                            <div class=" ">
                              <input type="text" class="form-control" name="kepala" id="kepala" cols="30" rows="2" value="Dalam Batas Normal">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                        </div>
                        <div class="form-group">
                          <div class="col-md-12">
                            <label class="control-label mb-10 text-left"><b>Hidung: </b><span class="help"></span></label>
                            <div class=" ">
                              <input type="text" class="form-control" name="hidung" id="hidung" cols="30" rows="2" value="Dalam Batas Normal">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                        </div>
                        <div class="form-group">
                          <div class="col-md-12">
                            <label class="control-label mb-10 text-left"><b>Mulut: </b><span class="help"></span></label>
                            <div class=" ">
                              <input type="text" class="form-control" name="mulut" id="mulut" cols="30" rows="2" value="Dalam Batas Normal">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                        </div>
                        <div class="form-group">
                          <div class="col-md-12">
                            <label class="control-label mb-10 text-left"><b>Leher: </b><span class="help"></span></label>
                            <div class=" ">
                              <input type="text" class="form-control" name="leher" id="leher" cols="30" rows="2" value="Dalam Batas Normal">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                        </div>
                        <div class="form-group">
                          <div class="col-md-12">
                            <label class="control-label mb-10 text-left"><b>THORAX : </b><span class="help"></span></label>
                            <div class=" ">
                              <input type="text" class="form-control" name="thorax" id="thorax" cols="30" rows="2" value="Dalam Batas Normal">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                        </div>
                        <div class="form-group">
                          <div class="col-md-12">
                            <label class="control-label mb-10 text-left"><b>Jantung : </b><span class="help"></span></label>
                            <div class=" ">
                              <input type="text" class="form-control" name="jantung" id="jantung" cols="30" rows="2" value="Dalam Batas Normal">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                        </div>
                        <div class="form-group">
                          <div class="col-md-12">
                            <label class="control-label mb-10 text-left"><b>Paru : </b><span class="help"></span></label>
                            <div class=" ">
                              <input type="text" class="form-control" name="paru" id="paru" cols="30" rows="2" value="Dalam Batas Normal">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                        </div>
                        <div class="form-group">
                          <div class="col-md-12">
                            <label class="control-label mb-10 text-left"><b>Andomen dan Pelvis : </b><span class="help"></span></label>
                            <div class=" ">
                              <input type="text" class="form-control" name="andomen" id="andomen" cols="30" rows="2" value="Dalam Batas Normal">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                        </div>
                        <div class="form-group">
                          <div class="col-md-12">
                            <label class="control-label mb-10 text-left"><b>Punggung dan Pinggang : </b><span class="help"></span></label>
                            <div class=" ">
                              <input type="text" class="form-control" name="punggung" id="punggung" cols="30" rows="2" value="Dalam Batas Normal">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                        </div>
                        <div class="form-group">
                          <div class="col-md-12">
                            <label class="control-label mb-10 text-left"><b>Ekstremitas : </b><span class="help"></span></label>
                            <div class=" ">
                              <input type="text" class="form-control" name="ekstremitas" id="ekstremitas" cols="30" rows="2" value="Dalam Batas Normal">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                        </div>
                        <div class="form-group">
                          <div class="col-md-12">
                            <label class="control-label mb-10 text-left"><b>Genetalia : </b><span class="help"></span></label>
                            <div class=" ">
                              <input type="text" class="form-control" name="genetalia" id="genetalia" cols="30" rows="2" value="Dalam Batas Normal">
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-12">
                        <h5 style="margin-top: 30px;"><strong>
                            <label class="control-label mb-10 text-left"><b>PENGKAJIAN DENGAN BRADAN SCORE</b></label>
                          </strong>
                        </h5>
                      </div>


                      <div class="col-md-5">
                        <div class="form-group form-group-spacing">
                          <div class="col-md-12">
                            <label class="control-label mb-10 text-left">Persepsi Sensori :</label>
                            <span id="persepsi_error" class="text-danger"></span>
                            <div class="radio-button radio-button-primary">
                              <div class="col-md-12">
                                <input id="persepsi1" type="radio" name="persepsi" value="1">
                                <label class="control-label" for="persepsi1">Tidak dapat merasakan nyeri (1)</label>
                              </div>
                              <div class="col-md-12">
                                <input id="persepsi2" type="radio" name="persepsi" value="2">
                                <label class="control-label" for="persepsi2">Gangguan sensori pada permukaan tubuh
                                  (2)</label>
                              </div>
                              <div class="col-md-12">
                                <input id="persepsi3" type="radio" name="persepsi" value="3">
                                <label class="control-label" for="persepsi3">Gangguan sensori pada satu atau dua
                                  ekstrimitas (3)</label>
                              </div>
                              <div class="col-md-12">
                                <input id="persepsi4" type="radio" name="persepsi" value="4">
                                <label class="control-label" for="persepsi4">Tidak ada gangguan sensori (4)</label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                        </div>
                        <div class="form-group form-group-spacing">
                          <div class="col-md-12">
                            <label class="control-label mb-10 text-left">Kelembaban :</label>
                            <span id="kelembaban_error" class="text-danger"></span>
                            <div class="radio-button radio-button-primary">
                              <div class="col-md-12">
                                <input id="kelembaban1" type="radio" name="kelembaban" value="1">
                                <label class="control-label" for="kelembaban1">Kulit selalu terpapar keringat atau
                                  urin (1)</label>
                              </div>
                              <div class="col-md-12">
                                <input id="kelembaban2" type="radio" name="kelembaban" value="2">
                                <label class="control-label" for="kelembaban2">Kulit lembab (2)</label>
                              </div>
                              <div class="col-md-12">
                                <input id="kelembaban3" type="radio" name="kelembaban" value="3">
                                <label class="control-label" for="kelembaban3">Kulit kadang-kadang lembab (3)</label>
                              </div>
                              <div class="col-md-12">
                                <input id="kelembaban4" type="radio" name="kelembaban" value="4">
                                <label class="control-label" for="kelembaban4">Kulit kering/kulit normal/utuh
                                  (4)</label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                        </div>
                        <div class="form-group form-group-spacing">
                          <div class="col-md-12">
                            <label class="control-label mb-10 text-left">Aktivitas :</label>
                            <span id="aktifitas_error" class="text-danger"></span>
                            <div class="radio-button radio-button-primary">
                              <div class="col-md-12">
                                <input id="aktifitas1" type="radio" name="aktifitas" value="1">
                                <label class="control-label" for="aktifitas1">Tergeletak di tempat tidur (1)</label>
                              </div>
                              <div class="col-md-12">
                                <input id="aktifitas2" type="radio" name="aktifitas" value="2">
                                <label class="control-label" for="aktifitas2">Tidak bisa berjalan/di kursi
                                  roda (2)</label>
                              </div>
                              <div class="col-md-12">
                                <input id="aktifitas3" type="radio" name="aktifitas" value="3">
                                <label class="control-label" for="aktifitas3">Berjalan pada jarak terbatas (3)</label>
                              </div>
                              <div class="col-md-12">
                                <input id="aktifitas4" type="radio" name="aktifitas" value="4">
                                <label class="control-label" for="aktifitas4">Dapat berjalan sekitar ruangan (4)</label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                        </div>
                      </div>
                      <div class="col-md-5">
                        <div class="form-group form-group-spacing">
                          <div class="col-md-12">
                            <label class="control-label mb-10 text-left">Mobilitas :</label>
                            <span id="mobilitas_error" class="text-danger"></span>
                            <div class="radio-button radio-button-primary">
                              <div class="col-md-12">
                                <input id="mobilitas1" type="radio" name="mobilitas" value="1">
                                <label class="control-label" for="mobilitas1">Tidak mampu bergerak (1)</label>
                              </div>
                              <div class="col-md-12">
                                <input id="mobilitas2" type="radio" name="mobilitas" value="2">
                                <label class="control-label" for="mobilitas2">Tidak dapat merubah posisi secara teratur
                                  (2)</label>
                              </div>
                              <div class="col-md-12">
                                <input id="mobilitas3" type="radio" name="mobilitas" value="3">
                                <label class="control-label" for="mobilitas3">Dapat merubah posisi ekstrimitas mandiri
                                  (3)</label>
                              </div>
                              <div class="col-md-12">
                                <input id="mobilitas4" type="radio" name="mobilitas" value="4">
                                <label class="control-label" for="mobilitas4">Dapat merubah posisi tidur tanpa bantuan
                                  (4)</label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                        </div>
                        <div class="form-group form-group-spacing">
                          <div class="col-md-12">
                            <label class="control-label mb-10 text-left">Nutrisi :</label>
                            <span id="nutrisi_error" class="text-danger"></span>
                            <div class="radio-button radio-button-primary">
                              <div class="col-md-12">
                                <input id="nutrisi1" type="radio" name="nutrisi" value="1">
                                <label class="control-label" for="nutrisi1">Tidak dapat menghabiskan 1/3 porsi makan
                                  (1)</label>
                              </div>
                              <div class="col-md-12">
                                <input id="nutrisi2" type="radio" name="nutrisi" value="2">
                                <label class="control-label" for="nutrisi2">Jarang mampu menghabiskan 1/2 porsi makan
                                  (2)</label>
                              </div>
                              <div class="col-md-12">
                                <input id="nutrisi3" type="radio" name="nutrisi" value="3">
                                <label class="control-label" for="nutrisi3">Dapat menghabiskan lebih dari 1/2 porsi
                                  makan
                                  (3)</label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                        </div>
                        <div class="form-group form-group-spacing">
                          <div class="col-md-12">
                            <label class="control-label mb-10 text-left">Gesekan dan geser :</label>
                            <span id="gesekan_error" class="text-danger"></span>
                            <div class="radio-button radio-button-primary">
                              <div class="col-md-12">
                                <input id="gesekan1" type="radio" name="gesekan" value="1">
                                <label class="control-label" for="gesekan1">Tidak mampu mengangkat badannya sendiri
                                  (1)</label>
                              </div>
                              <div class="col-md-12">
                                <input id="gesekan2" type="radio" name="gesekan" value="2">
                                <label class="control-label" for="gesekan2">Perlu bantuan minimal mengangkat tubuh
                                  (2)</label>
                              </div>
                              <div class="col-md-12">
                                <input id="gesekan3" type="radio" name="gesekan" value="3">
                                <label class="control-label" for="gesekan3">Dapat bergerak bebas tanpa gesekan
                                  (3)</label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                        </div>
                      </div>

                      <div class="form-group col-md-2">
                        <label class="control-label mb-10 text-left"> Bradan Score :</label>
                        <span id="bradan_score_error" class="text-danger"></span>
                        <div class=" ">
                          <input class="form-control" cols="1" rows="1" id="bradan_score" name="bradan_score" disabled></input>
                          <span class="help-block text-danger"></span>
                        </div>
                      </div>


                      <div class="row">
                        <div class="form-group col-md-10">
                          <label class="control-label mb-10 text-left" style="opacity: 0.75;">Penilaian Skor: </label>
                        </div>
                      </div>

                      <div class="col-md-3">
                        <!-- <div class="row"> -->
                        <div class="form-group ">
                          <label class="control-label mb-10 text-left" style="opacity: 0.75;">- Resiko rendah: <strong>
                              > 20 </strong></label>
                        </div>

                        <!-- </div> -->
                        <!-- <div class="row"> -->
                        <div class="form-group">
                          <label class="control-label mb-10 text-left" style="opacity: 0.75;">- Resiko sedang:
                            <strong>16-20</strong></label>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <!-- <div class="row"> -->
                        <div class="form-group">
                          <label class="control-label mb-10 text-left" style="opacity: 0.75;">- Resiko Tinggi:
                            <strong>11-15</strong></label>
                        </div>
                        <!-- </div> -->
                      </div>
                      <!-- <div class="row"> -->
                      <div class="form-group">
                        <label class="control-label mb-10 text-left" style="opacity: 0.75;">- Resiko sangat tinggi:
                          <strong>
                            < 10 </strong></label>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <!-- <div class="row"> -->
                      <div class="form-group">
                        <label class="control-label mb-10 text-left" style="opacity: 0.75;">- Bila Total Skor: <strong>
                            < 15 </strong> dilakukan Tindakan pencegahan dekubitus</label>
                      </div>
                      <!-- </div> -->
                    </div>
                  </div>


                  <div class="form-group" id="spirit">
                    <div class="col-md-12">
                      <h5 style="margin-top: 30px;"><strong>
                          <label class="control-label mb-10 text-left"><b>BAGIAN 2 RIWAYAT KESEHATAN</b></label>
                        </strong></h5>
                    </div>
                    <div class="col-md-12">
                      <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                    </div>

                    <!-- //START ALERGI// -->
                    <div class="form-group">
                      <div class="col-md-4">
                        <div class="row">
                          <label class="control-label mb-10 text-left">Alergi:</label>
                          <span id="alergi_error" class="text-danger"></span>
                        </div>
                        <div class="row">
                          <div class="radio-button radio-button-primary">
                            <input id="alergi1" type="radio" name="alergi" value="Tidak Ada" checked>
                            <label class="control-label" for="alergi1">
                              Tidak Ada
                            </label>
                          </div>
                          <div class="radio-button radio-button-primary">
                            <input id="alergi2" type="radio" name="alergi" value="Ada">
                            <label class="control-label" for="alergi2">
                              Ada
                            </label>
                            <div class="has-success">
                              <input type="text" class="form-control" value="" id="riwayat_alergi" style="display: none;">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div id="banyak" style="display:none;">
                      <div>
                        <div>
                          <div class="col-md-12">
                            <strong>
                              <label class="control-label mb-10 text-left">
                                <p><br>Riwayat Alergi</p>
                              </label>
                            </strong>
                          </div>
                          <div class="col-md-12">
                            <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                          </div>
                          <div class="form-group">
                            <div class="col-md-4">
                              <div class="row">
                                <label class="control-label mb-10 text-left">Alergi Obat :</label>
                                <span id="alergiobat_error" class="text-danger"></span>
                              </div>
                              <div class="row">
                                <div class="radio-button radio-button-primary">
                                  <input id="alergi_obat2" type="radio" name="alergi_obat" value="Tidak Ada" checked>
                                  <label class="control-label" for="alergi_obat2">
                                    Tidak Ada
                                  </label>
                                </div>
                                <div class="radio-button radio-button-primary">
                                  <input id="alergi_obat2" type="radio" name="alergi_obat" value="Ada">
                                  <label class="control-label" for="alergi_obat2">
                                    Ada, Jenis/Nama Obat
                                  </label>
                                  <div class=" ">
                                    <input type="text" class="form-control alergi_obat_textbox" name="alergi_obat_textbox" id="alergi_obat_textbox" style="display: none; width: 250px;">
                                    <span class="help-block"></span>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- Kode JavaScript untuk mengatur tampilan input teks -->
                        <script>
                          $(document).ready(function() {
                            // Event listener untuk perubahan pada radio button
                            $('input[name="alergi_obat"]').change(function() {
                              if ($(this).val() === 'Ada') {
                                $('.alergi_obat_textbox').show(); // Menampilkan input teks jika 'Ada' dipilih
                              } else {
                                $('.alergi_obat_textbox').hide(); // Menyembunyikan input teks jika 'Tidak Ada' dipilih
                              }
                            });
                            $('input[name="alergi"]').change(function() {
                              if ($(this).val() === 'Ada') {
                                $('#riwayat_alergi').show(); // Menampilkan input teks jika 'Ada' dipilih
                              } else {
                                $('#riwayat_alergi').hide(); // Menyembunyikan input teks jika 'Tidak Ada' dipilih
                              }
                            });
                          });
                        </script>

                        <!-- <div class="form-group">
                          <div class="col-md-4">
                            <div class="row">
                              <label class="control-label mb-10 text-left">Alergi Obat :</label>
                              <span id="alergiobat_error" class="text-danger"></span>
                            </div>
                            <div class="row">
                              <div class="radio-button radio-button-primary">
                                <input id="alergi_obat" type="radio" name="alergi_obat" value="Tidak Ada" checked>
                                <label class="control-label" for="alergi_obat">
                                  Tidak Ada
                                </label>
                              </div>
                              <div class="radio-button radio-button-primary">
                                <input id="alergi_obat" type="radio" name="alergi_obat" value="Ada">
                                <label class="control-label" for="alergi_obat">
                                  Ada, Jenis/Nama Obat
                                </label>
                                <div class=" ">
                                  <input type="text" class="form-control" id="alergi_obat" style="display: none;">
                                  <span class="help-block"></span>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div> -->
                      </div>
                      <div class="form-group ">
                        <div class="col-md-4">
                          <div class="row">
                            <label class="control-label mb-10 text-left">Lain-lain:</label>
                            <span id="lain_error" class="text-danger"></span>
                          </div>
                          <div class="row">
                            <div class="col-md-4">
                              <div class="checkbox checkbox-success">
                                <input id="lain_lain" type="checkbox" name="lain_lain" value="Asma">
                                <label class="control-label" for="lain_lain">
                                  Asma
                                </label>
                              </div>
                              <div class="checkbox checkbox-success">
                                <input id="lain_lain1" type="checkbox" name="lain_lain" value="Eksim Kulit">
                                <label class="control-label" for="lain_lain1">
                                  Eksim Kulit
                                </label>
                              </div>
                              <div class="checkbox checkbox-success">
                                <input id="lain_lain2" type="checkbox" name="lain_lain" value="Sabun">
                                <label class="control-label" for="lain_lain2">
                                  Sabun
                                </label>
                              </div>
                              <div class="checkbox checkbox-success">
                                <input id="lain_lain3" type="checkbox" name="lain_lain" value="Makanan">
                                <label class="control-label" for="lain_lain3">
                                  Makanan
                                </label>
                              </div>
                              <!-- </div> -->
                              <!-- <div class="col-md-3"> -->
                              <div class="checkbox checkbox-success">
                                <input id="lain_lain4" type="checkbox" name="lain_lain" value="Debu">
                                <label class="control-label" for="lain_lain4">
                                  Debu
                                </label>
                              </div>
                              <div class="checkbox checkbox-success">
                                <input id="lain_lain5" type="checkbox" name="lain_lain" value="Udara">
                                <label class="control-label" for="lain_lain5">
                                  Udara
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                      </div>
                      <div class="form-group">
                        <div class="col-md-3">
                          <label class="control-label mb-10 text-left">
                            Reaksi Alergi
                          </label>
                          <div class="row">
                            <div class="radio-button radio-button-primary">
                              <input id="reaksi_alergi2" type="radio" name="reaksi_alergi" value="Tidak" checked>
                              <label class="control-label" for="reaksi_alergi2">
                                Tidak
                              </label>
                            </div>
                            <div class="radio-button radio-button-primary">
                              <input id="reaksi_alergi2" type="radio" name="reaksi_alergi" value="Ya">
                              <label class="control-label" for="reaksi_alergi2">
                                Ya
                              </label>
                              <div class=" ">
                                <input type="text" class="form-control" id="reaksi_alergi_detail" style="display: none;">
                                <span class="help-block"></span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="form-group" style="display: none;">
                        <div class="col-md-6">
                          <!-- <span id="reaksi_utama_error" class="text-danger"></span> -->
                          <label class="control-label mb-10 text-left">Reaksi Utama yang Timbul :</label>
                          <span id="reaksi_error" class="text-danger"></span>
                          <div class=" ">
                            <input class="form-control" name="reaksi_utama" id="reaksi_utama" cols="30" rows="2"></input>
                          </div>
                        </div>
                      </div>
                      <script>
                        $(document).ready(function() {
                          // Event listener untuk perubahan pada radio button reaksi alergi
                          $('input[name="reaksi_alergi"]').change(function() {
                            if ($(this).val() === 'Ya') {
                              $('#reaksi_utama').closest('.form-group').show(); // Menampilkan form group untuk reaksi utama
                            } else {
                              $('#reaksi_alergi_detail').hide(); // Menyembunyikan input teks jika 'Tidak' dipilih
                              $('#reaksi_utama').closest('.form-group').hide(); // Menyembunyikan form group untuk reaksi utama
                            }
                          });
                        });
                      </script>
                    </div>
                    <script>
                      $(document).ready(function() {
                        // Event listener untuk perubahan pada radio button riwayat transfusi darah
                        $('input[name="alergi"]').change(function() {
                          if ($(this).val() === 'Ada') {
                            $('#banyak').show(); // Menampilkan input teks jika 'Pernah' dipilih
                          } else {
                            $('#banyak').hide(); // Menyembunyikan input teks jika 'Tidak' dipilih atau pilihan lainnya
                          }
                        });
                      });
                    </script>

                    <div class="col-md-12">
                      <strong>
                        <label class="control-label mb-10 text-left">
                          <p><br>Riwayat Transfusi Darah :</p>
                        </label>
                      </strong>
                    </div>
                    <div class="form-group">
                      <div class="col-md-3">
                        <div class="row">
                          <div class="radio-button radio-button-primary">
                            <input id="transfusi_darah2" type="radio" name="transfusi_darah" value="Tidak" checked>
                            <label class="control-label" for="transfusi_darah2">
                              Tidak
                            </label>
                          </div>
                          <div class="radio-button radio-button-primary">
                            <input id="transfusi_darah2" type="radio" name="transfusi_darah" value="Pernah">
                            <label class="control-label" for="transfusi_darah2">
                              Pernah
                            </label>
                          </div>
                        </div>
                        <div class=" " id="transfusi_darah_detail" style="display: none;">
                          <input type="text" class="form-control" name="transfusi_darah_detail" id="transfusi_darah_detail" placeholder="Detail transfusi darah">
                          <span class="help-block"></span>
                        </div>
                      </div>
                    </div>
                    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
                    <script>
                      $(document).ready(function() {
                        // Event listener untuk perubahan pada radio button riwayat transfusi darah
                        $('input[name="transfusi_darah"]').change(function() {
                          if ($(this).val() === 'Pernah') {
                            $('#transfusi_darah_detail').show(); // Menampilkan input teks jika 'Pernah' dipilih
                          } else {
                            $('#transfusi_darah_detail').hide(); // Menyembunyikan input teks jika 'Tidak' dipilih atau pilihan lainnya
                          }
                        });
                      });
                    </script>

                    <!-- <div class="form-group ">
                        <div class="col-md-3">
                          <label class="control-label mb-10 text-left">
                            Reaksi Alergi
                          </label>
                          <div class="row">

                            <div class="radio-button radio-button-primary">
                              <input id="alergi_obat2" type="radio" name="alergi_obat2" value="Tidak">
                              <label class="control-label" for="alergi_obat2">
                                Tidak
                              </label>
                            </div>
                            <div class="radio-button radio-button-primary">
                              <input id="alergi_obat2" type="radio" name="alergi_obat2" value="Ya">
                              <label class="control-label" for="alergi_obat2">
                                Ya
                              </label>
                              <div class=" ">
                                <input type="text" class="form-control" id="alergi_obat2" style="display: none;">
                                <span class="help-block"></span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div> -->

                    <div class="col-md-12">
                      <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                    </div>
                    <!-- <div class="form-group">
                        <div class="col-md-4">
                          <strong><label class="control-label mb-10 text-left">Golongan Darah<span class="help"></span></label></strong>
                          <span id="golongan_darah_error" class="text-danger"></span>
                          <div class=" ">
                            <input type="text" class="form-control" name="golongan_darah">
                          </div>
                        </div>
                      </div> -->
                    <div class="col-md-12">
                      <strong>
                        <label class="control-label mb-10 text-left">
                          <p><br>Riwayat Merokok</p>
                        </label>
                      </strong>
                    </div>
                    <div class="form-group">
                      <div class="col-md-12">
                        <label class="control-label mb-10 text-left">
                          Apakah Pasien Punya Riwayat Merokok?
                        </label>
                        <span id="rokok_error" class="text-danger"></span>
                      </div>
                      <div class="col-md-3">
                        <div class="radio-button radio-button-primary">
                          <input id="merokok1" type="radio" name="merokok" value="Tidak" checked>
                          <label class="control-label" for="merokok1">
                            Tidak
                          </label>
                        </div>
                        <div class="radio-button radio-button-primary">
                          <input id="merokok2" type="radio" name="merokok" value="Ya">
                          <label class="control-label" for="merokok2">
                            Ya
                          </label>
                        </div>
                      </div>
                    </div>

                    <div class="form-group" id="form-input-jmlrokok">
                      <div class="col-md-3">
                        <label id="text_jumlah_rokok" class="control-label mb-10 text-left">Berapa batang rokok per - hari<span class="help"></span></label>
                        <div id="jumlah_rokok" style="display: none;">
                          <input id="input_jumlah_rokok" type="number" class="form-control" name="jumlah_rokok" placeholder="Jumlah/Hari">
                        </div>
                      </div>
                    </div>

                    <script>
                      $(document).ready(function() {
                        function updateVisibility() {
                          if ($('input[name="merokok"]:checked').val() === 'Ya') {
                            $('#text_jumlah_rokok').show(); // Menampilkan teks
                            $('#jumlah_rokok').show(); // Menampilkan input teks jika 'Ya' dipilih
                          } else {
                            $('#text_jumlah_rokok').hide(); // Menyembunyikan teks jika pilihan bukan 'Ya'
                            $('#jumlah_rokok').hide(); // Menyembunyikan input teks jika pilihan bukan 'Ya'
                          }
                        }

                        // Event listener untuk perubahan pada radio button
                        $('input[name="merokok"]').change(updateVisibility);

                        // Panggil fungsi untuk set visibility saat halaman dimuat
                        updateVisibility();
                      });
                    </script>

                    <div class="col-md-12">
                      <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                    </div>

                    <!-- <div class="col-md-12">
                        <strong>
                          <label class="control-label mb-10 text-left">
                            <p><br>Riwayat Merokok</p>
                          </label>
                        </strong>
                      </div>
                      <div class="form-group">
                        <div class="col-md-8">
                          <label class="control-label mb-10 text-left">
                            Apakah Pasien Punya Riwayat Merokok?
                          </label>
                          <span id="rokok_error" class="text-danger"></span>
                          <div class="radio-button radio-button-primary">
                            <input id="merokok1" type="radio" name="merokok" value="Tidak" checked>
                            <label class="control-label" for="merokok1">
                              Tidak
                            </label>
                          </div>
                          <div class="radio-button radio-button-primary">
                            <input id="merokok2" type="radio" name="merokok" value="Ya">
                            <label class="control-label" for="merokok2">
                              Ya
                            </label>
                          </div>
                        </div>
                      </div> -->
                    <!-- <div class="col-md-12">
                        <strong>
                          <label class="control-label mb-10 text-left">
                            <p><br>Riwayat minum minuman keras</p>
                          </label>
                        </strong>
                      </div>
                      <div class="form-group">
                        <div class="col-md-3">
                          <label class="control-label mb-10 text-left">
                            Apakah Pasien Punya Riwayat Alkohol?
                          </label>
                          <span id="alkohol_error" class="text-danger"></span>
                          <div class="radio-button radio-button-primary">
                            <input id="alkohol1" type="radio" name="alkohol" value="Tidak" checked>
                            <label class="control-label" for="alkohol1">
                              Tidak
                            </label>
                          </div>
                          <div class="radio-button radio-button-primary">
                            <input id="alkohol2" type="radio" name="alkohol" value="Ya">
                            <label class="control-label" for="alkohol2">
                              Ya
                            </label>
                          </div>
                        </div>
                      </div> -->

                    <div class="col-md-12">
                      <strong>
                        <label class="control-label mb-10 text-left">
                          <p><br>Riwayat minum minuman keras</p>
                        </label>
                      </strong>
                    </div>
                    <div class="form-group">
                      <div class="col-md-12">
                        <label class="control-label mb-10 text-left">
                          Apakah Pasien Punya Riwayat Alkohol?
                        </label>
                        <span id="alkohol_error" class="text-danger"></span>
                      </div>
                      <div class="col-md-3">
                        <div class="radio-button radio-button-primary">
                          <input id="alkohol1" type="radio" name="alkohol" value="Tidak" checked>
                          <label class="control-label" for="alkohol1">
                            Tidak
                          </label>
                        </div>
                        <div class="radio-button radio-button-primary">
                          <input id="alkohol2" type="radio" name="alkohol" value="Ya">
                          <label class="control-label" for="alkohol2">
                            Ya
                          </label>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-3">
                        <label id="text_jumlah_alkohol" class="control-label mb-10 text-left">Berapa minuman per - hari<span class="help"></span></label>
                        <div class=" " id="jumlah_alkohol" style="display: none;">
                          <input id="jumlah_alkohol" type="number" class="form-control" name="jumlah_alkohol" placeholder="Jumlah/Hari">
                        </div>
                      </div>
                    </div>

                    <script>
                      $(document).ready(function() {
                        function updateVisibility() {
                          if ($('input[name="alkohol"]:checked').val() === 'Ya') {
                            $('#text_jumlah_alkohol').show(); // Menampilkan teks
                            $('#jumlah_alkohol').show(); // Menampilkan input teks jika 'Ya' dipilih
                          } else {
                            $('#text_jumlah_alkohol').hide(); // Menyembunyikan teks jika pilihan bukan 'Ya'
                            $('#jumlah_alkohol').hide(); // Menyembunyikan input teks jika pilihan bukan 'Ya'
                          }
                        }

                        // Event listener untuk perubahan pada radio button
                        $('input[name="alkohol"]').change(updateVisibility);

                        // Panggil fungsi untuk set visibility saat halaman dimuat
                        updateVisibility();
                      });
                    </script>

                    <!-- <script>
                      $(document).ready(function() {
                        // Event listener untuk perubahan pada radio button riwayat transfusi darah
                        $('input[name="alkohol"]').change(function() {
                          if ($(this).val() === 'Ya') {
                            $('#jumlah_alkohol').show(); // Menampilkan input teks jika 'Pernah' dipilih
                          } else {
                            $('#jumlah_alkohol').hide(); // Menyembunyikan input teks jika 'Tidak' dipilih atau pilihan lainnya
                          }
                        });
                      });
                    </script> -->
                    <div class="col-md-12">
                      <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                    </div>
                    <!-- <div class="col-md-6">
                        <label class="control-label mb-10 text-left">
                          Apakah alkohol/obat-obatan yang menyebabkan masalah hidup anda?
                          <div class="radio-button radio-button-primary">
                            <input id="alkohol3" type="radio" name="sebab_alkohol" value="Tidak" checked>
                            <label class="control-label" for="alkohol3">
                              Tidak
                            </label>
                          </div>
                          <div class="radio-button radio-button-primary">
                            <input id="alkohol4" type="radio" name="sebab_alkohol" value="Ya">
                            <label class="control-label" for="alkohol4">
                              Ya
                            </label>
                          </div>
                      </div> -->
                    <!-- <div class="col-md-12">
                  <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                </div> -->
                    <div class="col-md-12">
                      <strong><label class="control-label mb-10 text-left">Riwayat Penggunaan Obat
                          Penenang</label></strong>
                      <div class="radio-button radio-button-primary">
                        <input id="obat_penenang1" name="obat_penenang" type="radio" value="Tidak" checked>
                        <label class="control-label" for="obat_penenang1">
                          Tidak
                        </label>
                      </div>
                      <div class="radio-button radio-button-primary">
                        <input id="obat_penenang2" name="obat_penenang" type="radio" value="Ya">
                        <label class="control-label" for="obat_penenang2">
                          Ya
                        </label>
                      </div>
                    </div>
                  </div>

                  <div class="form-group" id="form-input-jmlobat">
                    <div class="col-md-3">
                      <label id="text_jumlah_obat" class="control-label mb-10 text-left">Berapa konsumsi obat per - hari<span class="help"></span></label>
                      <div id="obat_penenang_detail" style="display: none;">
                        <input id="input_obat_penenang_detail" type="number" class="form-control" name="obat_penenang_detail" placeholder="Jumlah/Hari">
                      </div>
                    </div>
                  </div>

                  <script>
                    $(document).ready(function() {
                      function updateVisibility() {
                        if ($('input[name="obat_penenang"]:checked').val() === 'Ya') {
                          $('#text_jumlah_obat').show(); // Menampilkan teks
                          $('#obat_penenang_detail').show(); // Menampilkan input teks jika 'Ya' dipilih
                        } else {
                          $('#text_jumlah_obat').hide(); // Menyembunyikan teks jika pilihan bukan 'Ya'
                          $('#obat_penenang_detail').hide(); // Menyembunyikan input teks jika pilihan bukan 'Ya'
                        }
                      }

                      // Event listener untuk perubahan pada radio button
                      $('input[name="obat_penenang"]').change(updateVisibility);

                      // Panggil fungsi untuk set visibility saat halaman dimuat
                      updateVisibility();
                    });
                  </script>

                  <div class="col-md-12">
                    <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                  </div>

                  <!-- <div class=" " id="obat_penenang" style="display: none">
                          <input class="form-control" name="obat_penenang_detail" id="obat_penenang_detail"></input>
                          <span class="help-block"></span>
                        </div> -->

                  <div class="form-group ">
                    <div class="col-md-12">
                      <strong><label class="control-label mb-10 text-left">Riwayat Penyakit Keluarga</label></strong>
                      <span id="pkeluarga_error" class="text-danger"></span>
                    </div>
                    <div class="col-md-3">
                      <div class="checkbox checkbox-success">
                        <input id="pkeluarga" type="checkbox" name="pkeluarga" value="Asma">
                        <label class="control-label" for="pkeluarga">
                          Asma
                        </label>
                      </div>
                      <div class="checkbox checkbox-success">
                        <input id="pkeluarga1" type="checkbox" name="pkeluarga" value="Hipertensi">
                        <label class="control-label" for="pkeluarga1">
                          Hipertensi
                        </label>
                      </div>
                      <div class="checkbox checkbox-success">
                        <input id="pkeluarga2" type="checkbox" name="pkeluarga" value="PPOK">
                        <label class="control-label" for="pkeluarga2">
                          PPOK
                        </label>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="checkbox checkbox-success">
                        <input id="pkeluarga3" type="checkbox" name="pkeluarga" value="Diabetes">
                        <label class="control-label" for="pkeluarga3">
                          Diabetes
                        </label>
                      </div>
                      <div class="checkbox checkbox-success">
                        <input id="pkeluarga4" type="checkbox" name="pkeluarga" value="Kanker">
                        <label class="control-label" for="pkeluarga4">
                          Kanker
                        </label>
                      </div>
                      <div class="checkbox checkbox-success">
                        <input id="pkeluarga5" type="checkbox" name="pkeluarga" value="TBUlcus">
                        <label class="control-label" for="pkeluarga5">
                          Tubercolosis
                        </label>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="checkbox checkbox-success">
                        <input id="pkeluarga6" type="checkbox" name="pkeluarga" value="Jantung">
                        <label class="control-label" for="pkeluarga5">
                          Jantung
                        </label>
                      </div>
                      <div class="checkbox checkbox-success">
                        <input id="pkeluarga7" type="checkbox" name="pkeluarga" value="Hepatitis">
                        <label class="control-label" for="pkeluarga">
                          Hepatitis
                        </label>
                      </div>
                      <div class="checkbox checkbox-success">
                        <input id="pkeluarga8" type="checkbox" name="pkeluarga" value="Kejang">
                        <label class="control-label" for="pkeluarga8">
                          Kejang
                        </label>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="checkbox checkbox-success">
                        <input id="pkeluarga9" type="checkbox" name="pkeluarga" value="Stroke">
                        <label class="control-label" for="pkeluarga9">
                          Stroke
                        </label>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="checkbox checkbox-success">
                        <input id="pkeluarga10" type="checkbox" name="pkeluarga" value="Tidak Ada">
                        <label class="control-label" for="pkeluarga10">
                          Tidak Ada
                        </label>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="checkbox checkbox-success">
                        <input id="pkeluarga11" type="checkbox" name="pkeluarga" value="Lainnya">
                        <label class="control-label" for="pkeluarga11">
                          Lainnya
                        </label>
                      </div>
                      <div class=" " id="lainnya_penyakit_keluarga_detail" style="display: none;">
                        <input type="text" class="form-control" name="detail_penyakit_keluarga_lainnya" id="detail_penyakit_keluarga_lainnya" placeholder="Detail penyakit keluarga lainnya">
                        <!-- <span class="help-block"></span> -->
                      </div>
                    </div>
                    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
                    <script>
                      $(document).ready(function() {
                        // Event listener untuk perubahan pada checkbox 'Lainnya' riwayat penyakit keluarga
                        $('#pkeluarga11').change(function() {
                          if ($(this).is(':checked')) {
                            $('#lainnya_penyakit_keluarga_detail').show(); // Menampilkan input teks jika 'Lainnya' dipilih
                          } else {
                            $('#lainnya_penyakit_keluarga_detail').hide(); // Menyembunyikan input teks jika tidak dipilih
                          }
                        });
                      });
                    </script>



                    <!-- 
                              --bagian ASESMEN NYERI
                            -->
                    <div class="form-group">
                      <div class="col-md-12">
                        <h5 style="margin-top: 30px;"><strong>
                            <label class="control-label mb-10 text-left"><b>BAGIAN 3 KENYAMANAN</b><span class="help"></span></label>
                          </strong>
                        </h5>
                      </div>
                      <div class="col-md-12">
                        <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                      </div>
                      <div class="form-group ">
                        <div class="col-md-3">
                          <label class="control-label mb-10 text-left">Apakah terdapat keluhan nyeri ? </label>
                          <span id="keluhan_error" class="text-danger"></span>
                          <div class="radio-button radio-button-primary">
                            <input id="keluhan1" type="radio" name="keluhan" value="Tidak" required>
                            <label class="control-label" for="keluhan1">
                              Tidak
                            </label>
                          </div>
                          <div class="radio-button radio-button-primary">
                            <input id="keluhan1" type="radio" name="keluhan" value="Ya" required>
                            <label class="control-label" for="keluhan1">
                              Ya
                            </label>
                          </div>
                          <!-- <div class=" " id="lainnya_penyakit_keluarga_detail" style="display: none;">
                          <input type="text" class="form-control" id="detail_penyakit_keluarga_lainnya" placeholder="Detail penyakit keluarga lainnya">
                          <span class="help-block"></span>
                        </div> -->
                        </div>
                      </div>
                      <div class="col-md-12">
                        <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                      </div>

                      <div class=" " id="banyak2" style="display: none;">
                        <div class="col-md-7">
                          <h5 style="margin-top: 30px;">
                            <label class="control-label mb-10 text-left"><b>Skala Nyeri <b /><span class="help"></span></label>
                          </h5>

                          <div class="col-md-14">
                            <label class="control-label mb-10 text-left">NRS :</label>
                            <span id="nrs_error" class="text-danger"></span>
                            <div class="radio-button radio-button-primary" style="display: flex; gap: 70px; align-items: center;">
                              <div style="text-align: center;">
                                <input id="nrs1" type="radio" name="nrs" value="0">
                                <label class="control-label" for="nrs1" style="display: block;">0</label>
                              </div>
                              <div style="text-align: center;">
                                <input id="nrs2" type="radio" name="nrs" value="1">
                                <label class="control-label" for="nrs2" style="display: block;">1</label>
                              </div>
                              <div style="text-align: center;">
                                <input id="nrs3" type="radio" name="nrs" value="2">
                                <label class="control-label" for="nrs3" style="display: block;">2</label>
                              </div>
                              <div style="text-align: center;">
                                <input id="nrs4" type="radio" name="nrs" value="3">
                                <label class="control-label" for="nrs4" style="display: block;">3</label>
                              </div>
                              <div style="text-align: center;">
                                <input id="nrs5" type="radio" name="nrs" value="4">
                                <label class="control-label" for="nrs5" style="display: block;">4</label>
                              </div>
                              <div style="text-align: center;">
                                <input id="nrs6" type="radio" name="nrs" value="5">
                                <label class="control-label" for="nrs6" style="display: block;">5</label>
                              </div>
                              <div style="text-align: center;">
                                <input id="nrs7" type="radio" name="nrs" value="6">
                                <label class="control-label" for="nrs7" style="display: block;">6</label>
                              </div>
                              <div style="text-align: center;">
                                <input id="nrs8" type="radio" name="nrs" value="7">
                                <label class="control-label" for="nrs8" style="display: block;">7</label>
                              </div>
                              <div style="text-align: center;">
                                <input id="nrs9" type="radio" name="nrs" value="8">
                                <label class="control-label" for="nrs9" style="display: block;">8</label>
                              </div>
                              <div style="text-align: center;">
                                <input id="nrs10" type="radio" name="nrs" value="9">
                                <label class="control-label" for="nrs10" style="display: block;">9</label>
                              </div>
                              <div style="text-align: center;">
                                <input id="nrs11" type="radio" name="nrs" value="10">
                                <label class="control-label" for="nrs11" style="display: block;">10</label>
                              </div>
                            </div>
                            <div class="row">
                              <div class="form-group col-md-10">
                                <label class="control-label mb-10 text-left" style="opacity: 0.75;">Keterangan: </label>
                              </div>
                            </div>
                            <div class="col-md-3">
                              <div class="form-group ">
                                <label class="control-label mb-10 text-left" style="opacity: 0.75;">Tidak nyeri : <strong>0</strong></label>
                              </div>
                              <div class="form-group">
                                <label class="control-label mb-10 text-left" style="opacity: 0.75;">Nyeri ringan : <strong> 1 - 3</strong></label>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label mb-10 text-left" style="opacity: 0.75;">Nyeri sedang : <strong>4 - 6 </strong></label>
                            </div>
                            <div class="form-group">
                              <label class="control-label mb-10 text-left" style="opacity: 0.75;">Nyeri berat : <strong>7 - 10 </strong></label>
                            </div>
                          </div>


                          <div class="slidecontainer col-md-14">
                            <label class="control-label mb-10 text-left">WBFPRS:</label>
                            <span id="val"></span>
                            <input id="slide" type="range" min="0" max="10" value="0" oninput="displayValue(event)" onchange="tampilStatus(this.value)" />
                            <span class="help-block"></span>
                            <div id="state"><img src='<?= base_url() . 'assets/dist/img/tidak_nyeri.png'; ?>' width=7%></img>
                              <br>
                              <span style='color:black;'>Tidak Nyeri</span>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                        </div>

                        <div class="form-group form-group-spacing">
                          <div class="col-md-12">
                            <label class="control-label mb-10 text-left">BPS (Behavioral Pain Scale) Kategori :</label>
                            <span id="bps_error" class="text-danger"></span>
                            <div class="radio-button radio-button-primary">
                              <div class="col-md-12">
                                <input id="bps1" type="radio" name="bps" value="Nyeri Ringan : 3-5">
                                <label class="control-label" for="bps1">
                                  Nyeri Ringan : 3-5 </label>
                              </div>
                              <div class="col-md-12">
                                <input id="bps2" type="radio" name="bps" value="Nyeri Sedang : 6-8">
                                <label class="control-label" for="bps2"> Nyeri Sedang : 6-8 </label>
                              </div>
                              <div class="col-md-12">
                                <input id="bps3" type="radio" name="bps" value="Nyeri Berat : 9-12">
                                <label class="control-label" for="bps3"> Nyeri Berat : 9-12 </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                        </div>

                        <div class="form-group form-group-spacing">
                          <div class="col-md-12">
                            <label class="control-label mb-10 text-left">Flac Scale (Indikasi: digunakan pada pasien bayi dan anak < 5 tahun), Kategori :</label>
                                <span id="flacc_error" class="text-danger"></span>
                                <div class="radio-button radio-button-primary">
                                  <div class="col-md-12">
                                    <input id="flacc1" type="radio" name="flacc" value="1 - 3 nyeri ringan">
                                    <label class="control-label" for="flacc1">
                                      1 - 3 nyeri ringan </label>
                                  </div>
                                  <div class="col-md-12">
                                    <input id="flacc2" type="radio" name="flacc" value="4 - 6 nyeri sedang">
                                    <label class="control-label" for="flacc2"> 4 - 6 nyeri sedang </label>
                                  </div>
                                  <div class="col-md-12">
                                    <input id="flacc3" type="radio" name="flacc" value="7 - 10 nyeri berat">
                                    <label class="control-label" for="flacc3"> 7 - 10 nyeri berat </label>
                                  </div>
                                </div>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                        </div>

                        <div class="col-md-5">
                          <button data-toggle="modal" data-target="#modal_gambar" aria-expanded="false" aria-controls="poli_sore" class="btn btn-primary btn-anim btn-sm"><i class="icon-rocket"></i><span class="btn-text">GAMBAR</span></button>
                          <button class="btn btn-default" id="sig-clearBtn3">Clear Signature</button>
                          <canvas id="can" width="500" height="700" style="display: none;"></canvas>
                          <div class="form-group">
                            <div class="modal fade" id="modal_gambar" role="dialog" aria-labelledby="newPeternakModallabel" aria-hidden="true">
                              <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="newPeternakModallabel"></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>

                                  <div class="modal-body">
                                    <div class="form-group row" style="margin-left: 30px;">

                                      <div class="row">
                                        <div class="col-md-12">
                                          <canvas id="can1" width="500" height="700">
                                          </canvas>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-md-12">
                                          <button class="btn btn-primary" id="sig-submitBtn1">Submit
                                            Signature</button>
                                          <button class="btn btn-default" id="sig-clearBtn1">Clear Signature</button>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-md-12">
                              <label class="control-label mb-10 text-left"><b>Keterangan : <b /><span class="help"></span></label>
                              <div class=" ">
                                <textarea class="form-control" name="keterangan" id="keterangan" cols="30" rows="2"></textarea>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                        </div>

                        <div class="form-group form-group-spacing">
                          <div class="col-md-12">
                            <label class="control-label mb-10 text-left">Penyebab :</label>
                            <span id="penyebab_error" class="text-danger"></span>
                            <div class="radio-button radio-button-primary">
                              <div class="col-md-12">
                                <input id="penyebab1" type="radio" name="penyebab" value="Trauma tajam">
                                <label class="control-label" for="penyebab1">Trauma tajam</label>
                              </div>
                              <div class="col-md-12">
                                <input id="penyebab2" type="radio" name="penyebab" value="Trauma tumpul">
                                <label class="control-label" for="penyebab2">Trauma tumpul</label>
                              </div>
                              <div class="col-md-12">
                                <input id="penyebab3" type="radio" name="penyebab" value="Penyebab lain">
                                <label class="control-label" for="penyebab3">Penyebab lain : </label>
                              </div>
                              <div class="form-group">
                                <div class="col-md-3">
                                  <!-- <label class="control-label mb-10 text-left">Jumlah/Hari<span class="help"></span></label> -->
                                  <div class=" " id="lainnyaa" style="display: none;">
                                    <input id="lainnyaa" type="text" class="form-control" name="lainnyaa">
                                  </div>
                                </div>
                              </div>
                              <script>
                                $(document).ready(function() {
                                  // Event listener untuk perubahan pada radio button riwayat transfusi darah
                                  $('input[name="penyebab"]').change(function() {
                                    if ($(this).val() === 'Penyebab lain') {
                                      $('#lainnyaa').show(); // Menampilkan input teks jika 'Pernah' dipilih
                                    } else {
                                      $('#lainnyaa').hide(); // Menyembunyikan input teks jika 'Tidak' dipilih atau pilihan lainnya
                                    }
                                  });
                                });
                              </script>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                        </div>

                        <div class="form-group form-group-spacing">
                          <div class="col-md-12">
                            <label class="control-label mb-10 text-left">Karakter :</label>
                            <span id="karakter_error" class="text-danger"></span>
                            <div class="radio-button radio-button-primary">
                              <div class="col-md-12">
                                <input id="karakter1" type="radio" name="karakter" value="Trauma tajam">
                                <label class="control-label" for="karakter1">Seperti ditarik</label>
                              </div>
                              <div class="col-md-12">
                                <input id="karakter2" type="radio" name="karakter" value="Trauma tumpul">
                                <label class="control-label" for="karakter2">Seperti berdenyut</label>
                              </div>
                              <div class="col-md-12">
                                <input id="karakter3" type="radio" name="karakter" value="Seperti ditusuk">
                                <label class="control-label" for="karakter3">Seperti ditusuk </label>
                              </div>
                              <div class="col-md-12">
                                <input id="karakter4" type="radio" name="karakter" value="Seperti ditikam">
                                <label class="control-label" for="karakter4">Seperti ditikam </label>
                              </div>
                              <div class="col-md-12">
                                <input id="karakter5" type="radio" name="karakter" value="Seperti dipukul">
                                <label class="control-label" for="karakter5">Seperti dipukul </label>
                              </div>
                              <div class="col-md-12">
                                <input id="karakter6" type="radio" name="karakter" value="Seperti kram">
                                <label class="control-label" for="karakter6">Seperti kram </label>
                              </div>
                              <div class="col-md-12">
                                <input id="karakter7" type="radio" name="karakter" value="Seperti dibakar">
                                <label class="control-label" for="karakter7">Seperti dibakar </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                        </div>

                        <div class="form-group form-group-spacing">
                          <div class="col-md-12">
                            <label class="control-label mb-10 text-left">Frekuensi :</label>
                            <span id="frekuensi_error" class="text-danger"></span>
                            <div class="radio-button radio-button-primary">
                              <div class="col-md-12">
                                <input id="frekuensi1" type="radio" name="frekuensi" value=" < 3 bulan (akut)">
                                <label class="control-label" for="frekuensi1">
                                  < 3 bulan (akut) </label>
                              </div>
                              <div class="col-md-12">
                                <input id="frekuensi2" type="radio" name="frekuensi" value=" > 3 bulan (kronik)">
                                <label class="control-label" for="frekuensi2"> > 3 bulan (kronik) </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                        </div>

                        <div class="form-group form-group-spacing">
                          <div class="col-md-12">
                            <label class="control-label mb-10 text-left">Apakah nyeri berpindah-pindah / menjajar ke
                              bagian
                              lain ? :</label>
                            <span id="nyeri_error" class="text-danger"></span>
                            <div class="radio-button radio-button-primary">
                              <div class="col-md-12">
                                <input id="nyeri1" type="radio" name="nyeri" value="Tidak">
                                <label class="control-label" for="nyeri1">Tidak </label>
                              </div>
                              <div class="col-md-12">
                                <input id="nyeri1" type="radio" name="nyeri" value="Ya">
                                <label class="control-label" for="nyeri1">Ya,Lokasi </label>
                              </div>
                            </div>
                            <div class="col-md-3  ">
                              <input type="text" class="form-control" id="nyerii" name="nyerii" style="display:none">
                              <span class="help-block"></span>
                            </div>
                            <script>
                              $(document).ready(function() {
                                // Event listener untuk perubahan pada radio button riwayat transfusi darah
                                $('input[name="nyeri"]').change(function() {
                                  if ($(this).val() === 'Ya') {
                                    $('#nyerii').show(); // Menampilkan input teks jika 'Pernah' dipilih
                                  } else {
                                    $('#nyerii').hide(); // Menyembunyikan input teks jika 'Tidak' dipilih atau pilihan lainnya
                                  }
                                });
                              });
                            </script>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                        </div>

                        <div class="form-group form-group-spacing">
                          <div class="col-md-3">
                            <label class="control-label mb-10 text-left">Durasi :</label>
                            <span id="durasi_error" class="text-danger"></span>
                            <div class="radio-button radio-button-primary">
                              <div class="col-md-12">
                                <input id="durasi1" type="radio" name="durasi" value="1-2 Jam">
                                <label class="control-label" for="durasi1">1-2 Jam</label>
                              </div>
                              <div class="col-md-12">
                                <input id="durasi2" type="radio" name="durasi" value="3-4 Jam">
                                <label class="control-label" for="durasi2">3-4 Jam</label>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="form-group form-group-spacing">
                          <div class="col-md-3">
                            <label class="control-label mb-10 text-left">Selama :</label>
                            <span id="selama_error" class="text-danger"></span>
                            <div class="radio-button radio-button-primary">
                              <div class="col-md-12">
                                <input id="selama1" type="radio" name="selama" value="< 30 menit">
                                <label class="control-label" for="selama1">
                                  < 30 menit</label>
                              </div>
                              <div class="col-md-12">
                                <input id="selama2" type="radio" name="selama" value="> 30 menit">
                                <label class="control-label" for="selama2">
                                  > 30 menit</label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                        </div>
                      </div>
                      <script>
                        $(document).ready(function() {
                          $('input[name="keluhan"]').change(function() {
                            if ($(this).val() === 'Ya') {
                              $('#banyak2').show();
                            } else {
                              $('#banyak2').hide();
                            }
                          });
                        });
                      </script>

                      <div class="col-md-12">
                        <h5 style="margin-top: 30px;"><strong>
                            <label class="control-label mb-10 text-left"><b>AKTIFITAS DAN ISTIRAHAT</b></label>
                          </strong>
                        </h5>
                      </div>

                      <div class="col-md-12">
                        <h5 style="margin-top: 30px;">
                          <label class="control-label mb-10 text-left">Kemampuan melakukan aktifitas
                            sehari-hari</label>

                        </h5>
                      </div>
                      <div class="col-md-12">
                        <div class="col-md-3">
                          <div class="form-group form-group-spacing">
                            <div class="col-md-12">
                              <label class="control-label mb-10 text-left">Personal Hygiene :</label>
                              <span id="hygiene_error" class="text-danger"></span>
                              <div class="radio-button radio-button-primary">
                                <div class="col-md-12">
                                  <input id="hygiene1" type="radio" name="hygiene" value="0">
                                  <label class="control-label" for="hygiene1">Bantuan (0)</label>
                                </div>
                                <div class="col-md-12">
                                  <input id="hygiene2" type="radio" name="hygiene" value="5">
                                  <label class="control-label" for="hygiene2">Mandiri (5)</label>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                          </div>
                          <div class="form-group form-group-spacing">
                            <div class="col-md-12">
                              <label class="control-label mb-10 text-left">Makan :</label>
                              <span id="makan_error" class="text-danger"></span>
                              <div class="radio-button radio-button-primary">
                                <div class="col-md-12">
                                  <input id="makan1" type="radio" name="makan" value="5">
                                  <label class="control-label" for="makan1">Bantuan (5)</label>
                                </div>
                                <div class="col-md-12">
                                  <input id="makan2" type="radio" name="makan" value="10">
                                  <label class="control-label" for="makan2">Mandiri (10)</label>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                          </div>
                          <div class="form-group form-group-spacing">
                            <div class="col-md-12">
                              <label class="control-label mb-10 text-left">Mandi :</label>
                              <span id="mandi_error" class="text-danger"></span>
                              <div class="radio-button radio-button-primary">
                                <div class="col-md-12">
                                  <input id="mandi1" type="radio" name="mandi" value="0">
                                  <label class="control-label" for="mandi1">Bantuan (0)</label>
                                </div>
                                <div class="col-md-12">
                                  <input id="mandi2" type="radio" name="mandi" value="5">
                                  <label class="control-label" for="mandi2">Mandiri (5)</label>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                          </div>
                          <div class="form-group form-group-spacing">
                            <div class="col-md-12">
                              <label class="control-label mb-10 text-left">Aktivitas Toilet :</label>
                              <span id="toilet_error" class="text-danger"></span>
                              <div class="radio-button radio-button-primary">
                                <div class="col-md-12">
                                  <input id="toilet1" type="radio" name="toilet" value="5">
                                  <label class="control-label" for="toilet1">Bantuan (5)</label>
                                </div>
                                <div class="col-md-12">
                                  <input id="toilet2" type="radio" name="toilet" value="10">
                                  <label class="control-label" for="toilet2">Mandiri (10)</label>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                          </div>
                          <div class="form-group form-group-spacing">
                            <div class="col-md-12">
                              <label class="control-label mb-10 text-left">Naik turun tangga :</label>
                              <span id="tangga_error" class="text-danger"></span>
                              <div class="radio-button radio-button-primary">
                                <div class="col-md-12">
                                  <input id="tangga1" type="radio" name="tangga" value="5">
                                  <label class="control-label" for="tangga1">Bantuan (5)</label>
                                </div>
                                <div class="col-md-12">
                                  <input id="tangga2" type="radio" name="tangga" value="10">
                                  <label class="control-label" for="tangga2">Mandiri (10)</label>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group form-group-spacing">
                            <div class="col-md-12">
                              <label class="control-label mb-10 text-left">Memakai pakaian :</label>
                              <span id="pakaian_error" class="text-danger"></span>
                              <div class="radio-button radio-button-primary">
                                <div class="col-md-12">
                                  <input id="pakaian1" type="radio" name="pakaian" value="0">
                                  <label class="control-label" for="pakaian1">Bantuan (0)</label>
                                </div>
                                <div class="col-md-12">
                                  <input id="pakaian2" type="radio" name="pakaian" value="5">
                                  <label class="control-label" for="pakaian2">Mandiri (5)</label>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                          </div>
                          <div class="form-group form-group-spacing">
                            <div class="col-md-12">
                              <label class="control-label mb-10 text-left">Kontrol BAB :</label>
                              <span id="kontrolBab_error" class="text-danger"></span>
                              <div class="radio-button radio-button-primary">
                                <div class="col-md-12">
                                  <input id="kontrolBab1" type="radio" name="kontrolBab" value="5">
                                  <label class="control-label" for="kontrolBab1">Bantuan (5)</label>
                                </div>
                                <div class="col-md-12">
                                  <input id="kontrolBab2" type="radio" name="kontrolBab" value="10">
                                  <label class="control-label" for="kontrolBab2">Mandiri (10)</label>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                          </div>
                          <div class="form-group form-group-spacing">
                            <div class="col-md-12">
                              <label class="control-label mb-10 text-left">Kontrol BAK :</label>
                              <span id="kontrolBak_error" class="text-danger"></span>
                              <div class="radio-button radio-button-primary">
                                <div class="col-md-12">
                                  <input id="kontrolBak1" type="radio" name="kontrolBak" value="0">
                                  <label class="control-label" for="kontrolBak1">Bantuan (0)</label>
                                </div>
                                <div class="col-md-12">
                                  <input id="kontrolBak2" type="radio" name="kontrolBak" value="5">
                                  <label class="control-label" for="kontrolBak2">Mandiri (5)</label>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                          </div>
                          <div class="form-group form-group-spacing">
                            <div class="col-md-12">
                              <label class="control-label mb-10 text-left">Transfer jursi/tempat tidur :</label>
                              <span id="transfer_error" class="text-danger"></span>
                              <div class="radio-button radio-button-primary">
                                <div class="col-md-12">
                                  <input id="transfer1" type="radio" name="transfer" value="5">
                                  <label class="control-label" for="transfer1">Bantuan (5)</label>
                                </div>
                                <div class="col-md-12">
                                  <input id="transfer2" type="radio" name="transfer" value="10">
                                  <label class="control-label" for="transfer2">Mandiri (10)</label>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                          </div>
                          <div class="form-group form-group-spacing">
                            <div class="col-md-12">
                              <label class="control-label mb-10 text-left">Berjalan di permukaan datar :</label>
                              <span id="berjalan_error" class="text-danger"></span>
                              <div class="radio-button radio-button-primary">
                                <div class="col-md-12">
                                  <input id="berjalan1" type="radio" name="berjalan" value="5">
                                  <label class="control-label" for="berjalan1">Bantuan (5)</label>
                                </div>
                                <div class="col-md-12">
                                  <input id="berjalan2" type="radio" name="berjalan" value="10">
                                  <label class="control-label" for="berjalan2">Mandiri (10)</label>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!-- <div class="col-md-12">
                          <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                        </div> -->
                        </div>
                        <!-- <div class="col-md-12">
                        <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                      </div> -->
                        <div class="form-group col-md-2">
                          <label class="control-label mb-10 text-left"> Total :</label>
                          <span id="aktifitas_score_error" class="text-danger"></span>
                          <div class=" ">
                            <input class="form-control" cols="1" rows="1" id="aktifitas_score" name="aktifitas_score" disabled></input>
                            <span class="help-block text-danger"></span>
                          </div>
                        </div>

                        <div class="row">
                          <div class="form-group col-md-10">
                            <label class="control-label mb-10 text-left" style="opacity: 0.75;">Keterangan: </label>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group ">
                            <label class="control-label mb-10 text-left" style="opacity: 0.75;">- Kertergantugan total
                              (0-20) <strong></strong></label>
                          </div>
                          <div class="form-group">
                            <label class="control-label mb-10 text-left" style="opacity: 0.75;">- Ketergantungan berat
                              (21-60)</label>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label class="control-label mb-10 text-left" style="opacity: 0.75;">- Ketergantungan
                              sedang
                              (61-90)</label>
                          </div>
                          <!-- </div> -->
                        </div>
                        <!-- <div class="row"> -->
                        <div class="form-group">
                          <label class="control-label mb-10 text-left" style="opacity: 0.75;">- Ketergantungan ringan
                            (91-99)</label>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-12">
                      <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                    </div>



                    <div class="form-group form-group-spacing">
                      <div class="col-md-12">
                        <label class="control-label mb-10 text-left">Pola Istirahat Sehari-hari :</label>
                        <span id="pola_error" class="text-danger"></span>
                        <div class="radio-button radio-button-primary">
                          <div class="col-md-3">
                            <input id="pola1" type="radio" name="pola" value="Normal">
                            <label class="control-label" for="pola1">
                              Normal</label>
                          </div>
                          <div class="col-md-3">
                            <input id="pola2" type="radio" name="pola" value="Insomnia">
                            <label class="control-label" for="pola2">
                              Insomnia</label>
                          </div>
                          <div class="col-md-3">
                            <input id="pola3" type="radio" name="pola" value="Sulit memulai tidur">
                            <label class="control-label" for="pola3">
                              Sulit memulai tidur</label>
                          </div>
                          <div class="col-md-3">
                            <input id="pola7" type="radio" name="pola" value="Lainnya">
                            <label class="control-label" for="pola7">
                              Lainnya</label>
                          </div>
                          <div class="col-md-3">
                            <input id="pola5" type="radio" name="pola" value="Sering terbangun akibat nyeri">
                            <label class="control-label" for="pola5">
                              Sering terbangun akibat nyeri</label>
                          </div>
                          <div class="col-md-3">
                            <input id="pola6" type="radio" name="pola" value="Sering terbangun akibat kecemasan">
                            <label class="control-label" for="pola6">
                              Sering terbangun akibat kecemasan</label>
                          </div>
                          <div class="col-md-3">
                            <input id="pola4" type="radio" name="pola" value="Pola tidur tidak teratur">
                            <label class="control-label" for="pola4">
                              Pola tidur tidak teratur</label>
                          </div>
                        </div>
                        <div class="col-md-3  ">
                          <input type="text" class="form-control" id="polaa" name="polaa" style="display:none">
                          <span class="help-block"></span>
                        </div>
                        <script>
                          $(document).ready(function() {
                            // Event listener untuk perubahan pada radio button riwayat transfusi darah
                            $('input[name="pola"]').change(function() {
                              if ($(this).val() === 'Lainnya') {
                                $('#polaa').show(); // Menampilkan input teks jika 'Pernah' dipilih
                              } else {
                                $('#polaa').hide(); // Menyembunyikan input teks jika 'Tidak' dipilih atau pilihan lainnya
                              }
                            });
                          });
                        </script>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                    </div>
                    <div class="form-group form-group-spacing">
                      <div class="col-md-12">
                        <label class="control-label mb-10 text-left">Apakah Pasien Mengatasi Masalah Tidur dengan Obat
                          Tidur/Penenang:</label>
                      </div>
                      <div class="form-group col-md-3">
                        <span id="cara_error" class="text-danger"></span>
                        <div class="radio-button radio-button-primary">
                          <div class="col-md-12">
                            <input id="cara1" type="radio" name="cara" value="Ya">
                            <label class="control-label" for="cara1">
                              Ya</label>
                          </div>
                        </div>
                        <div class="radio-button radio-button-primary">
                          <div class="col-md-12">
                            <input id="cara2" type="radio" name="cara" value="Tidak">
                            <label class="control-label" for="cara2">
                              Tidak</label>
                          </div>
                        </div>
                      </div>
                      <div class=" " id="ya" style="display: none">
                        <div class="col-md-1">
                          <label class="control-label mb-10 text-left">Jika ya :</label>
                        </div>
                        <div class="form-group col-md-3">
                          <span id="cara_error" class="text-danger"></span>
                          <div class="radio-button radio-button-primary">
                            <div class="col-md-12">
                              <input id="cara3" type="radio" name="caraa" value="Resep dokter">
                              <label class="control-label" for="cara3">
                                Resep dokter</label>
                            </div>
                          </div>
                          <div class="radio-button radio-button-primary">
                            <div class="col-md-12">
                              <input id="cara4" type="radio" name="caraa" value="Obat herbal">
                              <label class="control-label" for="cara4">
                                Obat herbal</label>
                            </div>
                          </div>
                          <div class="radio-button radio-button-primary">
                            <div class="col-md-12">
                              <input id="cara5" type="radio" name="caraa" value="Lain-lain">
                              <label class="control-label" for="cara5">
                                Lain-lain</label>
                            </div>
                          </div>
                        </div>
                      </div>
                      <script>
                        $(document).ready(function() {
                          // Event listener untuk perubahan pada radio button riwayat transfusi darah
                          $('input[name="cara"]').change(function() {
                            if ($(this).val() === 'Ya') {
                              $('#ya').show(); // Menampilkan input teks jika 'Pernah' dipilih
                            } else {
                              $('#ya').hide(); // Menyembunyikan input teks jika 'Tidak' dipilih atau pilihan lainnya
                            }
                          });
                        });
                      </script>
                    </div>
                    <!-- <div class="col-md-12">
                    <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                  </div> -->

                    <div class="col-md-12">
                      <h5 style="margin-top: 30px;"><strong>
                          <label class="control-label mb-10 text-left"><b>PROTEKSI DAN RESIKO</b></label>
                        </strong>
                      </h5>
                    </div>
                    <div class="col-md-12">
                      <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                    </div>

                    <div class="form-group form-group-spacing">
                      <div class="col-md-12">
                        <label class="control-label mb-10 text-left">Status Mental :</label>
                        <span id="mental_error" class="text-danger"></span>
                        <div class="radio-button radio-button-primary">
                          <div class="col-md-3">
                            <input id="mental1" type="radio" name="mental" value="Orientas">
                            <label class="control-label" for="mental1">
                              Orientas</label>
                          </div>
                          <div class="col-md-3">
                            <input id="mental2" type="radio" name="mental" value="Menyerang">
                            <label class="control-label" for="mental2">
                              Menyerang</label>
                          </div>
                          <div class="col-md-3">
                            <input id="mental3" type="radio" name="mental" value="Tidak ada respon">
                            <label class="control-label" for="mental3">
                              Tidak ada respon</label>
                          </div>
                          <div class="col-md-3">
                            <input id="mental4" type="radio" name="mental" value="Waktu">
                            <label class="control-label" for="mental4">
                              Waktu</label>
                          </div>
                          <div class="col-md-3">
                            <input id="mental5" type="radio" name="mental" value="Koorperatif">
                            <label class="control-label" for="mental5">
                              Koorperatif</label>
                          </div>
                          <div class="col-md-3">
                            <input id="mental6" type="radio" name="mental" value="Disorientasi orang">
                            <label class="control-label" for="mental6">
                              Disorientasi orang</label>
                          </div>
                          <div class="col-md-3">
                            <input id="mental7" type="radio" name="mental" value="Tempat">
                            <label class="control-label" for="mental7">
                              Tempat</label>
                          </div>
                          <div class="col-md-3">
                            <input id="mental8" type="radio" name="mental" value="Lainnya">
                            <label class="control-label" for="mental8">
                              Lainnya</label>
                          </div>
                          <div class="col-md-3">
                            <input id="mental9" type="radio" name="mental" value="Letargi">
                            <label class="control-label" for="mental9">
                              Letargi</label>
                          </div>
                          <div class="col-md-6">
                            <input id="mental10" type="radio" name="mental" value="Kejang-kejang dan frekuensi">
                            <label class="control-label" for="mental10">
                              Kejang-kejang dan frekuensi</label>
                          </div>
                          <div class="col-md-3">
                            <!-- <label class="control-label mb-10 text-left">Jumlah/Hari<span class="help"></span></label> -->
                            <div class=" " id="mental" style="display: none;">
                              <input id="mentall" type="text" class="form-control" name="mentall">
                            </div>
                          </div>
                        </div>
                        <script>
                          $(document).ready(function() {
                            // Event listener untuk perubahan pada radio button riwayat transfusi darah
                            $('input[name="mental"]').change(function() {
                              if ($(this).val() === 'Lainnya') {
                                $('#mental').show(); // Menampilkan input teks jika 'Pernah' dipilih
                              } else {
                                $('#mental').hide(); // Menyembunyikan input teks jika 'Tidak' dipilih atau pilihan lainnya
                              }
                            });
                          });
                        </script>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                    </div>

                    <div class="form-group form-group-spacing">
                      <div class="col-md-12">
                        <strong>
                          <label class="control-label mb-10 text-left">
                            <p><br>Pengkajian Restrain :</p>
                          </label>
                        </strong>
                      </div>
                      <div class="form-group">
                        <div class="col-md-3">
                          <div class="row">
                            <div class="radio-button radio-button-primary">
                              <input id="taliIkat2" type="radio" name="taliIkat" value="Tidak">
                              <label class="control-label" for="taliIkat2">
                                Tidak
                              </label>
                            </div>
                            <div class="radio-button radio-button-primary">
                              <input id="taliIkat2" type="radio" name="taliIkat" value="Ya">
                              <label class="control-label" for="taliIkat2">
                                Ya
                              </label>
                            </div>
                          </div>
                          <div class=" " id="taliIkat_detail" style="display: none;">
                            <input type="text" class="form-control" name="taliIkat_detail" id="taliIkat_detail" placeholder="">
                            <span class="help-block"></span>
                          </div>
                        </div>
                      </div>
                      <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
                      <script>
                        $(document).ready(function() {
                          // Event listener untuk perubahan pada radio button riwayat transfusi darah
                          $('input[name="taliIkat"]').change(function() {
                            if ($(this).val() === 'Ya') {
                              $('#taliIkat_detail').show(); // Menampilkan input teks jika 'Pernah' dipilih
                            } else {
                              $('#taliIkat_detail').hide(); // Menyembunyikan input teks jika 'Tidak' dipilih atau pilihan lainnya
                            }
                          });
                        });
                      </script>
                      <!-- <div class="col-md-12">
                        <label class="control-label mb-10 text-left">Pengkajian Restrain (tali ikat) :</label>
                        <span id="taliIkat_error" class="text-danger"></span>
                        <div class="radio-button radio-button-primary"> -->
                      <!-- <div class="col-md-12">
                              <input id="taliIkat" type="radio" name="taliIkat" value="Ada masalah">
                              <label class="control-label" for="taliIkat">Ada masalah</label>
                            </div> -->
                      <!-- <div class="col-md-3">
                            <input id="taliIkat" type="text" class="form-control" name="taliIkat" placeholder="Masalah restrain">
                          </div>
                        </div>
                      </div> -->

                      <div class="col-md-12">
                        <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                      </div>

                      <div class="col-md-12">
                        <h5 style="margin-top: 30px;"><strong>
                            <label class="control-label mb-10 text-left">PENGKAJIAN RESIKO JATUH</label>
                          </strong>
                        </h5>
                      </div>

                      <div class="col-md-12">
                        <div class="col-md-12">
                          <div class="form-group form-group-spacing">
                            <div class="col-md-12">
                              <label class="control-label mb-10 text-left">A. Riwayat Jatuh Pasien :</label>
                              <span id="umur_error" class="text-danger"></span>
                              <div class="radio-button radio-button-primary">
                                <div class="col-md-12">
                                  <input id="umur1" type="radio" name="umur" value="0">
                                  <label class="control-label" for="umur1">
                                    Tidak (0)</label>
                                </div>
                                <div class="col-md-12">
                                  <input id="umur2" type="radio" name="umur" value="25">
                                  <label class="control-label" for="umur2">Ya (25)</label>
                                </div>
                                <!-- <div class="col-md-12">
                                  <input id="umur3" type="radio" name="umur" value="2">
                                  <label class="control-label" for="umur3">7-13 tahun (2)</label>
                                </div>
                                <div class="col-md-12">
                                  <input id="umur4" type="radio" name="umur" value="1">
                                  <label class="control-label" for="umur4">> 13 tahun (1)</label>
                                </div> -->
                              </div>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                          </div>
                          <div class="form-group form-group-spacing">
                            <div class="col-md-12">
                              <label class="control-label mb-10 text-left">B. Diagnosa Sekunder :</label>
                              <span id="jenis_kelamin_error" class="text-danger"></span>
                              <div class="radio-button radio-button-primary">
                                <div class="col-md-12">
                                  <input id="jenis_kelamin1" type="radio" name="jenis_kelamin" value="0">
                                  <label class="control-label" for="jenis_kelamin1">Tidak (0)</label>
                                </div>
                                <div class="col-md-12">
                                  <input id="jenis_kelamin2" type="radio" name="jenis_kelamin" value="15">
                                  <label class="control-label" for="jenis_kelamin2">Ya (15)</label>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                          </div>
                          <div class="form-group form-group-spacing">
                            <div class="col-md-12">
                              <label class="control-label mb-10 text-left">C. Menggunakan Alat Bantu :</label>
                              <span id="diagnosis_error" class="text-danger"></span>
                              <div class="radio-button radio-button-primary">
                                <div class="col-md-12">
                                  <input id="diagnosis1" type="radio" name="diagnosis" value="0">
                                  <label class="control-label" for="diagnosis1">Tidak Ada/Bedrest/Dibantu Perawat (0)</label>
                                </div>
                                <div class="col-md-12">
                                  <input id="diagnosis2" type="radio" name="diagnosis" value="15">
                                  <label class="control-label" for="diagnosis2">Kruk/Tongkat (15)</label>
                                </div>
                                <div class="col-md-12">
                                  <input id="diagnosis3" type="radio" name="diagnosis" value="30">
                                  <label class="control-label" for="diagnosis3">Kursi/Perabot (30)</label>
                                </div>
                                <!-- <div class="col-md-12">
                                  <input id="diagnosis4" type="radio" name="diagnosis" value="1">
                                  <label class="control-label" for="diagnosis4">Diagnosa lain-lain (1)</label>
                                </div> -->
                              </div>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                          </div>
                          <div class="form-group form-group-spacing">
                            <div class="col-md-12">
                              <label class="control-label mb-10 text-left">D. Menggunakan Infus/Heparin/Pengencer Dara :</label>
                              <span id="gangguan_error" class="text-danger"></span>
                              <div class="radio-button radio-button-primary">
                                <div class="col-md-12">
                                  <input id="gangguan1" type="radio" name="gangguan" value="0">
                                  <label class="control-label" for="gangguan1">Tidak (0)</label>
                                </div>
                                <div class="col-md-12">
                                  <input id="gangguan2" type="radio" name="gangguan" value="20">
                                  <label class="control-label" for="gangguan2">Ya (20)</label>
                                </div>
                                <!-- <div class="col-md-12">
                                  <input id="gangguan3" type="radio" name="gangguan" value="1">
                                  <label class="control-label" for="gangguan3">Berorientasi terhadap kemampuan diri (1)</label>
                                </div> -->
                              </div>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                          </div>
                          <div class="form-group form-group-spacing">
                            <div class="col-md-12">
                              <label class="control-label mb-10 text-left">E. Gaya Berjalan :</label>
                              <span id="faktor_error" class="text-danger"></span>
                              <div class="radio-button radio-button-primary">
                                <div class="col-md-12">
                                  <input id="faktor1" type="radio" name="faktor" value="0">
                                  <label class="control-label" for="faktor1">Normal/Bedrest/Kursi Roda (0)</label>
                                </div>
                                <div class="col-md-12">
                                  <input id="faktor2" type="radio" name="faktor" value="10">
                                  <label class="control-label" for="faktor2">Lemah (10)</label>
                                </div>
                                <div class="col-md-12">
                                  <input id="faktor3" type="radio" name="faktor" value="20">
                                  <label class="control-label" for="faktor3">Terganggu (20)</label>
                                </div>
                                <!-- <div class="col-md-12">
                                  <input id="faktor4" type="radio" name="faktor" value="1">
                                  <label class="control-label" for="faktor4">Area rawat jalan (1)<label>
                                </div> -->
                              </div>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group form-group-spacing">
                            <div class="col-md-12">
                              <label class="control-label mb-10 text-left">F. Status Mental :</label>
                              <span id="anestesi_error" class="text-danger"></span>
                              <div class="radio-button radio-button-primary">
                                <div class="col-md-12">
                                  <input id="anestesi1" type="radio" name="anestesi" value="0">
                                  <label class="control-label" for="anestesi1">Menyadari Kemampuan (0)</label>
                                </div>
                                <div class="col-md-12">
                                  <input id="anestesi2" type="radio" name="anestesi" value="15">
                                  <label class="control-label" for="anestesi2">Lupa akan keterbatasan/Pelupa (15)</label>
                                </div>
                                <!-- <div class="col-md-12">
                                  <input id="anestesi3" type="radio" name="anestesi" value="2">
                                  <label class="control-label" for="anestesi3">> 48 jam/tidak (2)</label>
                                </div> -->
                              </div>
                            </div>
                          </div>
                          <!-- <div class="col-md-12">
                            <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                          </div>
                          <div class="form-group form-group-spacing">
                            <div class="col-md-12">
                              <label class="control-label mb-10 text-left">Gangguan obat-obatan :</label>
                              <span id="obatan_error" class="text-danger"></span>
                              <div class="radio-button radio-button-primary">
                                <div class="col-md-12">
                                  <input id="obatan1" type="radio" name="obatan" value="3">
                                  <label class="control-label" for="obatan1">Penggunaan: sedatives, hipnotics, barbirturates, pnenothiazines, antidepresants lexatives, diureties,
                                    narcotics, pasien ICU (3)</label>
                                </div>
                                <div class="col-md-12">
                                  <input id="obatan2" type="radio" name="obatan" value="2">
                                  <label class="control-label" for="obatan2">Satu dari obat tersebut di atas (2)</label>
                                </div>
                                <div class="col-md-12">
                                  <input id="obatan3" type="radio" name="obatan" value="1">
                                  <label class="control-label" for="obatan3">Obat-obatan lainnya (1)</label>
                                </div>
                              </div>
                            </div>
                          </div> -->
                          <div class="col-md-12">
                            <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                          </div>
                          <div class="form-group col-md-2">
                            <label class="control-label mb-10 text-left"> Total :</label>
                            <span id="resiko_score_error" class="text-danger"></span>
                            <div class=" ">
                              <input class="form-control" cols="1" rows="1" id="resiko_score" name="resiko_score" disabled></input>
                              <span class="help-block text-danger"></span>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="form-group col-md-10">
                            <label class="control-label mb-10 text-left" style="opacity: 0.75;">Keterangan: </label>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <!-- <div class="row"> -->
                          <div class="form-group ">
                            <label class="control-label mb-10 text-left" style="opacity: 0.75;">- Resiko Rendah
                              (0-24) <strong></strong></label>
                          </div>
                          <div class="form-group ">
                            <label class="control-label mb-10 text-left" style="opacity: 0.75;">- Resiko Sedang
                              (25-44) <strong></strong></label>
                          </div>
                          <div class="form-group ">
                            <label class="control-label mb-10 text-left" style="opacity: 0.75;">- Resiko Tinggi
                              (> 44) <strong></strong></label>
                          </div>
                        </div>

                        <div class="col-md-12">
                          <h5 style="margin-top: 30px;"><strong>
                              <label class="control-label mb-10 text-left">NUTRISI</label>
                            </strong>
                          </h5>
                        </div>

                        <!DOCTYPE html>
                        <html lang="en">

                        <head>
                          <meta charset="UTF-8">
                          <meta name="viewport" content="width=device-width, initial-scale=1.0">
                          <title>Form Intake Nutrisi</title>
                          <style>
                            .form-group {
                              margin-bottom: 15px;
                            }

                            .control-label {
                              margin-bottom: 5px;
                            }
                          </style>
                        </head>

                        <!DOCTYPE html>
                        <html lang="en">

                        <head>
                          <meta charset="UTF-8">
                          <meta name="viewport" content="width=device-width, initial-scale=1.0">
                          <title>Form Intake Nutrisi</title>
                          <style>
                            .form-group {
                              margin-bottom: 15px;
                            }

                            .control-label {
                              margin-bottom: 5px;
                            }

                            .radio-button {
                              margin-bottom: 10px;
                            }

                            .form-control {
                              margin-top: 5px;
                            }
                          </style>
                        </head>

                        <body>
                          <div class="form-group">
                            <div class="col-md-3">
                              <label class="control-label mb-10 text-left">Intake nutrisi lewat :</label>
                              <span id="intake_error" class="text-danger"></span>
                              <div class="radio-button radio-button-primary">
                                <input id="intake1" type="radio" name="intake" value="Oral">
                                <label class="control-label" for="intake1">Oral</label>
                              </div>
                              <div class="radio-button radio-button-primary">
                                <input id="intake2" type="radio" name="intake" value="NGT">
                                <label class="control-label" for="intake2">NGT</label>
                              </div>
                              <div class="radio-button radio-button-primary">
                                <input id="intake3" type="radio" name="intake" value="Gastrotomy">
                                <label class="control-label" for="intake3">Gastrotomy</label>
                              </div>
                              <div class="radio-button radio-button-primary">
                                <input id="intake4" type="radio" name="intake" value="Lain-lain">
                                <label class="control-label" for="intake4">Lain-lain</label>
                              </div>
                              <div id="intake_lain_lain" style="display: none;">
                                <input type="text" class="form-control" id="intake_lain_lain_textbox" name="intake_lain_lain_textbox">
                              </div>
                            </div>
                          </div>

                          <!-- Tambahkan library jQuery sebelum script Anda -->
                          <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->

                          <!-- Script Anda -->
                          <script>
                            $(document).ready(function() {
                              // Event listener untuk perubahan pada radio button
                              $('input[name="intake"]').change(function() {
                                if ($(this).val() === 'Lain-lain') {
                                  $('#intake_lain_lain').show(); // Menampilkan input teks jika 'Lain-lain' dipilih
                                } else {
                                  $('#intake_lain_lain').hide(); // Menyembunyikan input teks jika selain 'Lain-lain' dipilih
                                }
                              });
                            });
                          </script>
                        </body>

                        </html>


                        <!-- Tambahkan library jQuery sebelum script Anda -->
                        <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->

                        <!-- Script Anda -->
                        <script>
                          $(document).ready(function() {
                            // Event listener untuk perubahan pada radio button
                            $('input[name="intake"]').change(function() {
                              if ($(this).val() === 'Lain-lain') {
                                $('#intake_lain_lain').show(); // Menampilkan input teks jika 'Lain-lain' dipilih
                              } else {
                                $('#intake_lain_lain').hide(); // Menyembunyikan input teks jika selain 'Lain-lain' dipilih
                              }
                            });
                          });
                        </script>
                        </body>

                        </html>


                        <div class="form-group ">
                          <div class="col-md-4">
                            <label class="control-label mb-10 text-left">Masalah yang berhubungan dengan nutrisi :</label>
                            <span id="masalah_error" class="text-danger"></span>
                            <div class="radio-button radio-button-primary">
                              <input id="masalah1" type="radio" name="masalah" value="Mendapat Chemotheraphy">
                              <label class="control-label" for="masalah1">
                                Mendapat Chemotheraphy
                              </label>
                            </div>
                            <div class="radio-button radio-button-primary">
                              <input id="masalah2" type="radio" name="masalah" value="Hamil/menyusui">
                              <label class="control-label" for="masalah2">
                                Hamil/menyusui
                              </label>
                            </div>
                            <div class="radio-button radio-button-primary">
                              <input id="masalah3" type="radio" name="masalah" value="Mual">
                              <label class="control-label" for="masalah3">
                                Mual
                              </label>
                            </div>
                            <div class="radio-button radio-button-primary">
                              <input id="masalah4" type="radio" name="masalah" value="Muntah">
                              <label class="control-label" for="masalah4">
                                Muntah
                              </label>
                            </div>
                            <div class="radio-button radio-button-primary">
                              <input id="masalah5" type="radio" name="masalah" value="Sulit menelan">
                              <label class="control-label" for="masalah5">
                                Sulit menelan
                              </label>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                        </div>

                        <div class="form-group">
                          <div class="col-md-4">
                            <label class="control-label mb-10 text-left">Pasien dengan diagnosis khusus<span class="help"></span></label>
                            <span id="diagKhusus_error" class="text-danger"></span>
                            <div class=" ">
                              <input type="text" class="form-control" name="diagKhusus" id="diagKhusus" placeholder="Diabetes melitus, hipertensi, jantung, CKD, Stroke, dll">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                        </div>

                        <!-- <div class="col-md-12"> -->
                        <!DOCTYPE html>
                        <html lang="en">

                        <head>
                          <meta charset="UTF-8">
                          <meta name="viewport" content="width=device-width, initial-scale=1.0">
                          <title>Form Penurunan Berat Badan</title>
                          <style>
                            .form-group {
                              margin-bottom: 15px;
                            }

                            .control-label {
                              margin-bottom: 5px;
                            }

                            .radio-button {
                              margin-bottom: 10px;
                            }
                          </style>
                        </head>

                        <body>
                          <div class="col-md-12">
                            <div class="form-group form-group-spacing">
                              <div class="col-md-12">
                                <label class="control-label mb-10 text-left">1. Apakah pasien mengalami penurunan berat badan yang tidak direncanakan/tidak diinginkan dalam 6 bulan terakhir? :</label>
                                <span id="turun_error" class="text-danger"></span>
                                <div class="radio-button radio-button-primary">
                                  <div class="col-md-12">
                                    <input id="turun1" type="radio" name="turun" value="0">
                                    <label class="control-label" for="turun1">Tidak (0)</label>
                                  </div>
                                  <div class="col-md-12">
                                    <input id="turun2" type="radio" name="turun" value="2">
                                    <label class="control-label" for="turun2">Tidak yakin (2)</label>
                                  </div>
                                  <div class="col-md-12">
                                    <input id="turun3" type="radio" name="turun" value="00">
                                    <label class="control-label" for="turun3">Ya, ada penurunan berat badan sebanyak:</label>
                                  </div>
                                  <div id="detail_penurunan_berat" style="display: none;">
                                    <div class="col-md-12">
                                      <input id="turun4" type="radio" name="turunnn" value="1">
                                      <label class="control-label" for="turun4">1-5 Kg (1)</label>
                                    </div>
                                    <div class="col-md-12">
                                      <input id="turun5" type="radio" name="turunnn" value="2">
                                      <label class="control-label" for="turun5">6-10 Kg (2)</label>
                                    </div>
                                    <div class="col-md-12">
                                      <input id="turun6" type="radio" name="turunnn" value="3">
                                      <label class="control-label" for="turun6">11-15 Kg (3)</label>
                                    </div>
                                    <div class="col-md-12">
                                      <input id="turun7" type="radio" name="turunnn" value="4">
                                      <label class="control-label" for="turun7">> 15 Kg (4)</label>
                                    </div>
                                    <div class="col-md-12">
                                      <input id="turun8" type="radio" name="turunnn" value="2">
                                      <label class="control-label" for="turun8">Tidak tahu berapa Kg penurunannya (2)</label>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-12">
                              <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                            </div>
                          </div>

                          <!-- Tambahkan library jQuery sebelum script Anda -->
                          <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->

                          <!-- Script Anda -->
                          <script>
                            $(document).ready(function() {
                              // Event listener untuk perubahan pada radio button
                              $('input[name="turun"]').change(function() {
                                if ($(this).val() === '00') {
                                  $('#detail_penurunan_berat').show(); // Menampilkan detail penurunan berat badan jika 'Ya' dipilih
                                } else {
                                  $('#detail_penurunan_berat').hide(); // Menyembunyikan detail penurunan berat badan jika selain 'Ya' dipilih
                                  $('input[name="turunnn"]').prop('checked', false);
                                }
                              });
                            });
                          </script>
                        </body>

                        </html>


                        <div class="col-md-12">
                          <div class="form-group form-group-spacing">
                            <div class="col-md-12">
                              <label class="control-label mb-10 text-left">2. Apakah asupan makanan pasien berkurang karena penurunan nafsu makan/ kesulitan menerima makanan? :</label>
                              <span id="asupan_error" class="text-danger"></span>
                              <div class="radio-button radio-button-primary">
                                <div class="col-md-12">
                                  <input id="asupan1" type="radio" name="asupan" value="0">
                                  <label class="control-label" for="asupan1">Tidak (0)</label>
                                </div>
                                <div class="col-md-12">
                                  <input id="asupan2" type="radio" name="asupan" value="1">
                                  <label class="control-label" for="asupan2">Ya (1)</label>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                          </div>
                          <div class="form-group col-md-2">
                            <label class="control-label mb-10 text-left"> Total :</label>
                            <span id="nutrisi_score_error" class="text-danger"></span>
                            <div class=" ">
                              <input class="form-control" cols="1" rows="1" id="nutrisi_score" name="nutrisi_score" disabled></input>
                              <span class="help-block text-danger"></span>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="form-group col-md-10">
                          <label class="control-label mb-10 text-left" style="opacity: 0.75;">Keterangan: </label>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <!-- <div class="row"> -->
                        <div class="form-group ">
                          <label class="control-label mb-10 text-left" style="opacity: 0.75;">- Bila skor >= 2, pasien beresiko malnutrisi, konsul ke ahli gizi <strong></strong></label>
                        </div>

                      </div>

                      <div class="form-group ">
                        <div class="col-md-3">
                          <label class="control-label mb-10 text-left">BAB :</label>
                          <span id="BAB_error" class="text-danger"></span>
                          <div class="radio-button radio-button-primary">
                            <input id="BAB1" type="radio" name="bab" value="Normal">
                            <label class="control-label" for="bab1">
                              Normal
                            </label>
                          </div>
                          <div class="radio-button radio-button-primary">
                            <input id="bab2" type="radio" name="bab" value="Ileustomy">
                            <label class="control-label" for="bab2">
                              Ileustomy
                            </label>
                          </div>
                          <div class="radio-button radio-button-primary">
                            <input id="bab3" type="radio" name="bab" value="Konstipasi">
                            <label class="control-label" for="bab3">
                              Konstipasi
                            </label>
                          </div>
                          <div class="radio-button radio-button-primary">
                            <input id="bab4" type="radio" name="bab" value="Diare">
                            <label class="control-label" for="bab4">
                              Diare
                            </label>
                          </div>
                          <div class="radio-button radio-button-primary">
                            <input id="bab5" type="radio" name="bab" value="Colostomy">
                            <label class="control-label" for="bab5">
                              Colostomy
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group ">
                        <div class="col-md-3">
                          <label class="control-label mb-10 text-left">BAK</label>
                          <span id="BAK_error" class="text-danger"></span>
                          <div class="radio-button radio-button-primary">
                            <input id="BAK1" type="radio" name="bak" value="Normal">
                            <label class="control-label" for="bak1">
                              Normal
                            </label>
                          </div>
                          <div class="radio-button radio-button-primary">
                            <input id="bak2" type="radio" name="bak" value="Urin Menetes">
                            <label class="control-label" for="bak2">
                              Urin Menetes
                            </label>
                          </div>
                          <div class="radio-button radio-button-primary">
                            <input id="bak3" type="radio" name="bak" value="Inkonitesia">
                            <label class="control-label" for="bak3">
                              Inkonitesia
                            </label>
                          </div>
                          <div class="radio-button radio-button-primary">
                            <input id="bak4" type="radio" name="bak" value="Hemturia">
                            <label class="control-label" for="bak4">
                              Hemturia
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-md-12">
                          <h5 style="margin-top: 30px;"><strong>
                              <label class="control-label mb-10 text-left">SEKSUAL/REPRODUKSI
                                DEWASA<span class="help"></span></label>
                            </strong>
                          </h5>
                        </div>
                        <div class="form-group">
                          <div class="col-md-3">
                            <label class="control-label mb-10 text-left" id="title1">(Wanita)Apakah Hamil :</label>
                            <span id="hamil_error" class="text-danger"></span>
                            <div class="radio-button radio-button-primary">
                              <input id="hamil1" type="radio" name="hamil" value="Ya">
                              <label class="control-label" id="label1" for="hamil1">
                                Ya
                              </label>
                            </div>
                            <div class="radio-button radio-button-primary">
                              <input id="hamil2" type="radio" name="hamil" value="Tidak">
                              <label class="control-label" id="label2" for="hamil2">
                                Tidak
                              </label>
                            </div>
                            <div class="radio-button radio-button-primary">
                              <input id="hamil3" type="radio" name="hamil" value="Tidak Diketahui">
                              <label class="control-label" id="label3" for="hamil3">
                                Tidak Diketahui
                              </label>
                            </div>
                            <div class="col-md-12">
                              <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                            </div>
                            <!-- <div class="col-md-18">
                                <label class="control-label mb-10 text-left" id="title2">Tanggal Terakhir Haid<span class="help"></span></label>
                                <span id="haid_error" class="text-danger"></span>
                                <div class=" ">
                                  <input type="date" class="form-control" id="inHaid" name="inHaid">
                                  <span class="help-block"></span>
                                </div>
                              </div> -->
                          </div>
                          <div class="form-group">
                            <div class="col-md-3">
                              <label class="control-label mb-10 text-left" id="title3">Penggunaan Alat
                                Kontrasepsi</label>
                              <span id="kontrasepsi_error" class="text-danger"></span>
                              <div class="radio-button radio-button-primary">
                                <input id="kontrasepsi1" type="radio" name="kontrasepsi" value="Ya">
                                <label class="control-label" id="label4" for="kontrasepsi1">
                                  Ya
                                </label>
                              </div>
                              <div class="radio-button radio-button-primary">
                                <input id="kontrasepsi2" type="radio" name="kontrasepsi" value="Tidak">
                                <label class="control-label" id="label5" for="kontrasepsi2">
                                  Tidak
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-10">
                          <label class="control-label mb-3 text-left" id="title4">(Laki-Laki)Apakah Punya Masalah
                            Prostat</label>
                          <span id="prostat_error" class="text-danger"></span>
                          <div class="radio-button radio-button-primary">
                            <input id="prostat1" type="radio" name="prostat" value="Ya">
                            <label class="control-label" id="label6" for="Prostat1">
                              Ya
                            </label>
                          </div>
                          <div class="radio-button radio-button-primary">
                            <input id="prostat2" type="radio" name="prostat" value="Tidak">
                            <label class="control-label" id="label7" for="BAK2">
                              Tidak
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                      </div>
                      <div class="form-group">
                        <div class="col-md-12">
                          <h5 style="margin-top: 30px;"><strong>
                              <label class="control-label mb-10 text-left">SPIRITUAL<span class="help"></span></label>
                            </strong>
                          </h5>
                        </div>
                        <div class="col-md-3">
                          <label class="control-label mb-10 text-left">Agama<span class="help"></span></label>
                          <span id="agama_error" class="text-danger"></span>
                          <div class=" ">
                            <input type="text" class="form-control" name="agama" value="<?= $agama; ?>" disabled>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                        </div>
                        <div class="col-md-12">
                          <label class="control-label mb-10 text-left">Apakah Memerlukan Pemuka Agama</label>
                          <span id="pemuka_error" class="text-danger"></span>
                          <div class="radio-button radio-button-primary">
                            <input id="pemuka1" type="radio" name="pemuka" value="Ya">
                            <label class="control-label" for="pemuka1">
                              Ya
                            </label>
                          </div>
                          <div class="radio-button radio-button-primary">
                            <input id="pemuka2" type="radio" name="pemuka" value="Tidak">
                            <label class="control-label" for="pemuka2">
                              Tidak
                            </label>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                        </div>
                        <div class="col-md-10">
                          <label class="control-label mb-10 text-left">Keperluan/Larangan :</label>
                          <span id="keperluan_error" class="text-danger"></span>
                          <div class="checkbox checkbox-success">
                            <input id="keperluan1" type="checkbox" name="keperluan" value="Menolak dilakukan tranfusi darah karena kepercayaan">
                            <label class="control-label" for="keperluan1">
                              Menolak dilakukan tranfusi darah karena kepercayaan
                            </label>
                          </div>
                          <div class="checkbox checkbox-success">
                            <input id="keperluan2" type="checkbox" name="keperluan" value="Menolak pulang hari tertentu karena kepercayaan">
                            <label class="control-label" for="keperluan2">
                              Menolak pulang hari tertentu karena kepercayaan
                            </label>
                          </div>
                          <div class="checkbox checkbox-success">
                            <input id="keperluan3" type="checkbox" name="keperluan" value="Menolak dilayani oleh petugas atau perawat laki-laki">
                            <label class="control-label" for="keperluan3">
                              Menolak dilayani oleh petugas / perawat laki-laki
                            </label>
                          </div>
                          <div class="checkbox checkbox-success">
                            <input id="keperluan4" type="checkbox" name="keperluan" value="Menolak dilayani oleh petugas atau perawat perempuan">
                            <label class="control-label" for="keperluan4">
                              Menolak dilayani oleh petugas / perawat perempuan
                            </label>
                          </div>
                          <div class="checkbox checkbox-success">
                            <input id="keperluan5" type="checkbox" name="keperluan" value="Menolak dirawat oleh medis dan mencari pengobatan alternatif">
                            <label class="control-label" for="keperluan5">
                              Menolak dirawat oleh medis dan mencari pengobatan alternatif
                            </label>
                          </div>
                          <div class="checkbox checkbox-success">
                            <input id="keperluan6" type="checkbox" name="keperluan" value="Bimbingan Ibadah">
                            <label class="control-label" for="keperluan6">
                              Bimbingan Ibadah
                            </label>
                          </div>
                          <div class="checkbox checkbox-success">
                            <input id="keperluan7" type="checkbox" name="keperluan" value="Motivasi Kesembuhan">
                            <label class="control-label" for="keperluan7">
                              Motivasi Kesembuhan
                            </label>
                          </div>
                        </div>

                        <div class="col-md-12">
                          <h5 style="margin-top: 30px;"><strong>
                              <span id="idMasalahKep_error" class="text-danger"></span>
                              <label class="control-label mb-10 text-left"><b>BAGIAN 4 MASALAH KEPERAWATAN</b><span class="help"></span></label>
                            </strong></h5>
                        </div>

                        <?php if (!empty($masalah_keperawatan)) : ?>
                          <div class="row">
                            <!-- Kolom pertama -->
                            <div class="col-md-6">
                              <?php for ($i = 0; $i < ceil(count($masalah_keperawatan) / 2); $i++) : ?>
                                <?php $masalah = $masalah_keperawatan[$i]; ?>
                                <div class="checkbox checkbox-success">
                                  <input id="keperawatan<?= $masalah->id_masalah_kep; ?>" type="checkbox" name="keperawatan[]" value="<?= $masalah->id_masalah_kep; ?>">
                                  <label class="control-label" for="keperawatan<?= $masalah->id_masalah_kep; ?>">
                                    <?= $masalah->nama; ?>
                                  </label>
                                </div>
                              <?php endfor; ?>
                            </div>

                            <!-- Kolom kedua -->
                            <div class="col-md-6">
                              <?php for ($i = ceil(count($masalah_keperawatan) / 2); $i < count($masalah_keperawatan); $i++) : ?>
                                <?php $masalah = $masalah_keperawatan[$i]; ?>
                                <div class="checkbox checkbox-success">
                                  <input id="keperawatan<?= $masalah->id_masalah_kep; ?>" type="checkbox" name="keperawatan[]" value="<?= $masalah->id_masalah_kep; ?>">
                                  <label class="control-label" for="keperawatan<?= $masalah->id_masalah_kep; ?>">
                                    <?= $masalah->nama; ?>
                                  </label>
                                </div>
                              <?php endfor; ?>
                            </div>
                          </div>
                        <?php else : ?>
                          <p>Tidak ada data masalah keperawatan yang tersedia.</p>
                        <?php endif; ?>





                        <!-- <div class="col-md-4">
                          <label class="control-label mb-10 text-left">Daftar Masalah Keperawatan</label>
                          <span id="keperawatan_error" class="text-danger"></span>
                          <div class="checkbox checkbox-success">
                            <input id="keperawatan1" type="checkbox" name="keperawatan" value="Integritas Kulit">
                            <label class="control-label" for="keperawatan1">
                              Integritas Kulit
                            </label>
                          </div>
                          <div class="checkbox checkbox-success">
                            <input id="keperawatan2" type="checkbox" name="keperawatan" value="Keselamatan pasiena atau injuri">
                            <label class="control-label" for="keperawatan2">
                              Keselamatan pasien atau injuri
                            </label>
                          </div>
                          <div class="checkbox checkbox-success">
                            <input id="keperawatan3" type="checkbox" name="keperawatan" value="Nyeri">
                            <label class="control-label" for="keperawatan3">
                              Nyeri
                            </label>
                          </div>
                          <div class="checkbox checkbox-success">
                            <input id="keperawatan4" type="checkbox" name="keperawatan" value="Pola tidur">
                            <label class="control-label" for="keperawatan4">
                              Pola tidur
                            </label>
                          </div>
                          <div class="checkbox checkbox-success">
                            <input id="keperawatan5" type="checkbox" name="keperawatan" value="Penanganan nutrisi">
                            <label class="control-label" for="keperawatan5">
                              Penanganan nutrisi
                            </label>
                          </div>
                          <div class="checkbox checkbox-success">
                            <input id="keperawatan6" type="checkbox" name="keperawatan" value="Jalan nafas atau pertukaran gas">
                            <label class="control-label" for="keperawatan6">
                              Jalan nafas atau pertukaran gas
                            </label>
                          </div>
                          <div class="checkbox checkbox-success">
                            <input id="keperawatan7" type="checkbox" name="keperawatan" value="Perawatan diri">
                            <label class="control-label" for="keperawatan7">
                              Perawatan diri
                            </label>
                          </div>
                          <div class="checkbox checkbox-success">
                            <input id="keperawatan8" type="checkbox" name="keperawatan" value="Suhu tubuh">
                            <label class="control-label" for="keperawatan8">
                              Suhu tubuh
                            </label>
                          </div>
                          <div class="checkbox checkbox-success">
                            <input id="keperawatan9" type="checkbox" name="keperawatan" value="Mobilitas atau aktifitas">
                            <label class="control-label" for="keperawatan9">
                              Mobilitas atau aktifitas
                            </label>
                          </div>
                          <div class="checkbox checkbox-success">
                            <input id="keperawatan10" type="checkbox" name="keperawatan" value="Tumbuh kembang">
                            <label class="control-label" for="keperawatan10">
                              Tumbuh kembang
                            </label>
                          </div>
                          <div class="checkbox checkbox-success">
                            <input id="keperawatan11" type="checkbox" name="keperawatan" value="Konflik peran">
                            <label class="control-label" for="keperawatan11">
                              Konflik peran
                            </label>
                          </div>
                          <div class="checkbox checkbox-success">
                            <input id="keperawatan12" type="checkbox" name="keperawatan" value="Perfusi jaringan">
                            <label class="control-label" for="keperawatan12">
                              Perfusi jaringan
                            </label>
                          </div>
                          <div class="checkbox checkbox-success">
                            <input id="keperawatan13" type="checkbox" name="keperawatan" value="Pengetahuan atau komunikasi atau informasi">
                            <label class="control-label" for="keperawatan13">
                              Pengetahuan atau komunikasi atau informasi
                            </label>
                          </div>
                          <div class="checkbox checkbox-success">
                            <input id="keperawatan14" type="checkbox" name="keperawatan" value="Keseimbangan cairan atau elektrolit">
                            <label class="control-label" for="keperawatan14">
                              Keseimbangan cairan atau elektrolit
                            </label>
                          </div>
                          <div class="checkbox checkbox-success">
                            <input id="keperawatan15" type="checkbox" name="keperawatan" value="Eliminasi">
                            <label class="control-label" for="keperawatan15">
                              Eliminasi
                            </label>
                          </div>
                          <div class="checkbox checkbox-success">
                            <input id="keperawatan16" type="checkbox" name="keperawatan" value="Cemas">
                            <label class="control-label" for="keperawatan16">
                              Cemas
                            </label>
                          </div>
                          <div class="checkbox checkbox-success">
                            <input id="keperawatan17" type="checkbox" name="keperawatan" value="Lain-lain">
                            <label class="control-label" for="keperawatan17">
                              Lain-lain
                            </label>
                          </div>
                          <div class=" " id="keperawatan" style="display: none;">
                            <input type="text" class="form-control" name="keperawatann" id="keperawatann">
                            <!-- <span class="help-block"></span> -->
                      </div>
                    </div> -->

                    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
                    <script>
                      $(document).ready(function() {
                        // Event listener untuk perubahan pada checkbox 'Lainnya' riwayat penyakit keluarga
                        $('#keperawatan17').change(function() {
                          if ($(this).is(':checked')) {
                            $('#keperawatan').show(); // Menampilkan input teks jika 'Lainnya' dipilih
                          } else {
                            $('#keperawatan').hide(); // Menyembunyikan input teks jika tidak dipilih
                          }
                        });
                      });
                    </script>
                  </div>
                  <div class="col-md-12">
                    <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                  </div>


                  <div class="form-group">
                    <div class="col-md-12">
                      <h5 style="margin-top: 30px;"><strong>
                          <label class="control-label mb-10 text-left"><b>BAGIAN 5 EKONOMI/PSIKOSOSIAL<b><span class="help"></span></label>
                        </strong>
                      </h5>
                    </div>
                    <div class="col-md-12">
                      <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-3">
                          <label class="control-label mb-10 text-left">
                            STATUS PERNIKAHAN
                          </label>
                        </div>
                        <div class="col-md-2">
                          <span id="status_error" class="text-danger"></span>
                          <div class="radio-button radio-button-primary">
                            <input id="status1" type="radio" name="status" value="Kawin">
                            <label class="control-label" for="status">
                              Kawin
                            </label>
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="radio-button radio-button-primary">
                            <input id="status2" type="radio" name="status" value="Belum Kawin">
                            <label class="control-label" for="status2">
                              Belum Kawin
                            </label>
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="radio-button radio-button-primary">
                            <input id="status3" type="radio" name="status" value="Duda/Janda">
                            <label class="control-label" for="status3">
                              Duda/Janda
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-3">
                          <label class="control-label mb-10 text-left">
                            KELUARGA
                          </label>
                        </div>
                        <div class="col-md-2">
                          <span id="keluarga_error" class="text-danger"></span>
                          <div class="radio-button radio-button-primary">
                            <input id="keluarga1" type="radio" name="keluarga" value="Tinggal Serumah">
                            <label class="control-label" for="keluarga1">
                              Tinggal Serumah
                            </label>
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="radio-button radio-button-primary">
                            <input id="keluarga2" type="radio" name="keluarga" value="Sendiri">
                            <label class="control-label" for="keluarga2">
                              Sendiri
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-3">
                          <label class="control-label mb-10 text-left">
                            TEMPAT TINGGAL
                          </label>
                        </div>
                        <div class="col-md-2">
                          <span id="tinggal_error" class="text-danger"></span>
                          <div class="radio-button radio-button-primary">
                            <input id="tinggal1" type="radio" name="tinggal" value="Tinggal Serumah">
                            <label class="control-label" for="tinggal1">
                              Rumah
                            </label>
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="radio-button radio-button-primary">
                            <input id="tinggal2" type="radio" name="tinggal" value="Sendiri">
                            <label class="control-label" for="tinggal2">
                              Panti Asuhan
                            </label>
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="radio-button radio-button-primary">
                            <input id="tinggal3" type="radio" name="tinggal" value="Lainnya">
                            <label class="control-label" for="tinggal3">
                              Lainnya
                            </label>
                          </div>
                          <div class=" ">
                            <input type="text" class="form-control" id="tinggal" style="display:none">
                            <span class="help-block"></span>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                      </div>
                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-3">
                            <label class="control-label mb-10 text-left">
                              PEKERJAAN
                            </label>
                          </div>
                          <div class="col-md-2">
                            <span id="pekerjaan_error" class="text-danger"></span>
                            <div class="radio-button radio-button-primary">
                              <input id="pekerjaan1" type="radio" name="pekerjaan" value="PNS">
                              <label class="control-label" for="pekerjaan1">
                                PNS
                              </label>
                            </div>
                          </div>
                          <div class="col-md-2">
                            <div class="radio-button radio-button-primary">
                              <input id="pekerjaan2" type="radio" name="pekerjaan" value="Polri/TNI">
                              <label class="control-label" for="pekerjaan2">
                                Polri/TNI
                              </label>
                            </div>
                          </div>
                          <div class="col-md-2">
                            <div class="radio-button radio-button-primary">
                              <input id="pekerjaan3" type="radio" name="pekerjaan" value="Swasta">
                              <label class="control-label" for="pekerjaan3">
                                Swasta
                              </label>
                            </div>
                          </div>
                          <div class="col-md-2">
                            <div class="radio-button radio-button-primary">
                              <input id="pekerjaan4" type="radio" name="pekerjaan" value="Lainnya">
                              <label class="control-label" for="pekerjaan4">
                                Lainnya
                              </label>
                            </div>
                            <div class=" ">
                              <input type="text" class="form-control" id="pekerjaan" style="display:none">
                              <span class="help-block"></span>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                        </div>
                        <div class="form-group">
                          <div class="row">
                            <div class="col-md-3">
                              <label class="control-label mb-10 text-left">
                                AKTIVITAS
                              </label>
                            </div>
                            <div class="col-md-2">
                              <span id="aktivitas_error" class="text-danger"></span>
                              <div class="radio-button radio-button-primary">
                                <input id="aktivitas1" type="radio" name="aktivitas" value="Mandiri">
                                <label class="control-label" for="aktivitas1">
                                  Mandiri
                                </label>
                              </div>
                            </div>
                            <div class="col-md-2">
                              <div class="radio-button radio-button-primary">
                                <input id="aktivitas2" type="radio" name="aktivitas" value="Belum Kawin">
                                <label class="control-label" for="status2">
                                  Tongkat
                                </label>
                              </div>
                            </div>
                            <div class="col-md-2">
                              <div class="radio-button radio-button-primary">
                                <input id="aktivitas3" type="radio" name="aktivitas" value="Kursi Roda">
                                <label class="control-label" for="aktivitas3">
                                  Kursi Roda
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                        </div>
                        <div class="form-group">
                          <div class="row">
                            <div class="col-md-3">
                              <label class="control-label mb-10 text-left">
                                STATUS EMOSIONAL
                              </label>
                            </div>
                            <div class="col-md-2">
                              <span id="emosional_error" class="text-danger"></span>
                              <div class="radio-button radio-button-primary">
                                <input id="emosional1" type="radio" name="emosional" value="Depresi">
                                <label class="control-label" for="emosional1">
                                  Depresi
                                </label>
                              </div>
                            </div>
                            <div class="col-md-2">
                              <div class="radio-button radio-button-primary">
                                <input id="emosional2" type="radio" name="emosional" value="Cemas">
                                <label class="control-label" for="emosional2">
                                  Cemas
                                </label>
                              </div>
                            </div>
                            <div class="col-md-2">
                              <div class="radio-button radio-button-primary">
                                <input id="emosional3" type="radio" name="emosional" value="Kooperatif">
                                <label class="control-label" for="emosional3">
                                  Kooperatif
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                        </div>
                        <div class="form-group">
                          <div class="col-md-3">
                            <label class="control-label mb-10 text-left">Keluarga Terdekat<span class="help"></span></label>
                            <span id="kterdekat_error" class="text-danger"></span>
                            <div class=" ">
                              <input type="text" class="form-control" name="kterdekat">
                            </div>
                          </div>
                          <div class="col-md-2">
                            <label class="control-label mb-10 text-left">Hubungan<span class="help"></span></label>
                            <span id="hubungan_error" class="text-danger"></span>
                            <div class=" ">
                              <input type="text" class="form-control" name="hubungan">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                        </div>
                        <div class="form-group">
                          <div class="row">
                            <div class="col-md-12">
                              <label class="control-label mb-10 text-left">
                                Informasi ini didapat dari:
                              </label>
                            </div>
                            <div class="col-md-2">
                              <span id="informasi_error" class="text-danger"></span>
                              <div class="radio-button radio-button-primary">
                                <input id="informasi1" type="radio" name="informasi" value="Pasien">
                                <label class="control-label" for="informasi1">
                                  Pasien
                                </label>
                              </div>
                            </div>
                            <div class="col-md-2">
                              <div class="radio-button radio-button-primary">
                                <input id="informasi2" type="radio" name="informasi" value="Keluarga">
                                <label class="control-label" for="informasi2">
                                  Keluarga
                                </label>
                              </div>
                            </div>
                            <div class="col-md-2">
                              <div class="radio-button radio-button-primary">
                                <input id="informasi3" type="radio" name="informasi" value="Lainnya">
                                <label class="control-label" for="informasi3">
                                  Lainnya
                                </label>
                              </div>
                              <div class=" ">
                                <input type="text" class="form-control" id="informasi" style="display:none">
                                <span class="help-block"></span>
                              </div>
                            </div>
                          </div>
                        </div>


                        <div class="col-md-6">
                          <a class="btn btn-default btn-anim  btn-sm" onclick="javascript:history.go(-1)" style="margin-right: 20px; margin-left: 30px;"><i class="fa fa-arrow-left"></i><span class="btn-text">KEMBALI</span></a>
                          <button type="submit" class="btn btn-success mb-4" onclick="simpan()">Simpan</button>
                          <!-- <button type="submit" class="btn btn-success mb-4" onclick="cetak()">Cetak</button> -->
                        </div>
                      </div>
                      <!-- <div class="form-group ">
                                <div class="col-md-12">
                                  <label class="control-label mb-10 text-left">Kondisi Saat Masuk :</label>
                                  <span id="kondisi_error" class="text-danger"></span>
                                  <div class="radio-button radio-button-success">
                                    <input id="kondisi1" type="radio" name="kondisi" value="Mandiri">
                                    <label class="control-label" for="kondisi1">
                                      Mandiri
                                    </label>
                                  </div>
                                  <div class="radio-button radio-button-success">
                                    <input id="kondisi2" type="radio" name="kondisi" value="Tempat Tidur">
                                    <label class="control-label" for="kondisi2">
                                      Tempat Tidur
                                    </label>
                                  </div>
                                  <div class="radio-button radio-button-success">
                                    <input id="kondisi3" type="radio" name="kondisi" value="Dipapah">
                                    <label class="control-label" for="kondisi3">
                                      Dipapah
                                    </label>
                                  </div>
                                  <div class="radio-button radio-button-success">
                                    <input id="kondisi4" type="radio" name="kondisi" value="Lainnya">
                                    <label class="control-label col-mb-1 " for="kondisi4">
                                      Lain-lain:
                                    </label>
                                    <div class="col-mb-1  ">
                                      <input type="text" class="form-control" id="kondisi" style="display: none;">
                                      <span class="help-block"></span>
                                    </div>
                                  </div>
                                </div>
                              </div> -->

                    </div>
                  </div>
                </div>
              </div>

              <!-- </div> -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- </?php $this->load->view('assets/gambar_org') ?> -->
<!-- <style>
  canvas {
    cursor: crosshair;
    border: 1px solid #000000;
  }
</style> -->

<!-- <script src="</?= base_url(); ?>assets/dist/js/slider.js"></script> -->
<script src="<?= base_url(); ?>assets/dist/js/slider.js"></script>
<link rel="stylesheet" href="</?= base_url(); ?>assets/dist/css/range-slide.css">

<script type="text/javascript">
  $(function() {
    var jenis_kelamin = '<?= $jenis_kelamin; ?>';
    if (jenis_kelamin == 'PEREMPUAN') {
      $("#title4").hide();
      $("#label6").hide();
      $("#label7").hide();
      $("#prostat1").hide();
      $("#prostat2").hide();
    } else if (jenis_kelamin == 'LAKI-LAKI') {
      $("#title1").hide();
      $("#title2").hide();
      $("#title3").hide();
      $("#label1").hide();
      $("#label2").hide();
      $("#label3").hide();
      $("#label4").hide();
      $("#label5").hide();
      $("#hamil2").hide();
      $("#hamil3").hide();
      $("#hamil1").hide();
      $("#inHaid").hide();
      $("#kontrasepsi1").hide();
      $("#kontrasepsi2").hide();
    }

    $("#cMasuk3").click(function() {
      if ($(this).is(":checked")) {
        $("#cMasuk").show();
      }
    });
    $("#cMasuk1").click(function() {
      if ($(this).is(":checked")) {
        $("#cMasuk").hide();
      }
    });
    $("#cMasuk2").click(function() {
      if ($(this).is(":checked")) {
        $("#cMasuk").hide();
      }
    });
    $("#kondisi4").click(function() {
      if ($(this).is(":checked")) {
        $("#kondisi").show();
      }
    });
    $("#kondisi1").click(function() {
      if ($(this).is(":checked")) {
        $("#kondisi").hide();
      }
    });
    $("#kondisi2").click(function() {
      if ($(this).is(":checked")) {
        $("kondisi").hide();
      }
    });
    $("#kondisi3").click(function() {
      if ($(this).is(":checked")) {
        $("kondisi").hide();
      }
    });
    $("#penyebab1").click(function() {
      if ($(this).is(":checked")) {
        $("penyebab").hide();
      }
    });
    $("#penyebab2").click(function() {
      if ($(this).is(":checked")) {
        $("penyebab").hide();
      }
    });
    $("#penyebab3").click(function() {
      if ($(this).is(":checked")) {
        $("penyebab").hide();
      }
    });
    $("#karakter1").click(function() {
      if ($(this).is(":checked")) {
        $("karakter").hide();
      }
    });
    $("#karakter2").click(function() {
      if ($(this).is(":checked")) {
        $("karakter").hide();
      }
    });
    $("#karakter3").click(function() {
      if ($(this).is(":checked")) {
        $("karakter").hide();
      }
    });
    $("#karakter4").click(function() {
      if ($(this).is(":checked")) {
        $("karakter").hide();
      }
    });
    $("#karakter5").click(function() {
      if ($(this).is(":checked")) {
        $("karakter").hide();
      }
    });
    $("#karakter6").click(function() {
      if ($(this).is(":checked")) {
        $("karakter").hide();
      }
    });
    $("#karakter7").click(function() {
      if ($(this).is(":checked")) {
        $("karakter").hide();
      }
    });
    $("#frekuensi1").click(function() {
      if ($(this).is(":checked")) {
        $("frekuensi").hide();
      }
    });
    $("#frekuensi2").click(function() {
      if ($(this).is(":checked")) {
        $("frekuensi").hide();
      }
    });
    $("#nyeri1").click(function() {
      if ($(this).is(":checked")) {
        $("nyeri").hide();
      }
    });
    $("#durasi1").click(function() {
      if ($(this).is(":checked")) {
        $("durasi").hide();
      }
    });
    $("#durasi2").click(function() {
      if ($(this).is(":checked")) {
        $("durasi").hide();
      }
    });
    $("#selama1").click(function() {
      if ($(this).is(":checked")) {
        $("selama").hide();
      }
    });
    $("#selama2").click(function() {
      if ($(this).is(":checked")) {
        $("selama").hide();
      }
    });
    // $("#alergi_obat1").click(function() {
    //   if ($(this).is(":checked")) {
    //     $("#alergi_obat").hide();
    //   }
    // });
    $("#alergi_obat2").click(function() {
      if ($(this).is(":checked")) {
        $("#alergi_obat").hide();
      }
    });
    $("#keluhan1").click(function() {
      if ($(this).is(":checked")) {
        $("#keluhan").hide();
      }
    });
    $("#reaksi_alergi2").click(function() {
      if ($(this).is(":checked")) {
        $("#reaksi_alergi").hide();
      }
    });
    $("#transfusi_darah2").click(function() {
      if ($(this).is(":checked")) {
        $("#transfusi_darah").show();
      }
    });
    $("#transfusi_darah_detail").click(function() {
      if ($(this).is(":checked")) {
        $("#transfusi_darah").show();
      }
    });
    $("#taliIkat2").click(function() {
      if ($(this).is(":checked")) {
        $("#taliIkat2").show();
      }
    });
    $("#taliIkat_detail").click(function() {
      if ($(this).is(":checked")) {
        $("#taliIkat").show();
      }
    });
    $("#obat_penenang2").click(function() {
      if ($(this).is(":checked")) {
        $("#obat_penenang").show();
      }
    });
    $("#obat_penenang1").click(function() {
      if ($(this).is(":checked")) {
        $("#obat_penenang").hide();
      }
    });
    $("#tinggal3").click(function() {
      if ($(this).is(":checked")) {
        $("#tinggal").show();
      }
    });
    $("#tinggal1").click(function() {
      if ($(this).is(":checked")) {
        $("#tinggal").hide();
      }
    });
    $("#tinggal2").click(function() {
      if ($(this).is(":checked")) {
        $("#tinggal").hide();
      }
    });
    $("#informasi3").click(function() {
      if ($(this).is(":checked")) {
        $("#informasi").show();
      }
    });
    $("#informasi1").click(function() {
      if ($(this).is(":checked")) {
        $("#informasi").hide();
      }
    });
    $("#informasi2").click(function() {
      if ($(this).is(":checked")) {
        $("#informasi").hide();
      }
    });
    $("#pekerjaan3").click(function() {
      if ($(this).is(":checked")) {
        $("#pekerjaan").hide();
      }
    });
    $("#pekerjaan1").click(function() {
      if ($(this).is(":checked")) {
        $("#pekerjaan").hide();
      }
    });
    $("#pekerjaan2").click(function() {
      if ($(this).is(":checked")) {
        $("#pekerjaan").hide();
      }
    });
    $("#pekerjaan4").click(function() {
      if ($(this).is(":checked")) {
        $("#pekerjaan").show();
      }
    });
    $("#pola1").click(function() {
      if ($(this).is(":checked")) {
        $("#pola").show();
      }
    });
    $("#pola2").click(function() {
      if ($(this).is(":checked")) {
        $("#pola").show();
      }
    });
    $("#pola3").click(function() {
      if ($(this).is(":checked")) {
        $("#pola").show();
      }
    });
    $("#pola4").click(function() {
      if ($(this).is(":checked")) {
        $("#pola").show();
      }
    });
    $("#pola5").click(function() {
      if ($(this).is(":checked")) {
        $("#pola").show();
      }
    });
    $("#pola6").click(function() {
      if ($(this).is(":checked")) {
        $("#pola").show();
      }
    });
    $("#pola7").click(function() {
      if ($(this).is(":checked")) {
        $("#pola").show();
      }
    });
    $("#cara1").click(function() {
      if ($(this).is(":checked")) {
        $("#cara").show();
      }
    });
    $("#cara2").click(function() {
      if ($(this).is(":checked")) {
        $("#cara").show();
      }
    });
    $("#cara3").click(function() {
      if ($(this).is(":checked")) {
        $("#cara").show();
      }
    });
    $("#cara4").click(function() {
      if ($(this).is(":checked")) {
        $("#cara").show();
      }
    });
    $("#cara5").click(function() {
      if ($(this).is(":checked")) {
        $("#cara").show();
      }
    });
    $("#mental1").click(function() {
      if ($(this).is(":checked")) {
        $("#mental").show();
      }
    });
    $("#mental2").click(function() {
      if ($(this).is(":checked")) {
        $("#mental").show();
      }
    });
    $("#mental3").click(function() {
      if ($(this).is(":checked")) {
        $("#mental").show();
      }
    });
    $("#mental4").click(function() {
      if ($(this).is(":checked")) {
        $("#mental").show();
      }
    });
    $("#mental5").click(function() {
      if ($(this).is(":checked")) {
        $("#mental").show();
      }
    });
    $("#mental6").click(function() {
      if ($(this).is(":checked")) {
        $("#mental").show();
      }
    });
    $("#mental7").click(function() {
      if ($(this).is(":checked")) {
        $("#mental").show();
      }
    });
    $("#mental8").click(function() {
      if ($(this).is(":checked")) {
        $("#mental").show();
      }
    });
    $("#mental9").click(function() {
      if ($(this).is(":checked")) {
        $("#mental").show();
      }
    });
    $("#mental10").click(function() {
      if ($(this).is(":checked")) {
        $("#mental").show();
      }
    });
    // $("#taliIkat").click(function() {
    //   if ($(this).is(":checked")) {
    //     $("#taliIkat").show();
    //   }
    // });
    $("#diagKhusus").click(function() {
      if ($(this).is(":checked")) {
        $("#diagKhusus").show();
      }
    });
    $("#umur1").click(function() {
      if ($(this).is(":checked")) {
        $("#umur").show();
      }
    });
    $("#umur2").click(function() {
      if ($(this).is(":checked")) {
        $("#umur").show();
      }
    });
    // $("#umur3").click(function() {
    //   if ($(this).is(":checked")) {
    //     $("#umur").show();
    //   }
    // });
    // $("#umur4").click(function() {
    //   if ($(this).is(":checked")) {
    //     $("#umur").show();
    //   }
    // });
    $("#jenis_kelamin1").click(function() {
      if ($(this).is(":checked")) {
        $("#jenis_kelamin").show();
      }
    });
    $("#jenis_kelamin2").click(function() {
      if ($(this).is(":checked")) {
        $("#jenis_kelamin").show();
      }
    });
    $("#diagnosis1").click(function() {
      if ($(this).is(":checked")) {
        $("#diagnosis").show();
      }
    });
    $("#diagnosis2").click(function() {
      if ($(this).is(":checked")) {
        $("#diagnosis").show();
      }
    });
    $("#diagnosis3").click(function() {
      if ($(this).is(":checked")) {
        $("#diagnosis").show();
      }
    });
    // $("#diagnosis4").click(function() {
    //   if ($(this).is(":checked")) {
    //     $("#diagnosis").show();
    //   }
    // });
    $("#gangguan1").click(function() {
      if ($(this).is(":checked")) {
        $("#gangguan").show();
      }
    });
    $("#gangguan2").click(function() {
      if ($(this).is(":checked")) {
        $("#gangguan").show();
      }
    });
    // $("#gangguan3").click(function() {
    //   if ($(this).is(":checked")) {
    //     $("#gangguan").show();
    //   }
    // });
    $("#faktor1").click(function() {
      if ($(this).is(":checked")) {
        $("#faktor").show();
      }
    });
    $("#faktor2").click(function() {
      if ($(this).is(":checked")) {
        $("#faktor").show();
      }
    });
    $("#faktor3").click(function() {
      if ($(this).is(":checked")) {
        $("#faktor").show();
      }
    });
    // $("#faktor4").click(function() {
    //   if ($(this).is(":checked")) {
    //     $("#faktor").show();
    //   }
    // });
    $("#anestesi1").click(function() {
      if ($(this).is(":checked")) {
        $("#anestesi").show();
      }
    });
    $("#anestesi2").click(function() {
      if ($(this).is(":checked")) {
        $("#anestesi").show();
      }
    });
    // $("#anestesi3").click(function() {
    //   if ($(this).is(":checked")) {
    //     $("#anestesi").show();
    //   }
    // });
    // $("#obatan1").click(function() {
    //   if ($(this).is(":checked")) {
    //     $("#obatan").show();
    //   }
    // });
    // $("#obatan2").click(function() {
    //   if ($(this).is(":checked")) {
    //     $("#obatan").show();
    //   }
    // });
    // $("#obatan3").click(function() {
    //   if ($(this).is(":checked")) {
    //     $("#obatan").show();
    //   }
    // });
    $("#turun1").click(function() {
      if ($(this).is(":checked")) {
        $("#turun").show();
      }
    });
    $("#turun2").click(function() {
      if ($(this).is(":checked")) {
        $("#turun").show();
      }
    });
    $("#turun3").click(function() {
      if ($(this).is(":checked")) {
        $("#turun").show();
      }
    });
    $("#turun4").click(function() {
      if ($(this).is(":checked")) {
        $("#turun").show();
      }
    });
    $("#turun5").click(function() {
      if ($(this).is(":checked")) {
        $("#turun").show();
      }
    });
    $("#turun6").click(function() {
      if ($(this).is(":checked")) {
        $("#turun").show();
      }
    });
    $("#turun7").click(function() {
      if ($(this).is(":checked")) {
        $("#turun").show();
      }
    });
    $("#turun8").click(function() {
      if ($(this).is(":checked")) {
        $("#turun").show();
      }
    });
    $("#asupan1").click(function() {
      if ($(this).is(":checked")) {
        $("#asupan").show();
      }
    });
    $("#asupan2").click(function() {
      if ($(this).is(":checked")) {
        $("#asupan").show();
      }
    });
    $("#bps1").click(function() {
      if ($(this).is(":checked")) {
        $("#bps").show();
      }
    });
    $("#bps2").click(function() {
      if ($(this).is(":checked")) {
        $("#bps").show();
      }
    });
    $("#bps3").click(function() {
      if ($(this).is(":checked")) {
        $("#bps").show();
      }
    });
    $("#nrs1").click(function() {
      if ($(this).is(":checked")) {
        $("#nrs").show();
      }
    });
    $("#nrs2").click(function() {
      if ($(this).is(":checked")) {
        $("#nrs").show();
      }
    });
    $("#nrs3").click(function() {
      if ($(this).is(":checked")) {
        $("#nrs").show();
      }
    });
    $("#nrs4").click(function() {
      if ($(this).is(":checked")) {
        $("#nrs").show();
      }
    });
    $("#nrs5").click(function() {
      if ($(this).is(":checked")) {
        $("#nrs").show();
      }
    });
    $("#nrs6").click(function() {
      if ($(this).is(":checked")) {
        $("#nrs").show();
      }
    });
    $("#nrs7").click(function() {
      if ($(this).is(":checked")) {
        $("#nrs").show();
      }
    });
    $("#nrs8").click(function() {
      if ($(this).is(":checked")) {
        $("#nrs").show();
      }
    });
    $("#nrs9").click(function() {
      if ($(this).is(":checked")) {
        $("#nrs").show();
      }
    });
    $("#nrs10").click(function() {
      if ($(this).is(":checked")) {
        $("#nrs").show();
      }
    });
    $("#nrs11").click(function() {
      if ($(this).is(":checked")) {
        $("#nrs").show();
      }
    });
    $("#flacc1").click(function() {
      if ($(this).is(":checked")) {
        $("#flacc").show();
      }
    });
    $("#flacc2").click(function() {
      if ($(this).is(":checked")) {
        $("#flacc").show();
      }
    });
    $("#flacc3").click(function() {
      if ($(this).is(":checked")) {
        $("#flacc").show();
      }
    });
  });

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

  document.addEventListener('DOMContentLoaded', function() {
    const radioGroups = ['persepsi', 'kelembaban', 'aktifitas', 'mobilitas', 'nutrisi', 'gesekan'];

    radioGroups.forEach(group => {
      const radios = document.querySelectorAll(`input[name="${group}"]`);
      radios.forEach(radio => {
        radio.addEventListener('change', calculateBradenScore);
      });
    });

    function calculateBradenScore() {
      let totalScore = 0;

      radioGroups.forEach(group => {
        const selectedRadio = document.querySelector(`input[name="${group}"]:checked`);
        if (selectedRadio) {
          totalScore += parseInt(selectedRadio.value);
        }
      });

      document.getElementById('bradan_score').value = totalScore;
    }
  });

  // function handleAlergiObatChange() {
  //   var alergiObatAda = document.getElementById('alergi_obat_ada');
  //   var alergiObatDetail = document.getElementById('alergi_obat_detail');
  //   if (alergiObatAda.checked) {
  //     alergiObatDetail.style.display = 'block';
  //   } else {
  //     alergiObatDetail.style.display = 'none';
  //   }
  // }

  // // Add event listeners to radio buttons
  // document.getElementById('alergi_obat_tidak_ada').addEventListener('change', handleAlergiObatChange);
  // document.getElementById('alergi_obat_ada').addEventListener('change', handleAlergiObatChange);

  // // Initial call to set the correct state on page load
  // handleAlergiObatChange();


  // function handleTransfusiDarahChange() {
  //   var transfusiDarahPernah = document.getElementById('transfusi_darah_pernah');
  //   var transfusiDarahDetail = document.getElementById('transfusi_darah_detail');
  //   if (transfusiDarahPernah.checked) {
  //     transfusiDarahDetail.style.display = 'block';
  //   } else {
  //     transfusiDarahDetail.style.display = 'none';
  //   }
  // }

  // // Add event listeners to radio buttons
  // document.getElementById('transfusi_darah_tidak').addEventListener('change', handleTransfusiDarahChange);
  // document.getElementById('transfusi_darah_pernah').addEventListener('change', handleTransfusiDarahChange);

  // // Initial call to set the correct state on page load
  // handleTransfusiDarahChange();

  function sumKb() {

    if ($('#persepsi1').is(":checked")) {
      score = 1;
    } else if ($('#persepsi2').is(":checked")) {
      score = 2;
    } else if ($('#persepsi3').is(":checked")) {
      score = 3;
    } else if ($('#persepsi4').is(":checked")) {
      score = 4;
    }

    if ($('#kelembaban1').is(":checked")) {
      score1 = 1;
    } else if ($('#kelembaban2').is(":checked")) {
      score1 = 2;
    } else if ($('#kelembaban3').is(":checked")) {
      score1 = 3;
    } else if ($('#kelembaban4').is(":checked")) {
      score1 = 4;
    }

    if ($('#aktifitas').is(":checked")) {
      score2 = 1;
    } else if ($('#aktifitas2').is(":checked")) {
      score2 = 2;
    } else if ($('#aktifitas3').is(":checked")) {
      score2 = 3;
    } else if ($('#aktifitas4').is(":checked")) {
      score2 = 4;
    }

    if ($('#mobilitas1').is(":checked")) {
      score3 = 1;
    } else if ($('#mobilitas2').is(":checked")) {
      score3 = 2;
    } else if ($('#mobilitas3').is(":checked")) {
      score3 = 3;
    } else if ($('#mobilitas4').is(":checked")) {
      score3 = 4;
    }

    if ($('#nutrisi1').is(":checked")) {
      score4 = 1;
    } else if ($('#nutrisi2').is(":checked")) {
      score4 = 2;
    } else if ($('#nutrisi3').is(":checked")) {
      score4 = 3;
    }

    if ($('#gesekan1').is(":checked")) {
      score5 = 1;
    } else if ($('#gesekan2').is(":checked")) {
      score5 = 2;
    } else if ($('#gesekan3').is(":checked")) {
      score5 = 3;
    }

    sum = Number(score) + Number(score1) + Number(score2) + Number(score3) + Number(score4) + Number(score5);
    console.log(sum);
    total = $('#bradan_score').val(sum);
  }

  function sumAk() {

    if ($('#hygiene1').is(":checked")) {
      score = 0;
    } else if ($('#hygiene2').is(":checked")) {
      score = 5;
    }

    if ($('#makan1').is(":checked")) {
      score1 = 5;
    } else if ($('#makan2').is(":checked")) {
      score1 = 10;
    }

    if ($('#mandi1').is(":checked")) {
      score2 = 0;
    } else if ($('#mandi2').is(":checked")) {
      score2 = 5;
    }

    if ($('#toilet1').is(":checked")) {
      score3 = 5;
    } else if ($('#toilet2').is(":checked")) {
      score3 = 10;
    }

    if ($('#tangga1').is(":checked")) {
      score4 = 5;
    } else if ($('#tangga2').is(":checked")) {
      score4 = 10;
    }

    if ($('#pakaian1').is(":checked")) {
      score5 = 0;
    } else if ($('#pakaian2').is(":checked")) {
      score5 = 5;
    }

    if ($('#kontrolBab1').is(":checked")) {
      score6 = 5;
    } else if ($('#kontrolBab2').is(":checked")) {
      score6 = 10;
    }

    if ($('#kontrolBak1').is(":checked")) {
      score7 = 0;
    } else if ($('#kontrolBak2').is(":checked")) {
      score7 = 5;
    }

    if ($('#transfer1').is(":checked")) {
      score8 = 5;
    } else if ($('#transfer2').is(":checked")) {
      score8 = 10;
    }

    if ($('#berjalan1').is(":checked")) {
      score9 = 5;
    } else if ($('#berjalan2').is(":checked")) {
      score9 = 10;
    }

    sum = Number(score) + Number(score1) + Number(score2) + Number(score3) + Number(score4) + Number(score5) +
      Number(score6) + Number(score7) + Number(score8) + Number(score9);
    console.log(sum);
    total = $('#aktifitas_score').val(sum);
  }
  document.addEventListener('DOMContentLoaded', function() {
    const radioGroups = ['hygiene', 'makan', 'mandi', 'toilet', 'tangga', 'pakaian', 'kontrolBab', 'kontrolBak', 'transfer', 'berjalan'];

    radioGroups.forEach(group => {
      const radios = document.querySelectorAll(`input[name="${group}"]`);
      radios.forEach(radio => {
        radio.addEventListener('change', calculateBradenScore);
      });
    });

    function calculateBradenScore() {
      let totalScore = 0;

      radioGroups.forEach(group => {
        const selectedRadio = document.querySelector(`input[name="${group}"]:checked`);
        if (selectedRadio) {
          totalScore += parseInt(selectedRadio.value);
        }
      });

      document.getElementById('aktifitas_score').value = totalScore;
    }
  });

  function sumRj() {

    if ($('#umur1').is(":checked")) {
      score = 0;
    } else if ($('#umur2').is(":checked")) {
      score = 25;
      // } else if ($('#umur3').is(":checked")) {
      //   score = 2;
      // } else if ($('#umur4').is(":checked")) {
      //   score = 1;
    }

    if ($('#jenis_kelamin1').is(":checked")) {
      score1 = 0;
    } else if ($('#jenis_kelamin2').is(":checked")) {
      score1 = 15;
    }

    if ($('#diagnosis1').is(":checked")) {
      score2 = 0;
    } else if ($('#diagnosis2').is(":checked")) {
      score2 = 15;
    } else if ($('#diagnosis3').is(":checked")) {
      score2 = 30;
      // } else if ($('#diagnosis4').is(":checked")) {
      //   score2 = 1;
    }

    if ($('#gangguan1').is(":checked")) {
      score3 = 0;
    } else if ($('#gangguan2').is(":checked")) {
      score3 = 20;
      // } else if ($('#gangguan3').is(":checked")) {
      //   score3 = 1;
    }

    if ($('#faktor1').is(":checked")) {
      score4 = 0;
    } else if ($('#faktor2').is(":checked")) {
      score4 = 10;
    } else if ($('#faktor3').is(":checked")) {
      score4 = 20;
      // } else if ($('#faktor4').is(":checked")) {
      //   score4 = 1;
    }

    if ($('#anestesi1').is(":checked")) {
      score5 = 0;
    } else if ($('#anestesi2').is(":checked")) {
      score5 = 15;
      // } else if ($('#anestesi3').is(":checked")) {
      //   score5 = 2;
    }

    // if ($('#obatan1').is(":checked")) {
    //   score6 = 3;
    // } else if ($('#obatan2').is(":checked")) {
    //   score6 = 2;
    // } else if ($('#obatan3').is(":checked")) {
    //   score6 = 1;
    // }


    sum = Number(score) + Number(score1) + Number(score2) + Number(score3) + Number(score4) + Number(score5); //+Number(score6);
    console.log(sum);
    total = $('#resiko_score').val(sum);
  }
  document.addEventListener('DOMContentLoaded', function() {
    const radioGroups = ['umur', 'jenis_kelamin', 'diagnosis', 'gangguan', 'faktor', 'anestesi'];

    radioGroups.forEach(group => {
      const radios = document.querySelectorAll(`input[name="${group}"]`);
      radios.forEach(radio => {
        radio.addEventListener('change', calculateResikoScore);
      });
    });

    function calculateResikoScore() {
      let totalScore = 0;

      radioGroups.forEach(group => {
        const selectedRadio = document.querySelector(`input[name="${group}"]:checked`);
        if (selectedRadio) {
          totalScore += parseInt(selectedRadio.value);
        }
      });

      document.getElementById('resiko_score').value = totalScore;
    }
  });

  function sumNt() {

    if ($('#turun1').is(":checked")) {
      score = 0;
    } else if ($('#turun2').is(":checked")) {
      score = 2;
      // } else if ($('#turun4').is(":checked")) {
      //   score = 1;
      // } else if ($('#turun5').is(":checked")) {
      //   score = 2;
      // } else if ($('#turun6').is(":checked")) {
      //   score = 3;
      // } else if ($('#turun7').is(":checked")) {
      //   score = 4;
      // } else if ($('#turun8').is(":checked")) {
      //   score = 2;
    }

    if ($('#turun4').is(":checked")) {
      score1 = 1;
    } else if ($('#turun5').is(":checked")) {
      score1 = 2;
    } else if ($('#turun6').is(":checked")) {
      score1 = 3;
    } else if ($('#turun7').is(":checked")) {
      score1 = 4;
    } else if ($('#turun8').is(":checked")) {
      score1 = 2;
    }

    if ($('#asupan1').is(":checked")) {
      score2 = 0;
    } else if ($('#asupan2').is(":checked")) {
      score2 = 1;
    }


    sum = Number(score) + Number(score1) + Number(score2);
    console.log(sum);
    total = $('#nutrisi_score').val(sum);
  }
  document.addEventListener('DOMContentLoaded', function() {
    const radioGroups = ['turun', 'asupan', 'turunnn'];

    radioGroups.forEach(group => {
      const radios = document.querySelectorAll(`input[name="${group}"]`);
      radios.forEach(radio => {
        radio.addEventListener('change', calculateNutrisiScore);
      });
    });

    function calculateNutrisiScore() {
      let totalScore = 0;

      radioGroups.forEach(group => {
        const selectedRadio = document.querySelector(`input[name="${group}"]:checked`);
        if (selectedRadio) {
          totalScore += parseInt(selectedRadio.value);
        }
      });

      document.getElementById('nutrisi_score').value = totalScore;
    }
  });
</script>

<script type="text/javascript">

  function displayErrors(response) {
      const errorMappings = [
          { spanId: 'berat_badan_error', responseKey: 'berat_badan' },
          { spanId: 'nafas_error', responseKey: 'frequensi_nafas' },
          { spanId: 'tinggi_badan_error', responseKey: 'tinggi_badan' },
          { spanId: 'spo2_error', responseKey: 'spo2' },
          { spanId: 'suhu_error', responseKey: 'suhu' },
          { spanId: 'e_error', responseKey: 'e' },
          { spanId: 'gcs_error', responseKey: 'gcs' }
      ];

      errorMappings.forEach(mapping => {
          let errorMessage = response[mapping.responseKey];
          const errorSpan = document.getElementById(mapping.spanId);

          if (!errorSpan) return;

          // Jika ada pesan error seperti "<p>*wajib diisi</p>"
          if (errorMessage) {
              // Hapus tag HTML <p> dan </p>
              errorMessage = errorMessage.replace(/<\/?p>/g, '').trim();

              errorSpan.textContent = errorMessage;
              $('#'+ mapping.spanId)[0].scrollIntoView({ behavior: 'smooth', block: 'center' });
          } else {
              errorSpan.textContent = '';
          }
      });
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
    cMasuk = $('input[name="cMasuk"]:checked').val();
    //if (cMasuk == "Lainnya") {
    //  cMasuk = $('#cMasuk').val();
    //}
    gcs = $('#gcs').val();
    e = $('#e').val();
    m = $('#m').val();
    v = $('#v').val();
    kondisi = $('input[name="kondisi"]:checked').val();
    if (kondisi == "Lainnya") {
      kondisi = $('#kondisi').val();
    }
    tekanan_darah = $('input[name="tekanan_darah"]').val();
    suhu = $('input[name="suhu"]').val();
    frequensi_nadi = $('input[name="frequensi_nadi"]').val();
    spo2 = $('input[name="spo2"]').val();
    berat_badan = $('input[name="berat_badan"]').val();
    frequensi_nafas = $('input[name="frequensi_nafas"]').val();
    tinggi_badan = $('input[name="tinggi_badan"]').val();
    kepala = $('input[name="kepala"]').val();
    hidung = $('input[name="hidung"]').val();
    mulut = $('input[name="mulut"]').val();
    leher = $('input[name="leher"]').val();
    thorax = $('input[name="thorax"]').val();
    jantung = $('input[name="jantung"]').val();
    paru = $('input[name="paru"]').val();
    andomen = $('input[name="andomen"]').val();
    punggung = $('input[name="punggung"]').val();
    ekstremitas = $('input[name="ekstremitas"]').val();
    genetalia = $('input[name="genetalia"]').val();
    persepsi = $('input[name="persepsi"]:checked').val();
    kelembaban = $('input[name="kelembaban"]:checked').val();
    aktifitas = $('input[name="aktifitas"]:checked').val();
    mobilitas = $('input[name="mobilitas"]:checked').val();
    nutrisi = $('input[name="nutrisi"]:checked').val();
    gesekan = $('input[name="gesekan"]:checked').val();
    bradan_score = $('input[name="bradan_score"]').val();
    bps = $('input[name="bps"]').val();
    nrs = $('input[name="nrs"]:checked').val();
    flacc = $('input[name="flacc"]').val();
    dokter_ugd = $('input[name="dokter_ugd"]').val();
    diagnosa_saat_dirajal = $('input[name="diagnosa_saat_dirajal"]').val();
    dari_rajal = $('input[name="dari_rajal"]').val();
    alergi_obat = $('input[name="alergi_obat"]:checked').val();
    alergi_obat_textbox = $('input[name="alergi_obat_textbox"]').val();
    // if (alergi_obat2 == "Ada") {
    //   alergi_obat2 = $('#alergi_obat_textbox').val();
    // }
    transfusi_darah = $('input[name="transfusi_darah"]:checked').val();
    transfusi_darah_detail = $('input[name="transfusi_darah_detail"]').val();
    // if (transfusi_darah2 = "Pernah") {
    //   transfusi_darah2 = $('#transfusi_darah_detail').val();
    // }
    reaksi_alergi = $('input[name="reaksi_alergi"]:checked').val();
    if (reaksi_alergi2 === "Ada") {
      reaksi_alergi2 = $('#reaksi_alergi_detail').val();
    }
    keluhan = $('input[name="keluhan"]:checked').val();
    caraa = $('input[name="caraa"]:checked').val();


    // if (keluhan1 = "Ya") {
    //   keluhan1 = $('#reaksi_alergi_detail').val();
    // }
    // slide = $('#slide').val();
    // alergi_obat_ada = $('input[name="alergi_obat_ada"]:checked').val();
    // alergi_obat_tidak_ada = $('input[name="alergi_obat_tidak_ada"]:checked').val();

    alergi = $('input[name="alergi"]:checked').val();
    if (alergi === "Ada") {
      alergi = $('#riwayat_alergi').val();
    } else {
      alergi = alergi;
    }

    var lain_lain = [];
    $('input[name="lain_lain"]').each(function() {
      if ($(this).is(":checked")) {
        lain_lain.push($(this).val());
      }
    });
    lain_lain = lain_lain.toString();
    reaksi_utama = $('input[name="reaksi_utama"]').val();
    merokok = $('input[name="merokok"]:checked').val();
    alkohol = $('input[name="alkohol"]:checked').val();
    jumlah_alkohol = $('input[name="jumlah_alkohol"]').val();
    jumlah_rokok = $('input[name="jumlah_rokok"]').val();
    obat_penenang = $('input[name="obat_penenang"]:checked').val();
    obat_penenang_detail = $('input[name="obat_penenang_detail"]').val();
    lainnyaa = $('input[name="lainnyaa"]').val();
    nyerii = $('input[name="nyerii"]').val();
    polaa = $('input[name="polaa"]').val();
    mentall = $('input[name="mentall"]').val();
    intake_lain_lain_textbox = $('input[name="intake_lain_lain_textbox"]').val();
    var riwayat_keluarga = [];
    $('input[name="pkeluarga"]').each(function() {
      if ($(this).is(":checked")) {
        riwayat_keluarga.push($(this).val());
      }
    });
    detail_penyakit_keluarga_lainnya = $('input[name="detail_penyakit_keluarga_lainnya"]').val();
    riwayat_keluarga = riwayat_keluarga.toString();
    penyebab = $('input[name="penyebab"]:checked').val();
    karakter = $('input[name="karakter"]:checked').val();
    frekuensi = $('input[name="frekuensi"]:checked').val();
    nyeri = $('input[name="nyeri"]:checked').val();
    if (nyeri1 = "Ya") {
      nyeri1 = $('#nyeri_lokasi').val();
    }
    durasi = $('input[name="durasi"]:checked').val();
    selama = $('input[name="selama"]:checked').val();
    hygiene = $('input[name="hygiene"]:checked').val();
    makan = $('input[name="makan"]:checked').val();
    mandi = $('input[name="mandi"]:checked').val();
    toilet = $('input[name="toilet"]:checked').val();
    tangga = $('input[name="tangga"]:checked').val();
    pakaian = $('input[name="pakaian"]:checked').val();
    kontrolBab = $('input[name="kontrolBab"]:checked').val();
    kontrolBak = $('input[name="kontrolBak"]:checked').val();
    transfer = $('input[name="transfer"]:checked').val();
    berjalan = $('input[name="berjalan"]:checked').val();
    aktifitas_score = $('input[name="aktifitas_score"]').val();
    pola = $('input[name="pola"]:checked').val();
    cara = $('input[name="cara"]:checked').val();
    mental = $('input[name="mental"]:checked').val();
    taliIkat = $('input[name="taliIkat"]:checked').val();
    taliIkat_detail = $('input[name="taliIkat_detail"]').val();
    diagKhusus = $('input[name="diagKhusus"]').val();
    umur = $('input[name="umur"]:checked').val();
    jenis_kelamin = $('input[name="jenis_kelamin"]:checked').val();
    diagnosis = $('input[name="diagnosis"]:checked').val();
    gangguan = $('input[name="gangguan"]:checked').val();
    faktor = $('input[name="faktor"]:checked').val();
    anestesi = $('input[name="anestesi"]:checked').val();
    obatan = $('input[name="obatan"]:checked').val();
    resiko_score = $('input[name="resiko_score"]').val();
    intake = $('input[name="intake"]:checked').val();
    masalah = $('input[name="masalah"]:checked').val();
    turun = $('input[name="turun"]:checked').val();
    asupan = $('input[name="asupan"]:checked').val();
    nutrisi_score = $('input[name="nutrisi_score"]').val();

    bab = $('input[name="bab"]:checked').val();
    bak = $('input[name="bak"]:checked').val();
    hamil = $('input[name="hamil"]:checked').val();
    //tgl_haid = $('#inHaid').val();
    kontrasepsi = $('input[name="kontrasepsi"]:checked').val();
    prostat = $('input[name="prostat"]:checked').val();
    pemuka_agama = $('input[name="pemuka"]:checked').val();
    //id_masalah_kep = $('input[name="keperawatan"]:checked').val();

    let id_masalah_kep_input = $('input[name="keperawatan[]"]:checked')
      .map(function() {
        return $(this).val();
      })
      .get();

    // Gabungkan nilai dengan koma
    let id_masalah_kep = id_masalah_kep_input.join(',');

    // Debug untuk memastikan nilai yang dikirim
    console.log("Masalah keperawatan yang dipilih:", id_masalah_kep);

    var keperluan = [];
    $('input[name="keperluan"]').each(function() {
      if ($(this).is(":checked")) {
        keperluan.push($(this).val());
      }
    });
    keperluan = keperluan.toString();

    var keperawatan = [];
    $('input[name="keperawatan"]').each(function() {
      if ($(this).is(":checked")) {
        keperawatan.push($(this).val());
      }
    });
    keperawatan = keperawatan.toString();
    keperawatann = $('input[name="keperawatann"]').val();
    status = $('input[name="status"]:checked').val();
    keluarga = $('input[name="keluarga"]:checked').val();
    tempat_tinggal = $('input[name="tinggal"]:checked').val();
    if (tempat_tinggal == "Lainnya") {
      tempat_tinggal = $('#tinggal').val();
    }
    pekerjaan = $('input[name="pekerjaan"]:checked').val();
    if (pekerjaan == "Lainnya") {
      pekerjaan = $('#pekerjaan').val();
    }
    aktivitas = $('input[name="aktivitas"]:checked').val();
    status_emosional = $('input[name="emosional"]:checked').val();
    keluarga_terdekat = $('input[name="kterdekat"]').val();
    hubungan = $('input[name="hubungan"]').val();
    sumber_informasi = $('input[name="informasi"]:checked').val();
    if ($('#can').css("display") == "none") {
      gambar = "";
    } else {
      canvas = document.getElementById('can');
      gambar = canvas.toDataURL("image/png");
    }
    keterangan = $('#keterangan').val();
    if (sumber_informasi == "Lainnya") {
      sumber_informasi = $('#informasi').val();
    }
    skala_nyeri = "";
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


    dataString = 'no_rm=' + no_rm + '&nama=' + nama + '&tgl_lahir=' + tgl_lahir + '&id_pelayanan=' + id_pelayanan + '&id_history=' + id_history +
      '&jk=' + jk + '&tgl_masuk=' + tgl_masuk + '&gcs=' + gcs +
      '&cara_bayar=' + cara_bayar + '&cMasuk=' + cMasuk + '&e=' + e + '&m=' + m + '&v=' + v +
      '&tekanan_darah=' + tekanan_darah + '&suhu=' + suhu + '&frequensi_nadi=' + frequensi_nadi + '&berat_badan=' + berat_badan + '&spo2=' + spo2 + '&frequensi_nafas=' + frequensi_nafas +
      '&tinggi_badan=' + tinggi_badan + '&dokter_ugd=' + dokter_ugd + '&diagnosa_saat_dirajal=' + diagnosa_saat_dirajal + '&dari_rajal=' + dari_rajal +
      '&alergi_obat=' + alergi_obat + '&alergi=' + alergi + '&lain_lain=' + lain_lain + '&reaksi_utama=' + reaksi_utama +
      '&merokok=' + merokok + '&alkohol=' + alkohol + '&kondisi=' + kondisi + '&riwayat_keluarga=' + riwayat_keluarga + '&bab=' + bab +
      '&bak=' + bak + '&hamil=' + hamil + // '&tgl_haid=' + tgl_haid // Komentar pada tgl_haid
      '&kontrasepsi=' + kontrasepsi + '&prostat=' + prostat + '&pemuka_agama=' + pemuka_agama + '&id_masalah_kep=' + id_masalah_kep +
      '&keperluan=' + keperluan + '&status=' + status + '&keluarga=' + keluarga + '&tempat_tinggal=' + tempat_tinggal + '&pekerjaan=' + pekerjaan + '&aktivitas=' + aktivitas +
      '&status_emosional=' + status_emosional + '&keluarga_terdekat=' + keluarga_terdekat + '&hubungan=' + hubungan +
      '&sumber_informasi=' + sumber_informasi + '&kepala=' + kepala + '&hidung=' + hidung + '&mulut=' + mulut + '&leher=' + leher +
      '&thorax=' + thorax + '&jantung=' + jantung + '&paru=' + paru + '&andomen=' + andomen + '&punggung=' + punggung + '&ekstremitas=' + ekstremitas +
      '&genetalia=' + genetalia + '&persepsi=' + persepsi + '&kelembaban=' + kelembaban + '&aktifitas=' + aktifitas + '&mobilitas=' + mobilitas +
      '&nutrisi=' + nutrisi + '&gesekan=' + gesekan + '&bradan_score=' + bradan_score + '&transfusi_darah=' + transfusi_darah + '&reaksi_alergi=' + reaksi_alergi + '&skala_nyeri=' + skala_nyeri + '&keluhan=' + keluhan +
      '&gambar=' + gambar + '&keterangan=' + keterangan + '&penyebab=' + penyebab + '&karakter=' + karakter + '&frekuensi=' + frekuensi + '&nyeri=' + nyeri + '&durasi=' + durasi + '&selama=' + selama +
      '&hygiene=' + hygiene + '&makan=' + makan + '&mandi=' + mandi + '&toilet=' + toilet + '&tangga=' + tangga + '&pakaian=' + pakaian + '&kontrolBab=' + kontrolBab + '&kontrolBak=' + kontrolBak + '&transfer=' + transfer + '&berjalan=' + berjalan +
      '&aktifitas_score=' + aktifitas_score + '&pola=' + pola + '&cara=' + cara + '&mental=' + mental + '&taliIkat=' + taliIkat + '&taliIkat_detail=' + taliIkat_detail + '&jumlah_rokok=' + jumlah_rokok + '&jumlah_alkohol=' + jumlah_alkohol + '&alergi_obat_textbox=' + alergi_obat_textbox +
      '&transfusi_darah_detail=' + transfusi_darah_detail + '&obat_penenang=' + obat_penenang +
      '&umur=' + umur + '&jenis_kelamin=' + jenis_kelamin + '&diagnosis=' + diagnosis + '&gangguan=' + gangguan + '&faktor=' + faktor + '&anestesi=' + anestesi + '&obatan=' + obatan +
      '&resiko_score=' + resiko_score + '&intake=' + intake + '&masalah=' + masalah + '&turun=' + turun + '&asupan=' + asupan + '&nutrisi_score=' + nutrisi_score + '&obat_penenang_detail=' + obat_penenang_detail + '&detail_penyakit_keluarga_lainnya=' + detail_penyakit_keluarga_lainnya +
      '&lainnyaa=' + lainnyaa + '&nyerii=' + nyerii + '&polaa=' + polaa + '&mentall=' + mentall + '&intake_lain_lain_textbox=' + intake_lain_lain_textbox + '&caraa=' + caraa + '&keperawatan=' + keperawatan + '&keperawatann=' + keperawatann + '&bps=' + bps + '&flacc=' + flacc + '&nrs=' + nrs +
      '&diagKhusus=' + diagKhusus;

    let isValid = true;

    if (!cMasuk) {
      $('#cMasuk_error').html('*wajib diisi');
      $('#cMasuk1').focus();
      isValid = false;
    } else {
      $('#cMasuk_error').html('');
    }

    if (!alergi && isValid) {
      $('#alergi_error').html('*wajib diisi');
      $('#alergi1').focus();
      isValid = false;
    } else {
      $('#alergi_error').html('');
    }


    if (!merokok && isValid) {
      $('#rokok_error').html('*wajib diisi');
      $('#merokok1').focus();
      isValid = false;
    } else {
      $('#rokok_error').html('');
    }

    if (!alkohol && isValid) {
      $('#alkohol_error').html('*wajib diisi');
      $('#alkohol1').focus();
      isValid = false;
    } else {
      $('#alkohol_error').html('');
    }

    if (!keluhan && isValid) {
      $('#keluhan_error').html('*wajib diisi');
      $('#keluhan1').focus();
      isValid = false;
    } else {
      $('#keluhan_error').html('');
    }

    if (!bab && isValid) {
      $('#BAB_error').html('*wajib diisi');
      $('#BAB1').focus();
      isValid = false;
    } else {
      $('#BAB_error').html('');
    }

    if (!bak && isValid) {
      $('#BAK_error').html('*wajib diisi');
      $('#BAK1').focus();
      isValid = false;
    } else {
      $('#BAK_error').html('');
    }

    if (!pemuka_agama && isValid) {
      $('#pemuka_error').html('*wajib diisi');
      $('#pemuka1').focus();
      isValid = false;
    } else {
      $('#pemuka_error').html('');
    }

    if (!id_masalah_kep && isValid) {
      $('#idMasalahKep_error').html('*wajib diisi');
      $('#idMasalahKep_error').focus();
      $('#idMasalahKep_error')[0].scrollIntoView({ behavior: 'smooth', block: 'center' });
      isValid = false;
    } else {
      $('#idMasalahKep_error').html('');
    }

    // if (!kondisi && isValid) {
    //   $('#kondisi_error').html('*wajib diisi');
    //   $('#kondisi1').focus();
    //   isValid = false;
    // } else {
    //   $('#kondisi_error').html('');
    // }

    // if (data.gcs != '') {
    //   $('#gcs_error').html(data.gcs);
    // } else {
    //   $('#gcs_error').html('');
    // }

    // if (data.e != '') {
    //   $('#e_error').html(data.e);
    // } else {
    //   $('#e_error').html('');
    // }

    // if (data.m != '') {
    //   $('#m_error').html(data.m);
    // } else {
    //   $('#m_error').html('');
    // }

    // if (data.v != '') {
    //   $('#v_error').html(data.v);
    // } else {
    //   $('#v_error').html('');
    // }

    // if (data.tekanan_darah != '') {
    //   $('#td_error').html(data.tekanan_darah);
    // } else {
    //   $('#td_error').html('');
    // }

    // if (data.suhu != '') {
    //   $('#suhu_error').html(data.suhu);
    // } else {
    //   $('#suhu_error').html('');
    // }

    // if (data.spo2 != '') {
    //   $('#nadi_error').html(data.spo2);
    // } else {
    //   $('#nadi_error').html('');
    // }

    // if (data.frequensi_nadi != '') {
    //   $('#spo2_error').html(data.frequensi_nadi);
    // } else {
    //   $('#spo2_error').html('');
    // }

    // if (data.berat_badan != '') {
    //   $('#berat_badan_error').html(data.berat_badan);
    // } else {
    //   $('#berat_badan_error').html('');
    // }

    // if (data.frequensi_nafas != '') {
    //   $('#nafas_error').html(data.frequensi_nafas);
    // } else {
    //   $('#nafas_error').html('');
    // }

    // if (data.tinggi_badan != '') {
    //   $('#tinggi_badan_error').html(data.tinggi_badan);
    // } else {
    //   $('#tinggi_badan_error').html('');
    // }

    // if (!dokter_ugd && isValid) {
    //   $('#dkpemeriksa_error').html('*wajib diisi');
    //   $('#dokter_ugd1').focus();
    //   isValid = false;
    // } else {
    //   $('#dkpemeriksa_error').html('');
    // }

    // if (!diagnosa_saat_dirajal && isValid) {
    //   $('#diagnosa_error').html('*wajib diisi');
    //   $('#diagnosa_saat_dirajal1').focus();
    //   isValid = false;
    // } else {
    //   $('#diagnosa_error').html('');
    // }

    if (!isValid) {
      return false;
    }



    $.ajax({
      url: "<?php echo base_url() ?>Erm_ranap_asesmen_perawat/insert_asses_perawat_ranap",
      method: "POST",
      dataType: 'json',
      data: dataString,
      success: function(data) {
        if (data.status == "success") {
          window.location.href = "<?php echo base_url('Erm_ranap/form/') ?>" + '<?= urlencode(base64_encode($id_pelayanan)) ?>' + '/' + '<?= urlencode(base64_encode($id_history)) ?>';
        } else if (data.error) {
          // swal({
          //   title: "Gagal!",
          //   type: "warning",
          //   text: data.status,
          //   confirmButtonColor: "#3cb878",
          // });
          displayErrors(data);

        }
      }

    });
    return false;
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
<script>
  $(document).ready(function() {
    id_pelayanan = $('#inPel').val();
    $.ajax({
      url: "<?php echo base_url() ?>Erm_ranap_asesmen_perawat/get_ass_rajal",
      method: "POST",
      dataType: 'json',
      data: {
        id: id_pelayanan
      },
      success: function(data) {

        $('#gcs').val(data.gcs);
        $('#spo2').val(data.spo2);
        $('#tekanan_darah').val(data.tekanan_darah);
        $('#frequensi_nadi').val(data.frequensi_nadi);
        $('#frequensi_nafas').val(data.frequensi_nafas);
        $('#suhu').val(data.suhu);
        $('#berat_badan').val(data.berat_badan);
        $('#tinggi_badan').val(data.tinggi_badan);
        if (data.riwayat_alergi == "tidak ada") {
          $('input[name="alergi"][value="Tidak Ada"]').prop("checked", true);
          $('#riwayat_alergi').hide();
        } else {
          $('#riwayat_alergi').show();
          $('input[name="alergi"][value="Ada"]').prop("checked", true);
          $('#riwayat_alergi').val(data.riwayat_alergi);
        }

      }

    });
  });



</script>