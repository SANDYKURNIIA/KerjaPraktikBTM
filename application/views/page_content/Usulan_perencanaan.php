<div class="panel panel-default card-view">
    <div class="panel-heading">
        <div class="pull-left">
            <h6 class="panel-title txt-dark"><span class="span span-success">USULAN PERENCANAAN</span></h6>
        </div>



        <div class="clearfix"></div>
    </div>

    <div align="right">
        <button class="btn btn-primary btn-anim mr-50" style="margin-right: 40px;" data-toggle="modal" data-target=".modal-pendaftaranakun"><i class="icon-plus"></i><span class="btn-text">TAMBAH
        FAKTUR</span></button>
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
                        <div class="col-md-12">
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
                        </div>
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
                                    <th>CETAK</th>
                                    <th>PILIH</th>
                                    <th>HAPUS</th>
                                    <th>EDIT</th>
                                    <th>NO DOKUMENT</th>
                                    <th>TANGGAL INPUT</th>
                                    <th>TANGGAL USULAN</th>


                                </tr>
                            </thead>
                            <tbody style="color: black">

                                <!--percobaan nampilin data-->



                                <!--end percobaan penampilan data-->

                            </tbody>
                        </table>
                    </div>
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

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Tanggal</label>
                                        <div class="col-md-9 has-success">
                                            <input type="date" placeholder="TANGGAL MASUK" value="<?php echo date("Y-m-d"); ?>" id="tgl_faktur" name="tgl_faktur" data-toggle="datepicker" class="form-control filled-input" autocomplete="off"></input>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>

                                <!-- span -->


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">NO DOKUMEN</label>
                                        <div class="col-md-9 has-success">
                                            <!--ajax-->

                                            <?php
                                            
                                            date_default_timezone_set('Asia/Jakarta');
                                            date("Y-m-d");
                                            $noValid =  sprintf('%04d', $max, 'dyhtdyu');
                                            $noDok = $noValid . "/" . "PU/FARM-RSBT/" . numtor(date("m")) . "/" . date("Y");
                                            ?>

                                            <!--end ajax-->
                                            <input type="text" id="no_dokumen" name="no_dokumen" disabled="" class="form-control" value="<?= $noDok; ?>"></input>
                                        </div>
                                    </div>
                                </div>


                                <p class="mt-15">
                                </div>


                                <!-- /Row -->
                            </div>
                            <!-- End -->
                        </div>
                        <div class="modal-footer mb-10 mr-15">

                            <button onclick="insertFaktur()" class="btn btn-success btn-anim  btn-sm" type="button"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span></button>

                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!--akhir modal yang akan dipakai-->

            <!--modal dua-->

            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    <!-- sample modal content -->
                    <div class="modal fade" id="modalTambahObatFaktur" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <h5 class="modal-title mt-10" id="myLargeModalLabel"><i class="icon-user mr-10"></i> INFO FAKTUR
                                    </h5>
                                </div>
                                <div class="modal-body">

                                    <div class="row">
                                        <div class="col-sm-12">

                                            <div class="panel-heading">
                                                <div class="pull-left">
                                                    <h6 class="panel-title txt-dark">LIST FAKTUR</h6>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group ">
                                                        <label class="control-label col-md-3">NO DOKUMEN</label>
                                                        <div class="col-md-9 has-error">
                                                            <input type="text" class="form-control" readonly id="no_dok">
                                                            <input type="hidden" class="form-control " autocomplete="off" id="inFaktur">
                                                            <span class="help-block"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/span-->


                                                <div class="col-md-6">
                                                    <div class="form-group ">
                                                        <label class="control-label col-md-3"></label>
                                                        <div class="col-md-9 has-error">


                                                            <span class="help-block"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-wrap">


                                                        <div class="row">
                                                            <div class="col-md-6 mt-10">
                                                                <div class="form-group ">
                                                                    <label class="control-label col-md-3">NAMA OBAT</label>
                                                                    <div class="col-md-9 has-success ">
                                                                        <select class="form-control filled-input select2" style="border: 1px solid lightgreen;" name="upNama" id="upNama" onchange="pilih_obat()">

                                                                            <option value="-">PILIH</option>
                                                                            <?php
                                                                            foreach ($obat as $row) :
                                                                                ?>
                                                                                <option value="<?php echo $row["id_logistik"] . "|" . $row["harga_cost"] . "|" . $row["jml_satuan_terkecil"]; ?>"><?php echo $row["nama"] ." (". $row["produsen"] .")";?></option>

                                                                            <?php endforeach; ?>
                                                                        </select>
                                                                        <span class="help-block"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- <div class="col-md-6 mt-10">
                                                                <div class="form-group ">
                                                                    <label class="control-label col-md-3 mt-10">REKO MENDASI</label>
                                                                    <div class="col-md-9 has-success">
                                                                        <input type="text" class="form-control" autocomplete="off" placeholder="REKOMENDASI" id="inRekom" disabled>
                                                                        <span class="help-block"></span>
                                                                    </div>
                                                                </div>
                                                            </div> -->

                                                            <div class="col-md-6 mt-10">
                                                                <div class="form-group ">
                                                                    <label class="control-label col-md-3 mt-10">HARGA</label>
                                                                    <div class="col-md-9 has-success">
                                                                        <input type="text" class="form-control" autocomplete="off" placeholder="HARGA" readonly id="outHarga">
                                                                        <input type="hidden" class="form-control" id="inHarga">
                                                                        <span class="help-block"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 mt-10">
                                                                <div class="form-group ">
                                                                    <label class="control-label col-md-3 mt-10">JUMLAH SATUAN TERKECIL</label>
                                                                    <div class="col-md-9 has-success">
                                                                        <input type="number" class="form-control" autocomplete="off" placeholder="JUMLAH PESAN" id="inJumlah" disabled="">
                                                                        <span class="help-block"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 mt-10">
                                                                <div class="form-group ">
                                                                    <label class="control-label col-md-3 mt-10">JUMLAH PESANAN</label>
                                                                    <div class="col-md-9 has-success">
                                                                        <input type="number" class="form-control" autocomplete="off" placeholder="JUMLAH PESAN" id="inFrek" value="1">
                                                                        <span class="help-block"></span>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6"> </div>
                                                            <div class="col-md-6">
                                                                <div class="row">
                                                                    <div class="col-md-offset-3 col-md-9">
                                                                        <input type="hidden" class="form-control " autocomplete="off" id="upId">
                                                                        <button type="submit" class="btn btn-success mr-10" onclick="insertObatFaktur()">SIMPAN</button>
                                                                        <span></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        

                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12">

                                                            <div class="panel-heading">
                                                                <div class="pull-left">
                                                                    <h6 class="panel-title txt-dark">LIST FAKTUR</h6>
                                                                </div>
                                                                <div class="clearfix"></div>
                                                            </div>
                                                            <div class="panel-wrapper collapse in">

                                                                <div class="table-wrap">
                                                                    <div class="table-responsive">
                                                                        <table id="isiFaktur1" class="table table-hover display  pb-30">
                                                                            <thead>
                                                                                <tr class="bg-success">
                                                                                    <th>NO</th>
                                                                                    <th>KODE SIBATIK</th>
                                                                                    <th>NAMA OBAT</th>
                                                                                    <th>PRODUSEN</th>
                                                                                    <th>JUMLAH SATUAN TERKECIL</th>
                                                                                    <th>JUMLAH PESANAN</th>
                                                                                    <th>AKSI</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tfoot>
                                                                                <tr class="bg-success">
                                                                                    <th>NO</th>
                                                                                    <th>KODE SIBATIK</th>
                                                                                    <th>NAMA OBAT</th>
                                                                                    <th>PRODUSEN</th>
                                                                                    <th>JUMLAH SATUAN TERKECIL</th>
                                                                                    <th>JUMLAH PESANAN</th>
                                                                                    <th>AKSI</th>
                                                                                </tr>
                                                                            </tfoot>

                                                                            <tbody style="color: black; text-align: left;">
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- akhir table -->

                                                    <!-- /formbody -->

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer mb-10 mr-15">


                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- /Row -->
                </div>
                <!-- /formbody -->
            </div>
        </div>

    </div>


    <div class="panel-wrapper">
        <div class="panel-body">
            <!-- sample modal content -->
            <div class="modal fade bs-example-modal-lg" id="modalEditFaktur" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="overflow : auto !important;">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h5 class="modal-title mt-10" id="myLargeModalLabel"><i class="icon-user mr-10"></i>LIST FAKTUR</h5>
                        </div>

                        <div class="modal-body">
                            <!-- Form body  -->

                            <div class="form-body mt-20">


                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Tanggal PO</label>
                                            <div class="col-md-9 has-success">
                                                <input type="date" placeholder="TANGGAL MASUK" value="<?php echo date("Y-m-d"); ?>" id="tgl_faktur" name="tgl_faktur" data-toggle="datepicker" class="form-control filled-input" autocomplete="off"></input>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- span -->


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">NO DOKUMEN</label>
                                            <div class="col-md-9 has-success">

                                                <input type="text" id="no_dokumen" name="no_dokumen" disabled="" class="form-control" value="<?= $noDok; ?>"></input>
                                            </div>
                                        </div>
                                    </div>


                                    <p class="mt-15"></p>
                                </div>


                                <!-- /Row -->
                            </div>
                            <!-- End -->
                        </div>
                        <div class="modal-footer mb-10 mr-15">

                            <button onclick="insertFaktur()" class="btn btn-success btn-anim  btn-sm" type="button"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span></button>





                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <!--end modal edit-->
    <script type="text/javascript">
         function pilih_obat() {
        var a = $("#upNama").val();
        splitDiag = a.split("|");

        $("#upId").val(splitDiag[0]);
        $("#outHarga").val(convertToRupiah(parseInt(splitDiag[1])));
        $("#inHarga").val(splitDiag[1]);
        $("#inJumlah").val(splitDiag[2]);
    }
        function edit_obat(id_logistik, nama, harga, rekom) {
         $.ajax({
            url: "<?= base_url() . 'Usulan_perencanaan/getObatById' ?>",
            data: {
                id_logistik: id_logistik,
            },
            type: 'POST',
            dataType: 'json',
            success: function(data) {
                if (data.status_dt == "found") {
                    $("#upId").val(id_logistik);
                    $("#upNama").val(nama);
                    $("#inJumlah").val(data.jml_satuan_terkecil);
                    $("#inRekom").val(rekom);
                    $("#outHarga").val(convertToRupiah(harga));
                    $("#inHarga").val(harga);

                    $("#collap_obat_faktur").collapse('toggle');
                } else {
                    alert("data tidak ditemukan");
                }
            }
        });


     }
 </script>
 <script type="text/javascript">
    function insertFaktur() {

        tgl_faktur = $('#tgl_faktur').val();
        id_vendor = $('#id_vendor').val();
        no_dokumen = $('#no_dokumen').val();
        var str = no_dokumen + "";
        noIndex = str.substring(0, 4);

        dataString = '&tgl_faktur=' + tgl_faktur +
        '&id_vendor=' + id_vendor + '&no_dokumen=' + no_dokumen + '&no_index=' + noIndex;

        $().ready(function() {
            $.ajax({
                url: "<?php echo base_url() ?>Usulan_perencanaan/insertFaktur",
                method: "POST",
                dataType: 'json',
                data: dataString,
                success: function(data) {
                    if (data.status == "success") {
                        swal({
                            title: "good job!",
                            type: "success",
                            text: "FAKTUR " + no_dokumen + " Berhasil ditambahkan",
                            confirmButtonColor: "#3cb878",
                        });
                        tgl_faktur = $('#tgl_faktur').val("");
                        id_vendor = $('#id_vendor').val("");
                        no_dokumen = $('#no_dokumen').val("");

                        //$('#username_result').html("");
                        $('#datable').DataTable().ajax.reload();
                        $(".modal-pendaftaranakun").modal('hide');
                        // $('#isiFaktur').DataTable().ajax.reload();
                        location.reload();

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

    function hapus_faktur(id_faktur) {
        swal({
            title: "Apakah kamu yakin?",
            text: "Menghapus data " + id_faktur + "?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3cb878",
            confirmButtonText: "Yakin",
            cancelButtonText: "Batal",
            closeOnConfirm: false
        }, function() {
            $().ready(function() {
                $.ajax({
                    url: "<?php echo base_url() ?>Usulan_perencanaan/hapus_faktur_po",
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

    function tambah_obat_faktur(id_faktur, no_dokumen) {
        // alert(no_dokumen);
        $("#no_dok").val(no_dokumen);
        $("#inFaktur").val(id_faktur);
        $("#modalTambahObatFaktur").modal('show');
        reload_list_faktur(id_faktur);
        reload_isi_list_faktur(id_faktur);
    }

    //end

    function edit_faktur(id_faktur) {
        // alert(no_dokumen);
        //$("#no_dok").val(no_dokumen);
        $("#inFaktur").val(id_faktur);
        // $("#no_dokumen1").val(no_dokumen);
        $("#modalEditFaktur").modal('show');
        reload_list_faktur(id_faktur);
        reload_total_harga(id_faktur)
    }


    //end harga 2

    //uang

    function convertToRupiah(angka) {
        var rupiah = '';
        var angkarev = angka.toString().split('').reverse().join('');
        for (var i = 0; i < angkarev.length; i++)
            if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + '.';
        return 'Rp. ' + rupiah.split('', rupiah.length - 1).reverse().join('');
    }

    //end uang


    //insert data 

    function insertObatFaktur() {

        idLogistik = $("#upId").val();
        jumlah = parseFloat($("#inJumlah").val());
        frek = parseFloat($("#inFrek").val());
        id_faktur = $("#inFaktur").val();
        harga = $("#inHarga").val();

        var ID = Math.random().toString(36).substr(2, 50) + Math.random().toString(36).substr(2, 50);

        no_dok = $("#no_dok").val();

        dataString = 'idFaktur=' + id_faktur + '&harga=' + harga + '&jumlah=' + jumlah+
        '&frek=' + frek + '&idLogistik=' + idLogistik +
        '&id=' + ID;

        $().ready(function() {
            $.ajax({
                url: "<?php echo base_url() ?>Usulan_perencanaan/insertObatFaktur",
                method: "POST",
                dataType: 'json',
                data: dataString,
                success: function(data) {
                    if (data.status == "success") {
                        swal({
                            title: "good job!",
                            type: "success",
                            text: "FAKTUR " + no_dok + " Berhasil ditambahkan",
                            confirmButtonColor: "#3cb878",
                        });

                        $('#isiFaktur1').DataTable().ajax.reload();

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

    function reload_isi_list_faktur(idFaktur) {

        $('#isiFaktur1').dataTable().fnClearTable();
        $('#isiFaktur1').dataTable().fnDestroy();
        $('#isiFaktur1').DataTable({
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
            "ajax": {
                "url": '<?php echo base_url('Usulan_perencanaan/tampil_list_faktur'); ?>',
                "type": 'POST',
                "data": {
                    idFaktur: idFaktur
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


    //end data insert

    //hapus

    function hapus_list_faktur(id_detail) {
        swal({
            title: "Apakah kamu yakin?",
            text: "Menghapus data " + id_detail + "?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3cb878",
            confirmButtonText: "Yakin",
            cancelButtonText: "Batal",
            closeOnConfirm: false
        }, function() {
            $().ready(function() {
                $.ajax({
                    url: "<?php echo base_url() ?>Usulan_perencanaan/hapus_list_faktur",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        id_detail: id_detail,
                    },
                    success: function(data) {
                        if (data.status == "success") {
                            swal({
                                title: "good job!",
                                type: "success",
                                text: "Data Berhasil dihapus",
                                confirmButtonColor: "#3cb878",
                            });
                            $("#modalTambahObatFaktur").modal('show');
                            $('#isiFaktur1').DataTable().ajax.reload();
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


    //tampil isi data faktur

    function reload_list_faktur(idFaktur) {
        $('#isiFaktur').dataTable().fnClearTable();
        $('#isiFaktur').dataTable().fnDestroy();
        $('#isiFaktur').DataTable({
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
            "ajax": {
                "url": '<?php echo base_url('Usulan_perencanaan/tampil_obat'); ?>',
                "type": 'POST',
                "data": {
                    idFaktur: idFaktur
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

    //end tampil data 
</script>
<!--percobaan1-->
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
            "ajax": '<?php echo base_url('Usulan_perencanaan/tampil_data'); ?>',
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

    function tampilHariIni() {
        $('#datable').DataTable().destroy();
        $('#datable').DataTable({
            "retrieve": true,
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
            "ajax": '<?php echo base_url('Usulan_perencanaan/tampil_data'); ?>',
            "deferRender": true,
            "processing": true,
            "order": [],
            "columnDefs": [{
                "targets": [0],
                "orderable": false,
            }, ],
        });
    }

    //end tampil hari ini

    //tampil range data

    function tampilRangePo(mulai, akhir) {
        $('#datable').DataTable().destroy();
        mulai = $("#inTglMulai").val();
        akhir = $("#inTglAkhir").val();
        $('#datable').DataTable({
            "retrieve": true,
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
                "url": '<?= base_url('Usulan_perencanaan/tampil_range'); ?>',
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

    //end tampil range data
</script>
<script>
	$(document).ready(function() {
		$.fn.modal.Constructor.prototype.enforceFocus = function () {};
	});
</script>

<!--end tampil data-->