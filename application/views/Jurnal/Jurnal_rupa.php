<<<<<<< HEAD
<div class="panel panel-default card-view">
    <div class="panel-heading">
        <div class="pull-left">
            <h6 class="panel-title txt-dark"><span class="span span-success">JURNAL RUPA RUPA</span></h6>
        </div>



        <div class="clearfix"></div>
    </div>

    <div align="right">
        <button class="btn btn-primary btn-anim mr-50" style="margin-right: 40px;" data-toggle="modal" data-target=".modal-pendaftaranakun"><i class="icon-plus"></i><span class="btn-text">BUAT
                JURNAL</span></button>
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
                                    <th>TAMBAHKAN JURNAL</th>
                                    <th>AKSI</th>
                                    <th>TANGGAL JURNAL</th>
                                    <th>NO JURNAL</th>
                                    <th>TOTAL</th>
                                    <th>STAFF</th>
                                    <th>PK</th>
                                    <th>KETERANGAN</th>
                                    <th>STATUS</th>
                                    <th>HAPUS</th>

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
                        <p>JURNAL</p>
                        <p><i class="icon-people mr-10"></i>INFO JURNAL</p>

                    </div>
                    <div class="modal-body">
                        <!-- Form body  -->

                        <div class="form-body mt-20">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Tanggal</label>
                                        <div class="col-md-9 has-success">
                                            <input type="date" placeholder="TANGGAL MASUK" value="<?php echo date("Y-m-d"); ?>" id="tgl_faktur" name="tgl_faktur" class="form-control"></input>
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
                                            $noValid =  sprintf('%04d', $max + 1, 'dyhtdyu');
                                            $noDok = $noValid . "/" . "GL-" . $kode . "/" . date('my');
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

                        <button onclick="insertFaktur()" class="btn btn-success btn-anim  btn-sm" type="button"><i class="icon-rocket"></i><span class="btn-text">BUAT JURNAL</span></button>

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
                                <h5 class="modal-title mt-10" id="myLargeModalLabel"><i class="icon-user mr-10"></i> INFO JURNAL
                                </h5>
                            </div>
                            <div class="modal-body">

                                <div class="row">
                                    <div class="col-sm-12">

                                        <div class="panel-heading">
                                            <div class="pull-left">
                                                <h6 class="panel-title txt-dark">LIST JURNAL</h6>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>

                                        <div class="row">

                                            <div class="form-wrap">


                                                <div class="row">

                                                    <div class="col-md-6 mt-10">
                                                        <div class="form-group ">
                                                            <label class="control-label col-md-3">NO DOKUMEN</label>
                                                            <div class="col-md-9 has-error">
                                                                <input type="text" class="form-control" readonly id="no_dok">
                                                                <input type="hidden" class="form-control " autocomplete="off" id="inFaktur">
                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 mt-10">
                                                        <div class="form-group ">
                                                            <label class="control-label col-md-3">KATEGORI</label>
                                                            <div class="col-md-9 has-success ">
                                                                <select class="form-control filled-input select2" style="border: 1px solid lightgreen;" name="inKategori" id="inKategori">

                                                                    <option value="">PILIH</option>
                                                                    <?php
                                                                    foreach ($pelayanan as $row) :
                                                                    ?>
                                                                        <option value="<?php echo $row["id_akun"]; ?>"><?php echo $row["deskripsi"] . ' (' . $row["kode"] . ')'; ?></option>

                                                                    <?php endforeach; ?>
                                                                </select>
                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 mt-10">
                                                        <div class="form-group ">
                                                            <label class="control-label col-md-3 mt-10">NO PK</label>
                                                            <div class="col-md-9 has-success">
                                                                <input type="text" class="form-control" autocomplete="off" id="inPK">

                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 mt-10">
                                                        <div class="form-group ">
                                                            <label class="control-label col-md-3">SUB KATEGORI</label>
                                                            <div class="col-md-9 has-success ">
                                                                <select class="form-control filled-input select2" style="border: 1px solid lightgreen;" name="inJenis" id="inJenis">

                                                                </select>
                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 mt-10">
                                                        <div class="form-group ">
                                                            <label class="control-label col-md-3 mt-10">DESKRIPSI</label>
                                                            <div class="col-md-9 has-success">
                                                                <textarea cols="5" rows="5" class="form-control" autocomplete="off" id="inDesk"></textarea>
                                                                <!-- <input type="text" class="form-control" autocomplete="off" id="inDesk"> -->

                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 mt-10">
                                                        <div class="form-group ">
                                                            <label class="control-label col-md-3">LIST</label>
                                                            <div class="col-md-9 has-success ">
                                                                <select class="form-control filled-input select2" style="border: 1px solid lightgreen;" name="inPelayanan" id="inPelayanan">

                                                                </select>
                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 mt-10">
                                                        <div class="form-group ">
                                                            <label class="control-label col-md-3 mt-10">NILAI</label>
                                                            <div class="col-md-9 has-success">
                                                                <input type="number" class="form-control" step="0.01" autocomplete="off" value="" id="inNilai">

                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 mt-10">
                                                        <div class="form-group ">
                                                            <label class="control-label col-md-3">TIPE</label>
                                                            <div class="col-md-9 has-success ">
                                                                <select class="form-control filled-input select2" style="border: 1px solid lightgreen;" name="inTipe" id="inTipe">

                                                                    <option value="-" selected>-</option>
                                                                    <option value="DEBIT">DEBIT</option>
                                                                    <option value="KREDIT">KREDIT</option>

                                                                </select>
                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 mt-10 " id="tbh_vendor">
                                                        <div class="form-group ">
                                                            <label class="control-label col-md-3">VENDOR</label>
                                                            <div class="col-md-9 has-success ">
                                                                <select class="form-control filled-input select2" style="border: 1px solid lightgreen;" name="inVendor" id="inVendor">

                                                                    <option value="-">-</option>
                                                                    <?php
                                                                    foreach ($vendor as $row) :
                                                                    ?>
                                                                        <option value="<?php echo $row["id_vendor"]; ?>"><?php echo $row["nama"]; ?></option>

                                                                    <?php endforeach; ?>
                                                                </select>
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
                                                                <button type="submit" style="display: block;" class="btn btn-success mr-10" onclick="insertObatFaktur()">TAMBAH AYAT JURNAL</button>
                                                                <!-- <button type="submit" style="display: none;" class="btn btn-warning mr-10" onclick="insertObatFaktur()">EDIT</button> -->
                                                                <span></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                            <!-- edit form -->
                                            <form class="form-wrap collapse" id="edit_form">

                                                <h5 class="modal-title mt-10 ml-10" id="myLargeModalLabel"><i class="icon-user mr-10"></i> EDIT JURNAL
                                                </h5>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-md-6 mt-10">
                                                        <div class="form-group ">
                                                            <label class="control-label col-md-3 mt-10">NO PK</label>
                                                            <div class="col-md-9 has-success">
                                                                <input type="text" class="form-control" autocomplete="off" id="upPK">

                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 mt-10">
                                                        <div class="form-group ">
                                                            <label class="control-label col-md-3">KATEGORI</label>
                                                            <div class="col-md-9 has-success ">
                                                                <select class="form-control filled-input select2" style="border: 1px solid lightgreen;" name="upKategori" id="upKategori">

                                                                    <option value="-">PILIH</option>
                                                                    <?php
                                                                    foreach ($pelayanan as $row) :
                                                                    ?>
                                                                        <option value="<?php echo $row["id_akun"]; ?>">
                                                                            <?php echo $row["deskripsi"] . ' (' . $row["kode"] . ')'; ?>
                                                                        </option>

                                                                    <?php endforeach; ?>
                                                                </select>
                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 mt-10">
                                                        <div class="form-group ">
                                                            <label class="control-label col-md-3 mt-10">DESKRIPSI</label>
                                                            <div class="col-md-9 has-success">
                                                                <input type="text" class="form-control" autocomplete="off" id="upDesk">

                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 mt-10">
                                                        <div class="form-group ">
                                                            <label class="control-label col-md-3">SUB KATEGORI</label>
                                                            <div class="col-md-9 has-success ">
                                                                <select class="form-control filled-input select2" style="border: 1px solid lightgreen;" name="upJenis" id="upJenis" onchange="getList()">

                                                                </select>
                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 mt-10">
                                                        <div class="form-group ">
                                                            <label class="control-label col-md-3 mt-10">NILAI</label>
                                                            <div class="col-md-9 has-success">
                                                                <input type="number" class="form-control" autocomplete="off" value="0" id="upNilai">

                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 mt-10">
                                                        <div class="form-group ">
                                                            <label class="control-label col-md-3">LIST</label>
                                                            <div class="col-md-9 has-success ">
                                                                <select class="form-control filled-input select2" style="border: 1px solid lightgreen;" name="upPelayanan" id="upPelayanan">

                                                                </select>
                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>
                                                    </div>



                                                    <div class="col-md-6 mt-10">
                                                        <div class="form-group ">
                                                            <label class="control-label col-md-3">TIPE</label>
                                                            <div class="col-md-9 has-success ">
                                                                <select class="form-control filled-input select2" style="border: 1px solid lightgreen;" name="upTipe" id="upTipe">

                                                                    <option value="-" selected>-</option>
                                                                    <option value="DEBIT">DEBIT</option>
                                                                    <option value="KREDIT">KREDIT</option>

                                                                </select>
                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>
                                                <div class="row" style="margin-top: 20px;">
                                                    <div class="col-md-6"> </div>
                                                    <div class="col-md-6">
                                                        <div class="row">
                                                            <div class="col-md-offset-3 col-md-9">
                                                                <input type="hidden" class="form-control" autocomplete="off" id="upId">
                                                                <input type="hidden" class="form-control" autocomplete="off" id="data_sub_kategori">
                                                                <input type="hidden" class="form-control" autocomplete="off" id="data_list">
                                                                <button type="button" style="display: block;" class="btn btn-info mr-10" onclick="editAyatJurnal()">EDIT AYAT JURNAL</button>
                                                                <!-- <button type="submit" style="display: none;" class="btn btn-warning mr-10" onclick="insertObatFaktur()">EDIT</button> -->
                                                                <span></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                            </form>
                                            <!-- end form edit-->
                                            <div class="row">
                                                <div class="col-sm-12">

                                                    <div class="panel-heading">
                                                        <div class="pull-left">
                                                            <h6 class="panel-title txt-dark">LIST JURNAL</h6>
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
                                                                            <th>EDIT</th>
                                                                            <th>REKENING</th>
                                                                            <th>DESKRIPSI</th>
                                                                            <th>PK</th>
                                                                            <th>DEBIT</th>
                                                                            <th>KREDIT</th>
                                                                            <th>DESKRIPSI REKENING</th>
                                                                            <th>HAPUS</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tfoot>
                                                                        <tr class="bg-success">
                                                                            <th>NO</th>
                                                                            <th>EDIT</th>
                                                                            <th>REKENING</th>
                                                                            <th>DESKRIPSI</th>
                                                                            <th>PK</th>
                                                                            <th>DEBIT</th>
                                                                            <th>KREDIT</th>
                                                                            <th>DESKRIPSI REKENING</th>
                                                                            <th>HAPUS</th>
                                                                        </tr>
                                                                    </tfoot>

                                                                    <tbody style="color: black; text-align: left;">
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <div class="row mt-20" style="margin-left: 10px;">
                                                            <div class="col-md-6">


                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="table-responsive ">
                                                                    <table class="table table-hover display " id="outTotalHarga">
                                                                        <thead>
                                                                            <tr class="bg-success">
                                                                                <th style="font-weight:bold;">Total</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody style="color: black">
                                                                        </tbody>
                                                                    </table>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-20" style="margin-left: 10px;">
                                                            <div class="col-md-6">


                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="table-responsive ">

                                                                    <table class="table table-hover display " id="outTotalHarga1">
                                                                        <thead>
                                                                            <tr class="bg-success">
                                                                                <th style="font-weight:bold;">Total Debit</th>
                                                                                <th style="font-weight:bold;">Total Kredit</th>

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



<div id="div_result" style="display: none;"></div>
<!--end modal edit-->
<script type="text/javascript">
    $(document).ready(function() {

        $('#inKategori').change(function() {
            var upNama = $('#inKategori').val();
            if (upNama != '') {
                $.ajax({
                    url: "<?= base_url() . 'Jurnal_manual/get_beban_usaha' ?>",
                    data: {
                        jenis: upNama,
                    },
                    type: 'POST',
                    dataType: 'json',
                    success: function(data) {
                        var html = '';
                        var i;
                        html = '<option>-</option>';
                        for (i = 0; i < data.length; i++) {
                            html += '<option value=' + data[i].id_detail + '|' + data[i].id_akun + '>' + data[i].deskripsi + ' (' + data[i].kode + ')</option>';
                        }
                        $('#inJenis').html(html);
                    }
                });
            } else {
                $('#inJenis').html('<option value="">-</option>');
            }

        });
        $('#inJenis').change(function() {
            var upNama = $('#inKategori').val();
            var a = $('#inJenis').val();
            splitDiag = a.split("|");
            upJenis = splitDiag[0];
            if (upNama != '' && upJenis != '') {
                $.ajax({
                    url: "<?= base_url() . 'Jurnal_manual/get_detail_akun' ?>",
                    data: {
                        kategori: upNama,
                        jenis: upJenis,
                    },
                    type: 'POST',
                    dataType: 'json',
                    success: function(data) {
                        var html = '';
                        var i;
                        html = '<option>-</option>';
                        for (i = 0; i < data.length; i++) {
                            html += '<option value="' + data[i].kode + '|' + data[i].deskripsi + '|' + '">' + data[i].deskripsi + ' (' + data[i].kode + ')</option>';
                        }
                        $('#inPelayanan').html(html);
                    }
                });
            } else {
                $('#inPelayanan').html('<option value="">-</option>');
            }

        });
        $('#inTipe').change(function() {
            var tipe = $('#inTipe').val();
            var no_jurnal = $('#no_dok').val();
            if (tipe != '-') {
                $.ajax({
                    url: "<?= base_url() . 'Jurnal_manual/getSum' ?>",
                    data: {
                        no_jurnal: no_jurnal,
                        tipe: tipe,
                    },
                    type: 'POST',
                    dataType: 'json',
                    success: function(data) {
                        if (tipe == 'KREDIT') {
                            nilai = Number(data.debet) - Number(data.kredit);
                            $('#inNilai').val(nilai <= 0 ? '' : nilai);
                        } else {
                            nilai = Number(data.kredit) - Number(data.debet);
                            $('#inNilai').val(nilai <= 0 ? '' : nilai);
                        }
                    }
                });
            } else {
                $('#inNilai').val('');
            }

        });
        $('#tgl_faktur').change(function() {
            var tanggal = $('#tgl_faktur').val();

            $.ajax({
                url: "<?= base_url() . 'Jurnal_manual/getNoDokumen' ?>",
                data: {
                    tanggal: tanggal,
                    kode: '306'
                },
                type: 'POST',
                dataType: 'json',
                success: function(data) {
                    $('#no_dokumen').val(data);

                }
            });


        });
    });

    function verifikasi(no_jurnal) {

        $.ajax({
            url: "<?= base_url() . 'Jurnal_manual/simpan_jurnal_rupa' ?>",
            data: {
                no_jurnal: no_jurnal,
            },
            type: 'POST',
            dataType: 'json',
            success: function(data) {
                if (data.status == "success") {
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Jurnal " + no_jurnal + " Berhasil Disimpan",
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


    }
</script>
<script type="text/javascript">
    function insertFaktur() {

        tgl_faktur = $('#tgl_faktur').val();
        no_dokumen = $('#no_dokumen').val();
        var str = no_dokumen + "";
        noIndex = str.substring(0, 4);

        dataString = '&tgl_faktur=' + tgl_faktur +
            '&no_dokumen=' + no_dokumen + '&no_index=' + noIndex;

        $().ready(function() {
            $.ajax({
                url: "<?php echo base_url() ?>Jurnal_manual/insertJurnalRupa",
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
                        $('#datable').DataTable().ajax.reload();
                        $(".modal-pendaftaranakun").modal('hide');
                        var date = moment();
                        // var currentDate = date.format('D/MM/YYYY');
                        document.getElementById('tgl_faktur').value = "<?php echo date("Y-m-d"); ?>";
                        $('#no_dokumen').val("");

                        //$('#username_result').html("");

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
                    url: "<?php echo base_url() ?>Jurnal_manual/hapus_jurnal_rupa",
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

    function ubah_ket(no_jurnal) {
        swal({
            title: "Apakah kamu yakin?",
            text: "Mengembalikan no jurnal " + no_jurnal + "?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3cb878",
            confirmButtonText: "Yakin",
            cancelButtonText: "Batal",
            closeOnConfirm: false
        }, function() {
            $().ready(function() {
                $.ajax({
                    url: "<?php echo base_url() ?>Jurnal_manual/ubah_keterangan",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        no_jurnal: no_jurnal,
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

    function tambah_obat_faktur(id_faktur, no_dokumen) {
        // alert(no_dokumen);
        $("#no_dok").val(no_dokumen);
        $("#inFaktur").val(id_faktur);
        $('#inPelayanan').val('01').change();
        $("#modalTambahObatFaktur").modal('show');
        var staff = '<?= $staff->ruangan ?>';
        if (staff == 'piutang') {
            $("#tbh_vendor").collapse('show');
        } else {
            $("#tbh_vendor").collapse('hide');
        }
        reload_list_faktur(id_faktur);
        reload_isi_list_faktur(no_dokumen);
        reload_total_dk(no_dokumen);
        reload_total(no_dokumen);
    }

    function edit_faktur(id_detail, tipe) {
        // alert(no_dokumen);
        $("#inSource").val(tipe);
        $("#upId").val(id_detail);

        $('#edit_form').collapse('toggle');
        $.ajax({
            url: "<?= base_url() . 'Jurnal_manual/getDetail_jurnal_rupa' ?>",
            data: {
                id_detail: id_detail,
                tipe: tipe,
            },
            type: 'POST',
            dataType: 'json',
            success: function(data) {
                $('#upKategori').val(data.kode1).change();

                getSubKategori(data.kode1);
                $("#data_sub_kategori").val(data.kode2 + '|' + data.kode1);
                $("#data_list").val(data.kode3 + '|' + data.desk + '|');
                $("#upDesk").val(data.deskripsi);
                $("#upPK").val(data.no_pk).change();
                $("#upNilai").val(data.nilai);
                $("#upTipe").val(data.tipe).change();

            }
        });

        $("#modalTambahObatFaktur").modal('show');
    }
    $('#modalTambahObatFaktur').on('hidden.bs.modal', function() {
        $("#inDesk").val('');
        $("#inPK").val('');
        $("#tbh_vendor").collapse('hide');
        $('#datable').DataTable().ajax.reload();

    })

    function getSubKategori(nama) {
        if (nama != '-') {
            $.ajax({
                url: "<?= base_url() . 'Jurnal_manual/get_beban_usaha' ?>",
                data: {
                    jenis: nama,
                },
                type: 'POST',
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    var i;
                    html = '<option value="-">-</option>';
                    for (i = 0; i < data.length; i++) {
                        html += '<option value="' + data[i].id_detail + '|' + data[i].id_akun + '">' + data[i].deskripsi + ' (' + data[i].kode + ')</option>';
                    }
                    $('#upJenis').html(html);
                    jenis = $('#data_sub_kategori').val();
                    $('#upJenis').val(jenis).change();
                    // getList();
                }
            });
        } else {
            $('#upJenis').html('<option value="-">-</option>');
        }

    }

    function getList() {
        var upNama = $('#upKategori').val();
        var a = $('#upJenis').val();
        splitDiag = a.split("|");
        upJenis = splitDiag[0];
        if (upNama != '-' && upJenis != '-') {
            $.ajax({
                url: "<?= base_url() . 'Jurnal_manual/get_detail_akun' ?>",
                data: {
                    kategori: upNama,
                    jenis: upJenis,
                },
                type: 'POST',
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    var i;
                    html = '<option value="-">-</option>';
                    for (i = 0; i < data.length; i++) {
                        html += '<option value="' + data[i].kode + '|' + data[i].deskripsi + '|' + '">' + data[i].deskripsi + ' (' + data[i].kode + ')</option>';
                    }
                    $('#upPelayanan').html(html);
                    list = $('#data_list').val();
                    $('#upPelayanan').val(list).change();
                }
            });
        } else {
            $('#upPelayanan').html('<option value="-">-</option>');
        }

    }
    //end


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

        pelayanan = $("#inPelayanan").val();
        kategori = $('#inKategori').val();
        id_jenis = $("#inJenis").val();
        deskripsi = $("#inDesk").val();
        pk = $("#inPK").val();
        nilai = $("#inNilai").val();
        tipe = $("#inTipe").val();
        id_jurnal = $("#inFaktur").val();
        vendor = $("#inVendor").val();
        $().ready(function() {
            $.ajax({
                url: "<?php echo base_url() ?>Jurnal_manual/insert_detail_jurnal_rupa",
                method: "POST",
                dataType: 'json',
                data: {
                    id_jurnal: id_jurnal,
                    pelayanan: pelayanan,
                    kategori: kategori,
                    id_jenis: id_jenis,
                    deskripsi: deskripsi,
                    pk: pk,
                    nilai: nilai,
                    tipe: tipe,
                    vendor: vendor,
                },
                success: function(data) {
                    if (data.status == "success") {
                        swal({
                            title: "good job!",
                            type: "success",
                            text: "Data Berhasil ditambahkan",
                            confirmButtonColor: "#3cb878",
                        });
                        $("#inPelayanan").val('01').change();
                        $("#inKategori").val('').change();
                        // $("#inDesk").val('');
                        // $("#inPK").val('');
                        $("#inNilai").val('');
                        $("#inTipe").val('-').change();
                        $('#isiFaktur1').DataTable().ajax.reload();
                        $('#outTotalHarga').DataTable().ajax.reload();
                        $('#outTotalHarga1').DataTable().ajax.reload();
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
        return false;



    }

    // mulai disini //
    function editAyatJurnal() {

        pelayanan = $("#upPelayanan").val();
        kategori = $('#upKategori').val();
        id_jenis = $("#upJenis").val();
        deskripsi = $("#upDesk").val();
        pk = $("#upPK").val();
        nilai = $("#upNilai").val();
        tipe = $("#upTipe").val();
        id_detail = $("#upId").val();
        jk = $("#jk").val();
        $().ready(function() {
            $.ajax({
                url: "<?php echo base_url() ?>Jurnal_manual/edit_detail_jurnal",
                method: "POST",
                dataType: 'json',
                data: {
                    id_detail: id_detail,
                    pelayanan: pelayanan,
                    kategori: kategori,
                    id_jenis: id_jenis,
                    deskripsi: deskripsi,
                    pk: pk,
                    nilai: nilai,
                    tipe: tipe,
                    jk: jk,

                },
                success: function(data) {
                    if (data.status == "success") {
                        swal({
                            title: "good job!",
                            type: "success",
                            text: "Data Berhasil diedit",
                            confirmButtonColor: "#3cb878",
                        });

                        $('#edit_form').collapse('hide');
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
    // selesai

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
                "url": '<?php echo base_url('Jurnal_manual/tampil_detail_jurnal_rupa'); ?>',
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
            text: "Menghapus data?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3cb878",
            confirmButtonText: "Yakin",
            cancelButtonText: "Batal",
            closeOnConfirm: false
        }, function() {
            $().ready(function() {
                $.ajax({
                    url: "<?php echo base_url() ?>Jurnal_manual/hapus_detail_jurnal_rupa",
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
                            $('#outTotalHarga').DataTable().ajax.reload();
                            $('#outTotalHarga1').DataTable().ajax.reload();
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

    function reload_total(idFaktur) {
        $('#outTotalHarga').dataTable().fnClearTable();
        $('#outTotalHarga').dataTable().fnDestroy();
        $('#outTotalHarga').DataTable({
            "searching": false,
            "lengthChange": false,
            "bInfo": false,
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
                "url": '<?= base_url('Jurnal_manual/total_jurnal_rupa'); ?>',
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

    function reload_total_dk(idFaktur) {
        $('#outTotalHarga1').dataTable().fnClearTable();
        $('#outTotalHarga1').dataTable().fnDestroy();
        $('#outTotalHarga1').DataTable({
            "searching": false,
            "lengthChange": false,
            "bInfo": false,
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
                "url": '<?= base_url('Jurnal_manual/total_jurnal_rupa_dk'); ?>',
                "type": 'POST',
                "data": {
                    idFaktur: idFaktur,
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
            "ajax": '<?php echo base_url('Jurnal_manual/tampil_jurnal_rupa'); ?>',
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
            "ajax": '<?php echo base_url('Jurnal_manual/tampil_jurnal_rupa'); ?>',
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
                "url": '<?= base_url('Jurnal_manual/tampil_jurnal_rupa'); ?>',
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
<script type="text/javascript">
    function cetak(no_jurnal) {

        $.ajax({
            type: 'POST',
            url: "<?= base_url() . 'Jurnal_manual/cetak_jurnal_rupa' ?>",
            data: {
                no_jurnal: no_jurnal,
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
                }, 100);
            }
        });
    }
</script>

=======
<div class="panel panel-default card-view">
    <div class="panel-heading">
        <div class="pull-left">
            <h6 class="panel-title txt-dark"><span class="span span-success">JURNAL RUPA RUPA</span></h6>
        </div>



        <div class="clearfix"></div>
    </div>

    <div align="right">
        <button class="btn btn-primary btn-anim mr-50" style="margin-right: 40px;" data-toggle="modal" data-target=".modal-pendaftaranakun"><i class="icon-plus"></i><span class="btn-text">BUAT
                JURNAL</span></button>
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
                                    <th>TAMBAHKAN JURNAL</th>
                                    <th>AKSI</th>
                                    <th>TANGGAL JURNAL</th>
                                    <th>NO JURNAL</th>
                                    <th>TOTAL</th>
                                    <th>STAFF</th>
                                    <th>PK</th>
                                    <th>KETERANGAN</th>
                                    <th>STATUS</th>
                                    <th>HAPUS</th>

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
                        <p>JURNAL</p>
                        <p><i class="icon-people mr-10"></i>INFO JURNAL</p>

                    </div>
                    <div class="modal-body">
                        <!-- Form body  -->

                        <div class="form-body mt-20">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Tanggal</label>
                                        <div class="col-md-9 has-success">
                                            <input type="date" placeholder="TANGGAL MASUK" value="<?php echo date("Y-m-d"); ?>" id="tgl_faktur" name="tgl_faktur" class="form-control"></input>
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
                                            $noValid =  sprintf('%04d', $max + 1, 'dyhtdyu');
                                            $noDok = $noValid . "/" . "GL-" . $kode . "/" . date('my');
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

                        <button onclick="insertFaktur()" class="btn btn-success btn-anim  btn-sm" type="button"><i class="icon-rocket"></i><span class="btn-text">BUAT JURNAL</span></button>

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
                                <h5 class="modal-title mt-10" id="myLargeModalLabel"><i class="icon-user mr-10"></i> INFO JURNAL
                                </h5>
                            </div>
                            <div class="modal-body">

                                <div class="row">
                                    <div class="col-sm-12">

                                        <div class="panel-heading">
                                            <div class="pull-left">
                                                <h6 class="panel-title txt-dark">LIST JURNAL</h6>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>

                                        <div class="row">

                                            <div class="form-wrap">


                                                <div class="row">

                                                    <div class="col-md-6 mt-10">
                                                        <div class="form-group ">
                                                            <label class="control-label col-md-3">NO DOKUMEN</label>
                                                            <div class="col-md-9 has-error">
                                                                <input type="text" class="form-control" readonly id="no_dok">
                                                                <input type="hidden" class="form-control " autocomplete="off" id="inFaktur">
                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 mt-10">
                                                        <div class="form-group ">
                                                            <label class="control-label col-md-3">KATEGORI</label>
                                                            <div class="col-md-9 has-success ">
                                                                <select class="form-control filled-input select2" style="border: 1px solid lightgreen;" name="inKategori" id="inKategori">

                                                                    <option value="">PILIH</option>
                                                                    <?php
                                                                    foreach ($pelayanan as $row) :
                                                                    ?>
                                                                        <option value="<?php echo $row["id_akun"]; ?>"><?php echo $row["deskripsi"] . ' (' . $row["kode"] . ')'; ?></option>

                                                                    <?php endforeach; ?>
                                                                </select>
                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 mt-10">
                                                        <div class="form-group ">
                                                            <label class="control-label col-md-3 mt-10">NO PK</label>
                                                            <div class="col-md-9 has-success">
                                                                <input type="text" class="form-control" autocomplete="off" id="inPK">

                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 mt-10">
                                                        <div class="form-group ">
                                                            <label class="control-label col-md-3">SUB KATEGORI</label>
                                                            <div class="col-md-9 has-success ">
                                                                <select class="form-control filled-input select2" style="border: 1px solid lightgreen;" name="inJenis" id="inJenis">

                                                                </select>
                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 mt-10">
                                                        <div class="form-group ">
                                                            <label class="control-label col-md-3 mt-10">DESKRIPSI</label>
                                                            <div class="col-md-9 has-success">
                                                                <textarea cols="5" rows="5" class="form-control" autocomplete="off" id="inDesk"></textarea>
                                                                <!-- <input type="text" class="form-control" autocomplete="off" id="inDesk"> -->

                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 mt-10">
                                                        <div class="form-group ">
                                                            <label class="control-label col-md-3">LIST</label>
                                                            <div class="col-md-9 has-success ">
                                                                <select class="form-control filled-input select2" style="border: 1px solid lightgreen;" name="inPelayanan" id="inPelayanan">

                                                                </select>
                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 mt-10">
                                                        <div class="form-group ">
                                                            <label class="control-label col-md-3 mt-10">NILAI</label>
                                                            <div class="col-md-9 has-success">
                                                                <input type="number" class="form-control" step="0.01" autocomplete="off" value="" id="inNilai">

                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 mt-10">
                                                        <div class="form-group ">
                                                            <label class="control-label col-md-3">TIPE</label>
                                                            <div class="col-md-9 has-success ">
                                                                <select class="form-control filled-input select2" style="border: 1px solid lightgreen;" name="inTipe" id="inTipe">

                                                                    <option value="-" selected>-</option>
                                                                    <option value="DEBIT">DEBIT</option>
                                                                    <option value="KREDIT">KREDIT</option>

                                                                </select>
                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 mt-10 " id="tbh_vendor">
                                                        <div class="form-group ">
                                                            <label class="control-label col-md-3">VENDOR</label>
                                                            <div class="col-md-9 has-success ">
                                                                <select class="form-control filled-input select2" style="border: 1px solid lightgreen;" name="inVendor" id="inVendor">

                                                                    <option value="-">-</option>
                                                                    <?php
                                                                    foreach ($vendor as $row) :
                                                                    ?>
                                                                        <option value="<?php echo $row["id_vendor"]; ?>"><?php echo $row["nama"]; ?></option>

                                                                    <?php endforeach; ?>
                                                                </select>
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
                                                                <button type="submit" style="display: block;" class="btn btn-success mr-10" onclick="insertObatFaktur()">TAMBAH AYAT JURNAL</button>
                                                                <!-- <button type="submit" style="display: none;" class="btn btn-warning mr-10" onclick="insertObatFaktur()">EDIT</button> -->
                                                                <span></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                            <!-- edit form -->
                                            <form class="form-wrap collapse" id="edit_form">

                                                <h5 class="modal-title mt-10 ml-10" id="myLargeModalLabel"><i class="icon-user mr-10"></i> EDIT JURNAL
                                                </h5>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-md-6 mt-10">
                                                        <div class="form-group ">
                                                            <label class="control-label col-md-3 mt-10">NO PK</label>
                                                            <div class="col-md-9 has-success">
                                                                <input type="text" class="form-control" autocomplete="off" id="upPK">

                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 mt-10">
                                                        <div class="form-group ">
                                                            <label class="control-label col-md-3">KATEGORI</label>
                                                            <div class="col-md-9 has-success ">
                                                                <select class="form-control filled-input select2" style="border: 1px solid lightgreen;" name="upKategori" id="upKategori">

                                                                    <option value="-">PILIH</option>
                                                                    <?php
                                                                    foreach ($pelayanan as $row) :
                                                                    ?>
                                                                        <option value="<?php echo $row["id_akun"]; ?>">
                                                                            <?php echo $row["deskripsi"] . ' (' . $row["kode"] . ')'; ?>
                                                                        </option>

                                                                    <?php endforeach; ?>
                                                                </select>
                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 mt-10">
                                                        <div class="form-group ">
                                                            <label class="control-label col-md-3 mt-10">DESKRIPSI</label>
                                                            <div class="col-md-9 has-success">
                                                                <input type="text" class="form-control" autocomplete="off" id="upDesk">

                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 mt-10">
                                                        <div class="form-group ">
                                                            <label class="control-label col-md-3">SUB KATEGORI</label>
                                                            <div class="col-md-9 has-success ">
                                                                <select class="form-control filled-input select2" style="border: 1px solid lightgreen;" name="upJenis" id="upJenis" onchange="getList()">

                                                                </select>
                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 mt-10">
                                                        <div class="form-group ">
                                                            <label class="control-label col-md-3 mt-10">NILAI</label>
                                                            <div class="col-md-9 has-success">
                                                                <input type="number" class="form-control" autocomplete="off" value="0" id="upNilai">

                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 mt-10">
                                                        <div class="form-group ">
                                                            <label class="control-label col-md-3">LIST</label>
                                                            <div class="col-md-9 has-success ">
                                                                <select class="form-control filled-input select2" style="border: 1px solid lightgreen;" name="upPelayanan" id="upPelayanan">

                                                                </select>
                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>
                                                    </div>



                                                    <div class="col-md-6 mt-10">
                                                        <div class="form-group ">
                                                            <label class="control-label col-md-3">TIPE</label>
                                                            <div class="col-md-9 has-success ">
                                                                <select class="form-control filled-input select2" style="border: 1px solid lightgreen;" name="upTipe" id="upTipe">

                                                                    <option value="-" selected>-</option>
                                                                    <option value="DEBIT">DEBIT</option>
                                                                    <option value="KREDIT">KREDIT</option>

                                                                </select>
                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>
                                                <div class="row" style="margin-top: 20px;">
                                                    <div class="col-md-6"> </div>
                                                    <div class="col-md-6">
                                                        <div class="row">
                                                            <div class="col-md-offset-3 col-md-9">
                                                                <input type="hidden" class="form-control" autocomplete="off" id="upId">
                                                                <input type="hidden" class="form-control" autocomplete="off" id="data_sub_kategori">
                                                                <input type="hidden" class="form-control" autocomplete="off" id="data_list">
                                                                <button type="button" style="display: block;" class="btn btn-info mr-10" onclick="editAyatJurnal()">EDIT AYAT JURNAL</button>
                                                                <!-- <button type="submit" style="display: none;" class="btn btn-warning mr-10" onclick="insertObatFaktur()">EDIT</button> -->
                                                                <span></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                            </form>
                                            <!-- end form edit-->
                                            <div class="row">
                                                <div class="col-sm-12">

                                                    <div class="panel-heading">
                                                        <div class="pull-left">
                                                            <h6 class="panel-title txt-dark">LIST JURNAL</h6>
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
                                                                            <th>EDIT</th>
                                                                            <th>REKENING</th>
                                                                            <th>DESKRIPSI</th>
                                                                            <th>PK</th>
                                                                            <th>DEBIT</th>
                                                                            <th>KREDIT</th>
                                                                            <th>DESKRIPSI REKENING</th>
                                                                            <th>HAPUS</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tfoot>
                                                                        <tr class="bg-success">
                                                                            <th>NO</th>
                                                                            <th>EDIT</th>
                                                                            <th>REKENING</th>
                                                                            <th>DESKRIPSI</th>
                                                                            <th>PK</th>
                                                                            <th>DEBIT</th>
                                                                            <th>KREDIT</th>
                                                                            <th>DESKRIPSI REKENING</th>
                                                                            <th>HAPUS</th>
                                                                        </tr>
                                                                    </tfoot>

                                                                    <tbody style="color: black; text-align: left;">
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <div class="row mt-20" style="margin-left: 10px;">
                                                            <div class="col-md-6">


                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="table-responsive ">
                                                                    <table class="table table-hover display " id="outTotalHarga">
                                                                        <thead>
                                                                            <tr class="bg-success">
                                                                                <th style="font-weight:bold;">Total</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody style="color: black">
                                                                        </tbody>
                                                                    </table>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-20" style="margin-left: 10px;">
                                                            <div class="col-md-6">


                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="table-responsive ">

                                                                    <table class="table table-hover display " id="outTotalHarga1">
                                                                        <thead>
                                                                            <tr class="bg-success">
                                                                                <th style="font-weight:bold;">Total Debit</th>
                                                                                <th style="font-weight:bold;">Total Kredit</th>

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



<div id="div_result" style="display: none;"></div>
<!--end modal edit-->
<script type="text/javascript">
    $(document).ready(function() {

        $('#inKategori').change(function() {
            var upNama = $('#inKategori').val();
            if (upNama != '') {
                $.ajax({
                    url: "<?= base_url() . 'Jurnal_manual/get_beban_usaha' ?>",
                    data: {
                        jenis: upNama,
                    },
                    type: 'POST',
                    dataType: 'json',
                    success: function(data) {
                        var html = '';
                        var i;
                        html = '<option>-</option>';
                        for (i = 0; i < data.length; i++) {
                            html += '<option value=' + data[i].id_detail + '|' + data[i].id_akun + '>' + data[i].deskripsi + ' (' + data[i].kode + ')</option>';
                        }
                        $('#inJenis').html(html);
                    }
                });
            } else {
                $('#inJenis').html('<option value="">-</option>');
            }

        });
        $('#inJenis').change(function() {
            var upNama = $('#inKategori').val();
            var a = $('#inJenis').val();
            splitDiag = a.split("|");
            upJenis = splitDiag[0];
            if (upNama != '' && upJenis != '') {
                $.ajax({
                    url: "<?= base_url() . 'Jurnal_manual/get_detail_akun' ?>",
                    data: {
                        kategori: upNama,
                        jenis: upJenis,
                    },
                    type: 'POST',
                    dataType: 'json',
                    success: function(data) {
                        var html = '';
                        var i;
                        html = '<option>-</option>';
                        for (i = 0; i < data.length; i++) {
                            html += '<option value="' + data[i].kode + '|' + data[i].deskripsi + '|' + '">' + data[i].deskripsi + ' (' + data[i].kode + ')</option>';
                        }
                        $('#inPelayanan').html(html);
                    }
                });
            } else {
                $('#inPelayanan').html('<option value="">-</option>');
            }

        });
        $('#inTipe').change(function() {
            var tipe = $('#inTipe').val();
            var no_jurnal = $('#no_dok').val();
            if (tipe != '-') {
                $.ajax({
                    url: "<?= base_url() . 'Jurnal_manual/getSum' ?>",
                    data: {
                        no_jurnal: no_jurnal,
                        tipe: tipe,
                    },
                    type: 'POST',
                    dataType: 'json',
                    success: function(data) {
                        if (tipe == 'KREDIT') {
                            nilai = Number(data.debet) - Number(data.kredit);
                            $('#inNilai').val(nilai <= 0 ? '' : nilai);
                        } else {
                            nilai = Number(data.kredit) - Number(data.debet);
                            $('#inNilai').val(nilai <= 0 ? '' : nilai);
                        }
                    }
                });
            } else {
                $('#inNilai').val('');
            }

        });
        $('#tgl_faktur').change(function() {
            var tanggal = $('#tgl_faktur').val();

            $.ajax({
                url: "<?= base_url() . 'Jurnal_manual/getNoDokumen' ?>",
                data: {
                    tanggal: tanggal,
                    kode: '306'
                },
                type: 'POST',
                dataType: 'json',
                success: function(data) {
                    $('#no_dokumen').val(data);

                }
            });


        });
    });

    function verifikasi(no_jurnal) {

        $.ajax({
            url: "<?= base_url() . 'Jurnal_manual/simpan_jurnal_rupa' ?>",
            data: {
                no_jurnal: no_jurnal,
            },
            type: 'POST',
            dataType: 'json',
            success: function(data) {
                if (data.status == "success") {
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Jurnal " + no_jurnal + " Berhasil Disimpan",
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


    }
</script>
<script type="text/javascript">
    function insertFaktur() {

        tgl_faktur = $('#tgl_faktur').val();
        no_dokumen = $('#no_dokumen').val();
        var str = no_dokumen + "";
        noIndex = str.substring(0, 4);

        dataString = '&tgl_faktur=' + tgl_faktur +
            '&no_dokumen=' + no_dokumen + '&no_index=' + noIndex;

        $().ready(function() {
            $.ajax({
                url: "<?php echo base_url() ?>Jurnal_manual/insertJurnalRupa",
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
                        $('#datable').DataTable().ajax.reload();
                        $(".modal-pendaftaranakun").modal('hide');
                        var date = moment();
                        // var currentDate = date.format('D/MM/YYYY');
                        document.getElementById('tgl_faktur').value = "<?php echo date("Y-m-d"); ?>";
                        $('#no_dokumen').val("");

                        //$('#username_result').html("");

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
                    url: "<?php echo base_url() ?>Jurnal_manual/hapus_jurnal_rupa",
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

    function ubah_ket(no_jurnal) {
        swal({
            title: "Apakah kamu yakin?",
            text: "Mengembalikan no jurnal " + no_jurnal + "?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3cb878",
            confirmButtonText: "Yakin",
            cancelButtonText: "Batal",
            closeOnConfirm: false
        }, function() {
            $().ready(function() {
                $.ajax({
                    url: "<?php echo base_url() ?>Jurnal_manual/ubah_keterangan",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        no_jurnal: no_jurnal,
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

    function tambah_obat_faktur(id_faktur, no_dokumen) {
        // alert(no_dokumen);
        $("#no_dok").val(no_dokumen);
        $("#inFaktur").val(id_faktur);
        $('#inPelayanan').val('01').change();
        $("#modalTambahObatFaktur").modal('show');
        var staff = '<?= $staff->ruangan ?>';
        if (staff == 'piutang') {
            $("#tbh_vendor").collapse('show');
        } else {
            $("#tbh_vendor").collapse('hide');
        }
        reload_list_faktur(id_faktur);
        reload_isi_list_faktur(no_dokumen);
        reload_total_dk(no_dokumen);
        reload_total(no_dokumen);
    }

    function edit_faktur(id_detail, tipe) {
        // alert(no_dokumen);
        $("#inSource").val(tipe);
        $("#upId").val(id_detail);

        $('#edit_form').collapse('toggle');
        $.ajax({
            url: "<?= base_url() . 'Jurnal_manual/getDetail_jurnal_rupa' ?>",
            data: {
                id_detail: id_detail,
                tipe: tipe,
            },
            type: 'POST',
            dataType: 'json',
            success: function(data) {
                $('#upKategori').val(data.kode1).change();

                getSubKategori(data.kode1);
                $("#data_sub_kategori").val(data.kode2 + '|' + data.kode1);
                $("#data_list").val(data.kode3 + '|' + data.desk + '|');
                $("#upDesk").val(data.deskripsi);
                $("#upPK").val(data.no_pk).change();
                $("#upNilai").val(data.nilai);
                $("#upTipe").val(data.tipe).change();

            }
        });

        $("#modalTambahObatFaktur").modal('show');
    }
    $('#modalTambahObatFaktur').on('hidden.bs.modal', function() {
        $("#inDesk").val('');
        $("#inPK").val('');
        $("#tbh_vendor").collapse('hide');
        $('#datable').DataTable().ajax.reload();

    })

    function getSubKategori(nama) {
        if (nama != '-') {
            $.ajax({
                url: "<?= base_url() . 'Jurnal_manual/get_beban_usaha' ?>",
                data: {
                    jenis: nama,
                },
                type: 'POST',
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    var i;
                    html = '<option value="-">-</option>';
                    for (i = 0; i < data.length; i++) {
                        html += '<option value="' + data[i].id_detail + '|' + data[i].id_akun + '">' + data[i].deskripsi + ' (' + data[i].kode + ')</option>';
                    }
                    $('#upJenis').html(html);
                    jenis = $('#data_sub_kategori').val();
                    $('#upJenis').val(jenis).change();
                    // getList();
                }
            });
        } else {
            $('#upJenis').html('<option value="-">-</option>');
        }

    }

    function getList() {
        var upNama = $('#upKategori').val();
        var a = $('#upJenis').val();
        splitDiag = a.split("|");
        upJenis = splitDiag[0];
        if (upNama != '-' && upJenis != '-') {
            $.ajax({
                url: "<?= base_url() . 'Jurnal_manual/get_detail_akun' ?>",
                data: {
                    kategori: upNama,
                    jenis: upJenis,
                },
                type: 'POST',
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    var i;
                    html = '<option value="-">-</option>';
                    for (i = 0; i < data.length; i++) {
                        html += '<option value="' + data[i].kode + '|' + data[i].deskripsi + '|' + '">' + data[i].deskripsi + ' (' + data[i].kode + ')</option>';
                    }
                    $('#upPelayanan').html(html);
                    list = $('#data_list').val();
                    $('#upPelayanan').val(list).change();
                }
            });
        } else {
            $('#upPelayanan').html('<option value="-">-</option>');
        }

    }
    //end


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

        pelayanan = $("#inPelayanan").val();
        kategori = $('#inKategori').val();
        id_jenis = $("#inJenis").val();
        deskripsi = $("#inDesk").val();
        pk = $("#inPK").val();
        nilai = $("#inNilai").val();
        tipe = $("#inTipe").val();
        id_jurnal = $("#inFaktur").val();
        vendor = $("#inVendor").val();
        $().ready(function() {
            $.ajax({
                url: "<?php echo base_url() ?>Jurnal_manual/insert_detail_jurnal_rupa",
                method: "POST",
                dataType: 'json',
                data: {
                    id_jurnal: id_jurnal,
                    pelayanan: pelayanan,
                    kategori: kategori,
                    id_jenis: id_jenis,
                    deskripsi: deskripsi,
                    pk: pk,
                    nilai: nilai,
                    tipe: tipe,
                    vendor: vendor,
                },
                success: function(data) {
                    if (data.status == "success") {
                        swal({
                            title: "good job!",
                            type: "success",
                            text: "Data Berhasil ditambahkan",
                            confirmButtonColor: "#3cb878",
                        });
                        $("#inPelayanan").val('01').change();
                        $("#inKategori").val('').change();
                        // $("#inDesk").val('');
                        // $("#inPK").val('');
                        $("#inNilai").val('');
                        $("#inTipe").val('-').change();
                        $('#isiFaktur1').DataTable().ajax.reload();
                        $('#outTotalHarga').DataTable().ajax.reload();
                        $('#outTotalHarga1').DataTable().ajax.reload();
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
        return false;



    }

    // mulai disini //
    function editAyatJurnal() {

        pelayanan = $("#upPelayanan").val();
        kategori = $('#upKategori').val();
        id_jenis = $("#upJenis").val();
        deskripsi = $("#upDesk").val();
        pk = $("#upPK").val();
        nilai = $("#upNilai").val();
        tipe = $("#upTipe").val();
        id_detail = $("#upId").val();
        jk = $("#jk").val();
        $().ready(function() {
            $.ajax({
                url: "<?php echo base_url() ?>Jurnal_manual/edit_detail_jurnal",
                method: "POST",
                dataType: 'json',
                data: {
                    id_detail: id_detail,
                    pelayanan: pelayanan,
                    kategori: kategori,
                    id_jenis: id_jenis,
                    deskripsi: deskripsi,
                    pk: pk,
                    nilai: nilai,
                    tipe: tipe,
                    jk: jk,

                },
                success: function(data) {
                    if (data.status == "success") {
                        swal({
                            title: "good job!",
                            type: "success",
                            text: "Data Berhasil diedit",
                            confirmButtonColor: "#3cb878",
                        });

                        $('#edit_form').collapse('hide');
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
    // selesai

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
                "url": '<?php echo base_url('Jurnal_manual/tampil_detail_jurnal_rupa'); ?>',
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
            text: "Menghapus data?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3cb878",
            confirmButtonText: "Yakin",
            cancelButtonText: "Batal",
            closeOnConfirm: false
        }, function() {
            $().ready(function() {
                $.ajax({
                    url: "<?php echo base_url() ?>Jurnal_manual/hapus_detail_jurnal_rupa",
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
                            $('#outTotalHarga').DataTable().ajax.reload();
                            $('#outTotalHarga1').DataTable().ajax.reload();
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

    function reload_total(idFaktur) {
        $('#outTotalHarga').dataTable().fnClearTable();
        $('#outTotalHarga').dataTable().fnDestroy();
        $('#outTotalHarga').DataTable({
            "searching": false,
            "lengthChange": false,
            "bInfo": false,
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
                "url": '<?= base_url('Jurnal_manual/total_jurnal_rupa'); ?>',
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

    function reload_total_dk(idFaktur) {
        $('#outTotalHarga1').dataTable().fnClearTable();
        $('#outTotalHarga1').dataTable().fnDestroy();
        $('#outTotalHarga1').DataTable({
            "searching": false,
            "lengthChange": false,
            "bInfo": false,
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
                "url": '<?= base_url('Jurnal_manual/total_jurnal_rupa_dk'); ?>',
                "type": 'POST',
                "data": {
                    idFaktur: idFaktur,
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
            "ajax": '<?php echo base_url('Jurnal_manual/tampil_jurnal_rupa'); ?>',
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
            "ajax": '<?php echo base_url('Jurnal_manual/tampil_jurnal_rupa'); ?>',
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
                "url": '<?= base_url('Jurnal_manual/tampil_jurnal_rupa'); ?>',
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
<script type="text/javascript">
    function cetak(no_jurnal) {

        $.ajax({
            type: 'POST',
            url: "<?= base_url() . 'Jurnal_manual/cetak_jurnal_rupa' ?>",
            data: {
                no_jurnal: no_jurnal,
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
                }, 100);
            }
        });
    }
</script>

>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
<!--end tampil data-->