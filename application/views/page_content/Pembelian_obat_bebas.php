<div class="panel panel-default card-view">
    <div class="panel-heading">
        <div class="pull-left">
            <h6 class="panel-title txt-dark"><span class="span span-success">LIST FAKTUR OBAT</span></h6>
        </div>

        <div class="clearfix"></div>
    </div>
    <!--button-->

    <div align="right">
        <button class="btn btn-primary btn-anim mr-50" style="margin-right: 40px;" data-toggle="modal" data-target=".modal-pendaftaranakun"><i class="icon-plus"></i><span class="btn-text">TAMBAH FAKTUR</span></button>
    </div>

    <!--button-->

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
            <div class="col-md-3 mt-20">
                <button class="btn btn-primary btn-anim btn-sm1" onclick="tampilRangePo();"><i class="icon-rocket"></i><span class="btn-text">PILIH</span>
            </div>
        </div>
    </div>





    <div class="table-wrap">
        <!-- <p id="notif_load" style="color:red;">Loading data, Please wait</p> -->

        <div class="table-responsive">
            <table class="table table-hover display  pb-30" id="datable">
                <thead>
                    <tr class="bg-success">
                        <th>NO</th>
                        <th>CETAK DP</th>
                        <th>PILIH</th>
                        <th>EDIT</th>
                        <th>HAPUS</th>
                        <th>TANGGAL INPUT</th>
                        <th>JAM INPUT</th>
                        <th>NO FAKTUR</th>
                        <th>NO PENERIMAAN</th>
                        <th>TANGGAL JATUH TEMPO</th>
                        <th>TANGGAL MASUK</th>
                        <th>NAMA PRODUSEN</th>
                        <th>JENIS</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr class="bg-success">
                        <th>NO</th>
                        <th>CETAK DP</th>
                        <th>PILIH</th>
                        <th>EDIT</th>
                        <th>HAPUS</th>
                        <th>TANGGAL INPUT</th>
                        <th>JAM INPUT</th>
                        <th>NO FAKTUR</th>
                        <th>NO PENERIMAAN</th>
                        <th>TANGGAL JATUH TEMPO</th>
                        <th>TANGGAL MASUK</th>
                        <th>NAMA PRODUSEN</th>
                        <th>JENIS</th>
                        <th>AKSI</th>
                    </tr>
                </tfoot>

                <tbody style="color: black">
                </tbody>
            </table>

        </div>

    </div>


</div>

<!-- Datatables -->


<!--modal yang akan dipakai-->

<div class="panel-wrapper collapse in">
    <div class="panel-body">
        <!-- sample modal content -->

        <div class="modal fade modal-pendaftaranakun" id="pendaftaranakun" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <p>PEMBELIAN OBAT</p>
                        <p><i class="icon-people mr-10"></i>INPUT PEMBELIAN OBAT</p>

                    </div>
                    <div class="modal-body">
                        <!-- Form body  -->

                        <div class="form-body mt-20">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">TANGGAL MASUK</label>
                                        <div class="col-md-9 has-success">
                                            <input type="date" class="form-control" placeholder="TANGGAL MASUK" id="tgl_masuk" name="tgl_masuk"></input>
                                            <span class="help-block"></span>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">TANGGAL STRUK</label>
                                        <div class="col-md-9 has-success">
                                            <input type="date" class="form-control" placeholder="JATUH TEMPO" id="tgl_struk" name="tgl_struk"></input>
                                            <span class="help-block"></span>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">NAMA DISTRIBUTOR</label>
                                        <div class="col-md-9 has-success">
                                            <select class="form-control filled-input select2" style="border: 1px solid lightgreen;" name="inVendor" id="inVendor">

                                                <option value="-">PILIH</option>
                                                <?php
                                                foreach ($vendor as $row) :
                                                ?>
                                                    <option value="<?php echo $row['produsen']; ?>">
                                                        <?php echo strtoupper($row['produsen']); ?></option>

                                                <?php endforeach; ?>
                                            </select>
                                            <!-- <input type="hidden" id="inIDFaktur"></input> -->
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">NO FAKTUR</label>
                                        <div class="col-md-9 has-success">
                                            <input type="text" autocomplete="off" onkeyup="myFunction()" class="form-control" placeholder="NO FAKTUR" id="no_faktur" name="no_faktur">
                                            <span class="help-block"></span>
                                            <div class="mt-10" id="no_result"></div>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">JENIS</label>
                                        <div class="col-md-9 has-success">
                                            <select class="form-control filled-input select2" style="border: 1px solid lightgreen;" name="inJenis" id="inJenis">

                                                <option value="-">PILIH</option>
                                                <option value="PEBAL">PEBAL</option>
                                                <option value="DONASI">DONASI</option>

                                            </select>
                                            <!-- <input type="hidden" id="inIDFaktur"></input> -->
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">JENIS BAYAR</label>
                                        <div class="col-md-9 has-success">
                                            <select class="form-control filled-input select2" style="border: 1px solid lightgreen;" name="inJenisBayar" id="inJenisBayar">

                                                <option value="-">PILIH</option>
                                                <option value="TUNAI">TUNAI</option>
                                                <option value="UTANG">UTANG</option>

                                            </select>
                                            <!-- <input type="hidden" id="inIDFaktur"></input> -->
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

                        <button onclick="insertFaktur()" class="btn btn-success btn-anim  btn-sm" type="button"><i class="icon-rocket"></i><span class="btn-text">Submit</span></button>

                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!--akhir modal yang akan dipakai-->



        <!-- Datatables -->



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
                                <div id="collap_obat_faktur">
                                    <form id="obat">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group ">
                                                    <label class="control-label col-md-3">NAMA OBAT</label>
                                                    <div class="col-md-9 has-success ">
                                                        <select class="form-control filled-input select2" style="border: 1px solid lightgreen;" name="inNamaObat" id="inNamaObat" onchange="pilih_obat()">

                                                            <option value="-">PILIH</option>
                                                            <?php
                                                            foreach ($obat as $row) :
                                                            ?>
                                                                <option value="<?php echo $row["id_logistik"] . "|" . $row["harga_cost"] . "|" . $row["produsen"] . "|" . $row["margin"] . "|" . $row["harga_persediaan"]; ?>"><?php echo $row["nama"] . " (" . $row["produsen"] . ")"; ?></option>

                                                            <?php endforeach; ?>
                                                        </select>
                                                        <span class="help-block"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group ">
                                                    <label class="control-label col-md-3">SATUAN TERBESAR</label>
                                                    <div class="col-md-9 has-success">
                                                        <input type="text" class="form-control" autocomplete="off" placeholder="BOX / BOTOL" id="inSatuanTerbesar" value="1">
                                                        <span class="help-block"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group ">
                                                    <label class="control-label col-md-3">SATUAN TERKECIL</label>
                                                    <div class="col-md-9 has-success">
                                                        <input type="text" class="form-control" autocomplete="off" placeholder="PCS / BOTOL" id="inJumlahSatuanTerkecil" value="1">
                                                        <input type="hidden" class="form-control" autocomplete="off" placeholder="PCS / BOTOL" id="id_detail">
                                                        <input type="hidden" class="form-control" autocomplete="off" id="idSatuanTerbesar">
                                                        <span class="help-block"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group ">
                                                    <label class="control-label col-md-3">HARGA STRUK</label>
                                                    <div class="col-md-9 has-success">
                                                        <input type="text" class="form-control" autocomplete="off" placeholder="HARGA STRUK" id="inHargaStrukHitung">
                                                        <span class="help-block"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group ">
                                                    <label class="control-label col-md-3">PPN</label>
                                                    <div class="col-md-3 has-success">
                                                        <input type="number" class="form-control" autocomplete="off" placeholder="%" id="inPpn" value="11">
                                                        <span class="help-block"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group ">
                                                    <!-- <label class="control-label col-md-3">DISC</label> -->
                                                    <div class="col-md-3 has-success">
                                                        <!-- <input type="number" class="form-control" autocomplete="off" placeholder="%" id="inDiskonStruk" value="0"> -->
                                                        <span class="help-block"></span>
                                                        <div type="submit" class="btn btn-success mr-10" onclick="setHargaHasil()">HARGA OBAT</div>
                                                        <span class="help-block"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group ">
                                                        <label class="control-label col-md-3">HNA</label>
                                                        <div class="col-md-9 has-error">
                                                            <input type="text" autocomplete="off" value="0" class="form-control" disabled="" placeholder="HNA" id="outHna">
                                                            <span class="help-block"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group ">
                                                        <label class="control-label col-md-3">HARGA PERSEDIAAN</label>
                                                        <div class="col-md-9 has-error">
                                                            <input type="text" autocomplete="off" value="0" class="form-control" disabled="" placeholder="HARGA PERSEDIAAN" id="outHargaPersediaan">
                                                            <input type="hidden" class="form-control" id="inHargaPersediaan">
                                                            <span class="help-block"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group ">
                                                        <label class="control-label col-md-3">HARGA BARU</label>
                                                        <div class="col-md-9 has-success">
                                                            <input type="text" value="0" autocomplete="off" class="form-control" placeholder="HARGA SATUAN" id="outHarga1">
                                                            <span class="help-block"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group ">
                                                        <label class="control-label col-md-3">HARGA LAMA</label>
                                                        <div class="col-md-9 has-error">
                                                            <input type="text" class="form-control" id="outHargaLama" value="0" disabled="">
                                                            <span class="help-block"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">DISKON</label>
                                                                <div class="col-md-3 has-error"> -->
                                                <input type="hidden" value="0" class="form-control" disabled="" id="outDiskon1">
                                                <!-- <span class="help-block"></span>
                                                                </div>
                                                            </div>
                                                        </div> -->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">PPN</label>
                                                        <div class="col-md-3 has-error">
                                                            <input type="number" value="11" class="form-control" disabled="" id="outPpn1">
                                                            <span class="help-block"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">TOTAL HARGA</label>
                                                        <div class="col-md-9 has-error">
                                                            <input type="text" class="form-control" disabled="" id="outTotal1">
                                                            <input type="hidden" class="form-control" disabled="" id="inTotal1">
                                                            <span class="help-block"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">DISKON RS</label>
                                                        <div class="col-md-3 has-success">
                                                            <input type="number" value="0" class="form-control" id="outDiskonRs" oninput="setHargaHasil()">
                                                            <span class="help-block"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> <!-- /Row -->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group ">
                                                        <label class="control-label col-md-3">JUMLAH OBAT</label>
                                                        <div class="col-md-9 has-success">
                                                            <input type="text" autocomplete="off" class="form-control" placeholder="JUMLAH OBAT" id="inFrek1" value="1" oninput="tampilHarga2()">
                                                            <span class="help-block"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group ">
                                                        <label class="control-label col-md-3">MARGIN</label>
                                                        <div class="col-md-9 has-success">
                                                            <input type="text" autocomplete="off" class="form-control" id="inMargin">
                                                            <span class="help-block"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group ">
                                                        <label class="control-label col-md-3">NO BATCH</label>
                                                        <div class="col-md-9 has-success">
                                                            <input type="text" autocomplete="off" class="form-control" placeholder="NO BATCH" id="inNoBatch1">
                                                            <span class="help-block"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group ">
                                                        <label class="control-label col-md-3">TANGGAL EXPIRED</label>
                                                        <div class="col-md-9 has-success">
                                                            <input type="date" class="form-control  txt-dark" data-toggle="datepicker" autocomplete="off" id="inTglExp">
                                                            <span class="help-block"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group ">
                                                        <label class="control-label col-md-3"></label>
                                                        <div class="col-md-9 has-success">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="modal-footer mb-10 mr-15">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-wrap">

                                            <span class="help-block"></span>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group ">
                                                        <label class="control-label col-md-3">PRODUSEN OBAT</label>
                                                        <div class="col-md-9 has-error">
                                                            <input type="text" class="form-control filled-input " id="inProdusenObat" disabled="">
                                                            <span class="help-block"></span>
                                                            <input type="hidden" class="form-control filled-input " id="noFaktur1" disabled="">
                                                            <input type="hidden" class="form-control filled-input " id="idStruk">
                                                        </div>
                                                        <!-- <div type="submit" class="btn btn-success  mr-10" onclick="insertObatFaktur1()">TAMBAH</div> -->
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div type="submit" class="btn btn-success  mr-10" onclick="insertObatFaktur1()">TAMBAH</div>
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
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group ">
                                                                <label class="control-label col-md-3"></label>
                                                                <div class="col-md-9 has-error">
                                                                    <span class="help-block"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel-wrapper collapse in">

                                                        <div class="table-wrap">
                                                            <div class="table-responsive">
                                                                <table id="isiFaktur1" class="table table-hover display  pb-30">
                                                                    <thead>
                                                                        <tr class="bg-success">
                                                                            <th>NO</th>
                                                                            <th>NAMA OBAT</th>
                                                                            <th>HARGA SATUAN</th>
                                                                            <th>DISKON</th>
                                                                            <th>JUMLAH OBAT</th>
                                                                            <th>TOTAL HARGA</th>
                                                                            <th>NO BATCH</th>
                                                                            <!--th>NO FAKTUR</th-->
                                                                            <th>TANGGAL EXPIRED</th>
                                                                            <!-- <th>DISC</th> -->
                                                                            <th>HAPUS</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tfoot>
                                                                        <tr class="bg-success">
                                                                            <th>NO</th>
                                                                            <th>NAMA OBAT</th>
                                                                            <th>HARGA SATUAN</th>
                                                                            <th>DISKON</th>
                                                                            <th>JUMLAH OBAT</th>
                                                                            <th>TOTAL HARGA</th>
                                                                            <th>NO BATCH</th>
                                                                            <!--th>NO FAKTUR</th-->
                                                                            <th>TANGGAL EXPIRED</th>
                                                                            <!-- <th>DISC</th> -->
                                                                            <th>HAPUS</th>
                                                                        </tr>
                                                                    </tfoot>

                                                                    <tbody style="color: black">


                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-8">
                                                        </div>
                                                        <div class="col-md-4 pull-right mt-20">

                                                            <div class="table-wrap" style="width: 85%; margin-bottom:40px;">
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

                                            <!-- /formbody -->


                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- /Row -->
                    </div>
                    <!-- /formbody -->
                </div>


                <!--end modal 2-->

                <!-- /formbody -->
            </div>
        </div>
    </div>
</div>
<!-- Modal aksi -->
<div class="panel-wrapper collapse in">
    <div class="panel-body">
        <!-- sample modal content -->
        <div class="modal fade" id="modalInputDetailTambahan" role="dialog" aria-labelledby="myLargeModalLabell" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h5 class="modal-title mt-10" id="myLargeModalLabell"><i class="icon-user mr-10"></i>INPUT DETAIL TAMBAHAN
                        </h5>
                    </div>
                    <?php echo form_open_multipart('Pembelian_obat_bebas/insertTotalFakturLogFarm'); ?>
                    <div class="modal-body">
                        <!-- <form action="#" id="formUpload"> -->
                        <div class="row">
                            <div class="panel-heading">
                                <div class="pull-left">
                                    <h6 class="panel-title txt-dark">DATA FAKTUR</h6>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label col-md-3">ID FAKTUR</label>
                                    <div class="col-md-9 has-danger">
                                        <input type="text" class="form-control " autocomplete="off" name="id_faktur" id="id_faktur">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label col-md-3">NO FAKTUR</label>
                                    <div class="col-md-9 has-danger">
                                        <input type="text" class="form-control " autocomplete="off" name="nofaktur" id="nofaktur">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /formbody -->
                        <div class="row">
                            <div class="panel-heading">
                                <div class="pull-left">
                                    <h6 class="panel-title txt-dark">HARGA TAMBAHAN</h6>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label col-md-3">ONGKOS KIRIM</label>
                                    <div class="col-md-9 has-success">
                                        <input type="number" class="form-control " autocomplete="off" placeholder="ONGKOS KIRIM" name="OngkosKirim" id="OngkosKirim" value="0">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label col-md-3">PPN (%)</label>
                                    <div class="col-md-9 has-success">
                                        <input type="number" class="form-control " autocomplete="off" placeholder="PPN" name="PpnKeseluruhan" id="PpnKeseluruhan" value="0">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label col-md-3">DISKON</label>
                                    <div class="col-md-9 has-success">
                                        <input type="number" class="form-control " autocomplete="off" placeholder="DISKON" name="DiscKeselurahan" id="DiscKeselurahan" value="0">
                                        <span class="help-block"></span>
                                        <div type="submit" class="btn btn-success" onclick="tampil_harga_detail_tambahan()">TAMPILKAN HARGA</div>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label col-md-3">UPLOAD FAKTUR</label>
                                    <div class="col-md-3 has-success">
                                        <input type="file" name="file" id="file">
                                        <span class="help-block"></span>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="panel-heading">
                                <div class="pull-left">
                                    <h6 class="panel-title txt-dark">PREVIEW HARGA</h6>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label col-md-3">HARGA BARANG</label>
                                    <div class="col-md-9 has-error">
                                        <input type="number" autocomplete="off" value="0" class="form-control " placeholder="HNA" name="outHnaTotal" id="outHnaTotal">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label col-md-3">HARGA BARANG (Rp)</label>
                                    <div class="col-md-9 has-error">
                                        <input type="text" class="form-control " name="outHargaLamaTotal" id="outHargaLamaTotal" value="0" disabled="">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label col-md-3">HARGA TOTAL</label>
                                    <div class="col-md-9 has-error">
                                        <input type="number" autocomplete="off" class="form-control " name="outHargaTotal" id="outHargaTotal" value="0">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>
                            <!--/span-->


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">DISKON</label>
                                    <div class="col-md-9 has-error">
                                        <input type="number" value="0" class="form-control " name="outDiskonTotal" id="outDiskonTotal" disabled="">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">ONGKOS KIRIM</label>
                                    <div class="col-md-9 has-error">
                                        <input type="number" value="0" class="form-control " name="outOngkirTotal" id="outOngkirTotal" disabled="">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">PPN</label>
                                    <div class="col-md-9 has-error">
                                        <input type="number" value="0" class="form-control " disabled="" name="outPpnTotal" id="outPpnTotal">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">HARGA TOTAL (Rp)</label>
                                    <div class="col-md-9 has-error">
                                        <input type="text" class="form-control " disabled="" name="outTotalKeseluruhan" id="outTotalKeseluruhan">
                                        <span class="help-block"></span>
                                        <br>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>
                            </form>
                            <div class="modal-footer">
                                <button id="btnUpload" class="btn btn-success btn-anim btn-sm"><i class="icon-rocket"></i><span class="btn-text">SIMPAN DETAIL TAMBAHAN</span></button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>


            <!--/span-->

        </div>
    </div>
    <!-- /Row -->
</div>
<!-- modal cetak DP -->
<div class="panel-wrapper collapse in">
    <div class="panel-body">
        <!-- sample modal content -->
        <div class="modal fade" id="cetak_dp" role="dialog" aria-labelledby="myLargeModalLabell" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h5 class="modal-title mt-10" id="myLargeModalLabell"><i class="icon-printer mr-10"></i>CETAK DP
                        </h5>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" action="<?php echo base_url('Pembelian_obat_bebas/cetak') ?>" method="post" enctype="multipart/form-data" role="form">
                            <!-- <input type="hidden" name="nofakturdp" id="nofakturdp"> -->
                            <input type="hidden" name="id_fakturdp" id="id_fakturdp">
                            <input type="hidden" name="no_index" id="no_index">
                            <!-- <form action="#" id="formUpload"> -->
                            <div class="row">
                                <div class="panel-heading">
                                    <div class="pull-left">
                                        <h6 class="panel-title txt-dark">DATA FAKTUR</h6>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">

                                        <label class="control-label col-md-3">FAKTUR NOMOR</label>
                                        <div class="col-md-9 has-success">
                                            <input type="text" class="form-control " autocomplete="off" name="nofakturdp" id="nofakturdp" readonly>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">NO DOKUMEN</label>
                                        <div class="col-md-9 has-success">
                                            <input type="text" class="form-control " autocomplete="off" name="no_dokumen" id="no_dokumen" readonly>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="panel-heading">
                                    <div class="pull-left">
                                        <h6 class="panel-title txt-dark">DATA DISTRIBUTOR</h6>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">NO</label>
                                        <div class="col-md-9 has-success">
                                            <?php

                                            date_default_timezone_set('Asia/Jakarta');
                                            date("Y-m-d");
                                            $noValid =  sprintf('%04d', $max2, 'dyhtdyu');
                                            $noDok = $noValid . "/" . "RDP/FARM-RSBT/" . numtor(date("m")) . "/" . date("Y");
                                            ?>
                                            <input type="text" class="form-control " autocomplete="off" name="no" id="no" value="<?= $noDok; ?>">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>

                                <!-- <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">DEBET KEPADA</label>
                                        <div class="col-md-9 has-success">
                                            <input type="text" class="form-control " autocomplete="off" name="distributor" id="distributor" readonly>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div> -->
                                <!-- <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label col-md-3">NO INDEX</label>
                                    <div class="col-md-9 has-success">
                                        <input type="text" class="form-control " autocomplete="off"  name="no_index" id="no_index" readonly>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div> -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">TANGGAL DITERIMA</label>
                                        <div class="col-md-9 has-success">
                                            <input type="date" placeholder="TANGGAL TERIMA" id="tgl_terima" name="tgl_terima" class="form-control filled-input" autocomplete="off"></input>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">HARGA FAKTUR</label>
                                        <div class="col-md-9 has-success">
                                            <input type="number" class="form-control " autocomplete="off" name="hargafaktur" id="hargafaktur" placeholder="0">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">PPN (%)</label>
                                        <div class="col-md-9 has-success">
                                            <input type="number" class="form-control " autocomplete="off" name="ppndp" id="ppndp" placeholder="0" readonly>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">BEA MATERAI + ONGKOS KIRIM</label>
                                        <div class="col-md-9 has-success">
                                            <input type="number" class="form-control " autocomplete="off" name="beaongkir" id="beaongkir" value="0">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /formbody -->

                            <div class="modal-footer">
                                <button type="submit" name="action" value="cetak" class="btn btn-success btn-anim btn-sm"><i class="icon-printer"></i><span class="btn-text">CETAK DP</span></button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                            </div>
                    </div>
                </div>
            </div>
        </div>


        <!--/span-->

    </div>
</div>
<!-- /Row -->
<!-- EDIT FAKTUR -->
<div class="panel-wrapper collapse in">
    <div class="panel-body">
        <!-- sample modal content -->

        <div class="modal fade" id="modalEditFaktur" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <p>PEMBELIAN OBAT</p>
                        <p><i class="icon-people mr-10"></i>EDIT FAKTUR</p>

                    </div>
                    <div class="modal-body">
                        <!-- Form body  -->

                        <div class="form-body mt-20">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">TANGGAL STRUK</label>
                                        <div class="col-md-9 has-success">
                                            <input type="date" class="form-control" placeholder="TANGGAL FAKTUR" id="up_tgl_struk" name="up_tgl_struk"></input>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">TANGGAL MASUK BARANG</label>
                                        <div class="col-md-9 has-success">
                                            <input type="date" class="form-control" placeholder="TANGGAL MASUK" id="up_tgl_masuk" name="up_tgl_masuk"></input>
                                            <input type="hidden" id="up_id_faktur"></input>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">NAMA DISTRIBUTOR</label>
                                        <div class="col-md-9 has-success">
                                            <select class="form-control filled-input select2" style="border: 1px solid lightgreen;" name="upVendor" id="upVendor">

                                                <option value="-">PILIH</option>
                                                <?php
                                                foreach ($vendor as $row) :
                                                ?>
                                                    <option value="<?php echo $row['produsen']; ?>">
                                                        <?php echo strtoupper($row['produsen']); ?></option>

                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-15">
                                <!-- /Row -->

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">NO FAKTUR</label>
                                        <div class="col-md-9 has-success">
                                            <input type="text" autocomplete="off" oninput="getNoFaktur()" class="form-control" placeholder="NO FAKTUR" id="up_no_faktur" name="up_no_faktur">
                                            <span class="help-block"></span>
                                            <div class="mt-10" id="no_result"></div>
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

                        <button onclick="editFaktur()" class="btn btn-success btn-anim  btn-sm" type="button"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span></button>

                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!--akhir modal yang akan dipakai-->
    </div>
</div>

<script type="text/javascript">
    function insertFaktur() {

        tgl_masuk = $('#tgl_masuk').val();
        inVendor = $('#inVendor').val();
        no_faktur = $('#no_faktur').val();
        tgl_struk = $('#tgl_struk').val();
        inPO = $('#inIDFaktur').val();
        jenis = $('#inJenis').val();
        jenis_bayar = $('#inJenisBayar').val();

        $().ready(function() {
            $.ajax({
                url: "<?php echo base_url() ?>Pembelian_obat_bebas/insertFaktur",
                method: "POST",
                dataType: 'json',
                data: {
                    tgl_masuk: tgl_masuk,
                    inVendor: inVendor,
                    no_faktur: no_faktur,
                    tgl_struk: tgl_struk,
                    inPO: inPO,
                    jenis: jenis,
                    jenis_bayar: jenis_bayar,
                },
                success: function(data) {
                    if (data.status == "success") {
                        swal({
                            title: "good job!",
                            type: "success",
                            text: "PRODUSEN " + inVendor + " Berhasil ditambahkan",
                            confirmButtonColor: "#3cb878",
                        });
                        tgl_masuk = $('#tgl_masuk').val("");
                        inVendor = $('#inVendor').val("");
                        no_faktur = $('#no_faktur').val("");
                        tgl_struk = $('#tgl_struk').val("");
                        inPO = $('#inPO').val("");
                        $('#pendaftaranakun').modal("hide");

                        //$('#username_result').html("");

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
                "sSearch": "Pencarian :",
                "sUrl": "",
                "oPaginate": {
                    "sFirst": "Pertama",
                    "sPrevious": "Sebelumnya",
                    "sNext": "Selanjutnya",
                    "sLast": "Terakhir"
                },
            },
            "ajax": '<?php echo base_url('Pembelian_obat_bebas/tampil_pelayanan_masuk'); ?>',
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
            "ajax": '<?php echo base_url('Pembelian_obat_bebas/tampil_pelayanan_masuk'); ?>',
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
                "url": '<?= base_url('Pembelian_obat_bebas/tampil_pelayanan_masuk_range'); ?>',
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
</script>

<!--end tampil data-->

<!--DATA BARU-->

<!--end modal edit-->

<script type="text/javascript">
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
                    url: "<?php echo base_url() ?>Pembelian_obat_bebas/hapus_faktur",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        id_faktur: id_faktur
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

    function tambah_obat_faktur(id_faktur, no_dokumen, id_struk) {
        // alert(no_dokumen);
        $("#idStruk").val(id_struk);
        $("#inFaktur").val(no_dokumen);
        $("#idfaktur").val(id_faktur);
        // $("#no_dokumen1").val(no_dokumen);
        $("#modalTambahObatFaktur").modal('show');
        reload_total_harga(id_struk);
        reload_isi_list_faktur(id_struk);
    }

    //end

    function edit_faktur(id_faktur) {
        // alert(no_dokumen);
        //$("#no_dok").val(no_dokumen);
        $("#up_id_faktur").val(id_faktur);
        // $("#no_dokumen1").val(no_dokumen);
        $.ajax({
            url: "<?php echo base_url(); ?>Pembelian_obat_bebas/getDataFaktur",
            method: "POST",
            dataType: 'json',
            data: {
                id_struk: id_faktur
            },
            success: function(data) {
                $("#up_tgl_struk").val(data.tgl_struk);
                $("#up_tgl_masuk").val(data.tgl_masuk);
                $("#upVendor").val(data.id_produsen).change();
                $("#up_no_faktur").val(data.no_faktur);
                $("#modalEditFaktur").modal('show');
            }
        });

    }

    function editFaktur() {

        tgl_masuk = $('#up_tgl_masuk').val();
        // inVendor = $('#upVendor').val();
        no_faktur = $('#up_no_faktur').val();
        id_struk = $('#up_id_faktur').val();
        tgl_struk = $('#up_tgl_struk').val();
        vendor = $('#upVendor').val();

        $().ready(function() {
            $.ajax({
                url: "<?php echo base_url() ?>Pembelian_obat_bebas/editFaktur",
                method: "POST",
                dataType: 'json',
                data: {
                    tgl_masuk: tgl_masuk,
                    no_faktur: no_faktur,
                    tgl_struk: tgl_struk,
                    vendor: vendor,
                    id_struk: id_struk,

                },
                success: function(data) {
                    if (data.status == "success") {
                        swal({
                            title: "good job!",
                            type: "success",
                            text: "Struk Berhasil diedit",
                            confirmButtonColor: "#3cb878",
                        });
                        tgl_masuk = $('#up_tgl_masuk').val("");
                        inVendor = $('#upVendor').val("");
                        no_faktur = $('#up_no_faktur').val("");
                        id_struk = $('#up_id_faktur').val("");
                        tgl_struk = $('#up_tgl_struk').val("");
                        tgl_overdue = $('up_#tgl_overdue').val("");
                        $('#modalEditFaktur').modal("hide");

                        //$('#username_result').html("");

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

    //tampil harga

    function tampilHarga() {
        a = $("#inLogistik").val();
        splitDiag = a.split("|");

        harga = parseFloat(splitDiag[1]);
        $("#outHarga").val(harga.toFixed(0));
        // $("#inHargaStrukHitung").val(harga.toFixed(0)); 
        // $("#outHargaLama").val(convertToRupiah(harga.toFixed(0)));  

        frek = parseFloat($("#inFrek").val());


        total = harga * frek;


        $("#outTotal").val(convertToRupiah(total.toFixed(0)));

    }

    //end tampil harga

    //harga2 

    function tampilHarga1() {
        a = $("#inLogistik").val();
        splitDiag = a.split("|");
        harga = $("#outHarga").val();
        ppn = $("#outPpn").val();
        // disc=$("#outDiskon").val();   

        frek = parseFloat($("#inFrek").val());


        total = harga * frek;


        // $("#outTotal").val(convertToRupiah(total.toFixed(0))); 

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

    //total harga 

    function reload_total_harga(id_faktur) {
        $('#outTotalHarga').dataTable().fnClearTable();
        $('#outTotalHarga').dataTable().fnDestroy();
        $('#outTotalHarga').DataTable({
            "pageLength": 10,
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
                    "sLast": "Terakhir",
                }
            },
            "ajax": {
                "url": '<?php echo base_url('Pembelian_obat_bebas/tampil_total_harga'); ?>',
                "type": 'POST',
                "data": {
                    idFaktur: id_faktur
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


    //end total harga



    //insert data 


    //end data insert

    //hapus


    function hapus_isi_list_faktur(obat, id_detail_struk) {
        swal({
            title: "Apakah kamu yakin?",
            text: "Menghapus data " + obat + "?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3cb878",
            confirmButtonText: "Yakin",
            cancelButtonText: "Batal",
            closeOnConfirm: false
        }, function() {
            $().ready(function() {
                $.ajax({
                    url: "<?php echo base_url() ?>Pembelian_obat_bebas/hapus_isi_list_faktur",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        id_detail_struk: id_detail_struk
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

    //end of hapus
    // button pilih pada list faktur
    function pilih_obat() {
        var a = $("#inNamaObat").val();
        splitDiag = a.split("|");

        $("#inProdusenObat").val(splitDiag[2]);
        $("#outHargaLama").val(parseInt(splitDiag[1]));
        $("#inMargin").val(splitDiag[3]);
        $("#outHargaPersediaan").val(splitDiag[4]);
        $("#inHargaPersediaan").val(splitDiag[4]);
    }
    //function untuk button harga obat
    function setHargaHasil() {
        satuanTerbesar = parseFloat($("#inSatuanTerbesar").val());
        jumlahTerkecil = parseFloat($("#inJumlahSatuanTerkecil").val());
        HargaStruk = parseFloat($("#inHargaStrukHitung").val());
        HargaLama = parseFloat($("#outHargaLama").val());
        diskonStruk = parseFloat($("#inDiskonStruk").val());
        diskon_rs = parseFloat($("#outDiskonRs").val());
        ppn = parseFloat($("#inPpn").val());

        // if(HargaLama>HargaStruk){
        //     HargaStruk = HargaLama;
        // }

        hargaHitung = (parseFloat(HargaStruk)) / (parseFloat(jumlahTerkecil) * parseFloat(satuanTerbesar));
        hargaHitungHna = hargaHitung;

        //hargaHitung = hargaHitung * (1 - (diskonStruk / 100));
        hargaHitung = hargaHitung * (1 - (diskon_rs / 100));
        hargaHitung = hargaHitung * (1 + (ppn / 100));

        $("#outTotal1").val(convertToRupiah(hargaHitung));
        $("#inFrek1").val((satuanTerbesar * jumlahTerkecil));
        frek = parseFloat($("#inFrek1").val());


        total = hargaHitung * frek;
        $("#outHarga1").val(hargaHitung);

        $("#outTotal1").val(convertToRupiah(total.toFixed(0)));
        $("#inTotal1").val(parseInt(total));
        $("#outDiskon1").val(diskonStruk);
        $("#outPpn1").val(ppn);
        $("#outHna").val((hargaHitungHna).toFixed(2));

        harga_pers = parseFloat($("#inHargaPersediaan").val());


        hitungHargaPers = (hargaHitungHna - (hargaHitungHna * (diskon_rs / 100)));
        if ($("#inHargaPersediaan").val() == 0) {
            hargaPers = hitungHargaPers;
        } else {
            hargaPers = (harga_pers + parseFloat(hitungHargaPers)) / 2
        }

        $("#outHargaPersediaan").val(hargaPers.toFixed(0));



    }

    function setHargaPers() {
        harga_pers = parseFloat($("#inHargaPersediaan").val());
        frek = parseFloat($("#inFrek1").val());
        ppn = parseFloat($("#outPpn1").val());
        hna = parseFloat($("#outHna").val());
        diskon_rs = parseFloat($("#outDiskonRs").val());


        hitungHargaPers = (hna - (hna * (diskon_rs / 100)));
        if (harga_pers == 0) {
            hargaPers = hitungHargaPers;
        } else {
            hargaPers = (harga_pers + parseFloat(hitungHargaPers)) / 2
        }

        $("#outHargaPersediaan").val(hargaPers.toFixed(0));
        $("#outTotal1").val(convertToRupiah((hitungHargaPers * frek).toFixed(0)));
        $("#inTotal1").val((hitungHargaPers * frek).toFixed(0));
        // $("#outHarga1").val(hitungHargaPers);

    }

    //insert faktur obat pada list faktur
    function insertObatFaktur1() {
        id_detail = $("#id_detail").val();
        id_faktur = $("#inFaktur").val();
        idfaktur = $("#idfaktur").val();
        hargalama = $("#outHargaLama").val();

        id_struk = $("#idStruk").val();

        var a = $("#inNamaObat").val();
        splitA = a.split("|");
        idLogistik = splitA[0];
        harga = parseInt($("#outHarga1").val());
        //harga1 = $("#outTotal1").val();
        margin = $("#inMargin").val();
        frek = parseFloat($("#inFrek1").val());
        noBatch = $("#inNoBatch1").val();
        noFaktur = $("#inNoFaktur").val();
        tglExp = $("#inTglExp").val();
        idProdusenObat = $("#inProdusenObat").val();

        ppn = $("#outPpn1").val();
        diskon = $("#outDiskon1").val();
        diskonRs = $("#outDiskonRs").val();
        hna = parseInt($("#outHna").val());
        harga_persediaan = $("#outHargaPersediaan").val();


        total = $("#inTotal1").val();

        var ID = Math.random().toString(36).substr(2, 50) + Math.random().toString(36).substr(2, 50);
        var ID2 = Math.random().toString(36).substr(2, 50) + Math.random().toString(36).substr(2, 50);



        if (tglExp == "") {
            alert("tolong isi ED dahulu");
        } else {
            $.ajax({
                type: "POST",
                url: "Pembelian_obat_bebas/insertObatFaktur1",
                dataType: 'json',
                data: {
                    idFaktur: id_faktur,
                    id_struk: id_struk,
                    id_detail: id_detail,
                    idfaktur: idfaktur,
                    harga: harga,
                    margin: margin,
                    noBatch: noBatch,
                    noFaktur: noFaktur,
                    frek: frek,
                    total: total,
                    hargalama: hargalama,
                    idLogistik: idLogistik,
                    tglExp: tglExp,
                    idProdusenObat: idProdusenObat,
                    id: ID,
                    id2: ID2,
                    diskon: diskon,
                    diskonRs: diskonRs,
                    hna: hna,
                    ppn: ppn,
                    harga_persediaan: harga_persediaan

                },
                success: function(data) {
                    if (data.status == "success") {
                        swal({
                            title: "good job!",
                            type: "success",
                            text: "Data Berhasil ditambahkan",
                            confirmButtonColor: "#3cb878",
                        });
                        $('#obat')[0].reset();
                        $("#namaObat").val("");
                        $("#id_detail").val("");
                        $("#idfaktur").val("");
                        $("#outHargaLama").val("");

                        $("#idNamaObat").val("-").change();
                        $("#outHarga1").val("");
                        $("#inMargin").val("");
                        $("#inFrek1").val("");
                        $("#inNoBatch1").val("");
                        $("#inNoFaktur").val("");
                        $("#inTglExp").val("");
                        $("#inProdusenObat").val("");

                        $("#outPpn1").val("");
                        $("#outDiskon1").val("");
                        $("#outDiskonRs").val(0);
                        $("#outHna").val("");
                        $("#inHargaStrukHitung").val("");
                        $("#modalTambahObatFaktur").modal('show');
                        $('#isiFaktur1').DataTable().ajax.reload();
                        $('#outTotalHarga').DataTable().ajax.reload();
                    } else {
                        swal({
                            title: "Gagal!",
                            type: "warning",
                            text: data.status,
                            confirmButtonColor: "#3cb878",
                        });
                    }
                }
            })
        }

    }

    //tampil isi data faktur


    //end tampil data 

    //Tampil isi faktur
    function reload_isi_list_faktur(id_struk) {

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
                "url": '<?php echo base_url('Pembelian_obat_bebas/tampil_list_faktur1'); ?>',
                "type": 'POST',
                "data": {
                    id_struk: id_struk
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
<!--percobaan1-->






<!--END DATA BARU-->

<script type="text/javascript">
    function myFunction() {
        no_faktur = $('#no_faktur').val();
        if (no_faktur != '') {
            $.ajax({
                url: "<?php echo base_url(); ?>Pembelian_obat_bebas/check_noFaktur1",
                method: "POST",
                data: {
                    no_faktur: no_faktur
                },
                success: function(data) {
                    $('#no_result').html(data);
                }
            });
        }
    }
</script>

<script>
    function input_detail_tambahan(id_faktur, no_faktur) {
        //$("#id_faktur").val(id_struk);
        $("#nofaktur").val(no_faktur);
        $("#id_faktur").val(id_faktur);
        $("#modalInputDetailTambahan").modal('show');
        //reload_list_faktur(id_faktur);
        reloadTotal(no_faktur);
    }

    function reloadTotal(id_faktur) {
        $.ajax({
            type: "POST",
            url: "Pembelian_obat/tampil_total_harga2",
            dataType: 'json',
            data: {
                id_faktur: id_faktur,
            },
            success: function(data) {
                if (data.status == "success") {
                    $("#outHargaLamaTotal").val(convertToRupiah(data.total));
                    $("#outHnaTotal").val(data.total);
                } else {
                    $("#outHargaLamaTotal").val('Rp. 0');
                    $("#outHnaTotal").val(0);
                }
            }
        })
    }

    function convertToRupiah(angka) {
        var rupiah = '';
        var angkarev = angka.toString().split('').reverse().join('');
        for (var i = 0; i < angkarev.length; i++)
            if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + '.';
        return 'Rp. ' + rupiah.split('', rupiah.length - 1).reverse().join('');
    }

    function tampil_harga_detail_tambahan() {
        ppn = parseFloat($("#PpnKeseluruhan").val());
        diskon = parseFloat($("#DiscKeselurahan").val());
        ongkir = parseFloat($("#OngkosKirim").val());
        $("#outPpnTotal").val(ppn);
        $("#outDiskonTotal").val(diskon);
        $("#outOngkirTotal").val(ongkir);
        totalAwal = parseFloat($("#outHnaTotal").val());
        totalpajak = totalAwal * (ppn / 100);
        totalKeseluruhan = totalAwal + totalpajak + ongkir - diskon;

        $("#outTotalKeseluruhan").val(convertToRupiah(totalKeseluruhan));
        $("#outHargaTotal").val(totalKeseluruhan);
        $("#outHnaTotal").val(totalAwal);
        $("#OngkosKirim").val(ongkir);
    }


    function cetak_dp(id_faktur, no_faktur, no_dokumen, id_produsen, id_struk) {
        $("#id_fakturdp").val(id_faktur);
        $("#nofakturdp").val(no_faktur);

        $("#no_dokumen").val(no_dokumen);
        $("#distributor").val(id_produsen);
        no_dist = $("#no").val();
        var str = no_dist + "";
        no_index = str.substring(0, 4);
        $("#no_index").val(no_index);
        // $.ajax({
        //     url: "<?= base_url() . 'Pembelian_obat_bebas/getHargaFaktur' ?>",
        //     data: {
        //         no_faktur: no_faktur,

        //     },
        //     type: 'POST',
        //     dataType: 'json',
        //     success: function(data) {
        //         if (data.status_dt == "found") {
        //             $("#hargafaktur").val(parseInt(data.total));
        //             $("#ppndp").val(parseInt(data.ppn));
        //             $("#no").val(data.no_distributor);
        //             $("#beaongkir").val(data.bea_ongkir);
        //             // $("#tgl_terima").val(data.tgl_terima).change();
        //             $("#cetak_dp").modal('show');

        //         } else {
        //             alert("data tidak ditemukan");
        //         }
        //     }
        // });

    }
</script>
<script>
    $(document).ready(function() {
        $.fn.modal.Constructor.prototype.enforceFocus = function() {};
    });
</script>