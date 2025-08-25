<div class="row">
  <div class="col-sm-12">
    <div class="panel panel-default card-view">
      <div class="panel-heading">
        <div class="pull-left">
          <h6 class="panel-title txt-dark">Obsefvasi Pasien Intra Rumah Sakit</h6>
        </div>
        <div class="clearfix"></div>
      </div>
      <div class="panel-wrapper collapse in">
        <div class="panel-body">
          <div class="form-wrap">

            <div class="form-group">
              <div class="col-md-3">
                <label class="control-label mb-10 text-left">No.RM<span class="help"></span></label>
                <input type="text" class="form-control" value="<?= $no_rm ?>" disabled id="inNoRM">
              </div>
            </div>
            <input type="hidden" class="form-control" value="<?= $id_pelayanan ?>" id="inPel">
            <input type="hidden" class="form-control" value="<?= $id_history ?>" id="inHis">
            <div class="form-group">
              <div class="col-md-3">
                <label class="control-label mb-10 text-left">Nama<span class="help"></span></label>
                <input type="text" class="form-control" value="<?= $nama ?>" disabled>
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-3">
                <label class="control-label mb-10 text-left">Tgl Lahir<span class="help"></span></label>
                <input type="text" class="form-control" value="<?= $tgl_lahir ?>" disabled>
              </div>
            </div>

            <div class="form-group ">
              <div class="col-md-3">
                <label class="control-label mb-10 text-left">Jenis Kelamin</label>
                <input type="text" class="form-control" value="<?= $jenis_kelamin ?>" disabled>
              </div>
            </div>
            <div class="clearfix"></div>
            <hr>
            <div class="form-group">
              <div class="row">
                <div class="form-group">
                  <div class="col-md-6">
                    <label class="control-label md-3 text-left">Tanggal Masuk : <span class="help"></span></label>
                    <input type="text" class="form-control" value="<?= $tgl_masuk ?>" disabled>
                    <span class="help-block"></span>
                  </div>
                  <div class="col-md-6">
                    <label class="control-label  md-3 text-left">Tanggal/Jam Pindah : <span class="help"></span></label>
                    <span id="tgl_pindah_error" class="text-danger"></span>
                    <div class="has-success">
                      <input type="datetime-local" class="form-control" id="tglPindah">
                      <span class="help-block"></span>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-6">
                    <label class="control-label  md-3 text-left">Pindah ke Ruang / Kelas : <span class="help"></span></label>
                    <span id="tuj_pindah_error" class="text-danger"></span>
                    <div class="has-success">
                      <input type="text" class="form-control" id="tuj_pindah">
                      <span class="help-block"></span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-6">
                    <label class="control-label  md-3 text-left">DPJP :<span class="help"></span></label>
                    <input type="text" class="form-control" value="<?= $data->nama_dokter; ?>" disabled>
                    <span class="help-block"></span>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-6">
                    <label class="control-label  md-3 text-left">Diagnosis :<span class="help"></span></label>
                    <input type="text" class="form-control" value="<?= $data->diagnosa; ?>" disabled>
                    <span class="help-block"></span>
                  </div>
                </div>

              </div>

              <div class="form-group ">

                <label class="control-label mb-10 text-left">
                  <p>Cara Transfer : </p>
                </label>
                <div class="row">
                  <div class="col-md-2">
                    <span id="cara_tf_error" class="text-danger"></span>
                    <div class="checkbox checkbox-success">
                      <input id="cara_transfer1" type="checkbox" name="cara_tf" value="Jalan Sendiri">
                      <label class="control-label" for="cara_transfer1">
                        Jalan Sendiri
                      </label>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="checkbox checkbox-success">
                      <input id="cara_transfer2" type="checkbox" name="cara_tf" value="Kursi Roda">
                      <label class="control-label" for="cara_transfer2">
                        Kursi Roda
                      </label>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="checkbox checkbox-success">
                      <input id="cara_transfer3" type="checkbox" name="cara_tf" value="Brankard">
                      <label class="control-label" for="cara_transfer3">
                        Brankard
                      </label>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="checkbox checkbox-success">
                      <input id="cara_transfer4" type="checkbox" name="cara_tf" value="Lainnya">
                      <label class="control-label" for="cara_transfer4">
                        Lainnya :
                      </label>
                      <div class="has-success">
                        <input type="text" class="form-control" value="" id="cara_tf" style="display: none">
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-12">
                  <h5 style="margin-top: 30px;">
                    <strong>
                      <label class="control-label mb-10 text-left">
                        <p><br>PEMERIKSAAN FISIK</p>
                      </label>
                    </strong>
                  </h5>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label class="control-label col-md-3">Keadaan Umum<span class="help"></span></label>
                      <span id="keadaan_umum_error" class="text-danger"></span>
                      <div class="col-md-9 has-success">
                        <input type="text" class="form-control" id="keadaan_umum" value="">
                        <span class="help-block"></span>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label class="control-label col-md-3">Kesadaran<span class="help"></span></label>
                      <span id="kesadaran_error" class="text-danger"></span>
                      <div class="col-md-9 has-success">
                        <input type="text" class="form-control" id="kesadaran" value="">
                        <span class="help-block"></span>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-12">
                  <label class="control-label">
                    <p><br>Tanda-tanda vital : </p>
                  </label>
                </div>
                <div class="form-group">
                  <div class="col-md-4">
                    <label class="control-label mb-10 text-left">TD(MmHg)<span class="help"></span></label>
                    <span id="tekanan_darah_error" class="text-danger"></span>
                    <div class="has-success">
                      <input type="number" class="form-control" name="tekanan_darah" placeholder="MmHg">
                      <span class="help-block"></span>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <label class="control-label mb-10 text-left">Suhu(&deg;C)<span class="help"></span></label>
                    <span id="suhu_error" class="text-danger"></span>
                    <div class="has-success">
                      <input type="number" class="form-control" name="suhu" placeholder="Celsius">
                      <span class="help-block"></span>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <label class="control-label mb-10 text-left">Nadi(X/Mnt)<span class="help"></span></label>
                    <span id="freq_nadi_error" class="text-danger"></span>
                    <div class="has-success">
                      <input type="number" class="form-control" name="frequensi_nadi" placeholder="X/Menit">
                      <span class="help-block"></span>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <label class="control-label mb-10 text-left">RR(X/Mnt)<span class="help"></span></label>
                    <span id="rr_error" class="text-danger"></span>
                    <div class="has-success">
                      <input type="number" class="form-control" name="rr" placeholder="X/Menit">
                      <span class="help-block"></span>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <label class="control-label mb-10 text-left">Skala Nyeri<span class="help"></span></label>
                    <span id="skala_nyeri_error" class="text-danger"></span>
                    <div class="has-success">
                      <input type="number" class="form-control" name="skala_nyeri" placeholder="">
                      <span class="help-block"></span>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <label class="control-label">
                      <p><br>Respiratori : </p>
                    </label>
                  </div>
                  <div class="col-md-4">
                    <label class="control-label">Dada<span class="help"></span></label>
                    <span id="dada_error" class="text-danger"></span>
                    <div class="radio-button radio-button-primary">
                      <input id="dada1" name="dada" type="radio" value="Simetris">
                      <label class="control-label" for="dada1">
                        Simetris
                      </label>
                    </div>
                    <div class="radio-button radio-button-primary">
                      <input id="dada2" name="dada" type="radio" value="Asimetris">
                      <label class="control-label" for="dada2">
                        Asimetris
                      </label>
                    </div>
                    <div class="radio-button radio-button-primary">
                      <input id="dada3" name="dada" type="radio" value="Bernafas">
                      <label class="control-label" for="dada3">
                        Bernafas
                      </label>
                    </div>
                    <div class="radio-button radio-button-primary">
                      <input id="dada4" name="dada" type="radio" value="Nyeri">
                      <label class="control-label" for="dada4">
                        Nyeri
                      </label>
                    </div>
                    <div class="radio-button radio-button-primary">
                      <input id="dada5" name="dada" type="radio" value="Tidak Nyeri">
                      <label class="control-label" for="dada5">
                        Tidak Nyeri
                      </label>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <label class="control-label">Bunyi Paru<span class="help"></span></label>
                    <span id="paru_error" class="text-danger"></span>
                    <div class="radio-button radio-button-primary">
                      <input id="paru1" name="paru" type="radio" value="Ronkhi">
                      <label class="control-label" for="paru1">
                        Ronkhi
                      </label>
                    </div>
                    <div class="radio-button radio-button-primary">
                      <input id="paru2" name="paru" type="radio" value="Wheezing">
                      <label class="control-label" for="paru2">
                        Wheezing
                      </label>
                    </div>
                    <div class="radio-button radio-button-primary">
                      <input id="paru3" name="paru" type="radio" value="Vesikular">
                      <label class="control-label" for="paru3">
                        Vesikular
                      </label>
                    </div>
                    <div class="radio-button radio-button-primary">
                      <input id="paru4" name="paru" type="radio" value="Crackles">
                      <label class="control-label" for="paru4">
                        Crackles
                      </label>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <label class="control-label">Sirkulasi <span class="help"></span></label>
                    <span id="sirkulasi_error" class="text-danger"></span>
                    <div class="radio-button radio-button-primary">
                      <input id="sirkulasi1" name="sirkulasi" type="radio" value="Nyeri Dada">
                      <label class="control-label" for="sirkulasi1">
                        Nyeri Dada
                      </label>
                    </div>
                    <div class="radio-button radio-button-primary">
                      <input id="sirkulasi2" name="sirkulasi" type="radio" value="Sakit Kepala/Pusing">
                      <label class="control-label" for="sirkulasi2">
                        Sakit Kepala/Pusing
                      </label>
                    </div>
                    <div class="radio-button radio-button-primary">
                      <input id="sirkulasi3" name="sirkulasi" type="radio" value="Cyanosis">
                      <label class="control-label" for="sirkulasi3">
                        Cyanosis
                      </label>
                    </div>
                    <div class="radio-button radio-button-primary">
                      <input id="sirkulasi4" name="sirkulasi" type="radio" value="Berdebar">
                      <label class="control-label" for="sirkulasi4">
                        Berdebar
                      </label>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                  </div>
                  <div class="col-md-4">
                    <label class="control-label mb-10 text-left">Keluhan<span class="help"></span></label>
                    <span id="keluhan_error" class="text-danger"></span>
                    <div class="has-success">
                      <input type="text" class="form-control" id="keluhan">
                      <span class="help-block"></span>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <label class="control-label mb-10 text-left">Riwayat Penyakit<span class="help"></span></label>
                    <span id="riwayat_penyakit_error" class="text-danger"></span>
                    <div class="has-success">
                      <input type="text" class="form-control" id="riwayat_penyakit">
                      <span class="help-block"></span>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                  </div>
                  <div class="col-md-4">
                    <label class="control-label">Riwayat Alergi<span class="help"></span></label>
                    <span id="alergi_error" class="text-danger"></span>
                    <div class="radio-button radio-button-primary">
                      <input id="alergi1" name="alergi" type="radio" value="Tidak">
                      <label class="control-label" for="alergi1">
                        Tidak Ada
                      </label>
                    </div>
                    <div class="radio-button radio-button-primary">
                      <input id="alergi2" name="alergi" type="radio" value="Ada">
                      <label class="control-label" for="alergi2">
                        Ada, Sebutkan :
                      </label>
                      <div class="has-success">
                        <input type="text" class="form-control" value="" id="alergi" style="display: none">
                      </div>
                    </div>
                  </div>
                </div>



              </div>
              <div class="form-group">
                <div class="col-md-12">
                  <h5 style="margin-top: 30px;">
                    <strong>
                      <label class="control-label mb-10 text-left">
                        <p><br>PEMERIKSAAN DIAGNOSIS YANG SUDAH DILAKUKAN</p>
                      </label>
                    </strong>
                  </h5>
                </div>
                <div class="row">

                  <div class="col-md-4">
                    <div class="checkbox checkbox-primary">
                      <input id="diagnosis2" name="ekg" type="checkbox" value="EKG">
                      <label class="control-label" for="diagnosis2">
                        EKG
                      </label>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="checkbox checkbox-primary">
                      <input id="diagnosis3" name="hsg" type="checkbox" value="HSG">
                      <label class="control-label" for="diagnosis3">
                        HSG
                      </label>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="checkbox checkbox-primary">
                      <input id="diagnosis4" name="ctg" type="checkbox" value="CTG">
                      <label class="control-label" for="diagnosis4">
                        CTG
                      </label>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="checkbox checkbox-primary">
                      <input id="diagnosis5" name="usg" type="checkbox" value="USG">
                      <label class="control-label" for="diagnosis5">
                        USG
                      </label>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="checkbox checkbox-primary">
                      <input id="diagnosis6" name="Appendicogram" type="checkbox" value="Appendicogram">
                      <label class="control-label" for="diagnosis6">
                        Appendicogram
                      </label>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="checkbox checkbox-primary">
                      <input id="diagnosis7" name="bno" type="checkbox" value="BNO">
                      <label class="control-label" for="diagnosis7">
                        BNO
                      </label>
                    </div>
                  </div>


                </div>
              </div>

              <div class="form-group">
                <div class="col-md-12">
                  <h5 style="margin-top: 30px;">
                    <strong>
                      <label class="control-label mb-10 text-left">
                        <p><br>TINDAKAN MEDIS YANG SUDAH DILAKUKAN</p>
                      </label>
                    </strong>
                  </h5>
                </div>
                <span id="tindakan_error" class="text-danger"></span>
                <div class="col-md-8 has-success">
                  <textarea class="form-control" name="" id="tindakan_medis" cols="30" rows="3"></textarea>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-12">
                  <h5 style="margin-top: 30px;">
                    <strong>
                      <label class="control-label mb-10 text-left">
                        <p><br>PEMBERIAN THERAPI</p>
                      </label>
                    </strong>
                  </h5>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <span id="infus_error" class="text-danger"></span>
                    <label class="control-label col-md-3">Infus : <span class="help"></span></label>
                    <div class="col-md-9 has-success">
                      <input type="text" class="form-control" id="infus">
                      <span class="help-block"></span>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
        <div class="panel-wrapper collapse in">
          <div class="panel-body">
            <div class="table-wrap">
              <div class="table-responsive">
                <table class="table table-hover display  pb-30" id="tabel_obat">
                  <thead>
                    <tr class="bg-success">
                      <th>NAMA OBAT</th>
                      <th>DOSIS</th>
                      <th>CARA PEMBERIAN</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr class="bg-success">
                      <th>NAMA OBAT</th>
                      <th>DOSIS</th>
                      <th>CARA PEMBERIAN</th>
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
            <h5 style="margin-top: 30px;">
              <strong>
                <label class="control-label mb-10 text-left">
                  <p><br>KONDISI PASIEN</p>
                </label>
              </strong>
            </h5>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label class="control-label col-md-3">Saat Transfer<span class="help"></span></label>
                <span id="kondisi_tf_error" class="text-danger"></span>
                <div class="col-md-9 has-success">
                  <input type="text" class="form-control" id="kondisi_tf">
                  <span class="help-block"></span>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label class="control-label col-md-3">Saat Serah Terima<span class="help"></span></label>
                <span id="kondisi_terima_error" class="text-danger"></span>
                <div class="col-md-9 has-success">
                  <input type="text" class="form-control" id="kondisi_terima">
                  <span class="help-block"></span>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <label class="control-label">
                <p><br>Tanda-tanda vital : </p>
              </label>
            </div>
            <div class="form-group">
              <div class="col-md-4">
                <label class="control-label mb-10 text-left">TD(MmHg)<span class="help"></span></label>
                <span id="td_error" class="text-danger"></span>
                <div class="has-success">
                  <input type="number" class="form-control" name="td" placeholder="MmHg">
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-4">
                <label class="control-label mb-10 text-left">Suhu(&deg;C)<span class="help"></span></label>
                <span id="suhu1_error" class="text-danger"></span>
                <div class="has-success">
                  <input type="number" class="form-control" name="suhu1" placeholder="Celsius">
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-4">
                <label class="control-label mb-10 text-left">Nadi(X/Mnt)<span class="help"></span></label>
                <span id="nadi_error" class="text-danger"></span>
                <div class="has-success">
                  <input type="number" class="form-control" name="nadi" placeholder="X/Menit">
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-4">
                <label class="control-label mb-10 text-left">RR(X/Mnt)<span class="help"></span></label>
                <span id="rr1_error" class="text-danger"></span>
                <div class="has-success">
                  <input type="number" class="form-control" name="rr1" placeholder="X/Menit">
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-4">
                <label class="control-label mb-10 text-left">Skala Nyeri<span class="help"></span></label>
                <span id="skala_nyeri1_error" class="text-danger"></span>
                <div class="has-success">
                  <input type="number" class="form-control" name="skala_nyeri1" placeholder="">
                </div>
              </div>
            </div>
          </div>
          <br>
        </div>
        <div class="col-md-4">
          <label class="control-label">Pasien:</label>
          <br />
          <div class="row">
            <button data-toggle="modal" data-target="#modal_ttd" aria-expanded="false" aria-controls="poli_sore" class="btn btn-primary btn-anim btn-sm"><i class="icon-rocket"></i><span class="btn-text">TANDA TANGAN</span></button>
            <button class="btn btn-default" id="sig-clearBtn">Clear Signature</button>
            <canvas id="can" width="300" height="300" style="display: none;"></canvas>
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
                            <canvas id="ttd" width="300" height="300">
                            </canvas>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <button class="btn btn-primary" id="sig-submitBtn">Submit Signature</button>
                            <button class="btn btn-default" id="sig-clearBtn1">Clear Signature</button>
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
        <div class="row">
          <div class="col-md-8" style="margin-top: 30px;">
            <div class="form-group pull-left">
              <a class="btn btn-default btn-anim  btn-sm" onclick="javascript:history.go(-1)" style="margin-right: 20px; margin-left: 30px;"><i class="fa fa-arrow-left"></i><span class="btn-text">KEMBALI</span></a>
              <button onclick="simpan()" class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
                <!-- <button onclick="insert_na_radio()" class="btn btn-warning btn-anim  btn-sm ml-20 mt-5" id="na_radio"><i class="icon-rocket"></i><span class="btn-text">N/A</span> -->
            </div>
          </div>
        </div>

      </div>
    </div>
    <!--batas-->

  </div>
</div>
<?php $this->load->view('assets/signature2') ?>
<style>
  canvas {
    cursor: crosshair;
    border: 1px solid #000000;
  }
</style>
<script type="text/javascript">
  $(document).ready(function() {
    $("#alergi1").click(function() {
      if ($(this).is(":checked")) {
        $("#alergi").hide();
      }
    });
    $("#alergi2").click(function() {
      if ($(this).is(":checked")) {
        $("#alergi").show();
      }
    });
  });
</script>
<script>
  $(document).ready(function() {
    id_history = $('#inHis').val();
    reload_data_id_pel(id_history);
  });

  function reload_data_id_pel(id_history) { //utk reload data diagnosa pasien jika berhasil
    $('#tabel_obat').dataTable().fnClearTable();
    $('#tabel_obat').dataTable().fnDestroy();
    $('#tabel_obat').DataTable({
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
        "url": '<?php echo base_url('erm_igd/tampil_list_terapi1'); ?>',
        "type": 'POST',
        "data": {
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
</script>
<script type="text/javascript">
  function simpan() {
    id_pelayanan = $('#inPel').val();
    id_history = $('#inHis').val();
    no_rm = $('#inNoRM').val();

    tglPindah = $('#tglPindah').val();
    tuj_pindah = $('#tuj_pindah').val();
    cara_tf = $('input[name="cara_tf"]:checked').val();
    if (cara_tf == "Lainnya") {
      cara_tf = $('#cara_tf').val();
    }
    keadaan_umum = $('#keadaan_umum').val();
    kesadaran = $('#kesadaran').val();
    tekanan_darah = $('input[name="tekanan_darah"]').val();
    suhu = $('input[name="suhu"]').val();
    frequensi_nadi = $('input[name="frequensi_nadi"]').val();
    rr = $('input[name="rr"]').val();
    skala_nyeri = $('input[name="skala_nyeri"]').val();
    keluhan = $('#keluhan').val();
    riwayat_penyakit = $('#riwayat_penyakit').val();
    alergi = $('input[name="alergi"]:checked').val();
    if (alergi == "Ada") {
      alergi = $('#alergi').val();
    }

    kondisi_tf = $('#kondisi_tf').val();
    kondisi_terima = $('#kondisi_terima').val();

    tekanan_darah1 = $('input[name="td"]').val();
    suhu1 = $('input[name="suhu1"]').val();
    frequensi_nadi1 = $('input[name="nadi"]').val();
    rr1 = $('input[name="rr1"]').val();
    skala_nyeri1 = $('input[name="skala_nyeri1"]').val();


    ctg = $('input[name="ctg"]:checked').val() ? $('input[name="ctg"]:checked').val() : '-';
    ekg = $('input[name="ekg"]:checked').val() ? $('input[name="ekg"]:checked').val() : '-';
    usg = $('input[name="usg"]:checked').val() ? $('input[name="usg"]:checked').val() : '-';
    hsg = $('input[name="hsg"]:checked').val() ? $('input[name="hsg"]:checked').val() : '-';
    Appendicogram = $('input[name="Appendicogram"]:checked').val() ? $('input[name="Appendicogram"]:checked').val() : '-';
    bno = $('input[name="bno"]:checked').val() ? $('input[name="bno"]:checked').val() : '-';

    tindakan = $('#tindakan_medis').val();
    infus = $('#infus').val();
    if ($('#can').css("display") == "none") {
      ttd = "";
    } else {
      canvas = document.getElementById('can');
      ttd = canvas.toDataURL("image/png");
    }
    dada = $('input[name="dada"]:checked').val();
    paru = $('input[name="paru"]:checked').val();
    sirkulasi = $('input[name="sirkulasi"]:checked').val();

    dataString = 'no_rm=' + no_rm + '&id_pelayanan=' + id_pelayanan + '&id_history=' + id_history +
      '&tglPindah=' + tglPindah + '&tuj_pindah=' + tuj_pindah +
      '&keadaan_umum=' + keadaan_umum + '&kesadaran=' + kesadaran + '&tekanan_darah=' + tekanan_darah + '&suhu=' + suhu +
      '&frequensi_nadi=' + frequensi_nadi + '&rr=' + rr + '&skala_nyeri=' + skala_nyeri + '&keluhan=' + keluhan +
      '&riwayat_penyakit=' + riwayat_penyakit + '&alergi=' + alergi + '&tekanan_darah1=' + tekanan_darah1 + '&suhu1=' + suhu1 +
      '&frequensi_nadi1=' + frequensi_nadi1 + '&rr1=' + rr1 + '&skala_nyeri1=' + skala_nyeri1 +
      '&ctg=' + ctg + '&ekg=' + ekg + '&usg=' + usg + '&hsg=' + hsg + '&appendicogram=' + Appendicogram + '&bno=' + bno +
      '&tindakan=' + tindakan + '&infus=' + infus + '&cara_tf=' + cara_tf + '&kondisi_tf=' + kondisi_tf + '&kondisi_terima=' + kondisi_terima +
      '&ttd=' + ttd + '&dada=' + dada + '&paru=' + paru + '&sirkulasi=' + sirkulasi;


    id_pel = "<?php echo urlencode(base64_encode($id_pelayanan)); ?>";
    id_his = "<?php echo urlencode(base64_encode($id_history)); ?>";

    $.ajax({
      url: "<?php echo base_url() ?>Erm_transfer_intra_rs/insert_tf_intra_rs",
      method: "POST",
      dataType: 'json',
      data: dataString,
      success: function(data) {
        if (data.status == "success") {
          window.location.href = "<?php echo base_url('Erm_igd/form/') ?>" + id_pel + '/' + id_his;
        } else if (data.error) {
          if (data.tglPindah != '') {
            $('#tgl_pindah_error').html(data.tglPindah);
          } else {
            $('#tgl_pindah_error').html('');
          }
          if (data.tuj_pindah != '') {
            $('#tuj_pindah_error').html(data.tuj_pindah);
          } else {
            $('#tuj_pindah_error').html('');
          }
          if (cara_tf == '' || cara_tf == null) {
            $('#cara_tf_error').html('*wajib diisi');
          } else {
            $('#cara_tf_error').html('');
          }
          if (data.kondisi_tf != '') {
            $('#kondisi_tf_error').html(data.kondisi_tf);
          } else {
            $('#kondisi_tf_error').html('');
          }
          if (data.kondisi_terima != '') {
            $('#kondisi_terima_error').html(data.kondisi_terima);
          } else {
            $('#kondisi_terima_error').html('');
          }
          if (data.keadaan_umum != '') {
            $('#keadaan_umum_error').html(data.keadaan_umum);
          } else {
            $('#keadaan_umum_error').html('');
          }
          if (data.kesadaran != '') {
            $('#kesadaran_error').html(data.kesadaran);
          } else {
            $('#kesadaran_error').html('');
          }
          if (data.tekanan_darah != '') {
            $('#tekanan_darah_error').html(data.tekanan_darah);
          } else {
            $('#tekanan_darah_error').html('');
          }
          if (data.suhu != '') {
            $('#suhu_error').html(data.suhu);
          } else {
            $('#suhu_error').html('');
          }
          if (data.frequensi_nadi != '') {
            $('#freq_nadi_error').html(data.frequensi_nadi);
          } else {
            $('#freq_nadi_error').html('');
          }
          if (data.rr != '') {
            $('#rr_error').html(data.rr);
          } else {
            $('#rr_error').html('');
          }

          if (data.skala_nyeri != '') {
            $('#skala_nyeri_error').html(data.skala_nyeri);
          } else {
            $('#skala_nyeri_error').html('');
          }
          if (data.keluhan != '') {
            $('#keluhan_error').html(data.keluhan);
          } else {
            $('#keluhan_error').html('');
          }
          if (data.riwayat_penyakit != '') {
            $('#riwayat_penyakit_error').html(data.riwayat_penyakit);
          } else {
            $('#riwayat_penyakit_error').html('');
          }
          if (alergi == '' || alergi == null) {
            $('#alergi_error').html('*wajib diisi');
          } else {
            $('#alergi_error').html('');
          }
          if (dada == '' || dada == null) {
            $('#dada_error').html('*wajib diisi');
          } else {
            $('#dada_error').html('');
          }
          if (paru == '' || paru == null) {
            $('#paru_error').html('*wajib diisi');
          } else {
            $('#paru_error').html('');
          }
          if (sirkulasi == '' || sirkulasi == null) {
            $('#sirkulasi_error').html('*wajib diisi');
          } else {
            $('#sirkulasi_error').html('');
          }
          if (data.tindakan != '') {
            $('#tindakan_error').html(data.tindakan);
          } else {
            $('#tindakan_error').html('');
          }
          if (data.tekanan_darah1 != '') {
            $('#td_error').html(data.tekanan_darah1);
          } else {
            $('#td_error').html('');
          }

          if (data.suhu1 != '') {
            $('#suhu1_error').html(data.suhu1);
          } else {
            $('#suhu1_error').html('');
          }
          if (data.frequensi_nadi1 != '') {
            $('#nadi_error').html(data.frequensi_nadi1);
          } else {
            $('#nadi_error').html('');
          }

          if (data.rr1 != '') {
            $('#rr1_error').html(data.rr1);
          } else {
            $('#rr1_error').html('');
          }
          if (data.skala_nyeri1 != '') {
            $('#skala_nyeri1_error').html(data.skala_nyeri1);
          } else {
            $('#skala_nyeri1_error').html('');
          }
          if (data.infus != '') {
            $('#infus_error').html(data.infus);
          } else {
            $('#infus_error').html('');
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