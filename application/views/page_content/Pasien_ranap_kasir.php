<!-- Row -->

<div class="panel panel-default card-view">
    <div class="panel-heading">
        <div class="pull-left">
            <h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">PASIEN RAWAT INAP</span></h6>
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
                                <!-- <th>CETAK DP</th> -->
                                <th>CETAK</th>
                                <th width='10px'>LUAR TANGGUNGAN</th>
                                <th>CHECK OUT</th>
                                <th>STATUS CHECK OUT RUANGAN</th>
                                <th>TANGGAL PELAYANAN</th>
                                <th>JAM PELAYANAN</th>
                                <th>NO RM</th>
                                <th>NAMA PASIEN</th>
                                <th>JENIS KELAMIN</th>
                                <th>TANGGAL LAHIR</th>
                                <th>UMUR</th>
                                <th>CARA MASUK</th>
                                <th>POLIKLINIK / RUANG</th>
                                <th>JENIS KLAIM</th>
                                <th>DIAGNOSA</th>
                                <th>DOKTER DPJP</th>
                                <th>ALAMAT</th>
                                <th>KTP</th>
                            </tr>
                        </thead>

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
        <div class="modal fade" id="modal_edit_kasir" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h5 class="modal-title mt-10" id="myLargeModalLabel"><i class="icon-user mr-10"></i> EDIT DATA KUNJUNGAN
                        </h5>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" action="<?php echo base_url('Kasir/print_kasir_ranap') ?>" method="post" enctype="multipart/form-data" role="form" target="_blank" novalidate>
                            <input type="hidden" id="inPel" name="inPel">
                            <input type="hidden" id="inHis" name="inHis">
                            <div class="form-body">
                                <h6 class="txt-dark capitalize-font"><i class="icon-user mr-10"></i>INFO KASIR</h6>
                                <hr>
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">Yang Sudah Dibayar </label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control rounded-input" autocomplete="off" placeholder="jumlah" id="inDp" name="inDp" readonly>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">SELISIH </label>
                                            <div class="col-md-9">
                                                <input type="number" class="form-control rounded-input" autocomplete="off" placeholder="jumlah" id="inSelisih" name="inSelisih" value="0" oninput="tampil_selisih()">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">DISC KONSULTASI</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control rounded-input" autocomplete="off" id="inDiskonKonsul" name="inDiskonKonsul" value="0" oninput="tampilHarga()">
                                                <span class="help-block"></span>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">DISC TINDAKAN</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control rounded-input" autocomplete="off" id="inDiskonTindakan" name="inDiskonTindakan" value="0" oninput="tampilHarga()">
                                                <span class="help-block"></span>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">DISC VISITE</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control rounded-input" autocomplete="off" id="inDiskonVisite" name="inDiskonVisite" value="0" oninput="tampilHarga()">
                                                <span class="help-block"></span>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">DISC KAMAR</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control rounded-input" autocomplete="off" id="inDiskonKamar" name="inDiskonKamar" value="0" oninput="tampilHarga()">
                                                <span class="help-block"></span>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">DISC LABORATORIUM</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control rounded-input" autocomplete="off" id="inDiskonLabor" name="inDiskonLabor" value="0" oninput="tampilHarga()">
                                                <span class="help-block"></span>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">DISC RADIOLAGI</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control rounded-input" autocomplete="off" id="inDiskonRadio" name="inDiskonRadio" value="0" oninput="tampilHarga()">
                                                <span class="help-block"></span>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">TANGGAL PULANG</label>
                                            <div class="col-md-9">
                                                <input type="datetime-local" class="form-control rounded-input" autocomplete="off" id="inTglKeluar" name="inTglKeluar" onchange="pilihTanggal()">
                                                <span class="help-block"></span>

                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">CATATAN </label>
                                            <div class="col-md-9 has-success">
                                                <textarea class="form-control" rows="5" cols="30" autocomplete="off" id="inNote" name="inNote"></textarea>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="tbh_distributor" class="collapse">
                                <h6 class="txt-dark capitalize-font"><i class="icon-user mr-10"></i>INFO PEMBAYARAN</h6>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-4">BIAYA YANG HARUS DIBAYAR</label>
                                            <div class="col-md-8  has-success">
                                                <input type="text" class="form-control" autocomplete="off" id="totalkeseluruhan1" name="totalkeseluruhan1" value="0" readonly>
                                                <input type="hidden" class="form-control" autocomplete="off" id="totalkeseluruhan" name="totalkeseluruhan" value="0">
                                                <input type="hidden" class="form-control" autocomplete="off" id="total_harga" name="total_harga" value="0">
                                                <input type="hidden" class="form-control" autocomplete="off" id="inCaraBayar" name="inCaraBayar" value="0">

                                                <span class="help-block"></span>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 collapse data_hide_opsi">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">OPSI BAYAR</label>
                                            <div class="col-md-9 has-success">
                                                <select class="form-control filled-input select2" name="opsi_bayar" id="opsi_bayar">
                                                    <option value="cash">CASH</option>
                                                    <option value="transfer">TRANSFER</option>
                                                    <option value="kredit">KREDIT</option>
                                                    <option value="debit">DEBIT</option>
                                                    <option value="asuransi" class="hide">ASURANSI</option>

                                                    <option value="lainnya">LAINNYA</option>
                                                    <option value="" hidden></option>
                                                </select>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-4">YANG AKAN DIBAYAR</label>
                                            <div class="col-md-8  has-success">
                                                <input type="text" class="form-control" autocomplete="off" id="totalbayar" name="totalbayar" value="0">
                                                <span class="help-block"></span>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="data_hide_bank collapse">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">JENIS BANK </label>
                                                <div class="col-md-9 has-success">
                                                    <select class="form-control filled-input select2" placeholder="Choose a Category" id="jenis_bank" name="jenis_bank">
                                                        <?php foreach ($data_bank as $row) : ?>
                                                            <option value="<?php echo $row->id_bank; ?>">
                                                                <?php echo $row->nama_bank; ?></option>
                                                        <?php endforeach ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div id="tbh_selisih" class="collapse">
                                <h6 class="txt-dark capitalize-font"><i class="icon-user mr-10"></i>INFO PEMBAYARAN SELISIH</h6>
                                <hr>
                                <div class="row">

                                    <div class="col-md-6 ">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">OPSI BAYAR</label>
                                            <div class="col-md-9 has-success">
                                                <select class="form-control filled-input select2" name="opsi_bayar_selisih" id="opsi_bayar_selisih">
                                                    <option value="cash" selected>CASH</option>
                                                    <option value="transfer">TRANSFER</option>
                                                    <option value="kredit">KREDIT</option>
                                                    <option value="debit">DEBIT</option>
                                                    <option value="asuransi" class="hide">ASURANSI</option>
                                                    <option value="lainnya">LAINNYA</option>

                                                </select>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="data_selisih_bank collapse">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">JENIS BANK </label>
                                                <div class="col-md-9 has-success">
                                                    <select class="form-control filled-input select2" placeholder="Choose a Category" id="jenis_bank_selisih" name="jenis_bank_selisih">
                                                        <?php foreach ($data_bank as $row) : ?>
                                                            <option value="<?php echo $row->id_bank; ?>">
                                                                <?php echo $row->nama_bank; ?></option>
                                                        <?php endforeach ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div id="pasien_umum" style="display: block;">
                                <div class="row">
                                    <center>
                                        <button onclick="simpanDetailKasir()" class="btn btn-primary btn-anim btn-rounded mr-10" type="button"><i class="icon-cloud-download"></i><span class="btn-text">SIMPAN</span></button>

                                        <button title="Hanya melihat billing, dan belum di check out!" title="Cetak Billing" class="btn btn-warning btn-anim btn-rounded mr-10" type="submit" name="action" value="cetak"><i class="icon-printer"></i><span class="btn-text">LIHAT BILLING</span></button>
                                        <button title="Cetak Kwitansi" class="btn btn-primary btn-anim btn-rounded mr-10" type="button" onclick="kwitansi()"><i class="icon-printer"></i><span class="btn-text">CETAK KWITANSI</span></button>
                                    </center>
                                </div>
                                <br>
                                <br>

                                <div class="row collapse" id="button_cetak">
                                    <center>
                                        <button class="btn btn-danger btn-anim  btn-rounded mr-10" type="submit" name="action" value="pulang"><i class="icon-logout"></i><span class="btn-text">CHECKOUT</span></button>

                                        <button title="Cetak Selisih" class="btn btn-info btn-anim btn-rounded mr-10" type="submit" name="action" value="cetak_selisih"><i class="icon-printer"></i><span class="btn-text">CETAK SELISIH</span></button>
                                    </center>


                                </div>
                            </div>
                            <div id="pasien_asuransi" style="display: none;">
                                <div class="row">
                                    <center>

                                        <button class="btn btn-danger btn-anim  btn-rounded mr-10" type="submit" name="action" value="pulang"><i class="icon-logout"></i><span class="btn-text">CHECKOUT</span></button>
                                        <button title="Hanya melihat billing, dan belum di check out!" title="Cetak Billing" class="btn btn-warning btn-anim btn-rounded mr-10" type="submit" name="action" value="cetak"><i class="icon-printer"></i><span class="btn-text">LIHAT BILLING</span></button>

                                        <button title="Cetak Selisih" class="btn btn-info btn-anim btn-rounded mr-10" type="submit" name="action" value="cetak_selisih"><i class="icon-printer"></i><span class="btn-text">CETAK SELISIH</span></button>
                                        <button title="Cetak Kwitansi" class="btn btn-primary btn-anim btn-rounded mr-10" type="button" onclick="kwitansi()"><i class="icon-printer"></i><span class="btn-text">CETAK KWITANSI</span></button>
                                    </center>


                                </div>
                            </div>


                        </form>
                        <br>
                        <br>
                        <div class="row">
                            <center>
                                <button onclick="reload_riwayat()" class="btn btn-primary btn-anim btn-rounded mr-10" type="button"><i class="icon-arrow-down"></i><span class="btn-text">RIWAYAT PEMBAYARAN</span></button>
                            </center>
                        </div>
                        <div id="coll_opsi_bayar" class="collapse">
                            <h6 class="txt-dark capitalize-font"><i class="icon-user mr-10"></i>INFO PEMBAYARAN</h6>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">OPSI BAYAR</label>
                                        <div class="col-md-9 has-success">
                                            <select class="form-control filled-input select2" name="edit_opsi_bayar" id="edit_opsi_bayar">
                                                <option value="cash" selected>CASH</option>
                                                <option value="transfer">TRANSFER</option>
                                                <option value="kredit">KREDIT</option>
                                                <option value="debit">DEBIT</option>
                                                <option value="asuransi" class="hide">ASURANSI</option>
                                                <option value="lainnya">LAINNYA</option>

                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 data_hide_bank1 collapse">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">JENIS BANK </label>
                                        <div class="col-md-9 has-success">
                                            <select class="form-control filled-input select2" placeholder="Choose a Category" id="edit_jenis_bank" name="edit_jenis_bank">
                                                
                                                <?php foreach ($data_bank as $row) : ?>
                                                    <option value="<?php echo $row->id_bank; ?>">
                                                        <?php echo $row->nama_bank; ?></option>
                                                <?php endforeach ?>
                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">BIAYA</label>
                                        <div class="col-md-9  has-success">
                                            <input type="text" class="form-control" autocomplete="off" id="edit_totalbayar" name="edit_totalbayar">
                                            <span class="help-block"></span>
                                            <input type="hidden" id="inPendapatan">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <center>
                                    <button title="Mengubah Opsi Bayar" onclick="editDetailKasir()" class="btn btn-warning btn-anim btn-square mr-10" type="button"><i class="icon-rocket"></i><span class="btn-text">EDIT</span></button>
                                </center>
                            </div>

                        </div>
                        <div class="table-wrap t_riwayat collapse">
                            <div class="table-responsive ">
                                <table id="tb_riwayat" class="table table-hover display">
                                    <thead>
                                        <tr class="bg-success">
                                            <th>NO</th>
                                            <th>CETAK</th>
                                            <th>EDIT</th>
                                            <th>TANGGAL</th>
                                            <th>NILAI</th>
                                            <th>OPSI BAYAR</th>
                                            <th>STAFF</th>
                                        </tr>
                                    </thead>

                                </table>
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

<!-- LUAR TANGGUNGAN -->
<div class="panel-wrapper collapse in">
    <div class="panel-body">
        <!-- sample modal content -->
        <div class="modal fade" role="dialog" id="modal_luar_tanggungan" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <!--modal 1-->
                    <div class="modal-body">
                        <div class="modal-body">
                            <form class="form-horizontal" action="<?php echo base_url('Kasir/print_ptt') ?>" method="post" enctype="multipart/form-data" role="form" target="_blank">
                                <input type="hidden" id="inPel2" name="inPel2">
                                <input type="hidden" id="inHis2" name="inHis2">

                                <div>
                                    <h6 class="txt-dark capitalize-font"><i class="icon-user mr-10"></i>INFO PEMBAYARAN</h6>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group ">
                                                <label class="control-label col-md-4">BIAYA YANG HARUS DIBAYAR</label>
                                                <div class="col-md-8  has-success">
                                                    <input type="text" class="form-control" autocomplete="off" id="totalkeseluruhan21" name="totalkeseluruhan21" value="0" readonly>
                                                    <input type="hidden" class="form-control" autocomplete="off" id="totalkeseluruhan2" name="totalkeseluruhan2" value="0">
                                                    <input type="hidden" class="form-control" autocomplete="off" id="total_harga2" name="total_harga2" value="0">
                                                    <span class="help-block"></span>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">OPSI BAYAR</label>
                                                <div class="col-md-9 has-success">
                                                    <select class="form-control filled-input select2" name="opsi_bayar2" id="opsi_bayar2">
                                                        <option value="cash" selected>CASH</option>
                                                        <option value="transfer">TRANSFER</option>
                                                        <option value="kredit">KREDIT</option>
                                                        <option value="debit">DEBIT</option>
                                                        <!-- <option value="asuransi" class="hide">ASURANSI</option> -->
                                                        <option value="lainnya">LAINNYA</option>
                                                    </select>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="form-group ">
                                                <label class="control-label col-md-4">YANG AKAN DIBAYAR</label>
                                                <div class="col-md-8  has-success">
                                                    <input type="number" class="form-control" autocomplete="off" id="totalbayar2" name="totalbayar2" value="0">
                                                    <span class="help-block"></span>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="data_hide_bank2 collapse">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">JENIS BANK </label>
                                                    <div class="col-md-9 has-success">
                                                        <select class="form-control filled-input select2" placeholder="Choose a Category" id="jenis_bank2" name="jenis_bank2">
                                                            <option value="">-</option>
                                                            <?php foreach ($data_bank as $row) : ?>
                                                                <option value="<?php echo $row->id_bank; ?>">
                                                                    <?php echo $row->nama_bank; ?></option>
                                                            <?php endforeach ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <center>
                                        <button title="Simpan Total Bayar" onclick="simpanLuarTanggungan()" class="btn btn-primary btn-anim btn-rounded mr-10" type="button"><i class="icon-cloud-download"></i><span class="btn-text">SIMPAN</span></button>

                                        <button title="Hanya melihat billing, dan belum di check out!" title="Cetak Billing" class="btn btn-warning btn-anim btn-rounded mr-10" type="submit" name="action" value="cetak"><i class="icon-printer"></i><span class="btn-text">LIHAT BILLING</span></button>
                                    </center>
                                </div>
                                <br>
                                <br>

                            </form>
                            <br>
                            <br>
                            <div class="row">
                                <center>
                                    <button onclick="reload_riwayat2()" class="btn btn-primary btn-anim btn-rounded mr-10" type="button"><i class="icon-arrow-down"></i><span class="btn-text">RIWAYAT PEMBAYARAN</span></button>
                                </center>
                            </div>
                            <div id="coll_opsi_bayar2" class="collapse">
                                <h6 class="txt-dark capitalize-font"><i class="icon-user mr-10"></i>EDIT INFO PEMBAYARAN</h6>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">OPSI BAYAR</label>
                                            <div class="col-md-9 has-success">
                                                <select class="form-control filled-input select2" name="edit_opsi_bayar2" id="edit_opsi_bayar2">
                                                    <option value="cash" selected>CASH</option>
                                                    <option value="transfer">TRANSFER</option>
                                                    <option value="kredit">KREDIT</option>
                                                    <option value="debit">DEBIT</option>
                                                    <option value="asuransi" class="hide">ASURANSI</option>
                                                    <option value="lainnya">LAINNYA</option>

                                                </select>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 data_hide_bank3 collapse">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">JENIS BANK </label>
                                            <div class="col-md-9 has-success">
                                                <select class="form-control filled-input select2" placeholder="Choose a Category" id="edit_jenis_bank2" name="edit_jenis_bank2">
                                                    <option value="">-</option>

                                                    <?php foreach ($data_bank as $row) : ?>
                                                        <option value="<?php echo $row->id_bank; ?>">
                                                            <?php echo $row->nama_bank; ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">BIAYA</label>
                                            <div class="col-md-9  has-success">
                                                <input type="text" class="form-control" autocomplete="off" id="edit_totalbayar2" name="edit_totalbayar2">
                                                <span class="help-block"></span>
                                                <input type="hidden" id="inPendapatan2">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <center>
                                        <button title="Mengubah Opsi Bayar" onclick="editLuarTanggungan()" class="btn btn-warning btn-anim btn-square mr-10" type="button"><i class="icon-rocket"></i><span class="btn-text">EDIT</span></button>
                                    </center>
                                </div>

                            </div>
                            <div class="table-wrap t_riwayat2 collapse">
                                <div class="table-responsive ">
                                    <table id="tb_riwayat2" class="table table-hover display">
                                        <thead>
                                            <tr class="bg-success">
                                                <th>NO</th>
                                                <th>CETAK</th>
                                                <th>EDIT</th>
                                                <th>TANGGAL</th>
                                                <th>NILAI</th>
                                                <th>OPSI BAYAR</th>
                                                <th>STAFF</th>
                                            </tr>
                                        </thead>

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

<div id="div_result" style="display: none;"></div>

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

    function tampil_selisih() {
        selisih = $('#inSelisih').val();
        if (selisih > 0) {
            $('#tbh_selisih').collapse('show');
        } else {
            $('#tbh_selisih').collapse('hide');
        }
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
                    var total_semua = data.total - Number(data.diskon) - Number(data.selisih);
                    if (total_semua < 0) {
                        total_semua = 0;
                    } else {
                        total_semua = total_semua;
                    }
                    // var total_semua = data.total;
                    $('#total_harga').val(data.total_pendapatan);

                    if (data.diskon_ == null) {
                        $('#inDiskonKonsul').val(0);
                        $('#inDiskonTindakan').val(0);
                        $('#inDiskonRadio').val(0);
                        $('#inDiskonLabor').val(0);
                        $('#inDiskonVisite').val(0);
                        $('#inDiskonKamar').val(0);
                    } else {
                        $('#inDiskonKonsul').val(data.diskon_.diskon_konsul);
                        $('#inDiskonTindakan').val(data.diskon_.diskon_tindakan);
                        $('#inDiskonRadio').val(data.diskon_.diskon_radio);
                        $('#inDiskonLabor').val(data.diskon_.diskon_labor);
                        $('#inDiskonVisite').val(data.diskon_.diskon_visite);
                        $('#inDiskonKamar').val(data.diskon_.diskon_kamar);
                    }

                    // $('#inSelisih').val(data.selisih);
                    // if (data.selisih > 0) {
                    //     tampil_selisih();
                    // }
                    $('#inDp').val(data.dp);
                } else {
                    var total_semua = data.total;
                    if (total_semua < 0) {
                        total_semua = 0;
                    } else {
                        total_semua = total_semua;
                    }
                    $('#total_harga').val(data.total_pendapatan);

                    $('#inDiskonKonsul').val(0);
                    $('#inDiskonTindakan').val(0);
                    $('#inDiskonRadio').val(0);
                    $('#inDiskonLabor').val(0);
                    $('#inDiskonVisite').val(0);
                    $('#inDiskonKamar').val(0);

                    $('#inDp').val(0);
                }
                if (data.tgl_keluar_kamar != 'nothing') {

                    document.getElementById('inTglKeluar').value = data.tgl_keluar_kamar;
                } else {
                    document.getElementById('inTglKeluar').value = currentDateTime();

                }

                $('#inCaraBayar').val(id_cara_bayar);
                $('#inPel').val(id_pelayanan);
                $('#inHis').val(id_history);
                if (id_cara_bayar == '30' || id_cara_bayar == '333') {
                    $('#totalkeseluruhan').val(total_semua);
                    $('#totalbayar').val(total_semua);
                    $('#totalkeseluruhan1').val(convertToRupiah(total_semua));

                    $('.data_hide_opsi').collapse('hide');
                    $('#tbh_distributor').collapse('hide');

                    $('#opsi_bayar').val('asuransi').change();
                    $('#pasien_umum').hide();
                    $('#pasien_asuransi').show();
                    $("#modal_edit_kasir").modal('show');

                } else {
                    $('.data_hide_opsi').collapse('show');
                    if (id_cara_bayar == '42') {
                        // insert_sewa_kamar();
                        $('#opsi_bayar').val('cash').change();
                        $("select>option.hide").wrap('<span>');
                        if (total_semua == 0) {
                            $('#pasien_umum').hide();
                            $('#pasien_asuransi').show();
                        } else {
                            $('#pasien_umum').show();
                            $('#pasien_asuransi').hide();
                        }
                        $("#modal_edit_kasir").modal('show');

                    } else {
                        $('#totalkeseluruhan').val(total_semua);
                        $('#totalbayar').val(total_semua);
                        $('#totalkeseluruhan1').val(convertToRupiah(total_semua));

                        $('#tbh_distributor').collapse('hide');

                        $("select span option").unwrap(); //unwrap only wrapped
                        $('#opsi_bayar').val('asuransi').change();
                        $('#pasien_umum').hide();
                        $('#pasien_asuransi').show();
                        $("#modal_edit_kasir").modal('show');

                    }
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
            "ajax": '<?php echo base_url('Kasir/Tampil_pasien_ranap'); ?>',
            "deferRender": true,
            "processing": true,
            "order": [],
            "columnDefs": [{
                "targets": [0],
                "orderable": false,
            }, ],
        });

        $('#opsi_bayar').change(function() {
            if ($(this).val() == 'cash' || $(this).val() == 'asuransi') {
                if ($(this).val() == 'cash') {
                    insert_sewa_kamar();
                    $('#tbh_distributor').collapse('show');
                }
                $('.data_hide_bank').collapse('hide');
            } else {

                insert_sewa_kamar();
                $('#tbh_distributor').collapse('show');
                $('.data_hide_bank').collapse('show');
            }
        });
        $('#edit_opsi_bayar').change(function() {
            if ($(this).val() == 'cash' || $(this).val() == 'asuransi') {

                $('.data_hide_bank1').collapse('hide');
            } else {
                $('.data_hide_bank1').collapse('show');
            }
        });

        $('#opsi_bayar_selisih').change(function() {
            if ($(this).val() == 'cash' || $(this).val() == 'asuransi') {
                if ($(this).val() == 'cash') {
                    $('#tbh_selisih').collapse('show');
                }
                $('.data_selisih_bank').collapse('hide');
            } else {
                $('#tbh_selisih').collapse('show');
                $('.data_selisih_bank').collapse('show');
            }
        });
        $('#modal_edit_kasir').on('hidden.bs.modal', function() {
            location.reload()
            // $('#opsi_bayar').val('').change();
        })
    });
</script>



<script>
    function tampilHarga() {
        totalawal = $('#totalkeseluruhan').val();
        diskon_konsul = $('#inDiskonKonsul').val();
        diskon_tindakan = $('#inDiskonTindakan').val();
        diskon_labor = $('#inDiskonLabor').val();
        diskon_radio = $('#inDiskonRadio').val();
        diskon_visite = $('#inDiskonVisite').val();
        diskon_kamar = $('#inDiskonKamar').val();

        selisih = $('#inSelisih').val();

        totalakhir = totalawal - selisih - diskon_konsul - diskon_tindakan - diskon_labor - diskon_radio - diskon_visite - diskon_kamar;
        // $('#totalkeseluruhan').val(totalakhir);
        $('#totalbayar').val(totalakhir);

    }


    // check out

    function check_out(id_pelayanan, id_history, nama) {

        swal({
            title: "Warning?",
            text: "Apakah kamu yakin ingin check out pasien " + nama + "?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3cb878",
            confirmButtonText: "Yakin",
            cancelButtonText: "Batal",
            showLoaderOnConfirm: true,
            closeOnConfirm: true

        }, function(isConfirm) {
            if (isConfirm) {
                insert_sewa_kamar();
                $.ajax({
                    url: "<?php echo base_url() ?>Kasir/insertCheckOutRanap",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        id_pelayanan: id_pelayanan,
                        diskon: "0",
                        dp: "0",
                    },
                    success: function(data) {
                        if (data.status == "success") {
                            swal({
                                title: "good job!",
                                type: "success",
                                text: "Data Pasien " + nama + " Telah Berhasil di Check Out",
                                confirmButtonColor: "#3cb878",
                            });
                            $('#datable').DataTable().ajax.reload();
                            $("#modal_edit_kasir").modal('hide');
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

        });
        return false;
    }

    function reload_riwayat() {
        // var table;
        $('.t_riwayat').collapse('show');

        $('#tb_riwayat').dataTable().fnClearTable();
        $('#tb_riwayat').dataTable().fnDestroy();
        var table = $('#tb_riwayat').DataTable({
            "language": {
                "sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
                "sProcessing": "Sedang memproses...",
                "sLengthMenu": "Tampilkan _MENU_ entri",
                "sZeroRecords": "Tidak ditemukan data yang sesuai",
                "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                "sInfoPostFix": "",
                "sSearch": "Pencarian : ",
                "sUrl": "",
                "oPaginate": {
                    "sFirst": "Pertama",
                    "sPrevious": "Sebelumnya",
                    "sNext": "Selanjutnya",
                    "sLast": "Terakhir"
                },

            },
            "ajax": {
                "url": '<?php echo base_url('Kasir/tampil_riwayat_pembayaran'); ?>',
                "type": 'POST',
                "data": function(data) {
                    data.id = $('#inPel').val();;
                    data.id_his = $('#inHis').val();
                    data.url = "Kasir/print_riwayat_dp_ranap";
                }
            },
            "deferRender": true,
            "processing": true,
            "order": [],
            "columnDefs": [{
                "targets": [0],
                "orderable": false,
            }, ],

        });
        $('#btn-filter').click(function() { //button filter event click
            table.ajax.reload(); //just reload table
        });
        $('#btn-reset').click(function() { //button reset event click
            $('#form-filter')[0].reset();
            table.ajax.reload(); //just reload table
        });
    }

    function simpanDetailKasir() {
        id_pelayanan = $('#inPel').val();
        id_history = $('#inHis').val();
        diskon_konsul = $('#inDiskonKonsul').val();
        diskon_tindakan = $('#inDiskonTindakan').val();
        diskon_labor = $('#inDiskonLabor').val();
        diskon_radio = $('#inDiskonRadio').val();
        diskon_visite = $('#inDiskonVisite').val();
        diskon_kamar = $('#inDiskonKamar').val();

        dp = $('#inDp').val();
        tgl_keluar = $('#inTglKeluar').val();
        selisih = $('#inSelisih').val();
        opsi_bayar = $('#opsi_bayar').val();
        inNote = $('#inNote').val();
        jenis_bank = $('#jenis_bank').val();
        totalkeseluruhan = $('#totalkeseluruhan').val();
        totalbayar = $('#totalbayar').val();
        total_harga = $('#total_harga').val();
        swal({
            title: "Apakah kamu yakin ingin !",
            text: "Menambahkan menyimpan biaya sebesar " + convertToRupiah(totalbayar) + " pada pasien ini?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3cb878",
            confirmButtonText: "Yakin",
            cancelButtonText: "Batal",
            showLoaderOnConfirm: true,
            closeOnConfirm: false
        }, function(isConfirm) {
            if (isConfirm) {
                $.ajax({
                    url: "<?php echo base_url() ?>Kasir/insert_pendapatan_kasir",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        id_pelayanan: id_pelayanan,
                        id_history: id_history,
                        dp: dp,
                        tgl_keluar: tgl_keluar,
                        selisih: selisih,
                        opsi: opsi_bayar,
                        note: inNote,
                        jenis_bank: jenis_bank,
                        totalkeseluruhan: totalkeseluruhan,
                        totalbayarkasir: totalbayar,
                        total_harga: total_harga,
                        diskon_konsul: diskon_konsul,
                        diskon_tindakan: diskon_tindakan,
                        diskon_labor: diskon_labor,
                        diskon_radio: diskon_radio,
                        diskon_kamar: diskon_kamar,
                        diskon_visite: diskon_visite,
                    },
                    success: function(data) {
                        if (data.status == "success") {
                            swal({
                                title: "good job!",
                                type: "success",
                                text: "Pembayaran Sudah Disimpan",
                                confirmButtonColor: "#3cb878",
                            });
                            // $('#datable').DataTable().ajax.reload();
                            reloadTotal(id_pelayanan)
                            $('#button_cetak').collapse('show');
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
        });
        return false;
    }

    function reloadTotal(id_pelayanan) {
        $.ajax({
            type: "POST",
            url: "<?= base_url(); ?>Kasir/getDpDisc",
            dataType: 'json',
            data: {
                id_pelayanan: id_pelayanan,
            },
            success: function(data) {
                if (data.status_dt == 'found') {
                    var total_semua = data.total - Number(data.diskon) - Number(data.selisih);
                    if (total_semua < 0) {
                        total_semua = 0;
                    } else {
                        total_semua = total_semua;
                    }
                    // var total_semua = data.total;
                    $('#total_harga').val(data.total_harga);
                    $('#totalkeseluruhan').val(total_semua);
                    $('#totalbayar').val(total_semua);
                    $('#totalkeseluruhan1').val(convertToRupiah(total_semua));
                    if (data.diskon_ == null) {
                        $('#inDiskonKonsul').val(0);
                        $('#inDiskonTindakan').val(0);
                        $('#inDiskonRadio').val(0);
                        $('#inDiskonLabor').val(0);
                        $('#inDiskonVisite').val(0);
                        $('#inDiskonKamar').val(0);
                    } else {
                        $('#inDiskonKonsul').val(data.diskon_.diskon_konsul);
                        $('#inDiskonTindakan').val(data.diskon_.diskon_tindakan);
                        $('#inDiskonRadio').val(data.diskon_.diskon_radio);
                        $('#inDiskonLabor').val(data.diskon_.diskon_labor);
                        $('#inDiskonVisite').val(data.diskon_.diskon_visite);
                        $('#inDiskonKamar').val(data.diskon_.diskon_kamar);
                    }

                    $('#inDp').val(data.dp);
                } else {
                    var total_semua = data.total;
                    if (total_semua < 0) {
                        total_semua = 0;
                    } else {
                        total_semua = total_semua;
                    }
                    $('#total_harga').val(data.total_harga);
                    $('#totalkeseluruhan').val(total_semua);
                    $('#totalbayar').val(total_semua);
                    $('#totalkeseluruhan1').val(convertToRupiah(total_semua));
                    $('#inDiskonKonsul').val(0);
                    $('#inDiskonTindakan').val(0);
                    $('#inDiskonRadio').val(0);
                    $('#inDiskonLabor').val(0);
                    $('#inDiskonVisite').val(0);
                    $('#inDiskonKamar').val(0);

                    $('#inDp').val(0);
                }
                if (total_semua == 0) {
                    $('#pasien_umum').hide();
                    $('#pasien_asuransi').show();
                } else {
                    $('#pasien_umum').show();
                    $('#pasien_asuransi').hide();
                }
            }
        })
    }

    function insert_sewa_kamar() {
        id_pelayanan = $('#inPel').val();
        id_history = $('#inHis').val();
        diskon = $('#inDiskon').val();
        dp = $('#inDp').val();
        tgl_keluar = $('#inTglKeluar').val();
        selisih = $('#inSelisih').val();
        opsi_bayar = $('#opsi_bayar').val();
        inNote = $('#inNote').val();
        jenis_bank = $('#jenis_bank').val();
        totalkeseluruhan = $('#totalkeseluruhan').val();
        totalbayar = $('#totalbayar').val();
        total_harga = $('#total_harga').val();
        // swal({
        //     showLoaderOnConfirm: true,
        //     closeOnConfirm: false

        // }, function() {

        $.ajax({
            url: "<?php echo base_url() ?>Kasir/insert_sewa_kamar",
            method: "POST",
            dataType: 'json',
            data: {
                inPel: id_pelayanan,
                inHis: id_history,
                inTglKeluar: tgl_keluar,
                opsi_bayar: opsi_bayar,

            },
            success: function(data) {
                if (data.status == "success") {

                    // $('#datable').DataTable().ajax.reload();
                    reloadTotal(id_pelayanan)

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
        // });

    }

    function pilihTanggal() {
        id_cara_bayar = $('#inCaraBayar').val();
        opsi = $('#opsi_bayar').val();
        if (opsi != 'asuransi') {
            insert_sewa_kamar();
        }


    }

    function editDetailKasir() {
        id_pelayanan = $('#inPendapatan').val();
        opsi_bayar = $('#edit_opsi_bayar').val();
        jenis_bank = $('#edit_jenis_bank').val();
        total = $('#edit_totalbayar').val();
        swal({
            title: "Apakah kamu yakin ingin !",
            text: "Mengubah Opsi Bayar pada pasien ini?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3cb878",
            confirmButtonText: "Yakin",
            cancelButtonText: "Batal",
            showLoaderOnConfirm: true,
            closeOnConfirm: false
        }, function(isConfirm) {
            if (isConfirm) {
                $.ajax({
                    url: "<?php echo base_url() ?>Kasir/edit_pendapatan_kasir",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        id_pendapatan: id_pelayanan,
                        opsi: opsi_bayar,
                        jenis_bank: jenis_bank,
                        total: total
                    },
                    success: function(data) {
                        if (data.status == "success") {
                            swal({
                                title: "good job!",
                                type: "success",
                                text: "Pembayaran Sudah Disimpan",
                                confirmButtonColor: "#3cb878",
                            });
                            $('#tb_riwayat').DataTable().ajax.reload();
                            $('#coll_opsi_bayar').collapse('hide');

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
        });
        return false;
    }

    function tampilEditOpsiBayar(id_pendapatan, ket, total, bank) {
        $('#inPendapatan').val(id_pendapatan);
        $('#edit_opsi_bayar').val(ket).change();
        $('#edit_jenis_bank').val(bank).change();
        $('#edit_totalbayar').val(total);
        $('#coll_opsi_bayar').collapse('show');

    }

    function kwitansi() {
        id_pelayanan = $('#inPel').val();

        $.ajax({
            type: 'POST',
            url: "<?= base_url() . 'Kasir/cetak_kwitansi' ?>",
            data: {
                pel: id_pelayanan,
            },
            dataType: "html",
            success: function(msg) {
                $("#div_result").html(msg);
                var divContents = document.getElementById("div_result").innerHTML;
                // var a = window.open('', '', 'height=500, width=500');
                var a = window.open();
                a.document.write('<html>');
                // a.document.write('<head><style type="text/css"> @page {size: A4;margin: 0;} body { margin: 0; } </style> </head>');
                a.document.write('<body >');
                a.document.write(divContents);
                a.document.write('</body>');
                a.document.write('</html>');
                setTimeout(function() { // wait until all resources loaded 
                    a.document.close(); // necessary for IE >= 10
                    a.focus(); // necessary for IE >= 10
                    // a.print(); // change window to winPrint
                    // a.close(); // change window to winPrint
                }, 500);

            }
        });

    }
</script>
<script>
    function tampil_luar_tanggungan(id_pelayanan, id_history) {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('Kasir_pp/getLuarTanggungan') ?>",
            dataType: "JSON",
            data: {
                id_pelayanan: id_pelayanan,
                id_history: id_history,
            },
            success: function(data) {

                var total_semua = data.total;
                if (total_semua < 0) {
                    total_semua = 0;
                } else {
                    total_semua = total_semua;
                }
                // var total_semua = data.total;
                $('#total_harga2').val(data.total_harga);
                $('#totalkeseluruhan2').val(total_semua);
                $('#totalbayar2').val(total_semua);
                $('#totalkeseluruhan21').val(convertToRupiah(total_semua));


                $("#modal_luar_tanggungan").modal('show');
                $('#inPel2').val(id_pelayanan);
                $('#inHis2').val(id_history);

            }
        });
    }

    function simpanLuarTanggungan() {
        id_pelayanan = $('#inPel2').val();
        id_history = $('#inHis2').val();

        opsi_bayar = $('#opsi_bayar2').val();
        jenis_bank = $('#jenis_bank2').val();
        totalkeseluruhan = $('#totalkeseluruhan2').val();
        totalbayar = $('#totalbayar2').val();
        total_harga = $('#total_harga2').val();
        swal({
            title: "Apakah kamu yakin ingin !",
            text: "Menambahkan menyimpan biaya sebesar " + convertToRupiah(totalbayar) + " pada pasien ini?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3cb878",
            confirmButtonText: "Yakin",
            cancelButtonText: "Batal",
            showLoaderOnConfirm: true,
            closeOnConfirm: false
        }, function(isConfirm) {
            if (isConfirm) {
                $.ajax({
                    url: "<?php echo base_url() ?>Kasir_pp/insert_luar_tanggungan",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        id_pelayanan: id_pelayanan,
                        id_history: id_history,
                        opsi: opsi_bayar,
                        jenis_bank: jenis_bank,
                        totalkeseluruhan: totalkeseluruhan,
                        totalbayarkasir: totalbayar,
                        total_harga: total_harga,
                    },
                    success: function(data) {
                        if (data.status == "success") {
                            tampil_luar_tanggungan(id_pelayanan, id_history);

                            swal({
                                title: "good job!",
                                type: "success",
                                text: "Pembayaran Sudah Disimpan",
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
        });
        return false;
    }

    function reload_riwayat2() {
        // var table;
        $('.t_riwayat2').collapse('show');

        $('#tb_riwayat2').dataTable().fnClearTable();
        $('#tb_riwayat2').dataTable().fnDestroy();
        var table = $('#tb_riwayat2').DataTable({
            "language": {
                "sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
                "sProcessing": "Sedang memproses...",
                "sLengthMenu": "Tampilkan _MENU_ entri",
                "sZeroRecords": "Tidak ditemukan data yang sesuai",
                "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                "sInfoPostFix": "",
                "sSearch": "Pencarian : ",
                "sUrl": "",
                "oPaginate": {
                    "sFirst": "Pertama",
                    "sPrevious": "Sebelumnya",
                    "sNext": "Selanjutnya",
                    "sLast": "Terakhir"
                },

            },
            "ajax": {
                "url": '<?php echo base_url('Kasir_pp/tampil_riwayat_pembayaran'); ?>',
                "type": 'POST',
                "data": function(data) {
                    data.id = $('#inPel2').val();
                    data.id_his = $('#inHis2').val();
                    data.url = "Kasir/print_riwayat_dp";

                }
            },
            "deferRender": true,
            "processing": true,
            "order": [],
            "columnDefs": [{
                "targets": [0],
                "orderable": false,
            }, ],

        });
        $('#btn-filter').click(function() { //button filter event click
            table.ajax.reload(); //just reload table
        });
        $('#btn-reset').click(function() { //button reset event click
            $('#form-filter')[0].reset();
            table.ajax.reload(); //just reload table
        });
    }

    function tampilEditLuarTanggungan(id_pendapatan, ket, total, bank) {
        $('#inPendapatan2').val(id_pendapatan);
        $('#edit_opsi_bayar2').val(ket).change();
        $('#edit_jenis_bank2').val(bank).change();
        $('#edit_totalbayar2').val(total);
        $('#coll_opsi_bayar2').collapse('show');

    }

    function editLuarTanggungan() {
        id_pelayanan = $('#inPendapatan2').val();
        opsi_bayar = $('#edit_opsi_bayar2').val();
        jenis_bank = $('#edit_jenis_bank2').val();
        total = $('#edit_totalbayar2').val();

        swal({
            title: "Apakah kamu yakin ingin !",
            text: "Mengubah Opsi Bayar pada pasien ini?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3cb878",
            confirmButtonText: "Yakin",
            cancelButtonText: "Batal",
            showLoaderOnConfirm: true,
            closeOnConfirm: false
        }, function(isConfirm) {
            if (isConfirm) {
                $.ajax({
                    url: "<?php echo base_url() ?>Kasir/edit_pendapatan_kasir",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        id_pendapatan: id_pelayanan,
                        opsi: opsi_bayar,
                        jenis_bank: jenis_bank,
                        total: total

                    },
                    success: function(data) {
                        if (data.status == "success") {
                            swal({
                                title: "good job!",
                                type: "success",
                                text: "Pembayaran Sudah Disimpan",
                                confirmButtonColor: "#3cb878",
                            });
                            $('#tb_riwayat2').DataTable().ajax.reload();
                            $('#coll_opsi_bayar2').collapse('hide');

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
        });
        return false;
    }
    $(document).ready(function() {
        $('#opsi_bayar2').change(function() {
            if ($(this).val() == 'cash' || $(this).val() == 'asuransi') {
                // if ($(this).val() == 'cash') {
                //     $('#tbh_distributor').collapse('show');
                // }
                $('.data_hide_bank2').collapse('hide');
            } else {
                // $('#tbh_distributor').collapse('show');
                $('.data_hide_bank2').collapse('show');
            }
        });
        $('#edit_opsi_bayar2').change(function() {
            if ($(this).val() == 'cash' || $(this).val() == 'asuransi') {
                // if ($(this).val() == 'cash') {
                //     $('#tbh_distributor').collapse('show');
                // }
                $('.data_hide_bank3').collapse('hide');
            } else {
                // $('#tbh_distributor').collapse('show');
                $('.data_hide_bank3').collapse('show');
            }
        });
    });
</script>