<!-- Row -->
<div class="panel panel-default card-view mt-20 ">
    <div class="panel-heading">
        <div class="pull-left">
            <h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">PASIEN POLI</span></h6>
        </div>

        <div class="clearfix"></div>
        <div class="row mt-30">
            <div class="col-md-12">
                <div class="col-md-3 mt-20">
                    <button class="btn btn-primary btn-anim btn-sm1" onclick="hariIni();"><i class="icon-rocket"></i><span class="btn-text">HARI INI</span>
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
                                <!-- <th>RACIKAN</th>  -->
                                <th>TANGGAL RESEP</th>
                                <th>NO RM</th>
                                <th>NAMA PASIEN</th>
                                <!-- <th>DEPO</th> -->
                                <th>JENIS KELAMIN</th>
                                <th>TANGGAL LAHIR</th>
                                <th>UMUR</th>
                                <th>ALAMAT</th>
                                <!-- <th>CARA MASUK</th> -->
                                <th>JUMLAH POLI</th>
                                <th>POLIKLINIK / RUANG</th>
                                <th>JENIS KLAIM</th>
                                <th>DIAGNOSA</th>
                                <th>DOKTER DPJP</th>
                            </tr>
                        </thead>

                        <tfoot>
                            <tr class="bg-success">
                                <th>NO</th>
                                <th>TINDAKAN OBAT</th>
                                <!-- <th>RACIKAN</th>  -->
                                <th>TANGGAL RESEP</th>
                                <th>NO RM</th>
                                <th>NAMA PASIEN</th>
                                <!-- <th>DEPO</th> -->
                                <th>JENIS KELAMIN</th>
                                <th>TANGGAL LAHIR</th>
                                <th>UMUR</th>
                                <th>ALAMAT</th>
                                <!-- <th>CARA MASUK</th> -->
                                <th>JUMLAH POLI</th>
                                <th>POLIKLINIK / RUANG</th>
                                <th>JENIS KLAIM</th>
                                <th>DIAGNOSA</th>
                                <th>DOKTER DPJP</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- modal edit data -->
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
                    <div class="collapse" id="collap_obat">
                        <div class="form-body">
                            <h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO OBAT
                            </h6>
                            <hr width="95%">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">DEPO</label>
                                        <div class="col-md-9 has-success">
                                            <select class="form-control filled-input select2" id="inDepo">
                                                <option value="APOTIK">APOTIK</option>
                                                <!-- <option value="IGD">IGD</option> -->
                                                <option value="RANAP">RANAP</option>
                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">NAMA OBAT</label>
                                        <div class="col-md-9 has-success">
                                            <select class="form-control filled-input select2" id="inObat" onchange="setHarga()">
                                                <option value="-">-</option>


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
                            <div class="row" id="cetakSigna">

                                <div class="col-md-6">
                                    <label class="control-label col-md-3">SIGNA OBAT</label>
                                    <div class="col-md-9">
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
                                    <div class="col-md-9">
                                        <select class="form-control filled-input rounded-input select2" id="inCaraPakai">
                                            <option>-</option>
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
                            <input type="hidden" class="form-control" id="cara_bayar">
                            <input type="hidden" class="form-control" id="tipe_resep">
                            <input type="hidden" class="form-control" id="inPelObat">
                            <input type="hidden" class="form-control" id="inResObat">
                            <div class="form-actions mt-10">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">
                                                <div type="submit" class="btn btn-success mr-10" onclick="insert_Obat()">SIMPAN</div>

                                                <span></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6"> </div>
                                </div>
                            </div>
                        </div>
                    </div>
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

                                <!--signa obat-->
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">SIGNA OBAT</label>
                                        <div class="col-md-9 has-success">
                                            <select class="form-control filled-input rounded-input select2" id="inSigna1">
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
                            <input type="hidden" class="form-control" id="inDepo1">
                            <input type="hidden" class="form-control" id="inStok1">
                            <div class="form-actions mt-10">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">
                                                <div type="submit" class="btn btn-success mr-10" onclick="edit_Obat()">SIMPAN</div>

                                                <span></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6"> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="collapse" id="collap_obat_acc">
                        <div class="form-body">
                            <h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO OBAT
                            </h6>
                            <hr width="95%">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">NAMA OBAT</label>
                                        <div class="col-md-9 has-success">
                                            <select class="form-control filled-input select2" id="inObat2" onchange="getStok()">
                                                <option value="-">-</option>
                                                <?php

                                                foreach ($obat as $row) {

                                                ?>
                                                    <option value="<?php echo $row["id_logistik"]; ?>"><?php echo $row["nama"]; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">EXPIRED DATE</label>
                                        <div class="col-md-9 has-success">
                                            <input type="text" class="form-control " id="inTglExp2" disabled="">
                                        </div>
                                    </div>
                                </div>

                                <!--signa obat-->
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">SIGNA OBAT</label>
                                        <div class="col-md-9 has-success">
                                            <select class="form-control filled-input rounded-input select2" id="inSigna2">
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
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">STOK OBAT</label>
                                        <div class="col-md-9 has-success">
                                            <input type="text" class="form-control " id="inStok" placeholder="jumlah" disabled>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">JUMLAH OBAT</label>
                                        <div class="col-md-9 has-success">
                                            <input type="number" class="form-control " id="inJumlahObat2" placeholder="jumlah" value="1" oninput="setHarga2()">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">TOTAL HARGA</label>
                                        <div class="col-md-9 has-success">
                                            <input type="text" class="form-control" disabled="" id="outTotalObat2">

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <input type="hidden" class="form-control" id="idTindakan1">
                            <input type="hidden" class="form-control" id="idResep1">
                            <input type="hidden" class="form-control" id="inIdLog">
                            <input type="hidden" class="form-control" id="hargaCost1">
                            <input type="hidden" class="form-control" id="inDepo2">
                            <div class="form-actions mt-10">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">
                                                <div type="submit" class="btn btn-success mr-10" onclick="terima()">TERIMA</div>
                                                <!-- <div type="button" class="btn btn-danger " onclick="tolak()">TOLAK</div> -->

                                                <span></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6"> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="collapse" id="collap_nonracikan">
                        <div class="form-body">

                            <h6 class="txt-dark capitalize-font pl-20"><i class="icon-list mr-10"></i>TINDAKAN</h6>
                            <hr width="95%">
                            <div class="row ">
                                <div class="table-wrap" style="width: 100%; margin: auto ">
                                    <div class="table-responsive">
                                        <table class="table table-hover display  pb-60" id="tableobat">
                                            <thead>
                                                <tr class="bg-success">
                                                    <th>NO</th>
                                                    <th>TERIMA</th>
                                                    <th>EDIT</th>
                                                    <th>HAPUS</th>
                                                    <th>NAMA OBAT</th>
                                                    <th>STOK</th>
                                                    <th>JUMLAH OBAT</th>
                                                    <th>JUMLAH OBAT REQUEST</th>
                                                    <th>HARGA OBAT</th>
                                                    <th>TOTAL BIAYA</th>
                                                    <th>KETERANGAN</th>
                                                    <th>SIGNA OBAT</th>
                                                    <th>NAMA STAFF</th>
                                                    <th>DEPO</th>
                                                    <th>EXPIRE DATE</th>
                                                    <th>SIGNA</th>
                                                </tr>
                                            </thead>
                                            <tbody style="color: black">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <span class="help-block"></span>
                            <div align="left">
                                <input type="hidden" class="form-control" id="inPelResep">
                                <input type="hidden" class="form-control" id="inHisResep">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-12">

                                                <div style="display: none;" id="tambahObatFarmasi" onclick="tindakan_nonracikan()" class="btn btn-sm btn-info mr-10">TAMBAH OBAT</div>
                                                <!-- <div id="cetakFarmasi" onclick="simpan()" class="btn btn-sm btn-primary mr-10">TERIMA</div> -->
                                                <div id="cetakFarmasi" onclick="cetak()" class="btn btn-sm btn-warning mr-10">CETAK</div>
                                                <div id="cetakFarmasi" onclick="cetakSigna1()" class="btn btn-sm btn-success mr-10">CETAK SIGNA</div>


                                                <!-- <div id="batalFarmasi" onclick="batalFarmasi()" class="btn btn-sm btn-danger mr-10">BATAL</div> -->

                                                <span></span>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-6"> </div>
                                </div>

                                <div class="row" style="margin-top: 20px;">
                                    <div class="col-md-12">
                                        <div class="row">

                                            <div class="col-md-12">

                                                <!-- <div id="cetakFarmasi" onclick="cetak_resep()" class="btn btn-sm btn-success mr-10">CETAK RESEP</div> -->
                                                <div id="cetakFarmasi" onclick="copy_resep()" class="btn btn-sm btn-success mr-10">COPY RESEP</div>
                                                <div id="cetakFarmasi" onclick="cetak_Layout()" class="btn btn-sm btn-success mr-10">SKRINING RESEP</div>

                                                <!-- <div id="cetakFarmasi" onclick="cetak_resep_kronis()" class="btn btn-sm btn-success mr-10">CETAK OBAT KRONIS</div> -->
                                                <div id="batalFarmasi" onclick="batalFarmasi()" class="btn btn-sm btn-danger mr-10">BATAL</div>

                                                <span></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6"> </div>
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

                            </hr>
                            <br>
                            <br>
                            <div class="collapse" id="collap_signa">
                            </div>
                        </div>
                    </div>
                    <div class="collapse" id="collap_racikan">
                        <div class="form-body">
                            <h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO RESEP
                            </h6>
                            <hr width="95%">
                            <div class="row">
                                <div class="table-wrap" style="width: 100%; margin: auto ">
                                    <div class="table-responsive">
                                        <table class="table table-hover display  pb-30" id="tableRacikan">
                                            <thead>
                                                <tr class="bg-success">
                                                    <th>NO</th>
                                                    <th>TINDAKAN</th>
                                                    <th>OBAT</th>
                                                    <th>RESEP</th>
                                                    <th>SIGNA</th>
                                                    <th>CARA PAKAI</th>


                                                </tr>
                                            </thead>
                                            <tbody style="color: black">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- <div align="right"> -->
                                <span class="help-block"></span>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-12">
                                                <div id="cetakRacikan" onclick="cetakRacikan()" class="btn btn-info ">CETAK</div>
                                                <div id="batalFarmasi" onclick="batalFarmasi()" class="btn btn-danger ">BATAL</div>
                                                <span></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6"> </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="form-body mt-10">
                        <h6 class="txt-dark capitalize-font pl-20"><i class="icon-list mr-10"></i>TINDAKAN</h6>
                        <hr width="95%">
                        <div class="table-wrap" style="width: 100%; margin: auto ">
                            <div class="table-responsive">
                                <table class="table table-hover display  pb-60" id="tableresep">
                                    <thead>
                                        <tr class="bg-success">
                                            <th>NO</th>
                                            <th>TINDAKAN</th>
                                            <th>HAPUS</th>
                                            <th>NAMA RESEP</th>
                                            <th>JENIS RESEP</th>
                                            <th>DEPO</th>
                                            <th>PERESEP</th>
                                            <th>TANGGAL</th>
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

<style>
    td {
        color: black;
    }
</style>
<script type="text/javascript">
    function getStok() {

        var id_logistik = $('#inObat2').val();
        var frek = $("#inJumlahObat2").val();
        if (id_logistik != '') {
            $.ajax({
                url: "<?php echo base_url(); ?>Logistik_farmasi/getObatById",
                method: "POST",
                data: {
                    id_logistik: id_logistik
                },
                dataType: 'json',
                success: function(data) {
                    //alert(data.stok)
                    $('#inStok').val(data.stok);
                    $("#inTglExp2").val(data.kadaluarsa).change();

                    var cara_bayar = $('#cara_bayar').val();
                    var depo = $('#inDepo').val();
                    // if(cara_bayar =='31'){
                    //     margin = '1.1';
                    // }else{
                    margin = '1.3';
                    // }
                    harga = Number(margin) * Number(data.harga_cost) * (1 + Number(data.ppn) / 100);
                    $("#hargaCost1").val(Math.round(harga));
                    $("#outTotalObat2").val(Math.round(harga) * Number(frek));
                }
            });
        } else {
            $('#outStok').val(0);
        }
    }
</script>
<script type="text/javascript">
    function tampil_resep(idPel, idHis) {
        $('#inPelResep').val(idPel);
        $('#inHisResep').val(idHis);
        $("#modal_edit_resep").modal('show');
        $("#collap_nonracikan").collapse('hide');
        $("#collap_racikan").collapse('hide');
        reload_data_resep(idPel, idHis);
    }

    function cetakRacikan() {
        id_resep = $('#inResObat').val();
        id_his = $('#inHisResep').val();
        window.open('<?= base_url('Apotik/') ?>' + 'cetakRacikan/' + id_resep + '/' + id_his);

    }

    function cetakSigna(id, id_resep) {
        id_tindakan = id;
        window.open('<?= base_url() ?>' + 'Apotik/print_signa/' + id_tindakan);
    }




    function edit_obat1(id, id_resep, stok) {
        $.ajax({
            url: "<?= base_url() . 'Apotik/getDataObat' ?>",
            method: "POST",
            dataType: 'json',
            data: {
                id_tindakan: id
            },
            success: function(data) {
                if (data.status_dt == "found") {
                    $('#inDepo1').val(data.depo);
                    $('#inStok1').val(Number(stok) + Number(data.frek));
                    $('#inObat1').val(data.nama);
                    $('#inSigna1').val(data.id_signa).change();
                    $('#inTglExp1').val(data.kadaluarsa);
                    $("#inJumlahObat1").val(data.frek_req);
                    harga = Number(data.margin) * Number(data.harga);
                    $("#hargaCost").val(harga);
                    $("#idTindakan").val(id);
                    $("#collap_obat_edit").collapse('toggle');
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
        $("#outTotalObat1").val(convertToRupiah(total.toFixed(0)));
    }



    function edit_Obat() {
        jumlah = $("#inJumlahObat1").val();
        harga = $("#hargaCost").val();
        total = harga * jumlah;
        id = $("#idTindakan").val();
        depo = $('#inDepo1').val();
        signa = $('#inSigna1').val();
        stok = $('#inStok1').val();

        $.ajax({
            url: "<?= base_url() . 'Apotik/update_obat' ?>",
            method: "POST",
            dataType: 'json',
            data: {
                id: id,
                jumlah: jumlah,
                depo: depo,
                total: total,
                signa: signa,
                stok: stok

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
                    $('#inSigna1').val('');
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
        id_resep = $('#inResObat').val();
        id_his = $('#inHisResep').val();
        window.open('<?= base_url('Apotik/') ?>' + 'cetak_signa/' + id_resep + '/' + id_his);
    }

    function batalSigna() {
        $("#collap_signa").collapse('hide');
    }

    function cetak() {
        id_resep = $('#inResObat').val();
        id_his = $('#inHisResep').val();
        window.open('<?= base_url('Apotik/') ?>' + 'print_struk/' + id_resep + '/' + id_his);


    }

    function cetak_resep() {
        id_resep = $('#inResObat').val();
        id_his = $('#inHisResep').val();
        window.open('<?= base_url('Apotik/') ?>' + 'print_resep/' + id_resep + '/' + id_his);
    }

    function copy_resep() {
        id_resep = $('#inResObat').val();
        id_his = $('#inHisResep').val();
        window.open('<?= base_url('Apotik/') ?>' + 'print_copy_resep/' + id_resep + '/' + id_his);
    }

    function cetak_resep_kronis() {
        id_resep = $('#inResObat').val();
        id_his = $('#inHisResep').val();
        window.open('<?= base_url('Apotik/') ?>' + 'print_resep_kronis/' + id_resep + '/' + id_his);
    }

    function cetak_Layout() {
        id_resep = $('#inResObat').val();
        id_his = $('#inHisResep').val();
        window.open('<?= base_url('Apotik/') ?>' + 'print_layout/' + id_resep + '/' + id_his);
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
                    $('#datable').DataTable().ajax.reload();
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

    function pilih_obat(idResep, tipe, cara_bayar) {
        if (tipe == 2) {
            $('#cara_bayar').val(cara_bayar);
            $('#tipe_resep').val(tipe);
            $('#inResObat').val(idResep);
            $("#collap_racikan").collapse('toggle');
            $("#collap_nonracikan").collapse('hide');
            $('#tambahObatFarmasi').hide();

            reload_data_racikan(idResep);
        } else {
            $('#cara_bayar').val(cara_bayar);
            $('#tipe_resep').val(tipe);
            $('#inResObat').val(idResep);
            $('#tambahObatFarmasi').show();
            $("#collap_nonracikan").collapse('toggle');
            $("#collap_racikan").collapse('hide');
            reload_data_obat(idResep);
            reload_total_obat(idResep);
        }
    }

    function tindakan_racikan() {
        $('#inDepo').val('APOTIK').change();
        $("#collap_obat").collapse('toggle');
    }

    function tindakan_nonracikan() {
        $('#inDepo').val('APOTIK').change();
        $("#collap_obat").collapse('toggle');
    }

    function tabel_obat(id) {
        $("#collap_nonracikan").collapse('toggle');
        reload_data_obat(id);
    }

    function batalFarmasi() {
        $("#collap_nonracikan").collapse('hide');
        $("#collap_racikan").collapse('hide');
    }

    function batalObat() {
        $("#collap_obat").collapse('hide');
    }

    function tampilSelisih() {
        tersedia = parseFloat($("#outStok").val());
        asli = parseFloat($("#inJumlahObat").val());
        selisih = asli - tersedia;
        $("#inSelisih").val(selisih);
    }

    function insert_Obat() {
        id_pelayanan = $('#inPelResep').val();
        id_history = $('#inHisResep').val();
        id_resep = $('#inResObat').val();
        caraBayar = $('#cara_bayar').val();
        tipe = $('#tipe_resep').val();
        a = $("#inObat").val();
        depo = $("#inDepo").val();
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

        // if ((caraBayar == "WA14BJ84" && tipe == "1") || (caraBayar == "WA14BJ84" && tipe == "2")) {
        //     total = harga * frek;
        // } else if (caraBayar == "WA14BJ84" && tipe == "3") {
        //     total = (harga * (parseFloat(splitDiag[2]) - (disc / 100))) * frek;
        // } else {
        total = (harga * (parseFloat(splitDiag[2]) - (disc / 100))) * frek;
        //}
        signa = $('#inSigna').val();
        cara_pakai = $('#inCaraPakai').val();

        $.ajax({
            url: "<?= base_url() . 'Apotik/insert_obat' ?>",
            method: "POST",
            dataType: 'json',
            cache: true,
            data: {
                id_pelayanan: id_pelayanan,
                id_history: id_history,
                id_resep: id_resep,
                depo: depo,
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
                cara_pakai: cara_pakai,
                jenis_pelayanan: 'POLI'
            },
            success: function(data) {
                if (data.status == "success") {

                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Tindakan ini Telah di Simpan!",
                        confirmButtonColor: "#3cb878",
                    });

                    // $("#collap_nonracikan").collapse('show');
                    // $("#collap_racikan").collapse('show');
                    // $("#collap_nonracikan").collapse('hide');
                    //$("#collap_obat").collapse('toggle');
                    $('#inDepo').val('APOTIK').change();
                    $('#inObat').val('-').change();
                    $('#inTglExp').empty().trigger('change');
                    $("#inKeteranganObat").removeData();
                    $("#inJumlahObat").val('1');
                    $("#inDisc").val(0);
                    $("#outBiayaTindakanObat").val('');
                    $("#outBiayaMarginObat").val('');
                    $("#outStok").val('0');
                    $("#outTotalObat").val('');
                    $('#inSigna').val('-').change();
                    $('#inCaraPakai').val('-').change();
                    $("#collap_nonracikan").collapse('toggle');

                    reload_data_racikan(id_resep);
                    reload_data_obat(id_resep);
                    reload_total_obat(id_resep);
                    // $('#tableobat').DataTable().ajax.reload();
                    // $('#inDepo').val('APOTIK').change();
                    // $('#inObat').empty().trigger('change');
                    // $('#inTglExp').val('');
                    // $("#inKeteranganObat").val('');
                    // $("#inJumlahObat").val(0);
                    // $("#inDisc").val(0);
                    // $("#outBiayaTindakanObat").val('');
                    // $("#outBiayaMarginObat").val('');
                    // $("#outStok").val(0);
                    // $("#outTotalObat").val('');
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

    function convertToRupiah(angka) {
        var rupiah = '';
        var angkarev = angka.toString().split('').reverse().join('');
        for (var i = 0; i < angkarev.length; i++)
            if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + '.';
        return 'Rp. ' + rupiah.split('', rupiah.length - 1).reverse().join('');
    }
    $(document).ready(function() {
        $('#inDepo').change(function() {

            var depo = $('#inDepo').val();
            if (depo != '') {
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
                        var cara_bayar = $('#cara_bayar').val();
                        if (cara_bayar == '31') {
                            margin = '1.1';
                        } else {
                            margin = '1.3';
                        }
                        html = '<option value="">-</option>';
                        for (i = 0; i < data.length; i++) {
                            html += '<option value="' + data[i].id_logistik + '|' + data[i].harga_cost + '|' + margin + '|' + data[i].kadaluarsa + '|' + data[i].stok + '|' + data[i].ppn + '|' + '">' + data[i].nama + '</option>';
                        }
                        $('#inObat').html(html);
                    }
                });
            } else {
                $('#inObat').html('<option value="">-</option>');
            }
        });
        $('#inObat').change(function() {
            var obat = $('#inObat').val();
            splitDiag = obat.split('|');
            tgl = splitDiag[3];
            $('#inTglExp').val(tgl);
            stok = splitDiag[4];
            $("#outStok").val(stok);
        });
    });

    function getObat(depo) {
        if (depo != '') {
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
                    var cara_bayar = $('#cara_bayar').val();
                    if (cara_bayar == '31') {
                        margin = '1.1';
                    } else {
                        margin = '1.3';
                    }
                    html = '<option value="">-</option>';
                    for (i = 0; i < data.length; i++) {
                        html += '<option value="' + data[i].id_logistik + '|' + data[i].harga_cost + '|' + margin + '|' + data[i].kadaluarsa + '|' + data[i].stok + '|' + data[i].ppn + '|' + '">' + data[i].nama + '</option>';
                    }
                    $('#inObat').html(html);
                }
            });
        } else {
            $('#inObat').html('<option value="">-</option>');
        }
    }

    function setHarga() {

        caraBayar = $('#cara_bayar').val();
        tipe = $('#tipe_resep').val();
        obat = $('#inObat').val();
        splitDiag = obat.split("|");
        stok = (splitDiag[4]);
        disc = parseFloat($("#inDisc").val());
        if (disc > 35) {
            disc = 35;
        }
        if (caraBayar == "30") {
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
        // if ((caraBayar == "WA14BJ84" && tipe == "1") || (caraBayar == "WA14BJ84" && tipe == "2")) {
        //     total = harga * frek;
        // } else if (caraBayar == "WA14BJ84" && tipe == "3") {
        //     total = (harga * (parseFloat(splitDiag[2]) - (disc / 100))) * frek;
        // } else {
        total = (harga * (parseFloat(splitDiag[2]) - (disc / 100))) * frek;
        //}

        $("#outTotalObat").val(convertToRupiah(total.toFixed(0)));

    }

    function reload_data_resep(id_pelayanan, id_history) {
        $('#tableresep').dataTable().fnClearTable();
        $('#tableresep').dataTable().fnDestroy();
        $('#tableresep').DataTable({
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
                "url": '<?php echo base_url('Apotik/tampil_resep'); ?>',
                "type": 'POST',
                "data": {
                    id_pelayanan: id_pelayanan,
                    id_history: id_history
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

    function reload_data_racikan(id_resep) {
        $('#tableRacikan').dataTable().fnClearTable();
        $('#tableRacikan').dataTable().fnDestroy();
        $('#tableRacikan').DataTable({
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
                "url": '<?php echo base_url('Apotik/tampil_racikan'); ?>',
                "type": 'POST',
                "data": {
                    id_resep: id_resep
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

    function hapus_obat(id, nama, depo) {
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
                    url: "<?php echo base_url() ?>Apotik/hapus_obat",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        id: id,
                        depo: depo
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

    function hapus_resep(id_resep, nama) {
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
                    url: "<?php echo base_url() ?>Poli/hapus_resep",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        id_resep: id_resep,
                    },
                    success: function(data) {
                        if (data.status == "success") {
                            $('#tableresep').DataTable().ajax.reload();
                            swal({
                                title: "good job!",
                                type: "success",
                                text: "Data Berhasil dihapus",
                                buttons: false,
                                timer: 800
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
            });
        });
        return false;
    }

    function reload_data_obat(id_resep) {
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
                "url": '<?php echo base_url('Apotik/tampil_obat'); ?>',
                "type": 'POST',
                "data": {
                    id_resep: id_resep,
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
                "url": '<?php echo base_url('Poli/tampil_total_obat'); ?>',
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
            "ajax": '<?php echo base_url('Apotik/tampil_pasien_rajal'); ?>',
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
                "url": '<?= base_url('Apotik/tampil_pasien_rajal'); ?>',
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
<script>
    function edit_obat(id, id_resep, stok) {
        $.ajax({
            url: "<?= base_url() . 'Apotik/getDataObat' ?>",
            method: "POST",
            dataType: 'json',
            data: {
                id_tindakan: id
            },
            success: function(data) {
                if (data.status_dt == "found") {
                    $('#inDepo2').val(data.depo);
                    $('#inObat2').val(data.id_list_tindakan).change();
                    $('#inSigna2').val(data.id_signa).change();
                    $('#inTglExp2').val(data.kadaluarsa);
                    $("#inJumlahObat2").val(data.frek_req);
                    harga = Number(data.margin) * Number(data.harga);
                    $("#outTotalObat2").val(Math.round(harga) * data.frek_req);
                    $("#hargaCost1").val(Math.round(harga));
                    $("#idTindakan1").val(id);
                    $("#idResep1").val(id_resep);
                    $("#inStok").val(stok);
                    $("#inIdLog").val(data.id_list_tindakan);
                    $("#collap_obat_acc").collapse('toggle');
                } else {
                    alert("data tidak ditemukan");
                }
            }
        });
    }

    function setHarga2() {
        frek = $("#inJumlahObat2").val();
        harga = $("#hargaCost1").val();
        total = harga * frek;
        $("#outTotalObat2").val(convertToRupiah(total.toFixed(0)));
    }

    function terima() {
        $("#collap_obat_edit").collapse('hide');

        jumlah = $("#inJumlahObat2").val();
        harga = $("#hargaCost1").val();
        total = harga * jumlah;
        id = $("#idTindakan1").val();
        id_resep = $("#idResep1").val();
        depo = $('#inDepo2').val();
        signa = $('#inSigna2').val();
        expire = $('#inTglExp2').val();
        stok = $("#inStok").val();

        id_list_tindakan = $('#inObat2').val();

        $.ajax({
            method: "POST",
            dataType: 'json',
            url: "<?php echo base_url() ?>Apotik/updateTerima",
            data: {
                id: id,
                id_resep: id_resep,
                jumlah: jumlah,
                depo: depo,
                total: total,
                signa: signa,
                expire: expire,
                stok: stok,
                id_list_tindakan: id_list_tindakan
            },
            success: function(data) {
                if (data.status == "success") {
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Permintaan Diterima",
                        confirmButtonColor: "#3cb878",
                    });
                    $("#collap_tambah_kunjungan").collapse('hide');
                    $("#collap_obat_edit").collapse('hide');
                    $('#tabletindakan').DataTable().ajax.reload();
                    reload_data_obat(id_resep);
                } else if (data.status == "error") {
                    swal({
                        title: "Gagal!",
                        type: "warning",
                        text: "Jumlah obat tidak sesuai dengan stok tersedia",
                        confirmButtonColor: "#3cb878",
                    });
                    $("#collap_tambah_kunjungan").collapse('hide');
                    $("#collap_obat_edit").collapse('hide');
                    $('#tabletindakan').DataTable().ajax.reload();
                    reload_data_obat(id_resep);
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

    function terima_langsung(id, id_resep, stok, jumlah, depo, total, signa, id_list_tindakan, expire) {
        $("#collap_obat_edit").collapse('hide');

        $.ajax({
            method: "POST",
            dataType: 'json',
            url: "<?php echo base_url() ?>Apotik/updateTerima",
            data: {
                id: id,
                id_resep: id_resep,
                jumlah: jumlah,
                depo: depo,
                total: total,
                signa: signa,
                expire: expire,
                stok: stok,
                id_list_tindakan: id_list_tindakan
            },
            success: function(data) {
                if (data.status == "success") {
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Permintaan Diterima",
                        confirmButtonColor: "#3cb878",
                    });
                    $("#collap_tambah_kunjungan").collapse('hide');
                    $("#collap_obat_edit").collapse('hide');
                    $('#tabletindakan').DataTable().ajax.reload();
                    reload_data_obat(id_resep);
                } else if (data.status == "error") {
                    swal({
                        title: "Gagal!",
                        type: "warning",
                        text: "Jumlah obat tidak sesuai dengan stok tersedia",
                        confirmButtonColor: "#3cb878",
                    });
                    $("#collap_tambah_kunjungan").collapse('hide');
                    $("#collap_obat_edit").collapse('hide');
                    $('#tabletindakan').DataTable().ajax.reload();
                    reload_data_obat(id_resep);
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

    function tolak() {


        $.ajax({
            method: "POST",
            dataType: 'json',
            url: "<?php echo base_url() ?>Apotik/updateTolak",
            data: {
                id_request: idRequest,
                keterangan: keterangan
            },
            success: function(data) {
                if (data.status == "success") {
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Permintaan Ditolak",
                        confirmButtonColor: "#3cb878",
                    });
                    $("#collap_tambah_kunjungan").collapse('hide');
                    $('#tabletindakan').DataTable().ajax.reload();
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

    function hariIni() {
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
                "sSearch": "Cari:",
                "sUrl": "",
                "oPaginate": {
                    "sFirst": "Pertama",
                    "sPrevious": "Sebelumnya",
                    "sNext": "Selanjutnya",
                    "sLast": "Terakhir"
                },

            },
            "ajax": '<?php echo base_url('Apotik/tampil_pasien_rajal'); ?>',
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
        $.fn.modal.Constructor.prototype.enforceFocus = function() {};

    });
</script>