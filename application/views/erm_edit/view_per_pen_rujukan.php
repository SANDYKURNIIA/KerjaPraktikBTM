<div class="row">
  <div class="col-sm-12">
    <div class="panel panel-default card-view">
      <div class="panel-heading">
        <div class="pull-left">
          <h6 class="panel-title txt-dark">PERSETUJUAN/PENOLAKAN* RUJUKAN</h6>
        </div>
        <div class="clearfix"></div>
      </div>
      <div class="panel-wrapper collapse in" id="myDiv">
        <div class="panel-body">
          <div class="form-wrap">

            <div class="form-group">
              <div class="col-md-12">
                <label class="control-label mb-10 text-left">PEMBERIAN INFORMASI<span class="help"></span></label>
              </div>
              <input type="hidden" class="form-control" value="<?= $id_pelayanan ?>" id="inPel">
              <input type="hidden" class="form-control" value="<?= $id_history ?>" id="inHis">
              <input type="hidden" class="form-control" value="<?= $no_rm ?>" id="inNoRM">
              <input type="hidden" class="form-control" value="" id="id">
              <div class="form-group">
                <div class="col-md-6">
                  <label class="control-label mb-10 text-left">Pemberi informasi<span class="help"></span></label>
                  <span id="peminfo_error" class="text-danger"></span>
                  <div class="has-success">
                    <input type="text" class="form-control" id="pemberi_info">
                    <span class="help-block"></span>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-6">
                  <label class="control-label mb-10 text-left">Penerima Informasi / pemberi persetujuan **<span class="help"></span></label>
                  <span id="peninfo_error" class="text-danger"></span>
                  <div class="has-success">
                    <input type="text" class="form-control" id="penerima_info">
                    <span class="help-block"></span>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-8">
                  <label class="control-label mb-10 text-left">Diagnosis dan terapi dan/atau tindakan medis yang diperlukan<span class="help"></span></label>
                  <span id="diagnosis_error" class="text-danger"></span>
                  <div class="has-success">
                    <input type="text" class="form-control" id="diagnosis">
                    <span class="help-block"></span>
                  </div>
                </div>
                <div class="col-md-4">
                  <span id="tddiagnosis_error" class="text-danger"></span>
                  <div class="checkbox checkbox-success">
                    <input id="checkbox1" type="checkbox" name="diagnosis">
                    <label class="control-label mb-10 text-left" for="checkbox1">Tanda</label>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-8">
                  <label class="control-label mb-10 text-left">Alasan dan tujuan dilakukan rujukan<span class="help"></span></label>
                  <span id="alasan_error" class="text-danger"></span>
                  <div class="has-success">
                    <input type="text" class="form-control" id="alasan">
                    <span class="help-block"></span>
                  </div>
                </div>
                <div class="col-md-4">
                  <span id="tdalasan_error" class="text-danger"></span>
                  <div class="checkbox checkbox-success">
                    <input id="checkbox2" type="checkbox" name="alasan">
                    <label class="control-label mb-10 text-left" for="checkbox2">Tanda</label>
                  </div>
                </div>



                <div class="form-group">
                  <div class="col-md-8">
                    <label class="control-label mb-10 text-left">Risiko yang dapat timbul apabila rujukan tidak dilakukan<span class="help"></span></label>
                    <span id="risiko_error" class="text-danger"></span>
                    <div class="has-success">
                      <input type="text" class="form-control" id="risiko">
                      <span class="help-block"></span>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <span id="tdrisiko_error" class="text-danger"></span>
                    <div class="checkbox checkbox-success">
                      <input id="checkbox3" type="checkbox" name="risiko">
                      <label class="control-label mb-10 text-left" for="checkbox3">Tanda</label>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-8">
                    <label class="control-label mb-10 text-left">Transportasi rujukan<span class="help"></span></label>
                    <span id="transport_error" class="text-danger"></span>
                    <div class="has-success">
                      <input type="text" class="form-control" id="transport">
                      <span class="help-block"></span>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <span id="tdtransport_error" class="text-danger"></span>
                    <div class="checkbox checkbox-success">
                      <input id="checkbox4" type="checkbox" name="transport">
                      <label class="control-label mb-10 text-left" for="checkbox4">Tanda</label>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-8">
                    <label class="control-label mb-10 text-left">Risiko atau penyulit yang dapat timbul selama dalam perjalanan<span class="help"></span></label>
                    <span id="hambatan_error" class="text-danger"></span>
                    <div class="has-success">
                      <input type="text" class="form-control" id="hambatan">
                      <span class="help-block"></span>
                    </div>
                    <span class="help-block"></span>
                  </div>
                  <div class="col-md-4">

                    <span id="tdhambatan_error" class="text-danger"></span>
                    <div class="checkbox checkbox-success">
                      <input id="checkbox5" type="checkbox" name="hambatan">
                      <label class="control-label mb-10 text-left" for="checkbox5">Tanda</label>

                      <span class="help-block"></span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-8">
                    <label class="control-label mb-10 text-left">Dengan ini menyatakan bahwa saya telah menerangkan hal-hal di atas secara benar dan jelas dan memberikan kesempatan untuk bertanya dan/atau berdiskusi<span class="help"></span></label>

                  </div>
                  <div class="col-md-4">
                    <span id="ttdpem_error" class="text-danger"></span>
                    <div class="checkbox checkbox-success">
                      <input id="checkbox6" type="checkbox" name="ttd_pemberi_info" value="OK">
                      <label class="control-label mb-10 text-left" for="checkbox6">Tanda</label>
                      <span class="help-block"></span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-8">
                    <label class="control-label mb-10 text-left">Dengan ini menyatakan bahwa saya telah menerima informasi sebagaimana di atas yang saya beri tanda/paraf di kolom kanannya, dan telah memahaminya<span class="help"></span></label>

                  </div>
                  <div class="col-md-4">
                    <span id="ttdpen_error" class="text-danger"></span>
                    <div class="checkbox checkbox-success">
                      <input id="checkbox7" type="checkbox" name="ttd_penerima_info" value="OK">
                      <label class="control-label mb-10 text-left" for="checkbox7">Tanda</label>

                      <span class="help-block"></span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-12">
                    <label class="control-label mb-10 text-danger">Bila pasien tidak kompeten atau tidak mau menerima informasi, maka penerima informasi adalah wali atau keluarga terdekat<span class="help"></span></label>
                  </div>
                </div>

                <div class="clearfix"></div>
                <hr>
                <div class="form-group">

                  <h5 style="margin-top: 30px;text-align: center;"><strong>
                      <label class="control-label mb-10 text-left">
                        PERSETUJUAN/PENOLAKAN RUJUKAN*
                        <span class="help"></span>
                      </label></strong>
                  </h5>
                  <div class="form-group">
                    <div class="col-md-4">
                      <label class="control-label mb-10 text-left">Nama <span class="help"></span></label>
                      <span id="nama_error" class="text-danger"></span>
                      <div class="has-success">
                        <input type="text" class="form-control" id="nama">
                        <span class="help-block"></span>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <label class="control-label mb-10 text-left">Umur <span class="help"></span></label>
                      <span id="umur_error" class="text-danger"></span>
                      <div class="has-success">
                        <input type="number" class="form-control" id="umur" placeholder="Tahun">
                        <span class="help-block"></span>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <label class="control-label mb-10 text-left">Alamat <span class="help"></span></label>
                      <span id="alamat_error" class="text-danger"></span>
                      <div class="has-success">
                        <input type="text" class="form-control" id="alamat">
                        <span class="help-block"></span>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">

                    <div class="col-md-4">
                      <label class="control-label mb-10 text-left">Jenis Kelamin</label>
                      <span id="jk_error" class="text-danger"></span>
                      <div class="radio-button radio-button-primary">
                        <input id="jk1" type="radio" name="jk" value="Laki-Laki">
                        <label class="control-label" for="jk1">Laki-Laki
                        </label>
                      </div>
                      <div class="radio-button radio-button-primary">
                        <input id="jk2" type="radio" name="jk" value="Perempuan">
                        <label class="control-label" for="jk2">Perempuan
                        </label>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <label class="control-label mb-10 text-left">Hubungan dengan pasien</label>
                      <span id="ghubungan_error" class="text-danger"></span>
                      <div class="radio-button radio-button-primary">
                        <input id="kondisi_umum1" type="radio" name="ghubungan" value="Saya sendiri">
                        <label class="control-label" for="kondisi_umum1">
                          Saya sendiri
                        </label>
                      </div>
                      <div class="radio-button radio-button-primary">
                        <input id="kondisi_umum2" type="radio" name="ghubungan" value="Anak kandung saya">
                        <label class="control-label" for="kondisi_umum2">
                          Anak kandung
                        </label>
                      </div>
                      <div class="radio-button radio-button-primary">
                        <input id="kondisi_umum3" type="radio" name="ghubungan" value="Suami/istri saya">
                        <label class="control-label" for="kondisi_umum3">
                          Suami/istri
                        </label>
                      </div>

                      <div class="radio-button radio-button-primary">
                        <input id="kondisi_umum4" type="radio" name="ghubungan" value="Orang tua kandung saya">
                        <label class="control-label" for="kondisi_umum4">
                          Orang tua kandung
                        </label>
                      </div>

                      <div class="radio-button radio-button-primary">
                        <input id="kondisi_umum6" type="radio" name="ghubungan" value="Lainnya">
                        <label class="control-label" for="kondisi_umum6">
                          Lainnya:
                        </label>
                      </div>
                      <div class="col-md-8 has-success">
                        <input type="text" class="form-control" id="ghubungan" style="display: none;">
                        <span class="help-block"></span>
                      </div>
                    </div>
                  </div>


                  <div class="form-group ">
                    <div class="form-group">
                      <div class="col-md-12">
                        <label class="control-label mb-10 text-left">dengan ini menyatakan persetujuan/penolakan untuk dilakukannya rujukan terhadap <span class="help"></span></label>
                      </div>

                      <div class="form-group">
                        <div class="col-md-6">
                          <label class="control-label mb-10 text-left">Nama <span class="help"></span></label>
                          <input type="text" disabled class="form-control" value="<?= $nama ?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="col-md-6">
                          <label class="control-label mb-10 text-left">Umur <span class="help"></span></label>
                          <input type="text" disabled class="form-control" value="<?php
                                                                                  $tanggal = new DateTime($tgl_lahir);
                                                                                  $today = new DateTime();
                                                                                  $y = $today->diff($tanggal)->y;
                                                                                  echo  $y . " tahun ";  ?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="col-md-6">
                          <label class="control-label mb-10 text-left">Alamat <span class="help"></span></label>
                          <input type="text" disabled class="form-control" value="<?= $alamat ?>">
                        </div>
                      </div>

                      <div class="form-group ">
                        <div class="col-md-6">
                          <label class="control-label mb-10 text-left">Jenis Kelamin</label>
                          <input type="text" disabled class="form-control" value="<?= $jenis_kelamin ?>">

                        </div>
                      </div>

                    </div>
                  </div>
                </div>

              </div>
              <div class="col-md-12">
                <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
              </div>
              <div class="col-md-4">
                <label class="control-label">Yang menyatakan *</label>
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
                                  <button class="btn btn-default" id="sig-clearBtn3">Clear Signature</button>
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
              <div class="col-md-4">
                <label class="control-label">Saksi 1</label>
                <br />
                <div class="row">
                  <button data-toggle="modal" data-target="#modal_ttd1" aria-expanded="false" aria-controls="poli_sore" class="btn btn-primary btn-anim btn-sm"><i class="icon-rocket"></i><span class="btn-text">TANDA TANGAN</span></button>
                  <button class="btn btn-default" id="sig-clearBtn1">Clear Signature</button>
                  <canvas id="can1" width="300" height="300" style="display: none;"></canvas>
                  <div class="form-group">
                    <div class="modal fade" id="modal_ttd1" role="dialog" aria-labelledby="newPeternakModallabel" aria-hidden="true">
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
                                  <canvas id="ttd1" width="300" height="300">
                                  </canvas>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-12">
                                  <button class="btn btn-primary" id="sig-submitBtn1">Submit Signature</button>
                                  <button class="btn btn-default" id="sig-clearBtn4">Clear Signature</button>
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
              <div class="col-md-4">
                <label class="control-label">Saksi 2</label>
                <br />
                <div class="row">
                  <button data-toggle="modal" data-target="#modal_ttd2" aria-expanded="false" aria-controls="poli_sore" class="btn btn-primary btn-anim btn-sm"><i class="icon-rocket"></i><span class="btn-text">TANDA TANGAN</span></button>
                  <button class="btn btn-default" id="sig-clearBtn2">Clear Signature</button>
                  <canvas id="can2" width="300" height="300" style="display: none;"></canvas>
                  <div class="form-group">
                    <div class="modal fade" id="modal_ttd2" role="dialog" aria-labelledby="newPeternakModallabel" aria-hidden="true">
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
                                  <canvas id="ttd2" width="300" height="300">
                                  </canvas>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-12">
                                  <button class="btn btn-primary" id="sig-submitBtn2">Submit Signature</button>
                                  <button class="btn btn-default" id="sig-clearBtn5">Clear Signature</button>
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
                  <button id="simpan" type="submit" class="btn btn-success mb-4" onclick="simpan()">Simpan</button>
                  <button style="display: none;" id="edit" type="submit" class="btn btn-warning mb-4" onclick="edit()">Edit</button>
                  <button style="display: none;" id="cetak" type="submit" class="btn btn-primary mb-4" onclick="cetak()">Cetak</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
    <div class="panel panel-default card-view">
      <div class="panel-heading">
        <div class="pull-left">
          <h6 class="panel-title txt-dark">DAFTAR PERSETUJUAN/PENOLAKAN* RUJUKAN</h6>
        </div>
        <div class="clearfix"></div>
      </div>
      <div class="panel-wrapper collapse in">
        <div class="panel-body">
          <div class="form-group">
            <div class="col-md-12">
              <div class="table-wrap">
                <div class="table-responsive">
                  <table class="table table-hover display  pb-60" id="tabel_terapi">
                    <thead>
                      <tr class="bg-success">
                        <th>NO</th>
                        <th>PILIH</th>
                        <th>TANGGAL MASUK</th>
                        <th>TANGGAL PENGAJUAN</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr class="bg-success">
                        <th>NO</th>
                        <th>PILIH</th>
                        <th>TANGGAL MASUK</th>
                        <th>TANGGAL PENGAJUAN</th>
                      </tr>
                    </tfoot>
                    <tbody style="color: black">

                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
<?php $this->load->view('assets/signature1') ?>
<style>
  canvas {
    cursor: crosshair;
    border: 1px solid #000000;
  }
</style>
<script type="text/javascript">
  $(document).ready(function(e) {
    id_pelayanan = $('#inPel').val();
    reload_data_id_pel(id_pelayanan);
  });
</script>
<script type="text/javascript">
  $(function() {
    $("#kondisi_umum6").click(function() {
      if ($(this).is(":checked")) {
        $("#ghubungan").show();
      } else {
        $("#ghubungan").hide();
      }
    });
    $("#kondisi_umum1").click(function() {
      if ($(this).is(":checked")) {
        $("#ghubungan").hide();
      }
    });
    $("#kondisi_umum2").click(function() {
      if ($(this).is(":checked")) {
        $("#ghubungan").hide();
      }
    });
    $("#kondisi_umum3").click(function() {
      if ($(this).is(":checked")) {
        $("#ghubungan").hide();
      }
    });
    $("#kondisi_umum4").click(function() {
      if ($(this).is(":checked")) {
        $("#ghubungan").hide();
      }
    });
  });

  function simpan() {
    id_pelayanan = $('#inPel').val();
    id_history = $('#inHis').val();
    no_rm = $('#inNoRM').val();

    pemberi_info = $('#pemberi_info').val();
    penerima_info = $('#penerima_info').val();
    diagnosis = $('#diagnosis').val();
    td_diagnosis = $('input[name="diagnosis"]:checked').val() ? 'OK' : 'NO';
    alasan = $('#alasan').val();
    td_alasan = $('input[name="alasan"]:checked').val() ? 'OK' : 'NO';
    risiko = $('#risiko').val();
    td_risiko = $('input[name="risiko"]:checked').val() ? 'OK' : 'NO';
    transport = $('#transport').val();
    td_transport = $('input[name="transport"]:checked').val() ? 'OK' : 'NO';
    hambatan = $('#hambatan').val();
    td_hambatan = $('input[name="hambatan"]:checked').val() ? 'OK' : 'NO';
    ttd_pemberi_info = $('input[name="ttd_pemberi_info"]:checked').val() ? 'OK' : 'NO';
    ttd_penerima_info = $('input[name="ttd_penerima_info"]:checked').val() ? 'OK' : 'NO';
    nama = $('#nama').val();
    umur = $('#umur').val();
    alamat = $('#alamat').val();
    jk = $('input[name="jk"]:checked').val();
    ghubungan = $('input[name="ghubungan"]:checked').val();
    if (ghubungan == "Lainnya") {
      ghubungan = $('#ghubungan').val() + ' saya';
    }

    canvas = document.getElementById('can');
    ttd = canvas.toDataURL("image/png");
    canvas1 = document.getElementById('can1');
    ttd1 = canvas1.toDataURL("image/png");
    canvas2 = document.getElementById('can2');
    ttd2 = canvas2.toDataURL("image/png");

    dataString = 'no_rm=' + no_rm + '&id_pelayanan=' + id_pelayanan + '&id_history=' + id_history +
      '&pemberi_info=' + pemberi_info + '&penerima_info=' + penerima_info +
      '&diagnosis=' + diagnosis + '&td_diagnosis=' + td_diagnosis + '&alasan=' + alasan +
      '&td_alasan=' + td_alasan + '&risiko=' + risiko + '&td_risiko=' + td_risiko +
      '&transport=' + transport + '&td_transport=' + td_transport + '&hambatan=' + hambatan +
      '&td_hambatan=' + td_hambatan + '&ttd_pemberi_info=' + ttd_pemberi_info +
      '&ttd_penerima_info=' + ttd_penerima_info + '&nama=' + nama + '&umur=' + umur +
      '&alamat=' + alamat + '&jk=' + jk +
      '&ttd=' + ttd + '&ttd1=' + ttd1 + '&ttd2=' + ttd2 + '&ghubungan=' + ghubungan;


    id_pel = "<?php echo urlencode(base64_encode($id_pelayanan)); ?>";
    id_his = "<?php echo urlencode(base64_encode($id_history)); ?>";

    $.ajax({
      url: "<?php echo base_url() ?>Erm_per_pen_rujukan/insert_per_pen_rujukan",
      method: "POST",
      dataType: 'json',
      data: dataString,
      success: function(data) {
        if (data.status == "success") {
          window.location.href = "<?php echo base_url('Erm_igd/form/') ?>" + id_pel + '/' + id_his;
        } else if (data.error) {
          if (data.pemberi_info != '') {
            $('#peminfo_error').html(data.pemberi_info);
          } else {
            $('#peminfo_error').html('');
          }
          if (data.penerima_info != '') {
            $('#peninfo_error').html(data.penerima_info);
          } else {
            $('#peninfo_error').html('');
          }

          if (data.diagnosis != '') {
            $('#diagnosis_error').html(data.diagnosis);
          } else {
            $('#diagnosis_error').html('');
          }
          if (data.td_diagnosis != '') {
            $('#tddiagnosis_error').html(data.td_diagnosis);
          } else {
            $('#tddiagnosis_error ').html('');
          }
          if (data.alasan != '') {
            $('#alasan_error').html(data.alasan);
          } else {
            $('#alasan_error').html('');
          }
          if (data.td_alasan != '') {
            $('#tdalasan_error').html(data.td_alasan);
          } else {
            $('#tdalasan_error').html('');
          }
          if (data.risiko != '') {
            $('#risiko_error').html(data.risiko);
          } else {
            $('#risiko_error').html('');
          }
          if (data.td_risiko != '') {
            $('#tdrisiko_error').html(data.td_risiko);
          } else {
            $('#tdrisiko_error').html('');
          }
          if (data.transport != '') {
            $('#transport_error').html(data.transport);
          } else {
            $('#transport_error').html('');
          }
          if (data.td_transport != '') {
            $('#tdtransport_error').html(data.td_transport);
          } else {
            $('#tdtransport_error').html('');
          }
          if (data.hambatan != '') {
            $('#hambatan_error').html(data.hambatan);
          } else {
            $('#hambatan_error').html('');
          }
          if (data.td_hambatan != '') {
            $('#tdhambatan_error').html(data.td_hambatan);
          } else {
            $('#tdhambatan_error').html('');
          }
          if (data.ttd_pemberi_info != '') {
            $('#ttdpem_error').html(data.ttd_pemberi_info);
          } else {
            $('#ttdpem_error').html('');
          }
          if (data.ttd_penerima_info != '') {
            $('#ttdpen_error').html(data.ttd_penerima_info);
          } else {
            $('#ttdpen_error').html('');
          }
          if (data.nama != '') {
            $('#nama_error').html(data.nama);
          } else {
            $('#nama_error').html('');
          }
          if (data.umur != '') {
            $('#umur_error').html(data.umur);
          } else {
            $('#umur_error').html('');
          }
          if (data.alamat != '') {
            $('#alamat_error').html(data.alamat);
          } else {
            $('#alamat_error').html('');
          }
          if (jk == '' | jk == null) {
            $('#jk_error').html('*wajib diisi');
          } else {
            $('#jk_error').html('');
          }
          if (ghubungan == '' | ghubungan == null) {
            $('#ghubungan_error').html('*wajib diisi');
          } else {
            $('#ghubungan_error').html('');
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

  function reload_data_id_pel(id_pelayanan) { //utk reload data diagnosa pasien jika berhasil
    $('#tabel_terapi').dataTable().fnClearTable();
    $('#tabel_terapi').dataTable().fnDestroy();
    $('#tabel_terapi').DataTable({
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
        "url": '<?php echo base_url('Erm_per_pen_rujukan/tampil_list_per_pen_rujukan'); ?>',
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

  function pilih(id) {
    $('#id').val(id);
    $.ajax({
      url: "<?php echo base_url() ?>Erm_per_pen_rujukan/getPerPenRujukan",
      method: "POST",
      dataType: 'json',
      data: {
        id: id
      },
      success: function(data) {
        if (data.status_dt == "found") {
          $('#pemberi_info').val(data.pemberi_info);
          $('#penerima_info').val(data.penerima_info);
          $('#diagnosis').val(data.diagnosis);
          if (data.td_diagnosis == "OK") {
            $('input[name="diagnosis"]').prop("checked", true);
          }
          $('#alasan').val(data.alasan);
          if (data.td_alasan == "OK") {
            $('input[name="alasan"]').prop("checked", true);
          }
          $('#risiko').val(data.risiko);
          if (data.td_risiko == "OK") {
            $('input[name="risiko"]').prop("checked", true);
          }
          $('#transport').val(data.transport);
          if (data.td_transport == "OK") {
            $('input[name="transport"]').prop("checked", true);
          }
          $('#hambatan').val(data.hambatan);
          if (data.td_hambatan == "OK") {
            $('input[name="hambatan"]').prop("checked", true);
          }
          if (data.ttd_pemberi_info == "OK") {
            $('input[name="ttd_pemberi_info"]').prop("checked", true);
          }
          if (data.ttd_penerima_info == "OK") {
            $('input[name="ttd_penerima_info"]').prop("checked", true);
          }

          $('#edit').show();
          $('#cetak').show();
          $('#simpan').hide();

          $('#nama').val(data.nama);
          $('#umur').val(data.umur);
          $('#alamat').val(data.alamat);
          if (data.jk == "Laki-Laki") {
            $('#jk1').prop("checked", true);
          } else {
            $('#jk2').prop("checked", true);
          }
          if (data.ghubungan == "Saya sendiri") {
            $('#kondisi_umum1').prop("checked", true);
          } else if (data.ghubungan == "Anak kandung saya") {
            $('#kondisi_umum2').prop("checked", true);
          } else if (data.ghubungan == "Suami/istri saya") {
            $('#kondisi_umum3').prop("checked", true);
          } else if (data.ghubungan == "Orang tua kandung saya") {
            $('#kondisi_umum4').prop("checked", true);
          } else {
            $('#kondisi_umum6').prop("checked", true);
            $("#ghubungan").show();
            $("#ghubungan").val(data.ghubungan);
          }
          canvas = document.getElementById('can');
          canvas1 = document.getElementById('can1');
          canvas2 = document.getElementById('can2');
          ctx = canvas.getContext("2d");
          ctx1 = canvas1.getContext("2d");
          ctx2 = canvas2.getContext("2d");

          var img = new Image();
          var img1 = new Image();
          var img2 = new Image();
          img.onload = function() {
            ctx.drawImage(img, 0, 0, 300, 300);
            steps.length = 0;
            steps[no] = ctx.getImageData(0, 0, canvas.width, canvas.height);
            // 			steps.push(  ctx.getImageData(0,0,canvas.width,canvas.height)); 
          }
          img.src = "<?php echo base_url(); ?>" + data.ttd;
          img1.onload = function() {
            ctx1.drawImage(img1, 0, 0, 300, 300);
            steps.length = 0;
            steps[no] = ctx1.getImageData(0, 0, canvas1.width, canvas1.height);
            // 			steps.push(  ctx.getImageData(0,0,canvas.width,canvas.height)); 
          }
          img1.src = "<?php echo base_url(); ?>" + data.ttd1;
          img2.onload = function() {
            ctx2.drawImage(img2, 0, 0, 300, 300);
            steps.length = 0;
            steps[no] = ctx2.getImageData(0, 0, canvas2.width, canvas2.height);
            // 			steps.push(  ctx.getImageData(0,0,canvas.width,canvas.height)); 
          }
          img2.src = "<?php echo base_url(); ?>" + data.ttd2;
          $('#can').show();
          $('#can1').show();
          $('#can2').show();

          // smooth scroll
          window.scrollTo({
            top: 0,
            behavior: 'smooth'
          });
        } else {
          swal({
            title: "Gagal!",
            type: "warning",
            text: "Data Kosong",
            confirmButtonColor: "#3cb878",
          });
        }
      }

    });
    return false;

  }

  function edit() {
    id = $('#id').val();
    id_pelayanan = $('#inPel').val();
    id_history = $('#inHis').val();
    no_rm = $('#inNoRM').val();

    pemberi_info = $('#pemberi_info').val();
    penerima_info = $('#penerima_info').val();
    diagnosis = $('#diagnosis').val();
    td_diagnosis = $('input[name="diagnosis"]:checked').val() ? 'OK' : 'NO';
    alasan = $('#alasan').val();
    td_alasan = $('input[name="alasan"]:checked').val() ? 'OK' : 'NO';
    risiko = $('#risiko').val();
    td_risiko = $('input[name="risiko"]:checked').val() ? 'OK' : 'NO';
    transport = $('#transport').val();
    td_transport = $('input[name="transport"]:checked').val() ? 'OK' : 'NO';
    hambatan = $('#hambatan').val();
    td_hambatan = $('input[name="hambatan"]:checked').val() ? 'OK' : 'NO';
    ttd_pemberi_info = $('input[name="ttd_pemberi_info"]:checked').val() ? 'OK' : 'NO';
    ttd_penerima_info = $('input[name="ttd_penerima_info"]:checked').val() ? 'OK' : 'NO';
    nama = $('#nama').val();
    umur = $('#umur').val();
    alamat = $('#alamat').val();
    jk = $('input[name="jk"]:checked').val();
    ghubungan = $('input[name="ghubungan"]:checked').val();
    if (ghubungan == "Lainnya") {
      ghubungan = $('#ghubungan').val() + ' saya';
    }


    canvas = document.getElementById('can');
    if (canvas.style.display !== 'none' && canvas.style.visibility !== 'hidden') {
      ttd = canvas.toDataURL("image/png");
    } else {
      ttd = '';
    }
    canvas1 = document.getElementById('can1');
    if (canvas1.style.display !== 'none' && canvas1.style.visibility !== 'hidden') {
      ttd1 = canvas1.toDataURL("image/png");
    } else {
      ttd1 = '';
    }
    canvas2 = document.getElementById('can2');
    if (canvas2.style.display !== 'none' && canvas2.style.visibility !== 'hidden') {
      ttd2 = canvas2.toDataURL("image/png");
    } else {
      ttd2 = '';
    }

    dataString = 'id=' + id + '&no_rm=' + no_rm + '&id_pelayanan=' + id_pelayanan + '&id_history=' + id_history +
      '&pemberi_info=' + pemberi_info + '&penerima_info=' + penerima_info +
      '&diagnosis=' + diagnosis + '&td_diagnosis=' + td_diagnosis + '&alasan=' + alasan +
      '&td_alasan=' + td_alasan + '&risiko=' + risiko + '&td_risiko=' + td_risiko +
      '&transport=' + transport + '&td_transport=' + td_transport + '&hambatan=' + hambatan +
      '&td_hambatan=' + td_hambatan + '&ttd_pemberi_info=' + ttd_pemberi_info +
      '&ttd_penerima_info=' + ttd_penerima_info + '&nama=' + nama + '&umur=' + umur +
      '&alamat=' + alamat + '&jk=' + jk +
      '&ttd=' + ttd + '&ttd1=' + ttd1 + '&ttd2=' + ttd2 + '&ghubungan=' + ghubungan;


    id_pel = "<?php echo urlencode(base64_encode($id_pelayanan)); ?>";
    id_his = "<?php echo urlencode(base64_encode($id_history)); ?>";

    $.ajax({
      url: "<?php echo base_url() ?>Erm_per_pen_rujukan/edit_per_pen_rujukan",
      method: "POST",
      dataType: 'json',
      data: dataString,
      success: function(data) {
        if (data.status == "success") {
          window.location.href = "<?php echo base_url('Erm_igd/form/') ?>" + id_pel + '/' + id_his;
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
    id = $('#id').val();
    window.location.href = "<?php echo base_url('Erm_igd_edit/print_per_pen_rujukan/') ?>" + id;
  }
</script>