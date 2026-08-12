<div class="panel panel-default card-view">
    <div class="panel-heading">
        <div class="pull-left">
            <h6 class="panel-title txt-dark"><span class="span span-success">JURNAL PENYUSUTAN</span></h6>
        </div>

        <div class="clearfix"></div>
        <div class="row mt-30">
            <div class="col-md-12">
                <div class="col-md-3 mt-20">
                    <button class="btn btn-primary btn-anim btn-sm" onclick="cetak();"><i class="icon-printer"></i><span class="btn-text">CETAK </span>
                </div>


            </div>
        </div>
    </div>

    <div align="right">
        <button class="btn btn-primary btn-anim mr-50" style="margin-right: 40px;" data-toggle="modal" data-target=".modal-pendaftaranakun"><i class="icon-plus"></i><span class="btn-text">TAMBAH</span></button>
    </div>

    <div align="right" class="col-md-12 has-error">
        <label for="tanggal_masuk1" class="col-sm-2 control-label">
            <p>&nbsp;</p>
        </label>
    </div>

    <div class="panel-wrapper collapse in">
        <div class="panel-body">
            <!-- <form id="form-filter" class="form-horizontal"> -->
            <div class="form-group">



                <div class="row mt-30">
                    <!-- <div class="col-md-12">
                        <div class="col-md-3 mt-20">
                            <button class="btn btn-primary btn-anim btn-sm" onclick="tampilHariIni();"><i class="icon-rocket"></i><span class="btn-text">HARI INI </span></button>
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
                            <button class="btn btn-primary btn-anim btn-sm1" onclick="tampilRangePo();"><i class="icon-rocket"></i><span class="btn-text">PILIH</span></button>
                        </div>
                    </div> -->
                </div>

                <!-- <div class="form-group">

                </div> -->


                <div class="table-wrap">
                    <!-- <p id="notif_load" style="color:red;">Loading data, Please wait</p> -->

                    <div class="table-responsive">
                        <table class="table table-hover display  pb-30" id="datable">
                            <thead>
                                <tr class="bg-success">
                                    <th>NO</th>
                                    <th>HAPUS</th>
                                    <th>NO ASSET</th>
                                    <th>NAMA ASET</th>
                                    <th>NO SERI</th>
                                    <th>LOKASI</th>
                                    <th>KONDISI</th>
                                    <th>VENDOR</th>
                                    <th>JENIS ASET</th>
                                    <th>TANGGAL PEROLEHAN</th>
                                    <th>HARGA PEROLEHAN</th>
                                    <th>MASA MANFAAT</th>
                                    <th>PENYUSUTAN PER BULAN</th>
                                    <th>AKUMULASI DEPRESIASI</th>
                                    <th>NILAI BUKU</th>

                                </tr>
                            </thead>
                            <tbody style="color: black">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--data table-->

    <!--modal yang akan dipakai-->

    <div class="panel-wrapper collapse in">
        <div class="panel-body">
            <!-- sample modal content -->

            <div class="modal fade modal-pendaftaranakun" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <p>TINDAKAN FAKTUR</p>
                            <p><i class="icon-people mr-10"></i>INFO FAKTUR</p>

                        </div>
                        <div class="modal-body">
                            <!-- Form body  -->

                            <div class="form-body mt-20">

                                <form id="form_asset">
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">NO ASSET</label>
                                            <div class="col-md-9 has-success">
                                                <input type="text" class="form-control" placeholder="NO ASSET" id="no_asset">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">NAMA ASSET</label>
                                            <div class="col-md-9 has-success">
                                                <input type="text" class="form-control" placeholder="NAMA ASSET" id="item_asset">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">NO SERI</label>
                                            <div class="col-md-9 has-success">
                                                <input type="text" class="form-control" placeholder="NO SERI" id="no_seri">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">LOKASI</label>
                                            <div class="col-md-9 has-success">
                                                <input type="text" class="form-control" placeholder="LOKASI" id="lokasi">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">KONDISI</label>
                                            <div class="col-md-9 has-success">
                                                <select class="form-control filled-input select2" name="kondisi" id="kondisi">

                                                    <option value="-">PILIH</option>
                                                    <?php
                                                    foreach ($kondisi as $row) :
                                                    ?>
                                                        <option value="<?php echo $row["kode"]; ?>"><?php echo $row["nama"]; ?></option>

                                                    <?php endforeach; ?>
                                                </select>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">VENDOR</label>
                                            <div class="col-md-9 has-success">
                                                <input type="text" class="form-control" placeholder="VENDOR" id="vendor">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">JENIS ASSET</label>
                                            <div class="col-md-9 has-success">
                                                <select class="form-control filled-input select2" name="jenis" id="jenis">

                                                    <option value="-">PILIH</option>
                                                    <?php
                                                    foreach ($jenis as $row) :
                                                    ?>
                                                        <option value="<?php echo $row["id"]; ?>"><?php echo $row["jenis"]; ?></option>

                                                    <?php endforeach; ?>
                                                </select>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">TANGGAL PEROLEHAN</label>
                                            <div class="col-md-9 has-success">
                                                <input type="date" value="<?php echo date("Y-m-d"); ?>" id="tgl" name="tgl" data-toggle="datepicker" class="form-control filled-input" autocomplete="off"></input>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">HARGA PEROLEHAN</label>
                                            <div class="col-md-9 has-success">
                                                <input type="text" class="form-control" placeholder="HARGA PEROLEHAN" id="harga">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <div class="modal-footer mb-10 mr-15">

                            <button onclick="insertFaktur()" class="btn btn-success btn-anim  btn-sm" type="button"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span></button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="div_result"></div>



<script type="text/javascript">
    function cetak() {


        var divContents = document.getElementById("div_result").innerHTML;
        // var a = window.open('', '', 'height=500, width=500');
        var a = window.open();
        a.document.write('<html>');
        // a.document.write('<head><style type="text/css"> @page {size: A4;margin: 0;} body { margin: 0; } </style> </head>');
        a.document.write('<body >');
        a.document.write(divContents);
        a.document.write('</body>');
        a.document.write('</html>');
        a.document.close();
        a.print();

    }

    function insertFaktur() {

        no_asset = $('#no_asset').val();
        item_asset = $('#item_asset').val();
        no_seri = $('#no_seri').val();
        lokasi = $('#lokasi').val();
        kondisi = $('#kondisi').val();
        vendor = $('#vendor').val();
        jenis = $('#jenis').val();
        tgl = $('#tgl').val();
        harga = $('#harga').val();

        dataString = '&no_asset=' + no_asset + '&item_asset=' + item_asset +
            '&no_seri=' + no_seri + '&lokasi=' + lokasi +
            '&kondisi=' + kondisi + '&vendor=' + vendor + '&jenis=' + jenis +
            '&tgl=' + tgl + '&harga=' + harga;

        $().ready(function() {
            $.ajax({
                url: "<?php echo base_url() ?>Jurnal_onuse/insertFaktur",
                method: "POST",
                dataType: 'json',
                data: dataString,
                success: function(data) {
                    if (data.status == "success") {
                        swal({
                            title: "good job!",
                            type: "success",
                            text: "Asset " + item_asset + " Berhasil ditambahkan",
                            confirmButtonColor: "#3cb878",
                        });
                        $('#form_asset')[0].reset();
                        //$('#username_result').html("");
                        $('#datable').DataTable().ajax.reload();
                        $(".modal-pendaftaranakun").modal('hide');
                        // $('#isiFaktur').DataTable().ajax.reload();
                        // location.reload();

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
        return false;
    }

    //hapus struk

    function hapus_faktur(id_faktur, nama) {
        swal({
            title: "Apakah kamu yakin?",
            text: "Menghapus data " + nama + "?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3cb878",
            confirmButtonText: "Yakin",
            cancelButtonText: "Batal",
            closeOnConfirm: false
        }, function() {
            $().ready(function() {
                $.ajax({
                    url: "<?php echo base_url() ?>Jurnal_onuse/hapus_faktur",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        id_faktur: id_faktur,
                    },
                    success: function(data) {
                        if (data.status == "success") {
                            swal({
                                title: "good job!",
                                type: "success",
                                text: "Data Berhasil dihapus",
                                confirmButtonColor: "#3cb878",
                            });
                            //$("#modalTambahObatFaktur").modal('show');
                            //$('#isiFaktur').DataTable().ajax.reload();
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

    //end hapus struk

    //isi


    //end harga 2

    //uang

    function convertToRupiah(angka) {
        var rupiah = '';
        var angkarev = angka.toString().split('').reverse().join('');
        for (var i = 0; i < angkarev.length; i++)
            if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + '.';
        return 'Rp. ' + rupiah.split('', rupiah.length - 1).reverse().join('');
    }
</script>
<!--percobaan1-->
<script type="text/javascript">
    $(document).ready(function() {


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
            "ajax": '<?php echo base_url('Jurnal_onuse/tampil_data_penyusutan'); ?>',
            "deferRender": true,
            "processing": true,
            "order": [],
            "columnDefs": [{
                "targets": [0],
                "orderable": false,
            }, ],
        });
    });

    //tampil hari ini 

    // function tampilHariIni() {
    //     $('#datable').DataTable().destroy();
    //     $('#datable').DataTable({
    //         "retrieve": true,
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
    //         "ajax": '<?php echo base_url('Usulan_perencanaan/tampil_data'); ?>',
    //         "deferRender": true,
    //         "processing": true,
    //         "order": [],
    //         "columnDefs": [{
    //             "targets": [0],
    //             "orderable": false,
    //         }, ],
    //     });
    // }

    // //end tampil hari ini

    // //tampil range data

    // function tampilRangePo(mulai, akhir) {
    //     $('#datable').DataTable().destroy();
    //     mulai = $("#inTglMulai").val();
    //     akhir = $("#inTglAkhir").val();
    //     $('#datable').DataTable({
    //         "retrieve": true,
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
    //             "url": '<?= base_url('Usulan_perencanaan/tampil_range'); ?>',
    //             "type": 'POST',
    //             "data": {
    //                 mulai: mulai,
    //                 akhir: akhir
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

    //end tampil range data
</script>


<!--end tampil data-->