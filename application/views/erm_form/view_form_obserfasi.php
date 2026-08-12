<!-- Row -->
<div class="row">
  <div class="col-sm-12">
    <div class="panel panel-default card-view">
      <div class="panel-heading">
        <div class="pull-left">
          <h6 class="panel-title txt-dark">FORM OBSERVASI PASIEN SELAMA PROSES TRANSFER PASIEN EKSTERNAL</h6>
        </div>
        <div class="clearfix"></div>
      </div>

      <div class="panel-wrapper collapse in">
        <div class="panel-body">
          <div class="form-wrap">
            <input type="hidden" class="form-control" value="<?= $id_pelayanan ?>" id="inPel">
            <input type="hidden" class="form-control" value="<?= $id_history ?>" id="inHis">
            <input type="hidden" class="form-control" value="<?= $no_rm ?>" id="inNoRM">
            <div class="form-group ">
              <div class="col-md-12">
                <label class="control-label mb-10 text-left">STATUS KEGAWAT DARURATAN :</label>
                <span id="gawat_error" class="text-danger"></span>
                <div class="radio-button radio-button-success">
                  <input id="checkbox1" type="radio" name="gawat" value="Merah">
                  <label class="control-label" for="checkbox1">
                    Merah
                  </label>
                </div>
                <div class="radio-button radio-button-success">
                  <input id="checkbox2" type="radio" name="gawat" value="Kuning">
                  <label class="control-label" for="checkbox2">
                    Kuning
                  </label>
                </div>
                <div class="radio-button radio-button-success">
                  <input id="checkbox3" type="radio" name="gawat" value="Hijau">
                  <label class="control-label" for="checkbox3">
                    Hijau
                  </label>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-12">
                  <strong><label class="control-label mb-10 text-left">Petugas Ambulan<span class="help"></span></label></strong>
                </div>

                <div class="form-group">
                  <div class="col-md-3">
                    <label class="control-label mb-10 text-left">Nama Supir :<span class="help"></span></label>
                    <span id="supir_error" class="text-danger"></span>
                    <div class="has-success">
                      <input type="text" class="form-control" id="nama_supir">
                      <span class="help-block"></span>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-3">
                    <label class="control-label mb-10 text-left">Nama Tim Medis :<span class="help"></span></label>
                    <span id="tm_error" class="text-danger"></span>
                    <div class="has-success">
                      <input type="text" class="form-control" id="nama_tm">
                      <span class="help-block"></span>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-3">
                    <label class="control-label mb-10 text-left">Tanggal<span class="help"></span></label>
                    <span id="tgl_error" class="text-danger"></span>
                    <div class="has-success">
                      <input type="date" class="form-control" id="tgl">
                      <span class="help-block"></span>
                    </div>
                  </div>
                </div>

                <div class="form-group ">
                  <div class="col-md-3">
                    <label class="control-label mb-10 text-left">Jenis Kasus</label>
                    <span id="kasus_error" class="text-danger"></span>
                    <div class="radio-button radio-button-success">
                      <input id="trauma" type="radio" name="jenis_kasus" value="Trauma">
                      <label for="trauma" class="control-label">
                        Trauma
                      </label>
                    </div>
                    <div class="radio-button radio-button-success">
                      <input id="non_trauma" type="radio" name="jenis_kasus" value="Non Trauma">
                      <label for="non_trauma" class="control-label">
                        Non Trauma
                      </label>
                    </div>
                    <span class="help-block"></span>
                  </div>

                  <div class="form-group">
                    <div class="col-md-3">
                      <label class="control-label mb-10 text-left">Berangkat Dari :<span class="help"></span></label>
                      <span id="brgkt_error" class="text-danger"></span>
                      <div class="has-success">
                        <input type="text" class="form-control" id="berangkat">
                        <span class="help-block"></span>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-3">
                      <label class="control-label mb-10 text-left">Tujuan Ke :<span class="help"></span></label>
                      <span id="tuj_error" class="text-danger"></span>
                      <div class="has-success">
                        <input type="text" class="form-control" id="tujuan">
                        <span class="help-block"></span>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-3">
                      <label class="control-label mb-10 text-left">Jam Berangkat :<span class="help"></span></label>
                      <span id="jamb_error" class="text-danger"></span>
                      <div class="has-success">
                        <input type="time" class="form-control" id="jam_brgkt">
                        <span class="help-block"></span>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-3">
                      <label class="control-label mb-10 text-left">Jam Tiba :<span class="help"></span></label>
                      <span id="jamt_error" class="text-danger"></span>
                      <div class="has-success">
                        <input type="time" class="form-control" id="jam_tiba">
                        <span class="help-block"></span>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                  </div>
                  <div class="form-group">
                    <div class="col-md-12">
                      <strong>
                        <label class="control-label mb-10 text-left">Data Pasien<span class="help"></span></label>
                      </strong>
                    </div>

                    <div class="form-group">
                      <div class="col-md-3">
                        <label class="control-label mb-10 text-left">Nama :<span class="help"></span></label>
                        <input type="text" class="form-control" value="<?= $nama ?>" disabled>
                        <span class="help-block"></span>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-md-3">
                        <label class="control-label mb-10 text-left">Umur :<span class="help"></span></label>
                        <input type="text" disabled class="form-control" value="<?php
                                                                                $tanggal = new DateTime($tgl_lahir);
                                                                                $today = new DateTime();
                                                                                $y = $today->diff($tanggal)->y;
                                                                                $m = $today->diff($tanggal)->m;
                                                                                $d = $today->diff($tanggal)->d;
                                                                                echo  $y . " tahun " . $m . " bulan " . $d . " hari";  ?>">
                        <span class="help-block"></span>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-md-3">
                        <label class="control-label mb-10 text-left">TTL :<span class="help"></span></label>
                        <input type="text" class="form-control" value="<?= $tgl_lahir ?>" disabled>
                        <span class="help-block"></span>
                      </div>
                      <div class="col-md-3">
                        <label class="control-label mb-10 text-left">Jenis Kelamin</label>
                        <input type="text" class="form-control" value="<?= $jenis_kelamin ?>" disabled>
                        <span class="help-block"></span>
                      </div>
                    </div>

                    <div class="form-group ">


                      <div class="form-group ">
                        <div class="col-md-6">
                          <label class="control-label mb-10 text-left">Alergi Obat</label>
                          <span id="alergi_error" class="text-danger"></span>
                          <div class="radio-button radio-button-success">
                            <input id="ale_obat" type="radio" name="ale_obat" value="Tidak">
                            <label class="control-label" for="ale_obat">
                              Tidak
                            </label>
                          </div>
                          <div class="radio-button radio-button-success">
                            <input id="ale_obat1" type="radio" name="ale_obat" value="Ya">
                            <label class="control-label" for="ale_obat1">
                              Ya
                            </label>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-12">
                        <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                      </div>
                      <div class="form-group">
                        <div class="col-md-12">
                          <label class="control-label mb-10 text-left">OBAT-OBATAN HIGH ALERT YANG SUDAH DIBERIKAN :<span class="help"></span></label>
                        </div>
                        <div class="form-group">
                          <div class="col-md-4">
                            <a href="" class="btn btn-success mb-3" data-toggle="modal" data-target="#newPeternakModal">Tambah</a>
                          </div>
                        </div>
                        <table class="table table-hover display  pb-60" id="tabel_terapi">
                          <thead>
                            <tr class="bg-success">
                              <th>EDIT</th>
                              <th>HAPUS</th>
                              <th>TANGGAL/JAM</th>
                              <th>GCS</th>
                              <th>TD(MmHg)</th>
                              <th>Nadi(x/i)</th>
                              <th>Temp(c)</th>
                              <th>RR(x/i)</th>
                              <th>SpO2</th>
                              <th>KEJADIAN DI PROSES TRANSFER</th>
                              <th>TINDAKAN/PEMBERIAN OBAT-OBATAN</th>
                            </tr>
                          </thead>

                          <tbody style="color: black">
                          </tbody>
                          <tfoot>
                            <tr class="bg-success">
                              <th>EDIT</th>
                              <th>HAPUS</th>
                              <th>TANGGAL/JAM</th>
                              <th>GCS</th>
                              <th>TD(MmHg)</th>
                              <th>Nadi(x/i)</th>
                              <th>Temp(c)</th>
                              <th>RR(x/i)</th>
                              <th>SpO2</th>
                              <th>KEJADIAN DI PROSES TRANSFER</th>
                              <th>TINDAKAN/PEMBERIAN OBAT-OBATAN</th>
                            </tr>
                          </tfoot>
                        </table>
                        <div class="modal fade" id="newPeternakModal" role="dialog" aria-labelledby="newPeternakModallabel" aria-hidden="true">
                          <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="newPeternakModallabel">Tambah Obat High Alert</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>

                              <div class="modal-body">
                                <div class="form-group">
                                  <div class="row">
                                    <div class="col-md-12">
                                      <input type="hidden" class="form-control" value="<?= $id_pelayanan ?>" id="inPel">
                                      <input type="hidden" class="form-control" value="<?= $id_history ?>" id="inHis">
                                      <div class="col-md-6">
                                        <label class="control-label mb-10 text-left">GCS<span class="help"></span></label>
                                        <div class="has-success">
                                          <input type="number" step="any" class="form-control" id="gcs" value="">
                                          <span class="help-block"></span>
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                        <label class="control-label mb-10 text-left">Tensi<span class="help"></span></label>
                                        <div class="has-success">
                                          <input type="number" step="any" class="form-control" id="tensi" value="" placeholder="mmHg">
                                          <span class="help-block"></span>
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                        <label class="control-label mb-10 text-left">Nadi<span class="help"></span></label>
                                        <div class="has-success">
                                          <input type="number" step="any" class="form-control" id="nadi" value="" placeholder="x/menit">
                                          <span class="help-block"></span>
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                        <label class="control-label mb-10 text-left">Suhu<span class="help"></span></label>
                                        <div class="has-success">
                                          <input type="number" step="any" class="form-control" id="suhu" value="" placeholder="Celcius">
                                          <span class="help-block"></span>
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                        <label class="control-label mb-10 text-left">Pernapasan<span class="help"></span></label>
                                        <div class="has-success">
                                          <input type="number" step="any" class="form-control" id="nafas" value="" placeholder="x/menit">
                                          <span class="help-block"></span>
                                        </div>
                                      </div>

                                      <div class="col-md-6">
                                        <label class="control-label mb-10 text-left">SPO2<span class="help"></span></label>
                                        <div class="has-success">
                                          <input type="text" class="form-control" id="spo2" value="">
                                          <span class="help-block"></span>
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                        <label class="control-label mb-10 text-left">Kejadian Di Transfer<span class="help"></span></label>
                                        <div class="has-success">
                                          <textarea class="form-control" id="kejadian" cols="30" rows="5"></textarea>
                                          <span class="help-block"></span>
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                        <label class="control-label mb-10 text-left">Tindakan/Pemberian Obat-obatan<span class="help"></span></label>
                                        <div class="has-success">
                                          <textarea class="form-control" id="tindakan_obat" cols="30" rows="5"></textarea>
                                          <span class="help-block"></span>
                                        </div>
                                      </div>
                                    </div>

                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer mb-5 mr-5 mt-10">
                                <button class="btn btn-success btn-anim  btn-sm" onclick="simpan_tindakan()" type="submit" style="margin-right: 40px;" id="simpanKunjungan"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="modal fade" id="edit" role="dialog" aria-labelledby="newPeternakModallabel" aria-hidden="true">
                          <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="newPeternakModallabel">Edit Obat High Alert</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>

                              <div class="modal-body">
                                <div class="form-group">
                                  <div class="row">
                                    <div class="col-md-12">
                                      <input type="hidden" class="form-control" value="<?= $id_pelayanan ?>" id="inPel">
                                      <input type="hidden" class="form-control" value="<?= $id_history ?>" id="inHis">
                                      <input type="hidden" class="form-control" id="id_form">
                                      <div class="col-md-6">
                                        <label class="control-label mb-10 text-left">GCS<span class="help"></span></label>
                                        <div class="has-success">
                                          <input type="number" step="any" class="form-control" id="up_gcs" value="">
                                          <span class="help-block"></span>
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                        <label class="control-label mb-10 text-left">Tensi<span class="help"></span></label>
                                        <div class="has-success">
                                          <input type="number" step="any" class="form-control" id="up_tensi" value="" placeholder="mmHg">
                                          <span class="help-block"></span>
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                        <label class="control-label mb-10 text-left">Nadi<span class="help"></span></label>
                                        <div class="has-success">
                                          <input type="number" step="any" class="form-control" id="up_nadi" value="" placeholder="x/menit">
                                          <span class="help-block"></span>
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                        <label class="control-label mb-10 text-left">Suhu<span class="help"></span></label>
                                        <div class="has-success">
                                          <input type="number" step="any" class="form-control" id="up_suhu" value="" placeholder="Celcius">
                                          <span class="help-block"></span>
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                        <label class="control-label mb-10 text-left">Pernapasan<span class="help"></span></label>
                                        <div class="has-success">
                                          <input type="number" step="any" class="form-control" id="up_nafas" value="" placeholder="x/menit">
                                          <span class="help-block"></span>
                                        </div>
                                      </div>

                                      <div class="col-md-6">
                                        <label class="control-label mb-10 text-left">SPO2<span class="help"></span></label>
                                        <div class="has-success">
                                          <input type="text" class="form-control" id="up_spo2" value="">
                                          <span class="help-block"></span>
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                        <label class="control-label mb-10 text-left">Kejadian Di Transfer<span class="help"></span></label>
                                        <div class="has-success">
                                          <textarea class="form-control" id="up_kejadian" cols="30" rows="5"></textarea>
                                          <span class="help-block"></span>
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                        <label class="control-label mb-10 text-left">Tindakan/Pemberian Obat-obatan<span class="help"></span></label>
                                        <div class="has-success">
                                          <textarea class="form-control" id="up_tindakan_obat" cols="30" rows="5"></textarea>
                                          <span class="help-block"></span>
                                        </div>
                                      </div>
                                    </div>

                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer mb-5 mr-5 mt-10">
                                <button class="btn btn-success btn-anim  btn-sm" onclick="edit()" type="submit" style="margin-right: 40px;" id="simpanKunjungan"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
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
    </div>
  </div>
</div>

<script type="text/javascript">
  function simpan() {
    id_pelayanan = $('#inPel').val();
    id_history = $('#inHis').val();
    no_rm = $('#inNoRM').val();
    gawat = $('input[name="gawat"]:checked').val();
    nama_supir = $('#nama_supir').val();
    nama_tm = $('#nama_tm').val();
    tgl = $('#tgl').val();
    jenis_kasus = $('input[name="jenis_kasus"]:checked').val();
    berangkat = $('#berangkat').val();
    tujuan = $('#tujuan').val();
    jam_brgkt = $('#jam_brgkt').val();
    jam_tiba = $('#jam_tiba').val();
    ale_obat = $('input[name="ale_obat"]:checked').val();


    dataString = 'no_rm=' + no_rm + '&id_pelayanan=' + id_pelayanan + '&id_history=' + id_history +
      '&gawat=' + gawat + '&nama_supir=' + nama_supir +
      '&nama_tm=' + nama_tm + '&tgl=' + tgl + '&jenis_kasus=' + jenis_kasus + '&berangkat=' + berangkat + '&tujuan=' + tujuan +
      '&jam_brgkt=' + jam_brgkt + '&jam_tiba=' + jam_tiba + '&ale_obat=' + ale_obat;

      id_pel = "<?php echo urlencode(base64_encode($id_pelayanan));?>";
    id_his = "<?php echo urlencode(base64_encode($id_history));?>";
    $.ajax({
      url: "<?php echo base_url() ?>Erm_observasi_transfer/insert_observasi",
      method: "POST",
      dataType: 'json',
      data: dataString,
      success: function(data) {
        if (data.status == "success") {
          window.location.href = "<?php echo base_url('erm_igd/form/') ?>" + id_pel + '/' + id_his;
        }else if (data.error) {
          // if (data.gawat != '') {
          //   $('#gawat_error').html(data.gawat);
          // }else{
          //   $('#gawat_error').html('');
          // }
          if (data.nama_supir != '') {
            $('#supir_error').html(data.nama_supir);
          } else {
            $('#supir_error').html('');
          }
          if (data.nama_tm != '') {
            $('#tm_error').html(data.nama_tm);
          } else {
            $('#tm_error').html('');
          }
          if (data.tgl != '') {
            $('#tgl_error').html(data.tgl);
          } else {
            $('#tgl_error').html('');
          }
          if (jenis_kasus == ''|| jenis_kasus==null) {
            $('#kasus_error').html('*wajib diisi');
          } else {
            $('#kasus_error').html('');
          }
          if (gawat == ''|| gawat==null) {
            $('#gawat_error').html('*wajib diisi');
          } else {
            $('#gawat_error').html('');
          }
          if (data.berangkat != '') {
            $('#brgkt_error').html(data.berangkat);
          } else {
            $('#brgkt_error').html('');
          }
          if (data.tujuan != '') {
            $('#tuj_error').html(data.tujuan);
          } else {
            $('#tuj_error').html('');
          }
          if (data.jam_brgkt != '') {
            $('#jamb_error').html(data.jam_brgkt);
          } else {
            $('#jamb_error').html('');
          }
          if (data.jam_tiba != '') {
            $('#jamt_error').html(data.jam_tiba);
          } else {
            $('#jamt_error').html('');
          }
          if (ale_obat == ''|| ale_obat==null) {
            $('#alergi_error').html('*wajib diisi');
          } else {
            $('#alergi_error').html('');
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

  function simpan_tindakan() {
    id_pelayanan = $('#inPel').val();
    id_history = $('#inHis').val();
    gcs = $('#gcs').val();
    tensi = $('#tensi').val();
    nadi = $('#nadi').val();
    nafas = $('#nafas').val();
    suhu = $('#suhu').val();
    spo2 = $('#spo2').val();
    kejadian = $('#kejadian').val();
    tindakan_obat = $('#tindakan_obat').val();


    dataString = '&id_pelayanan=' + id_pelayanan + '&id_history=' + id_history +
      '&gcs=' + gcs + '&tensi=' + tensi + '&nadi=' + nadi + '&nafas=' + nafas +
      '&suhu=' + suhu + '&spo2=' + spo2 + '&kejadian=' + kejadian +
      '&tindakan_obat=' + tindakan_obat;


    $.ajax({
      url: "<?php echo base_url() ?>Erm_observasi_transfer/insert_obat_observasi",
      method: "POST",
      dataType: 'json',
      data: dataString,
      success: function(data) {
        if (data.status == "success") {

          swal({
            title: "good job!",
            type: "success",
            text: "Data Berhasil ditambah",
            confirmButtonColor: "#3cb878",
          });

          $("#newPeternakModal").modal('hide');
          $('#tabel_terapi').DataTable().ajax.reload();
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

  function hapus_tindakan(id) { //utk hapus diagnosa pasien
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
          url: "<?php echo base_url() ?>Erm_observasi_transfer/hapus_obat_observasi",
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
              $('#tabel_terapi').DataTable().ajax.reload();
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

  function pilih(id) {
    $('#id_form').val(id);
    $.ajax({
      url: "<?php echo base_url() ?>Erm_observasi_transfer/get_obat_observasi",
      method: "POST",
      dataType: 'json',
      data: {
        id: id
      },
      success: function(data) {
        $('#up_gcs').val(data.gcs);
        $('#up_tensi').val(data.tensi);
        $('#up_nadi').val(data.nadi);
        $('#up_nafas').val(data.nafas);
        $('#up_suhu').val(data.suhu);
        $('#up_spo2').val(data.spo2);
        $('#up_kejadian').val(data.kejadian);
        $('#up_tindakan_obat').val(data.tindakan_obat);
        $("#edit").modal('show');
        $('#tabel_terapi').DataTable().ajax.reload();

      }

    });
    return false;
  }

  function edit() {
    id_form = $('#id_form').val();
    gcs = $('#up_gcs').val();
    tensi = $('#up_tensi').val();
    nadi = $('#up_nadi').val();
    nafas = $('#up_nafas').val();
    suhu = $('#up_suhu').val();
    spo2 = $('#up_spo2').val();
    kejadian = $('#up_kejadian').val();
    tindakan_obat = $('#up_tindakan_obat').val();

    dataString = '&id_form=' + id_form +
      '&gcs=' + gcs + '&tensi=' + tensi + '&nadi=' + nadi + '&nafas=' + nafas +
      '&suhu=' + suhu + '&spo2=' + spo2 + '&kejadian=' + kejadian +
      '&tindakan_obat=' + tindakan_obat;


    $.ajax({
      url: "<?php echo base_url() ?>Erm_observasi_transfer/edit_obat_observasi",
      method: "POST",
      dataType: 'json',
      data: dataString,
      success: function(data) {
        if (data.status == "success") {
          swal({
            title: "good job!",
            type: "success",
            text: "Data Berhasil diedit",
            confirmButtonColor: "#3cb878",
          });

          $("#edit").modal('hide');
          $('#tabel_terapi').DataTable().ajax.reload();
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
<script>
  $(document).ready(function() {
    id_pelayanan = $('#inPel').val();
    id_history = $('#inHis').val();
    reload_data_id_pel(id_pelayanan, id_history);
  });

  function reload_data_id_pel(id_pelayanan, id_history) { //utk reload data diagnosa pasien jika berhasil
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
        "url": '<?php echo base_url('Erm_observasi_transfer/tampil_list_obat_observasi/'); ?>',
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
</script>