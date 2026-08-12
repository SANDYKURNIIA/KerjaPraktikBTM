<<<<<<< HEAD
<div class="row">
  <div class="col-sm-12">
    <div class="panel panel-default card-view">
      <div class="panel-heading">
        <div class="pull-left">
          <h6 class="panel-title txt-dark">DAFTAR INFUS SEHARI</h6>
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
                      <!-- <input type="text" class="form-control" id="umur" disabled>  -->
                        <input type="text" class="form-control" id="diagnosis" value="<?php
                                                                                    $tanggal = new DateTime($tgl_lahir);
                                                                                    $today = new DateTime();
                                                                                    $y = $today->diff($tanggal)->y;
                                                                                    echo  $y . " tahun, " . $jenis_kelamin;  ?>" disabled> 
                      <span class="help-block"></span>
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                            <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                        </div>
                <div class="form-group">
                  <div class="col-md-6">
                    <label class="control-label mb-10 text-left">Tanggal : <span class="help"></span></label>
                    <span id="tanggal_error" class="text-danger"></span>
                    <div class="has-success">
                      <input type="date" class="form-control" id="inTgl" name="inTgl">
                      <span class="help-block"></span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-6">
                    <label class="control-label mb-10 text-left">Mulai Pukul : <span class="help"></span></label>
                    <span id="pukul_error" class="text-danger"></span>
                    <div class="has-success">
                      <input type="time" class="form-control" id="inPukul" name="inPukul">
                      <span class="help-block"></span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-6">
                    <label class="control-label mb-10 text-left">Isi<span class="help"></span></label>
                    <span id="isi_error" class="text-danger"></span>
                    <div class="has-success">
                      <textarea class="form-control" cols="10" rows="10" id="inIsi" name="inIsi"></textarea>
                      <span class="help-block text-danger"></span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-6">
                    <label class="control-label mb-10 text-left">Laporan<span class="help"></span></label>
                    <span id="laporan_error" class="text-danger"></span>
                    <div class="has-success">
                      <textarea class="form-control" cols="10" rows="10" id="inLaporan" name="inLaporan"></textarea>
                      <span class="help-block text-danger"></span>
                    </div>
                  </div>
                </div>                        
                
                        <div class="col-md-12">
                            <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                        </div>
                       

                       
                        <div class="col-md-4">
                            <label class="control-label">Perawat</label>
                            <br />
                            <div class="row">
                                <button data-toggle="modal" data-target="#modal_ttd" id="modal_ttd0" aria-expanded="false" aria-controls="poli_sore" class="btn btn-primary btn-anim btn-sm"><i class="icon-rocket"></i><span class="btn-text">TANDA TANGAN</span></button>
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
                        <div class="col-md-1">
                            <label class="control-label"></label>
                            <br />
                            <div class="row">
                                <button data-toggle="modal" disabled data-target="#modal_ttd1" aria-expanded="false" aria-controls="poli_sore" class="btn"></span></button>
                                <button class="btn" disabled id="sig-clearBtn1"></button>
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
                    <button id="simpan" onclick="simpan()" type="submit" class="btn btn-success mb-4">Simpan</button>
                    <button style="display: none;" id="edit" type="submit" class="btn btn-warning mb-4" onclick="edit()">Edit</button>
                    <button style="display: none;" id="cetak" type="submit" class="btn btn-primary mb-4" onclick="cetak()">Cetak</button>
                  </div>
                </div>
              
            </div>
          </div>
        </div>
      </div>

    </div></div></div></div>
    <div class="panel panel-default card-view">
      <div class="panel-heading">
        <div class="pull-left">
          <h6 class="panel-title txt-dark">INFUS SEHARI</h6>
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
                        <th>HAPUS</th>
                        <th>TANGGAL</th>
                        <th>ISI</th>
                        <th>MULAI PUKUL</th>
                        <th>LAPORAN</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr class="bg-success">
                        <th>NO</th>
                        <th>PILIH</th>
                        <th>HAPUS</th>
                        <th>TANGGAL</th>
                        <th>ISI</th>
                        <th>MULAI PUKUL</th>
                        <th>LAPORAN</th>
                      </tr>
                    </tfoot>
                    <tbody style="color: black">

                    </tbody>
                  </table>
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
        "url": '<?php echo base_url('Erm_ranap_infus_sehari/tampil_list_per_id'); ?>',
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
  function simpan() {
		id_pelayanan = $("#inPel").val();
		id_history = $("#inHis").val();
    tanggal = $("#inTgl").val();
    mulai_pukul = $("#inPukul").val();
		laporan = $("#inLaporan").val();
    isi = $("#inIsi").val();
    no_rm = $('#inNoRM').val();
    canvas = document.getElementById('can');
    ttd = canvas.toDataURL("image/png");
		
    dataString = 'tanggal=' + tanggal + '&mulai_pukul=' + mulai_pukul + '&laporan=' + laporan + '&no_rm=' + no_rm + '&isi=' + isi + '&id_pelayanan=' + id_pelayanan + '&id_history=' + id_history +
      '&ttd=' + ttd;

    $.ajax({
      url: "<?php echo base_url() ?>Erm_ranap_infus_sehari/insert_infus",
      method: "POST",
      dataType: 'json',
      data: dataString,
      success: function(data) {
        if (data.status == "success") {
          window.location.href = "<?php echo base_url('Erm_ranap_infus_sehari/forminfus/') ?>" + id_pelayanan+'/'+id_history;
        } else if (data.error) {
          if (tanggal == '' | tanggal == null) {
            $('#tanggal_error').html('*wajib diisi');
          } else {
            $('#tanggal_error').html('');
          }
          if (mulai_pukul == '' | mulai_pukul == null) {
            $('#pukul_error').html('*wajib diisi');
          } else {
            $('#pukul_error').html('');
          }
          if (laporan == '' | laporan == null) {
            $('#laporan_error').html('*wajib diisi');
          } else {
            $('#laporan_error').html('');
          }
          if (isi == '' | isi == null) {
            $('#isi_error').html('*wajib diisi');
          } else {
            $('#isi_error').html('');
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
  function pilih(id) {
    $('#id').val(id);
    $.ajax({
      url: "<?php echo base_url() ?>Erm_ranap_infus_sehari/getPerRencana",
      method: "POST",
      dataType: 'json',
      data: {
        id: id
      },
      success: function(data) {
        if (data.status_dt == "found") {
          $('#id').val(data.id_infus);
          $('#inTgl').val(data.tanggal);
          $('#inLaporan').val(data.laporan);
          $('#inPukul').val(data.mulai_pukul);
          $('#inIsi').val(data.isi);
          $('#edit').show();
          // $('#cetak').show();
          $('#simpan').hide();
          document.querySelector('#sig-clearBtn').disabled = true;
          document.querySelector('#sig-clearBtn1').disabled = true;
          document.querySelector('#sig-clearBtn2').disabled = true;
          document.querySelector('#modal_ttd0').disabled = true;
          document.querySelector('#modal_ttd1').disabled = true;
          document.querySelector('#modal_ttd2').disabled = true;

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
                        			steps.push(  ctx.getImageData(0,0,canvas.width,canvas.height)); 
                    }
                    img2.src = "<?php echo base_url(); ?>" + data.ttd2;
          $('#can').show();
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
  function hapus(id) { //utk hapus diagnosa pasien
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
          url: "<?php echo base_url() ?>Erm_ranap_infus_sehari/hapus_infus",
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
  function edit() {
    id = $("#id").val();
		id_pelayanan = $("#inPel").val();
		id_history = $("#inHis").val();
    tanggal = $("#inTgl").val();
    mulai_pukul = $("#inPukul").val();
		laporan = $("#inLaporan").val();
    isi = $("#inIsi").val();
    no_rm = $('#inNoRM').val();
    canvas = document.getElementById('can');
    ttd = canvas.toDataURL("image/png");
		
    dataString = 'tanggal=' + tanggal + '&mulai_pukul=' + mulai_pukul + '&laporan=' + laporan + '&no_rm=' + no_rm + '&isi=' + isi + '&id_pelayanan=' + id_pelayanan + '&id_history=' + id_history +
      '&ttd=' + ttd + '&id=' + id;

    $.ajax({
      url: "<?php echo base_url() ?>Erm_ranap_infus_sehari/edit_infus",
      method: "POST",
      dataType: 'json',
      data: dataString,
      success: function(data) {
        if (data.status == "success") {
          window.location.href = "<?php echo base_url('Erm_ranap_infus_sehari/forminfus/') ?>" + id_pelayanan+'/'+id_history;
        } else if (data.error) {
            if (tanggal == '' | tanggal == null) {
              $('#tanggal_error').html('*wajib diisi');
            } else {
              $('#tanggal_error').html('');
            }
            if (mulai_pukul == '' | mulai_pukul == null) {
              $('#pukul_error').html('*wajib diisi');
            } else {
              $('#pukul_error').html('');
            }
            if (laporan == '' | laporan == null) {
              $('#laporan_error').html('*wajib diisi');
            } else {
              $('#laporan_error').html('');
            }
            if (isi == '' | isi == null) {
              $('#isi_error').html('*wajib diisi');
            } else {
              $('#isi_error').html('');
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
  
=======
<div class="row">
  <div class="col-sm-12">
    <div class="panel panel-default card-view">
      <div class="panel-heading">
        <div class="pull-left">
          <h6 class="panel-title txt-dark">DAFTAR INFUS SEHARI</h6>
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
                      <!-- <input type="text" class="form-control" id="umur" disabled>  -->
                        <input type="text" class="form-control" id="diagnosis" value="<?php
                                                                                    $tanggal = new DateTime($tgl_lahir);
                                                                                    $today = new DateTime();
                                                                                    $y = $today->diff($tanggal)->y;
                                                                                    echo  $y . " tahun, " . $jenis_kelamin;  ?>" disabled> 
                      <span class="help-block"></span>
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                            <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                        </div>
                <div class="form-group">
                  <div class="col-md-6">
                    <label class="control-label mb-10 text-left">Tanggal : <span class="help"></span></label>
                    <span id="tanggal_error" class="text-danger"></span>
                    <div class="has-success">
                      <input type="date" class="form-control" id="inTgl" name="inTgl">
                      <span class="help-block"></span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-6">
                    <label class="control-label mb-10 text-left">Mulai Pukul : <span class="help"></span></label>
                    <span id="pukul_error" class="text-danger"></span>
                    <div class="has-success">
                      <input type="time" class="form-control" id="inPukul" name="inPukul">
                      <span class="help-block"></span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-6">
                    <label class="control-label mb-10 text-left">Isi<span class="help"></span></label>
                    <span id="isi_error" class="text-danger"></span>
                    <div class="has-success">
                      <textarea class="form-control" cols="10" rows="10" id="inIsi" name="inIsi"></textarea>
                      <span class="help-block text-danger"></span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-6">
                    <label class="control-label mb-10 text-left">Laporan<span class="help"></span></label>
                    <span id="laporan_error" class="text-danger"></span>
                    <div class="has-success">
                      <textarea class="form-control" cols="10" rows="10" id="inLaporan" name="inLaporan"></textarea>
                      <span class="help-block text-danger"></span>
                    </div>
                  </div>
                </div>                        
                
                        <div class="col-md-12">
                            <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                        </div>
                       

                       
                        <div class="col-md-4">
                            <label class="control-label">Perawat</label>
                            <br />
                            <div class="row">
                                <button data-toggle="modal" data-target="#modal_ttd" id="modal_ttd0" aria-expanded="false" aria-controls="poli_sore" class="btn btn-primary btn-anim btn-sm"><i class="icon-rocket"></i><span class="btn-text">TANDA TANGAN</span></button>
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
                        <div class="col-md-1">
                            <label class="control-label"></label>
                            <br />
                            <div class="row">
                                <button data-toggle="modal" disabled data-target="#modal_ttd1" aria-expanded="false" aria-controls="poli_sore" class="btn"></span></button>
                                <button class="btn" disabled id="sig-clearBtn1"></button>
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
                    <button id="simpan" onclick="simpan()" type="submit" class="btn btn-success mb-4">Simpan</button>
                    <button style="display: none;" id="edit" type="submit" class="btn btn-warning mb-4" onclick="edit()">Edit</button>
                    <button style="display: none;" id="cetak" type="submit" class="btn btn-primary mb-4" onclick="cetak()">Cetak</button>
                  </div>
                </div>
              
            </div>
          </div>
        </div>
      </div>

    </div></div></div></div>
    <div class="panel panel-default card-view">
      <div class="panel-heading">
        <div class="pull-left">
          <h6 class="panel-title txt-dark">INFUS SEHARI</h6>
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
                        <th>HAPUS</th>
                        <th>TANGGAL</th>
                        <th>ISI</th>
                        <th>MULAI PUKUL</th>
                        <th>LAPORAN</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr class="bg-success">
                        <th>NO</th>
                        <th>PILIH</th>
                        <th>HAPUS</th>
                        <th>TANGGAL</th>
                        <th>ISI</th>
                        <th>MULAI PUKUL</th>
                        <th>LAPORAN</th>
                      </tr>
                    </tfoot>
                    <tbody style="color: black">

                    </tbody>
                  </table>
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
        "url": '<?php echo base_url('Erm_ranap_infus_sehari/tampil_list_per_id'); ?>',
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
  function simpan() {
		id_pelayanan = $("#inPel").val();
		id_history = $("#inHis").val();
    tanggal = $("#inTgl").val();
    mulai_pukul = $("#inPukul").val();
		laporan = $("#inLaporan").val();
    isi = $("#inIsi").val();
    no_rm = $('#inNoRM').val();
    canvas = document.getElementById('can');
    ttd = canvas.toDataURL("image/png");
		
    dataString = 'tanggal=' + tanggal + '&mulai_pukul=' + mulai_pukul + '&laporan=' + laporan + '&no_rm=' + no_rm + '&isi=' + isi + '&id_pelayanan=' + id_pelayanan + '&id_history=' + id_history +
      '&ttd=' + ttd;

    $.ajax({
      url: "<?php echo base_url() ?>Erm_ranap_infus_sehari/insert_infus",
      method: "POST",
      dataType: 'json',
      data: dataString,
      success: function(data) {
        if (data.status == "success") {
          window.location.href = "<?php echo base_url('Erm_ranap_infus_sehari/forminfus/') ?>" + id_pelayanan+'/'+id_history;
        } else if (data.error) {
          if (tanggal == '' | tanggal == null) {
            $('#tanggal_error').html('*wajib diisi');
          } else {
            $('#tanggal_error').html('');
          }
          if (mulai_pukul == '' | mulai_pukul == null) {
            $('#pukul_error').html('*wajib diisi');
          } else {
            $('#pukul_error').html('');
          }
          if (laporan == '' | laporan == null) {
            $('#laporan_error').html('*wajib diisi');
          } else {
            $('#laporan_error').html('');
          }
          if (isi == '' | isi == null) {
            $('#isi_error').html('*wajib diisi');
          } else {
            $('#isi_error').html('');
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
  function pilih(id) {
    $('#id').val(id);
    $.ajax({
      url: "<?php echo base_url() ?>Erm_ranap_infus_sehari/getPerRencana",
      method: "POST",
      dataType: 'json',
      data: {
        id: id
      },
      success: function(data) {
        if (data.status_dt == "found") {
          $('#id').val(data.id_infus);
          $('#inTgl').val(data.tanggal);
          $('#inLaporan').val(data.laporan);
          $('#inPukul').val(data.mulai_pukul);
          $('#inIsi').val(data.isi);
          $('#edit').show();
          // $('#cetak').show();
          $('#simpan').hide();
          document.querySelector('#sig-clearBtn').disabled = true;
          document.querySelector('#sig-clearBtn1').disabled = true;
          document.querySelector('#sig-clearBtn2').disabled = true;
          document.querySelector('#modal_ttd0').disabled = true;
          document.querySelector('#modal_ttd1').disabled = true;
          document.querySelector('#modal_ttd2').disabled = true;

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
                        			steps.push(  ctx.getImageData(0,0,canvas.width,canvas.height)); 
                    }
                    img2.src = "<?php echo base_url(); ?>" + data.ttd2;
          $('#can').show();
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
  function hapus(id) { //utk hapus diagnosa pasien
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
          url: "<?php echo base_url() ?>Erm_ranap_infus_sehari/hapus_infus",
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
  function edit() {
    id = $("#id").val();
		id_pelayanan = $("#inPel").val();
		id_history = $("#inHis").val();
    tanggal = $("#inTgl").val();
    mulai_pukul = $("#inPukul").val();
		laporan = $("#inLaporan").val();
    isi = $("#inIsi").val();
    no_rm = $('#inNoRM').val();
    canvas = document.getElementById('can');
    ttd = canvas.toDataURL("image/png");
		
    dataString = 'tanggal=' + tanggal + '&mulai_pukul=' + mulai_pukul + '&laporan=' + laporan + '&no_rm=' + no_rm + '&isi=' + isi + '&id_pelayanan=' + id_pelayanan + '&id_history=' + id_history +
      '&ttd=' + ttd + '&id=' + id;

    $.ajax({
      url: "<?php echo base_url() ?>Erm_ranap_infus_sehari/edit_infus",
      method: "POST",
      dataType: 'json',
      data: dataString,
      success: function(data) {
        if (data.status == "success") {
          window.location.href = "<?php echo base_url('Erm_ranap_infus_sehari/forminfus/') ?>" + id_pelayanan+'/'+id_history;
        } else if (data.error) {
            if (tanggal == '' | tanggal == null) {
              $('#tanggal_error').html('*wajib diisi');
            } else {
              $('#tanggal_error').html('');
            }
            if (mulai_pukul == '' | mulai_pukul == null) {
              $('#pukul_error').html('*wajib diisi');
            } else {
              $('#pukul_error').html('');
            }
            if (laporan == '' | laporan == null) {
              $('#laporan_error').html('*wajib diisi');
            } else {
              $('#laporan_error').html('');
            }
            if (isi == '' | isi == null) {
              $('#isi_error').html('*wajib diisi');
            } else {
              $('#isi_error').html('');
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
  
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
</script>