<<<<<<< HEAD
<div class="panel panel-default card-view">
    <div class="panel-heading">
        <div class="pull-left">
            <h6 class="panel-title txt-dark"><span class="span span-success">LIST OBAT PO</span></h6>
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
                                    <th>TANGGAL PO</th>
                                    <th>NAMA VENDOR</th>

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
                                        <label class="control-label col-md-3">NAMA VENDOR</label>
                                        <div class="col-md-9 has-success">

                                            <select class="form-control filled-input select2" id="id_vendor" name="id_vendor">
                                                <option value="">Nama Vendor</option>

                                                <?php foreach ($vendor as $v) { ?>
                                                    <option value="<?= $v['nama_produsen']; ?>"><?= $v['nama_produsen']; ?></option>

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
                                            function numtor($number)
                                            {
                                                $map = array('M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1);
                                                $returnValue = '';
                                                while ($number > 0) {
                                                    foreach ($map as $roman => $int) {
                                                        if ($number >= $int) {
                                                            $number -= $int;
                                                            $returnValue .= $roman;
                                                            break;
                                                        }
                                                    }
                                                }
                                                return $returnValue;
                                            }
                                            date_default_timezone_set('Asia/Jakarta');
                                            date("Y-m-d");
                                            $noValid =  sprintf('%04d', $max, 'dyhtdyu');
                                            $noDok = $noValid . "/" . "PB/FARM-RSBT/" . numtor(date("m")) . "/" . date("Y");
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

                                <!-- /formbody -->
                                <!--nama-->

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">NAMA OBAT</label>
                                            <div class="col-md-9 has-success ">
                                                <select class="form-control filled-input select2" onchange="tampilHarga()" id="inLogistik">
                                                    <option value="-|0|0|-|-|-">-</option>
                                                    <?php
                                                    foreach ($obat as $row) {

                                                    ?>
                                                        <option value="<?php echo $row["id_logistik"] . "|" . $row["harga_cost"] . "|" . $row["tipe"] . "|" . $row["nama"]; ?>"><?php echo $row["nama"]; ?></option>
                                                    <?php }  ?>
                                                </select>
                                                <span class="help-block"></span>

                                            </div>
                                        </div>
                                    </div>
                                    <!--nama-->

                                    <!--satuan terbaru-->

                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">TOTAL PESANAN</label>
                                            <div class="col-md-9 has-success">
                                                <input type="number" autocomplete="off" class="form-control filled-input" placeholder="JUMLAH" id="inFrek" value="1" oninput="tampilHarga1()">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">HARGA TERBARU</label>
                                            <div class="col-md-9 has-success">
                                                <input type="text" value="0" autocomplete="off" class="form-control filled-input" placeholder="HARGA SATUAN" id="outHarga" oninput="tampilHarga1()">
                                                <input type="hidden" id="inFaktur" disabled>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group ">
                                                <label class="control-label col-md-3">SATUAN PESANAN</label>
                                                <div class="col-md-9 has-success ">

                                                    <select class="form-control filled-input select2" id="outPpn">

                                                        <?php
                                                        foreach ($satuan as $row) {

                                                        ?>
                                                            <option value="<?php echo $row["satuan"]; ?>"><?php echo $row["satuan"]; ?></option>
                                                        <?php }  ?>
                                                    </select>
                                                    <span class="help-block"></span>

                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">JUMLAH PESAN</label>
                                            <div class="col-md-9 has-success">
                                                <input type="number" value="0" class="form-control filled-input" oninput="tampilHarga1()" id="outDiskon">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>




                                <!--/span-->
                                <!-- /Row -->
                                <div class="row" align="right">
                                    <div class="col-md-12">

                                        <button onclick="insertObatFaktur()" class="btn btn-success btn-anim  btn-sm" type="button"><i class="icon-rocket"></i><span class="btn-text">TAMBAH</span></button>
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
                                                    <table id="isiFaktur" class="table table-hover display  pb-30">
                                                        <thead>
                                                            <tr class="bg-success">
                                                                <th>NO</th>
                                                                <th>NAMA BARANG</th>
                                                                <th>HARGA SATUAN</th>
                                                                <th>TOTAL PESANAN</th>
                                                                <th>JUMLAH PESANAN</th>
                                                                <th>SATUAN</th>
                                                                <th>TOTAL</th>
                                                                <th>STATUS</th>
                                                                <th>HAPUS</th>
                                                                <th>PILIH</th>


                                                            </tr>
                                                        </thead>
                                                        <tfoot>
                                                            <tr class="bg-success">
                                                                <th>NO</th>
                                                                <th>NAMA BARANG</th>
                                                                <th>HARGA SATUAN</th>
                                                                <th>TOTAL PESANAN</th>
                                                                <th>JUMLAH PESANAN</th>
                                                                <th>SATUAN</th>
                                                                <th>TOTAL</th>
                                                                <th>STATUS</th>
                                                                <th>HAPUS</th>
                                                                <th>PILIH</th>

                                                            </tr>
                                                        </tfoot>

                                                        <tbody style="color: black">


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

                            <div class="modal-footer mb-10 mr-15">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-wrap">

                                            <div class="collapse" id="collap_obat_faktur">

                                                <!-- /formbody -->
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group ">
                                                            <label class="control-label col-md-3">NAMA OBAT</label>
                                                            <div class="col-md-9 has-success ">
                                                                <input type="text" class="form-control" autocomplete="off" placeholder="NAMA OBAT" id="namaObat">

                                                                <input type="hidden" class="form-control" autocomplete="off" placeholder="NAMA OBAT" id="id_detail">

                                                                <input type="hidden" class="form-control" autocomplete="off" id="idNamaObat">
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
                                                                <input type="number" class="form-control" autocomplete="off" placeholder="%" id="inPpn" value="0">
                                                                <span class="help-block"></span>

                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group ">
                                                            <label class="control-label col-md-3">DISC</label>
                                                            <div class="col-md-3 has-success">
                                                                <input type="number" class="form-control" autocomplete="off" placeholder="%" id="inDiskonStruk" value="0">
                                                                <span class="help-block"></span>
                                                                <div type="submit" class="btn btn-success mr-10" onclick="setHargaHasil()">HARGA OBAT</div>
                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group ">
                                                            <label class="control-label col-md-3">HNA</label>
                                                            <div class="col-md-9 has-error">
                                                                <input type="number" autocomplete="off" value="0" class="form-control" disabled="" placeholder="HNA" id="outHna">
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
                                                    <!--/span-->

                                                    <div class="col-md-6">
                                                        <div class="form-group ">
                                                            <label class="control-label col-md-3">HARGA LAMA</label>
                                                            <div class="col-md-9 has-error">
                                                                <input type="text" class="form-control" id="outHargaLama" value="0" disabled="">
                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">DISKON</label>
                                                            <div class="col-md-3 has-error">
                                                                <input type="number" value="0" class="form-control" disabled="" id="outDiskon1">
                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">PPN</label>
                                                            <div class="col-md-3 has-error">
                                                                <input type="number" value="0" class="form-control" disabled="" id="outPpn1">
                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">TOTAL HARGA</label>
                                                            <div class="col-md-9 has-error">
                                                                <input type="text" class="form-control" disabled="" id="outTotal1">
                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">DISKON RS</label>
                                                            <div class="col-md-3 has-success">
                                                                <input type="number" value="0" class="form-control" id="outDiskonRs">
                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- /Row -->
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
                                                    <!--/span-->

                                                    <!--/span-->
                                                    <div class="col-md-6">
                                                        <div class="form-group ">
                                                            <label class="control-label col-md-3">MARGIN</label>
                                                            <div class="col-md-9 has-success">
                                                                <input type="text" autocomplete="off" class="form-control" id="inMargin">
                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
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

                                                    <!--/span-->
                                                    <div class="col-md-6">
                                                        <div class="form-group ">
                                                            <label class="control-label col-md-3">TANGGAL EXPIRED</label>
                                                            <div class="col-md-9 has-success">
                                                                <input type="date" class="form-control  txt-dark" data-toggle="datepicker" autocomplete="off" id="inTglExp">
                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group ">
                                                        <label class="control-label col-md-3">NO FAKTUR</label>
                                                        <div class="col-md-9 has-success">
                                                            <input type="text" autocomplete="off" onkeyup="myFunction()" class="form-control" placeholder="NO FAKTUR" id="inNoFaktur">
                                                            <span class="help-block"></span>
                                                            <div class="mt-10" id="no_result"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">

                                                    <!--/span-->
                                                    <div class="form-group ">
                                                        <label class="control-label col-md-3">PRODUSEN OBAT</label>
                                                        <div class="col-md-9 has-error">
                                                            <input type="text" class="form-control filled-input " id="inProdusenObat" disabled="">
                                                            <span class="help-block"></span>
                                                            <input type="hidden" class="form-control filled-input " id="noFaktur1" disabled="">
                                                            <input type="hidden" class="form-control filled-input " id="idStruk" disabled="">
                                                        </div>

                                                        <div type="submit" class="btn btn-success  mr-10" onclick="insertObatFaktur1()">TAMBAH</div>

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


                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group ">
                                                            <label class="control-label col-md-3"></label>
                                                            <div class="col-md-9 has-error">

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
                                                            <table id="isiFaktur1" class="table table-hover display  pb-30">
                                                                <thead>
                                                                    <tr class="bg-success">
                                                                        <th>NO</th>
                                                                        <th>NAMA OBAT</th>
                                                                        <th>HARGA SATUAN</th>
                                                                        <th>JUMLAH OBAT</th>
                                                                        <th>TOTAL HARGA</th>
                                                                        <th>NO BATCH</th>
                                                                        <th>NO FAKTUR</th>
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
                                                                        <th>JUMLAH OBAT</th>
                                                                        <th>TOTAL HARGA</th>
                                                                        <th>NO BATCH</th>
                                                                        <th>NO FAKTUR</th>
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
    </div>

</div>

<!--end modal 2-->

<!--modal edit --->

<!-- Modal Edit Pasien -->
<div class="panel-wrapper">
    <div class="panel-body">
        <!-- sample modal content -->
        <div class="modal fade bs-example-modal-lg" id="modalEditFaktur" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true" style="overflow : auto !important;">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h5 class="modal-title mt-10" id="myLargeModalLabel"><i
                                class="icon-user mr-10"></i>EDIT IDENTITAS PASIEN</h5>
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
                                        <label class="control-label col-md-3">NAMA VENDOR</label>
                                        <div class="col-md-9 has-success">

                                            <select class="form-control filled-input select2" id="id_vendor" name="id_vendor">
                                                <option value="">Nama Vendor</option>

                                                <?php foreach ($vendor as $v) { ?>
                                                    <option value="<?= $v['nama_produsen']; ?>"><?= $v['nama_produsen']; ?></option>

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
    <

        <!-- End -->

        <!--end modal edit-->

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
                        url: "<?php echo base_url() ?>Po_obat_bebas/insertFaktur",
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

                                $('.modal-pendaftaranakun').modal('hide');
                                $('#datable').DataTable().ajax.reload();
                                // $('#isiFaktur').DataTable().ajax.reload();
                                //location.reload();

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
                            url: "<?php echo base_url() ?>Po_obat_bebas/hapus_faktur_po",
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
                // $("#no_dokumen1").val(no_dokumen);
                $("#modalTambahObatFaktur").modal('show');
                reload_list_faktur(id_faktur);
                reload_total_harga(id_faktur)
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
                        "url": '<?php echo base_url('Po_obat_bebas/tampil_total_harga'); ?>',
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

            function insertObatFaktur() {
                a = $("#inLogistik").val();
                splitDiag = a.split("|");

                idLogistik = splitDiag[0];
                harga = $("#outHarga").val();
                frek = parseFloat($("#inFrek").val());

                ppn = $("#outPpn").val();
                id_faktur = $("#inFaktur").val();

                diskon = $("#outDiskon").val();

                total = harga * frek;
                // alert(total);

                var ID = Math.random().toString(36).substr(2, 50) + Math.random().toString(36).substr(2, 50);
                var ID2 = Math.random().toString(36).substr(2, 50) + Math.random().toString(36).substr(2, 50);

                vendor = $("#vendor").val();

                dataString = 'idFaktur=' + id_faktur + '&harga=' + harga +
                    '&frek=' + frek + '&total=' + total +
                    '&idLogistik=' + idLogistik +
                    '&id=' + ID + '&id2=' + ID2 +
                    '&diskon=' + diskon + '&ppn=' + ppn + '&vendor=' + vendor;

                $().ready(function() {
                    $.ajax({
                        url: "<?php echo base_url() ?>Po_obat_bebas/insertObatFaktur",
                        method: "POST",
                        dataType: 'json',
                        data: dataString,
                        success: function(data) {
                            if (data.status == "success") {
                                swal({
                                    title: "good job!",
                                    type: "success",
                                    text: "FAKTUR " + vendor + " Berhasil ditambahkan",
                                    confirmButtonColor: "#3cb878",
                                });
                                idLogistik = $("#inLogistik").val("-|0|0|-|-|-").change();
                                idFaktur = $("#idFaktur").val("");
                                harga = $("#outHarga").val("");
                                frek = $("#inFrek").val("");
                                noBatch = $("#inNoBatch").val("");
                                tglExp = $("#inTglExp").val("");
                                idProdusenObat = $("#inProdusenObat").val("");
                                ppn = $("#outPpn").val("");
                                diskon = $("#outDiskon").val("");
                                diskonRs = $("#outDiskonRs").val("");
                                hna = $("#outHna").val("");
                                //$('#username_result').html("");

                                $('#isiFaktur').DataTable().ajax.reload();

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
                            url: "<?php echo base_url() ?>Po_obat_bebas/hapus_list_faktur",
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

            //end of hapus
            // button pilih pada list faktur
            function pilih_list_faktur(id_detail, id_struk) {
                $.ajax({
                    url: "<?= base_url() . 'Po_obat_bebas/getDataListFaktur' ?>",
                    data: {
                        id_detail: id_detail,
                    },
                    type: 'POST',
                    dataType: 'json',
                    success: function(data) {
                        if (data.status_dt == "found") {

                            $("#namaObat").val(data.nama);
                            $("#id_detail").val(id_detail);
                            $("#idNamaObat").val(data.id_logistik);
                            $("#inProdusenObat").val(data.produsen);
                            $("#outHna").val(data.harga);
                            $("#outHarga1").val(data.harga);
                            $("#outHargaLama").val(data.harga);
                            $("#inMargin").val(data.margin);

                            harga = parseFloat(data.harga);
                            frek = parseFloat($("#inFrek1").val());
                            total = harga * frek;
                            $("#outTotal1").val(convertToRupiah(total.toFixed(0)));

                            $("#collap_obat_faktur").collapse('show');

                            id_faktur = $("#inFaktur").val();
                            reload_isi_list_faktur(id_faktur);
                        } else {
                            alert("data tidak ditemukan");
                        }
                    }
                });
            }
            //function untuk button harga obat
            function setHargaHasil() {
                satuanTerbesar = parseFloat($("#inSatuanTerbesar").val());
                jumlahTerkecil = parseFloat($("#inJumlahSatuanTerkecil").val());
                HargaStruk = parseFloat($("#inHargaStrukHitung").val());
                diskonStruk = parseFloat($("#inDiskonStruk").val());
                ppn = parseFloat($("#inPpn").val());

                hargaHitung = (parseFloat(HargaStruk)) / parseFloat(jumlahTerkecil);
                hargaHitungHna = hargaHitung;
                hargaHitung = hargaHitung * (1 + (ppn / 100));
                hargaHitung = hargaHitung * (1 - (diskonStruk / 100));

                $("#outTotal1").val(convertToRupiah(hargaHitung.toFixed(0)));
                $("#inFrek1").val((satuanTerbesar * jumlahTerkecil));
                frek = parseFloat($("#inFrek1").val());


                total = hargaHitung * frek;
                $("#outHarga1").val(hargaHitung.toFixed(0));

                $("#outTotal1").val(convertToRupiah(total.toFixed(0)));
                $("#outDiskon1").val(diskonStruk);
                $("#outPpn1").val(ppn);
                $("#outHna").val(hargaHitungHna.toFixed(0));


            }

            //insert faktur obat pada list faktur
            function insertObatFaktur1() {
                namaObat = $("#namaObat").val();
                id_detail = $("#id_detail").val();
                id_faktur = $("#inFaktur").val();
                // alert(id_faktur);

                idLogistik = $("#idNamaObat").val();
                harga = $("#outHarga1").val();
                margin = $("#inMargin").val();
                frek = parseFloat($("#inFrek1").val());
                noBatch = $("#inNoBatch1").val();
                noFaktur = $("#inNoFaktur").val();
                tglExp = $("#inTglExp").val();
                idProdusenObat = $("#inProdusenObat").val();

                ppn = $("#outPpn1").val();
                diskon = $("#outDiskon1").val();
                diskonRs = $("#outDiskonRs").val();
                hna = $("#outHna").val();

                total = harga * frek;

                var ID = Math.random().toString(36).substr(2, 50) + Math.random().toString(36).substr(2, 50);
                var ID2 = Math.random().toString(36).substr(2, 50) + Math.random().toString(36).substr(2, 50);



                if (tglExp == "") {
                    alert("tolong isi ED dahulu");
                } else {
                    $.ajax({
                        type: "POST",
                        url: "Po_obat_bebas/insertObatFaktur1",
                        dataType: 'json',
                        data: {
                            idFaktur: id_faktur,
                            id_detail: id_detail,
                            harga: harga,
                            margin: margin,
                            noBatch: noBatch,
                            noFaktur: noFaktur,
                            frek: frek,
                            total: total,
                            idLogistik: idLogistik,
                            tglExp: tglExp,
                            idProdusenObat: idProdusenObat,
                            id: ID,
                            id2: ID2,
                            diskon: diskon,
                            diskonRs: diskonRs,
                            hna: hna,
                            ppn: ppn,

                        },
                        success: function(data) {
                            if (data.status == "success") {
                                swal({
                                    title: "good job!",
                                    type: "success",
                                    text: "Data Berhasil ditambahkan",
                                    confirmButtonColor: "#3cb878",
                                });
                                idLogistik = $("#inLogistik").val("");
                                harga = $("#outHarga").val("");
                                frek = $("#inFrek").val("");
                                noBatch = $("#inNoBatch").val("");
                                noFaktur = $("#inNoFaktur").val("");
                                tglExp = $("#inTglExp").val("");
                                idProdusenObat = $("#inProdusenObat").val("");

                                ppn = $("#outPpn").val("");
                                diskon = $("#outDiskon").val("");
                                diskonRs = $("#outDiskonRs").val("");
                                hna = $("#outHna").val("");


                                //$('#username_result').html("");
                                $("#modalTambahObatFaktur").modal('show');
                                $('#isiFaktur1').DataTable().ajax.reload();
                                $('#isiFaktur').DataTable().ajax.reload();
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
                        "url": '<?php echo base_url('Po_obat_bebas/tampil_list_faktur'); ?>',
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

            //Tampil isi faktur
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
                        "url": '<?php echo base_url('Po_obat_bebas/tampil_list_faktur1'); ?>',
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
                    "ajax": '<?php echo base_url('Po_obat_bebas/tampil_data'); ?>',
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
                    "ajax": '<?php echo base_url('Po_obat_bebas/tampil_data'); ?>',
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
                        "url": '<?= base_url('Po_obat_bebas/tampil_rangePo'); ?>',
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

        <!--end coba 1-->

        <!--coba 1-->

        <!--script type="text/javascript">
    var datable;
    // var table2;

    $(document).ready(function() {

        //datatables
        datable = $('#datable').DataTable({ //load data pada awal halaman
            "processing": true, //Feature control the processing indicator.
            // "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo site_url('Po_obat/tampil_data') ?>",
                "type": "POST",
                "data": function(data) {
                    //data.tanggal_masuk = $('#tanggal_masuk').val();
                    //data.tanggal_keluar = $('#tanggal_keluar').val();
        


                },

            },
            "deferRender": true,
            "processing": true,
            "order": [],
            "columnDefs": [{
                "targets": [0],
                "orderable": false,
            }, ],


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
            //Set column definition initialisation properties.
            "columnDefs": [{
                "targets": [0], //first column / numbering column
                "orderable": false, //set not orderable
            }, ],

        });




        



    });
</script-->

        <!--end coba-->

        <!--tampl data-->

        <script type="text/javascript">
            function myFunction() {
                no_faktur = $('#inNoFaktur').val();
                if (no_faktur != '') {
                    $.ajax({
                        url: "<?php echo base_url(); ?>Po_obat_bebas/check_noFaktur",
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
            $(document).ready(function() {
                $.fn.modal.Constructor.prototype.enforceFocus = function() {};
            });
        </script>
=======
<div class="panel panel-default card-view">
    <div class="panel-heading">
        <div class="pull-left">
            <h6 class="panel-title txt-dark"><span class="span span-success">LIST OBAT PO</span></h6>
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
                                    <th>TANGGAL PO</th>
                                    <th>NAMA VENDOR</th>

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
                                        <label class="control-label col-md-3">NAMA VENDOR</label>
                                        <div class="col-md-9 has-success">

                                            <select class="form-control filled-input select2" id="id_vendor" name="id_vendor">
                                                <option value="">Nama Vendor</option>

                                                <?php foreach ($vendor as $v) { ?>
                                                    <option value="<?= $v['nama_produsen']; ?>"><?= $v['nama_produsen']; ?></option>

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
                                            function numtor($number)
                                            {
                                                $map = array('M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1);
                                                $returnValue = '';
                                                while ($number > 0) {
                                                    foreach ($map as $roman => $int) {
                                                        if ($number >= $int) {
                                                            $number -= $int;
                                                            $returnValue .= $roman;
                                                            break;
                                                        }
                                                    }
                                                }
                                                return $returnValue;
                                            }
                                            date_default_timezone_set('Asia/Jakarta');
                                            date("Y-m-d");
                                            $noValid =  sprintf('%04d', $max, 'dyhtdyu');
                                            $noDok = $noValid . "/" . "PB/FARM-RSBT/" . numtor(date("m")) . "/" . date("Y");
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

                                <!-- /formbody -->
                                <!--nama-->

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">NAMA OBAT</label>
                                            <div class="col-md-9 has-success ">
                                                <select class="form-control filled-input select2" onchange="tampilHarga()" id="inLogistik">
                                                    <option value="-|0|0|-|-|-">-</option>
                                                    <?php
                                                    foreach ($obat as $row) {

                                                    ?>
                                                        <option value="<?php echo $row["id_logistik"] . "|" . $row["harga_cost"] . "|" . $row["tipe"] . "|" . $row["nama"]; ?>"><?php echo $row["nama"]; ?></option>
                                                    <?php }  ?>
                                                </select>
                                                <span class="help-block"></span>

                                            </div>
                                        </div>
                                    </div>
                                    <!--nama-->

                                    <!--satuan terbaru-->

                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">TOTAL PESANAN</label>
                                            <div class="col-md-9 has-success">
                                                <input type="number" autocomplete="off" class="form-control filled-input" placeholder="JUMLAH" id="inFrek" value="1" oninput="tampilHarga1()">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">HARGA TERBARU</label>
                                            <div class="col-md-9 has-success">
                                                <input type="text" value="0" autocomplete="off" class="form-control filled-input" placeholder="HARGA SATUAN" id="outHarga" oninput="tampilHarga1()">
                                                <input type="hidden" id="inFaktur" disabled>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group ">
                                                <label class="control-label col-md-3">SATUAN PESANAN</label>
                                                <div class="col-md-9 has-success ">

                                                    <select class="form-control filled-input select2" id="outPpn">

                                                        <?php
                                                        foreach ($satuan as $row) {

                                                        ?>
                                                            <option value="<?php echo $row["satuan"]; ?>"><?php echo $row["satuan"]; ?></option>
                                                        <?php }  ?>
                                                    </select>
                                                    <span class="help-block"></span>

                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">JUMLAH PESAN</label>
                                            <div class="col-md-9 has-success">
                                                <input type="number" value="0" class="form-control filled-input" oninput="tampilHarga1()" id="outDiskon">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>




                                <!--/span-->
                                <!-- /Row -->
                                <div class="row" align="right">
                                    <div class="col-md-12">

                                        <button onclick="insertObatFaktur()" class="btn btn-success btn-anim  btn-sm" type="button"><i class="icon-rocket"></i><span class="btn-text">TAMBAH</span></button>
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
                                                    <table id="isiFaktur" class="table table-hover display  pb-30">
                                                        <thead>
                                                            <tr class="bg-success">
                                                                <th>NO</th>
                                                                <th>NAMA BARANG</th>
                                                                <th>HARGA SATUAN</th>
                                                                <th>TOTAL PESANAN</th>
                                                                <th>JUMLAH PESANAN</th>
                                                                <th>SATUAN</th>
                                                                <th>TOTAL</th>
                                                                <th>STATUS</th>
                                                                <th>HAPUS</th>
                                                                <th>PILIH</th>


                                                            </tr>
                                                        </thead>
                                                        <tfoot>
                                                            <tr class="bg-success">
                                                                <th>NO</th>
                                                                <th>NAMA BARANG</th>
                                                                <th>HARGA SATUAN</th>
                                                                <th>TOTAL PESANAN</th>
                                                                <th>JUMLAH PESANAN</th>
                                                                <th>SATUAN</th>
                                                                <th>TOTAL</th>
                                                                <th>STATUS</th>
                                                                <th>HAPUS</th>
                                                                <th>PILIH</th>

                                                            </tr>
                                                        </tfoot>

                                                        <tbody style="color: black">


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

                            <div class="modal-footer mb-10 mr-15">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-wrap">

                                            <div class="collapse" id="collap_obat_faktur">

                                                <!-- /formbody -->
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group ">
                                                            <label class="control-label col-md-3">NAMA OBAT</label>
                                                            <div class="col-md-9 has-success ">
                                                                <input type="text" class="form-control" autocomplete="off" placeholder="NAMA OBAT" id="namaObat">

                                                                <input type="hidden" class="form-control" autocomplete="off" placeholder="NAMA OBAT" id="id_detail">

                                                                <input type="hidden" class="form-control" autocomplete="off" id="idNamaObat">
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
                                                                <input type="number" class="form-control" autocomplete="off" placeholder="%" id="inPpn" value="0">
                                                                <span class="help-block"></span>

                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group ">
                                                            <label class="control-label col-md-3">DISC</label>
                                                            <div class="col-md-3 has-success">
                                                                <input type="number" class="form-control" autocomplete="off" placeholder="%" id="inDiskonStruk" value="0">
                                                                <span class="help-block"></span>
                                                                <div type="submit" class="btn btn-success mr-10" onclick="setHargaHasil()">HARGA OBAT</div>
                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group ">
                                                            <label class="control-label col-md-3">HNA</label>
                                                            <div class="col-md-9 has-error">
                                                                <input type="number" autocomplete="off" value="0" class="form-control" disabled="" placeholder="HNA" id="outHna">
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
                                                    <!--/span-->

                                                    <div class="col-md-6">
                                                        <div class="form-group ">
                                                            <label class="control-label col-md-3">HARGA LAMA</label>
                                                            <div class="col-md-9 has-error">
                                                                <input type="text" class="form-control" id="outHargaLama" value="0" disabled="">
                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">DISKON</label>
                                                            <div class="col-md-3 has-error">
                                                                <input type="number" value="0" class="form-control" disabled="" id="outDiskon1">
                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">PPN</label>
                                                            <div class="col-md-3 has-error">
                                                                <input type="number" value="0" class="form-control" disabled="" id="outPpn1">
                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">TOTAL HARGA</label>
                                                            <div class="col-md-9 has-error">
                                                                <input type="text" class="form-control" disabled="" id="outTotal1">
                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">DISKON RS</label>
                                                            <div class="col-md-3 has-success">
                                                                <input type="number" value="0" class="form-control" id="outDiskonRs">
                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- /Row -->
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
                                                    <!--/span-->

                                                    <!--/span-->
                                                    <div class="col-md-6">
                                                        <div class="form-group ">
                                                            <label class="control-label col-md-3">MARGIN</label>
                                                            <div class="col-md-9 has-success">
                                                                <input type="text" autocomplete="off" class="form-control" id="inMargin">
                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
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

                                                    <!--/span-->
                                                    <div class="col-md-6">
                                                        <div class="form-group ">
                                                            <label class="control-label col-md-3">TANGGAL EXPIRED</label>
                                                            <div class="col-md-9 has-success">
                                                                <input type="date" class="form-control  txt-dark" data-toggle="datepicker" autocomplete="off" id="inTglExp">
                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group ">
                                                        <label class="control-label col-md-3">NO FAKTUR</label>
                                                        <div class="col-md-9 has-success">
                                                            <input type="text" autocomplete="off" onkeyup="myFunction()" class="form-control" placeholder="NO FAKTUR" id="inNoFaktur">
                                                            <span class="help-block"></span>
                                                            <div class="mt-10" id="no_result"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">

                                                    <!--/span-->
                                                    <div class="form-group ">
                                                        <label class="control-label col-md-3">PRODUSEN OBAT</label>
                                                        <div class="col-md-9 has-error">
                                                            <input type="text" class="form-control filled-input " id="inProdusenObat" disabled="">
                                                            <span class="help-block"></span>
                                                            <input type="hidden" class="form-control filled-input " id="noFaktur1" disabled="">
                                                            <input type="hidden" class="form-control filled-input " id="idStruk" disabled="">
                                                        </div>

                                                        <div type="submit" class="btn btn-success  mr-10" onclick="insertObatFaktur1()">TAMBAH</div>

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


                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group ">
                                                            <label class="control-label col-md-3"></label>
                                                            <div class="col-md-9 has-error">

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
                                                            <table id="isiFaktur1" class="table table-hover display  pb-30">
                                                                <thead>
                                                                    <tr class="bg-success">
                                                                        <th>NO</th>
                                                                        <th>NAMA OBAT</th>
                                                                        <th>HARGA SATUAN</th>
                                                                        <th>JUMLAH OBAT</th>
                                                                        <th>TOTAL HARGA</th>
                                                                        <th>NO BATCH</th>
                                                                        <th>NO FAKTUR</th>
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
                                                                        <th>JUMLAH OBAT</th>
                                                                        <th>TOTAL HARGA</th>
                                                                        <th>NO BATCH</th>
                                                                        <th>NO FAKTUR</th>
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
    </div>

</div>

<!--end modal 2-->

<!--modal edit --->

<!-- Modal Edit Pasien -->
<div class="panel-wrapper">
    <div class="panel-body">
        <!-- sample modal content -->
        <div class="modal fade bs-example-modal-lg" id="modalEditFaktur" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true" style="overflow : auto !important;">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h5 class="modal-title mt-10" id="myLargeModalLabel"><i
                                class="icon-user mr-10"></i>EDIT IDENTITAS PASIEN</h5>
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
                                        <label class="control-label col-md-3">NAMA VENDOR</label>
                                        <div class="col-md-9 has-success">

                                            <select class="form-control filled-input select2" id="id_vendor" name="id_vendor">
                                                <option value="">Nama Vendor</option>

                                                <?php foreach ($vendor as $v) { ?>
                                                    <option value="<?= $v['nama_produsen']; ?>"><?= $v['nama_produsen']; ?></option>

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
    <

        <!-- End -->

        <!--end modal edit-->

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
                        url: "<?php echo base_url() ?>Po_obat_bebas/insertFaktur",
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

                                $('.modal-pendaftaranakun').modal('hide');
                                $('#datable').DataTable().ajax.reload();
                                // $('#isiFaktur').DataTable().ajax.reload();
                                //location.reload();

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
                            url: "<?php echo base_url() ?>Po_obat_bebas/hapus_faktur_po",
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
                // $("#no_dokumen1").val(no_dokumen);
                $("#modalTambahObatFaktur").modal('show');
                reload_list_faktur(id_faktur);
                reload_total_harga(id_faktur)
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
                        "url": '<?php echo base_url('Po_obat_bebas/tampil_total_harga'); ?>',
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

            function insertObatFaktur() {
                a = $("#inLogistik").val();
                splitDiag = a.split("|");

                idLogistik = splitDiag[0];
                harga = $("#outHarga").val();
                frek = parseFloat($("#inFrek").val());

                ppn = $("#outPpn").val();
                id_faktur = $("#inFaktur").val();

                diskon = $("#outDiskon").val();

                total = harga * frek;
                // alert(total);

                var ID = Math.random().toString(36).substr(2, 50) + Math.random().toString(36).substr(2, 50);
                var ID2 = Math.random().toString(36).substr(2, 50) + Math.random().toString(36).substr(2, 50);

                vendor = $("#vendor").val();

                dataString = 'idFaktur=' + id_faktur + '&harga=' + harga +
                    '&frek=' + frek + '&total=' + total +
                    '&idLogistik=' + idLogistik +
                    '&id=' + ID + '&id2=' + ID2 +
                    '&diskon=' + diskon + '&ppn=' + ppn + '&vendor=' + vendor;

                $().ready(function() {
                    $.ajax({
                        url: "<?php echo base_url() ?>Po_obat_bebas/insertObatFaktur",
                        method: "POST",
                        dataType: 'json',
                        data: dataString,
                        success: function(data) {
                            if (data.status == "success") {
                                swal({
                                    title: "good job!",
                                    type: "success",
                                    text: "FAKTUR " + vendor + " Berhasil ditambahkan",
                                    confirmButtonColor: "#3cb878",
                                });
                                idLogistik = $("#inLogistik").val("-|0|0|-|-|-").change();
                                idFaktur = $("#idFaktur").val("");
                                harga = $("#outHarga").val("");
                                frek = $("#inFrek").val("");
                                noBatch = $("#inNoBatch").val("");
                                tglExp = $("#inTglExp").val("");
                                idProdusenObat = $("#inProdusenObat").val("");
                                ppn = $("#outPpn").val("");
                                diskon = $("#outDiskon").val("");
                                diskonRs = $("#outDiskonRs").val("");
                                hna = $("#outHna").val("");
                                //$('#username_result').html("");

                                $('#isiFaktur').DataTable().ajax.reload();

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
                            url: "<?php echo base_url() ?>Po_obat_bebas/hapus_list_faktur",
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

            //end of hapus
            // button pilih pada list faktur
            function pilih_list_faktur(id_detail, id_struk) {
                $.ajax({
                    url: "<?= base_url() . 'Po_obat_bebas/getDataListFaktur' ?>",
                    data: {
                        id_detail: id_detail,
                    },
                    type: 'POST',
                    dataType: 'json',
                    success: function(data) {
                        if (data.status_dt == "found") {

                            $("#namaObat").val(data.nama);
                            $("#id_detail").val(id_detail);
                            $("#idNamaObat").val(data.id_logistik);
                            $("#inProdusenObat").val(data.produsen);
                            $("#outHna").val(data.harga);
                            $("#outHarga1").val(data.harga);
                            $("#outHargaLama").val(data.harga);
                            $("#inMargin").val(data.margin);

                            harga = parseFloat(data.harga);
                            frek = parseFloat($("#inFrek1").val());
                            total = harga * frek;
                            $("#outTotal1").val(convertToRupiah(total.toFixed(0)));

                            $("#collap_obat_faktur").collapse('show');

                            id_faktur = $("#inFaktur").val();
                            reload_isi_list_faktur(id_faktur);
                        } else {
                            alert("data tidak ditemukan");
                        }
                    }
                });
            }
            //function untuk button harga obat
            function setHargaHasil() {
                satuanTerbesar = parseFloat($("#inSatuanTerbesar").val());
                jumlahTerkecil = parseFloat($("#inJumlahSatuanTerkecil").val());
                HargaStruk = parseFloat($("#inHargaStrukHitung").val());
                diskonStruk = parseFloat($("#inDiskonStruk").val());
                ppn = parseFloat($("#inPpn").val());

                hargaHitung = (parseFloat(HargaStruk)) / parseFloat(jumlahTerkecil);
                hargaHitungHna = hargaHitung;
                hargaHitung = hargaHitung * (1 + (ppn / 100));
                hargaHitung = hargaHitung * (1 - (diskonStruk / 100));

                $("#outTotal1").val(convertToRupiah(hargaHitung.toFixed(0)));
                $("#inFrek1").val((satuanTerbesar * jumlahTerkecil));
                frek = parseFloat($("#inFrek1").val());


                total = hargaHitung * frek;
                $("#outHarga1").val(hargaHitung.toFixed(0));

                $("#outTotal1").val(convertToRupiah(total.toFixed(0)));
                $("#outDiskon1").val(diskonStruk);
                $("#outPpn1").val(ppn);
                $("#outHna").val(hargaHitungHna.toFixed(0));


            }

            //insert faktur obat pada list faktur
            function insertObatFaktur1() {
                namaObat = $("#namaObat").val();
                id_detail = $("#id_detail").val();
                id_faktur = $("#inFaktur").val();
                // alert(id_faktur);

                idLogistik = $("#idNamaObat").val();
                harga = $("#outHarga1").val();
                margin = $("#inMargin").val();
                frek = parseFloat($("#inFrek1").val());
                noBatch = $("#inNoBatch1").val();
                noFaktur = $("#inNoFaktur").val();
                tglExp = $("#inTglExp").val();
                idProdusenObat = $("#inProdusenObat").val();

                ppn = $("#outPpn1").val();
                diskon = $("#outDiskon1").val();
                diskonRs = $("#outDiskonRs").val();
                hna = $("#outHna").val();

                total = harga * frek;

                var ID = Math.random().toString(36).substr(2, 50) + Math.random().toString(36).substr(2, 50);
                var ID2 = Math.random().toString(36).substr(2, 50) + Math.random().toString(36).substr(2, 50);



                if (tglExp == "") {
                    alert("tolong isi ED dahulu");
                } else {
                    $.ajax({
                        type: "POST",
                        url: "Po_obat_bebas/insertObatFaktur1",
                        dataType: 'json',
                        data: {
                            idFaktur: id_faktur,
                            id_detail: id_detail,
                            harga: harga,
                            margin: margin,
                            noBatch: noBatch,
                            noFaktur: noFaktur,
                            frek: frek,
                            total: total,
                            idLogistik: idLogistik,
                            tglExp: tglExp,
                            idProdusenObat: idProdusenObat,
                            id: ID,
                            id2: ID2,
                            diskon: diskon,
                            diskonRs: diskonRs,
                            hna: hna,
                            ppn: ppn,

                        },
                        success: function(data) {
                            if (data.status == "success") {
                                swal({
                                    title: "good job!",
                                    type: "success",
                                    text: "Data Berhasil ditambahkan",
                                    confirmButtonColor: "#3cb878",
                                });
                                idLogistik = $("#inLogistik").val("");
                                harga = $("#outHarga").val("");
                                frek = $("#inFrek").val("");
                                noBatch = $("#inNoBatch").val("");
                                noFaktur = $("#inNoFaktur").val("");
                                tglExp = $("#inTglExp").val("");
                                idProdusenObat = $("#inProdusenObat").val("");

                                ppn = $("#outPpn").val("");
                                diskon = $("#outDiskon").val("");
                                diskonRs = $("#outDiskonRs").val("");
                                hna = $("#outHna").val("");


                                //$('#username_result').html("");
                                $("#modalTambahObatFaktur").modal('show');
                                $('#isiFaktur1').DataTable().ajax.reload();
                                $('#isiFaktur').DataTable().ajax.reload();
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
                        "url": '<?php echo base_url('Po_obat_bebas/tampil_list_faktur'); ?>',
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

            //Tampil isi faktur
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
                        "url": '<?php echo base_url('Po_obat_bebas/tampil_list_faktur1'); ?>',
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
                    "ajax": '<?php echo base_url('Po_obat_bebas/tampil_data'); ?>',
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
                    "ajax": '<?php echo base_url('Po_obat_bebas/tampil_data'); ?>',
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
                        "url": '<?= base_url('Po_obat_bebas/tampil_rangePo'); ?>',
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

        <!--end coba 1-->

        <!--coba 1-->

        <!--script type="text/javascript">
    var datable;
    // var table2;

    $(document).ready(function() {

        //datatables
        datable = $('#datable').DataTable({ //load data pada awal halaman
            "processing": true, //Feature control the processing indicator.
            // "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo site_url('Po_obat/tampil_data') ?>",
                "type": "POST",
                "data": function(data) {
                    //data.tanggal_masuk = $('#tanggal_masuk').val();
                    //data.tanggal_keluar = $('#tanggal_keluar').val();
        


                },

            },
            "deferRender": true,
            "processing": true,
            "order": [],
            "columnDefs": [{
                "targets": [0],
                "orderable": false,
            }, ],


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
            //Set column definition initialisation properties.
            "columnDefs": [{
                "targets": [0], //first column / numbering column
                "orderable": false, //set not orderable
            }, ],

        });




        



    });
</script-->

        <!--end coba-->

        <!--tampl data-->

        <script type="text/javascript">
            function myFunction() {
                no_faktur = $('#inNoFaktur').val();
                if (no_faktur != '') {
                    $.ajax({
                        url: "<?php echo base_url(); ?>Po_obat_bebas/check_noFaktur",
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
            $(document).ready(function() {
                $.fn.modal.Constructor.prototype.enforceFocus = function() {};
            });
        </script>
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
        <!--end tampil data-->