<div class="page_content">
    <!-- Row -->
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default card-view">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h2 class="panel-title txt-dark"><strong>Kardiologi</strong></h2>
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
                                            <label class="control-label col-md-3 pt-5">Upload EKG</label>
                                            <div class="col-md-9">
                                                <div class="input-group row">
                                                    <input type="file" class="form-control" id="dokumen_periksa_ekg" accept=".pdf, .doc, .docx, .jpg, .jpeg, .png">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-upload"></i>
                                                    </span>
                                                </div>
                                                <div class="input-group row">
                                                    <label class="control-label col-md-3 pt-5">File: <font id="file_ekg"></font></label>
                                                </div>
                                                <span class="help-block"></span>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Upload Echocardiography</label>
                                            <div class="col-md-9">
                                                <div class="input-group row">
                                                    <input type="file" class="form-control" id="dokumen_periksa_echo" accept=".pdf, .doc, .docx, .jpg, .jpeg, .png">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-upload"></i>
                                                    </span>
                                                </div>
                                                <div class="input-group row">
                                                    <label class="control-label col-md-3 pt-5">File: <font id="file_echo"></font></label>
                                                </div>
                                                <span class="help-block"></span>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Upload Treadmil</label>
                                            <div class="col-md-9">
                                                <div class="input-group row">
                                                    <input type="file" class="form-control" id="dokumen_periksa_treadmil" accept=".pdf, .doc, .docx, .jpg, .jpeg, .png">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-upload"></i>
                                                    </span>
                                                </div>
                                                <span class="help-block"></span>
                                                <div class="input-group row">
                                                    <label class="control-label col-md-3 pt-5">File: <font id="file_treadmil"></font></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

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

                                <h4 class="panel-title txt-dark mt-20"><b><strong><i class="fa fa-user-md mr-10"></i>Nadi</strong></b></h4>
                                <hr>
                                <div class="row mt-20">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Frekuensi:</label>
                                            <div class="col-md-9 has-success">
                                                <input type="text" class="form-control" id="nadi" placeholder="x/menit">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Irama:</label>
                                            <div class="col-md-9 ">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Teratur" name="irama" id="irama1">
                                                            <label class="control-label" for="irama1">Teratur</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Tidak Teratur" name="irama" id="irama2">
                                                            <label class="control-label" for="irama2">Tidak Teratur</label>
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
                                            <label class="control-label col-md-3 pt-5">Isi:</label>
                                            <div class="col-md-9 ">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Cukup" name="isi_nadi" id="isi_nadi1">
                                                            <label class="control-label" for="isi_nadi1">Cukup</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Kurang" name="isi_nadi" id="isi_nadi2">
                                                            <label class="control-label" for="isi_nadi2">Kurang</label>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-20">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Tekanan Darah</label>
                                            <div class="col-md-4 has-success">
                                                <input type="text" class="form-control" id="sistol">

                                            </div>
                                            <div class="col-md-1">
                                                <label class="control-label">/</label>
                                            </div>
                                            <div class="col-md-4 has-success">
                                                <input type="text" class="form-control" id="diastol">

                                            </div>


                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="col-md-1">
                                            <label class="control-label">mmHg</label>

                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-20">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Tekanan Venajugularis</label>
                                            <div class="col-md-7 has-success">
                                                <input type="text" class="form-control" id="tekanan_venajugularis">

                                            </div>
                                            <div class="col-md-2">
                                                <label class="control-label">CM H2O</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Sianosis</label>
                                            <div class="col-md-9">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Ada" name="sianosis" id="sianosis_ada">
                                                            <label class="control-label" for="sianosis_ada">Ada</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Tidak Ada" name="sianosis" id="sianosis_tidak">
                                                            <label class="control-label" for="sianosis_tidak">Tidak Ada</label>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-20">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Inspeksi:</label>
                                            <div class="col-md-9 has-success">
                                                <input type="text" class="form-control" id="inspeksi">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Perkusi:</label>
                                            <div class="col-md-9 has-success">
                                                <input type="text" class="form-control" id="perkusi">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Auskultasi:</label>
                                            <div class="col-md-9 has-success">
                                                <input type="text" class="form-control" id="auskultasi">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <h4 class="panel-title txt-dark mt-20"><b><strong><i class="fa fa-user-md mr-10"></i>ECG</strong></b></h4>
                                <hr>
                                <div class="row mt-20">

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Irama:</label>
                                            <div class="col-md-6">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Sinus" name="irama_ecg" id="irama_ecg_sinus">
                                                            <label class="control-label" for="irama_ecg_sinus">Sinus</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Kelainan" name="irama_ecg" id="irama_ecg_kelainan">
                                                            <label class="control-label" for="irama_ecg_kelainan">Kelainan</label>
                                                        </span>
                                                    </div>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Axis:</label>
                                            <div class="col-md-6">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Normal" name="axis_ecg" id="axis_ecg_normal">
                                                            <label class="control-label" for="axis_ecg_normal">Normal</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Kelainan" name="axis_ecg" id="axis_ecg_kelainan">
                                                            <label class="control-label" for="axis_ecg_kelainan">Kelainan</label>
                                                        </span>
                                                    </div>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Rotation:</label>
                                            <div class="col-md-6">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Negatif" name="rotation_ecg" id="rotation_ecg_negatif">
                                                            <label class="control-label" for="rotation_ecg_negatif">Negatif</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Kelainan" name="rotation_ecg" id="rotation_ecg_kelainan">
                                                            <label class="control-label" for="rotation_ecg_kelainan">Kelainan</label>
                                                        </span>
                                                    </div>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Atrial Rate:</label>
                                            <div class="col-md-6 has-success">
                                                <input type="text" class="form-control" id="atrail_rate" placeholder="x/menit">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row mt-20">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Ventricular Rate:</label>
                                            <div class="col-md-6">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Normal" name="ventricular_rate_ecg" id="ventricular_rate_ecg_normal">
                                                            <label class="control-label" for="ventricular_rate_ecg_normal">Normal</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Kelainan" name="ventricular_rate_ecg" id="ventricular_rate_ecg_kelainan">
                                                            <label class="control-label" for="ventricular_rate_ecg_kelainan">Kelainan</label>
                                                        </span>
                                                    </div>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">P-R Interval:</label>
                                            <div class="col-md-6">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Normal" name="pr_interval_ecg" id="pr_interval_ecg_normal">
                                                            <label class="control-label" for="pr_interval_ecg_normal">Normal</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Kelainan" name="pr_interval_ecg" id="pr_interval_ecg_kelainan">
                                                            <label class="control-label" for="pr_interval_ecg_kelainan">Kelainan</label>
                                                        </span>
                                                    </div>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">QRS Interval:</label>
                                            <div class="col-md-6">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Normal" name="qrs_interval_ecg" id="qrs_interval_ecg_normal">
                                                            <label class="control-label" for="qrs_interval_ecg_normal">Normal</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Kelainan" name="qrs_interval_ecg" id="qrs_interval_ecg_kelainan">
                                                            <label class="control-label" for="qrs_interval_ecg_kelainan">Kelainan</label>
                                                        </span>
                                                    </div>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Q-T Interval:</label>
                                            <div class="col-md-6">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Normal" name="qt_interval_ecg" id="qt_interval_ecg_normal">
                                                            <label class="control-label" for="qt_interval_ecg_normal">Normal</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Kelainan" name="qt_interval_ecg" id="qt_interval_ecg_kelainan">
                                                            <label class="control-label" for="qt_interval_ecg_kelainan">Kelainan</label>
                                                        </span>
                                                    </div>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Gelombang P:</label>
                                            <div class="col-md-6">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Normal" name="gelombang_p_ecg" id="gelombang_p_ecg_normal">
                                                            <label class="control-label" for="gelombang_p_ecg_normal">Normal</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Kelainan" name="gelombang_p_ecg" id="gelombang_p_ecg_kelainan">
                                                            <label class="control-label" for="gelombang_p_ecg_kelainan">Kelainan</label>
                                                        </span>
                                                    </div>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Gelombang QRS:</label>
                                            <div class="col-md-6">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Normal" name="gelombang_qrs_ecg" id="gelombang_qrs_ecg_normal">
                                                            <label class="control-label" for="gelombang_qrs_ecg_normal">Normal</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Kelainan" name="gelombang_qrs_ecg" id="gelombang_qrs_ecg_kelainan">
                                                            <label class="control-label" for="gelombang_qrs_ecg_kelainan">Kelainan</label>
                                                        </span>
                                                    </div>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Gelombang ST:</label>
                                            <div class="col-md-6">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Normal" name="gelombang_st_ecg" id="gelombang_st_ecg_normal">
                                                            <label class="control-label" for="gelombang_st_ecg_normal">Normal</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Kelainan" name="gelombang_st_ecg" id="gelombang_st_ecg_kelainan">
                                                            <label class="control-label" for="gelombang_st_ecg_kelainan">Kelainan</label>
                                                        </span>
                                                    </div>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Gelombang T:</label>
                                            <div class="col-md-6">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Tidak Ada" name="gelombang_t_ecg" id="gelombang_t_ecg_tidak_ada">
                                                            <label class="control-label" for="gelombang_t_ecg_tidak_ada">Tidak Ada</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Ada" name="gelombang_t_ecg" id="gelombang_t_ecg_ada">
                                                            <label class="control-label" for="gelombang_t_ecg_ada">Ada</label>
                                                        </span>
                                                    </div>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Gelombang U:</label>
                                            <div class="col-md-6">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Tidak Ada" name="gelombang_u_ecg" id="gelombang_u_ecg_tidak_ada">
                                                            <label class="control-label" for="gelombang_u_ecg_tidak_ada">Tidak Ada</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Ada" name="gelombang_u_ecg" id="gelombang_u_ecg_ada">
                                                            <label class="control-label" for="gelombang_u_ecg_ada">Ada</label>
                                                        </span>
                                                    </div>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Treadmill:</label>
                                            <div class="col-md-6">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Normal" name="hasil_treadmill" id="hasil_treadmill_normal">
                                                            <label class="control-label" for="hasil_treadmill_normal">Normal</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Positif Ischemic Respons" name="hasil_treadmill" id="hasil_treadmill_positif">
                                                            <label class="control-label" for="hasil_treadmill_positif">Positif Ischemic Respons</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Uninterpretable" name="hasil_treadmill" id="hasil_treadmill_uninterpretable">
                                                            <label class="control-label" for="hasil_treadmill_uninterpretable">Uninterpretable</label>
                                                        </span>
                                                    </div>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Ekokardiografi:</label>
                                            <div class="col-md-6">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Normal" name="hasil_ekokardiografi" id="hasil_ekokardiografi_normal">
                                                            <label class="control-label" for="hasil_ekokardiografi_normal">Normal</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Kelainan" name="hasil_ekokardiografi" id="hasil_ekokardiografi_kelainan">
                                                            <label class="control-label" for="hasil_ekokardiografi_kelainan">Kelainan</label>
                                                        </span>
                                                    </div>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <h4 class="panel-title txt-dark mt-20"><b><strong><i class="fa fa-user-md mr-10"></i>Kesimpulan</strong></b></h4>
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
                                <h4 class="panel-title txt-dark mt-20"><b><strong><i class="fa fa-user-md mr-10"></i>Saran</strong></b></h4>
                                <hr>
                                <div class="row mt-20">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Saran</label>
                                            <div class="col-md-9 has-success">
                                                <textarea class="form-control" rows="4" cols="50" placeholder="-" id="saran"></textarea>

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
        var formData = new FormData();


        formData.append("id_mcu", $("#id_mcu").val());
        formData.append("dokter_periksa", $("#dokter_periksa").val());
        var kelainan = $("input[name='kelainan']:checked").val();
        formData.append("kelainan", kelainan);
        formData.append("nadi", $("#nadi").val());

        var irama = $("input[name='irama']:checked").val();
        formData.append("irama", irama);

        var isiNadi = $("input[name='isi_nadi']:checked").val();
        formData.append("isi_nadi", isiNadi);

        formData.append("sistol", $("#sistol").val());
        formData.append("diastol", $("#diastol").val());

        formData.append("tekanan_venajugularis", $("#tekanan_venajugularis").val()); // Menggunakan #sistol karena ID inputnya
        var sianosis = $("input[name='sianosis']:checked").val();
        formData.append("sianosis", sianosis);
        formData.append("inspeksi", $("#inspeksi").val());
        formData.append("perkusi", $("#perkusi").val());
        formData.append("auskultasi", $("#auskultasi").val());

        // Irama ECG
        formData.append("irama_ecg", $("input[name='irama_ecg']:checked").val());

        // Axis ECG
        formData.append("axis_ecg", $("input[name='axis_ecg']:checked").val());

        // Rotation ECG
        formData.append("rotation_ecg", $("input[name='rotation_ecg']:checked").val());

        // Atrial Rate
        formData.append("atrail_rate", $("#atrail_rate").val());

        // Ventricular Rate ECG
        formData.append("ventricular_rate_ecg", $("input[name='ventricular_rate_ecg']:checked").val());

        // P-R Interval ECG
        formData.append("pr_interval_ecg", $("input[name='pr_interval_ecg']:checked").val());

        // QRS Interval ECG
        formData.append("qrs_interval_ecg", $("input[name='qrs_interval_ecg']:checked").val());

        // Q-T Interval ECG
        formData.append("qt_interval_ecg", $("input[name='qt_interval_ecg']:checked").val());

        // Gelombang P ECG
        formData.append("gelombang_p_ecg", $("input[name='gelombang_p_ecg']:checked").val());

        // Gelombang QRS ECG
        formData.append("gelombang_qrs_ecg", $("input[name='gelombang_qrs_ecg']:checked").val());

        // Gelombang ST ECG
        formData.append("gelombang_st_ecg", $("input[name='gelombang_st_ecg']:checked").val());

        // Gelombang T ECG
        formData.append("gelombang_t_ecg", $("input[name='gelombang_t_ecg']:checked").val());

        // Gelombang U ECG
        formData.append("gelombang_u_ecg", $("input[name='gelombang_u_ecg']:checked").val());

        // Hasil Treadmill
        formData.append("hasil_treadmill", $("input[name='hasil_treadmill']:checked").val());

        // Hasil Ekokardiografi
        formData.append("hasil_ekokardiografi", $("input[name='hasil_ekokardiografi']:checked").val());

        var kesimpulan = $("input[name='kesimpulan']:checked").val();
        kesimpulan = (kesimpulan === 'Kelainan') ? $("#kesimpulan").val() : kesimpulan;
        formData.append("kesimpulan", kesimpulan);
        formData.append("saran", $("#saran").val());


        var fileInputEKG = $("#dokumen_periksa_ekg")[0];
        var fileInputEcho = $("#dokumen_periksa_echo")[0];
        var fileInputTreadmil = $("#dokumen_periksa_treadmil")[0];
        if (fileInputEKG.files.length > 0) {
            formData.append("dokumen_periksa_ekg", fileInputEKG.files[0]);
        }
        if (fileInputEcho.files.length > 0) {
            formData.append("dokumen_periksa_echo", fileInputEcho.files[0]);
        }
        if (fileInputTreadmil.files.length > 0) {
            formData.append("dokumen_periksa_treadmil", fileInputTreadmil.files[0]);
        }

        $.ajax({
            url: "<?php echo base_url() ?>Pemeriksaan_fisik_mcu/simpan_kardiologi", // Ganti dengan URL endpoint server Anda
            type: "POST",
            data: formData,
            dataType: "json",
            contentType: false,
            processData: false,
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
            },
            error: function(error) {
                swal({
                    title: "Gagal!",
                    type: "warning",
                    text: "Terjadi kesalahan saat menyimpan data.",
                    confirmButtonColor: "#3cb878",
                });

            }
        });
    }

    $(document).ready(function() {
        id_pelayanan = $('#id_mcu').val();
        $.ajax({
            url: "<?php echo base_url() ?>Pemeriksaan_fisik_mcu/get_data_pemeriksaan",
            method: "POST",
            dataType: 'json',
            data: {
                id: id_pelayanan,
                table: 'kardiologi_mcu',
            },
            success: function(data) {
                if (data.status_dt == 'found') {

                    $('#dokter_periksa').val(data.dokter_periksa);
                    $('#nadi').val(data.nadi);
                    $('#sistol').val(data.sistol);
                    $('#diastol').val(data.diastol);
                    $('input[name="kelainan"][value="' + data.kelainan + '"]').prop("checked", true);
                    $('input[name="irama"][value="' + data.irama + '"]').prop("checked", true);

                    // Mengatur radio button untuk isi nadi
                    $('input[name="isi_nadi"][value="' + data.isi_nadi + '"]').prop("checked", true);
                    $('#tekanan_venajugularis').val(data.tekanan_venajugularis); // Menggunakan id sistol untuk tekanan vena
                    $('#inspeksi').val(data.inspeksi);
                    $('#perkusi').val(data.perkusi);
                    $('#auskultasi').val(data.auskultasi);

                    $('input[name="irama_ecg"][value="' + data.irama_ecg + '"]').prop("checked", true);
                    $('input[name="axis_ecg"][value="' + data.axis_ecg + '"]').prop("checked", true);
                    $('input[name="rotation_ecg"][value="' + data.rotation_ecg + '"]').prop("checked", true);
                    $('input[name="ventricular_rate_ecg"][value="' + data.ventricular_rate_ecg + '"]').prop("checked", true);
                    $('input[name="pr_interval_ecg"][value="' + data.pr_interval_ecg + '"]').prop("checked", true);
                    $('input[name="qrs_interval_ecg"][value="' + data.qrs_interval_ecg + '"]').prop("checked", true);
                    $('input[name="qt_interval_ecg"][value="' + data.qt_interval_ecg + '"]').prop("checked", true);
                    $('input[name="gelombang_p_ecg"][value="' + data.gelombang_p_ecg + '"]').prop("checked", true);
                    $('input[name="gelombang_qrs_ecg"][value="' + data.gelombang_qrs_ecg + '"]').prop("checked", true);
                    $('input[name="gelombang_st_ecg"][value="' + data.gelombang_st_ecg + '"]').prop("checked", true);
                    $('input[name="gelombang_t_ecg"][value="' + data.gelombang_t_ecg + '"]').prop("checked", true);
                    $('input[name="gelombang_u_ecg"][value="' + data.gelombang_u_ecg + '"]').prop("checked", true);
                    $('input[name="hasil_treadmill"][value="' + data.hasil_treadmill + '"]').prop("checked", true);
                    $('input[name="hasil_ekokardiografi"][value="' + data.hasil_ekokardiografi + '"]').prop("checked", true);
                    $('#atrail_rate').val(data.atrail_rate);

                    // Kesimpulan Radio Button
                    if (data.kesimpulan === 'Normal') {
                        $('input[name="kesimpulan"][value="' + data.kesimpulan + '"]').prop("checked", true);
                    } else {
                        $('input[name="kesimpulan"][value="Kelainan"]').prop("checked", true).change();
                        $('#kesimpulan').val(data.kesimpulan);
                    }

                    file_ekg = (data.dokumen_periksa_ekg==='')?'Tidak Tersedia':data.dokumen_periksa_ekg;
                    $('#file_ekg').html(file_ekg);
                    file_echo = (data.dokumen_periksa_echo==='')?'Tidak Tersedia':data.dokumen_periksa_echo;
                    $('#file_echo').html(file_echo);
                    file_treadmil = (data.dokumen_periksa_treadmil==='')?'Tidak Tersedia':data.dokumen_periksa_treadmil;
                    $('#file_treadmil').html(file_treadmil);

                    // Kesimpulan Umum Textarea
                    $('#saran').val(data.saran);
                }
            }

        });
    });
</script>