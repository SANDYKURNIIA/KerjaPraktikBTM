<!-- Row -->

<div class="panel panel-default card-view">
    <div class="panel-heading">
        <div class="pull-left">
            <h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">PENDAPATAN NON-TUNAI KASIR</span></h6>
        </div>
        <div class="clearfix"></div>

        <div class="row mt-30">
            <div class="col-md-12">
                <div class="col-md-3 mt-20 pl-5">
                    <ul class="nav navbar-nav">
                        <li>
                    <button class="btn btn-primary btn-anim btn-sm1" data-toggle="collapse" data-target="#dashboard_dr"><i class="icon-rocket"></i><span class="btn-text">HARI INI </span>
                        <span class="caret"></span></button>
                      <ul id="dashboard_dr" class="collapse collapse-level-1" style="background-color: #337ab7; ">
                        <li><button class="btn btn-primary btn-sm" onclick="tampilHariIni()"><span class="btn-text">ASURANSI </span></button></li>
                        <li><button class="btn btn-primary btn-sm" onclick="tampilBank()"><span class="btn-text">BANK </span></button></li>
                    </ul>
                </li>
            </ul>
                </div>
                <div class="col-md-3">
                    <label class="mt-0 txt-dark">Tanggal Mulai : </label>
                    <input type="date" autocomplete="off" id="inTglMulai" class="form-control">
                </div>
                <div class="col-md-3">
                    <label class="mt-0 txt-dark">Tanggal Akhir : </label>
                    <input type="date" autocomplete="off" id="inTglAkhir" class="form-control">
                </div>
                <div class="col-md-3 mt-20">
                    <ul class="nav navbar-nav">
                        <li><button class="btn btn-primary btn-anim btn-sm1" data-toggle="collapse" data-target="#pilih"><i class="icon-rocket"></i><span class="btn-text">PILIH</span>
                        <span class="caret"></span></button>
                      <ul id="pilih" class="collapse collapse-level-1" style="background-color: #337ab7; ">
                        <li><button class="btn btn-primary btn-sm" onclick="tampilRange();"><span class="btn-text">ASURANSI </span></button></li>
                        <li><button class="btn btn-primary btn-sm" onclick="tampilRangeBank();"><span class="btn-text">BANK </span></button></li>
                    </ul>
                </li>
            </ul>
                    
                </div>
            </div>
        </div>
    </div>
    <div class="panel-wrapper collapse in">
        <div class="panel-body">
            <div class="table-wrap">
                <div class="table-responsive">
                    <table id="datable" class="table table-hover display pb-30" width="100%">
                        <thead>
                            <tr class="bg-success">
                                <th>NO</th>
                                <th>TANGGAL INPUT</th>
                                <th>JAM</th>
                                <th>TOTAL PENDAPATAN</th>
                                <th>JENIS PEMBAYARAN</th>
                                <th>JENIS KLAIM</th>
                                <th>DISKON</th>
                                <th>DP</th>
                                <th>KETERANGAN</th>
                                <th>TANGGAL PULANG</th>
                                <th>ID STAFF</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr class="bg-success">
                                <th>NO</th>
                                <th>TANGGAL INPUT</th>
                                <th>JAM</th>
                                <th>TOTAL PENDAPATAN</th>
                                <th>JENIS PEMBAYARAN</th>
                                <th>JENIS KLAIM</th>
                                <th>DISKON</th>
                                <th>DP</th>
                                <th>KETERANGAN</th>
                                <th>TANGGAL PULANG</th>
                                <th>ID STAFF</th>
                            </tr>
                        </tfoot>
                    </table>
                    <span id="hasil"></span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <div class="panel-wrapper collapse in">
    <div class="panel-body">

        <div class="modal fade" id="modal_edit_kasir" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h5 class="modal-title mt-10" id="myLargeModalLabel"><i class="icon-user mr-10"></i> EDIT DATA KUNJUNGAN
                        </h5>
                    </div>
                    <div class="modal-body">
                    <form class="form-horizontal" action="<?php echo base_url('Kasir/print_pasien_pulang')?>" method="post" enctype="multipart/form-data" role="form">
                        <input type="hidden" id="inPel" name="inPel">
                        <input type="hidden" id="inHis" name="inHis">
                        <div class="form-body">
                            <h6 class="txt-dark capitalize-font"><i class="icon-user mr-10"></i>INFO KASIR</h6>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">DISC</label>
                                        <div class="col-md-9">
                                            <input type="number" class="form-control rounded-input" autocomplete="off" id="inDiskon" name="inDiskon" value="0">
                                            <span class="help-block"></span>

                                        </div>
                                    </div>
                                </div>
                               
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">DP </label>
                                        <div class="col-md-9">
                                            <input type="number" class="form-control rounded-input" autocomplete="off" placeholder="jumlah" id="inDp" name="inDp" value="0">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>

                            <div class="row">
                                <div class="col-md-offset-3 col-md-9">
                                    <button class="btn btn-primary btn-rounded mr-10" type="submit" name="action" value="cetak">CETAK</button>
                                    
                                </div>
                            </div>
                        </div>

                    </form>
                    </div>
                    
                </div>
                
            </div>
        </div>

    </div>
</div> -->

<style>
    td {
        color: black;
    }
</style>



<script type="text/javascript">
    // function tampilTindakanFarmasi(id_pelayanan, id_history) {
    //     $('#inPel').val(id_pelayanan);
    //     $('#inHis').val(id_history);
    //     $("#modal_edit_kasir").modal('show');
    // }
    
    
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
            "ajax": '<?php echo base_url('Kasir/tampil_nontunai_kasir'); ?>',
            "deferRender": true,
            "processing": true,
            "order": [],
            "columnDefs": [{
                "targets": [0],
                "orderable": false,
            }, ],
        });
    });

    function tampilHariIni() {
        $('#datable').DataTable().destroy();
        $('#datable').DataTable({
            "retrieve": true,
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
            "ajax": '<?php echo base_url('Kasir/tampil_nontunai_kasir'); ?>',
            "deferRender": true,
            "processing": true,
            "order": [],
            "columnDefs": [{
                "targets": [0],
                "orderable": false,
            }, ],
        });
    }

    function tampilRange(mulai, akhir) {
        $('#datable').DataTable().destroy();
        mulai = $("#inTglMulai").val();
        akhir = $("#inTglAkhir").val();
        $('#datable').DataTable({
            "retrieve": true,
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
            "ajax": {
                "url": '<?= base_url('Kasir/tampil_range_nontunai_kasir'); ?>',
                "type": 'POST',
                "data": {
                    mulai: mulai,
                    akhir: akhir
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

    function tampilBank() {
        $('#datable').DataTable().destroy();
        $('#datable').DataTable({
            "retrieve": true,
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
            "ajax": '<?php echo base_url('Kasir/tampil_bank_kasir'); ?>',
            "deferRender": true,
            "processing": true,
            "order": [],
            "columnDefs": [{
                "targets": [0],
                "orderable": false,
            }, ],
        });
    }

    function tampilRangeBank(mulai, akhir) {
        $('#datable').DataTable().destroy();
        mulai = $("#inTglMulai").val();
        akhir = $("#inTglAkhir").val();
        $('#datable').DataTable({
            "retrieve": true,
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
            "ajax": {
                "url": '<?= base_url('Kasir/tampil_range_bank_kasir'); ?>',
                "type": 'POST',
                "data": {
                    mulai: mulai,
                    akhir: akhir
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