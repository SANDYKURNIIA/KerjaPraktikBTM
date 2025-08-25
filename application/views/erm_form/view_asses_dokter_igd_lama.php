<!-- Row -->
<div class="row">
  <div class="col-sm-12">
    <div class="panel panel-default card-view">
      <div class="panel-heading">
        <div class="pull-left">
          <h6 class="panel-title txt-dark">Assesment Dokter IGD</h6>
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
              </div>
            </div>
            <input type="hidden" class="form-control" value="<?= $id_pelayanan ?>" id="inPel">
            <input type="hidden" class="form-control" value="<?= $id_history ?>" id="inHis">
            <div class="form-group">
              <div class="col-md-3">
                <label class="control-label mb-10 text-left">Nama<span class="help"></span></label>
                <input type="text" disabled class="form-control" value="<?= $nama ?>">
              </div>
            </div>

            <div class="form-group ">
              <div class="col-md-3">
                <label class="control-label mb-10 text-left">Tanggal Masuk</label>
                <input type="text" class="form-control" value="<?php
                                                                setlocale(LC_ALL, 'id_ID');

                                                                date_default_timezone_set('Asia/Jakarta');
                                                                $time = strtotime($tgl_masuk);
                                                                $date = strftime(" %d %B %Y ", $time);
                                                                echo $date ?>" disabled>
              </div>
            </div>

            <div class="form-group ">
              <div class="col-md-3">
                <label class="control-label mb-10 text-left">Jam Datang</label>
                <input type="text" class="form-control" value="<?php
                                                                setlocale(LC_ALL, 'id_ID');

                                                                date_default_timezone_set('Asia/Jakarta');
                                                                $time = strtotime($tgl_masuk);
                                                                $date = strftime(" %d %B %Y ", $time);
                                                                $waktu = strftime("%H:%M WIB", $time);
                                                                echo $waktu ?>" disabled>
              </div>
            </div>

            <!-- <div class="form-group ">
              <div class="col-md-3">
                <label class="control-label mb-10 text-left">Jam Datang</label>
                <input type="text" class="form-control" value="<?php
                                                                setlocale(LC_ALL, 'id_ID');

                                                                date_default_timezone_set('Asia/Jakarta');
                                                                $time = strtotime($tgl_masuk);
                                                                $date = strftime(" %d %B %Y ", $time);
                                                                $waktu = strftime("%H:%M WIB", $time);
                                                                echo $waktu ?>" disabled>
              </div>
            </div> -->

            <div class="form-group">
              <div class="col-md-3">
                <label class="control-label mb-10 text-left">Tgl Lahir / Umur<span class="help"></span></label>
                <input type="text" disabled class="form-control" value="<?php
                                                                        setlocale(LC_ALL, 'id_ID');

                                                                        date_default_timezone_set('Asia/Jakarta');
                                                                        $time = strtotime($tgl_lahir);
                                                                        $date = strftime(" %d %B %Y ", $time);
                                                                        echo $date  . '(' . getAge($tgl_lahir) . ')' ?>">
              </div>
            </div>

            <div class="form-group ">
              <div class="col-md-3">
                <label class="control-label mb-10 text-left">Jenis Kelamin</label>
                <input type="text" disabled class="form-control" value="<?= $jenis_kelamin ?>">
              </div>
            </div>


            <div class="form-group">
              <div class="col-md-12">
                <h5 style="margin-top: 30px;"><strong>
                    <label class="control-label mb-10 text-left">
                      PENGKAJIAN DOKTER
                      <span class="help"></span>
                    </label></strong>
                </h5>
              </div>

              <div class="form-group">
                <div class="col-md-12">
                  <strong>
                    <label class="control-label mb-10 text-left">
                      <p><br>Data Psikologis, Sosial, Ekonomi Dan Spiritual</p>
                    </label>
                  </strong>

                </div>
              </div>

              <div class="form-group ">
                <div class="col-md-4">
                  <label class="control-label mb-10 text-left">
                    <p>Psikologis</p>
                  </label>
                  <span id="psiko_error" class="text-danger"></span>
                  <div class="checkbox checkbox-primary">
                    <input id="psikologis1" type="checkbox" name="psikologis" value="Stabil/Tenang">
                    <label class="control-label" for="psikologis1">
                      Stabil/Tenang
                    </label>
                  </div>
                  <div class="checkbox checkbox-primary">
                    <input id="psikologis2" type="checkbox" name="psikologis" value="Cemas/Takut">
                    <label class="control-label" for="psikologis2">
                      Cemas/Takut
                    </label>
                  </div>
                  <div class="checkbox checkbox-primary">
                    <input id="psikologis3" type="checkbox" name="psikologis" value="Marah">
                    <label class="control-label" for="psikologis3">
                      Marah
                    </label>
                  </div>
                  <div class="checkbox checkbox-primary">
                    <input id="psikologis4" type="checkbox" name="psikologis" value="Sedih">
                    <label class="control-label" for="psikologis4">
                      Sedih
                    </label>
                  </div>
                  <div class="checkbox checkbox-primary">
                    <input id="psikologis5" type="checkbox" name="psikologis" value="Kecenderungan Bunuh Diri">
                    <label class="control-label" for="psikologis5">
                      Kecenderungan Bunuh Diri
                    </label>
                  </div>
                  <div class="checkbox checkbox-primary">
                    <input id="psikologis6" type="checkbox" name="psikologis" value="Gangguan Jiwa">
                    <label class="control-label" for="psikologis6">
                      Gangguan Jiwa
                    </label>
                  </div>
                  <div class="checkbox checkbox-primary">
                    <input id="psikologis7" type="checkbox" name="psikologis" value="Lainnya">
                    <label class="control-label" for="psikologis7">
                      Lainnya :
                    </label>
                    <div class="has-success">
                      <input type="text" class="form-control" id="psikologis" value="" style="display: none;">
                    </div>

                  </div>
                </div>
              </div>

              <div class="form-group ">
                <div class="col-md-4">
                  <label class="control-label mb-10 text-left">
                    <p>Hambatan Sosial</p>
                    <span id="hamsos_error" class="text-danger"></span>
                  </label>
                  <div class="radio-button radio-button-primary">
                    <input id="ham_sos1" type="radio" name="ham_sos" value="Tidak Ada" checked>
                    <label class="control-label" for="ham_sos1">
                      Tidak Ada
                    </label>
                  </div>
                  <div class="radio-button radio-button-primary">
                    <input id="ham_sos2" type="radio" name="ham_sos" value="Ada">
                    <label class="control-label" for="ham_sos2">
                      Ada, Sebutkan :
                    </label>
                    <div class="has-success">
                      <input type="text" class="form-control" value="" id="ham_sos" style="display: none;">
                    </div>
                  </div>
                </div>
              </div>

              <div class="form-group ">
                <div class="col-md-4">
                  <label class="control-label mb-10 text-left">
                    <p>Hambatan Ekonomi</p>
                  </label>
                  <span id="hameko_error" class="text-danger"></span>
                  <div class="radio-button radio-button-primary">
                    <input id="ham_eko1" type="radio" name="ham_eko" value="Tidak Ada" checked>
                    <label class="control-label" for="ham_eko1">
                      Tidak Ada
                    </label>
                  </div>
                  <div class="radio-button radio-button-primary">
                    <input id="ham_eko2" type="radio" name="ham_eko" value="Ada">
                    <label class="control-label" for="ham_eko2">
                      Ada, Sebutkan :
                    </label>
                    <div class="has-success">
                      <input type="text" class="form-control" value="" id="ham_eko" style="display: none;">
                    </div>
                  </div>
                </div>
              </div>

              <div class="form-group ">
                <div class="col-md-4">
                  <label class="control-label mb-10 text-left">
                    <p>Hambatan Spiritual</p>
                  </label>
                  <span id="hamsp_error" class="text-danger"></span>
                  <div class="radio-button radio-button-primary">
                    <input id="ham_spirit1" type="radio" name="ham_spirit" value="Tidak Ada" checked>
                    <label class="control-label" for="ham_spirit1">
                      Tidak Ada
                    </label>
                  </div>
                  <div class="radio-button radio-button-primary">
                    <input id="ham_spirit2" type="radio" name="ham_spirit" value="Ada">
                    <label class="control-label" for="ham_spirit2">
                      Ada, Sebutkan :
                    </label>
                    <div class="has-success">
                      <input type="text" class="form-control" value="" id="ham_spirit" style="display: none;">
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="form-group">
                <div class="col-md-12">
                  <strong>
                    <label class="control-label mb-10 text-left">
                      <p><br>Anamnesis </p>
                    </label>
                  </strong>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-4">
                  <label class="control-label mb-10 text-left">Riwayat Alergi</label>
                  <span id="alergi_error" class="text-danger"></span>
                  <div class="radio-button radio-button-primary">
                    <input id="riwayat_alergi1" type="radio" name="riwayat_alergi" value="ada">
                    <label class="control-label" for="riwayat_alergi1">
                      Ada
                    </label>
                    <div class="has-success">
                      <input type="text" class="form-control" value="" id="riwayat_alergi" style="display: none;">
                    </div>
                  </div>
                  <div class="radio-button radio-button-primary">
                    <input id="riwayat_alergi2" type="radio" name="riwayat_alergi" value="tidak ada" checked>
                    <label class="control-label" for="riwayat_alergi2">
                      Tidak Ada
                    </label>
                  </div>
                </div>
                <div class="col-md-4">
                  <label class="control-label mb-10 text-left"><b>Keluhan Utama:<b /><span class="help"></span></label>
                  <span id="keluhan_error" class="text-danger"></span>
                  <div class="has-success">
                    <textarea class="form-control" name="" id="keluhan" cols="30" rows="3"></textarea>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-4">
                  <label class="control-label mb-10 text-left"><b>Riwayat Penyakit Sekarang: <b /><span class="help"></span></label>
                  <span id="riwayat_error" class="text-danger"></span>
                  <div class="has-success">
                    <textarea class="form-control" name="" id="riwayat_sakit_skrg" cols="30" rows="3"></textarea>
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
                    <textarea class="form-control" name="" id="riwayat_sakit_dulu" cols="30" rows="3"></textarea>
                  </div>
                </div>
                <div class="col-md-4">
                  <label class="control-label mb-10 text-left"><b>Riwayat Alergi Obat <b /><span class="help"></span></label>
                  <div class="has-success">
                    <textarea class="form-control" name="" id="alergi_obat" cols="30" rows="3"></textarea>
                  </div>
                </div>

              </div>

            </div>
            <!-- <div class="col-md-12">
              <h5 style="margin-top: 30px;"><strong>
                  <label class="control-label mb-10 text-left"><b>ASESMEN GIZI AWAL ANAK<b /><span class="help"></span></label>
                </strong>
              </h5>
            </div>


            <div class="form-group">
              <div class="col-md-3">
                <label class="control-label mb-10 text-left">Status Gizi<span class="help"></span></label>
                <div class="has-success">
                  <input type="text" class="form-control" id="status_gizi">
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-3">
                <label class="control-label mb-10 text-left">Berat Badan Ideal<span class="help"></span></label>
                <div class="has-success">
                  <input type="text" class="form-control" id="bbi_anak">
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-3">
                <label class="control-label mb-10 text-left">Riwayat Imunisasi<span class="help"></span></label>
                <div class="has-success">
                  <textarea class="form-control" name="" id="riwayat_imunisasi" cols="30" rows="3"></textarea>
                </div>
              </div>
            </div>

            <div class="form-group ">
              <div class="col-md-3">
                <label class="control-label mb-10 text-left">Riwayat Tambahan</label>
                <div class="has-success">
                  <textarea class="form-control" name="" id="riwayat_tambahan" cols="30" rows="3"></textarea>
                </div>
              </div>
            </div> -->
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
                    <p><br>Tanda Vital</p>
                  </label>
                </strong>
              </div>

              <div class="form-group">
                <div class="col-md-4">
                  <label class="control-label mb-10 text-left">Tekanan Darah<span class="help"></span></label>
                  <input type="text" class="form-control" id="tekanan_darah" placeholder="mmHg" value="" disabled>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-4">
                  <label class="control-label mb-10 text-left">Nadi<span class="help"></span></label>
                  <input type="number" class="form-control" id="frequensi_nadi" placeholder="x/menit" value="" disabled>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-4">
                  <label class="control-label mb-10 text-left">Pernafasan<span class="help"></span></label>
                  <input type="number" class="form-control" id="frequensi_nafas" placeholder="x/menit" value="" disabled>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-4">
                  <label class="control-label mb-10 text-left">Suhu<span class="help"></span></label>
                  <input type="number" class="form-control" id="suhu" placeholder="&deg;C" value="" disabled>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-4">
                  <label class="control-label mb-10 text-left">Skala Nyeri<span class="help"></span></label>
                  <input type="text" class="form-control" id="skala_nyeri" value="" disabled>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-4">
                  <label class="control-label mb-10 text-left">GCS<span class="help"></span></label>
                  <input type="number" class="form-control" id="gcs" value="" disabled>
                  <span class="help-block"></span>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-4">
                  <label class="control-label mb-10 text-left">Kondisi Umum<span class="help"></span></label>
                  <input type="text" class="form-control" id="kondisi_umum" value="" disabled>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-4">
                  <label class="control-label mb-10 text-left">Berat Badan<span class="help"></span></label>
                  <input type="text" class="form-control" id="berat_badan" value="" disabled>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-4">
                  <label class="control-label mb-10 text-left">Tinggi Badan<span class="help"></span></label>
                  <input type="text" class="form-control" id="tinggi_badan" value="" disabled>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-4">
                  <label class="control-label mb-10 text-left">Kebutuhan Khusus<span class="help"></span></label>
                  <input type="text" class="form-control" id="kebutuhan_khusus" value="" disabled>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-4">
                  <label class="control-label mb-10 text-left">Asesmen Triase<span class="help"></span></label>
                  <input type="text" class="form-control" id="asesment_triase" value="" disabled>
                </div>
                <div class="col-md-12">
                  <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                </div>
              </div>
              <div class="col-md-7">
                <div class="form-group">
                  <div class="col-md-12">
                    <label class="control-label mb-10 text-left"><b>Kepala: <b /><span class="help"></span></label>
                    <div class="has-success">
                      <textarea class="form-control" name="" id="kepala" cols="30" rows="2">Dalam Batas Normal</textarea>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-12">
                    <label class="control-label mb-10 text-left"><b>Hidung: <b /><span class="help"></span></label>
                    <div class="has-success">
                      <textarea class="form-control" name="" id="hidung" cols="30" rows="2">Dalam Batas Normal</textarea>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-12">
                    <label class="control-label mb-10 text-left"><b>Mulut: <b /><span class="help"></span></label>
                    <div class="has-success">
                      <textarea class="form-control" name="" id="mulut" cols="30" rows="2">Dalam Batas Normal</textarea>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-12">
                    <label class="control-label mb-10 text-left"><b>Leher: <b /><span class="help"></span></label>
                    <div class="has-success">
                      <textarea class="form-control" name="" id="leher" cols="30" rows="2">Dalam Batas Normal</textarea>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-12">
                    <label class="control-label mb-10 text-left"><b>THORAX : <b /><span class="help"></span></label>
                    <div class="has-success">
                      <textarea class="form-control" name="" id="thorax" cols="30" rows="2">Dalam Batas Normal</textarea>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-12">
                    <label class="control-label mb-10 text-left"><b>Jantung : <b /><span class="help"></span></label>
                    <div class="has-success">
                      <textarea class="form-control" name="" id="jantung" cols="30" rows="2">Dalam Batas Normal</textarea>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-12">
                    <label class="control-label mb-10 text-left"><b>Paru : <b /><span class="help"></span></label>
                    <div class="has-success">
                      <textarea class="form-control" name="" id="paru" cols="30" rows="2">Dalam Batas Normal</textarea>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-12">
                    <label class="control-label mb-10 text-left"><b>Andomen dan Pelvis : <b /><span class="help"></span></label>
                    <div class="has-success">
                      <textarea class="form-control" name="" id="andomen" cols="30" rows="2">Dalam Batas Normal</textarea>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-12">
                    <label class="control-label mb-10 text-left"><b>Punggung dan Pinggang : <b /><span class="help"></span></label>
                    <div class="has-success">
                      <textarea class="form-control" name="" id="punggung" cols="30" rows="2">Dalam Batas Normal</textarea>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-12">
                    <label class="control-label mb-10 text-left"><b>Ekstremitas : <b /><span class="help"></span></label>
                    <div class="has-success">
                      <textarea class="form-control" name="" id="ekstremitas" cols="30" rows="2">Dalam Batas Normal</textarea>
                    </div>
                  </div>
                </div>
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
                      <textarea class="form-control" name="" id="keterangan" cols="30" rows="2"></textarea>
                    </div>
                  </div>
                </div>

              </div>
            </div>
            <!-- <div class="form-group">
              <div class="form-group">
                <div class="col-md-12">
                  <strong>
                    <label class="control-label mb-10 text-left">
                      <p><br>Pemeriksaan Penunjang</p>
                    </label>
                  </strong>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-12">
                  <h6 class="panel-title txt-dark">Data Upload <a href="javascript:void(0)" title="Edit" onclick="upload_file_modal()"><button class="btn btn-danger btn-anim btn-xs"><i class="fa fa-pencil-square-o"></i><span class="btn-text">upload</span></button></a></h6>
                </div>
              </div>

              <div class="modal fade" id="formUploadModal" role="dialog" aria-labelledby="newPeternakModallabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="newPeternakModallabel">Upload Data Pemeriksaan Penunjang</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>

                    <div class="modal-body">
                      <div class="form-group row">
                        <form id="formUpload">
                          <div class="col-sm-6 mb-3 mb-sm-0">
                            <div class="form-group">
                              <label class="control-label mb-10">Nama Pemeriksaan Penunjang:</label>
                              <input type="text" id="nama_pelatihan" name="nama_periksa" class="form-control" placeholder="Nama Pemeriksaan Penunjang">
                              <span class="help-block text-danger"></span>
                            </div>
                          </div>
                          <input type="hidden" class="form-control" value="<?= $id_pelayanan ?>" name="idPel" id="idPel">
                          <div class="col-sm-6">
                            <div class="form-group">
                              <i class="fa fa-upload"></i>
                              <span class="btn-text">Upload</span>
                              <input type="file" class="upload" name="file" id="file">
                              <span class="help-block text-danger"></span>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                    <div class="modal-footer mb-5 mr-5 mt-10">
                      <button class="btn btn-success btn-anim  btn-sm" onclick="upload_file()" type="submit" style="margin-right: 40px;" id="simpanKunjungan"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
                    </div>

                  </div>
                </div>
              </div>

              <table class="table table-hover display  pb-60" id="tabel_penunjang">
                <thead>
                  <tr class="bg-success">
                    <th>NAMA</th>
                    <th>TANGGAL UPLOAD</th>
                    <th>FILE</th>
                    <th>HAPUS</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr class="bg-success">
                    <th>NAMA</th>
                    <th>TANGGAL UPLOAD</th>
                    <th>FILE</th>
                    <th>HAPUS</th>
                  </tr>
                </tfoot>
                <tbody style="color: black">
                </tbody>
              </table>

            </div> -->



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
                      <textarea class="form-control" name="" id="terapi" cols="30" rows="5"></textarea>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-4">
                    <label class="control-label mb-10 text-left">Konsul:</label>
                    <span id="konsul_error" class="text-danger"></span>
                    <div class="has-success">
                      <textarea class="form-control" name="" id="konsul" cols="30" rows="5"></textarea>
                    </div>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="form-group">
                  <div class="col-md-12">
                    <strong>
                      <label class="control-label mb-10 text-left">
                        <p><br>TINDAK LANJUT :</p>
                      </label>
                    </strong>
                    <span id="tindak_lanjut_error" class="text-danger"></span>
                  </div>
                </div>

                <div class="form-group ">
                  <div class="col-md-4">

                    <div class="checkbox checkbox-primary">
                      <input id="tindak_lanjut1" type="checkbox" name="tindak_lanjut" value="1">
                      <label class="control-label" for="tindak_lanjut1">
                        Pulang Atas Permintaan Sendiri
                      </label>
                    </div>
                    <div class="checkbox checkbox-primary">
                      <input id="tindak_lanjut2" type="checkbox" name="tindak_lanjut" value="2">
                      <label class="control-label" for="tindak_lanjut2">
                        Dirujuk Ke
                      </label>
                      <div class="has-success">
                        <input type="text" class="form-control" id="rujuk" style="display: none;">
                      </div>
                    </div>
                    <div class="checkbox checkbox-primary">
                      <input id="tindak_lanjut3" type="checkbox" name="tindak_lanjut" value="3">
                      <label class="control-label" for="tindak_lanjut3">
                        Rawat Inap, Jam transfer:
                      </label>
                      <div class="has-success">
                        <input type="time" class="form-control" id="ranap" style="display: none;">
                      </div>
                    </div>
                    <div class="checkbox checkbox-primary">
                      <input id="tindak_lanjut4" type="checkbox" name="tindak_lanjut" value="4">
                      <label class="control-label" for="tindak_lanjut4">
                        Pulang Atas Persetujuan
                      </label>

                    </div>
                    <div class="checkbox checkbox-primary">
                      <input id="tindak_lanjut5" type="checkbox" name="tindak_lanjut" value="5">
                      <label class="control-label" for="tindak_lanjut5">
                        Kontrol Tanggal
                      </label>
                      <div class="has-success">
                        <input type="date" class="form-control" id="kontrol" style="display: none;">
                      </div>
                    </div>
                    <div class="checkbox checkbox-primary">
                      <input id="tindak_lanjut6" type="checkbox" name="tindak_lanjut" value="6">
                      <label class="control-label" for="tindak_lanjut6">
                        Meninggal Jam
                      </label>
                      <div class="has-success">
                        <input type="time" class="form-control" id="meninggal" style="display: none;">
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="form-group ">
                  <div class="col-md-6">
                    <label class="control-label mb-10 text-left">Keadaan Waktu Pulang</label>
                    <span id="kondisip_error" class="text-danger"></span>
                    <div class="radio-button">
                      <input id="kondisi_pulang1" type="radio" name="kondisi_pulang" value="Sembuh">
                      <label class="control-label" for="kondisi_pulang1">
                        Sembuh
                      </label>
                    </div>
                    <div class="radio-button">
                      <input id="kondisi_pulang2" type="radio" name="kondisi_pulang" value="Belum Sembuh">
                      <label class="control-label" for="kondisi_pulang2">
                        Belum Sembuh
                      </label>
                    </div>

                    <div class="radio-button">
                      <input id="kondisi_pulang3" type="radio" name="kondisi_pulang" value="Membaik">
                      <label class="control-label" for="kondisi_pulang3">
                        Membaik
                      </label>
                    </div>

                    <div class="radio-button">
                      <input id="kondisi_pulang4" type="radio" name="kondisi_pulang" value="Meninggal">
                      <label class="control-label" for="kondisi_pulang4">
                        Meninggal
                      </label>
                    </div>
                    <div class="radio-button">
                      <input id="kondisi_pulang5" type="radio" name="kondisi_pulang" value="Sehat">
                      <label class="control-label" for="kondisi_pulang5">
                        Sehat
                      </label>
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                </div>
                <div class="form-group ">
                  <div class="col-md-6">
                    <label class="control-label mb-10 text-left">Telah dijelaskan dan dipahami kepada</label>
                    <span id="paham_error" class="text-danger"></span>
                    <div class="radio-button">
                      <input id="paham1" type="radio" name="paham" value="Pasien">
                      <label class="control-label" for="paham1">
                        Pasien
                      </label>
                    </div>
                    <div class="radio-button">
                      <input id="paham2" type="radio" name="paham" value="Keluarga">
                      <label class="control-label" for="paham2">
                        Keluarga, huubungan dengan pasien :
                      </label>
                    </div>
                    <div class="has-success">
                      <input type="text" class="form-control" value="" id="paham" style="display: none;">
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
                </div>

                <div class="col-md-12">
                  <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                </div> -->
                <!--modal 1-->
                <div class="form-group">
                  <div class="col-md-4">
                    <button style="display: none;" data-toggle="modal" data-target="#modal_ttd" aria-expanded="false" aria-controls="poli_sore" class="btn btn-primary btn-anim btn-sm"><i class="icon-rocket"></i><span class="btn-text">TANDA TANGAN PASIEN</span></button>
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
                              <canvas id="tandatangan" width="400" height="300">
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
<?php $this->load->view('assets/signature') ?>
<style>
  canvas {
    cursor: crosshair;
    border: 1px solid #000000;
  }
</style>
<script type="text/javascript">
  $(document).ready(function() {
    no_rm = $('#inNoRM').val();
    $.ajax({
      url: "<?php echo base_url() ?>Erm_ases_dok_igd/get_ass_dok",
      method: "POST",
      dataType: 'json',
      data: {
        id: no_rm
      },
      success: function(data) {
        if (data.status_dt == 'found') {
          $('#riwayat_sakit_dulu').val(data.riwayat).attr('disabled', true);
        }
      }

    });
  });
  $(document).ready(function() {
    id_pelayanan = $('#inPel').val();
    $.ajax({
      url: "<?php echo base_url() ?>Erm_ases_dok_igd/get_ass_per",
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
          $('#kebutuhan_khusus').val(data.kebutuhan_khusus);
          $('#asesment_triase').val(data.asesment_triase);
        }
      }

    });
  });
  $(document).ready(function(e) {
    id_pelayanan = $('#inPel').val();
    id_history = $('#inHis').val();
    reload_data_diagnosa(id_pelayanan, id_history);
    reload_data_diagnosa_id_pel(id_history);
    reload_data_diagnosa1_id_pel1(id_history);
    reload_data_penunjang(id_pelayanan);
  });
</script>
<script type="text/javascript">
  $(document).ready(function() {
    $("#psikologis7").click(function() {
      if ($(this).is(":checked")) {
        $("#psikologis").show();
      } else {
        $("#psikologis").hide();
      }
    });
    $("#periksa_lain1").click(function() {
      if ($(this).is(":checked")) {
        $("#periksa_lain").show();
      } else {
        $("#periksa_lain").hide();
      }
    });
    $("#tindak_lanjut2").click(function() {
      if ($(this).is(":checked")) {
        $("#rujuk").show();
      } else {
        $("#rujuk").hide();
      }
    });
    $("#tindak_lanjut3").click(function() {
      if ($(this).is(":checked")) {
        $("#ranap").show();
      } else {
        $("#ranap").hide();
      }
    });
    $("#tindak_lanjut5").click(function() {
      if ($(this).is(":checked")) {
        $("#kontrol").show();
      } else {
        $("#kontrol").hide();
      }
    });
    $("#tindak_lanjut6").click(function() {
      if ($(this).is(":checked")) {
        $("#meninggal").show();
      } else {
        $("#meninggal").hide();
      }
    });
    $("#ham_sos2").click(function() {
      if ($(this).is(":checked")) {
        $("#ham_sos").show();
      }
    });
    $("#ham_sos1").click(function() {
      if ($(this).is(":checked")) {
        $("#ham_sos").hide();
      }
    });
    $("#ham_spirit2").click(function() {
      if ($(this).is(":checked")) {
        $("#ham_spirit").show();
      }
    });
    $("#ham_spirit1").click(function() {
      if ($(this).is(":checked")) {
        $("#ham_spirit").hide();
      }
    });
    $("#ham_eko2").click(function() {
      if ($(this).is(":checked")) {
        $("#ham_eko").show();
      }
    });
    $("#ham_eko1").click(function() {
      if ($(this).is(":checked")) {
        $("#ham_eko").hide();
      }
    });
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
    $("#paham1").click(function() {
      if ($(this).is(":checked")) {
        $("#paham").hide();
      }
    });
    $("#paham2").click(function() {
      if ($(this).is(":checked")) {
        $("#paham").show();
      }
    });
  });
</script>

<script type="text/javascript">
  function simpan() {
    id_pelayanan = $('#inPel').val();
    id_history = $('#inHis').val();
    no_rm = $('#inNoRM').val();
    keluhan = $('#keluhan').val();
    riwayat_alergi = $('input[name="riwayat_alergi"]:checked').val();
    if (riwayat_alergi == "ada") {
      riwayat_alergi = $('#riwayat_alergi').val();
    }
    riwayat = $('#riwayat_sakit_skrg').val();
    riwayat_dulu = $('#riwayat_sakit_dulu').val();
    alergi_obat = $('#alergi_obat').val();

    var psikologis = [];
    $('input[name="psikologis"]').each(function() {
      if ($(this).is(":checked")) {
        psikologis.push($(this).val());
      }
    });
    psikologis = $('#psikologis7').is(":checked") ? psikologis.toString() + ', ' + $('#psikologis').val() : psikologis.toString();

    ham_sos = $('input[name="ham_sos"]:checked').val();
    if (ham_sos == "Ada") {
      ham_sos = $('#ham_sos').val();
    }
    ham_eko = $('input[name="ham_eko"]:checked').val();
    if (ham_eko == "Ada") {
      ham_eko = $('#ham_eko').val();
    }
    ham_spirit = $('input[name="ham_spirit"]:checked').val();
    if (ham_spirit == "Ada") {
      ham_spirit = $('#ham_spirit').val();
    }
    kepala = $('#kepala').val();
    hidung = $('#hidung').val();
    mulut = $('#mulut').val();
    leher = $('#leher').val();
    thorax = $('#thorax').val();
    jantung = $('#jantung').val();
    paru = $('#paru').val();
    andomen = $('#andomen').val();
    punggung = $('#punggung').val();
    ekstremitas = $('#ekstremitas').val();

    usg = $('input[name="usg"]:checked').val() ? $('#usg').val() : '-';
    ekg = $('input[name="ekg"]:checked').val() ? $('#ekg').val() : '-';
    ctg = $('input[name="ctg"]:checked').val() ? $('#ctg').val() : '-';
    periksa_lain = $('input[name="periksa_lain"]:checked').val() ? $('#periksa_lain').val() : '-';
    diagnosa = $('#diagnosa').val();
    tindak_lanjut = $('input[name="tindak_lanjut"]:checked').val();
    if (tindak_lanjut == "1") {
      tindak_lanjut = "Pulang Atas Permintaan Sendiri";
    } else if (tindak_lanjut == "2") {
      tindak_lanjut = "Dirujuk Ke " + $('#rujuk').val();
    } else if (tindak_lanjut == "3") {
      tindak_lanjut = "Rawat Inap, Jam transfer: " + $('#ranap').val();
    } else if (tindak_lanjut == "4") {
      tindak_lanjut = "Pulang Atas Persetujuan";
    } else if (tindak_lanjut == "5") {
      tindak_lanjut = "Kontrol Tanggal " + $('#kontrol').val();
    } else if (tindak_lanjut == "6") {
      tindak_lanjut = "Meninggal Jam " + $('#meninggal').val();
    } else {
      tindak_lanjut = '';
    }
    paham = $('input[name="paham"]:checked').val();
    if (paham == "Keluarga") {
      paham = $('#paham').val();
    }
    keterangan = $('#keterangan').val();
    nama_lengkap = $('#nama_lengkap').val();

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

    kondisi_pulang = $('input[name="kondisi_pulang"]:checked').val();
    terapi = $('#terapi').val();
    konsul = $('#konsul').val();

    dataString = 'no_rm=' + no_rm + '&id_pelayanan=' + id_pelayanan + '&id_history=' + id_history + '&keluhan=' + keluhan + '&riwayat=' + riwayat +
      '&riwayat_dulu=' + riwayat_dulu + '&psikologis=' + psikologis + '&ham_sos=' + ham_sos + '&riwayat_alergi=' + riwayat_alergi + '&alergi_obat=' + alergi_obat +
      '&ham_eko=' + ham_eko + '&ham_spirit=' + ham_spirit + '&kepala=' + kepala +
      '&hidung=' + hidung + '&mulut=' + mulut + '&leher=' + leher + '&thorax=' + thorax +
      '&jantung=' + jantung + '&paru=' + paru + '&andomen=' + andomen + '&punggung=' + punggung +
      '&ekstremitas=' + ekstremitas + '&usg=' + usg + '&ekg=' + ekg + '&ctg=' + ctg +
      '&periksa_lain=' + periksa_lain + '&diagnosa=' + diagnosa + '&tindak_lanjut=' + tindak_lanjut + '&gambar=' + gambar + '&ttd=' + ttd + '&keterangan=' + keterangan +
      '&kondisi_pulang=' + kondisi_pulang + '&terapi=' + terapi + '&konsul=' + konsul + '&paham=' + paham + '&nama_lengkap=' + nama_lengkap;
    // alert(tindak_lanjut);
    id_pel = "<?php echo urlencode(base64_encode($id_pelayanan)); ?>";
    id_his = "<?php echo urlencode(base64_encode($id_history)); ?>";
    $.ajax({
      url: "<?php echo base_url() ?>Erm_ases_dok_igd/insert_asses_dokter_igd",
      method: "POST",
      dataType: 'json',
      data: dataString,
      success: function(data) {
        if (data.status == "success") {
          window.location.href = "<?php echo base_url('Erm_igd/form/') ?>" + id_pel + '/' + id_his;
          swal({
            title: "good job!",
            type: "success",
            text: "Data Berhasil disimpan",
            confirmButtonColor: "#3cb878",
          });
        } else if (data.status == 'failed') {
          if (data.error.keluhan != '') {
            $('#keluhan_error').html(data.error.keluhan);
          } else {
            $('#keluhan_error').html('');
          }
          if (data.error.nama_lengkap != '') {
            $('#nama_error').html(data.error.nama_lengkap);
          } else {
            $('#nama_error').html('');
          }
          if (data.error.riwayat != '') {
            $('#riwayat_error').html(data.error.riwayat);
          } else {
            $('#riwayat_error').html('');
          }
          if (data.error.riwayat_dulu != '') {
            $('#riwayat_dulu_error').html(data.error.riwayat_dulu);
          } else {
            $('#riwayat_dulu_error').html('');
          }

          if (riwayat_alergi == '' || riwayat_alergi == null) {
            $('#alergi_error').html('*wajib diisi');
          } else {
            $('#alergi_error').html('');
          }
          if (paham == '' || paham == null) {
            $('#paham_error').html('*wajib diisi');
          } else {
            $('#paham_error').html('');
          }
          if (psikologis == '' || psikologis == null) {
            $('#psiko_error').html('*wajib diisi');
          } else {
            $('#psiko_error').html('');
          }
          if (ham_sos == '' || ham_sos == null) {
            $('#hamsos_error').html('*wajib diisi');
          } else {
            $('#hamsos_error').html('');
          }
          if (ham_eko == '' || ham_eko == null) {
            $('#hameko_error').html('*wajib diisi');
          } else {
            $('#hameko_error').html('');
          }
          if (ham_spirit == '' || ham_spirit == null) {
            $('#hamsp_error').html('*wajib diisi');
          } else {
            $('#hamsp_error').html('');
          }

          if (tindak_lanjut == '' || tindak_lanjut == null) {
            $('#tindak_lanjut_error').html('*wajib diisi');
          } else {
            $('#tindak_lanjut_error').html('');
          }
          if (kondisi_pulang == '' || kondisi_pulang == null) {
            $('#kondisip_error').html('*wajib diisi');
          } else {
            $('#kondisip_error').html('');
          }
          if (data.error.konsul != '') {
            $('#konsul_error').html(data.error.konsul);
          } else {
            $('#konsul_error').html('');
          }

          if (data.error.terapi != '') {
            $('#terapi_error').html(data.error.terapi);
          } else {
            $('#terapi_error').html('');
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
      "pageLength": 5,
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
        "url": '<?php echo base_url('erm_igd/tampil_list_diagnosa'); ?>',
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
        "url": '<?php echo base_url('erm_igd/tampil_list_diagnosa1'); ?>',
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
          url: "<?php echo base_url() ?>erm_igd/tambah_data_diagnosa",
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
                text: "Data Berhasil disimpan",
                confirmButtonColor: "#3cb878",
              });
              $('#tablediagnosa').DataTable().ajax.reload();
              $('#tablediagnosa1').DataTable().ajax.reload();
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
          url: "<?php echo base_url() ?>Erm_ases_dok_igd/hapus_data_diagnosa",
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
                buttons: false,
                timer: 800
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
          url: "<?php echo base_url() ?>Erm_ases_dok_igd/hapus_data_diagnosa1",
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
                buttons: false,
                timer: 800
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

  function reload_data_penunjang(id_pelayanan) { //nampilinn diagnosa seluruhnya utk nambah ke diagnosa pasien
    $('#tabel_penunjang').dataTable().fnClearTable();
    $('#tabel_penunjang').dataTable().fnDestroy();
    $('#tabel_penunjang').DataTable({
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
        "url": '<?php echo base_url('Erm_ases_dok_igd/tampil_listdata_penunjang'); ?>',
        "type": 'POST',
        "data": {
          id_pelayanan: id_pelayanan
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

  function hapus_data_penunjang(nama, id) { //utk hapus diagnosa pasien
    swal({
      title: "Warning?",
      text: "Apakah kamu yakin menghapus file " + nama + " ini?",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3cb878",
      confirmButtonText: "Yakin",
      cancelButtonText: "Batal",
      closeOnConfirm: false
    }, function() {
      $().ready(function() {
        $.ajax({
          url: "<?php echo base_url() ?>Erm_ases_dok_igd/hapus_data_penunjang",
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
              $('#tabel_penunjang').DataTable().ajax.reload();
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

  function upload_file_modal() {
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#formUploadModal').modal('show'); // show bootstrap modal
    $('.modal-title').text('Form Upload File'); // Set Title to Bootstrap modal title
  }

  function upload_file() {
    $('#btnUpload').text('uploading...'); //change button text
    $('#btnUpload').attr('disabled', true); //set button disable 


    // ajax adding data to database
    var formData = new FormData($('#formUpload')[0]);
    $.ajax({
      url: "<?php echo base_url() ?>Erm_ases_dok_igd/upload_file",
      type: "POST",
      data: formData,
      contentType: false,
      processData: false,
      dataType: "JSON",
      success: function(data) {

        if (data.status) //if success close modal and reload ajax table
        {

          $('#formUpload')[0].reset(); // reset form on modals
          $('#tabel_penunjang').DataTable().ajax.reload();

          swal({
            title: "good job!",
            type: "success",
            text: "Data Berhasil diupload",
            confirmButtonColor: "#3cb878",
          });
          $('#formUploadModal').modal('hide');
        } else {
          for (var i = 0; i < data.inputerror.length; i++) {
            $('[name="' + data.inputerror[i] + '"]').parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
            $('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]); //select span help-block class set text error string
          }
          $('#formUploadModal').modal('hide');
        }
        $('#btnUpload').text('upload'); //change button text
        $('#btnUpload').attr('disabled', false); //set button enable 




      }
    });
  }
</script>