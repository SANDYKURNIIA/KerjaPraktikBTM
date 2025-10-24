<!-- Row -->
<div class="row">
  <div class="col-sm-12">
    <div class="panel panel-default card-view">
      <div class="panel-heading">
        <div class="pull-left">
          <h6 class="panel-title txt-dark">ASESMEN AWAL MEDIS RAWAT INAP</h6>
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
                <!-- <input type="text" disabled class="form-control" id="inNoRM"> -->
              </div>
            </div>
            <input type="hidden" class="form-control" value="<?= $id_pelayanan ?>" id="inPel">
            <input type="hidden" class="form-control" value="<?= $id_history ?>" id="inHis">
            <input type="hidden" class="form-control" id="id">
            <div class="form-group">
              <div class="col-md-3">
                <label class="control-label mb-10 text-left">Nama<span class="help"></span></label>
                <input type="text" disabled class="form-control" value="<?= $nama ?>">
                <!-- <input type="text" disabled class="form-control"> -->
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
                <input type="text" class="form-control" value="<?= $jenis_kelamin ?>" disabled>
                <!-- <input type="text" disabled class="form-control"> -->
              </div>
            </div>


            <div class="form-group">
              <div class="col-md-12">
                <h5 style="margin-top: 30px;"><strong>
                    <label class="control-label mb-10 text-left">
                      ANAMNESA
                      <span class="help"></span>
                    </label></strong>
                </h5>
              </div>

              <div class="form-group">


                <div class="form-group">
                  <div class="col-md-4">
                    <label class="control-label mb-10 text-left">Riwayat Alergi</label>
                    <span id="alergi_error" class="text-danger"></span>
                    <div class="radio-button radio-button-primary">
                      <input id="riwayat_alergi1" type="radio" name="riwayat_alergi" value="Ada">
                      <label class="control-label" for="riwayat_alergi1">
                        Ada
                      </label>
                      <div class="has-success">
                        <input type="text" class="form-control" value="" id="riwayat_alergi" style="display: none;">
                      </div>
                    </div>
                    <div class="radio-button radio-button-primary">
                      <input id="riwayat_alergi2" type="radio" name="riwayat_alergi" value="Tidak ada" checked>
                      <label class="control-label" for="riwayat_alergi2">
                        Tidak Ada
                      </label>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <label class="control-label mb-10 text-left"><b>Keluhan Utama <span style="color:red;">*</span></b><span class="help"></span></label>
                    <span id="keluhan_error" class="text-danger"></span>
                    <div class="has-success">
                      <textarea class="form-control" name="keluhan" id="keluhan" cols="30" rows="3"></textarea>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-4">
                    <label class="control-label mb-10 text-left"><b>Riwayat Penyakit Sekarang <span style="color:red;">*</span><b /><span class="help"></span></label>
                    <span id="riwayat_error" class="text-danger"></span>
                    <div class="has-success">
                      <textarea class="form-control" name="riwayat_sakit_skrg" id="riwayat_sakit_skrg" cols="30" rows="3"></textarea>
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                </div>
                <div class="form-group">
                  <div class="col-md-4">
                    <label class="control-label mb-10 text-left"><b>Riwayat Penyakit Dahulu: <b /><span class="help"></span></label>
                    <div class="has-success">
                      <textarea class="form-control" name="riwayat_sakit_dulu" id="riwayat_sakit_dulu" cols="30" rows="3"></textarea>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-4">
                    <label class="control-label mb-10 text-left"><b>Riwayat Penyakit Menular: <b /><span class="help"></span></label>
                    <div class="has-success">
                      <textarea class="form-control" name="riwayat_sakit_menular" id="riwayat_sakit_menular" cols="30" rows="3"></textarea>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-4">
                    <label class="control-label mb-10 text-left"><b>Keadaan Sosial : <b /><span class="help"></span></label>
                    <div class="has-success">
                      <textarea class="form-control" name="keadaan_sosial" id="keadaan_sosial" cols="30" rows="3"></textarea>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-4">
                    <label class="control-label mb-10 text-left"><b>Keadaan Fisik : <b /><span class="help"></span></label>
                    <div class="has-success">
                      <textarea class="form-control" name="keadaan_fisik" id="keadaan_fisik" cols="30" rows="3"></textarea>
                    </div>
                  </div>
                </div>

              </div>

              <div class="form-group">
                <div class="col-md-12">
                  <h5 style="margin-top: 30px;"><strong>
                      <label class="control-label mb-10 text-left">
                        PEMERIKSAAN FISIK
                        <span class="help"></span>
                      </label></strong>
                  </h5>
                </div>

                <div class="col-md-12">
                  <strong>
                    <label class="control-label mb-10 text-left">
                      <p><br>Keadaan Umum</p>
                    </label>
                  </strong>
                </div>

                <div class="form-group">
                  <div class="col-md-4">
                    <label class="control-label mb-10 text-left">Tekanan Darah<span class="help"></span></label>
                    <div class="has-success">
                      <input type="text" class="form-control" disabled id="tekanan_darah" placeholder="mmHg" value="">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-4">
                    <label class="control-label mb-10 text-left">Nadi<span class="help"></span></label>
                    <div class="has-success">
                      <input type="number" class="form-control" disabled id="frequensi_nadi" placeholder="x/menit" value="">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-4">
                    <label class="control-label mb-10 text-left">Pernafasan<span class="help"></span></label>
                    <div class="has-success">
                      <input type="number" class="form-control" disabled id="frequensi_nafas" placeholder="x/menit" value="">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-4">
                    <label class="control-label mb-10 text-left">Suhu<span class="help"></span></label>
                    <div class="has-success">
                      <input type="number" class="form-control" id="suhu" disabled placeholder="&deg;C" value="">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-4">
                    <label class="control-label mb-10 text-left">Skala Nyeri<span class="help"></span></label>
                    <div class="has-success">
                      <input type="text" class="form-control" id="skala_nyeri" disabled value="">
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-4">
                    <label class="control-label mb-10 text-left">GCS<span class="help"></span></label>
                    <div class="has-success">
                      <input type="number" disabled class="form-control" id="gcs" value="">
                    </div>
                    <span class="help-block"></span>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-4">
                    <label class="control-label mb-10 text-left">Kondisi Umum<span class="help"></span></label>
                    <div class="has-success">
                      <input type="text" class="form-control" disabled id="kondisi_umum" value="">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-4">
                    <label class="control-label mb-10 text-left">Berat Badan<span class="help"></span></label>
                    <div class="has-success">
                      <input type="text" class="form-control" disabled id="berat_badan" value="">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-4">
                    <label class="control-label mb-10 text-left">Tinggi Badan<span class="help"></span></label>
                    <div class="has-success">
                      <input type="text" class="form-control" disabled id="tinggi_badan" value="">
                    </div>
                  </div>
                </div>


                <div class="col-md-12">
                  <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                </div>

                <div class="col-md-7">
                  <div class="form-group">
                    <div class="col-md-10">
                      <label class="control-label mb-10 text-left"><b>Kepala: </b><span class="help"></span></label>
                      <div class="has-success">
                        <textarea class="form-control" name="kepala" id="kepala" cols="30" rows="2">Dalam Batas Normal</textarea>
                      </div>
                    </div>
                  </div>


                  <div class="form-group">
                    <div class="col-md-10">
                      <label class="control-label mb-10 text-left"><b>Hidung: </b><span class="help"></span></label>
                      <div class="has-success">
                        <textarea class="form-control" name="hidung" id="hidung" cols="30" rows="2">Dalam Batas Normal</textarea>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-10">
                      <label class="control-label mb-10 text-left"><b>Mulut: </b><span class="help"></span></label>
                      <div class="has-success">
                        <textarea class="form-control" name="mulut" id="mulut" cols="30" rows="2">Dalam Batas Normal</textarea>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-10">
                      <label class="control-label mb-10 text-left"><b>Leher: </b><span class="help"></span></label>
                      <div class="has-success">
                        <textarea class="form-control" name="leher" id="leher" cols="30" rows="2">Dalam Batas Normal</textarea>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-10">
                      <label class="control-label mb-10 text-left"><b>THORAX : </b><span class="help"></span></label>
                      <div class="has-success">
                        <textarea class="form-control" name="thorax" id="thorax" cols="30" rows="2">Dalam Batas Normal</textarea>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-10">
                      <label class="control-label mb-10 text-left"><b>Jantung : </b><span class="help"></span></label>
                      <div class="has-success">
                        <textarea class="form-control" name="jantung" id="jantung" cols="30" rows="2">Dalam Batas Normal</textarea>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-10">
                      <label class="control-label mb-10 text-left"><b>Paru : </b><span class="help"></span></label>
                      <div class="has-success">
                        <textarea class="form-control" name="paru" id="paru" cols="30" rows="2">Dalam Batas Normal</textarea>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-10">
                      <label class="control-label mb-10 text-left"><b>Andomen dan Pelvis : </b><span class="help"></span></label>
                      <div class="has-success">
                        <textarea class="form-control" name="andomen" id="andomen" cols="30" rows="2">Dalam Batas Normal</textarea>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-10">
                      <label class="control-label mb-10 text-left"><b>Punggung dan Pinggang : </b><span class="help"></span></label>
                      <div class="has-success">
                        <textarea class="form-control" name="punggung" id="punggung" cols="30" rows="2">Dalam Batas Normal</textarea>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-10">
                      <label class="control-label mb-10 text-left"><b>Ekstremitas : </b><span class="help"></span></label>
                      <div class="has-success">
                        <textarea class="form-control" name="ekstremitas" id="ekstremitas" cols="30" rows="2">Dalam Batas Normal</textarea>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-10">
                      <label class="control-label mb-10 text-left"><b>Genetalia : </b><span class="help"></span></label>
                      <div class="has-success">
                        <textarea class="form-control" name="genetalia" id="genetalia" cols="30" rows="2">Dalam Batas Normal</textarea>
                      </div>
                    </div>
                  </div>
                </div>


                <div class="col-md-12">
                  <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                </div>
                <div class="col-md-12">
                  <strong>
                    <label class="control-label mb-10 text-left">
                      <p><br>Pemeriksaan Khusus/Status Lokalis/Obstetrik/Ginekologis</p>
                    </label>
                  </strong>
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
                                  <button class="btn btn-primary" id="sig-submitBtn1">Submit Signature</button>
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
                      <div class="has-success">
                        <textarea class="form-control" name="keterangan" id="keterangan" cols="30" rows="2"></textarea>
                      </div>
                    </div>
                  </div>

                </div>
              </div>

              <div class="col-md-12">
                <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
              </div>
              <div class="form-group">
                <div class="form-group">
                  <div class="col-md-8">
                    <strong>
                      <label class="control-label mb-10 text-left">
                        <b>Diagnosa: </b><span class="help"></span>
                      </label>
                    </strong>
                    <div class="table-wrap" style="width: 70%; margin: auto ">
                      <!-- <p id="notif_load" style="color:red;">Loading data, Please wait</p> -->
                      <div class="table-responsive">
                        <table class="table table-hover display  pb-60" id="tabledgns">
                          <thead>
                            <tr class="bg-success">
                              <th>ID DIAGNOSA</th>
                              <th>NAMA DIAGNOSA</th>
                              <th>TAMBAH</th>
                            </tr>
                          </thead>
                          <tfoot>
                            <tr class="bg-success">
                              <th>ID DIAGNOSA</th>
                              <th>NAMA DIAGNOSA</th>
                              <th>TAMBAH</th>
                            </tr>
                          </tfoot>
                          <tbody style="color: black">
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <strong>
                      <label class="control-label mb-10 text-left">
                        <b>Diagnosa Utama: </b><span class="help"></span>
                      </label>
                    </strong>
                    <div class="table-wrap" style="width: 70%; margin: auto ">
                      <div class="table-responsive">
                        <table class="table table-hover display  pb-60" id="tablediagnosa1">
                          <thead>
                            <tr class="bg-success">
                              <th>ID DIAGNOSA</th>
                              <th>KODE</th>
                              <th>NAMA</th>
                              <th>HAPUS</th>
                            </tr>
                          </thead>
                          <tfoot>
                            <tr class="bg-success">
                              <th>ID DIAGNOSA</th>
                              <th>KODE</th>
                              <th>NAMA</th>
                              <th>HAPUS</th>
                            </tr>
                          </tfoot>
                          <tbody style="color: black">
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <strong>
                      <label class="control-label mb-10 text-left">
                        <b>Diagnosa Sekunder: </b><span class="help"></span>
                      </label>
                    </strong>
                    <div class="table-wrap" style="width: 70%; margin: auto ">
                      <div class="table-responsive">
                        <table class="table table-hover display  pb-60" id="tablediagnosa">
                          <thead>
                            <tr class="bg-success">
                              <th>ID DIAGNOSA</th>
                              <th>KODE</th>
                              <th>NAMA</th>
                              <th>HAPUS</th>
                            </tr>
                          </thead>
                          <tfoot>
                            <tr class="bg-success">
                              <th>ID DIAGNOSA</th>
                              <th>KODE</th>
                              <th>NAMA</th>
                              <th>HAPUS</th>
                            </tr>
                          </tfoot>
                          <tbody style="color: black">
                          </tbody>
                        </table>
                      </div>
                    </div>

                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-12">
                    <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                  </div>
                  <div class="form-group">
                    <div class="col-md-4">
                      <span id="terapi_error" class="text-danger"></span>
                      <label class="control-label mb-10 text-left">Terapi/Instruksi:</label>
                      <div class="has-success">
                        <textarea class="form-control" name="terapi" id="terapi" cols="30" rows="5"></textarea>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <label class="control-label mb-10 text-left">Usul Pemeriksaan:</label>
                      <span id="konsul_error" class="text-danger"></span>
                      <div class="has-success">
                        <textarea class="form-control" name="" id="konsul" cols="30" rows="5"></textarea>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-4">
                    <label class="control-label mb-10 text-left">Lama Perawatan:</label>
                    <span id="lama_error" class="text-danger"></span>
                    <div class="has-success">
                      <input id="lama" type="number" class="form-control" name="lama" placeholder="">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <label class="control-label mb-10 text-left">Prognosa:</label>
                    <span id="prognosa_error" class="text-danger"></span>
                    <div class="has-success">
                      <textarea class="form-control" name="" id="prognosa" cols="30" rows="5"></textarea>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-4">
                <label class="control-label mb-10 text-left">Diagnosa Utama <b style="color:red;">*</b></label>
                <span id="diagnosa_utama_error" class="text-danger"></span>
                <div class="has-success">
                  <textarea class="form-control" name="diagnosa_utama" id="diagnosa_utama" cols="30" rows="5"><?= isset($data['diagnosa_utama']) ? $data['diagnosa_utama'] : '' ?></textarea>
                </div>
              </div>
            </div>

            <div class="form-group">
                    <div class="col-md-4" style="margin-top:10px;">
                      <label class="control-label mb-10 text-left">Diagnosa Sekunder <b style="color:red;">*</b></label>
                      <span id="diagnosa_sekunder_error" class="text-danger"></span>
                      <div class="has-success">
                        <textarea class="form-control" name="diagnosa_sekunder" id="diagnosa_sekunder" cols="30" rows="5"><?= isset($data['diagnosa_sekunder']) ? $data['diagnosa_sekunder'] : '' ?></textarea>
                      </div>
                    </div>
                  </div>
            <div class="col-md-12">
              <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
            </div>

            <!-- <div class="form-group">
                  <div class="col-md-4">
                    <label class="control-label mb-10 text-left">Nama Lengkap TTD<span class="help"></span></label>
                    <span id="nama_error" class="text-danger"></span>
                    <div class="has-success">
                      <input type="text" class="form-control" id="nama_lengkap" value="">
                    </div>
                  </div>
                </div> -->
            <div class="col-md-12">
              <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
            </div>

            <div class="form-group">
              <div class="col-md-4">
                <button style="display: none;" data-toggle="modal" data-target="#modal_ttd" aria-expanded="false" aria-controls="poli_sore" class="btn btn-primary btn-anim btn-sm"><i class="icon-rocket"></i><span class="btn-text">TANDA TANGAN DOKTER</span></button>
                <button style="display: none;" class="btn btn-default" id="sig-clearBtn2">Clear Signature</button>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
          </div>
          <div class="form-group">
            <div class="col-md-4">
              <canvas id="ttd" width="400" height="400" style="display: none;">
            </div>
          </div>
          <div class="form-group">
            <div class="modal fade" id="modal_ttd" role="dialog" aria-labelledby="newPeternakModallabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="newPeternakModallabel">TANDA TANGAN</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>

                  <div class="modal-body">
                    <div class="form-group row" style="margin-left: 30px;">

                      <div class="row">
                        <div class="col-md-12">
                          <canvas id="tandatangan" width="300" height="300">
                          </canvas>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <button class="btn btn-primary" id="sig-submitBtn">Submit Signature</button>
                          <button class="btn btn-default" id="sig-clearBtn">Clear Signature</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>



        <div class="form-group text-center" style="margin-top: 30px;">
          <div class="col-md-12">
            <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
          </div>
          <!-- Button -->
          <div class="col-md-6">
            <a class="btn btn-default btn-anim  btn-sm" onclick="javascript:history.go(-1)" style="margin-right: 20px; margin-left: 30px;"><i class="fa fa-arrow-left"></i><span class="btn-text">KEMBALI</span></a>
            <button type="submit" class="btn btn-success mb-4" onclick="simpan()">Simpan</button>
            <button style="display:none;" type="submit" class="btn btn-success mb-4" onclick="cetak()">Cetak</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!--batas-->

<?php $this->load->view('assets/signature') ?>
<style>
  canvas {
    cursor: crosshair;
    border: 1px solid #000000;
  }
</style>
<script type="text/javascript">
  // $(document).ready(function() {
  //   no_rm = $('#inNoRM').val();
  //   $.ajax({
  //     url: "<?php echo base_url() ?>Erm_ases_dok_igd/get_ass_dok",
  //     method: "POST",
  //     dataType: 'json',
  //     data: {
  //       id: no_rm
  //     },
  //     success: function(data) {
  //       if (data.status_dt == 'found') {
  //         $('#riwayat_sakit_dulu').val(data.riwayat).attr('disabled', true);
  //       }else{
  //         $('#riwayat_sakit_dulu').val(data.riwayat_dulu).attr('disabled', true);
  //       }
  //     }

  //   });
  // });
  $(document).ready(function() {

    id_pelayanan = $('#inPel').val();
    $.ajax({
      url: "<?php echo base_url() ?>Erm_ranap_asesmen_dokter/get_ass_per_ranap",
      method: "POST",
      dataType: 'json',
      data: {
        id: id_pelayanan
      },
      success: function(data) {
        if (data.status_dt == 'found') {
          $('#tekanan_darah').val(data.tekanan_darah);
          $('#frequensi_nadi').val(data.frequensi_nadi);
          $('#frequensi_nafas').val(data.frequensi_nafas);
          $('#suhu').val(data.suhu);
          $('#skala_nyeri').val(data.skala_nyeri);
          $('#gcs').val(data.gcs);
          $('#kondisi_umum').val(data.kondisi_umum);
          $('#berat_badan').val(data.berat_badan);
          $('#tinggi_badan').val(data.tinggi_badan);
          $('#keluhan').val(data.keluhan_utama);
          /*---------------*/
          $('input[name="riwayat_alergi"][value="' + data.alergi + '"]').prop("checked", true);

          // $('#kebutuhan_khusus').val(data.kebutuhan_khusus);
          // $('#asesment_triase').val(data.asesment_triase);

        }
      }

    });
  });
</script>
<script type="text/javascript">
  $(document).ready(function() {
    $("#riwayat_alergi1").click(function() {
      if ($(this).is(":checked")) {
        $("#riwayat_alergi").show();
      }
    });
    $("#riwayat_alergi2").click(function() {
      if ($(this).is(":checked")) {
        $("#riwayat_alergi").hide();
      }
    });
  });
  $(document).ready(function(e) {

    id_pelayanan = $('#inPel').val();
    id_history = $('#inHis').val();
    reload_data_diagnosa(id_pelayanan, id_history);
    reload_data_diagnosa_id_pel(id_history);
    reload_data_diagnosa1_id_pel1(id_history);
  });
</script>

<script type="text/javascript">
  // function isCanvasBlank(canvas) {
  //   var blank = document.createElement('can');

  //   blank.width = canvas.width;
  //   blank.height = canvas.height;

  //   return canvas.toDataURL() === blank.toDataURL();
  // }
  // function isCanvasBlank(canvas) {
  //   var context = canvas.getContext('2d');

  //    pixelBuffer = new Uint32Array(
  //     context.getImageData(0, 0, canvas.width, canvas.height).data.buffer
  //   );

  //   return !pixelBuffer.some(color => color !== 0);
  // }
  function simpan() {
    // var blank = isCanvasBlank(document.getElementById('can'));
    // alert(blank ? 'blank' : 'not blank');

    id_pelayanan = $('#inPel').val();
    id_history = $('#inHis').val();
    no_rm = $('#inNoRM').val();
    keluhan = $('#keluhan').val();
    riwayat_alergi = $('input[name="riwayat_alergi"]:checked').val();
    if (riwayat_alergi == "Ada") {
      riwayat_alergi = $('#riwayat_alergi').val();
    }
    riwayat_sekarang = $('#riwayat_sakit_skrg').val();
    riwayat_dahulu = $('#riwayat_sakit_dulu').val();
    riwayat_menular = $('#riwayat_sakit_menular').val();
    keadaan_sosial = $('#keadaan_sosial').val();
    keadaan_fisik = $('#keadaan_fisik').val();

    kepala = $('#kepala').val();
    hidung = $('#hidung').val();
    leher = $('#leher').val();
    mulut = $('#mulut').val();
    thorax = $('#thorax').val();
    jantung = $('#jantung').val();
    paru = $('#paru').val();
    andomen = $('#andomen').val();
    punggung = $('#punggung').val();
    ekstremitas = $('#ekstremitas').val();
    genetalia = $('#genetalia').val();


    keterangan = $("#keterangan").val();
    terapi = $("#terapi").val();
    konsul = $("#konsul").val();
    lama = $("#lama").val();
    prognosa = $("#prognosa").val();
    let diagnosa_utama = $("#diagnosa_utama").val();
    let diagnosa_sekunder = $("#diagnosa_sekunder").val();

    if ($('#can').css("display") == "none") {
      gambar = "";
    } else {
      canvas = document.getElementById('can');
      gambar = canvas.toDataURL("image/png");
    }
    if ($('#ttd').css("display") == "none") {
      ttd = "";
    } else {
      canvas1 = document.getElementById('ttd');
      ttd = canvas1.toDataURL("image/png");
    }

    dataString = 'no_rm=' + no_rm + '&id_pelayanan=' + id_pelayanan + '&id_history=' + id_history + '&keluhan=' + keluhan + '&riwayat_alergi=' + riwayat_alergi +
      '&riwayat_sekarang=' + riwayat_sekarang + '&riwayat_dahulu=' + riwayat_dahulu + '&riwayat_menular=' + riwayat_menular +
      '&keadaan_sosial=' + keadaan_sosial + '&keadaan_fisik=' + keadaan_fisik + '&kepala=' + kepala + '&hidung=' + hidung + '&leher=' + leher + '&mulut=' + mulut +
      '&thorax=' + thorax + '&jantung=' + jantung + '&paru=' + paru + '&andomen=' + andomen + '&punggung=' + punggung + '&ekstremitas=' + ekstremitas +
      '&genetalia=' + genetalia + '&keterangan=' + keterangan +
      '&terapi=' + terapi + '&konsul=' + konsul + '&lama=' + lama + '&prognosa=' + prognosa + '&gambar=' + gambar +
      '&ttd=' + ttd + '&diagnosa_utama=' + diagnosa_utama + '&diagnosa_sekunder=' + diagnosa_sekunder;
    // alert(tindak_lanjut);

    $('#keluhan').removeClass('is-invalid');
    $('#keluhan_error').text('');

    $('#riwayat_sakit_skrg').removeClass('is-invalid');
    $('#riwayat_error').text('');

    $('#diagnosa_sekunder').removeClass('is-invalid');
    $('#diganos_sekunder_error').text('');

    $('#diagnosa_utama').removeClass('is-invalid');
    $('#diganos_utama_error').text('');


    if (keluhan === '') {
      $('html, body').animate({
        scrollTop: $('#keluhan').offset().top - 100
      }, 500);
      $('#keluhan').focus();


      $('#keluhan').addClass('is-invalid');
      $('#keluhan_error').text('Kolom ini wajib diisi!');


      return false;
    }

    if (riwayat_sekarang === '') {
      $('html, body').animate({
        scrollTop: $('#riwayat_sakit_skrg').offset().top - 100
      }, 500);
      $('#riwayat_sakit_skrg').focus();


      $('#riwayat_sakit_skrg').addClass('is-invalid');
      $('#riwayat_error').text('Kolom ini wajib diisi!');


      return false;
    }

    if (diagnosa_utama === '') {
      $('html, body').animate({
        scrollTop: $('#diagnosa_utama').offset().top - 100
      }, 500);
      $('#diagnosa_utama').focus();


      $('#diagnosa_utama').addClass('is-invalid');
      $('#diagnosa_utama_error').text('Kolom ini wajib diisi!');


      return false;
    }

    if (diagnosa_sekunder === '') {
      $('html, body').animate({
        scrollTop: $('#diagnosa_sekunder').offset().top - 100
      }, 500);
      $('#diagnosa_sekunder').focus();


      $('#diagnosa_sekunder').addClass('is-invalid');
      $('#diagnosa_sekunder_error').text('Kolom ini wajib diisi!');


      return false;
    }



    

    $.ajax({
      url: "<?php echo base_url('Erm_ranap_asesmen_dokter/insert_asses_dokter_ranap'); ?>",
      method: "POST",
      dataType: "json",
      data: dataString,
      success: function(data) {
        if (data.status === "success") {
          swal({
            title: "Good job!",
            type: "success",
            text: data.message || "Data berhasil diinputkan!",
            confirmButtonColor: "#3cb878",
          }).then(function() {
            window.location.href =
              "<?php echo base_url('Erm_ranap/form/'); ?>" +
              "<?= urlencode(base64_encode($id_pelayanan)) ?>/" +
              "<?= urlencode(base64_encode($id_history)) ?>";
          });
        } else if (data.status === "error") {
          swal({
            title: "Validasi!",
            type: "warning",
            text: data.message || "Diagnosa Utama dan Diagnosa Sekunder wajib diisi!",
            confirmButtonColor: "#f39c12",
          });
          // } else if (data.error) {
          //   if (data.keluhan != '') {
          //     $('#keluhan_error').html(data.keluhan);
          //   } else {
          //     $('#keluhan_error').html('');
          //   }
          //   if (data.nama_lengkap != '') {
          //     $('#nama_error').html(data.nama_lengkap);
          //   } else {
          //     $('#nama_error').html('');
          //   }
          //   if (data.riwayat != '') {
          //     $('#riwayat_error').html(data.riwayat);
          //   } else {
          //     $('#riwayat_error').html('');
          //   }

          //   if (riwayat_alergi == '' || riwayat_alergi == null) {
          //     $('#alergi_error').html('*wajib diisi');
          //   } else {
          //     $('#alergi_error').html('');
          //   }
          //   if (paham == '' || paham == null) {
          //     $('#paham_error').html('*wajib diisi');
          //   } else {
          //     $('#paham_error').html('');
          //   }
          //   if (psikologis == '' || psikologis == null) {
          //     $('#psiko_error').html('*wajib diisi');
          //   } else {
          //     $('#psiko_error').html('');
          //   }
          //   if (ham_sos == '' || ham_sos == null) {
          //     $('#hamsos_error').html('*wajib diisi');
          //   } else {
          //     $('#hamsos_error').html('');
          //   }
          //   if (ham_eko == '' || ham_eko == null) {
          //     $('#hameko_error').html('*wajib diisi');
          //   } else {
          //     $('#hameko_error').html('');
          //   }
          //   if (ham_spirit == '' || ham_spirit == null) {
          //     $('#hamsp_error').html('*wajib diisi');
          //   } else {
          //     $('#hamsp_error').html('');
          //   }

          //   if (tindak_lanjut == '' || tindak_lanjut == null) {
          //     $('#tindak_lanjut_error').html('*wajib diisi');
          //   } else {
          //     $('#tindak_lanjut_error').html('');
          //   }
          //   if (kondisi_pulang == '' || kondisi_pulang == null) {
          //     $('#kondisip_error').html('*wajib diisi');
          //   } else {
          //     $('#kondisip_error').html('');
          //   }
          //   if (data.konsul != '') {
          //     $('#konsul_error').html(data.konsul);
          //   } else {
          //     $('#konsul_error').html('');
          //   }

          //   if (data.terapi != '') {
          //     $('#terapi_error').html(data.terapi);
          //   } else {
          //     $('#terapi_error').html('');
          //   }

        } else {
          swal({
            title: "Gagal!",
            type: "error",
            text: "Terjadi kesalahan.",
            confirmButtonColor: "#e74c3c",
          });
        }
      },
      error: function() {
        swal({
          title: "Oops...",
          type: "error",
          text: "Terjadi kesalahan koneksi ke server!",
          confirmButtonColor: "#e74c3c",
        });
      },
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
      "scrollX": false,
      "scrollY": false,
      "pageLength": 3,
      "searching": false,
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
      "scrollX": false,
      "scrollY": false,
      "pageLength": 3,
      "searching": false,
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
          id_pelayanan: id_pelayanan,
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

  // function cetak() {
  //   id = $('#inPel').val();
  //   window.location.href = "<?php echo base_url('Erm_igd_edit/print_ass_dok_igd/') ?>" + id;
  // }

  // function reload_data_penunjang(id_pelayanan) { //nampilinn diagnosa seluruhnya utk nambah ke diagnosa pasien
  //   $('#tabel_penunjang').dataTable().fnClearTable();
  //   $('#tabel_penunjang').dataTable().fnDestroy();
  //   $('#tabel_penunjang').DataTable({
  //     "scrollX": false,
  //     "scrollY": false,
  //     "pageLength": 3,
  //     "language": {
  //       "sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
  //       "sProcessing": "Sedang memproses...",
  //       "sLengthMenu": "Tampilkan _MENU_ entri",
  //       "sZeroRecords": "Tidak ditemukan data yang sesuai",
  //       "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
  //       "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
  //       "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
  //       "sInfoPostFix": "",
  //       "sSearch": "Cari:",
  //       "sUrl": "",
  //       "oPaginate": {
  //         "sFirst": "Pertama",
  //         "sPrevious": "Sebelumnya",
  //         "sNext": "Selanjutnya",
  //         "sLast": "Terakhir",
  //       }
  //     },
  //     "ajax": {
  //       "url": '<?php echo base_url('Erm_ases_dok_igd/tampil_listdata_penunjang'); ?>',
  //       "type": 'POST',
  //       "data": {
  //         id_pelayanan: id_pelayanan
  //       },
  //     },

  //     "deferRender": true,
  //     "processing": true,

  //     "order": [],
  //     "columnDefs": [{
  //       "targets": [0],
  //       "orderable": false,
  //     }, ],
  //   });
  // }

  // function hapus_data_penunjang(nama, id) { //utk hapus diagnosa pasien
  //   swal({
  //     title: "Warning?",
  //     text: "Apakah kamu yakin menghapus file " + nama + " ini?",
  //     type: "warning",
  //     showCancelButton: true,
  //     confirmButtonColor: "#3cb878",
  //     confirmButtonText: "Yakin",
  //     cancelButtonText: "Batal",
  //     closeOnConfirm: false
  //   }, function() {
  //     $().ready(function() {
  //       $.ajax({
  //         url: "<?php echo base_url() ?>Erm_ases_dok_igd/hapus_data_penunjang",
  //         method: "POST",
  //         dataType: 'json',
  //         data: {
  //           id: id,
  //         },
  //         success: function(data) {
  //           if (data.status == "success") {
  //             swal({
  //               title: "good job!",
  //               type: "success",
  //               text: "Data Berhasil dihapus",
  //               confirmButtonColor: "#3cb878",
  //             });
  //             $('#tabel_penunjang').DataTable().ajax.reload();
  //           } else {
  //             swal({
  //               title: "Gagal!",
  //               type: "warning",
  //               confirmButtonColor: "#3cb878",
  //             });
  //           }
  //         }
  //       });
  //     });
  //   });
  //   return false;
  // }

  // function upload_file_modal() {
  //   $('.form-group').removeClass('has-error'); // clear error class
  //   $('.help-block').empty(); // clear error string
  //   $('#formUploadModal').modal('show'); // show bootstrap modal
  //   $('.modal-title').text('Form Upload File'); // Set Title to Bootstrap modal title
  // }

  // function upload_file() {
  //   $('#btnUpload').text('uploading...'); //change button text
  //   $('#btnUpload').attr('disabled', true); //set button disable


  //   // ajax adding data to database
  //   var formData = new FormData($('#formUpload')[0]);
  //   $.ajax({
  //     url: "<?php echo base_url() ?>Erm_ases_dok_igd/upload_file",
  //     type: "POST",
  //     data: formData,
  //     contentType: false,
  //     processData: false,
  //     dataType: "JSON",
  //     success: function(data) {

  //       if (data.status) //if success close modal and reload ajax table
  //       {

  //         $('#formUpload')[0].reset(); // reset form on modals
  //         $('#tabel_penunjang').DataTable().ajax.reload();

  //         swal({
  //           title: "good job!",
  //           type: "success",
  //           text: "Data Berhasil diupload",
  //           confirmButtonColor: "#3cb878",
  //         });
  //         $('#formUploadModal').modal('hide');
  //       } else {
  //         for (var i = 0; i < data.inputerror.length; i++) {
  //           $('[name="' + data.inputerror[i] + '"]').parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
  //           $('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]); //select span help-block class set text error string
  //         }
  //         $('#formUploadModal').modal('hide');
  //       }
  //       $('#btnUpload').text('upload'); //change button text
  //       $('#btnUpload').attr('disabled', false); //set button enable




  //     }
  //   });
  // }
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
        $('#keluhan').val(data.keluhan);
        $('#riwayat_sakit_skrg').val(data.riwayat);
        $('#riwayat_sakit_dulu').val(data.riwayat_dulu);
        $('#skala_nyeri').val(data.skala_nyeri);

      }

    });
  });
</script>