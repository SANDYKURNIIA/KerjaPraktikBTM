<div class="panel panel-default card-view">
    <div class="panel-heading">
        <div class="pull-left">
            <h6 class="panel-title txt-dark"><span class="span span-success">PERENCANAAN</span></h6>
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
                                    <th>AKSI</th>
                                    <th>PILIH</th>
                                    <th>VENDOR</th>
                                    <th>HAPUS</th>
                                    <th>EDIT</th>
                                    <th>NO DOKUMENT</th>
                                    <th>TANGGAL INPUT</th>
                                    <th>TANGGAL PERENCANAAN</th>
                                    <th>NO USULAN</th>
                                    <th>STATUS</th>
                                    <th>STATUS CHIEF FARMASI</th>
                                    <th>KET CHIEF FARMASI</th>
                                    <th>TGL ACC CHIEF FARMASI</th>
                                    <th>STATUS DIREKTUR</th>
                                    <th>KET DIREKTUR</th>
                                    <th>TGL ACC DIREKTUR</th>
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
<!-- tambah faktur -->
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
                                        <label class="control-label col-md-3">Tanggal PERENCANAAN</label>
                                        <div class="col-md-9 has-success">
                                            <input type="date" placeholder="TANGGAL MASUK" value="<?php echo date("Y-m-d"); ?>" id="tgl_faktur" name="tgl_faktur" data-toggle="datepicker" class="form-control filled-input" autocomplete="off"></input>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>

                                <!-- span -->

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">PILIH USULAN</label>
                                        <div class="col-md-9 has-success">

                                            <select class="form-control filled-input select2" id="id_vendor" name="id_vendor">
                                                <option value="-">PILIH</option>

                                                <?php foreach ($usulan as $v) { ?>
                                                    <option value="<?= $v['id_faktur']; ?>"><?= $v['no_dokumen']; ?></option>

                                                <?php } ?>
                                            </select>

                                        </div>

                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <p class="mt-15">
                                <!-- /Row -->

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">NO DOKUMEN</label>
                                        <div class="col-md-9 has-success">
                                            <!--ajax-->

                                            <?php
                                           
                                            date_default_timezone_set('Asia/Jakarta');
                                            date("Y-m-d");
                                            $noValid =  sprintf('%04d', $max, 'dyhtdyu');
                                            $noDok = $noValid . "/" . "PR/FARM-RSBT/" . numtor(date("m")) . "/" . date("Y");
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


    </div>

</div>

<!-- tambah obat -->
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
                                <div class="panel-wrapper collapse in">

                                    <div class="table-wrap">
                                        <div class="table-responsive">
                                            <table id="isiFaktur" class="table table-hover display  pb-30">
                                                <thead>
                                                    <tr class="bg-success">
                                                        <th>NO</th>
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
                                                        <th>NAMA OBAT</th>
                                                        <th>PRODUSEN</th>
                                                        <th>JUMLAH SATUAN TERKECIL</th>
                                                        <th>JUMLAH PESANAN</th>
                                                        <th>AKSI</th>
                                                    </tr>
                                                </tfoot>

                                                <tbody style="color: black">
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer mb-10 mr-15">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-wrap">

                                    <div class="collapse" id="collap_obat_faktur">
                                        <div class="row">
                                            <div class="col-md-6 mt-10">
                                                <div class="form-group ">
                                                    <label class="control-label col-md-3">NAMA OBAT</label>
                                                    <div class="col-md-9 has-success">
                                                        <input type="text" class="form-control " autocomplete="off" placeholder="NAMA OBAT" id="upNama" disabled>
                                                        <span class="help-block"></span>
                                                    </div>
                                                </div>
                                            </div>


                                            <input type="hidden" class="form-control" autocomplete="off" placeholder="JUMLAH PESAN" id="inJumlah">
                                            <input type="hidden" class="form-control" id="inHarga">

                                            <div class="col-md-6 mt-10">
                                                <div class="form-group ">
                                                    <label class="control-label col-md-3 mt-10">JUMLAH PESANAN</label>
                                                    <div class="col-md-9 has-success">
                                                        <input type="number" class="form-control" autocomplete="off" placeholder="JUMLAH PESAN" id="inFrek" oninput="setHarga()">
                                                        <span class="help-block"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mt-10">
                                                <div class="form-group ">
                                                    <label class="control-label col-md-3 mt-10">TOTAL HARGA</label>
                                                    <div class="col-md-9 has-success">
                                                        <input type="text" class="form-control" autocomplete="off" placeholder="HARGA" readonly id="outHarga">

                                                        <span class="help-block"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mt-10">
                                                <div class="form-group ">
                                                    <label class="control-label col-md-3 mt-10">DISKON</label>
                                                    <div class="col-md-9 has-success">
                                                        <input type="text" class="form-control" autocomplete="off" placeholder="DISKON" id="inDisc">
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
                                                        <input type="hidden" class="form-control " autocomplete="off" id="upId1">
                                                        <button type="submit" class="btn btn-success mr-10" onclick="insertObatFaktur()">SIMPAN</button>
                                                        <span></span>
                                                    </div>
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
                                                                <th>NAMA OBAT</th>
                                                                <th>JUMLAH SATUAN TERKECIL</th>
                                                                <th>JUMLAH PESANAN</th>
                                                                <th>AKSI</th>
                                                            </tr>
                                                        </thead>
                                                        <tfoot>
                                                            <tr class="bg-success">
                                                                <th>NO</th>
                                                                <th>NAMA OBAT</th>
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
        </div>
        <!-- /Row -->
    </div>
    <!-- /formbody -->
</div>
<!-- edit faktur -->
<div class="panel-wrapper">
    <div class="panel-body">
        <!-- sample modal content -->
        <div class="modal fade bs-example-modal-lg" id="modalEditFaktur" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="overflow : auto !important;">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h5 class="modal-title mt-10" id="myLargeModalLabel"><i class="icon-user mr-10"></i>EDIT FAKTUR</h5>
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
                                        <label class="control-label col-md-3">PILIH USULAN</label>
                                        <div class="col-md-9 has-success">

                                            <select class="form-control filled-input select2" id="id_vendor" name="id_vendor">
                                                <option value="-">PILIH</option>

                                                <?php foreach ($usulan as $v) { ?>
                                                    <option value="<?= $v['id_faktur']; ?>"><?= $v['no_dokumen']; ?></option>

                                                <?php } ?>
                                            </select>

                                        </div>

                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <p class="mt-15">
                                <!-- /Row -->

                            <div class="row">
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

<!-- justifikasi -->
<div class="panel-wrapper">
    <div class="panel-body">
        <!-- sample modal content -->
        <div class="modal fade bs-example-modal-lg" id="modal_request" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="overflow : auto !important;">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h5 class="modal-title mt-10" id="myLargeModalLabel"><i class="icon-user mr-10"></i>DETAIL REQUEST</h5>
                    </div>
                    <form method="post" action="<?= base_url("Perencanaan_obat/request") ?>">
                        <div class="modal-body">
                            <!-- Form body  -->

                            <div class="form-body mt-20">

                                <p class="mt-15">
                                    <!-- /Row -->
                                    <label class="control-label col-md-3">KETERANGAN</label>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">


                                            <input type="hidden" id="inFaktur1" name="idFaktur">
                                            <textarea rows="10" id="keterangan" name="keterangan" class="summernote x"></textarea>

                                        </div>
                                    </div>


                                    <p class="mt-15"></p>
                                </div>


                                <!-- /Row -->
                            </div>
                            <!-- End -->
                        </div>
                        <div class="modal-footer mb-10 mr-15">

                            <button class="btn btn-success btn-anim  btn-sm" type="submit"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span></button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- distributor -->
<div class="panel-wrapper collapse in">
    <div class="panel-body">
        <!-- sample modal content -->
        <div class="modal fade " id="modal_pr" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;padding-right: 16px;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h5 class="modal-title mt-10" id="myLargeModalLabel"><i class="icon-user mr-10"></i> INFO FAKTUR
                        </h5>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" class="form-control" id="inFaktur">
                        <!-- /formbody -->
                        <!--nama-->

                        <div class="panel-wrapper collapse in">
                            <h5 class="panel-title txt-dark">LIST PRODUSEN</h5>
                            <hr>
                            <div class="table-wrap">
                                <div class="table-responsive">
                                    <table id="tabledist" class="table table-hover display  pb-30">
                                        <thead>
                                            <tr class="bg-success">
                                                <th>NO</th>
                                                <th>NAMA</th>
                                                <th>AKSI</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr class="bg-success">
                                                <th>NO</th>
                                                <th>NAMA</th>
                                                <th>AKSI</th>
                                            </tr>
                                        </tfoot>

                                        <tbody style="color: black; text-align: left;">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="panel-wrapper collapse in">
                            <h5 class="panel-title txt-dark">LIST PRODUSEN PR</h5>
                            <hr>
                            <div class="table-wrap">
                                <div class="table-responsive">
                                    <table id="tablelistdist" class="table table-hover display  pb-30">
                                        <thead>
                                            <tr class="bg-success">
                                                <th>NO</th>
                                                <th>NAMA</th>
                                                <th>ALAMAT</th>
                                                <th>NO HP</th>
                                                <th>HAPUS</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr class="bg-success">
                                                <th>NO</th>
                                                <th>NAMA</th>
                                                <th>ALAMAT</th>
                                                <th>NO HP</th>
                                                <th>HAPUS</th>
                                            </tr>
                                        </tfoot>

                                        <tbody style="color: black; text-align: left;">
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>

                        <!--/span-->
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
                                                <input type="text" class="form-control" disabled="" id="no_dok">

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
                                <div class="panel-wrapper collapse in">

                                    <div class="table-wrap">
                                        <div class="table-responsive">
                                            <table id="isiFaktur2" class="table table-hover display  pb-30">
                                                <thead>
                                                    <tr class="bg-success">
                                                        <th>NO</th>
                                                        <th>NAMA BARANG</th>
                                                        <th>PRODUSEN</th>
                                                        <th>HARGA SATUAN</th>
                                                        <th>JUMLAH TERKECIL</th>
                                                        <th>JUMLAH PESANAN</th>
                                                        <th>SATUAN TERKECIL</th>
                                                        <th>SATUAN TERBESAR</th>
                                                        <th>TOTAL</th>
                                                        <!-- <th>STATUS</th> -->
                                                        <!-- <th>HAPUS</th>
                                                        <th>PILIH</th> -->


                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr class="bg-success">
                                                        <th>NO</th>
                                                        <th>NAMA BARANG</th>
                                                        <th>PRODUSEN</th>
                                                        <th>HARGA SATUAN</th>
                                                        <th>TOTAL PESANAN</th>
                                                        <th>JUMLAH PESANAN</th>
                                                        <th>SATUAN TERKECIL</th>
                                                        <th>SATUAN TERBESAR</th>
                                                        <th>TOTAL</th>
                                                        <!-- <th>STATUS</th> -->
                                                        <!-- <th>HAPUS</th>
                                                        <th>PILIH</th> -->

                                                    </tr>
                                                </tfoot>

                                                <tbody style="color: black; text-align: left;">
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                    <div class="row mt-20 mb-20">
                                        <div class="col-md-6">

                                        </div>
                                        <div class="col-md-6">
                                            <div class="table-responsive ">
                                                <table class="table table-hover display " id="outTotalHarga">
                                                    <thead>
                                                        <tr class="bg-success">
                                                            <th style="font-weight:bold;">Total Keseluruhan</th>
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
                        <!-- akhir table -->

                    </div>



                </div>
            </div>
        </div>
        <!-- /Row -->
    </div>
    <!-- /formbody -->
</div>
<!--end modal edit-->
<script type="text/javascript">
    function edit_obat(id_logistik, nama, jumlah, frek, harga, id_detail) {
        $.ajax({
            url: "<?php echo base_url() ?>Usulan_perencanaan/getObatById",
            method: "POST",
            data: {
                id_logistik: id_logistik,
            },
            type: 'POST',
            dataType: 'json',
            success: function(data) {
                $("#upId").val(id_logistik);
                $("#upId1").val(id_detail);
                $("#upNama").val(nama);
                $("#inJumlah").val(data.jml_satuan_terkecil);
                $("#inDisc").val(data.diskon);
                $("#inFrek").val(frek);
                $("#outHarga").val(convertToRupiah(data.harga_cost * data.jml_satuan_terkecil * frek));
                $("#inHarga").val(data.harga_cost);


                $("#collap_obat_faktur").collapse('toggle');
                document.getElementById('collap_obat_faktur').scrollIntoView({
                    behavior: 'smooth'
                });
            }
        });

    }

    function setHarga() {
        box = $('#inFrek').val();
        jumlah = $('#inJumlah').val();
        harga = $('#inHarga').val();

        total = box * jumlah * harga;
        $("#outHarga").val(convertToRupiah(total));
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
            '&id_usulan=' + id_vendor + '&no_dokumen=' + no_dokumen + '&no_index=' + noIndex;

        $().ready(function() {
            $.ajax({
                url: "<?php echo base_url() ?>Perencanaan_obat/insertFaktur",
                method: "POST",
                dataType: 'json',
                data: dataString,
                success: function(data) {
                    if (data.status == "success") {
                        swal({
                            title: "good job!",
                            type: "success",
                            text: "FAKTUR " + id_vendor + " Berhasil ditambahkan",
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
                    url: "<?php echo base_url() ?>Perencanaan_obat/hapus_faktur_po",
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

    function tambah_obat_faktur(id_faktur, no_dokumen, id_usulan) {
        // alert(no_dokumen);
        $("#no_dok").val(no_dokumen);
        $("#inFaktur").val(id_faktur);
        //$("#idUsulan").val(id_usulan);
        $("#modalTambahObatFaktur").modal('show');
        reload_list_faktur(id_usulan);
        reload_isi_list_faktur(id_faktur);
    }

    function tambah_obat_faktur1(id_faktur, no_dokumen, id_usulan) {
        // alert(no_dokumen);
        $("#no_dok").val(no_dokumen);
        $("#inFaktur").val(id_faktur);
        // $("#no_dokumen1").val(no_dokumen);
        $("#modal_pr").modal('show');
        // reload_list_faktur(id_pr_obat);
        // reload_total_harga(id_pr_obat);
        reload_isi_list_faktur1(id_faktur);
        reload_distributor(id_faktur);
        reload_list_produsen(id_faktur);
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
    function request(id_faktur) {
        $.ajax({
            url: "<?php echo base_url() ?>Perencanaan_obat/getVendorById",
            method: "POST",
            data: {
                id_faktur: id_faktur,
            },
            type: 'POST',
            dataType: 'json',
            success: function(data) {
                if (data.status_dt == "found" && data.status_obat == "found") {
                    $("#inFaktur1").val(id_faktur);
                    // $("#no_dokumen1").val(no_dokumen);
                    $("#modal_request").modal('show');
                }else if (data.status_dt == "found" && data.status_obat == "not found") {
                    swal({
                        title: "Obat Belum Diisi",
                        type: "warning",
                        confirmButtonColor: "#3cb878",
                    });
                } else if (data.status_dt == "not found" && data.status_obat == "found") {
                    swal({
                        title: "Vendor Belum Diisi",
                        type: "warning",
                        confirmButtonColor: "#3cb878",
                    });
                } else {
                    swal({
                        title: "Vendor & Obat Belum Diisi",
                        type: "warning",
                        confirmButtonColor: "#3cb878",
                    });
                }

            }
        });

    }
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
        idDU = $("#upId1").val();
        jumlah = parseFloat($("#inJumlah").val());
        frek = parseFloat($("#inFrek").val());
        id_faktur = $("#inFaktur").val();
        harga = $("#inHarga").val();
        diskon = $("#inDisc").val();

        var ID = Math.random().toString(36).substr(2, 50) + Math.random().toString(36).substr(2, 50);

        no_dok = $("#no_dok").val();

        dataString = 'idFaktur=' + id_faktur + '&harga=' + harga + '&jumlah=' + jumlah +
            '&frek=' + frek + '&idLogistik=' + idLogistik + '&id_du=' + idDU + '&diskon=' + diskon +
            '&id=' + ID;

        $().ready(function() {
            $.ajax({
                url: "<?php echo base_url() ?>Perencanaan_obat/insertObatFaktur",
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
                        $('#isiFaktur').DataTable().ajax.reload();
                        $("#collap_obat_faktur").collapse('hide');
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
                "url": '<?php echo base_url('Perencanaan_obat/tampil_list_faktur1'); ?>',
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

    function reload_isi_list_faktur1(idFaktur) {

        $('#isiFaktur2').dataTable().fnClearTable();
        $('#isiFaktur2').dataTable().fnDestroy();
        $('#isiFaktur2').DataTable({
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
                "url": '<?php echo base_url('Permintaan_pembelian/tampil_list_faktur'); ?>',
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

    function hapus_list_faktur(id_detail, id_usulan) {
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
                    url: "<?php echo base_url() ?>Perencanaan_obat/hapus_list_faktur",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        id_detail: id_detail,
                        id_usulan: id_usulan
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
                            $('#isiFaktur').DataTable().ajax.reload();
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
                "url": '<?php echo base_url('Perencanaan_obat/tampil_list_faktur'); ?>',
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
            "ajax": '<?php echo base_url('Perencanaan_obat/tampil_data'); ?>',
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
            "ajax": '<?php echo base_url('Perencanaan_obat/tampil_data'); ?>',
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
                "url": '<?= base_url('Perencanaan_obat/tampil_range'); ?>',
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
    function reload_distributor(idFaktur) {

        $('#tabledist').dataTable().fnClearTable();
        $('#tabledist').dataTable().fnDestroy();
        $('#tabledist').DataTable({
            pageLength: 5,
            lengthMenu: [
                [5, 10, 20, -1],
                [5, 10, 20, 'All']
            ],
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
                "url": '<?php echo base_url('Permintaan_pembelian/tampil_list_faktur2'); ?>',
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

    function reload_list_produsen(idFaktur) {

        $('#tablelistdist').dataTable().fnClearTable();
        $('#tablelistdist').dataTable().fnDestroy();
        $('#tablelistdist').DataTable({
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
                "url": '<?php echo base_url('Permintaan_pembelian/tampil_produsen'); ?>',
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

    function tambah_produsen(id, id_produsen, produsen) { //utk nambah diagnosa pasien
        // no_diagnosa = $('#no_diagnosa').val();
        swal({
            title: "Apakah kamu yakin?",
            text: "Menambah Diagnosa " + produsen + "?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3cb878",
            confirmButtonText: "Yakin",
            cancelButtonText: "Batal",
            closeOnConfirm: false
        }, function() {
            $().ready(function() {
                $.ajax({
                    url: "<?php echo base_url() ?>Permintaan_pembelian/tambah_produsen",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        id: id,
                        id_produsen: id_produsen,
                        produsen: produsen,

                    },
                    success: function(data) {
                        if (data.status == "success") {
                            swal({
                                title: "good job!",
                                type: "success",
                                text: "Vendor" + produsen + " Berhasil ditambah",
                                confirmButtonColor: "#3cb878",
                            });
                            reload_list_produsen(id);
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

    function hapus_produsen(id, nama) { //utk hapus diagnosa pasien
        swal({
            title: "Warning?",
            text: "Apakah kamu yakin menghapus vendor " + nama + " ini?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3cb878",
            confirmButtonText: "Yakin",
            cancelButtonText: "Batal",
            closeOnConfirm: false
        }, function() {
            $().ready(function() {
                $.ajax({
                    url: "<?php echo base_url() ?>Permintaan_pembelian/hapus_produsen",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        id: id,
                    },
                    success: function(data) {
                        if (data.status == "success") {
                            swal({
                                title: "good job!",
                                type: "success",
                                text: "Data Berhasil dihapus",
                                confirmButtonColor: "#3cb878",
                            });
                            $('#tablelistdist').DataTable().ajax.reload();

                        } else {
                            swal({
                                title: "Gagal!",
                                type: "warning",
                                confirmButtonColor: "#3cb878",
                            });
                        }
                    }
                });
            });
        });
        return false;
    }
</script>
<script>
	$(document).ready(function() {
		$.fn.modal.Constructor.prototype.enforceFocus = function () {};
	});
</script>

<!--end tampil data-->