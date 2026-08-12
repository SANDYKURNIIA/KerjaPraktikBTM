<<<<<<< HEAD
<?php
$data = $this->session->userdata('data_auth');
$izinAkses = $data->izin_akses;
?>
<?php $this->load->view('erm_form/Penunjang/pindah_kamar'); ?>




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
                                    <!-- <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group ">
                                                <label class="control-label col-md-3">GOLONGAN OBAT</label>
                                                <div class="col-md-9 has-success">
                                                    <select class="form-control filled-input select2" id="inGolongan" onchange="getObatByGol()">
                                                        <option value="-">-</option>
                                                        <?php foreach ($golongan as $s) { ?>
                                                            <option value="<?= $s['golongan_farmakologi']; ?>"><?= $s['golongan_farmakologi']; ?></option>

                                                        <?php } ?>
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

                                                <select class="form-control filled-input rounded-input select2" id="inSigna">
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
                                                    <!-- <th>EXPIRE DATE</th> -->
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
                                    <input type="hidden" class="form-control" id="inResObat1">
                                    <div class="col-md-offset-3 col-md-9">
                                        <span></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label col-md-3">CARA PAKAI OBAT</label>
                                    <div class="col-md-9">
                                        <select class="form-control filled-input rounded-input select2" id="inCaraPakai1">
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
                                            <option value="APOTIK">RAJAL</option>

                                            <option value="RANAP" selected>RANAP</option>
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
                                    <th>LANJUTKAN RESEP</th>
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
                <h5 class="modal-title" id="myLargeModalLabel"><i class="icon-user mr-10"></i> TINDAKAN REQUEST LABOR RANAP
                </h5>
            </div>
            <div class="modal-body">
                <div class="form-wrap">
                    <!-- /formbody -->
                    <div class="form-body mt-10 collapse" id="collapse_tindakan_labor">
                        <h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO TINDAKAN LABOR
                        </h6>
                        <hr width="95%">

                        <div class="collapse" id="formTinLabor">

                            <form id="form_labor">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <span class="help-block"></span>
                                            <label class="control-label col-md-3">TIPE KAMAR</label>
                                            <div class="col-md-9 has-success">
                                                <!-- <input type="text" value="</?=$kelas?>"> -->
                                                <select class="form-control filled-input select2" placeholder="KAMAR" style="border: 1px solid lightgreen;" id="inTipeKamarlabor" name="TipeKamar">
                                                    <option value="-">
                                                        -</option>
                                                    <?php
                                                    foreach ($data_tipe_kamar as $row) :
                                                    ?>
                                                        <option value="<?php echo $row->nama ?>" <?= $row->nama == $kelas ? 'selected' : ''; ?>>
                                                            <?php echo $row->nama; ?></option>
                                                    <?php endforeach; ?>

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->

                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">TINDAKAN LABOR</label>
                                            <div class="col-md-9 has-success">
                                                <select class="form-control filled-input select2" placeholder="PILIH TINDAKAN" style="border: 1px solid lightgreen;" id="outTipeKamarlabor" onchange="pilihTindakanLabor(this)">
                                                    <option value="-">-</option>
                                                    <!-- </?php
                                                    foreach ($tindakan_labor as $row) :
                                                        $harga = $row['harga']; ?>
                                                        <option value="</?php echo $row['id_daftar_tindakan'] . "|" . $harga . "|" .  $row['nama']. "|" .  $row['kode_lis']; ?>">
                                                            </?php echo $row['nama']; ?></option>
                                                    </?php endforeach ?> -->
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <span class="help-block"></span>


                                <div class="row">
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
                                            <!-- </?php if ($izinAkses == "admin") { ?> -->
                                            <th>HAPUS</th>
                                            <!-- </?php } ?> -->
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
                                            <!-- </?php if ($izinAkses == "admin") { ?>
                                                <th>HAPUS</th>
                                            </?php } ?> -->
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
                                            <input type="hidden" class="form-control" disabled id="inPelLab">
                                            <input type="hidden" class="form-control" disabled id="inHisLab">
                                            <!-- <input type="hidden" class="form-control" disabled id="cara_bayar_lab"> -->

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
                                <div class="form-group">
                                    <span class="help-block"></span>
                                    <label class="control-label col-md-3">TIPE KAMAR</label>
                                    <div class="col-md-9 has-success">
                                        <select class="form-control filled-input select2" placeholder="KAMAR" style="border: 1px solid lightgreen;" id="inTipeKamarRadiologi" name="TipeKamar">
                                            <option value="-">
                                                -</option>
                                            <?php
                                            foreach ($data_tipe_kamar as $row) :
                                            ?>
                                                <option value="<?php echo $row->nama ?>" <?= $row->nama == $kelas ? 'selected' : ''; ?>>
                                                    <!-- <option value="</?php echo $row->nama; ?>"> -->
                                                    <?php echo $row->nama; ?>
                                                </option>
                                            <?php endforeach; ?>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label col-md-3">TINDAKAN RADIOLOGI</label>
                                    <div class="col-md-9 has-success">
                                        <select class="form-control filled-input select2" placeholder="PILIH TINDAKAN" style="border: 1px solid lightgreen;" id="outTipeKamarRadiologi" onchange="pilihTindakanRadiologi(this)">
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
                        </div>
                        <span class="help-block"></span>

                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label col-md-3">JUMLAH TINDAKAN</label>
                                    <div class="col-md-9 has-error">
                                        <input type="text" class="form-control " id="inJumlahRadiologi" disabled placeholder="jumlah" oninput="hargaTotalRadiologi()">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>
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
                        </div>
                        <span class="help-block"></span>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">TOTAL HARGA</label>
                                    <div class="col-md-9 has-error">
                                        <input type="text" class="form-control " disabled id="outTotalRadiologi">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>
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
                                    <th>AKSI</th>
                                    <th>EXPERTISE</th>
                                    <th>NAMA</th>
                                    <th>TANGGAL TINDAKAN</th>
                                    <th>BIAYA TINDAKAN </th>
                                    <th>JUMLAH TINDAKAN</th>
                                    <th>STAFF REQUEST</th>
                                    <th>STAFF KONFIRMASI</th>
                                    <th>DIAGNOSA</th>
                                    <th>GAMBAR</th>
                                    <th>KETERANGAN</th>
                                    <th>STATUS</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr class="bg-success">
                                    <th>NO</th>
                                    <th>HAPUS</th>
                                    <th>AKSI</th>
                                    <th>EXPERTISE</th>
                                    <th>NAMA</th>
                                    <th>TANGGAL TINDAKAN</th>
                                    <th>BIAYA TINDAKAN </th>
                                    <th>JUMLAH TINDAKAN</th>
                                    <th>STAFF REQUEST</th>
                                    <th>DIAGNOSA</th>
                                    <th>STAFF KONFIRMASI</th>
                                    <th>GAMBAR</th>
                                    <th>KETERANGAN</th>
                                    <th>STATUS</th>
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


<!-- tindakan biaya -->
<div class="modal fade bs-example-modal-lg" id="modal_pembayaran" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">

    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h5 class="modal-title" id="myLargeModalLabel"><i class="icon-user mr-10"></i> INFO TINDAKAN BIAYA
                </h5>
            </div>

            <div class="modal-body">

                <div class="form-wrap">
                    <!-- /formbody -->
                    <div class="form-body">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <span class="help-block"></span>
                                    <label class="control-label col-md-3">NO RM</label>
                                    <div class="col-md-9 has-success">
                                        <input type="text" style="margin-top:-0.8em;" class="form-control" disabled="" id="no_rm1">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">NAMA PASIEN</label>
                                    <div class="col-md-9 has-success">
                                        <input type="text" class="form-control" disabled="" id="nama1">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="modal-body mt-30">
                            <h6 class="txt-dark capitalize-font pl-20"><i class="icon-list mr-10"></i>DATA KAMAR</h6>
                            <hr width="95%">
                            <div class="table-wrap" style="width: 100%; margin: auto ">
                                <div class="table-responsive">
                                    <table class="table table-hover display  pb-60" id="tablekamar1">
                                        <thead>
                                            <tr class="bg-success">
                                                <th>NO</th>
                                                <th>KELAS</th>
                                                <th>KAMAR</th>
                                                <th>TANGGAL MASUK</th>
                                                <th>TANGGAL KELUAR</th>
                                                <th>STATUS</th>
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
            <div class="modal-body mt-10" style="margin-bottom:-2em;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h6 class="txt-dark capitalize-font pl-20"><i class="icon-list mr-10"></i>INFO TINDAKAN BIAYA</h6>
                <hr width="95%">
            </div>

            <div class="modal-body">

                <div class="form-wrap">
                    <!-- /formbody -->
                    <div class="form-body">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <span class="help-block"></span>
                                    <label class="control-label col-md-3">TIPE KAMAR</label>
                                    <div class="col-md-9 has-success">
                                        <!-- <input type="text" value="</?=$kelas?>"> -->

                                        <select class="form-control filled-input select2" placeholder="KAMAR" style="border: 1px solid lightgreen;" id="inTipeKamar" name="TipeKamar">
                                            <option value="-">
                                                -</option>
                                            <?php
                                            foreach ($data_tipe_kamar as $row) :
                                            ?>
                                                <option value="<?php echo $row->nama ?>" <?= $row->nama == $kelas ? 'selected' : ''; ?>>
                                                    <?php echo $row->nama; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">NAMA TINDAKAN</label>
                                    <div class="col-md-9 has-success">

                                        <select class="form-control filled-input select2" placeholder="PILIH TINDAKAN" style="border: 1px solid lightgreen;" id="outTipeKamar" onchange="pilihTindakan(this)">

                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <span class=" help-block"></span>
                        <!-- /Row -->

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label col-md-3">JUMLAH TINDAKAN</label>
                                    <div class="col-md-9">
                                        <input type="number" class="form-control " id="inJumlah" value="1" placeholder="jumlah" oninput="hargaTotal()">

                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label col-md-3">BIAYA TINDAKAN</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" disabled="" id="outBiayaTindakan">
                                        <input type="hidden" class="form-control" id="inBiayaTindakan">
                                        <input type="hidden" class="form-control " disabled="" id="idPelayanan">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <!-- /Row -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">NAMA DOKTER</label>
                                    <div class="col-md-9 has-success">
                                        <select class="form-control filled-input select2" placeholder="PILIH KATEGORI" style="border: 1px solid lightgreen;" id="inDPJP" name="NAMA DOKTER">

                                            <?php
                                            foreach ($data_dokter as $row) :
                                            ?>
                                                <option value="<?php echo $row->id_dokter; ?>">
                                                    <?php echo $row->nama; ?></option>
                                            <?php endforeach; ?>
                                            >
                                        </select>
                                        <input type="hidden" id="kodedpjp">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label col-md-3">TOTAL HARGA</label>
                                    <div class="col-md-9">
                                        <input type="text" va class="form-control " disabled="" id="outTotal">

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

                        </div>


                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button onclick="insert_tindakan()" class="btn btn-success btn-anim  btn-sm mr-20"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
            </div>
            <div class="modal-body mt-30">
                <h6 class="txt-dark capitalize-font pl-20"><i class="icon-list mr-10"></i>TINDAKAN</h6>
                <hr width="95%">
                <div class="table-wrap" style="width: 95%; margin: auto ">
                    <div class="table-responsive">
                        <table class="table table-hover display  pb-60" id="tabletindakan">
                            <thead>
                                <tr class="bg-success">
                                    <th>NO</th>
                                    <th>NAMA TINDAKAN</th>
                                    <th>TIPE KAMAR</th>
                                    <th>BIAYA TINDAKAN </th>
                                    <th>JUMLAH TINDAKAN</th>
                                    <th>TOTAL BIAYA</th>
                                    <th>TANGGAL</th>
                                    <th>DOKTER</th>
                                    <th>NAMA STAFF</th>
                                    <th>PEMBAYARAN </th>
                                    <!-- </?php if ($izinAkses == "admin") { ?> -->
                                    <th>HAPUS</th>
                                    <!-- </?php } ?> -->
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

<!-- FISIO -->
<div class="modal fade bs-example-modal-lg" id="modal_fisio" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h5 class="modal-title" id="myLargeModalLabel"><i class="icon-user mr-10"></i> TINDAKAN REQUEST FISIO
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
                                    <label class="control-label col-md-3">TINDAKAN</label>
                                    <div class="col-md-9 has-success">
                                        <select class="form-control filled-input select2" placeholder="PILIH TINDAKAN" style="border: 1px solid lightgreen;" id="outTindakanFisio" onchange="pilihTindakanFisio(this)">
                                            <option value="-">-</option>
                                            <?php
                                            foreach ($tindakan_fisio as $row) :
                                                $harga = $row['harga_sarana'];
                                                $jasa = $row['harga_jasa']; ?>
                                                <option value="<?php echo $row['id_list_tindakan'] . "|" . $harga . "|" . $jasa . "|" .  $row['nama']; ?>">
                                                    <?php echo $row['nama']; ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!--/span-->

                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label col-md-3">TOTAL TINDAKAN</label>
                                    <div class="col-md-9 has-error">
                                        <input type="number" class="form-control" id="outJumlahTindakan" oninput="hargaTotalFisio()">
                                        <input type="hidden" class="form-control" disabled id="id_pelayanan">
                                        <input type="hidden" class="form-control" disabled id="id_history">
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
                                        <input type="text" class="form-control" id="outBiayaTindakanFisio" disabled>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">TOTAL HARGA</label>
                                    <div class="col-md-9 has-error">
                                        <input type="text" class="form-control " disabled id="outTotalfisio">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label col-md-3">NAMA DOKTER</label>
                                    <div class="col-md-9 has-success">
                                        <select class="form-control filled-input select2" placeholder="PILIH DOKTER" style="border: 1px solid lightgreen;" id="DPJP">
                                            <option value="-">-</option>
                                            <?php
                                            foreach ($dokter as $row) : ?>
                                                <option value="<?php echo $row['id_dokter']; ?>">
                                                    <?php echo $row['nama']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <span class="help-block"></span>

                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group pull-right">
                                    <button onclick="insert_fisio()" class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
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
                        <table class="table table-hover display  pb-60" id="tablefisio">
                            <thead>
                                <tr class="bg-success">
                                    <th>NO</th>
                                    <th>NAMA</th>
                                    <th>TANGGAL TINDAKAN</th>
                                    <th>JUMLAH TINDAKAN</th>
                                    <th>BIAYA TINDAKAN</th>
                                    <th>DOKTER</th>
                                    <th>STAFF</th>
                                    <th>HAPUS</th>
                                </tr>
                            </thead>
                            <tbody style="color: black">
                            </tbody>
                            <tfoot>
                                <tr class="bg-success">
                                    <th>NO</th>
                                    <th>NAMA</th>
                                    <th>TANGGAL TINDAKAN</th>
                                    <th>BIAYA TINDAKAN </th>
                                    <th>JUMLAH TINDAKAN</th>
                                    <th>DOKTER</th>
                                    <th>STAFF</th>
                                    <th>HAPUS</th>
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

<!-- obat ruangan -->
<div class="modal fade bs-example-modal-lg" id="modal_obat_ruang" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h5 class="modal-title" id="myLargeModalLabel"><i class="icon-user mr-10"></i> OBAT RUANGAN
                </h5>
            </div>
            <div class="modal-body">
                <div class="form-wrap">
                    <!-- /formbody -->
                    <div class="form-body">
                        <h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO OBAT
                        </h6>
                        <hr width="95%">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label col-md-3">NAMA OBAT</label>
                                    <div class="col-md-9 has-success">
                                        <select class="form-control filled-input select2" id="inObatRuang" onchange="setHarga1()">
                                            <option value="-">-</option>
                                            <?php

                                            foreach ($obat_ruang as $row) {
                                                $harga = ($row["harga_cost"] / $row["satuan_ok"]);
                                                $stok =  $row["stok"] * $row["satuan_ok"];
                                            ?>
                                                <option value="<?php echo $row["id_logistik"] . '|' . $harga . '|' . $row["margin"] . '|' . $row["kadaluarsa"] . '|' . $stok . '|' . $row["ppn"]; ?>"><?php echo $row["nama"]; ?></option>
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
                                        <input type="text" class="form-control " id="inTglExpR" disabled="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label col-md-3">JUMLAH STOK</label>
                                    <div class="col-md-9 has-error">
                                        <input type="number" class="form-control " id="outStokR" value="0" disabled="">
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
                                        <input type="number" class="form-control " id="inJumlahObatR" placeholder="jumlah" value="1" min="1" oninput="setHarga1()">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">DISCOUNT</label>
                                    <div class="col-md-3 has-success">
                                        <input type="number" placeholder="Disc" max="35" class="form-control" id="inDiscR" value="0" oninput="setHarga1()">
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
                                        <input type="text" class="form-control" disabled="" id="outBiayaTindakanObatR">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label col-md-3">HARGA + MARGIN</label>
                                    <div class="col-md-9 has-error">
                                        <input type="text" class="form-control" disabled="" id="outBiayaMarginObatR">
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
                                        <input type="text" class="form-control" disabled="" id="outTotalObatR">

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label col-md-3">KETERANGAN</label>
                                    <div class="col-md-9 has-success">
                                        <textarea class="form-control" rows="2" style="resize:none" id="inKeteranganObatR">-</textarea>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row" style="margin-top: 10px;" id="cetakSigna1">

                            <div class="col-md-6">
                                <label class="control-label col-md-3">SIGNA OBAT</label>
                                <div class="col-md-9 has-success">
                                    <select class="form-control filled-input rounded-input select2" id="inSignaR">
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
                                    <select class="form-control filled-input rounded-input select2" id="inCaraPakaiR">
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
                        <input type="hidden" class="form-control" id="inHisObat">
                        <div class="form-actions mt-10">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-9">
                                            <div type="submit" class="btn btn-success mr-10" onclick="insert_ObatR()">SIMPAN</div>

                                            <span></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6"> </div>
                            </div>
                        </div>
                        <div class="panel-wrapper collapse in mb-20 mt-20" id="outListTindakanApelkes">
                            <h6 class="txt-dark capitalize-font pl-20 mb-0"><i class="icon-list mr-10"></i>TINDAKAN OBAT</h6>
                            <hr width="95% mb-0">
                            <div class="panel-body mt-0">
                                <div class="table-wrap mt-0">
                                    <div class="table-responsive mt-0">
                                        <table id="tableobatR" class="table table-hover display pb-30 mt-10" width="100%">
                                            <thead>
                                                <tr class="bg-success">
                                                    <th>NO</th>
                                                    <th>NAMA OBAT</th>
                                                    <th>EXPIRE DATE</th>
                                                    <th>HARGA OBAT</th>
                                                    <th>JUMLAH OBAT</th>
                                                    <th>TOTAL BIAYA</th>
                                                    <th>TANGGAL INPUT</th>
                                                    <th>NAMA STAFF</th>
                                                    <th>HAPUS</th>
                                                    <!-- <th>SIGNA</th> -->
                                                </tr>
                                            </thead>
                                            <tbody style="color: black">
                                            </tbody>
                                            <tfoot>
                                                <th>NO</th>
                                                <th>NAMA OBAT</th>
                                                <th>EXPIRE DATE</th>
                                                <th>HARGA OBAT</th>
                                                <th>JUMLAH OBAT</th>
                                                <th>TOTAL BIAYA</th>
                                                <th>TANGGAL INPUT</th>
                                                <th>NAMA STAFF</th>
                                                <th>HAPUS</th>
                                            </tfoot>
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
                                                <table class="table table-hover display " id="outTotalHarga1">
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

                        <span class="help-block"></span>
                        <div align="right">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-9">
                                            <!-- <div id="cetakFarmasi" onclick="cetak_resep()" class="btn btn-success mr-10">CETAK RESEP</div> -->
                                            <div id="batalFarmasi" onclick="batalFarmasi()" class="btn btn-danger ">BATAL</div>

                                            <span></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6"> </div>
                            </div>

                        </div>
                        <br>
                        <br>
                        </hr>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- visite dokter -->
<div class="modal fade bs-example-modal-lg" id="modal_visite" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">

    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h5 class="modal-title" id="myLargeModalLabel"><i class="icon-user mr-10"></i> INFO TINDAKAN VISITE DOKTER
                </h5>
            </div>

            <div class="modal-body">

                <div class="form-wrap">
                    <!-- /formbody -->
                    <div class="form-body">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">TINDAKAN</label>
                                    <div class="col-md-9 has-success">
                                        <!-- <input type="text" value="</?=$kelas?>"> -->

                                        <select class="form-control filled-input select2" placeholder="KAMAR" style="border: 1px solid lightgreen;" id="inTindakanV" name="inTindakanV" onchange="getVisiteDok()">
                                            <option value="visite">VISITE</option>
                                            <option value="diskon">DISKON VISITE</option>

                                        </select>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">TIPE KAMAR</label>
                                    <div class="col-md-9 has-success">
                                        <!-- <input type="text" value="</?=$kelas?>"> -->

                                        <select class="form-control filled-input select2" placeholder="KAMAR" style="border: 1px solid lightgreen;" id="inTipeKamar1" name="TipeKamar" onchange="getVisiteDok()">
                                            <option value="-">
                                                -</option>
                                            <?php
                                            foreach ($data_tipe_kamar as $row) :
                                            ?>
                                                <option value="<?php echo $row->nama ?>" <?= $row->nama == $kelas ? 'selected' : ''; ?>>
                                                    <?php echo $row->nama; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>



                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">NAMA DOKTER</label>
                                    <div class="col-md-9 has-success">
                                        <select class="form-control filled-input select2" placeholder="PILIH KATEGORI" style="border: 1px solid lightgreen;" id="inDPJP1" name="NAMA DOKTER" onchange="getVisiteDok()">

                                            <?php
                                            foreach ($data_dokter as $row) :
                                            ?>
                                                <option value="<?php echo $row->id_dokter; ?>">
                                                    <?php echo $row->nama; ?></option>
                                            <?php endforeach; ?>
                                            >
                                        </select>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label col-md-3">TANGGAL</label>
                                    <div class="col-md-9 has-success">
                                        <input type="date" value="<?php echo date("Y-m-d"); ?>" id="tgl_visite" name="tgl_visite" class="form-control">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" class="form-control " id="hargaSarana">
                <input type="hidden" class="form-control " id="hargaJasa">
                <input type="hidden" class="form-control " id="id_list_tindakan">
                <input type="hidden" class="form-control " id="idPelayanan1">
                <input type="hidden" class="form-control " id="idHis1">

                <button onclick="insert_visite()" class="btn btn-success btn-anim  btn-sm mr-20"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
            </div>
            <div class="modal-body mt-30">
                <h6 class="txt-dark capitalize-font pl-20"><i class="icon-list mr-10"></i>TINDAKAN</h6>
                <hr width="95%">
                <div class="table-wrap" style="width: 95%; margin: auto ">
                    <div class="table-responsive">
                        <table class="table table-hover display  pb-60" id="tabletindakan1">
                            <thead>
                                <tr class="bg-success">
                                    <th>NO</th>
                                    <th>NAMA TINDAKAN</th>
                                    <th>TIPE KAMAR</th>
                                    <th>BIAYA TINDAKAN </th>
                                    <th>JUMLAH TINDAKAN</th>
                                    <th>TOTAL BIAYA</th>
                                    <th>TANGGAL</th>
                                    <th>DOKTER</th>
                                    <th>NAMA STAFF</th>
                                    <!-- </?php if ($izinAkses == "admin") { ?> -->
                                    <th>HAPUS</th>
                                    <!-- </?php } ?> -->
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
                            <table class="table table-hover display " id="outTotalHarga2">
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



<style>
    td {
        color: black;
    }

    .zoom:active {
        position: relative;
        overflow: hidden;
        transition: all .3s ease-in-out;
        -webkit-transform: scale(6.5);
        transform: scale(6.5);
    }
</style>
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
                // if (cara_bayar == '31'){
                //     $('#inMargin').val('1.1');
                // }else{
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
                    id_history: id_history,
                    akun: 'ranap'
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

    function reload_data_obat1(id_resep) {
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
                "url": '<?php echo base_url('Apelkes/tampil_list_tindakan'); ?>',
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

    function reload_total_harga(id_pelayanan) {
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
                "url": '<?php echo base_url('Apelkes/tampil_total_harga'); ?>',
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

    ////vistie
    function reload_data_tindakan1(id_pelayanan) {
        $('#tabletindakan1').dataTable().fnClearTable();
        $('#tabletindakan1').dataTable().fnDestroy();
        $('#tabletindakan1').DataTable({
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
                "url": '<?php echo base_url('Apelkes/tampil_list_tindakan_visite'); ?>',
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

    function reload_total_harga1(id_pelayanan) {
        $('#outTotalHarga2').dataTable().fnClearTable();
        $('#outTotalHarga2').dataTable().fnDestroy();
        $('#outTotalHarga2').DataTable({
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
                "url": '<?php echo base_url('Apelkes/tampil_total_harga_visite'); ?>',
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

    function cetak_antrian() {
        id_pelayanan = $('#inPelResep').val();
        $.ajax({
            url: "<?php echo base_url() ?>Rawatinap/insertAntrian",
            method: "POST",
            data: {
                id_pelayanan: id_pelayanan,
            },

            success: function() {
                window.location.href = '<?php echo base_url() ?>Rawatinap/print_antrian_apotik';

            }
        })

    }

    function edit_data_tindakan(id_pelayanan, id_history) {
        swal({
            title: "Hi. dear",
            type: "info",
            text: "Fitur ini segera hadir",
            confirmButtonColor: "#3cb878",
        });
    }




    // Radiologi
    function insert_radiologi() {
        a = $("#outTipeKamarRadiologi").val();
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
        status_pembayaran = $('#inPembayaran1').val();

        dataString = 'id=' + ID + '&harga=' + harga +
            '&id_pel_rad=' + id_pel_rad + '&id_his_rad=' + id_his_rad + '&id_list_tindakan=' + splitDiag[0] +
            '&frek=' + frek + '&total=' + total + '&jenis_pelayanan=' + "RAWAT INAP" + '&diagnosa=' + diagnosa +
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

    // function pilihTindakanRadiologi() {
    //     a = $("#inTindakanRadiologi").val();
    //     splitDiag = a.split("|");

    //     harga = parseFloat(splitDiag[1]);
    //     $("#outBiayaTindakanRadiologi").val(convertToRupiah(harga));
    //     document.getElementById("inJumlahRadiologi").value = "1";
    //     document.getElementById("outTotalRadiologi").value = convertToRupiah(harga);
    // }

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
                "url": '<?php echo base_url('Rawatinap/tampil_total_radiologi'); ?>',
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
                "url": '<?php echo base_url('Rawatinap/tampil_list_radiologi'); ?>',
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

    function edit_radiologi(id_pelayanan, id_history) {

        $("#id_pel_rad").val(id_pelayanan);
        $("#id_his_rad").val(id_history);
        $("#modal_radiologi").modal('show');
        reload_data_radiologi(id_pelayanan);
        reload_total_radiologi(id_pelayanan);
        $.ajax({
            url: "<?= base_url() . 'Poli/getdata' ?>",
            data: {
                id_pelayanan: id_pelayanan,
            },
            type: 'POST',
            dataType: 'json',
            success: function(data) {
                if (data.status_dt == "found") {
                    if (data.data.cara_bayar == '30') {
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
                                title: "Good Job!",
                                type: "success",
                                text: "Data berhasil dihapus",
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

    // End

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
        a = $("#outTipeKamarLabor").val();
        //splitDiag = a.split("|");
        //var_dump(a);
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
            '&nama_tindakan=' + nama + '&kode_lis=' + kode_lis + '&cara_masuk=' + "RAWAT INAP";
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
            url: "<?= base_url() . 'Poli/req_form_labor_ranap' ?>",
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
                "url": '<?php echo base_url('IGD/tampil_list_labor'); ?>',
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

    // function pilihTindakanLabor() {
    //     a = $("#inTindakanLabor").val();
    //     splitDiag = a.split("|");

    //     harga = parseFloat(splitDiag[1]);
    //     $("#outBiayaTindakanLabor").val(convertToRupiah(harga));
    //     document.getElementById("inJumlahLabor").value = "1";
    //     document.getElementById("outTotalLabor").value = convertToRupiah(harga);
    // }

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
                "url": '<?php echo base_url('IGD/tampil_total_labor'); ?>',
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

    function edit_labor(id_pelayanan, id_history) {

        $("#id_pel_lab").val(id_pelayanan);
        $("#id_his_lab").val(id_history);
        $("#inPelLab").val(id_pelayanan);
        $("#inHisLab").val(id_history);
        $("#inTipeKamarlabor").val("<?= $kelas ?>").change();

        $("#modal_labor").modal('show');
        reload_data_form_labor(id_pelayanan);
        $.ajax({
            url: "<?= base_url() . 'Poli/getdata' ?>",
            data: {
                id_pelayanan: id_pelayanan,
            },
            type: 'POST',
            dataType: 'json',
            success: function(data) {
                if (data.status_dt == "found") {
                    if (data.data.cara_bayar == '30') {
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
                    url: "<?php echo base_url() ?>Labor/hapus_data_labor",
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
    //End

    function edit_obat(idPel, idHis) {
        $('#inPelResep').val(idPel);
        $('#inHisResep').val(idHis);
        $('#inDepo1').val('RANAP').change();
        $("#modal_edit_resep").modal('show');
        $("#collap_nonracikan").collapse('hide');
        $("#collap_racikan").collapse('hide');
        reload_data_resep(idPel, idHis);
    }

    function pilih_obat(idResep, tipe, cara_bayar, depo, id_pelayanan) {
        if (tipe == 2) {
            $('#form_racikan').show();
            $('#inResObat').val(idResep);
            $('#inDepo').val(depo);
            getObat(depo);
            $("#collap_racikan").collapse('toggle');
            $("#collap_nonracikan").collapse('hide');
            reload_total_obat(idResep);
            reload_data_racikan(idResep);
        } else if (tipe == 4) {
            $('#cara_bayar').val(cara_bayar);
            $('#tipe_resep').val(tipe);
            $('#inResObat2').val(idResep);
            $('#inDepo').val(depo);
            getObat(depo);
            reload_total_obat(idResep);
            getObatReturn(id_pelayanan);

            $("#collap_Return").collapse('toggle');
            $("#collap_nonracikan").collapse('hide');
            $("#collap_racikan").collapse('hide');
            reload_total_obat(idResep);
            reload_data_obat1(idResep);
        } else {
            $('#formObat').show();
            getNamaObat('RANAP');
            $('#cara_bayar').val(cara_bayar);
            $('#tipe_resep').val(tipe);
            $('#inResObat').val(idResep);
            $('#inDepo').val(depo);
            getObat(depo);
            // $('#inSigna').val('6296f5928ac4c').change();

            $("#collap_nonracikan").collapse('toggle');
            $("#collap_racikan").collapse('hide');
            reload_total_obat(idResep);
            reload_data_obat(idResep);
        }
    }

    function pilih_obat1(idResep, tipe, cara_bayar, depo, id_pelayanan) {
        if (tipe == 2) {
            $('#form_racikan').hide();
            $('#inResObat').val(idResep);
            $('#inDepo').val(depo);
            getObat(depo);
            $("#collap_racikan").collapse('toggle');
            $("#collap_nonracikan").collapse('hide');
            reload_total_obat(idResep);
            reload_data_racikan(idResep);
        } else if (tipe == 4) {
            $('#cara_bayar').val(cara_bayar);
            $('#tipe_resep').val(tipe);
            $('#inResObat2').val(idResep);
            $('#inDepo').val(depo);
            getObat(depo);
            reload_total_obat(idResep);
            getObatReturn(id_pelayanan);

            $("#collap_Return").collapse('toggle');
            $("#collap_nonracikan").collapse('hide');
            $("#collap_racikan").collapse('hide');
            reload_total_obat(idResep);
            reload_data_obat1(idResep);
        } else {
            $('#formObat').hide();
            getNamaObat('RANAP');
            $('#cara_bayar').val(cara_bayar);
            $('#tipe_resep').val(tipe);
            $('#inResObat').val(idResep);
            $('#inDepo').val(depo);
            getObat(depo);
            $("#collap_nonracikan").collapse('toggle');
            $("#collap_racikan").collapse('hide');
            reload_total_obat(idResep);
            reload_data_obat(idResep);
        }
    }

    $('#modal_edit_resep').on('hidden.bs.modal', function() {
        $("#collap_nonracikan").collapse('hide');
        $("#collap_racikan").collapse('hide');
        $('#tableresep').DataTable().ajax.reload();
    })

    function batalFarmasi() {
        $("#collap_Return").collapse('hide');
        $("#collap_nonracikan").collapse('hide');
        $("#collap_racikan").collapse('hide');
    }

    function next_resep(id_resep, id_history, id_pelayanan) {
        swal({
            title: "Apakah kamu yakin?",
            text: "Melanjutkan resep ini?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3cb878",
            confirmButtonText: "Yakin",
            cancelButtonText: "Batal",
            closeOnConfirm: false
        }, function() {
            $().ready(function() {
                $.ajax({
                    url: "<?php echo base_url() ?>Poli/next_resep",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        id_resep: id_resep,
                        id_history: id_history,
                        id_pelayanan: id_pelayanan,
                        jenis_pelayanan: 'RANAP',
                    },
                    success: function(data) {
                        if (data.status == "success") {
                            swal({
                                title: "good job!",
                                type: "success",
                                text: "Resep Berhasil Ditambahkan",
                                confirmButtonColor: "#3cb878",
                            });
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
            });
        });
        return false;
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

    function insert_na_obat() {
        jenis_resep = 4;
        nama_resep = '-';
        id_pelayanan = $('#inPelResep').val();
        id_history = $('#inHisResep').val();
        $.ajax({
            url: "<?= base_url() . 'Poli/insert_resep' ?>",
            method: "POST",
            dataType: 'json',
            data: {
                jenis_resep: jenis_resep,
                nama_resep: nama_resep,
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
        // if (signa == '-' ) {
        //     swal({
        //         title: "Gagal!",
        //         type: "warning",
        //         text: 'Signa belum diisi',
        //         confirmButtonColor: "#3cb878",
        //     });
        // } else {
        $.ajax({
            url: "<?= base_url() . 'Poli/insert_obat' ?>",
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
                jenis_pelayanan: 'RANAP',
                tipe: tipe
            },
            success: function(data) {
                if (data.status == "success") {
                    $.toast({
                        heading: 'Success!',
                        text: 'Tindakan ini telah ditambah',
                        showHideTransition: 'fade',
                        icon: 'success'
                    })
                    $('#formObat')[0].reset();
                    $("#collap_nonracikan").collapse('show');
                    $("#collap_racikan").collapse('hide');
                    $('#tableobat').DataTable().ajax.reload();
                    // $('#inDepo').val('RANAP').change();
                    // getObat(depo);
                    // $('#inGolongan').val('-').change();
                    $('#inObat').val('').change();
                    $('#inTglExp').empty().trigger('change');
                    $("#inKeteranganObat").removeData();
                    $("#inJumlahObat").val('1');
                    $("#inDisc").val(0);
                    $("#outBiayaTindakanObat").val('');
                    $("#outBiayaMarginObat").val('');
                    $("#outStok").val('0');
                    $("#outTotalObat").val('');
                    $('#inSigna').val(signa).change();
                    $('#inCaraPakai').val(cara_pakai).change();
                } else if (data.status == "error") {
                    $.toast({
                        heading: 'Error!',
                        text: 'Stok tidak sesuai dengan permintaan',
                        showHideTransition: 'fade',
                        icon: 'error'
                    })
                } else {
                    $.toast({
                        heading: 'Error!',
                        text: data.status,
                        showHideTransition: 'fade',
                        icon: 'error'
                    })
                }
            }
        });
        // }


    }


    function insert_Return() {
        id_pelayanan = $('#inPelResep').val();
        id_resep = $('#inResObat2').val();
        //caraBayar = $('#cara_bayar').val();
        a = $("#inObat1").val();
        depo = $("#inDepo1").val();
        splitDiag = a.split("|");
        id_list_tindakan = splitDiag[0];
        harga = splitDiag[1];
        margin = splitDiag[2];
        expire = splitDiag[3];
        harga_cost = $("#hargaCost").val();
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
                id_resep: id_resep,
                depo: depo,
                margin: margin,

                harga: harga,
                frek: frek,

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
                    reload_data_obat1(id_resep);
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

    function detail_radiologi(id_pelayanan, id_tindakan_radiologi) {
        $.ajax({
            url: "<?= base_url() . 'Rawatinap/getdata_formById' ?>",
            data: {
                pelayanan: id_pelayanan,
                tindakan: id_tindakan_radiologi,
            },
            type: 'POST',
            dataType: 'json',
            success: function(data) {
                if (data.status_dt == "found") {
                    $('#detailTindakan').collapse('toggle');
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
                            // $('#tableobat1').DataTable().ajax.reload();
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

    function hapus_obat1(id, nama, depo) {
        id_pelayanan = $('#inPelResep').val();
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
                            getObatReturn(id_pelayanan);
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

    function request(id_resep, jenis_resep) {
        $.ajax({
            url: "<?= base_url() . 'Poli/request_resep' ?>",
            method: "POST",
            dataType: 'json',
            data: {
                id_resep: id_resep,
                jenis_resep: jenis_resep
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

                    reload_data_racikan(id_resep);

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
                url: "<?php echo base_url(); ?>Poli/getNamaObat",
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
                        html += '<option value=' + data[i].id_logistik + '|' + data[i].harga_cost + '|' + data[i].margin + '|' + data[i].kadaluarsa + '|' + data[i].stok + '|' + data[i].ppn + '|' + '>' + data[i].nama + '</option>';
                    }
                    $('#inObat').html(html);
                }
            });
        } else {
            $('#inObat').html('<option value="">-</option>');
        }
    }

    function getObatByGol() {
        gol = $('#inGolongan').val();
        depo = $('#inDepo').val();
        if (gol != '') {
            $.ajax({
                url: "<?php echo base_url(); ?>Poli/getNamaObatByGol",
                method: "POST",
                data: {
                    gol: gol,
                    depo: depo
                },
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    var i;
                    html = '<option value="">-</option>';
                    for (i = 0; i < data.length; i++) {
                        html += '<option value=' + data[i].id_logistik + '|' + data[i].harga_cost + '|' + data[i].margin + '|' + data[i].kadaluarsa + '|' + data[i].stok + '|' + data[i].ppn + '|' + '>' + data[i].nama + '</option>';
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



    function setJumlahObatReturn() {
        obat = $('#inObat1').val();
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
        $("#hargaCost").val(Number(total) / Number(stok));
        $('#inDepo1').val(splitDiag[6]);
    }
</script>

<script type="text/javascript">

</script>




<script>
    function getObatReturn(id_pelayanan) {
        $.ajax({
            url: "<?php echo base_url(); ?>Poli/getNamaObatReturn",
            method: "POST",
            data: {
                id_pelayanan: id_pelayanan
            },
            dataType: 'json',
            success: function(data) {
                var html = '';
                var i;
                html = '<option value="">-</option>';
                for (i = 0; i < data.length; i++) {
                    html += '<option value=' + data[i].id_logistik + '|' + data[i].harga_cost + '|' + data[i].margin + '|' + data[i].kadaluarsa + '|' + data[i].stok + '|' + data[i].total + '|' + data[i].depo + '>' + data[i].nama + '</option>';
                }
                $('#inObat1').html(html);
            }
        });
    }

    function getNamaObat(depo) {
        $.ajax({
            url: "<?php echo base_url(); ?>Poli/getNamaObat",
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
                    html += '<option value=' + data[i].id_logistik + '|' + data[i].harga_cost + '|' + data[i].margin + '|' + data[i].kadaluarsa + '|' + data[i].stok + '|' + data[i].total + '|' + data[i].depo + '>' + data[i].nama + '</option>';
                }
                $('#inObat1').html(html);
            }
        });
    }
</script>
<script type="text/javascript">
    /*Typeahead Init*/

    $(function() {
        "use strict";

        /*Basic*/

        var substringMatcher = function(strs) {
            return function findMatches(q, cb) {
                var matches, substringRegex;

                // an array that will be populated with substring matches
                matches = [];

                // regex used to determine if a string contains the substring `q`
                var substrRegex = new RegExp(q, 'i');

                // iterate through the pool of strings and for any string that
                // contains the substring `q`, add it to the `matches` array
                $.each(strs, function(i, str) {
                    if (substrRegex.test(str)) {
                        matches.push(str);
                    }
                });

                cb(matches);
            };
        };

        var states = [
            <?php

            foreach ($signa as $row) {


                echo ",'" .  $row["tindakan"] . "'";
            }  ?>
        ];
        var states1 = [
            <?php

            foreach ($cara_pemakaian_obat as $row) {


                echo ",'" .  $row["cara_pemakaian"] . "'";
            }  ?>
        ];


        $('#the-basics .typeahead').typeahead({
            hint: true,
            highlight: true,
            minLength: 1
        }, {
            name: 'states',
            source: substringMatcher(states)
        });

        $('#the-basics1 .typeahead').typeahead({
            hint: true,
            highlight: true,
            minLength: 1
        }, {
            name: 'states1',
            source: substringMatcher(states1)
        });


    });
</script>

<!-- Apelkes -->
<script type="text/javascript">
    function tindakan_apelkes(id_pelayanan, id_history) {
        $.ajax({
            url: "<?= base_url() . 'Apelkes/getApelkesByIdPelayanan' ?>",
            data: {
                pelayanan: id_pelayanan,
                history: id_history
            },
            type: 'POST',
            dataType: 'json',
            success: function(data) {
                if (data.status_dt == "found") {
                    $("#tipe_masuk").val(data.jenis_pelayanan);
                    $("#no_rm1").val(data.no_rm);
                    $("#nama1").val(data.nama);
                    $("#inTanggalKunjugan").val(data.tgl_masuk);
                    $("#idPelayanan").val(data.id_pelayanan);
                    $("#idHis").val(data.id_history);
                    $("#inNoSEP").val(data.no_sep);
                    $("#inDiagnosa").val(data.diagnosa);
                    $("#inDPJP").val(data.dpjp).change();
                    $("#kodedpjp").val(data.dpjp);
                    $("#inTipeKamar").val("<?= $kelas ?>").change();
                    $("#NamaPasien").val(data.nama).change();
                    $("#inAsalPasien").val(data.asal_pasien).change();
                    $("#inCaraBayar").val(data.id_cara_bayar).change();

                    if (data.id_cara_bayar == '42') {
                        $('#pembayaran2').collapse('hide');
                    } else {
                        $('#pembayaran2').collapse('show');
                    }

                    $("#modal_pembayaran").modal('show');
                    reload_data_tindakan(id_pelayanan);
                    reload_total_harga(id_pelayanan);
                    reload_data_kamar1(id_pelayanan);
                } else {
                    alert("data tidak ditemukan");
                }
            }
        });
    }

    function show_visite(id_pelayanan, id_history) {
        $.ajax({
            url: "<?= base_url() . 'Apelkes/getApelkesByIdPelayanan' ?>",
            data: {
                pelayanan: id_pelayanan,
                history: id_history
            },
            type: 'POST',
            dataType: 'json',
            success: function(data) {
                if (data.status_dt == "found") {
                    $("#idPelayanan1").val(data.id_pelayanan);
                    $("#idHis1").val(data.id_history);
                    $("#inDPJP1").val(data.dpjp).change();
                    var kelas = "<?= $kelas ?>";
                    if (kelas != 'RUANG ISOLASI') {
                        $("#inTipeKamar1").val("<?= $kelas ?>").change();
                    } else {
                        $("#inTipeKamar1").val("-").change();
                    }
                    $("#modal_visite").modal('show');
                    reload_data_tindakan1(id_pelayanan);
                    reload_total_harga1(id_pelayanan);
                } else {
                    alert("data tidak ditemukan");
                }
            }
        });
    }
    $(document).ready(function() {
        $('#inTipeKamar').change(function() {
            var tipe_kamar = $('#inTipeKamar').val();
            var id_pelayanan = $("#idPelayanan").val();
            $.ajax({
                url: "<?php echo base_url(); ?>Apelkes/getTindakanByTipeKamar",
                method: "POST",
                data: {
                    tipe_kamar: tipe_kamar,
                    id_pelayanan: id_pelayanan
                },
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    var i;
                    html += '<option value=' + '-' + '>' + '-' + '</option>';
                    for (i = 0; i < data.length; i++) {
                        html += '<option value=' + data[i].id_list_tindakan_apelkes + '|' + data[i].harga_sarana + '|' + data[i].harga_jasa + '|' + data[i].harga_nama + '>' + data[i].nama + '</option>';
                    }
                    $('#outTipeKamar').html(html);
                }
            });

        });

    });

    function getVisiteDok() {
        var tipe_kamar = $('#inTipeKamar1').val();
        var id_pelayanan = $("#idPelayanan1").val();
        var dpjp = $("#inDPJP1").val();
        if ($("#inTindakanV").val() == 'visite') {
            url = "<?php echo base_url(); ?>Apelkes/getVisite";
        } else {
            url = "<?php echo base_url(); ?>Apelkes/getVisite_diskon";
        }
        $.ajax({
            url: url,
            method: "POST",
            data: {
                tipe_kamar: tipe_kamar,
                id_pelayanan: id_pelayanan,
                dpjp: dpjp
            },
            dataType: 'json',
            success: function(data) {
                $("#hargaSarana").val(data.harga_sarana);
                $("#hargaJasa").val(data.harga_jasa);
                $('#id_list_tindakan').val(data.id_list_tindakan_apelkes);
                // $("#inTindakanV").val('visite').change();


            }
        });

    }
    $(document).ready(function() {
        $('#inTipeKamarlabor').change(function() {
            var tipe_kamar = $('#inTipeKamarlabor').val();
            var id_pelayanan = $("#id_pel_lab").val();

            $.ajax({
                url: "<?php echo base_url(); ?>Apelkes/getTindakanByTipeKamarLabor",
                method: "POST",
                data: {
                    tipe_kamar: tipe_kamar,
                    id_pelayanan: id_pelayanan
                },
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    var i;
                    html += '<option value=' + '-' + '>' + '-' + '</option>';
                    for (i = 0; i < data.length; i++) {
                        html += '<option value="' + data[i].id_daftar_tindakan + '|' + data[i].harga + '|' + data[i].nama + '|' + data[i].kode_lis + '">' + data[i].nama + '</option>';
                    }
                    $('#outTipeKamarlabor').html(html);
                }
            });

        });
    });
    $(document).ready(function() {
        $('#inTipeKamarRadiologi').change(function() {
            var tipe_kamar = $('#inTipeKamarRadiologi').val();
            var id_pelayanan = $("#id_pel_rad").val();

            $.ajax({
                url: "<?php echo base_url(); ?>Apelkes/getTindakanByTipeKamarRadiologi",
                method: "POST",
                data: {
                    tipe_kamar: tipe_kamar,
                    id_pelayanan: id_pelayanan
                },
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    var i;
                    html += '<option value=' + '-' + '>' + '-' + '</option>';
                    for (i = 0; i < data.length; i++) {
                        html += '<option value=' + data[i].id_daftar_tindakan + '|' + data[i].harga + '>' + data[i].nama + '</option>';
                    }
                    $('#outTipeKamarRadiologi').html(html);
                }
            });

        });
    });
</script>
<script type="text/javascript">
    function reload_data_tindakan(idPelayanan) {
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
                "url": '<?php echo base_url('Apelkes/tampil_list_tindakan'); ?>',
                "type": 'POST',
                "data": {
                    id_pelayanan: idPelayanan
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

    function reload_data_kamar1(idPelayanan) {
        $('#tablekamar1').dataTable().fnClearTable();
        $('#tablekamar1').dataTable().fnDestroy();
        $('#tablekamar1').DataTable({
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
                "url": '<?php echo base_url('Apelkes/tampil_list_kamar'); ?>',
                "type": 'POST',
                "data": {
                    id_pelayanan: idPelayanan
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

    function reload_total_harga(id_pelayanan) {
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
                "url": '<?php echo base_url('Apelkes/tampil_total_harga'); ?>',
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

    function delete_data_tindakan(id_tindakan_apelkes, id_pelayanan) {
        swal({
            title: "Apakah kamu yakin?",
            text: "Menghapus data  ini?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3cb878",
            confirmButtonText: "Yakin",
            cancelButtonText: "Batal",
            closeOnConfirm: false
        }, function() {
            $().ready(function() {
                $.ajax({
                    url: "<?php echo base_url() ?>Apelkes/hapus_data_tindakan",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        id_tindakan_apelkes: id_tindakan_apelkes,
                    },
                    success: function(data) {
                        if (data.status == "success") {
                            swal({
                                title: "good job!",
                                type: "success",
                                text: "Data Berhasil dihapus",
                                confirmButtonColor: "#3cb878",
                            });
                            reload_data_tindakan(id_pelayanan);
                            reload_total_harga(id_pelayanan);
                            reload_data_tindakan1(id_pelayanan);
                            reload_total_harga1(id_pelayanan);
                            // $('#outTotalHarga').DataTable().ajax.reload();
                            // $('#outTotalHarga2').DataTable().ajax.reload();
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

    function insert_visite() {

        dokter = $("#inDPJP1").val();
        hargaSarana = $("#hargaSarana").val();
        hargaJasa = $("#hargaJasa").val();
        harga = Number(hargaSarana) + Number(hargaJasa);
        frek = 1;
        total = harga * frek;

        id_pelayanan = $('#idPelayanan1').val();
        id_history = $("#idHis1").val();
        id_list_tindakan = $('#id_list_tindakan').val();
        tgl_visite = $('#tgl_visite').val();


        dataString = '&harga=' + harga +
            '&id_pelayanan=' + id_pelayanan + '&id_list_tindakan=' + id_list_tindakan +
            '&frek=' + frek + '&total=' + total +
            '&dokter=' + dokter + '&id_history=' + id_history + '&tgl_visite=' + tgl_visite;
        var now = "<?= date('Y-m-d') ?>";
        console.log(now);

        if (Date.parse(tgl_visite) > Date.parse(now)) {
            swal({
                title: "Gagal!",
                type: "warning",
                text: "Tanggal Visite Tidak Boleh Melebihi Tanggal Hari Ini",
                confirmButtonColor: "#3cb878",
            });
        } else {
            $.ajax({
                url: "<?= base_url() . 'Apelkes/insert_tindakan' ?>",
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
                        reload_data_tindakan1(id_pelayanan);
                        reload_total_harga1(id_pelayanan);

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

    function insert_tindakan() {
        a = $("#outTipeKamar").val();
        dokter = $("#inDPJP").val();
        splitDiag = a.split("|");
        hargaSarana = parseFloat(splitDiag[1]);
        hargaJasa = parseFloat(splitDiag[2]);
        // harga = hargaSarana + hargaJasa;
        harga = $("#inBiayaTindakan").val();

        frek = parseFloat($("#inJumlah").val());
        total = harga * frek;

        id_pelayanan = $('#idPelayanan').val();
        idHis = $('#idHis').val();
        id_list_tindakan = $('#outTipeKamar').val();
        status_pembayaran = $('#inPembayaran2').val();
        if (dokter == 'null' || dokter == null) {
            swal({
                title: "Gagal!",
                type: "warning",
                text: "Pilih dokter terlebih dahulu",
                confirmButtonColor: "#3cb878",
            });
        } else {

            dataString = '&harga=' + harga +
                '&id_pelayanan=' + id_pelayanan + '&id_history=' + idHis +
                '&id_list_tindakan=' + splitDiag[0] +
                '&frek=' + frek + '&total=' + total +
                '&dokter=' + dokter + '&status_pembayaran=' + status_pembayaran;
            $.ajax({
                url: "<?= base_url() . 'Apelkes/insert_tindakan' ?>",
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
                        reload_data_tindakan(id_pelayanan);
                        reload_total_harga(id_pelayanan);

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
</script>

<script type="text/javascript">
    function pilihTindakan(elem) {
        $dokter = $("#kodedpjp").val();
        a = elem.value;
        splitDiag = a.split("|");
        // alert(splitDiag[1]);

        hargaSarana = parseFloat(splitDiag[1]);
        hargaJasa = parseFloat(splitDiag[2]);
        harga = hargaSarana + hargaJasa;
        $("#outBiayaTindakan").val(convertToRupiah(harga));
        $("#inBiayaTindakan").val((harga));
        document.getElementById("inJumlah").value = "1";
        document.getElementById("outTotal").value = convertToRupiah(harga);
        if (hargaJasa == 0) {
            $("#inDPJP").val('-').change();
        } else {
            $("#inDPJP").val($dokter).change();
        }
    }

    function pilihTindakanLabor(elem) {
        a = elem.value;
        splitDiag = a.split("|");
        // alert(splitDiag[1]);

        harga = parseFloat(splitDiag[1]);
        $("#outBiayaTindakanLabor").val(convertToRupiah(harga));
        document.getElementById("inJumlahLabor").value = "1";
        document.getElementById("outTotalLabor").value = convertToRupiah(harga);
    }

    function pilihTindakanRadiologi(elem) {
        a = elem.value;
        splitDiag = a.split("|");
        // alert(splitDiag[1]);

        harga = parseFloat(splitDiag[1]);
        $("#outBiayaTindakanRadiologi").val(convertToRupiah(harga));
        document.getElementById("inJumlahRadiologi").value = "1";
        document.getElementById("outTotalRadiologi").value = convertToRupiah(harga);
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
        // alert(splitDiag[1]);

        hargaSarana = parseFloat(splitDiag[1]);
        hargaJasa = parseFloat(splitDiag[2]);
        harga = hargaSarana + hargaJasa;
        frek = parseFloat($("#inJumlah").val());
        total = harga * frek;


        $("#outTotal").val(convertToRupiah(total));

    }
</script>
<!-- Obat ruang -->
<script type="text/javascript">
    function obat_ruang(id_pelayanan, id_history) {
        $("#inPelObat").val(id_pelayanan);
        $("#inHisObat").val(id_history);
        $("#modal_obat_ruang").modal('show');
        reload_data_obatR(id_pelayanan);
        reload_data_total1(id_pelayanan);
    }

    function insert_ObatR() {
        id_pelayanan = $('#inPelObat').val();
        id_history = $('#inHisObat').val();
        a = $("#inObatRuang").val();
        splitDiag = a.split("|");
        margin = parseFloat(splitDiag[2]);
        ket = $("#inKeteranganObatR").val();
        id_list_tindakan = splitDiag[0];
        ppn = parseFloat(splitDiag[1]) * (parseFloat(splitDiag[5]) / 100);
        harga = parseFloat(splitDiag[1]) + ppn;
        hargaMargin = harga * parseFloat(splitDiag[2]);

        frek = parseFloat($("#inJumlahObatR").val());
        disc = parseFloat($("#inDiscR").val());
        expire = (splitDiag[3]);
        jumlahKurang = frek * -1;


        total = hargaMargin * frek * (1 - (disc * 0.01));

        signa = $('#inSignaR').val();
        cara_pakai = $('#inCaraPakaiR').val();

        $.ajax({
            url: "<?= base_url() . 'Rawatinap/insert_obatR' ?>",
            method: "POST",
            dataType: 'json',
            cache: false,
            data: {
                id_pelayanan: id_pelayanan,
                id_history: id_history,
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

                    $.toast({
                        heading: 'Success!',
                        text: 'Tindakan ini telah ditambah',
                        showHideTransition: 'fade',
                        icon: 'success'
                    })

                    $('#tableobatR').DataTable().ajax.reload();
                    $('#outTotalHarga1').DataTable().ajax.reload();
                    // reload_data_total1(id_pelayanan)
                    $('#inObatR').val('-').change();
                    $('#inTglExpR').empty().trigger('change');
                    $("#inJumlahObatR").val('1');
                    $("#inDiscR").val(0);
                    $("#outBiayaTindakanObatR").val('');
                    $("#outBiayaMarginObatR").val('');
                    $("#outStokR").val('0');
                    $("#outTotalObatR").val('');
                    $('#inSignaR').val(signa).change();
                    $('#inCaraPakaiR').val(cara_pakai).change();
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

    function cetak_resep() {
        id_pel = $('#inPelObat').val();
        id_his = $('#inHisObat').val();
        window.open('<?php echo base_url('Rawatinap/print_resep/'); ?>' + id_pel + '/' + id_his);
    }

    function setHarga1() {

        // caraBayar = $('#cara_bayar').val();

        obat = $('#inObatRuang').val();
        splitDiag = obat.split("|");
        stok = (splitDiag[4]);

        $("#outStokR").val(stok);

        ppn = parseFloat(splitDiag[1]) * (parseFloat(splitDiag[5]) / 100);
        harga = parseFloat(splitDiag[1]) + ppn;
        hargaMargin = harga * parseFloat(splitDiag[2]);
        $("#outBiayaTindakanObatR").val(convertToRupiah(harga.toFixed(0)));
        $("#outBiayaMarginObatR").val(convertToRupiah(hargaMargin.toFixed(0)));

        frek = parseFloat($("#inJumlahObatR").val());
        if (frek > stok) {
            $("#inJumlahObatR").val(stok);
        } else if (frek < 0) {
            $("#inJumlahObatR").val(1);
        }


        disc = parseFloat($("#inDiscR").val());

        // if (document.getElementById('inRadioCost').checked) {
        //     total = harga * frek * (1 - (disc * 0.01));
        // } else {
        total = hargaMargin * frek * (1 - (disc * 0.01));
        // }

        $("#outTotalObatR").val(convertToRupiah(total.toFixed(0)));

    }
    $('#inObatRuang').change(function() {
        obat = $('#inObatRuang').val();
        splitDiag = obat.split("|");
        tgl = splitDiag[3];
        $('#inTglExpR').val(tgl);
        stok = splitDiag[4];
        $("#outStokR").val(stok);
    });

    function reload_data_obatR(id_resep) {
        $('#tableobatR').dataTable().fnClearTable();
        $('#tableobatR').dataTable().fnDestroy();
        $('#tableobatR').DataTable({
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
                "url": '<?php echo base_url('Rawatinap/tampil_obat'); ?>',
                "type": 'POST',
                "data": {
                    id_pelayanan: id_resep,
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

    function hapus_obat1(id) {
        swal({
            title: "Apakah kamu yakin?",
            text: "Menghapus obat ini?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3cb878",
            confirmButtonText: "Yakin",
            cancelButtonText: "Batal",
            closeOnConfirm: false
        }, function() {
            $().ready(function() {
                $.ajax({
                    url: "<?php echo base_url() ?>Rawatinap/hapus_obat1",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        id: id,
                    },
                    success: function(data) {
                        if (data.status == "success") {
                            $('#tableobatR').DataTable().ajax.reload();
                            $('#outTotalHarga1').DataTable().ajax.reload();

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

    function reload_data_total1(id_pelayanan) {
        $('#outTotalHarga1').dataTable().fnClearTable();
        $('#outTotalHarga1').dataTable().fnDestroy();
        $('#outTotalHarga1').DataTable({
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
                "sSearch": "Cari Tindakan:",
                "sUrl": "",
                "oPaginate": {
                    "sFirst": "Pertama",
                    "sPrevious": "Sebelumnya",
                    "sNext": "Selanjutnya",
                    "sLast": "Terakhir",
                }
            },
            "ajax": {
                "url": '<?php echo base_url('Rawatinap/tampil_list_total_obat'); ?>',
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

    // FISIO

    function reload_data_fisio(id_pelayanan) {
        $('#tablefisio').dataTable().fnClearTable();
        $('#tablefisio').dataTable().fnDestroy();
        $('#tablefisio').DataTable({
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

    function tindakan_fisio(id_pelayanan, id_history) {

        $("#id_pelayanan").val(id_pelayanan);
        $("#id_history").val(id_history);
        $("#modal_fisio").modal('show');
        reload_data_fisio(id_pelayanan);

    }

    // function tindakan_fisiso(id_pelayanan, id_history) {
    // 		$.ajax({
    // 			url: "<?= base_url() . 'IGD/getdata_igd' ?>",
    // 			data: {
    // 				pelayanan: id_pelayanan,
    // 				history: id_history
    // 			},
    // 			type: 'POST',
    // 			dataType: 'json',
    // 			success: function(data) {
    // 				$("#modal_fisio").modal('show');
    // 				reload_data_fisio(id_pelayanan);
    // 				$('#id_pelayanan').val(id_pelayanan);
    // 				// if (data.status_dt == "found") {
    // 				//     // if (data.countTin == 0) {
    // 				//     // 	$("#na_radio").show();
    // 				//     // } else {
    // 				//     // 	$("#na_radio").hide();
    // 				//     // }
    // 				//     $("#id_pelayanan").val(data.data['id_pelayanan']);
    // 				//     $("#id_his_rad").val(id_history);
    // 				//     reload_data_fisio(id_pelayanan);
    // 				//     $("#modal_fisio").modal('show');

    // 				// } else {
    // 				//     alert("data tidak ditemukan");
    // 				// }
    // 			}
    // 		});
    // 	}

    function hargaTotalFisio() {
        a = $("#outTindakanFisio").val();
        splitDiag = a.split("|");
        harga_sarana = parseFloat(splitDiag[1]);
        harga_jasa = parseFloat(splitDiag[2]);
        frek = parseFloat($("#outJumlahTindakan").val());
        total = (harga + jasa) * frek

        $("#outTotalfisio").val(convertToRupiah(total));
    }

    function insert_fisio() {
        a = $("#outTindakanFisio").val();
        dokter = $("#DPJP").val();
        splitDiag = a.split("|");
        harga = parseFloat(splitDiag[1]);
        jasa = parseFloat(splitDiag[2]);
        id_pelayanan = $('#id_pelayanan').val();
        id_history = $('#id_history').val();
        frek = parseFloat($("#outJumlahTindakan").val());
        total = (jasa + harga) * frek;
        id_list_tindakan = $('#id_list_tindakan').val();
        nama = $('#nama').val();
        var ID = Math.random().toString(36).substr(2, 16);
        nama_dokter = $.trim($("#DPJP").children("option:selected").text())

        dataString = 'id=' + ID +
            '&id_pelayanan=' + id_pelayanan + '&id_list_tindakan=' + splitDiag[0] +
            '&frek=' + frek + '&dokter=' + dokter + '&total=' + total + '&nama_tindakan=' + splitDiag[3] +
            '&id_history=' + id_history + '&jenis_pelayanan=' + 'RAWAT INAP' + '&nama_dokter=' + nama_dokter;
        $.ajax({
            url: "<?= base_url() . 'Poli/insert_fisio' ?>",
            method: "POST",
            dataType: 'json',
            data: dataString,
            success: function(data) {
                if (data.status == "success") {
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Tindakan ini Telah di Simpan!",
                        confirmButtonColor: "#3cb878",
                    });
                    $('#outTindakanFisio').val('');
                    $('#outJumlahTindakan').val('');
                    $('#outTotalfisio').val('');
                    // $('#tablefisio').DataTable().ajax.reload();
                    reload_data_fisio(id_pelayanan);
                    // $('#outTotalfisio').DataTable().ajax.reload();
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

    function pilihTindakanFisio() {
        a = $("#outTindakanFisio").val();
        splitDiag = a.split("|");

        harga = parseFloat(splitDiag[1]);
        jasa = parseFloat(splitDiag[2]);
        harga1 = harga + jasa
        total = (harga + jasa)
        document.getElementById("outJumlahTindakan").value = "1";
        document.getElementById("outBiayaTindakanFisio").value = convertToRupiah(harga1);
        document.getElementById("outTotalfisio").value = convertToRupiah(total);
    }

    function hapus_data_tindakan(id_tindakan, id_pelayanan) {
        swal({
            title: "Apakah kamu yakin?",
            text: "Menghapus data  ini?",
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
                                confirmButtonColor: "#3cb878",
                            });
                            reload_data_fisio(id_pelayanan);
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
    $(document).ready(function() {
        $.fn.modal.Constructor.prototype.enforceFocus = function() {};
    });
=======
<?php
$data = $this->session->userdata('data_auth');
$izinAkses = $data->izin_akses;
?>
<?php $this->load->view('erm_form/Penunjang/pindah_kamar'); ?>




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
                                    <!-- <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group ">
                                                <label class="control-label col-md-3">GOLONGAN OBAT</label>
                                                <div class="col-md-9 has-success">
                                                    <select class="form-control filled-input select2" id="inGolongan" onchange="getObatByGol()">
                                                        <option value="-">-</option>
                                                        <?php foreach ($golongan as $s) { ?>
                                                            <option value="<?= $s['golongan_farmakologi']; ?>"><?= $s['golongan_farmakologi']; ?></option>

                                                        <?php } ?>
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

                                                <select class="form-control filled-input rounded-input select2" id="inSigna">
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
                                                    <!-- <th>EXPIRE DATE</th> -->
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
                                    <input type="hidden" class="form-control" id="inResObat1">
                                    <div class="col-md-offset-3 col-md-9">
                                        <span></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label col-md-3">CARA PAKAI OBAT</label>
                                    <div class="col-md-9">
                                        <select class="form-control filled-input rounded-input select2" id="inCaraPakai1">
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
                                            <option value="APOTIK">RAJAL</option>

                                            <option value="RANAP" selected>RANAP</option>
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
                                    <th>LANJUTKAN RESEP</th>
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
                <h5 class="modal-title" id="myLargeModalLabel"><i class="icon-user mr-10"></i> TINDAKAN REQUEST LABOR RANAP
                </h5>
            </div>
            <div class="modal-body">
                <div class="form-wrap">
                    <!-- /formbody -->
                    <div class="form-body mt-10 collapse" id="collapse_tindakan_labor">
                        <h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO TINDAKAN LABOR
                        </h6>
                        <hr width="95%">

                        <div class="collapse" id="formTinLabor">

                            <form id="form_labor">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <span class="help-block"></span>
                                            <label class="control-label col-md-3">TIPE KAMAR</label>
                                            <div class="col-md-9 has-success">
                                                <!-- <input type="text" value="</?=$kelas?>"> -->
                                                <select class="form-control filled-input select2" placeholder="KAMAR" style="border: 1px solid lightgreen;" id="inTipeKamarlabor" name="TipeKamar">
                                                    <option value="-">
                                                        -</option>
                                                    <?php
                                                    foreach ($data_tipe_kamar as $row) :
                                                    ?>
                                                        <option value="<?php echo $row->nama ?>" <?= $row->nama == $kelas ? 'selected' : ''; ?>>
                                                            <?php echo $row->nama; ?></option>
                                                    <?php endforeach; ?>

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->

                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">TINDAKAN LABOR</label>
                                            <div class="col-md-9 has-success">
                                                <select class="form-control filled-input select2" placeholder="PILIH TINDAKAN" style="border: 1px solid lightgreen;" id="outTipeKamarlabor" onchange="pilihTindakanLabor(this)">
                                                    <option value="-">-</option>
                                                    <!-- </?php
                                                    foreach ($tindakan_labor as $row) :
                                                        $harga = $row['harga']; ?>
                                                        <option value="</?php echo $row['id_daftar_tindakan'] . "|" . $harga . "|" .  $row['nama']. "|" .  $row['kode_lis']; ?>">
                                                            </?php echo $row['nama']; ?></option>
                                                    </?php endforeach ?> -->
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <span class="help-block"></span>


                                <div class="row">
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
                                            <!-- </?php if ($izinAkses == "admin") { ?> -->
                                            <th>HAPUS</th>
                                            <!-- </?php } ?> -->
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
                                            <!-- </?php if ($izinAkses == "admin") { ?>
                                                <th>HAPUS</th>
                                            </?php } ?> -->
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
                                            <input type="hidden" class="form-control" disabled id="inPelLab">
                                            <input type="hidden" class="form-control" disabled id="inHisLab">
                                            <!-- <input type="hidden" class="form-control" disabled id="cara_bayar_lab"> -->

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
                                <div class="form-group">
                                    <span class="help-block"></span>
                                    <label class="control-label col-md-3">TIPE KAMAR</label>
                                    <div class="col-md-9 has-success">
                                        <select class="form-control filled-input select2" placeholder="KAMAR" style="border: 1px solid lightgreen;" id="inTipeKamarRadiologi" name="TipeKamar">
                                            <option value="-">
                                                -</option>
                                            <?php
                                            foreach ($data_tipe_kamar as $row) :
                                            ?>
                                                <option value="<?php echo $row->nama ?>" <?= $row->nama == $kelas ? 'selected' : ''; ?>>
                                                    <!-- <option value="</?php echo $row->nama; ?>"> -->
                                                    <?php echo $row->nama; ?>
                                                </option>
                                            <?php endforeach; ?>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label col-md-3">TINDAKAN RADIOLOGI</label>
                                    <div class="col-md-9 has-success">
                                        <select class="form-control filled-input select2" placeholder="PILIH TINDAKAN" style="border: 1px solid lightgreen;" id="outTipeKamarRadiologi" onchange="pilihTindakanRadiologi(this)">
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
                        </div>
                        <span class="help-block"></span>

                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label col-md-3">JUMLAH TINDAKAN</label>
                                    <div class="col-md-9 has-error">
                                        <input type="text" class="form-control " id="inJumlahRadiologi" disabled placeholder="jumlah" oninput="hargaTotalRadiologi()">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>
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
                        </div>
                        <span class="help-block"></span>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">TOTAL HARGA</label>
                                    <div class="col-md-9 has-error">
                                        <input type="text" class="form-control " disabled id="outTotalRadiologi">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>
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
                                    <th>AKSI</th>
                                    <th>EXPERTISE</th>
                                    <th>NAMA</th>
                                    <th>TANGGAL TINDAKAN</th>
                                    <th>BIAYA TINDAKAN </th>
                                    <th>JUMLAH TINDAKAN</th>
                                    <th>STAFF REQUEST</th>
                                    <th>STAFF KONFIRMASI</th>
                                    <th>DIAGNOSA</th>
                                    <th>GAMBAR</th>
                                    <th>KETERANGAN</th>
                                    <th>STATUS</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr class="bg-success">
                                    <th>NO</th>
                                    <th>HAPUS</th>
                                    <th>AKSI</th>
                                    <th>EXPERTISE</th>
                                    <th>NAMA</th>
                                    <th>TANGGAL TINDAKAN</th>
                                    <th>BIAYA TINDAKAN </th>
                                    <th>JUMLAH TINDAKAN</th>
                                    <th>STAFF REQUEST</th>
                                    <th>DIAGNOSA</th>
                                    <th>STAFF KONFIRMASI</th>
                                    <th>GAMBAR</th>
                                    <th>KETERANGAN</th>
                                    <th>STATUS</th>
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


<!-- tindakan biaya -->
<div class="modal fade bs-example-modal-lg" id="modal_pembayaran" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">

    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h5 class="modal-title" id="myLargeModalLabel"><i class="icon-user mr-10"></i> INFO TINDAKAN BIAYA
                </h5>
            </div>

            <div class="modal-body">

                <div class="form-wrap">
                    <!-- /formbody -->
                    <div class="form-body">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <span class="help-block"></span>
                                    <label class="control-label col-md-3">NO RM</label>
                                    <div class="col-md-9 has-success">
                                        <input type="text" style="margin-top:-0.8em;" class="form-control" disabled="" id="no_rm1">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">NAMA PASIEN</label>
                                    <div class="col-md-9 has-success">
                                        <input type="text" class="form-control" disabled="" id="nama1">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="modal-body mt-30">
                            <h6 class="txt-dark capitalize-font pl-20"><i class="icon-list mr-10"></i>DATA KAMAR</h6>
                            <hr width="95%">
                            <div class="table-wrap" style="width: 100%; margin: auto ">
                                <div class="table-responsive">
                                    <table class="table table-hover display  pb-60" id="tablekamar1">
                                        <thead>
                                            <tr class="bg-success">
                                                <th>NO</th>
                                                <th>KELAS</th>
                                                <th>KAMAR</th>
                                                <th>TANGGAL MASUK</th>
                                                <th>TANGGAL KELUAR</th>
                                                <th>STATUS</th>
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
            <div class="modal-body mt-10" style="margin-bottom:-2em;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h6 class="txt-dark capitalize-font pl-20"><i class="icon-list mr-10"></i>INFO TINDAKAN BIAYA</h6>
                <hr width="95%">
            </div>

            <div class="modal-body">

                <div class="form-wrap">
                    <!-- /formbody -->
                    <div class="form-body">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <span class="help-block"></span>
                                    <label class="control-label col-md-3">TIPE KAMAR</label>
                                    <div class="col-md-9 has-success">
                                        <!-- <input type="text" value="</?=$kelas?>"> -->

                                        <select class="form-control filled-input select2" placeholder="KAMAR" style="border: 1px solid lightgreen;" id="inTipeKamar" name="TipeKamar">
                                            <option value="-">
                                                -</option>
                                            <?php
                                            foreach ($data_tipe_kamar as $row) :
                                            ?>
                                                <option value="<?php echo $row->nama ?>" <?= $row->nama == $kelas ? 'selected' : ''; ?>>
                                                    <?php echo $row->nama; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">NAMA TINDAKAN</label>
                                    <div class="col-md-9 has-success">

                                        <select class="form-control filled-input select2" placeholder="PILIH TINDAKAN" style="border: 1px solid lightgreen;" id="outTipeKamar" onchange="pilihTindakan(this)">

                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <span class=" help-block"></span>
                        <!-- /Row -->

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label col-md-3">JUMLAH TINDAKAN</label>
                                    <div class="col-md-9">
                                        <input type="number" class="form-control " id="inJumlah" value="1" placeholder="jumlah" oninput="hargaTotal()">

                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label col-md-3">BIAYA TINDAKAN</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" disabled="" id="outBiayaTindakan">
                                        <input type="hidden" class="form-control" id="inBiayaTindakan">
                                        <input type="hidden" class="form-control " disabled="" id="idPelayanan">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <!-- /Row -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">NAMA DOKTER</label>
                                    <div class="col-md-9 has-success">
                                        <select class="form-control filled-input select2" placeholder="PILIH KATEGORI" style="border: 1px solid lightgreen;" id="inDPJP" name="NAMA DOKTER">

                                            <?php
                                            foreach ($data_dokter as $row) :
                                            ?>
                                                <option value="<?php echo $row->id_dokter; ?>">
                                                    <?php echo $row->nama; ?></option>
                                            <?php endforeach; ?>
                                            >
                                        </select>
                                        <input type="hidden" id="kodedpjp">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label col-md-3">TOTAL HARGA</label>
                                    <div class="col-md-9">
                                        <input type="text" va class="form-control " disabled="" id="outTotal">

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

                        </div>


                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button onclick="insert_tindakan()" class="btn btn-success btn-anim  btn-sm mr-20"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
            </div>
            <div class="modal-body mt-30">
                <h6 class="txt-dark capitalize-font pl-20"><i class="icon-list mr-10"></i>TINDAKAN</h6>
                <hr width="95%">
                <div class="table-wrap" style="width: 95%; margin: auto ">
                    <div class="table-responsive">
                        <table class="table table-hover display  pb-60" id="tabletindakan">
                            <thead>
                                <tr class="bg-success">
                                    <th>NO</th>
                                    <th>NAMA TINDAKAN</th>
                                    <th>TIPE KAMAR</th>
                                    <th>BIAYA TINDAKAN </th>
                                    <th>JUMLAH TINDAKAN</th>
                                    <th>TOTAL BIAYA</th>
                                    <th>TANGGAL</th>
                                    <th>DOKTER</th>
                                    <th>NAMA STAFF</th>
                                    <th>PEMBAYARAN </th>
                                    <!-- </?php if ($izinAkses == "admin") { ?> -->
                                    <th>HAPUS</th>
                                    <!-- </?php } ?> -->
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

<!-- FISIO -->
<div class="modal fade bs-example-modal-lg" id="modal_fisio" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h5 class="modal-title" id="myLargeModalLabel"><i class="icon-user mr-10"></i> TINDAKAN REQUEST FISIO
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
                                    <label class="control-label col-md-3">TINDAKAN</label>
                                    <div class="col-md-9 has-success">
                                        <select class="form-control filled-input select2" placeholder="PILIH TINDAKAN" style="border: 1px solid lightgreen;" id="outTindakanFisio" onchange="pilihTindakanFisio(this)">
                                            <option value="-">-</option>
                                            <?php
                                            foreach ($tindakan_fisio as $row) :
                                                $harga = $row['harga_sarana'];
                                                $jasa = $row['harga_jasa']; ?>
                                                <option value="<?php echo $row['id_list_tindakan'] . "|" . $harga . "|" . $jasa . "|" .  $row['nama']; ?>">
                                                    <?php echo $row['nama']; ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!--/span-->

                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label col-md-3">TOTAL TINDAKAN</label>
                                    <div class="col-md-9 has-error">
                                        <input type="number" class="form-control" id="outJumlahTindakan" oninput="hargaTotalFisio()">
                                        <input type="hidden" class="form-control" disabled id="id_pelayanan">
                                        <input type="hidden" class="form-control" disabled id="id_history">
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
                                        <input type="text" class="form-control" id="outBiayaTindakanFisio" disabled>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">TOTAL HARGA</label>
                                    <div class="col-md-9 has-error">
                                        <input type="text" class="form-control " disabled id="outTotalfisio">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label col-md-3">NAMA DOKTER</label>
                                    <div class="col-md-9 has-success">
                                        <select class="form-control filled-input select2" placeholder="PILIH DOKTER" style="border: 1px solid lightgreen;" id="DPJP">
                                            <option value="-">-</option>
                                            <?php
                                            foreach ($dokter as $row) : ?>
                                                <option value="<?php echo $row['id_dokter']; ?>">
                                                    <?php echo $row['nama']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <span class="help-block"></span>

                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group pull-right">
                                    <button onclick="insert_fisio()" class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
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
                        <table class="table table-hover display  pb-60" id="tablefisio">
                            <thead>
                                <tr class="bg-success">
                                    <th>NO</th>
                                    <th>NAMA</th>
                                    <th>TANGGAL TINDAKAN</th>
                                    <th>JUMLAH TINDAKAN</th>
                                    <th>BIAYA TINDAKAN</th>
                                    <th>DOKTER</th>
                                    <th>STAFF</th>
                                    <th>HAPUS</th>
                                </tr>
                            </thead>
                            <tbody style="color: black">
                            </tbody>
                            <tfoot>
                                <tr class="bg-success">
                                    <th>NO</th>
                                    <th>NAMA</th>
                                    <th>TANGGAL TINDAKAN</th>
                                    <th>BIAYA TINDAKAN </th>
                                    <th>JUMLAH TINDAKAN</th>
                                    <th>DOKTER</th>
                                    <th>STAFF</th>
                                    <th>HAPUS</th>
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

<!-- obat ruangan -->
<div class="modal fade bs-example-modal-lg" id="modal_obat_ruang" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h5 class="modal-title" id="myLargeModalLabel"><i class="icon-user mr-10"></i> OBAT RUANGAN
                </h5>
            </div>
            <div class="modal-body">
                <div class="form-wrap">
                    <!-- /formbody -->
                    <div class="form-body">
                        <h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO OBAT
                        </h6>
                        <hr width="95%">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label col-md-3">NAMA OBAT</label>
                                    <div class="col-md-9 has-success">
                                        <select class="form-control filled-input select2" id="inObatRuang" onchange="setHarga1()">
                                            <option value="-">-</option>
                                            <?php

                                            foreach ($obat_ruang as $row) {
                                                $harga = ($row["harga_cost"] / $row["satuan_ok"]);
                                                $stok =  $row["stok"] * $row["satuan_ok"];
                                            ?>
                                                <option value="<?php echo $row["id_logistik"] . '|' . $harga . '|' . $row["margin"] . '|' . $row["kadaluarsa"] . '|' . $stok . '|' . $row["ppn"]; ?>"><?php echo $row["nama"]; ?></option>
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
                                        <input type="text" class="form-control " id="inTglExpR" disabled="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label col-md-3">JUMLAH STOK</label>
                                    <div class="col-md-9 has-error">
                                        <input type="number" class="form-control " id="outStokR" value="0" disabled="">
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
                                        <input type="number" class="form-control " id="inJumlahObatR" placeholder="jumlah" value="1" min="1" oninput="setHarga1()">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">DISCOUNT</label>
                                    <div class="col-md-3 has-success">
                                        <input type="number" placeholder="Disc" max="35" class="form-control" id="inDiscR" value="0" oninput="setHarga1()">
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
                                        <input type="text" class="form-control" disabled="" id="outBiayaTindakanObatR">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label col-md-3">HARGA + MARGIN</label>
                                    <div class="col-md-9 has-error">
                                        <input type="text" class="form-control" disabled="" id="outBiayaMarginObatR">
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
                                        <input type="text" class="form-control" disabled="" id="outTotalObatR">

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label col-md-3">KETERANGAN</label>
                                    <div class="col-md-9 has-success">
                                        <textarea class="form-control" rows="2" style="resize:none" id="inKeteranganObatR">-</textarea>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row" style="margin-top: 10px;" id="cetakSigna1">

                            <div class="col-md-6">
                                <label class="control-label col-md-3">SIGNA OBAT</label>
                                <div class="col-md-9 has-success">
                                    <select class="form-control filled-input rounded-input select2" id="inSignaR">
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
                                    <select class="form-control filled-input rounded-input select2" id="inCaraPakaiR">
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
                        <input type="hidden" class="form-control" id="inHisObat">
                        <div class="form-actions mt-10">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-9">
                                            <div type="submit" class="btn btn-success mr-10" onclick="insert_ObatR()">SIMPAN</div>

                                            <span></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6"> </div>
                            </div>
                        </div>
                        <div class="panel-wrapper collapse in mb-20 mt-20" id="outListTindakanApelkes">
                            <h6 class="txt-dark capitalize-font pl-20 mb-0"><i class="icon-list mr-10"></i>TINDAKAN OBAT</h6>
                            <hr width="95% mb-0">
                            <div class="panel-body mt-0">
                                <div class="table-wrap mt-0">
                                    <div class="table-responsive mt-0">
                                        <table id="tableobatR" class="table table-hover display pb-30 mt-10" width="100%">
                                            <thead>
                                                <tr class="bg-success">
                                                    <th>NO</th>
                                                    <th>NAMA OBAT</th>
                                                    <th>EXPIRE DATE</th>
                                                    <th>HARGA OBAT</th>
                                                    <th>JUMLAH OBAT</th>
                                                    <th>TOTAL BIAYA</th>
                                                    <th>TANGGAL INPUT</th>
                                                    <th>NAMA STAFF</th>
                                                    <th>HAPUS</th>
                                                    <!-- <th>SIGNA</th> -->
                                                </tr>
                                            </thead>
                                            <tbody style="color: black">
                                            </tbody>
                                            <tfoot>
                                                <th>NO</th>
                                                <th>NAMA OBAT</th>
                                                <th>EXPIRE DATE</th>
                                                <th>HARGA OBAT</th>
                                                <th>JUMLAH OBAT</th>
                                                <th>TOTAL BIAYA</th>
                                                <th>TANGGAL INPUT</th>
                                                <th>NAMA STAFF</th>
                                                <th>HAPUS</th>
                                            </tfoot>
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
                                                <table class="table table-hover display " id="outTotalHarga1">
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

                        <span class="help-block"></span>
                        <div align="right">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-9">
                                            <!-- <div id="cetakFarmasi" onclick="cetak_resep()" class="btn btn-success mr-10">CETAK RESEP</div> -->
                                            <div id="batalFarmasi" onclick="batalFarmasi()" class="btn btn-danger ">BATAL</div>

                                            <span></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6"> </div>
                            </div>

                        </div>
                        <br>
                        <br>
                        </hr>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- visite dokter -->
<div class="modal fade bs-example-modal-lg" id="modal_visite" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">

    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h5 class="modal-title" id="myLargeModalLabel"><i class="icon-user mr-10"></i> INFO TINDAKAN VISITE DOKTER
                </h5>
            </div>

            <div class="modal-body">

                <div class="form-wrap">
                    <!-- /formbody -->
                    <div class="form-body">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">TINDAKAN</label>
                                    <div class="col-md-9 has-success">
                                        <!-- <input type="text" value="</?=$kelas?>"> -->

                                        <select class="form-control filled-input select2" placeholder="KAMAR" style="border: 1px solid lightgreen;" id="inTindakanV" name="inTindakanV" onchange="getVisiteDok()">
                                            <option value="visite">VISITE</option>
                                            <option value="diskon">DISKON VISITE</option>

                                        </select>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">TIPE KAMAR</label>
                                    <div class="col-md-9 has-success">
                                        <!-- <input type="text" value="</?=$kelas?>"> -->

                                        <select class="form-control filled-input select2" placeholder="KAMAR" style="border: 1px solid lightgreen;" id="inTipeKamar1" name="TipeKamar" onchange="getVisiteDok()">
                                            <option value="-">
                                                -</option>
                                            <?php
                                            foreach ($data_tipe_kamar as $row) :
                                            ?>
                                                <option value="<?php echo $row->nama ?>" <?= $row->nama == $kelas ? 'selected' : ''; ?>>
                                                    <?php echo $row->nama; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>



                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">NAMA DOKTER</label>
                                    <div class="col-md-9 has-success">
                                        <select class="form-control filled-input select2" placeholder="PILIH KATEGORI" style="border: 1px solid lightgreen;" id="inDPJP1" name="NAMA DOKTER" onchange="getVisiteDok()">

                                            <?php
                                            foreach ($data_dokter as $row) :
                                            ?>
                                                <option value="<?php echo $row->id_dokter; ?>">
                                                    <?php echo $row->nama; ?></option>
                                            <?php endforeach; ?>
                                            >
                                        </select>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label col-md-3">TANGGAL</label>
                                    <div class="col-md-9 has-success">
                                        <input type="date" value="<?php echo date("Y-m-d"); ?>" id="tgl_visite" name="tgl_visite" class="form-control">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" class="form-control " id="hargaSarana">
                <input type="hidden" class="form-control " id="hargaJasa">
                <input type="hidden" class="form-control " id="id_list_tindakan">
                <input type="hidden" class="form-control " id="idPelayanan1">
                <input type="hidden" class="form-control " id="idHis1">

                <button onclick="insert_visite()" class="btn btn-success btn-anim  btn-sm mr-20"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
            </div>
            <div class="modal-body mt-30">
                <h6 class="txt-dark capitalize-font pl-20"><i class="icon-list mr-10"></i>TINDAKAN</h6>
                <hr width="95%">
                <div class="table-wrap" style="width: 95%; margin: auto ">
                    <div class="table-responsive">
                        <table class="table table-hover display  pb-60" id="tabletindakan1">
                            <thead>
                                <tr class="bg-success">
                                    <th>NO</th>
                                    <th>NAMA TINDAKAN</th>
                                    <th>TIPE KAMAR</th>
                                    <th>BIAYA TINDAKAN </th>
                                    <th>JUMLAH TINDAKAN</th>
                                    <th>TOTAL BIAYA</th>
                                    <th>TANGGAL</th>
                                    <th>DOKTER</th>
                                    <th>NAMA STAFF</th>
                                    <!-- </?php if ($izinAkses == "admin") { ?> -->
                                    <th>HAPUS</th>
                                    <!-- </?php } ?> -->
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
                            <table class="table table-hover display " id="outTotalHarga2">
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



<style>
    td {
        color: black;
    }

    .zoom:active {
        position: relative;
        overflow: hidden;
        transition: all .3s ease-in-out;
        -webkit-transform: scale(6.5);
        transform: scale(6.5);
    }
</style>
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
                // if (cara_bayar == '31'){
                //     $('#inMargin').val('1.1');
                // }else{
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
                    id_history: id_history,
                    akun: 'ranap'
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

    function reload_data_obat1(id_resep) {
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
                "url": '<?php echo base_url('Apelkes/tampil_list_tindakan'); ?>',
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

    function reload_total_harga(id_pelayanan) {
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
                "url": '<?php echo base_url('Apelkes/tampil_total_harga'); ?>',
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

    ////vistie
    function reload_data_tindakan1(id_pelayanan) {
        $('#tabletindakan1').dataTable().fnClearTable();
        $('#tabletindakan1').dataTable().fnDestroy();
        $('#tabletindakan1').DataTable({
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
                "url": '<?php echo base_url('Apelkes/tampil_list_tindakan_visite'); ?>',
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

    function reload_total_harga1(id_pelayanan) {
        $('#outTotalHarga2').dataTable().fnClearTable();
        $('#outTotalHarga2').dataTable().fnDestroy();
        $('#outTotalHarga2').DataTable({
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
                "url": '<?php echo base_url('Apelkes/tampil_total_harga_visite'); ?>',
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

    function cetak_antrian() {
        id_pelayanan = $('#inPelResep').val();
        $.ajax({
            url: "<?php echo base_url() ?>Rawatinap/insertAntrian",
            method: "POST",
            data: {
                id_pelayanan: id_pelayanan,
            },

            success: function() {
                window.location.href = '<?php echo base_url() ?>Rawatinap/print_antrian_apotik';

            }
        })

    }

    function edit_data_tindakan(id_pelayanan, id_history) {
        swal({
            title: "Hi. dear",
            type: "info",
            text: "Fitur ini segera hadir",
            confirmButtonColor: "#3cb878",
        });
    }




    // Radiologi
    function insert_radiologi() {
        a = $("#outTipeKamarRadiologi").val();
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
        status_pembayaran = $('#inPembayaran1').val();

        dataString = 'id=' + ID + '&harga=' + harga +
            '&id_pel_rad=' + id_pel_rad + '&id_his_rad=' + id_his_rad + '&id_list_tindakan=' + splitDiag[0] +
            '&frek=' + frek + '&total=' + total + '&jenis_pelayanan=' + "RAWAT INAP" + '&diagnosa=' + diagnosa +
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

    // function pilihTindakanRadiologi() {
    //     a = $("#inTindakanRadiologi").val();
    //     splitDiag = a.split("|");

    //     harga = parseFloat(splitDiag[1]);
    //     $("#outBiayaTindakanRadiologi").val(convertToRupiah(harga));
    //     document.getElementById("inJumlahRadiologi").value = "1";
    //     document.getElementById("outTotalRadiologi").value = convertToRupiah(harga);
    // }

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
                "url": '<?php echo base_url('Rawatinap/tampil_total_radiologi'); ?>',
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
                "url": '<?php echo base_url('Rawatinap/tampil_list_radiologi'); ?>',
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

    function edit_radiologi(id_pelayanan, id_history) {

        $("#id_pel_rad").val(id_pelayanan);
        $("#id_his_rad").val(id_history);
        $("#modal_radiologi").modal('show');
        reload_data_radiologi(id_pelayanan);
        reload_total_radiologi(id_pelayanan);
        $.ajax({
            url: "<?= base_url() . 'Poli/getdata' ?>",
            data: {
                id_pelayanan: id_pelayanan,
            },
            type: 'POST',
            dataType: 'json',
            success: function(data) {
                if (data.status_dt == "found") {
                    if (data.data.cara_bayar == '30') {
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
                                title: "Good Job!",
                                type: "success",
                                text: "Data berhasil dihapus",
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

    // End

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
        a = $("#outTipeKamarLabor").val();
        //splitDiag = a.split("|");
        //var_dump(a);
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
            '&nama_tindakan=' + nama + '&kode_lis=' + kode_lis + '&cara_masuk=' + "RAWAT INAP";
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
            url: "<?= base_url() . 'Poli/req_form_labor_ranap' ?>",
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
                "url": '<?php echo base_url('IGD/tampil_list_labor'); ?>',
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

    // function pilihTindakanLabor() {
    //     a = $("#inTindakanLabor").val();
    //     splitDiag = a.split("|");

    //     harga = parseFloat(splitDiag[1]);
    //     $("#outBiayaTindakanLabor").val(convertToRupiah(harga));
    //     document.getElementById("inJumlahLabor").value = "1";
    //     document.getElementById("outTotalLabor").value = convertToRupiah(harga);
    // }

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
                "url": '<?php echo base_url('IGD/tampil_total_labor'); ?>',
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

    function edit_labor(id_pelayanan, id_history) {

        $("#id_pel_lab").val(id_pelayanan);
        $("#id_his_lab").val(id_history);
        $("#inPelLab").val(id_pelayanan);
        $("#inHisLab").val(id_history);
        $("#inTipeKamarlabor").val("<?= $kelas ?>").change();

        $("#modal_labor").modal('show');
        reload_data_form_labor(id_pelayanan);
        $.ajax({
            url: "<?= base_url() . 'Poli/getdata' ?>",
            data: {
                id_pelayanan: id_pelayanan,
            },
            type: 'POST',
            dataType: 'json',
            success: function(data) {
                if (data.status_dt == "found") {
                    if (data.data.cara_bayar == '30') {
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
                    url: "<?php echo base_url() ?>Labor/hapus_data_labor",
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
    //End

    function edit_obat(idPel, idHis) {
        $('#inPelResep').val(idPel);
        $('#inHisResep').val(idHis);
        $('#inDepo1').val('RANAP').change();
        $("#modal_edit_resep").modal('show');
        $("#collap_nonracikan").collapse('hide');
        $("#collap_racikan").collapse('hide');
        reload_data_resep(idPel, idHis);
    }

    function pilih_obat(idResep, tipe, cara_bayar, depo, id_pelayanan) {
        if (tipe == 2) {
            $('#form_racikan').show();
            $('#inResObat').val(idResep);
            $('#inDepo').val(depo);
            getObat(depo);
            $("#collap_racikan").collapse('toggle');
            $("#collap_nonracikan").collapse('hide');
            reload_total_obat(idResep);
            reload_data_racikan(idResep);
        } else if (tipe == 4) {
            $('#cara_bayar').val(cara_bayar);
            $('#tipe_resep').val(tipe);
            $('#inResObat2').val(idResep);
            $('#inDepo').val(depo);
            getObat(depo);
            reload_total_obat(idResep);
            getObatReturn(id_pelayanan);

            $("#collap_Return").collapse('toggle');
            $("#collap_nonracikan").collapse('hide');
            $("#collap_racikan").collapse('hide');
            reload_total_obat(idResep);
            reload_data_obat1(idResep);
        } else {
            $('#formObat').show();
            getNamaObat('RANAP');
            $('#cara_bayar').val(cara_bayar);
            $('#tipe_resep').val(tipe);
            $('#inResObat').val(idResep);
            $('#inDepo').val(depo);
            getObat(depo);
            // $('#inSigna').val('6296f5928ac4c').change();

            $("#collap_nonracikan").collapse('toggle');
            $("#collap_racikan").collapse('hide');
            reload_total_obat(idResep);
            reload_data_obat(idResep);
        }
    }

    function pilih_obat1(idResep, tipe, cara_bayar, depo, id_pelayanan) {
        if (tipe == 2) {
            $('#form_racikan').hide();
            $('#inResObat').val(idResep);
            $('#inDepo').val(depo);
            getObat(depo);
            $("#collap_racikan").collapse('toggle');
            $("#collap_nonracikan").collapse('hide');
            reload_total_obat(idResep);
            reload_data_racikan(idResep);
        } else if (tipe == 4) {
            $('#cara_bayar').val(cara_bayar);
            $('#tipe_resep').val(tipe);
            $('#inResObat2').val(idResep);
            $('#inDepo').val(depo);
            getObat(depo);
            reload_total_obat(idResep);
            getObatReturn(id_pelayanan);

            $("#collap_Return").collapse('toggle');
            $("#collap_nonracikan").collapse('hide');
            $("#collap_racikan").collapse('hide');
            reload_total_obat(idResep);
            reload_data_obat1(idResep);
        } else {
            $('#formObat').hide();
            getNamaObat('RANAP');
            $('#cara_bayar').val(cara_bayar);
            $('#tipe_resep').val(tipe);
            $('#inResObat').val(idResep);
            $('#inDepo').val(depo);
            getObat(depo);
            $("#collap_nonracikan").collapse('toggle');
            $("#collap_racikan").collapse('hide');
            reload_total_obat(idResep);
            reload_data_obat(idResep);
        }
    }

    $('#modal_edit_resep').on('hidden.bs.modal', function() {
        $("#collap_nonracikan").collapse('hide');
        $("#collap_racikan").collapse('hide');
        $('#tableresep').DataTable().ajax.reload();
    })

    function batalFarmasi() {
        $("#collap_Return").collapse('hide');
        $("#collap_nonracikan").collapse('hide');
        $("#collap_racikan").collapse('hide');
    }

    function next_resep(id_resep, id_history, id_pelayanan) {
        swal({
            title: "Apakah kamu yakin?",
            text: "Melanjutkan resep ini?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3cb878",
            confirmButtonText: "Yakin",
            cancelButtonText: "Batal",
            closeOnConfirm: false
        }, function() {
            $().ready(function() {
                $.ajax({
                    url: "<?php echo base_url() ?>Poli/next_resep",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        id_resep: id_resep,
                        id_history: id_history,
                        id_pelayanan: id_pelayanan,
                        jenis_pelayanan: 'RANAP',
                    },
                    success: function(data) {
                        if (data.status == "success") {
                            swal({
                                title: "good job!",
                                type: "success",
                                text: "Resep Berhasil Ditambahkan",
                                confirmButtonColor: "#3cb878",
                            });
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
            });
        });
        return false;
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

    function insert_na_obat() {
        jenis_resep = 4;
        nama_resep = '-';
        id_pelayanan = $('#inPelResep').val();
        id_history = $('#inHisResep').val();
        $.ajax({
            url: "<?= base_url() . 'Poli/insert_resep' ?>",
            method: "POST",
            dataType: 'json',
            data: {
                jenis_resep: jenis_resep,
                nama_resep: nama_resep,
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
        // if (signa == '-' ) {
        //     swal({
        //         title: "Gagal!",
        //         type: "warning",
        //         text: 'Signa belum diisi',
        //         confirmButtonColor: "#3cb878",
        //     });
        // } else {
        $.ajax({
            url: "<?= base_url() . 'Poli/insert_obat' ?>",
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
                jenis_pelayanan: 'RANAP',
                tipe: tipe
            },
            success: function(data) {
                if (data.status == "success") {
                    $.toast({
                        heading: 'Success!',
                        text: 'Tindakan ini telah ditambah',
                        showHideTransition: 'fade',
                        icon: 'success'
                    })
                    $('#formObat')[0].reset();
                    $("#collap_nonracikan").collapse('show');
                    $("#collap_racikan").collapse('hide');
                    $('#tableobat').DataTable().ajax.reload();
                    // $('#inDepo').val('RANAP').change();
                    // getObat(depo);
                    // $('#inGolongan').val('-').change();
                    $('#inObat').val('').change();
                    $('#inTglExp').empty().trigger('change');
                    $("#inKeteranganObat").removeData();
                    $("#inJumlahObat").val('1');
                    $("#inDisc").val(0);
                    $("#outBiayaTindakanObat").val('');
                    $("#outBiayaMarginObat").val('');
                    $("#outStok").val('0');
                    $("#outTotalObat").val('');
                    $('#inSigna').val(signa).change();
                    $('#inCaraPakai').val(cara_pakai).change();
                } else if (data.status == "error") {
                    $.toast({
                        heading: 'Error!',
                        text: 'Stok tidak sesuai dengan permintaan',
                        showHideTransition: 'fade',
                        icon: 'error'
                    })
                } else {
                    $.toast({
                        heading: 'Error!',
                        text: data.status,
                        showHideTransition: 'fade',
                        icon: 'error'
                    })
                }
            }
        });
        // }


    }


    function insert_Return() {
        id_pelayanan = $('#inPelResep').val();
        id_resep = $('#inResObat2').val();
        //caraBayar = $('#cara_bayar').val();
        a = $("#inObat1").val();
        depo = $("#inDepo1").val();
        splitDiag = a.split("|");
        id_list_tindakan = splitDiag[0];
        harga = splitDiag[1];
        margin = splitDiag[2];
        expire = splitDiag[3];
        harga_cost = $("#hargaCost").val();
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
                id_resep: id_resep,
                depo: depo,
                margin: margin,

                harga: harga,
                frek: frek,

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
                    reload_data_obat1(id_resep);
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

    function detail_radiologi(id_pelayanan, id_tindakan_radiologi) {
        $.ajax({
            url: "<?= base_url() . 'Rawatinap/getdata_formById' ?>",
            data: {
                pelayanan: id_pelayanan,
                tindakan: id_tindakan_radiologi,
            },
            type: 'POST',
            dataType: 'json',
            success: function(data) {
                if (data.status_dt == "found") {
                    $('#detailTindakan').collapse('toggle');
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
                            // $('#tableobat1').DataTable().ajax.reload();
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

    function hapus_obat1(id, nama, depo) {
        id_pelayanan = $('#inPelResep').val();
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
                            getObatReturn(id_pelayanan);
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

    function request(id_resep, jenis_resep) {
        $.ajax({
            url: "<?= base_url() . 'Poli/request_resep' ?>",
            method: "POST",
            dataType: 'json',
            data: {
                id_resep: id_resep,
                jenis_resep: jenis_resep
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

                    reload_data_racikan(id_resep);

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
                url: "<?php echo base_url(); ?>Poli/getNamaObat",
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
                        html += '<option value=' + data[i].id_logistik + '|' + data[i].harga_cost + '|' + data[i].margin + '|' + data[i].kadaluarsa + '|' + data[i].stok + '|' + data[i].ppn + '|' + '>' + data[i].nama + '</option>';
                    }
                    $('#inObat').html(html);
                }
            });
        } else {
            $('#inObat').html('<option value="">-</option>');
        }
    }

    function getObatByGol() {
        gol = $('#inGolongan').val();
        depo = $('#inDepo').val();
        if (gol != '') {
            $.ajax({
                url: "<?php echo base_url(); ?>Poli/getNamaObatByGol",
                method: "POST",
                data: {
                    gol: gol,
                    depo: depo
                },
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    var i;
                    html = '<option value="">-</option>';
                    for (i = 0; i < data.length; i++) {
                        html += '<option value=' + data[i].id_logistik + '|' + data[i].harga_cost + '|' + data[i].margin + '|' + data[i].kadaluarsa + '|' + data[i].stok + '|' + data[i].ppn + '|' + '>' + data[i].nama + '</option>';
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



    function setJumlahObatReturn() {
        obat = $('#inObat1').val();
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
        $("#hargaCost").val(Number(total) / Number(stok));
        $('#inDepo1').val(splitDiag[6]);
    }
</script>

<script type="text/javascript">

</script>




<script>
    function getObatReturn(id_pelayanan) {
        $.ajax({
            url: "<?php echo base_url(); ?>Poli/getNamaObatReturn",
            method: "POST",
            data: {
                id_pelayanan: id_pelayanan
            },
            dataType: 'json',
            success: function(data) {
                var html = '';
                var i;
                html = '<option value="">-</option>';
                for (i = 0; i < data.length; i++) {
                    html += '<option value=' + data[i].id_logistik + '|' + data[i].harga_cost + '|' + data[i].margin + '|' + data[i].kadaluarsa + '|' + data[i].stok + '|' + data[i].total + '|' + data[i].depo + '>' + data[i].nama + '</option>';
                }
                $('#inObat1').html(html);
            }
        });
    }

    function getNamaObat(depo) {
        $.ajax({
            url: "<?php echo base_url(); ?>Poli/getNamaObat",
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
                    html += '<option value=' + data[i].id_logistik + '|' + data[i].harga_cost + '|' + data[i].margin + '|' + data[i].kadaluarsa + '|' + data[i].stok + '|' + data[i].total + '|' + data[i].depo + '>' + data[i].nama + '</option>';
                }
                $('#inObat1').html(html);
            }
        });
    }
</script>
<script type="text/javascript">
    /*Typeahead Init*/

    $(function() {
        "use strict";

        /*Basic*/

        var substringMatcher = function(strs) {
            return function findMatches(q, cb) {
                var matches, substringRegex;

                // an array that will be populated with substring matches
                matches = [];

                // regex used to determine if a string contains the substring `q`
                var substrRegex = new RegExp(q, 'i');

                // iterate through the pool of strings and for any string that
                // contains the substring `q`, add it to the `matches` array
                $.each(strs, function(i, str) {
                    if (substrRegex.test(str)) {
                        matches.push(str);
                    }
                });

                cb(matches);
            };
        };

        var states = [
            <?php

            foreach ($signa as $row) {


                echo ",'" .  $row["tindakan"] . "'";
            }  ?>
        ];
        var states1 = [
            <?php

            foreach ($cara_pemakaian_obat as $row) {


                echo ",'" .  $row["cara_pemakaian"] . "'";
            }  ?>
        ];


        $('#the-basics .typeahead').typeahead({
            hint: true,
            highlight: true,
            minLength: 1
        }, {
            name: 'states',
            source: substringMatcher(states)
        });

        $('#the-basics1 .typeahead').typeahead({
            hint: true,
            highlight: true,
            minLength: 1
        }, {
            name: 'states1',
            source: substringMatcher(states1)
        });


    });
</script>

<!-- Apelkes -->
<script type="text/javascript">
    function tindakan_apelkes(id_pelayanan, id_history) {
        $.ajax({
            url: "<?= base_url() . 'Apelkes/getApelkesByIdPelayanan' ?>",
            data: {
                pelayanan: id_pelayanan,
                history: id_history
            },
            type: 'POST',
            dataType: 'json',
            success: function(data) {
                if (data.status_dt == "found") {
                    $("#tipe_masuk").val(data.jenis_pelayanan);
                    $("#no_rm1").val(data.no_rm);
                    $("#nama1").val(data.nama);
                    $("#inTanggalKunjugan").val(data.tgl_masuk);
                    $("#idPelayanan").val(data.id_pelayanan);
                    $("#idHis").val(data.id_history);
                    $("#inNoSEP").val(data.no_sep);
                    $("#inDiagnosa").val(data.diagnosa);
                    $("#inDPJP").val(data.dpjp).change();
                    $("#kodedpjp").val(data.dpjp);
                    $("#inTipeKamar").val("<?= $kelas ?>").change();
                    $("#NamaPasien").val(data.nama).change();
                    $("#inAsalPasien").val(data.asal_pasien).change();
                    $("#inCaraBayar").val(data.id_cara_bayar).change();

                    if (data.id_cara_bayar == '42') {
                        $('#pembayaran2').collapse('hide');
                    } else {
                        $('#pembayaran2').collapse('show');
                    }

                    $("#modal_pembayaran").modal('show');
                    reload_data_tindakan(id_pelayanan);
                    reload_total_harga(id_pelayanan);
                    reload_data_kamar1(id_pelayanan);
                } else {
                    alert("data tidak ditemukan");
                }
            }
        });
    }

    function show_visite(id_pelayanan, id_history) {
        $.ajax({
            url: "<?= base_url() . 'Apelkes/getApelkesByIdPelayanan' ?>",
            data: {
                pelayanan: id_pelayanan,
                history: id_history
            },
            type: 'POST',
            dataType: 'json',
            success: function(data) {
                if (data.status_dt == "found") {
                    $("#idPelayanan1").val(data.id_pelayanan);
                    $("#idHis1").val(data.id_history);
                    $("#inDPJP1").val(data.dpjp).change();
                    var kelas = "<?= $kelas ?>";
                    if (kelas != 'RUANG ISOLASI') {
                        $("#inTipeKamar1").val("<?= $kelas ?>").change();
                    } else {
                        $("#inTipeKamar1").val("-").change();
                    }
                    $("#modal_visite").modal('show');
                    reload_data_tindakan1(id_pelayanan);
                    reload_total_harga1(id_pelayanan);
                } else {
                    alert("data tidak ditemukan");
                }
            }
        });
    }
    $(document).ready(function() {
        $('#inTipeKamar').change(function() {
            var tipe_kamar = $('#inTipeKamar').val();
            var id_pelayanan = $("#idPelayanan").val();
            $.ajax({
                url: "<?php echo base_url(); ?>Apelkes/getTindakanByTipeKamar",
                method: "POST",
                data: {
                    tipe_kamar: tipe_kamar,
                    id_pelayanan: id_pelayanan
                },
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    var i;
                    html += '<option value=' + '-' + '>' + '-' + '</option>';
                    for (i = 0; i < data.length; i++) {
                        html += '<option value=' + data[i].id_list_tindakan_apelkes + '|' + data[i].harga_sarana + '|' + data[i].harga_jasa + '|' + data[i].harga_nama + '>' + data[i].nama + '</option>';
                    }
                    $('#outTipeKamar').html(html);
                }
            });

        });

    });

    function getVisiteDok() {
        var tipe_kamar = $('#inTipeKamar1').val();
        var id_pelayanan = $("#idPelayanan1").val();
        var dpjp = $("#inDPJP1").val();
        if ($("#inTindakanV").val() == 'visite') {
            url = "<?php echo base_url(); ?>Apelkes/getVisite";
        } else {
            url = "<?php echo base_url(); ?>Apelkes/getVisite_diskon";
        }
        $.ajax({
            url: url,
            method: "POST",
            data: {
                tipe_kamar: tipe_kamar,
                id_pelayanan: id_pelayanan,
                dpjp: dpjp
            },
            dataType: 'json',
            success: function(data) {
                $("#hargaSarana").val(data.harga_sarana);
                $("#hargaJasa").val(data.harga_jasa);
                $('#id_list_tindakan').val(data.id_list_tindakan_apelkes);
                // $("#inTindakanV").val('visite').change();


            }
        });

    }
    $(document).ready(function() {
        $('#inTipeKamarlabor').change(function() {
            var tipe_kamar = $('#inTipeKamarlabor').val();
            var id_pelayanan = $("#id_pel_lab").val();

            $.ajax({
                url: "<?php echo base_url(); ?>Apelkes/getTindakanByTipeKamarLabor",
                method: "POST",
                data: {
                    tipe_kamar: tipe_kamar,
                    id_pelayanan: id_pelayanan
                },
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    var i;
                    html += '<option value=' + '-' + '>' + '-' + '</option>';
                    for (i = 0; i < data.length; i++) {
                        html += '<option value="' + data[i].id_daftar_tindakan + '|' + data[i].harga + '|' + data[i].nama + '|' + data[i].kode_lis + '">' + data[i].nama + '</option>';
                    }
                    $('#outTipeKamarlabor').html(html);
                }
            });

        });
    });
    $(document).ready(function() {
        $('#inTipeKamarRadiologi').change(function() {
            var tipe_kamar = $('#inTipeKamarRadiologi').val();
            var id_pelayanan = $("#id_pel_rad").val();

            $.ajax({
                url: "<?php echo base_url(); ?>Apelkes/getTindakanByTipeKamarRadiologi",
                method: "POST",
                data: {
                    tipe_kamar: tipe_kamar,
                    id_pelayanan: id_pelayanan
                },
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    var i;
                    html += '<option value=' + '-' + '>' + '-' + '</option>';
                    for (i = 0; i < data.length; i++) {
                        html += '<option value=' + data[i].id_daftar_tindakan + '|' + data[i].harga + '>' + data[i].nama + '</option>';
                    }
                    $('#outTipeKamarRadiologi').html(html);
                }
            });

        });
    });
</script>
<script type="text/javascript">
    function reload_data_tindakan(idPelayanan) {
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
                "url": '<?php echo base_url('Apelkes/tampil_list_tindakan'); ?>',
                "type": 'POST',
                "data": {
                    id_pelayanan: idPelayanan
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

    function reload_data_kamar1(idPelayanan) {
        $('#tablekamar1').dataTable().fnClearTable();
        $('#tablekamar1').dataTable().fnDestroy();
        $('#tablekamar1').DataTable({
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
                "url": '<?php echo base_url('Apelkes/tampil_list_kamar'); ?>',
                "type": 'POST',
                "data": {
                    id_pelayanan: idPelayanan
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

    function reload_total_harga(id_pelayanan) {
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
                "url": '<?php echo base_url('Apelkes/tampil_total_harga'); ?>',
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

    function delete_data_tindakan(id_tindakan_apelkes, id_pelayanan) {
        swal({
            title: "Apakah kamu yakin?",
            text: "Menghapus data  ini?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3cb878",
            confirmButtonText: "Yakin",
            cancelButtonText: "Batal",
            closeOnConfirm: false
        }, function() {
            $().ready(function() {
                $.ajax({
                    url: "<?php echo base_url() ?>Apelkes/hapus_data_tindakan",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        id_tindakan_apelkes: id_tindakan_apelkes,
                    },
                    success: function(data) {
                        if (data.status == "success") {
                            swal({
                                title: "good job!",
                                type: "success",
                                text: "Data Berhasil dihapus",
                                confirmButtonColor: "#3cb878",
                            });
                            reload_data_tindakan(id_pelayanan);
                            reload_total_harga(id_pelayanan);
                            reload_data_tindakan1(id_pelayanan);
                            reload_total_harga1(id_pelayanan);
                            // $('#outTotalHarga').DataTable().ajax.reload();
                            // $('#outTotalHarga2').DataTable().ajax.reload();
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

    function insert_visite() {

        dokter = $("#inDPJP1").val();
        hargaSarana = $("#hargaSarana").val();
        hargaJasa = $("#hargaJasa").val();
        harga = Number(hargaSarana) + Number(hargaJasa);
        frek = 1;
        total = harga * frek;

        id_pelayanan = $('#idPelayanan1').val();
        id_history = $("#idHis1").val();
        id_list_tindakan = $('#id_list_tindakan').val();
        tgl_visite = $('#tgl_visite').val();


        dataString = '&harga=' + harga +
            '&id_pelayanan=' + id_pelayanan + '&id_list_tindakan=' + id_list_tindakan +
            '&frek=' + frek + '&total=' + total +
            '&dokter=' + dokter + '&id_history=' + id_history + '&tgl_visite=' + tgl_visite;
        var now = "<?= date('Y-m-d') ?>";
        console.log(now);

        if (Date.parse(tgl_visite) > Date.parse(now)) {
            swal({
                title: "Gagal!",
                type: "warning",
                text: "Tanggal Visite Tidak Boleh Melebihi Tanggal Hari Ini",
                confirmButtonColor: "#3cb878",
            });
        } else {
            $.ajax({
                url: "<?= base_url() . 'Apelkes/insert_tindakan' ?>",
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
                        reload_data_tindakan1(id_pelayanan);
                        reload_total_harga1(id_pelayanan);

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

    function insert_tindakan() {
        a = $("#outTipeKamar").val();
        dokter = $("#inDPJP").val();
        splitDiag = a.split("|");
        hargaSarana = parseFloat(splitDiag[1]);
        hargaJasa = parseFloat(splitDiag[2]);
        // harga = hargaSarana + hargaJasa;
        harga = $("#inBiayaTindakan").val();

        frek = parseFloat($("#inJumlah").val());
        total = harga * frek;

        id_pelayanan = $('#idPelayanan').val();
        idHis = $('#idHis').val();
        id_list_tindakan = $('#outTipeKamar').val();
        status_pembayaran = $('#inPembayaran2').val();
        if (dokter == 'null' || dokter == null) {
            swal({
                title: "Gagal!",
                type: "warning",
                text: "Pilih dokter terlebih dahulu",
                confirmButtonColor: "#3cb878",
            });
        } else {

            dataString = '&harga=' + harga +
                '&id_pelayanan=' + id_pelayanan + '&id_history=' + idHis +
                '&id_list_tindakan=' + splitDiag[0] +
                '&frek=' + frek + '&total=' + total +
                '&dokter=' + dokter + '&status_pembayaran=' + status_pembayaran;
            $.ajax({
                url: "<?= base_url() . 'Apelkes/insert_tindakan' ?>",
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
                        reload_data_tindakan(id_pelayanan);
                        reload_total_harga(id_pelayanan);

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
</script>

<script type="text/javascript">
    function pilihTindakan(elem) {
        $dokter = $("#kodedpjp").val();
        a = elem.value;
        splitDiag = a.split("|");
        // alert(splitDiag[1]);

        hargaSarana = parseFloat(splitDiag[1]);
        hargaJasa = parseFloat(splitDiag[2]);
        harga = hargaSarana + hargaJasa;
        $("#outBiayaTindakan").val(convertToRupiah(harga));
        $("#inBiayaTindakan").val((harga));
        document.getElementById("inJumlah").value = "1";
        document.getElementById("outTotal").value = convertToRupiah(harga);
        if (hargaJasa == 0) {
            $("#inDPJP").val('-').change();
        } else {
            $("#inDPJP").val($dokter).change();
        }
    }

    function pilihTindakanLabor(elem) {
        a = elem.value;
        splitDiag = a.split("|");
        // alert(splitDiag[1]);

        harga = parseFloat(splitDiag[1]);
        $("#outBiayaTindakanLabor").val(convertToRupiah(harga));
        document.getElementById("inJumlahLabor").value = "1";
        document.getElementById("outTotalLabor").value = convertToRupiah(harga);
    }

    function pilihTindakanRadiologi(elem) {
        a = elem.value;
        splitDiag = a.split("|");
        // alert(splitDiag[1]);

        harga = parseFloat(splitDiag[1]);
        $("#outBiayaTindakanRadiologi").val(convertToRupiah(harga));
        document.getElementById("inJumlahRadiologi").value = "1";
        document.getElementById("outTotalRadiologi").value = convertToRupiah(harga);
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
        // alert(splitDiag[1]);

        hargaSarana = parseFloat(splitDiag[1]);
        hargaJasa = parseFloat(splitDiag[2]);
        harga = hargaSarana + hargaJasa;
        frek = parseFloat($("#inJumlah").val());
        total = harga * frek;


        $("#outTotal").val(convertToRupiah(total));

    }
</script>
<!-- Obat ruang -->
<script type="text/javascript">
    function obat_ruang(id_pelayanan, id_history) {
        $("#inPelObat").val(id_pelayanan);
        $("#inHisObat").val(id_history);
        $("#modal_obat_ruang").modal('show');
        reload_data_obatR(id_pelayanan);
        reload_data_total1(id_pelayanan);
    }

    function insert_ObatR() {
        id_pelayanan = $('#inPelObat').val();
        id_history = $('#inHisObat').val();
        a = $("#inObatRuang").val();
        splitDiag = a.split("|");
        margin = parseFloat(splitDiag[2]);
        ket = $("#inKeteranganObatR").val();
        id_list_tindakan = splitDiag[0];
        ppn = parseFloat(splitDiag[1]) * (parseFloat(splitDiag[5]) / 100);
        harga = parseFloat(splitDiag[1]) + ppn;
        hargaMargin = harga * parseFloat(splitDiag[2]);

        frek = parseFloat($("#inJumlahObatR").val());
        disc = parseFloat($("#inDiscR").val());
        expire = (splitDiag[3]);
        jumlahKurang = frek * -1;


        total = hargaMargin * frek * (1 - (disc * 0.01));

        signa = $('#inSignaR').val();
        cara_pakai = $('#inCaraPakaiR').val();

        $.ajax({
            url: "<?= base_url() . 'Rawatinap/insert_obatR' ?>",
            method: "POST",
            dataType: 'json',
            cache: false,
            data: {
                id_pelayanan: id_pelayanan,
                id_history: id_history,
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

                    $.toast({
                        heading: 'Success!',
                        text: 'Tindakan ini telah ditambah',
                        showHideTransition: 'fade',
                        icon: 'success'
                    })

                    $('#tableobatR').DataTable().ajax.reload();
                    $('#outTotalHarga1').DataTable().ajax.reload();
                    // reload_data_total1(id_pelayanan)
                    $('#inObatR').val('-').change();
                    $('#inTglExpR').empty().trigger('change');
                    $("#inJumlahObatR").val('1');
                    $("#inDiscR").val(0);
                    $("#outBiayaTindakanObatR").val('');
                    $("#outBiayaMarginObatR").val('');
                    $("#outStokR").val('0');
                    $("#outTotalObatR").val('');
                    $('#inSignaR').val(signa).change();
                    $('#inCaraPakaiR').val(cara_pakai).change();
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

    function cetak_resep() {
        id_pel = $('#inPelObat').val();
        id_his = $('#inHisObat').val();
        window.open('<?php echo base_url('Rawatinap/print_resep/'); ?>' + id_pel + '/' + id_his);
    }

    function setHarga1() {

        // caraBayar = $('#cara_bayar').val();

        obat = $('#inObatRuang').val();
        splitDiag = obat.split("|");
        stok = (splitDiag[4]);

        $("#outStokR").val(stok);

        ppn = parseFloat(splitDiag[1]) * (parseFloat(splitDiag[5]) / 100);
        harga = parseFloat(splitDiag[1]) + ppn;
        hargaMargin = harga * parseFloat(splitDiag[2]);
        $("#outBiayaTindakanObatR").val(convertToRupiah(harga.toFixed(0)));
        $("#outBiayaMarginObatR").val(convertToRupiah(hargaMargin.toFixed(0)));

        frek = parseFloat($("#inJumlahObatR").val());
        if (frek > stok) {
            $("#inJumlahObatR").val(stok);
        } else if (frek < 0) {
            $("#inJumlahObatR").val(1);
        }


        disc = parseFloat($("#inDiscR").val());

        // if (document.getElementById('inRadioCost').checked) {
        //     total = harga * frek * (1 - (disc * 0.01));
        // } else {
        total = hargaMargin * frek * (1 - (disc * 0.01));
        // }

        $("#outTotalObatR").val(convertToRupiah(total.toFixed(0)));

    }
    $('#inObatRuang').change(function() {
        obat = $('#inObatRuang').val();
        splitDiag = obat.split("|");
        tgl = splitDiag[3];
        $('#inTglExpR').val(tgl);
        stok = splitDiag[4];
        $("#outStokR").val(stok);
    });

    function reload_data_obatR(id_resep) {
        $('#tableobatR').dataTable().fnClearTable();
        $('#tableobatR').dataTable().fnDestroy();
        $('#tableobatR').DataTable({
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
                "url": '<?php echo base_url('Rawatinap/tampil_obat'); ?>',
                "type": 'POST',
                "data": {
                    id_pelayanan: id_resep,
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

    function hapus_obat1(id) {
        swal({
            title: "Apakah kamu yakin?",
            text: "Menghapus obat ini?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3cb878",
            confirmButtonText: "Yakin",
            cancelButtonText: "Batal",
            closeOnConfirm: false
        }, function() {
            $().ready(function() {
                $.ajax({
                    url: "<?php echo base_url() ?>Rawatinap/hapus_obat1",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        id: id,
                    },
                    success: function(data) {
                        if (data.status == "success") {
                            $('#tableobatR').DataTable().ajax.reload();
                            $('#outTotalHarga1').DataTable().ajax.reload();

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

    function reload_data_total1(id_pelayanan) {
        $('#outTotalHarga1').dataTable().fnClearTable();
        $('#outTotalHarga1').dataTable().fnDestroy();
        $('#outTotalHarga1').DataTable({
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
                "sSearch": "Cari Tindakan:",
                "sUrl": "",
                "oPaginate": {
                    "sFirst": "Pertama",
                    "sPrevious": "Sebelumnya",
                    "sNext": "Selanjutnya",
                    "sLast": "Terakhir",
                }
            },
            "ajax": {
                "url": '<?php echo base_url('Rawatinap/tampil_list_total_obat'); ?>',
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

    // FISIO

    function reload_data_fisio(id_pelayanan) {
        $('#tablefisio').dataTable().fnClearTable();
        $('#tablefisio').dataTable().fnDestroy();
        $('#tablefisio').DataTable({
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

    function tindakan_fisio(id_pelayanan, id_history) {

        $("#id_pelayanan").val(id_pelayanan);
        $("#id_history").val(id_history);
        $("#modal_fisio").modal('show');
        reload_data_fisio(id_pelayanan);

    }

    // function tindakan_fisiso(id_pelayanan, id_history) {
    // 		$.ajax({
    // 			url: "<?= base_url() . 'IGD/getdata_igd' ?>",
    // 			data: {
    // 				pelayanan: id_pelayanan,
    // 				history: id_history
    // 			},
    // 			type: 'POST',
    // 			dataType: 'json',
    // 			success: function(data) {
    // 				$("#modal_fisio").modal('show');
    // 				reload_data_fisio(id_pelayanan);
    // 				$('#id_pelayanan').val(id_pelayanan);
    // 				// if (data.status_dt == "found") {
    // 				//     // if (data.countTin == 0) {
    // 				//     // 	$("#na_radio").show();
    // 				//     // } else {
    // 				//     // 	$("#na_radio").hide();
    // 				//     // }
    // 				//     $("#id_pelayanan").val(data.data['id_pelayanan']);
    // 				//     $("#id_his_rad").val(id_history);
    // 				//     reload_data_fisio(id_pelayanan);
    // 				//     $("#modal_fisio").modal('show');

    // 				// } else {
    // 				//     alert("data tidak ditemukan");
    // 				// }
    // 			}
    // 		});
    // 	}

    function hargaTotalFisio() {
        a = $("#outTindakanFisio").val();
        splitDiag = a.split("|");
        harga_sarana = parseFloat(splitDiag[1]);
        harga_jasa = parseFloat(splitDiag[2]);
        frek = parseFloat($("#outJumlahTindakan").val());
        total = (harga + jasa) * frek

        $("#outTotalfisio").val(convertToRupiah(total));
    }

    function insert_fisio() {
        a = $("#outTindakanFisio").val();
        dokter = $("#DPJP").val();
        splitDiag = a.split("|");
        harga = parseFloat(splitDiag[1]);
        jasa = parseFloat(splitDiag[2]);
        id_pelayanan = $('#id_pelayanan').val();
        id_history = $('#id_history').val();
        frek = parseFloat($("#outJumlahTindakan").val());
        total = (jasa + harga) * frek;
        id_list_tindakan = $('#id_list_tindakan').val();
        nama = $('#nama').val();
        var ID = Math.random().toString(36).substr(2, 16);
        nama_dokter = $.trim($("#DPJP").children("option:selected").text())

        dataString = 'id=' + ID +
            '&id_pelayanan=' + id_pelayanan + '&id_list_tindakan=' + splitDiag[0] +
            '&frek=' + frek + '&dokter=' + dokter + '&total=' + total + '&nama_tindakan=' + splitDiag[3] +
            '&id_history=' + id_history + '&jenis_pelayanan=' + 'RAWAT INAP' + '&nama_dokter=' + nama_dokter;
        $.ajax({
            url: "<?= base_url() . 'Poli/insert_fisio' ?>",
            method: "POST",
            dataType: 'json',
            data: dataString,
            success: function(data) {
                if (data.status == "success") {
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Tindakan ini Telah di Simpan!",
                        confirmButtonColor: "#3cb878",
                    });
                    $('#outTindakanFisio').val('');
                    $('#outJumlahTindakan').val('');
                    $('#outTotalfisio').val('');
                    // $('#tablefisio').DataTable().ajax.reload();
                    reload_data_fisio(id_pelayanan);
                    // $('#outTotalfisio').DataTable().ajax.reload();
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

    function pilihTindakanFisio() {
        a = $("#outTindakanFisio").val();
        splitDiag = a.split("|");

        harga = parseFloat(splitDiag[1]);
        jasa = parseFloat(splitDiag[2]);
        harga1 = harga + jasa
        total = (harga + jasa)
        document.getElementById("outJumlahTindakan").value = "1";
        document.getElementById("outBiayaTindakanFisio").value = convertToRupiah(harga1);
        document.getElementById("outTotalfisio").value = convertToRupiah(total);
    }

    function hapus_data_tindakan(id_tindakan, id_pelayanan) {
        swal({
            title: "Apakah kamu yakin?",
            text: "Menghapus data  ini?",
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
                                confirmButtonColor: "#3cb878",
                            });
                            reload_data_fisio(id_pelayanan);
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
    $(document).ready(function() {
        $.fn.modal.Constructor.prototype.enforceFocus = function() {};
    });
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
</script>