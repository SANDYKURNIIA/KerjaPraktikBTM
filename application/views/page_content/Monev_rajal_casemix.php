<!-- Row -->

<div class="panel panel-default card-view">
    <div class="panel-heading">
        <div class="pull-left">
            <h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">PASIEN RAWAT JALAN</span></h6>
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
                                <th>TANGGAL MASUK</th>
                                <th>NO RM</th>
                                <th>NAMA</th>
                                <th>POLI</th>
                                <th>CARA BAYAR</th>
                                <th>STATUS RAWAT</th>
                                <th>DIAGNOSA</th>
                                <th>LABOR</th>
                                <th>RADIOLOGI</th>
                                <th>APELKES</th>
                                <th>OK</th>
                                <th>OBAT OK</th>
                                <th>APOTIK</th>
                                <th>TOTAL UNIT COST</th>
                                <th>TOTAL JASA</th>
                                <th>TOTAL SARANA</th>
                                <th>GRAND TOTAL</th>
                                <th>INACBG</th>
                                <th>INACBG - TARIF</th>
                                <th>INACBG - UNITCOST</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th colspan="7" style="text-align:right; font-weight: bold; font-family: Arial, Helvetica, sans-serif; font-size: 16px;">Total:</th>
                                <th style="font-weight: bold; font-family: Arial, Helvetica, sans-serif; font-size: 16px;"></th>
                                <th style="font-weight: bold; font-family: Arial, Helvetica, sans-serif; font-size: 16px;"></th>
                                <th style="font-weight: bold; font-family: Arial, Helvetica, sans-serif; font-size: 16px;"></th>
                                <th style="font-weight: bold; font-family: Arial, Helvetica, sans-serif; font-size: 16px;"></th>
                                <th style="font-weight: bold; font-family: Arial, Helvetica, sans-serif; font-size: 16px;"></th>
                                <th style="font-weight: bold; font-family: Arial, Helvetica, sans-serif; font-size: 16px;"></th>
                                <th style="font-weight: bold; font-family: Arial, Helvetica, sans-serif; font-size: 16px;"></th>
                                <th style="font-weight: bold; font-family: Arial, Helvetica, sans-serif; font-size: 16px;"></th>
                                <th style="font-weight: bold; font-family: Arial, Helvetica, sans-serif; font-size: 16px;"></th>
                                <th style="font-weight: bold; font-family: Arial, Helvetica, sans-serif; font-size: 16px;"></th>
                                <th style="font-weight: bold; font-family: Arial, Helvetica, sans-serif; font-size: 16px;"></th>
                                <th style="font-weight: bold; font-family: Arial, Helvetica, sans-serif; font-size: 16px;"></th>
                                <th style="font-weight: bold; font-family: Arial, Helvetica, sans-serif; font-size: 16px;"></th>
                                <th style="font-weight: bold; font-family: Arial, Helvetica, sans-serif; font-size: 16px;"></th>
                            </tr>
                        </tfoot>
                    </table>
                    <span id="hasil"></span>
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
    function convertToRupiah(angka) {
        var rupiah = '';
        var angkarev = angka.toString().split('').reverse().join('');
        for (var i = 0; i < angkarev.length; i++)
            if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + '.';
        return 'Rp.' + rupiah.split('', rupiah.length - 1).reverse().join('');
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
            "ajax": '<?php echo base_url('Casemix/tampil_monev_rajal'); ?>',
            "deferRender": true,
            "processing": true,
            "order": [],
            "columnDefs": [{
                "targets": [0],
                "orderable": false,
            }, ],
            "footerCallback": function(row, data, start, end, display, unit) {
                var api = this.api(),
                    data;

                // Remove the formatting to get integer data for summation

                String.prototype.replaceArray = function(find, replace) {
                    var replaceString = this;
                    var regex;
                    for (var i = 0; i < find.length; i++) {
                        regex = new RegExp(find[i], "g");
                        replaceString = replaceString.replace(regex, replace[i]);
                    }
                    return replaceString;
                };
                var intVal = function(i) {
                    if (typeof i === 'string') {
                        var find = ['<span class="label label-danger">', '<span class="label label-success">', "\n"];
                        var replace = ['', '', ''];

                        return (i.replaceArray(find, replace) * 1)
                    }

                    return typeof i === 'number' ?
                        i : 0;

                };

                // Total over this page
                var labor = api
                    .column(9, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                var radiologi = api
                    .column(10, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);
                var apelkes = api
                    .column(11, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                var ok = api
                    .column(12, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                var obat_ok = api
                    .column(13, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                var apotik = api
                    .column(14, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);
                var unitCost = api
                    .column(15, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                var gTotal = api
                    .column(16, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                var inacbg = api
                    .column(17, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                var inacbg_tarif = api
                    .column(18, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                var inacbg_unitcost = api
                    .column(19, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                // Update footer
                $(api.column(9).footer()).html(
                    convertToRupiah(labor)
                );
                $(api.column(10).footer()).html(
                    convertToRupiah(radiologi)
                );
                $(api.column(11).footer()).html(
                    convertToRupiah(apelkes)
                );
                $(api.column(12).footer()).html(
                    convertToRupiah(ok)
                );
                $(api.column(13).footer()).html(
                    convertToRupiah(obat_ok)
                );
                $(api.column(14).footer()).html(
                    convertToRupiah(apotik)
                );
                $(api.column(15).footer()).html(
                    convertToRupiah(unitCost)
                );
                $(api.column(16).footer()).html(
                    convertToRupiah(gTotal)
                );
                $(api.column(17).footer()).html(
                    convertToRupiah(inacbg)
                );
                $(api.column(18).footer()).html(
                    convertToRupiah(inacbg_tarif)
                );
                $(api.column(19).footer()).html(
                    convertToRupiah(inacbg_unitcost)
                );

            },
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
            "ajax": '<?php echo base_url('Casemix/tampil_monev_rajal'); ?>',
            "deferRender": true,
            "processing": true,
            "order": [],
            "columnDefs": [{
                "targets": [0],
                "orderable": false,
            }, ],
            "footerCallback": function(row, data, start, end, display, unit) {
                var api = this.api(),
                    data;

                // Remove the formatting to get integer data for summation

                String.prototype.replaceArray = function(find, replace) {
                    var replaceString = this;
                    var regex;
                    for (var i = 0; i < find.length; i++) {
                        regex = new RegExp(find[i], "g");
                        replaceString = replaceString.replace(regex, replace[i]);
                    }
                    return replaceString;
                };
                var intVal = function(i) {
                    if (typeof i === 'string') {
                        var find = ['<span class="label label-danger">', '<span class="label label-success">', "\n"];
                        var replace = ['', '', ''];

                        return (i.replaceArray(find, replace) * 1)
                    }

                    return typeof i === 'number' ?
                        i : 0;

                };

                // Total over this page
                var labor = api
                    .column(9, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                var radiologi = api
                    .column(10, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);
                var apelkes = api
                    .column(11, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                var ok = api
                    .column(12, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                var obat_ok = api
                    .column(13, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                var apotik = api
                    .column(14, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);
                var unitCost = api
                    .column(15, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                var gTotal = api
                    .column(16, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                var inacbg = api
                    .column(17, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                var inacbg_tarif = api
                    .column(18, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                var inacbg_unitcost = api
                    .column(19, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                // Update footer
                $(api.column(9).footer()).html(
                    convertToRupiah(labor)
                );
                $(api.column(10).footer()).html(
                    convertToRupiah(radiologi)
                );
                $(api.column(11).footer()).html(
                    convertToRupiah(apelkes)
                );
                $(api.column(12).footer()).html(
                    convertToRupiah(ok)
                );
                $(api.column(13).footer()).html(
                    convertToRupiah(obat_ok)
                );
                $(api.column(14).footer()).html(
                    convertToRupiah(apotik)
                );
                $(api.column(15).footer()).html(
                    convertToRupiah(unitCost)
                );
                $(api.column(16).footer()).html(
                    convertToRupiah(gTotal)
                );
                $(api.column(17).footer()).html(
                    convertToRupiah(inacbg)
                );
                $(api.column(18).footer()).html(
                    convertToRupiah(inacbg_tarif)
                );
                $(api.column(19).footer()).html(
                    convertToRupiah(inacbg_unitcost)
                );

            },
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
                "url": '<?= base_url('Casemix/tampil_Range_Monev_rajal'); ?>',
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
            "footerCallback": function(row, data, start, end, display, unit) {
                var api = this.api(),
                    data;

                // Remove the formatting to get integer data for summation

                String.prototype.replaceArray = function(find, replace) {
                    var replaceString = this;
                    var regex;
                    for (var i = 0; i < find.length; i++) {
                        regex = new RegExp(find[i], "g");
                        replaceString = replaceString.replace(regex, replace[i]);
                    }
                    return replaceString;
                };
                var intVal = function(i) {
                    if (typeof i === 'string') {
                        var find = ['<span class="label label-danger">', '<span class="label label-success">', "\n"];
                        var replace = ['', '', ''];

                        return (i.replaceArray(find, replace) * 1)
                    }

                    return typeof i === 'number' ?
                        i : 0;

                };

                // Total over this page
                var labor = api
                    .column(8, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                var radiologi = api
                    .column(9, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);
                var apelkes = api
                    .column(10, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                var ok = api
                    .column(11, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                var obat_ok = api
                    .column(12, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                var apotik = api
                    .column(13, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);
                var unitCost = api
                    .column(14, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                var jasa = api
                    .column(15, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                var sarana = api
                    .column(16, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                var gTotal = api
                    .column(17, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                var inacbg = api
                    .column(18, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                var inacbg_tarif = api
                    .column(19, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                var inacbg_unitcost = api
                    .column(20, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                // Update footer
                $(api.column(8).footer()).html(
                    convertToRupiah(labor)
                );
                $(api.column(9).footer()).html(
                    convertToRupiah(radiologi)
                );
                $(api.column(10).footer()).html(
                    convertToRupiah(apelkes)
                );
                $(api.column(11).footer()).html(
                    convertToRupiah(ok)
                );
                $(api.column(12).footer()).html(
                    convertToRupiah(obat_ok)
                );
                $(api.column(13).footer()).html(
                    convertToRupiah(apotik)
                );
                $(api.column(14).footer()).html(
                    convertToRupiah(unitCost)
                );
                $(api.column(15).footer()).html(
                    convertToRupiah(jasa)
                );
                $(api.column(16).footer()).html(
                    convertToRupiah(sarana)
                );
                $(api.column(17).footer()).html(
                    convertToRupiah(gTotal)
                );
                $(api.column(18).footer()).html(
                    convertToRupiah(inacbg)
                );
                $(api.column(19).footer()).html(
                    convertToRupiah(inacbg_tarif)
                );
                $(api.column(20).footer()).html(
                    convertToRupiah(inacbg_unitcost)
                );

            },
        });
    }
</script>