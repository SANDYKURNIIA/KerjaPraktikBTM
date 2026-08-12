<<<<<<< HEAD
<div class="page_content">
    <!-- Row -->
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default card-view">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h2 class="panel-title txt-dark"><strong>THT</strong></h2>
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

                                <h4 class="panel-title txt-dark mt-20"><b><strong><i class="fa fa-user-md mr-10"></i>Telinga</strong></b></h4>
                                <hr>
                                <div class="row mt-20">

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Auricula:</label>
                                            <div class="col-md-6 ">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Normal" name="auricula" id="auricula1" checked>
                                                            <label class="control-label" for="auricula1">Normal</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Kelainan" name="auricula" id="auricula2">
                                                            <label class="control-label" for="auricula2">Kelainan</label>
                                                        </span>
                                                    </div>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Canalis Auditorius Externus:</label>
                                            <div class="col-md-6 ">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Normal" name="canalis_auditorius_externus" id="canalis_auditorius_externus1" checked>
                                                            <label class="control-label" for="canalis_auditorius_externus1">Normal</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Kelainan" name="canalis_auditorius_externus" id="canalis_auditorius_externus2">
                                                            <label class="control-label" for="canalis_auditorius_externus2">Kelainan</label>
                                                        </span>
                                                    </div>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Kulit Canalis:</label>
                                            <div class="col-md-6 ">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Normal" name="kulit_canalis" id="kulit_canalis1" checked>
                                                            <label class="control-label" for="kulit_canalis1">Normal</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Kelainan" name="kulit_canalis" id="kulit_canalis2">
                                                            <label class="control-label" for="kulit_canalis2">Kelainan</label>
                                                        </span>
                                                    </div>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Discharge:</label>
                                            <div class="col-md-6 ">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Normal" name="discharge" id="discharge1" checked>
                                                            <label class="control-label" for="discharge1">Normal</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Kelainan" name="discharge" id="discharge2">
                                                            <label class="control-label" for="discharge2">Kelainan</label>
                                                        </span>
                                                    </div>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Membran Tympani:</label>
                                            <div class="col-md-6 ">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Normal" name="membran_tympani" id="membran_tympani1" checked>
                                                            <label class="control-label" for="membran_tympani1">Normal</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Kelainan" name="membran_tympani" id="membran_tympani2">
                                                            <label class="control-label" for="membran_tympani2">Kelainan</label>
                                                        </span>
                                                    </div>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Cavum Tympani:</label>
                                            <div class="col-md-6 ">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Normal" name="cavum_tympani" id="cavum_tympani1" checked>
                                                            <label class="control-label" for="cavum_tympani1">Normal</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Kelainan" name="cavum_tympani" id="cavum_tympani2">
                                                            <label class="control-label" for="cavum_tympani2">Kelainan</label>
                                                        </span>
                                                    </div>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>

                                <h4 class="panel-title txt-dark mt-20"><b><strong><i class="fa fa-user-md mr-10"></i>Hidung</strong></b></h4>
                                <hr>
                                <div class="row mt-20">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Mucosa Cavum Nasi:</label>
                                            <div class="col-md-9 ">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Normal" name="mucosa_cavum_nasi" id="mucosa_cavum_nasi1" checked>
                                                            <label class="control-label" for="mucosa_cavum_nasi1">Normal</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Kelainan" name="mucosa_cavum_nasi" id="mucosa_cavum_nasi2">
                                                            <label class="control-label" for="mucosa_cavum_nasi2">Kelainan</label>
                                                        </span>
                                                    </div>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Concha:</label>
                                            <div class="col-md-9 ">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Normal" name="concha" id="concha1" checked>
                                                            <label class="control-label" for="concha1">Normal</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Kelainan" name="concha" id="concha2">
                                                            <label class="control-label" for="concha2">Kelainan</label>
                                                        </span>
                                                    </div>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-20">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Septum Nasi:</label>
                                            <div class="col-md-9 ">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Normal" name="septum_nasi" id="septum_nasi1" checked>
                                                            <label class="control-label" for="septum_nasi1">Normal</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Kelainan" name="septum_nasi" id="septum_nasi2">
                                                            <label class="control-label" for="septum_nasi2">Kelainan</label>
                                                        </span>
                                                    </div>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Dishcarge:</label>
                                            <div class="col-md-9 ">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Normal" name="dishcarge" id="dishcarge1" checked>
                                                            <label class="control-label" for="dishcarge1">Normal</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Kelainan" name="dishcarge" id="dishcarge2">
                                                            <label class="control-label" for="dishcarge2">Kelainan</label>
                                                        </span>
                                                    </div>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h4 class="panel-title txt-dark mt-20"><b><strong><i class="fa fa-user-md mr-10"></i>Tenggorokan</strong></b></h4>
                                <hr>
                                <div class="row mt-20">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Pharynx:</label>
                                            <div class="col-md-9 ">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Normal" name="pharynx" id="pharynx1" checked>
                                                            <label class="control-label" for="pharynx1">Normal</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Kelainan" name="pharynx" id="pharynx2">
                                                            <label class="control-label" for="pharynx2">Kelainan</label>
                                                        </span>
                                                    </div>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Naso Pharynx:</label>
                                            <div class="col-md-9 ">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Normal" name="naso_pharynx" id="naso_pharynx1" checked>
                                                            <label class="control-label" for="naso_pharynx1">Normal</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Kelainan" name="naso_pharynx" id="naso_pharynx2">
                                                            <label class="control-label" for="naso_pharynx2">Kelainan</label>
                                                        </span>
                                                    </div>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Oro Pharynx:</label>
                                            <div class="col-md-9 ">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Normal" name="oro_pharynx" id="oro_pharynx1" checked>
                                                            <label class="control-label" for="oro_pharynx1">Normal</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Kelainan" name="oro_pharynx" id="oro_pharynx2">
                                                            <label class="control-label" for="oro_pharynx2">Kelainan</label>
                                                        </span>
                                                    </div>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Laryngo Pharynx:</label>
                                            <div class="col-md-9 ">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Normal" name="laryngo_pharynx" id="laryngo_pharynx1" checked>
                                                            <label class="control-label" for="laryngo_pharynx1">Normal</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Kelainan" name="laryngo_pharynx" id="laryngo_pharynx2">
                                                            <label class="control-label" for="laryngo_pharynx2">Kelainan</label>
                                                        </span>
                                                    </div>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <h4 class="panel-title txt-dark mt-20"><b><strong><i class="fa fa-user-md mr-10"></i>Larynx</strong></b></h4>
                                <hr>
                                <div class="row mt-20">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Supra Glotis:</label>
                                            <div class="col-md-9 ">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Normal" name="supra_glotis" id="supra_glotis1" checked>
                                                            <label class="control-label" for="supra_glotis1">Normal</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Kelainan" name="supra_glotis" id="supra_glotis2">
                                                            <label class="control-label" for="supra_glotis2">Kelainan</label>
                                                        </span>
                                                    </div>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Glotis:</label>
                                            <div class="col-md-9 ">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Normal" name="glotis" id="glotis1" checked>
                                                            <label class="control-label" for="glotis1">Normal</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Kelainan" name="glotis" id="glotis2">
                                                            <label class="control-label" for="glotis2">Kelainan</label>
                                                        </span>
                                                    </div>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Sub Glotis:</label>
                                            <div class="col-md-9 ">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Normal" name="sub_glotis" id="sub_glotis1" checked>
                                                            <label class="control-label" for="sub_glotis1">Normal</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Kelainan" name="sub_glotis" id="sub_glotis2">
                                                            <label class="control-label" for="sub_glotis2">Kelainan</label>
                                                        </span>
                                                    </div>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h4 class="panel-title txt-dark mt-20"><b><strong><i class="fa fa-user-md mr-10"></i>AUDIOMETRI</strong></b></h4>
                                <hr>
                                <div class="row mt-20">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Pure Tone Audiometri:</label>
                                            <div class="col-md-6 ">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Normal" name="pure_tone_audiometri" id="pure_tone_audiometri1" checked>
                                                            <label class="control-label" for="pure_tone_audiometri1">Normal</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Kelainan" name="pure_tone_audiometri" id="pure_tone_audiometri2">
                                                            <label class="control-label" for="pure_tone_audiometri2">Kelainan</label>
                                                        </span>
                                                    </div>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Sisi Test:</label>
                                            <div class="col-md-6 ">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Normal" name="sisi_test" id="sisi_test1" checked>
                                                            <label class="control-label" for="sisi_test1">Normal</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Kelainan" name="sisi_test" id="sisi_test2">
                                                            <label class="control-label" for="sisi_test2">Kelainan</label>
                                                        </span>
                                                    </div>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Tone Decay:</label>
                                            <div class="col-md-6 ">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Normal" name="tone_decay" id="tone_decay1" checked>
                                                            <label class="control-label" for="tone_decay1">Normal</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Kelainan" name="tone_decay" id="tone_decay2">
                                                            <label class="control-label" for="tone_decay2">Kelainan</label>
                                                        </span>
                                                    </div>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Impedance:</label>
                                            <div class="col-md-6 ">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Normal" name="impedance" id="impedance1" checked>
                                                            <label class="control-label" for="impedance1">Normal</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Kelainan" name="impedance" id="impedance2">
                                                            <label class="control-label" for="impedance2">Kelainan</label>
                                                        </span>
                                                    </div>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Speech Audiometri:</label>
                                            <div class="col-md-6 ">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Normal" name="speech_audiometri" id="speech_audiometri1" checked>
                                                            <label class="control-label" for="speech_audiometri1">Normal</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Kelainan" name="speech_audiometri" id="speech_audiometri2">
                                                            <label class="control-label" for="speech_audiometri2">Kelainan</label>
                                                        </span>
                                                    </div>
                                                    <span class="help-block"></span>
                                                </div>
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
                    url: "<?php echo base_url() ?>Pemeriksaan_fisik_mcu/simpan_tht",
                    method: "POST",
                    dataType: "json",
                    data: {
                        id_mcu: $('#id_mcu').val(),
                        dokter_periksa: $('#dokter_periksa').val(),
                        kelainan: $('input[name="kelainan"]:checked').val(),
                        auricula: $('input[name="auricula"]:checked').val(),
                        canalis_auditorius_externus: $('input[name="canalis_auditorius_externus"]:checked').val(),
                        kulit_canalis: $('input[name="kulit_canalis"]:checked').val(),
                        discharge: $('input[name="discharge"]:checked').val(),
                        membran_tympani: $('input[name="membran_tympani"]:checked').val(),
                        cavum_tympani: $('input[name="cavum_tympani"]:checked').val(),
                        mucosa_cavum_nasi: $('input[name="mucosa_cavum_nasi"]:checked').val(),
                        concha: $('input[name="concha"]:checked').val(),
                        septum_nasi: $('input[name="septum_nasi"]:checked').val(),
                        dishcarge: $('input[name="dishcarge"]:checked').val(),
                        pharynx: $('input[name="pharynx"]:checked').val(),
                        naso_pharynx: $('input[name="naso_pharynx"]:checked').val(),
                        oro_pharynx: $('input[name="oro_pharynx"]:checked').val(),
                        laryngo_pharynx: $('input[name="laryngo_pharynx"]:checked').val(),
                        supra_glotis: $('input[name="supra_glotis"]:checked').val(),
                        glotis: $('input[name="glotis"]:checked').val(),
                        sub_glotis: $('input[name="sub_glotis"]:checked').val(),
                        pure_tone_audiometri: $('input[name="pure_tone_audiometri"]:checked').val(),
                        sisi_test: $('input[name="sisi_test"]:checked').val(),
                        tone_decay: $('input[name="tone_decay"]:checked').val(),
                        impedance: $('input[name="impedance"]:checked').val(),
                        speech_audiometri: $('input[name="speech_audiometri"]:checked').val(),
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
                table: 'tht_mcu',
            },
            success: function(data) {
                if (data.status_dt == 'found') {

                    $('#dokter_periksa').val(data.dokter_periksa);
                    $('input[name="kelainan"][value="' + data.kelainan + '"]').prop("checked", true);
                    $('input[name="auricula"][value="' + data.auricula + '"]').prop("checked", true);
                    $('input[name="canalis_auditorius_externus"][value="' + data.canalis_auditorius_externus + '"]').prop("checked", true);
                    $('input[name="kulit_canalis"][value="' + data.kulit_canalis + '"]').prop("checked", true);
                    $('input[name="discharge"][value="' + data.discharge + '"]').prop("checked", true);
                    $('input[name="membran_tympani"][value="' + data.membran_tympani + '"]').prop("checked", true);
                    $('input[name="cavum_tympani"][value="' + data.cavum_tympani + '"]').prop("checked", true);
                    $('input[name="mucosa_cavum_nasi"][value="' + data.mucosa_cavum_nasi + '"]').prop("checked", true);
                    $('input[name="concha"][value="' + data.concha + '"]').prop("checked", true);
                    $('input[name="septum_nasi"][value="' + data.septum_nasi + '"]').prop("checked", true);
                    $('input[name="dishcarge"][value="' + data.dishcarge + '"]').prop("checked", true);
                    $('input[name="pharynx"][value="' + data.pharynx + '"]').prop("checked", true);
                    $('input[name="naso_pharynx"][value="' + data.naso_pharynx + '"]').prop("checked", true);
                    $('input[name="oro_pharynx"][value="' + data.oro_pharynx + '"]').prop("checked", true);
                    $('input[name="laryngo_pharynx"][value="' + data.laryngo_pharynx + '"]').prop("checked", true);
                    $('input[name="supra_glotis"][value="' + data.supra_glotis + '"]').prop("checked", true);
                    $('input[name="glotis"][value="' + data.glotis + '"]').prop("checked", true);
                    $('input[name="sub_glotis"][value="' + data.sub_glotis + '"]').prop("checked", true);
                    $('input[name="pure_tone_audiometri"][value="' + data.pure_tone_audiometri + '"]').prop("checked", true);
                    $('input[name="sisi_test"][value="' + data.sisi_test + '"]').prop("checked", true);
                    $('input[name="tone_decay"][value="' + data.tone_decay + '"]').prop("checked", true);
                    $('input[name="impedance"][value="' + data.impedance + '"]').prop("checked", true);
                    $('input[name="speech_audiometri"][value="' + data.speech_audiometri + '"]').prop("checked", true);
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
                        <h2 class="panel-title txt-dark"><strong>THT</strong></h2>
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

                                <h4 class="panel-title txt-dark mt-20"><b><strong><i class="fa fa-user-md mr-10"></i>Telinga</strong></b></h4>
                                <hr>
                                <div class="row mt-20">

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Auricula:</label>
                                            <div class="col-md-6 ">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Normal" name="auricula" id="auricula1" checked>
                                                            <label class="control-label" for="auricula1">Normal</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Kelainan" name="auricula" id="auricula2">
                                                            <label class="control-label" for="auricula2">Kelainan</label>
                                                        </span>
                                                    </div>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Canalis Auditorius Externus:</label>
                                            <div class="col-md-6 ">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Normal" name="canalis_auditorius_externus" id="canalis_auditorius_externus1" checked>
                                                            <label class="control-label" for="canalis_auditorius_externus1">Normal</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Kelainan" name="canalis_auditorius_externus" id="canalis_auditorius_externus2">
                                                            <label class="control-label" for="canalis_auditorius_externus2">Kelainan</label>
                                                        </span>
                                                    </div>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Kulit Canalis:</label>
                                            <div class="col-md-6 ">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Normal" name="kulit_canalis" id="kulit_canalis1" checked>
                                                            <label class="control-label" for="kulit_canalis1">Normal</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Kelainan" name="kulit_canalis" id="kulit_canalis2">
                                                            <label class="control-label" for="kulit_canalis2">Kelainan</label>
                                                        </span>
                                                    </div>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Discharge:</label>
                                            <div class="col-md-6 ">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Normal" name="discharge" id="discharge1" checked>
                                                            <label class="control-label" for="discharge1">Normal</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Kelainan" name="discharge" id="discharge2">
                                                            <label class="control-label" for="discharge2">Kelainan</label>
                                                        </span>
                                                    </div>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Membran Tympani:</label>
                                            <div class="col-md-6 ">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Normal" name="membran_tympani" id="membran_tympani1" checked>
                                                            <label class="control-label" for="membran_tympani1">Normal</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Kelainan" name="membran_tympani" id="membran_tympani2">
                                                            <label class="control-label" for="membran_tympani2">Kelainan</label>
                                                        </span>
                                                    </div>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Cavum Tympani:</label>
                                            <div class="col-md-6 ">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Normal" name="cavum_tympani" id="cavum_tympani1" checked>
                                                            <label class="control-label" for="cavum_tympani1">Normal</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Kelainan" name="cavum_tympani" id="cavum_tympani2">
                                                            <label class="control-label" for="cavum_tympani2">Kelainan</label>
                                                        </span>
                                                    </div>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>

                                <h4 class="panel-title txt-dark mt-20"><b><strong><i class="fa fa-user-md mr-10"></i>Hidung</strong></b></h4>
                                <hr>
                                <div class="row mt-20">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Mucosa Cavum Nasi:</label>
                                            <div class="col-md-9 ">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Normal" name="mucosa_cavum_nasi" id="mucosa_cavum_nasi1" checked>
                                                            <label class="control-label" for="mucosa_cavum_nasi1">Normal</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Kelainan" name="mucosa_cavum_nasi" id="mucosa_cavum_nasi2">
                                                            <label class="control-label" for="mucosa_cavum_nasi2">Kelainan</label>
                                                        </span>
                                                    </div>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Concha:</label>
                                            <div class="col-md-9 ">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Normal" name="concha" id="concha1" checked>
                                                            <label class="control-label" for="concha1">Normal</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Kelainan" name="concha" id="concha2">
                                                            <label class="control-label" for="concha2">Kelainan</label>
                                                        </span>
                                                    </div>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-20">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Septum Nasi:</label>
                                            <div class="col-md-9 ">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Normal" name="septum_nasi" id="septum_nasi1" checked>
                                                            <label class="control-label" for="septum_nasi1">Normal</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Kelainan" name="septum_nasi" id="septum_nasi2">
                                                            <label class="control-label" for="septum_nasi2">Kelainan</label>
                                                        </span>
                                                    </div>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Dishcarge:</label>
                                            <div class="col-md-9 ">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Normal" name="dishcarge" id="dishcarge1" checked>
                                                            <label class="control-label" for="dishcarge1">Normal</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Kelainan" name="dishcarge" id="dishcarge2">
                                                            <label class="control-label" for="dishcarge2">Kelainan</label>
                                                        </span>
                                                    </div>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h4 class="panel-title txt-dark mt-20"><b><strong><i class="fa fa-user-md mr-10"></i>Tenggorokan</strong></b></h4>
                                <hr>
                                <div class="row mt-20">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Pharynx:</label>
                                            <div class="col-md-9 ">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Normal" name="pharynx" id="pharynx1" checked>
                                                            <label class="control-label" for="pharynx1">Normal</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Kelainan" name="pharynx" id="pharynx2">
                                                            <label class="control-label" for="pharynx2">Kelainan</label>
                                                        </span>
                                                    </div>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Naso Pharynx:</label>
                                            <div class="col-md-9 ">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Normal" name="naso_pharynx" id="naso_pharynx1" checked>
                                                            <label class="control-label" for="naso_pharynx1">Normal</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Kelainan" name="naso_pharynx" id="naso_pharynx2">
                                                            <label class="control-label" for="naso_pharynx2">Kelainan</label>
                                                        </span>
                                                    </div>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Oro Pharynx:</label>
                                            <div class="col-md-9 ">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Normal" name="oro_pharynx" id="oro_pharynx1" checked>
                                                            <label class="control-label" for="oro_pharynx1">Normal</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Kelainan" name="oro_pharynx" id="oro_pharynx2">
                                                            <label class="control-label" for="oro_pharynx2">Kelainan</label>
                                                        </span>
                                                    </div>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Laryngo Pharynx:</label>
                                            <div class="col-md-9 ">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Normal" name="laryngo_pharynx" id="laryngo_pharynx1" checked>
                                                            <label class="control-label" for="laryngo_pharynx1">Normal</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Kelainan" name="laryngo_pharynx" id="laryngo_pharynx2">
                                                            <label class="control-label" for="laryngo_pharynx2">Kelainan</label>
                                                        </span>
                                                    </div>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <h4 class="panel-title txt-dark mt-20"><b><strong><i class="fa fa-user-md mr-10"></i>Larynx</strong></b></h4>
                                <hr>
                                <div class="row mt-20">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Supra Glotis:</label>
                                            <div class="col-md-9 ">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Normal" name="supra_glotis" id="supra_glotis1" checked>
                                                            <label class="control-label" for="supra_glotis1">Normal</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Kelainan" name="supra_glotis" id="supra_glotis2">
                                                            <label class="control-label" for="supra_glotis2">Kelainan</label>
                                                        </span>
                                                    </div>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Glotis:</label>
                                            <div class="col-md-9 ">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Normal" name="glotis" id="glotis1" checked>
                                                            <label class="control-label" for="glotis1">Normal</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Kelainan" name="glotis" id="glotis2">
                                                            <label class="control-label" for="glotis2">Kelainan</label>
                                                        </span>
                                                    </div>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Sub Glotis:</label>
                                            <div class="col-md-9 ">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Normal" name="sub_glotis" id="sub_glotis1" checked>
                                                            <label class="control-label" for="sub_glotis1">Normal</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Kelainan" name="sub_glotis" id="sub_glotis2">
                                                            <label class="control-label" for="sub_glotis2">Kelainan</label>
                                                        </span>
                                                    </div>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h4 class="panel-title txt-dark mt-20"><b><strong><i class="fa fa-user-md mr-10"></i>AUDIOMETRI</strong></b></h4>
                                <hr>
                                <div class="row mt-20">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Pure Tone Audiometri:</label>
                                            <div class="col-md-6 ">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Normal" name="pure_tone_audiometri" id="pure_tone_audiometri1" checked>
                                                            <label class="control-label" for="pure_tone_audiometri1">Normal</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Kelainan" name="pure_tone_audiometri" id="pure_tone_audiometri2">
                                                            <label class="control-label" for="pure_tone_audiometri2">Kelainan</label>
                                                        </span>
                                                    </div>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Sisi Test:</label>
                                            <div class="col-md-6 ">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Normal" name="sisi_test" id="sisi_test1" checked>
                                                            <label class="control-label" for="sisi_test1">Normal</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Kelainan" name="sisi_test" id="sisi_test2">
                                                            <label class="control-label" for="sisi_test2">Kelainan</label>
                                                        </span>
                                                    </div>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Tone Decay:</label>
                                            <div class="col-md-6 ">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Normal" name="tone_decay" id="tone_decay1" checked>
                                                            <label class="control-label" for="tone_decay1">Normal</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Kelainan" name="tone_decay" id="tone_decay2">
                                                            <label class="control-label" for="tone_decay2">Kelainan</label>
                                                        </span>
                                                    </div>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Impedance:</label>
                                            <div class="col-md-6 ">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Normal" name="impedance" id="impedance1" checked>
                                                            <label class="control-label" for="impedance1">Normal</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Kelainan" name="impedance" id="impedance2">
                                                            <label class="control-label" for="impedance2">Kelainan</label>
                                                        </span>
                                                    </div>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Speech Audiometri:</label>
                                            <div class="col-md-6 ">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Normal" name="speech_audiometri" id="speech_audiometri1" checked>
                                                            <label class="control-label" for="speech_audiometri1">Normal</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Kelainan" name="speech_audiometri" id="speech_audiometri2">
                                                            <label class="control-label" for="speech_audiometri2">Kelainan</label>
                                                        </span>
                                                    </div>
                                                    <span class="help-block"></span>
                                                </div>
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
                    url: "<?php echo base_url() ?>Pemeriksaan_fisik_mcu/simpan_tht",
                    method: "POST",
                    dataType: "json",
                    data: {
                        id_mcu: $('#id_mcu').val(),
                        dokter_periksa: $('#dokter_periksa').val(),
                        kelainan: $('input[name="kelainan"]:checked').val(),
                        auricula: $('input[name="auricula"]:checked').val(),
                        canalis_auditorius_externus: $('input[name="canalis_auditorius_externus"]:checked').val(),
                        kulit_canalis: $('input[name="kulit_canalis"]:checked').val(),
                        discharge: $('input[name="discharge"]:checked').val(),
                        membran_tympani: $('input[name="membran_tympani"]:checked').val(),
                        cavum_tympani: $('input[name="cavum_tympani"]:checked').val(),
                        mucosa_cavum_nasi: $('input[name="mucosa_cavum_nasi"]:checked').val(),
                        concha: $('input[name="concha"]:checked').val(),
                        septum_nasi: $('input[name="septum_nasi"]:checked').val(),
                        dishcarge: $('input[name="dishcarge"]:checked').val(),
                        pharynx: $('input[name="pharynx"]:checked').val(),
                        naso_pharynx: $('input[name="naso_pharynx"]:checked').val(),
                        oro_pharynx: $('input[name="oro_pharynx"]:checked').val(),
                        laryngo_pharynx: $('input[name="laryngo_pharynx"]:checked').val(),
                        supra_glotis: $('input[name="supra_glotis"]:checked').val(),
                        glotis: $('input[name="glotis"]:checked').val(),
                        sub_glotis: $('input[name="sub_glotis"]:checked').val(),
                        pure_tone_audiometri: $('input[name="pure_tone_audiometri"]:checked').val(),
                        sisi_test: $('input[name="sisi_test"]:checked').val(),
                        tone_decay: $('input[name="tone_decay"]:checked').val(),
                        impedance: $('input[name="impedance"]:checked').val(),
                        speech_audiometri: $('input[name="speech_audiometri"]:checked').val(),
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
                table: 'tht_mcu',
            },
            success: function(data) {
                if (data.status_dt == 'found') {

                    $('#dokter_periksa').val(data.dokter_periksa);
                    $('input[name="kelainan"][value="' + data.kelainan + '"]').prop("checked", true);
                    $('input[name="auricula"][value="' + data.auricula + '"]').prop("checked", true);
                    $('input[name="canalis_auditorius_externus"][value="' + data.canalis_auditorius_externus + '"]').prop("checked", true);
                    $('input[name="kulit_canalis"][value="' + data.kulit_canalis + '"]').prop("checked", true);
                    $('input[name="discharge"][value="' + data.discharge + '"]').prop("checked", true);
                    $('input[name="membran_tympani"][value="' + data.membran_tympani + '"]').prop("checked", true);
                    $('input[name="cavum_tympani"][value="' + data.cavum_tympani + '"]').prop("checked", true);
                    $('input[name="mucosa_cavum_nasi"][value="' + data.mucosa_cavum_nasi + '"]').prop("checked", true);
                    $('input[name="concha"][value="' + data.concha + '"]').prop("checked", true);
                    $('input[name="septum_nasi"][value="' + data.septum_nasi + '"]').prop("checked", true);
                    $('input[name="dishcarge"][value="' + data.dishcarge + '"]').prop("checked", true);
                    $('input[name="pharynx"][value="' + data.pharynx + '"]').prop("checked", true);
                    $('input[name="naso_pharynx"][value="' + data.naso_pharynx + '"]').prop("checked", true);
                    $('input[name="oro_pharynx"][value="' + data.oro_pharynx + '"]').prop("checked", true);
                    $('input[name="laryngo_pharynx"][value="' + data.laryngo_pharynx + '"]').prop("checked", true);
                    $('input[name="supra_glotis"][value="' + data.supra_glotis + '"]').prop("checked", true);
                    $('input[name="glotis"][value="' + data.glotis + '"]').prop("checked", true);
                    $('input[name="sub_glotis"][value="' + data.sub_glotis + '"]').prop("checked", true);
                    $('input[name="pure_tone_audiometri"][value="' + data.pure_tone_audiometri + '"]').prop("checked", true);
                    $('input[name="sisi_test"][value="' + data.sisi_test + '"]').prop("checked", true);
                    $('input[name="tone_decay"][value="' + data.tone_decay + '"]').prop("checked", true);
                    $('input[name="impedance"][value="' + data.impedance + '"]').prop("checked", true);
                    $('input[name="speech_audiometri"][value="' + data.speech_audiometri + '"]').prop("checked", true);
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