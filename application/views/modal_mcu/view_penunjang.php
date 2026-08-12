<<<<<<< HEAD
<!-- TINDAKAN --------------------------------------------------------------------------------------------->
<div class="modal fade bs-example-modal-lg" id="modal_tindakan" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h5 class="modal-title" id="myLargeModalLabel"><i class="icon-user mr-10"></i> TINDAKAN REQUEST MCU
                </h5>
            </div>
            <div class="modal-body">
                <div class="form-wrap">

                    <span class="help-block"></span>
                    <div class="form-body mt-10">
                        <h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO TINDAKAN
                        </h6>
                        <!-- <div align="right">
								<button class="btn btn-primary btn-anim mr-50" style="margin-right: 40px;" onclick="edit_tindakan_mcu()"><i class="icon-plus"></i><span class="btn-text">TAMBAH TINDAKAN</span>
								</button>
							</div> -->
                        <hr width="95%">

                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label class="control-label col-md-3">TINDAKAN MCU</label>
                                <div class="col-md-9 has-success" onchange="pilihTindakanMcu()">
                                    <select class="form-control filled-input select2" style="border: 1px solid lightgreen;" tabindex="1" name="inTindakanMcu" id="inTindakanMcu">
                                        <option value="-">-</option>
                                        <?php
                                        foreach ($tindakan_mcu as $row) :
                                            $harga = $row['harga']; ?>
                                            <option value="<?php echo $row['id_daftar_tindakan'] . "|" . $harga . "|" .  $row['nama']; ?>">
                                                <?php echo $row['nama']; ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!--/span-->

                        <div class="col-md-6">
                            <div class="form-group ">
                                <label class="control-label col-md-3">JUMLAH TINDAKAN</label>
                                <div class="col-md-9 has-error">
                                    <input type="text" class="form-control " id="inJumlahMcu" disabled placeholder="jumlah" oninput="hargaTotalMcu()">
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
                                    <input type="text" class="form-control" disabled id="outBiayaTindakanMcu">
                                    <input type="hidden" class="form-control" disabled id="id_mcu">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label col-md-3">TOTAL HARGA</label>
                                <div class="col-md-9 has-error">
                                    <input type="text" class="form-control " disabled id="outTotalMcu">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <span class="help-block"></span>

                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group pull-right">
                                <button onclick="insert_mcu()" class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>


            <div class="modal-body mt-10">
                <h6 class="txt-dark capitalize-font pl-20"><i class="icon-list mr-10"></i>TINDAKAN</h6>
                <hr width="95%">
                <div class="table-wrap" style="width: 100%; margin: auto ">
                    <div class="table-responsive">
                        <table class="table table-hover display  pb-60" id="tablemcu">
                            <thead>
                                <tr class="bg-success">
                                    <th>NO</th>
                                    <th>HAPUS</th>
                                    <th>STATUS</th>
                                    <th>NAMA TINDAKAN</th>
                                    <th>TANGGAL TINDAKAN</th>
                                    <th>BIAYA TINDAKAN </th>
                                    <th>JUMLAH TINDAKAN</th>
                                    <th>STAFF REQUEST</th>
                                    <th>STAFF KONFIRMASI</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr class="bg-success">
                                    <th>NO</th>
                                    <th>HAPUS</th>
                                    <th>STATUS</th>
                                    <th>NAMA TINDAKAN</th>
                                    <th>TANGGAL TINDAKAN</th>
                                    <th>BIAYA TINDAKAN </th>
                                    <th>JUMLAH TINDAKAN</th>
                                    <th>STAFF REQUEST</th>
                                    <th>STAFF KONFIRMASI</th>>
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
                        <!-- <p id="notif_load" style="color:red;">Loading data, Please wait</p> -->
                        <div class="table-responsive ">
                            <table class="table table-hover display " id="outTotalHargaMcu">
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

<!-- PAKET MCU --------------------------------------------------------------------------------------------->
<div class="modal fade bs-example-modal-lg" id="modal_paket" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h5 class="modal-title" id="myLargeModalLabel"><i class="icon-user mr-10"></i> TINDAKAN REQUEST MCU
                </h5>
            </div>
            <div class="modal-body">
                <div class="form-wrap">

                    <span class="help-block"></span>
                    <div class="form-body mt-10">
                        <h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO TINDAKAN
                        </h6>
                        <!-- <div align="right">
								<button class="btn btn-primary btn-anim mr-50" style="margin-right: 40px;" onclick="edit_tindakan_mcu()"><i class="icon-plus"></i><span class="btn-text">TAMBAH TINDAKAN</span>
								</button>
							</div> -->
                        <hr width="95%">

                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label class="control-label col-md-3">PAKET MCU</label>
                                <div class="col-md-9 has-success" onchange="pilihTindakanPaket()">
                                    <select class="form-control filled-input select2" style="border: 1px solid lightgreen;" tabindex="1" name="inPaket" id="inPaket">
                                        <option value="-">-</option>
                                        <?php
                                        foreach ($paket_mcu as $row) :
                                            $harga = $row['harga']; ?>
                                            <option value="<?php echo $row['id_paket_mcu'] . "|" . $harga . "|" .  $row['nama_paket']; ?>">
                                                <?php echo $row['nama_paket']; ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label col-md-3">HARGA</label>
                                <div class="col-md-9 has-error">
                                    <input type="text" class="form-control " disabled id="outTotalPaket">
                                    <input type="hidden" class="form-control " id="hargaPaket">
                                    <input type="hidden" class="form-control " id="id_mcu_paket">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                        </div>

                    </div>
                    <span class="help-block"></span>


                    <span class="help-block"></span>

                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group pull-right">
                                <button onclick="insert_paket()" class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>


            <div class="modal-body mt-10">
                <h6 class="txt-dark capitalize-font pl-20"><i class="icon-list mr-10"></i>TINDAKAN</h6>
                <hr width="95%">
                <div class="table-wrap" style="width: 100%; margin: auto ">
                    <div class="table-responsive">
                        <table class="table table-hover display  pb-60" id="tablepaket">
                            <thead>
                                <tr class="bg-success">
                                    <th>NO</th>
                                    <th>HAPUS</th>
                                    <th>NAMA TINDAKAN</th>
                                    <th>TANGGAL TINDAKAN</th>
                                    <th>BIAYA TINDAKAN </th>
                                    <th>JUMLAH TINDAKAN</th>
                                    <th>PAKET</th>
                                    <th>STAFF</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr class="bg-success">
                                    <th>NO</th>
                                    <th>HAPUS</th>
                                    <th>NAMA TINDAKAN</th>
                                    <th>TANGGAL TINDAKAN</th>
                                    <th>BIAYA TINDAKAN </th>
                                    <th>JUMLAH TINDAKAN</th>
                                    <th>PAKET</th>
                                    <th>STAFF</th>
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
                        <!-- <p id="notif_load" style="color:red;">Loading data, Please wait</p> -->
                        <div class="table-responsive ">
                            <table class="table table-hover display " id="outTotalHargaPaket">
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

<!-- RADIOLOGI -------------------------------------------------------------------->
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
                                            <?php
                                            foreach ($tindakan_radiologi as $row) :
                                                $harga = $row['harga']; ?>
                                                <option value="<?php echo $row['id_daftar_tindakan'] . "|" . $harga . "|" .  $row['nama']; ?>">
                                                    <?php echo $row['nama']; ?></option>
                                            <?php endforeach ?>
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
                                        <input type="hidden" class="form-control" disabled id="id_tindakan_radiologi_mcu">
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
                <div class="table-wrap" style="width: 100%; margin: auto ">
                    <div class="table-responsive">
                        <table class="table table-hover display  pb-60" id="tableradiologi">
                            <thead>
                                <tr class="bg-success">
                                    <th>NO</th>
                                    <th>NAMA TINDAKAN</th>
                                    <th>TANGGAL TINDAKAN</th>
                                    <th>BIAYA TINDAKAN </th>
                                    <th>JUMLAH TINDAKAN</th>
                                    <th>STAFF REQUEST</th>
                                    <th>STAFF KONFIRMASI</th>
                                    <th>GAMBAR</th>
                                    <th>KETERANGAN</th>
                                    <th>STATUS</th>
                                    <th>HAPUS</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr class="bg-success">
                                    <th>NO</th>
                                    <th>NAMA TINDAKAN</th>
                                    <th>TANGGAL TINDAKAN</th>
                                    <th>BIAYA TINDAKAN </th>
                                    <th>JUMLAH TINDAKAN</th>
                                    <th>STAFF REQUEST</th>
                                    <th>STAFF KONFIRMASI</th>>
                                    <th>GAMBAR</th>
                                    <th>KETERANGAN</th>
                                    <th>STATUS</th>
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
                    <div class="form-body mt-10 collapse" id="collapse_tindakan_labor">
                        <h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO TINDAKAN
                        </h6>
                        <hr width="95%">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label col-md-3">TINDAKAN LABOR</label>
                                    <div class="col-md-9 has-success" onchange="pilihTindakanLabor()">
                                        <select class="form-control filled-input select2" style="border: 1px solid lightgreen;" tabindex="1" name="inTindakanLabor" id="inTindakanLabor">
                                            <option value="-">-</option>
                                            <?php
                                            foreach ($tindakan_labor as $row) :
                                                $harga = $row['harga']; ?>
                                                <option value="<?php echo $row['id_daftar_tindakan'] . "|" . $harga . "|" .  $row['nama'] . "|" .  $row['kode_lis'] ?>">
                                                    <?php echo $row['nama']; ?></option>
                                            <?php endforeach ?>
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
                                        <input type="hidden" class="form-control" disabled id="idmcu">
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
                            <div class="col-md-8">
                                <div class="form-group pull-right">
                                    <button onclick="insert_labor()" class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
                                        <!-- <button onclick="insert_na_lab()" class="btn btn-warning btn-anim  btn-sm ml-20 mt-5" id="na_lab"><i class="icon-rocket"></i><span class="btn-text">N/A</span> -->
                                </div>
                            </div>
                        </div>
                        <h6 class="txt-dark capitalize-font pl-20"><i class="icon-list mr-10"></i>TINDAKAN</h6>
                        <hr width="95%">
                        <div class="table-wrap" style="width: 100%; margin: auto ">
                            <div class="table-responsive">
                                <table class="table table-hover display  pb-60" id="tablelabor">
                                    <thead>
                                        <tr class="bg-success">
                                            <th>NO</th>
                                            <th>HAPUS</th>
                                            <!-- <th>STATUS</th> -->
                                            <th>NAMA TINDAKAN</th>
                                            <th>TANGGAL TINDAKAN</th>
                                            <th>BIAYA TINDAKAN </th>
                                            <th>JUMLAH TINDAKAN</th>
                                            <th>STAFF REQUEST</th>
                                            <th>STAFF KONFIRMASI</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr class="bg-success">
                                            <th>NO</th>
                                            <!-- <th>HAPUS</th> -->
                                            <th>STATUS</th>
                                            <th>NAMA TINDAKAN</th>
                                            <th>TANGGAL TINDAKAN</th>
                                            <th>BIAYA TINDAKAN </th>
                                            <th>JUMLAH TINDAKAN</th>
                                            <th>STAFF REQUEST</th>
                                            <th>STAFF KONFIRMASI</th>
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
                                    <!-- <p id="notif_load" style="color:red;">Loading data, Please wait</p> -->
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
                                            <input type="hidden" class="form-control" disabled id="id_mcu">
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
            </div>

        </div>


    </div>
</div>

<!-- Kasir -->
<div class="panel-wrapper collapse in">
    <div class="panel-body">
        <div class="modal fade" role="dialog" id="modal_edit_kasir" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="form-body mt-10">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel-wrapper collapse in">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-wrap">
                                                        <div class="form-body">
                                                            <div class="modal-body">
                                                                <form class="form-horizontal" action="<?php echo base_url('Kasir/print_kasir_mcu') ?>" method="post" enctype="multipart/form-data" role="form">
                                                                    <input type="hidden" id="inMcu" name="inMcu">
                                                                    <div class="form-body">
                                                                        <h6 class="txt-dark capitalize-font"><i class="icon-user mr-10"></i>INFO KASIR</h6>
                                                                        <hr>
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="form-group ">
                                                                                    <label class="control-label col-md-3">DISC</label>
                                                                                    <div class="col-md-9">
                                                                                        <input type="number" class="form-control rounded-input" autocomplete="off" id="inDiskon" name="inDiskon" value="0">
                                                                                        <span class="help-block"></span>

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group ">
                                                                                    <label class="control-label col-md-3">DP </label>
                                                                                    <div class="col-md-9">
                                                                                        <input type="number" class="form-control rounded-input" autocomplete="off" placeholder="jumlah" id="inDp" name="inDp" value="0">
                                                                                        <span class="help-block"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="form-group ">
                                                                                    <label class="control-label col-md-3">TANGGAL PULANG</label>
                                                                                    <div class="col-md-9">
                                                                                        <input type="datetime-local" class="form-control rounded-input" autocomplete="off" id="inTglKeluar" name="inTglKeluar" value="<?php date_default_timezone_set('Asia/Jakarta');
                                                                                                                                                                                                                        echo date("Y-m-d"); ?>">
                                                                                        <span class="help-block"></span>

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div>
                                                                                <center> <button class="btn btn-info btn-rounded mr-10" type="submit" name="action" value="cetakdanpulang"></i><span class="btn-text">CETAK DAN PULANG</span></button>
                                                                                    <button class="btn btn-warning btn-rounded mr-10" type="submit" name="action" value="cetak">CETAK</button>
                                                                                </center>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- MCU --------------------------------------------------------->
<script>
    function edit_detail() {
        $.ajax({
            url: "<?= base_url() . 'MCU/detail_mcu' ?>",
        });
    }

    // cetak
    function cetak(id_mcu) {

        $.ajax({
            url: "<?= base_url() . 'Kasir/print_kasir_mcu' ?>",
            data: {
                id_mcu: id_mcu,
            },
        });
    }
</script>

<!-- TINDAKAN ------------------------------------------------->
<script>
    function edit_tindakan_mcu() {
        $("#collap_edit_mcu").collapse('toggle');
    }

    function insert_mcu() {
        splitDiag = a.split("|");
        harga = parseFloat(splitDiag[1]);
        frek = parseFloat($("#inJumlahMcu").val());
        total = harga * frek;
        id_list_tindakan = splitDiag[0];
        nama = $('#nama').val();
        id_mcu = $('#id_mcu').val();

        $.ajax({
            url: "<?= base_url() . 'Mcu/insert_mcu' ?>",
            method: "POST",
            dataType: 'json',
            cache: true,
            data: {
                nama: nama,
                harga: harga,
                id_list_tindakan: id_list_tindakan,
                total: total,
                id_mcu: id_mcu,
            },
            success: function(data) {
                if (data.status == "success") {
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Tindakan ini Telah di Simpan!",
                        confirmButtonColor: "#3cb878",
                    });
                    $('#outBiayaTindakanMcu').val('');
                    $('#inJumlahMcu').val('');
                    $('#outTotalMcu').val('');
                    $('#tablemcu').DataTable().ajax.reload();
                    $('#outTotalHargaMcu').DataTable().ajax.reload();
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

    function tampilTindakanFarmasi(id_mcu) {}

    function up_tindakan_mcu() {
        upBiaya = $('#upBiaya').val();
        upTindakan = $('#upTindakan').val();

        $.ajax({
            url: "<?= base_url() . 'mcu/insert_tindakan' ?>",
            method: "POST",
            dataType: 'json',
            cache: true,
            data: {
                upBiaya: upBiaya,
                upTindakan: upTindakan,
            },
            success: function(data) {
                if (data.status == "success") {
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Tindakan ini Telah di Simpan!",
                        confirmButtonColor: "#3cb878",
                    });
                    $('#upBiaya').val('');
                    $('#upTindakan').val('');
                    $('#tablemcu').DataTable().ajax.reload();
                    $('#outTotalHargaMcu').DataTable().ajax.reload();
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

    function delete_mcu(id_mcu) {
        swal({
            title: "Apakah kamu yakin?",
            text: "Menghapus data pasien?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3cb878",
            confirmButtonText: "Yakin",
            cancelButtonText: "Batal",
            closeOnConfirm: true
        }, function() {
            $().ready(function() {
                $.ajax({
                    url: "<?php echo base_url() ?>mcu/hapus_pasien_mcu",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        id_mcu: id_mcu,
                    },
                    success: function(data) {
                        $('#datable').DataTable().ajax.reload();
                    }
                });
            });

        });
        return false;
    }

    function reload_data_tindakan(id_mcu) {
        $('#tablemcu').dataTable().fnClearTable();
        $('#tablemcu').dataTable().fnDestroy();
        $('#tablemcu').DataTable({
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
                "url": '<?php echo base_url('Mcu/tampil_list_mcu'); ?>',
                "type": 'POST',
                "data": {
                    id_mcu: id_mcu
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

    function pilihTindakanMcu() {
        a = $("#inTindakanMcu").val();
        splitDiag = a.split("|");

        harga = parseFloat(splitDiag[1]);
        $("#outBiayaTindakanMcu").val(convertToRupiah(harga));
        document.getElementById("inJumlahMcu").value = "1";
        document.getElementById("outTotalMcu").value = convertToRupiah(harga);
    }

    

    function reload_total_mcu(id_mcu) {
        $('#outTotalHargaMcu').dataTable().fnClearTable();
        $('#outTotalHargaMcu').dataTable().fnDestroy();
        $('#outTotalHargaMcu').DataTable({
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
                "url": '<?php echo base_url('Mcu/tampil_total_mcu'); ?>',
                "type": 'POST',
                "data": {
                    id_mcu: id_mcu
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

    function edit_mcu(id_mcu) {
        $("#modal_tindakan").modal('show');
        $('#id_mcu').val(id_mcu);
        reload_data_tindakan(id_mcu);
        reload_total_mcu(id_mcu);
    }

    function hapus_mcu(id_tindakan_mcu, id_mcu, nama) {
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
                    url: "<?php echo base_url() ?>mcu/hapus_data_mcu",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        id_tindakan_mcu: id_tindakan_mcu,
                    },
                    success: function(data) {
                        if (data.status == "success") {
                            swal({
                                title: "good job!",
                                type: "success",
                                text: "Data Berhasil dihapus",
                                confirmButtonColor: "#3cb878",
                            });
                            $('#tablemcu').DataTable().ajax.reload();
                            $('#outTotalHargaMcu').DataTable().ajax.reload();
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

    function hargaTotalMcu() {
        splitDiag = a.split("|");
        harga = parseFloat(splitDiag[1]);
        frek = parseFloat($("#inJumlahMcu").val());
        total = harga * frek;

        $("#outTotalMcu").val(convertToRupiah(total));
    }
</script>

<!-- PAKET ------------------------------------------------->
<script>
    function edit_tindakan_mcu() {
        $("#collap_edit_mcu").collapse('toggle');
    }

    function insert_paket() {
        a = $("#inPaket").val();
        splitDiag = a.split("|");
        harga = parseFloat(splitDiag[1]);
        id_paket = splitDiag[0];
        id_mcu = $('#id_mcu_paket').val();

        $.ajax({
            url: "<?= base_url() . 'Data_mcu/insert_paket' ?>",
            method: "POST",
            dataType: 'json',
            cache: true,
            data: {
                harga: harga,
                id_paket: id_paket,
                id_mcu: id_mcu,
            },
            success: function(data) {
                if (data.status == "success") {
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Tindakan ini Telah di Simpan!",
                        confirmButtonColor: "#3cb878",
                    });
                    $('#outBiayaTindakanMcu').val('');
                    $('#inJumlahMcu').val('');
                    $('#outTotalMcu').val('');
                    $('#tablepaket').DataTable().ajax.reload();
                    $('#outTotalHargaPaket').DataTable().ajax.reload();
                } else {
                    swal({
                        title: "Gagal!",
                        type: "warning",
                        text: data,
                        confirmButtonColor: "#3cb878",
                    });
                }
            }
        });
    }
    function hapus_list_paket(id_tindakan, tabel, nama) {
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
                    url: "<?php echo base_url() ?>Data_mcu/hapus_tindakan",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        id_tindakan: id_tindakan,
                        tabel: tabel,
                    },
                    success: function(data) {
                        if (data.status == "success") {
                            swal({
                                title: "good job!",
                                type: "success",
                                text: "Data Berhasil dihapus",
                                confirmButtonColor: "#3cb878",
                            });
                            $('#tablepaket').DataTable().ajax.reload();
                            $('#outTotalHargaPaket').DataTable().ajax.reload();
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

    function reload_data_paket(id_mcu) {
        $('#tablepaket').dataTable().fnClearTable();
        $('#tablepaket').dataTable().fnDestroy();
        $('#tablepaket').DataTable({
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
                "url": '<?php echo base_url('Mcu/tampil_list_paket_mcu'); ?>',
                "type": 'POST',
                "data": {
                    id_mcu: id_mcu
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


    function pilihTindakanPaket() {
        a = $("#inPaket").val();
        splitDiag = a.split("|");

        harga = parseFloat(splitDiag[1]);
        $("#outTotalPaket").val(convertToRupiah(harga));
        $("#hargaPaket").val(harga);

    }

    function reload_total_paket(id_mcu) {
        $('#outTotalHargaPaket').dataTable().fnClearTable();
        $('#outTotalHargaPaket').dataTable().fnDestroy();
        $('#outTotalHargaPaket').DataTable({
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
                "url": '<?php echo base_url('Data_mcu/tampil_total_paket'); ?>',
                "type": 'POST',
                "data": {
                    id_mcu: id_mcu
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

    function edit_paket(id_mcu) {
        $("#modal_paket").modal('show');
        $('#id_mcu_paket').val(id_mcu);
        reload_data_paket(id_mcu);
        reload_total_paket(id_mcu);
    }

    function hapus_paket(id_tindakan_mcu, id_mcu, nama) {
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
                    url: "<?php echo base_url() ?>Data_mcu/hapus_paket",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        id_tindakan_mcu: id_tindakan_mcu,
                    },
                    success: function(data) {
                        if (data.status == "success") {
                            swal({
                                title: "good job!",
                                type: "success",
                                text: "Data Berhasil dihapus",
                                confirmButtonColor: "#3cb878",
                            });
                            $('#tablepaket').DataTable().ajax.reload();
                            $('#outTotalHargaMcu').DataTable().ajax.reload();
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

<!-- RADIOLOGI --------------------------------------------------------------->
<script>
    function convertToRupiah(angka) {
        var rupiah = '';
        var angkarev = angka.toString().split('').reverse().join('');
        for (var i = 0; i < angkarev.length; i++)
            if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + '.';
        return 'Rp. ' + rupiah.split('', rupiah.length - 1).reverse().join('');
    }

    function insert_radiologi() {
        a = $("#inTindakanRadiologi").val();
        splitDiag = a.split("|");
        harga = parseFloat(splitDiag[1]);
        frek = parseFloat($("#inJumlahRadiologi").val());
        total = harga * frek;
        id_list_tindakan = splitDiag[0];
        nama = $('#nama').val();
        id_tindakan_radiologi = $('#id_tindakan_radiologi_mcu').val();

        $.ajax({
            url: "<?= base_url() . 'Mcu/insert_radiologi' ?>",
            method: "POST",
            dataType: 'json',
            cache: true,
            data: {
                nama: nama,
                harga: harga,
                id_list_tindakan: id_list_tindakan,
                total: total,
                id_tindakan_radiologi: id_tindakan_radiologi,
            },
            success: function(data) {
                if (data.status == "success") {
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Tindakan ini Telah di Simpan!",
                        confirmButtonColor: "#3cb878",
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

    function reload_total_radiologi(id_mcu) {
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
                "url": '<?php echo base_url('Mcu/tampil_total_radiologi'); ?>',
                "type": 'POST',
                "data": {
                    id_mcu: id_mcu
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

    function reload_data_radiologi(id_mcu) {
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
                "url": '<?php echo base_url('Mcu/tampil_list_radiologi'); ?>',
                "type": 'POST',
                "data": {
                    id_mcu: id_mcu
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

    function edit_radiologi(id_mcu) {
        // $.ajax({
        // 	url: "<?= base_url() . 'Mcu/get_radiologi' ?>",
        // 	data: {
        // 		id_mcu:id_mcu
        // 	},
        // 	type: 'POST',
        // 	dataType: 'json',
        // 	success: function(data) {
        // 		if (data.status_dt == "found") {
        // 			$("#modal_radiologi").modal('show');
        // 			$('#id_tindakan_radiologi_mcu').val(id_mcu);
        // 			reload_data_radiologi(id_mcu);
        // 			reload_total_radiologi(id_mcu);
        // 		} else {
        // 			alert("data tidak ditemukan");
        // 		}
        // 	}
        // });
        $("#modal_radiologi").modal('show');
        $('#id_tindakan_radiologi_mcu').val(id_mcu);
        reload_data_radiologi(id_mcu);
        reload_total_radiologi(id_mcu);
    }

    function hapus_radiologi(id_tindakan_radiologi, id_mcu, nama) {
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
                    url: "<?php echo base_url() ?>Mcu/hapus_data_radiologi",
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
                                confirmButtonColor: "#3cb878",
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




    // <!-- Labor -->

    function insert_form_labor() {
        diagnosa = $('#labDiagnosa').val();
        ringkasan = $('#labRingkasan').val();
        keterangan = $('#labKet').val();
        id_mcu = $('#id_mcu').val();
        $.ajax({
            url: "<?= base_url() . 'Mcu/insert_form_labor' ?>",
            method: "POST",
            dataType: 'json',
            data: {
                diagnosa: diagnosa,
                ringkasan: ringkasan,
                keterangan: keterangan,
                id_mcu: id_mcu
            },
            success: function(data) {
                if (data.status == "success") {
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Tindakan ini Telah di Simpan!",
                        confirmButtonColor: "#3cb878",
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



    function pilih_labor(id) {

        $('#id_form_lab').val(id);
        $("#formTinLabor").collapse('show');
        $("#collapse_tindakan_labor").collapse('toggle');
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

    function insert_labor() {
        a = $("#inTindakanLabor").val();
        splitDiag = a.split("|");
        harga = parseFloat(splitDiag[1]);
        frek = parseFloat($("#inJumlahLabor").val());
        total = harga * frek;
        id_mcu = $('#id_mcu').val();
        id_list_tindakan = $('#id_daftar_tindakan').val();
        kode_lis = splitDiag[3];
        nama = splitDiag[2];
        id_form_lab = $('#id_form_lab').val();
        var ID = Math.random().toString(36).substr(2, 16);

        dataString = 'id=' + ID + '&harga=' + harga +
            '&id_mcu=' + id_mcu + '&id_list_tindakan=' + splitDiag[0] +
            '&frek=' + frek + '&total=' + total + '&id_form_lab=' + id_form_lab + '&nama_tindakan=' + nama + '&kode_lis=' + kode_lis;
        $.ajax({
            url: "<?= base_url() . 'Mcu/insert_labor' ?>",
            method: "POST",
            dataType: 'json',
            data: dataString,
            success: function(data) {
                if (data.status == "success") {
                    // $('#form_labor')[0].reset();
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Tindakan ini Telah di Simpan!",
                        confirmButtonColor: "#3cb878",
                    });
                    $('#outBiayaTindakanLabor').val('');
                    $('#inJumlahLabor').val('');
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
            url: "<?= base_url() . 'Mcu/req_form_labor' ?>",
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
                        text: "Permintaan Sedang Diproses",
                        confirmButtonColor: "#3cb878",
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
                    url: "<?= base_url() . 'Mcu/hapus_form_labor' ?>",
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
                                confirmButtonColor: "#3cb878",
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

    function reload_data_labor(idmcu) {
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
                "url": '<?php echo base_url('Mcu/tampil_list_labor'); ?>',
                "type": 'POST',
                "data": {
                    idmcu: idmcu
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

    function reload_data_form_labor(id_mcu) {
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
                "url": '<?php echo base_url('Mcu/tampil_form_labor'); ?>',
                "type": 'POST',
                "data": {
                    id_mcu: id_mcu
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

    function detail_tindakan_labor(id_tindakan_labor) {
        $.ajax({
            url: "<?= base_url() . 'Mcu/getdata_formById_Labor' ?>",
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

    function pilihTindakanLabor() {
        a = $("#inTindakanLabor").val();
        splitDiag = a.split("|");

        harga = parseFloat(splitDiag[1]);
        $("#outBiayaTindakanLabor").val(convertToRupiah(harga));
        document.getElementById("inJumlahLabor").value = "1";
        document.getElementById("outTotalLabor").value = convertToRupiah(harga);
    }


    function reload_total_labor(id_mcu) {
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
                "url": '<?php echo base_url('Mcu/tampil_total_labor'); ?>',
                "type": 'POST',
                "data": {
                    id_mcu: id_mcu
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

    function edit_labor(id_mcu, jenis_pelayanan) {

        $("#id_mcu").val(id_mcu);
        // $("#inPelLab").val(id_pelayanan);
        // $("#inHisLab").val(id_history);
        $("#modal_labor").modal('show');
        reload_data_form_labor(id_mcu);

    }

    function hapus_labor(id_tindakan_labor, nama) {
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
                    url: "<?php echo base_url() ?>Mcu/hapus_data_labor",
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
                                confirmButtonColor: "#3cb878",
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
</script>

<!-- KASIR ----------------------------------------------------------------->
<script>
    function insert_kasir(id_mcu) {
        $.ajax({
            url: "<?= base_url() . 'Mcu/insert_req_kasir' ?>",
            data: {
                id_mcu: id_mcu,
            },
            type: 'POST',
            dataType: 'json',
            success: function(data) {
                if (data.status == "success") {
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Data berhasil ditambahkan",
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

    $('#modal_labor').on('hidden.bs.modal', function() {
        $("#collapse_tindakan_labor").collapse('hide');
    })
=======
<!-- TINDAKAN --------------------------------------------------------------------------------------------->
<div class="modal fade bs-example-modal-lg" id="modal_tindakan" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h5 class="modal-title" id="myLargeModalLabel"><i class="icon-user mr-10"></i> TINDAKAN REQUEST MCU
                </h5>
            </div>
            <div class="modal-body">
                <div class="form-wrap">

                    <span class="help-block"></span>
                    <div class="form-body mt-10">
                        <h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO TINDAKAN
                        </h6>
                        <!-- <div align="right">
								<button class="btn btn-primary btn-anim mr-50" style="margin-right: 40px;" onclick="edit_tindakan_mcu()"><i class="icon-plus"></i><span class="btn-text">TAMBAH TINDAKAN</span>
								</button>
							</div> -->
                        <hr width="95%">

                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label class="control-label col-md-3">TINDAKAN MCU</label>
                                <div class="col-md-9 has-success" onchange="pilihTindakanMcu()">
                                    <select class="form-control filled-input select2" style="border: 1px solid lightgreen;" tabindex="1" name="inTindakanMcu" id="inTindakanMcu">
                                        <option value="-">-</option>
                                        <?php
                                        foreach ($tindakan_mcu as $row) :
                                            $harga = $row['harga']; ?>
                                            <option value="<?php echo $row['id_daftar_tindakan'] . "|" . $harga . "|" .  $row['nama']; ?>">
                                                <?php echo $row['nama']; ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!--/span-->

                        <div class="col-md-6">
                            <div class="form-group ">
                                <label class="control-label col-md-3">JUMLAH TINDAKAN</label>
                                <div class="col-md-9 has-error">
                                    <input type="text" class="form-control " id="inJumlahMcu" disabled placeholder="jumlah" oninput="hargaTotalMcu()">
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
                                    <input type="text" class="form-control" disabled id="outBiayaTindakanMcu">
                                    <input type="hidden" class="form-control" disabled id="id_mcu">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label col-md-3">TOTAL HARGA</label>
                                <div class="col-md-9 has-error">
                                    <input type="text" class="form-control " disabled id="outTotalMcu">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <span class="help-block"></span>

                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group pull-right">
                                <button onclick="insert_mcu()" class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>


            <div class="modal-body mt-10">
                <h6 class="txt-dark capitalize-font pl-20"><i class="icon-list mr-10"></i>TINDAKAN</h6>
                <hr width="95%">
                <div class="table-wrap" style="width: 100%; margin: auto ">
                    <div class="table-responsive">
                        <table class="table table-hover display  pb-60" id="tablemcu">
                            <thead>
                                <tr class="bg-success">
                                    <th>NO</th>
                                    <th>HAPUS</th>
                                    <th>STATUS</th>
                                    <th>NAMA TINDAKAN</th>
                                    <th>TANGGAL TINDAKAN</th>
                                    <th>BIAYA TINDAKAN </th>
                                    <th>JUMLAH TINDAKAN</th>
                                    <th>STAFF REQUEST</th>
                                    <th>STAFF KONFIRMASI</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr class="bg-success">
                                    <th>NO</th>
                                    <th>HAPUS</th>
                                    <th>STATUS</th>
                                    <th>NAMA TINDAKAN</th>
                                    <th>TANGGAL TINDAKAN</th>
                                    <th>BIAYA TINDAKAN </th>
                                    <th>JUMLAH TINDAKAN</th>
                                    <th>STAFF REQUEST</th>
                                    <th>STAFF KONFIRMASI</th>>
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
                        <!-- <p id="notif_load" style="color:red;">Loading data, Please wait</p> -->
                        <div class="table-responsive ">
                            <table class="table table-hover display " id="outTotalHargaMcu">
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

<!-- PAKET MCU --------------------------------------------------------------------------------------------->
<div class="modal fade bs-example-modal-lg" id="modal_paket" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h5 class="modal-title" id="myLargeModalLabel"><i class="icon-user mr-10"></i> TINDAKAN REQUEST MCU
                </h5>
            </div>
            <div class="modal-body">
                <div class="form-wrap">

                    <span class="help-block"></span>
                    <div class="form-body mt-10">
                        <h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO TINDAKAN
                        </h6>
                        <!-- <div align="right">
								<button class="btn btn-primary btn-anim mr-50" style="margin-right: 40px;" onclick="edit_tindakan_mcu()"><i class="icon-plus"></i><span class="btn-text">TAMBAH TINDAKAN</span>
								</button>
							</div> -->
                        <hr width="95%">

                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label class="control-label col-md-3">PAKET MCU</label>
                                <div class="col-md-9 has-success" onchange="pilihTindakanPaket()">
                                    <select class="form-control filled-input select2" style="border: 1px solid lightgreen;" tabindex="1" name="inPaket" id="inPaket">
                                        <option value="-">-</option>
                                        <?php
                                        foreach ($paket_mcu as $row) :
                                            $harga = $row['harga']; ?>
                                            <option value="<?php echo $row['id_paket_mcu'] . "|" . $harga . "|" .  $row['nama_paket']; ?>">
                                                <?php echo $row['nama_paket']; ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label col-md-3">HARGA</label>
                                <div class="col-md-9 has-error">
                                    <input type="text" class="form-control " disabled id="outTotalPaket">
                                    <input type="hidden" class="form-control " id="hargaPaket">
                                    <input type="hidden" class="form-control " id="id_mcu_paket">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                        </div>

                    </div>
                    <span class="help-block"></span>


                    <span class="help-block"></span>

                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group pull-right">
                                <button onclick="insert_paket()" class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>


            <div class="modal-body mt-10">
                <h6 class="txt-dark capitalize-font pl-20"><i class="icon-list mr-10"></i>TINDAKAN</h6>
                <hr width="95%">
                <div class="table-wrap" style="width: 100%; margin: auto ">
                    <div class="table-responsive">
                        <table class="table table-hover display  pb-60" id="tablepaket">
                            <thead>
                                <tr class="bg-success">
                                    <th>NO</th>
                                    <th>HAPUS</th>
                                    <th>NAMA TINDAKAN</th>
                                    <th>TANGGAL TINDAKAN</th>
                                    <th>BIAYA TINDAKAN </th>
                                    <th>JUMLAH TINDAKAN</th>
                                    <th>PAKET</th>
                                    <th>STAFF</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr class="bg-success">
                                    <th>NO</th>
                                    <th>HAPUS</th>
                                    <th>NAMA TINDAKAN</th>
                                    <th>TANGGAL TINDAKAN</th>
                                    <th>BIAYA TINDAKAN </th>
                                    <th>JUMLAH TINDAKAN</th>
                                    <th>PAKET</th>
                                    <th>STAFF</th>
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
                        <!-- <p id="notif_load" style="color:red;">Loading data, Please wait</p> -->
                        <div class="table-responsive ">
                            <table class="table table-hover display " id="outTotalHargaPaket">
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

<!-- RADIOLOGI -------------------------------------------------------------------->
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
                                            <?php
                                            foreach ($tindakan_radiologi as $row) :
                                                $harga = $row['harga']; ?>
                                                <option value="<?php echo $row['id_daftar_tindakan'] . "|" . $harga . "|" .  $row['nama']; ?>">
                                                    <?php echo $row['nama']; ?></option>
                                            <?php endforeach ?>
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
                                        <input type="hidden" class="form-control" disabled id="id_tindakan_radiologi_mcu">
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
                <div class="table-wrap" style="width: 100%; margin: auto ">
                    <div class="table-responsive">
                        <table class="table table-hover display  pb-60" id="tableradiologi">
                            <thead>
                                <tr class="bg-success">
                                    <th>NO</th>
                                    <th>NAMA TINDAKAN</th>
                                    <th>TANGGAL TINDAKAN</th>
                                    <th>BIAYA TINDAKAN </th>
                                    <th>JUMLAH TINDAKAN</th>
                                    <th>STAFF REQUEST</th>
                                    <th>STAFF KONFIRMASI</th>
                                    <th>GAMBAR</th>
                                    <th>KETERANGAN</th>
                                    <th>STATUS</th>
                                    <th>HAPUS</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr class="bg-success">
                                    <th>NO</th>
                                    <th>NAMA TINDAKAN</th>
                                    <th>TANGGAL TINDAKAN</th>
                                    <th>BIAYA TINDAKAN </th>
                                    <th>JUMLAH TINDAKAN</th>
                                    <th>STAFF REQUEST</th>
                                    <th>STAFF KONFIRMASI</th>>
                                    <th>GAMBAR</th>
                                    <th>KETERANGAN</th>
                                    <th>STATUS</th>
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
                    <div class="form-body mt-10 collapse" id="collapse_tindakan_labor">
                        <h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO TINDAKAN
                        </h6>
                        <hr width="95%">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label col-md-3">TINDAKAN LABOR</label>
                                    <div class="col-md-9 has-success" onchange="pilihTindakanLabor()">
                                        <select class="form-control filled-input select2" style="border: 1px solid lightgreen;" tabindex="1" name="inTindakanLabor" id="inTindakanLabor">
                                            <option value="-">-</option>
                                            <?php
                                            foreach ($tindakan_labor as $row) :
                                                $harga = $row['harga']; ?>
                                                <option value="<?php echo $row['id_daftar_tindakan'] . "|" . $harga . "|" .  $row['nama'] . "|" .  $row['kode_lis'] ?>">
                                                    <?php echo $row['nama']; ?></option>
                                            <?php endforeach ?>
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
                                        <input type="hidden" class="form-control" disabled id="idmcu">
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
                            <div class="col-md-8">
                                <div class="form-group pull-right">
                                    <button onclick="insert_labor()" class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
                                        <!-- <button onclick="insert_na_lab()" class="btn btn-warning btn-anim  btn-sm ml-20 mt-5" id="na_lab"><i class="icon-rocket"></i><span class="btn-text">N/A</span> -->
                                </div>
                            </div>
                        </div>
                        <h6 class="txt-dark capitalize-font pl-20"><i class="icon-list mr-10"></i>TINDAKAN</h6>
                        <hr width="95%">
                        <div class="table-wrap" style="width: 100%; margin: auto ">
                            <div class="table-responsive">
                                <table class="table table-hover display  pb-60" id="tablelabor">
                                    <thead>
                                        <tr class="bg-success">
                                            <th>NO</th>
                                            <th>HAPUS</th>
                                            <!-- <th>STATUS</th> -->
                                            <th>NAMA TINDAKAN</th>
                                            <th>TANGGAL TINDAKAN</th>
                                            <th>BIAYA TINDAKAN </th>
                                            <th>JUMLAH TINDAKAN</th>
                                            <th>STAFF REQUEST</th>
                                            <th>STAFF KONFIRMASI</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr class="bg-success">
                                            <th>NO</th>
                                            <!-- <th>HAPUS</th> -->
                                            <th>STATUS</th>
                                            <th>NAMA TINDAKAN</th>
                                            <th>TANGGAL TINDAKAN</th>
                                            <th>BIAYA TINDAKAN </th>
                                            <th>JUMLAH TINDAKAN</th>
                                            <th>STAFF REQUEST</th>
                                            <th>STAFF KONFIRMASI</th>
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
                                    <!-- <p id="notif_load" style="color:red;">Loading data, Please wait</p> -->
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
                                            <input type="hidden" class="form-control" disabled id="id_mcu">
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
            </div>

        </div>


    </div>
</div>

<!-- Kasir -->
<div class="panel-wrapper collapse in">
    <div class="panel-body">
        <div class="modal fade" role="dialog" id="modal_edit_kasir" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="form-body mt-10">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel-wrapper collapse in">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-wrap">
                                                        <div class="form-body">
                                                            <div class="modal-body">
                                                                <form class="form-horizontal" action="<?php echo base_url('Kasir/print_kasir_mcu') ?>" method="post" enctype="multipart/form-data" role="form">
                                                                    <input type="hidden" id="inMcu" name="inMcu">
                                                                    <div class="form-body">
                                                                        <h6 class="txt-dark capitalize-font"><i class="icon-user mr-10"></i>INFO KASIR</h6>
                                                                        <hr>
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="form-group ">
                                                                                    <label class="control-label col-md-3">DISC</label>
                                                                                    <div class="col-md-9">
                                                                                        <input type="number" class="form-control rounded-input" autocomplete="off" id="inDiskon" name="inDiskon" value="0">
                                                                                        <span class="help-block"></span>

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group ">
                                                                                    <label class="control-label col-md-3">DP </label>
                                                                                    <div class="col-md-9">
                                                                                        <input type="number" class="form-control rounded-input" autocomplete="off" placeholder="jumlah" id="inDp" name="inDp" value="0">
                                                                                        <span class="help-block"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="form-group ">
                                                                                    <label class="control-label col-md-3">TANGGAL PULANG</label>
                                                                                    <div class="col-md-9">
                                                                                        <input type="datetime-local" class="form-control rounded-input" autocomplete="off" id="inTglKeluar" name="inTglKeluar" value="<?php date_default_timezone_set('Asia/Jakarta');
                                                                                                                                                                                                                        echo date("Y-m-d"); ?>">
                                                                                        <span class="help-block"></span>

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div>
                                                                                <center> <button class="btn btn-info btn-rounded mr-10" type="submit" name="action" value="cetakdanpulang"></i><span class="btn-text">CETAK DAN PULANG</span></button>
                                                                                    <button class="btn btn-warning btn-rounded mr-10" type="submit" name="action" value="cetak">CETAK</button>
                                                                                </center>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- MCU --------------------------------------------------------->
<script>
    function edit_detail() {
        $.ajax({
            url: "<?= base_url() . 'MCU/detail_mcu' ?>",
        });
    }

    // cetak
    function cetak(id_mcu) {

        $.ajax({
            url: "<?= base_url() . 'Kasir/print_kasir_mcu' ?>",
            data: {
                id_mcu: id_mcu,
            },
        });
    }
</script>

<!-- TINDAKAN ------------------------------------------------->
<script>
    function edit_tindakan_mcu() {
        $("#collap_edit_mcu").collapse('toggle');
    }

    function insert_mcu() {
        splitDiag = a.split("|");
        harga = parseFloat(splitDiag[1]);
        frek = parseFloat($("#inJumlahMcu").val());
        total = harga * frek;
        id_list_tindakan = splitDiag[0];
        nama = $('#nama').val();
        id_mcu = $('#id_mcu').val();

        $.ajax({
            url: "<?= base_url() . 'Mcu/insert_mcu' ?>",
            method: "POST",
            dataType: 'json',
            cache: true,
            data: {
                nama: nama,
                harga: harga,
                id_list_tindakan: id_list_tindakan,
                total: total,
                id_mcu: id_mcu,
            },
            success: function(data) {
                if (data.status == "success") {
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Tindakan ini Telah di Simpan!",
                        confirmButtonColor: "#3cb878",
                    });
                    $('#outBiayaTindakanMcu').val('');
                    $('#inJumlahMcu').val('');
                    $('#outTotalMcu').val('');
                    $('#tablemcu').DataTable().ajax.reload();
                    $('#outTotalHargaMcu').DataTable().ajax.reload();
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

    function tampilTindakanFarmasi(id_mcu) {}

    function up_tindakan_mcu() {
        upBiaya = $('#upBiaya').val();
        upTindakan = $('#upTindakan').val();

        $.ajax({
            url: "<?= base_url() . 'mcu/insert_tindakan' ?>",
            method: "POST",
            dataType: 'json',
            cache: true,
            data: {
                upBiaya: upBiaya,
                upTindakan: upTindakan,
            },
            success: function(data) {
                if (data.status == "success") {
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Tindakan ini Telah di Simpan!",
                        confirmButtonColor: "#3cb878",
                    });
                    $('#upBiaya').val('');
                    $('#upTindakan').val('');
                    $('#tablemcu').DataTable().ajax.reload();
                    $('#outTotalHargaMcu').DataTable().ajax.reload();
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

    function delete_mcu(id_mcu) {
        swal({
            title: "Apakah kamu yakin?",
            text: "Menghapus data pasien?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3cb878",
            confirmButtonText: "Yakin",
            cancelButtonText: "Batal",
            closeOnConfirm: true
        }, function() {
            $().ready(function() {
                $.ajax({
                    url: "<?php echo base_url() ?>mcu/hapus_pasien_mcu",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        id_mcu: id_mcu,
                    },
                    success: function(data) {
                        $('#datable').DataTable().ajax.reload();
                    }
                });
            });

        });
        return false;
    }

    function reload_data_tindakan(id_mcu) {
        $('#tablemcu').dataTable().fnClearTable();
        $('#tablemcu').dataTable().fnDestroy();
        $('#tablemcu').DataTable({
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
                "url": '<?php echo base_url('Mcu/tampil_list_mcu'); ?>',
                "type": 'POST',
                "data": {
                    id_mcu: id_mcu
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

    function pilihTindakanMcu() {
        a = $("#inTindakanMcu").val();
        splitDiag = a.split("|");

        harga = parseFloat(splitDiag[1]);
        $("#outBiayaTindakanMcu").val(convertToRupiah(harga));
        document.getElementById("inJumlahMcu").value = "1";
        document.getElementById("outTotalMcu").value = convertToRupiah(harga);
    }

    

    function reload_total_mcu(id_mcu) {
        $('#outTotalHargaMcu').dataTable().fnClearTable();
        $('#outTotalHargaMcu').dataTable().fnDestroy();
        $('#outTotalHargaMcu').DataTable({
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
                "url": '<?php echo base_url('Mcu/tampil_total_mcu'); ?>',
                "type": 'POST',
                "data": {
                    id_mcu: id_mcu
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

    function edit_mcu(id_mcu) {
        $("#modal_tindakan").modal('show');
        $('#id_mcu').val(id_mcu);
        reload_data_tindakan(id_mcu);
        reload_total_mcu(id_mcu);
    }

    function hapus_mcu(id_tindakan_mcu, id_mcu, nama) {
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
                    url: "<?php echo base_url() ?>mcu/hapus_data_mcu",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        id_tindakan_mcu: id_tindakan_mcu,
                    },
                    success: function(data) {
                        if (data.status == "success") {
                            swal({
                                title: "good job!",
                                type: "success",
                                text: "Data Berhasil dihapus",
                                confirmButtonColor: "#3cb878",
                            });
                            $('#tablemcu').DataTable().ajax.reload();
                            $('#outTotalHargaMcu').DataTable().ajax.reload();
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

    function hargaTotalMcu() {
        splitDiag = a.split("|");
        harga = parseFloat(splitDiag[1]);
        frek = parseFloat($("#inJumlahMcu").val());
        total = harga * frek;

        $("#outTotalMcu").val(convertToRupiah(total));
    }
</script>

<!-- PAKET ------------------------------------------------->
<script>
    function edit_tindakan_mcu() {
        $("#collap_edit_mcu").collapse('toggle');
    }

    function insert_paket() {
        a = $("#inPaket").val();
        splitDiag = a.split("|");
        harga = parseFloat(splitDiag[1]);
        id_paket = splitDiag[0];
        id_mcu = $('#id_mcu_paket').val();

        $.ajax({
            url: "<?= base_url() . 'Data_mcu/insert_paket' ?>",
            method: "POST",
            dataType: 'json',
            cache: true,
            data: {
                harga: harga,
                id_paket: id_paket,
                id_mcu: id_mcu,
            },
            success: function(data) {
                if (data.status == "success") {
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Tindakan ini Telah di Simpan!",
                        confirmButtonColor: "#3cb878",
                    });
                    $('#outBiayaTindakanMcu').val('');
                    $('#inJumlahMcu').val('');
                    $('#outTotalMcu').val('');
                    $('#tablepaket').DataTable().ajax.reload();
                    $('#outTotalHargaPaket').DataTable().ajax.reload();
                } else {
                    swal({
                        title: "Gagal!",
                        type: "warning",
                        text: data,
                        confirmButtonColor: "#3cb878",
                    });
                }
            }
        });
    }
    function hapus_list_paket(id_tindakan, tabel, nama) {
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
                    url: "<?php echo base_url() ?>Data_mcu/hapus_tindakan",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        id_tindakan: id_tindakan,
                        tabel: tabel,
                    },
                    success: function(data) {
                        if (data.status == "success") {
                            swal({
                                title: "good job!",
                                type: "success",
                                text: "Data Berhasil dihapus",
                                confirmButtonColor: "#3cb878",
                            });
                            $('#tablepaket').DataTable().ajax.reload();
                            $('#outTotalHargaPaket').DataTable().ajax.reload();
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

    function reload_data_paket(id_mcu) {
        $('#tablepaket').dataTable().fnClearTable();
        $('#tablepaket').dataTable().fnDestroy();
        $('#tablepaket').DataTable({
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
                "url": '<?php echo base_url('Mcu/tampil_list_paket_mcu'); ?>',
                "type": 'POST',
                "data": {
                    id_mcu: id_mcu
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


    function pilihTindakanPaket() {
        a = $("#inPaket").val();
        splitDiag = a.split("|");

        harga = parseFloat(splitDiag[1]);
        $("#outTotalPaket").val(convertToRupiah(harga));
        $("#hargaPaket").val(harga);

    }

    function reload_total_paket(id_mcu) {
        $('#outTotalHargaPaket').dataTable().fnClearTable();
        $('#outTotalHargaPaket').dataTable().fnDestroy();
        $('#outTotalHargaPaket').DataTable({
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
                "url": '<?php echo base_url('Data_mcu/tampil_total_paket'); ?>',
                "type": 'POST',
                "data": {
                    id_mcu: id_mcu
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

    function edit_paket(id_mcu) {
        $("#modal_paket").modal('show');
        $('#id_mcu_paket').val(id_mcu);
        reload_data_paket(id_mcu);
        reload_total_paket(id_mcu);
    }

    function hapus_paket(id_tindakan_mcu, id_mcu, nama) {
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
                    url: "<?php echo base_url() ?>Data_mcu/hapus_paket",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        id_tindakan_mcu: id_tindakan_mcu,
                    },
                    success: function(data) {
                        if (data.status == "success") {
                            swal({
                                title: "good job!",
                                type: "success",
                                text: "Data Berhasil dihapus",
                                confirmButtonColor: "#3cb878",
                            });
                            $('#tablepaket').DataTable().ajax.reload();
                            $('#outTotalHargaMcu').DataTable().ajax.reload();
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

<!-- RADIOLOGI --------------------------------------------------------------->
<script>
    function convertToRupiah(angka) {
        var rupiah = '';
        var angkarev = angka.toString().split('').reverse().join('');
        for (var i = 0; i < angkarev.length; i++)
            if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + '.';
        return 'Rp. ' + rupiah.split('', rupiah.length - 1).reverse().join('');
    }

    function insert_radiologi() {
        a = $("#inTindakanRadiologi").val();
        splitDiag = a.split("|");
        harga = parseFloat(splitDiag[1]);
        frek = parseFloat($("#inJumlahRadiologi").val());
        total = harga * frek;
        id_list_tindakan = splitDiag[0];
        nama = $('#nama').val();
        id_tindakan_radiologi = $('#id_tindakan_radiologi_mcu').val();

        $.ajax({
            url: "<?= base_url() . 'Mcu/insert_radiologi' ?>",
            method: "POST",
            dataType: 'json',
            cache: true,
            data: {
                nama: nama,
                harga: harga,
                id_list_tindakan: id_list_tindakan,
                total: total,
                id_tindakan_radiologi: id_tindakan_radiologi,
            },
            success: function(data) {
                if (data.status == "success") {
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Tindakan ini Telah di Simpan!",
                        confirmButtonColor: "#3cb878",
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

    function reload_total_radiologi(id_mcu) {
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
                "url": '<?php echo base_url('Mcu/tampil_total_radiologi'); ?>',
                "type": 'POST',
                "data": {
                    id_mcu: id_mcu
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

    function reload_data_radiologi(id_mcu) {
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
                "url": '<?php echo base_url('Mcu/tampil_list_radiologi'); ?>',
                "type": 'POST',
                "data": {
                    id_mcu: id_mcu
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

    function edit_radiologi(id_mcu) {
        // $.ajax({
        // 	url: "<?= base_url() . 'Mcu/get_radiologi' ?>",
        // 	data: {
        // 		id_mcu:id_mcu
        // 	},
        // 	type: 'POST',
        // 	dataType: 'json',
        // 	success: function(data) {
        // 		if (data.status_dt == "found") {
        // 			$("#modal_radiologi").modal('show');
        // 			$('#id_tindakan_radiologi_mcu').val(id_mcu);
        // 			reload_data_radiologi(id_mcu);
        // 			reload_total_radiologi(id_mcu);
        // 		} else {
        // 			alert("data tidak ditemukan");
        // 		}
        // 	}
        // });
        $("#modal_radiologi").modal('show');
        $('#id_tindakan_radiologi_mcu').val(id_mcu);
        reload_data_radiologi(id_mcu);
        reload_total_radiologi(id_mcu);
    }

    function hapus_radiologi(id_tindakan_radiologi, id_mcu, nama) {
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
                    url: "<?php echo base_url() ?>Mcu/hapus_data_radiologi",
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
                                confirmButtonColor: "#3cb878",
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




    // <!-- Labor -->

    function insert_form_labor() {
        diagnosa = $('#labDiagnosa').val();
        ringkasan = $('#labRingkasan').val();
        keterangan = $('#labKet').val();
        id_mcu = $('#id_mcu').val();
        $.ajax({
            url: "<?= base_url() . 'Mcu/insert_form_labor' ?>",
            method: "POST",
            dataType: 'json',
            data: {
                diagnosa: diagnosa,
                ringkasan: ringkasan,
                keterangan: keterangan,
                id_mcu: id_mcu
            },
            success: function(data) {
                if (data.status == "success") {
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Tindakan ini Telah di Simpan!",
                        confirmButtonColor: "#3cb878",
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



    function pilih_labor(id) {

        $('#id_form_lab').val(id);
        $("#formTinLabor").collapse('show');
        $("#collapse_tindakan_labor").collapse('toggle');
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

    function insert_labor() {
        a = $("#inTindakanLabor").val();
        splitDiag = a.split("|");
        harga = parseFloat(splitDiag[1]);
        frek = parseFloat($("#inJumlahLabor").val());
        total = harga * frek;
        id_mcu = $('#id_mcu').val();
        id_list_tindakan = $('#id_daftar_tindakan').val();
        kode_lis = splitDiag[3];
        nama = splitDiag[2];
        id_form_lab = $('#id_form_lab').val();
        var ID = Math.random().toString(36).substr(2, 16);

        dataString = 'id=' + ID + '&harga=' + harga +
            '&id_mcu=' + id_mcu + '&id_list_tindakan=' + splitDiag[0] +
            '&frek=' + frek + '&total=' + total + '&id_form_lab=' + id_form_lab + '&nama_tindakan=' + nama + '&kode_lis=' + kode_lis;
        $.ajax({
            url: "<?= base_url() . 'Mcu/insert_labor' ?>",
            method: "POST",
            dataType: 'json',
            data: dataString,
            success: function(data) {
                if (data.status == "success") {
                    // $('#form_labor')[0].reset();
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Tindakan ini Telah di Simpan!",
                        confirmButtonColor: "#3cb878",
                    });
                    $('#outBiayaTindakanLabor').val('');
                    $('#inJumlahLabor').val('');
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
            url: "<?= base_url() . 'Mcu/req_form_labor' ?>",
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
                        text: "Permintaan Sedang Diproses",
                        confirmButtonColor: "#3cb878",
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
                    url: "<?= base_url() . 'Mcu/hapus_form_labor' ?>",
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
                                confirmButtonColor: "#3cb878",
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

    function reload_data_labor(idmcu) {
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
                "url": '<?php echo base_url('Mcu/tampil_list_labor'); ?>',
                "type": 'POST',
                "data": {
                    idmcu: idmcu
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

    function reload_data_form_labor(id_mcu) {
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
                "url": '<?php echo base_url('Mcu/tampil_form_labor'); ?>',
                "type": 'POST',
                "data": {
                    id_mcu: id_mcu
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

    function detail_tindakan_labor(id_tindakan_labor) {
        $.ajax({
            url: "<?= base_url() . 'Mcu/getdata_formById_Labor' ?>",
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

    function pilihTindakanLabor() {
        a = $("#inTindakanLabor").val();
        splitDiag = a.split("|");

        harga = parseFloat(splitDiag[1]);
        $("#outBiayaTindakanLabor").val(convertToRupiah(harga));
        document.getElementById("inJumlahLabor").value = "1";
        document.getElementById("outTotalLabor").value = convertToRupiah(harga);
    }


    function reload_total_labor(id_mcu) {
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
                "url": '<?php echo base_url('Mcu/tampil_total_labor'); ?>',
                "type": 'POST',
                "data": {
                    id_mcu: id_mcu
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

    function edit_labor(id_mcu, jenis_pelayanan) {

        $("#id_mcu").val(id_mcu);
        // $("#inPelLab").val(id_pelayanan);
        // $("#inHisLab").val(id_history);
        $("#modal_labor").modal('show');
        reload_data_form_labor(id_mcu);

    }

    function hapus_labor(id_tindakan_labor, nama) {
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
                    url: "<?php echo base_url() ?>Mcu/hapus_data_labor",
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
                                confirmButtonColor: "#3cb878",
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
</script>

<!-- KASIR ----------------------------------------------------------------->
<script>
    function insert_kasir(id_mcu) {
        $.ajax({
            url: "<?= base_url() . 'Mcu/insert_req_kasir' ?>",
            data: {
                id_mcu: id_mcu,
            },
            type: 'POST',
            dataType: 'json',
            success: function(data) {
                if (data.status == "success") {
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Data berhasil ditambahkan",
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

    $('#modal_labor').on('hidden.bs.modal', function() {
        $("#collapse_tindakan_labor").collapse('hide');
    })
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
</script>