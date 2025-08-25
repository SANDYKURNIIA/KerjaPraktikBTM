<!-- Row -->

<div class="panel panel-default card-view">
    <div class="panel-heading">
        <div class="pull-left">
            <h6 class="panel-title txt-dark"><span class="label label-success font-weight-100"> <?= strtoupper($judul) ?></span></h6>
        </div>
        <div class="clearfix"></div>
        <div align="right">
            <button class="btn btn-primary btn-anim mr-50" style="margin-right: 40px;" data-toggle="modal" onclick="tambah_detailx()"><i class="icon-plus"></i><span class="btn-text">BUAT BUKTI KAS</span></button>
        </div>
        <div class="row mt-30">
            <div class="col-md-12">
                <!-- <div class="col-md-3 mt-20">
                    <button class="btn btn-primary btn-anim btn-sm" onclick="tampilHariIni();"><i class="icon-rocket"></i><span class="btn-text">HARI INI </span>
                </div> -->

                <div class="col-md-3">
                    <label class="mt-0 txt-dark">Tanggal Mulai : </label>
                    <input type="date" autocomplete="off" id="inTglMulai" class="form-control">
                </div>
                <div class="col-md-3">
                    <label class="mt-0 txt-dark">Tanggal Akhir : </label>
                    <input type="date" autocomplete="off" id="inTglAkhir" class="form-control">
                </div>

                <div class="col-md-3 mt-20">
                    <button class="btn btn-primary btn-anim btn-sm1 mr-10" onclick="tampilRangePermit();"><i class="icon-rocket"></i><span class="btn-text">PILIH</span>

                </div>
                <div class="col-md-3 mt-20">
                </div>
            </div>
        </div>

    </div>
    <div class="panel-wrapper collapse in">
        <div class="panel-body">
            <div class="table-wrap">
                <div class="table-responsive">
                    <div class="row mt-30 pull-right">
                        <div class="col-md-12 ">


                        </div>
                    </div>
                    <table id="datable" class="table table-hover display pb-30" width="100%">
                        <thead>
                            <tr class="bg-success">
                                <th>NO</th>
                                <th>AKSI</th>
                                <th>TAMBAH</th>
                                <th>TANGGAL</th>
                                <th>VENDOR</th>
                                <th>TOTAL</th>
                                <th>NO BUKTI</th>
                                <th>JENIS</th>
                                <th>STAFF</th>
                                <th>STATUS DIREKTUR</th>
                                <th>STATUS CHIEF</th>
                                <th>KEMBALI</th>

                            </tr>
                        </thead>

                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="panel-wrapper collapse in">
    <div class="panel-body">
        <!-- sample modal content -->

        <div class="modal fade modal-pendaftaranakun" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <p><i class="icon-people mr-10"></i>INFO</p>

                    </div>
                    <div class="modal-body">
                        <!-- Form body  -->

                        <div class="form-body mt-20">

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Tanggal</label>
                                        <div class="col-md-9 has-success">
                                            <input type="date" placeholder="TANGGAL MASUK" value="<?php echo date("Y-m-d"); ?>" id="tgl_faktur" name="tgl_faktur" class="form-control" onchange="getNoDokumen()"></input>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <span class="help-block"></span>
                                </div>
                                <!-- span -->
                                <div class="col-md-6 mt-10">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">JENIS</label>
                                        <div class="col-md-9 has-success ">
                                            <select class="form-control filled-input select2" style="border: 1px solid lightgreen;" name="inTipe" id="inTipe">

                                                <option value="-" selected>-</option>
                                                <option value="UTANG">UTANG</option>
                                                <option value="UANG MUKA">UANG MUKA</option>
                                                <option value="LAINNYA">LAINNYA</option>
                                                <option value="PERTANGGUNG JAWABAN">PERTANGGUNG JAWABAN</option>

                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mt-10">
                                    <div class="form-group cariVendor" style="display: none;">
                                        <label class="control-label col-md-3">VENDOR</label>
                                        <div class="col-md-9 has-success ">
                                            <select class="form-control filled-input select2" style="border: 1px solid lightgreen;" name="inVendor" id="inVendor">

                                                <option value="-" selected>-</option>


                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group" id="_lainnya" style="display: none;">
                                        <label class="control-label col-md-3">VENDOR</label>
                                        <div class="col-md-9 has-success ">
                                            <input type="text" class="form-control" autocomplete="off" id="inVendor1" name="inVendor1">

                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group" id="_muka" style="display: none;">
                                        <label class="control-label col-md-3">PEGAWAI</label>
                                        <div class="col-md-9 has-success ">
                                            <input type="text" class="form-control" autocomplete="off" id="inVendor2" name="inVendor2">

                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group " id="pertanggungjwb" style="display: none;">
                                        <label class="control-label col-md-3">UANG MUKA</label>
                                        <div class="col-md-9 has-success ">
                                            <select class="form-control filled-input select2" style="border: 1px solid lightgreen;" name="inVendor3" id="inVendor3">

                                                <option value="-" selected>-</option>


                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="row" style="margin-top: 20px;margin-bottom:20px;">
                            <div class="col-md-6"> </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button onclick="simpan_bukti()" class="btn btn-primary btn-anim  btn-sm simpanBukti" style="display: none;" type="button"><i class="icon-rocket"></i><span class="btn-text">SIMPAN BUKTI KAS</span></button>

                                        <button onclick="cari()" class="btn btn-success btn-anim  btn-sm cariVendor" style="display: none;" type="button"><i class="fa fa-search"></i><span class="btn-text">Cari</span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row collapse" id="collap_vendor">
                            <div class="col-sm-12">
                                <div class="panel-wrapper collapse in">
                                    <div class="collapse" id="collap_obat_faktur1">
                                        <div class="pull-left">
                                            <h6 class="panel-title txt-dark">FORM PEMBAYARAN</h6>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div id="formObat">
                                            <div class="row">
                                                <div class="col-md-6 mt-10">
                                                    <div class="form-group ">
                                                        <label class="control-label col-md-3 mt-10">NILAI</label>
                                                        <div class="col-md-9 has-success">

                                                            <input type="text" class="form-control" id="inTotal" disabled>
                                                            <span class="help-block"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mt-10">
                                                    <div class="form-group ">
                                                        <label class="control-label col-md-3 mt-10">NILAI YANG DIBAYAR</label>
                                                        <div class="col-md-9 has-success">

                                                            <input type="text" class="form-control" id="inHarga">
                                                            <span class="help-block"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mt-10">
                                                    <div class="form-group ">
                                                        <label class="control-label col-md-3">CJ</label>
                                                        <div class="col-md-9 has-success ">
                                                            <select class="form-control filled-input select2" style="border: 1px solid lightgreen;" name="inCJ1" id="inCJ1">

                                                                <option value="-" selected>-</option>
                                                                <?php
                                                                foreach ($data_cj as $row) :
                                                                ?>
                                                                    <option value="<?php echo $row["kode"]; ?>"><?php echo $row["deskripsi"] . ' (' . $row["kode"] . ')'; ?></option>

                                                                <?php endforeach; ?>

                                                            </select>
                                                            <span class="help-block"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6"> </div>
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-offset-3 col-md-9">

                                                            <input type="hidden" class="form-control " autocomplete="off" id="upId">
                                                            <input type="hidden" class="form-control " autocomplete="off" id="no_dok" value="<?php
                                                                                                                                                $noValidR =  sprintf('%04d', $max, 'dyhtdyu');
                                                                                                                                                echo $noDokR = $noValidR . "/" . "BP" . "/" . date('my');
                                                                                                                                                ?>">
                                                            <button class="btn btn-primary mr-10" onclick="insertObatFaktur()">SIMPAN</button>
                                                            <span></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pull-left">
                                        <h6 class="panel-title txt-dark">LIST HUTANG</h6>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="table-wrap">
                                        <div class="table-responsive">
                                            <div class="row mt-30 pull-right">
                                                <div class="col-md-12 ">
                                                </div>
                                            </div>
                                            <table id="table_vendor" class="table table-striped  table-hover display pb-30" width="100%">
                                                <thead>
                                                    <tr class="bg-success">
                                                        <!-- <th><label for="check_all"><input id="check_all" type="checkbox" onClick="toggle(this)"> All</label></br></th> -->
                                                        <th>AKSI</th>
                                                        <th>NO JURNAL</th>
                                                        <th>TGL JURNAL</th>
                                                        <th>NO PO</th>
                                                        <th>NPB</th>
                                                        <th>NO FAKTUR</th>
                                                        <th>VENDOR</th>
                                                        <th>KODE VENDOR</th>
                                                        <th>NILAI OUT STANDING</th>
                                                        <th>NILAI YANG DIBAYAR</th>
                                                    </tr>
                                                </thead>

                                            </table>

                                        </div>
                                    </div>
                                    <div class="row mt-20 mb-20" style="margin-left: 10px;">
                                        <div class="col-md-6">

                                            <button onclick="simpan_bukti()" class="btn btn-primary btn-anim  btn-lg" type="button"><i class="icon-rocket"></i><span class="btn-text">SIMPAN BUKTI KAS</span></button>

                                        </div>
                                        <div class="col-md-6">
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
                </div>

            </div>
            <!-- /.modal-content -->
        </div>

        <div class="modal fade" id="modal_add" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <p><i class="icon-people mr-10"></i>INFO</p>

                    </div>
                    <div class="modal-body">
                        <!-- Form body  -->

                        <div class="form-body mt-20">
                            <div class="form-wrap">


                                <div class="row">

                                    <div class="col-md-6 mt-10">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">NO DOKUMEN</label>
                                            <div class="col-md-9 has-error">
                                                <input type="text" class="form-control" readonly id="no_dok1">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-10">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">KATEGORI</label>
                                            <div class="col-md-9 has-success ">
                                                <select class="form-control filled-input select2" style="border: 1px solid lightgreen;" name="inKategori" id="inKategori">

                                                    <option value="">PILIH</option>
                                                    <?php
                                                    foreach ($pelayanan as $row) :
                                                    ?>
                                                        <option value="<?php echo $row["id_akun"]; ?>"><?php echo $row["deskripsi"] . ' (' . $row["kode"] . ')'; ?></option>

                                                    <?php endforeach; ?>
                                                </select>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-10">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3 mt-10">NO PK</label>
                                            <div class="col-md-9 has-success">
                                                <input type="text" class="form-control" autocomplete="off" id="inPK">

                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-10">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">SUB KATEGORI</label>
                                            <div class="col-md-9 has-success ">
                                                <select class="form-control filled-input select2" style="border: 1px solid lightgreen;" name="inJenis" id="inJenis">

                                                </select>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-10">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3 mt-10">DESKRIPSI</label>
                                            <div class="col-md-9 has-success">
                                                <input type="text" class="form-control" autocomplete="off" id="inDesk">

                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-10">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">LIST</label>
                                            <div class="col-md-9 has-success ">
                                                <select class="form-control filled-input select2" style="border: 1px solid lightgreen;" name="inPelayanan" id="inPelayanan">

                                                </select>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-6 mt-10">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3 mt-10">NILAI</label>
                                            <div class="col-md-9 has-success">
                                                <input type="number" class="form-control" autocomplete="off" value="0" id="inNilai">

                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mt-10">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">TIPE</label>
                                            <div class="col-md-9 has-success ">
                                                <select class="form-control filled-input select2" style="border: 1px solid lightgreen;" name="inTipe1" id="inTipe1">

                                                    <option value="-" selected>-</option>
                                                    <option value="DEBIT">DEBIT</option>
                                                    <option value="KREDIT">KREDIT</option>

                                                </select>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mt-10">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">CJ</label>
                                            <div class="col-md-9 has-success ">
                                                <select class="form-control filled-input select2" style="border: 1px solid lightgreen;" name="inCJ" id="inCJ">

                                                    <option value="-" selected>-</option>
                                                    <?php
                                                    foreach ($data_cj as $row) :
                                                    ?>
                                                        <option value="<?php echo $row["kode"]; ?>"><?php echo $row["deskripsi"] . ' (' . $row["kode"] . ')'; ?></option>

                                                    <?php endforeach; ?>

                                                </select>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 20px;">
                                    <div class="col-md-6"> </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">
                                                <button type="submit" style="display: block;" class="btn btn-success mr-10" onclick="insertFaktur()">TAMBAH</button>
                                                <span></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>

                        </div>
                    </div>
                    <div>
                        <form class="form-wrap collapse" id="edit_form">

                            <h5 class="modal-title mt-10 ml-10" id="myLargeModalLabel"><i class="icon-user mr-10"></i> EDIT JURNAL
                            </h5>
                            <hr>
                            <div class="row">
                                <div class="col-md-6 mt-10">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3 mt-10">NO PK</label>
                                        <div class="col-md-9 has-success">
                                            <input type="text" class="form-control" autocomplete="off" id="upPK">

                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mt-10">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">KATEGORI</label>
                                        <div class="col-md-9 has-success ">
                                            <select class="form-control filled-input select2" style="border: 1px solid lightgreen;" name="upKategori" id="upKategori" onchange="">

                                                <option value="-">PILIH</option>
                                                <?php
                                                foreach ($pelayanan as $row) :
                                                ?>
                                                    <option value="<?php echo $row["id_akun"]; ?>"><?php echo $row["deskripsi"] . ' (' . $row["kode"] . ')'; ?></option>

                                                <?php endforeach; ?>
                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mt-10">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3 mt-10">DESKRIPSI</label>
                                        <div class="col-md-9 has-success">
                                            <input type="text" class="form-control" autocomplete="off" id="upDesk">

                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 mt-10">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">SUB KATEGORI</label>
                                        <div class="col-md-9 has-success ">
                                            <select class="form-control filled-input select2" style="border: 1px solid lightgreen;" name="upJenis" id="upJenis" onchange="getList()">

                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mt-10">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3 mt-10">NILAI</label>
                                        <div class="col-md-9 has-success">
                                            <input type="number" class="form-control" autocomplete="off" value="0" id="upNilai">

                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mt-10">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">LIST</label>
                                        <div class="col-md-9 has-success ">
                                            <select class="form-control filled-input select2" style="border: 1px solid lightgreen;" name="upPelayanan" id="upPelayanan">

                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-6 mt-10">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">TIPE</label>
                                        <div class="col-md-9 has-success ">
                                            <select class="form-control filled-input select2" style="border: 1px solid lightgreen;" name="upTipe" id="upTipe">

                                                <option value="-" selected>-</option>
                                                <option value="DEBIT">DEBIT</option>
                                                <option value="KREDIT">KREDIT</option>

                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mt-10">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">CJ</label>
                                        <div class="col-md-9 has-success ">
                                            <select class="form-control filled-input select2" style="border: 1px solid lightgreen;" name="upCJ" id="upCJ">

                                                <option value="-" selected>-</option>
                                                <?php
                                                foreach ($data_cj as $row) :
                                                ?>
                                                    <option value="<?php echo $row["kode"]; ?>"><?php echo $row["deskripsi"] . ' (' . $row["kode"] . ')'; ?></option>

                                                <?php endforeach; ?>

                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row" style="margin-top: 20px;">
                                <div class="col-md-6"> </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-9">
                                            <input type="hidden" class="form-control" autocomplete="off" id="upIdBK">
                                            <input type="hidden" class="form-control" autocomplete="off" id="data_sub_kategori">
                                            <input type="hidden" class="form-control" autocomplete="off" id="data_list">

                                            <button type="button" style="display: block;" class="btn btn-info mr-10" onclick="edit_bukti_kas()">EDIT BUKTI KAS</button>
                                            <!-- <button type="submit" style="display: none;" class="btn btn-warning mr-10" onclick="insertObatFaktur()">EDIT</button> -->
                                            <span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </form>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="panel-wrapper collapse in">

                                    <div class="pull-left">
                                        <h6 class="panel-title txt-dark">LIST BUKTI KAS</h6>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="table-wrap">
                                        <div class="table-responsive">
                                            <div class="row mt-30 pull-right">
                                                <div class="col-md-12 ">
                                                </div>
                                            </div>
                                            <table id="table_bk" class="table table-striped  table-hover display pb-30" width="100%">
                                                <thead>
                                                    <tr class="bg-success">

                                                        <th>HAPUS</th>
                                                        <th>EDIT</th>
                                                        <th>KODE AKUN</th>
                                                        <th>CJ</th>
                                                        <th>URAIAN</th>
                                                        <th>TOTAL</th>
                                                    </tr>
                                                </thead>

                                            </table>

                                        </div>
                                    </div>
                                    <div class="row mt-20 mb-20" style="margin-left: 10px;">
                                        <div class="col-md-6">
                                        </div>
                                        <div class="col-md-6">
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
                    </div>
                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</div>
<div id="div_result" style="display: none;">

</div>
<style>
    td {
        color: black;
    }
</style>

<script type="text/javascript">
    function getNoDokumen() {
        var tanggal = $('#tgl_faktur').val();

        $.ajax({
            url: "<?= base_url() . 'Jurnal_farmasi/getNoDokumen' ?>",
            data: {
                tanggal: tanggal,
            },
            type: 'POST',
            dataType: 'json',
            success: function(data) {
                $('#no_dok').val(data);

            }
        });

    }



    function tambah_detailx() {
        $.ajax({
            url: "<?= base_url() . 'Jurnal_farmasi/getVendor_buktiKas' ?>",
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                var html = '';
                var i;
                html = '<option>-</option>';
                for (i = 0; i < data.length; i++) {
                    html += '<option value=' + data[i].id_vendor + '>' + data[i].vendor + '</option>';
                }
                $('#inVendor').html(html);
            }
        });
        $('.simpanBukti').hide();
        $('#_lainnya').hide();
        $('#_muka').hide();
        $('#pertanggungjwb').hide();
        $('.cariVendor').hide();
        $("#collap_obat_faktur1").collapse('hide');
        $("#collap_vendor").collapse('hide');
        $(".modal-pendaftaranakun").modal('show');
    }

    function cari() {
        vendor = $('#inVendor').val();

        $('#table_vendor').dataTable().fnClearTable();
        $('#table_vendor').dataTable().fnDestroy();
        $('#table_vendor').DataTable({
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
            "ajax": {
                "url": '<?php echo base_url('Jurnal_farmasi/tampil_vendor_bukti_kas'); ?>',
                "type": 'POST',
                "data": {
                    idFaktur: vendor
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
        $("#collap_vendor").collapse('toggle');
        reload_total_harga();

    }

    function pilih_list_faktur(id_detail, total) {
        $("#upId").val(id_detail);
        $("#inTotal").val(total);
        $("#inHarga").val(total);
        $("#collap_obat_faktur1").collapse('toggle');
    }

    function insertObatFaktur() {
        id_faktur = $("#upId").val();
        harga = $("#inHarga").val();
        no_dok = $("#no_dok").val();
        vendor = $("#inVendor").val();
        cj = $("#inCJ1").val();
        // alert(total);
        var str = no_dok + "";
        noIndex = str.substring(0, 4);
        dataString = 'idFaktur=' + id_faktur + '&harga=' + harga + '&max=' + noIndex +
            '&no_dok=' + no_dok +
            '&vendor=' + vendor +'&cj=' + cj;


        $.ajax({
            url: "<?= base_url() . 'Jurnal_farmasi/insertdetail_buktikas' ?>",
            method: "POST",
            dataType: 'json',
            data: dataString,
            success: function(data) {
                if (data.status == "success") {
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "FAKTUR Berhasil ditambahkan",
                        confirmButtonColor: "#3cb878",
                    });
                    $("#collap_obat_faktur1").collapse('hide');
                    $("#upId").val("");
                    $("#inHarga").val("");
                    $('#outTotalHarga').DataTable().ajax.reload();
                    $('#table_vendor').DataTable().ajax.reload();

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

    function simpan_bukti() {
        no_dok = $("#no_dok").val();
        tipe = $("#inTipe").val();
        if (tipe == 'LAINNYA') {
            vendor = $("#inVendor1").val();
            pk = '';
        } else if (tipe == 'UANG MUKA') {
            vendor = $("#inVendor2").val();
            pk = '';
        } else if (tipe == 'UTANG') {
            vendor = $("#inVendor").val();
            pk = '';

        } else {
            var a = $("#inVendor3").val();
            var splitA = a.split('|');
            vendor = splitA[1];
            pk = splitA[0];

        }
        tgl_faktur = $("#tgl_faktur").val();
        // alert(total);
        var str = no_dok + "";
        noIndex = str.substring(0, 4);
        dataString = 'no_dok=' + no_dok + '&tipe=' + tipe + '&vendor=' + vendor +
            '&tgl_faktur=' + tgl_faktur + '&max=' + noIndex +
            '&pk=' + pk;


        $.ajax({
            url: "<?= base_url() . 'Jurnal_farmasi/simpan_bukti' ?>",
            method: "POST",
            dataType: 'json',
            data: dataString,
            success: function(data) {
                if (data.status == "success") {
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Bukti Kas " + no_dok + " Berhasil Disimpan",
                        confirmButtonColor: "#3cb878",
                    });
                    $("#collap_obat_faktur1").collapse('hide');
                    $("#collap_vendor").collapse('hide');
                    if (tipe == 'LAINNYA') {
                        $('#inVendor1').val('');
                    } else if (tipe == 'UANG MUKA') {
                        $("#inVendor2").val('');
                    } else {
                        $('#inVendor').val('-').change();
                    }
                    location.reload();
                    // $(".modal-pendaftaranakun").modal('hide');
                    // $('#datable').DataTable().ajax.reload();

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

    function reload_total_harga() {
        id_faktur = $("#no_dok").val();
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
                "url": '<?php echo base_url('Jurnal_farmasi/tampil_total_bukti_kas'); ?>',
                "type": 'POST',
                "data": {
                    idFaktur: id_faktur
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
                "url": '<?= base_url('Jurnal_farmasi/tampil_bukti_kas'); ?>',

            },
            "deferRender": true,
            "processing": true,
            "order": [],
            "columnDefs": [{
                "targets": [0],
                "orderable": false,
            }, ],
        });
    });

    function tampilHariIni() {
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
                "url": '<?= base_url('Jurnal_farmasi/tampil_bukti_kas'); ?>',

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

    function tampilRangePermit(mulai, akhir, jenis_klaim) {
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
                "url": '<?= base_url('Jurnal_farmasi/tampil_bukti_kas'); ?>',
                "type": 'POST',
                "data": {
                    mulai: mulai,
                    akhir: akhir,


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

    function convertToRupiah(angka) {
        var rupiah = '';
        var angkarev = angka.toString().split('').reverse().join('');
        for (var i = 0; i < angkarev.length; i++)
            if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + '.';
        return 'Rp. ' + rupiah.split('', rupiah.length - 1).reverse().join('');
    }

    /////////////////
</script>
<script type="text/javascript">
    function cetak(no_jurnal) {

        $.ajax({
            type: 'POST',
            url: "<?= base_url() . 'Jurnal_farmasi/cetak_bukti_kas' ?>",
            data: {
                no_jurnal: no_jurnal,
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
                }, 100);
            }
        });
    }
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#inTipe').change(function() {
            var tipe = $('#inTipe').val();
            if (tipe == 'LAINNYA') {
                $('.simpanBukti').show();
                $('#_lainnya').show();
                $('#_muka').hide();
                $('#pertanggungjwb').hide();

                $('.cariVendor').hide();
            } else if (tipe == 'UANG MUKA') {
                $('.simpanBukti').show();
                $('#_muka').show();
                $('#_lainnya').hide();
                $('#pertanggungjwb').hide();
                $('.cariVendor').hide();
            } else if (tipe == 'UTANG') {

                $('#_lainnya').hide();
                $('#_muka').hide();
                $('#pertanggungjwb').hide();
                $('.simpanBukti').hide();
                $('.cariVendor').show();
            } else {

                $('#_lainnya').hide();
                $('#_muka').hide();
                $('#pertanggungjwb').show();
                $('.simpanBukti').show();
                $('.cariVendor').hide();
                getUangMuka();
            }

        });
        $('#inKategori').change(function() {
            var upNama = $('#inKategori').val();
            if (upNama != '') {
                $.ajax({
                    url: "<?= base_url() . 'Jurnal_manual/get_beban_usaha' ?>",
                    data: {
                        jenis: upNama,
                    },
                    type: 'POST',
                    dataType: 'json',
                    success: function(data) {
                        var html = '';
                        var i;
                        html = '<option>-</option>';
                        for (i = 0; i < data.length; i++) {
                            html += '<option value=' + data[i].id_detail + '|' + data[i].id_akun + '>' + data[i].deskripsi + ' (' + data[i].kode + ')</option>';
                        }
                        $('#inJenis').html(html);
                    }
                });
            } else {
                $('#inJenis').html('<option value="">-</option>');
            }

        });
        $('#inJenis').change(function() {
            var upNama = $('#inKategori').val();
            var a = $('#inJenis').val();
            splitDiag = a.split("|");
            upJenis = splitDiag[0];
            if (upNama != '' && upJenis != '') {
                $.ajax({
                    url: "<?= base_url() . 'Jurnal_manual/get_detail_akun' ?>",
                    data: {
                        kategori: upNama,
                        jenis: upJenis,
                    },
                    type: 'POST',
                    dataType: 'json',
                    success: function(data) {
                        var html = '';
                        var i;
                        html = '<option>-</option>';
                        for (i = 0; i < data.length; i++) {
                            html += '<option value="' + data[i].kode + '|' + data[i].deskripsi + '|' + '">' + data[i].deskripsi + ' (' + data[i].kode + ')</option>';
                        }
                        $('#inPelayanan').html(html);
                    }
                });
            } else {
                $('#inPelayanan').html('<option value="">-</option>');
            }

        });

        $('#upKategori').change(function() {
            var upNama = $('#upKategori').val();
            if (upNama != '-') {
                $.ajax({
                    url: "<?= base_url() . 'Jurnal_manual/get_beban_usaha' ?>",
                    data: {
                        jenis: upNama,
                    },
                    type: 'POST',
                    dataType: 'json',
                    success: function(data) {
                        var html = '';
                        var i;
                        html = '<option value="-">-</option>';
                        for (i = 0; i < data.length; i++) {
                            html += '<option value=' + data[i].id_detail + '|' + data[i].id_akun + '>' + data[i].deskripsi + ' (' + data[i].kode + ')</option>';
                        }
                        $('#upJenis').html(html);
                    }
                });
            } else {
                $('#upJenis').html('<option value="-">-</option>');
            }

        });

        $('.modal-pendaftaranakun').on('hidden.bs.modal', function() {
            id_faktur = $("#no_dok").val();
            $.ajax({
                url: "<?php echo base_url() ?>Jurnal_farmasi/batal_buktikas",
                method: "POST",
                dataType: 'json',
                data: {
                    no_dok: id_faktur,
                },
                success: function(data) {
                    location.reload();
                }
            });
        });
    });

    function insertFaktur() {

        pelayanan = $("#inPelayanan").val();
        kategori = $('#inKategori').val();
        id_jenis = $("#inJenis").val();
        deskripsi = $("#inDesk").val();
        pk = $("#inPK").val();
        nilai = $("#inNilai").val();
        tipe = $("#inTipe1").val();
        no_dokumen = $('#no_dok1').val();
        cj = $("#inCJ").val();

        $().ready(function() {
            $.ajax({
                url: "<?php echo base_url() ?>Jurnal_farmasi/addBk",
                method: "POST",
                dataType: 'json',
                data: {
                    no_dokumen: no_dokumen,
                    pelayanan: pelayanan,
                    kategori: kategori,
                    id_jenis: id_jenis,
                    deskripsi: deskripsi,
                    pk: pk,
                    nilai: nilai,
                    tipe: tipe,
                    cj: cj

                },
                success: function(data) {
                    if (data.status == "success") {
                        swal({
                            title: "good job!",
                            type: "success",
                            text: "Bukti Kas " + no_dokumen + " Berhasil ditambahkan",
                            confirmButtonColor: "#3cb878",
                        });
                        $('#table_bk').DataTable().ajax.reload();
                        $('#outTotalHarga1').DataTable().ajax.reload();
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
        return false;
    }

    function bukti_kas($id) {

        $("#modal_add").modal('show');
        $("#no_dok1").val($id);
        reload_isi_faktur($id);
        reload_total_harga_1($id);
    }

    function getUangMuka() {
        $.ajax({
            url: "<?= base_url() . 'Jurnal_farmasi/getUangMuka' ?>",
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                var html = '';
                var i;
                html = '<option>-</option>';
                for (i = 0; i < data.length; i++) {
                    html += '<option value="' + data[i].no_dokumen + '|' + data[i].vendor + '">' + data[i].vendor + ' (' + convertCurenncy(data[i].total) + ')</option>';
                }
                $('#inVendor3').html(html);
            }
        })
    }

    function reload_isi_faktur(vendor) {

        $('#table_bk').dataTable().fnClearTable();
        $('#table_bk').dataTable().fnDestroy();
        $('#table_bk').DataTable({
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
            "ajax": {
                "url": '<?php echo base_url('Jurnal_farmasi/tampil_detail_bukti_kas'); ?>',
                "type": 'POST',
                "data": {
                    idFaktur: vendor
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
        $("#collap_vendor").collapse('toggle');

    }

    function reload_total_harga_1(id_faktur) {
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
                "url": '<?php echo base_url('Jurnal_farmasi/tampil_total_bukti_kas'); ?>',
                "type": 'POST',
                "data": {
                    idFaktur: id_faktur
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

    function verifikasi(no_dokumen, status, tipe) {
        if (status == 99) {
            mess = "Dibatalkan";
        } else {
            mess = "Disimpan"
        }

        $.ajax({
            url: "<?= base_url() . 'Jurnal_farmasi/verifikasi' ?>",
            data: {
                no_dok: no_dokumen,
                status: status,
                tipe: tipe
            },
            type: 'POST',
            dataType: 'json',
            success: function(data) {
                if (data.status == "success") {
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Bukti Kas " + no_dokumen + " Berhasil " + mess,
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

    function hapus_faktur(id_faktur) {
        swal({
            title: "Apakah kamu yakin?",
            text: "Menghapus data ini?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3cb878",
            confirmButtonText: "Yakin",
            cancelButtonText: "Batal",
            closeOnConfirm: false
        }, function() {
            $().ready(function() {
                $.ajax({
                    url: "<?php echo base_url() ?>Jurnal_farmasi/hapus_addBK",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        id_faktur: id_faktur,
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
                            $('#table_bk').DataTable().ajax.reload();
                            $('#outTotalHarga1').DataTable().ajax.reload();
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

    function kembalikan_bk(no) {
        swal({
            title: "Apakah kamu yakin?",
            text: "Mengembalikan no dokumen " + no + "?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3cb878",
            confirmButtonText: "Yakin",
            cancelButtonText: "Batal",
            closeOnConfirm: false
        }, function() {
            $().ready(function() {
                $.ajax({
                    url: "<?php echo base_url() ?>Jurnal_farmasi/kembalikan_bk",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        no: no,
                    },
                    success: function(data) {
                        if (data.status == "success") {
                            swal({
                                title: "good job!",
                                type: "success",
                                text: "Bukti Kas berhasil dikembalikan",
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
<script>
    function edit_bukti_kas() {
        pelayanan = $("#upPelayanan").val();
        kategori = $('#upKategori').val();
        id_jenis = $("#upJenis").val();
        deskripsi = $("#upDesk").val();
        pk = $("#upPK").val();
        nilai = $("#upNilai").val();
        tipe = $("#upTipe").val();
        id_detail = $("#upIdBK").val();
        // source = $("#inSource").val();
        // jk = $("#jk").val();
        cj = $("#upCJ").val();
        $().ready(function() {
            $.ajax({
                url: "<?php echo base_url() ?>Jurnal_farmasi/edit_bukti_kas",
                method: "POST",
                dataType: 'json',
                data: {
                    id_detail: id_detail,
                    pelayanan: pelayanan,
                    kategori: kategori,
                    id_jenis: id_jenis,
                    deskripsi: deskripsi,
                    pk: pk,
                    nilai: nilai,
                    tipe: tipe,
                    // jk: jk,
                    cj: cj,
                    // source: source,
                },
                success: function(data) {
                    if (data.status == "success") {
                        swal({
                            title: "good job!",
                            type: "success",
                            text: "Data Berhasil diedit",
                            confirmButtonColor: "#3cb878",
                        });

                        $('#edit_form').collapse('hide');
                        $('#edit_form')[0].reset();
                        $('#table_bk').DataTable().ajax.reload();

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

    function edit_faktur(id_detail, tipe) {
        // alert(no_dokumen);
        $("#inSource").val(tipe);
        $("#upIdBK").val(id_detail);

        $('#edit_form').collapse('show');
        $.ajax({
            url: "<?= base_url() . 'Jurnal_farmasi/edit_addBk' ?>",
            data: {
                id_detail: id_detail,
                tipe: tipe,
            },
            type: 'POST',
            dataType: 'json',
            success: function(data) {
                $('#upKategori').val(data.kode1).change();

                getSubKategori(data.kode1);
                $("#data_sub_kategori").val(data.kode2 + '|' + data.kode1);
                $("#data_list").val(data.kode3 + '|' + data.desk + '|');
                $("#upDesk").val(data.deskripsi);
                $("#upPK").val(data.no_pk).change();
                $("#upNilai").val(data.nilai);
                $("#upTipe").val(data.tipe).change();
                // $("#upCj").val(data.cj).change();

            }
        });

        $("#modalTambahObatFaktur").modal('show');
    }
    $('#modalTambahObatFaktur').on('hidden.bs.modal', function() {
        $("#inDesk").val('');
        $("#inPK").val('');
        $("#upDesk").val('');
        $("#upPK").val('');
        $('#edit_form').collapse('hide');

    })

    function getSubKategori(nama) {
        if (nama != '-') {
            $.ajax({
                url: "<?= base_url() . 'Jurnal_manual/get_beban_usaha' ?>",
                data: {
                    jenis: nama,
                },
                type: 'POST',
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    var i;
                    html = '<option value="-">-</option>';
                    for (i = 0; i < data.length; i++) {
                        html += '<option value="' + data[i].id_detail + '|' + data[i].id_akun + '">' + data[i].deskripsi + ' (' + data[i].kode + ')</option>';
                    }
                    $('#upJenis').html(html);
                    jenis = $('#data_sub_kategori').val();
                    $('#upJenis').val(jenis).change();
                    getList();
                }
            });
        } else {
            $('#upJenis').html('<option value="-">-</option>');
        }

    }

    function getList() {
        var upNama = $('#upKategori').val();
        var a = $('#upJenis').val();
        splitDiag = a.split("|");
        upJenis = splitDiag[0];
        if (upNama != '-' && upJenis != '-') {
            $.ajax({
                url: "<?= base_url() . 'Jurnal_manual/get_detail_akun' ?>",
                data: {
                    kategori: upNama,
                    jenis: upJenis,
                },
                type: 'POST',
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    var i;
                    html = '<option value="-">-</option>';
                    for (i = 0; i < data.length; i++) {
                        html += '<option value="' + data[i].kode + '|' + data[i].deskripsi + '|' + '">' + data[i].deskripsi + ' (' + data[i].kode + ')</option>';
                    }
                    $('#upPelayanan').html(html);
                    list = $('#data_list').val();
                    $('#upPelayanan').val(list).change();
                }
            });
        } else {
            $('#upPelayanan').html('<option value="-">-</option>');
        }

    }
</script>