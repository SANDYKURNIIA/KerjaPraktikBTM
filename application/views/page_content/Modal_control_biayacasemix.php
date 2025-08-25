<div class="panel-wrapper collapse in">
    <div class="panel-body">
        <!-- sample modal content -->
        <div class="modal fade bs-example-modal-lg" id="modal_edit_data" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h5 class="modal-title" id="myLargeModalLabel"><i class="icon-user mr-10"></i> EDIT KUNJUNGAN
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
                                            <label class="control-label col-md-3">TIPE MASUK</label>
                                            <div class="col-md-9 has-success" id="the-basics">
                                                <input type="text" autocomplete="off" class="form-control " placeholder="TIPE MASUK" disabled="" name="tipe_masuk" id="tipe_masuk">
                                                <input type="hidden" class="form-control " id="idPelayanan" name="idPelayanan">
                                                <input type="hidden" class="form-control " id="idHis" name="idHis">
                                                <input type="hidden" class="form-control " id="NamaPasien" name="NamaPasien">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">TANGGAL KUNJUNGAN</label>
                                            <div class="col-md-9 has-error">
                                                <input type="text" class="form-control " placeholder="TANGGAL KUNJUNGAN" disabled="" id="inTanggalKunjugan" name="TanggalKunjugan">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <span class="help-block"></span>
                                <!-- /Row -->

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">NAMA DOKTER (DPJP)</label>
                                            <div class="col-md-9 has-success">
                                                <select class="form-control  select2" placeholder="PILIH NAMA DOKTER" style="border: 1px solid lightgreen;" tabindex="1" id="inDPJP1" name="namaDPJP">
                                                    <?php
                                                    foreach ($data_dokter as $row) :
                                                    ?>
                                                        <option value="<?php echo $row['id_dokter'] ?>">
                                                            <?php echo $row['nama'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">CARA BAYAR</label>
                                            <div class="col-md-9 has-success">
                                                <select class="form-control  select2" placeholder="PILIH CARA BAYAR" style="border: 1px solid lightgreen;" tabindex="1" id="inCaraBayar1" name="CaraBayar">
                                                    <?php
                                                    foreach ($data_cara_bayar as $row) :
                                                    ?>
                                                        <option value="<?php echo $row->id_cara_bayar; ?>">
                                                            <?php echo $row->nama_bayar; ?></option>
                                                    <?php endforeach ?>

                                                </select>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <!-- /Row -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">ASAL PASIEN</label>
                                            <div class="col-md-9 has-success">
                                                <select class="form-control  select2" placeholder="PILIH KATEGORI" style="border: 1px solid lightgreen;" tabindex="1" id="inAsalPasien" name="AsalPasien">
                                                    <?php
                                                    foreach ($data_asal_pasien as $row) :
                                                    ?>
                                                        <option value="<?php echo $row->id_asal_pasien; ?>">
                                                            <?php echo $row->nama_asal; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6" style="margin-top:-1em;">
                                        <div class="form-group">
                                            <span class="help-block"></span>
                                            <label class="control-label col-md-3 pt-10">DIAGNOSA</label>
                                            <div class="col-md-9 has-success" id="the-basics">
                                                <input class="typeahead form-control " type="text" placeholder="Diagnosa" id="inDiagnosa1" name="inDiagnosa" style="width: 284.17px;">
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Row -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <span class="help-block"></span>
                                            <label class="control-label col-md-3">NO SEP / SLIP</label>
                                            <div class="col-md-9 has-success">
                                                <input type="text" style="border: 1px solid lightgreen;" autocomplete="off" class="form-control " placeholder="NO SEP" name="NoSEP" id="inNoSEP">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <span class="help-block"></span>
                                            <label class="control-label col-md-3">RUANG INAP</label>
                                            <div class="col-md-9 has-success">
                                                <select class="form-control  select2" placeholder="NAMA POLI" style="border: 1px solid lightgreen;" tabindex="1" id="inNaPol" name="NamaPoli">
                                                    <?php
                                                    foreach ($data_nama_ruangan as $row) :
                                                    ?>
                                                        <option value="<?php echo $row->id_ruangan; ?>">
                                                            <?php echo $row->nama; ?></option>
                                                    <?php endforeach; ?>
                                                    >
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button onclick="edit_rawat_inap()" class="btn btn-success btn-anim  btn-sm"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
                            <button type="button" class="btn btn-danger text-left" data-dismiss="modal">Close</button>
                    </div>
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
                        <h5 class="modal-title mt-10" id="myLargeModalLabel"><i class="icon-user mr-10"></i> TINDAKAN PASIEN CASEMIX
                        </h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-body">
                            <h6 class="txt-dark capitalize-font"><i class="icon-user mr-10"></i>INFO</h6>
                            <hr>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label col-md-4">JENIS PELAYANAN</label>
                                        <div class="col-md-7 has-success">
                                            <input type="text" class="form-control  " disabled="" id="inJenisPel">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-4">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">KELAS</label>
                                        <div class="col-md-9 has-success">
                                            <input type="text" class="form-control  " disabled="" id="inKelas">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-4">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">NO BPJS</label>
                                        <div class="col-md-9 has-success">
                                            <input type="text" class="form-control  " disabled="" id="inNoBpjs">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">DPJP</label>
                                        <div class="col-md-9 has-success">
                                            <input type="text" class="form-control  " disabled="" id="inDPJP">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">TANGGAL MASUK</label>
                                        <div class="col-md-9 has-success">
                                            <input type="text" class="form-control  " disabled="" id="inTglMasuk">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">TANGGAL KELUAR</label>
                                        <div class="col-md-9 has-success">
                                            <input type="text" class="form-control  " disabled="" id="inTglKeluar" value="<?php date_default_timezone_set('Asia/Jakarta');
                                                                                                                            echo date('Y-m-d H:i:s'); ?>">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!--/span-->

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">NO RM</label>
                                        <div class="col-md-9 has-success">
                                            <input type="text" class="form-control  " disabled="" id="inNoRm">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-4">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">NAMA</label>
                                        <div class="col-md-9 has-success">
                                            <input type="text" class="form-control  " disabled="" id="inNama">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">SEP</label>
                                        <div class="col-md-9 has-success">
                                            <input type="text" class="form-control  " disabled="" id="inSEP">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->

                                <!--/span-->
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">TANGGAL LAHIR</label>
                                        <div class="col-md-9 has-success">
                                            <input type="text" class="form-control  " disabled="" id="inTglLahir">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">CARA BAYAR</label>
                                        <div class="col-md-9 has-success">
                                            <input type="text" class="form-control  " disabled="" id="inCaraBayar">
                                            <input type="hidden" id="inGender">
                                            <input type="hidden" id="idHistory">
                                            <input type="hidden" id="idPel">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">BERAT LAHIR</label>
                                        <div class="col-md-9 has-success">
                                            <input type="text" class="form-control  " id="inBeratLahir" placeholder="Kg">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">CARA PULANG</label>
                                        <div class="col-md-9 has-success">
                                            <select class="form-control  select2" id="inCaraPulang">
                                                <option value="-">-</option>
                                                <option value="1">PERSETUJUAN DOKTER</option>
                                                <option value="2">DIRUJUK</option>
                                                <option value="3">PERMINTAAN SENDIRI</option>
                                                <option value="4">MENINGGAL</option>
                                                <option value="5">LAIN-LAIN</option>
                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">JAMINAN</label>
                                        <div class="col-md-9 has-success">
                                            <select class="form-control  select2" id="inJaminan">
                                                <option value="-">-</option>
                                                <option value="3|JKN">JKN</option>
                                                <option value="71|COVID-19">JAMINAN COVID-19</option>
                                                <option value="5|001">JAMKESDA</option>
                                                <option value="6|JKS">JAMKESOS</option>
                                                <option value="1|999">PASIEN BAYAR</option>
                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <h6 class="txt-dark capitalize-font"><i class="icon-user mr-10"></i>TARIF</h6>
                            <hr>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">NON BEDAH</label>
                                        <div class="col-md-9 has-success">
                                            <input type="text" class="form-control  " disabled="" id="inNonBedah">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">BEDAH</label>
                                        <div class="col-md-9 has-success">
                                            <input type="text" class="form-control  " disabled="" id="inBedah">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">KONSUL TASI</label>
                                        <div class="col-md-9 has-success">
                                            <input type="text" class="form-control  " disabled="" id="inKonsul">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->



                                <!--/span-->
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">TENAGA AHLI</label>
                                        <div class="col-md-9 has-success">
                                            <input type="text" class="form-control  " disabled="" id="inTeAhli">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">KEPERA WATAN</label>
                                        <div class="col-md-9 has-success">
                                            <input type="text" class="form-control  " disabled="" id="inKeperawatan">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">PENUN JANG</label>
                                        <div class="col-md-9 has-success">
                                            <input type="text" class="form-control  " disabled="" id="inPenunjang">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>



                                <!--/span-->
                            </div>
                            <!-- /Row -->
                            <div class="row">
                                <!--/span-->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">RADIO LOGI</label>
                                        <div class="col-md-9 has-success">
                                            <input type="text" class="form-control  " disabled="" id="inRadio">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-4">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">LABORA TORIUM</label>
                                        <div class="col-md-9 has-success">
                                            <input type="text" class="form-control  " disabled="" id="inLabor">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">PELAYA NAN DARAH</label>
                                        <div class="col-md-9 has-success">
                                            <input type="text" class="form-control  " disabled="" id="inPelDarah">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>



                                <!--/span-->
                            </div>
                            <!-- /Row -->
                            <div class="row">
                                <!--/span-->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">REHABI LITASI</label>
                                        <div class="col-md-9 has-success">
                                            <input type="text" class="form-control  " disabled="" id="inRehab">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">KAMAR / AKOMODASI</label>
                                        <div class="col-md-9 has-success">
                                            <input type="text" class="form-control  " disabled="" id="inKamar">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-4">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">RAWAT INTENSIF</label>
                                        <div class="col-md-9 has-success">
                                            <input type="text" class="form-control  " disabled="" id="inRawatIntens">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>



                                <!--/span-->
                            </div>
                            <!-- /Row -->
                            <div class="row">
                                <!--/span-->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">OBAT</label>
                                        <div class="col-md-9 has-success">
                                            <input type="text" class="form-control  " disabled="" id="inObat">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">OBAT KRONIS</label>
                                        <div class="col-md-9 has-success">
                                            <input type="text" class="form-control  " disabled="" id="inObatKronis">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">OBAT KEMO TERAPI</label>
                                        <div class="col-md-9 has-success">
                                            <input type="text" class="form-control  " disabled="" id="inKemo">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">ALKES</label>
                                        <div class="col-md-9 has-success">
                                            <input type="text" class="form-control  " disabled="" id="inAlkes">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-4">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">BMHP</label>
                                        <div class="col-md-9 has-success">
                                            <input type="text" class="form-control  " disabled="" id="inBMHP">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-4">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">SEWA ALAT</label>
                                        <div class="col-md-9 has-success">
                                            <input type="text" class="form-control  " disabled="" id="inSewaAlat">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">TOTAL</label>
                                        <div class="col-md-9 has-success">
                                            <input type="text" class="form-control  " disabled="" id="InTotTarif">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <h6 class="txt-dark capitalize-font"><i class="icon-notebook mr-10"></i>DIAGNOSA</h6>
                            <hr>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Diagnosa</label>
                                        <div class="col-md-7 has-success" id="the-basics">
                                            <input class="typeahead form-control  " type="text" placeholder="Diagnosa" id="inDiagnosa">
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="btn btn-success  " id="buttonDiagnosa" onclick="submitDiagnosa()">Submit</div>
                                </div>
                            </div>
                            <div class="panel-heading">
                                <div class="pull-left">
                                    <h6 class="panel-title txt-dark">LIST DIAGNOSA</h6>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="panel-wrapper collapse in">
                                <div class="panel-body">
                                    <div class="table-wrap" id="outDiagnosa">
                                        <div class="table-responsive">
                                            <table id="tabel_diagnosa" class="table table-hover display  pb-30">
                                                <thead>
                                                    <tr>
                                                        <th>ID DIAGNOSA</th>
                                                        <th>KODE</th>
                                                        <th>NAMA</th>
                                                        <th>HAPUS</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h6 class="txt-dark capitalize-font"><i class="icon-notebook mr-10"></i>PROSEDUR</h6>
                            <hr>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">PROC</label>
                                        <div class="col-md-7 has-success" id="the-basics1">
                                            <input class="typeahead form-control  " type="text" placeholder="Prosedur" id="inProsedur">
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-3" id="the-basics1">
                                    <div class="btn btn-success " id="buttonDiagnosa" onclick="submitProsedur()">Submit</div>
                                </div>

                                <!--/span-->

                                <!--/span-->
                            </div>
                            <!-- table -->
                            <!-- <div class="panel panel-default card-view"> -->
                            <div class="panel-heading">
                                <div class="pull-left">
                                    <h6 class="panel-title txt-dark">LIST PROSEDUR</h6>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="panel-wrapper collapse in">
                                <div class="panel-body">
                                    <div class="table-wrap" id="outProsedur">
                                        <div class="table-responsive">
                                            <table id="tabel_prosedur" class="table table-hover display  pb-30">
                                                <thead>
                                                    <tr>
                                                        <th>ID PROSEDUR</th>
                                                        <th>KODE</th>
                                                        <th>NAMA</th>
                                                        <th>HAPUS</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <h6 class="txt-dark capitalize-font"><i class="icon-notebook mr-10"></i>INCBG</h6>
                            <hr>
                            <!-- /Row -->
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">HAK KELAS</label>
                                        <div class="col-md-9 has-success">
                                            <select class="form-control select2" id="inHakKelas">
                                                <option value="1">KELAS 1</option>
                                                <option value="2">KELAS 2</option>
                                                <option value="3">KELAS 3</option>
                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="checkbox checkbox-success">
                                            <input id="isNaik" type="checkbox" data-toggle='collapse' data-target='#outNaikKelas'>
                                            <label class="control-label" for="isNaik"> NAIK / TURUN KELAS </label>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row collapse" id="outNaikKelas">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">KELAS NAIK/TURUN</label>
                                        <div class="col-md-9 has-success">
                                            <select class="form-control  " id="inKelasNaik">
                                                <option value="-">-</option>
                                                <option value="vvip">VVIP</option>
                                                <option value="vip">VIP</option>
                                                <option value="kelas_1">KELAS 1</option>
                                                <option value="kelas_2">KELAS 2</option>
                                                <option value="kelas_3">KELAS 3</option>
                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">LAMA NAIK/TURUN</label>
                                        <div class="col-md-9 has-success">
                                            <input type="number" class="form-control  " placeholder="HARI" id="inLamaNaik">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">TOTAL</label>
                                        <div class="col-md-9 has-success">
                                            <input type="text" class="form-control  " disabled="" id="inTotInacbg">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <div id="outEklaim">
                                    <div class="col-md-4">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">INACBG</label>
                                            <div class="col-md-9 has-success">
                                                <input type="text" class="form-control  " disabled="" id="inInacbg">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">TARIF</label>
                                            <div class="col-md-9 has-success">
                                                <input type="text" class="form-control  " disabled="" id="inTarif">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div align="right" style="margin-top: 30px; margin-bottom:50px;">
                                <div class="btn btn-warning" id="buttonDiagnosa" onclick="kirimEklaim()">KLAIM</div>
                                <!-- <div class="btn btn-success" id="buttonDiagnosa" onclick="finalEklaim()">FINAL KLAIM</div>
                                <div class="btn btn-primary" id="buttonDiagnosa" onclick="onlineEklaim()">KIRIM ONLINE</div>
                                <div class="btn btn-danger" id="buttonDiagnosa" onclick="hapus()">HAPUS</div>
                                <div class="btn btn-info" id="buttonDiagnosa" onclick="cetak()">CETAK</div>
                                <div class="btn btn-success" id="buttonDiagnosa" data-toggle="collapse" data-target="#gambar" >UPLOAD</div> -->
                            </div>

                            <div class="collapse" id="gambar">
                                <div class="form-body mb-30">
                                    <h6 class="txt-dark capitalize-font"><i class="icon-notebook mr-10"></i>UPLOAD FILE</h6>
                                    <hr>
                                    <form class="form-horizontal" id="formUpload">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group pl-15">
                                                    <label class="control-label">UPLOAD FILE</label>
                                                    <div class="panel-body" style="margin-left:-1em;">
                                                        <div class="mt-5">
                                                            <input type="file" id="file_input" name="files[]" multiple />
                                                        </div>
                                                        <div class="pt-20" style="color:#e84a5f;">*File tidak boleh lebih besar
                                                            dari
                                                            5 mb, dan hanya berformat .jpg |.png | .jpeg |</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <span class="help-block"></span>

                                        <span class="help-block"></span>
                                        <div class="row">
                                            <div class="col-md-6">
                                            </div>
                                            <div class="col-md-6" style="margin-top:-1em;">
                                                <div class="form-group pull-right" style="margin-right:20px;">
                                                    <button id="btn_upload" type="submit" class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
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
        </div>

    </div>
</div>

<script>
    $(document).ready(function() {

        $('#formUpload').submit(function(e) {
            e.preventDefault();
            if ($('#file_input').val() == '') {
                swal({
                    title: "Gagal!",
                    text: "Gambar belum di pilih",
                    type: "warning",
                    confirmButtonColor: "#3cb878",
                });
            }
            var a = $('#idPel').val();
            var b = $("#inJenisPel").val();

            var formData = new FormData(this);
            formData.append('inPelayanan', a);
            formData.append('tipe_masuk', b);

            $.ajax({
                url: '<?php echo base_url(); ?>Eklaim/upload_file',
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                dataType: 'JSON',
                success: function(data) {
                    const success = data.status.success;
                    const error = data.status.error;
                    if (success > 0) {
                        swal({
                            title: "good job!",
                            type: "success",
                            text: "Data berhasil disimpan",
                            confirmButtonColor: "#3cb878",
                        });

                        $("#file_input").val(null);

                        $('#gambar').collapse('hide');
                        $("#modal_edit_kasir").modal('hide');
                        $('#datable').DataTable().ajax.reload();
                    } else if (error > 0) {
                        swal({
                            title: "Gagal!",
                            text: "Data tidak terkirim, mohon cek inputan Anda kembali",
                            type: "warning",
                            confirmButtonColor: "#3cb878",
                        });
                    }
                }
            });
        })

    });

    function intRep(i) {
        return i.replace(/[\Rp.]/g, '');
    }

    function kirimEklaim() {
        // obat = $("#inObat").val();
        // alert(intRep(a));
        idPelayanan = $("#idPel").val();
        sep = $("#inSEP").val();
        noBpjs = $("#inNoBpjs").val();
        norm = $("#inNoRm").val();
        namaPasien = $("#inNama").val();
        tgl_lahir = $("#inTglLahir").val();
        tglMasuk = $("#inTglMasuk").val();
        tglPulang = $("#inTglKeluar").val();
        namaDokter = $("#inDPJP").val();
        if ($("#inGender").val() == 'LAKI-LAKI') {
            gender = '1';
        } else {
            gender = '2';
        }

        jenisRawat = "1";

        prosedur_non_bedah = intRep($("#inNonBedah").val());
        prosedur_bedah = intRep($("#inBedah").val());
        konsultasi = intRep($("#inKonsul").val());
        tenaga_ahli = intRep($("#inTeAhli").val());
        keperawatan = intRep($("#inKeperawatan").val());
        penunjang = intRep($("#inPenunjang").val());
        radiologi = intRep($("#inRadio").val());
        laboratorium = intRep($("#inLabor").val());
        pelayanan_darah = intRep($("#inPelDarah").val());
        rehabilitasi = intRep($("#inRehab").val());
        kamar = intRep($("#inKamar").val());
        rawat_intensif = intRep($("#inRawatIntens").val());
        obat = intRep($("#inObat").val());
        obat_kronis = intRep($("#inObatKronis").val());
        obat_kemoterapi = intRep($("#inKemo").val());
        alkes = intRep($("#inAlkes").val());
        bmhp = intRep($("#inBMHP").val());
        sewa_alat = intRep($("#inSewaAlat").val());
        discharge_status = $("#inCaraPulang").val();
        kelas_rawat = $("#inHakKelas").val();
        xx = document.getElementById("isNaik").checked;
        if (xx == true) {
            naikKelas = "1";
        } else {
            naikKelas = "0";
        }
        kelasNaik = $("#inKelasNaik").val();
        lamaNaik = $("#inLamaNaik").val();
        persentaseTambahan = 75;
        beratLahir = $("#inBeratLahir").val();
        total = intRep($("#inTotInacbg").val());

        a = $("#inJaminan").val();
        splitDiag = a.split("|");
        payor_id = splitDiag[0];
        payor_cd = splitDiag[1];
        tipe_masuk = $("#tipe_masuk").val();
        $.ajax({
            url: "<?= base_url() . 'Eklaim' ?>",
            method: "POST",
            cache: true,
            dataType: 'json',
            data: {
                idPelayanan: idPelayanan,
                sep: sep,
                noBpjs: noBpjs,
                norm: norm,
                namaPasien: namaPasien,
                tgl_lahir: tgl_lahir,
                tglMasuk: tglMasuk,
                tglPulang: tglPulang,
                namaDokter: namaDokter,
                gender: gender,
                jenisRawat: jenisRawat,
                prosedur_non_bedah: prosedur_non_bedah,
                prosedur_bedah: prosedur_bedah,
                konsultasi: konsultasi,
                tenaga_ahli: tenaga_ahli,
                keperawatan: keperawatan,
                penunjang: penunjang,
                radiologi: radiologi,
                laboratorium: laboratorium,
                pelayanan_darah: pelayanan_darah,
                rehabilitasi: rehabilitasi,
                kamar: kamar,
                rawat_intensif: rawat_intensif,
                obat: obat,
                obat_kronis: obat_kronis,
                obat_kemoterapi: obat_kemoterapi,
                alkes: alkes,
                bmhp: bmhp,
                sewa_alat: sewa_alat,
                discharge_status: discharge_status,
                kelas_rawat: kelas_rawat,
                naikKelas: naikKelas,
                kelasNaik: kelasNaik,
                lamaNaik: lamaNaik,
                persentaseTambahan: persentaseTambahan,
                beratLahir: beratLahir,
                total: total,
                payor_cd: payor_cd,
                payor_id: payor_id,
                tipe_masuk: tipe_masuk
            },
            success: function(data) {
                if (data.status == "success") {
                    swal({
                        title: "Klaim Berhasil",
                        type: "success",
                        text: "sukses",
                        confirmButtonColor: "#3cb878",
                    });
                    $("#inTotInacbg").val(convertToRupiah(data.total));
                    $("#inInacbg").val(data.kode);
                    $("#inTarif").val(convertToRupiah(data.tarif));
                    // $("#modal_edit_kasir").modal('hide');
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



    function hapus() {

        idPelayanan = $("#idPel").val();
        sep = $("#inSEP").val();
        swal({
            title: "Apakah kamu yakin akan !",
            text: "Menghapus data ini ?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3cb878",
            confirmButtonText: "Yakin",
            cancelButtonText: "Batal",
            closeOnConfirm: false
        }, function() {
            $().ready(function() {
                $.ajax({
                    url: "<?php echo base_url() ?>Eklaim/deleteClaim",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        sep: sep,
                    },
                    success: function(data) {
                        if (data.status == "success") {
                            swal({
                                title: "good job!",
                                type: "success",
                                text: "Eklaim Berhasil dihapus",
                                confirmButtonColor: "#3cb878",
                            });
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

    function cetak() {
        sep = $("#inSEP").val();
        window.location.href = "<?php echo base_url('Eklaim/printClaim/') ?>" + sep;
        $('#gambar').collapse('toggle');
    }

    function reload_diagnosa(id_pelayanan, id_history) {
        $('#tabel_diagnosa').dataTable().fnClearTable();
        $('#tabel_diagnosa').dataTable().fnDestroy();
        $('#tabel_diagnosa').DataTable({
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
                "url": '<?php echo base_url('Casemix/tampil_diagnosa'); ?>',
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

    function reload_prosedur(id_pelayanan, id_history) {
        $('#tabel_prosedur').dataTable().fnClearTable();
        $('#tabel_prosedur').dataTable().fnDestroy();
        $('#tabel_prosedur').DataTable({
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
                "url": '<?php echo base_url('Casemix/tampil_prosedur'); ?>',
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

    function submitDiagnosa() {
        diag = $("#inDiagnosa").val();
        splitDiag = diag.split(" | ");

        idPelayanan = $("#idPel").val();

        dataString = 'idPelayanan=' + idPelayanan + '&kode=' + splitDiag[0] +
            '&nama=' + splitDiag[1];
        $.ajax({
            type: "POST",
            url: "<?php echo base_url() ?>Casemix/insert_diagnosa",
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
                    $("#inDiagnosa").val("");
                    $('#tabel_diagnosa').DataTable().ajax.reload();
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

    function submitProsedur() {
        diag = $("#inProsedur").val();
        splitDiag = diag.split(" | ");
        idPelayanan = $("#idPel").val();

        dataString = 'idPelayanan=' + idPelayanan + '&kode=' + splitDiag[0] +
            '&nama=' + splitDiag[1];
        $.ajax({
            type: "POST",
            url: "<?php echo base_url() ?>Casemix/insert_prosedur",
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
                    $("#inProsedur").val("");
                    $('#tabel_prosedur').DataTable().ajax.reload();
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

    function hapus_diagnosa(id) { //utk hapus diagnosa pasien
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
                    url: "<?php echo base_url() ?>Casemix/hapus_diagnosa",
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
                                text: "Data Berhasil dihapus",
                                confirmButtonColor: "#3cb878",
                            });
                            $('#tabel_diagnosa').DataTable().ajax.reload();
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

    function hapus_prosedur(id) { //utk hapus diagnosa pasien
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
                    url: "<?php echo base_url() ?>Casemix/hapus_prosedur",
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
                                text: "Data Berhasil dihapus",
                                confirmButtonColor: "#3cb878",
                            });
                            $('#tabel_prosedur').DataTable().ajax.reload();
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

            foreach ($diagnosa as $row) {


                echo ",'" . $row["id_diagnosa"] . " | " . $row["nama_diagnosa"] . "'";
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

        var states1 = [
            <?php

            foreach ($prosedur as $row) {


                echo ",'" . $row["kode"] . " | " . $row["nama_prosedur"] . "'";
            }  ?>
        ];


        $('#the-basics1 .typeahead').typeahead({
            hint: true,
            highlight: true,
            minLength: 1
        }, {
            name: 'states1',
            source: substringMatcher(states1)
        });



    });

    function edit_rawat_inap() {
        id_Layanan = $('#idPelayanan').val();
        id_History = $('#idHis').val();
        nama = $("#NamaPasien").val();
        nosep = $('#inNoSEP').val();
        carabayar = $('#inCaraBayar1').val();
        Asalpasien = $('#inAsalPasien').val();
        diagnosa = $('#inDiagnosa1').val();
        DPJP = $('#inDPJP1').val();
        NaPol = $('#inNaPol').val();
        swal({
            title: "Apakah kamu yakin ingin !",
            text: "Mengubah Data " + nama + " ini?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3cb878",
            confirmButtonText: "Yakin",
            cancelButtonText: "Batal",
            closeOnConfirm: false
        }, function() {
            $().ready(function() {
                $.ajax({
                    url: "<?php echo base_url() ?>Pasien/edit_rawat_inap",
                    method: "POST",
                    dataType: 'json',
                    cache: true,
                    data: {
                        idPelayanan: id_Layanan,
                        idHis: id_History,
                        NoSEP: nosep,
                        CaraBayar: carabayar,
                        AsalPasien: Asalpasien,
                        Diagnosa: diagnosa,
                        namaDPJP: DPJP,
                        NamaPoli: NaPol,
                    },
                    success: function(data) {
                        if (data.status == "success") {
                            swal({
                                title: "good job!",
                                type: "success",
                                text: "Pasien Rawat Inap dengan Nama " + nama + " Telah diubah",
                                confirmButtonColor: "#3cb878",
                            });

                            $("#modal_edit_data").modal('hide');
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