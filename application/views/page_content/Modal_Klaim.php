<!-- Tambah Faktur -->
<div class="panel-wrapper collapse in">
    <div class="panel-body">
        <div class="modal fade " id="modal_edit_faktur" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h5 class="modal-title" id="myLargeModalLabel"><i class="icon-user mr-10"></i> LAPORAN BULANAN
                        </h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-body">
                            <h6 class="txt-dark capitalize-font"><i class="icon-user mr-10"></i>INFO FAKTUR</h6>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">BULAN PENGAJUAN</label>
                                        <div class="col-md-9">
                                            <select class="form-control filled-input rounded-input select2" id="inPengajuan">
                                                <?php

                                                $query = $this->db->query("SELECT * FROM bulan  ")->result_array();

                                                foreach ($query as $row) {

                                                ?>
                                                    <option value="<?php echo $row["nama"]; ?>"><?php echo $row["nama"]; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">BULAN PELAYANAN</label>
                                        <div class="col-md-9">
                                            <select class="form-control filled-input rounded-input select2" id="inPelayanan">
                                                <?php

                                                $query = $this->db->query("SELECT * FROM bulan  ")->result_array();

                                                foreach ($query as $row) {

                                                ?>
                                                    <option value="<?php echo $row["nama"]; ?>"><?php echo $row["nama"]; ?></option>
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

                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">NO BA</label>
                                        <div class="col-md-9">
                                            <input type="text" autocomplete="off" class="form-control " placeholder="NOMOR BA" id="inNoBa">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">TANGGAL BA</label>
                                        <div class="col-md-9">
                                            <input type="date" placeholder="TANGGAL MASUK" id="inTanggalMasuk" name="inTanggalMasuk" data-toggle="datepicker" class="form-control filled-input" autocomplete="off">
                                            <span class="help-block"></span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <h6 class="txt-dark capitalize-font"><i class="icon-note mr-10"></i>Rawat Jalan</h6>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">JUMLAH KLAIM</label>
                                        <div class="col-md-9">
                                            <input type="text" autocomplete="off" class="form-control" placeholder="JUMLAH KLAIM" id="inJumKlaimRj">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">JUMLAH BIAYA</label>
                                        <div class="col-md-9">
                                            <input type="text" autocomplete="off" class="form-control" placeholder="JUMLAH BIAYA" id="inJumBiayaRj">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h6 class="txt-dark capitalize-font"><i class="icon-note mr-10"></i>Rawat Inap</h6>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">JUMLAH KLAIM</label>
                                        <div class="col-md-9">
                                            <input type="text" autocomplete="off" class="form-control" placeholder="JUMLAH KLAIM" id="inKlaimRi">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">JUMLAH BIAYA</label>
                                        <div class="col-md-9">
                                            <input type="text" autocomplete="off" class="form-control" placeholder="JUMLAH BIAYA" id="inBiayaRi">
                                            <span class="help-block"></span>
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
                                                    <div class="btn btn-success mr-10" onclick="insertFaktur()">Tambah</div>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6"> </div>
                                    </div>
                                </div>
                            </div>

                            <!-- table -->
                        </div>


                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Serah Terima -->
<div class="panel-wrapper collapse in">
    <div class="panel-body">
        <div class="modal fade " id="serah_terima" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h5 class="modal-title" id="myLargeModalLabel"><i class="icon-user mr-10"></i> LAPORAN BULANAN
                        </h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-body">
                            <h6 class="txt-dark capitalize-font"><i class="icon-user mr-10"></i>INFO BA</h6>
                            <hr>
                            <input type="text" id="idKlaim">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">NO BA </label>
                                        <div class="col-md-9">
                                            <input type="text" autocomplete="off" class="form-control " placeholder="NOMOR BA" id="inNoBaST">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">TANGGAL BA</label>
                                        <div class="col-md-9">
                                            <input type="date" placeholder="TANGGAL MASUK" id="inTanggalMasukST" name="inTanggalMasukST" data-toggle="datepicker" class="form-control filled-input" autocomplete="off">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <h6 class="txt-dark capitalize-font"><i class="icon-note mr-10"></i>Rawat Jalan</h6>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">JUMLAH KLAIM</label>
                                        <div class="col-md-9">
                                            <input type="text" autocomplete="off" class="form-control" placeholder="JUMLAH KLAIM" id="inJumKlaimRj2">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">JUMLAH BIAYA</label>
                                        <div class="col-md-9">
                                            <input type="text" autocomplete="off" class="form-control" placeholder="JUMLAH BIAYA" id="inJumBiayaRj2">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h6 class="txt-dark capitalize-font"><i class="icon-note mr-10"></i>Rawat Inap</h6>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">JUMLAH KLAIM</label>
                                        <div class="col-md-9">
                                            <input type="text" autocomplete="off" class="form-control" placeholder="JUMLAH KLAIM" id="inJumKlaimRi">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">JUMLAH BIAYA</label>
                                        <div class="col-md-9">
                                            <input type="text" autocomplete="off" class="form-control" placeholder="JUMLAH BIAYA" id="inJumBiayaRi">
                                            <span class="help-block"></span>
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
                                                    <div class="btn btn-success mr-10" onclick="insertST()">Tambah</div>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6"> </div>
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
<!-- FPK -->
<div class="panel-wrapper collapse in">
    <div class="panel-body">
        <div class="modal fade " id="modal_fpk" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h5 class="modal-title" id="myLargeModalLabel"><i class="icon-user mr-10"></i> LAPORAN BULANAN
                        </h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-body">
                            <h6 class="txt-dark capitalize-font"><i class="icon-user mr-10"></i>INFO FPK</h6>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">NO FPK </label>
                                        <div class="col-md-9">
                                            <input type="text" autocomplete="off" class="form-control " placeholder="NOMOR BA" id="inNoBaFPK">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">TANGGAL FPK</label>
                                        <div class="col-md-9">
                                            <input type="date" placeholder="TANGGAL MASUK" id="inTanggalMasukFPK" name="inTanggalMasukFPK" data-toggle="datepicker" class="form-control filled-input" autocomplete="off">
                                            <span class="help-block"></span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <h6 class="txt-dark capitalize-font"><i class="icon-note mr-10"></i>Layak Rawat Jalan</h6>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">JUMLAH KLAIM</label>
                                        <div class="col-md-9">
                                            <input type="text" autocomplete="off" class="form-control" placeholder="JUMLAH KLAIM" id="inKlaimLRjl">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">JUMLAH BIAYA</label>
                                        <div class="col-md-9">
                                            <input type="text" autocomplete="off" class="form-control" placeholder="JUMLAH BIAYA" id="inBiayaRjl">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h6 class="txt-dark capitalize-font"><i class="icon-note mr-10"></i>Layak Rawat Inap</h6>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">JUMLAH KLAIM</label>
                                        <div class="col-md-9">
                                            <input type="text" autocomplete="off" class="form-control" placeholder="JUMLAH KLAIM" id="inKlaimRil">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">JUMLAH BIAYA</label>
                                        <div class="col-md-9">
                                            <input type="text" autocomplete="off" class="form-control" placeholder="JUMLAH BIAYA" id="inBiayaRil">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h6 class="txt-dark capitalize-font"><i class="icon-note mr-10"></i>Pending Rawat Jalan</h6>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">JUMLAH KLAIM</label>
                                        <div class="col-md-9">
                                            <input type="text" autocomplete="off" class="form-control" placeholder="JUMLAH KLAIM" id="inKlaimRjp">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">JUMLAH BIAYA</label>
                                        <div class="col-md-9">
                                            <input type="text" autocomplete="off" class="form-control" placeholder="JUMLAH BIAYA" id="inBiayaRjp">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h6 class="txt-dark capitalize-font"><i class="icon-note mr-10"></i>Pending Rawat Inap</h6>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">JUMLAH KLAIM</label>
                                        <div class="col-md-9">
                                            <input type="text" autocomplete="off" class="form-control" placeholder="JUMLAH KLAIM" id="inKlaimRip">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">JUMLAH BIAYA</label>
                                        <div class="col-md-9">
                                            <input type="text" autocomplete="off" class="form-control" placeholder="JUMLAH BIAYA" id="inBiayaRip">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h6 class="txt-dark capitalize-font"><i class="icon-note mr-10"></i>Tidak Layak Rawat Jalan</h6>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">JUMLAH KLAIM</label>
                                        <div class="col-md-9">
                                            <input type="text" autocomplete="off" class="form-control" placeholder="JUMLAH KLAIM" id="inKlaimRjtl">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">JUMLAH BIAYA</label>
                                        <div class="col-md-9">
                                            <input type="text" autocomplete="off" class="form-control" placeholder="JUMLAH BIAYA" id="inBiayaRjtl">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h6 class="txt-dark capitalize-font"><i class="icon-note mr-10"></i>Tidak Layak Rawat Inap</h6>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">JUMLAH KLAIM</label>
                                        <div class="col-md-9">
                                            <input type="text" autocomplete="off" class="form-control" placeholder="JUMLAH KLAIM" id="inKlaimRitl">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">JUMLAH BIAYA</label>
                                        <div class="col-md-9">
                                            <input type="text" autocomplete="off" class="form-control" placeholder="JUMLAH BIAYA" id="inBiayaRitl">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h6 class="txt-dark capitalize-font"><i class="icon-note mr-10"></i>Dispuite Rawat Jalan</h6>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">JUMLAH KLAIM</label>
                                        <div class="col-md-9">
                                            <input type="text" autocomplete="off" class="form-control" placeholder="JUMLAH KLAIM" id="inKlaimRjd">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">JUMLAH BIAYA</label>
                                        <div class="col-md-9">
                                            <input type="text" autocomplete="off" class="form-control" placeholder="JUMLAH BIAYA" id="inBiayaRjd">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h6 class="txt-dark capitalize-font"><i class="icon-note mr-10"></i>Dispuite Rawat Inap</h6>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">JUMLAH KLAIM</label>
                                        <div class="col-md-9">
                                            <input type="text" autocomplete="off" class="form-control" placeholder="JUMLAH KLAIM" id="inKlaimRid">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">JUMLAH BIAYA</label>
                                        <div class="col-md-9">
                                            <input type="text" autocomplete="off" class="form-control" placeholder="JUMLAH BIAYA" id="inBiayaRid">
                                            <span class="help-block"></span>
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
                                                    <div class="btn btn-success mr-10" onclick="insertFPK()">Tambah</div>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6"> </div>
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
<!-- Terima Pembayaran -->
<div class="panel-wrapper collapse in">
    <div class="panel-body">
        <div class="modal fade " id="terima_pembayaran" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h5 class="modal-title" id="myLargeModalLabel"><i class="icon-user mr-10"></i> LAPORAN BULANAN
                        </h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-body">
                            <h6 class="txt-dark capitalize-font"><i class="icon-user mr-10"></i>INFO BA</h6>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">TANGGAL PEMBAYARAN</label>
                                        <div class="col-md-9">
                                            <input type="date" placeholder="TANGGAL MASUK" id="inTanggalMasukTP" name="inTanggalMasukTP" data-toggle="datepicker" class="form-control filled-input" autocomplete="off">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h6 class="txt-dark capitalize-font"><i class="icon-note mr-10"></i>JUMLAH PEMBAYARAN</h6>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">PEMBAYARAN RAJAL</label>
                                        <div class="col-md-9">
                                            <input type="text" autocomplete="off" class="form-control" placeholder="JUMLAH KLAIM" id="inBiayaRjtp">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">PEMBAYARAN RANAP</label>
                                        <div class="col-md-9">
                                            <input type="text" autocomplete="off" class="form-control" placeholder="JUMLAH BIAYA" id="inBiayaRitp">
                                            <span class="help-block"></span>
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
                                                    <div class="btn btn-success mr-10" onclick="insertTP()">Tambah</div>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6"> </div>
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

<script type="text/javascript">
    function insertFaktur() {
        pengajuan = $("#inPengajuan").val();
        pelayanan = $("#inPelayanan").val();
        noBa = $("#inNoBa").val();
        tglMasuk = $("#inTanggalMasuk").val();
        klaimRj = $("#inJumKlaimRj").val();
        biayaRj = $("#inJumBiayaRj").val();
        klaimRi = $("#inKlaimRi").val();
        biayaRi = $("#inBiayaRi").val();

        dataString = 'pengajuan=' + pengajuan + '&pelayanan=' + pelayanan + '&no_ba=' + noBa +
            '&tgl_masuk=' + tglMasuk + '&klaim_rj=' + klaimRj + '&biaya_rj=' + biayaRj + '&klaim_ri=' + klaimRi + '&biaya_ri=' + biayaRi;
        $.ajax({
            type: "POST",
            url: "<?php echo base_url() ?>Casemix/insertKlaimBpjs",
            data: dataString,
            dataType: 'json',
            cache: true,
            success: function(data) {
                if (data.status == "success") {
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Data ini Telah di Simpan!",
                        confirmButtonColor: "#3cb878",
                    });
                    $("#inPengajuan").val('JANUARI').change();
                    $("#inPelayanan").val('JANUARI').change();
                    $("#inNoBa").val('');
                    $("#inTanggalMasuk").val('');
                    $("#inJumKlaimRj").val('');
                    $("#inJumBiayaRj").val('');
                    $("#inKlaimRi").val('');
                    $("#inBiayaRi").val('');
                    $("#modal_edit_faktur").modal('hide');
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
        })
    }

    function insertST() {
        idKlaim = $("#idKlaim").val();
        noBa = $("#inNoBaST").val();
        tglMasuk = $("#inTanggalMasukST").val();
        klaimRj = $("#inJumKlaimRj2").val();
        biayaRj = $("#inJumBiayaRj2").val();
        klaimRi = $("#inJumKlaimRi").val();
        biayaRi = $("#inJumBiayaRi").val();

        dataString = 'idKlaim=' + idKlaim + '&no_ba=' + noBa +
            '&tgl_masuk=' + tglMasuk + '&klaim_rj=' + klaimRj + '&biaya_rj=' + biayaRj + '&klaim_ri=' + klaimRi + '&biaya_ri=' + biayaRi;
        $.ajax({
            type: "POST",
            url: "<?php echo base_url() ?>Casemix/insertKlaimBpjsBa",
            data: dataString,
            dataType: 'json',
            cache: true,
            success: function(data) {
                if (data.status == "success") {
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Data ini Telah di Simpan!",
                        confirmButtonColor: "#3cb878",
                    });
                    $("#idKlaim").val('');
                    $("#inNoBa").val('');
                    $("#inTanggalMasukST").val('');
                    $("#inJumKlaimRj2").val('');
                    $("#inJumBiayaRj2").val('');
                    $("#inJumKlaimRi").val('');
                    $("#inJumBiayaRi").val('');
                    $("#serah_terima").modal('hide');
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
        })
    }

    function insertFPK() {
        idKlaim = $("#idKlaim").val();
        noBa = $("#inNoBaFPK").val();
        tglMasuk = $("#inTanggalMasukFPK").val();
        klaimRj = $("#inKlaimLRjl").val();
        biayaRj = $("#inBiayaRjl").val();
        klaimRi = $("#inKlaimRil").val();
        biayaRi = $("#inBiayaRil").val();
        klaimRjp = $("#inKlaimRjp").val();
        biayaRjp = $("#inBiayaRjp").val();
        klaimRip = $("#inKlaimRip").val();
        biayaRip = $("#inBiayaRip").val();
        klaimRjtl = $("#inKlaimRjtl").val();
        biayaRjtl = $("#inBiayaRjtl").val();
        klaimRitl = $("#inKlaimRitl").val();
        biayaRitl = $("#inBiayaRitl").val();
        klaimRjd = $("#inKlaimRjd").val();
        biayaRjd = $("#inBiayaRjd").val();
        klaimRid = $("#inKlaimRid").val();
        biayaRid = $("#inBiayaRid").val();
        dataString = 'idKlaim=' + idKlaim + '&no_ba=' + noBa +
            '&tgl_masuk=' + tglMasuk + '&klaim_rj=' + klaimRj + '&biaya_rj=' + biayaRj + '&klaim_ri=' + klaimRi + '&biaya_ri=' + biayaRi + '&klaim_rjp=' + klaimRjp + '&biaya_rjp=' + biayaRjp + '&klaim_rip=' + klaimRip + '&biaya_rip=' + biayaRip + '&klaim_rjtl=' + klaimRjtl + '&biaya_rjtl=' + biayaRjtl + '&klaim_ritl=' + klaimRitl + '&biaya_ritl=' + biayaRitl + '&klaim_rjd=' + klaimRjd + '&biaya_rjd=' + biayaRjd + '&klaim_rid=' + klaimRid + '&biaya_rid=' + biayaRid;
        $.ajax({
            type: "POST",
            url: "<?php echo base_url() ?>Casemix/insertKlaimBpjsFpk",
            data: dataString,
            dataType: 'json',
            cache: true,
            success: function(data) {
                if (data.status == "success") {
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Data ini Telah di Simpan!",
                        confirmButtonColor: "#3cb878",
                    });
                    $("#idKlaim").val('');
                    $("#inTanggalMasukFPK").val('');
                    $("#inNoBaFPK").val('');
                    $("#inKlaimLRjl").val('');
                    $("#inBiayaRjl").val('');
                    $("#inKlaimRil").val('');
                    $("#inBiayaRil").val('');
                    $("#inKlaimRjp").val('');
                    $("#inBiayaRjp").val('');
                    $("#inKlaimRip").val('');
                    $("#inBiayaRip").val('');
                    $("#inKlaimRjtl").val('');
                    $("#inBiayaRjtl").val('');
                    $("#inKlaimRitl").val('');
                    $("#inBiayaRitl").val('');
                    $("#inKlaimRjd").val('');
                    $("#inBiayaRjd").val('');
                    $("#inKlaimRid").val('');
                    $("#inBiayaRid").val('');
                    $("#modal_fpk").modal('hide');
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
        })
    }
    function insertTP() {
        idKlaim = $("#idKlaim").val();
        tglMasuk = $("#inTanggalMasukTP").val();
        biayaRj = $("#inBiayaRjtp").val();
        biayaRi = $("#inBiayaRitp").val();

        dataString = 'idKlaim=' +idKlaim +'&tgl_masuk='+ tglMasuk  +  '&biaya_rj=' +biayaRj +  '&biaya_ri=' +biayaRi; 
        $.ajax({
            type: "POST",
            url: "<?php echo base_url() ?>Casemix/insertKlaimBpjsRek",
            data: dataString,
            dataType: 'json',
            cache: true,
            success: function(data) {
                if (data.status == "success") {
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Data ini Telah di Simpan!",
                        confirmButtonColor: "#3cb878",
                    });
                    $("#idKlaim").val('');
                    $("#inTanggalMasukTP").val('');
                    $("#inBiayaRjtp").val('');
                    $("#inBiayaRitp").val('');
                    $("#terima_pembayaran").modal('hide');
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
        })
    }
</script>