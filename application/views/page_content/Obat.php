<div class="panel panel-default card-view">
    <div class="panel-heading">
        <div class="pull-left">
            <h6 class="panel-title txt-dark"><span class="span span-success">OBAT</span></h6>
        </div>



        <div class="clearfix"></div>
    </div>

    <div align="right">
        <button class="btn btn-primary btn-anim mr-50" style="margin-right: 40px;" data-toggle="modal" data-target=".modal-pendaftaranakun"><i class="icon-plus"></i><span class="btn-text">TAMBAH OBAT</span>
        </button>
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
                                    <!-- <th>NO</th> -->
                                    <th>KODE SIBATIK</th>
                                    <th>EDIT</th>
                                    <th>NAMA OBAT</th>
                                    <th>PRODUSEN</th>
                                    <th>SATUAN TERKECIL</th>
                                    <th>SATUAN TERBESAR</th>
                                    <th>GOLONGAN SEDIAAN</th>
                                    <th>GOLONGAN OBAT</th>
                                    <th>GOLONGAN FARNAKOLOGI</th>
                                    <th>JUMLAH SATUAN TERKECIL</th>
                                    <th>HNA</th>
                                    <th>PPN</th>
                                    <th>HARGA JUAL</th>
                                    <th>HARGA PERSEDIAAN</th>
                                    <th>MARGIN</th>
                                    <th>DISKON</th>
                                    <th>MINIMAL STOK</th>
                                    <th>DISTRIBUTOR</th>
                                    <th>STANDAR</th>
                                    <th>KODE</th>
                                    <th>ID MATERIAL</th>
                                    <th>ZAT ADIKTIF</th>
                                    <th>HIGH ALERT</th>
                                    <th>STANDAR FORNAS</th>
                                    <th>ZAT AKTIF</th>
                                    <th>KATEGORI</th>
                                    <th>STATUS</th>
                                </tr>
                            </thead>
                            <tfoot class="bg-success">
                                <!-- <th>NO</th> -->
                                <th>KODE SIBATIK</th>
                                <th>EDIT</th>
                                <th>NAMA OBAT</th>
                                <th>PRODUSEN</th>
                                <th>SATUAN TERKECIL</th>
                                <th>SATUAN TERBESAR</th>
                                <th>GOLONGAN SEDIAAN</th>
                                <th>GOLONGAN OBAT</th>
                                <th>GOLONGAN FARNAKOLOGI</th>
                                <th>JUMLAH SATUAN TERKECIL</th>
                                <th>HNA</th>
                                <th>PPN</th>
                                <th>HARGA PERSEDIAAN</th>
                                <th>MARGIN</th>
                                <th>DISKON</th>
                                <th>MINIMAL STOK</th>
                                <th>DISTRIBUTOR</th>
                                <th>STANDAR</th>
                                <th>KODE</th>
                                <th>ID MATERIAL</th>
                                <th>ZAT ADIKTIF</th>
                                <th>HIGH ALERT</th>
                                <th>STANDAR FORNAS</th>
                                <th>ZAT AKTIF</th>
                                <th>KATEGORI</th>
                                <th>STATUS</th>
                            </tfoot>
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


    <!--data table-->

    <!--modal yang akan dipakai-->

    <div class="panel-wrapper collapse in">
        <div class="panel-body">
            <!-- sample modal content -->

            <div class="modal fade modal-pendaftaranakun" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <p>OBAT</p>
                            <p><i class="icon-people mr-10"></i>INPUT OBAT</p>

                        </div>
                        <div class="modal-body">
                            <!-- Form body  -->

                            <div class="form-body mt-20">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">NAMA OBAT</label>
                                            <div class="col-md-9 has-success">
                                                <input type="text" class="form-control" placeholder="NAMA OBAT" id="nama" name="nama"></input>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">SATUAN TERKECIL</label>
                                            <div class="col-md-9 has-success">
                                                <select class="form-control filled-input select2" id="satuan_kecil" name="satuan_kecil">
                                                    <option value="-">PILIH</option>

                                                    <?php foreach ($satuan_kecil as $s) { ?>
                                                        <option value="<?= $s['satuan_terkecil']; ?>"><?= $s['satuan_terkecil']; ?></option>

                                                    <?php } ?>
                                                </select>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">SATUAN TERBESAR</label>
                                            <div class="col-md-9 has-success">
                                                <select class="form-control filled-input select2" id="satuan_besar" name="satuan_besar">
                                                    <option value="-">PILIH</option>

                                                    <?php foreach ($satuan_besar as $s) { ?>
                                                        <option value="<?= $s['satuan_terbesar']; ?>"><?= $s['satuan_terbesar']; ?></option>

                                                    <?php } ?>
                                                </select>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">GOLONGAN SEDIAAN</label>
                                            <div class="col-md-9 has-success">
                                                <select class="form-control filled-input select2" id="golongan_sediaan" name="golongan_sediaan">
                                                    <option value="-">PILIH</option>

                                                    <?php foreach ($golongan_sediaan as $s) { ?>
                                                        <option value="<?= $s['golongan_sediaan']; ?>"><?= $s['golongan_sediaan']; ?></option>

                                                    <?php } ?>
                                                </select>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">GOLONGAN OBAT</label>
                                            <div class="col-md-9 has-success">
                                                <select class="form-control filled-input select2" id="golongan_obat" name="golongan_obat">
                                                    <option value="-">PILIH</option>

                                                    <?php foreach ($golongan_obat as $s) { ?>
                                                        <option value="<?= $s['golongan_obat']; ?>"><?= $s['golongan_obat']; ?></option>

                                                    <?php } ?>
                                                </select>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">GOLONGAN FARMAKOLOGI</label>
                                            <div class="col-md-9 has-success">
                                                <select class="form-control filled-input select2" id="golongan_farmakologi" name="golongan_farmakologi">
                                                    <option value="-">PILIH</option>

                                                    <?php foreach ($golongan_farmakologi as $s) { ?>
                                                        <option value="<?= $s['golongan_farmakologi']; ?>"><?= $s['golongan_farmakologi']; ?></option>

                                                    <?php } ?>
                                                </select>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">JUMLAH SATUAN TERKECIL</label>
                                            <div class="col-md-9 has-success">
                                                <input type="text" class="form-control" placeholder="JUMLAH SATUAN TERKECIL" id="jml_terkecil" name="jml_terkecil"></input>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">HNA</label>
                                            <div class="col-md-9 has-success">
                                                <input type="text" class="form-control" placeholder="HNA" id="harga_cost" name="harga_cost"></input>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">DISKON</label>
                                            <div class="col-md-9 has-success">
                                                <input type="text" class="form-control" placeholder="DISKON" id="diskon" name="diskon"></input>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">PPN</label>
                                            <div class="col-md-9 has-success">
                                                <input type="text" class="form-control" placeholder="PPN" id="ppn" name="ppn" value="11.00" readonly></input>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">MARGIN</label>
                                            <div class="col-md-9 has-success">
                                                <input type="text" class="form-control" placeholder="MARGIN" id="margin" name="margin" value="1.30" ></input>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">MINIMAL STOK</label>
                                            <div class="col-md-9 has-success">
                                                <input type="text" class="form-control" placeholder="MINIMAL STOK" id="minStok" name="minStok"></input>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">PRODUSEN</label>
                                            <div class="col-md-9 has-success">
                                                <select class="form-control filled-input select2" id="produsen" name="produsen">
                                                    <option value="-">-</option>

                                                    <?php foreach ($produ as $p) { ?>
                                                        <option value="<?= $p['nama']; ?>"><?= $p['nama']; ?></option>

                                                    <?php } ?>
                                                </select>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">DISTRIBUTOR</label>
                                            <div class="col-md-9 has-success">
                                                <!-- <input type="text" class="form-control" placeholder="DISTRIBUTOR" id="distributor" name="distributor"></input> -->
                                                <select class="form-control filled-input select2" id="distributor" name="distributor">
                                                    <option value="-">-</option>

                                                    <?php foreach ($dist as $p) { ?>
                                                        <option value="<?= $p['nama_produsen']; ?>"><?= $p['nama_produsen']; ?></option>

                                                    <?php } ?>
                                                </select>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">STANDAR</label>
                                            <div class="col-md-9 has-success">
                                                <select class="form-control filled-input select2" id="standar" name="standar">
                                                    <option value="-">-</option>
                                                    <option value="NON FOPI">NON FOPI</option>
                                                    <option value="FOPI">FOPI</option>
                                                    <option value="NON DAKSPI">NON DAKSPI</option>
                                                    <option value="DAKSPI">DAKSPI</option>
                                                    <option value="IOL">IOL</option>
                                                    <option value="BPJS">BPJS</option>
                                                    <option value="Cssd">Cssd</option>
                                                    <option value="Benang bedah">Benang bedah</option>
                                                    <option value="Pisau bedah">Pisau bedah</option>
                                                    <option value="Ortopedi">Ortopedi</option>
                                                    <option value="Kontras">Kontras</option>
                                                    <option value="INHEALTH">INHEALTH</option>
                                                    <option value="APD">APD</option>
                                                    <option value="Laboratorium">Laboratorium</option>
                                                </select>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">KODE</label>
                                            <div class="col-md-9 has-success">
                                                <input type="text" class="form-control" placeholder="KODE" id="kode" name="kode"></input>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">ID MATERIAL</label>
                                            <div class="col-md-9 has-success">
                                                <input type="text" class="form-control" placeholder="ID MATERIAL" id="id_material" name="id_material"></input>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">ZAT ADIKTIF</label>
                                            <div class="col-md-9 has-success">
                                                <select class="form-control filled-input select2" id="zat_adiktif" name="zat_adiktif">
                                                    <option value="-">-</option>
                                                    <option value="PSIKOTROPIKA">PSIKOTROPIKA</option>
                                                    <option value="HIGH ALERT">HIGH ALERT</option>
                                                    <option value="HIGH ALERT, CYTOTOXIC">HIGH ALERT, CYTOTOXIC</option>
                                                    <option value="NARKOTIKA">NARKOTIKA</option>
                                                </select>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">HIGH ALERTF</label>
                                            <div class="col-md-9 has-success">
                                                <select class="form-control filled-input select2" id="high_alert" name="high_alert">
                                                    <option value="-">-</option>
                                                    <option value="HIGH ALERT">HIGH ALERT</option>
                                                    <option value="HIGH ALERT, CYTOTOXIC">HIGH ALERT, CYTOTOXIC</option>
                                                </select>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">STANDAR FORNAS</label>
                                            <div class="col-md-9 has-success">
                                                <select class="form-control filled-input select2" id="standar_fornas" name="standar_fornas">
                                                    <option value="-">-</option>
                                                    <option value="FORNAS">FORNAS</option>
                                                    <option value="NON FORNAS">NON FORNAS</option>
                                                </select>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">ZAT AKTIF</label>
                                            <div class="col-md-9 has-success">
                                                <input type="text" class="form-control" placeholder="ZAT AKTIF" id="zat_aktif" name="zat_aktif"></input>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">KATEGORI</label>
                                            <div class="col-md-9 has-success">
                                                <select class="form-control filled-input select2" id="kategori" name="kategori">
                                                    <option value="-">-</option>

                                                    <?php foreach ($kategori as $p) { ?>
                                                        <option value="<?= $p['kategori']; ?>"><?= $p['kategori']; ?></option>

                                                    <?php } ?>
                                                </select>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">STATUS</label>
                                            <div class="col-md-9 has-success">
                                                <select class="form-control filled-input select2" id="status" name="status">

                                                    <option value="AKTIF">AKTIF</option>
                                                    <option value="TIDAK AKTIF">TIDAK AKTIF</option>
                                                </select>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End -->
                        </div>
                        <div class="modal-footer mb-10 mr-15">

                            <button onclick="insertObat()" class="btn btn-success btn-anim  btn-sm" type="button"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span></button>

                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
        </div>
        <div class="modal fade bs-example-modal-lg" id="modal_edit_vendor" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h5 class="modal-title" id="myLargeModalLabel"><i class="icon-user mr-10"></i> EDIT DATA OBAT
                        </h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-wrap">
                            <!-- /formbody -->
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">NAMA OBAT</label>
                                            <div class="col-md-9 has-success">
                                                <input type="text" class="form-control" placeholder="NAMA OBAT" id="Upnama" name="nama"></input>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">SATUAN TERKECIL</label>
                                            <div class="col-md-9 has-success">
                                                <select class="form-control filled-input select2" id="Upsatuan_kecil" name="satuan_kecil">
                                                    <option value="-">PILIH</option>

                                                    <?php foreach ($satuan_kecil as $s) { ?>
                                                        <option value="<?= $s['satuan_terkecil']; ?>"><?= $s['satuan_terkecil']; ?></option>

                                                    <?php } ?>
                                                </select>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">SATUAN TERBESAR</label>
                                            <div class="col-md-9 has-success">
                                                <select class="form-control filled-input select2" id="Upsatuan_besar" name="satuan_besar">
                                                    <option value="-">PILIH</option>

                                                    <?php foreach ($satuan_besar as $s) { ?>
                                                        <option value="<?= $s['satuan_terbesar']; ?>"><?= $s['satuan_terbesar']; ?></option>

                                                    <?php } ?>
                                                </select>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">GOLONGAN SEDIAAN</label>
                                            <div class="col-md-9 has-success">
                                                <select class="form-control filled-input select2" id="Upgolongan_sediaan" name="golongan_sediaan">
                                                    <option value="-">PILIH</option>

                                                    <?php foreach ($golongan_sediaan as $s) { ?>
                                                        <option value="<?= $s['golongan_sediaan']; ?>"><?= $s['golongan_sediaan']; ?></option>

                                                    <?php } ?>
                                                </select>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">GOLONGAN OBAT</label>
                                            <div class="col-md-9 has-success">
                                                <select class="form-control filled-input select2" id="Upgolongan_obat" name="golongan_obat">
                                                    <option value="-">PILIH</option>

                                                    <?php foreach ($golongan_obat as $s) { ?>
                                                        <option value="<?= $s['golongan_obat']; ?>"><?= $s['golongan_obat']; ?></option>

                                                    <?php } ?>
                                                </select>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">GOLONGAN FARMAKOLOGI</label>
                                            <div class="col-md-9 has-success">
                                                <select class="form-control filled-input select2" id="Upgolongan_farmakologi" name="golongan_farmakologi">
                                                    <option value="-">PILIH</option>

                                                    <?php foreach ($golongan_farmakologi as $s) { ?>
                                                        <option value="<?= $s['golongan_farmakologi']; ?>"><?= $s['golongan_farmakologi']; ?></option>

                                                    <?php } ?>
                                                </select>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">JUMLAH SATUAN TERKECIL</label>
                                            <div class="col-md-9 has-success">
                                                <input type="text" class="form-control" placeholder="JUMLAH SATUAN TERKECIL" id="Upjml_terkecil" name="jml_terkecil"></input>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">HNA</label>
                                            <div class="col-md-9 has-success">
                                                <input type="text" class="form-control" placeholder="HNA" id="Upharga_cost" name="harga_cost"></input>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">DISKON</label>
                                            <div class="col-md-9 has-success">
                                                <input type="text" class="form-control" placeholder="DISKON" id="UpDiskon" name="diskon"></input>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">PPN</label>
                                            <div class="col-md-9 has-success">
                                                <input type="text" class="form-control" placeholder="PPN" id="Upppn" name="ppn" value="11.00" readonly></input>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">MARGIN</label>
                                            <div class="col-md-9 has-success">
                                                <input type="text" class="form-control" placeholder="MARGIN" id="Upmargin" name="margin" value="1.30" ></input>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">MINIMAL STOK</label>
                                            <div class="col-md-9 has-success">
                                                <input type="text" class="form-control" placeholder="MINIMAL STOK" id="UpminStok" name="minStok"></input>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">PRODUSEN</label>
                                            <div class="col-md-9 has-success">
                                                <select class="form-control filled-input select2" id="Upprodusen" name="produsen">
                                                    <option value="-">-</option>

                                                    <?php foreach ($produ as $p) { ?>
                                                        <option value="<?= $p['nama']; ?>"><?= $p['nama']; ?></option>

                                                    <?php } ?>
                                                </select>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">DISTRIBUTOR</label>
                                            <div class="col-md-9 has-success">
                                                <!-- <input type="text" class="form-control" placeholder="DISTRIBUTOR" id="distributor" name="distributor"></input> -->
                                                <select class="form-control filled-input select2" id="Updistributor" name="distributor">
                                                    <option value="-">-</option>

                                                    <?php foreach ($dist as $p) { ?>
                                                        <option value="<?= $p['nama_produsen']; ?>"><?= $p['nama_produsen']; ?></option>

                                                    <?php } ?>
                                                </select>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">STANDAR</label>
                                            <div class="col-md-9 has-success">
                                                <select class="form-control filled-input select2" id="Upstandar" name="standar">
                                                    <option value="-">-</option>
                                                    <option value="NON FOPI">NON FOPI</option>
                                                    <option value="FOPI">FOPI</option>
                                                    <option value="NON DAKSPI">NON DAKSPI</option>
                                                    <option value="DAKSPI">DAKSPI</option>
                                                    <option value="IOL">IOL</option>
                                                    <option value="BPJS">BPJS</option>
                                                    <option value="Cssd">Cssd</option>
                                                    <option value="Benang bedah">Benang bedah</option>
                                                    <option value="Pisau bedah">Pisau bedah</option>
                                                    <option value="Ortopedi">Ortopedi</option>
                                                    <option value="INHEALTH">INHEALTH</option>
                                                    <option value="Kontras">Kontras</option>
                                                    <option value="APD">APD</option>
                                                    <option value="Laboratorium">Laboratorium</option>
                                                </select>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">KODE</label>
                                            <div class="col-md-9 has-success">
                                                <input type="text" class="form-control" placeholder="KODE" id="Upkode" name="kode"></input>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">ID MATERIAL</label>
                                            <div class="col-md-9 has-success">
                                                <input type="text" class="form-control" placeholder="ID MATERIAL" id="Upid_material" name="id_material"></input>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">ZAT ADIKTIF</label>
                                            <div class="col-md-9 has-success">
                                                <select class="form-control filled-input select2" id="Upzat_adiktif" name="zat_adiktif">
                                                    <option value="-">-</option>
                                                    <option value="PSIKOTROPIKA">PSIKOTROPIKA</option>
                                                    <option value="HIGH ALERT">HIGH ALERT</option>
                                                    <option value="HIGH ALERT, CYTOTOXIC">HIGH ALERT, CYTOTOXIC</option>
                                                    <option value="NARKOTIKA">NARKOTIKA</option>
                                                </select>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">HIGH ALERTF</label>
                                            <div class="col-md-9 has-success">
                                                <select class="form-control filled-input select2" id="Uphigh_alert" name="high_alert">
                                                    <option value="-">-</option>
                                                    <option value="HIGH ALERT">HIGH ALERT</option>
                                                    <option value="HIGH ALERT, CYTOTOXIC">HIGH ALERT, CYTOTOXIC</option>
                                                </select>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">STANDAR FORNAS</label>
                                            <div class="col-md-9 has-success">
                                                <select class="form-control filled-input select2" id="Upstandar_fornas" name="standar_fornas">
                                                    <option value="-">-</option>
                                                    <option value="FORNAS">FORNAS</option>
                                                    <option value="NON FORNAS">NON FORNAS</option>
                                                </select>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">ZAT AKTIF</label>
                                            <div class="col-md-9 has-success">
                                                <input type="text" class="form-control" placeholder="ZAT AKTIF" id="Upzat_aktif" name="zat_aktif"></input>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">KATEGORI</label>
                                            <div class="col-md-9 has-success">
                                                <select class="form-control filled-input select2" id="Upkategori" name="kategori">
                                                    <option value="-">-</option>

                                                    <?php foreach ($kategori as $p) { ?>
                                                        <option value="<?= $p['kategori']; ?>"><?= $p['kategori']; ?></option>

                                                    <?php } ?>
                                                </select>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">STATUS</label>
                                            <div class="col-md-9 has-success">
                                                <select class="form-control filled-input select2" id="Upstatus" name="status">

                                                    <option value="AKTIF">AKTIF</option>
                                                    <option value="TIDAK AKTIF">TIDAK AKTIF</option>
                                                </select>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions mt-10 mb-20">
                                <div class="form-actions mt-10">
                                    <div class="row">
                                        <div class="col-md-6"> </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-12 text-right">
                                                    <input type="hidden" class="form-control " autocomplete="off" id="upId">
                                                    <button type="submit" class="btn btn-success mr-10" onclick="updateObat()">SIMPAN</button>
                                                    <span></span>
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
        <!--akhir modal yang akan dipakai-->

        <!--ajax-->
        <script type="text/javascript">
            function insertObat() {

                nama = $('#nama').val();
                satuan_terkecil = $('#satuan_kecil').val();
                satuan_terbesar = $('#satuan_besar').val();
                golongan_sediaan = $('#golongan_sediaan').val();
                golongan_obat = $('#golongan_obat').val();
                golongan_farmakologi = $('#golongan_farmakologi').val();
                jml_terkecil = $('#jml_terkecil').val();
                harga_cost = $('#harga_cost').val();
                ppn = $('#ppn').val();
                margin = $('#margin').val();
                min_stok = ($("#minStok").val());
                produsen = $('#produsen').val();
                distributor = $("#distributor").val();
                standar = $('#standar').val();
                kode = $('#kode').val();
                id_material = $('#id_material').val();
                zat_adiktif = $('#zat_adiktif').val();
                high_alert = $('#high_alert').val();
                standar_fornas = $('#standar_fornas').val();
                zat_aktif = $('#zat_aktif').val();
                kategori = $('#kategori').val();
                status = $('#status').val();
                diskon = $('#diskon').val();

                $().ready(function() {
                    $.ajax({
                        url: "<?php echo base_url() ?>Po_obat/insertObat",
                        method: "POST",
                        dataType: 'json',
                        data: {
                            nama: nama,
                            satuan_terkecil: satuan_terkecil,
                            satuan_terbesar: satuan_terbesar,
                            golongan_sediaan: golongan_sediaan,
                            golongan_obat: golongan_obat,
                            golongan_farmakologi: golongan_farmakologi,
                            jml_terkecil: jml_terkecil,
                            harga_cost: harga_cost,
                            ppn: ppn,
                            margin: margin,
                            min_stok: min_stok,
                            produsen: produsen,
                            distributor: distributor,
                            standar: standar,
                            kode: kode,
                            id_material: id_material,
                            zat_adiktif: zat_adiktif,
                            high_alert: high_alert,
                            standar_fornas: standar_fornas,
                            zat_aktif: zat_aktif,
                            kategori: kategori,
                            status: status,
                            diskon: diskon,
                        },
                        success: function(data) {
                            if (data.status == "success") {
                                swal({
                                    title: "good job!",
                                    type: "success",
                                    text: "Obat " + nama + " Berhasil ditambahkan",
                                    confirmButtonColor: "#3cb878",
                                });

                                //$('#username_result').html("");

                                $('#datable').DataTable().ajax.reload();
                                location.reload();
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

            function edit_obat(id_logistik) {
                $.ajax({
                    url: "<?php echo base_url() ?>Po_obat/getDataObat",
                    data: {
                        id_logistik: id_logistik,
                    },
                    type: 'POST',
                    dataType: 'json',
                    success: function(data) {
                        if (data.status_dt == "found") {
                            $("#upId").val(data.id_logistik);
                            $("#Upnama").val(data.nama);
                            $("#Upsatuan_kecil").val(data.satuan_terkecil).change();
                            $("#Upsatuan_besar").val(data.satuan_terbesar).change();
                            $("#Upgolongan_sediaan").val(data.golongan_sediaan).change();
                            $("#Upgolongan_obat").val(data.golongan_obat).change();
                            $("#Upgolongan_farmakologi").val(data.golongan_farmakologi).change();
                            $("#Upjml_terkecil").val(data.jml_satuan_terkecil);
                            $("#Upharga_cost").val(parseInt(data.harga_cost));
                            $("#UpDiskon").val((data.diskon));
                            $("#Upppn").val(data.ppn);
                            $("#Upmargin").val(data.margin);
                            $("#UpminStok").val(data.min_stok);
                            $("#Upprodusen").val(data.produsen).change();
                            $("#Updistributor").val(data.distributor).change();
                            $("#Upstandar").val(data.standar).change();
                            $("#Upkode").val(data.kode).change();
                            $("#Upid_material").val(data.id_material).change();
                            $("#Upzat_adiktif").val(data.zat_adiktif).change();
                            $("#Uphigh_alert").val(data.high_alert).change();
                            $("#Upstandar_fornas").val(data.standar_fornas).change();
                            $("#Upzat_aktif").val(data.zat_aktif).change();
                            $("#Upkategori").val(data.kategori).change();
                            $("#Upstatus").val(data.status).change();

                            $("#modal_edit_vendor").modal('show');
                        } else {
                            alert("data tidak ditemukan");
                        }
                    }
                });
            }


            function updateObat() {
                id = $("#upId").val();
                nama = $('#Upnama').val();
                satuan_terkecil = $('#Upsatuan_kecil').val();
                satuan_terbesar = $('#Upsatuan_besar').val();
                golongan_sediaan = $('#Upgolongan_sediaan').val();
                golongan_obat = $('#Upgolongan_obat').val();
                golongan_farmakologi = $('#Upgolongan_farmakologi').val();
                jml_terkecil = $('#Upjml_terkecil').val();
                harga_cost = $('#Upharga_cost').val();
                diskon = $('#UpDiskon').val();
                ppn = $('#Upppn').val();
                margin = $('#Upmargin').val();
                min_stok = ($("#UpminStok").val());
                produsen = $('#Upprodusen').val();
                distributor = $("#Updistributor").val();
                standar = $('#Upstandar').val();
                kode = $('#Upkode').val();
                id_material = $('#Upid_material').val();
                zat_adiktif = $('#Upzat_adiktif').val();
                high_alert = $('#Uphigh_alert').val();
                standar_fornas = $('#Upstandar_fornas').val();
                zat_aktif = $('#Upzat_aktif').val();
                kategori = $('#Upkategori').val();
                status = $('#Upstatus').val();

                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url() ?>Po_obat/edit_obat",
                    dataType: 'json',
                    data: {
                        id: id,
                        nama: nama,
                        satuan_terkecil: satuan_terkecil,
                        satuan_terbesar: satuan_terbesar,
                        golongan_sediaan: golongan_sediaan,
                        golongan_obat: golongan_obat,
                        golongan_farmakologi: golongan_farmakologi,
                        jml_terkecil: jml_terkecil,
                        harga_cost: harga_cost,
                        ppn: ppn,
                        margin: margin,
                        min_stok: min_stok,
                        produsen: produsen,
                        distributor: distributor,
                        standar: standar,
                        kode: kode,
                        id_material: id_material,
                        zat_adiktif: zat_adiktif,
                        high_alert: high_alert,
                        standar_fornas: standar_fornas,
                        zat_aktif: zat_aktif,
                        kategori: kategori,
                        status: status,
                        diskon: diskon,
                    },
                    success: function(data) {
                        if (data.status == "success") {
                            swal({
                                title: "good job!",
                                type: "success",
                                text: "Data Berhasil diedit",
                                confirmButtonColor: "#3cb878",
                            });

                            $("#modal_edit_vendor").modal('hide');
                            $('#datable').DataTable().ajax.reload();
                            location.reload();
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

            function hapus_obat(id_logistik) {
                swal({
                    title: "Apakah kamu yakin?",
                    text: "Menghapus data " + id_logistik + "?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3cb878",
                    confirmButtonText: "Yakin",
                    cancelButtonText: "Batal",
                    closeOnConfirm: false
                }, function() {
                    $().ready(function() {
                        $.ajax({
                            url: "<?php echo base_url() ?>Po_obat/hapus_obat",
                            method: "POST",
                            dataType: 'json',
                            data: {
                                id_logistik: id_logistik,
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
        </script>

        <script type="text/javascript">
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
                    "ajax": '<?php echo base_url('Po_obat/tampil_obat'); ?>',
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
    


        <!--end of ajax-->