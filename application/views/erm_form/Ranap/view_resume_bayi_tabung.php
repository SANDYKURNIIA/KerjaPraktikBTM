<<<<<<< HEAD
<div class="row">
  <div class="col-sm-12">
    <div class="panel panel-default card-view">
      <div class="panel-heading">
        <div class="pull-left">
          <h10 class="panel-title txt-dark">Resume Bayi Tabung</h10>
        </div>
        <div class="clearfix"></div>
      </div>
      <div class="panel-wrapper collapse in">
        <div class="panel-body">
          <div class="form-wrap">

            <div class="form-group">
              <input type="hidden" class="form-control" value="<?= $id_pelayanan ?>" name="inPel" id="inPel">
              <input type="hidden" class="form-control" value="<?= $id_history ?>" name="inHis" id="inHis">
              <input type="hidden" class="form-control" value="" id="id" name="id">


              <div class="form-group">
                <div class="col-md-6">
                  <label class="control-label mb-10 text-left">Nama :<span class="help"></span></label></strong></h6>
                  <div class="has-success">
                    <span id="nama_error" class="text-danger"></span>
                    <input type="text" readonly class="form-control" value="<?= $nama ?>" name="namas" id="namas">
                    <span class="help-block"></span>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-6">
                  <label class="control-label mb-10 text-left">No.RM<span class="help"></span></label>
                  <span id="ibu_error" class="text-danger"></span>
                  <div class="has-success">
                    <input type="text" disabled class="form-control" name="inNoRM" id="inNoRM" value="<?= $no_rm ?>" disabled>
                    <span class="help-block"></span>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-6">
                  <label class="control-label mb-10 text-left">Kelas :<span class="help"></span></label>
                  <span id="kelas_error" class="text-danger"></span>
                  <div class="has-success">
                    <input type="text" id="kelas" name="kelas" value="<?= $kelas ?>" readonly class="form-control">
                    <span class="help-block"></span>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-6">
                  <label class="control-label mb-10 text-left">Ruang :<span class="help"></span></label>
                  <span id="ruang_rawat_error" class="text-danger"></span>
                  <div class="has-success">
                    <input type="text" id="ruang_rawat" name="ruang_rawat" readonly class="form-control" value="<?= $ruang_rawat->nama_ruangan ?>">
                    <span class="help-block"></span>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-6">
                  <label class="control-label mb-10 text-left" id="title">Jenis Kelamin :</label>
                  <div class="has-success">
                    <span id="jenis_kelamin_error" class="text-danger"></span>
                    <input type="text" readonly class="form-control" value="<?= $jenis_kelamin ?>" name="kelamin" id="kelamin">
                  </div>
                </div>
              </div>


              <div class="form-group">
							<div class="col-md-6">
								<label class="control-label mb-10 text-left">Tanggal Lahir<span class="help"></span></label>
								<input type="text" disabled class="form-control" value="<?php
																						setlocale(LC_ALL, 'id_ID');

																						date_default_timezone_set('Asia/Jakarta');
																						$time = strtotime($tgl_lahir);
																						echo $date = strftime(" %d %B %Y ", $time);?>">
								<span class="help-block"></span>
							</div>
						</div>

              <div class="form-group ">
                <div class="col-md-6">
                  <label class="control-label mb-10 text-left">Agama:</label>
                  <div class="has-success">
                    <span id="agama_error" class="text-danger"></span>
                    <input type="text" disabled class="form-control" value="<?= $agama ?>" nama="agama" id="agama">
                    <span class="help-block"></span>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-6">
                  <label class="control-label mb-10 text-left">Status Perkawinan :</label>
                  <div class="has-success">
                    <span id="status_perkawinan_error" class="text-danger"></span>
                    <input type="text" disabled class="form-control" value="<?= $status ?>" name="status_perkawinan" id="status_perkawinan">
                    <span class="help-block"></span>
                  </div>
                </div>
              </div>

              <div class="form-group ">
                <div class="col-md-6">
                  <label class="control-label mb-10 text-left">Alamat :</label>
                  <div class="has-success">
                    <span id="alamat_error" class="text-danger"></span>
                    <input type="text" disabled class="form-control" value="<?= $alamat ?>">
                    <span class="help-block"></span>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-6">
                  <label class="control-label mb-10 text-left">Dokter:</label>
                  <div class="has-success">
                    <span id="nama_dokter_error" class="text-danger"></span>
                    <input type="text" readonly class="form-control" value="<?= $dpjp1 ?>" name="nama_dokter" id="nama_dokter">
                    <span class="help-block"></span>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-6">
                  <label class="control-label mb-10 text-left">Tanggal Masuk :</label>
                  <div class="has-success">
                    <span id="tanggal_masuk_error" class="text-danger"></span>
                    <input type="text" readonly id="tanggal_masuk" name="tanggal_masuk" class="form-control" value="<?php
                                                                                                                    setlocale(LC_ALL, 'id_ID');
                                                                                                                    date_default_timezone_set('Asia/Jakarta');
                                                                                                                    $time = strtotime($tgl_masuk);
                                                                                                                    $date = strftime(" %d %B %Y ", $time);
                                                                                                                    $jam = date(" H:i:s ", $time);
                                                                                                                    echo $date ?>">
                  </div>
                  <span class="help-block"></span>
                </div>
              </div>

              <div class="form-group ">
                <div class="col-md-6">
                  <label class="control-label mb-10 text-left">Tanggal Keluar :</label>
                  <div class="has-success">
                    <span id="keluar_kamar_error" class="text-danger"></span>
                    <input type="text" disabled class="form-control" value="<?= $keluar_kamar ?>">
                    <span class="help-block"></span>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-12">
                  <label class="control-label mb-10 text-left">Diagnosa saat masuk:</label>
                  <div class="has-success">
                    <span id="diagnosa_saat_masuk_error" class="text-danger"></span>
                    <input type="text" disabled class="form-control" value="<?= $pasien->diagnosa ?>" name="diagnosa_saat_masuk" id="nama_doikter">
                    <span class="help-block"></span>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-6">
                  <label class="control-label mb-10 text-left">Riwayat Kelahiran/Anamnesa :</label>
                  <div class="has-success">
                    <span id="riwayat_kelahiran_error" class="text-danger"></span>
                    <textarea class="form-control" cols="8" rows="8" id="riwayat_kelahiran" name="riwayat_kelahiran"></textarea>
                    <span class="help-block"></span>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-6">
                  <label class="control-label mb-10 text-left">Pemeriksaan Fisik :</label>
                  <div class="has-success">
                    <span id="pemeriksaan_fisik_error" class="text-danger"></span>
                    <textarea class="form-control" cols="8" rows="8" id="pemeriksaan_fisik" name="pemeriksaan_fisik"></textarea>
                    <span class="help-block"></span>
                  </div>
                </div>
              </div>


              <div class="form-group">
                <div class="col-md-6">
                  <label class="control-label mb-10 text-left">Hasil Pemeriksaan Penunjang :</label>
                  <div class="has-success">
                    <span id="hasil_pemeriksaan_penunjang_error" class="text-danger"></span>
                    <textarea class="form-control" cols="8" rows="8" id="hasil_pemeriksaan_penunjang" name="hasil_pemeriksaan_penunjang"></textarea>
                    <span class="help-block"></span>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-6">
                  <label class="control-label mb-10 text-left">Porsedur Terapi & Tindakan Yang Telah Di Kerjakan :</label>
                  <div class="has-success">
                    <span id="prosedur_terapi_error" class="text-danger"></span>
                    <textarea class="form-control" cols="8" rows="8" id="prosedur_terapi" name="prosedur_terapi"></textarea>
                    <span class="help-block"></span>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-6">
                  <label class="control-label mb-10 text-left">Terapi Obat Yang Diberikan Termasuk Obat Setelah Pasien Pulang :</label>
                  <div class="has-success">
                    <span id="terapi_obat_yang_diberikan _error"></span>
                    <textarea class="form-control" cols="8" rows="8" id="terapi_obat_yang_diberikan" name="terapi_obat_yang_diberikan"></textarea>
                    <span class="help-block"></span>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-6">
                  <label class="control-label mb-10 text-left">Kondisi / Keadaan Pasien Saat Pulang :</label>
                  <div class="has-success">
                    <span id="kondisi_pasien_saat_pulang_error" class="text-danger"></span>
                    <textarea class="form-control" cols="8" rows="8" id="kondisi_pasien_saat_pulang" name="kondisi_pasien_saat_pulang"></textarea>
                    <span class="help-block"></span>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-6">
                  <label class="control-label mb-10 text-left">Edukasi Yang Sudah Diberikan : </label>
                  <div class="has-success">
                    <span id="eedukasi_yang_sudah_diberikan_error" class="text-danger"></span>
                    <textarea class="form-control" cols="8" rows="8" id="edukasi_yang_sudah_diberikan" name="edukasi_yang_sudah_diberikan"></textarea>
                    <span class="help-block"></span>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-6">
                  <label class="control-label mb-10 text-left">Kontrol Kembali Ke RS Tanggal :</label>
                  <div class="has-success">
                    <span id="tanggal_kontrol_kembali_error" class="text-danger"></span></strong></h6>
                    <input type="date" class="form-control" id="tanggal_kontrol_kembali" name="tanggal_kontrol_kembali">
                    <span class="help-block"></span>
                  </div>
                </div>
              </div>


              <div class="col-md-12">
                <a class="btn btn-default btn-anim  btn-sm" onclick="javascript:history.go(-1)" style="margin-right: 20px; margin-left: 1000px;"><i class="fa fa-arrow-left"></i><span class="btn-text">KEMBALI</span></a>
                <button type="button" class="btn btn-success mb-4" onclick="simpan()">Simpan</button>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    id_pelayanan = $('#inPel').val();
    id_history = $('#inHis').val();

  });
</script>
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
    riwayat_kelahiran = $('#riwayat_kelahiran').val();
    pemeriksaan_fisik = $('#pemeriksaan_fisik').val();
    hasil_pemeriksaan_penunjang = $('#hasil_pemeriksaan_penunjang').val();
    prosedur_terapi = $('#prosedur_terapi').val();
    kondisi_pasien_saat_pulang = $('#kondisi_pasien_saat_pulang').val();
    terapi_obat_yang_diberikan = $('#terapi_obat_yang_diberikan').val();
    edukasi_yang_sudah_diberikan = $('#edukasi_yang_sudah_diberikan').val();
    tanggal_kontrol_kembali = $('#tanggal_kontrol_kembali').val();
    staff = $('#staff').val();

    $.ajax({
      url: "<?php echo base_url() ?>Erm_resume_bayi_tabung/store",
      method: "POST",
      dataType: 'json',
      data: {
        id_pelayanan: id_pelayanan,
        id_history: id_history,
        no_rm: no_rm,
        riwayat_kelahiran: riwayat_kelahiran,
        pemeriksaan_fisik: pemeriksaan_fisik,
        hasil_pemeriksaan_penunjang: hasil_pemeriksaan_penunjang,
        prosedur_terapi: prosedur_terapi,
        kondisi_pasien_saat_pulang: kondisi_pasien_saat_pulang,
        terapi_obat_yang_diberikan: terapi_obat_yang_diberikan,
        edukasi_yang_sudah_diberikan: edukasi_yang_sudah_diberikan,
        tanggal_kontrol_kembali: tanggal_kontrol_kembali,
        staff: staff,
      },
      error: function(data, error) {
        console.error(error);
        console.log(data.error)
      },
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
=======
<div class="row">
  <div class="col-sm-12">
    <div class="panel panel-default card-view">
      <div class="panel-heading">
        <div class="pull-left">
          <h10 class="panel-title txt-dark">Resume Bayi Tabung</h10>
        </div>
        <div class="clearfix"></div>
      </div>
      <div class="panel-wrapper collapse in">
        <div class="panel-body">
          <div class="form-wrap">

            <div class="form-group">
              <input type="hidden" class="form-control" value="<?= $id_pelayanan ?>" name="inPel" id="inPel">
              <input type="hidden" class="form-control" value="<?= $id_history ?>" name="inHis" id="inHis">
              <input type="hidden" class="form-control" value="" id="id" name="id">


              <div class="form-group">
                <div class="col-md-6">
                  <label class="control-label mb-10 text-left">Nama :<span class="help"></span></label></strong></h6>
                  <div class="has-success">
                    <span id="nama_error" class="text-danger"></span>
                    <input type="text" readonly class="form-control" value="<?= $nama ?>" name="namas" id="namas">
                    <span class="help-block"></span>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-6">
                  <label class="control-label mb-10 text-left">No.RM<span class="help"></span></label>
                  <span id="ibu_error" class="text-danger"></span>
                  <div class="has-success">
                    <input type="text" disabled class="form-control" name="inNoRM" id="inNoRM" value="<?= $no_rm ?>" disabled>
                    <span class="help-block"></span>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-6">
                  <label class="control-label mb-10 text-left">Kelas :<span class="help"></span></label>
                  <span id="kelas_error" class="text-danger"></span>
                  <div class="has-success">
                    <input type="text" id="kelas" name="kelas" value="<?= $kelas ?>" readonly class="form-control">
                    <span class="help-block"></span>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-6">
                  <label class="control-label mb-10 text-left">Ruang :<span class="help"></span></label>
                  <span id="ruang_rawat_error" class="text-danger"></span>
                  <div class="has-success">
                    <input type="text" id="ruang_rawat" name="ruang_rawat" readonly class="form-control" value="<?= $ruang_rawat->nama_ruangan ?>">
                    <span class="help-block"></span>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-6">
                  <label class="control-label mb-10 text-left" id="title">Jenis Kelamin :</label>
                  <div class="has-success">
                    <span id="jenis_kelamin_error" class="text-danger"></span>
                    <input type="text" readonly class="form-control" value="<?= $jenis_kelamin ?>" name="kelamin" id="kelamin">
                  </div>
                </div>
              </div>


              <div class="form-group">
							<div class="col-md-6">
								<label class="control-label mb-10 text-left">Tanggal Lahir<span class="help"></span></label>
								<input type="text" disabled class="form-control" value="<?php
																						setlocale(LC_ALL, 'id_ID');

																						date_default_timezone_set('Asia/Jakarta');
																						$time = strtotime($tgl_lahir);
																						echo $date = strftime(" %d %B %Y ", $time);?>">
								<span class="help-block"></span>
							</div>
						</div>

              <div class="form-group ">
                <div class="col-md-6">
                  <label class="control-label mb-10 text-left">Agama:</label>
                  <div class="has-success">
                    <span id="agama_error" class="text-danger"></span>
                    <input type="text" disabled class="form-control" value="<?= $agama ?>" nama="agama" id="agama">
                    <span class="help-block"></span>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-6">
                  <label class="control-label mb-10 text-left">Status Perkawinan :</label>
                  <div class="has-success">
                    <span id="status_perkawinan_error" class="text-danger"></span>
                    <input type="text" disabled class="form-control" value="<?= $status ?>" name="status_perkawinan" id="status_perkawinan">
                    <span class="help-block"></span>
                  </div>
                </div>
              </div>

              <div class="form-group ">
                <div class="col-md-6">
                  <label class="control-label mb-10 text-left">Alamat :</label>
                  <div class="has-success">
                    <span id="alamat_error" class="text-danger"></span>
                    <input type="text" disabled class="form-control" value="<?= $alamat ?>">
                    <span class="help-block"></span>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-6">
                  <label class="control-label mb-10 text-left">Dokter:</label>
                  <div class="has-success">
                    <span id="nama_dokter_error" class="text-danger"></span>
                    <input type="text" readonly class="form-control" value="<?= $dpjp1 ?>" name="nama_dokter" id="nama_dokter">
                    <span class="help-block"></span>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-6">
                  <label class="control-label mb-10 text-left">Tanggal Masuk :</label>
                  <div class="has-success">
                    <span id="tanggal_masuk_error" class="text-danger"></span>
                    <input type="text" readonly id="tanggal_masuk" name="tanggal_masuk" class="form-control" value="<?php
                                                                                                                    setlocale(LC_ALL, 'id_ID');
                                                                                                                    date_default_timezone_set('Asia/Jakarta');
                                                                                                                    $time = strtotime($tgl_masuk);
                                                                                                                    $date = strftime(" %d %B %Y ", $time);
                                                                                                                    $jam = date(" H:i:s ", $time);
                                                                                                                    echo $date ?>">
                  </div>
                  <span class="help-block"></span>
                </div>
              </div>

              <div class="form-group ">
                <div class="col-md-6">
                  <label class="control-label mb-10 text-left">Tanggal Keluar :</label>
                  <div class="has-success">
                    <span id="keluar_kamar_error" class="text-danger"></span>
                    <input type="text" disabled class="form-control" value="<?= $keluar_kamar ?>">
                    <span class="help-block"></span>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-12">
                  <label class="control-label mb-10 text-left">Diagnosa saat masuk:</label>
                  <div class="has-success">
                    <span id="diagnosa_saat_masuk_error" class="text-danger"></span>
                    <input type="text" disabled class="form-control" value="<?= $pasien->diagnosa ?>" name="diagnosa_saat_masuk" id="nama_doikter">
                    <span class="help-block"></span>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-6">
                  <label class="control-label mb-10 text-left">Riwayat Kelahiran/Anamnesa :</label>
                  <div class="has-success">
                    <span id="riwayat_kelahiran_error" class="text-danger"></span>
                    <textarea class="form-control" cols="8" rows="8" id="riwayat_kelahiran" name="riwayat_kelahiran"></textarea>
                    <span class="help-block"></span>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-6">
                  <label class="control-label mb-10 text-left">Pemeriksaan Fisik :</label>
                  <div class="has-success">
                    <span id="pemeriksaan_fisik_error" class="text-danger"></span>
                    <textarea class="form-control" cols="8" rows="8" id="pemeriksaan_fisik" name="pemeriksaan_fisik"></textarea>
                    <span class="help-block"></span>
                  </div>
                </div>
              </div>


              <div class="form-group">
                <div class="col-md-6">
                  <label class="control-label mb-10 text-left">Hasil Pemeriksaan Penunjang :</label>
                  <div class="has-success">
                    <span id="hasil_pemeriksaan_penunjang_error" class="text-danger"></span>
                    <textarea class="form-control" cols="8" rows="8" id="hasil_pemeriksaan_penunjang" name="hasil_pemeriksaan_penunjang"></textarea>
                    <span class="help-block"></span>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-6">
                  <label class="control-label mb-10 text-left">Porsedur Terapi & Tindakan Yang Telah Di Kerjakan :</label>
                  <div class="has-success">
                    <span id="prosedur_terapi_error" class="text-danger"></span>
                    <textarea class="form-control" cols="8" rows="8" id="prosedur_terapi" name="prosedur_terapi"></textarea>
                    <span class="help-block"></span>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-6">
                  <label class="control-label mb-10 text-left">Terapi Obat Yang Diberikan Termasuk Obat Setelah Pasien Pulang :</label>
                  <div class="has-success">
                    <span id="terapi_obat_yang_diberikan _error"></span>
                    <textarea class="form-control" cols="8" rows="8" id="terapi_obat_yang_diberikan" name="terapi_obat_yang_diberikan"></textarea>
                    <span class="help-block"></span>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-6">
                  <label class="control-label mb-10 text-left">Kondisi / Keadaan Pasien Saat Pulang :</label>
                  <div class="has-success">
                    <span id="kondisi_pasien_saat_pulang_error" class="text-danger"></span>
                    <textarea class="form-control" cols="8" rows="8" id="kondisi_pasien_saat_pulang" name="kondisi_pasien_saat_pulang"></textarea>
                    <span class="help-block"></span>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-6">
                  <label class="control-label mb-10 text-left">Edukasi Yang Sudah Diberikan : </label>
                  <div class="has-success">
                    <span id="eedukasi_yang_sudah_diberikan_error" class="text-danger"></span>
                    <textarea class="form-control" cols="8" rows="8" id="edukasi_yang_sudah_diberikan" name="edukasi_yang_sudah_diberikan"></textarea>
                    <span class="help-block"></span>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-6">
                  <label class="control-label mb-10 text-left">Kontrol Kembali Ke RS Tanggal :</label>
                  <div class="has-success">
                    <span id="tanggal_kontrol_kembali_error" class="text-danger"></span></strong></h6>
                    <input type="date" class="form-control" id="tanggal_kontrol_kembali" name="tanggal_kontrol_kembali">
                    <span class="help-block"></span>
                  </div>
                </div>
              </div>


              <div class="col-md-12">
                <a class="btn btn-default btn-anim  btn-sm" onclick="javascript:history.go(-1)" style="margin-right: 20px; margin-left: 1000px;"><i class="fa fa-arrow-left"></i><span class="btn-text">KEMBALI</span></a>
                <button type="button" class="btn btn-success mb-4" onclick="simpan()">Simpan</button>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    id_pelayanan = $('#inPel').val();
    id_history = $('#inHis').val();

  });
</script>
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
    riwayat_kelahiran = $('#riwayat_kelahiran').val();
    pemeriksaan_fisik = $('#pemeriksaan_fisik').val();
    hasil_pemeriksaan_penunjang = $('#hasil_pemeriksaan_penunjang').val();
    prosedur_terapi = $('#prosedur_terapi').val();
    kondisi_pasien_saat_pulang = $('#kondisi_pasien_saat_pulang').val();
    terapi_obat_yang_diberikan = $('#terapi_obat_yang_diberikan').val();
    edukasi_yang_sudah_diberikan = $('#edukasi_yang_sudah_diberikan').val();
    tanggal_kontrol_kembali = $('#tanggal_kontrol_kembali').val();
    staff = $('#staff').val();

    $.ajax({
      url: "<?php echo base_url() ?>Erm_resume_bayi_tabung/store",
      method: "POST",
      dataType: 'json',
      data: {
        id_pelayanan: id_pelayanan,
        id_history: id_history,
        no_rm: no_rm,
        riwayat_kelahiran: riwayat_kelahiran,
        pemeriksaan_fisik: pemeriksaan_fisik,
        hasil_pemeriksaan_penunjang: hasil_pemeriksaan_penunjang,
        prosedur_terapi: prosedur_terapi,
        kondisi_pasien_saat_pulang: kondisi_pasien_saat_pulang,
        terapi_obat_yang_diberikan: terapi_obat_yang_diberikan,
        edukasi_yang_sudah_diberikan: edukasi_yang_sudah_diberikan,
        tanggal_kontrol_kembali: tanggal_kontrol_kembali,
        staff: staff,
      },
      error: function(data, error) {
        console.error(error);
        console.log(data.error)
      },
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
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
</scripT>