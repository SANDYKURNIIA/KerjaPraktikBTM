<<<<<<< HEAD
<!-- Row -->

<div class="panel panel-default card-view">
    <div class="panel-heading">
        <div class="pull-left">
            <h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">PASIEN RAWAT JALAN POLI <?= $poli?></span></h6>
        </div>
        <div class="clearfix"></div>

        <div class="row mt-30">

        </div>
    </div>
    <div class="panel-wrapper collapse in">
        <div class="panel-body">
            <div class="table-wrap">
                <div class="table-responsive">
                    <table id="datable" class="table table-hover display pb-30" width="100%">
                        <thead>
                            <tr class="bg-success">
                                <th>NO</th>
                                <!-- <th>CETAK DP</th>
                                <th>CETAK</th>
                                <th>EDIT</th> -->
                                <th>ERM</th>
                                <th>TANGGAL PELAYANAN</th>
                                <th>JAM PELAYANAN</th>
                                <th>NO RM</th>
                                <th>NAMA PASIEN</th>
                                <th>JENIS KELAMIN</th>
                                <th>TANGGAL LAHIR</th>
                                <th>UMUR</th>
                                <th>CARA MASUK</th>
                                <th>POLIKLINIK / RUANG</th>
                                <th>RAWAT INAP</th>
                                <th>JENIS KLAIM</th>
                                <th>DIAGNOSA</th>
                                <th>DOKTER DPJP</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr class="bg-success">
                                <th>NO</th>
                                <!-- <th>CETAK DP</th>
                                <th>CETAK</th>
                                <th>EDIT</th> -->
                                <th>ERM</th>
                                <th>TANGGAL PELAYANAN</th>
                                <th>JAM PELAYANAN</th>
                                <th>NO RM</th>
                                <th>NAMA PASIEN</th>
                                <th>JENIS KELAMIN</th>
                                <th>TANGGAL LAHIR</th>
                                <th>UMUR</th>
                                <th>CARA MASUK</th>
                                <th>POLIKLINIK / RUANG</th>
                                <th>RAWAT INAP</th>
                                <th>JENIS KLAIM</th>
                                <th>DIAGNOSA</th>
                                <th>DOKTER DPJP</th>
                            </tr>
                        </tfoot>
                    </table>
                    <span id="hasil"></span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="panel-wrapper collapse in">
    <div class="panel-body">
        <!-- sample modal content -->
        <div class="modal fade" role="dialog" id="modal_edit_kasir" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <!--modal 1-->
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
                                                                <form class="form-horizontal" action="<?php echo base_url('Kasir_poli/print_kasir_rajal') ?>" method="post" enctype="multipart/form-data" role="form">
                                                                    <input type="hidden" id="inPel" name="inPel">
                                                                    <input type="hidden" id="inHis" name="inHis">
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
                                                                            <center>
                                                                                <button onclick="simpanDetailKasir()" class="btn btn-primary btn-anim btn-rounded mr-10" type="button"><i class="icon-cloud-download"></i><span class="btn-text">SIMPAN</span></button> 
                                                                                <button class="btn btn-warning btn-rounded mr-10" type="submit" name="action" value="cetak">CETAK</button></center>


                                                                            <!-- <?php $query = "SELECT status FROM deatail_kasir WHERE " ?> -->
                                                                            <div class="data_button data_button_bayar">
                                                                                <center>
                                                                                <button class="btn btn-success btn-rounded mr-10 btn-anim" style="margin-right: 40px; margin-top: 20px;" data-toggle="collapse" aria-expanded="false" id="btnbayar" href="#tbh_distributor"><i class=" icon-arrow-down"></i><span class="btn-text">PILIH PEMBAYARAN</span></button>
                                                                            </center>

                                                                            </div>
                                                                        </div>
                                                                    </div>


                                                            </div>
                                                            <div id="tbh_distributor" class="collapse">
                                                                <h6 class="txt-dark capitalize-font"><i class="icon-user mr-10"></i>INFO PEMBAYARAN</h6>
                                                                <hr>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <div class="data_hide data_hide_opsi">
                                                                            <label class="control-label col-md-3">OPSI BAYAR</label>
                                                                            <div class="col-md-9 has-success">
                                                                                <select class="form-control filled-input select2" name="opsi_bayar" id="opsi_bayar">
                                                                                    <option value="0">Pilih Opsi Pembayaran</option>
                                                                                    <option value="tunai">Tunai</option>
                                                                                    <option value="non-tunai">Non-Tunai</option>
                                                                                    <option value="hutang">Hutang</option>
                                                                                </select>
                                                                                <span class="help-block"></span>
                                                                            </div>
                                                                        </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="data_hide data_hide_tunai">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group ">
                                                                                <label class="control-label col-md-3">TOTAL BAYAR</label>
                                                                                <div class="col-md-9  has-success">
                                                                                    <input type="number" class="form-control" autocomplete="off" id="totalbayar" name="totalbayar" value="0" disabled="">
                                                                                    <span class="help-block"></span>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="data_hide data_hide_tunai">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group ">
                                                                                <label class="control-label col-md-3">TOTAL BAYAR KESELURUHAN</label>
                                                                                <div class="col-md-9  has-success">
                                                                                    <input type="number" class="form-control" autocomplete="off" id="totalkeseluruhan" name="totalkeseluruhan" value="0" disabled="">
                                                                                    <span class="help-block"></span>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <button onclick="tampilHarga()" class="btn btn-success btn-sm" type="button"><span class="btn-text">TAMPIL HARGA</span></button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="data_hide data_hide_tunai">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group ">
                                                                                <label class="control-label col-md-3">HARGA BAYAR</label>
                                                                                <div class="col-md-9  has-success">
                                                                                    <input type="number" class="form-control" autocomplete="off" id="inBayar" name="inBayar" value="0">
                                                                                    <span class="help-block"></span>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group ">
                                                                                <label class="control-label col-md-3">HARGA PENYETARAAN</label>
                                                                                <div class="col-md-9  has-success">
                                                                                    <input type="number" class="form-control" autocomplete="off" id="setara" name="setara" value="0">
                                                                                    <span class="help-block"></span>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>


                                                                <div class="row">
                                                                    <div class="data_hide data_hide_tunai">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label class="control-label col-md-3">NAMA KARYAWAN
                                                                                </label>
                                                                                <div class="col-md-9 has-success">
                                                                                    <select class="form-control filled-input select2" placeholder="Choose a Category" id="nama_karyawanTunai" name="nama_karyawanTunai">
                                                                                        <option value="-">-</option>
                                                                                        <?php
                                                                                        foreach ($data_staff as $row) :
                                                                                        ?>
                                                                                            <option value="<?php echo $row->id_karyawan; ?>">
                                                                                                <?php echo $row->nama; ?></option>
                                                                                        <?php endforeach ?>


                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="data_hide data_hide_non-tunai">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label class="control-label col-md-3">OPSI
                                                                                    LANJUTAN
                                                                                </label>
                                                                                <div class="col-md-9 has-success">
                                                                                    <select class="form-control filled-input select2" placeholder="Choose a Category" id="opsi_lanjut" name="opsi_lanjut">
                                                                                        <option value="-">-</option>
                                                                                        <option value="transfer">TRANSFER</option>
                                                                                        <option value="asuransi">PIUTANG (ASURANSI)</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="data_lanjut data_lanjut_transfer">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label class="control-label col-md-3">JENIS
                                                                                    BANK
                                                                                </label>
                                                                                <div class="col-md-9 has-success">
                                                                                    <select class="form-control filled-input select2" placeholder="Choose a Category" id="jenis_bank" name="jenis_bank">
                                                                                        <?php
                                                                                        foreach ($data_bank as $row) :
                                                                                        ?>
                                                                                            <option value="<?php echo $row->id_bank; ?>">
                                                                                                <?php echo $row->nama_bank; ?></option>
                                                                                        <?php endforeach ?>

                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>



                                                                    <div class="data_lanjut data_lanjut_asuransi">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label class="control-label col-md-3">JENIS
                                                                                    ASURANSI
                                                                                </label>
                                                                                <div class="col-md-9 has-success">
                                                                                    <select class="form-control filled-input select2" name="jenis_asuransi" id="jenis_asuransi">
                                                                                    </select>
                                                                                    <span class="help-block"></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <div class="row">
                                                                    <div class="data_asu data_asu_aia">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label class="control-label col-md-3">OPSI BAYAR AIA</label>
                                                                                <div class="col-md-9 has-success">
                                                                                    <select class="form-control filled-input select2" name="opsi_bayar_aia" id="opsi_bayar_aia">
                                                                                        <option value="0">Pilih Opsi Pembayaran</option>
                                                                                        <option value="tunaiAIA">Tunai</option>
                                                                                        <option value="hutangAIA">Hutang</option>
                                                                                    </select>
                                                                                    <span class="help-block"></span>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="data_asu data_asu_tunaiAIA">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group ">
                                                                                <label class="control-label col-md-3">TOTAL BAYAR</label>
                                                                                <div class="col-md-9  has-success">
                                                                                    <input type="number" class="form-control" autocomplete="off" id="totalbayarAIA" name="totalbayarAIA" value="0" disabled="">
                                                                                    <span class="help-block"></span>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="data_asu data_asu_tunaiAIA">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group ">
                                                                                <label class="control-label col-md-3">TOTAL BAYAR KESELURUHAN</label>
                                                                                <div class="col-md-9  has-success">
                                                                                    <input type="number" class="form-control" autocomplete="off" id="totalkeseluruhan2" name="totalkeseluruhan" value="0" disabled="">
                                                                                    <span class="help-block"></span>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <button onclick="tampilHarga2()" class="btn btn-success btn-sm" type="button"><span class="btn-text">TAMPIL HARGA</span></button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="data_asu data_asu_tunaiAIA">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group ">
                                                                                <label class="control-label col-md-3">HARGA BAYAR</label>
                                                                                <div class="col-md-9  has-success">
                                                                                    <input type="number" class="form-control" autocomplete="off" id="inBayarAIA" name="inBayarAIA" value="0">
                                                                                    <span class="help-block"></span>

                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-6">
                                                                            <div class="form-group ">
                                                                                <label class="control-label col-md-3">HARGA PENYETARAAN</label>
                                                                                <div class="col-md-9  has-success">
                                                                                    <input type="number" class="form-control" autocomplete="off" id="setara2" name="setara2" value="0">
                                                                                    <span class="help-block"></span>

                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                    <div class="data_asu data_asu_tunaiAIAHutang">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label class="control-label col-md-3">NAMA KARYAWAN AIA
                                                                                </label>
                                                                                <div class="col-md-9 has-success">
                                                                                    <select class="form-control filled-input select2" placeholder="Choose a Category" id="nama_karyawanTunaiHutang" name="nama_karyawanTunaiHutang">
                                                                                        <option value="-">-</option>
                                                                                        <?php
                                                                                        foreach ($data_staff as $row) :
                                                                                        ?>
                                                                                            <option value="<?php echo $row->id_karyawan; ?>">
                                                                                                <?php echo $row->nama; ?></option>
                                                                                        <?php endforeach ?>

                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="data_asu data_asu_hutangAIA">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label class="control-label col-md-3">NAMA KARYAWAN HUTANG AIA
                                                                                </label>
                                                                                <div class="col-md-9 has-success">
                                                                                    <select class="form-control filled-input select2" placeholder="Choose a Category" id="nama_karyawan_hutangAIA" name="nama_karyawan_hutangAIA">
                                                                                        <option value="-">-</option>
                                                                                        <?php
                                                                                        foreach ($data_staff as $row) :
                                                                                        ?>
                                                                                            <option value="<?php echo $row->id_karyawan; ?>">
                                                                                                <?php echo $row->nama; ?></option>
                                                                                        <?php endforeach ?>


                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>

                                                                <div class="row">
                                                                    <div class="data_hide data_hide_hutang">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label class="control-label col-md-3">NAMA KARYAWAN HUTANG
                                                                                </label>
                                                                                <div class="col-md-9 has-success">
                                                                                    <select class="form-control filled-input select2" placeholder="Choose a Category" id="nama_karyawan" name="nama_karyawan">
                                                                                        <option value="-">-</option>
                                                                                        <?php
                                                                                        foreach ($data_staff as $row) :
                                                                                        ?>
                                                                                            <option value="<?php echo $row->id_karyawan; ?>">
                                                                                                <?php echo $row->nama; ?></option>
                                                                                        <?php endforeach ?>

                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <!--/span-->


                                                                <div class="row">
                                                                    <div class="col-md-12 mt-10">
                                                                        <div class="form-group pull-right pr-15">

                                                                            <button class="btn btn-success btn-anim  btn-sm btn-rounded" type="submit"><i class="icon-rocket"></i><span class="btn-text">CETAK DAN PULANG</span></button>
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
                            <!-- /.modal-dialog -->
                        </div>
                        <!--end modal-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="panel-wrapper collapse in">
    <div class="panel-body">

        <div class="modal fade" id="modal_edit_konsul" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h5 class="modal-title mt-10" id="myLargeModalLabel"><i class="icon-user mr-10"></i> EDIT DATA KONSUL
                        </h5>
                    </div>
                    <div class="modal-body">

                        <input type="hidden" id="inPelKonsul" name="inPelKonsul">
                        <input type="hidden" id="inHis" name="inHis">
                        <div class="form-body">
                            <h6 class="txt-dark capitalize-font"><i class="icon-user mr-10"></i>INFO KASIR</h6>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">BIAYA RS</label>
                                        <div class="col-md-9">
                                            <input type="number" class="form-control rounded-input" autocomplete="off" id="inBiayaRs" name="inBiayaRs" oninput='getTotalKonsul()'>
                                            <span class="help-block"></span>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">BIAYA JASA</label>
                                        <div class="col-md-9">
                                            <input type="number" class="form-control rounded-input" autocomplete="off" id="inBiayaJasa" name="inBiayaJasa" oninput='getTotalKonsul()'>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">TOTAL BIAYA</label>
                                        <div class="col-md-9">
                                            <input type="number" class="form-control rounded-input" autocomplete="off" id="inTotalBiaya" name="inTotalBiaya" disabled>
                                            <span class="help-block"></span>

                                        </div>
                                    </div>
                                </div>


                            </div>

                            <div class="row">
                                <div class="col-md-offset-3 col-md-9">
                                    <button class="btn btn-primary btn-rounded mr-10" type="submit" onclick="simpan_konsul()">SIMPAN</button>

                                </div>
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
    function getTotalKonsul() {
        biaya_rs = $('#inBiayaRs').val();
        biaya_jasa = $('#inBiayaJasa').val();
        var total = Number(biaya_rs) + Number(biaya_jasa);
        $('#inTotalBiaya').val(total);
    }

    function tampilTindakanFarmasi(id_pelayanan, id_history, id_cara_bayar, cara_bayar) {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('Kasir/getDpDisc') ?>",
            dataType: "JSON",
            data: {
                id_pelayanan: id_pelayanan,
                id_history: id_history,
            },
            success: function(data) {
                if (data.status_dt == 'found') {
                    if (data.status == 0) {
                        $('#btnbayar').hide();
                    }else{
                        $('#btnbayar').show();
                        $('.data_hide').addClass('collapse');
                        $('.data_htg').addClass('collapse');
                        $('.data_asu').addClass('collapse');
                        $('.data_asu').collapse('hide');
                        if (id_cara_bayar == 'WA14BJ84' || id_cara_bayar == 'AN48QN57' || id_cara_bayar == 'DP54CP91' || id_cara_bayar == 'JC93NV93' || id_cara_bayar == 'XR53EZ65' || id_cara_bayar == 'YF75CD88' || id_cara_bayar == 'MZ82IO20' || id_cara_bayar == 'Fagioli6969') {
                            $('#opsi_bayar').hide();
                            $('.data_lanjut_asuransi').collapse('show');
                            $('.data_asu').collapse('hide');
                            $('.data_hide').collapse('hide');
                            $('.data_lanjut_transfer').collapse('hide');
                            $('.data_penghutang').collapse('hide');
                            $('#opsi_bayar').val('non-tunai');
                            $('#opsi_lanjut').val('asuransi');
                        }else{
                            $('.data_hide_opsi').collapse('show');
                        }
                    }
                    $("#modal_edit_kasir").modal('show');
                    id_pel = $('#inPel').val(id_pelayanan);
                    $('#inHis').val(id_history);
                    $('#totalbayar').val(data.total_harga);
                    $('#totalbayarAIA').val(data.total_harga);
                    $('#jenis_asuransi').html('<option value=->-</option><option value=' + id_cara_bayar + '>' + cara_bayar + '</option>');
                    $('#inDiskon').val(data.diskon);
                    $('#inDp').val(data.dp);
                    $('#inTglKeluar').val(data.tgl_keluar);
                } else {
                    $("#modal_edit_kasir").modal('show');
                    $('#btnbayar').hide();
                    $('#inPel').val(id_pelayanan);
                    $('#inHis').val(id_history);
                    $('#totalbayar').val(0);
                    $('#totalbayarAIA').val(0);
                    ('#inDiskon').val(0);
                    $('#inDp').val(0);
                }

            }
        });
    }

    function tampilEditKonsul(id_pelayanan) {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('Kasir/getKonsul') ?>",
            dataType: "JSON",
            data: {
                id_pelayanan: id_pelayanan,
            },
            success: function(data) {
                if (data.status_dt == 'found') {
                    $('#inBiayaRs').val(data.biaya_rs);
                    $('#inBiayaJasa').val(data.biaya_jasa);
                    $('#inTotalBiaya').val(data.total);
                    $('#inPelKonsul').val(id_pelayanan);
                    $('#modal_edit_konsul').modal('show');
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

    function simpan_konsul() {
        id_Layanan = $('#inPelKonsul').val();
        biaya_rs = $('#inBiayaRs').val();
        biaya_jasa = $('#inBiayaJasa').val();
        swal({
            title: "Apakah kamu yakin ingin !",
            text: "Mengubah Biaya ?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3cb878",
            confirmButtonText: "Yakin",
            cancelButtonText: "Batal",
            closeOnConfirm: false
        }, function() {
            $().ready(function() {
                $.ajax({
                    url: "<?php echo base_url() ?>Kasir/update_konsul",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        idPelayanan: id_Layanan,
                        biaya_rs: biaya_rs,
                        biaya_jasa: biaya_jasa,
                    },
                    success: function(data) {
                        if (data.status == "success") {
                            swal({
                                title: "good job!",
                                type: "success",
                                text: "Biaya Konsul Telah Diubah",
                                confirmButtonColor: "#3cb878",
                            });
                            $('#modal_edit_konsul').modal('hide');
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

    function reloadTotal(id_pelayanan) {
        $.ajax({
            type: "POST",
            url: "Kasir/getTotal",
            dataType: 'json',
            data: {
                id_pelayanan: id_pelayanan,
            },
            success: function(data) {
                if (data.status == "success") {
                    $("#totalbayar").val(data.total_semua);
                } else {
                    $("#totalbayar").val(0);
                }
            }
        })
    }

    $(document).ready(function() {
        $('#datable').DataTable({
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
				"url": '<?= base_url('All_Poli/tampil_pasien_rajal'); ?>',
				"type": 'POST',
				"data": {
					poli: '<?=$poli?>',

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
        $('.data_hide').addClass('collapse');
        $('.data_htg').addClass('collapse');
        $('.data_asu').addClass('collapse');
        $('.data_asu').collapse('hide');
        $('#opsi_bayar').change(function() {

            var selector = '.data_hide_' + $(this).val();

            $('.data_hide').collapse('hide');

            if (selector == '.data_hide_tunai') {
                $(selector).collapse('show');
                $('.data_lanjut_asuransi').collapse('hide');
                $('.data_asu').collapse('hide');
                $('.data_lanjut_transfer').collapse('hide');
                $('.data_penghutang').collapse('hide');
                if ($('#inBayar').val() < $('#totalbayar').val()) {
                    $('.data_penghutang').collapse('show');
                } else if ($('#inBayar').val() == $('#totalbayar').val()) {
                    $('.data_penghutang').collapse('hide');
                }
            } else if (selector == '.data_hide_non-tunai') {
                $(selector).collapse('show');
                $('.data_lanjut_asuransi').collapse('hide');
                $('.data_asu').collapse('hide');
                $('.data_lanjut_transfer').collapse('hide');
                $('.data_penghutang').collapse('hide');
            } else if (selector == '.data_hide_hutang') {
                $(selector).collapse('show');
                $('.data_lanjut_asuransi').collapse('hide');
                $('.data_asu').collapse('hide');
                $('.data_lanjut_transfer').collapse('hide');
                $('.data_penghutang').collapse('hide');
            } else {
                $('.data_hide').collapse('hide');
            }
        });

        $('.data_lanjut').addClass('collapse');
        $('#opsi_lanjut').change(function() {
            var selector = '.data_lanjut_' + $(this).val();
            if (selector == '.data_lanjut_transfer') {
                $('.data_lanjut_asuransi').collapse('hide');
                $('.data_asu').collapse('hide');
                $('.data_lanjut_transfer').collapse('show');
            } else if (selector == '.data_lanjut_asuransi') {
                $('.data_lanjut_transfer').collapse('hide');
                $('.data_lanjut_asuransi').collapse('show');
                $('.data_asu_aia').collapse('hide');
            }

        });
    });
</script>
<script>
    $(document).ready(function() {

        $('#jenis_asuransi').change(function() {

            var asuransi = $('#jenis_asuransi').val();

            var selector = '.data_asu_aia';
            $('.data_asu_aia').collapse('show');
        });

        $('#opsi_bayar_aia').change(function() {

            var opsi = $('#opsi_bayar_aia').val();

            var selector = '.data_asu_' + $(this).val();
            if (opsi == 'tunaiAIA') {
                $('.data_asu_tunaiAIA').collapse('show');
                $('.data_asu_hutangAIA').collapse('hide');
                $('.data_asu_tunaiAIAHutang').collapse('hide');
                if ($('#nama_karyawanTunaiHutang').val() < $('#totalbayar').val()) {
                    $('.data_asu_tunaiAIAHutang').collapse('show');
                } else if ($('#nama_karyawanTunaiHutang').val() == $('#totalbayar').val()) {
                    $('.data_asu_tunaiAIAHutang').collapse('hide');
                }

            } else if (opsi == 'hutangAIA') {
                $('.data_asu_hutangAIA').collapse('show');
                $('.data_asu_tunaiAIA').collapse('hide');
                $('.data_asu_tunaiAIAHutang').collapse('hide');
            } else {
                $('.data_asu').collapse('hide');
            }
        });
    });
</script>

<script type="text/javascript">
    function insertRajalKasir() {
        id_Layanan = $('#inPel').val();
        id_History = $('#idHis').val();
        dp = $('#inDp').val();
        diskon = $('#inDiskon').val();
        tgl_keluar = $('#inTglKeluar').val();
        opsi_bayar = $('#opsi_bayar').val();
        total_bayar = $('#totalbayar').val();
        bayar_tunai = $('#inBayar').val();
        karyawantunai = $('#nama_karyawanTunai').val();
        opsi_lanjut = $('#opsi_lanjut').val();
        jenis_bank = $('#jenis_bank').val();
        jenis_asuransi = $('#jenis_asuransi').val();
        opsi_bayar_aia = $('#opsi_bayar_aia').val();
        total_bayarAIA = $('#totalbayarAIA').val();
        inBayarAIA = $('#inBayarAIA').val();
        karyawan_tunaiAIA = $('#nama_karyawanTunaiHutang').val();
        hutang = $('#nama_karyawan').val();
        hutangAIA = $('#nama_karyawan_hutangAIA').val();
        setara = $('#setara').val();
        setara2 = $('#setara2').val();
        swal({
            title: "Apakah kamu yakin ingin !",
            text: "Menambahkan Data " + id_Layanan + " ini?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3cb878",
            confirmButtonText: "Yakin",
            cancelButtonText: "Batal",
            closeOnConfirm: false
        }, function() {
            $().ready(function() {
                $.ajax({
                    url: "<?php echo base_url() ?>Kasir/insertRajalKasir",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        idPelayanan: id_Layanan,
                        idHis: id_History,
                        diskon: diskon,
                        dp: dp,
                        tgl_keluar: tgl_keluar,
                        opsi: opsi_bayar,
                        total_bayar: total_bayar,
                        bayar_tunai: bayar_tunai,
                        karyawantunai: karyawantunai,
                        opsi_lanjut: opsi_lanjut,
                        jenis_bank: jenis_bank,
                        jenis_asuransi: jenis_asuransi,
                        opsi_bayar_aia: opsi_bayar_aia,
                        total_bayarAIA: total_bayarAIA,
                        inBayarAIA: inBayarAIA,
                        karyawan_tunaiAIA: karyawan_tunaiAIA,
                        hutang: hutang,
                        hutangAIA: hutangAIA,
                        setara: setara,
                        setara2: setara2
                    },
                    success: function(data) {
                        if (data.status == "success") {
                            swal({
                                title: "good job!",
                                type: "success",
                                text: "Pembayaran Pasien Rawat Jalan dengan ID " + id_Layanan + " Telah ditambahkan",
                                confirmButtonColor: "#3cb878",
                            });
                            $('.data_hide').collapse('hide');
                            $('.data_lanjut').collapse('hide');
                            $('.data_asu').collapse('hide');
                            $('#btnbayar').show();
                            $("#modal_edit_kasir").modal('hide');
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
</script>
<script>
    function tampilHarga() {
        totalawal = $('#totalbayar').val();
        dp = $('#inDp').val();
        diskon = $('#inDiskon').val();

        totalakhir = totalawal - dp - diskon;
        $('#totalkeseluruhan').val(totalakhir);
        $('#inBayar').val(totalakhir);

    }

    function tampilHarga2() {
        totalawal = $('#totalbayarAIA').val();
        dp = $('#inDp').val();
        diskon = $('#inDiskon').val();

        totalakhir = totalawal - dp - diskon;
        $('#totalkeseluruhan2').val(totalakhir);
        $('#inBayarAIA').val(totalakhir);

    }

    function simpanDetailKasir() {
    id_pelayanan = $('#inPel').val();
    id_history = $('#idHis').val();
    diskon = $('#inDiskon').val();
    dp = $('#inDp').val();
    tgl_keluar = $('#inTglKeluar').val();
    swal({
        title: "Apakah kamu yakin ingin !",
        text: "Menambahkan Data " + id_pelayanan + " ini?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3cb878",
        confirmButtonText: "Yakin",
        cancelButtonText: "Batal",
        closeOnConfirm: false
    }, function() {
        $().ready(function() {
            $.ajax({
                url: "<?php echo base_url() ?>Kasir/insertDetailKasir",
                method: "POST",
                dataType: 'json',
                data: {
                    id_pelayanan: id_pelayanan,
                    id_history: id_history,
                    diskon: diskon,
                    dp: dp,
                    tgl_keluar: tgl_keluar
                    },
                    success: function(data) {
                        if (data.status == "success") {
                            swal({
                                title: "good job!",
                                type: "success",
                                text: "Data Pasien dengan ID " + id_pelayanan + " Telah ditambahkan",
                                confirmButtonColor: "#3cb878",
                            });
                            $('#datable').DataTable().ajax.reload();
                            $('#btnbayar').show();
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
=======
<!-- Row -->

<div class="panel panel-default card-view">
    <div class="panel-heading">
        <div class="pull-left">
            <h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">PASIEN RAWAT JALAN POLI <?= $poli?></span></h6>
        </div>
        <div class="clearfix"></div>

        <div class="row mt-30">

        </div>
    </div>
    <div class="panel-wrapper collapse in">
        <div class="panel-body">
            <div class="table-wrap">
                <div class="table-responsive">
                    <table id="datable" class="table table-hover display pb-30" width="100%">
                        <thead>
                            <tr class="bg-success">
                                <th>NO</th>
                                <!-- <th>CETAK DP</th>
                                <th>CETAK</th>
                                <th>EDIT</th> -->
                                <th>ERM</th>
                                <th>TANGGAL PELAYANAN</th>
                                <th>JAM PELAYANAN</th>
                                <th>NO RM</th>
                                <th>NAMA PASIEN</th>
                                <th>JENIS KELAMIN</th>
                                <th>TANGGAL LAHIR</th>
                                <th>UMUR</th>
                                <th>CARA MASUK</th>
                                <th>POLIKLINIK / RUANG</th>
                                <th>RAWAT INAP</th>
                                <th>JENIS KLAIM</th>
                                <th>DIAGNOSA</th>
                                <th>DOKTER DPJP</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr class="bg-success">
                                <th>NO</th>
                                <!-- <th>CETAK DP</th>
                                <th>CETAK</th>
                                <th>EDIT</th> -->
                                <th>ERM</th>
                                <th>TANGGAL PELAYANAN</th>
                                <th>JAM PELAYANAN</th>
                                <th>NO RM</th>
                                <th>NAMA PASIEN</th>
                                <th>JENIS KELAMIN</th>
                                <th>TANGGAL LAHIR</th>
                                <th>UMUR</th>
                                <th>CARA MASUK</th>
                                <th>POLIKLINIK / RUANG</th>
                                <th>RAWAT INAP</th>
                                <th>JENIS KLAIM</th>
                                <th>DIAGNOSA</th>
                                <th>DOKTER DPJP</th>
                            </tr>
                        </tfoot>
                    </table>
                    <span id="hasil"></span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="panel-wrapper collapse in">
    <div class="panel-body">
        <!-- sample modal content -->
        <div class="modal fade" role="dialog" id="modal_edit_kasir" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <!--modal 1-->
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
                                                                <form class="form-horizontal" action="<?php echo base_url('Kasir_poli/print_kasir_rajal') ?>" method="post" enctype="multipart/form-data" role="form">
                                                                    <input type="hidden" id="inPel" name="inPel">
                                                                    <input type="hidden" id="inHis" name="inHis">
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
                                                                            <center>
                                                                                <button onclick="simpanDetailKasir()" class="btn btn-primary btn-anim btn-rounded mr-10" type="button"><i class="icon-cloud-download"></i><span class="btn-text">SIMPAN</span></button> 
                                                                                <button class="btn btn-warning btn-rounded mr-10" type="submit" name="action" value="cetak">CETAK</button></center>


                                                                            <!-- <?php $query = "SELECT status FROM deatail_kasir WHERE " ?> -->
                                                                            <div class="data_button data_button_bayar">
                                                                                <center>
                                                                                <button class="btn btn-success btn-rounded mr-10 btn-anim" style="margin-right: 40px; margin-top: 20px;" data-toggle="collapse" aria-expanded="false" id="btnbayar" href="#tbh_distributor"><i class=" icon-arrow-down"></i><span class="btn-text">PILIH PEMBAYARAN</span></button>
                                                                            </center>

                                                                            </div>
                                                                        </div>
                                                                    </div>


                                                            </div>
                                                            <div id="tbh_distributor" class="collapse">
                                                                <h6 class="txt-dark capitalize-font"><i class="icon-user mr-10"></i>INFO PEMBAYARAN</h6>
                                                                <hr>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <div class="data_hide data_hide_opsi">
                                                                            <label class="control-label col-md-3">OPSI BAYAR</label>
                                                                            <div class="col-md-9 has-success">
                                                                                <select class="form-control filled-input select2" name="opsi_bayar" id="opsi_bayar">
                                                                                    <option value="0">Pilih Opsi Pembayaran</option>
                                                                                    <option value="tunai">Tunai</option>
                                                                                    <option value="non-tunai">Non-Tunai</option>
                                                                                    <option value="hutang">Hutang</option>
                                                                                </select>
                                                                                <span class="help-block"></span>
                                                                            </div>
                                                                        </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="data_hide data_hide_tunai">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group ">
                                                                                <label class="control-label col-md-3">TOTAL BAYAR</label>
                                                                                <div class="col-md-9  has-success">
                                                                                    <input type="number" class="form-control" autocomplete="off" id="totalbayar" name="totalbayar" value="0" disabled="">
                                                                                    <span class="help-block"></span>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="data_hide data_hide_tunai">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group ">
                                                                                <label class="control-label col-md-3">TOTAL BAYAR KESELURUHAN</label>
                                                                                <div class="col-md-9  has-success">
                                                                                    <input type="number" class="form-control" autocomplete="off" id="totalkeseluruhan" name="totalkeseluruhan" value="0" disabled="">
                                                                                    <span class="help-block"></span>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <button onclick="tampilHarga()" class="btn btn-success btn-sm" type="button"><span class="btn-text">TAMPIL HARGA</span></button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="data_hide data_hide_tunai">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group ">
                                                                                <label class="control-label col-md-3">HARGA BAYAR</label>
                                                                                <div class="col-md-9  has-success">
                                                                                    <input type="number" class="form-control" autocomplete="off" id="inBayar" name="inBayar" value="0">
                                                                                    <span class="help-block"></span>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group ">
                                                                                <label class="control-label col-md-3">HARGA PENYETARAAN</label>
                                                                                <div class="col-md-9  has-success">
                                                                                    <input type="number" class="form-control" autocomplete="off" id="setara" name="setara" value="0">
                                                                                    <span class="help-block"></span>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>


                                                                <div class="row">
                                                                    <div class="data_hide data_hide_tunai">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label class="control-label col-md-3">NAMA KARYAWAN
                                                                                </label>
                                                                                <div class="col-md-9 has-success">
                                                                                    <select class="form-control filled-input select2" placeholder="Choose a Category" id="nama_karyawanTunai" name="nama_karyawanTunai">
                                                                                        <option value="-">-</option>
                                                                                        <?php
                                                                                        foreach ($data_staff as $row) :
                                                                                        ?>
                                                                                            <option value="<?php echo $row->id_karyawan; ?>">
                                                                                                <?php echo $row->nama; ?></option>
                                                                                        <?php endforeach ?>


                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="data_hide data_hide_non-tunai">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label class="control-label col-md-3">OPSI
                                                                                    LANJUTAN
                                                                                </label>
                                                                                <div class="col-md-9 has-success">
                                                                                    <select class="form-control filled-input select2" placeholder="Choose a Category" id="opsi_lanjut" name="opsi_lanjut">
                                                                                        <option value="-">-</option>
                                                                                        <option value="transfer">TRANSFER</option>
                                                                                        <option value="asuransi">PIUTANG (ASURANSI)</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="data_lanjut data_lanjut_transfer">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label class="control-label col-md-3">JENIS
                                                                                    BANK
                                                                                </label>
                                                                                <div class="col-md-9 has-success">
                                                                                    <select class="form-control filled-input select2" placeholder="Choose a Category" id="jenis_bank" name="jenis_bank">
                                                                                        <?php
                                                                                        foreach ($data_bank as $row) :
                                                                                        ?>
                                                                                            <option value="<?php echo $row->id_bank; ?>">
                                                                                                <?php echo $row->nama_bank; ?></option>
                                                                                        <?php endforeach ?>

                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>



                                                                    <div class="data_lanjut data_lanjut_asuransi">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label class="control-label col-md-3">JENIS
                                                                                    ASURANSI
                                                                                </label>
                                                                                <div class="col-md-9 has-success">
                                                                                    <select class="form-control filled-input select2" name="jenis_asuransi" id="jenis_asuransi">
                                                                                    </select>
                                                                                    <span class="help-block"></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <div class="row">
                                                                    <div class="data_asu data_asu_aia">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label class="control-label col-md-3">OPSI BAYAR AIA</label>
                                                                                <div class="col-md-9 has-success">
                                                                                    <select class="form-control filled-input select2" name="opsi_bayar_aia" id="opsi_bayar_aia">
                                                                                        <option value="0">Pilih Opsi Pembayaran</option>
                                                                                        <option value="tunaiAIA">Tunai</option>
                                                                                        <option value="hutangAIA">Hutang</option>
                                                                                    </select>
                                                                                    <span class="help-block"></span>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="data_asu data_asu_tunaiAIA">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group ">
                                                                                <label class="control-label col-md-3">TOTAL BAYAR</label>
                                                                                <div class="col-md-9  has-success">
                                                                                    <input type="number" class="form-control" autocomplete="off" id="totalbayarAIA" name="totalbayarAIA" value="0" disabled="">
                                                                                    <span class="help-block"></span>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="data_asu data_asu_tunaiAIA">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group ">
                                                                                <label class="control-label col-md-3">TOTAL BAYAR KESELURUHAN</label>
                                                                                <div class="col-md-9  has-success">
                                                                                    <input type="number" class="form-control" autocomplete="off" id="totalkeseluruhan2" name="totalkeseluruhan" value="0" disabled="">
                                                                                    <span class="help-block"></span>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <button onclick="tampilHarga2()" class="btn btn-success btn-sm" type="button"><span class="btn-text">TAMPIL HARGA</span></button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="data_asu data_asu_tunaiAIA">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group ">
                                                                                <label class="control-label col-md-3">HARGA BAYAR</label>
                                                                                <div class="col-md-9  has-success">
                                                                                    <input type="number" class="form-control" autocomplete="off" id="inBayarAIA" name="inBayarAIA" value="0">
                                                                                    <span class="help-block"></span>

                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-6">
                                                                            <div class="form-group ">
                                                                                <label class="control-label col-md-3">HARGA PENYETARAAN</label>
                                                                                <div class="col-md-9  has-success">
                                                                                    <input type="number" class="form-control" autocomplete="off" id="setara2" name="setara2" value="0">
                                                                                    <span class="help-block"></span>

                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                    <div class="data_asu data_asu_tunaiAIAHutang">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label class="control-label col-md-3">NAMA KARYAWAN AIA
                                                                                </label>
                                                                                <div class="col-md-9 has-success">
                                                                                    <select class="form-control filled-input select2" placeholder="Choose a Category" id="nama_karyawanTunaiHutang" name="nama_karyawanTunaiHutang">
                                                                                        <option value="-">-</option>
                                                                                        <?php
                                                                                        foreach ($data_staff as $row) :
                                                                                        ?>
                                                                                            <option value="<?php echo $row->id_karyawan; ?>">
                                                                                                <?php echo $row->nama; ?></option>
                                                                                        <?php endforeach ?>

                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="data_asu data_asu_hutangAIA">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label class="control-label col-md-3">NAMA KARYAWAN HUTANG AIA
                                                                                </label>
                                                                                <div class="col-md-9 has-success">
                                                                                    <select class="form-control filled-input select2" placeholder="Choose a Category" id="nama_karyawan_hutangAIA" name="nama_karyawan_hutangAIA">
                                                                                        <option value="-">-</option>
                                                                                        <?php
                                                                                        foreach ($data_staff as $row) :
                                                                                        ?>
                                                                                            <option value="<?php echo $row->id_karyawan; ?>">
                                                                                                <?php echo $row->nama; ?></option>
                                                                                        <?php endforeach ?>


                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>

                                                                <div class="row">
                                                                    <div class="data_hide data_hide_hutang">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label class="control-label col-md-3">NAMA KARYAWAN HUTANG
                                                                                </label>
                                                                                <div class="col-md-9 has-success">
                                                                                    <select class="form-control filled-input select2" placeholder="Choose a Category" id="nama_karyawan" name="nama_karyawan">
                                                                                        <option value="-">-</option>
                                                                                        <?php
                                                                                        foreach ($data_staff as $row) :
                                                                                        ?>
                                                                                            <option value="<?php echo $row->id_karyawan; ?>">
                                                                                                <?php echo $row->nama; ?></option>
                                                                                        <?php endforeach ?>

                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <!--/span-->


                                                                <div class="row">
                                                                    <div class="col-md-12 mt-10">
                                                                        <div class="form-group pull-right pr-15">

                                                                            <button class="btn btn-success btn-anim  btn-sm btn-rounded" type="submit"><i class="icon-rocket"></i><span class="btn-text">CETAK DAN PULANG</span></button>
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
                            <!-- /.modal-dialog -->
                        </div>
                        <!--end modal-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="panel-wrapper collapse in">
    <div class="panel-body">

        <div class="modal fade" id="modal_edit_konsul" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h5 class="modal-title mt-10" id="myLargeModalLabel"><i class="icon-user mr-10"></i> EDIT DATA KONSUL
                        </h5>
                    </div>
                    <div class="modal-body">

                        <input type="hidden" id="inPelKonsul" name="inPelKonsul">
                        <input type="hidden" id="inHis" name="inHis">
                        <div class="form-body">
                            <h6 class="txt-dark capitalize-font"><i class="icon-user mr-10"></i>INFO KASIR</h6>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">BIAYA RS</label>
                                        <div class="col-md-9">
                                            <input type="number" class="form-control rounded-input" autocomplete="off" id="inBiayaRs" name="inBiayaRs" oninput='getTotalKonsul()'>
                                            <span class="help-block"></span>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">BIAYA JASA</label>
                                        <div class="col-md-9">
                                            <input type="number" class="form-control rounded-input" autocomplete="off" id="inBiayaJasa" name="inBiayaJasa" oninput='getTotalKonsul()'>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">TOTAL BIAYA</label>
                                        <div class="col-md-9">
                                            <input type="number" class="form-control rounded-input" autocomplete="off" id="inTotalBiaya" name="inTotalBiaya" disabled>
                                            <span class="help-block"></span>

                                        </div>
                                    </div>
                                </div>


                            </div>

                            <div class="row">
                                <div class="col-md-offset-3 col-md-9">
                                    <button class="btn btn-primary btn-rounded mr-10" type="submit" onclick="simpan_konsul()">SIMPAN</button>

                                </div>
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
    function getTotalKonsul() {
        biaya_rs = $('#inBiayaRs').val();
        biaya_jasa = $('#inBiayaJasa').val();
        var total = Number(biaya_rs) + Number(biaya_jasa);
        $('#inTotalBiaya').val(total);
    }

    function tampilTindakanFarmasi(id_pelayanan, id_history, id_cara_bayar, cara_bayar) {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('Kasir/getDpDisc') ?>",
            dataType: "JSON",
            data: {
                id_pelayanan: id_pelayanan,
                id_history: id_history,
            },
            success: function(data) {
                if (data.status_dt == 'found') {
                    if (data.status == 0) {
                        $('#btnbayar').hide();
                    }else{
                        $('#btnbayar').show();
                        $('.data_hide').addClass('collapse');
                        $('.data_htg').addClass('collapse');
                        $('.data_asu').addClass('collapse');
                        $('.data_asu').collapse('hide');
                        if (id_cara_bayar == 'WA14BJ84' || id_cara_bayar == 'AN48QN57' || id_cara_bayar == 'DP54CP91' || id_cara_bayar == 'JC93NV93' || id_cara_bayar == 'XR53EZ65' || id_cara_bayar == 'YF75CD88' || id_cara_bayar == 'MZ82IO20' || id_cara_bayar == 'Fagioli6969') {
                            $('#opsi_bayar').hide();
                            $('.data_lanjut_asuransi').collapse('show');
                            $('.data_asu').collapse('hide');
                            $('.data_hide').collapse('hide');
                            $('.data_lanjut_transfer').collapse('hide');
                            $('.data_penghutang').collapse('hide');
                            $('#opsi_bayar').val('non-tunai');
                            $('#opsi_lanjut').val('asuransi');
                        }else{
                            $('.data_hide_opsi').collapse('show');
                        }
                    }
                    $("#modal_edit_kasir").modal('show');
                    id_pel = $('#inPel').val(id_pelayanan);
                    $('#inHis').val(id_history);
                    $('#totalbayar').val(data.total_harga);
                    $('#totalbayarAIA').val(data.total_harga);
                    $('#jenis_asuransi').html('<option value=->-</option><option value=' + id_cara_bayar + '>' + cara_bayar + '</option>');
                    $('#inDiskon').val(data.diskon);
                    $('#inDp').val(data.dp);
                    $('#inTglKeluar').val(data.tgl_keluar);
                } else {
                    $("#modal_edit_kasir").modal('show');
                    $('#btnbayar').hide();
                    $('#inPel').val(id_pelayanan);
                    $('#inHis').val(id_history);
                    $('#totalbayar').val(0);
                    $('#totalbayarAIA').val(0);
                    ('#inDiskon').val(0);
                    $('#inDp').val(0);
                }

            }
        });
    }

    function tampilEditKonsul(id_pelayanan) {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('Kasir/getKonsul') ?>",
            dataType: "JSON",
            data: {
                id_pelayanan: id_pelayanan,
            },
            success: function(data) {
                if (data.status_dt == 'found') {
                    $('#inBiayaRs').val(data.biaya_rs);
                    $('#inBiayaJasa').val(data.biaya_jasa);
                    $('#inTotalBiaya').val(data.total);
                    $('#inPelKonsul').val(id_pelayanan);
                    $('#modal_edit_konsul').modal('show');
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

    function simpan_konsul() {
        id_Layanan = $('#inPelKonsul').val();
        biaya_rs = $('#inBiayaRs').val();
        biaya_jasa = $('#inBiayaJasa').val();
        swal({
            title: "Apakah kamu yakin ingin !",
            text: "Mengubah Biaya ?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3cb878",
            confirmButtonText: "Yakin",
            cancelButtonText: "Batal",
            closeOnConfirm: false
        }, function() {
            $().ready(function() {
                $.ajax({
                    url: "<?php echo base_url() ?>Kasir/update_konsul",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        idPelayanan: id_Layanan,
                        biaya_rs: biaya_rs,
                        biaya_jasa: biaya_jasa,
                    },
                    success: function(data) {
                        if (data.status == "success") {
                            swal({
                                title: "good job!",
                                type: "success",
                                text: "Biaya Konsul Telah Diubah",
                                confirmButtonColor: "#3cb878",
                            });
                            $('#modal_edit_konsul').modal('hide');
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

    function reloadTotal(id_pelayanan) {
        $.ajax({
            type: "POST",
            url: "Kasir/getTotal",
            dataType: 'json',
            data: {
                id_pelayanan: id_pelayanan,
            },
            success: function(data) {
                if (data.status == "success") {
                    $("#totalbayar").val(data.total_semua);
                } else {
                    $("#totalbayar").val(0);
                }
            }
        })
    }

    $(document).ready(function() {
        $('#datable').DataTable({
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
				"url": '<?= base_url('All_Poli/tampil_pasien_rajal'); ?>',
				"type": 'POST',
				"data": {
					poli: '<?=$poli?>',

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
        $('.data_hide').addClass('collapse');
        $('.data_htg').addClass('collapse');
        $('.data_asu').addClass('collapse');
        $('.data_asu').collapse('hide');
        $('#opsi_bayar').change(function() {

            var selector = '.data_hide_' + $(this).val();

            $('.data_hide').collapse('hide');

            if (selector == '.data_hide_tunai') {
                $(selector).collapse('show');
                $('.data_lanjut_asuransi').collapse('hide');
                $('.data_asu').collapse('hide');
                $('.data_lanjut_transfer').collapse('hide');
                $('.data_penghutang').collapse('hide');
                if ($('#inBayar').val() < $('#totalbayar').val()) {
                    $('.data_penghutang').collapse('show');
                } else if ($('#inBayar').val() == $('#totalbayar').val()) {
                    $('.data_penghutang').collapse('hide');
                }
            } else if (selector == '.data_hide_non-tunai') {
                $(selector).collapse('show');
                $('.data_lanjut_asuransi').collapse('hide');
                $('.data_asu').collapse('hide');
                $('.data_lanjut_transfer').collapse('hide');
                $('.data_penghutang').collapse('hide');
            } else if (selector == '.data_hide_hutang') {
                $(selector).collapse('show');
                $('.data_lanjut_asuransi').collapse('hide');
                $('.data_asu').collapse('hide');
                $('.data_lanjut_transfer').collapse('hide');
                $('.data_penghutang').collapse('hide');
            } else {
                $('.data_hide').collapse('hide');
            }
        });

        $('.data_lanjut').addClass('collapse');
        $('#opsi_lanjut').change(function() {
            var selector = '.data_lanjut_' + $(this).val();
            if (selector == '.data_lanjut_transfer') {
                $('.data_lanjut_asuransi').collapse('hide');
                $('.data_asu').collapse('hide');
                $('.data_lanjut_transfer').collapse('show');
            } else if (selector == '.data_lanjut_asuransi') {
                $('.data_lanjut_transfer').collapse('hide');
                $('.data_lanjut_asuransi').collapse('show');
                $('.data_asu_aia').collapse('hide');
            }

        });
    });
</script>
<script>
    $(document).ready(function() {

        $('#jenis_asuransi').change(function() {

            var asuransi = $('#jenis_asuransi').val();

            var selector = '.data_asu_aia';
            $('.data_asu_aia').collapse('show');
        });

        $('#opsi_bayar_aia').change(function() {

            var opsi = $('#opsi_bayar_aia').val();

            var selector = '.data_asu_' + $(this).val();
            if (opsi == 'tunaiAIA') {
                $('.data_asu_tunaiAIA').collapse('show');
                $('.data_asu_hutangAIA').collapse('hide');
                $('.data_asu_tunaiAIAHutang').collapse('hide');
                if ($('#nama_karyawanTunaiHutang').val() < $('#totalbayar').val()) {
                    $('.data_asu_tunaiAIAHutang').collapse('show');
                } else if ($('#nama_karyawanTunaiHutang').val() == $('#totalbayar').val()) {
                    $('.data_asu_tunaiAIAHutang').collapse('hide');
                }

            } else if (opsi == 'hutangAIA') {
                $('.data_asu_hutangAIA').collapse('show');
                $('.data_asu_tunaiAIA').collapse('hide');
                $('.data_asu_tunaiAIAHutang').collapse('hide');
            } else {
                $('.data_asu').collapse('hide');
            }
        });
    });
</script>

<script type="text/javascript">
    function insertRajalKasir() {
        id_Layanan = $('#inPel').val();
        id_History = $('#idHis').val();
        dp = $('#inDp').val();
        diskon = $('#inDiskon').val();
        tgl_keluar = $('#inTglKeluar').val();
        opsi_bayar = $('#opsi_bayar').val();
        total_bayar = $('#totalbayar').val();
        bayar_tunai = $('#inBayar').val();
        karyawantunai = $('#nama_karyawanTunai').val();
        opsi_lanjut = $('#opsi_lanjut').val();
        jenis_bank = $('#jenis_bank').val();
        jenis_asuransi = $('#jenis_asuransi').val();
        opsi_bayar_aia = $('#opsi_bayar_aia').val();
        total_bayarAIA = $('#totalbayarAIA').val();
        inBayarAIA = $('#inBayarAIA').val();
        karyawan_tunaiAIA = $('#nama_karyawanTunaiHutang').val();
        hutang = $('#nama_karyawan').val();
        hutangAIA = $('#nama_karyawan_hutangAIA').val();
        setara = $('#setara').val();
        setara2 = $('#setara2').val();
        swal({
            title: "Apakah kamu yakin ingin !",
            text: "Menambahkan Data " + id_Layanan + " ini?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3cb878",
            confirmButtonText: "Yakin",
            cancelButtonText: "Batal",
            closeOnConfirm: false
        }, function() {
            $().ready(function() {
                $.ajax({
                    url: "<?php echo base_url() ?>Kasir/insertRajalKasir",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        idPelayanan: id_Layanan,
                        idHis: id_History,
                        diskon: diskon,
                        dp: dp,
                        tgl_keluar: tgl_keluar,
                        opsi: opsi_bayar,
                        total_bayar: total_bayar,
                        bayar_tunai: bayar_tunai,
                        karyawantunai: karyawantunai,
                        opsi_lanjut: opsi_lanjut,
                        jenis_bank: jenis_bank,
                        jenis_asuransi: jenis_asuransi,
                        opsi_bayar_aia: opsi_bayar_aia,
                        total_bayarAIA: total_bayarAIA,
                        inBayarAIA: inBayarAIA,
                        karyawan_tunaiAIA: karyawan_tunaiAIA,
                        hutang: hutang,
                        hutangAIA: hutangAIA,
                        setara: setara,
                        setara2: setara2
                    },
                    success: function(data) {
                        if (data.status == "success") {
                            swal({
                                title: "good job!",
                                type: "success",
                                text: "Pembayaran Pasien Rawat Jalan dengan ID " + id_Layanan + " Telah ditambahkan",
                                confirmButtonColor: "#3cb878",
                            });
                            $('.data_hide').collapse('hide');
                            $('.data_lanjut').collapse('hide');
                            $('.data_asu').collapse('hide');
                            $('#btnbayar').show();
                            $("#modal_edit_kasir").modal('hide');
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
</script>
<script>
    function tampilHarga() {
        totalawal = $('#totalbayar').val();
        dp = $('#inDp').val();
        diskon = $('#inDiskon').val();

        totalakhir = totalawal - dp - diskon;
        $('#totalkeseluruhan').val(totalakhir);
        $('#inBayar').val(totalakhir);

    }

    function tampilHarga2() {
        totalawal = $('#totalbayarAIA').val();
        dp = $('#inDp').val();
        diskon = $('#inDiskon').val();

        totalakhir = totalawal - dp - diskon;
        $('#totalkeseluruhan2').val(totalakhir);
        $('#inBayarAIA').val(totalakhir);

    }

    function simpanDetailKasir() {
    id_pelayanan = $('#inPel').val();
    id_history = $('#idHis').val();
    diskon = $('#inDiskon').val();
    dp = $('#inDp').val();
    tgl_keluar = $('#inTglKeluar').val();
    swal({
        title: "Apakah kamu yakin ingin !",
        text: "Menambahkan Data " + id_pelayanan + " ini?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3cb878",
        confirmButtonText: "Yakin",
        cancelButtonText: "Batal",
        closeOnConfirm: false
    }, function() {
        $().ready(function() {
            $.ajax({
                url: "<?php echo base_url() ?>Kasir/insertDetailKasir",
                method: "POST",
                dataType: 'json',
                data: {
                    id_pelayanan: id_pelayanan,
                    id_history: id_history,
                    diskon: diskon,
                    dp: dp,
                    tgl_keluar: tgl_keluar
                    },
                    success: function(data) {
                        if (data.status == "success") {
                            swal({
                                title: "good job!",
                                type: "success",
                                text: "Data Pasien dengan ID " + id_pelayanan + " Telah ditambahkan",
                                confirmButtonColor: "#3cb878",
                            });
                            $('#datable').DataTable().ajax.reload();
                            $('#btnbayar').show();
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
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
</script>