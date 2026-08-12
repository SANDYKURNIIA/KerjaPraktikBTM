<div class="panel panel-default card-view">
    <div class="panel-heading">
        <div class="pull-left">
            <h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">LAPORAN OBAT</span>
            </h6>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="panel-wrapper collapse in">
        <div class="panel-body">
            <div class="row mt-30">
                <div class="col-md-12">

                    <div class="col-md-5">
                        <label class="mt-0 txt-dark">PERIODE : </label>
                        <input type="month" autocomplete="off" id="inBulan" class="form-control">
                    </div>

                    <div class="col-md-1 mt-20">
                        <button class="btn btn-primary btn-anim btn-sm1" onclick="tampilRangePermit();"><i class="icon-rocket"></i><span class="btn-text">PILIH</span>

                    </div>
                   
                </div>
            </div>

            <br>
            <br>
            <div class="table-wrap">
                <!-- <p id="notif_load" style="color:red;">Loading data, Please wait</p> -->

                <div class="table-responsive">
                    <table class="table table-hover display  pb-30" id="datable">
                        <thead>
                            <tr class="bg-success">
                                <th>KODE</th>
                                <th>NAMA BARANG</th>
                                <th>PRODUSEN</th>
                                <th>DISTRIBUTOR</th>
                                <th>SATUAN</th>
                                <th>HNA + PPN</th>
                                <th>HARGA BELI (TANPA PPN)</th>
                                <th>HARGA PERSEDIAAN</th>
                                <th>TANGGAL FAKTUR</th>
                                <th>TANGGAL EXP</th>
                                <th>STOCK AWAL <br> Qty</th>
                                <th>PENERIMAAN<br>Qty</th>
                                <th>PEMAKAIAN<br>Qty</th>
                                <th>STOCK AKHIR<br>Qty</th>
                                <th>NILAI STOCK AWAL<br> Rp.</th>
                                <th>NILAI TERIMA<br>Rp.</th>
                                <th>NILAI PAKAI<br>Rp.</th>
                                <th>NILAI STOCK AKHIR<br>Rp.</th>
                                <!-- <th>NILAI PERSEDIAAN<br>Rp.</th> -->
                                <th>GOLONGAN SEDIAAN</th>
                                <th>FOPI/NON FOPI</th>
                                <th>KODE FOPI</th>
                                <?php if ($tipe == 'all') { ?>
                                <th>UNIT</th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th colspan="8" style="text-align:right; font-weight: bold; font-family: Arial, Helvetica, sans-serif; font-size: 16px;">Total:</th>
                                <th style="font-weight: bold; font-family: Arial, Helvetica, sans-serif; font-size: 16px;"></th>
                                <th style="font-weight: bold; font-family: Arial, Helvetica, sans-serif; font-size: 16px;"></th>
                                <th style="font-weight: bold; font-family: Arial, Helvetica, sans-serif; font-size: 16px;"></th>
                                <th style="font-weight: bold; font-family: Arial, Helvetica, sans-serif; font-size: 16px;"></th>
                                <th style="font-weight: bold; font-family: Arial, Helvetica, sans-serif; font-size: 16px;"></th>
                                <th style="font-weight: bold; font-family: Arial, Helvetica, sans-serif; font-size: 16px;"></th>
                                <th style="font-weight: bold; font-family: Arial, Helvetica, sans-serif; font-size: 16px;"></th>
                                <!-- <th style="font-weight: bold; font-family: Arial, Helvetica, sans-serif; font-size: 16px;"></th> -->
                                <th></th>
                                <th></th>
                                <th></th>
                                <?php if ($tipe == 'all') { ?>
                                <th></th>
                                <?php } ?>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Cetak -->
<style>
    td {
        color: black;
    }
</style>
<script type="text/javascript">
    function convertToRupiah(angka) {
        var rupiah = '';
        var angkarev = angka.toString().split('').reverse().join('');
        for (var i = 0; i < angkarev.length; i++)
            if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + '.';
        return rupiah.split('', rupiah.length - 1).reverse().join('');
    }
    $(document).ready(function() {
        $('#datable').DataTable({
            "dom": 'Bfrtip',
            "buttons": ['csv', 'excel', 'pdf'],
            "paging": false,
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
                "url": '<?= base_url($url); ?>',
                "type": 'POST',
                "data": {
                    periode: '<?= date('Y-m') ?>',
                    tipe:'<?=$tipe?>'

                },
            },
            "deferRender": true,
            "processing": true,
            "order": [],
            "columnDefs": [{
                "targets": [0],
                "orderable": false,
            }, ],
            "footerCallback": function(row, data, start, end, display) {
                var api = this.api(),
                    data;

                // Remove the formatting to get integer data for summation
                var intVal = function(i) {
                    return typeof i === 'string' ?
                        i.replace(/[\Rp.]/g, '') * 1 :
                        typeof i === 'number' ?
                        i : 0;
                };

                // Total over this page
                pageTotal_6 = api.column(6, {
                    page: 'current'
                }).data().reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);
                pageTotal_7 = api.column(7, {
                    page: 'current'
                }).data().reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);
                pageTotal_8 = api.column(8, {
                    page: 'current'
                }).data().reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);
                pageTotal_9 = api.column(9, {
                    page: 'current'
                }).data().reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);
                pageTotal_10 = api.column(10, {
                    page: 'current'
                }).data().reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);
                pageTotal_11 = api.column(11, {
                    page: 'current'
                }).data().reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);
                pageTotal_12 = api.column(12, {
                    page: 'current'
                }).data().reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);
                pageTotal_13 = api.column(13, {
                    page: 'current'
                }).data().reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

                // Update footer
                $(api.column(6).footer()).html((pageTotal_6));
                $(api.column(7).footer()).html((pageTotal_7));
                $(api.column(8).footer()).html((pageTotal_8));
                $(api.column(9).footer()).html((pageTotal_9));
                $(api.column(10).footer()).html((pageTotal_10));
                $(api.column(11).footer()).html((pageTotal_11));
                $(api.column(12).footer()).html((pageTotal_12));
                $(api.column(13).footer()).html((pageTotal_13));

            },
        });
    });


    function tampilRangePermit() {
        $('#datable').DataTable().destroy();
        periode = $("#inBulan").val();
        $('#datable').DataTable({
            "retrieve": true,
            "dom": 'Bfrtip',
            "buttons": ['csv', 'excel', 'pdf'],
            "paging": false,
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
                "url": '<?= base_url($url); ?>',
                "type": 'POST',
                "data": {
                    periode: periode,
                    tipe:'<?=$tipe?>'
                },
            },
            "deferRender": true,
            "processing": true,
            "order": [],
            "columnDefs": [{
                "targets": [0],
                "orderable": false,
            }, ],
            "footerCallback": function(row, data, start, end, display) {
                var api = this.api(),
                    data;

                // Remove the formatting to get integer data for summation
                var intVal = function(i) {
                    return typeof i === 'string' ?
                        i.replace(/[\Rp.]/g, '') * 1 :
                        typeof i === 'number' ?
                        i : 0;
                };

                // Total over this page
                pageTotal_6 = api.column(6, {
                    page: 'current'
                }).data().reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);
                pageTotal_7 = api.column(7, {
                    page: 'current'
                }).data().reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);
                pageTotal_8 = api.column(8, {
                    page: 'current'
                }).data().reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);
                pageTotal_9 = api.column(9, {
                    page: 'current'
                }).data().reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);
                pageTotal_10 = api.column(10, {
                    page: 'current'
                }).data().reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);
                pageTotal_11 = api.column(11, {
                    page: 'current'
                }).data().reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);
                pageTotal_12 = api.column(12, {
                    page: 'current'
                }).data().reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);
                pageTotal_13 = api.column(13, {
                    page: 'current'
                }).data().reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

                // Update footer
                $(api.column(6).footer()).html((pageTotal_6));
                $(api.column(7).footer()).html((pageTotal_7));
                $(api.column(8).footer()).html((pageTotal_8));
                $(api.column(9).footer()).html((pageTotal_9));
                $(api.column(10).footer()).html((pageTotal_10));
                $(api.column(11).footer()).html((pageTotal_11));
                $(api.column(12).footer()).html((pageTotal_12));
                $(api.column(13).footer()).html((pageTotal_13));

            },
        });
    }


</script>