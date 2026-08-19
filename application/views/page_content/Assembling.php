<div class="panel panel-default card-view">
    <div class="panel-heading">
        <div class="pull-left">
            <h6 class="panel-title txt-dark"><span class="span span-success">RIWAYAT PELAYANAN REKAM MEDIS</span></h6>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="panel-wrapper collapse in">
        <div class="panel-body">
            <form id="form-filter" class="form-horizontal">
                <div class="form-group">
                    <label for="tanggal_masuk" class="col-sm-2 control-label">Dari Tanggal :</label>
                    <div class="col-md-2 has-success">
                        <input type="date" class="form-control" id="tanggal_masuk">
                    </div>

                </div>
                <div class="form-group">
                    <label for="tanggal_keluar" class="col-sm-2 control-label">Sampai Tanggal :</label>
                    <div class="col-md-2 has-success">
                        <input type="date" class="form-control" id="tanggal_keluar">
                    </div>
                </div>
                <div class="form-group">
                    <label for="tanggal_keluar" class="col-sm-2 control-label mt-15">Jenis Pelayanan :</label>
                    <div class="col-md-2 has-success">
                        <select class="form-control select2" placeholder="Choose a Category" name="jenis_pelayanan" id="jenis_pelayanan">
                            <option value="POLI">POLI</option>
                            <option value="UGD">UGD</option>
                            <option value="RAWAT INAP">RAWAT INAP</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="tanggal_keluar" class="col-sm-2 control-label mt-15"></label>
                    <div class="col-md-6 has-success">
                        <button type="button" onClick="this.value='Submitting..';this.disabled=true;" id="btn-filter" class="btn btn-primary mr-20">Cari</button>
                        <button type="button" id="btn-reset" class="btn btn-default">Reset</button>
                    </div>
                </div>
            </form>



            <div class="table-wrap">
                <!-- <p id="notif_load" style="color:red;">Loading data, Please wait</p> -->

                <div class="table-responsive">
                    <table class="table table-hover display  pb-30" id="table">
                        <thead>
                            <tr class="bg-success">
                                <th>NO</th>
                                <th>CODING</th>
                                <th>NAMA PASIEN</th>
                                <th>TANGGAL MASUK</th>
                                <th>JAM MASUK</th>
                                <th>NO RM</th>
                                
                                <th>JENIS KELAMIN</th>
                                <th>TANGGAL LAHIR</th>
                                <th>UMUR</th>
                                <th>CARA MASUK</th>
                                <th>POLIKLINIK / RUANG</th>
                                <th>DPJP</th>
                                <th>CARA BAYAR</th>
                                <th>DIAGNOSA PELAYANAN</th>
                                <th>DIAGNOSA ASSEMBLING</th>
                                <th>ASSEMBLING</th>
                                <th>NO SEP</th>
                                <th>KETERANGAN</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr class="bg-success">
                                <th>NO</th>
                                <th>CODING</th>
                                <th>NAMA PASIEN</th>
                                <th>TANGGAL MASUK</th>
                                <th>JAM MASUK</th>
                                <th>NO RM</th>
                               
                                <th>JENIS KELAMIN</th>
                                <th>TANGGAL LAHIR</th>
                                <th>UMUR</th>
                                <th>CARA MASUK</th>
                                <th>POLIKLINIK / RUANG</th>
                                <th>DPJP</th>
                                <th>CARA BAYAR</th>
                                <th>DIAGNOSA PELAYANAN</th>
                                <th>DIAGNOSA ASSEMBLING</th>
                                <th>ASSEMBLING</th>
                                <th>NO SEP</th>
                                <th>KETERANGAN</th>
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


<!-- Datatables -->

<!-- /Modal Edit Akun -->
<div class="panel-wrapper collapse in">
    <div class="panel-body">
        <!-- sample modal content -->
        <div class="modal fade" id="modal_edit" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h5 class="modal-title mt-10" id="myLargeModalLabel"><i class="icon-user mr-10"></i> INFO KELUAR</h5>
                    </div>
                    <div class="modal-body">
                        <!-- Form body  -->
                        <div class="form-body mt-20">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Tanggal Keluar </label>
                                        <div class="col-md-9 has-success">
                                            <input type="text" class="form-control filled-input" id="tgl_keluar" placeholder="Tanggal Keluar" name="tgl_keluar" disabled>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <!-- span -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Tanggal Masuk</label>
                                        <div class="col-md-9 has-success">
                                            <input type="text" class="form-control filled-input" placeholder="Tanggal Masuk" name="tgl_masuk" id="tgl_masuk" disabled>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <p class="mt-15">
                                <!-- /Row -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">

                                            <label class="control-label col-md-3">CARA KELUAR</label>
                                            <button onclick=" insert_cara_keluar()" class="btn btn-success btn-icon-anim btn-square"><i class="glyphicon glyphicon-ok"></i></button>
                                            <div class="col-md-6 has-success">

                                                <input type="hidden" class="form-control filled-input" placeholder="" name="id_pelayanan" id="id_pelayanan">
                                                <select class="form-control   select2" placeholder="Choose a Category" tabindex="1" name="cara_keluar" id="cara_keluar">
                                                    <option value="JH98KV64">MENINGGAL</option>
                                                    <option value="HC33YY85">LAIN LAIN</option>
                                                    <option value="IH44RM90">DI RUJUK KE RS LAIN</option>
                                                    <option value="LM68MU25">PULANG PAKSA</option>
                                                    <option value="OW90HP94">ATAS PERSETUJUAN</option>
                                                </select>



                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Keterangan</label>
                                            <div class="col-md-9 has-success">
                                                <input type="text" class="form-control filled-input " placeholder="Keterangan" name="keterangan" id="keterangan" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-15"> </p>
                                </div>
                                <div class="row">
                                    <p class="mt-15">
                                        <div class="col-md-6">
                                            <div class="form-group">

                                                <label class=" control-label col-md-3">KEADAAN KELUAR</label>
                                                <button onclick=" insert_keadaan_keluar()" class="btn btn-success btn-icon-anim btn-square"><i class="glyphicon glyphicon-ok"></i></button>
                                                <div class="col-md-6 has-success">
                                                    <input type="hidden" class="form-control filled-input" placeholder="" name="id_pelayanan" id="id_pelayanan1">
                                                    <select class="form-control   select2" placeholder="Choose a Category" tabindex="1" name="keadaan_keluar" id="keadaan_keluar">
                                                        <option value="1">SEMBUH</option>
                                                        <option value="2">MEMBAIK</option>
                                                        <option value="3">MEMBURUK</option>
                                                        <option value="4">MENINGGAL KURANG 48 JAM</option>
                                                        <option value="5">MENINGGAL LEBIH 48 JAM</option>
                                                    </select>


                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-2" style="margin-left:120px;">
                                            <span class="help-block"></span>

                                        </div>
                                </div> <!-- /Row -->
                        </div>
                        <!-- nd -->
                    </div>
                    <div class="modal-header">
                        <h5 class="modal-title mt-10" id="myLargeModalLabel"><i class="icon-user mr-10"></i> DIAGNOSA</h5>
                    </div>
                    <div class="modal-body">
                        <!-- Form body  -->
                        <div class="modal-title mt-10  txt-dark" id="myLargeModalLabel">DATA DIAGNOSA</div>
                        <div class="table-wrap" style="width: 70%; margin: auto ">
                            <!-- <p id="notif_load" style="color:red;">Loading data, Please wait</p> -->
                            <div class="table-responsive">
                                <table class="table table-hover display  pb-60" id="tabledgns">
                                    <thead>
                                        <tr class="bg-success">
                                            <th>ID DIAGNOSA</th>
                                            <th>NAMA DIAGNOSA</th>
                                            <th>TAMBAH</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr class="bg-success">
                                            <th>ID DIAGNOSA</th>
                                            <th>NAMA DIAGNOSA</th>
                                            <th>TAMBAH</th>
                                        </tr>
                                    </tfoot>
                                    <tbody style="color: black">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="modal-title mt-20  txt-dark" id="myLargeModalLabel">DATA DIAGNOSA PASIEN</div>
                        <div class="table-wrap" style="width: 70%; margin: auto ">
                            <div class="table-responsive">
                                <table class="table table-hover display  pb-60" id="tablediagnosa">
                                    <thead>
                                        <tr class="bg-success">
                                            <th>ID DIAGNOSA</th>
                                            <th>KODE</th>
                                            <th>NAMA</th>
                                            <th>HAPUS</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr class="bg-success">
                                            <th>ID DIAGNOSA</th>
                                            <th>KODE</th>
                                            <th>NAMA</th>
                                            <th>HAPUS</th>
                                        </tr>
                                    </tfoot>
                                    <tbody style="color: black">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- nd -->
                    </div>

                    <div class="modal-header">
                        <h5 class="modal-title mt-10" id="myLargeModalLabel"><i class="icon-user mr-10"></i> PROSEDUR</h5>
                    </div>
                    <div class="modal-body mt-10">
                        <div class="modal-title mt-10" id="myLargeModalLabel"></div>
                        <div class="modal-title mt-10  txt-dark" id="myLargeModalLabel">DATA PROSEDUR</div>
                        <div class="table-wrap" style="width: 70%; margin: auto ">
                            <!-- <p id="notif_load" style="color:red;">Loading data, Please wait</p> -->
                            <div class="table-responsive">
                                <table class="table table-hover display  pb-60" id="tableprsdr">
                                    <thead>
                                        <tr class="bg-success">
                                            <th>ID PROSEDUR</th>
                                            <th>NAMA PROSEDUR</th>
                                            <th>TAMBAH</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr class="bg-success">
                                            <th>ID PROSEDUR</th>
                                            <th>NAMA PROSEDUR</th>
                                            <th>TAMBAH</th>
                                        </tr>
                                    </tfoot>
                                    <tbody style="color: black">
                                    </tbody>

                                </table>
                            </div>
                        </div>
                        <div class="modal-body mt-10 mb-30">
                            <div class="modal-title mt-10" id="myLargeModalLabel"></div>
                            <div class="modal-title mt-10 txt-dark" id="myLargeModalLabel">DATA PROSEDUR PASIEN</div>
                            <div class="table-wrap" style="width: 70%; margin: auto ">
                                <div class="table-responsive">
                                    <table class="table table-hover display  pb-60" id="tableprosedur">
                                        <thead>
                                            <tr class="bg-success">
                                                <th>ID PROSEDUR</th>
                                                <th>KODE</th>
                                                <th>NAMA</th>
                                                <th>HAPUS</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr class="bg-success">
                                                <th>ID PROSEDUR</th>
                                                <th>KODE</th>
                                                <th>NAMA</th>
                                                <th>HAPUS</th>
                                            </tr>
                                        </tfoot>
                                        <tbody style="color: black">
                                        </tbody>

                                    </table>
                                </div>
                            </div>

                            <!-- nd -->
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->



    <!-- /Modal Edit Akun -->

    <!-- /.modal -->

    <!-- /.modal-dialog -->



    <!-- Bootstrap Core JavaScript -->



    <script type="text/javascript">
        function edit_data_pendaftaran(id_pelayanan, id_history) { //tampil data awal load modal
            $.ajax({
                url: "<?= base_url() . 'Assembling/getdata_pendaftaran' ?>",
                data: {
                    id_pelayanan: id_pelayanan,
                    id_history: id_history
                },
                type: 'POST',
                dataType: 'json',
                success: function(data) {
                    if (data.status_dt == "found") {
                        $("#tgl_masuk").val(data.tgl_masuk);
                        $("#tgl_keluar").val(data.tgl_keluar);
                        $("#id_pelayanan").val(data.id_pelayanan);
                        $("#id_pelayanan1").val(data.id_pelayanan);
                        $("#id_pelayanan2").val(data.id_pelayanan);
                        $("#cara_keluar").val(data.cara_keluar);
                        $("#keterangan").val(data.keterangan);
                        // $("#nama").val(data.nama);
                        // $("#id_akunoke").val(data.id_akun);
                        // $("#inUsername").val(data.username);
                        // $("#usernameAkun").val(data.username);
                        // $("#email").val(data.email);
                        // $("#tgl_daftar").val(data.tgl_daftar);
                        // $("#no_hp").val(data.no_hp);
                        $("#modal_edit").modal('show');
                        $("#modal_diagnosa").modal('show');
                        reload_data_prosedur(id_pelayanan)
                        reload_data_diagnosa(id_pelayanan)
                        reload_data_diagnosa_id_pel(id_pelayanan);
                        reload_data_prosedur_id_pel(id_pelayanan);
                        // reload_data_prosedur_id_pel(id_pelayanan);
                    } else {
                        alert("data tidak ditemukan");
                    }
                }
            });


            function reload_data_diagnosa_id_pel(id_pelayanan) { // modal utk nampilin diagnosa pasien
                $('#tablediagnosa').dataTable().fnClearTable();
                $('#tablediagnosa').dataTable().fnDestroy();
                $('#tablediagnosa').DataTable({
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
                        "url": '<?php echo base_url('Assembling/tampil_list_diagnosa'); ?>',
                        "type": 'POST',
                        "data": {
                            id_pelayanan: id_pelayanan
                        },
                    },

                    "deferRender": true,
                    "processing": true,
                    "order": [],
                    "columnDefs": [{
                        "width": "20%",
                        "targets": [0],
                        "orderable": false,
                    }, ],
                });
            }

            function reload_data_diagnosa(id_pelayanan) { //nampilinn diagnosa seluruhnya utk nambah ke diagnosa pasien
                $('#tabledgns').dataTable().fnClearTable();
                $('#tabledgns').dataTable().fnDestroy();
                $('#tabledgns').DataTable({
                    "scrollX": false,
                    "scrollY": false,
                    "pageLength": 3,
                    "language": {
                        "sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
                        "sProcessing": "Sedang memproses...",
                        "sLengthMenu": "Tampilkan _MENU_ entri",
                        "sZeroRecords": "Tidak ditemukan data yang sesuai",
                        "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                        "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                        "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                        "sInfoPostFix": "",
                        "sSearch": "Cari Diagnosa:",
                        "sUrl": "",
                        "oPaginate": {
                            "sFirst": "Pertama",
                            "sPrevious": "Sebelumnya",
                            "sNext": "Selanjutnya",
                            "sLast": "Terakhir",
                        }
                    },
                    "ajax": {
                        "url": '<?php echo base_url('Assembling/tampil_listdata_diagnosa'); ?>',
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



            function reload_data_prosedur_id_pel(id_pelayanan) { //nampilin prosedur pasien
                $('#tableprosedur').dataTable().fnClearTable();
                $('#tableprosedur').dataTable().fnDestroy();
                $('#tableprosedur').DataTable({
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
                        "url": '<?php echo base_url('Assembling/tampil_list_prosedur'); ?>',
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

            function reload_data_prosedur(id_pelayanan) { //nampilin seluruh prosedur utk nambah ke prosedur pasien
                $('#tableprsdr').dataTable().fnClearTable();
                $('#tableprsdr').dataTable().fnDestroy();
                $('#tableprsdr').DataTable({
                    "pageLength": 3,
                    "language": {
                        "sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
                        "sProcessing": "Sedang memproses...",
                        "sLengthMenu": "Tampilkan _MENU_ entri",
                        "sZeroRecords": "Tidak ditemukan data yang sesuai",
                        "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                        "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                        "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                        "sInfoPostFix": "",
                        "sSearch": "Cari Prosedur:",
                        "sUrl": "",
                        "oPaginate": {
                            "sFirst": "Pertama",
                            "sPrevious": "Sebelumnya",
                            "sNext": "Selanjutnya",
                            "sLast": "Terakhir",
                        }
                    },
                    "ajax": {
                        "url": '<?php echo base_url('Assembling/tampil_listdata_prosedur'); ?>',
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


        }
    </script>
    <!--  -->
    <script type="text/javascript">
        var table;
        // var table2;

        $(document).ready(function() {
            // $("#btn-filter").attr("disabled", true);


            table = $('#table').DataTable({ //load data pada awal halaman
                "processing": true, //Feature control the processing indicator.
                // "serverSide": true, //Feature control DataTables' server-side processing mode.
                "order": [], //Initial no order.

                // Load data for the table's content from an Ajax source
                "ajax": {
                    "url": "<?php echo site_url('Assembling/rajal_list') ?>",
                    "type": "POST",
                    "datatype": "json",
                    "data": function(data) {
                        data.tanggal_masuk = $('#tanggal_masuk').val();
                        data.tanggal_keluar = $('#tanggal_keluar').val();
                        data.jenis_pelayanan = $('#jenis_pelayanan').val();
                    },
                },
                "deferRender": true,
                "processing": true,
                "order": [],
                "columnDefs": [{
                    "targets": [0],
                    "orderable": false,
                }, ],

                "dom": 'Bfrtip',
                "buttons": ['csv', 'excel', 'pdf', 'print'],
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
                $("#btn-filter").attr("disabled", false);
                table.ajax.reload(); //just reload table
            });


        });

        function hapus_data_diagnosa(id_pelayanan, no_diagnosa) { //utk hapus diagnosa pasien
            id_pelayanan = $('#id_pelayanan').val();
            // no_diagnosa = $('#no_diagnosa').val();
            swal({
                title: "Apakah kamu yakin?",
                text: "Menghapus data NO RM " + no_diagnosa + "?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3cb878",
                confirmButtonText: "Yakin",
                cancelButtonText: "Batal",
                closeOnConfirm: false
            }, function() {
                $().ready(function() {
                    $.ajax({
                        url: "<?php echo base_url() ?>Assembling/hapus_data_diagnosabyakun",
                        method: "POST",
                        dataType: 'json',
                        data: {
                            id_pelayanan: id_pelayanan,
                            no_diagnosa: no_diagnosa,

                        },
                        success: function(data) {
                            if (data.status == "success") {
                                swal({
                                    title: "good job!",
                                    type: "success",
                                    text: "Id diagnosa" + no_diagnosa + " Berhasil dihapus",
                                    confirmButtonColor: "#3cb878",
                                });
                                reload_data_diagnosa_id_pel(id_pelayanan);
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
                }); //dr sini
                function reload_data_diagnosa_id_pel(id_pelayanan) { // utk reload diagnosa pasien jika berhasil
                    $('#tablediagnosa').dataTable().fnClearTable();
                    $('#tablediagnosa').dataTable().fnDestroy();
                    $('#tablediagnosa').DataTable({
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
                            "url": '<?php echo base_url('Assembling/tampil_list_diagnosa'); ?>',
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
            });
            return false;
        }

        function tambah_data_diagnosa(id_pelayanan, id_diagnosa, nama_diagnosa) { //utk nambah diagnosa pasien
            id_pelayanan = $('#id_pelayanan').val();
            // no_diagnosa = $('#no_diagnosa').val();
            swal({
                title: "Apakah kamu yakin?",
                text: "Menambah Diagnosa " + nama_diagnosa + "?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3cb878",
                confirmButtonText: "Yakin",
                cancelButtonText: "Batal",
                closeOnConfirm: false
            }, function() {
                $().ready(function() {
                    $.ajax({
                        url: "<?php echo base_url() ?>Assembling/tambah_data_diagnosa",
                        method: "POST",
                        dataType: 'json',
                        data: {
                            id_pelayanan: id_pelayanan,
                            id_diagnosa: id_diagnosa,
                            nama_diagnosa: nama_diagnosa,

                        },
                        success: function(data) {
                            if (data.status == "success") {
                                swal({
                                    title: "good job!",
                                    type: "success",
                                    text: "Id diagnosa" + id_diagnosa + " Berhasil ditambah",
                                    confirmButtonColor: "#3cb878",
                                });
                                reload_data_diagnosa_id_pel(id_pelayanan);
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
                });

                function reload_data_diagnosa_id_pel(id_pelayanan) { //utk reload data diagnosa pasien jika berhasil
                    $('#tablediagnosa').dataTable().fnClearTable();
                    $('#tablediagnosa').dataTable().fnDestroy();
                    $('#tablediagnosa').DataTable({
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
                            "url": '<?php echo base_url('Assembling/tampil_list_diagnosa'); ?>',
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
            });
            return false;
        }

        function tambah_data_prosedur(id_pelayanan, id_prosedur, nama_prosedur) { //utk nambah prosedur pasien
            id_pelayanan = $('#id_pelayanan').val();
            // no_prosedur = $('#no_prosedur').val();
            swal({
                title: "Apakah kamu yakin?",
                text: "Menambah Prosedur " + nama_prosedur + "?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3cb878",
                confirmButtonText: "Yakin",
                cancelButtonText: "Batal",
                closeOnConfirm: false
            }, function() {
                $().ready(function() {
                    $.ajax({
                        url: "<?php echo base_url() ?>Assembling/tambah_data_prosedur",
                        method: "POST",
                        dataType: 'json',
                        data: {
                            id_pelayanan: id_pelayanan,
                            id_prosedur: id_prosedur,
                            nama_prosedur: nama_prosedur,

                        },
                        success: function(data) {
                            if (data.status == "success") {
                                swal({
                                    title: "good job!",
                                    type: "success",
                                    text: "Id prosedur" + id_prosedur + " Berhasil ditambah",
                                    confirmButtonColor: "#3cb878",
                                });
                                reload_data_prosedur_id_pel(id_pelayanan);
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
                });

                function reload_data_prosedur_id_pel(id_pelayanan) { // reload prosedur pasien jika berhasil
                    $('#tableprosedur').dataTable().fnClearTable();
                    $('#tableprosedur').dataTable().fnDestroy();
                    $('#tableprosedur').DataTable({
                        "language": {
                            "sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
                            "sProcessing": "Sedang memproses...",
                            "sLengthMenu": "Tampilkan _MENU_ entri",
                            "sZeroRecords": "Tidak ditemukan data yang sesuai",
                            "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                            "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                            "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                            "sInfoPostFix": "",
                            "sSearch": "Pencarian : ",
                            "sUrl": "",
                            "oPaginate": {
                                "sFirst": "Pertama",
                                "sPrevious": "Sebelumnya",
                                "sNext": "Selanjutnya",
                                "sLast": "Terakhir",
                            }
                        },
                        "ajax": {
                            "url": '<?php echo base_url('Assembling/tampil_list_prosedur'); ?>',
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
            });
            return false;
        }


        function hapus_data_prosedur(id_pelayanan, no_prosedur) { //hapus prosedur pasien
            id_pelayanan = $('#id_pelayanan').val();
            // no_diagnosa = $('#no_diagnosa').val();
            swal({
                title: "Apakah kamu yakin?",
                text: "Menghapus data Prosedur " + no_prosedur + "?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3cb878",
                confirmButtonText: "Yakin",
                cancelButtonText: "Batal",
                closeOnConfirm: false
            }, function() {
                $().ready(function() {
                    $.ajax({
                        url: "<?php echo base_url() ?>Assembling/hapus_data_prosedurbyakun",
                        method: "POST",
                        dataType: 'json',
                        data: {
                            id_pelayanan: id_pelayanan,
                            no_prosedur: no_prosedur,

                        },
                        success: function(data) {
                            if (data.status == "success") {
                                swal({
                                    title: "good job!",
                                    type: "success",
                                    text: "Id diagnosa" + no_prosedur + " Berhasil dihapus",
                                    confirmButtonColor: "#3cb878",
                                });
                                reload_data_prosedur_id_pel(id_pelayanan);
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
                });

                function reload_data_prosedur_id_pel(id_pelayanan) { // reload prosedur jika berhasil
                    $('#tableprosedur').dataTable().fnClearTable();
                    $('#tableprosedur').dataTable().fnDestroy();
                    $('#tableprosedur').DataTable({

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
                            "url": '<?php echo base_url('Assembling/tampil_list_prosedur'); ?>',
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
            });
            return false;
        }


        function insert_cara_keluar() { // utk update cara keluar
            id_pelayanan = $('#id_pelayanan').val();
            cara_keluar = $('#cara_keluar').val();

            $.ajax({
                url: "<?= base_url() . 'Assembling/insert_cara_keluar' ?>",
                method: "POST",
                dataType: 'json',
                data: {
                    id_pelayanan: id_pelayanan,
                    cara_keluar: cara_keluar,

                },
                success: function(data) {
                    if (data.status == "success") {
                        swal({
                            title: "good job!",
                            type: "success",
                            text: "Cara Keluar Berhasil Diupdate!",
                            confirmButtonColor: "#3cb878",
                        });
                        $("#modal_edit").modal('show');
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

        }

        function insert_keadaan_keluar() { //utk update keadaan keluar
            id_pelayanan = $('#id_pelayanan').val();
            keadaan_keluar = $('#keadaan_keluar').val();

            $.ajax({
                url: "<?= base_url() . 'Assembling/insert_keadaan_keluar' ?>",
                method: "POST",
                dataType: 'json',
                data: {
                    id_pelayanan: id_pelayanan,
                    keadaan_keluar: keadaan_keluar,

                },
                success: function(data) {
                    if (data.status == "success") {
                        swal({
                            title: "good job!",
                            type: "success",
                            text: "Keadaan Keluar Berhasil Diupdate!",
                            confirmButtonColor: "#3cb878",
                        });
                        $("#modal_edit").modal('show');
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

        }
    </script>