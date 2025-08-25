<!-- Row -->
<div class="row">
  <div class="col-sm-12">
    <div class="panel panel-default card-view">
      <div class="panel-heading">
        <div class="pull-left">
          <h6 class="panel-title txt-dark">Transfer/Rujukan Pasien Antar Rumah Sakit</h6>
        </div>
        <div class="clearfix"></div>
      </div>
      <div class="panel-wrapper collapse in">
        <div class="panel-body">
          <div class="form-wrap">
            <div class="col-md-12">
              <h5>
                <strong>
                  <label class="control-label mb-10 text-left">
                    <p><br>IDENTITAS PASIEN</p>
                  </label>
                </strong>
              </h5>
            </div>
            <input type="hidden" class="form-control" value="<?= $id_pelayanan ?>" id="inPel">
            <input type="hidden" class="form-control" value="<?= $id_history ?>" id="inHis">
            <input type="hidden" class="form-control" value="<?= $no_rm ?>" id="inNoRM">
            <div class="form-group">
              <div class="col-md-4">
                <div class="form-group">
                  <label class="control-label col-md-3">Nama<span class="help"></span></label>
                  <div class="col-md-9 has-success">
                    <input type="text" class="form-control" value="<?= $nama ?>" id="inAlamat2" disabled>
                    <span class="help-block"></span>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label class="control-label col-md-3">DPJP<span class="help"></span></label>
                  <div class="col-md-9 has-success">
                    <input type="text" class="form-control" value="<?= $dpjp ?>" id="inAlamat2" disabled>
                    <span class="help-block"></span>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label class="control-label col-md-3">Tanggal Lahir/Umur<span class="help"></span></label>
                  <div class="col-md-9 has-success">
                    <input type="text" class="form-control" value="<?= $tgl_lahir ?>" id="inAlamat2" disabled>
                    <span class="help-block"></span>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label class="control-label col-md-3">Ruangan/Kelas dirawat<span class="help"></span></label>
                  <div class="col-md-9 has-success">
                    <input type="text" class="form-control" value="<?= $nama ?>" id="inAlamat2">
                    <span class="help-block"></span>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label class="control-label col-md-3">Tanggal masuk RS<span class="help"></span></label>
                  <div class="col-md-9 has-success">
                    <input type="text" class="form-control" value="<?= $tgl_masuk ?>" id="inAlamat2" disabled>
                    <span class="help-block"></span>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label class="control-label col-md-3">rumah sakit tujuan<span class="help"></span></label>
                  <span id="rs_tuj_error" class="text-danger"></span>
                  <div class="col-md-9 has-success">
                    <input type="text" class="form-control" value="" id="rs_tujuan">
                    <span class="help-block"></span>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label class="control-label col-md-3">Staf yang melakukan kontak<span class="help"></span></label>
                  <span id="staff_error" class="text-danger"></span>
                  <div class="col-md-9 has-success">
                    <input type="text" class="form-control" id="staff">
                    <span class="help-block"></span>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label class="control-label col-md-3">Tanggal/jam<span class="help"></span></label>
                  <span id="tgl_error" class="text-danger"></span>
                  <div class="col-md-9 has-success">
                    <input type="datetime-local" class="form-control" id="tgl">
                    <span class="help-block"></span>
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label class="control-label col-md-3">Berangkat dari RS bakti timah jam<span class="help"></span></label>
                  <span id="jam_brgkt_error" class="text-danger"></span>
                  <div class="col-md-9 has-success">
                    <input type="time" class="form-control" id="jam_brgkt">
                    <span class="help-block"></span>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label class="control-label col-md-3">staf yang menerima kontak<span class="help"></span></label>
                  <span id="staff_terima_error" class="text-danger"></span>
                  <div class="col-md-9 has-success">
                    <input type="text" class="form-control" id="staf_terima">
                    <span class="help-block"></span>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label class="control-label col-md-3">Tiba di RS Tujuan Jam : <span class="help"></span></label>
                  <span id="jam_tiba_error" class="text-danger"></span>
                  <div class="col-md-9 has-success">
                    <input type="time" class="form-control" id="jam_tiba">
                    <span class="help-block"></span>
                  </div>
                </div>
              </div>


              <div class="clearfix"></div>
              <hr>

            </div>
            <div class="form-group">
              <div class="col-md-12">
                <h5>
                  <strong>
                    <label class="control-label mb-10 text-left">
                      <p>ALASAN MERUJUK</p>
                    </label>
                  </strong>
                </h5>
              </div>


              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label col-md-3">Klinikal : <span class="help"></span></label>
                    <span id="klinikal_error" class="text-danger"></span>
                    <div class="col-md-9 has-success">
                      <input type="text" class="form-control" id="klinikal">
                      <span class="help-block"></span>
                    </div>
                  </div>
                </div>

              </div>

              <label class="control-label">
                <p>Non Klinikal : </p>
              </label>
              <span id="non_klinik_error" class="text-danger"></span>
              <div class="row">
                <div class="col-md-2">

                  <div class="checkbox checkbox-primary">
                    <input id="non_klinik1" type="checkbox" name="non_klinik" value="Tidak ada ruangan ICU/NICU">
                    <label class="control-label" for="non_klinik1">
                      Tidak ada ruangan ICU/NICU
                    </label>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="checkbox checkbox-primary">
                    <input id="checkbox2" type="checkbox" name="non_klinik" value="Ruang rawat inap penuh">
                    <label class="control-label" for="checkbox2">
                      Ruang rawat inap penuh
                    </label>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="checkbox checkbox-primary">
                    <input id="checkbox3" type="checkbox" name="non_klinik" value="Permintaan pasien/keluarga">
                    <label class="control-label" for="checkbox3">
                      Permintaan pasien/keluarga
                    </label>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="checkbox checkbox-primary">
                    <input id="non_klinik4" type="checkbox" value="Lainnya">
                    <label class="control-label" for="non_klinik4">
                      Lainnya :
                    </label>
                    <div class="has-success">
                      <input type="text" class="form-control" id="non_klinik" style="display: none;">
                      <span class="help-block"></span>
                    </div>
                  </div>
                </div>
              </div>


              <div class="form-group">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="control-label col-md-3">DIAGNOSIS MEDIS<span class="help"></span></label>
                      <span id="diagnosis_error" class="text-danger"></span>
                      <div class="col-md-9 has-success">
                        <input type="text" class="form-control" id="diagnosis" value="<?= $data->diagnosa; ?>">
                        <span class="help-block"></span>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="control-label col-md-3">DOKTER YANG MERUJUK<span class="help"></span></label>
                      <span id="dok_rujuk_error" class="text-danger"></span>
                      <div class="col-md-9 has-success">
                        <input type="text" class="form-control" id="dok_rujuk">
                        <span class="help-block"></span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="clearfix"></div>
                <hr>
                <div class="row">
                  <div class="col-md-12">
                    <h5>
                      <strong>
                        <label class="control-label mb-10 text-left">
                          <p>CATATAN KLINIK</p>
                        </label>
                      </strong>
                    </h5>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="control-label col-md-3">Riwayat Penyakit<span class="help"></span></label>
                      <div class="col-md-9">
                        <span id="riwayat_penyakit_error" class="text-danger"></span>
                        <div class="radio-button radio-button-primary">
                          <input id="riwayat_penyakit1" name="riwayat_penyakit" type="radio" value="Tidak Ada">
                          <label class="control-label" for="riwayat_penyakit1">
                            Tidak Ada
                          </label>
                        </div>
                        <div class="radio-button radio-button-primary">
                          <input id="riwayat_penyakit2" name="riwayat_penyakit" type="radio" value="Ada">
                          <label class="control-label" for="riwayat_penyakit2">
                            Ada, Sebutkan :
                          </label>
                          <div class="has-success">
                            <input type="text" class="form-control" id="riwayat_penyakit" value="" style="display: none;">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="control-label col-md-3">Riwayat Alergi<span class="help"></span></label>
                      <div class="col-md-9">
                        <span id="riwayat_alergi_error" class="text-danger"></span>
                        <div class="radio-button radio-button-primary">
                          <input id="riwayat_alergi1" name="riwayat_alergi" type="radio" value="Tidak Ada">
                          <label class="control-label" for="riwayat_alergi1">
                            Tidak Ada
                          </label>
                        </div>
                        <div class="radio-button radio-button-primary">
                          <input id="riwayat_alergi2" name="riwayat_alergi" type="radio" value="Ada">
                          <label class="control-label" for="riwayat_alergi2">
                            Ada, Sebutkan :
                          </label>
                          <div class="has-success">
                            <input type="text" class="form-control" id="riwayat_alergi" value="" style="display: none;">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="control-label col-md-3">Intake Oral terakhir<span class="help"></span></label>
                      <span id="oral_error" class="text-danger"></span>
                      <div class="col-md-9 has-success">
                        <input type="text" class="form-control" id="inTakeOral">
                        <span class="help-block"></span>
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
                              <th>FREKUENSI</th>
                              <th>JAM</th>
                            </tr>
                          </thead>
                          <tfoot>
                            <tr class="bg-success">
                              <th>NAMA OBAT</th>
                              <th>FREKUENSI</th>
                              <th>JAM</th>
                            </tr>
                          </tfoot>
                          <tbody style="color: black">
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- <div class="form-group">
                  <div class="col-md-12">
                    <h5 style="margin-top: 30px;">
                      <strong>
                        <label class="control-label mb-10 text-left">
                          <p><br>PEMERIKSAAN PENUNJANG</p>
                        </label>
                      </strong>
                    </h5>
                    <span id="periksa_error" class="text-danger"></span>
                  </div>

                  <div class="row">
                    <div class="col-md-4">
                      <div class="checkbox checkbox-primary">
                        <input id="periksa1" name="periksa" type="checkbox" value="USG">
                        <label class="control-label" for="periksa1">
                          USG
                        </label>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="checkbox checkbox-primary">
                        <input id="periksa2" name="periksa" type="checkbox" value="BNO/BNO IVP">
                        <label class="control-label" for="periksa2">
                          BNO/BNO IVP
                        </label>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="checkbox checkbox-primary">
                        <input id="periksa3" name="periksa" type="checkbox" value="MRI">
                        <label class="control-label" for="periksa3">
                          MRI
                        </label>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="checkbox checkbox-primary">
                        <input id="periksa4" name="periksa" type="checkbox" value="CT Scan">
                        <label class="control-label" for="periksa4">
                          CT Scan
                        </label>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="checkbox checkbox-primary">
                        <input id="periksa5" name="periksa" type="checkbox" value="Rontgen">
                        <label class="control-label" for="periksa5">
                          Rontgen
                        </label>
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="checkbox checkbox-primary">
                        <input id="periksa6" name="periksa" type="checkbox" value="Lainnya">
                        <label class="control-label col-md-3" for="periksa6">
                          Lain-lain
                        </label>
                        <div class="col-md-9 has-success">
                          <input type="text" class="form-control" id="periksa" value="" style="display: none;">
                        </div>
                      </div>
                    </div>
                  </div>
                </div> -->

                <div class="form-group">
                  <div class="col-md-12">
                    <h5 style="margin-top: 30px;">
                      <strong>
                        <label class="control-label mb-10 text-left">
                          <p><br>TINDAKAN YANG TELAH DILAKUKAN</p>
                        </label>
                      </strong>
                    </h5>
                  </div>
                  <div class="col-md-9">
                    <span id="tindakan_error" class="text-danger"></span>
                    <div class="radio-button radio-button-primary">
                      <input id="tindakan1" type="radio" name="tindakan" value="Tidak Ada">
                      <label class="control-label" for="tindakan1">
                        Tidak Ada
                      </label>
                    </div>
                    <div class="radio-button radio-button-primary">
                      <input id="tindakan2" type="radio" name="tindakan" value="Ada">
                      <label class="control-label" for="tindakan2">
                        Ada
                      </label>
                      <div class="col-mb-10 has-success">
                        <input type="text" class="form-control" id="tindakan" value="" style="display: none;">
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
                        <p><br>KONDISI PASIEN SAAT AKAN DIRUJUK</p>
                      </label>
                    </strong>
                  </h5>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label class="control-label">
                      <p><br>Kesadaran : </p>
                    </label>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label class="control-label col-md-5">GCS<span class="help"></span></label>
                      <span id="gcs_error" class="text-danger"></span>
                      <div class="col-md-5 has-success">
                        <input type="text" class="form-control" id="gcs">
                        <span class="help-block"></span>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label class="control-label col-md-5">E : <span class="help"></span></label>
                      <span id="e_error" class="text-danger"></span>
                      <div class="col-md-5 has-success">
                        <input type="text" class="form-control" id="kes_e">
                        <span class="help-block"></span>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label class="control-label col-md-6">M : <span class="help"></span></label>
                      <span id="m_error" class="text-danger"></span>
                      <div class="col-md-5 has-success">
                        <input type="text" class="form-control" id="kes_m">
                        <span class="help-block"></span>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label class="control-label col-md-5">V : <span class="help"></span></label>
                      <span id="v_error" class="text-danger"></span>
                      <div class="col-md-5 has-success">
                        <input type="text" class="form-control" id="kes_v">
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
                  <div class="col-md-2">
                    <div class="form-group">
                      <label class="control-label col-md-5">TD(mmHg)<span class="help"></span></label>
                      <span id="td_error" class="text-danger"></span>
                      <div class="col-md-5 has-success">
                        <input type="text" class="form-control" id="td">
                        <span class="help-block"></span>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-2">
                    <div class="form-group">
                      <label class="control-label col-md-6">Nadi(x/i)<span class="help"></span></label>
                      <span id="nadi_error" class="text-danger"></span>
                      <div class="col-md-5 has-success">
                        <input type="text" class="form-control" id="nadi">
                        <span class="help-block"></span>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label class="control-label col-md-6">T(c)<span class="help"></span></label>
                      <span id="suhu_error" class="text-danger"></span>
                      <div class="col-md-5 has-success">
                        <input type="text" class="form-control" id="suhu">
                        <span class="help-block"></span>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label class="control-label col-md-5">RR(x/mnt)<span class="help"></span></label>
                      <span id="rr_error" class="text-danger"></span>
                      <div class="col-md-5 has-success">
                        <input type="text" class="form-control" id="rr">
                        <span class="help-block"></span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-12">
                  <label class="control-label">
                    <p><br>Pasien Memakai Peralatan Medis: </p>
                  </label>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <span id="alat_error" class="text-danger"></span>
                    <div class="checkbox checkbox-primary">
                      <input id="alat1" type="checkbox" name="alat" value="Infus">
                      <label class="control-label col-md-2" for="alat1">
                        Infus
                      </label>
                    </div>

                  </div>

                  <div class="col-md-4">
                    <div class="checkbox">
                      <input id="alat2" type="checkbox" name="alat" value="Chateter">
                      <label class="control-label" for="alat2">
                        Chateter
                      </label>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="checkbox checkbox-primary">
                      <input id="alat3" type="checkbox" name="alat" value="Bidai">
                      <label class="control-label" for="alat3">
                        Bidai
                      </label>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="checkbox checkbox-primary">
                      <input id="alat4" type="checkbox" name="alat" value="Oksigen">
                      <label class="control-label" for="alat4">
                        Oksigen
                      </label>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="checkbox checkbox-primary">
                      <input id="alat5" type="checkbox" name="alat" value="Monitor">
                      <label class="control-label" for="alat5">
                        Monitor
                      </label>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="checkbox checkbox-primary">
                      <input id="alat6" type="checkbox" name="alat" value="ETT">
                      <label class="control-label" for="alat6">
                        ETT
                      </label>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="checkbox checkbox-primary">
                      <input id="alat7" type="checkbox" name="alat" value="Lainnya">
                      <label class="control-label col-md-3" for="alat7">
                        Lain-lainnya:
                      </label>
                      <div class="col-md-6 has-success">
                        <input type="text" class="form-control" value="" id="alat" style="display: none;">
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
                        <p><br>PERAWATAN LANJUT YANG DIBUTUHKAN :</p>
                      </label>
                    </strong>
                  </h5>
                </div>
                <span id="perawatan_error" class="text-danger"></span>
                <div class="col-md-8 has-success">
                  <textarea class="form-control" name="" id="perawatan_lanjut" cols="30" rows="3"></textarea>
                  <span class="help-block"></span>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <h5 style="margin-top: 30px;">
                      <strong>
                        <label class="control-label col-md-12">
                          <p><br>KEJADIAN KLINIS SAAT DILAKUKAN TRANSFER :</p><span class="help"></span>
                        </label>
                      </strong>
                    </h5>
                    <div class="col-md-9">
                      <span id="kejadian_error" class="text-danger"></span>
                      <div class="checkbox checkbox-primary">
                        <input id="kej1" type="checkbox" name="kejadian" value="Tidak Ada">
                        <label class="control-label" for="kej1">
                          Tidak Ada
                        </label>
                      </div>
                      <div class="checkbox checkbox-primary">
                        <input id="kej2" type="checkbox" name="kejadian" value="Ada">
                        <label class="control-label col-md-2" for="kej2">
                          Ada
                        </label>
                        <div class="col-md-9 has-success">
                          <input type="text" class="form-control" value="" id="kejadian" style="display: none;">
                          <span class="help-block"></span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <br>
              <div class="form-group">
                <div class="col-md-12">
                  <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                </div>
                <!--modal 1-->
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
              </div>
              <div class="form-group text-center" style="margin-top: 30px;">
                <div class="col-md-12">
                  <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                </div>
                <div class="col-md-6">
                  <a class="btn btn-default btn-anim  btn-sm" onclick="javascript:history.go(-1)" style="margin-right: 20px; margin-left: 30px;"><i class="fa fa-arrow-left"></i><span class="btn-text">KEMBALI</span></a>
                  <button type="submit" onclick="simpan()" class="btn btn-success mb-4">Simpan</button>
                </div>
              </div>
            </div>
          </div>
          <!--batas-->

        </div>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view('assets/signature2') ?>
<style>
  canvas {
    cursor: crosshair;
    border: 1px solid #000000;
  }
</style>
<script>
  $(document).ready(function() {
    id_pelayanan = $('#inPel').val();
    reload_data_obat(id_pelayanan)

  });
</script>
<script type="text/javascript">
  $(document).ready(function() {
    $("#riwayat_alergi1").click(function() {
      if ($(this).is(":checked")) {
        $("#riwayat_alergi").hide();
      }
    });
    $("#riwayat_alergi2").click(function() {
      if ($(this).is(":checked")) {
        $("#riwayat_alergi").show();
      }
    });
    $("#riwayat_penyakit1").click(function() {
      if ($(this).is(":checked")) {
        $("#riwayat_penyakit").hide();
      }
    });
    $("#riwayat_penyakit2").click(function() {
      if ($(this).is(":checked")) {
        $("#riwayat_penyakit").show();
      }
    });
    $("#alat7").click(function() {
      if ($(this).is(":checked")) {
        $("#alat").show();
      } else {
        $("#alat").hide();
      }
    });
    $("#non_klinik4").click(function() {
      if ($(this).is(":checked")) {
        $("#non_klinik").show();
      } else {
        $("#non_klinik").hide();
      }
    });
  });
</script>
<script type="text/javascript">
  function simpan() {
    id_pelayanan = $('#inPel').val();
    id_history = $('#inHis').val();
    no_rm = $('#inNoRM').val();

    rs_tujuan = $('#rs_tujuan').val();
    staff = $('#staff').val();
    tgl = $('#tgl').val();
    jam_brgkt = $('#jam_brgkt').val();
    staf_terima = $('#staf_terima').val();
    jam_tiba = $('#jam_tiba').val();
    klinikal = $('#klinikal').val();
    var non_klinik = [];
    $('input[name="non_klinik"]').each(function() {
      if ($(this).is(":checked")) {
        non_klinik.push($(this).val());
      }
    });
    non_klinik = $('#non_klinik4').is(":checked") ? non_klinik.toString() + ', ' + $('#non_klinik').val() : non_klinik.toString();

    diagnosis = $('#diagnosis').val();
    dok_rujuk = $('#dok_rujuk').val();
    riwayat_penyakit = $('input[name="riwayat_penyakit"]:checked').val();
    if (riwayat_penyakit == "Ada") {
      riwayat_penyakit = $('#riwayat_penyakit').val();
    }
    riwayat_alergi = $('input[name="riwayat_alergi"]:checked').val();
    if (riwayat_alergi == "Ada") {
      riwayat_alergi = $('#riwayat_alergi').val();
    }
    inTakeOral = $('#inTakeOral').val();

    // var periksa = [];
    // $('input[name="periksa"]').each(function() {
    //   if ($(this).is(":checked")) {
    //     periksa.push($(this).val());
    //   }
    // });
    // periksa = $('#periksa6').is(":checked") ? periksa.toString() + ', ' + $('#periksa').val() : periksa.toString();

    tindakan = $('input[name="tindakan"]:checked').val();
    if (tindakan == "Lainnya") {
      tindakan = $('#tindakan').val();
    }
    gcs = $('#gcs').val();
    kes_e = $('#kes_e').val();
    kes_m = $('#kes_m').val();
    kes_v = $('#kes_v').val();
    td = $('#td').val();
    suhu = $('#suhu').val();
    nadi = $('#nadi').val();
    rr = $('#rr').val();

    var alat = [];
    $('input[name="alat"]').each(function() {
      if ($(this).is(":checked")) {
        alat.push($(this).val());
      }
    });
    alat = $('#alat7').is(":checked") ? alat.toString() + ', ' + $('#alat').val() : alat.toString();
    kejadian = $('input[name="kejadian"]:checked').val();
    if (kejadian == "Ada") {
      kejadian = $('#kejadian').val();
    }
    perawatan_lanjut = $('#perawatan_lanjut').val();

    if ($('#can').css("display") == "none") {
        ttd = "";
      } else {
        canvas = document.getElementById('can');
        ttd = canvas.toDataURL("image/png");
      }


    dataString = 'no_rm=' + no_rm + '&id_pelayanan=' + id_pelayanan + '&id_history=' + id_history +
      '&rs_tujuan=' + rs_tujuan + '&staff=' + staff + '&jam_brgkt=' + jam_brgkt + '&staf_terima=' + staf_terima +
      '&tgl=' + tgl + '&jam_tiba=' + jam_tiba + '&klinikal=' + klinikal + '&non_klinik=' + non_klinik +
      '&diagnosis=' + diagnosis + '&dok_rujuk=' + dok_rujuk +
      '&riwayat_penyakit=' + riwayat_penyakit + '&riwayat_alergi=' + riwayat_alergi + '&inTakeOral=' + inTakeOral +
      '&tindakan=' + tindakan + '&gcs=' + gcs +
      '&kes_e=' + kes_e + '&kes_m=' + kes_m + '&kes_v=' + kes_v +
      '&td=' + td + '&suhu=' + suhu + '&nadi=' + nadi + '&rr=' + rr +
      '&alat=' + alat + '&kejadian=' + kejadian + '&perawatan_lanjut=' + perawatan_lanjut +
      '&ttd=' + ttd;


    id_pel = "<?php echo urlencode(base64_encode($id_pelayanan)); ?>";
    id_his = "<?php echo urlencode(base64_encode($id_history)); ?>";

    $.ajax({
      url: "<?php echo base_url() ?>Erm_trans_pas_antar_rs/insert_tf_antar_rs",
      method: "POST",
      dataType: 'json',
      data: dataString,
      success: function(data) {
        if (data.status == "success") {
          window.location.href = "<?php echo base_url('Erm_igd/form/') ?>" + id_pel + '/' + id_his;
        } else if (data.error) {
          if (data.rs_tujuan != '') {
            $('#rs_tuj_error').html(data.rs_tujuan);
          } else {
            $('#rs_tuj_error').html('');
          }
          if (data.staff != '') {
            $('#staff_error').html(data.staff);
          } else {
            $('#staff_error').html('');
          }
          if (data.jam_brgkt != '') {
            $('#jam_brgkt_error').html(data.jam_brgkt);
          } else {
            $('#jam_brgkt_error').html('');
          }
          if (data.staf_terima != '') {
            $('#staff_terima_error').html(data.staf_terima);
          } else {
            $('#staff_terima_error').html('');
          }
          if (data.tgl != '') {
            $('#tgl_error').html(data.tgl);
          } else {
            $('#tgl_error').html('');
          }
          if (data.jam_tiba != '') {
            $('#jam_tiba_error').html(data.jam_tiba);
          } else {
            $('#jam_tiba_error').html('');
          }
          if (data.klinikal != '') {
            $('#klinikal_error').html(data.klinikal);
          } else {
            $('#klinikal_error').html('');
          }
          if (data.non_klinik != '') {
            $('#non_klinik_error').html(data.non_klinik);
          } else {
            $('#non_klinik_error').html('');
          }
          if (data.diagnosis != '') {
            $('#diagnosis_error').html(data.diagnosis);
          } else {
            $('#diagnosis_error').html('');
          }
          if (data.dok_rujuk != '') {
            $('#dok_rujuk_error').html(data.dok_rujuk);
          } else {
            $('#dok_rujuk_error').html('');
          }
          if (riwayat_penyakit == '' || riwayat_penyakit == null) {
            $('#riwayat_penyakit_error').html('*wajib diisi');
          } else {
            $('#riwayat_penyakit_error').html('');
          }
          if (riwayat_alergi == '' || riwayat_alergi == null) {
            $('#riwayat_alergi_error').html('*wajib diisi');
          } else {
            $('#riwayat_alergi_error').html('');
          }
          if (data.inTakeOral != '') {
            $('#oral_error').html(data.inTakeOral);
          } else {
            $('#oral_error').html('');
          }

          if (periksa == '' || periksa == null) {
            $('#periksa_error').html('*wajib diisi');
          } else {
            $('#periksa_error').html('');
          }
          if (tindakan == '' || tindakan == null) {
            $('#tindakan_error').html('*wajib diisi');
          } else {
            $('#tindakan_error').html('');
          }
          if (data.gcs != '') {
            $('#gcs_error').html(data.gcs);
          } else {
            $('#gcs_error').html('');
          }
          if (data.kes_e != '') {
            $('#e_error').html(data.kes_e);
          } else {
            $('#e_error').html('');
          }

          if (data.kes_m != '') {
            $('#m_error').html(data.kes_m);
          } else {
            $('#m_error').html('');
          }

          if (data.kes_v != '') {
            $('#v_error').html(data.kes_v);
          } else {
            $('#v_error').html('');
          }
          if (data.td != '') {
            $('#td_error').html(data.td);
          } else {
            $('#td_error').html('');
          }

          if (data.suhu != '') {
            $('#suhu_error').html(data.suhu);
          } else {
            $('#suhu_error').html('');
          }
          if (data.nadi != '') {
            $('#nadi_error').html(data.nadi);
          } else {
            $('#nadi_error').html('');
          }
          if (data.rr != '') {
            $('#rr_error').html(data.rr);
          } else {
            $('#rr_error').html('');
          }
          if (alat == '' || alat == null) {
            $('#alat_error').html('*wajib diisi');
          } else {
            $('#alat_error').html('');
          }
          if (kejadian == '' || kejadian == null) {
            $('#kejadian_error').html('*wajib diisi');
          } else {
            $('#kejadian_error').html('');
          }
          if (data.perawatan_lanjut != '') {
            $('#perawatan_error').html(data.perawatan_lanjut);
          } else {
            $('#perawatan_error').html('');
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

  function reload_data_obat(id_pelayanan) { //utk reload data diagnosa pasien jika berhasil
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
</script>