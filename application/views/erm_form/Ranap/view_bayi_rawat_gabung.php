<div class="row">
  <div class="col-sm-12">
    <div class="panel panel-default card-view">
      <div class="panel-heading">
        <div class="pull-left">
          <h6 class="panel-title txt-dark">BAYI RAWAT GABUNG</h6>
        </div>
        <div class="clearfix"></div>
      </div>
      <div class="panel-wrapper collapse in" id="myDiv">
        <div class="panel-body">
          <div class="form-wrap">

            <div class="form-group">
              <!-- <form id="formUpload"> -->
                <input type="hidden" class="form-control" value="<?= $id_pelayanan ?>" name="inPel" id="inPel">
                <input type="hidden" class="form-control" value="<?= $id_history ?>" name="inHis" id="inHis">
                <input type="hidden" class="form-control" value="" id="id" name="id">
                <input type="hidden" class="form-control" name="inNoRM" id="inNoRM" value="<?= $no_rm ?>">
                <div class="form-group">
                  <div class="col-md-6">
                    <label class="control-label mb-10 text-left">Nama Pasien<span class="help"></span></label>
                    <div class="has-success">
                      <!-- <input type="text" class="form-control" id="inNama" disabled> -->
                      <input type="text" class="form-control" id="inNama" value="<?= $nama ?>" disabled>
                      <span class="help-block"></span>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-6">
                    <label class="control-label mb-10 text-left">No RM</label><span class="help"></span></label>
                    <div class="has-success">
                      <!-- <input type="text" class="form-control" name="inNoRM" id="inNoRM" disabled> -->
                      <input type="text" class="form-control" name="inNoRM" id="inNoRM" value="<?= $no_rm ?>" disabled>
                      <span class="help-block"></span>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-6">
                    <label class="control-label mb-10 text-left">Umur / Jenis Kelamin<span class="help"></span></label>
                    <div class="has-success">
                      <!-- <input type="text" class="form-control" id="inUmur" disabled>  -->
                        <input type="text" class="form-control" id="inUmur" value="<?php
                                                                                    $tanggal = new DateTime($tgl_lahir);
                                                                                    $today = new DateTime();
                                                                                    $y = $today->diff($tanggal)->y;
                                                                                    echo  $y . " tahun, " . $jenis_kelamin;  ?>" disabled> 
                      <span class="help-block"></span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-6">
                    <label class="control-label mb-10 text-left">Nama Ibu :<span class="help"></span></label>
                    <span id="ibu_error" class="text-danger"></span>
                    <div class="has-success">
                      <input type="text" class="form-control" name="inNamaIbu" id="inNamaIbu">
                      <!-- <input type="text" class="form-control" name="inNoRM" id="inNoRM" value="<?= $no_rm ?>" disabled> -->
                      <span class="help-block"></span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-6">
                    <label class="control-label mb-10 text-left">Waktu Mulai Rawat Gabung<span class="help"></span></label>
                    <span id="rawat_error" class="text-danger"></span>
                    <div class="has-success">
                      <input type="date" class="form-control" id="inTglRwt" name="inTglRawat">
                      <span class="help-block"></span>
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                            <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                        </div>
                <div class="form-group ">
                              <div class="col-md-3">
                                <label class="control-label mb-10 text-left">Jenis Persalinan :</label>
                                <span id="persalinan_error" class="text-danger"></span>
                                <div class="radio-button radio-button-primary">
                                  <input id="persalinan1" type="radio" name="persalinan" value="Pervagina">
                                  <label class="control-label" for="persalinan1">
                                    Pervagina
                                  </label>
                                </div>
                                <div class="radio-button radio-button-primary">
                                  <input id="persalinan2" type="radio" name="persalinan" value="Caesar">
                                  <label class="control-label" for="persalinan2">
                                    Caesar
                                  </label>
                                </div>
                              </div>
                            </div>
                <!-- <div class="form-group">
                  <div class="col-md-6">
                    <label class="control-label mb-10 text-left">Jenis Persalinan<span class="help"></span></label>
                    <span id="diagnosis_error" class="text-danger"></span>
                    <div class="has-success" onchange="pilihPersalinan()">
                      <select class="form-control filled-input select2" id="inPersalinan" name="inPersalinan">
                                                <option value="">Jenis Persalinan</option>
                                                <option value="Pervagina">Pervagina</option>
                                                <option value="Caesaria">Sectio Caesaria</option>    
                      </select>
                    </div>
                  </div>
                </div> -->
                <div class="form-group ">
                              <div class="col-md-3">
                                <label class="control-label mb-10 text-left" id="title1">Pervagina :</label>
                                <span id="pervagina_error" class="text-danger"></span>
                                <div class="radio-button radio-button-primary">
                                  <input id="pervagina1" type="radio" name="pervagina" value="Normal Vacum">
                                  <label class="control-label" id="label1" for="pervagina1">
                                    Normal Vacum
                                  </label>
                                </div>
                                <div class="radio-button radio-button-primary">
                                  <input id="pervagina2" type="radio" name="pervagina" value="Forsep">
                                  <label class="control-label" id="label2" for="pervagina2">
                                    Forsep
                                  </label>
                                </div>
                              </div>
                            </div>
                            <div class="form-group ">
                              <div class="col-md-3">
                                <label class="control-label mb-10 text-left" id="title2">Sectio Caesaria</label>
                                <span id="caesaria_error" class="text-danger"></span>
                                <div class="radio-button radio-button-primary">
                                  <input id="caesaria1" type="radio" name="caesaria" value="Spinal/Epidural">
                                  <label class="control-label" id="label3" for="caesaria1">
                                    Spinal/Epidural
                                  </label>
                                </div>
                                <div class="radio-button radio-button-primary">
                                  <input id="caesaria2" type="radio" name="caesaria" value="Anastesi Umum">
                                  <label class="control-label" id="label4" for="caesaria2">
                                    Anastesi Umum
                                  </label>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-12">
                            <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                        </div>
                <div class="form-group">
                  <div class="col-md-6">
                    <label class="control-label mb-10 text-left">Jika Tidak Dilakukan, Silahkan Beri Alasan :<span class="help"></span></label>
                    <span id="alasan_error" class="text-danger"></span>
                    <div class="has-success">
                      <textarea class="form-control" cols="10" rows="10" id="inAlasan" name="inAlasan"></textarea>
                      <span class="help-block text-danger"></span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-6">
                    <label class="control-label mb-10 text-left">Catatan<span class="help"></span></label>
                    <span id="catatan_error" class="text-danger"></span>
                    <div class="has-success">
                      <textarea class="form-control" cols="10" rows="10" id="inCatatan" name="inCatatan"></textarea>
                      <span class="help-block text-danger"></span>
                    </div>
                  </div>
                </div>
                        <div class="col-md-12">
                            <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                        </div>
                       

                        <div class="col-md-12">
                            <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                        </div>
                        <div class="col-md-4">
                            <label class="control-label">Perawat</label>
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
                        </div>
                        <div class="col-md-4">
                            <label class="control-label">Orang Tua</label>
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
                                                        <span aria-hidden="false">&times;</span>
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
                            <label class="control-label"></label>
                            <br />
                            <div class="row">
                                <button data-toggle="modal" disabled data-target="#modal_ttd2" aria-expanded="false" aria-controls="poli_sore" class="btn"></span></button>
                                <button class="btn" disabled id="sig-clearBtn2"></button>
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
                             

                
                <div class="form-group text-center" style="margin-top: 30px;">
                  <div class="col-md-12">
                    <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                  </div>
                  <div class="col-md-12">
                    <a class="btn btn-default btn-anim  btn-sm" onclick="javascript:history.go(-1)" style="margin-right: 20px; margin-left: 30px;"><i class="fa fa-arrow-left"></i><span class="btn-text">KEMBALI</span></a>
                    <button id="simpan" onclick="simpan()" type="submit" class="btn btn-success mb-4">Simpan</button>
                    <button style="display: none;" id="edit" type="submit" class="btn btn-warning mb-4" onclick="edit()">Edit</button>
                    <button style="display: none;" id="cetak" type="submit" class="btn btn-primary mb-4" onclick="cetak()">Cetak</button>
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

    $("#persalinan1").click(function() {
        if ($(this).is(":checked")) {
            $("#title2").hide();
            $("#label3").hide();
            $("#label4").hide();
            $("#caesaria2").hide();
            $("#caesaria1").hide();
            $("#title1").show();
            $("#label1").show();
            $("#label2").show();
            $("#pervagina2").show();
            $("#pervagina1").show();
        }
    });
    $("#persalinan2").click(function() {
        if ($(this).is(":checked")) {
            $("#title1").hide();
            $("#label1").hide();
            $("#label2").hide();
            $("#pervagina2").hide();
            $("#pervagina1").hide();
            $("#title2").show();
            $("#label3").show();
            $("#label4").show();
            $("#caesaria2").show();
            $("#caesaria1").show();
        }
    });
</script>
<script type="text/javascript">
  function simpan() {
    id_pelayanan = $('#inPel').val();
    id_history = $('#inHis').val();
    no_rm = $('#inNoRM').val();
    nama_ibu = $('#inNamaIbu').val();
    // tgl_lahir = $('#inTgl').val();
    jenis_persalinan = $('input[name="persalinan"]:checked').val();
    pervagina = $('input[name="pervagina"]:checked').val();
    sectio = $('input[name="caesaria"]:checked').val();
    rawat_gabung = $('#inTglRwt').val();
    alasan = $('#inAlasan').val();
    catatan = $('#inCatatan').val();
    canvas = document.getElementById('can');
    ttd = canvas.toDataURL("image/png");
    canvas1 = document.getElementById('can1');
    ttd1 = canvas1.toDataURL("image/png");

    dataString = 'nama_ibu=' + nama_ibu + '&no_rm=' + no_rm + '&pervagina=' + pervagina + '&sectio=' + sectio + '&id_pelayanan=' + id_pelayanan + '&id_history=' + id_history +
      '&rawat_gabung=' + rawat_gabung + '&alasan=' + alasan + '&catatan=' + catatan +
      '&ttd=' + ttd + '&ttd1=' + ttd1 + '&jenis_persalinan=' + jenis_persalinan ;

    $.ajax({
      url: "<?php echo base_url() ?>Erm_ranap_bayi_gabung/insert_bayi",
      method: "POST",
      dataType: 'json',
      data: dataString,
      success: function(data) {
        if (data.status == "success") {
          window.location.href = "<?php echo base_url('erm_ranap/form/') ?>" + '<?= urlencode(base64_encode($id_pelayanan)) ?>' + '/' + '<?= urlencode(base64_encode($id_history)) ?>';
        } else if (data.error) {
          if (nama_ibu == '' | nama_ibu == null) {
            $('#ibu_error').html('*wajib diisi');
          } else {
            $('#ibu_error').html('');
          }
          if (jenis_persalinan == '' | jenis_persalinan == null) {
            $('#persalinan_error').html('*wajib diisi');
          } else {
            $('#persalinan_error').html('');
          }
          if (rawat_gabung == '' | rawat_gabung == null) {
            $('#rawat_error').html('*wajib diisi');
          } else {
            $('#rawat_error').html('');
          }
          if (alasan == '' | alasan == null) {
            $('#alasan_error').html('*wajb diisi');
          } else {
            $('#alasan_error').html('');
          }
          if (catatan == '' | catatan == null) {
            $('#catatan_error').html('*wajib diisi');
          } else {
            $('#catatan_error').html('');
          }
        }else{
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