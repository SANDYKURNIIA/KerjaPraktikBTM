<<<<<<< HEAD
<!-- Row -->
<div class="panel panel-default card-view mt-20 ">
    <div class="panel-heading">
        <div class="pull-left">
            <h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">PEMBELIAN OBAT BEBAS</span></h6>
        </div>
        <div align="right">
            <div class="btn btn-primary btn-anim btn-sm " onclick="obatBebas()" style="margin-right: 40px;"><i class="icon-rocket"></i><span class="btn-text">PEMBELIAN OBAT BEBAS</span>
                <div></div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row mt-30">
            <div class="col-md-12">
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
    <h6 class="panel-title txt-dark mt-10"><?= $this->session->flashdata('alert'); ?></h6>
    <div class="panel-wrapper collapse in">
        <div class="panel-body">
            <div class="table-wrap">
                <div class="table-responsive">
                    <table id="datable" class="table table-hover display pb-30">
                        <thead>
                            <tr class="bg-success">
                                <th>NO</th>
                                <th>TINDAKAN OBAT</th>
                                <th>RETUR</th>
                                <th>EDIT</th>
                                <th>HAPUS</th>
                                <th>TANGGAL PELAYANAN</th>
                                <th>JAM PELAYANAN</th>
                                <th>NAMA PASIEN</th>
                                <th>JENIS KLAIM</th>
                                <th>DOKTER</th>
                                <th>KETERANGAN</th>

                            </tr>
                        </thead>

                        <tfoot>
                            <tr class="bg-success">
                                <th>NO</th>
                                <th>TINDAKAN OBAT</th>
                                <th>RETUR</th>
                                <th>EDIT</th>
                                <th>HAPUS</th>
                                <th>TANGGAL PELAYANAN</th>
                                <th>JAM PELAYANAN</th>
                                <th>NAMA PASIEN</th>
                                <th>JENIS KLAIM</th>
                                <th>DOKTER</th>
                                <th>KETERANGAN</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="panel-wrapper collapse in">
    <div class="panel-body">
        <!-- sample modal content -->
        <div class="modal fade" id="modal_tambah" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h5 class="modal-title mt-10" id="myLargeModalLabel"><i class="icon-user mr-10"></i> PELAYANAN TAMBAHAN
                        </h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-body">
                            <h6 class="txt-dark capitalize-font"><i class="icon-user mr-10"></i>PELAYANAN TAMBAHAN</h6>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">NAMA</label>
                                        <div class="col-md-9 has-success">
                                            <input type="text" class="form-control rounded-input" autocomplete="off" placeholder="NAMA" id="inNama">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">JENIS KLAIM</label>
                                        <div class="col-md-9 has-success">
                                            <select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" id="inCaraBayar" name="inCaraBayar">
                                                <option value="-">-</option>
                                                <?php
                                                foreach ($cara_bayar as $row) {

                                                ?>
                                                    <option value="<?php echo $row["id_cara_bayar"]; ?>">
                                                        <?php echo  $row["nama"]; ?></option>
                                                <?php }  ?>
                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">DOKTER</label>
                                        <div class="col-md-9 has-success">
                                            <select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" id="inDpjp" name="inDpjp">
                                                <option value="-">-</option>
                                                <?php
                                                foreach ($dokter as $row) {

                                                ?>
                                                    <option value="<?php echo $row["id_dokter"] . "|" . $row["nama"]; ?>">
                                                        <?php echo  $row["nama"]; ?></option>
                                                <?php }  ?>
                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">KETERANGAN</label>
                                        <div class="col-md-9 has-success">

                                            <textarea class="form-control" rows="5" cols="30" id="inKet"></textarea>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>

                            </div>


                        </div>
                        <div class="form-actions mt-10">
                            <div class="form-actions mt-10">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">
                                                <button type="submit" class="btn btn-success btn-rounded mr-10" onclick="insert()">Submit</button>
                                                <span></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6"> </div>
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
</div>
<div class="panel-wrapper collapse in">
    <div class="panel-body">
        <!-- sample modal content -->
        <div class="modal fade" id="modal_edit" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h5 class="modal-title mt-10" id="myLargeModalLabel"><i class="icon-user mr-10"></i> PELAYANAN TAMBAHAN
                        </h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-body">
                            <h6 class="txt-dark capitalize-font"><i class="icon-user mr-10"></i>PELAYANAN TAMBAHAN</h6>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">NAMA</label>
                                        <div class="col-md-9 has-success">
                                            <input type="text" class="form-control rounded-input" autocomplete="off" placeholder="NAMA" id="upNama">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">JENIS KLAIM</label>
                                        <div class="col-md-9 has-success">
                                            <select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" id="upCaraBayar" name="upCaraBayar">
                                                <option value="-">-</option>
                                                <?php
                                                foreach ($cara_bayar as $row) {

                                                ?>
                                                    <option value="<?php echo $row["id_cara_bayar"]; ?>">
                                                        <?php echo  $row["nama"]; ?></option>
                                                <?php }  ?>
                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">DOKTER</label>
                                        <div class="col-md-9 has-success">
                                            <select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" id="upDpjp" name="upDpjp">
                                                <option value="-">-</option>
                                                <?php
                                                foreach ($dokter as $row) {

                                                ?>
                                                    <option value="<?php echo $row["id_dokter"] . "|" . $row["nama"]; ?>">
                                                        <?php echo  $row["nama"]; ?></option>
                                                <?php }  ?>
                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">KETERANGAN</label>
                                        <div class="col-md-9 has-success">

                                            <textarea class="form-control" rows="5" cols="30" id="upKet"></textarea>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>

                            </div>


                        </div>
                        <div class="form-actions mt-10">
                            <div class="form-actions mt-10">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">
                                                <input type="hidden" id="upID">
                                                <button type="submit" class="btn btn-success btn-rounded mr-10" onclick="edit()">EDIT</button>
                                                <span></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6"> </div>
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
</div>
<!-- modal edit data -->
<div class="panel-wrapper collapse in">
    <div class="panel-body">
        <div class="modal fade bs-example-modal-lg" id="modal_edit_resep" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h5 class="modal-title" id="myLargeModalLabel"><i class="icon-user mr-10"></i> OBAT
                        </h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-wrap">
                            <!-- /formbody -->
                            <form id="formObat">
                                <h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO OBAT
                                </h6>
                                <hr width="95%">
                                <!-- <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">DEPO</label>
                                            <div class="col-md-9 has-success">
                                                <select class="form-control filled-input select2" id="inDepo">
                                                    <option value="APOTIK">APOTIK</option>
                                                    <option value="IGD">IGD</option>
                                                    <option value="RANAP">RANAP</option>
                                                </select>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">NAMA OBAT</label>
                                            <div class="col-md-9 has-success">
                                                <select class="form-control filled-input select2" id="inObat" onchange="setHarga()">
                                                    <option value="-">-</option>
                                                    <?php

                                                    foreach ($obat as $row) {

                                                    ?>
                                                        <option value="<?php echo $row["id_logistik"] . '|' . $row["harga_cost"] . '|' . $row["margin"] . '|' . $row["kadaluarsa"] . '|' . $row["stok"] . '|' . $row["ppn"]; ?>"><?php echo $row["nama"]; ?></option>
                                                    <?php
                                                    }
                                                    ?>

                                                </select>
                                                <span class="help-block"></span>
                                            </div>

                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6 " id="outTglExp">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">EXPIRED DATE</label>
                                            <div class="col-md-9 has-success">
                                                <input type="text" class="form-control " id="inTglExp" disabled="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">JUMLAH STOK</label>
                                            <div class="col-md-9 has-error">
                                                <input type="number" class="form-control " id="outStok" value="0" disabled="">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">JUMLAH OBAT</label>
                                            <div class="col-md-9 has-success">
                                                <input type="number" class="form-control " id="inJumlahObat" placeholder="jumlah" value="1" oninput="setHarga()">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">DISCOUNT</label>
                                            <div class="col-md-3 has-success">
                                                <input type="number" placeholder="Disc" max="35" class="form-control" id="inDisc" value="0" oninput="setHarga()">
                                            </div>
                                            <div class="col-md-1">
                                                %
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">HARGA HNA+PPN</label>
                                            <div class="col-md-9 has-error">
                                                <input type="text" class="form-control" disabled="" id="outBiayaTindakanObat">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">HARGA + MARGIN</label>
                                            <div class="col-md-9 has-error">
                                                <input type="text" class="form-control" disabled="" id="outBiayaMarginObat">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- span -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">TOTAL HARGA</label>
                                            <div class="col-md-9 has-success">
                                                <input type="text" class="form-control" disabled="" id="outTotalObat">

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">KETERANGAN</label>
                                            <div class="col-md-9 has-success">
                                                <textarea class="form-control" rows="2" style="resize:none" id="inKeteranganObat">-</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 10px;" id="cetakSigna">

                                    <div class="col-md-6">
                                        <label class="control-label col-md-3">SIGNA OBAT</label>
                                        <div class="col-md-9 has-success">
                                            <select class="form-control filled-input rounded-input select2" id="inSigna">

                                                <?php
                                                foreach ($signa as $row) {

                                                ?>
                                                    <option value="<?php echo $row["id_signa"]; ?>"> <?php echo $row["tindakan"]; ?> </option>
                                                <?php
                                                }
                                                ?>

                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                        <input type="hidden" class="form-control" id="inResObat1">
                                        <div class="col-md-offset-3 col-md-9">
                                            <span></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="control-label col-md-3">CARA PAKAI OBAT</label>
                                        <div class="col-md-9 has-success">
                                            <select class="form-control filled-input rounded-input select2" id="inCaraPakai">
                                                <option value="-">-</option>
                                                <?php
                                                foreach ($cara_pemakaian_obat as $row) {

                                                ?>
                                                    <option value="<?php echo $row["id_cara_pemakaian"]; ?>"> <?php echo $row["cara_pemakaian"]; ?> </option>
                                                <?php
                                                }
                                                ?>

                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" class="form-control" disabled="" id="cara_bayar">
                                <input type="hidden" class="form-control" id="inPelObat">
                                <!-- <input type="hidden" class="form-control" id="inResObat"> -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">
                                                <div type="submit" class="btn btn-success mr-10" onclick="insert_Obat()">SIMPAN</div>
                                                <!-- <div id="batalFarmasi" onclick="batalObat()" class="btn btn-danger ">BATAL</div> -->
                                                <span></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6"> </div>
                                </div>
                            </form>
                            <div class="collapse" id="collap_obat_edit">
                                <div class="form-body">
                                    <h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO OBAT
                                    </h6>
                                    <hr width="95%">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group ">
                                                <label class="control-label col-md-3">NAMA OBAT</label>
                                                <div class="col-md-9 has-success">
                                                    <input type="text" class="form-control " id="inObat1" disabled="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group ">
                                                <label class="control-label col-md-3">EXPIRED DATE</label>
                                                <div class="col-md-9 has-success">
                                                    <input type="text" class="form-control " id="inTglExp1" disabled="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group ">
                                                <label class="control-label col-md-3">JUMLAH OBAT</label>
                                                <div class="col-md-9 has-success">
                                                    <input type="number" class="form-control " id="inJumlahObat1" placeholder="jumlah" value="1" oninput="setHarga1()">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">TOTAL HARGA</label>
                                                <div class="col-md-9 has-success">
                                                    <input type="text" class="form-control" disabled="" id="outTotalObat1">

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <input type="hidden" class="form-control" id="idTindakan">
                                    <input type="hidden" class="form-control" id="hargaCost">
                                    <!-- <input type="hidden" class="form-control" id="inDepo1"> -->
                                    <div class="form-actions mt-10">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-offset-3 col-md-9">
                                                        <div type="submit" class="btn btn-success mr-10" onclick="edit_Obat()">SIMPAN</div>
                                                        <!-- <div id="batalFarmasi" onclick="batalFarmasi()" class="btn btn-danger ">BATAL</div> -->
                                                        <span></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6"> </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions mt-10">
                                <div class="row ">
                                    <h6 class="txt-dark capitalize-font pl-20"><i class="icon-list mr-10"></i>TINDAKAN</h6>
                                    <hr width="95%">
                                    <!-- <div type="submit" class="btn btn-success mr-10" style="margin-left: 40px;" onclick="tambah_obat()">TAMBAH OBAT</div> -->
                                    <div id="cetakFarmasi" onclick="cetak()" class="btn btn-primary mr-10" style="margin-left: 40px;">CETAK</div>
                                    <div id="cetakFarmasi" onclick="cetakSigna1()" class="btn btn-success mr-10">CETAK SIGNA</div>
                                    <div id="cetakFarmasi" onclick="cetak_resep()" class="btn btn-sm btn-success mr-10">CETAK RESEP</div>
                                    <div class="table-wrap" style="width: 100%; margin: auto ">
                                        <div class="table-responsive">
                                            <table class="table table-hover display  pb-60" id="tableobat">
                                                <thead>
                                                    <tr class="bg-success">
                                                        <th>NO</th>
                                                        <th>EDIT</th>
                                                        <th>HAPUS</th>
                                                        <th>NAMA OBAT</th>
                                                        <th>EXPIRE DATE</th>
                                                        <th>HARGA OBAT</th>
                                                        <th>JUMLAH OBAT</th>
                                                        <th>DEPO</th>
                                                        <th>TOTAL BIAYA</th>
                                                        <th>KETERANGAN</th>
                                                        <th>NAMA STAFF</th>
                                                        <th>SIGNA</th>
                                                    </tr>
                                                </thead>
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
                                            <!-- <p id="notif_load" style="color:red;">Loading data, Please wait</p> -->
                                            <div class="table-responsive ">
                                                <table class="table table-hover display " id="outTotalHargaObat">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="panel-wrapper collapse in">
    <div class="panel-body">
        <div class="modal fade bs-example-modal-lg" id="collap_Return" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h5 class="modal-title" id="myLargeModalLabel"><i class="icon-user mr-10"></i> OBAT
                        </h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-wrap">

                            <div class="form-body">
                                <h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO OBAT
                                </h6>
                                <hr width="95%">
                                <form id="formObat1">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group ">
                                                <label class="control-label col-md-3">NAMA OBAT</label>
                                                <div class="col-md-9 has-success">
                                                    <select class="form-control filled-input select2" id="inObat2" onchange="setJumlahObatReturn()">

                                                    </select>
                                                    <span class="help-block"></span>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group ">
                                                <label class="control-label col-md-3">JUMLAH STOK</label>
                                                <div class="col-md-9 has-error">
                                                    <input type="number" class="form-control " id="outStokReturn" value="0" disabled="">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group ">
                                                <label class="control-label col-md-3">JUMLAH OBAT</label>
                                                <div class="col-md-9 has-success">
                                                    <input type="number" class="form-control " id="inJumlahObatReturn" placeholder="jumlah" value="1" oninput="setJumlahObatReturn()">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- <input type="hidden" class="form-control" disabled="" id="cara_bayar"> -->
                            <input type="hidden" class="form-control" id="inPelResep">
                            <input type="hidden" class="form-control" id="inHisResep">
                            <input type="hidden" class="form-control" id="hargaCost1">
                            <input type="hidden" class="form-control" id="inDepo1">
                            <input type="text" class="form-control" id="inResRetur">
                            <input type="hidden" class="form-control" id="inJenisPelRetur">

                            <div class="form-actions mt-10">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">
                                                <div type="submit" class="btn btn-success mr-10" onclick="insert_Return()">SIMPAN</div>

                                                <span></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6"> </div>
                                </div>
                            </div>
                            <div class="row ">
                                <h6 class="txt-dark capitalize-font pl-20"><i class="icon-list mr-10"></i>TINDAKAN</h6>
                                <hr width="95%">
                                <div id="cetakFarmasi" onclick="cetak_retur()" class="btn btn-primary mr-10" style="margin-left: 40px;">CETAK NOTA</div>

                                <div class="table-wrap" style="width: 100%; margin: auto ">
                                    <div class="table-responsive">
                                        <table class="table table-hover display  pb-60" id="tableobat1">
                                            <thead>
                                                <tr class="bg-success">
                                                    <th>NO</th>
                                                    <th>NAMA OBAT</th>
                                                    <th>EXPIRE DATE</th>
                                                    <th>HARGA OBAT</th>
                                                    <th>JUMLAH OBAT</th>
                                                    <th>DEPO</th>
                                                    <th>TOTAL BIAYA</th>
                                                    <th>KETERANGAN</th>
                                                    <th>NAMA STAFF</th>
                                                    <th>HAPUS</th>
                                                </tr>
                                            </thead>
                                            <tbody style="color: black">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <span class="help-block"></span>
                            <div align="right">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">
                                                <div id="batalFarmasi" onclick="batalFarmasi()" class="btn btn-danger ">BATAL</div>

                                                <span></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6"> </div>
                                </div>

                            </div>
                            </hr>


                        </div>
                    </div>
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
    function edit_data(id_pelayanan) {
        $.ajax({
            url: "<?= base_url() . 'Obat_bebas/getDataPasien' ?>",
            data: {
                pelayanan: id_pelayanan,
            },
            type: 'POST',
            dataType: 'json',
            success: function(data) {
                if (data.status_dt == "found") {
                    
                    $("#upCaraBayar").val(data.cara_bayar).change();
                    $("#upDpjp").val(data.id_dokter +"|"+data.dpjp).change();

                    $("#upNama").val(data.nama);
                    $("#upKet").val(data.keterangan);
                    $("#upID").val(data.id_obat_bebas);
                    $("#modal_edit").modal('show');
                } else {
                    alert("data tidak ditemukan");
                }
            }
        });
    }

    function edit_data_tindakan(id_pelayanan) {
        getObatReturn(id_pelayanan);
        reload_data_obat1(id_pelayanan);

        $('#inPelResep').val(id_pelayanan);
        $('#inResRetur').val(id_pelayanan);
        $('#inJenisPelRetur').val('BEBAS');
        $("#collap_Return").modal('toggle');

    }

    function getObatReturn(id_resep) {
        $.ajax({
            url: "<?php echo base_url(); ?>Obat_bebas/getNamaObatReturn",
            method: "POST",
            data: {
                id_pelayanan: id_resep
            },
            dataType: 'json',
            success: function(data) {
                var html = '';
                var i;
                html = '<option value="">-</option>';
                for (i = 0; i < data.length; i++) {
                    html += '<option value=' + data[i].id_logistik + '|' + data[i].harga_cost + '|' + data[i].margin + '|' + data[i].kadaluarsa + '|' + data[i].stok + '|' + data[i].total + '|' + data[i].depo + '>' + data[i].nama + '</option>';
                }
                $('#inObat2').html(html);
            }
        });
    }

    function setJumlahObatReturn() {
        obat = $('#inObat2').val();
        splitDiag = obat.split("|");
        stok = (splitDiag[4]);
        total = (splitDiag[5]);
        frek = parseFloat($("#inJumlahObatReturn").val());
        if (frek > stok) {
            $("#inJumlahObatReturn").val(stok);
        } else if (frek < 0) {
            $("#inJumlahObatReturn").val(1);
        }
        $('#outStokReturn').val(stok);
        $("#hargaCost1").val(Number(total) / Number(stok));
        $('#inDepo1').val(splitDiag[6]);
    }

    function insert_Return() {
        id_pelayanan = $('#inPelResep').val();
        id_resep = $('#inResRetur').val();
        jenis_pelayanan = $('#inJenisPelRetur').val();

        //caraBayar = $('#cara_bayar').val();
        a = $("#inObat2").val();
        depo = $("#inDepo1").val();
        splitDiag = a.split("|");
        id_list_tindakan = splitDiag[0];
        harga = splitDiag[1];
        margin = splitDiag[2];
        expire = splitDiag[3];
        harga_cost = $("#hargaCost1").val();
        frek = parseFloat($("#inJumlahObatReturn").val());
        total = (harga_cost * frek) * -1;
        jumlahKurang = frek * -1;
        $.ajax({
            url: "<?= base_url() . 'Poli/insert_Return' ?>",
            method: "POST",
            dataType: 'json',
            cache: true,
            data: {
                id_pelayanan: id_pelayanan,
                id_resep: 'obat_bebas',
                depo: depo,
                margin: margin,

                harga: harga,
                frek: frek,
                jenis_pelayanan: jenis_pelayanan,
                expire: expire,
                jumlahKurang: jumlahKurang,
                total: total,
                id_list_tindakan: id_list_tindakan,
            },
            success: function(data) {
                if (data.status == "success") {
                    $.toast({
                        heading: 'Success!',
                        text: 'Tindakan ini telah ditambah',
                        showHideTransition: 'fade',
                        icon: 'success'
                    });
                    reload_data_obat1(id_pelayanan);
                    getObatReturn(id_pelayanan)
                    $('#formObat1')[0].reset();
                    $('#inObat1').val('-').change();
                    $("#collap_Return").collapse('show');
                    $("#collap_nonracikan").collapse('hide');
                    $("#collap_racikan").collapse('hide');

                } else if (data.status == "error") {
                    swal({
                        title: "Gagal!",
                        type: "warning",
                        text: 'Stok tidak sesuai dengan jumlah permintaan',
                        confirmButtonColor: "#3cb878",
                    });
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

    function reload_data_obat1(id) {
        $('#tableobat1').dataTable().fnClearTable();
        $('#tableobat1').dataTable().fnDestroy();
        $('#tableobat1').DataTable({
            "pageLength": 10,
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
                "url": '<?php echo base_url('Obat_bebas/tampil_tindakan_obat_retur'); ?>',
                "type": 'POST',
                "data": {
                    id: id,
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

    function hapus_obat_retur(id, nama, depo) {
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
                    url: "<?php echo base_url() ?>Poli/hapus_obat",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        id: id,
                        depo: depo
                    },
                    success: function(data) {
                        if (data.status == "success") {
                            $('#tableobat1').DataTable().ajax.reload();
                            swal({
                                title: "good job!",
                                type: "success",
                                text: "Data Berhasil dihapus",
                                confirmButtonColor: "#3cb878",
                            });

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
</script>
<script type="text/javascript">
    function obatBebas() {
        $("#modal_tambah").modal('show');
    }

    function insert() {
        nama = $('#inNama').val();
        cara_bayar = $('#inCaraBayar').val();
        keterangan = $('#inKet').val();
        var d = $('#inDpjp').val();
        splitB = d.split("|");
        dpjp = splitB[1];
        id_dokter = splitB[0];
        if (cara_bayar == '-') {
            swal({
                title: "Gagal!",
                type: "warning",
                text: "Pilih Cara Bayar Terlebih Dahulu!",
                confirmButtonColor: "#3cb878",
            });
        } else {
            $.ajax({
                url: "<?= base_url() . 'Obat_bebas/insert_obat_bebas' ?>",
                method: "POST",
                dataType: 'json',
                data: {
                    nama: nama,
                    cara_bayar: cara_bayar,
                    keterangan: keterangan,
                    dpjp: dpjp,
                    id_dokter: id_dokter
                },
                success: function(data) {
                    if (data.status == "success") {
                        swal({
                            title: "good job!",
                            type: "success",
                            text: "Tindakan ini Telah di Simpan!",
                            confirmButtonColor: "#3cb878",
                        });

                        $("#inNama").val('');
                        $("#modal_tambah").modal('hide');
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
    }
    function edit() {
        nama = $('#upNama').val();
        cara_bayar = $('#upCaraBayar').val();
        keterangan = $('#upKet').val();
        id_obat_bebas = $('#upID').val();
        var d = $('#upDpjp').val();
        splitB = d.split("|");
        dpjp = splitB[1];
        id_dokter = splitB[0];
        if (cara_bayar == '-') {
            swal({
                title: "Gagal!",
                type: "warning",
                text: "Pilih Cara Bayar Terlebih Dahulu!",
                confirmButtonColor: "#3cb878",
            });
        } else {
            $.ajax({
                url: "<?= base_url() . 'Obat_bebas/update_obat_bebas' ?>",
                method: "POST",
                dataType: 'json',
                data: {
                    nama: nama,
                    cara_bayar: cara_bayar,
                    keterangan: keterangan,
                    dpjp: dpjp,
                    id_dokter: id_dokter,
                    id_obat_bebas: id_obat_bebas,
                },
                success: function(data) {
                    if (data.status == "success") {
                        swal({
                            title: "good job!",
                            type: "success",
                            text: "Data berhasil diedit!",
                            confirmButtonColor: "#3cb878",
                        });

                        $("#modal_edit").modal('hide');
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
    }

    function tampilTindakanFarmasi(idPel, cara_bayar, idResep) {
        $('#cara_bayar').val(cara_bayar);
        $('#inPelObat').val(idPel);
        $("#modal_edit_resep").modal('show');
        reload_data_obat(idPel);
        reload_total_obat(idPel);
    }

    function insert_Obat() {
        id_pelayanan = $('#inPelObat').val();
        id_resep = $('#inResObat').val();
        caraBayar = $('#cara_bayar').val();
        a = $("#inObat").val();
        // depo = $("#inDepo").val();
        splitDiag = a.split("|");
        margin = parseFloat(splitDiag[2]);
        ket = $("#inKeteranganObat").val();
        id_list_tindakan = splitDiag[0];
        ppn = parseFloat(splitDiag[1]) * (parseFloat(splitDiag[5]) / 100);
        harga = parseFloat(splitDiag[1]) + ppn;
        // hargaMargin = parseFloat(splitDiag[1]) * parseFloat(splitDiag[2]);

        frek = parseFloat($("#inJumlahObat").val());
        disc = parseFloat($("#inDisc").val());
        expire = (splitDiag[3]);
        jumlahKurang = frek * -1;

        // if (caraBayar === "WA14BJ84") {
        //     total = harga * frek;
        // } else {
        total = (harga * (parseFloat(splitDiag[2]) - (disc / 100))) * frek;
        // }
        signa = $('#inSigna').val();
        cara_pakai = $('#inCaraPakai').val();

        $.ajax({
            url: "<?= base_url() . 'Obat_bebas/insert_tindakan_obat_bebas' ?>",
            method: "POST",
            dataType: 'json',
            cache: false,
            data: {
                id_pelayanan: id_pelayanan,
                id_resep: id_resep,
                // depo: depo,
                margin: margin,
                ket: ket,
                harga: harga,
                frek: frek,
                disc: disc,
                expire: expire,
                jumlahKurang: jumlahKurang,
                total: total,
                id_list_tindakan: id_list_tindakan,
                signa: signa,
                cara_pakai: cara_pakai
            },
            success: function(data) {
                if (data.status == "success") {
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Tindakan ini Telah di Simpan!",
                        confirmButtonColor: "#3cb878",
                    });
                    $('#formObat')[0].reset();
                    // $('#inDepo').val('APOTIK').change();
                    $('#inObat').val('-').change();
                    $('#inTglExp').empty().trigger('change');
                    $("#inKeteranganObat").val('-');
                    $("#inJumlahObat").val('1');
                    $("#inDisc").val(0);
                    $("#outBiayaTindakanObat").val('0');
                    $("#outBiayaMarginObat").val('');
                    $("#outStok").val('0');
                    $("#outTotalObat").val('');
                    reload_data_obat(id_pelayanan);
                    reload_total_obat(id_pelayanan);
                    $("#modal_edit_resep").modal('show');

                    // $("#tambah_obat").load(location.href + " #tambah_obat");

                    $('#tableobat').DataTable().ajax.reload();

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

    function hapus_obat(id, nama) {
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
                    url: "<?php echo base_url() ?>Obat_bebas/hapus_obat",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        id: id,
                    },
                    success: function(data) {
                        if (data.status == "success") {
                            $('#tableobat').DataTable().ajax.reload();
                            swal({
                                title: "good job!",
                                type: "success",
                                text: "Data Berhasil dihapus",
                                confirmButtonColor: "#3cb878",
                            });

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

    function hapus_tindakan(id, nama) {
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
                    url: "<?php echo base_url() ?>Obat_bebas/hapus_tindakan",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        id: id,
                    },
                    success: function(data) {
                        if (data.status == "success") {
                            $('#datable').DataTable().ajax.reload();
                            swal({
                                title: "good job!",
                                type: "success",
                                text: "Data Berhasil dihapus",
                                confirmButtonColor: "#3cb878",
                            });

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

    function cetakSigna(id, id_resep) {
        $('#inResObat1').val(id);
        $("#collap_signa").collapse('show');
        reload_data_obat(id_resep);
        reload_total_obat(id_resep);
    }

    function edit_obat(id, id_pelayanan) {
        $.ajax({
            url: "<?= base_url() . 'Obat_bebas/getDataObat' ?>",
            method: "POST",
            dataType: 'json',
            data: {
                id_tindakan: id
            },
            success: function(data) {
                if (data.status_dt == "found") {
                    //$('#inDepo1').val(data.depo);
                    $('#inObat1').val(data.nama);
                    $('#inTglExp1').val(data.kadaluarsa);
                    $("#inJumlahObat1").val(data.frek);
                    harga = Number(data.harga) * Number(data.margin);
                    $("#hargaCost").val(harga);
                    $("#idTindakan").val(id);
                    $("#collap_obat_edit").collapse('show');
                } else {
                    alert("data tidak ditemukan");
                }
            }
        });
    }

    function setHarga1() {
        frek = $("#inJumlahObat1").val();
        harga = $("#hargaCost").val();
        total = harga * frek;
        $("#outTotalObat1").val(convertToRupiah(total));
    }

    function edit_Obat() {
        jumlah = $("#inJumlahObat1").val();
        id = $("#idTindakan").val();
        harga = $("#hargaCost").val();
        total = harga * jumlah;
        //depo = $('#inDepo1').val();
        $.ajax({
            url: "<?= base_url() . 'Obat_bebas/update_obat' ?>",
            method: "POST",
            dataType: 'json',
            data: {
                id: id,
                jumlah: jumlah,

                total: total
            },
            success: function(data) {
                if (data.status == "success") {
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Tindakan ini Telah di Simpan!",
                        confirmButtonColor: "#3cb878",
                    });
                    $('#inObat1').val('');
                    $('#inTglExp1').val('');
                    $("#inJumlahObat1").val('');
                    $("#hargaCost").val('');
                    $("#idTindakan").val('');
                    $("#collap_nonracikan").collapse('show');
                    $("#collap_obat_edit").collapse('hide');
                    $("#collap_racikan").collapse('show');
                    $('#tableobat').DataTable().ajax.reload();
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

    function cetakSigna1() {
        id_pelayanan = $('#inPelObat').val();
        window.location.href = '<?= base_url('Obat_bebas/') ?>cetak_signa_bebas/' + id_pelayanan;
    }

    function cetak_retur() {
        id_history = $('#inHisResep').val();
        id_resep = $('#inResRetur').val();
        window.open('<?= base_url('Obat_bebas/') ?>print_retur/' + id_resep);
    }

    function batalSigna() {
        $("#collap_signa").collapse('hide');
    }

    function cetak() {
        id = $('#inPelObat').val();
        window.location.href = '<?= base_url('Obat_bebas/') ?>print_obat_bebas/' + id;
    }

    function cetak_resep() {
        id_pelayanan = $('#inPelObat').val();
        window.location.href = '<?= base_url('Obat_bebas/') ?>print_resep/' + id_pelayanan;
    }

    function simpan() {
        id_resep = $('#inResObat').val();
        $.ajax({
            url: "<?php echo base_url() ?>Apotik/cetak_resep",
            method: "POST",
            dataType: 'json',
            data: {
                id_resep: id_resep,
            },
            success: function(data) {
                if (data.status == "success") {
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Tindakan ini Telah di Simpan!",
                        confirmButtonColor: "#3cb878",
                    });
                    $("#modal_edit_resep").modal('hide');
                    $("#collap_nonracikan").collapse('hide');
                    $("#collap_racikan").collapse('hide');
                    $("#collap_obat").collapse('hide');
                    reload_data_resep(idPel, idHis);
                } else {
                    swal({
                        title: "Gagal!",
                        text: data.error,
                        type: "warning",
                        confirmButtonColor: "#3cb878",
                    });
                }
            }

        });
        return false;
    }

    // function tambah_obat() {
    //     $("#tambah_obat").collapse('show');
    // }

    function batalFarmasi() {
        $("#collap_obat_edit").collapse('hide');
    }

    // function batalObat() {
    //     $("#tambah_obat").collapse('hide');
    // }

    function tampilSelisih() {
        tersedia = parseFloat($("#outStok").val());
        asli = parseFloat($("#inJumlahObat").val());
        selisih = asli - tersedia;
        $("#inSelisih").val(selisih);
    }



    function convertToRupiah(angka) {
        var rupiah = '';
        var angkarev = angka.toString().split('').reverse().join('');
        for (var i = 0; i < angkarev.length; i++)
            if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + '.';
        return 'Rp. ' + rupiah.split('', rupiah.length - 1).reverse().join('');
    }

    function setHarga() {

        caraBayar = $('#cara_bayar').val();;
        obat = $('#inObat').val();
        splitDiag = obat.split("|");
        stok = (splitDiag[4]);
        disc = parseFloat($("#inDisc").val());
        if (disc > 35) {
            disc = 35;
        }
        if (caraBayar == "WA14BJ84") {
            disc = 0;
        }

        $("#inDisc").val(disc);


        $("#outStok").val(stok);


        ppn = parseFloat(splitDiag[1]) * (parseFloat(splitDiag[5]) / 100);
        harga = parseFloat(splitDiag[1]) + ppn;
        hargaMargin = harga * parseFloat(splitDiag[2]);
        $("#outBiayaTindakanObat").val(convertToRupiah(harga.toFixed(0)));
        $("#outBiayaMarginObat").val(convertToRupiah(hargaMargin.toFixed(0)));

        frek = parseFloat($("#inJumlahObat").val());
        if (frek > stok) {
            $("#inJumlahObat").val(stok);
        } else if (frek < 0) {
            $("#inJumlahObat").val(1);
        }
        frek = parseFloat($("#inJumlahObat").val());

        // 		  if (document.getElementById('inRadioCost').checked ) {
        // if (caraBayar === "WA14BJ84") {
        //     total = harga * frek;
        // } else {
        total = (harga * (parseFloat(splitDiag[2]) - (disc / 100))) * frek;
        //}

        $("#outTotalObat").val(convertToRupiah(total.toFixed(0)));

    }

    function reload_total_obat(id_pelayanan) {
        $('#outTotalHargaObat').dataTable().fnClearTable();
        $('#outTotalHargaObat').dataTable().fnDestroy();
        $('#outTotalHargaObat').DataTable({
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
                "url": '<?php echo base_url('Obat_bebas/tampil_total_obat'); ?>',
                "type": 'POST',
                "data": {
                    id_pelayanan: id_pelayanan
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


    function reload_data_obat(id) {
        $('#tableobat').dataTable().fnClearTable();
        $('#tableobat').dataTable().fnDestroy();
        $('#tableobat').DataTable({
            "pageLength": 10,
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
                "url": '<?php echo base_url('Obat_bebas/tampil_tindakan_obat_bebas'); ?>',
                "type": 'POST',
                "data": {
                    id: id,
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
            "ajax": '<?php echo base_url('Obat_bebas/Tampil_obat_bebas'); ?>',
            "deferRender": true,
            "processing": true,
            "order": [],
            "columnDefs": [{
                "targets": [0],
                "orderable": false,
            }, ],

        });
    });

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
                "url": '<?= base_url('Obat_bebas/Tampil_obat_bebas'); ?>',
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

=======
<!-- Row -->
<div class="panel panel-default card-view mt-20 ">
    <div class="panel-heading">
        <div class="pull-left">
            <h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">PEMBELIAN OBAT BEBAS</span></h6>
        </div>
        <div align="right">
            <div class="btn btn-primary btn-anim btn-sm " onclick="obatBebas()" style="margin-right: 40px;"><i class="icon-rocket"></i><span class="btn-text">PEMBELIAN OBAT BEBAS</span>
                <div></div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row mt-30">
            <div class="col-md-12">
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
    <h6 class="panel-title txt-dark mt-10"><?= $this->session->flashdata('alert'); ?></h6>
    <div class="panel-wrapper collapse in">
        <div class="panel-body">
            <div class="table-wrap">
                <div class="table-responsive">
                    <table id="datable" class="table table-hover display pb-30">
                        <thead>
                            <tr class="bg-success">
                                <th>NO</th>
                                <th>TINDAKAN OBAT</th>
                                <th>RETUR</th>
                                <th>EDIT</th>
                                <th>HAPUS</th>
                                <th>TANGGAL PELAYANAN</th>
                                <th>JAM PELAYANAN</th>
                                <th>NAMA PASIEN</th>
                                <th>JENIS KLAIM</th>
                                <th>DOKTER</th>
                                <th>KETERANGAN</th>

                            </tr>
                        </thead>

                        <tfoot>
                            <tr class="bg-success">
                                <th>NO</th>
                                <th>TINDAKAN OBAT</th>
                                <th>RETUR</th>
                                <th>EDIT</th>
                                <th>HAPUS</th>
                                <th>TANGGAL PELAYANAN</th>
                                <th>JAM PELAYANAN</th>
                                <th>NAMA PASIEN</th>
                                <th>JENIS KLAIM</th>
                                <th>DOKTER</th>
                                <th>KETERANGAN</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="panel-wrapper collapse in">
    <div class="panel-body">
        <!-- sample modal content -->
        <div class="modal fade" id="modal_tambah" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h5 class="modal-title mt-10" id="myLargeModalLabel"><i class="icon-user mr-10"></i> PELAYANAN TAMBAHAN
                        </h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-body">
                            <h6 class="txt-dark capitalize-font"><i class="icon-user mr-10"></i>PELAYANAN TAMBAHAN</h6>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">NAMA</label>
                                        <div class="col-md-9 has-success">
                                            <input type="text" class="form-control rounded-input" autocomplete="off" placeholder="NAMA" id="inNama">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">JENIS KLAIM</label>
                                        <div class="col-md-9 has-success">
                                            <select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" id="inCaraBayar" name="inCaraBayar">
                                                <option value="-">-</option>
                                                <?php
                                                foreach ($cara_bayar as $row) {

                                                ?>
                                                    <option value="<?php echo $row["id_cara_bayar"]; ?>">
                                                        <?php echo  $row["nama"]; ?></option>
                                                <?php }  ?>
                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">DOKTER</label>
                                        <div class="col-md-9 has-success">
                                            <select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" id="inDpjp" name="inDpjp">
                                                <option value="-">-</option>
                                                <?php
                                                foreach ($dokter as $row) {

                                                ?>
                                                    <option value="<?php echo $row["id_dokter"] . "|" . $row["nama"]; ?>">
                                                        <?php echo  $row["nama"]; ?></option>
                                                <?php }  ?>
                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">KETERANGAN</label>
                                        <div class="col-md-9 has-success">

                                            <textarea class="form-control" rows="5" cols="30" id="inKet"></textarea>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>

                            </div>


                        </div>
                        <div class="form-actions mt-10">
                            <div class="form-actions mt-10">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">
                                                <button type="submit" class="btn btn-success btn-rounded mr-10" onclick="insert()">Submit</button>
                                                <span></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6"> </div>
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
</div>
<div class="panel-wrapper collapse in">
    <div class="panel-body">
        <!-- sample modal content -->
        <div class="modal fade" id="modal_edit" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h5 class="modal-title mt-10" id="myLargeModalLabel"><i class="icon-user mr-10"></i> PELAYANAN TAMBAHAN
                        </h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-body">
                            <h6 class="txt-dark capitalize-font"><i class="icon-user mr-10"></i>PELAYANAN TAMBAHAN</h6>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">NAMA</label>
                                        <div class="col-md-9 has-success">
                                            <input type="text" class="form-control rounded-input" autocomplete="off" placeholder="NAMA" id="upNama">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">JENIS KLAIM</label>
                                        <div class="col-md-9 has-success">
                                            <select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" id="upCaraBayar" name="upCaraBayar">
                                                <option value="-">-</option>
                                                <?php
                                                foreach ($cara_bayar as $row) {

                                                ?>
                                                    <option value="<?php echo $row["id_cara_bayar"]; ?>">
                                                        <?php echo  $row["nama"]; ?></option>
                                                <?php }  ?>
                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">DOKTER</label>
                                        <div class="col-md-9 has-success">
                                            <select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" id="upDpjp" name="upDpjp">
                                                <option value="-">-</option>
                                                <?php
                                                foreach ($dokter as $row) {

                                                ?>
                                                    <option value="<?php echo $row["id_dokter"] . "|" . $row["nama"]; ?>">
                                                        <?php echo  $row["nama"]; ?></option>
                                                <?php }  ?>
                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">KETERANGAN</label>
                                        <div class="col-md-9 has-success">

                                            <textarea class="form-control" rows="5" cols="30" id="upKet"></textarea>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>

                            </div>


                        </div>
                        <div class="form-actions mt-10">
                            <div class="form-actions mt-10">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">
                                                <input type="hidden" id="upID">
                                                <button type="submit" class="btn btn-success btn-rounded mr-10" onclick="edit()">EDIT</button>
                                                <span></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6"> </div>
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
</div>
<!-- modal edit data -->
<div class="panel-wrapper collapse in">
    <div class="panel-body">
        <div class="modal fade bs-example-modal-lg" id="modal_edit_resep" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h5 class="modal-title" id="myLargeModalLabel"><i class="icon-user mr-10"></i> OBAT
                        </h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-wrap">
                            <!-- /formbody -->
                            <form id="formObat">
                                <h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO OBAT
                                </h6>
                                <hr width="95%">
                                <!-- <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">DEPO</label>
                                            <div class="col-md-9 has-success">
                                                <select class="form-control filled-input select2" id="inDepo">
                                                    <option value="APOTIK">APOTIK</option>
                                                    <option value="IGD">IGD</option>
                                                    <option value="RANAP">RANAP</option>
                                                </select>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">NAMA OBAT</label>
                                            <div class="col-md-9 has-success">
                                                <select class="form-control filled-input select2" id="inObat" onchange="setHarga()">
                                                    <option value="-">-</option>
                                                    <?php

                                                    foreach ($obat as $row) {

                                                    ?>
                                                        <option value="<?php echo $row["id_logistik"] . '|' . $row["harga_cost"] . '|' . $row["margin"] . '|' . $row["kadaluarsa"] . '|' . $row["stok"] . '|' . $row["ppn"]; ?>"><?php echo $row["nama"]; ?></option>
                                                    <?php
                                                    }
                                                    ?>

                                                </select>
                                                <span class="help-block"></span>
                                            </div>

                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6 " id="outTglExp">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">EXPIRED DATE</label>
                                            <div class="col-md-9 has-success">
                                                <input type="text" class="form-control " id="inTglExp" disabled="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">JUMLAH STOK</label>
                                            <div class="col-md-9 has-error">
                                                <input type="number" class="form-control " id="outStok" value="0" disabled="">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">JUMLAH OBAT</label>
                                            <div class="col-md-9 has-success">
                                                <input type="number" class="form-control " id="inJumlahObat" placeholder="jumlah" value="1" oninput="setHarga()">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">DISCOUNT</label>
                                            <div class="col-md-3 has-success">
                                                <input type="number" placeholder="Disc" max="35" class="form-control" id="inDisc" value="0" oninput="setHarga()">
                                            </div>
                                            <div class="col-md-1">
                                                %
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">HARGA HNA+PPN</label>
                                            <div class="col-md-9 has-error">
                                                <input type="text" class="form-control" disabled="" id="outBiayaTindakanObat">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">HARGA + MARGIN</label>
                                            <div class="col-md-9 has-error">
                                                <input type="text" class="form-control" disabled="" id="outBiayaMarginObat">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- span -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">TOTAL HARGA</label>
                                            <div class="col-md-9 has-success">
                                                <input type="text" class="form-control" disabled="" id="outTotalObat">

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">KETERANGAN</label>
                                            <div class="col-md-9 has-success">
                                                <textarea class="form-control" rows="2" style="resize:none" id="inKeteranganObat">-</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 10px;" id="cetakSigna">

                                    <div class="col-md-6">
                                        <label class="control-label col-md-3">SIGNA OBAT</label>
                                        <div class="col-md-9 has-success">
                                            <select class="form-control filled-input rounded-input select2" id="inSigna">

                                                <?php
                                                foreach ($signa as $row) {

                                                ?>
                                                    <option value="<?php echo $row["id_signa"]; ?>"> <?php echo $row["tindakan"]; ?> </option>
                                                <?php
                                                }
                                                ?>

                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                        <input type="hidden" class="form-control" id="inResObat1">
                                        <div class="col-md-offset-3 col-md-9">
                                            <span></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="control-label col-md-3">CARA PAKAI OBAT</label>
                                        <div class="col-md-9 has-success">
                                            <select class="form-control filled-input rounded-input select2" id="inCaraPakai">
                                                <option value="-">-</option>
                                                <?php
                                                foreach ($cara_pemakaian_obat as $row) {

                                                ?>
                                                    <option value="<?php echo $row["id_cara_pemakaian"]; ?>"> <?php echo $row["cara_pemakaian"]; ?> </option>
                                                <?php
                                                }
                                                ?>

                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" class="form-control" disabled="" id="cara_bayar">
                                <input type="hidden" class="form-control" id="inPelObat">
                                <!-- <input type="hidden" class="form-control" id="inResObat"> -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">
                                                <div type="submit" class="btn btn-success mr-10" onclick="insert_Obat()">SIMPAN</div>
                                                <!-- <div id="batalFarmasi" onclick="batalObat()" class="btn btn-danger ">BATAL</div> -->
                                                <span></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6"> </div>
                                </div>
                            </form>
                            <div class="collapse" id="collap_obat_edit">
                                <div class="form-body">
                                    <h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO OBAT
                                    </h6>
                                    <hr width="95%">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group ">
                                                <label class="control-label col-md-3">NAMA OBAT</label>
                                                <div class="col-md-9 has-success">
                                                    <input type="text" class="form-control " id="inObat1" disabled="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group ">
                                                <label class="control-label col-md-3">EXPIRED DATE</label>
                                                <div class="col-md-9 has-success">
                                                    <input type="text" class="form-control " id="inTglExp1" disabled="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group ">
                                                <label class="control-label col-md-3">JUMLAH OBAT</label>
                                                <div class="col-md-9 has-success">
                                                    <input type="number" class="form-control " id="inJumlahObat1" placeholder="jumlah" value="1" oninput="setHarga1()">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">TOTAL HARGA</label>
                                                <div class="col-md-9 has-success">
                                                    <input type="text" class="form-control" disabled="" id="outTotalObat1">

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <input type="hidden" class="form-control" id="idTindakan">
                                    <input type="hidden" class="form-control" id="hargaCost">
                                    <!-- <input type="hidden" class="form-control" id="inDepo1"> -->
                                    <div class="form-actions mt-10">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-offset-3 col-md-9">
                                                        <div type="submit" class="btn btn-success mr-10" onclick="edit_Obat()">SIMPAN</div>
                                                        <!-- <div id="batalFarmasi" onclick="batalFarmasi()" class="btn btn-danger ">BATAL</div> -->
                                                        <span></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6"> </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions mt-10">
                                <div class="row ">
                                    <h6 class="txt-dark capitalize-font pl-20"><i class="icon-list mr-10"></i>TINDAKAN</h6>
                                    <hr width="95%">
                                    <!-- <div type="submit" class="btn btn-success mr-10" style="margin-left: 40px;" onclick="tambah_obat()">TAMBAH OBAT</div> -->
                                    <div id="cetakFarmasi" onclick="cetak()" class="btn btn-primary mr-10" style="margin-left: 40px;">CETAK</div>
                                    <div id="cetakFarmasi" onclick="cetakSigna1()" class="btn btn-success mr-10">CETAK SIGNA</div>
                                    <div id="cetakFarmasi" onclick="cetak_resep()" class="btn btn-sm btn-success mr-10">CETAK RESEP</div>
                                    <div class="table-wrap" style="width: 100%; margin: auto ">
                                        <div class="table-responsive">
                                            <table class="table table-hover display  pb-60" id="tableobat">
                                                <thead>
                                                    <tr class="bg-success">
                                                        <th>NO</th>
                                                        <th>EDIT</th>
                                                        <th>HAPUS</th>
                                                        <th>NAMA OBAT</th>
                                                        <th>EXPIRE DATE</th>
                                                        <th>HARGA OBAT</th>
                                                        <th>JUMLAH OBAT</th>
                                                        <th>DEPO</th>
                                                        <th>TOTAL BIAYA</th>
                                                        <th>KETERANGAN</th>
                                                        <th>NAMA STAFF</th>
                                                        <th>SIGNA</th>
                                                    </tr>
                                                </thead>
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
                                            <!-- <p id="notif_load" style="color:red;">Loading data, Please wait</p> -->
                                            <div class="table-responsive ">
                                                <table class="table table-hover display " id="outTotalHargaObat">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="panel-wrapper collapse in">
    <div class="panel-body">
        <div class="modal fade bs-example-modal-lg" id="collap_Return" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h5 class="modal-title" id="myLargeModalLabel"><i class="icon-user mr-10"></i> OBAT
                        </h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-wrap">

                            <div class="form-body">
                                <h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO OBAT
                                </h6>
                                <hr width="95%">
                                <form id="formObat1">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group ">
                                                <label class="control-label col-md-3">NAMA OBAT</label>
                                                <div class="col-md-9 has-success">
                                                    <select class="form-control filled-input select2" id="inObat2" onchange="setJumlahObatReturn()">

                                                    </select>
                                                    <span class="help-block"></span>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group ">
                                                <label class="control-label col-md-3">JUMLAH STOK</label>
                                                <div class="col-md-9 has-error">
                                                    <input type="number" class="form-control " id="outStokReturn" value="0" disabled="">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group ">
                                                <label class="control-label col-md-3">JUMLAH OBAT</label>
                                                <div class="col-md-9 has-success">
                                                    <input type="number" class="form-control " id="inJumlahObatReturn" placeholder="jumlah" value="1" oninput="setJumlahObatReturn()">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- <input type="hidden" class="form-control" disabled="" id="cara_bayar"> -->
                            <input type="hidden" class="form-control" id="inPelResep">
                            <input type="hidden" class="form-control" id="inHisResep">
                            <input type="hidden" class="form-control" id="hargaCost1">
                            <input type="hidden" class="form-control" id="inDepo1">
                            <input type="text" class="form-control" id="inResRetur">
                            <input type="hidden" class="form-control" id="inJenisPelRetur">

                            <div class="form-actions mt-10">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">
                                                <div type="submit" class="btn btn-success mr-10" onclick="insert_Return()">SIMPAN</div>

                                                <span></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6"> </div>
                                </div>
                            </div>
                            <div class="row ">
                                <h6 class="txt-dark capitalize-font pl-20"><i class="icon-list mr-10"></i>TINDAKAN</h6>
                                <hr width="95%">
                                <div id="cetakFarmasi" onclick="cetak_retur()" class="btn btn-primary mr-10" style="margin-left: 40px;">CETAK NOTA</div>

                                <div class="table-wrap" style="width: 100%; margin: auto ">
                                    <div class="table-responsive">
                                        <table class="table table-hover display  pb-60" id="tableobat1">
                                            <thead>
                                                <tr class="bg-success">
                                                    <th>NO</th>
                                                    <th>NAMA OBAT</th>
                                                    <th>EXPIRE DATE</th>
                                                    <th>HARGA OBAT</th>
                                                    <th>JUMLAH OBAT</th>
                                                    <th>DEPO</th>
                                                    <th>TOTAL BIAYA</th>
                                                    <th>KETERANGAN</th>
                                                    <th>NAMA STAFF</th>
                                                    <th>HAPUS</th>
                                                </tr>
                                            </thead>
                                            <tbody style="color: black">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <span class="help-block"></span>
                            <div align="right">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">
                                                <div id="batalFarmasi" onclick="batalFarmasi()" class="btn btn-danger ">BATAL</div>

                                                <span></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6"> </div>
                                </div>

                            </div>
                            </hr>


                        </div>
                    </div>
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
    function edit_data(id_pelayanan) {
        $.ajax({
            url: "<?= base_url() . 'Obat_bebas/getDataPasien' ?>",
            data: {
                pelayanan: id_pelayanan,
            },
            type: 'POST',
            dataType: 'json',
            success: function(data) {
                if (data.status_dt == "found") {
                    
                    $("#upCaraBayar").val(data.cara_bayar).change();
                    $("#upDpjp").val(data.id_dokter +"|"+data.dpjp).change();

                    $("#upNama").val(data.nama);
                    $("#upKet").val(data.keterangan);
                    $("#upID").val(data.id_obat_bebas);
                    $("#modal_edit").modal('show');
                } else {
                    alert("data tidak ditemukan");
                }
            }
        });
    }

    function edit_data_tindakan(id_pelayanan) {
        getObatReturn(id_pelayanan);
        reload_data_obat1(id_pelayanan);

        $('#inPelResep').val(id_pelayanan);
        $('#inResRetur').val(id_pelayanan);
        $('#inJenisPelRetur').val('BEBAS');
        $("#collap_Return").modal('toggle');

    }

    function getObatReturn(id_resep) {
        $.ajax({
            url: "<?php echo base_url(); ?>Obat_bebas/getNamaObatReturn",
            method: "POST",
            data: {
                id_pelayanan: id_resep
            },
            dataType: 'json',
            success: function(data) {
                var html = '';
                var i;
                html = '<option value="">-</option>';
                for (i = 0; i < data.length; i++) {
                    html += '<option value=' + data[i].id_logistik + '|' + data[i].harga_cost + '|' + data[i].margin + '|' + data[i].kadaluarsa + '|' + data[i].stok + '|' + data[i].total + '|' + data[i].depo + '>' + data[i].nama + '</option>';
                }
                $('#inObat2').html(html);
            }
        });
    }

    function setJumlahObatReturn() {
        obat = $('#inObat2').val();
        splitDiag = obat.split("|");
        stok = (splitDiag[4]);
        total = (splitDiag[5]);
        frek = parseFloat($("#inJumlahObatReturn").val());
        if (frek > stok) {
            $("#inJumlahObatReturn").val(stok);
        } else if (frek < 0) {
            $("#inJumlahObatReturn").val(1);
        }
        $('#outStokReturn').val(stok);
        $("#hargaCost1").val(Number(total) / Number(stok));
        $('#inDepo1').val(splitDiag[6]);
    }

    function insert_Return() {
        id_pelayanan = $('#inPelResep').val();
        id_resep = $('#inResRetur').val();
        jenis_pelayanan = $('#inJenisPelRetur').val();

        //caraBayar = $('#cara_bayar').val();
        a = $("#inObat2").val();
        depo = $("#inDepo1").val();
        splitDiag = a.split("|");
        id_list_tindakan = splitDiag[0];
        harga = splitDiag[1];
        margin = splitDiag[2];
        expire = splitDiag[3];
        harga_cost = $("#hargaCost1").val();
        frek = parseFloat($("#inJumlahObatReturn").val());
        total = (harga_cost * frek) * -1;
        jumlahKurang = frek * -1;
        $.ajax({
            url: "<?= base_url() . 'Poli/insert_Return' ?>",
            method: "POST",
            dataType: 'json',
            cache: true,
            data: {
                id_pelayanan: id_pelayanan,
                id_resep: 'obat_bebas',
                depo: depo,
                margin: margin,

                harga: harga,
                frek: frek,
                jenis_pelayanan: jenis_pelayanan,
                expire: expire,
                jumlahKurang: jumlahKurang,
                total: total,
                id_list_tindakan: id_list_tindakan,
            },
            success: function(data) {
                if (data.status == "success") {
                    $.toast({
                        heading: 'Success!',
                        text: 'Tindakan ini telah ditambah',
                        showHideTransition: 'fade',
                        icon: 'success'
                    });
                    reload_data_obat1(id_pelayanan);
                    getObatReturn(id_pelayanan)
                    $('#formObat1')[0].reset();
                    $('#inObat1').val('-').change();
                    $("#collap_Return").collapse('show');
                    $("#collap_nonracikan").collapse('hide');
                    $("#collap_racikan").collapse('hide');

                } else if (data.status == "error") {
                    swal({
                        title: "Gagal!",
                        type: "warning",
                        text: 'Stok tidak sesuai dengan jumlah permintaan',
                        confirmButtonColor: "#3cb878",
                    });
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

    function reload_data_obat1(id) {
        $('#tableobat1').dataTable().fnClearTable();
        $('#tableobat1').dataTable().fnDestroy();
        $('#tableobat1').DataTable({
            "pageLength": 10,
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
                "url": '<?php echo base_url('Obat_bebas/tampil_tindakan_obat_retur'); ?>',
                "type": 'POST',
                "data": {
                    id: id,
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

    function hapus_obat_retur(id, nama, depo) {
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
                    url: "<?php echo base_url() ?>Poli/hapus_obat",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        id: id,
                        depo: depo
                    },
                    success: function(data) {
                        if (data.status == "success") {
                            $('#tableobat1').DataTable().ajax.reload();
                            swal({
                                title: "good job!",
                                type: "success",
                                text: "Data Berhasil dihapus",
                                confirmButtonColor: "#3cb878",
                            });

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
</script>
<script type="text/javascript">
    function obatBebas() {
        $("#modal_tambah").modal('show');
    }

    function insert() {
        nama = $('#inNama').val();
        cara_bayar = $('#inCaraBayar').val();
        keterangan = $('#inKet').val();
        var d = $('#inDpjp').val();
        splitB = d.split("|");
        dpjp = splitB[1];
        id_dokter = splitB[0];
        if (cara_bayar == '-') {
            swal({
                title: "Gagal!",
                type: "warning",
                text: "Pilih Cara Bayar Terlebih Dahulu!",
                confirmButtonColor: "#3cb878",
            });
        } else {
            $.ajax({
                url: "<?= base_url() . 'Obat_bebas/insert_obat_bebas' ?>",
                method: "POST",
                dataType: 'json',
                data: {
                    nama: nama,
                    cara_bayar: cara_bayar,
                    keterangan: keterangan,
                    dpjp: dpjp,
                    id_dokter: id_dokter
                },
                success: function(data) {
                    if (data.status == "success") {
                        swal({
                            title: "good job!",
                            type: "success",
                            text: "Tindakan ini Telah di Simpan!",
                            confirmButtonColor: "#3cb878",
                        });

                        $("#inNama").val('');
                        $("#modal_tambah").modal('hide');
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
    }
    function edit() {
        nama = $('#upNama').val();
        cara_bayar = $('#upCaraBayar').val();
        keterangan = $('#upKet').val();
        id_obat_bebas = $('#upID').val();
        var d = $('#upDpjp').val();
        splitB = d.split("|");
        dpjp = splitB[1];
        id_dokter = splitB[0];
        if (cara_bayar == '-') {
            swal({
                title: "Gagal!",
                type: "warning",
                text: "Pilih Cara Bayar Terlebih Dahulu!",
                confirmButtonColor: "#3cb878",
            });
        } else {
            $.ajax({
                url: "<?= base_url() . 'Obat_bebas/update_obat_bebas' ?>",
                method: "POST",
                dataType: 'json',
                data: {
                    nama: nama,
                    cara_bayar: cara_bayar,
                    keterangan: keterangan,
                    dpjp: dpjp,
                    id_dokter: id_dokter,
                    id_obat_bebas: id_obat_bebas,
                },
                success: function(data) {
                    if (data.status == "success") {
                        swal({
                            title: "good job!",
                            type: "success",
                            text: "Data berhasil diedit!",
                            confirmButtonColor: "#3cb878",
                        });

                        $("#modal_edit").modal('hide');
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
    }

    function tampilTindakanFarmasi(idPel, cara_bayar, idResep) {
        $('#cara_bayar').val(cara_bayar);
        $('#inPelObat').val(idPel);
        $("#modal_edit_resep").modal('show');
        reload_data_obat(idPel);
        reload_total_obat(idPel);
    }

    function insert_Obat() {
        id_pelayanan = $('#inPelObat').val();
        id_resep = $('#inResObat').val();
        caraBayar = $('#cara_bayar').val();
        a = $("#inObat").val();
        // depo = $("#inDepo").val();
        splitDiag = a.split("|");
        margin = parseFloat(splitDiag[2]);
        ket = $("#inKeteranganObat").val();
        id_list_tindakan = splitDiag[0];
        ppn = parseFloat(splitDiag[1]) * (parseFloat(splitDiag[5]) / 100);
        harga = parseFloat(splitDiag[1]) + ppn;
        // hargaMargin = parseFloat(splitDiag[1]) * parseFloat(splitDiag[2]);

        frek = parseFloat($("#inJumlahObat").val());
        disc = parseFloat($("#inDisc").val());
        expire = (splitDiag[3]);
        jumlahKurang = frek * -1;

        // if (caraBayar === "WA14BJ84") {
        //     total = harga * frek;
        // } else {
        total = (harga * (parseFloat(splitDiag[2]) - (disc / 100))) * frek;
        // }
        signa = $('#inSigna').val();
        cara_pakai = $('#inCaraPakai').val();

        $.ajax({
            url: "<?= base_url() . 'Obat_bebas/insert_tindakan_obat_bebas' ?>",
            method: "POST",
            dataType: 'json',
            cache: false,
            data: {
                id_pelayanan: id_pelayanan,
                id_resep: id_resep,
                // depo: depo,
                margin: margin,
                ket: ket,
                harga: harga,
                frek: frek,
                disc: disc,
                expire: expire,
                jumlahKurang: jumlahKurang,
                total: total,
                id_list_tindakan: id_list_tindakan,
                signa: signa,
                cara_pakai: cara_pakai
            },
            success: function(data) {
                if (data.status == "success") {
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Tindakan ini Telah di Simpan!",
                        confirmButtonColor: "#3cb878",
                    });
                    $('#formObat')[0].reset();
                    // $('#inDepo').val('APOTIK').change();
                    $('#inObat').val('-').change();
                    $('#inTglExp').empty().trigger('change');
                    $("#inKeteranganObat").val('-');
                    $("#inJumlahObat").val('1');
                    $("#inDisc").val(0);
                    $("#outBiayaTindakanObat").val('0');
                    $("#outBiayaMarginObat").val('');
                    $("#outStok").val('0');
                    $("#outTotalObat").val('');
                    reload_data_obat(id_pelayanan);
                    reload_total_obat(id_pelayanan);
                    $("#modal_edit_resep").modal('show');

                    // $("#tambah_obat").load(location.href + " #tambah_obat");

                    $('#tableobat').DataTable().ajax.reload();

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

    function hapus_obat(id, nama) {
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
                    url: "<?php echo base_url() ?>Obat_bebas/hapus_obat",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        id: id,
                    },
                    success: function(data) {
                        if (data.status == "success") {
                            $('#tableobat').DataTable().ajax.reload();
                            swal({
                                title: "good job!",
                                type: "success",
                                text: "Data Berhasil dihapus",
                                confirmButtonColor: "#3cb878",
                            });

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

    function hapus_tindakan(id, nama) {
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
                    url: "<?php echo base_url() ?>Obat_bebas/hapus_tindakan",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        id: id,
                    },
                    success: function(data) {
                        if (data.status == "success") {
                            $('#datable').DataTable().ajax.reload();
                            swal({
                                title: "good job!",
                                type: "success",
                                text: "Data Berhasil dihapus",
                                confirmButtonColor: "#3cb878",
                            });

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

    function cetakSigna(id, id_resep) {
        $('#inResObat1').val(id);
        $("#collap_signa").collapse('show');
        reload_data_obat(id_resep);
        reload_total_obat(id_resep);
    }

    function edit_obat(id, id_pelayanan) {
        $.ajax({
            url: "<?= base_url() . 'Obat_bebas/getDataObat' ?>",
            method: "POST",
            dataType: 'json',
            data: {
                id_tindakan: id
            },
            success: function(data) {
                if (data.status_dt == "found") {
                    //$('#inDepo1').val(data.depo);
                    $('#inObat1').val(data.nama);
                    $('#inTglExp1').val(data.kadaluarsa);
                    $("#inJumlahObat1").val(data.frek);
                    harga = Number(data.harga) * Number(data.margin);
                    $("#hargaCost").val(harga);
                    $("#idTindakan").val(id);
                    $("#collap_obat_edit").collapse('show');
                } else {
                    alert("data tidak ditemukan");
                }
            }
        });
    }

    function setHarga1() {
        frek = $("#inJumlahObat1").val();
        harga = $("#hargaCost").val();
        total = harga * frek;
        $("#outTotalObat1").val(convertToRupiah(total));
    }

    function edit_Obat() {
        jumlah = $("#inJumlahObat1").val();
        id = $("#idTindakan").val();
        harga = $("#hargaCost").val();
        total = harga * jumlah;
        //depo = $('#inDepo1').val();
        $.ajax({
            url: "<?= base_url() . 'Obat_bebas/update_obat' ?>",
            method: "POST",
            dataType: 'json',
            data: {
                id: id,
                jumlah: jumlah,

                total: total
            },
            success: function(data) {
                if (data.status == "success") {
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Tindakan ini Telah di Simpan!",
                        confirmButtonColor: "#3cb878",
                    });
                    $('#inObat1').val('');
                    $('#inTglExp1').val('');
                    $("#inJumlahObat1").val('');
                    $("#hargaCost").val('');
                    $("#idTindakan").val('');
                    $("#collap_nonracikan").collapse('show');
                    $("#collap_obat_edit").collapse('hide');
                    $("#collap_racikan").collapse('show');
                    $('#tableobat').DataTable().ajax.reload();
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

    function cetakSigna1() {
        id_pelayanan = $('#inPelObat').val();
        window.location.href = '<?= base_url('Obat_bebas/') ?>cetak_signa_bebas/' + id_pelayanan;
    }

    function cetak_retur() {
        id_history = $('#inHisResep').val();
        id_resep = $('#inResRetur').val();
        window.open('<?= base_url('Obat_bebas/') ?>print_retur/' + id_resep);
    }

    function batalSigna() {
        $("#collap_signa").collapse('hide');
    }

    function cetak() {
        id = $('#inPelObat').val();
        window.location.href = '<?= base_url('Obat_bebas/') ?>print_obat_bebas/' + id;
    }

    function cetak_resep() {
        id_pelayanan = $('#inPelObat').val();
        window.location.href = '<?= base_url('Obat_bebas/') ?>print_resep/' + id_pelayanan;
    }

    function simpan() {
        id_resep = $('#inResObat').val();
        $.ajax({
            url: "<?php echo base_url() ?>Apotik/cetak_resep",
            method: "POST",
            dataType: 'json',
            data: {
                id_resep: id_resep,
            },
            success: function(data) {
                if (data.status == "success") {
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Tindakan ini Telah di Simpan!",
                        confirmButtonColor: "#3cb878",
                    });
                    $("#modal_edit_resep").modal('hide');
                    $("#collap_nonracikan").collapse('hide');
                    $("#collap_racikan").collapse('hide');
                    $("#collap_obat").collapse('hide');
                    reload_data_resep(idPel, idHis);
                } else {
                    swal({
                        title: "Gagal!",
                        text: data.error,
                        type: "warning",
                        confirmButtonColor: "#3cb878",
                    });
                }
            }

        });
        return false;
    }

    // function tambah_obat() {
    //     $("#tambah_obat").collapse('show');
    // }

    function batalFarmasi() {
        $("#collap_obat_edit").collapse('hide');
    }

    // function batalObat() {
    //     $("#tambah_obat").collapse('hide');
    // }

    function tampilSelisih() {
        tersedia = parseFloat($("#outStok").val());
        asli = parseFloat($("#inJumlahObat").val());
        selisih = asli - tersedia;
        $("#inSelisih").val(selisih);
    }



    function convertToRupiah(angka) {
        var rupiah = '';
        var angkarev = angka.toString().split('').reverse().join('');
        for (var i = 0; i < angkarev.length; i++)
            if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + '.';
        return 'Rp. ' + rupiah.split('', rupiah.length - 1).reverse().join('');
    }

    function setHarga() {

        caraBayar = $('#cara_bayar').val();;
        obat = $('#inObat').val();
        splitDiag = obat.split("|");
        stok = (splitDiag[4]);
        disc = parseFloat($("#inDisc").val());
        if (disc > 35) {
            disc = 35;
        }
        if (caraBayar == "WA14BJ84") {
            disc = 0;
        }

        $("#inDisc").val(disc);


        $("#outStok").val(stok);


        ppn = parseFloat(splitDiag[1]) * (parseFloat(splitDiag[5]) / 100);
        harga = parseFloat(splitDiag[1]) + ppn;
        hargaMargin = harga * parseFloat(splitDiag[2]);
        $("#outBiayaTindakanObat").val(convertToRupiah(harga.toFixed(0)));
        $("#outBiayaMarginObat").val(convertToRupiah(hargaMargin.toFixed(0)));

        frek = parseFloat($("#inJumlahObat").val());
        if (frek > stok) {
            $("#inJumlahObat").val(stok);
        } else if (frek < 0) {
            $("#inJumlahObat").val(1);
        }
        frek = parseFloat($("#inJumlahObat").val());

        // 		  if (document.getElementById('inRadioCost').checked ) {
        // if (caraBayar === "WA14BJ84") {
        //     total = harga * frek;
        // } else {
        total = (harga * (parseFloat(splitDiag[2]) - (disc / 100))) * frek;
        //}

        $("#outTotalObat").val(convertToRupiah(total.toFixed(0)));

    }

    function reload_total_obat(id_pelayanan) {
        $('#outTotalHargaObat').dataTable().fnClearTable();
        $('#outTotalHargaObat').dataTable().fnDestroy();
        $('#outTotalHargaObat').DataTable({
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
                "url": '<?php echo base_url('Obat_bebas/tampil_total_obat'); ?>',
                "type": 'POST',
                "data": {
                    id_pelayanan: id_pelayanan
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


    function reload_data_obat(id) {
        $('#tableobat').dataTable().fnClearTable();
        $('#tableobat').dataTable().fnDestroy();
        $('#tableobat').DataTable({
            "pageLength": 10,
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
                "url": '<?php echo base_url('Obat_bebas/tampil_tindakan_obat_bebas'); ?>',
                "type": 'POST',
                "data": {
                    id: id,
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
            "ajax": '<?php echo base_url('Obat_bebas/Tampil_obat_bebas'); ?>',
            "deferRender": true,
            "processing": true,
            "order": [],
            "columnDefs": [{
                "targets": [0],
                "orderable": false,
            }, ],

        });
    });

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
                "url": '<?= base_url('Obat_bebas/Tampil_obat_bebas'); ?>',
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

>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
