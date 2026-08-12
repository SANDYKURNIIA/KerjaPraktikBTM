<<<<<<< HEAD
<style>
  .footer{
    position: relative;
  }
</style>

<div class="row">
  <div class="col-sm-12">
    <div class="panel panel-default card-view">
      <div class="panel-heading">
        <div class="pull-left">
          <h6 class="panel-title txt-dark">APS</h6>
        </div>
        <div class="clearfix"></div>
      </div>
      <div class="panel-wrapper collapse in" id="myDiv">
        <div class="panel-body">
          <div class="form-wrap">

            <div class="form-group">
              <form id="formUpload">
                <input type="hidden" class="form-control" value="<?= $id_pelayanan ?>" name="inPel" id="inPel">
                <input type="hidden" class="form-control" value="<?= $id_history ?>" name="inHis" id="inHis">
                <input type="hidden" class="form-control" value="" id="id" name="id">
                <input type="hidden" class="form-control" name="inNoRM" id="inNoRM" value="<?= $no_rm ?>">
                <div class="form-group">
                  <div class="col-md-6">
                    <label class="control-label mb-10 text-left">Nama Pasien<span class="help"></span></label>
                    <div class="has-success">
                      <input type="text" class="form-control" id="inNama" value="<?= $nama ?>" disabled>
                      <span class="help-block"></span>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-6">
                    <label class="control-label mb-10 text-left">No RM</label><span class="help"></span></label>
                    <div class="has-success">
                      <input type="text" class="form-control" name="inNoRM" id="inNoRM" value="<?= $no_rm ?>" disabled>
                      <span class="help-block"></span>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-6">
                    <label class="control-label mb-10 text-left">Umur / Jenis Kelamin<span class="help"></span></label>
                    <div class="has-success">
                      <input type="text" class="form-control" id="diagnosis" value="<?php
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
                    <label class="control-label mb-10 text-left">Tanggal<span class="help"></span></label>
                    <span id="diagnosis_error" class="text-danger"></span>
                    <div class="has-success">
                      <input type="date" class="form-control" id="inTgl" name="tanggal">
                      <span class="help-block"></span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-6">
                    <label class="control-label mb-10 text-left">Keterangan Hasil<span class="help"></span></label>
                    <div class="has-success">
                      <textarea class="form-control" cols="10" rows="10" id="inKet" name="ket"></textarea>
                      <span class="help-block text-danger"></span>
                    </div>
                  </div>
                </div>



                </div>
                <div class="form-group">
                  <div class="col-md-6">
                    <label class="control-label mb-10 text-left">Nama DPJP<span class="help"></span></label>
                    <span id="diagnosis_error" class="text-danger"></span>
                    <div class="has-success">
                      <select name="dpjp" id="inDPJP" class="select2 form-control"></select>
                      <span class="help-block"></span>
                    </div>
                  </div>
                </div>


                <div class="col-sm-6">
                  <div class="form-group">
                    <i class="fa fa-upload"></i>
                    <span class="btn-text">Upload</span>
                    <input type="file" class="upload" name="filefoto" id="filefoto">
                    <div class="pt-20" style="color:#e84a5f;">*File tidak boleh lebih besar
													dari
													5 mb, dan hanya berformat .jpg |.png |.jpeg |</div>
                    <span class="help-block text-danger"></span>
                  </div>
                </div>

                <div class="form-group text-center" style="margin-top: 30px;">
                  <div class="col-md-12">
                    <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                  </div>
                  <div class="col-md-6">
                    <a class="btn btn-default btn-anim  btn-sm" onclick="javascript:history.go(-1)" style="margin-right: 20px; margin-left: 30px;"><i class="fa fa-arrow-left"></i><span class="btn-text">KEMBALI</span></a>
                    <button id="btnSimpan" type="submit" class="btn btn-success mb-4">Simpan</button>
                    <button style="display: none;" id="edit" type="submit" class="btn btn-warning mb-4">Edit</button>
                    <button style="display: none;" id="cetak" type="submit" class="btn btn-primary mb-4" onclick="cetak()">Cetak</button>
                  </div>
                </div>
                </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="panel panel-default card-view">
      <div class="panel-heading">
        <div class="pull-left">
          <h6 class="panel-title txt-dark">DAFTAR UPLOAD APS</h6>
        </div>
        <div class="clearfix"></div>
      </div>
      <div class="panel-wrapper collapse in">
        <div class="panel-body">
          <div class="form-group">
            <div class="col-md-12">
              <div class="table-wrap">
                <div class="table-responsive">
                  <table class="table table-hover display  pb-60" id="tabel_upload">
                    <thead>
                      <tr class="bg-success">
                        <th>NO</th>
                        <th>PILIH</th>
                        <th>HAPUS</th>
                        <th>TANGGAL</th>
                        <th>DPJP</th>
                        <th>KETERANGAN</th>
                        <th>GAMBAR</th> 
                      </tr>
                    </thead>
                    <tfoot>
                      <tr class="bg-success">
                        <th>NO</th>
                        <th>PILIH</th>
                        <th>HAPUS</th>
                        <th>TANGGAL</th>
                        <th>DPJP</th>
                        <th>KETERANGAN</th>
                        <th>GAMBAR</th>
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

<!-- <style>
  canvas {
    cursor: crosshair;
    border: 1px solid #000000;
  }
</style> -->
<script type="text/javascript">
  $(document).ready(function(e) {
    id_pelayanan = $('#inPel').val();
    reload_data_id_pel(id_pelayanan);

      $.ajax({
        url:"<?= base_url("Erm_Aps/getDokter"); ?>",
        method:"GET",
        dataType:"JSON",
        cache:false,
        success:function(res){
          var opt = "";

          res.forEach(function(index){
            opt += "<option value='"+index.nama+"'>"+index.nama+"</option>";
          });
          $("#inDPJP").append(opt);
        }
      });


  });
</script>
<script type="text/javascript">
  
  function reload_data_id_pel(id_pelayanan) { //utk reload data diagnosa pasien jika berhasil
    $('#tabel_upload').dataTable().fnClearTable();
    $('#tabel_upload').dataTable().fnDestroy();
    $('#tabel_upload').DataTable({
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
        "url": '<?php echo base_url('Erm_Aps/tampil_data'); ?>',
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

  $("#formUpload").submit((e)=>{
    e.preventDefault();
    var formData = new FormData($("#formUpload")[0]);
    $.ajax({
      url: '<?= base_url("Erm_Aps/insert_data"); ?>',
      type: "POST",
      data: formData,
      processData: false,
      enctype: 'multipart/form-data',
      cache: false,
      contentType: false,
      dataType: 'JSON',
      success:function(data){
        if(data.status == "gagal"){
          swal({
            title: "Tersimpan!",
            text: "Data tersimpan tetapi file tidak masuk kedalam server\n"+data.msg,
            type: "success",
            confirmButtonColor: "#3cb878",
          });
        }
        if(data.status == "sukses"){
          swal({
            title: "good job!",
            type: "success",
            text: "Data berhasil disimpan\n"+data.msg,
            confirmButtonColor: "#3cb878",
          });
        }
        $('#tabel_upload').DataTable().ajax.reload();
        $("#formUpload").trigger("reset");
        $("select[id='inDPJP']").val("-").trigger("change");
      }
    });
  });

  function pilih(id) {
    $('#id').val(id);
    $.ajax({
      url: "<?= base_url("Erm_Aps/getDataUpdate") ?>",
      method: "POST",
      dataType: 'json',
      data: {
        id: id
      },
      success: function(data) {
        if(data.status == "found"){
          $("#inTgl").val(data.tanggal);
          $("#inKet").val(data.keterangan);
          $("#inDPJP").val(data.dpjp).trigger("change");
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
          });
          $("#btnSimpan").hide();
          $("#edit").show();
          $("#cetak").show();
          $("#myHapus_"+id).attr("disabled",true);
        }else{
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

  $("#edit").on("click",function(e){
    e.preventDefault();
    var formData = new FormData($("#formUpload")[0]);
    $.ajax({
      url: '<?= base_url("Erm_Aps/updateData"); ?>',
      type: "POST",
      data: formData,
      processData: false,
      enctype: 'multipart/form-data',
      cache: false,
      contentType: false,
      dataType: 'JSON',
      success:function(data){
        if(data.status == "gagal"){
          swal({
            title: "Tersimpan!",
            text: "Data tersimpan tetapi file tidak masuk kedalam server\n"+data.msg,
            type: "success",
            confirmButtonColor: "#3cb878",
          });
        }
        if(data.status == "sukses"){
          swal({
            title: "good job!",
            type: "success",
            text: "Data berhasil disimpan\n"+data.msg,
            confirmButtonColor: "#3cb878",
          });
        }
        $('#tabel_upload').DataTable().ajax.reload();
        $("#formUpload").trigger("reset");
        $("select[id='inDPJP']").val("-").trigger("change");
        $("#edit").hide();
        $("#btnSimpan").show();
        $("#cetak").hide();
      }
    });
  })

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
          url: "<?= base_url("Erm_Aps/deleteData") ?>",
          method: "POST",
          dataType: 'json',
          data: {
            id: id,
          },
          success: function(data) {
            if (data.status == "sukses") {
              swal({
                title: "good job!",
                type: "success",
                text: "Data Berhasil dihapus",
                confirmButtonColor: "#3cb878",
              });
              $('#tabel_upload').DataTable().ajax.reload();
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

  function cetak() {
    id = $('#id').val();
    window.location.href = "') ?>" + id;
  }
=======
<style>
  .footer{
    position: relative;
  }
</style>

<div class="row">
  <div class="col-sm-12">
    <div class="panel panel-default card-view">
      <div class="panel-heading">
        <div class="pull-left">
          <h6 class="panel-title txt-dark">APS</h6>
        </div>
        <div class="clearfix"></div>
      </div>
      <div class="panel-wrapper collapse in" id="myDiv">
        <div class="panel-body">
          <div class="form-wrap">

            <div class="form-group">
              <form id="formUpload">
                <input type="hidden" class="form-control" value="<?= $id_pelayanan ?>" name="inPel" id="inPel">
                <input type="hidden" class="form-control" value="<?= $id_history ?>" name="inHis" id="inHis">
                <input type="hidden" class="form-control" value="" id="id" name="id">
                <input type="hidden" class="form-control" name="inNoRM" id="inNoRM" value="<?= $no_rm ?>">
                <div class="form-group">
                  <div class="col-md-6">
                    <label class="control-label mb-10 text-left">Nama Pasien<span class="help"></span></label>
                    <div class="has-success">
                      <input type="text" class="form-control" id="inNama" value="<?= $nama ?>" disabled>
                      <span class="help-block"></span>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-6">
                    <label class="control-label mb-10 text-left">No RM</label><span class="help"></span></label>
                    <div class="has-success">
                      <input type="text" class="form-control" name="inNoRM" id="inNoRM" value="<?= $no_rm ?>" disabled>
                      <span class="help-block"></span>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-6">
                    <label class="control-label mb-10 text-left">Umur / Jenis Kelamin<span class="help"></span></label>
                    <div class="has-success">
                      <input type="text" class="form-control" id="diagnosis" value="<?php
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
                    <label class="control-label mb-10 text-left">Tanggal<span class="help"></span></label>
                    <span id="diagnosis_error" class="text-danger"></span>
                    <div class="has-success">
                      <input type="date" class="form-control" id="inTgl" name="tanggal">
                      <span class="help-block"></span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-6">
                    <label class="control-label mb-10 text-left">Keterangan Hasil<span class="help"></span></label>
                    <div class="has-success">
                      <textarea class="form-control" cols="10" rows="10" id="inKet" name="ket"></textarea>
                      <span class="help-block text-danger"></span>
                    </div>
                  </div>
                </div>



                </div>
                <div class="form-group">
                  <div class="col-md-6">
                    <label class="control-label mb-10 text-left">Nama DPJP<span class="help"></span></label>
                    <span id="diagnosis_error" class="text-danger"></span>
                    <div class="has-success">
                      <select name="dpjp" id="inDPJP" class="select2 form-control"></select>
                      <span class="help-block"></span>
                    </div>
                  </div>
                </div>


                <div class="col-sm-6">
                  <div class="form-group">
                    <i class="fa fa-upload"></i>
                    <span class="btn-text">Upload</span>
                    <input type="file" class="upload" name="filefoto" id="filefoto">
                    <div class="pt-20" style="color:#e84a5f;">*File tidak boleh lebih besar
													dari
													5 mb, dan hanya berformat .jpg |.png |.jpeg |</div>
                    <span class="help-block text-danger"></span>
                  </div>
                </div>

                <div class="form-group text-center" style="margin-top: 30px;">
                  <div class="col-md-12">
                    <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                  </div>
                  <div class="col-md-6">
                    <a class="btn btn-default btn-anim  btn-sm" onclick="javascript:history.go(-1)" style="margin-right: 20px; margin-left: 30px;"><i class="fa fa-arrow-left"></i><span class="btn-text">KEMBALI</span></a>
                    <button id="btnSimpan" type="submit" class="btn btn-success mb-4">Simpan</button>
                    <button style="display: none;" id="edit" type="submit" class="btn btn-warning mb-4">Edit</button>
                    <button style="display: none;" id="cetak" type="submit" class="btn btn-primary mb-4" onclick="cetak()">Cetak</button>
                  </div>
                </div>
                </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="panel panel-default card-view">
      <div class="panel-heading">
        <div class="pull-left">
          <h6 class="panel-title txt-dark">DAFTAR UPLOAD APS</h6>
        </div>
        <div class="clearfix"></div>
      </div>
      <div class="panel-wrapper collapse in">
        <div class="panel-body">
          <div class="form-group">
            <div class="col-md-12">
              <div class="table-wrap">
                <div class="table-responsive">
                  <table class="table table-hover display  pb-60" id="tabel_upload">
                    <thead>
                      <tr class="bg-success">
                        <th>NO</th>
                        <th>PILIH</th>
                        <th>HAPUS</th>
                        <th>TANGGAL</th>
                        <th>DPJP</th>
                        <th>KETERANGAN</th>
                        <th>GAMBAR</th> 
                      </tr>
                    </thead>
                    <tfoot>
                      <tr class="bg-success">
                        <th>NO</th>
                        <th>PILIH</th>
                        <th>HAPUS</th>
                        <th>TANGGAL</th>
                        <th>DPJP</th>
                        <th>KETERANGAN</th>
                        <th>GAMBAR</th>
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

<!-- <style>
  canvas {
    cursor: crosshair;
    border: 1px solid #000000;
  }
</style> -->
<script type="text/javascript">
  $(document).ready(function(e) {
    id_pelayanan = $('#inPel').val();
    reload_data_id_pel(id_pelayanan);

      $.ajax({
        url:"<?= base_url("Erm_Aps/getDokter"); ?>",
        method:"GET",
        dataType:"JSON",
        cache:false,
        success:function(res){
          var opt = "";

          res.forEach(function(index){
            opt += "<option value='"+index.nama+"'>"+index.nama+"</option>";
          });
          $("#inDPJP").append(opt);
        }
      });


  });
</script>
<script type="text/javascript">
  
  function reload_data_id_pel(id_pelayanan) { //utk reload data diagnosa pasien jika berhasil
    $('#tabel_upload').dataTable().fnClearTable();
    $('#tabel_upload').dataTable().fnDestroy();
    $('#tabel_upload').DataTable({
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
        "url": '<?php echo base_url('Erm_Aps/tampil_data'); ?>',
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

  $("#formUpload").submit((e)=>{
    e.preventDefault();
    var formData = new FormData($("#formUpload")[0]);
    $.ajax({
      url: '<?= base_url("Erm_Aps/insert_data"); ?>',
      type: "POST",
      data: formData,
      processData: false,
      enctype: 'multipart/form-data',
      cache: false,
      contentType: false,
      dataType: 'JSON',
      success:function(data){
        if(data.status == "gagal"){
          swal({
            title: "Tersimpan!",
            text: "Data tersimpan tetapi file tidak masuk kedalam server\n"+data.msg,
            type: "success",
            confirmButtonColor: "#3cb878",
          });
        }
        if(data.status == "sukses"){
          swal({
            title: "good job!",
            type: "success",
            text: "Data berhasil disimpan\n"+data.msg,
            confirmButtonColor: "#3cb878",
          });
        }
        $('#tabel_upload').DataTable().ajax.reload();
        $("#formUpload").trigger("reset");
        $("select[id='inDPJP']").val("-").trigger("change");
      }
    });
  });

  function pilih(id) {
    $('#id').val(id);
    $.ajax({
      url: "<?= base_url("Erm_Aps/getDataUpdate") ?>",
      method: "POST",
      dataType: 'json',
      data: {
        id: id
      },
      success: function(data) {
        if(data.status == "found"){
          $("#inTgl").val(data.tanggal);
          $("#inKet").val(data.keterangan);
          $("#inDPJP").val(data.dpjp).trigger("change");
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
          });
          $("#btnSimpan").hide();
          $("#edit").show();
          $("#cetak").show();
          $("#myHapus_"+id).attr("disabled",true);
        }else{
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

  $("#edit").on("click",function(e){
    e.preventDefault();
    var formData = new FormData($("#formUpload")[0]);
    $.ajax({
      url: '<?= base_url("Erm_Aps/updateData"); ?>',
      type: "POST",
      data: formData,
      processData: false,
      enctype: 'multipart/form-data',
      cache: false,
      contentType: false,
      dataType: 'JSON',
      success:function(data){
        if(data.status == "gagal"){
          swal({
            title: "Tersimpan!",
            text: "Data tersimpan tetapi file tidak masuk kedalam server\n"+data.msg,
            type: "success",
            confirmButtonColor: "#3cb878",
          });
        }
        if(data.status == "sukses"){
          swal({
            title: "good job!",
            type: "success",
            text: "Data berhasil disimpan\n"+data.msg,
            confirmButtonColor: "#3cb878",
          });
        }
        $('#tabel_upload').DataTable().ajax.reload();
        $("#formUpload").trigger("reset");
        $("select[id='inDPJP']").val("-").trigger("change");
        $("#edit").hide();
        $("#btnSimpan").show();
        $("#cetak").hide();
      }
    });
  })

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
          url: "<?= base_url("Erm_Aps/deleteData") ?>",
          method: "POST",
          dataType: 'json',
          data: {
            id: id,
          },
          success: function(data) {
            if (data.status == "sukses") {
              swal({
                title: "good job!",
                type: "success",
                text: "Data Berhasil dihapus",
                confirmButtonColor: "#3cb878",
              });
              $('#tabel_upload').DataTable().ajax.reload();
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

  function cetak() {
    id = $('#id').val();
    window.location.href = "') ?>" + id;
  }
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
</script>