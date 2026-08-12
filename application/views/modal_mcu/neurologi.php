<<<<<<< HEAD
<div class="page_content">
    <!-- Row -->
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default card-view">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h2 class="panel-title txt-dark"><strong>Neurologi</strong></h2>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="table-wrap">
                            <div class="table-responsive">
                                <h4 class="panel-title txt-dark"><b><strong>DATA PASIEN</strong></b></h4>



                                <div class="row mt-20">
                                    <div class="col-md-8" style="margin-bottom: 20px;">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">NIK</label>
                                            <div class="col-md-6 has-success">
                                                <input type="text" class="form-control" id="nik_npp" value="<?php echo $data_mcu['no_ktp']; ?>" disabled>
                                                <!-- <p id="nik" style="font-size:12px; margin-top:5px;"></p> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8" style="margin-bottom: 20px;">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Nama Lengkap</label>
                                            <div class="col-md-6 has-success">
                                                <input type="text" class="form-control" id="inName" disabled=""
                                                    value="<?php echo $data_mcu['nama_pasien']; ?>">
                                                <p id="namefull" style="font-size:12px; margin-top:5px;"></p>
                                                <input type="hidden" id="intanggalmasuk"
                                                    value="<?php echo date('Y-m-d H:i:s'); ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8" style="margin-bottom: 20px;">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Jenis Kelamin</label>
                                            <div class="col-md-6 has-success">
                                                <input type="text" class="form-control" id="inJK" value="<?php echo $data_mcu['jenis_kelamin']; ?>" disabled>
                                                <!-- <p id="nik" style="font-size:12px; margin-top:5px;"></p> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8" style="margin-bottom: 20px;">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">No Panduan</label>
                                            <div class="col-md-6 has-success">
                                                <input type="text" class="form-control" id="no_panduan" disabled>
                                                <!-- <p id="nik" style="font-size:12px; margin-top:5px;"></p> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8" style="margin-bottom: 20px;">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Umur</label>
                                            <div class="col-md-6 has-success">
                                                <input type="text" disabled="" class="form-control" value="<?php
                                                                                                            setlocale(LC_ALL, 'id_ID');
                                                                                                            date_default_timezone_set('Asia/Jakarta');
                                                                                                            $time = strtotime($data_mcu['tgl_lahir']);
                                                                                                            $date = strftime("%d %B %Y", $time);
                                                                                                            echo getAge($date)
                                                                                                            ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <hr>
                                <div class="row mt-20">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Dokter Pemeriksa</label>
                                            <div class="col-md-9 has-success">
                                                <input type="text" class="form-control" id="dokter_periksa" placeholder="Cari...">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-20">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-6 pt-5" for="kelainan">Apakah terdapat kelainan pada pemeriksaan-pemeriksaan di bawah?</label>
                                            <input type="radio" id="tidak_kelainan" name="kelainan" value="tidak">
                                            <label class="control-label" for="tidak_kelainan">Tidak</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <input type="radio" id="ya_kelainan" name="kelainan" value="ya">
                                            <label class="control-label" for="ya_kelainan">Ya</label>
                                        </div>
                                    </div>

                                </div>
                                <br>

                                <h4 class="panel-title txt-dark mt-20"><b><strong><i class="fa fa-user-md mr-10"></i>Status Neurologi</strong></b></h4>
                                <h6 class="panel-title txt-dark mt-20"><b>A. Rangsang Meningeal</b></h6>
                                <hr>
                                <div class="row mt-20">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Kaku Duduk:</label>
                                            <div class="col-md-9 ">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Ada" name="kaku_duduk" id="kaku_duduk1">
                                                            <label class="control-label" for="kaku_duduk1">Ada</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Tidak" name="kaku_duduk" id="kaku_duduk2">
                                                            <label class="control-label" for="kaku_duduk2">Tidak</label>
                                                        </span>
                                                    </div>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Laseque:</label>
                                            <div class="col-md-9 ">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Ada" name="laseque" id="laseque1">
                                                            <label class="control-label" for="laseque1">Ada</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Tidak" name="laseque" id="laseque2">
                                                            <label class="control-label" for="laseque2">Tidak</label>
                                                        </span>
                                                    </div>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Kernig:</label>
                                            <div class="col-md-9 ">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Ada" name="kernig" id="kernig1">
                                                            <label class="control-label" for="kernig1">Ada</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Tidak" name="kernig" id="kernig2">
                                                            <label class="control-label" for="kernig2">Tidak</label>
                                                        </span>
                                                    </div>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Brudzinski I:</label>
                                            <div class="col-md-9 ">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Ada" name="bruzinski_i" id="bruzinski_i1">
                                                            <label class="control-label" for="bruzinski_i1">Ada</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Tidak" name="bruzinski_i" id="bruzinski_i2">
                                                            <label class="control-label" for="bruzinski_i2">Tidak</label>
                                                        </span>
                                                    </div>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Brudzinski II:</label>
                                            <div class="col-md-9 ">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Ada" name="bruzinski_ii" id="bruzinski_ii1">
                                                            <label class="control-label" for="bruzinski_ii1">Ada</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Tidak" name="bruzinski_ii" id="bruzinski_ii2">
                                                            <label class="control-label" for="bruzinski_ii2">Tidak</label>
                                                        </span>
                                                    </div>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h6 class="panel-title txt-dark mt-20"><b>B. Saraf Otak</b></h6>
                                <hr>
                                <div class="row mt-20">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">N I (Olfaktorius):</label>
                                            <div class="col-md-6 ">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Normal" name="olfaktorius" id="olfaktorius1" checked>
                                                            <label class="control-label" for="olfaktorius1">Normal</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Kelainan" name="olfaktorius" id="olfaktorius2">
                                                            <label class="control-label" for="olfaktorius2">Kelainan</label>
                                                        </span>
                                                    </div>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">N II (Optikus):</label>
                                            <div class="col-md-6 ">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Normal" name="optikus" id="optikus1" checked>
                                                            <label class="control-label" for="optikus1">Normal</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Kelainan" name="optikus" id="optikus2">
                                                            <label class="control-label" for="optikus2">Kelainan</label>
                                                        </span>
                                                    </div>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">N III (Okulomotorius):</label>
                                            <div class="col-md-6 ">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Normal" name="okulomotorius" id="okulomotorius1" checked>
                                                            <label class="control-label" for="okulomotorius1">Normal</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Kelainan" name="okulomotorius" id="okulomotorius2">
                                                            <label class="control-label" for="okulomotorius2">Kelainan</label>
                                                        </span>
                                                    </div>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">N IV (Troklearis):</label>
                                            <div class="col-md-6 ">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Normal" name="troklearis" id="troklearis1" checked>
                                                            <label class="control-label" for="troklearis1">Normal</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Kelainan" name="troklearis" id="troklearis2">
                                                            <label class="control-label" for="troklearis2">Kelainan</label>
                                                        </span>
                                                    </div>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">N V (Trigeminus):</label>
                                            <div class="col-md-6 ">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Normal" name="trigeminus" id="trigeminus1" checked>
                                                            <label class="control-label" for="trigeminus1">Normal</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Kelainan" name="trigeminus" id="trigeminus2">
                                                            <label class="control-label" for="trigeminus2">Kelainan</label>
                                                        </span>
                                                    </div>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">N VI (Abducens):</label>
                                            <div class="col-md-6 ">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Normal" name="abducens" id="abducens1" checked>
                                                            <label class="control-label" for="abducens1">Normal</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Kelainan" name="abducens" id="abducens2">
                                                            <label class="control-label" for="abducens2">Kelainan</label>
                                                        </span>
                                                    </div>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">N VII (Fasialis):</label>
                                            <div class="col-md-6 ">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Normal" name="fasialis" id="fasialis1" checked>
                                                            <label class="control-label" for="fasialis1">Normal</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Kelainan" name="fasialis" id="fasialis2">
                                                            <label class="control-label" for="fasialis2">Kelainan</label>
                                                        </span>
                                                    </div>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">N VIII (Vestibulo Koklearis):</label>
                                            <div class="col-md-6 ">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Normal" name="vestibulo_koklearis" id="vestibulo_koklearis1" checked>
                                                            <label class="control-label" for="vestibulo_koklearis1">Normal</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Kelainan" name="vestibulo_koklearis" id="vestibulo_koklearis2">
                                                            <label class="control-label" for="vestibulo_koklearis2">Kelainan</label>
                                                        </span>
                                                    </div>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">N IX (Glosofaringeus):</label>
                                            <div class="col-md-6 ">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Normal" name="glosofaringeus" id="glosofaringeus1" checked>
                                                            <label class="control-label" for="glosofaringeus1">Normal</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Kelainan" name="glosofaringeus" id="glosofaringeus2">
                                                            <label class="control-label" for="glosofaringeus2">Kelainan</label>
                                                        </span>
                                                    </div>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">N X (Vagus):</label>
                                            <div class="col-md-6 ">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Normal" name="vagus" id="vagus1" checked>
                                                            <label class="control-label" for="vagus1">Normal</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Kelainan" name="vagus" id="vagus2">
                                                            <label class="control-label" for="vagus2">Kelainan</label>
                                                        </span>
                                                    </div>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">N XI (Asesorius):</label>
                                            <div class="col-md-6 ">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Normal" name="asesorius" id="asesorius1" checked>
                                                            <label class="control-label" for="asesorius1">Normal</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Kelainan" name="asesorius" id="asesorius2">
                                                            <label class="control-label" for="asesorius2">Kelainan</label>
                                                        </span>
                                                    </div>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">N XII (Hipoglosus):</label>
                                            <div class="col-md-6 ">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Normal" name="hipoglosus" id="hipoglosus1" checked>
                                                            <label class="control-label" for="hipoglosus1">Normal</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Kelainan" name="hipoglosus" id="hipoglosus2">
                                                            <label class="control-label" for="hipoglosus2">Kelainan</label>
                                                        </span>
                                                    </div>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <br>
                                <h4 class=" panel-title txt-dark mt-20"><b>C. Sistem Motorik</b></h4>
                                <hr>
                                <div class="row mt-20">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 pt-5">Anggota Gerak Atas:</label>
                                            <div class="col-md-8 has-success">
                                                <input type="text" class="form-control" id="motorik_anggota_gerak_atas">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 pt-5">Anggota Gerak Bawah:</label>
                                            <div class="col-md-8 has-success">
                                                <input type="text" class="form-control" id="motorik_anggota_gerak_bawah">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h4 class=" panel-title txt-dark mt-20"><b>D. Sistem Sensibilitas</b></h4>
                                <hr>
                                <div class="row mt-20">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 pt-5">Anggota Gerak Atas:</label>
                                            <div class="col-md-8 has-success">
                                                <input type="text" class="form-control" id="sensibilitas_anggota_gerak_atas">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 pt-5">Anggota Gerak Bawah:</label>
                                            <div class="col-md-8 has-success">
                                                <input type="text" class="form-control" id="sensibilitas_anggota_gerak_bawah">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h4 class=" panel-title txt-dark mt-20"><b>E. Refleks</b></h4>
                                <hr>
                                <div class="row mt-20">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 pt-5">Refleks Fisiologis:</label>
                                            <div class="col-md-8 has-success">
                                                <input type="text" class="form-control" id="refleks_fisiologis">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 pt-5">Refleks Patologis:</label>
                                            <div class="col-md-8 has-success">
                                                <input type="text" class="form-control" id="refleks_patologis">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 pt-5">Koordinasi:</label>
                                            <div class="col-md-8 has-success">
                                                <input type="text" class="form-control" id="koordinasi">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 pt-5">Vegetatif:</label>
                                            <div class="col-md-8 has-success">
                                                <input type="text" class="form-control" id="vegetatif">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h4 class=" panel-title txt-dark mt-20"><b>F. Fungsi Luhur</b></h4>
                                <hr>
                                <div class="row mt-20">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 pt-5">Bicara Spontan:</label>
                                            <div class="col-md-8 has-success">
                                                <input type="text" class="form-control" id="bicara_spontan">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 pt-5">Mengerti Pembicaraan:</label>
                                            <div class="col-md-8 has-success">
                                                <input type="text" class="form-control" id="mengerti_pembicaraan">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 pt-5">Menghitung:</label>
                                            <div class="col-md-8 has-success">
                                                <input type="text" class="form-control" id="menghitung">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 pt-5">Daya Ingat:</label>
                                            <div class="col-md-8 has-success">
                                                <input type="text" class="form-control" id="daya_ingat">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h4 class=" panel-title txt-dark mt-20"><b>G. Tanda Regresi</b></h4>
                                <hr>
                                <div class="row mt-20">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 pt-5">Tanda Regresi:</label>
                                            <div class="col-md-8 has-success">
                                                <input type="text" class="form-control" id="tanda_regresi">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h4 class=" panel-title txt-dark mt-20"><b><strong><i class="fa fa-user-md mr-10"></i>Kesimpulan</strong></b></h4>
                                <hr>
                                <div class="row mt-20">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Kesimpulan:</label>
                                            <div class="col-md-9 ">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Normal" name="kesimpulan" id="kesimpulan1">
                                                            <label class="control-label" for="kesimpulan1">Normal</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Kelainan" name="kesimpulan" id="kesimpulan2">
                                                            <label class="control-label" for="kesimpulan2">Kelainan</label>
                                                        </span>
                                                    </div>
                                                    <div class="col-md-9 has-success kesimpulan2 collapse">
                                                        <textarea class="form-control" rows="4" cols="50" placeholder="-" id="kesimpulan"></textarea>
                                                    </div>
                                                    <span class="help-block"></span>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <div class="modal-footer mb-5 mr-5 mt-10">
                                    <input type="hidden" id="id_mcu" value="<?php echo $data_mcu['id_mcu']; ?>">
                                    <button onclick="insertData()" class="btn btn-success btn-anim  btn-sm"><i
                                            class="icon-rocket"></i><span class="btn-text">SIMPAN</span></button>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Row -->


                </div>
                <!-- /Main Content -->

            </div>
        </div>
    </div>

</div>

<link rel="stylesheet" href="<?php echo base_url('assets/dist/jquery-ui.css'); ?>">
<script src="<?php echo base_url('assets/dist/jquery-ui.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/dist/jquery-ui.js'); ?>"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#dokter_periksa').autocomplete({
            source: function(query, response) {
                $.ajax({
                    url: "<?php echo base_url(); ?>Pelayanan_masuk/getNamaDokter",
                    type: "POST",
                    dataType: "json",
                    data: {
                        query: query,
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
                $('#dokter_periksa').val(ui.item.value);
            },
            select: function(event, ui) {
                //$('#inObat').val(ui.item.nama);
                //alert(ui.item.value);
                $('#dokter_periksa').val(ui.item.value);

            },
            // appendTo: "#modal_edit_resep"
        });
        $('input[name="kesimpulan"]').change(function() {
            if ($(this).val() === 'Kelainan' && $(this).prop('checked')) {
                $(".kesimpulan2").collapse('show');
            } else {
                $(".kesimpulan2").collapse('hide'); // Jika radio button lain dipilih, sembunyikan kembali (opsional)
            }
        });
    });
</script>

<script type="text/javascript">
    function insertData() {
        var kesimpulan = $("input[name='kesimpulan']:checked").val();
        kesimpulan = (kesimpulan === 'Kelainan') ? $("#kesimpulan").val() : kesimpulan;
        swal({
            title: "Apakah kamu yakin ingin !",
            text: "Menyimpan Data  ini ?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3cb878",
            confirmButtonText: "Yakin",
            cancelButtonText: "Batal",
            closeOnConfirm: false
        }, function() {
            $().ready(function() {
                $.ajax({
                    url: "<?php echo base_url() ?>Pemeriksaan_fisik_mcu/simpan_neurologi",
                    method: "POST",
                    dataType: "json",
                    data: {
                        id_mcu: $('#id_mcu').val(),
                        dokter_periksa: $('#dokter_periksa').val(),
                        kelainan: $('input[name="kelainan"]:checked').val(),
                        kaku_duduk: $('input[name="kaku_duduk"]:checked').val(),
                        laseque: $('input[name="laseque"]:checked').val(),
                        kernig: $('input[name="kernig"]:checked').val(),
                        bruzinskiI: $('input[name="bruzinski_i"]:checked').val(),
                        bruzinskiII: $('input[name="bruzinski_ii"]:checked').val(),
                        olfaktorius: $('input[name="olfaktorius"]:checked').val(),
                        optikus: $('input[name="optikus"]:checked').val(),
                        okulomotorius: $('input[name="okulomotorius"]:checked').val(),
                        troklearis: $('input[name="troklearis"]:checked').val(),
                        trigeminus: $('input[name="trigeminus"]:checked').val(),
                        abducens: $('input[name="abducens"]:checked').val(),
                        fasialis: $('input[name="fasialis"]:checked').val(),
                        vestibulo_koklearis: $('input[name="vestibulo_koklearis"]:checked').val(),
                        glosofaringeus: $('input[name="glosofaringeus"]:checked').val(),
                        vagus: $('input[name="vagus"]:checked').val(),
                        asesorius: $('input[name="asesorius"]:checked').val(),
                        hipoglosus: $('input[name="hipoglosus"]:checked').val(),
                        motorik_anggota_gerak_atas: $('#motorik_anggota_gerak_atas').val(),
                        motorik_anggota_gerak_bawah: $('#motorik_anggota_gerak_bawah').val(),
                        sensibilitas_anggota_gerak_atas: $('#sensibilitas_anggota_gerak_atas').val(),
                        sensibilitas_anggota_gerak_bawah: $('#sensibilitas_anggota_gerak_bawah').val(),
                        refleks_fisiologis: $('#refleks_fisiologis').val(),
                        refleks_patologis: $('#refleks_patologis').val(),
                        koordinasi: $('#koordinasi').val(),
                        vegetatif: $('#vegetatif').val(),
                        bicara_spontan: $('#bicara_spontan').val(),
                        mengerti_pembicaraan: $('#mengerti_pembicaraan').val(),
                        menghitung: $('#menghitung').val(),
                        daya_ingat: $('#daya_ingat').val(),
                        tandaRegresi: $('#tanda_regresi').val(),
                        kesimpulan: kesimpulan,

                    },
                    success: function(data) {
                        if (data.status == "success") {
                            swal({
                                title: "good job!",
                                type: "success",
                                text: "Data Medical Check Up Pasien ini telah disimpan",
                                confirmButtonColor: "#3cb878",
                            }, function() {
                                location.reload();
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

    $(document).ready(function() {
        id_pelayanan = $('#id_mcu').val();
        $.ajax({
            url: "<?php echo base_url() ?>Pemeriksaan_fisik_mcu/get_data_pemeriksaan",
            method: "POST",
            dataType: 'json',
            data: {
                id: id_pelayanan,
                table: 'neurologi_mcu',
            },
            success: function(data) {
                if (data.status_dt == 'found') {

                    $('#dokter_periksa').val(data.dokter_periksa);
                    $('input[name="kelainan"][value="' + data.kelainan + '"]').prop("checked", true);
                    $('input[name="kaku_duduk"][value="' + data.kaku_duduk + '"]').prop("checked", true);
                    $('input[name="laseque"][value="' + data.laseque + '"]').prop("checked", true);
                    $('input[name="kernig"][value="' + data.kernig + '"]').prop("checked", true);
                    $('input[name="bruzinski_i"][value="' + data.bruzinskiI + '"]').prop("checked", true);
                    $('input[name="bruzinski_ii"][value="' + data.bruzinski2 + '"]').prop("checked", true);
                    $('input[name="olfaktorius"][value="' + data.olfaktorius + '"]').prop("checked", true);
                    $('input[name="optikus"][value="' + data.optikus + '"]').prop("checked", true);
                    $('input[name="okulomotorius"][value="' + data.okulomotorius + '"]').prop("checked", true);
                    $('input[name="troklearis"][value="' + data.troklearis + '"]').prop("checked", true);
                    $('input[name="trigeminus"][value="' + data.trigeminus + '"]').prop("checked", true);
                    $('input[name="abducens"][value="' + data.abducens + '"]').prop("checked", true);
                    $('input[name="fasialis"][value="' + data.fasialis + '"]').prop("checked", true);
                    $('input[name="vestibulo_koklearis"][value="' + data.vestibulo_koklearis + '"]').prop("checked", true);
                    $('input[name="glosofaringeus"][value="' + data.glosofaringeus + '"]').prop("checked", true);
                    $('input[name="vagus"][value="' + data.vagus + '"]').prop("checked", true);
                    $('input[name="asesorius"][value="' + data.asesorius + '"]').prop("checked", true);
                    $('input[name="hipoglosus"][value="' + data.hipoglosus + '"]').prop("checked", true);

                    // Mengatur input teks
                    $('#motorik_anggota_gerak_atas').val(data.motorik_anggota_gerak_atas);
                    $('#motorik_anggota_gerak_bawah').val(data.motorik_anggota_gerak_bawah);
                    $('#sensibilitas_anggota_gerak_atas').val(data.sensibilitas_anggota_gerak_atas);
                    $('#sensibilitas_anggota_gerak_bawah').val(data.sensibilitas_anggota_gerak_bawah);
                    $('#refleks_fisiologis').val(data.refleks_fisiologis);
                    $('#refleks_patologis').val(data.refleks_patologis);
                    $('#koordinasi').val(data.koordinasi);
                    $('#vegetatif').val(data.vegetatif);
                    $('#bicara_spontan').val(data.bicara_spontan);
                    $('#mengerti_pembicaraan').val(data.mengerti_pembicaraan);
                    $('#menghitung').val(data.menghitung);
                    $('#daya_ingat').val(data.daya_ingat);
                    $('#tanda_regresi').val(data.tandaRegresi);
                    if (data.kesimpulan === 'Normal') {
                        $('input[name="kesimpulan"][value="' + data.kesimpulan + '"]').prop("checked", true);
                    } else {
                        $('input[name="kesimpulan"][value="Kelainan"]').prop("checked", true).change();
                        $('#kesimpulan').val(data.kesimpulan);
                    }

                }
            }

        });
    });
=======
<div class="page_content">
    <!-- Row -->
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default card-view">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h2 class="panel-title txt-dark"><strong>Neurologi</strong></h2>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="table-wrap">
                            <div class="table-responsive">
                                <h4 class="panel-title txt-dark"><b><strong>DATA PASIEN</strong></b></h4>



                                <div class="row mt-20">
                                    <div class="col-md-8" style="margin-bottom: 20px;">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">NIK</label>
                                            <div class="col-md-6 has-success">
                                                <input type="text" class="form-control" id="nik_npp" value="<?php echo $data_mcu['no_ktp']; ?>" disabled>
                                                <!-- <p id="nik" style="font-size:12px; margin-top:5px;"></p> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8" style="margin-bottom: 20px;">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Nama Lengkap</label>
                                            <div class="col-md-6 has-success">
                                                <input type="text" class="form-control" id="inName" disabled=""
                                                    value="<?php echo $data_mcu['nama_pasien']; ?>">
                                                <p id="namefull" style="font-size:12px; margin-top:5px;"></p>
                                                <input type="hidden" id="intanggalmasuk"
                                                    value="<?php echo date('Y-m-d H:i:s'); ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8" style="margin-bottom: 20px;">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Jenis Kelamin</label>
                                            <div class="col-md-6 has-success">
                                                <input type="text" class="form-control" id="inJK" value="<?php echo $data_mcu['jenis_kelamin']; ?>" disabled>
                                                <!-- <p id="nik" style="font-size:12px; margin-top:5px;"></p> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8" style="margin-bottom: 20px;">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">No Panduan</label>
                                            <div class="col-md-6 has-success">
                                                <input type="text" class="form-control" id="no_panduan" disabled>
                                                <!-- <p id="nik" style="font-size:12px; margin-top:5px;"></p> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8" style="margin-bottom: 20px;">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Umur</label>
                                            <div class="col-md-6 has-success">
                                                <input type="text" disabled="" class="form-control" value="<?php
                                                                                                            setlocale(LC_ALL, 'id_ID');
                                                                                                            date_default_timezone_set('Asia/Jakarta');
                                                                                                            $time = strtotime($data_mcu['tgl_lahir']);
                                                                                                            $date = strftime("%d %B %Y", $time);
                                                                                                            echo getAge($date)
                                                                                                            ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <hr>
                                <div class="row mt-20">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Dokter Pemeriksa</label>
                                            <div class="col-md-9 has-success">
                                                <input type="text" class="form-control" id="dokter_periksa" placeholder="Cari...">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-20">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-6 pt-5" for="kelainan">Apakah terdapat kelainan pada pemeriksaan-pemeriksaan di bawah?</label>
                                            <input type="radio" id="tidak_kelainan" name="kelainan" value="tidak">
                                            <label class="control-label" for="tidak_kelainan">Tidak</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <input type="radio" id="ya_kelainan" name="kelainan" value="ya">
                                            <label class="control-label" for="ya_kelainan">Ya</label>
                                        </div>
                                    </div>

                                </div>
                                <br>

                                <h4 class="panel-title txt-dark mt-20"><b><strong><i class="fa fa-user-md mr-10"></i>Status Neurologi</strong></b></h4>
                                <h6 class="panel-title txt-dark mt-20"><b>A. Rangsang Meningeal</b></h6>
                                <hr>
                                <div class="row mt-20">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Kaku Duduk:</label>
                                            <div class="col-md-9 ">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Ada" name="kaku_duduk" id="kaku_duduk1">
                                                            <label class="control-label" for="kaku_duduk1">Ada</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Tidak" name="kaku_duduk" id="kaku_duduk2">
                                                            <label class="control-label" for="kaku_duduk2">Tidak</label>
                                                        </span>
                                                    </div>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Laseque:</label>
                                            <div class="col-md-9 ">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Ada" name="laseque" id="laseque1">
                                                            <label class="control-label" for="laseque1">Ada</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Tidak" name="laseque" id="laseque2">
                                                            <label class="control-label" for="laseque2">Tidak</label>
                                                        </span>
                                                    </div>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Kernig:</label>
                                            <div class="col-md-9 ">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Ada" name="kernig" id="kernig1">
                                                            <label class="control-label" for="kernig1">Ada</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Tidak" name="kernig" id="kernig2">
                                                            <label class="control-label" for="kernig2">Tidak</label>
                                                        </span>
                                                    </div>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Brudzinski I:</label>
                                            <div class="col-md-9 ">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Ada" name="bruzinski_i" id="bruzinski_i1">
                                                            <label class="control-label" for="bruzinski_i1">Ada</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Tidak" name="bruzinski_i" id="bruzinski_i2">
                                                            <label class="control-label" for="bruzinski_i2">Tidak</label>
                                                        </span>
                                                    </div>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Brudzinski II:</label>
                                            <div class="col-md-9 ">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Ada" name="bruzinski_ii" id="bruzinski_ii1">
                                                            <label class="control-label" for="bruzinski_ii1">Ada</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Tidak" name="bruzinski_ii" id="bruzinski_ii2">
                                                            <label class="control-label" for="bruzinski_ii2">Tidak</label>
                                                        </span>
                                                    </div>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h6 class="panel-title txt-dark mt-20"><b>B. Saraf Otak</b></h6>
                                <hr>
                                <div class="row mt-20">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">N I (Olfaktorius):</label>
                                            <div class="col-md-6 ">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Normal" name="olfaktorius" id="olfaktorius1" checked>
                                                            <label class="control-label" for="olfaktorius1">Normal</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Kelainan" name="olfaktorius" id="olfaktorius2">
                                                            <label class="control-label" for="olfaktorius2">Kelainan</label>
                                                        </span>
                                                    </div>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">N II (Optikus):</label>
                                            <div class="col-md-6 ">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Normal" name="optikus" id="optikus1" checked>
                                                            <label class="control-label" for="optikus1">Normal</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Kelainan" name="optikus" id="optikus2">
                                                            <label class="control-label" for="optikus2">Kelainan</label>
                                                        </span>
                                                    </div>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">N III (Okulomotorius):</label>
                                            <div class="col-md-6 ">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Normal" name="okulomotorius" id="okulomotorius1" checked>
                                                            <label class="control-label" for="okulomotorius1">Normal</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Kelainan" name="okulomotorius" id="okulomotorius2">
                                                            <label class="control-label" for="okulomotorius2">Kelainan</label>
                                                        </span>
                                                    </div>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">N IV (Troklearis):</label>
                                            <div class="col-md-6 ">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Normal" name="troklearis" id="troklearis1" checked>
                                                            <label class="control-label" for="troklearis1">Normal</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Kelainan" name="troklearis" id="troklearis2">
                                                            <label class="control-label" for="troklearis2">Kelainan</label>
                                                        </span>
                                                    </div>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">N V (Trigeminus):</label>
                                            <div class="col-md-6 ">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Normal" name="trigeminus" id="trigeminus1" checked>
                                                            <label class="control-label" for="trigeminus1">Normal</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Kelainan" name="trigeminus" id="trigeminus2">
                                                            <label class="control-label" for="trigeminus2">Kelainan</label>
                                                        </span>
                                                    </div>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">N VI (Abducens):</label>
                                            <div class="col-md-6 ">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Normal" name="abducens" id="abducens1" checked>
                                                            <label class="control-label" for="abducens1">Normal</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Kelainan" name="abducens" id="abducens2">
                                                            <label class="control-label" for="abducens2">Kelainan</label>
                                                        </span>
                                                    </div>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">N VII (Fasialis):</label>
                                            <div class="col-md-6 ">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Normal" name="fasialis" id="fasialis1" checked>
                                                            <label class="control-label" for="fasialis1">Normal</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Kelainan" name="fasialis" id="fasialis2">
                                                            <label class="control-label" for="fasialis2">Kelainan</label>
                                                        </span>
                                                    </div>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">N VIII (Vestibulo Koklearis):</label>
                                            <div class="col-md-6 ">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Normal" name="vestibulo_koklearis" id="vestibulo_koklearis1" checked>
                                                            <label class="control-label" for="vestibulo_koklearis1">Normal</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Kelainan" name="vestibulo_koklearis" id="vestibulo_koklearis2">
                                                            <label class="control-label" for="vestibulo_koklearis2">Kelainan</label>
                                                        </span>
                                                    </div>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">N IX (Glosofaringeus):</label>
                                            <div class="col-md-6 ">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Normal" name="glosofaringeus" id="glosofaringeus1" checked>
                                                            <label class="control-label" for="glosofaringeus1">Normal</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Kelainan" name="glosofaringeus" id="glosofaringeus2">
                                                            <label class="control-label" for="glosofaringeus2">Kelainan</label>
                                                        </span>
                                                    </div>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">N X (Vagus):</label>
                                            <div class="col-md-6 ">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Normal" name="vagus" id="vagus1" checked>
                                                            <label class="control-label" for="vagus1">Normal</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Kelainan" name="vagus" id="vagus2">
                                                            <label class="control-label" for="vagus2">Kelainan</label>
                                                        </span>
                                                    </div>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">N XI (Asesorius):</label>
                                            <div class="col-md-6 ">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Normal" name="asesorius" id="asesorius1" checked>
                                                            <label class="control-label" for="asesorius1">Normal</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Kelainan" name="asesorius" id="asesorius2">
                                                            <label class="control-label" for="asesorius2">Kelainan</label>
                                                        </span>
                                                    </div>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">N XII (Hipoglosus):</label>
                                            <div class="col-md-6 ">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Normal" name="hipoglosus" id="hipoglosus1" checked>
                                                            <label class="control-label" for="hipoglosus1">Normal</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Kelainan" name="hipoglosus" id="hipoglosus2">
                                                            <label class="control-label" for="hipoglosus2">Kelainan</label>
                                                        </span>
                                                    </div>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <br>
                                <h4 class=" panel-title txt-dark mt-20"><b>C. Sistem Motorik</b></h4>
                                <hr>
                                <div class="row mt-20">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 pt-5">Anggota Gerak Atas:</label>
                                            <div class="col-md-8 has-success">
                                                <input type="text" class="form-control" id="motorik_anggota_gerak_atas">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 pt-5">Anggota Gerak Bawah:</label>
                                            <div class="col-md-8 has-success">
                                                <input type="text" class="form-control" id="motorik_anggota_gerak_bawah">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h4 class=" panel-title txt-dark mt-20"><b>D. Sistem Sensibilitas</b></h4>
                                <hr>
                                <div class="row mt-20">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 pt-5">Anggota Gerak Atas:</label>
                                            <div class="col-md-8 has-success">
                                                <input type="text" class="form-control" id="sensibilitas_anggota_gerak_atas">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 pt-5">Anggota Gerak Bawah:</label>
                                            <div class="col-md-8 has-success">
                                                <input type="text" class="form-control" id="sensibilitas_anggota_gerak_bawah">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h4 class=" panel-title txt-dark mt-20"><b>E. Refleks</b></h4>
                                <hr>
                                <div class="row mt-20">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 pt-5">Refleks Fisiologis:</label>
                                            <div class="col-md-8 has-success">
                                                <input type="text" class="form-control" id="refleks_fisiologis">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 pt-5">Refleks Patologis:</label>
                                            <div class="col-md-8 has-success">
                                                <input type="text" class="form-control" id="refleks_patologis">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 pt-5">Koordinasi:</label>
                                            <div class="col-md-8 has-success">
                                                <input type="text" class="form-control" id="koordinasi">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 pt-5">Vegetatif:</label>
                                            <div class="col-md-8 has-success">
                                                <input type="text" class="form-control" id="vegetatif">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h4 class=" panel-title txt-dark mt-20"><b>F. Fungsi Luhur</b></h4>
                                <hr>
                                <div class="row mt-20">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 pt-5">Bicara Spontan:</label>
                                            <div class="col-md-8 has-success">
                                                <input type="text" class="form-control" id="bicara_spontan">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 pt-5">Mengerti Pembicaraan:</label>
                                            <div class="col-md-8 has-success">
                                                <input type="text" class="form-control" id="mengerti_pembicaraan">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 pt-5">Menghitung:</label>
                                            <div class="col-md-8 has-success">
                                                <input type="text" class="form-control" id="menghitung">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 pt-5">Daya Ingat:</label>
                                            <div class="col-md-8 has-success">
                                                <input type="text" class="form-control" id="daya_ingat">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h4 class=" panel-title txt-dark mt-20"><b>G. Tanda Regresi</b></h4>
                                <hr>
                                <div class="row mt-20">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 pt-5">Tanda Regresi:</label>
                                            <div class="col-md-8 has-success">
                                                <input type="text" class="form-control" id="tanda_regresi">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h4 class=" panel-title txt-dark mt-20"><b><strong><i class="fa fa-user-md mr-10"></i>Kesimpulan</strong></b></h4>
                                <hr>
                                <div class="row mt-20">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Kesimpulan:</label>
                                            <div class="col-md-9 ">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Normal" name="kesimpulan" id="kesimpulan1">
                                                            <label class="control-label" for="kesimpulan1">Normal</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Kelainan" name="kesimpulan" id="kesimpulan2">
                                                            <label class="control-label" for="kesimpulan2">Kelainan</label>
                                                        </span>
                                                    </div>
                                                    <div class="col-md-9 has-success kesimpulan2 collapse">
                                                        <textarea class="form-control" rows="4" cols="50" placeholder="-" id="kesimpulan"></textarea>
                                                    </div>
                                                    <span class="help-block"></span>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <div class="modal-footer mb-5 mr-5 mt-10">
                                    <input type="hidden" id="id_mcu" value="<?php echo $data_mcu['id_mcu']; ?>">
                                    <button onclick="insertData()" class="btn btn-success btn-anim  btn-sm"><i
                                            class="icon-rocket"></i><span class="btn-text">SIMPAN</span></button>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Row -->


                </div>
                <!-- /Main Content -->

            </div>
        </div>
    </div>

</div>

<link rel="stylesheet" href="<?php echo base_url('assets/dist/jquery-ui.css'); ?>">
<script src="<?php echo base_url('assets/dist/jquery-ui.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/dist/jquery-ui.js'); ?>"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#dokter_periksa').autocomplete({
            source: function(query, response) {
                $.ajax({
                    url: "<?php echo base_url(); ?>Pelayanan_masuk/getNamaDokter",
                    type: "POST",
                    dataType: "json",
                    data: {
                        query: query,
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
                $('#dokter_periksa').val(ui.item.value);
            },
            select: function(event, ui) {
                //$('#inObat').val(ui.item.nama);
                //alert(ui.item.value);
                $('#dokter_periksa').val(ui.item.value);

            },
            // appendTo: "#modal_edit_resep"
        });
        $('input[name="kesimpulan"]').change(function() {
            if ($(this).val() === 'Kelainan' && $(this).prop('checked')) {
                $(".kesimpulan2").collapse('show');
            } else {
                $(".kesimpulan2").collapse('hide'); // Jika radio button lain dipilih, sembunyikan kembali (opsional)
            }
        });
    });
</script>

<script type="text/javascript">
    function insertData() {
        var kesimpulan = $("input[name='kesimpulan']:checked").val();
        kesimpulan = (kesimpulan === 'Kelainan') ? $("#kesimpulan").val() : kesimpulan;
        swal({
            title: "Apakah kamu yakin ingin !",
            text: "Menyimpan Data  ini ?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3cb878",
            confirmButtonText: "Yakin",
            cancelButtonText: "Batal",
            closeOnConfirm: false
        }, function() {
            $().ready(function() {
                $.ajax({
                    url: "<?php echo base_url() ?>Pemeriksaan_fisik_mcu/simpan_neurologi",
                    method: "POST",
                    dataType: "json",
                    data: {
                        id_mcu: $('#id_mcu').val(),
                        dokter_periksa: $('#dokter_periksa').val(),
                        kelainan: $('input[name="kelainan"]:checked').val(),
                        kaku_duduk: $('input[name="kaku_duduk"]:checked').val(),
                        laseque: $('input[name="laseque"]:checked').val(),
                        kernig: $('input[name="kernig"]:checked').val(),
                        bruzinskiI: $('input[name="bruzinski_i"]:checked').val(),
                        bruzinskiII: $('input[name="bruzinski_ii"]:checked').val(),
                        olfaktorius: $('input[name="olfaktorius"]:checked').val(),
                        optikus: $('input[name="optikus"]:checked').val(),
                        okulomotorius: $('input[name="okulomotorius"]:checked').val(),
                        troklearis: $('input[name="troklearis"]:checked').val(),
                        trigeminus: $('input[name="trigeminus"]:checked').val(),
                        abducens: $('input[name="abducens"]:checked').val(),
                        fasialis: $('input[name="fasialis"]:checked').val(),
                        vestibulo_koklearis: $('input[name="vestibulo_koklearis"]:checked').val(),
                        glosofaringeus: $('input[name="glosofaringeus"]:checked').val(),
                        vagus: $('input[name="vagus"]:checked').val(),
                        asesorius: $('input[name="asesorius"]:checked').val(),
                        hipoglosus: $('input[name="hipoglosus"]:checked').val(),
                        motorik_anggota_gerak_atas: $('#motorik_anggota_gerak_atas').val(),
                        motorik_anggota_gerak_bawah: $('#motorik_anggota_gerak_bawah').val(),
                        sensibilitas_anggota_gerak_atas: $('#sensibilitas_anggota_gerak_atas').val(),
                        sensibilitas_anggota_gerak_bawah: $('#sensibilitas_anggota_gerak_bawah').val(),
                        refleks_fisiologis: $('#refleks_fisiologis').val(),
                        refleks_patologis: $('#refleks_patologis').val(),
                        koordinasi: $('#koordinasi').val(),
                        vegetatif: $('#vegetatif').val(),
                        bicara_spontan: $('#bicara_spontan').val(),
                        mengerti_pembicaraan: $('#mengerti_pembicaraan').val(),
                        menghitung: $('#menghitung').val(),
                        daya_ingat: $('#daya_ingat').val(),
                        tandaRegresi: $('#tanda_regresi').val(),
                        kesimpulan: kesimpulan,

                    },
                    success: function(data) {
                        if (data.status == "success") {
                            swal({
                                title: "good job!",
                                type: "success",
                                text: "Data Medical Check Up Pasien ini telah disimpan",
                                confirmButtonColor: "#3cb878",
                            }, function() {
                                location.reload();
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

    $(document).ready(function() {
        id_pelayanan = $('#id_mcu').val();
        $.ajax({
            url: "<?php echo base_url() ?>Pemeriksaan_fisik_mcu/get_data_pemeriksaan",
            method: "POST",
            dataType: 'json',
            data: {
                id: id_pelayanan,
                table: 'neurologi_mcu',
            },
            success: function(data) {
                if (data.status_dt == 'found') {

                    $('#dokter_periksa').val(data.dokter_periksa);
                    $('input[name="kelainan"][value="' + data.kelainan + '"]').prop("checked", true);
                    $('input[name="kaku_duduk"][value="' + data.kaku_duduk + '"]').prop("checked", true);
                    $('input[name="laseque"][value="' + data.laseque + '"]').prop("checked", true);
                    $('input[name="kernig"][value="' + data.kernig + '"]').prop("checked", true);
                    $('input[name="bruzinski_i"][value="' + data.bruzinskiI + '"]').prop("checked", true);
                    $('input[name="bruzinski_ii"][value="' + data.bruzinski2 + '"]').prop("checked", true);
                    $('input[name="olfaktorius"][value="' + data.olfaktorius + '"]').prop("checked", true);
                    $('input[name="optikus"][value="' + data.optikus + '"]').prop("checked", true);
                    $('input[name="okulomotorius"][value="' + data.okulomotorius + '"]').prop("checked", true);
                    $('input[name="troklearis"][value="' + data.troklearis + '"]').prop("checked", true);
                    $('input[name="trigeminus"][value="' + data.trigeminus + '"]').prop("checked", true);
                    $('input[name="abducens"][value="' + data.abducens + '"]').prop("checked", true);
                    $('input[name="fasialis"][value="' + data.fasialis + '"]').prop("checked", true);
                    $('input[name="vestibulo_koklearis"][value="' + data.vestibulo_koklearis + '"]').prop("checked", true);
                    $('input[name="glosofaringeus"][value="' + data.glosofaringeus + '"]').prop("checked", true);
                    $('input[name="vagus"][value="' + data.vagus + '"]').prop("checked", true);
                    $('input[name="asesorius"][value="' + data.asesorius + '"]').prop("checked", true);
                    $('input[name="hipoglosus"][value="' + data.hipoglosus + '"]').prop("checked", true);

                    // Mengatur input teks
                    $('#motorik_anggota_gerak_atas').val(data.motorik_anggota_gerak_atas);
                    $('#motorik_anggota_gerak_bawah').val(data.motorik_anggota_gerak_bawah);
                    $('#sensibilitas_anggota_gerak_atas').val(data.sensibilitas_anggota_gerak_atas);
                    $('#sensibilitas_anggota_gerak_bawah').val(data.sensibilitas_anggota_gerak_bawah);
                    $('#refleks_fisiologis').val(data.refleks_fisiologis);
                    $('#refleks_patologis').val(data.refleks_patologis);
                    $('#koordinasi').val(data.koordinasi);
                    $('#vegetatif').val(data.vegetatif);
                    $('#bicara_spontan').val(data.bicara_spontan);
                    $('#mengerti_pembicaraan').val(data.mengerti_pembicaraan);
                    $('#menghitung').val(data.menghitung);
                    $('#daya_ingat').val(data.daya_ingat);
                    $('#tanda_regresi').val(data.tandaRegresi);
                    if (data.kesimpulan === 'Normal') {
                        $('input[name="kesimpulan"][value="' + data.kesimpulan + '"]').prop("checked", true);
                    } else {
                        $('input[name="kesimpulan"][value="Kelainan"]').prop("checked", true).change();
                        $('#kesimpulan').val(data.kesimpulan);
                    }

                }
            }

        });
    });
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
</script>