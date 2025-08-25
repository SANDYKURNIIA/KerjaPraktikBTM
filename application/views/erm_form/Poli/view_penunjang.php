<?php
$data = $this->session->userdata('data_auth');
$izinAkses = $data->izin_akses;
?>
<!-- Tindakan -->
<div class="modal fade bs-example-modal-lg" id="modal_edit_data" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h5 class="modal-title" id="myLargeModalLabel"><i class="icon-user mr-10"></i> TINDAKAN
                </h5>
            </div>
            <div class="modal-body">
                <div class="form-wrap">
                    <!-- /formbody -->
                    <div class="form-body mt-10">
                        <h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO TINDAKAN
                        </h6>
                        <hr width="95%">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label col-md-3">NAMA TINDAKAN</label>
                                    <div class="col-md-9 has-success" onchange="pilihTindakan()">
                                        <select class="form-control filled-input select2" style="border: 1px solid lightgreen;" tabindex="1" name="inTindakan" id="inTindakan">
                                            <option value="-">-</option>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!--/span-->

                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label col-md-3">JUMLAH TINDAKAN</label>
                                    <div class="col-md-9 has-error">
                                        <input type="number" class="form-control" id="inJumlah" value="1" min="1" placeholder="jumlah" oninput="hargaTotal()">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <span class="help-block"></span>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label col-md-3">BIAYA TINDAKAN</label>
                                    <div class="col-md-9 has-error">
                                        <input type="text" class="form-control " disabled="" id="outBiayaTindakan">
                                        <input type="hidden" class="form-control " disabled="" id="idPelayanan">
                                        <input type="hidden" class="form-control " disabled="" id="idHistory">
                                        <input type="hidden" class="form-control " disabled="" id="jumTindakan">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">TOTAL HARGA</label>
                                    <div class="col-md-9 has-error">
                                        <input type="text" class="form-control" disabled="" id="outTotal">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <span class="help-block"></span>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label col-md-3">NAMA DOKTER</label>
                                    <div class="col-md-9 has-success">
                                        <select class="form-control filled-input select2" placeholder="PILIH NAMA DOKTER" style="border: 1px solid lightgreen;" tabindex="1" id="inDPJP" name="namaDPJP">
                                            <option value="-">-</option>

                                        </select><br>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 collapse" id="pembayaran2">
                                <div class="form-group ">
                                    <label class="control-label col-md-3">PEMBAYARAN</label>
                                    <div class="col-md-9 has-success">
                                        <select class="form-control filled-input select2" style="border: 1px solid lightgreen;" name="inPembayaran2" id="inPembayaran2">
                                            <option value="ditanggung" selected>DITANGGUNG ASURANSI</option>
                                            <option value="tidak">TIDAK DITANGGUNG ASURANSI</option>

                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <button onclick="insert_tindakan()" class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
                                        <!-- <button onclick="insert_na_tindakan()" class="btn btn-warning btn-anim  btn-sm ml-20 mt-5" id="na_tindakan"><i class="icon-rocket"></i><span class="btn-text">N/A</span> -->
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="modal-body mt-30">
                <h6 class="txt-dark capitalize-font pl-20"><i class="icon-list mr-10"></i>TINDAKAN</h6>
                <hr width="95%">
                <div class="table-wrap" style="width: 100%; margin: auto ">
                    <div class="table-responsive">
                        <table class="table table-hover display  pb-60" id="tabletindakan">
                            <thead>
                                <tr class="bg-success">
                                    <th>NO</th>
                                    <th>NAMA TINDAKAN</th>
                                    <th>BIAYA TINDAKAN </th>
                                    <th>JUMLAH TINDAKAN</th>
                                    <th>TOTAL BIAYA</th>
                                    <th>DOKTER</th>
                                    <th>NAMA STAFF</th>
                                    <?php if ($izinAkses == "admin") { ?>
                                        <th>HAPUS</th>
                                    <?php } ?>
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
</div>

<!-- Resep -->
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
                    <div class="collapse" id="collap_nonracikan">
                        <div class="form-body">
                            <h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO OBAT
                            </h6>
                            <hr width="95%">
                            <form id="formObat" style="display: none;">
                                <div id="tambah_obat">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group ">
                                                <label class="control-label col-md-3">NAMA OBAT</label>
                                                <div class="col-md-9 has-success">
                                                    <input type="text" name="title" class="form-control" id="inObat" placeholder="Ketik karakter">
                                                    <input type="hidden" class="form-control " id="inIdLog">
                                                    <input type="hidden" class="form-control " id="inHargaCost">
                                                    <input type="hidden" class="form-control " id="inMargin">
                                                    <input type="hidden" class="form-control " id="inPpn">
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
                                                    <input type="number" class="form-control " id="inJumlahObat" placeholder="jumlah" value="1" min="1" oninput="setHarga()">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <!-- <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">DISCOUNT</label>
                                                <div class="col-md-3 has-success"> -->
                                        <input type="hidden" placeholder="Disc" max="35" class="form-control" id="inDisc" value="0" oninput="setHarga()">
                                        <!-- </div>
                                                <div class="col-md-1">
                                                    %
                                                </div>
                                            </div>
                                        </div> -->
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

                                                <select class="form-control filled-input rounded-input select2" id="inSigna" name="inSigna">
                                                    <option value="-">-</option>

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

                                                <select class="form-control filled-input rounded-input select2" id="inCaraPakai" name="inCaraPakai">
                                                    <option value="-">-</option>


                                                </select>

                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <input type="hidden" class="form-control" disabled="" id="cara_bayar">
                                <input type="hidden" class="form-control" disabled="" id="tipe_resep">
                                <input type="hidden" class="form-control" id="inPelObat">
                                <input type="hidden" class="form-control" id="inResObat">
                                <input type="hidden" class="form-control" id="inDepo">

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
                            </form>
                            <div class="row ">
                                <h6 class="txt-dark capitalize-font pl-20"><i class="icon-list mr-10"></i>TINDAKAN</h6>
                                <hr width="95%">
                                <div class="table-wrap" style="width: 100%; margin: auto ">
                                    <div class="table-responsive">
                                        <table class="table table-hover display  pb-60" id="tableobat">
                                            <thead>
                                                <tr class="bg-success">
                                                    <th>NO</th>
                                                    <th>HAPUS</th>
                                                    <th>NAMA OBAT</th>
                                                    <th>HARGA OBAT</th>
                                                    <th>JUMLAH OBAT</th>
                                                    <th>DEPO</th>
                                                    <th>TOTAL BIAYA</th>
                                                    <th>KETERANGAN</th>
                                                    <th>SIGNA</th>
                                                    <th>CARA PAKAI</th>
                                                    <th>NAMA STAFF</th>
                                                    <th>STAFF HAPUS</th>
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
                            <br><br>
                            <div class="collapse" id="collap_signa">
                            </div>
                            </hr>
                        </div>

                    </div>
                    <div class="collapse" id="collap_racikan">
                        <div class="form-body" id="form_racikan" style="display: none;">
                            <h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO RESEP
                            </h6>
                            <hr width="95%">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-1">RESEP</label>
                                        <div class="col-md-11 has-success">
                                            <textarea class="form-control" id="inResep"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div><br>
                            <div class="row" id="cetakSigna">

                                <div class="col-md-6">
                                    <label class="control-label col-md-3">SIGNA OBAT</label>
                                    <div class="col-md-9">
                                        <select class="form-control filled-input rounded-input select2" id="inSigna1" name="inSigna">
                                            <option value="-">-</option>
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
                                        <select class="form-control filled-input rounded-input select2" id="inCaraPakai1" name="inCaraPakai">
                                            <option value="-">-</option>

                                        </select>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>
                            <span class="help-block"></span>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <button onclick="insert_resep_racikan()" class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <h6 class="txt-dark capitalize-font pl-20"><i class="icon-list mr-10"></i>TINDAKAN</h6>
                            <hr width="95%">
                            <div class="table-wrap" style="width: 100%; margin: auto ">
                                <div class="table-responsive">
                                    <table class="table table-hover display  pb-60" id="tableRacikan">
                                        <thead>
                                            <tr class="bg-success">
                                                <th>NO</th>
                                                <th>RESEP</th>
                                                <th>SIGNA</th>
                                                <th>CARA PAKAI</th>
                                                <th>HAPUS</th>
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
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-3">
                                            <div id="batalFarmasi" onclick="batalFarmasi()" class="btn btn-danger ">BATAL</div>
                                            <span></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6"> </div>
                            </div>

                            <!-- </div> -->
                        </div>
                    </div>
                    <div class="form-body mt-10">
                        <?php $this->load->view('erm_form/Penunjang/view_resep'); ?>
                        <!-- <h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO RESEP
                        </h6>
                        <hr width="95%">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label col-md-3">JENIS RESEP</label>
                                    <div class="col-md-9 has-success">
                                        <select class="form-control filled-input select2" style="border: 1px solid lightgreen;" name="inTindakan" id="inJenisResep">
                                            <option value="1">Non Racikan</option>
                                            <option value="2">Racikan</option>
                                            <option value="5">Obat Kronis</option>
                                            <option value="3">OTT</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label col-md-3">NAMA RESEP</label>
                                    <div class="col-md-9 has-success">
                                        <input type="text" class="form-control" id="inNamaResep" placeholder="Nama Resep">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label col-md-3">DEPO</label>
                                    <div class="col-md-9 has-success">
                                        <select class="form-control filled-input select2" id="inDepo1">
                                            <option value="APOTIK" selected>RAJAL</option>
                                            <option value="RANAP">RANAP</option>
                                        </select>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <input type="hidden" class="form-control" id="inPelResep">
                        <input type="hidden" class="form-control" id="inHisResep">
                        <span class="help-block"></span>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <button onclick="insert_resep()" class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>

            <div class="modal-body mt-30">
                <h6 class="txt-dark capitalize-font pl-20"><i class="icon-list mr-10"></i>TINDAKAN</h6>
                <hr width="95%">
                <div class="table-wrap" style="width: 100%; margin: auto ">
                    <div class="table-responsive">
                        <table class="table table-hover display  pb-60" id="tableresep">
                            <thead>
                                <tr class="bg-success">
                                    <th>NO</th>
                                    <th>REQUEST</th>
                                    <th>TINDAKAN</th>
                                    <th>HAPUS</th>
                                    <th>NAMA RESEP</th>
                                    <th>JENIS RESEP</th>
                                    <th>DEPO</th>
                                    <th>TANGGAL</th>
                                </tr>
                            </thead>
                            <tbody style="color: black">
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <button onclick="cetak_antrian()" class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i class="icon-rocket"></i><span class="btn-text">CETAK ANTRIAN APOTIK</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>



<!-- Edit Labor  -->
<div class="modal fade bs-example-modal-lg" id="modal_labor" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h5 class="modal-title" id="myLargeModalLabel"><i class="icon-user mr-10"></i> TINDAKAN REQUEST LABOR
                </h5>
            </div>
            <div class="modal-body">
                <div class="form-wrap">
                    <!-- /formbody -->
                    <!-- Tindakan Labor -->
                    <div class="form-body mt-10 collapse" id="collapse_tindakan_labor">
                        <h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO TINDAKAN LABOR
                        </h6>
                        <hr width="95%">
                        <div class="collapse" id="formTinLabor">
                            <form id="form_labor">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">TINDAKAN LABOR</label>
                                            <div class="col-md-9 has-success" onchange="pilihTindakanLabor()">
                                                <select class="form-control filled-input select2" style="border: 1px solid lightgreen;" tabindex="1" name="inTindakanLabor" id="inTindakanLabor">
                                                    <option value="-">-</option>

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->

                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">JUMLAH TINDAKAN</label>
                                            <div class="col-md-9 has-error">
                                                <input type="text" class="form-control " id="inJumlahLabor" disabled placeholder="jumlah" oninput="hargaTotalLabor()">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <span class="help-block"></span>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">BIAYA TINDAKAN</label>
                                            <div class="col-md-9 has-error">
                                                <input type="text" class="form-control" disabled id="outBiayaTindakanLabor">
                                                <input type="hidden" class="form-control" disabled id="id_pel_lab">
                                                <input type="hidden" class="form-control" disabled id="id_his_lab">
                                                <input type="hidden" class="form-control" disabled id="id_form_lab">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">TOTAL HARGA</label>
                                            <div class="col-md-9 has-error">
                                                <input type="text" class="form-control " disabled id="outTotalLabor">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <span class="help-block"></span>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">KETERANGAN</label>
                                            <div class="col-md-9 has-success">
                                                <textarea class="form-control" id="keteranganLabor" disabled rows="13" style="max-width:95%; "></textarea>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">RINGKASAN KLINIS</label>
                                            <div class="col-md-9 has-success">
                                                <textarea class="form-control" id="ringkasanLabor" disabled rows="13" style="max-width:95%; "></textarea>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <span class="help-block"></span>
                            </form>
                            <div class="row">
                                <div class="col-md-12" style="padding-right:45px;">
                                    <div class="form-group pull-right">
                                        <button onclick="insert_labor()" class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Detail Tindakan -->
                        <div class="collapse" id="detailTindakanLabor">
                            <div class="form-body mb-30">
                                <h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>DETAIL
                                    TINDAKAN
                                </h6>
                                <hr width="95%">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">NAMA TINDAKAN</label>
                                            <div class="col-md-9 has-error">
                                                <input type="text" class="form-control" disabled id="outNama">
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">TANGGAL TINDAKAN</label>
                                            <div class="col-md-9 has-error">
                                                <input type="text" class="form-control" id="outTanggal" disabled>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <span class="help-block"></span>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">BIAYA TINDAKAN</label>
                                            <div class="col-md-9 has-error">
                                                <input type="text" class="form-control" disabled id="outHarga">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">JUMLAH TINDAKAN</label>
                                            <div class="col-md-9 has-error">
                                                <input type="text" class="form-control" id="outFrek" disabled>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <span class="help-block"></span>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">RINGKASAN</label>
                                            <div class="col-md-9 has-error">
                                                <textarea class="form-control" id="outRing" rows="13" style="max-width:95%; "></textarea>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">KETERANGAN</label>
                                            <div class="col-md-9 has-error">
                                                <textarea class="form-control" id="outKeta" rows="13" style="max-width:95%; "></textarea>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- End -->

                        </div>
                        <h6 class="txt-dark capitalize-font pl-20"><i class="icon-list mr-10"></i>TINDAKAN</h6>
                        <hr width="95%">
                        <div class="table-wrap" style="width: 100%; margin: auto ">
                            <div class="table-responsive">
                                <table class="table table-hover display  pb-60" id="tablelabor">
                                    <thead>
                                        <tr class="bg-success">
                                            <th>NO</th>
                                            <th>AKSI</th>
                                            <th>NAMA TINDAKAN</th>
                                            <th>TANGGAL TINDAKAN</th>
                                            <th>BIAYA TINDAKAN </th>
                                            <th>JUMLAH TINDAKAN</th>
                                            <th>STAFF REQUEST</th>
                                            <th>STAFF KONFIRMASI</th>
                                            <th>RINGKASAN</th>
                                            <th>KETERANGAN</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr class="bg-success">
                                            <th>NO</th>
                                            <th>AKSI</th>
                                            <th>NAMA TINDAKAN</th>
                                            <th>TANGGAL TINDAKAN</th>
                                            <th>BIAYA TINDAKAN </th>
                                            <th>JUMLAH TINDAKAN</th>
                                            <th>STAFF REQUEST</th>
                                            <th>STAFF KONFIRMASI</th>
                                            <th>RINGKASAN</th>
                                            <th>KETERANGAN</th>
                                        </tr>
                                    </tfoot>
                                    <tbody style="color: black">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                            </div>
                            <div class="col-md-4 pull-right mt-20">
                                <div class="table-wrap" style="width: 85%; margin-bottom:40px;">
                                    <div class="table-responsive ">
                                        <table class="table table-hover display " id="outTotalHargaLabor">
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
                    <!-- End Tindakan Labor -->

                    <div class="form-body mt-10 collapse" id="collapse_form_labor">
                        <h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO RESEP
                        </h6>
                        <hr width="95%">
                        <form id="formLabor">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">TANGGAL</label>
                                        <div class="col-md-9 has-success">
                                            <input type="text" class="form-control" id="labTgl" disabled value="<?php date_default_timezone_set('Asia/Jakarta');
                                                                                                                echo date("Y-m-d H:i:s"); ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">DIAGNOSA</label>
                                        <div class="col-md-9 has-success">
                                            <input type="text" class="form-control" id="labDiagnosa" placeholder="Diagnosa">
                                            <span class="help-block"></span>
                                            <input type="hidden" class="form-control" disabled id="inPelLab">
                                            <input type="hidden" class="form-control" disabled id="inHisLab">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">RINGKASAN</label>
                                        <div class="col-md-9 has-success">
                                            <textarea class="form-control" id="labRingkasan" placeholder="Ringkasan" cols="30" rows="5"></textarea>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">KETERANGAN</label>
                                        <div class="col-md-9 has-success">
                                            <textarea class="form-control" id="labKet" placeholder="Keterangan" cols="30" rows="5"></textarea>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 collapse" id="pembayaran">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">PEMBAYARAN</label>
                                        <div class="col-md-9 has-success">
                                            <select class="form-control filled-input select2" style="border: 1px solid lightgreen;" name="inPembayaran" id="inPembayaran">
                                                <option value="ditanggung" selected>DITANGGUNG ASURANSI</option>
                                                <option value="tidak">TIDAK DITANGGUNG ASURANSI</option>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- <input type="hidden" class="form-control" id="inPelLab">
							<input type="hidden" class="form-control" id="inHisResep"> -->
                        <span class="help-block"></span>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <button onclick="insert_form_labor()" class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
                                        <!-- <button onclick="insert_na_obat()" class="btn btn-warning btn-anim  btn-sm ml-20 mt-5" id="na_obat"><i class="icon-rocket"></i><span class="btn-text">N/A</span> -->
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="modal-body mt-30">
                <h6 class="txt-dark capitalize-font pl-20"><i class="icon-list mr-10"></i>TINDAKAN</h6>
                <hr width="95%">
                <button class="btn btn-primary btn-anim ml-20 mb-20" onclick="show_form()"><i class="icon-plus"></i><span class="btn-text">TAMBAH FORM</span></button>
                <div class="table-wrap" style="width: 100%; margin: auto ">
                    <div class="table-responsive">
                        <table class="table table-hover display  pb-60" id="tableFormLabor">
                            <thead>
                                <tr class="bg-success">
                                    <th>NO</th>
                                    <th>REQUEST</th>
                                    <th>TINDAKAN</th>
                                    <th>HAPUS</th>
                                    <th>TANGGAL</th>
                                    <th>JAM</th>
                                    <th>DIAGNOSA</th>
                                    <th>RINGKASAN</th>
                                    <th>KETERANGAN</th>

                                </tr>
                            </thead>
                            <tbody style="color: black">
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- <div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<button onclick="cetak_antrian()" class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i class="icon-rocket"></i><span class="btn-text">CETAK ANTRIAN APOTIK</span>
						</div>
					</div>
				</div> -->
            </div>

        </div>
    </div>
</div>
<!-- End -->

<!-- Edit Labor Prioritas  -->
<div class="modal fade bs-example-modal-lg" id="modal_labor_prio" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h5 class="modal-title" id="myLargeModalLabel"><i class="icon-user mr-10"></i> TINDAKAN REQUEST LABOR PRIORITAS
                </h5>
            </div>
            <div class="modal-body">
                <div class="form-wrap">
                    <!-- /formbody -->
                    <!-- Tindakan Labor -->
                    <div class="form-body mt-10 collapse" id="collapse_tindakan_labor_prioritas">
                        <h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO TINDAKAN
                        </h6>
                        <hr width="95%">
                        <div class="collapse" id="formTinLabor2">
                            <form id="form_labor">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">TINDAKAN LABOR</label>
                                            <div class="col-md-9 has-success" onchange="pilihTindakanLaborPrioritas()">
                                                <select class="form-control filled-input select2" style="border: 1px solid lightgreen;" tabindex="1" name="inTindakanLabor" id="inTindakanLaborPrioritas">
                                                    <option value="-">-</option>
                                                    <!-- </?php
                                                    foreach ($tindakan_labor_prio as $row) :
                                                        $harga = $row['harga']; ?>
                                                        <option value="</?php echo $row['id_daftar_tindakan'] . "|" . $harga . "|" .  $row['nama'] . "|" .  $row['kode_lis']; ?>">
                                                            </?php echo $row['nama']; ?></option>
                                                    </?php endforeach ?> -->
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->

                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">JUMLAH TINDAKAN</label>
                                            <div class="col-md-9 has-error">
                                                <input type="text" class="form-control " id="inJumlahLaborPrioritas" disabled placeholder="jumlah" oninput="hargaTotalLabor()">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <span class="help-block"></span>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">BIAYA TINDAKAN</label>
                                            <div class="col-md-9 has-error">
                                                <input type="text" class="form-control" disabled id="outBiayaTindakanLaborPrioritas">
                                                <input type="hidden" class="form-control" disabled id="id_pel_lab">
                                                <input type="hidden" class="form-control" disabled id="id_his_lab">
                                                <input type="hidden" class="form-control" disabled id="id_form_lab">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">TOTAL HARGA</label>
                                            <div class="col-md-9 has-error">
                                                <input type="text" class="form-control " disabled id="outTotalLaborPrioritas">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <span class="help-block"></span>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">KETERANGAN</label>
                                            <div class="col-md-9 has-success">
                                                <textarea class="form-control" id="keteranganLaborPrioritas" disabled rows="13" style="max-width:95%; "></textarea>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">RINGKASAN KLINIS</label>
                                            <div class="col-md-9 has-success">
                                                <textarea class="form-control" id="ringkasanLaborPrioritas" disabled rows="13" style="max-width:95%; "></textarea>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <span class="help-block"></span>
                            </form>
                            <div class="row">
                                <div class="col-md-12" style="padding-right:45px;">
                                    <div class="form-group pull-right">
                                        <button onclick="insert_labor_prioritas()" class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Detail Tindakan -->
                        <div class="collapse" id="detailTindakanLabor">
                            <div class="form-body mb-30">
                                <h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>DETAIL
                                    TINDAKAN
                                </h6>
                                <hr width="95%">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">NAMA TINDAKAN</label>
                                            <div class="col-md-9 has-error">
                                                <input type="text" class="form-control" disabled id="outNama">
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">TANGGAL TINDAKAN</label>
                                            <div class="col-md-9 has-error">
                                                <input type="text" class="form-control" id="outTanggal" disabled>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <span class="help-block"></span>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">BIAYA TINDAKAN</label>
                                            <div class="col-md-9 has-error">
                                                <input type="text" class="form-control" disabled id="outHarga">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">JUMLAH TINDAKAN</label>
                                            <div class="col-md-9 has-error">
                                                <input type="text" class="form-control" id="outFrek" disabled>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <span class="help-block"></span>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">RINGKASAN</label>
                                            <div class="col-md-9 has-error">
                                                <textarea class="form-control" id="outRing" rows="13" style="max-width:95%; "></textarea>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">KETERANGAN</label>
                                            <div class="col-md-9 has-error">
                                                <textarea class="form-control" id="outKeta" rows="13" style="max-width:95%; "></textarea>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- End -->

                        </div>
                        <h6 class="txt-dark capitalize-font pl-20"><i class="icon-list mr-10"></i>TINDAKAN</h6>
                        <hr width="95%">
                        <div class="table-wrap" style="width: 100%; margin: auto ">
                            <div class="table-responsive">
                                <table class="table table-hover display  pb-60" id="tablelaborPrioritas">
                                    <thead>
                                        <tr class="bg-success">
                                            <th>NO</th>
                                            <th>AKSI</th>
                                            <th>NAMA TINDAKAN</th>
                                            <th>TANGGAL TINDAKAN</th>
                                            <th>BIAYA TINDAKAN </th>
                                            <th>JUMLAH TINDAKAN</th>
                                            <th>STAFF REQUEST</th>
                                            <th>STAFF KONFIRMASI</th>
                                            <th>RINGKASAN</th>
                                            <th>KETERANGAN</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr class="bg-success">
                                            <th>NO</th>
                                            <th>AKSI</th>
                                            <th>NAMA TINDAKAN</th>
                                            <th>TANGGAL TINDAKAN</th>
                                            <th>BIAYA TINDAKAN </th>
                                            <th>JUMLAH TINDAKAN</th>
                                            <th>STAFF REQUEST</th>
                                            <th>STAFF KONFIRMASI</th>
                                            <th>RINGKASAN</th>
                                            <th>KETERANGAN</th>
                                        </tr>
                                    </tfoot>
                                    <tbody style="color: black">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                            </div>
                            <div class="col-md-4 pull-right mt-20">
                                <div class="table-wrap" style="width: 85%; margin-bottom:40px;">
                                    <div class="table-responsive ">
                                        <table class="table table-hover display " id="outTotalHargaLaborPrioritas">
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
                    <!-- End Tindakan Labor Prioritas -->

                    <div class="form-body mt-10 collapse" id="collapse_form_labor_prioritas">
                        <h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO RESEP
                        </h6>
                        <hr width="95%">
                        <form id="formLabor">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">TANGGAL</label>
                                        <div class="col-md-9 has-success">
                                            <input type="text" class="form-control" id="labTgl" disabled value="<?php date_default_timezone_set('Asia/Jakarta');
                                                                                                                echo date("Y-m-d H:i:s"); ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">DIAGNOSA</label>
                                        <div class="col-md-9 has-success">
                                            <input type="text" class="form-control" id="labDiagnosa_prioritas" placeholder="Diagnosa">
                                            <span class="help-block"></span>
                                            <input type="hidden" class="form-control" disabled id="inPelLab">
                                            <input type="hidden" class="form-control" disabled id="inHisLab">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">RINGKASAN</label>
                                        <div class="col-md-9 has-success">
                                            <textarea class="form-control" id="labRingkasan_prioritas" placeholder="Ringkasan" cols="30" rows="5"></textarea>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">KETERANGAN</label>
                                        <div class="col-md-9 has-success">
                                            <textarea class="form-control" id="labKet_prioritas" placeholder="Keterangan" cols="30" rows="5"></textarea>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- <input type="hidden" class="form-control" id="inPelLab">
							<input type="hidden" class="form-control" id="inHisResep"> -->
                        <span class="help-block"></span>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <button onclick="insert_form_labor_prioritas()" class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
                                        <!-- <button onclick="insert_na_obat()" class="btn btn-warning btn-anim  btn-sm ml-20 mt-5" id="na_obat"><i class="icon-rocket"></i><span class="btn-text">N/A</span> -->
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="modal-body mt-30">
                <h6 class="txt-dark capitalize-font pl-20"><i class="icon-list mr-10"></i>TINDAKAN</h6>
                <hr width="95%">
                <button class="btn btn-primary btn-anim ml-20 mb-20" onclick="show_form_prioritas()"><i class="icon-plus"></i><span class="btn-text">TAMBAH FORM</span></button>
                <div class="table-wrap" style="width: 100%; margin: auto ">
                    <div class="table-responsive">
                        <table class="table table-hover display  pb-60" id="tableFormLaborPrioritas">
                            <thead>
                                <tr class="bg-success">
                                    <th>NO</th>
                                    <th>REQUEST</th>
                                    <th>TINDAKAN</th>
                                    <th>HAPUS</th>
                                    <th>TANGGAL</th>
                                    <th>JAM</th>
                                    <th>DIAGNOSA</th>
                                    <th>RINGKASAN</th>
                                    <th>KETERANGAN</th>

                                </tr>
                            </thead>
                            <tbody style="color: black">
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- <div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<button onclick="cetak_antrian()" class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i class="icon-rocket"></i><span class="btn-text">CETAK ANTRIAN APOTIK</span>
						</div>
					</div>
				</div> -->
            </div>

        </div>
    </div>
</div>
<!-- End -->


<!-- Edit Radiologi -->
<div class="modal fade bs-example-modal-lg" id="modal_radiologi" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h5 class="modal-title" id="myLargeModalLabel"><i class="icon-user mr-10"></i> TINDAKAN REQUEST RADIOLOGI
                </h5>
            </div>
            <div class="modal-body">
                <div class="form-wrap">
                    <!-- /formbody -->
                    <div class="form-body mt-10">
                        <h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO TINDAKAN
                        </h6>
                        <hr width="95%">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label col-md-3">TINDAKAN RADIOLOGI</label>
                                    <div class="col-md-9 has-success" onchange="pilihTindakanRadiologi()">
                                        <select class="form-control filled-input select2" style="border: 1px solid lightgreen;" tabindex="1" name="inTindakanRadiologi" id="inTindakanRadiologi">
                                            <option value="-">-</option>
                                            <!-- </?php
                                            foreach ($tindakan_radiologi as $row) :
                                                $harga = $row['harga']; ?>
                                                <option value="</?php echo $row['id_daftar_tindakan'] . "|" . $harga . "|" .  $row['nama']; ?>">
                                                    </?php echo $row['nama']; ?></option>
                                            </?php endforeach ?> -->
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!--/span-->

                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label col-md-3">JUMLAH TINDAKAN</label>
                                    <div class="col-md-9 has-error">
                                        <input type="text" class="form-control " id="inJumlahRadiologi" disabled placeholder="jumlah" oninput="hargaTotalRadiologi()">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <span class="help-block"></span>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label col-md-3">BIAYA TINDAKAN</label>
                                    <div class="col-md-9 has-error">
                                        <input type="text" class="form-control" disabled id="outBiayaTindakanRadiologi">
                                        <input type="hidden" class="form-control" disabled id="id_pel_rad">
                                        <input type="hidden" class="form-control" disabled id="id_his_rad">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">TOTAL HARGA</label>
                                    <div class="col-md-9 has-error">
                                        <input type="text" class="form-control " disabled id="outTotalRadiologi">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label col-md-3">DIAGNOSA<span class="text-danger">*</span></label>
                                    <div class="col-md-9 has-success">
                                        <input type="text" class="form-control" id="inDiagnosa">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 collapse" id="pembayaran1">
                                <div class="form-group ">
                                    <label class="control-label col-md-3">PEMBAYARAN</label>
                                    <div class="col-md-9 has-success">
                                        <select class="form-control filled-input select2" style="border: 1px solid lightgreen;" name="inPembayaran1" id="inPembayaran1">
                                            <option value="ditanggung" selected>DITANGGUNG ASURANSI</option>
                                            <option value="tidak">TIDAK DITANGGUNG ASURANSI</option>

                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <span class="help-block"></span>

                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group pull-right">
                                    <button onclick="insert_radiologi()" class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
                                        <!-- <button onclick="insert_na_radio()" class="btn btn-warning btn-anim  btn-sm ml-20 mt-5" id="na_radio"><i class="icon-rocket"></i><span class="btn-text">N/A</span> -->
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="modal-body mt-10">
                <h6 class="txt-dark capitalize-font pl-20"><i class="icon-list mr-10"></i>TINDAKAN</h6>
                <hr width="95%">
                <div class="table-wrap" style="width: 95%; margin: auto ">
                    <div class="table-responsive">
                        <table class="table table-hover display  pb-60" id="tableradiologi">
                            <thead>
                                <tr class="bg-success">
                                    <th>NO</th>
                                    <th>HAPUS</th>
                                    <!-- <th>AKSI</th> -->
                                    <th>EXPERTISE</th>
                                    <th>NAMA</th>
                                    <th>TANGGAL TINDAKAN</th>
                                    <th>BIAYA TINDAKAN </th>
                                    <th>JUMLAH TINDAKAN</th>
                                    <th>STAFF REQUEST</th>
                                    <th>STAFF KONFIRMASI</th>
                                    <th>DIAGNOSA</th>
                                    <th>GAMBAR</th>
                                    <!-- <th>KETERANGAN</th> -->
                                    <th>STATUS</th>
                                    <!-- <?php if ($izinAkses == "admin") { ?>
                                    <?php } ?> -->
                                </tr>
                            </thead>
                            <tbody style="color: black">
                            </tbody>
                            <tfoot>
                                <tr class="bg-success">
                                    <th>NO</th>
                                    <th>HAPUS</th>
                                    <!-- <th>AKSI</th> -->
                                    <th>EXPERTISE</th>
                                    <th>NAMA</th>
                                    <th>TANGGAL TINDAKAN</th>
                                    <th>BIAYA TINDAKAN </th>
                                    <th>JUMLAH TINDAKAN</th>
                                    <th>STAFF REQUEST</th>
                                    <th>STAFF KONFIRMASI</th>
                                    <th>DIAGNOSA</th>
                                    <th>GAMBAR</th>
                                    <!-- <th>KETERANGAN</th> -->
                                    <th>STATUS</th>
                                    <!-- <?php if ($izinAkses == "admin") { ?>
                                    <?php } ?> -->
                                </tr>
                            </tfoot>
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
                            <table class="table table-hover display " id="outTotalHargaRadiologi">
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



            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-12">

                        <!-- Detail Tindakan -->
                        <div class="collapse" id="detailTindakan">
                            <div class="form-body mb-30">
                                <h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>DETAIL
                                    TINDAKAN
                                </h6>
                                <hr width="95%">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">NAMA TINDAKAN</label>
                                            <div class="col-md-9 has-success">
                                                <input type="text" class="form-control" readonly id="outNama">
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->

                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">JUMLAH TINDAKAN</label>
                                            <div class="col-md-9 has-success">
                                                <input type="text" class="form-control" id="outFrek" readonly>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <span class="help-block"></span>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">BIAYA TINDAKAN</label>
                                            <div class="col-md-9 has-success">
                                                <input type="text" class="form-control" readonly id="outHarga">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">DOKTER PEMBACA</label>
                                            <div class="col-md-9 has-success">
                                                <input type="text" class="form-control" readonly id="outDokter">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <span class="help-block"></span>

                                <div class="row mt-10">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="row" style="margin-bottom:15px; margin-top:10px;">
                                                <div class="col-md-12">
                                                    <label class="control-label col-md-3">KETERANGAN</label>
                                                </div>
                                            </div>
                                            <div class="col-md-12 has-success">
                                                <textarea class="form-control" id="outKeterangan" rows="13" style="max-width:100%; " readonly></textarea>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End -->

<!-- Start Radiologi Prioritas -->
<div class="modal fade bs-example-modal-lg" id="modal_radiologi_prio" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h5 class="modal-title" id="myLargeModalLabel"><i class="icon-user mr-10"></i> TINDAKAN REQUEST RADIOLOGI PRIORITAS
                </h5>
            </div>
            <div class="modal-body">
                <div class="form-wrap">
                    <!-- /formbody -->
                    <div class="form-body mt-10">
                        <h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO TINDAKAN
                        </h6>
                        <hr width="95%">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label col-md-3">TINDAKAN RADIOLOGI</label>
                                    <div class="col-md-9 has-success" onchange="pilihTindakanRadiologiPrioritas()">
                                        <select class="form-control filled-input select2" style="border: 1px solid lightgreen;" tabindex="1" name="inTindakanRadiologi" id="inTindakanRadiologiPrioritas">
                                            <option value="-">-</option>
                                            <!-- </?php
                                            foreach ($tindakan_radiologi_prio as $row) :
                                                $harga = $row['harga']; ?>
                                                <option value="</?php echo $row['id_daftar_tindakan'] . "|" . $harga . "|" .  $row['nama']; ?>">
                                                    </?php echo $row['nama']; ?></option>
                                            </?php endforeach ?> -->
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!--/span-->

                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label col-md-3">JUMLAH TINDAKAN</label>
                                    <div class="col-md-9 has-error">
                                        <input type="text" class="form-control " id="inJumlahRadiologiPrioritas" disabled placeholder="jumlah" oninput="hargaTotalRadiologi()">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <span class="help-block"></span>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label col-md-3">BIAYA TINDAKAN</label>
                                    <div class="col-md-9 has-error">
                                        <input type="text" class="form-control" disabled id="outBiayaTindakanRadiologiPrioritas">
                                        <input type="hidden" class="form-control" disabled id="id_pel_rad">
                                        <input type="hidden" class="form-control" disabled id="id_his_rad">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">TOTAL HARGA</label>
                                    <div class="col-md-9 has-error">
                                        <input type="text" class="form-control " disabled id="outTotalRadiologiPrioritas">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label col-md-3">DIAGNOSA<span class="text-danger">*</span></label>
                                    <div class="col-md-9 has-success">
                                        <input type="text" class="form-control" id="inDiagnosaPrio">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <span class="help-block"></span>

                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group pull-right">
                                    <button onclick="insert_radiologi_prioritas()" class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
                                        <!-- <button onclick="insert_na_radio()" class="btn btn-warning btn-anim  btn-sm ml-20 mt-5" id="na_radio"><i class="icon-rocket"></i><span class="btn-text">N/A</span> -->
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="modal-body mt-10">
                <h6 class="txt-dark capitalize-font pl-20"><i class="icon-list mr-10"></i>TINDAKAN</h6>
                <hr width="95%">
                <div class="table-wrap" style="width: 95%; margin: auto ">
                    <div class="table-responsive">
                        <table class="table table-hover display  pb-60" id="tableradiologiPrioritas">
                            <thead>
                                <tr class="bg-success">
                                    <th>NO</th>
                                    <th>HAPUS</th>
                                    <!-- <th>AKSI</th> -->
                                    <th>EXPERTISE</th>
                                    <th>NAMA</th>
                                    <th>TANGGAL TINDAKAN</th>
                                    <th>BIAYA TINDAKAN </th>
                                    <th>JUMLAH TINDAKAN</th>
                                    <th>STAFF REQUEST</th>
                                    <th>STAFF KONFIRMASI</th>
                                    <th>DIAGNOSA</th>
                                    <th>GAMBAR</th>
                                    <!-- <th>KETERANGAN</th> -->
                                    <th>STATUS</th>
                                    <!-- <?php if ($izinAkses == "admin") { ?>
                                    <?php } ?> -->
                                </tr>
                            </thead>
                            <tbody style="color: black">
                            </tbody>
                            <tfoot>
                                <tr class="bg-success">
                                    <th>NO</th>
                                    <th>HAPUS</th>
                                    <!-- <th>AKSI</th> -->
                                    <th>EXPERTISE</th>
                                    <th>NAMA</th>
                                    <th>TANGGAL TINDAKAN</th>
                                    <th>BIAYA TINDAKAN </th>
                                    <th>JUMLAH TINDAKAN</th>
                                    <th>STAFF REQUEST</th>
                                    <th>STAFF KONFIRMASI</th>
                                    <th>DIAGNOSA</th>
                                    <th>GAMBAR</th>
                                    <!-- <th>KETERANGAN</th> -->
                                    <th>STATUS</th>
                                    <!-- <?php if ($izinAkses == "admin") { ?>
                                    <?php } ?> -->
                                </tr>
                            </tfoot>
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
                            <table class="table table-hover display " id="outTotalHargaRadiologiPrioritas">
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
<!-- END Radiologi Prioritas -->
<link rel="stylesheet" href="<?php echo base_url('assets/dist/jquery-ui.css'); ?>">
<script src="<?php echo base_url('assets/dist/jquery-ui.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/dist/jquery-ui.js'); ?>"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#inObat').autocomplete({
            source: function(query, response) {
                depo = $("#inDepo").val();

                $.ajax({
                    url: "<?php echo base_url(); ?>Poli/getNamaObat",
                    type: "POST",
                    dataType: "json",
                    data: {
                        query: query,
                        depo: depo
                    },

                    success: function(data) {
                        response(data);
                        // response($.map(data.message, function(item) {
                        //     return item.value;
                        // }));

                    },

                });
            },
            focus: function(event, ui) {
                $('#inObat').val(ui.item.value);
            },
            select: function(event, ui) {
                //$('#inObat').val(ui.item.nama);
                //alert(ui.item.value);
                $('#inIdLog').val(ui.item.id_logistik);
                $('#inHargaCost').val(ui.item.harga_cost);
                var cara_bayar = $('#cara_bayar').val();
                // if (cara_bayar == '31') {
                //     $('#inMargin').val('1.1');
                // } else {
                $('#inMargin').val(ui.item.margin);
                // }
                $('#inTglExp').val(ui.item.kadaluarsa);
                $('#inPpn').val(ui.item.ppn);
                $('#outStok').val(ui.item.stok);
                setHarga();
            },
            appendTo: "#modal_edit_resep"
        });

        $('#inSigna').autocomplete({
            source: function(query, response) {

                $.ajax({
                    url: "<?php echo base_url(); ?>Poli/getSigna",
                    type: "POST",
                    dataType: "json",
                    data: {
                        query: query,
                    },
                    success: function(data) {
                        response(data);
                    },
                });
            },
            focus: function(event, ui) {
                $('#inSigna').val(ui.item.value);
            },
            select: function(event, ui) {
                $('#inIdSigna').val(ui.item.id_signa);
            },
            appendTo: "#modal_edit_resep"
        });

        $('#inCaraPakai').autocomplete({
            source: function(query, response) {

                $.ajax({
                    url: "<?php echo base_url(); ?>Poli/getCaraPakai",
                    type: "POST",
                    dataType: "json",
                    data: {
                        query: query,
                    },
                    success: function(data) {
                        response(data);
                    },
                });
            },
            focus: function(event, ui) {
                $('#inCaraPakai').val(ui.item.value);
            },
            select: function(event, ui) {
                $('#inIdCaraPakai').val(ui.item.id_cara_pemakaian);
            },
            appendTo: "#modal_edit_resep"
        });
    });
</script>
<script type="text/javascript">
    function reload_data_tindakan(id_pelayanan) {
        $('#tabletindakan').dataTable().fnClearTable();
        $('#tabletindakan').dataTable().fnDestroy();
        $('#tabletindakan').DataTable({
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
                "url": '<?php echo base_url('Poli/tampil_list_tindakan'); ?>',
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

    function reload_total_harga_tindakan(id_pelayanan) {
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
                "url": '<?php echo base_url('Poli/tampil_total_harga'); ?>',
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

    function edit_data_tindakan(id_pelayanan, id_history) {
        $.ajax({
            url: "<?= base_url() . 'Erm_poli/getdata_tindakan' ?>",
            data: {
                pelayanan: id_pelayanan,
                history: id_history
            },
            type: 'POST',
            dataType: 'json',
            success: function(data) {
                if (data.status_dt == "found") {

                    $("#idPelayanan").val(id_pelayanan);
                    $("#idHistory").val(id_history);
                    if (data.data['dpjp'] == 'K5M6TR1' && data.data['nama_poli'] == 'HLGI4176K8') {
                        dpjp = 'XFG7OIDOJJ';
                    } else {
                        dpjp = data.data['dpjp'];
                    }

                    var html = '';
                    var i;
                    html = '<option value="">-</option>';
                    for (i = 0; i < data.tindakan_poli.length; i++) {
                        harga = Number(data.tindakan_poli[i].harga_sarana) + Number(data.tindakan_poli[i].harga_jasa);

                        html += '<option value="' + data.tindakan_poli[i].id_list_tindakan + '|' + harga + '|' + data.tindakan_poli[i].nama_tindakan + '|' + data.tindakan_poli[i].kelompok_eklaim + '">' + data.tindakan_poli[i].nama_tindakan + '</option>';
                    }
                    $('#inTindakan').html(html);

                    var html1 = '';
                    var j;
                    html1 = '<option value="">-</option>';
                    for (j = 0; j < data.dokter.length; j++) {

                        html1 += '<option value="' + data.dokter[j].id_dokter + '">' + data.dokter[j].nama + '</option>';
                    }
                    $('#inDPJP').html(html1);

                    $("#inDPJP").val(dpjp).change();

                    if (data.data.id_cara_bayar == '42') {
                        $('#pembayaran2').collapse('hide');
                    } else {
                        $('#pembayaran2').collapse('show');
                    }

                    $("#modal_edit_data").modal('show');
                    reload_data_tindakan(id_pelayanan);
                    reload_total_harga_tindakan(id_pelayanan);
                } else {
                    alert("data tidak ditemukan");
                }
            }
        });
    }

    function hapus_data_tindakan(id_tindakan, id_pelayanan, nama_tindakan) { //utk hapus diagnosa pasien
        swal({
            title: "Apakah kamu yakin?",
            text: "Menghapus data " + nama_tindakan + "?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3cb878",
            confirmButtonText: "Yakin",
            cancelButtonText: "Batal",
            closeOnConfirm: false
        }, function() {
            $().ready(function() {
                $.ajax({
                    url: "<?php echo base_url() ?>Poli/hapus_data_tindakan",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        id_tindakan: id_tindakan,
                    },
                    success: function(data) {
                        if (data.status == "success") {
                            swal({
                                title: "good job!",
                                type: "success",
                                text: "Data Berhasil dihapus",
                                buttons: false,
                                timer: 800
                            });
                            $('#tabletindakan').DataTable().ajax.reload();
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
                });
            });

        });
        return false;
    }
</script>

<script type="text/javascript">
    function pilihTindakan() {
        a = $("#inTindakan").val();
        splitDiag = a.split("|");

        harga = parseFloat(splitDiag[1]);
        $("#outBiayaTindakan").val(convertToRupiah(harga));
        document.getElementById("inJumlah").value = "1";
        document.getElementById("outTotal").value = convertToRupiah(harga);
    }

    function convertToRupiah(angka) {
        var rupiah = '';
        var angkarev = angka.toString().split('').reverse().join('');
        for (var i = 0; i < angkarev.length; i++)
            if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + '.';
        return 'Rp. ' + rupiah.split('', rupiah.length - 1).reverse().join('');
    }

    function hargaTotal() {
        splitDiag = a.split("|");
        harga = parseFloat(splitDiag[1]);
        frek = parseFloat($("#inJumlah").val());
        total = harga * frek;

        $("#outTotal").val(convertToRupiah(total));

    }

    function insert_tindakan() {
        a = $("#inTindakan").val();
        dokter = $("#inDPJP").val();
        splitDiag = a.split("|");
        harga = parseFloat(splitDiag[1]);
        frek = parseFloat($("#inJumlah").val());
        total = harga * frek;
        var ID = Math.random().toString(36).substr(2, 16);
        idPelayanan = $('#idPelayanan').val();
        id_list_tindakan = $('#id_list_tindakan_gigi').val();
        nama_dokter = $.trim($("#inDPJP").children("option:selected").text())
        // count = $("#jumTindakan").val();
        id_history = $('#idHistory').val();
        status_pembayaran = $('#inPembayaran2').val();

        dataString = 'id_tindakan_poli_gigi=' + ID + '&harga=' + harga +
            '&idPelayanan=' + idPelayanan + '&id_list_tindakan=' + splitDiag[0] +
            '&frek=' + frek + '&total=' + total + '&nama_tindakan=' + splitDiag[2] +
            '&dokter=' + dokter + '&id_history=' + id_history + '&nama_dokter=' + nama_dokter +
            '&eklaim=' + splitDiag[3] + '&status_pembayaran=' + status_pembayaran;
        $.ajax({
            url: "<?= base_url() . 'Poli/insert_tindakan' ?>",
            method: "POST",
            cache: false,
            dataType: 'json',
            data: dataString,
            success: function(data) {
                if (data.status == "success") {
                    $.toast({
                        heading: 'Success!',
                        text: 'Tindakan ini telah ditambah',
                        showHideTransition: 'fade',
                        icon: 'success'
                    });
                    $('#outBiayaTindakan').val('');
                    $('#inJumlah').val('1');
                    $('#outTotal').val('');
                    $('#outTotalHarga').DataTable().ajax.reload();
                    $('#tabletindakan').DataTable().ajax.reload();
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
    //Obat
    function convertToRupiah(angka) {
        var rupiah = '';
        var angkarev = angka.toString().split('').reverse().join('');
        for (var i = 0; i < angkarev.length; i++)
            if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + '.';
        return 'Rp. ' + rupiah.split('', rupiah.length - 1).reverse().join('');
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
                "url": '<?php echo base_url('Poli/tampil_resep'); ?>',
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
                "url": '<?php echo base_url('Poli/tampil_racikan'); ?>',
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
                "url": '<?php echo base_url('Poli/tampil_obat'); ?>',
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

    function cetak_antrian() {
        id_pelayanan = $('#inPelResep').val();
        $.ajax({
            url: "<?php echo base_url() ?>Poli/insertAntrian",
            method: "POST",
            data: {
                id_pelayanan: id_pelayanan,
            },

            success: function() {
                window.location.href = '<?php echo base_url() ?>Poli/print_antrian_apotik';

            }
        })

    }

    function edit_obat(idPel, idHis) {

        $('#inDepo1').val('APOTIK').change();
        $('#kronis').show();

        $('#inPelResep').val(idPel);
        $('#inHisResep').val(idHis);
        $("#modal_edit_resep").modal('show');
        $("#collap_nonracikan").collapse('hide');
        $("#collap_racikan").collapse('hide');
        reload_data_resep(idPel, idHis);

    }

    function pilih_obat(idResep, tipe, cara_bayar, depo) {
        if (tipe == 2) {
            $('#form_racikan').show();
            $('#inResObat').val(idResep);
            $('#inDepo').val(depo);
            getObat(depo);
            $("#collap_racikan").collapse('toggle');
            $("#collap_nonracikan").collapse('hide');
            reload_total_obat(idResep);
            reload_data_racikan(idResep);
        } else {
            $('#formObat').show();
            $('#inDepo').val(depo);
            getObat(depo);
            $('#cara_bayar').val(cara_bayar);
            $('#tipe_resep').val(tipe);
            $('#inResObat').val(idResep);
            $("#collap_nonracikan").collapse('toggle');
            $("#collap_racikan").collapse('hide');
            reload_total_obat(idResep);
            reload_data_obat(idResep);
        }
    }

    function pilih_obat1(idResep, tipe, cara_bayar, depo) {

        if (tipe == 2) {
            $('#inDepo').val(depo);
            getObat(depo);
            $('#form_racikan').hide();
            $("#collap_racikan").collapse('toggle');
            $("#collap_nonracikan").collapse('hide');
            reload_total_obat(idResep);
            reload_data_racikan(idResep);

        } else {
            $('#inDepo').val(depo);
            getObat(depo);
            $('#formObat').hide();
            $("#collap_nonracikan").collapse('toggle');
            $("#collap_racikan").collapse('hide');
            $('#cara_bayar').val(cara_bayar);
            reload_total_obat(idResep);
            reload_data_obat(idResep);
        }
    }

    function batalFarmasi() {
        $("#collap_nonracikan").collapse('hide');
        $("#collap_racikan").collapse('hide');
    }

    function insert_resep() {
        jenis_resep = $('#inJenisResep').val();
        nama_resep = $('#inNamaResep').val();
        depo = $('#inDepo1').val();
        id_pelayanan = $('#inPelResep').val();
        id_history = $('#inHisResep').val();
        $.ajax({
            url: "<?= base_url() . 'Poli/insert_resep' ?>",
            method: "POST",
            dataType: 'json',
            data: {
                jenis_resep: jenis_resep,
                nama_resep: nama_resep,
                depo: depo,
                id_pelayanan: id_pelayanan,
                id_history: id_history
            },
            success: function(data) {
                if (data.status == "success") {
                    $.toast({
                        heading: 'Success!',
                        text: 'Tindakan ini telah ditambah',
                        showHideTransition: 'fade',
                        icon: 'success'
                    });
                    $('#inJenisResep').val(1).change();
                    $('#inNamaResep').val('');
                    $("#collap_nonracikan").collapse('hide');
                    $("#collap_racikan").collapse('hide');
                    $('#tableresep').DataTable().ajax.reload();
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

    function insert_resep_racikan() {
        resep = $('#inResep').val();
        id_resep = $('#inResObat').val();
        signa = $('#inSigna1').val();
        cara_pakai = $('#inCaraPakai1').val();

        $.ajax({
            url: "<?= base_url() . 'Poli/insert_resep_racikan' ?>",
            method: "POST",
            dataType: 'json',
            data: {
                resep: resep,
                id_resep: id_resep,
                signa: signa,
                cara_pakai: cara_pakai

            },
            success: function(data) {
                if (data.status == "success") {
                    $.toast({
                        heading: 'Success!',
                        text: 'Tindakan ini telah ditambah',
                        showHideTransition: 'fade',
                        icon: 'success'
                    });

                    $('#inResep').val('');
                    $('#inSigna1').val(signa).change();
                    $('#inCaraPakai1').val(cara_pakai).change();
                    $("#collap_nonracikan").collapse('hide');
                    $("#collap_racikan").collapse('show');
                    $('#tableRacikan').DataTable().ajax.reload();
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

    function insert_Obat() {
        id_pelayanan = $('#inPelResep').val();
        id_history = $('#inHisResep').val();
        id_resep = $('#inResObat').val();

        caraBayar = $('#cara_bayar').val();
        tipe = $('#tipe_resep').val();

        depo = $("#inDepo").val();


        ket = $("#inKeteranganObat").val();
        id_list_tindakan = $("#inIdLog").val();

        harga = $("#inHargaCost").val();
        ppn = $("#inPpn").val();
        margin = $("#inMargin").val();


        ppn = harga * (ppn / 100);
        harga = Number(harga) + Number(ppn);
        hargaMargin = Number(harga) * Number(margin);

        frek = parseFloat($("#inJumlahObat").val());
        disc = parseFloat($("#inDisc").val());
        expire = $('#inTglExp').val();
        jumlahKurang = frek * -1;

        // if ((caraBayar == "WA14BJ84" && tipe == "1") || (caraBayar == "WA14BJ84" && tipe == "2")) {
        //     total = harga * frek;
        // } else if (caraBayar == "WA14BJ84" && tipe == "3") {
        //     total = (harga * (parseFloat(splitDiag[2]) - (disc / 100))) * frek;
        // } else {
        total = hargaMargin * frek;

        //}
        signa = $('#inSigna').val();
        cara_pakai = $('#inCaraPakai').val();
        $.ajax({
            url: "<?= base_url() . 'Poli/insert_obat' ?>",
            method: "POST",
            dataType: 'json',
            cache: false,
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
                jenis_pelayanan: 'POLI',
                tipe: tipe
            },
            success: function(data) {
                $('#tableobat').DataTable().ajax.reload();

                if (data.status == "success") {

                    // swal({
                    // 	title: "good job!",
                    // 	type: "success",
                    // 	text: "Tindakan ini Telah di Simpan!",
                    // 	confirmButtonColor: "#3cb878",
                    // });
                    $.toast({
                        heading: 'Success!',
                        text: 'Tindakan ini telah ditambah',
                        showHideTransition: 'fade',
                        icon: 'success'
                    });
                    //$('#formObat')[0].reset();

                    $("#collap_nonracikan").collapse('show');

                    $("#collap_racikan").collapse('hide');
                    //getObat(depo);
                    $('#inObat').val('').change();
                    $('#inTglExp').val('');
                    $("#inKeteranganObat").removeData();
                    $("#inJumlahObat").val('1');
                    $("#inDisc").val(0);
                    $("#outBiayaTindakanObat").val('');
                    $("#outBiayaMarginObat").val('');
                    $("#outStok").val('0');
                    $("#outTotalObat").val('');
                    $('#inSigna').val(signa).change();
                    $('#inCaraPakai').val(cara_pakai).change();

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
                    url: "<?php echo base_url() ?>Poli/hapus_obat",
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
                                buttons: false,
                                timer: 800
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

    function hapus_racikan(id_racikan) {
        swal({
            title: "Apakah kamu yakin?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3cb878",
            confirmButtonText: "Yakin",
            cancelButtonText: "Batal",
            closeOnConfirm: false
        }, function() {
            $().ready(function() {
                $.ajax({
                    url: "<?php echo base_url() ?>Poli/hapus_racikan",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        id_racikan: id_racikan
                    },
                    success: function(data) {
                        if (data.status == "success") {
                            $('#tableRacikan').DataTable().ajax.reload();
                            swal({
                                title: "good job!",
                                type: "success",
                                text: "Data Berhasil dihapus",
                                buttons: false,
                                timer: 800
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

    function request(id_resep, jenis_resep, id_pelayanan, tipe) {
        $.ajax({
            url: "<?= base_url() . 'Poli/request_resep' ?>",
            method: "POST",
            dataType: 'json',
            data: {
                id_resep: id_resep,
                jenis_resep: jenis_resep,
                id_pelayanan: id_pelayanan,
                tipe: tipe
            },
            success: function(data) {
                if (data.status == "success") {
                    $.toast({
                        heading: 'Success!',
                        text: 'Tindakan ini telah ditambah',
                        showHideTransition: 'fade',
                        icon: 'success'
                    });
                    $('#tableresep').DataTable().ajax.reload();
                    //$('#tableobat').DataTable().ajax.reload();
                    //$('#tableRacikan').DataTable().ajax.reload();

                } else if (data.status == "error") {
                    swal({
                        title: "Tindakan Belum Diisi",
                        type: "warning",
                        text: "Silahkan isi tindakan terlebih dahulu",
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

    function cetakSigna1() {
        // id_resep = $('#inResObat').val();
        id_tindakan = $('#inResObat1').val();
        signa = $('#inSigna').val();
        cara_pakai = $('#inCaraPakai').val();
        $.ajax({
            url: "<?php echo base_url() ?>Apotik/cetak_signa",
            method: "POST",
            dataType: 'json',
            data: {
                signa: signa,
                cara_pakai: cara_pakai,
                id_tindakan: id_tindakan
            },
            success: function(data) {
                if (data.status == "success") {
                    window.location.href = '<?php echo base_url() ?>Apotik/print_signa/' + id_tindakan;

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

    function cetakSigna(id, id_resep) {
        id_tindakan = id;
        window.location.href = '<?php echo base_url() ?>Apotik/print_signa/' + id_tindakan;

    }
    // $(document).ready(function() {

    //     $('#inObat').change(function() {
    //         obat = $('#inObat').val();
    //         splitDiag = obat.split("|");
    //         tgl = splitDiag[3];
    //         $('#inTglExp').val(tgl);
    //         stok = splitDiag[4];
    //         $("#outStok").val(stok);
    //     });
    // });

    function getObat(depo) {
        if (depo != '') {
            $.ajax({
                url: "<?php echo base_url(); ?>Erm_poli/getSigna",
                method: "GET",
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    var i;
                    html = '<option value="-">-</option>';
                    for (i = 0; i < data.signa.length; i++) {
                        html += '<option value="' + data.signa[i].id_signa + '">' + data.signa[i].tindakan + '</option>';
                    }
                    $('select[name="inSigna"]').html(html);

                    var html1 = '';
                    var j;
                    html1 = '<option value="-">-</option>';
                    for (j = 0; j < data.cara_pemakaian_obat.length; j++) {
                        html1 += '<option value="' + data.cara_pemakaian_obat[j].id_cara_pemakaian + '">' + data.cara_pemakaian_obat[j].cara_pemakaian + '</option>';
                    }
                    $('select[name="inCaraPakai"]').html(html1);
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
        //plitDiag = obat.split("|");
        //stok = (splitDiag[4]);
        disc = parseFloat($("#inDisc").val());
        if (disc > 35) {
            disc = 35;
        }
        if (caraBayar == "WA14BJ84") {
            disc = 0;
        }

        $("#inDisc").val(disc);


        harga = $("#inHargaCost").val();
        ppn = $("#inPpn").val();
        margin = $("#inMargin").val();


        ppn = harga * (ppn / 100);
        harga = Number(harga) + Number(ppn);
        hargaMargin = Number(harga) * Number(margin);
        //(harga);
        $("#outBiayaTindakanObat").val(convertToRupiah(harga.toFixed(0)));
        $("#outBiayaMarginObat").val(convertToRupiah(hargaMargin.toFixed(0)));



        frek = parseFloat($("#inJumlahObat").val());

        // 		  if (document.getElementById('inRadioCost').checked ) {
        // if ((caraBayar == "WA14BJ84" && tipe == "1") || (caraBayar == "WA14BJ84" && tipe == "2")) {
        //     total = harga * frek;
        // } else if (caraBayar == "WA14BJ84" && tipe == "3") {
        //     total = (harga * (parseFloat(splitDiag[2]) - (disc / 100))) * frek;
        // } else {
        total = hargaMargin * frek;
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

    // Radiologi
    function insert_radiologi() {
        a = $("#inTindakanRadiologi").val();
        splitDiag = a.split("|");
        harga = parseFloat(splitDiag[1]);
        frek = parseFloat($("#inJumlahRadiologi").val());
        total = harga * frek;
        id_pel_rad = $('#id_pel_rad').val();
        id_his_rad = $('#id_his_rad').val();
        id_list_tindakan = $('#id_daftar_tindakan').val();
        nama = $('#nama').val();
        diagnosa = $('#inDiagnosa').val();
        var ID = Math.random().toString(36).substr(2, 16);
        jenis_pelayanan = 'POLI';
        status_pembayaran = $('#inPembayaran1').val();

        dataString = 'id=' + ID + '&harga=' + harga +
            '&id_pel_rad=' + id_pel_rad + '&id_his_rad=' + id_his_rad + '&id_list_tindakan=' + splitDiag[0] +
            '&frek=' + frek + '&total=' + total + '&jenis_pelayanan=' + "POLI" + '&diagnosa=' + diagnosa +
            '&status_pembayaran=' + status_pembayaran;
        $.ajax({
            url: "<?= base_url() . 'Poli/insert_radiologi' ?>",
            method: "POST",
            dataType: 'json',
            data: dataString,
            success: function(data) {
                if (data.status == "success") {
                    $.toast({
                        heading: 'Success!',
                        text: 'Tindakan ini telah ditambah',
                        showHideTransition: 'fade',
                        icon: 'success'
                    });
                    $('#outBiayaTindakanRadiologi').val('');
                    $('#inJumlahRadiologi').val('');
                    $('#outTotalRadiologi').val('');
                    $('#tableradiologi').DataTable().ajax.reload();
                    $('#outTotalHargaRadiologi').DataTable().ajax.reload();
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

    function pilihTindakanRadiologi() {
        a = $("#inTindakanRadiologi").val();
        splitDiag = a.split("|");

        harga = parseFloat(splitDiag[1]);
        $("#outBiayaTindakanRadiologi").val(convertToRupiah(harga));
        document.getElementById("inJumlahRadiologi").value = "1";
        document.getElementById("outTotalRadiologi").value = convertToRupiah(harga);
    }

    function reload_total_radiologi(id_pelayanan) {
        $('#outTotalHargaRadiologi').dataTable().fnClearTable();
        $('#outTotalHargaRadiologi').dataTable().fnDestroy();
        $('#outTotalHargaRadiologi').DataTable({
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
                "url": '<?php echo base_url('Poli/tampil_total_radiologi'); ?>',
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

    function reload_data_radiologi(id_pel_rad) {
        $('#tableradiologi').dataTable().fnClearTable();
        $('#tableradiologi').dataTable().fnDestroy();
        $('#tableradiologi').DataTable({
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
                "url": '<?php echo base_url('Poli/tampil_list_radiologi'); ?>',
                "type": 'POST',
                "data": {
                    id_pelayanan: id_pel_rad
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

    function edit_radiologi(id_pelayanan, id_history, jenis_pelayanan) {

        $("#id_pel_rad").val(id_pelayanan);
        $("#id_his_rad").val(id_history);
        if (jenis_pelayanan == "POLI") {
            $("#modal_radiologi").modal('show');

            reload_data_radiologi(id_pelayanan);
            reload_total_radiologi(id_pelayanan);
        } else {
            $("#modal_radiologi_prio").modal('show');
            reload_data_radiologi_prioritas(id_pelayanan);
            reload_total_radiologi_prioritas(id_pelayanan);
        }

        $.ajax({
            url: "<?= base_url() . 'Erm_poli/getdata_radio' ?>",
            data: {
                pelayanan: id_pelayanan,
                history: id_history
            },
            type: 'POST',
            dataType: 'json',
            success: function(data) {
                if (data.status_dt == "found") {
                    var html = '';
                    var i;
                    html = '<option value="">-</option>';
                    for (i = 0; i < data.tindakan_radiologi.length; i++) {
                        harga = data.tindakan_radiologi[i].harga;

                        html += '<option value="' + data.tindakan_radiologi[i].id_daftar_tindakan + '|' + harga + '|' + data.tindakan_radiologi[i].nama + '">' + data.tindakan_radiologi[i].nama + '</option>';
                    }
                    $('select[name="inTindakanRadiologi"]').html(html);


                    if (data.data.id_cara_bayar == '30') {
                        $('#pembayaran1').collapse('show');
                    } else {
                        $('#pembayaran1').collapse('hide');

                    }

                } else {
                    swal({
                        title: "Gagal!",
                        type: "warning",
                        text: "Maaf, Data tidak ditemukan",
                        confirmButtonColor: "#3cb878",
                    });
                }
            }
        });

    }


    function hapus_radiologi(id_tindakan_radiologi, id_pelayanan, nama) {
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
                    url: "<?php echo base_url() ?>Radiologi/hapus_data_radiologi",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        id_tindakan_radiologi: id_tindakan_radiologi,
                    },
                    success: function(data) {
                        if (data.status == "success") {
                            swal({
                                title: "good job!",
                                type: "success",
                                text: "Data Berhasil dihapus",
                                buttons: false,
                                timer: 800
                            });
                            $('#tableradiologi').DataTable().ajax.reload();
                            $('#outTotalHargaRadiologi').DataTable().ajax.reload();
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

    function hargaTotalRadiologi() {
        splitDiag = a.split("|");
        harga = parseFloat(splitDiag[1]);
        frek = parseFloat($("#inJumlahRadiologi").val());
        total = harga * frek;

        $("#outTotalRadiologi").val(convertToRupiah(total));
    }

    // End

    function detail_ringkasan(id_pelayanan, id_tindakan_labor) {
        $.ajax({
            url: "<?= base_url() . 'Radiologi/getdata_formById' ?>",
            data: {
                pelayanan: id_pelayanan,
                tindakan: id_tindakan_radiologi,
            },
            type: 'POST',
            dataType: 'json',
            success: function(data) {
                if (data.status_dt == "found") {
                    $('#detailTindakan').collapse('toggle');
                    $('#listTindakan').collapse('hide');
                    $('#infoTindakan').collapse('hide');
                    $("#outNama").val(data.nama);
                    $("#outFrek").val(data.frek);
                    $("#outHarga").val(data.harga);
                    $("#outDokter").val(data.dokter);
                    $("#outKeterangan").val(data.keterangan);
                } else {
                    swal({
                        title: "Gagal!",
                        type: "warning",
                        text: "Maaf, Data tidak ditemukan",
                        confirmButtonColor: "#3cb878",
                    });
                }
            }
        });
    }

    // Labor
    function insert_form_labor() {
        diagnosa = $('#labDiagnosa').val();
        ringkasan = $('#labRingkasan').val();
        keterangan = $('#labKet').val();
        id_pelayanan = $('#inPelLab').val();
        id_history = $('#inHisLab').val();
        status_pembayaran = $('#inPembayaran').val();
        if (diagnosa === '') {
            swal({
                title: "Gagal!",
                type: "warning",
                text: "Diagnosa Wajib Diisi",
                confirmButtonColor: "#3cb878",
            });
        } else {
            $.ajax({
                url: "<?= base_url() . 'Poli/insert_form_labor' ?>",
                method: "POST",
                dataType: 'json',
                data: {
                    diagnosa: diagnosa,
                    ringkasan: ringkasan,
                    keterangan: keterangan,
                    id_pelayanan: id_pelayanan,
                    id_history: id_history,
                    status_pembayaran: status_pembayaran
                },
                success: function(data) {
                    if (data.status == "success") {
                        $.toast({
                            heading: 'Success!',
                            text: 'Tindakan ini telah ditambah',
                            showHideTransition: 'fade',
                            icon: 'success'
                        });
                        $('#formLabor')[0].reset();
                        $("#collapse_tindakan_labor").collapse('hide');
                        $("#collapse_form_labor").collapse('hide');
                        $('#tableFormLabor').DataTable().ajax.reload();
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

    function detail_tindakan_labor(id_tindakan_labor) {
        $.ajax({
            url: "<?= base_url() . 'Poli/getdata_formById_Labor' ?>",
            data: {
                tindakan: id_tindakan_labor,
            },
            type: 'POST',
            dataType: 'json',
            success: function(data) {
                if (data.status_dt == "found") {
                    $('#detailTindakanLabor').collapse('toggle');
                    $("#outNama").val(data.nama);
                    $("#outFrek").val(data.frek);
                    $("#outTanggal").val(data.tanggal_req);
                    $("#outHarga").val(data.harga);
                    $("#outRing").val(data.ringkasan);
                    $("#outKeta").val(data.keterangan);
                } else {
                    swal({
                        title: "Gagal!",
                        type: "warning",
                        text: "Maaf, Data tidak ditemukan",
                        confirmButtonColor: "#3cb878",
                    });
                }
            }
        });
    }

    function pilih_labor(id, jenis_pelayanan) {

        $('#id_form_lab').val(id);
        $("#collapse_tindakan_labor").collapse('toggle');
        $("#formTinLabor").collapse('toggle');

        reload_data_labor(id);
        reload_total_labor(id);
    }

    function pilih_labor1(id, jenis_pelayanan) {

        $('#id_form_lab').val(id);
        $("#collapse_tindakan_labor").collapse('toggle');
        $("#formTinLabor").collapse('hide');
        reload_data_labor(id);
        reload_total_labor(id);
    }

    function show_form() {
        $("#collapse_form_labor").collapse('toggle');
    }

    function show_form_prioritas() {
        $("#collapse_form_labor_prioritas").collapse('toggle');
    }

    function insert_labor() {
        a = $("#inTindakanLabor").val();
        splitDiag = a.split("|");
        harga = parseFloat(splitDiag[1]);
        frek = parseFloat($("#inJumlahLabor").val());
        total = harga * frek;
        id_pel_lab = $('#id_pel_lab').val();
        id_his_lab = $('#id_his_lab').val();
        ring = $('#ringkasanLabor').val();
        keta = $('#keteranganLabor').val();
        id_list_tindakan = $('#id_daftar_tindakan').val();
        kode_lis = splitDiag[3];
        nama = splitDiag[2];
        id_form_lab = $('#id_form_lab').val();
        var ID = Math.random().toString(36).substr(2, 16);

        dataString = 'id=' + ID + '&harga=' + harga +
            '&id_pel_lab=' + id_pel_lab + '&id_his_lab=' + id_his_lab + '&id_list_tindakan=' + splitDiag[0] +
            '&frek=' + frek + '&total=' + total + '&keta=' + keta + '&ring=' + ring + '&id_form_lab=' + id_form_lab +
            '&nama_tindakan=' + nama + '&kode_lis=' + kode_lis + '&cara_masuk=' + "POLI";
        $.ajax({
            url: "<?= base_url() . 'Poli/insert_labor' ?>",
            method: "POST",
            dataType: 'json',
            data: dataString,
            success: function(data) {
                if (data.status == "success") {
                    // $('#form_labor')[0].reset();
                    $.toast({
                        heading: 'Success!',
                        text: 'Tindakan ini telah ditambah',
                        showHideTransition: 'fade',
                        icon: 'success'
                    });
                    $('#outBiayaTindakanLabor').val('');
                    $('#inJumlahLabor').val('');
                    $('#keteranganLabor').val('');
                    $('#ringkasanLabor').val('');
                    $('#outTotalLabor').val('');
                    $('#tablelabor').DataTable().ajax.reload();
                    $('#outTotalHargaLabor').DataTable().ajax.reload();
                    $('#datable').DataTable().ajax.reload();
                    $("#collapse_form_labor").collapse('hide');
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

    function request_labor(id) {
        $.ajax({
            url: "<?= base_url() . 'Poli/req_form_labor' ?>",
            method: "POST",
            dataType: 'json',
            data: {
                id: id,
            },
            success: function(data) {
                if (data.status == "success") {
                    $.toast({
                        heading: 'Success!',
                        text: 'Tindakan ini telah ditambah',
                        showHideTransition: 'fade',
                        icon: 'success'
                    });
                    $('#tableFormLabor').DataTable().ajax.reload();
                } else if (data.status == "error") {
                    swal({
                        title: "Tindakan Belum Diisi",
                        type: "warning",
                        text: "Silahkan isi tindakan terlebih dahulu",
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

    function request_labor1(id) {
        $.ajax({
            url: "<?= base_url() . 'Poli/req_form_labor' ?>",
            method: "POST",
            dataType: 'json',
            data: {
                id: id,
            },
            success: function(data) {
                if (data.status == "success") {
                    $.toast({
                        heading: 'Success!',
                        text: 'Tindakan ini telah ditambah',
                        showHideTransition: 'fade',
                        icon: 'success'
                    });
                    $('#tableFormLaborPrioritas').DataTable().ajax.reload();
                } else if (data.status == "error") {
                    swal({
                        title: "Tindakan Belum Diisi",
                        type: "warning",
                        text: "Silahkan isi tindakan terlebih dahulu",
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

    function hapus_form_labor(id) {
        swal({
            title: "Apakah kamu yakin?",
            text: "Menghapus data ?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3cb878",
            confirmButtonText: "Yakin",
            cancelButtonText: "Batal",
            closeOnConfirm: false
        }, function() {
            $().ready(function() {
                $.ajax({
                    url: "<?= base_url() . 'Poli/hapus_form_labor' ?>",
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
                                text: "Permintaan Sudah Dihapus",
                                buttons: false,
                                timer: 800
                            });
                            $('#tableFormLabor').DataTable().ajax.reload();
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
    }


    function reload_data_labor(id_pel_lab) {
        $('#tablelabor').dataTable().fnClearTable();
        $('#tablelabor').dataTable().fnDestroy();
        $('#tablelabor').DataTable({
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
                "url": '<?php echo base_url('Poli/tampil_list_labor'); ?>',
                "type": 'POST',
                "data": {
                    id_pelayanan: id_pel_lab
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

    function reload_data_form_labor_prio(id_pel_lab) {

        $('#tableFormLaborPrioritas').dataTable().fnClearTable();
        $('#tableFormLaborPrioritas').dataTable().fnDestroy();
        $('#tableFormLaborPrioritas').DataTable({
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
                "url": '<?php echo base_url('Poli/tampil_form_labor_prioritas'); ?>',
                "type": 'POST',
                "data": {
                    id_pelayanan: id_pel_lab
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

    function pilihTindakanLabor() {
        a = $("#inTindakanLabor").val();
        splitDiag = a.split("|");

        harga = parseFloat(splitDiag[1]);
        console.log(splitDiag[3]);
        $("#outBiayaTindakanLabor").val(convertToRupiah(harga));
        document.getElementById("inJumlahLabor").value = "1";
        document.getElementById("outTotalLabor").value = convertToRupiah(harga);
    }

    function reload_total_labor(id_pelayanan) {
        $('#outTotalHargaLabor').dataTable().fnClearTable();
        $('#outTotalHargaLabor').dataTable().fnDestroy();
        $('#outTotalHargaLabor').DataTable({
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
                "url": '<?php echo base_url('Poli/tampil_total_labor'); ?>',
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

    function edit_labor(id_pelayanan, id_history, jenis_pelayanan) {

        $("#id_pel_lab").val(id_pelayanan);
        $("#id_his_lab").val(id_history);
        $("#inPelLab").val(id_pelayanan);
        $("#inHisLab").val(id_history);

        if (jenis_pelayanan == "POLI") {
            $("#modal_labor").modal('show');
            reload_data_form_labor(id_pelayanan);
        } else {
            $("#modal_labor_prio").modal('show');
            reload_data_form_labor_prio(id_pelayanan);
        }
        $.ajax({
            url: "<?= base_url() . 'Erm_poli/getdata_labor' ?>",
            data: {
                pelayanan: id_pelayanan,
                history: id_history
            },
            type: 'POST',
            dataType: 'json',
            success: function(data) {
                if (data.status_dt == "found") {
                    var html = '';
                    var i;
                    html = '<option value="">-</option>';
                    for (i = 0; i < data.tindakan_labor.length; i++) {
                        harga = data.tindakan_labor[i].harga;

                        html += '<option value="' + data.tindakan_labor[i].id_daftar_tindakan + '|' + harga + '|' + data.tindakan_labor[i].nama + '|' + data.tindakan_labor[i].kode_lis + '">' + data.tindakan_labor[i].nama + '</option>';
                    }
                    $('select[name="inTindakanLabor"]').html(html);


                    if (data.data.id_cara_bayar == '30') {
                        $('#pembayaran').collapse('show');
                    } else {
                        $('#pembayaran').collapse('hide');

                    }
                } else {
                    swal({
                        title: "Gagal!",
                        type: "warning",
                        text: "Maaf, Data tidak ditemukan",
                        confirmButtonColor: "#3cb878",
                    });
                }
            }
        });
    }

    function hapus_labor(id_tindakan_labor, id_pelayanan, nama) {
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
                    url: "<?php echo base_url() ?>Poli/hapus_data_labor",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        id_tindakan_labor: id_tindakan_labor,
                    },
                    success: function(data) {
                        if (data.status == "success") {
                            swal({
                                title: "good job!",
                                type: "success",
                                text: "Data Berhasil dihapus",
                                buttons: false,
                                timer: 800
                            });
                            $('#tablelabor').DataTable().ajax.reload();
                            $('#outTotalHargaLabor').DataTable().ajax.reload();
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

    function hargaTotalLabor() {
        splitDiag = a.split("|");
        harga = parseFloat(splitDiag[1]);
        frek = parseFloat($("#inJumlahLabor").val());
        total = harga * frek;

        $("#outTotalLabor").val(convertToRupiah(total));
    }

    //labor prioritas

    //Prioritas
    function insert_labor_prioritas() {
        a = $("#inTindakanLaborPrioritas").val();
        splitDiag = a.split("|");
        harga = parseFloat(splitDiag[1]);
        frek = parseFloat($("#inJumlahLaborPrioritas").val());
        total = harga * frek;
        id_pel_lab = $('#id_pel_lab').val();
        id_his_lab = $('#id_his_lab').val();
        ring = $('#ringkasanLabor').val();
        keta = $('#keteranganLabor').val();
        id_list_tindakan = $('#id_daftar_tindakan').val();
        kode_lis = splitDiag[3];
        nama = splitDiag[2];
        id_form_lab = $('#id_form_lab').val();
        var ID = Math.random().toString(36).substr(2, 16);

        dataString = 'id=' + ID + '&harga=' + harga +
            '&id_pel_lab=' + id_pel_lab + '&id_his_lab=' + id_his_lab + '&id_list_tindakan=' + splitDiag[0] +
            '&frek=' + frek + '&total=' + total + '&keta=' + keta + '&ring=' + ring + '&id_form_lab=' + id_form_lab +
            '&nama_tindakan=' + nama + '&kode_lis=' + kode_lis + '&cara_masuk=' + "POLI";
        $.ajax({
            url: "<?= base_url() . 'Poli/insert_labor' ?>",
            method: "POST",
            dataType: 'json',
            data: dataString,
            success: function(data) {
                if (data.status == "success") {
                    // $('#form_labor')[0].reset();
                    $.toast({
                        heading: 'Success!',
                        text: 'Tindakan ini telah ditambah',
                        showHideTransition: 'fade',
                        icon: 'success'
                    });
                    $('#outBiayaTindakanLaborPrioritas').val('');
                    $('#inJumlahLaborPrioritas').val('');
                    $('#keteranganLaborPrioritas').val('');
                    $('#ringkasanLaborPrioritas').val('');
                    $('#outTotalLaborPrioritas').val('');
                    $('#tablelaborPrioritas').DataTable().ajax.reload();
                    $('#outTotalHargaLaborPrioritas').DataTable().ajax.reload();
                    $('#datable').DataTable().ajax.reload();
                    $("#collapse_form_labor").collapse('hide');
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

    function pilih_labor_prioritas(id, jenis_pelayanan) {
        $('#id_form_lab').val(id);
        $("#collapse_tindakan_labor_prioritas").collapse('toggle');
        $("#formTinLabor2").collapse('toggle');

        reload_data_labor_prioritas(id);
        reload_total_labor_prioritas(id);
    }

    function pilih_labor_prioritas1(id, jenis_pelayanan) {

        $('#id_form_lab').val(id);
        $("#collapse_tindakan_labor_prioritas").collapse('toggle');
        $("#formTinLabor2").collapse('hide');

        reload_data_labor_prioritas(id);
        reload_total_labor_prioritas(id);
    }

    function insert_form_labor_prioritas() {
        diagnosa = $('#labDiagnosa_prioritas').val();
        ringkasan = $('#labRingkasan_prioritas').val();
        keterangan = $('#labKet_prioritas').val();
        id_pelayanan = $('#inPelLab').val();
        id_history = $('#inHisLab').val();
        if (diagnosa === '') {
            swal({
                title: "Gagal!",
                type: "warning",
                text: "Diagnosa Wajib Diisi",
                confirmButtonColor: "#3cb878",
            });
        } else {
            $.ajax({
                url: "<?= base_url() . 'Poli/insert_form_labor' ?>",
                method: "POST",
                dataType: 'json',
                data: {
                    diagnosa: diagnosa,
                    ringkasan: ringkasan,
                    keterangan: keterangan,
                    id_pelayanan: id_pelayanan,
                    id_history: id_history
                },
                success: function(data) {
                    if (data.status == "success") {
                        $.toast({
                            heading: 'Success!',
                            text: 'Tindakan ini telah ditambah',
                            showHideTransition: 'fade',
                            icon: 'success'
                        });
                        $('#formLabor')[0].reset();
                        $("#collapse_tindakan_labor_prioritas").collapse('hide');
                        $("#collapse_form_labor_prioritas").collapse('hide');
                        $('#tableFormLaborPrioritas').DataTable().ajax.reload();
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

    function hapus_labor_prioritas(id_tindakan_labor, id_pelayanan, nama) {
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
                    url: "<?php echo base_url() ?>Poli/hapus_data_labor_prioritas",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        id_tindakan_labor: id_tindakan_labor,
                    },
                    success: function(data) {
                        if (data.status == "success") {
                            swal({
                                title: "good job!",
                                type: "success",
                                text: "Data Berhasil dihapus",
                                buttons: false,
                                timer: 800
                            });
                            $('#tablelaborPrioritas').DataTable().ajax.reload();
                            $('#outTotalHargaLaborPrioritas').DataTable().ajax.reload();
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

    function reload_data_labor_prioritas(id_pel_lab) {
        $('#tablelaborPrioritas').dataTable().fnClearTable();
        $('#tablelaborPrioritas').dataTable().fnDestroy();
        $('#tablelaborPrioritas').DataTable({
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
                "url": '<?php echo base_url('Poli/tampil_list_labor_prioritas'); ?>',
                "type": 'POST',
                "data": {
                    id_pelayanan: id_pel_lab
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

    function reload_total_labor_prioritas(id_pelayanan) {
        $('#outTotalHargaLaborPrioritas').dataTable().fnClearTable();
        $('#outTotalHargaLaborPrioritas').dataTable().fnDestroy();
        $('#outTotalHargaLaborPrioritas').DataTable({
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
                "url": '<?php echo base_url('Poli/tampil_total_labor_prioritas'); ?>',
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

    function hapus_form_labor_prioritas(id) {
        swal({
            title: "Apakah kamu yakin?",
            text: "Menghapus data ?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3cb878",
            confirmButtonText: "Yakin",
            cancelButtonText: "Batal",
            closeOnConfirm: false
        }, function() {
            $().ready(function() {
                $.ajax({
                    url: "<?= base_url() . 'Poli/hapus_form_labor_prioritas' ?>",
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
                                text: "Permintaan Sudah Dihapus",
                                buttons: false,
                                timer: 800
                            });
                            $('#tableFormLaborPrioritas').DataTable().ajax.reload();
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
    }

    function reload_data_form_labor(id_pel_lab) {
        $('#tableFormLabor').dataTable().fnClearTable();
        $('#tableFormLabor').dataTable().fnDestroy();
        $('#tableFormLabor').DataTable({
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
                "url": '<?php echo base_url('Poli/tampil_form_labor'); ?>',
                "type": 'POST',
                "data": {
                    id_pelayanan: id_pel_lab
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

    function pilihTindakanLaborPrioritas() {
        a = $("#inTindakanLaborPrioritas").val();
        splitDiag = a.split("|");

        harga = parseFloat(splitDiag[1]);
        $("#outBiayaTindakanLaborPrioritas").val(convertToRupiah(harga));
        document.getElementById("inJumlahLaborPrioritas").value = "1";
        document.getElementById("outTotalLaborPrioritas").value = convertToRupiah(harga);
    }
    //end labor prioritas



    // // PRIORITAS

    function insert_radiologi_prioritas() {
        a = $("#inTindakanRadiologiPrioritas").val();
        splitDiag = a.split("|");
        harga = parseFloat(splitDiag[1]);
        frek = parseFloat($("#inJumlahRadiologiPrioritas").val());
        total = harga * frek;
        id_pel_rad = $('#id_pel_rad').val();
        diagnosa = $('#inDiagnosaPrio').val();
        id_his_rad = $('#id_his_rad').val();
        id_list_tindakan = $('#id_daftar_tindakan').val();
        nama = $('#nama').val();
        var ID = Math.random().toString(36).substr(2, 16);

        dataString = 'id=' + ID + '&harga=' + harga +
            '&id_pel_rad=' + id_pel_rad + '&id_his_rad=' + id_his_rad + '&id_list_tindakan=' + splitDiag[0] +
            '&frek=' + frek + '&total=' + total + '&jenis_pelayanan=' + "POLI" + '&diagnosa=' + diagnosa;
        $.ajax({
            url: "<?= base_url() . 'Poli/insert_radiologi' ?>",
            method: "POST",
            dataType: 'json',
            data: dataString,
            success: function(data) {
                if (data.status == "success") {
                    $.toast({
                        heading: 'Success!',
                        text: 'Tindakan ini telah ditambah',
                        showHideTransition: 'fade',
                        icon: 'success'
                    });
                    $('#outBiayaTindakanRadiologiPrioritas').val('');
                    $('#inJumlahRadiologiPrioritas').val('');
                    $('#outTotalRadiologiPrioritas').val('');
                    reload_data_radiologi_prioritas(id_pel_rad);
                    $('#tableradiologiPrioritas').DataTable().ajax.reload();
                    $('#outTotalHargaRadiologiPrioritas').DataTable().ajax.reload();
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

    function pilihTindakanRadiologiPrioritas() {
        a = $("#inTindakanRadiologiPrioritas").val();
        splitDiag = a.split("|");

        harga = parseFloat(splitDiag[1]);
        $("#outBiayaTindakanRadiologiPrioritas").val(convertToRupiah(harga));
        document.getElementById("inJumlahRadiologiPrioritas").value = "1";
        document.getElementById("outTotalRadiologiPrioritas").value = convertToRupiah(harga);
    }

    function reload_total_radiologi_prioritas(id_pelayanan) {
        $('#outTotalHargaRadiologiPrioritas').dataTable().fnClearTable();
        $('#outTotalHargaRadiologiPrioritas').dataTable().fnDestroy();
        $('#outTotalHargaRadiologiPrioritas').DataTable({
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
                "url": '<?php echo base_url('Poli/tampil_total_radiologi_prioritas'); ?>',
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

    function reload_data_radiologi_prioritas(id_pel_rad) {
        $('#tableradiologiPrioritas').dataTable().fnClearTable();
        $('#tableradiologiPrioritas').dataTable().fnDestroy();
        $('#tableradiologiPrioritas').DataTable({
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
                "url": '<?php echo base_url('Poli/tampil_list_radiologi_prioritas'); ?>',
                "type": 'POST',
                "data": {
                    id_pelayanan: id_pel_rad
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

    function hapus_radiologi_prioritas(id_tindakan_radiologi, id_pelayanan, nama) {
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
                    url: "<?php echo base_url() ?>Radiologi/hapus_data_radiologi",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        id_tindakan_radiologi: id_tindakan_radiologi,
                    },
                    success: function(data) {
                        if (data.status == "success") {
                            $.toast({
                                heading: 'Success!',
                                text: 'Tindakan ini telah ditambah',
                                showHideTransition: 'fade',
                                icon: 'success'
                            });
                            reload_data_radiologi_prioritas(id_pel_rad);
                            $('#tableradiologiPrioritas').DataTable().ajax.reload();
                            $('#outTotalHargaRadiologiPrioritas').DataTable().ajax.reload();
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

    // End
    $(document).ready(function() {
        $.fn.modal.Constructor.prototype.enforceFocus = function() {};
    });
</script>