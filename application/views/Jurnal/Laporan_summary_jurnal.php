<!-- Row -->

<div class="panel panel-default card-view">
    <div class="panel-heading">
        <div class="pull-left">
            <h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">LAPORAN SUMMARY JURNAL</span></h6>
        </div>
        <div class="clearfix"></div>

        <div class="row mt-30">
            <div class="col-md-12">
                <div class="col-md-3 mt-20">
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
                <div class="col-md-3">
                    <!-- <label class="mt-0 txt-dark">Jenis Klaim :</label> -->
                    <!-- <div class="col-md-2 has-success"> -->
                    <!-- <select class="form-control select2" placeholder="Choose a Category" name="jenis_klaim" id="jenis_klaim">
                        <option value="BPJS">BPJS</option>
                        <option value="UMUM">UMUM</option>
                        <option value="MITRA">MITRA</option>
                        <option value="TIMAH">TIMAH</option>
                        <option value="INTERNAL">INTERNAL RSBT</option>
                        <option value="LAINNYA">ASURANSI LAINNYA</option>
                    </select> -->
                    <!-- </div> -->
                </div>
                <div class="col-md-3 mt-20">
                    <button class="btn btn-primary btn-anim btn-sm1 mr-10" onclick="tampilRangePermit();"><i class="icon-rocket"></i><span class="btn-text">PILIH</span>
                        <!-- <button class="btn btn-info btn-anim btn-sm1 " onclick="setJurnal();"><i class="icon-rocket"></i><span class="btn-text">Jurnal</span> -->

                </div>
                <div class="col-md-3 mt-20">
                </div>
            </div>
        </div>

    </div>
    <div class="panel-wrapper collapse in">
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
                                <th>CETAK</th>
                                <th>DETAIL</th>
                                <th>KWITANSI</th>
                                <th>INVOICE</th>
                                <th>PENAGIHAN</th>
                                <th>TANGGAL JURNAL</th>
                                <th>NO JURNAL</th>
                                <th>TOTAL</th>
                                <th>STAFF</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr class="bg-success">
                                <th>NO</th>
                                <th>CETAK</th>
                                <th>DETAIL</th>
                                <th>KWITANSI</th>
                                <th>INVOICE</th>
                                <th>PENAGIHAN</th>
                                <th>TANGGAL JURNAL</th>
                                <th>NO JURNAL</th>
                                <th>TOTAL</th>
                                <th>STAFF</th>
                            </tr>
                        </tfoot>
                    </table>

                </div>
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
            "ajax": '<?php echo base_url('Jurnal_keuangan/tampil_summary_jurnal'); ?>',
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
            "ajax": '<?php echo base_url('Jurnal_keuangan/tampil_summary_jurnal'); ?>',
            "deferRender": true,
            "processing": true,
            "order": [],
            "columnDefs": [{
                "targets": [0],
                "orderable": false,
            }, ],
        });
    }

    function tampilRangePermit(mulai, akhir, jenis_klaim) {
        $('#datable').DataTable().destroy();
        mulai = $("#inTglMulai").val();
        akhir = $("#inTglAkhir").val();
        jenis_klaim = $('#jenis_klaim').val();
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
                "url": '<?= base_url('Jurnal_keuangan/tampil_summary_jurnal'); ?>',
                "type": 'POST',
                "data": {
                    mulai: mulai,
                    akhir: akhir,
                    jenis_klaim: jenis_klaim
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

    function setJurnal(no_jurnal, tgl, staff, jk) {

        $.ajax({
            type: 'POST',
            url: "<?= base_url() . 'Jurnal_keuangan/cetak_jurnal' ?>",
            data: {
                no_jurnal: no_jurnal,
                tgl: tgl,
                staff: staff,
                jk: jk,
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

    function detail(no_jurnal, tgl, staff, pk) {

        $.ajax({
            type: 'POST',
            url: "<?= base_url() . 'Jurnal_keuangan/cetak_detail_pdf' ?>",
            data: {
                no_jurnal: no_jurnal,
                tgl: tgl,
                staff: staff,
                pk: pk,
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

    function kwitansi(no_jurnal, tgl, staff, pk) {

        $.ajax({
            type: 'POST',
            url: "<?= base_url() . 'Jurnal_keuangan/cetak_kwitansi' ?>",
            data: {
                no_jurnal: no_jurnal,
                tgl: tgl,
                staff: staff,
                pk: pk,
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

    function penagihan(no_jurnal, tgl, staff, pk) {

        $.ajax({
            type: 'POST',
            url: "<?= base_url() . 'Jurnal_keuangan/cetak_penagihan' ?>",
            data: {
                no_jurnal: no_jurnal,
                tgl: tgl,
                staff: staff,
                pk: pk,
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

    function invoice(no_jurnal, tgl, staff, pk) {

$.ajax({
    type: 'POST',
    url: "<?= base_url() . 'Jurnal_keuangan/cetak_invoice' ?>",
    data: {
        no_jurnal: no_jurnal,
        tgl: tgl,
        staff: staff,
        pk: pk,
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