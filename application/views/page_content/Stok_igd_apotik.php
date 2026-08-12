<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default card-view">
            <div class="panel-heading">
                <div class="pull-left">
                    <h6 class="panel-title txt-dark">STOK OBAT IGD</h6>
                </div>
                <div align="right">

                    <div class="btn btn-primary btn-anim  btn-sm " onclick="tampilTambahFaktur()"><i class="icon-rocket"></i><span class="btn-text">EDIT STOK</span>
                    </div>
                    <div class="btn  btn-anim btn-sm  col-md-2">
                    </div>
                    <div class="btn btn-primary btn-anim btn-sm " onclick="tampilTambahStokBaru()"><i class="icon-rocket"></i><span class="btn-text">TAMBAH STOK BARU</span>
                    </div>



                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    <div class="table-wrap">
                        <!-- <p id="notif_load" style="color:red;">Loading data, Please wait</p> -->

                        <div class="table-responsive">
                            <table class="table table-hover display  pb-30" id="datable">
                                <thead>
                                    <tr class="bg-success">
                                        <th>NO</th>
                                        <th>DETAIL</th>
                                        <th>NAMA OBAT</th>
                                        <th>GOLONGAN OBAT</th>
                                        <th>PRODUSEN</th>
                                        <th>SISA STOK</th>
                                        <th>TIPE</th>

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
    </div>
</div>
<!-- Tambah Stok -->
<div class="panel-wrapper collapse in">
    <div class="panel-body">
        <div class="modal fade " id="modal_tambah_stok" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h5 class="modal-title" id="myLargeModalLabel"><i class="icon-user mr-10"></i> OBAT
                        </h5>
                    </div>
                    <div class="modal-body">
                        <!-- Form body  -->
                        <div class="form-wrap">

                            <div class="form-body">
                                <h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO RESEP
                                </h6>
                                <hr width="95%">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">NAMA OBAT</label>
                                            <div class="col-md-9 has-success">
                                                <select class="form-control filled-input select2" id="inLogistik">
                                                    <option value="-">-</option>
                                                    <?php

                                                    foreach ($obat as $row) {

                                                    ?>
                                                        <option value="<?php echo $row["id_logistik"] . "|" . $row["nama"]; ?>"><?php echo $row["nama"]; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->

                                    <!--/span-->
                                    <div class="col-md-6">
                                        <label class="control-label col-md-3">ED</label>
                                        <div class="col-md-9 has-success">
                                            <input type="date" id="inTglExp" data-toggle="datepicker" class="form-control" autocomplete="off">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">STOK ASLI</label>
                                            <div class="col-md-9 has-success">

                                                <input type="number" class="form-control" placeholder="JUMLAH" id="inStokAsli" value="0">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- /Row -->

                            </div>

                        </div>
                        <span class="help-block"></span>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="hidden" class="form-control" id="inIdLog">
                                    <button onclick="tambah_stok()" class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
                                        <button onclick="batal()" class="btn btn-danger btn-anim  btn-sm ml-20 mt-5"><i class="icon-rocket"></i><span class="btn-text">BATAL</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Edit Stok -->
<div class="panel-wrapper collapse in">
    <div class="panel-body">
        <div class="modal fade " id="modal_edit_stok" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h5 class="modal-title" id="myLargeModalLabel"><i class="icon-user mr-10"></i> EDIT STOK OBAT
                        </h5>
                    </div>
                    <div class="modal-body">
                        <!-- Form body  -->
                        <div class="form-wrap">

                            <div class="form-body">
                                <h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO RESEP
                                </h6>
                                <hr width="95%">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">NAMA OBAT</label>
                                            <div class="col-md-9 has-success">
                                                <select class="form-control filled-input select2" id="inLogistik1" onchange="tampilStok() ">
                                                    <option value="-">-</option>
                                                    <?php

                                                    foreach ($obat_stok as $row) {

                                                    ?>
                                                        <option value="<?php echo $row["id_logistik"] . "|" . $row["stok"] . "|" . $row["nama"]; ?>"><?php echo $row["nama"]; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->

                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">TOTAL STOK TERSEDIA</label>
                                            <div class="col-md-9 has-success">
                                                <input type="text" class="form-control" placeholder="KONTAK SALES" id="inTersedia" disabled="" value="0">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="collapse" id="collap_tgl">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group ">
                                                <label class="control-label col-md-3">ED</label>
                                                <div class="col-md-9 has-success">
                                                    <select class="form-control filled-input  select2" id="outEd">
                                                        <option value="-">-</option>

                                                    </select>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->

                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group ">
                                                <label class="control-label col-md-3">STOK ED</label>
                                                <div class="col-md-9 has-error">
                                                    <input type="text" class="form-control" placeholder="STOK ED" id="inTersediaEd" disabled="">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">STOK ASLI</label>
                                            <div class="col-md-9 has-success">
                                                <input type="number" class="form-control" placeholder="JUMLAH" id="inStokAsli1" oninput="tampilSelisih()" value="0">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">SELISIH</label>
                                            <div class="col-md-9 has-error">
                                                <input type="number" class="form-control" placeholder="JUMLAH" id="inSelisih" disabled="" value="0">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Row -->

                            </div>

                        </div>

                    </div>
                    <span class="help-block"></span>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="hidden" class="form-control" id="inIdLog">
                                <button onclick="edit_stok()" class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
                                    <button onclick="batal()" class="btn btn-danger btn-anim  btn-sm ml-20 mt-5"><i class="icon-rocket"></i><span class="btn-text">BATAL</span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Detail Stok -->
<div class="panel-wrapper collapse in">
    <div class="panel-body">
        <div class="modal fade " id="modal_detail_stok" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h5 class="modal-title" id="myLargeModalLabel"><i class="icon-user mr-10"></i> OBAT
                        </h5>
                    </div>
                    <div class="modal-body">
                        <!-- Form body  -->
                        <div class="form-wrap">

                            <div class="collapse" id="collap_edit">
                                <div class="form-body">
                                    <h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO RESEP
                                    </h6>
                                    <hr width="95%">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group ">
                                                <label class="control-label col-md-3">NAMA OBAT</label>
                                                <div class="col-md-9 has-error">
                                                    <input type="text" class="form-control" placeholder="NAMA PRODUSEN" id="inNamaObat" disabled="">

                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">ED</label>
                                                <div class="col-md-9 has-error">
                                                    <input type="text" class="form-control" placeholder="ALAMAT" id="inEd" disabled="">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group ">
                                                <label class="control-label col-md-3">STOK TERSEDIA</label>
                                                <div class="col-md-9 has-error">
                                                    <input type="text" class="form-control" placeholder="KONTAK SALES" id="inTersedia1" disabled="">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">STOK ASLI</label>
                                                <div class="col-md-9 has-success">
                                                    <input type="number" class="form-control" placeholder="JUMLAH" id="inStokAsli2" oninput="tampilSelisih1()" value="0">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">SELISIH</label>
                                                <div class="col-md-9 has-error">
                                                    <input type="number" class="form-control" placeholder="JUMLAH" id="inSelisih1" disabled="">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /Row -->

                                </div>
                                <span class="help-block"></span>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="hidden" class="form-control" id="inIdLog">
                                            <button onclick="update_stok()" class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-body mt-10">
                            <h6 class="txt-dark capitalize-font pl-20"><i class="icon-list mr-10"></i>TINDAKAN</h6>
                            <hr width="95%">
                            <div class="table-wrap">
                                <div class="table-responsive">
                                    <table id="datablestok" class="table table-hover display  pb-30">
                                        <thead>
                                            <tr>
                                                <th>NO</th>
                                                <?php

                                                if ($status_so['value_int'] == 1) {
                                                ?>
                                                    <th>EDIT STOK</th>
                                                <?php } ?>
                                                <th>NAMA OBAT</th>
                                                <th>TANGGAL EXPIRED</th>
                                                <th>STOK</th>

                                            </tr>
                                        </thead>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- End -->

<style>
    td {
        color: black;
    }

    .zoom:active {
        position: relative;
        overflow: hidden;
        transition: all .3s ease-in-out;
        -webkit-transform: scale(6.5);
        transform: scale(6.5);
    }
</style>



<script type="text/javascript">
    function detailStokObat(id_logistik) {
        $("#collap_edit").collapse('hide');
        $("#modal_detail_stok").modal('show');
        detail_stok(id_logistik);
    }

    function tampilTambahStokBaru() {
        $("#modal_tambah_stok").modal('show');
    }

    function tampilTambahFaktur() {
        $("#modal_edit_stok").modal('show');
    }
    function batal() {
        $("#modal_tambah_stok").modal('hide');
        $("#modal_edit_stok").modal('hide');
    }

    function tampilKurang(id_logistik, nama, stok, kadaluarsa) {
        $("#inNamaObat").val(nama);
        $("#inEd").val(kadaluarsa);
        $("#inTersedia1").val(stok);
        $("#inIdLog").val(id_logistik);

        $("#collap_edit").collapse('show');
    }

    function tambah_stok() {
        a = $("#inLogistik").val();
        splitDiag = a.split('|');
        id_logistik = splitDiag[0];
        nama = splitDiag[1];
        tglExp = $("#inTglExp").val();
        frek = $("#inStokAsli").val();

        $.ajax({
            type: "POST",
            dataType: 'json',
            url: "<?php echo base_url('Apotik/tambah_stok_igd'); ?>",
            data: {
                id_logistik: id_logistik,
                tglExp: tglExp,
                frek: frek,
                nama: nama
            },
            success: function(data) {
                if (data.status == "success") {
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Data berhasil diedit!",
                        confirmButtonColor: "#3cb878",
                    });
                    $('#inLogistik').val('-').change()
                    $("#inTglExp").val('');
                    $("#inStokAsli").val('');
                    $("#modal_tambah_stok").modal('hide');
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
    }

    function edit_stok() {
        a = $("#inLogistik1").val();
        splitDiag = a.split('|');
        id_logistik = splitDiag[0];
        nama = splitDiag[2];
        tglExp = $("#outEd").val();
        frek = $("#inSelisih").val();

        $.ajax({
            type: "POST",
            dataType: 'json',
            url: "<?php echo base_url('Apotik/tambah_stok_igd'); ?>",
            data: {
                id_logistik: id_logistik,
                tglExp: tglExp,
                frek: frek,
            },
            success: function(data) {
                if (data.status == "success") {
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Data berhasil diedit!",
                        confirmButtonColor: "#3cb878",
                    });
                    $('#inLogistik1').val('-').change()
                    $("#outEd").val('');
                    $("#inStokAsli1").val('');
                    $("#inTersediaEd").val('');
                    $("#modal_edit_stok").modal('hide');
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
    }

    function update_stok() {
        id_logistik = $("#inIdLog").val();
        tglExp = $("#inEd").val();
        frek = $("#inSelisih1").val();

        $.ajax({
            type: "POST",
            dataType: 'json',
            url: "<?php echo base_url('Apotik/tambah_stok_igd'); ?>",
            data: {
                id_logistik: id_logistik,
                tglExp: tglExp,
                frek: frek
            },
            success: function(data) {
                if (data.status == "success") {
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Data berhasil diedit!",
                        confirmButtonColor: "#3cb878",
                    });
                    $("#collap_edit").collapse('hide');
                    detail_stok(id_logistik);
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


    function tampilHarga() {
        a = $("#inLogistik").val();
        splitDiag = a.split("|");


        harga = parseFloat(splitDiag[1]);
        margin = parseFloat(splitDiag[2]);
        $("#inProdusenObat").val(splitDiag[4]);
        $("#outHarga").val(harga.toFixed(0));

        $("#outHna").val(harga.toFixed(0));
        // $("#inHargaStrukHitung").val(harga.toFixed(0)); 
        $("#outHargaLama").val(convertToRupiah(harga.toFixed(0)));
        $("#inMargin").val(margin.toFixed(2));

        frek = parseFloat($("#inFrek").val());


        total = harga * frek;


        $("#outTotal").val(convertToRupiah(total.toFixed(0)));

    }

    function tampilStok() {
        a = $("#inLogistik1").val();
        splitDiag = a.split("|");
        idBarang = splitDiag[0];
        stok = splitDiag[1];
        $("#inTersedia").val(stok);
        $("#inSelisih").val(stok * -1);
    }

    function tampilSelisih() {
        tersedia = parseFloat($("#inTersediaEd").val());
        asli = parseFloat($("#inStokAsli1").val());
        selisih = asli - tersedia;
        $("#inSelisih").val(selisih);
    }

    function tampilSelisih1() {
        tersedia = parseFloat($("#inTersedia1").val());
        asli = parseFloat($("#inStokAsli2").val());
        selisih = asli - tersedia;
        $("#inSelisih1").val(selisih);
    }
</script>
<!--  -->

<!--tampil data-->

<script type="text/javascript">
    function detail_stok(id_logistik) {
        $("#ModalDetailStok").modal('show');
        $('#datablestok').dataTable().fnClearTable();
        $('#datablestok').dataTable().fnDestroy();
        $('#datablestok').DataTable({
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
                "url": '<?php echo base_url('Apotik/tampil_detail_stok_igd'); ?>',
                "type": 'POST',
                "data": {
                    id_logistik: id_logistik
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
<!--  -->

<!--tampil data-->

<script type="text/javascript">
    $(document).ready(function() {
        $('#inLogistik1').change(function() {
            a = $("#inLogistik1").val();
            splitDiag = a.split("|");
            var obat = splitDiag[0];
            if (obat != '') {
                $.ajax({
                    url: "<?php echo base_url(); ?>Apotik/getExpStokIgd",
                    method: "POST",
                    data: {
                        obat: obat
                    },
                    dataType: 'json',
                    success: function(data) {
                        var html = '';
                        var i;
                        html = '<option value="">-</option>';
                        for (i = 0; i < data.length; i++) {
                            html += '<option value=' + data[i].kadaluarsa + '|' + data[i].stok + '|' + '>' + data[i].kadaluarsa + '</option>';
                        }
                        $('#outEd').html(html);
                    }
                });
            } else {
                $('#outEd').html('<option value="">-</option>');
            }
        });
        $('#inLogistik1').change(function() {

            $('#collap_tgl').collapse('show');
        });
        $('#outEd').change(function() {
            tglExp = $("#outEd").val();
            splitDiag = tglExp.split("|");

            stok = splitDiag[1];
            $("#inTersediaEd").val(stok);
        });

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
                "sSearch": "Cari:",
                "sUrl": "",
                "oPaginate": {
                    "sFirst": "Pertama",
                    "sPrevious": "Sebelumnya",
                    "sNext": "Selanjutnya",
                    "sLast": "Terakhir"
                },
            },
            "ajax": '<?php echo base_url('Apotik/tampil_stok_obat_igd'); ?>',
            "deferRender": true,
            "processing": true,
            "order": [],
            "columnDefs": [{
                "targets": [0],
                "orderable": false,
            }, ],
        });
    });
    // Make to collapse hidden
    $('.data_hide').addClass('collapse');
</script>

<!--end tampil data-->