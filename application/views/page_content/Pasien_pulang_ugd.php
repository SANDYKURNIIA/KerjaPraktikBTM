<!-- Row -->
<?php
$data = $this->session->userdata('data_auth');
$izinAkses = $data->izin_akses;
$id_staff = $data->id_staff;
?>
<div class="panel panel-default card-view">
    <div class="panel-heading">
        <div class="pull-left">
            <h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">PASIEN PULANG</span></h6>
        </div>
        <div class="clearfix"></div>

        <div class="row mt-30">
            <div class="col-md-12">
                <div class="col-md-3 mt-20 pl-5">
                    <button class="btn btn-primary btn-anim btn-sm" onclick="tampilHariIni();"><i class="icon-rocket"></i><span class="btn-text">HARI INI </span>
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
                    <button class="btn btn-primary btn-anim btn-sm1" onclick="tampilRangePermit();"><i class="icon-rocket"></i><span class="btn-text">PILIH</span>
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
                                <th>TINDAKAN</th>
                                <?php if ($data->id_staff != 'drfebry') { ?>
                                    <th>KEMBALI</th>
                                <?php }  ?>
                                <?php if ($data->tipe == 'kasir') { ?>
                                    <th>EDIT PENDAPATAN</th>
                                    <th>DOWNLOAD</th>
                                    <?php }  ?>
                                <th>TANGGAL PELAYANAN</th>
                                <th>JAM PELAYANAN</th>

                                <th>TANGGAL KELUAR</th>
                                <th>NO RM</th>
                                <th>NAMA PASIEN</th>
                                <th>JENIS KELAMIN</th>
                                <th>TANGGAL LAHIR</th>
                                <th>UMUR</th>
                                <th>CARA MASUK</th>
                                <!-- <th>POLIKLINIK / RUANG</th> -->
                                <th>JENIS KLAIM</th>
                                <th>DIAGNOSA</th>
                                <th>DOKTER DPJP</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr class="bg-success">
                                <th>NO</th>
                                <th>TINDAKAN</th>
                                <?php if ($data->id_staff != 'drfebry') { ?>
                                    <th>KEMBALI</th>
                                <?php }  ?>
                                <?php if ($data->tipe == 'kasir') { ?>
                                    <th>EDIT PENDAPATAN</th>
                                    <th>DOWNLOAD</th>
                                    <?php }  ?>
                                <th>TANGGAL PELAYANAN</th>
                                <th>JAM PELAYANAN</th>

                                <th>TANGGAL KELUAR</th>
                                <th>NO RM</th>
                                <th>NAMA PASIEN</th>
                                <th>JENIS KELAMIN</th>
                                <th>TANGGAL LAHIR</th>
                                <th>UMUR</th>
                                <th>CARA MASUK</th>
                                <!-- <th>POLIKLINIK / RUANG</th> -->
                                <th>JENIS KLAIM</th>
                                <th>DIAGNOSA</th>
                                <th>DOKTER DPJP</th>
                            </tr>
                        </tfoot>
                    </table>
                    <span id="hasil"></span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="panel-wrapper collapse in">
    <div class="panel-body">
        <!-- sample modal content -->
        <div class="modal fade" id="modal_edit_kasir" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h5 class="modal-title mt-10" id="myLargeModalLabel"><i class="icon-user mr-10"></i> EDIT DATA KUNJUNGAN
                        </h5>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" action="<?php echo base_url('Kasir/print_kasir_rajal') ?>" method="post" enctype="multipart/form-data" role="form" target="_blank">
                            <input type="hidden" id="inPel" name="inPel">
                            <input type="hidden" id="inHis" name="inHis">
                            <div class="form-body">
                                <h6 class="txt-dark capitalize-font"><i class="icon-user mr-10"></i>INFO KASIR</h6>
                                <hr>
                                <div class="row">

                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">DP </label>
                                            <div class="col-md-9">
                                                <input type="number" class="form-control rounded-input" autocomplete="off" placeholder="jumlah" id="inDp" name="inDp" value="0">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">SELISIH </label>
                                            <div class="col-md-9">
                                                <input type="number" class="form-control rounded-input" autocomplete="off" placeholder="jumlah" id="inSelisih" name="inSelisih" value="0">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">DISC KONSULTASI</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control rounded-input" autocomplete="off" id="inDiskonKonsul" name="inDiskonKonsul" value="0" oninput="tampilHarga()">
                                                <span class="help-block"></span>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">DISC TINDAKAN</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control rounded-input" autocomplete="off" id="inDiskonTindakan" name="inDiskonTindakan" value="0" oninput="tampilHarga()">
                                                <span class="help-block"></span>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">DISC LABORATORIUM</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control rounded-input" autocomplete="off" id="inDiskonLabor" name="inDiskonLabor" value="0" oninput="tampilHarga()">
                                                <span class="help-block"></span>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">DISC RADIOLAGI</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control rounded-input" autocomplete="off" id="inDiskonRadio" name="inDiskonRadio" value="0" oninput="tampilHarga()">
                                                <span class="help-block"></span>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">CATATAN </label>
                                            <div class="col-md-9 has-success">
                                                <textarea class="form-control" rows="5" cols="30" autocomplete="off" id="inNote" name="inNote"></textarea>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button class="btn btn-primary btn-rounded mr-10" type="submit" name="action" value="cetak_ulang">CETAK</button>
                                        <button title="Cetak Kwitansi" class="btn btn-info btn-anim btn-rounded mr-10" type="button" onclick="kwitansi()"><i class="icon-printer"></i><span class="btn-text">CETAK KWITANSI</span></button>

                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                    <!-- /Row -->
                </div>
                <!-- /formbody -->
            </div>
        </div>

    </div>
</div>

<!-- EDIT PENDAPATAN -->
<div class="panel-wrapper collapse in">
    <div class="panel-body">
        <!-- sample modal content -->
        <div class="modal fade" id="modal_edit_pendapatan" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h5 class="modal-title mt-10" id="myLargeModalLabel"><i class="icon-user mr-10"></i> INFO PEMBAYARAN PASIEN
                        </h5>
                    </div>
                    <div class="modal-body">
                        <div id="coll_opsi_bayar" class="collapse">
                            <h6 class="txt-dark capitalize-font"><i class="icon-user mr-10"></i>INFO PEMBAYARAN</h6>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">OPSI BAYAR</label>
                                        <div class="col-md-9 has-success">
                                            <select class="form-control filled-input select2" name="edit_opsi_bayar" id="edit_opsi_bayar">
                                                <option value="cash" selected>CASH</option>
                                                <option value="transfer">TRANSFER</option>
                                                <option value="kredit">KREDIT</option>
                                                <option value="debit">DEBIT</option>
                                                <option value="asuransi" class="hide">ASURANSI</option>
                                                <option value="lainnya">LAINNYA</option>

                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 data_hide_bank1 collapse">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">JENIS BANK </label>
                                        <div class="col-md-9 has-success">
                                            <select class="form-control filled-input select2" placeholder="Choose a Category" id="edit_jenis_bank" name="edit_jenis_bank">

                                                <?php foreach ($data_bank as $row) : ?>
                                                    <option value="<?php echo $row->id_bank; ?>">
                                                        <?php echo $row->nama_bank; ?></option>
                                                <?php endforeach ?>
                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">BIAYA</label>
                                        <div class="col-md-9  has-success">
                                            <input type="text" class="form-control" autocomplete="off" id="edit_totalbayar" name="edit_totalbayar">
                                            <span class="help-block"></span>
                                            <input type="hidden" id="inPendapatan">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <center>
                                    <button title="Mengubah Opsi Bayar" onclick="editDetailKasir()" class="btn btn-warning btn-anim btn-square mr-10" type="button"><i class="icon-rocket"></i><span class="btn-text">EDIT</span></button>
                                </center>
                            </div>

                        </div>
                        <div class="table-wrap t_riwayat collapse">
                            <div class="table-responsive ">
                                <table id="tb_riwayat" class="table table-hover display">
                                    <thead>
                                        <tr class="bg-success">
                                            <th>NO</th>
                                            <th>CETAK</th>
                                            <th>EDIT</th>
                                            <th>TANGGAL</th>
                                            <th>NILAI</th>
                                            <th>OPSI BAYAR</th>
                                            <th>STAFF</th>
                                        </tr>
                                    </thead>

                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- /Row -->
                </div>
                <!-- /formbody -->
            </div>
        </div>

    </div>
</div>
<div id="div_result" style="display: none;"></div>

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
    function tampilTindakanFarmasi(id_pelayanan, id_history) {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('Kasir/getDpDisc') ?>",
            dataType: "JSON",
            data: {
                id_pelayanan: id_pelayanan,
                id_history: id_history,
            },
            success: function(data) {
                if (data.status_dt == 'found') {
                    $("#modal_edit_kasir").modal('show');
                    $('#inPel').val(id_pelayanan);
                    $('#inHis').val(id_history);
                    if (data.diskon_ == null) {
                        $('#inDiskonKonsul').val(0);
                        $('#inDiskonTindakan').val(0);
                        $('#inDiskonRadio').val(0);
                        $('#inDiskonLabor').val(0);
                    } else {
                        $('#inDiskonKonsul').val(data.diskon_.diskon_konsul);
                        $('#inDiskonTindakan').val(data.diskon_.diskon_tindakan);
                        $('#inDiskonRadio').val(data.diskon_.diskon_radio);
                        $('#inDiskonLabor').val(data.diskon_.diskon_labor);
                    }
                    $('#inDp').val(data.dp);
                    $('#inSelisih').val(data.selisih);
                    $('#inNote').val(data.note);
                    tipe = '<?php
                            $staff = $this->session->userdata('data_auth');
                            echo $staff->izin_akses;
                            ?>';
                    if (data.ket == 1 && tipe == 'input') {
                        $('#cetak').attr('disabled', 'disabled');
                    }
                } else {
                    $("#modal_edit_kasir").modal('show');
                    $('#inPel').val(id_pelayanan);
                    $('#inHis').val(id_history);
                    ('#inDiskon').val(0);
                    $('#inDp').val(0);
                }

            }
        });
    }

    function kembali(id_pelayanan, id_history) {
        swal({
            title: "Apakah kamu yakin?",
            text: "Mengembalikan pasien ini?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3cb878",
            confirmButtonText: "Yakin",
            cancelButtonText: "Batal",
            closeOnConfirm: false
        }, function() {
            $().ready(function() {
                $.ajax({
                    url: "<?php echo base_url() ?>Kasir/update_pasien_balik",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        id_pelayanan: id_pelayanan,
                        id_history: id_history,
                    },
                    success: function(data) {
                        if (data.status == "success") {
                            swal({
                                title: "good job!",
                                type: "success",
                                text: "Pasien berhasil dikembalikan",
                                confirmButtonColor: "#3cb878",
                            });
                            $('#datable').DataTable().ajax.reload();
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
        });
        return false;
    }
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
            "ajax": '<?php echo base_url('Kasir/tampil_pasien_pulang_ugd'); ?>',
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
            "ajax": '<?php echo base_url('Kasir/tampil_pasien_pulang_ugd'); ?>',
            "deferRender": true,
            "processing": true,
            "order": [],
            "columnDefs": [{
                "targets": [0],
                "orderable": false,
            }, ],
        });
    }

    function tampilRangePermit(mulai, akhir) {
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
                "url": '<?= base_url('Kasir/tampil_pasien_pulang_ugd'); ?>',
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

    function kwitansi() {
        id_pelayanan = $('#inPel').val();

        $.ajax({
            type: 'POST',
            url: "<?= base_url() . 'Kasir/cetak_kwitansi' ?>",
            data: {
                pel: id_pelayanan,
            },
            dataType: "html",
            success: function(msg) {
                $("#div_result").html(msg);
                var divContents = document.getElementById("div_result").innerHTML;
                // var a = window.open('', '', 'height=500, width=500');
                var a = window.open();
                a.document.write('<html>');
                // a.document.write('<head><style type="text/css"> @page {size: A4;margin: 0;} body { margin: 0; } </style> </head>');
                a.document.write('<body >');
                a.document.write(divContents);
                a.document.write('</body>');
                a.document.write('</html>');
                setTimeout(function() { // wait until all resources loaded 
                    a.document.close(); // necessary for IE >= 10
                    a.focus(); // necessary for IE >= 10
                    // a.print(); // change window to winPrint
                    // a.close(); // change window to winPrint
                }, 500);

            }
        });

    }
</script>

<script>
    function edit_pendapatan(id_pelayanan, id_history) {
        reload_riwayat(id_pelayanan, id_history);
        $("#modal_edit_pendapatan").modal('show');

    }

    function tampilEditOpsiBayar(id_pendapatan, ket, total, bank) {
        $('#inPendapatan').val(id_pendapatan);
        $('#edit_opsi_bayar').val(ket).change();
        $('#edit_jenis_bank').val(bank).change();
        $('#edit_totalbayar').val(total);
        $('#coll_opsi_bayar').collapse('show');

    }

    $(document).ready(function() {
        $('#edit_opsi_bayar').change(function() {
            if ($(this).val() == 'cash' || $(this).val() == 'asuransi') {

                $('.data_hide_bank1').collapse('hide');
            } else {
                $('.data_hide_bank1').collapse('show');
            }
        });

    });

    function reload_riwayat(id_pelayanan, id_history) {
        // var table;
        $('.t_riwayat').collapse('show');

        $('#tb_riwayat').dataTable().fnClearTable();
        $('#tb_riwayat').dataTable().fnDestroy();
        var table = $('#tb_riwayat').DataTable({
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
                    "sLast": "Terakhir"
                },

            },
            "ajax": {
                "url": '<?php echo base_url('Kasir/tampil_riwayat_pembayaran'); ?>',
                "type": 'POST',
                "data": function(data) {
                    data.id = id_pelayanan;
                    data.id_his = id_history;
                    data.url = "Kasir/print_riwayat_dp";

                }
            },
            "deferRender": true,
            "processing": true,
            "order": [],
            "columnDefs": [{
                "targets": [0],
                "orderable": false,
            }, ],

        });
        $('#btn-filter').click(function() { //button filter event click
            table.ajax.reload(); //just reload table
        });
        $('#btn-reset').click(function() { //button reset event click
            $('#form-filter')[0].reset();
            table.ajax.reload(); //just reload table
        });
    }

    function editDetailKasir() {
        id_pelayanan = $('#inPendapatan').val();
        opsi_bayar = $('#edit_opsi_bayar').val();
        jenis_bank = $('#edit_jenis_bank').val();
        total = $('#edit_totalbayar').val();
        swal({
            title: "Apakah kamu yakin ingin !",
            text: "Mengubah Opsi Bayar pada pasien ini?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3cb878",
            confirmButtonText: "Yakin",
            cancelButtonText: "Batal",
            showLoaderOnConfirm: true,
            closeOnConfirm: false
        }, function(isConfirm) {
            if (isConfirm) {
                $.ajax({
                    url: "<?php echo base_url() ?>Kasir/edit_pendapatan_kasir",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        id_pendapatan: id_pelayanan,
                        opsi: opsi_bayar,
                        jenis_bank: jenis_bank,
                        total: total
                    },
                    success: function(data) {
                        if (data.status == "success") {
                            swal({
                                title: "good job!",
                                type: "success",
                                text: "Pembayaran Sudah Disimpan",
                                confirmButtonColor: "#3cb878",
                            });
                            $('#tb_riwayat').DataTable().ajax.reload();
                            $('#coll_opsi_bayar').collapse('hide');

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
        });
        return false;
    }
</script>