<<<<<<< HEAD
<div class="panel panel-default card-view">
    <div class="panel-heading">
        <div class="pull-left">
            <h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">RIWAYAT PERMINTAAN UNIT</span></h6>
        </div>

        <div class="clearfix"></div>
    </div>
    <div class="panel-wrapper collapse in">
        <div class="panel-body">
            <form id="form-filter" class="form-horizontal">
                <div class="form-group">
                    <label for="tanggal_masuk" class="col-sm-2 control-label">Dari Tanggal</label>
                    <div class="col-md-2 has-error">
                        <input type="date" class="form-control" id="tanggal_masuk">
                    </div>
                    <label for="tanggal_keluar" class="col-sm-2 control-label">Sampai Tanggal</label>
                    <div class="col-md-2 has-error">
                        <input type="date" class="form-control" id="tanggal_keluar">
                    </div>
                </div>
                
                <!-- <div class="form-group">

        </div> -->
                <div class="form-group">
                    <label for="LastName" class="col-sm-6 control-label"></label>
                    <label for="LastName" class="col-sm-6 control-label"></label>
                    <label for="LastName" class="col-sm-6 control-label"></label>
                    <label for="LastName" class="col-sm-6 control-label"></label>
                    <label for="LastName" class="col-sm-6 control-label"></label>
                    <label for="LastName" class="col-sm-6 control-label"></label>

                    <div class="col-sm-6">
                        <button type="button" id="btn-filter" class="btn btn-primary">Cari</button>
                        <button type="button" id="btn-reset" class="btn btn-default">Reset</button>
                    </div>
                </div>

            </form>
            <div class="table-wrap">
                <div class="table-responsive">
                    <table id="datable" class="table table-hover display  pb-30">
                        <thead>
                            <tr class="bg-success">
                                <th>NO</th>
                                <th>RESPON</th>
                                <th>TANGGAL PERMINTAAN</th>
                                <th>JAM PERMINTAAN</th>
                                <th>UNIT</th>
                                <th>KETERANGAN</th>
                                <th>NAMA</th>

                            </tr>
                        </thead>
                        <tbody style="color: black;">

                        </tbody>
                        <tfoot>
                            <tr class="bg-success">
                                <th>NO</th>
                                <th>RESPON</th>
                                <th>TANGGAL PERMINTAAN</th>
                                <th>JAM PERMINTAAN</th>
                                <th>UNIT</th>
                                <th>KETERANGAN</th>
                                <th>NAMA</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
  var table;

  $(document).ready(function() {

    //datatables
    $('#datable').dataTable().fnClearTable();
    $('#datable').dataTable().fnDestroy();
    table = $('#datable').DataTable({
      "processing": true, //Feature control the processing indicator.
      // "serverSide": true, //Feature control DataTables' server-side processing mode.
      "order": [], //Initial no order.


      // Load data for the table's content from an Ajax source
      "ajax": {
        "url": "<?php echo site_url('Laporan/tampil_data_pasien_rajal') ?>",
        "type": "POST",
        "data": function(data) {
          data.tanggal_masuk = $('#tanggal_masuk').val();
          data.tanggal_keluar = $('#tanggal_keluar').val();
        }
      },
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
          "sLast": "Terakhir"
        },
      },
      //Set column definition initialisation properties.
      "columnDefs": [{
        "targets": [0], //first column / numbering column
        "orderable": false, //set not orderable
      }, ],

    });

  
    $('#btn-filter').click(function() { //button filter event click
      table.ajax.reload(); //just reload table
    });
    $('#btn-reset').click(function() { //button reset event click
      $('#form-filter')[0].reset();
      table.ajax.reload(); //just reload table
    });


  });
=======
<div class="panel panel-default card-view">
    <div class="panel-heading">
        <div class="pull-left">
            <h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">RIWAYAT PERMINTAAN UNIT</span></h6>
        </div>

        <div class="clearfix"></div>
    </div>
    <div class="panel-wrapper collapse in">
        <div class="panel-body">
            <form id="form-filter" class="form-horizontal">
                <div class="form-group">
                    <label for="tanggal_masuk" class="col-sm-2 control-label">Dari Tanggal</label>
                    <div class="col-md-2 has-error">
                        <input type="date" class="form-control" id="tanggal_masuk">
                    </div>
                    <label for="tanggal_keluar" class="col-sm-2 control-label">Sampai Tanggal</label>
                    <div class="col-md-2 has-error">
                        <input type="date" class="form-control" id="tanggal_keluar">
                    </div>
                </div>
                
                <!-- <div class="form-group">

        </div> -->
                <div class="form-group">
                    <label for="LastName" class="col-sm-6 control-label"></label>
                    <label for="LastName" class="col-sm-6 control-label"></label>
                    <label for="LastName" class="col-sm-6 control-label"></label>
                    <label for="LastName" class="col-sm-6 control-label"></label>
                    <label for="LastName" class="col-sm-6 control-label"></label>
                    <label for="LastName" class="col-sm-6 control-label"></label>

                    <div class="col-sm-6">
                        <button type="button" id="btn-filter" class="btn btn-primary">Cari</button>
                        <button type="button" id="btn-reset" class="btn btn-default">Reset</button>
                    </div>
                </div>

            </form>
            <div class="table-wrap">
                <div class="table-responsive">
                    <table id="datable" class="table table-hover display  pb-30">
                        <thead>
                            <tr class="bg-success">
                                <th>NO</th>
                                <th>RESPON</th>
                                <th>TANGGAL PERMINTAAN</th>
                                <th>JAM PERMINTAAN</th>
                                <th>UNIT</th>
                                <th>KETERANGAN</th>
                                <th>NAMA</th>

                            </tr>
                        </thead>
                        <tbody style="color: black;">

                        </tbody>
                        <tfoot>
                            <tr class="bg-success">
                                <th>NO</th>
                                <th>RESPON</th>
                                <th>TANGGAL PERMINTAAN</th>
                                <th>JAM PERMINTAAN</th>
                                <th>UNIT</th>
                                <th>KETERANGAN</th>
                                <th>NAMA</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
  var table;

  $(document).ready(function() {

    //datatables
    $('#datable').dataTable().fnClearTable();
    $('#datable').dataTable().fnDestroy();
    table = $('#datable').DataTable({
      "processing": true, //Feature control the processing indicator.
      // "serverSide": true, //Feature control DataTables' server-side processing mode.
      "order": [], //Initial no order.


      // Load data for the table's content from an Ajax source
      "ajax": {
        "url": "<?php echo site_url('Laporan/tampil_data_pasien_rajal') ?>",
        "type": "POST",
        "data": function(data) {
          data.tanggal_masuk = $('#tanggal_masuk').val();
          data.tanggal_keluar = $('#tanggal_keluar').val();
        }
      },
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
          "sLast": "Terakhir"
        },
      },
      //Set column definition initialisation properties.
      "columnDefs": [{
        "targets": [0], //first column / numbering column
        "orderable": false, //set not orderable
      }, ],

    });

  
    $('#btn-filter').click(function() { //button filter event click
      table.ajax.reload(); //just reload table
    });
    $('#btn-reset').click(function() { //button reset event click
      $('#form-filter')[0].reset();
      table.ajax.reload(); //just reload table
    });


  });
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
</script>