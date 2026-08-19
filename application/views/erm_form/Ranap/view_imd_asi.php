<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default card-view">
            <div class="panel-heading">
                <div class="pull-left">
                    <h6 class="panel-title txt-dark">IMD/ASI Ekslusif</h6>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-wrapper collapse in">

                <div class="panel-body">
                    <div class="form-wrap">

                        <div class="form-group">
                            <div class="col-md-12">
                                <strong>
                                    <label class="control-label mb-10 text-left">PASIEN :<span class="help"></span></label>
                                </strong>

                            </div>
                        </div>
                        <input type="hidden" class="form-control" value="<?= $id_pelayanan ?>" id="inPel">
                        <input type="hidden" class="form-control" value="<?= $id_history ?>" id="inHis">
                        <div class="form-group">
                            <div class="col-md-3">
                                <label class="control-label mb-10 text-left">Nama Pasien<span class="help"></span></label>
                                <span id="nama_error" class="text-danger"></span>
                                <div class="has-success">
                                <input type="text" disabled class="form-control" value="<?= $nama ?>" id="inNama">
                                </div>
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

                        <div class="form-group">
                            <div class="col-md-3">
                                <label class="control-label mb-10 text-left">Jenis Kelamin<span class="help"></span></label>
                                <span id="alamat_error" class="text-danger"></span>
                                <div class="has-success">
                                <input type="text" disabled class="form-control" value="<?= $jenis_kelamin ?>" id="inJk">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-3">
                                <label class="control-label mb-10 text-left">No. RM<span class="help"></span></label>
                                <span id="hubungan_error" class="text-danger"></span>
                                <div class="has-success">
                                <input type="text" disabled class="form-control" value="<?= $no_rm ?>" id="inNoRM">
                                </div>
                            </div>
                        </div>

                        
                        

                        <div class="col-md-12">
                            <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <strong>
                                    <label class="control-label mb-10 text-left">BAGIAN 1<span class="help"></span></label>
                                </strong>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6">
                                <label class="control-label mb-10 text-left">Nama Ibu:<span class="help"></span></label>
                                <span id="ibu_error" class="text-danger"></span>
                                <div class="has-success">
                                    <input type="text" class="form-control" id="inIbu">
                                </span class="help-block">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6">
                                <label class="control-label mb-10 text-left">Jam Bayi Lahir :<span class="help"></span></label>
                                <span id="lahir_error" class="text-danger"></span>
                                <div class="has-success">
                                  <input type="time" class="form-control" id="inJam">
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
                            <div class="col-md-12">
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
                        </div>
                        <div class="col-md-12">
                            <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                        </div> -->
                        <div class="form-group ">
                              <div class="col-md-3">
                                <label class="control-label mb-10 text-left" id="title1">A. Pervagina :</label>
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
                                <label class="control-label mb-10 text-left" id="title2">B. Sectio Caesaria</label>
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
                            <div class="form-group ">
                                <div class="col-md-3">
                                    <label class="control-label mb-10 text-left">
                                    c. Kontak Kulit Dengan Kulit
                                    </label>
                                    <span id="kontak_error" class="text-danger"></span>
                                    <div class="radio-button radio-button-primary">
                                        <input id="kontak1" type="radio" name="kontak" value="Ya">
                                        <label class="control-label" for="kontak1">
                                            Ya
                                        </label>
                                    </div>
                                    <div class="radio-button radio-button-primary">
                                        <input id="kontak2" type="radio" name="kontak" value="Tidak">
                                        <label class="control-label" for="kontak2">
                                            Tidak
                                        </label>
                                    </div>
                            </div>
                            <div class="col-md-12">
                            <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6">
                                <label class="control-label mb-10 text-left">Waktu Mulai: <span class="help"></span></label>
                                <span id="jam_mulai_error" class="text-danger"></span>
                                <div class="has-success">
                                    <input type="time" class="form-control" value="" id="jam_mulai">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6">
                                <label class="control-label mb-10 text-left">Waktu Selesai: <span class="help"></span></label>
                                <span id="jam_selesai_error" class="text-danger"></span>
                                <div class="has-success">
                                    <input type="time" class="form-control" value="" id="jam_selesai">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6">
                                <label class="control-label mb-10 text-left">Lama Kontak :<span class="help"></span></label>
                                <span id="Lkontak_error" class="text-danger"></span>
                                <div class="has-success">
                                    <input type="text" class="form-control" id="inKontak">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6">
                                <label class="control-label mb-10 text-left">Saat Bayi Menyusui Pertama Kali <span class="help"></span></label>
                                <span id="menyusu1_error" class="text-danger"></span>
                                <div class="has-success">
                                  <input type="datetime-local" class="form-control" id="inMenyusui1">
                                  <span class="help-block"></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6">
                                <label class="control-label mb-10 text-left">Tanggal dan Jam Menyusui Kedua: <span class="help"></span></label>
                                <span id="menyusu2_error" class="text-danger"></span>
                                <div class="has-success">
                                  <input type="datetime-local" class="form-control" id="inMenyusui2">
                                  <span class="help-block"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label class="control-label mb-10 text-left">Jika Tidak Dilakukan Beri Alasan: <span class="help"></span></label>
                                <span id="alasan_error" class="text-danger"></span>
                                <div class="has-success">
                                  <textarea class="form-control" name="" id="inAlasan" cols="30" rows="4"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label class="control-label mb-10 text-left">Catatan: <span class="help"></span></label>
                                <span id="catatan_error" class="text-danger"></span>
                                <div class="has-success">
                                  <textarea class="form-control" name="" id="inCatatan" cols="30" rows="4"></textarea>
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
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-center" style="margin-top: 30px;">
                            <div class="col-md-12">
                                <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                            </div>
                            <div class="col-md-6">
                                <a class="btn btn-default btn-anim  btn-sm" onclick="javascript:history.go(-1)" style="margin-right: 20px; margin-left: 30px;"><i class="fa fa-arrow-left"></i><span class="btn-text">KEMBALI</span></a>
                                <button type="submit" id="simpan" class="btn btn-success mb-4" onclick="simpan()">Simpan</button>
                                <button style="display: none;" id="edit" type="submit" class="btn btn-warning mb-4" onclick="edit()">Edit</button>
                                <button style="display: none;" id="cetak" type="submit" class="btn btn-primary mb-4" onclick="cetak()">Cetak</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div></div></div>
   
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
    nama_ibu = $('#inIbu').val();
    jam_lahir = $('#inJam').val();
    jenis_persalinan = $('input[name="persalinan"]:checked').val();
    pervagina = $('input[name="pervagina"]:checked').val();
    sectio = $('input[name="caesaria"]:checked').val();
    kontak = $('input[name="kontak"]:checked').val();
    waktu_mulai = $('#jam_mulai').val();
    waktu_selesai = $('#jam_selesai').val();
    lama_kontak = $('#inKontak').val();
    menyusui1 = $('#inMenyusui1').val();
    menyusui2 = $('#inMenyusui2').val();
    alasan = $('#inAlasan').val();
    catatan = $('#inCatatan').val();
    canvas = document.getElementById('can');
    ttd = canvas.toDataURL("image/png");
    canvas1 = document.getElementById('can1');
    ttd1 = canvas1.toDataURL("image/png");

    dataString = 'nama_ibu=' + nama_ibu + '&no_rm=' + no_rm + '&jam_lahir=' + jam_lahir + '&pervagina=' + pervagina + '&sectio=' + sectio + '&id_pelayanan=' + id_pelayanan + '&id_history=' + id_history +
      '&kontak=' + kontak + '&waktu_mulai=' + waktu_mulai + '&waktu_selesai=' + waktu_selesai + '&lama_kontak=' + lama_kontak + '&menyusui1=' + menyusui1 + '&menyusui2=' + menyusui2 + '&alasan=' + alasan + '&catatan=' + catatan +
      '&ttd=' + ttd + '&ttd1=' + ttd1 + '&jenis_persalinan=' + jenis_persalinan;

    $.ajax({
      url: "<?php echo base_url() ?>Erm_ranap_imd/insert_imd_asi",
      method: "POST",
      dataType: 'json',
      data: dataString,
      success: function(data) {
        if (data.status == "success") {
          window.location.href = "<?php echo base_url('erm_ranap/form/') ?>" + '<?= urlencode(base64_encode($id_pelayanan)) ?>' + '/' + '<?= urlencode(base64_encode($id_history)) ?>';
        } else if (data.error) {
          if (data.nama_ibu != '') {
            $('#ibu_error').html(data.nama_ibu);
          } else {
            $('#ibu_error').html('');
          }
          if (data.jam_lahir != '') {
            $('#lahir_error').html(data.jam_lahir);
          } else {
            $('#lahir_error').html('');
          }
          if (data.waktu_mulai != '') {
            $('#jam_mulai_error').html(data.waktu_mulai);
          } else {
            $('#jam_mulai_error').html('');
          }
          if (data.waktu_selesai != '') {
            $('#jam_selesai_error').html(data.waktu_selesai);
          } else {
            $('#jam_selesai_error').html('');
          }
          if (data.bayi_menyusui != '') {
            $('#menyusu1_error').html(data.bayi_menyusui);
          } else {
            $('#menyusu1_error').html('');
          }
          if (data.lama_kontak != '') {
            $('#Lkontak_error').html(data.lama_kontak);
          } else {
            $('#Lkontak_error').html('');
          }
          if (data.menolong != '') {
            $('#menyusu2_error').html(data.menolong);
          } else {
            $('#menyusu2_error').html('');
          }
          if (data.catatan != '') {
            $('#catatan_error').html(data.catatan);
          } else {
            $('#catatan_error').html('');
          }
          if (data.alasan != '') {
            $('#alasan_error').html(data.alasan);
          } else {
            $('#alasan_error').html('');
          }
          if (jenis_persalinan == '' | jenis_persalinan == null) {
            $('#persalinan_error').html('*wajib diisi');
          } else {
            $('#persalinan_error').html('');
          }
          if (kontak == '' | kontak == null) {
            $('#kontak_error').html('*wajib diisi');
          } else {
            $('#kontak_error').html('');
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
//   function hapus(id) { //utk hapus diagnosa pasien
//     swal({
//       title: "Warning?",
//       text: "Apakah kamu yakin menghapus data ini?",
//       type: "warning",
//       showCancelButton: true,
//       confirmButtonColor: "#3cb878",
//       confirmButtonText: "Yakin",
//       cancelButtonText: "Batal",
//       closeOnConfirm: false
//     }, function() {
//       $().ready(function() {
//         $.ajax({
//           url: "<?php echo base_url() ?>Erm_penunjang_diagnostik/hapus_penunjang",
//           method: "POST",
//           dataType: 'json',
//           data: {
//             id: id,
//           },
//           success: function(data) {
//             if (data.status == "success") {
//               swal({
//                 title: "good job!",
//                 type: "success",
//                 text: "Data Berhasil dihapus",
//                 confirmButtonColor: "#3cb878",
//               });
//               $('#tabel_terapi').DataTable().ajax.reload();
//             } else {
//               swal({
//                 title: "Gagal!",
//                 type: "warning",
//                 confirmButtonColor: "#3cb878",
//               });
//             }
//           }
//         });
//       });
//     });
//     return false;
//   }

//   function reload_data_id_pel(id_pelayanan) { //utk reload data diagnosa pasien jika berhasil
//     $('#tabel_terapi').dataTable().fnClearTable();
//     $('#tabel_terapi').dataTable().fnDestroy();
//     $('#tabel_terapi').DataTable({
//       "language": {
//         "sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
//         "sProcessing": "Sedang memproses...",
//         "sLengthMenu": "Tampilkan _MENU_ entri",
//         "sZeroRecords": "Tidak ditemukan data yang sesuai",
//         "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
//         "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
//         "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
//         "sInfoPostFix": "",
//         "sSearch": "Cari:",
//         "sUrl": "",
//         "oPaginate": {
//           "sFirst": "Pertama",
//           "sPrevious": "Sebelumnya",
//           "sNext": "Selanjutnya",
//           "sLast": "Terakhir",
//         }
//       },
//       "ajax": {
//         "url": '<?php echo base_url('Erm_penunjang_diagnostik/tampil_list_per_pen_rujukan'); ?>',
//         "type": 'POST',
//         "data": {
//           id_pelayanan: id_pelayanan
//         },
//       },

//       "deferRender": true,
//       "processing": true,
//       "order": [],
//       "columnDefs": [{
//         "targets": [0],
//         "orderable": false,
//       }, ],
//     });
//   }

//   function pilih(id) {
//     $('#id').val(id);
//     $.ajax({
//       url: "<?php echo base_url() ?>Erm_penunjang_diagnostik/getPerPenRujukan",
//       method: "POST",
//       dataType: 'json',
//       data: {
//         id: id
//       },
//       success: function(data) {
//         if (data.status_dt == "found") {
//           $('#inTgl').val(data.tanggal);
//           $('#inPeriksa').val(data.periksa);
//           $('#inDPJP').val(data.dpjp);
//           $('#inKet').val(data.ket);
//           $('#edit').show();
//           $('#cetak').show();
//           $('#simpan').hide();
//           // smooth scroll
//           window.scrollTo({
//             top: 0,
//             behavior: 'smooth'
//           });
//         } else {
//           swal({
//             title: "Gagal!",
//             type: "warning",
//             text: "Data Kosong",
//             confirmButtonColor: "#3cb878",
//           });
//         }
//       }

//     });
//     return false;

//   }

//   function edit() {
//     var formData = new FormData($('#formUpload')[0]);
//     $.ajax({
//       url: '<?php echo base_url(); ?>Erm_penunjang_diagnostik/edit_penunjang',
//       type: "POST",
//       data: formData,
//       processData: false,
//       contentType: false,
//       cache: false,
//       dataType: 'JSON',
//       success: function(data) {
//         const success = data.status.success;
//         const error = data.status.error;
//         if (success > 0) {
//           swal({
//             title: "good job!",
//             type: "success",
//             text: "Data berhasil disimpan",
//             confirmButtonColor: "#3cb878",
//           });
//           $("#file_input").val(null);
//           $("#inDPJP").val('');
//           $("#inKet").val('');
//           $("#inPeriksa").val('');
//           $("#inTgl").val('');
//           $('#edit').hide();
//           $('#cetak').hide();
//           $('#simpan').show();
//           $('#tabel_terapi').DataTable().ajax.reload();
//         } else if (error > 0) {
//           swal({
//             title: "Gagal!",
//             text: "Data tidak terkirim, mohon cek inputan Anda kembali",
//             type: "warning",
//             confirmButtonColor: "#3cb878",
//           });
//         }
//       }
//     });
//   }

//   function cetak() {
//     id = $('#id').val();
//     window.location.href = "<?php echo base_url('Erm_igd_edit/print_penunjang/') ?>" + id;
//   }
</script>