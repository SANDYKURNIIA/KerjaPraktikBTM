<<<<<<< HEAD
<!-- Row -->
<div class="panel panel-default card-view">
    <div class="panel-heading">
        <div class="pull-left">
            <h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">LAPORAN REKAP BCHE</span></h6>
        </div>
        <div class="clearfix"></div>
        <div class="row mt-30">
            <div class="col-md-12">
                <!-- <div class="col-md-3 mt-20">
                    <button class="btn btn-primary btn-anim btn-sm" onclick="tampilHariIni();"><i class="icon-rocket"></i><span class="btn-text">HARI INI </span>
                </div> -->

                <div class="col-md-3">
                    <label class="mt-0 txt-dark">Tanggal Mulai : </label>
                    <input type="date" autocomplete="off" id="inTglMulai" class="form-control">
                </div>
                <div class="col-md-3">
                    <label class="mt-0 txt-dark">Tanggal Akhir : </label>
                    <input type="date" autocomplete="off" id="inTglAkhir" class="form-control">
                </div>
                <!-- <div class="col-md-2">
                    <label class="mt-0 txt-dark">Jenis Poli :</label>
                    <div class="col-md-2 has-success">
                    <select class="form-control select2" placeholder="Choose a Category" name="jenis_poli" id="jenis_poli">
                        <option value="-">All</option>
                        <option value="anak">ANAK</option>
                        <option value="paru">PARU</option>
                        <option value="dalam">DALAM</option>
                        <option value="umum">UMUM</option>
                        <option value="obgyn">OBGYN</option>
                    </select>
                    </div>
                </div> -->
                <div class="col-md-3 mt-20">
                    <!-- <button class="btn btn-primary btn-anim btn-sm1 mr-10" onclick="tampilRangePermit();"><i class="icon-rocket"></i><span class="btn-text">PILIH</span></button> -->
                    <button class="btn btn-info btn-anim btn-sm1 " onclick="cetak();"><i class="icon-rocket"></i><span class="btn-text">EXCEL</span>
                    <!-- <a href="<?php echo base_url('Jurnal_keuangan/export') ?>" class="btn btn-info btn-anim btn-sm1" target="_blank"><i class="fas fa fa-print"></i><span class="btn-text">EXCEL</span></a> -->

                </div>
                <div class="col-md-3 mt-20">
                </div>
            </div>
        </div>

    </div>
    <!-- <div class="panel-wrapper collapse in">
        <div class="panel-body">
            <div class="table-wrap">
                <div class="table-responsive">
                    <div class="row mt-30 pull-right">
                        <div class="col-md-12 ">


                        </div>
                    </div>
                    <table id="datable" class="table table-hover display pb-30" width="100%">
                        <thead>
                            <tr class="bg-success">
                                <th>NO</th>
                                <th>JK</th>
                                <th>TANGGAL</th>
                                <th>NO JURNAL</th>
                                <th>REKENING</th>
                                <th>JB</th>
                                <th>CJ</th>
                                <th>PK</th>
                                <th>LAP</th>
                                <th>DEBET</th>
                                <th>KREDIT</th>
                                <th>DESKRIPSI</th>
                                <th>DESKRIPSI REKENING</th>
                                <th>STAFF</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr class="bg-success">
                                <th>NO</th>
                                <th>JK</th>
                                <th>TANGGAL</th>
                                <th>NO JURNAL</th>
                                <th>REKENING</th>
                                <th>JB</th>
                                <th>CJ</th>
                                <th>PK</th>
                                <th>LAP</th>
                                <th>DEBET</th>
                                <th>KREDIT</th>
                                <th>DESKRIPSI</th>
                                <th>DESKRIPSI REKENING</th>
                                <th>STAFF</th>
                            </tr>
                        </tfoot>
                    </table>

                </div>
            </div>
        </div>
    </div> -->
</div>

<style>
    td {
        color: black;
    }
</style>

<script type="text/javascript">
    $(document).ready(function() {
        $('#datable').DataTable({
            "dom": 'Bfrtip',
            "buttons": ['csv', 'excel', 'pdf'],
            "language": {
                "sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
                "sProcessing": "Sedang memproses...",
                "sLengthMenu": "Tampilkan _MENU_ entri",
                "sZeroRecords": "Tidak ditemukan data yang sesuai",
                "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                "sInfoPostFix": "",
                "sSearch": "Pencarian :",
                "sUrl": "",
                "oPaginate": {
                    "sFirst": "Pertama",
                    "sPrevious": "Sebelumnya",
                    "sNext": "Selanjutnya",
                    "sLast": "Terakhir"
                },
            },
            "ajax": '<?php echo base_url('Jurnal_keuangan/tampil_data_laporan_rekap_jurnal'); ?>',
            "deferRender": true,
            "processing": true,
            "order": [],
            "columnDefs": [{
                "targets": [0],
                "orderable": false,
            }, ],
        });
    });

    // function tampilHariIni() {
    //     $('#datable').DataTable().destroy();
    //     $('#datable').DataTable({
    //         "retrieve": true,
    //         "dom": 'Bfrtip',
    //         "buttons": ['csv', 'excel', 'pdf'],
    //         "language": {
    //             "sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
    //             "sProcessing": "Sedang memproses...",
    //             "sLengthMenu": "Tampilkan _MENU_ entri",
    //             "sZeroRecords": "Tidak ditemukan data yang sesuai",
    //             "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
    //             "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
    //             "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
    //             "sInfoPostFix": "",
    //             "sSearch": "Pencarian :",
    //             "sUrl": "",
    //             "oPaginate": {
    //                 "sFirst": "Pertama",
    //                 "sPrevious": "Sebelumnya",
    //                 "sNext": "Selanjutnya",
    //                 "sLast": "Terakhir"
    //             },
    //         },
    //         "ajax": '<?php echo base_url('Jurnal_keuangan/tampil_data_laporan_rekap_jurnal'); ?>',
    //         "deferRender": true,
    //         "processing": true,
    //         "order": [],
    //         "columnDefs": [{
    //             "targets": [0],
    //             "orderable": false,
    //         }, ],
    //     });
    // }

    // function tampilRangePermit(mulai, akhir, jenis_klaim) {
    //     $('#datable').DataTable().destroy();
    //     mulai = $("#inTglMulai").val();
    //     akhir = $("#inTglAkhir").val();
    //     jenis_klaim = $('#jenis_klaim').val();
    //     $('#datable').DataTable({
    //         "retrieve": true,
    //         "dom": 'Bfrtip',
    //         "buttons": ['csv', 'excel', 'pdf'],
    //         "language": {
    //             "sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
    //             "sProcessing": "Sedang memproses...",
    //             "sLengthMenu": "Tampilkan _MENU_ entri",
    //             "sZeroRecords": "Tidak ditemukan data yang sesuai",
    //             "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
    //             "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
    //             "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
    //             "sInfoPostFix": "",
    //             "sSearch": "Pencarian :",
    //             "sUrl": "",
    //             "oPaginate": {
    //                 "sFirst": "Pertama",
    //                 "sPrevious": "Sebelumnya",
    //                 "sNext": "Selanjutnya",
    //                 "sLast": "Terakhir"
    //             },
    //         },
    //         "ajax": {
    //             "url": '<?= base_url('Jurnal_keuangan/tampil_data_laporan_rekap_jurnal'); ?>',
    //             "type": 'POST',
    //             "data": {
    //                 mulai: mulai,
    //                 akhir: akhir,

    //             },
    //         },
    //         "deferRender": true,
    //         "processing": true,
    //         "order": [],
    //         "columnDefs": [{
    //             "targets": [0],
    //             "orderable": false,
    //         }, ],
    //     });
    // }

    function cetak() {
        mulai = $("#inTglMulai").val();
        akhir = $("#inTglAkhir").val();
        // jenis_poli = $("#jenis_poli").val();
        if (mulai != '' || akhir != '') {
            location.href = "<?= base_url() . 'Jurnal_keuangan/export_bche/' ?>"+ mulai +'/'+akhir;
        }
        // }else if ((mulai != '' || akhir != '')&& jenis_poli!='-' ) {
        //     location.href = "<?= base_url() . 'Jurnal_farmasi/export_jurnal/' ?>"+mulai +'/'+akhir+'/'+jenis_poli;
        // } else {
        //     location.href = "<?= base_url() . 'Jurnal_keuangan/export/today/today' ?>";
        // }
        // $.ajax({
        //     url: "<?= base_url() . 'Jurnal_keuangan/export' ?>",
        //     data: {
        //         mulai: mulai,
        //         akhir: akhir,
        //     },
        //     type: 'POST',
            
        // });
    }
=======
<!-- Row -->
<div class="panel panel-default card-view">
    <div class="panel-heading">
        <div class="pull-left">
            <h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">LAPORAN REKAP BCHE</span></h6>
        </div>
        <div class="clearfix"></div>
        <div class="row mt-30">
            <div class="col-md-12">
                <!-- <div class="col-md-3 mt-20">
                    <button class="btn btn-primary btn-anim btn-sm" onclick="tampilHariIni();"><i class="icon-rocket"></i><span class="btn-text">HARI INI </span>
                </div> -->

                <div class="col-md-3">
                    <label class="mt-0 txt-dark">Tanggal Mulai : </label>
                    <input type="date" autocomplete="off" id="inTglMulai" class="form-control">
                </div>
                <div class="col-md-3">
                    <label class="mt-0 txt-dark">Tanggal Akhir : </label>
                    <input type="date" autocomplete="off" id="inTglAkhir" class="form-control">
                </div>
                <!-- <div class="col-md-2">
                    <label class="mt-0 txt-dark">Jenis Poli :</label>
                    <div class="col-md-2 has-success">
                    <select class="form-control select2" placeholder="Choose a Category" name="jenis_poli" id="jenis_poli">
                        <option value="-">All</option>
                        <option value="anak">ANAK</option>
                        <option value="paru">PARU</option>
                        <option value="dalam">DALAM</option>
                        <option value="umum">UMUM</option>
                        <option value="obgyn">OBGYN</option>
                    </select>
                    </div>
                </div> -->
                <div class="col-md-3 mt-20">
                    <!-- <button class="btn btn-primary btn-anim btn-sm1 mr-10" onclick="tampilRangePermit();"><i class="icon-rocket"></i><span class="btn-text">PILIH</span></button> -->
                    <button class="btn btn-info btn-anim btn-sm1 " onclick="cetak();"><i class="icon-rocket"></i><span class="btn-text">EXCEL</span>
                    <!-- <a href="<?php echo base_url('Jurnal_keuangan/export') ?>" class="btn btn-info btn-anim btn-sm1" target="_blank"><i class="fas fa fa-print"></i><span class="btn-text">EXCEL</span></a> -->

                </div>
                <div class="col-md-3 mt-20">
                </div>
            </div>
        </div>

    </div>
    <!-- <div class="panel-wrapper collapse in">
        <div class="panel-body">
            <div class="table-wrap">
                <div class="table-responsive">
                    <div class="row mt-30 pull-right">
                        <div class="col-md-12 ">


                        </div>
                    </div>
                    <table id="datable" class="table table-hover display pb-30" width="100%">
                        <thead>
                            <tr class="bg-success">
                                <th>NO</th>
                                <th>JK</th>
                                <th>TANGGAL</th>
                                <th>NO JURNAL</th>
                                <th>REKENING</th>
                                <th>JB</th>
                                <th>CJ</th>
                                <th>PK</th>
                                <th>LAP</th>
                                <th>DEBET</th>
                                <th>KREDIT</th>
                                <th>DESKRIPSI</th>
                                <th>DESKRIPSI REKENING</th>
                                <th>STAFF</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr class="bg-success">
                                <th>NO</th>
                                <th>JK</th>
                                <th>TANGGAL</th>
                                <th>NO JURNAL</th>
                                <th>REKENING</th>
                                <th>JB</th>
                                <th>CJ</th>
                                <th>PK</th>
                                <th>LAP</th>
                                <th>DEBET</th>
                                <th>KREDIT</th>
                                <th>DESKRIPSI</th>
                                <th>DESKRIPSI REKENING</th>
                                <th>STAFF</th>
                            </tr>
                        </tfoot>
                    </table>

                </div>
            </div>
        </div>
    </div> -->
</div>

<style>
    td {
        color: black;
    }
</style>

<script type="text/javascript">
    $(document).ready(function() {
        $('#datable').DataTable({
            "dom": 'Bfrtip',
            "buttons": ['csv', 'excel', 'pdf'],
            "language": {
                "sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
                "sProcessing": "Sedang memproses...",
                "sLengthMenu": "Tampilkan _MENU_ entri",
                "sZeroRecords": "Tidak ditemukan data yang sesuai",
                "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                "sInfoPostFix": "",
                "sSearch": "Pencarian :",
                "sUrl": "",
                "oPaginate": {
                    "sFirst": "Pertama",
                    "sPrevious": "Sebelumnya",
                    "sNext": "Selanjutnya",
                    "sLast": "Terakhir"
                },
            },
            "ajax": '<?php echo base_url('Jurnal_keuangan/tampil_data_laporan_rekap_jurnal'); ?>',
            "deferRender": true,
            "processing": true,
            "order": [],
            "columnDefs": [{
                "targets": [0],
                "orderable": false,
            }, ],
        });
    });

    // function tampilHariIni() {
    //     $('#datable').DataTable().destroy();
    //     $('#datable').DataTable({
    //         "retrieve": true,
    //         "dom": 'Bfrtip',
    //         "buttons": ['csv', 'excel', 'pdf'],
    //         "language": {
    //             "sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
    //             "sProcessing": "Sedang memproses...",
    //             "sLengthMenu": "Tampilkan _MENU_ entri",
    //             "sZeroRecords": "Tidak ditemukan data yang sesuai",
    //             "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
    //             "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
    //             "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
    //             "sInfoPostFix": "",
    //             "sSearch": "Pencarian :",
    //             "sUrl": "",
    //             "oPaginate": {
    //                 "sFirst": "Pertama",
    //                 "sPrevious": "Sebelumnya",
    //                 "sNext": "Selanjutnya",
    //                 "sLast": "Terakhir"
    //             },
    //         },
    //         "ajax": '<?php echo base_url('Jurnal_keuangan/tampil_data_laporan_rekap_jurnal'); ?>',
    //         "deferRender": true,
    //         "processing": true,
    //         "order": [],
    //         "columnDefs": [{
    //             "targets": [0],
    //             "orderable": false,
    //         }, ],
    //     });
    // }

    // function tampilRangePermit(mulai, akhir, jenis_klaim) {
    //     $('#datable').DataTable().destroy();
    //     mulai = $("#inTglMulai").val();
    //     akhir = $("#inTglAkhir").val();
    //     jenis_klaim = $('#jenis_klaim').val();
    //     $('#datable').DataTable({
    //         "retrieve": true,
    //         "dom": 'Bfrtip',
    //         "buttons": ['csv', 'excel', 'pdf'],
    //         "language": {
    //             "sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
    //             "sProcessing": "Sedang memproses...",
    //             "sLengthMenu": "Tampilkan _MENU_ entri",
    //             "sZeroRecords": "Tidak ditemukan data yang sesuai",
    //             "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
    //             "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
    //             "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
    //             "sInfoPostFix": "",
    //             "sSearch": "Pencarian :",
    //             "sUrl": "",
    //             "oPaginate": {
    //                 "sFirst": "Pertama",
    //                 "sPrevious": "Sebelumnya",
    //                 "sNext": "Selanjutnya",
    //                 "sLast": "Terakhir"
    //             },
    //         },
    //         "ajax": {
    //             "url": '<?= base_url('Jurnal_keuangan/tampil_data_laporan_rekap_jurnal'); ?>',
    //             "type": 'POST',
    //             "data": {
    //                 mulai: mulai,
    //                 akhir: akhir,

    //             },
    //         },
    //         "deferRender": true,
    //         "processing": true,
    //         "order": [],
    //         "columnDefs": [{
    //             "targets": [0],
    //             "orderable": false,
    //         }, ],
    //     });
    // }

    function cetak() {
        mulai = $("#inTglMulai").val();
        akhir = $("#inTglAkhir").val();
        // jenis_poli = $("#jenis_poli").val();
        if (mulai != '' || akhir != '') {
            location.href = "<?= base_url() . 'Jurnal_keuangan/export_bche/' ?>"+ mulai +'/'+akhir;
        }
        // }else if ((mulai != '' || akhir != '')&& jenis_poli!='-' ) {
        //     location.href = "<?= base_url() . 'Jurnal_farmasi/export_jurnal/' ?>"+mulai +'/'+akhir+'/'+jenis_poli;
        // } else {
        //     location.href = "<?= base_url() . 'Jurnal_keuangan/export/today/today' ?>";
        // }
        // $.ajax({
        //     url: "<?= base_url() . 'Jurnal_keuangan/export' ?>",
        //     data: {
        //         mulai: mulai,
        //         akhir: akhir,
        //     },
        //     type: 'POST',
            
        // });
    }
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
</script>