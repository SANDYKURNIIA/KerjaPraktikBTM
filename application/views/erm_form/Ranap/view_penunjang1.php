<<<<<<< HEAD
<?php
$data = $this->session->userdata('data_auth');
$izinAkses = $data->izin_akses;
?>
<!-- modal edit data -->
<div class="modal fade bs-example-modal-lg" id="modal_edit_data" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">

    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h5 class="modal-title" id="myLargeModalLabel"><i class="icon-user mr-10"></i> INFO TINDAKAN
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
                                    <label class="control-label col-md-3">KAMAR SEKARANG</label>
                                    <div class="col-md-9 has-success">

                                        <input type="text" class="form-control" disabled="" id="no_rm">
                                        <input type="hidden" class="form-control" disabled="" id="inKamarSekarang">
                                        <input type="hidden" class="form-control" disabled="" id="idHis">
                                        <input type="hidden" class="form-control" disabled="" id="idPelayanan">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">NAMA PASIEN</label>
                                    <div class="col-md-9 has-success">

                                        <input type="text" class="form-control" disabled="" id="nama">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <span class="help-block"></span>
                                    <label class="control-label col-md-3">KAMAR TUJUAN</label>
                                    <div class="col-md-9 has-success">

                                        <select class="form-control filled-input select2" placeholder="KAMAR TUJUAN" style="border: 1px solid lightgreen;" id="inKelasRuangan" name="KamarTujuan">
                                            <option value="-"> -</option>
                                            <?php
                                            foreach ($data_kamar as $row) :
                                            ?>
                                                <option value="<?php echo $row->nama; ?>">
                                                    <?php echo $row->nama; ?></option>
                                            <?php endforeach; ?>
                                            >
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">NO TEMPAT TIDUR</label>
                                    <div class="col-md-9 has-success">
                                        <select class="form-control filled-input select2" placeholder="PILIH NAMA DOKTER" style="border: 1px solid lightgreen;" id="inTempatTidur">
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button onclick="updatePindahKamar()" class="btn btn-success btn-anim  btn-sm"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
                                <button onclick="deletePindahKamar()" class="btn btn-success btn-anim  btn-sm"><i class="icon-rocket"></i><span class="btn-text">BATAL PINDAH</span>
                        </div>
                        <div class="modal-body mt-30">
                            <h6 class="txt-dark capitalize-font pl-20"><i class="icon-list mr-10"></i>DATA KAMAR</h6>
                            <hr width="95%">
                            <div class="table-wrap" style="width: 100%; margin: auto ">
                                <div class="table-responsive">
                                    <table class="table table-hover display  pb-60" id="tablekamar">
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
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">DEPO</label>
                                            <div class="col-md-9 has-success">
                                                <select class="form-control filled-input select2" id="inDepo">
                                                    <option value="APOTIK">APOTIK</option>
                                                    <option value="IGD">IGD</option>
                                                    <option value="RANAP">RANAP</option>
                                                </select>
                                                <!-- <span class="help-block"></span> -->
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
                                                <input type="number" class="form-control " id="inJumlahObat" placeholder="jumlah" value="1" min="1" oninput="setHarga()">
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
                                <input type="hidden" class="form-control" disabled="" id="tipe_resep">
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
                                                    <th>NAMA OBAT</th>
                                                    <th>EXPIRE DATE</th>
                                                    <th>HARGA OBAT</th>
                                                    <th>JUMLAH OBAT</th>
                                                    <th>DEPO</th>
                                                    <th>TOTAL BIAYA</th>
                                                    <th>KETERANGAN</th>
                                                    <th>SIGNA</th>
                                                    <th>CARA PAKAI</th>
                                                    <th>STAFF</th>
                                                    <th>HAPUS</th>
                                                    <th>CETAK SIGNA</th>
                                                    <!-- <th>SIGNA</th> -->
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
                            <br>
                            <br>
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
                        <h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO RESEP
                        </h6>
                        <hr width="95%">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label col-md-3">JENIS RESEP</label>
                                    <div class="col-md-9 has-success">
                                        <select class="form-control filled-input select2" style="border: 1px solid lightgreen;" tabindex="1" name="inTindakan" id="inJenisResep">
                                            <option value="1">Non Racikan</option>
                                            <option value="2">Racikan</option>
                                            <!-- <option value="3">OTT</option> -->
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
                        </div>
                        <input type="hidden" class="form-control" id="inPelResep">
                        <input type="hidden" class="form-control" id="inHisResep">
                        <span class="help-block"></span>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <button onclick="insert_resep()" class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
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
                    <div class="form-body mt-10 collapse" id="collapse_tindakan_labor">
                        <h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO TINDAKAN
                        </h6>
                        <hr width="95%">
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
                                                <option value="-"></option>
                                                <?php
                                                foreach ($tindakan_labor as $row) :
                                                    $harga = $row['harga']; ?>
                                                    <option value="<?php echo $row['id_daftar_tindakan'] . "|" . $harga . "|" .  $row['nama']; ?>">
                                                        <?php echo $row['nama']; ?></option>
                                                <?php endforeach ?>
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
                                            <?php if ($izinAkses == "admin") { ?>
                                                <th>HAPUS</th>
                                            <?php } ?>
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
                                            <?php if ($izinAkses == "admin") { ?>
                                                <th>HAPUS</th>
                                            <?php } ?>
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
                                    <th>AKSI</th>
                                    <th>EXPERTISE</th>
                                    <th>NAMA</th>
                                    <th>TANGGAL TINDAKAN</th>
                                    <th>BIAYA TINDAKAN </th>
                                    <th>JUMLAH TINDAKAN</th>
                                    <th>STAFF REQUEST</th>
                                    <th>STAFF KONFIRMASI</th>
                                    <th>GAMBAR</th>
                                    <th>KETERANGAN</th>
                                    <th>STATUS</th>
                                    <?php if ($izinAkses == "admin") { ?>
                                        <th>HAPUS</th>
                                    <?php } ?>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr class="bg-success">
                                    <th>NO</th>
                                    <th>AKSI</th>
                                    <th>EXPERTISE</th>
                                    <th>NAMA</th>
                                    <th>TANGGAL TINDAKAN</th>
                                    <th>BIAYA TINDAKAN </th>
                                    <th>JUMLAH TINDAKAN</th>
                                    <th>STAFF REQUEST</th>
                                    <th>STAFF KONFIRMASI</th>
                                    <th>GAMBAR</th>
                                    <th>KETERANGAN</th>
                                    <th>STATUS</th>
                                    <?php if ($izinAkses == "admin") { ?>
                                        <th>HAPUS</th>
                                    <?php } ?>
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


<!-- modal edit data -->
<div class="modal fade bs-example-modal-lg" id="modal_pembayaran" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">

    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h5 class="modal-title" id="myLargeModalLabel"><i class="icon-user mr-10"></i> INFO TINDAKAN
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
                <h6 class="txt-dark capitalize-font pl-20"><i class="icon-list mr-10"></i>INFO TINDAKAN</h6>
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

                                        <select class="form-control filled-input select2" placeholder="KAMAR" style="border: 1px solid lightgreen;" id="inTipeKamar" name="TipeKamar">
                                            <option value="-">
                                                -</option>
                                            <?php
                                            foreach ($data_tipe_kamar as $row) :
                                            ?>
                                                <option value="<?php echo $row->nama; ?>">
                                                    <?php echo $row->nama; ?></option>
                                            <?php endforeach; ?>
                                            >
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

<!-- obat ruangan -->
<div class="modal fade bs-example-modal-lg" id="modal_obat_ruang" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
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
                                        <table id="tableobat" class="table table-hover display pb-30 mt-10" width="100%">
                                            <thead>
                                                <tr class="bg-success">
                                                    <th>NO</th>
                                                    <th>NAMA OBAT</th>
                                                    <th>EXPIRE DATE</th>
                                                    <th>HARGA OBAT</th>
                                                    <th>JUMLAH OBAT</th>
                                                    <th>TOTAL BIAYA</th>
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
                                            <div id="cetakFarmasi" onclick="cetak_resep()" class="btn btn-success mr-10">CETAK RESEP</div>
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
                "url": '<?php echo base_url('Rawatinap/tampil_list_tindakan'); ?>',
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
                "url": '<?php echo base_url('Rawatinap/tampil_total_harga'); ?>',
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
        id_list_tindakan = $('#id_daftar_tindakan').val();
        nama = $('#nama').val();
        var ID = Math.random().toString(36).substr(2, 16);

        dataString = 'id=' + ID + '&harga=' + harga +
            '&id_pel_rad=' + id_pel_rad + '&id_list_tindakan=' + splitDiag[0] +
            '&frek=' + frek + '&total=' + total;
        $.ajax({
            url: "<?= base_url() . 'Rawatinap/insert_radiologi' ?>",
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
        $.ajax({
            url: "<?= base_url() . 'Rawatinap/get_radiologi' ?>",
            data: {
                pelayanan: id_pelayanan,
                history: id_history
            },
            type: 'POST',
            dataType: 'json',
            success: function(data) {
                if (data.status_dt == "found") {
                    $("#id_pel_rad").val(data.id_pelayanan);
                    $("#modal_radiologi").modal('show');
                    reload_data_radiologi(id_pelayanan);
                    reload_total_radiologi(id_pelayanan);
                } else {
                    alert("data tidak ditemukan");
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
        $("#collapse_tindakan_labor").collapse('toggle');
        reload_data_labor(id);
        reload_total_labor(id);
    }

    function show_form() {
        $("#collapse_form_labor").collapse('toggle');
    }

    function insert_labor() {
        a = $("#outTipeKamarLabor").val();
        //splitDiag = a.split("|");
        harga = parseFloat(splitDiag[1]);
        frek = parseFloat($("#inJumlahLabor").val());
        total = harga * frek;
        id_pel_lab = $('#id_pel_lab').val();
        id_form_lab = $('#id_form_lab').val();
        id_list_tindakan = $('#id_daftar_tindakan').val();
        nama = $('#nama').val();
        var ID = Math.random().toString(36).substr(2, 16);

        dataString = 'id=' + ID + '&harga=' + harga +
            '&id_pel_lab=' + id_pel_lab + '&id_list_tindakan=' + splitDiag[0] +
            '&frek=' + frek + '&total=' + total + '&id_form_lab=' + id_form_lab;
        $.ajax({
            url: "<?= base_url() . 'Rawatinap/insert_labor' ?>",
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
                    $('#outBiayaTindakanLabor').val('');
                    $('#inJumlahLabor').val('');
                    $('#outTotalLabor').val('');
                    $('#tablelabor').DataTable().ajax.reload();
                    $('#outTotalHargaLabor').DataTable().ajax.reload();
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
        $("#modal_labor").modal('show');
        reload_data_form_labor(id_pelayanan);


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
        $("#modal_edit_resep").modal('show');
        $("#collap_nonracikan").collapse('hide');
        $("#collap_racikan").collapse('hide');
        reload_data_resep(idPel, idHis);
    }

    function pilih_obat(idResep, tipe, cara_bayar, id_pelayanan) {
        if (tipe == 2) {
            $('#form_racikan').show();
            $('#inResObat').val(idResep);
            $("#collap_racikan").collapse('toggle');
            $("#collap_nonracikan").collapse('hide');
            reload_total_obat(idResep);
            reload_data_racikan(idResep);
        } else if (tipe == 4) {
            $('#cara_bayar').val(cara_bayar);
            $('#tipe_resep').val(tipe);
            $('#inResObat2').val(idResep);
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
            $("#collap_nonracikan").collapse('toggle');
            $("#collap_racikan").collapse('hide');
            reload_total_obat(idResep);
            reload_data_obat(idResep);
        }
    }

    function pilih_obat1(idResep, tipe, cara_bayar, id_pelayanan) {
        if (tipe == 2) {
            $('#form_racikan').hide();
            $('#inResObat').val(idResep);
            $("#collap_racikan").collapse('toggle');
            $("#collap_nonracikan").collapse('hide');
            reload_total_obat(idResep);
            reload_data_racikan(idResep);
        } else if (tipe == 4) {
            $('#cara_bayar').val(cara_bayar);
            $('#tipe_resep').val(tipe);
            $('#inResObat2').val(idResep);
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

    function insert_resep() {
        jenis_resep = $('#inJenisResep').val();
        nama_resep = $('#inNamaResep').val();
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
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Tindakan ini Telah di Simpan!",
                        confirmButtonColor: "#3cb878",
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
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Tindakan ini Telah di Simpan!",
                        confirmButtonColor: "#3cb878",
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
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Tindakan ini Telah di Simpan!",
                        confirmButtonColor: "#3cb878",
                    });

                    $('#inResep').val('');
                    $('#inSigna1').val('');
                    $('#inCaraPakai1').val('');
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
            url: "<?= base_url() . 'Rawatinap/insert_obat' ?>",
            method: "POST",
            dataType: 'json',
            cache: true,
            data: {
                id_pelayanan: id_pelayanan,
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
                    $('#formObat')[0].reset();
                    $("#collap_nonracikan").collapse('show');
                    $("#collap_racikan").collapse('hide');
                    $('#tableobat').DataTable().ajax.reload();
                    $('#inDepo').val('RANAP').change();
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
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Tindakan ini Telah di Simpan!",
                        confirmButtonColor: "#3cb878",
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
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Tindakan ini Telah di Simpan!",
                        confirmButtonColor: "#3cb878",
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
    $(document).ready(function() {
        $('#inDepo').change(function() {

            var depo = $('#inDepo').val();
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
        });
        $('#inObat').change(function() {
            obat = $('#inObat').val();
            splitDiag = obat.split("|");
            tgl = splitDiag[3];
            $('#inTglExp').val(tgl);
            stok = splitDiag[4];
            $("#outStok").val(stok);
        });
    });

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
        // if ((caraBayar == "WA14BJ84" && tipe == "1") || (caraBayar == "WA14BJ84" && tipe == "2")) {
        //     total = harga * frek;
        // } else if (caraBayar == "WA14BJ84" && tipe == "3") {
        //     total = (harga * (parseFloat(splitDiag[2]) - (disc / 100))) * frek;
        // } else {
        total = (harga * (parseFloat(splitDiag[2]) - (disc / 100))) * frek;
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

    function pindah_kamar(id_pelayanan, id_history) {
        $.ajax({
            url: "<?= base_url() . 'Rawatinap/getdKamarById' ?>",
            data: {
                pelayanan: id_pelayanan,
                history: id_history
            },
            type: 'POST',
            dataType: 'json',
            success: function(data) {
                if (data.status_dt == "found") {
                    //disini set datanya ke modal
                    $("#tipe_masuk").val(data.jenis_pelayanan);
                    $("#no_rm").val(data.poli);
                    $("#inKamarSekarang").val(data.id_kamar);
                    $("#nama").val(data.nama);
                    $("#inTanggalKunjugan").val(data.tgl_masuk);
                    $("#idPelayanan").val(data.id_pelayanan);
                    $("#idHis").val(data.id_history);
                    $("#inNoSEP").val(data.no_sep);
                    $("#inDiagnosa").val(data.diagnosa);
                    $("#inTempatTidur").val(data.dpjp).change();
                    $("#inKelasRuangan").val(data.nama_poli).change();
                    $("#NamaPasien").val(data.nama).change();
                    $("#inAsalPasien").val(data.asal_pasien).change();
                    $("#inCaraBayar").val(data.id_cara_bayar).change();
                    $("#modal_edit_data").modal('show');

                    reload_data_kamar(id_pelayanan);
                } else {
                    alert("data tidak ditemukan");
                }
            }
        });
    }
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#inKelasRuangan').change(function() {
            var kelas_ruangan = $('#inKelasRuangan').val();

            $.ajax({
                url: "<?php echo base_url(); ?>Rawatinap/getTempatTidur",
                method: "POST",
                data: {
                    kelas_ruangan: kelas_ruangan
                },
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    var i;
                    html += '<option value=' + '-' + '>' + '-' + '</option>';
                    for (i = 0; i < data.length; i++) {
                        html += '<option value=' + data[i].id_ruangan + '>' + data[i].tipe + '</option>';
                    }
                    $('#inTempatTidur').html(html);
                }
            });

        });
    });
</script>
<script type="text/javascript">
    function reload_data_kamar(idPelayanan) {
        $('#tablekamar').dataTable().fnClearTable();
        $('#tablekamar').dataTable().fnDestroy();
        $('#tablekamar').DataTable({
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
                "url": '<?php echo base_url('Rawatinap/tampil_list_kamar'); ?>',
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
</script>

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
                "sSearch": "Cari:",
                "sUrl": "",
                "oPaginate": {
                    "sFirst": "Pertama",
                    "sPrevious": "Sebelumnya",
                    "sNext": "Selanjutnya",
                    "sLast": "Terakhir"
                },

            },
            "ajax": '<?php echo base_url('Rawatinap/tampil_data_ranap'); ?>',
            "deferRender": true,
            "processing": true,
            "order": [],
            "columnDefs": [{
                "targets": [0],
                "orderable": false,
            }, ],

        });
    });
</script>

<script type="text/javascript">
    function updatePindahKamar() {
        kamarSekarang = $("#inKamarSekarang").val();
        kamarBaru = $("#inTempatTidur").val();
        kelas = $("#inKelasRuangan").val();
        idHis = $("#idHis").val();

        idPelayanan = $("#idPelayanan").val();

        dataString = 'kamarSekarang=' + kamarSekarang + '&kamarBaru=' + kamarBaru +
            '&idHis=' + idHis + '&idPelayanan=' + idPelayanan;
        // 		  alert(dataString);
        if (kamarBaru == "undefined" || kelas == "-") {
            swal({
                title: "PILIH KAMAR DAHULU!",
                type: "warning",

                confirmButtonColor: "#3cb878",
            });
        } else if (kamarBaru == "-") {
            swal({
                title: "PILIH NOMOR BED DAHULU!",
                type: "warning",

                confirmButtonColor: "#3cb878",
            });
        } else {
            $.ajax({
                type: "POST",
                url: "<?= base_url() . 'Rawatinap/updatePindahKamar' ?>",
                data: dataString,
                success: function(data) {
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Tindakan ini Telah di Simpan!",
                        confirmButtonColor: "#3cb878",
                    });
                    pindah_kamar(idPelayanan, idHis)
                    reload_data_kamar(idPelayanan);
                }
            });
        }



    }

    function deletePindahKamar() {
        kamarSekarang = $("#inKamarSekarang").val();
        kamarBaru = $("#inTempatTidur").val();
        kelas = $("#inKelasRuangan").val();
        idHis = $("#idHis").val();

        idPelayanan = $("#idPelayanan").val();

        dataString = 'kamarSekarang=' + kamarSekarang + '&kamarBaru=' + kamarBaru +
            '&idHis=' + idHis + '&idPelayanan=' + idPelayanan;
        // 		  alert(dataString);

        $.ajax({
            type: "POST",
            url: "<?= base_url() . 'Rawatinap/deletePindahKamar' ?>",
            // url: "controller/updatePindahKamar.php",
            data: dataString,
            success: function(data) {
                swal({
                    title: "good job!",
                    type: "success",
                    text: "Tindakan ini Telah di Simpan!",
                    confirmButtonColor: "#3cb878",
                });
                pindah_kamar(idPelayanan, idHis)
                reload_data_kamar(idPelayanan);
            }
        });
    }
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
                    $("#outTipeKamar").val(data.dpjp).change();
                    $("#inTipeKamar").val(data.nama_poli).change();
                    $("#NamaPasien").val(data.nama).change();
                    $("#inAsalPasien").val(data.asal_pasien).change();
                    $("#inCaraBayar").val(data.id_cara_bayar).change();
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
    $(document).ready(function() {
        $('#inTipeKamar').change(function() {
            var tipe_kamar = $('#inTipeKamar').val();

            $.ajax({
                url: "<?php echo base_url(); ?>Apelkes/getTindakanByTipeKamar",
                method: "POST",
                data: {
                    tipe_kamar: tipe_kamar
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

    $(document).ready(function() {
        $('#inTipeKamarlabor').change(function() {
            var tipe_kamar = $('#inTipeKamarlabor').val();

            $.ajax({
                url: "<?php echo base_url(); ?>Apelkes/getTindakanByTipeKamarLabor",
                method: "POST",
                data: {
                    tipe_kamar: tipe_kamar
                },
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    var i;
                    html += '<option value=' + '-' + '>' + '-' + '</option>';
                    for (i = 0; i < data.length; i++) {
                        html += '<option value=' + data[i].id_daftar_tindakan + '|' + data[i].harga + '>' + data[i].nama + '</option>';
                    }
                    $('#outTipeKamarlabor').html(html);
                }
            });

        });
    });
    $(document).ready(function() {
        $('#inTipeKamarRadiologi').change(function() {
            var tipe_kamar = $('#inTipeKamarRadiologi').val();

            $.ajax({
                url: "<?php echo base_url(); ?>Apelkes/getTindakanByTipeKamarRadiologi",
                method: "POST",
                data: {
                    tipe_kamar: tipe_kamar
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

    function hapus_data_tindakan(id_tindakan_apelkes, id_pelayanan) {
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

    function insert_tindakan() {
        a = $("#outTipeKamar").val();
        dokter = $("#inDPJP").val();
        splitDiag = a.split("|");
        hargaSarana = parseFloat(splitDiag[1]);
        hargaJasa = parseFloat(splitDiag[2]);
        harga = hargaSarana + hargaJasa;
        frek = parseFloat($("#inJumlah").val());
        total = harga * frek;

        id_pelayanan = $('#idPelayanan').val();
        id_list_tindakan = $('#outTipeKamar').val();

        dataString = '&harga=' + harga +
            '&id_pelayanan=' + id_pelayanan + '&id_list_tindakan=' + splitDiag[0] +
            '&frek=' + frek + '&total=' + total +
            '&dokter=' + dokter;
        $.ajax({
            url: "<?= base_url() . 'Apelkes/insert_tindakan' ?>",
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
</script>

<script type="text/javascript">
    function pilihTindakan(elem) {
        a = elem.value;
        splitDiag = a.split("|");
        // alert(splitDiag[1]);

        hargaSarana = parseFloat(splitDiag[1]);
        hargaJasa = parseFloat(splitDiag[2]);
        harga = hargaSarana + hargaJasa;
        $("#outBiayaTindakan").val(convertToRupiah(harga));
        document.getElementById("inJumlah").value = "1";
        document.getElementById("outTotal").value = convertToRupiah(harga);
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

        signa = $('#inSigna').val();
        cara_pakai = $('#inCaraPakai').val();

        $.ajax({
            url: "<?= base_url() . 'Rawatinap/insert_obatR' ?>",
            method: "POST",
            dataType: 'json',
            cache: false,
            data: {
                id_pelayanan: id_pelayanan,
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
                    $('#outtotalharga1').DataTable().ajax.reload();
                    reload_data_totalR(id_pelayanan);
                    $('#inObatR').val('-').change();
                    $('#inTglExpR').empty().trigger('change');
                    $("#inJumlahObatR").val('1');
                    $("#inDiscR").val(0);
                    $("#outBiayaTindakanObatR").val('');
                    $("#outBiayaMarginObatR").val('');
                    $("#outStokR").val('0');
                    $("#outTotalObatR").val('');
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
                "url": '<?php echo base_url('IGD/tampil_obat'); ?>',
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
                            $('#outtotalharga1').DataTable().ajax.reload();

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
                "url": '<?php echo base_url('IGD/tampil_list_total_obat'); ?>',
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
=======
<?php
$data = $this->session->userdata('data_auth');
$izinAkses = $data->izin_akses;
?>
<!-- modal edit data -->
<div class="modal fade bs-example-modal-lg" id="modal_edit_data" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">

    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h5 class="modal-title" id="myLargeModalLabel"><i class="icon-user mr-10"></i> INFO TINDAKAN
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
                                    <label class="control-label col-md-3">KAMAR SEKARANG</label>
                                    <div class="col-md-9 has-success">

                                        <input type="text" class="form-control" disabled="" id="no_rm">
                                        <input type="hidden" class="form-control" disabled="" id="inKamarSekarang">
                                        <input type="hidden" class="form-control" disabled="" id="idHis">
                                        <input type="hidden" class="form-control" disabled="" id="idPelayanan">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">NAMA PASIEN</label>
                                    <div class="col-md-9 has-success">

                                        <input type="text" class="form-control" disabled="" id="nama">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <span class="help-block"></span>
                                    <label class="control-label col-md-3">KAMAR TUJUAN</label>
                                    <div class="col-md-9 has-success">

                                        <select class="form-control filled-input select2" placeholder="KAMAR TUJUAN" style="border: 1px solid lightgreen;" id="inKelasRuangan" name="KamarTujuan">
                                            <option value="-"> -</option>
                                            <?php
                                            foreach ($data_kamar as $row) :
                                            ?>
                                                <option value="<?php echo $row->nama; ?>">
                                                    <?php echo $row->nama; ?></option>
                                            <?php endforeach; ?>
                                            >
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">NO TEMPAT TIDUR</label>
                                    <div class="col-md-9 has-success">
                                        <select class="form-control filled-input select2" placeholder="PILIH NAMA DOKTER" style="border: 1px solid lightgreen;" id="inTempatTidur">
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button onclick="updatePindahKamar()" class="btn btn-success btn-anim  btn-sm"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
                                <button onclick="deletePindahKamar()" class="btn btn-success btn-anim  btn-sm"><i class="icon-rocket"></i><span class="btn-text">BATAL PINDAH</span>
                        </div>
                        <div class="modal-body mt-30">
                            <h6 class="txt-dark capitalize-font pl-20"><i class="icon-list mr-10"></i>DATA KAMAR</h6>
                            <hr width="95%">
                            <div class="table-wrap" style="width: 100%; margin: auto ">
                                <div class="table-responsive">
                                    <table class="table table-hover display  pb-60" id="tablekamar">
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
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">DEPO</label>
                                            <div class="col-md-9 has-success">
                                                <select class="form-control filled-input select2" id="inDepo">
                                                    <option value="APOTIK">APOTIK</option>
                                                    <option value="IGD">IGD</option>
                                                    <option value="RANAP">RANAP</option>
                                                </select>
                                                <!-- <span class="help-block"></span> -->
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
                                                <input type="number" class="form-control " id="inJumlahObat" placeholder="jumlah" value="1" min="1" oninput="setHarga()">
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
                                <input type="hidden" class="form-control" disabled="" id="tipe_resep">
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
                                                    <th>NAMA OBAT</th>
                                                    <th>EXPIRE DATE</th>
                                                    <th>HARGA OBAT</th>
                                                    <th>JUMLAH OBAT</th>
                                                    <th>DEPO</th>
                                                    <th>TOTAL BIAYA</th>
                                                    <th>KETERANGAN</th>
                                                    <th>SIGNA</th>
                                                    <th>CARA PAKAI</th>
                                                    <th>STAFF</th>
                                                    <th>HAPUS</th>
                                                    <th>CETAK SIGNA</th>
                                                    <!-- <th>SIGNA</th> -->
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
                            <br>
                            <br>
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
                        <h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO RESEP
                        </h6>
                        <hr width="95%">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label col-md-3">JENIS RESEP</label>
                                    <div class="col-md-9 has-success">
                                        <select class="form-control filled-input select2" style="border: 1px solid lightgreen;" tabindex="1" name="inTindakan" id="inJenisResep">
                                            <option value="1">Non Racikan</option>
                                            <option value="2">Racikan</option>
                                            <!-- <option value="3">OTT</option> -->
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
                        </div>
                        <input type="hidden" class="form-control" id="inPelResep">
                        <input type="hidden" class="form-control" id="inHisResep">
                        <span class="help-block"></span>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <button onclick="insert_resep()" class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
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
                    <div class="form-body mt-10 collapse" id="collapse_tindakan_labor">
                        <h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO TINDAKAN
                        </h6>
                        <hr width="95%">
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
                                                <option value="-"></option>
                                                <?php
                                                foreach ($tindakan_labor as $row) :
                                                    $harga = $row['harga']; ?>
                                                    <option value="<?php echo $row['id_daftar_tindakan'] . "|" . $harga . "|" .  $row['nama']; ?>">
                                                        <?php echo $row['nama']; ?></option>
                                                <?php endforeach ?>
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
                                            <?php if ($izinAkses == "admin") { ?>
                                                <th>HAPUS</th>
                                            <?php } ?>
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
                                            <?php if ($izinAkses == "admin") { ?>
                                                <th>HAPUS</th>
                                            <?php } ?>
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
                                    <th>AKSI</th>
                                    <th>EXPERTISE</th>
                                    <th>NAMA</th>
                                    <th>TANGGAL TINDAKAN</th>
                                    <th>BIAYA TINDAKAN </th>
                                    <th>JUMLAH TINDAKAN</th>
                                    <th>STAFF REQUEST</th>
                                    <th>STAFF KONFIRMASI</th>
                                    <th>GAMBAR</th>
                                    <th>KETERANGAN</th>
                                    <th>STATUS</th>
                                    <?php if ($izinAkses == "admin") { ?>
                                        <th>HAPUS</th>
                                    <?php } ?>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr class="bg-success">
                                    <th>NO</th>
                                    <th>AKSI</th>
                                    <th>EXPERTISE</th>
                                    <th>NAMA</th>
                                    <th>TANGGAL TINDAKAN</th>
                                    <th>BIAYA TINDAKAN </th>
                                    <th>JUMLAH TINDAKAN</th>
                                    <th>STAFF REQUEST</th>
                                    <th>STAFF KONFIRMASI</th>
                                    <th>GAMBAR</th>
                                    <th>KETERANGAN</th>
                                    <th>STATUS</th>
                                    <?php if ($izinAkses == "admin") { ?>
                                        <th>HAPUS</th>
                                    <?php } ?>
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


<!-- modal edit data -->
<div class="modal fade bs-example-modal-lg" id="modal_pembayaran" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">

    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h5 class="modal-title" id="myLargeModalLabel"><i class="icon-user mr-10"></i> INFO TINDAKAN
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
                <h6 class="txt-dark capitalize-font pl-20"><i class="icon-list mr-10"></i>INFO TINDAKAN</h6>
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

                                        <select class="form-control filled-input select2" placeholder="KAMAR" style="border: 1px solid lightgreen;" id="inTipeKamar" name="TipeKamar">
                                            <option value="-">
                                                -</option>
                                            <?php
                                            foreach ($data_tipe_kamar as $row) :
                                            ?>
                                                <option value="<?php echo $row->nama; ?>">
                                                    <?php echo $row->nama; ?></option>
                                            <?php endforeach; ?>
                                            >
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

<!-- obat ruangan -->
<div class="modal fade bs-example-modal-lg" id="modal_obat_ruang" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
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
                                        <table id="tableobat" class="table table-hover display pb-30 mt-10" width="100%">
                                            <thead>
                                                <tr class="bg-success">
                                                    <th>NO</th>
                                                    <th>NAMA OBAT</th>
                                                    <th>EXPIRE DATE</th>
                                                    <th>HARGA OBAT</th>
                                                    <th>JUMLAH OBAT</th>
                                                    <th>TOTAL BIAYA</th>
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
                                            <div id="cetakFarmasi" onclick="cetak_resep()" class="btn btn-success mr-10">CETAK RESEP</div>
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
                "url": '<?php echo base_url('Rawatinap/tampil_list_tindakan'); ?>',
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
                "url": '<?php echo base_url('Rawatinap/tampil_total_harga'); ?>',
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
        id_list_tindakan = $('#id_daftar_tindakan').val();
        nama = $('#nama').val();
        var ID = Math.random().toString(36).substr(2, 16);

        dataString = 'id=' + ID + '&harga=' + harga +
            '&id_pel_rad=' + id_pel_rad + '&id_list_tindakan=' + splitDiag[0] +
            '&frek=' + frek + '&total=' + total;
        $.ajax({
            url: "<?= base_url() . 'Rawatinap/insert_radiologi' ?>",
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
        $.ajax({
            url: "<?= base_url() . 'Rawatinap/get_radiologi' ?>",
            data: {
                pelayanan: id_pelayanan,
                history: id_history
            },
            type: 'POST',
            dataType: 'json',
            success: function(data) {
                if (data.status_dt == "found") {
                    $("#id_pel_rad").val(data.id_pelayanan);
                    $("#modal_radiologi").modal('show');
                    reload_data_radiologi(id_pelayanan);
                    reload_total_radiologi(id_pelayanan);
                } else {
                    alert("data tidak ditemukan");
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
        $("#collapse_tindakan_labor").collapse('toggle');
        reload_data_labor(id);
        reload_total_labor(id);
    }

    function show_form() {
        $("#collapse_form_labor").collapse('toggle');
    }

    function insert_labor() {
        a = $("#outTipeKamarLabor").val();
        //splitDiag = a.split("|");
        harga = parseFloat(splitDiag[1]);
        frek = parseFloat($("#inJumlahLabor").val());
        total = harga * frek;
        id_pel_lab = $('#id_pel_lab').val();
        id_form_lab = $('#id_form_lab').val();
        id_list_tindakan = $('#id_daftar_tindakan').val();
        nama = $('#nama').val();
        var ID = Math.random().toString(36).substr(2, 16);

        dataString = 'id=' + ID + '&harga=' + harga +
            '&id_pel_lab=' + id_pel_lab + '&id_list_tindakan=' + splitDiag[0] +
            '&frek=' + frek + '&total=' + total + '&id_form_lab=' + id_form_lab;
        $.ajax({
            url: "<?= base_url() . 'Rawatinap/insert_labor' ?>",
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
                    $('#outBiayaTindakanLabor').val('');
                    $('#inJumlahLabor').val('');
                    $('#outTotalLabor').val('');
                    $('#tablelabor').DataTable().ajax.reload();
                    $('#outTotalHargaLabor').DataTable().ajax.reload();
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
        $("#modal_labor").modal('show');
        reload_data_form_labor(id_pelayanan);


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
        $("#modal_edit_resep").modal('show');
        $("#collap_nonracikan").collapse('hide');
        $("#collap_racikan").collapse('hide');
        reload_data_resep(idPel, idHis);
    }

    function pilih_obat(idResep, tipe, cara_bayar, id_pelayanan) {
        if (tipe == 2) {
            $('#form_racikan').show();
            $('#inResObat').val(idResep);
            $("#collap_racikan").collapse('toggle');
            $("#collap_nonracikan").collapse('hide');
            reload_total_obat(idResep);
            reload_data_racikan(idResep);
        } else if (tipe == 4) {
            $('#cara_bayar').val(cara_bayar);
            $('#tipe_resep').val(tipe);
            $('#inResObat2').val(idResep);
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
            $("#collap_nonracikan").collapse('toggle');
            $("#collap_racikan").collapse('hide');
            reload_total_obat(idResep);
            reload_data_obat(idResep);
        }
    }

    function pilih_obat1(idResep, tipe, cara_bayar, id_pelayanan) {
        if (tipe == 2) {
            $('#form_racikan').hide();
            $('#inResObat').val(idResep);
            $("#collap_racikan").collapse('toggle');
            $("#collap_nonracikan").collapse('hide');
            reload_total_obat(idResep);
            reload_data_racikan(idResep);
        } else if (tipe == 4) {
            $('#cara_bayar').val(cara_bayar);
            $('#tipe_resep').val(tipe);
            $('#inResObat2').val(idResep);
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

    function insert_resep() {
        jenis_resep = $('#inJenisResep').val();
        nama_resep = $('#inNamaResep').val();
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
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Tindakan ini Telah di Simpan!",
                        confirmButtonColor: "#3cb878",
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
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Tindakan ini Telah di Simpan!",
                        confirmButtonColor: "#3cb878",
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
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Tindakan ini Telah di Simpan!",
                        confirmButtonColor: "#3cb878",
                    });

                    $('#inResep').val('');
                    $('#inSigna1').val('');
                    $('#inCaraPakai1').val('');
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
            url: "<?= base_url() . 'Rawatinap/insert_obat' ?>",
            method: "POST",
            dataType: 'json',
            cache: true,
            data: {
                id_pelayanan: id_pelayanan,
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
                    $('#formObat')[0].reset();
                    $("#collap_nonracikan").collapse('show');
                    $("#collap_racikan").collapse('hide');
                    $('#tableobat').DataTable().ajax.reload();
                    $('#inDepo').val('RANAP').change();
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
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Tindakan ini Telah di Simpan!",
                        confirmButtonColor: "#3cb878",
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
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Tindakan ini Telah di Simpan!",
                        confirmButtonColor: "#3cb878",
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
    $(document).ready(function() {
        $('#inDepo').change(function() {

            var depo = $('#inDepo').val();
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
        });
        $('#inObat').change(function() {
            obat = $('#inObat').val();
            splitDiag = obat.split("|");
            tgl = splitDiag[3];
            $('#inTglExp').val(tgl);
            stok = splitDiag[4];
            $("#outStok").val(stok);
        });
    });

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
        // if ((caraBayar == "WA14BJ84" && tipe == "1") || (caraBayar == "WA14BJ84" && tipe == "2")) {
        //     total = harga * frek;
        // } else if (caraBayar == "WA14BJ84" && tipe == "3") {
        //     total = (harga * (parseFloat(splitDiag[2]) - (disc / 100))) * frek;
        // } else {
        total = (harga * (parseFloat(splitDiag[2]) - (disc / 100))) * frek;
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

    function pindah_kamar(id_pelayanan, id_history) {
        $.ajax({
            url: "<?= base_url() . 'Rawatinap/getdKamarById' ?>",
            data: {
                pelayanan: id_pelayanan,
                history: id_history
            },
            type: 'POST',
            dataType: 'json',
            success: function(data) {
                if (data.status_dt == "found") {
                    //disini set datanya ke modal
                    $("#tipe_masuk").val(data.jenis_pelayanan);
                    $("#no_rm").val(data.poli);
                    $("#inKamarSekarang").val(data.id_kamar);
                    $("#nama").val(data.nama);
                    $("#inTanggalKunjugan").val(data.tgl_masuk);
                    $("#idPelayanan").val(data.id_pelayanan);
                    $("#idHis").val(data.id_history);
                    $("#inNoSEP").val(data.no_sep);
                    $("#inDiagnosa").val(data.diagnosa);
                    $("#inTempatTidur").val(data.dpjp).change();
                    $("#inKelasRuangan").val(data.nama_poli).change();
                    $("#NamaPasien").val(data.nama).change();
                    $("#inAsalPasien").val(data.asal_pasien).change();
                    $("#inCaraBayar").val(data.id_cara_bayar).change();
                    $("#modal_edit_data").modal('show');

                    reload_data_kamar(id_pelayanan);
                } else {
                    alert("data tidak ditemukan");
                }
            }
        });
    }
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#inKelasRuangan').change(function() {
            var kelas_ruangan = $('#inKelasRuangan').val();

            $.ajax({
                url: "<?php echo base_url(); ?>Rawatinap/getTempatTidur",
                method: "POST",
                data: {
                    kelas_ruangan: kelas_ruangan
                },
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    var i;
                    html += '<option value=' + '-' + '>' + '-' + '</option>';
                    for (i = 0; i < data.length; i++) {
                        html += '<option value=' + data[i].id_ruangan + '>' + data[i].tipe + '</option>';
                    }
                    $('#inTempatTidur').html(html);
                }
            });

        });
    });
</script>
<script type="text/javascript">
    function reload_data_kamar(idPelayanan) {
        $('#tablekamar').dataTable().fnClearTable();
        $('#tablekamar').dataTable().fnDestroy();
        $('#tablekamar').DataTable({
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
                "url": '<?php echo base_url('Rawatinap/tampil_list_kamar'); ?>',
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
</script>

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
                "sSearch": "Cari:",
                "sUrl": "",
                "oPaginate": {
                    "sFirst": "Pertama",
                    "sPrevious": "Sebelumnya",
                    "sNext": "Selanjutnya",
                    "sLast": "Terakhir"
                },

            },
            "ajax": '<?php echo base_url('Rawatinap/tampil_data_ranap'); ?>',
            "deferRender": true,
            "processing": true,
            "order": [],
            "columnDefs": [{
                "targets": [0],
                "orderable": false,
            }, ],

        });
    });
</script>

<script type="text/javascript">
    function updatePindahKamar() {
        kamarSekarang = $("#inKamarSekarang").val();
        kamarBaru = $("#inTempatTidur").val();
        kelas = $("#inKelasRuangan").val();
        idHis = $("#idHis").val();

        idPelayanan = $("#idPelayanan").val();

        dataString = 'kamarSekarang=' + kamarSekarang + '&kamarBaru=' + kamarBaru +
            '&idHis=' + idHis + '&idPelayanan=' + idPelayanan;
        // 		  alert(dataString);
        if (kamarBaru == "undefined" || kelas == "-") {
            swal({
                title: "PILIH KAMAR DAHULU!",
                type: "warning",

                confirmButtonColor: "#3cb878",
            });
        } else if (kamarBaru == "-") {
            swal({
                title: "PILIH NOMOR BED DAHULU!",
                type: "warning",

                confirmButtonColor: "#3cb878",
            });
        } else {
            $.ajax({
                type: "POST",
                url: "<?= base_url() . 'Rawatinap/updatePindahKamar' ?>",
                data: dataString,
                success: function(data) {
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Tindakan ini Telah di Simpan!",
                        confirmButtonColor: "#3cb878",
                    });
                    pindah_kamar(idPelayanan, idHis)
                    reload_data_kamar(idPelayanan);
                }
            });
        }



    }

    function deletePindahKamar() {
        kamarSekarang = $("#inKamarSekarang").val();
        kamarBaru = $("#inTempatTidur").val();
        kelas = $("#inKelasRuangan").val();
        idHis = $("#idHis").val();

        idPelayanan = $("#idPelayanan").val();

        dataString = 'kamarSekarang=' + kamarSekarang + '&kamarBaru=' + kamarBaru +
            '&idHis=' + idHis + '&idPelayanan=' + idPelayanan;
        // 		  alert(dataString);

        $.ajax({
            type: "POST",
            url: "<?= base_url() . 'Rawatinap/deletePindahKamar' ?>",
            // url: "controller/updatePindahKamar.php",
            data: dataString,
            success: function(data) {
                swal({
                    title: "good job!",
                    type: "success",
                    text: "Tindakan ini Telah di Simpan!",
                    confirmButtonColor: "#3cb878",
                });
                pindah_kamar(idPelayanan, idHis)
                reload_data_kamar(idPelayanan);
            }
        });
    }
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
                    $("#outTipeKamar").val(data.dpjp).change();
                    $("#inTipeKamar").val(data.nama_poli).change();
                    $("#NamaPasien").val(data.nama).change();
                    $("#inAsalPasien").val(data.asal_pasien).change();
                    $("#inCaraBayar").val(data.id_cara_bayar).change();
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
    $(document).ready(function() {
        $('#inTipeKamar').change(function() {
            var tipe_kamar = $('#inTipeKamar').val();

            $.ajax({
                url: "<?php echo base_url(); ?>Apelkes/getTindakanByTipeKamar",
                method: "POST",
                data: {
                    tipe_kamar: tipe_kamar
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

    $(document).ready(function() {
        $('#inTipeKamarlabor').change(function() {
            var tipe_kamar = $('#inTipeKamarlabor').val();

            $.ajax({
                url: "<?php echo base_url(); ?>Apelkes/getTindakanByTipeKamarLabor",
                method: "POST",
                data: {
                    tipe_kamar: tipe_kamar
                },
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    var i;
                    html += '<option value=' + '-' + '>' + '-' + '</option>';
                    for (i = 0; i < data.length; i++) {
                        html += '<option value=' + data[i].id_daftar_tindakan + '|' + data[i].harga + '>' + data[i].nama + '</option>';
                    }
                    $('#outTipeKamarlabor').html(html);
                }
            });

        });
    });
    $(document).ready(function() {
        $('#inTipeKamarRadiologi').change(function() {
            var tipe_kamar = $('#inTipeKamarRadiologi').val();

            $.ajax({
                url: "<?php echo base_url(); ?>Apelkes/getTindakanByTipeKamarRadiologi",
                method: "POST",
                data: {
                    tipe_kamar: tipe_kamar
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

    function hapus_data_tindakan(id_tindakan_apelkes, id_pelayanan) {
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

    function insert_tindakan() {
        a = $("#outTipeKamar").val();
        dokter = $("#inDPJP").val();
        splitDiag = a.split("|");
        hargaSarana = parseFloat(splitDiag[1]);
        hargaJasa = parseFloat(splitDiag[2]);
        harga = hargaSarana + hargaJasa;
        frek = parseFloat($("#inJumlah").val());
        total = harga * frek;

        id_pelayanan = $('#idPelayanan').val();
        id_list_tindakan = $('#outTipeKamar').val();

        dataString = '&harga=' + harga +
            '&id_pelayanan=' + id_pelayanan + '&id_list_tindakan=' + splitDiag[0] +
            '&frek=' + frek + '&total=' + total +
            '&dokter=' + dokter;
        $.ajax({
            url: "<?= base_url() . 'Apelkes/insert_tindakan' ?>",
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
</script>

<script type="text/javascript">
    function pilihTindakan(elem) {
        a = elem.value;
        splitDiag = a.split("|");
        // alert(splitDiag[1]);

        hargaSarana = parseFloat(splitDiag[1]);
        hargaJasa = parseFloat(splitDiag[2]);
        harga = hargaSarana + hargaJasa;
        $("#outBiayaTindakan").val(convertToRupiah(harga));
        document.getElementById("inJumlah").value = "1";
        document.getElementById("outTotal").value = convertToRupiah(harga);
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

        signa = $('#inSigna').val();
        cara_pakai = $('#inCaraPakai').val();

        $.ajax({
            url: "<?= base_url() . 'Rawatinap/insert_obatR' ?>",
            method: "POST",
            dataType: 'json',
            cache: false,
            data: {
                id_pelayanan: id_pelayanan,
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
                    $('#outtotalharga1').DataTable().ajax.reload();
                    reload_data_totalR(id_pelayanan);
                    $('#inObatR').val('-').change();
                    $('#inTglExpR').empty().trigger('change');
                    $("#inJumlahObatR").val('1');
                    $("#inDiscR").val(0);
                    $("#outBiayaTindakanObatR").val('');
                    $("#outBiayaMarginObatR").val('');
                    $("#outStokR").val('0');
                    $("#outTotalObatR").val('');
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
                "url": '<?php echo base_url('IGD/tampil_obat'); ?>',
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
                            $('#outtotalharga1').DataTable().ajax.reload();

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
                "url": '<?php echo base_url('IGD/tampil_list_total_obat'); ?>',
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
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
</script>