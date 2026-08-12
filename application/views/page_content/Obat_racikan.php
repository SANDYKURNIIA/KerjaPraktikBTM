<<<<<<< HEAD
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default card-view">
            <div class="panel-heading">
                <div class="pull-left">
                    <h6 class="panel-title txt-dark">OBAT RACIKAN</h6>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <button class="btn btn-primary btn-anim mr-50" style="margin-right: 40px;" data-toggle="modal" data-target="#modal_master"><i class="icon-plus"></i><span class="btn-text">TAMBAH
                                MASTER</span></button>
                        <button class="btn btn-primary btn-anim mr-50" style="margin-right: 40px;" data-toggle="modal" data-target="#modal_tambahstok"><i class="icon-plus"></i><span class="btn-text">TAMBAH
                                RACIKAN</span></button>

                    </div>
                    <div class="clearfix"></div>
                </div>
                <br />
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="col-md-2">
                                <select class="form-control" id="pilihStok" onchange="tampilKategoriStok()">
                                    <?php $staff = $this->session->userdata('data_auth');
                                    if ($staff->tipe == 'logistik farmasi') {
                                    ?>
                                        <option value="0" selected>LOGISTIK FARMASI</option>

                                    <?php } ?>
                                    <option value="1">APOTIK</option>
                                    <option value="2">DEPO</option>
                                    <option value="3">IGD</option>
                                </select>
                            </div>
                        </div>
                    </div>
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
                                            <th>NAMA OBAT</th>
                                            <th>HARGA</th>
                                            <!-- <th>TANGGAL EXPIRED</th> -->
                                            <th>GOLONGAN OBAT</th>
                                            <th>PRODUSEN</th>
                                            <th>SISA STOK</th>
                                            <th>TIPE</th>
                                            <th>DETAIL</th>
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
</div>


<!-- Datatables -->

<!-- Modal -->

<div class="panel-wrapper collapse in">
    <div class="panel-body">
        <!-- sample modal content -->


        <div class="modal fade " id="modal_tambahstok" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">


            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>

                    <!--modal 1-->

                    <div class="modal-body">
                        <!-- Form body  -->
                        <form class="form-horizontal">
                            <div class="form-body mt-20">

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="panel panel-default card-view">
                                            <div class="panel-heading">
                                                <div class="pull-left">
                                                    <h6 class="txt-dark capitalize-font"><i class="icon-user mr-10"></i>INFO
                                                        STOK</h6>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="panel-wrapper collapse in">
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-xs-12">
                                                            <div class="form-wrap">


                                                                <div class="form-body">

                                                                    <hr>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group ">
                                                                                <label class="control-label col-md-3">DEPO TUJUAN</label>
                                                                                <div class="col-md-9 has-success">
                                                                                    <select class="form-control filled-input select2" id="inDepo1">
                                                                                        <option value="-">-</option>
                                                                                        <option value="APOTIK" selected>APOTIK</option>
                                                                                        <option value="IGD">IGD</option>
                                                                                        <option value="RANAP">RANAP</option>
                                                                                        <?php if ($staff->tipe == 'logistik farmasi') {
                                                                                        ?>
                                                                                            <option value="GUDANG" selected>GUDANG FARMASI</option>
                                                                                        <?php } ?>
                                                                                    </select>
                                                                                    <span class="help-block"></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group ">
                                                                                <label class="control-label col-md-3">NAMA RACIKAN</label>
                                                                                <div class="col-md-9 has-success">
                                                                                    <select class="form-control filled-input select2" id="inRacikan">
                                                                                        <option value="">-</option>

                                                                                        <?php foreach ($racikan as $row) { ?>
                                                                                            <option value="<?php echo $row["id_logistik"]; ?>"><?php echo $row["nama"]; ?></option>

                                                                                        <?php } ?>

                                                                                    </select>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label class="control-label col-md-3">STOK
                                                                                    ASLI</label>
                                                                                <div class="col-md-9 has-success">
                                                                                    <input type="number" class="form-control " placeholder="JUMLAH" id="inStokAsli" value="1">

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label class="control-label col-md-3">TANGGAL EXPIRED</label>
                                                                                <div class="col-md-9 has-success">
                                                                                    <input type="date" class="form-control txt-dark" data-toggle="datepicker" placeholder="JUMLAH" autocomplete="off" id="inTglExp">

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="pull-left">
                                                                        <h6 class="txt-dark capitalize-font"><i class="icon-user mr-10"></i>LIST OBAT</h6>
                                                                    </div>
                                                                    <hr>
                                                                    <form id="form_obat">
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="form-group ">
                                                                                    <label class="control-label col-md-3">DEPO</label>
                                                                                    <div class="col-md-9 has-success">
                                                                                        <select class="form-control filled-input select2" id="inDepo">
                                                                                            <option value="-">-</option>
                                                                                            <option value="APOTIK" selected>APOTIK</option>
                                                                                            <!-- <option value="IGD">IGD</option> -->
                                                                                            <option value="RANAP">RANAP</option>
                                                                                            <?php if ($staff->tipe == 'logistik farmasi') {
                                                                                            ?>
                                                                                                <option value="GUDANG" selected>GUDANG FARMASI</option>
                                                                                            <?php } ?>

                                                                                        </select>
                                                                                        <span class="help-block"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group ">
                                                                                    <label class="control-label col-md-3">NAMA OBAT</label>
                                                                                    <div class="col-md-9 has-success">
                                                                                        <select class="form-control filled-input select2" onchange="tampilStok()" id="inObat">
                                                                                            <option value="-|-|-">-</option>

                                                                                            <?php foreach ($obat as $row) { ?>
                                                                                                <option value="<?php echo $row["id_logistik"] . "|" . $row["stok"] . "|" . $row["kadaluarsa"]; ?>"><?php echo $row["nama"]; ?></option>

                                                                                            <?php } ?>

                                                                                        </select>
                                                                                        <span class="help-block"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <!--/span-->
                                                                            <div class="col-md-6">
                                                                                <div class="form-group ">
                                                                                    <label class="control-label col-md-3">JUMLAH STOK</label>
                                                                                    <div class="col-md-9 has-error">
                                                                                        <input type="text" class="form-control " placeholder="" disabled id="inTersedia" value="0">

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group ">
                                                                                    <label class="control-label col-md-3">JUMLAH</label>
                                                                                    <div class="col-md-9 has-error">
                                                                                        <input type="hidden" class="form-control " placeholder="" id="id" value="<?php echo uniqid(); ?>">
                                                                                        <input type="text" class="form-control " placeholder="" id="inJumlah" value="1">

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <!-- /Row -->


                                                                        </div>
                                                                        <!-- /Row -->
                                                                        <div class="form-actions mt-10">
                                                                            <button onclick="insertStok()" class="btn btn-success btn-anim  btn-sm" type="button"><i class="icon-rocket"></i><span class="btn-text">Tambah</span></button>
                                                                        </div>
                                                                    </form>
                                                                    <div class="panel-wrapper collapse in">
                                                                        <div class="panel-body">
                                                                            <div class="table-wrap">
                                                                                <div class="table-responsive">
                                                                                    <table id="datableracikan" class="table table-hover display  pb-30">
                                                                                        <thead>
                                                                                            <tr>
                                                                                                <th>NO</th>
                                                                                                <th>NAMA OBAT</th>
                                                                                                <th>JUMLAH</th>
                                                                                                <th>HNA</th>
                                                                                                <th>HARGA</th>
                                                                                                <th>HAPUS</th>
                                                                                            </tr>
                                                                                        </thead>
                                                                                        <tbody style="color: black" id="show_data">
                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group ">
                                                                                    <label class="control-label col-md-3">TOTAL</label>
                                                                                    <div class="col-md-9 has-success">
                                                                                        <input type="text" class="form-control " placeholder="" id="total" readonly>

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group ">
                                                                                    <label class="control-label col-md-3">HARGA RACIKAN</label>
                                                                                    <div class="col-md-9 has-success">
                                                                                        <input type="text" class="form-control " placeholder="" id="harga_racikan" readonly>

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-actions mt-10">
                                                                        <button onclick="insertStokRacikan()" class="btn btn-primary btn-anim  btn-sm" type="button"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span></button>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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

<!-- /Modal Edit Akun -->
<div class="panel-wrapper collapse in">
    <div class="panel-body">
        <!-- sample modal content -->


        <div class="modal fade" id="ModalDetailStok" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form method="post">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="panel panel-default card-view">
                                        <div class="panel-heading">
                                            <div class="pull-left">
                                                <h6 class="panel-title txt-dark">DETAIL STOK OBAT</h6>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="panel-wrapper collapse in">
                                            <div class="panel-body">
                                                <div class="table-wrap">
                                                    <div class="table-responsive">
                                                        <table id="datablestok" class="table table-hover display  pb-30">
                                                            <thead>
                                                                <tr>
                                                                    <th>NO</th>
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
                                    <div align="right">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-offset-3 col-md-9">
                                                        <!-- <button type="submit" class="btn btn-success btn-rounded mr-10">Submit</button> -->
                                                        <!-- <button type="button" class="btn btn-default btn-rounded">Cancel</button> -->
                                                        <span></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6"> </div>
                                        </div>
                                    </div>
                                </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- tambah master -->
<div class="panel-wrapper collapse in">
    <div class="panel-body">
        <!-- sample modal content -->

        <div class="modal fade modal-pendaftaranakun" id="modal_master" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <p>OBAT</p>
                        <p><i class="icon-people mr-10"></i>INPUT OBAT</p>

                    </div>
                    <div class="modal-body">
                        <!-- Form body  -->

                        <div class="form-body mt-20">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">NAMA OBAT</label>
                                        <div class="col-md-9 has-success">
                                            <input type="text" class="form-control" placeholder="NAMA OBAT" id="nama" name="nama"></input>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>



                                <!-- span -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">SATUAN TERKECIL</label>
                                        <div class="col-md-9 has-success">
                                            <select class="form-control filled-input select2" id="tipe" name="tipe">
                                                <option value="">Satuan</option>

                                                <?php foreach ($sk as $s) { ?>
                                                    <option value="<?= $s['satuan_terkecil']; ?>"><?= $s['satuan_terkecil']; ?></option>

                                                <?php } ?>
                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">SATUAN TERBESAR</label>
                                        <div class="col-md-9 has-success">
                                            <select class="form-control filled-input select2" id="tipe1" name="tipe">
                                                <option value="">Satuan</option>

                                                <?php foreach ($sb as $s) { ?>
                                                    <option value="<?= $s['satuan_terbesar']; ?>"><?= $s['satuan_terbesar']; ?></option>

                                                <?php } ?>
                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">HNA</label>
                                        <div class="col-md-9 has-success">
                                            <input type="text" class="form-control" placeholder="HNA" id="harga_cost" name="harga_cost"></input>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>

                                <!-- span -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">GOLONGAN OBAT</label>
                                        <div class="col-md-9 has-success">
                                            <select class="form-control filled-input select2" id="golongan_obat" name="golongan_obat">

                                                <?php foreach ($gol_obat as $g) { ?>
                                                    <option value="<?= $g['golongan_obat']; ?>"><?= $g['golongan_obat']; ?></option>

                                                <?php } ?>
                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>



                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">MARGIN</label>
                                        <div class="col-md-9 has-success">
                                            <input type="text" class="form-control" placeholder="MARGIN" id="margin" name="margin"></input>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">MIN STOK</label>
                                        <div class="col-md-9 has-success">
                                            <input type="text" class="form-control" placeholder="MIN STOK" id="minStok" name="minStok"></input>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">STANDAR</label>
                                        <div class="col-md-9 has-success">
                                            <select class="form-control filled-input select2" id="standar" name="standar">
                                                <option value="">STANDAR</option>
                                                <option value="NON FOPI">NON FOPI</option>
                                                <option value="FOPI">FOPI</option>
                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End -->
                    </div>
                    <div class="modal-footer mb-10 mr-15">

                        <button onclick="insertObat()" class="btn btn-success btn-anim  btn-sm" type="button"><i class="icon-rocket"></i><span class="btn-text">Submit</span></button>

                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </div>
</div>


<div class="seprator-block"></div>
<!--end of coba-->



<script type="text/javascript">
    function insertObat() {

        nama = $('#nama').val();
        tipe = $('#tipe').val();
        tipe1 = $('#tipe1').val();
        harga_cost = $('#harga_cost').val();
        golongan_obat = $('#golongan_obat').val();
        kategori_obat = $('#kategori_obat').val();
        margin = $('#margin').val();
        min_stok = ($("#minStok").val());
        produsen = $('#produsen').val();
        standar = $("#standar").val();
        distributor = $("#distributor").val();
        kode = $("#kode").val();
        $().ready(function() {
            $.ajax({
                url: "<?php echo base_url() ?>Obat_racikan/insertObat",
                method: "POST",
                dataType: 'json',
                data: {
                    nama: nama,
                    tipe: tipe,
                    tipe1: tipe1,
                    harga_cost: harga_cost,
                    golongan_obat: golongan_obat,
                    margin: margin,
                    produsen: produsen,
                    standar: standar,
                    distributor: distributor,
                    kode: kode,
                    min_stok: min_stok,
                    kategori_obat: kategori_obat
                },
                success: function(data) {
                    if (data.status == "success") {
                        swal({
                            title: "good job!",
                            type: "success",
                            text: "PRODUSEN " + nama + " Berhasil ditambahkan",
                            confirmButtonColor: "#3cb878",
                        });
                        nama = $('#nama').val("");
                        tipe = $('#tipe').val("");
                        harga_cost = $('#harga_cost').val("");
                        golongan_obat = $('#golongan_obat').val("");
                        margin = $('#margin').val("");
                        margin = $('#minStok').val("");
                        produsen = $('#produsen').val("");
                        standar = $("#standar").val("");
                        distributor = $("#distributor").val("");
                        kode = $("#kode").val("");

                        //$('#username_result').html("");

                        $('#datable').DataTable().ajax.reload();
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
    $(document).ready(function() {
        $('#inDepo').change(function() {

            var depo = $('#inDepo').val();
            if (depo != '-') {
                $.ajax({
                    url: "<?php echo base_url(); ?>Apotik/getNamaObat",
                    method: "POST",
                    data: {
                        depo: depo
                    },
                    dataType: 'json',
                    success: function(data) {
                        var html = '';
                        var i;
                        html = '<option value="">-</option>';
                        for (i = 0; i < data.length; i++) {
                            html += '<option value="' + data[i].id_logistik + '|' + data[i].stok + '|' + data[i].kadaluarsa + '">' + data[i].nama + '</option>';
                        }
                        $('#inObat').html(html);
                    }
                });
            } else {
                $('#inObat').html('<option value="-|-|-">-</option>');
            }
        });

    });

    function insertStok() {

        depo = $("#inDepo").val();
        a = $("#inObat").val();
        splitDiag = a.split("|");
        idLogistik = splitDiag[0];
        stok = parseFloat($("#inTersedia").val());
        expire = splitDiag[2];
        frek = $("#inJumlah").val();
        var uid = (new Date().getTime()).toString(36);
        // var ID = Math.random().toString(36).substr(2, 50) + Math.random().toString(36).substr(2, 50) + uid;
        id = $("#id").val();
        dataString =
            'frek=' + frek + '&id_logistik=' + idLogistik + '&tglExp=' + expire +
            '&id=' + id + '&depo=' + depo;
        // 		  alert(dataString);
        $.ajax({
            type: "POST",
            url: "<?php echo base_url() ?>Obat_racikan/insertUpdateStok",
            data: dataString,
            dataType: "json",
            success: function(data) {
                // $('#form_obat')[0].reset();
                if (data.status == "success") {

                    $("#inDepo").val('-').change();
                    $("#inObat").val('-|-|-').change();
                    $("#inTersedia").val(0);
                    $("#inJumlah").val(1);
                    reload_racikan(id);
                } else {
                    alert('tidak bisa insert');
                }
            }
        })
    }

    function hapus_obat(id, nama) {
        $('#modal_tambahstok').modal('show');
        // swal({
        //     title: "Apakah kamu yakin?",
        //     text: "Menghapus data " + nama + "?",
        //     type: "warning",
        //     showCancelButton: true,
        //     confirmButtonColor: "#3cb878",
        //     confirmButtonText: "Yakin",
        //     cancelButtonText: "Batal",
        //     closeOnConfirm: false
        // }, function() {
        //     $().ready(function() {
        //         $.ajax({
        //             url: "<?php echo base_url() ?>Obat_racikan/hapus_obat",
        //             method: "POST",
        //             dataType: 'json',
        //             data: {
        //                 id: id,
        //             },
        //             success: function(data) {
        //                 if (data.status == "success") {
        //                     swal({
        //                         title: "good job!",
        //                         type: "success",
        //                         text: "Data Berhasil dihapus",
        //                         confirmButtonColor: "#3cb878",
        //                     });

        //                 } else {
        //                     swal({
        //                         title: "Gagal!",
        //                         type: "warning",
        //                         text: data.status,
        //                         confirmButtonColor: "#3cb878",
        //                     });
        //                 }
        //             }
        //         });
        //     });
        // });
        // return false;

    }

    function insertStokRacikan() {

        racikan = $("#inRacikan").val();
        depo = $("#inDepo1").val();
        stok = parseFloat($("#inStokAsli").val());
        expire = $("#inTglExp").val();
        id = $("#id").val();
        harga = $("#harga_racikan").val();
        dataString =
            'id_logistik=' + racikan + '&expire=' + expire +
            '&id=' + id + '&stok=' + stok + '&depo=' + depo + '&harga=' + harga;
        // 		  alert(dataString);
        $.ajax({
            type: "POST",
            url: "<?php echo base_url() ?>Obat_racikan/insertStok",
            data: dataString,
            dataType: "json",
            success: function(data) {
                // $('#modal_tambahstok').modal('hide');
                location.reload();
            }
        })
    }


    function tampilStok() {
        a = $("#inObat").val();
        splitDiag = a.split("|");
        idBarang = splitDiag[0];
        stok = splitDiag[1];
        $("#inTersedia").val(stok);
    }

    function tampilKategoriStok() {
        jenis = $("#pilihStok").val();

        $('#datable').dataTable().fnClearTable();
        $('#datable').dataTable().fnDestroy();
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
            "ajax": {
                "url": '<?php echo base_url('Obat_racikan/tampil_stok_depo'); ?>',
                "type": 'POST',
                "data": {
                    jenis: jenis
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
    function edit_detail(id_logistik) {
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
                "url": '<?php echo base_url('Obat_racikan/tampil_detail'); ?>',
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

    function reload_racikan(id) {

        stok = $('#inStokAsli').val();
        $.ajax({
            type: 'post',
            url: '<?php echo base_url('Obat_racikan/tampil_list_racikan'); ?>',
            async: false,
            dataType: 'json',
            data: {
                id: id,
            },
            success: function(data) {
                var html = '';
                var sum = 0;
                var frek = 0;
                var i;
                for (i = 0; i < data.length; i++) {
                    html += '<tr>' +
                        '<td>' + Number(i + 1) + '</td>' +
                        '<td>' + data[i].nama + '</td>' +
                        '<td>' + (data[i].frek * -1) + '</td>' +
                        '<td>' + data[i].harga_cost + '</td>' +
                        '<td>' + data[i].harga + '</td>' +
                        '<td><button class="btn btn-danger btn-icon-anim btn-square delete" type="button" name="delete" id="' + data[i].id_stok + '" ><i class="fa fa-trash"></i></button></td>' +
                        '</tr>';

                    sum = Number(sum) + Number(data[i].harga);
                    frek = Number(frek) + Number(data[i].frek * -1);
                }
                $('#show_data').html(html);
                $('#total').val(sum);
                $('#harga_racikan').val((Math.round(sum / stok)));
            }

        });

    }

    $(document).ready(function() {
        $(document).on('click', '.delete', function() {
            var user_id = $(this).attr("id");
            var id = $('#id').val();
            swal({
                title: "Apakah kamu yakin?",
                text: "Menghapus data ini?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3cb878",
                confirmButtonText: "Yakin",
                cancelButtonText: "Batal",
                closeOnConfirm: false
            }, function() {
                $().ready(function() {
                    $.ajax({
                        url: "<?php echo base_url(); ?>Obat_racikan/hapus_obat",
                        method: "POST",
                        data: {
                            id: user_id
                        },
                        success: function(data) {
                            //alert(data);
                            swal({
                                title: "good job!",
                                type: "success",
                                text: "Data Berhasil dihapus",
                                confirmButtonColor: "#3cb878",
                            });
                            reload_racikan(id);
                            //$('#modal_tambahstok').modal('show');
                            // } else {
                            //     swal({
                            //         title: "Gagal!",
                            //         type: "warning",
                            //         text: data.status,
                            //         confirmButtonColor: "#3cb878",
                            //     });
                            // }
                        }
                    });
                });
            });
            return false;
        });
    });
    // function reload_racikan(id) {
    //     $('#modal_tambahstok').modal('show');
    //     $('#datableracikan').dataTable().fnClearTable();
    //     $('#datableracikan').dataTable().fnDestroy();
    //     $('#datableracikan').DataTable({
    //         "language": {
    //             "sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
    //             "sProcessing": "Sedang memproses...",
    //             "sLengthMenu": "Tampilkan _MENU_ entri",
    //             "sZeroRecords": "Tidak ditemukan data yang sesuai",
    //             "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
    //             "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
    //             "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
    //             "sInfoPostFix": "",
    //             "sSearch": "Cari:",
    //             "sUrl": "",
    //             "oPaginate": {
    //                 "sFirst": "Pertama",
    //                 "sPrevious": "Sebelumnya",
    //                 "sNext": "Selanjutnya",
    //                 "sLast": "Terakhir"
    //             },

    //         },
    //         "ajax": {
    //             "url": '<?php echo base_url('Obat_racikan/tampil_list_racikan'); ?>',
    //             "type": 'POST',
    //             "data": {
    //                 id: id
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
</script>
<!--  -->

<!--tampil data-->

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
                "sSearch": "Cari:",
                "sUrl": "",
                "oPaginate": {
                    "sFirst": "Pertama",
                    "sPrevious": "Sebelumnya",
                    "sNext": "Selanjutnya",
                    "sLast": "Terakhir"
                },
            },
            "ajax": '<?php echo base_url('Obat_racikan/tampil_stok_obat'); ?>',
            "deferRender": true,
            "processing": true,
            "order": [],
            "columnDefs": [{
                "targets": [0],
                "orderable": false,
            }, ],
        });

        $('#modal_tambahstok').on('hidden.bs.modal', function() {
            id = $("#id").val();
            $.ajax({
                url: "<?php echo base_url() ?>Obat_racikan/hapus_racikan",
                method: "POST",
                dataType: 'json',
                data: {
                    id: id,
                },
                success: function(data) {
                    location.reload();
                }
            });
        });


    });
    // Make to collapse hidden
</script>

=======
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default card-view">
            <div class="panel-heading">
                <div class="pull-left">
                    <h6 class="panel-title txt-dark">OBAT RACIKAN</h6>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <button class="btn btn-primary btn-anim mr-50" style="margin-right: 40px;" data-toggle="modal" data-target="#modal_master"><i class="icon-plus"></i><span class="btn-text">TAMBAH
                                MASTER</span></button>
                        <button class="btn btn-primary btn-anim mr-50" style="margin-right: 40px;" data-toggle="modal" data-target="#modal_tambahstok"><i class="icon-plus"></i><span class="btn-text">TAMBAH
                                RACIKAN</span></button>

                    </div>
                    <div class="clearfix"></div>
                </div>
                <br />
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="col-md-2">
                                <select class="form-control" id="pilihStok" onchange="tampilKategoriStok()">
                                    <?php $staff = $this->session->userdata('data_auth');
                                    if ($staff->tipe == 'logistik farmasi') {
                                    ?>
                                        <option value="0" selected>LOGISTIK FARMASI</option>

                                    <?php } ?>
                                    <option value="1">APOTIK</option>
                                    <option value="2">DEPO</option>
                                    <option value="3">IGD</option>
                                </select>
                            </div>
                        </div>
                    </div>
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
                                            <th>NAMA OBAT</th>
                                            <th>HARGA</th>
                                            <!-- <th>TANGGAL EXPIRED</th> -->
                                            <th>GOLONGAN OBAT</th>
                                            <th>PRODUSEN</th>
                                            <th>SISA STOK</th>
                                            <th>TIPE</th>
                                            <th>DETAIL</th>
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
</div>


<!-- Datatables -->

<!-- Modal -->

<div class="panel-wrapper collapse in">
    <div class="panel-body">
        <!-- sample modal content -->


        <div class="modal fade " id="modal_tambahstok" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">


            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>

                    <!--modal 1-->

                    <div class="modal-body">
                        <!-- Form body  -->
                        <form class="form-horizontal">
                            <div class="form-body mt-20">

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="panel panel-default card-view">
                                            <div class="panel-heading">
                                                <div class="pull-left">
                                                    <h6 class="txt-dark capitalize-font"><i class="icon-user mr-10"></i>INFO
                                                        STOK</h6>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="panel-wrapper collapse in">
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-xs-12">
                                                            <div class="form-wrap">


                                                                <div class="form-body">

                                                                    <hr>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group ">
                                                                                <label class="control-label col-md-3">DEPO TUJUAN</label>
                                                                                <div class="col-md-9 has-success">
                                                                                    <select class="form-control filled-input select2" id="inDepo1">
                                                                                        <option value="-">-</option>
                                                                                        <option value="APOTIK" selected>APOTIK</option>
                                                                                        <option value="IGD">IGD</option>
                                                                                        <option value="RANAP">RANAP</option>
                                                                                        <?php if ($staff->tipe == 'logistik farmasi') {
                                                                                        ?>
                                                                                            <option value="GUDANG" selected>GUDANG FARMASI</option>
                                                                                        <?php } ?>
                                                                                    </select>
                                                                                    <span class="help-block"></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group ">
                                                                                <label class="control-label col-md-3">NAMA RACIKAN</label>
                                                                                <div class="col-md-9 has-success">
                                                                                    <select class="form-control filled-input select2" id="inRacikan">
                                                                                        <option value="">-</option>

                                                                                        <?php foreach ($racikan as $row) { ?>
                                                                                            <option value="<?php echo $row["id_logistik"]; ?>"><?php echo $row["nama"]; ?></option>

                                                                                        <?php } ?>

                                                                                    </select>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label class="control-label col-md-3">STOK
                                                                                    ASLI</label>
                                                                                <div class="col-md-9 has-success">
                                                                                    <input type="number" class="form-control " placeholder="JUMLAH" id="inStokAsli" value="1">

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label class="control-label col-md-3">TANGGAL EXPIRED</label>
                                                                                <div class="col-md-9 has-success">
                                                                                    <input type="date" class="form-control txt-dark" data-toggle="datepicker" placeholder="JUMLAH" autocomplete="off" id="inTglExp">

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="pull-left">
                                                                        <h6 class="txt-dark capitalize-font"><i class="icon-user mr-10"></i>LIST OBAT</h6>
                                                                    </div>
                                                                    <hr>
                                                                    <form id="form_obat">
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="form-group ">
                                                                                    <label class="control-label col-md-3">DEPO</label>
                                                                                    <div class="col-md-9 has-success">
                                                                                        <select class="form-control filled-input select2" id="inDepo">
                                                                                            <option value="-">-</option>
                                                                                            <option value="APOTIK" selected>APOTIK</option>
                                                                                            <!-- <option value="IGD">IGD</option> -->
                                                                                            <option value="RANAP">RANAP</option>
                                                                                            <?php if ($staff->tipe == 'logistik farmasi') {
                                                                                            ?>
                                                                                                <option value="GUDANG" selected>GUDANG FARMASI</option>
                                                                                            <?php } ?>

                                                                                        </select>
                                                                                        <span class="help-block"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group ">
                                                                                    <label class="control-label col-md-3">NAMA OBAT</label>
                                                                                    <div class="col-md-9 has-success">
                                                                                        <select class="form-control filled-input select2" onchange="tampilStok()" id="inObat">
                                                                                            <option value="-|-|-">-</option>

                                                                                            <?php foreach ($obat as $row) { ?>
                                                                                                <option value="<?php echo $row["id_logistik"] . "|" . $row["stok"] . "|" . $row["kadaluarsa"]; ?>"><?php echo $row["nama"]; ?></option>

                                                                                            <?php } ?>

                                                                                        </select>
                                                                                        <span class="help-block"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <!--/span-->
                                                                            <div class="col-md-6">
                                                                                <div class="form-group ">
                                                                                    <label class="control-label col-md-3">JUMLAH STOK</label>
                                                                                    <div class="col-md-9 has-error">
                                                                                        <input type="text" class="form-control " placeholder="" disabled id="inTersedia" value="0">

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group ">
                                                                                    <label class="control-label col-md-3">JUMLAH</label>
                                                                                    <div class="col-md-9 has-error">
                                                                                        <input type="hidden" class="form-control " placeholder="" id="id" value="<?php echo uniqid(); ?>">
                                                                                        <input type="text" class="form-control " placeholder="" id="inJumlah" value="1">

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <!-- /Row -->


                                                                        </div>
                                                                        <!-- /Row -->
                                                                        <div class="form-actions mt-10">
                                                                            <button onclick="insertStok()" class="btn btn-success btn-anim  btn-sm" type="button"><i class="icon-rocket"></i><span class="btn-text">Tambah</span></button>
                                                                        </div>
                                                                    </form>
                                                                    <div class="panel-wrapper collapse in">
                                                                        <div class="panel-body">
                                                                            <div class="table-wrap">
                                                                                <div class="table-responsive">
                                                                                    <table id="datableracikan" class="table table-hover display  pb-30">
                                                                                        <thead>
                                                                                            <tr>
                                                                                                <th>NO</th>
                                                                                                <th>NAMA OBAT</th>
                                                                                                <th>JUMLAH</th>
                                                                                                <th>HNA</th>
                                                                                                <th>HARGA</th>
                                                                                                <th>HAPUS</th>
                                                                                            </tr>
                                                                                        </thead>
                                                                                        <tbody style="color: black" id="show_data">
                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group ">
                                                                                    <label class="control-label col-md-3">TOTAL</label>
                                                                                    <div class="col-md-9 has-success">
                                                                                        <input type="text" class="form-control " placeholder="" id="total" readonly>

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group ">
                                                                                    <label class="control-label col-md-3">HARGA RACIKAN</label>
                                                                                    <div class="col-md-9 has-success">
                                                                                        <input type="text" class="form-control " placeholder="" id="harga_racikan" readonly>

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-actions mt-10">
                                                                        <button onclick="insertStokRacikan()" class="btn btn-primary btn-anim  btn-sm" type="button"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span></button>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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

<!-- /Modal Edit Akun -->
<div class="panel-wrapper collapse in">
    <div class="panel-body">
        <!-- sample modal content -->


        <div class="modal fade" id="ModalDetailStok" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form method="post">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="panel panel-default card-view">
                                        <div class="panel-heading">
                                            <div class="pull-left">
                                                <h6 class="panel-title txt-dark">DETAIL STOK OBAT</h6>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="panel-wrapper collapse in">
                                            <div class="panel-body">
                                                <div class="table-wrap">
                                                    <div class="table-responsive">
                                                        <table id="datablestok" class="table table-hover display  pb-30">
                                                            <thead>
                                                                <tr>
                                                                    <th>NO</th>
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
                                    <div align="right">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-offset-3 col-md-9">
                                                        <!-- <button type="submit" class="btn btn-success btn-rounded mr-10">Submit</button> -->
                                                        <!-- <button type="button" class="btn btn-default btn-rounded">Cancel</button> -->
                                                        <span></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6"> </div>
                                        </div>
                                    </div>
                                </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- tambah master -->
<div class="panel-wrapper collapse in">
    <div class="panel-body">
        <!-- sample modal content -->

        <div class="modal fade modal-pendaftaranakun" id="modal_master" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <p>OBAT</p>
                        <p><i class="icon-people mr-10"></i>INPUT OBAT</p>

                    </div>
                    <div class="modal-body">
                        <!-- Form body  -->

                        <div class="form-body mt-20">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">NAMA OBAT</label>
                                        <div class="col-md-9 has-success">
                                            <input type="text" class="form-control" placeholder="NAMA OBAT" id="nama" name="nama"></input>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>



                                <!-- span -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">SATUAN TERKECIL</label>
                                        <div class="col-md-9 has-success">
                                            <select class="form-control filled-input select2" id="tipe" name="tipe">
                                                <option value="">Satuan</option>

                                                <?php foreach ($sk as $s) { ?>
                                                    <option value="<?= $s['satuan_terkecil']; ?>"><?= $s['satuan_terkecil']; ?></option>

                                                <?php } ?>
                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">SATUAN TERBESAR</label>
                                        <div class="col-md-9 has-success">
                                            <select class="form-control filled-input select2" id="tipe1" name="tipe">
                                                <option value="">Satuan</option>

                                                <?php foreach ($sb as $s) { ?>
                                                    <option value="<?= $s['satuan_terbesar']; ?>"><?= $s['satuan_terbesar']; ?></option>

                                                <?php } ?>
                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">HNA</label>
                                        <div class="col-md-9 has-success">
                                            <input type="text" class="form-control" placeholder="HNA" id="harga_cost" name="harga_cost"></input>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>

                                <!-- span -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">GOLONGAN OBAT</label>
                                        <div class="col-md-9 has-success">
                                            <select class="form-control filled-input select2" id="golongan_obat" name="golongan_obat">

                                                <?php foreach ($gol_obat as $g) { ?>
                                                    <option value="<?= $g['golongan_obat']; ?>"><?= $g['golongan_obat']; ?></option>

                                                <?php } ?>
                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>



                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">MARGIN</label>
                                        <div class="col-md-9 has-success">
                                            <input type="text" class="form-control" placeholder="MARGIN" id="margin" name="margin"></input>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">MIN STOK</label>
                                        <div class="col-md-9 has-success">
                                            <input type="text" class="form-control" placeholder="MIN STOK" id="minStok" name="minStok"></input>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">STANDAR</label>
                                        <div class="col-md-9 has-success">
                                            <select class="form-control filled-input select2" id="standar" name="standar">
                                                <option value="">STANDAR</option>
                                                <option value="NON FOPI">NON FOPI</option>
                                                <option value="FOPI">FOPI</option>
                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End -->
                    </div>
                    <div class="modal-footer mb-10 mr-15">

                        <button onclick="insertObat()" class="btn btn-success btn-anim  btn-sm" type="button"><i class="icon-rocket"></i><span class="btn-text">Submit</span></button>

                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </div>
</div>


<div class="seprator-block"></div>
<!--end of coba-->



<script type="text/javascript">
    function insertObat() {

        nama = $('#nama').val();
        tipe = $('#tipe').val();
        tipe1 = $('#tipe1').val();
        harga_cost = $('#harga_cost').val();
        golongan_obat = $('#golongan_obat').val();
        kategori_obat = $('#kategori_obat').val();
        margin = $('#margin').val();
        min_stok = ($("#minStok").val());
        produsen = $('#produsen').val();
        standar = $("#standar").val();
        distributor = $("#distributor").val();
        kode = $("#kode").val();
        $().ready(function() {
            $.ajax({
                url: "<?php echo base_url() ?>Obat_racikan/insertObat",
                method: "POST",
                dataType: 'json',
                data: {
                    nama: nama,
                    tipe: tipe,
                    tipe1: tipe1,
                    harga_cost: harga_cost,
                    golongan_obat: golongan_obat,
                    margin: margin,
                    produsen: produsen,
                    standar: standar,
                    distributor: distributor,
                    kode: kode,
                    min_stok: min_stok,
                    kategori_obat: kategori_obat
                },
                success: function(data) {
                    if (data.status == "success") {
                        swal({
                            title: "good job!",
                            type: "success",
                            text: "PRODUSEN " + nama + " Berhasil ditambahkan",
                            confirmButtonColor: "#3cb878",
                        });
                        nama = $('#nama').val("");
                        tipe = $('#tipe').val("");
                        harga_cost = $('#harga_cost').val("");
                        golongan_obat = $('#golongan_obat').val("");
                        margin = $('#margin').val("");
                        margin = $('#minStok').val("");
                        produsen = $('#produsen').val("");
                        standar = $("#standar").val("");
                        distributor = $("#distributor").val("");
                        kode = $("#kode").val("");

                        //$('#username_result').html("");

                        $('#datable').DataTable().ajax.reload();
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
    $(document).ready(function() {
        $('#inDepo').change(function() {

            var depo = $('#inDepo').val();
            if (depo != '-') {
                $.ajax({
                    url: "<?php echo base_url(); ?>Apotik/getNamaObat",
                    method: "POST",
                    data: {
                        depo: depo
                    },
                    dataType: 'json',
                    success: function(data) {
                        var html = '';
                        var i;
                        html = '<option value="">-</option>';
                        for (i = 0; i < data.length; i++) {
                            html += '<option value="' + data[i].id_logistik + '|' + data[i].stok + '|' + data[i].kadaluarsa + '">' + data[i].nama + '</option>';
                        }
                        $('#inObat').html(html);
                    }
                });
            } else {
                $('#inObat').html('<option value="-|-|-">-</option>');
            }
        });

    });

    function insertStok() {

        depo = $("#inDepo").val();
        a = $("#inObat").val();
        splitDiag = a.split("|");
        idLogistik = splitDiag[0];
        stok = parseFloat($("#inTersedia").val());
        expire = splitDiag[2];
        frek = $("#inJumlah").val();
        var uid = (new Date().getTime()).toString(36);
        // var ID = Math.random().toString(36).substr(2, 50) + Math.random().toString(36).substr(2, 50) + uid;
        id = $("#id").val();
        dataString =
            'frek=' + frek + '&id_logistik=' + idLogistik + '&tglExp=' + expire +
            '&id=' + id + '&depo=' + depo;
        // 		  alert(dataString);
        $.ajax({
            type: "POST",
            url: "<?php echo base_url() ?>Obat_racikan/insertUpdateStok",
            data: dataString,
            dataType: "json",
            success: function(data) {
                // $('#form_obat')[0].reset();
                if (data.status == "success") {

                    $("#inDepo").val('-').change();
                    $("#inObat").val('-|-|-').change();
                    $("#inTersedia").val(0);
                    $("#inJumlah").val(1);
                    reload_racikan(id);
                } else {
                    alert('tidak bisa insert');
                }
            }
        })
    }

    function hapus_obat(id, nama) {
        $('#modal_tambahstok').modal('show');
        // swal({
        //     title: "Apakah kamu yakin?",
        //     text: "Menghapus data " + nama + "?",
        //     type: "warning",
        //     showCancelButton: true,
        //     confirmButtonColor: "#3cb878",
        //     confirmButtonText: "Yakin",
        //     cancelButtonText: "Batal",
        //     closeOnConfirm: false
        // }, function() {
        //     $().ready(function() {
        //         $.ajax({
        //             url: "<?php echo base_url() ?>Obat_racikan/hapus_obat",
        //             method: "POST",
        //             dataType: 'json',
        //             data: {
        //                 id: id,
        //             },
        //             success: function(data) {
        //                 if (data.status == "success") {
        //                     swal({
        //                         title: "good job!",
        //                         type: "success",
        //                         text: "Data Berhasil dihapus",
        //                         confirmButtonColor: "#3cb878",
        //                     });

        //                 } else {
        //                     swal({
        //                         title: "Gagal!",
        //                         type: "warning",
        //                         text: data.status,
        //                         confirmButtonColor: "#3cb878",
        //                     });
        //                 }
        //             }
        //         });
        //     });
        // });
        // return false;

    }

    function insertStokRacikan() {

        racikan = $("#inRacikan").val();
        depo = $("#inDepo1").val();
        stok = parseFloat($("#inStokAsli").val());
        expire = $("#inTglExp").val();
        id = $("#id").val();
        harga = $("#harga_racikan").val();
        dataString =
            'id_logistik=' + racikan + '&expire=' + expire +
            '&id=' + id + '&stok=' + stok + '&depo=' + depo + '&harga=' + harga;
        // 		  alert(dataString);
        $.ajax({
            type: "POST",
            url: "<?php echo base_url() ?>Obat_racikan/insertStok",
            data: dataString,
            dataType: "json",
            success: function(data) {
                // $('#modal_tambahstok').modal('hide');
                location.reload();
            }
        })
    }


    function tampilStok() {
        a = $("#inObat").val();
        splitDiag = a.split("|");
        idBarang = splitDiag[0];
        stok = splitDiag[1];
        $("#inTersedia").val(stok);
    }

    function tampilKategoriStok() {
        jenis = $("#pilihStok").val();

        $('#datable').dataTable().fnClearTable();
        $('#datable').dataTable().fnDestroy();
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
            "ajax": {
                "url": '<?php echo base_url('Obat_racikan/tampil_stok_depo'); ?>',
                "type": 'POST',
                "data": {
                    jenis: jenis
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
    function edit_detail(id_logistik) {
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
                "url": '<?php echo base_url('Obat_racikan/tampil_detail'); ?>',
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

    function reload_racikan(id) {

        stok = $('#inStokAsli').val();
        $.ajax({
            type: 'post',
            url: '<?php echo base_url('Obat_racikan/tampil_list_racikan'); ?>',
            async: false,
            dataType: 'json',
            data: {
                id: id,
            },
            success: function(data) {
                var html = '';
                var sum = 0;
                var frek = 0;
                var i;
                for (i = 0; i < data.length; i++) {
                    html += '<tr>' +
                        '<td>' + Number(i + 1) + '</td>' +
                        '<td>' + data[i].nama + '</td>' +
                        '<td>' + (data[i].frek * -1) + '</td>' +
                        '<td>' + data[i].harga_cost + '</td>' +
                        '<td>' + data[i].harga + '</td>' +
                        '<td><button class="btn btn-danger btn-icon-anim btn-square delete" type="button" name="delete" id="' + data[i].id_stok + '" ><i class="fa fa-trash"></i></button></td>' +
                        '</tr>';

                    sum = Number(sum) + Number(data[i].harga);
                    frek = Number(frek) + Number(data[i].frek * -1);
                }
                $('#show_data').html(html);
                $('#total').val(sum);
                $('#harga_racikan').val((Math.round(sum / stok)));
            }

        });

    }

    $(document).ready(function() {
        $(document).on('click', '.delete', function() {
            var user_id = $(this).attr("id");
            var id = $('#id').val();
            swal({
                title: "Apakah kamu yakin?",
                text: "Menghapus data ini?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3cb878",
                confirmButtonText: "Yakin",
                cancelButtonText: "Batal",
                closeOnConfirm: false
            }, function() {
                $().ready(function() {
                    $.ajax({
                        url: "<?php echo base_url(); ?>Obat_racikan/hapus_obat",
                        method: "POST",
                        data: {
                            id: user_id
                        },
                        success: function(data) {
                            //alert(data);
                            swal({
                                title: "good job!",
                                type: "success",
                                text: "Data Berhasil dihapus",
                                confirmButtonColor: "#3cb878",
                            });
                            reload_racikan(id);
                            //$('#modal_tambahstok').modal('show');
                            // } else {
                            //     swal({
                            //         title: "Gagal!",
                            //         type: "warning",
                            //         text: data.status,
                            //         confirmButtonColor: "#3cb878",
                            //     });
                            // }
                        }
                    });
                });
            });
            return false;
        });
    });
    // function reload_racikan(id) {
    //     $('#modal_tambahstok').modal('show');
    //     $('#datableracikan').dataTable().fnClearTable();
    //     $('#datableracikan').dataTable().fnDestroy();
    //     $('#datableracikan').DataTable({
    //         "language": {
    //             "sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
    //             "sProcessing": "Sedang memproses...",
    //             "sLengthMenu": "Tampilkan _MENU_ entri",
    //             "sZeroRecords": "Tidak ditemukan data yang sesuai",
    //             "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
    //             "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
    //             "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
    //             "sInfoPostFix": "",
    //             "sSearch": "Cari:",
    //             "sUrl": "",
    //             "oPaginate": {
    //                 "sFirst": "Pertama",
    //                 "sPrevious": "Sebelumnya",
    //                 "sNext": "Selanjutnya",
    //                 "sLast": "Terakhir"
    //             },

    //         },
    //         "ajax": {
    //             "url": '<?php echo base_url('Obat_racikan/tampil_list_racikan'); ?>',
    //             "type": 'POST',
    //             "data": {
    //                 id: id
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
</script>
<!--  -->

<!--tampil data-->

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
                "sSearch": "Cari:",
                "sUrl": "",
                "oPaginate": {
                    "sFirst": "Pertama",
                    "sPrevious": "Sebelumnya",
                    "sNext": "Selanjutnya",
                    "sLast": "Terakhir"
                },
            },
            "ajax": '<?php echo base_url('Obat_racikan/tampil_stok_obat'); ?>',
            "deferRender": true,
            "processing": true,
            "order": [],
            "columnDefs": [{
                "targets": [0],
                "orderable": false,
            }, ],
        });

        $('#modal_tambahstok').on('hidden.bs.modal', function() {
            id = $("#id").val();
            $.ajax({
                url: "<?php echo base_url() ?>Obat_racikan/hapus_racikan",
                method: "POST",
                dataType: 'json',
                data: {
                    id: id,
                },
                success: function(data) {
                    location.reload();
                }
            });
        });


    });
    // Make to collapse hidden
</script>

>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
<!--end tampil data-->