<<<<<<< HEAD
<!-- Row -->

<div class="panel panel-default card-view">
    <div class="panel-heading">
        <div class="pull-left">
            <h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">PASIEN POLI PRIORITAS</span></h6>
        </div>
        <div class="clearfix"></div>
        <div class="row mt-30">
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
                                <th>CETAK</th>
                                <th>TANGGAL MASUK</th>
                                <th>JAM</th>
                                <th>NAMA PASIEN</th>

                                <th>JENIS KELAMIN</th>
                                <!-- <th>TEMPAT LAHIR</th> -->
                                <th>TGL LAHIR</th>
                                <th>NO HP</th>
                                <th>ALAMAT</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr class="bg-success">
                                <th>NO</th>
                                <th>CETAK</th>
                                <th>TANGGAL MASUK</th>
                                <th>JAM</th>
                                <th>NAMA PASIEN</th>

                                <th>JENIS KELAMIN</th>
                                <!-- <th>TEMPAT LAHIR</th> -->
                                <th>TGL LAHIR</th>
                                <th>NO HP</th>
                                <th>ALAMAT</th>
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
        <div class="modal fade" role="dialog" id="modal_edit_kasir" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="form-body mt-10">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel-wrapper collapse in">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-wrap">
                                                        <div class="form-body">
                                                            <div class="modal-body">
                                                                <form class="form-horizontal" action="<?php echo base_url('Kasir_pp/print_kasir_Hc') ?>" method="post" enctype="multipart/form-data" role="form">
                                                                    <input type="hidden" id="inMcu" name="inMcu">
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
                                                                                    <label class="control-label col-md-3">TANGGAL PULANG</label>
                                                                                    <div class="col-md-9">
                                                                                        <input type="datetime-local" class="form-control rounded-input" autocomplete="off" id="inTglKeluar" name="inTglKeluar" value="<?php date_default_timezone_set('Asia/Jakarta');
                                                                                                                                                                                                                        echo date("Y-m-d"); ?>">
                                                                                        <span class="help-block"></span>

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <center>
                                                                                <button class="btn btn-info btn-rounded mr-10" type="submit" name="action" value="cetakdanpulang"></i><span class="btn-text">CETAK DAN PULANG</span></button>
                                                                                <button class="btn btn-warning btn-rounded mr-10" type="submit" name="action" value="cetak">CETAK</button>
                                                                            </center>
                                                                        </div>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<style>
    td {
        color: black;
    }
</style>



<script type="text/javascript">
    // function getTotalKonsul() {
    //     biaya_rs = $('#inBiayaRs').val();
    //     biaya_jasa = $('#inBiayaJasa').val();
    //     var total = Number(biaya_rs) + Number(biaya_jasa);
    //     $('#inTotalBiaya').val(total);
    // }

    function tampilTindakanFarmasi(id_mcu) {
        
        $('#inMcu').val(id_mcu);
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('Kasir_pp/getDpDiscHc') ?>",
            dataType: "JSON",
            data: {
                id_mcu: id_mcu,
            },
            success: function(data) {
                if (data.status_dt == 'found') {
                    $('#totalbayar').val(0);
                    $('#inDiskon').val(0);
                    $('#inDp').val(0);
                    $("#modal_edit_kasir").modal('show');
                } else {
                    $("#modal_edit_kasir").modal('show');
                    $('#totalbayar').val(0);
                    $('#inDiskon').val(0);
                    $('#inDp').val(0);
                }

            }
        });

    }


    $(document).ready(function() {
        $('#datable').DataTable({
            
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
            "ajax": '<?php echo base_url('Kasir_pp/tampil_pasien_Hc'); ?>',
            "deferRender": true,
            "processing": true,
            "order": [],
            "columnDefs": [{
                "targets": [0],
                "orderable": false,
            }, ],
        });
        $('.data_hide').addClass('collapse');
        $('.data_htg').addClass('collapse');
        $('.data_asu').addClass('collapse');
        $('.data_asu').collapse('hide');
        $('#opsi_bayar').change(function() {

            var selector = '.data_hide_' + $(this).val();

            $('.data_hide').collapse('hide');

            if (selector == '.data_hide_tunai') {
                $(selector).collapse('show');
                $('.data_lanjut_asuransi').collapse('hide');
                $('.data_asu').collapse('hide');
                $('.data_lanjut_transfer').collapse('hide');
                $('.data_penghutang').collapse('hide');
                if ($('#inBayar').val() < $('#totalbayar').val()) {
                    $('.data_penghutang').collapse('show');
                } else if ($('#inBayar').val() == $('#totalbayar').val()) {
                    $('.data_penghutang').collapse('hide');
                }
            } else if (selector == '.data_hide_non-tunai') {
                $(selector).collapse('show');
                $('.data_lanjut_asuransi').collapse('hide');
                $('.data_asu').collapse('hide');
                $('.data_lanjut_transfer').collapse('hide');
                $('.data_penghutang').collapse('hide');
            } else if (selector == '.data_hide_hutang') {
                $(selector).collapse('show');
                $('.data_lanjut_asuransi').collapse('hide');
                $('.data_asu').collapse('hide');
                $('.data_lanjut_transfer').collapse('hide');
                $('.data_penghutang').collapse('hide');
            } else {
                $('.data_hide').collapse('hide');
            }
        });

        $('.data_lanjut').addClass('collapse');
        $('#opsi_lanjut').change(function() {
            var selector = '.data_lanjut_' + $(this).val();
            if (selector == '.data_lanjut_transfer') {
                $('.data_lanjut_asuransi').collapse('hide');
                $('.data_asu').collapse('hide');
                $('.data_lanjut_transfer').collapse('show');
            } else if (selector == '.data_lanjut_asuransi') {
                $('.data_lanjut_transfer').collapse('hide');
                $('.data_lanjut_asuransi').collapse('show');
                $('.data_asu_aia').collapse('hide');
            }

        });
    });
=======
<!-- Row -->

<div class="panel panel-default card-view">
    <div class="panel-heading">
        <div class="pull-left">
            <h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">PASIEN POLI PRIORITAS</span></h6>
        </div>
        <div class="clearfix"></div>
        <div class="row mt-30">
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
                                <th>CETAK</th>
                                <th>TANGGAL MASUK</th>
                                <th>JAM</th>
                                <th>NAMA PASIEN</th>

                                <th>JENIS KELAMIN</th>
                                <!-- <th>TEMPAT LAHIR</th> -->
                                <th>TGL LAHIR</th>
                                <th>NO HP</th>
                                <th>ALAMAT</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr class="bg-success">
                                <th>NO</th>
                                <th>CETAK</th>
                                <th>TANGGAL MASUK</th>
                                <th>JAM</th>
                                <th>NAMA PASIEN</th>

                                <th>JENIS KELAMIN</th>
                                <!-- <th>TEMPAT LAHIR</th> -->
                                <th>TGL LAHIR</th>
                                <th>NO HP</th>
                                <th>ALAMAT</th>
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
        <div class="modal fade" role="dialog" id="modal_edit_kasir" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="form-body mt-10">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel-wrapper collapse in">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-wrap">
                                                        <div class="form-body">
                                                            <div class="modal-body">
                                                                <form class="form-horizontal" action="<?php echo base_url('Kasir_pp/print_kasir_Hc') ?>" method="post" enctype="multipart/form-data" role="form">
                                                                    <input type="hidden" id="inMcu" name="inMcu">
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
                                                                                    <label class="control-label col-md-3">TANGGAL PULANG</label>
                                                                                    <div class="col-md-9">
                                                                                        <input type="datetime-local" class="form-control rounded-input" autocomplete="off" id="inTglKeluar" name="inTglKeluar" value="<?php date_default_timezone_set('Asia/Jakarta');
                                                                                                                                                                                                                        echo date("Y-m-d"); ?>">
                                                                                        <span class="help-block"></span>

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <center>
                                                                                <button class="btn btn-info btn-rounded mr-10" type="submit" name="action" value="cetakdanpulang"></i><span class="btn-text">CETAK DAN PULANG</span></button>
                                                                                <button class="btn btn-warning btn-rounded mr-10" type="submit" name="action" value="cetak">CETAK</button>
                                                                            </center>
                                                                        </div>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<style>
    td {
        color: black;
    }
</style>



<script type="text/javascript">
    // function getTotalKonsul() {
    //     biaya_rs = $('#inBiayaRs').val();
    //     biaya_jasa = $('#inBiayaJasa').val();
    //     var total = Number(biaya_rs) + Number(biaya_jasa);
    //     $('#inTotalBiaya').val(total);
    // }

    function tampilTindakanFarmasi(id_mcu) {
        
        $('#inMcu').val(id_mcu);
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('Kasir_pp/getDpDiscHc') ?>",
            dataType: "JSON",
            data: {
                id_mcu: id_mcu,
            },
            success: function(data) {
                if (data.status_dt == 'found') {
                    $('#totalbayar').val(0);
                    $('#inDiskon').val(0);
                    $('#inDp').val(0);
                    $("#modal_edit_kasir").modal('show');
                } else {
                    $("#modal_edit_kasir").modal('show');
                    $('#totalbayar').val(0);
                    $('#inDiskon').val(0);
                    $('#inDp').val(0);
                }

            }
        });

    }


    $(document).ready(function() {
        $('#datable').DataTable({
            
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
            "ajax": '<?php echo base_url('Kasir_pp/tampil_pasien_Hc'); ?>',
            "deferRender": true,
            "processing": true,
            "order": [],
            "columnDefs": [{
                "targets": [0],
                "orderable": false,
            }, ],
        });
        $('.data_hide').addClass('collapse');
        $('.data_htg').addClass('collapse');
        $('.data_asu').addClass('collapse');
        $('.data_asu').collapse('hide');
        $('#opsi_bayar').change(function() {

            var selector = '.data_hide_' + $(this).val();

            $('.data_hide').collapse('hide');

            if (selector == '.data_hide_tunai') {
                $(selector).collapse('show');
                $('.data_lanjut_asuransi').collapse('hide');
                $('.data_asu').collapse('hide');
                $('.data_lanjut_transfer').collapse('hide');
                $('.data_penghutang').collapse('hide');
                if ($('#inBayar').val() < $('#totalbayar').val()) {
                    $('.data_penghutang').collapse('show');
                } else if ($('#inBayar').val() == $('#totalbayar').val()) {
                    $('.data_penghutang').collapse('hide');
                }
            } else if (selector == '.data_hide_non-tunai') {
                $(selector).collapse('show');
                $('.data_lanjut_asuransi').collapse('hide');
                $('.data_asu').collapse('hide');
                $('.data_lanjut_transfer').collapse('hide');
                $('.data_penghutang').collapse('hide');
            } else if (selector == '.data_hide_hutang') {
                $(selector).collapse('show');
                $('.data_lanjut_asuransi').collapse('hide');
                $('.data_asu').collapse('hide');
                $('.data_lanjut_transfer').collapse('hide');
                $('.data_penghutang').collapse('hide');
            } else {
                $('.data_hide').collapse('hide');
            }
        });

        $('.data_lanjut').addClass('collapse');
        $('#opsi_lanjut').change(function() {
            var selector = '.data_lanjut_' + $(this).val();
            if (selector == '.data_lanjut_transfer') {
                $('.data_lanjut_asuransi').collapse('hide');
                $('.data_asu').collapse('hide');
                $('.data_lanjut_transfer').collapse('show');
            } else if (selector == '.data_lanjut_asuransi') {
                $('.data_lanjut_transfer').collapse('hide');
                $('.data_lanjut_asuransi').collapse('show');
                $('.data_asu_aia').collapse('hide');
            }

        });
    });
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
</script>