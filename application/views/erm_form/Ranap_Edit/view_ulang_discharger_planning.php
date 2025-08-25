<!-- <form> -->
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default card-view">
            <div class="panel-heading">
                <div class="pull-left">
                    <h10 class="panel-title txt-dark">Perencanaan Pemulangan</h10>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    <div class="form-wrap">

                        <div class="form-group">
                            <input type="hidden" class="form-control" value="<?= $id_pelayanan ?>" name="inPel" id="inPel">
                            <input type="hidden" class="form-control" value="<?= $id_history ?>" name="inHis" id="inHis">
                            <input type="hidden" class="form-control" value="" id="id" name="id">

                            <div class="form-group">
                                <div class="col-md-6">
                                    <label class="control-label mb-10 text-left">Ruang :<span class="help"></span></label>
                                    <input type="text" class="form-control" id="inNama" value="<?= $nama_ruangan->nama_ruangan ?>" disabled>
                                    <span class="help-block"></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6">
                                    <label class="control-label mb-10 text-left">No. RM :</label><span class="help"></span></label>
                                    <input type="text" class="form-control" name="inNoRM" id="inNoRM" value="<?= $no_rm ?>" disabled>
                                    <span class="help-block"></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6">
                                    <label class="control-label mb-10 text-left">Kelas :<span class="help"></span></label>
                                    <input type="text" disabled class="form-control" value="<?= $kelas ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6">
                                    <label class="control-label mb-10 text-left">Nama Pasien :<span class="help"></span></label>
                                    <input type="text" disabled class="form-control" value="<?= $nama ?>">
                                    <input type="hidden" id="tanggal" value="<?php echo date('Y-m-d H:i:s'); ?>">
                                    <span class="help-block text-danger"></span>
                                </div>
                            </div>

                            <div class="form-group ">
                                <div class="col-md-6">
                                    <label class="control-label mb-10 text-left">Jenis Kelamin :</label>
                                    <input type="text" disabled class="form-control" value="<?= $jenis_kelamin ?>">
                                </div>
                            </div>

                            <div class="form-group ">
                                <div class="col-md-6">
                                    <label class="control-label mb-10 text-left">Tanggal Lahir :</label>
                                    <?php
                                    $tanggal_indonesia = date("Y/m/d", strtotime($tgl_lahir));
                                    echo '<input type="text" id="tanggal_lahir" readonly name="tanggal_lahir"  disable class="form-control" value="' . $tanggal_indonesia . '">'; ?>
                                    <span class="help-block text-danger" disable class="form-control"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">

                                    <br>
                                    <div class="pull-left">
                                        <h10 class="panel-title txt-dark">Saat Pasien Masuk RS</h10>
                                    </div>
                                    <div class="clearfix"></div>

                                    <div class="form-group ">
                                        <div class="col-md-8">
                                            <br>
                                            <label class="control-label mb-10 text-left"> Pasien Tinggal Dengan Siapa ?</label>
                                            <span id="mata_pf_error_1" class="text-danger"></span>
                                            <div class="radio-button radio-button-primary">
                                                <div class="col-md-2">
                                                    <input id="tinggal_1" type="radio" name="pasienTinggal" value="Sendiri">
                                                    <label class="control-label" for="tinggal_1">
                                                        Sendiri
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="radio-button radio-button-primary">
                                                    <input id="tinggal_2" type="radio" name="pasienTinggal" value="Anak">
                                                    <label class="control-label" for="tinggal_2">
                                                        Anak
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="radio-button radio-button-primary">
                                                    <input id="tinggal_3" type="radio" name="pasienTinggal" value="OrangTua">
                                                    <label class="control-label" for="tinggal_3">
                                                        Orang Tua
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="col-md-2">
                                                <div class="radio-button radio-button-primary">
                                                    <input id="tinggal_4" type="radio" name="pasienTinggal" value="Lainnya">
                                                    <label class="control-label" for="tinggal_4">
                                                        Lainnya
                                                    </label>
                                                    <div class="has-success">
                                                        <input type="text" class="form-control" id="pasienTinggal" style="display: none">
                                                        <span class="help-block"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <div class="col-md-8">
                                            <br>
                                            <label class="control-label mb-10 text-left"> Dimana Letak Kamar Pasien di Rumah ?</label>
                                            <span id="mata_pf_error_2" class="text-danger"></span>
                                            <div class="radio-button radio-button-primary">
                                                <div class="col-md-5">
                                                    <input id="kamar_1" type="radio" name="letakkamar" value="LantaiDasar">
                                                    <label class="control-label" for="kamar_1">
                                                        Lantai Dasar
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="radio-button radio-button-primary">
                                                    <input id="kamar_2" type="radio" name="letakkamar" value="LantaiDua">
                                                    <label class="control-label" for="kamar_2">
                                                        Lantai Dua/Tiga
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <div class="col-md-8">
                                            <br>
                                            <label class="control-label mb-10 text-left"> Bagaimana Kondisi Rumah Pasien ?</label>
                                            <span id="mata_pf_error_3" class="text-danger"></span>
                                            <br>
                                        </div>

                                        <div class="form-group ">
                                            <div class="col-md-8">
                                                <label class="control-label mb-10 text-left">- Penerangan :</label>
                                                <span id="mata_pf_error_3" class="text-danger"></span>
                                                <br>
                                                <div class="col-md-3">
                                                    <div class="checkbox checkbox-success">
                                                        <input id="penerangan_1" type="checkbox" name="penerangan" value="Terang" onclick="checkOnlyOne1(this.id)">
                                                        <label class="control-label" for="penerangan_1">
                                                            Terang
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="checkbox checkbox-success">
                                                        <input id="penerangan_2" type="checkbox" name="penerangan" value="Cukup Terang" onclick="checkOnlyOne1(this.id)">
                                                        <label class="control-label" for="penerangan_2">
                                                            Cukup Terang
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="checkbox checkbox-success">
                                                        <input id="penerangan_3" type="checkbox" name="penerangan" value="Kurang Terang" onclick="checkOnlyOne1(this.id)">
                                                        <label class="control-label" for="penerangan_3">
                                                            Kurang Terang
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <div class="col-md-8">
                                            <label class="control-label mb-10 text-left">- Kamar Tidur Jauh Dari Kamar Mandi :</label>
                                            <span id="mata_pf_error_4" class="text-danger"></span>
                                            <br>
                                            <div class="col-md-3">
                                                <div class="checkbox checkbox-success">
                                                    <input id="kamarmandi_1" type="checkbox" name="kamarmandi" value="Jauh" onclick="checkOnlyOne2(this.id)">
                                                    <label class="control-label" for="kamar_1">
                                                        Jauh
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="checkbox checkbox-success">
                                                    <input id="kamarmandi_2" type="checkbox" name="kamarmandi" value="Dekat" onclick="checkOnlyOne2(this.id)">
                                                    <label class="control-label" for="kamar_2">
                                                        Dekat
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <div class="col-md-8">
                                            <label class="control-label mb-10 text-left">- WC/Kloset :</label>
                                            <span id="mata_pf_error_5" class="text-danger"></span>
                                            <br>
                                            <div class="col-md-3">
                                                <div class="checkbox checkbox-success">
                                                    <input id="toilet_1" type="checkbox" name="toilet" value="Jongkok" onclick="checkOnlyOne3(this.id)">
                                                    <label class="control-label" for="toilet_1">
                                                        Jongkok
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="checkbox checkbox-success">
                                                    <input id="toilet_2" type="checkbox" name="toilet" value="Duduk" onclick="checkOnlyOne3(this.id)">
                                                    <label class="control-label" for="toilet_2">
                                                        Duduk
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group ">
                                        <div class="col-md-8">
                                            <br>
                                            <label class="control-label mb-10 text-left"> Bagaimana Pemenuhan Kebutuhan Dasar Pasien ?</label>
                                            <span id="mata_pf_error_6" class="text-danger"></span>
                                            <br>
                                            <div class="col-md-3">
                                                <div class="radio-button radio-button-primary">
                                                    <input id="kebutuhan_1" type="radio" name="kebutuhandasar" value="Mandiri">
                                                    <label class="control-label" for="kebutuhan_1">
                                                        Mandiri
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="radio-button radio-button-primary">
                                                    <input id="kebutuhan_2" type="radio" name="kebutuhandasar" value="Dibantu">
                                                    <label class="control-label" for="kebutuhan_2">
                                                        Dibantu Sebagian
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="radio-button radio-button-primary">
                                                    <input id="kebutuhan_3" type="radio" name="kebutuhandasar" value="Dibantutotal">
                                                    <label class="control-label" for="kebutuhan_3">
                                                        Dibantu Total
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <div class="col-md-8">
                                            <br>
                                            <label class="control-label mb-10 text-left"> Apakah Pasien Membutuhkan Alat Bantu Khusus ?</label>
                                            <span id="mata_pf_error_7" class="text-danger"></span>
                                            <br>
                                            <div class="col-md-3">
                                                <div class="checkbox checkbox-success">
                                                    <input id="alatbantu_1" type="checkbox" name="alatbantukhusus" value="Tidak" onclick="checkOnlyOne4(this.id)">
                                                    <label class="control-label" for="alatbantu_1">
                                                        Tidak
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="checkbox checkbox-success">
                                                    <input id="alatbantu_2" type="checkbox" name="alatbantukhusus" value="Sebutkan1" onclick="checkOnlyOne4(this.id)">
                                                    <label class="control-label" for="alatbantu_2">
                                                        Ya, Sebutkan
                                                    </label>
                                                    <div class="has-success">
                                                        <input type="text" class="form-control" id="alatbantukhusus" style="display: none">
                                                        <span class="help-block"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <div class="col-md-8">
                                            <br>
                                            <label class="control-label mb-10 text-left"> Apakah Ada Diet/Makanan yang Diprogramkan ?</label>
                                            <span id="mata_pf_error_8" class="text-danger"></span>
                                            <br>
                                            <div class="col-md-3">
                                                <div class="checkbox checkbox-success">
                                                    <input id="diet_1" type="checkbox" name="dietmakananprogram" value="Tidak" onclick="checkOnlyOne5(this.id)">
                                                    <label class="control-label" for="diet_1">
                                                        Tidak
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="checkbox checkbox-success">
                                                    <input id="diet_2" type="checkbox" name="dietmakananprogram" value="Sebutkan2" onclick="checkOnlyOne5(this.id)">
                                                    <label class="control-label" for="diet_2">
                                                        Ya, Sebutkan
                                                    </label>
                                                    <div class="has-success">
                                                        <input type="text" class="form-control" id="dietmakananprogram" style="display: none">
                                                        <span class="help-block"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <div class="col-md-8">
                                            <br>
                                            <label class="control-label mb-10 text-left"> Apakah Perlu Dirujuk ke Komunitas Lain ?</label>
                                            <span id="mata_pf_error_9" class="text-danger"></span>
                                            <br>
                                            <div class="col-md-3">
                                                <div class="checkbox checkbox-success">
                                                    <input id="rujukan_1" type="checkbox" name="rujukankekomunitas" value="Tidak" onclick="checkOnlyOne6(this.id)">
                                                    <label class="control-label" for="rujukan_1">
                                                        Tidak
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="checkbox checkbox-success">
                                                    <input id="rujukan_2" type="checkbox" name="rujukankekomunitas" value="Sebutkan3" onclick="checkOnlyOne6(this.id)">
                                                    <label class="control-label" for="rujukan_2">
                                                        Ya, Sebutkan
                                                    </label>
                                                    <div class="has-success">
                                                        <input type="text" class="form-control" id="rujukankekomunitas" style="display: none">
                                                        <span class="help-block"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="panel-heading">
                                        <div class="pull-left">
                                            <br>
                                            <h10 class="panel-title txt-dark">Sedang Dirawat (Catatan Tambahan) Apabila Ada Perubahan Discharge Planning</h10>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>

                                    <!-- Manajemen Nyeri -->
                                    <div class="col-md-6">
                                        <label class="control-label mb-10 text-left">Manajemen Nyeri</label>
                                        <div class="checkbox">
                                            <input id="keperluan1_ya" type="checkbox" name="keperluan1" value="Ya" onclick="checkOnlyOne(this)">
                                            <label class="control-label" for="keperluan1_ya">Ya</label>
                                        </div>
                                        <div class="checkbox">
                                            <input id="keperluan1_tidak" type="checkbox" name="keperluan1" value="Tidak" onclick="checkOnlyOne(this)">
                                            <label class="control-label" for="keperluan1_tidak">Tidak</label>
                                        </div>
                                        <span id="managemennyeri_error" class="text-danger"></span>
                                    </div>

                                    <!-- Perawatan Luka -->
                                    <div class="form-group mb-3">
                                        <div class="col-md-6">
                                            <label class="control-label mb-10 text-left">Perawatan Luka</label>
                                            <div class="checkbox">
                                                <input id="keperluan2_ya" type="checkbox" name="keperluan2" value="Ya" onclick="checkOnlyOne(this)">
                                                <label class="control-label" for="keperluan2_ya">Ya</label>
                                            </div>
                                            <div class="checkbox">
                                                <input id="keperluan2_tidak" type="checkbox" name="keperluan2" value="Tidak" onclick="checkOnlyOne(this)">
                                                <label class="control-label" for="keperluan2_tidak">Tidak</label>
                                            </div>
                                            <span id="perawatanluka_error" class="text-danger"></span>
                                        </div>
                                    </div>

                                    <!-- Teknik Mobilisasi -->
                                    <div class="form-group mb-3">
                                        <div class="col-md-6">
                                            <label class="control-label mb-10 text-left">Teknik Mobilisasi</label>
                                            <div class="checkbox">
                                                <input id="keperluan3_ya" type="checkbox" name="keperluan3" value="Ya" onclick="checkOnlyOne(this)">
                                                <label class="control-label" for="keperluan3_ya">Ya</label>
                                            </div>
                                            <div class="checkbox">
                                                <input id="keperluan3_tidak" type="checkbox" name="keperluan3" value="Tidak" onclick="checkOnlyOne(this)">
                                                <label class="control-label" for="keperluan3_tidak">Tidak</label>
                                            </div>
                                            <span id="teknikmobilisasi_error" class="text-danger"></span>
                                        </div>
                                    </div>

                                    <!-- Program Diet -->
                                    <div class="form-group mb-3">
                                        <div class="col-md-6">
                                            <label class="control-label mb-10 text-left">Program Diet</label>
                                            <div class="checkbox">
                                                <input id="keperluan4_ya" type="checkbox" name="keperluan4" value="Ya" onclick="checkOnlyOne(this)">
                                                <label class="control-label" for="keperluan4_ya">Ya</label>
                                            </div>
                                            <div class="checkbox">
                                                <input id="keperluan4_tidak" type="checkbox" name="keperluan4" value="Tidak" onclick="checkOnlyOne(this)">
                                                <label class="control-label" for="keperluan4_tidak">Tidak</label>
                                            </div>
                                            <span id="programdiet_error" class="text-danger"></span>
                                        </div>
                                    </div>

                                    <!-- Cara Pemberian Obat - Obatan -->
                                    <div class="form-group mb-3">
                                        <div class="col-md-6">
                                            <label class="control-label mb-10 text-left">Cara Pemberian Obat - Obatan</label>
                                            <div class="checkbox">
                                                <input id="keperluan5_ya" type="checkbox" name="keperluan5" value="Ya" onclick="checkOnlyOne(this)">
                                                <label class="control-label" for="keperluan5_ya">Ya</label>
                                            </div>
                                            <div class="checkbox">
                                                <input id="keperluan5_tidak" type="checkbox" name="keperluan5" value="Tidak" onclick="checkOnlyOne(this)">
                                                <label class="control-label" for="keperluan5_tidak">Tidak</label>
                                            </div>
                                            <span id="carapemberianobatan_error" class="text-danger"></span>
                                        </div>
                                    </div>

                                    <!-- Cara Penyuntikan Insulin -->
                                    <div class="form-group mb-3">
                                        <div class="col-md-6">
                                            <label class="control-label mb-10 text-left">Cara Penyuntikan Insulin</label>
                                            <div class="checkbox">
                                                <input id="keperluan6_ya" type="checkbox" name="keperluan6" value="Ya" onclick="checkOnlyOne(this)">
                                                <label class="control-label" for="keperluan6_ya">Ya</label>
                                            </div>
                                            <div class="checkbox">
                                                <input id="keperluan6_tidak" type="checkbox" name="keperluan6" value="Tidak" onclick="checkOnlyOne(this)">
                                                <label class="control-label" for="keperluan6_tidak">Tidak</label>
                                            </div>
                                            <span id="carapenyuntikaninsulin_error" class="text-danger"></span>
                                        </div>
                                    </div>

                                    <!-- Penyuluhan Pasien Pulang Dengan Alat -->
                                    <div class="form-group mb-3">
                                        <div class="col-md-6">
                                            <label class="control-label mb-10 text-left">Penyuluhan Pasien Pulang Dengan Alat (O2/NGT/Cateter Urine/............)</label>
                                            <div class="checkbox">
                                                <input id="keperluan7_ya" type="checkbox" name="keperluan7" value="Ya" onclick="checkOnlyOne(this)">
                                                <label class="control-label" for="keperluan7_ya">Ya</label>
                                            </div>
                                            <div class="checkbox">
                                                <input id="keperluan7_tidak" type="checkbox" name="keperluan7" value="Tidak" onclick="checkOnlyOne(this)">
                                                <label class="control-label" for="keperluan7_tidak">Tidak</label>
                                            </div>
                                            <span id="penyuluhanpasienpulangdenganalat_error" class="text-danger"></span>
                                        </div>
                                    </div>

                                    <!-- Perawatan Diri/Pasien Dengan Bedrest -->
                                    <div class="form-group mb-3">
                                        <div class="col-md-6">
                                            <label class="control-label mb-10 text-left">Perawatan Diri/Pasien Dengan Bedrest</label>
                                            <div class="checkbox">
                                                <input id="keperluan8_ya" type="checkbox" name="keperluan8" value="Ya" onclick="checkOnlyOne(this)">
                                                <label class="control-label" for="keperluan8_ya">Ya</label>
                                            </div>
                                            <div class="checkbox">
                                                <input id="keperluan8_tidak" type="checkbox" name="keperluan8" value="Tidak" onclick="checkOnlyOne(this)">
                                                <label class="control-label" for="keperluan8_tidak">Tidak</label>
                                            </div>
                                            <span id="perawatandiridenganbedrest_error" class="text-danger"></span>
                                        </div>
                                    </div>

                                    <!-- Lingkungan -->
                                    <div class="form-group mb-3">
                                        <div class="col-md-6">
                                            <label class="control-label mb-10 text-left">Lingkungan</label>
                                            <div class="checkbox">
                                                <input id="keperluan9_ya" type="checkbox" name="keperluan9" value="Ya" onclick="checkOnlyOne(this)">
                                                <label class="control-label" for="keperluan9_ya">Ya</label>
                                            </div>
                                            <div class="checkbox">
                                                <input id="keperluan9_tidak" type="checkbox" name="keperluan9" value="Tidak" onclick="checkOnlyOne(this)">
                                                <label class="control-label" for="keperluan9_tidak">Tidak</label>
                                            </div>
                                            <span id="lingkungan_error" class="text-danger"></span>
                                        </div>
                                    </div>

                                    <!-- Perawatan Perineum -->
                                    <div class="form-group mb-3">
                                        <div class="col-md-6">
                                            <label class="control-label mb-10 text-left">Perawatan Perineum</label>
                                            <div class="checkbox">
                                                <input id="keperluan10_ya" type="checkbox" name="keperluan10" value="Ya" onclick="checkOnlyOne(this)">
                                                <label class="control-label" for="keperluan10_ya">Ya</label>
                                            </div>
                                            <div class="checkbox">
                                                <input id="keperluan10_tidak" type="checkbox" name="keperluan10" value="Tidak" onclick="checkOnlyOne(this)">
                                                <label class="control-label" for="keperluan10_tidak">Tidak</label>
                                            </div>
                                            <span id="perawatanperineum_error" class="text-danger"></span>
                                        </div>
                                    </div>

                                    <!-- Perawatan Payudara -->
                                    <div class="form-group mb-3">
                                        <div class="col-md-6">
                                            <label class="control-label mb-10 text-left">Perawatan Payudara</label>
                                            <div class="checkbox">
                                                <input id="keperluan11_ya" type="checkbox" name="keperluan11" value="Ya" onclick="checkOnlyOne(this)">
                                                <label class="control-label" for="keperluan11_ya">Ya</label>
                                            </div>
                                            <div class="checkbox">
                                                <input id="keperluan11_tidak" type="checkbox" name="keperluan11" value="Tidak" onclick="checkOnlyOne(this)">
                                                <label class="control-label" for="keperluan11_tidak">Tidak</label>
                                            </div>
                                            <span id="perawatanpayudara_error" class="text-danger"></span>
                                        </div>
                                    </div>

                                    <!-- Perawatan Bayi -->
                                    <div class="form-group mb-3">
                                        <div class="col-md-6">
                                            <label class="control-label mb-10 text-left">Perawatan Bayi (Perawatan Tali Pusat, Teknik Menyusui, Memandikan Bayi, Jadwal Imunisasi, Dan Lain-lainnya)
                                            </label>
                                            <div class="checkbox">
                                                <input id="keperluan12_ya" type="checkbox" name="keperluan12" value="Ya" onclick="checkOnlyOne(this)">
                                                <label class="control-label" for="keperluan12_ya">Ya</label>
                                            </div>
                                            <div class="checkbox">
                                                <input id="keperluan12_tidak" type="checkbox" name="keperluan12" value="Tidak" onclick="checkOnlyOne(this)">
                                                <label class="control-label" for="keperluan12_tidak">Tidak</label>
                                            </div>
                                            <span id="perawatanbayi_error" class="text-danger"></span>
                                        </div>
                                    </div>

                                    <!-- Saat Kontrol -->
                                    <div class="form-group mb-3">
                                        <div class="col-md-6">
                                            <label class="control-label mb-10 text-left">Saat Kontrol</label>
                                            <div class="checkbox">
                                                <input id="keperluan13_ya" type="checkbox" name="keperluan13" value="Ya" onclick="checkOnlyOne(this)">
                                                <label class="control-label" for="keperluan13_ya">Ya</label>
                                            </div>
                                            <div class="checkbox">
                                                <input id="keperluan13_tidak" type="checkbox" name="keperluan13" value="Tidak" onclick="checkOnlyOne(this)">
                                                <label class="control-label" for="keperluan13_tidak">Tidak</label>
                                            </div>
                                            <span id="saatkontrol_error" class="text-danger"></span>
                                        </div>
                                    </div>

                                    <!-- Spiritual (Toharoh, Ibadah, Fiqih) -->
                                    <div class="col-md-6">
                                        <label class="control-label mb-10 text-left">Spiritual (Toharoh, Ibadah, Fiqih)</label>
                                        <div class="checkbox">
                                            <input id="keperluan14_ya" type="checkbox" name="keperluan14" value="Ya" onclick="checkOnlyOne(this)">
                                            <label class="control-label" for="keperluan14_ya">Ya</label>
                                        </div>
                                        <div class="checkbox">
                                            <input id="keperluan14_tidak" type="checkbox" name="keperluan14" value="Tidak" onclick="checkOnlyOne(this)">
                                            <label class="control-label" for="keperluan14_tidak">Tidak</label>
                                        </div>
                                        <span id="spiritual_error" class="text-danger"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6">
                                    <label class="control-label mb-10 text-left" for="keperluan15">
                                        Dan Lain-lain...........
                                    </label>
                                    <div class="has-success">
                                        <textarea class="form-control" cols="2" rows="2" id="keperluan15" name="inDanlainlain" placeholder="-"></textarea>
                                        <span id="danlainlain_error" class="text-danger"></span>
                                    </div>

                                    <script>
                                        function checkOnlyOne(checkbox) {
                                            // Mengambil semua checkbox dengan nama yang sama
                                            const checkboxes = document.getElementsByName(checkbox.name);
                                            checkboxes.forEach((item) => {
                                                // Jika checkbox yang diklik, set menjadi checked, jika tidak, set menjadi unchecked
                                                item.checked = item === checkbox ? checkbox.checked : false;
                                            });
                                        }
                                    </script>

                                    <div class="col-md-10">
                                        <div class="panel-heading mb-10 text-left">
                                            <div class="pull-left">
                                                <br>
                                                <h10 class="panel-title txt-dark">Pada Saat Akan Pulang</h10>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <div class="col-md-8">
                                            <br>
                                            <label class="control-label mb-10 text-left"> Surat yang akan dibawa pulang :</label>
                                            <span id="mata_pf_error_10" class="text-danger"></span>
                                            <br>
                                            <div class="col-md-3">
                                                <div class="checkbox checkbox-success">
                                                    <input id="suratpulang_1" type="checkbox" name="suratpulang" value="SuratIstirahat">
                                                    <label class="control-label" for="suratpulang_1">
                                                        Surat Istirahat
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="checkbox checkbox-success">
                                                    <input id="suratpulang_2" type="checkbox" name="suratpulang" value="SuratKontrol">
                                                    <label class="control-label" for="suratpulang_2">
                                                        Surat Kontrol
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="checkbox checkbox-success">
                                                    <input id="suratpulang_3" type="checkbox" name="suratpulang" value="SuratRujukan">
                                                    <label class="control-label" for="suratpulang_3">
                                                        Surat Rujukan/ Jawaban Rujukan
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="checkbox checkbox-success">
                                                    <input id="suratpulang_4" name="suratpulang" type="checkbox" value="Lainnya">
                                                    <label class="control-label" for="suratpulang_4">
                                                        Lainnya
                                                    </label>
                                                    <div class="has-success ">
                                                        <input type="text" class="form-control" id="suratpulang" style="display: none">
                                                        <span class="help-block"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <div class="col-md-8">
                                            <br>
                                            <label class="control-label mb-10 text-left"> Pasien/ Keluarga mengerti tentang penyuluhan/ penjelasan yang diberikan :</label>
                                            <span id="mata_pf_error_11" class="text-danger"></span>
                                            <br>
                                            <div class="col-md-3">
                                                <div class="checkbox checkbox-success">
                                                    <input id="penjelasan_1" type="checkbox" name="penyuluhan" value="Ya" onclick="checkOnlyOne8(this.id)">
                                                    <label class="control-label" for="penjelasan_1">
                                                        YA
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="checkbox checkbox-success">
                                                    <input id="penjelasan_2" type="checkbox" name="penyuluhan" value="Tidak" onclick="checkOnlyOne8(this.id)">
                                                    <label class="control-label" for="penjelasan_2">
                                                        TIDAK
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <label class="control-label mb-10 text-left" for="keperluan15">
                                                Pulang Ke Alamat :
                                            </label>
                                            <div class="has-success">
                                                <textarea class="form-control" cols="2" rows="2" id="Alamat" name="inAlamat"></textarea>
                                                <span id="alamat_error" class="text-danger"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <label class="control-label mb-10 text-left" for="keperluan15">
                                                Nama Penjemput :
                                            </label>
                                            <div class="has-success">
                                                <textarea class="form-control" cols="2" rows="2" id="penjemput" name="inpenjemput"></textarea>
                                                <span id="penjemput_error" class="text-danger"></span>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <label class="control-label mb-10 text-left" for="keperluan15">
                                                Hubungan Dengan Pasien :
                                            </label>
                                            <div class="has-success">
                                                <textarea class="form-control" cols="2" rows="2" id="hubungan" name="inhubungan"></textarea>
                                                <span id="hubungan_error" class="text-danger"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <div class="col-md-8">
                                            <br>
                                            <label class="control-label mb-10 text-left"> Transportasi Yang Digunakan :</label>
                                            <span id="mata_pf_error_12" class="text-danger"></span>
                                            <br>
                                            <div class="col-md-3">
                                                <div class="checkbox checkbox-success">
                                                    <input id="transportasi_1" type="checkbox" name="transportasi" value="Ambulance" onclick="checkOnlyOne9(this.id)">
                                                    <label class="control-label" for="transportasi_1">
                                                        Ambulance
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="checkbox checkbox-success">
                                                    <input id="transportasi_2" name="transportasi" type="checkbox" value="Lainnya" onclick="checkOnlyOne9(this.id)">
                                                    <label class="control-label" for="transportasi_2">
                                                        Lain - lainnya
                                                    </label>
                                                    <div class="has-success">
                                                        <input type="text" class="form-control" id="transportasi" style="display: none">
                                                        <span class="help-block"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <a class="btn btn-default btn-anim  btn-sm" onclick="javascript:history.go(-1)" style="margin-right: 20px; margin-left: 10px;"><i class="fa fa-arrow-left"></i><span class="btn-text">KEMBALI</span></a>
                                        <button type="button" class="btn btn-success mb-4" onclick="simpan()">Simpan</button>
                                        <button type="submit" class="btn btn-success mb-4" onclick="cetak_print()">Cetak</button>
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
        $(function() {
            var jenis_kelamin = '<?= $jenis_kelamin; ?>';
            if (jenis_kelamin == 'PEREMPUAN') {
                $("#title4").hide();
                $("#label6").hide();
                $("#label7").hide();
                $("#prostat1").hide();
                $("#prostat2").hide();
            } else if (jenis_kelamin == 'LAKI-LAKI') {
                $("#title1").hide();
                $("#title2").hide();
                $("#title3").hide();
                $("#label1").hide();
                $("#label2").hide();
                $("#label3").hide();
                $("#label4").hide();
                $("#label5").hide();
                $("#hamil1").hide();
                $("#hamil2").hide();
                $("#hamil3").hide();
                $("#inHaid").hide();
                $("#kontrasepsi1").hide();
                $("#kontrasepsi2").hide();
            }

            $('#tinggal_4').change(function() {
                if ($(this).is(':checked')) {
                    $('#pasienTinggal').show();
                }
            });

            $('input[name="pasienTinggal"]').not('#tinggal_4').change(function() {
                if ($(this).is(':checked')) {
                    $('#pasienTinggal').hide();
                }
            });
            $("#tinggal_1").click(function() {
                if ($(this).is(":checked")) {
                    $("#pasienTinggal").hide();
                }
            });
            $("#tinggal_2").click(function() {
                if ($(this).is(":checked")) {
                    $("#pasienTinggal").hide();
                }
            });
            $("#tinggal_3").click(function() {
                if ($(this).is(":checked")) {
                    $("#pasienTinggal").hide();
                }
            });
            $("#transportasi_2").click(function() {
                if ($(this).is(":checked")) {
                    $("#transportasi").show();
                }
            });
            $("#transportasi_1").click(function() {
                if ($(this).is(":checked")) {
                    $("#transportasi").hide();
                }
            });
            $("#suratpulang_1").click(function() {
                if ($(this).is(":checked")) {
                    $("#suratpulang").hide();
                }
            });
            $("#suratpulang_2").click(function() {
                if ($(this).is(":checked")) {
                    $("#suratpulang").hide();
                }
            });
            $("#suratpulang_3").click(function() {
                if ($(this).is(":checked")) {
                    $("#suratpulang").hide();
                }
            });
            $("#suratpulang_4").click(function() {
                if ($(this).is(":checked")) {
                    $("#suratpulang").show();
                }
            });
            $("#alatbantu_1").click(function() {
                if ($(this).is(":checked")) {
                    $("#alatbantukhusus").hide();
                }
            });
            $("#alatbantu_2").click(function() {
                if ($(this).is(":checked")) {
                    $("#alatbantukhusus").show();
                }
            });
            $("#diet_1").click(function() {
                if ($(this).is(":checked")) {
                    $("#dietmakananprogram").hide();
                }
            });
            $("#diet_2").click(function() {
                if ($(this).is(":checked")) {
                    $("#dietmakananprogram").show();
                }
            });
            $("#rujukan_1").click(function() {
                if ($(this).is(":checked")) {
                    $("#rujukankekomunitas").hide();
                }
            });
            $("#rujukan_2").click(function() {
                if ($(this).is(":checked")) {
                    $("#rujukankekomunitas").show();
                }
            });
        });

        function checkOnlyOne1(id) {
            var checkboxes1 = document.getElementsByName('penerangan');
            checkboxes1.forEach((item) => {
                if (item.id !== id) item.checked = false;
            });
        }

        function checkOnlyOne2(id) {
            var checkboxes2 = document.getElementsByName('kamarmandi');
            checkboxes2.forEach((item) => {
                if (item.id !== id) item.checked = false;
            });
        }

        function checkOnlyOne3(id) {
            var checkboxes3 = document.getElementsByName('toilet');
            checkboxes3.forEach((item) => {
                if (item.id !== id) item.checked = false;
            });
        }

        function checkOnlyOne4(id) {
            var checkboxes4 = document.getElementsByName('alatbantukhusus');
            checkboxes4.forEach((item) => {
                if (item.id !== id) item.checked = false;
            });
        }

        function checkOnlyOne5(id) {
            var checkboxes5 = document.getElementsByName('dietmakananprogram');
            checkboxes5.forEach((item) => {
                if (item.id !== id) item.checked = false;
            });
        }

        function checkOnlyOne6(id) {
            var checkboxes6 = document.getElementsByName('rujukankekomunitas');
            checkboxes6.forEach((item) => {
                if (item.id !== id) item.checked = false;
            });
        }

        function checkOnlyOne8(id) {
            var checkboxes7 = document.getElementsByName('penyuluhan');
            checkboxes7.forEach((item) => {
                if (item.id !== id) item.checked = false;
            });
        }

        function checkOnlyOne9(id) {
            var checkboxes7 = document.getElementsByName('transportasi');
            checkboxes7.forEach((item) => {
                if (item.id !== id) item.checked = false;
            });
        }
    </script>

    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            id_history = $('#inHis').val();
            $.ajax({
                url: "<?php echo base_url() ?>Discharge_planning/get_ass_per",
                method: "POST",
                dataType: 'json',
                data: {
                    id: id_history
                },
                success: function(data) {
                    /*----------------------*/
                    $('input[name="letakkamar"][value="' + data.letakkamar + '"]').prop("checked", true);
                    $('input[name="penerangan"][value="' + data.penerangan + '"]').prop("checked", true);
                    $('input[name="kebutuhandasar"][value="' + data.kebutuhandasar + '"]').prop("checked", true);
                    $('input[name="alatbantukhusus"][value="' + data.alatbantukhusus + '"]').prop("checked", true);
                    $('input[name="dietmakananprogram"][value="' + data.dietmakananprogram + '"]').prop("checked", true);
                    $('input[name="rujukankekomunitas"][value="' + data.rujukankekomunitas + '"]').prop("checked", true);
                    $('input[name="toilet"][value="' + data.toilet + '"]').prop("checked", true);
                    $('input[name="kamarmandi"][value="' + data.kamarmandi + '"]').prop("checked", true);
                    $('input[name="keperluan1"][value="' + data.keperluan1 + '"]').prop("checked", true);
                    $('input[name="keperluan2"][value="' + data.keperluan2 + '"]').prop("checked", true);
                    $('input[name="keperluan3"][value="' + data.keperluan3 + '"]').prop("checked", true);
                    $('input[name="keperluan4"][value="' + data.keperluan4 + '"]').prop("checked", true);
                    $('input[name="keperluan5"][value="' + data.keperluan5 + '"]').prop("checked", true);
                    $('input[name="keperluan6"][value="' + data.keperluan6 + '"]').prop("checked", true);
                    $('input[name="keperluan7"][value="' + data.keperluan7 + '"]').prop("checked", true);
                    $('input[name="keperluan8"][value="' + data.keperluan8 + '"]').prop("checked", true);
                    $('input[name="keperluan9"][value="' + data.keperluan9 + '"]').prop("checked", true);
                    $('input[name="keperluan10"][value="' + data.keperluan10 + '"]').prop("checked", true);
                    $('input[name="keperluan11"][value="' + data.keperluan11 + '"]').prop("checked", true);
                    $('input[name="keperluan12"][value="' + data.keperluan12 + '"]').prop("checked", true);
                    $('input[name="keperluan13"][value="' + data.keperluan13 + '"]').prop("checked", true);
                    $('input[name="keperluan14"][value="' + data.keperluan14 + '"]').prop("checked", true);
                    $('#keperluan15').val(data.keperluan15);
                    $('input[name="suratpulang"][value="' + data.suratpulang + '"]').prop("checked", true);
                    $('input[name="penyuluhan"][value="' + data.penyuluhan + '"]').prop("checked", true);
                    $('#Alamat').val(data.Alamat);
                    $('#penjemput').val(data.penjemput);
                    $('#hubungan').val(data.hubungan);
                    if (data.alatbantukhusus === "Tidak") {
                        $('#alatbantu_1').prop('checked', true);
                    }
                    // Checkbox 'Lainnya' dan input teks terkait
                    if (data.alatbantukhusus != "Tidak") {
                        $('#alatbantu_2').prop('checked', true);
                        $('#alatbantukhusus').val(data.alatbantukhusus).show(); // Menampilkan input teks dan mengisinya dengan nilai dari database
                    }
                    if (data.dietmakananprogram === "Tidak") {
                        $('#diet_1').prop('checked', true);
                    }
                    // Checkbox 'Lainnya' dan input teks terkait
                    if (data.dietmakananprogram != "Tidak") {
                        $('#diet_2').prop('checked', true);
                        $('#dietmakananprogram').val(data.dietmakananprogram).show(); // Menampilkan input teks dan mengisinya dengan nilai dari database
                    }
                    if (data.rujukankekomunitas === "Tidak") {
                        $('#rujukan_1').prop('checked', true);
                    }
                    // Checkbox 'Lainnya' dan input teks terkait
                    if (data.rujukankekomunitas != "Tidak") {
                        $('#rujukan_2').prop('checked', true);
                        $('#rujukankekomunitas').val(data.rujukankekomunitas).show(); // Menampilkan input teks dan mengisinya dengan nilai dari database
                    }
                    if (data.transportasi === "Ambulance") {
                        $('#transportasi_1').prop('checked', true);
                    }
                    // Checkbox 'Lainnya' dan input teks terkait
                    if (data.transportasi != "Ambulance") {
                        $('#transportasi_2').prop('checked', true);
                        $('#transportasi').val(data.transportasi).show(); // Menampilkan input teks dan mengisinya dengan nilai dari database
                    }

                    if (data.pasienTinggal === "Sendiri") {
                        $('#tinggal_1').prop('checked', true);
                    } else if (data.pasienTinggal === "Anak") {
                        $('#tinggal_2').prop('checked', true);
                    } else if (data.pasienTinggal === "Orangtua") {
                        $('#tinggal_3').prop('checked', true);
                    } else {
                        // Jika nilai tidak cocok dengan salah satu opsi yang ada
                        $('#tinggal_4').prop('checked', true);
                        $('#pasienTinggal').val(data.pasienTinggal).show(); // Tampilkan input teks dan isi dengan nilai dari database
                    }


                    if (data.suratpulang === "SuratIstirahat") {
                        $('#suratpulang_1').prop('checked', true);
                    }
                    if (data.suratpulang === "SuratKontrol") {
                        $('#suratpulang_2').prop('checked', true);
                    }
                    if (data.suratpulang === "SuratRujukan") {
                        $('#suratpulang_3').prop('checked', true);
                    }
                    // Checkbox 'Lainnya' dan input teks terkait
                    if (data.suratpulang != "SuratIstirahat,SuratKontrol,SuratRujukan") {
                        $('#suratpulang_4').prop('checked', true);
                        $('#suratpulang').val(data.suratpulang).show(); // Menampilkan input teks dan mengisinya dengan nilai dari database
                    }
                }
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            id_pelayanan = $('#inPel').val();
            id_history = $('#inHis').val();
            reload_data_diagnosa(id_pelayanan, id_history);
            reload_data_diagnosa_id_pel(id_pelayanan);
            reload_data_diagnosa1_id_pel1(id_pelayanan);
        });
    </script>

    <script type="text/javascript">
        function pasienTinggal() {
            const sendiri = document.getElementById('tinggal_1');
            const anak = document.getElementById('tinggal_2');
            const orangtua = document.getElementById('tinggal_3');
            const lainnya = document.getElementById('tinggal_4');
            var result;

            if (sendiri.checked) {
                result = "Sendiri";
            } else if (anak.checked) {
                result = "Anak";
            } else if (orangtua.checked) {
                result = "OrangTua";
            } else if (lainnya.checked) {
                result = "Lainnya";
            }

            return result;
        }

        function letakkamar() {
            const lantaidasar = document.getElementById('kamar_1');
            const lantaidua = document.getElementById('kamar_2');
            var result;

            if (lantaidasar.checked) {
                result = "LantaiDasar";
            } else if (lantaidua.checked) {
                result = "LantaiDua";
            }
        }

        function penerangan() {
            const terang = document.getElementById('penerangan_1');
            const cukup = document.getElementById('penerangan_2');
            const kurang = document.getElementById('penerangan_3');
            var result;

            if (terang.checked) {
                result = "Terang";
            } else if (cukup.checked) {
                result = "Cukup";
            } else if (kurang.checked) {
                result = "Kurang";
            }
        }

        function kamarmandi() {
            const jauh = document.getElementById('kamarmandi_1');
            const dekat = document.getElementById('kamarmandi_2');
            var result;

            if (jauh.checked) {
                result = "Jauh";
            } else if (dekat.checked) {
                result = "Dekat";
            }
        }

        function toilet() {
            const jongkok = document.getElementById('toilet_1');
            const duduk = document.getElementById('toilet_2');
            var result;

            if (jongkok.checked) {
                result = "Jongkok";
            } else if (duduk.checked) {
                result = "Duduk";
            }
        }

        function kebutuhandasar() {
            const mandiri = document.getElementById('kebutuhan_1');
            const dibantu = document.getElementById('kebutuhan_2');
            const dibantutotal = document.getElementById('kebutuhan_3');
            var result;

            if (mandiri.checked) {
                result = "Mandiri";
            } else if (dibantu.checked) {
                result = "Dibantu";
            } else if (dibantutotal.checked) {
                result = "Dibantutotal"
            }
        }


        function alatbantukhusus() {
            const tidak = document.getElementById('alatbantu_1');
            const sebutkan = document.getElementById('alatbantu_2');
            var result;

            if (tidak.checked) {
                result = "Tidak";
            } else if (sebutkan.checked) {
                result = "Sebutkan1";
            }
        }

        function dietmakananprogram() {
            const tidak = document.getElementById('diet_1');
            const sebutkan = document.getElementById('diet_2');
            var result;

            if (tidak.checked) {
                result = "Tidak";
            } else if (sebutkan.checked) {
                result = "Sebutkan2";
            }
        }

        function rujukankekomunitas() {
            const tidak = document.getElementById('rujukan_1');
            const sebutkan = document.getElementById('rujukan_2');
            var result;

            if (tidak.checked) {
                result = "Tidak";
            } else if (sebutkan.checked) {
                result = "Sebutkan3";
            }
        }

        function suratpulang() {
            const suratistirahat = document.getElementById('suratpulang_1');
            const suratkontrol = document.getElementById('suratpulang_2');
            const suratrujukan = document.getElementById('suratpulang_3');
            const lainnya = document.getElementById('suratpulang_4');
            var result;

            if (suratistirahat.checked) {
                result = "SuratIstirahat";
            } else if (suratkontrol.checked) {
                result = "SuratKontrol";
            } else if (suratrujukan.checked) {
                result = "SuratRujukan";
            } else if (lainnya.checked) {
                result = "Lainnya";
            }
            return result;
        }

        function penyuluhan() {
            const ya = document.getElementById('penjelasan_1');
            const tidak = document.getElementById('penjelasan_2');
            var result;

            if (ya.checked) {
                result = "Ya";
            } else if (tidak.checked) {
                result = "Tidak";
            }
            return result;
        }

        function transportasi() {
            const ambulance = document.getElementById('transportasi_1');
            const lainnya = document.getElementById('transportasi_2');
            var result;

            if (ambulance.checked) {
                result = "Ambulance";
            } else if (lainnya.checked) {
                result = "Lainnya";
            }
            return result;
        }

        function simpan() {
            id_pelayanan = $('#inPel').val();
            id_history = $('#inHis').val();
            id_form = $('#inform').val();
            no_rm = $('#inNoRM').val();
            letakkamar = $('input[name="letakkamar"]:checked').val();
            if (letakkamar == "Lainnya") {
                letakkamar = $('#letakkamar').val();
            }
            penerangan = $('input[name="penerangan"]:checked').val();
            kebutuhandasar = $('input[name="kebutuhandasar"]:checked').val();
            alatbantukhusus = $('input[name="alatbantukhusus"]:checked').val();
            if (alatbantukhusus == "Sebutkan1") {
                alatbantukhusus = $('#alatbantukhusus').val();
            }
            dietmakananprogram = $('input[name="dietmakananprogram"]:checked').val();
            if (dietmakananprogram == "Sebutkan2") {
                dietmakananprogram = $('#dietmakananprogram').val();
            }
            rujukankekomunitas = $('input[name="rujukankekomunitas"]:checked').val();
            if (rujukankekomunitas == "Sebutkan3") {
                rujukankekomunitas = $('#rujukankekomunitas').val();
            }
            toilet = $('input[name="toilet"]:checked').val();
            kamarmandi = $('input[name="kamarmandi"]:checked').val();
            keperluan1 = $('input[name="keperluan1"]:checked').val();
            keperluan2 = $('input[name="keperluan2"]:checked').val();
            keperluan3 = $('input[name="keperluan3"]:checked').val();
            keperluan4 = $('input[name="keperluan4"]:checked').val();
            keperluan5 = $('input[name="keperluan5"]:checked').val();
            keperluan6 = $('input[name="keperluan6"]:checked').val();
            keperluan7 = $('input[name="keperluan7"]:checked').val();
            keperluan8 = $('input[name="keperluan8"]:checked').val();
            keperluan9 = $('input[name="keperluan9"]:checked').val();
            keperluan10 = $('input[name="keperluan10"]:checked').val();
            keperluan11 = $('input[name="keperluan11"]:checked').val();
            keperluan12 = $('input[name="keperluan12"]:checked').val();
            keperluan13 = $('input[name="keperluan13"]:checked').val();
            keperluan14 = $('input[name="keperluan14"]:checked').val();
            keperluan15 = $('#keperluan15').val();
            suratpulang = $('input[name="suratpulang"]:checked').val();
            if (suratpulang == "Lainnya") {
                suratpulang = $('#suratpulang').val();
            }
            penyuluhan = $('input[name="penyuluhan"]:checked').val();
            Alamat = $('#Alamat').val();
            penjemput = $('#penjemput').val();
            hubungan = $('#hubungan').val();
            transportasi = $('input[name="transportasi"]:checked').val();
            if (transportasi == "Lainnya") {
                transportasi = $('#transportasi').val();
            }
            pasienTinggal = $('input[name="pasienTinggal"]:checked').val();
            if (pasienTinggal == "Lainnya") {
                pasienTinggal = $('#pasienTinggal').val();
            }
            $.ajax({
                url: "<?php echo base_url() ?>Discharge_planning/update",
                method: "POST",
                dataType: 'json',
                data: {
                    id_pelayanan: id_pelayanan,
                    id_history: id_history,
                    no_rm: no_rm,
                    pasienTinggal: pasienTinggal,
                    letakkamar: letakkamar,
                    penerangan: penerangan,
                    kamarmandi: kamarmandi,
                    toilet: toilet,
                    kebutuhandasar: kebutuhandasar,
                    alatbantukhusus: alatbantukhusus,
                    dietmakananprogram: dietmakananprogram,
                    rujukankekomunitas: rujukankekomunitas,
                    keperluan1: keperluan1,
                    keperluan2: keperluan2,
                    keperluan3: keperluan3,
                    keperluan4: keperluan4,
                    keperluan5: keperluan5,
                    keperluan6: keperluan6,
                    keperluan7: keperluan7,
                    keperluan8: keperluan8,
                    keperluan9: keperluan9,
                    keperluan10: keperluan10,
                    keperluan11: keperluan11,
                    keperluan12: keperluan12,
                    keperluan13: keperluan13,
                    keperluan14: keperluan14,
                    keperluan15: keperluan15,
                    Alamat: Alamat,
                    penjemput: penjemput,
                    hubungan: hubungan,
                    suratpulang: suratpulang,
                    penyuluhan: penyuluhan,
                    transportasi: transportasi

                },
                success: function(response) {
                    if (response.status === "success") {
                        swal({
                            title: "good job!",
                            type: "success",
                            text: "Data berhasil di update",
                            confirmButtonColor: "#3cb878",
                        });
                        // ubahWarnaTombol(simpan);
                        // // Tampilkan kembali data setelah berhasil disimpan
                        // tampilkanKembaliData(simpan);
                        window.location.href = "<?php echo base_url('erm_ranap/form/') ?>" + '<?= urlencode(base64_encode($id_pelayanan)) ?>' + '/' + '<?= urlencode(base64_encode($id_history)) ?>';
                    } else {
                        alert('Error: ' + response.message);
                    }
                },
                error: function(xhr, status, error) {
                    swal({
                        title: "Gagal !!!",
                        type: "warning",
                        text: "Terjadi kesalahan pada server, silakan coba lagi.",
                        confirmButtonColor: "#3cb878",
                    });
                }
            });
            return false;
        }


        function reload_data_diagnosa(id_pelayanan, id_history) { //nampilinn diagnosa seluruhnya utk nambah ke diagnosa pasien
            $('#tabledgns').dataTable().fnClearTable();
            $('#tabledgns').dataTable().fnDestroy();
            $('#tabledgns').DataTable({
                "scrollX": false,
                "scrollY": false,
                "pageLength": 3,
                "language": {
                    "sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
                    "sProcessing": "Sedang memproses...",
                    "sLengthMenu": "Tampilkan _MENU_ entri",
                    "sZeroRecords": "Tidak ditemukan data yang sesuai",
                    "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                    "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                    "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                    "sInfoPostFix": "",
                    "sSearch": "Cari Diagnosa:",
                    "sUrl": "",
                    "oPaginate": {
                        "sFirst": "Pertama",
                        "sPrevious": "Sebelumnya",
                        "sNext": "Selanjutnya",
                        "sLast": "Terakhir",
                    }
                },
                "ajax": {
                    "url": '<?php echo base_url('Erm_igd/tampil_listdata_diagnosa'); ?>',
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

        function reload_data_diagnosa_id_pel(id_pelayanan) { // modal utk nampilin diagnosa pasien
            $('#tablediagnosa').dataTable().fnClearTable();
            $('#tablediagnosa').dataTable().fnDestroy();
            $('#tablediagnosa').DataTable({
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
                        "sLast": "Terakhir",
                    }
                },
                "ajax": {
                    "url": '<?php echo base_url('Erm_ranap_asesmen_dokter/tampil_list_diagnosa_ranap'); ?>',
                    "type": 'POST',
                    "data": {
                        id_pelayanan: id_pelayanan
                    },
                },

                "deferRender": true,
                "processing": true,
                "order": [],
                "columnDefs": [{
                    "width": "20%",
                    "targets": [0],
                    "orderable": false,
                }, ],
            });
        }

        function reload_data_diagnosa1_id_pel1(id_pelayanan) { // modal utk nampilin diagnosa pasien
            $('#tablediagnosa1').dataTable().fnClearTable();
            $('#tablediagnosa1').dataTable().fnDestroy();
            $('#tablediagnosa1').DataTable({
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
                        "sLast": "Terakhir",
                    }
                },
                "ajax": {
                    "url": '<?php echo base_url('Erm_ranap_asesmen_dokter/tampil_list_diagnosa1'); ?>',
                    "type": 'POST',
                    "data": {
                        id_pelayanan: id_pelayanan
                    },
                },

                "deferRender": true,
                "processing": true,
                "order": [],
                "columnDefs": [{
                    "width": "20%",
                    "targets": [0],
                    "orderable": false,
                }, ],
            });
        }

        function cetak_print() {
            var id = $('#inPel').val(); // pastikan ada elemen HTML dengan id 'id' untuk mengambil nilai id_pelayanan
            window.location.href = "<?php echo base_url('Discharge_planning/Print_Discharge/') ?>" + id_pelayanan;
        }
    </script>